@extends('layouts.default')

@section('content')
<div class="orders">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="box-title">Daftar Video</h4>
                    {{--<a href="{{ route('video.create') }}" class="btn btn-info">Tambah Video</a>--}}
                </div>
                <div class="card-body">
                    <div class="table-stats ov-h">
                        @if(session('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                        @endif
                        <table class="table table-hover table-responsive-sm" id="dataTable">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Nama Kelas</th>
                                    <th>Judul Video</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($video as $query)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $query->products_id }}</td>
                                        <td>{{ $query->judul }}</td>
                                        <td>
                                            <a href="{{ route('video.edit',$query->id) }}">
                                                <button class="btn btn-warning btn-sm"><i class="fa fa-pencil"></i></button>
                                            </a>
                                            <form action="{{ route('video.destroy', $query->id) }}" method="post" class="d-inline">
                                                @csrf
                                                @method('delete')
                                                <button class="btn btn-danger btn-sm">
                                                    <i class="fa fa-trash"></i>
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
                        {{-- <span class="ml-3">
                            {{ $video->firstItem()}} to {{ $video->lastItem() }} of total {{ $video->total() }}
                                <br>
                            {{ $video->links() }}
                        </span> --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
