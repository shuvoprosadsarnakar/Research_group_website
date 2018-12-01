@extends('layouts.meta')

@section('stylesheet_after')
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

    </div>
<!-- end Image sider -->
    </div>

@endsection


@section('javascript')

@endsection