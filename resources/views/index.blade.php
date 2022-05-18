<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ URL::asset('/css/cssbaru/home.css') }}">
    {{--<link rel="stylesheet" href="{{ URL::asset('/css/kelasbaru.css') }}">--}}
    <link rel="shortcut icon" sizes="57x57" href="{{ URL::asset('/Foto/favicon.png') }}">
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('dist/assets/owl.carousel.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('dist/assets/owl.theme.default.min.css') }}">
    {{--<link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>--}}
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
    <link rel="stylesheet" href="{{ URL::asset('/slick/slick.css') }}">
    <link rel="stylesheet" type="text/css" href="http://kenwheeler.github.io/slick/slick/slick-theme.css"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css" integrity="sha512-HK5fgLBL+xu6dm/Ii3z4xhlSUyZgTT9tuc/hSrtw6uzJOvgRr2a9jyxxT1ely+B+xFAmJKVSTbpM/CuL7qxO8w==" crossorigin="anonymous" />
    <title>Guruku</title>

    <style>
        .rating-jumlah{
            color:#f8f8f8;
            display: inline;
        }
        .rating-baru{
            margin-top:-25px;
            margin-left:10px;
            /*color:#ffff;*/
        }
        .rating-tutul{
            color:#f2f2f2;
        }
    </style>
</head>
<body>

    @include('navs.navbar')

    {{--section awal --}}
    <section class="tulisan-banner">
        <div class="container">
            <div class="row jrk-banner">
                <div class="col-lg-6" data-aos="fade-up" data-aos-delay="150">
                    <h1 class="txt-awl">Cari Guru Les & <br> Ikuti Kelas Onlinenya</h1>
                    <p class="gbg">Gabung bersama komunitas belajar online dan rasakan manfaatnya <br> sekarang juga.</p>
                    <form action="{{ route('kelas.search') }}" method="get" class="form-inline jrk-search">
                        <input class="form-control col-lg-9 col-md-6 col-9 buat-search" type="text" placeholder="Search" aria-label="Search"
                        width="200" name="keyword" id="keyword" required>
                        <button class="btn btn-search" type="submit">Search</button>
                    </form>
                </div>
                <div class="col-lg-6" data-aos="fade-up" data-aos-delay="200">
                    <img src="{{ URL::asset('/imgbaru/banner-wanita.png') }}" alt="banner-wanita" class="img-fluid banner-wanita mt-3 mt-lg-0">
                </div>
            </div>
        </div>
    </section>
    {{--selesai section --}}


    {{--section guruku --}}
    <section class="bagian2">
        <div class="container">
            <div class="row jrk-section">
                <div class="col-lg-6 col-md-6" data-aos="fade-up" data-aos-delay="300">
                    <img src="{{ URL::asset('/imgbaru/gambar2.png') }}" alt="gambar2" class="img-fluid banner-wanita2">
                </div>
                <div class="col-lg-6 col-md-6 mt-3 mt-sm-3 mt-md-0 mt-lg-0 mt-xl-0 text-center text-sm-center text-md-left text-lg-left text-xl-left">
                    <h1 class="apaguru mt-4 mt-md-3 mt-lg-5" data-aos="fade-up" data-aos-delay="400">
                        Apa itu <span class="wrn-guru">Guruku ?</span>
                    </h1>
                    <p class="guruku mt-3 text-center text-sm-center text-md-left text-lg-left text-xl-left" data-aos="fade-up" data-aos-delay="500">
                        Guruku adalah sebuah aplikasi yang dikhususkan untuk para
                        pelajar/mahasiswa yang kesulitan dalam mencari tempat pembelajaran
                        online yang berkualitas dengan harga yang terjangkau. Tetapi, sekarang
                        anda tidak perlu khawatir lagi karena Guruku kini menyediakan
                        materi-materi pembelajaran yang sangat berkualitas dengan harga yang
                        terjangkau dengan proses yang mudah dan aman.
                    </p>
                    <button class="btn baca-lengkap mx-auto" data-aos="fade-up" data-aos-delay="550">Baca selengkapnya</button>
                </div>
            </div>
        </div>
    </section>
    {{--end guruku --}}


    {{--<div data-aos="fade-right" data-aos-duration="500">
        <h1>hello world</h1>
    </div>--}}

    {{--section kelebihan --}}
    <section class="kelebihan">
        <div class="container">
            <div class="row">
                <div class="col-lg-12" data-aos="fade-up">
                    <h1 class="txt-kelebihan text-center mt-5 mt-sm-5 mt-md-0 mt-lg-0 mt-xl-0">Kelebihan yang ada di <span class="wrn-guru">Guruku</span></h1>
                </div>
            </div>
            <div class="row justify-content-center mt-5 text-center text-lg-left">
                <div class="col-lg-4 col-md-4 col-sm-6 col-12">
                    <div class="card card-lebih mt-3 mt-sm-3 mt-md-0 mt-lg-0 mt-xl-0" data-aos="fade-up" data-aos-delay="400">
                        <div class="col-lg-12">
                            <img src="{{ URL::asset('/imgbaru/materi.png') }}" alt="materi" class="img-fluid ukr-lebih">
                            <h5 class="txt-lebih">Materi</h5>
                            <p class="keterangan-lebih">Terdapat 100++ kelas berkualitas setiap harinya.</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-6 col-12">
                    <div class="card card-lebih mt-3 mt-sm-3 mt-md-0 mt-lg-0 mt-xl-0" data-aos="fade-up" data-aos-delay="550">
                        <div class="col-lg-12">
                            <img src="{{ URL::asset('/imgbaru/modul.png') }}" alt="materi" class="img-fluid ukr-lebih">
                            <h5 class="txt-lebih">Modul</h5>
                            <p class="keterangan-lebih">Modul pembelajaran dari dasar sampai lanjutan.</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-6 col-12">
                    <div class="card card-lebih mt-3 mt-sm-3 mt-md-0 mt-lg-0 mt-xl-0" data-aos="fade-up" data-aos-delay="650">
                        <div class="col-lg-12">
                            <img src="{{ URL::asset('/imgbaru/mentor.png') }}" alt="materi" class="img-fluid ukr-lebih">
                            <h5 class="txt-lebih">Mentor</h5>
                            <p class="keterangan-lebih">Mentor yang sudah ahli di bidangnya</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-6 col-12">
                    <div class="card card-lebih mt-3 mt-sm-3 mt-md-3 mt-lg-3 mt-xl-4" data-aos="fade-up" data-aos-delay="400">
                        <div class="col-lg-12">
                            <img src="{{ URL::asset('/imgbaru/sertifikat.png') }}" alt="materi" class="img-fluid ukr-lebih">
                            <h5 class="txt-lebih">Sertifikat</h5>
                            <p class="keterangan-lebih">Mendapatkan sertifikat di akhir pelajaran.</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-6 col-12">
                    <div class="card card-lebih mt-3 mt-sm-3 mt-md-3 mt-lg-3 mt-xl-4" data-aos="fade-up" data-aos-delay="550">
                        <div class="col-lg-12">
                            <img src="{{ URL::asset('/imgbaru/pembayaran.png') }}" alt="materi" class="img-fluid ukr-lebih">
                            <h5 class="txt-lebih">Pembayaran</h5>
                            <p class="keterangan-lebih">Dengan metode pembayaran yang bermacam dan mudah.</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-6 col-12">
                    <div class="card card-lebih mt-3 mt-sm-3 mt-md-2 mt-lg-3 mt-xl-4" data-aos="fade-up" data-aos-delay="650">
                        <div class="col-lg-12">
                            <img src="{{ URL::asset('/imgbaru/konsultasi.png') }}" alt="materi" class="img-fluid ukr-lebih">
                            <h5 class="txt-lebih">Konsultasi</h5>
                            <p class="keterangan-lebih">Bebas konsultasi dengan mentor 24 jam.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    {{--end kelebihan --}}


    {{--section rekomendasi kelas --}}
    <section class="rekomendasi-kelas">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-6 img-kelas text-center text-sm-center text-md-left text-lg-left text-xl-left" data-aos="fade-up" data-aos-delay="300">
                    <h2 class="txt-rekomendasi mt-4 mt-sm-4 mt-md-0 mt-lg-0 mt-xl-0" data-aos="fade-up" data-aos-delay="400">Rekomendasi Kelass Populer</h2>
                    <p class="txt2-rekomendasi mt-3 mt-sm-3 mt-md-0 mt-lg-0 mt-xl-0" data-aos="fade-up" data-aos-delay="500">
                        Jangan mau kalah dengan yang lainnya. Ayo <br>
                        latih terus skillmu dan ikuti kelasnya untuk <br>
                        menjadi nomor satu.
                    </p>
                    <a href="{{ route('kelas.index') }}" class="btn btn-lihat mt-2 mt-sm-2 mt-md-0 mt-lg-0 mt-xl-0" data-aos="fade-up" data-aos-delay="500">Lihat Semua</a>
                </div>
                <div class="col-lg-6" data-aos="fade-up" data-aos-delay="500">
                    <div class="slick-kelas">
                        @foreach ($kelas as $query)
                            @if ($query->status == 'PUBLISH')
                                <div class="item item-kelas mt-lg-0 mt-md-3 mt-sm-3 mt-3" data-aos="zoom-out-up">
                                    <div class="card card-kelas mx-2">
                                        <img src="{{ asset('/storage/'.$query->file) }}" alt="wanita1"
                                        class="wanita1"
                                        data-toggle="tooltip"
                                        title="{{ $query->kelas }}">
                                            <div class="row">
                                                <div class="col-lg-6">
                                                    <div class="rating-baru mr-auto">
                                                        @php
                                                            $total = 0;
                                                            $counter = 0;
                                                        @endphp
                                                        @foreach ($rating as $value)
                                                            @if ($value->id_kelas == $query->id)
                                                                @php
                                                                    $total += intval($value->rating);
                                                                    $counter++;
                                                                @endphp
                                                            @endif
                                                        @endforeach
                                                        @php
                                                            if($total == null){
                                                                $foto = URL::asset('/Foto/bintang.png');
                                                                echo "<span class='rating-jumlah'><img src='".$foto."' class='bintang-carousel d-inline mr-1 mb-1'>" . "0" . "<span class='rating-tutul'> (0) </span>"  . "</span>";
                                                            }else{
                                                                $lala = $total / $counter;
                                                                $foto = URL::asset('/Foto/bintang.png');
                                                                echo "<span class='rating-jumlah'><img src='".$foto."' class='bintang-carousel d-inline mr-1 mb-1'>" . number_format($lala, 1) . "<span class='rating-tutul'> ($counter) </span>" . "</span>";
                                                            }
                                                        @endphp
                                                    </div>
                                                </div>
                                                <div class="col-lg-6">
                                                    <div class="kategori-baru ml-auto">
                                                        {{ $query->tingkat }}
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row pl-3">
                                                <div class="col-lg-12">
                                                    <h5 class="txt-kelas" data-toggle="tooltip" title="{{ $query->kelas }}">{{ Str::limit($query->kelas,'20') }}</h5>
                                                    <div class="media" style="margin-top:30px;">
                                                        <a href="{{ route('home.mentor.show',$query->mentor->kode_mentor) }}" target="_blank">
                                                            {{--<img src="{{ asset('/storage/'.$query->mentor->file) }}"
                                                                class="mr-3 img-fluid" style="width:50px; height:50px; border-radius:50px;"
                                                                alt="people"
                                                                data-toggle="tooltip"
                                                                title="{{ $query->mentor->name }}"
                                                            >--}}
                                                            <img src="{{ $query->mentor->file != null ? asset('/storage/'.$query->mentor->file) : asset('/Foto/peo2.png') }}"
                                                                class="mr-3 img-fluid" style="width:50px; height:50px; border-radius:50px;"
                                                                alt="people"
                                                                data-toggle="tooltip"
                                                                title="{{ $query->mentor->name }}"
                                                            >
                                                        </a>
                                                        <div class="media-body txt-mentor">
                                                            <h5 class="mt-0 nama-mentor" data-toggle="tooltip" title="{{ $query->mentor->name }}">
                                                                <a target="_blank"
                                                                style="color:#1d1d1d; text-decoration:none;"
                                                                href="{{ route('home.mentor.show',$query->mentor->kode_mentor) }}">
                                                                    {{ $query->mentor->name }}
                                                                </a>
                                                            </h5>
                                                            <p class="exp">{{ $query->mentor->bidang }}</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        <hr>
                                        <div class="col-lg-12">
                                            <div class="row">
                                                <div class="col-lg-6 col-md-6 col-sm-6 col-12">
                                                    @if ($query->jenis == 'gratis')
                                                        <p class="kelas-gratis">GRATIS</p>
                                                    @elseif($query->jenis == 'premium')
                                                        <p class="hrg-kelas">Rp. @convert($query->harga)</p>
                                                    @else
                                                        <p class="hrg-kelas">Rp. @convert($query->harga)</p>
                                                    @endif
                                                </div>
                                                <div class="col-lg-6 col-md-6 col-sm-6 col-12">
                                                    @if ($query->jenis == 'gratis')
                                                        <a href="{{ route('kelas.show',$query->slug) }}" class="btn btn-beli btn-block stretched-link">Daftar Kelas</a>
                                                    @elseif($query->jenis == 'premium')
                                                        <a href="{{ route('kelas.show',$query->slug) }}" class="btn btn-beli btn-block stretched-link">Beli kelas</a>
                                                    @else
                                                        <a href="{{ route('kelas.show',$query->slug) }}" class="btn btn-beli btn-block stretched-link">Beli kelas</a>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endif
                        @endforeach
                    </div>
                    <div class="col-lg-12">
                        <div class="text-lg-right text-md-center text-sm-center text-center">
                            <span class="dot mx-2 left">
                                <img src="{{ asset('/Foto/chev-left.png') }}"
                                    class="text-center img-fluid" alt="">
                            </span>
                            <span class="dot mx-2 right">
                                <img src="{{ asset('/Foto/chev-right.png') }}"
                                    class="text-center img-fluid" alt="">
                            </span>
                            {{--<span class="btn btn-secondary" style="font-size: 30px;">
                                <i class="fas fa-chevron-circle-left left"></i>
                            </span>
                            <span class="btn btn-secondary" style="font-size: 30px;">
                                <i class="fas fa-chevron-circle-right right"></i>
                            </span>--}}
                        </div>
                    </div>
                    <div class="col-lg-12">
                        {{--<span class="dot"></span>--}}
                        {{--<span class="dot"></span>
                        <span class="dot"></span>
                        <span class="dot"></span>--}}
                    </div>
                </div>
            </div>
        </div>
    </section>
    {{--end rekomendasi kelas --}}


    {{--section promo --}}

    {{--<section class="promo">
        <div class="container">
            <div class="row">
                <div class="col-lg-12" data-aos="fade-up" data-aos-delay="300">
                    <h2 class="nikmati text-center mt-5 mt-sm-5 mt-md-0 mt-lg-0 mt-xl-0">Nikmati <span class="wrn-guru">Promo</span> Hari Ini</h2>
                </div>
            </div>
            <div class="row mt-5">
                <div class="owl-carousel owl-theme carousel-promo">
                    <div class="item">
                        <div class="col-lg-12 text-center text-sm-center text-md-center text-lg-left text-xl-left">
                            <div class="card kotak-promo" data-aos="fade-up" data-aos-delay="400">
                                <h3 class="work">Work From Home</h3>
                                <p class="txt-work">Dapatkan potongan harga senilai <span class="harga">Rp.50.000,</span> <br>
                                dengan menggunakan kode dibawah ini.</p>
                                <a href="#" class="btn btn-promo mb-3 mx-auto">WFHYUK</a>
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="col-lg-12 text-center text-sm-center text-md-left text-lg-left text-xl-left">
                            <div class="card kotak-promo" data-aos="fade-up" data-aos-delay="400">
                                <h3 class="work">Work From Home</h3>
                                <p class="txt-work">Dapatkan potongan harga senilai <span class="harga">Rp.50.000,</span> <br>
                                dengan menggunakan kode dibawah ini.</p>
                                <a href="#" class="btn btn-promo mb-3 mx-auto">WFHYUK</a>
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="col-lg-12 text-center text-sm-center text-md-left text-lg-left text-xl-left">
                            <div class="card kotak-promo" data-aos="fade-up" data-aos-delay="400">
                                <h3 class="work">Work From Home</h3>
                                <p class="txt-work">Dapatkan potongan harga senilai <span class="harga">Rp.50.000,</span> <br>
                                dengan menggunakan kode dibawah ini.</p>
                                <a href="#" class="btn btn-promo mb-3 mx-auto">WFHYUK</a>
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="col-lg-12 text-center text-sm-center text-md-left text-lg-left text-xl-left">
                            <div class="card kotak-promo" data-aos="fade-up" data-aos-delay="400">
                                <h3 class="work">Work From Home</h3>
                                <p class="txt-work">Dapatkan potongan harga senilai <span class="harga">Rp.50.000,</span> <br>
                                dengan menggunakan kode dibawah ini.</p>
                                <a href="#" class="btn btn-promo mb-3 mx-auto">WFHYUK</a>
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="col-lg-12 text-center text-sm-center text-md-left text-lg-left text-xl-left">
                            <div class="card kotak-promo" data-aos="fade-up" data-aos-delay="400">
                                <h3 class="work">Work From Home</h3>
                                <p class="txt-work">Dapatkan potongan harga senilai <span class="harga">Rp.50.000,</span> <br>
                                dengan menggunakan kode dibawah ini.</p>
                                <a href="#" class="btn btn-promo mb-3 mx-auto">WFHYUK</a>
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="col-lg-12 text-center text-sm-center text-md-left text-lg-left text-xl-left">
                            <div class="card kotak-promo" data-aos="fade-up" data-aos-delay="400">
                                <h3 class="work">Work From Home</h3>
                                <p class="txt-work">Dapatkan potongan harga senilai <span class="harga">Rp.50.000,</span> <br>
                                dengan menggunakan kode dibawah ini.</p>
                                <a href="#" class="btn btn-promo mb-3 mx-auto">WFHYUK</a>
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="col-lg-12 text-center text-sm-center text-md-left text-lg-left text-xl-left">
                            <div class="card kotak-promo" data-aos="fade-up" data-aos-delay="400">
                                <h3 class="work">Work From Home</h3>
                                <p class="txt-work">Dapatkan potongan harga senilai <span class="harga">Rp.50.000,</span> <br>
                                dengan menggunakan kode dibawah ini.</p>
                                <a href="#" class="btn btn-promo mb-3 mx-auto">WFHYUK</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>--}}

    {{--end promo --}}


    {{--section tanggapan --}}
    <section class="tanggapan">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center text-sm-center text-md-left text-lg-left text-xl-left">
                    <h2 class="txt-tanggapan mt-5 mt-sm-5 mt-md-0 mt-lg-0 mt-xl-0" data-aos="fade-up" data-aos-delay="300">
                        Tanggapan Mereka Yang Belajar <br> di <span class="wrn-guru">Guruku</span>
                    </h2>
                </div>
            </div>
        </div>
        <div class="container mt-5">
            <div class="row">
                <div class="col-lg-6 col-md-6" data-aos="zoom-out" data-aos-delay="400">
                    <img src="{{ asset('/Foto/wanita-promo.png') }}" alt="wanita-promo" class="img-fluid wanita-tanggapan">
                </div>
                <div class="col-lg-6 col-md-6 untuk-z mt-3" data-aos="zoom-out" data-aos-delay="500">
                    <div class="col-lg-12 kotak-tanggapan ml-auto">
                        <img src="{{ asset('/img/petikdua.png') }}" alt="petikdua" class="petikdua">
                        <div class="slick-tanggapan">
                            <div class="col-lg-12">
                                <p class="testi text-center text-sm-center text-md-left text-lg-left text-xl-left">
                                    Sangat menarik, aplikasi ini memudahkan saya untuk
                                    mencari guru les dan kelas online agar saya bisa tetap
                                    produktif dan mengembangkan skill dan harganya juga
                                    sangat terjangkau dengan kualitas guru yang sudah
                                    berpelangaman.
                                </p>
                            </div>
                            <div class="col-lg-12">
                                <p class="testi text-center text-sm-center text-md-left text-lg-left text-xl-left">
                                    Sangat menarik, aplikasi ini memudahkan saya untuk
                                    mencari guru les dan kelas online agar saya bisa tetap
                                    produktif dan mengembangkan skill dan harganya juga
                                    sangat terjangkau dengan kualitas guru yang sudah
                                    berpelangaman.
                                </p>
                            </div>
                        </div>
                        <div class="media-nav text-lg-right text-md-center text-sm-center text-center">
                            <span class="dot mx-1 left-tanggapan">
                                <img src="{{ asset('/Foto/chev-left.png') }}"
                                    class="text-center img-fluid" alt="nav-left">
                            </span>
                            <span class="dot right-tanggapan">
                                <img src="{{ asset('/Foto/chev-right.png') }}"
                                    class="text-center img-fluid" alt="nav-right">
                            </span>
                        </div>
                        {{--<div class="owl-carousel owl-theme carousel-testi">
                            <div class="item">
                                <p class="testi text-center text-sm-center text-md-left text-lg-left text-xl-left">
                                    Sangat menarik, aplikasi ini memudahkan saya untuk
                                    mencari guru les dan kelas online agar saya bisa tetap
                                    produktif dan mengembangkan skill dan harganya juga
                                    sangat terjangkau dengan kualitas guru yang sudah
                                    berpelangaman.
                                </p>
                            </div>
                            <div class="item">
                                <p class="testi text-center text-sm-center text-md-left text-lg-left text-xl-left">
                                    Sangat menarik, aplikasi ini memudahkan saya untuk
                                    mencari guru les dan kelas online agar saya bisa tetap
                                    produktif dan mengembangkan skill dan harganya juga
                                    sangat terjangkau dengan kualitas guru yang sudah
                                    berpelangaman.
                                </p>
                            </div>
                        </div>--}}
                    </div>
                </div>
            </div>
        </div>
    </section>
    {{--end tanggapan --}}


    {{--section lamar --}}
    <section class="lamar">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-8 col-sm-12 col-12 jarak-lamar
                    text-center text-sm-center text-md-left text-lg-left text-xl-left"
                    data-aos="fade-up" data-aos-delay="300">
                    <h4 class="keahlian">
                        Punya Keahlian khusus dan ingin menjadi
                        pengajar di <span class="guru-lamar">Guruku?</span> Yuk, gabung menjadi
                        mentor.</h4>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-12 col-12 jarak-lamar
                    text-center text-sm-center text-md-left text-lg-left text-xl-left
                    mt-3 mt-sm-3 mt-md-0 mt-lg-0 mt-xl-0"
                    data-aos="zoom-out" data-aos-delay="400">
                    <button class="btn btn-outline-secondary btn-kirim mr-auto">
                        Kirim CV & Portfolio
                    </button>
                </div>
            </div>
        </div>
    </section>
    {{--end lamar --}}


    {{--footer --}}
        @include('includes.footer')
    {{--end footer --}}











    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    {{-- <script src="https://code.jquery.com/jquery-3.5.0.js"></script> --}}
    <script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
    {{--<script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>--}}
    {{--<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>--}}
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <script src="{{ URL::asset('/dist/owl.carousel.min.js') }}"></script>
    {{--<script src="{{ URL::asset('../resources/js/bootstrap.js') }}"></script>--}}
    {{--<script src="{{ URL::asset('/js/aos.js') }}"></script>--}}
    {{--<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>--}}
    {{--<script src="{{ asset('/js/bootstrap.js') }}"></script>--}}
    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>

    <script src="{{ URL::asset('/slick/slick.js') }}"></script>

    <script>
      AOS.init({
          duration:1000
      });
    </script>

    <script>

        $(document).ready(function(){
            $('.card-lebih').hover(
                function(){
                    $(this).animate({
                        marginTop: '-10px',
                    },200);
                },
                function(){
                    $(this).animate({
                        marginTop: '0px'
                    });
                }
            );
        });

        $(document).ready(function(){
            $('.card-kelas').hover(
                function(){
                    $(this).animate({
                        marginTop: '-2px',
                    },200);
                },
                function(){
                    $(this).animate({
                        marginTop: '0px'
                    });
                }
            );
        });

        $(document).ready(function(){
            $('.kotak-promo').hover(
                function(){
                    $(this).animate({
                        marginTop:'-2px',
                    },200);
                },
                function(){
                    $(this).animate({
                        marginTop: '0px'
                    });
                }
            )
        });

        $('.slick-kelas').slick({
            dots: true,
            infinite: false,
            speed: 300,
            slidesToShow:2.1,
            slidesToScroll:1,
            arrows:false,
            responsive: [
                {
                    breakpoint: 1100,
                    settings: {
                        slidesToShow: 1.5,
                        slidesToScroll: 1,
                        infinite: false,
                        dots: true,
                        arrows:false
                    }
                },
                {
                    breakpoint: 1024,
                    settings: {
                        slidesToShow: 1.1,
                        slidesToScroll: 1,
                        infinite: false,
                        dots: true,
                        arrows:false
                    }
                },
                {
                    breakpoint: 982,
                    settings: {
                        slidesToShow: 2.5,
                        slidesToScroll: 1,
                        infinite: false,
                        dots: true,
                        arrows:false
                    }
                },
                {
                    breakpoint: 770,
                    settings: {
                        slidesToShow: 2.1,
                        slidesToScroll: 1,
                        infinite: false,
                        dots: true,
                        arrows:false,
                    }
                },
                {
                    breakpoint: 620,
                    settings: {
                        slidesToShow: 1.5,
                        slidesToScroll: 1,
                        infinite: false,
                        dots: true,
                        arrows:false,
                    }
                },
                {
                    breakpoint: 480,
                    settings: {
                        slidesToShow: 1.1,
                        slidesToScroll: 1,
                        infinite: false,
                        dots: true,
                        arrows:false,
                    }
                },
                {
                    breakpoint: 370,
                    settings: {
                        slidesToShow: 1,
                        slidesToScroll: 1,
                        infinite: false,
                        dots: true,
                        arrows:false,
                    }
                },
            ]
        });

        $('.left').click(function(){
            $('.slick-kelas').slick('slickPrev');
        });

        $('.right').click(function(){
            $('.slick-kelas').slick('slickNext');
        });


        $('.slick-tanggapan').slick({
            dots: true,
            infinite: false,
            speed: 300,
            slidesToShow:1,
            slidesToScroll:1,
            arrows:false,
            autoplay:true,
            responsive: [
                {
                    breakpoint: 1100,
                    settings: {
                        slidesToShow: 1,
                        slidesToScroll: 1,
                        infinite: false,
                        dots: true,
                        arrows:false
                    }
                },
                {
                    breakpoint: 1024,
                    settings: {
                        slidesToShow: 1,
                        slidesToScroll: 1,
                        infinite: false,
                        dots: true,
                        arrows:false
                    }
                },
                {
                    breakpoint: 982,
                    settings: {
                        slidesToShow: 1,
                        slidesToScroll: 1,
                        infinite: false,
                        dots: true,
                        arrows:false
                    }
                },
                {
                    breakpoint: 770,
                    settings: {
                        slidesToShow: 1,
                        slidesToScroll: 1,
                        infinite: false,
                        dots: true,
                        arrows:false,
                    }
                },
                {
                    breakpoint: 620,
                    settings: {
                        slidesToShow: 1,
                        slidesToScroll: 1,
                        infinite: false,
                        dots: true,
                        arrows:false,
                    }
                },
                {
                    breakpoint: 480,
                    settings: {
                        slidesToShow: 1,
                        slidesToScroll: 1,
                        infinite: false,
                        dots: true,
                        arrows:false,
                    }
                },
                {
                    breakpoint: 370,
                    settings: {
                        slidesToShow: 1,
                        slidesToScroll: 1,
                        infinite: false,
                        dots: true,
                        arrows:false,
                    }
                },
            ]
        });

        $('.left-tanggapan').click(function(){
            $('.slick-tanggapan').slick('slickPrev');
        });

        $('.right-tanggapan').click(function(){
            $('.slick-tanggapan').slick('slickNext');
        });


        //$('.carousel-kelas').owlCarousel({
        //autoplayHoverPause:true,
        //margin:10,
        //responsive:{
        //    0:{
        //    items:1,
        //    dots:true
        //    },
        //    480:{
        //    items:1,
        //    dots:true
        //    },
        //    600:{
        //    items:2,
        //    dots:true
        //    },
        //    900:{
        //    items:3,
        //    dots:true
        //    },
        //    1000:{
        //        items:2,
        //        dots:true
        //    },
        //    1263:{
        //        items:2,
        //        dots:true
        //    },
        //}
        //});

        //$('.carousel-promo').owlCarousel({
        //autoplay:true,
        //autoplayHoverPause:true,
        //margin:40,
        //lazyload:true,
        //responsive:{
        //    0:{
        //    items:1,
        //    dots:true
        //    },
        //    480:{
        //    items:1,
        //    dots:true
        //    },
        //    600:{
        //    items:2,
        //    dots:true
        //    },
        //    1000:{
        //        items:3,
        //        dots:true
        //    },
        //    1263:{
        //        items:3,
        //        dots:true
        //    }
        //}
        //});

        $('.carousel-testi').owlCarousel({
        autoplay:true,
        autoplayHoverPause:true,
        //loop:false,
        margin:10,
        lazyload:true,
        nav:false,
        responsive:{
            0:{
            items:1,
            },
            480:{
            items:1,
            },
            600:{
            items:1,
            },
            1000:{
                items:1,
            },
            1263:{
                items:1,
                loops:false,
ots:true
 //dots:true
            }
        }
        });

    </script>
</body>
</html>
