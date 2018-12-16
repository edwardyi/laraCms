<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Article;
use App\Articles\Requests\CreateArticleRequest;

use App\Articles\Repositories\Interfaces\ArticleRepositoryInterface;


class ArticleApiController extends Controller
{
    
    private $articleRepo;
    public function __construct(ArticleRepositoryInterface $articleRepository)
    {
        // 注入repository
        $this->articleRepo = $articleRepository;
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateArticleRequest $request)
    {
        // 兩種寫法都可以
        // 方法1:建立model後,接一個http status code
        // return Article::create($request->all(), 201);
        
        // 方法2:用response()方法回傳json格式和http status code
        // $article = Article::create($request->all());
        // return response()->json($article, 201);
        
        // 方法3:repository 重構
        // 透過repository來實作實際的方法
        $article = $this->articleRepo->create($request->all());
        return response()->json($article, 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
