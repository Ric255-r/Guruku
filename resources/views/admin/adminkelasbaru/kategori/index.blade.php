@extends('layouts.default')

@section('content')
{{-- <center> --}}
{{-- </center> --}}
    <div class="orders">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="box-title">Daftar Kategori</h4>
                    </div>
                    <div class="card-body">
                        <div class="table-stats ov-h">
                            @if(session('success'))
                                <div class="alert alert-success">
                                    {{ session('success') }}
                                </div>
                            @endif
                            <table class="table table-hover table-responsive-sm" id="dataTable" width="100%">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Kategori</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($kategori as $query)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{$query->kategori}}</td>
                                            <td class="align-middle">
                                                <a href="{{ route('kategori.gallery', $query->slug) }}" class="btn btn-info">
                                                    <i class="fa fa-camera"></i>
                                                </a>
                                                <a href="{{ route('kategori.edit', $query->id) }}" class="btn btn-warning">
                                                    <i class="fa fa-pencil"></i>
                                                </a>
                                                <form action="{{ route('kategori.destroy', $query->id) }}" method="post" class="d-inline">
                                                    @csrf
                                                    @method('delete')
                                                    <button type="submit" class="btn btn-danger">
                                                        <i class="fa fa-trash"></i>
                                                    </button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- <div class="container-fluid">
        <div class="row">
            <div class="col-sm-8">
                Halaman : {{ $kelas->currentPage() }} <br>
                Jumlah Data : {{ $kelas->total() }} <br>
                Data Per Halaman : {{ $kelas->perPage() }} <br>
                {{ $kelas->links() }}
            </div>
            <div class="col-sm-2"></div>
        </div>
    </div> --}}
@endsection
