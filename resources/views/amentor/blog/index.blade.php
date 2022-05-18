@extends('includes.amentor.app')

@section('content')
    <div id="layoutSidenav_content">
        <main>
            <div class="container-fluid">
                <h1 class="mt-4">Blog</h1>
                <ol class="breadcrumb mb-4 align-middle">
                    <li class="breadcumb-item active align-middle mt-1">Daftar Blog / </li>
                    <li class="">
                        <select name="kategori" id="kategori" class="form-control mx-2">
                            <option value="">--Pilih Kategori--</option>
                            @foreach ($kategori as $item)
                                <option value="{{ $item->kategori }}">{{ $item->kategori }}</option>
                            @endforeach
                        </select>
                    </li>
                </ol>
                <div class="row">
                    <div class="col-lg-12">
                        @if(session('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                        @endif
                        <table class="table table-bordered table-responsive-sm" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>File</th>
                                    <th>Title</th>
                                    <th>Kategori</th>
                                    <th>Topik</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody class="refreshtable">
                                @forelse ($blog as $query)
                                    <tr>
                                        <td><img src="{{asset('/storage/'.$query->file)}}" alt="gam" width="150px"></td>
                                        <td>{{$query->title}}</td>
                                        <td> {{ $query->kategori }} </td>
                                        <td>{{ $query->topik }}</td>
                                        <td>
                                            @if ($query->status == 'PENDING')
                                                <span class="badge badge-info">{{ $query->status }}</span>
                                            @else
                                                <span class="badge badge-success">{{ $query->status }}</span>
                                            @endif
                                        </td>
                                        <td class="text-center">
                                            @if ($query->status == 'PENDING')
                                                <form action="{{ route('amentor.blog.status',$query->id) }}" method="POST" class="d-inline">
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
                                                    <button type="submit" class="btn btn-success btn-sm" onclick="return confirm('Yakin ingin publish blog anda?');"
                                                    data-toggle="tooltip"
                                                    title="Publish">
                                                        <i class="fa fa-check"></i>
                                                    </button>
                                                </form>
                                                {{--<a href="{{ route('amentor.blog.status', $query->id) }}" class="btn btn-success btn-sm">
                                                    <i class="fa fa-check"></i>
                                                </a>--}}
                                            @else
                                                <form action="{{ route('amentor.blog.status',$query->id) }}" method="POST" class="d-inline">
                                                    @csrf
                                                    @method('put')
                                                    <div class="form-group" hidden>
                                                        <label for="status">Status</label>
                                                        <input type="text" name="status" id="status" value="PENDING">
                                                    </div>
                                                    {{--<div class="form-group" hidden>
                                                        <label for="publish_date">Publish Date</label>
                                                        <input type="text" name="publish_date" id="publish_date" value="{{ date('Y-m-d') }}">
                                                    </div>--}}
                                                    <button type="submit" class="btn btn-info btn-sm"
                                                    data-toggle="tooltip"
                                                    title="Pending">
                                                        <i class="fa fa-spinner"></i>
                                                    </button>
                                                </form>
                                                {{--<a href="{{ route('amentor.blog.status', $query->id) }}?status=PENDING" class="btn btn-info btn-sm">
                                                    <i class="fa fa-spinner"></i>
                                                </a>--}}
                                            @endif
                                            {{--<a
                                            href="#mymodal2"
                                            data-remote="{{ route('amentor.kelas.show', $query->id) }}"
                                            data-toggle="modal"
                                            data-target="#mymodal2"
                                            data-title="Detail Kelas {{ $query->kelas }}"
                                            class="btn btn-primary btn-sm">
                                                <i class="fas fa-eye"></i>
                                            </a>--}}
                                            {{--<a href="{{ route('amentor.kelas.gallery', $query->slug) }}" class="btn btn-info btn-sm mt-lg-0 mt-2">
                                                <i class="fas fa-camera"></i>
                                            </a>--}}
                                            <a href="{{ route('amentor.blog.view', $query->id) }}" class="btn btn-primary btn-sm mt-lg-0 mt-2"
                                                data-toggle="tooltip"
                                                title="Isi blog anda">
                                                <i class="fas fa-pen" style="color:#ffff;"></i>
                                            </a>
                                            <a href="{{ route('amentor.blog.edit',$query->id) }}"
                                                class="btn btn-warning btn-sm mt-lg-0 mt-2"
                                                data-toggle="tooltip"
                                                title="Edit">
                                                <i class="fas fa-edit" style="color:#ffff;"></i>
                                            </a>
                                            <a href="#mymodal"
                                                class="btn btn-info btn-sm mt-lg-0 mt-2"
                                                data-remote="{{ route('amentor.blog.show',$query->id) }}"
                                                data-toggle="modal"
                                                data-target="#mymodal"
                                                data-title="Detail Blog {{ $query->title }}"
                                                title="View blog">
                                                    <i class="fas fa-eye" style="color:#ffff;"></i>
                                            </a>
                                            <form action="{{ route('amentor.blog.destroy',$query->id) }}" method="POST" class="d-inline">
                                                @method('delete')
                                                @csrf
                                                <button onclick="return confirm('Yakin Ingin Menghapus Data?');"
                                                    class="btn btn-danger btn-sm"
                                                    type="submit"
                                                    data-toggle="tooltip"
                                                    title="Delete">
                                                    <i class="fa fa-trash"></i>
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="6" class="text-center p-5">
                                            Data tidak tersedia
                                        </td>
                                    </tr>
                                @endforelse
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
    crossorigin="anonymous">
</script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.4/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js"></script>

<script>
    jQuery(document).ready(function($){
        $('#mymodal').on('show.bs.modal',function(e){
            var button = $(e.relatedTarget);
            var modal = $(this);
            modal.find('.modal-body').load(button.data('remote'));
            modal.find('.modal-title').html(button.data('title'));
        });
    });
</script>


<div class="modal" id="mymodal" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"></h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <i class="fa fa-spinner fa-spin"></i>
            </div>
        </div>
    </div>
</div>

<script>
    $('#kategori').on('change',function(e){
        var tabel = e.target.value;
        console.log(tabel);
        $.get('{{ route('amentor.blog.filter') }}?kategori='+tabel,function(data){
            $('.refreshtable').empty();
            $.each(data, function(index, subObj){
                var lihat = "{{ route('amentor.blog.view', 'params') }}";
                    lihat = lihat.replace('params', subObj.id);
                var edit = "{{ route('amentor.blog.edit','params') }}";
                    edit = edit.replace('params', subObj.id);
                var show = "{{ route('amentor.blog.show','params') }}";
                    show = show.replace('params',subObj.id); 
                var hapus = "{{ route('amentor.blog.destroy', 'params') }}";
                    hapus = hapus.replace('params', subObj.id);
                var gambar = "{{ asset('/storage/'.'params') }}";
                    gambar = gambar.replace('params', subObj.file);

                if(subObj.status === "PENDING"){
                    var check = 
                        `<form action="{{ route('amentor.blog.status','params') }}" method="POST" class="d-inline">
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
                            <button type="submit" class="btn btn-success btn-sm" onclick="return confirm('Yakin ingin publish blog anda?');"
                            data-toggle="tooltip"
                            title="Publish">
                                <i class="fa fa-check"></i>
                            </button>
                        </form>
                        `;

                    check = check.replace('params', subObj.id);
                    var pending = "<span class='badge badge-info'>"+subObj.status+"</span>";

                }else{
                    var check = 
                        `
                        <form action="{{ route('amentor.blog.status','params') }}" method="POST" class="d-inline">
                            @csrf
                            @method('put')
                            <div class="form-group" hidden>
                                <label for="status">Status</label>
                                <input type="text" name="status" id="status" value="PENDING">
                            </div>
                            {{--<div class="form-group" hidden>
                                <label for="publish_date">Publish Date</label>
                                <input type="text" name="publish_date" id="publish_date" value="{{ date('Y-m-d') }}">
                            </div>--}}
                            <button type="submit" class="btn btn-info btn-sm"
                            data-toggle="tooltip"
                            title="Pending">
                                <i class="fa fa-spinner"></i>
                            </button>
                        </form>
                        `;
                    check = check.replace('params', subObj.id);
                    var pending = "<span class='badge badge-success'>"+subObj.status+"</span>";
                }

                document.querySelector(".refreshtable").innerHTML +=
                `
                    <tr>
                        <td><img src="`+gambar+`" alt="gam" width="150px"></td>
                        <td>`+subObj.title+`</td>
                        <td>`+subObj.kategori+` </td>
                        <td>`+subObj.topik+`</td>
                        <td>`+pending+`</td>
                        <td class="text-center">
                            `+check+`
                            <a href="`+lihat+`" class="btn btn-primary btn-sm mt-lg-0 mt-2"
                                data-toggle="tooltip"
                                title="Isi blog anda">
                                <i class="fas fa-pen" style="color:#ffff;"></i>
                            </a>
                            <a href="`+edit+`"
                                class="btn btn-warning btn-sm mt-lg-0 mt-2"
                                data-toggle="tooltip"
                                title="Edit">
                                <i class="fas fa-edit" style="color:#ffff;"></i>
                            </a>
                            <a href="#mymodal"
                                class="btn btn-info btn-sm mt-lg-0 mt-2"
                                data-remote="`+show+`"
                                data-toggle="modal"
                                data-target="#mymodal"
                                data-title="Detail Blog `+subObj.title+`"
                                title="View blog">
                                    <i class="fas fa-eye" style="color:#ffff;"></i>
                            </a>
                            <form action="`+hapus+`" method="POST" class="d-inline">
                                @method('delete')
                                @csrf
                                <button onclick="return confirm('Yakin Ingin Menghapus Data?');"
                                    class="btn btn-danger btn-sm"
                                    type="submit"
                                    data-toggle="tooltip"
                                    title="Delete">
                                    <i class="fa fa-trash"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                `;
            });
        });
    });
</script>
@endsection
