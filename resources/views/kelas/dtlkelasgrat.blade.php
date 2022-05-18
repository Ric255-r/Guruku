    @extends('layout.main')

    @section('container')
        <link rel="stylesheet" href="{{URL::asset('css/dtlkelasgrat.css')}}">

        <div class="container-fluid banner">
            <div class="row">
                <div class="col-lg-8">
                    <h1 class="pel mt-3 ml-5">{{ $kelasgrat->pelajaran }}</h1>
                </div>
                <div class="col-lg-4">
                    <div class="card card-kelas mt-5">
                        <div class="kelas-content">
                            <div class="card-body text-center">
                            <p class="card-title">Gratis</p>
                            @guest
                                <button class="btn btn-primary ikutikelas mx-auto"
                                onclick="event.preventDefault(); location.href='{{url('login')}}';">Ikuti Kelas</button>
                            @endguest
                            @auth
                            @if(count($errors) > 0)
                                <div class="alert alert-danger">
                            @foreach ($errors->all() as $error)
                                {{ $error }} <br/>
                            @endforeach
                                </div>
                            @endif
                            <form action="{{ route('join.store') }}" method="POST">
                                @csrf
                                <div class="form-group" hidden>
                                    <label for="name">Nama</label>
                                    <input type="text" name="name" id="name" value="{{ Auth::user()->name }}">
                                </div>
                                <div class="form-group" hidden>
                                    <label for="email">Email</label>
                                    <input type="email" name="email" id="email" value="{{ Auth::user()->email }}">
                                </div>
                                <div class="form-group" hidden>
                                    <label for="user_id">user id</label>
                                    <input type="text" name="user_id" id="user_id" value="{{ Auth::user()->id }}">
                                </div>
                                <div class="form-group" hidden>
                                    <label for="join_details">Join Details</label>
                                    <input type="text" name="join_details" id="join_details" value="{{ $kelasgrat->id }}">
                                </div>
                                <button class="btn btn-primary ikutikelas"
                                type="submit">Ikuti Kelas</button>
                            </form>
                            {{-- <a href="/kelasgratis/{{ $query->id }}" class="btn btn-primary" style="width:100px;">Detail</a> --}}
                            @endauth
                                <p class="card-text mt-3">Tambahkan ke Favorit</p>
                                <ul class="list-group">
                                    <li class="list-group-item">Fasilitas</li>
                                    <li class="list-group-item">Akses kelas tidak terbatas</li>
                                    <li class="list-group-item">Tanya Jawab dengan pengajar</li>
                                    <li class="list-group-item">Sertifikat</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <nav>
                        <div class="nav nav-tabs" id="nav-tab" role="tablist">
                            <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">Tentang</a>
                            <a class="nav-item nav-link" id="nav-diskusi-tab" data-toggle="tab" href="#nav-diskusi" role="tab" aria-controls="nav-diskusi" aria-selected="false">Diskusi</a>
                        </div>
                    </nav>
                        <div class="tab-content" id="nav-tabContent">
                            <div class="tab-pane fade show active ml-3 mt-3" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                                <h2>Tentang</h2>
                                <p>{{$kelasgrat->deskripsi}}</p>
                                <div class="container-fluid">
                                    <div class="row">
                                        <div class="col-lg-8">
                                            <div class="card">
                                                <div class="card-body">
                                                    Basic card
                                                    <a type="button" class="text-right" data-toggle="collapse"
                                                    data-target="#demo">Perkecil</a>
                                                </div>
                                                <div id="demo" class="collapse show">
                                                    <hr>
                                                    <div class="card-body media">
                                                        <img src="{{URL::asset('/img/video.png')}}" class="align-self-start mr-3 video-belajar">
                                                        <div class="media-body">
                                                            <p class="belajar">Pembelajaran 1 <br> <span class="waktu">6 menit</span> </p>
                                                        </div>
                                                    </div>
                                                    <div class="card-body media">
                                                        <img src="{{URL::asset('/img/video.png')}}" class="align-self-start mr-3 video-belajar">
                                                        <div class="media-body">
                                                            <p class="belajar">Pembelajaran 2 <br> <span class="waktu">6 menit</span> </p>
                                                        </div>
                                                    </div>
                                                    <div class="card-body media">
                                                        <img src="{{URL::asset('/img/video.png')}}" class="align-self-start mr-3 video-belajar">
                                                        <div class="media-body">
                                                            <p class="belajar">Pembelajaran 3 <br> <span class="waktu">6 menit</span> </p>
                                                        </div>
                                                    </div>
                                                    <div class="card-body media">
                                                        <img src="{{URL::asset('/img/video.png')}}" class="align-self-start mr-3 video-belajar">
                                                        <div class="media-body">
                                                            <p class="belajar">Pembelajaran 4 <br> <span class="waktu">6 menit</span> </p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <div class="tab-pane fade" id="nav-diskusi" role="tabpanel" aria-labelledby="nav-diskusi-tab">...</div>
                    </div>
                </div>
            </div>
        </div>


        <div class="jumbotron-fluid fot">
            <div class="container">
                <div class="row">
                    <div class="col-lg-2 col-12">
                        <ul class="lis">
                            <li class="in">Informasi Perusahaan</li>
                            <li class="ten">Tentang Kami</li>
                            <li class="ten">Karir</li>
                            <li class="ten">Kontak</li>
                            <li class="ten">Admin</li>
                        </ul>
                    </div>
                    <div class="col-lg-2 col-12">
                        <ul class="lis">
                            <li class="in">Pelajari Lebih Lanjut</li>
                            <li class="ten">Fitur</li>
                            <li class="ten">Kisah Sukses</li>
                            <li class="ten">Cara Transaksi</li>
                            <li class="ten">Menjadi Pengajar</li>
                            <li class="ten">Aplikasi Ponsel</li>
                        </ul>
                    </div>
                    <div class="col-lg-2 col-12">
                        <ul class="lis">
                            <li class="in">Layanan Lainnya</li>
                            <li class="ten">Instant E-learning</li>
                        </ul>
                    </div>
                    <div class="col-lg-2 col-12">
                        <ul class="lis">
                            <li class="in">Tentang Kami</li>
                            <li class="ten">Facebook</li>
                            <li class="ten">Instagram</li>
                            <li class="ten">Twitter</li>
                        </ul>
                    </div>
                    <div class="col-lg-2 col-12">
                        <ul class="lis">
                            <li class="in">Bantuan</li>
                            <li class="ten">Hubungi Kami</li>
                        </ul>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12 col-12">
                        <p class="ten">Syarat dan Ketentuan . Kebijakkan Privasi</p>
                    </div>
                </div>
            </div>
        </div>
        {{-- <div class="container">
            <div class="row">
                @foreach ($kelasgrat as $query )
                <div class="col-sm-6 col-12 col-md-6 col-lg-4 mt-3">
                    <div class="card card-kelas">
                        <div class="kelas-content">
                            <img src="{{ URL::asset('/adminkelas/'.$query->file) }}" class="card-img-top" height="100px" style="background-size:cover;" alt="pic">
                            <div class="card-body">
                            <span class="card-title">{{$query->pelajaran}}</span>
                            <span class="grat">Gratis</span>
                                <p class="card-text">{{$query->deskripsi}}</p>
                                <a href="/kelasgratis/{{ $query->id }}" class="btn btn-primary" style="width:100px;">Detail</a>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div> --}}
    @endsection
