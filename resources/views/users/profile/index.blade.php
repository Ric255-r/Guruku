@extends('layouts.default2')

@section('content')

    <div class="orders">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h3 class="box-title">Profile Saya</h3>
                        <hr>
                    </div>
                    @if(session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif
                    <div class="card-body">
                        @foreach ($user as $query)
                        {{--{{ $query->name }}--}}
                        {{--assets/users/xtbkY5tf8NWNYRt43CTsLywZm8ufSSOT1PrB2QqV.png--}}
                        <table class="table table-responsive-sm table-borderless">
                            <thead>
                                @if ($query->file == null)
                                    <tr>
                                        <th><img src="{{ URL::asset('/Foto/man.png') }}" style="width:100px; height:100px; border-radius:100px; background-color:#7e7e7e;" alt=""></th>
                                    </tr>
                                    <tr>
                                        <th><a href="{{ route('user.updatefoto.edit',$query->id) }}" class="btn btn-primary btn-sm">Upload foto</a></th>
                                    </tr>
                                    @else
                                    <tr>
                                        <th>
                                            <img src="{{ asset('/storage/'.$query->file) }}" style="width:100px; height:100px; border-radius:100px;" alt="Gambar">
                                        </th>
                                    </tr>
                                    <tr>
                                        <th><a href="{{ route('user.updatefoto.edit',$query->id) }}" class="btn btn-info btn-sm">Ubah Gambar</a></th>
                                    </tr>
                                @endif
                                <tr>
                                    <th>Nama</th>
                                    <td>{{ $query->name }}</td>
                                </tr>
                                <tr>
                                    <th>Email</th>
                                    <td>{{ $query->email }}</td>
                                </tr>
                                <tr>
                                    <th>No Telp</th>
                                    <td>{{ $query->telp }}</td>
                                </tr>
                                <tr>
                                    <th>Bidang</th>
                                    @if ($query->bidang == null)
                                        <td>-</td>
                                        @else
                                        <td>{{ $query->bidang }}</td>
                                    @endif
                                </tr>
                                <tr>
                                    <th>Deskripsi</th>
                                    @if ($query->deskripsi == null)
                                        <td>-</td>
                                        @else
                                        <td>{{ $query->deskripsi }}</td>
                                    @endif
                                </tr>
                                <tr>
                                    <th>Instagram Profile</th>
                                    @if ($query->instagram_profile == null)
                                        <td>-</td>
                                        @else
                                        <td><a href="{{ $query->instagram_profile }}" target="_blank">{{ $query->instagram_profile }}</a></td>
                                    @endif
                                </tr>
                                <tr>
                                    <th>Twitter Profile</th>
                                    @if ($query->twitter_profile == null)
                                        <td>-</td>
                                        @else
                                        <td><a href="{{ $query->twitter_profile }}" target="_blank">{{ $query->twitter_profile }}</a></td>
                                    @endif
                                </tr>
                                <tr>
                                    <th>Github Profile</th>
                                    @if ($query->github_profile == null)
                                        <td>-</td>
                                    @else
                                        <td><a href="{{ $query->github_profile }}" target="_blank">{{ $query->github_profile }}</a></td>
                                    @endif
                                </tr>
                                <tr>
                                    <th>Dribbble Profile</th>
                                    @if ($query->dribbble_profile == null)
                                        <td>-</td>
                                        @else
                                        <td><a href="{{ $query->dribbble_profile }}" target="_blank">{{ $query->dribbble_profile }}</a></td>
                                    @endif
                                </tr>
                                <tr>
                                    <th>Link Website</th>
                                    @if ($query->link_website == null)
                                        <td>-</td>
                                    @else
                                        <td><a href="{{ $query->link_website }}">{{ $query->link_website }}</a></td>
                                    @endif
                                </tr>
                            </thead>
                        </table>
                        <a href="{{ route('user.profile.edit',$query->id) }}" class="btn btn-warning" style="float:right;">Edit Profile</a>
                        @endforeach
                    </div>
                    {{--<div class="card-body--">
                        <div class="table-stats order-table ov-h">
                            <table class="table table-responsive-sm">
                                <thead>
                                    <tr>
                                        <th>File</th>
                                        <th>Nama</th>
                                        <th>Email</th>
                                        <th>Bidang</th>
                                        <th>Deskripsi</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($user as $query)
                                        <tr>
                                            <td><img src="{{ asset('/storage/'.$query->file) }}" width="250px" height="50px" alt="Gambar"></td>
                                            <td>{{ $query->name }}</td>
                                            <td>{{ $query->email }}</td>
                                            <td>{{ $query->bidang }}</td>
                                            <td>{{ $query->deskripsi }}</td>
                                            <td>
                                                <a href="{{ route('amentor.profile.edit',$query->id) }}" class="btn btn-warning btn-sm">
                                                    <i class="fa fa-pencil"></i>
                                                </a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>--}}
                </div>
            </div>
        </div>
    </div>
@endsection
