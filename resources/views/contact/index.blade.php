<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ URL::asset('/css/kelasbaru.css') }}">
    <link rel="shortcut icon" sizes="57x57" href="{{ URL::asset('/Foto/favicon.png') }}">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('dist/assets/owl.carousel.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('dist/assets/owl.theme.default.min.css') }}">
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
    <title>Contact-Us</title>
  </head>
  <body>

    <header class="bck-color-mentor">
        @include('navs.navbar2')

        <div class="container-fluid">
            <div class="row text-center">
                <div class="col-lg-12" data-aos="fade-up" data-aos-delay="300">
                    <h2 class="yuk-contact-index">Admin Guruku</h2>
                    <p class="jgn-contact">
                        Punya pertanyaan seputar Guruku? Silahkan hubungi Admin dibawah ini. <br>
                    </p>
                </div>
            </div>
        </div>
    </header>

    <main>
        <section class="admin-body mt-5">
            <div class="container">
                <div class="row justify-content-center">
                    @foreach ($user as $query)
                        <div class="col-lg-4">
                            <div class="card text-center" style="min-height:300px;"
                                data-aos="fade-up" data-aos-delay="300">
                                @if ($query->file != null)
                                    <img src="{{ asset('/storage/'.$query->file) }}" class="card-img-top px-3 py-3" style="border-radius:20px; height:208px;" alt="pic">
                                @else
                                    <img src="{{ asset('/Foto/man.png') }}" class="card-img-top px-3 py-3" style="border-radius:20px; height:208px;" alt="pic">
                                @endif
                                <div class="card-body">
                                    <h5 class="card-title">{{ $query->name }}</h5>
                                    <h6 class="card-title mentor-bidang">{{ $query->email }}</h6>
                                    <div class="row">
                                        {{--<div class="col-lg-6">
                                            @if ($query->instagram_profile == null)
                                                <a href="#" target="_blank"><i class="fa fa-instagram" style="color:black; font-size:30px;"></i></a>
                                            @else
                                                <a href="{{ $query->instagram_profile }}" target="_blank"><i class="fa fa-instagram" style="color:black; font-size:30px;"></i></a>
                                            @endif
                                            @if ($query->twitter_profile == null)
                                                <a href="#" target="_blank"><i class="fa fa-twitter" style=" font-size:30px;"></i></a>
                                            @else
                                                <a href="{{ $query->twitter_profile }}" target="_blank"><i class="fa fa-twitter" style=" font-size:30px;"></i></a>
                                            @endif
                                        </div>--}}
                                        <div class="col-lg-12 text-center">
                                            <a class="btn btn-info" style="width:100px;" href="https://api.whatsapp.com/send/?phone={{ $query->telp }}&text=Halo%21+Boleh+tanya+lebih+lanjut+mengenai+Guruku+%3A%29&app_absent=0" target="_blank">Chat</a>
                                            {{--<button class="btn btn-info" onclick="event.preventDefault(); location.href='';">View Details</button>--}}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>

        @guest
            <section class="contact-us">
                <form data-aos="zoom-in" data-aos-delay="300">
                    {{--@csrf--}}
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-12 text-left">
                                <h3>Contact Us</h3>
                                @if(session('success'))
                                    <div class="alert alert-success">
                                        {{ session('success') }}
                                    </div>
                                @endif
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="nama" class="form-control-label">Nama</label>
                                    <input type="text" name="nama" class="form-control">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="email" class="form-control-label">Email</label>
                                    <input type="email" name="email" class="form-control">
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label for="pesan" class="form-control-label">Pesan</label>
                                    <textarea name="pesan" class="form-control ckeditor" id="pesan" cols="30" rows="10"></textarea>
                                </div>
                            </div>
                        </div>
                        <button type="button" onclick="alert('Login terlebih dahulu ya!'); event.preventDefault(); location.href='{{ url('login') }}'" class="btn btn-info" style="float:right;">Kirim Pesan</button>
                    </div>
                </form>
            </section>
        @endguest

        @auth
            @if (Auth::user()->roles == 'ADMIN')

            @elseif(Auth::user()->roles == 'USERS')
                <section class="contact-us" data-aos="zoom-in" data-aos-delay="300">
                    <form action="{{ route('contact-us.store') }}" method="POST">
                        @csrf
                        <div class="container">
                            <div class="row">
                                <div class="col-lg-12 text-left">
                                    <h3>Contact Us</h3>
                                    @if(session('success'))
                                        <div class="alert alert-success">
                                            {{ session('success') }}
                                        </div>
                                    @endif
                                    @if(count($errors) > 0)
                                        <div class="alert alert-danger">
                                            @foreach ($errors->all() as $error)
                                            {{ $error }} <br/>
                                            @endforeach
                                        </div>
                                    @endif
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group" hidden>
                                    <label for="user_id">User Id</label>
                                    <input type="text" name="user_id" value="{{ Auth::user()->id }}">
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="nama" class="form-control-label">Nama</label>
                                        <input type="text" name="nama" class="form-control" value="{{ Auth::user()->name }}">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="email" class="form-control-label">Email</label>
                                        <input type="text" name="email" class="form-control" value="{{ Auth::user()->email }}" readonly>
                                    </div>
                                    {{--<div class="form-group" hidden>
                                        <label for="email">Email</label>
                                        <input type="email" name="email" value="{{ Auth::user()->email }}">
                                    </div>--}}
                                </div>
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label for="pesan" class="form-control-label">Pesan</label>
                                        <textarea name="pesan" class="form-control ckeditor" id="pesan" cols="30" rows="10"></textarea>
                                    </div>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-info" style="float:right;">Kirim Pesan</button>
                        </div>
                    </form>
                </section>
            @else
                <section class="contact-us" data-aos="fade-up" data-aos-delay="300">
                    <form action="{{ route('contact-us.reqkelas') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="container">
                            <div class="row">
                                <div class="col-lg-12 text-left">
                                    <h3>Request Kelas</h3>
                                    @if(session('success'))
                                        <div class="alert alert-success">
                                            {{ session('success') }}
                                        </div>
                                    @endif
                                    @if(count($errors) > 0)
                                        <div class="alert alert-danger">
                                            @foreach ($errors->all() as $error)
                                            {{ $error }} <br/>
                                            @endforeach
                                        </div>
                                    @endif
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="mentor_id" class="form-control-label">Mentor Id</label>
                                        <input type="text" name="mentor_id" id="mentor_id" class="form-control" readonly value="{{ Auth::user()->kode_mentor }}">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="status" class="form-control-label">Status</label>
                                        <input type="text" name="status" id="status" class="form-control" readonly value="REQUEST">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="file" class="form-control-label">File</label>
                                        <input type="file" name="file" id="file" class="form-control">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="kelas" class="form-control-label">Kelas</label>
                                        <input type="text" name="kelas" id="kelas" class="form-control" value="{{ old('kelas') }}">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="kategori" class="form-control-label">Kategori</label>
                                        <select name="kategori" id="kategori" class="form-control">
                                            <option value="">-- Pilih Kategori --</option>
                                            @foreach ($kategori as $query)
                                                <option value="{{ $query->kategori }}">{{ $query->kategori }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <label for="topik" class="form-control-label">Topik</label>
                                    <select name="topik" id="topik" class="form-control">

                                    </select>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="jenis" class="form-control-label">Jenis</label>
                                        <select name="jenis" id="jenis" class="form-control">
                                            <option value="">-- Pilih Jenis --</option>
                                            <option value="gratis">Gratis</option>
                                            <option value="premium">premium</option>
                                        </select>  
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="harga" class="form-control-label">Harga</label>
                                        <input type="text" name="harga" id="harga" value="{{ old('harga') }}" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="Materi" class="form-control-label">Tingkatan</label>
                                        <select name="materi" id="materi" class="form-control">
                                            <option value="SD">SD</option>
                                            <option value="SMP">SMP</option>
                                            <option value="SMA SMK">SMA / SMK</option>
                                            <option value="Semua Tingkatan">Semua Tingkatan</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="tingkatan" class="form-control-label sertifikat">
                                            Apakah Kelas ini dibuat untuk Pemula ? 
                                        </label>
                                        <label class="radio-inline form-control sertifikat">
                                            <input type="radio" name="tingkat" value="Pemula">Ya
                                        </label>
                                        <label class="radio-inline form-control sertifikat">
                                            <input type="radio" name="tingkat" value="Lanjutan">Tidak
                                        </label>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label for="sertifikat" class="form-control-label sertifikat">Sertifikat</label>
                                        <label class="radio-inline form-control sertifikat"><input type="radio" name="sertifikat" value="1">Ya</label>
                                        <label class="radio-inline form-control sertifikat"><input type="radio" name="sertifikat" value="0">Tidak</label>
                                    </div>
                                </div>
                                {{-- <div class="col-lg-6">
                                    <label for="materi">Materi</label>
                                    <input type="text" name="materi" id="materi" value="Semua Tingkatan">
                                </div> --}}
                            </div>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        {{--konsultasi di hide --}}
                                        {{--<label for="konsultansi" class="form-control-label konsultansi">Konsultasi</label>
                                        <label class="radio-inline form-control konsultansi"><input type="radio" name="konsultansi" value="1">Ya</label>
                                        <label class="radio-inline form-control konsultansi"><input type="radio" name="konsultansi" value="0">Tidak</label>--}}
                                        <input type="text" name="konsultansi" id="konsultansi" value="0" hidden>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <input type="text" name="link_konsul" id="link_konsul" value="" hidden>
                                        {{--<label for="link_konsul" class="form-control-label">Link Konsultansi</label>
                                        <textarea name="link_konsul" id="link_kon" rows="3" class="form-control">{{ old('link_konsul') }}</textarea>--}}
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                {{--ini sertifikat pindah ke samping tingkatan --}}
                                {{--<div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="sertifikat" class="form-control-label sertifikat">Sertifikat</label>
                                        <label class="radio-inline form-control sertifikat"><input type="radio" name="sertifikat" value="1">Ya</label>
                                        <label class="radio-inline form-control sertifikat"><input type="radio" name="sertifikat" value="0">Tidak</label>
                                    </div>
                                </div>--}}
                                {{--<div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="pic_serti" class="form-control-label">File Sertifikat</label>
                                        <input type="file" name="pic_serti" id="pic_serti" class="form-control">
                                    </div>
                                </div>--}}
                            </div>
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label for="deskripsi" class="form-control-label">Deskripsi</label>
                                        <textarea name="deskripsi" id="deskripsi" class="form-control ckeditor">{{ old('deskripsi') }}</textarea>
                                    </div>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-info" style="float:right;">Kirim Pesan</button>
                        </div>
                    </form>
                </section>
            @endif
        @endauth

    </main>


    @include('includes.footer')


    {{--<script
        src="https://code.jquery.com/jquery-3.5.1.js"
        integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc="
        crossorigin="anonymous"></script>--}}
    {{--<script src="https://code.jquery.com/jquery-3.5.0.min.js"></script>--}}
    <script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
    {{--<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>--}}
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <script src="https://cdn.ckeditor.com/ckeditor5/18.0.0/classic/ckeditor.js"></script>

    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
    <script>
      AOS.init({
        //  offset:400,
          duration:1000
      });
    </script>

    <script>
        ClassicEditor
        .create( document.querySelector( '.ckeditor' ) )
            .then( editor => {
                    console.log( editor );
                    // removePlugins = 'elementspath';
            } )
            .catch( error => {
                    console.error( error );
            });
    </script>

    <script>

        $(document).ready(function(){
            //alert('1');
            $('.konsultansi').change(function(){
                //input:radio[name=gender][value=Male]
                var selectedKonsul = $(this).children('input[name="konsultansi"]:checked').val();
                //alert(selectedKonsul);
                if(selectedKonsul == '1')
                {
                    //prompt(selectedKonsul);
                    $('#link_kon').prop('readonly',false);
                }
                if(selectedKonsul == '0')
                {
                    //prompt(selectedKonsul);
                    $('#link_kon').val("-");
                }
            });

            $('.sertifikat').change(function(){
                var selectedSerti = $(this).children('input[name="sertifikat"]:checked').val();
                if(selectedSerti == '1')
                {
                    $('#pic_serti').show();
                    //$('#pic_serti').show();
                }
                if(selectedSerti == '0')
                {
                    $('#pic_serti').hide();
                }
            });

            $("select#jenis").change(function(){
                var selectedJenis = $(this).children("option:selected").val();
                if(selectedJenis == 'gratis')
                {
                    // $('#harga').val(0);
                    // $('#harga').prop('disabled', true);
                    $('#harga').prop('readonly',true);
                    $('#harga').val('0');
                }
                if(selectedJenis == 'premium')
                {
                    $('#harga').prop('readonly',false);
                }
                //if(selectedJenis == 'paket')
                //{
                //    $('#harga').show();
                //}
            });
        });

        $('#kategori').on('change',function(e){
            console.log(e);
            var topik = e.target.value;
            $.get('{{ route('kelas.dropdown') }}?kategori_id='+topik,function(data){
                // console.log(data);
                $('#topik').empty();
                $.each(data, function(index, subObj){
                    $('#topik').append('<option value="'+subObj.topik+'">'+subObj.topik+'</option>');
                });
            });
        });
    </script>
  </body>
</html>
