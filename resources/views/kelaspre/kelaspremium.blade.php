@extends('layout.main')

@section('container')
<link rel="stylesheet" href="{{URL::asset('css/kelas.css')}}">
    {{-- <div class="container-fluid" style="margin-top:100px;">
        <div class="row">
            <div class="col-xl-12">
                <form action="#" method="post" class="form-inline">
                    <input class="form-control active-cyan-4 col-xl-5" type="text" placeholder="Search" aria-label="Search">
                    <button class="btn btn-primary ml-3" style="width:100px;">CARI</button>
                </form>
            </div>
        </div>
    </div> --}}


    <div class="container-fluid banner">
        <div class="row">
            <div class="col-lg-6 col-md-6 col-12">
                <p class="hello ml-5">Hello, What would you <br> learn today?</p>
                <form action="/kelaspre/kelaspremium" method="get" class="form-inline">
                    <input class="form-control active-cyan-4 col-lg-9 col-sm-6 col-8 col-md-9 ml-5"  type="text" placeholder="Search" aria-label="Search" name="cari" id="cari" value="{{old('cari')}}">
                    {{-- <button class="btn btn-primary ml-3" style="width:100px;" type="submit">CARI</button> --}}
                </form>
            </div>
            <div class="col-lg-6 col-md-6 col-12">
                <img src="{{URL::asset('/img/vector-cari.png')}}" alt="vector cari"
                class="img-fluid mt-3 vector-cari" width="100%">
            </div>
        </div>
    </div>

    hai {{ Auth::user()->name }}
    <div class="container-fluid">
        <div class="row">
            <div class="col-xl-12">
                <p style="text-align:right;" class="mt-3"><a href="/kelaspremium/detail" style="cursor:pointer;">Lihat Semua>></a></p>
            </div>
        </div>
    </div>



    {{-- <div class="container-fluid">
        <div class="row">
            <div class="col-xl-12">
                <div class="container-fluid">
                    <div class="row">
                        @foreach ($kelas as $query)
                            <div class="col-xl-4 mt-5">
                                <div class="card">
                                    <img src="{{ URL::asset('/adminkelaspremium/'.$query->file) }}" class="card-img-top" height="100px" style="background-size:cover;" alt="pic">
                                    <div class="card-body">
                                    <span class="card-title">{{$query->pelajaran}}</span>
                                    <span class="pre">Premium</span>
                                    <p class="card-text" id="demo"></p>
                                        <a href="/kelaspremium/{{ $query->id }}" class="btn btn-primary" style="width:100px;">Detail</a>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div> --}}

    {{-- @auth
        <div class="container">
            <div class="row justify-content-center">
                @foreach ($item as $query )
                    @if ($query->transaction->transaction_status == 'SUCCESS')
                            <div class="col-sm-6 col-12 col-md-6 col-lg-4 mt-3" hidden>
                                <div class="card card-kelas">
                                    <div class="kelas-content">
                                        <img src="{{ URL::asset('/adminkelasbaru/'.$query->product->file) }}" class="card-img-top" height="100px" style="background-size:cover;" alt="pic">
                                        <div class="card-body">
                                        <span class="card-title">{{$query->product->kelas}}</span>
                                        <span class="pre">Premium</span>
                                        <p class="card-text" id="demo"></p>
                                            <a href="/kelaspremium/{{ $query->product->id }}" class="btn btn-primary" style="width:100px;">Detail</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @elseif($query->transaction->transaction_status == 'PENDING')
                            <div class="col-sm-6 col-12 col-md-6 col-lg-4 mt-3">
                                <div class="card card-kelas">
                                    <div class="kelas-content">
                                        <img src="{{ URL::asset('/adminkelasbaru/'.$query->product->file) }}" class="card-img-top" height="100px" style="background-size:cover;" alt="pic">
                                        <div class="card-body">
                                        <span class="card-title">{{$query->product->kelas}}</span>
                                        <span class="pre">Premium</span>
                                        <p class="card-text" id="demo"></p>
                                            <a href="/kelaspremium/{{ $query->product->id }}" class="btn btn-primary" style="width:100px;">Detail</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @else
                            <div class="col-sm-6 col-12 col-md-6 col-lg-4 mt-3">
                                <div class="card card-kelas">
                                    <div class="kelas-content">
                                        <img src="{{ URL::asset('/adminkelasbaru/'.$query->product->file) }}" class="card-img-top" height="100px" style="background-size:cover;" alt="pic">
                                        <div class="card-body">
                                        <span class="card-title">{{$query->product->kelas}}</span>
                                        <span class="pre">Premium</span>
                                        <p class="card-text" id="demo"></p>
                                            <a href="/kelaspremium/{{ $query->product->id }}" class="btn btn-primary" style="width:100px;">Detail</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                    @endif
                @endforeach
                @foreach ($kelas as $query )
                    <div class="col-sm-6 col-12 col-md-6 col-lg-4 mt-3">
                        <div class="card card-kelas">
                            <div class="kelas-content">
                                <img src="{{ URL::asset('/adminkelasbaru/'.$query->file) }}" class="card-img-top" height="100px" style="background-size:cover;" alt="pic">
                                <div class="card-body">
                                <span class="card-title">{{$query->kelas}}</span>
                                <span class="pre">Premium</span>
                                <p class="card-text" id="demo"></p>
                                    <a href="/kelaspremium/{{ $query->id }}" class="btn btn-primary" style="width:100px;">Detail</a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    @endauth --}}

    {{-- @guest --}}
    <div class="container">
        <div class="row justify-content-center">
            @foreach ($kelas as $query )
            <div class="col-sm-6 col-12 col-md-6 col-lg-4 mt-3">
                <div class="card card-kelas">
                    <div class="kelas-content">
                        <img src="{{ URL::asset('/adminkelasbaru/'.$query->file) }}" class="card-img-top" height="100px" style="background-size:cover;" alt="pic">
                        <div class="card-body">
                        <span class="card-title">{{$query->kelas}}</span>
                        <span class="pre">Premium</span>
                        <p class="card-text" id="demo"></p>
                            <a href="/kelaspremium/{{ $query->id }}" class="btn btn-primary" style="width:100px;">Detail</a>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
    {{-- @endguest --}}

    {{-- @auth
    <div class="container-fluid">
        <div class="row">
            <div class="mx-auto mt-3">
                {{ $item->links() }}
            </div>
        </div>
    </div>
    @endauth --}}

    {{-- @guest --}}
        <div class="container-fluid">
            <div class="row">
                <div class="mx-auto mt-3">
                    {{ $kelas->links() }}
                </div>
            </div>
        </div>
    {{-- @endguest --}}
    {{-- @php
        $str = '{{$kelas->deskripsi}}';
        echo strlen($str);
    @endphp --}}
    {{-- <p id="demo"></p> --}}
    {{-- <script>
        var str = '{{$query->deskripsi}}';
        if(str.length > 10) str = str.substring(0,10)
        document.getElementById('demo').innerHTML = str + '..';
    </script> --}}
@endsection
