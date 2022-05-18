<!DOCTYPE html>
<html>
<head>
	<title></title>
	<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="css/bootstrap.css">
	<link rel="stylesheet" href="css/bootstrap.css">
    <!-- <link rel="stylesheet" href="css/bootstrap.min.css"> -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style type="text/css">
@media (min-width:50px ) and (max-width: 450px) {
	body{
		min-height: 900px;
	}  
	.ats{
		margin-left:25px;
	}
	#c{
		margin-left: 80px;
	}
	#profile{
    min-height: 200px; 
    min-width: 200px;
    margin-left: 140px;
  	}
  	#andika{
    margin-top: 30px;
    font-size: 30px;
 	}
 	.siswa{
    margin-left: 100px;
    font-size: 20px;
  	}
  	.ul{
    background:#0f42b5;
    margin:0;
    padding:0;
    overflow: hidden; 
    position: fixed; 
    bottom: 0; 
    width: 100%; 
    list-style-type: none;
    font-size: 0px;
  }
  li img{
    display: block; 
    float: left;
    min-width: 50px;
    min-height: 50px;
  }
  #sama1{
  	margin-left: 50px;
    margin-top: 10px;
  }
  #sama2{
  	margin-top: 30px;
  }
}
@media (min-width: 451px) and (max-width:540px ) { 
	body{
	
		overflow-x:hidden; 
	}  
	.ats{
		margin-left:25px;
		margin-bottom:150px;
	}
	#c{
		margin-left: 80px;
	}
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
  	.ul{
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
  #sama{
  	margin-left: 80px;
    margin-top: 10px;
  } 
  #hom2{
  	margin: 0;
  	background-color:#0f42b5;
  }
  #sama1{
  	margin-top: 25px;
  	margin-left: 60px;
  }
  #sama2{
  	margin-top: 25px;
  	margin-left: 55px;
  }
  #sama3{
  	margin-top: 10px;
  	margin-left: 70px;
  }
}
@media (min-width: 541px) and (max-width: 950px) { 
	body{
		overflow-x: hidden;
	}
	.satu{
		min-width: 100%;
		max-height: 500px;
	}	
	.ats{
		height: 100%;
		width: 100%;
		position: absolute;
		top: 100%;
		right: 50%;
		left: 40%;
		bottom: 50%;
		margin-bottom: 190px;
	}
}
@media (min-width: 951px) and ( max-width: 1350px) { 
	 body{
	 	
	 	overflow-y:hidden;
	 }
	 #andika{
	 	font-size: 15px; 
	 }
	 #siswa{
	 	font-size: 10px;
	 	margin-left: 25px;
	 }
}
@media (min-width: 1200px) {  
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
	margin-top: -5px;
	width: 60px;
	height: 60px;
}
.sama3{
	margin-top: 10px;
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
.kata2{
	font-weight: bold;
	color: #069dc3
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
	background-color: white;
	margin-top: 20px;
	height: 50px;
	color: #069dc3;
	border-radius: 50px 0 0 50px;
}
.kelas{
	font-size: 30px;
	color: #4f4f4f;
	margin-top: 25px;
	margin-left: 50px;
}
.klas{
	color: #9e9e9e;
	margin-left: 50px; 
}
.a,.a1{
	color:#9e9e9e;
}
.a2{
	color: #069dc3	;
}
.a,.a1,.a2{
	margin-left: 35px;
}
.foto1,.foto2,.foto3{
    max-width: 298px;
    margin-left: -15px;
    margin-top: 0px;
}
.foto2{
	height: 167px;
}
.orang1{
    height: 50px;
    width: 50px;
    border-radius: 50%;
    margin-top: 20px;
}
.kata1{
    color: #069dc3;
   	font-weight: bold
}
.e{
    margin-top:22px;
    margin-left:10px;
    font-weight: bold;
}
.b{
   	font-weight: lighter;
    font-size: 13px;
}
.c{
    border-radius: 10px;
    width: 100px;
    background-color: #04B8D5;
    color: white;
    border: 0px;
    margin-top: 60px;
   	margin-left: 100px;	
}
.gambar1,.gambar2,.gambar3{
   	border: 1px solid #9e9e9e;
    border-radius: 5px;
    max-width: 300px;
    margin-top: 50px;
    height: 250px;
    box-shadow: 10px 10px 10px 0px #9e9e9e;
}
.gambar1{
	margin-left: 35px;
}
.gambar2{
	margin-left: 35px
}
.gambar3{
	margin-left: 35px;
}
</style>
</head>
<body>
<div class="container-fluid">
	<div class="row">
		<div class="satu col-sm-3" id="satu">
			<div>
			<img src="download.png" class="profile" id="profile">
				<h5 class="text-center andika" id="andika">Andika Wiraputra</h5>
				<p class="text-center siswa" id="siswa">Siswa</p>
			</div>
			<div id="myDropdown" class="dropdown-content d-block">
				<ul class="ul" id="ul">
   	 				<li>
   	 					<a href="homeSiswa.php" style="color:white">
   	 						<img src="home-1 copy.png" class="sama1" id="sama1">
   	 						<li class="kata1">Home</li>
   	 					</a>
   	 				</li>
   	 				<li class="hom2" id="hom2">
   	 					<img src="kelas.png" class="sama2" id="sama">
   	 					<li class="kata2">Kelas Saya</li>
   	 				</li>
   	 				<li class="hom">
   	 					<a href="profilSiswa.php" style="color:white">
   	 						<img src="orang.png" class="sama3" id="sama2" >
   	 						<li class="kata3">Guru Saya</li>
   	 					</a>
   	 				</li>
   	 				<li>
   	 					<a href="pemberitahuanSiswa.php" style="color:white">
   	 						<img src="notif.png" class="sama" id="sama3">
   	 						<li class="kata4">Pemberitahuan</li>
   	 					</a>
   	 				</li>
   	 			</ul>
  			</div>
		</div>	
		<div class="col-sm-9">
			<div>
				<h6 class="kelas font-weight-light">Kelas yang saya ikuti</h6>
				<p class="klas font-weight-light">Ayo tingkatkan minat belajarmu</p>
			</div>
			<div class="nav">
				<ul class="nav">
  					<li class="nav-item">
    					<a class="nav-link active a2" href="#">Gratis</a>
  					</li>
  					<li class="nav-item">
   						<a class="nav-link a" href="#">Premium</a>
  					</li>
				</ul>
			</div>
			<div class="row ats">
				<div class="gambar1 col-md-3">
				<div>
					<img src="poto.jpg" class="foto1">
				</div>
				<div class="kata1">Photoshop</div>
					<div class="row">
						<div class="e col-sm-2">Photoshop </div>
						<div class="col-sm-4">
							<input id="c" class="c" type="submit" name="pesan" value="Lanjutkan">
						</div>
					</div>
				</div>
				<div class="gambar2 col-md-3">
				<div>
					<img src="vbox.jpg" class="foto2">
				</div>
				<div class="kata1">Virtual Box</div>
					<div class="row">
					<div class="e col-sm-2">VirtualBox</div>
					<div class="col-sm-4">
						<input id="c" class="c" type="submit" name="pesan" value="Lanjutkan">
					</div>
					</div>
				</div>
				<div class="gambar3 col-md-3">
				<div>
					<img src="audi.png" class="foto3">
				</div>
				<div class="kata1">Adobe Audition</div>
					<div class="row">
						<div class="e col-sm-2">Audition</div>
						<div class="col-sm-4">
							<input id="c" class="c" type="submit" name="pesan" value="Lanjutkan">
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
</body>
</html>