@extends('layouts.meta') 

@section('stylesheet')

@endsection


@section('body')

<div class="container">
    <div class="panel panel-default">
        <div class="panel-heading">
            <h2>
                Posts
            </h2>
        </div>
        <div class="panel-body">
            <table class="table">
                <tr>
                    <th></th>
                    <th>
                        <a href="@if(Request::path()=='posts/title/asc')
                                    {{ route('posts_order',['criteria' => 'title','order' => 'desc']) }}
                                @else
                                    {{ route('posts_order',['criteria' => 'title','order' => 'asc']) }}
                                @endif">
                            Title
                        </a>
                    </th>
                    <th>
                        <a href="{{ route('posts_order',['criteria' => 'title','order' => 'asc']) }}">
                            Description
                        </a>
                    </th>
                    <th>
                        <a href="{{ route('posts_order',['criteria' => 'title','order' => 'asc']) }}">
                            Start date
                        </a>
                    </th>
                    <th>
                        <a href="{{ route('posts_order',['criteria' => 'title','order' => 'asc']) }}">
                            Finish date
                        </a>
                    </th>
                </tr>
            </table>
            <ul class="media-list">
<!-- start list of posts repeat this list item to add more posts -->
                @foreach($posts as $post)
                    <li class="media">
                        <div class="media-left">
                            <a href="{{ route('post_details',['id' => $post->id]) }}">
                                <!-- Image/thumbnail of the post -->
                                <img class="media-object" src="{{asset('images/kmisir.jpg')}}" alt="...">
                            </a>
                        </div>
                        <div class="media-body">
                            <a href="{{ route('post_details',['id' => $post->id]) }}">
                                <!-- Title/name of the post -->
                                <h4 class="media-heading">
                                    {{$post->title}}
                                </h4>
                            </a>
                            <!-- Description of the post -->
                            <p>
                                {{$post->description}}
                            </p>
                            <p>Start Date: {{$post->startDate}}</p>
                            <p>Finish Date: {{$post->finishDate}}</p>
                        </div>
                        <div class="media-right">
                                <a href="{{route('post_delete',['id'=>$post->id])}}" class="btn btn-danger">X</a>
                                <a href="{{route('post_edit',['id'=>$post->id])}}" class="btn btn-info">E</a>
                        </div>
                    </li>
                @endforeach
<!-- end list of posts repeat this list item to add more posts -->
            </ul>
        </div>
    </div>

    <div class="text-center">
        {{$posts->links()}}
    </div>
</div>
@endsection


@section('javascript')

@endsection