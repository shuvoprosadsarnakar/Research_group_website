@extends('layouts.meta')

@section('stylesheet')
    <link rel="stylesheet" href="{{asset('css/chosenCss/prism.css')}}">
    <link rel="stylesheet" href="{{asset('css/chosenCss/chosen.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/jquery-ui.min.css')}}">
@endsection


@section('body')
<div class="container center_div">
 
            <div class="well">
                <h4> Update member </h4>
                <form action="{{ url('/updateMember', array($data->id)) }}" method="post" enctype="multipart/form-data">
                    {{csrf_field()}}
                    <div class="form-group">
                        <label for="name">Name:</label>
                        <input type="text" name="name" class="form-control" id="name" value="<?php echo $data->name; ?>">
                    </div>
                    <div class="form-group">
                        <label for="designation">Designation:</label>
                        <input type="text" name="designation" class="form-control" id="designation" value="<?php echo $data->designation; ?>">
                    </div>
                    <div class="form-group">
                        <label for="email">email:</label>
                        <input type="text" name="email" class="form-control" id="email" value="<?php echo $data->email; ?>">
                    </div>
                    <div class="form-group">
                        <label for="phone">phone:</label>
                        <input type="text" name="phone" class="form-control" id="phone" value="<?php echo $data->phone; ?>">
                    </div>
                    <div class="form-group">
                        <label for="image">Image:</label>
                        <input type="file" accept="image/*" name="imagePath" class="form-control" id="image" />
                    </div>
                    <div class="form-group">
                        <label for="github">github:</label>
                        <input type="text" name="github" class="form-control" id="github" value="<?php echo $data->github; ?>">
                    </div>
                    <div class="form-group">
                        <label for="linkedin">linkedin:</label>
                        <input type="text" name="linkedin" class="form-control" id="linkedin" value="<?php echo $data->linkedin; ?>">
                    </div>
                    <div class="form-group">
                        <label for="researcharea">Research area:</label>
                        <input type="text" name="researchArea" class="form-control" id="researcharea" value="<?php echo $data->researchArea; ?>">
                    </div>
                    <div class="form-group">
                        <label for="interest">Interest:</label>
                        <input type="text" name="interest" class="form-control" id="interest" value="<?php echo $data->interest; ?>">
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
                    <button type="submit" class="btn btn-default">Update member</button>
                </form>
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