@extends('layouts.default')

@section('content')
    <div class="card">
        <div class="card-header">
            <strong>Tambah Bank</strong>
        </div>
        <div class="card-body card-block">
            @if(count($errors) > 0)
                <div class="alert alert-danger">
                    @foreach ($errors->all() as $error)
                    {{ $error }} <br/>
                    @endforeach
                </div>
            @endif
            <form action="{{ route('bank.store') }}" method="post" enctype="multipart/form-data">
                @csrf
                    <div class="form-group">
                        <label for="file" class="form-control-label">File</label>
                        <input type="file" name="file" id="file" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="namabank" class="form-control-label">Nama Bank</label>
                        <input type="text" name="namabank" id="namabank" class="form-control">
                    </div>
                <input type="submit" class="btn btn-primary form-control" value="Submit">
            </form>
        </div>
    </div>
@endsection
