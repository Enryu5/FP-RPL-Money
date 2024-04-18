-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 18 Apr 2024 pada 04.00
-- Versi server: 10.4.32-MariaDB
-- Versi PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `money`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(11) NOT NULL,
  `nama` varchar(40) NOT NULL,
  `email` varchar(40) NOT NULL,
  `pass` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `admin`
--

INSERT INTO `admin` (`id_admin`, `nama`, `email`, `pass`) VALUES
(1, 'Belva', 'belvaganteng@gmail.com', 'belvamemangganteng'),
(3, 'user', 'user@gmail.com', 'user123');

-- --------------------------------------------------------

--
-- Struktur dari tabel `catatan`
--

CREATE TABLE `catatan` (
  `id_catatan` int(11) NOT NULL,
  `catatan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `catatan`
--

INSERT INTO `catatan` (`id_catatan`, `catatan`) VALUES
(1, 'Besok, Hari minggu akan ada kunjungan dari pihak dinas untuk mengecek kinerja karyawan.'),
(2, 'Hari Kamis jam 8 akan ada rapat, diharapkan kepada semua karyawan agar dapat berhadir.'),
(3, 'Tingkatkan lagi pendapatan, dan minimalkan pengeluaran'),
(4, 'tgl 6 domain dan hosting banyak yang akan expired, dan harus diperpanjang lagi');

-- --------------------------------------------------------

--
-- Struktur dari tabel `hutang`
--

CREATE TABLE `hutang` (
  `id_hutang` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `tgl_pinjam` date DEFAULT NULL,
  `tenggat` date DEFAULT NULL,
  `sumber_hutang` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `hutang`
--

INSERT INTO `hutang` (`id_hutang`, `jumlah`, `tgl_pinjam`, `tenggat`, `sumber_hutang`) VALUES
(2, 15000, '2023-12-19', '2023-12-29', 'Budi'),
(21, 100000, '2023-12-19', '2023-12-30', 'Cecep'),
(23, 50000, '2023-12-20', '2023-12-25', 'Sodara'),
(24, 50000, '2024-01-03', '0000-00-00', 'Temen');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pemasukan`
--

CREATE TABLE `pemasukan` (
  `id_pemasukan` int(11) NOT NULL,
  `tgl_pemasukan` date NOT NULL,
  `jumlah` int(11) NOT NULL,
  `sumber` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `pemasukan`
--

INSERT INTO `pemasukan` (`id_pemasukan`, `tgl_pemasukan`, `jumlah`, `sumber`) VALUES
(3, '2022-03-01', 8500000, 'Gajian'),
(4, '2022-04-01', 550000, 'Gajian'),
(5, '2022-05-01', 5700000, 'Gajian'),
(6, '2022-06-01', 35500000, 'Gajian'),
(7, '2022-07-01', 75800000, 'Gajian'),
(8, '2022-08-01', 540000, 'Gajian'),
(9, '2022-09-01', 760000, 'Gajian'),
(10, '2022-10-01', 800000, 'Gajian'),
(11, '2022-11-01', 8500000, 'Gajian'),
(12, '2022-12-01', 800000, 'Gajian'),
(13, '2023-01-01', 1500000, 'Gajian'),
(14, '2023-02-01', 1500000, 'Gajian'),
(15, '2023-03-01', 1500000, 'Gajian'),
(16, '2023-04-01', 1500000, 'Gajian'),
(17, '2023-05-01', 1500000, 'Gajian'),
(18, '2023-06-01', 1500000, 'Gajian'),
(19, '2023-07-01', 1500000, 'Gajian'),
(20, '2023-08-01', 1500000, 'Gajian'),
(21, '2023-09-01', 1500000, 'Gajian'),
(22, '2023-01-14', 1500000, 'Web Desa'),
(23, '2023-03-25', 500000, 'Website Teman'),
(24, '2023-04-14', 500000, 'Maintenance Web Desa'),
(25, '2023-10-01', 1500000, 'Gajian'),
(26, '2023-11-01', 1500000, 'Gajian'),
(27, '2023-12-01', 1500000, 'Gajian'),
(28, '2023-07-14', 500000, 'Maintenance Web Desa'),
(29, '2023-10-14', 500000, 'Maintenance Web Desa'),
(31, '2024-01-01', 1800000, 'Gajian dan bonus');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengeluaran`
--

CREATE TABLE `pengeluaran` (
  `id_pengeluaran` int(11) NOT NULL,
  `tgl_pengeluaran` date NOT NULL,
  `jumlah` int(11) NOT NULL,
  `transaksi` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `pengeluaran`
--

INSERT INTO `pengeluaran` (`id_pengeluaran`, `tgl_pengeluaran`, `jumlah`, `transaksi`) VALUES
(2, '2023-02-11', 1300000, 'Kebutuhan Hidup'),
(3, '2023-03-12', 1500000, 'Kebutuhan Hidup'),
(4, '2023-04-11', 1400000, 'Kebutuhan Hidup'),
(5, '2023-05-12', 1300000, 'Kebutuhan Hidup'),
(6, '2023-06-11', 1300000, 'Kebutuhan Hidup'),
(7, '2023-07-11', 1300000, 'Kebutuhan Hidup'),
(8, '2023-08-12', 1500000, 'Kebutuhan Hidup'),
(9, '2023-09-12', 1200000, 'Kebutuhan Hidup'),
(10, '2023-10-12', 1400000, 'Kebutuhan Hidup'),
(11, '2023-11-11', 1500000, 'Kebutuhan Hidup'),
(12, '2023-12-12', 1400000, 'Kebutuhan Hidup'),
(13, '2024-01-01', 1200000, 'Kebutuhan Hidup');

-- --------------------------------------------------------

--
-- Struktur dari tabel `rencana`
--

CREATE TABLE `rencana` (
  `id_rencana` int(11) NOT NULL,
  `tanggal` date DEFAULT NULL,
  `jenis_rencana` varchar(50) DEFAULT NULL,
  `nominal` varchar(20) DEFAULT NULL,
  `deskripsi` varchar(500) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `rencana`
--

INSERT INTO `rencana` (`id_rencana`, `tanggal`, `jenis_rencana`, `nominal`, `deskripsi`) VALUES
(1, '2023-12-14', 'Pengeluaran', 'RP. 50.000', 'Beli pulsa'),
(2, '2023-12-24', 'Pemasukan', 'RP. 250.000', 'Bonus natal'),
(3, '2023-12-30', 'Pengeluaran', 'RP. 100.000', 'Beli kembang api untuk tahun baru'),
(4, '2024-01-01', 'Pendapatan', 'RP. 500.000', 'Malak keluarga jauh'),
(7, '2024-01-20', 'Pendapatan', 'RP. 700.000', 'Hutang temen');

-- --------------------------------------------------------

--
-- Struktur dari tabel `sumber`
--

CREATE TABLE `sumber` (
  `id_sumber` int(11) NOT NULL,
  `nama` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `sumber`
--

INSERT INTO `sumber` (`id_sumber`, `nama`) VALUES
(1, 'Buat Web Pemerintah'),
(2, 'Desain Poster Lomba'),
(3, 'Instalasi Softwre'),
(4, 'Instalasi OS'),
(5, 'Lain-Lain'),
(6, 'Domain'),
(7, 'Hosting'),
(8, 'Listrik'),
(9, 'Wifi'),
(10, 'Lain-lain');

-- --------------------------------------------------------

--
-- Struktur dari tabel `uang`
--

CREATE TABLE `uang` (
  `id_uang` int(11) NOT NULL,
  `tgl_uang` date NOT NULL,
  `id_pengeluaran` int(11) DEFAULT NULL,
  `id_pendapatan` int(11) DEFAULT NULL,
  `jumlah` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `uang`
--

INSERT INTO `uang` (`id_uang`, `tgl_uang`, `id_pengeluaran`, `id_pendapatan`, `jumlah`) VALUES
(1, '2019-10-23', NULL, 1, 500000),
(2, '2019-10-24', 2, NULL, 10000);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indeks untuk tabel `catatan`
--
ALTER TABLE `catatan`
  ADD PRIMARY KEY (`id_catatan`);

--
-- Indeks untuk tabel `hutang`
--
ALTER TABLE `hutang`
  ADD PRIMARY KEY (`id_hutang`);

--
-- Indeks untuk tabel `pemasukan`
--
ALTER TABLE `pemasukan`
  ADD PRIMARY KEY (`id_pemasukan`),
  ADD KEY `id_sumber` (`sumber`(3072));

--
-- Indeks untuk tabel `pengeluaran`
--
ALTER TABLE `pengeluaran`
  ADD PRIMARY KEY (`id_pengeluaran`),
  ADD KEY `id_sumber` (`transaksi`(3072));

--
-- Indeks untuk tabel `rencana`
--
ALTER TABLE `rencana`
  ADD PRIMARY KEY (`id_rencana`);

--
-- Indeks untuk tabel `sumber`
--
ALTER TABLE `sumber`
  ADD PRIMARY KEY (`id_sumber`);

--
-- Indeks untuk tabel `uang`
--
ALTER TABLE `uang`
  ADD PRIMARY KEY (`id_uang`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `catatan`
--
ALTER TABLE `catatan`
  MODIFY `id_catatan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `hutang`
--
ALTER TABLE `hutang`
  MODIFY `id_hutang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT untuk tabel `pemasukan`
--
ALTER TABLE `pemasukan`
  MODIFY `id_pemasukan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT untuk tabel `pengeluaran`
--
ALTER TABLE `pengeluaran`
  MODIFY `id_pengeluaran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT untuk tabel `rencana`
--
ALTER TABLE `rencana`
  MODIFY `id_rencana` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `sumber`
--
ALTER TABLE `sumber`
  MODIFY `id_sumber` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `uang`
--
ALTER TABLE `uang`
  MODIFY `id_uang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
