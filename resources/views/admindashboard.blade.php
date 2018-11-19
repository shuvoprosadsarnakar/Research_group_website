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
                            Edit Members
                        </h2>
                    </div>
                    <div class="panel-body">
                        <div class="list-group">
                            @foreach($members as $m)
                            <div class="list-group-item">
                                <a href="{{route('delete.member',['id'=>$m->id])}}" class="btn btn-danger">X</a>
                                <a href="{{route('update.member',['id'=>$m->id])}}" class="btn btn-info">E</a>

                                <img src="{{asset($m->image)}}" alt="{{$m->image}}" style="width:100px">

                                <h4>
                                    <b>{{$m->name}}</b>
                                </h4>

                                <br>
                                <p>{{$m->designation}}</p>
                            </div>
                            @endforeach
                        </div>
                    </div>

                </div>
            </div>





            <div class="col-md-5">
                <div class="well">
                    <form action="/create/member" method="post" enctype="multipart/form-data">
                        {{csrf_field()}}
                        <div class="form-group">
                            <label for="name">Name:</label>
                            <input type="text" name="name" class="form-control" id="name">
                        </div>
                        <div class="form-group">
                            <label for="designation">Designation:</label>
                            <input type="text" name="designation" class="form-control" id="designation">
                        </div>
                        <div class="form-group">
                            <label for="details">Details:</label>
                            <textarea name="details" class="form-control" id="details" rows="3"></textarea>
                        </div>
                        <div class="form-group">
                           <label for="image">Image:</label>
                                <input type="file" name="image" class="form-control" id="image"/>
                        </div>
                        <button type="submit" class="btn btn-default">Create member</button>
                    </form>

                </div>
            </div>
        </div>
    </div>

    <div class="text-center">
        {{$members->links()}}
    </div>
</div>



@endsection