-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 10 Feb 2021 pada 07.31
-- Versi server: 10.4.17-MariaDB
-- Versi PHP: 7.3.25

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
-- Struktur dari tabel `pesanan_paket`
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
  `harga_paket` int(9) DEFAULT NULL,
  `status_paket` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `pesanan_paket`
--

INSERT INTO `pesanan_paket` (`no_pesanan`, `id_paket`, `id_pelanggan`, `tgl_pesan`, `tgl_berangkat`, `tgl_selesai`, `tgl_dp`, `tgl_lunas`, `bukti_dp`, `bukti_lunas`, `harga_paket`, `status_paket`) VALUES
('20210210001', 1, 1, '2021-02-10', '2021-02-10', '2021-02-16', NULL, NULL, NULL, NULL, 15000000, 'PROSES');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pesanan_rental`
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

--
-- Dumping data untuk tabel `pesanan_rental`
--

INSERT INTO `pesanan_rental` (`no_rental`, `id_rental`, `id_pelanggan`, `tgl_pesan`, `tgl_dp`, `tgl_lunas`, `tgl_berangkat`, `tgl_selesai`, `jml_hari`, `harga_total`, `bukti_dp`, `bukti_lunas`, `status_rental`) VALUES
('20210209001', 2, 1, '2021-02-09', '2021-02-10', '2021-02-10', '2021-02-09', '2021-02-28', 19, 2337000, '0e03879be7ac0d7c40adcaf8608ee347.jpg', '04b152a2e33e87ef7263e6f7bb9a3bb2.jpg', 'KONFIRMASI'),
('20210210001', 2, 1, '2021-02-10', '2021-02-10', '2021-02-10', '2021-03-09', '2021-03-09', 1, 123000, '9d086eca4d5f9c874b7854221877a415.png', 'a76542f14bfaba0c11bc103f9cdfbcc0.png', 'LUNAS');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_kendaraan`
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
-- Dumping data untuk tabel `tbl_kendaraan`
--

INSERT INTO `tbl_kendaraan` (`no_registrasi`, `merk`, `type`, `jenis`, `th_pembuatan`, `warna`, `berlaku_stnk`, `jml_penumpang`, `status`, `foto_kendaraan`) VALUES
('K 4711 OR', 'HONDA', 'VARIO125', 'RODA 2', 2016, 'HITAM-KUNING', '2021-10-12', 15, 'ADA', 'fcb688e2b91c06efa3700cb4ffc305ae.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_login`
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
-- Dumping data untuk tabel `tbl_login`
--

INSERT INTO `tbl_login` (`id_login`, `email`, `password`, `no_hp`, `level`, `status`, `tgl_gabung`) VALUES
(1, 'admin@admin', '$2y$10$MqUBpjBHKNir5BA0u79hXuj/2n3Xs2iM3/vrpEzPD.37/lKXwvA7a', '0895411547434', 'ADMIN', 'AKTIF', '2021-02-01'),
(2, 'pemilik@pemilik', '$2y$10$MqUBpjBHKNir5BA0u79hXuj/2n3Xs2iM3/vrpEzPD.37/lKXwvA7a', '08112904711', 'PEMILIK', 'AKTIF', '2021-02-01'),
(3, 'ulala.steven@gmail.com', '$2y$10$skOWfI4r6q9Kbcio83EIQOJuKBfcpfZE.EwPCEg025Xq0Fh4W1rhi', '0812920928928', 'SOPIR', 'AKTIF', '2021-02-08'),
(4, 'monodaiki@gmail.com', '$2y$10$5t80bwBoJTXrtrduHf3hNu8WaMWNidJ3j4jU767Ybqm1Ed0.4GrF.', '0822903928292', 'SOPIR', 'AKTIF', '2021-02-08'),
(5, 'bgx@gmail.com', '$2y$10$Qy9gj.9D8wS8WsovPGo.Wei.QbRTw1ymdSV5WY/YB6.QDbbGS90By', '08123920902', 'PELANGGAN', 'AKTIF', '2021-02-09');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_paket`
--

CREATE TABLE `tbl_paket` (
  `id_paket` int(5) NOT NULL,
  `nm_paket` text NOT NULL,
  `destination` text NOT NULL,
  `ket_paket` text NOT NULL,
  `hg_modal` int(9) NOT NULL,
  `hg_standard` int(9) NOT NULL,
  `hg_minim` int(9) NOT NULL,
  `jml_hari` int(2) NOT NULL,
  `status` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_paket`
--

INSERT INTO `tbl_paket` (`id_paket`, `nm_paket`, `destination`, `ket_paket`, `hg_modal`, `hg_standard`, `hg_minim`, `jml_hari`, `status`) VALUES
(1, 'Wisata Bali', 'Kepulauan Bali', 'Makan 3x Sehari<br>\r\nHotel Bintang 5<br>\r\nBiaya Transport dari hotel ke wisata<br>', 12000000, 15000000, 12500000, 6, 'ADA'),
(2, 'Tour Jogjakarta', 'Kota Yogyakarta', 'Fasilitas : Makan 3x Sehari<br>\r\nHotel Bintang 5<br>\r\nBiaya Transport dari hotel ke wisata<br>\r\n\r\nDestination : <br>\r\n- Malioboro<br>\r\n- Semua Kota', 1500000, 2000000, 1550000, 10, 'ADA');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_pelanggan`
--

CREATE TABLE `tbl_pelanggan` (
  `id_pelanggan` int(9) NOT NULL,
  `id_login` int(9) NOT NULL,
  `nm_pelanggan` text NOT NULL,
  `alamat` text NOT NULL,
  `foto_ktp` text DEFAULT NULL,
  `status` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_pelanggan`
--

INSERT INTO `tbl_pelanggan` (`id_pelanggan`, `id_login`, `nm_pelanggan`, `alamat`, `foto_ktp`, `status`) VALUES
(1, 5, 'Muhammad Adi Pratama', 'Kudus jawa tengah', 'b16ff880e82e42d640360f9dbff52f9a.jpg', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_rental`
--

CREATE TABLE `tbl_rental` (
  `id_rental` int(5) NOT NULL,
  `id_sopir` int(5) NOT NULL,
  `no_registrasi` varchar(11) NOT NULL,
  `harga` int(9) NOT NULL,
  `status` enum('ADA','HAPUS') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_rental`
--

INSERT INTO `tbl_rental` (`id_rental`, `id_sopir`, `no_registrasi`, `harga`, `status`) VALUES
(1, 1, 'K 4711 OR', 2300002, 'HAPUS'),
(2, 1, 'K 4711 OR', 123000, 'ADA');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_sopir`
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
-- Dumping data untuk tabel `tbl_sopir`
--

INSERT INTO `tbl_sopir` (`id_login`, `id_sopir`, `nm_sopir`, `alamat`, `foto`, `sim`, `status`) VALUES
(3, 1, 'Tegar Islami', 'Kudus Jawa Tengah', '5f56057e4c40c3645de0ab64aeff2af9.jpg', 'ed4852a7a78825ea79c53ebd92275ab9.jpg', 'KOSONG'),
(4, 2, 'Zainal Abidin', 'Ds. Hadipolo, RT. 05/ RW. 05, Kec. Jekulo, Kab. Kudus - Jawa Tengah', 'cca71ba6cc56f20184ff272db97bad15.jpg', '5bfab7ffc25d9f762118207771248474.jpeg', 'KOSONG');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `pesanan_paket`
--
ALTER TABLE `pesanan_paket`
  ADD PRIMARY KEY (`no_pesanan`),
  ADD KEY `use_id_paket03` (`id_paket`),
  ADD KEY `use_id_pelanggan03` (`id_pelanggan`);

--
-- Indeks untuk tabel `pesanan_rental`
--
ALTER TABLE `pesanan_rental`
  ADD PRIMARY KEY (`no_rental`),
  ADD KEY `use_id_rental01` (`id_rental`),
  ADD KEY `use_id_pelanggan01` (`id_pelanggan`);

--
-- Indeks untuk tabel `tbl_kendaraan`
--
ALTER TABLE `tbl_kendaraan`
  ADD PRIMARY KEY (`no_registrasi`);

--
-- Indeks untuk tabel `tbl_login`
--
ALTER TABLE `tbl_login`
  ADD PRIMARY KEY (`id_login`),
  ADD UNIQUE KEY `no_hp` (`no_hp`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indeks untuk tabel `tbl_paket`
--
ALTER TABLE `tbl_paket`
  ADD PRIMARY KEY (`id_paket`);

--
-- Indeks untuk tabel `tbl_pelanggan`
--
ALTER TABLE `tbl_pelanggan`
  ADD PRIMARY KEY (`id_pelanggan`),
  ADD KEY `use_id_login09` (`id_login`);

--
-- Indeks untuk tabel `tbl_rental`
--
ALTER TABLE `tbl_rental`
  ADD PRIMARY KEY (`id_rental`),
  ADD KEY `use_id_sopir01` (`id_sopir`),
  ADD KEY `use_mobil01` (`no_registrasi`);

--
-- Indeks untuk tabel `tbl_sopir`
--
ALTER TABLE `tbl_sopir`
  ADD PRIMARY KEY (`id_sopir`),
  ADD KEY `use_id_login01` (`id_login`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `tbl_login`
--
ALTER TABLE `tbl_login`
  MODIFY `id_login` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `tbl_paket`
--
ALTER TABLE `tbl_paket`
  MODIFY `id_paket` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `tbl_pelanggan`
--
ALTER TABLE `tbl_pelanggan`
  MODIFY `id_pelanggan` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `tbl_rental`
--
ALTER TABLE `tbl_rental`
  MODIFY `id_rental` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `tbl_sopir`
--
ALTER TABLE `tbl_sopir`
  MODIFY `id_sopir` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `pesanan_paket`
--
ALTER TABLE `pesanan_paket`
  ADD CONSTRAINT `use_id_paket03` FOREIGN KEY (`id_paket`) REFERENCES `tbl_paket` (`id_paket`),
  ADD CONSTRAINT `use_id_pelanggan03` FOREIGN KEY (`id_pelanggan`) REFERENCES `tbl_pelanggan` (`id_pelanggan`);

--
-- Ketidakleluasaan untuk tabel `pesanan_rental`
--
ALTER TABLE `pesanan_rental`
  ADD CONSTRAINT `use_id_pelanggan01` FOREIGN KEY (`id_pelanggan`) REFERENCES `tbl_pelanggan` (`id_pelanggan`),
  ADD CONSTRAINT `use_id_rental01` FOREIGN KEY (`id_rental`) REFERENCES `tbl_rental` (`id_rental`);

--
-- Ketidakleluasaan untuk tabel `tbl_pelanggan`
--
ALTER TABLE `tbl_pelanggan`
  ADD CONSTRAINT `use_id_login09` FOREIGN KEY (`id_login`) REFERENCES `tbl_login` (`id_login`);

--
-- Ketidakleluasaan untuk tabel `tbl_rental`
--
ALTER TABLE `tbl_rental`
  ADD CONSTRAINT `use_id_sopir01` FOREIGN KEY (`id_sopir`) REFERENCES `tbl_login` (`id_login`),
  ADD CONSTRAINT `use_mobil01` FOREIGN KEY (`no_registrasi`) REFERENCES `tbl_kendaraan` (`no_registrasi`);

--
-- Ketidakleluasaan untuk tabel `tbl_sopir`
--
ALTER TABLE `tbl_sopir`
  ADD CONSTRAINT `use_id_login01` FOREIGN KEY (`id_login`) REFERENCES `tbl_login` (`id_login`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
