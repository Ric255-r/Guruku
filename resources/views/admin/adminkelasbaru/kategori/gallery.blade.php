@extends('layouts.default')

@section('content')
<div class="orders">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="box-title">Daftar Topik<small> "{{ $kategori->kategori }}"</small></h4>
                    <a href="{{ route('kategori.create') }}" class="btn btn-info">Tambah Topik</a>
                </div>
                <div class="card-body--">
                    <div class="table-stats order-table ov-h">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    {{-- <th>kategori</th> --}}
                                    <th>Topik</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($topik as $query)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        {{-- <td>{{ $query->topic->kategori }}</td> --}}
                                        <td>{{ $query->topik }}</td>
                                        <td>
                                            <form action="{{ route('kategori.hapus', $query->id) }}" method="post" class="d-inline">
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
                        <span class="ml-3">
                            {{ $topik->firstItem()}} to {{ $topik->lastItem() }} of total {{ $topik->total() }}
                                <br>
                            {{ $topik->links() }}
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
