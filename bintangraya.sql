-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 25, 2018 at 01:55 PM
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
('BR001', 'KR', 'Kursi Lipat', 0, 2000, 299),
('BR002', 'KR', 'Kursi Plastik', 0, 1000, 300),
('BR003', 'KR', 'Cover Kursi Lipat', 0, 2000, 0),
('BR004', 'KR', 'Cover Kursi Plastik', 0, 0, 0),
('BR005', 'MJ', 'Meja Prasmanan', 0, 25000, 10),
('BR006', 'MJ', 'Meja Tamu', 0, 20000, 27),
('BR007', 'MJ', 'Meja Bulat', 0, 20000, 10),
('BR008', 'MJ', 'Meja Minum', 0, 17500, 10),
('BR009', 'MJ', 'Rempel Meja Emas', 0, 10000, 0),
('BR010', 'MJ', 'Taplak + Rempel', 0, 15000, 0),
('BR011', 'GB', 'Piring (Uk 9)', 0, 500, 1000),
('BR012', 'GB', 'Mangkok Melamine', 0, 400, 1000),
('BR013', 'GB', 'Sendok', 0, 0, 0),
('BR014', 'GB', 'Mangkok Besar (Bowl)', 0, 15000, 8),
('BR015', 'GB', 'Rantang Piring', 0, 10000, 0),
('BR016', 'XN', 'Kipas Blower (Pendek)', 0, 0, 0),
('BR017', 'XN', 'Kipas Blower (Tinggi)', 0, 75000, 0),
('BR018', 'XN', 'Satir', 0, 20000, 0),
('BR019', 'XN', 'Dispenser', 0, 45000, 0),
('BR020', 'XN', 'Tempat Uang', 0, 50000, 0),
('BR021', 'XN', 'Talam Oval Stainless', 0, 10000, 4),
('BR022', 'XN', 'Kerucut Dekorasi', 0, 250000, 0),
('BR023', 'XN', 'Tirai/Tutup Samping (Tend', 0, 18000, 0),
('BR024', 'XN', 'Tirai/Tutup Samping (Gedu', 0, 22500, 0),
('BR025', 'XN', 'Dekorasi Tiang', 0, 15000, 0),
('BR026', 'XN', 'Panggung (20-50 cm)', 0, 12500, 0),
('BR027', 'XN', 'Panggung (100 cm)', 0, 15000, 0),
('BR028', 'XN', 'Lampu', 0, 50000, 0),
('BR029', 'XN', 'Karpet (2x6 m)', 0, 30000, 0),
('BR030', 'XN', 'Palet', 0, 6000, 0),
('BR031', 'XN', 'Bedag + Karpet', 0, 10000, 0);

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
('KB0001', 'BR001', 500, 499, 1),
('KB0001', 'MK002', 250, 250, 0),
('KB0001', 'BR001', 100, 100, 0),
('KB0002', 'BR001', 300, 300, 0);

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
('KB0001', 'HT001', 2, 2, 0),
('KB0001', 'HT001', 1, 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `detail_sementara`
--

CREATE TABLE `detail_sementara` (
  `id_sewa` varchar(6) NOT NULL,
  `id` varchar(6) NOT NULL,
  `jumlah_barang` int(11) NOT NULL,
  `harga_sewa` int(11) NOT NULL,
  `harga_total` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
('TS0001', 'PT002', 1, 150000, 150000),
('TS0002', 'PT002', 1, 150000, 150000),
('TS0003', 'PT002', 1, 150000, 150000),
('TS0003', 'BR002', 200, 1000, 200000);

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
('GB', 'Gerabah'),
('KR', 'Kursi'),
('MJ', 'Meja'),
('XN', 'Lainnya');

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
('PT001', 'TD001', 'Non Plafon 6x6', 125000, 0),
('PT002', 'TD001', 'Plafon 6x6', 150000, 0),
('PT003', 'TD001', 'Plafon Warna 6x6', 200000, 0),
('PT004', 'TD001', 'VIP/Semi 6x6', 250000, 0),
('PT005', 'TD001', 'VIP Plafon Warna 6x6', 300000, 0),
('PT006', 'TD001', 'Dekorasi Plafon 6x6', 650000, 0);

-- --------------------------------------------------------

--
-- Table structure for table `pengembalian`
--

CREATE TABLE `pengembalian` (
  `id_kembali` varchar(6) NOT NULL,
  `id_sewa` varchar(6) NOT NULL,
  `tgl_kembali` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `sementara`
--

CREATE TABLE `sementara` (
  `id_sewa` varchar(6) NOT NULL,
  `nama_pelanggan` varchar(15) NOT NULL,
  `alamat_pelanggan` text NOT NULL,
  `telp_pelanggan` varchar(15) NOT NULL,
  `tgl_pasang` date NOT NULL,
  `tgl_acara1` date NOT NULL,
  `tgl_acara2` date NOT NULL,
  `tgl_bongkar` date NOT NULL,
  `lama` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
('TS0001', 'Aulia', 'Mastrip', '089236785245', '2018-12-25 12:21:21', '2018-12-25', '2018-12-26', '2018-12-26', 1, '2018-12-27', 150000, 50000, -100000, 0, 0, 'Menunggu Proses'),
('TS0002', 'Rizky', 'Kalimantan', '087565765345', '2018-12-25 12:22:52', '2018-12-26', '2018-12-27', '2018-12-27', 1, '2018-12-28', 150000, 75000, -75000, 0, 0, 'Menunggu Proses'),
('TS0003', 'Mardiana Azizah', 'Jawa 7', '086542345675', '2018-12-25 12:52:22', '2018-12-26', '2018-12-27', '2018-12-27', 1, '2018-12-28', 350000, 150000, -200000, 0, 0, 'Menunggu Proses');

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
('TD001', '6x6', 10),
('TD002', '5x6', 4),
('TD003', '4x6', 10),
('TD004', '3x6', 4);

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
-- Indexes for table `detail_sementara`
--
ALTER TABLE `detail_sementara`
  ADD KEY `id_sewa` (`id_sewa`),
  ADD KEY `id` (`id`);

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
-- Indexes for table `pengembalian`
--
ALTER TABLE `pengembalian`
  ADD PRIMARY KEY (`id_kembali`),
  ADD KEY `id_sewa` (`id_sewa`);

--
-- Indexes for table `sementara`
--
ALTER TABLE `sementara`
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
-- Constraints for table `detail_sewa`
--
ALTER TABLE `detail_sewa`
  ADD CONSTRAINT `detail_sewa_ibfk_1` FOREIGN KEY (`id_sewa`) REFERENCES `sewa` (`id_sewa`) ON DELETE CASCADE ON UPDATE CASCADE;

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
