@extends('layouts.meta') 
@section('body')

<div class="container">
    <div class="panel panel-default">
        <div class="panel-heading">
            <h2>
                Deliverable
            </h2>
            <p>click on the names to expand the tab</p>
        </div>
        <div class="panel-body">
            <div class="panel-group" id="accordion">
                @foreach($o as $p)
                <div class="panel panel-default">

                    <div class="panel-heading">

                        <h4 class="panel-title">

                            <a data-toggle="collapse" data-parent="#accordion" href="#collapse{{$p -> id}}">
                                {{$p -> name}}
                            </a>
                        </h4>
                    </div>

                    <div id="collapse{{$p -> id}}" class="panel-collapse collapse">

                        <div class="panel-body">
                        <img src="{{$p -> image}}" alt="{{$p -> image}}" style="width:10%">
                            <br>
                            {{$p -> details}} 
                            <a href="{{$p->link}}">click to learn more</a>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>




        </div>
    </div>



    <div class="text-center">
        {{$o->links()}}
    </div>
</div>

@endsection