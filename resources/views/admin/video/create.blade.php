@extends('layouts.default')

@section('content')
<div class="card">
    <div class="card-header">
        <strong>Tambah Video</strong>
    </div>
    <div class="card-body card-block">
        <form action="{{ route('video.store') }}" method="post" enctype="multipart/form-data">
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

            {{--<div class="form-group">
                <label for="video" class="form-control-label">Video Pelajaran</label>
                <input type="file" name="video" id="video" value="{{ old('video') }}"
                class="form-control @error('video') is-invalid @enderror"/>
            </div>
            @error('video') <div class="text-muted">{{ $message }}</div> @enderror--}}

            {{--<div class="form-group">
                <label for="is_default" class="form-control-label">Video Default</label>
                <br>
                <label>
                    <input type="radio" name="is_default" value="1"
                    class="form-control @error('is_default') is-invalid @enderror"/> Ya
                </label>
                &nbsp;
                <label>
                    <input type="radio" name="is_default" value="0"
                    class="form-control @error('is_default') is-invalid @enderror"
                    style="width:20px;"/> Tidak
                </label>
            </div>
            @error('is_default') <div class="text-muted">{{ $message }}</div> @enderror--}}

            <div class="form-group">
                <button class="btn btn-primary btn-block" type="submit">
                    Tambah Data
                </button>
            </div>
        </form>
    </div>
</div>
@endsection

