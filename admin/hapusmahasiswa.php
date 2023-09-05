<?php
include '../config.php';

// mengaktifkan session
session_start();

// cek apakah user telah login, jika belum login maka di alihkan ke halaman login
if ($_SESSION['status'] != "login") {
    header("location:../index.php");
}
$nim = $_GET["nim"];
$data = mysqli_query($koneksi, "DELETE FROM mahasiswa WHERE NIM = '$nim'");

if ($data) {
    echo "<script>alert('Yeeey Berhasil');window.location='dosen.php'</script>";
} else {
    echo "<script>alert('Yaahhh Gagal');window.location='dosen.php'</script>";
}

?>