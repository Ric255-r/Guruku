<table class="table table-bordered">
    <tr>
        <th>Gambar</th>
        <td>
            <img src="{{ asset('/gambar_kuis/'.$kuis->gambar) }}" width="200px" alt="">
        </td>
    </tr>
    <tr>
        <th>Nama Kuis</th>
        <td>{{ $kuis->nama_kuis }}</td>
    </tr>
    <tr>
        <th>Deskripsi</th>
        <td>{{ $kuis->deskripsi }}</td>
    </tr>
    <tr>
        <th>Kategori</th>
        <td>{{ $kuis->kategori }}</td>
    </tr>
    <tr>
        <th>Topik</th>
        <td>{{ $kuis->topic }}</td>
    </tr>
    <tr>
        <th>Tingkat</th>
        <td>{{ $kuis->tingkatan }}</td>
    </tr>
    <tr>
        <th>Jenis</th>
        <td>{{ $kuis->jenis }}</td>
    </tr>
    <tr>
        <th>Link Kuis</th>
        <td style="color: blue;">{{ $kuis->slug }}</td>
    </tr>
    {{-- <tr>
        @if ($kuis->link_konsul == null)
            <th>Link Konsul</th>
            <td>-</td>
        @else
            <th>Link Konsul</th>
            <td><a href="{{ $kuis->link_konsul}}">{{ $kuis->link_konsul}}</a></td>
        @endif

    </tr> --}}
    <tr>
        <th>Status</th>
        <td>
            @if ($kuis->status === "PENDING")
                <span class="badge badge-info">
            @else($kuis->transaction_status == "SUCCESS")
                <span class="badge badge-success">
            @endif
            {{ strtoupper($kuis->status) }}
            </span>
        </td>
    </tr>
</table>

<div class="row">
    <div class="col-6">
        <a href="{{ route('amentor.kuis.updatestatus', $kuis->id) }}?status=active"
            class="btn btn-success btn-block">
            <i class="fa fa-check"></i> Set Success
        </a>
    </div>
    <div class="col-6">
        <a href="{{ route('amentor.kuis.updatestatus', $kuis->id) }}?status=pending"
            class="btn btn-info btn-block">
            <i class="fa fa-spinner"></i> Set Pending
        </a>
    </div>
</div>

<div class="row mt-3">
    <div class="col-6">
        <a href="{{ route('amentor.kuis.editKuis',$kuis->id) }}"
            class="btn btn-warning btn-block text-white">
            <i class="fas fa-edit text-white" aria-hidden="true"></i> Edit
        </a>
    </div>
    <div class="col-6">
        <form action="{{ route('amentor.kuis.deletekuis', $kuis->id) }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('delete')
            <button class="btn btn-danger btn-block">
                <i class="fa fa-trash"></i> Delete
            </button>
        </form>
    </div>
</div>

