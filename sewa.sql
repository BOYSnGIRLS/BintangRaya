-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Dec 11, 2018 at 05:06 PM
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
-- Table structure for table `sewa`
--

CREATE TABLE `sewa` (
  `id_sewa` varchar(6) NOT NULL,
  `nama_pelanggan` varchar(30) NOT NULL,
  `alamat_pelanggan` text NOT NULL,
  `telp_pelanggan` varchar(15) NOT NULL,
  `tgl_sekarang` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `tgl_pasang` date NOT NULL,
  `tgl_acara1` date NOT NULL,
  `tgl_acara2` date NOT NULL,
  `lama` int(11) NOT NULL,
  `tgl_bongkar` date NOT NULL,
  `total_tagihan` int(11) NOT NULL,
  `dp` int(11) NOT NULL,
  `pelunasan` int(11) NOT NULL,
  `bayar` int(11) NOT NULL,
  `kembalian` int(11) NOT NULL,
  `status` varchar(25) DEFAULT 'Menunggu Proses'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sewa`
--

INSERT INTO `sewa` (`id_sewa`, `nama_pelanggan`, `alamat_pelanggan`, `telp_pelanggan`, `tgl_sekarang`, `tgl_pasang`, `tgl_acara1`, `tgl_acara2`, `lama`, `tgl_bongkar`, `total_tagihan`, `dp`, `pelunasan`, `bayar`, `kembalian`, `status`) VALUES
('TS0001', 'Mardiana Azizah', 'Mastrip', '087876543217', '2018-12-06 09:40:49', '2018-12-04', '2018-12-05', '2018-12-05', 1, '2018-12-06', 1400000, 1000000, -400000, 500000, -100000, 'Selesai');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `sewa`
--
ALTER TABLE `sewa`
  ADD PRIMARY KEY (`id_sewa`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
