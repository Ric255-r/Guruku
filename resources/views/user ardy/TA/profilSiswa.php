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
	body
}
@media (min-width: 451px) and (max-width:540px ) { 
	body{} 
	.ats{
		margin-left:25px;
		margin-bottom: 150px;
	}
	#e{
		margin-top: -69px;
		margin-left: 60px
	}
	#c{
		margin-left: 160px;
		margin-top: -90px;
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
  	#hom{
  	margin: 0;
  	background-color:#0f42b5;
  }
  #hom1{
  	margin-left: 60px;
  }
  #hom2{
  	margin-left: 80px;
  	margin-top: 10px
  }
  #hom3{
  	margin-left: 70px;
  	margin-top: 10px;
  }
  #hom4{
  	margin-left:55px;
  }
}
@media(min-width: 541px) and (max-width: 950px) { 
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
		top: 50%;
		right: 50%;
		left: 50%;
		bottom: 50%;
		margin-bottom: 190px;
	}
}
@media(min-width: 951px) and (max-width: 1360px) { 
	body{overflow-y: hidden;}
	.satu{
		min-height: 1000px;
	}
	.ats{
		left: 0;
	}
	#andika{
		font-size: 15px
	}
	#siswa{
		font-size: 10px;
		margin-left: 25px;
	}
}
@media(min-width: 1200px) { 
	body{
		overflow-y: hidden;
	}
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
.sama3{
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
	margin-left: 50px;
	margin-top: 50px;
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
.kata3{
	margin-top: -35px;
	color: #069dc3;
	font-weight: bold;
}
.hom{
	background-color: white;
	margin-top: 20px;
	height: 50px;
	color: #069dc3;
	border-radius: 50px 0 0 50px;
}
.foto1,.foto2,.foto3{
    max-width: 304px;
    margin-left: -21px;
    margin-top: 0px;
}
.orang1{
    height: 50px;
    width: 50px;
    border-radius: 50%;
    margin-top: 20px;
}
.kataa1{
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
    background-color: #0f42b5;
    color: white;
    border: 0px;
    margin-top: 40px;
   	margin-left: 50px;	
   	padding-bottom: 5px;
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
		<div class="satu col-sm-3">
			<div>
			<img src="download.png" class="profile" id="profile">
				<h5 class="text-center andika" id="andika">Andika Wiraputra</h5>
				<p class="text-center siswa" id="siswa">Siswa</p>
			</div>
			<div id="myDropdown" class="dropdown-content d-block">
				<ul>
   	 				<li><a href="homeSiswa.php" style="color:white"><img src="home-1 copy.png" class="sama1" id="hom1"><li class="kata1">Home</li></a></li>
   	 				<li><a href="kelasSiswa.php" style="color:white"><img src="kelas copy.png" class="sama" id="hom2"><li class="kata2">Kelas Saya</li></a></li>
   	 				<li class="hom" id="hom"><img src="gurubiru.png" class="sama3"id="hom4"><li class="kata3">Guru Saya</li></li>
   	 				<li><a href="pemberitahuanSiswa.php" style="color:white"><img src="notif.png" class="sama" id="hom3"><li class="kata4">Pemberitahuan</li></a></li>
   	 			</ul>
  			</div>
			</i>
		</div>
		
		<div class="col-sm-9">
			<div>
				<h3 class="guru font-weight-light">Guru saya</h3>
			</div>
			<div class="row ats">
				<div class="gambar1 col-md-3">
				<div>
					<img src="ps.png" class="foto1">
				</div>
				<div class="kataa1">Photoshop</div>
					<div class="row">
						<div class="col-sm-2">
							<img src="orang.jpg" class="orang1">
						</div>
						<div class="e col-sm-2" id="e">Theo <span class="b" id="bb">Pengajar</span>
						</div>
						<div class="col-sm-4">
							<input class="c" id="c" type="submit" name="pesan" value="pesan">
						</div>
					</div>
				</div>
				<div class="gambar2 col-md-3">
				<div>
					<img src="virtual.png" class="foto2">
				</div>
				<div class="kataa1">Virtual Box</div>
					<div class="row">
						<div class="col-sm-2">
							<img src="orang.jpg" class="orang1">
						</div>
					<div class="e col-sm-2" id="e">Hendrik <span class="b" id="b">Pengajar</span>
					</div>
					<div class="col-sm-4">
						<input class="c" id="c" type="submit" name="pesan" value="pesan">
					</div>
					</div>
				</div>
				<div class="gambar3 col-md-3">
				<div>
					<img src="au.png" class="foto3">
				</div>
				<div class="kataa1">Adobe Audition</div>
					<div class="row">
						<div class="col-sm-2">
							<img src="orang.jpg" class="orang1">
						</div>
						<div class="e col-sm-2"id="e">Vincent <span class="b" id="b">Pengajar</span></div>
						<div class="col-sm-4">
							<input class="c" id="c" type="submit" name="pesan" value="pesan">
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
</body>
</html>