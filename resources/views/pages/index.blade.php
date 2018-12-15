@extends('layouts.app')
@section('content')
  <div class="jumbotron text-center">
      <h1>{{$title}}</h1>
      <p>
        <a href="/login" class="btn btn-primary btn-g" role="button">登入</a>
        <a href="/register" class="btn btn-success btn-g" role="button">註冊</a>
      </p>
  </div>
@endSection
