-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 05 Agu 2023 pada 17.29
-- Versi server: 10.4.28-MariaDB
-- Versi PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tugas_pelatihan36_ariefmaulanathamrin`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `dosen`
--

CREATE TABLE `dosen` (
  `Nip_Dosen` char(15) NOT NULL,
  `Nama_Dosen` varchar(30) NOT NULL,
  `Nama_Matakuliah` varchar(20) NOT NULL,
  `Kode_matakuliah` char(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `dosen`
--

INSERT INTO `dosen` (`Nip_Dosen`, `Nama_Dosen`, `Nama_Matakuliah`, `Kode_matakuliah`) VALUES
('11', 'maulana', 'web2', '101'),
('22', 'thamrin', 'web1', '111');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kuliah`
--

CREATE TABLE `kuliah` (
  `Ruang_kuliah` char(6) NOT NULL,
  `Kode_matakuliah` char(5) NOT NULL,
  `Nama_Matakuliah` varchar(20) NOT NULL,
  `Jam_kuliah` char(15) NOT NULL,
  `Nama_Dosen` varchar(30) NOT NULL,
  `Nip_Dosen` char(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `kuliah`
--

INSERT INTO `kuliah` (`Ruang_kuliah`, `Kode_matakuliah`, `Nama_Matakuliah`, `Jam_kuliah`, `Nama_Dosen`, `Nip_Dosen`) VALUES
('625', '111', 'web1', '19:00-20:00 WIB', 'thamrin', '22'),
('626', '101', 'web2', '19:00-20:00 WIB', 'maulana', '11');

-- --------------------------------------------------------

--
-- Struktur dari tabel `mahasiswa`
--

CREATE TABLE `mahasiswa` (
  `NIM` char(12) NOT NULL,
  `Nama_Mahasiswa` varchar(30) NOT NULL,
  `Tempat_Tanggal_Lahir` varchar(30) NOT NULL,
  `Alamat_Mahasiswa` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `mahasiswa`
--

INSERT INTO `mahasiswa` (`NIM`, `Nama_Mahasiswa`, `Tempat_Tanggal_Lahir`, `Alamat_Mahasiswa`) VALUES
('1', 'arief', 'depok', 'pamulang'),
('2', 'farhan', 'depok', 'sawangan');

-- --------------------------------------------------------

--
-- Struktur dari tabel `mempelajari`
--

CREATE TABLE `mempelajari` (
  `NIM` char(12) NOT NULL,
  `Kode_matakuliah` char(5) NOT NULL,
  `Jumlah_SKS` char(3) NOT NULL,
  `Ruang_kuliah` char(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `mengajar`
--

CREATE TABLE `mengajar` (
  `Nip_Dosen` char(15) NOT NULL,
  `Kode_matakuliah` char(5) NOT NULL,
  `Nama_Matakuliah` varchar(20) NOT NULL,
  `Jam_kuliah` char(15) NOT NULL,
  `Ruang_kuliah` char(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `name` varchar(59) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id`, `username`, `name`, `password`) VALUES
(1, 'admin', 'admin', 'admin');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `dosen`
--
ALTER TABLE `dosen`
  ADD PRIMARY KEY (`Nip_Dosen`);

--
-- Indeks untuk tabel `kuliah`
--
ALTER TABLE `kuliah`
  ADD PRIMARY KEY (`Ruang_kuliah`),
  ADD KEY `Nip_Dosen` (`Nip_Dosen`);

--
-- Indeks untuk tabel `mahasiswa`
--
ALTER TABLE `mahasiswa`
  ADD PRIMARY KEY (`NIM`);

--
-- Indeks untuk tabel `mempelajari`
--
ALTER TABLE `mempelajari`
  ADD PRIMARY KEY (`NIM`),
  ADD KEY `Kode_matakuliah` (`Kode_matakuliah`);

--
-- Indeks untuk tabel `mengajar`
--
ALTER TABLE `mengajar`
  ADD PRIMARY KEY (`Kode_matakuliah`),
  ADD KEY `Nip_Dosen` (`Nip_Dosen`),
  ADD KEY `Ruang_kuliah` (`Ruang_kuliah`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `kuliah`
--
ALTER TABLE `kuliah`
  ADD CONSTRAINT `kuliah_ibfk_2` FOREIGN KEY (`Nip_Dosen`) REFERENCES `dosen` (`Nip_Dosen`);

--
-- Ketidakleluasaan untuk tabel `mempelajari`
--
ALTER TABLE `mempelajari`
  ADD CONSTRAINT `mempelajari_ibfk_1` FOREIGN KEY (`Kode_matakuliah`) REFERENCES `mengajar` (`Kode_matakuliah`),
  ADD CONSTRAINT `mempelajari_ibfk_2` FOREIGN KEY (`NIM`) REFERENCES `mahasiswa` (`NIM`);

--
-- Ketidakleluasaan untuk tabel `mengajar`
--
ALTER TABLE `mengajar`
  ADD CONSTRAINT `mengajar_ibfk_1` FOREIGN KEY (`Nip_Dosen`) REFERENCES `dosen` (`Nip_Dosen`),
  ADD CONSTRAINT `mengajar_ibfk_2` FOREIGN KEY (`Ruang_kuliah`) REFERENCES `kuliah` (`Ruang_kuliah`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
