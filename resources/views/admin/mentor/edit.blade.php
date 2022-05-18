@extends('layouts.default')

@section('content')
    <div class="card">
        <div class="card-header">
            @if ($mentor->kode_mentor != null)
                <strong>Edit Kode Mentor '<small>{{ $mentor->name }}</small>'</strong>
            @else
                <strong>Tambah Kode Mentor '<small>{{ $mentor->name }}</small>'</strong>
            @endif
        </div>
        <div class="card-block card-body">
            <form action="{{ route('mentor.update',$mentor->id) }}" method="post">
                @method('put')
                @csrf
                <div class="form-group">
                    <label for="kode_mentor" class="form-control-label">Kode Mentor</label>
                    <input type="text" name="kode_mentor" class="form-control">
                </div>
                <button class="form-control btn btn-primary">Tambah Kode</button>
            </form>
        </div>
    </div>
@endsection
