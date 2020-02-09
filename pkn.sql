-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 09 Feb 2020 pada 08.21
-- Versi server: 10.4.8-MariaDB
-- Versi PHP: 7.3.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pkn`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin_list`
--

CREATE TABLE `admin_list` (
  `id` int(11) NOT NULL,
  `nama_depan` tinytext NOT NULL,
  `nama_belakang` tinytext NOT NULL,
  `uid` tinytext NOT NULL,
  `email` tinytext NOT NULL,
  `password` longtext NOT NULL,
  `token` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `admin_list`
--

INSERT INTO `admin_list` (`id`, `nama_depan`, `nama_belakang`, `uid`, `email`, `password`, `token`) VALUES
(1, 'admin', 'admin', 'admin', 'akmaldzaky33@yahoo.com', '$2y$10$qfIEnDkih0kGypLPqUTHA.QR3efq3WVyFY.JWw6EzPaB3r7337HEq', '9b76756f63e64de1');

-- --------------------------------------------------------

--
-- Struktur dari tabel `agent_list`
--

CREATE TABLE `agent_list` (
  `id` int(11) NOT NULL,
  `nama_depan` tinytext NOT NULL,
  `nama_belakang` tinytext NOT NULL,
  `uid` tinytext NOT NULL,
  `email` tinytext NOT NULL,
  `password` longtext NOT NULL,
  `token` text NOT NULL,
  `point` int(11) NOT NULL,
  `phone` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `agent_list`
--

INSERT INTO `agent_list` (`id`, `nama_depan`, `nama_belakang`, `uid`, `email`, `password`, `token`, `point`, `phone`) VALUES
(1, 'agen', 'pertama', 'agen', 'akmaldzaky33@yahoo.com', '$2y$10$XMSaHZvUckcwlwr044C02eDasbGC.xQX.Ns.xM8MZs./pztxcd0jS', 'c545e2e3baa06058', 0, '082260743984');

-- --------------------------------------------------------

--
-- Struktur dari tabel `konfirmasi`
--

CREATE TABLE `konfirmasi` (
  `id` int(11) NOT NULL,
  `token_postingan` text NOT NULL,
  `nama` text NOT NULL,
  `email` tinytext NOT NULL,
  `phone` text NOT NULL,
  `pesan_user` text NOT NULL,
  `tanggal` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `konfirmasi2`
--

CREATE TABLE `konfirmasi2` (
  `id` int(11) NOT NULL,
  `token_postingan` text NOT NULL,
  `token_agent` text NOT NULL,
  `nama` text NOT NULL,
  `email` tinytext NOT NULL,
  `phone` text NOT NULL,
  `pesan_user` text NOT NULL,
  `date` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `konfirmasi2`
--

INSERT INTO `konfirmasi2` (`id`, `token_postingan`, `token_agent`, `nama`, `email`, `phone`, `pesan_user`, `date`) VALUES
(4, 'asd', 'asd', 'asd', 'asd', 'asd', 'asd', ''),
(5, 'RM316SW', 'c545e2e3baa06058', 'user pertama', 'akmaldzaky33@yahoo.com', '082260743984', 'asd', '02/20/2020');

-- --------------------------------------------------------

--
-- Struktur dari tabel `posting_list`
--

CREATE TABLE `posting_list` (
  `id` int(11) NOT NULL,
  `nama_property` text NOT NULL,
  `luas_tanah` int(11) NOT NULL,
  `luas_bangunan` int(11) NOT NULL,
  `jk_tidur` int(11) NOT NULL,
  `jk_mandi` int(11) NOT NULL,
  `daya_listrik` int(11) NOT NULL,
  `alamat` text NOT NULL,
  `harga` int(11) NOT NULL,
  `pesan` mediumtext NOT NULL,
  `kategori` text NOT NULL,
  `jenis` text NOT NULL,
  `token` text NOT NULL,
  `status` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `posting_list`
--

INSERT INTO `posting_list` (`id`, `nama_property`, `luas_tanah`, `luas_bangunan`, `jk_tidur`, `jk_mandi`, `daya_listrik`, `alamat`, `harga`, `pesan`, `kategori`, `jenis`, `token`, `status`) VALUES
(1, 'TEST UPDATE PROPERTY', 123, 123, 123, 123, 123, '123', 12313, '12313', 'Rumah', 'Sewa', 'RM316SW', 'terjual'),
(2, 'property 2', 10, 10, 10, 10, 10, 'bekasi', 123, 'asdwa', 'Apartemen', 'Keduanya', 'AP424JS', 'Terjual');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pwdreset`
--

CREATE TABLE `pwdreset` (
  `pwdResetId` int(11) NOT NULL,
  `pwdResetEmail` text NOT NULL,
  `pwdResetSelector` text NOT NULL,
  `pwdResetToken` longtext NOT NULL,
  `pwdResetExpires` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `terjual`
--

CREATE TABLE `terjual` (
  `id` int(11) NOT NULL,
  `token_postingan` text NOT NULL,
  `token_agen` text NOT NULL,
  `nama_pembeli` text NOT NULL,
  `contact_user` text NOT NULL,
  `tanggal terjual` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `terjual`
--

INSERT INTO `terjual` (`id`, `token_postingan`, `token_agen`, `nama_pembeli`, `contact_user`, `tanggal terjual`) VALUES
(4, 'RM316SW', 'c545e2e3baa06058', 'user pertama', '082260743984', '2020-02-08 03:00:09'),
(5, 'RM316SW', 'c545e2e3baa06058', 'user pertama', '082260743984', '2020-02-08 08:20:23'),
(6, 'AP424JS', 'c545e2e3baa06058', 'user pertama', '082260743984', '2020-02-08 08:31:16'),
(7, 'asd', 'asd', 'asd', 'asd', '2020-02-09 06:59:54');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_list`
--

CREATE TABLE `user_list` (
  `id` int(11) NOT NULL,
  `nama_depan` tinytext NOT NULL,
  `nama_belakang` tinytext NOT NULL,
  `uid` tinytext NOT NULL,
  `email` tinytext NOT NULL,
  `phone` text NOT NULL,
  `password` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user_list`
--

INSERT INTO `user_list` (`id`, `nama_depan`, `nama_belakang`, `uid`, `email`, `phone`, `password`) VALUES
(2, 'user', 'pertama', 'user', 'akmaldzaky33@yahoo.com', '082260743984', '$2y$10$yJA/9S86JUVl/lTS1jQyju1pa4orgbEDvEYlDNBuNtVSUBfCwgqoW');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `admin_list`
--
ALTER TABLE `admin_list`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `agent_list`
--
ALTER TABLE `agent_list`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `konfirmasi`
--
ALTER TABLE `konfirmasi`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `konfirmasi2`
--
ALTER TABLE `konfirmasi2`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `posting_list`
--
ALTER TABLE `posting_list`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `pwdreset`
--
ALTER TABLE `pwdreset`
  ADD PRIMARY KEY (`pwdResetId`);

--
-- Indeks untuk tabel `terjual`
--
ALTER TABLE `terjual`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user_list`
--
ALTER TABLE `user_list`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `admin_list`
--
ALTER TABLE `admin_list`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `agent_list`
--
ALTER TABLE `agent_list`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `konfirmasi`
--
ALTER TABLE `konfirmasi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `konfirmasi2`
--
ALTER TABLE `konfirmasi2`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `posting_list`
--
ALTER TABLE `posting_list`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `pwdreset`
--
ALTER TABLE `pwdreset`
  MODIFY `pwdResetId` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `terjual`
--
ALTER TABLE `terjual`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `user_list`
--
ALTER TABLE `user_list`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
