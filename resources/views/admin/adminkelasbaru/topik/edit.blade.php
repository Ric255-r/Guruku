@extends('layouts.default')

@section('content')

    <div class="card">
        <div class="card-header">
            <strong>Edit Topik '{{ $topik->topik }}'</strong>
        </div>
        <div class="card-block card-body">
            @if(count($errors) > 0)
				<div class="alert alert-danger">
					@foreach ($errors->all() as $error)
					{{ $error }} <br/>
					@endforeach
				</div>
			@endif
            <form action="{{ route('topik.update', $topik->id) }}"
                method="POST" enctype="multipart/form-data">
                @method('patch')
                @csrf
                <div class="form-group">
                    <label for="topik" class="form-control-label">Topik</label>
                    <input type="text" name="topik" id="topik" value="{{ $topik->topik }}" class="form-control">
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
