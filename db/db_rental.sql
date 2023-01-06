-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 28, 2022 at 09:56 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_rental`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbadmin`
--

CREATE TABLE `tbadmin` (
  `id_admin` int(11) NOT NULL,
  `nama_admin` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbadmin`
--

INSERT INTO `tbadmin` (`id_admin`, `nama_admin`, `password`) VALUES
(1, 'Mulya', 'mulya2612');

-- --------------------------------------------------------

--
-- Table structure for table `tbbarang`
--

CREATE TABLE `tbbarang` (
  `id_barang` int(11) NOT NULL,
  `nama_barang` varchar(100) NOT NULL,
  `deskripsi_barang` text NOT NULL,
  `harga_barang` double NOT NULL,
  `foto_barang` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbbarang`
--

INSERT INTO `tbbarang` (`id_barang`, `nama_barang`, `deskripsi_barang`, `harga_barang`, `foto_barang`) VALUES
(2, 'Tenda', 'Untuk 2 orang', 40000, ''),
(3, 'Tenda', 'Untuk 5 orang', 100000, ''),
(4, 'Kompor', 'baru', 10000, '');

-- --------------------------------------------------------

--
-- Table structure for table `tbdetail_penyewaan`
--

CREATE TABLE `tbdetail_penyewaan` (
  `id_penyewaan` int(11) NOT NULL,
  `id_barang` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `harga` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbpelanggan`
--

CREATE TABLE `tbpelanggan` (
  `id_pelanggan` int(11) NOT NULL,
  `nama_pelanggan` varchar(100) NOT NULL,
  `no_hp_pelanggan` varchar(18) NOT NULL,
  `jk` char(1) NOT NULL,
  `alamat_pelanggan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbpelanggan`
--

INSERT INTO `tbpelanggan` (`id_pelanggan`, `nama_pelanggan`, `no_hp_pelanggan`, `jk`, `alamat_pelanggan`) VALUES
(3, 'Karina', '0878-1233-4343', 'P', 'Jl Land Of Dawn'),
(4, 'Balmond', '0878-1234-2345', 'P', 'Jl Jahri saleh'),
(5, 'Hayabusa', '0878-1234-5342', 'L', 'Jl Panti Asuhan');

-- --------------------------------------------------------

--
-- Table structure for table `tbpenyewaan`
--

CREATE TABLE `tbpenyewaan` (
  `id_penyewaan` int(11) NOT NULL,
  `tanggal_sewa` date NOT NULL,
  `tanggal_harus_kembali` date NOT NULL,
  `tanggal_kembali` date NOT NULL,
  `id_pelanggan` int(11) NOT NULL,
  `id_admin` int(11) NOT NULL,
  `total` double NOT NULL,
  `jaminan` varchar(100) NOT NULL,
  `denda` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbadmin`
--
ALTER TABLE `tbadmin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `tbbarang`
--
ALTER TABLE `tbbarang`
  ADD PRIMARY KEY (`id_barang`);

--
-- Indexes for table `tbdetail_penyewaan`
--
ALTER TABLE `tbdetail_penyewaan`
  ADD PRIMARY KEY (`id_penyewaan`,`id_barang`),
  ADD KEY `id_barang` (`id_barang`);

--
-- Indexes for table `tbpelanggan`
--
ALTER TABLE `tbpelanggan`
  ADD PRIMARY KEY (`id_pelanggan`);

--
-- Indexes for table `tbpenyewaan`
--
ALTER TABLE `tbpenyewaan`
  ADD PRIMARY KEY (`id_penyewaan`),
  ADD KEY `id_pelanggan` (`id_pelanggan`),
  ADD KEY `id_admin` (`id_admin`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbadmin`
--
ALTER TABLE `tbadmin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbbarang`
--
ALTER TABLE `tbbarang`
  MODIFY `id_barang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tbpelanggan`
--
ALTER TABLE `tbpelanggan`
  MODIFY `id_pelanggan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbpenyewaan`
--
ALTER TABLE `tbpenyewaan`
  MODIFY `id_penyewaan` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tbdetail_penyewaan`
--
ALTER TABLE `tbdetail_penyewaan`
  ADD CONSTRAINT `tbdetail_penyewaan_ibfk_1` FOREIGN KEY (`id_penyewaan`) REFERENCES `tbpenyewaan` (`id_penyewaan`) ON UPDATE CASCADE,
  ADD CONSTRAINT `tbdetail_penyewaan_ibfk_2` FOREIGN KEY (`id_barang`) REFERENCES `tbbarang` (`id_barang`) ON UPDATE CASCADE;

--
-- Constraints for table `tbpenyewaan`
--
ALTER TABLE `tbpenyewaan`
  ADD CONSTRAINT `tbpenyewaan_ibfk_1` FOREIGN KEY (`id_pelanggan`) REFERENCES `tbpelanggan` (`id_pelanggan`) ON UPDATE CASCADE,
  ADD CONSTRAINT `tbpenyewaan_ibfk_2` FOREIGN KEY (`id_admin`) REFERENCES `tbadmin` (`id_admin`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
