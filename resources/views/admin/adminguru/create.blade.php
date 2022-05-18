@extends('layouts.default')

@section('content')
    <div class="card">
        <div class="card-header">
            <strong>Tambah Guru</strong>
        </div>
        <div class="card-body card-block">
            @if(count($errors) > 0)
                <div class="alert alert-danger">
            @foreach ($errors->all() as $error)
                {{ $error }} <br/>
            @endforeach
                </div>
            @endif
            <form action="{{ route('adminguru.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                {{-- <div style="display:none"> --}}
                    <div class="form-group">
                        <label for="file" class="form-control-label">File</label>
                        <input type="file" name="file" class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="keterangan" class="form-control-label">Pelajaran</label>
                        <input type="text" class="form-control" name="keterangan">
                    </div>

                    <div class="form-group">
                        <label for="kategori" class="form-control-label">Kategori</label>
                        <select name="kategori" id="kategori" class="custom-select">
                            <option value="Pemula">Pemula</option>
                            <option value="Lanjutan">Lanjutan</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="namamentor" class="form-control-label">Nama Mentor</label>
                        <input type="text" class="form-control" name="namamentor">
                    </div>

                    <div class="form-group">
                        <label for="hari" class="form-control-label">Hari</label>
                        <input type="text" class="form-control" name="hari">
                    </div>

                    <div class="form-group">
                        <label for="jam" class="form-control-label">Jam</label>
                        <input type="text" class="form-control" name="jam">
                    </div>

                    <div class="form-group">
                        <label for="deskripsi" class="form-control-label">Deskripsi</label>
                        <textarea name="deskripsi" id="deskripsi" class="form-control"></textarea>
                    </div>
                {{-- </div> --}}

                <input type="submit" value="Upload" class="btn btn-primary">
            </form>
        </div>
    </div>
@endsection
