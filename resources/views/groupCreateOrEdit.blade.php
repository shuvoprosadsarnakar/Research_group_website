@extends('layouts.meta')

@section('stylesheet')
    <link rel="stylesheet" href="{{asset('css/chosenCss/prism.css')}}">
    <link rel="stylesheet" href="{{asset('css/chosenCss/chosen.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/jquery-ui.min.css')}}">
@endsection


@section('body')
<div class="container">
    <div class="row">
        <div class="col-md-7">
            <div class="well">
                <h4> Group list</h4>
                <div class="table-fix">
                    <table class="table-edit" >
                        <tr>
                            <th>Name</th>
                            <th>Image</th>
                            <th>Designation</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>actions</th>
                        </tr>
                        @foreach($data as $group)
                        <tr>
                            <td> {{ $group->name }} </td>
                            <td>
                                <img src="{{ asset('uploads/'.$member->imagePath)  }}" alt="" style="width: 200px;"> 
                            </td>
                            <td> {{ $group->designation }} </td>
                            <td> {{ $group->email }} </td>
                            <td> {{ $group->phone }} </td>
                            <td>
                            <a href="{{route('editMember',$member->id)}}" class="btn btn-primary btn-mini"><i class="icon-edit icon-white"></i>E</a>|
                            <a onclick="return confirm('Are you sure you want to delete this item?');" href="{{route('deleteMember',$member->id)}}" class="btn btn-danger btn-mini"><i class="icon-remove icon-white"></i>X</a>
                            </td>
                        </tr>
                        @endforeach                    
                    </table>
                </div>
            </div>
            <div class="text-center">
                
            </div>
        </div>
        <div class="col-md-5">
            <div class="well">
                @if(isset($groupEditInfo)) 
                    <h4>Edit member </h4>
                @else
                    <h4>Create member </h4>
                @endif
                
                <form action="@if(isset($memberEditInfo)) {{ route ('updateMember',['id'=>$memberEditInfo->id]) }} @else {{ route ('member_store') }}@endif" method="post" enctype="multipart/form-data">
                    
                    {{csrf_field()}}
                    <div class="form-group">
                        <label for="name">Name:</label>
                        <input type="text" name="name" class="form-control" id="name" @if(isset($memberEditInfo)) value='{{$groupEditInfo->name}}' @endif >
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
                    <button type="submit" class="btn btn-default">
                        @if(isset($groupEditInfo)) 
                            Edit group 
                        @else
                            Create group
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