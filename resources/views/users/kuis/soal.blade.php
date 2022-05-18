<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Soal</title>
    <link rel="shortcut icon" sizes="57x57" href="{{ URL::asset('/Foto/favicon.png') }}">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>
<style>
    .timer{
        border: 0;
        text-align: right;
    }
    .timer:focus{
        border: 0;
        outline: none;
        text-align: right;
    }
</style>
<body>
    @auth
        @if ($errors->first())
            <div class="container mt-3">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="alert alert-warning alert-dismissable">
                            <a href="#" class="close" data-dismiss="alert" aria-label="close"><b>x</b></a>
                            <strong>{{ $errors->first() }}</strong>
                        </div>
                    </div>
                </div>
            </div>
        @endif
        @if ($kuis->jenis == 'video' || $kuis->jenis == 'video_akhir' || $kuis->jenis == 'kelas')
            @if (Auth::user()->roles == 'USERS')
                @if ($kuis->kelas->jenis == 'gratis')
                    @if ($ikut->count() > 0)
                        <div class="container">
                            <h5 class="text-center mt-3">{{ $kuis->nama_kuis }}</h5>
                            <form action="{{ route('kuis.simpankuis') }}" method="post">
                                <div class="text-right"><input type="text" name="waktu_kerja" id="waktu_kerja" class="timer" readonly></div>
                                @php
                                    $jumlah = count($soal);
                                @endphp
                                @foreach($soal as $indexkey => $tampilsoal)
                                    <div class="row card">
                                        @csrf
                                        <div class="card-body">
                                            <div class="col-sm-12 mama">{{ $indexkey+1 }}. {{ $tampilsoal->soal }}</div>
                                            <div class="col-sm-12">
                                                <input type="radio" name="jawaban_user[{{ $tampilsoal->id }}]" id="" value="{{ $tampilsoal->Pilihan_A }}" required>
                                                <label for="Pilihan A">{{ $tampilsoal->Pilihan_A }}</label>

                                                <br><input type="radio" name="jawaban_user[{{ $tampilsoal->id }}]" id="" value="{{ $tampilsoal->Pilihan_B }}" required>
                                                <label for="Pilihan B">{{ $tampilsoal->Pilihan_B }}</label>

                                                <br><input type="radio" name="jawaban_user[{{ $tampilsoal->id }}]" id="" value="{{ $tampilsoal->Pilihan_C }}" required>
                                                <label for="Pilihan C">{{ $tampilsoal->Pilihan_C }}</label>

                                                <br><input type="radio" name="jawaban_user[{{ $tampilsoal->id }}]" id="" value="{{ $tampilsoal->Pilihan_D }}" required>
                                                <label for="Pilihan D">{{ $tampilsoal->Pilihan_D }}</label>
                                                
                                                <input type="hidden" name="id_kuis" value="{{ $tampilsoal->id_kuis }}">
                                                <input type="hidden" name="slug" value="{{ $kuis->slug }}">
                                                <input type="hidden" name="jumlah" value="{{ $jumlah }}">
                                                <input type="hidden" name="id[]" value="{{ $tampilsoal->id }}">
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                                <div class="row mt-3">
                                    <input type="submit" value="KIRIM" class="form-control btn btn-info">
                                </div>
                            </form>
                        </div>
                    @else
                        <script>
                            alert('Anda Harus Ikut Kelas ini Terlebih Dahulu');
                            window.location.href='/kelas';
                        </script>
                    @endif
                @elseif($kuis->kelas->jenis == 'premium')
                    @if ($saksi->count() > 0)
                        <div class="container">
                            <h5 class="text-center mt-3">{{ $kuis->nama_kuis }}</h5>
                            <form action="{{ route('kuis.simpankuis') }}" method="post">
                                <div class="text-right">
                                    <input type="text" name="waktu_kerja" id="waktu_kerja" class="timer" readonly>
                                </div>
                                @php
                                    $jumlah = count($soal);
                                @endphp
                                @foreach($soal as $indexkey => $tampilsoal)
                                    <div class="row card">
                                        @csrf
                                        <div class="card-body">
                                            <div class="col-sm-12 mama">{{ $indexkey+1 }}. {{ $tampilsoal->soal }}</div>
                                            <div class="col-sm-12">
                                                <input type="radio" name="jawaban_user[{{ $tampilsoal->id }}]" id="" value="{{ $tampilsoal->Pilihan_A }}" required>
                                                <label for="Pilihan A">{{ $tampilsoal->Pilihan_A }}</label>

                                                <br><input type="radio" name="jawaban_user[{{ $tampilsoal->id }}]" id="" value="{{ $tampilsoal->Pilihan_B }}" required>
                                                <label for="Pilihan B">{{ $tampilsoal->Pilihan_B }}</label>

                                                <br><input type="radio" name="jawaban_user[{{ $tampilsoal->id }}]" id="" value="{{ $tampilsoal->Pilihan_C }}" required>
                                                <label for="Pilihan C">{{ $tampilsoal->Pilihan_C }}</label>

                                                <br><input type="radio" name="jawaban_user[{{ $tampilsoal->id }}]" id="" value="{{ $tampilsoal->Pilihan_D }}" required>
                                                <label for="Pilihan D">{{ $tampilsoal->Pilihan_D }}</label>
                                                
                                                <input type="hidden" name="id_kuis" value="{{ $tampilsoal->id_kuis }}">
                                                <input type="hidden" name="slug" value="{{ $kuis->slug }}">
                                                <input type="hidden" name="jumlah" value="{{ $jumlah }}">
                                                <input type="hidden" name="id[]" value="{{ $tampilsoal->id }}">
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                                <div class="row mt-3">
                                    <input type="submit" value="KIRIM" class="form-control btn btn-info">
                                </div>
                            </form>
                        </div>
                    @else
                        <script>
                            alert('Anda Harus Membeli Kelas Terlebih Dahulu');
                            window.location.href='/kelas';
                        </script>
                    @endif
                @endif
            @elseif(Auth::user()->roles == 'MENTOR')
                <script>
                    alert('Anda Login Sebagai Mentor');
                    window.location.href='/kuis';
                </script>
            @else
                <script>
                    alert('Anda Login Sebagai Admin');
                    window.location.href='/kuis';
                </script>
            @endif
        @elseif($kuis->jenis == 'lainnya')
            <div class="container">
                <h5 class="text-center mt-3">{{ $kuis->nama_kuis }}</h5>
                <form action="{{ route('kuis.simpankuis') }}" method="post">
                    <div class="text-right"><input type="text" name="waktu_kerja" id="waktu_kerja" class="timer" readonly></div>
                    @php
                        $jumlah = count($soal);
                    @endphp
                    @foreach($soal as $indexkey => $tampilsoal)
                        <div class="row card">
                            @csrf
                            <div class="card-body">
                                <div class="col-sm-12 mama">{{ $indexkey+1 }}. {{ $tampilsoal->soal }}</div>
                                <div class="col-sm-12">
                                    <input type="radio" name="jawaban_user[{{ $tampilsoal->id }}]" id="" value="{{ $tampilsoal->Pilihan_A }}" required>
                                    <label for="Pilihan A">{{ $tampilsoal->Pilihan_A }}</label>

                                    <br><input type="radio" name="jawaban_user[{{ $tampilsoal->id }}]" id="" value="{{ $tampilsoal->Pilihan_B }}" required>
                                    <label for="Pilihan B">{{ $tampilsoal->Pilihan_B }}</label>

                                    <br><input type="radio" name="jawaban_user[{{ $tampilsoal->id }}]" id="" value="{{ $tampilsoal->Pilihan_C }}" required>
                                    <label for="Pilihan C">{{ $tampilsoal->Pilihan_C }}</label>

                                    <br><input type="radio" name="jawaban_user[{{ $tampilsoal->id }}]" id="" value="{{ $tampilsoal->Pilihan_D }}" required>
                                    <label for="Pilihan D">{{ $tampilsoal->Pilihan_D }}</label>
                                    
                                    <input type="hidden" name="id_kuis" value="{{ $tampilsoal->id_kuis }}">
                                    <input type="hidden" name="slug" value="{{ $kuis->slug }}">
                                    <input type="hidden" name="jumlah" value="{{ $jumlah }}">
                                    <input type="hidden" name="id[]" value="{{ $tampilsoal->id }}">
                                </div>
                            </div>
                        </div>
                    @endforeach
                    <div class="row mt-3">
                        <input type="submit" value="KIRIM" class="form-control btn btn-info">
                    </div>
                </form>
            </div>
        @endif
    @endauth
    @guest
        <script>
            alert('Login Dulu Yaa');
            window.location.href='/login';
        </script>
    @endguest
{{-- Kodingan Lama --}}
{{-- @auth
    <div class="container">
        <h5 class="text-center mt-3">{{ $kuis->nama_kuis }}</h5>
        <form action="{{ route('kuis.simpankuis') }}" method="post">
            <div class="text-right"><input type="text" name="waktu_kerja" id="waktu_kerja" class="timer" readonly></div>
            @php
                $jumlah = count($soal);
            @endphp
            @foreach($soal as $indexkey => $tampilsoal)
                <div class="row card">
                    @csrf
                    <div class="card-body">
                        <div class="col-sm-12 mama">{{ $indexkey+1 }}. {{ $tampilsoal->soal }}</div>
                        <div class="col-sm-12">
                            <input type="radio" name="jawaban_user[{{ $tampilsoal->id }}]" id="" value="{{ $tampilsoal->Pilihan_A }}" required>
                            <label for="Pilihan A">{{ $tampilsoal->Pilihan_A }}</label>

                            <br><input type="radio" name="jawaban_user[{{ $tampilsoal->id }}]" id="" value="{{ $tampilsoal->Pilihan_B }}" required>
                            <label for="Pilihan B">{{ $tampilsoal->Pilihan_B }}</label>

                            <br><input type="radio" name="jawaban_user[{{ $tampilsoal->id }}]" id="" value="{{ $tampilsoal->Pilihan_C }}" required>
                            <label for="Pilihan C">{{ $tampilsoal->Pilihan_C }}</label>

                            <br><input type="radio" name="jawaban_user[{{ $tampilsoal->id }}]" id="" value="{{ $tampilsoal->Pilihan_D }}" required>
                            <label for="Pilihan D">{{ $tampilsoal->Pilihan_D }}</label>
                            
                            <input type="hidden" name="id_kuis" value="{{ $tampilsoal->id_kuis }}">
                            <input type="hidden" name="slug" value="{{ $kuis->slug }}">
                            <input type="hidden" name="jumlah" value="{{ $jumlah }}">
                            <input type="hidden" name="id[]" value="{{ $tampilsoal->id }}">
                        </div>
                    </div>
                </div>
            @endforeach
            <div class="row mt-3">
                <input type="submit" value="KIRIM" class="form-control btn btn-info">
            </div>
        </form>
    </div>
@else
    <script>
        alert('Login Dulu Yaa');
        window.location.href='/login';
    </script>
@endauth --}}
</body>
</html>
<script>
    $(window).bind("beforeunload",function(event) {
        return "You have some unsaved changes";
    });

    $('form').on('submit', function(){
        $(window).unbind('beforeunload');
    });

    var timer = setInterval(clock, 1000);
    var msec = 00;
    var sec = 00;
    var min = 00;

    function clock() {
        msec += 1;
        if (msec == 60) {
            sec += 1;
            msec = 00;
            if (sec == 60) {
                sec = 00;
                min += 1;
                if (sec % 2 == 0) {
                    console.log("Pair");
                }
            }
        }
        document.getElementById("waktu_kerja").value = min + ":" + sec + ":" + msec;
    }

    // function tembak(){
    //     alert(min + ":" + sec + ":" + msec);
    // }
</script>