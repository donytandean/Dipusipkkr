<?php 

require "functions.php";

if(isset($_POST["submit"])){

  if ( tambahUu($_POST) > 0 ) {
      echo "
          <script>
              alert('data berhasil ditambahkan!');
              document.location.href = 'adminLayanan.php';
          </script>
      ";
  } else {
      echo "
      <script>
              alert('data gagal ditambahkan!');
              document.location.href = 'adminLayanan.php';
          </script>
      ";
  }
  
}

?>