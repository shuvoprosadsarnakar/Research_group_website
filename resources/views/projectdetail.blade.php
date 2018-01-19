@extends('layouts.meta') 
@section('body')

<div class="container">
    <div class="panel panel-default">
        <div class="panel-heading">
            <h2>
                Project details
            </h2>
        </div>
        <div class="panel-body">

<div class="col-md-4">
            <img src="{{asset($p->image)}}" alt="{{$p->image}}" style="width:100%">
</div>
<div class="col-md-6">
            <h3>
                <b>{{$p->name}}</b>
            </h3>
                <a href="{{$p->git}}" target="_blank"> <p>Git repository</p></a>
                <a href="{{$p->youtube}}" target="_blank"> <p>watch it in action</p></a>
                <a href="{{$p->demo}}" target="_blank"> <p>Live or Demo</p></a>
                <br>
            <h5>{{$p->details}}</h5>
        </div>
        </div>
    </div>
</div>

@endsection