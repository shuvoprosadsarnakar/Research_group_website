@extends('layouts.meta') 
@section('body')

<div class="container">
    <div class="well">
        <form action="/save/member/{{$member->id}}" method="post" enctype="multipart/form-data">
            {{csrf_field()}}
            <h2> Update member</h2>
            <div class="form-group">
                <label for="name">Name:</label>
                <input type="text" name="name" class="form-control" value="{{$member->name}}" id="name">
            </div>
            <div class="form-group">
                <label for="designation">Designation:</label>
                <input type="text" name="designation" class="form-control" value="{{$member->designation}}" id="designation">
            </div>
            <div class="form-group">
                <label for="details">Details:</label>
                <input type="text" name="details" class="form-control" value="{{$member->details}}" id="details">
            </div>
            <div class="form-group">
                <label for="image">Image:</label>
                <input type="file" name="image" class="form-control" id="image" />
            </div>
            <button type="submit" class="btn btn-default">Update</button>
        </form>
    </div>
</div>

@endsection