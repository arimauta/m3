<?php
include '../config.php';

// mengaktifkan session
session_start();

// cek apakah user telah login, jika belum login maka di alihkan ke halaman login
if ($_SESSION['status'] != "login") {
    header("location:../index.php");
}

// menampilkan pesan selamat datang
// echo "Hai, selamat datang ". $_SESSION['username'];

?>
<?php include("header.php");?>

    <div class="fs-2 fw-bolder p-xl-5 mt-3" style="margin-bottom:100px;">
        Welcome To Admin
    </div>

<?php include 'footer.php';?>
<!-- <br/>
<br/>
