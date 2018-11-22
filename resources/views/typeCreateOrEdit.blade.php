@extends('layouts.meta')

@section('stylesheet')

@endsection


@section('body')
<div class="container">
    <div class="row">
        <div class="col-md-8">
            <div class="well">
                <h4> Types list</h4>
                <table class="table-edit" >
                    <tr>
                        <th>Id</th>
                        <th>Type</th>
                        <th>Date</th>
                        <th>Actions</th>
                    </tr>
                    <tr>
                        <td>  </td>
                        <td>  </td>
                        <td>  </td>
                        <td>
                            <a href="" class="btn btn-danger">X</a>
                            <a href="" class="btn btn-info">E</a>
                        </td>
                    </tr>                    
                </table>
            </div>
            <div class="text-center">
                
            </div>
        </div>
        <div class="col-md-4">
            <div class="well">
                <h4> Create type </h4>
                <form action="{{ route ('type_store') }}" method="post" enctype="multipart/form-data">
                    {{csrf_field()}}
                    <div class="form-group">
                        <label for="name">Type Name:</label>
                        <input type="text" name="name" class="form-control" id="name">
                    </div>
                    <button type="submit" class="btn btn-default">Create type</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection


@section('javascript')

@endsection