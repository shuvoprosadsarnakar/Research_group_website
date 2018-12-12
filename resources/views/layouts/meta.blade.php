<!doctype html>
<html lang="en">

<head>
    <title>Ambient Intelligence Lab</title>

    <!-- Fav icon -->
    <link rel="icon" href="https://daffodilvarsity.edu.bd/images/diu/favicon.ico" type="image/gif">

    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="keywords" content="ambient intelligene research lab, diu research lab,research lab,artificial intelligence researh lab,ai research lab,daffodil international university research lab,Daffodil,University,DIU,Private University,daffodil university Bangladesh,daffodil university,private university of Bangladesh,daffodil varsity">
    <meta name="description" content="Daffodil International University Research lab is a ">

    <!-- CSS -->
    @yield('stylesheet')
    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/toastr.min.css')}}">
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
    <link rel="stylesheet" href="{{asset('css/stars.css')}}">
    <style>
        #diulogo{
    width: 86px;
}
    </style>
    @yield('stylesheet_after')
    
</head>

<body>
    <nav class="navbar navbar-default navbar-static-top navbar-fix">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false"
                    aria-controls="navbar">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
            </div>
            <div id="navbar" class="navbar-collapse collapse">
                <ul class="nav navbar-nav">
                    <li {{ (Request::is( '/') ? 'class=active' : '') }}>
                        <a href="{{ route('home') }}">Home</a>
                    </li>
                    <li {{ (Request::is( 'posts_type') ? 'class=active' : '') }}>
                        <a href="{{ route('posts_type',['type' => 'Thesis','criteria' => 'startDate','order' => 'desc']) }}">Thesis</a>
                    </li>
                    </li>
                    <li {{ (Request::is( 'posts_type') ? 'class=active' : '') }}>
                        <a href="{{ route('posts_type',['type' => 'Project','criteria' => 'startDate','order' => 'desc']) }}">Project</a>
                    </li>
                    
                </ul>
                <ul class="nav navbar-nav navbar-right">
                    <li {{ (Request::is('publications') ? 'class=active' : '') }}>
                        <a href="{{ route('publications') }}">Publications</a>
                    </li>
                    <li {{ (Request::is( 'posts_type') ? 'class=active' : '') }}>
                        <a href="{{ route('posts_type',['type' => 'Report','criteria' => 'startDate','order' => 'desc']) }}">Reports</a>
                    </li>
                    <li {{ (Request::is('members') ? 'class=active' : '') }}>
                        <a href="{{ route('members') }}">Members</a>
                    </li>
                    <li {{ (Request::is('group') ? 'class=active' : '') }}>
                        <a href="{{ route('groups') }}">Groups</a>
                    </li>
                    <li {{ (Request::is('contact') ? 'class=active' : '') }}>
                        <a href="{{ route('contact') }}">Contact</a>
                    </li> 
                    @if(Auth::check())
                    <li>
                        <a href="{{route('admin')}}">Admin Panel</a>
                    </li>
                    <li>
                        <a href="{{route('logout')}}" class="" onclick="event.preventDefault();document.getElementById('lo').submit();">Logout</a>
                        <form action="{{route('logout')}}" method="post" id="lo" style="display:none">
                            {{csrf_field()}}
                        </form>
                    </li>
                    @endif
                </ul>
            </div>
            <!--/.nav-collapse -->
        </div>
    </nav>
    <div class="wrap">
        @yield('body')
    </div>



    <footer class="navbar navbar-static-bottom navbar-fix footer-down">
        <div class="container">
            <div class="row">
                <div class="col-md-8 col-sm-6 col-xs-12">
                    <img id="diulogo" src="{{asset('images/diu.png')}}" alt="Daffodil international university">
                </div>
            </div>
        </div>
    </footer>



    <!-- Javascripts -->
    <script type="text/javascript" src="{{asset('js/jquery-3.2.1.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/toastr.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/bootstrap.min.js')}}"></script>
    <script>
        @if(Session::has('success'))
        toastr.success("{{Session::get('success')}}")
        @endif

        @if(Session::has('alert'))
        toastr.error("{{Session::get('alert')}}")
        @endif

        @if(count($errors) > 0)

        @foreach($errors->all() as $error)
        toastr.error("{{ $error }}")
        @endforeach

        @endif
    </script>

    @yield('javascript')


</body>

</html>