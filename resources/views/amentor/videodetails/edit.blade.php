@extends('includes.amentor.app')

@section('content')

    <div id="layoutSidenav_content">
        <main>
            <div class="container-fluid">
                <h1 class="mt-4">Video</h1>
                <ol class="breadcrumb mb-4">
                    <li class="breadcrumb-item active">Edit Video</li>
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
                        <form action="{{ route('amentor.videodetails.update',$video->id) }}" method="post" enctype="multipart/form-data">
                            @method('patch')
                            @csrf
                            <div class="form-group">
                                <label for="products_id" class="form-control-label">Nama Kelas '{{ $video->products_id }}'</label>
                                <select name="products_id" id="products_id" class="form-control @error('products_id') is-invalid @enderror">
                                    <option value="" disabled selected>-- Pilih Kelas --</option>
                                    @foreach ($kelas as $query)
                                        <option value="{{ $query->kelas }}">{{ $query->kelas }}</option>
                                    @endforeach
                                </select>
                            </div>
                            @error('products_id') <div class="text-muted">{{ $message }}</div> @enderror

                            <div class="form-group">
                                <label for="video_id" class="form-control-label">Judul Materi '{{ $video->video->judul }}'</label>
                                <select name="video_id" id="video_id" class="form-control @error('video_id') is-invalid @enderror">
                                    <option value="">-- Pilih Video --</option>
                                </select>
                            </div>
                            @error('video_id') <div class="text-muted">{{ $message }}</div> @enderror

                            <div class="form-group">
                                <label for="nama" class="form-control-label">Nama Video</label>
                                <input type="text" name="nama" id="nama" value="{{$video->nama}}"
                                class="form-control @error('nama') is-invalid @enderror">
                            </div>
                            @error('nama') <div class="text-muted">{{ $message }}</div> @enderror

                            <div class="form-group">
                                <label for="file" class="form-control-label">Video Pelajaran</label>
                                <input type="text" name="file" id="file" value="{{ $video->file }}"
                                class="form-control @error('video') is-invalid @enderror"/>
                            </div>
                            @error('file') <div class="text-muted">{{ $message }}</div> @enderror
                                <iframe width="300" height="100" src="https://www.youtube.com/embed/{{ $video->file }}" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>

                            <div class="form-group">
                                <label for="kuis" class="form-control-label">Kuis</label>
                                <div class="custom-control custom-radio kuis-script">
                                    <input type="radio" id="kuis" name="kuis" class="custom-control-input" value="1">
                                    <label class="custom-control-label" for="kuis">Ya</label>
                                </div>
                                <div class="custom-control custom-radio kuis-script">
                                    <input type="radio" id="kuis2" name="kuis" class="custom-control-input" value="0">
                                    <label class="custom-control-label" for="kuis2">Tidak</label>
                                </div>
                            </div>
                            @error('link_kuis') <div class="text-muted">{{ $message }}</div> @enderror

                            <div class="form-group" id="linkkuis">
                                <label for="link_kuis" class="form-control-label">Link Kuis</label>
                                <select name="link_kuis" class="form-control" id="link_kuis">
                                    <option value="">-- Pilih Kuis --</option>
                                    {{-- @foreach ($kuis as $query)
                                        @if ($query->status == 'active')
                                            <option value="{{ $query->slug }}">{{ $query->nama_kuis }}</option>
                                        @endif
                                    @endforeach --}}
                                </select>
                                {{--<input type="text" name="link_kuis" id="link_kuis" class="form-control" value="{{ old('link_kuis') }}">--}}
                            </div>
                            @error('link_kuis') <div class="text-muted">{{ $message }}</div> @enderror

                            {{--<div class="form-group">
                                <label for="blog" class="form-control-label">Blog</label>
                                <div class="custom-control custom-radio blog-script">
                                    <input type="radio" id="blog" name="blog" class="custom-control-input" value="1">
                                    <label class="custom-control-label" for="blog">Ya</label>
                                </div>
                                <div class="custom-control custom-radio blog-script">
                                    <input type="radio" id="blog2" name="blog" class="custom-control-input" value="0">
                                    <label class="custom-control-label" for="blog2">Tidak</label>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="link_blog" class="form-control-label">Link Blog</label>
                                <input type="text" name="link_blog" id="link_blog" class="form-control" value="{{ $video->link_blog }}">
                            </div>--}}

                            <div class="form-group">
                                <label for="number" class="form-control-label">Number Video</label>
                                <input type="text" name="number" id="number" class="form-control @error('number') is-invalid @enderror" value="{{ $video->number }}">
                            </div>
                            @error('is_default') <div class="text-muted">{{ $message }}</div> @enderror

                            <div class="form-group">
                                <button class="btn btn-primary btn-block" type="submit">
                                    Update Video Details
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
                    <div class="text-muted">Copyright &copy; Your Website 2020</div>
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
            <strong>Edit VideoDetails Dari Kelas'<small>{{ $video->products_id }}</small>'</strong>
        </div>
        <div class="card-block card-body">
            <form action="{{ route('amentor.videodetails.update',$video->id) }}" method="post" enctype="multipart/form-data">
                @method('patch')
                @csrf
                <div class="form-group">
                    <label for="products_id" class="form-control-label">Nama Kelas</label>
                    <select name="products_id" id="products_id" class="form-control @error('products_id') is-invalid @enderror">
                        <option value="" disabled selected>-- Pilih Kelas --</option>
                        @foreach ($kelas as $query)
                            <option value="{{ $query->kelas }}">{{ $query->kelas }}</option>
                        @endforeach
                    </select>
                </div>
                @error('products_id') <div class="text-muted">{{ $message }}</div> @enderror

                <div class="form-group">
                    <label for="video_id" class="form-control-label">Nama Judul</label>
                    <select name="video_id" id="video_id" class="form-control @error('video_id') is-invalid @enderror">
                        <option value="">-- Pilih Video --</option>
                    </select>
                </div>
                @error('video_id') <div class="text-muted">{{ $message }}</div> @enderror

                <div class="form-group">
                    <label for="nama" class="form-control-label">Nama Video Details</label>
                    <input type="text" name="nama" id="nama" value="{{$video->nama}}"
                    class="form-control @error('nama') is-invalid @enderror">
                </div>
                @error('nama') <div class="text-muted">{{ $message }}</div> @enderror

                <div class="form-group">
                    <label for="file" class="form-control-label">Video Pelajaran</label>
                    <input type="text" name="file" id="file" value="{{ $video->file }}"
                    class="form-control @error('video') is-invalid @enderror"/>
                </div>
                @error('file') <div class="text-muted">{{ $message }}</div> @enderror
                    <iframe width="300" height="100" src="https://www.youtube.com/embed/{{ $video->file }}" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>

                <div class="form-group">
                    <label for="modul" class="form-control-label">Modul Pembelajaran</label>
                    <input type="file" name="modul" id="modul" value="{{ old('modul') }}"
                    class="form-control @error('modul') is-invalid @enderror"/>
                </div>
                @error('modul') <div class="text-muted">{{ $message }}</div> @enderror

                <!-- Button trigger modal -->
                <button type="button" class="btn btn-secondary" data-toggle="modal" data-target="#exampleModalScrollable">
                    {{ $video->namamodul }}
                </button>

                <!-- Modal -->
                <div class="modal fade bd-example-modal-lg" id="exampleModalScrollable" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
                    <div class="modal-dialog modal-lg modal-dialog-scrollable" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalScrollableTitle">Modal title</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        </div>
                        <div class="modal-body">
                            <iframe src="{{ asset('/storage/'.$video->modul) }}" style="border:none; width:100%; height:700px;"></iframe>
                        </div>
                        <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        </div>
                    </div>
                    </div>
                </div>

                <div class="form-group">
                    <label for="number" class="form-control-label">Number Video</label>
                    <input type="text" name="number" id="number" class="form-control" value="{{ $video->number }}">
                </div>
                @error('is_default') <div class="text-muted">{{ $message }}</div> @enderror

                <div class="form-group">
                    <button class="btn btn-primary btn-block" type="submit">
                        Update Video Details
                    </button>
                </div>
            </form>
        </div>
    </div>--}}

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
                    $('#link_kuis').prop('disabled',false);
                }
                if(selectedKuis == '0')
                {
                    //alert(selectedKuis)
                    //prompt(selectedKuis);
                    $('#link_kuis').prop('disabled',true);
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

            $.get('{{ route('amentor.videodetails.getKuis') }}?products_id='+video, function(data){
                $('#link_kuis').empty();
                $.each(data, function(index, subObj){
                    if(subObj.jenis == 'video_akhir'){
                        $('#link_kuis').append(`<option value="`+subObj.slug+`">`+subObj.nama_kuis+` - (Ini Kuis Akhir Materi)</option>`);
                    }else{
                        $('#link_kuis').append(`<option value="`+subObj.slug+`">`+subObj.nama_kuis+`</option>`);
                    }
                });
            });
        });
    </script>
@endsection
