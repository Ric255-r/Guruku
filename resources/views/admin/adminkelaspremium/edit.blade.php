@extends('layouts.default')

@section('content')

    <div class="card">
        <div class="card-header">
            <strong>Edit Kelas Premium</strong>
        </div>
        <div class="card-body card-block">
            @if(count($errors) > 0)
				<div class="alert alert-danger">
					@foreach ($errors->all() as $error)
					{{ $error }} <br/>
					@endforeach
				</div>
			@endif
            <form action="{{ route('adminkelaspremium.ubah', $premium->id) }}"
                method="POST" enctype="multipart/form-data">
                @csrf
                @method('patch')
                <div class="form-group">
                    <label for="file" class="form-control-label">File</label>
                    <input type="file" name="file" id="file" class="form-control">
                </div>
                <div class="form-group">
                    <label for="pelajaran" class="form-control-label">pelajaran</label>
                    <input type="text" name="pelajaran" id="pelajaran" class="form-control" value="{{$premium->pelajaran}}">
                </div>
                <div class="form-group">
                    <label for="harga" class="form-control-label">Harga</label>
                    <input type="text" name="harga" id="harga" class="form-control" value="{{ $premium->harga }}">
                </div>
                <div class="form-group">
                    <label for="deskripsi" class="form-control-label"></label>
                    <textarea name="deskripsi" id="deskripsi" class="form-control">{{$premium->deskripsi}}</textarea>
                </div>
                <button type="submit" class="btn btn-primary">Ubah Data</button>
            </form>
        </div>
    </div>
@endsection
