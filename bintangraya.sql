-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Mar 09, 2019 at 11:01 AM
-- Server version: 10.1.37-MariaDB-cll-lve
-- PHP Version: 7.2.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bintan43_bintangraya`
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
('BR001', 'KR', 'Kursi Lipat', 2500, 0, 0, 300),
('BR002', 'KR', 'Kursi Plastik', 1000, 0, 0, 300),
('BR003', 'KR', 'Cover Kursi Lipat', 2000, 0, 200, 0),
('BR004', 'KR', 'Cover Kursi Plastik', 0, 0, 0, 0),
('BR005', 'MJ', 'Meja Prasmanan', 25000, 0, 5000, 10),
('BR006', 'MJ', 'Meja Tamu', 20000, 0, 5000, 27),
('BR007', 'MJ', 'Meja Bulat', 20000, 0, 4000, 10),
('BR008', 'MJ', 'Meja Minum', 17500, 0, 4000, 10),
('BR009', 'MJ', 'Rempel Meja Emas', 10000, 0, 2000, 0),
('BR010', 'MJ', 'Taplak + Rempel', 15000, 0, 2000, 0),
('BR011', 'GB', 'Piring (Uk 9)', 500, 10000, 10000, 989),
('BR012', 'GB', 'Mangkok Melamine', 400, 0, 0, 1000),
('BR014', 'GB', 'Mangkok Besar (Bowl)', 15000, 50000, 50000, 8),
('BR015', 'GB', 'Rantang Piring', 10000, 0, 1500, 0),
('BR016', 'XN', 'Kipas Blower (Pendek)', 0, 0, 0, 0),
('BR017', 'XN', 'Kipas Blower (Tinggi)', 75000, 0, 7500, 0),
('BR018', 'XN', 'Satir', 20000, 0, 2500, 0),
('BR019', 'XN', 'Dispenser', 45000, 0, 4500, 0),
('BR020', 'XN', 'Tempat Uang', 50000, 0, 2500, 0),
('BR021', 'XN', 'Talam Oval Stainless', 10000, 0, 2250, 4),
('BR022', 'XN', 'Kerucut Dekorasi', 250000, 0, 50000, 0),
('BR023', 'XN', 'Tirai/Tutup Samping (Tend', 20000, 0, 0, 0),
('BR024', 'XN', 'Tirai/Tutup Samping (Gedu', 22500, 0, 3500, 0),
('BR025', 'XN', 'Dekorasi Tiang', 15000, 0, 2500, 0),
('BR026', 'XN', 'Panggung (20-50 cm)', 12500, 0, 0, 0),
('BR027', 'XN', 'Panggung (100 cm)', 15000, 0, 0, 0),
('BR028', 'XN', 'Lampu', 50000, 0, 0, 0),
('BR029', 'XN', 'Karpet (2x6 m)', 36000, 0, 0, 0),
('BR030', 'XN', 'Palet', 6000, 0, 0, 0),
('BR031', 'XN', 'Bedag + Karpet', 10000, 0, 0, 0),
('BR032', 'KR', 'Kursi Tegak', 4500, 0, 500, 100),
('BR033', 'XN', 'Tracker', 50000, 0, 10000, 2);

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
('TS0005', 'PT002', 2, 150000, 300000),
('TS0006', 'BR001', 225, 2500, 562500),
('TS0007', 'PT001', 8, 125000, 1000000),
('TS0007', 'BR002', 100, 1000, 100000),
('TS0007', 'BR033', 1, 50000, 50000),
('TS0007', 'BR023', 12, 20000, 240000),
('TS0007', 'BR026', 24, 12500, 300000),
('TS0008', 'BR001', 125, 2500, 312500),
('TS0009', 'PT002', 1, 150000, 150000),
('TS0010', 'BR024', 16, 22500, 360000),
('TS0011', 'BR032', 70, 4500, 315000),
('TS0011', 'BR005', 2, 25000, 50000),
('TS0012', 'BR029', 6, 36000, 216000),
('TS0013', 'PT002', 2, 150000, 300000),
('TS0013', 'BR002', 75, 1000, 75000),
('TS0013', 'BR005', 1, 25000, 25000),
('TS0013', 'BR007', 1, 20000, 20000),
('TS0014', 'PT004', 2, 250000, 500000),
('TS0014', 'BR002', 100, 1000, 100000),
('TS0014', 'BR006', 6, 20000, 120000),
('TS0014', 'BR018', 3, 20000, 60000);

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
('PT001', 'TD001', 'Tenda Non Plafon 6x6', 125000, 35000),
('PT002', 'TD001', 'Tenda Plafon 6x6', 150000, 40000),
('PT003', 'TD001', 'Tenda Plafon Warna 6x6', 200000, 50000),
('PT004', 'TD001', 'Tenda VIP/Semi 6x6', 250000, 50000),
('PT005', 'TD001', 'Tenda VIP Plafon Warna 6x', 300000, 75000),
('PT006', 'TD001', 'Tenda Dekorasi Plafon 6x6', 650000, 200000);

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
('TS0005', 1, 'B. Maya', 'Jl. Sriwijaya V', '0816590146', '2019-01-15 05:38:12', '2019-01-12', '2019-01-13', '2019-01-13', 1, '2019-01-14', 0, 300000, 0, 0, -300000, 300000, 0, 'Selesai'),
('TS0006', 1, 'P. Yahya', 'Aula Poltek', '082336450073', '2019-01-16 01:48:06', '2019-01-14', '2019-01-15', '2019-01-15', 1, '2019-01-16', 0, 562500, 0, 0, -562500, 562500, 0, 'Selesai'),
('TS0007', 1, 'Pak Rohim', 'SD Muhammdiah', '085236548494', '2019-01-20 06:31:31', '2019-01-18', '2019-01-19', '2019-01-19', 1, '2019-01-20', 0, 1690000, 0, 0, -1690000, 1690000, 0, 'Selesai'),
('TS0008', 1, 'P. Andrias', 'PDAM Jl. Trunojoyo', '085311118219', '2019-01-27 23:07:38', '2019-01-25', '2019-01-26', '2019-01-26', 1, '2019-01-27', 40000, 312500, 0, 0, -312500, 352500, 0, 'Selesai'),
('TS0009', 1, 'P. Iqbal', 'SD Muhammdiah', '03314435200', '2019-01-27 23:14:22', '2019-01-25', '2019-01-26', '2019-01-26', 1, '2019-01-27', 40000, 150000, 0, 0, -150000, 190000, 0, 'Selesai'),
('TS0010', 1, 'P. herus/ Salon', 'Jl. jawa 2', '081234849034', '2019-01-27 23:29:50', '2019-01-18', '2019-01-19', '2019-01-19', 1, '2019-01-20', 40000, 360000, 0, 0, -360000, 400000, 0, 'Selesai'),
('TS0011', 1, 'Bpk H. Syaiful', 'Jl. Pangandaran Antirogo', '082247777671', '2019-02-22 00:49:30', '2019-02-22', '2019-02-23', '2019-02-23', 1, '2019-02-24', 40000, 365000, 0, 0, -365000, 405000, 0, 'Selesai'),
('TS0012', 1, 'Deny Nestle', 'Transmart', '082258366025', '2019-02-25 03:50:51', '2019-02-22', '2019-02-23', '2019-02-23', 1, '2019-02-24', 40000, 216000, 0, 0, -216000, 256000, 0, 'Selesai'),
('TS0013', 1, 'B. Harto ( Pune', 'Jl. Teuku Umar Gang X', '085101431871', '2019-02-25 04:09:16', '2019-02-21', '2019-02-22', '2019-02-22', 1, '2019-02-23', 40000, 420000, 0, 0, -420000, 460000, 0, 'Selesai'),
('TS0014', 1, 'Holi/ order ari', 'Kr. delkok kranjingan', '08986363210', '2019-03-02 23:42:44', '2019-02-28', '2019-03-01', '2019-03-01', 1, '2019-03-02', 0, 780000, 0, 0, -780000, 0, 0, 'Selesai');

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
  `level` enum('0','1') NOT NULL,
  `nama_user` varchar(35) NOT NULL,
  `alamat_user` text NOT NULL,
  `lahir_user` date NOT NULL,
  `nomor_user` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `username`, `password`, `level`, `nama_user`, `alamat_user`, `lahir_user`, `nomor_user`) VALUES
(1, 'admin', 'admin', '0', '', '', '0000-00-00', ''),
(2, 'Andi', '12345', '1', 'Muhammad Andi', 'Jember', '1977-03-14', '0813990873849'),
(3, 'Ana', '12345', '1', 'Ana Siti', 'Jember', '1989-09-18', '089136748392');

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
