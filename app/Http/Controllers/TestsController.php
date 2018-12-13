<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Test;
use App\Topic;
use App\Group;
use App\Question;
use App\Map;
use Illuminate\Database\QueryException;

class TestsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    } 

    public function index()
    {
        $topics = Topic::where('class', '10')->get();
        return view('tests.test')->with('topics', $topics);
    }

    public function getList(Request $request)
    {
        $topic_id = $request->topic_id;
        $class = $request->topic_class;

        if($topic_id != "all")
        {
            $tests = Test::where('topic_id', '=', $topic_id)->where('is_enable', 1)->orderBy('id', 'decs')->get();
            // $tests = DB::table("tests")->select('*')->whereIn('topic_id',function($query) {
            //     $query->select('id')->from('topics')->where('class', $class);
            //  })->get();
        } else 
        {
            $tests = DB::table('tests')->join('topics', 'tests.topic_id', '=', 'topics.id')
            ->where('topics.class', $class)->where('is_enable', 1)->orderBy('tests.id', 'decs')->get([
                'tests.id',
                'test_name',
                'secret_key',
                'is_required',
                'number_question',
                'time_limit',
                'note',
                'topic_id',
                'is_enable',
                'tests.created_at',

            ]);
        } 
        return $tests;
    }

    public function delete(Request $request)
    {
        try
        {
            $id = $request->id;
            Test::find($id)->delete();
            Map::where('test_id', $id)->delete();
            return 1; //redirect('/admin/test')->with('success', 'Xóa đề thi thành công');
        } catch(QueryException $ex) 
        {
            return 0; //redirect('/admin/test')->with('error', 'Không thể xóa đề thi');
        }
    }

    public function add()
    {
        $topics = Topic::where('class', '10')->get();
        $groups = Group::where('class', '10')->get();
        return view('tests.test_add_new')->with(['topics' => $topics, 'groups' => $groups]);
    }

    public function store(Request $request)
    {
        $rate = $request->rate;
        $rate = explode(";", $rate);
        $easy = $rate[0];
        $hard = 100 - $rate[1];
        $medium = 100 - $hard - $easy;
        $number_question = $request->number_question;

        $easy = (int) ($number_question / 100 * $easy);
        $medium = (int) ($number_question / 100 * $medium);
        $hard = $number_question - $medium - $easy;

        $groups = $request->group;
        if($groups == null) return redirect()->back()->with('error', 'Vui lòng chọn ít nhất một bộ câu hỏi');

        if($request->duplicate == "on") $duplicate = 1; else $duplicate = 0;
        if($duplicate) 
        {
            $easy_question = DB::table("questions")->select('id')->whereNotIn('id',function($query) {
                $query->select('question_id')->from('maps');
             })->whereIn('group_id', $groups)->where('level', 1)->orderByRaw("RAND()")->take($easy)->get();
            
            $medium_question = DB::table("questions")->select('id')->whereNotIn('id',function($query) {
                $query->select('question_id')->from('maps');
             })->whereIn('group_id', $groups)->where('level', 2)->orderByRaw("RAND()")->take($medium)->get();
    
            $hard_question = DB::table("questions")->select('id')->whereNotIn('id',function($query) {
                $query->select('question_id')->from('maps');
             })->whereIn('group_id', $groups)->where('level', 3)->orderByRaw("RAND()")->take($hard)->get();

        } else {
            $easy_question = Question::select('id')->whereIn('group_id', $groups)->where('level', 1)->orderByRaw("RAND()")->take($easy)->get();
            $medium_question = Question::select('id')->whereIn('group_id', $groups)->where('level', 2)->orderByRaw("RAND()")->take($medium)->get();
            $hard_question = Question::select('id')->whereIn('group_id', $groups)->where('level', 3)->orderByRaw("RAND()")->take($hard)->get();
        }
        
        if(count($easy_question) + count($medium_question) + count($hard_question) < $number_question) 
        return redirect()->back()->with('error', 'Số lượng câu hỏi không đủ, vui lòng cập nhật thêm');

        
        $test = new Test;
        $test->test_name = $request->test_exam;
        $test->secret_key = $this->randomKey();
        $test->is_required = $request->type;
        $test->number_question = $number_question;
        $test->time_limit = $request->time;
        $test->note = " Số lượng câu hỏi: ".$number_question."<br/> Thời gian: ".$request->time."ph<br/> Tỷ lệ độ khó: ".$easy." - ".$medium." - ".$hard.
        "<br/> Lớp: ".$request->topic_class."<br/> Mã bộ câu hỏi: ".implode(", ", $groups);
        $test->topic_id = $request->topic_id;
        $test->save();
        $id = $test->id;

        $this->saveMap($easy_question, $id);
        $this->saveMap($medium_question, $id);
        $this->saveMap($hard_question, $id);

        return redirect()->back()->with('success', 'Tạo đề thi thành công');
    }

    private function randomKey()
    {
        $key = "";
        $chars = "0123456789ABCDEF";
        $size = strlen($chars);
        for( $i = 0; $i < 6; $i++ ) 
        {
            $key .= $chars[mt_rand(0, $size - 1)];
        }
        return $key;
    }

    private function saveMap($arr, $id)
    {
        $data = [];
        if($arr != null)
        {
            foreach ($arr as $value) 
            {
                $data [] = ['question_id' => $value->id, 'test_id' => $id];
            }
            Map::insert($data);
        }
    }

    public function listDisable()
    {
        $tests = Test::where('is_enable', 0)->get();
        return view('tests.test_list_disable')->with('tests', $tests);
    }

    public function enable(Request $request)
    {
        if($request->status == 0)
        {
            $test = Test::find($request->id);
            $test->is_enable = 0;
            $test->save();
        }

        if($request->status == 1)
        {
            $test = Test::find($request->id);
            $test->is_enable = 1;
            $test->save();
        }

        return 1; //redirect()->back()->with('success', 'Cập nhật thành công');
    }

    public function disable(Request $request)
    {
        if($request->status == 0)
        {
            $test = Test::find($request->id);
            $test->is_enable = 0;
            $test->save();
        }

        if($request->status == 1)
        {
            $test = Test::find($request->id);
            $test->is_enable = 1;
            $test->save();
        }

        return redirect()->back()->with('success', 'Cập nhật thành công');
    }
}
