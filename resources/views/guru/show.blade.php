@extends('layout.main')


@section('container')
<link rel="stylesheet" href="{{URL::asset('css/show.css')}}">
    <div class="container-fluid gugu">
        <div class="row">
            <div class="col-xl-8">
                <p class="ket">{{$gambaradminguru->keterangan}}</p>
                <p class="mentor">{{$gambaradminguru->namamentor}}</p>
            </div>
            <div class="col-lg-4">
                <div class="card card-kelas mt-5">
                    <div class="kelas-content">
                        <div class="card-body text-center">
                        <p class="card-title">Gratis</p>
                        @guest
                            <button class="btn btn-primary ikutikelas mx-auto"
                            onclick="event.preventDefault(); location.href='{{url('login')}}';">Pesan Bimble</button>
                        @endguest
                        @auth
                        <form action="/admin/adminguru/proses" method="POST" enctype="multipart/form-data">
                            @csrf
                            <button class="btn btn-primary ikutikelas mx-auto"
                            onclick="event.preventDefault(); location.href='/users/{{ $gambaradminguru->id }}'" type="submit">Pesan Bimble</button>
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
            <div class="col-xl-12 ten">
                <nav>
                    <div class="nav nav-tabs" id="nav-tab" role="tablist">
                        <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#tentang" role="tab" aria-controls="nav-home" aria-selected="true">Tentang</a>
                        <a class="nav-item nav-link" id="nav-diskusi-tab" data-toggle="tab" href="#diskusi" role="tab" aria-controls="nav-diskusi" aria-selected="false">Diskusi</a>
                    </div>
                </nav>
            </div>
            <!-- Tab panes -->
            <div class="row">
                <div class="col-xl-12">
                <div class="tab-content">
                    <div id="tentang" class="container tab-pane active"><br>
                        <div class="col-xl-12">
                            <div class="row">
                                <div class="d-flex flex-row mb-3">
                                    <div class="p-2 bd-highlight">
                                        <div class="col-xl-12">
                                            <img src="{{URL::asset('img/imgpeo.png')}}" alt="imgpeo" class="peo">
                                            <p class="ang ml-3">6</p>
                                            <p class="ang2 ml-1">Murid</p>
                                        </div>
                                    </div>
                                    <div class="p-2 bd-highlight">
                                        <div class="col-xl-12">
                                            <img src="{{URL::asset('img/imgbin.png')}}" alt="imgpeo" class="peo">
                                            <p class="ang ml-3">4.7</p>
                                            <p class="ang2 ml-1">Rating</p>
                                        </div>
                                    </div>
                                    <div class="p-2 bd-highlight">
                                        <div class="col-xl-12">
                                            <img src="{{URL::asset('img/imgjad.png')}}" alt="imgpeo" class="peo">
                                            <p class="ang">{{$gambaradminguru->hari}}</p>
                                            <p class="ang2 ml-1">Jadwal</p>
                                        </div>
                                    </div>
                                    <div class="p-2 bd-highlight">
                                        <div class="col-xl-12">
                                            <img src="{{URL::asset('img/imgjam.png')}}" alt="imgpeo" class="peo">
                                            <p class="ang">{{$gambaradminguru->jam}}</p>
                                            <p class="ang2 ml-1">Jam</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-xl-12">
                                    <p class="desk">Deskripsi {{$gambaradminguru->keterangan}}</p>
                                    <p style="color:#9E9E9E;">{{$gambaradminguru->deskripsi}}</p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xl-12">
                                    <p class="desk">Detail Pengajar</p>
                                    <div class="media nana">
                                        <img src="{{URL::asset('/img/peo2.png')}}" class="align-self-start mr-3" style="width:60px">
                                        <div class="media-body">
                                            <table>
                                                <tr class="rak">
                                                    <td class="nam">Nama</td>
                                                    <td class="tik ml-2">:</td>
                                                    <td class="des">Wilsen</td>
                                                </tr>
                                                <tr class=rak>
                                                    <td class="nam">Umur</td>
                                                    <td class="tik ml-2">:</td>
                                                    <td class="des">25 Tahun</td>
                                                </tr>
                                                <tr class="rak">
                                                    <td class="nam">Lulusan</td>
                                                    <td class="tik">:</td>
                                                    <td class="des">SMk Immanuel, Universitas Binus</td>
                                                </tr>
                                                <tr class="rak">
                                                    <td class="nam">Alamat</td>
                                                    <td class="tik">:</td>
                                                    <td class="des">Jl. GajahMada No.12</td>
                                                </tr>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div id="diskusi" class="container tab-pane fade"><br>
                    <h3>Menu 1</h3>
                    <p>Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
                    </div>
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
                        <li class="tenjar">Tentang Kami</li>
                        <li class="tenjar">Karir</li>
                        <li class="tenjar">Kontak</li>
                        <li class="tenjar">Admin</li>
                    </ul>
                </div>
                <div class="col-lg-2 col-12">
                    <ul class="lis">
                        <li class="in">Pelajari Lebih Lanjut</li>
                        <li class="tenjar">Fitur</li>
                        <li class="tenjar">Kisah Sukses</li>
                        <li class="tenjar">Cara Transaksi</li>
                        <li class="tenjar">Menjadi Pengajar</li>
                        <li class="tenjar">Aplikasi Ponsel</li>
                    </ul>
                </div>
                <div class="col-lg-2 col-12">
                    <ul class="lis">
                        <li class="in">Layanan Lainnya</li>
                        <li class="tenjar">Instant E-learning</li>
                    </ul>
                </div>
                <div class="col-lg-2 col-12">
                    <ul class="lis">
                        <li class="in">Tentang Kami</li>
                        <li class="tenjar">Facebook</li>
                        <li class="tenjar">Instagram</li>
                        <li class="tenjar">Twitter</li>
                    </ul>
                </div>
                <div class="col-lg-2 col-12">
                    <ul class="lis">
                        <li class="in">Bantuan</li>
                        <li class="tenjar">Hubungi Kami</li>
                    </ul>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12 col-12">
                    <p class="tenjar">Syarat dan Ketentuan . Kebijakkan Privasi</p>
                </div>
            </div>
        </div>
    </div>
@endsection
