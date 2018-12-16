<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// 要引用了才能夠用使用Auth的user方法
use Illuminate\Support\Facades\Auth;

class DashBoardController extends Controller
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
        return view('home');
    }
    
    public function dashboard()
    {
        $user_id = auth()->user()->id;
        $posts = \App\Post::where('user_id',$user_id)->get();
        return view('admin.post.list', compact('posts'));
    }
}
