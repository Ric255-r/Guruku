@extends('layouts.default')

@section('content')
<div class="card">
    <div class="card-header">
        <strong>Ubah Guru</strong>
    </div>
    <div class="card-body card-block">
        @if(count($errors) > 0)
				<div class="alert alert-danger">
					@foreach ($errors->all() as $error)
					{{ $error }} <br/>
					@endforeach
				</div>
			@endif
            <form action="{{ route('adminguru.ubah', $gambaradminguru->id) }}"  method="POST" enctype="multipart/form-data">
                @csrf
                @method('patch')
                <div class="form-group">
                    <b>File Gambar</b><br/>
                    <input type="file" name="file" id="file">
                </div>

                <div class="form-group">
                    <b>Nama Pelajaran</b>
                    <input type="text" class="form-control" id="keterangan" value="{{$gambaradminguru->keterangan}}" name="keterangan">
                </div>

                <div class="form-group">
                    <b>Kategori</b>
                    <select name="kategori" value="{{$gambaradminguru->kategori}}" id="kategori" class="custom-select">
                        <option value="Pemula">Pemula</option>
                        <option value="Lanjutan">Lanjutan</option>
                    </select>
                </div>

                <div class="form-group">
                    <b>Nama Mentor</b>
                <input type="text" class="form-control" id="namamentor" value="{{$gambaradminguru->namamentor}}" name="namamentor">
                </div>

                <div class="form-group">
                    <b>Hari</b>
                <input type="text" class="form-control" id="hari" value="{{$gambaradminguru->hari}}" name="hari">
                </div>

                <div class="form-group">
                    <b>Jam</b>
                <input type="text" class="form-control" id="hari" value="{{$gambaradminguru->jam}}" name="jam">
                </div>

                <div class="form-group">
                    <b>Deskripsi</b>
                    <textarea name="deskripsi" id="deskripsi">{{$gambaradminguru->deskripsi}}</textarea>
                </div>
                <input type="submit" class="btn btn-primary" value="Ubah Data">
            </form>
    </div>
</div>
@endsection
