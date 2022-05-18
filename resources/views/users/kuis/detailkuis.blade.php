<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Detail Kuis</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ URL::asset('/css/kelasbaru.css') }}">
    <link rel="shortcut icon" sizes="57x57" href="{{ URL::asset('/Foto/favicon.png') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" integrity="sha512-+4zCK9k+qNFUR5X+cKL9EIR+ZOhtIloNl9GIKS57V1MyNsYpYcUrUeQc9vNfzsWfV28IaLL3i96P9sdNyeRssA==" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.22/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.11.3/themes/smoothness/jquery-ui.css" />
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('dist/assets/owl.carousel.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('dist/assets/owl.theme.default.min.css') }}">
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
</head>
<style>
    .dialogwidth{
        min-width: 80%;
    }

    .swal-modal{
        width:550px !important;
    }

    @media (max-width: 600px)
    {
        .scrollable
        {
            overflow-x: auto;
        }
        .dialogwidth{
            min-width: unset;
        }
    }
</style>
<body>
    {{--<header class="bck-color-mentor-show">--}}
        @include('navs.navbar2')
        {{--<div class="container">
            <div class="row text-center">
                <div class="col-lg-12" data-aos="fade-up" data-aos-delay="300">
                    <h4 class="br-kuis-title-kuis">{{ $kuis->nama_kuis }}</h4>
                </div>
            </div>
        </div>--}}
    {{--</header>--}}

    <main>
        <section class="bck-color-mentor-show">
            <div class="container">
                <div class="row text-center">
                    <div class="col-lg-12" data-aos="fade-up" data-aos-delay="300">
                        <h4 class="br-kuis-title-kuis">{{ $kuis->nama_kuis }}</h4>
                    </div>
                </div>
            </div>
        </section>
        @auth
            @if ($kuis->jenis == 'video' || $kuis->jenis == 'video_akhir' || $kuis->jenis == 'kelas')
                @if (Auth::user()->roles == 'USERS')
                    @if ($kuis->kelas->jenis == 'gratis')
                        @if ($ikut->count() > 0)
                            {{-- <p>uda join gratis</p> --}}

                            {{--<section class="bck-color-mentor-show">
                                <div class="container">
                                    <div class="row text-center">
                                        <div class="col-lg-12" data-aos="fade-up" data-aos-delay="300">
                                            <h4 class="br-kuis-title-kuis">{{ $kuis->nama_kuis }}</h4>
                                        </div>
                                    </div>
                                </div>
                            </section>--}}

                            <section class="br-kuis-detail-kuis">
                                <div class="container">
                                    <div class="row">
                                        <div class="col-lg-8 text-center text-sm-center text-md-center text-lg-left"
                                            data-aos="fade-up" data-aos-delay="400">
                                            <div class="card br-kuis-card-kuis px-3 pt-3">
                                                <div class="row">
                                                    {{--<div class="media" style="border:1px solid green;">--}}
                                                        <div class="col-lg-4 col-md-8 col-sm-12 col-12 mx-md-auto">
                                                            <img class="mr-3 pl-2" src="{{ asset('/gambar_kuis/'.$kuis->gambar) }}" alt="Generic placeholder image" height="140" width="200">
                                                        </div>
                                                        <div class="col-lg-8 col-md-8 col-sm-12 col-12 mx-md-auto mx-lg-0 mx-sm-auto mx-auto">
                                                            <div class="media-body">
                                                                <div class="row">
                                                                    <div class="col-lg-8 col-md-8 col-sm-12 col-12">
                                                                        <h5 class="mt-0 mt-md-3 br-kuis-nama-kuis">{{ $kuis->nama_kuis }}</h5>
                                                                    </div>
                                                                    <div class="col-lg-4 col-md-4 col-sm-12 col-12 mx-auto">
                                                                        {{--<p class="text-responsive br-kuis-deskripsi-kuis align-middle mt-0 mt-md-3 align-middle">--}}
                                                                        <div class="mt-3 float-xl-right float-lg-right float-md-right float-sm-none float-none">
                                                                            <img src="{{ asset('/Foto/bintang.png') }}" class="img-fluid mb-1" alt="" style="">
                                                                            <span class="rating-jumlah-detail-kuis pt-1" style="">{{ number_format($angkarating, 1) }}</span>
                                                                            <span>({{ $tutul }})</span>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <p class="br-kuis-kategori-kuis">
                                                                    {{ $kuis->kategori }} - {{ $kuis->topic }}
                                                                </p>
                                                                <p class="text-responsive br-kuis-deskripsi-kuis">
                                                                    {{ $kuis->deskripsi }}
                                                                </p>
                                                                @if (Auth::user()->roles == 'USERS')
                                                                    @if ($kuis->jenis == 'video_akhir')
                                                                        <a href="{{ route('kuis.menujusoal', $kuis->slug) }}" class="btn btn-outline-secondary btn-mulai-kuis float-lg-right float-md-none float-sm-none float-none mb-4">Mulai Kuis</a>
                                                                        @if ($cekrating == false)
                                                                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#ModalRatingKuis">
                                                                                Rate
                                                                            </button>
                                                                        @else
                                                                            <button class="btn btn-primary" onclick="sudahrate();">Rate</button>
                                                                        @endif
                                                                    @else
                                                                        @if (@$valnilai->nilai_awal == null && @strval($valnilai->nilai_akhir) != null)
                                                                            <a href="#" onclick="duakali(); return false" class="btn btn-outline-secondary btn-mulai-kuis float-lg-right float-md-none float-sm-none float-none mb-4">Mulai Lagi</a>
                                                                            @if ($cekrating == false)
                                                                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#ModalRatingKuis">
                                                                                    Rate
                                                                                </button>
                                                                            @else
                                                                                <button class="btn btn-primary" onclick="sudahrate();">Rate</button>
                                                                            @endif
                                                                        @elseif(@$valnilai->nilai_awal == null)
                                                                            <a href="{{ route('kuis.menujusoal', $kuis->slug) }}" class="btn btn-outline-secondary btn-mulai-kuis float-lg-right float-md-none float-sm-none float-none mb-4">Mulai Kuis</a>
                                                                            @if (@strval($valnilai->nilai_awal) == '0')
                                                                                @if ($cekrating == false)
                                                                                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#ModalRatingKuis">
                                                                                        Rate
                                                                                    </button>
                                                                                @else
                                                                                    <button class="btn btn-primary" onclick="sudahrate();">Rate</button>
                                                                                @endif
                                                                            @endif
                                                                        @elseif (strval($valnilai->nilai_akhir) == null)
                                                                            <a onclick="ulang('{{ route('kuis.menujusoal', $kuis->slug) }}'); return false" class="btn btn-outline-secondary btn-mulai-kuis float-lg-right float-md-none float-sm-none float-none mb-4">Kerja Lagi</a>
                                                                            @if ($cekrating == false)
                                                                                <a type="button" style="cursor: pointer; color:blue; text-decoration:underline;" data-toggle="modal" data-target="#ModalRatingKuis">
                                                                                    Rate
                                                                                </a>
                                                                            @else
                                                                                <a class="" style="cursor: pointer; color:blue; text-decoration:underline;" onclick="sudahrate();">Rate</a>
                                                                            @endif
                                                                        @elseif($valnilai->nilai_awal && strval($valnilai->nilai_akhir) != null)
                                                                            <a href="#" onclick="duakali(); return false" class="btn btn-outline-secondary btn-mulai-kuis float-lg-right float-md-none float-sm-none float-none mb-4">Kerja Lagi</a>
                                                                            @if ($cekrating == false)
                                                                                <a type="button" style="cursor: pointer; color:blue; text-decoration:underline;" data-toggle="modal" data-target="#ModalRatingKuis">
                                                                                    Rate
                                                                                </a>
                                                                            @else
                                                                                <a style="cursor: pointer; color:blue; text-decoration:underline;" onclick="sudahrate();">Rate</a>
                                                                            @endif
                                                                        @endif
                                                                    @endif
                                                                @elseif (Auth::user()->roles == 'MENTOR')
                                                                    <a href="#" onclick="isMentor(); return false" class="btn btn-outline-secondary btn-mulai-kuis float-lg-right float-md-none float-sm-none float-none mb-4">Mulai Kuis</a>
                                                                @elseif (Auth::user()->roles == 'ADMIN')
                                                                    <a href="#" onclick="isAdmin(); return false" class="btn btn-outline-secondary btn-mulai-kuis float-lg-right float-md-none float-sm-none float-none mb-4">Mulai Kuis</a>
                                                                @endif
                                                                {{-- modal --}}
                                                                <div class="modal fade" id="ModalRatingKuis" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                                    <div class="modal-dialog" role="document">
                                                                        <div class="modal-content">
                                                                            <div class="modal-header">
                                                                                <h5 class="modal-title w-100" id="exampleModalLabel">Rate Kuis Ini</h5>
                                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                                <span aria-hidden="true">&times;</span>
                                                                                </button>
                                                                            </div>
                                                                            <div class="modal-body">
                                                                                <form action="{{ route('kuis.rating', $kuis->slug) }}" method="post">
                                                                                    @csrf
                                                                                    @method('POST')
                                                                                    <div class="col-sm-12 text-center">
                                                                                        <label for="1">
                                                                                            <input type="radio" name="rating" id="" class="" value="1">
                                                                                            <br>
                                                                                            1
                                                                                        </label>
                                                                                        <label for="1">
                                                                                            <input type="radio" name="rating" id="" class="" value="2">
                                                                                            <br>
                                                                                            2
                                                                                        </label>
                                                                                        <label for="1">
                                                                                            <input type="radio" name="rating" id="" class="" value="3">
                                                                                            <br>
                                                                                            3
                                                                                        </label>
                                                                                        <label for="1">
                                                                                            <input type="radio" name="rating" id="" class="" value="4">
                                                                                            <br>
                                                                                            4
                                                                                        </label>
                                                                                        <label for="1">
                                                                                            <input type="radio" name="rating" id="" class="" value="5">
                                                                                            <br>
                                                                                            5
                                                                                        </label>
                                                                                        <br>
                                                                                    </div>
                                                                                    <div class="col-sm-12 mt-3">
                                                                                        <label for="pesan" style="text-align: left !important">Pesan</label>
                                                                                        <textarea name="pesan" id="pesan" cols="30" rows="10" class="form-control"></textarea>
                                                                                    </div>
                                                                                    <div class="col-sm-12 mt-3">
                                                                                        <input type="submit" value="Kirim" class="form-control">
                                                                                    </div>
                                                                                </form>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                {{-- <a href="{{ route('kuis.menujusoal', $kuis->id) }}" class="btn btn-outline-secondary btn-mulai-kuis float-lg-right float-md-none float-sm-none float-none mb-4">Mulai Kuis</a> --}}
                                                            </div>
                                                        </div>
                                                    {{--</div>--}}
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-4 mt-md-3 mt-3 mt-lg-0" data-aos="fade-up" data-aos-delay="500">
                                            <div class="card br-kuis-leaderboard-kuis text-center px-3 pt-3">
                                                <h5 class="br-kuis-leaderboard-text">Leaderboard</h5>
                                                <hr>
                                                <div class="table-responsive-sm">
                                                    <table class="table table-borderless mx-auto mx-auto-sm mx-auto-lg mx-auto-sm">
                                                        <tbody>
                                                            @foreach ($board as $indexkey => $item)
                                                                @php
                                                                    $indexkey++;
                                                                @endphp
                                                                <tr>
                                                                    @if ($indexkey == 1)
                                                                        <td class="align-middle"><img src="{{ asset('/Foto/juara1.png') }}" alt="juara1" class="img-fluid br-kuis-piala pb-1"></td>
                                                                    @elseif ($indexkey == 2)
                                                                        <td class="align-middle"><img src="{{ asset('/Foto/juara2.png') }}" alt="juara1" class="img-fluid br-kuis-piala"></td>
                                                                    @elseif ($indexkey == 3)
                                                                        <td class="align-middle"><img src="{{ asset('/Foto/juara3.png') }}" alt="juara1" class="img-fluid br-kuis-piala"></td>
                                                                    @else
                                                                        <td class="br-kuis-urutan-leaderboard">{{ $indexkey }}</td>
                                                                    @endif
                                                                    <td class="br-kuis-nama-leaderboard align-middle">{{ $item->username }}</td>
                                                                    <td class="br-kuis-waktu-leaderboard align-middle">{{ $item->waktukerja }}</td>
                                                                    <td class="br-kuis-score-leaderboard align-middle">{{ $item->nilai }}</td>
                                                                </tr>
                                                            @endforeach
                                                        </tbody>
                                                        <tfoot>
                                                            <tr>
                                                                <td colspan="4">
                                                                    {{-- <a href="#" class="br-kuis-show-all">Show All<a> --}}
                                                                    <button type="button" class="br-kuis-show-all" data-toggle="modal" data-target="#modalLeader" style="background: transparent; border: 0;">
                                                                        Show All
                                                                    </button>
                                                                </td> {{-- pas di klik pop-up --}}
                                                            </tr>
                                                            @if (empty($boarduser))
                                                                <tr class="br-kuis-score-user">
                                                                    <td colspan="4" class="br-kuis-play-kuis">Play Your Kuiz First</td>
                                                                </tr>
                                                            @else
                                                                @foreach ($showboard as $indexkey => $item)
                                                                    @if ($item->id_user == Auth::user()->id)
                                                                        @php
                                                                            $indexkey++;
                                                                        @endphp
                                                                        <tr class="br-kuis-score-user">
                                                                            @if ($indexkey == 1)
                                                                                <td class="align-middle"><img src="{{ asset('/Foto/juara1.png') }}" alt="juara1" class="img-fluid br-kuis-piala pb-1"></td>
                                                                            @elseif ($indexkey == 2)
                                                                                <td class="align-middle"><img src="{{ asset('/Foto/juara2.png') }}" alt="juara1" class="img-fluid br-kuis-piala"></td>
                                                                            @elseif ($indexkey == 3)
                                                                                <td class="align-middle"><img src="{{ asset('/Foto/juara3.png') }}" alt="juara1" class="img-fluid br-kuis-piala"></td>
                                                                            @else
                                                                                <td class="br-kuis-urutan-leaderboard-saya align-middle">{{ $indexkey }}</td>
                                                                            @endif
                                                                            <td class="br-kuis-nama-leaderboard-user align-middle">{{ $item->username }}</td>
                                                                            <td class="br-kuis-waktu-leaderboard-user align-middle">{{ $item->waktukerja }}</td>
                                                                            <td class="br-kuis-score-leaderboard-user align-middle">{{ $item->nilai }}</td>
                                                                        </tr>
                                                                    @endif
                                                                @endforeach
                                                            @endif
                                                        </tfoot>
                                                    </table>
                                                    {{-- triggermodal --}}
                                                    <div class="modal fade" id="modalLeader" tabindex="-1" role="dialog" aria-labelledby="exampleModalLeader" aria-hidden="true">
                                                        <div class="modal-dialog dialogwidth" role="document" >
                                                            <div class="modal-content">
                                                                <div class="modal-header text-center">
                                                                    <h5 class="modal-title w-100" id="exampleModalLeader" >LeaderBoard</h5>
                                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                    </button>
                                                                </div>
                                                                <div class="modal-body scrollable">
                                                                    <table id="example" class="table table-striped table-bordered">
                                                                        <thead>
                                                                            <th>Rank</th>
                                                                            <th>Username</th>
                                                                            <th>Score</th>
                                                                            <th>Time Solved</th>
                                                                            <th>Kategori</th>
                                                                            <th>Topic</th>
                                                                        </thead>
                                                                        <tbody>
                                                                            @foreach ($showboard as $indexkey => $item)
                                                                                <tr class="text-center">
                                                                                    @php
                                                                                        $indexkey++;
                                                                                    @endphp
                                                                                    @if ($indexkey == 1)
                                                                                        <th scope="row"><i class="fas fa-trophy text-warning"></i></th>
                                                                                    @elseif($indexkey == 2)
                                                                                        <th scope="row"><i class="fas fa-trophy text-secondary"></i></th>
                                                                                    @elseif($indexkey == 3)
                                                                                        <th scope="row"><i class="fas fa-trophy" style="color: brown;"></i></th>
                                                                                    @else
                                                                                        <th scope="row">{{ $indexkey }}</th>
                                                                                    @endif
                                                                                    {{-- <th scope="row">{{ $indexkey+1 }}</th> --}}
                                                                                    <td>{{ $item->username }}</td>
                                                                                    <td>{{ $item->nilai }}</td>
                                                                                    <td>{{ $item->waktukerja }}</td>
                                                                                    <td>{{ $item->kategori }}</td>
                                                                                    <td>{{ $item->topic }}</td>
                                                                                </tr>
                                                                            @endforeach
                                                                        </tbody>
                                                                    </table>
                                                                </div>
                                                                {{-- <div class="modal-footer">
                                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                                    <button type="button" class="btn btn-primary">Save changes</button>
                                                                </div> --}}
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </section>
                        @else
                            {{-- <p>blm join gratis</p> --}}
                            <section class="br-kuis-detail-kuis">
                                <div class="container">
                                    <div class="row">
                                        <div class="col-lg-12" style="text-align: center;">
                                            <img src="{{ asset('/Foto/forbidden.jpg') }}" class="img-fluid mx-auto d-block mt-5" alt="">
                                            <h3 style="color:#242424; font-weight:700;" class="text-center mt-3">Oops!</h3>
                                            <h4 class="text-center" style="color:#242424; font-weight:400;">Anda Harus Mengikuti Kelas "{{ $kuis->kelas->kelas }}" Sebelum mengakses halaman ini!</h4>
                                            <a href="{{ url('/kelas') }}" class="btn btn-primary text-white mt-3">Kembali Ke Kelas</a>
                                        </div>
                                    </div>
                                </div>
                            </section>
                        @endif
                    @elseif($kuis->kelas->jenis == 'premium')
                        @if ($saksi->count() > 0)
                            <section class="br-kuis-detail-kuis">
                                <div class="container">
                                    <div class="row">
                                        <div class="col-lg-8 text-center text-sm-center text-md-center text-lg-left">
                                            <div class="card br-kuis-card-kuis px-3 pt-3">
                                                <div class="row">
                                                    {{--<div class="media" style="border:1px solid green;">--}}
                                                        <div class="col-lg-4 col-md-8 col-sm-12 col-12 mx-md-auto">
                                                            <img class="mr-3 pl-2" src="{{ asset('/gambar_kuis/'.$kuis->gambar) }}" alt="Generic placeholder image" height="140" width="200">
                                                        </div>
                                                        <div class="col-lg-8 col-md-8 col-sm-12 col-12 mx-md-auto mx-lg-0 mx-sm-auto mx-auto">
                                                            <div class="media-body">
                                                                <div class="row">
                                                                    <div class="col-lg-8 col-md-8 col-sm-12 col-12">
                                                                        <h5 class="mt-0 mt-md-3 br-kuis-nama-kuis">{{ $kuis->nama_kuis }}</h5>
                                                                    </div>
                                                                    <div class="col-lg-4 col-md-4 col-sm-12 col-12 mx-auto">
                                                                        {{--<p class="text-responsive br-kuis-deskripsi-kuis align-middle mt-0 mt-md-3 align-middle">--}}
                                                                        <div class="mt-3 float-xl-right float-lg-right float-md-right float-sm-none float-none">
                                                                            <img src="{{ asset('/Foto/bintang.png') }}" class="img-fluid mb-1" alt="" style="">
                                                                            <span class="rating-jumlah-detail-kuis pt-1" style="">{{ number_format($angkarating, 1) }}</span>
                                                                            <span>({{ $tutul }})</span>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <p class="br-kuis-kategori-kuis">
                                                                    {{ $kuis->kategori }} - {{ $kuis->topic }}
                                                                </p>
                                                                <p class="text-responsive br-kuis-deskripsi-kuis">
                                                                    {{ $kuis->deskripsi }}
                                                                </p>
                                                                {{--<p class="text-responsive br-kuis-deskripsi-kuis align-middle">
                                                                    <img src="{{ asset('/Foto/bintang.png') }}" class="img-fluid" alt="">
                                                                    <span class="rating-jumlah-detail-kuis">{{ number_format($angkarating, 1) }}</span> <span>({{ $tutul }})</span>
                                                                </p>--}}
                                                                @if (Auth::user()->roles == 'USERS')
                                                                    @if ($kuis->jenis == 'video_akhir')
                                                                        <a href="{{ route('kuis.menujusoal', $kuis->slug) }}" class="btn btn-outline-secondary btn-mulai-kuis float-lg-right float-md-none float-sm-none float-none mb-4">Mulai Kuis</a>
                                                                        @if ($cekrating == false)
                                                                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#ModalRatingKuis">
                                                                                Rate
                                                                            </button>
                                                                        @else
                                                                            <button class="btn btn-primary" onclick="sudahrate();">Rate</button>
                                                                        @endif
                                                                    @else
                                                                        @if (@$valnilai->nilai_awal == null && @strval($valnilai->nilai_akhir) != null)
                                                                            <a href="#" onclick="duakali(); return false" class="btn btn-outline-secondary btn-mulai-kuis float-lg-right float-md-none float-sm-none float-none mb-4">Mulai Lagi</a>
                                                                            @if ($cekrating == false)
                                                                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#ModalRatingKuis">
                                                                                    Rate
                                                                                </button>
                                                                            @else
                                                                                <button class="btn btn-primary" onclick="sudahrate();">Rate</button>
                                                                            @endif
                                                                        @elseif(@$valnilai->nilai_awal == null)
                                                                            <a href="{{ route('kuis.menujusoal', $kuis->slug) }}" class="btn btn-outline-secondary btn-mulai-kuis float-lg-right float-md-none float-sm-none float-none mb-4">Mulai Kuis</a>
                                                                            @if (@strval($valnilai->nilai_awal) == '0')
                                                                                @if ($cekrating == false)
                                                                                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#ModalRatingKuis">
                                                                                        Rate
                                                                                    </button>
                                                                                @else
                                                                                    <button class="btn btn-primary" onclick="sudahrate();">Rate</button>
                                                                                @endif
                                                                            @endif
                                                                        @elseif (strval($valnilai->nilai_akhir) == null)
                                                                            <a onclick="ulang('{{ route('kuis.menujusoal', $kuis->slug) }}'); return false" class="btn btn-outline-secondary btn-mulai-kuis float-lg-right float-md-none float-sm-none float-none mb-4">Kerja Lagi</a>
                                                                            @if ($cekrating == false)
                                                                                <a type="button" style="cursor: pointer; color:blue; text-decoration:underline;" data-toggle="modal" data-target="#ModalRatingKuis">
                                                                                    Rate
                                                                                </a>
                                                                            @else
                                                                                <a class="" style="cursor: pointer; color:blue; text-decoration:underline;" onclick="sudahrate();">Rate</a>
                                                                            @endif
                                                                        @elseif($valnilai->nilai_awal && strval($valnilai->nilai_akhir) != null)
                                                                            <a href="#" onclick="duakali(); return false" class="btn btn-outline-secondary btn-mulai-kuis float-lg-right float-md-none float-sm-none float-none mb-4">Kerja Lagi</a>
                                                                            @if ($cekrating == false)
                                                                                <a type="button" style="cursor: pointer; color:blue; text-decoration:underline;" data-toggle="modal" data-target="#ModalRatingKuis">
                                                                                    Rate
                                                                                </a>
                                                                            @else
                                                                                <a style="cursor: pointer; color:blue; text-decoration:underline;" onclick="sudahrate();">Rate</a>
                                                                            @endif
                                                                        @endif
                                                                    @endif
                                                                @elseif (Auth::user()->roles == 'MENTOR')
                                                                    <a href="#" onclick="isMentor(); return false" class="btn btn-outline-secondary btn-mulai-kuis float-lg-right float-md-none float-sm-none float-none mb-4">Mulai Kuis</a>
                                                                @elseif (Auth::user()->roles == 'ADMIN')
                                                                    <a href="#" onclick="isAdmin(); return false" class="btn btn-outline-secondary btn-mulai-kuis float-lg-right float-md-none float-sm-none float-none mb-4">Mulai Kuis</a>
                                                                @endif

                                                                {{-- modal --}}
                                                                <div class="modal fade" id="ModalRatingKuis" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                                    <div class="modal-dialog" role="document">
                                                                        <div class="modal-content">
                                                                            <div class="modal-header">
                                                                                <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                                <span aria-hidden="true">&times;</span>
                                                                                </button>
                                                                            </div>
                                                                            <div class="modal-body">
                                                                                <form action="{{ route('kuis.rating', $kuis->slug) }}" method="post">
                                                                                    @csrf
                                                                                    @method('POST')
                                                                                    <div class="col-sm-12 text-center">
                                                                                        <label for="1">
                                                                                            <input type="radio" name="rating" id="" class="" value="1">
                                                                                            <br>
                                                                                            1
                                                                                        </label>
                                                                                        <label for="1">
                                                                                            <input type="radio" name="rating" id="" class="" value="2">
                                                                                            <br>
                                                                                            2
                                                                                        </label>
                                                                                        <label for="1">
                                                                                            <input type="radio" name="rating" id="" class="" value="3">
                                                                                            <br>
                                                                                            3
                                                                                        </label>
                                                                                        <label for="1">
                                                                                            <input type="radio" name="rating" id="" class="" value="4">
                                                                                            <br>
                                                                                            4
                                                                                        </label>
                                                                                        <label for="1">
                                                                                            <input type="radio" name="rating" id="" class="" value="5">
                                                                                            <br>
                                                                                            5
                                                                                        </label>
                                                                                        <br>
                                                                                    </div>
                                                                                    <div class="col-sm-12 mt-3">
                                                                                        <label for="pesan" style="text-align: left !important">Pesan</label>
                                                                                        <textarea name="pesan" id="pesan" cols="30" rows="10" class="form-control"></textarea>
                                                                                    </div>
                                                                                    <div class="col-sm-12 mt-3">
                                                                                        <input type="submit" value="Kirim" class="form-control">
                                                                                    </div>
                                                                                </form>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                {{-- <a href="{{ route('kuis.menujusoal', $kuis->id) }}" class="btn btn-outline-secondary btn-mulai-kuis float-lg-right float-md-none float-sm-none float-none mb-4">Mulai Kuis</a> --}}
                                                            </div>
                                                        </div>
                                                    {{--</div>--}}
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-4 mt-md-3 mt-3 mt-lg-0" data-aos="fade-up" data-aos-delay="300">
                                            <div class="card br-kuis-leaderboard-kuis text-center px-3 pt-3">
                                                <h5 class="br-kuis-leaderboard-text">Leaderboard</h5>
                                                <hr>
                                                <div class="table-responsive-sm">
                                                    <table class="table table-borderless mx-auto mx-auto-sm mx-auto-lg mx-auto-sm">
                                                        <tbody>
                                                            @foreach ($board as $indexkey => $item)
                                                                @php
                                                                    $indexkey++;
                                                                @endphp
                                                                <tr>
                                                                    @if ($indexkey == 1)
                                                                        <td class="align-middle"><img src="{{ asset('/Foto/juara1.png') }}" alt="juara1" class="img-fluid br-kuis-piala pb-1"></td>
                                                                    @elseif ($indexkey == 2)
                                                                        <td class="align-middle"><img src="{{ asset('/Foto/juara2.png') }}" alt="juara1" class="img-fluid br-kuis-piala"></td>
                                                                    @elseif ($indexkey == 3)
                                                                        <td class="align-middle"><img src="{{ asset('/Foto/juara3.png') }}" alt="juara1" class="img-fluid br-kuis-piala"></td>
                                                                    @else
                                                                        <td class="br-kuis-urutan-leaderboard">{{ $indexkey }}</td>
                                                                    @endif
                                                                    <td class="br-kuis-nama-leaderboard align-middle">{{ $item->username }}</td>
                                                                    <td class="br-kuis-waktu-leaderboard align-middle">{{ $item->waktukerja }}</td>
                                                                    <td class="br-kuis-score-leaderboard align-middle">{{ $item->nilai }}</td>
                                                                </tr>
                                                            @endforeach
                                                        </tbody>
                                                        <tfoot>
                                                            <tr>
                                                                <td colspan="4">
                                                                    {{-- <a href="#" class="br-kuis-show-all">Show All<a> --}}
                                                                    <button type="button" class="br-kuis-show-all" data-toggle="modal" data-target="#modalLeader" style="background: transparent; border: 0;">
                                                                        Show All
                                                                    </button>
                                                                </td> {{-- pas di klik pop-up --}}
                                                            </tr>
                                                            @if (empty($boarduser))
                                                                <tr class="br-kuis-score-user">
                                                                    <td colspan="4" class="br-kuis-play-kuis">Play Your Kuiz First</td>
                                                                </tr>
                                                            @else
                                                                @foreach ($showboard as $indexkey => $item)
                                                                    @if ($item->id_user == Auth::user()->id)
                                                                        @php
                                                                            $indexkey++;
                                                                        @endphp
                                                                        <tr class="br-kuis-score-user">
                                                                            @if ($indexkey == 1)
                                                                                <td class="align-middle"><img src="{{ asset('/Foto/juara1.png') }}" alt="juara1" class="img-fluid br-kuis-piala pb-1"></td>
                                                                            @elseif ($indexkey == 2)
                                                                                <td class="align-middle"><img src="{{ asset('/Foto/juara2.png') }}" alt="juara1" class="img-fluid br-kuis-piala"></td>
                                                                            @elseif ($indexkey == 3)
                                                                                <td class="align-middle"><img src="{{ asset('/Foto/juara3.png') }}" alt="juara1" class="img-fluid br-kuis-piala"></td>
                                                                            @else
                                                                                <td class="br-kuis-urutan-leaderboard-saya align-middle">{{ $indexkey }}</td>
                                                                            @endif
                                                                            <td class="br-kuis-nama-leaderboard-user align-middle">{{ $item->username }}</td>
                                                                            <td class="br-kuis-waktu-leaderboard-user align-middle">{{ $item->waktukerja }}</td>
                                                                            <td class="br-kuis-score-leaderboard-user align-middle">{{ $item->nilai }}</td>
                                                                        </tr>
                                                                    @endif
                                                                @endforeach
                                                            @endif
                                                        </tfoot>
                                                    </table>
                                                    {{-- triggermodal --}}
                                                    <div class="modal fade" id="modalLeader" tabindex="-1" role="dialog" aria-labelledby="exampleModalLeader" aria-hidden="true">
                                                        <div class="modal-dialog dialogwidth" role="document" >
                                                            <div class="modal-content">
                                                                <div class="modal-header text-center">
                                                                    <h5 class="modal-title w-100" id="exampleModalLeader" >LeaderBoard</h5>
                                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                    </button>
                                                                </div>
                                                                <div class="modal-body scrollable">
                                                                    <table id="example" class="table table-striped table-bordered">
                                                                        <thead>
                                                                            <th>Rank</th>
                                                                            <th>Username</th>
                                                                            <th>Score</th>
                                                                            <th>Time Solved</th>
                                                                            <th>Kategori</th>
                                                                            <th>Topic</th>
                                                                        </thead>
                                                                        <tbody>
                                                                            @foreach ($showboard as $indexkey => $item)
                                                                                <tr class="text-center">
                                                                                    @php
                                                                                        $indexkey++;
                                                                                    @endphp
                                                                                    @if ($indexkey == 1)
                                                                                        <th scope="row"><i class="fas fa-trophy text-warning"></i></th>
                                                                                    @elseif($indexkey == 2)
                                                                                        <th scope="row"><i class="fas fa-trophy text-secondary"></i></th>
                                                                                    @elseif($indexkey == 3)
                                                                                        <th scope="row"><i class="fas fa-trophy" style="color: brown;"></i></th>
                                                                                    @else
                                                                                        <th scope="row">{{ $indexkey }}</th>
                                                                                    @endif
                                                                                    {{-- <th scope="row">{{ $indexkey+1 }}</th> --}}
                                                                                    <td>{{ $item->username }}</td>
                                                                                    <td>{{ $item->nilai }}</td>
                                                                                    <td>{{ $item->waktukerja }}</td>
                                                                                    <td>{{ $item->kategori }}</td>
                                                                                    <td>{{ $item->topic }}</td>
                                                                                </tr>
                                                                            @endforeach
                                                                        </tbody>
                                                                    </table>
                                                                </div>
                                                                {{-- <div class="modal-footer">
                                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                                    <button type="button" class="btn btn-primary">Save changes</button>
                                                                </div> --}}
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </section>
                        @else
                            {{-- <p>blm join premium</p> --}}
                            <section class="br-kuis-detail-kuis">
                                <div class="container">
                                    <div class="row">
                                        <div class="col-lg-12" style="text-align: center;">
                                            <img src="{{ asset('/Foto/forbidden.jpg') }}" class="img-fluid mx-auto d-block mt-5" alt="">
                                            <h3 style="color:#242424; font-weight:700;" class="text-center mt-3">Oops!</h3>
                                            <h4 class="text-center" style="color:#242424; font-weight:400;">Anda Harus Membeli Kelas "{{ $kuis->kelas->kelas }}" Sebelum mengakses halaman ini!</h4>
                                            <a href="{{ url('/kelas') }}" class="btn btn-primary text-white mt-3">Kembali Ke Kelas</a>
                                        </div>
                                    </div>
                                </div>
                            </section>
                        @endif
                    @endif
                @elseif(Auth::user()->roles == 'MENTOR')
                    <section class="br-kuis-detail-kuis">
                        <div class="container">
                            <div class="row">
                                <div class="col-lg-12" style="text-align: center;">
                                    <img src="{{ asset('/Foto/forbidden.jpg') }}" class="img-fluid mx-auto d-block mt-5" alt="">
                                    <h3 style="color:#242424; font-weight:700;" class="text-center mt-3">Oops!</h3>
                                    <h4 class="text-center" style="color:#242424; font-weight:400;">Anda Login Sebagai Mentor. tidak memiliki akses untuk halaman ini!</h4>
                                    <a href="{{ url('/') }}" class="btn btn-primary text-white mt-3">Kembali Ke Home</a>
                                </div>
                            </div>
                        </div>
                    </section>
                @else
                    <section class="br-kuis-detail-kuis">
                        <div class="container">
                            <div class="row">
                                <div class="col-lg-12" style="text-align: center;">
                                    <img src="{{ asset('/Foto/forbidden.jpg') }}" class="img-fluid mx-auto d-block mt-5" alt="">
                                    <h3 style="color:#242424; font-weight:700;" class="text-center mt-3">Oops!</h3>
                                    <h4 class="text-center" style="color:#242424; font-weight:400;">Anda Login Sebagai Admin. tidak memiliki akses untuk halaman ini!</h4>
                                    <a href="{{ url('/') }}" class="btn btn-primary text-white mt-3">Kembali Ke Home</a>
                                </div>
                            </div>
                        </div>
                    </section>
                @endif
            @elseif($kuis->jenis == 'lainnya')
                <section class="br-kuis-detail-kuis">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-8 text-center text-sm-center text-md-center text-lg-left">
                                <div class="card br-kuis-card-kuis px-3 pt-3" data-aos="fade-up" data-aos-delay="300">
                                    <div class="row">
                                        {{--<div class="media" style="border:1px solid green;">--}}
                                        <div class="col-lg-4 col-md-8 col-sm-12 col-12 mx-md-auto">
                                            <img class="mr-3 pl-2" src="{{ asset('/gambar_kuis/'.$kuis->gambar) }}" alt="Generic placeholder image" height="140" width="200">
                                        </div>
                                        <div class="col-lg-8 col-md-8 col-sm-12 col-12 mx-md-auto mx-lg-0 mx-sm-auto mx-auto">
                                            <div class="media-body">
                                                <div class="row">
                                                    <div class="col-xl-8 col-lg-8 col-md-8 col-sm-12 col-12">
                                                        <h5 class="mt-0 mt-md-3 br-kuis-nama-kuis">{{ $kuis->nama_kuis }}</h5>
                                                    </div>
                                                    <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12 mx-auto">
                                                        {{--<p class="text-responsive br-kuis-deskripsi-kuis align-middle mt-0 mt-md-3 align-middle">--}}
                                                            <div class="mt-xl-3 mt-lg-3 mt-md-0 mt-sm-0 mt-0 float-xl-right float-lg-right float-md-none float-sm-none float-none">
                                                                <img src="{{ asset('/Foto/bintang.png') }}" class="img-fluid mb-1" alt="" style="">
                                                                <span class="rating-jumlah-detail-kuis pt-1" style="">{{ number_format($angkarating, 1) }}</span>
                                                                <span>({{ $tutul }})</span>
                                                            </div>
                                                            {{--<span class="rating-jumlah-detail-kuis" style="border:1px solid black;">{{ number_format($angkarating, 1) }}</span> <span>({{ $tutul }})</span>--}}
                                                            {{--{{ number_format($angkarating, 1) }} ({{ $jumlah }})--}}
                                                        {{--</p>--}}
                                                    </div>
                                                </div>
                                                <p class="br-kuis-kategori-kuis">
                                                    {{ $kuis->kategori }} - {{ $kuis->topic }}
                                                </p>
                                                <p class="text-responsive br-kuis-deskripsi-kuis">
                                                    {{ $kuis->deskripsi }}
                                                </p>
                                                {{--<p class="text-responsive br-kuis-deskripsi-kuis align-middle">
                                                    <img src="{{ asset('/Foto/bintang.png') }}" class="img-fluid" alt="">
                                                    <span class="rating-jumlah-detail-kuis">{{ number_format($angkarating, 1) }}</span> <span>({{ $tutul }})</span>
                                                </p>--}}
                                                @guest
                                                    <button class="btn btn-outline-secondary btn-mulai-kuis float-lg-right float-md-none float-sm-none float-none mb-4" onclick="login();">Mulai Kuis</button>
                                                @else
                                                    @if (Auth::user()->roles == 'USERS')
                                                        @if (@$valnilai->nilai_awal == null && @strval($valnilai->nilai_akhir) != null)
                                                            <a href="#" onclick="duakali(); return false" class="btn btn-outline-secondary btn-mulai-kuis float-lg-right float-md-none float-sm-none float-none mb-4">Mulai Lagi</a>
                                                            @if ($cekrating == false)
                                                                <button type="button" class="btn btn-primary d-block mb-3" data-toggle="modal" data-target="#ModalRatingKuis">
                                                                    Rate
                                                                </button>
                                                            @else
                                                                <button class="btn btn-primary" onclick="sudahrate();">Rate</button>
                                                            @endif
                                                        @elseif(@$valnilai->nilai_awal == null)
                                                            <a href="{{ route('kuis.menujusoal', $kuis->slug) }}" class="btn btn-outline-secondary btn-mulai-kuis float-lg-right float-md-none float-sm-none float-none mb-4">Mulai Kuis</a>
                                                            @if (@strval($valnilai->nilai_awal) == '0')
                                                                @if ($cekrating == false)
                                                                    <button type="button" class="btn btn-primary d-block mb-3" data-toggle="modal" data-target="#ModalRatingKuis">
                                                                        Rate
                                                                    </button>
                                                                @else
                                                                    <button class="btn btn-primary" onclick="sudahrate();">Rate</button>
                                                                @endif
                                                            @endif
                                                        {{-- @elseif(strval($valnilai->nilai_awal) == '0')
                                                            <a href="{{ route('kuis.menujusoal', $kuis->slug) }}" class="btn btn-outline-secondary btn-mulai-kuis float-lg-right float-md-none float-sm-none float-none mb-4" onclick="return confirm('Anda Yakin Ingin Mengulangi? Hanya Dapat Mengerjakan 1x lagi')">Mulai Kuis</a>
                                                            @if ($cekrating == false)
                                                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#ModalRatingKuis">
                                                                    Rate
                                                                </button>
                                                            @endif --}}
                                                            {{-- pembatas --}}
                                                        {{-- @elseif($valnilai->nilai_awal == 100) --}}
                                                            {{-- <a href="#" onclick="alert('Nilai Kamu Sudah Sempurna'); return false" class="btn btn-outline-secondary btn-mulai-kuis float-lg-right float-md-none float-sm-none float-none mb-4">Start</a> --}}
                                                        @elseif (strval($valnilai->nilai_akhir) == null)
                                                            <a onclick="ulang('{{ route('kuis.menujusoal', $kuis->slug) }}'); return false" class="btn btn-outline-secondary btn-mulai-kuis float-lg-right float-md-none float-sm-none float-none mb-4">Kerja Lagi</a>
                                                            @if ($cekrating == false)
                                                                <a type="button" style="cursor: pointer; color:blue; text-decoration:underline;" data-toggle="modal" data-target="#ModalRatingKuis" class="d-block mb-3">
                                                                    Rate
                                                                </a>
                                                            @else
                                                                <a class="" style="cursor: pointer; color:blue; text-decoration:underline;" onclick="sudahrate();">Rate</a>
                                                            @endif
                                                        @elseif($valnilai->nilai_awal && strval($valnilai->nilai_akhir) != null)
                                                            <a href="#" onclick="duakali(); return false" class="btn btn-outline-secondary btn-mulai-kuis float-lg-right float-md-none float-sm-none float-none mb-4">Kerja Lagi</a>
                                                            @if ($cekrating == false)
                                                                <a type="button" style="cursor: pointer; color:blue; text-decoration:underline;" data-toggle="modal" data-target="#ModalRatingKuis">
                                                                    Rate
                                                                </a>
                                                            @else
                                                                <a style="cursor: pointer; color:blue; text-decoration:underline;" onclick="sudahrate();" class="d-block mb-3">Rate</a>
                                                            @endif
                                                        @endif
                                                    @elseif (Auth::user()->roles == 'MENTOR')
                                                        <a href="#" onclick="isMentor(); return false" class="btn btn-outline-secondary btn-mulai-kuis float-lg-right float-md-none float-sm-none float-none mb-4">Mulai Kuis</a>
                                                    @elseif (Auth::user()->roles == 'ADMIN')
                                                        <a href="#" onclick="isAdmin(); return false" class="btn btn-outline-secondary btn-mulai-kuis float-lg-right float-md-none float-sm-none float-none mb-4">Mulai Kuis</a>
                                                    @endif
                                                @endguest
                                                @if(count($errors) > 0)
                                                    <div class="alert alert-danger">
                                                        @foreach ($errors->all() as $error)
                                                        <div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                                                            <div class="modal-dialog" role="document">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    Error
                                                                </div>
                                                                <div class="modal-body">
                                                                    {{ $error }} <br>
                                                                </div>
                                                                {{--<div class="modal-footer">
                                                                    <button type="button" class="btn btn-primary" onclick="event.preventDefault(); location.href='{{route('user.profile.edit',Auth::user()->id)}}';">Lengkapi</button>
                                                                </div>--}}
                                                            </div>
                                                            </div>
                                                        </div>
                                                        @endforeach
                                                    </div>
                                                @endif
                                                {{-- modal --}}
                                                <div class="modal fade" id="ModalRatingKuis" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="exampleModalLabel">Rating Kuis <small>'{{ $kuis->nama_kuis }}'</small></h5>
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <form action="{{ route('kuis.rating', $kuis->slug) }}" method="post">
                                                                    @csrf
                                                                    @method('POST')
                                                                    <div class="col-sm-12 text-center">
                                                                        <label for="1">
                                                                            <input type="radio" name="rating" id="" class="" value="1" required>
                                                                            <br>
                                                                            1
                                                                        </label>
                                                                        <label for="1">
                                                                            <input type="radio" name="rating" id="" class="" value="2">
                                                                            <br>
                                                                            2
                                                                        </label>
                                                                        <label for="1">
                                                                            <input type="radio" name="rating" id="" class="" value="3">
                                                                            <br>
                                                                            3
                                                                        </label>
                                                                        <label for="1">
                                                                            <input type="radio" name="rating" id="" class="" value="4">
                                                                            <br>
                                                                            4
                                                                        </label>
                                                                        <label for="1">
                                                                            <input type="radio" name="rating" id="" class="" value="5">
                                                                            <br>
                                                                            5
                                                                        </label>
                                                                        <br>
                                                                    </div>
                                                                    <div class="col-sm-12 mt-3">
                                                                        <label for="pesan" style="text-align: left !important">Pesan</label>
                                                                        <textarea name="pesan" id="pesan" cols="30" rows="10" class="form-control" required></textarea>
                                                                    </div>
                                                                    <div class="col-sm-12 mt-3">
                                                                        <input type="submit" value="Kirim" class="btn btn-primary form-control">
                                                                    </div>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                {{-- <a href="{{ route('kuis.menujusoal', $kuis->id) }}" class="btn btn-outline-secondary btn-mulai-kuis float-lg-right float-md-none float-sm-none float-none mb-4">Mulai Kuis</a> --}}
                                            </div>
                                        </div>
                                        {{--</div>--}}
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 mt-md-3 mt-3 mt-lg-0" data-aos="fade-up" data-aos-delay="300">
                                <div class="card br-kuis-leaderboard-kuis text-center px-3 pt-3">
                                    <h5 class="br-kuis-leaderboard-text">Leaderboard</h5>
                                    <hr>
                                    <div class="table-responsive-sm">
                                        <table class="table table-borderless mx-auto mx-auto-sm mx-auto-lg mx-auto-sm">
                                            <tbody>
                                                @foreach ($board as $indexkey => $item)
                                                    @php
                                                        $indexkey++;
                                                    @endphp
                                                    <tr>
                                                        @if ($indexkey == 1)
                                                            <td class="align-middle"><img src="{{ asset('/Foto/juara1.png') }}" alt="juara1" class="img-fluid br-kuis-piala pb-1"></td>
                                                        @elseif ($indexkey == 2)
                                                            <td class="align-middle"><img src="{{ asset('/Foto/juara2.png') }}" alt="juara1" class="img-fluid br-kuis-piala"></td>
                                                        @elseif ($indexkey == 3)
                                                            <td class="align-middle"><img src="{{ asset('/Foto/juara3.png') }}" alt="juara1" class="img-fluid br-kuis-piala"></td>
                                                        @else
                                                            <td class="br-kuis-urutan-leaderboard">{{ $indexkey }}</td>
                                                        @endif
                                                        <td class="br-kuis-nama-leaderboard align-middle">{{ $item->username }}</td>
                                                        <td class="br-kuis-waktu-leaderboard align-middle">{{ $item->waktukerja }}</td>
                                                        <td class="br-kuis-score-leaderboard align-middle">{{ $item->nilai }}</td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                            <tfoot>
                                                <tr>
                                                    <td colspan="4">
                                                        {{-- <a href="#" class="br-kuis-show-all">Show All<a> --}}
                                                        <button type="button" class="br-kuis-show-all" data-toggle="modal" data-target="#modalLeader" style="background: transparent; border: 0;">
                                                            Show All
                                                        </button>
                                                    </td> {{-- pas di klik pop-up --}}
                                                </tr>
                                                @if (empty($boarduser))
                                                    <tr class="br-kuis-score-user">
                                                        <td colspan="4" class="br-kuis-play-kuis">Play Your Kuiz First</td>
                                                    </tr>
                                                @else
                                                    @foreach ($showboard as $indexkey => $item)
                                                        @if ($item->id_user == Auth::user()->id)
                                                            @php
                                                                $indexkey++;
                                                            @endphp
                                                            <tr class="br-kuis-score-user">
                                                                @if ($indexkey == 1)
                                                                    <td class="align-middle"><img src="{{ asset('/Foto/juara1.png') }}" alt="juara1" class="img-fluid br-kuis-piala pb-1"></td>
                                                                @elseif ($indexkey == 2)
                                                                    <td class="align-middle"><img src="{{ asset('/Foto/juara2.png') }}" alt="juara1" class="img-fluid br-kuis-piala"></td>
                                                                @elseif ($indexkey == 3)
                                                                    <td class="align-middle"><img src="{{ asset('/Foto/juara3.png') }}" alt="juara1" class="img-fluid br-kuis-piala"></td>
                                                                @else
                                                                    <td class="br-kuis-urutan-leaderboard-saya align-middle">{{ $indexkey }}</td>
                                                                @endif
                                                                <td class="br-kuis-nama-leaderboard-user align-middle">{{ $item->username }}</td>
                                                                <td class="br-kuis-waktu-leaderboard-user align-middle">{{ $item->waktukerja }}</td>
                                                                <td class="br-kuis-score-leaderboard-user align-middle">{{ $item->nilai }}</td>
                                                            </tr>
                                                        @endif
                                                    @endforeach
                                                @endif
                                            </tfoot>
                                        </table>
                                        {{-- triggermodal --}}
                                        <div class="modal fade" id="modalLeader" tabindex="-1" role="dialog" aria-labelledby="exampleModalLeader" aria-hidden="true">
                                            <div class="modal-dialog dialogwidth" role="document" >
                                                <div class="modal-content">
                                                    <div class="modal-header text-center">
                                                        <h5 class="modal-title w-100" id="exampleModalLeader" >LeaderBoard</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body scrollable">
                                                        <table id="example" class="table table-striped table-bordered">
                                                            <thead>
                                                                <th>Rank</th>
                                                                <th>Username</th>
                                                                <th>Score</th>
                                                                <th>Time Solved</th>
                                                                <th>Kategori</th>
                                                                <th>Topic</th>
                                                            </thead>
                                                            <tbody>
                                                                @foreach ($showboard as $indexkey => $item)
                                                                    <tr class="text-center">
                                                                        @php
                                                                            $indexkey++;
                                                                        @endphp
                                                                        @if ($indexkey == 1)
                                                                            <th scope="row"><i class="fas fa-trophy text-warning"></i></th>
                                                                        @elseif($indexkey == 2)
                                                                            <th scope="row"><i class="fas fa-trophy text-secondary"></i></th>
                                                                        @elseif($indexkey == 3)
                                                                            <th scope="row"><i class="fas fa-trophy" style="color: brown;"></i></th>
                                                                        @else
                                                                            <th scope="row">{{ $indexkey }}</th>
                                                                        @endif
                                                                        {{-- <th scope="row">{{ $indexkey+1 }}</th> --}}
                                                                        <td>{{ $item->username }}</td>
                                                                        <td>{{ $item->nilai }}</td>
                                                                        <td>{{ $item->waktukerja }}</td>
                                                                        <td>{{ $item->kategori }}</td>
                                                                        <td>{{ $item->topic }}</td>
                                                                    </tr>
                                                                @endforeach
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                    {{-- <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                        <button type="button" class="btn btn-primary">Save changes</button>
                                                    </div> --}}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            @endif
        @endauth

        <hr>
        @guest
            <section class="br-kuis-detail-kuis">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-8 text-center text-sm-center text-md-center text-lg-left">
                            <div class="card br-kuis-card-kuis px-3 pt-3">
                                <div class="row">
                                    {{--<div class="media" style="border:1px solid green;">--}}
                                        <div class="col-lg-4 col-md-8 col-sm-12 col-12 mx-md-auto">
                                            <img class="mr-3 pl-2" src="{{ asset('/gambar_kuis/'.$kuis->gambar) }}" alt="Generic placeholder image" height="140" width="200">
                                        </div>
                                        <div class="col-lg-8 col-md-8 col-sm-12 col-12 mx-md-auto mx-lg-0 mx-sm-auto mx-auto">
                                            <div class="media-body">
                                                <div class="row">
                                                    <div class="col-lg-8">
                                                        <h5 class="mt-0 mt-md-3 br-kuis-nama-kuis">{{ $kuis->nama_kuis }}</h5>
                                                    </div>
                                                    <div class="col-lg-4">
                                                        {{--<p class="text-responsive br-kuis-deskripsi-kuis align-middle mt-0 mt-md-3 align-middle">--}}
                                                        <div class="mt-xl-3 mt-lg-3 mt-md-0 mt-sm-0 mt-0 float-xl-right float-lg-right float-md-none float-sm-none float-none">
                                                            <img src="{{ asset('/Foto/bintang.png') }}" class="img-fluid mb-1" alt="" style="">
                                                            <span class="rating-jumlah-detail-kuis pt-1" style="">{{ number_format($angkarating, 1) }}</span>
                                                            <span>({{ $tutul }})</span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <p class="br-kuis-kategori-kuis">
                                                    {{ $kuis->kategori }} - {{ $kuis->topic }}
                                                </p>
                                                <p class="text-responsive br-kuis-deskripsi-kuis">
                                                    {{ $kuis->deskripsi }}
                                                </p>
                                                {{--<p class="text-responsive br-kuis-deskripsi-kuis align-middle">
                                                    <img src="{{ asset('/Foto/bintang.png') }}" class="img-fluid" alt="">
                                                    <span class="rating-jumlah-detail-kuis">{{ number_format($angkarating, 1) }}</span> <span>({{ $tutul }})</span>
                                                </p>--}}
                                                @guest
                                                    <button class="btn btn-outline-secondary btn-mulai-kuis float-lg-right float-md-none float-sm-none float-none mb-4" onclick="login();">Mulai Kuis</button>
                                                @endguest
                                                {{-- <a href="{{ route('kuis.menujusoal', $kuis->id) }}" class="btn btn-outline-secondary btn-mulai-kuis float-lg-right float-md-none float-sm-none float-none mb-4">Mulai Kuis</a> --}}
                                            </div>
                                        </div>
                                    {{--</div>--}}
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 mt-md-3 mt-3 mt-lg-0" data-aos="fade-up" data-aos-delay="300">
                            <div class="card br-kuis-leaderboard-kuis text-center px-3 pt-3">
                                <h5 class="br-kuis-leaderboard-text">Leaderboard</h5>
                                <hr>
                                <div class="table-responsive-sm">
                                    <table class="table table-borderless mx-auto mx-auto-sm mx-auto-lg mx-auto-sm">
                                        <tbody>
                                            @foreach ($board as $indexkey => $item)
                                                @php
                                                    $indexkey++;
                                                @endphp
                                                <tr>
                                                    @if ($indexkey == 1)
                                                        <td class="align-middle"><img src="{{ asset('/Foto/juara1.png') }}" alt="juara1" class="img-fluid br-kuis-piala pb-1"></td>
                                                    @elseif ($indexkey == 2)
                                                        <td class="align-middle"><img src="{{ asset('/Foto/juara2.png') }}" alt="juara1" class="img-fluid br-kuis-piala"></td>
                                                    @elseif ($indexkey == 3)
                                                        <td class="align-middle"><img src="{{ asset('/Foto/juara3.png') }}" alt="juara1" class="img-fluid br-kuis-piala"></td>
                                                    @else
                                                        <td class="br-kuis-urutan-leaderboard">{{ $indexkey }}</td>
                                                    @endif
                                                    <td class="br-kuis-nama-leaderboard align-middle">{{ $item->username }}</td>
                                                    <td class="br-kuis-waktu-leaderboard align-middle">{{ $item->waktukerja }}</td>
                                                    <td class="br-kuis-score-leaderboard align-middle">
                                                        {{-- @if ($item->nilai_awal >= $item->nilai_akhir)
                                                            {{ $item->nilai_awal }}
                                                        @else
                                                            {{ $item->nilai_akhir }}
                                                        @endif --}}
                                                        {{ $item->nilai }}
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <td colspan="4">
                                                    {{-- <a href="#" class="br-kuis-show-all">Show All<a> --}}
                                                    <button type="button" class="br-kuis-show-all" data-toggle="modal" data-target="#modalLeader" style="background: transparent; border: 0;">
                                                        Show All
                                                    </button>
                                                </td> {{-- pas di klik pop-up --}}
                                            </tr>
                                            @if (empty($boarduser))
                                                <tr class="br-kuis-score-user">
                                                    <td colspan="4" class="br-kuis-play-kuis">Play Your Kuiz First</td>
                                                </tr>
                                            @else
                                                @foreach ($showboard as $indexkey => $item)
                                                    @if ($item->id_user == Auth::user()->id)
                                                        @php
                                                            $indexkey++;
                                                        @endphp
                                                        <tr class="br-kuis-score-user">
                                                            @if ($indexkey == 1)
                                                                <td class="align-middle"><img src="{{ asset('/Foto/juara1.png') }}" alt="juara1" class="img-fluid br-kuis-piala pb-1"></td>
                                                            @elseif ($indexkey == 2)
                                                                <td class="align-middle"><img src="{{ asset('/Foto/juara2.png') }}" alt="juara1" class="img-fluid br-kuis-piala"></td>
                                                            @elseif ($indexkey == 3)
                                                                <td class="align-middle"><img src="{{ asset('/Foto/juara3.png') }}" alt="juara1" class="img-fluid br-kuis-piala"></td>
                                                            @else
                                                                <td class="br-kuis-urutan-leaderboard-saya align-middle">{{ $indexkey }}</td>
                                                            @endif
                                                            <td class="br-kuis-nama-leaderboard-user align-middle">{{ $item->username }}</td>
                                                            <td class="br-kuis-waktu-leaderboard-user align-middle">{{ $item->waktukerja }}</td>
                                                            <td class="br-kuis-score-leaderboard-user align-middle">{{ $item->nilai }}</td>
                                                        </tr>
                                                    @endif
                                                @endforeach
                                            @endif
                                        </tfoot>
                                    </table>
                                    {{-- triggermodal --}}
                                    <div class="modal fade" id="modalLeader" tabindex="-1" role="dialog" aria-labelledby="exampleModalLeader" aria-hidden="true">
                                        <div class="modal-dialog dialogwidth" role="document" >
                                            <div class="modal-content">
                                                <div class="modal-header text-center">
                                                    <h5 class="modal-title w-100" id="exampleModalLeader" >LeaderBoard</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body scrollable">
                                                    <table id="example" class="table table-striped table-bordered">
                                                        <thead>
                                                            <th>Rank</th>
                                                            <th>Username</th>
                                                            <th>Score</th>
                                                            <th>Time Solved</th>
                                                            <th>Kategori</th>
                                                            <th>Topic</th>
                                                        </thead>
                                                        <tbody>
                                                            @foreach ($showboard as $indexkey => $item)
                                                                <tr class="text-center">
                                                                    @php
                                                                        $indexkey++;
                                                                    @endphp
                                                                    @if ($indexkey == 1)
                                                                        <th scope="row"><i class="fas fa-trophy text-warning"></i></th>
                                                                    @elseif($indexkey == 2)
                                                                        <th scope="row"><i class="fas fa-trophy text-secondary"></i></th>
                                                                    @elseif($indexkey == 3)
                                                                        <th scope="row"><i class="fas fa-trophy" style="color: brown;"></i></th>
                                                                    @else
                                                                        <th scope="row">{{ $indexkey }}</th>
                                                                    @endif
                                                                    {{-- <th scope="row">{{ $indexkey+1 }}</th> --}}
                                                                    <td>{{ $item->username }}</td>
                                                                    <td>{{ $item->nilai }}</td>
                                                                    <td>{{ $item->waktukerja }}</td>
                                                                    <td>{{ $item->kategori }}</td>
                                                                    <td>{{ $item->topic }}</td>
                                                                </tr>
                                                            @endforeach
                                                        </tbody>
                                                    </table>
                                                </div>
                                                {{-- <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                    <button type="button" class="btn btn-primary">Save changes</button>
                                                </div> --}}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        @endguest


        <section class="br-kuis-lain-kategori mt-4 mb-3">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <h5 class="br-kuis-lain-lihat-kategori mt-3">Lihat juga kuis lainnya tentang {{ $kuis->kategori }}</h5>
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="owl-carousel owl-theme carousel-kategori">
                        @forelse ($kuislain as $item)
                            <div class="item item-kuis" data-aos="">
                                <div class="card card-kuis">
                                    <img src="{{ URL::asset('/gambar_kuis/'.$item->gambar) }}" alt="wanita1" class="wanita1 img-fluid">
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="rating-baru mr-auto">
                                                @php
                                                    $total = 0;
                                                    $counter = 0;
                                                @endphp
                                                @foreach ($rating as $value)
                                                    @if ($value->id_kuis == $item->id)
                                                        @php
                                                            $total += intval($value->rating);
                                                            $counter++;
                                                        @endphp
                                                    @endif
                                                @endforeach
                                                @php
                                                    if($total == null){
                                                        $foto = URL::asset('/foto/bintang.png');
                                                        echo "<span class='rating-jumlah'><img src='".$foto."' height='20' width='20' class='mr-1 mb-1'>" . "0" . "<span class='rating-tutul'> (0) </span>"  . "</span>";
                                                    }else{
                                                        $lala = $total / $counter;
                                                        $foto = URL::asset('/foto/bintang.png');
                                                        echo "<span class='rating-jumlah'><img src='".$foto."' height='20' width='20' class='mr-1 mb-1'>" . number_format($lala, 1) . "<span class='rating-tutul'> ($counter) </span>" . "</span>";
                                                    }
                                                @endphp
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="kategori-baru ml-auto">
                                                {{ $item->tingkatan }}
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <h5 class="txt-kelas">{{ $item->nama_kuis }}</h5>
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <p class="br-topik-kuis"> Topik : {{ $item->topic }} </p>
                                            </div>
                                        </div>
                                        <div class="media" style="margin-top:30px;">
                                            <img src="{{ asset('/storage/'.$item->foto_mentor) }}" class="mr-3 img-fluid" style="width:50px; height:50px; border-radius:50px;" alt="people">
                                            <div class="media-body txt-mentor">
                                                <h5 class="mt-0 nama-mentor">{{ $item->nama_mentor }}</h5>
                                                <p class="exp">{{ $item->bidang }}</p>
                                            </div>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="col-lg-12">
                                        <div class="row">
                                            <div class="col-lg-6 col-md-6 col-sm-6 col-12">
                                                <p class="br-tgl">{{ date_format(new DateTime($item->created_at), "Y-m-d") }}</p>
                                            </div>
                                            <div class="col-lg-6 col-md-6 col-sm-6 col-12">
                                                <a href="{{ route('kuis.detailnya', $item->slug) }}" class="btn btn-beli btn-block stretched-link mb-2">Ikut Kuis</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @empty
                            <div class="row">
                                <div class="col-lg-12 text-center">
                                    <h6>Kosong</h6>
                                </div>
                            </div>
                        @endforelse
                    </div>
                </div>
            </div>
        </section>
        <br>
        <section class="br-kuis-lain">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <h5 class="br-kuis-lain-lihat mt-3">Lihat semua kuis lainnya</h5>
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="owl-carousel owl-theme carousel-kategori">
                        @foreach ($kuiskategorilain as $item)
                            <div class="item item-kuis">
                                <div class="card card-kuis" data-aos="zoom-out-up">
                                    <img src="{{ URL::asset('/gambar_kuis/'.$item->gambar) }}" alt="wanita1" class="wanita1 img-fluid">
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="rating-baru mr-auto">
                                                @php
                                                    $total = 0;
                                                    $counter = 0;
                                                @endphp
                                                @foreach ($rating as $value)
                                                    @if ($value->id_kuis == $item->id)
                                                        @php
                                                            $total += intval($value->rating);
                                                            $counter++;
                                                        @endphp
                                                    @endif
                                                @endforeach
                                                @php
                                                    if($total == null){
                                                        $foto = URL::asset('/foto/bintang.png');
                                                        echo "<span class='rating-jumlah'><img src='".$foto."' height='20' width='20' class='mr-1 mb-1'>" . "0" . "<span class='rating-tutul'> (0) </span>"  . "</span>";
                                                    }else{
                                                        $lala = $total / $counter;
                                                        $foto = URL::asset('/foto/bintang.png');
                                                        echo "<span class='rating-jumlah'><img src='".$foto."' height='20' width='20' class='mr-1 mb-1'>" . number_format($lala, 1) . "<span class='rating-tutul'> ($counter) </span>" . "</span>";
                                                    }
                                                @endphp
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="kategori-baru ml-auto">
                                                {{ $item->tingkatan }}
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <h5 class="txt-kelas">{{ $item->nama_kuis }}</h5>
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <p class="br-topik-kuis"> Topik : {{ $item->topic }} </p>
                                            </div>
                                        </div>
                                        <div class="media" style="margin-top:30px;">
                                            <img src="{{ asset('/storage/'.$item->foto_mentor) }}" class="mr-3 img-fluid" style="width:50px; height:50px; border-radius:50px;" alt="people">
                                            <div class="media-body txt-mentor">
                                                <h5 class="mt-0 nama-mentor">{{ $item->nama_mentor }}</h5>
                                                <p class="exp">{{ $item->bidang }}</p>
                                            </div>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="col-lg-12">
                                        <div class="row">
                                            <div class="col-lg-6 col-md-6 col-sm-6 col-12">
                                                <p class="br-tgl">{{ date_format(new DateTime($item->created_at), "Y-m-d") }}</p>
                                            </div>
                                            <div class="col-lg-6 col-md-6 col-sm-6 col-12">
                                                <a href="{{ route('kuis.detailnya', $item->slug) }}" class="btn btn-beli btn-block stretched-link mb-2">Ikut Kuis</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </section>

    </main>

    @include('includes.footer')

</body>
</html>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.22/js/dataTables.bootstrap4.min.js"></script>
<script src="https://code.jquery.com/ui/1.11.3/jquery-ui.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/js/all.min.js"></script>
<script src="{{ URL::asset('dist/owl.carousel.min.js') }}"></script>
<script src="{{ URL::asset('mouse/query/jquery.mousewheel.min.js') }}"></script>
<script src="https://unpkg.com/aos@next/dist/aos.js"></script>
    <script>
      AOS.init({
        //  offset:400,
          duration:1000
      });
    </script>

    <script>
        $(document).ready(function(){
            $('#exampleModalLong').modal('show');
        });
    </script>

<script>

    $(document).ready(function(){
        $('.carousel-kategori').owlCarousel({
            //autoplay:true,
            autoplayHoverPause:true,
            //loop:false,
            margin:40,
            //nav:true,
            //lazyload:true,
            // margin:10,
            // stagePadding:5,
            responsive:{
                0:{
                    items:1,
                    dots:true
                },
                480:{
                    items:1,
                    dots:true
                },
                600:{
                    items:2,
                    dots:true
                },
                1000:{
                    items:3,
                    dots:true
                },
                1263:{
                    items:3,
                    dots:true
                }
            }
        });
    });

    $(document).ready(function() {
        $('#example').DataTable({
            "lengthChange": false,
            "info": false,
            "ordering": false
        });
        $('.modal-content').resizable({
            //alsoResize: ".modal-dialog",
            minHeight: 300,
            minWidth: 700
        });
        $('.modal-dialog').draggable();

        $('#myModal').on('show.bs.modal', function() {
            $(this).find('.modal-body').css({
                'max-height': '100%'
            });
        });
    });

    $(document).ready(function(){
        $('.card-kuis').hover(
            function(){
                $(this).animate({
                    marginTop: '-2px',
                },200);
            },
            function(){
                $(this).animate({
                    marginTop: '0px'
                });
            }
        );
    });
</script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

<script>
    function sudahrate(){
        swal({
            title: 'Ups',
            text: 'Kamu Sudah Memberikan Rating',
            icon: 'error'
        });
    }
    function isMentor(){
        swal({
            title: 'Ups',
            text: 'Anda Login Sebagai Mentor',
            icon: 'error'
        });
    }

    function isAdmin(){
        swal({
            title: 'Ups',
            text: 'Anda Login Sebagai Admin',
            icon: 'error'
        });
    }
    function duakali(){
        swal({
            title: 'Ups',
            text: 'Kamu Sudah Mengerjakan 2x',
            icon: 'error'
        });
    }

    function login(){
        swal({
            title: 'Ups',
            text: 'Login Dulu Ya!',
            icon: 'error'
        }).then(function(){
            window.location.href='/login';
        });
    }
    function ulang(slug){
        swal({
            title: 'Warning',
            text: 'Anda Yakin Ingin Mengulangi? Hanya Dapat Mengerjakan 1 Kali lagi',
            icon: 'warning',
            buttons: [
                'Tidak, Batalkan!',
                'Ya, Saya Yakin!'
            ],
            dangerMode: true,
        }).then(function(Yakin){
            if(Yakin){
                window.location.href = slug;
            }else{
                return false;
            }
        });
        $('.swal-text').addClass("text-center");
        $('.swal-button--cancel').addClass("bg-danger text-white");
        $('.swal-button--confirm').removeClass("swal-button--danger").addClass("bg-primary");
    }

    //

    function kkm(){
        swal({
            title: 'Ups',
            text: 'Kuis Terakhir Harus Tuntas Minimal 90 Untuk Claim',
            icon: 'warning'
        });
    }
</script>
