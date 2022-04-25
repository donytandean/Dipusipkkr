<?php 
// koneksi ke database
$db = mysqli_connect("localhost", "root", "","disarpuskkr");
 

function query($query) {
    global $db;
    $result = mysqli_query($db, $query);
    $rows = [];
    while( $row = mysqli_fetch_assoc($result) ) {
        $rows[] = $row;
    }
    return $rows;
}

// admin
function tambah($data) {
    global $db;
    // ambil data dari tiap element dalam form
    $judul = htmlspecialchars($data["judul"]);
    $jumlah = htmlspecialchars($data["jumlah"]);
    $edisi = htmlspecialchars($data["edisi"]);
    $isbn = htmlspecialchars($data["isbn"]);
    $penerbit = htmlspecialchars($data["penerbit"]);
    $tahun_terbit = htmlspecialchars($data["tahun_terbit"]);
    $jumlah_hal = htmlspecialchars($data["jumlah_hal"]);
    $panjang_lebar = htmlspecialchars($data["panjang_lebar"]);
    $judul_seri = htmlspecialchars($data["judul_seri"]);
    $no_panggilan = htmlspecialchars($data["no_panggilan"]);
    $tempat_terbit = htmlspecialchars($data["tempat_terbit"]);
    $klasifikasi = htmlspecialchars($data["klasifikasi"]);
    $pengarang = htmlspecialchars($data["pengarang"]);
    
    // query insert data
    $query = "INSERT INTO buku VALUES 
    ('','$judul','$jumlah', '$edisi','$isbn','$penerbit','$tahun_terbit','$jumlah_hal','$panjang_lebar','$judul_seri','$no_panggilan','$tempat_terbit','$klasifikasi','$pengarang')";
    mysqli_query($db, $query);

    return mysqli_affected_rows($db);
}

function hapus($id) {
    global $db;
    mysqli_query($db, "DELETE FROM buku WHERE id = $id");

    return mysqli_affected_rows($db);
}


// function boked($data) {
//     global $db;

//     $id = $data["id"];
//     $judul = htmlspecialchars($data["judul"]);
//     $jumlah = htmlspecialchars($data["jumlah"]);
//     $edisi = htmlspecialchars($data["edisi"]);
//     $isbn = htmlspecialchars($data["isbn"]);
//     $penerbit = htmlspecialchars($data["penerbit"]);
//     $tahun_terbit = htmlspecialchars($data["tahun_terbit"]);
//     $jumlah_hal = htmlspecialchars($data["jumlah_hal"]);
//     $panjang_lebar = htmlspecialchars($data["panjang_lebar"]);
//     $judul_seri = htmlspecialchars($data["judul_seri"]);
//     $no_panggilan = htmlspecialchars($data["no_panggilan"]);
//     $tempat_terbit = htmlspecialchars($data["tempat_terbit"]);
//     $klasifikasi = htmlspecialchars($data["klasifikasi"]);
//     $pengarang = htmlspecialchars($data["pengarang"]);

//     $query = "UPDATE buku SET
//             judul = '$judul',
//             jumlah = '$jumlah',
//             edisi = '$edisi',
//             isbn = '$isbn',
//             penerbit = '$penerbit',
//             tahun_terbit = '$tahun_terbit',
//             jumlah_hal = '$jumlah_hal',
//             panjang_lebar = '$panjang_lebar',
//             judul_seri = '$judul_seri',
//             no_panggilan = '$no_panggilan',
//             tempat_terbit = '$tempat_terbit',
//             klasifikasi = '$klasifikasi',
//             pengarang = '$pengarang'
//         WHERE id = $id
//     ";

//     mysqli_query($db, $query);

//     return mysqli_affected_rows($db);
// }


function ubah($data) {
    global $db;

    $id = $data["id"];
    $judul = htmlspecialchars($data["judul"]);
    $jumlah = htmlspecialchars($data["jumlah"]);
    $edisi = htmlspecialchars($data["edisi"]);
    $isbn = htmlspecialchars($data["isbn"]);
    $penerbit = htmlspecialchars($data["penerbit"]);
    $tahun_terbit = htmlspecialchars($data["tahun_terbit"]);
    $jumlah_hal = htmlspecialchars($data["jumlah_hal"]);
    $panjang_lebar = htmlspecialchars($data["panjang_lebar"]);
    $judul_seri = htmlspecialchars($data["judul_seri"]);
    $no_panggilan = htmlspecialchars($data["no_panggilan"]);
    $tempat_terbit = htmlspecialchars($data["tempat_terbit"]);
    $klasifikasi = htmlspecialchars($data["klasifikasi"]);
    $pengarang = htmlspecialchars($data["pengarang"]);
    
    // query insert data
    $query = "UPDATE buku SET
                judul = '$judul',
                jumlah = '$jumlah',
                edisi = '$edisi',
                isbn = '$isbn',
                penerbit = '$penerbit',
                tahun_terbit = '$tahun_terbit',
                jumlah_hal = '$jumlah_hal',
                panjang_lebar = '$panjang_lebar',
                judul_seri = '$judul_seri',
                no_panggilan = '$no_panggilan',
                tempat_terbit = '$tempat_terbit',
                klasifikasi = '$klasifikasi',
                pengarang = '$pengarang'
            WHERE id = $id
                ";
    mysqli_query($db, $query);

    return mysqli_affected_rows($db);
}

function cari($keyword) {
    $query = " SELECT * FROM buku WHERE
    judul LIKE '%$keyword%' OR 
    jumlah LIKE '%$keyword%' OR
    edisi LIKE '%$keyword%' OR
    isbn LIKE '%$keyword%' OR
    penerbit LIKE '%$keyword%' OR
    tahun_terbit LIKE '%$keyword%' OR
    jumlah_hal LIKE '%$keyword%' OR
    panjang_lebar LIKE '%$keyword%' OR
    judul_seri LIKE '%$keyword%' OR
    no_panggilan LIKE '%$keyword%' OR
    tempat_terbit LIKE '%$keyword%' OR
    klasifikasi LIKE '%$keyword%' OR
    pengarang LIKE '%$keyword%'
    ";
    return query($query);
}

function registrasi_admin($data) {
    global $db;
    
    $username = strtolower(stripslashes($data["username"]));
    $password = mysqli_real_escape_string($db, $data["password"]);
    $password2 = mysqli_real_escape_string($db, $data["password2"]);
    $nama_admin = strtolower(stripslashes($data["nama_admin"]));
    $jabatan = strtolower(stripslashes($data["jabatan"]));


    // cek username sudah ada atau belum
    $result = mysqli_query($db, "SELECT username FROM admin WHERE username = '$username'");

    if(mysqli_fetch_assoc($result) ) {
        echo "<script>
        alert('username sudah terdaftar!')
        </script>";
        return false;
    }


    // cek konfirmasi password
    if($password !== $password2) {
        echo "<script>
        alert('konfirmasi password tidak sesuai!');
        </script>";

        return false;
    }

    // enkripsi password
    $password = password_hash($password, PASSWORD_DEFAULT);


    // tambahkan admin ke database
    mysqli_query($db, "INSERT INTO admin VALUES('', '$username', '$password', '$nama_admin', '$jabatan')");

    return mysqli_affected_rows($db);

}

// akhir admin



// gallery
function tambahgambar($data) {
    global $db;

    $namakeg = htmlspecialchars($data["namakeg"]);
    $capt = htmlspecialchars($data["capt"]);
    $tahunkeg = htmlspecialchars($data["tahunkeg"]);

    // Upload gambar
    $gambar = upload();
    if( !$gambar ) {
        return false;
    }

    $query = "INSERT INTO gallery 
                VALUES 
                ('', '$gambar', '$namakeg', '$capt', '$tahunkeg')
                 ";
    mysqli_query($db, $query);

    return mysqli_affected_rows($db);
}

function upload() {
    
    $namaFile = $_FILES['gambar']['name'];
    $ukuranFile = $_FILES['gambar']['size'];
    $error = $_FILES['gambar']['error'];
    $tmpName = $_FILES['gambar']['tmp_name'];

    // cek apakah tidak ada gambar yang diupload
    if( $error === 4 ) {
        echo "<script>
                alert('Pilih gambar terlebih dahulu!');
        </script>";
        return false;
    }

    // cek apakah yang diupload adalah gambar
    $ekstensiGambarValid = ['jpg', 'jpeg', 'png'];
    $ekstensiGambar = explode('.', $namaFile);
    $ekstensiGambar = strtolower(end($ekstensiGambar));
    if( !in_array($ekstensiGambar, $ekstensiGambarValid) ) {
        echo "<script>
                alert('Yang anda upload bukan gambar!');
            </script>";
        return false;
    }

    // jika ukurannya terlalu besar
    if( $ukuranFile > 1000000) {
        echo "<script>
                alert('ukuran file terlalu besar!');
            </script>";
return false;
    }

    // lolos pengecekan, gambar size diupload
    // generate nama baru 
    $namaFileBaru = uniqid();
    $namaFileBaru .= '.';
    $namaFileBaru .= $ekstensiGambar;

    move_uploaded_file($tmpName, 'gambar/' . $namaFileBaru);

    return $namaFileBaru;

}

function ubahgal($data) {
    global $db;

    $id = $data["id"];
    $namakeg = htmlspecialchars($data["namakeg"]);
    $capt = htmlspecialchars($data["capt"]);
    $tahunkeg = htmlspecialchars($data["tahunkeg"]);
    $gambarLama = htmlspecialchars($data["gambarLama"]);

    // cek apakah user pilih gambar baru atau tidak
    if( $_FILES['gambar']['error'] === 4 ) {
        $gambar = $gambarLama;
    } else {
        $gambar = upload();
    }

    $query = "UPDATE gallery SET
                gambar = '$gambar',
                namakeg = '$namakeg',
                capt = '$capt',
                tahunkeg = '$tahunkeg'
            WHERE id = $id
                 ";
    mysqli_query($db, $query);

    return mysqli_affected_rows($db);
}

function hapusgal($id) {
    global $db;
    mysqli_query($db, "DELETE FROM gallery WHERE id = $id");

    return mysqli_affected_rows($db);
}

// akhir gallery

// kontak
function tambahkontak($data) {
    global $db;
    // ambil data dari tiap element dalam form
    $no_hp = htmlspecialchars($data["no_hp"]);
    $email = htmlspecialchars($data["email"]);
    $ig = htmlspecialchars($data["ig"]);
    $fb = htmlspecialchars($data["fb"]);
    $tw = htmlspecialchars($data["tw"]);
    
    // query insert data
    $query = "INSERT INTO kontak VALUES 
    ('','$no_hp','$email', '$ig','$fb','$tw')";
    mysqli_query($db, $query);

    return mysqli_affected_rows($db);
}

function ubahkon($data) {
    global $db;

    $id = $data["id"];
    $no_hp = htmlspecialchars($data["no_hp"]);
    $email = htmlspecialchars($data["email"]);
    $ig = htmlspecialchars($data["ig"]);
    $fb = htmlspecialchars($data["fb"]);
    $tw = htmlspecialchars($data["tw"]);
    
    // query insert data
    $query = "UPDATE kontak SET
                no_hp = '$no_hp',
                email = '$email',
                ig = '$ig',
                fb = '$fb',
                tw = '$tw'
            WHERE id = $id
                ";
    mysqli_query($db, $query);

    return mysqli_affected_rows($db);
}

function hapuskont($id) {
    global $db;
    mysqli_query($db, "DELETE FROM kontak WHERE id = $id");

    return mysqli_affected_rows($db);
}

// akhir kontak

// profile
function tambahvisimisi($data) {
    global $db;
    // ambil data dari tiap element dalam form
    $visi = htmlspecialchars($data["visi"]);
    $misi = htmlspecialchars($data["misi"]);
    
    // query insert data
    $query = "INSERT INTO visimisi VALUES 
    ('','$visi','$misi')";
    mysqli_query($db, $query);

    return mysqli_affected_rows($db);
}

function ubahvismi($data) {
    global $db;

    $id = $data["id"];
    $visi = htmlspecialchars($data["visi"]);
    $misi = htmlspecialchars($data["misi"]);

    // query insert data
    $query = "UPDATE visimisi SET
                visi = '$visi',
                misi = '$misi',
            WHERE id = $id
                ";
    mysqli_query($db, $query);

    return mysqli_affected_rows($db);
}

// akhir profile

// user
function us_cari($keyword) {
    $query = " SELECT * FROM buku WHERE
    judul LIKE '%$keyword%' OR 
    jumlah LIKE '%$keyword%' OR
    edisi LIKE '%$keyword%' OR
    isbn LIKE '%$keyword%' OR
    penerbit LIKE '%$keyword%' OR
    tahun_terbit LIKE '%$keyword%' OR
    jumlah_hal LIKE '%$keyword%' OR
    panjang_lebar LIKE '%$keyword%' OR
    judul_seri LIKE '%$keyword%' OR
    no_panggilan LIKE '%$keyword%' OR
    tempat_terbit LIKE '%$keyword%' OR
    klasifikasi LIKE '%$keyword%' OR
    pengarang LIKE '%$keyword%'
    ";
    return query($query);
}



// Arsip
function tambahArsip($data)
{
    global $db;
  
    $skpd = htmlspecialchars ($data["skpd"]);
    $nomor_boks = htmlspecialchars ($data["nomor_boks"]);
    $nomor_arsip = htmlspecialchars ($data["nomor_arsip"]);
    $kode_klarifikasi = htmlspecialchars ($data["kode_klarifikasi"]);
    $uraian = htmlspecialchars ($data["uraian"]);
    $kurun_waktu = htmlspecialchars ($data["kurun_waktu"]);
    $jumlah = htmlspecialchars ($data["jumlah"]);
    $tingkat_perkembangan = htmlspecialchars ($data["tingkat_perkembangan"]);
    $letak = htmlspecialchars ($data["letak"]);


    // upload gambar

    $query = "INSERT INTO arsip VALUES ('','$skpd','$nomor_boks','$nomor_arsip','$kode_klarifikasi','$uraian','$kurun_waktu','$jumlah','$tingkat_perkembangan','$letak')";
    mysqli_query($db,$query);


    

    return mysqli_affected_rows($db);
}

function hapusArsip($id){
    global $db;
    mysqli_query($db, "DELETE FROM arsip WHERE id = $id");

    return mysqli_affected_rows($db);
}
// Arsip


// uu
function tambahUu($data) {

    global $db;
    // Ambill data dar tiap element Form

    // $title = htmlspecialchars ($data["title"]);
    $title = $data["title"];
    $deskripsi = htmlspecialchars ($data["deskripsi"]);


    // upload gambar
    $pdf = uploadPdf();
    if ( !$pdf ) {
        return false;
    }

    $query = "INSERT INTO layanan VALUES ('','$title','$deskripsi','$pdf')";
    mysqli_query($db,$query);


    

    return mysqli_affected_rows($db);
    
}

function uploadPdf(){
    

    $namaFile = $_FILES["uu"]["name"];
    $ukuranFile = $_FILES["uu"]["size"];
    $error = $_FILES["uu"]["error"];
    $tmpName = $_FILES["uu"]["tmp_name"];

    // cek upload
    if ( $error === 4 ) {
        echo "<script>
                alert('pilih file terlebihdahulu!')
            </script>";
            return false;
    }

    // cek upload gambar 
    $ekstensiPdfValid = ['pdf'];
    $ekstensiPdf = explode('.', $namaFile);
    $ekstensiPdf = strtolower (end($ekstensiPdf));
    if ( !in_array($ekstensiPdf, $ekstensiPdfValid) ) {
        echo "<script>
                alert('yang anda upload bukan file!')
            </script>";
        return false;
    }
    if ( $ukuranFile > 100000000 ) {
        echo "<script>
        alert('Ukuran file terlalu besar')
            </script>";
        return false;
    }


    $namaFileBaru = uniqid();
    $namaFileBaru .= '.';
    $namaFileBaru .= $ekstensiPdf;
    // var_dump($namaFileBaru); die;

    move_uploaded_file($tmpName, 'asset/' . $namaFileBaru);
    return $namaFileBaru;


}

function hapusUu($id){
    global $db;
    mysqli_query($db, "DELETE FROM layanan WHERE id = $id");

    return mysqli_affected_rows($db);
}

?>