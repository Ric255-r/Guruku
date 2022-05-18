<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="shortcut icon" sizes="57x57" href="{{ URL::asset('/Foto/favicon.png') }}">

    <link rel="stylesheet" type="text/css" href="{{ URL::asset('dist/assets/owl.carousel.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('dist/assets/owl.theme.default.min.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('/css/kelasbaru.css') }}">
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
    <title>Guru</title>
  </head>
  <body>
    <header class="bck-color-mentor">
        @include('navs.navbar2')

        <div class="container-fluid">
            <div class="row text-center">
                <div class="col-lg-12" data-aos="zoom-out-up" data-aos-delay="300">
                    <h2 class="yuk-mentor-index">Mentor Guruku</h2>
                    <p class="jgn-mentor">
                        Temukan mentor yang berpengalaman dan berkualitas <br>
                    </p>
                    <form action="{{ route('home.mentor.cari') }}" method="get" class="form-inline justify-content-center">
                        {{--@csrf--}}
                        <input class="form-control active-cyan-4 tipe" style="width:500px;"  type="text" placeholder="Search" name="s" id="s" value="{{ old('s') }}">
                        {{--<button class="btn btn-primary ml-3" style="width:100px;" type="submit">CARI</button>--}}
                    </form>
                </div>
            </div>
        </div>
    </header>

    <main>
        <section class="mentor-body mt-5">
            <div class="container">
                <div class="row justify-content-center">
                    @if ($mentor->isEmpty())
                        <div class="alert alert-danger">
                            <h4>Mentor Not Found</h4>
                        </div>
                    @else
                        @foreach ($mentor as $query)
                            <div class="col-xl-4 col-lg-4 col-md-6 col-sm-9 col-12 mt-3">
                                <div class="card card-mentor" data-aos="zoom-out" data-aos-delay="300">
                                    @if ($query->file == !null)
                                        <img src="{{ asset('/storage/'.$query->file) }}" alt="wanita1"
                                        data-toggle="tooltip"
                                        title="{{ $query->name }}"
                                        class="pic-mentor img-fluid">
                                    @else
                                        <img src="{{ URL::asset('/Foto/man.png') }}" alt="wanita1"
                                        data-toggle="tooltip"
                                        title="{{ $query->name }}"
                                        class="pic-mentor img-fluid">
                                    @endif
                                    <div class="kategori-baru ml-auto">
                                        {{ $query->kode_mentor }}
                                    </div>
                                    <div class="col-lg-12">
                                        <h5 class="txt-kelas" data-toggle="tooltip" title="{{ $query->name }}">{{ $query->name }}</h5>
                                        @if ($query->bidang != null)
                                            <h6 class="pb-2" data-toggle="tooltip" title="{{ $query->name }}">{{ $query->bidang }}</h6>
                                        @else
                                            <h6 class="pb-2" data-toggle="tooltip" title="{{ $query->name }}">-</h6>
                                        @endif
                                        @if ($query->deskripsi != null)
                                            <p class="mentor-deskripsi2">{{ Str::limit($query->deskripsi,'100') }}</p>
                                        @else
                                            <p class="mentor-deskripsi2">-</p>
                                        @endif
                                    </div>
                                    <hr>
                                    <div class="col-lg-12">
                                        <div class="row">
                                        <div class="col-lg-6 col-md-6 col-sm-6 col-12">
                                            <a href="{{ $query->instagram_profile }}" target="_blank"><i class="fa fa-instagram insta"></i></a>
                                            <a href="{{ $query->twitter_profile }}" target="_blank"><i class="fa fa-twitter" style=" font-size:30px;"></i></a>
                                            {{--<div class="row">
                                                <div class="col-lg-">
                                                    p
                                                </div>
                                                <div class="col-lg-">
                                                    hai
                                                </div>
                                            </div>--}}
                                        </div>
                                        <div class="col-lg-6 col-md-6 col-sm-6 col-12">
                                            <a href="{{ route('home.mentor.show',$query->kode_mentor) }}" class="btn btn-beli btn-block stretched-link mb-3">View Details</a>
                                        </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            {{--<div class="col-lg-4">
                                <div class="card card-mentor" style="min-height:400px;">
                                    @if ($query->file != null)
                                        <img src="{{ asset('/storage/'.$query->file) }}" class="card-img-top px-3 py-3 wanita1" alt="pic">
                                    @else
                                        <img src="{{ asset('/Foto/man.png') }}" class="card-img-top px-3 py-3 wanita1" alt="pic">
                                    @endif
                                    <div class="card-body">
                                        <h5 class="card-title">{{ $query->name }}</h5>
                                        <h6 class="card-title mentor-bidang">{{ $query->bidang }}</h6>
                                        <p class="card-text">{{ Str::limit($query->deskripsi,'50') }}</p>
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <a href="{{ $query->instagram_profile }}" target="_blank"><i class="fa fa-instagram insta"></i></a>
                                                <a href="{{ $query->twitter_profile }}" target="_blank"><i class="fa fa-twitter" style=" font-size:30px;"></i></a>
                                            </div>
                                            <div class="col-lg-6">
                                                <button class="btn btn-info" onclick="event.preventDefault(); location.href='{{route('home.mentor.show',$query->kode_mentor)}}';">View Details</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>--}}
                        @endforeach
                    @endif
                </div>
                <div class="row justify-content-center mt-2">
                    {{ $mentor->links() }}
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
    		$('.card-mentor').hover(
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
