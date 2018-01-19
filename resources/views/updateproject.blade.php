@extends('layouts.meta') 
@section('body')

<div class="container">
    <div class="well">
        <form action="/save/project/{{$m->id}}" method="post" enctype="multipart/form-data">
            {{csrf_field()}}
            <h2> Update Project</h2>
            <div class="form-group">
                <label for="name">Name:</label>
                <input type="text" name="name" class="form-control" value="{{$m->name}}" id="name">
            </div>
            <div class="form-group">
                <label for="details">Details:</label>
                <input type="text" name="details" class="form-control" value="{{$m->details}}" id="details">
            </div>
            <div class="form-group">
                <label for="image">Image:</label>
                <input type="file" name="image" class="form-control" id="image" />
            </div>
            <div class="form-group">
                <label for="git">Git link:</label>
                <input type="text" name="git" class="form-control" value="{{$m->git}}" id="git">
            </div>
            <div class="form-group">
                <label for="youtube">Youtube link:</label>
                <input type="text" name="youtube" class="form-control" value="{{$m->youtube}}" id="youtube">
            </div>
            <div class="form-group">
                <label for="demo">Demo link:</label>
                <input type="text" name="demo" class="form-control" value="{{$m->demo}}" id="demo">
            </div>
            <button type="submit" class="btn btn-default">Update</button>
        </form>
    </div>
</div>

@endsection