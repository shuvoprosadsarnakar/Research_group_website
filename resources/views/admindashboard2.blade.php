@extends('layouts.meta') 
@section('body')


@component('edit')
@endcomponent



<div class="panel-body container">
    <div class="row">
        <div class="col-md-7">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h2>
                        Edit Publications
                    </h2>
                </div>
                <div class="panel-body">
                    <div class="list-group">
                        @foreach($publications as $p)
                            <div  class="list-group-item">
                            <a href="{{$p->link}}">
                       
                            {{$p -> name}}
                            
                            </a>
                            <a href="{{route('delete.publications',['id'=>$p->id])}}" class="btn btn-danger">X</a>
                            <a href="{{route('update.publications',['id'=>$p->id])}}" class="btn btn-info">E</a>
                            </div>
                        @endforeach
                    </div>
                </div>

            </div>
        </div>

        <div class="col-md-5">
            <div class="well">
                <form action="/create/publications" method="post">
                    {{csrf_field()}}
                    <div class="form-group">
                        <label for="name">Name:</label>
                        <input type="text" name="name" class="form-control" id="name">
                    </div>
                    <div class="form-group">
                        <label for="link">Link:</label>
                        <input type="text" name="link" class="form-control" id="link">
                    </div>
                    <button type="submit" class="btn btn-default">Create publication</button>
                </form>
            </div>
        </div>
    </div>
        <div class="text-center">
    {{$publications->links()}}
    </div>
</div>

@endsection