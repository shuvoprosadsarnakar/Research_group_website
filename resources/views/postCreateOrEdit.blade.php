@extends('layouts.meta')

@section('stylesheet')
    <link rel="stylesheet" href="{{asset('css/chosenCss/prism.css')}}">
    <link rel="stylesheet" href="{{asset('css/chosenCss/chosen.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/jquery-ui.min.css')}}">
@endsection


@section('body')
<div class="container">

    <div class="row">
        <div class="col-md-8">
            <div class="well">
                <h4> Post edit panel</h4>
                <table class="table-edit" >
                    <tr>
                        <th>Id</th>
                        <th>Title</th>
                        <th>Type</th>
                        <th>Status</th>
                        <th>Start date</th>
                        <th>Finish date</th>
                        <th>Action</th>
                    </tr>
                    @foreach($posts as $post)
                    <tr>
                        <td> {{$post->id}} </td>
                        <td> {{$post->title}} </td>
                        <td> {{$post->type}} </td>
                        <td> {{$post->status}} </td>
                        <td> {{$post->startDate}} </td>
                        <td> {{$post->finishDate}} </td>
                        <td>
                            <a href="{{route('post_delete',['id'=>$post->id])}}" class="btn btn-danger">X</a>
                            <a href="{{route('post_edit',['id'=>$post->id])}}" class="btn btn-info">E</a>
                        </td>
                    </tr>
                    @endforeach
                </table>
            </div>
            <div class="text-center">
                {{$posts->links()}}
            </div>
        </div>
        <div class="col-md-4">
            <div class="well">
                <form action="{{ route ('post_store') }}" method="post" enctype="multipart/form-data">
                    {{csrf_field()}}
                    <div class="form-group">
                        <label for="title">Title:</label>
                        <input type="text" name="title" class="form-control" id="title">
                    </div>
                    <div class="form-group">
                        <label for="status">Status:</label>
                        <input type="text" name="status" class="form-control" id="status">
                    </div>
                    <div class="form-group">
                        <label for="description">Description:</label>
                        <textarea name="description" class="form-control" id="description" rows="3"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="image">Image:</label>
                        <input type="file" name="image" class="form-control" id="image" />
                    </div>
                    <div class="form-group">
                        <label for="">Type:</label>
                        <select name="type" size="1" class="chosen-select-type form-control"  data-placeholder="Choose a post type...">
                            <option value="Project">Project</option>
                            <!-- <option value="Thesis" selected>Thesis</option> -->
                            <option value="Research" disabled>Research</option>
                            <option value="Professional work">Professional work</option>
                            <option value="Course work">Course work</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="">Groups:</label>
                        <select name="group[]" size="1" class="chosen-select-group form-control"  data-placeholder="Choose group names..." multiple="multiple">
                            <option value="A">A</option>
                            <option value="B" selected>B</option>
                            <option value="C" disabled>C</option>
                            <option value="Y work" selected>Y work</option>
                            <option value="G work">G work</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="">Members:</label>
                        <select name="member[]" size="1" class="chosen-select-member form-control"  data-placeholder="Choose members..." multiple="multiple">
                            <option value="Arif islam">Arif islam</option>
                            <option value="Shuvo " selected>Shuvo</option>
                            <option value="Mujahid " disabled>Mujahid </option>
                            <option value="Diganta biswas" selected>Diganta biswas</option>
                            <option value="Avee">Avee</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="startdate">Start date:</label>
                        <input type="text" name="startdate" class="form-control" id="startdate" />
                    </div>
                    <div class="form-group">
                        <label for="finishdate">Finish date:</label>
                        <input type="text" name="finishdate" class="form-control" id="finishdate" />
                    </div>
                    <button type="submit" class="btn btn-default">Create post</button>
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
        $(".chosen-select-type").chosen({
            no_results_text: "Oops, nothing found!",
            width: "100%"
        });

        $(".chosen-select-group").chosen({
            no_results_text: "Oops, nothing found!",
            width: "100%"
        });

        $(".chosen-select-member").chosen({
            no_results_text: "Oops, nothing found!",
            width: "100%"
        });

        
        $( "#startdate" ).datepicker({
            inline: true,
            changeYear: true
        });
        
        $( "#finishdate" ).datepicker({
            inline: true,
            changeYear: true
        });
    </script>
@endsection