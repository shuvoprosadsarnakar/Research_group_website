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
                <h4> Members list</h4>
                <table class="table-edit" >
                    <tr>
                        <th>Name</th>
                        <th>Designation</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>actions</th>
                    </tr>
                    @foreach ($data as $member)
                    <tr>
                        <td> {{ $member->name }} </td>
                        <td> {{ $member->designation }} </td>
                        <td> {{ $member->email }} </td>
                        <td> {{ $member->phone }} </td>
                        <td>
                        <a href="{{route('editMember',$member->id)}}" class="btn btn-primary btn-mini"><i class="icon-edit icon-white"></i>E</a>|
                        <a onclick="return confirm('Are you sure you want to delete this item?');" href="{{route('deleteMember',$member->id)}}" class="btn btn-danger btn-mini"><i class="icon-remove icon-white"></i>X</a>
                        </td>
                    </tr>
                    @endforeach                    
                </table>
            </div>
            <div class="text-center">
                
            </div>
        </div>
        <div class="col-md-5">
            <div class="well">
                <h4> Create member </h4>
                <form action="{{ route ('member_store') }}" method="post" enctype="multipart/form-data">
                    {{csrf_field()}}
                    <div class="form-group">
                        <label for="name">Name:</label>
                        <input type="text" name="name" class="form-control" id="name">
                    </div>
                    <div class="form-group">
                        <label for="designation">Designation:</label>
                        <input type="text" name="designation" class="form-control" id="designation">
                    </div>
                    <div class="form-group">
                        <label for="email">email:</label>
                        <input type="text" name="email" class="form-control" id="email">
                    </div>
                    <div class="form-group">
                        <label for="phone">phone:</label>
                        <input type="text" name="phone" class="form-control" id="phone">
                    </div>
                    <div class="form-group">
                        <label for="image">Image:</label>
                        <input type="file" accept="image/*" name="imagePath" class="form-control" id="image" />
                    </div>
                    <div class="form-group">
                        <label for="github">github:</label>
                        <input type="text" name="github" class="form-control" id="github">
                    </div>
                    <div class="form-group">
                        <label for="linkedin">linkedin:</label>
                        <input type="text" name="linkedin" class="form-control" id="linkedin">
                    </div>
                    <div class="form-group">
                        <label for="researcharea">Research area:</label>
                        <input type="text" name="researchArea" class="form-control" id="researcharea">
                    </div>
                    <div class="form-group">
                        <label for="interest">Interest:</label>
                        <input type="text" name="interest" class="form-control" id="interest">
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
                    <button type="submit" class="btn btn-default">Create member</button>
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