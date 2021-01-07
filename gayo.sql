-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 07, 2021 at 04:18 AM
-- Server version: 10.3.16-MariaDB
-- PHP Version: 7.3.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `gayo`
--

-- --------------------------------------------------------

--
-- Table structure for table `material`
--

CREATE TABLE `material` (
  `kd_material` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `varian` enum('Arabica','Robusta') NOT NULL,
  `tipe` enum('Semi Washed','Full Washed','Natural Fermented','Honey Proses','Wine Proses') NOT NULL,
  `stok` int(11) NOT NULL,
  `detail` enum('Kasir','Gudang') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `material`
--

INSERT INTO `material` (`kd_material`, `nama`, `varian`, `tipe`, `stok`, `detail`) VALUES
(23, 'Gayo Premium', 'Arabica', 'Semi Washed', 50, 'Gudang'),
(24, 'Gayo Premium', 'Arabica', 'Semi Washed', 25, 'Kasir'),
(25, 'Gayo Specialty', 'Arabica', 'Full Washed', 100, 'Gudang'),
(26, 'Gayo Specialty', 'Arabica', 'Full Washed', 0, 'Kasir'),
(27, 'Gayo Peaberry', 'Arabica', 'Semi Washed', 100, 'Gudang'),
(28, 'Gayo Peaberry', 'Arabica', 'Semi Washed', 0, 'Kasir'),
(29, 'Gayo Longberry', 'Arabica', 'Semi Washed', 0, 'Gudang'),
(30, 'Gayo Longberry', 'Arabica', 'Semi Washed', 0, 'Kasir'),
(31, 'Gayo Honey', 'Arabica', 'Honey Proses', 0, 'Gudang'),
(32, 'Gayo Honey', 'Arabica', 'Honey Proses', 0, 'Kasir');

-- --------------------------------------------------------

--
-- Table structure for table `material_keluar`
--

CREATE TABLE `material_keluar` (
  `kd_keluar` int(11) NOT NULL,
  `kd_material` int(11) NOT NULL,
  `waktu` datetime NOT NULL,
  `jumlah` int(11) NOT NULL,
  `detail` enum('kasir','gudang','','') NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `material_keluar`
--

INSERT INTO `material_keluar` (`kd_keluar`, `kd_material`, `waktu`, `jumlah`, `detail`, `status`) VALUES
(15, 23, '2021-01-06 17:59:36', 50, 'gudang', 2);

--
-- Triggers `material_keluar`
--
DELIMITER $$
CREATE TRIGGER `material_out` AFTER INSERT ON `material_keluar` FOR EACH ROW BEGIN 
	UPDATE material SET stok = stok - NEW.jumlah
	WHERE NEW.kd_material=material.kd_material
    AND material.stok > NEW.jumlah ;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `material_masuk`
--

CREATE TABLE `material_masuk` (
  `kd_masuk` int(11) NOT NULL,
  `kd_material` int(11) NOT NULL,
  `waktu` datetime NOT NULL,
  `jumlah` int(11) NOT NULL,
  `supplier` int(11) DEFAULT NULL,
  `detail` enum('Kasir','Gudang') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `material_masuk`
--

INSERT INTO `material_masuk` (`kd_masuk`, `kd_material`, `waktu`, `jumlah`, `supplier`, `detail`) VALUES
(40, 23, '2021-01-06 17:50:39', 100, 1, 'Gudang'),
(41, 25, '2021-01-06 17:50:58', 100, 2, 'Gudang'),
(42, 27, '2021-01-06 17:51:27', 100, 3, 'Gudang'),
(43, 24, '2021-01-06 18:01:53', 50, NULL, 'Kasir');

--
-- Triggers `material_masuk`
--
DELIMITER $$
CREATE TRIGGER `gudang_masuk` AFTER INSERT ON `material_masuk` FOR EACH ROW BEGIN 
	UPDATE material SET stok = stok + NEW.jumlah
	WHERE NEW.kd_material=material.kd_material AND NEW.detail='Gudang';
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `kasir_masuk` BEFORE INSERT ON `material_masuk` FOR EACH ROW BEGIN 
	UPDATE material SET stok = stok + NEW.jumlah
	WHERE NEW.kd_material=material.kd_material AND NEW.detail='Kasir';
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `pegawai`
--

CREATE TABLE `pegawai` (
  `id_pegawai` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `jenkel` enum('L','P','','') NOT NULL,
  `tgl_lahir` date NOT NULL,
  `no_hp` varchar(255) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `role` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pegawai`
--

INSERT INTO `pegawai` (`id_pegawai`, `nama`, `jenkel`, `tgl_lahir`, `no_hp`, `alamat`, `role`) VALUES
(1, 'Assabil Nur', 'L', '1998-06-14', '08722217767', 'Jl. Magelang Km 5, Sleman', 3),
(2, 'Andrei Asyari Zein', 'L', '1997-09-01', '081124888712', 'Mlati, Sleman Yogyakarta', 2),
(4, 'Irwa Windi', 'L', '1998-05-24', '081631977730', 'simpang teritit, aceh', 2),
(5, 'Diana Prastika', 'P', '2020-12-02', '081521555980', 'yogya', 2);

-- --------------------------------------------------------

--
-- Table structure for table `penjualan`
--

CREATE TABLE `penjualan` (
  `kd_jual` int(11) NOT NULL,
  `produk` int(11) NOT NULL,
  `pembeli` varchar(255) NOT NULL,
  `waktu` datetime NOT NULL,
  `jumlah` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `penjualan`
--

INSERT INTO `penjualan` (`kd_jual`, `produk`, `pembeli`, `waktu`, `jumlah`) VALUES
(33, 9, 'Irfa', '2021-01-06 18:05:38', 1),
(34, 9, 'Adlan', '2021-01-06 18:08:37', 2),
(35, 9, 'Prida', '2021-01-06 18:17:50', 2);

-- --------------------------------------------------------

--
-- Table structure for table `produk`
--

CREATE TABLE `produk` (
  `kd_produk` int(11) NOT NULL,
  `gambar` varchar(255) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `deskripsi` text NOT NULL,
  `material` int(11) NOT NULL,
  `material_cost` int(11) NOT NULL,
  `harga` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `produk`
--

INSERT INTO `produk` (`kd_produk`, `gambar`, `nama`, `deskripsi`, `material`, `material_cost`, `harga`) VALUES
(9, '', 'Choco brown sugar', 'Kopi Dengan Taburan Gula Jawa dan Coklat', 24, 5, 15000);

-- --------------------------------------------------------

--
-- Table structure for table `retur`
--

CREATE TABLE `retur` (
  `kd_retur` int(11) NOT NULL,
  `kd_material` int(11) NOT NULL,
  `waktu` datetime NOT NULL,
  `status` int(11) NOT NULL,
  `detail` enum('kasir','gudang','','') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `supplier`
--

CREATE TABLE `supplier` (
  `id_sup` int(11) NOT NULL,
  `nama_sup` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `no_hp` varchar(255) NOT NULL,
  `alamat` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `supplier`
--

INSERT INTO `supplier` (`id_sup`, `nama_sup`, `owner`, `no_hp`, `alamat`) VALUES
(1, 'CV. kopi banda', 'Bapak Ruslan', '0812333879', 'Jl. Jendral A. Yani, Banda Aceh'),
(2, 'Kopi Siantar Baru', 'Mhd. Ryan', '0852663899', 'Jl. Pematang Siantar, No 144 Medan '),
(3, 'Koprasi Tani Mulia', 'Bapak Adlan', '0815677792', 'Banda Aceh'),
(4, 'Koprasi Tani Banda', 'Muh. Amin Arifin', '0898880287', 'Jl. Penatu asri, Kel. Banda Mulia 2'),
(5, 'CV. Rukun Semesta', 'Bpk. Surya Winata', '081521555980', 'Jl Penarukan 11. Ayani'),
(6, 'Koprasi Petani Kopi', 'Mhd. Puyono', '081521599111', 'Jl. kemerdekaan, No 1441 Pematang Siantar'),
(8, 'cv.temanggung', 'dika', '0812237676767676', 'temanggung');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `id_pegawai` int(11) NOT NULL,
  `role` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `id_pegawai`, `role`) VALUES
(1, 'admin', '$2y$10$FmO8fDbUZcPH7X9NP1NGoetVZ5YCo86uzQ2iBcOmH9UFBaNc1L86a', 0, 1),
(4, 'kasir', '$2y$10$DJoHAGNekv4ZcOXk5fUQg.DQ0IS0tYB83KNr/Taviw7KfrGooiaVy', 4, 2),
(5, 'gudang', '$2y$10$Rr1roEtcJzY1WSkSICHdXOhUNVkqJMDL0voCiX/ljJ0IpSo6lqeK2', 2, 3),
(6, 'diana', '$2y$10$7YzIqby8P1Cvm1JAYsJYEeMjtV2/OGrGJVtEYl/YOKoGxraVEm/mW', 5, 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `material`
--
ALTER TABLE `material`
  ADD PRIMARY KEY (`kd_material`);

--
-- Indexes for table `material_keluar`
--
ALTER TABLE `material_keluar`
  ADD PRIMARY KEY (`kd_keluar`),
  ADD KEY `kd_material` (`kd_material`);

--
-- Indexes for table `material_masuk`
--
ALTER TABLE `material_masuk`
  ADD PRIMARY KEY (`kd_masuk`),
  ADD KEY `kd_material` (`kd_material`),
  ADD KEY `supplier` (`supplier`);

--
-- Indexes for table `pegawai`
--
ALTER TABLE `pegawai`
  ADD PRIMARY KEY (`id_pegawai`);

--
-- Indexes for table `penjualan`
--
ALTER TABLE `penjualan`
  ADD PRIMARY KEY (`kd_jual`),
  ADD KEY `produk` (`produk`);

--
-- Indexes for table `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`kd_produk`),
  ADD KEY `material` (`material`);

--
-- Indexes for table `retur`
--
ALTER TABLE `retur`
  ADD PRIMARY KEY (`kd_retur`),
  ADD KEY `kd_material` (`kd_material`);

--
-- Indexes for table `supplier`
--
ALTER TABLE `supplier`
  ADD PRIMARY KEY (`id_sup`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `material`
--
ALTER TABLE `material`
  MODIFY `kd_material` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `material_keluar`
--
ALTER TABLE `material_keluar`
  MODIFY `kd_keluar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `material_masuk`
--
ALTER TABLE `material_masuk`
  MODIFY `kd_masuk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `pegawai`
--
ALTER TABLE `pegawai`
  MODIFY `id_pegawai` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `penjualan`
--
ALTER TABLE `penjualan`
  MODIFY `kd_jual` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `produk`
--
ALTER TABLE `produk`
  MODIFY `kd_produk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `retur`
--
ALTER TABLE `retur`
  MODIFY `kd_retur` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `supplier`
--
ALTER TABLE `supplier`
  MODIFY `id_sup` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `material_keluar`
--
ALTER TABLE `material_keluar`
  ADD CONSTRAINT `material_keluar_ibfk_1` FOREIGN KEY (`kd_material`) REFERENCES `material` (`kd_material`);

--
-- Constraints for table `material_masuk`
--
ALTER TABLE `material_masuk`
  ADD CONSTRAINT `material_masuk_ibfk_1` FOREIGN KEY (`kd_material`) REFERENCES `material` (`kd_material`),
  ADD CONSTRAINT `material_masuk_ibfk_2` FOREIGN KEY (`supplier`) REFERENCES `supplier` (`id_sup`);

--
-- Constraints for table `penjualan`
--
ALTER TABLE `penjualan`
  ADD CONSTRAINT `penjualan_ibfk_1` FOREIGN KEY (`produk`) REFERENCES `produk` (`kd_produk`);

--
-- Constraints for table `produk`
--
ALTER TABLE `produk`
  ADD CONSTRAINT `produk_ibfk_1` FOREIGN KEY (`material`) REFERENCES `material` (`kd_material`);

--
-- Constraints for table `retur`
--
ALTER TABLE `retur`
  ADD CONSTRAINT `retur_ibfk_1` FOREIGN KEY (`kd_material`) REFERENCES `material` (`kd_material`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
