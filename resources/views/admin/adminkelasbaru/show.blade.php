<table class="table table-bordered">
    <tr>
        <th>File Kelas</th>
        <td>
            <img src="{{ asset('/storage/'.$item->file) }}" width="200px" alt="">
        </td>
    </tr>
    <tr>
        <th>Kelas</th>
        <td>{{ $item->kelas }}</td>
    </tr>
    <tr>
        <th>Mentor</th>
        <td>{{ $item->mentor->name }}</td>
    </tr>
    <tr>
        <th>Mentor Email</th>
        <td>{{ $item->mentor->email }}</td>
    </tr>
    <tr>
        <th>Kategori</th>
        <td>{{ $item->kategori }}</td>
    </tr>
    <tr>
        <th>Materi</th>
        <td>{{ $item->materi }}</td>
    </tr>
    <tr>
        <th>Tingkatan</th>
        <td>{{ $item->tingkat }}</td>
    </tr>
    <tr>
        <th>Deskripsi</th>
        <td>{!! $item->deskripsi !!}</td>
    </tr>
    {{-- <tr>
        <th>Konsultasi</th>
        <td>{{ $item->konsultansi ? 'Ya' : 'Tidak' }}</td>
    </tr> --}}
    {{-- <tr>
        @if ($item->link_konsul == null)
            <th>Link Konsul</th>
            <td>-</td>
        @else
            <th>Link Konsul</th>
            <td><a href="{{ $item->link_konsul}}">{{ $item->link_konsul}}</a></td>
        @endif

    </tr> --}}
    <tr>
        <th>Serfitikat</th>
        <td>{{ $item->sertifikat ? 'Ya' : 'Tidak' }}</td>
    </tr>
    {{-- <tr>
        <th>Gambar Sertifikat</th>
        <td>
            @if ($item->sertifikat != null)
                <img src="{{ asset('/storage/'.$item->pic_serti) }}" width="200px" alt="">
            @else
                -
            @endif
        </td>
    </tr> --}}
    <tr>
        <th>Harga</th>
        <td>Rp. @convert($item->harga)</td>
    </tr>
    {{-- <tr>
        <th>Murid</th>
        <td>{{ $item->murid }}</td>
    </tr> --}}
    <tr>
        <th>Jenis Kelas</th>
        <td>{{ $item->jenis }}</td>
    </tr>
    <tr>
        <th>Status</th>
        <td>
            @if ($item->status === "PENDING")
                <span class="badge badge-info">
            @else($item->transaction_status == "SUCCESS")
                <span class="badge badge-success">
            @endif
            {{ $item->status }}
            </span>
        </td>
    </tr>
</table>

<div class="row">
    <div class="col-6">
        <a href="{{ route('kelas.status', $item->id) }}?status=PUBLISH" class="btn btn-success btn-block">
            <i class="fa fa-check"></i> Set Publish
        </a>
    </div>
    <div class="col-6">
        <a href="{{ route('kelas.status', $item->id) }}?status=PENDING" class="btn btn-info btn-block">
            <i class="fa fa-spinner"></i> Set Pending
        </a>
    </div>
</div>

<div class="row mt-3">
    <div class="col-6">
        <a href="{{ route('kelas.status', $item->id) }}?status=PENDING" class="btn btn-primary btn-block">
            <i class="fa fa-check"></i> Set Accept
        </a>
    </div>
    <div class="col-6">
        <a href="{{ route('kelas.status', $item->id) }}?status=FAILED" class="btn btn-danger btn-block">
            <i class="fa fa-times"></i> Set Failed
        </a>
    </div>
</div>
