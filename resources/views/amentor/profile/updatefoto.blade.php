@extends('includes.amentor.app')

@section('content')

    <div id="layoutSidenav_content">
        <main>
            <div class="container-fluid">
                <h1 class="mt-4">Profile</h1>
                <ol class="breadcrumb mb-4">
                    <li class="breadcrumb-item active">Edit Picture</li>
                </ol>
                <div class="row">
                    <div class="col-lg-12">
                        @if(count($errors) > 0)
                            <div class="alert alert-danger">
                                @foreach ($errors->all() as $error)
                                {{ $error }} <br/>
                                @endforeach
                            </div>
                        @endif
                        <form action="{{ route('amentor.profile.update',$user->id) }}" method="post" enctype="multipart/form-data">
                            @csrf
                            @method('patch')
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
            </div>
        </main>
        <footer class="py-4 bg-light mt-auto">
            <div class="container-fluid">
                <div class="d-flex align-items-center justify-content-between small">
                    <div class="text-muted">Copyright &copy; Guruku 2020</div>
                    <div>
                        <a href="#">Privacy Policy</a>
                        &middot;
                        <a href="#">Terms &amp; Conditions</a>
                    </div>
                </div>
            </div>
        </footer>
    </div>

    {{--<div class="card">
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
            <form action="{{ route('amentor.profile.update',$user->id) }}" method="post" enctype="multipart/form-data">
                @csrf
                @method('patch')
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
    </div>--}}



@endsection
