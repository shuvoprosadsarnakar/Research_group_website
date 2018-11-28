@extends('layouts.meta') 

@section('stylesheet_after')
    <link rel="stylesheet" href="{{asset('css/postlist.css')}}">
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
                        <a href="@if(Request::path()=='posts/description/asc')
                                    {{ route('posts_order',['criteria' => 'description','order' => 'desc']) }}
                                @else
                                    {{ route('posts_order',['criteria' => 'description','order' => 'asc']) }}
                                @endif">
                            Description
                        </a>
                    </th>
                    <th>
                        <a href="@if(Request::path()=='posts/startDate/asc')
                                    {{ route('posts_order',['criteria' => 'startDate','order' => 'desc']) }}
                                @else
                                    {{ route('posts_order',['criteria' => 'startDate','order' => 'asc']) }}
                                @endif">
                            Start date
                        </a>
                    </th>
                    <th>
                        <a href="@if(Request::path()=='posts/startDate/asc')
                                    {{ route('posts_order',['criteria' => 'finishDate','order' => 'desc']) }}
                                @else
                                    {{ route('posts_order',['criteria' => 'finishDate','order' => 'asc']) }}
                                @endif">
                            Finish date
                        </a>
                    </th>
                </tr>
            </table>
            <ul class="cards">
<!-- start list of posts repeat this list item to add more posts -->
                @foreach($posts as $post)               
                <li class="cards__item">
                    <div class="card">
                    <div class="card__image" style="background-image: url(https://unsplash.it/800/600?image=59);"></div>
                    <div class="card__content">
                        <div class="card__title">{{substr($post->title, 0, 60)}}</div>
                        <p class="card__text">{{substr($post->description, 0, 100)}}</p>
                        <p class="card__text">Start Date: {{$post->startDate}} &nbsp; Finish Date: {{$post->finishDate}}</p>
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