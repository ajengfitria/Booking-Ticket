-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 26, 2018 at 10:46 AM
-- Server version: 10.1.30-MariaDB
-- PHP Version: 7.2.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ticketing`
--

-- --------------------------------------------------------

--
-- Table structure for table `bandara`
--

CREATE TABLE `bandara` (
  `id_bandara` int(11) NOT NULL,
  `nama_bandara` varchar(50) NOT NULL,
  `id_kota` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bandara`
--

INSERT INTO `bandara` (`id_bandara`, `nama_bandara`, `id_kota`) VALUES
(1, 'Soekarno Hatta', 1),
(2, 'I Gusti Ngurah Rai', 2);

-- --------------------------------------------------------

--
-- Table structure for table `kota`
--

CREATE TABLE `kota` (
  `id_kota` int(11) NOT NULL,
  `kota` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kota`
--

INSERT INTO `kota` (`id_kota`, `kota`) VALUES
(1, 'Jakarta'),
(2, 'Bali');

-- --------------------------------------------------------

--
-- Table structure for table `pemesan`
--

CREATE TABLE `pemesan` (
  `id_pemesan` int(11) NOT NULL,
  `nama_pemesan` varchar(50) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `no_telp` varchar(15) NOT NULL,
  `email` varchar(40) NOT NULL,
  `kode_res` varchar(40) NOT NULL,
  `id` int(11) NOT NULL,
  `kode_bayar` varchar(40) NOT NULL,
  `bukti_bayar` varchar(100) NOT NULL,
  `status` varchar(50) NOT NULL,
  `jml_penumpang` int(11) NOT NULL,
  `ktp` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pemesan`
--

INSERT INTO `pemesan` (`id_pemesan`, `nama_pemesan`, `alamat`, `no_telp`, `email`, `kode_res`, `id`, `kode_bayar`, `bukti_bayar`, `status`, `jml_penumpang`, `ktp`) VALUES
(1, 'Ajeng Fitria', 'Cilacap', '081328963818', 'ajengfitria80@gmail.com', 'Vmc3SgI', 4, 'Fb7oD8t', 'Koala.jpg', 'Dikonfirmasi', 2, 1234567890),
(2, 'Azhar Rizki', 'pwt', '08272766', 'azhar@gmail.com', 'tt1xSjj', 3, 'vde4Gl6', 'Untitled.png', 'Dikonfirmasi', 2, 234567898),
(3, 'miongi', 'klampok', '0876', 'milania@gmail.com', 'OWAU7On', 3, 'oWg42Mj', '32_&_688ac0ac-fe4c-4d24-8d7d-680567d662eb.jpg', 'Dikonfirmasi', 1, 345678890),
(4, 'Alfikri Djati', 'Purwokerto', '0812345678', 'alfikri@gmail.com', 'ylhNQMD', 3, '4UO8OZP', 'Untitled.png', 'Menunggu Konfirmasi', 2, 233443434),
(5, 'Amel', 'Jakarta', '0812345678', 'amel@gmail.com', '0vgW9Yy', 3, 'g8iTyjc', '', 'Menunggu Pembayaran', 1, 343534534),
(6, 'Ananda', 'Purwokerto', '091232312', 'ananda@gmail.com', 'wZMKR4W', 4, '1N8OVAh', '', 'Menunggu Pembayaran', 2, 133245678),
(7, 'Ajeng', 'Purwokerto', '0812345678', 'ajengfitria80@gmail.com', 'dkJelWy', 3, 'An9x7Yc', 'Desert.jpg', 'Dikonfirmasi', 2, 2147483647);

-- --------------------------------------------------------

--
-- Table structure for table `penumpang`
--

CREATE TABLE `penumpang` (
  `id_penumpang` int(11) NOT NULL,
  `titel` varchar(10) NOT NULL,
  `nama_penumpang` varchar(50) NOT NULL,
  `kode_kursi` int(11) NOT NULL,
  `kode_res` varchar(11) NOT NULL,
  `id_pemesan` int(11) NOT NULL,
  `id_rute` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `penumpang`
--

INSERT INTO `penumpang` (`id_penumpang`, `titel`, `nama_penumpang`, `kode_kursi`, `kode_res`, `id_pemesan`, `id_rute`) VALUES
(1, 'Nona', 'Ajeng Fitria', 3, 'Vmc3SgI', 0, 4),
(2, 'Nona', 'Aida', 4, 'Vmc3SgI', 0, 4),
(3, 'Nyonya', 'Ajeng', 6, 'tt1xSjj', 0, 3),
(4, 'Tuan', 'aZHAR', 5, 'tt1xSjj', 0, 3),
(5, 'Nona', 'miongi', 27, 'OWAU7On', 0, 3),
(6, 'Tuan', 'Alfikri Djati', 6, 'ylhNQMD', 0, 3),
(7, 'Nona', 'Aida Fauzia R', 7, 'ylhNQMD', 0, 3),
(8, 'Tuan', 'Amel', 81, '0vgW9Yy', 0, 3),
(9, 'Tuan', 'Ananda', 6, 'wZMKR4W', 0, 4),
(10, 'Nona', 'Aida', 7, 'wZMKR4W', 0, 4),
(11, 'Nona', 'Ajeng', 8, 'dkJelWy', 0, 3),
(12, 'Nona', 'Aida', 9, 'dkJelWy', 0, 3);

-- --------------------------------------------------------

--
-- Table structure for table `rute`
--

CREATE TABLE `rute` (
  `id_rute` int(11) NOT NULL,
  `tgl` date NOT NULL,
  `berangkat` time NOT NULL,
  `sampai` time NOT NULL,
  `asal` varchar(50) NOT NULL,
  `tujuan` varchar(50) NOT NULL,
  `harga` varchar(50) NOT NULL,
  `sisa` int(11) NOT NULL,
  `id` int(11) NOT NULL,
  `bandara_asal` varchar(50) NOT NULL,
  `bandara_tujuan` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rute`
--

INSERT INTO `rute` (`id_rute`, `tgl`, `berangkat`, `sampai`, `asal`, `tujuan`, `harga`, `sisa`, `id`, `bandara_asal`, `bandara_tujuan`) VALUES
(1, '2018-02-26', '10:37:00', '12:43:00', 'Jakarta', 'Bali', '400000', 120, 2, 'Soekarno Hatta', 'I Gusti Ngurah Rai'),
(2, '2018-02-26', '08:30:00', '10:39:00', 'Bali', 'Jakarta', '455000', 125, 1, 'I Gusti Ngurah Rai', 'Soekarno Hatta'),
(3, '2018-02-26', '12:36:00', '14:39:00', 'Jakarta', 'Bali', '380000', 112, 2, 'Soekarno Hatta', 'I Gusti Ngurah Rai'),
(4, '2018-02-26', '09:20:00', '11:45:00', 'Bali', 'Jakarta', '375000', 116, 2, 'I Gusti Ngurah Rai', 'Soekarno Hatta'),
(5, '2018-02-27', '12:45:00', '15:50:00', 'Bali', 'Jakarta', '500000', 125, 1, 'I Gusti Ngurah Rai', 'Soekarno Hatta');

-- --------------------------------------------------------

--
-- Table structure for table `transport`
--

CREATE TABLE `transport` (
  `id_trans` int(11) NOT NULL,
  `nama_trans` varchar(50) NOT NULL,
  `kode_trans` varchar(255) NOT NULL,
  `deskripsi` varchar(255) NOT NULL,
  `jml` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transport`
--

INSERT INTO `transport` (`id_trans`, `nama_trans`, `kode_trans`, `deskripsi`, `jml`) VALUES
(1, 'Garuda', 'BO701', 'Boeing-701', 125),
(2, 'AirAsia', 'A1123', 'AirAsia-123', 120),
(3, 'Batik Air', 'BA-210', 'BA1210', 130);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `pass` varchar(255) NOT NULL,
  `namapanjang` varchar(50) NOT NULL,
  `level` varchar(20) NOT NULL,
  `foto` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `username`, `pass`, `namapanjang`, `level`, `foto`) VALUES
(1, 'ajeng', '21232f297a57a5a743894a0e4a801fc3', 'Ajeng Fitria', '', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bandara`
--
ALTER TABLE `bandara`
  ADD PRIMARY KEY (`id_bandara`),
  ADD KEY `id_kota` (`id_kota`);

--
-- Indexes for table `kota`
--
ALTER TABLE `kota`
  ADD PRIMARY KEY (`id_kota`);

--
-- Indexes for table `pemesan`
--
ALTER TABLE `pemesan`
  ADD PRIMARY KEY (`id_pemesan`),
  ADD KEY `id` (`id`);

--
-- Indexes for table `penumpang`
--
ALTER TABLE `penumpang`
  ADD PRIMARY KEY (`id_penumpang`),
  ADD KEY `id_pemesan` (`id_pemesan`),
  ADD KEY `id_rute` (`id_rute`);

--
-- Indexes for table `rute`
--
ALTER TABLE `rute`
  ADD PRIMARY KEY (`id_rute`),
  ADD KEY `id` (`id`);

--
-- Indexes for table `transport`
--
ALTER TABLE `transport`
  ADD PRIMARY KEY (`id_trans`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bandara`
--
ALTER TABLE `bandara`
  MODIFY `id_bandara` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `kota`
--
ALTER TABLE `kota`
  MODIFY `id_kota` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `pemesan`
--
ALTER TABLE `pemesan`
  MODIFY `id_pemesan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `penumpang`
--
ALTER TABLE `penumpang`
  MODIFY `id_penumpang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `rute`
--
ALTER TABLE `rute`
  MODIFY `id_rute` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `transport`
--
ALTER TABLE `transport`
  MODIFY `id_trans` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `pemesan`
--
ALTER TABLE `pemesan`
  ADD CONSTRAINT `pemesan_ibfk_1` FOREIGN KEY (`id`) REFERENCES `rute` (`id_rute`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
