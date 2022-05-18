@extends('layout.main')

@section('container')
    <link rel="stylesheet" href="{{URL::asset('css/kelas.css')}}">

    <div class="container-fluid banner">
        <div class="row">
            <div class="col-lg-6 col-md-6 col-12">
                <p class="hello ml-5">Now you can learn 2 lessons <br> in one class</p>
                <form action="/kelas/kelasgratis" method="get" class="form-inline">
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

    <div class="container-fluid">
        <div class="row">
            <div class="col-xl-12">
                <p style="text-align:right;" class="mt-3"><a href="/kelasgratis/detail" style="cursor:pointer;">Lihat Semua>></a></p>
            </div>
        </div>
    </div>

    {{-- @if ($paket->jenis == 'paket') --}}
        <div class="container">
            <div class="row justify-content-center">
                @foreach ($paket as $query )
                <div class="col-sm-6 col-12 col-md-6 col-lg-4 mt-3">
                    <div class="card card-kelas">
                        <div class="kelas-content">
                            <img src="{{ URL::asset('/adminkelasbaru/'.$query->file) }}" class="card-img-top" height="100px" style="background-size:cover;" alt="pic">
                            <div class="card-body">
                            <span class="card-title" style="font-weight:bold;">{{$query->kelas}}</span> <br>
                            <span class="grat"></span>
                                <p class="card-text text-muted">{{$query->deskripsi}}</p>
                                <a href="/paketkelas/{{$query->id}}" class="btn btn-primary" style="width:100px;">Detail</a>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    {{-- @endif --}}
@endsection
