@extends('layouts.meta') 

@section('stylesheet_after')
    <link rel="stylesheet" href="{{asset('css/postlist.css')}}">
@endsection


@section('body')

<div class="container">
    <div class="panel panel-default">
        <div class="panel-heading">
            <h2>
                {{$type}}
            </h2>
        </div>
        <div class="panel-body">
   
            <ul class="cards">
<!-- start list of posts repeat this list item to add more posts -->
                @foreach($posts as $post)               
                <li class="cards__item">
                    <div class="card">
                        <div class="card__image" style="background-image: url({{ asset('uploads/'.$post->thumbNail)}});"></div>
                        <div class="card__content">
                            <div class="card__title">{{substr($post->title, 0, 60)}}</div>
                            <p class="card__text">{{substr($post->description, 0, 100)}}</p>
                            <p class="card__text">Type: {{$post->postType->name}} &nbsp; Finish Date: {{$post->finishDate}}</p>
                            <a  href="{{ route('post_details',['id' => $post->id]) }}" class="btn btn--block card__btn">Open</a>
                        </div>
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