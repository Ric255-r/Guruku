@extends('includes.amentor.app')

@section('content')
    <div id="layoutSidenav_content">
        <main>
            <div class="container-fluid">
                <h1 class="mt-4">Kelas</h1>
                <ol class="breadcrumb mb-4">
                    <li class="breadcrumb-item active">Daftar Kelas</li>
                </ol>
                <div class="row justify-content-center">
                    <div class="col-xl-3 col-md-12">
                        <div class="card bg-primary text-white mb-4">
                            <div class="card-body"
                            data-toggle="tooltip"
                            title="Total Kelas">
                                <i class="fas fa-plus" style="font-size:20px;"></i>
                                Total Kelas
                            </div>
                            <div class="card-footer d-flex align-items-center justify-content-between"
                                data-toggle="tooltip"
                                title="{{ $total }} Total Kelas">
                                <p class="small text-white">
                                    {{ $total }}
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-md-6">
                        <div class="card bg-success text-white mb-4">
                            <div class="card-body"
                            data-toggle="tooltip"
                            title="Kelas Publish">
                                <i class="fas fa-check" style="font-size:20px;"></i>
                                Kelas Publish
                            </div>
                            <div class="card-footer d-flex align-items-center justify-content-between"
                                data-toggle="tooltip"
                                title="{{ $publish }} Kelas Publish">
                                <p class="small text-white">
                                    {{ $publish }}
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-md-6">
                        <div class="card bg-info text-white mb-4">
                            <div class="card-body"
                            data-toggle="tooltip"
                            title="Kelas Pending">
                                <i class="fas fa-spinner" style="font-size:20px;"></i>
                                Kelas Pending
                            </div>
                            <div class="card-footer d-flex align-items-center justify-content-between"
                                data-toggle="tooltip"
                                title="{{ $pending }} Kelas Pending">
                                    <p class="small text-white">{{ $pending }}</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row justify-content-center">
                    {{--<div class="col-xl-3 col-md-6">
                        <div class="card bg-success text-white mb-4">
                            <div class="card-body"
                            data-toggle="tooltip"
                            title="Kelas Publish">
                                <i class="fas fa-check" style="font-size:20px;"></i>
                                Kelas Publish
                            </div>
                            <div class="card-footer d-flex align-items-center justify-content-between"
                                data-toggle="tooltip"
                                title="{{ $publish }} Kelas Publish">
                                <p class="small text-white">
                                    {{ $publish }}
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-md-6">
                        <div class="card bg-info text-white mb-4">
                            <div class="card-body"
                            data-toggle="tooltip"
                            title="Kelas Pending">
                                <i class="fas fa-spinner" style="font-size:20px;"></i>
                                Kelas Pending
                            </div>
                            <div class="card-footer d-flex align-items-center justify-content-between"
                                data-toggle="tooltip"
                                title="{{ $pending }} Kelas Pending">
                                    <p class="small text-white">{{ $pending }}</p>
                            </div>
                        </div>
                    </div>--}}
                    <div class="col-xl-3 col-md-6">
                        <div class="card bg-secondary text-white mb-4">
                            <div class="card-body"
                            data-toggle="tooltip"
                            title="Kelas Request">
                                <i class="fas fa-question" style="font-size:20px;"></i>
                                Kelas Request
                            </div>
                            <div class="card-footer d-flex align-items-center justify-content-between"
                            data-toggle="tooltip"
                            title="{{ $request }} Kelas Request">
                                <p class="small text-white">{{ $request }}</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-md-6">
                        <div class="card bg-danger text-white mb-4">
                            <div class="card-body"
                            data-toggle="tooltip"
                            title="Kelas Failed">
                                <i class="fas fa-times" style="font-size:20px;"></i>
                                Kelas Failed
                            </div>
                            <div class="card-footer d-flex align-items-center justify-content-between"
                            data-toggle="tooltip"
                            title="{{ $failed }} Kelas Failed">
                                <p class="small text-white">{{ $failed }}</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <a class="btn btn-info float-right mb-3" href="{{ url('/contact-us') }}">Request Kelas</a>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        @if(session('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                        @endif
                        <table class="table table-bordered table-responsive-sm" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>File</th>
                                    <th>Kelas</th>
                                    <th>Deskripsi</th>
                                    <th>Jumlah Murid</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($kelas as $query)

                                    {{--@if ($query->status == 'REQUEST')
                                        <tr>
                                            <td><img src="{{asset('/storage/'.$query->file)}}" alt="gam" width="150px"></td>
                                            <td>{{$query->kelas}}</td>
                                            <td>{!! $query->deskripsi !!}</td>
                                            <td>{{ $query->murid }}</td>
                                            <td>
                                                <span class="badge badge-secondary">{{ $query->status }}</span>
                                            </td>
                                            <td class="text-center">
                                                <a
                                                    href="#mymodal2"
                                                    data-remote="{{ route('amentor.kelas.show', $query->id) }}"
                                                    data-toggle="modal"
                                                    data-target="#mymodal2"
                                                    data-title="Detail Kelas {{ $query->kelas }}"
                                                    class="btn btn-primary btn-sm mb-sm-2 mt-lg-2 mt-2 mt-xl-0"
                                                    title="View more">
                                                    <i class="fas fa-eye"></i>
                                                </a>
                                            </td>
                                        </tr>
                                    @endif--}}

                                    {{--@if ($query->status == 'PENDING' OR $query->status == 'PUBLISH')--}}
                                        <tr>
                                            <td><img src="{{asset('/storage/'.$query->file)}}" alt="gam" width="150px"></td>
                                            <td>{{$query->kelas}}</td>
                                            <td>{!! $query->deskripsi !!}</td>
                                            <td>{{ $query->murid }}</td>
                                            <td>
                                                @if ($query->status == 'PENDING')
                                                    <span class="badge badge-info">{{ $query->status }}</span>
                                                @elseif($query->status == 'PUBLISH')
                                                    <span class="badge badge-success">{{ $query->status }}</span>
                                                @elseif($query->status == 'REQUEST')
                                                    <span class="badge badge-secondary">{{ $query->status }}</span>
                                                @else
                                                    <span class="badge badge-danger">{{ $query->status }}</span>
                                                @endif
                                            </td>
                                            <td class="text-center">
                                                @if ($query->status == 'PENDING')
                                                    <a href="{{ route('amentor.kelas.status', $query->id) }}?status=PUBLISH" class="btn btn-success btn-sm mb-sm-2"
                                                        data-toggle="tooltip"
                                                        title="Publish">
                                                        <i class="fa fa-check"></i>
                                                    </a>
                                                    <a
                                                    href="#mymodal2"
                                                    data-remote="{{ route('amentor.kelas.show', $query->id) }}"
                                                    data-toggle="modal"
                                                    data-target="#mymodal2"
                                                    data-title="Detail Kelas {{ $query->kelas }}"
                                                    class="btn btn-primary btn-sm mb-sm-2 mt-lg-2 mt-2 mt-xl-0"
                                                    title="View more">
                                                        <i class="fas fa-eye"></i>
                                                    </a>
                                                    <a href="{{ route('amentor.kelas.gallery', $query->slug) }}" class="btn btn-info btn-sm mb-sm-2 mb-md-2 mt-lg-2 mt-2 mt-xl-0"
                                                        data-toggle="tooltip"
                                                        title="View video">
                                                        <i class="fas fa-video"></i>
                                                    </a>
                                                    <a href="{{ route('amentor.kelas.edit', $query->id) }}" class="btn btn-warning btn-sm mb-sm-2 mb-md-2 mt-lg-2 mt-xl-0 mt-2"
                                                        data-toggle="tooltip"
                                                        title="Edit">
                                                        <i class="fas fa-edit" style="color:#ffff;"></i>
                                                    </a>
                                                @elseif($query->status == 'PUBLISH')
                                                    <a href="{{ route('amentor.kelas.status', $query->id) }}?status=PENDING" class="btn btn-info btn-sm mb-sm-2"
                                                        data-toggle="tooltip"
                                                        title="Pending">
                                                        <i class="fa fa-spinner"></i>
                                                    </a>
                                                    <a
                                                    href="#mymodal2"
                                                    data-remote="{{ route('amentor.kelas.show', $query->id) }}"
                                                    data-toggle="modal"
                                                    data-target="#mymodal2"
                                                    data-title="Detail Kelas {{ $query->kelas }}"
                                                    class="btn btn-primary btn-sm mb-sm-2 mt-lg-2 mt-2 mt-xl-0"
                                                    title="View more">
                                                        <i class="fas fa-eye"></i>
                                                    </a>
                                                    <a href="{{ route('amentor.kelas.gallery', $query->slug) }}" class="btn btn-info btn-sm mb-sm-2 mb-md-2 mt-lg-2 mt-2 mt-xl-0"
                                                        data-toggle="tooltip"
                                                        title="View video">
                                                        <i class="fas fa-video"></i>
                                                    </a>
                                                    <a href="{{ route('amentor.kelas.edit', $query->id) }}" class="btn btn-warning btn-sm mb-sm-2 mb-md-2 mt-lg-2 mt-xl-0 mt-2"
                                                        data-toggle="tooltip"
                                                        title="Edit">
                                                        <i class="fas fa-edit" style="color:#ffff;"></i>
                                                    </a>
                                                @elseif($query->status == 'REQUEST')
                                                    <a
                                                    href="#mymodal2"
                                                    data-remote="{{ route('amentor.kelas.show', $query->id) }}"
                                                    data-toggle="modal"
                                                    data-target="#mymodal2"
                                                    data-title="Detail Kelas {{ $query->kelas }}"
                                                    class="btn btn-primary btn-sm mb-sm-2 mt-lg-2 mt-2 mt-xl-0"
                                                    title="View more">
                                                        <i class="fas fa-eye"></i>
                                                    </a>
                                                @else
                                                    <a
                                                    href="#mymodal2"
                                                    data-remote="{{ route('amentor.kelas.show', $query->id) }}"
                                                    data-toggle="modal"
                                                    data-target="#mymodal2"
                                                    data-title="Detail Kelas {{ $query->kelas }}"
                                                    class="btn btn-primary btn-sm mb-sm-2 mt-lg-2 mt-2 mt-xl-0"
                                                    title="View more">
                                                        <i class="fas fa-eye"></i>
                                                    </a>
                                                @endif
                                            </td>
                                        </tr>
                                    {{--@endif--}}
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
        </main>
        <footer class="py-4 bg-light mt-auto">
            <div class="container-fluid">
                <div class="d-flex align-items-center justify-content-between small">
                    <div class="text-muted">Copyright &copy; Guruku 2020</div>
                    <div>
                        <a href="#">Privacy Policy</a>
                        &middot;
                        <a href="#">Terms &amp; Conditions</a>
                    </div>
                </div>
            </div>
        </footer>
    </div>

    {{--<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>--}}
    {{--<div class="orders">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="box-title">Daftar Kelas Anda</h4>
                    </div>
                    <div class="card-body--">
                        <div class="table-stats order-table ov-h">
                            @if(session('success'))
                                <div class="alert alert-success">
                                    {{ session('success') }}
                                </div>
                            @endif
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>File</th>
                                        <th>Kelas</th>
                                        <th>Deskripsi</th>
                                        <th>Jumlah Murid</th>
                                        <th colspan="2">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($kelas as $query)
                                        <tr>
                                            <td class="align-middle"><img src="{{asset('/storage/'.$query->file)}}" alt="gam" width="150px"></td>
                                            <td class="align-middle">{{$query->kelas}}</td>
                                            <td class="align-middle">{!! $query->deskripsi !!}</td>
                                            <td class="align-middle">{{ $query->murid }}</td>
                                            <td class="align-middle">
                                                <a
                                                href="#mymodal2"
                                                data-remote="{{ route('amentor.kelas.show', $query->id) }}"
                                                data-toggle="modal"
                                                data-target="#mymodal2"
                                                data-title="Detail Kelas {{ $query->kelas }}"
                                                class="btn btn-primary">
                                                    <i class="fa fa-eye"></i>
                                                </a>
                                                <a href="{{ route('amentor.kelas.gallery', $query->slug) }}" class="btn btn-info">
                                                    <i class="fa fa-video-camera"></i>
                                                </a>
                                                <a href="{{ route('amentor.kelas.edit', $query->id) }}" class="btn btn-warning">
                                                    <i class="fa fa-pencil"></i>
                                                </a>
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
    </div>--}}
@endsection
