-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 08, 2022 at 04:49 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `logbook`
--

-- --------------------------------------------------------

--
-- Table structure for table `dept`
--

CREATE TABLE `dept` (
  `id_dept` int(11) NOT NULL,
  `nama_dept` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `dept`
--

INSERT INTO `dept` (`id_dept`, `nama_dept`) VALUES
(1, 'Ruang Melati'),
(2, 'Ruang Mawar'),
(3, 'Ruang Anggrek');

-- --------------------------------------------------------

--
-- Table structure for table `kode`
--

CREATE TABLE `kode` (
  `id_kode` int(11) NOT NULL,
  `value` varchar(10) NOT NULL,
  `number` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kode`
--

INSERT INTO `kode` (`id_kode`, `value`, `number`) VALUES
(1, 'PK1', '097'),
(2, 'PK2', '000'),
(3, 'PK3', '000'),
(4, 'PK4', '000'),
(5, 'PK5', '000');

-- --------------------------------------------------------

--
-- Table structure for table `logbook`
--

CREATE TABLE `logbook` (
  `id_log` int(11) NOT NULL,
  `kode_id` int(11) NOT NULL,
  `kompetensi` varchar(100) NOT NULL,
  `kode` varchar(10) NOT NULL,
  `kewenangan` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `logbook`
--

INSERT INTO `logbook` (`id_log`, `kode_id`, `kompetensi`, `kode`, `kewenangan`) VALUES
(8, 1, 'Asuhan Keperawatan Dasar', 'PK1001', 'Pengkajian Individu'),
(9, 1, 'Komunikasi ', 'PK1002', 'Komunikasi Terapeuti'),
(10, 1, 'Edukasi', 'PK1003', 'Edukasi PHBS'),
(11, 1, 'Penggunaan Alat', 'PK1004', 'Pencegahan Infeksi'),
(12, 1, 'Perawatan Sederhana', 'PK1005', 'Perawatan luka'),
(13, 2, 'Asuhan Keperawatan ', 'PK2001', 'Perawatan Partial at'),
(14, 2, 'Asuhan Keperawatan ', 'PK2002', 'Perencanaan Interven'),
(15, 2, 'Klasifikasi Pasien', 'PK2003', 'Identifikasi Tingkat'),
(16, 2, 'Prinsip Etik dan Legal', 'PK2004', 'Menerapkan Prinsip E'),
(17, 2, 'Keselamatan Pasien', 'PK2005', 'Pengkajian Identifik'),
(18, 3, 'Asuhan Keperawatan ', 'PK3001', 'Perawatan Partial at'),
(19, 3, 'Asuhan Keperawatan ', 'PK3002', 'Menetapkan Jenis Int'),
(20, 3, 'Prinsip Kepemimpinan', 'PK3003', 'Menerapkan Konsep Pe'),
(21, 3, 'Prinsip Etik dan Legal', 'PK3004', 'Pengambilan Keputusa'),
(22, 3, 'Keselamatan Pasien', 'PK3005', 'Melaksanakan Analisi'),
(23, 4, 'Asuhan Keperawatan ', 'PK4001', 'Perawatan Partial at'),
(24, 4, 'Asuhan Keperawatan ', 'PK4002', 'Menetapkan Tata Kelo'),
(25, 4, 'Prinsip Kepemimpinan', 'PK4003', 'Menetapkan Upaya Per'),
(26, 4, 'Prinsip Kepemimpinan', 'PK4004', 'Melaksanakan Percept'),
(27, 4, 'Prinsip Etik Legal', 'PK4005', 'Melakukan Tahapan Pe'),
(28, 5, 'Asuhan Keperawatan ', 'PK5001', 'Implementasi Keperaw'),
(29, 5, 'Asuhan Keperawatan ', 'PK5002', 'Implementasi Keperaw'),
(30, 5, 'Pengabdian Masyarakat', 'PK5003', 'Diseminasi Upaya Pro'),
(31, 5, 'Pengabdian Masyarakat', 'PK5004', 'Implementasi Surveil'),
(32, 5, 'Prinsip Etik Legal', 'PK5005', 'Pembinaan Etik dan D');

-- --------------------------------------------------------

--
-- Table structure for table `pelatihan`
--

CREATE TABLE `pelatihan` (
  `id_pelatihan` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `nama_pelatihan` varchar(200) NOT NULL,
  `tanggal` date NOT NULL,
  `skp` varchar(20) NOT NULL,
  `sertifikat` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pelatihan`
--

INSERT INTO `pelatihan` (`id_pelatihan`, `user_id`, `nama_pelatihan`, `tanggal`, `skp`, `sertifikat`) VALUES
(2, 6, 'MIGRASI GAS', '2022-11-22', '22', 'User-migrasi-gas-221129-5adf1b14e6.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `pilihan`
--

CREATE TABLE `pilihan` (
  `id_pilih` int(11) NOT NULL,
  `logbook` int(11) NOT NULL,
  `user` int(11) NOT NULL,
  `ruang` int(11) NOT NULL,
  `metode` varchar(30) NOT NULL,
  `status` int(11) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pilihan`
--

INSERT INTO `pilihan` (`id_pilih`, `logbook`, `user`, `ruang`, `metode`, `status`, `date`) VALUES
(5, 13, 6, 1, 'Silahkan dipilih', 1, '2022-12-05');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `nip` varchar(50) NOT NULL,
  `tanggal_lahir` date DEFAULT NULL,
  `role` int(11) NOT NULL,
  `password` varchar(255) NOT NULL,
  `foto` text NOT NULL,
  `kode_pk` int(11) DEFAULT NULL,
  `dept` int(11) DEFAULT NULL,
  `is_active` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `nama`, `username`, `email`, `nip`, `tanggal_lahir`, `role`, `password`, `foto`, `kode_pk`, `dept`, `is_active`) VALUES
(1, 'Administrator', 'admin', 'admin@admin.com', '1111', '2022-11-02', 1, '$2a$12$jYPABfVC1znjp3QIMRYBduehjz0wcOyEZNQl0/kso//RopOrXESm2', 'user.png', NULL, 0, 1),
(2, 'User', 'user', 'user@user.com', '11111', '1900-01-04', 2, '$2a$12$jYPABfVC1znjp3QIMRYBduehjz0wcOyEZNQl0/kso//RopOrXESm2', 'user.png', 2, 0, 1),
(3, 'tes', 'royyan', 'royyan@mail.com', '19283', '2000-11-08', 2, '$2y$10$1XS.fWjZDpQLCD9mfd81revrHf1Mi2BapooutYnhp0tTPvm8Fff6a', 'user.png', 2, 0, 1),
(4, 'Pendaftaran akun', 'royyanmz', 'royyanmm@masd.ad', '1238123', '2000-11-08', 2, '$2y$10$bWxEfavus4m7bP/Gdkg4bOJNgrbxAsJsSwoDZvQ8WtTz6pvKGGURC', 'user.png', 3, 0, 1),
(5, 'hehehehehe', 'sayacoba', 'coba@gmail.com', '01202', '2000-10-08', 1, '$2y$10$CY3uWMk.Gm2TcFGMkj3uPuNWkHYPlOuXBcSHt0vTwjDj2M5/K2wS2', 'user.png', NULL, 1, 1),
(6, 'huhuhuhu', 'cobalagi', 'lagi@lagi.com', '02202', '2000-11-02', 2, '$2y$10$v.YdBlNJfhLtUzUTVPJ37u5pwNUv1WT9S1niotkTTYi2pgsDrVJ06', 'user.png', 2, 1, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `dept`
--
ALTER TABLE `dept`
  ADD PRIMARY KEY (`id_dept`);

--
-- Indexes for table `kode`
--
ALTER TABLE `kode`
  ADD PRIMARY KEY (`id_kode`);

--
-- Indexes for table `logbook`
--
ALTER TABLE `logbook`
  ADD PRIMARY KEY (`id_log`),
  ADD KEY `kode_id` (`kode_id`);

--
-- Indexes for table `pelatihan`
--
ALTER TABLE `pelatihan`
  ADD PRIMARY KEY (`id_pelatihan`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `pilihan`
--
ALTER TABLE `pilihan`
  ADD PRIMARY KEY (`id_pilih`),
  ADD KEY `logbook` (`logbook`),
  ADD KEY `user` (`user`),
  ADD KEY `ruang` (`ruang`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`),
  ADD KEY `kode_pk` (`kode_pk`),
  ADD KEY `dept` (`dept`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `dept`
--
ALTER TABLE `dept`
  MODIFY `id_dept` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `kode`
--
ALTER TABLE `kode`
  MODIFY `id_kode` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `logbook`
--
ALTER TABLE `logbook`
  MODIFY `id_log` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `pelatihan`
--
ALTER TABLE `pelatihan`
  MODIFY `id_pelatihan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `pilihan`
--
ALTER TABLE `pilihan`
  MODIFY `id_pilih` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `pelatihan`
--
ALTER TABLE `pelatihan`
  ADD CONSTRAINT `pelatihan_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id_user`);

--
-- Constraints for table `pilihan`
--
ALTER TABLE `pilihan`
  ADD CONSTRAINT `pilihan_ibfk_1` FOREIGN KEY (`logbook`) REFERENCES `logbook` (`id_log`),
  ADD CONSTRAINT `pilihan_ibfk_2` FOREIGN KEY (`user`) REFERENCES `user` (`id_user`);

--
-- Constraints for table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `user_ibfk_1` FOREIGN KEY (`kode_pk`) REFERENCES `kode` (`id_kode`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
