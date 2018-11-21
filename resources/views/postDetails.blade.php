@extends('layouts.meta')

@section('stylesheet')

@endsection


@section('body')
<div class="container">
    <div class="panel panel-default">
        <div class="panel-heading">
            <h2>
                Post details
            </h2>
        </div>

        <div class="panel-body">
            <div class="col-md-4">
                        <img src="{{asset('images/kmisir.jpg')}}" alt="" style="width:100%">
            </div>
            <div class="col-md-8">
                <h4>
                    <b>
                        Lorem ipsum dolor sit amet consectetur adipisicing elit.
                    </b>
                    <br>
                        Lorem ipsum dolor sit amet consectetur adipisicing elit.
                </h4>
                    <p>
                        Lorem ipsum dolor sit amet consectetur adipisicing elit.   
                        Lorem ipsum dolor sit, amet consectetur adipisicing elit. Aperiam quia impedit velit eaque a modi unde, odio optio error nam 
                        itaque provident culpa incidunt explicabo nemo inventore libero magnam eum. 
                    </p>
            </div>
        </div>
    </div>
</div>
@endsection


@section('javascript')

@endsection