@extends('layouts.default')

@section('content')

    <div class="card">
        <div class="card-header">
            <strong>Edit Kategori '{{ $kategori->kategori }}'</strong>
        </div>
        <div class="card-block card-body">
            @if(count($errors) > 0)
				<div class="alert alert-danger">
					@foreach ($errors->all() as $error)
					{{ $error }} <br/>
					@endforeach
				</div>
			@endif
            <form action="{{ route('kategori.update', $kategori->id) }}"
                method="POST" enctype="multipart/form-data">
                @method('patch')
                @csrf
                <div class="form-group">
                    <label for="kategori" class="form-control-label">Kategori</label>
                    <input type="text" name="kategori" id="kategori" class="form-control">
                </div>
                <button type="submit" class="btn btn-primary">Ubah Data</button>
            </form>
        </div>
    </div>


    <script
        src="https://code.jquery.com/jquery-3.5.1.js"
        integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc="
        crossorigin="anonymous"></script>
@endsection
