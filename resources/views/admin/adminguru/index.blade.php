@extends('layouts.default')

@section('content')
<div class="orders">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="box-title">Daftar Guru</h4>
                </div>
                <div class="card-body--">
                    <div class="table-stats order-table ov-h">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th width="1%">File</th>
                                    <th>Keterangan</th>
                                    <th>Kategori</th>
                                    <th>Nama Mentor</th>
                                    <th>Hari</th>
                                    <th>Jam</th>
                                    <th>Deskripsi</th>
                                    <th colspan="2">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($gambar as $g)
                                <tr>
                                    <td><img width="150px" src="{{ url('/adminguru/'.$g->file) }}" alt="gambar"></td>
                                    {{-- <td><img src="{{Storage::url($g->image)}}" alt="gambar" width="150px"></td> --}}
                                    <td>{{$g->keterangan}}</td>
                                    <td>{{$g->kategori}}</td>
                                    <td>{{$g->namamentor}}</td>
                                    <td>{{$g->hari}}</td>
                                    <td>{{$g->jam}}</td>
                                    <td>{{$g->deskripsi}}</td>
                                    <td>
                                    <a href="{{ route('adminguru.edit', $g->id) }}" class="btn btn-warning">
                                        <i class="fa fa-pencil"></i>
                                    </a>
                                    <form action="{{ route('adminguru.destroy', $g->id) }}" method="post" class="d-inline">
                                        @method('delete')
                                        @csrf
                                        <button type="submit" class="btn btn-danger">
                                            <i class="fa fa-trash"></i>
                                        </button>
                                    </form>
                                    {{-- <a href="/admin/adminguru/{{$g->id}}">Details</a> --}}
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="6" class="text-center p-5">
                                        Data tidak tersedia
                                    </td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
        <div class="container">
            <div class="row">
                <div class="col-sm-8">
                    Halaman : {{ $gambar->currentPage() }} <br>
                    Jumlah Data : {{ $gambar->total() }} <br>
                    Data Per Halaman : {{ $gambar->perPage() }} <br>
                    {{ $gambar->links() }}
                </div>
                <div class="col-sm-2"></div>
            </div>
        </div>
@endsection
