-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 09 Des 2022 pada 10.43
-- Versi server: 10.4.22-MariaDB
-- Versi PHP: 8.0.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_restotest`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `kosong`
--

CREATE TABLE `kosong` (
  `username` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `id_admin` int(11) NOT NULL,
  `nama_admin` varchar(100) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(191) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `remember_token` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_admin`
--

INSERT INTO `tbl_admin` (`id_admin`, `nama_admin`, `username`, `password`, `created_at`, `updated_at`, `remember_token`) VALUES
(13, 'admin', 'admin', '$2y$10$QdP8uA6ZfIvcZay9TszkcO1ROXoC1YFVXdJhUSzrGuEzQZjG346gS', '2020-11-25 02:21:06', '2020-11-25 02:21:06', NULL),
(14, 'adm', 'adm', '$2y$10$PvgHM4oJDfRJf0NzdP5vFurriAcKchZA635BmlEfWvN656XzvuSlO', '2020-11-25 02:23:21', '2020-11-25 02:23:21', NULL),
(16, 'admon', 'admon', '$2y$10$mUgB2dlR9gZp2awdNZP2P.lOZFGR8Key1NsSRJgMSaLxNSfsGAMTe', '2021-01-21 00:08:09', '2021-01-21 00:08:09', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_feedback`
--

CREATE TABLE `tbl_feedback` (
  `id_feedback` int(11) NOT NULL,
  `isi` text NOT NULL,
  `tanggal` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_kasir`
--

CREATE TABLE `tbl_kasir` (
  `id_kasir` int(11) NOT NULL,
  `nama_kasir` varchar(100) NOT NULL,
  `jenis_kelamin` varchar(15) NOT NULL,
  `alamat` text NOT NULL,
  `no_hp` varchar(12) NOT NULL,
  `email` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(191) NOT NULL,
  `updated_at` date NOT NULL,
  `created_at` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_kasir`
--

INSERT INTO `tbl_kasir` (`id_kasir`, `nama_kasir`, `jenis_kelamin`, `alamat`, `no_hp`, `email`, `username`, `password`, `updated_at`, `created_at`) VALUES
(4, 'candra', 'Laki-Laki', 'kedungwuluh', '0888', 'csaputra@gmail.com', 'kasir', '$2y$10$2I3meOGtwT/42sNV8ladW.RyrMMw0RKZUms1xsUEVfWN02YN3K2PW', '2020-12-29', '2020-12-29');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_masakan`
--

CREATE TABLE `tbl_masakan` (
  `id_masakan` int(11) NOT NULL,
  `nama_masakan` varchar(100) NOT NULL,
  `gambar_masakan` varchar(100) NOT NULL,
  `nama_kategori` varchar(30) NOT NULL,
  `harga` int(11) NOT NULL,
  `status` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_masakan`
--

INSERT INTO `tbl_masakan` (`id_masakan`, `nama_masakan`, `gambar_masakan`, `nama_kategori`, `harga`, `status`) VALUES
(1, 'Bakso Telur', 'BaksoTelur.png', 'dessert', 4500, 'tersedia'),
(2, 'Teh Botol Sosro', 'TehBotolSosro.png', 'minuman', 4000, 'tersedia'),
(3, 'Bakso U16', 'BaksoU16.png', 'makanan', 16000, 'tersedia'),
(7, 'Bakso U18', 'BaksoU18.png', 'makanan', 18000, 'tersedia'),
(22, 'Mie Ayam', 'MieAyamRica.png', 'makanan', 15000, 'tersedia'),
(23, 'Mie Ayam Rica-Rica', 'MieAyam.png', 'makanan', 15000, 'tersedia'),
(24, 'Tebs', 'Tebs.png', 'minuman', 4000, 'tersedia'),
(25, 'Prima', 'Prima.png', 'minuman', 3000, 'tersedia'),
(26, 'Fruit Tea', 'FruitTea.png', 'minuman', 4000, 'tersedia'),
(27, 'Bakso Urat', 'BaksoUrat.png', 'dessert', 3000, 'tersedia'),
(28, 'Tahu Bakso', 'TahuBakso.png', 'dessert', 1500, 'tersedia'),
(29, 'Ceker', 'Ceker.png', 'dessert', 2000, 'tersedia'),
(33, 'Mie Ayam Bakso', 'MieAyamBakso.png', 'makanan', 18000, 'tersedia'),
(34, 'Kerupuk', 'Kerupuk.png', 'dessert', 1000, 'tersedia');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_order`
--

CREATE TABLE `tbl_order` (
  `id_order` int(11) NOT NULL,
  `masakan_id` int(11) NOT NULL,
  `order_detail_id` int(11) NOT NULL,
  `user_order_id` int(11) NOT NULL,
  `tanggal_order` date NOT NULL,
  `status_order2` varchar(30) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `sub_total` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_order`
--

INSERT INTO `tbl_order` (`id_order`, `masakan_id`, `order_detail_id`, `user_order_id`, `tanggal_order`, `status_order2`, `jumlah`, `sub_total`) VALUES
(76, 3, 0, 80, '2022-11-17', 'sedang_dipesan', 2, 32000),
(77, 3, 78, 81, '2022-11-17', 'sudah_dipesan', 1, 16000),
(79, 3, 79, 81, '2022-11-17', 'sudah_dibayar', 2, 32000),
(80, 24, 80, 82, '2022-11-17', 'sudah_dibayar', 1, 4000),
(81, 7, 83, 84, '2022-11-18', 'sudah_dibayar', 1, 18000),
(82, 2, 83, 84, '2022-11-18', 'sudah_dibayar', 1, 4000),
(83, 29, 83, 84, '2022-11-18', 'sudah_dibayar', 1, 2000),
(84, 22, 86, 86, '2022-11-21', 'sudah_dibayar', 1, 15000),
(85, 2, 86, 86, '2022-11-21', 'sudah_dibayar', 1, 4000),
(86, 34, 86, 86, '2022-11-21', 'sudah_dibayar', 1, 1000),
(87, 23, 87, 87, '2022-11-21', 'sudah_dipesan', 1, 15000),
(88, 23, 90, 89, '2022-11-24', 'sudah_dipesan', 1, 15000),
(89, 2, 90, 89, '2022-11-24', 'sudah_dipesan', 1, 4000),
(90, 29, 90, 89, '2022-11-24', 'sudah_dipesan', 1, 2000),
(91, 23, 93, 90, '2022-11-24', 'sudah_dibayar', 1, 15000),
(92, 2, 93, 90, '2022-11-24', 'sudah_dibayar', 1, 4000),
(93, 29, 93, 90, '2022-11-24', 'sudah_dibayar', 1, 2000),
(94, 22, 95, 91, '2022-12-04', 'sudah_dibayar', 1, 15000),
(95, 25, 95, 91, '2022-12-04', 'sudah_dibayar', 1, 3000),
(96, 28, 98, 92, '2022-12-09', 'sudah_dipesan', 1, 1500),
(97, 33, 98, 92, '2022-12-09', 'sudah_dipesan', 1, 18000),
(98, 26, 98, 92, '2022-12-09', 'sudah_dipesan', 1, 4000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_order_detail`
--

CREATE TABLE `tbl_order_detail` (
  `id_order_detail` int(11) NOT NULL,
  `order_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_order_detail`
--

INSERT INTO `tbl_order_detail` (`id_order_detail`, `order_id`) VALUES
(55, 54),
(55, 55),
(57, 56),
(57, 57),
(59, 59),
(63, 62),
(63, 63),
(65, 64),
(65, 65),
(67, 66),
(67, 67),
(70, 68),
(70, 69),
(70, 70),
(71, 71),
(71, 71),
(71, 71),
(73, 73),
(74, 74),
(74, 74),
(75, 75),
(75, 75),
(76, 76),
(76, 76),
(77, 77),
(77, 77),
(78, 77),
(78, 78),
(79, 79),
(80, 80),
(83, 81),
(83, 82),
(83, 83),
(86, 84),
(86, 85),
(86, 86),
(87, 87),
(90, 88),
(90, 89),
(90, 90),
(93, 91),
(93, 92),
(93, 93),
(95, 94),
(95, 95),
(98, 96),
(98, 97),
(98, 98);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_owner`
--

CREATE TABLE `tbl_owner` (
  `id_owner` int(11) NOT NULL,
  `nama_owner` varchar(100) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(191) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `remember_token` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_owner`
--

INSERT INTO `tbl_owner` (`id_owner`, `nama_owner`, `username`, `password`, `created_at`, `updated_at`, `remember_token`) VALUES
(1, 'I Made Witara', 'owner', '$2y$10$gtXwIK82z9C0rKx3cx7/OuQK0SSyS5rs3f7PSLjjVUCdpZLIegIim', '2020-12-29 22:18:36', '2020-12-29 22:18:36', 'tb8m7ZdgT9hgmBOAfuUXoxEgfGxlMbkZr8UunmQk');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_pelanggan`
--

CREATE TABLE `tbl_pelanggan` (
  `id_pelanggan` int(11) NOT NULL,
  `kode` varchar(30) NOT NULL,
  `nama_pelanggan` varchar(100) NOT NULL,
  `no_meja` int(11) NOT NULL,
  `password` varchar(200) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `remember_token` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_pelanggan`
--

INSERT INTO `tbl_pelanggan` (`id_pelanggan`, `kode`, `nama_pelanggan`, `no_meja`, `password`, `created_at`, `updated_at`, `remember_token`) VALUES
(36, 'plg0', 'sa', 2, '$2y$10$L3./KJC0leG2ilwMeWed/Ot5J0xjsJF5lNEyK5h1X91AGwGP9KgHa', '2021-01-14 22:12:03', '2021-01-14 22:12:03', 'ItIqmWGv4CWNYZrCJEDBcMlujzQvND3kvQDKifzsS8HlAjuRdxgOF93pVOEK'),
(37, 'plg1', 'q', 1, '$2y$10$ppgMF5EWFgpMNRgvlFV81OoJoLgmLMamK3Xv147FG/ES3T2/1GXpK', '2021-01-17 23:14:36', '2021-01-17 23:14:36', 'aWIEka2tCwqJXVqupOdSKoDDeBINTH'),
(38, 'plg2', 'dra', 1, '$2y$10$CHhM1EYsKkFh6WvwSK3PvuofzmqxCWkz/x6xAp/Yi/mj.eegGDXEW', '2021-01-18 18:18:37', '2021-01-18 18:18:37', 'kVObE3kZ6ha0PNDEQdbvDQnBKnq935'),
(39, 'plg3', 'a', 1, '$2y$10$lQvaN8aqIiZCwN9CzHGt1OWXzj77IKeHM6c6r6jIHRDGQuKTgFXKK', '2021-01-18 20:44:48', '2021-01-18 20:44:48', 'WG3VHq6MctmvRZPWAXeShObDg9MwUp'),
(40, 'plg4', 'eren', 1, '$2y$10$8ig5JGj5IZ1SJysjNujGJuax3WzV1KGzojZS1KQh1w8SQI/6Cl4ii', '2021-01-19 17:27:31', '2021-01-19 17:27:31', 'p8DcE3bZVyez3mOqlsDQ8rsQ5qgcFK'),
(41, 'plg5', 'candra', 1, '$2y$10$N6xlrJYcrOt0QLv1o7hPsukkjcwAp26OAT6jdq9BM1ZZwj6Pohqw6', '2021-01-20 17:20:19', '2021-01-20 17:20:19', 'QTTuUBMHNbxJvrpCD1XM5S3ojrFwt4'),
(42, 'plg6', 'candra', 1, '$2y$10$2wCjlXaPm.E9oT81ouCmD.0QA3GzsXDaqj1aw5wrm4eM.PsZ13ZGu', '2021-01-21 17:58:45', '2021-01-21 17:58:45', '02BIVjBuwUh0csC5ocWA2s4wgMAgaB'),
(43, 'plg7', 'candra', 1, '$2y$10$J82aPjc57MXCTR7gfEEITOymzindMz3VW2W9BhK6rSoWtgrvVRnea', '2021-01-24 18:48:10', '2021-01-24 18:48:10', 'G1n8ZPCtHdmVQ9bfDqO5iY6OyGap1Y'),
(44, 'plg8', 'a', 1, '$2y$10$Sxt3cS/8a0x/.Xs5NcSGsOK2bKxYDGAAtusMZwr274SY5ENo6F.K6', '2021-02-01 19:01:29', '2021-02-01 19:01:29', 'kg00K6BdKH01pgldQeDu9iVoli4Wg3hfzao8achJrP2KUFEi7hdrPGDmnQWj'),
(45, 'plg9', 'candra', 1, '$2y$10$vNpwgFMUVn2jeVTSlcB0QOckchsUVqULzzpD7cRf68RjG8eT3EzlS', '2021-02-01 20:08:15', '2021-02-01 20:08:15', '1hN6EGDe7UyvuxfSujkjX9Rt38nWJt0oGG8IH8PxOFO7FWKeJY5l5MpcojlX'),
(46, 'plg10', 'candra', 1, '$2y$10$hpYMGSdzeX4n1WDTB4ZZ7uE.XciCc0eK0ceQSareaptXbG2een9Bm', '2021-02-10 23:03:10', '2021-02-10 23:03:10', 'cQ9ORqkrclLPFYGXyOjYZGrCB3PYOb'),
(47, 'plg11', 'boy', 78, '$2y$10$4.FZ5iHpPJrxAWC71uX.m.Q3vWcj937b9SGAc3i6AUdTIpvPC6wuu', '2022-11-13 02:06:35', '2022-11-13 02:06:35', 'ekDt44wUomfcKWF6reRUsWIuMxfjJh'),
(48, 'plg12', 'asraf', 2, '$2y$10$fAnw6UgNk0.Wr71iXCKuAeAiKL175QNwNKZWlUOFbhopmQZTagl5W', '2022-11-13 02:06:51', '2022-11-13 02:06:51', 'L58vAvOpbIeSPaer4XSSFDyC1KsPuX9ldxEaTh7g6l3ATjAAF7S5Dq0PD5Ye'),
(49, 'plg13', 'boy', 2, '$2y$10$94gt.Xhxx5qyG.Thfp2f5euzKy/5nwpi6zA3L5fYpzePSrzO56DXC', '2022-11-13 02:14:07', '2022-11-13 02:14:07', 'VpHOvvzDedARx5ic5sI6e436e6qqqx'),
(50, 'plg14', 'doni', 3, '$2y$10$XLQb1IIowMpdqfK0VZhzkeLGrwfD7OoxFhzi9zX9p/p9D1ESWc/kO', '2022-11-13 02:38:13', '2022-11-13 02:38:13', '60xB0wxGjgC0Vrzqpkhus80fjldnrh'),
(51, 'plg15', 'doni', 3, '$2y$10$IJRMQxjUFySqeuqPYwtKouBswCcANjbaU1as//qeQKhSOKci3lWvm', '2022-11-13 02:40:09', '2022-11-13 02:40:09', 'Ic0Skf5nYzV0UGgBS9VAD2DY9afo0RgCbGy8JfIRMHIOhR7SGoJJOkMjlppG'),
(52, 'plg16', 'umi', 4, '$2y$10$Wz0ZuWkrpfN.B/b.94RDBOxA567.980Zg3BkLsX.CrpIKnsQUn8gy', '2022-11-13 03:24:29', '2022-11-13 03:24:29', '3oUGYsdIecK4JYTC01xbFNAqzDX5Ej'),
(53, 'plg17', 'rini', 10, '$2y$10$Z.EGztATxoQOlCqqJ4bIa.byuxbdVmLViuZsZQuDfbrCn3KDsjWTW', '2022-11-13 03:32:22', '2022-11-13 03:32:22', 'xHn9daT0IYbfQgxZHOfagS3AoAvQWX'),
(54, 'plg18', 'dzaky', 10, '$2y$10$CIxlknMs/w2huV4p/rcrA.ewgpZRJal459.3bPymEHs3XpDWBLzva', '2022-11-13 20:13:33', '2022-11-13 20:13:33', 'UJpZHeRjxRNkAFZogR25osxMm16ypm'),
(55, 'plg19', 'dzaky', 12, '$2y$10$iq.X./.m32MO7XuPB/mreevCnxnQ3NiISTXKfTvyhSEIsRZYVVlki', '2022-11-13 21:36:24', '2022-11-13 21:36:24', 'wdgMT7rSmr78LLLsyyOa0MfHPPGx1d'),
(56, 'plg20', 'bob', 12, '$2y$10$Ix2rHOyVz.X8ilKFSXmxiOjClU69lU0bexZb6Ui14MXQ76gb2pEqe', '2022-11-13 21:57:11', '2022-11-13 21:57:11', 'BPx7CdzLn6JgZZVLJKZERR5mALuD14'),
(57, 'plg21', 'xbs', 22, '$2y$10$ZOCNd9kDC/t1hEcKe8g2AuZKjcH0K6xTL1YFxeOS3PrdS.KguBMVW', '2022-11-13 21:59:52', '2022-11-13 21:59:52', '48Mutsp4KwYNSewBVr0igkkHprwvwO'),
(58, 'plg22', 'va', 12, '$2y$10$JV7Bo1Zt9XccTavF2NQtt.BvmimwKLNxYKd8slXvI9YBUbgIUm1tC', '2022-11-13 22:00:57', '2022-11-13 22:00:57', 'VBnu066PJ5RqNGOjQLImtmmU0CqQLD'),
(59, 'plg23', 'wowo', 11, '$2y$10$n3dS//jPd1uFhH.S5/3o6.R4JHEi.vy0/aNJeBG6Ytdz0IApovBwK', '2022-11-13 22:07:09', '2022-11-13 22:07:09', 'aWDkUYOe66GqspCdNVURfliCXYolXc'),
(60, 'plg24', 'paps', 13, '$2y$10$IYYUkjKcwoa02cDCHNP.Juv1z.o4Hhozm4CZC6TmJJwxc3cXJKur6', '2022-11-13 22:13:20', '2022-11-13 22:13:20', 'AO2kAH8oB3g4EHSBUQkEV7PSWwwB5b'),
(61, 'plg25', 'jojo', 13, '$2y$10$MItKuD7PsQFK.rnAAZYYF..6eKL/.NpkyzsKHBgfaclqsMYnM9E92', '2022-11-13 22:18:00', '2022-11-13 22:18:00', 'iBH69sBtSAZ4GJ6AXuOykv444V3USC'),
(62, 'plg26', 'qwerty', 12, '$2y$10$gKBsB/ceSX4rkGvQtSQHM.OutG5IMjX0Zsc8m0c0337dIOUG7dLdm', '2022-11-13 22:34:26', '2022-11-13 22:34:26', '9xB73kVeudJjgH1MVgYMq2ziFxFeZQ'),
(63, 'plg27', 'wee', 13, '$2y$10$qfHx10PNnyn.6DnNp/Vj4.SOQ9eYVIbta9gP5vVJr37gzFwlTYFaq', '2022-11-13 22:40:18', '2022-11-13 22:40:18', 'q5E47mXKLIyMVaRwZ7YIBLGmPvxGCOEAm2Qh1ACrVCjOK3LzU6S9fqMsb6mY'),
(64, 'plg28', 'Fathur Coding', 23, '$2y$10$GpohKZ3.v5q2Lwkjm6Nk8OM6/i0K61UR7Ylxk9yfvJqBhMlm1mqyK', '2022-11-13 23:14:35', '2022-11-13 23:14:35', 'l0LaW2VpatNrrNi9kbq8cpwuCysg4O'),
(65, 'plg29', 'boy', 1, '$2y$10$H9.8bCzsnThc9TFDqNm5Yeg7O82GKd8Oqb8VfZNX3yo/x5oesxvQa', '2022-11-14 00:06:59', '2022-11-14 00:06:59', 'GJhtlhBRIeKMxtGXmqu4hlhPmAKfh9'),
(66, 'plg30', 'pak', 13, '$2y$10$QnvGY38XNHtjsaLyKkqAmu45xRakRoLeELhN4cABtt07KfGpmwl3y', '2022-11-14 05:45:56', '2022-11-14 05:45:56', 'i8jPBW3fSk71e6obqrpwyzfSjyDlsF'),
(67, 'plg31', 'eka', 4, '$2y$10$b6blPIKjzUB85aJ6CCZzRu1vPNzXtshEu8zCQrn1MLI33H/j//Ljy', '2022-11-14 10:43:34', '2022-11-14 10:43:34', 'kMJol2Zp03udyOwqjPstXcFGNa8TPfQ3vmrgsL43140iCEOG8fQq58NfOppL'),
(68, 'plg32', 'ari', 10, '$2y$10$CHdAx73c10.wg2wIo4g4g.S18nb../tXCQISYMcFJNl2689Aca/eC', '2022-11-14 23:28:38', '2022-11-14 23:28:38', 'JzxMz2J49ByHGtR7ilsTp9xqnrv2fj'),
(69, 'plg33', 'asraf', 10, '$2y$10$q07YlTLC5jXjP3ELj8erZePzqf6s2qeU282vjjGGmlFMeWnijl/Pq', '2022-11-16 03:54:47', '2022-11-16 03:54:47', 'dl0SjTdKVeZprt4msop43C4ystmmBd'),
(70, 'plg34', 'tuturae', 12, '$2y$10$cRmsMnTM5mpk2eoV7/iHTe84cRfdkcdxcGgji/eWCoq.M9eZYXSKG', '2022-11-16 03:59:56', '2022-11-16 03:59:56', 'qdqHjbjN6ocFhJHxdRL8T9S2OJYz2S'),
(71, 'plg35', 'nunu', 1, '$2y$10$O7yqQhO3J.Qm0ZZ.3CfDHeHwdUha5xdIbyRVlLbal8IEZIteyirby', '2022-11-16 18:51:07', '2022-11-16 18:51:07', 'FIXxkSUO7Pl9UFTzBzVeArSsV0U2gq'),
(72, 'plg36', 'sidik', 9, '$2y$10$V5/CsMBkGb5HcrTAzt8RSuNHy0omboU/yWJ2sxAl8rcesLCf7y9Aa', '2022-11-17 04:10:34', '2022-11-17 04:10:34', 'HSuotjDyWxsK0AtyrI7852j2LAwun6'),
(73, 'plg37', 'adi', 112131, '$2y$10$psive4m3N.wyjpxihvxpcO90Cj7g.KjqUE/MekJuPxLsPdfzMnUDy', '2022-11-17 04:14:54', '2022-11-17 04:14:54', 'pqN6RqRv1410dbQBvlMLgU87GQZneX'),
(74, 'plg38', 'adi', 112131, '$2y$10$tv1pXB1usJMRyLpW2By2yuex/PCFqXM0LpaUuEM8hWdV6fgi2NMWe', '2022-11-17 04:18:15', '2022-11-17 04:18:15', 'mTZNfXgoMFtC8lrjN0K8zKgcnV0WCe'),
(75, 'plg39', 'world', 1, '$2y$10$CIXDJP7iF24olphQFUX1eeNd6mxX.lDMXz67qQk21zB8gvUQrqm4G', '2022-11-17 04:25:10', '2022-11-17 04:25:10', 'PRZ4QuijdrefqmzbzD7QbzQA6CFN1c'),
(76, 'plg40', 'Naruto', 5, '$2y$10$2dZoBWAVLFUk6J8RfN14oueZHD4CwhfsPqz/hlIiatJb7bi2ez5fS', '2022-11-17 04:40:18', '2022-11-17 04:40:18', 'bvmREAnDuiHD8X5SbH7mOjfEoEEdws'),
(77, 'plg41', 'Naruto', 5, '$2y$10$dLK0rpx4SVlXwqnFoQUTD.GkQXwW0H2OrW54yBqeze6BE.GeCJeaa', '2022-11-17 04:40:45', '2022-11-17 04:40:45', 'n5EBmMV5LVTKyIuR0mbNsylCeYSKuj'),
(78, 'plg42', 'Naruto', 2, '$2y$10$6dL56P79adjLlTLvlLzxZeuqLwaxU4apbEdV3U/8sUSkdfDVt8cBC', '2022-11-17 04:45:03', '2022-11-17 04:45:03', 'uxnh7Q9jKK0Fbp9OR1ILknVxG7Pk01'),
(79, 'plg43', 'boy', 4, '$2y$10$o6Rd2d4whVhSbzaNojVE8.FVi/czCb6qdP/6rGwRYMpZfRJBz/DzG', '2022-11-17 04:46:46', '2022-11-17 04:46:46', 'uXvcolSYv8xO4UDNeElKBop83jZniEjNSRe3kybnVuFGctcw7FHTYaatmze4'),
(80, 'plg44', 'Naruto', 5, '$2y$10$qP3XvXv.W0AMdRD4KIbPYO5gO/fkTUzLNHlhJQgEgRbOXjGiAJOJ6', '2022-11-17 04:49:59', '2022-11-17 04:49:59', 'RWjDDUMA2swF4T7RB39RhPCx8WRTVF'),
(81, 'plg45', 'asraf', 6, '$2y$10$qgYqqG9kF82x3jE.6Yj8peAbyEnPO/kKE.gRKaCB7pkIAr/t0x1pG', '2022-11-17 04:50:49', '2022-11-17 04:50:49', 'o0XU3x6Iqxo2pjh5eb9sGoYaguOXwP'),
(82, 'plg46', 'adi', 2, '$2y$10$iNh8.2l38ecyRsQN1oeQGu6Z6zGF0uzr7OCUSPp8VSHv5N2/OnLiO', '2022-11-17 05:29:31', '2022-11-17 05:29:31', 'rkZKxYeYzgw7DBABXPaecvbkNCPiFq'),
(83, 'plg47', 'ari', 2, '$2y$10$MKIHdbFI2ZCB7BmVUt5P4OCTuSpOCxz/WYTPDLH9YTwoPnaLNRhPm', '2022-11-17 20:52:34', '2022-11-17 20:52:34', '2mwoWOBevT8Lcgshc7M4fHZfvlO4Exe8miqQ47x4vS5W7v7V83sxrxIf2V9J'),
(84, 'plg48', 'Uswatun Hasanah', 5, '$2y$10$M/YWUCwuE8T4EX14F0MtSuDK6O.URRtueTdt3nZxZskkcaZQRdbGu', '2022-11-18 04:19:42', '2022-11-18 04:19:42', 'NXSddNFznTwhk1a4teQ8rUkJjezzZh'),
(85, 'plg49', 'al', 2, '$2y$10$uqcTGKuGbK9Z0sE2y7ugmuwumBsRrxDK0cxk6pEeF/TQYV9I6hn6q', '2022-11-21 03:57:46', '2022-11-21 03:57:46', 'WXtFbiyATTkHjUjXNVooF6e9A5u0E9EI0eoKXbtzqPxCVNCJhpmlvPqVjc6c'),
(86, 'plg50', 'boy', 5, '$2y$10$8FMXk58eNFkAMe1jWBkEi.TbZ.AXsfQ8GhYLFFQJyJIo/0Zc23BTi', '2022-11-21 09:45:41', '2022-11-21 09:45:41', 'tSNBlYh73W7s6jCiPgOAKGfQxloyREqEp8EixfWkNgihPGiU7Ac49egrlesv'),
(87, 'plg51', 'eka', 12, '$2y$10$tQtudXykbcaM72s4Aszdqu8wSADdCCicU1c61FFt2wZYDuzY8V9om', '2022-11-21 09:59:27', '2022-11-21 09:59:27', 'JQqMIB4mIVLIDkjXbPkbCWVjdYarYz'),
(88, 'plg52', 'eko', 10, '$2y$10$qP0YRdBPIFmFUyyS85yUL.NRcXKoH0fazs8iUSSFDUV4jDCJP7FG6', '2022-11-21 10:31:06', '2022-11-21 10:31:06', 'YkalMdZl7QhCjRmO6EQWYIocQ0XpxK'),
(89, 'plg53', 'Daifulloh', 2, '$2y$10$1f6WRqcjPr/qcGSyBQcAOeH.NrdqpMT1/Xs/8xfeOuQQ2jlxqsvoK', '2022-11-24 01:55:20', '2022-11-24 01:55:20', 'hcGmmLimSZierK9MljE2sRsG69hGXI'),
(90, 'plg54', 'daifulloh', 3, '$2y$10$VOyYfFU5IemVFxMyYDIve.vIzleZQy2GY4d.y3JmhGhG/CKkWbuu2', '2022-11-24 02:13:05', '2022-11-24 02:13:05', 'Hh0uIDKCNacb9kwr7lHF7YJRVjzBRg'),
(91, 'plg55', 'dhafa', 10, '$2y$10$KXcs60tG3XI6GWrMNdZE2uGrIYp8OhsOgQw/SjIxX6T0rj741RhJG', '2022-12-04 02:04:36', '2022-12-04 02:04:36', 'uvvgba2uzjLiJJs3rb3yOgAFrmaAKS'),
(92, 'plg56', 'januardi', 8, '$2y$10$2za7WwktdynrKpQ8b2/.0eMYe9vbGN5ItJ8.Vp3o5P1uP71zDqfDu', '2022-12-09 02:00:29', '2022-12-09 02:00:29', '8ByaPxhr309WxIolMtAA2QlaPzAFP5');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_transaksi`
--

CREATE TABLE `tbl_transaksi` (
  `id_transaksi` varchar(100) NOT NULL,
  `order_detail_id` int(11) NOT NULL,
  `tanggal_transaksi` date NOT NULL,
  `total_bayar` int(11) NOT NULL,
  `jumlah_pembayaran` int(11) NOT NULL,
  `kembalian` int(11) NOT NULL,
  `user_transaksi_id` int(11) NOT NULL,
  `status_order` varchar(50) NOT NULL,
  `diantar` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_transaksi`
--

INSERT INTO `tbl_transaksi` (`id_transaksi`, `order_detail_id`, `tanggal_transaksi`, `total_bayar`, `jumlah_pembayaran`, `kembalian`, `user_transaksi_id`, `status_order`, `diantar`) VALUES
('ORDER10', 87, '2022-11-21', 15000, 0, 0, 87, 'belum_dibayar', 'belum'),
('ORDER11', 90, '2022-11-24', 21000, 0, 0, 89, 'belum_dibayar', 'belum'),
('ORDER12', 93, '2022-11-24', 21000, 50000, 29000, 90, 'sudah_dibayar', 'belum'),
('ORDER13', 95, '2022-12-04', 18000, 20000, 2000, 91, 'sudah_dibayar', 'belum'),
('ORDER14', 98, '2022-12-09', 23500, 0, 0, 92, 'belum_dibayar', 'belum'),
('ORDER5', 78, '2022-11-17', 20000, 0, 0, 81, 'batal_dipesan', 'belum'),
('ORDER6', 79, '2022-11-17', 32000, 50000, 18000, 81, 'sudah_dibayar', 'sudah'),
('ORDER7', 80, '2022-11-17', 4000, 5000, 1000, 82, 'sudah_dibayar', 'belum'),
('ORDER8', 83, '2022-11-18', 24000, 100000, 76000, 84, 'sudah_dibayar', 'sudah'),
('ORDER9', 86, '2022-11-21', 20000, 50000, 30000, 86, 'sudah_dibayar', 'sudah');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_waiter`
--

CREATE TABLE `tbl_waiter` (
  `id_waiter` int(11) NOT NULL,
  `nama_waiter` varchar(100) NOT NULL,
  `jenis_kelamin` varchar(10) NOT NULL,
  `alamat` text NOT NULL,
  `no_hp` varchar(12) NOT NULL,
  `email` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(191) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `remember_token` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_waiter`
--

INSERT INTO `tbl_waiter` (`id_waiter`, `nama_waiter`, `jenis_kelamin`, `alamat`, `no_hp`, `email`, `username`, `password`, `created_at`, `updated_at`, `remember_token`) VALUES
(1, 'candra', 'Laki-Laki', 'kdw', '088', 'cs@g.com', 'waiter', '$2y$10$Tx4LI9f82x3Q6WqsMUYdEeRDZYRqfkmBwEsZASEZcQr75rdeHEVMu', '2020-11-23 00:45:47', '2020-12-29 03:54:18', '1zWgzNvIpGJfvDH6I7OsC9WIqqHuUIgSDMVCja9SQ76WOKvG3lGKCj9Hgos1');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indeks untuk tabel `tbl_feedback`
--
ALTER TABLE `tbl_feedback`
  ADD PRIMARY KEY (`id_feedback`);

--
-- Indeks untuk tabel `tbl_kasir`
--
ALTER TABLE `tbl_kasir`
  ADD PRIMARY KEY (`id_kasir`);

--
-- Indeks untuk tabel `tbl_masakan`
--
ALTER TABLE `tbl_masakan`
  ADD PRIMARY KEY (`id_masakan`);

--
-- Indeks untuk tabel `tbl_order`
--
ALTER TABLE `tbl_order`
  ADD PRIMARY KEY (`id_order`),
  ADD KEY `masakan_id` (`masakan_id`);

--
-- Indeks untuk tabel `tbl_owner`
--
ALTER TABLE `tbl_owner`
  ADD PRIMARY KEY (`id_owner`);

--
-- Indeks untuk tabel `tbl_pelanggan`
--
ALTER TABLE `tbl_pelanggan`
  ADD PRIMARY KEY (`id_pelanggan`),
  ADD UNIQUE KEY `kode` (`kode`);

--
-- Indeks untuk tabel `tbl_transaksi`
--
ALTER TABLE `tbl_transaksi`
  ADD PRIMARY KEY (`id_transaksi`),
  ADD KEY `order_id` (`order_detail_id`);

--
-- Indeks untuk tabel `tbl_waiter`
--
ALTER TABLE `tbl_waiter`
  ADD PRIMARY KEY (`id_waiter`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT untuk tabel `tbl_feedback`
--
ALTER TABLE `tbl_feedback`
  MODIFY `id_feedback` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `tbl_kasir`
--
ALTER TABLE `tbl_kasir`
  MODIFY `id_kasir` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `tbl_masakan`
--
ALTER TABLE `tbl_masakan`
  MODIFY `id_masakan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT untuk tabel `tbl_order`
--
ALTER TABLE `tbl_order`
  MODIFY `id_order` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=99;

--
-- AUTO_INCREMENT untuk tabel `tbl_owner`
--
ALTER TABLE `tbl_owner`
  MODIFY `id_owner` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `tbl_pelanggan`
--
ALTER TABLE `tbl_pelanggan`
  MODIFY `id_pelanggan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=93;

--
-- AUTO_INCREMENT untuk tabel `tbl_waiter`
--
ALTER TABLE `tbl_waiter`
  MODIFY `id_waiter` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
