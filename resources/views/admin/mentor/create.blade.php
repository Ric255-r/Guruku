@extends('layouts.default')

@section('content')
    <div class="card">
        <div class="card-header">
            <strong>Tambah Mentor</strong>
        </div>
        <div class="card-body card-block">
            @if(count($errors) > 0)
                <div class="alert alert-danger">
                    @foreach ($errors->all() as $error)
                    {{ $error }} <br/>
                    @endforeach
                </div>
            @endif
            <form action="{{ route('mentor.store') }}" method="post" enctype="multipart/form-data">
                @csrf
                    <div class="form-group">
                        <label for="file" class="form-control-label">Gambar</label>
                        <input type="file" name="file" id="file" class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="nama" class="form-control-label">Nama</label>
                        <input type="text" name="nama" id="nama" class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="bidang" class="form-control-label">Bidang</label>
                        <input type="text" name="bidang" id="bidang" class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="deskripsi" class="form-control-label">Deskripsi</label>
                        <textarea name="deskripsi" id="deskripsi" class="form-control"></textarea>
                    </div>
                <input type="submit" class="btn btn-primary form-control" value="Submit">
            </form>
        </div>
    </div>
@endsection
