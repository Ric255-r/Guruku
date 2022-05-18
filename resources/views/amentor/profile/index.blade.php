@extends('includes.amentor.app')

@section('content')

    <div id="layoutSidenav_content">
        <main>
            <div class="container-fluid">
                <h1 class="mt-4">Profile</h1>
                <ol class="breadcrumb mb-4">
                    <li class="breadcrumb-item active">Profile Setting</li>
                </ol>
                <div class="row">
                    <div class="col-lg-12">
                        @if(session('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                        @endif

                        @foreach ($user as $query)
                            <table class="table table-responsive-sm table-borderless">
                                <thead>
                                    @if ($query->file == null)
                                        <tr>
                                            <th><img src="{{ URL::asset('/Foto/man.png') }}" style="width:100px; height:100px; border-radius:100px; background-color:#7e7e7e;" alt=""></th>
                                        </tr>
                                        <tr>
                                            <th><a href="{{ route('amentor.updatefoto.edit',$query->id) }}" class="btn btn-primary btn-sm">Upload foto</a></th>
                                        </tr>
                                        @else
                                        <tr>
                                            <th>
                                                <img src="{{ asset('/storage/'.$query->file) }}" style="width:100px; height:100px; border-radius:100px;" alt="Gambar">
                                            </th>
                                        </tr>
                                        <tr>
                                            <th colspan="2"><a href="{{ route('amentor.updatefoto.edit',$query->id) }}" class="btn btn-info">Ubah Gambar</a></th>
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
                                        <th>No.Telp</th>
                                        @if ($query->telp == null)
                                            <td>-</td>
                                        @else
                                            <td>{{ $query->telp }}</td>
                                        @endif
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
                                        <th>Bank</th>
                                        @if ($query->bank == null)
                                            <td>-</td>
                                            @else
                                            <td>{{ $query->ben->namabank }}</td>
                                        @endif
                                    </tr>
                                    <tr>
                                        <th>No Rek</th>
                                        @if ($query->no_rek == null)
                                            <td>-</td>
                                            @else
                                            <td>{{ $query->no_rek }}</td>
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
                                            <td><a href="{{ $query->link_website }}" target="_blank">{{ $query->link_website }}</a></td>
                                        @endif
                                    </tr>
                                </thead>
                            </table>
                            <a href="{{ route('amentor.profile.edit',$query->id) }}" class="btn btn-warning" style="float:right;">Edit Profile</a>
                        @endforeach
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

    {{--<div class="orders">
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
                        <table class="table table-responsive-sm table-borderless">
                            <thead>
                                @if ($query->file == null)
                                    <tr>
                                        <th><img src="{{ URL::asset('/Foto/man.png') }}" style="width:100px; height:100px; border-radius:100px; background-color:#7e7e7e;" alt=""></th>
                                    </tr>
                                    <tr>
                                        <th><a href="{{ route('amentor.updatefoto.edit',$query->id) }}" class="btn btn-primary btn-sm">Upload foto</a></th>
                                    </tr>
                                    @else
                                    <tr>
                                        <th>
                                            <img src="{{ asset('/storage/'.$query->file) }}" style="width:100px; height:100px; border-radius:100px;" alt="Gambar">
                                        </th>
                                    </tr>
                                    <tr>
                                        <th><a href="{{ route('amentor.updatefoto.edit',$query->id) }}" class="btn btn-info btn-sm">Ubah Gambar</a></th>
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
                                    <th>Bank</th>
                                    @if ($query->bank == null)
                                        <td>-</td>
                                        @else
                                        <td>{{ $query->ben->namabank }}</td>
                                    @endif
                                </tr>
                                <tr>
                                    <th>No Rek</th>
                                    @if ($query->no_rek == null)
                                        <td>-</td>
                                        @else
                                        <td>{{ $query->no_rek }}</td>
                                    @endif
                                </tr>
                                <tr>
                                    <th>Github Profile</th>
                                    @if ($query->github_profile == null)
                                        <td>-</td>
                                        @else
                                        <td>{{ $query->github_profile }}</td>
                                    @endif
                                </tr>
                                <tr>
                                    <th>Dribbble Profile</th>
                                    @if ($query->dribbble_profile == null)
                                        <td>-</td>
                                        @else
                                        <td>{{ $query->dribbble_profile }}</td>
                                    @endif
                                </tr>
                            </thead>
                        </table>
                        <a href="{{ route('amentor.profile.edit',$query->id) }}" class="btn btn-warning" style="float:right;">Edit Profile</a>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>--}}
@endsection
