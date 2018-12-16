@extends('layouts.app')
@section('content')
    <a href="{{URL::to('/')}}/Posts" class="btn btn-default">返回</a>
    <h1>{{$post->title}}</h1>
    <div><img style="width:300px" src="{{asset('storage/post_img/')}}/{{$post->img_upload}}"/></div>
    <div>{!!$post->body!!}</div>
    <hr>
    <small>{{$post->created_at}}</small>
    @if(auth()->user() && auth()->user()->id==$post->user_id)
    <div class="ml-auto">
      <a href="{{URL::to('/')}}/Posts/{{$post->id}}/edit" class="btn btn-info">編輯</a>
      {!! Form::open(['action' => ['PostController@destroy', $post->id], 'method'=>'post', 'class'=>'float-right']) !!}
          <input type="submit" name="submit" value="刪除"  class="btn btn-danger" />
        {{Form::hidden('_method', 'DELETE')}}
      {!! Form::close() !!}
    </div>
    @endif
@endsection