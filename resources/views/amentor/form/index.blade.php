@extends('includes.amentor.app')


@section('content')
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.23/css/jquery.dataTables.min.css">
<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid">
            <h1 class="mt-4">Soal</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item active">Daftar Soal</li>
            </ol>
            <div class="row">
                <div class="col-lg-12">
                    <form action="{{ route('amentor.soal.simpan') }}" method="post" class="formadd" id="addSoal">
                        <div class="col-sm-12">
                            <label for="id_kuis">Mapel Kuis</label>
                            <select name="id_kuis" id="id_kuis" class="form-control">
                                <option value="" selected="true" disabled>-- Pilih Kuis Yang Sudah Dibuat --</option>
                                @if (empty($kuis))
                                    <option value="" disabled><b>Kuis Anda Kosong. Buat Dulu Kuis di Menu Kuis</b></option>
                                @else
                                    <optgroup label="Kuis Lainnya">
                                        @forelse ($kuislainnya as $item)
                                            <option value="{{ $item->id }}">{{ $item->nama_kuis }}</option>
                                        @empty
                                            <option value="" disabled>-</option>
                                        @endforelse
                                    </optgroup>
                                    <optgroup label="Kuis Kelas">
                                        @forelse ($kuiskelas as $item)
                                            <option value="{{ $item->id }}">{{ $item->nama_kuis }}</option>
                                        @empty
                                            <option value="" disabled>-</option>
                                        @endforelse
                                    </optgroup>
                                    <optgroup label="Kuis Permateri">
                                        @forelse ($kuismateri as $item)
                                            <option value="{{ $item->id }}">{{ $item->nama_kuis }}</option>
                                        @empty
                                            <option value="" disabled>-</option>
                                        @endforelse
                                    </optgroup>
                                @endif
                            </select>
                        </div>
                        <div class="col-sm-12">
                            <label for="soal">Soal</label>
                            <input type="text" name="soal" id="soal" class="form-control" required>
                        </div>
                        <div class="col-sm-12">
                            <label for="Pilihan_A">Pilihan A</label>
                            <input type="text" name="Pilihan_A" id="Pilihan_A" class="form-control" required>
                        </div>
                        <div class="col-sm-12">
                            <label for="Pilihan_B">Pilihan B</label>
                            <input type="text" name="Pilihan_B" id="Pilihan_B" class="form-control" required>
                        </div>
                        <div class="col-sm-12">
                            <label for="Pilihan_C">Pilihan C</label>
                            <input type="text" name="Pilihan_C" id="Pilihan_C" class="form-control" required>
                        </div>
                        <div class="col-sm-12">
                            <label for="Pilihan_D">Pilihan D</label>
                            <input type="text" name="Pilihan_D" id="Pilihan_D" class="form-control" required>
                        </div>
                        <div class="col-sm-12">
                            <label for="jawaban_benar">Kunci Jawaban Benar</label>
                            <span id="text"></span>
                            <select name="jawaban_benar" id="jawaban_benar" class="form-control">
                                <option id="pil_a"></option>
                                <option id="pil_b"></option>
                                <option id="pil_c"></option>
                                <option id="pil_d"></option>
                            </select>
                        </div>

                        <div class="col-sm-12">
                            <label for="number">Number</label>
                            <span id="buatnumber"></span>
                            {{-- <input type="number" name="number" id="number" class="form-control" value="1" readonly> --}}
                        </div>
                        <br>
                        <div class="col-sm-12">
                            <input type="submit" value="Save" class="btn btn-primary form-control">
                        </div>
                        <div class="col-sm-12">
                            {{-- <div id="soalanda"></div> --}}
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <br><br>
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h5>Soal Anda</h5>
                </div>
                <div class="col-lg-12 text-right">
                    <a href="{{ route('amentor.soal.listSoal', Auth::user()->kode_mentor) }}" class="pt-3" target="_blank">Lihat Selengkapnya</a>
                </div>
            </div>
        </div>
        <div class="container-fluid" id="tampilsoal">
            <table class="table">
                <thead>
                    <th>Soal</th>
                    <th>Pilihan A</th>
                    <th>Pilihan B</th>
                    <th>Pilihan C</th>
                    <th>Pilihan D</th>
                    <th>Kunci Jawaban</th>
                    <th>Mapel Kuis</th>
                    <th>Number</th>
                </thead>
                <tbody id="refresh">
                    <?php $counter = 0; ?>
                    @foreach ($soal as $item)
                        @foreach ($kuis as $item2)
                            @if ($item2->mentor_id == Auth::user()->kode_mentor)
                                @if ($item2->id == $item->id_kuis)
                                    <?php if($counter == 5) break; ?>
                                    <tr>
                                        <td>{{ $item->soal }}</td>
                                        <td>{{ $item->Pilihan_A }}</td>
                                        <td>{{ $item->Pilihan_B }}</td>
                                        <td>{{ $item->Pilihan_C }}</td>
                                        <td>{{ $item->Pilihan_D }}</td>
                                        <td>{{ $item->jawaban_benar }}</td>
                                        <td>{{ $item2->nama_kuis }}</td>
                                        <td class="text-center">{{ $item->number }}</td>
                                    </tr>
                                    <?php $counter++; ?>
                                @endif
                            @endif
                        @endforeach
                    @endforeach
                </tbody>
            </table>
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
    <script
        src="https://code.jquery.com/jquery-3.5.1.js"
        integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc="
        crossorigin="anonymous">
    </script>
    <script src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.min.js"></script>
<script>
    $('#id_kuis').on('change',function(e){
        var targetnya = e.target.value;
        if(targetnya === ""){
            $('#buatnumber').empty();
        }else{
            $.get('{{ route('amentor.soal.ambilNumber') }}?id_kuis='+targetnya,function(data){
                $('#buatnumber').empty();
                $.each(data, function(index, subObj){
                    if(subObj.number == undefined){
                        $('#buatnumber').append(`<input type="number" name="number" id="number" class="form-control" value="1" readonly>`);
                    }else{
                        let nomer = parseInt(subObj.number);
                        let nambah = nomer + 1;
                        $('#buatnumber').append(`<input type="number" name="number" id="number" class="form-control" value="`+nambah+`" readonly>`);
                    }
                });
            });
        }
    });

    $(document).ready(function(){
        $("#Pilihan_A").on('keyup', function(){
            var pil_a = document.getElementById("pil_a").value = $('#Pilihan_A').val();
            document.getElementById("pil_a").innerHTML = "<span>"+pil_a+"</span>";
        });
        $("#Pilihan_B").on('keyup', function(){
            var pil_b = document.getElementById("pil_b").value = $('#Pilihan_B').val();
            document.getElementById("pil_b").innerHTML = "<span>"+pil_b+"</span>";
        });
        $("#Pilihan_C").on('keyup', function(){
            var pil_c = document.getElementById("pil_c").value = $('#Pilihan_C').val();
            document.getElementById("pil_c").innerHTML = "<span>"+pil_c+"</span>";
        });
        $("#Pilihan_D").on('keyup', function(){
            var pil_d = document.getElementById("pil_d").value = $('#Pilihan_D').val();
            document.getElementById("pil_d").innerHTML = "<span>"+pil_d+"</span>";
        });
    });

    $('.formadd').on('submit',function(e){
        e.preventDefault();
        var soal = $('#soal').val();
        var Pilihan_A = $('#Pilihan_A').val();
        var Pilihan_B = $('#Pilihan_B').val();
        var Pilihan_C = $('#Pilihan_C').val();
        var Pilihan_D = $('#Pilihan_D').val();
        var jawaban_benar = $('#jawaban_benar').val();
        var id_kuis = $('#id_kuis').val();
        var number = $('#number').val();
        var kode_guru = "{{ Auth::user()->kode_mentor }}";
        $.ajax({
            url: $('#addSoal').attr('action'),
            type: "POST",
            data: {
                "_token":"{{ csrf_token() }}",
                "_method":"POST",
                soal: soal,
                Pilihan_A: Pilihan_A,
                Pilihan_B: Pilihan_B,
                Pilihan_C: Pilihan_C,
                Pilihan_D: Pilihan_D,
                jawaban_benar: jawaban_benar,
                id_kuis: id_kuis,
                number: number
            },
            success: function(){
                alert("Sukses Isi Soal Anda!!");
                $('#soal').val("");
                $('#Pilihan_A').val("");
                $('#Pilihan_B').val("");
                $('#Pilihan_C').val("");
                $('#Pilihan_D').val("");
                $('#jawaban_benar').val("");
                $('#number').val(parseInt(number) + 1);
                $('#refresh').load(" #refresh > *");
                // document.getElementById("soalanda").innerHTML = "<a href='/amentor/tabelsoal/"+kode_guru+"' class='btn btn-info form-control'>Lihat Lebih Lengkap Soal Anda Disini</a>";
            },
            error: function(jqXHR, exception){
                let msg = '';
                if(jqXHR.status === 0){
                    msg = 'Gagal Menghubungkan Internet'
                }else if(jqXHR.status == 404){
                    msg = 'Requested Page Not Found [404]';
                }else if(jqXHR.status == 422){
                    msg = 'Ada Field Yang Belum Anda Isi [Error 422]';
                }else if(jqXHR.status == 500){
                    msg = 'Internal Server Error [500]';
                }else if(exception === 'parsererror'){
                    msg = 'Req JSON Parse Failed';
                }else if(exception === 'timeout'){
                    msg = 'Time Out Error';
                }else if(exception === 'abort'){
                    msg = 'AJAX Req Aborted';
                }else{
                    msg = 'Uncaught Error.' + ' ' + jqXHR.responseText;
                }
                alert(msg);
            }
        })
    })



</script>

@endsection
