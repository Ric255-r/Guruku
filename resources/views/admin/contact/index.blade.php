@extends('layouts.default')

@section('content')
    <div class="orders">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="box-title">Daftar Pesan</h4>
                    </div>
                    <div class="card-body">
                        <div class="table-stats ov-h">
                            {{--@if(session('success'))
                                <div class="alert alert-success">
                                    {{ session('success') }}
                                </div>
                            @endif--}}
                            <table class="table table-hover table-responsive-sm dataTable">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Nama</th>
                                        <th>Email</th>
                                        <th>Pesan</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($contact as $query)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $query->nama }}</td>
                                            <td>{{ $query->email }}</td>
                                            <td>{{ $query->pesan }}</td>
                                            <td>
                                                @if ($query->status === "PENDING")
                                                    <span class="badge badge-info">
                                                @elseif($query->status == "SUCCESS")
                                                    <span class="badge badge-success">
                                                @elseif($query->status === "FAILED")
                                                    <span class="badge badge-danger">
                                                @else
                                                    <span></span>
                                                @endif
                                                {{ $query->status }}
                                                </span>
                                            </td>
                                            <td>
                                                @if ($query->status == "PENDING")
                                                    <a href="{{ route('admin.contact.status', $query->id) }}?status=SUCCESS"
                                                        class="btn btn-success btn-sm">
                                                        <i class="fa fa-check"></i>
                                                    </a>
                                                @else
                                                    <a href="{{ route('admin.contact.status', $query->id) }}?status=PENDING"
                                                        class="btn btn-info btn-sm">
                                                        <i class="fa fa-spinner"></i>
                                                    </a>
                                                @endif
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
@endsection
