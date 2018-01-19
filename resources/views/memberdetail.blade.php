@extends('layouts.meta') 
@section('body')

<div class="container">
    <div class="panel panel-default">
        <div class="panel-heading">
            <h2>
                Member details
            </h2>
        </div>
        <div class="panel-body">

<div class="col-md-6">
            <img src="{{asset($m->image)}}" alt="{{$m->image}}" style="width:100%">
</div>
<div class="col-md-6">
            <h4>
                <b>{{$m->name}}</b>
                <br>
                <p>{{$m->designation}}</p>
            </h4>
            <h6>{{$m->details}}</h6>

        </div>
        </div>
    </div>
</div>

@endsection