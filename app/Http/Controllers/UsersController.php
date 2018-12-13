<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Topic;

class UsersController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function topic(Request $request)
    {
        $class = $request->class;
        $topics = Topic::where('class', $class)->get();
        return view('users.topic')->with('topics', $topics);
    }
}
