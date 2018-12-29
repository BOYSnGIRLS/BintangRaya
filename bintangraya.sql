-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 29, 2018 at 10:29 AM
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
  `harga_sewa` int(11) NOT NULL,
  `harga_ganti_rugi` int(11) NOT NULL,
  `harga_jasa` int(11) NOT NULL,
  `stok_barang` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `barang`
--

INSERT INTO `barang` (`id_barang`, `id_kategori`, `nama_barang`, `harga_sewa`, `harga_ganti_rugi`, `harga_jasa`, `stok_barang`) VALUES
('BR001', 'KR', 'Kursi Lipat', 2000, 0, 400, 299),
('BR002', 'KR', 'Kursi Plastik', 1000, 0, 300, 300),
('BR003', 'KR', 'Cover Kursi Lipat', 2000, 0, 200, 0),
('BR004', 'KR', 'Cover Kursi Plastik', 0, 0, 0, 0),
('BR005', 'MJ', 'Meja Prasmanan', 25000, 0, 5000, 10),
('BR006', 'MJ', 'Meja Tamu', 20000, 0, 5000, 27),
('BR007', 'MJ', 'Meja Bulat', 20000, 0, 4000, 10),
('BR008', 'MJ', 'Meja Minum', 17500, 0, 4000, 10),
('BR009', 'MJ', 'Rempel Meja Emas', 10000, 0, 2000, 0),
('BR010', 'MJ', 'Taplak + Rempel', 15000, 0, 2000, 0),
('BR011', 'GB', 'Piring (Uk 9)', 500, 10000, 0, 1000),
('BR012', 'GB', 'Mangkok Melamine', 400, 0, 0, 1000),
('BR014', 'GB', 'Mangkok Besar (Bowl)', 15000, 50000, 2250, 8),
('BR015', 'GB', 'Rantang Piring', 10000, 0, 1500, 0),
('BR016', 'XN', 'Kipas Blower (Pendek)', 0, 0, 0, 0),
('BR017', 'XN', 'Kipas Blower (Tinggi)', 75000, 0, 7500, 0),
('BR018', 'XN', 'Satir', 20000, 0, 2500, 0),
('BR019', 'XN', 'Dispenser', 45000, 0, 4500, 0),
('BR020', 'XN', 'Tempat Uang', 50000, 0, 2500, 0),
('BR021', 'XN', 'Talam Oval Stainless', 10000, 0, 2250, 4),
('BR022', 'XN', 'Kerucut Dekorasi', 250000, 0, 50000, 0),
('BR023', 'XN', 'Tirai/Tutup Samping (Tend', 18000, 0, 3000, 0),
('BR024', 'XN', 'Tirai/Tutup Samping (Gedu', 22500, 0, 3500, 0),
('BR025', 'XN', 'Dekorasi Tiang', 15000, 0, 2500, 0),
('BR026', 'XN', 'Panggung (20-50 cm)', 12500, 0, 0, 0),
('BR027', 'XN', 'Panggung (100 cm)', 15000, 0, 0, 0),
('BR028', 'XN', 'Lampu', 50000, 0, 0, 0),
('BR029', 'XN', 'Karpet (2x6 m)', 30000, 0, 0, 0),
('BR030', 'XN', 'Palet', 6000, 0, 0, 0),
('BR031', 'XN', 'Bedag + Karpet', 10000, 0, 0, 0),
('BR032', 'KR', 'Kursi Tegak', 4500, 0, 500, 100);

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
('KB0001', 'BR011', 1000, 995, 5, 50000),
('KB0002', 'BR011', 1000, 995, 5, 50000),
('KB0003', 'BR011', 1000, 995, 5, 50000);

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
('TS0001', 'BR011', 1000, 500, 500000),
('TS0002', 'BR014', 5, 15000, 75000);

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
('KB0001', 'TS0001', 2, '2018-12-29 09:20:23'),
('KB0002', 'TS0001', 2, '2018-12-29 09:20:24'),
('KB0003', 'TS0001', 2, '2018-12-29 09:20:24');

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

INSERT INTO `sewa` (`id_sewa`, `id_user`, `nama_pelanggan`, `alamat_pelanggan`, `telp_pelanggan`, `tgl_sekarang`, `tgl_pasang`, `tgl_acara1`, `tgl_acara2`, `lama`, `tgl_bongkar`, `total_tagihan`, `dp`, `biaya_ganti`, `pelunasan`, `bayar`, `kembalian`, `status`) VALUES
('TS0001', 2, 'Mardiana ', 'Mastrip', '0897654765342', '2018-12-29 08:17:34', '2018-12-29', '2018-12-30', '2018-12-30', 1, '2018-12-31', 500000, 250000, 50000, -250000, 0, 0, 'Kembali'),
('TS0002', 2, 'Diana', 'Kalimantan', '089765234678', '2018-12-29 08:22:10', '2018-12-30', '2018-12-31', '2018-12-31', 1, '2019-01-01', 75000, 25000, 50000, -50000, 0, 0, 'Selesai');

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
