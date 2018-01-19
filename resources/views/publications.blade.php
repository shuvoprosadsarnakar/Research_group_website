@extends('layouts.meta') 
@section('body')
<div class="container">
    <div class="panel panel-default">
        <div class="panel-heading">
        <div class="row">
        <div class="col-md-6 col-sm-12 col-xs-12">
            <h4>
                Publications
            </h4>
            </div>
            <div class="col-md-6 col-sm-12 col-xs-12">
            <form action="/search/publications" method="post">
                    {{csrf_field()}}
            <div class="input-group">
                <input type="text" class="form-control" name="search" placeholder="Search...">
                <span class="input-group-btn">
                    <button class="btn btn-default" type="submit">Go!</button>
                </span>
            </div>
            </form>
        </div>
        </div>
        </div>
        <div class="panel-body">
            <div class="list-group">
                @foreach($publications as $p)
                <a href="{{$p->link}}" class="list-group-item">{{$p -> name}}</a>
                @endforeach
            </div>
        </div>
    </div>

    <div class="text-center">
        {{$publications->links()}}
    </div>
</div>

@endsection