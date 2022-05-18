@extends('layouts.default')

@section('content')
    <div class="orders">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="box-title">
                            Daftar Mentor dan User
                            {{--@if ($itung > 0)
                                {{ $itung }}
                            @else

                            @endif--}}
                        </h4>
                        <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                            <li class="nav-item">
                              <a class="nav-link active text-center btn btn-outline-info" style="width:120px;" id="pills-mentor-tab" data-toggle="pill" href="#pills-mentor" role="tab" aria-controls="pills-mentor" aria-selected="true">Mentor</a>
                            </li>
                            <li class="nav-item">
                              <a class="nav-link text-center mx-3 btn btn-outline-info" style="width:120px;" id="pills-user-tab" data-toggle="pill" href="#pills-user" role="tab" aria-controls="pills-user" aria-selected="false">User</a>
                            </li>
                          </ul>
                    </div>

                    <div class="card-body">
                        <div class="tab-content" id="pills-tabContent">
                            <div class="tab-pane fade show active" id="pills-mentor" role="tabpanel" aria-labelledby="pills-mentor-tab">
                                {{--<div class="card">
                                    <div class="card-body">
                                        <h3 class="box-title">Cari Mentor</h3>
                                        <form action="{{ route('mentor.cari') }}" method="get" enctype="multipart/form-data">
                                            <input type="text" name="carimentor" id="carimentor" value="{{ old('carimentor') }}" placeholder="Mentor..." class="form-control">
                                        </form>
                                    </div>
                                </div>--}}
                                <div class="table-stats">
                                    {{--@if ($mentor->isEmpty())
                                        <div class="card">
                                            <div class="card-body">
                                                <h4 class="alert alert-danger">Mentor Not Found</h4>
                                            </div>
                                        </div>
                                    @else--}}
                                        @if(session('success'))
                                            <div class="alert alert-success">
                                                {{ session('success') }}
                                            </div>
                                        @endif
                                        <table class="table table-hover table-responsive-sm dataTable">
                                            <thead>
                                                <tr>
                                                    <th>KodeMentor</th>
                                                    <th>Gambar</th>
                                                    <th>Nama</th>
                                                    <th>Email</th>
                                                    <th>Bidang</th>
                                                    <th>Status</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($mentor as $query)
                                                    <tr>
                                                        @if ($query->kode_mentor == null)
                                                            <td>
                                                                <a href="{{ route('mentor.edit',$query->id) }}" class="btn btn-primary btn-sm">
                                                                    <i class="fa fa-plus"></i>
                                                                </a>
                                                            </td>
                                                        @else
                                                            <td>{{ $query->kode_mentor }}</td>
                                                        @endif
                                                        @if ($query->file == null)
                                                            <td>-</td>
                                                            @else
                                                            <td><img src="{{ asset('/storage/'.$query->file) }}"></td>
                                                        @endif
                                                        <td>{{ $query->name }}</td>
                                                        @if ($query->email == null)
                                                            <td>-</td>
                                                            @else
                                                            <td>{{ $query->email }}</td>
                                                        @endif
                                                        @if ($query->bidang == null)
                                                            <td>-</td>
                                                            @else
                                                            <td>{{ $query->bidang }}</td>
                                                        @endif
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
                                                                <a href="{{ route('mentor.status', $query->id) }}?status=SUCCESS"
                                                                    class="btn btn-success btn-sm">
                                                                    <i class="fa fa-check"></i>
                                                                </a>
                                                                <a href="{{ route('mentor.status', $query->id) }}?status=FAILED"
                                                                    class="btn btn-warning btn-sm">
                                                                    <i class="fa fa-times"></i>
                                                                </a>
                                                                @elseif($query->status == 'SUCCESS')
                                                                <a href="{{ route('mentor.status', $query->id) }}?status=PENDING"
                                                                    class="btn btn-info btn-sm">
                                                                    <i class="fa fa-spinner"></i>
                                                                </a>
                                                                <a href="{{ route('mentor.status', $query->id) }}?status=FAILED"
                                                                    class="btn btn-warning btn-sm">
                                                                    <i class="fa fa-times"></i>
                                                                </a>
                                                                @else
                                                                <a href="{{ route('mentor.status', $query->id) }}?status=SUCCESS"
                                                                    class="btn btn-success btn-sm">
                                                                    <i class="fa fa-check"></i>
                                                                </a>
                                                                <a href="{{ route('mentor.status', $query->id) }}?status=PENDING"
                                                                    class="btn btn-info btn-sm">
                                                                    <i class="fa fa-spinner"></i>
                                                                </a>
                                                            @endif
                                                            @if ($query->kode_mentor != null)
                                                                <a href="{{ route('mentor.edit',$query->id) }}" class="btn btn-primary btn-sm">
                                                                    <i class="fa fa-pencil"></i>
                                                                </a>
                                                            @else
                                                                <a href="{{ route('mentor.edit',$query->id) }}" class="btn btn-primary btn-sm">
                                                                    <i class="fa fa-plus"></i>
                                                                </a>
                                                            @endif
                                                            <a href="{{ route('mentor.show',$query->id) }}" class="btn btn-info btn-sm">
                                                                <i class="fa fa-eye"></i>
                                                            </a>
                                                            <form action="{{ route('mentor.destroy',$query->id) }}" method="post" enctype="multipart/form-data" class="d-inline">
                                                                @csrf
                                                                @method('delete')
                                                                <button class="btn btn-danger btn-sm">
                                                                    <i class="fa fa-trash"></i>
                                                                </button>
                                                            </form>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    {{--@endif--}}
                                </div>
                            </div>
                            <div class="tab-pane fade" id="pills-user" role="tabpanel" aria-labelledby="pills-user-tab">
                                {{--<div class="card">
                                    <div class="card-body">
                                        <h3 class="box-title">Cari User</h3>
                                        <form action="{{ route('mentor.user.cari') }}" method="get" enctype="multipart/form-data">
                                            <input type="text" name="cariuser" id="cariuser" value="{{ old('cariuser') }}" placeholder="User..." class="form-control">
                                        </form>
                                    </div>
                                </div>--}}
                                {{--@if ($user->isEmpty())
                                    <div class="card">
                                        <div class="card-body">
                                            <h4 class="alert alert-danger">User Not Found</h4>
                                        </div>
                                    </div>
                                @else--}}
                                    <div class="table-stats ov-h">
                                        @if(session('success'))
                                            <div class="alert alert-success">
                                                {{ session('success') }}
                                            </div>
                                        @endif
                                        <table class="table table-responsive-sm table-hover" id="dataTable">
                                            <thead>
                                                <tr>
                                                    <th>Gambar</th>
                                                    <th>Nama</th>
                                                    <th>Email</th>
                                                    <th>Bidang</th>
                                                    <th>Deskripsi</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($user as $query)
                                                    <tr>
                                                        @if ($query->file == null)
                                                            <td>-</td>
                                                            @else
                                                            <td><img src="{{ asset('/storage/'.$query->file) }}"></td>
                                                        @endif
                                                        <td>{{ $query->name }}</td>
                                                        <td>{{ $query->email }}</td>
                                                        @if ($query->bidang == null)
                                                            <td>-</td>
                                                            @else
                                                            <td>{{ $query->bidang }}</td>
                                                        @endif
                                                        @if ($query->deskripsi == null)
                                                            <td>-</td>
                                                            @else
                                                            <td>{{ $query->deskripsi }}</td>
                                                        @endif
                                                        <td>
                                                            {{--@if ($query->status == "PENDING")
                                                                <a href="{{ route('mentor.status', $query->id) }}?status=SUCCESS"
                                                                    class="btn btn-success btn-sm">
                                                                    <i class="fa fa-check"></i>
                                                                </a>
                                                                <a href="{{ route('mentor.status', $query->id) }}?status=FAILED"
                                                                    class="btn btn-warning btn-sm">
                                                                    <i class="fa fa-times"></i>
                                                                </a>
                                                                @elseif($query->status == 'SUCCESS')
                                                                <a href="{{ route('mentor.status', $query->id) }}?status=PENDING"
                                                                    class="btn btn-info btn-sm">
                                                                    <i class="fa fa-spinner"></i>
                                                                </a>
                                                                <a href="{{ route('mentor.status', $query->id) }}?status=FAILED"
                                                                    class="btn btn-warning btn-sm">
                                                                    <i class="fa fa-times"></i>
                                                                </a>
                                                                @else
                                                                <a href="{{ route('mentor.status', $query->id) }}?status=SUCCESS"
                                                                    class="btn btn-success btn-sm">
                                                                    <i class="fa fa-check"></i>
                                                                </a>
                                                                <a href="{{ route('mentor.status', $query->id) }}?status=PENDING"
                                                                    class="btn btn-info btn-sm">
                                                                    <i class="fa fa-spinner"></i>
                                                                </a>
                                                            @endif--}}
                                                            <a href="{{ route('mentor.show',$query->id) }}" class="btn btn-info btn-sm">
                                                                <i class="fa fa-eye"></i>
                                                            </a>
                                                            <form action="{{ route('mentor.destroy',$query->id) }}" method="post" enctype="multipart/form-data" class="d-inline">
                                                                @csrf
                                                                @method('delete')
                                                                <button class="btn btn-danger btn-sm">
                                                                    <i class="fa fa-trash"></i>
                                                                </button>
                                                            </form>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                {{--@endif--}}
                            </div>
                        </div>

                        {{--<div class="table-stats order-table ov-h">
                            @if(session('success'))
                                <div class="alert alert-success">
                                    {{ session('success') }}
                                </div>
                            @endif
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Gambar</th>
                                        <th>Nama</th>
                                        <th>Bidang</th>
                                        <th>Deskripsi</th>
                                        <th>Status</th>
                                        <th colspan="3">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($mentor as $query)
                                        <tr>
                                            @if ($query->file == null)
                                                <td>-</td>
                                                @else
                                                <td><img src="{{ asset('/storage/'.$query->file) }}"></td>
                                            @endif
                                            <td>{{ $query->name }}</td>
                                            @if ($query->bidang == null)
                                                <td>-</td>
                                                @else
                                                <td>{{ $query->bidang }}</td>
                                            @endif
                                            @if ($query->deskripsi == null)
                                                <td>-</td>
                                                @else
                                                <td>{{ $query->deskripsi }}</td>
                                            @endif
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
                                                    <a href="{{ route('mentor.status', $query->id) }}?status=SUCCESS"
                                                        class="btn btn-success btn-sm">
                                                        <i class="fa fa-check"></i>
                                                    </a>
                                                    <a href="{{ route('mentor.status', $query->id) }}?status=FAILED"
                                                        class="btn btn-warning btn-sm">
                                                        <i class="fa fa-times"></i>
                                                    </a>
                                                    @elseif($query->status == 'SUCCESS')
                                                    <a href="{{ route('mentor.status', $query->id) }}?status=PENDING"
                                                        class="btn btn-info btn-sm">
                                                        <i class="fa fa-spinner"></i>
                                                    </a>
                                                    <a href="{{ route('mentor.status', $query->id) }}?status=FAILED"
                                                        class="btn btn-warning btn-sm">
                                                        <i class="fa fa-times"></i>
                                                    </a>
                                                    @else
                                                    <a href="{{ route('mentor.status', $query->id) }}?status=SUCCESS"
                                                        class="btn btn-success btn-sm">
                                                        <i class="fa fa-check"></i>
                                                    </a>
                                                    <a href="{{ route('mentor.status', $query->id) }}?status=PENDING"
                                                        class="btn btn-info btn-sm">
                                                        <i class="fa fa-spinner"></i>
                                                    </a>
                                                @endif
                                                <a href="{{ route('mentor.show',$query->id) }}" class="btn btn-info btn-sm">
                                                    <i class="fa fa-eye"></i>
                                                </a>
                                                <form action="{{ route('mentor.destroy',$query->id) }}" method="post" enctype="multipart/form-data" class="d-inline">
                                                    @csrf
                                                    @method('delete')
                                                    <button class="btn btn-danger btn-sm">
                                                        <i class="fa fa-trash"></i>
                                                    </button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>--}}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
