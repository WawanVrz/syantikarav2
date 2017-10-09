-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: May 13, 2017 at 05:13 AM
-- Server version: 10.1.13-MariaDB
-- PHP Version: 7.0.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_syantikara`
--

-- --------------------------------------------------------

--
-- Table structure for table `additional`
--

CREATE TABLE `additional` (
  `id_additional` int(5) NOT NULL,
  `jenis_additional` varchar(100) NOT NULL,
  `id_jasa` int(5) NOT NULL,
  `harga` int(20) NOT NULL,
  `keterangan` text NOT NULL,
  `status` int(3) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `additional`
--

INSERT INTO `additional` (`id_additional`, `jenis_additional`, `id_jasa`, `harga`, `keterangan`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Snack', 2, 15000, 'Diberikan 1x / Orang', 1, '2017-04-01 11:25:07', '2017-04-01 11:47:22'),
(2, 'Makan Besar', 2, 30000, 'Diberikan 1x / Orang', 1, '2017-04-01 11:29:59', '2017-04-01 11:47:13'),
(3, 'LCD', 3, 200000, '/Hari', 1, '2017-04-01 11:31:08', '2017-04-01 11:31:08'),
(8, 'Ruang Doa', 3, 0, 'Free', 0, '2017-04-01 11:49:00', '2017-04-01 11:49:00'),
(9, 'Parkir Bus', 3, 50000, '/Hari', 1, '2017-04-21 15:17:18', '2017-04-30 18:00:37');

-- --------------------------------------------------------

--
-- Table structure for table `facilities`
--

CREATE TABLE `facilities` (
  `id_fasilitas` int(5) NOT NULL,
  `nama` varchar(200) NOT NULL,
  `keterangan` text NOT NULL,
  `image` varchar(200) NOT NULL,
  `status` int(5) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `facilities`
--

INSERT INTO `facilities` (`id_fasilitas`, `nama`, `keterangan`, `image`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Wifi', 'Free Wifi akses selama 24jam di lingkungan Syantikara, dan menggunakan akun pribadi anda.', 'Wi-Fi-961.png', 1, '2017-02-27 22:48:49', '2017-02-28 05:48:49'),
(2, 'Laundry', 'Jasa Laundry bagi anda yang menginap lama. Laundry 2x seminggu, dan di bayar pada waktu check out.', 'Washing_Machine-96.png', 1, '2017-02-27 22:50:57', '2017-02-28 05:50:57'),
(3, 'Customers Service', 'Nikmati fasilitas Bagian Informasi Syantikara. 24 Jam akses ke customer service.', 'Online_Support-961.png', 1, '2017-02-27 22:51:34', '2017-02-28 07:57:40'),
(4, 'Air Conditioner', 'Setiap ruangan dan kamar di Syantikara dilengkapi dengan AC agar anda tetap nyaman di kamar tersebut.', 'air-conditioner.png', 1, '2017-02-27 22:48:49', '2017-02-28 05:48:49'),
(5, 'Aula', 'RPCB Syantikara dilengkapi dengan ruang pertemuan atau aula yang dapat menampung hingga 200 orang.', 'bank.png', 1, '2017-02-27 22:50:57', '2017-02-28 05:50:57'),
(6, 'Dining Room', 'RPCB Syantikara juga menyediakan ruang makan yang bisa dipakai oleh tamu yang menginap du RPCB Syantikara.', 'dinner.png', 1, '2017-02-27 22:51:34', '2017-02-28 07:57:40');

-- --------------------------------------------------------

--
-- Table structure for table `gallery`
--

CREATE TABLE `gallery` (
  `id_gallery` int(5) NOT NULL,
  `nama` varchar(200) NOT NULL,
  `image` varchar(200) NOT NULL,
  `status` int(5) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `gallery`
--

INSERT INTO `gallery` (`id_gallery`, `nama`, `image`, `status`, `created_at`, `updated_at`) VALUES
(2, 'picture 2', '1.jpg', 1, '2017-02-28 05:48:06', '2017-02-28 12:48:06'),
(3, 'picture 4', '2.jpg', 1, '2017-02-28 06:04:14', '2017-02-28 13:06:49'),
(4, 'Syantikara', 'Syantikara.jpg', 1, '2017-02-28 06:04:14', '2017-02-28 13:06:49'),
(5, 'picture 2', '1.jpg', 1, '2017-02-28 05:48:06', '2017-02-28 12:48:06'),
(6, 'picture 4', '2.jpg', 1, '2017-02-28 06:04:14', '2017-02-28 13:06:49'),
(7, 'Syantikara', 'Syantikara.jpg', 1, '2017-02-28 06:04:14', '2017-02-28 13:06:49'),
(8, 'picture 4', '2.jpg', 1, '2017-02-28 06:04:14', '2017-02-28 13:06:49'),
(9, 'Syantikara', 'Syantikara.jpg', 1, '2017-02-28 06:04:14', '2017-02-28 13:06:49');

-- --------------------------------------------------------

--
-- Table structure for table `jasa`
--

CREATE TABLE `jasa` (
  `id_jasa` int(5) NOT NULL,
  `nama_jasa` varchar(200) NOT NULL,
  `keterangan` text NOT NULL,
  `status` int(5) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jasa`
--

INSERT INTO `jasa` (`id_jasa`, `nama_jasa`, `keterangan`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Akomodasi Dan Konstribusi', '-', 1, '2017-04-01 03:34:19', '2017-04-01 10:34:19'),
(2, 'Konsumsi', '-', 1, '2017-04-01 03:34:57', '2017-04-01 10:48:36'),
(3, 'Kontribusi Tempat', '-', 1, '2017-04-01 03:35:14', '2017-04-01 10:35:14'),
(4, 'Pembinaan', '-', 1, '2017-04-21 02:12:11', '2017-04-21 09:12:11');

-- --------------------------------------------------------

--
-- Table structure for table `jenis_tamu`
--

CREATE TABLE `jenis_tamu` (
  `id_jenistamu` int(5) NOT NULL,
  `jenistamu` varchar(100) NOT NULL,
  `id_jasa` int(5) NOT NULL,
  `keterangan` text NOT NULL,
  `status` int(3) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jenis_tamu`
--

INSERT INTO `jenis_tamu` (`id_jenistamu`, `jenistamu`, `id_jasa`, `keterangan`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Kelompok Umum', 1, '-', 1, '2016-11-22 08:31:58', '2016-11-22 08:31:58'),
(2, 'Kelompok CB, DPP, Piko (Retret)', 1, 'Untuk Retret', 1, '2016-11-22 08:32:39', '2016-11-22 08:32:39'),
(3, 'Kelompok CB,DPP,Piko (Weeken Suster CB)', 1, 'Untuk Weekend Suster CB', 1, '2016-11-22 08:33:25', '2016-11-22 08:33:25'),
(4, 'Yayasan Tarakanita', 1, '-', 1, '2016-11-22 08:33:47', '2016-11-22 08:33:47'),
(5, 'Tamu Dari Wisma MM UGM   ', 1, '-', 1, '2016-11-22 08:33:58', '2016-11-22 08:33:58'),
(6, 'Komisi - Komisi Dan KAS', 1, '-', 1, '2016-11-22 08:34:21', '2016-11-22 08:34:21'),
(7, 'Perguruan Tinggi ', 1, 'Kelompok Mahasiswa', 1, '2016-11-22 08:34:45', '2016-11-22 08:34:45'),
(8, 'SMA / SMP', 1, '-', 1, '2016-11-22 08:34:59', '2016-11-22 08:34:59'),
(9, 'SD', 1, '-', 1, '2016-11-22 08:35:13', '2016-11-22 08:35:13'),
(10, 'Panti Asuhan', 1, '-', 1, '2016-11-22 08:35:35', '2016-11-22 08:35:35'),
(11, 'Tamu yang transit', 1, 'Tamu yang transit untuk mandi & sarapan pagi', 1, '2016-11-22 09:12:19', '2016-11-22 09:12:19'),
(12, 'Kelompok Umum (Menginap Saja 1)', 1, 'Tamu Yang Menginap Saja', 1, '2017-03-30 10:57:27', '2017-03-30 10:57:27'),
(13, 'Tamu Tanpa Menginap', 1, '-', 1, '2017-04-07 14:01:59', '2017-04-07 14:01:59');

-- --------------------------------------------------------

--
-- Table structure for table `jenis_tarif`
--

CREATE TABLE `jenis_tarif` (
  `id_jenistarif` int(5) NOT NULL,
  `jenistarif` varchar(100) NOT NULL,
  `keterangan` text NOT NULL,
  `status` int(3) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jenis_tarif`
--

INSERT INTO `jenis_tarif` (`id_jenistarif`, `jenistarif`, `keterangan`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Reguler', '-', 1, '2016-11-22 09:07:07', '2016-11-22 09:07:07'),
(2, 'VIP', '-', 1, '2016-11-22 09:07:26', '2016-11-22 09:07:26');

-- --------------------------------------------------------

--
-- Table structure for table `kamar`
--

CREATE TABLE `kamar` (
  `id_kamar` int(5) NOT NULL,
  `id_ruang` int(5) NOT NULL,
  `nama_kamar` varchar(100) NOT NULL,
  `kapasitas_kamar` int(5) NOT NULL,
  `keterangan` text NOT NULL,
  `status` int(3) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kamar`
--

INSERT INTO `kamar` (`id_kamar`, `id_ruang`, `nama_kamar`, `kapasitas_kamar`, `keterangan`, `status`, `created_at`, `updated_at`) VALUES
(1, 3, 'Kamar 2', 2, '1 kamar 1 ruang konsultasi', 1, '2016-12-01 14:15:53', '2016-12-01 14:15:53'),
(2, 3, 'Kamar 1', 2, '1 kamar 1 ruang konsultasi', 1, '2016-12-01 14:16:51', '2016-12-01 14:16:51'),
(3, 4, 'Kamar 6', 3, '1 kamar diisi 2-3 orang', 1, '2016-12-01 14:17:54', '2016-12-01 14:17:54'),
(4, 4, 'Kamar 5', 3, '1 kamar diisi 2-3 orang', 1, '2016-12-01 14:18:53', '2016-12-01 14:18:53'),
(5, 4, 'Kamar 4', 3, '1 kamar diisi 2-3 orang', 1, '2016-12-01 14:19:13', '2016-12-01 14:19:13'),
(6, 4, 'Kamar 3', 3, '1 kamar diisi 2-3 orang', 1, '2016-12-01 14:19:47', '2016-12-01 14:19:47'),
(7, 4, 'Kamar 2', 3, '1 kamar diisi 2-3 orang', 1, '2016-12-01 14:20:10', '2016-12-01 14:20:10'),
(8, 4, 'Kamar 1', 3, '1 kamar diisi 2-3 orang', 1, '2016-12-01 14:20:28', '2016-12-01 14:20:28'),
(9, 5, 'Kamar 7', 2, '1 kamar diisi 1-2 orang | kamar mandi dalam', 1, '2016-12-01 14:21:48', '2016-12-01 14:22:31'),
(10, 5, 'Kamar 6', 3, '1 kamar diisi 2-3 orang', 1, '2016-12-01 14:22:55', '2016-12-01 14:22:55'),
(11, 5, 'Kamar 5', 3, '1 kamar diisi 2-3 orang', 1, '2016-12-01 14:23:24', '2016-12-01 14:23:24'),
(12, 5, 'Kamar 4', 3, '1 kamar diisi 2-3 orang', 1, '2016-12-01 14:23:42', '2016-12-01 14:23:42'),
(13, 5, 'Kamar 3', 3, '1 kamar diisi 2-3 orang', 1, '2016-12-01 14:24:00', '2016-12-01 14:24:00'),
(14, 5, 'Kamar 2', 3, '1 kamar diisi 2-3 orang', 1, '2016-12-01 14:24:32', '2016-12-01 14:24:32'),
(15, 5, 'Kamar 1', 3, '1 kamar diisi 2-3 orang', 1, '2016-12-01 14:24:50', '2016-12-01 14:24:50'),
(16, 6, 'Kamar 7', 2, '1 kamar diisi 1-2 orang | kamar mandi dalam', 1, '2016-12-01 14:51:44', '2016-12-01 14:51:44'),
(17, 6, 'Kamar 6', 3, '1 kamar diisi 2-3 orang', 1, '2016-12-01 14:52:16', '2016-12-01 14:52:16'),
(18, 6, 'Kamar 5', 3, '1 kamar diisi 2-3 orang', 1, '2016-12-01 14:52:33', '2016-12-01 14:52:33'),
(19, 6, 'Kamar 4', 3, '1 kamar diisi 2-3 orang', 1, '2016-12-01 14:53:03', '2016-12-01 14:53:03'),
(20, 6, 'Kamar 3', 3, '1 kamar diisi 2-3 orang', 1, '2016-12-01 14:53:26', '2016-12-01 14:53:26'),
(21, 6, 'Kamar 2', 3, '1 kamar diisi 2-3 orang', 1, '2016-12-01 14:53:43', '2016-12-01 14:53:43'),
(22, 6, 'Kamar 1', 3, '1 kamar diisi 2-3 orang', 1, '2016-12-01 14:53:58', '2016-12-01 14:53:58'),
(23, 7, 'Kamar 12', 3, '1 kamar diisi 2-3 orang', 1, '2016-12-01 14:54:59', '2016-12-01 14:54:59'),
(24, 7, 'Kamar 11', 3, '1 kamar diisi 2-3 orang', 1, '2016-12-01 14:55:21', '2016-12-01 14:55:21'),
(25, 7, 'Kamar 10', 3, '1 kamar diisi 2-3 orang', 1, '2016-12-01 14:55:46', '2016-12-01 14:55:46'),
(26, 7, 'Kamar 9', 3, '1 kamar diisi 2-3 orang', 1, '2016-12-01 14:56:05', '2016-12-01 14:56:05'),
(27, 7, 'Kamar 8', 3, '1 kamar diisi 2-3 orang', 1, '2016-12-01 14:56:31', '2016-12-01 14:56:31'),
(28, 7, 'Kamar 7', 3, '1 kamar diisi 2-3 orang', 1, '2016-12-01 14:56:48', '2016-12-01 14:56:48'),
(29, 7, 'Kamar 6', 3, '1 kamar diisi 2-3 orang', 1, '2016-12-01 14:57:12', '2016-12-01 14:57:12'),
(30, 7, 'Kamar 5', 3, '1 kamar diisi 2-3 orang', 1, '2016-12-01 14:57:31', '2016-12-01 14:57:31'),
(31, 7, 'Kamar 4', 3, '1 kamar diisi 2-3 orang', 1, '2016-12-01 14:57:53', '2016-12-01 14:57:53'),
(32, 7, 'Kamar 3', 3, '1 kamar diisi 2-3 orang', 1, '2016-12-01 14:58:20', '2016-12-01 14:58:20'),
(33, 7, 'Kamar 2', 3, '1 kamar diisi 2-3 orang', 1, '2016-12-01 14:58:35', '2016-12-01 14:58:35'),
(34, 7, 'Kamar 1', 3, '1 kamar diisi 2-3 orang', 1, '2016-12-01 14:58:51', '2016-12-01 14:58:51'),
(35, 8, 'Kamar 8', 3, '1 kamar diisi 2-3 orang', 1, '2016-12-01 14:59:56', '2016-12-01 14:59:56'),
(36, 8, 'Kamar 7', 3, '1 kamar diisi 2-3 orang', 1, '2016-12-01 15:00:14', '2016-12-01 15:00:14'),
(37, 8, 'Kamar 6', 3, '1 kamar diisi 2-3 orang', 1, '2016-12-01 15:00:32', '2016-12-01 15:00:32'),
(38, 8, 'Kamar 5', 3, '1 kamar diisi 2-3 orang', 1, '2016-12-01 15:00:51', '2016-12-01 15:00:51'),
(39, 8, 'Kamar 4', 3, '1 kamar diisi 2-3 orang', 1, '2016-12-01 15:01:06', '2016-12-01 15:01:06'),
(40, 8, 'Kamar 3', 3, '1 kamar diisi 2-3 orang', 1, '2016-12-01 15:01:24', '2016-12-01 15:01:24'),
(41, 8, 'Kamar 2', 3, '1 kamar diisi 2-3 orang', 1, '2016-12-01 15:01:51', '2016-12-01 15:01:51'),
(42, 8, 'Kamar 1', 3, '1 kamar diisi 2-3 orang', 1, '2016-12-01 15:02:20', '2016-12-01 15:02:20'),
(43, 9, 'Kamar 8', 3, '1 kamar diisi 2-3 orang', 1, '2016-12-01 15:03:59', '2016-12-01 15:03:59'),
(44, 9, 'Kamar 7', 3, '1 kamar diisi 2-3 orang', 1, '2016-12-01 15:04:19', '2016-12-01 15:04:19'),
(45, 9, 'Kamar 6', 3, '1 kamar diisi 2-3 orang', 1, '2016-12-01 15:04:38', '2016-12-01 15:04:38'),
(46, 9, 'Kamar 5', 3, '1 kamar diisi 2-3 orang', 1, '2016-12-01 15:04:52', '2016-12-01 15:04:52'),
(47, 9, 'Kamar 4', 3, '1 kamar diisi 2-3 orang', 1, '2016-12-01 15:05:10', '2016-12-01 15:05:10'),
(48, 9, 'Kamar 3', 3, '1 kamar diisi 2-3 orang', 1, '2016-12-01 15:05:33', '2016-12-01 15:05:33'),
(49, 9, 'Kamar 2', 3, '1 kamar diisi 2-3 orang', 1, '2016-12-01 15:05:49', '2016-12-01 15:05:49'),
(50, 9, 'Kamar 1', 3, '1 kamar diisi 2-3 orang', 1, '2016-12-01 15:06:10', '2016-12-01 15:06:10'),
(51, 10, 'Kamar 8', 3, '1 kamar diisi 2-3 orang', 1, '2016-12-01 15:06:50', '2016-12-01 15:06:50'),
(52, 10, 'Kamar 7', 3, '1 kamar diisi 2-3 orang', 1, '2016-12-01 15:07:05', '2016-12-01 15:07:05'),
(53, 10, 'Kamar 6', 3, '1 kamar diisi 2-3 orang', 1, '2016-12-01 15:07:28', '2016-12-01 15:07:28'),
(54, 10, 'Kamar 5', 3, '1 kamar diisi 2-3 orang', 1, '2016-12-01 15:08:04', '2016-12-01 15:08:04'),
(55, 10, 'Kamar 4', 3, '1 kamar diisi 2-3 orang', 1, '2016-12-01 15:08:21', '2016-12-01 15:08:21'),
(56, 10, 'Kamar 3', 3, '1 kamar diisi 2-3 orang', 1, '2016-12-01 15:08:37', '2016-12-01 15:08:37'),
(57, 10, 'Kamar 2', 3, '1 kamar diisi 2-3 orang', 1, '2016-12-01 15:09:16', '2016-12-01 15:09:31'),
(58, 10, 'Kamar 1', 3, '1 kamar diisi 2-3 orang', 1, '2016-12-01 15:09:50', '2016-12-01 15:09:50'),
(59, 11, 'Kamar 8', 3, '1 kamar diisi 2-3 orang', 1, '2016-12-01 15:10:25', '2016-12-01 15:10:25'),
(60, 11, 'Kamar 7', 3, '1 kamar diisi 2-3 orang', 1, '2016-12-01 15:10:44', '2016-12-01 15:10:44'),
(61, 11, 'Kamar 6', 3, '1 kamar diisi 2-3 orang', 1, '2016-12-01 15:11:06', '2016-12-01 15:11:06'),
(62, 11, 'Kamar 5', 3, '1 kamar diisi 2-3 orang', 1, '2016-12-01 15:11:20', '2016-12-01 15:11:20'),
(63, 11, 'Kamar 4', 3, '1 kamar diisi 2-3 orang', 1, '2016-12-01 15:11:47', '2016-12-01 15:11:47'),
(64, 11, 'Kamar 3', 3, '1 kamar diisi 2-3 orang', 1, '2016-12-01 15:12:04', '2016-12-01 15:12:04'),
(65, 11, 'Kamar 2', 3, '1 kamar diisi 2-3 orang', 1, '2016-12-01 15:12:30', '2016-12-01 15:12:30'),
(66, 11, 'Kamar 1', 3, '1 kamar diisi 2-3 orang', 1, '2016-12-01 15:12:48', '2016-12-01 15:12:48'),
(67, 12, 'Kamar 13', 2, '1 kamar diisi 1-2 orang', 1, '2016-12-01 15:14:40', '2016-12-01 15:14:40'),
(68, 12, 'Kamar 12', 2, '1 kamar diisi 1-2 orang', 1, '2016-12-01 15:14:55', '2016-12-01 15:14:55'),
(69, 12, 'Kamar 11', 2, '1 kamar diisi 1-2 orang', 1, '2016-12-01 15:15:15', '2016-12-01 15:15:15'),
(70, 12, 'Kamar 10', 2, '1 kamar diisi 1-2 orang', 1, '2016-12-01 15:15:36', '2016-12-01 15:15:52'),
(71, 12, 'Kamar 9', 2, '1 kamar diisi 1-2 orang', 1, '2016-12-01 15:16:15', '2016-12-01 15:16:15'),
(72, 12, 'Kamar 8', 2, '1 kamar diisi 1-2 orang', 1, '2016-12-01 15:16:34', '2016-12-01 15:16:34'),
(73, 12, 'Kamar 7', 2, '1 kamar diisi 1-2 orang', 1, '2016-12-01 15:17:09', '2016-12-01 15:17:09'),
(74, 12, 'Kamar 6', 2, '1 kamar diisi 1-2 orang', 1, '2016-12-01 15:17:23', '2016-12-01 15:17:23'),
(75, 12, 'Kamar 5', 2, '1 kamar diisi 1-2 orang', 1, '2016-12-01 15:17:39', '2016-12-01 15:17:39'),
(76, 12, 'Kamar 4', 2, '1 kamar diisi 1-2 orang', 1, '2016-12-01 15:18:08', '2016-12-01 15:18:08'),
(77, 12, 'Kamar 3', 2, '1 kamar diisi 1-2 orang', 1, '2016-12-01 15:18:26', '2016-12-01 15:18:26'),
(78, 12, 'Kamar 2', 2, '1 kamar diisi 1-2 orang', 1, '2016-12-01 15:18:38', '2016-12-01 15:18:38'),
(79, 12, 'Kamar 1', 2, '1 kamar diisi 1-2 orang', 1, '2016-12-01 15:18:53', '2016-12-01 15:18:53'),
(80, 14, 'Ruang Makan Besar', 150, '-', 0, '2017-03-30 10:42:22', '2017-03-30 10:42:22'),
(81, 14, 'Ruang Makan Kecil', 50, '-', 0, '2017-04-01 13:42:46', '2017-04-03 09:31:52');

-- --------------------------------------------------------

--
-- Table structure for table `master_city`
--

CREATE TABLE `master_city` (
  `id` int(10) NOT NULL,
  `name` varchar(30) DEFAULT NULL,
  `master_province_id` int(10) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `master_city`
--

INSERT INTO `master_city` (`id`, `name`, `master_province_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Kabupaten Aceh Barat', 1, '2016-07-12 09:13:23', '0000-00-00 00:00:00', NULL),
(2, 'Kabupaten Aceh Barat Daya', 1, '2016-07-12 09:13:23', '0000-00-00 00:00:00', NULL),
(3, 'Kabupaten Aceh Besar', 1, '2016-07-12 09:13:23', '0000-00-00 00:00:00', NULL),
(4, 'Kabupaten Aceh Jaya', 1, '2016-07-12 09:13:23', '0000-00-00 00:00:00', NULL),
(5, 'Kabupaten Aceh Selatan', 1, '2016-07-12 09:13:23', '0000-00-00 00:00:00', NULL),
(6, 'Kabupaten Aceh Singkil', 1, '2016-07-12 09:13:23', '0000-00-00 00:00:00', NULL),
(7, 'Kabupaten Aceh Tamiang', 1, '2016-07-12 09:13:23', '0000-00-00 00:00:00', NULL),
(8, 'Kabupaten Aceh Tengah', 1, '2016-07-12 09:13:23', '0000-00-00 00:00:00', NULL),
(9, 'Kabupaten Aceh Tenggara', 1, '2016-07-12 09:13:23', '0000-00-00 00:00:00', NULL),
(10, 'Kabupaten Aceh Timur', 1, '2016-07-12 09:13:23', '0000-00-00 00:00:00', NULL),
(11, 'Kabupaten Aceh Utara', 1, '2016-07-12 09:13:23', '0000-00-00 00:00:00', NULL),
(12, 'Kabupaten Bener Meriah', 1, '2016-07-12 09:13:23', '0000-00-00 00:00:00', NULL),
(13, 'Kabupaten Bireuen', 1, '2016-07-12 09:13:23', '0000-00-00 00:00:00', NULL),
(14, 'Kabupaten Gayo Luwes', 1, '2016-07-12 09:13:23', '0000-00-00 00:00:00', NULL),
(15, 'Kabupaten Nagan Raya', 1, '2016-07-12 09:13:23', '0000-00-00 00:00:00', NULL),
(16, 'Kabupaten Pidie', 1, '2016-07-12 09:13:23', '0000-00-00 00:00:00', NULL),
(17, 'Kabupaten Pidie Jaya', 1, '2016-07-12 09:13:23', '0000-00-00 00:00:00', NULL),
(18, 'Kabupaten Simeulue', 1, '2016-07-12 09:13:23', '0000-00-00 00:00:00', NULL),
(19, 'Kota Banda Aceh', 1, '2016-07-12 09:13:23', '0000-00-00 00:00:00', NULL),
(20, 'Kota Langsa', 1, '2016-07-12 09:13:23', '0000-00-00 00:00:00', NULL),
(21, 'Kota Lhokseumawe', 1, '2016-07-12 09:13:23', '0000-00-00 00:00:00', NULL),
(22, 'Kota Sabang', 1, '2016-07-12 09:13:23', '0000-00-00 00:00:00', NULL),
(23, 'Kota Subulussalam', 1, '2016-07-12 09:13:23', '0000-00-00 00:00:00', NULL),
(24, 'Kabupaten Asahan', 2, '2016-07-12 09:13:23', '0000-00-00 00:00:00', NULL),
(25, 'Kabupaten Batubara', 2, '2016-07-12 09:13:23', '0000-00-00 00:00:00', NULL),
(26, 'Kabupaten Dairi', 2, '2016-07-12 09:13:23', '0000-00-00 00:00:00', NULL),
(27, 'Kabupaten Deli Serdang', 2, '2016-07-12 09:13:23', '0000-00-00 00:00:00', NULL),
(28, 'Kabupaten Humbang Hasundutan', 2, '2016-07-12 09:13:23', '0000-00-00 00:00:00', NULL),
(29, 'Kabupaten Karo', 2, '2016-07-12 09:13:23', '0000-00-00 00:00:00', NULL),
(30, 'Kabupaten Labuhan Batu', 2, '2016-07-12 09:13:23', '0000-00-00 00:00:00', NULL),
(31, 'Kabupaten Labuhanbatu Selatan', 2, '2016-07-12 09:13:23', '0000-00-00 00:00:00', NULL),
(32, 'Kabupaten Labuhanbatu Utara', 2, '2016-07-12 09:13:23', '0000-00-00 00:00:00', NULL),
(33, 'Kabupaten Langkat', 2, '2016-07-12 09:13:23', '0000-00-00 00:00:00', NULL),
(34, 'Kabupaten Mandailing Natal', 2, '2016-07-12 09:13:23', '0000-00-00 00:00:00', NULL),
(35, 'Kabupaten Nias', 2, '2016-07-12 09:13:23', '0000-00-00 00:00:00', NULL),
(36, 'Kabupaten Nias Barat', 2, '2016-07-12 09:13:23', '0000-00-00 00:00:00', NULL),
(37, 'Kabupaten Nias Selatan', 2, '2016-07-12 09:13:23', '0000-00-00 00:00:00', NULL),
(38, 'Kabupaten Nias Utara', 2, '2016-07-12 09:13:23', '0000-00-00 00:00:00', NULL),
(39, 'Kabupaten Padang Lawas', 2, '2016-07-12 09:13:23', '0000-00-00 00:00:00', NULL),
(40, 'Kabupaten Padang Lawas Utara', 2, '2016-07-12 09:13:23', '0000-00-00 00:00:00', NULL),
(41, 'Kabupaten Pakpak Barat', 2, '2016-07-12 09:13:23', '0000-00-00 00:00:00', NULL),
(42, 'Kabupaten Samosir', 2, '2016-07-12 09:13:23', '0000-00-00 00:00:00', NULL),
(43, 'Kabupaten Serdang Bedagai', 2, '2016-07-12 09:13:23', '0000-00-00 00:00:00', NULL),
(44, 'Kabupaten Simalungun', 2, '2016-07-12 09:13:23', '0000-00-00 00:00:00', NULL),
(45, 'Kabupaten Tapanuli Selatan', 2, '2016-07-12 09:13:23', '0000-00-00 00:00:00', NULL),
(46, 'Kabupaten Tapanuli Tengah', 2, '2016-07-12 09:13:23', '0000-00-00 00:00:00', NULL),
(47, 'Kabupaten Tapanuli Utara', 2, '2016-07-12 09:13:23', '0000-00-00 00:00:00', NULL),
(48, 'Kabupaten Toba Samosir', 2, '2016-07-12 09:13:23', '0000-00-00 00:00:00', NULL),
(49, 'Kota Binjai', 2, '2016-07-12 09:13:23', '0000-00-00 00:00:00', NULL),
(50, 'Kota Gunung Sitoli', 2, '2016-07-12 09:13:23', '0000-00-00 00:00:00', NULL),
(51, 'Kota Medan', 2, '2016-07-12 09:13:23', '0000-00-00 00:00:00', NULL),
(52, 'Kota Padangsidempuan', 2, '2016-07-12 09:13:23', '0000-00-00 00:00:00', NULL),
(53, 'Kota Pematang Siantar', 2, '2016-07-12 09:13:23', '0000-00-00 00:00:00', NULL),
(54, 'Kota Sibolga', 2, '2016-07-12 09:13:23', '0000-00-00 00:00:00', NULL),
(55, 'Kota Tanjung Balai', 2, '2016-07-12 09:13:23', '0000-00-00 00:00:00', NULL),
(56, 'Kota Tebing Tinggi', 2, '2016-07-12 09:13:23', '0000-00-00 00:00:00', NULL),
(57, 'Kabupaten Agam', 3, '2016-07-12 09:13:23', '0000-00-00 00:00:00', NULL),
(58, 'Kabupaten Dharmas Raya', 3, '2016-07-12 09:13:23', '0000-00-00 00:00:00', NULL),
(59, 'Kabupaten Kepulauan Mentawai', 3, '2016-07-12 09:13:23', '0000-00-00 00:00:00', NULL),
(60, 'Kabupaten Lima Puluh Kota', 3, '2016-07-12 09:13:23', '0000-00-00 00:00:00', NULL),
(61, 'Kabupaten Padang Pariaman', 3, '2016-07-12 09:13:23', '0000-00-00 00:00:00', NULL),
(62, 'Kabupaten Pasaman', 3, '2016-07-12 09:13:23', '0000-00-00 00:00:00', NULL),
(63, 'Kabupaten Pasaman Barat', 3, '2016-07-12 09:13:23', '0000-00-00 00:00:00', NULL),
(64, 'Kabupaten Pesisir Selatan', 3, '2016-07-12 09:13:23', '0000-00-00 00:00:00', NULL),
(65, 'Kabupaten Sijunjung', 3, '2016-07-12 09:13:23', '0000-00-00 00:00:00', NULL),
(66, 'Kabupaten Solok', 3, '2016-07-12 09:13:23', '0000-00-00 00:00:00', NULL),
(67, 'Kabupaten Solok Selatan', 3, '2016-07-12 09:13:23', '0000-00-00 00:00:00', NULL),
(68, 'Kabupaten Tanah Datar', 3, '2016-07-12 09:13:23', '0000-00-00 00:00:00', NULL),
(69, 'Kota Bukittinggi', 3, '2016-07-12 09:13:23', '0000-00-00 00:00:00', NULL),
(70, 'Kota Padang', 3, '2016-07-12 09:13:23', '0000-00-00 00:00:00', NULL),
(71, 'Kota Padang Panjang', 3, '2016-07-12 09:13:23', '0000-00-00 00:00:00', NULL),
(72, 'Kota Pariaman', 3, '2016-07-12 09:13:23', '0000-00-00 00:00:00', NULL),
(73, 'Kota Payakumbuh', 3, '2016-07-12 09:13:23', '0000-00-00 00:00:00', NULL),
(74, 'Kota Sawah Lunto', 3, '2016-07-12 09:13:23', '0000-00-00 00:00:00', NULL),
(75, 'Kota Solok', 3, '2016-07-12 09:13:23', '0000-00-00 00:00:00', NULL),
(76, 'Kabupaten Bengkalis', 4, '2016-07-12 09:13:23', '0000-00-00 00:00:00', NULL),
(77, 'Kabupaten Indragiri Hilir', 4, '2016-07-12 09:13:23', '0000-00-00 00:00:00', NULL),
(78, 'Kabupaten Indragiri Hulu', 4, '2016-07-12 09:13:23', '0000-00-00 00:00:00', NULL),
(79, 'Kabupaten Kampar', 4, '2016-07-12 09:13:23', '0000-00-00 00:00:00', NULL),
(80, 'Kabupaten Kuantan Singingi', 4, '2016-07-12 09:13:23', '0000-00-00 00:00:00', NULL),
(81, 'Kabupaten Meranti', 4, '2016-07-12 09:13:23', '0000-00-00 00:00:00', NULL),
(82, 'Kabupaten Pelalawan', 4, '2016-07-12 09:13:23', '0000-00-00 00:00:00', NULL),
(83, 'Kabupaten Rokan Hilir', 4, '2016-07-12 09:13:23', '0000-00-00 00:00:00', NULL),
(84, 'Kabupaten Rokan Hulu', 4, '2016-07-12 09:13:23', '0000-00-00 00:00:00', NULL),
(85, 'Kabupaten Siak', 4, '2016-07-12 09:13:23', '0000-00-00 00:00:00', NULL),
(86, 'Kota Dumai', 4, '2016-07-12 09:13:23', '0000-00-00 00:00:00', NULL),
(87, 'Kota Pekanbaru', 4, '2016-07-12 09:13:23', '0000-00-00 00:00:00', NULL),
(88, 'Kabupaten Bintan', 5, '2016-07-12 09:13:23', '0000-00-00 00:00:00', NULL),
(89, 'Kabupaten Karimun', 5, '2016-07-12 09:13:23', '0000-00-00 00:00:00', NULL),
(90, 'Kabupaten Kepulauan Anambas', 5, '2016-07-12 09:13:23', '0000-00-00 00:00:00', NULL),
(91, 'Kabupaten Lingga', 5, '2016-07-12 09:13:23', '0000-00-00 00:00:00', NULL),
(92, 'Kabupaten Natuna', 5, '2016-07-12 09:13:23', '0000-00-00 00:00:00', NULL),
(93, 'Kota Batam', 5, '2016-07-12 09:13:23', '0000-00-00 00:00:00', NULL),
(94, 'Kota Tanjung Pinang', 5, '2016-07-12 09:13:23', '0000-00-00 00:00:00', NULL),
(95, 'Kabupaten Bangka', 6, '2016-07-12 09:13:23', '0000-00-00 00:00:00', NULL),
(96, 'Kabupaten Bangka Barat', 6, '2016-07-12 09:13:23', '0000-00-00 00:00:00', NULL),
(97, 'Kabupaten Bangka Selatan', 6, '2016-07-12 09:13:23', '0000-00-00 00:00:00', NULL),
(98, 'Kabupaten Bangka Tengah', 6, '2016-07-12 09:13:23', '0000-00-00 00:00:00', NULL),
(99, 'Kabupaten Belitung', 6, '2016-07-12 09:13:23', '0000-00-00 00:00:00', NULL),
(100, 'Kabupaten Belitung Timur', 6, '2016-07-12 09:13:23', '0000-00-00 00:00:00', NULL),
(101, 'Kota Pangkal Pinang', 6, '2016-07-12 09:13:23', '0000-00-00 00:00:00', NULL),
(102, 'Kabupaten Kerinci', 7, '2016-07-12 09:13:23', '0000-00-00 00:00:00', NULL),
(103, 'Kabupaten Merangin', 7, '2016-07-12 09:13:23', '0000-00-00 00:00:00', NULL),
(104, 'Kabupaten Sarolangun', 7, '2016-07-12 09:13:23', '0000-00-00 00:00:00', NULL),
(105, 'Kabupaten Batang Hari', 7, '2016-07-12 09:13:23', '0000-00-00 00:00:00', NULL),
(106, 'Kabupaten Muaro Jambi', 7, '2016-07-12 09:13:23', '0000-00-00 00:00:00', NULL),
(107, 'Kabupaten Tanjung Jabung Timur', 7, '2016-07-12 09:13:23', '0000-00-00 00:00:00', NULL),
(108, 'Kabupaten Tanjung Jabung Barat', 7, '2016-07-12 09:13:23', '0000-00-00 00:00:00', NULL),
(109, 'Kabupaten Tebo', 7, '2016-07-12 09:13:23', '0000-00-00 00:00:00', NULL),
(110, 'Kabupaten Bungo', 7, '2016-07-12 09:13:23', '0000-00-00 00:00:00', NULL),
(111, 'Kota Jambi', 7, '2016-07-12 09:13:23', '0000-00-00 00:00:00', NULL),
(112, 'Kota Sungai Penuh', 7, '2016-07-12 09:13:23', '0000-00-00 00:00:00', NULL),
(113, 'Kabupaten Bengkulu Selatan', 8, '2016-07-12 09:13:23', '0000-00-00 00:00:00', NULL),
(114, 'Kabupaten Bengkulu Tengah', 8, '2016-07-12 09:13:23', '0000-00-00 00:00:00', NULL),
(115, 'Kabupaten Bengkulu Utara', 8, '2016-07-12 09:13:23', '0000-00-00 00:00:00', NULL),
(116, 'Kabupaten Kaur', 8, '2016-07-12 09:13:23', '0000-00-00 00:00:00', NULL),
(117, 'Kabupaten Kepahiang', 8, '2016-07-12 09:13:23', '0000-00-00 00:00:00', NULL),
(118, 'Kabupaten Lebong', 8, '2016-07-12 09:13:23', '0000-00-00 00:00:00', NULL),
(119, 'Kabupaten Mukomuko', 8, '2016-07-12 09:13:23', '0000-00-00 00:00:00', NULL),
(120, 'Kabupaten Rejang Lebong', 8, '2016-07-12 09:13:23', '0000-00-00 00:00:00', NULL),
(121, 'Kabupaten Seluma', 8, '2016-07-12 09:13:23', '0000-00-00 00:00:00', NULL),
(122, 'Kota Bengkulu', 8, '2016-07-12 09:13:23', '0000-00-00 00:00:00', NULL),
(123, 'Kabupaten Banyuasin', 9, '2016-07-12 09:13:23', '0000-00-00 00:00:00', NULL),
(124, 'Kabupaten Empat Lawang', 9, '2016-07-12 09:13:23', '0000-00-00 00:00:00', NULL),
(125, 'Kabupaten Lahat', 9, '2016-07-12 09:13:23', '0000-00-00 00:00:00', NULL),
(126, 'Kabupaten Muara Enim', 9, '2016-07-12 09:13:23', '0000-00-00 00:00:00', NULL),
(127, 'Kabupaten Musi Banyu Asin', 9, '2016-07-12 09:13:23', '0000-00-00 00:00:00', NULL),
(128, 'Kabupaten Musi Rawas', 9, '2016-07-12 09:13:23', '0000-00-00 00:00:00', NULL),
(129, 'Kabupaten Ogan Ilir', 9, '2016-07-12 09:13:23', '0000-00-00 00:00:00', NULL),
(130, 'Kabupaten Ogan Komering Ilir', 9, '2016-07-12 09:13:23', '0000-00-00 00:00:00', NULL),
(131, 'Kabupaten Ogan Komering Ulu', 9, '2016-07-12 09:13:23', '0000-00-00 00:00:00', NULL),
(132, 'Kabupaten Ogan Komering Ulu Se', 9, '2016-07-12 09:13:23', '0000-00-00 00:00:00', NULL),
(133, 'Kabupaten Ogan Komering Ulu Ti', 9, '2016-07-12 09:13:23', '0000-00-00 00:00:00', NULL),
(134, 'Kota Lubuklinggau', 9, '2016-07-12 09:13:23', '0000-00-00 00:00:00', NULL),
(135, 'Kota Pagar Alam', 9, '2016-07-12 09:13:23', '0000-00-00 00:00:00', NULL),
(136, 'Kota Palembang', 9, '2016-07-12 09:13:23', '0000-00-00 00:00:00', NULL),
(137, 'Kota Prabumulih', 9, '2016-07-12 09:13:23', '0000-00-00 00:00:00', NULL),
(138, 'Kabupaten Lampung Barat', 10, '2016-07-12 09:13:23', '0000-00-00 00:00:00', NULL),
(139, 'Kabupaten Lampung Selatan', 10, '2016-07-12 09:13:23', '0000-00-00 00:00:00', NULL),
(140, 'Kabupaten Lampung Tengah', 10, '2016-07-12 09:13:23', '0000-00-00 00:00:00', NULL),
(141, 'Kabupaten Lampung Timur', 10, '2016-07-12 09:13:23', '0000-00-00 00:00:00', NULL),
(142, 'Kabupaten Lampung Utara', 10, '2016-07-12 09:13:23', '0000-00-00 00:00:00', NULL),
(143, 'Kabupaten Mesuji', 10, '2016-07-12 09:13:23', '0000-00-00 00:00:00', NULL),
(144, 'Kabupaten Pesawaran', 10, '2016-07-12 09:13:23', '0000-00-00 00:00:00', NULL),
(145, 'Kabupaten Pringsewu', 10, '2016-07-12 09:13:23', '0000-00-00 00:00:00', NULL),
(146, 'Kabupaten Tanggamus', 10, '2016-07-12 09:13:23', '0000-00-00 00:00:00', NULL),
(147, 'Kabupaten Tulang Bawang', 10, '2016-07-12 09:13:23', '0000-00-00 00:00:00', NULL),
(148, 'Kabupaten Tulang Bawang Barat', 10, '2016-07-12 09:13:23', '0000-00-00 00:00:00', NULL),
(149, 'Kabupaten Way Kanan', 10, '2016-07-12 09:13:23', '0000-00-00 00:00:00', NULL),
(150, 'Kota Bandar Lampung', 10, '2016-07-12 09:13:23', '0000-00-00 00:00:00', NULL),
(151, 'Kota Metro', 10, '2016-07-12 09:13:23', '0000-00-00 00:00:00', NULL),
(152, 'Kabupaten Lebak', 11, '2016-07-12 09:13:23', '0000-00-00 00:00:00', NULL),
(153, 'Kabupaten Pandeglang', 11, '2016-07-12 09:13:23', '0000-00-00 00:00:00', NULL),
(154, 'Kabupaten Serang', 11, '2016-07-12 09:13:23', '0000-00-00 00:00:00', NULL),
(155, 'Kabupaten Tangerang', 11, '2016-07-12 09:13:23', '0000-00-00 00:00:00', NULL),
(156, 'Kota Cilegon', 11, '2016-07-12 09:13:23', '0000-00-00 00:00:00', NULL),
(157, 'Kota Serang', 11, '2016-07-12 09:13:23', '0000-00-00 00:00:00', NULL),
(158, 'Kota Tangerang', 11, '2016-07-12 09:13:23', '0000-00-00 00:00:00', NULL),
(159, 'Kota Tangerang Selatan', 11, '2016-07-12 09:13:23', '0000-00-00 00:00:00', NULL),
(160, 'Kabupaten Adm. Kepulauan Serib', 12, '2016-07-12 09:13:23', '0000-00-00 00:00:00', NULL),
(161, 'Kota Jakarta Barat', 12, '2016-07-12 09:13:23', '0000-00-00 00:00:00', NULL),
(162, 'Kota Jakarta Pusat', 12, '2016-07-12 09:13:23', '0000-00-00 00:00:00', NULL),
(163, 'Kota Jakarta Selatan', 12, '2016-07-12 09:13:23', '0000-00-00 00:00:00', NULL),
(164, 'Kota Jakarta Timur', 12, '2016-07-12 09:13:23', '0000-00-00 00:00:00', NULL),
(165, 'Kota Jakarta Utara', 12, '2016-07-12 09:13:23', '0000-00-00 00:00:00', NULL),
(166, 'Kabupaten Bandung', 13, '2016-07-12 09:13:23', '0000-00-00 00:00:00', NULL),
(167, 'Kabupaten Bandung Barat', 13, '2016-07-12 09:13:23', '0000-00-00 00:00:00', NULL),
(168, 'Kabupaten Bekasi', 13, '2016-07-12 09:13:23', '0000-00-00 00:00:00', NULL),
(169, 'Kabupaten Bogor', 13, '2016-07-12 09:13:23', '0000-00-00 00:00:00', NULL),
(170, 'Kabupaten Ciamis', 13, '2016-07-12 09:13:23', '0000-00-00 00:00:00', NULL),
(171, 'Kabupaten Cianjur', 13, '2016-07-12 09:13:23', '0000-00-00 00:00:00', NULL),
(172, 'Kabupaten Cirebon', 13, '2016-07-12 09:13:23', '0000-00-00 00:00:00', NULL),
(173, 'Kabupaten Garut', 13, '2016-07-12 09:13:23', '0000-00-00 00:00:00', NULL),
(174, 'Kabupaten Indramayu', 13, '2016-07-12 09:13:23', '0000-00-00 00:00:00', NULL),
(175, 'Kabupaten Karawang', 13, '2016-07-12 09:13:23', '0000-00-00 00:00:00', NULL),
(176, 'Kabupaten Kuningan', 13, '2016-07-12 09:13:23', '0000-00-00 00:00:00', NULL),
(177, 'Kabupaten Majalengka', 13, '2016-07-12 09:13:23', '0000-00-00 00:00:00', NULL),
(178, 'Kabupaten Purwakarta', 13, '2016-07-12 09:13:23', '0000-00-00 00:00:00', NULL),
(179, 'Kabupaten Subang', 13, '2016-07-12 09:13:23', '0000-00-00 00:00:00', NULL),
(180, 'Kabupaten Sukabumi', 13, '2016-07-12 09:13:23', '0000-00-00 00:00:00', NULL),
(181, 'Kabupaten Sumedang', 13, '2016-07-12 09:13:23', '0000-00-00 00:00:00', NULL),
(182, 'Kabupaten Tasikmalaya', 13, '2016-07-12 09:13:23', '0000-00-00 00:00:00', NULL),
(183, 'Kota Bandung', 13, '2016-07-12 09:13:23', '0000-00-00 00:00:00', NULL),
(184, 'Kota Banjar', 13, '2016-07-12 09:13:23', '0000-00-00 00:00:00', NULL),
(185, 'Kota Bekasi', 13, '2016-07-12 09:13:23', '0000-00-00 00:00:00', NULL),
(186, 'Kota Bogor', 13, '2016-07-12 09:13:23', '0000-00-00 00:00:00', NULL),
(187, 'Kota Cimahi', 13, '2016-07-12 09:13:23', '0000-00-00 00:00:00', NULL),
(188, 'Kota Cirebon', 13, '2016-07-12 09:13:23', '0000-00-00 00:00:00', NULL),
(189, 'Kota Depok', 13, '2016-07-12 09:13:23', '0000-00-00 00:00:00', NULL),
(190, 'Kota Sukabumi', 13, '2016-07-12 09:13:23', '0000-00-00 00:00:00', NULL),
(191, 'Kota Tasikmalaya', 13, '2016-07-12 09:13:23', '0000-00-00 00:00:00', NULL),
(192, 'Kabupaten Banjarnegara', 14, '2016-07-12 09:13:23', '0000-00-00 00:00:00', NULL),
(193, 'Kabupaten Banyumas', 14, '2016-07-12 09:13:23', '0000-00-00 00:00:00', NULL),
(194, 'Kabupaten Batang', 14, '2016-07-12 09:13:23', '0000-00-00 00:00:00', NULL),
(195, 'Kabupaten Blora', 14, '2016-07-12 09:13:23', '0000-00-00 00:00:00', NULL),
(196, 'Kabupaten Boyolali', 14, '2016-07-12 09:13:23', '0000-00-00 00:00:00', NULL),
(197, 'Kabupaten Brebes', 14, '2016-07-12 09:13:23', '0000-00-00 00:00:00', NULL),
(198, 'Kabupaten Cilacap', 14, '2016-07-12 09:13:23', '0000-00-00 00:00:00', NULL),
(199, 'Kabupaten Demak', 14, '2016-07-12 09:13:23', '0000-00-00 00:00:00', NULL),
(200, 'Kabupaten Grobogan', 14, '2016-07-12 09:13:23', '0000-00-00 00:00:00', NULL),
(201, 'Kabupaten Jepara', 14, '2016-07-12 09:13:23', '0000-00-00 00:00:00', NULL),
(202, 'Kabupaten Karanganyar', 14, '2016-07-12 09:13:23', '0000-00-00 00:00:00', NULL),
(203, 'Kabupaten Kebumen', 14, '2016-07-12 09:13:23', '0000-00-00 00:00:00', NULL),
(204, 'Kabupaten Kendal', 14, '2016-07-12 09:13:23', '0000-00-00 00:00:00', NULL),
(205, 'Kabupaten Klaten', 14, '2016-07-12 09:13:23', '0000-00-00 00:00:00', NULL),
(206, 'Kabupaten Kota Tegal', 14, '2016-07-12 09:13:23', '0000-00-00 00:00:00', NULL),
(207, 'Kabupaten Kudus', 14, '2016-07-12 09:13:23', '0000-00-00 00:00:00', NULL),
(208, 'Kabupaten Magelang', 14, '2016-07-12 09:13:23', '0000-00-00 00:00:00', NULL),
(209, 'Kabupaten Pati', 14, '2016-07-12 09:13:23', '0000-00-00 00:00:00', NULL),
(210, 'Kabupaten Pekalongan', 14, '2016-07-12 09:13:23', '0000-00-00 00:00:00', NULL),
(211, 'Kabupaten Pemalang', 14, '2016-07-12 09:13:23', '0000-00-00 00:00:00', NULL),
(212, 'Kabupaten Purbalingga', 14, '2016-07-12 09:13:23', '0000-00-00 00:00:00', NULL),
(213, 'Kabupaten Purworejo', 14, '2016-07-12 09:13:23', '0000-00-00 00:00:00', NULL),
(214, 'Kabupaten Rembang', 14, '2016-07-12 09:13:23', '0000-00-00 00:00:00', NULL),
(215, 'Kabupaten Semarang', 14, '2016-07-12 09:13:23', '0000-00-00 00:00:00', NULL),
(216, 'Kabupaten Sragen', 14, '2016-07-12 09:13:23', '0000-00-00 00:00:00', NULL),
(217, 'Kabupaten Sukoharjo', 14, '2016-07-12 09:13:23', '0000-00-00 00:00:00', NULL),
(218, 'Kabupaten Temanggung', 14, '2016-07-12 09:13:23', '0000-00-00 00:00:00', NULL),
(219, 'Kabupaten Wonogiri', 14, '2016-07-12 09:13:23', '0000-00-00 00:00:00', NULL),
(220, 'Kabupaten Wonosobo', 14, '2016-07-12 09:13:23', '0000-00-00 00:00:00', NULL),
(221, 'Kota Magelang', 14, '2016-07-12 09:13:23', '0000-00-00 00:00:00', NULL),
(222, 'Kota Pekalongan', 14, '2016-07-12 09:13:23', '0000-00-00 00:00:00', NULL),
(223, 'Kota Salatiga', 14, '2016-07-12 09:13:23', '0000-00-00 00:00:00', NULL),
(224, 'Kota Semarang', 14, '2016-07-12 09:13:23', '0000-00-00 00:00:00', NULL),
(225, 'Kota Surakarta', 14, '2016-07-12 09:13:23', '0000-00-00 00:00:00', NULL),
(226, 'Kota Tegal', 14, '2016-07-12 09:13:23', '0000-00-00 00:00:00', NULL),
(227, 'Kabupaten Bantul', 15, '2016-07-12 09:13:23', '0000-00-00 00:00:00', NULL),
(228, 'Kabupaten Gunung Kidul', 15, '2016-07-12 09:13:23', '0000-00-00 00:00:00', NULL),
(229, 'Kabupaten Kulon Progo', 15, '2016-07-12 09:13:23', '0000-00-00 00:00:00', NULL),
(230, 'Kabupaten Sleman', 15, '2016-07-12 09:13:23', '0000-00-00 00:00:00', NULL),
(231, 'Kota Yogyakarta', 15, '2016-07-12 09:13:23', '0000-00-00 00:00:00', NULL),
(232, 'Kabupaten Bangkalan', 16, '2016-07-12 09:13:23', '0000-00-00 00:00:00', NULL),
(233, 'Kabupaten Banyuwangi', 16, '2016-07-12 09:13:23', '0000-00-00 00:00:00', NULL),
(234, 'Kabupaten Blitar', 16, '2016-07-12 09:13:23', '0000-00-00 00:00:00', NULL),
(235, 'Kabupaten Bojonegoro', 16, '2016-07-12 09:13:23', '0000-00-00 00:00:00', NULL),
(236, 'Kabupaten Bondowoso', 16, '2016-07-12 09:13:23', '0000-00-00 00:00:00', NULL),
(237, 'Kabupaten Gresik', 16, '2016-07-12 09:13:23', '0000-00-00 00:00:00', NULL),
(238, 'Kabupaten Jember', 16, '2016-07-12 09:13:23', '0000-00-00 00:00:00', NULL),
(239, 'Kabupaten Jombang', 16, '2016-07-12 09:13:23', '0000-00-00 00:00:00', NULL),
(240, 'Kabupaten Kediri', 16, '2016-07-12 09:13:23', '0000-00-00 00:00:00', NULL),
(241, 'Kabupaten Lamongan', 16, '2016-07-12 09:13:23', '0000-00-00 00:00:00', NULL),
(242, 'Kabupaten Lumajang', 16, '2016-07-12 09:13:23', '0000-00-00 00:00:00', NULL),
(243, 'Kabupaten Madiun', 16, '2016-07-12 09:13:23', '0000-00-00 00:00:00', NULL),
(244, 'Kabupaten Magetan', 16, '2016-07-12 09:13:23', '0000-00-00 00:00:00', NULL),
(245, 'Kabupaten Malang', 16, '2016-07-12 09:13:23', '0000-00-00 00:00:00', NULL),
(246, 'Kabupaten Mojokerto', 16, '2016-07-12 09:13:23', '0000-00-00 00:00:00', NULL),
(247, 'Kabupaten Nganjuk', 16, '2016-07-12 09:13:23', '0000-00-00 00:00:00', NULL),
(248, 'Kabupaten Ngawi', 16, '2016-07-12 09:13:23', '0000-00-00 00:00:00', NULL),
(249, 'Kabupaten Pacitan', 16, '2016-07-12 09:13:23', '0000-00-00 00:00:00', NULL),
(250, 'Kabupaten Pamekasan', 16, '2016-07-12 09:13:23', '0000-00-00 00:00:00', NULL),
(251, 'Kabupaten Pasuruan', 16, '2016-07-12 09:13:23', '0000-00-00 00:00:00', NULL),
(252, 'Kabupaten Ponorogo', 16, '2016-07-12 09:13:23', '0000-00-00 00:00:00', NULL),
(253, 'Kabupaten Probolinggo', 16, '2016-07-12 09:13:23', '0000-00-00 00:00:00', NULL),
(254, 'Kabupaten Sampang', 16, '2016-07-12 09:13:23', '0000-00-00 00:00:00', NULL),
(255, 'Kabupaten Sidoarjo', 16, '2016-07-12 09:13:23', '0000-00-00 00:00:00', NULL),
(256, 'Kabupaten Situbondo', 16, '2016-07-12 09:13:23', '0000-00-00 00:00:00', NULL),
(257, 'Kabupaten Sumenep', 16, '2016-07-12 09:13:23', '0000-00-00 00:00:00', NULL),
(258, 'Kabupaten Trenggalek', 16, '2016-07-12 09:13:23', '0000-00-00 00:00:00', NULL),
(259, 'Kabupaten Tuban', 16, '2016-07-12 09:13:23', '0000-00-00 00:00:00', NULL),
(260, 'Kabupaten Tulungagung', 16, '2016-07-12 09:13:23', '0000-00-00 00:00:00', NULL),
(261, 'Kota Batu', 16, '2016-07-12 09:13:23', '0000-00-00 00:00:00', NULL),
(262, 'Kota Blitar', 16, '2016-07-12 09:13:23', '0000-00-00 00:00:00', NULL),
(263, 'Kota Kediri', 16, '2016-07-12 09:13:23', '0000-00-00 00:00:00', NULL),
(264, 'Kota Madiun', 16, '2016-07-12 09:13:23', '0000-00-00 00:00:00', NULL),
(265, 'Kota Malang', 16, '2016-07-12 09:13:23', '0000-00-00 00:00:00', NULL),
(266, 'Kota Mojokerto', 16, '2016-07-12 09:13:23', '0000-00-00 00:00:00', NULL),
(267, 'Kota Pasuruan', 16, '2016-07-12 09:13:23', '0000-00-00 00:00:00', NULL),
(268, 'Kota Probolinggo', 16, '2016-07-12 09:13:23', '0000-00-00 00:00:00', NULL),
(269, 'Kota Surabaya', 16, '2016-07-12 09:13:23', '0000-00-00 00:00:00', NULL),
(270, 'Kabupaten Badung', 17, '2016-07-12 09:13:23', '0000-00-00 00:00:00', NULL),
(271, 'Kabupaten Bangli', 17, '2016-07-12 09:13:23', '0000-00-00 00:00:00', NULL),
(272, 'Kabupaten Buleleng', 17, '2016-07-12 09:13:23', '0000-00-00 00:00:00', NULL),
(273, 'Kabupaten Gianyar', 17, '2016-07-12 09:13:23', '0000-00-00 00:00:00', NULL),
(274, 'Kabupaten Jembrana', 17, '2016-07-12 09:13:23', '0000-00-00 00:00:00', NULL),
(275, 'Kabupaten Karang Asem', 17, '2016-07-12 09:13:23', '0000-00-00 00:00:00', NULL),
(276, 'Kabupaten Klungkung', 17, '2016-07-12 09:13:23', '0000-00-00 00:00:00', NULL),
(277, 'Kabupaten Tabanan', 17, '2016-07-12 09:13:23', '0000-00-00 00:00:00', NULL),
(278, 'Kota Denpasar', 17, '2016-07-12 09:13:23', '0000-00-00 00:00:00', NULL),
(279, 'Kabupaten Bima', 18, '2016-07-12 09:13:23', '0000-00-00 00:00:00', NULL),
(280, 'Kabupaten Dompu', 18, '2016-07-12 09:13:23', '0000-00-00 00:00:00', NULL),
(281, 'Kabupaten Lombok Barat', 18, '2016-07-12 09:13:23', '0000-00-00 00:00:00', NULL),
(282, 'Kabupaten Lombok Tengah', 18, '2016-07-12 09:13:23', '0000-00-00 00:00:00', NULL),
(283, 'Kabupaten Lombok Timur', 18, '2016-07-12 09:13:23', '0000-00-00 00:00:00', NULL),
(284, 'Kabupaten Lombok Utara', 18, '2016-07-12 09:13:23', '0000-00-00 00:00:00', NULL),
(285, 'Kabupaten Sumbawa', 18, '2016-07-12 09:13:23', '0000-00-00 00:00:00', NULL),
(286, 'Kabupaten Sumbawa Barat', 18, '2016-07-12 09:13:23', '0000-00-00 00:00:00', NULL),
(287, 'Kota Bima', 18, '2016-07-12 09:13:23', '0000-00-00 00:00:00', NULL),
(288, 'Kota Mataram', 18, '2016-07-12 09:13:23', '0000-00-00 00:00:00', NULL),
(289, 'Kabupaten Alor', 19, '2016-07-12 09:13:23', '0000-00-00 00:00:00', NULL),
(290, 'Kabupaten Belu', 19, '2016-07-12 09:13:23', '0000-00-00 00:00:00', NULL),
(291, 'Kabupaten Ende', 19, '2016-07-12 09:13:23', '0000-00-00 00:00:00', NULL),
(292, 'Kabupaten Flores Timur', 19, '2016-07-12 09:13:23', '0000-00-00 00:00:00', NULL),
(293, 'Kabupaten Kupang', 19, '2016-07-12 09:13:23', '0000-00-00 00:00:00', NULL),
(294, 'Kabupaten Lembata', 19, '2016-07-12 09:13:23', '0000-00-00 00:00:00', NULL),
(295, 'Kabupaten Manggarai', 19, '2016-07-12 09:13:23', '0000-00-00 00:00:00', NULL),
(296, 'Kabupaten Manggarai Barat', 19, '2016-07-12 09:13:23', '0000-00-00 00:00:00', NULL),
(297, 'Kabupaten Manggarai Timur', 19, '2016-07-12 09:13:23', '0000-00-00 00:00:00', NULL),
(298, 'Kabupaten Nagekeo', 19, '2016-07-12 09:13:23', '0000-00-00 00:00:00', NULL),
(299, 'Kabupaten Ngada', 19, '2016-07-12 09:13:23', '0000-00-00 00:00:00', NULL),
(300, 'Kabupaten Rote Ndao', 19, '2016-07-12 09:13:23', '0000-00-00 00:00:00', NULL),
(301, 'Kabupaten Sabu Raijua', 19, '2016-07-12 09:13:23', '0000-00-00 00:00:00', NULL),
(302, 'Kabupaten Sikka', 19, '2016-07-12 09:13:23', '0000-00-00 00:00:00', NULL),
(303, 'Kabupaten Sumba Barat', 19, '2016-07-12 09:13:23', '0000-00-00 00:00:00', NULL),
(304, 'Kabupaten Sumba Barat Daya', 19, '2016-07-12 09:13:23', '0000-00-00 00:00:00', NULL),
(305, 'Kabupaten Sumba Tengah', 19, '2016-07-12 09:13:23', '0000-00-00 00:00:00', NULL),
(306, 'Kabupaten Sumba Timur', 19, '2016-07-12 09:13:23', '0000-00-00 00:00:00', NULL),
(307, 'Kabupaten Timor Tengah Selatan', 19, '2016-07-12 09:13:23', '0000-00-00 00:00:00', NULL),
(308, 'Kabupaten Timor Tengah Utara', 19, '2016-07-12 09:13:23', '0000-00-00 00:00:00', NULL),
(309, 'Kota Kupang', 19, '2016-07-12 09:13:23', '0000-00-00 00:00:00', NULL),
(310, 'Kabupaten Bengkayang', 20, '2016-07-12 09:13:23', '0000-00-00 00:00:00', NULL),
(311, 'Kabupaten Kapuas Hulu', 20, '2016-07-12 09:13:23', '0000-00-00 00:00:00', NULL),
(312, 'Kabupaten Kayong Utara', 20, '2016-07-12 09:13:23', '0000-00-00 00:00:00', NULL),
(313, 'Kabupaten Ketapang', 20, '2016-07-12 09:13:23', '0000-00-00 00:00:00', NULL),
(314, 'Kabupaten Kubu Raya', 20, '2016-07-12 09:13:23', '0000-00-00 00:00:00', NULL),
(315, 'Kabupaten Landak', 20, '2016-07-12 09:13:23', '0000-00-00 00:00:00', NULL),
(316, 'Kabupaten Melawi', 20, '2016-07-12 09:13:23', '0000-00-00 00:00:00', NULL),
(317, 'Kabupaten Pontianak', 20, '2016-07-12 09:13:23', '0000-00-00 00:00:00', NULL),
(318, 'Kabupaten Sambas', 20, '2016-07-12 09:13:23', '0000-00-00 00:00:00', NULL),
(319, 'Kabupaten Sanggau', 20, '2016-07-12 09:13:23', '0000-00-00 00:00:00', NULL),
(320, 'Kabupaten Sekadau', 20, '2016-07-12 09:13:23', '0000-00-00 00:00:00', NULL),
(321, 'Kabupaten Sintang', 20, '2016-07-12 09:13:23', '0000-00-00 00:00:00', NULL),
(322, 'Kota Pontianak', 20, '2016-07-12 09:13:23', '0000-00-00 00:00:00', NULL),
(323, 'Kota Singkawang', 20, '2016-07-12 09:13:23', '0000-00-00 00:00:00', NULL),
(324, 'Kabupaten Barito Selatan', 21, '2016-07-12 09:13:23', '0000-00-00 00:00:00', NULL),
(325, 'Kabupaten Barito Timur', 21, '2016-07-12 09:13:23', '0000-00-00 00:00:00', NULL),
(326, 'Kabupaten Barito Utara', 21, '2016-07-12 09:13:23', '0000-00-00 00:00:00', NULL),
(327, 'Kabupaten Gunung Mas', 21, '2016-07-12 09:13:23', '0000-00-00 00:00:00', NULL),
(328, 'Kabupaten Kapuas', 21, '2016-07-12 09:13:23', '0000-00-00 00:00:00', NULL),
(329, 'Kabupaten Katingan', 21, '2016-07-12 09:13:23', '0000-00-00 00:00:00', NULL),
(330, 'Kabupaten Kotawaringin Barat', 21, '2016-07-12 09:13:23', '0000-00-00 00:00:00', NULL),
(331, 'Kabupaten Kotawaringin Timur', 21, '2016-07-12 09:13:23', '0000-00-00 00:00:00', NULL),
(332, 'Kabupaten Lamandau', 21, '2016-07-12 09:13:23', '0000-00-00 00:00:00', NULL),
(333, 'Kabupaten Murung Raya', 21, '2016-07-12 09:13:23', '0000-00-00 00:00:00', NULL),
(334, 'Kabupaten Pulang Pisau', 21, '2016-07-12 09:13:23', '0000-00-00 00:00:00', NULL),
(335, 'Kabupaten Seruyan', 21, '2016-07-12 09:13:23', '0000-00-00 00:00:00', NULL),
(336, 'Kabupaten Sukamara', 21, '2016-07-12 09:13:23', '0000-00-00 00:00:00', NULL),
(337, 'Kota Palangkaraya', 21, '2016-07-12 09:13:23', '0000-00-00 00:00:00', NULL),
(338, 'Kabupaten Balangan', 22, '2016-07-12 09:13:23', '0000-00-00 00:00:00', NULL),
(339, 'Kabupaten Banjar', 22, '2016-07-12 09:13:23', '0000-00-00 00:00:00', NULL),
(340, 'Kabupaten Barito Kuala', 22, '2016-07-12 09:13:23', '0000-00-00 00:00:00', NULL),
(341, 'Kabupaten Hulu Sungai Selatan', 22, '2016-07-12 09:13:23', '0000-00-00 00:00:00', NULL),
(342, 'Kabupaten Hulu Sungai Tengah', 22, '2016-07-12 09:13:23', '0000-00-00 00:00:00', NULL),
(343, 'Kabupaten Hulu Sungai Utara', 22, '2016-07-12 09:13:23', '0000-00-00 00:00:00', NULL),
(344, 'Kabupaten Kota Baru', 22, '2016-07-12 09:13:23', '0000-00-00 00:00:00', NULL),
(345, 'Kabupaten Tabalong', 22, '2016-07-12 09:13:23', '0000-00-00 00:00:00', NULL),
(346, 'Kabupaten Tanah Bumbu', 22, '2016-07-12 09:13:23', '0000-00-00 00:00:00', NULL),
(347, 'Kabupaten Tanah Laut', 22, '2016-07-12 09:13:23', '0000-00-00 00:00:00', NULL),
(348, 'Kabupaten Tapin', 22, '2016-07-12 09:13:23', '0000-00-00 00:00:00', NULL),
(349, 'Kota Banjar Baru', 22, '2016-07-12 09:13:23', '0000-00-00 00:00:00', NULL),
(350, 'Kota Banjarmasin', 22, '2016-07-12 09:13:23', '0000-00-00 00:00:00', NULL),
(351, 'Kabupaten Berau', 23, '2016-07-12 09:13:23', '0000-00-00 00:00:00', NULL),
(352, 'Kabupaten Bulongan', 23, '2016-07-12 09:13:23', '0000-00-00 00:00:00', NULL),
(353, 'Kabupaten Kutai Barat', 23, '2016-07-12 09:13:23', '0000-00-00 00:00:00', NULL),
(354, 'Kabupaten Kutai Kartanegara', 23, '2016-07-12 09:13:23', '0000-00-00 00:00:00', NULL),
(355, 'Kabupaten Kutai Timur', 23, '2016-07-12 09:13:23', '0000-00-00 00:00:00', NULL),
(356, 'Kabupaten Malinau', 23, '2016-07-12 09:13:23', '0000-00-00 00:00:00', NULL),
(357, 'Kabupaten Nunukan', 23, '2016-07-12 09:13:23', '0000-00-00 00:00:00', NULL),
(358, 'Kabupaten Paser', 23, '2016-07-12 09:13:23', '0000-00-00 00:00:00', NULL),
(359, 'Kabupaten Penajam Paser Utara', 23, '2016-07-12 09:13:23', '0000-00-00 00:00:00', NULL),
(360, 'Kabupaten Tana Tidung', 23, '2016-07-12 09:13:23', '0000-00-00 00:00:00', NULL),
(361, 'Kota Balikpapan', 23, '2016-07-12 09:13:23', '0000-00-00 00:00:00', NULL),
(362, 'Kota Bontang', 23, '2016-07-12 09:13:23', '0000-00-00 00:00:00', NULL),
(363, 'Kota Samarinda', 23, '2016-07-12 09:13:23', '0000-00-00 00:00:00', NULL),
(364, 'Kota Tarakan', 23, '2016-07-12 09:13:23', '0000-00-00 00:00:00', NULL),
(365, 'Kabupaten Boalemo', 24, '2016-07-12 09:13:23', '0000-00-00 00:00:00', NULL),
(366, 'Kabupaten Bone Bolango', 24, '2016-07-12 09:13:23', '0000-00-00 00:00:00', NULL),
(367, 'Kabupaten Gorontalo', 24, '2016-07-12 09:13:23', '0000-00-00 00:00:00', NULL),
(368, 'Kabupaten Gorontalo Utara', 24, '2016-07-12 09:13:23', '0000-00-00 00:00:00', NULL),
(369, 'Kabupaten Pohuwato', 24, '2016-07-12 09:13:23', '0000-00-00 00:00:00', NULL),
(370, 'Kota Gorontalo', 24, '2016-07-12 09:13:23', '0000-00-00 00:00:00', NULL),
(371, 'Kabupaten Bantaeng', 25, '2016-07-12 09:13:23', '0000-00-00 00:00:00', NULL),
(372, 'Kabupaten Barru', 25, '2016-07-12 09:13:23', '0000-00-00 00:00:00', NULL),
(373, 'Kabupaten Bone', 25, '2016-07-12 09:13:23', '0000-00-00 00:00:00', NULL),
(374, 'Kabupaten Bulukumba', 25, '2016-07-12 09:13:23', '0000-00-00 00:00:00', NULL),
(375, 'Kabupaten Enrekang', 25, '2016-07-12 09:13:23', '0000-00-00 00:00:00', NULL),
(376, 'Kabupaten Gowa', 25, '2016-07-12 09:13:23', '0000-00-00 00:00:00', NULL),
(377, 'Kabupaten Jeneponto', 25, '2016-07-12 09:13:23', '0000-00-00 00:00:00', NULL),
(378, 'Kabupaten Luwu', 25, '2016-07-12 09:13:23', '0000-00-00 00:00:00', NULL),
(379, 'Kabupaten Luwu Timur', 25, '2016-07-12 09:13:23', '0000-00-00 00:00:00', NULL),
(380, 'Kabupaten Luwu Utara', 25, '2016-07-12 09:13:23', '0000-00-00 00:00:00', NULL),
(381, 'Kabupaten Maros', 25, '2016-07-12 09:13:23', '0000-00-00 00:00:00', NULL),
(382, 'Kabupaten Pangkajene Kepulauan', 25, '2016-07-12 09:13:23', '0000-00-00 00:00:00', NULL),
(383, 'Kabupaten Pinrang', 25, '2016-07-12 09:13:23', '0000-00-00 00:00:00', NULL),
(384, 'Kabupaten Selayar', 25, '2016-07-12 09:13:23', '0000-00-00 00:00:00', NULL),
(385, 'Kabupaten Sidenreng Rappang', 25, '2016-07-12 09:13:23', '0000-00-00 00:00:00', NULL),
(386, 'Kabupaten Sinjai', 25, '2016-07-12 09:13:23', '0000-00-00 00:00:00', NULL),
(387, 'Kabupaten Soppeng', 25, '2016-07-12 09:13:23', '0000-00-00 00:00:00', NULL),
(388, 'Kabupaten Takalar', 25, '2016-07-12 09:13:23', '0000-00-00 00:00:00', NULL),
(389, 'Kabupaten Tana Toraja', 25, '2016-07-12 09:13:23', '0000-00-00 00:00:00', NULL),
(390, 'Kabupaten Toraja Utara', 25, '2016-07-12 09:13:23', '0000-00-00 00:00:00', NULL),
(391, 'Kabupaten Wajo', 25, '2016-07-12 09:13:23', '0000-00-00 00:00:00', NULL),
(392, 'Kota Makassar', 25, '2016-07-12 09:13:23', '0000-00-00 00:00:00', NULL),
(393, 'Kota Palopo', 25, '2016-07-12 09:13:23', '0000-00-00 00:00:00', NULL),
(394, 'Kota Pare-pare', 25, '2016-07-12 09:13:23', '0000-00-00 00:00:00', NULL),
(395, 'Kabupaten Bombana', 26, '2016-07-12 09:13:23', '0000-00-00 00:00:00', NULL),
(396, 'Kabupaten Buton', 26, '2016-07-12 09:13:23', '0000-00-00 00:00:00', NULL),
(397, 'Kabupaten Buton Utara', 26, '2016-07-12 09:13:23', '0000-00-00 00:00:00', NULL),
(398, 'Kabupaten Kolaka', 26, '2016-07-12 09:13:23', '0000-00-00 00:00:00', NULL),
(399, 'Kabupaten Kolaka Utara', 26, '2016-07-12 09:13:23', '0000-00-00 00:00:00', NULL),
(400, 'Kabupaten Konawe', 26, '2016-07-12 09:13:23', '0000-00-00 00:00:00', NULL),
(401, 'Kabupaten Konawe Selatan', 26, '2016-07-12 09:13:23', '0000-00-00 00:00:00', NULL),
(402, 'Kabupaten Konawe Utara', 26, '2016-07-12 09:13:23', '0000-00-00 00:00:00', NULL),
(403, 'Kabupaten Muna', 26, '2016-07-12 09:13:23', '0000-00-00 00:00:00', NULL),
(404, 'Kabupaten Wakatobi', 26, '2016-07-12 09:13:23', '0000-00-00 00:00:00', NULL),
(405, 'Kota Bau-bau', 26, '2016-07-12 09:13:23', '0000-00-00 00:00:00', NULL),
(406, 'Kota Kendari', 26, '2016-07-12 09:13:23', '0000-00-00 00:00:00', NULL),
(407, 'Kabupaten Banggai', 27, '2016-07-12 09:13:23', '0000-00-00 00:00:00', NULL),
(408, 'Kabupaten Banggai Kepulauan', 27, '2016-07-12 09:13:23', '0000-00-00 00:00:00', NULL),
(409, 'Kabupaten Buol', 27, '2016-07-12 09:13:23', '0000-00-00 00:00:00', NULL),
(410, 'Kabupaten Donggala', 27, '2016-07-12 09:13:23', '0000-00-00 00:00:00', NULL),
(411, 'Kabupaten Morowali', 27, '2016-07-12 09:13:23', '0000-00-00 00:00:00', NULL),
(412, 'Kabupaten Parigi Moutong', 27, '2016-07-12 09:13:23', '0000-00-00 00:00:00', NULL),
(413, 'Kabupaten Poso', 27, '2016-07-12 09:13:23', '0000-00-00 00:00:00', NULL),
(414, 'Kabupaten Sigi', 27, '2016-07-12 09:13:23', '0000-00-00 00:00:00', NULL),
(415, 'Kabupaten Tojo Una-Una', 27, '2016-07-12 09:13:23', '0000-00-00 00:00:00', NULL),
(416, 'Kabupaten Toli Toli', 27, '2016-07-12 09:13:23', '0000-00-00 00:00:00', NULL),
(417, 'Kota Palu', 27, '2016-07-12 09:13:23', '0000-00-00 00:00:00', NULL),
(418, 'Kabupaten Bolaang Mangondow', 28, '2016-07-12 09:13:23', '0000-00-00 00:00:00', NULL),
(419, 'Kabupaten Bolaang Mangondow Se', 28, '2016-07-12 09:13:23', '0000-00-00 00:00:00', NULL),
(420, 'Kabupaten Bolaang Mangondow Ti', 28, '2016-07-12 09:13:23', '0000-00-00 00:00:00', NULL),
(421, 'Kabupaten Bolaang Mangondow Ut', 28, '2016-07-12 09:13:23', '0000-00-00 00:00:00', NULL),
(422, 'Kabupaten Kepulauan Sangihe', 28, '2016-07-12 09:13:23', '0000-00-00 00:00:00', NULL),
(423, 'Kabupaten Kepulauan Siau Tagul', 28, '2016-07-12 09:13:23', '0000-00-00 00:00:00', NULL),
(424, 'Kabupaten Kepulauan Talaud', 28, '2016-07-12 09:13:23', '0000-00-00 00:00:00', NULL),
(425, 'Kabupaten Minahasa', 28, '2016-07-12 09:13:23', '0000-00-00 00:00:00', NULL),
(426, 'Kabupaten Minahasa Selatan', 28, '2016-07-12 09:13:23', '0000-00-00 00:00:00', NULL),
(427, 'Kabupaten Minahasa Tenggara', 28, '2016-07-12 09:13:23', '0000-00-00 00:00:00', NULL),
(428, 'Kabupaten Minahasa Utara', 28, '2016-07-12 09:13:23', '0000-00-00 00:00:00', NULL),
(429, 'Kota Bitung', 28, '2016-07-12 09:13:23', '0000-00-00 00:00:00', NULL),
(430, 'Kota Kotamobagu', 28, '2016-07-12 09:13:23', '0000-00-00 00:00:00', NULL),
(431, 'Kota Manado', 28, '2016-07-12 09:13:23', '0000-00-00 00:00:00', NULL),
(432, 'Kota Tomohon', 28, '2016-07-12 09:13:23', '0000-00-00 00:00:00', NULL),
(433, 'Kabupaten Majene', 29, '2016-07-12 09:13:23', '0000-00-00 00:00:00', NULL),
(434, 'Kabupaten Mamasa', 29, '2016-07-12 09:13:23', '0000-00-00 00:00:00', NULL),
(435, 'Kabupaten Mamuju', 29, '2016-07-12 09:13:23', '0000-00-00 00:00:00', NULL),
(436, 'Kabupaten Mamuju Utara', 29, '2016-07-12 09:13:23', '0000-00-00 00:00:00', NULL),
(437, 'Kabupaten Polewali Mandar', 29, '2016-07-12 09:13:23', '0000-00-00 00:00:00', NULL),
(438, 'Kabupaten Buru', 30, '2016-07-12 09:13:23', '0000-00-00 00:00:00', NULL),
(439, 'Kabupaten Buru Selatan', 30, '2016-07-12 09:13:23', '0000-00-00 00:00:00', NULL),
(440, 'Kabupaten Kepulauan Aru', 30, '2016-07-12 09:13:23', '0000-00-00 00:00:00', NULL),
(441, 'Kabupaten Maluku Barat Daya', 30, '2016-07-12 09:13:23', '0000-00-00 00:00:00', NULL),
(442, 'Kabupaten Maluku Tengah', 30, '2016-07-12 09:13:23', '0000-00-00 00:00:00', NULL),
(443, 'Kabupaten Maluku Tenggara', 30, '2016-07-12 09:13:23', '0000-00-00 00:00:00', NULL),
(444, 'Kabupaten Maluku Tenggara Bara', 30, '2016-07-12 09:13:23', '0000-00-00 00:00:00', NULL),
(445, 'Kabupaten Seram Bagian Barat', 30, '2016-07-12 09:13:23', '0000-00-00 00:00:00', NULL),
(446, 'Kabupaten Seram Bagian Timur', 30, '2016-07-12 09:13:23', '0000-00-00 00:00:00', NULL),
(447, 'Kota Ambon', 30, '2016-07-12 09:13:23', '0000-00-00 00:00:00', NULL),
(448, 'Kota Tual', 30, '2016-07-12 09:13:23', '0000-00-00 00:00:00', NULL),
(449, 'Kabupaten Halmahera Barat', 31, '2016-07-12 09:13:23', '0000-00-00 00:00:00', NULL),
(450, 'Kabupaten Halmahera Selatan', 31, '2016-07-12 09:13:23', '0000-00-00 00:00:00', NULL),
(451, 'Kabupaten Halmahera Tengah', 31, '2016-07-12 09:13:23', '0000-00-00 00:00:00', NULL),
(452, 'Kabupaten Halmahera Timur', 31, '2016-07-12 09:13:23', '0000-00-00 00:00:00', NULL),
(453, 'Kabupaten Halmahera Utara', 31, '2016-07-12 09:13:23', '0000-00-00 00:00:00', NULL),
(454, 'Kabupaten Kepulauan Sula', 31, '2016-07-12 09:13:23', '0000-00-00 00:00:00', NULL),
(455, 'Kabupaten Pulau Morotai', 31, '2016-07-12 09:13:23', '0000-00-00 00:00:00', NULL),
(456, 'Kota Ternate', 31, '2016-07-12 09:13:23', '0000-00-00 00:00:00', NULL),
(457, 'Kota Tidore Kepulauan', 31, '2016-07-12 09:13:23', '0000-00-00 00:00:00', NULL),
(458, 'Kabupaten Fakfak', 32, '2016-07-12 09:13:23', '0000-00-00 00:00:00', NULL),
(459, 'Kabupaten Kaimana', 32, '2016-07-12 09:13:23', '0000-00-00 00:00:00', NULL),
(460, 'Kabupaten Manokwari', 32, '2016-07-12 09:13:23', '0000-00-00 00:00:00', NULL),
(461, 'Kabupaten Maybrat', 32, '2016-07-12 09:13:23', '0000-00-00 00:00:00', NULL),
(462, 'Kabupaten Raja Ampat', 32, '2016-07-12 09:13:23', '0000-00-00 00:00:00', NULL),
(463, 'Kabupaten Sorong', 32, '2016-07-12 09:13:23', '0000-00-00 00:00:00', NULL),
(464, 'Kabupaten Sorong Selatan', 32, '2016-07-12 09:13:23', '0000-00-00 00:00:00', NULL),
(465, 'Kabupaten Tambrauw', 32, '2016-07-12 09:13:23', '0000-00-00 00:00:00', NULL),
(466, 'Kabupaten Teluk Bintuni', 32, '2016-07-12 09:13:23', '0000-00-00 00:00:00', NULL),
(467, 'Kabupaten Teluk Wondama', 32, '2016-07-12 09:13:23', '0000-00-00 00:00:00', NULL),
(468, 'Kota Sorong', 32, '2016-07-12 09:13:23', '0000-00-00 00:00:00', NULL),
(469, 'Kabupaten Merauke', 33, '2016-07-12 09:13:23', '0000-00-00 00:00:00', NULL),
(470, 'Kabupaten Jayawijaya', 33, '2016-07-12 09:13:23', '0000-00-00 00:00:00', NULL),
(471, 'Kabupaten Nabire', 33, '2016-07-12 09:13:23', '0000-00-00 00:00:00', NULL),
(472, 'Kabupaten Kepulauan Yapen', 33, '2016-07-12 09:13:23', '0000-00-00 00:00:00', NULL),
(473, 'Kabupaten Biak Numfor', 33, '2016-07-12 09:13:23', '0000-00-00 00:00:00', NULL),
(474, 'Kabupaten Paniai', 33, '2016-07-12 09:13:23', '0000-00-00 00:00:00', NULL),
(475, 'Kabupaten Puncak Jaya', 33, '2016-07-12 09:13:23', '0000-00-00 00:00:00', NULL),
(476, 'Kabupaten Mimika', 33, '2016-07-12 09:13:23', '0000-00-00 00:00:00', NULL),
(477, 'Kabupaten Boven Digoel', 33, '2016-07-12 09:13:23', '0000-00-00 00:00:00', NULL),
(478, 'Kabupaten Mappi', 33, '2016-07-12 09:13:23', '0000-00-00 00:00:00', NULL),
(479, 'Kabupaten Asmat', 33, '2016-07-12 09:13:23', '0000-00-00 00:00:00', NULL),
(480, 'Kabupaten Yahukimo', 33, '2016-07-12 09:13:23', '0000-00-00 00:00:00', NULL),
(481, 'Kabupaten Pegunungan Bintang', 33, '2016-07-12 09:13:23', '0000-00-00 00:00:00', NULL),
(482, 'Kabupaten Tolikara', 33, '2016-07-12 09:13:23', '0000-00-00 00:00:00', NULL),
(483, 'Kabupaten Sarmi', 33, '2016-07-12 09:13:23', '0000-00-00 00:00:00', NULL),
(484, 'Kabupaten Keerom', 33, '2016-07-12 09:13:23', '0000-00-00 00:00:00', NULL),
(485, 'Kabupaten Waropen', 33, '2016-07-12 09:13:23', '0000-00-00 00:00:00', NULL),
(486, 'Kabupaten Jayapura', 33, '2016-07-12 09:13:23', '0000-00-00 00:00:00', NULL),
(487, 'Kabupaten Deiyai', 33, '2016-07-12 09:13:23', '0000-00-00 00:00:00', NULL),
(488, 'Kabupaten Dogiyai', 33, '2016-07-12 09:13:23', '0000-00-00 00:00:00', NULL),
(489, 'Kabupaten Intan Jaya', 33, '2016-07-12 09:13:23', '0000-00-00 00:00:00', NULL),
(490, 'Kabupaten Lanny Jaya', 33, '2016-07-12 09:13:23', '0000-00-00 00:00:00', NULL),
(491, 'Kabupaten Mamberamo Raya', 33, '2016-07-12 09:13:23', '0000-00-00 00:00:00', NULL),
(492, 'Kabupaten Mamberamo Tengah', 33, '2016-07-12 09:13:23', '0000-00-00 00:00:00', NULL),
(493, 'Kabupaten Nduga', 33, '2016-07-12 09:13:23', '0000-00-00 00:00:00', NULL),
(494, 'Kabupaten Puncak', 33, '2016-07-12 09:13:23', '0000-00-00 00:00:00', NULL),
(495, 'Kabupaten Supiori', 33, '2016-07-12 09:13:23', '0000-00-00 00:00:00', NULL),
(496, 'Kabupaten Yalimo', 33, '2016-07-12 09:13:23', '0000-00-00 00:00:00', NULL),
(497, 'Kota Jayapura', 33, '2016-07-12 09:13:23', '0000-00-00 00:00:00', NULL),
(498, 'Kabupaten Bulungan', 34, '2016-07-12 09:13:23', '0000-00-00 00:00:00', NULL),
(499, 'Kabupaten Malinau', 34, '2016-07-12 09:13:23', '0000-00-00 00:00:00', NULL),
(500, 'Kabupaten Nunukan', 34, '2016-07-12 09:13:23', '0000-00-00 00:00:00', NULL),
(501, 'Kabupaten Tana Tidung', 34, '2016-07-12 09:13:23', '0000-00-00 00:00:00', NULL),
(502, 'Kota Tarakan', 34, '2016-07-12 09:13:23', '0000-00-00 00:00:00', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `master_province`
--

CREATE TABLE `master_province` (
  `id` int(10) NOT NULL,
  `name` varchar(30) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `master_province`
--

INSERT INTO `master_province` (`id`, `name`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Nanggroe Aceh Darussalam', '2016-07-12 09:10:07', '0000-00-00 00:00:00', NULL),
(2, 'Sumatera Utara', '2016-07-12 09:10:07', '0000-00-00 00:00:00', NULL),
(3, 'Sumatera Barat', '2016-07-12 09:10:07', '0000-00-00 00:00:00', NULL),
(4, 'Riau', '2016-07-12 09:10:07', '0000-00-00 00:00:00', NULL),
(5, 'Kepulauan Riau', '2016-07-12 09:10:07', '0000-00-00 00:00:00', NULL),
(6, 'Kepulauan Bangka-Belitung', '2016-07-12 09:10:07', '0000-00-00 00:00:00', NULL),
(7, 'Jambi', '2016-07-12 09:10:07', '0000-00-00 00:00:00', NULL),
(8, 'Bengkulu', '2016-07-12 09:10:07', '0000-00-00 00:00:00', NULL),
(9, 'Sumatera Selatan', '2016-07-12 09:10:07', '0000-00-00 00:00:00', NULL),
(10, 'Lampung', '2016-07-12 09:10:07', '0000-00-00 00:00:00', NULL),
(11, 'Banten', '2016-07-12 09:10:07', '0000-00-00 00:00:00', NULL),
(12, 'DKI Jakarta', '2016-07-12 09:10:07', '0000-00-00 00:00:00', NULL),
(13, 'Jawa Barat', '2016-07-12 09:10:07', '0000-00-00 00:00:00', NULL),
(14, 'Jawa Tengah', '2016-07-12 09:10:07', '0000-00-00 00:00:00', NULL),
(15, 'Daerah Istimewa Yogyakarta  ', '2016-07-12 09:10:07', '0000-00-00 00:00:00', NULL),
(16, 'Jawa Timur', '2016-07-12 09:10:07', '0000-00-00 00:00:00', NULL),
(17, 'Bali', '2016-07-12 09:10:07', '0000-00-00 00:00:00', NULL),
(18, 'Nusa Tenggara Barat', '2016-07-12 09:10:07', '0000-00-00 00:00:00', NULL),
(19, 'Nusa Tenggara Timur', '2016-07-12 09:10:07', '0000-00-00 00:00:00', NULL),
(20, 'Kalimantan Barat', '2016-07-12 09:10:07', '0000-00-00 00:00:00', NULL),
(21, 'Kalimantan Tengah', '2016-07-12 09:10:07', '0000-00-00 00:00:00', NULL),
(22, 'Kalimantan Selatan', '2016-07-12 09:10:07', '0000-00-00 00:00:00', NULL),
(23, 'Kalimantan Timur', '2016-07-12 09:10:07', '0000-00-00 00:00:00', NULL),
(24, 'Gorontalo', '2016-07-12 09:10:07', '0000-00-00 00:00:00', NULL),
(25, 'Sulawesi Selatan', '2016-07-12 09:10:07', '0000-00-00 00:00:00', NULL),
(26, 'Sulawesi Tenggara', '2016-07-12 09:10:07', '0000-00-00 00:00:00', NULL),
(27, 'Sulawesi Tengah', '2016-07-12 09:10:07', '0000-00-00 00:00:00', NULL),
(28, 'Sulawesi Utara', '2016-07-12 09:10:07', '0000-00-00 00:00:00', NULL),
(29, 'Sulawesi Barat', '2016-07-12 09:10:07', '0000-00-00 00:00:00', NULL),
(30, 'Maluku', '2016-07-12 09:10:07', '0000-00-00 00:00:00', NULL),
(31, 'Maluku Utara', '2016-07-12 09:10:07', '0000-00-00 00:00:00', NULL),
(32, 'Papua Barat', '2016-07-12 09:10:07', '0000-00-00 00:00:00', NULL),
(33, 'Papua', '2016-07-12 09:10:07', '0000-00-00 00:00:00', NULL),
(34, 'Kalimantan Utara', '2016-07-12 09:10:07', '0000-00-00 00:00:00', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE `news` (
  `id_news` int(5) NOT NULL,
  `id_user` int(5) NOT NULL,
  `title` varchar(255) NOT NULL,
  `image` varchar(200) NOT NULL,
  `deskripsi_singkat` text NOT NULL,
  `deskripsi_full` text NOT NULL,
  `status_publish` enum('Publish','Draf','Cancel','Non Aktif') NOT NULL,
  `tgl_publish` date NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `news`
--

INSERT INTO `news` (`id_news`, `id_user`, `title`, `image`, `deskripsi_singkat`, `deskripsi_full`, `status_publish`, `tgl_publish`, `created_at`, `updated_at`) VALUES
(1, 1, 'Manfaat Kopi untuk Kulit', '23.jpg', 'Sekitar 10 dari 8 orang dewasa sangat menyukai kebiasaan minum kopi. Kopi merupakan minuman yang berasal dari biji buah kopi yang sudah dihaluskan. Ada banyak jenis kopi, mulai dari kopi robusta, kopi luak dan lain sebagainya. Selain berguna sebagai minuman penghilang kantuk dan minuman penghangat tubuh, kopi juga mempunyai manfaat lain untuk kesehatan dan kecantikan kulit.', 'Sekitar 10 dari 8 orang dewasa sangat menyukai kebiasaan minum kopi. Kopi merupakan minuman yang berasal dari biji buah kopi yang sudah dihaluskan. Ada banyak jenis kopi, mulai dari kopi robusta, kopi luak dan lain sebagainya. Selain berguna sebagai minuman penghilang kantuk dan minuman penghangat tubuh, kopi juga mempunyai manfaat lain untuk kesehatan dan kecantikan kulit.\r\nManfaat kopi untuk wajah juga sudah terbukti, karena ada beberapa tempat spa dan salon perawatan wajah yang telah menggunakan kopi untuk masker wajah. Seperti apa yang dikutip dari manfaat.com.', 'Publish', '2017-03-28', '2017-03-28 01:22:56', '2017-03-28 10:48:55'),
(2, 1, 'Macam Penyakit Paru paru dan Penyebabnya', '15.jpg', 'Selain jantung, paru-paru juga termasuk organ vital dalam tubuh. Fungsi dari paru-paru sendiri yaitu sebagai tempat pertukaran O2 dan CO2 dalam darah. Jika paru-paru anda tidak terjaga kesehatannya, tidak menutup kemungkinan paru-paru anda akan terserang penyakit.', 'Selain jantung, paru-paru juga termasuk organ vital dalam tubuh. Fungsi dari paru-paru sendiri yaitu sebagai tempat pertukaran O2 dan CO2 dalam darah. Jika paru-paru anda tidak terjaga kesehatannya, tidak menutup kemungkinan paru-paru anda akan terserang penyakit.\r\nTanda tanda penyakit paru paru tidak sama akan tetapi sesuai dengan jenis penyakit paru yang diderita. Penyakit flek paru paru atau Tuberkulosis (TBC) merupakan penyakit yang tidak menurun. Penyakit ini akan kelihatan seperti noda-noda gelap dan luka-lukanya kelihatan seperti lubang-lubang yang bulat jika difoto rontgen.', 'Publish', '2017-03-28', '2017-03-28 03:51:38', '2017-03-28 10:51:38'),
(3, 1, 'Manfaat Susu Kedelai bagi Ibu Hamil', 'nophoto.jpg', 'Susu merupakan minuman yang mempunyai asupan protein tinggi. Tak hanya tinggi protein saja, di dalam susu juga terdapat kandungan nutrisi lainnya seperti vitamin dan fitonutrien yang bermanfaat bagi kesehatan tubuh. Ada dua jenis susu yang dapat dikonsumsi oleh manusia, yaitu susu yang berasal dari protein hewani dan susu yang berasal dari protein nabati.', '\r\n\r\nSusu merupakan minuman yang mempunyai asupan protein tinggi. Tak hanya tinggi protein saja, di dalam susu juga terdapat kandungan nutrisi lainnya seperti vitamin dan fitonutrien yang bermanfaat bagi kesehatan tubuh. Ada dua jenis susu yang dapat dikonsumsi oleh manusia, yaitu susu yang berasal dari protein hewani dan susu yang berasal dari protein nabati.\r\n\r\nTak hanya enak untuk dikonsumsi, susu kedelai juga mempunyai banyak manfaat yang menguntungkan bagi kesehatan tubuh khususnya bagi ibu hamil. Di dalam susu kedelai terdapat kandungan nutrisi berupa asam folat, kalsium, protein, lemak nabati, karbohidrat, vitamin A, vitamin B1, dan vitamin E sehingga sangat baik untuk kesehatan ibu hamil dan janinnya. Susu kedelai juga dapat dijadikan sebagai pilihan alternatif bagi mereka yang mempunyai alergi terhadap protein hewani.', 'Publish', '2017-03-28', '2017-03-28 03:57:05', '2017-03-28 10:57:05'),
(4, 1, 'Manfaat Buah Mangga', '24.jpg', 'Siapa sih yang tidak kenal dengan buah mangga? Buah yang dianggap sebagai salah satu buah yang nikmat dan enak di ini banyak ditemukan di negara Indonesia, karena pohon mangga merupakan tanaman yang dapat tumbuh subur pada daerah beriklim tropis. Karena merupakan jenis buah musiman yang hanya ada dan berbuah pada saat tertentu saja, mangga menjadi buah yang dirindukan kehadirannya oleh para penggemarnya. ', 'Siapa sih yang tidak kenal dengan buah mangga? Buah yang dianggap sebagai salah satu buah yang nikmat dan enak di ini banyak ditemukan di negara Indonesia, karena pohon mangga merupakan tanaman yang dapat tumbuh subur pada daerah beriklim tropis. Karena merupakan jenis buah musiman yang hanya ada dan berbuah pada saat tertentu saja, mangga menjadi buah yang dirindukan kehadirannya oleh para penggemarnya. \r\n\r\nSama seperti buah jeruk, mangga juga terkenal akan kandungan vitamin C yang dimilikinya. Tak hanya vitamin C, mangga juga mempunyai kandungan nutrisi lainnya seperti vitamin A, vitamin B kompleks, vitamin E, kalium, zat besi, serat, karbohidrat, antioksidan, asam folat dan masih banyak kandungan nutrisi lainnya. Sebelumnya, telah dijelaskan bahwa semua nutrisi yang terdapat di dalam buah mangga akan mudah terserap oleh tubuh jika dikonsumsi dalam bentuk cairan, yaitu dalam olahan jus mangga segar.\r\n\r\nSebagai informasi pelengkap, pada artikel ini juga akan diulas informasi mengenai manfaat jus mangga. Sesuai dengan apa yang dikutip dari situs manfaatbuahalami.com,', 'Publish', '2017-03-28', '2017-03-28 04:17:53', '2017-03-28 11:17:53');

-- --------------------------------------------------------

--
-- Table structure for table `news_category`
--

CREATE TABLE `news_category` (
  `id_kategori` int(5) NOT NULL,
  `kategori` varchar(200) NOT NULL,
  `keterangan` text NOT NULL,
  `status` int(5) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `news_category`
--

INSERT INTO `news_category` (`id_kategori`, `kategori`, `keterangan`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Pembinaan Kaum Muda', 'Pembinaan', 1, '2017-02-27 14:10:38', '2017-02-28 05:14:27'),
(3, 'Keluarga Bahagia', 'Keluarga', 1, '2017-02-27 22:13:24', '2017-02-28 05:13:24'),
(4, 'Mahasiswa', 'Mahasiswa', 1, '2017-03-28 01:07:07', '2017-03-28 00:00:00'),
(5, 'Gizi', 'Gizi', 1, '2017-03-28 09:51:47', '2017-03-28 00:00:00'),
(6, 'Transit', 'Transit', 1, '2017-03-28 09:51:47', '2017-03-28 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `news_sy`
--

CREATE TABLE `news_sy` (
  `id` int(5) NOT NULL,
  `id_news` int(5) NOT NULL,
  `id_kategori` int(5) NOT NULL,
  `status` int(5) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `news_sy`
--

INSERT INTO `news_sy` (`id`, `id_news`, `id_kategori`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 1, '2017-03-28 03:48:55', '2017-03-28 10:48:55'),
(2, 1, 4, 1, '2017-03-28 03:48:55', '2017-03-28 10:48:55'),
(3, 2, 3, 1, '2017-03-28 03:51:38', '2017-03-28 10:51:38'),
(4, 2, 1, 1, '2017-03-28 03:51:38', '2017-03-28 10:51:38'),
(5, 3, 3, 1, '2017-03-28 03:57:05', '2017-03-28 10:57:05'),
(6, 4, 4, 1, '2017-03-28 04:17:53', '2017-03-28 11:17:53'),
(7, 4, 3, 1, '2017-03-28 04:17:53', '2017-03-28 11:17:53'),
(8, 4, 1, 1, '2017-03-28 04:17:53', '2017-03-28 11:17:53'),
(9, 5, 6, 1, '2017-03-28 10:00:24', '2017-03-28 17:00:24'),
(10, 6, 5, 1, '2017-03-28 10:04:08', '2017-03-28 17:04:08'),
(11, 7, 3, 1, '2017-03-28 10:05:16', '2017-03-28 17:05:16');

-- --------------------------------------------------------

--
-- Table structure for table `notification`
--

CREATE TABLE `notification` (
  `id_notif` int(5) NOT NULL,
  `id_transaksi` int(5) NOT NULL,
  `judul` varchar(200) NOT NULL,
  `pesan` text NOT NULL,
  `status` int(5) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `pertemuan`
--

CREATE TABLE `pertemuan` (
  `id_ruangpertemuan` int(5) NOT NULL,
  `ruang_id` int(5) NOT NULL,
  `id_jasa` int(5) NOT NULL,
  `kapasitas` int(5) NOT NULL,
  `fasilitas` text NOT NULL,
  `harga` int(20) NOT NULL,
  `keterangan` text NOT NULL,
  `status` int(3) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pertemuan`
--

INSERT INTO `pertemuan` (`id_ruangpertemuan`, `ruang_id`, `id_jasa`, `kapasitas`, `fasilitas`, `harga`, `keterangan`, `status`, `created_at`, `updated_at`) VALUES
(1, 13, 3, 100, '-', 200000, 'Ruang untuk tamu transit', 1, '2016-12-01 17:15:19', '2016-12-01 17:16:13'),
(2, 2, 3, 30, 'Wireless, Screen (tanpa LCD)', 300000, '30 untuk kursi kuliah, 20 untuk meja kursi', 1, '2016-12-01 17:15:57', '2016-12-01 17:15:57'),
(3, 1, 3, 50, 'Soundsystem, Screen (tanpa LCD)', 500000, 'Kapasitas menjadi 50 orang bila disekat', 1, '2016-12-01 17:18:01', '2016-12-01 17:18:01'),
(4, 1, 3, 100, 'Soundsystem, Screen (tanpa LCD)', 800000, '100 untuk kursi kuliah , 60 untuk meja kursi', 1, '2016-12-01 17:18:27', '2017-04-01 14:47:38'),
(5, 15, 3, 50, 'Ruang Makan Kecil', 0, '-', 1, '2017-04-04 07:24:27', '2017-04-04 07:24:27'),
(6, 14, 3, 100, 'Ruang Makan Besar', 0, '-', 1, '2017-04-04 07:24:55', '2017-04-30 17:58:48');

-- --------------------------------------------------------

--
-- Table structure for table `pesan`
--

CREATE TABLE `pesan` (
  `id_pesan` int(5) NOT NULL,
  `fullname` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `subject` varchar(200) NOT NULL,
  `message` text NOT NULL,
  `status` enum('read','unread') NOT NULL,
  `ac` int(5) NOT NULL,
  `waktu` time NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pesan`
--

INSERT INTO `pesan` (`id_pesan`, `fullname`, `email`, `subject`, `message`, `status`, `ac`, `waktu`, `created_at`, `updated_at`) VALUES
(1, 'Wawan Rahmawan', 'wawan.yagami@gmail.com', 'what about the separatio', 'what about the separation of content', 'read', 1, '09:20:47', '2017-03-07 02:20:47', '2017-03-07 00:00:00'),
(2, 'Kiki Ella', 'kiki@gmail.com', 'what about the world', 'what about the separation of content', 'read', 1, '08:20:47', '2017-03-07 02:20:47', '2017-03-07 00:00:00'),
(3, 'Yunie Antari', 'yuni.antari@rocketmail.co.id', 'Tanya Sesuatu Dong', 'Thank for the clean and nice article, I am having a question, I Implemented e-mail template functionality for signup and forgot password pages . I didn’t do the authentication with username and password but it worked fine for me. After few days later the system not sending mail’s to signup user’s and forgot password user, If I disable template attachment(//$this->email->message($template);) mail is sending if i enable e-mail attachment mail is not sending but in script it was showing success message, could you please help me on this thanks in advance. Here is my code.', 'read', 1, '00:18:19', '2017-03-16 17:18:19', '2017-03-17 00:18:19'),
(4, 'Asisten Jarkom', 'ast.jarkom15@gmail.com', 'Tanya Sesuatu GAN', 'Sebagai informasi pelengkap, pada artikel ini juga akan diulas informasi mengenai manfaat jus mangga. Sesuai dengan apa yang dikutip dari situs manfaatbuahalami.com', 'unread', 1, '00:21:23', '2017-03-16 17:21:23', '2017-03-17 00:21:23'),
(5, 'Kiky Ella', 'wawan.yagami@gmail.com', 'Testing Email', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.', 'read', 1, '01:13:24', '2017-03-16 18:13:24', '2017-03-17 01:13:24'),
(6, 'Asisten Jarkom', 'ast.jarkom15@gmail.com', 'Tanya Sesuatu GAN', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.', 'unread', 1, '01:16:41', '2017-03-16 18:16:41', '2017-03-17 01:16:41'),
(7, 'wawan rahmawan', 'wawan.himura@gmail.com', 'Tanya Sesuatu Dong', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s, ', 'unread', 1, '01:19:25', '2017-03-16 18:19:25', '2017-03-17 01:19:25'),
(8, 'Anisa Karunia', 'anisa@gmail.com', 'Neque porro quisquam est qui dolorem ?', 'There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour ?', 'read', 0, '01:21:53', '2017-03-16 18:21:53', '2017-03-17 01:21:53'),
(9, 'Asisten1 Jarkom1', 'ast.jarkom16@gmail.com', 'Tanya Sesuatu GAN', 'There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour,', 'read', 1, '01:23:35', '2017-03-16 18:23:35', '2017-03-17 01:23:35');

-- --------------------------------------------------------

--
-- Table structure for table `ruang`
--

CREATE TABLE `ruang` (
  `id` int(5) NOT NULL,
  `nama_ruang` varchar(100) NOT NULL,
  `type` varchar(50) NOT NULL,
  `keterangan` text NOT NULL,
  `status` int(5) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ruang`
--

INSERT INTO `ruang` (`id`, `nama_ruang`, `type`, `keterangan`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Ruang Paulus', 'NK', 'Denah 1', 1, '2016-11-30 08:19:51', '2016-11-30 08:19:51'),
(2, 'Ruang sidang kecil', 'NK', 'Denah 1', 1, '2016-11-30 08:20:05', '2017-03-30 10:44:11'),
(3, 'Ruang Konsultasi', 'K', 'Denah 1', 1, '2016-11-30 08:20:26', '2016-11-30 08:20:26'),
(4, 'Ruang Antonius ', 'K', 'Denah 1', 1, '2016-11-30 08:21:00', '2016-11-30 08:21:00'),
(5, 'Ruang Dominikus', 'K', 'Denah 1', 1, '2016-11-30 08:21:26', '2016-11-30 08:21:26'),
(6, 'Ruang Fransiskus', 'K', 'Denah 1', 1, '2016-11-30 08:21:47', '2016-11-30 08:21:47'),
(7, 'Ruang Sesilia', 'K', 'Denah 2', 1, '2016-11-30 08:22:09', '2016-11-30 08:22:09'),
(8, 'Ruang Borromeus', 'K', 'Denah 2', 1, '2016-11-30 08:22:28', '2016-11-30 08:22:28'),
(9, 'Ruang Carolus', 'K', 'Denah 2', 1, '2016-11-30 08:22:47', '2016-11-30 08:22:47'),
(10, 'Ruang Yoseph', 'K', 'Denah 1', 1, '2016-11-30 08:23:05', '2016-11-30 08:23:05'),
(11, 'Ruang Yohanes', 'K', 'Denah 1', 1, '2016-11-30 08:23:30', '2016-11-30 08:23:30'),
(12, 'Ruang Elisabeth', 'K', 'Denah 2', 1, '2016-11-30 08:23:51', '2016-11-30 08:23:51'),
(13, 'Ruang Transit', 'NK', 'Denah 1', 1, '2016-12-01 15:24:02', '2016-12-01 15:24:02'),
(14, 'Ruang Makan Besar', 'RM', 'Denah 1', 1, '2017-03-30 10:40:50', '2017-04-04 07:23:40'),
(15, 'Ruang Makan Kecil', 'RM', 'Denah 1', 1, '2017-04-01 13:40:48', '2017-04-04 07:21:48'),
(16, 'Ruang Doa', 'NK', 'Denah 1', 1, '2017-04-05 22:54:01', '2017-04-05 22:54:01'),
(17, 'Ruang Aula', 'KNT', 'Denah R.Pertemuan', 1, '2017-04-05 22:54:18', '2017-04-21 15:25:11'),
(18, 'Ruang Mensa', 'KNT', 'Denah R.Pertemuan', 1, '2017-04-21 09:49:53', '2017-04-21 15:23:52'),
(19, 'Ruang Rapat', 'KNT', 'Denah R.Pertemuan', 1, '2017-04-21 09:50:08', '2017-04-21 15:23:43'),
(20, 'Lobby', 'KNT', 'Denah R.Pertemuan', 1, '2017-04-21 09:50:23', '2017-04-21 15:23:34');

-- --------------------------------------------------------

--
-- Table structure for table `setting`
--

CREATE TABLE `setting` (
  `id_setting` int(5) NOT NULL,
  `about` text NOT NULL,
  `about_header` text NOT NULL,
  `about_footer` text NOT NULL,
  `phone` varchar(13) NOT NULL,
  `email` varchar(200) NOT NULL,
  `address` text NOT NULL,
  `fb` text NOT NULL,
  `tw` text NOT NULL,
  `yt` text NOT NULL,
  `ig` text NOT NULL,
  `google` text NOT NULL,
  `status` int(5) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `setting`
--

INSERT INTO `setting` (`id_setting`, `about`, `about_header`, `about_footer`, `phone`, `email`, `address`, `fb`, `tw`, `yt`, `ig`, `google`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Rumah retret atau Rumah Pembinaan Carolus Borromeus (RPCB) Syantikara didirikan dengan maksud dan tujuan untuk melayani pengembangan spriritual awam, khususnya melalui pelayanan retret bagi kelompok remaja kaum muda (siswa atau mahasiswa), kelompok dewasa (guru – guru, dosen, suster/bruder/imam), dan lembaga pemerintahan, lembaga swadaya, lembaga gereja, serta masyarakat umum. Sejarah berdirinya Rumah Pembinaan Carolus Borromeus ( RPCB ) Syantikara tidak bisa dilepaskan dengan Yayasan Syantikara yang didirikan pada tanggal 21 November 1959.', 'Rumah retret atau Rumah Pembinaan Carolus Borromeus (RPCB) Syantikara didirikan dengan maksud dan tujuan untuk melayani pengembangan spriritual awam, khususnya melalui pelayanan retret bagi kelompok remaja kaum muda (siswa atau mahasiswa), kelompok dewasa (guru – guru, dosen, suster/bruder/imam), dan lembaga pemerintahan, lembaga swadaya, lembaga gereja, serta masyarakat umum. Sejarah berdirinya Rumah Pembinaan Carolus Borromeus ( RPCB ) Syantikara tidak bisa dilepaskan dengan Yayasan Syantikara yang didirikan pada tanggal 21 November 1959', 'Rumah retret atau Rumah Pembinaan Carolus Borromeus Syantikara didirikan dengan maksud dan tujuan untuk melayani pengembangan spriritual awam, khususnya melalui pelayanan retret bagi kelompok remaja kaum muda, kelompok dewasa, dan lembaga pemerintahan, lembaga swadaya, lembaga gereja, serta masyarakat umum.', '0215836988', 'info@syantikara.com', 'Jl. Colombo No.001, Caturtunggal, Kec. Depok, Kabupaten Sleman, Daerah Istimewa Yogyakarta', 'https://www.facebook.com/', 'https://twitter.com/', 'https://www.youtube.com/', 'https://www.instagram.com/', 'https://plus.google.com/about?hl=id', 1, '2017-02-28 11:46:41', '2017-03-01 20:27:59');

-- --------------------------------------------------------

--
-- Table structure for table `syantikara_token`
--

CREATE TABLE `syantikara_token` (
  `token_id` int(5) NOT NULL,
  `user_id` int(5) NOT NULL,
  `token` varchar(200) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `syantikara_token`
--

INSERT INTO `syantikara_token` (`token_id`, `user_id`, `token`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 5, 'GDdEsRuDszlgLZDwZPHReing370cAxrDoe12AsBnKTv7ZNBeSR', '2017-04-04 01:44:17', '2017-04-04 08:44:17', '2017-04-04 10:14:26'),
(2, 5, 'z4Or2GHsCSGjF5Sf0jQZZZGJt60dM8TEM1XKNggJFOqkL8wKTc', '2017-04-04 02:51:04', '2017-04-04 09:51:04', '2017-04-04 10:15:32'),
(3, 5, 'McrysdSzRdoJ4pQ1HwyTQMok5TGNv5ggJ4vcP4eyoNNPxt2YQP', '2017-04-06 05:54:48', '2017-04-06 12:54:48', NULL),
(4, 5, 'jsp3rgOUMPaAa93NWHzMYqjfAOnpCOmZrUkdR4UNfKbXqVKpL5', '2017-04-06 05:59:47', '2017-04-06 12:59:47', NULL),
(5, 5, 'lQYb60doq79tUU6TFAUDgSW9NZ1pSDuSA3cywXvRLyeOVAJQ6f', '2017-04-30 15:21:15', '2017-04-30 22:21:15', '2017-04-30 22:25:07'),
(6, 5, '10btiNYIsCho59oYiEcqEO1ehRIlKwCea0zR72VIHPvLv6GsD5', '2017-04-30 15:29:14', '2017-04-30 22:29:14', NULL),
(7, 5, 'GxaoFJ5CPaupEVAD5A7DCfhfdwNOltTcXJhIymbe4Xj4ZDU5iY', '2017-05-03 11:59:26', '2017-05-03 18:59:26', NULL),
(8, 5, 'wVz89aYEJNSago00b4A1uplzDuuuAWK6OOkhiKWluNQ9nzH2pa', '2017-05-03 12:03:35', '2017-05-03 19:03:35', NULL),
(9, 5, 'H5ki61kD4MPfkFig7yGe7MuhAbFZd6GsenvhmnCxOVYPjm2f5y', '2017-05-03 12:06:30', '2017-05-03 19:06:30', NULL),
(10, 5, 'FDr3Oxov3aCnDk6igpim9db816dJ5VnJ518fddrRcTNEgR8f7t', '2017-05-03 12:14:56', '2017-05-03 19:14:56', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tarif`
--

CREATE TABLE `tarif` (
  `id_tarif` int(5) NOT NULL,
  `id_jenistamu` int(5) NOT NULL,
  `id_jenistarif` int(5) NOT NULL,
  `tarif` int(20) NOT NULL,
  `keterangan` text NOT NULL,
  `status` int(3) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tarif`
--

INSERT INTO `tarif` (`id_tarif`, `id_jenistamu`, `id_jenistarif`, `tarif`, `keterangan`, `status`, `created_at`, `updated_at`) VALUES
(1, 11, 1, 40000, '-', 0, '2016-11-22 22:06:48', '2016-11-22 22:06:48'),
(2, 10, 1, 100000, '-', 1, '2016-11-22 22:07:10', '2016-11-22 22:07:10'),
(3, 9, 1, 100000, '-', 1, '2016-11-22 22:07:33', '2016-11-22 22:07:33'),
(4, 8, 1, 120000, '-', 1, '2016-11-22 22:07:55', '2016-11-22 22:07:55'),
(5, 7, 1, 120000, '-', 1, '2016-11-22 22:08:16', '2016-11-22 22:08:16'),
(6, 6, 2, 200000, '-', 1, '2016-11-22 22:08:51', '2016-11-22 22:08:51'),
(7, 6, 1, 175000, '-', 1, '2016-11-22 22:09:09', '2016-11-22 22:09:09'),
(8, 5, 2, 250000, '-', 1, '2016-11-22 22:09:37', '2016-11-22 22:09:37'),
(9, 5, 1, 175000, '-', 1, '2016-11-22 22:09:58', '2016-11-22 22:09:58'),
(10, 4, 2, 175000, '-', 1, '2016-11-22 22:10:41', '2016-11-22 22:10:41'),
(11, 4, 1, 150000, '-', 1, '2016-11-22 22:11:03', '2016-11-22 22:11:03'),
(12, 3, 1, 100000, '-', 1, '2016-11-22 22:11:34', '2016-11-22 22:11:34'),
(13, 2, 1, 120000, '-', 1, '2016-11-22 22:11:49', '2016-11-22 22:11:49'),
(14, 1, 2, 225000, '-', 1, '2016-11-22 22:12:35', '2016-11-22 22:12:35'),
(15, 1, 1, 175000, '-', 1, '2016-11-22 22:12:50', '2016-11-22 22:12:50'),
(16, 12, 1, 100000, 'Tanpa Makan', 1, '2017-03-30 10:58:13', '2017-03-30 10:58:13'),
(17, 12, 2, 150000, 'Tanpa Makan', 1, '2017-03-30 10:58:33', '2017-03-30 10:58:33'),
(18, 13, 1, 0, '-', 1, '2017-04-07 14:02:18', '2017-04-30 18:04:04');

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE `transaksi` (
  `id_transaksi` int(5) NOT NULL,
  `instansi` varchar(200) NOT NULL,
  `nama_pemesan` varchar(100) NOT NULL,
  `no_telp` varchar(12) NOT NULL,
  `kegiatan` text NOT NULL,
  `id_jenistamu` int(5) DEFAULT NULL,
  `id_jenistarif` int(5) NOT NULL,
  `jumlah_tamu` int(5) NOT NULL,
  `tgl_checkin` date NOT NULL,
  `tgl_checkout` date NOT NULL,
  `total_bayar` int(10) DEFAULT NULL,
  `dp` int(20) NOT NULL,
  `reduksi` int(20) NOT NULL,
  `Jumlah_Terbayarkan` int(10) NOT NULL DEFAULT '0',
  `status_pembayaran` enum('Lunas','Belum Lunas') DEFAULT NULL,
  `status_order` varchar(100) NOT NULL,
  `permintaan_khusus` text NOT NULL,
  `ac` int(5) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `transaksi_detail`
--

CREATE TABLE `transaksi_detail` (
  `id_transaksi_detil` int(5) NOT NULL,
  `transaksi_id` int(5) NOT NULL,
  `nama_tamu` varchar(100) NOT NULL,
  `jenis_kelamin` varchar(50) NOT NULL,
  `id_ruang` int(5) NOT NULL,
  `id_kamar` int(5) NOT NULL,
  `status` int(3) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `transaksi_detail_additional`
--

CREATE TABLE `transaksi_detail_additional` (
  `transaksi_addt_id` int(5) NOT NULL,
  `transaksi_id` int(5) NOT NULL,
  `additional_id` int(5) DEFAULT NULL,
  `pertemuan_id` int(5) DEFAULT NULL,
  `ruangkantor_id` int(5) DEFAULT NULL,
  `keterangan` text NOT NULL,
  `tarifruangyayasan` int(20) DEFAULT NULL,
  `status` int(5) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id_user` int(10) NOT NULL,
  `name` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(200) NOT NULL,
  `type` varchar(50) NOT NULL,
  `status` int(5) NOT NULL,
  `position` varchar(200) NOT NULL,
  `id_provinsi` int(5) NOT NULL,
  `id_city` int(5) NOT NULL,
  `address` text NOT NULL,
  `phone` varchar(13) NOT NULL,
  `email` varchar(200) NOT NULL,
  `organization` varchar(200) NOT NULL,
  `image` varchar(100) NOT NULL,
  `tgl_daftar` date NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id_user`, `name`, `username`, `password`, `type`, `status`, `position`, `id_provinsi`, `id_city`, `address`, `phone`, `email`, `organization`, `image`, `tgl_daftar`, `created_at`, `updated_at`) VALUES
(1, 'Wawan Rahmawan', 'wawan', '126542c2aa70bd623fc46569b70dd59c', 'Super Admin', 1, 'Super Administrator', 17, 270, 'Jl. Beringin No.109, Kab. Badung - Bali', '085739100513', 'wawan.rahmwan16@gmail.com', 'Universitas Atma Jaya Yogyakarta', 'profile-image.png', '2017-04-01', '2017-04-01 00:00:00', '2017-04-01 00:00:00'),
(2, 'Koordinator RPCB', 'koordinatorrpcb', '4b0d5dbc49998016cf84208675525ba0', 'Admin', 1, 'Koordinator RPCB Syantikara', 15, 230, 'Jl. Colombo CT VI/001, Sleman-Yogyakarta', '0274562263', 'info@syantikara.com', 'Syantikara', '12.jpg', '2017-04-01', '2017-04-01 09:52:19', '2017-05-13 09:57:11'),
(3, 'Admin RPCB', 'adminrpcb', '22f4bc41be18665041ba7a20468f7266', 'Frontoffice', 1, 'Admin RPCB Syantikara', 15, 231, 'Jl. Colombo CT VI/001, Sleman-Yogyakarta', '0274562263', 'admin.staff@syantikara.com', 'Syantikara', 'op2.jpg', '2017-04-01', '2017-04-01 09:54:49', '2017-04-01 09:54:49'),
(4, 'Kepala RPCB', 'kepalarpcb', '7e6c4b69996e4bd27fa0779c040f8628', 'Kepala', 0, 'Kepala RPCB Syantikara', 15, 231, 'Jl. Colombo CT VI/001, Sleman-Yogyakarta', '0274562263', 'kepala@syantikara.com', 'Syantikara', 'S.png', '2017-04-01', '2017-04-01 09:56:18', '2017-04-01 10:13:35'),
(5, 'Indradewi Adnyana', 'dewiq', '876ab312f9d3aae390487d25415fb524', 'Staff', 0, 'Staff Keamanan Syantikara', 17, 270, 'Jl. Malioboro NO.13Z, Yogykarta', '0879631252111', 'dew@mail.com', 'Yayaysan Syantikara', 'icon.png', '2017-04-04', '2017-04-04 00:00:00', '2017-05-03 19:01:48'),
(6, 'Maria Eminingsih', 'emi', '01d5d44446d217910754e51f67d3bf6e', 'Penanggung Jawab', 1, 'Penanggung Jawab', 15, 230, '-', '-', 'emi@mail.com', 'RPCB', 'log.PNG', '2017-04-20', '2017-04-20 00:00:00', '2017-05-13 09:58:52'),
(7, 'Suster Magdelin r', 'syantikara', '5b54d74295eae78a356e9f414330d1e9', 'Admin', 0, 'Kepala Yayasan Syantikara', 15, 231, 'Jl. Colombo CT VI/001, Sleman-Yogyakarta', '02745158056', 'kantorysy@gmail.com', 'Syantikara', 'profile.jpg', '2017-04-21', '2017-04-21 10:18:14', '2017-05-03 11:57:52'),
(8, 'Pimpinan Yayasan Syantikara', 'syantikara', '8ae772341f09b0acfef53735fd5fe9c0', 'Kepala', 1, 'Pimpinan Yayasan Syantikara', 15, 231, 'Jl. Colombo CT VI/01', '0274515805', 'kantor_ysy@yahoo.com', 'Syantikara', '22.jpg', '2017-05-13', '2017-05-13 10:03:35', '2017-05-13 10:03:35');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `additional`
--
ALTER TABLE `additional`
  ADD PRIMARY KEY (`id_additional`);

--
-- Indexes for table `facilities`
--
ALTER TABLE `facilities`
  ADD PRIMARY KEY (`id_fasilitas`);

--
-- Indexes for table `gallery`
--
ALTER TABLE `gallery`
  ADD PRIMARY KEY (`id_gallery`);

--
-- Indexes for table `jasa`
--
ALTER TABLE `jasa`
  ADD PRIMARY KEY (`id_jasa`);

--
-- Indexes for table `jenis_tamu`
--
ALTER TABLE `jenis_tamu`
  ADD PRIMARY KEY (`id_jenistamu`);

--
-- Indexes for table `jenis_tarif`
--
ALTER TABLE `jenis_tarif`
  ADD PRIMARY KEY (`id_jenistarif`);

--
-- Indexes for table `kamar`
--
ALTER TABLE `kamar`
  ADD PRIMARY KEY (`id_kamar`);

--
-- Indexes for table `master_city`
--
ALTER TABLE `master_city`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pro_kota` (`master_province_id`);

--
-- Indexes for table `master_province`
--
ALTER TABLE `master_province`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id_news`);

--
-- Indexes for table `news_category`
--
ALTER TABLE `news_category`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indexes for table `news_sy`
--
ALTER TABLE `news_sy`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notification`
--
ALTER TABLE `notification`
  ADD PRIMARY KEY (`id_notif`);

--
-- Indexes for table `pertemuan`
--
ALTER TABLE `pertemuan`
  ADD PRIMARY KEY (`id_ruangpertemuan`);

--
-- Indexes for table `pesan`
--
ALTER TABLE `pesan`
  ADD PRIMARY KEY (`id_pesan`);

--
-- Indexes for table `ruang`
--
ALTER TABLE `ruang`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `setting`
--
ALTER TABLE `setting`
  ADD PRIMARY KEY (`id_setting`);

--
-- Indexes for table `syantikara_token`
--
ALTER TABLE `syantikara_token`
  ADD PRIMARY KEY (`token_id`);

--
-- Indexes for table `tarif`
--
ALTER TABLE `tarif`
  ADD PRIMARY KEY (`id_tarif`);

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id_transaksi`);

--
-- Indexes for table `transaksi_detail`
--
ALTER TABLE `transaksi_detail`
  ADD PRIMARY KEY (`id_transaksi_detil`);

--
-- Indexes for table `transaksi_detail_additional`
--
ALTER TABLE `transaksi_detail_additional`
  ADD PRIMARY KEY (`transaksi_addt_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `additional`
--
ALTER TABLE `additional`
  MODIFY `id_additional` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `facilities`
--
ALTER TABLE `facilities`
  MODIFY `id_fasilitas` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `gallery`
--
ALTER TABLE `gallery`
  MODIFY `id_gallery` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `jasa`
--
ALTER TABLE `jasa`
  MODIFY `id_jasa` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `jenis_tamu`
--
ALTER TABLE `jenis_tamu`
  MODIFY `id_jenistamu` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `jenis_tarif`
--
ALTER TABLE `jenis_tarif`
  MODIFY `id_jenistarif` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `kamar`
--
ALTER TABLE `kamar`
  MODIFY `id_kamar` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=82;
--
-- AUTO_INCREMENT for table `master_city`
--
ALTER TABLE `master_city`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=503;
--
-- AUTO_INCREMENT for table `master_province`
--
ALTER TABLE `master_province`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;
--
-- AUTO_INCREMENT for table `news`
--
ALTER TABLE `news`
  MODIFY `id_news` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `news_category`
--
ALTER TABLE `news_category`
  MODIFY `id_kategori` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `news_sy`
--
ALTER TABLE `news_sy`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `notification`
--
ALTER TABLE `notification`
  MODIFY `id_notif` int(5) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `pertemuan`
--
ALTER TABLE `pertemuan`
  MODIFY `id_ruangpertemuan` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `pesan`
--
ALTER TABLE `pesan`
  MODIFY `id_pesan` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `ruang`
--
ALTER TABLE `ruang`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT for table `setting`
--
ALTER TABLE `setting`
  MODIFY `id_setting` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `syantikara_token`
--
ALTER TABLE `syantikara_token`
  MODIFY `token_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `tarif`
--
ALTER TABLE `tarif`
  MODIFY `id_tarif` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT for table `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id_transaksi` int(5) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `transaksi_detail`
--
ALTER TABLE `transaksi_detail`
  MODIFY `id_transaksi_detil` int(5) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `transaksi_detail_additional`
--
ALTER TABLE `transaksi_detail_additional`
  MODIFY `transaksi_addt_id` int(5) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
