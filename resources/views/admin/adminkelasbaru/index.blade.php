@extends('layouts.default')

@section('content')
{{-- <center> --}}
{{-- </center> --}}
    <div class="orders">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="box-title">Daftar Kelas</h4>
                    </div>
                    <div class="card-body">
                        {{--<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <td>File</td>
                                    <td>Kelas</td>
                                </tr>
                            </thead>
                        </table>--}}

                        {{--<div class="table-responsive">
                            <table class="table">
                              <thead>
                                  <tr>
                                      <th>Name</th>
                                      <th>Name</th>
                                      <th>Name</th>
                                      <th>Name</th>
                                      <th>Name</th>
                                      <th>Name</th>
                                      <th>Name</th>
                                      <th>Name</th>
                                      <th>Name</th>
                                      <th>Name</th>
                                      <th>Name</th>
                                      <th>Name</th>
                                      <th>Name</th>
                                      <th>Name</th>
                                      <th>Name</th>
                                      <th>Name</th>
                                      <th>Name</th>
                                      <th>Name</th>
                                      <th>Name</th>
                                      <th>Name</th>
                                      <th>Name</th>
                                      <th>Name</th>
                                      <th>Name</th><th>Name</th>

                                      <th>Name</th>
                                      <th>Name</th>
                                      <th>Name</th><th>Name</th>
                                      <th>Name</th>
                                      <th>Name</th>
                                      <th>Name</th>
                                  </tr>
                              </thead>
                              <tbody>
                                  <tr>
                                      <td>Petrick</td>
                                  </tr>
                              </tbody>
                            </table>
                        </div>--}}

                        <div class="table-stats table-responsive"> {{-- class awal : table-stats order-table ov-h --}}
                            @if(session('success'))
                                <div class="alert alert-success">
                                    {{ session('success') }}
                                </div>
                            @endif
                            <table class="table table-hover" id="dataTable" width="100%">
                                <thead>
                                    <tr>
                                        <th>File</th>
                                        <th>Kelas</th>
                                        <th>Deskripsi</th>
                                        <th>Jenis</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($kelas as $query)
                                        <tr>
                                            <td class="align-middle"><img src="{{asset('/storage/'.$query->file)}}" alt="gam"></td>
                                            <td class="align-middle">{{$query->kelas}}</td>
                                            <td class="align-middle">{!! $query->deskripsi !!}</td>
                                            <td class="align-middle">{{ $query->jenis }}</td>
                                            <td>
                                                @if ($query->status == 'PENDING')
                                                    <span class="badge badge-info">{{ $query->status }}</span>
                                                @elseif($query->status == 'PUBLISH')
                                                    <span class="badge badge-success">{{ $query->status }}</span>
                                                @elseif($query->status == 'REQUEST')
                                                    <span class="badge badge-primary">{{ $query->status }}</span>
                                                @else
                                                    <span class="badge badge-danger">{{ $query->status }}</span>
                                                @endif
                                            </td>
                                            <td class="align-middle">
                                                <a
                                                    href="#mymodal2"
                                                    data-remote="{{ route('adminkelasbaru.show', $query->id) }}"
                                                    data-toggle="modal"
                                                    data-target="#mymodal2"
                                                    data-title="Detail Kelas {{ $query->kelas }}"
                                                    class="btn btn-primary">
                                                        <i class="fa fa-eye"></i>
                                                </a>
                                                {{--<a href="{{ route('adminkelasbaru.show',$query->id) }}">coba</a>--}}
                                                <a href="{{ route('adminkelasbaru.gallery', $query->slug) }}" class="btn btn-info">
                                                    <i class="fa fa-video-camera"></i>
                                                </a>
                                                <a href="{{ route('adminkelasbaru.edit', $query->id) }}" class="btn btn-warning">
                                                    <i class="fa fa-pencil"></i>
                                                </a>
                                                <form action="{{ route('adminkelasbaru.destroy', $query->id) }}" method="post" class="d-inline">
                                                    @method('delete')
                                                    @csrf
                                                    <button type="submit" class="btn btn-danger">
                                                        <i class="fa fa-trash"></i>
                                                    </button>
                                                </form>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="6" class="align-middle text-center p-5">
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
    </div>
    {{-- <div class="container-fluid">
        <div class="row">
            <div class="col-sm-8">
                Halaman : {{ $kelas->currentPage() }} <br>
                Jumlah Data : {{ $kelas->total() }} <br>
                Data Per Halaman : {{ $kelas->perPage() }} <br>
                {{ $kelas->links() }}
            </div>
            <div class="col-sm-2"></div>
        </div>
    </div> --}}
@endsection
