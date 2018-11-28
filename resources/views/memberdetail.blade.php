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
            <img src="{{ asset('uploads/'.$data->imagePath) }}" alt="{{$data->name}}" style="width:100%">
                <h4>
                    <b>{{ $data->name }}</b>
                    <br>
                    <p>{{$data->designation}}</p>
                </h4>
                <h6>{{$data->researchArea}}</h6>
                <p>{{$data->github}}</p>
                <p>{{$data->linkedin}}</p>
                <p>{{$data->interest}}</p>
                <p>{{$data->phone}}</p>
                <p>{{$data->email}}</p>
            </div>
        </div>
    </div>
</div>

@endsection