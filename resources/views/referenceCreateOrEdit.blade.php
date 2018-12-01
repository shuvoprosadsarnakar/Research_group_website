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
        <div class="col-md-7">
            <div class="well">
                <h4> Reference list</h4>
                <table class="table-edit" >
                    <tr>
                        <th>Id</th>
                        <th>Title</th>
                        <th>Link</th>
                        <th>PostId</th>
                        <th>Actions</th>
                    </tr>
                    @foreach($data as $reference)
                    <tr>
                        <td> {{ $reference->id }} </td>
                        <td>{{ $reference->title }}</td>
                        <td>{{ $reference->link }} </td>
                        <td>{{ $reference->postId }} </td>
                        <td>
                        <a href="{{route('reference_edit',$reference->id)}}" class="btn btn-primary btn-mini"><i class="icon-edit icon-white"></i>E</a>
                        <a onclick="return confirm('Are you sure you want to delete this item?');" href="{{route('reference_delete',$reference->id)}}" class="btn btn-danger btn-mini"><i class="icon-remove icon-white"></i>X</a>
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
            
            @if(isset($rEditInfo)) 
                    <h4>Update reference </h4>
                @else
                    <h4>Create Reference </h4>
                @endif
               
                <form action="@if(isset($rEditInfo)) {{ route ('reference_update',['id'=>$rEditInfo->id]) }} @else {{ route ('reference_store') }}@endif" method="post" enctype="multipart/form-data">
                    
                    {{csrf_field()}}
                    <div class="form-group">
                        <label for="referencetitle">Reference title:</label>
                        <input type="text" name="title" class="form-control" id="title" @if(isset($rEditInfo)) value='{{$rEditInfo->title}}' @endif />
                    </div>
                    <div class="form-group">
                        <label for="referenceurl">Reference url:</label>
                        <input type="text" name="link" class="form-control" id="link" @if(isset($rEditInfo)) value='{{$rEditInfo->link}}' @endif />
                    </div>
                    <div class="form-group">
                        <label for="">Post Title:</label>
                        <select name="postId" class="chosen-select-post form-control"  data-placeholder="Choose post...">
                        @if(isset($rEditInfo))
                                @for ($j = 0; $j < count($postData); $j++)
                                    <option value="{{ $postData[$j]->id }}"  
                                        @if($postData[$j]->id == $rEditInfo->post->id) 
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
                    @if(isset($rEditInfo)) 
                        Update Reference 
                    @else
                        Create Reference
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