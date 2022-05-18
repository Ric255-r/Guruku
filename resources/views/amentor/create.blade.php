@extends('layouts.amentor.default')

@section('content')


    <div class="card">
        <div class="card-header">
            <strong>Edit Profile</strong>
        </div>
        <div class="card-body card-block">
            {{--@foreach ($mentor as $query)
                @if ($query->count() < 0)
                    <p>ini ada data</p>
                    @else
                    <p>ini ga ada data</p>
                @endif
            @endforeach--}}

            @if(count($errors) > 0)
                <div class="alert alert-danger">
                    @foreach ($errors->all() as $error)
                    {{ $error }} <br/>
                    @endforeach
                </div>
            @endif
            <form action="{{ route('amentor.update',$user->id) }}" method="post" enctype="multipart/form-data">
                @csrf
                @method('patch')
                <div class="form-group">
                    <label for="user_id" class="form-control-label">User_id</label>
                    <input type="text" name="user_id" id="user_id" class="form-control" value="{{ Auth::user()->id }}">
                    <img src="{{ asset('/storage/'.$user->file) }}" width="250px" height="50px" alt="-">
                </div>
                <div class="form-group">
                    <label for="file" class="form-control-label">File</label>
                    <input type="file" name="file" id="file" class="form-control">
                </div>
                <div class="form-group">
                    <label for="nama" class="form-control-label">Nama Mentor</label>
                    {{--@foreach ($users as $query)--}}
                        <input type="text" name="nama" id="nama" class="form-control" value="{{ $user->name }}" disabled>
                    {{--@endforeach--}}
                </div>
                <div class="form-group">
                    <label for="nama" class="form-control-label">Email Mentor</label>
                    {{--@foreach ($users as $query)--}}
                        <input type="text" name="nama" id="nama" class="form-control" value="{{ $user->email }}" disabled>
                    {{--@endforeach--}}
                </div>
                <div class="form-group">
                    <label for="bidang" class="form-control-label">Bidang</label>
                    <input type="text" name="bidang" id="bidang" class="form-control">
                </div>
                <div class="form-group">
                    <label for="deskripsi" class="form-control-label">Deskripsi</label>
                    <textarea name="deskripsi" id="deskripsi" class="form-control"></textarea>
                </div>
                <div class="form-group">
                    <label for="github_profile" class="form-control-label">Github Profile</label>
                    <input type="text" name="github_profile" id="github_profile" class="form-control">
                </div>
                <div class="form-group">
                    <label for="dribbble_profile" class="form-control-label">Dribbble Profile</label>
                    <input type="text" name="dribbble_profile" id="dribbble_profil" class="form-control">
                </div>
                <button type="submit" class="btn btn-primary form-control">Update Profile</button>
            </form>
        </div>
    </div>





@endsection
