@extends('layouts.meta')

@section('stylesheet_after')
    <link rel="stylesheet" href="{{asset('css/postlist.css')}}">
@endsection

@section('body')
<div class="container">
    <div class="panel panel-default">
        <div class="panel-heading">
            <h2>
                Publications
            </h2>
        </div>
        <div class="panel-body">
            <div class="list-group">
                @foreach($publications as $publication)               
                    <a href="{{$publication->link}}" class="list-group-item ">
                        <h4 class="list-group-item-heading">
                            {{$publication->title}}
                        </h4>
                        <p class="list-group-item-text">
                            {{$publication->link}}
                        </p>
                    </a>
                @endforeach
            </div>
        </div>
    </div>
    <div class="text-center">
        {{$publications->links()}}
    </div>
</div>

@endsection