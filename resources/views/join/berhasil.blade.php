<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="shortcut icon" sizes="57x57" href="{{ URL::asset('/Foto/favicon.png') }}">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <title>Berhasil Join</title>
    <style>
        .kembali{
            border-radius:100px;
            background-color:#EBEBEB;
            color:#9A9A9A;
            border:none;
        }
        .btn-lihat{
            border-radius:100px;
            border:none;
            background-color:#36C5BA;
            color:#FFFF;
        }
        .btn-lihat:hover{
            background-color:#4DD0C6;
            color:#FFFF;
        }
    </style>
  </head>
  <body>
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <img src="{{ URL::asset('img/yeyy.png') }}" class="mt-4" width="400px" height="400px" alt="owlpending">
                <h2>Yeyy! Anda Sudah Bergabung</h2>
                <p>
                    Jangan pernah berhenti belajar hal yang baru demi <br> mengejar impianmu.
                </p>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-6">
                <button
                    style="float:right;"
                    onclick="event.preventDefault(); location.href='{{url('/kelas')}}';"
                    class="btn btn-secondary btn-lg kembali mt-2">Lihat kelas lainnya</button>
            </div>
            <div class="col-lg-6">
                <button
                style="float:left;"
                onclick="event.preventDefault(); location.href='{{route('myclass.index')}}';"
                class="btn btn-info btn-lihat btn-lg mt-2">Mulai belajar</button>
            </div>
        </div>
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
  </body>
</html>
