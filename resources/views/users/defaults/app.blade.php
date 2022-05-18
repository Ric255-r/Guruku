{{--<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>




    @foreach ($video as $query => $videos)
        <div class="card">
            <div class="card-header" id="headingOne">
            <h5 class="text-header">{{ $videos->judul }}</h5>
            <h5 class="mb-0">
                @foreach ($anakvideo as $query)
                    @if ($query->video_id == $videos->id)
                        <a href="{{ $videodetails->url }}/users/course_playing/{{ $query->id }}/{{ $query->products_slug }}">
                            {{ Str::limit($query->nama,'21') }}
                        </a>
                    @endif
                @endforeach
            </h5>
            </div>
        </div>
    @endforeach
</body>
</html>--}}





<!DOCTYPE html>
<html lang="en">
  <head>

    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap core CSS -->
    {{--<link href="{{ URL::asset('/css/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">--}}

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <!-- Custom styles for this template -->
    <link href="{{ URL::asset('/css/side/simple-sidebar.css') }}" rel="stylesheet">

    <title>Belajar</title>
  </head>
  <body>

    <div class="d-flex" id="wrapper">

        <!-- Sidebar -->
            {{--@include('includes.sidebarplaying')--}}
            <div class="bg-light border-right" id="sidebar-wrapper">
                <div class="sidebar-heading">
                  <img src="{{ URL::asset('/img/owlitam1.png') }}" alt="" width="100">
                </div>
                <div class="list-group list-group-flush">
                     {{--@foreach ($video as $query => $videos)
                        <div class="card">
                            <div class="card-header" id="headingOne">
                            <h5 class="text-header">{{ $videos->judul }}</h5>
                            <h5 class="mb-0">
                                @foreach ($anakvideo as $query)
                                    @if ($query->video_id == $videos->id)
                                        <a href="{{ $videodetails->url }}/users/course_playing/{{ $query->video_id }}/{{ $query->products_slug }}">
                                            {{ Str::limit($query->nama,'21') }}
                                        </a>
                                    @endif
                                @endforeach
                            </h5>
                            </div>
                        </div>
                    @endforeach--}}


                    {{--@foreach ($video as $query => $videos)
                        @foreach ($anakvideo as $query)
                            @if ($query->video_id == $videos->id)
                                <div class="card">
                                    <div class="card-header" id="headingOne">
                                        <h5 class="text-header">{{ $query->video->judul }}</h5>
                                        <h5 class="mb-0">
                                            <a href="{{ $videodetails->url }}/users/course_playing/{{ $videos->id }}/{{ $videos->products_slug }}">
                                                {{ Str::limit($videos->nama,'21') }}
                                            </a>
                                        </h5>
                                    </div>
                                </div>
                                @else

                            @endif
                        @endforeach
                    @endforeach--}}

                    @foreach ($anakvideo as $query => $videos)
                        @foreach ($video as $query)
                            @if ($query->id == $videos->video_id)
                            <div class="card">
                                <div class="card-header" id="headingOne">
                                    <h5 class="text-header">{{ $query->judul }}</h5>
                                    <h5 class="mb-0">
                                        <a href="{{ route('play.show',$videos->number) }}">
                                            {{ Str::limit($videos->nama,'21') }}
                                        </a>
                            @endif
                        @endforeach
                                    </h5>
                                </div>
                            </div>
                    @endforeach
                </div>
            </div>

        <!-- /#sidebar-wrapper -->



        <!-- Page Content -->
            <div id="page-content-wrapper">

                {{--navbar--}}
                <nav class="navbar navbar-expand-lg navbar-light bg-light border-bottom">
                    <button class="btn btn-outline-secondary" id="menu-toggle">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav ml-auto mt-2 mt-lg-0">
                        <li class="nav-item active">
                            <a class="nav-link" href="{{ url('/') }}">Home <span class="sr-only">(current)</span></a>
                        </li>
                        @auth
                            <div class="user-area dropdown" style="margin-right:100px;">
                                <a href="#" class="dropdown-toggle active" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <img class="rounded-circle" src="{{ url('img/peo.png') }}" alt="User Avatar" style="width:40px;">
                                </a>
                                <div class="user-menu dropdown-menu">
                                    @if (Auth::user()->roles == 'ADMIN')
                                        <a href="{{ route('dashboard') }}" class="btn btn-primary btn-sm">Halaman Admin</a>
                                        <form action="{{url('logout')}}" method="post" class="mt-2">
                                            @csrf
                                            <button type="submit" class="btn btn-danger btn-sm">
                                                Logout
                                            </button>
                                        </form>
                                    @else
                                        <a href="{{ route('orang.index') }}" class="btn btn-primary btn-sm btn-block">Profile</a>
                                        <form action="{{url('logout')}}" method="post" class="form-inline mt-2">
                                            @csrf
                                            <button type="submit" class="btn btn-danger btn-sm btn-block">
                                                Logout
                                            </button>
                                        </form>
                                    @endif
                                </div>
                            </div>
                        @endauth
                        </ul>
                    </div>
                    </nav>

            {{--endnav --}}


            {{--content --}}
                <div class="container-fluid">
                    @yield('content')
                </div>
                {{--end content --}}
        </div>
        <!-- /#page-content-wrapper -->

    </div>
      <!-- /#wrapper -->












    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Menu Toggle Script -->
    <script>
        $("#menu-toggle").click(function(e) {
            e.preventDefault();
            $("#wrapper").toggleClass("toggled");
        });
    </script>

  </body>
</html>

