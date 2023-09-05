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
<?php include("header.php"); ?>

<div class="fs-1 fw-bolder card-title">Tambah Kuliah</div>

<a class="btn btn-primary mb-2" href="javascript:history.back();">
    Kembali
</a>
<form action="proses.php" method="post">
    <div class="mb-3">
        <label for="ruang" class="form-label">Ruang Kuliah</label>
        <input name="ruang" type="text" class="form-control" id="ruang">
    </div>
    <div class="mb-3">
        <label for="kdmatkul" class="form-label">Kode Mata Kuliah</label>
        <input name="kdmatkul" type="text" class="form-control" id="kdmatkul">
    </div>
    <div class="mb-3">
        <label for="namamatkul" class="form-label">Nama Mata Kuliah</label>
        <input name="namamatkul" type="text" class="form-control" id="namamatkul">
    </div>
    <div class="mb-3">
        <label for="jam" class="form-label">Jam Kuliah</label>
        <input name="jam" type="text" class="form-control" id="jam">
    </div>
    <div class="mb-3">
        <label for="dosen" class="form-label">Nama Dosen</label>
        <input name="dosen" type="text" class="form-control" id="dosen">
    </div>
    <div class="mb-5">
        <label for="nip" class="form-label">NIP Dosen</label>
        <input name="nip" type="text" class="form-control" id="nip">
    </div>
    <div class="mb-3">
        <div class="d-grid gap-2 mt-xl-2">
            <input type="submit" value="Tambah" name="tambahkuliah" class="btn btn-success py-2">
        </div>
    </div>
</form>

<?php include 'footer.php'; ?>
<!-- <br/>
<br/>