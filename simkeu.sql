-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 02 Okt 2017 pada 15.34
-- Versi Server: 5.7.14
-- PHP Version: 5.6.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `simkeu`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `akun`
--

CREATE TABLE `akun` (
  `id_akun` int(11) NOT NULL,
  `kode_akun` varchar(11) NOT NULL,
  `nama_akun` varchar(50) NOT NULL,
  `rugi_laba` varchar(2) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `akun`
--

INSERT INTO `akun` (`id_akun`, `kode_akun`, `nama_akun`, `rugi_laba`) VALUES
(28, '001', 'Perlengkapan Kelas', 'Y'),
(29, '002', 'Perlengkapan Kantor', 'N'),
(30, '003', 'Kelas Kursus', 'Y');

-- --------------------------------------------------------

--
-- Struktur dari tabel `akun_besar`
--

CREATE TABLE `akun_besar` (
  `id_akun` int(11) NOT NULL,
  `kode_akun` varchar(11) NOT NULL,
  `nama_akun` varchar(50) NOT NULL,
  `rugi_laba` varchar(2) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `akun_besar`
--

INSERT INTO `akun_besar` (`id_akun`, `kode_akun`, `nama_akun`, `rugi_laba`) VALUES
(9, '001', 'Gaji Karyawan', 'Y'),
(11, '003', 'Hasil Lelang Proyek', 'Y'),
(10, '002', 'Perlengkapan Proyek', 'Y');

-- --------------------------------------------------------

--
-- Struktur dari tabel `log`
--

CREATE TABLE `log` (
  `id_log` int(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `aktifitas` text NOT NULL,
  `waktu` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `log`
--

INSERT INTO `log` (`id_log`, `username`, `aktifitas`, `waktu`) VALUES
(1, 'admin', 'Menambah Pemasukan Pendapatan', '2013-06-12 14:38:46'),
(2, 'admin', 'Menambah Pemasukan Pendapatan', '2013-06-12 14:39:17'),
(3, 'admin', 'Menambah data pengeluaran.', '2013-06-12 14:39:45'),
(4, 'admin', 'Menambah Pemasukan Pendapatan', '2013-06-12 20:03:53'),
(5, 'admin', 'Menambah Pemasukan Pendapatan', '2013-06-12 20:04:01'),
(6, 'admin', 'Menambah Pemasukan Pendapatan', '2013-06-12 20:04:15'),
(7, 'admin', 'Menambah Pemasukan Pendapatan', '2013-06-12 20:04:28'),
(8, 'admin', 'Menambah data pengeluaran.', '2013-06-12 20:14:01'),
(9, 'admin', 'Menambah data pengeluaran.', '2013-06-12 20:14:18'),
(10, 'admin', 'Menambah data pengeluaran.', '2013-06-12 20:14:32'),
(11, 'admin', 'Menambah Pemasukan Pendapatan Besar', '2013-06-13 19:08:04'),
(12, 'admin', 'Menambah data pengeluaran Besar.', '2013-06-13 20:01:18'),
(13, 'admin', 'Menambah Pemasukan Pendapatan', '2013-06-17 15:15:23'),
(14, 'admin', 'Menambah Pemasukan Pendapatan', '2013-06-17 15:16:06'),
(15, 'admin', 'Menambah Pemasukan Pendapatan Besar', '2013-06-17 15:18:01'),
(16, 'admin', 'Menambah data pengeluaran.', '2013-06-17 15:20:04'),
(17, 'admin', 'Menambah data pengeluaran.', '2013-06-17 15:24:42'),
(18, 'admin', 'Menambah data pemasukan.', '2013-06-17 15:24:42'),
(19, 'admin', 'Menambah data pengeluaran Besar.', '2013-06-17 15:24:42');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pemasukan`
--

CREATE TABLE `pemasukan` (
  `id_pemasukan` int(11) NOT NULL,
  `kode_akun` varchar(11) NOT NULL,
  `nama_pemasukan` varchar(100) NOT NULL,
  `jumlah_pemasukan` int(30) NOT NULL,
  `tanggal_pemasukan` date NOT NULL,
  `saldo_akhir` int(30) NOT NULL,
  `keterangan` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pemasukan`
--

INSERT INTO `pemasukan` (`id_pemasukan`, `kode_akun`, `nama_pemasukan`, `jumlah_pemasukan`, `tanggal_pemasukan`, `saldo_akhir`, `keterangan`) VALUES
(1, '003', 'Pendaftaran Privat an Ilham', 35000, '2013-06-17', 35000, ''),
(2, '003', 'Pendaftaran Privat an Ibnu', 50000, '2013-06-17', 85000, '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pemasukan_besar`
--

CREATE TABLE `pemasukan_besar` (
  `id_pemasukan` int(11) NOT NULL,
  `kode_akun` varchar(11) NOT NULL,
  `nama_pemasukan` varchar(100) NOT NULL,
  `jumlah_pemasukan` int(30) NOT NULL,
  `tanggal_pemasukan` date NOT NULL,
  `saldo_akhir` int(30) NOT NULL,
  `keterangan` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pemasukan_besar`
--

INSERT INTO `pemasukan_besar` (`id_pemasukan`, `kode_akun`, `nama_pemasukan`, `jumlah_pemasukan`, `tanggal_pemasukan`, `saldo_akhir`, `keterangan`) VALUES
(1, '003', 'Pembuatan SIK', 30000000, '2013-06-17', 30000000, ''),
(2, '001', 'Renovasi Kelas', 40000, '2013-06-17', 30040000, '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pemasukan_rekening`
--

CREATE TABLE `pemasukan_rekening` (
  `id_pemasukan` int(11) NOT NULL,
  `kode_akun` varchar(11) NOT NULL,
  `nama_pemasukan` varchar(100) NOT NULL,
  `jumlah_pemasukan` int(30) NOT NULL,
  `tanggal_pemasukan` date NOT NULL,
  `saldo_akhir` int(30) NOT NULL,
  `keterangan` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengeluaran`
--

CREATE TABLE `pengeluaran` (
  `id_pengeluaran` int(11) NOT NULL,
  `kode_akun` varchar(11) NOT NULL,
  `nama_pengeluaran` varchar(100) NOT NULL,
  `jumlah_pengeluaran` int(30) NOT NULL,
  `tanggal_pengeluaran` date NOT NULL,
  `saldo_akhir` int(30) NOT NULL,
  `keterangan` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pengeluaran`
--

INSERT INTO `pengeluaran` (`id_pengeluaran`, `kode_akun`, `nama_pengeluaran`, `jumlah_pengeluaran`, `tanggal_pengeluaran`, `saldo_akhir`, `keterangan`) VALUES
(1, '001', 'Spidol kelas', 5000, '2013-06-17', 80000, ''),
(2, '001', 'Renovasi Kelas', 40000, '2013-06-17', 40000, '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengeluaran_besar`
--

CREATE TABLE `pengeluaran_besar` (
  `id_pengeluaran` int(11) NOT NULL,
  `kode_akun` varchar(11) NOT NULL,
  `nama_pengeluaran` varchar(100) NOT NULL,
  `jumlah_pengeluaran` int(30) NOT NULL,
  `tanggal_pengeluaran` date NOT NULL,
  `saldo_akhir` int(30) NOT NULL,
  `keterangan` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `saldo`
--

CREATE TABLE `saldo` (
  `id_saldo` int(11) NOT NULL,
  `saldo_total` int(30) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `saldo`
--

INSERT INTO `saldo` (`id_saldo`, `saldo_total`) VALUES
(1, 40000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `saldo_besar`
--

CREATE TABLE `saldo_besar` (
  `id_saldo` int(11) NOT NULL,
  `saldo_total` int(30) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `saldo_besar`
--

INSERT INTO `saldo_besar` (`id_saldo`, `saldo_total`) VALUES
(1, 30040000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `saldo_rekening`
--

CREATE TABLE `saldo_rekening` (
  `id_saldo` int(11) NOT NULL,
  `saldo_total` int(30) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(32) NOT NULL,
  `hak_akses` varchar(25) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id_user`, `username`, `password`, `hak_akses`) VALUES
(6, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'admin'),
(7, 'kecil', 'cb7fb30abf632702fa603e8c7316f007', 'operator_kecil');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `akun`
--
ALTER TABLE `akun`
  ADD PRIMARY KEY (`id_akun`);

--
-- Indexes for table `akun_besar`
--
ALTER TABLE `akun_besar`
  ADD PRIMARY KEY (`id_akun`);

--
-- Indexes for table `log`
--
ALTER TABLE `log`
  ADD PRIMARY KEY (`id_log`);

--
-- Indexes for table `pemasukan`
--
ALTER TABLE `pemasukan`
  ADD PRIMARY KEY (`id_pemasukan`);

--
-- Indexes for table `pemasukan_besar`
--
ALTER TABLE `pemasukan_besar`
  ADD PRIMARY KEY (`id_pemasukan`);

--
-- Indexes for table `pemasukan_rekening`
--
ALTER TABLE `pemasukan_rekening`
  ADD PRIMARY KEY (`id_pemasukan`);

--
-- Indexes for table `pengeluaran`
--
ALTER TABLE `pengeluaran`
  ADD PRIMARY KEY (`id_pengeluaran`);

--
-- Indexes for table `pengeluaran_besar`
--
ALTER TABLE `pengeluaran_besar`
  ADD PRIMARY KEY (`id_pengeluaran`);

--
-- Indexes for table `saldo`
--
ALTER TABLE `saldo`
  ADD PRIMARY KEY (`id_saldo`);

--
-- Indexes for table `saldo_besar`
--
ALTER TABLE `saldo_besar`
  ADD PRIMARY KEY (`id_saldo`);

--
-- Indexes for table `saldo_rekening`
--
ALTER TABLE `saldo_rekening`
  ADD PRIMARY KEY (`id_saldo`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `akun`
--
ALTER TABLE `akun`
  MODIFY `id_akun` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;
--
-- AUTO_INCREMENT for table `akun_besar`
--
ALTER TABLE `akun_besar`
  MODIFY `id_akun` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `log`
--
ALTER TABLE `log`
  MODIFY `id_log` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT for table `pemasukan`
--
ALTER TABLE `pemasukan`
  MODIFY `id_pemasukan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `pemasukan_besar`
--
ALTER TABLE `pemasukan_besar`
  MODIFY `id_pemasukan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `pemasukan_rekening`
--
ALTER TABLE `pemasukan_rekening`
  MODIFY `id_pemasukan` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `pengeluaran`
--
ALTER TABLE `pengeluaran`
  MODIFY `id_pengeluaran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `pengeluaran_besar`
--
ALTER TABLE `pengeluaran_besar`
  MODIFY `id_pengeluaran` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
