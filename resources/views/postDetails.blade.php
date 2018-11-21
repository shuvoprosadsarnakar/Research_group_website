@extends('layouts.meta')

@section('stylesheet')

@endsection


@section('body')
<div class="container">
    <div class="panel panel-default">
        <div class="panel-heading">
            <h2>
                Post details
            </h2>
        </div>

        <div class="panel-body">
            <div class="col-md-4">
                <img src="{{asset('images/kmisir.jpg')}}" alt="" style="width:100%">
            </div>
            <div class="col-md-8">
                <h4>
                    <b>
                        {{$post->title}}
                    </b>
                    <br>
                    <p>Start Date: {{$post->startDate}}</p>
                    <p>Finish Date: {{$post->finishDate}}</p>
                    <p>Status: {{$post->status}}</p>
                    <p>Type: {{$post->type}}</p>
                </h4>
                <p>
                    {{$post->description}}
                </p>
            </div>
        </div>
    </div>
</div>
@endsection


@section('javascript')

@endsection