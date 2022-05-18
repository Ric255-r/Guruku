@extends('layouts.default')

@section('content')
<div class="orders">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="box-title">Daftar Topik</h4>
                    {{--<a href="{{ route('topik.create') }}" class="btn btn-info">Tambah Topik</a>--}}
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
                                    <th>Nama Kategori</th>
                                    <th>Nama topik</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($topik as $query)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $query->topic->kategori }}</td>
                                        <td>{{ $query->topik }}</td>
                                        <td>
                                            <a href="{{ route('topik.edit', $query->id) }}" class="btn btn-warning">
                                                <i class="fa fa-pencil"></i>
                                            </a>
                                            <form action="{{ route('topik.destroy', $query->id) }}" method="post" class="d-inline">
                                                @csrf
                                                @method('delete')
                                                <button class="btn btn-danger">
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
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
