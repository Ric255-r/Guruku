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
    <link rel="shortcut icon" sizes="57x57" href="{{ URL::asset('/Foto/favicon.png') }}">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/font-awesome@4.7.0/css/font-awesome.min.css">

    <!-- Custom styles for this template -->
    <link href="{{ URL::asset('/css/side/simple-sidebar.css') }}" rel="stylesheet">

    <title>Belajar</title>

    <style>
        .btn-toggler1{
            margin-left:80px;
        }
        /*.scroll-able{
            background:red;
        }*/
        .scroll-able::-webkit-scrollbar{
            width:10px;
        }
        .scroll-able::-webkit-scrollbar-thumb{
            background: #595959;
            border-radius: 10px;
        }
        .scroll-able::-webkit-scrollbar-track{
            background:#808080;
            border-radius:10px;
        }
        .scroll-able::-webkit-scrollbar-thumb:hover {
            background: #3b3b3b;
            cursor: pointer;
        }
        /* If the screen size is 320px or less*/
        @media only screen and (max-width: 320px){
            .btn-toggler1{
                margin-left:-80px;
            }
        }

        /* Extra small devices (phones, 600px and down) */
        /*batas besarnya 600 ato kurang & kalo screen 320 ato lebih (600-320)*/
        @media only screen and (max-width: 600px) and (min-width: 320px){
            .btn-toggler1{
                margin-left:-100px;
            }
        }

        /* Small devices (portrait tablets and large phones, 600px and up) */
        /*screen nya 600 ato lebih  sampe sini*/
        @media only screen and (min-width: 600px) {
            .btn-toggler1{
                margin-left:-400px;
            }
        }

        /* Medium devices (landscape tablets, 768px and up) */
        /*screen nya 768 ato lebih*/
        @media only screen and (min-width: 768px) {
            .btn-toggler1{
                margin-left:-480px;
            }
        }

        /* Large devices (laptops/desktops, 992px and up) */
        /*klo screen 992 ato lebih*/
        @media only screen and (min-width: 992px) {
            .btn-toggler1{
                margin-left:80px;
            }
        }

        /* Extra large devices (large laptops and desktops, 1200px and up) */
        /*klo screen 1200 ato lebih*/
        @media only screen and (min-width: 1200px) {
            .btn-toggler1{
                margin-left:80px;
            }
        }

    </style>


  </head>
  <body>

    <div class="d-flex" id="wrapper">

        <!-- Sidebar -->
            {{--@include('includes.sidebarplaying')--}}
            <div class="bg-dark border-right" id="sidebar-wrapper" style="overflow-y:auto; height:100px; position:fixed; z-index:1;">
                {{--<div class="sidebar-heading">
                  <img src="{{ URL::asset('/img/owlitam1.png') }}" alt="" width="100">
                </div>--}}
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

                    {{--@foreach ($anakvideo as $query)
                    <a href="{{ $videodetails->url }}/users/course_playing/{{ $query->id }}/{{ $query->products_slug }}">
                        <a href="{{ $videodetails->url }}/users/play_course/{{ $query->id }}/{{ $query->products_slug }}">{{ $query->nama }}</a>
                    @endforeach--}}
                    @php
                        $counterunlock = 0;
                        $counterserti = 0;
                        foreach ($unlock as $key => $value) {
                            foreach ($serti as $query) {
                                if($value->id == $query->videodetails_id ){
                                    // echo "Test";
                                    $counterserti++;
                                }
                            }
                            $counterunlock++;
                        }
                        // echo "Unlock" . $counterunlock;
                        // echo "Counterserti" . $counterserti;
                    @endphp

                    @if ($counterunlock != $counterserti)
                        @if ($videodetails->kelas->sertifikat != null)
                            <div class="card-header" style="background-color:#36C5BA; margin-top:80px;">
                                <h5 class="mb-0">
                                    <a href="#" onclick="belumselesai(); return false" class="text-white">Sertifikat</a>
                                </h5>
                            </div>
                        @endif
                    @else
                        <div id="sertitimpa">
                            @if ($videodetails->kelas->sertifikat != null)
                                <div class="card-header" style="background-color:#36C5BA; margin-top:80px;">
                                    <h5 class="mb-0">
                                        <a href="#" onclick="belumselesaikuis(); return false" target="" class="text-white">Sertifikat</a>
                                    </h5>
                                </div>
                            @endif
                        </div>
                        {{-- @if ($videodetails->kelas->sertifikat != null)
                            <div class="card-header" style="background-color:#36C5BA; margin-top:80px;">
                                <h5 class="mb-0">
                                    <a href="{{ route('play.sertifikat',$videodetails->kelas->slug) }}" target="_blank" class="text-white">Sertifikat {{ $nin->id }}</a>
                                </h5>
                            </div>
                        @endif --}}
                        @foreach ($kuisakhir as $item)
                            @foreach ($nilainya as $nin)
                                @if ($item->id === intval($nin->id_kuis))
                                    @if (strval($nin->nilai_awal) == '0' && strval($nin->nilai_akhir) == '0')
                                        @if ($videodetails->kelas->sertifikat != null)
                                            <script>
                                                var linkserti = "#";
                                                document.getElementById('sertitimpa').innerHTML = 
                                                `
                                                    <div class="card-header" style="background-color:#36C5BA; margin-top:80px;">
                                                        <h5 class="mb-0">
                                                            <a href="`+linkserti+`" target="_blank" class="text-white" onclick="kkm(); return false">Sertifikat</a>
                                                        </h5>
                                                    </div>
                                                `;
                                            </script>
                                        @endif
                                    @elseif($nin->nilai_awal >= 90)
                                        @if ($videodetails->kelas->sertifikat != null)
                                            <script>
                                                var linkserti = "{{ route('play.sertifikat',$videodetails->kelas->slug) }}";
                                                document.getElementById('sertitimpa').innerHTML = 
                                                `
                                                    <div class="card-header" style="background-color:#36C5BA; margin-top:80px;">
                                                        <h5 class="mb-0">
                                                            <a href="`+linkserti+`" target="_blank" class="text-white">Sertifikat</a>
                                                        </h5>
                                                    </div>
                                                `;
                                            </script>
                                        @endif
                                    @elseif($nin->nilai_akhir >= 90)
                                        @if ($videodetails->kelas->sertifikat != null)
                                            <script>
                                                var linkserti = "{{ route('play.sertifikat',$videodetails->kelas->slug) }}";
                                                document.getElementById('sertitimpa').innerHTML = 
                                                `
                                                    <div class="card-header" style="background-color:#36C5BA; margin-top:80px;">
                                                        <h5 class="mb-0">
                                                            <a href="`+linkserti+`" target="_blank" class="text-white">Sertifikat</a>
                                                        </h5>
                                                    </div>
                                                `;
                                            </script>
                                        @endif
                                    @elseif ($nin->nilai_awal <= 90 || $nin->nilai_akhir <= 90)
                                        @if ($videodetails->kelas->sertifikat != null)
                                            <script>
                                                var linkserti = "#";
                                                document.getElementById('sertitimpa').innerHTML = 
                                                `
                                                    <div class="card-header" style="background-color:#36C5BA; margin-top:80px;">
                                                        <h5 class="mb-0">
                                                            <a href="`+linkserti+`" target="_blank" class="text-white" onclick="kkm(); return false">Sertifikat</a>
                                                        </h5>
                                                    </div>
                                                `;
                                            </script>
                                        @endif
                                    @endif
                                @endif
                            @endforeach
                        @endforeach
                    @endif

                    @foreach ($anakvideo as $query => $videos)
                        @foreach ($video as $query)
                            @if ($query->id == $videos->video_id)
                                <div class="card mt-3" style="background-color:#89adac;">
                                    <div class="card-header" id="headingOne">
                                        <h5 class="mb-0">
                                            <a href="{{ $videodetails->url }}/users/play_course/{{ $videos->id }}/{{ $videos->products_slug }}"
                                                style="color:#ffff;">
                                                {{ Str::limit($videos->nama,'21') }}
                                                @php
                                                    foreach ($cekserti as $item) {
                                                        if ($item->videodetails_id == $videos->id) {
                                                            if ($item->status == "DONE") {
                                                                echo "<i class='fa fa-check px-2' style='color: green;' aria-hidden='true'></i>";
                                                            }
                                                            if($item->alert == true){
                                                                echo "<i class='fa fa-bookmark text-warning px-2' aria-hidden='true'></i>";
                                                            }
                                                        }
                                                    }
                                                @endphp
                                                {{-- @if ($videos->status == 'ALERT')
                                                    <i class="fa fa-exclamation-triangle text-warning" aria-hidden="true"></i>
                                                @endif
                                                @if ($videos->status == 'DONE')
                                                    <i class="fa fa-check" style="color: green;" aria-hidden="true"></i>
                                                @endif --}}
                                            </a>
                                        </h5>
                                    </div>
                                </div>
                            @endif
                        @endforeach
                    @endforeach

                    {{--@foreach ($anakvideo as $query => $videos)
                        @foreach ($video as $query)
                            @if ($query->id == $videos->video_id)
                            <div class="card">
                                <div class="card-header" id="headingOne">
                                    <h5 class="text-header">{{ $query->judul }}</h5>
                                    <h5 class="mb-0">
                                        <a href="{{ $videodetails->url }}/users/play_course/{{ $videos->id }}/{{ $videos->products_slug }}">
                                            {{ Str::limit($videos->nama,'21') }}
                                        </a>
                            @endif
                        @endforeach
                                    </h5>
                                </div>
                            </div>
                    @endforeach--}}
                </div>
            </div>

        <!-- /#sidebar-wrapper -->



        <!-- Page Content -->
            <div id="page-content-wrapper">

                {{--navbar--}}
                <nav class="navbar navbar-row navbar-expand-lg navbar-light bg-dark border-bottom fixed-top">
                    {{--<button class="btn btn-outline-secondary" id="menu-toggle">
                        <span class="navbar-toggler-icon"></span>
                    </button>--}}

                    <a class="navbar-brand" href="{{ url('/') }}">
                        <img src="{{ URL::asset('/Foto/owlputih.png') }}" alt="" width="100" style="z-index: 3;">
                    </a>

                    {{--<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>--}}

                    <button class="btn btn-outline-secondary btn-toggler1 border-0" id="menu-toggle">
                        <img src="{{ asset('/Foto/toggler.png') }}" alt="navbar_icon" style="z-index:3;">
                        {{--<span class="navbar-toggler-icon"></span>--}}
                    </button>

                    <button class="navbar-toggler d-lg-none d-sm-none d-block d-md-none" type="button"
                            data-toggle="collapse" data-target="#navbartoggler"
                            aria-controls="navbarNav" aria-expanded="false"
                            aria-label="Toggle navigation"
                            style="border:none;">

                            <a class="nav-link dropdown-toggle text-white" href="#">
                                <img class="rounded-circle" src="{{ url('Foto/ic_user_2.png') }}" alt="User Avatar" style="width:40px;">
                            </a>
                    </button>

                    {{--<div class="collapse navbar-collapse" id="navbarSupportedContent">
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
                    </div>--}}

                    <div class="collapse navbar-collapse" id="navbartoggler">
                        {{-- d-lg-none d-md-none d-sm-none --}}
                        {{--<div class="dropdown-menu" aria-labelledby="navbarDropdown">--}}
                            <a href="{{ route('orang.index') }}" class="dropdown-item text-center text-white d-lg-none d-md-none d-sm-none">Profile</a>
                            <form action="{{url('logout')}}" method="post" class="form-inline dropdown-item d-lg-none d-md-none d-sm-none">
                                @csrf
                                <button type="submit" class="btn btn-danger btn-sm btn-block">
                                    Logout
                                </button>
                            </form>
                        {{--</div>--}}
                    </div>

                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav ml-auto mt-2 mt-lg-0">
                            <li class="nav-item dropdown" style="margin-right:100px;">
                                <a class="nav-link dropdown-toggle text-white" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <img class="rounded-circle" src="{{ url('Foto/ic_user_2.png') }}" alt="User Avatar" style="width:40px;">
                                </a>
                                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    <a href="{{ route('orang.index') }}" class="dropdown-item text-center">Profile</a>
                                    <form action="{{url('logout')}}" method="post" class="form-inline dropdown-item">
                                        @csrf
                                        <button type="submit" class="btn btn-danger btn-sm btn-block">
                                            Logout
                                        </button>
                                    </form>
                                </div>
                            </li>
                        </ul>
                    </div>

                </nav>

            {{--endnav --}}


            {{--content --}}
                @yield('content')
                {{--<div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12" style="border:5px solid green;">
                            @yield('content')
                        </div>
                    </div>
                </div>--}}
                {{--end content --}}
        </div>
        <!-- /#page-content-wrapper -->

    </div>
      <!-- /#wrapper -->












    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script
        src="https://code.jquery.com/jquery-3.5.1.js"
        integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc="
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.4/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js"></script>
    {{--<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>--}}
    {{--<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>--}}

    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    {{-- Swal --}}
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>


    <!-- Menu Toggle Script -->
    <script>
        $("#menu-toggle").click(function(e) {
            e.preventDefault();
            $("#wrapper").toggleClass("toggled");
        });
    </script>
    <script>
        function belumselesai(){
            swal({
                title: 'Ups',
                text: 'Anda Harus Menyelesaikan Semua Materi',
                icon: 'warning'
            });
        }

        function belumselesaikuis(){
            swal({
                title: 'Ups',
                text: 'Anda Harus Menyelesaikan Kuis Terakhir Sebelum Claim',
                icon: 'warning'
            });
        }

        function kkm(){
            swal({
                title: 'Ups',
                text: 'Kuis Terakhir Harus Tuntas Minimal 90 Untuk Claim',
                icon: 'warning'
            });
        }
    </script>


  </body>
</html>

