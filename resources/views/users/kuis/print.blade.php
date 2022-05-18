<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Hasil Kerja {{ Auth::user()->name }}</title>
</head>
    <link rel="shortcut icon" sizes="57x57" href="{{ URL::asset('/Foto/favicon.png') }}">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<style>
    .benar{
        background-color: green;
    }
    .salah{
        background-color: red;
    }
</style>
<body onload="fungsiprint()">
    <div class="container">
        <div class="row">
            <div class="col-sm-12 mt-3"><h5 class="text-center">{{ $kuis->nama_kuis }}</h5></div>
        </div>
        @php
            $score = Session::get('score');
            // $soal = Session::get('showkan');
            $benar = "border-success";
            $salah = "border-danger";
        @endphp
        <div class="row">
            <div class="col-sm-12">Nama : {{ Auth::user()->name }}</div>
            <div class="col-sm-12">Email : {{ Auth::user()->email }}</div>
        </div>
        <div class="row" id="row">
            <div class="col-sm-12 text-right">Nilai Anda Adalah : {{ intval($score) }} / 100</div>
        </div>
        <br>

        @foreach ($showkan as $indexkey => $q)
            <div class="row card mt-2 @if($q->jawaban_user != $q->jawaban_benar){{ $salah }}@else{{ $benar }}@endif" id="cek">
                <div class="card-body">
                    @if($q->jawaban_user != $q->jawaban_benar)
                    <div class="col-sm-12 text-right"><i class="fa fa-close text-danger"></i></div>
                    @else
                    <div class="col-sm-12 text-right"><i class="fa fa-check text-success"></i></div>
                    @endif
                    <div class="col-sm-12"> {{$indexkey+1}}. {{ $q->soal }}</div>
                    <div class="col-sm-12">
                        <input type="radio" disabled>
                        <label for="Pilihan A">{{ $q->Pilihan_A }}</label>
                        <br><input type="radio" disabled>
                        <label for="Pilihan B">{{ $q->Pilihan_B }}</label>
                        <br><input type="radio" disabled>
                        <label for="Pilihan C">{{ $q->Pilihan_C }}</label>
                        <br><input type="radio" disabled>
                        <label for="Pilihan D">{{ $q->Pilihan_D }}</label>
                    </div>
                    @if ($kuis->jenis == 'video_akhir')
                        <div class="col-sm-12">Jawaban Anda : <u>{{ $q->jawaban_user}}</u></div>
                    @elseif($kuis->jenis == 'lainnya' || $kuis->jenis == 'video' || $kuis->jenis == 'kelas')
                        @if(strval($valnilai->nilai_awal) == '0' && strval($valnilai->nilai_akhir) == '0')
                            <div class="col-sm-12">Jawaban Anda : <u>{{ $q->jawaban_user}}</u></div>
                            <div class="col-sm-12">Jawaban Benar : <b>{{ $q->jawaban_benar }}</b></div>
                        @elseif ($valnilai->nilai_awal <= 70 && strval($valnilai->nilai_akhir) == null)
                            <div class="col-sm-12">Jawaban Anda : <u>{{ $q->jawaban_user}}</u></div>
                        @elseif($valnilai->nilai_awal <= 70 && strval($valnilai->nilai_akhir) != null)
                            <div class="col-sm-12">Jawaban Anda : <u>{{ $q->jawaban_user}}</u></div>
                            <div class="col-sm-12">Jawaban Benar : <b>{{ $q->jawaban_benar }}</b></div>
                        @elseif($valnilai->nilai_awal >= 70 && strval($valnilai->nilai_akhir) == null)
                            <div class="col-sm-12">Jawaban Anda : <u>{{ $q->jawaban_user}}</u></div>
                        @elseif($valnilai->nilai_awal >= 70 && strval($valnilai->nilai_akhir) != null)
                            <div class="col-sm-12">Jawaban Anda : <u>{{ $q->jawaban_user}}</u></div>
                            <div class="col-sm-12">Jawaban Benar : <b>{{ $q->jawaban_benar }}</b></div>
                        @endif 
                    @endif
                        {{-- @if ($valnilai->nilai_awal <= 70 && $valnilai->nilai_akhir == null)
                            <div class="col-sm-12">Jawaban Anda : <u>{{ $q->jawaban_user}}</u></div>
                        @elseif($valnilai->nilai_awal <= 70 && $valnilai->nilai_akhir != null)
                            <div class="col-sm-12">Jawaban Anda : <u>{{ $q->jawaban_user}}</u></div>
                            <div class="col-sm-12">Jawaban Benar : <b>{{ $q->jawaban_benar }}</b></div>
                        @elseif($valnilai->nilai_awal >= 70 && $valnilai->nilai_akhir == null)
                            <div class="col-sm-12">Jawaban Anda : <u>{{ $q->jawaban_user}}</u></div>
                        @elseif($valnilai->nilai_awal >= 70 && $valnilai->nilai_akhir != null)
                            <div class="col-sm-12">Jawaban Anda : <u>{{ $q->jawaban_user}}</u></div>
                            <div class="col-sm-12">Jawaban Benar : <b>{{ $q->jawaban_benar }}</b></div>
                        @endif --}}
                </div>
            </div>
        @endforeach
    </div>

</body>
</html>
<script>
    function fungsiprint(){
        window.print(); 
        window.onafterprint = function(){
            history.go(-1);        
        } 
    }
</script>