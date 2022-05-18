@extends('layouts.default')

@section('content')
    <div class="card">
        <div class="card-header">
            <strong>Tambah Video Details</strong>
        </div>
        <div class="card-body card-block">
            <form action="{{ route('videodetails.store') }}" method="post" enctype="multipart/form-data">
                @csrf

                <div class="form-group">
                    <label for="products_id" class="form-control-label">Nama Kelas</label>
                    <select name="products_id" id="products_id" class="form-control @error('products_id') is-invalid @enderror">
                        <option value="">-- Pilih Kelas --</option>
                        @foreach ($kelas as $query)
                            <option value="{{ $query->kelas }}">{{ $query->kelas }}</option>
                        @endforeach
                    </select>
                </div>
                @error('products_id') <div class="text-muted">{{ $message }}</div> @enderror

                <div class="form-group">
                    <label for="video_id" class="form-control-label">Nama Judul</label>
                    <select name="video_id" id="video_id" class="form-control @error('video_id') is-invalid @enderror">
                        {{--@foreach ($video as $query)--}}
                            <option value="">-- Pilih Video --</option>
                        {{--@endforeach--}}
                    </select>
                </div>
                @error('video_id') <div class="text-muted">{{ $message }}</div> @enderror

                <div class="form-group">
                    <label for="nama" class="form-control-label">Nama Video Details</label>
                    <input type="text" name="nama" id="nama" value="{{ old('nama') }}"
                    class="form-control @error('nama') is-invalid @enderror"/>
                </div>
                @error('nama') <div class="text-muted">{{ $message }}</div> @enderror

                <div class="form-group">
                    <label for="file" class="form-control-label">Video Pelajaran</label>
                    <input type="text" name="file" id="file" value="{{ old('file') }}"
                    class="form-control @error('video') is-invalid @enderror"/>
                </div>
                @error('file') <div class="text-muted">{{ $message }}</div> @enderror

                <div class="form-group">
                    <label for="modul" class="form-control-label">Modul Pembelajaran</label>
                    <input type="file" name="modul" id="modul" value="{{ old('modul') }}"
                    class="form-control @error('modul') is-invalid @enderror"/>
                </div>
                @error('modul') <div class="text-muted">{{ $message }}</div> @enderror

                <div class="form-group">
                    <label for="kuis" class="form-control-label">Kuis</label>
                    <br>
                    <label class="kuis">
                        <input type="radio" name="kuis" value="1"
                        class="form-control"/> Ya
                        {{--&nbsp;--}}
                    </label>
                    &nbsp;
                    <label class="kuis">
                        <input type="radio" name="kuis" value="0"
                        class="form-control"
                        style="width:20px;"/> Tidak
                    </label>
                </div>
                @error('kuis') <div class="text-muted">{{ $message }}</div> @enderror

                <div class="form-group" id="linkkuis">
                    <label for="linkkuis" class="form-control-label">Link Kuis</label>
                    <input type="text" name="linkkuis" class="form-control">
                </div>
                @error('linkkuis') <div class="text-muted">{{ $message }}</div> @enderror

                <div class="form-group">
                    <label for="number" class="form-control-label">Number Video</label>
                    <input type="text" name="number" id="number" class="form-control">
                </div>
                @error('is_default') <div class="text-muted">{{ $message }}</div> @enderror

                <div class="form-group">
                    <button class="btn btn-primary btn-block" type="submit">
                        Tambah Data
                    </button>
                </div>
            </form>
        </div>
    </div>

    <script
        src="https://code.jquery.com/jquery-3.5.1.js"
        integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc="
        crossorigin="anonymous"></script>

    <script>
        $('#products_id').on('change',function(e){
            console.log(e);
            var video = e.target.value;
            $.get('{{ route('videodetails.dropdown') }}?products_id='+video,function(data){
                //console.log(data);
                $('#video_id').empty();
                $.each(data, function(index, subObj){
                    $('#video_id').append('<option value="'+subObj.id+'">'+subObj.judul+'</option>');
                });
            });
        });

        $(document).ready(function(){
            //alert('1');
            $('.kuis').change(function(){
                //input:radio[name=gender][value=Male]
                var selectedKuis = $(this).children('input[name="kuis"]:checked').val();
                //alert(selectedKonsul);
                if(selectedKuis == '1')
                {
                    //prompt(selectedKonsul);
                    $('#linkkuis').show();
                }
                if(selectedKuis == '0')
                {
                    //prompt(selectedKonsul);
                    $('#linkkuis').hide();
                }
            });
        });

        //$('#kategori').on('change',function(e){
        //    console.log(e);
        //    var topik = e.target.value;
        //    $.get('{{ route('kelas.dropdown') }}?kategori_id='+topik,function(data){
        //        // console.log(data);
        //        $('#topik').empty();
        //        $.each(data, function(index, subObj){
        //            $('#topik').append('<option value="'+subObj.id+'">'+subObj.topik+'</option>');
        //        });
        //    });
        //});
    </script>
@endsection
