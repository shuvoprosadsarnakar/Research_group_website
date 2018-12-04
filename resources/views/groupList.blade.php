@extends('layouts.meta')

@section('stylesheet_after')
    <link rel="stylesheet" href="{{asset('css/postlist.css')}}">
@endsection

@section('body')
<div class="container">
    <div class="panel panel-default">
        <div class="panel-heading">
            <h2>
                Groups
            </h2>
        </div>
        <div class="panel-body">
            <ul class="cards">
<!-- start list of posts repeat this list item to add more posts -->
                @foreach($data as $group)               
                    <li class="cards__item_m">
                        <div class="card">
                            <div class="card__image" style="background-image: url({{ asset('uploads/'.$group->thumbNail) }}); " style="width:100%"></div>
                                <a  href="{{route('groupDetails',$group->id)}}" >
                                <div class="card__content">
                                    <div class="card__title">{{$group->groupName}}</div>
                                    <p class="card__text">{{substr($group->groupDescription,0,100) }}</p>
                                </div>
                                </a>
                        </div>
                    </li>
                    <li class="cards__item_m">
                        <div class="card">
                            <div class="card__image" style="background-image: url({{ asset('uploads/'.$group->thumbNail) }}); " style="width:100%"></div>
                                <a  href="{{route('groupDetails',$group->id)}}" >
                                <div class="card__content">
                                    <div class="card__title">{{$group->groupName}}</div>
                                    <p class="card__text">{{substr($group->groupDescription,0,100) }}</p>
                                </div>
                                </a>
                        </div>
                    </li>
                    <li class="cards__item_m">
                        <div class="card">
                            <div class="card__image" style="background-image: url({{ asset('uploads/'.$group->thumbNail) }}); " style="width:100%"></div>
                                <a  href="{{route('groupDetails',$group->id)}}" >
                                <div class="card__content">
                                    <div class="card__title">{{$group->groupName}}</div>
                                    <p class="card__text">{{substr($group->groupDescription,0,100) }}</p>
                                </div>
                                </a>
                        </div>
                    </li>
                    <li class="cards__item_m">
                        <div class="card">
                            <div class="card__image" style="background-image: url({{ asset('uploads/'.$group->thumbNail) }}); " style="width:100%"></div>
                                <a  href="{{route('groupDetails',$group->id)}}" >
                                <div class="card__content">
                                    <div class="card__title">{{$group->groupName}}</div>
                                    <p class="card__text">{{substr($group->groupDescription,0,100) }}</p>
                                </div>
                                </a>
                        </div>
                    </li>
                    <li class="cards__item_m">
                        <div class="card">
                            <div class="card__image" style="background-image: url({{ asset('uploads/'.$group->thumbNail) }}); " style="width:100%"></div>
                                <a  href="{{route('groupDetails',$group->id)}}" >
                                <div class="card__content">
                                    <div class="card__title">{{$group->groupName}}</div>
                                    <p class="card__text">{{substr($group->groupDescription,0,100) }}</p>
                                </div>
                                </a>
                        </div>
                    </li>
                @endforeach
<!-- end list of posts repeat this list item to add more posts -->
            </ul>
        </div>
    </div>
    <div class="text-center">
        {{$data->links()}}
    </div>
</div>

@endsection