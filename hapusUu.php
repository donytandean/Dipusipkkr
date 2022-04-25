<?php
require 'functions.php';

$id = $_GET["id"];

    if ( hapusUu($id) > 0 ) {
        echo "
        <script>
            alert('data berhasil dihapus!');
            document.location.href = 'adminLayanan.php';
        </script>
        ";
    } else {
        echo "
            <script>
                alert('data gagal didihapus');
                document.location.href = 'adminLayanan.php';
            </script>
        ";
    }


?>