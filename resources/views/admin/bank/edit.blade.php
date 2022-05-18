@extends('layouts.default')

@section('content')
    <div class="card">
        <div class="card-header">
            <strong>Edit Bank '<small>{{ $bank->namabank }}</small>'</strong>
        </div>
        <div class="card-block card-body">
            <form action="{{ route('bank.update',$bank->id) }}" method="post" enctype="multipart/form-data">
                @method('patch')
                @csrf
                <div class="form-group">
                    <label for="file" class="form-control-label">File</label>
                    <input type="file" name="file" class="file"> <br>
                    <img src="{{ asset('/storage/'.$bank->file) }}" class="img-fluid" style="width:100px; height:70px;" alt="gambarbank">
                </div>
                <div class="form-group">
                    <label for="namabank" class="form-control-label">Nama Bank</label>
                    <input type="text" name="namabank" class="form-control" value="{{ $bank->namabank }}">
                </div>
                <button type="submit" class="form-control btn btn-primary">Update Data</button>
            </form>
        </div>
    </div>
@endsection
