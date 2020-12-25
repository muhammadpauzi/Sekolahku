-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 25, 2020 at 10:07 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_sekolahku`
--

-- --------------------------------------------------------

--
-- Table structure for table `guru`
--

CREATE TABLE `guru` (
  `id` int(11) NOT NULL,
  `nama` varchar(128) NOT NULL,
  `alamat` varchar(128) NOT NULL,
  `jenis_kelamin` varchar(9) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `guru`
--

INSERT INTO `guru` (`id`, `nama`, `alamat`, `jenis_kelamin`) VALUES
(1, 'Saya Tidak Tahu', 'Entah dimana', 'Laki-laki'),
(5, 'Namanya', 'Rumahnya', 'Laki-laki'),
(7, 'Namanya Adalah', 'Rumahnya Di', 'Laki-laki');

-- --------------------------------------------------------

--
-- Table structure for table `jurusan`
--

CREATE TABLE `jurusan` (
  `id` int(11) NOT NULL,
  `nama` varchar(128) NOT NULL,
  `kepala` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `jurusan`
--

INSERT INTO `jurusan` (`id`, `nama`, `kepala`) VALUES
(1, 'Teknik Komputer dan Jaringan', 'Saya Tidak Tahu'),
(5, 'asas', 'Namanya'),
(6, 'asas', 'asas');

-- --------------------------------------------------------

--
-- Table structure for table `murid`
--

CREATE TABLE `murid` (
  `id` int(11) NOT NULL,
  `nama` varchar(128) NOT NULL,
  `alamat` varchar(128) NOT NULL,
  `jenis_kelamin` varchar(9) NOT NULL,
  `foto` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `murid`
--

INSERT INTO `murid` (`id`, `nama`, `alamat`, `jenis_kelamin`, `foto`) VALUES
(1, 'Muhammad Pauzi', 'Desa Paya Rengas', 'Laki-laki', 'default.jpg'),
(2, 'Muhammad Ilham', 'Desa Paya Rengas', 'Laki-laki', 'default.jpg'),
(3, 'Muhammad Sukri', 'Desa Paya Rengas', 'Laki-laki', 'default.jpg'),
(8, 'Nama Ku Siapa', 'Saya tidak tahu saya tinggal dimana', 'Laki-laki', 'default.jpg'),
(52, 'asas', 'asas', 'Laki-laki', '13131212202020205fd5cd1f60ac3.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(128) NOT NULL,
  `nama_panjang` varchar(128) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `nama_panjang`, `password`) VALUES
(6, 'pauzi', 'Muhammad Pauzi', '$2y$10$O4Flw0tUw2y2eMC00jG83OnCZRo7Y3i0wquOrsUCOq9opqN056gji'),
(7, '1', '1', '$2y$10$uKmqQdVrSBtSS9dXk/D8iOTwa73OEZgyueykfpp94kCCffaXm1Saq'),
(8, '123', '123', '$2y$10$uWkFyavQAW/XZtaby3DoN.CV1z3shUylb5pEuG1orCxXFdfe4wftC'),
(9, 'asas', 'asas', '$2y$10$97ZDELuEq0j/sgbbW9/jtOP6Jd0XnG3iom4m03YxFUhX8ZKiVdhIi'),
(10, '121212', '1212', '$2y$10$wv6q03NxdF3rpUUYZbu5RO7jZDb1yjRUJj1TBO5Ksz3XFsxTSvoT6');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `guru`
--
ALTER TABLE `guru`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jurusan`
--
ALTER TABLE `jurusan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `murid`
--
ALTER TABLE `murid`
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
-- AUTO_INCREMENT for table `guru`
--
ALTER TABLE `guru`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `jurusan`
--
ALTER TABLE `jurusan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `murid`
--
ALTER TABLE `murid`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
