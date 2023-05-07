-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 07 Bulan Mei 2023 pada 19.38
-- Versi server: 10.4.24-MariaDB
-- Versi PHP: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `rental_mobil`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_customer`
--

CREATE TABLE `tb_customer` (
  `id_customer` int(11) NOT NULL,
  `nama_customer` varchar(128) NOT NULL,
  `alamat` text NOT NULL,
  `no_ktp` varchar(20) NOT NULL,
  `no_telp` varchar(15) NOT NULL,
  `username` varchar(128) NOT NULL,
  `password` varchar(255) NOT NULL,
  `gambar` varchar(255) NOT NULL,
  `id_role` int(11) NOT NULL,
  `jk` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_customer`
--

INSERT INTO `tb_customer` (`id_customer`, `nama_customer`, `alamat`, `no_ktp`, `no_telp`, `username`, `password`, `gambar`, `id_role`, `jk`) VALUES
(1, 'Ahmad sabili alghifari', 'Jl.Kerta Jaya II No.2 RT.02/13 Kel.Uwung Jaya Kec.Cibodas Kota Tangerang Banten 15138', '3671092812000003', '088291411252', 'ahmadsabili0081@gmail.com', '$2y$10$puVuf1iB4OwZWqJmmPsZpeuRR4bk3uoU91RaGguhtnj.Ptm5OcFMm', 'default.jpg', 2, 'Laki-Laki'),
(2, 'Satria Nurgani S,Kom', 'JL.Koang Raya No.2 Tangerang Raya', '3671092812000003', '088291411252', 'satria@gmail.com', '$2y$10$Zu/yZ4BNV.z/exChcPo1Pub0mw6Ktxv1JO.GySvLvrGnXBCKePbNC', 'default.jpg', 2, 'Laki-Laki'),
(3, 'Ahmad Admin', 'Jl.Toko Raya No II', '3671092812000003', '088291411252', 'admin@gmail.com', '$2y$10$Zu/yZ4BNV.z/exChcPo1Pub0mw6Ktxv1JO.GySvLvrGnXBCKePbNC', 'admin.svg', 1, 'Laki-Laki');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_mobil`
--

CREATE TABLE `tb_mobil` (
  `id_mobil` int(11) NOT NULL,
  `id_type` int(11) NOT NULL,
  `nama` varchar(128) NOT NULL,
  `nopol` varchar(15) NOT NULL,
  `warna` varchar(20) NOT NULL,
  `tahun` varchar(5) NOT NULL,
  `gambar` varchar(128) NOT NULL,
  `status` int(11) NOT NULL,
  `harga` varchar(50) NOT NULL,
  `denda` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_mobil`
--

INSERT INTO `tb_mobil` (`id_mobil`, `id_type`, `nama`, `nopol`, `warna`, `tahun`, `gambar`, `status`, `harga`, `denda`) VALUES
(1, 3, 'Civic 2017', 'B 3421 BLI', 'Hitam', '2017', 'civic201711.jpg', 0, '750000', '240000'),
(2, 4, 'Velfire 2023', 'B 4590 TNG', 'Hitam', '2023', 'velfire20231.jpg', 1, '1000000', '250000'),
(3, 4, 'Pajero ', 'B 3421 BLI', 'Putih', '2020', 'New-Pajero-Sport20201.jpg', 1, '750000', '240000'),
(4, 3, 'Civic 2023', 'B 4590 JKT', 'Hitam', '2023', 'civic-turbo-crystal-black-pearl-09e520231.png', 1, '1000000', '450000'),
(5, 4, 'Toyota Avanza 2023', 'B 1234 CGC', 'Silver', '2023', 'latest-vehicle-750x550-1toyota20231.jpg', 1, '800000', '350000'),
(6, 4, 'Pajero 2020', 'B 1234 CGA', 'Silver', '2020', 'New-Pajero-Sport20202.jpg', 0, '750000', '350000');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_role`
--

CREATE TABLE `tb_role` (
  `id_role` int(11) NOT NULL,
  `role` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_role`
--

INSERT INTO `tb_role` (`id_role`, `role`) VALUES
(1, 'Admin'),
(2, 'User');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_transaksi`
--

CREATE TABLE `tb_transaksi` (
  `id_rental` int(11) NOT NULL,
  `id_customer` int(11) NOT NULL,
  `id_mobil` int(11) NOT NULL,
  `tgl_rental` date NOT NULL,
  `tgl_kembali` date NOT NULL,
  `harga` varchar(50) NOT NULL,
  `denda` varchar(50) NOT NULL,
  `total_denda` varchar(50) NOT NULL,
  `tgl_pengembalian` date NOT NULL,
  `status_pengembalian` int(11) NOT NULL,
  `status_rental` int(11) NOT NULL,
  `lama_sewa` int(11) NOT NULL,
  `bukti_pembayaran` varchar(255) NOT NULL,
  `status_pembayaran` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_transaksi`
--

INSERT INTO `tb_transaksi` (`id_rental`, `id_customer`, `id_mobil`, `tgl_rental`, `tgl_kembali`, `harga`, `denda`, `total_denda`, `tgl_pengembalian`, `status_pengembalian`, `status_rental`, `lama_sewa`, `bukti_pembayaran`, `status_pembayaran`) VALUES
(3, 2, 2, '2023-05-06', '2023-06-03', '1000000', '250000', '120000', '2023-06-03', 1, 1, 28, 'civic201711.jpg', 1),
(4, 2, 3, '2023-06-04', '2023-05-07', '750000', '240000', '240000', '2023-05-08', 1, 1, 28, 'alphar.jpg', 1),
(14, 2, 2, '2023-05-07', '2023-05-08', '1000000', '250000', '0', '2023-05-08', 1, 1, 1, 'civic2017111.jpg', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_type`
--

CREATE TABLE `tb_type` (
  `id_type` int(11) NOT NULL,
  `kode_type` varchar(10) NOT NULL,
  `nama_type` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_type`
--

INSERT INTO `tb_type` (`id_type`, `kode_type`, `nama_type`) VALUES
(2, 'CSV', 'Crossover'),
(3, 'SDN', 'Sedan'),
(4, 'SPT', 'Sport'),
(5, 'MVP', 'Multi Purpose Vehicle'),
(6, 'SUV', 'Sport Utility Vehicle');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tb_customer`
--
ALTER TABLE `tb_customer`
  ADD PRIMARY KEY (`id_customer`);

--
-- Indeks untuk tabel `tb_mobil`
--
ALTER TABLE `tb_mobil`
  ADD PRIMARY KEY (`id_mobil`);

--
-- Indeks untuk tabel `tb_role`
--
ALTER TABLE `tb_role`
  ADD PRIMARY KEY (`id_role`);

--
-- Indeks untuk tabel `tb_transaksi`
--
ALTER TABLE `tb_transaksi`
  ADD PRIMARY KEY (`id_rental`);

--
-- Indeks untuk tabel `tb_type`
--
ALTER TABLE `tb_type`
  ADD PRIMARY KEY (`id_type`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `tb_customer`
--
ALTER TABLE `tb_customer`
  MODIFY `id_customer` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `tb_mobil`
--
ALTER TABLE `tb_mobil`
  MODIFY `id_mobil` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `tb_role`
--
ALTER TABLE `tb_role`
  MODIFY `id_role` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `tb_transaksi`
--
ALTER TABLE `tb_transaksi`
  MODIFY `id_rental` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT untuk tabel `tb_type`
--
ALTER TABLE `tb_type`
  MODIFY `id_type` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
