@extends('layouts.default2')

@section('content')

    <div class="orders">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="box-title">Nilai Saya</h4>
                        <hr>
                    </div>
                    <div class="card-body">
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-sm-12">
                                    <table class="table table-striped table-responsive-md">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Nama Kuis</th>
                                                <th>Kategori Kuis</th>
                                                <th>Topik</th>
                                                <th>Nama Mentor</th>
                                                <th>Nilai</th>
                                                <th>Waktu Kerja</th>
                                                <th colspan="2">Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody class="refreshtable">
                                            @forelse ($nilai as $indexkey => $item)
                                            <tr>
                                                <td>{{ $indexkey+1 }}</td>
                                                <td>{{ $item->nama_kuis }}</td>
                                                <td>{{ $item->kategori }}</td>
                                                <td>{{ $item->topic }}</td>
                                                <td>{{ $item->nama_mentor }}</td>
                                                @if (strval($item->nilai_awal) == '0' && strval($item->nilai_akhir) == '0')
                                                    <td>{{ $item->nilai_akhir}} (R)</td>
                                                    <td>{{ $item->waktukerja_akhir }}</td>
                                                    <td><a href="#" class="btn btn-secondary" onclick="alert('Anda Sudah Mengerjakan 2x')">Retry</a></td>
                                                @elseif ($item->nilai_awal <= 70 && strval($item->nilai_akhir) == null)
                                                    {{-- pertamakali --}}
                                                    <td>{{ $item->nilai_awal}}</td>
                                                    <td>{{ $item->waktukerja_awal }}</td>
                                                    <td><a href="{{ route('kuis.menujusoal', $item->slug) }}" class="btn btn-info" onclick="return confirm('Anda Yakin ingin Mengulangi Kuis? Hanya Bisa dilakukan 1x lagi??')">Retry</a></td>
                                                @elseif($item->nilai_awal <= 70 && strval($item->nilai_akhir) != null)
                                                    {{-- remed --}}
                                                    <td>{{ $item->nilai_akhir}} (R) </td>
                                                    <td>{{ $item->waktukerja_akhir }}</td>
                                                    <td><a onclick="alert('Anda Sudah Mengerjakan 2x, Tidak Dapat Retry'); return false" class="btn btn-secondary">Retry</a></td>
                                                @elseif($item->nilai_awal >= 70 && strval($item->nilai_akhir) == null)
                                                    {{-- pertamakali --}}
                                                    <td>{{ $item->nilai_awal}}</td>
                                                    <td>{{ $item->waktukerja_awal }}</td>
                                                    <td><a href="{{ route('kuis.menujusoal', $item->slug) }}" class="btn btn-info" onclick="return confirm('Anda Yakin ingin Mengulangi Kuis? Hanya Bisa dilakukan 1x lagi??')">Retry</a></td>
                                                @elseif($item->nilai_awal >= 70 && strval($item->nilai_akhir) != null)
                                                    {{-- modified --}}
                                                    <td>{{ $item->nilai_akhir}} (M) </td>
                                                    <td>{{ $item->waktukerja_akhir }}</td>
                                                    <td><a onclick="alert('Anda Sudah Mengerjakan 2x, Tidak Dapat Retry'); return false" class="btn btn-secondary">Retry</a></td>
                                                @endif
                                                {{-- @if ($item->nilai_akhir == null)
                                                    <td>{{ $item->nilai_awal}}</td>
                                                    <td>{{ $item->waktukerja_awal }}</td>
                                                    <td><a href="{{ route('kuis.menujusoal', $item->id_kuis) }}" class="btn btn-info" onclick="return confirm('Anda Yakin ingin Mengulangi Kuis? Hanya Bisa dilakukan 1x lagi??')">Retry</a></td>
                                                @else
                                                    <td>{{ $item->nilai_akhir}} (R) </td>
                                                    <td>{{ $item->waktukerja_akhir }}</td>
                                                    <td><a onclick="alert('Anda Sudah Mengerjakan 2x, Tidak Dapat Retry'); return false" class="btn btn-info">Retry</a></td>
                                                @endif --}}
                                            </tr>
                                            @empty
                                            <tr>
                                                <td colspan="8" class="text-center">Kerja Kuis Terlebih Dahulu</td>
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
        </div>
    </div>
@endsection
