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
                <h1 class="mt-4">Modul</h1>
                <ol class="breadcrumb mb-4 align-middle">
                    <li class="breadcumb-item mt-1 align-middle">Modul / </li>
                    <li class="align-middle">
                        <select name="products_slug" id="products_slug" class="form-control mx-2">
                            <option value="">--Pilih Kelas--</option>
                            @foreach ($kelas as $item)
                                <option value="{{ $item->slug }}">{{ $item->kelas }}</option>
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
                                    <th>Products Name</th>
                                    <th>Video ID</th>
                                    <th>Video Details ID</th>
                                    <th>Nama Modul</th>
                                    <th>File</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody class="refreshtable">
                                <?php $i=1 ?>
                                @foreach ($modul as $query)
                                    @if ($query->kode_mentor == Auth::user()->kode_mentor)
                                        <tr>
                                            <td>{{ $i++ }}</td>
                                            <td>{{ $query->products_id }}</td>
                                            <td>{{ $query->vidi->judul }}</td>
                                            <td>{{ $query->details->nama }}</td>
                                            <td>{{ $query->nama_modul }}</td>
                                            <td>
                                                <a href="{{ asset('/storage/'.$query->file) }}" download="{{ $query->nama_modul }}">{{ $query->nama_modul }}</a>
                                            </td>
                                            <td>
                                                <a href="{{ route('amentor.modul.edit',$query->id) }}" class="btn btn-warning btn-sm">
                                                    <i class="fas fa-edit text-white"></i>
                                                </a>
                                                <form action="{{ route('amentor.modul.destroy',$query->id) }}" method="post" class="form-inline d-inline">
                                                    @csrf
                                                    @method('delete')
                                                    <button class="btn btn-danger btn-sm">
                                                        <i class="fas fa-trash "></i>
                                                    </button>
                                                </form>
                                            </td>
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

<script
        src="https://code.jquery.com/jquery-3.5.1.js"
        integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc="
        crossorigin="anonymous">
    </script>
<script>
    $("#products_slug").on('change', function(e){
        let target = e.target.value;
        $.get('{{ route('amentor.modul.getKelas') }}?products_slug='+target, function(data){
            $('.refreshtable').empty();
            $.each(data, function(index, subObj){
                if(subObj.products_id == undefined){
                    document.querySelector('.refreshtable').innerHTML = 
                    `
                    <tr>
                        <td colspan="7" class="text-center">Data Tidak Tersedia</td>
                    </tr>
                    `;
                }else{
                    let flink = "{{ asset('/storage/'.'params') }}";
                        flink = flink.replace('params', subObj.file);
                    let uplink = "{{ route('amentor.modul.edit','params') }}";
                        uplink = uplink.replace('params', subObj.id);
                    let dellink = "{{ route('amentor.modul.destroy','params') }}";
                        dellink = dellink.replace('params', subObj.id);
                    document.querySelector('.refreshtable').innerHTML += 
                    `
                    <tr>
                        <td class="count"></td>
                        <td>`+subObj.products_id+`</td>
                        <td>`+subObj.judul+`</td>
                        <td>`+subObj.nama+`</td>
                        <td>`+subObj.nama_modul+`</td>
                        <td>
                            <a href="`+flink+`" download="`+subObj.nama_modul+`">`+subObj.nama_modul+`</a>
                        </td>
                        <td>
                            <a href="`+uplink+`" class="btn btn-warning btn-sm">
                                <i class="fas fa-edit text-white"></i>
                            </a>
                            <form action="`+dellink+`" method="post" class="form-inline d-inline">
                                @csrf
                                @method('delete')
                                <button class="btn btn-danger btn-sm">
                                    <i class="fas fa-trash "></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                    `;
                }
            });
        });
    });

</script>
@endsection
