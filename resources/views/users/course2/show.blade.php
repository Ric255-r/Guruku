@extends('users.defaults2.app')


@section('content')
    {{--<p style="margin-top:300px;">Hai</p>--}}
    {{-- <div class="row">
        <div class="col-lg-12">
            <div class="row">
                <div class="col-lg-6">
                    <p class="mt-3" style="font-weight: bold; font-size:20px; color:#1d1d1d;">{{ $videodetails->nama }}</p>
                    <p>Materi bagian : {{ $videodetails->video->judul }}</p>
                </div>
                <div class="col-lg-6">
                    @if ($videodetails->kelas->link_konsul == !null)
                        <p class="mt-3" style="font-weight: bold; font-size:20px; color:#1d1d1d;">Link Konsultasi/Diskusi</p>
                        <a href="{{ $videodetails->kelas->link_konsul }}">{{ $videodetails->kelas->link_konsul }}</a>
                    @else
                        <p class="mt-3" style="font-weight: bold; font-size:20px; color:#1d1d1d;">Link Konsultasi/Diskusi</p>
                        <a href="#">Tidak Tersedia</a>
                    @endif
                </div>
            </div>
            <iframe width="90%" height="450" src="https://www.youtube.com/embed/{{ $videodetails->file }}" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
        </div>
    </div> --}}

    <div class="container-fluid bg-dark" style="z-index: -1;">
        <div class="row pl-5">
            <div class="col-lg-12">
                <div class="row" style="padding-top:100px;">
                    <div class="col-lg-4">
                        <p class="mt-3" style="font-weight: bold; font-size:20px; color:#ffff;">{{ $videodetails->nama }}</p>
                        <p style="color:#ffff;">Materi bagian : {{ $videodetails->video->judul }}</p>
                        {{--{{ $jenis }}--}}
                    </div>
                    <div class="col-lg-4">
                        @if ($videodetails->kelas->link_konsul == !null)
                            <p class="mt-3" style="font-weight: bold; font-size:20px; color:#ffff;">Link Konsultasi/Diskusi</p>
                            <a style="color:#ffff; text-decoration:underline;" href="{{ $videodetails->kelas->link_konsul }}">{{ $videodetails->kelas->link_konsul }}</a>
                        @else
                            <p class="mt-3" style="font-weight: bold; font-size:20px; color:#ffff;">Link Konsultasi/Diskusi</p>
                            <a href="#" style="color:#ffff;">Tidak Tersedia</a>
                        @endif
                    </div>
                    <div class="col-lg-2">
                        @if ($cekrating == false)
                            <div class="form-group col-sm-12 mt-5 ml-5">
                                <button type="button" class="btn btn-info btn-block" data-toggle="modal" data-target="#ModalRatingKelas">
                                    Rating Kelas ini
                                </button>
                            </div>
                        @else
                            <input type="hidden">
                        @endif
                    </div>
                </div>
                {{-- <div class="row">
                    <div class="col-lg-12">
                        <p class="mt-3" style="font-weight: bold; font-size:20px; color:#1d1d1d;">{{ $videodetails->nama }}</p>
                    </div>
                    <div class="col-5 text-right mt-3">
                    </div>
                </div>
                <p>Materi bagian : {{ $videodetails->video->judul }}</p> --}}
            </div>
            <div class="col-lg-12">
                <iframe width="90%" height="450" src="https://www.youtube.com/embed/{{ $videodetails->file }}" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                <div class="row" style="width: 92%" class="buatbutton">
                    <div class="col-6"></div>
                    <div class="col-2">
                        @if (!isset($cekfield) || $cekfield->alert == false)
                            <form action="{{ route('alert.course', $videodetails->id) }}" method="post">
                                @csrf
                                @method('PUT')
                                {{-- jadikan True --}}
                                <input type="submit" value="Bookmark" class="btn btn-warning btn-block">
                            </form>
                        @elseif ($cekfield->alert == true)
                            <form action="{{ route('alert.course', $videodetails->id) }}" method="post">
                                @csrf
                                @method('PUT')
                                {{-- Jadikan False --}}
                                <input type="submit" value="Turn Off Bookmark" class="btn btn-warning btn-block">
                            </form>
                        @endif
                    </div>
                    @if ($videodetails->number == $maxValue)
                        <div class="col-2">
                            <form action="{{ route('reset.course', $videodetails->products_slug) }}" method="post">
                                @csrf
                                @method('PUT')
                                <input class="btn btn-danger btn-block" type="submit" value="Reset All" onclick="return confirm('Anda Yakin Ingin Mereset semua course anda?')">
                            </form>
                        </div>
                    @endif
                    <div class="col-2">
                        @if (!isset($cekfield) || $cekfield->status == 'PENDING')
                            <form action="" method="post" id="formselesai">
                                @csrf
                                @method('PUT')
                                <input type="submit" id="btnselesai" value="Selesai" class="btn btn-primary btn-block" onclick="pending(); return false">
                            </form>
                        @endif
                        @if ($videodetails->link_kuis == "-")
                            <script>
                                let btnselesai = document.getElementById('btnselesai');
                                document.getElementById('formselesai').action = "{{ route('play.done', $videodetails->id) }}";
                                btnselesai.removeAttribute("onclick");
                                btnselesai.onclick = function(){
                                    selesai();
                                };
                            </script>
                        @elseif($videodetails->number == $maxValue)
                           @foreach ($kuisakhir as $item)
                                @if ($videodetails->link_kuis == $item->slug)
                                    @foreach ($nilainya as $nin)
                                        @if ($item->id == $nin->id_kuis)
                                            <script>
                                                let btnselesai = document.getElementById('btnselesai');
                                                document.getElementById('formselesai').action = "{{ route('play.done', $videodetails->id) }}";
                                                btnselesai.removeAttribute("onclick");
                                                btnselesai.onclick = function(){
                                                    selesai();
                                                }
                                            </script>
                                        @endif
                                    @endforeach
                                @endif
                            @endforeach
                        @else
                            @foreach ($kuisbiasa as $item)
                                @if ($videodetails->link_kuis == $item->slug)
                                    @foreach ($nilainya as $nin)
                                        @if ($item->id == $nin->id_kuis)
                                            <script>
                                                let btnselesai = document.getElementById('btnselesai');
                                                document.getElementById('formselesai').action = "{{ route('play.done', $videodetails->id) }}";
                                                btnselesai.removeAttribute("onclick");
                                                btnselesai.onclick = function(){
                                                    selesai();
                                                }
                                            </script>
                                        @endif
                                    @endforeach
                                @endif
                            @endforeach
                        @endif
                    </div>
                </div>
                <br>
                <div class="row text-right" style="width: 92%;">
                    {{--@if ($cekrating == false)
                        <div class="form-group col-sm-12" style="border:1px solid blue;">
                            <button type="button" class="btn btn-info" data-toggle="modal" data-target="#ModalRatingKelas">
                                Rating Kelas ini
                            </button>
                        </div>
                    @else
                        <input type="hidden">
                    @endif--}}
                </div>
                <!-- Modal -->
                <div class="modal fade" id="ModalRatingKelas" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Rating Kelas {{ $videodetails->products_id }}</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form action="{{ route('play.rate', $videodetails->products_slug) }}" method="post">
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
            </div>
            {{--<div class="col-lg-12 text-right">
            </div>--}}
        </div>

        <div class="row mt-5">
            <div class="col-lg-6 pl-5">
                {{--modul pembelajaran --}}
                <h4 class="text-white">Modul Pembelajaran</h4>
                <table class="table table-borderless text-white">
                    <tbody>
                        @forelse ($modul as $query)
                            @if ($query->details->id == $query->videodetails_id)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    @if (strpos($query->file, ".pdf") !== false)
                                        <td>
                                            <a href="{{ asset('/storage/'.$query->file) }}" 
                                                style="color:#ffff; text-decoration:underline;" download="{{ $query->file }}">
                                                {{ $query->nama_modul }}
                                            </a>
                                            <button class="btn btn-info ml-2" onclick="getModal('{{ $query->file }}', '{{ $query->nama_modul }}'); return false">
                                                <i class="fa fa-eye" ></i>
                                            </button>
                                        </td>
                                    @else
                                        <td>
                                            <a href="{{ asset('/storage/'.$query->file) }}" 
                                                style="color:#ffff; text-decoration:underline;" download="{{ $query->file }}">
                                                {{ $query->nama_modul }}
                                            </a>
                                        </td>
                                    @endif
                                </tr>
                            @endif
                        @empty
                            <tr>
                                <td>-</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
                {{--@if ($videodetails->namamodul == null)
                    <p>-</p>
                    @else
                    <table class="table table-responsive-sm">
                        <thead>
                            <tr>
                                <td>
                                    <a href="{{ asset('/storage/'.$videodetails->modul) }}" download="{{ $videodetails->namamodul }}" style="color:#ffff; text-decoration: underline;">{{ $videodetails->namamodul }}</a>
                                </td>
                                <td>
                                    <!-- Button trigger modal -->
                                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalScrollable">
                                        <i class="fa fa-eye"></i>
                                    </button>

                                    <!-- Modal -->
                                    <div class="modal fade bd-example-modal-lg" id="exampleModalScrollable" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
                                        <div class="modal-dialog modal-lg modal-dialog-scrollable" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalScrollableTitle">{{ $videodetails->namamodul }}</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                            </div>
                                            <div class="modal-body">
                                                <iframe src="{{ asset('/storage/'.$videodetails->modul) }}" style="border:none; width:100%; height:700px;"></iframe>
                                            </div>
                                            <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                            <a href="{{ asset('/storage/'.$videodetails->modul) }}" class="btn btn-primary" download="{{ $videodetails->namamodul }}">Download</a>
                                            </div>
                                        </div>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        </thead>
                    </table>
                @endif--}}
            </div>
            <div class="col-lg-6">
                @if ($videodetails->number == $maxValue)
                    <h4 class="text-white">Kuis Akhir</h4>
                @else
                    <h4 class="text-white">Link Kuis</h4>
                @endif
                @if ($videodetails->link_kuis == '-')
                    <a href="#" style="color:#ffff;">{{ $videodetails->link_kuis }}</a>
                @elseif($videodetails->number == $maxValue)
                    @foreach ($kuisakhir as $item)
                        @if ($item->slug == $videodetails->link_kuis)
                            <a href="{{ route('kuis.detailnya', $item->slug) }}" target="_blank" style="color:#ffff; text-decoration:underline;">
                                {{ $item->slug }}
                            </a>
                                @foreach ($nilainya as $nin)
                                    @if ($item->id == $nin->id_kuis)
                                        @if (strval($nin->nilai_akhir) != null)
                                            <b class="ml-2 text-white">{{ $nin->nilai_akhir }}/100</b>
                                        @else
                                            <b class="ml-2 text-white">{{ $nin->nilai_awal }}/100</b>
                                        @endif
                                        <i class='fa fa-check px-2' style='color: green;' aria-hidden='true'></i>
                                    @endif
                                @endforeach
                            {{--</a>--}}
                        @endif
                    @endforeach
                @else
                    <a href="{{ route('kuis.detailnya', $videodetails->link_kuis) }}"  style="color:#ffff; text-decoration:underline;">
                        {{ $videodetails->link_kuis }}
                    </a>
                        @foreach ($kuisbiasa as $item)
                            @if ($videodetails->link_kuis == $item->slug)
                                @foreach ($nilainya as $nin)
                                    @if ($item->id == $nin->id_kuis)
                                        @if (strval($nin->nilai_akhir) != null)
                                            {{-- @if ($nin->nilai_akhir >= $nin->nilai_awal)
                                                <b class="ml-2 text-white">{{ $nin->nilai_akhir }}/100</b>
                                            @else
                                                <b class="ml-2 text-white">{{ $nin->nilai_awal }}/100</b>
                                            @endif --}}
                                            <b class="ml-2 text-white">{{ $nin->nilai_akhir }}/100</b>
                                        @else
                                            <b class="ml-2 text-white">{{ $nin->nilai_awal }}/100</b>
                                        @endif
                                        <i class='fa fa-check px-2' style='color: green;' aria-hidden='true'></i>
                                    @endif
                                @endforeach
                            @endif
                        @endforeach
                    {{--</a>--}}
                @endif
            </div>
            {{--<div class="col-lg-3">
                <h4 class="text-white">Link Blog</h4>
                @if ($videodetails->link_blog == '-')
                    <a href="#" style="color:#ffff;">{{ $videodetails->link_blog }}</a>
                @else
                    <a href="{{ $videodetails->link_blog }}" target="_blank" style="color:#ffff; text-decoration:underline;">{{ $videodetails->link_blog }}</a>
                @endif
            </div>--}}
        </div>

        <div class="row">
            <div class="modal fade" id="modalPDF" tabindex="-1" role="dialog" aria-labelledby="modalPDFTitle" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="judulPDF">Modal title</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body" id="buatpdf" >
                            ...
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>


    <footer class="py-4 bg-dark" style="margin-top:-20px;">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="d-flex justify-content-between ">
                        <div class="text-muted">Copyright &copy; Guruku 2020</div>
                        <div>
                            <a href="#">Privacy Policy</a>
                            &middot;
                            <a href="#">Terms &amp; Conditions</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script>
    function pending(){
        swal({
            title: "Ups",
            text: "Anda Harus Menyelesaikan Kuis Terlebih Dahulu",
            icon: "warning",
        });
    }

    function selesai(){
        swal({
            title: "Sukses",
            text: "Selamat! Anda Telah Menyelesaikan Materi Ini",
            icon: "success",
        });
    }

    function getModal(file, nama){
        $('#modalPDF').modal('show');
        // if(file.includes(".pptx")){
        //     file = file.replace(".pptx", ".pps");
        // }
        document.getElementById('judulPDF').textContent = nama;
        document.getElementById('buatpdf').innerHTML = 
        `<iframe src='http://localhost:8000/storage/${file}' width='100%' height='600px' frameborder='0'>`;

        // $('iframe').contents().find('#titlebar').remove();
    }
</script>


@endsection
