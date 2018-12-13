<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use App\Question;
use App\Group;

class QuestionsController extends Controller
{
    
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function index()
    {
        //$questions = Question::orderBy('id', 'decs')->get();

        $groups = Group::where('class', '10')->get();
        // $questions = DB::table('questions')->join('groups', 'questions.group_id', '=', 'groups.id')
        // ->orderBy('questions.id', 'decs')->get(array(
        //     'questions.id',
        //     'problem',
        //     'answer1',
        //     'answer2',
        //     'answer3',
        //     'answer4',
        //     'correct',
        //     'explain',
        //     'level',
        //     'group_id',
        //     'group_name',
        //     'questions.created_at'
        // ));
         return view('questions.question')->with('groups', $groups);
    }

    public function delete(Request $request) 
    {
        $id = $request->id;
        Question::find($id)->delete();
        return 1;//redirect('admin/question')->with('success', 'Xóa câu hỏi thành công');
    }

    public function add()
    {
        $groups = Group::where('class', '10')->get();
        return view('questions.question_add')->with(['groups' => $groups]);
    }

    public function store(Request $request)
    {
        $question = new Question;
        $question->problem = $request->problem;
        $question->answer1 = $request->answer1;
        $question->answer2 = $request->answer2;
        $question->answer3 = $request->answer3;
        $question->answer4 = $request->answer4;
        $question->correct = $request->correct;
        $question->explain = $request->explain;
        $question->level = $request->level;
        $question->group_id = $request->group_id;
        $question->save();
        return redirect()->back()->with('success', 'Thêm câu hỏi mới thành công');
    }
 
    public function show(Request $request)
    {
        $id = $request->id;
        $question = Question::find($id);
        $groups = Group::where('class', '10')->get();
        return view('questions.question_edit')->with(['question' => $question, 'groups' => $groups]);
    }

    public function edit(Request $request)
    {
        $question = Question::find($request->id);
        $question->problem = $request->problem;
        $question->answer1 = $request->answer1;
        $question->answer2 = $request->answer2;
        $question->answer3 = $request->answer3;
        $question->answer4 = $request->answer4;
        $question->correct = $request->correct;
        $question->explain = $request->explain;
        $question->level = $request->level;
        $question->group_id = $request->group_id;
        $question->save();
        return redirect('admin/question')->with('success', 'Câu hỏi đã được cập nhật');
    }

    public function getList(Request $request)
    {
        $group_id = $request->group_id;
        //$questions = Question::where('group_id', $group_id)->get();
        $questions = DB::table('questions')->join('groups', 'questions.group_id', '=', 'groups.id')
        ->where('group_id', $group_id)->orderBy('questions.id', 'decs')->get(array(
            'questions.id',
            'problem',
            'answer1',
            'answer2',
            'answer3',
            'answer4',
            'correct',
            'explain',
            'level',
            'group_id',
            'group_name',
            'questions.created_at'
        ));
        return $questions;
    }
}
