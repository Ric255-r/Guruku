@extends('layouts.default')

@section('content')
{{-- <center> --}}
{{-- </center> --}}
    <div class="orders">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="box-title">Daftar Kelas Gratis</h4>
                    </div>
                    <div class="card-body--">
                        <div class="table-stats order-table ov-h">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>File</th>
                                        <th>Pelajaran</th>
                                        <th>Deskripsi</th>
                                        <th colspan="2">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($kelas as $query)
                                        <tr>
                                            <td><img src="{{URL::asset('/adminkelas/'.$query->file)}}" alt="gam" width="150px"></td>
                                            <td>{{$query->pelajaran}}</td>
                                            <td>{{$query->deskripsi}}</td>
                                            <td>
                                                {{-- <div class="btn-group" style="margin-left:10px;" role="group" aria-label="Basic example"> --}}
                                                    <a href="{{ route('adminkelas.gallery', $query->id) }}" class="btn btn-info">
                                                    {{-- <a href="/admin/adminkelas/{{ $query->id }}/gallery" class="btn btn-info btn-sm"> --}}
                                                        <i class="fa fa-video-camera"></i>
                                                    </a>
                                                    <a href="{{ route('adminkelas.edit', $query->id) }}" class="btn btn-warning">
                                                        <i class="fa fa-pencil"></i>
                                                    </a>
                                                    <form action="{{ route('adminkelas.hapus', $query->id) }}" method="post" class="d-inline">
                                                        @method('delete')
                                                        @csrf
                                                        <button type="submit" class="btn btn-danger">
                                                            <i class="fa fa-trash"></i>
                                                        </button>
                                                    </form>
                                                {{-- </div> --}}
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
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-8">
                Halaman : {{ $kelas->currentPage() }} <br>
                Jumlah Data : {{ $kelas->total() }} <br>
                Data Per Halaman : {{ $kelas->perPage() }} <br>
                {{ $kelas->links() }}
            </div>
            <div class="col-sm-2"></div>
        </div>
    </div>
@endsection
