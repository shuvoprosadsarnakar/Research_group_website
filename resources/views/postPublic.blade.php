@extends('layouts.meta') 

@section('stylesheet')

@endsection


@section('body')

<div class="container">
    <div class="panel panel-default">
        <div class="panel-heading">
            <h2>
                Posts
            </h2>
        </div>
        <div class="panel-body">
            <ul class="media-list">
<!-- start list of posts repeat this list item to add more posts -->
                <li class="media">
                    <div class="media-left">
                        <a href="">
                            <!-- Image/thumbnail of the post -->
                            <img class="media-object" src="{{asset('images/kmisir.jpg')}}" alt="...">
                        </a>
                    </div>
                    <div class="media-body">
                        <a href="">
                            <!-- Title/name of the post -->
                            <h4 class="media-heading">Media heading = Lorem ipsum dolor sit amet consectetur adipisicing elit. Aspernatur incidunt ullam, dicta perferendis autem aut sapiente possimus placeat ducimus exercitationem amet quibusdam dolore eius tota</h4>
                        </a>
                        <!-- Description of the post -->
                        <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Vel harum nihil laudantium exercitationem nesciunt. Mollitia laudantium reprehenderit alias nisi quae? Quia ipsa repudiandae exercitationem architecto dignissimos expedita nemo minus necessitatibus!</p>
                    </div>
                </li>
<!-- end list of posts repeat this list item to add more posts -->
                <li class="media">
                    <div class="media-left">
                    <a href="#">
                        <img class="media-object" src="{{asset('images/kmisir.jpg')}}" alt="...">
                    </a>
                    </div>
                    <div class="media-body">
                    <h4 class="media-heading">Media heading = Lorem ipsum dolor sit amet consectetur adipisicing elit. Aspernatur incidunt ullam, dicta perferendis autem aut sapiente possimus placeat ducimus exercitationem amet quibusdam dolore eius tota</h4>
                    <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Vel harum nihil laudantium exercitationem nesciunt. Mollitia laudantium reprehenderit alias nisi quae? Quia ipsa repudiandae exercitationem architecto dignissimos expedita nemo minus necessitatibus!</p>
                    </div>
                </li>
            </ul>
        </div>
    </div>
</div>
@endsection


@section('javascript')

@endsection