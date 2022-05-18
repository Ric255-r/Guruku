@extends('includes.amentor.app')

@section('content')
<style>
    tbody {
    counter-reset: section;
    }

    .count:before {
    counter-increment: section;
    content: counter(section);
    }
</style>
    <div id="layoutSidenav_content">
        <main>
            <div class="container-fluid">
                <h1 class="mt-4">Video</h1>
                <ol class="breadcrumb mb-4 align-middle">
                    <li class="breadcumb-item mt-1 align-middle">Daftar Video /</li>
                    <li class="align-middle">
                        <select name="product_id" id="product_id" class="form-control mx-2">
                            <option value="">--Pilih Kelas--</option>
                            @foreach ($vid as $item)
                                <option value="{{ $item->kelas }}">{{ $item->kelas }}</option>
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
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Nama Kelas</th>
                                    <th>Judul Materi</th>
                                    <th>Nama</th>
                                    <th>Video</th>
                                    {{--<th>Modul</th>--}}
                                    <th>Number</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody class="refreshtable">
                                <?php $i=1 ?>
                                @foreach ($video as $query)
                                    @if ($query->kelas->mentor_id == Auth::user()->kode_mentor)
                                        <tr>
                                            <td class="align-middle">{{ $i++ }}</td>
                                            <td class="align-middle">{{ $query->video->bayar->kelas }}</td>
                                            <td class="align-middle">{{ $query->video->judul }}</td>
                                            <td class="align-middle">{{ $query->nama }}</td>
                                            <td class="align-middle">
                                                <iframe width="300" height="100" src="https://www.youtube.com/embed/{{ $query->file }}" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                                            </td>
                                            <td class="align-middle">{{ $query->number }}</td>
                                            <td>
                                                <div class="btn-group">
                                                    <a href="{{ route('amentor.videodetails.edit',$query->id) }}" class="btn btn-warning btn-sm mx-1"
                                                        data-toggle="tooltip"
                                                        title="Edit">
                                                        <i class="fas fa-edit text-white"></i>
                                                    </a>
                                                    <a href="{{ route('amentor.videodetails.show',$query->id) }}" class="btn btn-info btn-sm mx-1"
                                                        data-toggle="tooltip"
                                                        title="View more">
                                                        <i class="fas fa-eye"></i>
                                                    </a>
                                                    <a href="{{ route('amentor.videodetails.modul',$query->id) }}" class="btn btn-primary btn-sm mx-1"
                                                        data-toggle="tooltip"
                                                        title="Add modul">
                                                        <i class="fas fa-plus"></i>
                                                    </a>
                                                    <form action="{{ route('amentor.videodetails.destroy',$query->id) }}" method="post" class="d-inline mx-1">
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
                                            {{--<td class="align-middle">
                                                <a href="{{ route('amentor.videodetails.edit',$query->id) }}" class="btn btn-warning btn-sm"
                                                    data-toggle="tooltip"
                                                    title="Edit">
                                                    <i class="fas fa-edit text-white"></i>
                                                </a>
                                                <a href="{{ route('amentor.videodetails.show',$query->id) }}" class="btn btn-info btn-sm"
                                                    data-toggle="tooltip"
                                                    title="View more">
                                                    <i class="fas fa-eye"></i>
                                                </a>
                                                <a href="{{ route('amentor.videodetails.modul',$query->id) }}" class="btn btn-primary btn-sm"
                                                    data-toggle="tooltip"
                                                    title="Add modul">
                                                    <i class="fas fa-plus"></i>
                                                </a>
                                                <form action="{{ route('amentor.videodetails.destroy',$query->id) }}" method="post" class="d-inline">
                                                    @csrf
                                                    @method('delete')
                                                    <button class="btn btn-danger btn-sm mt-lg-2 mt-xl-0"
                                                        data-toggle="tooltip"
                                                        title="Delete">
                                                            <i class="fas fa-trash "></i>
                                                    </button>
                                                </form>
                                            </td>--}}
                                        </tr>
                                    @endif
                                @endforeach
                                <?php $i++ ?>
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

    {{--<div class="orders">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="box-title">Daftar Video</h4>
                    </div>
                    <div class="card-body--">
                        <div class="table-stats order-table table-responsive">
                            @if(session('success'))
                                <div class="alert alert-success">
                                    {{ session('success') }}
                                </div>
                            @endif
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Nama Kelas</th>
                                        <th>Nama Judul</th>
                                        <th>Nama</th>
                                        <th>Video</th>
                                        <th>Modul</th>
                                        <th>Number</th>
                                        <th colspan="2">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($video as $query)
                                        <tr>
                                            <td class="align-middle">{{ $loop->iteration }}</td>
                                            <td class="align-middle">{{ $query->video->bayar->kelas }}</td>
                                            <td class="align-middle">{{ $query->video->judul }}</td>
                                            <td>{{ $query->video->nama_video }}</td>
                                            <td class="align-middle">{{ $query->nama }}</td>
                                            <td class="align-middle">
                                                <iframe width="300" height="100" src="https://www.youtube.com/embed/{{ $query->file }}" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                                            </td>
                                            <td class="align-middle">
                                                @if($query->namamodul == null)
                                                    -
                                                @else
                                                    {{ $query->namamodul }}
                                                @endif
                                            </td>
                                            <td class="align-middle">{{ $query->number }}</td>
                                            <td class="align-middle">
                                                <a href="{{ route('amentor.videodetails.edit',$query->id) }}" class="btn btn-warning btn-sm">
                                                    <i class="fa fa-pencil"></i>
                                                </a>
                                                @if ($query->modul == null)

                                                @else
                                                    <a href="{{ route('amentor.videodetails.show',$query->id) }}" class="btn btn-info btn-sm">
                                                        <i class="fa fa-eye"></i>
                                                    </a>
                                                @endif
                                                <form action="{{ route('amentor.videodetails.destroy',$query->id) }}" method="post" class="d-inline">
                                                    @csrf
                                                    @method('delete')
                                                    <button class="btn btn-danger btn-sm">
                                                        <i class="fa fa-trash "></i>
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
            </div>
        </div>
    </div>--}}
<script
        src="https://code.jquery.com/jquery-3.5.1.js"
        integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc="
        crossorigin="anonymous">
    </script>
<script>
    $(document).ready(function(){
        $('#product_id').on('change',function(e){
            console.log(e);
            var tabel = e.target.value;
            $.get('{{ route('amentor.videodetails.filter') }}?products_id='+tabel,function(data){
                $('.refreshtable').empty();
                $.each(data, function(index, subObj){
                    var edit = "{{ route('amentor.videodetails.edit','params') }}";
                    edit = edit.replace('params',subObj.id);
                    var hapus = "{{ route('amentor.videodetails.destroy','params') }}";
                    hapus = hapus.replace('params',subObj.id);
                    var lihat = "{{ route('amentor.videodetails.show','params') }}";
                    lihat = lihat.replace('params', subObj.id);
                    var modul = "{{ route('amentor.videodetails.modul','params') }}";
                    modul = modul.replace('params', subObj.id);

                    document.querySelector(".refreshtable").innerHTML +=
                    `
                        <tr>
                            <td class="count"></td>
                            <td>`+subObj.kelas+`</td>
                            <td>`+subObj.judul+`</td>
                            <td>`+subObj.nama+`</td>
                            <td>
                                <iframe width="300" height="100" src="https://www.youtube.com/embed/`+subObj.file+`" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                            </td>
                            <td>`+subObj.number+`</td>
                            <td>
                                <a href="`+edit+`" class="btn btn-warning btn-sm">
                                    <i class="fas fa-edit text-white"></i>
                                </a>
                                <a href="`+lihat+`" class="btn btn-info btn-sm">
                                    <i class="fas fa-eye"></i>
                                </a>
                                <a href="`+modul+`" class="btn btn-primary btn-sm">
                                    <i class="fas fa-plus"></i>
                                </a>
                                <form action="`+hapus+`" method="post" class="form-inline d-inline">
                                    @csrf
                                    @method('delete')
                                    <button class="btn btn-danger btn-sm">
                                        <i class="fas fa-trash "></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    `;
                });
            });
        });
    });
</script>
@endsection
