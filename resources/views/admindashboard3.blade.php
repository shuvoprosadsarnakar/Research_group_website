@extends('layouts.meta') 
@section('body') 
@component('edit') 
@endcomponent

<div class="container">

    <div class="panel-body">
        <div class="row">
            <div class="col-md-7">
                <div class="panel panel-default">

                    <div class="panel-heading">
                        <h2>
                            Edit Project
                        </h2>
                    </div>
                    <div class="panel-body">
                        <div class="list-group">
                            @foreach($p as $m)
                            <div class="list-group-item">
                                <img src="{{asset($m->image)}}" alt="{{$m->image}}" style="width:100px">
                                <a href="{{route('delete.project',['id'=>$m->id])}}" class="btn btn-danger">X</a>
                                <a href="{{route('update.project',['id'=>$m->id])}}" class="btn btn-info">E</a>

                                <h4>
                                    <b>{{$m->name}}</b>
                                </h4>

                                <br>
                                <p>{{$m->details}}</p>
                            </div>
                            @endforeach
                        </div>
                    </div>

                </div>
            </div>


            <div class="col-md-5">
                <div class="well">
                    <form action="/create/project" method="post" enctype="multipart/form-data">
                        {{csrf_field()}}
                        <div class="form-group">
                            <label for="name">Name:</label>
                            <input type="text" name="name" class="form-control" id="name">
                        </div>
                        <div class="form-group">
                            <label for="details">Details:</label>
                            <textarea name="details" class="form-control" id="details" rows="3"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="image">Image:</label>
                            <input type="file" name="image" class="form-control" id="image" />
                        </div>
                        <div class="form-group">
                            <label for="git">Git link:</label>
                            <input type="text" name="git" class="form-control" id="git">
                        </div>
                        <div class="form-group">
                            <label for="youtube">Youtube link:</label>
                            <input type="text" name="youtube" class="form-control" id="youtube">
                        </div>
                        <div class="form-group">
                            <label for="demo">Demo link:</label>
                            <input type="text" name="demo" class="form-control" id="demo">
                        </div>
                        <button type="submit" class="btn btn-default">Create project</button>
                    </form>

                </div>
            </div>
        </div>
    </div>

    <div class="text-center">
        {{$p->links()}}
    </div>
</div>

@endsection
