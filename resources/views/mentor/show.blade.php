<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="shortcut icon" sizes="57x57" href="{{ URL::asset('/Foto/favicon.png') }}">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('dist/assets/owl.carousel.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('dist/assets/owl.theme.default.min.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('/css/kelasbaru.css') }}">
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />

    <title>{{ $mentor->name }}</title>

  </head>

  <body>

    {{--<header class="bck-color-mentor-show">--}}
        @include('navs.navbar2')

        {{--<div class="container">
            <div class="row text-center">
                <div class="col-lg-12">
                    <h2 class="br-nama-guru mt-5">Guru Jenny</h2>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-6 col-md-8 col-sm-12">
                    <div class="card br-card-guru text-center">
                        <img src="{{ URL::asset('/Foto/cewe3.jpg') }}" alt="" class="img-fluid img-circle br-img-guru mx-auto d-block mt-3">
                        <p class="br-bio-nama-guru mt-2">Jenny Wilson <span class="br-bio-kode-guru">'JW'</span></p>
                        <p class="br-bio-bidang-guru">Software Engineer</p>
                        <p class="br-bio-sosmed-guru">
                            <span class="br-icon-ig"><i class="fa fa-instagram br-ic-sosmed"></i></span>
                            <span class="br-icon-twitter"><i class="fa fa-twitter br-ic-sosmed"></i></span>
                            <span class="br-icon-dribbble"><i class="fa fa-dribbble br-ic-sosmed"></i></span>
                            <span class="br-icon-github"><i class="fa fa-github br-ic-sosmed"></i></span>
                        </p>
                        <button class="btn btn-outline-secondary br-btn-situs mx-auto mt-3">
                            <i class="fa fa-link mr-2"></i>Lihat Situs Web
                        </button>
                    </div>
                </div>
                <div class="col-lg-6 col-md-8 col-sm-12">
                    <div class="card br-card-deskripsi-guru">
                        <h4 class="br-tentang-saya ml-2 mt-3">Tentang Saya</h4>
                        <hr>
                        <p class="text-left ml-3 br-deskripsi-guru text-justify">
                            I'm Angela, I'm a developer with a passion for teaching. I'm the lead instructor at the London App Brewery, London's leading Programming Bootcamp. I've helped hundreds of thousands of students learn to code and change their lives by becoming a developer. I've been invited by companies such as Twitter, Facebook and Google to teach their employees.
                            My first foray into programming was when I was just 12 years old, wanting to build my own Space Invader game. Since then, I've made hundred of websites, apps and games. But most importantly, I realised that my greatest passion is teaching.
                            I spend most of my time researching how to make learning to code fun and make hard concepts easy to understand. I apply everything I discover into my bootcamp courses. In my courses, you'll find lots of geeky humour but also lots of explanations and animations to make sure everything is easy to understand.
                            I'll be there for you every step of the way.
                        </p>
                    </div>
                </div>
            </div>
        </div>--}}

    {{--</header>--}}

    <main>

        <section class="bck-color-mentor-show">

        </section>

        {{--biodata guru --}}
        <section class="sec-br-biodata-guru">
            <div class="container">
                <div class="row text-center">
                    <div class="col-lg-12 col-md-12 col-sm-12" data-aos="zoom-in">
                        <h2 class="br-nama-guru pb-3">Guru {{ $mentor->name }}</h2>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-6 col-md-12 col-sm-12" data-aos="fade-up" data-aos-delay="300">
                        <div class="card br-card-guru text-center">
                            <img src="{{ asset('/storage/'.$mentor->file) }}" alt="" class="img-fluid img-circle br-img-guru mx-auto d-block mt-3">
                            <p class="br-bio-nama-guru mt-2">{{ $mentor->name }} <span class="br-bio-kode-guru">'{{ $mentor->kode_mentor }}'</span></p>
                            <p class="br-bio-bidang-guru">{{ $mentor->bidang }}</p>
                            <p class="br-bio-sosmed-guru">
                                <span class="br-icon-ig">
                                    @if ($mentor->instagram_profile == null)
                                        <a href="#"><i class="fa fa-instagram br-ic-sosmed"></i></a>
                                    @else
                                        <a href="{{ $mentor->instagram_profile }}"><i class="fa fa-instagram br-ic-sosmed"></i></a>
                                    @endif
                                </span>
                                <span class="br-icon-twitter">
                                    @if ($mentor->twitter_profile == null)
                                        <a href="#"><i class="fa fa-twitter br-ic-sosmed"></i></a>
                                    @else
                                        <a href="{{ $mentor->twitter_profile }}"><i class="fa fa-twitter br-ic-sosmed"></i></a>
                                    @endif
                                </span>
                                <span class="br-icon-dribbble">
                                    @if ($mentor->dribbble_profile == null)
                                        <a href="#"><i class="fa fa-dribbble br-ic-sosmed"></i></a>
                                    @else
                                        <a href="{{ $mentor->dribbble_profile }}"><i class="fa fa-dribbble br-ic-sosmed"></i></a>
                                    @endif
                                </span>
                                <span class="br-icon-github">
                                    @if ($mentor->github_profile == null)
                                        <a href="#"><i class="fa fa-github br-ic-sosmed"></i></a>
                                    @else
                                        <a href="{{ $mentor->github_profile }}"><i class="fa fa-github br-ic-sosmed"></i></a>
                                    @endif
                                </span>
                            </p>
                            <button class="btn btn-outline-secondary br-btn-situs mx-auto mt-3">
                                <i class="fa fa-link mr-2"></i>Lihat Situs Web
                            </button>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-12 col-sm-12" data-aos="fade-up" data-aos-delay="400">
                        <div class="card br-card-deskripsi-guru mt-md-3 mt-lg-0 mt-3">
                            <h4 class="br-tentang-saya ml-3 mt-3" data-aos="fade-up" data-aos-delay="450">Tentang Saya</h4>
                            <hr>
                            <p class="text-left ml-4 br-deskripsi-guru text-justify" data-aos="fade-up" data-aos-delay="500">
                                {{ $mentor->alasan }}
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <hr class="mt-5">

        {{--kelas,kuis,blog guru --}}
        <section class="sec-data-guru mt-5">
            <div class="container">
                <div class="row">
                    <div class="col-lg-4" data-aos="fade-up" data-aos-delay="300">
                        <div class="nav flex-lg-column d-md-flex d-flex flex-row" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                          <a class="nav-link active btn btn-custom mx-auto mt-3 mt-lg-5 mt-xl-5" style="color:white;" id="pills-kelas-tab" data-toggle="pill" href="#pills-kelas" role="tab" aria-controls="pills-kelas" aria-selected="true">Kelas Guru</a>
                          <a class="nav-link btn btn-custom mt-3 mt-lg-5 mt-xl-5 mx-auto" style="color:white;" id="pills-kuis-tab" data-toggle="pill" href="#pills-kuis" role="tab" aria-controls="pills-kuis" aria-selected="false">Kuis Guru</a>
                          <a class="nav-link btn btn-custom mt-3 mt-lg-5 mt-xl-5 mx-auto" style="color:white;" id="pills-blog-tab" data-toggle="pill" href="#pills-blog" role="tab" aria-controls="pills-blog" aria-selected="false">Blog Guru</a>
                        </div>
                    </div>
                    <div class="col-lg-8 mt-sm-3 mt-3 mt-lg-0 mt-xl-0" data-aos="fade-up" data-aos-delay="400">
                        <div class="tab-content" id="v-pills-tabContent">
                          <div class="tab-pane fade show active" id="pills-kelas" role="tabpanel" aria-labelledby="pills-kelas-tab">
                                <div class="row">
                                    <div class="owl-carousel owl-theme carousel-kelas">
                                        @foreach ($kelas as $query)
                                            @if ($query->status == 'PUBLISH')
                                                <div class="col-lg-12">
                                                    <div class="item item-kelas">
                                                        <div class="card card-kelas">
                                                            <img src="{{ asset('/storage/'.$query->file) }}" alt="wanita1" class="wanita1 img-fluid">
                                                            <div class="kategori-baru ml-auto">
                                                                {{ $query->tingkat }}
                                                            </div>
                                                            <div class="col-lg-12">
                                                                <h5 class="txt-kelas">{{ Str::limit($query->kelas,'20') }}</h5>
                                                                <div class="media" style="margin-top:30px;">
                                                                <img src="{{ asset('/storage/'.$query->mentor->file) }}" class="mr-3 img-fluid" style="width:50px; height:50px; border-radius:50px;" alt="people">
                                                                <div class="media-body txt-mentor">
                                                                    <h5 class="mt-0 nama-mentor">{{ $query->mentor->name }}</h5>
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
                                                </div>
                                            @endif
                                        @endforeach
                                    </div>
                              </div>
                          </div>
                          <div class="tab-pane fade" id="pills-kuis" role="tabpanel" aria-labelledby="pills-kuis-tab">
                                <div class="row">
                                    <div class="owl-carousel owl-theme carousel-kuis">
                                        @foreach ($kuis as $item)
                                            <div class="col-lg-12">
                                                <div class="item item-kuis">
                                                    <div class="card card-kuis">
                                                        <img src="{{ URL::asset('/gambar_kuis/'.$item->gambar) }}" alt="wanita1" class="wanita1 img-fluid">
                                                        <div class="kategori-baru ml-auto">
                                                            Pemula
                                                        </div>
                                                        <div class="col-lg-12">
                                                            <h5 class="txt-kelas">{{ $item->nama_kuis }}</h5>
                                                            <div class="row">
                                                                <div class="col-lg-12">
                                                                    <p class="br-topik-kuis"> Topik : {{ $item->topic }} </p>
                                                                </div>
                                                            </div>
                                                            <div class="media" style="margin-top:30px;">
                                                                <img src="{{ asset('/storage/'.$item->foto_mentor) }}" class="mr-3 img-fluid" style="width:50px; height:50px; border-radius:50px;" alt="people">
                                                                <div class="media-body txt-mentor">
                                                                    <h5 class="mt-0 nama-mentor">{{ $item->nama_mentor }}</h5>
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
                                                                    <a href="{{ route('kuis.detailnya', ['id'=>$item->id]) }}" class="btn btn-beli btn-block stretched-link mb-2">Ikut Kuis</a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                          </div>
                          <div class="tab-pane fade" id="pills-blog" role="tabpanel" aria-labelledby="pills-blog-tab">
                            <div class="row">
                                <div class="owl-carousel owl-theme carousel-blog">
                                    @forelse ($blog as $query)
                                        <div class="col-lg-12">
                                            <div class="item item-kuis">
                                                <div class="card card-blog">
                                                    <img src="{{ asset('/storage/'.$query->file) }}" alt="gambar_mentor" class="wanita1 img-fluid">
                                                    <div class="col-lg-12">
                                                        <div class="row">
                                                            <div class="col-lg-6">
                                                                <h5 class="txt-kelas">{{ $query->title }}</h5>
                                                            </div>
                                                            <div class="col-lg-6">
                                                                <p class="pt-2 pl-5 br-kategori-blog">{{ $query->kategori }}</p>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-lg-12">
                                                                <p class="br-author-blog"> Author : {{ $query->author }} </p>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-lg-12">
                                                                <p class="br-deskripsi-blog"> {{-- ini nnti kasi limit --}}
                                                                    {{ Str::limit($query->isi, 100) }}
                                                                    <u style="color:blue; cursor: pointer;"><a href="{{ route('blog.show',$query->slug) }}">BACA SELENGKAPNYA</a></u> {{-- ini tembak ke details --}}
                                                                </p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <hr>
                                                    <div class="col-lg-12">
                                                        <div class="row">
                                                            <div class="col-lg-6 col-md-6 col-sm-6 col-12">
                                                                <p class="br-tgl"> {{ $query->created_at->toDateString() }} </p>
                                                            </div>
                                                            <div class="col-lg-6 col-md-6 col-sm-6 col-12">
                                                                <a href="{{ route('blog.show',$query->slug) }}" class="btn btn-beli btn-block stretched-link mb-2">Detail Blog</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @empty
                                        <div class="item item-kuis text-center ml-5 pl-5">
                                            <div class="alert alert-danger mt-5">
                                                <h4>Blog Not Found</h4>
                                            </div>
                                        </div>
                                    @endforelse
                                </div>
                            </div>
                          </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

    </main>



    @include('includes.footer')



    <script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
    {{--<script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>--}}
    {{--<script src="https://code.jquery.com/jquery-3.5.0.js"></script>--}}
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
        });

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

        $(document).ready(function(){
    		$('.card-blog').hover(
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

        $('.carousel-kelas').owlCarousel({
          //autoplay:true,
          autoplayHoverPause:true,
          // loop:true,
          margin:10,
          //lazyload:true,
          // margin:10,
          // stagePadding:5,
          responsive:{
            0:{
              items:1,
              dots:true
            },
            480:{
              items:1,
              dots:true
            },
            600:{
              items:2,
              dots:true
            },
            900:{
              items:3,
              dots:true
            },
            1000:{
                items:2,
                dots:true
            },
            1263:{
                items:2,
                dots:true
            },
            //2000:{
            //    items:3,
            //    dots:true
            //}
          }
        });

        $('.carousel-kuis').owlCarousel({
          //autoplay:true,
          autoplayHoverPause:true,
          // loop:true,
          margin:10,
          //lazyload:true,
          // margin:10,
          // stagePadding:5,
          responsive:{
            0:{
              items:1,
              dots:true
            },
            480:{
              items:1,
              dots:true
            },
            600:{
              items:2,
              dots:true
            },
            900:{
              items:3,
              dots:true
            },
            1000:{
                items:2,
                dots:true
            },
            1263:{
                items:2,
                dots:true
            },
            //2000:{
            //    items:3,
            //    dots:true
            //}
          }
        });

        $('.carousel-blog').owlCarousel({
          //autoplay:true,
          autoplayHoverPause:true,
          // loop:true,
          margin:10,
          //lazyload:true,
          // margin:10,
          // stagePadding:5,
          responsive:{
            0:{
              items:1,
              dots:true
            },
            480:{
              items:1,
              dots:true
            },
            600:{
              items:2,
              dots:true
            },
            900:{
              items:3,
              dots:true
            },
            1000:{
                items:2,
                dots:true
            },
            1263:{
                items:2,
                dots:true
            },
            //2000:{
            //    items:3,
            //    dots:true
            //}
          }
        });
    </script>
  </body>
</html>
