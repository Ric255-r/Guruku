<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ URL::asset('/css/kelasbaru.css') }}">
    <link rel="shortcut icon" sizes="57x57" href="{{ URL::asset('/Foto/favicon.png') }}">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('dist/assets/owl.carousel.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('dist/assets/owl.theme.default.min.css') }}">
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
    <title>Kuis</title>
</head>
<style>
    .btnkategori{
        margin-top:-5px;
        margin-left:5px;
        color: black;
        border: 0;
        background: transparent;
        width: 100%;
    }
    .btnkategori:focus{
        border: 0;
        outline: none;
    }
    .search {
    width: 100%;
    position: relative;
    display: flex;
    }

    .searchTerm {
    width: 100%;
    border: 3px solid #00B4CC;
    border-right: none;
    padding: 5px;
    height: 36px;
    border-radius: 5px 0 0 5px;
    outline: none;
    color: #9DBFAF;
    }

    .searchTerm:focus{
    color: #00B4CC;
    }

    .searchButton {
    width: 40px;
    height: 36px;
    border: 1px solid #00B4CC;
    background: #00B4CC;
    text-align: center;
    color: #fff;
    border-radius: 0 5px 5px 0;
    cursor: pointer;
    font-size: 20px;
    }

    /*Resize the wrap to see the search bar change!*/
    .wrapcari{
    padding-top: 25px;
    width: 30%;
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    }
    @media screen and (max-width: 600px) {
        .wrapcari{
            padding-top: 25px;
            width: 60%;
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
        }
    }
</style>
<body>
    <header class="bck-color">
        @include('navs.navbar2')

        <div class="container-fluid">
            <div class="row text-center">
                <div class="col-lg-12" data-aos="zoom-out-down">
                    <h3 class="yuk">Silahkan Pilih Kuis Yang Anda Inginkan</h3>
                    <p class="jgn">Ayo tes kemampuan kamu, sudah seberapa jauh anda <br> menguasai materi yang diberikan
                    </p>
                </div>
                <div class="col-lg-12" data-aos="zoom-out-down">
                    <form action="{{ route('kuis.search') }}" method="GET" class="form-inline justify-content-center">
                        <input class="form-control active-cyan-4 tipe" style="width:500px;" type="text" placeholder="Cari Nama Kuis" name="keyword" id="keyword">
                    </form>
                    {{-- <form action="{{ route('kuis.search') }}" method="GET">
                        <div class="wrapcari">
                            <div class="search">
                                <input type="text" name="keyword" id="keyword" class="searchTerm" placeholder="Cari Nama Kuis Anda">
                                <button type="submit" class="searchButton">
                                    <i class="fa fa-search"></i>
                                </button>
                            </div>
                        </div>
                    </form> --}}
                </div>
            </div>
        </div>
        <br>
    </header>

    <section class="kategori">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <!-- Tab panes -->
                    <div class="tab-content">
                        <div id="home" class="container tab-pane active">
                            <br>
                            <div class="row">
                                <div class="col-lg-12 text-center"><h4><span id="h4kategori">Pilih Kategori Anda</span></h4></div>
                                <div class="col-lg-12 mt-3">
                                    <div class="owl-carousel owl-theme">
                                        @foreach ($kategori as $query)
                                            <div class="item">
                                                <div class="btn btn-outline-info media">
                                                    {{-- <img src="{{ URL::asset('/img/math.png') }}" style="width:35px; " alt="mntp"> --}}
                                                    <div class="media-body">
                                                        <p style="margin-top:-5px; margin-left:5px;">{{ $query->kategori }}</p>
                                                        {{-- <p style="margin-top:-20px; margin-left:5px;">{{ $copa }} Kelas</p> --}}
                                                    </div>
                                                    <a href="{{ route('kuis.kategori',$query->slug) }}" class="stretched-link"></a>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                            {{--<div class="row justify-content-center mt-4">
                                <h4 id="titlekuis">Semua Kuis Kami</h4>
                            </div>--}}
                            <div class="row justify-content-center mt-2 divkategori">
                                @forelse ($kuis as $item)
                                    <div class="col-lg-4 mt-3">
                                        <div class="card card-kuis" data-aos="zoom-out-up">
                                            <img src="{{ asset('gambar_kuis/'.$item->gambar) }}" alt="gambar_kuis"
                                            data-toggle="tooltip"
                                            title="{{ $item->nama_kuis }}"
                                            class="wanita1 img-fluid">
                                            <div class="row">
                                                <div class="col-lg-6">
                                                    <div class="rating-baru mr-auto">
                                                        @php
                                                            $total = 0;
                                                            $counter = 0;
                                                        @endphp
                                                        @foreach ($rating as $value)
                                                            @if ($value->id_kuis == $item->id)
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
                                                        {{ $item->tingkatan  }}
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-12">
                                                <h5 class="txt-kelas" data-toggle="tooltip" title="{{ $item->nama_kuis }}">{{ Str::limit($item->nama_kuis, '20') }}</h5>
                                                <div class="row">
                                                    <div class="col-lg-12">
                                                        <p class="br-topik-kuis"> Topik : {{ $item->topic }} </p>
                                                    </div>
                                                </div>
                                                {{--<div class="row">
                                                    <div class="col-lg-12">
                                                        @php
                                                            $total = 0;
                                                            $counter = 0;
                                                        @endphp
                                                        @foreach ($rating as $value)
                                                            @if ($value->id_kuis == $item->id)
                                                                @php
                                                                    $total += intval($value->rating);
                                                                    $counter++;
                                                                @endphp
                                                            @endif
                                                        @endforeach
                                                        @php
                                                            if($total == null){

                                                            }else{
                                                                $lala = $total / $counter;
                                                                echo "<span class='rating-jumlah'>" . number_format($lala, 1) . "<span class='rating-tutul'> ($tutul) </span>" . "</span>";
                                                            }
                                                        @endphp
                                                    </div>
                                                </div>--}}
                                                <div class="media" style="margin-top:30px;">
                                                    <a href="{{ route('home.mentor.show',$item->mentor_id) }}" target="_blank">
                                                        {{--bikin dia tembak lsg ke halaman mentor/ tinggal panggil kode_mentor lagi doang --}}
                                                        <img src="{{ asset('/storage/'.$item->foto_mentor) }}" class="mr-3 img-fluid"
                                                        style="width:50px; height:50px; border-radius:50px;"
                                                        alt="gambar_mentor"
                                                        data-toggle="tooltip"
                                                        title="{{ $item->nama_mentor }}">
                                                    </a>
                                                    <div class="media-body txt-mentor">
                                                        <h5 class="mt-0 nama-mentor" data-toggle="tooltip" title="{{ $item->nama_mentor }}">
                                                            <a href="{{ route('home.mentor.show',$item->mentor_id) }}" target="_blank"
                                                                style="color:#1d1d1d; text-decoration:none;">
                                                                {{ $item->nama_mentor }}
                                                            </a>
                                                        </h5>
                                                        <p class="exp">{{ $item->bidang }}</p>
                                                    </div>
                                                </div>
                                            </div>
                                            <hr>
                                            <div class="col-lg-12">
                                                <div class="row">
                                                    <div class="col-lg-6 col-md-6 col-sm-6 col-12">
                                                        <p class="br-tgl">{{ $item->tanggalbuat }}</p>
                                                    </div>
                                                    <div class="col-lg-6 col-md-6 col-sm-6 col-12">
                                                        <a href="{{ route('kuis.detailnya', $item->slug) }}" class="btn btn-beli btn-block stretched-link mb-2">Detail Kuis</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @empty
                                    <div class="col-lg-12">
                                        <p class="text-center">Kuis Tidak Tersedia</p>
                                    </div>
                                @endforelse
                            </div>
                        </div>
                        <div id="menu1" class="container tab-pane fade">
                            <div class="row">
                                <div class="col-lg-12 mt-3">
                                    {{-- <h3>HO</h3> --}}
                                    <div class="owl-carousel owl-theme">

                                    </div>
                                </div>
                            </div>

                            <div class="row justify-content-center mt-3">

                            </div>
                        </div>
                        <div id="menu2" class="container tab-pane fade">
                            <div class="row">
                                <div class="col-lg-12 mt-3">
                                    <div class="owl-carousel owl-theme">

                                    </div>
                                </div>
                            </div>
                            <div class="row mx-auto mt-3">
                                <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 col-12 mt-3">
                                    <div class="card ktk-card bsr-kotak2">
                                        <div class="card-body">

                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-12">
                                        <p class="text-center">Yah blm ada Kuisnya</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        {{-- <div class="col-lg-4 mt-3">
            <div class="card col-lg-12">
                <img class="card-img-top" src="'+gbr+'" alt="Card image" style="width:100%">
                <div class="card-body">
                    <p class="card-text" style="margin: 0; padding: 0;"><sup>Topic : '+subObj.topic+'</sup></p>
                    <h5 class="card-title">'+subObj.nama_kuis+'</h5>
                    <p class="card-text">'+subObj.deskripsi+'</p>
                    <p class="card-text text-right">By : '+subObj.nama_mentor+'</p>
                    <a href="'+link+'" class="btn btn-primary text-center" style="width: 100%;">Mulai Kuis?</a>
                </div>
            </div>
        </div> --}}
    </section>

    @include('includes.footer')

    {{-- <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script> --}}

    <script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
    {{--<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>--}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
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
    		$('.card-kuis').hover(
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
        });

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
    </script>
</body>
</html>
