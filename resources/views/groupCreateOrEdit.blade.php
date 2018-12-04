@extends('layouts.meta')

@section('stylesheet')
    <link rel="stylesheet" href="{{asset('css/chosenCss/prism.css')}}">
    <link rel="stylesheet" href="{{asset('css/chosenCss/chosen.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/jquery-ui.min.css')}}">
@endsection


@section('body')
@component('edit')
@endcomponent

<div class="container">
    <div class="row">
        <div class="col-md-6">
            <div class="well">
                <h4> Group list</h4>
                <div class="table-fix">
                    <table class="table-edit" >
                        <tr>
                            <th>Id</th>
                            <th>Group name</th>
                            <th>Image</th>
                            <th>Description</th>
                            <th>Action </th>
                        </tr>
                        @foreach($groups as $group)
                        <tr>
                            <td> {{ $group->id }} </td>
                            <td> {{ $group->groupName }} </td>
                            <td> 
                                <img src="{{ asset('uploads/'.$group->thumbNail)  }}" alt="" style="width: 100px;">
                            </td>
                            <td> {{ $group->groupDescription }} </td>
                            <td>
                                <a href="{{route('group_edit',$group->id)}}" class="btn btn-primary btn-mini"><i class="icon-edit icon-white"></i>E</a>
                                <a onclick="return confirm('Are you sure you want to delete this item?');" href="{{route('group_delete',$group->id)}}" class="btn btn-danger btn-mini"><i class="icon-remove icon-white"></i>X</a>
                            </td>
                        </tr>
                        @endforeach                    
                    </table>
                </div>
                <div class="text-center">
                    {{ $groups->links() }}
                </div>
            </div>
            <div class="well">
                <h4> Groups with members</h4>
                <div class="table-fix">
                    <table class="table-edit" >
                        <tr>
                            <th>Group name</th>
                            <th>Member name</th>
                            <th>Action </th>
                        </tr>
                        @foreach($groupWithMembers as $gm)
                        <tr>
                            <th>{{$gm->groupName}}</th>
                            <td>
                                @foreach($gm->member as $member) 
                                    {{$member->name}}
                                @endforeach
                            </td>
                            <td>
                            <a href="{{route('gm_edit',$gm->id)}}" class="btn btn-primary btn-mini"><i class="icon-edit icon-white"></i>E</a>
                            
                            </td>
                        </tr>
                        @endforeach                    
                    </table>
                </div>
            </div>
            <div class="text-center">
                {{ $groupWithMembers->links() }}
            </div>
        </div>
        <div class="col-md-6">
            <div class="well">
                @if(isset($groupEditInfo)) 
                    <h4>Edit Group</h4>
                @else
                    <h4>Create group </h4>
                @endif
                
                <form action="@if(isset($groupEditInfo)) {{ route ('group_update',['id'=>$groupEditInfo->id]) }} @else {{ route ('group_store') }}@endif" method="post" enctype="multipart/form-data">
                    
                    {{csrf_field()}}
                    <div class="form-group">
                        <label for="name">Group Name:</label>
                        <input type="text" name="groupName" class="form-control" id="name" @if(isset($groupEditInfo)) value='{{$groupEditInfo->groupName}}' @endif >
                    </div>
                    <div class="form-group">
                            <label for="description">Description:</label>
                            <textarea name="description" class="form-control" id="description" rows="3">@if(isset($groupEditInfo)){{$groupEditInfo->groupDescription}}@endif</textarea>
                        </div>
                        <div class="form-group">
                            <label for="image">Image:</label>
                            <input type="file" accept="image/*" name="imagePath" class="form-control" id="image" />
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
                @if(isset($gmEditInfo)) 
                    <h4>Edit members assigned to this group</h4>
                @else
                    <h4>Assign members to this group </h4>
                @endif
                <form action="@if(isset($gmEditInfo)) {{ route ('gm_update',['id'=>$gmEditInfo->id]) }} @else {{ route ('gm_store') }}@endif" method="post" enctype="multipart/form-data">
                    {{csrf_field()}}
                        @if(isset($gmEditInfo))
                            <input type="hidden" name="previousSelectedGroupId" value="{{$gmEditInfo->id}}">
                        @endif
                    <div class="form-group">
                        <label for="">Select the group:</label>
                        <select name="groupId" class="chosen-select-group form-control"  data-placeholder="Choose group names..." >
                            @if(isset($gmEditInfo))
                                @foreach($groupAll as $group)
                                    <option value="{{ $group->id }}" 
                                        @if($group->id == $gmEditInfo->id) 
                                            selected 
                                        @endif > 
                                    {{ $group->groupName }} </option>
                                @endforeach
                            @else
                                @foreach($groupAll as $group)
                                    <option value="{{$group->id}}">{{$group->groupName}}</option>
                                @endforeach
                            @endif
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="">Add members to the group:</label>
                        <select name="memberId[]" class="chosen-select-member form-control"  data-placeholder="Choose group names..." multiple="multiple">
                            @if(isset($gmEditInfo))
                                @for ($j = 0; $j < count($members); $j++)
                                    <option value="{{ $members[$j]->id }}"  
                                    @for ($i = 0; $i < count($gmEditInfo->member); $i++)
                                        @if($members[$j]->id == $gmEditInfo->member[$i]->id) 
                                            selected 
                                        @endif 
                                    @endfor > 
                                    {{ $members[$j]->name }} </option>
                                @endfor
                            @else
                                @foreach($members as $member)
                                    <option value="{{$member->id}}">{{$member->name}}</option>
                                @endforeach
                            @endif
                        </select>
                    </div>
                    <button type="submit" class="btn btn-default">
                        save
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