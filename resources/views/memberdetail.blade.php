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
            <h2>
                Member details
            </h2>
        </div>
        <div class="panel-body">
        <div class="row">
            <div class="col-md-6 img">
            <img src="{{ asset('uploads/'.$data->imagePath) }}"  alt="{{$data->name}}" class="img-rounded">
            </div>
            <div class="col-md-6 details">
                <blockquote>
                    <h5>{{ $data->name }}</h5>
                    <small>{{$data->designation}}</small>
                </blockquote>
                <p>
                    Email: {{$data->email}} <br>
                    Git: {{$data->github}} <br>
                    Linkedin: {{$data->linkedin}}
                </p>
                <div class="row">
                    <div class="col-md-6">
                        <blockquote>
                            <h5>Interests</h5>
                            <p>{{$data->interest}}</p>
                        </blockquote>
                    </div>
                    <div class="col-md-6">
                        <blockquote>
                            <h5>Working area</h5>
                            <p>{{$data->researchArea}}</p>
                        </blockquote>
                    </div>
                </div>
            </div>
            </div>
                
        </div>
    </div>
</div>

@endsection