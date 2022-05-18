@extends('layouts.default')

@section('content')
    <div class="orders">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="box-title">Daftar Transaksi Masuk</h4>
                    </div>
                    <div class="card-body">
                        <div class="table-stats ov-h">
                            @if(session('success'))
                                <div class="alert alert-success">
                                    {{ session('success') }}
                                </div>
                            @endif
                            <table class="table table-responsive-sm table-hover dataTable">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Nama</th>
                                        <th>Email</th>
                                        <th>Nomor</th>
                                        <th>Total Transaksi</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($item as $query)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $query->name }}</td>
                                            <td>{{ $query->email }}</td>
                                            <td>{{ $query->number }}</td>
                                            <td>Rp. {{ $query->transaction_total }}</td>
                                            <td>
                                                @if ($query->transaction_status === "PENDING")
                                                    <span class="badge badge-info">
                                                @elseif($query->transaction_status == "SUCCESS")
                                                    <span class="badge badge-success">
                                                @elseif($query->transaction_status === "FAILED")
                                                    <span class="badge badge-danger">
                                                @else
                                                    <span></span>
                                                @endif
                                                {{ $query->transaction_status }}
                                                </span>
                                            </td>
                                            <td>
                                                @if ($query->transaction_status == "PENDING")
                                                    <a href="{{ route('transactions.status', $query->id) }}?status=SUCCESS"
                                                        class="btn btn-success btn-sm">
                                                        <i class="fa fa-check"></i>
                                                    </a>
                                                    <a href="{{ route('transactions.status', $query->id) }}?status=FAILED"
                                                        class="btn btn-warning btn-sm">
                                                        <i class="fa fa-times"></i>
                                                    </a>
                                                @endif
                                                <a
                                                href="#mymodal"
                                                data-remote="{{ route('transactions.show', $query->id) }}"
                                                data-toggle="modal"
                                                data-target="#mymodal"
                                                data-title="Detail Transaksi {{ $query->tfid }}"
                                                class="btn btn-primary btn-sm">
                                                    <i class="fa fa-eye"></i>
                                                </a>
                                                {{--<a href="{{ route('transactions.show', $query->id) }}" class="btn btn-primary btn-sm">--}}
                                                {{--<a href="{{ route('transactions.edit', $query->id) }}" class="btn btn-primary btn-sm">
                                                    <i class="fa fa-pencil"></i>
                                                </a>--}}
                                                <form action="{{ route('transactions.destroy', $query->id) }}" method="post" class="d-inline">
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
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
