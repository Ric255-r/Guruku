@extends('includes.amentor.app')

@section('content')
    {{--@if ($transaction->count() == 0)
        <p>hai</p>
    @else--}}
    <div id="layoutSidenav_content">
        <main>
            <div class="container-fluid">
                @foreach ($users as $query)
                    @if ($query->file == null OR $query->bidang == null OR $query->deskripsi == null)
                        <!-- Modal -->
                        <div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title alert alert-warning" id="exampleModalLongTitle">Silahkan Lengkapi Profile mu</h5>
                                    {{--<button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>--}}
                                </div>
                                <div class="modal-body">

                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-primary" onclick="event.preventDefault(); location.href='{{route('amentor.profile.edit',Auth::user()->id)}}';">Lengkapi</button>
                                </div>
                            </div>
                            </div>
                        </div>
                    @endif
                @endforeach

                <h1 class="mt-4">Dashboard</h1>
                <ol class="breadcrumb mb-4">
                    <li class="breadcrumb-item active">Dashboard</li>
                </ol>
                <div class="row">
                    <div class="col-xl-3 col-md-6">
                        <div class="card bg-primary text-white mb-4">
                            <div class="card-body"
                            data-toggle="tooltip"
                            title="Total Penghasilan">
                                <i class="fas fa-dollar-sign" style="font-size:20px;"></i>
                                Total Penghasilan
                            </div>
                            <div class="card-footer d-flex align-items-center justify-content-between"
                            data-toggle="tooltip"
                            title="Rp.0">
                                <p class="small text-white">Rp.0</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-md-6">
                        <div class="card bg-success text-white mb-4">
                            <div class="card-body"
                            data-toggle="tooltip"
                            title="Transaksi Sukses">
                                <i class="fas fa-check" style="font-size:20px;"></i>
                                Transaksi Sukses
                            </div>
                            <div class="card-footer d-flex align-items-center justify-content-between"
                            data-toggle="tooltip"
                            title="0 Transaksi Sukses">
                                <p class="small text-white">0</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-md-6">
                        <div class="card bg-info text-white mb-4">
                            <div class="card-body"
                            data-toggle="tooltip"
                            title="Transaksi Pending">
                                <i class="fas fa-spinner" style="font-size:20px;"></i>
                                Transaksi Pending
                            </div>
                            <div class="card-footer d-flex align-items-center justify-content-between"
                            data-toggle="tooltip"
                            title="0 Transaksi Pending">
                                <p class="small text-white">0</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-md-6">
                        <div class="card bg-danger text-white mb-4">
                            <div class="card-body"
                            data-toggle="tooltip"
                            title="Transaksi Gagal">
                                <i class="fas fa-times" style="font-size:20px;"></i>
                                Transaksi Gagal
                            </div>
                            <div class="card-footer d-flex align-items-center justify-content-between"
                            data-toggle="tooltip"
                            title="0 Transaksi Gagal">
                                <p class="small text-white">0</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card mb-4">
                    <div class="card-header">
                        <i class="fas fa-table mr-1"></i>
                        Data Transaksi
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>Nama</th>
                                        <th>Email</th>
                                        <th>Number</th>
                                        <th>Kelas</th>
                                        <th>Transaction Total</th>
                                        <th>Transaction Status</th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th>Nama</th>
                                        <th>Email</th>
                                        <th>Number</th>
                                        <th>Kelas</th>
                                        <th>Transaction Total</th>
                                        <th>Transaction Status</th>
                                    </tr>
                                </tfoot>
                                <tbody>
                                    @foreach ($transaction as $query)
                                        @if ($query->product->mentor_id == Auth::user()->kode_mentor && $query->transaction->user_id == $query->user_id)
                                            <tr>
                                                <td>{{ $query->transaction->name }}</td>
                                                <td>{{ $query->transaction->email }}</td>
                                                <td>{{ $query->transaction->number }}</td>
                                                <td>{{ $query->product->kelas }}</td>
                                                <td id="total">{{ $query->transaction->transaction_total }}</td>
                                                <td>
                                                    @if ($query->transaction->transaction_status == 'PENDING')
                                                        <span class="badge badge-info">
                                                    @elseif($query->transaction->transaction_status == 'FAILED')
                                                        <span class="badge badge-danger">
                                                    @else
                                                        <span class="badge badge-success">
                                                    @endif
                                                    {{ $query->transaction->transaction_status }}
                                                    </span>
                                                </td>
                                            </tr>
                                        @endif
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
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
    {{--@endif--}}


    <script
        src="https://code.jquery.com/jquery-3.5.1.js"
        integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc="
        crossorigin="anonymous"></script>
            <script>
                $(document).ready(function(){
                    $('#exampleModalLong').modal('show');
                });
            </script>
@endsection
