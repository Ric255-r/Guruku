<table class="table table-bordered">
    <tr>
        <th>Nama</th>
        <td>{{ $item->name }}</td>
    </tr>
    <tr>
        <th>Email</th>
        <td>{{ $item->email }}</td>
    </tr>
    <tr>
        <th>Nomor</th>
        <td>{{ $item->number }}</td>
    </tr>
    <tr>
        <th>Bukti</th>
        <td><img src="{{ URL::asset('/storage/'.$item->bukti) }}" alt="gam" width="150px"></td>
        {{-- <img src="{{url('/adminkelaspremium/'.$query->file)}}" alt="gam" width="150px"> --}}
    </tr>
    <tr>
        <th>Total Transaksi</th>
        <td>Rp.@convert($item->transaction_total)</td>
    </tr>
    <tr>
        <th>Status Transaksi</th>
        <td>{{ $item->transaction_status }}</td>
    </tr>
    <tr>
        <th>Pembelian Kelas</th>
        <td>
            <table class="table table-bordered w-100">
                <tr>
                    <th>Nama</th>
                    <th>Harga</th>
                    <th>Jenis</th>
                </tr>
                @foreach ($item->details as $detail)
                <tr>
                    <td>{{ $detail->product->kelas }}</td>
                    <td>Rp. @convert($detail->product->harga)</td>
                    <td>{{ $detail->product->jenis }}</td>
                </tr>
                @endforeach
            </table>
        </td>
    </tr>
</table>

<div class="row">
    <div class="col-4">
        <a href="{{ route('transactions.status', $item->id) }}?status=SUCCESS" class="btn btn-success btn-block">
            <i class="fa fa-check"></i> Set Sukses
        </a>
    </div>
    <div class="col-4">
        <a href="{{ route('transactions.status', $item->id) }}?status=FAILED" class="btn btn-warning btn-block">
            <i class="fa fa-times"></i> Set Gagal
        </a>
    </div>
    <div class="col-4">
        <a href="{{ route('transactions.status', $item->id) }}?status=PENDING" class="btn btn-info btn-block">
            <i class="fa fa-spinner"></i> Set Pending
        </a>
    </div>
</div>
