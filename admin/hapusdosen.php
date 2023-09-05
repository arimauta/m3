<?php
include '../config.php';

// mengaktifkan session
session_start();

// cek apakah user telah login, jika belum login maka di alihkan ke halaman login
if ($_SESSION['status'] != "login") {
    header("location:../index.php");
}
$nip = $_GET["nip"];
$data = mysqli_query($koneksi, "DELETE FROM dosen WHERE Nip_Dosen = '$nip'");

if ($data) {
    echo "<script>alert('Yeeey Berhasil');window.location='dosen.php'</script>";
} else {
    echo "<script>alert('Yaahhh Gagal');window.location='dosen.php'</script>";
}

?>