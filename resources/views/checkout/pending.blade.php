<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="shortcut icon" sizes="57x57" href="{{ URL::asset('/Foto/favicon.png') }}">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    {{--<link rel="stylesheet" href="{{ URL::asset('/css/kelasbaru.css') }}">--}}

    <title>Checkout</title>
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
                <img src="{{ URL::asset('/Foto/pentingbaru-01.png') }}" class="mt-4" width="360px" height="360px" alt="owlpending">
                <h2>Sabar ya! Pembayaran anda sedang diproses</h2>
                <p>Terima kasih karena telah mengikuti kelas kami pembayaran <br>
                    pembayaran anda akan segera di proses kurang lebih 1x24 jam
                </p>
                <div class="row">
                    <div class="col-lg-6">
                        <button
                            style="float:right;"
                            onclick="event.preventDefault(); location.href='{{url('/')}}';"
                            class="btn btn-secondary btn-lg kembali mt-2">Kembali ke home</button>
                    </div>
                    <div class="col-lg-6">
                        <button
                        style="float:left;"
                        onclick="event.preventDefault(); location.href='{{route('kelas.index')}}';"
                        class="btn btn-lihat btn-lg mt-2">Lihat kelas lain</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </body>
</html>
