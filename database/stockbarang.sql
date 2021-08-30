-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 30 Agu 2021 pada 03.37
-- Versi server: 10.4.11-MariaDB
-- Versi PHP: 7.3.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `stockbarang`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `keluar`
--

CREATE TABLE `keluar` (
  `idkeluar` int(11) NOT NULL,
  `idbarang` int(11) NOT NULL,
  `tanggal` timestamp NOT NULL DEFAULT current_timestamp(),
  `penerima` varchar(25) NOT NULL,
  `qty` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `keluar`
--

INSERT INTO `keluar` (`idkeluar`, `idbarang`, `tanggal`, `penerima`, `qty`) VALUES
(1, 3, '2021-02-05 06:46:13', 'lisa', 10),
(2, 9, '2021-02-05 10:34:50', 'Putri', 10),
(3, 14, '2021-02-07 06:08:57', 'Putri', 5),
(4, 2, '2021-02-07 11:34:08', 'lisa', 2),
(6, 12, '2021-06-03 17:34:51', 'Paijo', 5),
(7, 3, '2021-07-30 00:29:50', 'aaa', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `login`
--

CREATE TABLE `login` (
  `iduser` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `login`
--

INSERT INTO `login` (`iduser`, `nama`, `password`) VALUES
(2, 'rizki@gmail.com', '123'),
(3, 'putri@ymail.com', '12345'),
(4, 'maylisa@yahoo.com', '123');

-- --------------------------------------------------------

--
-- Struktur dari tabel `masuk`
--

CREATE TABLE `masuk` (
  `idmasuk` int(11) NOT NULL,
  `idbarang` int(11) NOT NULL,
  `tanggal` timestamp NOT NULL DEFAULT current_timestamp(),
  `keterangan` varchar(50) NOT NULL,
  `qty` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `masuk`
--

INSERT INTO `masuk` (`idmasuk`, `idbarang`, `tanggal`, `keterangan`, `qty`) VALUES
(2, 2, '2021-02-04 19:53:40', 'ahmadd', 2),
(3, 1, '2021-02-04 19:55:02', 'lisa', 2),
(4, 3, '2021-02-05 06:12:24', 'maylisa', 1),
(5, 1, '2021-02-05 06:12:52', 'maylisa', 1),
(6, 9, '2021-02-05 10:34:17', 'Putri', 3),
(8, 11, '2021-02-06 17:29:17', 'lisa', 2),
(10, 13, '2021-02-06 17:32:19', 'lisa', 11),
(11, 2, '2021-02-07 11:14:19', 'rizki', 3),
(12, 11, '2021-06-03 15:30:22', 'maylisa', 50),
(13, 12, '2021-06-03 15:31:21', 'maylisa', 5),
(15, 17, '2021-07-30 00:55:16', 'kiki', 10),
(17, 3, '2021-07-30 01:23:44', 'lisa', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pesan`
--

CREATE TABLE `pesan` (
  `idpesan` int(11) NOT NULL,
  `idbarang` int(11) NOT NULL,
  `jumlahpesan` int(11) NOT NULL,
  `tanggal` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `biayapesan` int(11) NOT NULL,
  `biayasimpan` int(11) NOT NULL,
  `eoq` int(11) NOT NULL,
  `atas` int(11) NOT NULL,
  `bawah` int(11) NOT NULL,
  `frekuensi` int(11) NOT NULL,
  `daurulang` int(11) NOT NULL,
  `bulan` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `pesan`
--

INSERT INTO `pesan` (`idpesan`, `idbarang`, `jumlahpesan`, `tanggal`, `biayapesan`, `biayasimpan`, `eoq`, `atas`, `bawah`, `frekuensi`, `daurulang`, `bulan`) VALUES
(71, 2, 400, '2021-08-27 11:22:06', 109000, 5450, 126, 87200000, 16000, 3, 115, 4),
(72, 3, 400, '2021-08-27 11:23:06', 2000, 100, 126, 1600000, 16000, 3, 115, 4),
(73, 10, 500, '2021-08-27 11:23:32', 1000, 50, 141, 1000000, 20000, 4, 103, 3),
(74, 12, 300, '2021-08-27 11:24:11', 160000, 8000, 110, 96000000, 12000, 3, 133, 4),
(75, 15, 90000, '2021-08-27 11:33:29', 183000, 9150, 1897, 2147483647, 3600000, 47, 8, 0),
(76, 18, 100, '2021-08-27 11:46:02', 1000, 50, 63, 200000, 4000, 2, 231, 8),
(77, 9, 500, '2021-08-27 11:56:52', 2000, 100, 141, 2000000, 20000, 4, 103, 3),
(78, 11, 300, '2021-08-27 11:59:08', 1500, 75, 110, 900000, 12000, 3, 133, 4);

-- --------------------------------------------------------

--
-- Struktur dari tabel `plan`
--

CREATE TABLE `plan` (
  `idplan` int(11) NOT NULL,
  `idbarang` int(11) NOT NULL,
  `jumlahpesan` int(11) NOT NULL,
  `biayapesan` int(11) NOT NULL,
  `total` int(11) NOT NULL,
  `frekuensi` int(11) NOT NULL,
  `daurulang` int(11) NOT NULL,
  `bulan` varchar(55) NOT NULL,
  `bulan2` varchar(55) NOT NULL,
  `bulan3` varchar(55) NOT NULL,
  `bulan4` varchar(55) NOT NULL,
  `bulan5` varchar(55) NOT NULL,
  `bulan6` varchar(55) NOT NULL,
  `bulan7` varchar(55) NOT NULL,
  `bulan8` varchar(55) NOT NULL,
  `bulan9` varchar(55) NOT NULL,
  `bulan10` varchar(55) NOT NULL,
  `bulan11` varchar(55) NOT NULL,
  `bulan12` varchar(55) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `plan`
--

INSERT INTO `plan` (`idplan`, `idbarang`, `jumlahpesan`, `biayapesan`, `total`, `frekuensi`, `daurulang`, `bulan`, `bulan2`, `bulan3`, `bulan4`, `bulan5`, `bulan6`, `bulan7`, `bulan8`, `bulan9`, `bulan10`, `bulan11`, `bulan12`) VALUES
(28, 2, 400, 109000, 43600000, 3, 115, '', '', '', '', '', '', '', '', '', '', '', ''),
(29, 3, 400, 2000, 800000, 3, 115, '', '', '', '', '', '', '', '', '', '', '', ''),
(30, 10, 500, 1000, 500000, 4, 103, '', '', '', '', '', '', '', '', '', '', '', ''),
(31, 12, 300, 160000, 48000000, 3, 133, '', '', '', '', '', '', '', '', '', '', '', ''),
(32, 15, 90000, 183000, 2147483647, 47, 8, '', '', '', '', '', '', '', '', '', '', '', ''),
(33, 18, 100, 1000, 100000, 2, 231, '', '', '', '', '', '', '', '', '', '', '', ''),
(34, 9, 500, 2000, 1000000, 4, 103, '', '', '', '', '', '', '', '', '', '', '', ''),
(35, 11, 300, 1500, 450000, 3, 133, '', '', '', '', '', '', '', '', '', '', '', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `stock`
--

CREATE TABLE `stock` (
  `idbarang` int(11) NOT NULL,
  `namabarang` varchar(50) NOT NULL,
  `deskripsi` varchar(50) NOT NULL,
  `stock` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `stock`
--

INSERT INTO `stock` (`idbarang`, `namabarang`, `deskripsi`, `stock`) VALUES
(2, 'babycough', 'Tidak Konsinasi', 2),
(3, 'paramex sk', 'Konsinasi', 1),
(9, 'Pil Kb Andalan Biru', 'Tidak Konsinasi', 1),
(10, 'panadol', 'Tidak Konsinasi', 12),
(11, 'Esepuluh', 'Tidak Konsinasi', 60),
(12, 'Supertetra', 'Tidak Konsinasi', 10),
(15, 'Komix Obh', 'Tidak Konsinasi', 20),
(18, 'sangobion syr', 'Tidak Konsinasi', 20);

-- --------------------------------------------------------

--
-- Struktur dari tabel `ujicoba`
--

CREATE TABLE `ujicoba` (
  `id` int(11) NOT NULL,
  `nama_produk` varchar(255) NOT NULL,
  `frekuensi` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `ujicoba`
--

INSERT INTO `ujicoba` (`id`, `nama_produk`, `frekuensi`) VALUES
(1, 'Panadol', 4),
(2, 'Sangobion', 7),
(3, 'Paratusin', 3),
(4, 'Paracetamol', 9);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL,
  `role` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `role`) VALUES
(1, 'admin gudang', 'admingudang', 'admingudang'),
(2, 'adminorder', 'adminorder', 'adminorder'),
(3, 'manajer', 'manajer', 'manajer');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `keluar`
--
ALTER TABLE `keluar`
  ADD PRIMARY KEY (`idkeluar`);

--
-- Indeks untuk tabel `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`iduser`);

--
-- Indeks untuk tabel `masuk`
--
ALTER TABLE `masuk`
  ADD PRIMARY KEY (`idmasuk`);

--
-- Indeks untuk tabel `pesan`
--
ALTER TABLE `pesan`
  ADD PRIMARY KEY (`idpesan`);

--
-- Indeks untuk tabel `plan`
--
ALTER TABLE `plan`
  ADD PRIMARY KEY (`idplan`);

--
-- Indeks untuk tabel `stock`
--
ALTER TABLE `stock`
  ADD PRIMARY KEY (`idbarang`);

--
-- Indeks untuk tabel `ujicoba`
--
ALTER TABLE `ujicoba`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `keluar`
--
ALTER TABLE `keluar`
  MODIFY `idkeluar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `login`
--
ALTER TABLE `login`
  MODIFY `iduser` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `masuk`
--
ALTER TABLE `masuk`
  MODIFY `idmasuk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT untuk tabel `pesan`
--
ALTER TABLE `pesan`
  MODIFY `idpesan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=79;

--
-- AUTO_INCREMENT untuk tabel `plan`
--
ALTER TABLE `plan`
  MODIFY `idplan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT untuk tabel `stock`
--
ALTER TABLE `stock`
  MODIFY `idbarang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT untuk tabel `ujicoba`
--
ALTER TABLE `ujicoba`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
