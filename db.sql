-- phpMyAdmin SQL Dump
-- version 4.9.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Apr 06, 2021 at 05:26 PM
-- Server version: 5.7.26
-- PHP Version: 7.2.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `erp`
--

-- --------------------------------------------------------

--
-- Table structure for table `lain`
--

CREATE TABLE `lain` (
  `id` int(11) NOT NULL,
  `id_main` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `harga` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `lain`
--

INSERT INTO `lain` (`id`, `id_main`, `nama`, `harga`) VALUES
(2, 3, 'Sewa Kapal Selam', 13000000),
(3, 3, 'Jet Pribadi', 90000000);

-- --------------------------------------------------------

--
-- Table structure for table `main`
--

CREATE TABLE `main` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `nilai` bigint(20) NOT NULL,
  `um_termin` bigint(20) DEFAULT NULL,
  `ppn_pph` double DEFAULT NULL,
  `material` int(11) DEFAULT NULL,
  `upah_tukang` int(11) DEFAULT NULL,
  `biaya_lain` int(11) DEFAULT NULL,
  `fee` int(11) DEFAULT NULL,
  `profit` int(11) DEFAULT NULL,
  `ket` text,
  `createAt` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `main`
--

INSERT INTO `main` (`id`, `nama`, `nilai`, `um_termin`, `ppn_pph`, `material`, `upah_tukang`, `biaya_lain`, `fee`, `profit`, `ket`, `createAt`) VALUES
(1, 'BMKG', 1000000000, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '04 Apr 2021'),
(2, 'BAPPEDA', 2000000000, 1000000000, NULL, NULL, NULL, NULL, 1000000, NULL, NULL, '04 Apr 2021'),
(3, 'STIKES', 3000000000, 2000000000, 1.299, NULL, NULL, NULL, 5000000, NULL, NULL, '05 Apr 2021');

-- --------------------------------------------------------

--
-- Table structure for table `material`
--

CREATE TABLE `material` (
  `id` int(11) NOT NULL,
  `id_main` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `harga` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `material`
--

INSERT INTO `material` (`id`, `id_main`, `nama`, `harga`) VALUES
(16, 3, 'Semen Tonasa', 30000000),
(17, 3, 'Kayu Besi', 30000000),
(18, 3, 'Besi', 13800000);

-- --------------------------------------------------------

--
-- Table structure for table `tukang`
--

CREATE TABLE `tukang` (
  `id` int(11) NOT NULL,
  `id_main` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `harga` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tukang`
--

INSERT INTO `tukang` (`id`, `id_main`, `nama`, `harga`) VALUES
(4, 2, 'Goldhy', 40000000),
(11, 3, 'Goldhy', 15300000),
(12, 3, 'Jono', 19000000);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `password`) VALUES
(1, 'user', '$2y$10$P0.nmrpwQSOQEcHXy0gOlunJkJzx8By5Nh4fgckS/gugxJdRNO/pq'),
(2, 'user2', '$2y$10$P0.nmrpwQSOQEcHXy0gOlunJkJzx8By5Nh4fgckS/gugxJdRNO/pq');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `lain`
--
ALTER TABLE `lain`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `main`
--
ALTER TABLE `main`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `material`
--
ALTER TABLE `material`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tukang`
--
ALTER TABLE `tukang`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `lain`
--
ALTER TABLE `lain`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `main`
--
ALTER TABLE `main`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `material`
--
ALTER TABLE `material`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `tukang`
--
ALTER TABLE `tukang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
