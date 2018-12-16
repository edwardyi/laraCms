@extends('layouts.app')
@section('content')
      {!! Form::open(['action' => ['PostController@update', $post->id], 'method'=>'post', 'enctype' => 'multipart/form-data']) !!}
        <div class="form-group">
            {{Form::label('title', '標題')}}
            {{Form::text('title', $post->title ,['class'=>'form-control','placeholder'=>'請填寫標題'])}}
        </div>
        <div class="form-group">
            {{Form::label('body', '內容')}}
            {{Form::textarea('body', $post->body ,['id'=>'article-ckeditor','class'=>'form-control','placeholder'=>'請填寫內容'])}}
        </div>
        <div class="form-group">
            {{Form::file('img_upload')}}
        </div>
        <img width="300px" src="{{asset('storage/post_img/')}}/{{$post->img_upload}}"/>
        <div class="form-group">
            {{Form::submit('送出',['class'=>'btn btn-primary'])}}
                {{Form::hidden('_method','PUT')}}
            {!! Form::close() !!}    
        </div>
@endsection