@extends('layouts.meta') 

@section('stylesheet')
    <link rel="stylesheet" href="{{asset('css/owl.carousel.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/owl.theme.default.min.css')}}">
@endsection


@section('body')
<div id="fullbackground">
  <div id="content">
    <div id="inner">
      <h1>Ai research group </h1>
      <h3>Daffodil international university</h3>
    </div>
  </div>
</div>


<!-- Start image slider or carousel home page -->
<div class="owl-carousel owl-theme">
    <div class="item">
      <img src="{{asset('images/diu.png')}}" alt="">
    </div>
    <div class="item">
      <img src="{{asset('images/diu.png')}}" alt="">
    </div>
    <div class="item">
      <img src="{{asset('images/diu.png')}}" alt="">
    </div>
</div>
<!-- End image slider or carousel home page -->
@endsection


@section('javascript')
<script type="text/javascript" src="{{asset('js/owl.carousel.min.js')}}"></script>
<script>
/* Javascript for the image slider or carousel */
    $('.owl-carousel').owlCarousel({
      stagePadding: 50,
      autoplayHoverPause:true,
      loop:false,
      margin:25,
      nav:true,
      center: true,
      items:2,
      responsiveClass:true,
      responsive:{
          0:{
              items:1
          },
          600:{
              items:1
          },
          1000:{
              items:2
          }
      }
    })
</script>
@endsection