@extends('layouts.meta')

@section('stylesheet')

@endsection


@section('body')
<div class="container">
    <div class="row">
        <div class="col-md-7">
            <div class="well">
                <h4> Types list</h4>
                <table class="table-edit" >
                    <tr>
                        <th>Id</th>
                        <th>Type</th>
                        <th>Actions</th>
                    </tr>
                    @foreach($data as $type)
                        <tr>
                            <td> {{ $type->id }} </td>
                            <td> {{ $type->name }} </td>
                            <td>
                                <a href="{{route('type_edit',$type->id)}}" class="btn btn-primary btn-mini"><i class="icon-edit icon-white"></i>E</a>
                                <a onclick="return confirm('Are you sure you want to delete this item?');" href="{{route('type_delete',$type->id)}}" class="btn btn-danger btn-mini"><i class="icon-remove icon-white"></i>X</a>
                            </td>
                        </tr>
                        @endforeach                                     
                </table>
            </div>
            <div class="text-center">
                
            </div>
        </div>
        <div class="col-md-4">
            <div class="well">
            @if(isset($typeEditInfo)) 
                    <h4>Edit Type</h4>
                @else
                    <h4>Create Type </h4>
                @endif
                <form action="@if(isset($typeEditInfo)) {{ route ('type_update',['id'=>$typeEditInfo->id]) }} @else {{ route ('type_store') }}@endif" method="post" enctype="multipart/form-data">
                    {{csrf_field()}}
                    <div class="form-group">
                        <label for="name">Type Name:</label>
                        <input type="text" name="name" class="form-control" id="name"  @if(isset($typeEditInfo)) value='{{$typeEditInfo->name}}' @endif>
                    </div>
                    <button type="submit" class="btn btn-default">
                        @if(isset($typeEditInfo)) 
                            Update Type 
                        @else
                            Create Type
                        @endif
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection


@section('javascript')

@endsection