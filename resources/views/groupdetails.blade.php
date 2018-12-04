@extends('layouts.meta') 

@section('stylesheet_after')
    <style>
    .container .img{
        text-align:center;
    }
    .container .details{
        border-left:3px solid #ded4da;
    }
    .container .details p{
        font-size:15px;
    }
    </style>
@endsection

@section('body')
<div class="container">
    <div class="panel panel-default">
        <div class="panel-heading">
            <div class="row">
                
                <div class="col-md-10">
                <h2>
                    {{$group->groupName}}
                </h2>
                <p>
                    {{$group->groupDescription}}
                </p>
                </div>
                <div class="col-md-2" >
                    <div class="thumbnail">

                        <img src="{{ asset('uploads/'.$group->thumbNail)  }}" alt="" >
                    </div>
                </div>
            </div>
            
        </div>
        <div class="panel-body">
            <div class="row">
                <div class="col-md-6 details">
                <h4>Members</h4>
                    <div class="list-group">
                        @foreach ($group->member as $member)
                            <a href="{{route('memberDetails',$member->id)}}" class="list-group-item">{{$member->name}}</a>
                        @endforeach
                    </div>
                </div>
                <div class="col-md-6 details">
                <h4>Works</h4>
                    <div class="list-group">
                        @foreach ($group->post as $post)
                            <a href="{{ route('post_details',['id' => $post->id]) }}" class="list-group-item ">
                                <h4 class="list-group-item-heading">{{$post->title}}</h4>
                                <p class="list-group-item-text">{{substr($post->description, 0, 150)}}</p>
                            </a>
                        @endforeach
                    </div>
                </div>
            </div>    
        </div>
    </div>
</div>

@endsection