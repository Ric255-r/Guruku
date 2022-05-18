<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="css/mycss.css">
    <link rel="stylesheet" type="text/css" href="dist/assets/owl.carousel.min.css">
    <link rel="stylesheet" type="text/css" href="dist/assets/owl.theme.default.min.css">
    <title>Guruku</title>
</head>
<body>
    {{-- navbar  --}}
    {{-- <header>
        <section class="banner img-fluid">
        <nav class="navbar navbar-expand-lg navbar-light">
            <div class="container">
                <a class="navbar-brand" href="#">Logo</a>
                <button class="navbar-toggler whi" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
                    <ul class="navbar-nav ml-auto mt-2 mt-lg-0">
                        <li class="nav-item">
                            <a class="nav-link mr-5" style="color:white" href="#">Beranda</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link mr-5 pu" style="color:white" href="#">Paket Kelas</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link mr-5 pu" style="color:white" href="#">Kelas</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link mr-5 pu" style="color:white" href="#">Guru</a>
                        </li>
                    </ul>
                    <button class="btn btn-outline-light text-white my-2 my-sm-0 mr-5" type="submit">Login</button>
                    <button class="btn btn-outline-light text-white my-2 my-sm-0" type="submit">Register</button>
                </div>
            </div>
        </nav>
        </section>
    </header> --}}
    <div class="container-fluid banner">
        <div class="row">
            <div class="col-12 col-sm-12 col-lg-12 col-md-12 col-xl-12">
                <nav class="navbar navbar-expand-lg navbar-light">
                    <div class="container">
                        <a class="navbar-brand" href="#">Logo</a>
                        <button class="navbar-toggler whi" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
                            <ul class="navbar-nav ml-auto mt-2 mt-lg-0">
                                <li class="nav-item">
                                    <a class="nav-link mr-5" style="color:white" href="#">Beranda</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link mr-5 pu" style="color:white" href="#">Paket Kelas</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link mr-5 pu" style="color:white" href="#">Kelas</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link mr-5 pu" style="color:white" href="#">Guru</a>
                                </li>
                            </ul>
                            <button class="btn btn-outline-light text-white my-2 my-sm-0 mr-5" type="submit">Login</button>
                            <button class="btn btn-outline-light text-white my-2 my-sm-0" type="submit">Register</button>
                        </div>
                    </div>
                </nav>
            </div>
        </div>
        <div class="row">
            <div class="col-6">
                <p class="gab">Gabung Bersama Kami sekarang <br> & dapatkan guru les anda</p>
            </div>
        </div>
    </div>
    {{-- banner
    <div class="container-fluid img-fluid banner">
        <div class="row">
            <div class="col-sm-6">
                <h1 class="txtban">Gabung bersama kami sekarang <br> dapatkan guru les anda.</h1></div>
            <div class="col-sm-6"></div>
        </div>
    </div> --}}


    {{-- rekomendasi guru  --}}
    <div class="container">
        <div class="row">
            <div class="col-12 col-sm-12 col-xl-12 col-lg-12 col-md-12">
                <p class="prom">Rekomendasi Guru</p>
            </div>
        </div>
    </div>

    <div class="container-fluid">
        <div class="row">
            <div class="col-12 col-sm-12 col-xl-3 col-lg-3 col-md-3" style="margin-top:50px;">
                <img src="img/ilu.png" alt="ilu" class="img-fluid">
            </div>
            <div class="col-12 col-lg-3 col-md-12 rak">
                {{-- <div class="col-12 col-sm-12 col-lg-3 col-xl-3 col-md-3"> --}}
                    <div class="card" style="width: 17rem; border:none border-radius:10px; box-shadow:5px 5px 5px 2px grey;">
                        <img src="img/gugu.png" class="card-img-top" style="width:272px; height:73px;" alt="gugu">
                        <div class="card-body">
                            <h5 class="card-title pho">Photoshop</h5>
                            <div class="media mt-3">
                                <img src="img/peo.png" alt="John Doe" class=" rounded-circle" style="width:60px;">
                                <div class="media-body ml-2">
                                    <p class="ve">Andika Wiraputra</p>
                                    <p class="men">Pengajar</p>
                                    <span class="bin">bintang<span><button class="btn btn-info pes">pesan</button></span></span>
                                </div>
                            </div>
                        </div>
                    </div>
                {{-- </div> --}}
            </div>
            <div class="col-12 col-lg-3 col-md-3 rak">
                {{-- <div class="col-12 col-lg-3 col-md-3"> --}}
                    <div class="card" style="width: 17rem; border:none border-radius:10px; box-shadow:5px 5px 5px 2px grey;">
                        <img src="img/gugu.png" class="card-img-top" style="width:272px; height:73px;" alt="gugu">
                        <div class="card-body">
                            <h5 class="card-title pho">Photoshop</h5>
                            <div class="media mt-3">
                                <img src="img/peo.png" alt="John Doe" class=" rounded-circle" style="width:60px;">
                                <div class="media-body ml-2">
                                    <p class="ve">Andika Wiraputra</p>
                                    <p class="men">Pengajar</p>
                                    <span class="bin">bintang<span><button class="btn btn-info pes">pesan</button></span></span>
                                </div>
                            </div>
                        </div>
                    </div>
                {{-- </div> --}}
            </div>
            <div class="col-12 col-sm-12 col-lg-3 col-xl-3 col-md-3 rak">
                {{-- <div class="col-12 col-sm-12 col-lg-3 col-xl-3 col-md-3"> --}}
                    <div class="card" style="width: 17rem; border:none border-radius:10px; box-shadow:5px 5px 5px 2px grey;">
                        <img src="img/gugu.png" class="card-img-top" style="width:272px; height:73px;" alt="gugu">
                        <div class="card-body">
                            <h5 class="card-title pho">Photoshop</h5>
                            <div class="media mt-3">
                                <img src="img/peo.png" alt="John Doe" class=" rounded-circle" style="width:60px;">
                                <div class="media-body ml-2">
                                    <p class="ve">Andika Wiraputra</p>
                                    <p class="men">Pengajar</p>
                                    <span class="bin">bintang<span><button class="btn btn-info pes">pesan</button></span></span>
                                </div>
                            </div>
                        </div>
                    </div>
                {{-- </div> --}}
            </div>
        </div>
    </div>
    {{-- selesai rekomendasi  --}}

    {{-- apa itu guru ku --}}

    <div class="container-fluid">
        <div class="row">
            <div class="col-12 wat">
                <div class="container">
                    <div class="row">
                        <div class="col-6">
                            <p class="ap">Apa itu Guruku</p>
                            <p class="ru"><span class="gur">GURUKU</span> adalah sebuah aplikasi yang dikhususkan untuk masyarakat yang
                                kesulitan dalam mencari guru les yang berkualitas dengan harga yang
                                terjangkau. sekarang anda tidak perlu khawatir lagi karena sekarang
                                <span class="gur">GURUKU</span> hadir untuk memecahkan masalah itu kami tentunya
                                menyediakan guru les yang berkualitas dengan harga yang
                                terjangkau dengan proses yang sangat mudah dan aman. </p>
                        </div>
                        <div class="col-6">
                            <img src="/img/vec.png" class="img-fluid vec1" alt="vector">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- kenapa harus guru ku --}}

    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-6">
                <img src="/img/ken.png" class="img-fluid ken" alt="ken">
            </div>
            <div class="col-sm-6">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-4">
                            <div class="col-sm-12"><img src="/img/studi.png" class="img-fluid stud" alt="studi"></div>
                            <div class="txtstud">Studi</div>
                            <div class="txtstud2">Update Setiap Hari</div>
                        </div>
                        <div class="col-sm-4">
                            <div class="col-sm-12"><img src="/img/modul.png" class="img-fluid stud" alt="modul"></div>
                            <div class="txtstud">Modules</div>
                            <div class="txtstud2">Dasar ke Expert</div>
                        </div>
                        <div class="col-sm-4">
                            <div class="col-sm-12"><img src="/img/konsul.png" class="img-fluid stud" alt="konsul"></div>
                            <div class="txtstud">Konsultasi</div>
                            <div class="txtstud2">Setiap Saat</div>
                        </div>
                        <div class="col-sm-4">
                            <div class="col-sm-12"><img src="/img/serti.png" class="img-fluid stud" alt="serti"></div>
                            <div class="txtstud">Sertifikat</div>
                            <div class="txtstud2">Kelulusan Kelas</div>
                        </div>
                        <div class="col-sm-4">
                            <div class="col-sm-12"><img src="/img/bayar.png" class="img-fluid stud" alt="bayar"></div>
                            <div class="txtstud">Pembayaran</div>
                            <div class="txtstud2">Metode Pembayaran Yang Mudah</div>
                        </div>
                        <div class="col-sm-4">
                            <div class="col-sm-12"><img src="/img/teach.png" class="img-fluid stud" alt="teach"></div>
                            <div class="txtstud">Guru</div>
                            <div class="txtstud2">Guru yang Ahli</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- carousel  --}}
    <div class="container">
        <div class="row">
            <div class="col-12">
                <p class="prom">Promo</p>
            </div>
        </div>
    </div>

    <div class="container topp">
        <div class="row">
            <div class="col-12">
                <div class="owl-carousel owl-theme">
                    <div class="item ga">
                        <p class="sew">Sewa kembali guru anda <br> dan dapatkan diskon <br> <span class="persen">25%</span></p>
                    </div>
                    <div class="item ga">
                        <p class="sew">Sewa kembali guru anda <br> dan dapatkan diskon <br> <span class="persen">25%</span></p>
                    </div>
                    <div class="item ga">
                        <p class="sew">Sewa kembali guru anda <br> dan dapatkan diskon <br> <span class="persen">25%</span></p>
                    </div>
                    <div class="item ga">
                        <p class="sew">Sewa kembali guru anda <br> dan dapatkan diskon <br> <span class="persen">25%</span></p>
                    </div>
                    <div class="item ga">
                        <p class="sew">Sewa kembali guru anda <br> dan dapatkan diskon <br> <span class="persen">25%</span></p>
                    </div>
                    <div class="item ga">
                        <p class="sew">Sewa kembali guru anda <br> dan dapatkan diskon <br> <span class="persen">25%</span></p>
                    </div>
                    <div class="item ga">
                        <p class="sew">Sewa kembali guru anda <br> dan dapatkan diskon <br> <span class="persen">25%</span></p>
                    </div>
                    <div class="item ga">
                        <p class="sew">Sewa kembali guru anda <br> dan dapatkan diskon <br> <span class="persen">25%</span></p>
                    </div>
                    <div class="item ga">
                        <p class="sew">Sewa kembali guru anda <br> dan dapatkan diskon <br> <span class="persen">25%</span></p>
                    </div>
                    <div class="item ga">
                        <p class="sew">Sewa kembali guru anda <br> dan dapatkan diskon <br> <span class="persen">25%</span></p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- testimoni  --}}
    <div class="container">
        <div class="row">
            <div class="col-12">
                <p class="prom">Testimoni</p>
            </div>
        </div>
    </div>

    <div class="container-fluid">
        <div class="row">
            <div class="col-4">
                <div class="col-12 bes" style="border-radius:10px;">
                    <p class="tes"><img src="img/peo.png" style="width:70px; height:70px;" alt="people"><span class="an">Andika Wiraputra</span></p>
                    <p class="text-center san">"Sangat menarik, aplikasi ini sangat membantu saya
                        dalam mencari guru les privat sekarang saya tidak perlu
                        susah susah lagi mencari guru les cukup melalui hp
                        saya sudah bias mencari guru les yang saya inginkan."</p>
                </div>
            </div>
            <div class="col-4">
                <div class="col-12 bes" style="border-radius:10px;">
                    <p class="tes"><img src="img/peo.png" style="width:70px; height:70px;" alt="people"><span class="an">Andika Wiraputra</span></p>
                    <p class="text-center san">"Sangat menarik, aplikasi ini sangat membantu saya
                        dalam mencari guru les privat sekarang saya tidak perlu
                        susah susah lagi mencari guru les cukup melalui hp
                        saya sudah bias mencari guru les yang saya inginkan."</p>
                </div>
            </div>
            <div class="col-4">
                <div class="col-12 bes" style="border-radius:10px;">
                    <p class="tes"><img src="img/peo.png" style="width:70px; height:70px;" alt="people"><span class="an">Andika Wiraputra</span></p>
                    <p class="text-center san">"Sangat menarik, aplikasi ini sangat membantu saya
                        dalam mencari guru les privat sekarang saya tidak perlu
                        susah susah lagi mencari guru les cukup melalui hp
                        saya sudah bias mencari guru les yang saya inginkan."</p>
                </div>
            </div>
        </div>
    </div>

    {{-- akhir testimoni  --}}


    {{-- belajar secara online  --}}

    <div class="container-fluid">
        <div class="row">
            <div class="col-12 ung">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-4">
                            <img src="img/ilu2.png" alt="ilu2" class="img-fluid ilu2">
                        </div>
                        <div class="col-8">
                            <p class="bel">Belajar Secara Online Kapanpun dan Dimanapun</p>
                            <p class="ak">Akses kelas premium untuk mendapatkan seluruh fasilitas</p>
                            <button class="btn btn-outline-light rad">DAPATKAN PREMIUM</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- footer  --}}

    <div class="container-fluid">
        <div class="row">
            <div class="col-12 fot">
                <div class="container">
                    <div class="row">
                        <div class="col-3">
                            <ul class="uli">
                                <li class="in1">Informasi perusahaan</li>
                                <li class="ten">Tentang kami</li>
                                <li class="ten">Karir</li>
                                <li class="ten">Kontak</li>
                            </ul>
                        </div>
                        <div class="col-3">
                            <ul class="uli">
                                <li class="in1">Pelajari lebih</li>
                                <li class="ten">Fitur</li>
                                <li class="ten">Kisah sukses</li>
                                <li class="ten">Cara transaksi</li>
                                <li class="ten">Menjadi pengajar</li>
                                <li class="ten">Aplikasi ponsel</li>
                            </ul>
                        </div>
                        <div class="col-3">
                            <ul class="uli">
                                <li class="in1">Layanan lainnya</li>
                                <li class="ten">Instant E-learning</li>
                            </ul>
                        </div>
                        <div class="col-2">
                            <ul class="uli">
                                <li class="in1">Ikuti kami</li>
                                <li class="ten">Facebook</li>
                                <li class="ten">Instagram</li>
                                <li class="ten">Twitter</li>
                            </ul>
                        </div>
                        <div class="col-1">
                            <ul class="uli">
                                <li class="in1">Bantuan</li>
                            </ul>
                        </div>
                    </div>
                {{-- </div> --}}
            </div>
        </div>
    </div>


    {{-- coba  --}}

    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-4 col-12 col-md-10">
                <div class="card" style="width: 18rem;">
                    <img src="img/gugu.png" class="card-img-top" alt="gugu">
                    <div class="card-body">
                      <h5 class="card-title">Card title</h5>
                      <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                      <a href="#" class="btn btn-primary">Go somewhere</a>
                    </div>
                  </div>
            </div>
            <div class="col-lg-4 col-12 col-md-10">
                <div class="card" style="width: 18rem;">
                    <img src="img/gugu.png" class="card-img-top" alt="gugu">
                    <div class="card-body">
                      <h5 class="card-title">Card title</h5>
                      <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                      <a href="#" class="btn btn-primary">Go somewhere</a>
                    </div>
                  </div>
            </div>
            <div class="col-lg-4 col-12 col-md-10">
                <div class="card" style="width: 18rem;">
                    <img src="img/gugu.png" class="card-img-top" alt="gugu">
                    <div class="card-body">
                      <h5 class="card-title">Card title</h5>
                      <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                      <a href="#" class="btn btn-primary">Go somewhere</a>
                    </div>
                  </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <script src="dist/owl.carousel.min.js"></script>
    <script src="mouse/query/jquery.mousewheel.min.js"></script>
    <script>
        $('.owl-carousel').owlCarousel({
            autoplay:true,
            autoplayHoverPause:true,
            loop:true,
            margin:10,
            // lazyload:true,
            // margin:10,
            // stagePadding:5,
            responsive:{
                0:{

                    items:1,
                    nav:false
                },
                480:{
                    items:1,
                    nav:false
                },
                600:{
                    items:2,
                    nav:true
                },
                1000:{
                    items:3,
                    nav:true
                },
            }
        });
    </script>
</body>
</html>
