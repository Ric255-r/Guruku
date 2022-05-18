<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ URL::asset('/css/kelasbaru.css') }}">
    <link rel="shortcut icon" sizes="57x57" href="{{ URL::asset('/Foto/favicon.png') }}">
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('dist/assets/owl.carousel.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('dist/assets/owl.theme.default.min.css') }}">
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" >
</head>
<body>
    {{-- Gratis --}}
    <div id="query_muridgrat">
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

    <div id="query_terbarugrat">
        <div class="owl-carousel owl-theme carousel-terbaru">
            @foreach ($terbarugrat as $query)
                <div class="item" data-aos="zoom-out-down">
                    <div class="card">
                        <div class="row">
                            <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 col-12">
                                <img src="{{ asset('/storage/'.$query->file) }}"
                                class="mx-xl-2 mx-lg-2 mt-xl-2 mt-lg-2 img-terbaru img-fluid"
                                data-toggle="tooltip" title="{{ $query->kelas }}">
                            </div>
                            <div class="col-xl-8 col-lg-8 col-md-12 col-sm-12 col-12 mx-xl-0 mx-lg-0 mx-md-3 mx-sm-3 mx-3">
                                <span class="badge badge-success jenis-terbaru mr-xl-0 mr-lg-4 mr-md-4 mr-sm-4 mr-4" style="float:right;">
                                    {{ $query->jenis }}
                                </span>
                                <p class="matpel" data-toggle="tooltip" title="{{ $query->kelas }}">{{ Str::limit($query->kelas,'13') }}</p>
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
                            <a href="{{ route('kelas.show',$query->slug) }}" class="stretched-link"></a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    <div id="query_semuagrat">
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

    {{-- Bayar --}}
    <div id="query_muridbayar">
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

    <div id="query_terbarubayar">
        <div class="owl-carousel owl-theme carousel-terbaru" data-aos="fade-up" data-aos-delay="300">
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

    <div id="query_semuabayar">
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
</body>
</html>
<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
{{--<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>--}}
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
        $('.carousel-topik').owlCarousel({
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
                    items:3,
                    nav:false,
                    dots:true
                },
                600:{
                    items:3,
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
    });
</script>

