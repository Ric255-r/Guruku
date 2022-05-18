<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
    <link rel="shortcut icon" sizes="57x57" href="{{ URL::asset('/Foto/favicon.png') }}">

        <title>Guruku - Mentor Dashboard</title>
        @stack('before-style')
            @include('includes.stylementor')
        @stack('after-style')
    </head>
    <style>
        input::-webkit-outer-spin-button,
        input::-webkit-inner-spin-button {
        -webkit-appearance: none;
            margin: 0;
        }

    /* Firefox */
    input[type=number] {
        -moz-appearance: textfield;
    }
    </style>
    <body class="sb-nav-fixed">
        <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
            <a class="navbar-brand" href="index.html">
                <img src="{{ URL::asset('/Foto/owlputih.png') }}" alt=""  height="40px">
            </a>
            <button class="btn btn-link btn-sm order-1 order-lg-0" id="sidebarToggle" href="#"><i class="fas fa-bars"></i></button>
            <!-- Navbar Search-->
            <form class="d-none d-md-inline-block form-inline ml-auto mr-0 mr-md-3 my-2 my-md-0">
                <div class="input-group" hidden>
                    <input class="form-control" type="text" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2" />
                    <div class="input-group-append">
                        <button class="btn btn-primary" type="button"><i class="fas fa-search"></i></button>
                    </div>
                </div>
            </form>
            <!-- Navbar-->
            <ul class="navbar-nav ml-auto ml-md-0">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="userDropdown" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
                        <a class="dropdown-item" href="{{ route('amentor.profile.index') }}">Settings</a>
                        {{--<a class="dropdown-item" href="#">Activity Log</a>--}}
                        <div class="dropdown-divider"></div>
                        <form action="{{ url('logout') }}" method="POST">
                            @csrf
                            <button type="submit" class="dropdown-item">Logout</button>
                        </form>
                    </div>
                </li>
            </ul>
        </nav>

        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                {{--<nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        <div class="nav">
                            <div class="sb-sidenav-menu-heading">Core</div>
                            <a class="nav-link" href="{{ route('amentor.index') }}">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Dashboard
                            </a>

                            <div class="sb-sidenav-menu-heading">Kelas</div>
                            <a class="nav-link" href="{{ route('amentor.kelas.index') }}">
                                <div class="sb-nav-link-icon"><i class="fas fa-chart-area"></i></div>
                                Kelas Anda
                            </a>

                            <div class="sb-sidenav-menu-heading">Video</div>
                            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
                                <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                                Video Kelas
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
                                    <a class="nav-link" href="{{ route('amentor.video.index') }}">Index</a>
                                    <a class="nav-link" href="{{ route('amentor.video.create') }}">Create</a>
                                </nav>
                            </div>
                            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages" aria-expanded="false" aria-controls="collapsePages">
                                <div class="sb-nav-link-icon"><i class="fas fa-book-open"></i></div>
                                Video Details
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="collapsePages" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
                                    <a class="nav-link" href="{{ route('amentor.videodetails.index') }}">Index</a>
                                    <a class="nav-link" href="{{ route('amentor.videodetails.create') }}">Create</a>
                                </nav>
                            </div>
                            <div class="sb-sidenav-menu-heading">Test</div>
                            <a class="nav-link" href="{{ route('amentor.soal.index',Auth::user()->kode_mentor) }}">
                                <div class="sb-nav-link-icon"><i class="fas fa-chart-area"></i></div>
                                Soal
                            </a>
                            <div class="sb-sidenav-menu-heading">Profile</div>
                            <a class="nav-link" href="{{ route('amentor.profile.index') }}">
                                <div class="sb-nav-link-icon"><i class="fas fa-chart-area"></i></div>
                                Profile Setting
                            </a>
                        </div>
                    </div>
                    <div class="sb-sidenav-footer">
                        <div class="small">Logged in as:</div>
                        {{ Auth::user()->roles }} -> {{ Auth::user()->name }}
                    </div>
                </nav>--}}
                <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        <div class="nav">
                            <div class="sb-sidenav-menu-heading">Core</div>
                            <a class="nav-link" href="{{ route('amentor.index') }}">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Dashboard
                            </a>
                            <div class="sb-sidenav-menu-heading">Kelas</div>
                            <a class="nav-link" href="{{ route('amentor.kelas.index') }}">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Kelas Anda
                            </a>
                            {{--sertifikat --}}
                            <div class="sb-sidenav-menu-heading">Sertifikat</div>
                            <a class="nav-link" href="{{ route('amentor.sertifikat') }}">
                                <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                                Request Sertifikat
                                @if ($kon > 0)
                                    <sup class="badge badge-info">{{ $kon }}</sup>
                                @endif
                            </a>

                            {{--<div class="sb-sidenav-menu-heading">Sertifikat</div>
                            <a class="nav-link" href="{{ route('amentor.sertifikat') }}">
                                <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                                Setting
                            </a>--}}

                            <div class="sb-sidenav-menu-heading">Materi</div>
                            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
                                <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                                Materi
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
                                    <a class="nav-link" href="{{ route('amentor.video.index') }}">Index</a>
                                    <a class="nav-link" href="{{ route('amentor.video.create') }}">Create</a>
                                </nav>
                            </div>

                            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseLayouts2" aria-expanded="false" aria-controls="collapseLayouts2">
                                <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                                    Video
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="collapseLayouts2" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
                                    <a class="nav-link" href="{{ route('amentor.videodetails.index') }}">Index</a>
                                    <a class="nav-link" href="{{ route('amentor.videodetails.create') }}">Create</a>
                                </nav>
                            </div>

                            <div class="sb-sidenav-menu-heading">Modul</div>
                            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseLayouts6" aria-expanded="false" aria-controls="collapseLayouts6">
                                <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                                    Modul
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="collapseLayouts6" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
                                    <a class="nav-link" href="{{ route('amentor.modul.index') }}">Index</a>
                                    <a class="nav-link" href="{{ route('amentor.videodetails.index') }}">Create</a>
                                </nav>
                            </div>

                            <div class="sb-sidenav-menu-heading">Blog</div>
                            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseLayouts3" aria-expanded="false" aria-controls="collapseLayouts3">
                                <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                                    Blog
                                    @if ($totalkomen > 0 || $totalreply > 0)
                                        <sup class="badge badge-info">{{ $totalkomen + $totalreply }}</sup>
                                    @endif
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="collapseLayouts3" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
                                    <a class="nav-link" href="{{ route('amentor.blog.index') }}">Index</a>
                                    <a class="nav-link" href="{{ route('amentor.blog.create') }}">Create</a>
                                    <a class="nav-link" href="{{ route('amentor.blog.notif') }}">
                                        Notification
                                        @if ($totalkomen > 0 || $totalreply > 0)
                                            <sup class="badge badge-info">{{ $totalkomen + $totalreply }}</sup>
                                        @endif
                                    </a>
                                </nav>
                            </div>


                            <div class="sb-sidenav-menu-heading">Kuis</div>
                            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseLayouts4" aria-expanded="false" aria-controls="collapseLayouts4">
                                <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                                    Kuis
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="collapseLayouts4" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
                                    <a class="nav-link" href="{{ route('amentor.kuis.listKuis')}}">Index</a>
                                    <a class="nav-link" href="{{ route('amentor.kuis.index')}}">Create</a>
                                    <a class="nav-link" href="{{ route('amentor.kuis.history') }}">Hasil Kuis</a>
                                </nav>
                            </div>


                            <div class="sb-sidenav-menu-heading">Soal</div>
                            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseLayouts5" aria-expanded="false" aria-controls="collapseLayouts5">
                                <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                                    Soal
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="collapseLayouts5" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
                                    <a class="nav-link" href="{{ route('amentor.soal.listSoal',Auth::user()->kode_mentor) }}">Index</a>
                                    <a class="nav-link" href="{{ route('amentor.soal.index') }}">Create</a>
                                    {{--<a class="nav-link" href="{{ route('amentor.kuis.history') }}">Hasil Kuis</a>--}}
                                </nav>
                            </div>





                            {{--<div class="sb-sidenav-menu-heading">Kuis</div>
                            <a class="nav-link" href="{{ route('amentor.kuis.index')}}">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Isi Kuis Anda
                            </a>
                            <a class="nav-link" href="{{ route('amentor.kuis.listKuis')}}">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                List Kuis Anda
                            </a>
                            <a href="{{ route('amentor.kuis.history') }}" class="nav-link">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Nilai Kuis Siswa
                            </a>--}}

                            {{--<div class="sb-sidenav-menu-heading">Soal</div>
                            <a class="nav-link" href="{{ route('amentor.soal.index') }}">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Isi Soal Anda
                            </a>
                            <a class="nav-link" href="{{ route('amentor.soal.listSoal',Auth::user()->kode_mentor) }}">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                List Soal Anda
                            </a>--}}


                            <div class="sb-sidenav-menu-heading">Addons</div>
                            <a class="nav-link" href="{{ route('amentor.profile.index') }}">
                                <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                                Setting
                            </a>

                        </div>
                    </div>
                    <div class="sb-sidenav-footer">
                        <div class="small">Logged in as:</div>
                        <span class="text-uppercase">{{ Auth::user()->name }}</span>
                    </div>
                </nav>
            </div>

            @yield('content')
        </div>

        {{--<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="{{ URL::asset('/tempadmin/js/scripts.js') }}"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
        <script src="{{ URL::asset('/tempadmin/assets/demo/chart-area-demo.js') }}"></script>
        <script src="{{ URL::asset('/tempadmin/assets/demo/chart-bar-demo.js') }}"></script>
        <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js" crossorigin="anonymous"></script>
        <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js" crossorigin="anonymous"></script>
        <script src="{{ URL::asset('/tempadmin/assets/demo/datatables-demo.js') }}"></script>--}}
        @stack('before-script')
            @include('includes.scriptmentor')
        @stack('after-script')
    </body>
</html>
