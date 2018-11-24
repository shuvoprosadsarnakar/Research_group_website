@extends('layouts.meta')

@section('stylesheet')

@endsection

@section('body')
<div class="container">
    <div class="panel panel-default">
        <div class="panel-heading">
            <h2>
                Members
            </h2>
        </div>
        <div class="panel-body">
            <div class="row">
<!-- start list of posts repeat this item to add more member -->
                <a href="">
                    <div class="col-md-3 col-sm-4 col-xs-12">
                        <div class="card">
                            <!-- Image/thumbnail of the member -->
                            <img src="{{asset('images/p.jpg')}}" alt="" style="width:100%">
                            <div class="cardcontainer">
                                <h5>
                                    <!-- Name of the member -->
                                    <b>Shuvo prosad sarnakar</b>
                                </h5>
                                <!-- Designation of the member -->
                                <p>Student </p>
                                <!-- Institution of the member -->
                                <p>Daffodil international university</p>
                            </div>
                        </div>
                    </div>
                </a>
<!-- end list of posts repeat this item to add more members -->
            </div>
        </div>
    </div>
</div>

@endsection