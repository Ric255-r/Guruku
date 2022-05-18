@extends('includes.amentor.app')

@section('content')

    <div id="layoutSidenav_content">
        <main>
            <div class="container-fluid">
                <h1 class="mt-4">Kelas</h1>
                <ol class="breadcrumb mb-4">
                    <li class="breadcrumb-item active">Edit Kelas</li>
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
                        <form action="{{ route('amentor.kelas.update', $kelas->id) }}"
                            method="POST" enctype="multipart/form-data">
                            @method('patch')
                            @csrf
                            <div class="form-group">
                                <label for="file" class="form-control-label">File</label>
                                <input type="file" name="file" id="file" class="form-control">
                                <img src="{{ asset('/storage/'.$kelas->file) }}" alt="" width="100px" height="100px">
                            </div>
                            <div class="form-group" hidden>
                                <label for="kelas" class="form-control-label">Kelas</label>
                                <input type="text" name="kelas" id="kelas" class="form-control" value="{{$kelas->kelas}}">
                            </div>
                            <div class="form-group" hidden>
                                <label for="tingkat" class="form-control-label">Tingkatan</label>
                                <input type="text" name="tingkat" id="tingkat" value="{{ $kelas->tingkat }}">
                            </div>
                            <div class="form-group" hidden>
                                <label for="kategori" class="form-control-label">Kategori</label>
                                <input type="text" name="kategori" id="kategori" value="{{ $kelas->kategori }}">
                            </div>
                            <div class="form-group" hidden>
                                <label for="topik" class="form-control-label">Topik</label>
                                <input type="text" name="topik" id="topik" value="{{ $kelas->topik }}">
                            </div>
                            <div class="form-group" hidden>
                                <label for="mentor_id" class="form-control-label">Mentor</label>
                                <input type="text" name="mentor_id" id="mentor_id" value="{{ $kelas->mentor_id }}">
                            </div>
                            <div class="form-group">
                                <label for="deskripsi" class="form-control-label">Deskripsi</label>
                                <textarea name="deskripsi" id="deskripsi" class="form-control">{{$kelas->deskripsi}}</textarea>
                            </div>
                            <div class="form-group" hidden>
                                <label for="jenis" class="form-control-label">Jenis</label>
                                <input type="text" name="jenis" id="jenis" value="{{ $kelas->jenis }}">
                            </div>
                            <div class="form-group" id="harga" hidden>
                                <label for="harga" class="form-control-label">Harga</label>
                                <input type="text" name="harga" class="form-control" value="{{ $kelas->harga }}">
                            </div>
                            <div class="form-group">
                                <label for="konsultansi" class="form-control-label">Konsultasi</label>
                                <br>
                                <label class="konsultansi">
                                    <input type="radio" name="konsultansi" value="1"
                                    class="form-control"/> Ya
                                    {{--&nbsp;--}}
                                </label>
                                &nbsp;
                                <label class="konsultansi">
                                    <input type="radio" name="konsultansi" value="0"
                                    class="form-control"
                                    style="width:20px;"/> Tidak
                                </label>
                            </div>
                            <div class="form-group" id="link_kon">
                                <label for="link_konsul" class="form-control-label">Link Konsultansi</label>
                                <input type="text" class="form-control" name="link_konsul" id="link_konsul">
                            </div>
                            <div class="form-group">
                                <label for="sertifikat" class="form-control-label">Sertifikat</label>
                                <br>
                                <label>
                                    <input type="radio" name="sertifikat" value="1"
                                    class="form-control"/> Ya
                                </label>
                                &nbsp;
                                <label>
                                    <input type="radio" name="sertifikat" value="0"
                                    class="form-control"
                                    style="width:20px;"/> Tidak
                                </label>
                            </div>
                            <button type="submit" class="btn btn-primary form-control">Ubah Data</button>
                        </form>
                    </div>
                </div>
            </div>
        </main>
        <footer class="py-4 bg-light mt-auto">
            <div class="container-fluid">
                <div class="d-flex align-items-center justify-content-between small">
                    <div class="text-muted">Copyright &copy; Your Website 2020</div>
                    <div>
                        <a href="#">Privacy Policy</a>
                        &middot;
                        <a href="#">Terms &amp; Conditions</a>
                    </div>
                </div>
            </div>
        </footer>
    </div>



    {{--<div class="card">
        <div class="card-header">
            <strong>Edit Kelas {{ $kelas->jenis }}</strong>
        </div>
        <div class="card-block card-body">
            @if(count($errors) > 0)
				<div class="alert alert-danger">
					@foreach ($errors->all() as $error)
					{{ $error }} <br/>
					@endforeach
				</div>
			@endif
            <form action="{{ route('amentor.kelas.update', $kelas->id) }}"
                method="POST" enctype="multipart/form-data">
                @method('patch')
                @csrf
                <div class="form-group">
                    <label for="file" class="form-control-label">File</label>
                    <input type="file" name="file" id="file" class="form-control">
                    <img src="{{ asset('/storage/'.$kelas->file) }}" alt="" width="100px" height="100px">
                </div>
                <div class="form-group" hidden>
                    <label for="kelas" class="form-control-label">Kelas</label>
                    <input type="text" name="kelas" id="kelas" class="form-control" value="{{$kelas->kelas}}">
                </div>
                <div class="form-group" hidden>
                    <label for="tingkat" class="form-control-label">Tingkatan</label>
                    <input type="text" name="tingkat" id="tingkat" value="{{ $kelas->tingkat }}">
                </div>
                <div class="form-group" hidden>
                    <label for="kategori" class="form-control-label">Kategori</label>
                    <input type="text" name="kategori" id="kategori" value="{{ $kelas->kategori }}">
                </div>
                <div class="form-group" hidden>
                    <label for="topik" class="form-control-label">Topik</label>
                    <input type="text" name="topik" id="topik" value="{{ $kelas->topik }}">
                </div>
                <div class="form-group" hidden>
                    <label for="mentor_id" class="form-control-label">Mentor</label>
                    <input type="text" name="mentor_id" id="mentor_id" value="{{ $kelas->mentor_id }}">
                </div>
                <div class="form-group">
                    <label for="deskripsi" class="form-control-label">Deskripsi</label>
                    <textarea name="deskripsi" id="deskripsi" class="form-control">{{$kelas->deskripsi}}</textarea>
                </div>
                <div class="form-group" hidden>
                    <label for="jenis" class="form-control-label">Jenis</label>
                    <input type="text" name="jenis" id="jenis" value="{{ $kelas->jenis }}">
                </div>
                <div class="form-group" id="harga" hidden>
                    <label for="harga" class="form-control-label">Harga</label>
                    <input type="text" name="harga" class="form-control" value="{{ $kelas->harga }}">
                </div>
                <div class="form-group">
                    <label for="konsultansi" class="form-control-label">Konsultansi</label>
                    <br>
                    <label>
                        <input type="radio" name="konsultansi" value="1"
                        class="form-control"/> Ya
                    </label>
                    &nbsp;
                    <label>
                        <input type="radio" name="konsultansi" value="0"
                        class="form-control"
                        style="width:20px;"/> Tidak
                    </label>
                </div>
                <div class="form-group">
                    <label for="sertifikat" class="form-control-label">Sertifikat</label>
                    <br>
                    <label>
                        <input type="radio" name="sertifikat" value="1"
                        class="form-control"/> Ya
                    </label>
                    &nbsp;
                    <label>
                        <input type="radio" name="sertifikat" value="0"
                        class="form-control"
                        style="width:20px;"/> Tidak
                    </label>
                </div>
                <button type="submit" class="btn btn-primary form-control">Ubah Data</button>
            </form>
        </div>
    </div>--}}


    <script
        src="https://code.jquery.com/jquery-3.5.1.js"
        integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc="
        crossorigin="anonymous"></script>
    <script>
        $(document).ready(function(){
            $('.konsultansi').change(function(){
                //input:radio[name=gender][value=Male]
                var selectedKonsul = $(this).children('input[name="konsultansi"]:checked').val();
                //alert(selectedKonsul);
                if(selectedKonsul == '1')
                {
                    //prompt(selectedKonsul);
                    $('#link_kon').show();
                }
                if(selectedKonsul == '0')
                {
                    //prompt(selectedKonsul);
                    $('#link_kon').hide();
                }
            });

            $("select#jenis").change(function(){
                var selectedJenis = $(this).children("option:selected").val();
                if(selectedJenis == 'gratis')
                {
                    // $('#harga').val(0);
                    // $('#harga').prop('disabled', true);
                    $('#harga').hide();
                }
                if(selectedJenis == 'premium')
                {
                    $('#harga').show();
                }
                //if(selectedJenis == 'paket')
                //{
                //    $('#harga').show();
                //}
            });
        });


        //$(document).ready(function(){
        //    $("select#jenis").change(function(){
        //        var selectedJenis = $(this).children("option:selected").val();
        //        if(selectedJenis == 'gratis')
        //        {
        //            $('#harga').val(0).prop('disabled', true);
        //        }
        //        if(selectedJenis == 'bayar')
        //        {
        //            $('#harga').show().prop('disabled', false);
        //        }
        //        if(selectedJenis == 'paket')
        //        {
        //            $('#harga').show().prop('disabled', false);
        //        }
        //    });
        //});

        $('#kategori').on('change',function(e){
            console.log(e);
            var topik = e.target.value;
            $.get('{{ route('kelas.dropdown') }}?kategori_id='+topik,function(data){
                // console.log(data);
                $('#topik').empty();
                $.each(data, function(index, subObj){
                    $('#topik').append('<option value="'+subObj.topik+'">'+subObj.topik+'</option>');
                });
            });
        });
        //$('#kategori').on('change',function(e){
        //    console.log(e);
        //    var topik = e.target.value;
        //    $.get('{{ route('kelas.dropdown') }}?kategori_id='+topik,function(data){
        //        // console.log(data);
        //        $('#topik').empty();
        //        $.each(data, function(index, subObj){
        //            $('#topik').append('<option value="'+subObj.topik+'">'+subObj.topik+'</option>');
        //        });
        //    });
        //});
    </script>
@endsection
