@extends('layouts.app')
@section('content')
  <a href="/posts" class="btn btn-default">返回</a>
  <div class="well">
    <h1>
      <a href="/posts/{{$post->id}}">{{$post->title}}</a>
    </h1>
    <hr>
    <small>文章建立時間:{{$post->created_at}}</small>
    <p>{{$post->body}}</p>
@endsection