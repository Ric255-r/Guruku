@extends('layout.main')

@section('container')
<link rel="stylesheet" href="{{URL::asset('css/dtlkelasgrat.css')}}">
{{-- <link href="{{ URL::asset('css/font.css') }}" rel="stylesheet"> --}}
{{-- <link rel="stylesheet" href="{{ URL::asset('/css/font2.css') }}"> --}}
{{-- <link href="//netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.css" rel="stylesheet"> --}}
<div class="container-fluid banner">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="pel mt-3 ml-5">{{ $kelaspremium->kelas }}</h1>
        </div>
    </div>
</div>

    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                @foreach ($items as $query)
                    @if ($query->is_default == '1')
                        <div class="card-body media kotak-video">
                            <video class="vid" autoplay controls>
                                <source src="{{ url($query->video) }}"  type="video/mp4">
                                Your browser does not support the video tag.
                            </video>
                        </div>
                    @endif
                @endforeach
                <h3>Tentang Kelas</h3>
                <p>{{$kelaspremium->deskripsi}}</p>
            </div>
            <div class="col-lg-4">
                <div class="card card-kelas">
                    <div class="kelas-content">
                        <div class="card-body text-center">
                        <p class="card-title-pre">Premium</p>
                        @guest
                            <button class="btn btn-primary ikutikelas mx-auto"
                            onclick="event.preventDefault(); location.href='{{route('login')}}';">Ikuti Kelas</button>
                        @endguest
                        @auth
                            <button class="btn btn-primary ikutikelas mx-auto"
                            onclick="event.preventDefault(); location.href='{{route('checkout.show',$kelaspremium->id)}}'">Ikuti Kelas</button>
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
        <div class="row">
            <div class="col-lg-8">
                <h3>Gabung dan Pelajari Materi Berikut</h3>
                <div class="card">
                    <div class="card-body">
                        Basic card
                        <a type="button" class="btn btn-info" style="float:right; color:white;" data-toggle="collapse"
                        data-target="#demo">Details</a>
                    </div>
                    <div id="demo" class="collapse show">
                        <hr>
                        {{-- @foreach ($items as $query)
                            <div class="card-body media">
                                <p>{{ $loop->iteration }}.  </p>
                                <video style="width:300px; height:100px" controls>
                                    <source src="{{ url($query->video) }}"  type="video/mp4">
                                    Your browser does not support the video tag.
                                </video>
                                <div class="media-body">
                                    <p class="belajar"> Pembelajaran 1 <br> <span class="waktu">6 menit</span> </p>
                                </div>
                            </div>
                        @endforeach --}}
                        @foreach ($items as $query)
                            <div class="card-body media">
                                {{-- <video style="width:300px; height:100px" controls>
                                    <source src="{{ url($query->video) }}"  type="video/mp4">
                                    Your browser does not support the video tag.
                                </video> --}}
                                <img src="{{ URL::asset('/img/video.png') }}" class="align-self-start mr-3 video-belajar">
                                <div class="media-body">
                                    <p class="belajar"> {{ $query->nama_video }} <br> <span class="waktu" id="durasi"></span> </p>
                                </div>
                            </div>
                        @endforeach
                        {{-- <div class="card-body media">
                            <img src="{{ URL::asset('/img/video.png') }}" class="align-self-start mr-3 video-belajar">
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
                        </div> --}}
                    </div>
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
@endsection
