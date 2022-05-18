<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="shortcut icon" sizes="57x57" href="{{ URL::asset('/Foto/favicon.png') }}">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <title>Sertifikat</title>
    <style>
       .container{
            padding-bottom: 100px;
        }
    </style>
  </head>
  <body>
    <div class="container">
        <div class="row justify-content-center text-center">
            <div class="col-lg-12 mt-3">
                <h3>Selamat Atas Semangat Belajar Anda!</h3>
                <p>Ayuk request sertifikat kamu ke Mentor</p>
                <p>Tampilan Sertifikat Kamu :)</p>
            </div>
            <div class="col-lg-8">
                <img src="{{ asset('/storage/'.$videodetails->kelas->pic_serti) }}"
                    class="mt-3"
                    width="300px"
                    height="300px"
                    alt="pic_serti">
            </div>
        </div>
        <form action="{{ route('request.serti') }}" method="POST">
            @csrf
            @if(count($errors) > 0)
                <div class="alert alert-danger mt-3">
                    @foreach ($errors->all() as $error)
                    {{ $error }} <br/>
                    @endforeach
                </div>
            @endif
            @if(session('success'))
                <div class="alert alert-success mt-3">
                    {{ session('success') }}
                </div>
            @endif
            <div class="row mt-3">
                <div class="col-lg-6" hidden>
                    <div class="form-group">
                        <label for="user_id">User Id</label>
                        <input type="text" name="user_id" id="user_id" value="{{ Auth::user()->id }}">
                    </div>
                </div>
                <div class="col-lg-6" hidden>
                    <div class="form-group">
                        <label for="kelas">Kelas</label>
                        <input type="text" name="kelas" id="kelas" value="{{ $videodetails->kelas->kelas }}">
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="form-group">
                        <label for="kode_mentor" class="form-control-label">Kode Mentor</label>
                        <input type="text" name="kode_mentor" id="kode_mentor" class="form-control" value="{{ $videodetails->kelas->mentor_id }}" readonly>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="form-group">
                        <label for="status" class="form-control-label">Status</label>
                        <input type="text" name="status" id="status" class="form-control" value="REQUEST" disabled>
                        <input type="hidden" name="status" id="status" class="form-control" value="PENDING">
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="form-group">
                        <label for="nama" class="form-control-label">Nama <i>untuk sertifikat anda</i></label>
                        <input type="text" name="nama" id="nama" class="form-control" value="{{ Auth::user()->name }}">
                    </div>
                </div>
                <div class="col-lg-6">
                    <label for="email" class="form-control-label">Email</label>
                    <input type="email" name="email" id="email" class="form-control" value="{{ Auth::user()->email }}" readonly>
                </div>
                <div class="col-lg-12">
                    <label for="feedback" class="form-control-label">Feedback</label>
                    <textarea name="feedback" id="feedback" class="form-control" rows="5"></textarea>
                </div>
            </div>
            @if ($sertifikat->count() > 0)
                <button type="button" style="float:right;" class="btn btn-primary mt-3 w-100" onclick="alert('Anda sudah mendapatkan sertifikat')">Submit</button>
            @else
                <button type="submit" style="float:right;" class="btn btn-primary mt-3 w-100">Submit</button>
            @endif
        </form>
    </div>


    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
  </body>
</html>
