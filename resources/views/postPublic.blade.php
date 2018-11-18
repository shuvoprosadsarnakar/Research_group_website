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
            <div class="list-group">
                <a href="#" class="list-group-item">
                    <div class="row">
                        <div class="col-md-3"> 
                            <img src="{{asset('images/diu.png')}}" alt="">
                        </div>
                        <div class="col-md-3">
                            <h4 class="list-group-item-heading">List group item heading</h4>
                            <p class="list-group-item-text">...</p>
                        </div>
                    </div>
                </a>
            </div>
        </div>
    </div>
</div>
@endsection


@section('javascript')

@endsection