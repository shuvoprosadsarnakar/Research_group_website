@extends('layouts.meta')

@section('stylesheet_after')
<style>

</style>
@endsection


@section('body')
    <!-- Page Content -->
<div class="container">
    <div class="row">

        <!-- Post Content Column -->
        <div class="col-md-8">
        <!-- Title -->
        <h1 class="">{{$post->title}}</h1>
        <!-- Author -->
        <p class="lead">
            Type
            <a href="{{ route('posts_type',['type' => $post->postType->name,'criteria' => 'title','order' => 'asc']) }}">{{$post->postType->name}}</a>
          </p>
          <hr>
          <!-- Date/Time -->
          <p>Starting date: {{$post->startDate}} &nbsp; Finish date: {{$post->finishDate}}</p>

          <hr>
          <!-- Preview Image -->
          <img class="img-fluid rounded" src="{{ asset('uploads/'.$post->thumbNail)}}" alt="">

          <hr>
          <!-- Post Content -->
          <p class="lead">Status: {{$post->status}}</p>
          <p>{{$post->description}}</p>
          <hr>


    </div>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <!-- Sidebar Widgets Column -->
    <div class="col-md-4">

          <!-- Categories Widget -->
        <div class="panel panel-default">
            <div class="panel-heading">
            <h5>
                Members
            </h5>
            </div>
            
            <div class="panel-body">
            <div class="row">
                <div class="col-lg-6">
                <ul class="list-unstyled mb-0">
                
                    <li>
                    @foreach($post->member as $m)
                    <a href="{{route('memberDetails',$m->id)}}">{{$m->name}}</a><br>
                    @endforeach 
                    </li>
                        
                </ul>
                </div>
            </div>
            </div>
        </div>

        <!-- Side Widget -->
        <div class="panel panel-default">
            <div class="panel-heading">
            <h5>
                Groups
            </h5>
            </div>
            
            <div class="panel-body">
            <ul class="list-unstyled mb-0">
                    <li>
                      @foreach($post->group as $g)
                        <a href="">{{$g->groupName}}</a><br>
                      @endforeach 
                    </li>
                  </ul>
            </div>
          </div>

        </div>

    </div>
      <!-- /.row -->



      <!-- Image sider -->
    <div>
        
          <img src="" alt="">
        
    </div>
<div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
    <!-- Indicators -->
    <ol class="carousel-indicators">
        @foreach($post->image as $image)
        @if ($loop->first)
        <li data-target="#carousel-example-generic" data-slide-to="{{$loop->index}}" class="active"></li>
        @endif
        <li data-target="#carousel-example-generic" data-slide-to="{{$loop->index}}"></li>
        @endforeach
    </ol>

    <!-- Wrapper for slides -->
    <div class="carousel-inner" role="listbox">
    @foreach($post->image as $image)
        @if ($loop->first)
        <div class="item active">
        <img src="{{ asset('uploads/'.$image->path) }}" alt="...">
            <div class="carousel-caption">
                {{$image->name}}
            </div>
        </div>
        @endif
        <div class="item">
        <img src="{{ asset('uploads/'.$image->path) }}" alt="...">
            <div class="carousel-caption">
                {{$image->name}}
            </div>
        </div>
    @endforeach
    </div>

    <!-- Controls -->
    <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
        <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
        <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
    </a>
</div>
<!-- end Image sider -->
</div>

@endsection


@section('javascript')

@endsection