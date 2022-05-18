    {{--navbar --}}
    <header class="banner" style="background-color:#D5EEED;">
        <div class="container" data-aos="fade-down" data-aos-duration="500" data-aos-delay="100">
            <nav class="navbar row navbar-expand-lg navbar-light">
                <a class="navbar-brand" href="#">
                    <img src="{{ URL::asset('/img/owlitam1.png') }}" width="120" height="50" alt="logo">
                </a>
                <button class="navbar-toggler" type="button"
                    data-toggle="collapse" data-target="#navbarNav"
                    aria-controls="navbarNav" aria-expanded="false"
                    aria-label="Toggle navigation"
                    style="border:none;">
                  {{--<span class="navbar-toggler-icon"></span>--}}
                  <img src="{{ asset('/Foto/toggler_black.png') }}" alt="">
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                  <ul class="navbar-nav ml-auto mr-4">
                    <li class="nav-item">
                        <a class="nav-link" style="font-weight: 500; color:#1d1d1d" href="{{ url('/') }}">Beranda</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" style="font-weight: 500; color:#1d1d1d" href="{{ route('kelas.index') }}">Kelas</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" style="font-weight: 500; color:#1d1d1d" href="{{ route('home.mentor.index') }}">Guru</a>
                    </li>
                    {{--<li class="nav-item">
                        <a href="{{ route('kuis.index') }}" class="nav-link" style="font-weight: 500; color:#1d1d1d" href="#">Kuis</a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('blog.index') }}" class="nav-link" style="font-weight: 500; color:#1d1d1d" href="#">Blog</a>
                    </li>--}}
                    <li class="nav-item">
                      <a class="nav-link" style="font-weight: 500; color:#1d1d1d" href="{{ route('contact-us.index') }}">Contact Us</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown"
                            role="button" data-toggle="dropdown" aria-haspopup="true"
                                aria-expanded="false" style="color:#1d1d1d; font-weight:500;">
                            Lainnya
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{ route('blog.index') }}">Blog</a>
                            <a class="dropdown-item" href="{{ route('kuis.index') }}">Kuis</a>
                        </div>
                    </li>
                    {{--<li class="nav-item ml-3" style="border-left:2px solid #9e9b9b;">

                    </li>--}}
                  </ul>

                    {{-- desktop button --}}
                    @guest
                        <form action="" class="form-inline my-2 my-lg-0 d-none d-md-block">
                            <button type="button" onclick="event.preventDefault(); location.href='{{url('register')}}';" class="btn btn-daftar">
                                Register
                            </button>
                        </form>
                    @endguest

                    @guest
                    <form action="" class="form-inline my-2 my-lg-0 d-none d-md-block">
                        <button type="button" onclick="event.preventDefault(); location.href='{{url('login')}}';" class="btn btn-masuk mx-lg-2">
                            Login
                        </button>
                    </form>
                    @endguest

                    @auth
                        <li class="nav-item dropdown" style="list-style:none;">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown2"
                                role="button" data-toggle="dropdown" aria-haspopup="true"
                                    aria-expanded="false" style="color:#1d1d1d; font-weight:500;">
                                <img class="" src="{{ url('/Foto/ic_user.png') }}" alt="User Avatar">
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown2">
                                @if (Auth::user()->roles == 'MENTOR')
                                    @if (Auth::user()->status == 'SUCCESS')
                                        <a class="dropdown-item" href="{{ route('amentor.index') }}">Halaman Mentor</a>
                                    @else
                                        <a class="dropdown-item" onclick="belum(); return false">Halaman Mentor</a>
                                    @endif
                                    <form action="{{url('logout')}}" method="post" class="dropdown-item">
                                        @csrf
                                        <button class="btn btn-danger btn-block">
                                            Logout
                                        </button>
                                    </form>
                                @elseif(Auth::user()->roles == 'ADMIN')
                                    <a class="dropdown-item" href="{{ route('dashboard') }}">Halaman Admin</a>
                                    <form action="{{url('logout')}}" method="post" class="dropdown-item">
                                        @csrf
                                        <button class="btn btn-danger btn-block">
                                            Logout
                                        </button>
                                    </form>
                                @else
                                    <a class="dropdown-item" href="{{ route('orang.index') }}">Profile Saya</a>
                                    <form action="{{url('logout')}}" method="post" class="dropdown-item">
                                        @csrf
                                        <button class="btn btn-danger btn-block">
                                            Logout
                                        </button>
                                    </form>
                                @endif
                            </div>
                        </li>
                        {{--<div class="user-area dropdown mr-3">
                            <a href="#" class="dropdown-toggle active" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <img class="" src="{{ url('/Foto/ic_user.png') }}" alt="User Avatar">
                            </a>
                            <div class="user-menu dropdown-menu">
                                @if (Auth::user()->roles == 'ADMIN')
                                    <a href="{{ route('dashboard') }}" class="btn btn-primary btn-sm btn-block">Halaman Admin</a>
                                    <form action="{{url('logout')}}" method="post" class="form-inline mt-2">
                                        @csrf
                                        <button type="submit" class="btn btn-danger btn-sm btn-block">
                                            Logout
                                        </button>
                                    </form>
                                @elseif(Auth::user()->roles == 'USERS')
                                    <a href="{{ route('orang.index') }}" class="btn btn-primary btn-sm btn-block">Profile</a>
                                    <form action="{{url('logout')}}" method="post" class="form-inline mt-2">
                                        @csrf
                                        <button type="submit" class="btn btn-danger btn-sm btn-block">
                                            Logout
                                        </button>
                                    </form>
                                @else
                                    <a href="{{ route('amentor.index') }}" class="btn btn-primary btn-sm btn-block">Halaman Mentor</a>
                                    <form action="{{url('logout')}}" method="post" class="form-inline mt-2">
                                        @csrf
                                        <button type="submit" class="btn btn-danger btn-sm btn-block">
                                            Logout
                                        </button>
                                    </form>
                                @endif
                            </div>
                        </div>--}}
                    @endauth
                </div>
            </nav>
        </div>
    </header>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script>
    function belum(){
        swal({
            title: "Ups",
            text: "Bersabar, Akun Ini Sedang Menunggu Konfirmasi Admin",
            icon: "warning",
        });
    }
    </script>
      {{--end navbar --}}
