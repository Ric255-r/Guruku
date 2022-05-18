@extends('layouts.default')

@section('content')
    <div class="card">
        <div class="card-header">
            <strong>Edit Video Dengan Judul '<small>{{ $video->judul }}</small>'</strong>
        </div>
        <div class="card-block card-body">
            <form action="{{ route('video.update',$video->id) }}" method="post">
                @method('put')
                @csrf
                <div class="form-group">
                    <label for="judul" class="form-control-label">Judul</label>
                    <input type="text" name="judul" class="form-control">
                </div>
                <button class="form-control btn btn-primary">Update Data</button>
            </form>
        </div>
    </div>
@endsection
