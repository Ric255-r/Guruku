@extends('layout/main')

@section('title')
    Guru
@endsection

@section('container')
<link rel="stylesheet" href="{{URL::asset('css/guru.css')}}">
    {{-- search  --}}
    <div class="container jar">
        <div class="row">
            <div class="col-sm-8">
                <form action="/guru/guru" method="get" class="">
                    <input type="text" class="form-control" id="cari" name="cari" placeholder="Cari Guru Anda" value="{{old('cari')}}">
                    <input type="submit" value="cari" class="btn btn-primary mt-2" style="width:120px; font-size:20px;">
                </form>
            </div>
        </div>
    </div>

    {{-- kotak  --}}

    <div class="container jar2">
        <div class="row">
        {{-- <div class="col-12 col-lg-4 kotgur">
                <div class="col-12 thumb" href="#">
                <img class="col-12 img" src="img/teach1.jpg" href="#">
                <span class="mat">Matematika <br><span class="pem">Pemula</span></span>
                <hr>
                <div class="row">
                    <div class="col-12" style="margin-top:-45px; margin-right:20px;">
                    <div class="media p-3">
                        <img src="img/peo.png" alt="guru" class="mt-3" style="width:60px;">
                        <div class="media-body">
                        <p class="ve">Vetrick Wilsen</p>
                        <p class="men">Mentor</p>
                        </div>
                    </div>
                    </div>
                </div>
                </div>
            </div>
            <div class="col-12 col-lg-4 kotgur">
                <div class="col-12 thumb" href="#">
                <img class="col-12 img" src="img/teach1.jpg" href="#">
                <span class="mat">Matematika <br><span class="pem">Pemula</span></span>
                <hr>
                <div class="row">
                    <div class="col-12" style="margin-top:-45px; margin-right:20px;">
                    <div class="media p-3">
                        <img src="img/peo.png" alt="guru" class="mt-3" style="width:60px;">
                        <div class="media-body">
                        <p class="ve">Vetrick Wilsen</p>
                        <p class="men">Mentor</p>
                        </div>
                    </div>
                    </div>
                </div>
                </div>
            </div>
            <div class="col-12 col-lg-4 kotgur">
                <div class="col-12 thumb" href="#">
                <img class="col-12 img" src="img/teach1.jpg" href="#">
                <span class="mat">Matematika <br><span class="pem">Pemula</span></span>
                <hr>
                <div class="row">
                    <div class="col-12" style="margin-top:-45px; margin-right:20px;">
                    <div class="media p-3">
                        <img src="img/peo.png" alt="guru" class="mt-3" style="width:60px;">
                        <div class="media-body">
                        <p class="ve">Vetrick Wilsen</p>
                        <p class="men">Mentor</p>
                        </div>
                    </div>
                    </div>
                </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12 col-lg-4 kotgur">
                <div class="col-12 thumb" href="#">
                <img class="col-12 img" src="img/teach1.jpg" href="#">
                <span class="mat">Matematika <br><span class="pem">Pemula</span></span>
                <hr>
                <div class="row">
                    <div class="col-12" style="margin-top:-45px; margin-right:20px;">
                    <div class="media p-3">
                        <img src="img/peo.png" alt="guru" class="mt-3" style="width:60px;">
                        <div class="media-body">
                        <p class="ve">Vetrick Wilsen</p>
                        <p class="men">Mentor</p>
                        </div>
                    </div>
                    </div>
                </div>
                </div>
            </div>
            <div class="col-12 col-lg-4 kotgur">
                <div class="col-12 thumb" href="#">
                <img class="col-12 img" src="img/teach1.jpg" href="#">
                <span class="mat">Matematika <br><span class="pem">Pemula</span></span>
                <hr>
                <div class="row">
                    <div class="col-12" style="margin-top:-45px; margin-right:20px;">
                    <div class="media p-3">
                        <img src="img/peo.png" alt="guru" class="mt-3" style="width:60px;">
                        <div class="media-body">
                        <p class="ve">Vetrick Wilsen</p>
                        <p class="men">Mentor</p>
                        </div>
                    </div>
                    </div>
                </div>
                </div>
            </div>
            <div class="col-12 col-lg-4 kotgur">
                <div class="col-12 thumb" href="#">
                <img class="col-12 img" src="img/teach1.jpg" href="#">
                <span class="mat">Matematika <br><span class="pem">Pemula</span></span>
                <hr>
                <div class="row">
                    <div class="col-12" style="margin-top:-45px; margin-right:20px;">
                    <div class="media p-3">
                        <img src="img/peo.png" alt="guru" class="mt-3" style="width:60px;">
                        <div class="media-body">
                        <p class="ve">Vetrick Wilsen</p>
                        <p class="men">Mentor</p>
                        </div>
                    </div>
                    </div>
                </div>
                </div>
            </div> --}}
                @foreach ($gambaradminguru as $item)
                    <div class="col-12 col-lg-4 kotgur">
                    <div class="col-12 thumb" href="/guru/{{ $item->id }}">
                    <img class="col-12 img" src="{{ URL::asset('/adminguru/'.$item->file) }}">
                        <span class="mat">{{ $item->keterangan }} <br><span class="pem">{{$item->kategori}}</span></span>
                        <hr>
                        <div class="row">
                            <div class="col-12" style="margin-top:-45px; margin-right:20px;">
                            <div class="media p-3">
                                <div class="media-body">
                                    <img src="{{URL::asset('/img/peo.png')}}" alt="guru" class="mt-3" style="width:60px;">
                                    <p class="ve">{{$item->namamentor}}</p>
                                    <p class="men">Mentor</p>
                                    <a class="btn btn-info stretched-link" type="submit" href="/guru/{{ $item->id }}">pesan</a>
                                </div>
                            </div>
                            </div>
                        </div>
                        </div>
                    </div>
                @endforeach
        </div>
        <div class="row">
            <div class="mx-auto mt-3">
                {{ $gambaradminguru->links() }}
            </div>
        </div>
    </div>
    {{-- Halaman : {{ $gambaradminguru->currentPage() }} <br>
    Jumlah Data : {{ $gambaradminguru->total() }} <br>
    Data Per Halaman : {{ $gambaradminguru->perPage() }} <br> --}}





@endsection
