@extends('layouts.default')

@section('content')
<div class="orders">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="box-title">Daftar Materi {{ $video->jenis }}<small> "{{ $video->kelas }}"</small></h4>
                    <a href="{{ route('video.create') }}" class="btn btn-info">Tambah Materi</a>
                </div>
                <div class="card-body--">
                    <div class="table-stats order-table ov-h">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Nama Kelas</th>
                                    <th>Judul Materi</th>
                                    <th>Video</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($items as $query)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $query->bayar->kelas }}</td>
                                        <td>{{ $query->judul }}</td>
                                        <td>
                                            <iframe width="300" height="100" src="https://www.youtube.com/embed/{{ $query->file }}" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                                        </td>
                                        <td>
                                            <form action="{{ route('adminkelasbaru.hapus', $query->id) }}" method="post" class="d-inline">
                                                @csrf
                                                @method('delete')
                                                <button class="btn btn-danger btn-sm">
                                                    Delete
                                                    {{-- <i class="fa fa-trash"></i> --}}
                                                </button>
                                            </form>
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
@endsection
