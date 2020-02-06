-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 06, 2020 at 09:55 AM
-- Server version: 10.1.39-MariaDB
-- PHP Version: 7.3.5

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
-- Table structure for table `admin_list`
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
-- Dumping data for table `admin_list`
--

INSERT INTO `admin_list` (`id`, `nama_depan`, `nama_belakang`, `uid`, `email`, `password`, `token`) VALUES
(1, 'admin', 'admin', 'admin', 'agushendriyawan@gmail.com', '$2y$10$8d4Hvv5nxFBjqe2IGcn/t.BqU2jzbi96g3QaGNKr3L0QC/q/QoM3O', 'dd9710601fe2be6e');

-- --------------------------------------------------------

--
-- Table structure for table `agent_list`
--

CREATE TABLE `agent_list` (
  `id` int(11) NOT NULL,
  `nama_depan` tinytext NOT NULL,
  `nama_belakang` tinytext NOT NULL,
  `uid` tinytext NOT NULL,
  `email` tinytext NOT NULL,
  `password` longtext NOT NULL,
  `token` text NOT NULL,
  `point` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `agent_list`
--

INSERT INTO `agent_list` (`id`, `nama_depan`, `nama_belakang`, `uid`, `email`, `password`, `token`, `point`) VALUES
(1, 'agus', 'hendri', 'as', 'a@gmail.com', '$2y$10$DCkrfKSuO9i.gQ9eh6nz1.sO7MxvouB2knzFwFmo7U3DICN8w1KP.', 'bc8e5f49904752c4', 0);

-- --------------------------------------------------------

--
-- Table structure for table `konfirmasi`
--

CREATE TABLE `konfirmasi` (
  `id` int(11) NOT NULL,
  `token_postingan` text NOT NULL,
  `pesan_user` text NOT NULL,
  `tanggal` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `konfirmasi`
--

INSERT INTO `konfirmasi` (`id`, `token_postingan`, `pesan_user`, `tanggal`) VALUES
(1, '2uu34', 'ketemuan', '2020-02-07');

-- --------------------------------------------------------

--
-- Table structure for table `konfirmasi2`
--

CREATE TABLE `konfirmasi2` (
  `id` int(11) NOT NULL,
  `token_postingan` text NOT NULL,
  `token_agent` text NOT NULL,
  `pesan_user` text NOT NULL,
  `tanggal` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `konfirmasi2`
--

INSERT INTO `konfirmasi2` (`id`, `token_postingan`, `token_agent`, `pesan_user`, `tanggal`) VALUES
(1, '234uu9', '33o99', '', '0000-00-00'),
(2, '2eeu7', '3uu8', 'ketemuan dimana', '2020-02-07');

-- --------------------------------------------------------

--
-- Table structure for table `posting_list`
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
  `gambar` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `posting_list`
--

INSERT INTO `posting_list` (`id`, `nama_property`, `luas_tanah`, `luas_bangunan`, `jk_tidur`, `jk_mandi`, `daya_listrik`, `alamat`, `harga`, `pesan`, `kategori`, `jenis`, `token`, `gambar`) VALUES
(1, 'aww', 1000, 500, 3, 1, 900, 'desa', 1200, 'aqeerrrr', 'Rumah', 'Jual', 'RM395JL', '');

-- --------------------------------------------------------

--
-- Table structure for table `pwdreset`
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
-- Table structure for table `uploud_admin`
--

CREATE TABLE `uploud_admin` (
  `id` int(11) NOT NULL,
  `Luas_tanah` int(11) NOT NULL,
  `Luas_bangunan` int(11) NOT NULL,
  `Kamar_tidur` int(11) NOT NULL,
  `Kamar_mandi` int(11) NOT NULL,
  `Daya_listrik` int(11) NOT NULL,
  `Address` varchar(11) NOT NULL,
  `foto` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `user_list`
--

CREATE TABLE `user_list` (
  `id` int(11) NOT NULL,
  `nama_depan` tinytext NOT NULL,
  `nama_belakang` tinytext NOT NULL,
  `uid` tinytext NOT NULL,
  `email` tinytext NOT NULL,
  `password` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_list`
--

INSERT INTO `user_list` (`id`, `nama_depan`, `nama_belakang`, `uid`, `email`, `password`) VALUES
(1, 'agus', 'ywan', 'ywan', 'y@gmail.com', '$2y$10$2IeDGNfYjfH2VTO7O7IBl.ZBDLkl23Q1iW4kpMQlyo6LY4D8KDzlG');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_list`
--
ALTER TABLE `admin_list`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `agent_list`
--
ALTER TABLE `agent_list`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `konfirmasi`
--
ALTER TABLE `konfirmasi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `konfirmasi2`
--
ALTER TABLE `konfirmasi2`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `posting_list`
--
ALTER TABLE `posting_list`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pwdreset`
--
ALTER TABLE `pwdreset`
  ADD PRIMARY KEY (`pwdResetId`);

--
-- Indexes for table `uploud_admin`
--
ALTER TABLE `uploud_admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_list`
--
ALTER TABLE `user_list`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_list`
--
ALTER TABLE `admin_list`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `agent_list`
--
ALTER TABLE `agent_list`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `konfirmasi`
--
ALTER TABLE `konfirmasi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `konfirmasi2`
--
ALTER TABLE `konfirmasi2`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `posting_list`
--
ALTER TABLE `posting_list`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `pwdreset`
--
ALTER TABLE `pwdreset`
  MODIFY `pwdResetId` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `uploud_admin`
--
ALTER TABLE `uploud_admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user_list`
--
ALTER TABLE `user_list`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
