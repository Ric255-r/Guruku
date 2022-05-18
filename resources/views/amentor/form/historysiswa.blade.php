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
                <h1 class="mt-4">Nilai Kuis Siswa Anda</h1>
                <ol class="breadcrumb mb-4">
                    <li class="breadcrumb-item active">Daftar Nilai</li>
                    <li class="breadcrumb-item">
                        <select name="kuis" id="kuis" class="form-control kuis mx-2">
                            <option value="">--Pilih Mapel--</option>
                            @foreach ($kuis as $item)
                                <option value="{{ $item->id }}">{{ $item->nama_kuis }}</option>
                            @endforeach
                        </select>
                    </li>
                </ol>
                <div class="row">
                    <div class="col-lg-12">
                        <table class="table table-striped table-responsive-md">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Username</th>
                                    <th>Nama Kuis</th>
                                    <th>Kategori</th>
                                    <th>Topik</th>
                                    <th>Nilai User</th>
                                    <th>Waktu Kerja</th>
                                </tr>
                            </thead>
                            <tbody class="refreshtable">
                                @foreach ($show as $indexkey => $item)
                                    <tr>
                                        <td>{{ $indexkey+1 }}</td>
                                        <td>{{ $item->username }}</td>
                                        <td>{{ $item->nama_kuis}}</td>
                                        <td>{{ $item->kategori }}</td>
                                        <td>{{ $item->topic }}</td>
                                        @if ($item->nilai_awal <= 70 && $item->nilai_akhir == null)
                                            {{-- pertamakali --}}
                                            <td>{{ $item->nilai_awal}}</td>
                                            <td>{{ $item->waktukerja_awal }}</td>
                                        @elseif($item->nilai_awal <= 70 && $item->nilai_akhir != null)
                                            {{-- remed --}}
                                            <td>{{ $item->nilai_akhir}} (R) </td>
                                            <td>{{ $item->waktukerja_akhir }}</td>
                                        @elseif($item->nilai_awal >= 70 && $item->nilai_akhir == null)
                                            {{-- pertamakali --}}
                                            <td>{{ $item->nilai_awal}}</td>
                                            <td>{{ $item->waktukerja_awal }}</td>
                                        @elseif($item->nilai_awal >= 70 && $item->nilai_akhir != null)
                                            {{-- modified --}}
                                            <td>{{ $item->nilai_akhir}} (M) </td>
                                            <td>{{ $item->waktukerja_akhir }}</td>
                                        @endif
                                        {{-- @if ($item->nilai_akhir == null)
                                            <td>{{ $item->nilai_awal }}</td>
                                            <td>{{ $item->waktukerja_awal }}</td>
                                        @else
                                            <td>{{ $item->nilai_akhir}} (R)</td>
                                            <td>{{ $item->waktukerja_akhir }}</td>
                                        @endif --}}
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

<script>
    $('#kuis').on('change',function(e){
        console.log(e);
        var target = e.target.value;
        $.get('{{ route('amentor.kuis.filterhistory') }}?id_kuis='+target, function(data){
            $('.refreshtable').empty();
            $.each(data, function(index, subObj){
                if(subObj.nama_kuis != undefined){
                    if(subObj.nilai_awal <= 70 && subObj.nilai_akhir == null){
                        // pertamakali
                        var nilai = 
                        `
                            <td>`+subObj.nilai_awal+`</td>
                            <td>`+subObj.waktukerja_awal+`</td>
                        `;
                    }else if(subObj.nilai_awal <= 70 && subObj.nilai_akhir != null){
                        // remed
                        var nilai = 
                        `
                            <td>`+subObj.nilai_akhir+` (R)</td>
                            <td>`+subObj.waktukerja_akhir+`</td>
                        `;
                    }else if(subObj.nilai_awal >= 70 && subObj.nilai_akhir == null){
                        // pertamakali
                        var nilai = 
                        `
                            <td>`+subObj.nilai_awal+`</td>
                            <td>`+subObj.waktukerja_awal+`</td>
                        `;
                    }else if(subObj.nilai_awal >= 70 && subObj.nilai_akhir != null){
                        // modified
                        var nilai = 
                        `
                            <td>`+subObj.nilai_akhir+` (M)</td>
                            <td>`+subObj.waktukerja_akhir+`</td>
                        `;
                    }
                    document.querySelector('.refreshtable').innerHTML +=
                    `
                        <tr>
                            <td class="count"></td>
                            <td>`+subObj.username+`</td>
                            <td>`+subObj.nama_kuis+`</td>
                            <td>`+subObj.kategori+`</td>
                            <td>`+subObj.topic+`</td>
                            `+nilai+`
                        </tr>
                    `;
                }else{
                    document.querySelector('.refreshtable').innerHTML =
                    `
                        <tr>
                            <td colspan="7" class="text-center">Data Tidak Tersedia</td> 
                        </tr>
                    `;
                }
            });
        });
    });
</script>



@endsection
