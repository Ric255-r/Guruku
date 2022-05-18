@extends('layouts.default')

@section('content')

    <div class="card">
        <div class="card-header">
            <strong>Edit Kelas Gratis</strong>
        </div>
        <div class="card-block card-body">
            @if(count($errors) > 0)
				<div class="alert alert-danger">
					@foreach ($errors->all() as $error)
					{{ $error }} <br/>
					@endforeach
				</div>
			@endif
            <form action="{{ route('adminkelas.ubah', $adminkelas->id) }}"
                method="POST" enctype="multipart/form-data">
                @method('patch')
                @csrf
                <div class="form-group">
                    <label for="file" class="form-control-label">File</label>
                    <input type="file" name="file" class="form-control">
                </div>
                <div class="form-group">
                    <label for="pelajaran" class="form-control-label">Pelajaran</label>
                    <input type="text" name="pelajaran" class="form-control" value="{{$adminkelas->pelajaran}}">
                </div>
                <div class="form-group">
                    <label for="deskripsi" class="form-control-label">Deskripsi</label>
                    <textarea name="deskripsi" class="form-control">{{$adminkelas->deskripsi}}</textarea>
                </div>
                <button type="submit" class="btn btn-primary">Ubah Data</button>
            </form>
        </div>
    </div>
@endsection
