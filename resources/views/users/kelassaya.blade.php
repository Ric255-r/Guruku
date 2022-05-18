@extends('layouts.default2')

@section('content')
    <link rel="stylesheet" href="{{ URL::asset('/css/kelasbaru.css') }}">
    {{--<button class="btn btn-danger">Hai</button>--}}
    {{-- @foreach ($kelas as $query)
        @if ($query->transaction->transaction_status == 'SUCCESS')
            {{ $query->product->kelas }}
        @else
            <p>yah belum ada kelas</p>
        @endif
    @endforeach --}}
    {{--<div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="box-title">Kelas Saya</h4>
                    </div>
                </div>
            </div>
        </div>
    </div>--}}

    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="box-title">Daftar Kelas Saya</h4>
                    </div>
                    <div class="card-body--">
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-lg-12">
                                    <ul class="nav nav-pills mb-3 justify-content-center justify-content-xl-start" id="pills-tab" role="tablist">
                                        <li class="nav-item mx-3" role="presentation">
                                          <a class="nav-link active btn btn-outline-info" style="width:120px;" id="pills-semua-tab" data-toggle="pill" href="#pills-semua" role="tab" aria-controls="pills-semua" aria-selected="true">Semua</a>
                                        </li>
                                        <li class="nav-item mx-3" role="presentation">
                                          <a class="nav-link btn btn-outline-info" style="width:120px;" id="pills-gratis-tab" data-toggle="pill" href="#pills-gratis" role="tab" aria-controls="pills-gratis" aria-selected="false">Gratis</a>
                                        </li>
                                        <li class="nav-item mx-3 mt-2 mt-lg-0 mt-xl-0" role="presentation">
                                            <a class="nav-link btn btn-outline-info" style="width:120px;" id="pills-premium-tab" data-toggle="pill" href="#pills-premium" role="tab" aria-controls="pills-premium" aria-selected="false">Premium</a>
                                        </li>
                                      </ul>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="tab-content" id="pills-tabContent">
                                        <div class="tab-pane active fade show" id="pills-semua" role="tabpanel" aria-labelledby="pills-semua-tab">
                                            <div class="row">
                                                @foreach ($kelas as $query)
                                                    @if ($query->transaction->transaction_status == 'SUCCESS')
                                                        <div class="col-xl-3 col-lg-4 col-md-6 col-sm-9 col-12 mt-3 justify-content-md-center">
                                                            <div class="card card-kelas">
                                                                <img src="{{ asset('/storage/'.$query->product->file) }}" alt="wanita1" class="wanita1 img-fluid">
                                                                <div class="kategori-baru ml-auto">
                                                                    {{ $query->product->tingkat }}
                                                                </div>
                                                                <div class="col-lg-12">
                                                                    <h5 class="txt-kelas">{{ Str::limit($query->product->kelas,'20') }}</h5>
                                                                    <div class="media" style="margin-top:30px;">
                                                                        @if ($query->product->mentor->file != null)
                                                                            <img src="{{ asset('/storage/'.$query->product->mentor->file) }}" style="width:50px; height:50px; border-radius:50px;" class="mr-3 img-fluid">
                                                                        @else
                                                                            <img src="{{ asset('/Foto/man.png') }}" style="width:50px; height:50px; border-radius:50px;" class="mr-3 img-fluid">
                                                                        @endif
                                                                        <div class="media-body txt-mentor">
                                                                            <h5 class="nama-mentor">{{ $query->product->mentor->name }}</h5>
                                                                            @if ($query->product->mentor->bidang != null)
                                                                                <p class="exp">{{ $query->product->mentor->bidang }}</p>
                                                                            @else
                                                                                <p class="exp">-</p>
                                                                            @endif
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <hr>
                                                                <div class="col-lg-12">
                                                                    <div class="row">
                                                                    <div class="col-lg-6 col-md-6 col-sm-6 col-12">
                                                                        <p style="color:#36C5BA; font-size:20px; font-weight:bold;">{{ $query->product->jenis }}</p>
                                                                    </div>
                                                                    <div class="col-lg-6 col-md-6 col-sm-6 col-12">
                                                                        <a href="{{ route('play.course',$query->product->slug) }}" class="btn btn-beli btn-block">Belajar</a>
                                                                    </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    @endif
                                                @endforeach


                                                @foreach ($gratis as $query)
                                                    <div class="col-xl-3 col-lg-4 col-md-6 col-sm-9 col-12 mt-3 justify-content-md-center">
                                                        <div class="card card-kelas">
                                                            <img src="{{ asset('/storage/'.$query->product->file) }}" alt="wanita1" class="wanita1 img-fluid">
                                                            <div class="kategori-baru ml-auto">
                                                                {{ $query->product->tingkat }}
                                                            </div>
                                                            <div class="col-lg-12">
                                                                <h5 class="txt-kelas">{{ Str::limit($query->product->kelas,'20') }}</h5>
                                                                <div class="media" style="margin-top:30px;">
                                                                    @if ($query->product->mentor->file != null)
                                                                        <img src="{{ asset('/storage/'.$query->product->mentor->file) }}" style="width:50px; height:50px; border-radius:50px;" class="mr-3 img-fluid">
                                                                    @else
                                                                        <img src="{{ asset('/Foto/man.png') }}" style="width:50px; height:50px; border-radius:50px;" class="mr-3 img-fluid">
                                                                    @endif
                                                                    <div class="media-body txt-mentor">
                                                                        <h5 class="nama-mentor">{{ $query->product->mentor->name }}</h5>
                                                                        @if ($query->product->mentor->bidang != null)
                                                                            <p class="exp">{{ $query->product->mentor->bidang }}</p>
                                                                        @else
                                                                            <p class="exp">-</p>
                                                                        @endif
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <hr>
                                                            <div class="col-lg-12">
                                                                <div class="row">
                                                                <div class="col-lg-6 col-md-6 col-sm-6 col-12">
                                                                    <p style="color:#36C5BA; font-size:20px; font-weight:bold;">{{ $query->product->jenis }}</p>
                                                                </div>
                                                                <div class="col-lg-6 col-md-6 col-sm-6 col-12">
                                                                    <a href="{{ route('play.course',$query->product->slug) }}" class="btn btn-beli btn-block">Belajar</a>
                                                                </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endforeach

                                                @if ($kelas->count() == 0 AND $gratis->count() == 0)
                                                    <div class="col-xl-3 col-lg-4 col-md-6 col-sm-9 col-12 mt-3">
                                                        <p style="color:#1d1d1d; font-size:20px; font-weight:600">Yah blm ada Kelas</p>
                                                        <a href="{{ route('kelas.index') }}" class="btn btn-info">Cari kelas</a>
                                                        {{--<p style="color:white; margin-top:50px;">hai</p>--}}
                                                    </div>
                                                @endif
                                            </div>
                                        </div>


                                        <div class="tab-pane fade" id="pills-gratis" role="tabpanel" aria-labelledby="pills-gratis-tab">
                                            <div class="row">
                                                @forelse ($gratis as $query)
                                                    <div class="col-xl-3 col-lg-4 col-md-6 col-sm-9 col-12 mt-3">
                                                        <div class="card card-kelas">
                                                            <img src="{{ asset('/storage/'.$query->product->file) }}" alt="wanita1" class="wanita1 img-fluid">
                                                            <div class="kategori-baru ml-auto">
                                                                {{ $query->product->tingkat }}
                                                            </div>
                                                            <div class="col-lg-12">
                                                                <h5 class="txt-kelas">{{ Str::limit($query->product->kelas,'20') }}</h5>
                                                                <div class="media" style="margin-top:30px;">
                                                                    @if ($query->product->mentor->file != null)
                                                                        <img src="{{ asset('/storage/'.$query->product->mentor->file) }}" style="width:50px; height:50px; border-radius:50px;" class="mr-3 img-fluid">
                                                                    @else
                                                                        <img src="{{ asset('/Foto/man.png') }}" style="width:50px; height:50px; border-radius:50px;" class="mr-3 img-fluid">
                                                                    @endif
                                                                    <div class="media-body txt-mentor">
                                                                        <h5 class="nama-mentor">{{ $query->product->mentor->name }}</h5>
                                                                        @if ($query->product->mentor->bidang != null)
                                                                            <p class="exp">{{ $query->product->mentor->bidang }}</p>
                                                                        @else
                                                                            <p class="exp">-</p>
                                                                        @endif
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <hr>
                                                            <div class="col-lg-12">
                                                                <div class="row">
                                                                <div class="col-lg-6 col-md-6 col-sm-6 col-12">
                                                                    <p style="color:#36C5BA; font-size:20px; font-weight:bold;">{{ $query->product->jenis }}</p>
                                                                </div>
                                                                <div class="col-lg-6 col-md-6 col-sm-6 col-12">
                                                                    <a href="{{ route('play.course',$query->product->slug) }}" class="btn btn-beli btn-block">Belajar</a>
                                                                </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    @empty
                                                        <div class="col-xl-3 col-lg-4 col-md-6 col-sm-9 col-12 mt-3">
                                                            <p style="color:#1d1d1d; font-size:20px; font-weight:600">Yah blm ada Kelas</p>
                                                            <a href="{{ route('kelas.index') }}" class="btn btn-info">Ayo cari kelas sekarang!</a>
                                                            <p style="color:white; margin-top:50px;">hai</p>
                                                        </div>
                                                @endforelse
                                            </div>
                                        </div>


                                        <div class="tab-pane fade" id="pills-premium" role="tabpanel" aria-labelledby="pills-premium-tab">
                                            <div class="row">
                                                @forelse ($kelas as $query)
                                                    @if ($query->transaction->transaction_status == 'SUCCESS')
                                                        <div class="col-xl-3 col-lg-4 col-md-6 col-sm-9 col-12 mt-3">
                                                            <div class="card card-kelas">
                                                                <img src="{{ asset('/storage/'.$query->product->file) }}" alt="wanita1" class="wanita1 img-fluid">
                                                                <div class="kategori-baru ml-auto">
                                                                    {{ $query->product->tingkat }}
                                                                </div>
                                                                <div class="col-lg-12">
                                                                    <h5 class="txt-kelas">{{ Str::limit($query->product->kelas,'20') }}</h5>
                                                                    <div class="media" style="margin-top:30px;">
                                                                        @if ($query->product->mentor->file != null)
                                                                            <img src="{{ asset('/storage/'.$query->product->mentor->file) }}" style="width:50px; height:50px; border-radius:50px;" class="mr-3 img-fluid">
                                                                        @else
                                                                            <img src="{{ asset('/Foto/man.png') }}" style="width:50px; height:50px; border-radius:50px;" class="mr-3 img-fluid">
                                                                        @endif
                                                                        <div class="media-body txt-mentor">
                                                                            <h5 class="nama-mentor">{{ $query->product->mentor->name }}</h5>
                                                                            @if ($query->product->mentor->bidang != null)
                                                                                <p class="exp">{{ $query->product->mentor->bidang }}</p>
                                                                            @else
                                                                                <p class="exp">-</p>
                                                                            @endif
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <hr>
                                                                <div class="col-lg-12">
                                                                    <div class="row">
                                                                    <div class="col-lg-6 col-md-6 col-sm-6 col-12">
                                                                        <p style="color:#36C5BA; font-size:20px; font-weight:bold;">{{ $query->product->jenis }}</p>
                                                                    </div>
                                                                    <div class="col-lg-6 col-md-6 col-sm-6 col-12">
                                                                        <a href="{{ route('play.course',$query->product->slug) }}" class="btn btn-beli btn-block">Belajar</a>
                                                                    </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    @else

                                                    @endif
                                                @empty
                                                    <div class="col-xl-3 col-lg-4 col-md-6 col-sm-9 col-12 mt-3">
                                                        <p style="color:#1d1d1d; font-size:20px; font-weight:600">Yah blm ada Kelas</p>
                                                        <a href="{{ route('kelas.index') }}" class="btn btn-info">Beli Sekarang</a>
                                                        <p style="color:white; margin-top:50px;">hai</p>
                                                    </div>
                                                @endforelse
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>



















    {{--<div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Kelas Saya</h1>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">


            <div class="card">
                <div class="card-body">
                    <h4 class="box-title">Daftar Kelas Saya</h4>
                </div>
                <div class="card-body--">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-lg-12">
                                <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                                    <li class="nav-item active mx-3" role="presentation">
                                      <a class="nav-link active btn btn-outline-info" style="width:120px;" id="pills-semua-tab" data-toggle="pill" href="#pills-semua" role="tab" aria-controls="pills-semua" aria-selected="true">Semua</a>
                                    </li>
                                    <li class="nav-item mx-3" role="presentation">
                                      <a class="nav-link btn btn-outline-info" style="width:120px;" id="pills-gratis-tab" data-toggle="pill" href="#pills-gratis" role="tab" aria-controls="pills-gratis" aria-selected="false">Gratis</a>
                                    </li>
                                    <li class="nav-item mx-3" role="presentation">
                                        <a class="nav-link btn btn-outline-info" style="width:120px;" id="pills-premium-tab" data-toggle="pill" href="#pills-premium" role="tab" aria-controls="pills-premium" aria-selected="false">Premium</a>
                                    </li>
                                  </ul>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="tab-content" id="pills-tabContent">
                                    <div class="tab-pane fade show active" id="pills-semua" role="tabpanel" aria-labelledby="pills-semua-tab">
                                        <div class="row">
                                            @foreach ($kelas as $query)
                                                @if ($query->transaction->transaction_status == 'SUCCESS')
                                                    <div class="col-xl-4 col-lg-4 col-md-6 col-sm-9 col-12 mt-3 justify-content-md-center">
                                                        <div class="card card-kelas">
                                                            <img src="{{ asset('/storage/'.$query->product->file) }}" alt="wanita1" class="wanita1 img-fluid">
                                                            <div class="kategori-baru ml-auto">
                                                                {{ $query->product->tingkat }}
                                                            </div>
                                                            <div class="col-lg-12">
                                                                <h5 class="txt-kelas">{{ Str::limit($query->product->kelas,'20') }}</h5>
                                                                <div class="media" style="margin-top:30px;">
                                                                <img src="{{ URL::asset('/mentor/'.$query->product->mentor->file) }}" style="width:50px; border-radius:50px;" class="mr-3 img-fluid">
                                                                <div class="media-body txt-mentor">
                                                                    <h5 class="mt-2 nama-mentor">{{ $query->product->mentor->nama }}</h5>
                                                                    <p class="exp">{{ $query->product->mentor->bidang }}</p>
                                                                </div>
                                                                </div>
                                                            </div>
                                                            <hr>
                                                            <div class="col-lg-12">
                                                                <div class="row">
                                                                <div class="col-lg-6 col-md-6 col-sm-6 col-12">
                                                                    <p style="color:#36C5BA; font-size:20px; font-weight:bold;">{{ $query->product->jenis }}</p>
                                                                </div>
                                                                <div class="col-lg-6 col-md-6 col-sm-6 col-12">
                                                                    <a href="{{ route('course.playing',$query->product->slug) }}" class="btn btn-beli btn-block">Belajar</a>
                                                                </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @else

                                                @endif
                                            @endforeach


                                            @foreach ($gratis as $query)
                                                <div class="col-xl-4 col-lg-4 col-md-6 col-sm-9 col-12 mt-3">
                                                    <div class="card card-kelas">
                                                        <img src="{{ asset('/storage/'.$query->product->file) }}" alt="wanita1" class="wanita1 img-fluid">
                                                        <div class="kategori-baru ml-auto">
                                                            {{ $query->product->tingkat }}
                                                        </div>
                                                        <div class="col-lg-12">
                                                            <h5 class="txt-kelas">{{ Str::limit($query->product->kelas,'20') }}</h5>
                                                            <div class="media" style="margin-top:30px;">
                                                            <img src="{{ URL::asset('/mentor/'.$query->product->mentor->file) }}" class="mr-3 img-fluid" style="width:50px; border-radius:50px;" alt="people">
                                                            <div class="media-body txt-mentor">
                                                                <h5 class="mt-2 nama-mentor">{{ $query->product->mentor->nama }}</h5>
                                                                <p class="exp">{{ $query->product->mentor->bidang }}</p>
                                                            </div>
                                                            </div>
                                                        </div>
                                                        <hr>
                                                        <div class="col-lg-12">
                                                            <div class="row">
                                                            <div class="col-lg-6 col-md-6 col-sm-6 col-12">
                                                                <p style="color:#36C5BA; font-size:20px; font-weight:bold;">{{ $query->product->jenis }}</p>
                                                            </div>
                                                            <div class="col-lg-6 col-md-6 col-sm-6 col-12">
                                                                <a href="{{ route('course.playing',$query->product->slug) }}" class="btn btn-beli btn-block">Belajar</a>
                                                            </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>


                                    <div class="tab-pane fade" id="pills-gratis" role="tabpanel" aria-labelledby="pills-gratis-tab">
                                        <div class="row">
                                            @forelse ($gratis as $query)
                                                <div class="col-xl-4 col-lg-4 col-md-6 col-sm-9 col-12 mt-3">
                                                    <div class="card card-kelas">
                                                        <img src="{{ asset('/storage/'.$query->product->file) }}" alt="wanita1" class="wanita1 img-fluid">
                                                        <div class="kategori-baru ml-auto">
                                                            {{ $query->product->tingkat }}
                                                        </div>
                                                        <div class="col-lg-12">
                                                            <h5 class="txt-kelas">{{ Str::limit($query->product->kelas,'20') }}</h5>
                                                            <div class="media" style="margin-top:30px;">
                                                            <img src="{{ URL::asset('/mentor/'.$query->product->mentor->file) }}" class="mr-3 img-fluid" style="width:50px; border-radius:50px" alt="people">
                                                            <div class="media-body txt-mentor">
                                                                <h5 class="mt-2 nama-mentor">{{ $query->product->mentor->nama }}</h5>
                                                                <p class="exp">{{ $query->product->mentor->bidang }}</p>
                                                            </div>
                                                            </div>
                                                        </div>
                                                        <hr>
                                                        <div class="col-lg-12">
                                                            <div class="row">
                                                            <div class="col-lg-6 col-md-6 col-sm-6 col-12">
                                                                <p style="color:#36C5BA; font-size:20px; font-weight:bold;">{{ $query->product->jenis }}</p>
                                                            </div>
                                                            <div class="col-lg-6 col-md-6 col-sm-6 col-12">
                                                                <a href="{{ route('course.playing',$query->product->slug) }}" class="btn btn-beli btn-block">Belajar</a>
                                                            </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                @empty
                                                    <div class="col-xl-4 col-lg-4 col-md-6 col-sm-9 col-12 mt-3">
                                                        <p style="color:#1d1d1d; font-size:20px; font-weight:600">Yah blm ada Kelas</p>
                                                        <a href="{{ route('kelas.index') }}" class="btn btn-info">Beli Sekarang</a>
                                                        <p style="color:white; margin-top:50px;">hai</p>
                                                    </div>
                                            @endforelse
                                        </div>
                                    </div>


                                    <div class="tab-pane fade" id="pills-premium" role="tabpanel" aria-labelledby="pills-premium-tab">
                                        <div class="row">
                                            @forelse ($kelas as $query)
                                                @if ($query->transaction->transaction_status == 'SUCCESS')
                                                    <div class="col-xl-4 col-lg-4 col-md-6 col-sm-9 col-12 mt-3">
                                                        <div class="card card-kelas">
                                                            <img src="{{ asset('/storage/'.$query->product->file) }}" alt="wanita1" class="wanita1 img-fluid">
                                                            <div class="kategori-baru ml-auto">
                                                                {{ $query->product->tingkat }}
                                                            </div>
                                                            <div class="col-lg-12">
                                                                <h5 class="txt-kelas">{{ Str::limit($query->product->kelas,'20') }}</h5>
                                                                <div class="media" style="margin-top:30px;">
                                                                <img src="{{ URL::asset('/mentor/'.$query->product->mentor->file) }}" class="mr-3 img-fluid" style="width:50px; border-radius:50px;" alt="people">
                                                                <div class="media-body txt-mentor">
                                                                    <h5 class="mt-2 nama-mentor">{{ $query->product->mentor->nama }}</h5>
                                                                    <p class="exp">{{ $query->product->mentor->bidang }}</p>
                                                                </div>
                                                                </div>
                                                            </div>
                                                            <hr>
                                                            <div class="col-lg-12">
                                                                <div class="row">
                                                                <div class="col-lg-6 col-md-6 col-sm-6 col-12">
                                                                    <p style="color:#36C5BA; font-size:20px; font-weight:bold;">{{ $query->product->jenis }}</p>
                                                                </div>
                                                                <div class="col-lg-6 col-md-6 col-sm-6 col-12">
                                                                    <a href="{{ route('course.playing',$query->product->slug) }}" class="btn btn-beli btn-block">Belajar</a>
                                                                </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @else

                                                @endif
                                            @empty
                                                <div class="col-xl-4 col-lg-4 col-md-6 col-sm-9 col-12 mt-3">
                                                    <p style="color:#1d1d1d; font-size:20px; font-weight:600">Yah blm ada Kelas</p>
                                                    <a href="{{ route('kelas.index') }}" class="btn btn-info">Beli Sekarang</a>
                                                    <p style="color:white; margin-top:50px;">hai</p>
                                                </div>
                                            @endforelse
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


        </div>
    </div>--}}
    <script src="https://code.jquery.com/jquery-3.5.0.js"></script>

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
@endsection
