<?php 
session_start();
require 'functions.php';

if( !isset($_SESSION["login"]) ) {
    header("Location: login.php");
    exit;
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
    <link rel="stylesheet" href="styleprofile.css">

    <title>Dinas Perpustakaan dan Kearsipan Kabupaten Kubu Raya</title>
  </head>
  <body>
<!-- Navbar -->
	<nav class="navbar navbar-expand-lg navbar-light">
		<div class="container">
			<img src="img/kb.png" class="image" border="0" width="43px" style="margin: 1px;padding: 0px">
			<a class="navbar-brand" href="index.php">DIPUSIPKKR</a>
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>
			<div class="collapse navbar-collapse" id="navbarNavAltMarkup">
				<div class="navbar-nav ml-auto">
					<a class="nav-item nav-link active" href="admin.php">Home <span class="sr-only">(current)</span></a>
					<a class="nav-item nav-link" href="profile.php">Profile</a>
					<a class="nav-item nav-link" href="perpustakaan.php">Perpustakaan</a>
					<!-- <a class="nav-item nav-link" href="kearsipan.php">Kearsipan</a> -->

					<div class="dropdown show">
                        <a class="nav-item nav-link" href="kearsipan.php" role="button" id="dropdownMenuLink"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Kearsipan
                        </a>

                        <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                            <a class="dropdown-item" href="adminLayanan.php">Layanan</a>

                            <a class="dropdown-item" href="adminArsip.php">Arsip</a>

                        </div>
                    </div>

					<a class="nav-item nav-link" href="gallery.php">Gallery</a>
					<a class="nav-item nav-link" href="kontak.php">Kontak</a>
					<a class="nav-item btn btn-primary tombol" href="logout.php">KELUAR</a>
				</div>
			</div>
		</div>
	</nav>
<!-- Akhir Navbar -->

<!--Jumbotron -->
	<div class="jumbotron jumbotron-fluid">
		<div class="container">
			<h1 class="display-4">Selamat Datang Di Website Dinas Perpustakaan dan Kearsipan Kabupaten Kubu Raya</h1>
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
					<h4>
						Waktu Kunjungan : 
						08:00 - 15:00 WIB
						Senin - Jum'at
					</h4>
				</div>
				<div class="col-lg">
					<img src="img/hires.png" alt="hires" class="float-left">
					<h4>Gambar</h4>
					<p>Anda bisa melihat-lihat gambar yang ada pada gallery website kami</p>
				</div>
				<div class="col-lg">
					<img src="img/security.png" alt="security" class="float-left">
					<h4>Pesan dan Keamanan</h4>
					<p>Silahkan hubungi kami melalui kontak yang ada</p>
				</div>
			</div>
		</div>
	</div>
	<!-- Akhir info panel -->

    <!-- Profile -->
    <div class="row workingspace">
		<div class="col-lg-6">
			<img src="img/kb.png" alt="workingspace" class="img-fluid">
            <p>
            Arang Limbung, Kec. Sungai Raya, Kabupaten Kubu Raya, Kalimantan Barat
            Kab. Kubu Raya, Kalimantan Barat
            ID 78391
            </p>
		</div>
		<div class="col-lg-6">
			<h3><span>Sejarah Singkat</span></h3>
			<p>
            Pada Awalnya Kantor Kearsipan dan Perpustakaan Daerah Kabupaten Kubu Raya bernama Kantor Perpustakaan, Arsip, dan Dokumentasi Kabupaten Kubu Raya sesuai dengan Peraturan Bupati Kubu Raya Nomor 1 Tahun 2008 pada tanggal 24 Januari 2008, Pasal 87 tentang Pembentukan, Susunan Organisasi dan Tata Kerja Perangkat Daerah Kabupaten Kubu Raya pada masa Pj. Bupati Drs. Kamaruzzaman, MM. Dalam Struktur Organisasi Kantor Perpustakaan, Arsip, dan Dokumentasi Kabupaten Kubu Raya terdiri dari Kepala Kantor, Sub Bagian Tata Usaha, Seksi Perpustakaan, Seksi Arsip dan Dokumentasi dan Kelompok Jabatan Fungsional.

            Kemudian Peraturan Bupati Kubu Raya Nomor 47 Tahun 2008, Pasal 102 tentang Perubahan atas Peraturan Bupati Kubu Raya Nomor 1 Tahun 2008 pada tanggal 27 Oktober 2008 masih dipegang oleh Pj. Bupati Kubu Raya Drs. Kamaruzzaman. MM, tentang pembentukan, susunan, organisasi, dan tata kerja perangkat daerah Kabupaten Kubu Raya dalam struktur organisasi teridiri dari Kepala Kantor, Subbag Tata Usaha, Seksi Pengelolaan dan Penataan Arsip, Seksi Penilaiaan dan Pelestarian Arsip, Seksi Akuisisi dan Pelayanan Perpustakaan, dan Kelompok Jabatan Fungsional. Setelah Jabatan definitif Bupati Kubu Raya dijabat oleh Muda Mahendrawan, SH maka dilakukan perombakan SKPD di lingkungan Kabupaten Kubu Raya, maka dibentuklah Peraturan Daerah Kabupaten Kubu Raya Nomor 14 Tahun 2009 tanggal 12 November 2009 tentang Stuktur Organisasi Perangkat Daerah Kabupaten Kubu Raya pada Pasal 126 di bentuk Lembaga Teknis Daerah yaitu salah satunya Kantor Kearsipan dan Perpustakaan Daerah Kabupaten Kubu Raya. Implementasi Peraturan BUpati Kubu Raya Nomor 91 Tahun 2009 pada tanggal 21 Desember 2009 tentang Struktur, Tugas Pokok, Fungsi, dan Tata Kerja Kantor Kearsipan dan Perpustakaan Daerah Kabupaten Kubu Raya.
            </p>
		</div>
	</div>
    <!-- Akhir Profile -->



	<!-- Testimonial -->
	<section class="testimonial">
		<div class="row justify-content-center">
			<div class="col-lg-8">
				<h5>"Membaca dengan hati dan pikiran yang tenang 
				serta mempelajari hal baru setiap harinya."</h5>
			</div>
		</div>

		<div class="row justify-content-center">
			<div class="col-lg-6 justify-content-center d-flex">
				<figure class="figure">
					<img src="img/jumb5.jpg" class="figure-img img-fluid rounded-circle" alt="testi 1">
					<figcaption class="figure-caption">
						<h5>DIPUSIP</h5>
						<p>Dipusipkkr</p>
					</figcaption>
				</figure>
			</div>
		</div>
	</section>
	<!-- Akhir Testimonial -->

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