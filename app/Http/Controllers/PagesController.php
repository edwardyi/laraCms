<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function index(){
        $title = "Welcom To LaraCms";
        return view('pages.index',compact('title'));
    }
    public function about(){
        $title = "About";
        return view('pages.about' ,compact('title'));
    }
    public function services(){
        $data = array(
            'title'=>'Services',
            'services' => ['Web Design','Programming']
        );
        return view('pages.service')->with($data);
    }
}
