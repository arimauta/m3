<?php
include '../config.php';

// mengaktifkan session
session_start();

// cek apakah user telah login, jika belum login maka di alihkan ke halaman login
if ($_SESSION['status'] != "login") {
    header("location:../index.php");
}
$ruang = $_GET["ruang"];
$data = mysqli_query($koneksi, "SELECT * FROM kuliah WHERE Ruang_kuliah = '$ruang'");
while ($d = mysqli_fetch_array($data)) {
    ?>
<?php include("header.php"); ?>

<div class="fs-1 fw-bolder card-title">Update Kuliah</div>

<a class="btn btn-primary mb-2" href="javascript:history.back();">
    Kembali
</a>
<form action="proses.php" method="post">
    <div class="mb-3">
        <label for="ruang" class="form-label">Ruang Kuliah</label>
        <input name="ruang" type="text" class="form-control" value="<?=$d['Ruang_kuliah'];?>" id="ruang">
    </div>
    <div class="mb-3">
        <label for="kdmatkul" class="form-label">Kode Mata Kuliah</label>
        <input name="kdmatkul" type="text" class="form-control" value="<?=$d['Kode_matakuliah'];?>" id="kdmatkul">
    </div>
    <div class="mb-3">
        <label for="namamatkul" class="form-label">Nama Mata Kuliah</label>
        <input name="namamatkul" type="text" class="form-control" value="<?=$d['Nama_Matakuliah'];?>" id="namamatkul">
    </div>
    <div class="mb-3">
        <label for="jam" class="form-label">Jam Kuliah</label>
        <input name="jam" type="text" class="form-control" value="<?=$d['Jam_kuliah'];?>" id="jam">
    </div>
    <div class="mb-3">
        <label for="dosen" class="form-label">Nama Dosen</label>
        <input name="dosen" type="text" class="form-control" value="<?=$d['Nama_Dosen'];?>" id="dosen">
    </div>
    <div class="mb-5">
        <label for="nip" class="form-label">NIP Dosen</label>
        <input name="nip" type="text" class="form-control" value="<?=$d['Nip_Dosen'];?>" id="nip">
    </div>
    <div class="mb-3">
        <div class="d-grid gap-2 mt-xl-2">
            <input type="submit" value="Tambah" name="updatekuliah" class="btn btn-success py-2">
        </div>
    </div>
</form>
<?php } ?>
<?php include 'footer.php'; ?>
<!-- <br/>
<br/>