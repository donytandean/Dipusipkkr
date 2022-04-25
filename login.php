<?php 
session_start();
require 'functions.php';

// cek cookie 
if( isset($_COOKIE['id']) && isset($_COOKIE['key']) ) {
	$id = $_COOKIE['id'];
	$key = $_COOKIE['key'];

	// ambil username berdasarkan id 
	$result = mysqli_query($db, "SELECT username FROM admin WHERE id = $id");
	$row = mysqli_fetch_assoc($result);

	// cek cookie dan username
	if( $key === hash('sha256', $row['username']) ) {
		$_SESSION['login'] = true;
	}
}

if( isset($_SESSION["login"]) ) {
	header("Location: admin.php");
	exit;
}


if( isset($_POST["login"]) ) {

	$username = $_POST["username"];
	$password = $_POST["password"];

	$result = mysqli_query($db, "SELECT * FROM admin WHERE username = '$username'");

	// cek username
	if( mysqli_num_rows($result) === 1 ) {

		// cek password
		$row = mysqli_fetch_assoc($result);
		if(password_verify($password, $row["password"]) ) {
			// set session
			$_SESSION["login"] = true;

			// cek remember me
			if( isset($_POST['remember']) ) {
				// buat cookie
				setcookie('id', $row['id'], time() + 1814400);
				setcookie('key', hash('sha256', $row['username']), time() + 1814400); 
			}

			header("Location: admin.php");
			exit;
		}
	}

	$error = true;

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

    <title>Dinas Perpustakaan dan Kearsipan Kabupaten Kubu Raya</title>
  </head>
  <body>
<!-- Navbar -->
	<nav class="navbar navbar-expand-lg navbar-light">
		<div class="container">
			<img src="img/kb.png" class="image" border="0" width="43px" style="margin: 1px;padding: 0px">
			<a class="navbar-brand" href="#" >DIPUSIPKKR</a>
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>
			<div class="collapse navbar-collapse" id="navbarNavAltMarkup">
			<div class="navbar-nav ml-auto">
					<a class="nav-item nav-link active" href="index.php">Home <span class="sr-only">(current)</span></a>
					<a class="nav-item nav-link" href="usprofile.php">Profile</a>
					<a class="nav-item nav-link" href="usperpustakaan.php">Perpustakaan</a>
					<a class="nav-item nav-link" href="uskearsipan.php">Kearsipan</a>
					<a class="nav-item nav-link" href="usgallery.php">Gallery</a>
					<a class="nav-item nav-link" href="uskontak.php">Kontak</a>
					<a class="nav-item btn btn-primary tombol" href="index.php">KEMBALI</a>
				</div>
			</div>
		</div>
	</nav>
<!-- Akhir Navbar -->

<!--Jumbotron -->
<div class="jumbotron jumbotron-fluid">
		<div class="container col-md-4 mt-3 pt-5">
        <?php if( isset($error) ) : ?>
        <p style="color: red; font-style: italic; "> Username / Password anda salah!</p>
        <?php endif; ?>

        <ul>
            <form action="" method="post">
            <input class="form-control" type="text" name="username" id="username" placeholder="Username" autofocus>
            <br>
            <input class="form-control" type="password" name="password" id="password" placeholder="Password" autofocus>
            
            <input type="checkbox" name="remember" id="remember" class="mt-3">
            <label for="remember">Remember me</label>
            <br>

            <button type="submit" name="login" class="btn btn-primary tombol text-light">Login</button><br>
            </form>
        </ul>
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

	<!-- footer -->
	<footer class="footer text-center mt-5">
            <div class="container">
				<div class="row pt-3">
					<div class="col text-center">
					<p>&copy; Copyright | Built by.
					<a href="https://www.instagram.com/donytand_dt/" target="blank">Dony Tandean -</a> <a href="https://www.instagram.com/eggy_andryan17/" target="blank">Egy Andryan -</a>
					<a href="https://www.instagram.com/abangwendisyahbani/" target="blank">Abang Wendi Syahbani -</a>
					<a href="https://unmuhpnk.ac.id/beranda#gsc.tab=0" target="blank">UM Pontianak</a> 2022</p>
					</div>
				</div>
				<div class="row mb-4">
					<div class="col text-center">
					<a href="https://www.youtube.com/c/UMPontianak" class="btn btn-danger" target="blank">UM Pontianak Youtube</a>
					</div>
				</div>
            </div>
    </footer>
    <!-- akhir footer -->

</div>
<!-- Akhir container -->



    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </body>
</html>