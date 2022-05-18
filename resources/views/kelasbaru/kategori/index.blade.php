<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="shortcut icon" sizes="57x57" href="{{ URL::asset('/Foto/favicon.png') }}">
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('dist/assets/owl.carousel.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('dist/assets/owl.theme.default.min.css') }}">
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
    <link rel="stylesheet" href="{{ URL::asset('/slick/slick.css') }}">
    <link rel="stylesheet" type="text/css" href="http://kenwheeler.github.io/slick/slick/slick-theme.css"/>
    <link rel="stylesheet" href="{{ URL::asset('/css/kelasbaru.css') }}">
    <title>{{ $kategori->kategori }}</title>
    <style>
        /*.rating-jumlah{
            color:#f8f8f8;
            display: inline;
        }
        .rating-baru{
            margin-top:-25px;
            margin-left:10px;
        }
        .rating-tutul{
            color:#f2f2f2;
        }*/
    </style>
  </head>
  <body onload="carouselnya()">
    <header class="bck-color">
        @include('navs.navbar2')

        <div class="container-fluid">
            <div class="row text-center">
                <div class="col-lg-12" data-aos="fade-down">
                    <h2 class="yuk">Kursus tentang <br> "{{ $kategori->kategori }}"</h2>
                    <form action="{{ route('kelas.search') }}" method="get" class="form-inline justify-content-center mt-3">
                        <input class="form-control active-cyan-4 tipe" style="width:500px;"  type="text" placeholder="Search" aria-label="Search" name="keyword" id="keyword" value="{{old('keyword')}}">
                        {{-- <button class="btn btn-primary ml-3" style="width:100px;" type="submit">CARI</button> --}}
                    </form>
                </div>
            </div>
            <div class="row mt-5">
                <div class="col-lg-12">
                    <ul class="nav nav-pills justify-content-center" role="tablist">
                        <li class="nav-item">
                            <a class="btn btn-outline-info mx-2 active btn-gratis" data-toggle="pill" href="#home">
                                <p class="txt-gratis">Gratis</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="btn btn-outline-info mx-2 btn-gratis btn-gratis-sm" data-toggle="pill" href="#menu1">
                                <p class="txt-gratis">Premium</p>
                            </a>
                        </li>
                        {{--<li class="nav-item">
                        <a class="btn btn-outline-light mx-2 btn-gratis" data-toggle="pill" href="#menu2">
                            <p class="txt-paket">Paket</p>
                        </a>--}}
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </header>

    <main>
        <section class="topik">
            <div class="container mt-2">
                <div class="row text-center" data-aos="fade-up" data-aos-delay="300">
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
                <div class="row mt-2">
                    <div class="col-lg-12">
                        <p class="txt-kategori">Topik populer tentang {{ $kategori->kategori }}</p>
                    </div>
                </div>
                <div class="row justify-content-center">
                    <div class="col-lg-12 pt-3">
                        <div class="slick-topik">
                            @foreach ($topik as $query)
                                <div class="item px-2">
                                    <a class="btn btn-outline-info btn-kategori media pt-3" href="{{ route('kelas.topik',$query->slug) }}">
                                        <div class="media-body">
                                            <p>{{ $query->topik }}</p>
                                        </div>
                                    </a>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="kategori">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <!-- Tab panes -->
                        <div class="tab-content">
                            <div id="home" class="container tab-pane active">
                                <div class="row">
                                    <div class="col-lg-12 mt-3">
                                        <p class="txt-kategori">Sedang Popular</p>
                                        <div id="muridgrat1">
                                            <div class="owl-carousel owl-theme carousel-popular">
                                                @foreach ($muridgrat as $query)
                                                    <div class="item item-kelas mt-lg-0 mt-md-3 mt-sm-3 mt-3" data-aos="zoom-out-up">
                                                        <div class="card card-kelas mx-2">
                                                            <img src="{{ asset('/storage/'.$query->file) }}" alt="wanita1"
                                                            class="wanita1"
                                                            data-toggle="tooltip"
                                                            title="{{ $query->kelas }}" />
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
                                                                                    $foto = URL::asset('/Foto/bintang.png');
                                                                                    echo "<span class='rating-jumlah'><img src='".$foto."' class='bintang-carousel d-inline mr-1 mb-1'>" . "0" . "<span class='rating-tutul'> (0) </span>"  . "</span>";
                                                                                }else{
                                                                                    $lala = $total / $counter;
                                                                                    $foto = URL::asset('/Foto/bintang.png');
                                                                                    echo "<span class='rating-jumlah'><img src='".$foto."' class='bintang-carousel d-inline mr-1 mb-1'>" . number_format($lala, 1) . "<span class='rating-tutul'> ($counter) </span>" . "</span>";
                                                                                }
                                                                            @endphp
                                                                        </div>
                                                                    </div>--}}
                                                                    <div class="col-lg-12">
                                                                        <div class="kategori-baru mx-auto" id="kategoribaru">
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
                                                                        {{-- <span>
                                                                            <img src="{{ asset('/Foto/bintang.png') }}" alt="bintang" class="img-fluid d-inline vertical-align-center" style="margin-top:-5px; width:20px; height:20px;">
                                                                        </span>
                                                                        <span class="rating-jumlah"> 4.7 <span class="rating-total"> (20) </span> </span> --}}
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
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                {{--Kelas Terbaru --}}
                                <div class="row">
                                    <div class="col-lg-12 mt-3">
                                        <p class="txt-kategori">Kelas Terbaru</p>
                                        <div id="terbarugrat1">
                                            <div class="owl-carousel owl-theme carousel-terbaru">
                                                @foreach ($terbarugrat as $query)
                                                    <div class="item px-2" data-aos="zoom-out-down">
                                                        <div class="card">
                                                            <div class="row">
                                                                <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 col-12">
                                                                    <a href="{{ route('kelas.show',$query->slug) }}">
                                                                        <img src="{{ asset('/storage/'.$query->file) }}"
                                                                            class="mx-xl-2 mx-lg-2 mt-xl-2 mt-lg-2 img-terbaru img-fluid"
                                                                            data-toggle="tooltip" title="{{ $query->kelas }}">
                                                                    </a>
                                                                </div>
                                                                <div class="col-xl-8 col-lg-8 col-md-12 col-sm-12 col-12 mx-xl-0 mx-lg-0 mx-md-3 mx-sm-3 mx-3">
                                                                    <span class="badge badge-success jenis-terbaru mr-xl-1 mr-lg-4 mr-md-4 mr-sm-4 mr-4" style="float:right;">
                                                                        {{ $query->jenis }}
                                                                    </span>
                                                                    <p class="matpel" data-toggle="tooltip" title="{{ $query->kelas }}">
                                                                        <a href="{{ route('kelas.show',$query->slug) }}" style="color:#333333;">
                                                                            {{ Str::limit($query->kelas,'13') }}
                                                                        </a>
                                                                    </p>
                                                                    <p class="waktu-buat">{{ $query->created_at->toDateString() }} / {{ $query->tingkat }}</p>
                                                                    <div class="media">
                                                                        <a href="{{ route('home.mentor.show',$query->mentor->kode_mentor) }}" target="_blank">
                                                                            <img src="{{ $query->mentor->file != null ? asset('/storage/'.$query->mentor->file) : asset('/Foto/peo2.png') }}"
                                                                                style="width:50px; height:50px; border-radius:50px;"
                                                                                class="people-terbaru" alt="" data-toggle="tooltip" title="{{ $query->mentor->name }}">
                                                                        </a>
                                                                        <div class="media-body ml-3">
                                                                            <p class="vet-terbaru" data-toggle="tooltip" title="{{ $query->mentor->name }}">
                                                                                <a href="{{ route('home.mentor.show',$query->mentor->kode_mentor) }}" target="_blank"
                                                                                    style="color:#1d1d1d; text-decoration:none;">
                                                                                    {{ $query->mentor->name }}
                                                                                </a>
                                                                            </p>
                                                                            <p class="ex-terbaru">{{ $query->mentor->bidang }}</p>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                {{--<a href="{{ route('kelas.show',$query->slug) }}" class="stretched-link"></a>--}}
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-12 mt-3">
                                        <p class="txt-kategori">Semua kelas</p>
                                    </div>
                                </div>

                                <div id="semuagrat1">

                                    <div class="row justify-content-center">
                                        @foreach ($gratis as $query)
                                            {{--@if ($query->jenis == 'gratis')--}}
                                                <div class="col-xl-4 col-lg-4 col-md-6 col-sm-9 col-12 mt-3" data-aos="zoom-out-up">
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
                                                                {{-- <span>
                                                                    <img src="{{ asset('/Foto/bintang.png') }}" alt="bintang" class="img-fluid d-inline vertical-align-center" style="margin-top:-5px; width:20px; height:20px;">
                                                                </span>
                                                                <span class="rating-jumlah"> 4.7 <span class="rating-total"> (20) </span> </span> --}}
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
                                                {{--@else
                                                <div class="alert alert-danger">
                                                    <h4>Kelas Not Found</h4>
                                                </div>--}}
                                            {{--@endif--}}
                                        @endforeach
    
                                        {{ $gratis->links() }}
                                    </div>
                                </div>

                            </div>
                            {{-- </div> --}}

                            {{-- PREMIUM  --}}
                            <div id="menu1" class="container tab-pane fade buatbayaran">
                                <div class="row">
                                    <div class="col-lg-12 mt-3">
                                        <p class="txt-kategori">Sedang Popular</p>
                                        <div id="muridbayar">
                                            <div class="owl-carousel carousel-popular owl-theme" data-aos="fade-up" data-aos-delay="300">
                                                @foreach ($muridbayar as $query)
                                                    <div class="item mt-lg-0 mt-md-3 mt-sm-3 mt-3">
                                                        <div class="card card-kelas mx-2">
                                                            <img src="{{ asset('/storage/'.$query->file) }}" alt="wanita1"
                                                            class="wanita1"
                                                            data-toggle="tooltip"
                                                            title="{{ $query->kelas }}" />
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
                                                                                    $foto = URL::asset('/Foto/bintang.png');
                                                                                    echo "<span class='rating-jumlah'><img src='".$foto."' class='bintang-carousel d-inline mr-1 mb-1'>" . "0" . "<span class='rating-tutul'> (0) </span>"  . "</span>";
                                                                                }else{
                                                                                    $lala = $total / $counter;
                                                                                    $foto = URL::asset('/Foto/bintang.png');
                                                                                    echo "<span class='rating-jumlah'><img src='".$foto."' class='bintang-carousel d-inline mr-1 mb-1'>" . number_format($lala, 1) . "<span class='rating-tutul'> ($counter) </span>" . "</span>";
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
                                                                        {{-- <span>
                                                                            <img src="{{ asset('/Foto/bintang.png') }}" alt="bintang" class="img-fluid d-inline vertical-align-center" style="margin-top:-5px; width:20px; height:20px;">
                                                                        </span>
                                                                        <span class="rating-jumlah"> 4.7 <span class="rating-total"> (20) </span> </span> --}}
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
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-12 mt-3">
                                        <p class="txt-kategori">Kelas Terbaru</p>
                                        <div id="terbarubayar">
                                            <div class="owl-carousel owl-theme carousel-terbaru">
                                                @foreach ($terbarubayar as $query)
                                                    <div class="item px-2" data-aos="zoom-out-down">
                                                        <div class="card">
                                                            <div class="row">
                                                                <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 col-12">
                                                                    <a href="{{ route('kelas.show',$query->slug) }}">
                                                                        <img src="{{ asset('/storage/'.$query->file) }}"
                                                                            class="mx-xl-2 mx-lg-2 mt-xl-2 mt-lg-2 img-terbaru img-fluid"
                                                                            data-toggle="tooltip" title="{{ $query->kelas }}">
                                                                    </a>
                                                                </div>
                                                                <div class="col-xl-8 col-lg-8 col-md-12 col-sm-12 col-12 mx-xl-0 mx-lg-0 mx-md-3 mx-sm-3 mx-3">
                                                                    <span class="badge badge-success jenis-terbaru mr-xl-1 mr-lg-4 mr-md-4 mr-sm-4 mr-4" style="float:right;">
                                                                        {{ $query->jenis }}
                                                                    </span>
                                                                    <p class="matpel" data-toggle="tooltip" title="{{ $query->kelas }}">
                                                                        <a href="{{ route('kelas.show',$query->slug) }}" style="color:#333333;">
                                                                            {{ Str::limit($query->kelas,'13') }}
                                                                        </a>
                                                                    </p>
                                                                    <p class="waktu-buat">{{ $query->created_at->toDateString() }} / {{ $query->tingkat }}</p>
                                                                    <div class="media">
                                                                        <a href="{{ route('home.mentor.show',$query->mentor->kode_mentor) }}" target="_blank">
                                                                            <img src="{{ $query->mentor->file != null ? asset('/storage/'.$query->mentor->file) : asset('/Foto/peo2.png') }}"
                                                                                style="width:50px; height:50px; border-radius:50px;"
                                                                                class="people-terbaru" alt="" data-toggle="tooltip" title="{{ $query->mentor->name }}">
                                                                        </a>
                                                                        <div class="media-body ml-3">
                                                                            <p class="vet-terbaru" data-toggle="tooltip" title="{{ $query->mentor->name }}">
                                                                                <a href="{{ route('home.mentor.show',$query->mentor->kode_mentor) }}" target="_blank"
                                                                                    style="color:#1d1d1d; text-decoration:none;">
                                                                                    {{ $query->mentor->name }}
                                                                                </a>
                                                                            </p>
                                                                            <p class="ex-terbaru">{{ $query->mentor->bidang }}</p>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                {{--<a href="{{ route('kelas.show',$query->slug) }}" class="stretched-link"></a>--}}
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-12 mt-3">
                                        <p class="txt-kategori">Semua kelas</p>
                                    </div>
                                </div>
                                <div id="semuabayar">

                                    <div class="row justify-content-center">
                                        @foreach ($bayar as $query)
                                            {{--@if ($query->jenis == 'gratis')--}}
                                                <div class="col-xl-4 col-lg-4 col-md-6 col-sm-9 col-12 mt-3" data-aos="zoom-out-up">
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
                                                        {{--</div>--}}
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
                                                                {{-- <span>
                                                                    <img src="{{ asset('/Foto/bintang.png') }}" alt="bintang" class="img-fluid d-inline vertical-align-center" style="margin-top:-5px; width:20px; height:20px;">
                                                                </span>
                                                                <span class="rating-jumlah"> 4.7 <span class="rating-total"> (20) </span> </span> --}}
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
                                                {{--@else
                                                <div class="alert alert-danger">
                                                    <h4>Kelas Not Found</h4>
                                                </div>--}}
                                            {{--@endif--}}
                                        @endforeach
                                        {{ $bayar->links() }}
                                    </div>
                                </div>
                            </div>

                            {{-- PAKET  --}}
                            <div id="menu2" class="container tab-pane fade">
                                <div class="row">
                                    <div class="col-lg-12 mt-3">
                                        {{-- <h3>HO</h3> --}}
                                        <div class="owl-carousel owl-theme carousel-topik">
                                            @foreach ($topik as $query)
                                                <div class="item">
                                                    <div class="btn btn-outline-info media">
                                                        {{-- <img src="{{ URL::asset('/img/math.png') }}" style="width:35px; " alt="mntp"> --}}
                                                        <div class="media-body">
                                                            <p style="margin-top:-5px; margin-left:5px;">{{ $query->topik }}</p>
                                                            {{-- <p style="margin-top:-20px; margin-left:5px;">Kelas</p> --}}
                                                        </div>
                                                        <a href="{{ route('kelas.topik',$query->slug) }}" class="stretched-link"></a>
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-12 mt-3">
                                        <p class="txt-kategori">Sedang Popular</p>
                                        <div class="owl-carousel owl-theme carousel-popular">
                                            @forelse ($muridpaket as $query)
                                                <div class="item">
                                                    <div class="col-lg-12">
                                                        <div class="card ktk-card bsr-kotak2">
                                                            <img src="{{ asset('/storage/'.$query->file) }}" class="card-img-top semua-kelas" height="120px"
                                                            alt="...">
                                                            <div class="card-body">
                                                                <h5 class="card-title mapel">{{ Str::limit($query->kelas,'16') }}</h5>
                                                                <span class="card-text pemula">{{ Str::limit($query->tingkat,'7') }}</span>
                                                                <span class="badge badge-danger jenis" style="float:right; background-color:#FDD8D8; color:#F73D3D;">{{ $query->jenis }}</span>
                                                                <hr>
                                                                <div class="media">
                                                                    <img src="{{ $query->mentor->file != null ? asset('/storage/'.$query->mentor->file) : asset('/Foto/peo2.png') }}"
                                                                    style="width:55px; height:55px; margin-left:0px; margin-top:-10px ;"
                                                                    class="" alt="">
                                                                    <div class="media-body ml-3">
                                                                        <p style="margin-top:-5px;" class="vet">{{ $query->mentor->name }}</p>
                                                                        <p style="margin-top:-20px;" class="ex">{{ $query->mentor->bidang }}</p>
                                                                    </div>
                                                                </div>
                                                            <a href="{{ route('kelas.show', $query->slug) }}" class="stretched-link"></a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                @empty
                                                    <div class="row justify-content-center">
                                                        <p class="">Yah blm ada kelasnya</p>
                                                    </div>
                                            @endforelse
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-12 mt-3">
                                        <p class="txt-kategori">Kelas Terbaru</p>
                                        <div class="owl-carousel owl-theme carousel-terbaru">
                                            @foreach ($terbarupaket as $query)
                                                <div class="item">
                                                    <div class="card">
                                                        <div class="row">
                                                            <div class="col-lg-4">
                                                                <img src="{{ asset('/storage/'.$query->file) }}" alt=""
                                                                width="107px" height="112px" class="mt-2 ml-lg-2" style="">
                                                            </div>
                                                            <div class="col-lg-8">
                                                                <span class="badge badge-danger jenis-terbaru" style="float:right; background-color:#FDD8D8; color:#F73D3D;">
                                                                    {{ $query->jenis }}
                                                                </span>
                                                                <p class="matpel">{{ Str::limit($query->kelas,'14') }}</p>
                                                                <p class="waktu-buat">{{ $query->created_at->toDateString() }} / {{ $query->tingkat }}</p>
                                                                <div class="media">
                                                                    <img src="{{ $query->mentor->file != null ? asset('/storage/'.$query->mentor->file) : asset('/Foto/peo2.png') }}"
                                                                    style="width:50px; height:50px;"
                                                                    class="people-terbaru" alt="">
                                                                    <div class="media-body ml-3">
                                                                        <p class="vet-terbaru">{{ $query->mentor->name }}</p>
                                                                        <p class="ex-terbaru">{{ $query->mentor->bidang }}</p>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <a href="{{ route('kelas.show',$query->slug) }}" class="stretched-link"></a>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-12 mt-3">
                                        <p class="txt-kategori">Semua kelas</p>
                                    </div>
                                </div>


                                <div class="row justify-content-center">
                                    @forelse ($paket as $query)
                                    <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 col-12 mt-3">
                                        {{-- <div class="col-lg-12"> --}}
                                            <div class="card ktk-card bsr-kotak2">
                                                <img src="{{ asset('/storage/'.$query->file) }}" class="card-img-top semua-kelas" height="120px"
                                                alt="...">
                                                <div class="card-body">
                                                    <h5 class="card-title mapel">{{ Str::limit($query->kelas,'14') }}</h5>
                                                    <span class="card-text pemula">{{ $query->tingkat }}</span>
                                                    <span class="badge badge-danger jenis" style="float:right; font-style:italic; background-color:#FDD8D8; color:#F73D3D;">{{ $query->jenis }}</span>
                                                    <hr>
                                                    <div class="media">
                                                        <img src="{{ $query->mentor->file != null ? asset('/storage/'.$query->mentor->file) : asset('/Foto/peo2.png') }}"
                                                        style="width:50px; height:50px; margin-left:0px; margin-top:-10px ;"
                                                        class="" alt="">
                                                        <div class="media-body ml-3">
                                                            <p class="vet-terbaru">{{ $query->mentor->name }}</p>
                                                            <p class="ex-terbaru">{{ $query->mentor->bidang }}</p>
                                                        </div>
                                                    </div>
                                                <a href="{{ route('kelas.show', $query->slug) }}" class="stretched-link"></a>
                                                </div>
                                            </div>
                                        {{-- </div> --}}
                                    </div>
                                    @empty
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <p>Yah blm ada kelasnya</p>
                                            </div>
                                        </div>
                                    @endforelse
                                    {{ $paket->links() }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>

    @include('includes.footer')



    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
    {{--<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>--}}
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <script src="{{ URL::asset('dist/owl.carousel.min.js') }}"></script>
    {{--<script src="{{ URL::asset('mouse/query/jquery.mousewheel.min.js') }}"></script>--}}
    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
    <script src="{{ URL::asset('/slick/slick.js') }}"></script>
    <script>
      AOS.init({
        //  offset:400,
          duration:1000
      });
    </script>

    <script>

        $('.slick-topik').slick({
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


        $('.slick-sedang-popular2').slick({
            dots: false,
            infinite: false,
            speed: 300,
            slidesToShow:3.5,
            slidesToScroll:1,
            arrows:true,
            autoplay:true,
            responsive: [
                {
                    breakpoint: 1200,
                    settings: {
                        slidesToShow: 2.5,
                        slidesToScroll: 1,
                        infinite: false,
                        dots: false,
                        arrows:true,
                        //autoplay:true
                    }
                },
                {
                    breakpoint: 1100,
                    settings: {
                        slidesToShow: 2.5,
                        slidesToScroll: 1,
                        infinite: false,
                        dots: false,
                        arrows:true,
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
                        arrows:true
                    }
                },
                {
                    breakpoint: 982,
                    settings: {
                        slidesToShow: 2.1,
                        slidesToScroll: 1,
                        infinite: false,
                        dots: false,
                        arrows:true
                    }
                },
                {
                    breakpoint: 770,
                    settings: {
                        slidesToShow: 1.5,
                        slidesToScroll: 1,
                        infinite: false,
                        dots: false,
                        arrows:true,
                    }
                },
                {
                    breakpoint: 620,
                    settings: {
                        slidesToShow: 1.1,
                        slidesToScroll: 1,
                        infinite: false,
                        dots: false,
                        arrows:true,
                    }
                },
                {
                    breakpoint: 480,
                    settings: {
                        slidesToShow: 1.1,
                        slidesToScroll: 1,
                        infinite: false,
                        dots: true,
                        arrows:true,
                    }
                },
                {
                    breakpoint: 410,
                    settings: {
                        slidesToShow: 1,
                        slidesToScroll: 1,
                        infinite: false,
                        dots: true,
                        arrows:true,
                    }
                },
            ]
        });

        $('.slick-sedang-popular').slick({
            dots: false,
            infinite: false,
            speed: 300,
            slidesToShow:3.5,
            slidesToScroll:1,
            arrows:true,
            autoplay:true,
            responsive: [
                {
                    breakpoint: 1200,
                    settings: {
                        slidesToShow: 2.5,
                        slidesToScroll: 1,
                        infinite: false,
                        dots: false,
                        arrows:true,
                        //autoplay:true
                    }
                },
                {
                    breakpoint: 1100,
                    settings: {
                        slidesToShow: 2.5,
                        slidesToScroll: 1,
                        infinite: false,
                        dots: false,
                        arrows:true,
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
                        arrows:true
                    }
                },
                {
                    breakpoint: 982,
                    settings: {
                        slidesToShow: 2.1,
                        slidesToScroll: 1,
                        infinite: false,
                        dots: false,
                        arrows:true
                    }
                },
                {
                    breakpoint: 770,
                    settings: {
                        slidesToShow: 1.5,
                        slidesToScroll: 1,
                        infinite: false,
                        dots: false,
                        arrows:true,
                    }
                },
                {
                    breakpoint: 620,
                    settings: {
                        slidesToShow: 1.1,
                        slidesToScroll: 1,
                        infinite: false,
                        dots: false,
                        arrows:true,
                    }
                },
                {
                    breakpoint: 480,
                    settings: {
                        slidesToShow: 1.1,
                        slidesToScroll: 1,
                        infinite: false,
                        dots: true,
                        arrows:true,
                    }
                },
                {
                    breakpoint: 410,
                    settings: {
                        slidesToShow: 1,
                        slidesToScroll: 1,
                        infinite: false,
                        dots: true,
                        arrows:true,
                    }
                },
            ]
        });



        $('.slick-kelas-terbaru').slick({
            dots: false,
            infinite: false,
            speed: 300,
            slidesToShow:3.5,
            slidesToScroll:1,
            arrows:false,
            autoplay:true,
            responsive: [
                {
                    breakpoint: 1200,
                    settings: {
                        slidesToShow: 2.5,
                        slidesToScroll: 1,
                        infinite: false,
                        dots: false,
                        arrows:false,
                        //autoplay:true
                    }
                },
                {
                    breakpoint: 1100,
                    settings: {
                        slidesToShow: 2.5,
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
                        slidesToShow: 2.1,
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


        //$('.carousel-topik').owlCarousel({
        //    autoplay:true,
        //    autoplayHoverPause:true,
        //    // loop:true,
        //    margin:10,
        //    lazyload:true,
        //    // margin:10,
        //    // stagePadding:5,
        //    responsive:{
        //        0:{
        //            items:1,
        //            nav:false,
        //            dots:true
        //        },
        //        480:{
        //            items:3,
        //            nav:false,
        //            dots:true
        //        },
        //        600:{
        //            items:3,
        //            nav:false,
        //            dots:true
        //        },
        //        1000:{
        //            items:3,
        //            nav:false,
        //            dots:true
        //        },
        //        1263:{
        //            items:4,
        //            nav:false,
        //            dots:false
        //        }
        //    }
        //});
        function carouselnya(){
            $('.carousel-popular').owlCarousel({
                autoplay:true,
                autoplayHoverPause:true,
                margin:10,
                lazyload:true,
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
                        items:1,
                        nav:false,
                        dots:true
                    },
                    700:{
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

            $('.carousel-terbaru').owlCarousel({
                // autoplay:true,
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
                        items:2,
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

        }


        var sd = null, smp = null, sma_smk = null, semua = null;
        $('#materi_sd').change(function(){
            if($(this).is(':checked')){
                sd = $(this).val();
                ambildata();
            }else{
                sd = null;
                ambildata();
            }
        });
        $('#materi_smp').change(function(){
            if($(this).is(':checked')){
                smp = $(this).val();
                ambildata();
            }else{
                smp = null;
                ambildata();
            }
        });
        $('#materi_sma').change(function(){
            if($(this).is(':checked')){
                sma_smk = $(this).val();
                ambildata();
            }else{
                sma_smk = null;
                ambildata();
            }
        });
        $('#materi_semua').change(function(){
            if($(this).is(':checked')){
                semua = $(this).val();
                ambildata();
            }else{
                semua = null;
                ambildata();
            }
        });

        function ambildata(){
            let xhttp = new XMLHttpRequest();
            xhttp.onreadystatechange = function(){
                if(this.readyState == 4 && this.status == 200){
                    let parser = new DOMParser();
                    let xmlDoc = parser.parseFromString(xhttp.responseText, "text/html");
                    //Gratis
                    let la1 = xmlDoc.getElementById('query_muridgrat').innerHTML;
                    let la2 = xmlDoc.getElementById('query_terbarugrat').innerHTML;
                    let la3 = xmlDoc.getElementById('query_semuagrat').innerHTML;
                    document.getElementById('muridgrat1').innerHTML = la1;
                    document.getElementById('terbarugrat1').innerHTML = la2;
                    document.getElementById('semuagrat1').innerHTML = la3;

                    //Bayar
                    let ba1 = xmlDoc.getElementById('query_muridbayar').innerHTML;
                    let ba2 = xmlDoc.getElementById('query_terbarubayar').innerHTML;
                    let ba3 = xmlDoc.getElementById('query_semuabayar').innerHTML;
                    document.getElementById('muridbayar').innerHTML = ba1;
                    document.getElementById('terbarubayar').innerHTML = ba2;
                    document.getElementById('semuabayar').innerHTML = ba3;
                    carouselnya();
                }
            };
            xhttp.open('GET', '{{ route('kelas.materi.kategori') }}?kategori={{ $kategori->kategori }}&materi_sd='+sd+'&materi_smp='+smp+'&materi_sma='+sma_smk+'&semua='+semua, true);
            xhttp.send();
        }
    </script>

  </body>
</html>

