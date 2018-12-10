@extends('layouts.meta')

@section('stylesheet')
    <link rel="stylesheet" href="{{asset('css/chosenCss/prism.css')}}">
    <link rel="stylesheet" href="{{asset('css/chosenCss/chosen.min.css')}}">
@endsection


@section('body')
@component('edit')
@endcomponent
<div class="container">
    <div class="row">
        <div class="col-md-8">
            <div class="well">
                <h4> Images list</h4>
                <div class="table-fix">
                <table class="table-edit" >
                    <tr>
                        <th>Id</th>
                        <th>Image</th>
                        <th>Post id</th>
                        <th>Post title</th>
                        <th>Actions</th>
                    </tr>
                    @foreach($data as $image)
                    <tr>
                        <td> {{ $image->id }} </td>
                        <td>
                        <img src="{{ asset('uploads/'.$image->path)  }}" alt="" style="width: 300px;"> 
                        </td>
                        <td>{{ $image->postId }} </td>
                        <td> {{ $image->post->title }} </td>
                        <td>
                        <a href="{{route('image_edit',$image->id)}}" class="btn btn-primary btn-mini"><i class="icon-edit icon-white"></i>E</a>
                        <a onclick="return confirm('Are you sure you want to delete this item?');" href="{{route('image_delete',$image->id)}}" class="btn btn-danger btn-mini"><i class="icon-remove icon-white"></i>X</a>
                        </td>
                    </tr>
                    @endforeach
                </table>
                </div>
            </div>
            <div class="text-center">
                    {{$data->links()}}
            </div>
        </div>
        <div class="col-md-4">
            <div class="well">
            @if(isset($iEditInfo)) 
                    <h4>Update Image </h4>
                @else
                    <h4>Upload Image </h4>
                @endif
                <h4> Preview of last Uploaded image </h4>
                <form action="@if(isset($iEditInfo)) {{ route ('image_update',['id'=>$iEditInfo->id]) }} @else {{ route ('image_store') }}@endif" method="post" enctype="multipart/form-data">
                <img  @if(isset($data3)) src="{{ asset('uploads/'.$data3->path)  }}"@endif alt="" style="width:100%"> 
                <form action="{{ route ('image_store') }}" method="post" enctype="multipart/form-data">
                    {{csrf_field()}}
                    <div class="form-group">
                        <label for="name"> Title:</label>
                        <input type="text" name="name" class="form-control" id="title" @if(isset($iEditInfo)) value='{{$iEditInfo->name}}' @endif />
                    </div>
                    <div class="form-group">
                        <label for="image">Choose image:</label>
                        <input type="file" accept="image/*" name="path" class="form-control" id="image" />
                    </div>
                    <div class="form-group">
                        <label for="">Post Title:</label>
                        <select name="postId" class="chosen-select-post form-control"  data-placeholder="Choose post...">
                            @foreach ($postData as $post)
                                <option value="{{ $post->id }}" > {{ $post->title }} </option>
                            @endforeach 
                            @if(isset($rEditInfo))
                                @foreach($iEditInfo as $postTitle)
                                    <option value="{{ $postTitle->id }}" selected> {{ $postTitle->title }} </option>
                                @endforeach
                            @endif
                        </select>
                    </div>
                    <button type="submit" class="btn btn-default">
                        Upload Image
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection


@section('javascript')
    <script src="{{asset('js/chosenJs/chosen.jquery.min.js')}}" type="text/javascript"></script>
    <script src="{{asset('js/chosenJs/prism.js')}}" type="text/javascript" charset="utf-8"></script>
    <script src="{{asset('js/jquery-ui.min.js')}}" type="text/javascript" charset="utf-8"></script>
    
    <script>
        $(".chosen-select-post").chosen({
            no_results_text: "Oops, nothing found!",
            width: "100%"
        });
    </script>
@endsection