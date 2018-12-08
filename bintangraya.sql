-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 06 Des 2018 pada 13.43
-- Versi Server: 10.1.26-MariaDB
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
-- Struktur dari tabel `barang`
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
-- Dumping data untuk tabel `barang`
--

INSERT INTO `barang` (`id_barang`, `id_kategori`, `nama_barang`, `harga_jasa`, `harga_sewa`, `stok_barang`) VALUES
('BR001', 'MK', 'Piring', 2000, 500, 1000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `detail_kembali_barang`
--

CREATE TABLE `detail_kembali_barang` (
  `id_kembali` varchar(6) NOT NULL,
  `id_barang` varchar(6) NOT NULL,
  `jumlah_sewa` int(11) NOT NULL,
  `jumlah_kembali` int(11) NOT NULL,
  `hilangrusak` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `detail_kembali_barang`
--

INSERT INTO `detail_kembali_barang` (`id_kembali`, `id_barang`, `jumlah_sewa`, `jumlah_kembali`, `hilangrusak`) VALUES
('KB0001', 'BR001', 1000, 997, 3);

-- --------------------------------------------------------

--
-- Struktur dari tabel `detail_kembali_tenda`
--

CREATE TABLE `detail_kembali_tenda` (
  `id_kembali` varchar(6) NOT NULL,
  `id_tenda` varchar(5) NOT NULL,
  `jumlah_sewa` int(11) NOT NULL,
  `jumlah_kembali` int(11) NOT NULL,
  `hilangrusak` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `detail_kembali_tenda`
--

INSERT INTO `detail_kembali_tenda` (`id_kembali`, `id_tenda`, `jumlah_sewa`, `jumlah_kembali`, `hilangrusak`) VALUES
('KB0001', 'HT001', 6, 6, 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `detail_sewa`
--

CREATE TABLE `detail_sewa` (
  `id_sewa` varchar(6) NOT NULL,
  `id` varchar(6) NOT NULL,
  `jumlah_barang` int(11) NOT NULL,
  `harga_sewa` int(11) NOT NULL,
  `harga_total` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `detail_sewa`
--

INSERT INTO `detail_sewa` (`id_sewa`, `id`, `jumlah_barang`, `harga_sewa`, `harga_total`) VALUES
('TS0001', 'HT001', 6, 150000, 900000),
('TS0001', 'BR001', 1000, 500, 500000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `kategori_barang`
--

CREATE TABLE `kategori_barang` (
  `id_kategori` varchar(2) NOT NULL,
  `nama_kategori` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `kategori_barang`
--

INSERT INTO `kategori_barang` (`id_kategori`, `nama_kategori`) VALUES
('BK', 'Barang'),
('MK', 'Alat Makan');

-- --------------------------------------------------------

--
-- Struktur dari tabel `paket_tenda`
--

CREATE TABLE `paket_tenda` (
  `id_hargatenda` varchar(5) NOT NULL,
  `id_tenda` varchar(5) NOT NULL,
  `jenis_tenda` varchar(25) NOT NULL,
  `harga_sewa` int(11) NOT NULL,
  `harga_jasa` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `paket_tenda`
--

INSERT INTO `paket_tenda` (`id_hargatenda`, `id_tenda`, `jenis_tenda`, `harga_sewa`, `harga_jasa`) VALUES
('HT001', 'TD001', 'Plafon', 150000, 50000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengembalian`
--

CREATE TABLE `pengembalian` (
  `id_kembali` varchar(6) NOT NULL,
  `id_sewa` varchar(6) NOT NULL,
  `tgl_kembali` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pengembalian`
--

INSERT INTO `pengembalian` (`id_kembali`, `id_sewa`, `tgl_kembali`) VALUES
('KB0001', 'TS0001', '2018-12-06 09:41:28');

-- --------------------------------------------------------

--
-- Struktur dari tabel `sementara`
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
-- Dumping data untuk tabel `sementara`
--

INSERT INTO `sementara` (`id_sewa`, `nama_pelanggan`, `alamat_pelanggan`, `telp_pelanggan`, `tgl_pasang`, `tgl_acara1`, `tgl_acara2`, `tgl_bongkar`, `lama`) VALUES
('TS0001', 'Mardiana Azizah', 'Mastrip', '087876543217', '2018-12-04', '2018-12-05', '2018-12-05', '2018-12-06', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `sewa`
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
  `status` varchar(25) DEFAULT 'Menunggu Proses'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `sewa`
--

INSERT INTO `sewa` (`id_sewa`, `nama_pelanggan`, `alamat_pelanggan`, `telp_pelanggan`, `tgl_sekarang`, `tgl_pasang`, `tgl_acara1`, `tgl_acara2`, `lama`, `tgl_bongkar`, `total_tagihan`, `dp`, `pelunasan`, `status`) VALUES
('TS0001', 'Mardiana Azizah', 'Mastrip', '087876543217', '2018-12-06 09:40:49', '2018-12-04', '2018-12-05', '2018-12-05', 1, '2018-12-06', 1400000, 1000000, -400000, 'Menunggu Proses');

-- --------------------------------------------------------

--
-- Struktur dari tabel `stok_temp_barang`
--

CREATE TABLE `stok_temp_barang` (
  `id_barang` varchar(5) NOT NULL,
  `nama_barang` varchar(25) NOT NULL,
  `sisa_stok` int(11) NOT NULL,
  `stok_tgl` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `stok_temp_barang`
--

INSERT INTO `stok_temp_barang` (`id_barang`, `nama_barang`, `sisa_stok`, `stok_tgl`) VALUES
('BR001', 'Piring', 700, '2018-12-03');

-- --------------------------------------------------------

--
-- Struktur dari tabel `stok_temp_tenda`
--

CREATE TABLE `stok_temp_tenda` (
  `id_tenda` varchar(5) NOT NULL,
  `sisa_stok` int(11) NOT NULL,
  `stok_tgl` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tenda`
--

CREATE TABLE `tenda` (
  `id_tenda` varchar(5) NOT NULL,
  `ukuran_tenda` varchar(5) NOT NULL,
  `stok_tenda` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tenda`
--

INSERT INTO `tenda` (`id_tenda`, `ukuran_tenda`, `stok_tenda`) VALUES
('TD001', '6x6', 15);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `username` varchar(15) NOT NULL,
  `password` varchar(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user`
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
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `barang`
--
ALTER TABLE `barang`
  ADD CONSTRAINT `barang_ibfk_1` FOREIGN KEY (`id_kategori`) REFERENCES `kategori_barang` (`id_kategori`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `paket_tenda`
--
ALTER TABLE `paket_tenda`
  ADD CONSTRAINT `paket_tenda_ibfk_1` FOREIGN KEY (`id_tenda`) REFERENCES `tenda` (`id_tenda`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `pengembalian`
--
ALTER TABLE `pengembalian`
  ADD CONSTRAINT `pengembalian_ibfk_1` FOREIGN KEY (`id_sewa`) REFERENCES `sewa` (`id_sewa`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
