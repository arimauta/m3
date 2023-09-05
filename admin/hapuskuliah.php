<?php
include '../config.php';

// mengaktifkan session
session_start();

// cek apakah user telah login, jika belum login maka di alihkan ke halaman login
if ($_SESSION['status'] != "login") {
    header("location:../index.php");
}
$ruang = $_GET["ruang"];
$data = mysqli_query($koneksi, "DELETE FROM kuliah WHERE Ruang_kuliah = '$ruang'");

if ($data) {
    echo "<script>alert('Yeeey Berhasil');window.location='kuliah.php'</script>";
} else {
    echo "<script>alert('Yaahhh Gagal');window.location='kuliah.php'</script>";
}

?>