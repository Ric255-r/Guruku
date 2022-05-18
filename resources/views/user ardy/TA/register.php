<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Halaman Registrasi</title>

    <link href="css/bootstrap.css" rel="stylesheet">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <style type="text/css">
    	body{
    		background-color: #2ac8d0;
    		background-repeat: no-repeat;
    		font-family: roboto;
    	}
    	.btn{
    		border: none;		
    		width: 420px;
    		margin-top: 15px;		
    		background-color: #069dc3;
    		padding: 13px;
    		border-radius: 30px;
    		color: white;
    		font-size: 23px;
    	}
    	.awan{
    		padding: 0px;
    	}
    	.footer{
    		background-color: grey

    	}
    	.kotak{
    		background-color: white;
    		max-width: 560px;
    		margin: auto;
    		height: 625px;
    		padding:20px;
    		margin-bottom: 30px;
    		border-radius: 15px;
    	}
    	.regiss{
    		width: 500px;
    		height: 510px;
    	}
    	.tulis{
    		font-family: DK Honeyguide Caps;
    		font-size: 55px;
    		color: #069dc3;
    	}
    	.tulis2{
    		color: #9e9e9e;
    		font-size: 17px;
    		margin-bottom: 15px;
    	}
    	.isi{
    		width: 450px;
    		border : none;
    		margin-top: 35px;
    		border-bottom: 1px solid #9e9e9e;
    		font-size: 23px;
    		border-radius: 0px;
    	}
    	.bawah{
    		margin-top: 30px;
    		color: #9e9e9e;
    		background-color: #eeebea;
    		border-radius: 0px 0px 15px 15px;
    		width: 560px;
    		margin-left: -20px;
    		height: 50px;
    		padding-top: 13px;

    	}

    	.a{
    		color: #069dc3;
    	}
    </style>
  </head>
  <body>
    <div class="container-fluid">
    	<div class="row">
    		<img src="awan.png" class="awan col-sm-12">
    	</div>
    	<div class="row">
            	<img src="regis.png" class="regiss col-sm-6">
          <div class="kotak col-sm-6">
            <div class="tulis text-center">REGISTER RIGHT NOW!</div>	
            	<div class=" tulis2 text-center">Don't miss it, let's improve your skill with us</div>	
                <div class="form-group">
                    <center><input type="text" class="isi form-control" name="username" placeholder="Username">
                </div>

                <div class="form-group">
                    <center><input type="text" class="isi form-control" name="email" placeholder="Email">
                </div>

                <div class="form-group">
                    <center><input type="password" class="isi form-control" name="password" placeholder="Password">
                </div>

                <div class="form-group">
                    <center><input type="text" class="isi form-control" name="yourname" placeholder="Confirm Password">
                </div>

                <center><input type="submit" class="btn col-sm-12" value="REGISTER">
               
            
            		<div class="bawah text-center">Remember your account? <span class="a">Login</span></div>
           </div>
        </div>
    </div>

    <script src="js/bootstrap.min.js"></script>
  </body>
</html>
