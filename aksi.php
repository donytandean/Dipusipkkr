<?php 
require 'vendor/autoload.php';
require 'functions.php';
if( isset($_POST['submit']) ) {
    $err    = "";
    $ekstensi = "";
    $success = "";

    $file_name = $_FILES['filexls']['name'];
    $file_data = $_FILES['filexls']['tmp_name'];

    if(empty($file_name)) {
        $err .= "<li>Silakan masukkan file yanag anda inginkan!</li>";
    } else {
        $ekstensi = pathinfo($file_name)['extension'];
    }

    $ekstensi_allowed = array("xls","xlsx");
    if(!in_array($ekstensi, $ekstensi_allowed)) {
        $err .= "<li>Silakan masukkan file tipe xls atau xlsx. File yanag anda masukkan <b>$file_name</b> punya tipe <b>$ekstensi</b></li>";
    }

    if(empty($err)) {
        $reader = \PhpOffice\PhpSpreadsheet\IOFactory::createReaderForFile($file_data);
        $spreadsheet = $reader->load($file_data);
        $sheetData = $spreadsheet->getActiveSheet()->toArray();

        $jumlahData = 0;
        for($i=1;$i<count($sheetData); $i++) {
            $judul = $sheetData[$i]['0'];
            $jumlah = $sheetData[$i]['1'];
            $edisi = $sheetData[$i]['2'];
            $isbn = $sheetData[$i]['3'];
            $penerbit = $sheetData[$i]['4'];
            $tahun_terbit = $sheetData[$i]['5'];
            $jumlah_hal = $sheetData[$i]['6'];
            $panjang_lebar = $sheetData[$i]['7'];
            $judul_seri = $sheetData[$i]['8'];
            $no_panggilan = $sheetData[$i]['9'];
            $tempat_terbit = $sheetData[$i]['10'];
            $klasifikasi = $sheetData[$i]['11'];
            $pengarang = $sheetData[$i]['12'];

            // echo "$judul - $jumlah - $edisi - $isbn - $penerbit - $tahun_terbit - $jumlah_hal - $panjang_lebar - $judul_seri - $no_panggilan - $tempat_terbit - $klasifikasi - $pengarang <br/>";

            $sql1 = "INSERT INTO buku
            (judul, jumlah, edisi, isbn, penerbit, tahun_terbit, jumlah_hal, panjang_lebar, judul_seri, no_panggilan, tempat_terbit, klasifikasi, pengarang) VALUES
            ('$judul','$jumlah', '$edisi','$isbn','$penerbit','$tahun_terbit','$jumlah_hal','$panjang_lebar','$judul_seri','$no_panggilan','$tempat_terbit','$klasifikasi','$pengarang')";

            mysqli_query($db,$sql1);

            $jumlahData++;

        }

        if($jumlahData > 0) {
            $success = "$jumlahData berhasil diupload, Terima kasih";
        }

    }

    if($err){
        ?>
        <div class="alert alert-danger">
            <ul><?= $err ?></ul>
        </div>
        <?php
    }

    if($success){
        ?>
        <div class="alert alert-primary">
            <ul><?= $success ?></ul>
        </div>
        <?php
    }


}




?>