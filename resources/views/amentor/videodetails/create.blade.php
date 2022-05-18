@extends('includes.amentor.app')

@section('content')

    <div id="layoutSidenav_content">
        <main>
            <div class="container-fluid">
                <h1 class="mt-4">Video</h1>
                <ol class="breadcrumb mb-4">
                    <li class="breadcrumb-item active">Tambah Video</li>
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

                        @if (session('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                        @endif

                        <form action="{{ route('amentor.videodetails.store') }}" method="post" enctype="multipart/form-data">
                            @csrf

                            <div class="form-group">
                                <label for="products_id" class="form-control-label">Nama Kelas</label>
                                <select name="products_id" id="products_id" class="form-control">
                                    <option value="" disabled selected>-- Pilih Kelas --</option>
                                    @foreach ($kelas as $query)
                                        <option value="{{ $query->kelas }}">{{ $query->kelas }}</option>
                                    @endforeach
                                </select>
                            </div>
                            {{--@error('products_id') <div class="text-muted">{{ $message }}</div> @enderror--}}

                            <div class="form-group">
                                <label for="video_id" class="form-control-label">Judul Materi</label>
                                <select name="video_id" id="video_id" class="form-control">
                                    <option value="">-- Pilih Video --</option>
                                </select>
                            </div>
                            {{--@error('video_id') <div class="text-muted">{{ $message }}</div> @enderror--}}

                            <div class="form-group">
                                <label for="nama" class="form-control-label">Nama Video</label>
                                <input type="text" name="nama" id="nama" value="{{ old('nama') }}"
                                class="form-control"/>
                            </div>
                            {{--@error('nama') <div class="text-muted">{{ $message }}</div> @enderror--}}

                            <div class="form-group">
                                <label for="file" class="form-control-label">Link Video Pelajaran</label>
                                <input type="text" name="file" id="file" value="{{ old('file') }}"
                                class="form-control"/>
                            </div>

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

                            <div class="form-group" id="linkkuis">
                                <label for="link_kuis" class="form-control-label">Link Kuis</label>
                                    {{--<input type="text" name="link_kuis" id="link_kuis" class="col-lg-8 form-control" value="{{ old('link_kuis') }}">--}}
                                <select name="link_kuis" class="form-control" id="link_kuis">
                                    <option value="">-- Pilih Kuis --</option>
                                    {{-- @foreach ($kuis as $query)
                                        @if ($query->status == 'active')
                                            <option value="{{ $query->slug }}">{{ $query->nama_kuis }}
                                                @if ($query->jenis == 'video_akhir')
                                                    - (Ini Kuis Akhir Materi)
                                                @endif
                                            </option>
                                        @endif
                                    @endforeach --}}
                                </select>
                                {{-- <input list="listlink_kuis" name="link_kuis" id="link_kuis" class="form-control">
                                <datalist id="listlink_kuis">
                                    <option value="" disabled>-- Pilih Kuis --</option>
                                    @foreach ($kuis as $query)
                                        @if ($query->status == 'active')
                                            <option value="{{ $query->slug }}">{{ $query->nama_kuis }}
                                                @if ($query->jenis == 'video_akhir')
                                                    - (Ini Kuis Akhir Materi)
                                                @endif
                                            </option>
                                        @endif
                                    @endforeach
                                </datalist> --}}
                                    {{--<label class="sr-only" for="inlineFormInputGroup">Link Kuis</label>
                                    <div class="input-group mb-2">
                                        <div class="input-group-prepend">
                                        <div class="input-group-text">@</div>
                                        </div>
                                        <input type="text" class="form-control" id="inlineFormInputGroup" placeholder="Username">
                                    </div>--}}
                            </div>

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
                            </div>--}}

                            <div class="form-group" hidden>
                                <label for="link_blog" class="form-control-label">Link Blog</label>
                                <input type="text" name="link_blog" id="link_blog" class="form-control" value="-">
                                <input type="text" name="blog" id="blog" value="0">
                            </div>

                            <div class="form-group">
                                <label for="number" class="form-control-label">Number Video</label>
                                <input type="text" name="number" id="number" class="form-control" readonly>
                            </div>

                            <div class="form-group" hidden>
                                <input type="text" name="status" id="status" value="PENDING">
                            </div>
                            {{--@error('is_default') <div class="text-muted">{{ $message }}</div> @enderror--}}

                            <div class="form-group">
                                <button class="btn btn-primary btn-block" type="submit">
                                    Tambah Data
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12 text-right">
                        <a href="{{ route('amentor.videodetails.index') }}" class="pb-3" target="_blank">Lihat Selengkapnya</a>
                    </div>
                </div>
                <div class="row">
                    <div class="table table-responsive">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Nama Kelas</th>
                                    <th>Judul Materi</th>
                                    <th>Nama</th>
                                    <th>Video Pembelajaran</th>
                                    <th>Number</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($videodetails as $query)
                                    @if ($query->kelas->mentor_id == Auth::user()->kode_mentor)
                                        <tr>
                                            <td>{{ $query->products_id }}</td>
                                            <td>{{ $query->video->judul }}</td>
                                            <td>{{ $query->nama }}</td>
                                            <td>
                                                <iframe width="300" height="100" src="https://www.youtube.com/embed/{{ $query->file }}" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                                            </td>
                                            <td>{{ $query->number }}</td>
                                            <td>
                                                <div class="btn-group">
                                                    <a href="{{ route('amentor.videodetails.edit',$query->id) }}" class="btn btn-warning btn-sm mx-1"
                                                        data-toggle="tooltip"
                                                        title="Edit">
                                                        <i class="fas fa-edit text-white"></i>
                                                    </a>
                                                    <form action="{{ route('amentor.videodetails.destroy-create',$query->id) }}" method="post" class="d-inline mx-1">
                                                        @csrf
                                                        @method('delete')
                                                        <button class="btn btn-danger btn-sm mt-lg-2 mt-xl-0"
                                                            data-toggle="tooltip"
                                                            title="Delete">
                                                                <i class="fas fa-trash "></i>
                                                        </button>
                                                    </form>
                                                </div>
                                            </td>
                                        </tr>
                                    @endif
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

            $.get('{{ route('amentor.videodetails.getNumber') }}?products_id='+video, function(data){
                $('#number').empty();
                $.each(data, function(index, subObj){
                    if(subObj.number == undefined){
                        $('#number').val(0);
                    }else{
                        $('#number').val(subObj.number);
                    }
                });
            });

            $.get('{{ route('amentor.videodetails.getKuis') }}?products_id='+video, function(data){
                $('#link_kuis').empty();
                $.each(data, function(index, subObj){
                    if(subObj.jenis == undefined){
                        $('#link_kuis').append(`<option value="">-- Pilih Menu Kuis --</option>`);
                        $('#link_kuis').append(`<option value="{{ route('amentor.kuis.index') }}">-- Buat Kuis Terlebih Dahulu Di Menu Kuis--</option>`);
                        document.getElementById('link_kuis').onchange = function(){
                            window.location = this.value;
                        };
                    }else{
                        if(subObj.jenis == 'video_akhir'){
                            $('#link_kuis').append(`<option value="`+subObj.slug+`">`+subObj.nama_kuis+` --> Kuis Akhir Materi</option>`);
                        }else{
                            $('#link_kuis').append(`<option value="`+subObj.slug+`">`+subObj.nama_kuis+`</option>`);
                        }
                    }
                });
            });
        });


        //kuis
        //$(document).ready(function(){
        //    //alert('1');
        //    $('.kuis').change(function(){
        //        //input:radio[name=gender][value=Male]
        //        var selectedKuis = $(this).children('input[name="kuis"]:checked').val();
        //        //alert(selectedKonsul);
        //        if(selectedKuis == '1')
        //        {
        //            //prompt(selectedKonsul);
        //            $('#linkkuis').show();
        //        }
        //        if(selectedKuis == '0')
        //        {
        //            //prompt(selectedKonsul);
        //            $('#linkkuis').hide();
        //        }
        //    });
        //});
    </script>
@endsection
