<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('dist/assets/owl.carousel.min.css') }}">
    <link rel="shortcut icon" sizes="57x57" href="{{ URL::asset('/Foto/favicon.png') }}">
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('dist/assets/owl.theme.default.min.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('/css/kelasbaru.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
    {{--<base href="https://github.com" target="_blank">--}}
    <title>Detail Kelas {{ $kelas->kelas }}</title>
    <style>
        .rating-jumlah{
            display: inline;
        }
        .owl-carousel .owl-item img{
            width:100%;
            display: inline;
        }
        .bintang-carousel{
            /*width:10% !important;*/
            height:20px !important;
            width:20px !important;
            display: inline;
        }
    </style>
  </head>
  <body>
    <header class="bck-color2">
        <div class="container">
            @include('navs.navbar2')
            <div class="row">
                <div class="col-lg-8" data-aos="zoom-in">
                    <h3 class="mt-5 judul-kelas">Kelas {{ $kelas->kelas }}</h3>
                    @if (strval($cekrating) == null)
                        <span class="rating-jumlah-detail-kelas"><img src="{{ URL::asset('/foto/bintang.png') }}" alt="" class="mr-1" height="20" width="20">0</span> <span class="rating-total-detail-kelas">(0)</span>
                    @else
                        <p class="rating-total-detail-kelas"><img src="{{ URL::asset('/foto/bintang.png') }}" alt="" class="mr-1" height="20" width="20">{{ number_format((float)$cekrating, 1) }} <span class="rating-total-detail-kelas">({{ $rate }})</span></p>
                    @endif

                    {{-- @foreach ($kategori as $query) --}}
                        {{-- <span class="badge badge-danger">{{ $kelas->kategori }}</span> --}}
                        {{-- @endforeach --}}
                        {{-- <span>10 murid</span> --}}
                    {{-- @endforeach --}}
                    <div class="row text-center mt-5">
                        <div class="col-lg-3 col-6 col-sm-6 col-md-3">
                            <p class="tipe-kelas">Jenis Kelas</p>
                            <p class="tipe-kelas2 text-uppercase">{{ $kelas->jenis }}</p>
                        </div>
                        <div class="col-lg-3 col-6 col-sm-6 col-md-3">
                            <p class="tipe-kelas">Tingkat</p>
                            <p class="tipe-kelas2 text-uppercase">{{ $kelas->tingkat }}</p>
                        </div>
                        <div class="col-lg-3 col-6 col-sm-6 col-md-3 jrk-kon">
                            <p class="tipe-kelas">Konsultasi</p>
                            <p class="tipe-kelas2 text-uppercase">{{ $kelas->konsultansi ? 'Tersedia' : 'Tidak' }}</p>
                        </div>
                        <div class="col-lg-3 col-6 col-sm-6 col-md-3 jrk-kon">
                            <p class="tipe-kelas">Sertifikat</p>
                            <p class="tipe-kelas2 text-uppercase">{{ $kelas->sertifikat ? 'Tersedia' : 'Tidak' }}</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 text-center" data-aos="zoom-in">
                    @foreach ($videodetails as $query)
                        {{--<video class="mt-5 jrk-video-kecil" controls
                        style="border-radius:30px; mr-3">
                            <source src="{{ asset('/storage/'.$query->file) }}" type="video/mp4">
                            <source src="movie.ogg" type="video/ogg">
                        </video>--}}
                        <iframe class="mt-5 jrk-video-kecil" width="300px" height="200px" style="border-radius:30px;" src="https://www.youtube.com/embed/{{ $query->file }}" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                    @endforeach
                </div>
            </div>
        </div>
    </header>

    <section class="deskripsi-kelas-detail">
        <div class="container">
            <div class="row">
                <div class="col-lg-7" data-aos="zoom-out">
                    <p class="txt-kategori mt-5">Deskripsi Kelas <i>"{{ $kelas->kelas }}"</i></p>
                    <p class="text-justify deskripsi-details">{!! $kelas->deskripsi !!}</p>
                </div>
                <div class="col-lg-5" data-aos="zoom-out">
                    {{-- Isi Kuis Jenis Kelas --}}
                    @if ($kelas->jenis == 'gratis')
                        <div class="jrk-fot">
                            @guest
                                <p class="txt-kategori mt-5">Kuis</p>
                                <p class="text-justify deskripsi-kelas">Login Terlebih Dahulu</p>
                            @endguest

                            @auth
                                @if (Auth::user()->roles == 'ADMIN')
                                    <p class="txt-kategori mt-5">Kuis</p>
                                    <p class="text-justify deskripsi-kelas">Anda Login Sebagai Admin</p>
                                @elseif(Auth::user()->roles == 'MENTOR')
                                    <p class="txt-kategori mt-5">Kuis</p>
                                    <p class="text-justify deskripsi-kelas">Anda Login Sebagai Mentor</p>
                                @else
                                    @if ($ikut->count() == 0)
                                        <p class="txt-kategori mt-5">Kuis</p>
                                        @forelse ($kuis as $item)
                                            <p class="text-justify deskripsi-details"><a href="#" onclick="beliKelas(); return false">{{ $item->nama_kuis }}</a></p>
                                        @empty
                                            <p class="text-justify deskripsi-kelas"><b>-</b></p>
                                        @endforelse
                                    @endif

                                    @if ($ikut->count() > 0)
                                        <p class="txt-kategori mt-5">Kuis</p>
                                        @forelse ($kuis as $item)
                                            <p class="text-justify deskripsi-details"><a href="{{ route('kuis.detailnya', $item->slug) }}">{{ $item->slug }}</a>
                                                @foreach ($nilai as $nin)
                                                    @if ($item->id == $nin->id_kuis)
                                                        @if (strval($nin->nilai_awal) != null)
                                                            <i class="fa fa-check"></i>
                                                        @endif
                                                    @endif
                                                @endforeach
                                            </p>
                                        @empty
                                            <p class="text-justify deskripsi-kelas"><b>-</b></p>
                                        @endforelse
                                    @endif

                                @endif

                            @endauth
                        </div>

                    @elseif($kelas->jenis == 'premium')
                        <div class="jrk-fot">
                            @guest
                                <p class="txt-kategori mt-5">Kuis</p>
                                <p class="text-justify deskripsi-kelas">Login Terlebih Dahulu</p>
                            @endguest

                            @auth

                                @if (Auth::user()->roles == 'ADMIN')
                                    <p class="txt-kategori mt-5">Kuis</p>
                                    <p class="text-justify deskripsi-kelas">Anda Login Sebagai Admin</p>

                                @elseif(Auth::user()->roles == 'USERS')

                                    @if ($user->count() == 0)
                                        <p class="txt-kategori mt-5">Kuis</p>
                                        @forelse ($kuis as $item)
                                            <p class="text-justify deskripsi-details"><a href="#" onclick="beliKelas(); return false">{{ $item->slug }}</a></p>
                                        @empty
                                            <p class="text-justify deskripsi-kelas"><b>-</b></p>
                                        @endforelse
                                    @endif

                                    @if ($user->count() > 0)
                                        <p class="txt-kategori mt-5">Kuis</p>
                                        @forelse ($kuis as $item)
                                            <p class="text-justify deskripsi-details"><a href="{{ route('kuis.detailnya', $item->slug) }}">{{ $item->slug }}</a>
                                                @foreach ($nilai as $nin)
                                                    @if ($item->id == $nin->id_kuis)
                                                        @if (strval($nin->nilai_awal) != null)
                                                            <i class="fa fa-check"></i>
                                                        @endif
                                                    @endif
                                                @endforeach
                                            </p>
                                        @empty
                                            <p class="text-justify deskripsi-kelas"><b>-</b></p>
                                        @endforelse
                                    @endif

                                @else
                                    <p class="txt-kategori mt-5">Kuis</p>
                                    @forelse ($kuis as $item)
                                        <p class="text-justify deskripsi-details"><a href="#" onclick="isMentor(); return false">{{ $item->nama_kuis }}</a></p>
                                    @empty
                                        <p class="text-justify deskripsi-kelas"><b>-</b></p>
                                    @endforelse
                                @endif
                            @endauth

                        </div>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-lg-7" data-aos="zoom-out">
                    <p class="txt-kategori mt-5">Tentang Mentor</p>
                    <div class="media" style="margin-top:30px;">
                        <a href="{{ route('home.mentor.show',$kelas->mentor_id) }}">
                            @if ($kelas->mentor->file != null)
                                <img src="{{ asset('/storage/'.$kelas->mentor->file) }}"
                                    style="width:50px; height:50px; border-radius:50px;"
                                    class="people-terbaru" alt="">
                            @else
                                <img src="{{ asset('/Foto/man.png') }}"
                                    style="width:50px; height:50px; border-radius:50px;"
                                    class="people-terbaru" alt="">
                            @endif
                        </a>
                        <div class="media-body ml-3">
                            <p class="vet-terbaru">{{ $kelas->mentor->name }}</p>
                            @if ($kelas->mentor->bidang != null)
                                <p class="ex-terbaru">{{ $kelas->mentor->bidang }}</p>
                            @else
                                <p class="ex-terbaru">-</p>
                            @endif
                        </div>
                    </div>
                    <p class="text-justify deskripsi-details mt-2">
                        @if ($kelas->mentor->deskripsi != null)
                            {{ $kelas->mentor->deskripsi }}
                        @else
                            -
                        @endif
                    </p>
                    <div class="row">
                        <div class="col-lg-6">
                            @if ($kelas->mentor->instagram_profile == null)
                            <span>Instagram Profile <br> <a href="#">View Instagram</a></span>
                            @else
                                <span>Instagram Profile <br> <a href="{{ $kelas->mentor->instagram_profile }}">View Instagram</a></span>
                            @endif
                        </div>
                        <div class="col-lg-6">
                            @if ($kelas->mentor->twitter_profile == null)
                            <span>Twitter Profile <br> <a href="#">View Twitter</a></span>
                            @else
                                <span>Twitter Profile <br> <a href="{{ $kelas->mentor->twitter_profile }}">View Twitter</a></span>
                            @endif
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-lg-6">
                            @if ($kelas->mentor->github_profile == null)
                            <span>Github Profile <br> <a href="#">View Github</a></span>
                            @else
                                <span>Github Profile <br> <a href="{{ $kelas->mentor->github_profile }}">View Github</a></span>
                            @endif
                        </div>
                        <div class="col-lg-6">
                            @if ($kelas->mentor->dribbble_profile == null)
                            <span>Dribbble Profile <br> <a href="#">View Dribbble</a></span>
                            @else
                                <span>Dribbble Profile <br> <a href="{{ $kelas->mentor->dribbble_profile }}">View Dribbble</a></span>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="col-lg-5" data-aos="zoom-out">
                    <div class="jrk-fot">
                        <p class="txt-kategori mt-5">Blog Kelas</p>
                        <p class="text-justify deskripsi-details">
                            @forelse($blog as $item)
                                @if ($item->status == 'PENDING')
                                    <a href="#" onclick="otwBlog(); return false">{{ Str::limit($item->title, '20') }}</a>
                                @else
                                    <a href="{{ route('blog.show',$item->slug) }}">{{ Str::limit($item->title, '20') }}</a>
                                @endif
                            @empty
                                -
                            @endforelse
                        </p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-7" data-aos="zoom-in">
                    <p class="txt-kategori mt-5">Materi yang akan dipelajari</p>
                    <div class="row">
                        <div class="col-lg-4 col-4">
                            <span><i class=""><img src="{{ URL::asset('/img/buku.png') }}" height="20" alt=""></i><span class="ml-2">{{ $materi }} Materi</span></span>
                        </div>
                        <div class="col-lg-4 col-4">
                            <span><i class=""><img src="{{ URL::asset('/img/buku.png') }}" height="20" alt=""></i><span class="ml-2">{{ $submateri }} Sub-materi</span></span>
                        </div>
                        <div class="col-lg-4 col-4">
                            {{--<span><i><img src="{{ URL::asset('/img/jam.png') }}" height="20" alt=""></i><span class="ml-2">4jam 21menit</span></span>--}}
                        </div>
                    </div>
                </div>
            </div>
            <div class="row mt-3">
                <div class="col-lg-7" data-aos="zoom-in">
                    {{--<div class="accordion" id="accordionExample">
                        @foreach ($video as $query => $videos)
                            <div class="card">
                                <div class="card-header" id="headingOne">
                                <h5 class="mb-0">
                                    <button class="btn btn-link" style="color:#7e7e7e" type="button" data-toggle="collapse" data-target="#collapseOne-{{ $query }}" aria-expanded="true" aria-controls="collapseOne">
                                        {{ $videos->judul }}
                                    </button>
                                </h5>
                                </div>

                                <div id="collapseOne-{{ $query }}" class="collapse in" aria-labelledby="headingOne" data-parent="#accordionExample">
                                    <div class="card-body">
                                        @foreach ($anakvideo as $query)
                                            <p>{{ $query->nama }}</p>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>--}}

                    <div class="accordion" id="accordionExample">
                        @foreach ($video as $query => $videos)
                            <div class="card">
                                <div class="card-header" id="headingOne">
                                <h5 class="mb-0">
                                    <button class="btn btn-link" style="color:#7e7e7e" type="button" data-toggle="collapse" data-target="#collapseOne-{{ $query }}" aria-expanded="true" aria-controls="collapseOne">
                                        {{ $videos->judul }}
                                    </button>
                                </h5>
                                </div>

                                <div id="collapseOne-{{ $query }}" class="collapse in" aria-labelledby="headingOne" data-parent="#accordionExample">
                                    <div class="card-body">
                                        @foreach ($anakvideo as $query)
                                            @if ($query->video_id == $videos->id)
                                                <p>{{ $query->nama }}</p>
                                            @endif
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{--@foreach ($video as $jud)
        <p>{{ $jud->judul }}</p>
        @foreach ($anakvideo as $query)
            @if ($query->video_id == $jud->id)
                <p>{{ $query->nama }}</p>
            @endif
        @endforeach
    @endforeach--}}




    <section class="kelas-lain-details">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <p class="txt-kategori mt-5">Lihat Kelas Lainnya</p>
                    <div class="owl-carousel owl-theme owl-item carousel-popular">
                        @foreach ($lain as $query)
                            {{--@if ($query->status == 'PUBLISH')--}}
                                <div class="item item-kelas" data-aos="zoom-out-up">
                                    <div class="card card-kelas">
                                        <img src="{{ asset('/storage/'.$query->file) }}" alt="wanita1"
                                        class="wanita1"
                                        data-toggle="tooltip"
                                        title="{{ $query->kelas }}">
                                            <div class="row">
                                                {{--<div class="col-lg-6">
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
                                                                $foto = URL::asset('/foto/bintang.png');
                                                                echo "<span class='rating-jumlah'><img src='".$foto."' class='bintang-carousel mr-1 mb-1'>" . "0" . "<span class='rating-tutul'> (0) </span>"  . "</span>";
                                                            }else{
                                                                $lala = $total / $counter;
                                                                $foto = URL::asset('/foto/bintang.png');
                                                                echo "<span class='rating-jumlah'><img src='".$foto."' class='bintang-carousel mr-1 mb-1'>" . number_format($lala, 1) . "<span class='rating-tutul'> ($counter) </span>" . "</span>";
                                                            }
                                                        @endphp
                                                    </div>
                                                </div>--}}
                                                <div class="col-lg-12">
                                                    <div class="kategori-baru mx-auto">
                                                        {{ $query->tingkat }}
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row pl-3">
                                                <div class="col-lg-12">
                                                    <h5 class="txt-kelas" data-toggle="tooltip" title="{{ $query->kelas }}">{{ Str::limit($query->kelas,'20') }}</h5>
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
                                                            echo "
                                                            <span>
                                                                <img src='$foto' alt='bintang' class='img-fluid d-inline vertical-align-center' style='margin-top:-5px; width:20px; height:20px;'>
                                                            </span>
                                                            <span class='rating-jumlah'> 0 <span class='rating-total'> (0) </span> </span>";
                                                            
                                                        }else{
                                                            $lala = $total / $counter;
                                                            $foto = URL::asset('/Foto/bintang.png');
                                                            echo "
                                                            <span>
                                                                <img src='$foto' alt='bintang' class='img-fluid d-inline vertical-align-center' style='margin-top:-5px; width:20px; height:20px;'>
                                                            </span>
                                                            <span class='rating-jumlah'> ". number_format($lala, 1) . " <span class='rating-total'> ($counter) </span> </span>";
                                                        }
                                                    @endphp
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
                            {{--@endif--}}
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>

    <footer class="footer-details mt-5 wrn-footer-details">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="row">
                        <div class="col-lg-6 col-6 justify-content-center">
                            <div style="margin-top:40px;" class="stretched-link">
                                <i><img src="{{ URL::asset('/img/share.png') }}" height="20px" alt=""></i>
                                <span class="bagikan ml-2">Bagikan</span>
                            </div>
                            {{-- <a href="" class="stretched-link"></a> --}}
                        </div>
                        <div class="col-lg-6 col-6">
                            <div class="row">
                                <div class="col-lg-12 mt-3">
                                    {{-- {{ Auth::user()->name }} --}}
                                    @if ($kelas->jenis == 'gratis')
                                        {{--<div class="jrk-fot">--}}
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <div class="item float-right">
                                                    @guest
                                                        <span><button class="btn btn-info btn-checkout-gratis"
                                                            onclick="event.preventDefault(); location.href='{{ url('login') }}'">IKUTI SEKARANG</button></span>
                                                    @endguest

                                                    @auth
                                                        @if (Auth::user()->roles == 'ADMIN')
                                                            <button class="btn btn-secondary btn-checkout-secondary"
                                                                onclick="isAdmin()">Ikuti Kelas</button>
                                                        @elseif(Auth::user()->roles == 'MENTOR')
                                                            <button class="btn btn-secondary btn-checkout-secondary"
                                                                onclick="isMentor()">Ikuti Kelas</button>
                                                        @else
                                                            @if ($ikut->count() == 0)
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
                                                                        <input type="text" name="join_details" id="join_details" value="{{ $kelas->id }}">
                                                                    </div>
                                                                    <button class="btn btn-info btn-checkout-gratis"
                                                                    type="submit">Ikuti Kelas</button>
                                                                </form>
                                                            @endif

                                                            @if ($ikut->count() > 0)
                                                                <button class="btn btn-warning btn-checkout"
                                                                    onclick="event.preventDefault(); location.href='{{ route('play.course',$kelas->slug) }}'" style="margin-left:170px; margin-top:20px;">Lanjut Belajar</button>
                                                            @endif

                                                        @endif

                                                    @endauth
                                                </div>
                                            </div>
                                        </div>

                                    @elseif($kelas->jenis == 'premium')
                                        {{--<div class="jrk-fot" style="border:2px solid blue;">--}}
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <div class="item float-right">
                                                    @guest
                                                        <span class="harga-kelas"> Harga Kelas </span> <br>
                                                        <span class="biaya-kelas">Rp. @convert($kelas->harga)</span>
                                                        <a href="{{ url('login') }}" target="_blank" class="btn btn-checkout py-2" style="margin-left:10px; margin-top:-10px;">BELI SEKARANG</a>
                                                    @endguest

                                                    @auth

                                                        @if (Auth::user()->roles == 'ADMIN')

                                                            <span class="harga-kelas"> Harga Kelas </span> <br>
                                                            <span class="biaya-kelas">Rp. @convert($kelas->harga)</span>
                                                            <a href="#" onclick="isAdmin(); return false" class="btn btn-checkout" style="margin-left:10px; margin-top:-10px;">BELI SEKARANG</a>
                                                            {{--<button class="btn btn-success btn-checkout-gratis"
                                                                onclick="alert('Anda sedang login sebagai Admin')">BELI SEKARANG</button>--}}

                                                        @elseif(Auth::user()->roles == 'USERS')

                                                        @foreach ($user as $query)
                                                            @if ($user->count() > 0)
                                                                @if ($query->transaction->transaction_status == 'PENDING')
                                                                    <button class="btn btn-warning btn-checkout"
                                                                    onclick="pembayaran();" style="margin-left:170px; margin-top:20px;">Lanjut Belajar</button>
                                                                @elseif($query->transaction->transaction_status == 'SUCCESS')
                                                                    <button class="btn btn-warning btn-checkout"
                                                                    onclick="event.preventDefault(); location.href='{{ route('play.course',$kelas->slug) }}'" style="margin-left:170px; margin-top:20px;">Lanjut Belajar</button>
                                                                @else
                                                                    <span class="harga-kelas"> Harga Kelas </span> <br>
                                                                    <span class="biaya-kelas">Rp. @convert($kelas->harga)</span>
                                                                    <a href="{{ route('checkout.showslug',$kelas->slug) }}" target="_blank" class="btn btn-checkout ml-2 py-auto" style="margin-top:-10px;">BELI SEKARANG</a>
                                                                @endif
                                                            @endif
                                                        @endforeach
                                                        @if ($user->count() == 0)
                                                            <span class="harga-kelas"> Harga Kelas </span> <br>
                                                            <span class="biaya-kelas">Rp. @convert($kelas->harga)</span>
                                                            <a href="{{ route('checkout.showslug',$kelas->slug) }}" target="_blank" class="btn btn-checkout ml-2 py-auto" style="margin-top:-10px;">BELI SEKARANG</a>
                                                        @endif

                                                        {{--kodingan awal/ jgn di hapus --}}
                                                            {{--@if ($user->count() == 0)
                                                                <span class="harga-kelas"> Harga Kelas </span> <br>
                                                                <span class="biaya-kelas">Rp. @convert($kelas->harga)</span>
                                                                <a href="{{ route('checkout.showslug',$kelas->slug) }}" target="_blank" class="btn btn-checkout ml-2 py-auto" style="margin-top:-10px;">BELI SEKARANG</a>
                                                            @elseif($user->count() > 0)
                                                                <button class="btn btn-warning btn-checkout"
                                                                onclick="event.preventDefault(); location.href='{{ route('play.course',$kelas->slug) }}'" style="margin-left:170px; margin-top:20px;">Lanjut Belajar</button>
                                                            @endif--}}

                                                            {{--@if ($user->count() > 0)
                                                                <button class="btn btn-warning btn-checkout"
                                                                    onclick="event.preventDefault(); location.href='{{ route('play.course',$kelas->slug) }}'" style="margin-left:170px; margin-top:20px;">Lanjut Belajar</button>
                                                            @endif--}}

                                                        @else
                                                            <span class="harga-kelas"> Harga Kelas </span> <br>
                                                                    <span class="biaya-kelas">Rp. @convert($kelas->harga)</span>
                                                                    <a href="#" onclick="isMentor(); return false" class="btn btn-checkout" style="margin-left:10px; margin-top:-10px;">BELI SEKARANG</a>
                                                            {{--<button class="btn btn-success btn-checkout-gratis"
                                                                onclick="alert('Anda sedang login sebagai Mentor')">BELI SEKARANG</button>--}}
                                                        @endif
                                                    @endauth


                                                    {{--ini tanggal 13 november --}}
                                                    {{--@foreach ($user as $query)
                                                        @if ($user->count() > 0)
                                                            @if (Auth::user()->id == $query->user_id)
                                                                @if ($query->products_id != $kelas->id && $query->user_id != Auth::user()->id)
                                                                    <span class="harga-kelas"> Harga Kelas </span> <br>
                                                                    <span class="biaya-kelas">Rp. @convert($kelas->harga)</span>
                                                                    <a href="{{ route('checkout.showslug',$kelas->slug) }}" target="_blank" class="btn btn-checkout" style="margin-left:10px; margin-top:-10px;">BELI SEKARANG</a>
                                                                @elseif($query->user_id == Auth::user()->id && $query->products_id == $kelas->id)
                                                                    <button class="btn btn-warning btn-checkout"
                                                                    onclick="event.preventDefault(); location.href='{{ route('play.course',$kelas->slug) }}'" style="margin-left:170px; margin-top:20px;">Lanjut Belajar</button>
                                                                @else($query->products_id != $kelas->id && $query->user_id != Auth::user()->id)
                                                                    <span class="harga-kelas"> Harga Kelas </span> <br>
                                                                    <span class="biaya-kelas">Rp. @convert($kelas->harga)</span>
                                                                    <a href="{{ route('checkout.showslug',$kelas->slug) }}" target="_blank" class="btn btn-checkout" style="margin-left:10px; margin-top:-10px;">BELI SEKARANG</a>
                                                                @endif
                                                            @endif
                                                        @else
                                                            <span class="harga-kelas"> Harga Kelas </span> <br>
                                                            <span class="biaya-kelas">Rp. @convert($kelas->harga)</span>
                                                            <a href="{{ route('checkout.showslug',$kelas->slug) }}" target="_blank" class="btn btn-checkout" style="margin-left:10px; margin-top:-10px;">BELI SEKARANG</a>
                                                        @endif
                                                    @endforeach--}}
                                                </div>
                                            </div>
                                        </div>
                                        {{--</div>--}}
                                    @endif
                                    {{--@else ini untuk yg paket--}}
                                        {{--<div class="jrk-fot">
                                            <span class="harga-kelas"> Harga Kelas </span> <br>
                                            <span class="biaya-kelas">Rp. @convert($kelas->harga)</span>
                                            <span class="span-btn"><button class="btn btn-warning btn-checkout" style="margin-left:30px; margin-top:-10px;">BELI SEKARANG</button></span>
                                        </div>--}}
                                    {{--@endif--}}
                                </div>
                            </div>
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
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <script src="{{ URL::asset('dist/owl.carousel.min.js') }}"></script>
    <script src="{{ URL::asset('mouse/query/jquery.mousewheel.min.js') }}"></script>
    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
    <script>
      AOS.init({
        //  offset:400,
          duration:1000
      });
    </script>


    <script>
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
    </script>

    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script>
        function isAdmin(){
            swal({
                title: "Ups",
                text: "Anda Login Sebagai Admin",
                icon: "error",
            });
        }

        function isMentor(){
            swal({
                title: "Ups",
                text: "Anda Login Sebagai Mentor",
                icon: "error"
            });
        }

        function otwBlog(){
            swal({
                title: "Ups",
                text: "Blog Sedang dalam Masa Pengembangan",
                icon: "warning"
            });
        }

        function beliKelas(){
            swal({
                title: "Ups",
                text: "Ikuti Terlebih Dahulu Kelas Ini",
                icon: "error"
            });
        }

        function pembayaran(){
            swal({
                title: "Bersabar",
                text: "Pembayaran anda Sedang di Proses!",
                icon: "warning"
            });
        }
    </script>

    <script>
        $('.owl-carousel').owlCarousel({
            autoplay:true,
            autoplayHoverPause:true,
            // loop:true,
            margin:10,
            lazyload:true,
            // margin:10,
            // stagePadding:5,
            responsive:{
                0:{

                    items:1,
                    nav:false,
                    dots:true
                },
                480:{
                    items:1,
                    nav:false,
                    dots:true
                },
                600:{
                    items:2,
                    nav:false,
                    dots:true
                },
                1000:{
                    items:3,
                    nav:false,
                    dots:true
                },
                1263:{
                    items:3,
                    nav:false,
                    dots:true
                }
            }
        });
    </script>
  </body>
</html>
