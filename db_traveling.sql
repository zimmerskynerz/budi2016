-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 08 Feb 2021 pada 10.13
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
  `status_paket` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
(3, 'ulala.steven@gmail.com', '$2y$10$IZ7ZPNJpSSawneSyGBWE6u2uvq7uwaKjCYQMUe8SWcvwaoI/Kguye', '08928372882722', 'SOPIR', 'AKTIF', '2021-02-08');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_paket`
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
(3, 1, 'Tegar Islami', 'Kudus Jawa Tengah', '5f56057e4c40c3645de0ab64aeff2af9.jpg', 'ed4852a7a78825ea79c53ebd92275ab9.jpg', 'KOSONG');

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
  ADD PRIMARY KEY (`id_pelanggan`);

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
  MODIFY `id_login` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `tbl_paket`
--
ALTER TABLE `tbl_paket`
  MODIFY `id_paket` int(5) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `tbl_pelanggan`
--
ALTER TABLE `tbl_pelanggan`
  MODIFY `id_pelanggan` int(9) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `tbl_rental`
--
ALTER TABLE `tbl_rental`
  MODIFY `id_rental` int(5) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `tbl_sopir`
--
ALTER TABLE `tbl_sopir`
  MODIFY `id_sopir` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

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
