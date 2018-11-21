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
        @foreach($posts as $post)
        
        <div class="panel-body">
            <ul class="media-list">
<!-- start list of posts repeat this list item to add more posts -->
                <li class="media">
                    <div class="media-left">
                        <a href="">
                            <!-- Image/thumbnail of the post -->
                            <img class="media-object" src="{{asset('images/kmisir.jpg')}}" alt="...">
                        </a>
                    </div>
                    <div class="media-body">
                        <a href="">
                            <!-- Title/name of the post -->
                            <h4 class="media-heading">{{$post->title}}</h4>
                        </a>
                        <!-- Description of the post -->
                        <p>{{$post->description}}</p>
                        <p>Start Date: {{$post->startDate}}</p>
                        <p>Finish Date: {{$post->finishDate}}</p>
                    </div>
                </li>
            </ul>
        </div>
        @endforeach
    </div>
</div>
@endsection


@section('javascript')

@endsection