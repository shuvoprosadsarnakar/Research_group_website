@extends('layouts.meta')

@section('stylesheet_after')
    <link rel="stylesheet" href="{{asset('css/postlist.css')}}">
@endsection

@section('body')
<div class="container">
    <div class="panel panel-default">
        <div class="panel-heading">
            <h2>
                Members
            </h2>
        </div>
        <div class="panel-body">
            <ul class="cards">
<!-- start list of posts repeat this list item to add more posts -->
                @foreach($data as $member)               
                <li class="cards__item_m">
                    <div class="card">
                        <div class="card__image" style="background-image: url({{ asset('uploads/'.$member->imagePath) }});"></div>
                            <a  href="{{route('memberDetails',$member->id)}}" >
                            <div class="card__content">
                                <div class="card__title">{{$member->name}}</div>
                                <p class="card__text">{{ $member->designation }}</p>
                                <p class="card__text">{{ $member->email }} &nbsp; </p>
                            </div>
                            </a>
                    </div>
                </li>
                <li class="cards__item_m">
                    <div class="card">
                        <div class="card__image" style="background-image: url({{ asset('uploads/'.$member->imagePath) }});"></div>
                            <a  href="{{route('memberDetails',$member->id)}}" >
                            <div class="card__content">
                                <div class="card__title">{{$member->name}}</div>
                                <p class="card__text">{{ $member->designation }}</p>
                                <p class="card__text">{{ $member->email }} &nbsp; </p>
                            </div>
                            </a>
                    </div>
                </li>
                @endforeach
<!-- end list of posts repeat this list item to add more posts -->
            </ul>
        </div>
    </div>
</div>

@endsection