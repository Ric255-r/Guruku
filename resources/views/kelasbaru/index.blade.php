<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ URL::asset('/css/kelasbaru.css') }}">
    <link rel="shortcut icon" sizes="57x57" href="{{ URL::asset('/Foto/favicon.png') }}">
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('dist/assets/owl.carousel.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('dist/assets/owl.theme.default.min.css') }}">
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
    <link rel="stylesheet" href="{{ URL::asset('/slick/slick.css') }}">
    <link rel="stylesheet" type="text/css" href="http://kenwheeler.github.io/slick/slick/slick-theme.css"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css" integrity="sha512-HK5fgLBL+xu6dm/Ii3z4xhlSUyZgTT9tuc/hSrtw6uzJOvgRr2a9jyxxT1ely+B+xFAmJKVSTbpM/CuL7qxO8w==" crossorigin="anonymous" />
    <title>Kelas</title>
  </head>
  <body onload="slicknya()">
    <header class="bck-color">
        @include('navs.navbar2')

        <div class="container-fluid">
            <div class="row text-center">
                <div class="col-lg-12" data-aos="fade-down" data-aos-delay="300">
                    <h2 class="yuk">Yuk Cari Kelas Kesukaanmu</h2>
                    <p class="jgn">Jangan mau kalah dengan yang lainnya. <br>
                        Ayo latih skillmu dan ikuti kelasnya.
                    </p>
                    <form action="{{ route('kelas.search') }}" method="get" class="form-inline justify-content-center">
                        {{--@csrf--}}
                        <input class="form-control active-cyan-4 tipe" style="width:500px;"  type="text" placeholder="Search" name="keyword" id="keyword" value="{{ old('keyword') }}">
                        {{--<button class="btn btn-primary ml-3" style="width:100px;" type="submit">CARI</button>--}}
                    </form>
                </div>
            </div>
            <div class="row mt-5">
                <div class="col-lg-12" data-aos="fade-up" data-aos-delay="300">
                    <ul class="nav nav-pills justify-content-center" role="tablist">
                        <li class="nav-item item-btn-gratis">
                            <a class="btn btn-outline-info mx-2 active btn-gratis" data-toggle="pill" href="#home">
                                <p class="txt-gratis" style="color:white;">Gratis</p>
                            </a>
                        </li>
                        <li class="nav-item">
                        <a class="btn btn-outline-info mx-2 btn-gratis btn-gratis-sm" data-toggle="pill" href="#menu1">
                            <p class="txt-gratis" style="color:white;">Premium</p>
                        </a>
                        </li>
                        {{--<li class="nav-item">
                        <a class="btn btn-outline-light mx-2 btn-gratis" data-toggle="pill" href="#menu2">
                            <p class="txt-paket">Paket</p>
                        </a>
                        </li>--}}
                    </ul>
                </div>
                {{--<div class="col-lg-12 text-center mt-4" style="color: white">
                    <input type="checkbox" id="materi_sd" name="materi[]" value="SD">
                    <label for="">SD</label>
                    <input type="checkbox" id="materi_smp" name="materi[]" value="SMP">
                    <label for="">SMP</label>
                    <input type="checkbox" id="materi_sma" name="materi[]" value="SMA SMK">
                    <label for="">SMA</label>
                    <input type="checkbox" id="materi_semua" name="materi[]" value="Semua Tingkatan">
                    <label for="">Semua Tingkatan</label>
                </div>--}}
            </div>
        </div>
    </header>

    <section class="kategori">
        <div class="container-fluid">
            <div class="row justify-content-center">
                <div class="col-lg-8 pt-3">
                    <div class="slick-kategori">
                        @foreach ($kategori as $query)
                            <div class="item px-2">
                                <a class="btn btn-outline-info btn-kategori media pt-3" href="{{ route('kategori.kelas',$query->slug) }}">
                                    <div class="media-body">
                                        <p>{{ $query->kategori }}</p>
                                    </div>
                                </a>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="row text-center">
                <div class="col-lg-12 mt-4">
                    <div class="form-check form-check-inline">
                        <input type="checkbox" id="materi_sd" name="materi[]" value="SD" class="form-check-input checkbox-materi">
                        <label for="" class="form-check-label pr-3">SD</label>
                        <input type="checkbox" id="materi_smp" name="materi[]" value="SMP" class="form-check-input checkbox-materi">
                        <label for="" class="form-check-label pr-3">SMP</label>
                        <input type="checkbox" id="materi_sma" name="materi[]" value="SMA SMK" class="form-check-input checkbox-materi">
                        <label for="" class="form-check-label pr-3">SMA/SMK</label>
                        <input type="checkbox" id="materi_semua" name="materi[]" value="Semua Tingkatan" class="form-check-input checkbox-materi">
                        <label for="" class="form-check-label">Semua Tingkatan</label>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <!-- Tab panes -->
                    <div class="tab-content">
                        <div id="home" class="container tab-pane active">

                            {{-- kategori lama --}}

                            {{--<div class="row">
                                <div class="col-lg-12 mt-3">
                                    <div class="owl-carousel owl-theme">
                                        @foreach ($kategori as $query)
                                            <div class="item">
                                                <div class="btn btn-outline-info media">
                                                    <div class="media-body">
                                                        <p style="margin-top:-5px; margin-left:5px;">{{ $query->kategori }}</p>
                                                    </div>
                                                    <a href="{{ route('kategori.kelas',$query->slug) }}" class="stretched-link"></a>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>--}}

                            {{--end kategori lama --}}

                            {{-- <div class="row justify-content mt-2">

                            </div> --}}
                            <div class="row justify-content-center mt-2" id="gratis_count">
                                {{--@if(sessi   on('failed'))
                                    <div class="alert alert-danger">
                                        {{ session('failed') }}
                                    </div>
                                @endif--}}
                                @guest
                                    @if ($gratis->count() == 0)
                                        <div class="alert alert-danger">
                                            <h4>Kelas Not Found</h4>
                                        </div>
                                    @else
                                        @foreach ($gratis as $query)
                                            @if ($query->jenis == 'gratis')
                                                @if ($query->status == 'PUBLISH')
                                                    <div class="col-xl-4 col-lg-4 col-md-6 col-sm-9 col-12 mt-3" data-aos="zoom-out-up" data-aos-delay="300">
                                                        <div class="card card-kelas">
                                                            <img src="{{ asset('/storage/'.$query->file) }}" alt="wanita1" class="wanita1 img-fluid">
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
                                                                                $foto = URL::asset('/foto/bintang.png');
                                                                                echo "<span class='rating-jumlah'><img src='".$foto."' height='20' width='20' class='mr-1 mb-1'>" . "0" . "<span class='rating-tutul'> (0) </span>"  . "</span>";
                                                                            }else{
                                                                                $lala = $total / $counter;
                                                                                $foto = URL::asset('/foto/bintang.png');
                                                                                echo "<span class='rating-jumlah'><img src='".$foto."' height='20' width='20' class='mr-1 mb-1'>" . number_format($lala, 1) . "<span class='rating-tutul'> ($counter) </span>" . "</span>";
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
                                            @endif
                                        @endforeach
                                    @endif

                                @endguest


                                @auth
                                    @if (Auth::user()->roles == 'ADMIN' OR Auth::user()->roles == 'MENTOR')
                                        <div class="container">
                                            <div class="row justify-content-center mt-3">
                                                @if ($gratis->count() == 0)
                                                    <div class="alert alert-danger">
                                                        <h4>Kelas Not Found</h4>
                                                    </div>
                                                @else
                                                    @foreach ($gratis as $query)
                                                        @if ($query->jenis == 'gratis')
                                                            @if ($query->status == 'PUBLISH')
                                                                <div class="col-xl-4 col-lg-4 col-md-6 col-sm-9 col-12 mt-3" data-aos="zoom-out-up" data-aos-delay="300">
                                                                    <div class="card card-kelas">
                                                                        <img src="{{ asset('/storage/'.$query->file) }}" alt="wanita1" class="wanita1 img-fluid">
                                                                        <div class="row">
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
                                                        @endif
                                                    @endforeach
                                                @endif
                                            </div>
                                        </div>


                                    @else(Auth::user()->roles == 'USERS')
                                        <div class="container">
                                            <div class="row">
                                                <div class="col-lg-12">
                                                    <p style="color:#1d1d1d; font-size:20px;" class="mt-3">Ayuk lanjut belajar!</p>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-lg-12 slick-sedang-populer">
                                                    @forelse ($join as $query)
                                                        @if ($query->user_id == Auth::user()->id)
                                                            {{--<div class="item px-2">
                                                                <div class="card card-kelas mt-3" data-aos="zoom-out-down" data-aos-delay="300">
                                                                    <div class="card">
                                                                        <img src="{{ asset('/storage/'.$query->product->file) }}" alt="wanita1"
                                                                        class="wanita1 img-fluid"
                                                                        data-toggle="tooltip"
                                                                        title="{{ $query->product->kelas }}">
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
                                                                                            $foto = URL::asset('/foto/bintang.png');
                                                                                            echo "<span class='rating-jumlah'><img src='".$foto."' height='20' width='20' class='mr-1 mb-1'>" . "0" . "<span class='rating-tutul'> (0) </span>"  . "</span>";
                                                                                        }else{
                                                                                            $lala = $total / $counter;
                                                                                            $foto = URL::asset('/foto/bintang.png');
                                                                                            echo "<span class='rating-jumlah'><img src='".$foto."' height='20' width='20' class='mr-1 mb-1'>" . number_format($lala, 1) . "<span class='rating-tutul'> ($counter) </span>" . "</span>";
                                                                                        }
                                                                                    @endphp
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-lg-6">
                                                                                <div class="kategori-baru ml-auto">
                                                                                    {{ $query->product->tingkat }}
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="row pl-3">
                                                                            <div class="col-lg-12">
                                                                                <h5 class="txt-kelas" data-toggle="tooltip" title="{{ $query->product->kelas }}">{{ Str::limit($query->product->kelas,'20') }}</h5>
                                                                                <div class="media" style="margin-top:30px;">
                                                                                    <a href="{{ route('home.mentor.show',$query->product->mentor->kode_mentor) }}" target="_blank">
                                                                                        <img src="{{ @$query->mentor->file != null ? asset('/storage/'.$query->mentor->file) : asset('/Foto/peo2.png') }}"
                                                                                            class="mr-3 img-fluid" style="width:50px; height:50px; border-radius:50px;"
                                                                                            alt="people"
                                                                                            data-toggle="tooltip"
                                                                                            title="{{ $query->product->mentor->name }}"
                                                                                        >
                                                                                    </a>
                                                                                    <div class="media-body txt-mentor">
                                                                                        <h5 class="mt-0 nama-mentor" data-toggle="tooltip" title="{{ $query->product->mentor->name }}">
                                                                                            <a target="_blank"
                                                                                            style="color:#1d1d1d; text-decoration:none;"
                                                                                            href="{{ route('home.mentor.show',$query->product->mentor->kode_mentor) }}">
                                                                                                {{ $query->product->mentor->name }}
                                                                                            </a>
                                                                                        </h5>
                                                                                        <p class="exp">{{ $query->product->mentor->bidang }}</p>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <hr>
                                                                        <div class="col-lg-12">
                                                                            <div class="row">
                                                                                <div class="col-lg-6 col-md-6 col-sm-6 col-12">
                                                                                    <a href="{{ route('play.course',$query->product->slug) }}" class="btn btn-beli btn-block stretched-link">Lanjut Belajar</a>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>--}}
                                                            <div class="item px-2 mt-3" data-aos="zoom-out-up" data-aos-delay="300">
                                                                <div class="card card-kelas">
                                                                    <img src="{{ asset('/storage/'.$query->product->file) }}" alt="wanita1"
                                                                    class="wanita1 img-fluid"
                                                                    data-toggle="tooltip"
                                                                    title="{{ $query->product->kelas }}">
                                                                    <div class="row">
                                                                        <div class="col-lg-12">
                                                                            <div class="kategori-baru mx-auto">
                                                                                {{ $query->product->tingkat }}
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="row pl-3">
                                                                        <div class="col-lg-12">
                                                                            <h5 class="txt-kelas" data-toggle="tooltip" title="{{ $query->product->kelas }}">{{ Str::limit($query->product->kelas,'20') }}</h5>
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
                                                                                <a href="{{ route('home.mentor.show',$query->product->mentor->kode_mentor) }}" target="_blank">
                                                                                    <img src="{{ $query->product->mentor->file != null ? asset('/storage/'.$query->product->mentor->file) : asset('/Foto/peo2.png') }}"
                                                                                        class="mr-3 img-fluid" style="width:50px; height:50px; border-radius:50px;"
                                                                                        alt="people"
                                                                                        data-toggle="tooltip"
                                                                                        title="{{ $query->product->mentor->name }}"
                                                                                    >
                                                                                </a>
                                                                                <div class="media-body txt-mentor">
                                                                                    <h5 class="mt-0 nama-mentor" data-toggle="tooltip" title="{{ $query->product->mentor->name }}">
                                                                                        <a target="_blank"
                                                                                        style="color:#1d1d1d; text-decoration:none;"
                                                                                        href="{{ route('home.mentor.show',$query->product->mentor->kode_mentor) }}">
                                                                                            {{ $query->product->mentor->name }}
                                                                                        </a>
                                                                                    </h5>
                                                                                    <p class="exp">{{ $query->product->mentor->bidang }}</p>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <hr>
                                                                    <div class="col-lg-12">
                                                                        <div class="row">
                                                                            <div class="col-lg-6 col-md-6 col-sm-6 col-12">
                                                                                {{--@if ($query->jenis == 'gratis')
                                                                                    <p class="kelas-gratis">GRATIS</p>
                                                                                @elseif($query->jenis == 'premium')
                                                                                    <p class="hrg-kelas">Rp. @convert($query->harga)</p>
                                                                                @else
                                                                                    <p class="hrg-kelas">Rp. @convert($query->harga)</p>
                                                                                @endif--}}
                                                                            </div>
                                                                            <div class="col-lg-6 col-md-6 col-sm-6 col-12">
                                                                                <a href="{{ route('play.course',$query->product->slug) }}" class="btn btn-lanjut btn-block stretched-link">Lanjut Belajar</a>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        @endif
                                                    @empty
                                                        <div class="container">
                                                            <div class="row">
                                                                <div class="col-lg-12">
                                                                    <p>Yah Kamu belum mempunyai kelas</p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    @endforelse
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-lg-12">
                                                    <p style="color:#1d1d1d; font-size:20px; font-weight:600" class="mt-5">Semua Kelas</p>
                                                </div>
                                            </div>

                                            <div class="row justify-content-center">
                                                @if ($gratis->count() == 0)
                                                    <div class="alert alert-danger">
                                                        <h4>Kelas Not Found</h4>
                                                    </div>
                                                @else

                                                    @foreach ($kelas as $query)
                                                        @if ($query->jenis == 'gratis')
                                                            @if ($query->status == 'PUBLISH')
                                                                <div class="col-xl-4 col-lg-4 col-md-6 col-sm-9 col-12 mt-3" data-aos="zoom-out-up" data-aos-delay="300">
                                                                    <div class="card card-kelas">
                                                                        <img src="{{ asset('/storage/'.$query->file) }}" alt="wanita1"
                                                                        class="wanita1 img-fluid"
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
                                                                                            echo "<span class='rating-jumlah'><img src='".$foto."' height='20' width='20' class='mr-1 mb-1'>" . "0" . "<span class='rating-tutul'> (0) </span>"  . "</span>";
                                                                                        }else{
                                                                                            $lala = $total / $counter;
                                                                                            $foto = URL::asset('/foto/bintang.png');
                                                                                            echo "<span class='rating-jumlah'><img src='".$foto."' height='20' width='20' class='mr-1 mb-1'>" . number_format($lala, 1) . "<span class='rating-tutul'> ($counter) </span>" . "</span>";
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
                                                        @endif
                                                    @endforeach
                                                @endif
                                            </div>
                                        </div>
                                    {{--Halaman Mentor --}}
                                    {{--@else--}}
                                        {{--<div class="container">
                                            <div class="row justify-content-center mt-3">
                                                @if ($gratis->count() == 0)
                                                    <div class="alert alert-danger">
                                                        <h4>Kelas Not Found</h4>
                                                    </div>
                                                @else
                                                    @foreach ($gratis as $query)
                                                        @if ($query->jenis == 'gratis')
                                                            @if ($query->status == 'PUBLISH')
                                                                <div class="col-xl-4 col-lg-4 col-md-6 col-sm-9 col-12 mt-3" data-aos="zoom-out-up" data-aos-delay="300">
                                                                    <div class="card card-kelas">
                                                                        <img src="{{ asset('/storage/'.$query->file) }}" alt="wanita1"
                                                                        class="wanita1 img-fluid"
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
                                                                                            $foto = URL::asset('/foto/bintang.png');
                                                                                            echo "<span class='rating-jumlah'><img src='".$foto."' height='20' width='20' class='mr-1 mb-1'>" . "0" . "<span class='rating-tutul'> (0) </span>"  . "</span>";
                                                                                        }else{
                                                                                            $lala = $total / $counter;
                                                                                            $foto = URL::asset('/foto/bintang.png');
                                                                                            echo "<span class='rating-jumlah'><img src='".$foto."' height='20' width='20' class='mr-1 mb-1'>" . number_format($lala, 1) . "<span class='rating-tutul'> ($counter) </span>" . "</span>";
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
                                                        @endif
                                                    @endforeach
                                                @endif
                                            </div>
                                        </div>--}}
                                    @endif
                                @endauth
                            </div>
                        </div>
                        {{-- </div> --}}

                        {{-- bagian bayar --}}
                        <div id="menu1" class="container tab-pane fade">
                            <div class="row justify-content-center mt-2" id="bayar_count">
                                @guest
                                    @if ($bayar->count() == 0)
                                        <div class="alert alert-danger">
                                            <h4>Kelas Not Found</h4>
                                        </div>
                                    @else
                                        @foreach ($bayar as $query)
                                            @if ($query->jenis == 'premium')
                                                @if ($query->status == 'PUBLISH')
                                                    <div class="col-xl-4 col-lg-4 col-md-6 col-sm-9 col-12 mt-3" data-aos="zoom-out-up" data-aos-delay="300">
                                                        <div class="card card-kelas">
                                                            <img src="{{ asset('/storage/'.$query->file) }}" alt="wanita1"
                                                            class="wanita1 img-fluid"
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
                                                                                echo "<span class='rating-jumlah'><img src='".$foto."' height='20' width='20' class='mr-1 mb-1'>" . "0" . "<span class='rating-tutul'> (0) </span>"  . "</span>";
                                                                            }else{
                                                                                $lala = $total / $counter;
                                                                                $foto = URL::asset('/foto/bintang.png');
                                                                                echo "<span class='rating-jumlah'><img src='".$foto."' height='20' width='20' class='mr-1 mb-1'>" . number_format($lala, 1) . "<span class='rating-tutul'> ($counter) </span>" . "</span>";
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
                                                                        {{--<a href="{{ route('kelas.show',$query->id) }}" class="btn btn-beli btn-block stretched-link">Daftar Kelas</a>--}}
                                                                        <a href="{{ route('kelas.show',$query->slug) }}" class="btn btn-beli btn-block stretched-link">Daftar Kelas</a>
                                                                    @elseif($query->jenis == 'premium')
                                                                        {{--<a href="{{ route('kelas.show',$query->id) }}" class="btn btn-beli btn-block stretched-link">Beli kelas</a>--}}
                                                                        <a href="{{ route('kelas.show',$query->slug) }}" class="btn btn-beli btn-block stretched-link">Beli kelas</a>
                                                                    @else
                                                                        {{--<a href="{{ route('kelas.show',$query->id) }}" class="btn btn-beli btn-block stretched-link">Beli kelas</a>--}}
                                                                        <a href="{{ route('kelas.show',$query->slug) }}" class="btn btn-beli btn-block stretched-link">Beli kelas</a>
                                                                    @endif
                                                                </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endif
                                                {{--@else
                                                <div class="alert alert-danger">
                                                    <h4>Kelas Not Found</h4>
                                                </div>--}}
                                            @endif
                                        @endforeach
                                    @endif
                                @endguest


                                @auth
                                    @if (Auth::user()->roles == 'ADMIN' OR Auth::user()->roles == 'MENTOR')
                                        <div class="container">
                                            <div class="row justify-content-center mt-3">
                                                @if ($bayar->isEmpty())
                                                    <div class="alert alert-danger">
                                                        <h4>Kelas Not Found</h4>
                                                    </div>
                                                @else
                                                    @foreach ($bayar as $query)
                                                        @if ($query->jenis == 'premium')
                                                            @if ($query->status == 'PUBLISH')
                                                                <div class="col-xl-4 col-lg-4 col-md-6 col-sm-9 col-12 mt-3" data-aos="zoom-out-up" data-aos-delay="300">
                                                                    <div class="card card-kelas">
                                                                        <img src="{{ asset('/storage/'.$query->file) }}" alt="wanita1"
                                                                        class="wanita1 img-fluid"
                                                                        data-toggle="tooltip"
                                                                        title="{{ $query->kelas }}">
                                                                        <div class="row">
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
                                                                                    {{--<a href="{{ route('kelas.show',$query->id) }}" class="btn btn-beli btn-block stretched-link">Daftar Kelas</a>--}}
                                                                                    <a href="{{ route('kelas.show',$query->slug) }}" class="btn btn-beli btn-block stretched-link">Daftar Kelas</a>
                                                                                @elseif($query->jenis == 'premium')
                                                                                    {{--<a href="{{ route('kelas.show',$query->id) }}" class="btn btn-beli btn-block stretched-link">Beli kelas</a>--}}
                                                                                    <a href="{{ route('kelas.show',$query->slug) }}" class="btn btn-beli btn-block stretched-link">Beli kelas</a>
                                                                                @else
                                                                                    {{--<a href="{{ route('kelas.show',$query->id) }}" class="btn btn-beli btn-block stretched-link">Beli kelas</a>--}}
                                                                                    <a href="{{ route('kelas.show',$query->slug) }}" class="btn btn-beli btn-block stretched-link">Beli kelas</a>
                                                                                @endif
                                                                            </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            @endif
                                                        @endif
                                                    @endforeach
                                                @endif
                                            </div>
                                        </div>

                                    @else(Auth::user()->roles == 'USERS')

                                        <div class="container">
                                            <div class="row">
                                                <div class="col-lg-12">
                                                    <div class="row">
                                                        <div class="col-lg-12">
                                                            <p style="color:#464646; font-size:20px; font-weight:600" class="mt-3">Ayuk lanjut belajar!</p>
                                                        </div>
                                                    </div>
                                                </div>
                                                @forelse ($user as $query)
                                                    @if ($query->user_id == Auth::user()->id && $query->transaction->transaction_status == 'SUCCESS')
                                                        <div class="col-xl-4 col-lg-4 col-md-6 col-sm-9 col-12 mt-3" data-aos="zoom-out-down" data-aos-delay="300">
                                                            <div class="card card-kelas">
                                                                <img src="{{ asset('/storage/'.$query->product->file) }}" alt="wanita1"
                                                                class="wanita1 img-fluid"
                                                                data-toggle="tooltip"
                                                                title="{{ $query->product->kelas }}">
                                                                <div class="row">
                                                                    <div class="col-lg-12">
                                                                        <div class="kategori-baru mx-auto">
                                                                            {{ $query->product->tingkat }}
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="row pl-3">
                                                                    <div class="col-lg-12">
                                                                        <h5 class="txt-kelas" data-toggle="tooltip" title="{{ $query->product->kelas }}">{{ Str::limit($query->product->kelas,'20') }}</h5>
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
                                                                            <a href="{{ route('home.mentor.show',$query->product->mentor->kode_mentor) }}" target="_blank">
                                                                                <img src="{{ @$query->mentor->file != null ? asset('/storage/'.$query->mentor->file) : asset('/Foto/peo2.png') }}"
                                                                                    class="mr-3 img-fluid" style="width:50px; height:50px; border-radius:50px;"
                                                                                    alt="people"
                                                                                    data-toggle="tooltip"
                                                                                    title="{{ $query->product->mentor->name }}"
                                                                                >
                                                                            </a>
                                                                            <div class="media-body txt-mentor">
                                                                                <h5 class="mt-0 nama-mentor" data-toggle="tooltip" title="{{ $query->product->mentor->name }}">
                                                                                    <a target="_blank"
                                                                                    style="color:#1d1d1d; text-decoration:none;"
                                                                                    href="{{ route('home.mentor.show',$query->product->mentor->kode_mentor) }}">
                                                                                        {{ $query->product->mentor->name }}
                                                                                    </a>
                                                                                </h5>
                                                                                <p class="exp">{{ $query->product->mentor->bidang }}</p>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <hr>
                                                                <div class="col-lg-12">
                                                                    <div class="row">
                                                                    <div class="col-lg-6 col-md-6 col-sm-6 col-12">
                                                                        {{--@if ($query->product->jenis == 'gratis')
                                                                            <p class="kelas-gratis">GRATIS</p>
                                                                        @elseif($query->product->jenis == 'premium')
                                                                            <p class="hrg-kelas">Rp. @convert($query->product->harga)</p>
                                                                        @else
                                                                            <p class="hrg-kelas">Rp. @convert($query->product->harga)</p>
                                                                        @endif--}}
                                                                    </div>
                                                                    <div class="col-lg-6 col-md-6 col-sm-6 col-12">
                                                                        <a href="{{ route('play.course',$query->product->slug) }}" class="btn btn-beli btn-block stretched-link">Lanjut Belajar</a>
                                                                        {{--@if ($query->product->jenis == 'gratis')
                                                                            <a href="{{ route('kelas.show',$query->product->slug) }}" class="btn btn-beli btn-block stretched-link">Daftar Kelas</a>
                                                                        @elseif($query->jenis == 'premium')
                                                                            <a href="{{ route('kelas.show',$query->product->slug) }}" class="btn btn-beli btn-block stretched-link">Beli kelas</a>
                                                                        @else
                                                                            <a href="{{ route('kelas.show',$query->product->slug) }}" class="btn btn-beli btn-block stretched-link">Beli kelas</a>
                                                                        @endif--}}
                                                                    </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    @endif

                                                @empty
                                                        <div class="container">
                                                            <div class="row">
                                                                <div class="col-lg-12">
                                                                    <p>Yah kamu belum ada kelas premium!</p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                @endforelse
                                            </div>

                                            <div class="row">
                                                <div class="col-lg-12">
                                                    <p style="color:#1d1d1d; font-size:20px; font-weight:600" class="mt-5">Semua Kelas</p>
                                                </div>
                                            </div>
                                            <div class="row justify-content-center">
                                                @if ($bayar->count() == 0)
                                                    <div class="alert alert-danger">
                                                        <h4>Kelas Not Found</h4>
                                                    </div>
                                                @else
                                                    @foreach ($bayar as $query)
                                                        @if ($query->jenis == 'premium')
                                                            @if ($query->status == 'PUBLISH')
                                                                <div class="col-xl-4 col-lg-4 col-md-6 col-sm-9 col-12 mt-3" data-aos="zoom-out-up" data-aos-delay="300">
                                                                    <div class="card card-kelas">
                                                                        <img src="{{ asset('/storage/'.$query->file) }}" alt="wanita1"
                                                                        class="wanita1 img-fluid"
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
                                                                                            echo "<span class='rating-jumlah'><img src='".$foto."' height='20' width='20' class='mr-1 mb-1'>" . "0" . "<span class='rating-tutul'> (0) </span>"  . "</span>";
                                                                                        }else{
                                                                                            $lala = $total / $counter;
                                                                                            $foto = URL::asset('/foto/bintang.png');
                                                                                            echo "<span class='rating-jumlah'><img src='".$foto."' height='20' width='20' class='mr-1 mb-1'>" . number_format($lala, 1) . "<span class='rating-tutul'> ($counter) </span>" . "</span>";
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
                                                                                    {{--<a href="{{ route('kelas.show',$query->id) }}" class="btn btn-beli btn-block stretched-link">Daftar Kelas</a>--}}
                                                                                    <a href="{{ route('kelas.show',$query->slug) }}" class="btn btn-beli btn-block stretched-link">Daftar Kelas</a>
                                                                                @elseif($query->jenis == 'premium')
                                                                                    {{--<a href="{{ route('kelas.show',$query->id) }}" class="btn btn-beli btn-block stretched-link">Beli kelas</a>--}}
                                                                                    <a href="{{ route('kelas.show',$query->slug) }}" class="btn btn-beli btn-block stretched-link">Beli kelas</a>
                                                                                @else
                                                                                    {{--<a href="{{ route('kelas.show',$query->id) }}" class="btn btn-beli btn-block stretched-link">Beli kelas</a>--}}
                                                                                    <a href="{{ route('kelas.show',$query->slug) }}" class="btn btn-beli btn-block stretched-link">Beli kelas</a>
                                                                                @endif
                                                                            </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            @endif
                                                        @endif
                                                    @endforeach
                                                @endif
                                            </div>
                                        </div>

                                    {{--Halaman Mentor --}}
                                    {{--@else
                                        <div class="container">
                                            <div class="row justify-content-center mt-3">
                                                @if ($bayar->count() == 0)
                                                    <div class="alert alert-danger">
                                                        <h4>Kelas Not Found</h4>
                                                    </div>
                                                @else
                                                    @foreach ($bayar as $query)
                                                        @if ($query->jenis == 'premium')
                                                            @if ($query->status == 'PUBLISH')
                                                                <div class="col-xl-4 col-lg-4 col-md-6 col-sm-9 col-12 mt-3" data-aos="zoom-out-up">
                                                                    <div class="card card-kelas">
                                                                        <img src="{{ asset('/storage/'.$query->file) }}" alt="wanita1"
                                                                        class="wanita1 img-fluid"
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
                                                                                            $foto = URL::asset('/foto/bintang.png');
                                                                                            echo "<span class='rating-jumlah'><img src='".$foto."' height='20' width='20' class='mr-1 mb-1'>" . "0" . "<span class='rating-tutul'> (0) </span>"  . "</span>";
                                                                                        }else{
                                                                                            $lala = $total / $counter;
                                                                                            $foto = URL::asset('/foto/bintang.png');
                                                                                            echo "<span class='rating-jumlah'><img src='".$foto."' height='20' width='20' class='mr-1 mb-1'>" . number_format($lala, 1) . "<span class='rating-tutul'> ($counter) </span>" . "</span>";
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
                                                        @endif
                                                    @endforeach
                                                @endif
                                            </div>
                                        </div>--}}
                                    @endif




                                    {{--ini yang awal --}}
                                    {{--@foreach ($bayar as $query)
                                    <div class="col-xl-4 col-lg-4 col-md-6 col-sm-9 col-12 mt-3">
                                        <div class="card card-kelas">
                                            <img src="{{ asset('/storage/'.$query->file) }}" alt="wanita1" class="wanita1 img-fluid">
                                            <div class="kategori-baru ml-auto">
                                                {{ $query->tingkat }}
                                            </div>
                                            <div class="col-lg-12">
                                                <h5 class="txt-kelas">{{ Str::limit($query->kelas,'20') }}</h5>
                                                <div class="media" style="margin-top:30px;">
                                                <img src="{{ URL::asset('/imgbaru/peo.png') }}" class="mr-3 img-fluid" style="width:50px;" alt="people">
                                                <div class="media-body txt-mentor">
                                                    <h5 class="mt-0 nama-mentor">{{ $query->mentor->nama }}</h5>
                                                    <p class="exp">{{ $query->mentor->bidang }}</p>
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
                                    @endforeach--}}
                                @endauth
                            </div>
                        </div>

                        {{-- bagian paket --}}
                        <div id="menu2" class="container tab-pane fade">
                            <div class="row">
                                <div class="col-lg-12 mt-3">
                                    {{-- <h3>HO</h3> --}}
                                    <div class="owl-carousel owl-theme">
                                        @foreach ($kategori as $query)
                                            <div class="item">
                                                <div class="btn btn-outline-info media">
                                                    {{-- <img src="{{ URL::asset('/img/math.png') }}" style="width:35px; " alt="mntp"> --}}
                                                    <div class="media-body">
                                                        <p style="margin-top:-5px; margin-left:5px;">{{ $query->kategori }}</p>
                                                        {{-- <p style="margin-top:-20px; margin-left:5px;">{{ $copa }} Kelas</p> --}}
                                                    </div>
                                                    <a href="{{ route('kategori.kelas',$query->slug) }}" class="stretched-link"></a>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                            <div class="row mx-auto mt-3">
                                @forelse($paket as $query)
                                <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 col-12 mt-3">
                                    {{-- <div class="col-lg-12"> --}}
                                        <div class="card ktk-card bsr-kotak2">
                                            <img src="{{ URL::asset('/adminkelasbaru/'.$query->file) }}" class="card-img-top semua-kelas" height="120px"
                                            alt="...">
                                            <div class="card-body">
                                                <h5 class="card-title mapel">{{ Str::limit($query->kelas,'14') }}</h5>
                                                <span class="card-text pemula">{{ $query->tingkat }}</span>
                                                <span class="badge badge-danger jenis" style="float:right; font-style:italic; background-color:#FDD8D8; color:#F73D3D;">{{ $query->jenis }}</span>
                                                <hr>
                                                <div class="media">
                                                    <img src="{{ URL::asset('img/peo.png') }}"
                                                    style="width:50px; height:50px; margin-left:0px; margin-top:-10px ;"
                                                    class="" alt="">
                                                    <div class="media-body ml-3">
                                                        <p class="vet-terbaru">Avet</p>
                                                        <p class="ex-terbaru">Expert Matematika</p>
                                                    </div>
                                                </div>
                                            <a href="{{ route('kelas.show', $query->id) }}" class="stretched-link"></a>
                                            </div>
                                        </div>
                                    {{-- </div> --}}
                                </div>
                                @empty
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <p class="text-center">Yah blm ada kelasnya</p>
                                        </div>
                                    </div>
                                @endforelse
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


    {{-- percobaan  --}}
    {{-- {{ $video->products_id }} --}}
    {{-- @foreach ($video as $query)
        <p>{{ $query->kelas }}</p>
    @endforeach
    <div id="accordion">
        @foreach ($video as $query)
            <div class="card">
                @if ($query->is_default == 1)
                    <div class="card-header" id="headingOne">
                        <h5 class="mb-0">
                        <button class="btn btn-link" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                            {{ $query->nama_video }}
                        </button>
                        </h5>
                    </div>
                @endif
            <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion">
                <div class="card-body">
                    @if ($query->is_default == 0)
                        {{ $query->is_default }}
                    @endif
                </div>
            </div>
            </div>
        @endforeach
        <div class="card">
          <div class="card-header" id="headingTwo">
            <h5 class="mb-0">
              <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                Collapsible Group Item #2
              </button>
            </h5>
          </div>
          <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">
            <div class="card-body">
              Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
            </div>
          </div>
        </div>
      </div> --}}

      {{--footer --}}
        @include('includes.footer')
      {{--end footer --}}


    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
    {{--<script src="https://code.jquery.com/jquery-3.5.0.js"></script>--}}
    {{--<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>--}}
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <script src="{{ URL::asset('dist/owl.carousel.min.js') }}"></script>
    <script src="{{ URL::asset('mouse/query/jquery.mousewheel.min.js') }}"></script>
    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
    <script src="{{ URL::asset('/slick/slick.js') }}"></script>
    <script>
      AOS.init({
        //  offset:400,
          duration:1000
      });
    </script>

    <script>
        // $('input[name=materi_tingkat]').change(function(){
        //     var sList = "";
        //     $('input[name=materi_tingkat]').each(function () {
        //         // sList += "(" + $(this).val() + "-" + (this.checked ? "checked" : "not checked") + ")";
        //         if(this.checked){
        //             sList += $(this).val();
        //         }
        //     });
        //     console.log (sList);
        // });

        function slicknya(){
            $('.slick-sedang-populer').slick({
                dots: true,
                infinite: false,
                speed: 300,
                slidesToShow:3,
                slidesToScroll:1,
                //arrows:true,
                autoplay:true,
                responsive: [
                    {
                        breakpoint: 1200,
                        settings: {
                            slidesToShow: 2.5,
                            slidesToScroll: 1,
                            infinite: false,
                            dots: true,
                            //arrows:true,
                            //autoplay:true
                        }
                    },
                    {
                        breakpoint: 1100,
                        settings: {
                            slidesToShow: 2.5,
                            slidesToScroll: 1,
                            infinite: false,
                            dots: true,
                            //arrows:true,
                            //autoplay:true
                        }
                    },
                    {
                        breakpoint: 1024,
                        settings: {
                            slidesToShow: 2,
                            slidesToScroll: 1,
                            infinite: false,
                            dots: true,
                            //arrows:true
                        }
                    },
                    {
                        breakpoint: 982,
                        settings: {
                            slidesToShow: 2.1,
                            slidesToScroll: 1,
                            infinite: false,
                            dots: true,
                            //arrows:true
                        }
                    },
                    {
                        breakpoint: 770,
                        settings: {
                            slidesToShow: 1.5,
                            slidesToScroll: 1,
                            infinite: false,
                            dots: true,
                            //arrows:true,
                        }
                    },
                    {
                        breakpoint: 620,
                        settings: {
                            slidesToShow: 1.1,
                            slidesToScroll: 1,
                            infinite: false,
                            dots: true,
                            //arrows:true,
                        }
                    },
                    {
                        breakpoint: 480,
                        settings: {
                            slidesToShow: 1.1,
                            slidesToScroll: 1,
                            infinite: false,
                            dots: true,
                            //arrows:true,
                        }
                    },
                    {
                        breakpoint: 410,
                        settings: {
                            slidesToShow: 1,
                            slidesToScroll: 1,
                            infinite: false,
                            dots: true,
                            //arrows:true,
                        }
                    },
                ]
            });

            $('.slick-kategori').slick({
                dots: false,
                infinite: false,
                speed: 300,
                slidesToShow:3.5,
                slidesToScroll:1,
                arrows:false,
                autoplay:true,
                responsive: [
                    {
                        breakpoint: 1100,
                        settings: {
                            slidesToShow: 3.1,
                            slidesToScroll: 1,
                            infinite: false,
                            dots: false,
                            arrows:false,
                            //autoplay:true
                        }
                    },
                    {
                        breakpoint: 1024,
                        settings: {
                            slidesToShow: 2,
                            slidesToScroll: 1,
                            infinite: false,
                            dots: false,
                            arrows:false
                        }
                    },
                    {
                        breakpoint: 982,
                        settings: {
                            slidesToShow: 2.5,
                            slidesToScroll: 1,
                            infinite: false,
                            dots: false,
                            arrows:false
                        }
                    },
                    {
                        breakpoint: 770,
                        settings: {
                            slidesToShow: 2.1,
                            slidesToScroll: 1,
                            infinite: false,
                            dots: false,
                            arrows:false,
                        }
                    },
                    {
                        breakpoint: 620,
                        settings: {
                            slidesToShow: 1.5,
                            slidesToScroll: 1,
                            infinite: false,
                            dots: false,
                            arrows:false,
                        }
                    },
                    {
                        breakpoint: 480,
                        settings: {
                            slidesToShow: 1.1,
                            slidesToScroll: 1,
                            infinite: false,
                            dots: false,
                            arrows:false,
                        }
                    },
                    {
                        breakpoint: 370,
                        settings: {
                            slidesToShow: 1,
                            slidesToScroll: 1,
                            infinite: false,
                            dots: false,
                            arrows:false,
                        }
                    },
                ]
            });
        }

        //$('.left').click(function(){
        //    $('.slick-kelas').slick('slickPrev');
        //});

        //$('.right').click(function(){
        //    $('.slick-kelas').slick('slickNext');
        //});

        $(document).ready(function(){
    		$('.card-kelas').hover(
    			function(){
    				$(this).animate({
    					marginTop: '-=1%',
    				},200);
    			},
    			function(){
    				$(this).animate({
    					marginTop: '0%'
    				});
    			}
    		);

            var sd = null, smp = null, sma_smk = null, semua = null;
            var getsd = document.getElementById("materi_sd");
            var getsmp = document.getElementById("materi_smp");
            var getsma_smk = document.getElementById("materi_sma");
            var getsemua = document.getElementById("materi_semua");

            $('#materi_sd').change(function(){
                if ($(this).is(':checked')) {
                    sd = $(this).val();
                    ambildata();
                } else {
                    sd = null;
                    ambildata();
                }
            });

            $('#materi_smp').change(function(){
                if ($(this).is(':checked')) {
                    smp = $(this).val();
                    ambildata();
                } else {
                    smp = null;
                    ambildata();
                }
            });

            $('#materi_sma').change(function(){
                if ($(this).is(':checked')) {
                    sma_smk = $(this).val();
                    ambildata();
                } else {
                    sma_smk = null;
                    ambildata();
                }
            });

            $('#materi_semua').change(function(){
                if ($(this).is(':checked')) {
                    semua = $(this).val();
                    ambildata();
                } else {
                    semua = null;
                    ambildata();
                }
            });

            // $('#materi_tingkatan').click(function(){
            //     // var val = [];
            //     // $(':checkbox:checked').each(function(i){
            //     //     // val[i] = $(this).val();
            //     //     val.push({ 'item': $(this).val() });
            //     // });
            //     // console.log(val);

            //     // let xhttp = new XMLHttpRequest();
            //     // xhttp.onreadystatechange = function(){
            //     //     if(this.readyState == 4 && this.status == 200){
            //     //         let parser = new DOMParser();
            //     //         let xmlDoc = parser.parseFromString(responseText, "text/xml");
            //     //         let tds = xmlDoc.getElementById('kelgratis');

            //     //         document.getElementById('gratis_count').innerHTML = tds;
            //     //     }
            //     // };
            //     // xhttp.open('GET', '{{ route('kelas.materi') }}?materinya=['+val+']', true);
            //     // xhttp.send();



            //     // if(getsmp.checked){
            //     //     smp = getsmp.value;
            //     // }else{
            //     //     smp = null;
            //     // }

            //     // if(getsma_smk.checked){
            //     //     sma_smk = getsma_smk.value;
            //     // }else{
            //     //     sma_smk = null;
            //     // }

            //     // if(getsemua.checked){
            //     //     semua = getsemua.value;
            //     // }else{
            //     //     semua = null;
            //     // }

            //     // ambildata();
            // });

            function ambildata(){
                let xhttp = new XMLHttpRequest();
                xhttp.onreadystatechange = function(){
                    if(this.readyState == 4 && this.status == 200){
                        let parser = new DOMParser();
                        let xmlDoc = parser.parseFromString(xhttp.responseText, "text/html");
                        let tds = xmlDoc.getElementById('kelgratis').innerHTML;
                        let tdsbayar = xmlDoc.getElementById('kelbayar').innerHTML;

                        document.getElementById('gratis_count').innerHTML = tds;
                        document.getElementById('bayar_count').innerHTML = tdsbayar;
                        slicknya();
                    }
                };
                xhttp.open('GET', '{{ route('kelas.materi') }}?materi_sd='+sd+'&materi_smp='+smp+'&materi_sma='+sma_smk+'&semua='+semua, true);
                xhttp.send();
            }
    	});
    </script>

    {{--<script>
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
                    items:4,
                    nav:false,
                    dots:false
                }
            }
        });
    </script>--}}

  </body>
</html>
