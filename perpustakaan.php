<?php 
session_start();
require 'functions.php';

if( !isset($_SESSION["login"]) ) {
    header("Location: login.php");
    exit;
}
$buku = query("SELECT * FROM buku");

// tombol cari ditekan
if( isset($_POST["cari"]) ) {
    $buku = cari($_POST["keyword"]);
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
			<a class="navbar-brand" href="admin.php" >DIPUSIPKKR</a>
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

    <!-- konten -->
    <div class="container konten">
    <h1 class="text-center mt-5 pt-2">DATA BUKU</h1>
    <a href="tambah.php" class="btn btn-primary tombol text-light">Tambah Data Buku</a> <a href="upload.php" class="btn btn-info tombol text-light">Upload Data Buku</a>
    <br><br>
    <form action="" method="post">
    <input type="text" name="keyword" size="40" autofocus placeholder="Masukkan keyword pencarian..." autocomplete="off">
    <button class="btn btn-info tombol" type="submit" name="cari">Cari</button>
    </form>
    <br>
        <div id="container" class="">
        <table class="table table-bordered table-hover table-light" border="1" cellpadding="10" cellspacing="0">
            <thead class="table-dark">
            <tr class="text-center info">
                <th width="2%">No.</th>
                <th>Judul</th>
                <th>Jumlah</th>
                <th>Edisi</th>
                <th>Isbn</th>
                <th>Penerbit</th>
                <th>Tahun Terbit</th>
				<th>Judul Seri</th>
				<th>Nomor Panggil</th>
				<th>Tempat Terbit</th>
				<th>Klasifikasi</th>
				<th>Pernyataan (Pengarang)</th>
				<th>Tindakan</th>
            </tr>
            </thead>
			<?php $i = 1; ?>
			<?php foreach($buku as $row) : ?>
			<tr class="text-center">
				<td><?= $i; ?></td>
				<td><?= $row["judul"]; ?></td>
				<td><?= $row["jumlah"]; ?></td>
				<td><?= $row["edisi"]; ?></td>
				<td><?= $row["isbn"]; ?></td>
				<td><?= $row["penerbit"]; ?></td>
				<td><?= $row["tahun_terbit"]; ?></td>
				<td><?= $row["judul_seri"]; ?></td>
				<td><?= $row["no_panggilan"]; ?></td>
				<td><?= $row["tempat_terbit"]; ?></td>
				<td><?= $row["klasifikasi"]; ?></td>
				<td><?= $row["pengarang"]; ?></td>
				<td>
					<a href="ubah.php?id=<?= $row["id"]; ?>" class="btn btn-info tombol text-light">Ubah</a>
					<a href="hapus.php?id=<?= $row["id"]; ?>" onclick="return confirm('Yakin ingin menghapus data ?');" class="btn btn-danger">Hapus</a>
				</td>
			</tr>
			<?php $i++; ?>
			<?php endforeach; ?>
        </table>
        </div>
    </div>
    <!-- akhir konten -->


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