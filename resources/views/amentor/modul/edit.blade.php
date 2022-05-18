@extends('includes.amentor.app')

@section('content')

    <div id="layoutSidenav_content">
        <main>
            <div class="container-fluid">
                <h1 class="mt-4">Modul Video Details</h1>
                <ol class="breadcrumb mb-4">
                    <li class="breadcrumb-item active">Edit Video Details Modul '{{ $modul->nama_modul }}'</li>
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
                        @if(session('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                        @endif
                        <form action="{{ route('amentor.modul.update',$modul->id) }}" method="post" enctype="multipart/form-data">
                            @csrf
                            @method('PATCH')

                            <div class="form-group">
                                <label for="video" class="form-control-label">Judul Video</label>
                                <input type="hidden" name="video" id="video" value="{{ $modul->vidi->id }}" class="form-control" readonly>
                                <input type="text" class="form-control" value="{{ $modul->vidi->judul }}" disabled>
                            </div>

                            {{--@error('video_id') <div class="text-muted">{{ $message }}</div> @enderror--}}

                            <div class="form-group">
                                <label for="videodetails_id" class="form-control-label">Video Details Name</label>
                                <input type="hidden" name="videodetails_id" id="videodetails_id" class="form-control" value="{{ $modul->details->id }}">
                                <input type="text" class="form-control" value="{{ $modul->details->nama }}" disabled>
                            </div>

                            <div class="form-group">
                                <label for="file" class="form-control-label">Modul</label>
                                <input type="file" name="file" id="file" value="{{ old('file') }}" class="form-control"/>
                            </div>
                            {{--@error('nama') <div class="text-muted">{{ $message }}</div> @enderror--}}

                            <div class="form-group">
                                <label for="kode_mentor" class="form-control-label">Kode Mentor</label>
                                <input type="text" name="kode_mentor" id="kode_mentor" class="form-control" value="{{ Auth::user()->kode_mentor }}" readonly>
                            </div>

                            <div class="form-group">
                                <button class="btn btn-primary btn-block" type="submit">
                                    Ubah Data
                                </button>
                            </div>
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
@endsection
