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
                    </li>
                @endforeach
<!-- end list of posts repeat this list item to add more posts -->
            </ul>
        </div>
    </div>
</div>
@endsection


@section('javascript')

@endsection