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
        <td><img src="{{ url('/storage/'.$item->bukti) }}" alt="gam" width="150px"></td>
        {{-- <img src="{{url('/adminkelaspremium/'.$query->file)}}" alt="gam" width="150px"> --}}
    </tr>
    <tr>
        <th>Total Transaksi</th>
        <td>Rp. @convert($item->transaction_total)</td>
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
