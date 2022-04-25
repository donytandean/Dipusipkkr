<?php 
require 'functions.php';

if(isset($_POST["register_user"]) ) {
	
	if ( registrasi_user($_POST) > 0 ) {
        echo "<script>
        alert('User baru berhasil terdaftar!');
        </script>";
        echo "<script>
        location = 'user.php';
        </script>";
    } else {
        echo mysqli_error($db);
    }
}

?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<!-- My Fonts -->
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Viga&display=swap" rel="stylesheet">

    <!-- My CSS -->
    <link rel="stylesheet" href="styleutama.css">

    <title>DIPUSIPKKR</title>
  </head>
  <body>
<!-- Navbar -->
	<nav class="navbar navbar-expand-lg navbar-light">
		<div class="container">
			<a class="navbar-brand" href="#" >DIPUSIPKKR</a>
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>
			<div class="collapse navbar-collapse" id="navbarNavAltMarkup">
			<div class="navbar-nav ml-auto">
					<a class="nav-item nav-link active" href="index.php">Home <span class="sr-only">(current)</span></a>
					<a class="nav-item nav-link" href="profile.php">Profile</a>
					<a class="nav-item nav-link" href="perpustakaan.php">Perpustakaan</a>
					<a class="nav-item nav-link" href="kearsipan.php">Kearsipan</a>
					<a class="nav-item nav-link" href="gallery.php">Gallery</a>
					<a class="nav-item nav-link" href="kontak.php">Kontak</a>
					<a class="nav-item btn btn-primary tombol" href="login.php">LOGIN</a>
				</div>
			</div>
		</div>
	</nav>
<!-- Akhir Navbar -->

<!--Jumbotron -->
	<div class="jumbotron jumbotron-fluid">
		<div class="container col-md-4 mt-3 pt-2">
            <form action="" method="post">
                <input class="form-control" type="text" name="username" id="username" placeholder="Username" autofocus>
                <br>
                <input class="form-control" type="password" name="password" id="password" placeholder="Password">
                <br>
                <input class="form-control" type="password" name="password2" id="password2" placeholder="Konfirmasi Password">
                <br>
                <input class="form-control" type="text" name="nama_user" id="nama_user" placeholder="Nama Lengkap">
                <br>
                <input class="form-control" type="text" name="alamat" id="alamat" placeholder="Alamat">
                <br>
                <button type="submit" name="register_user" class="btn btn-primary text-light tombol">Daftar</button>
        
            </form>
		</div>
	</div>
<!--Akhir Jumbotron -->

<!-- Container -->
<div class="container">
	<!-- info pnael -->
	<div class="row justify-content-center">
		<div class="col-10 info-panel">
			<div class="row">
				<div class="col-lg">
					<img src="img/employee.png" alt="employee" class="float-left">
					<h4>24 Hours</h4>
					<p>Lorem ipsum dolor sit amet consectetur</p>
				</div>
				<div class="col-lg">
					<img src="img/hires.png" alt="hires" class="float-left">
					<h4>High-Res</h4>
					<p>Lorem ipsum dolor sit amet consectetur</p>
				</div>
				<div class="col-lg">
					<img src="img/security.png" alt="security" class="float-left">
					<h4>Security</h4>
					<p>Lorem ipsum dolor sit amet consectetur</p>
				</div>
			</div>
		</div>
	</div>
	<!-- Akhir info panel -->

	<!-- Workingspace -->
	<div class="row workingspace">
		<div class="col-lg-6">
			<img src="img/workingspace.png" alt="workingspace" class="img-fluid">
		</div>
		<div class="col-lg-6">
			<h3>Books are a <span>source</span> of <span>knowledge</span></h3>
			<p>Membaca dengan hati dan pikiran yang tenang 
				serta mempelajari hal baru setiap harinya.</p>
				<a href="" class="btn btn-primary tombol">Gallery</a>
		</div>
	</div>
	<!-- Akhir Workingspace -->

</div>
<!-- Akhir container -->



    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </body>
</html>