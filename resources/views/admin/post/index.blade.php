@extends('layouts.app')

@section('content')
    <!--<a href="{{URL::to('/')}}/Posts/create" class="btn btn-primary">新增文章</a>-->
    @if(count($posts) > 0)
        @foreach ($posts as $post)
            <div class="card" style="margin-top:10px;">
                <div class="row" >
                    <div class="col-sm-4">
                        <img style="width:150px" src="{{asset('storage/post_img/')}}/{{$post->img_upload}}"/>
                    </div>
                    <div class="col-sm-8">
                         <h1>
                            <a href="{{URL::to('/')}}/Posts/{{$post->id}}">
                                {{$post->title}}    
                            </a>
                        </h1>
                        <small>{{$post->created_at}}</small>
                        <small>{{$post->user->name}}</small>
                    </div>
                </div>
            </div>
        @endforeach
        {{$posts->links()}}
    @else
        木有咚咚
    @endif
@stop