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
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('dist/assets/owl.theme.default.min.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('/css/kelasbaru.css') }}">
    <link rel="shortcut icon" sizes="57x57" href="{{ URL::asset('/Foto/favicon.png') }}">
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css">
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <link rel="stylesheet" href="/resources/demos/style.css">

    {{-- Ak Pindahkan Scriptny Di Sini Ye --}}
    
    <script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    {{--<script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>--}}
    {{--<script src="https://code.jquery.com/jquery-3.5.0.js"></script>--}}
    {{--<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>--}}
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <script src="{{ URL::asset('dist/owl.carousel.min.js') }}"></script>
    <script src="{{ URL::asset('mouse/query/jquery.mousewheel.min.js') }}"></script>
    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
    {{-- EndScript --}}
    <title>Blog</title>
  </head>
  <style>
    .card-title {
        -ms-flex: 1 1 auto;
        flex: 1 1 auto;
        min-height: 1px;
        padding-right: 1.25rem;
        padding-left: 1.25rem;
    }
  </style>
  <body>
    @auth
        @if ($blog->jenis == 'kelas' AND $blog->kelas->jenis == 'gratis')
            {{--<header class="bck-color-mentor">--}}
                @include('navs.navbar2')

                {{--<div class="container-fluid">
                    <div class="row text-center">
                        <div class="col-lg-12" data-aos="fade-up" data-aos-delay="300">
                            <h2 class="yuk-mentor-index">Blog</h2>
                            <h3 class="yuk-mentor-index2">
                                {{ $blog->title }}
                            </h3>
                        </div>
                    </div>
                </div>--}}
            {{--</header>--}}

            <main>
                <section class="bck-color-mentor-show">
                    <div class="container">
                        <div class="row text-center">
                            <div class="col-lg-12" data-aos="fade-up" data-aos-delay="300">
                                <h2 class="yuk-mentor-index">Blog (auth) gratis</h2>
                                <h3 class="yuk-mentor-index2">
                                    {{ $blog->title }}
                                </h3>
                            </div>
                        </div>
                    </div>
                </section>

                <section class="br-blog">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-8" data-aos="fade-up" data-aos-delay="400">
                                <div class="card br-isi-blog px-3">
                                    <img src="{{ asset('/storage/'.$blog->file) }}" alt="pic-blog" class="img-fluid br-banner-blog">
                                    <p class="br-blog-kategori text-center">
                                        {{ $blog->kategori }} - {{ $blog->topik }}
                                        @if ($bookmark->count() > 0)
                                            @foreach ($bookmark as $query)
                                                @if ($query->status == '1')
                                                    {{--@if (session('success'))
                                                        <div class="alert alert-success">
                                                            {{ session('success') }}
                                                        </div>
                                                    @endif--}}
                                                    <form action="{{ route('bookmark.update',$query->id) }}" method="post">
                                                        @csrf
                                                        @method('PUT')
                                                        <input type="text" name="blog_id" value="{{ $blog->slug }}" hidden>
                                                        <input type="text" name="user_id" value="{{ Auth::user()->id }}" hidden>
                                                        <input type="text" name="status" value="0" hidden>
                                                        <button type="submit" style="border:none; background-color:white; margin-top:-20px;" class="float-right"
                                                            onclick="return confirm('Apakah anda ingin menghapus dari favorit list?')">
                                                            <i class="fas fa-heart bookmark-merah"></i>
                                                        </button>
                                                    </form>
                                                    {{--<p>bookmark ini uda love</p>--}}
                                                @else
                                                    {{--@if (session('success2'))
                                                        <div class="alert alert-success">
                                                            {{ session('success2') }}
                                                        </div>
                                                    @endif--}}
                                                    <form action="{{ route('bookmark.update',$query->id) }}" method="post">
                                                        @csrf
                                                        @method('PUT')
                                                        <input type="text" name="blog_id" value="{{ $blog->slug }}" hidden>
                                                        <input type="text" name="user_id" value="{{ Auth::user()->id }}" hidden>
                                                        <input type="text" name="status" value="1" hidden>
                                                        <button type="submit" style="border:none; background-color:white; margin-top:-20px;" class="float-right"
                                                            onclick="return confirm('Apakah anda ingin menambahkannya kedalam favorit list?')">
                                                            <i class="fas fa-heart bookmark-kosong"></i>
                                                        </button>
                                                    </form>
                                                    {{--<p>bookmark ini blm love</p>--}}
                                                @endif
                                            @endforeach
                                        @else
                                            {{--@if (session('success_tambah'))
                                                <div class="alert alert-success">
                                                    {{ session('success_tambah') }}
                                                </div>
                                            @endif--}}
                                            <form action="{{ route('bookmark.store') }}" method="post">
                                                @csrf
                                                <input type="text" name="blog_id" value="{{ $blog->slug }}" hidden>
                                                <input type="text" name="user_id" value="{{ Auth::user()->id }}" hidden>
                                                <input type="text" name="status" value="1" hidden>
                                                {{--<input type="text" name="slug" value="{{ $blog-> }}">--}}
                                                {{--{{ $req = request()->get($blog->slug) }}--}}
                                                <button type="submit" style="border:none; background-color:white; margin-top:-20px;" class="float-right"
                                                    onclick="return confirm('Apakah anda ingin menambahkannya kedalam favorit list anda?')">
                                                    <i class="fas fa-heart bookmark-kosong"></i>
                                                </button>
                                            </form>
                                            {{--<p>buat tambah ke bookmark</p>--}}
                                        @endif
                                    </p>
                                    <i class="fas fa-hearth"></i>
                                    <h4 class="br-blog-title text-center">{{ $blog->title }}</h4>
                                    <p class="br-blog-subtitle text-center">{{ $blog->subtitle }}</p>
                                    <p class="br-blog-isi">
                                        {!! $blog->isi !!}
                                    </p>
                                    <hr class="br-blog-garis">
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="media">
                                                <a href="{{ route('home.mentor.show',$blog->mentor->kode_mentor) }}">
                                                    <img class="mr-3 br-blog-pic-guru" src="{{ asset('/storage/'.$blog->mentor->file) }}" alt="Generic placeholder image">
                                                </a>
                                                <div class="media-body">
                                                <h5 class="mt-0 br-blog-nama">{{ $blog->mentor->name }}</h5>
                                                <p class="br-blog-bidang">{{ $blog->mentor->bidang }}</p>
                                                <p class="br-blog-mentor-deskripsi">
                                                    {{ Str::limit($blog->mentor->deskripsi,'120') }}
                                                </p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4" data-aos="fade-up" data-aos-delay="500">
                                <div class="card br-card-kategori px-3 overflow-auto sticky-top mt-md-3 mt-3 mt-lg-0"
                                    style="height:500px;">
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <h6 class="br-blog-lihat-blog">
                                                <span class="br-blog-kategori-lihat"> Lihat Blog Dengan Kategori </span>
                                                <span class="br-blog-kategori-lain">'{{ $blog->kategori }}'</span>
                                            </h6>
                                            @foreach ($lain as $query)
                                                @if ($query->kategori == $blog->kategori)
                                                    <div class="media mt-2">
                                                        <a href="{{ route('blog.show',$query->slug) }}">
                                                            <img class="mr-3 br-blog-pic-guru-kategori" src="{{ asset('/storage/'.$query->file) }}" alt="Generic placeholder image">
                                                        </a>
                                                        <div class="media-body">
                                                        <a href="{{ route('blog.show',$query->slug) }}">
                                                            <h5 class="mt-0 br-blog-title-kategori">{{ $query->title }}</h5>
                                                        </a>
                                                        <p class="br-blog-create-kategori">{{ $query->publish_date }}</p>
                                                        <p class="br-blog-mentor-deskripsi-kategori">
                                                            {{ Str::limit(strip_tags($query->isi),'50') }} <a href="{{ route('blog.show',$query->slug) }}" class="br-blog-baca-lengkap">BACA SELENGKAPNYA</a>
                                                        </p>
                                                        </div>
                                                    </div>
                                                @endif
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>

                <section class="br-blog-lain">
                    <div class="container">
                        {{-- Komentar --}}
                        @include('blog.komen')
                        {{-- End Comment --}}
                        <div class="row">
                            <div class="col-lg-12" data-aos="fade-up" data-aos-delay="300">
                                <h4 class="br-blog-txt-lain">Lihat blog lainnya</h4>
                            </div>
                        </div>
                        <div class="row" data-aos="fade-up" data-aos-delay="400">
                            <div class="owl-carousel owl-theme carousel-blog">
                                @foreach ($bloglain as $query)
                                    <div class="item">
                                        <div class="card card-blog mt-3">
                                            <img src="{{ asset('/storage/'.$query->file) }}" alt="wanita1" class="wanita1 img-fluid" data-toggle="tooltip" title="{{ $query->title }}">
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
                                                        <p class="br-deskripsi-blog">
                                                            {{ Str::limit(strip_tags($query->isi), '100') }}
                                                            <a href="{{ route('blog.show',$query->slug) }}"><u style="color:blue; cursor: pointer;">BACA SELENGKAPNYA</u></a>
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
                            </div>
                        </div>
                    </div>
                </section>
            </main>

            @include('includes.footer')

            {{--<p>blog jenis kelas dengan kelas jenis gratis (bebas akses)</p>--}}
        @elseif($blog->jenis == 'lainnya')
            {{--<header class="bck-color-mentor">--}}
                @include('navs.navbar2')

                {{--<div class="container-fluid">
                    <div class="row text-center">
                        <div class="col-lg-12" data-aos="fade-up" data-aos-delay="300">
                            <h2 class="yuk-mentor-index">Blog</h2>
                            <h3 class="yuk-mentor-index2">
                                {{ $blog->title }}
                            </h3>
                        </div>
                    </div>
                </div>--}}
            {{--</header>--}}

            <main>
                <section class="bck-color-mentor-show">
                    <div class="container">
                        <div class="row text-center">
                            <div class="col-lg-12" data-aos="fade-up" data-aos-delay="300">
                                <h2 class="yuk-mentor-index">Blog (auth) lainnya</h2>
                                <h3 class="yuk-mentor-index2">
                                    {{ $blog->title }}
                                </h3>
                            </div>
                        </div>
                    </div>
                </section>

                <section class="br-blog">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-8" data-aos="fade-up" data-aos-delay="400">
                                <div class="card br-isi-blog px-3">
                                    <img src="{{ asset('/storage/'.$blog->file) }}" alt="pic-blog" class="img-fluid br-banner-blog">
                                    <p class="br-blog-kategori text-center">
                                        {{ $blog->kategori }} - {{ $blog->topik }}
                                        @if ($bookmark->count() > 0)
                                            @foreach ($bookmark as $query)
                                                @if ($query->status == '1')
                                                    {{--@if (session('success'))
                                                        <div class="alert alert-success">
                                                            {{ session('success') }}
                                                        </div>
                                                    @endif--}}
                                                    <form action="{{ route('bookmark.update',$query->id) }}" method="post">
                                                        @csrf
                                                        @method('PUT')
                                                        <input type="text" name="blog_id" value="{{ $blog->slug }}" hidden>
                                                        <input type="text" name="user_id" value="{{ Auth::user()->id }}" hidden>
                                                        <input type="text" name="status" value="0" hidden>
                                                        <button type="submit" style="border:none; background-color:white; margin-top:-20px;" class="float-right"
                                                            onclick="return confirm('Apakah anda ingin menghapus dari favorit list?')">
                                                            <i class="fas fa-heart bookmark-merah"></i>
                                                        </button>
                                                    </form>
                                                    {{--<p>bookmark ini uda love</p>--}}
                                                @else
                                                    {{--@if (session('success2'))
                                                        <div class="alert alert-success">
                                                            {{ session('success2') }}
                                                        </div>
                                                    @endif--}}
                                                    <form action="{{ route('bookmark.update',$query->id) }}" method="post">
                                                        @csrf
                                                        @method('PUT')
                                                        <input type="text" name="blog_id" value="{{ $blog->slug }}" hidden>
                                                        <input type="text" name="user_id" value="{{ Auth::user()->id }}" hidden>
                                                        <input type="text" name="status" value="1" hidden>
                                                        <button type="submit" style="border:none; background-color:white; margin-top:-20px;" class="float-right"
                                                            onclick="return confirm('Apakah anda ingin menambahkannya kedalam favorit list?')">
                                                            <i class="fas fa-heart bookmark-kosong"></i>
                                                        </button>
                                                    </form>
                                                    {{--<p>bookmark ini blm love</p>--}}
                                                @endif
                                            @endforeach
                                        @else
                                            {{--@if (session('success_tambah'))
                                                <div class="alert alert-success">
                                                    {{ session('success_tambah') }}
                                                </div>
                                            @endif--}}
                                            <form action="{{ route('bookmark.store') }}" method="post">
                                                @csrf
                                                <input type="text" name="blog_id" value="{{ $blog->slug }}" hidden>
                                                <input type="text" name="user_id" value="{{ Auth::user()->id }}" hidden>
                                                <input type="text" name="status" value="1" hidden>
                                                {{--<input type="text" name="slug" value="{{ $blog-> }}">--}}
                                                {{--{{ $req = request()->get($blog->slug) }}--}}
                                                <button type="submit" style="border:none; background-color:white; margin-top:-20px;" class="float-right"
                                                    onclick="return confirm('Apakah anda ingin menambahkannya kedalam favorit list anda?')">
                                                    <i class="fas fa-heart bookmark-kosong"></i>
                                                </button>
                                            </form>
                                            {{--<p>buat tambah ke bookmark</p>--}}
                                        @endif
                                        {{--<span class="float-right"><i class="fas fa-heart" style="color:#7e7e7e; cursor:pointer;"></i></span>--}}
                                    </p>
                                    <h4 class="br-blog-title text-center">{{ $blog->title }}</h4>
                                    <p class="br-blog-subtitle text-center">{{ $blog->subtitle }}</p>
                                    <p class="br-blog-isi">
                                        {!! $blog->isi !!}
                                    </p>
                                    <hr class="br-blog-garis">
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="media">
                                                <a href="{{ route('home.mentor.show',$blog->mentor->kode_mentor) }}">
                                                    <img class="mr-3 br-blog-pic-guru" src="{{ asset('/storage/'.$blog->mentor->file) }}" alt="Generic placeholder image">
                                                </a>
                                                <div class="media-body">
                                                <h5 class="mt-0 br-blog-nama">{{ $blog->mentor->name }}</h5>
                                                <p class="br-blog-bidang">{{ $blog->mentor->bidang }}</p>
                                                <p class="br-blog-mentor-deskripsi">
                                                    {{ Str::limit($blog->mentor->deskripsi,'120') }}
                                                </p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4" data-aos="fade-up" data-aos-delay="500">
                                <div class="card br-card-kategori px-3 overflow-auto sticky-top mt-md-3 mt-3 mt-lg-0"
                                    style="height:500px;">
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <h6 class="br-blog-lihat-blog">
                                                <span class="br-blog-kategori-lihat"> Lihat Blog Dengan Kategori </span>
                                                <span class="br-blog-kategori-lain">'{{ $blog->kategori }}'</span>
                                            </h6>
                                            @foreach ($lain as $query)
                                                @if ($query->kategori == $blog->kategori)
                                                    <div class="media mt-2">
                                                        <a href="{{ route('blog.show',$query->slug) }}">
                                                            <img class="mr-3 br-blog-pic-guru-kategori" src="{{ asset('/storage/'.$query->file) }}" alt="Generic placeholder image">
                                                        </a>
                                                        <div class="media-body">
                                                        <a href="{{ route('blog.show',$query->slug) }}">
                                                            <h5 class="mt-0 br-blog-title-kategori">{{ $query->title }}</h5>
                                                        </a>
                                                        <p class="br-blog-create-kategori">{{ $query->publish_date }}</p>
                                                        <p class="br-blog-mentor-deskripsi-kategori">
                                                            {{ Str::limit(strip_tags($query->isi),'50') }} <a href="{{ route('blog.show',$query->slug) }}" class="br-blog-baca-lengkap">BACA SELENGKAPNYA</a>
                                                        </p>
                                                        </div>
                                                    </div>
                                                @endif
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>

                <section class="br-blog-lain">
                    <div class="container">
                        {{-- Komentar --}}
                        @include('blog.komen')
                        {{-- End Comment --}}
                        <div class="row mt-5">
                            <div class="col-lg-12" data-aos="fade-up" data-aos-delay="300">
                                <h4 class="br-blog-txt-lain">Lihat blog lainnya</h4>
                            </div>
                        </div>
                        <div class="row" data-aos="fade-up" data-aos-delay="400">
                            <div class="owl-carousel owl-theme carousel-blog">
                                @foreach ($bloglain as $query)
                                    <div class="item">
                                        <div class="card card-blog mt-3">
                                            <img src="{{ asset('/storage/'.$query->file) }}" alt="wanita1" class="wanita1 img-fluid" data-toggle="tooltip" title="{{ $query->title }}">
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
                                                        <p class="br-deskripsi-blog">
                                                            {{ Str::limit(strip_tags($query->isi), '100') }}
                                                            <a href="{{ route('blog.show',$query->slug) }}"><u style="color:blue; cursor: pointer;">BACA SELENGKAPNYA</u></a>
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
                            </div>
                        </div>
                    </div>
                </section>
            </main>

            @include('includes.footer')

            {{--<p>blog jenis lainnya (bole akses)</p>--}}
        @else
            @if ($transaction->count() > 0)
                {{--<header class="bck-color-mentor">--}}
                    @include('navs.navbar2')

                    {{--<div class="container-fluid">
                        <div class="row text-center">
                            <div class="col-lg-12" data-aos="fade-up" data-aos-delay="300">
                                <h2 class="yuk-mentor-index">Blog</h2>
                                <h3 class="yuk-mentor-index2">
                                    {{ $blog->title }}
                                </h3>
                            </div>
                        </div>
                    </div>--}}
                {{--</header>--}}

                <main>

                    <section class="bck-color-mentor-show">
                        <div class="container">
                            <div class="row text-center">
                                <div class="col-lg-12" data-aos="fade-up" data-aos-delay="300">
                                    <h2 class="yuk-mentor-index">Blog</h2>
                                    <h3 class="yuk-mentor-index2">
                                        {{ $blog->title }}
                                    </h3>
                                </div>
                            </div>
                        </div>
                    </section>

                    <section class="br-blog">
                        <div class="container">
                            <div class="row">
                                <div class="col-lg-8" data-aos="fade-up" data-aos-delay="400">
                                    <div class="card br-isi-blog px-3">
                                        <img src="{{ asset('/storage/'.$blog->file) }}" alt="pic-blog" class="img-fluid br-banner-blog">
                                        <p class="br-blog-kategori text-center">
                                            {{ $blog->kategori }} - {{ $blog->topik }}
                                            @if ($bookmark->count() > 0)
                                                @foreach ($bookmark as $query)
                                                    @if ($query->status == '1')
                                                        {{--@if (session('success'))
                                                            <div class="alert alert-success">
                                                                {{ session('success') }}
                                                            </div>
                                                        @endif--}}
                                                        <form action="{{ route('bookmark.update',$query->id) }}" method="post">
                                                            @csrf
                                                            @method('PUT')
                                                            <input type="text" name="blog_id" value="{{ $blog->slug }}" hidden>
                                                            <input type="text" name="user_id" value="{{ Auth::user()->id }}" hidden>
                                                            <input type="text" name="status" value="0" hidden>
                                                            <button type="submit" style="border:none; background-color:white; margin-top:-20px;" class="float-right"
                                                                onclick="return confirm('Apakah anda ingin menghapus dari favorit list?')">
                                                                <i class="fas fa-heart bookmark-merah"></i>
                                                            </button>
                                                        </form>
                                                        {{--<p>bookmark ini uda love</p>--}}
                                                    @else
                                                        {{--@if (session('success2'))
                                                            <div class="alert alert-success">
                                                                {{ session('success2') }}
                                                            </div>
                                                        @endif--}}
                                                        <form action="{{ route('bookmark.update',$query->id) }}" method="post">
                                                            @csrf
                                                            @method('PUT')
                                                            <input type="text" name="blog_id" value="{{ $blog->slug }}" hidden>
                                                            <input type="text" name="user_id" value="{{ Auth::user()->id }}" hidden>
                                                            <input type="text" name="status" value="1" hidden>
                                                            <button type="submit" style="border:none; background-color:white; margin-top:-20px;" class="float-right"
                                                                onclick="return confirm('Apakah anda ingin menambahkannya kedalam favorit list?')">
                                                                <i class="fas fa-heart bookmark-kosong"></i>
                                                            </button>
                                                        </form>
                                                        {{--<p>bookmark ini blm love</p>--}}
                                                    @endif
                                                @endforeach
                                            @else
                                                {{--@if (session('success_tambah'))
                                                    <div class="alert alert-success">
                                                        {{ session('success_tambah') }}
                                                    </div>
                                                @endif--}}
                                                <form action="{{ route('bookmark.store') }}" method="post">
                                                    @csrf
                                                    <input type="text" name="blog_id" value="{{ $blog->slug }}" hidden>
                                                    <input type="text" name="user_id" value="{{ Auth::user()->id }}" hidden>
                                                    <input type="text" name="status" value="1" hidden>
                                                    {{--<input type="text" name="slug" value="{{ $blog-> }}">--}}
                                                    {{--{{ $req = request()->get($blog->slug) }}--}}
                                                    <button type="submit" style="border:none; background-color:white; margin-top:-20px;" class="float-right"
                                                        onclick="return confirm('Apakah anda ingin menambahkannya kedalam favorit list anda?')">
                                                        <i class="fas fa-heart bookmark-kosong"></i>
                                                    </button>
                                                </form>
                                                {{--<p>buat tambah ke bookmark</p>--}}
                                            @endif
                                        </p>
                                        <h4 class="br-blog-title text-center">{{ $blog->title }}</h4>
                                        <p class="br-blog-subtitle text-center">{{ $blog->subtitle }}</p>
                                        <p class="br-blog-isi">
                                            {!! $blog->isi !!}
                                        </p>
                                        <hr class="br-blog-garis">
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <div class="media">
                                                    <a href="{{ route('home.mentor.show',$blog->mentor->kode_mentor) }}">
                                                        <img class="mr-3 br-blog-pic-guru" src="{{ asset('/storage/'.$blog->mentor->file) }}" alt="Generic placeholder image">
                                                    </a>
                                                    <div class="media-body">
                                                    <h5 class="mt-0 br-blog-nama">{{ $blog->mentor->name }}</h5>
                                                    <p class="br-blog-bidang">{{ $blog->mentor->bidang }}</p>
                                                    <p class="br-blog-mentor-deskripsi">
                                                        {{ Str::limit($blog->mentor->deskripsi,'120') }}
                                                    </p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4" data-aos="fade-up" data-aos-delay="500">
                                    <div class="card br-card-kategori px-3 overflow-auto sticky-top mt-md-3 mt-3 mt-lg-0"
                                        style="height:500px;" data-aos="zoom-out-down">
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <h6 class="br-blog-lihat-blog">
                                                    <span class="br-blog-kategori-lihat"> Lihat Blog Dengan Kategori </span>
                                                    <span class="br-blog-kategori-lain">'{{ $blog->kategori }}'</span>
                                                </h6>
                                                @foreach ($lain as $query)
                                                    @if ($query->kategori == $blog->kategori)
                                                        <div class="media mt-2">
                                                            <a href="{{ route('blog.show',$query->slug) }}">
                                                                <img class="mr-3 br-blog-pic-guru-kategori" src="{{ asset('/storage/'.$query->file) }}" alt="Generic placeholder image">
                                                            </a>
                                                            <div class="media-body">
                                                            <a href="{{ route('blog.show',$query->slug) }}">
                                                                <h5 class="mt-0 br-blog-title-kategori">{{ $query->title }}</h5>
                                                            </a>
                                                            <p class="br-blog-create-kategori">{{ $query->publish_date }}</p>
                                                            <p class="br-blog-mentor-deskripsi-kategori">
                                                                {{ Str::limit($query->isi,'50') }} <a href="{{ route('blog.show',$query->slug) }}" class="br-blog-baca-lengkap">BACA SELENGKAPNYA</a>
                                                            </p>
                                                            </div>
                                                        </div>
                                                    @endif
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>

                    <section class="br-blog-lain">
                        <div class="container">
                            {{-- Komentar --}}
                            @include('blog.komen')
                            {{-- End Comment --}}
                            <div class="row">
                                <div class="col-lg-12" data-aos="fade-up" data-aos-delay="300">
                                    <h4 class="br-blog-txt-lain">Lihat blog lainnya</h4>
                                </div>
                            </div>
                            <div class="row" data-aos="fade-up" data-aos-delay="400">
                                <div class="owl-carousel owl-theme carousel-blog">
                                    @foreach ($bloglain as $query)
                                        <div class="item">
                                            <div class="card card-blog mt-3">
                                                <img src="{{ asset('/storage/'.$query->file) }}" alt="wanita1" class="wanita1 img-fluid" data-toggle="tooltip" title="{{ $query->title }}">
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
                                                            <p class="br-deskripsi-blog">
                                                                {{ Str::limit(strip_tags($query->isi), '100') }}
                                                                <a href="{{ route('blog.show',$query->slug) }}"><u style="color:blue; cursor: pointer;">BACA SELENGKAPNYA</u></a>
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
                                </div>
                            </div>
                        </div>
                    </section>
                </main>

                @include('includes.footer')
                {{--<p>si user uda beli kelas (bole akses)</p>--}}
            @else
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12" style="text-align: center;">
                            <img src="{{ asset('/Foto/forbidden.jpg') }}" class="img-fluid mx-auto d-block mt-5" alt="">
                            <h3 style="color:#242424; font-weight:700;" class="text-center mt-3">Oops!</h3>
                            <h4 class="text-center" style="color:#242424; font-weight:400;">Anda tidak memiliki akses untuk halaman ini!</h4>
                            <a href="{{ url('/blog') }}" class="btn btn-primary text-white mt-3">Kembali Ke Home</a>
                        </div>
                    </div>
                </div>
                {{--<p>Blm beli kelas</p>--}}
            @endif
        @endif
    @endauth

    @guest
        @if ($blog->jenis == 'kelas' AND $blog->kelas->jenis == 'gratis')

            {{--<header class="bck-color-mentor">--}}
                @include('navs.navbar2')

                {{--<div class="container-fluid">
                    <div class="row text-center">
                        <div class="col-lg-12" data-aos="zoom-out-down">
                            <h2 class="yuk-mentor-index">Blog</h2>
                            <h3 class="yuk-mentor-index2">
                                {{ $blog->title }}
                            </h3>
                        </div>
                    </div>
                </div>--}}
            {{--</header>--}}

            <main>

                <section class="bck-color-mentor-show">
                    <div class="container">
                        <div class="row text-center">
                            <div class="col-lg-12" data-aos="fade-up" data-aos-delay="300">
                                <h2 class="yuk-mentor-index">Blog</h2>
                                <h3 class="yuk-mentor-index2">
                                    {{ $blog->title }}
                                </h3>
                            </div>
                        </div>
                    </div>
                </section>

                <section class="br-blog">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-8">
                                <div class="card br-isi-blog px-3" data-aos="zoom-out-down">
                                    <img src="{{ asset('/storage/'.$blog->file) }}" alt="pic-blog" class="img-fluid br-banner-blog">
                                    <p class="br-blog-kategori text-center">
                                        {{ $blog->kategori }} - {{ $blog->topik }}
                                        <button type="submit" style="border:none; background-color:white; margin-top:-3px;" class="float-right"
                                            onclick="alert('Login terlebih dahulu ya!'); event.preventDefault(); location.href='{{ url('login') }}';">
                                            <i class="fas fa-heart bookmark-kosong"></i>
                                        </button>
                                    </p>
                                    <h4 class="br-blog-title text-center">{{ $blog->title }}</h4>
                                    <p class="br-blog-subtitle text-center">{{ $blog->subtitle }}</p>
                                    <p class="br-blog-isi">
                                        {!! $blog->isi !!}
                                    </p>
                                    <hr class="br-blog-garis">
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="media">
                                                <a href="{{ route('home.mentor.show',$blog->mentor->kode_mentor) }}">
                                                    <img class="mr-3 br-blog-pic-guru" src="{{ asset('/storage/'.$blog->mentor->file) }}" alt="Generic placeholder image">
                                                </a>
                                                <div class="media-body">
                                                <h5 class="mt-0 br-blog-nama">{{ $blog->mentor->name }}</h5>
                                                <p class="br-blog-bidang">{{ $blog->mentor->bidang }}</p>
                                                <p class="br-blog-mentor-deskripsi">
                                                    {{ Str::limit($blog->mentor->deskripsi,'120') }}
                                                </p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="card br-card-kategori px-3 overflow-auto sticky-top mt-md-3 mt-3 mt-lg-0"
                                    style="height:500px;" data-aos="zoom-out-down">
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <h6 class="br-blog-lihat-blog">
                                                <span class="br-blog-kategori-lihat"> Lihat Blog Dengan Kategori </span>
                                                <span class="br-blog-kategori-lain">'{{ $blog->kategori }}'</span>
                                            </h6>
                                            @foreach ($lain as $query)
                                                @if ($query->kategori == $blog->kategori)
                                                    <div class="media mt-2">
                                                        <a href="{{ route('blog.show',$query->slug) }}">
                                                            <img class="mr-3 br-blog-pic-guru-kategori" src="{{ asset('/storage/'.$query->file) }}" alt="Generic placeholder image">
                                                        </a>
                                                        <div class="media-body">
                                                        <a href="{{ route('blog.show',$query->slug) }}">
                                                            <h5 class="mt-0 br-blog-title-kategori">{{ $query->title }}</h5>
                                                        </a>
                                                        <p class="br-blog-create-kategori">{{ $query->publish_date }}</p>
                                                        <p class="br-blog-mentor-deskripsi-kategori">
                                                            {{ Str::limit(strip_tags($query->isi),'50') }} <a href="{{ route('blog.show',$query->slug) }}" class="br-blog-baca-lengkap">BACA SELENGKAPNYA</a>
                                                        </p>
                                                        </div>
                                                    </div>
                                                @endif
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>

                <section class="br-blog-lain">
                    <div class="container">
                        {{-- Komentar --}}
                        @include('blog.komen')
                        {{-- End Comment --}}
                        <div class="row">
                            <div class="col-lg-12">
                                <h4 class="br-blog-txt-lain">Lihat blog lainnya</h4>
                            </div>
                        </div>
                        <div class="row">
                            <div class="owl-carousel owl-theme carousel-blog">
                                @foreach ($bloglain as $query)
                                    <div class="item">
                                        <div class="card card-blog mt-3" data-aos="zoom-out-up">
                                            <img src="{{ asset('/storage/'.$query->file) }}" alt="wanita1" class="wanita1 img-fluid" data-toggle="tooltip" title="{{ $query->title }}">
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
                                                        <p class="br-deskripsi-blog">
                                                            {{ Str::limit(strip_tags($query->isi), '100') }}
                                                            <a href="{{ route('blog.show',$query->slug) }}"><u style="color:blue; cursor: pointer;">BACA SELENGKAPNYA</u></a>
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
                            </div>
                        </div>
                    </div>
                </section>
            </main>

            @include('includes.footer')

        @elseif($blog->jenis == 'kelas' AND $blog->kelas->jenis == 'bayar')
            <div class="container">
                <div class="row">
                    <div class="col-lg-12" style="text-align: center;">
                        <img src="{{ asset('/Foto/forbidden.jpg') }}" class="img-fluid mx-auto d-block mt-5" alt="">
                        <h3 style="color:#242424; font-weight:700;" class="text-center mt-3">Oops!</h3>
                        <h4 class="text-center" style="color:#242424; font-weight:400;">Anda tidak memiliki akses untuk halaman ini!</h4>
                        <a href="{{ url('/blog') }}" class="btn btn-primary text-white mt-3">Kembali Ke Home</a>
                    </div>
                </div>
            </div>
        @elseif($blog->jenis == 'lainnya')
            {{--<header class="bck-color-mentor">--}}
                @include('navs.navbar2')

                {{--<div class="container-fluid">
                    <div class="row text-center">
                        <div class="col-lg-12" data-aos="zoom-out-down">
                            <h2 class="yuk-mentor-index">Blog</h2>
                            <h3 class="yuk-mentor-index2">
                                {{ $blog->title }}
                            </h3>
                        </div>
                    </div>
                </div>--}}
            {{--</header>--}}

            <main>

                <section class="bck-color-mentor-show">
                    <div class="container">
                        <div class="row text-center">
                            <div class="col-lg-12" data-aos="fade-up" data-aos-delay="300">
                                <h2 class="yuk-mentor-index">Blog (guest) lainnya</h2>
                                <h3 class="yuk-mentor-index2">
                                    {{ $blog->title }}
                                </h3>
                            </div>
                        </div>
                    </div>
                </section>

                <section class="br-blog">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-8">
                                <div class="card br-isi-blog px-3" data-aos="zoom-out-down">
                                    <img src="{{ asset('/storage/'.$blog->file) }}" alt="pic-blog" class="img-fluid br-banner-blog">
                                    <p class="br-blog-kategori text-center">
                                        {{ $blog->kategori }} - {{ $blog->topik }}
                                        <button type="submit" style="border:none; background-color:white; margin-top:-3px;" class="float-right"
                                            onclick="alert('Login terlebih dahulu ya!'); event.preventDefault(); location.href='{{ url('login') }}';">
                                            <i class="fas fa-heart bookmark-kosong"></i>
                                        </button>
                                        {{--<button type="submit" style="border:none; background-color:white; margin-top:-3px;" class="float-right"
                                            onclick="event.preventDefault(); location.href='{{ url('login') }}'; return confirm('Login terlebih dahulu ya!')">
                                            <i class="fas fa-heart bookmark-kosong"></i>
                                        </button>--}}
                                    </p>
                                    <h4 class="br-blog-title text-center">{{ $blog->title }}</h4>
                                    <p class="br-blog-subtitle text-center">{{ $blog->subtitle }}</p>
                                    <p class="br-blog-isi">
                                        {!! $blog->isi !!}
                                    </p>
                                    <hr class="br-blog-garis">
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="media">
                                                <a href="{{ route('home.mentor.show',$blog->mentor->kode_mentor) }}">
                                                    <img class="mr-3 br-blog-pic-guru" src="{{ asset('/storage/'.$blog->mentor->file) }}" alt="Generic placeholder image">
                                                </a>
                                                <div class="media-body">
                                                <h5 class="mt-0 br-blog-nama">{{ $blog->mentor->name }}</h5>
                                                <p class="br-blog-bidang">{{ $blog->mentor->bidang }}</p>
                                                <p class="br-blog-mentor-deskripsi">
                                                    {{ Str::limit($blog->mentor->deskripsi,'120') }}
                                                </p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="card br-card-kategori px-3 overflow-auto sticky-top mt-md-3 mt-3 mt-lg-0"
                                    style="height:500px;" data-aos="zoom-out-down">
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <h6 class="br-blog-lihat-blog">
                                                <span class="br-blog-kategori-lihat"> Lihat Blog Dengan Kategori </span>
                                                <span class="br-blog-kategori-lain">'{{ $blog->kategori }}'</span>
                                            </h6>
                                            @foreach ($lain as $query)
                                                @if ($query->kategori == $blog->kategori)
                                                    <div class="media mt-2">
                                                        <a href="{{ route('blog.show',$query->slug) }}">
                                                            <img class="mr-3 br-blog-pic-guru-kategori" src="{{ asset('/storage/'.$query->file) }}" alt="Generic placeholder image">
                                                        </a>
                                                        <div class="media-body">
                                                        <a href="{{ route('blog.show',$query->slug) }}">
                                                            <h5 class="mt-0 br-blog-title-kategori">{{ $query->title }}</h5>
                                                        </a>
                                                        <p class="br-blog-create-kategori">{{ $query->publish_date }}</p>
                                                        <p class="br-blog-mentor-deskripsi-kategori">
                                                            {{ Str::limit(strip_tags($query->isi),'50') }} <a href="{{ route('blog.show',$query->slug) }}" class="br-blog-baca-lengkap">BACA SELENGKAPNYA</a>
                                                        </p>
                                                        </div>
                                                    </div>
                                                @endif
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>

                <section class="br-blog-lain">
                    <div class="container">
                        {{-- Komentar --}}
                        @include('blog.komen')
                        {{-- End Comment --}}
                        <div class="row">
                            <div class="col-lg-12">
                                <h4 class="br-blog-txt-lain">Lihat blog lainnya</h4>
                            </div>
                        </div>
                        <div class="row">
                            <div class="owl-carousel owl-theme carousel-blog">
                                @foreach ($bloglain as $query)
                                    <div class="item">
                                        <div class="card card-blog mt-3" data-aos="zoom-out-up">
                                            <img src="{{ asset('/storage/'.$query->file) }}" alt="wanita1" class="wanita1 img-fluid" data-toggle="tooltip" title="{{ $query->title }}">
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
                                                        <p class="br-deskripsi-blog">
                                                            {{ Str::limit(strip_tags($query->isi), '100') }}
                                                            <a href="{{ route('blog.show',$query->slug) }}"><u style="color:blue; cursor: pointer;">BACA SELENGKAPNYA</u></a>
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
                            </div>
                        </div>
                    </div>
                </section>
            </main>

            @include('includes.footer')

        @else
            <div class="container">
                <div class="row">
                    <div class="col-lg-12" style="text-align: center;">
                        <img src="{{ asset('/Foto/forbidden.jpg') }}" class="img-fluid mx-auto d-block mt-5" alt="">
                        <h3 style="color:#242424; font-weight:700;" class="text-center mt-3">Oops!</h3>
                        <h4 class="text-center" style="color:#242424; font-weight:400;">Anda tidak memiliki akses untuk halaman ini!</h4>
                        <a href="{{ url('/blog') }}" class="btn btn-primary text-white mt-3">Kembali Ke Home</a>
                    </div>
                </div>
            </div>
            {{--<p>silahkan beli kelas terlebih dahulu</p>--}}
        @endif
    @endguest

    {{--<header class="bck-color-mentor">
        @include('navs.navbar2')

        <div class="container-fluid">
            <div class="row text-center">
                <div class="col-lg-12" data-aos="zoom-out-down">
                    <h2 class="yuk-mentor-index">Blog</h2>
                    <h3 class="yuk-mentor-index2">
                        {{ $blog->title }}
                    </h3>
                </div>
            </div>
        </div>
    </header>

    <main>
        <section class="br-blog">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8">
                        <div class="card br-isi-blog px-3" data-aos="zoom-out-down">
                            <img src="{{ asset('/storage/'.$blog->file) }}" alt="pic-blog" class="img-fluid br-banner-blog">
                            <p class="br-blog-kategori text-center">{{ $blog->kategori }} - {{ $blog->topik }}</p>
                            <h4 class="br-blog-title text-center">{{ $blog->title }}</h4>
                            <p class="br-blog-subtitle text-center">{{ $blog->subtitle }}</p>
                            <p class="br-blog-isi">
                                {!! $blog->isi !!}
                            </p>
                            <hr class="br-blog-garis">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="media">
                                        <a href="{{ route('home.mentor.show',$blog->mentor->kode_mentor) }}">
                                            <img class="mr-3 br-blog-pic-guru" src="{{ asset('/storage/'.$blog->mentor->file) }}" alt="Generic placeholder image">
                                        </a>
                                        <div class="media-body">
                                          <h5 class="mt-0 br-blog-nama">{{ $blog->mentor->name }}</h5>
                                          <p class="br-blog-bidang">{{ $blog->mentor->bidang }}</p>
                                          <p class="br-blog-mentor-deskripsi">
                                              {{ Str::limit($blog->mentor->deskripsi,'120') }}
                                          </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="card br-card-kategori px-3 overflow-auto sticky-top mt-md-3 mt-3 mt-lg-0"
                            style="height:500px;" data-aos="zoom-out-down">
                            <div class="row">
                                <div class="col-lg-12">
                                    <h6 class="br-blog-lihat-blog">
                                        <span class="br-blog-kategori-lihat"> Lihat Blog Dengan Kategori </span>
                                        <span class="br-blog-kategori-lain">'{{ $blog->kategori }}'</span>
                                    </h6>
                                    @foreach ($lain as $query)
                                        @if ($query->kategori == $blog->kategori)
                                            <div class="media mt-2">
                                                <a href="{{ route('blog.show',$query->slug) }}">
                                                    <img class="mr-3 br-blog-pic-guru-kategori" src="{{ asset('/storage/'.$query->file) }}" alt="Generic placeholder image">
                                                </a>
                                                <div class="media-body">
                                                <a href="{{ route('blog.show',$query->slug) }}">
                                                    <h5 class="mt-0 br-blog-title-kategori">{{ $query->title }}</h5>
                                                </a>
                                                <p class="br-blog-create-kategori">{{ $query->publish_date }}</p>
                                                <p class="br-blog-mentor-deskripsi-kategori">
                                                    {{ Str::limit($query->isi,'50') }} <a href="{{ route('blog.show',$query->slug) }}" class="br-blog-baca-lengkap">BACA SELENGKAPNYA</a>
                                                </p>
                                                </div>
                                            </div>
                                        @endif
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="br-blog-lain">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <h4 class="br-blog-txt-lain">Lihat blog lainnya</h4>
                    </div>
                </div>
                <div class="row">
                    <div class="owl-carousel owl-theme carousel-blog">
                        @foreach ($bloglain as $query)
                            <div class="item">
                                <div class="card card-blog mt-3" data-aos="zoom-out-up">
                                    <img src="{{ asset('/storage/'.$query->file) }}" alt="wanita1" class="wanita1 img-fluid" data-toggle="tooltip" title="{{ $query->title }}">
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
                                                <p class="br-deskripsi-blog">
                                                    {{ Str::limit(strip_tags($query->isi), '100') }}
                                                    <a href="{{ route('blog.show',$query->slug) }}"><u style="color:blue; cursor: pointer;">BACA SELENGKAPNYA</u></a>
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
                    </div>
                </div>
            </div>
        </section>

    </main>--}}

    {{--@include('includes.footer')--}}




    {{-- CDN ak Pindahkan Ke Atas HTML -ric --}}
    <script>
      AOS.init({
        //  offset:400,
          duration:1000
      });
    </script>

    <script>
        $(document).ready(function(){
            $('#exampleModalLong').modal('show');
        });
    </script>

    <script>
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
            $('.formkomen').on('submit', function(e){
                e.preventDefault();
                $.ajax({
                    url: $(this).attr('action'),
                    type: 'POST',
                    data: $(this).serialize(),
                    success: function(){
                        $('#refresh-comment').load(" #refresh-comment > *");
                        $('#pesan').val('');
                    }
                });
            });
    	});
    </script>

    <script>
        $('.carousel-blog').owlCarousel({
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
