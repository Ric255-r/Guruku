@extends('includes.amentor.app')

@section('content')

    <div id="layoutSidenav_content">
        <main>
            <div class="container-fluid">
                <h1 class="mt-4">Isi Kriteria Kuis</h1>
                <br>
                <div class="row">
                    <div class="col-lg-12">
                        <form action="{{ route('amentor.kuis.store')}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('POST')
                            @if ($errors->has('gambar'))
                                <div class="col-sm-12">
                                    <div class="alert alert-success alert-dismissable">
                                        <a href="#" id="alertclose" class="close" data-dismiss="alert" aria-label="close"><b>x</b></a>
                                        <strong style="color:#242424;">Gambar Harus Format jpg,bmp,png</strong>
                                    </div>
                                </div>                            
                            @endif
                            <div class="col-sm-12">
                                <label for="Gambar">Gambar</label>
                                <input type="file" name="gambar" id="gambar" class="form-control" required>
                            </div>
                            <div class="col-sm-12">
                                <label for="Nama_kuis">Nama Kuis</label>
                                <input type="text" name="nama_kuis" id="nama_kuis" class="form-control">
                            </div>
                            <div class="col-sm-12">
                                <label for="deskripsi">Deskripsi</label>
                                <textarea name="deskripsi" id="deskripsi" cols="30" rows="10" class="form-control"></textarea>
                                {{-- <input type="text" name="deskripsi" id="deskripsi" class="form-control"> --}}
                            </div>
                            <div class="col-sm-12">
                                {{-- <label for="mentor_id">Mentor Id</label> --}}
                                <input type="hidden" name="mentor_id" id="mentor_id" class="form-control" value="{{ Auth::user()->kode_mentor}}">
                            </div>
                            <div class="col-sm-12">
                                <label for="tingkatan">Tingkatan</label>
                                {{-- <input type="text" name="tingkatan" id="tingkatan" class="form-control"> --}}
                                <select name="tingkatan" id="tingkatan" class="form-control">
                                    <option value="">--Pilih Tingkatan--</option>
                                    <option value="Easy">Easy</option>
                                    <option value="Medium">Medium</option>
                                    <option value="Hard">Hard</option>
                                </select>
                            </div>
                            <div class="col-sm-12">
                                <label for="Kategori">Kategori</label>
                                <select name="kategori" id="kategori" class="form-control">
                                    <option value="">-- Pilih Kategori --</option>
                                    @foreach ($kategori as $item)
                                    <option value="{{ $item->kategori }}" class="">{{ $item->kategori}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-sm-12">
                                <label for="Topik">Topik</label>
                                <select name="topic" id="subcategory" class="form-control">

                                </select>
                            </div>
                            <div class="col sm 12">
                                <label for="jenis">Jenis</label>
                                <select name="jenis" id="jenis" class="form-control">
                                    <option value="" selected="true" disabled>--Pilih Jenis Kuis--</option>
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
                            {{-- <div class="col-sm-12">
                                <label for="Status">Status</label>
                                <input type="text" name="status" id="status" class="form-control">
                            </div> --}}
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
{{--<script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>--}}

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
