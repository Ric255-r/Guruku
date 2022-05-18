@extends('layout.main')

@section('container')
<link rel="stylesheet" href="{{URL::asset('css/kelas.css')}}">
    {{-- <div class="container-fluid" style="margin-top:100px;">
        <div class="row">
            <div class="col-xl-12">
                <form action="/kelas/kelasgratis" method="get" class="form-inline">
                    <input class="form-control active-cyan-4 col-xl-5"  type="text" placeholder="Search" aria-label="Search" name="cari" id="cari" value="{{old('cari')}}">
                    <button class="btn btn-primary ml-3" style="width:100px;" type="submit">CARI</button>
                </form>
            </div>
        </div>
    </div> --}}
    <div class="container-fluid banner">
        <div class="row">
            <div class="col-lg-6 col-md-6 col-12">
                <p class="hello ml-5">Hello, What would you <br> learn today?</p>
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

    {{-- <div class="container-fluid">
        <div class="row">
            <div class="col-xl-12">
                <p style="text-align:right;" class="mt-3"><a href="/kelasgratis/detail" style="cursor:pointer;">Lihat Semua>></a></p>
            </div>
        </div>
    </div> --}}



<div class="container-fluid">
    <div class="row">
        <div class="col-xl-12">
            <div class="container-fluid">
                <div class="row">
                    @foreach ($kelas as $query)
                        <div class="col-xl-4 mt-5">
                            <div class="card">
                                <img src="{{ URL::asset('/adminkelas/'.$query->file) }}" class="card-img-top" height="100px" style="background-size:cover;" alt="pic">
                                <div class="card-body">
                                <span class="card-title">{{$query->pelajaran}}</span>
                                <span class="grat">Gratis</span>
                                    <p class="card-text">{{$query->deskripsi}}</p>
                                    <a href="/kelasgratis/{{ $query->id }}" class="btn btn-primary" style="width:100px;">Detail</a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
<div class="container-fluid">
    <div class="row">
        <div class="mx-auto mt-3">
            {{ $kelas->links() }}
        </div>
    </div>
</div>
@endsection
