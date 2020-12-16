-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Dec 16, 2020 at 04:32 AM
-- Server version: 10.5.8-MariaDB
-- PHP Version: 7.4.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `persediaan_obat`
--

-- --------------------------------------------------------

--
-- Table structure for table `is_users`
--

CREATE TABLE `is_users` (
  `id_user` int(3) NOT NULL,
  `username` varchar(50) NOT NULL,
  `nama_user` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `email` varchar(50) DEFAULT NULL,
  `telepon` varchar(13) DEFAULT NULL,
  `foto` varchar(100) DEFAULT NULL,
  `hak_akses` enum('Super Admin','Manajer','Gudang') NOT NULL,
  `status` enum('aktif','blokir') NOT NULL DEFAULT 'aktif',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `is_users`
--

INSERT INTO `is_users` (`id_user`, `username`, `nama_user`, `password`, `email`, `telepon`, `foto`, `hak_akses`, `status`, `created_at`, `updated_at`) VALUES
(1, 'ari', 'ari', 'fc292bd7df071858c2d0f955545673c1', 'ari@gmail.com', '08566', 'd7222b3fec7504da5b2bc407fd67404d.jpg', 'Super Admin', 'aktif', '2017-04-01 08:15:15', '2020-12-08 13:00:12'),
(2, 'wahyu', 'wahyu', '32c9e71e866ecdbc93e497482aa6779f', 'wahyu@gmail.com', '0888888888888', 'kadina.png', 'Manajer', 'aktif', '2017-04-01 08:15:15', '2020-12-15 05:53:18'),
(3, 'abril', 'abril', 'dccefc9affe37ba60b49d0a4789ce042', 'abril@gmail.com', '0888888888888', '', 'Manajer', 'aktif', '2017-04-01 08:15:15', '2020-12-15 05:53:36'),
(8, 'amal', 'amal', '16b5480e7b6e68607fe48815d16b5d6d', NULL, NULL, NULL, 'Gudang', 'aktif', '2020-12-15 05:52:16', '2020-12-15 05:52:16'),
(9, 'albani', 'albani', '5059cf35681ed6ba6565c16f759d9b76', NULL, NULL, NULL, 'Gudang', 'aktif', '2020-12-15 05:52:36', '2020-12-16 02:00:56');

-- --------------------------------------------------------

--
-- Table structure for table `log_obat`
--

CREATE TABLE `log_obat` (
  `kode_obat` varchar(10) NOT NULL,
  `nama_obat` varchar(50) DEFAULT NULL,
  `bentuk_obat` varchar(35) DEFAULT NULL,
  `harga_lama` int(11) DEFAULT NULL,
  `harga_baru` int(11) DEFAULT NULL,
  `waktu_perubahan` datetime DEFAULT NULL,
  `nama_ubah` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `obat`
--

CREATE TABLE `obat` (
  `kode_obat` varchar(10) NOT NULL,
  `nama_obat` varchar(50) DEFAULT NULL,
  `bentuk_obat` varchar(35) DEFAULT NULL,
  `tgl_produksi` date DEFAULT NULL,
  `tgl_kadaluarsa` date DEFAULT NULL,
  `harga_satuan` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `obat`
--

INSERT INTO `obat` (`kode_obat`, `nama_obat`, `bentuk_obat`, `tgl_produksi`, `tgl_kadaluarsa`, `harga_satuan`) VALUES
('KPRNS1723', 'RHINNOS', 'KAPLET', '2017-02-02', '2023-01-31', 45000),
('SLMNZ1520', 'MICONAZOLE', 'SALEP', '2015-09-15', '2020-12-09', 18000),
('SRSCF1723', 'SUCRALFATE', 'SYRUP', '2017-03-23', '2023-03-20', 62500),
('SRZNP1723', 'ZINCPRO', 'SYRUP', '2017-02-02', '2023-01-31', 15000),
('TBALD1723', 'AMLODIPINE', 'TABLET', '2017-02-02', '2023-01-31', 51000);

--
-- Triggers `obat`
--
DELIMITER $$
CREATE TRIGGER `setelah_update_obat` AFTER UPDATE ON `obat` FOR EACH ROW BEGIN
INSERT INTO log_obat
SET kode_obat = OLD.kode_obat,
nama_obat = OLD.nama_obat,
bentuk_obat = OLD.bentuk_obat,
harga_lama = OLD.harga_satuan,
harga_baru = NEW.harga_satuan, 
waktu_perubahan = NOW();
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `obat_kadaluarsa`
--

CREATE TABLE `obat_kadaluarsa` (
  `id` int(11) NOT NULL,
  `kode_obat` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `penjualan`
--

CREATE TABLE `penjualan` (
  `kode_obat` varchar(10) NOT NULL,
  `tgl_transaksi` date DEFAULT NULL,
  `jumlah_terjual` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Triggers `penjualan`
--
DELIMITER $$
CREATE TRIGGER `update_stok` AFTER INSERT ON `penjualan` FOR EACH ROW BEGIN
 UPDATE persediaan SET jumlah_sedia=jumlah_sedia-NEW.jumlah_terjual
 WHERE kode_obat=NEW.kode_obat;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Stand-in structure for view `penjualan_februari`
-- (See below for the actual view)
--
CREATE TABLE `penjualan_februari` (
`kode_obat` varchar(10)
,`nama_obat` varchar(50)
,`harga_satuan` int(11)
,`jumlah_terjual` int(11)
,`total_harga_terjual` bigint(21)
,`sisa_stok` int(11)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `penjualan_januari`
-- (See below for the actual view)
--
CREATE TABLE `penjualan_januari` (
`kode_obat` varchar(10)
,`nama_obat` varchar(50)
,`harga_satuan` int(11)
,`jumlah_terjual` int(11)
,`total_harga_terjual` bigint(21)
,`sisa_stok` int(11)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `penjualan_maret`
-- (See below for the actual view)
--
CREATE TABLE `penjualan_maret` (
`kode_obat` varchar(10)
,`nama_obat` varchar(50)
,`harga_satuan` int(11)
,`jumlah_terjual` int(11)
,`total_harga_terjual` bigint(21)
,`sisa_stok` int(11)
);

-- --------------------------------------------------------

--
-- Table structure for table `persediaan`
--

CREATE TABLE `persediaan` (
  `kode_obat` varchar(10) NOT NULL,
  `jumlah_sedia` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `persediaan`
--

INSERT INTO `persediaan` (`kode_obat`, `jumlah_sedia`) VALUES
('KPRNS1723', 100),
('SLMNZ1520', 100),
('SRSCF1723', 100),
('SRZNP1723', 100),
('TBALD1723', 100);

-- --------------------------------------------------------

--
-- Structure for view `penjualan_februari`
--
DROP TABLE IF EXISTS `penjualan_februari`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `penjualan_februari`  AS  select `obat`.`kode_obat` AS `kode_obat`,`obat`.`nama_obat` AS `nama_obat`,`obat`.`harga_satuan` AS `harga_satuan`,`penjualan`.`jumlah_terjual` AS `jumlah_terjual`,`obat`.`harga_satuan` * `penjualan`.`jumlah_terjual` AS `total_harga_terjual`,`persediaan`.`jumlah_sedia` AS `sisa_stok` from ((`obat` left join `persediaan` on(`obat`.`kode_obat` = `persediaan`.`kode_obat`)) left join `penjualan` on(`obat`.`kode_obat` = `penjualan`.`kode_obat`)) where `penjualan`.`tgl_transaksi` like '2019-02%' ;

-- --------------------------------------------------------

--
-- Structure for view `penjualan_januari`
--
DROP TABLE IF EXISTS `penjualan_januari`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `penjualan_januari`  AS  select `obat`.`kode_obat` AS `kode_obat`,`obat`.`nama_obat` AS `nama_obat`,`obat`.`harga_satuan` AS `harga_satuan`,`penjualan`.`jumlah_terjual` AS `jumlah_terjual`,`obat`.`harga_satuan` * `penjualan`.`jumlah_terjual` AS `total_harga_terjual`,`persediaan`.`jumlah_sedia` AS `sisa_stok` from ((`obat` left join `persediaan` on(`obat`.`kode_obat` = `persediaan`.`kode_obat`)) left join `penjualan` on(`obat`.`kode_obat` = `penjualan`.`kode_obat`)) where `penjualan`.`tgl_transaksi` like '2019-01%' ;

-- --------------------------------------------------------

--
-- Structure for view `penjualan_maret`
--
DROP TABLE IF EXISTS `penjualan_maret`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `penjualan_maret`  AS  select `obat`.`kode_obat` AS `kode_obat`,`obat`.`nama_obat` AS `nama_obat`,`obat`.`harga_satuan` AS `harga_satuan`,`penjualan`.`jumlah_terjual` AS `jumlah_terjual`,`obat`.`harga_satuan` * `penjualan`.`jumlah_terjual` AS `total_harga_terjual`,`persediaan`.`jumlah_sedia` AS `sisa_stok` from ((`obat` left join `persediaan` on(`obat`.`kode_obat` = `persediaan`.`kode_obat`)) left join `penjualan` on(`obat`.`kode_obat` = `penjualan`.`kode_obat`)) where `penjualan`.`tgl_transaksi` like '2019-03%' ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `is_users`
--
ALTER TABLE `is_users`
  ADD PRIMARY KEY (`id_user`),
  ADD KEY `level` (`hak_akses`);

--
-- Indexes for table `log_obat`
--
ALTER TABLE `log_obat`
  ADD PRIMARY KEY (`kode_obat`);

--
-- Indexes for table `obat`
--
ALTER TABLE `obat`
  ADD PRIMARY KEY (`kode_obat`);

--
-- Indexes for table `obat_kadaluarsa`
--
ALTER TABLE `obat_kadaluarsa`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `persediaan`
--
ALTER TABLE `persediaan`
  ADD PRIMARY KEY (`kode_obat`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `is_users`
--
ALTER TABLE `is_users`
  MODIFY `id_user` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `obat_kadaluarsa`
--
ALTER TABLE `obat_kadaluarsa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=575;

DELIMITER $$
--
-- Events
--
CREATE DEFINER=`root`@`localhost` EVENT `cek_kadaluarsa` ON SCHEDULE EVERY 1 DAY STARTS '2020-12-16 10:54:34' ON COMPLETION PRESERVE ENABLE DO INSERT INTO obat_kadaluarsa(kode_obat)(
    SELECT
        kode_obat
    FROM
        obat
    WHERE
        tgl_kadaluarsa <= CURDATE() AND NOT EXISTS(
        SELECT
            *
        FROM
            obat_kadaluarsa
        WHERE
            kode_obat = obat.kode_obat
    ))$$

DELIMITER ;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
