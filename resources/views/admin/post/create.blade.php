@extends('layouts.app')
@section('content')
    {!! Form::open(['action' => 'PostController@store', 'method'=>'post', 'enctype'=>'multipart/form-data']) !!}
        <div class="form-group">
            {{Form::label('title', '標題')}}
            {{Form::text('title', '' ,['class'=>'form-control','placeholder'=>'請填寫標題'])}}
        </div>
        <div class="form-group">
            {{Form::label('body', '內容')}}
            {{Form::textarea('body', '' ,['id'=>'article-ckeditor','class'=>'form-control','placeholder'=>'請填寫內容'])}}
        </div>
        <div class="form-group">
            {{Form::file('img_upload')}}
        </div>
        {{Form::submit('送出',['class'=>'btn btn-primary'])}}
    {!! Form::close() !!}
@endsection