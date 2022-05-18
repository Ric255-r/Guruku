@extends('layouts.default')

@section('content')
<div class="card">
    <div class="card-header">
        <strong>Tambah Video</strong>
    </div>
    <div class="card-body card-block">
        <form action="{{ route('topik.store') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="kategori_id" class="form-control-label">Kategori</label>
                <select name="kategori_id" class="form-control @error('kategori_id') is-invalid @enderror">
                    @foreach ($kategori as $query)
                        <option value="{{ $query->kategori }}">{{ $query->kategori }}</option>
                    @endforeach
                </select>
            </div>
            @error('kategori_id') <div class="text-muted">{{ $message }}</div> @enderror

            <div class="form-group">
                <label for="topik" class="form-control-label">Topik</label>
                <input type="text" name="topik" id="topik" value="{{ old('topik') }}"
                class="form-control @error('topik') is-invalid @enderror"/>
            </div>
            @error('topik') <div class="text-muted">{{ $message }}</div> @enderror

            <div class="form-group">
                <button class="btn btn-primary btn-block" type="submit">
                    Tambah Topik
                </button>
            </div>
        </form>
    </div>
</div>
@endsection

