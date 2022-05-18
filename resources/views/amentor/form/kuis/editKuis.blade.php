@extends('includes.amentor.app')

@section('content')

    <div id="layoutSidenav_content">
        <main>
            <div class="container-fluid">
                <h1 class="mt-4">Edit Kuis Anda</h1>
                <ol class="breadcrumb mb-4">
                    {{-- <li class="breadcrumb-item active">Daftar Soal {{ $soal->kelas }}</li> --}}
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
                        <form action="{{ route('amentor.kuis.updateKuis',$lala->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="col-sm-12">
                                <label for="gambar">Gambar</label>
                                <input type="file" name="gambar" id="gambar" class="form-control">
                            </div>
                            <div class="col-sm-12">
                                <label for="Nama_kuis">Nama Kuis</label>
                                <input type="text" name="nama_kuis" id="nama_kuis" class="form-control" value="{{ $lala->nama_kuis }}">
                            </div>
                            <div class="col-sm-12">
                                <label for="deskripsi">Deskripsi</label>
                                <textarea name="deskripsi" id="deskripsi" cols="30" rows="10" class="form-control">{{ $lala->deskripsi }}</textarea>
                                {{-- <input type="text" name="deskripsi" id="deskripsi" class="form-control" value=""> --}}
                            </div>
                            <div class="col-sm-12">
                                {{-- <label for="mentor_id">Mentor Id</label> --}}
                                <input type="hidden" name="mentor_id" id="mentor_id" class="form-control" value="{{ Auth::user()->kode_mentor}}">
                            </div>
                            <div class="col-sm-12">
                                <label for="">Tingkatan</label>
                                {{-- <input type="text" name="tingkatan" id="tingkatan" class="form-control" value="{{ $lala->tingkatan }}"> --}}
                                <select name="tingkatan" id="tingkatan" class="form-control">
                                    <option value="">--Pilih Tingkatan--</option>
                                    <option value="Easy">Easy</option>
                                    <option value="Medium">Medium</option>
                                    <option value="Hard">Hard</option>
                                </select>
                            </div>

                            <div class="col-sm-12">
                                <label for="Kategori">Kategori</label>
                                <select name="kategori" id="kategori" class="form-control" required>
                                    <option value="">-- Pilih Kategori --</option>
                                    @foreach ($kategori as $item)
                                    <option value="{{ $item->kategori }}" class="">{{ $item->kategori}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-sm-12">
                                <label for="Topik">Topik</label>
                                <select name="topic" id="subcategory" class="form-control" required>
                                    <option value="">--Pilih Kategori Terlebih Dahulu--</option>
                                </select>
                            </div>
                            <div class="col sm 12">
                                <label for="jenis">Jenis</label>
                                <select name="jenis" id="jenis" class="form-control">
                                    <option value="">--Pilih Jenis Kuis--</option>
                                    <option value="kelas">Kelas</option>
                                    <option value="video">Video</option>
                                    <option value="video_akhir">Video Akhir Materi</option>
                                    <option value="lainnya">Lainnya</option>
                                </select>
                            </div>
                            <div class="col-sm-12" id="buatkelas">
                                <label for="Kelas">Kelas</label>
                                <select name="kelas_id" id="kelas_id" class="form-control">
                                
                                </select>
                            </div>
                            <div class="col-sm-12">
                                <label for="Status">Status</label>
                                <select name="status" id="status" class="form-control">
                                    <option value="pending">Pending</option>
                                    <option value="active">Active</option>
                                </select>
                            </div>
                            <br>
                            <div class="col-sm-12">
                                <input type="submit" value="Simpan" class="form-control btn btn-info">
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
    crossorigin="anonymous">
</script>

<script>
    $(document).ready(function(){
        $('#buatkelas').hide();
        $('#kategori').on('change',function(e){
            console.log(e);
            var topik = e.target.value;
            $.get('{{ route('amentor.kuis.ambilTopik') }}?kategori_id='+topik,function(data){
                $('#subcategory').empty();
                $.each(data, function(index, subObj){
                    $('#subcategory').append('<option value="'+subObj.topik+'">'+subObj.topik+'</option>');
                });
            });
        });
        $('#jenis').on('change', function(e){
            var target = e.target.value;
            if(target == "kelas"){
                $.get('{{ route('amentor.kuis.ambilkelas') }}', function(data){
                    $('#kelas_id').empty();
                    $.each(data, function(index, subObj){
                        $('#buatkelas').show();
                        $('#kelas_id').append(`<option value="`+subObj.id+`">`+subObj.kelas+`</option>`);
                    });
                });
            }else if(target == "video_akhir"){
                $.get('{{ route('amentor.kuis.ambilkelas') }}', function(data){
                    $('#kelas_id').empty();
                    $.each(data, function(index, subObj){
                        $('#buatkelas').show();
                        $('#kelas_id').append(`<option value="`+subObj.id+`">`+subObj.kelas+`</option>`);
                    });
                });
            }else if(target == "video"){
                $.get('{{ route('amentor.kuis.ambilkelas') }}', function(data){
                    $('#kelas_id').empty();
                    $.each(data, function(index, subObj){
                        $('#buatkelas').show();
                        $('#kelas_id').append(`<option value="`+subObj.id+`">`+subObj.kelas+`</option>`);
                    });
                });
            }else{
                $('#kelas_id').empty();
                $('#buatkelas').hide();            
            }
        });
    })
</script>



@endsection
