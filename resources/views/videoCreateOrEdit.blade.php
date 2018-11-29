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
                <h4> Videos list</h4>
                <div class="table-fix">
                    <table class="table-edit" >
                        <tr>
                            <th>Id</th>
                            <th>Video preview</th>
                            <th>Title</th>
                            <th>Post_title</th>
                            <th>Url</th>
                            <th>Post Id</th>
                            <th>Actions</th>
                        </tr>
                        @foreach($videos as $video)
                        <tr>
                            <td> {{ $video->id }} </td>
                            <td>
                            <iframe width="240" height="160" class="" src="{{$video->link}}"></iframe>
                            </td>
                            <td >{{ $video->title }} </td>
                            <td >{{ $video->post->title }} </td>
                            <td>{{ $video->link }} </td>
                            <td>{{ $video->postId }} </td>
                            <td>
                            <a href="{{route('video_edit',$video->id)}}" class="btn btn-primary btn-mini"><i class="icon-edit icon-white"></i>E</a>
                            <a onclick="return confirm('Are you sure you want to delete this item?');" href="{{route('video_delete',$video->id)}}" class="btn btn-danger btn-mini"><i class="icon-remove icon-white"></i>X</a>
                            </td>
                        </tr>
                        @endforeach
                    </table>
                </div>
            </div>
            <div class="text-center">
                {{$videos->links()}}
            </div>
        </div>
        <div class="col-md-4">
            <div class="well">
            @if(isset($vEditInfo)) 
                    <h4>Update Video Url </h4>
                @else
                    <h4>Insert Video Url </h4>
                @endif
                <!-- <h4> Preview of current video </h4> -->
                <form action="@if(isset($vEditInfo)) {{ route ('video_update',['id'=>$vEditInfo->id]) }} @else {{ route ('video_store') }}@endif" method="post" enctype="multipart/form-data">
                    {{csrf_field()}}
                    <div class="form-group">
                        <label for="Link">Video url:</label>
                        <input type="text" name="link" class="form-control" id="videourl" @if(isset($vEditInfo)) value='{{$vEditInfo->link}}' @endif />
                    </div>
                    <div class="form-group">
                        <label for="videotitle">Video Title:</label>
                        <input type="text" name="title" class="form-control" id="videotitle" @if(isset($vEditInfo)) value='{{$vEditInfo->title}}' @endif/>
                    </div>
                    <div class="form-group">
                        <label for="">Post Title:</label>
                        <select name="postId" class="chosen-select-post form-control"  data-placeholder="Choose post...">
                            @if(isset($vEditInfo))
                                @for ($j = 0; $j < count($postData); $j++)
                                    <option value="{{ $postData[$j]->id }}"  
                                        @if($postData[$j]->id == $vEditInfo->post->id) 
                                            selected 
                                        @endif
                                        > 
                                    {{ $postData[$j]->title }} </option>
                                @endfor
                            @else
                                @foreach ($postData as $post)
                                    <option value="{{ $post->id }}" > {{ $post->title }} </option>
                                @endforeach 
                            @endif
                        </select>
                    </div>
                    <button type="submit" class="btn btn-default">
                    @if(isset($vEditInfo)) 
                        Update Video Link 
                    @else
                        Insert Video Link
                    @endif
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