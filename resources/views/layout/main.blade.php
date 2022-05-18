<!doctype html>
<html lang="en">
    <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    {{-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css"> --}}
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    {{-- <link href="{{ URL::asset('css/font.css') }}" rel="stylesheet"> --}}
{{-- <link rel="stylesheet" href="{{ URL::asset('/css/font2.css') }}"> --}}
    {{-- <link rel="stylesheet" href="{{ URL::asset('/js/config.js') }}"> --}}
    <link rel="stylesheet" href="{{URL::asset('/css/navbar.css')}}">
    <title>@yield('home')</title>
    <style>
        /* .navbar-light .navbar-nav .nav-link{
            color:white;
    }
.navbar-light .navbar-nav
.nav-link:hover{
    color:#E2E0DD;
}
.btn-mulai{
    background-color:#FCAA23;
    border-radius:6px;
    color:white;
    width:200px;
}
.btn-mulai:hover{
    background-color:#C38C30;
    color:white;
}
    .war{
        background-color:#0089F0;
    } */

    </style>
    {{-- <link rel="stylesheet" href="{{URL::asset('/css/main.css')}}"> --}}
    </head>
<body>

    {{-- <nav class="navbar navbar-expand-lg navbar-light war fixed-top">
        <div class="container">
        <a class="navbar-brand" href="{{url('/')}}">Logo</a>
            <button class="navbar-toggler whi" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
                <ul class="navbar-nav ml-auto mt-2 mt-lg-0">
                    <li class="nav-item">
                    <a class="nav-link mr-5" style="color:white" href="{{url('/')}}">Beranda</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link mr-5 pu" style="color:white" href="#">Paket Kelas</a>
                    </li>
                    <li class="nav-item">
                        <div class="dropdown show">
                            <a class="nav-link mr-5 pu dropdown-toggle" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="color:white" href="">Kelas</a>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                <a href="{{URL::asset('kelasgratis')}}">Kelas Gratis</a> <br>
                                <a href="{{URL::asset('kelaspremium')}}">Kelas Premium</a>
                            </div>
                        </div>
                    </li>
                    <li class="nav-item">
                    <a class="nav-link mr-5 pu" style="color:white" href="{{url('guru')}}">Guru</a>
                    </li>
                </ul>
                <button class="btn btn-outline-light text-white my-2 my-sm-0 mr-5" type="submit">Login</button>
                <button class="btn btn-outline-light text-white my-2 my-sm-0" type="submit">Register</button>
            </div>
        </div>
    </nav> --}}


    <div class="container-fluid">
        {{-- desktop navbar  --}}
        <nav class="row navbar navbar-expand-lg navbar-light warna-navbar">
            <a href="" class="navbar-brand">
                <img src="{{ url('img/textputih.png') }}" style="width:100px;" alt="logo guruku">
            </a>
            <button class="navbar-toggler navbar-toggler-right" type="button"
            data-toggle="collapse" data-target="#nav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="nav">
                <ul class="navbar-nav ml-auto mr-3">
                    <li class="nav-item mx-md-3">
                        <a href="{{URL::asset('/')}}" class="nav-link active" style="color:white;
                        font-weight:bold;">Beranda</a>
                    </li>
                    <li class="nav-item mx-md-3">
                        <a href="{{URL::asset('/paketkelas')}}" class="nav-link">Paket Kelas</a>
                    </li>
                    <li class="nav-item mx-md-3">
                        <a href="{{URL::asset('/kelas')}}" class="nav-link">Kelas</a>
                    </li>
                    {{-- <li class="nav-item dropdown mx-md-2">
                        <a href="" class="nav-link dropdown-toggle" id="navbardrop"
                        data-toggle="dropdown">
                            Kelas
                        </a>
                        <div class="dropdown-menu">
                            <a href="{{URL::asset('/kelasgratis')}}" class="dropdown-item">Kelas Gratis</a>
                            <a href="{{URL::asset('kelaspremium')}}" class="dropdown-item">Kelas Premium</a>
                        </div>
                    </li> --}}
                    {{--<li class="nav-item mx-md-3">
                        <a href="{{URL::asset('/guru')}}" class="nav-link">Guru</a>
                    </li>--}}
                </ul>
                {{-- mobile button --}}
                @guest
                    <form action="" class="d-sm-block d-md-none">
                        <button type="button" onclick="event.preventDefault(); location.href='{{url('login')}}';" class="btn btn-outline-light btn-block my-2 my-sm-0">
                            Login
                        </button>
                    </form>
                @endguest

                @guest
                    <form action="" class="d-sm-block d-md-none">
                        <button type="button" onclick="event.preventDefault(); location.href='{{url('register')}}';" class="btn btn-outline-light btn-block my-2 my-sm-2 jrk-mobile-regis">
                            Register
                        </button>
                    </form>
                @endguest

                @auth
                    <form action="{{url('logout')}}" method="post" class="d-sm-block d-md-none">
                        @csrf
                        <button type="submit" class="btn btn-outline-light btn-block my-2 my-sm-2 jrk-mobile-regis">
                            Logout
                        </button>
                    </form>
                @endauth

                {{-- desktop button --}}
                @guest
                    <form action="" class="form-inline my-2 my-lg-0 d-none d-none d-md-block">
                        <button type="button" onclick="event.preventDefault(); location.href='{{url('login')}}';" class="btn btn-outline-light btn-navbar-right my-2 my-sm-0 px-4">
                            Login
                        </button>
                    </form>
                @endguest
                @guest
                    <form action="" class="form-inline my-2 my-lg-0 d-none d-none d-md-block">
                        <button type="button" onclick="event.preventDefault(); location.href='{{url('register')}}';" class="btn btn-outline-light btn-navbar-right my-2 my-sm-0 px-4 ml-lg-3">
                            Register
                        </button>
                    </form>
                @endguest
                @auth
                    <form action="{{url('logout')}}" method="post" class="form-inline my-2 my-lg-0 d-none d-none d-md-block">
                        @csrf
                        <button type="submit" class="btn btn-outline-light btn-navbar-right my-2 my-sm-0 px-4 ml-lg-3">
                            Logout
                        </button>
                    </form>
                @endauth

            </div>
        </nav>
    </div>

    @yield('container')







    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>
</html>
