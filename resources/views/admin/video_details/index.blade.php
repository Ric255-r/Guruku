@extends('layouts.default')

@section('content')
    <div class="orders">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="box-title">Daftar Video Details</h4>
                        {{--<a href="{{ route('videodetails.create') }}" class="btn btn-info">Tambah Video</a>--}}
                    </div>
                    <div class="card-body">
                        <div class="table-stats">
                            @if(session('success'))
                                <div class="alert alert-success">
                                    {{ session('success') }}
                                </div>
                            @endif
                            <table class="table table-hover table-responsive-sm" id="dataTable">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Nama Kelas</th>
                                        <th>Nama Judul</th>
                                        <th>Nama</th>
                                        <th>Video</th>
                                        <th>Modul</th>
                                        <th>Number</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($video as $query)
                                        <tr>
                                            <td class="align-middle">{{ $loop->iteration }}</td>
                                            <td class="align-middle">{{ @$query->video->bayar->kelas }}</td> {{-- $query->video->bayar->kelas --}}
                                            <td class="align-middle">{{ @$query->video->judul }}</td>
                                            {{--<td>{{ $query->video->nama_video }}</td>--}}
                                            <td class="align-middle">{{ $query->nama }}</td>
                                            <td class="align-middle">
                                                <iframe width="300" height="100" src="https://www.youtube.com/embed/{{ $query->file }}" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                                                {{--<video style="width:300px; height:100px" controls>
                                                    <source src="{{ url('/storage/'.$query->file) }}" type="video/mp4">
                                                    Your browser does not support the video tag.
                                                </video>--}}
                                            </td>
                                            <td class="align-middle">
                                                @if($query->namamodul == null)
                                                    -
                                                @else
                                                    {{ $query->namamodul }}
                                                @endif
                                            </td>
                                            <td class="align-middle">{{ $query->number }}</td>
                                            <td class="align-middle">
                                                <a href="{{ route('videodetails.edit',$query->id) }}" class="btn btn-warning btn-sm">
                                                    <i class="fa fa-pencil"></i>
                                                </a>
                                                @if ($query->modul == null)

                                                @else
                                                    <a href="{{ route('videodetails.show',$query->id) }}" class="btn btn-info btn-sm"><i class="fa fa-eye"></i></a>
                                                @endif
                                                <form action="{{ route('videodetails.destroy',$query->id) }}" method="post" class="d-inline">
                                                    @csrf
                                                    @method('delete')
                                                    <button class="btn btn-danger btn-sm">
                                                        <i class="fa fa-trash"></i>
                                                    </button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
