@extends('includes.amentor.app')

@section('content')

<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid">
            <h1 class="mt-4">Blog</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item active">Edit Blog</li>
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
                    <form action="{{ route('amentor.blog.update',$blog->id) }}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('patch')

                        <div class="form-group">
                            <label for="file" class="form-control-label">File</label>
                            <input type="file" name="file" id="file" class="form-control">
                            <img src="{{ asset('/storage/'.$blog->file) }}" width="250" height="200" class="mt-2" alt="">
                        </div>

                        <div class="form-group">
                            <label for="title" class="form-control-label">Title</label>
                            <input type="text" name="title" id="title" class="form-control" value="{{ $blog->title }}">
                        </div>

                        <div class="form-group">
                            <label for="subtitle" class="form-control-label">Subtitle</label>
                            <input type="text" name="subtitle" id="subtitle" class="form-control" value="{{ $blog->subtitle }}">
                        </div>

                        {{--<div class="form-group" hidden>
                            <label for="isi">isi</label>
                            <input type="text" name="isi" id="isi" value="-">
                        </div>--}}

                        <div class="form-group">
                            <label for="author" class="form-control-label">Author</label>
                            <input type="text" name="author" id="author" class="form-control" value="{{ Auth::user()->name }}" readonly>
                        </div>


                        <div class="form-group" hidden>
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


    <script
        src="https://code.jquery.com/jquery-3.5.1.js"
        integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc="
        crossorigin="anonymous"></script>


    <script>
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
    </script>

@endsection

