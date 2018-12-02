@extends('layouts.meta') 

@section('stylesheet')
    <link rel="stylesheet" href="{{asset('css/owl.carousel.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/owl.theme.default.min.css')}}">
    <style>
        .carousel-wrap {
        width: 1000px;
        margin: auto;
        position: relative;
    }
    .owl-carousel .owl-nav{
        overflow: hidden;
        height: 0px;
    }
    
    .owl-theme .owl-dots .owl-dot.active span, 
    .owl-theme .owl-dots .owl-dot:hover span {
        background: #2caae1;
    }
    
    
    .owl-carousel .item {
        text-align: center;
    }
    .owl-carousel .nav-btn{
        height: 47px;
        position: absolute;
        width: 26px;
        cursor: pointer;
        top: 100px !important;
    }
    
    .owl-carousel .owl-prev.disabled,
    .owl-carousel .owl-next.disabled{
        pointer-events: none;
        opacity: 0.2;
    }
    
    .owl-carousel .prev-slide{
        background: url({{asset('images/next.svg')}}) no-repeat scroll 0 0;
        left: -33px;
    }
    .owl-carousel .next-slide{
        background: url({{asset('images/next.svg')}}) no-repeat scroll -24px 0px;
        right: -33px;
    }
    .owl-carousel .prev-slide:hover{
        background-position: 0px -53px;
    }
    .owl-carousel .next-slide:hover{
        background-position: -24px -53px;
    }
    
    span.img-text {
        /* text-decoration: none; */
        outline: none;
        transition: all 0.4s ease;
        -webkit-transition: all 0.4s ease;
        -moz-transition: all 0.4s ease;
        -o-transition: all 0.4s ease;
        cursor: pointer;
        width: 100%;
        font-size: 23px;
        display: block;
        text-transform: capitalize;
        bottom: 20px;
        position: absolute;
        color: whitesmoke;
    }
    span.img-text:hover {
        color: #2caae1;
    }
    .owl-theme .owl-dots, .owl-theme .owl-nav {
        text-align: center;
        -webkit-tap-highlight-color: transparent;
        bottom: 0px;
        position: absolute;
        align-items: center;
        width: 100%;
        margin: auto;
    }
    </style>
@endsection


@section('body')
<div id="fullbackground">
  <div id="content">
    <div id="inner">
      <h1>Ambient Intelligence Lab</h1>
      <h3>Daffodil international university</h3>
    </div>
  </div>
</div>


<!-- Start image slider or carousel home page -->
<div class="carousel-wrap">
        <div class="owl-carousel owl-theme">
            <div class="item">
              <img src="{{asset('images/ironman.jpg')}}" />
              <span class="img-text">nightlife</span>
            </div>
            <div class="item">
              <img src="{{asset('images/sun.jpg')}}" />
              <span class="img-text">abstract</span>
            </div>
            <div class="item">
              <img src="{{asset('images/venom.jpg')}}" />
              <span class="img-text">animals</span>
            </div>
        </div>
    </div>
<!-- End image slider or carousel home page -->
@endsection


@section('javascript')
<script type="text/javascript" src="{{asset('js/owl.carousel.min.js')}}"></script>
<script>
/* Javascript for the image slider or carousel */
    $('.owl-carousel').owlCarousel({
    margin:25,
    autoplay:true,
    autoplayTimeout:2000,
	autoplayHoverPause:true,
    nav:true,
    navText:["<div class='nav-btn prev-slide'></div>","<div class='nav-btn next-slide'></div>"],
    stagePadding: 0,
    loop:false,
    center: true,
    responsiveClass:true,
    responsive:{
        0:{
            items:1
        },
        600:{
            items:1
        },
        1000:{
            items:1
        }
    }
    })
</script>
@endsection