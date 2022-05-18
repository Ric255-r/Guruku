@extends('includes.amentor.app')

@section('content')

<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid">
            <h1 class="mt-4">Materi</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item active">Tambah Materi</li>
            </ol>
            <div class="row">
                <div class="col-lg-12">
                    @if(count($errors) > 0)
                        <div class="alert alert-danger">
                            @foreach ($errors->all() as $error)
                            {{ $error }} <br/>
                            @endforeach
                        </div>
                    @endif
                    @if (session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif
                    <form action="{{ route('amentor.video.store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="kelas" class="form-control-label">Nama Kelas</label>
                            <select name="products_id" class="form-control">
                                <option value="">-- Pilih Kelas --</option>
                                @foreach ($kelas as $query)
                                    <option value="{{ $query->kelas }}">{{ $query->kelas }}</option>
                                @endforeach
                            </select>
                        </div>
                        {{--@error('products_id') <div class="text-muted">{{ $message }}</div> @enderror--}}

                        <div class="form-group">
                            <label for="judul" class="form-control-label">Judul Materi</label>
                            <input type="text" name="judul" id="judul" value="{{ old('judul') }}"
                            class="form-control"/>
                        </div>
                        {{--@error('judul') <div class="text-muted">{{ $message }}</div> @enderror--}}

                        <div class="form-group">
                            <button class="btn btn-primary btn-block" type="submit">
                                Tambah Data
                            </button>
                        </div>
                    </form>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12 text-right">
                    <a href="{{ route('amentor.video.index') }}" class="pb-3" target="_blank">Lihat Selengkapnya</a>
                </div>
            </div>
            <div class="row">
                <div class="table table-responsive-sm">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Nama Kelas</th>
                                <th>Judul Materi</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($video as $query)
                                @if ($query->bayar->mentor_id == Auth::user()->kode_mentor)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $query->bayar->kelas }}</td>
                                        <td>{{ $query->judul }}</td>
                                        <td>
                                            <a href="{{ route('amentor.video.edit',$query->id) }}"
                                                data-toggle="tooltip"
                                                title="Edit">
                                                <button class="btn btn-warning btn-sm"><i class="fas fa-edit" style="color:white;"></i></button>
                                            </a>
                                            <form action="{{ route('amentor.video.destroy-create', $query->id) }}" method="post" class="d-inline">
                                                @csrf
                                                @method('delete')
                                                <button class="btn btn-danger btn-sm mt-2 mt-sm-2 mt-md-0 mt-lg-0 mt-xl-0"
                                                data-toggle="tooltip"
                                                title="Delete">
                                                    <i class="fas fa-trash"></i>
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @endif
                            @endforeach
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

    {{--<div class="card">
        <div class="card-header">
            <strong>Tambah Video</strong>
        </div>
        <div class="card-body card-block">
            <form action="{{ route('amentor.video.store') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="kelas" class="form-control-label">Nama Kelas</label>
                    <select name="products_id" class="form-control @error('products_id') is-invalid @enderror">
                        @foreach ($kelas as $query)
                            <option value="{{ $query->kelas }}">{{ $query->kelas }}</option>
                        @endforeach
                    </select>
                </div>
                @error('products_id') <div class="text-muted">{{ $message }}</div> @enderror

                <div class="form-group">
                    <label for="judul" class="form-control-label">Judul</label>
                    <input type="text" name="judul" id="judul" value="{{ old('judul') }}"
                    class="form-control @error('judul') is-invalid @enderror"/>
                </div>
                @error('judul') <div class="text-muted">{{ $message }}</div> @enderror

                <div class="form-group">
                    <button class="btn btn-primary btn-block" type="submit">
                        Tambah Data
                    </button>
                </div>
            </form>
        </div>
    </div>--}}
@endsection

