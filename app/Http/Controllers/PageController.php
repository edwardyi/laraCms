<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    
    public function welcome()
    {
        $title = "Welcome";
        return view('pages.welcome', compact('title'));
    }
    
    public function about()
    {
        $title = 'About';
        return view('pages.about')->with('title', $title);
    }
    
    public function services()
    {
        $services = ['PHP', 'Mysql', 'CSS', 'JS'];
        return view('pages.services')->with('services', $services);
    }
}
