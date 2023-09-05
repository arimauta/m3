<?php
include '../config.php';

// mengaktifkan session
session_start();

// cek apakah user telah login, jika belum login maka di alihkan ke halaman login
if ($_SESSION['status'] != "login") {
    header("location:../index.php");
}

$nip = $_GET["nip"];
$data = mysqli_query($koneksi, "SELECT * FROM dosen WHERE Nip_Dosen = '$nip'");
while ($d = mysqli_fetch_array($data)) {
// menampilkan pesan selamat datang
// echo "Hai, selamat datang ". $_SESSION['username'];

?>
<?php include("header.php"); ?>

<div class="fs-1 fw-bolder card-title">Update Dosen</div>

<a class="btn btn-primary mb-2" href="javascript:history.back();">
    Kembali
</a>
<form action="proses.php" method="post">
    <div class="mb-3">
        <label for="nim" class="form-label">NIP</label>
        <input name="nip" type="text" class="form-control" value=<?=$d['Nip_Dosen'] ?>  id="nip">
    </div>
    <div class="mb-3">
        <label for="nama" class="form-label">Nama</label>
        <input name="nama" type="text" class="form-control" value=<?=$d['Nama_Dosen'] ?> id="nama">
    </div>
    <div class="mb-3">
        <label for="ttl" class="form-label">Nama Mata Kuliah</label>
        <input name="namamatkul" type="text" class="form-control" value=<?=$d['Nama_Matakuliah'] ?> id="namamatkul">
    </div>
    <div class="mb-5">
        <label for="alamat" class="form-label">Kode Mata Kuliah</label>
        <input name="kdmatkul" type="text" class="form-control" value=<?=$d['Kode_matakuliah'] ?> id="kdmatkul">
    </div>
    <div class="mb-3">
        <div class="d-grid gap-2 mt-xl-2">
            <input type="submit" value="Tambah" name="updatedosen" class="btn btn-success py-2">
        </div>
    </div>
</form>
<?php } ?>
<?php include 'footer.php'; ?>
<!-- <br/>
<br/>