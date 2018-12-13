<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $id = Auth::id();
        $user = User::find($id);
        return view('home')->with('user', $user);
    }

    public function unTest() 
    {
        $id = Auth::id();
        $user = User::find($id);
        $user->is_test = -1;
        $user->save();
        return redirect('home');
    }
}
