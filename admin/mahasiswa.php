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

<div class="fs-1 fw-bolder card-title">Data Mahasiswa</div>

<a class="btn btn-success mb-2" href="tambahmahasiswa.php">
    Tambah Data
</a>
<table class="table table-borderless datatable">
    <tr>
        <th class="bg-success text-center text-light">NO</th>
        <th class="bg-success text-center text-light">NIM</th>
        <th class="bg-success text-center text-light">Nama</th>
        <th class="bg-success text-center text-light">TTL</th>
        <th class="bg-success text-center text-light">Alamat</th>
        <th class="bg-success text-center text-light">OPSI</th>
    </tr>
    <?php
    include '../config.php';
    $no = 1;
    $data = mysqli_query($koneksi, "select * from mahasiswa");
    foreach ($data as $d) {
        ?>
        <tr>
            <td class="text-center">
                <?php echo $no++; ?>
            </td>
            <td class="text-center">
                <?php echo $d['NIM']; ?>
            </td>
            <td class="text-center">
                <?php echo $d['Nama_Mahasiswa']; ?>
            </td>
            <td class="text-center">
                <?php echo $d['Tempat_Tanggal_Lahir']; ?>
            </td>
            <td class="text-center">
                <?php echo $d['Alamat_Mahasiswa']; ?>
            </td>
            <td class="text-center">
                <a href="editmahasiswa.php?nim=<?= $d['NIM'] ?>" class="btn btn-primary">EDIT</a>
                <a href="hapusmahasiswa.php?nim=<?= $d['NIM'] ?>"
                    onclick="return confirm('Serius Bro Mau Dihapus??');" class="btn btn-danger">HAPUS</a>
            </td>
        </tr>
        <?php
    }
    ?>
</table>

<?php include 'footer.php'; ?>
<!-- <br/>
<br/>