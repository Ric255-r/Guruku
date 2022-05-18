@extends('includes.amentor.app')

@section('content')

<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid">
            <h1 class="mt-4">Blog</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item active">Isi Blog</li>
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
                    <form action="{{ route('amentor.blog.blog',$blog->id) }}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('patch')

                        <div class="form-group">
                            <label for="isi" class="form-control-label">Isi</label>
                            <textarea name="isi" id="isi" class="ckeditor form-control">{{ $blog->isi }}</textarea>
                        </div>

                        <div class="form-group">
                            @if ($blog->status == 'PENDING')
                                {{--<form action="{{ route('amentor.blog.status',$blog->id) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('put')
                                    <div class="form-group" hidden>
                                        <label for="status">Status</label>
                                        <input type="text" name="status" id="status" value="PUBLISH">
                                    </div>
                                    <div class="form-group" hidden>
                                        <label for="publish_date">Publish Date</label>
                                        <input type="text" name="publish_date" id="publish_date" value="{{ date('Y-m-d') }}">
                                    </div>
                                    <button type="submit" class="btn btn-success btn-block">
                                        PUBLISH
                                    </button>
                                </form>--}}
                                {{--<a href="{{ route('amentor.blog.status', $blog->id) }}" class="btn btn-success btn-block">
                                    PUBLISH
                                </a>--}}
                            @else
                                {{--<form action="{{ route('amentor.blog.show',$blog->id) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('put')
                                    <div class="form-group" hidden>
                                        <label for="status">Status</label>
                                        <input type="text" name="status" id="status" value="PENDING">
                                    </div>
                                    <button type="submit" class="btn btn-info btn-block">
                                        PENDING
                                    </button>
                                </form>--}}
                                {{--<a href="{{ route('amentor.blog.status', $blog->id) }}?status=PENDING" class="btn btn-info btn-block">
                                    PENDING
                                </a>--}}
                            @endif
                        </div>
                        <div class="form-group">
                            <button class="btn btn-primary btn-block" type="submit">
                                Save
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

