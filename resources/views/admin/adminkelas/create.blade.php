@extends('layouts.default')

@section('content')
    <div class="card">
        <div class="card-header">
            <strong>Tambah Kelas</strong>
        </div>
        <div class="card-body card-block">
            <form action="{{ route('adminkelas.store') }}" method="post" enctype="multipart/form-data">
                @csrf
                    <div class="form-group">
                        <label for="file" class="form-control-label">File</label>
                        <input type="file" name="file" id="file" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="pelajaran" class="form-control-label">Pelajaran</label>
                        <input type="text" name="pelajaran" id="pelajaran" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="deskripsi" class="form-control-label">Deskripsi</label>
                        <textarea name="deskripsi" id="deskripsi" class="form-control"></textarea>
                    </div>
                <input type="submit" class="btn btn-primary" value="Submit">
            </form>
        </div>
    </div>
@endsection
