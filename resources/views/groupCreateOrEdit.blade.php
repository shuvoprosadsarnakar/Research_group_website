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
                            <th>Group name</th>
                            <th>Member name</th>
                            <th>Action </th>
                        </tr>
                        @foreach($groups as $group)
                        <tr>
                            <td> {{$group->groupName}} </td>
                            <td> xx </td>
                            <td>
                            <a href="" class="btn btn-primary btn-mini"><i class="icon-edit icon-white"></i>E</a>|
                            <a onclick="return confirm('Are you sure you want to delete this item?');" href="" class="btn btn-danger btn-mini"><i class="icon-remove icon-white"></i>X</a>
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
                    <h4>Edit group </h4>
                @else
                    <h4>Create group </h4>
                @endif
                
                <form action="@if(isset($memberEditInfo)) {{ route ('updateMember',['id'=>$memberEditInfo->id]) }} @else {{ route ('member_store') }}@endif" method="post" enctype="multipart/form-data">
                    
                    {{csrf_field()}}
                    <div class="form-group">
                        <label for="name">Name:</label>
                        <input type="text" name="name" class="form-control" id="name" @if(isset($memberEditInfo)) value='{{$groupEditInfo->name}}' @endif >
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
            <div class="well">
                <form action="@if(isset($memberEditInfo)) {{ route ('updateMember',['id'=>$memberEditInfo->id]) }} @else {{ route ('member_store') }}@endif" method="post" enctype="multipart/form-data">
                    
                    {{csrf_field()}}
                    <div class="form-group">
                        <label for="">Select the group:</label>
                        <select name="groupId" class="chosen-select-group form-control"  data-placeholder="Choose group names..." >
                            @foreach ($groups as $group)
                                <option value="{{ $group->id }}" > {{ $group->groupName }} </option>
                            @endforeach 
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="">Add members to the group:</label>
                        <select name="memberId[]" class="chosen-select-member form-control"  data-placeholder="Choose group names..." multiple="multiple">
                            @foreach ($members as $member)
                                <option value="{{ $member->id }}" > {{ $member->name }} </option>
                            @endforeach 
                        </select>
                    </div>
                    <button type="submit" class="btn btn-default">
                       Add member
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

        $(".chosen-select-group").chosen({
            no_results_text: "Oops, nothing found!",
            width: "100%"
        });

        $(".chosen-select-member").chosen({
            no_results_text: "Oops, nothing found!",
            width: "100%"
        });
    </script>
@endsection