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
    <link rel="stylesheet" href="{{ URL::asset('/slick/slick.css') }}">
    <link rel="stylesheet" type="text/css" href="http://kenwheeler.github.io/slick/slick/slick-theme.css"/>
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
    <link rel="stylesheet" href="{{ URL::asset('/css/kelasbaru.css') }}">
    <title>{{ $topik->topik }}</title>
  </head>
  <body>
    <header class="bck-color">
        {{--<div class="container">--}}
            @include('navs.navbar2')
        {{--</div>--}}

        <div class="container-fluid">
            <div class="row text-center">
                <div class="col-lg-12" data-aos="zoom-out-up">
                    <h2 class="yuk">Topik tentang <br> "{{ $topik->topik }}"</h2>
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
                            <a class="btn btn-outline-info mx-2 active btn-gratis pt-2" data-toggle="pill" href="#home">
                                <p class="txt-gratis">Gratis</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="btn btn-outline-info mx-2 btn-gratis btn-gratis-sm pt-2" data-toggle="pill" href="#menu1">
                                <p class="txt-gratis">Premium</p>
                            </a>
                        </li>
                        {{--<li class="nav-item">
                            <a class="btn btn-outline-info mx-2 btn-gratis" data-toggle="pill" href="#menu2">
                                <p class="txt-paket">Paket</p>
                            </a>
                        </li>--}}
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
                                    <div class="col-lg-12 mt-3" data-aos="zoom-out-up">
                                        <p class="txt-kategori mt-3">Kelas terbaru dari topik {{ $topik->topik }}</p>
                                    </div>
                                </div>
                                <div id="kontengratis">
                                    <div class="row">
                                        <div class="col-lg-12 owl-carousel owl-theme carousel-terbaru" data-aos="zoom-out-up">
                                            @forelse ($terbarugrat as $query)
                                            {{--<div class="slick-kelas-terbaru">--}}
                                                <div class="item px-2">
                                                    <div class="card">
                                                        <div class="row">
                                                            <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 col-12">
                                                                <img src="{{ asset('/storage/'.$query->file) }}" alt=""
                                                                width="107px" height="112px" class="ml-lg-2 jarak-terbaru" style="">
                                                            </div>
                                                            <div class="col-xl-8 col-lg-8 col-md-12 col-sm-12 col-12 mx-xl-0 mx-lg-0 mx-md-3 mx-sm-3 mx-3">
                                                                <span class="badge badge-success jenis-terbaru mr-xl-1 mr-lg-4 mr-md-4 mr-sm-4 mr-4" style="float:right;">
                                                                    {{ $query->jenis }}
                                                                </span>
                                                                <p class="matpel">{{ Str::limit($query->kelas,'14') }}</p>
                                                                <p class="waktu-buat">{{ $query->created_at->toDateString() }} / {{ $query->tingkat }}</p>
                                                                <div class="media">
                                                                    <img src="{{ $query->mentor->file != null ? asset('/storage/'.$query->mentor->file) : asset('/Foto/peo2.png') }}"
                                                                    style="width:50px; height:50px; border-radius:50px;"
                                                                    class="people-terbaru" alt="">
                                                                    <div class="media-body ml-3">
                                                                        <p class="vet-terbaru">{{ $query->mentor->name }}</p>
                                                                        <p class="ex-terbaru">{{ $query->mentor->bidang }}</p>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <a href="{{ route('kelas.show', $query->slug) }}" class="stretched-link" data-toggle="tooltip" title="{{ $query->kelas }}"></a>
                                                    </div>
                                                </div>
                                            {{--</div>--}}
                                            @empty
                                                <div class="item">
                                                    <p class="text-center">Belum ada kelas terbaru</p>
                                                </div>
                                            @endforelse
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <p class="txt-kategori mt-4">Semua kursus {{ $topik->topik }}</p>
                                        </div>
                                    </div>
                                    <div class="row justify-content-center mt-3">
                                        @forelse ($gratis as $query)
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
                                        @empty
                                            <div class="row">
                                                <div class="col-lg-12">
                                                    <p>Yah kelasnya belum tersedia</p>
                                                </div>
                                            </div>
                                        @endforelse
                                        <div class="row justify-content-center">
                                            <div class="col-lg-12">
                                                {{ $gratis->links() }}
                                            </div>
                                        {{--@endforeach--}}
                                        </div>
                                    </div>

                                </div>
                            </div>
                            {{-- Bayar --}}
                            <div id="menu1" class="container tab-pane fade">
                                <div class="row">
                                    <div class="col-lg-12 mt-3">
                                        <p class="txt-kategori mt-3">Kelas terbaru dari topik {{ $topik->topik }}</p>
                                    </div>
                                </div>
                                <div id="kontenbayar">

                                    <div class="row">
                                        <div class="col-lg-12 owl-carousel owl-theme carousel-terbaru" data-aos="zoom-out-up">
                                            @forelse ($terbarubayar as $query)
                                                {{--<div class="slick-kelas-terbaru">--}}
                                                    <div class="item px-2">
                                                        <div class="card">
                                                            <div class="row">
                                                                <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 col-12">
                                                                    <img src="{{ asset('/storage/'.$query->file) }}" alt=""
                                                                    width="107px" height="112px" class="ml-lg-2 jarak-terbaru" style="">
                                                                </div>
                                                                <div class="col-xl-8 col-lg-8 col-md-12 col-sm-12 col-12 mx-xl-0 mx-lg-0 mx-md-3 mx-sm-3 mx-3">
                                                                    <span class="badge badge-success jenis-terbaru mr-xl-1 mr-lg-4 mr-md-4 mr-sm-4 mr-4" style="float:right;">
                                                                        {{ $query->jenis }}
                                                                    </span>
                                                                    <p class="matpel">{{ Str::limit($query->kelas,'14') }}</p>
                                                                    <p class="waktu-buat">{{ $query->created_at->toDateString() }} / {{ $query->tingkat }}</p>
                                                                    <div class="media">
                                                                        <img src="{{ $query->mentor->file != null ? asset('/storage/'.$query->mentor->file) : asset('/Foto/peo2.png') }}"
                                                                        style="width:50px; height:50px; border-radius:50px;"
                                                                        class="people-terbaru" alt="">
                                                                        <div class="media-body ml-3">
                                                                            <p class="vet-terbaru">{{ $query->mentor->name }}</p>
                                                                            <p class="ex-terbaru">{{ $query->mentor->bidang }}</p>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <a href="{{ route('kelas.show', $query->slug) }}" class="stretched-link" data-toggle="tooltip" title="{{ $query->kelas }}"></a>
                                                        </div>
                                                    </div>
                                                {{--</div>--}}
                                            @empty
                                                <div class="row">
                                                    <div class="col-lg-12">
                                                        <p class="text-center">Belum ada kelas terbaru</p>
                                                    </div>
                                                </div>
                                            @endforelse
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <p class="txt-kategori mt-5">Semua kursus {{ $topik->topik }}</p>
                                        </div>
                                    </div>
                                    <div class="row justify-content-center">
                                        @forelse ($bayar as $query)
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
                                        @empty
                                            <div class="row justify-content-center">
                                                <div class="col-lg-12">
                                                    <p>Yah kelasnya belum ada</p>
                                                </div>
                                            </div>
                                        @endforelse
                                    </div>
                                    <div class="row justify-content-center">
                                        <div class="col-lg-12">
                                            {{ $bayar->links() }}
                                        </div>
                                    </div>
                                </div>
                            </div>
                            {{--<div id="menu2" class="container tab-pane fade">
                                <div class="row">
                                    <div class="col-lg-12 mt-3">
                                        <p class="txt-kategori mt-3">Kelas terbaru dari topik {{ $topik->topik }}</p>
                                        <div class="owl-carousel owl-theme terbaru-gratis">
                                            @foreach ($terbarupaket as $query)
                                                <div class="item">
                                                    <div class="card">
                                                        <div class="row">
                                                            <div class="col-lg-4">
                                                                <img src="{{ asset('/storage/'.$query->file) }}" alt=""
                                                                width="107px" height="112px" class="ml-lg-2 jarak-terbaru" style="">
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
                                                        </div>
                                                        <a href="{{ route('kelas.show', $query->id) }}" class="stretched-link"></a>
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-12">
                                        <p class="txt-kategori mt-5">Semua kurus {{ $topik->topik }}</p>
                                    </div>
                                </div>
                                <div class="row justify-content-center">
                                    @foreach ($paket as $query)
                                        <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 col-12 mt-3">
                                                <div class="card ktk-card bsr-kotak">
                                                    <img src="{{ asset('/storage/'.$query->file) }}" class="card-img-top semua-kelas" height="120px"
                                                    alt="...">
                                                    <div class="card-body">
                                                        <h5 class="card-title mapel">{{ Str::limit($query->kelas,'14') }}</h5>
                                                        <span class="card-text pemula">{{ $query->tingkat }}</span>
                                                        <span class="badge badge-danger jenis" style="float:right; font-style:italic; background-color:#FDD8D8; color:#F73D3D;">{{ $query->jenis }}</span>
                                                        <hr>
                                                        <div class="media">
                                                            <img src="{{ URL::asset('img/peo.png') }}"
                                                            style="width:55px; height:55px; margin-left:0px; margin-top:-10px ;"
                                                            class="" alt="">
                                                            <div class="media-body ml-3">
                                                                <p style="margin-top:-5px;" class="vet">Avet</p>
                                                                <p style="margin-top:-20px;" class="ex">Expert Matematika</p>
                                                            </div>
                                                        </div>
                                                        <a href="{{ route('kelas.show', $query->id) }}" class="stretched-link"></a>
                                                    </div>
                                                </div>
                                        </div>
                                    @endforeach
                                </div>
                                <div class="row justify-content-center">
                                    <div class="col-lg-12">
                                        {{ $paket->links() }}
                                    </div>
                                </div>
                            </div>--}}
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
    {{--<script src="https://code.jquery.com/jquery-3.5.0.js"></script>--}}
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
        function carouselny(){
            $('.slick-kelas-terbaru').slick({
                dots: false,
                infinite: false,
                speed: 300,
                slidesToShow:3,
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
    		$('.card-kelas-topik').hover(
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
            carouselny();
    	});

        var sd = null, smp = null, sma_smk = null, semua = null;
        
        function ambildata(){
            let xhttp = new XMLHttpRequest();
            xhttp.onreadystatechange = function(){
                if(this.readyState == 4 && this.status == 200){
                    let parser = new DOMParser();
                    let xmlDoc = parser.parseFromString(this.responseText, "text/html");
                    //Gratis
                    let gratis = xmlDoc.getElementById('query_kontengratis').innerHTML;
                    document.getElementById('kontengratis').innerHTML = gratis;

                    //Bayar
                    let bayar = xmlDoc.getElementById('query_kontenbayar').innerHTML;
                    document.getElementById('kontenbayar').innerHTML = bayar;

                    carouselny();
                }
            }
            xhttp.open('GET', '{{ route('kelas.materi.topik') }}?kategori={{ $topik->kategori_slug }}&topik={{ $topik->slug }}&materi_sd='+sd+'&materi_smp='+smp+'&materi_sma='+sma_smk+'&semua='+semua, true);
            xhttp.send();
        }

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


    </script>
  </body>
</html>
