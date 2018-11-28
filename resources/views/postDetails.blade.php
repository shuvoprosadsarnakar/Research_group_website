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
            <a href="#">{{$post->type}}</a>
          </p>

          <hr>

          <!-- Date/Time -->
          <p>Starting from: {{$post->startDate}} to: {{$post->finishDate}}</p>

          <hr>

          <!-- Preview Image -->
          <img class="img-fluid rounded" src="http://placehold.it/700x450" alt="">

          <hr>

          <!-- Post Content -->
          <p class="lead">Status: {{$post->status}}</p>

          <p>{{$post->description}}</p>

          <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eos, doloribus, dolorem iusto blanditiis unde eius illum consequuntur neque dicta incidunt ullam ea hic porro optio ratione repellat perspiciatis. Enim, iure!</p>

          <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Error, nostrum, aliquid, animi, ut quas placeat totam sunt tempora commodi nihil ullam alias modi dicta saepe minima ab quo voluptatem obcaecati?</p>

          <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Harum, dolor quis. Sunt, ut, explicabo, aliquam tenetur ratione tempore quidem voluptates cupiditate voluptas illo saepe quaerat numquam recusandae? Qui, necessitatibus, est!</p>

          <hr>


        </div>

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
                      <a href="#">Mujahid</a>
                    </li>
                    <li>
                      <a href="#">Shuvo</a>
                    </li>
                    <li>
                      <a href="#">Arif</a>
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
              You can put anything you want inside of these side widgets. They are easy to use, and feature the new Bootstrap 4 card containers!
            </div>
          </div>

        </div>

      </div>
      <!-- /.row -->

    </div>

@endsection


@section('javascript')

@endsection