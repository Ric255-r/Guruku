 <!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('/css/checkout.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('/css/kelasbaru.css') }}">
    <link rel="shortcut icon" sizes="57x57" href="{{ URL::asset('/Foto/favicon.png') }}">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <title>Checkout</title>
  </head>
  <body>
    <header class="bck-color2">
        <div class="container">
            @include('navs.navbar2')
            <div class="row text-center">
                <div class="col-lg-12">
                    <p class="text-center check">Pembayaran Kelas</p>
                    <p class="text-center kelas">"{{ $check->kelas }}"</p>
                </div>
            </div>
        </div>
        {{--<div class="container">
            <div class="row text-center">
                <div class="col-lg-12 banner">
                    <p class="text-center check">Checkout Kelas</p>
                    <p class="text-center kelas">"{{ $check->kelas }}"</p>
                </div>
            </div>
        </div>--}}
    </header>



    <div class="container" style="margin-top:30px;">
        <div class="row">
            <div class="col-lg-4 my-3 mx-auto" style="border: 0.1px solid #D3D3D3; border-radius: 20px; min-height: 300px; background-color: white;">
                <form class="my-4 mx-3">
                    <div class="form-row">
                        <h5>Pesanan Anda</h5>
                    </div>
                    <div class="form-row my-3">
                        <img src="{{ asset('/storage/'.$check->file) }}" style="height: 100px; width:100px; border-radius:10px;">
                        <h5 class="ml-2">Kelas {{ $check->kelas }}
                            <br>
                        <span style="color: #7E7E7E; font-size: 13px;">Dibuat oleh <strong>{{ $check->mentor->name }}</strong></span><br><button class="px-2 py-2 my-2" style="background-color:rgba(255, 197, 35, 25%); color: #FFC523; border-radius:5px; border:none" disabled>Pemula</button></h5>

                    </div>
                    <div class="form-row">
                        <h5 class="">Pembayaran</h5>
                    </div>
                    <div class="form-row">
                        <p style="color: #7e7e7e;" class="my-3">Diskon</p>
                        <div class="input-group">
                            <input type="text" name="kode" placeholder="Kode Promo" class="form-control p-4"style="border-radius: 13px; outline-color: #929292; margin-top: -10px;">
                            <div class="input-group-append">
                                <img src="{{ URL::asset('/Foto/Vector.png') }}" style="margin-left: -30px;z-index: 1;height: 15px;width: 20px;margin-top: 7px;">
                            </div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-lg-12">
                            <p style="color: #7e7e7e;" class="my-3">Harga Kelas
                            <span style="float: right; color: #1d1d1d;">Rp. @convert($check->harga)</span></p>
                            <hr style="background-color: #e4e4e4; height: 1px">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-lg-12" style="">
                            <p style="color: #1d1d1d;" class="my-3">Harga Total
                            <span style="float: right; color: #1d1d1d; font-weight: bold">Rp. @convert($check->harga)</span></p>
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-lg-6 my-3 mx-auto" style="border: 0.1px solid #D3D3D3; border-radius: 20px; background-color: white;">

                @if ($trans->count() > 0)
                    @foreach ($trans as $item)
                        @if ($item->transaction->transaction_status == 'PENDING')
                            <button class="btn btn-info btn-pending-checkout my-4 mx-3"
                                onclick="alert('Pembayaran anda sedang diproses!')" style="">Pembayaran Sedang Diproses</button>
                        @elseif($item->transaction->transaction_status == 'SUCCESS')
                            <button class="btn btn-warning btn-checkout my-4 mx-3"
                                onclick="event.preventDefault(); location.href='{{ route('play.course',$check->slug) }}'" style="">Lanjut Belajar</button>
                        @else
                            <div class="form-row my-4">
                                <h5 class="">Transfer Pembayaran</h5>
                            </div>
                            <div class="form-row">
                                <div class="col-lg-6 my-3">
                                    <div style="border:1px solid #d3d3d3;margin-top: -30px; border-radius: 10px; ">
                                        <img src="{{ URL::asset('/Foto/bca.png') }}" class="my-3 mx-3">
                                        <p class="mx-3">No. Rekening<span style="float: right;">098432489</span></p>
                                        <p class="mx-3">Penerima<span style="float: right;">Guruku</span></p>
                                    </div>
                                </div>
                                <div class="col-lg-6 my-3">
                                    <div style="border:1px solid #d3d3d3;margin-top: -30px; border-radius: 10px; ">
                                        <img src="{{ URL::asset('/Foto/bni.png') }}" class="my-3 mx-3">
                                        <p class="mx-3">No. Rekening<span style="float: right;">09432389</span></p>
                                        <p class="mx-3">Penerima<span style="float: right;">Guruku</span></p>
                                    </div>
                                </div>
                            </div>

                            @if(count($errors) > 0)
                                <div class="alert alert-danger">
                            @foreach ($errors->all() as $error)
                                {{ $error }} <br/>
                            @endforeach
                                </div>
                            @endif

                            <form action="{{ route('checkout.store') }}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="form-row">
                                    <label for="name" style="color: #7e7e7e;" class="my-3">Nama</label>
                                    <div class="input-group">
                                        <input type="text" name="name" id="name" value="{{ Auth::user()->name }}" class="form-control p-4"style="border-radius: 13px; outline-color: #929292; margin-top: -10px;">
                                    </div>
                                </div>
                                <div class="form-row" hidden>
                                    <label for="email">email</label>
                                    <input type="email" name="email" id="email" value="{{ Auth::user()->email }}">
                                </div>
                                <div class="form-row">
                                    <label for="email" style="color: #7e7e7e;" class="my-3">Email</label>
                                    <div class="input-group">
                                        <input type="email" name="email" id="email" disabled value="{{ Auth::user()->email }}"  class="form-control p-4"style="border-radius: 13px; outline-color: #929292; margin-top: -10px;">
                                        <div class="input-group-append">

                                        </div>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <label for="number" style="color: #7e7e7e;" class="my-3">Nomor HP</label>
                                    <div class="input-group">
                                        <input type="number" name="number" id="number" placeholder="Masukkan nomor hp anda" class="form-control p-4"style="border-radius: 13px; outline-color: #929292; margin-top: -10px;">
                                        <div class="input-group-append">

                                        </div>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <label for="bukti" style="color:#7e7e7e" class="my-3">Bukti Transfer</label>
                                    <input type="file" name="bukti" id="bukti" class="form-control" style="border-radius: 13px; outline-color: #929292; margin-top: -10px;">
                                </div>
                                <div class="form-row" hidden>
                                    <label for="transaction_details">Transaction Details</label>
                                    <input type="hidden" name="transaction_details" id="transaction_details" value="{{ $check->id }}" class="form-control">
                                </div>
                                <div class="form-row" hidden>
                                    <label for="transaction_total">Harga</label>
                                    <input type="hidden" name="transaction_total" id="transaction_total" value="{{ $check->harga }}" class="form-control">
                                </div>
                                <div class="form-row" hidden>
                                    <label for="products_id"></label>
                                    <input type="hidden" name="products_id" id="products_id" value="{{ $check->kelas }}" class="form-control">
                                </div>
                                <div class="form-row" hidden>
                                    <label for="user_id"></label>
                                    <input type="hidden" name="user_id" id="user_id" value="{{ Auth::user()->id }}" class="form-control">
                                </div>
                                <div class="form-row" hidden>
                                    <label for="mentor_id"></label>
                                    <input type="text" name="mentor_id" id="mentor_id" value="{{ $check->mentor->kode_mentor }}">
                                </div>
                                <div class="form-row" style="margin-top:30px;">
                                    <button type="submit" class="btn form-control text-white btn-bayar">Sudah Bayar</button>
                                </div>
                            </form>
                        @endif
                    @endforeach
                @endif
                {{--@foreach ($trans->transaction as $query)
                    @if ($trans->count() > 0)
                        @if ($trans->transaction->transaction_status == 'PENDING')
                            <button class="btn btn-warning btn-checkout my-4 mx-3"
                                onclick="alert('Pembayaran anda sedang diproses!')" style="">Pembayaran Sedang Diproses</button>
                        @elseif($trans->transaction->transaction_status == 'SUCCESS')
                            <button class="btn btn-warning btn-checkout my-4 mx-3"
                                onclick="event.preventDefault(); location.href='{{ route('play.course',$check->slug) }}'" style="">Lanjut Belajar</button>
                        @else
                            <div class="form-row my-4">
                                <h5 class="">Transfer Pembayaran</h5>
                            </div>
                            <div class="form-row">
                                <div class="col-lg-6 my-3">
                                    <div style="border:1px solid #d3d3d3;margin-top: -30px; border-radius: 10px; ">
                                        <img src="{{ URL::asset('/Foto/bca.png') }}" class="my-3 mx-3">
                                        <p class="mx-3">No. Rekening<span style="float: right;">098432489</span></p>
                                        <p class="mx-3">Penerima<span style="float: right;">Guruku</span></p>
                                    </div>
                                </div>
                                <div class="col-lg-6 my-3">
                                    <div style="border:1px solid #d3d3d3;margin-top: -30px; border-radius: 10px; ">
                                        <img src="{{ URL::asset('/Foto/bni.png') }}" class="my-3 mx-3">
                                        <p class="mx-3">No. Rekening<span style="float: right;">09432389</span></p>
                                        <p class="mx-3">Penerima<span style="float: right;">Guruku</span></p>
                                    </div>
                                </div>
                            </div>

                            @if(count($errors) > 0)
                                <div class="alert alert-danger">
                            @foreach ($errors->all() as $error)
                                {{ $error }} <br/>
                            @endforeach
                                </div>
                            @endif

                            <form action="{{ route('checkout.store') }}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="form-row">
                                    <label for="name" style="color: #7e7e7e;" class="my-3">Nama</label>
                                    <div class="input-group">
                                        <input type="text" name="name" id="name" value="{{ Auth::user()->name }}" class="form-control p-4"style="border-radius: 13px; outline-color: #929292; margin-top: -10px;">
                                    </div>
                                </div>
                                <div class="form-row" hidden>
                                    <label for="email">email</label>
                                    <input type="email" name="email" id="email" value="{{ Auth::user()->email }}">
                                </div>
                                <div class="form-row">
                                    <label for="email" style="color: #7e7e7e;" class="my-3">Email</label>
                                    <div class="input-group">
                                        <input type="email" name="email" id="email" disabled value="{{ Auth::user()->email }}"  class="form-control p-4"style="border-radius: 13px; outline-color: #929292; margin-top: -10px;">
                                        <div class="input-group-append">

                                        </div>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <label for="number" style="color: #7e7e7e;" class="my-3">Nomor HP</label>
                                    <div class="input-group">
                                        <input type="number" name="number" id="number" placeholder="Masukkan nomor hp anda" class="form-control p-4"style="border-radius: 13px; outline-color: #929292; margin-top: -10px;">
                                        <div class="input-group-append">

                                        </div>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <label for="bukti" style="color:#7e7e7e" class="my-3">Bukti Transfer</label>
                                    <input type="file" name="bukti" id="bukti" class="form-control" style="border-radius: 13px; outline-color: #929292; margin-top: -10px;">
                                </div>
                                <div class="form-row" hidden>
                                    <label for="transaction_details">Transaction Details</label>
                                    <input type="hidden" name="transaction_details" id="transaction_details" value="{{ $check->id }}" class="form-control">
                                </div>
                                <div class="form-row" hidden>
                                    <label for="transaction_total">Harga</label>
                                    <input type="hidden" name="transaction_total" id="transaction_total" value="{{ $check->harga }}" class="form-control">
                                </div>
                                <div class="form-row" hidden>
                                    <label for="products_id"></label>
                                    <input type="hidden" name="products_id" id="products_id" value="{{ $check->kelas }}" class="form-control">
                                </div>
                                <div class="form-row" hidden>
                                    <label for="user_id"></label>
                                    <input type="hidden" name="user_id" id="user_id" value="{{ Auth::user()->id }}" class="form-control">
                                </div>
                                <div class="form-row" hidden>
                                    <label for="mentor_id"></label>
                                    <input type="text" name="mentor_id" id="mentor_id" value="{{ $check->mentor->kode_mentor }}">
                                </div>
                                <div class="form-row" style="margin-top:30px;">
                                    <button type="submit" class="btn form-control text-white btn-bayar">Sudah Bayar</button>
                                </div>
                            </form>
                        @endif
                    @endif
                @endforeach--}}

                {{--jika pertama kali transaksi --}}
                @if ($trans->count() == 0)
                    <div class="form-row my-4">
                        <h5 class="">Transfer Pembayaran</h5>
                    </div>
                    <div class="form-row">
                        <div class="col-lg-6 my-3">
                            <div style="border:1px solid #d3d3d3;margin-top: -30px; border-radius: 10px; ">
                                <img src="{{ URL::asset('/Foto/bca.png') }}" class="my-3 mx-3">
                                <p class="mx-3">No. Rekening<span style="float: right;">098432489</span></p>
                                <p class="mx-3">Penerima<span style="float: right;">Guruku</span></p>
                            </div>
                        </div>
                        <div class="col-lg-6 my-3">
                            <div style="border:1px solid #d3d3d3;margin-top: -30px; border-radius: 10px; ">
                                <img src="{{ URL::asset('/Foto/bni.png') }}" class="my-3 mx-3">
                                <p class="mx-3">No. Rekening<span style="float: right;">09432389</span></p>
                                <p class="mx-3">Penerima<span style="float: right;">Guruku</span></p>
                            </div>
                        </div>
                    </div>

                    @if(count($errors) > 0)
                        <div class="alert alert-danger">
                    @foreach ($errors->all() as $error)
                        {{ $error }} <br/>
                    @endforeach
                        </div>
                    @endif

                    <form action="{{ route('checkout.store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-row">
                            <label for="name" style="color: #7e7e7e;" class="my-3">Nama</label>
                            <div class="input-group">
                                <input type="text" name="name" id="name" value="{{ Auth::user()->name }}" class="form-control p-4"style="border-radius: 13px; outline-color: #929292; margin-top: -10px;">
                            </div>
                        </div>
                        <div class="form-row" hidden>
                            <label for="email">email</label>
                            <input type="email" name="email" id="email" value="{{ Auth::user()->email }}">
                        </div>
                        <div class="form-row">
                            <label for="email" style="color: #7e7e7e;" class="my-3">Email</label>
                            <div class="input-group">
                                <input type="email" name="email" id="email" disabled value="{{ Auth::user()->email }}"  class="form-control p-4"style="border-radius: 13px; outline-color: #929292; margin-top: -10px;">
                                <div class="input-group-append">

                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <label for="number" style="color: #7e7e7e;" class="my-3">Nomor HP</label>
                            <div class="input-group">
                                <input type="number" name="number" id="number" placeholder="Masukkan nomor hp anda" class="form-control p-4"style="border-radius: 13px; outline-color: #929292; margin-top: -10px;">
                                <div class="input-group-append">

                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <label for="bukti" style="color:#7e7e7e" class="my-3">Bukti Transfer</label>
                            <input type="file" name="bukti" id="bukti" class="form-control" style="border-radius: 13px; outline-color: #929292; margin-top: -10px;">
                        </div>
                        <div class="form-row" hidden>
                            <label for="transaction_details">Transaction Details</label>
                            <input type="hidden" name="transaction_details" id="transaction_details" value="{{ $check->id }}" class="form-control">
                        </div>
                        <div class="form-row" hidden>
                            <label for="transaction_total">Harga</label>
                            <input type="hidden" name="transaction_total" id="transaction_total" value="{{ $check->harga }}" class="form-control">
                        </div>
                        <div class="form-row" hidden>
                            <label for="products_id"></label>
                            <input type="hidden" name="products_id" id="products_id" value="{{ $check->kelas }}" class="form-control">
                        </div>
                        <div class="form-row" hidden>
                            <label for="user_id"></label>
                            <input type="hidden" name="user_id" id="user_id" value="{{ Auth::user()->id }}" class="form-control">
                        </div>
                        <div class="form-row" hidden>
                            <label for="mentor_id"></label>
                            <input type="text" name="mentor_id" id="mentor_id" value="{{ $check->mentor->kode_mentor }}">
                        </div>
                        <div class="form-row" style="margin-top:30px;">
                            <button type="submit" class="btn form-control text-white btn-bayar">Sudah Bayar</button>
                        </div>
                    </form>
                @endif

                {{--logika awal --}}
                {{--@if ($trans->count() > 0)

                    <button class="btn btn-warning btn-checkout my-4 mx-3"
                        onclick="event.preventDefault(); location.href='{{ route('play.course',$check->slug) }}'" style="">Lanjut Belajar</button>

                @else

                    <div class="form-row my-4">
                        <h5 class="">Transfer Pembayaran</h5>
                    </div>
                    <div class="form-row">
                        <div class="col-lg-6 my-3">
                            <div style="border:1px solid #d3d3d3;margin-top: -30px; border-radius: 10px; ">
                                <img src="{{ URL::asset('/Foto/bca.png') }}" class="my-3 mx-3">
                                <p class="mx-3">No. Rekening<span style="float: right;">098432489</span></p>
                                <p class="mx-3">Penerima<span style="float: right;">Guruku</span></p>
                            </div>
                        </div>
                        <div class="col-lg-6 my-3">
                            <div style="border:1px solid #d3d3d3;margin-top: -30px; border-radius: 10px; ">
                                <img src="{{ URL::asset('/Foto/bni.png') }}" class="my-3 mx-3">
                                <p class="mx-3">No. Rekening<span style="float: right;">09432389</span></p>
                                <p class="mx-3">Penerima<span style="float: right;">Guruku</span></p>
                            </div>
                        </div>
                    </div>

                    @if(count($errors) > 0)
                        <div class="alert alert-danger">
                    @foreach ($errors->all() as $error)
                        {{ $error }} <br/>
                    @endforeach
                        </div>
                    @endif

                    <form action="{{ route('checkout.store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-row">
                            <label for="name" style="color: #7e7e7e;" class="my-3">Nama</label>
                            <div class="input-group">
                                <input type="text" name="name" id="name" value="{{ Auth::user()->name }}" class="form-control p-4"style="border-radius: 13px; outline-color: #929292; margin-top: -10px;">
                            </div>
                        </div>
                        <div class="form-row" hidden>
                            <label for="email">email</label>
                            <input type="email" name="email" id="email" value="{{ Auth::user()->email }}">
                        </div>
                        <div class="form-row">
                            <label for="email" style="color: #7e7e7e;" class="my-3">Email</label>
                            <div class="input-group">
                                <input type="email" name="email" id="email" disabled value="{{ Auth::user()->email }}"  class="form-control p-4"style="border-radius: 13px; outline-color: #929292; margin-top: -10px;">
                                <div class="input-group-append">

                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <label for="number" style="color: #7e7e7e;" class="my-3">Nomor HP</label>
                            <div class="input-group">
                                <input type="number" name="number" id="number" placeholder="Masukkan nomor hp anda" class="form-control p-4"style="border-radius: 13px; outline-color: #929292; margin-top: -10px;">
                                <div class="input-group-append">

                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <label for="bukti" style="color:#7e7e7e" class="my-3">Bukti Transfer</label>
                            <input type="file" name="bukti" id="bukti" class="form-control" style="border-radius: 13px; outline-color: #929292; margin-top: -10px;">
                        </div>
                        <div class="form-row" hidden>
                            <label for="transaction_details">Transaction Details</label>
                            <input type="hidden" name="transaction_details" id="transaction_details" value="{{ $check->id }}" class="form-control">
                        </div>
                        <div class="form-row" hidden>
                            <label for="transaction_total">Harga</label>
                            <input type="hidden" name="transaction_total" id="transaction_total" value="{{ $check->harga }}" class="form-control">
                        </div>
                        <div class="form-row" hidden>
                            <label for="products_id"></label>
                            <input type="hidden" name="products_id" id="products_id" value="{{ $check->kelas }}" class="form-control">
                        </div>
                        <div class="form-row" hidden>
                            <label for="user_id"></label>
                            <input type="hidden" name="user_id" id="user_id" value="{{ Auth::user()->id }}" class="form-control">
                        </div>
                        <div class="form-row" hidden>
                            <label for="mentor_id"></label>
                            <input type="text" name="mentor_id" id="mentor_id" value="{{ $check->mentor->kode_mentor }}">
                        </div>
                        <div class="form-row" style="margin-top:30px;">
                            <button type="submit" class="btn form-control text-white btn-bayar">Sudah Bayar</button>
                        </div>
                    </form>

                @endif--}}

                {{--<div class="form-row my-4 mx-3">
                    <h5 class="">Transfer Pembayaran</h5>
                </div>
                <div class="form-row">
                    <div class="col-lg-6 my-3">
                        <input type="radio" id="bca" name="bank" value="bca">
                        <div style="border:1px solid #d3d3d3;margin-left: 30px;margin-top: -30px; border-radius: 10px; ">
                            <img src="{{ URL::asset('/Foto/bca.png') }}" class="my-3 mx-3">
                            <p class="mx-3">No. Rekening<span style="float: right;">2748294738</span></p>
                            <p class="mx-3">Penerima<span style="float: right;">{{ $check->mentor->nama }}</span></p>
                        </div>
                    </div>
                    <div class="col-lg-6 my-3">
                        <input type="radio" id="bni" name="bank" value="bni">
                        <div style="border:1px solid #d3d3d3;margin-left: 30px;margin-top: -30px; border-radius: 10px;">
                            <img src="{{ URL::asset('/Foto/bni.png') }}" class="my-3 mx-3">
                            <p class="mx-3">No. Rekening<span style="float: right;">2749275846</span></p>
                            <p class="mx-3">Penerima<span style="float: right;">{{ $check->mentor->nama }}</span></p>
                        </div>
                    </div>
                </div>--}}

                             {{--<form action="{{ route('checkout.store') }}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="form-row">
                                    <label for="name" style="color: #7e7e7e;" class="my-3">Nama</label>
                                    <div class="input-group">
                                        <input type="text" name="name" id="name" value="{{ Auth::user()->name }}" class="form-control p-4"style="border-radius: 13px; outline-color: #929292; margin-top: -10px;">
                                    </div>
                                </div>
                                <div class="form-row">
                                    <label for="email" style="color: #7e7e7e;" class="my-3">Email</label>
                                    <div class="input-group">
                                        <input type="email" name="email" id="email" value="{{ Auth::user()->email }}"  class="form-control p-4"style="border-radius: 13px; outline-color: #929292; margin-top: -10px;">
                                        <div class="input-group-append">

                                        </div>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <label for="number" style="color: #7e7e7e;" class="my-3">Nomor HP</label>
                                    <div class="input-group">
                                        <input type="number" name="number" id="number" placeholder="Masukkan nomor hp anda" class="form-control p-4"style="border-radius: 13px; outline-color: #929292; margin-top: -10px;">
                                        <div class="input-group-append">

                                        </div>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <label for="bukti" style="color:#7e7e7e" class="my-3">Bukti Transfer</label>
                                    <input type="file" name="bukti" id="bukti" class="form-control" style="border-radius: 13px; outline-color: #929292; margin-top: -10px;">
                                </div>
                                <div class="form-row" hidden>
                                    <label for="transaction_details">Transaction Details</label>
                                    <input type="hidden" name="transaction_details" id="transaction_details" value="{{ $check->id }}" class="form-control">
                                </div>
                                <div class="form-row" hidden>
                                    <label for="transaction_total">Harga</label>
                                    <input type="hidden" name="transaction_total" id="transaction_total" value="{{ $check->harga }}" class="form-control">
                                </div>
                                <div class="form-row" hidden>
                                    <label for="products_id"></label>
                                    <input type="hidden" name="products_id" id="products_id" value="{{ $check->kelas }}" class="form-control">
                                </div>
                                <div class="form-row" hidden>
                                    <label for="user_id"></label>
                                    <input type="hidden" name="user_id" id="user_id" value="{{ Auth::user()->id }}" class="form-control">
                                </div>
                                <div class="form-row" style="margin-top:30px;">
                                    <button type="submit" class="btn form-control text-white" style="background-color: #36C5BA;border-radius: 10px;margin-bottom: 30px;">Sudah Bayar</button>
                                </div>
                            </form>--}}


                {{--<form class="my-4 mx-3">--}}
                    {{--<div class="form-row">
                        <h5 class="">Transfer Pembayaran</h5>
                    </div>
                    <div class="form-row">
                        <div class="col-lg-6 my-3">
                            <input type="radio" id="bca" name="bank" value="bca">
                            <div style="border:1px solid #d3d3d3;margin-left: 30px;margin-top: -30px; border-radius: 10px; ">
                                <img src="{{ URL::asset('/Foto/bca.png') }}" class="my-3 mx-3">
                                <p class="mx-3">No. Rekening<span style="float: right;">2748294738</span></p>
                                <p class="mx-3">Penerima<span style="float: right;">{{ $check->mentor->nama }}</span></p>
                            </div>
                        </div>
                        <div class="col-lg-6 my-3">
                            <input type="radio" id="bni" name="bank" value="bni">
                            <div style="border:1px solid #d3d3d3;margin-left: 30px;margin-top: -30px; border-radius: 10px;">
                                <img src="{{ URL::asset('/Foto/bni.png') }}" class="my-3 mx-3">
                                <p class="mx-3">No. Rekening<span style="float: right;">2749275846</span></p>
                                <p class="mx-3">Penerima<span style="float: right;">{{ $check->mentor->nama }}</span></p>
                            </div>
                        </div>
                    </div>
                    <div class="form-row">
                        <h5 class="">Pembayaran</h5>
                    </div>
                    @if(count($errors) > 0)
                        <div class="alert alert-danger">
                    @foreach ($errors->all() as $error)
                        {{ $error }} <br/>
                    @endforeach
                        </div>
                    @endif--}}

                {{--<form action="{{ route('checkout.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-row">
                        <label for="name" style="color: #7e7e7e;" class="my-3">Nama</label>
                        <div class="input-group">
                            <input type="text" name="name" id="name" value="{{ Auth::user()->name }}" class="form-control p-4"style="border-radius: 13px; outline-color: #929292; margin-top: -10px;">
                        </div>
                    </div>
                    <div class="form-row">
                        <label for="email" style="color: #7e7e7e;" class="my-3">Email</label>
                        <div class="input-group">
                            <input type="email" name="email" id="email" value="{{ Auth::user()->email }}"  class="form-control p-4"style="border-radius: 13px; outline-color: #929292; margin-top: -10px;">
                            <div class="input-group-append">

                            </div>
                        </div>
                    </div>
                    <div class="form-row">
                        <label for="number" style="color: #7e7e7e;" class="my-3">Nomor HP</label>
                        <div class="input-group">
                            <input type="number" name="number" id="number" placeholder="Masukkan nomor hp anda" class="form-control p-4"style="border-radius: 13px; outline-color: #929292; margin-top: -10px;">
                            <div class="input-group-append">

                            </div>
                        </div>
                    </div>
                    <div class="form-row">
                        <label for="bukti" style="color:#7e7e7e" class="my-3">Bukti Transfer</label>
                        <input type="file" name="bukti" id="bukti" class="form-control" style="border-radius: 13px; outline-color: #929292; margin-top: -10px;">
                    </div>
                    <div class="form-row" hidden>
                        <label for="transaction_details">Transaction Details</label>
                        <input type="hidden" name="transaction_details" id="transaction_details" value="{{ $check->id }}" class="form-control">
                    </div>
                    <div class="form-row" hidden>
                        <label for="transaction_total">Harga</label>
                        <input type="hidden" name="transaction_total" id="transaction_total" value="{{ $check->harga }}" class="form-control">
                    </div>
                    <div class="form-row" hidden>
                        <label for="products_id"></label>
                        <input type="hidden" name="products_id" id="products_id" value="{{ $check->kelas }}" class="form-control">
                    </div>
                    <div class="form-row" hidden>
                        <label for="user_id"></label>
                        <input type="hidden" name="user_id" id="user_id" value="{{ Auth::user()->id }}" class="form-control">
                    </div>--}}
                    {{--@foreach ($trans as $query => $users)
                        @if ($users->products_id == $check->id)
                            <div class="form-row" style="margin-top:30px;">
                                <button type="submit" onclick="event.preventDefault(); location.href='{{ route('play.course',$check->slug) }}'" class="btn form-control text-white" style="background-color: #36C5BA;border-radius: 10px;margin-bottom: 30px;">Lanjut Belajar</button>
                            </div>

                            @else

                            <div class="form-row">
                                <h5 class="">Pembayaran</h5>
                            </div>

                            @if(count($errors) > 0)
                                <div class="alert alert-danger">
                            @foreach ($errors->all() as $error)
                                {{ $error }} <br/>
                            @endforeach
                                </div>
                            @endif


                             <form action="{{ route('checkout.store') }}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="form-row">
                                    <label for="name" style="color: #7e7e7e;" class="my-3">Nama</label>
                                    <div class="input-group">
                                        <input type="text" name="name" id="name" value="{{ Auth::user()->name }}" class="form-control p-4"style="border-radius: 13px; outline-color: #929292; margin-top: -10px;">
                                    </div>
                                </div>
                                <div class="form-row">
                                    <label for="email" style="color: #7e7e7e;" class="my-3">Email</label>
                                    <div class="input-group">
                                        <input type="email" name="email" id="email" value="{{ Auth::user()->email }}"  class="form-control p-4"style="border-radius: 13px; outline-color: #929292; margin-top: -10px;">
                                        <div class="input-group-append">

                                        </div>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <label for="number" style="color: #7e7e7e;" class="my-3">Nomor HP</label>
                                    <div class="input-group">
                                        <input type="number" name="number" id="number" placeholder="Masukkan nomor hp anda" class="form-control p-4"style="border-radius: 13px; outline-color: #929292; margin-top: -10px;">
                                        <div class="input-group-append">

                                        </div>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <label for="bukti" style="color:#7e7e7e" class="my-3">Bukti Transfer</label>
                                    <input type="file" name="bukti" id="bukti" class="form-control" style="border-radius: 13px; outline-color: #929292; margin-top: -10px;">
                                </div>
                                <div class="form-row" hidden>
                                    <label for="transaction_details">Transaction Details</label>
                                    <input type="hidden" name="transaction_details" id="transaction_details" value="{{ $check->id }}" class="form-control">
                                </div>
                                <div class="form-row" hidden>
                                    <label for="transaction_total">Harga</label>
                                    <input type="hidden" name="transaction_total" id="transaction_total" value="{{ $check->harga }}" class="form-control">
                                </div>
                                <div class="form-row" hidden>
                                    <label for="products_id"></label>
                                    <input type="hidden" name="products_id" id="products_id" value="{{ $check->kelas }}" class="form-control">
                                </div>
                                <div class="form-row" hidden>
                                    <label for="user_id"></label>
                                    <input type="hidden" name="user_id" id="user_id" value="{{ Auth::user()->id }}" class="form-control">
                                </div>
                                <div class="form-row" style="margin-top:30px;">
                                    <button type="submit" class="btn form-control text-white" style="background-color: #36C5BA;border-radius: 10px;margin-bottom: 30px;">Sudah Bayar</button>
                                </div>
                            </form>
                        @endif
                    @endforeach--}}
                {{--</form>--}}
            </div>
        </div>
    </div>




    {{--<div class="container-fluid" style="margin-top:300px;">
        <div class="row">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 kotak">
                        <div class="row">
                            <div class="col-lg-4 mt-3">
                                <div class="col-lg-12 abu">
                                    <span><img src="{{url('/adminkelasbaru/'.$check->file)}}" class="gambar" alt="" width="170px"></span>
                                </div>
                            </div>
                            <div class="col-lg-8 mt-3">
                                <p class="kelas2">Kelas {{ $check->kelas }}</p>
                                <p class="mentor">Dibuat Oleh {{ $check->mentor->nama }}</p>
                                <span class="badge badge-danger jenis">{{ $check->jenis }}</span>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12">
                                <p class="akses mt-3">Akses kelas ini diberikan kepada</p>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon1"><i class="fa fa-envelope"></i></span>
                                    </div>
                                    <input type="text" disabled class="form-control input" value="{{ Auth::user()->email }}">
                                </div>
                                <p class="nama">Kelas ini akan diberikan kepada {{ Auth::user()->name }}</p>
                                <div class="collapse multi-collapse" id="multiCollapseExample2">
                                    <p class="">Silahkan Isi Form Pembayaran Dibawah</p>
                                    <p class="in">Informasi Pembeli</p>
                                    @if(count($errors) > 0)
                                        <div class="alert alert-danger">
                                    @foreach ($errors->all() as $error)
                                        {{ $error }} <br/>
                                    @endforeach
                                        </div>
                                    @endif
                                    <form action="{{ route('checkout.store') }}" method="post" enctype="multipart/form-data">
                                        @csrf
                                        <div class="form-group">
                                            <label for="name">Nama</label>
                                            <input type="text" name="name" id="name" value="{{ Auth::user()->name }}" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label for="email">email</label>
                                            <input type="email" name="email" id="email" value="{{ Auth::user()->email }}" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label for="number">Nomor Hp</label>
                                            <input type="number" name="number" id="number" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label for="bukti">Bukti Transfer</label>
                                            <input type="file" name="bukti" id="bukti" class="form-control">
                                        </div>
                                        <div class="form-group" hidden>
                                            <label for="transaction_details">Transaction Details</label>
                                            <input type="hidden" name="transaction_details" id="transaction_details" value="{{ $check->id }}" class="form-control">
                                        </div>
                                        <div class="form-group" hidden>
                                            <label for="transaction_total"></label>
                                            <input type="hidden" name="transaction_total" id="transaction_total" value="{{ $check->harga }}" class="form-control">
                                        </div>
                                        <div class="form-group" hidden>
                                            <label for="user_id"></label>
                                            <input type="hidden" name="user_id" id="user_id" value="{{ Auth::user()->id }}" class="form-control">
                                        </div>
                                        <button class="btn btn-primary btn-block" type="submit">Sudah Bayar</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 card kotak2">
                        <p style="font-weight: bold;" class="mt-1">Pembayaran</p>
                        <p>Harga Kelas <span class="kanan">Rp. @convert($check->harga) </span></p>
                        <p>Kode Unik <span id="kode" class="kanan"></span></p>
                        <p>Harga Total <span id="x" class="kanan"></span>  </p>
                        <div class="collapse multi-collapse" id="multiCollapseExample1">
                            <hr>
                            <p>Transfer Pembayaran</p>
                            <img src="{{ URL::asset('/img/bca.png') }}" width="120px" alt="BCA">
                            <p class="mt-2">Bank <span class="kanan">BCA</span></p>
                            <p>No.Rekening <span class="kanan">234280239</span></p>
                            <p>Penerima <span class="kanan">Vetrick</span></p>
                        </div>
                        <button class="btn btn-primary" type="button" data-toggle="collapse" data-target=".multi-collapse" aria-expanded="false" aria-controls="multiCollapseExample1 multiCollapseExample2">
                            Lihat Details
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>--}}


    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <img src="{{ URL::asset('/img/google.png') }}" width="200px" class="jrk-google" alt="">
            </div>
        </div>
        <div class="row mt-3">
            <div class="col-lg-4">
                <div class="col-lg-12" style="border:1px solid lightgrey;">
                    <div class="media">
                        <img src="{{ URL::asset('/img/peo.png') }}" width="50px" class="mr-3" alt="...">
                        <div class="media-body">
                        <h5 class="mt-0">Wilsen</h5>
                            Wah, pembahasan materi nya sangat bagus di tambah mentor yang sangat berpengalaman jadi belajar juga enak
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="col-lg-12" style="border:1px solid lightgrey;">
                    <div class="media">
                        <img src="{{ URL::asset('/img/peo.png') }}" width="50px" class="mr-3" alt="...">
                        <div class="media-body">
                        <h5 class="mt-0">Wilsen</h5>
                            Wah, pembahasan materi nya sangat bagus di tambah mentor yang sangat berpengalaman jadi belajar juga enak
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="col-lg-12" style="border:1px solid lightgrey;">
                    <div class="media">
                        <img src="{{ URL::asset('/img/peo.png') }}" width="50px" class="mr-3" alt="...">
                        <div class="media-body">
                        <h5 class="mt-0">Wilsen</h5>
                            Wah, pembahasan materi nya sangat bagus di tambah mentor yang sangat berpengalaman jadi belajar juga enak
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{--footer --}}
        @include('includes.footer')
    {{--end footer --}}


    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
  </body>
</html>
