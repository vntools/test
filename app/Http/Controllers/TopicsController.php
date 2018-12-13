<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Database\QueryException;
use App\Topic;
use App\Test;

class TopicsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function index()
    {
        $topics = Topic::where('class', '10')->orderBy('id', 'decs')->get();
        return view('topics.topic')->with('topics', $topics);
    }

    public function store(Request $request)
    {
        $topic = new Topic;
        $topic->topic_name = $request->topic_name;
        $topic->class = $request->class;
        try
        {
            $topic->save();
            return redirect('/admin/topic')->with('success', 'Thêm chủ đề mới thành công');
        } catch(QueryException $ex) 
        {
            return redirect('/admin/topic')->with('error', 'Không thể thêm mới chủ đề');
        }
    }

    public function getList(Request $request)
    {
        $class = $request->class;
        $topics = Topic::where('class', '=', $class)->orderBy('id', 'decs')->get();
        return $topics;
    }

    public function edit(Request $request)
    {
        $id = $request->id;
        $class  = $request->class;
        $topic_name = $request->topic_name;
        $topic = Topic::find($id);
        if($topic) 
        {
            $topic->class = $class;
            $topic->topic_name = $topic_name;
            $topic->save();
            return 1;
        } else 
        {
            return 0;
        }
    }

    public function delete(Request $request)
    {
        $topic_id = $request->id;
        try
        {
            Test::where('topic_id', $topic_id)->delete();
            Topic::find($topic_id)->delete();
            return 1; //redirect('/admin/topic')->with('success', 'Xóa chủ đề thành công');
        } catch(QueryException $ex) 
        {
            return 0; //redirect('/admin/topic')->with('error', 'Không thể xóa chủ đề');
        }
    }
}
