@extends('layouts.default')

@section('content')
    <div class="card">
        <div class="card-header">
            <strong>Tambah Kelas</strong>
        </div>
        <div class="card-body card-block">
            @if(count($errors) > 0)
				<div class="alert alert-danger">
					@foreach ($errors->all() as $error)
					{{ $error }} <br/>
					@endforeach
				</div>
			@endif
            <form action="{{ route('adminkelasbaru.store') }}" method="post" enctype="multipart/form-data">
                @csrf
                    <div class="form-group">
                        <label for="file" class="form-control-label">Gambar</label>
                        <input type="file" name="file" id="file" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="kelas" class="form-control-label">Kelas</label>
                        <input type="text" name="kelas" id="kelas" class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="mentor_id" class="form-control-label">Mentor</label>
                        <select name="mentor_id" class="form-control @error('mentor_id') is-invalid @enderror">
                            @foreach ($mentor as $query)
                                <option value="{{ $query->kode_mentor }}">{{ $query->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    @error('mentor_id') <div class="text-muted">{{ $message }}</div> @enderror

                    <div class="form-group">
                        <label for="tingkatan" class="form-control-label sertifikat">
                            Apakah Kelas ini dibuat untuk Pemula ? 
                        </label>
                        <label class="radio-inline form-control sertifikat">
                            <input type="radio" name="tingkat" value="Pemula">Ya
                        </label>
                        <label class="radio-inline form-control sertifikat">
                            <input type="radio" name="tingkat" value="Lanjutan">Tidak
                        </label>
                    </div>
                    <div class="form-group">
                        <label for="materi">Materi</label>
                        <select name="materi" id="materi" class="form-control">
                            <option value="SD">SD</option>
                            <option value="SMP">SMP</option>
                            <option value="SMA SMK">SMA / SMK</option>
                            <option value="Semua Tingkatan">Semua Tingkatan</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="kategori" class="form-control-label">Kategori</label>
                        <select name="kategori" id="kategori" class="form-control">
                            <option value="" disabled selected>-- Pilih Kategori --</option>
                            @foreach ($kategori as $query)
                                <option value="{{ $query->kategori }}">{{ $query->kategori }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="topik" class="form-control-label">Topik</label>
                        <select name="topik" id="topik" class="form-control">
                            <option value="">-- Pilih Topic --</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="deskripsi" class="form-control-label">Deskripsi</label>
                        <textarea name="deskripsi" id="deskripsi" class="ckeditor form-control"></textarea>
                    </div>
                    {{-- @if ($kelas->jenis == 'gratis')

                    @endif --}}
                    <div class="form-group"> {{-- harus bikin gratis bayar paket di db baru --}}
                        <label for="jenis" class="form-control-label">Jenis</label>
                        <select id="jenis" class="form-control" name="jenis">
                            <option value="">-- Pilih Jenis --</option>
                            <option value="gratis">Gratis</option>
                            <option value="premium">premium</option>
                            {{--<option value="paket">Paket</option>--}}
                        </select>
                    </div>

                    <div class="form-group" id="harga">
                        <label for="harga" class="form-control-label">Harga</label>
                        <input type="text" name="harga" id="harga" value="0" class="form-control">
                    </div>

                    {{-- <div class="form-group">
                        <label for="konsultansi" class="form-control-label">Konsultasi</label>
                        <br>
                        <label class="konsultansi">
                            <input type="radio" name="konsultansi" value="1"
                            class="form-control"/> Ya
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
                    </div> --}}

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
                    <div class="form-group">
                        <label for="status" class="form-control-label">Status</label>
                        <select name="status" id="status" class="form-control">
                            <option value="">-- Status --</option>
                            <option value="PENDING">PENDING</option>
                            <option value="PUBLISH">PUBLISH</option>
                        </select>
                    </div>
                <button type="submit" class="btn btn-primary form-control" value="Submit">Tambah Data</button>
            </form>
        </div>
    </div>

    <script
        src="https://code.jquery.com/jquery-3.5.1.js"
        integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc="
        crossorigin="anonymous"></script>
    <script>
        // const jenis = document.getElementById('jenis').value;

        // if(jenis == 'bayar')
        // {
        //     document.getElementById('harga').style.display = 'none';
        // }

        $(document).ready(function(){
            //alert('1');
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

        // $(function(){
            // $('#kategori').on('change',function(){
                // axios.post('{{ route('kelas.dropdown') }}', {id: $(this).val()})
                    // .then(function(response){
                    //     $('#topik').empty();

                    //     $.each(response.data, function(id,topik){
                    //         $('#topik').append(new Option(kategori))
                    //     });
                    // });
            // });
        // });

        // $(document).ready(function(){
        //     $("select#kategori").change(function(){
        //         $gori = $kategori->kategori == 'Teknologi Informasi';
        //         var selectedKategori = $(this).children("option:selected").val();
        //         if(selectedKategori == gori)
        //         {
        //             $("#topik").append(`
        //                 <option value="">aljabar</option>
        //                 <option value="">determinan</option>
        //             `)
        //         }
        //         if(selectedKategori == 'fisika')
        //         {
        //             $("#topik").append(`
        //                 <option value="">elektrik</option>
        //                 <option value="">volt</option>
        //             `)
        //         }
        //     });
        // });
    </script>
@endsection
