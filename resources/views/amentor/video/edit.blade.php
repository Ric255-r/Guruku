@extends('includes.amentor.app')

@section('content')

    <div id="layoutSidenav_content">
        <main>
            <div class="container-fluid">
                <h1 class="mt-4">Materi</h1>
                <ol class="breadcrumb mb-4">
                    <li class="breadcrumb-item active">Edit Materi</li>
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
                        <form action="{{ route('amentor.video.update',$video->id) }}" method="post">
                            @method('patch')
                            @csrf
                            <div class="form-group">
                                <label for="judul" class="form-control-label">Judul Materi</label>
                                <input type="text" name="judul" class="form-control" value="{{ $video->judul }}">
                            </div>
                            <button class="form-control btn btn-primary">Update Data</button>
                        </form>
                    </div>
                </div>
            </div>
        </main>
        <footer class="py-4 bg-light mt-auto">
            <div class="container-fluid">
                <div class="d-flex align-items-center justify-content-between small">
                    <div class="text-muted">Copyright &copy; Your Website 2020</div>
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
            <strong>Edit Video Dengan Judul '<small>{{ $video->judul }}</small>'</strong>
        </div>
        <div class="card-block card-body">
            <form action="{{ route('amentor.video.update',$video->id) }}" method="post">
                @method('patch')
                @csrf
                <div class="form-group">
                    <label for="judul" class="form-control-label">Judul</label>
                    <input type="text" name="judul" class="form-control">
                </div>
                <button class="form-control btn btn-primary">Update Data</button>
            </form>
        </div>
    </div>--}}
@endsection
