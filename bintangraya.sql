-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 28, 2018 at 10:07 PM
-- Server version: 10.1.26-MariaDB
-- PHP Version: 7.1.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
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
-- Table structure for table `barang`
--

CREATE TABLE `barang` (
  `id_barang` varchar(5) NOT NULL,
  `id_kategori` varchar(2) NOT NULL,
  `nama_barang` varchar(25) NOT NULL,
  `harga_jasa` int(11) NOT NULL,
  `harga_sewa` int(11) NOT NULL,
  `stok_barang` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `barang`
--

INSERT INTO `barang` (`id_barang`, `id_kategori`, `nama_barang`, `harga_jasa`, `harga_sewa`, `stok_barang`) VALUES
('BR001', 'MK', 'Piring', 2000, 500, 1000);

-- --------------------------------------------------------

--
-- Table structure for table `detail_kembali_barang`
--

CREATE TABLE `detail_kembali_barang` (
  `id_kembali` varchar(6) NOT NULL,
  `id_barang` varchar(6) NOT NULL,
  `jumlah_sewa` int(11) NOT NULL,
  `jumlah_kembali` int(11) NOT NULL,
  `hilangrusak` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `detail_kembali_barang`
--

INSERT INTO `detail_kembali_barang` (`id_kembali`, `id_barang`, `jumlah_sewa`, `jumlah_kembali`, `hilangrusak`) VALUES
('KB0001', 'BR001', 300, 300, 0);

-- --------------------------------------------------------

--
-- Table structure for table `detail_kembali_tenda`
--

CREATE TABLE `detail_kembali_tenda` (
  `id_kembali` varchar(6) NOT NULL,
  `id_tenda` varchar(5) NOT NULL,
  `jumlah_sewa` int(11) NOT NULL,
  `jumlah_kembali` int(11) NOT NULL,
  `hilangrusak` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `detail_kembali_tenda`
--

INSERT INTO `detail_kembali_tenda` (`id_kembali`, `id_tenda`, `jumlah_sewa`, `jumlah_kembali`, `hilangrusak`) VALUES
('KB0001', 'HT001', 2, 2, 0);

-- --------------------------------------------------------

--
-- Table structure for table `detail_sewa`
--

CREATE TABLE `detail_sewa` (
  `id_sewa` varchar(6) NOT NULL,
  `id` varchar(6) NOT NULL,
  `jumlah_barang` int(11) NOT NULL,
  `harga_sewa` int(11) NOT NULL,
  `harga_total` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `detail_sewa`
--

INSERT INTO `detail_sewa` (`id_sewa`, `id`, `jumlah_barang`, `harga_sewa`, `harga_total`) VALUES
('1', '1', 1, 1, 1),
('TS0001', 'HT001', 2, 150000, 300000),
('TS0001', 'BR001', 300, 500, 150000),
('TS0002', 'BR001', 200, 500, 100000),
('TS0003', '', 0, 0, 0),
('TS0003', 'BR001', 15, 500, 7500),
('TS0003', 'HT001', 1, 150000, 150000),
('TS0004', 'HT001', 1, 150000, 150000),
('TS0005', 'BR001', 175, 500, 87500);

-- --------------------------------------------------------

--
-- Table structure for table `kategori_barang`
--

CREATE TABLE `kategori_barang` (
  `id_kategori` varchar(2) NOT NULL,
  `nama_kategori` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kategori_barang`
--

INSERT INTO `kategori_barang` (`id_kategori`, `nama_kategori`) VALUES
('BK', 'Barang'),
('MK', 'Alat Makan');

-- --------------------------------------------------------

--
-- Table structure for table `paket_tenda`
--

CREATE TABLE `paket_tenda` (
  `id_hargatenda` varchar(5) NOT NULL,
  `id_tenda` varchar(5) NOT NULL,
  `jenis_tenda` varchar(25) NOT NULL,
  `harga_sewa` int(11) NOT NULL,
  `harga_jasa` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `paket_tenda`
--

INSERT INTO `paket_tenda` (`id_hargatenda`, `id_tenda`, `jenis_tenda`, `harga_sewa`, `harga_jasa`) VALUES
('HT001', 'TD001', 'Plafon', 150000, 50000);

-- --------------------------------------------------------

--
-- Table structure for table `pelanggan`
--

CREATE TABLE `pelanggan` (
  `id_sewa` varchar(6) NOT NULL,
  `nama_pelanggan` varchar(15) NOT NULL,
  `alamat_pelanggan` text NOT NULL,
  `telp_pelanggan` varchar(15) NOT NULL,
  `tgl_acara1` date NOT NULL,
  `tgl_acara2` date NOT NULL,
  `lama` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pelanggan`
--

INSERT INTO `pelanggan` (`id_sewa`, `nama_pelanggan`, `alamat_pelanggan`, `telp_pelanggan`, `tgl_acara1`, `tgl_acara2`, `lama`) VALUES
('TS0001', 'Aulia', 'Perum Mastrip', '082236685263', '2018-11-28', '2018-11-28', 0),
('TS0002', 'Diana ', 'Mastrip', '086564239876', '2018-11-29', '2018-11-29', 0),
('TS0003', 'ana', 'Mastrip', '08236685263', '2018-11-28', '2018-11-29', 2),
('TS0004', 'Sinta', 'Kaliurang', '08236685263', '2018-12-04', '2018-12-07', 4),
('TS0005', '', '', '', '0000-00-00', '0000-00-00', 1);

-- --------------------------------------------------------

--
-- Table structure for table `pengembalian`
--

CREATE TABLE `pengembalian` (
  `id_kembali` varchar(6) NOT NULL,
  `id_sewa` varchar(6) NOT NULL,
  `tgl_kembali` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pengembalian`
--

INSERT INTO `pengembalian` (`id_kembali`, `id_sewa`, `tgl_kembali`) VALUES
('KB0001', 'TS0001', '2018-11-26 16:10:54');

-- --------------------------------------------------------

--
-- Table structure for table `sewa`
--

CREATE TABLE `sewa` (
  `id_sewa` varchar(6) NOT NULL,
  `tgl_sekarang` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `tgl_pasang` date NOT NULL,
  `tgl_acara1` date NOT NULL,
  `tgl_acara2` date NOT NULL,
  `lama` int(11) NOT NULL,
  `tgl_bongkar` date NOT NULL,
  `total_tagihan` int(11) NOT NULL,
  `dp` int(11) NOT NULL,
  `pelunasan` int(11) NOT NULL,
  `status` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sewa`
--

INSERT INTO `sewa` (`id_sewa`, `tgl_sekarang`, `tgl_pasang`, `tgl_acara1`, `tgl_acara2`, `lama`, `tgl_bongkar`, `total_tagihan`, `dp`, `pelunasan`, `status`) VALUES
('TS0001', '2018-11-26 15:24:39', '2018-11-27', '2018-11-28', '2018-11-28', 0, '2018-11-29', 450000, 250000, -200000, 1),
('TS0002', '2018-11-26 16:13:59', '2018-11-28', '2018-11-29', '2018-11-29', 0, '2018-11-30', 100000, 50000, -50000, NULL),
('TS0003', '2018-11-28 12:51:11', '2018-11-27', '2018-11-28', '2018-11-29', 0, '2018-11-30', 315000, 115000, -200000, NULL),
('TS0004', '2018-11-28 20:56:28', '2018-12-03', '2018-12-04', '2018-12-07', 0, '2018-12-08', 600000, 300000, -300000, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tenda`
--

CREATE TABLE `tenda` (
  `id_tenda` varchar(5) NOT NULL,
  `ukuran_tenda` varchar(5) NOT NULL,
  `stok_tenda` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tenda`
--

INSERT INTO `tenda` (`id_tenda`, `ukuran_tenda`, `stok_tenda`) VALUES
('TD001', '6x6', 15);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `username` varchar(15) NOT NULL,
  `password` varchar(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `username`, `password`) VALUES
(1, 'admin', 'admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`id_barang`),
  ADD KEY `id_kategori` (`id_kategori`),
  ADD KEY `id_kategori_2` (`id_kategori`);

--
-- Indexes for table `detail_kembali_barang`
--
ALTER TABLE `detail_kembali_barang`
  ADD KEY `id_kembali` (`id_kembali`),
  ADD KEY `id_barang` (`id_barang`);

--
-- Indexes for table `detail_kembali_tenda`
--
ALTER TABLE `detail_kembali_tenda`
  ADD KEY `id_kembali` (`id_kembali`),
  ADD KEY `id_tenda` (`id_tenda`);

--
-- Indexes for table `detail_sewa`
--
ALTER TABLE `detail_sewa`
  ADD KEY `id_sewa` (`id_sewa`),
  ADD KEY `id` (`id`);

--
-- Indexes for table `kategori_barang`
--
ALTER TABLE `kategori_barang`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indexes for table `paket_tenda`
--
ALTER TABLE `paket_tenda`
  ADD PRIMARY KEY (`id_hargatenda`),
  ADD KEY `id_sewa` (`id_tenda`);

--
-- Indexes for table `pelanggan`
--
ALTER TABLE `pelanggan`
  ADD KEY `id_sewa` (`id_sewa`);

--
-- Indexes for table `pengembalian`
--
ALTER TABLE `pengembalian`
  ADD PRIMARY KEY (`id_kembali`),
  ADD KEY `id_sewa` (`id_sewa`);

--
-- Indexes for table `sewa`
--
ALTER TABLE `sewa`
  ADD PRIMARY KEY (`id_sewa`);

--
-- Indexes for table `tenda`
--
ALTER TABLE `tenda`
  ADD PRIMARY KEY (`id_tenda`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `barang`
--
ALTER TABLE `barang`
  ADD CONSTRAINT `barang_ibfk_1` FOREIGN KEY (`id_kategori`) REFERENCES `kategori_barang` (`id_kategori`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `paket_tenda`
--
ALTER TABLE `paket_tenda`
  ADD CONSTRAINT `paket_tenda_ibfk_1` FOREIGN KEY (`id_tenda`) REFERENCES `tenda` (`id_tenda`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `pengembalian`
--
ALTER TABLE `pengembalian`
  ADD CONSTRAINT `pengembalian_ibfk_1` FOREIGN KEY (`id_sewa`) REFERENCES `sewa` (`id_sewa`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
