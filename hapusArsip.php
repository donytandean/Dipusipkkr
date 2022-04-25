<?php
require 'functions.php';

$id = $_GET["id"];

    if ( hapusArsip($id) > 0 ) {
        echo "
        <script>
            alert('data berhasil dihapus!');
            document.location.href = 'adminArsip.php';
        </script>
        ";
    } else {
        echo "
            <script>
                alert('data gagal didihapus');
                document.location.href = 'adminArsip.php';
            </script>
        ";
    }


?>