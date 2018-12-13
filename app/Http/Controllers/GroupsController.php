<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Group;
use App\Question;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\DB;

class GroupsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    
    public function index()
    {
        $groups = Group::where('class', '10')->orderBy('id', 'decs')->get();
        return view('groups.group')->with('groups', $groups);
    }

    public function store(Request $request)
    {
        $group = new Group;
        $group->group_name = $request->group_name;
        $group->class = $request->class;
        try
        {
            $group->save();
            return redirect('/admin/group')->with('success', 'Thêm bộ câu hỏi mới thành công');
        } catch(QueryException $ex) 
        {
            return redirect('/admin/group')->with('error', 'Không thể thêm mới bộ câu hỏi');
        }
        
    }

    public function delete(Request $request)
    {
        $group_id = $request->id;
        try {
            Question::where('group_id', $group_id)->delete();
            Group::find($group_id)->delete();
            return 1; //redirect('/admin/group')->with('success', 'Xóa bộ câu hỏi thành công');
        } catch(QueryException $ex)
        {
            return 0; //redirect('/admin/group')->with('error', 'Không thể xóa bộ câu hỏi');
        }
    }

    public function getList(Request $request)
    {
        $class = $request->class;
        // $groups = DB::table('groups')->join('questions', 'groups.id', '=', 'questions.group_id')
        // ->select('groups.id', 'groups.group_name', 'groups.created_at', DB::raw("count(questions.group_id) as count"))
        // ->groupBy('groups.id')
        // ->get();
        $groups = Group::where('class', '=', $class)->orderBy('id', 'decs')->get();
        return $groups;
    }

    public function edit(Request $request)
    {
        $id = $request->id;
        $class  = $request->class;
        $group_name = $request->group_name;
        $group = Group::find($id);
        if($group) 
        {
            $group->class = $class;
            $group->group_name = $group_name;
            $group->save();
            return 1;
        } else 
        {
            return 0;
        }
    }
}
