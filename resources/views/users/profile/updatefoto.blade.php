@extends('layouts.default2')

@section('content')

    {{--{{$path}}--}}
    <div class="card">
        <div class="card-header">
            <strong>Upload Foto</strong>
        </div>
        <div class="card-body card-block">
            @if(count($errors) > 0)
                <div class="alert alert-danger">
                    @foreach ($errors->all() as $error)
                    {{ $error }} <br/>
                    @endforeach
                </div>
            @endif
            <form action="{{ route('user.profile.update',$user->id) }}" method="post" enctype="multipart/form-data">
                @csrf
                @method('patch')
                {{--<div class="form-group" hidden>
                    <label for="user_id" class="form-control-label">User_id</label>
                    <input type="text" name="user_id" id="user_id" class="form-control" value="{{ Auth::user()->id }}">
                </div>--}}
                <div class="form-group">
                    <label for="file" class="form-control-label">File</label>
                    <input type="file" name="file" id="file" class="form-control">
                    @if ($user->file == null)

                    @else
                        <img src="{{ asset('/storage/'.$user->file) }}" width="70px" height="70px" alt="-">
                    @endif
                </div>
                <button type="submit" class="btn btn-primary form-control">Update Profile</button>
            </form>
        </div>
    </div>



@endsection
