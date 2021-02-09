-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 09, 2021 at 02:59 AM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 7.3.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_traveling`
--

-- --------------------------------------------------------

--
-- Table structure for table `pesanan_paket`
--

CREATE TABLE `pesanan_paket` (
  `no_pesanan` varchar(11) NOT NULL,
  `id_paket` int(5) NOT NULL,
  `id_pelanggan` int(9) NOT NULL,
  `tgl_pesan` date NOT NULL,
  `tgl_berangkat` date NOT NULL,
  `tgl_selesai` date NOT NULL,
  `tgl_dp` date DEFAULT NULL,
  `tgl_lunas` date DEFAULT NULL,
  `bukti_dp` text DEFAULT NULL,
  `bukti_lunas` text DEFAULT NULL,
  `status_paket` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `pesanan_rental`
--

CREATE TABLE `pesanan_rental` (
  `no_rental` varchar(11) NOT NULL,
  `id_rental` int(5) NOT NULL,
  `id_pelanggan` int(9) NOT NULL,
  `tgl_pesan` date NOT NULL,
  `tgl_dp` date DEFAULT NULL,
  `tgl_lunas` date DEFAULT NULL,
  `tgl_berangkat` date NOT NULL,
  `tgl_selesai` date NOT NULL,
  `jml_hari` int(4) NOT NULL,
  `harga_total` int(9) NOT NULL,
  `bukti_dp` text DEFAULT NULL,
  `bukti_lunas` text DEFAULT NULL,
  `status_rental` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_kendaraan`
--

CREATE TABLE `tbl_kendaraan` (
  `no_registrasi` varchar(11) NOT NULL,
  `merk` text NOT NULL,
  `type` text NOT NULL,
  `jenis` text NOT NULL,
  `th_pembuatan` int(4) NOT NULL,
  `warna` text NOT NULL,
  `berlaku_stnk` date NOT NULL,
  `jml_penumpang` int(3) NOT NULL,
  `status` text NOT NULL,
  `foto_kendaraan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_kendaraan`
--

INSERT INTO `tbl_kendaraan` (`no_registrasi`, `merk`, `type`, `jenis`, `th_pembuatan`, `warna`, `berlaku_stnk`, `jml_penumpang`, `status`, `foto_kendaraan`) VALUES
('K 4711 OR', 'HONDA', 'VARIO125', 'RODA 2', 2016, 'HITAM-KUNING', '2021-10-12', 15, 'ADA', 'fcb688e2b91c06efa3700cb4ffc305ae.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_login`
--

CREATE TABLE `tbl_login` (
  `id_login` int(9) NOT NULL,
  `email` varchar(256) NOT NULL,
  `password` text NOT NULL,
  `no_hp` varchar(15) NOT NULL,
  `level` enum('PELANGGAN','SOPIR','ADMIN','PEMILIK') NOT NULL,
  `status` enum('AKTIF','BLOKIR','HAPUS') NOT NULL,
  `tgl_gabung` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_login`
--

INSERT INTO `tbl_login` (`id_login`, `email`, `password`, `no_hp`, `level`, `status`, `tgl_gabung`) VALUES
(1, 'admin@admin', '$2y$10$MqUBpjBHKNir5BA0u79hXuj/2n3Xs2iM3/vrpEzPD.37/lKXwvA7a', '0895411547434', 'ADMIN', 'AKTIF', '2021-02-01'),
(2, 'pemilik@pemilik', '$2y$10$MqUBpjBHKNir5BA0u79hXuj/2n3Xs2iM3/vrpEzPD.37/lKXwvA7a', '08112904711', 'PEMILIK', 'AKTIF', '2021-02-01'),
(3, 'ulala.steven@gmail.com', '$2y$10$skOWfI4r6q9Kbcio83EIQOJuKBfcpfZE.EwPCEg025Xq0Fh4W1rhi', '0812920928928', 'SOPIR', 'AKTIF', '2021-02-08'),
(4, 'monodaiki@gmail.com', '$2y$10$5t80bwBoJTXrtrduHf3hNu8WaMWNidJ3j4jU767Ybqm1Ed0.4GrF.', '0822903928292', 'SOPIR', 'AKTIF', '2021-02-08');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_paket`
--

CREATE TABLE `tbl_paket` (
  `id_paket` int(5) NOT NULL,
  `id_rental` int(5) NOT NULL,
  `nm_paket` text NOT NULL,
  `destination` text NOT NULL,
  `ket_paket` text NOT NULL,
  `hg_modal` int(9) NOT NULL,
  `hg_standard` int(9) NOT NULL,
  `hg_minim` int(9) NOT NULL,
  `status` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_paket`
--

INSERT INTO `tbl_paket` (`id_paket`, `id_rental`, `nm_paket`, `destination`, `ket_paket`, `hg_modal`, `hg_standard`, `hg_minim`, `status`) VALUES
(1, 2, 'Wisata Bali', 'Kepulauan Bali', 'Makan 3x Sehari<br>\r\nHotel Bintang 5<br>\r\nBiaya Transport dari hotel ke wisata<br>', 12000000, 15000000, 12500000, 'ADA');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_pelanggan`
--

CREATE TABLE `tbl_pelanggan` (
  `id_pelanggan` int(9) NOT NULL,
  `id_login` int(9) NOT NULL,
  `nm_pelanggan` text NOT NULL,
  `alamat` text NOT NULL,
  `foto_ktp` text DEFAULT NULL,
  `status` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_rental`
--

CREATE TABLE `tbl_rental` (
  `id_rental` int(5) NOT NULL,
  `id_sopir` int(5) NOT NULL,
  `no_registrasi` varchar(11) NOT NULL,
  `harga` int(9) NOT NULL,
  `status` enum('ADA','HAPUS') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_rental`
--

INSERT INTO `tbl_rental` (`id_rental`, `id_sopir`, `no_registrasi`, `harga`, `status`) VALUES
(1, 1, 'K 4711 OR', 2300002, 'HAPUS'),
(2, 1, 'K 4711 OR', 123000, 'ADA');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_sopir`
--

CREATE TABLE `tbl_sopir` (
  `id_login` int(9) NOT NULL,
  `id_sopir` int(5) NOT NULL,
  `nm_sopir` text NOT NULL,
  `alamat` text NOT NULL,
  `foto` text NOT NULL,
  `sim` text DEFAULT NULL,
  `status` enum('KOSONG','BERANGKAT','BOOKING') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_sopir`
--

INSERT INTO `tbl_sopir` (`id_login`, `id_sopir`, `nm_sopir`, `alamat`, `foto`, `sim`, `status`) VALUES
(3, 1, 'Tegar Islami', 'Kudus Jawa Tengah', '5f56057e4c40c3645de0ab64aeff2af9.jpg', 'ed4852a7a78825ea79c53ebd92275ab9.jpg', 'KOSONG'),
(4, 2, 'Zainal Abidin', 'Ds. Hadipolo, RT. 05/ RW. 05, Kec. Jekulo, Kab. Kudus - Jawa Tengah', 'cca71ba6cc56f20184ff272db97bad15.jpg', '5bfab7ffc25d9f762118207771248474.jpeg', 'KOSONG');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `pesanan_paket`
--
ALTER TABLE `pesanan_paket`
  ADD PRIMARY KEY (`no_pesanan`),
  ADD KEY `use_id_paket03` (`id_paket`),
  ADD KEY `use_id_pelanggan03` (`id_pelanggan`);

--
-- Indexes for table `pesanan_rental`
--
ALTER TABLE `pesanan_rental`
  ADD PRIMARY KEY (`no_rental`),
  ADD KEY `use_id_rental01` (`id_rental`),
  ADD KEY `use_id_pelanggan01` (`id_pelanggan`);

--
-- Indexes for table `tbl_kendaraan`
--
ALTER TABLE `tbl_kendaraan`
  ADD PRIMARY KEY (`no_registrasi`);

--
-- Indexes for table `tbl_login`
--
ALTER TABLE `tbl_login`
  ADD PRIMARY KEY (`id_login`),
  ADD UNIQUE KEY `no_hp` (`no_hp`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `tbl_paket`
--
ALTER TABLE `tbl_paket`
  ADD PRIMARY KEY (`id_paket`);

--
-- Indexes for table `tbl_pelanggan`
--
ALTER TABLE `tbl_pelanggan`
  ADD PRIMARY KEY (`id_pelanggan`),
  ADD KEY `use_id_login09` (`id_login`);

--
-- Indexes for table `tbl_rental`
--
ALTER TABLE `tbl_rental`
  ADD PRIMARY KEY (`id_rental`),
  ADD KEY `use_id_sopir01` (`id_sopir`),
  ADD KEY `use_mobil01` (`no_registrasi`);

--
-- Indexes for table `tbl_sopir`
--
ALTER TABLE `tbl_sopir`
  ADD PRIMARY KEY (`id_sopir`),
  ADD KEY `use_id_login01` (`id_login`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_login`
--
ALTER TABLE `tbl_login`
  MODIFY `id_login` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_paket`
--
ALTER TABLE `tbl_paket`
  MODIFY `id_paket` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_pelanggan`
--
ALTER TABLE `tbl_pelanggan`
  MODIFY `id_pelanggan` int(9) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_rental`
--
ALTER TABLE `tbl_rental`
  MODIFY `id_rental` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_sopir`
--
ALTER TABLE `tbl_sopir`
  MODIFY `id_sopir` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `pesanan_paket`
--
ALTER TABLE `pesanan_paket`
  ADD CONSTRAINT `use_id_paket03` FOREIGN KEY (`id_paket`) REFERENCES `tbl_paket` (`id_paket`),
  ADD CONSTRAINT `use_id_pelanggan03` FOREIGN KEY (`id_pelanggan`) REFERENCES `tbl_pelanggan` (`id_pelanggan`);

--
-- Constraints for table `pesanan_rental`
--
ALTER TABLE `pesanan_rental`
  ADD CONSTRAINT `use_id_pelanggan01` FOREIGN KEY (`id_pelanggan`) REFERENCES `tbl_pelanggan` (`id_pelanggan`),
  ADD CONSTRAINT `use_id_rental01` FOREIGN KEY (`id_rental`) REFERENCES `tbl_rental` (`id_rental`);

--
-- Constraints for table `tbl_pelanggan`
--
ALTER TABLE `tbl_pelanggan`
  ADD CONSTRAINT `use_id_login09` FOREIGN KEY (`id_login`) REFERENCES `tbl_login` (`id_login`);

--
-- Constraints for table `tbl_rental`
--
ALTER TABLE `tbl_rental`
  ADD CONSTRAINT `use_id_sopir01` FOREIGN KEY (`id_sopir`) REFERENCES `tbl_login` (`id_login`),
  ADD CONSTRAINT `use_mobil01` FOREIGN KEY (`no_registrasi`) REFERENCES `tbl_kendaraan` (`no_registrasi`);

--
-- Constraints for table `tbl_sopir`
--
ALTER TABLE `tbl_sopir`
  ADD CONSTRAINT `use_id_login01` FOREIGN KEY (`id_login`) REFERENCES `tbl_login` (`id_login`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
