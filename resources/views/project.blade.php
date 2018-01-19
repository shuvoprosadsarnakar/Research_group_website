@extends('layouts.meta') 
@section('body')

<div class="container">
<div class="panel panel-default">
        <div class="panel-heading">
            <h2>
                Projects
            </h2>
        </div>
        <div class="panel-body">
  @foreach($p as $pr)

  <div class="list-group">
    <a href="projectdetails/{{$pr->id}}" class="list-group-item">
      <h4 class="list-group-item-heading">{{$pr -> name}}</h4>
      <p class="list-group-item-text">{{$pr -> details}}</p>
    </a>
    @endforeach
  </div>
  </div>
  </div>
  </div>
  @endsection
