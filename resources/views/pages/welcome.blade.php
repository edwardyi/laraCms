@extends('layouts.app')
@section('content')
    <div class="jumbotron">
      <h1 class="display-4">{{$title}}</h1>
      <p class="lead">This is a simple hero unit, a simple jumbotron-style component for calling extra attention to featured content or information.</p>
      <hr class="my-4">
      <p>It uses utility classes for typography and spacing to space content out within the larger container.</p>
      <div class="center">
          <a class="btn btn-primary btn-lg" href="#" role="button">註冊</a>
          <a class="btn btn-info btn-lg" href="#" role="button">登入</a>    
      </div>
    </div>
@endsection