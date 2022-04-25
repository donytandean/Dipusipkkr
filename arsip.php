<?php 


require 'functions.php';

$arsip = query("SELECT * FROM arsip ORDER BY id DESC");


?>
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <!-- My Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Viga&display=swap" rel="stylesheet">

    <!-- My CSS -->
    <!-- <link rel="stylesheet" href="styleutama.css"> -->
    <style>
    /* Navbar */

    .navbar {
        position: relative;
        z-index: 1;
    }

    .navbar-brand {
        font-family: viga;
        font-size: 32px;
    }

    /* Jumbotron */
    .jumbotron {
        background-image: url(img/jumb1.jpg);
        background-size: cover;
        height: 540px;
        text-align: center;
        position: relative;
    }

    .jumbotron .container {
        z-index: 1;
        position: relative;
    }

    .jumbotron::after {
        content: '';
        display: block;
        width: 100%;
        height: 110%;
        background-image: linear-gradient(to top, rgba(0, 0, 0, 1), rgba(0, 0, 0, 0));
        position: absolute;
        bottom: 0;
    }

    .jumbotron .display-4 {
        color: white;
        margin-top: 150px;
        font-weight: 600;
        text-shadow: 1px 1px 1px rgb(0, 0, 0, 0.7);
        font-size: 25px;
        margin-bottom: 30px;
    }

    /* infopanel */
    .info-panel {
        box-shadow: 0 3px 20px rgba(0, 0, 0, 0.5);
        border-radius: 12px;
        margin-top: -100px;
        background-color: white;
        padding: 30px;
    }

    .info-panel img {
        width: 80px;
        height: 80px;
        margin-right: 20px;
        margin-bottom: 20px;
    }

    .info-panel h4 {
        font-size: 16px;
        text-transform: uppercase;
        font-weight: bold;
        margin-top: 5px;
    }

    .info-panel p {
        font-size: 14px;
        color: #ACACAC;
        margin-top: -5px;
        font-weight: 200;
    }

    /* Workingspace */
    .workingspace {
        margin-top: 120px;
        text-align: center;
    }

    .workingspace h3 {
        font-size: 52px;
        font-weight: 200;
        text-transform: uppercase;
        margin-top: 30px;
    }

    .workingspace h3 span {
        font-weight: 500;
    }

    .workingspace p {
        font-size: 18px;
        color: #ACACAC;
        font-weight: 200;
        margin: 40px 0;
    }


    /* Testimonial */
    .testimonial {
        margin-top: 100px;
    }

    .testimonial h5 {
        text-align: center;
        font-weight: 200;
        font-style: italic;
        font-size: 24px;
    }

    .testimonial figure img {
        width: 70px;
        height: 70px;
        margin-top: 20px;
    }

    .testimonial figure h5 {
        font-size: 16px;
        font-weight: bold;
        font-style: normal;
        color: #1C2C5D;
    }

    .testimonial figure p {
        font-size: 12px;
        color: #ACACAC;
        margin-top: -5px !important;
    }

    .testimonial figcaption {
        text-align: center;
    }

    /* footer */
    .footer {
        margin-top: 100px;
    }

    .footer p {
        color: #acacac;
        font-size: 18px;
    }

    /* utility */
    .tombol {
        text-transform: uppercase;
        border-radius: 40px;
    }

    /* DESKTOP Version */
    @media (min-width: 992px) {

        .navbar-brand,
        .nav-link {
            color: white !important;
            text-shadow: 1px 1px 1px rgb(0, 0, 0, 0.7);
        }

        .nav-link {
            text-transform: uppercase;
            margin-right: 20px;
        }

        .nav-link:hover::after {
            content: '';
            display: block;
            border-bottom: 3px solid #0B63DC;
            width: 50%;
            margin: auto;
            padding-bottom: 5px;
            margin-bottom: -8px;
        }

        .jumbotron {
            margin-top: -75px;
            height: 640px;
        }

        .jumbotron .display-4 {
            font-size: 42px;
        }

        .workingspace {
            text-align: left;
        }

        .testimonial h5 {
            font-size: 32px;
        }

    }

    </style>

    <title>ARSIP DISARPUSKKR</title>
</head>

<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light">
        <div class="container">
            <a class="navbar-brand" href="#">DISARPUSKKR</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup"
                aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav ml-auto">
                    <a class="nav-item nav-link active" href="index.php">Home <span class="sr-only">(current)</span></a>
                    <a class="nav-item nav-link" href="profile.php">Profile</a>
                    <a class="nav-item nav-link" href="perpustakaan.php">Perpustakaan</a>


                    <div class="dropdown show">
                        <a class="nav-item nav-link" href="kearsipan.php" role="button" id="dropdownMenuLink"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Kearsipan
                        </a>

                        <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                            <a class="dropdown-item" href="layanan.php">Layanan</a>

                            <a class="dropdown-item" href="publikasi.php">Publikasi</a>

                        </div>
                    </div>


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
        <div class="container">
            <h1 class="display-4">Selamat Datang Di Website Dinas Kearsipan dan Perpustakaan Kabupaten Kubu Raya</h1>
        </div>
    </div>
    <!--Akhir Jumbotron -->

    <!-- Navbar -->

    <nav class="navbar navbar-light bg-light justify-content-between">
        <a class="navbar-brand">KEARSIPAN DISARPUSKKR</a>
        <form class="form-inline">
            <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
        </form>
    </nav>


    <!-- Akhir Navbar -->

    <!-- <ul class="list-group">
  <li class="list-group-item">Undang-Undang No. 4 Tahun 1990</li>
  <li class="list-group-item">Dapibus ac facilisis in</li>
  <li class="list-group-item">Morbi leo risus</li>
  <li class="list-group-item">Porta ac consectetur ac</li>
  <li class="list-group-item">Vestibulum at eros</li>
</ul> -->


    <div class="table-responsive">
        <table class="table">
            <thead>
                <tr align=center>
                    <th scope="col">No.</th>
                    <th scope="col">SKPD</th>
                    <th scope="col">Nomor BOKS</th>
                    <th scope="col">Nomor ARSIP</th>
                    <th scope="col">Nomor KLASIFIKASI</th>
                    <th scope="col">URAIAN INFORMASI ARSIP</th>
                    <th scope="col">KURUN WAKTU</th>
                    <th scope="col">JUMLAH/VOLUME</th>
                    <th scope="col">TINGKAT PERKEMBANGAN</th>
                    <th scope="col">LETAK</th>

                </tr>
            </thead>
            <tbody>
                <?php $i = 1; ?>
                <?php foreach ($arsip as $a) :?>
                <tr>
                    <th scope="row"><?= $i; ?></th>
                    <td><?= $a["skpd"]; ?></td>
                    <td><?= $a["nomor_boks"]; ?></td>
                    <td><?= $a["nomor_arsip"]; ?></td>
                    <td><?= $a["kode_klarifikasi"]; ?></td>
                    <td><?= $a["uraian"]; ?></td>
                    <td><?= $a["kurun_waktu"]; ?></td>
                    <td><?= $a["jumlah"]; ?></td>
                    <td><?= $a["tingkat_perkembangan"]; ?></td>
                    <td><?= $a["letak"]; ?></td>
                </tr>
                <?php $i++; ?>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>


    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
    </script>


</body>

</html>