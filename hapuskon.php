<?php 
session_start();
require 'functions.php';

if( !isset($_SESSION["login"]) ) {
    header("Location: login.php");
    exit;
}

$id = $_GET["id"];

if(hapuskont($id) > 0 ) {
    echo "
    <script>
    alert('Data Kontak berhasil dihapus');
    document.location.href = 'kontak.php';
    </script>
    ";
}else {
    echo "
    <script>
    alert('Data kontak gagal dihapus!');
    document.location.href = 'kontak.php';
    </script>
    ";
}
?>
