@extends('includes.amentor.app')

@section('content')

    <div id="layoutSidenav_content">
        <main>
            <div class="container-fluid">
                <h1 class="mt-4">Sertifikat</h1>
                <ol class="breadcrumb mb-4">
                    <li class="breadcrumb-item active">Request Sertifikat</li>
                </ol>
                <div class="row">
                    <div class="col-lg-12">
                        @if(session('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                        @endif
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Nama Kelas</th>
                                    <th>Nama User</th>
                                    <th>Email User</th>
                                    <th>Feedback</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($sertifikat as $query)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $query->kelas }}</td>
                                        <td>{{ $query->nama }}</td>
                                        <td>{{ $query->email }}</td>
                                        <td>{{ $query->feedback }}</td>
                                        <td>
                                            @if ($query->status == 'PENDING')
                                                <span class="badge badge-info">{{ $query->status }}</span>
                                            @else
                                                <span class="badge badge-success">{{ $query->status }}</span>
                                            @endif
                                        </td>
                                        <td>
                                            <a href="{{ route('amentor.status', $query->id) }}?status=SUCCESS" class="btn btn-success">
                                                <i class="fa fa-check"></i>
                                            </a>
                                            <a href="{{ route('amentor.status', $query->id) }}?status=PENDING" class="btn btn-info">
                                                <i class="fa fa-spinner"></i>
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
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
@endsection
