<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <style type="text/css">
    	body{
    		background-repeat: no-repeat;
    		font-family: Roboto;
    	}
    	.navba{
    		background-color: #069dc3;
    		height: 95.31px;
    	}
    	.inputwith i{
    		position: absolute;
    		margin-left: 111px;
    		margin-top: 26px;
    	}
    	.kotak1{
    		margin-top: 20px;
    		margin-left:101px;
    		max-width: 1042.49px;
    		border-radius: 5px;
    		padding-left: 30px;
    	}
    	.filter{
    		max-height: 25px;
    		max-width: 50px;
    		margin-top:22px;
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
    		margin-left: 100px;
    	}
    	.gambar2{
    		margin-left: 125px;
    	}
    	.gambar3{
    		margin-left: 110px;
    	}
    	.foto1,.foto2,.foto3{
    		max-width: 304px;
    		margin-left: -21px;
    		margin-top: 0px;
    	}
    	.kata1{
    		color: #069dc3;
    		font-weight: bold
    	}
    	.orang1{
    		height: 50px;
    		width: 50px;
    		border-radius: 50%;
    		margin-top: 20px;
    	}
    	.a{
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
    	.page-link{
    		border: 2px solid #2ac8d0;
    		border-radius: 30px;
    		margin-top: 20px;
    	}
    	
    </style>
</head>
<body>
<div class="container-fluid">
	<div class="row">
		<div class="navba col-md-12">ini navbar</div>
	</div>
	<div class="row inputwith">
		<input type="text" name="search" class="kotak1 col-md-4" placeholder="Cari Guru">
		<i class="fa fa-search"></i>
		<img src="filter.png" class="filter col-md-8">
	</div>
	<div class="row">
		<div class="gambar1 col-md-4">
			<div><img src="ps.png" class="foto1"></div>
			<div class="kata1">Photoshop</div>
			<div class="row">
				<div class="col-sm-2"><img src="orang.jpg" class="orang1"></div>
				<div class="a col-sm-2">Andika <span class="b">Pengajar</span></div>
				<div class="col-sm-4"><input type="submit" class="c" name="pesan" value="pesan"></div>
			</div>
		</div>
		<div class="gambar2 col-md-4">
			<div><img src="virtual.png" class="foto2"></div>
			<div class="kata1">Virtual Box</div>
			<div class="row">
				<div class="col-sm-2"><img src="orang.jpg" class="orang1"></div>
				<div class="a col-sm-2">Ardy <span class="b">Pengajar</span></div>
				<div class="col-sm-4"><input class="c" type="submit" name="pesan" value="pesan"></div>
			</div>
		</div>
		<div class="gambar3 col-md-4">
			<div><img src="au.png" class="foto3"></div>
			<div class="kata1">Adobe Audition</div>
			<div class="row">
				<div class="col-sm-2"><img src="orang.jpg" class="orang1"></div>
				<div class="a col-sm-2">Vetrick <span class="b">Pengajar</span></div>
				<div class="col-sm-4"><input class="c" type="submit" name="pesan" value="pesan"></div>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="gambar1 col-md-4">
			<div><img src="ps.png" class="foto1"></div>
			<div class="kata1">Photoshop</div>
			<div class="row">
				<div class="col-sm-2"><img src="orang.jpg" class="orang1"></div>
				<div class="a col-sm-2">Theo <span class="b">Pengajar</span></div>
				<div class="col-sm-4"><input class="c" type="submit" name="pesan" value="pesan"></div>
			</div>
		</div>
		<div class="gambar2 col-md-4">
			<div><img src="virtual.png" class="foto2"></div>
			<div class="kata1">Virtual Box</div>
			<div class="row">
				<div class="col-sm-2"><img src="orang.jpg" class="orang1"></div>
				<div class="a col-sm-2">Hendrik <span class="b">Pengajar</span></div>
				<div class="col-sm-4"><input class="c" type="submit" name="pesan" value="pesan"></div>
			</div>
		</div>
		<div class="gambar3 col-md-4">
			<div><img src="au.png" class="foto3"></div>
			<div class="kata1">Adobe Audition</div>
			<div class="row">
				<div class="col-sm-2"><img src="orang.jpg" class="orang1"></div>
				<div class="a col-sm-2">Vincent <span class="b">Pengajar</span></div>
				<div class="col-sm-4"><input class="c" type="submit" name="pesan" value="pesan"></div>
			</div>
		</div>
	</div>

	<div class="row">
		<div class="col-md-12 ">
			<nav aria-label="Page navigation example ">
			  <ul class="pagination justify-content-center">
			    <li class="page-item"><a class="page-link" href="#">1</a></li>
			    <li class="page-item"><a class="page-link" href="#">2</a></li>
			    <li class="page-item"><a class="page-link" href="#">3</a></li>
			    <li class="page-item"><a class="page-link" href="#">4</a></li>
			  </ul>
			</nav>
		</div>
	</div>
</div>
<script src="js/bootstrap.min.js"></script>
</body>
</html>