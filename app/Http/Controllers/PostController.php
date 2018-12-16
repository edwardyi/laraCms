<?php

namespace App\Http\Controllers;

use App\Edward\Posts\Post;
use Illuminate\Http\Request;
// 要引用了才能夠用使用Auth的user方法
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
     /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // 未登入也可以查看文章
        $this->middleware('auth')->except('index','show');
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $posts = \App\Post::all();
        // orderby才有paginate的方法
        $posts = \App\Post::orderBy('id', 'DESC')->paginate(10);
        
        return view('admin.post.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.post.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'title' => 'required',
            'body' => 'required',
            'img_upload' => 'image|nullable|max:1999'
        ]);
        
        // 新增圖片
        if ($request->hasFile('img_upload')) {
            $fileName = pathinfo($request->img_upload->getClientOriginalName(), PATHINFO_FILENAME);
            $md5Name = md5_file($request->img_upload->getRealPath());
            $extensionName = $request->img_upload->getClientOriginalExtension();
            $pathName = 'public/post_img/';
            $targetName = $fileName.'_'.$md5Name.'.'.$extensionName;
            $request->img_upload->storeAs($pathName, $targetName);
        } else {
            $targetName = 'no_image.jpg';
        }
        
        $post = new \App\Post();
        $post->title=$request->title;
        $post->body=$request->input('body');
        $post->user_id= auth()->user()->id; 
        $post->img_upload = $targetName;
        $post->saveOrFail();
        
        
        return redirect('/Posts')->with('success', '文章建立成功');
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = \App\Post::find($id);
        return view('admin.post.detail', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = \App\Post::find($id);
        
        if (auth()->user()->id != $post->user_id) {
            return redirect('/Posts')->with('error', '非法操作');
        }
        return view('admin.post.edit', compact('post'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'title' => 'required',
            'body' => 'required',
            'img_upload' => 'image|nullable|max:1999'
        ]);
        
        if ($request->hasFile('img_upload')) {
            $fileName = pathinfo($request->img_upload->getClientOriginalName(), PATHINFO_FILENAME);
            $md5Name = md5_file($request->img_upload->getRealPath());
            $extensionName = $request->img_upload->getClientOriginalExtension();
            $pathName = 'public/post_img/';
            $targetName = $fileName.'_'.$md5Name.'.'.$extensionName;
            $request->file('img_upload')->storeAs($pathName, $targetName);
        } 

        $post = \App\Post::find($id);
        $post->title=$request->title;
        $post->body=$request->input('body');
        $post->user_id= auth()->user()->id;
        if ($request->hasFile('img_upload')) {
            $post->img_upload = $targetName;    
        }
        
        $post->save();
        
        return redirect('/Posts')->with('success', '文章更新成功');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = \App\Post::find($id);
        if (auth()->user()->id != $post->user_id) {
            return redirect('/Posts')->with('error', '非法操作');
        }
        if ($post->img_upload != 'no_image.jgp') {
            Storage::delete('public/post_img/'.$post->img_upload);
        }
        $post->delete();
        return redirect('/Posts')->with('success', '文章刪除成功');
        
    }
}
