<?php 
session_start();
require 'functions.php';

if( !isset($_SESSION["login"]) ) {
    header("Location: login.php");
    exit;
}

$layanan = query("SELECT * FROM layanan");







?>
<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous" />
    <!-- My Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Viga&display=swap" rel="stylesheet" />
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

    /* table */
    table {
        font-family: arial, sans-serif;
        border-collapse: collapse;
        width: 100%;
        background-color: aliceblue;
    }

    td,
    th {
        /* border: 1px solid #dddddd; */
        text-align: left;
        padding: 8px;
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
        color: #1c2c5d;
    }

    .testimonial figure p {
        font-size: 12px;
        color: #acacac;
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

    .padding {
        float: right;
    }
    </style>

    <title>ADMIN DISARPUSKKR</title>
</head>

<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light">
        <div class="container">
            <a class="navbar-brand" href="#">ADMIN DISARPUSKKR</a>
        </div>
    </nav>
    <!-- akhir navbar -->
    <!-- tambah data -->
    <div class="container">
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#tambahModal">
            Tambah Data
        </button>
        <br></br>
        <div class="modal fade" id="tambahModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="container">
                            <form action="tambahUu.php" method="post" enctype="multipart/form-data">
                                <div class="form-group">
                                    <label for="title">Title</label>
                                    <input type="text" name="title" class="form-control" id="exampleInputtitle"
                                        placeholder="Masukkan Title" />
                                </div>
                                <div class="form-group">
                                    <label for="deskripsi">Deskripsi</label>
                                    <input type="text" name="deskripsi" class="form-control" id="exampleInputdeskripsi"
                                        placeholder="Masukkan Deskripsi" />
                                </div>
                                <div class="form-group">
                                    <label for="file">File Perundang-Undangan</label>
                                    <input type="file" name="uu" class="form-control-file"
                                        id="exampleFormControlFile1" />
                                </div>

                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">
                            Close
                        </button>
                        <button type="submit" name="submit" class="btn btn-primary">Save</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>

        <!-- table -->
        <table>
            <tr>
                <th>no</th>
                <th class="text-center">Title</th>
                <th class="text-right">Action</th>
            </tr>
            <?php $i = 1; ?>
            <?php foreach ($layanan as $l) :?>
            <tr>
                <td><?= $i; ?></td>
                <td class="text-center">
                    <?= $l["title"]; ?>
                </td>
                <td class="text-right"><a href="hapusUu.php?id=<?php echo $l["id"]; ?>"><img src="img/dt.png"
                            alt="delete" /></a></td>

            </tr>
            <?php $i++; ?>
            <?php endforeach; ?>
            <!-- <tr>
                <td>Lorem ipsum dolor sit amet consectetur, adipisicing elit.</td>
                <td><img src="img/dt.png" alt="delete" /></td>
            </tr>
            <tr>
                <td>Lorem ipsum dolor sit amet consectetur, adipisicing elit.</td>
                <td><img src="img/dt.png" alt="delete" /></td>
            </tr> -->
        </table>
        <!-- akhir table -->
    </div>
    <!-- footer -->
    <section class="testimonial">
        <div class="row justify-content-center">
            <div class="col-lg-6 justify-content-center d-flex">
                <figure class="figure">
                    <img src="img/jumb5.jpg" class="figure-img img-fluid rounded-circle" alt="testi 1" />
                    <figcaption class="figure-caption">
                        <h5>DISARPUS</h5>
                        <p>Disarpuskkr</p>
                    </figcaption>
                </figure>
            </div>
        </div>
    </section>

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