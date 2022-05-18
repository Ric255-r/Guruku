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
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="mt-4">Daftar Kuis Anda</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcumb-item active mt-1">Cari Berdasarkan Kategori / </li>
                            <li class="">
                                <select name="kat_kuis" id="kat_kuis" class="form-control mx-2">
                                    <option value="">--Pilih Kategori--</option>
                                    @foreach ($kategori as $item)
                                        <option value="{{ $item->kategori }}">{{ $item->kategori }}</option>
                                    @endforeach
                                </select>
                            </li>
                        </ol>
                    </div>
                </div>
                {{--<h1 class="mt-4">Daftar Kuis Anda</h1>
                <ol class="breadcrumb mb-4">
                    <li class="breadcumb-item active mt-1">Cari Berdasarkan Kategori / </li>
                    <li class="">
                        <select name="kat_kuis" id="kat_kuis" class="form-control mx-2">
                            <option value="">--Pilih Kategori--</option>
                            @foreach ($kategori as $item)
                                <option value="{{ $item->kategori }}">{{ $item->kategori }}</option>
                            @endforeach
                        </select>
                    </li>
                </ol>--}}

                {{--<div class="row">
                    <div class="col-lg-12">
                        <table class="table table-bordered" cellspacing="0">
                            <thead>
                </ol>--}}
                @php
                    $success = Session::get('success');
                @endphp
                @if (!isset($success))
                    
                @else
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="alert alert-success alert-dismissable">
                                <a href="#" id="alertclose" class="close" data-dismiss="alert" aria-label="close"><b>x</b></a>
                                <strong style="color:#242424;">{{ $success }}</strong>
                            </div>
                        </div>
                    </div>
                @endif
                <div class="row">
                    <div class="col-lg-12">
                        <table class="table table-striped" id="tablenya">
                            <thead class="text-left" class="align-middle">
                                <tr>
                                    <th>No</th>
                                    <th>Gambar</th>
                                    <th>Nama Kuis</th>
                                    <th>Kategori</th>
                                    <th>Jenis</th>
                                    <th>Link Kuis</th>
                                    <th>Status</th>
                                    <th class="text-center">Action</th>
                                </tr>
                            </thead>
                            <tbody class="refreshtable">
                                @foreach ($show as $indexkey => $item)
                                    <tr>
                                        <td class="align-middle text-center">{{ $indexkey+1 }}</td>
                                        <td class="align-middle" style="width: 130px !important"><img src="{{ asset('gambar_kuis/'.$item->gambar) }}" class="img-fluid"></td>
                                        <td class="align-middle">{{ $item->nama_kuis}}</td>
                                        <td class="align-middle">{{ $item->kategori }}</td>
                                        <td class="align-middle">{{ $item->jenis }}</td>
                                        <td class="align-middle"><a href="http://localhost:8000/kuis/{{ $item->slug }}" target="_blank">http://localhost:8000/kuis/{{ $item->slug }}</a></td>
                                        <td class="align-middle">
                                            @if ($item->status === "pending")
                                                <span class="badge badge-info">
                                            @elseif($item->status == "active")
                                                <span class="badge badge-success">
                                            @else
                                                <span></span>
                                            @endif
                                            <span style="text-transform: uppercase">{{ $item->status }}</span>
                                            </span>
                                        </td>
                                        <td class="align-middle">
                                            <a
                                                href="#mymodal2"
                                                data-remote="{{ route('amentor.kuis.listdetail', $item->id) }}"
                                                data-toggle="modal"
                                                data-target="#mymodal2"
                                                data-title="Detail Kuis {{ $item->nama_kuis }}"
                                                class="btn btn-primary btn-sm">
                                                    <i class="fa fa-eye"></i>
                                            </a>
                                            @if ($item->status == "pending")
                                                <a href="{{ route('amentor.kuis.updatestatus', $item->id) }}?status=active"
                                                    class="btn btn-success btn-sm"
                                                    data-toggle="tooltip"
                                                    title="Publish">
                                                    <i class="fa fa-check"></i>
                                                </a>
                                                <a href="{{ route('amentor.kuis.editKuis',$item->id) }}"
                                                    class="btn btn-warning btn-sm"
                                                    data-toggle="tooltip"
                                                    title="Edit">
                                                    <i class="fas fa-edit text-white" aria-hidden="true"></i>
                                                </a>
                                            @elseif($item->status == 'active')
                                                <a href="{{ route('amentor.kuis.updatestatus', $item->id) }}?status=pending"
                                                    class="btn btn-info btn-sm mb-2"
                                                    data-toggle="tooltip"
                                                    title="Pending">
                                                    <i class="fa fa-spinner"></i>
                                                </a>
                                                <a href="{{ route('amentor.kuis.editKuis',$item->id) }}"
                                                    class="btn btn-warning btn-sm mb-2"
                                                    data-toggle="tooltip"
                                                    title="Edit">
                                                    <i class="fas fa-edit text-white" aria-hidden="true"></i>
                                                </a>
                                            @endif
                                            <form action="{{ route('amentor.kuis.deletekuis', $item->id) }}" method="post" enctype="multipart/form-data" class="d-inline">
                                                @csrf
                                                @method('delete')
                                                <button class="btn btn-danger btn-sm"
                                                data-toggle="tooltip"
                                                title="Delete">
                                                    <i class="fa fa-trash"></i>
                                                </button>
                                            </form>
                                        </td>
                                        {{-- <td class="text-center"><a href="{{ route('amentor.kuis.editKuis',$item->id) }}" class="btn btn-info">Edit</a></td>
                                        <td class="text-center">
                                            <form action="{{ route('amentor.kuis.deletekuis', $item->id) }}" method="post">
                                                @csrf
                                                @method('DELETE')
                                                <input type="submit" value="Delete" class="btn btn-danger">
                                            </form>
                                        </td> --}}
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
    crossorigin="anonymous">
</script>
<script src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.min.js"></script>

<script>
    $(document).ready(function(){
        $('#tablenya').DataTable({
            'ordering': false,
            'lengthChange': false
        });
    });

    $('#kat_kuis').on('change',function(e){
        // console.log(e);
        var tabel = e.target.value;
        console.log(tabel);
        $.get('{{ route('amentor.kuis.filterkuis') }}?kat_kuis='+tabel,function(data){
            $('.refreshtable').empty();
            $.each(data, function(index, subObj){
                var hapus = "{{ route('amentor.kuis.deletekuis', 'params') }}";
                    hapus = hapus.replace('params', subObj.id);
                var gambar = "{{ asset('gambar_kuis/'. 'params') }}";
                    gambar = gambar.replace('params', subObj.gambar);
                var listdetail = "{{ route('amentor.kuis.listdetail', 'params') }}"
                    listdetail = listdetail.replace('params', subObj.id);

                if(subObj.status === "pending"){
                    var check = `<a href="{{ route('amentor.kuis.updatestatus', 'params') }}?status=active"
                                    class="btn btn-success btn-sm">
                                    <i class="fa fa-check"></i>
                                </a>`
                    var edit =  `<a href="{{ route('amentor.kuis.editKuis','params') }}"
                                    class="btn btn-warning btn-sm">
                                    <i class="fas fa-edit text-white" aria-hidden="true"></i>
                                </a>`;
                    check = check.replace('params', subObj.id);
                    edit = edit.replace('params', subObj.id);
                    var pending = "<span class='badge badge-info'>";

                }else if(subObj.status === "active"){
                    var check = `<a href="{{ route('amentor.kuis.updatestatus', 'params') }}?status=pending"
                                    class="btn btn-info btn-sm">
                                    <i class="fa fa-spinner"></i>
                                </a>`
                    var edit =  `<a href="{{ route('amentor.kuis.editKuis','params') }}"
                                    class="btn btn-warning btn-sm">
                                    <i class="fas fa-edit text-white" aria-hidden="true"></i>
                                </a>`;
                    check = check.replace('params', subObj.id);
                    edit = edit.replace('params', subObj.id);
                    var pending = "<span class='badge badge-success'>";
                }
                document.querySelector(".refreshtable").innerHTML +=
                `
                <tr>
                    <td class="count align-middle text-center"></td>
                    <td style="width: 130px !important"><img src="`+gambar+`" class="img-fluid"></td>
                    <td class="align-middle">`+subObj.nama_kuis+`</td>
                    <td class="align-middle">`+subObj.kategori+`</td>
                    <td class="align-middle">`+subObj.jenis+`</td>
                    <td class="align-middle">`+subObj.slug+`</td>
                    <td class="align-middle">`+pending+`
                        <span style="text-transform: uppercase">`+subObj.status+`</span>
                        </span>
                    </td>
                    <td class="align-middle">
                        <a
                            href="#mymodal2"
                            data-remote="`+listdetail+`"
                            data-toggle="modal"
                            data-target="#mymodal2"
                            data-title="Detail Kuis `+subObj.nama_kuis+`"
                            class="btn btn-primary btn-sm">
                                <i class="fa fa-eye"></i>
                        </a>
                        `+check+`
                        `+edit+`
                        <form action="`+hapus+`" method="post" enctype="multipart/form-data" class="d-inline">
                            @csrf
                            @method('delete')
                            <button class="btn btn-danger btn-sm">
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
