@extends('layouts.app')
@section('content')
  <h1>文章列表</h1>
  @if(count($posts) > 0)
    @foreach($posts as $post)
      <div class="well">
        <h1>
          <a href="/posts/{{$post->id}}">{{$post->title}}</a>
        </h1>
        <small>文章建立時間:{{$post->created_at}}</small>
      </div>
    @endforeach
  @endif
@endSection