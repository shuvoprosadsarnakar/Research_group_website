@extends('layouts.meta') @section('body')

<div class="container">
    <div class="well">
        <form action="/save/publications/{{$publications->id}}" method="post">
            {{csrf_field()}}
            <h2> Update member</h2>
            <div class="form-group">
                <label for="name">Name:</label>
                <input type="text" name="name" class="form-control" value="{{$publications->name}}" id="name">
            </div>
            <div class="form-group">
                <label for="designation">Link:</label>
                <input type="text" name="link" class="form-control" value="{{$publications->link}}" id="designation">
            </div>
            <button type="submit" class="btn btn-default">Update</button>
        </form>
    </div>
</div>

@endsection