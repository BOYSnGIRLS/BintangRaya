-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Nov 09, 2018 at 03:42 AM
-- Server version: 10.1.16-MariaDB
-- PHP Version: 7.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bintangraya`
--

-- --------------------------------------------------------

--
-- Table structure for table `detail_gaji_bongkarpasang`
--

CREATE TABLE `detail_gaji_bongkarpasang` (
  `id_gaji` varchar(11) NOT NULL,
  `id_pegawai` varchar(11) NOT NULL,
  `bongkar` int(11) NOT NULL,
  `pasang` int(11) NOT NULL,
  `total` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `detail_gaji_sopir`
--

CREATE TABLE `detail_gaji_sopir` (
  `id_gaji` varchar(11) NOT NULL,
  `id_pegawai` varchar(11) NOT NULL,
  `berangkat` int(11) NOT NULL,
  `pulang` int(11) NOT NULL,
  `total` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `detail_opsional`
--

CREATE TABLE `detail_opsional` (
  `id_gaji` varchar(11) NOT NULL,
  `keterangan` int(11) NOT NULL,
  `total` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `gaji`
--

CREATE TABLE `gaji` (
  `id_gaji` varchar(11) NOT NULL,
  `total_gaji_sopir` int(11) NOT NULL,
  `total_bongkar` int(11) NOT NULL,
  `total_opsional` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `grand_total` int(11) NOT NULL,
  `id_sewa` varchar(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `pegawai`
--

CREATE TABLE `pegawai` (
  `id_pegawai` varchar(11) NOT NULL,
  `nama` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `detail_gaji_bongkarpasang`
--
ALTER TABLE `detail_gaji_bongkarpasang`
  ADD KEY `id_gaji` (`id_gaji`),
  ADD KEY `id_pegawai` (`id_pegawai`),
  ADD KEY `id_pegawai_2` (`id_pegawai`);

--
-- Indexes for table `detail_gaji_sopir`
--
ALTER TABLE `detail_gaji_sopir`
  ADD KEY `id_gaji` (`id_gaji`),
  ADD KEY `id_pegawai` (`id_pegawai`);

--
-- Indexes for table `detail_opsional`
--
ALTER TABLE `detail_opsional`
  ADD KEY `id_gaji` (`id_gaji`);

--
-- Indexes for table `gaji`
--
ALTER TABLE `gaji`
  ADD PRIMARY KEY (`id_gaji`);

--
-- Indexes for table `pegawai`
--
ALTER TABLE `pegawai`
  ADD PRIMARY KEY (`id_pegawai`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `detail_gaji_bongkarpasang`
--
ALTER TABLE `detail_gaji_bongkarpasang`
  ADD CONSTRAINT `detail_gaji_bongkarpasang_ibfk_1` FOREIGN KEY (`id_gaji`) REFERENCES `gaji` (`id_gaji`),
  ADD CONSTRAINT `detail_gaji_bongkarpasang_ibfk_2` FOREIGN KEY (`id_pegawai`) REFERENCES `pegawai` (`id_pegawai`);

--
-- Constraints for table `detail_gaji_sopir`
--
ALTER TABLE `detail_gaji_sopir`
  ADD CONSTRAINT `detail_gaji_sopir_ibfk_1` FOREIGN KEY (`id_gaji`) REFERENCES `gaji` (`id_gaji`),
  ADD CONSTRAINT `detail_gaji_sopir_ibfk_2` FOREIGN KEY (`id_pegawai`) REFERENCES `pegawai` (`id_pegawai`);

--
-- Constraints for table `detail_opsional`
--
ALTER TABLE `detail_opsional`
  ADD CONSTRAINT `detail_opsional_ibfk_1` FOREIGN KEY (`id_gaji`) REFERENCES `gaji` (`id_gaji`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
