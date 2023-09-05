<?php
$koneksi = mysqli_connect("localhost", "root", "", "tugas_pelatihan36_ariefmaulanathamrin");

if (mysqli_connect_errno()) {
    echo "Koneksi database gagal : " . mysqli_connect_error();
}
?>