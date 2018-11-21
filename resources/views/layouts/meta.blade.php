<!doctype html>
<html lang="en">

<head>
    <title>Diu research lab</title>

    <!-- Fav icon -->
    <link rel="icon" href="https://daffodilvarsity.edu.bd/images/diu/favicon.ico" type="image/gif">

    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="keywords" content="diu research lab,research lab,artificial intelligence researh lab,ai research lab,daffodil international university research lab,Daffodil,University,DIU,Private University,daffodil university Bangladesh,daffodil university,private university of Bangladesh,daffodil varsity">
    <meta name="description" content="Daffodil International University Research lab is a ">

    <!-- CSS -->
    @yield('stylesheet')
    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/toastr.min.css')}}">
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('css/style.css')}}">

</head>

<body>
    <nav class="navbar navbar-default navbar-static-top">
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
                    <li {{{ (Request::is( '/') ? 'class=active' : '') }}}>
                        <a href="{{ route('home') }}">Home</a>
                    </li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                            Research
                            <span class="caret"></span>
                        </a>
                        <ul class="dropdown-menu">
                            <li {{{ (Request::is('project') ? 'class=active' : '') }}}>
                                <a href="{{ route('project') }}">Projects</a>
                            </li>
                            <li role="separator" class="divider"></li>
                            <li {{{ (Request::is('deliverable') ? 'class=active' : '') }}}>
                                <a href="{{ route('deliverable') }}">Deliverable</a>
                            </li>
                            <li role="separator" class="divider"></li>
                            <li {{{ (Request::is('members') ? 'class=active' : '') }}}>
                                <a href="{{ route('members') }}">Members</a>
                            </li>
                        </ul>
                    </li>
                    <li {{{ (Request::is('posts') ? 'class=active' : '') }}}>
                        <a href="{{ route('posts') }}">Post</a>
                    </li>
                    <li {{{ (Request::is('openpositions') ? 'class=active' : '') }}}>
                        <a href="/openpositions">Open positions</a>
                    </li>
                </ul>
                <ul class="nav navbar-nav navbar-right">
                    <li {{{ (Request::is('contact') ? 'class=active' : '') }}}>
                        <a href="/contact">Contact</a>
                    </li>
                    @if(Auth::check())
                    <li>
                        <a href="{{route('logout')}}" class="btn btn-danger" onclick="event.preventDefault();document.getElementById('lo').submit();">Logout</a>
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

    <nav class="navbar navbar-default navbar-static-bottom">
        <div class="container">
            <div class="row">
                <div class="col-md-8 col-sm-6 col-xs-12">
                    <img id="diulogo" src="{{asset('images/diu.png')}}" alt="Daffodil international university">
                </div>

                <div class="col-md-4 col-sm-6 col-xs-12">
                    <a href="{{ route('admin') }}">admin panel</a>
                    <a href="{{ route('post_create') }}">post create</a>

                </div>
            </div>

        </div>
    </nav>



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