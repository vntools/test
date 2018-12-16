<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Test;
use App\Question;

class AdminController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $totalUser = User::count();
        $totalQuestion = Question::count();
        $totalTest = Test::where('is_required', '=', '1')->count();
        $totalTestPractice = Test::where('is_required', '<>', '1')->count();
        return view('admin-home')->with(['totalUser' => $totalUser, 'totalQuestion' => $totalQuestion, 'totalTest' => $totalTest, 'totalTestPractice'=> $totalTestPractice]);
    }
}
