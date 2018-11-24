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
        @foreach ($data as $member)
            <div class="row-fluid">
<!-- start list of posts repeat this item to add more member -->
                <a href="{{route('memberDetails',$member->id)}}">
                    <div class="col-md-3 col-sm-4 col-xs-12">
                        <div class="card">
                            <!-- Image/thumbnail of the member -->
                            <img src="{{ asset('uploads/'.$member->imagePath) }}" alt="{{$member->name}}" style="width:100%">
                            <div class="cardcontainer">
                                <h5>
                                    <!-- Name of the member -->
                                    <b>{{ $member->name }}</b>
                                </h5>
                                <!-- Designation of the member -->
                                <p>{{ $member->designation }} </p>
                                <!-- Institution of the member -->
                                <p>{{ $member->email }}</p>
                            </div>
                        </div>
                    </div>
                </a>
<!-- end list of posts repeat this item to add more members -->
            </div>
            @endforeach
        </div>
    </div>
</div>

@endsection