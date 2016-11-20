-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Nov 19, 2016 at 11:19 PM
-- Server version: 10.1.9-MariaDB-log
-- PHP Version: 7.0.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `fox`
--

-- --------------------------------------------------------

--
-- Table structure for table `cari`
--

CREATE TABLE `cari` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `asal` text NOT NULL,
  `tujuan` text NOT NULL,
  `tanggal` date NOT NULL,
  `tiket` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` int(10) UNSIGNED NOT NULL,
  `pengguna_id` int(10) UNSIGNED NOT NULL,
  `pesawat_id` int(10) UNSIGNED NOT NULL,
  `status` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'aktif',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`id`, `pengguna_id`, `pesawat_id`, `status`, `created_at`, `updated_at`) VALUES
(14, 17, 4, 'mati', NULL, NULL),
(15, 17, 5, 'mati', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2016_11_18_150615_kucing', 1);

-- --------------------------------------------------------

--
-- Table structure for table `pembayaran`
--

CREATE TABLE `pembayaran` (
  `id` int(10) UNSIGNED NOT NULL,
  `pengguna_id` int(10) UNSIGNED NOT NULL,
  `formid` int(255) UNSIGNED NOT NULL,
  `tandabukti` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `total` decimal(18,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `pembayaran`
--

INSERT INTO `pembayaran` (`id`, `pengguna_id`, `formid`, `tandabukti`, `total`, `created_at`, `updated_at`) VALUES
(30, 17, 337725, 'buktipembayaran_51746961715136022_1363679500310122_448390171611717481_n.jpg', '8000000.00', '2016-11-19 20:40:21', '2016-11-19 20:40:21');

-- --------------------------------------------------------

--
-- Table structure for table `pembelian`
--

CREATE TABLE `pembelian` (
  `id` int(10) UNSIGNED NOT NULL,
  `pembayaran_id` int(10) UNSIGNED NOT NULL,
  `pesawat_id` int(10) UNSIGNED NOT NULL,
  `formid` int(255) UNSIGNED NOT NULL,
  `kode` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'menunggu',
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `pembelian`
--

INSERT INTO `pembelian` (`id`, `pembayaran_id`, `pesawat_id`, `formid`, `kode`, `status`, `created_at`, `updated_at`) VALUES
(14, 30, 4, 337725, 'ACB12DS', 'diterima', '2016-11-19 20:40:21', '2016-11-19 20:43:13'),
(15, 30, 5, 337725, NULL, 'menunggu', '2016-11-19 20:40:21', '2016-11-19 20:40:21');

-- --------------------------------------------------------

--
-- Table structure for table `pengguna`
--

CREATE TABLE `pengguna` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `email` varchar(50) NOT NULL,
  `alamat` text NOT NULL,
  `bank` varchar(255) NOT NULL,
  `no` varchar(255) NOT NULL,
  `level` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pengguna`
--

INSERT INTO `pengguna` (`id`, `nama`, `username`, `password`, `email`, `alamat`, `bank`, `no`, `level`) VALUES
(10, 'Yonatan Suhariyadi', 'admin', 'admin', 'yadiajah1@gmail.com', '', '', '2147483647', 'admin'),
(11, 'azharyuda', 'azhar', '123456', 'azharyuda17@gmail.com', '', '', '813224514', ''),
(12, 'Orang ke 3', 'orang3', '123456', 'org3@gmail.com', '', '', '12345676', ''),
(13, 'rega dafnur', 'rega123', '123456', 'rega@jing.com', '', '', '2147483647', ''),
(14, 'Ronny Irawan', 'ronny1', '123456', 'ronnyirawan@gmail.com', '', '', '82212545', ''),
(15, 'Yusri Fauzy', 'fauzy', '123456', 'fauzy@gmail.com', '', '', '1124584754', ''),
(16, 'yadinaz', 'yadinaz2', '123456', 'yadiajah1@gmail.com', 'jl.pinang seribu rt.40 no.77', '', '2147483647', ''),
(17, 'kucing', 'kucing1', '123456', 'kucing@kucing.com', 'yyuhhu', '123123123123', '2147483647', ''),
(18, 'kucing', 'kucing1', 'sadasdasd', 'kucing@kucing.com', 'yyuhhu', '', '081322266397', ''),
(19, 'dhemi', 'demi', '123456', 'demi@yahoo.com', 'pramuka 1', '', '0812445124457', '');

-- --------------------------------------------------------

--
-- Table structure for table `pesawat`
--

CREATE TABLE `pesawat` (
  `id` int(12) NOT NULL,
  `pesawat` varchar(255) NOT NULL,
  `jam` time NOT NULL,
  `tanggal` date NOT NULL,
  `tujuan` varchar(255) NOT NULL,
  `asal` varchar(255) NOT NULL,
  `harga` int(255) NOT NULL,
  `kuota` int(255) NOT NULL,
  `ambilkuota` int(255) NOT NULL DEFAULT '0',
  `status` varchar(255) NOT NULL DEFAULT 'Aktif'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pesawat`
--

INSERT INTO `pesawat` (`id`, `pesawat`, `jam`, `tanggal`, `tujuan`, `asal`, `harga`, `kuota`, `ambilkuota`, `status`) VALUES
(4, 'LION', '12:12:00', '2012-12-12', 'Kubar', 'samarinda', 4000000, 40, 2, 'Aktif'),
(5, 'LION 2', '12:12:00', '2012-12-12', 'Kubar', 'samarinda', 4000000, 40, 39, 'Aktif');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `username` varchar(30) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `nama`, `username`, `email`, `password`) VALUES
(14, 'Yonatan suahriyadi', '', 'yadiajah1@gmail.com', '123456'),
(15, 'Yonatan suahriyadi', '', 'yadiajah1@gmail.com', '123456'),
(16, 'Yonatan suahriyadi', '', 'yadiajah1@gmail.com', '123456'),
(17, 'Yonatan suahriyadi', '', 'yadiajah1@gmail.com', '123456'),
(18, 'yadiajah1', 'yadinaz44', 'yadi@yahoo.com', '123456');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cari`
--
ALTER TABLE `cari`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pembelian`
--
ALTER TABLE `pembelian`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pengguna`
--
ALTER TABLE `pengguna`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pesawat`
--
ALTER TABLE `pesawat`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cari`
--
ALTER TABLE `cari`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `pembayaran`
--
ALTER TABLE `pembayaran`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;
--
-- AUTO_INCREMENT for table `pembelian`
--
ALTER TABLE `pembelian`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `pengguna`
--
ALTER TABLE `pengguna`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT for table `pesawat`
--
ALTER TABLE `pesawat`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
