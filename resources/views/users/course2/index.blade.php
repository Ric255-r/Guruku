
    {{--@foreach ($trans as $query => $transac)
        @foreach ($join as $query)
            @if ($transac->user_id == Auth::user()->id)

                @else
                <p>anda tidak memiliki akses untuk kelas ini</p>
            @endif
        @endforeach
    @endforeach--}}


    {{--@foreach ($join as $query)
        @if ($query->user_id == Auth::user()->id AND $query->products_id == $videodetails->products_slug)
                @foreach ($anakvideo as $query)
                    @if ($query->number == 0)
                        <p class="mt-3" style="font-weight: bold; font-size:20px; color:#1d1d1d;">{{ $query->nama }}</p>
                        <p>Materi bagian : {{ $query->video->judul }}</p>
                        <iframe width="90%" height="450" src="https://www.youtube.com/embed/{{ $query->file }}" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                        <br>
                        <h3 class="mt-3">Modul Pembelajaran</h3>
                        @if ($query->namamodul == null)
                            <p>-</p>
                            @else
                            <table class="table table-responsive-sm">
                                <thead>
                                    <tr>
                                        <td><a href="{{ asset('/storage/'.$query->modul) }}" download="{{ $query->namamodul }}" style="color:#1d1d1d;text-decoration: underline;">{{ $query->namamodul }}</a></td>
                                        <td>
                                            <!-- Button trigger modal -->
                                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalScrollable">
                                                <i class="fa fa-eye"></i>
                                            </button>

                                            <!-- Modal -->
                                            <div class="modal fade bd-example-modal-lg" id="exampleModalScrollable" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
                                                <div class="modal-dialog modal-lg modal-dialog-scrollable" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalScrollableTitle">Modal title</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <iframe src="{{ asset('/storage/'.$query->modul) }}" style="border:none; width:100%; height:700px;"></iframe>
                                                    </div>
                                                    <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                    <a href="{{ asset('/storage/'.$query->modul) }}" class="btn btn-primary" download="{{ $query->namamodul }}">Download</a>
                                                    </div>
                                                </div>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                </thead>
                            </table>
                        @endif
                    @else

                    @endif
                @endforeach
            @else

        @endif
    @endforeach--}}

    {{--@foreach ($join as $query)
        @if ($query->user_id == Auth::user()->id AND $query->products_id == $videodetails->products_slug)
            {{ $query->user_id }}
            {{ $query->product->kelas }}
        @elseif($query->user_id != Auth::user()->id AND $query->products_id != $videodetails->products_slug)
            <br> hai
        @endif
    @endforeach--}}




{{--@extends('users.defaults2.app')

@section('content')

    @foreach ($anakvideo as $query)
        @if ($query->number == 0)
            <p class="mt-3" style="font-weight: bold; font-size:20px; color:#1d1d1d;">{{ $query->nama }}</p>
            <p>Materi bagian : {{ $query->video->judul }}</p>
            <iframe width="90%" height="450" src="https://www.youtube.com/embed/{{ $query->file }}" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
            <br>
            <h3 class="mt-3">Modul Pembelajaran</h3>
            @if ($query->namamodul == null)
                <p>-</p>
                @else
                <table class="table table-responsive-sm">
                    <thead>
                        <tr>
                            <td><a href="{{ asset('/storage/'.$query->modul) }}" download="{{ $query->namamodul }}" style="color:#1d1d1d;text-decoration: underline;">{{ $query->namamodul }}</a></td>
                            <td>
                                <!-- Button trigger modal -->
                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalScrollable">
                                    <i class="fa fa-eye"></i>
                                </button>

                                <!-- Modal -->
                                <div class="modal fade bd-example-modal-lg" id="exampleModalScrollable" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
                                    <div class="modal-dialog modal-lg modal-dialog-scrollable" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalScrollableTitle">Modal title</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                        </div>
                                        <div class="modal-body">
                                            <iframe src="{{ asset('/storage/'.$query->modul) }}" style="border:none; width:100%; height:700px;"></iframe>
                                        </div>
                                        <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                        <a href="{{ asset('/storage/'.$query->modul) }}" class="btn btn-primary" download="{{ $query->namamodul }}">Download</a>
                                        </div>
                                    </div>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    </thead>
                </table>
            @endif
        @else

        @endif
    @endforeach
@endsection--}}



{{--{{ $videodetails->kelas->jenis }} <br>
{{ $data }} <br>
@foreach ($join as $query)
    {{ $query->user_id }}
@endforeach--}}


    {{--@extends('users.defaults2.app')
        @section('content')
            @if ($videodetails->kelas->jenis == 'gratis')

                @if ($join->count() > 0)

                        @foreach ($anakvideo as $query)
                            @if ($query->number == 0)
                                <p class="mt-3" style="font-weight: bold; font-size:20px; color:#1d1d1d;">{{ $query->nama }}</p>
                                <p>Materi bagian : {{ $query->video->judul }}</p>
                                <iframe width="90%" height="450" src="https://www.youtube.com/embed/{{ $query->file }}" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                                <br>
                                <h3 class="mt-3">Modul Pembelajaran</h3>
                                @if ($query->namamodul == null)
                                    <p>-</p>
                                    @else
                                    <table class="table table-responsive-sm">
                                        <thead>
                                            <tr>
                                                <td><a href="{{ asset('/storage/'.$query->modul) }}" download="{{ $query->namamodul }}" style="color:#1d1d1d;text-decoration: underline;">{{ $query->namamodul }}</a></td>
                                                <td>
                                                    <!-- Button trigger modal -->
                                                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalScrollable">
                                                        <i class="fa fa-eye"></i>
                                                    </button>

                                                    <!-- Modal -->
                                                    <div class="modal fade bd-example-modal-lg" id="exampleModalScrollable" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
                                                        <div class="modal-dialog modal-lg modal-dialog-scrollable" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalScrollableTitle">Modal title</h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <iframe src="{{ asset('/storage/'.$query->modul) }}" style="border:none; width:100%; height:700px;"></iframe>
                                                            </div>
                                                            <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                            <a href="{{ asset('/storage/'.$query->modul) }}" class="btn btn-primary" download="{{ $query->namamodul }}">Download</a>
                                                            </div>
                                                        </div>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                        </thead>
                                    </table>
                                @endif
                            @else

                            @endif
                        @endforeach

                @else
                    ups anda tidak memiliki akses untuk kelas ini
                @endif

            @endif


            @if ($videodetails->kelas->jenis == 'premium')

                @if ($trans->count() > 0)


                        @foreach ($anakvideo as $query)
                            @if ($query->number == 0)
                                <p class="mt-3" style="font-weight: bold; font-size:20px; color:#1d1d1d;">{{ $query->nama }}</p>
                                <p>Materi bagian : {{ $query->video->judul }}</p>
                                <iframe width="90%" height="450" src="https://www.youtube.com/embed/{{ $query->file }}" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                                <br>
                                <h3 class="mt-3">Modul Pembelajaran</h3>
                                @if ($query->namamodul == null)
                                    <p>-</p>
                                    @else
                                    <table class="table table-responsive-sm">
                                        <thead>
                                            <tr>
                                                <td><a href="{{ asset('/storage/'.$query->modul) }}" download="{{ $query->namamodul }}" style="color:#1d1d1d;text-decoration: underline;">{{ $query->namamodul }}</a></td>
                                                <td>
                                                    <!-- Button trigger modal -->
                                                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalScrollable">
                                                        <i class="fa fa-eye"></i>
                                                    </button>

                                                    <!-- Modal -->
                                                    <div class="modal fade bd-example-modal-lg" id="exampleModalScrollable" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
                                                        <div class="modal-dialog modal-lg modal-dialog-scrollable" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalScrollableTitle">Modal title</h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <iframe src="{{ asset('/storage/'.$query->modul) }}" style="border:none; width:100%; height:700px;"></iframe>
                                                            </div>
                                                            <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                            <a href="{{ asset('/storage/'.$query->modul) }}" class="btn btn-primary" download="{{ $query->namamodul }}">Download</a>
                                                            </div>
                                                        </div>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                        </thead>
                                    </table>
                                @endif
                            @else

                            @endif
                        @endforeach


                @else
                    ups anda tidak memiliki akses untuk kelas ini
                @endif

            @endif
    @endsection--}}

{{--@foreach ($cek as $query => $videos)
    @if ($videos->jenis == 'gratis')
        @if ($join->count() > 0)
            selamat belajar
        @else
            ups anda tidak memiliki akses untuk kelas ini
        @endif
    @elseif($videos->jenis == 'premium')
        @if ($trans->count() > 0)
            selamat belajar
        @else
            ups anda tidak memiliki akses untuk kelas ini
        @endif
    @else

    @endif
@endforeach--}}



    @if ($videodetails->kelas->jenis == 'gratis')

        @if ($join->count() > 0)

            <!DOCTYPE html>
            <html lang="en">
            <head>

                <!-- Required meta tags -->
                <meta charset="utf-8">
                <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
                <link rel="shortcut icon" sizes="57x57" href="{{ URL::asset('/Foto/favicon.png') }}">

                <!-- Bootstrap core CSS -->
                {{--<link href="{{ URL::asset('/css/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">--}}

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
            <body style="color:#ffff;">
                <div class="d-flex" id="wrapper">
                    <!-- Sidebar -->
                        {{--@include('includes.sidebarplaying')--}}
                        <div class="bg-dark border-right scroll-able" id="sidebar-wrapper" style="overflow-y:auto; height:100px; position:fixed; z-index:1;">
                            {{--<div class="sidebar-heading">
                            <img src="{{ URL::asset('/img/owlitam1.png') }}" alt="" width="100">
                            </div>--}}
                            <div class="list-group list-group-flush">
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
                                    {{-- @if ($videodetails->kelas->sertifikat != null)
                                        <div class="card-header" style="background-color:#36C5BA;">
                                            <h5 class="mb-0">
                                                <a href="{{ route('play.sertifikat',$videodetails->kelas->slug) }}" target="_blank" class="text-white">Sertifikat</a>
                                            </h5>
                                        </div>
                                    @endif --}}
                                    <div id="sertitimpa">
                                        @if ($videodetails->kelas->sertifikat != null)
                                            <div class="card-header" style="background-color:#36C5BA; margin-top:80px;">
                                                <h5 class="mb-0">
                                                    <a href="#" onclick="belumselesaikuis(); return false" target="" class="text-white">Sertifikat</a>
                                                </h5>
                                            </div>
                                        @endif
                                    </div>
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
                                    {{-- @foreach ($kuisakhir as $item)
                                        @foreach ($nilainya as $nin)
                                            @if ($item->id === intval($nin->id_kuis))
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
                                            @endif
                                        @endforeach
                                    @endforeach --}}
                                @endif
                                @foreach ($anakvideo as $query => $videos)
                                    @foreach ($video as $query)
                                        @if ($query->id == $videos->video_id)
                                            <div class="card mt-3" style="background-color:#89adac;">
                                                <div class="card-header" id="headingOne">
                                                    {{--<h5 class="text-header">{{ $query->judul }}</h5> ini nnti di komen--}}
                                                    <h5 class="mb-0">
                                                        <a href="{{ $videodetails->url }}/users/play_course/{{ $videos->id }}/{{ $videos->products_slug }}"
                                                            style="color:#ffff;">
                                                            {{ Str::limit($videos->nama,'21') }}
                                                            @php
                                                                foreach ($cekserti as $item) {
                                                                    if ($item->videodetails_id == $videos->id) {
                                                                        if ($item->status == "DONE") {
                                                                            echo "<i class='fa fa-check' style='color: green;' aria-hidden='true'></i>";
                                                                        }
                                                                        if($item->alert == true){
                                                                            echo "<i class='fa fa-bookmark text-warning' aria-hidden='true'></i>";
                                                                        }
                                                                    }
                                                                }
                                                            @endphp
                                                        </a>
                                                    </h5>
                                                </div>
                                            </div>
                                        @endif
                                    @endforeach
                                @endforeach
                            </div>
                        </div>

                    <!-- /#sidebar-wrapper -->

                    <!-- Page Content -->
                        <div id="page-content-wrapper">

                            {{--navbar--}}
                            <nav class="navbar navbar-row navbar-expand-lg navbar-light bg-dark border-bottom fixed-top">
                                <a class="navbar-brand" href="{{ url('/') }}">
                                    <img src="{{ URL::asset('/Foto/owlputih.png') }}" alt="" width="100">
                                </a>


                                {{--<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                                    <span class="navbar-toggler-icon"></span>
                                </button>--}}

                                <button class="btn btn-outline-secondary btn-toggler1 border-0" id="menu-toggle">
                                    <img src="{{ asset('/Foto/toggler.png') }}" alt="navbar_icon">
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
                            <div class="container-fluid bg-dark" style="z-index: -1;">
                                <div class="row">
                                    <div class="col-lg-12 ml-5">
                                        @foreach ($anakvideo as $query)
                                            @if ($query->number == 0)
                                                <div class="row" style="padding-top:100px;">
                                                    <div class="col-lg-6">
                                                        <p class="mt-3" style="font-weight: bold; font-size:20px; color:#ffff;">{{ $query->nama }}</p>
                                                        <p>Materi bagian : {{ $query->video->judul }}</p>
                                                    </div>
                                                    <div class="col-lg-6">
                                                        @if ($query->kelas->link_konsul == !null)
                                                            <p class="mt-3" style="font-weight: bold; font-size:20px; color:#ffff;">Link Konsultasi/Diskusi</p>
                                                            <a href="{{ $query->kelas->link_konsul }}" style="color:#ffff; text-decoration:underline">{{ $query->kelas->link_konsul }}</a>
                                                        @else
                                                            <p class="mt-3" style="font-weight: bold; font-size:20px; color:#ffff;">Link Konsultasi/Diskusi</p>
                                                            <a href="#" style="color:#ffff; text-decoration:underline;">Tidak Tersedia</a>
                                                        @endif
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-lg-12">
                                                        <iframe width="90%" height="450" src="https://www.youtube.com/embed/{{ $query->file }}" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                                                        {{-- <form action="{{ route('alert.course', $videodetails->id) }}" method="post">
                                                            @csrf
                                                            @method('PUT')
                                                            <button type="submit" class="btn btn-info d-inline">
                                                                Alert
                                                            </button>
                                                        </form>
                                                        <form action="{{ route('play.done', $videodetails->id) }}" method="post">
                                                            @csrf
                                                            @method('PUT')
                                                            @if ($videodetails->status == 'PENDING' OR $videodetails->status == 'RETRY' OR $videodetails->status == 'ALERT')
                                                                <button type="submit" class="btn btn-info d-inline" id="buat-submit">
                                                                    Selesai
                                                                </button>
                                                            @else
                                                                <button type="submit" class="btn btn-info d-inline" id="buat-submit">
                                                                    Ulang
                                                                </button>
                                                            @endif
                                                        </form> --}}
                                                    </div>
                                                </div>

                                                <div class="row mt-5">
                                                    <div class="col-lg-6 pl-5">
                                                        {{--modul pembelajaran --}}
                                                        <h4 class="text-white">Modul Pembelajaran</h4>
                                                        <table class="table table-borderless text-white">
                                                            <tbody>
                                                                {{--<p>{{ $query->details->number }}</p>--}}
                                                                {{--<p style="color:blue;">{{ $query->videodetails_id }}</p>--}}
                                                                <?php $i=1 ?>
                                                                @forelse ($modul as $query)
                                                                    @if ($query->details->number == '0')
                                                                        <tr>
                                                                            <td>{{ $i++ }}</td>
                                                                            <td>
                                                                                <a href="{{ asset('/storage/'.$query->file) }}" download="{{ $query->nama_modul }}"
                                                                                    style="color:#ffff; text-decoration:underline;">
                                                                                    {{ $query->nama_modul }}
                                                                                </a>
                                                                            </td>
                                                                        </tr>
                                                                    @endif
                                                                @empty
                                                                        <tr>
                                                                            <td>-</td>
                                                                        </tr>
                                                                @endforelse
                                                                <?php $i++ ?>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                    {{-- 16 Feb 21 --}}
                                                    {{-- <div class="col-lg-3">
                                                        <h4 class="text-white">Link Kuis</h4>
                                                        @if ($videodetails->number == 0)
                                                            @if ($videodetails->link_kuis == '-')
                                                                <a href="#" style="color:#ffff;">{{ $videodetails->link_kuis }}</a>
                                                            @else
                                                                <a href="{{ $videodetails->link_kuis }}" style="color:#ffff; text-decoration:underline;">{{ $videodetails->link_kuis }}</a>
                                                            @endif
                                                        @else
                                                            <a href="#" style="color:#ffff;">-</a>
                                                        @endif
                                                    </div> --}}
                                                    {{-- End 16 Feb 21 --}}
                                                    {{--<div class="col-lg-3">
                                                        <h4 class="text-white">Link Blog</h4>
                                                        @if ($videodetails->number == 0)
                                                            @if ($videodetails->link_blog == '-')
                                                                <a href="#" style="color:#ffff;">{{ $videodetails->link_blog }}</a>
                                                            @else
                                                                <a href="{{ $videodetails->link_blog }}" style="color:#ffff; text-decoration:underline;">{{ $videodetails->link_blog }}</a>
                                                            @endif
                                                        @else
                                                            <a href="#" style="color:#ffff;">-</a>
                                                        @endif
                                                    </div>--}}
                                                </div>

                                                {{--kodingan lama --}}
                                                    {{--<br>
                                                    <h4>Modul Pembelajaran</h4>
                                                    @if ($query->namamodul == null)
                                                        <p>-</p>
                                                        @else
                                                        <table class="table table-responsive-sm">
                                                            <thead>
                                                                <tr>
                                                                    <td><a href="{{ asset('/storage/'.$query->modul) }}" download="{{ $query->namamodul }}" style="color:#ffff; text-decoration: underline;">{{ $query->namamodul }}</a></td>
                                                                    <td>
                                                                        <!-- Button trigger modal -->
                                                                        <button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#exampleModalScrollable">
                                                                            <i class="fa fa-eye"></i>
                                                                        </button>

                                                                        <!-- Modal -->
                                                                        <div class="modal fade bd-example-modal-lg" id="exampleModalScrollable" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
                                                                            <div class="modal-dialog modal-lg modal-dialog-scrollable" role="document">
                                                                            <div class="modal-content">
                                                                                <div class="modal-header">
                                                                                    <h5 class="modal-title" id="exampleModalScrollableTitle">{{ $query->namamodul }}</h5>
                                                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                                        <span aria-hidden="true">&times;</span>
                                                                                    </button>
                                                                                </div>
                                                                                <div class="modal-body">
                                                                                    <iframe src="{{ asset('/storage/'.$query->modul) }}" style="border:none; width:100%; height:700px;"></iframe>
                                                                                </div>
                                                                                <div class="modal-footer">
                                                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                                                    <a href="{{ asset('/storage/'.$query->modul) }}" class="btn btn-primary" download="{{ $query->namamodul }}">Download</a>
                                                                                </div>
                                                                            </div>
                                                                            </div>
                                                                        </div>
                                                                    </td>
                                                                </tr>
                                                            </thead>
                                                        </table>
                                                    @endif--}}
                                                {{--end kodingan lama --}}
                                            @else

                                            @endif
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                            {{--end content --}}
                    </div>
                    <!-- /#page-content-wrapper -->

                </div>
                <!-- /#wrapper -->

                <footer class="py-4 bg-dark" style="margin-top:-20px;">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="d-flex justify-content-between ">
                                    <div class="text-muted">Copyright &copy; Guruku 2020</div>
                                    <div>
                                        <a href="#">Privacy Policy</a>
                                        &middot;
                                        <a href="#">Terms &amp; Conditions</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </footer>

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

                <!-- Menu Toggle Script -->
                <script>
                    $("#menu-toggle").click(function(e) {
                        e.preventDefault();
                        $("#wrapper").toggleClass("toggled");
                    });
                </script>
            </body>
            </html>

        @else

            <!doctype html>
            <html lang="en">
            <head>
                <!-- Required meta tags -->
                <meta charset="utf-8">
                <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

                <!-- Bootstrap CSS -->
                <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

                <title>Access Denied</title>
                <style>
                    .btn-kembali{
                        width:160px;
                    }
                </style>
            </head>
            <body>
                <div class="container">
                    <div class="row">
                        {{--<center>--}}
                            <div class="col-lg-12 text-center">
                                <img src="{{ URL::asset('/Foto/pentingbaru-01.png') }}" class="mt-4" width="360px" height="360px" class="img-fluid" alt="">
                                <h2 style="color:#1d1d1d;">Oops!</h2>
                                <p style="color:#7e7e7e; font-size:18px;">Sepertinya Anda tidak memiliki hak akses <br> untuk halaman ini</p>
                                <button class="btn btn-info btn-kembali"
                                    onclick="event.preventDefault(); location.href='{{route('myclass.index')}}';">Kembali</button>
                            </div>
                        {{--</center>--}}
                    </div>
                </div>

                <!-- Optional JavaScript -->
                <!-- jQuery first, then Popper.js, then Bootstrap JS -->
                <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
                <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
                <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
            </body>
            </html>


        @endif

    @elseif($videodetails->kelas->jenis == 'premium')

        @if ($status->transaction_status == 'SUCCESS')
            @if ($trans->count() > 0)

                <!DOCTYPE html>
                <html lang="en">
                <head>

                    <!-- Required meta tags -->
                    <meta charset="utf-8">
                    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
                    <link rel="shortcut icon" sizes="57x57" href="{{ URL::asset('/Foto/favicon.png') }}">
                    <!-- Bootstrap core CSS -->
                    {{--<link href="{{ URL::asset('/css/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">--}}

                    <!-- Bootstrap CSS -->
                    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
                    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css">
                    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/font-awesome@4.7.0/css/font-awesome.min.css">
                    {{--<base href="{{ asset('') }}">--}}
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
                <body style="color:white;">

                    <div class="d-flex" id="wrapper">

                        <!-- Sidebar -->
                            {{--@include('includes.sidebarplaying')--}}
                            <div class="bg-dark border-right scroll-able" id="sidebar-wrapper" style="overflow-y:auto; height:100px; position:fixed; z-index:1;">
                                {{--<div class="sidebar-heading">
                                    <img src="{{ URL::asset('/img/owlitam1.png') }}" alt="" width="100">
                                </div>--}}
                                <div class="list-group list-group-flush">
                                    @php
                                        $counterunlock = 0;
                                        $counterserti = 0;
                                        foreach ($unlock as $key => $value) {
                                            foreach ($serti as $query) {
                                                if($value->id == $query->videodetails_id ){
                                                    $counterserti++;
                                                }
                                            }
                                            $counterunlock++;
                                        }
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
                                        {{-- @if ($videodetails->kelas->sertifikat != null)
                                            <div class="card-header" style="background-color:#36C5BA; margin-top:80px;">
                                                <h5 class="mb-0">
                                                    <a href="{{ route('play.sertifikat',$videodetails->kelas->slug) }}" target="_blank" class="text-white">Sertifikat</a>
                                                </h5>
                                            </div>
                                        @endif --}}
                                        <div id="sertitimpa">
                                            @if ($videodetails->kelas->sertifikat != null)
                                                <div class="card-header" style="background-color:#36C5BA; margin-top:80px;">
                                                    <h5 class="mb-0">
                                                        <a href="#" onclick="belumselesaikuis(); return false" target="" class="text-white">Sertifikat</a>
                                                    </h5>
                                                </div>
                                            @endif
                                        </div>
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
                                        {{-- @foreach ($kuisakhir as $item)
                                            @foreach ($nilainya as $nin)
                                                @if ($item->id === intval($nin->id_kuis))
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
                                                @endif
                                            @endforeach
                                        @endforeach --}}
                                    @endif
                                    @foreach ($anakvideo as $query => $videos)
                                        @foreach ($video as $query)
                                            @if ($query->id == $videos->video_id)
                                                <div class="card mt-3" style="background-color:#89adac;">
                                                    <div class="card-header" id="headingOne">
                                                        <h5 class="mb-0">
                                                            <a href="{{ $videodetails->url }}/users/play_course/{{ $videos->id }}/{{ $videos->products_slug }}"
                                                                style="color:#fff;">
                                                                {{ Str::limit($videos->nama,'21')  }}
                                                                @php
                                                                    foreach ($cekserti as $item) {
                                                                        if ($item->videodetails_id == $videos->id) {
                                                                            if ($item->status == "DONE") {
                                                                                echo "<i class='fa fa-check' style='color: green;' aria-hidden='true'></i>";
                                                                            }
                                                                            if($item->alert == true){
                                                                                echo "<i class='fa fa-bookmark text-warning' aria-hidden='true'></i>";
                                                                            }
                                                                        }
                                                                    }
                                                                @endphp
                                                            </a>
                                                        </h5>
                                                    </div>
                                                </div>
                                            @endif
                                        @endforeach
                                    @endforeach
                                </div>
                            </div>

                        <!-- /#sidebar-wrapper -->
                        <!-- Page Content -->
                            <div id="page-content-wrapper">

                                {{--navbar--}}
                                <nav class="navbar navbar-row navbar-expand-lg navbar-light bg-dark border-bottom fixed-top">
                                    <a class="navbar-brand" href="{{ url('/') }}">
                                        <img src="{{ URL::asset('/Foto/owlputih.png') }}" alt="" width="100">
                                    </a>
                                    {{--<div class="sidebar-heading">--}}
                                        {{--<img src="{{ URL::asset('/img/owlitam1.png') }}" alt="" width="100">--}}
                                    {{--</div>--}}

                                    <button class="btn btn-outline-secondary btn-toggler1 border-0" id="menu-toggle">
                                        <img src="{{ asset('/Foto/toggler.png') }}" alt="navbar_icon" style="z-index:5;">
                                        {{--<span class="navbar-toggler-icon"></span>--}}
                                    </button>

                                    {{--ini toggler asli untuk yang sebelah kanan--}}
                                    {{--<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                                        <span class="navbar-toggler-icon" style="color:#ffff;"></span>
                                    </button>--}}

                                    <button class="navbar-toggler d-lg-none d-sm-none d-block d-md-none" type="button"
                                            data-toggle="collapse" data-target="#navbartoggler"
                                            aria-controls="navbarNav" aria-expanded="false"
                                            aria-label="Toggle navigation"
                                            style="border:none;">

                                            <a class="nav-link dropdown-toggle text-white" href="#">
                                                <img class="rounded-circle" src="{{ url('Foto/ic_user_2.png') }}" alt="User Avatar" style="width:40px;">
                                            </a>
                                    </button>

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

                                        {{--ini yang asli --}}
                                        {{--<div class="collapse navbar-collapse" id="navbarSupportedContent">
                                            <ul class="navbar-nav ml-auto mt-2 mt-lg-0">
                                                @auth
                                                    <div class="user-area dropdown" style="margin-right:100px;">
                                                        <a href="#" class="dropdown-toggle active text-white" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                            <img class="rounded-circle" src="{{ url('Foto/ic_user_2.png') }}" alt="User Avatar" style="width:40px;">
                                                        </a>
                                                        <div class="user-menu dropdown-menu">
                                                            @if (Auth::user()->roles == 'MENTOR')
                                                                <a href="{{ route('orang.index') }}" class="dropdown-item text-center">Profi</a>
                                                                <form action="{{url('logout')}}" method="post" class="form-inline dropdown-item">
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
                                    </nav>

                            {{--endnav --}}

                            {{--content --}}
                                <div class="container-fluid bg-dark" style="z-index:-1;">
                                    @foreach ($anakvideo as $query)
                                        @if ($query->number == 0)
                                            <div class="row" style="padding-top:100px;">
                                                <div class="col-lg-12 ml-5">
                                                    <div class="row">
                                                        <div class="col-lg-6">
                                                            <p class="mt-3" style="font-weight: bold; font-size:20px; color:#ffff;">{{ $query->nama }}</p>
                                                            <p>Materi bagian : {{ $query->video->judul }}</p>
                                                            {{--{{ $jenis }}--}}
                                                        </div>
                                                        <div class="col-lg-6">
                                                            @if ($query->kelas->link_konsul == !null)
                                                                <p class="mt-3" style="font-weight: bold; font-size:20px; color:#ffff;">Link Konsultasi/Diskusi</p>
                                                                <a href="{{ $query->kelas->link_konsul }}" style="color:#ffff; text-decoration:underline">{{ $query->kelas->link_konsul }}</a>
                                                            @else
                                                                <p class="mt-3" style="font-weight: bold; font-size:20px; color:#ffff;">Link Konsultasi/Diskusi</p>
                                                                <a href="#">Tidak Tersedia</a>
                                                            @endif
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-lg-12">
                                                            <iframe width="90%" height="450" src="https://www.youtube.com/embed/{{ $query->file }}" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                                                        </div>
                                                    </div>


                                                    <div class="row mt-5">
                                                        <div class="col-lg-6 pl-5">
                                                            {{--modul pembelajaran --}}
                                                            <h4 class="text-white">Modul Pembelajaran</h4>
                                                            <table class="table table-borderless text-white">
                                                                <tbody>
                                                                    <?php $i=1 ?>
                                                                        @forelse ($modul as $query)
                                                                            @if ($query->details->number == '0')
                                                                                <tr>
                                                                                    <td>{{ $i++ }}</td>
                                                                                    <td>
                                                                                        <a href="{{ asset('/storage/'.$query->file) }}" download="{{ $query->nama_modul }}"
                                                                                            style="color:#ffff; text-decoration:underline;">
                                                                                            {{ $query->nama_modul }}
                                                                                        </a>
                                                                                    </td>
                                                                                </tr>
                                                                            @endif
                                                                        @empty
                                                                                <tr>
                                                                                    <td>-</td>
                                                                                </tr>
                                                                        @endforelse
                                                                    <?php $i++ ?>
                                                                    {{--kodingan lama--}}
                                                                        {{--@forelse ($modul as $query)
                                                                            <tr>
                                                                                <td>{{ $loop->iteration }}</td>
                                                                                <td>
                                                                                    <a href="{{ asset('/storage/'.$query->file) }}" download="{{ $query->nama_modul }}"
                                                                                        style="color:#ffff; text-decoration:underline;">
                                                                                        {{ $query->nama_modul }}
                                                                                    </a>
                                                                                </td>
                                                                            </tr>
                                                                        @empty
                                                                            <tr>
                                                                                <td>-</td>
                                                                            </tr>
                                                                        @endforelse--}}
                                                                    {{--end kodingan lama --}}
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                        {{-- 16 Feb 21 --}}
                                                        {{-- <div class="col-lg-6">
                                                            <h4 class="text-white">Link Kuis</h4>
                                                            @if ($videodetails->number == '0')
                                                                @if ($videodetails->link_kuis == '-')
                                                                    <a href="#" style="color:#ffff;">{{ $videodetails->link_kuis }}</a>
                                                                @else
                                                                    <a href="{{ $videodetails->link_kuis }}" style="color:#ffff; text-decoration:underline;">{{ $videodetails->link_kuis }}</a>
                                                                @endif
                                                            @else
                                                                <a href="#" style="color:#ffff;">-</a>
                                                            @endif
                                                        </div> --}}
                                                        {{-- End 16 Feb 21  --}}
                                                        {{--<div class="col-lg-3">
                                                            <h4 class="text-white">Link Blog</h4>
                                                            @if ($videodetails->number == '0')
                                                                @if ($videodetails->link_blog == '-')
                                                                    <a href="#" style="color:#ffff;">{{ $videodetails->link_blog }}</a>
                                                                @else
                                                                    <a href="{{ $videodetails->link_blog }}" style="color:#ffff; text-decoration:underline;">{{ $videodetails->link_blog }}</a>
                                                                @endif
                                                            @else
                                                                <a href="#" style="color:#ffff;">-</a>
                                                            @endif
                                                        </div>--}}
                                                    </div>

                                                    {{--kodingan lama --}}
                                                        {{--<br>--}}
                                                        {{--<h4>Modul Pembelajaran</h4>
                                                        @if ($query->namamodul == null)
                                                            <p>-</p>
                                                            @else
                                                            <table class="table table-responsive-sm">
                                                                <thead>
                                                                    <tr>
                                                                        <td><a href="{{ asset('/storage/'.$query->modul) }}" download="{{ $query->namamodul }}" style="color:#ffff;text-decoration: underline;">{{ $query->namamodul }}</a></td>
                                                                        <td>
                                                                            <!-- Button trigger modal -->
                                                                            <button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#exampleModalScrollable">
                                                                                <i class="fa fa-eye"></i>
                                                                            </button>

                                                                            <!-- Modal -->
                                                                            <div class="modal fade bd-example-modal-lg" id="exampleModalScrollable" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
                                                                                <div class="modal-dialog modal-lg modal-dialog-scrollable" role="document">
                                                                                <div class="modal-content">
                                                                                    <div class="modal-header">
                                                                                    <h5 class="modal-title" id="exampleModalScrollableTitle">{{ $query->namamodul }}</h5>
                                                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                                        <span aria-hidden="true">&times;</span>
                                                                                    </button>
                                                                                    </div>
                                                                                    <div class="modal-body">
                                                                                        <iframe src="{{ asset('/storage/'.$query->modul) }}" style="border:none; width:100%; height:700px;"></iframe>
                                                                                    </div>
                                                                                    <div class="modal-footer">
                                                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                                                        <a href="{{ asset('/storage/'.$query->modul) }}" class="btn btn-primary" download="{{ $query->namamodul }}">Download</a>
                                                                                    </div>
                                                                                </div>
                                                                                </div>
                                                                            </div>
                                                                        </td>
                                                                    </tr>
                                                                </thead>
                                                            </table>
                                                        @endif--}}
                                                    {{--end kodingan lama --}}
                                                </div>
                                            </div>
                                        @endif
                                    @endforeach
                                </div>
                                {{--end content --}}
                        </div>
                        <!-- /#page-content-wrapper -->

                    </div>
                    <!-- /#wrapper -->

                    <footer class="py-4 bg-dark" style="margin-top:-20px;">
                        <div class="container">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="d-flex justify-content-between ">
                                        <div class="text-muted">Copyright &copy; Guruku 2020</div>
                                        <div>
                                            <a href="#">Privacy Policy</a>
                                            &middot;
                                            <a href="#">Terms &amp; Conditions</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </footer>

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

                    <!-- Menu Toggle Script -->
                    <script>
                        $("#menu-toggle").click(function(e) {
                            e.preventDefault();
                            $("#wrapper").toggleClass("toggled");
                        });
                    </script>
                </body>
                </html>

            @else
                <!doctype html>
                <html lang="en">
                <head>
                    <!-- Required meta tags -->
                    <meta charset="utf-8">
                    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

                    <!-- Bootstrap CSS -->
                    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

                    <title>Access Denied</title>
                    <style>
                        .btn-kembali{
                            width:160px;
                        }
                    </style>
                </head>
                <body>
                    <div class="container">
                        <div class="row">
                            {{--<center>--}}
                                <div class="col-lg-12 text-center">
                                    <img src="{{ URL::asset('/Foto/pentingbaru-01.png') }}" class="mt-4" width="360px" height="360px" class="img-fluid" alt="">
                                    <h2 style="color:#1d1d1d;">Oops!</h2>
                                    <p style="color:#7e7e7e; font-size:18px;">Sepertinya Anda tidak memiliki hak akses <br> untuk halaman ini</p>
                                    <button class="btn btn-info btn-kembali"
                                        onclick="event.preventDefault(); location.href='{{route('myclass.index')}}';">Kembali</button>
                                </div>
                            {{--</center>--}}
                        </div>
                    </div>

                    <!-- Optional JavaScript -->
                    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
                    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
                    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
                    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
                </body>
                </html>

            @endif

        @elseif($status->transaction_status == 'PENDING')
            <!doctype html>
            <html lang="en">
            <head>
                <!-- Required meta tags -->
                <meta charset="utf-8">
                <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

                <!-- Bootstrap CSS -->
                <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

                <title>Access Denied</title>
                <style>
                    .btn-kembali{
                        width:160px;
                    }
                </style>
            </head>
            <body>
                <div class="container">
                    <div class="row">
                        {{--<center>--}}
                            <div class="col-lg-12 text-center">
                                <img src="{{ URL::asset('/Foto/pentingbaru-01.png') }}" class="mt-4" width="360px" height="360px" class="img-fluid" alt="">
                                <h2 style="color:#1d1d1d;">Oops!</h2>
                                <p style="color:#7e7e7e; font-size:18px;">Sepertinya Anda tidak memiliki hak akses <br> untuk halaman ini</p>
                                <button class="btn btn-info btn-kembali"
                                    onclick="event.preventDefault(); location.href='{{route('myclass.index')}}';">Kembali</button>
                            </div>
                        {{--</center>--}}
                    </div>
                </div>

                <!-- Optional JavaScript -->
                <!-- jQuery first, then Popper.js, then Bootstrap JS -->
                <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
                <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
                <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
            </body>
            </html>
        @else
            <!doctype html>
            <html lang="en">
            <head>
                <!-- Required meta tags -->
                <meta charset="utf-8">
                <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

                <!-- Bootstrap CSS -->
                <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

                <title>Access Denied</title>
                <style>
                    .btn-kembali{
                        width:160px;
                    }
                </style>
            </head>
            <body>
                <div class="container">
                    <div class="row">
                        {{--<center>--}}
                            <div class="col-lg-12 text-center">
                                <img src="{{ URL::asset('/Foto/pentingbaru-01.png') }}" class="mt-4" width="360px" height="360px" class="img-fluid" alt="">
                                <h2 style="color:#1d1d1d;">Oops!</h2>
                                <p style="color:#7e7e7e; font-size:18px;">Sepertinya Anda tidak memiliki hak akses <br> untuk halaman ini</p>
                                <button class="btn btn-info btn-kembali"
                                    onclick="event.preventDefault(); location.href='{{route('myclass.index')}}';">Kembali</button>
                            </div>
                        {{--</center>--}}
                    </div>
                </div>

                <!-- Optional JavaScript -->
                <!-- jQuery first, then Popper.js, then Bootstrap JS -->
                <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
                <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
                <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
            </body>
            </html>
        @endif



    @else

        <!doctype html>
        <html lang="en">
        <head>
            <!-- Required meta tags -->
            <meta charset="utf-8">
            <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

            <!-- Bootstrap CSS -->
            <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

            <title>Access Denied</title>
            <style>
                .btn-kembali{
                    width:160px;
                }
            </style>
        </head>
        <body>
            <div class="container">
                <div class="row">
                    {{--<center>--}}
                        <div class="col-lg-12 text-center">
                            <img src="{{ URL::asset('/Foto/pentingbaru-01.png') }}" class="mt-4" width="360px" height="360px" class="img-fluid" alt="">
                            <h2 style="color:#1d1d1d;">Oops!</h2>
                            <p style="color:#7e7e7e; font-size:18px;">Sepertinya Anda tidak memiliki hak akses <br> untuk halaman ini</p>
                            <button class="btn btn-info btn-kembali"
                                onclick="event.preventDefault(); location.href='{{route('myclass.index')}}';">Kembali</button>
                        </div>
                    {{--</center>--}}
                </div>
            </div>

            <!-- Optional JavaScript -->
            <!-- jQuery first, then Popper.js, then Bootstrap JS -->
            <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
            <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
            <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
        </body>
        </html>


    @endif
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
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
