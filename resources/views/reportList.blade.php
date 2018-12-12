@extends('layouts.meta')

@section('stylesheet_after')
    <link rel="stylesheet" href="{{asset('css/postlist.css')}}">
@endsection

@section('body')
<div class="container">
    <div class="panel panel-default">
        <div class="panel-heading">
            <h2>
                Reports
            </h2>
        </div>
        <div class="panel-body">
            <div class="list-group">
                @foreach($reports as $report)               
                    <a href="{{$report->link}}" class="list-group-item ">
                        <h4 class="list-group-item-heading">
                            {{$report->title}}
                        </h4>
                        <p class="list-group-item-text">
                            {{$report->link}}
                        </p>
                    </a>
                @endforeach
            </div>
        </div>
    </div>
    <div class="text-center">
        {{$reports->links()}}
    </div>
</div>

@endsection