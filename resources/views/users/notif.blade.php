@extends('layouts.default2')

@section('content')
    <link rel="stylesheet" href="{{ URL::asset('/css/kelasbaru.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css">
    {{-- <div class="orders"> --}}
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="box-title">Notification</h4>
                        </div>
                        <div class="dropdown card-body text-right">
                            @php
                                $cekcount = 0;
                            @endphp
                            {{-- Awal --}}
                            {{-- @foreach ($komen as $item)
                                @foreach ($reply as $item2)
                                    @if ($item->id == $item2->id_comment)
                                        @php
                                            $cekcount++;
                                        @endphp
                                    @endif
                                @endforeach
                            @endforeach --}}
                            @foreach ($reply as $item)
                                @if (strpos($item->pesan, "@".Auth::user()->name) !== false)
                                    @php
                                        $cekcount++;
                                    @endphp
                                @endif
                            @endforeach
                            
                            <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Blog Notification 
                                <span class="badge badge-light">
                                    {{ $cekcount }} 
                                    @if ($cekcount != 0)
                                        <i class="fas fa-bell text-danger"></i>
                                    @endif
                                </span>
                            </button>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                @if ($cekcount == 0)
                                    <a class="dropdown-item">Tidak Ada Notifikasi Terbaru</a>
                                @else
                                    @foreach ($reply as $item2)
                                        @if (strpos($item2->pesan, "@".Auth::user()->name) !== false)
                                            <a class="dropdown-item">
                                                <form action="{{ route('notifkomen.checked', $item2->id_comment) }}" method="post">
                                                    @csrf
                                                    @method('PUT')
                                                    <div class="col-sm-12">
                                                        Anda Mendapatkan balasan dari {{ $item2->name }} 
                                                        Pada Komentar User "{{ $item2->orang_intikomen }}" di Blog
                                                        <input type="hidden" name="id_user_balas" value="{{ $item2->id_user }}">
                                                        <input type="hidden" name="blog_slug" value="{{ $item2->blog_slug }}">
                                                        <input type="submit" value="{{ $item2->blog_slug }}" style="color: blue; border: 0; background: transparent;">
                                                    </div>
                                                </form>
                                            </a>
                                        @endif
                                    @endforeach
                                    {{-- Awal --}}
                                    {{-- @foreach ($komen as $item)
                                        @foreach ($reply as $item2)
                                            @if ($item->id == $item2->id_comment)
                                                <a class="dropdown-item">
                                                    <form action="{{ route('notifkomen.checked', $item2->id_comment) }}" method="post">
                                                        @csrf
                                                        @method('PUT')
                                                        <div class="col-sm-12">
                                                            Anda Mendapatkan balasan dari {{ $item2->name }} di Blog
                                                            <input type="hidden" name="blog_slug" value="{{ $item2->blog_slug }}">
                                                            <input type="submit" value="{{ $item2->blog_slug }}" style="color: blue; border: 0; background: transparent;">
                                                        </div>
                                                    </form>
                                                </a>
                                            @endif
                                        @endforeach
                                    @endforeach --}}
                                @endif
                            </div>
                        </div>

                        <br>
                        <div class="card-body">
                            {{-- <div class="table-stat order-table ov-h"> --}}
                                <table class="table ">
                                    <thead>
                                        @foreach ($notif as $query)
                                            @if ($query->transaction_status == 'PENDING')
                                                <tr>
                                                    <td style=" background-color:#129dde; border-right:1px solid white;">
                                                        <p style="color:white; margin-top:10px;">Sabar ya! pembayaran mu sedah di proses</p>
                                                    </td>
                                                    <td>
                                                        <a
                                                            style="float:right;"
                                                            href="#mymodal4"
                                                            data-remote="{{ route('notification.show', $query->id) }}"
                                                            data-toggle="modal"
                                                            data-target="#mymodal4"
                                                            data-title="Detail Transaksi {{ $query->tfid }}"
                                                            class="btn btn-primary">
                                                                <i class="fa fa-eye"></i>
                                                            </a>
                                                    </td>
                                                </tr>
                                            @elseif($query->transaction_status == 'SUCCESS')
                                                <tr>
                                                    <td style="background-color:#4CAF50; border-right:1px solid white;">
                                                        <p class="" style="color:white;">Yey pembayaran mu berhasil!</p>
                                                    </td>
                                                    <td>
                                                        <a
                                                            style="float:right;"
                                                            href="#mymodal4"
                                                            data-remote="{{ route('notification.show', $query->id) }}"
                                                            data-toggle="modal"
                                                            data-target="#mymodal4"
                                                            data-title="Detail Transaksi {{ $query->tfid }}"
                                                            class="btn btn-primary">
                                                                <i class="fa fa-eye"></i>
                                                        </a>
                                                    </td>
                                                </tr>
                                            @else
                                                <tr>
                                                    <td style="background-color:#d42e22; border-right:1px solid white;">
                                                        <p style="color:#ffff;">Yah pembayaran mu gagal nih!</p>
                                                    </td>
                                                    <td>
                                                        <a
                                                            style="float:right;"
                                                            href="#mymodal4"
                                                            data-remote="{{ route('notification.show', $query->id) }}"
                                                            data-toggle="modal"
                                                            data-target="#mymodal4"
                                                            data-title="Detail Transaksi {{ $query->tfid }}"
                                                            class="btn btn-primary">
                                                                <i class="fa fa-eye"></i>
                                                            </a>
                                                    </td>
                                                </tr>
                                            @endif
                                        @endforeach
                                        {{-- @foreach ($trans as $query)
                                            @if ($query->transaction_status == 'PENDING')
                                                <tr style="background-color:lightblue;">
                                                    <td>{{ $query->name }}</td>
                                                    <td>{{ $query->email }}</td>
                                                    <td>{{ $query->number }}</td>
                                                    <td>{{ $query->bukti }}</td>
                                                    <td>{{ $query->transaction_total }}</td>
                                                    <td>Sabar ya!</td>
                                            @elseif($query->transaction_status == 'SUCCESS')
                                                <tr style="background-color:#00ff3c; color:white">
                                                    <td>{{ $query->name }}</td>
                                                    <td>{{ $query->email }}</td>
                                                    <td>{{ $query->number }}</td>
                                                    <td>{{ $query->bukti }}</td>
                                                    <td>{{ $query->transaction_total }}</td>
                                                    <td>Yey, pembayaran mu berhasil!</td>
                                            @else
                                                <tr style="background-color:red;">
                                                    <td>{{ $query->name }}</td>
                                                    <td>{{ $query->email }}</td>
                                                    <td>{{ $query->number }}</td>
                                                    <td>{{ $query->bukti }}</td>
                                                    <td>{{ $query->transaction_total }}</td>
                                                    <td>Yah! Pembayaran mu gagal</td>
                                            @endif
                                            </tr>
                                        @endforeach --}}
                                    </thead>
                                </table>
                            {{-- </div> <!-- /.table-stats --> --}}
                        </div>
                    </div> <!-- /.card -->
                </div>  <!-- /.col-lg-8 -->
            </div>
        </div>
    {{-- </div> --}}
@endsection
