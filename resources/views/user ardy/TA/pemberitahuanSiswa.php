<!DOCTYPE html>
<html>
<head>
	<title></title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/bootstrap.min.css"> 
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous"> -->
<style type="text/css">
// Extra small devices (portrait phones, less than 576px)
@media (min-width:50px ) and (max-width: 450px) {  
	body{}
}
@media(min-width: 451px) and (max-width:540px )  { 
	body{}
	#profile{
    min-height: 200px; 
    min-width: 200px;
    margin-left: 140px;
  	}
  	#andika{
    margin-top: 30px;
    font-size: 30px;
    margin-left: 20px;
 	}
 	.siswa{
    margin-left: 80px;
    font-size: 20px;
  	} 
  	 ul{
    background:#0f42b5;
    margin:0;
    padding:0;
    overflow: hidden; 
    position: fixed; 
    bottom: 0; 
    width: 100%; 
    list-style-type: none;
    font-size: 0px;
    z-index: 1;
  	}
  	li img{
    display: block; 
    float: left;
    min-width: 30px;
    min-height: 30px; 
  	}
  	#sama4{
  		margin-top: -25px;
  		margin-left: 70px;
  	}
  	#sama1{
  		margin-left: 60px;
  	}
  	#sama2{
  		margin-left: 80px;
  	}
  	#sama3{
  		margin-left: 55px;
  		margin-top: -10px;
  	}
  	#hom3{
  		margin:0;
  		background: #0f42b5;
  	}
  	.notip{
  		margin-bottom: 100px;
  	}
}
@media(min-width: 541px) and (max-width: 950px) { 
	.satu{
		min-width: 100%;
	}
}
@media(min-width: 951px) and (max-width: 1350px) { 
	#andika{
		font-size: 15px
	}
	#siswa{
		font-size: 10px;
		margin-left: 25px
	}
}
@media(min-width: 1200px) { 
	body{} 
}
body{
	margin:0;
	font-family: roboto;
}
.satu{
    background-color: #0f42b5;
    margin:0;
    padding:0;
    position: fixed;
    height: 657px;
    max-width: 100%;
    position: relative;
  	display:block;
}
.sama{
	width: 30px;
	height: 30px;
	/*margin-left: -20px;*/
	margin-top: 30px;
	color: white;
	margin-left: 12px;
}
.sama1{
	width: 30px;
	height: 30px;
	margin-left: 12px;
	margin-top: 10px;
	margin-bottom: 10px;
}
.sama2{
	margin-top: 10px;
	margin-left: 12px;
	width: 30px;
	height: 30px;
}
.sama3{
	margin-top: 12px;
	width: 30px;
	height: 30px;
	margin-left: 12px;
}
.sama4{
	margin-top: 12px;
	width: 30px;
	height: 30px;
	margin-left: 12px;
}
.profile{
	border-radius: 50%;
	margin-top:40px; 
	margin-left:40px; 
	width: 60px;
}
.andika{
	color: white;
	font-family: Roboto;
	margin-top: -50px;
	margin-left: 45px;
	font-size: 20px;
}
p{
	color: white;
	margin-right: 70px;
	margin-top: -10px;
}
.guru{
	font-family: ;
}
ul{
	list-style-type: none;
	margin-top: 50px;
}
.kata1,.kata2,.kata3,.kata4{
	color: white;
	margin-top: -20px;
	margin-left: 77px;
}
.kata2,.kata4{
	margin-top: -25px;
}
.kata1{
	color: black;
	margin-top: -35px
}

.kata2,.kata3{
	margin-top: -35px;
}
.hom{

	margin-top: 20px;
	height: 50px;
	color: #069dc3;

}
.hom2{
	margin-top: 20px;
	height: 50px;
}
.hom3{
	background-color: white;
	margin-top: 20px;
	height: 50px;
	border-radius: 50px 0 0 50px;
}
.kata4{
	color:#069dc3;
	font-weight: bold;
	margin-top: -35px
}

.alert {
  padding: 20px;
  background-color: #4CAF50;
  color: white;
}
.danger{
	background-color: #f44336;
}
.info{
	background-color: #2196F3;
}

.closebtn {
  margin-left: 15px;
  color: white;
  font-weight: bold;
  float: right;
  font-size: 22px;
  line-height: 20px;
  cursor: pointer;
  transition: 0.3s;
}

.closebtn:hover {
  color: black;
}
</style>
</head>
<body>
<div class="container-fluid">
	<div class="row">
		<div class="satu col-sm-3">
			<div>
			<img src="download.png" class="profile" id="profile">
				<h5 class="text-center andika" id="andika">Andika Wiraputra</h5>
				<p class="text-center siswa" id="siswa">Siswa</p>
			</div>
			<div id="myDropdown" class="dropdown-content d-block">
				<ul>
   	 				<li><a href="homeSiswa.php" style="color:white"><img src="home-1 copy.png" class="sama1" id="sama1"><li class="kata1">Home</li></a></li>
   	 				<li class="hom2"><a href="kelasSiswa.php"style="color:white"><img src="kelas copy.png" class="sama2" id="sama2"><li class="kata2">Kelas Saya</li></a></li>
   	 				<li class="hom"><a href="profilSiswa.php" style="color:white"><img src="orang.png" class="sama3" id="sama3"><li class="kata3">Guru Saya</li></a></li>
   	 				<li class="hom3" id="hom3"><img src="notifbiru.png" class="sama4" id="sama4"><li class="kata4">Pemberitahuan</li></li>
   	 			</ul>
  			</div>
		</div>
		
				
		<div class="col-sm-9">
			<div>
				<h3 class="guru" id="guru">Pemberitahuan Saya</h3>
			</div>
<div class="notip">
<div class="alert">
  <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span> 
  <strong>Berhasil!</strong> Kamu sekarang telah mengikuti kelas Adobe XD.
</div>

<div class="alert">
  <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span> 
  <strong>Berhasil!</strong> Kamu sekarang telah mengikuti kelas Fisika Lanjutan.
</div>

<div class="alert danger">
  <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span> 
  <strong>Berbahaya!</strong> Akunmu belum dikaitkan dengan akun google.
</div>

<div class="alert info">
  <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span> 
  <strong>Promo!</strong> Ikuti kelas Matematika dan dapatkan diskon 20%.
</div>
</div>
		</div>
	</div>
</div>
</body>
</html>