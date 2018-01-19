@extends('layouts.meta') 
@section('body')
<div class="container">
    <div class="panel panel-default">
        <div class="panel-heading">
            <h2>
                Members
            </h2>
        </div>
<div class="panel-body">
    <div class="row">
        @foreach($members as $m)
        <a href="memberdetail/{{$m->id}}">
            <div class="col-md-3 col-sm-4 col-xs-12">
                <div class="card">
                    <img src="{{$m->image}}" alt="{{$m->image}}" style="width:100%">
                    <div class="cardcontainer">
                        <h4>
                            <b>{{$m->name}}</b>
                        </h4>
                        <p>{{$m->designation}}</p>
                    </div>
                </div>
            </div>
        </a>
        @endforeach
    </div>
</div>
</div>
</div>

@endsection