@extends('layouts.meta')

@section('stylesheet')
    <link rel="stylesheet" href="{{asset('css/chosenCss/prism.css')}}">
    <link rel="stylesheet" href="{{asset('css/chosenCss/chosen.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/select2.min.css')}}">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
@endsection


@section('body')
@component('edit')
@endcomponent


<div class="container">
    <div class="row">
        <div class="col-md-7">
            <div class="well">
                <h4> Publication list</h4>
                <div class="table-fix">
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
                        <a href="{{route('publication_edit',$reference->id)}}" class="btn btn-primary btn-mini"><i class="icon-edit icon-white"></i>E</a>
                        <a onclick="return confirm('Are you sure you want to delete this item?');" href="{{route('publication_delete',$reference->id)}}" class="btn btn-danger btn-mini"><i class="icon-remove icon-white"></i>X</a>
                        </td>
                    </tr>
                    @endforeach
                </table>
                </div>
            </div>
            <div class="text-center">
                
            </div>
        </div>
        <div class="col-md-4">
            <div class="well">
            
            @if(isset($rEditInfo)) 
                    <h4>Update publication </h4>
                @else
                    <h4>Create publication </h4>
                @endif
            
                <form action="@if(isset($rEditInfo)) {{ route ('publication_update',['id'=>$rEditInfo->id]) }} @else {{ route ('publication_store') }}@endif" method="post" enctype="multipart/form-data">
                    
                    {{csrf_field()}}
                    <div class="form-group">
                        <label for="referencetitle">Publication title:</label>
                        <input type="text" name="title" class="form-control" id="title" @if(isset($rEditInfo)) value='{{$rEditInfo->title}}' @endif />
                    </div>
                    <div class="form-group">
                        <label for="">Post Title:</label>
                        <select name="author[]" class="select2 form-control"   multiple="multiple">
                            <option value="1"selected > ccc</option>
                            <option value="2" > ffff</option>
                        </select>
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
                <h5 id="demo">x</h5>
                <button class="btn btn-default" onclick="loadDoc()">
                        <span>
                            <i class="fas fa-sync-alt"></i>
                        </span>
                </button>
            </div>
        </div>
    </div>
</div>
@endsection


@section('javascript')
    <script src="{{asset('js/chosenJs/chosen.jquery.min.js')}}" type="text/javascript"></script>
    <script src="{{asset('js/chosenJs/prism.js')}}" type="text/javascript" charset="utf-8"></script>
    <script src="{{asset('js/jquery-ui.min.js')}}" type="text/javascript" charset="utf-8"></script>
    <script src="{{asset('js/select2.min.js')}}" type="text/javascript" charset="utf-8"></script>
    
    <script>
        $(".chosen-select-post").chosen({
            no_results_text: "Oops, nothing found!",
            width: "100%"
        });

        $(document).ready(function() {
            $('.select2').select2({
                tags: true,
                tokenSeparators: [',']
            });
        });

        function loadDoc() {
        var xhttp = new XMLHttpRequest();
            xhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    document.getElementById("demo").innerHTML =
                    this.responseText;
                }
            };
        xhttp.open("POST", "{{ route ('publication_api') }}", true);
        xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xhttp.send("fname=Henry&lname=Ford");
        }
    </script>
@endsection