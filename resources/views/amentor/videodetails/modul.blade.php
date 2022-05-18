@extends('includes.amentor.app')

@section('content')

    <div id="layoutSidenav_content">
        <main>
            <div class="container-fluid">
                <h1 class="mt-4">Modul Video</h1>
                <ol class="breadcrumb mb-4">
                    <li class="breadcrumb-item active">Create Modul Video</li>
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
                        <form action="{{ route('amentor.videodetails.addmodul') }}" method="post" enctype="multipart/form-data">
                            @csrf

                            {{--<div class="form-group">
                                <label for="products_id" class="form-control-label">Nama Kelas</label>
                                <select name="products_id" id="products_id" class="form-control">
                                    <option value="" disabled selected>-- Pilih Kelas --</option>
                                    @foreach ($kelas as $query)
                                        <option value="{{ $query->kelas }}">{{ $query->kelas }}</option>
                                    @endforeach
                                </select>
                            </div>--}}
                            {{--@error('products_id') <div class="text-muted">{{ $message }}</div> @enderror--}}

                            <div class="form-group">
                                <label for="products_id" class="form-control-label">Nama Kelas</label>
                                <input type="text" name="products_id" id="products_id" class="form-control"
                                value="{{ $video->kelas->kelas }}" readonly>
                            </div>

                            <div class="form-group">
                                <label for="video" class="form-control-label">Judul Materi</label>
                                <input type="hidden" name="video" id="video" value="{{ $video->video->id }}" class="form-control" readonly>
                                <input type="text" class="form-control" value="{{ $video->video->judul }}" disabled>
                            </div>

                            {{--@error('video_id') <div class="text-muted">{{ $message }}</div> @enderror--}}

                            <div class="form-group">
                                <label for="videodetails_id" class="form-control-label">Nama Video</label>
                                <input type="hidden" name="videodetails_id" id="videodetails_id" class="form-control" value="{{ $video->id }}">
                                <input type="text" class="form-control" value="{{ $video->nama }}" disabled>
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
                                    Tambah Data
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <h3>Daftar Modul</h3>
                        <table class="table">
                            <thead>
                                <tr>
                                    <td>#</td>
                                    <td>Nama Modul</td>
                                    <td>Action</td>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($modul as $query)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>
                                            <a href="{{ asset('/storage/'.$query->file) }}" download="{{ $query->nama_modul }}">{{ $query->nama_modul }}</a>
                                            {{--<a href="" download="{{ $query->nama_modul }}">{{ $query->nama_modul }}</a>--}}
                                        </td>
                                        <td>
                                            <a href="{{ route('amentor.modul.edit',$query->id) }}" class="btn btn-warning btn-sm">
                                                <i class="fas fa-edit text-white"></i>
                                            </a>
                                            <form action="{{ route('amentor.modul.destroy',$query->id) }}" method="post" class="d-inline">
                                                @csrf
                                                @method('delete')
                                                <button class="btn btn-danger btn-sm" type="submit">
                                                    <i class="fas fa-trash"></i>
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
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


    <script
        src="https://code.jquery.com/jquery-3.5.1.js"
        integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc="
        crossorigin="anonymous"></script>

    <script>

        $(document).ready(function(){
            //alert('1');
            $('.kuis-script').change(function(){
                //input:radio[name=gender][value=Male]
                var selectedKuis = $(this).children('input[name="kuis"]:checked').val();
                //alert(selectedKonsul);
                if(selectedKuis == '1')
                {
                    //alert(selectedKuis)
                    //prompt(selectedKuis);
                    $('#link_kuis').prop('readonly',false);
                }
                if(selectedKuis == '0')
                {
                    //alert(selectedKuis)
                    //prompt(selectedKuis);
                    $('#link_kuis').prop('readonly',true);
                    $('#link_kuis').val('-');
                }
            });

            $('.blog-script').change(function(){
                var selectedBlog = $(this).children('input[name="blog"]:checked').val();
                if(selectedBlog == '1')
                {
                    $('#link_blog').prop('readonly',false);
                    //$('#pic_serti').show();
                }
                if(selectedBlog == '0')
                {
                    $('#link_blog').prop('readonly',true);
                    $('#link_blog').val('-');
                }
            });
        });




        $('#products_id').on('change',function(e){
            console.log(e);
            var video = e.target.value;
            $.get('{{ route('videodetails.dropdown') }}?products_id='+video,function(data){
                //console.log(data);
                $('#video_id').empty();
                $.each(data, function(index, subObj){
                    $('#video_id').append('<option value="'+subObj.id+'">'+subObj.judul+'</option>');
                });
            });
        });

    </script>
@endsection
