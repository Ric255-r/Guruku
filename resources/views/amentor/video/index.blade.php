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
                <h1 class="mt-4">Materi</h1>
                <ol class="breadcrumb mb-4">
                    <li class="breadcrumb-item active">Daftar Materi</li>
                    <li class="breadcrumb-item">
                        <select name="products_id" id="products_id" class="form-control">
                            <option value="">--Pilih Kelas Anda--</option>
                            @foreach ($kelaskat as $item)
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
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody class="refreshtable">
                                <?php $i=1 ?>
                                @forelse($video as $query)
                                    @if (@$query->bayar->mentor_id == Auth::user()->kode_mentor)
                                        <tr>
                                            <td>{{ $i++ }}</td>
                                            <td>{{ $query->bayar->kelas }}</td>
                                            <td>{{ $query->judul }}</td>
                                            <td>
                                                <a href="{{ route('amentor.video.edit',$query->id) }}"
                                                    data-toggle="tooltip"
                                                    title="Edit">
                                                    <button class="btn btn-warning btn-sm"><i class="fas fa-edit" style="color:white;"></i></button>
                                                </a>
                                                <form action="{{ route('amentor.video.destroy', $query->id) }}" method="post" class="d-inline">
                                                    @csrf
                                                    @method('delete')
                                                    <button class="btn btn-danger btn-sm mt-2 mt-sm-2 mt-md-0 mt-lg-0 mt-xl-0"
                                                    data-toggle="tooltip"
                                                    title="Delete">
                                                        <i class="fas fa-trash"></i>
                                                    </button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endif
                                @empty
                                    <tr>
                                        <td colspan="6" class="text-center p-5">
                                            Data tidak tersedia
                                        </td>
                                    </tr>
                                @endforelse
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
                        <h4 class="box-title">Daftar Video Anda</h4>
                    </div>
                    <div class="card-body--">
                        <div class="table-stats order-table ov-h">
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
                                        <th>Judul Video</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse($video as $query)
                                        @if ($query->bayar->mentor_id == Auth::user()->id)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $query->bayar->kelas }}</td>
                                                <td>{{ $query->judul }}</td>
                                                <td>
                                                    <a href="{{ route('amentor.video.edit',$query->id) }}">
                                                        <button class="btn btn-warning btn-sm"><i class="fa fa-pencil"></i></button>
                                                    </a>
                                                    <form action="{{ route('amentor.video.destroy', $query->id) }}" method="post" class="d-inline">
                                                        @csrf
                                                        @method('delete')
                                                        <button class="btn btn-danger btn-sm">
                                                            <i class="fa fa-trash"></i>
                                                        </button>
                                                    </form>
                                                </td>
                                            </tr>
                                            @else

                                        @endif
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
            </div>
        </div>
    </div>--}}
<script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
<script>
    $(document).ready(function(){
        $('#products_id').on('change', function(e){
            var target = e.target.value;
            $.get('{{ route('amentor.video.filter') }}?products_id='+target,function(data){
                $('.refreshtable').empty();
                $.each(data, function(index, subObj){
                    if(subObj.judul == undefined){
                        document.querySelector(".refreshtable").innerHTML =
                        `
                        <tr>
                            <td colspan="6" class="text-center p-5">
                                Data tidak tersedia
                            </td>
                        </tr>
                        `;
                    }else{
                        var edit = "{{ route('amentor.video.edit', 'params') }}";
                            edit = edit.replace('params', subObj.id);
                        var hapus = "{{ route('amentor.video.destroy', 'params') }}";
                            hapus = hapus.replace('params', subObj.id);

                        if(subObj.bayar.mentor_id == "{{ Auth::user()->kode_mentor }}"){
                            document.querySelector(".refreshtable").innerHTML +=
                            `
                            <tr>
                                <td class="count"></td>
                                <td>`+subObj.bayar.kelas+`</td>
                                <td>`+subObj.judul+`</td>
                                <td>
                                    <a href="`+edit+`">
                                        <button class="btn btn-warning btn-sm"><i class="far fa-edit" style="color:white;"></i></button>
                                    </a>
                                    <form action="`+hapus+`" method="post" class="d-inline">
                                        @csrf
                                        @method('delete')
                                        <button class="btn btn-danger btn-sm">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                            `;
                        }
                    }
                });
            });
        })
    })
</script>
@endsection
