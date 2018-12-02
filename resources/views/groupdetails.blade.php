@extends('layouts.meta') 

@section('stylesheet_after')
    <style>
    .container .img{
        text-align:center;
    }
    .container .details{
        border-left:3px solid #ded4da;
    }
    .container .details p{
        font-size:15px;
    }
    </style>
@endsection

@section('body')
<div class="container">
    <div class="panel panel-default">
        <div class="panel-heading">
            <h2>
                Group details
            </h2>
        </div>
        <div class="panel-body">
        <div class="row">
           
            <div class="col-md-6 details">
                <div class="row">
                    <div class="col-md-6">
                        <blockquote>
                        @foreach($groupWithMembers as $gm)
                        <tr>
                            <th>Group Name: {{$gm->groupName}}</th><br>
                            <td> Members: 
                                @foreach($gm->member as $member) 
                                    {{$member->name}}
                                @endforeach
                            </td>
                        </tr>
                        @endforeach        
                        </blockquote>
                    </div>
                    <div class="col-md-6">
                        <blockquote>
                            
                        </blockquote>
                    </div>
                </div>
            </div>
            </div>
                
        </div>
    </div>
</div>

@endsection