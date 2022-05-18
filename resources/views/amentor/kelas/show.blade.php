<table class="table table-bordered">
    <tr>
        <th>Kelas</th>
        <td>{{ $item->kelas }}</td>
    </tr>
    <tr>
        <th>Mentor</th>
        <td>{{ $item->mentor->name }}</td>
    </tr>
    <tr>
        <th>Kategori</th>
        <td>{{ $item->kategori }}</td>
    </tr>
    <tr>
        <th>Tingkat</th>
        <td>{{ $item->tingkat }}</td>
    </tr>
    <tr>
        <th>Deskripsi</th>
        <td>{!! $item->deskripsi !!}</td>
    </tr>
    <tr>
        <th>Konsultasi</th>
        <td>{{ $item->konsultansi ? 'Ya' : 'Tidak' }}</td>
    </tr>
    <tr>
        <th>Serfitikat</th>
        <td>{{ $item->sertifikat ? 'Ya' : 'Tidak' }}</td>
    </tr>
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
</table>
