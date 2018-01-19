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
                            Edit deliverable
                        </h2>
                    </div>
                    <div class="panel-body">
                        <div class="list-group">
                            @foreach($p as $m)
                            <div class="list-group-item">
                                <a href="{{route('delete.deliverable',['id'=>$m->id])}}" class="btn btn-danger">X</a>
                                <a href="{{route('update.deliverable',['id'=>$m->id])}}" class="btn btn-info">E</a>
                                <h4>
                                    <b>{{$m->name}}</b>
                                </h4>
                                <br>
                                <img src="{{$m->image}}" alt="{{$m->image}}" style="width:100px">
                                <p>{{$m->details}}</p> <br>
                                <a href="{{$m->link}}">Visit to learn more</a>
                            </div>
                            @endforeach
                        </div>
                    </div>

                </div>
            </div>


            <div class="col-md-5">
                <div class="well">
                    <form action="/create/deliverable" method="post" enctype="multipart/form-data">
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
                            <label for="link">link:</label>
                            <input type="text" name="link" class="form-control" id="link">
                        </div>
                        <button type="submit" class="btn btn-default">Create deliverable</button>
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
