@extends('includes.amentor.app')

@section('content')

<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid">
            <h1 class="mt-4">Blog</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item active">Buat Blog Baru</li>
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
                    <form action="{{ route('amentor.blog.store') }}" method="post" enctype="multipart/form-data">
                        @csrf

                        <div class="form-group">
                            <label for="file" class="form-control-label">File</label>
                            <input type="file" name="file" id="file" class="form-control">
                        </div>

                        <div class="form-group">
                            <label for="title" class="form-control-label">Title</label>
                            <input type="text" name="title" id="title" class="form-control">
                        </div>

                        <div class="form-group">
                            <label for="subtitle" class="form-control-label">Subtitle</label>
                            <input type="text" name="subtitle" id="subtitle" class="form-control">
                        </div>

                        <div class="form-group" hidden>
                            <label for="isi">isi</label>
                            <input type="text" name="isi" id="isi" value="-">
                        </div>

                        <div class="form-group">
                            <label for="author" class="form-control-label">Author</label>
                            <input type="text" name="author" id="author" class="form-control" value="{{ Auth::user()->name }}" readonly>
                        </div>

                        <div class="form-group">
                            <label for="author_id" class="form-control-label">Author ID</label>
                            <input type="text" name="author_id" id="author_id" class="form-control" value="{{ Auth::user()->kode_mentor }}" readonly>
                        </div>


                        <div class="form-group">
                            <label for="kategori" class="form-control-label">Kategori</label>
                            <select name="kategori" id="kategori" class="form-control">
                                <option value="" disabled selected>-- Pilih Kategori --</option>
                                @foreach ($kategori as $query)
                                    <option value="{{ $query->kategori }}">{{ $query->kategori }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="topik" class="form-control-label">Topik</label>
                            <select name="topik" id="topik" class="form-control">
                                <option value="">-- Pilih Topic --</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="">Jenis</label>
                            <select name="jenis" id="jenis" class="form-control">
                                <option value="">-- Pilih Dimana Blog Anda ditempatkan --</option>
                                <option value="kelas">Kelas</option>
                                <option value="lainnya">Lainnya</option>
                            </select>
                        </div>

                        <div class="form-group" id="divkelas">
                            <label for="">Pilih Kelas Anda</label>
                            <select name="kelas_id" id="kelas_id" class="form-control">

                            </select>
                        </div>

                        <div class="form-group" hidden>
                            <label for="status" class="form-control-label">Status</label>
                            <input type="text" name="status" id="status" class="form-control" value="PENDING">
                        </div>
                        {{--<div class="form-group">
                            <label for="status" class="form-control-label">Status</label>
                            <input type="text" name="status" id="status" class="form-control" value="PENDING" readonly>
                        </div>--}}

                        {{--<input type="hidden" name="jenis" id="jenis" value="lainnya">
                        <input type="hidden" name="kelas_id" id="kelas_id" value="">--}}

                        <div class="form-group">
                            <button class="btn btn-primary btn-block" type="submit">
                                Tambah Data
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


    <script
        src="https://code.jquery.com/jquery-3.5.1.js"
        integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc="
        crossorigin="anonymous"></script>


    <script>
        $(document).ready(function(){
            $("#divkelas").hide();
            $('#kategori').on('change',function(e){
                console.log(e);
                var topik = e.target.value;
                $.get('{{ route('amentor.blog.dropdown') }}?kategori_id='+topik,function(data){
                    // console.log(data);
                    $('#topik').empty();
                    $.each(data, function(index, subObj){
                        $('#topik').append('<option value="'+subObj.topik+'">'+subObj.topik+'</option>');
                    });
                });
            });

            $('#jenis').on('change', function(e){
                var target = e.target.value;
                if(target == "kelas"){
                    $.get('{{ route('amentor.blog.getKelas') }}', function(data){
                        $("#kelas_id").empty();
                        $.each(data, function(index, subObj){
                            $("#divkelas").show();
                            $("#kelas_id").append(`<option value="`+subObj.id+`">`+subObj.kelas+`</option>`)
                        });
                    });
                }else{
                    $('#kelas_id').empty();
                    $("#divkelas").hide();
                }
            });
        });
    </script>

@endsection

