-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 29, 2019 at 07:11 PM
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
  `satuan` char(5) NOT NULL,
  `harga_sewa` int(11) NOT NULL,
  `harga_ganti_rugi` int(11) NOT NULL,
  `harga_jasa` int(11) NOT NULL,
  `stok_barang` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `barang`
--

INSERT INTO `barang` (`id_barang`, `id_kategori`, `nama_barang`, `satuan`, `harga_sewa`, `harga_ganti_rugi`, `harga_jasa`, `stok_barang`) VALUES
('BR001', 'KR', 'Kursi Lipat', 'biji', 2000, 0, 400, 299),
('BR002', 'KR', 'Kursi Plastik', 'biji', 1000, 0, 300, 300),
('BR003', 'KR', 'Cover Kursi Lipat', 'biji', 2000, 0, 200, 0),
('BR004', 'KR', 'Cover Kursi Plastik', 'biji', 0, 0, 0, 0),
('BR005', 'MJ', 'Meja Prasmanan', 'biji', 25000, 0, 5000, 10),
('BR006', 'MJ', 'Meja Tamu', 'biji', 20000, 0, 5000, 27),
('BR007', 'MJ', 'Meja Bulat', 'biji', 20000, 0, 4000, 10),
('BR008', 'MJ', 'Meja Minum', 'biji', 17500, 0, 4000, 10),
('BR009', 'MJ', 'Rempel Meja Emas', 'biji', 10000, 0, 2000, 0),
('BR010', 'MJ', 'Taplak + Rempel', 'biji', 15000, 0, 2000, 0),
('BR011', 'GB', 'Piring (Uk 9)', 'biji', 500, 10000, 0, 995),
('BR012', 'GB', 'Mangkok Melamine', 'biji', 400, 0, 0, 1000),
('BR014', 'GB', 'Mangkok Besar (Bowl)', 'biji', 15000, 50000, 2250, 8),
('BR015', 'GB', 'Rantang Piring', 'biji', 10000, 0, 1500, 0),
('BR016', 'XN', 'Kipas Blower (Pendek)', 'biji', 0, 0, 0, 0),
('BR017', 'XN', 'Kipas Blower (Tinggi)', 'biji', 75000, 0, 7500, 0),
('BR018', 'XN', 'Satir', 'biji', 20000, 0, 2500, 0),
('BR019', 'XN', 'Dispenser', 'biji', 45000, 0, 4500, 0),
('BR020', 'XN', 'Tempat Uang', 'biji', 50000, 0, 2500, 0),
('BR021', 'XN', 'Talam Oval Stainless', 'biji', 10000, 0, 2250, 4),
('BR022', 'XN', 'Kerucut Dekorasi', 'biji', 250000, 0, 50000, 0),
('BR023', 'XN', 'Tirai/Tutup Samping (Tend', 'meter', 18000, 0, 3000, 0),
('BR024', 'XN', 'Tirai/Tutup Samping (Gedu', 'meter', 22500, 0, 3500, 0),
('BR025', 'XN', 'Dekorasi Tiang', 'meter', 15000, 0, 2500, 0),
('BR026', 'XN', 'Panggung (20-50 cm)', 'meter', 12500, 0, 0, 0),
('BR027', 'XN', 'Panggung (100 cm)', '0', 15000, 0, 0, 0),
('BR028', 'XN', 'Lampu', '0', 50000, 0, 0, 0),
('BR029', 'XN', 'Karpet (2x6 m)', '0', 30000, 0, 0, 0),
('BR030', 'XN', 'Palet', '0', 6000, 0, 0, 0),
('BR031', 'XN', 'Bedag + Karpet', '0', 10000, 0, 0, 0),
('BR032', 'KR', 'Kursi Tegak', '0', 4500, 0, 500, 100);

-- --------------------------------------------------------

--
-- Table structure for table `detail_kembali_barang`
--

CREATE TABLE `detail_kembali_barang` (
  `id_kembali` varchar(6) NOT NULL,
  `id_barang` varchar(6) NOT NULL,
  `jumlah_sewa` int(11) NOT NULL,
  `jumlah_kembali` int(11) NOT NULL,
  `hilangrusak` int(11) NOT NULL,
  `harga_ganti` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `detail_kembali_barang`
--

INSERT INTO `detail_kembali_barang` (`id_kembali`, `id_barang`, `jumlah_sewa`, `jumlah_kembali`, `hilangrusak`, `harga_ganti`) VALUES
('KB0001', 'BR001', 80, 79, 1, 0),
('KB0001', 'BR008', 6, 6, 0, 0),
('KB0003', 'BR011', 500, 495, 5, 50000);

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
('KB0001', 'PT001', 1, 1, 0),
('KB0002', 'PT002', 3, 3, 0);

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

--
-- Dumping data for table `detail_sementara`
--

INSERT INTO `detail_sementara` (`id_sewa`, `id`, `jumlah_barang`, `harga_sewa`, `harga_total`) VALUES
('TS0006', 'BR001', 9, 2000, 18000);

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
('TS0001', 'PT001', 1, 125000, 125000),
('TS0001', 'BR001', 80, 2000, 160000),
('TS0001', 'BR008', 6, 17500, 105000),
('TS0003', 'PT002', 3, 150000, 450000),
('TS0004', 'BR011', 500, 500, 250000),
('TS0005', 'BR007', 5, 20000, 100000);

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
('PT001', 'TD001', 'Non Plafon 6x6', 125000, 35000),
('PT002', 'TD001', 'Plafon 6x6', 150000, 40000),
('PT003', 'TD001', 'Plafon Warna 6x6', 200000, 50000),
('PT004', 'TD001', 'VIP/Semi 6x6', 250000, 50000),
('PT005', 'TD001', 'VIP Plafon Warna 6x6', 300000, 75000),
('PT006', 'TD001', 'Dekorasi Plafon 6x6', 650000, 200000);

-- --------------------------------------------------------

--
-- Table structure for table `pengembalian`
--

CREATE TABLE `pengembalian` (
  `id_kembali` varchar(6) NOT NULL,
  `id_sewa` varchar(6) NOT NULL,
  `id_user` int(11) NOT NULL,
  `tgl_kembali` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pengembalian`
--

INSERT INTO `pengembalian` (`id_kembali`, `id_sewa`, `id_user`, `tgl_kembali`) VALUES
('KB0001', 'TS0001', 1, '2018-12-31 16:10:28'),
('KB0002', 'TS0003', 1, '2019-01-01 15:00:52'),
('KB0003', 'TS0004', 1, '2019-01-06 05:59:51');

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

--
-- Dumping data for table `sementara`
--

INSERT INTO `sementara` (`id_sewa`, `nama_pelanggan`, `alamat_pelanggan`, `telp_pelanggan`, `tgl_pasang`, `tgl_acara1`, `tgl_acara2`, `tgl_bongkar`, `lama`) VALUES
('TS0006', 'didi', 'jember', '0897652436217', '2019-03-28', '2019-03-29', '2019-03-29', '2019-03-30', 1);

-- --------------------------------------------------------

--
-- Table structure for table `sewa`
--

CREATE TABLE `sewa` (
  `id_sewa` varchar(6) NOT NULL,
  `id_user` int(11) NOT NULL,
  `nama_pelanggan` varchar(30) NOT NULL,
  `alamat_pelanggan` text NOT NULL,
  `telp_pelanggan` varchar(15) NOT NULL,
  `tgl_sekarang` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `tgl_pasang` date NOT NULL,
  `tgl_acara1` date NOT NULL,
  `tgl_acara2` date NOT NULL,
  `lama` int(11) NOT NULL,
  `tgl_bongkar` date NOT NULL,
  `biaya_transportasi` int(11) NOT NULL,
  `total_tagihan` int(11) NOT NULL,
  `dp` int(11) NOT NULL,
  `biaya_ganti` int(11) NOT NULL,
  `pelunasan` int(11) NOT NULL,
  `bayar` int(11) NOT NULL,
  `kembalian` int(11) NOT NULL,
  `status` varchar(25) DEFAULT 'Menunggu Proses'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sewa`
--

INSERT INTO `sewa` (`id_sewa`, `id_user`, `nama_pelanggan`, `alamat_pelanggan`, `telp_pelanggan`, `tgl_sekarang`, `tgl_pasang`, `tgl_acara1`, `tgl_acara2`, `lama`, `tgl_bongkar`, `biaya_transportasi`, `total_tagihan`, `dp`, `biaya_ganti`, `pelunasan`, `bayar`, `kembalian`, `status`) VALUES
('TS0001', 1, 'Aulia', 'Jl Letjen Sutoyo  Singosari LK, Sumber Pakem, Sumbersari', '0865435786876', '2018-12-31 15:04:42', '2018-12-31', '2019-01-01', '2019-01-01', 1, '2019-01-02', 0, 390000, 200000, 0, -190000, 200000, -10000, 'Kembali'),
('TS0003', 1, 'Jazil', 'Perum Mastrip', '0854562123897', '2018-12-31 15:54:07', '2019-01-01', '2019-01-02', '2019-01-02', 1, '2019-01-03', 0, 450000, 150000, 0, -300000, 0, 0, 'Kembali'),
('TS0004', 1, 'Rizky', 'Perum Mastrip', '08236685263', '2019-01-06 05:58:51', '2019-01-05', '2019-01-06', '2019-01-06', 1, '2019-01-07', 0, 250000, 50000, 50000, -200000, 0, 0, 'Kembali'),
('TS0005', 1, 'yhghg', 'ghhbhj', '76889', '2019-01-16 13:56:41', '2019-01-16', '2019-01-17', '2019-01-17', 1, '2019-01-18', 25000, 125000, 50000, 0, -75000, 0, 0, 'Menunggu Proses');

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
  `password` varchar(6) NOT NULL,
  `level` enum('0','1') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `username`, `password`, `level`) VALUES
(1, 'admin', 'admin', '0'),
(2, 'Andi', '12345', '1'),
(3, 'Ana', '12345', '1');

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
  ADD PRIMARY KEY (`id_sewa`),
  ADD KEY `id_user` (`id_user`);

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
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `barang`
--
ALTER TABLE `barang`
  ADD CONSTRAINT `barang_ibfk_1` FOREIGN KEY (`id_kategori`) REFERENCES `kategori_barang` (`id_kategori`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `detail_kembali_barang`
--
ALTER TABLE `detail_kembali_barang`
  ADD CONSTRAINT `detail_kembali_barang_ibfk_1` FOREIGN KEY (`id_kembali`) REFERENCES `pengembalian` (`id_kembali`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `detail_kembali_tenda`
--
ALTER TABLE `detail_kembali_tenda`
  ADD CONSTRAINT `detail_kembali_tenda_ibfk_1` FOREIGN KEY (`id_kembali`) REFERENCES `pengembalian` (`id_kembali`) ON DELETE CASCADE ON UPDATE CASCADE;

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
