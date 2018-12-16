@extends('layouts.app')
@section('content')
    @if(count($posts)>0)
    <h3>文章列表</h3>
    <table class="table table-striped">
        <tr>
            <th>標題</th>
            <th>內容</th>
            <th>操作</th>
        </tr>
        @foreach($posts as $post)
            <tr>
                <td>
                     <a href="{{URL::to('/')}}/Posts/{{$post->id}}/edit" >
                         {{$post->title}}
                     </a>
                 </td>
                 <td>
                     {!!$post->body!!}
                 </td>
                <td>
                    {!! Form::open(['action'=>['PostController@destroy', $post],'method'=>'post'])!!}
                    {!! Form::submit('刪除', ['class'=>'btn btn-danger']) !!}
                    {!! Form::hidden('_method','DELETE') !!}
                    {!! Form::close()!!}
                </td>
            </tr>
        @endforeach
    </table>
    @else
        <h3>尚無任何文章</h3>
    @endif
@endsection