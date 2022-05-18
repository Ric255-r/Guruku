<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('dist/assets/owl.carousel.min.css') }}">
    <link rel="shortcut icon" sizes="57x57" href="{{ URL::asset('/Foto/favicon.png') }}">

    <link rel="stylesheet" type="text/css" href="{{ URL::asset('dist/assets/owl.theme.default.min.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('/css/kelasbaru.css') }}">
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
    <title>Blog</title>
  </head>
  <body>
    <header class="bck-color-mentor">
        @include('navs.navbar2')

        <div class="container-fluid">
            <div class="row text-center">
                <div class="col-lg-12" data-aos="zoom-out-down">
                    <h2 class="yuk-mentor-index">Blog</h2>
                    <p class="jgn-mentor">
                        Bacalah Blog supaya Pengetahuan mu lebih luas! <br>
                    </p>
                    <form action="{{ route('blog.cari') }}" method="get" class="form-inline justify-content-center">
                        <input class="form-control active-cyan-4 tipe" style="width:500px;"  type="text" placeholder="Search" name="b" id="b" value="{{ old('b') }}">
                    </form>
                </div>
            </div>
        </div>
    </header>

    <main>
        <section class="mentor-body mt-5">
            <div class="container">
                <div class="row justify-content-center">
                    @if ($blog->isEmpty())
                        <div class="alert alert-danger">
                            <h4>Blog not found!</h4>
                        </div>
                    @else
                        @foreach ($blog as $query)
                            <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6 col-12">
                                <div class="card card-blog mt-3" data-aos="zoom-out-up">
                                    <img src="{{ asset('/storage/'.$query->file) }}" alt="wanita1"
                                    class="wanita1 img-fluid" data-toggle="tooltip" title="{{ $query->title }}">
                                    <div class="col-lg-12">
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <h5 class="txt-kelas" data-toggle="tooltip" title="{{ $query->title }}">{{ Str::limit($query->title, '15') }}</h5>
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
                                                    {{ Str::limit(strip_tags($query->isi),'100') }}
                                                    <a href="{{ route('blog.show',$query->slug) }}"><u style="color:blue; cursor: pointer;">BACA SELENGKAPNYA</u></a>{{-- ini tembak ke details --}}
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="col-lg-12">
                                        <div class="row">
                                        <div class="col-lg-6 col-md-6 col-sm-6 col-12">
                                            <p class="br-tgl"> {{ $query->publish_date }} </p>
                                        </div>
                                        <div class="col-lg-6 col-md-6 col-sm-6 col-12">
                                            <a href="{{ route('blog.show',$query->slug) }}" class="btn btn-beli btn-block stretched-link mb-2">Detail Blog</a>
                                        </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @endif
                </div>
                <div class="row justify-content-center mt-2">
                    {{ $blog->links() }}
                </div>
            </div>
        </section>
    </main>

    @include('includes.footer')




    <script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
    {{--<script src="https://code.jquery.com/jquery-3.5.0.js"></script>--}}
    {{--<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>--}}
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    {{--<script src="{{ URL::asset('dist/owl.carousel.min.js') }}"></script>
    <script src="{{ URL::asset('mouse/query/jquery.mousewheel.min.js') }}"></script>--}}
    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
    <script>
      AOS.init({
        //  offset:400,
          duration:1000
      });
    </script>

    <script>
        $(document).ready(function(){
    		$('.kotak-blog').hover(
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
    </script>
  </body>
</html>
