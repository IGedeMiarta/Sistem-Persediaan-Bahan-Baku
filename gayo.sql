-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 10, 2020 at 10:56 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.1

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
(13, 'Gayo Premium', 'Arabica', 'Semi Washed', 101, 'Gudang'),
(14, 'Gayo Premium', 'Arabica', 'Semi Washed', 20, 'Kasir'),
(15, 'Gayo Specialty', 'Arabica', 'Full Washed', 100, 'Gudang'),
(16, 'Gayo Specialty', 'Arabica', 'Full Washed', 0, 'Kasir'),
(17, 'Gayo Peaberry', 'Arabica', 'Semi Washed', 190, 'Gudang'),
(18, 'Gayo Peaberry', 'Arabica', 'Semi Washed', 200, 'Kasir'),
(19, 'Kopi Atlantik', 'Robusta', 'Natural Fermented', 20, 'Gudang'),
(20, 'Kopi Atlantik', 'Robusta', 'Natural Fermented', 0, 'Kasir');

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
(3, 14, '2020-12-04 00:00:00', 10, 'kasir', 2),
(4, 15, '2020-12-06 08:23:23', 10, 'gudang', 2),
(5, 13, '2020-12-06 08:35:47', 10, 'gudang', 2),
(6, 17, '2020-12-10 09:33:04', 100, 'gudang', 2),
(7, 17, '2020-12-10 10:47:57', 10, 'gudang', 2);

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
(23, 14, '2020-12-06 00:00:00', 10, NULL, 'Kasir'),
(24, 13, '2020-12-01 00:00:00', 11, 6, 'Gudang'),
(25, 15, '2020-12-06 08:22:33', 100, 5, 'Gudang'),
(26, 15, '2020-12-06 08:25:09', 10, NULL, 'Kasir'),
(27, 14, '2020-12-06 08:40:04', 10, NULL, 'Kasir'),
(28, 17, '2020-12-10 09:30:04', 200, 2, 'Gudang'),
(29, 13, '2020-12-10 09:32:04', 100, 1, 'Gudang'),
(30, 17, '2020-12-10 10:46:02', 100, 8, 'Gudang'),
(31, 19, '2020-12-10 10:47:08', 20, 2, 'Gudang'),
(32, 18, '2020-12-10 10:48:52', 100, NULL, 'Kasir'),
(33, 18, '2020-12-10 10:49:03', 100, NULL, 'Kasir');

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
  `desk` enum('1','2','','') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pegawai`
--

INSERT INTO `pegawai` (`id_pegawai`, `nama`, `jenkel`, `tgl_lahir`, `no_hp`, `alamat`, `desk`) VALUES
(1, 'Assabil Nur', 'L', '1998-06-14', '08722217767', 'Jl. Magelang Km 5, Sleman', '1'),
(2, 'Andrei Asyari Zein', 'L', '1997-09-01', '081124888712', 'Mlati, Sleman Yogyakarta', '2'),
(4, 'irfa gede', 'L', '1998-05-24', '081631977730', 'simpang teritit, aceh', '1');

-- --------------------------------------------------------

--
-- Table structure for table `penjualan`
--

CREATE TABLE `penjualan` (
  `kd_jual` int(11) NOT NULL,
  `produk` int(11) NOT NULL,
  `pembeli` varchar(255) NOT NULL,
  `waktu` datetime NOT NULL,
  `bayar` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `penjualan`
--

INSERT INTO `penjualan` (`kd_jual`, `produk`, `pembeli`, `waktu`, `bayar`) VALUES
(2, 5, 'Prida', '2020-12-09 14:04:53', 20000),
(3, 5, 'robet', '2020-12-10 10:49:44', 20000);

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
(5, '', 'Mild brown sugar', '', 16, 5, 14000),
(6, '', 'Sweet Cherry', '', 16, 4, 15000),
(7, '', 'Sweet caramel', '', 14, 5, 18000),
(8, '', 'Choco brown sugar', 'Dengan Tambahan Brown Sugar Membuat Rasa Kopi Menjadi Semakin Sweet dan lebih nikmat di tenggorokan', 14, 4, 13000);

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
  `role` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `role`) VALUES
(1, 'miartayasa', '$2y$10$TTOCEIH2yPiTBKnyUYV5/.eCBrCtfi/UmsPsXeKkJlvM7vq/3WHUW', 2),
(2, 'admin', '$2y$10$FmO8fDbUZcPH7X9NP1NGoetVZ5YCo86uzQ2iBcOmH9UFBaNc1L86a', 1),
(3, 'gudang', '$2y$10$xKNzh3iaBuCNKfZ2JkXocOkG1xgETrKvUaXqwRDjB6dfGv8D6/W.u', 3);

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
  MODIFY `kd_material` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `material_keluar`
--
ALTER TABLE `material_keluar`
  MODIFY `kd_keluar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `material_masuk`
--
ALTER TABLE `material_masuk`
  MODIFY `kd_masuk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `pegawai`
--
ALTER TABLE `pegawai`
  MODIFY `id_pegawai` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `penjualan`
--
ALTER TABLE `penjualan`
  MODIFY `kd_jual` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `produk`
--
ALTER TABLE `produk`
  MODIFY `kd_produk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

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
