@extends('layouts.default')

@section('content')
    <div class="card">
        <div class="card-header">
            <strong>Edit VideoDetails Dari Kelas'<small>{{ $video->products_id }}</small>'</strong>
        </div>
        <div class="card-block card-body">
            <form action="{{ route('videodetails.update',$video->id) }}" method="post" enctype="multipart/form-data">
                @method('put')
                @csrf

                <div class="form-group">
                    <label for="products_id" class="form-control-label">Nama Kelas</label>
                    <select name="products_id" id="products_id" class="form-control @error('products_id') is-invalid @enderror">
                        <option value="" disabled selected>-- Pilih Kelas --</option>
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
                    <input type="text" name="nama" id="nama" value="{{$video->nama}}"
                    class="form-control @error('nama') is-invalid @enderror">
                </div>
                @error('nama') <div class="text-muted">{{ $message }}</div> @enderror

                <div class="form-group">
                    <label for="file" class="form-control-label">Video Pelajaran</label>
                    <input type="text" name="file" id="file" value="{{ $video->file }}"
                    class="form-control @error('video') is-invalid @enderror"/>
                </div>
                @error('file') <div class="text-muted">{{ $message }}</div> @enderror
                    <iframe width="300" height="100" src="https://www.youtube.com/embed/{{ $video->file }}" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>

                <div class="form-group">
                    <label for="modul" class="form-control-label">Modul Pembelajaran</label>
                    <input type="file" name="modul" id="modul" value="{{ old('modul') }}"
                    class="form-control @error('modul') is-invalid @enderror"/>
                </div>
                @error('modul') <div class="text-muted">{{ $message }}</div> @enderror

                <!-- Button trigger modal -->
                <button type="button" class="btn btn-secondary" data-toggle="modal" data-target="#exampleModalScrollable">
                    {{ $video->namamodul }}
                </button>

                <!-- Modal -->
                <div class="modal fade bd-example-modal-lg" id="exampleModalScrollable" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
                    <div class="modal-dialog modal-lg modal-dialog-scrollable" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalScrollableTitle">Modal title</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        </div>
                        <div class="modal-body">
                            <iframe src="{{ asset('/storage/'.$video->modul) }}" style="border:none; width:100%; height:700px;"></iframe>
                        </div>
                        <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        {{--<a href="{{ asset('/storage/'.$videodetails->modul) }}" class="btn btn-primary" download="{{ $videodetails->namamodul }}">Download</a>--}}
                        </div>
                    </div>
                    </div>
                </div>

                <div class="form-group">
                    <label for="number" class="form-control-label">Number Video</label>
                    <input type="text" name="number" id="number" class="form-control" value="{{ $video->number }}">
                </div>
                @error('is_default') <div class="text-muted">{{ $message }}</div> @enderror

                <div class="form-group">
                    <button class="btn btn-primary btn-block" type="submit">
                        Update Video Details
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
    </script>
@endsection
