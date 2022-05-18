@extends('layouts.default')

@section('content')
<div class="orders">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="box-title">Daftar Video Bayar <small>"{{ $bayar->pelajaran }}"</small></h4>
                    <a href="{{ route('videobayar.create') }}" class="btn btn-info">Tambah Video</a>
                </div>
                <div class="card-body--">
                    <div class="table-stats order-table ov-h">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Nama Kelas</th>
                                    <th>Video</th>
                                    <th>Default</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($items as $query)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $query->bayar->pelajaran }}</td>
                                        <td>
                                            <video style="width:300px; height:100px" controls>
                                                <source src="{{ url($query->video) }}" type="video/mp4">
                                                Your browser does not support the video tag.
                                            </video>
                                        </td>
                                        <td>{{ $query->is_default ? 'Ya' : 'Tidak' }}</td>
                                        <td>
                                            <form action="{{ route('adminkelas.destroy', $query->id) }}" method="post" class="d-inline">
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
