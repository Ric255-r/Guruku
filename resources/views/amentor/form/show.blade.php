{{-- Kode Lama --}}

{{-- @extends('includes.amentor.app')


@section('content')

    <div id="layoutSidenav_content">
        <main>
            <div class="container-fluid">
                <h1 class="mt-4">Soal</h1>
                <div class="row">
                    <div class="col-lg-12">
                        <ol class="breadcrumb mb-4">
                            <li class="breadcumb-item active mt-1">Pilih Soal Anda Berdasarkan Mapel Kuis / </li>
                            <li class="">
                                <select name="kuis" id="kuis" class="form-control kuis mx-2">
                                    <option value="">--Pilih Mapel--</option>
                                    @foreach ($kuis as $item)
                                    <option value="{{ $item->id }}">{{ $item->nama_kuis }}</option>
                                    @endforeach
                                </select>
                            </li>
                        </ol>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <table class="table table-striped table-responsive-md">
                            <thead>
                                <tr>
                                    <th>Number</th>
                                    <th>Soal</th>
                                    <th>Pilihan A</th>
                                    <th>Pilihan B</th>
                                    <th>Pilihan C</th>
                                    <th>Pilihan D</th>
                                    <th>Jawaban Benar</th>
                                    <th>Id Kuis</th>
                                    <th colspan="2" class="text-center">Action</th>
                                </tr>
                            </thead>
                            <tbody class="refreshtable">
                                <tr>
                                    <td colspan="8" class="text-center p-5">Pilih Mapel Terlebih Dahulu</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <!-- Modal -->
                    <div class="modal fade" id="buatEditSoal" tabindex="-1" role="dialog" aria-labelledby="editLabel" aria-hidden="true" data-keyboard="false" data-backdrop="static">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="editLabel">Edit Soal Anda</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true"><b>&times;</b></span>
                                    </button>
                                </div>
                                <div class="modal-body1">
                                    <form method="post" class="" id="formupdate">
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
                                            <label for="id_kuis">Mapel Kuis</label>
                                            <select name="id_kuis" id="id_kuis" class="form-control">
                                                @foreach ($kuis as $item)
                                                <option value="{{ $item->id }}">{{ $item->nama_kuis }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col-sm-12">
                                            <label for="number">Number</label>
                                            <input type="text" name="number" id="number" class="form-control">
                                        </div>
                                        <br>
                                        <div class="col-sm-12">
                                            <input type="submit" value="Save" class="btn btn-info form-control">
                                        </div>
                                        <br>
                                        <div class="col-sm-12">
                                            <div id="soalanda"></div>
                                        </div>
                                    </form>
                                </div>
                            </div>
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
    <!-- -->



<script
        src="https://code.jquery.com/jquery-3.5.1.js"
        integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc="
        crossorigin="anonymous">
    </script>

<script>
    $(document).ready(function(){
        $.ajaxSetup({
            cache: false,
        });

        $('#kuis').on('change',function(e){
            console.log(e);
            var tabel = e.target.value;
            $.get('{{ route('amentor.soal.tampilkantabel') }}?id_kuis='+tabel,function(data){
                $('.refreshtable').empty();
                $.each(data, function(index, subObj){
                    document.querySelector(".refreshtable").innerHTML += '<tr><td>'+subObj.number+'</td> <td>'+subObj.soal+'</td><td>'+subObj.Pilihan_A+'</td><td>'+subObj.Pilihan_B+'</td><td>'+subObj.Pilihan_C+'</td><td>'+subObj.Pilihan_D+'</td><td>'+subObj.jawaban_benar+'</td> <!--Comment IdKuisnya <td>'+subObj.id_kuis+'</td> --> <td class="text-center"> <button type="button" class="btn btn-primary" data-idsoal="'+subObj.id+'" data-isisoal="'+subObj.soal+'" data-pilihan_a="'+subObj.Pilihan_A+'" data-pilihan_b="'+subObj.Pilihan_B+'" data-pilihan_c="'+subObj.Pilihan_C+'" data-pilihan_d="'+subObj.Pilihan_D+'" data-kunci="'+subObj.jawaban_benar+'" data-idkuis="'+subObj.id_kuis+'" data-number="'+subObj.number+'" data-toggle="modal" data-target="#buatEditSoal">Edit</button></td> <td class="text-center"><form method="POST" action="{{ route('amentor.soal.hapus') }}">@csrf @method("DELETE") <input type="hidden" name="id" value="'+subObj.id+'"> <input type="submit" value="DELETE" class="btn btn-danger"></form></td></tr>';
                    // console.log(subObj.id);
                });
            });
        });

        $("#buatEditSoal").on('show.bs.modal', function(event){
            console.log(event);
            var button = $(event.relatedTarget);
            var id = button.data('idsoal');
            var soal = button.data('isisoal');
            var pil_a = button.data('pilihan_a');
            var pil_b = button.data('pilihan_b');
            var pil_c = button.data('pilihan_c');
            var pil_d = button.data('pilihan_d');
            var kunci = button.data('kunci');
            var idkuis = button.data('idkuis');
            var number = button.data('number');
            var modal = $(this);
            modal.find('.modal-body1 #soal').val(soal);
            modal.find('.modal-body1 #Pilihan_A').val(pil_a);
            modal.find('.modal-body1 #Pilihan_B').val(pil_b);
            modal.find('.modal-body1 #Pilihan_C').val(pil_c);
            modal.find('.modal-body1 #Pilihan_D').val(pil_d);
            modal.find('.modal-body1 #jawaban_benar').val(kunci);
            modal.find('.modal-body1 #id_kuis').val(idkuis);
            modal.find('.modal-body1 #number').val(number);
            //a
            document.getElementById("pil_a").value = pil_a;
            document.getElementById("pil_a").innerHTML = "<span>"+ pil_a +"</span>";
            //b
            document.getElementById("pil_b").value = pil_b;
            document.getElementById("pil_b").innerHTML = "<span>" + pil_b + "</span>";
            //c
            document.getElementById("pil_c").value = pil_c;
            document.getElementById("pil_c").innerHTML = "<span>" + pil_c + "</span>";
            //d
            document.getElementById("pil_d").value = pil_d;
            document.getElementById("pil_d").innerHTML = "<span>" + pil_d + "</span>";

            $("#formupdate").on('submit', function(event){
                event.preventDefault();
                $.ajax({
                    url: "{{ route('amentor.soal.update')}}",
                    type: "POST",
                    data: {
                        "_token": "{{ csrf_token() }}",
                        "_method": "PUT",
                        idsoal: id,
                        soal: modal.find('.modal-body1 #soal').val(),
                        Pilihan_A: modal.find('.modal-body1 #Pilihan_A').val(),
                        Pilihan_B: modal.find('.modal-body1 #Pilihan_B').val(),
                        Pilihan_C: modal.find('.modal-body1 #Pilihan_C').val(),
                        Pilihan_D: modal.find('.modal-body1 #Pilihan_D').val(),
                        jawaban_benar: modal.find('.modal-body1 #jawaban_benar').val(),
                        id_kuis: modal.find('.modal-body1 #id_kuis').val(),
                        number: modal.find('.modal-body1 #number').val()
                    },
                    success: function(){
                        alert('Sukses Update Soal');
                        $("#edit").modal('hide');
                        document.location.reload();
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
                });
            });
        });

        $("#Pilihan_A").on('keyup', function () {
            var pil_a = document.getElementById("pil_a").value = $('#Pilihan_A').val();
            document.getElementById("pil_a").innerHTML = "<span>" + pil_a + "</span>";
        });
        $("#Pilihan_B").on('keyup', function () {
            var pil_b = document.getElementById("pil_b").value = $('#Pilihan_B').val();
            document.getElementById("pil_b").innerHTML = "<span>" + pil_b + "</span>";
        });
        $("#Pilihan_C").on('keyup', function () {
            var pil_c = document.getElementById("pil_c").value = $('#Pilihan_C').val();
            document.getElementById("pil_c").innerHTML = "<span>" + pil_c + "</span>";
        });
        $("#Pilihan_D").on('keyup', function () {
            var pil_d = document.getElementById("pil_d").value = $('#Pilihan_D').val();
            document.getElementById("pil_d").innerHTML = "<span>" + pil_d + "</span>";
        });
        $(".close").click(function () {
            document.location.reload();
        });
    });
</script>
@endsection
 --}}


{{-- Kode Baru --}}

@extends('includes.amentor.app')


@section('content')

    <div id="layoutSidenav_content">
        <main>
            <div class="container-fluid">
                <h1 class="mt-4">Soal</h1>
                <div class="row">
                    <div class="col-lg-12">
                        <ol class="breadcrumb mb-4">
                            <li class="breadcumb-item active mt-1">Pilih Soal Anda Berdasarkan Mapel Kuis / </li>
                            <li class="">
                                <select name="kuis" id="kuis" class="form-control kuis mx-2" 
                                        onchange="get_kuis(this.value)">
                                    <option value="">--Pilih Mapel--</option>
                                    @foreach ($kuis as $item)
                                    <option value="{{ $item->id }}">{{ $item->nama_kuis }}</option>
                                    @endforeach
                                </select>
                            </li>
                        </ol>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <table class="table table-striped table-responsive-md">
                            <thead>
                                <tr>
                                    <th>Number</th>
                                    <th>Soal</th>
                                    <th>Pilihan A</th>
                                    <th>Pilihan B</th>
                                    <th>Pilihan C</th>
                                    <th>Pilihan D</th>
                                    <th>Jawaban Benar</th>
                                    <th colspan="2" class="text-center">Action</th>
                                </tr>
                            </thead>
                            <tbody class="refreshtable">
                                <tr>
                                    <td colspan="8" class="text-center p-5">Pilih Mapel Terlebih Dahulu</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <!-- Modal -->
                    <div class="modal fade" id="buatEditSoal" tabindex="-1" role="dialog" aria-labelledby="editLabel" aria-hidden="true" data-keyboard="false" data-backdrop="static">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="editLabel">Edit Soal Anda</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true"><b>&times;</b></span>
                                    </button>
                                </div>
                                <div class="modal-body1" id="bodyupdatesoal">

                                </div>
                            </div>
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


<script
        src="https://code.jquery.com/jquery-3.5.1.js"
        integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc="
        crossorigin="anonymous">
    </script>

<script>

    $(document).ready(function(){
        $.ajaxSetup({
            cache: false,
        });

        $("#buatEditSoal").on('show.bs.modal', function(event){
            document.getElementById('bodyupdatesoal').innerHTML = 
            `
                <form method="post" class="" id="formupdate">
                    @csrf
                    @method('PUT')
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
                        <label for="id_kuis">Mapel Kuis</label>
                        <select name="id_kuis" id="id_kuis" class="form-control">
                            @foreach ($kuis as $item)
                                <option value="{{ $item->id }}">{{ $item->nama_kuis }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-sm-12">
                        <label for="number">Number</label>
                        <input type="text" name="number" id="number" class="form-control">
                    </div>
                    <br>
                    <div class="col-sm-12">
                        <input type="submit" value="Save" class="btn btn-info form-control">
                    </div>
                    <br>
                    <div class="col-sm-12">
                        <div id="soalanda"></div>
                    </div>
                </form>
            `;
            console.log(event);
            let button = $(event.relatedTarget);
            var id = button.data('idsoal');
            let soal = button.data('isisoal');
            let pil_a = button.data('pilihan_a');
            let pil_b = button.data('pilihan_b');
            let pil_c = button.data('pilihan_c');
            let pil_d = button.data('pilihan_d');
            let kunci = button.data('kunci');
            let idkuis = button.data('idkuis');
            let number = button.data('number');
            let modal = $(this);
            modal.find('.modal-body1 #soal').val(soal);
            modal.find('.modal-body1 #Pilihan_A').val(pil_a);
            modal.find('.modal-body1 #Pilihan_B').val(pil_b);
            modal.find('.modal-body1 #Pilihan_C').val(pil_c);
            modal.find('.modal-body1 #Pilihan_D').val(pil_d);
            modal.find('.modal-body1 #jawaban_benar').val(kunci);
            modal.find('.modal-body1 #id_kuis').val(idkuis);
            modal.find('.modal-body1 #number').val(number);
            //a
            document.getElementById("pil_a").value = pil_a;
            document.getElementById("pil_a").innerHTML = "<span>"+ pil_a +"</span>";
            //b
            document.getElementById("pil_b").value = pil_b;
            document.getElementById("pil_b").innerHTML = "<span>" + pil_b + "</span>";
            //c
            document.getElementById("pil_c").value = pil_c;
            document.getElementById("pil_c").innerHTML = "<span>" + pil_c + "</span>";
            //d
            document.getElementById("pil_d").value = pil_d;
            document.getElementById("pil_d").innerHTML = "<span>" + pil_d + "</span>";

            $("#Pilihan_A").on('keyup', function(){
                let pil_a = document.getElementById("pil_a").value = $('#Pilihan_A').val();
                document.getElementById("pil_a").innerHTML = "<span>"+pil_a+"</span>";
            });
            $("#Pilihan_B").on('keyup', function(){
                let pil_b = document.getElementById("pil_b").value = $('#Pilihan_B').val();
                document.getElementById("pil_b").innerHTML = "<span>"+pil_b+"</span>";
            });
            $("#Pilihan_C").on('keyup', function(){
                let pil_c = document.getElementById("pil_c").value = $('#Pilihan_C').val();
                document.getElementById("pil_c").innerHTML = "<span>"+pil_c+"</span>";
            });
            $("#Pilihan_D").on('keyup', function(){
                let pil_d = document.getElementById("pil_d").value = $('#Pilihan_D').val();
                document.getElementById("pil_d").innerHTML = "<span>"+pil_d+"</span>";
            });

            $("#formupdate").on('submit', function(event){
                event.preventDefault();
                let link = "{{ route('amentor.soal.update', 'params')}}";
                    link = link.replace('params', id);
                $.ajax({
                    url: link,
                    type: "POST",
                    data: $(this).serialize(),
                    success: function(){
                        alert('Sukses Update Soal');
                        $("#buatEditSoal").modal('hide');
                        let params = document.getElementById('kuis').value;
                        get_kuis(params);
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
                });
            });
        });
    });

    function get_kuis(int1){
        $.get('{{ route('amentor.soal.tampilkantabel') }}?id_kuis='+int1,function(data){
            $('.refreshtable').empty();
            $.each(data, function(index, subObj){
                document.querySelector(".refreshtable").innerHTML += 
                `
                    <tr>
                        <td>`+subObj.number+`</td> 
                        <td>`+subObj.soal+`</td>
                        <td>`+subObj.Pilihan_A+`</td>
                        <td>`+subObj.Pilihan_B+`</td>
                        <td>`+subObj.Pilihan_C+`</td>
                        <td>`+subObj.Pilihan_D+`</td>
                        <td>`+subObj.jawaban_benar+`</td> 
                        <!--Comment IdKuisnya <td>`+subObj.id_kuis+`</td> --> 
                        <td class="text-center"> 
                            <button type="button" class="btn btn-primary" 
                                    data-idsoal="`+subObj.id+`" 
                                    data-isisoal="`+subObj.soal+`" 
                                    data-pilihan_a="`+subObj.Pilihan_A+`" 
                                    data-pilihan_b="`+subObj.Pilihan_B+`" 
                                    data-pilihan_c="`+subObj.Pilihan_C+`" 
                                    data-pilihan_d="`+subObj.Pilihan_D+`" 
                                    data-kunci="`+subObj.jawaban_benar+`" 
                                    data-idkuis="`+subObj.id_kuis+`" 
                                    data-number="`+subObj.number+`" 
                                    data-toggle="modal" data-target="#buatEditSoal">
                                Edit
                            </button>
                        </td> 
                        <td class="text-center">
                            <form method="POST" action="{{ route('amentor.soal.hapus') }}">
                                @csrf 
                                @method("DELETE") 
                                <input type="hidden" name="id" value="`+subObj.id+`"> 
                                <input type="submit" value="DELETE" class="btn btn-danger" onclick="return confirm('Anda Yakin ingin Menghapus Soal Ini?')">
                            </form>
                        </td>
                    </tr>
                `;
            });
        });
    }




</script>
@endsection
