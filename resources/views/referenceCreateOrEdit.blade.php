@extends('layouts.meta')

@section('stylesheet')

@endsection


@section('body')
<div class="container">
    <div class="row">
        <div class="col-md-8">
            <div class="well">
                <h4> Reference list</h4>
                <table class="table-edit" >
                    <tr>
                        <th>Id</th>
                        <th>Title</th>
                        <th>Link</th>
                        <th>Post id</th>
                        <th>Post title</th>
                        <th>Actions</th>
                    </tr>
                    <tr>
                        <td> 1 </td>
                        <td>XXXX harry potter  </td>
                        <td> https://www.youtube.com/watch?v=a18py61_F_w </td>
                        <td> 12 </td>
                        <td> Lorem ipsum dolor sit amet consectetur adipisicing </td>
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
            
                <h4> Add reference </h4>
               
                <form action="{{ route ('video_store') }}" method="post" enctype="multipart/form-data">
                    {{csrf_field()}}
                    <div class="form-group">
                        <label for="referencetitle">Reference title:</label>
                        <input type="text" name="referencetitle" class="form-control" id="referencetitle" />
                    </div>
                    <div class="form-group">
                        <label for="referenceurl">Reference url:</label>
                        <input type="text" name="link" class="form-control" id="referenceurl" />
                    </div>
                    <div class="form-group">
                        <label for="">Post title:</label>
                        <select name="postid" size="1" class="chosen-select-post form-control"  data-placeholder="Choose a post ..." >
                            <option value="1">aaaaaaaa</option>
                            <option value="2">abcdefghijklmnop</option>
                            <option value="3">sdfgh work</option>
                            <option value="4">wserdtfgyb work</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-default">Add reference</button>
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
@endsection