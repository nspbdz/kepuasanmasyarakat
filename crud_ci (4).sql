-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 23, 2022 at 08:42 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `crud_ci`
--

-- --------------------------------------------------------

--
-- Table structure for table `dimensi`
--

CREATE TABLE `dimensi` (
  `id` int(11) NOT NULL,
  `kode` varchar(255) DEFAULT NULL,
  `nama` varchar(255) DEFAULT NULL,
  `detail` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `dimensi`
--

INSERT INTO `dimensi` (`id`, `kode`, `nama`, `detail`) VALUES
(1, 'asd', 'asd', 'asd'),
(2, 'asy', 'asy', 'asy'),
(3, 'opo', 'opo', 'opo'),
(62, 'd1', 'dimensi', 'detail dimensi'),
(63, 'asdasd', 'asdasdsadsads', 'asd123');

-- --------------------------------------------------------

--
-- Table structure for table `jawaban`
--

CREATE TABLE `jawaban` (
  `id` int(11) NOT NULL,
  `kuesioner_id` int(11) NOT NULL,
  `responden_id` int(11) DEFAULT NULL,
  `jawaban_persepsi` tinyint(1) DEFAULT NULL,
  `jawaban_harapan` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `jawaban`
--

INSERT INTO `jawaban` (`id`, `kuesioner_id`, `responden_id`, `jawaban_persepsi`, `jawaban_harapan`) VALUES
(79, 3, 95, 1, 1),
(80, 4, 95, 1, 1),
(81, 5, 95, 1, 1),
(82, 3, 96, 1, 1),
(83, 4, 96, 1, 1),
(84, 5, 96, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `kuesioner`
--

CREATE TABLE `kuesioner` (
  `id` int(11) NOT NULL,
  `kode` varchar(255) NOT NULL,
  `dimensi_id` int(11) NOT NULL,
  `pertanyaan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kuesioner`
--

INSERT INTO `kuesioner` (`id`, `kode`, `dimensi_id`, `pertanyaan`) VALUES
(2, '123asd', 63, '123asd'),
(3, 'aws', 1, 'awawawa'),
(4, 'op', 1, 'awawawa'),
(5, 'aw', 1, 'awawawa'),
(6, 'alsd', 1, 'awawawa'),
(7, 'wsqsf', 1, 'awawawa');

-- --------------------------------------------------------

--
-- Table structure for table `nilai`
--

CREATE TABLE `nilai` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `kode` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `nilai`
--

INSERT INTO `nilai` (`id`, `name`, `kode`) VALUES
(1, NULL, 'STR'),
(2, NULL, 'TB'),
(3, NULL, 'CB'),
(4, NULL, 'B'),
(5, NULL, 'SBS');

-- --------------------------------------------------------

--
-- Table structure for table `responden`
--

CREATE TABLE `responden` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `jenis_kelamin` int(11) NOT NULL,
  `tanggal` varchar(255) DEFAULT NULL,
  `alamat` text NOT NULL,
  `pekerjaan` varchar(255) DEFAULT NULL,
  `kritik` text DEFAULT NULL,
  `date` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `responden`
--

INSERT INTO `responden` (`id`, `nama`, `jenis_kelamin`, `tanggal`, `alamat`, `pekerjaan`, `kritik`, `date`) VALUES
(30, 'bowo', 1, NULL, 'tukdana', 'asd', NULL, '2022-07-23 17:04:32'),
(31, 'bowo', 1, NULL, 'tukdana', 'asd', NULL, '2022-07-23 17:05:52'),
(32, 'bowo', 1, NULL, 'tukdana', 'asd', NULL, '2022-07-23 17:06:50'),
(33, 'bowo', 1, NULL, 'tukdana', 'asd', NULL, '2022-07-23 17:06:51'),
(34, 'bowo', 1, NULL, 'tukdana', 'asd', NULL, '2022-07-23 17:06:55'),
(35, 'bowo', 1, NULL, 'tukdana', 'asd', NULL, '2022-07-23 17:07:05'),
(36, 'bowo', 1, NULL, 'tukdana', 'asd', NULL, '2022-07-23 17:09:33'),
(37, 'bowo', 1, NULL, 'tukdana', 'asd', NULL, '2022-07-23 17:09:37'),
(38, 'bowo', 1, NULL, 'tukdana', 'asd', NULL, '2022-07-23 17:09:38'),
(39, 'bowo', 1, NULL, 'tukdana', 'asd', NULL, '2022-07-23 17:09:38'),
(40, 'bowo', 1, NULL, 'tukdana', 'asd', NULL, '2022-07-23 17:10:03'),
(41, 'bowo', 1, NULL, 'tukdana', 'asd', NULL, '2022-07-23 17:10:03'),
(42, 'bowo', 1, NULL, 'tukdana', 'asd', NULL, '2022-07-23 17:10:04'),
(43, 'bowo', 1, NULL, 'tukdana', 'asd', NULL, '2022-07-23 17:10:04'),
(44, 'bowo', 1, NULL, 'tukdana', 'asd', NULL, '2022-07-23 17:10:04'),
(45, 'bowo', 1, NULL, 'tukdana', 'asd', NULL, '2022-07-23 17:10:05'),
(46, 'aaa', 1, NULL, 'tukdana', 'aaa', NULL, '2022-07-23 17:10:20'),
(47, 'aaa', 1, NULL, 'tukdana', 'aaa', NULL, '2022-07-23 17:10:51'),
(48, 'aaa', 1, NULL, 'tukdana', 'aaa', NULL, '2022-07-23 17:10:58'),
(49, 'aaa', 1, NULL, 'tukdana', 'aaa', NULL, '2022-07-23 17:10:58'),
(50, 'aaa', 1, NULL, 'tukdana', 'aaa', NULL, '2022-07-23 17:12:21'),
(51, 'aaa', 1, NULL, 'tukdana', 'aaa', NULL, '2022-07-23 17:12:31'),
(52, 'aaa', 1, NULL, 'tukdana', 'aaa', NULL, '2022-07-23 17:12:32'),
(53, 'aaa', 1, NULL, 'tukdana', 'aaa', NULL, '2022-07-23 17:12:32'),
(54, 'aaa', 1, NULL, 'tukdana', 'aaa', NULL, '2022-07-23 17:12:33'),
(55, 'aaa', 1, NULL, 'tukdana', 'aaa', NULL, '2022-07-23 17:12:45'),
(56, 'aaa', 1, NULL, 'tukdana', 'aaa', NULL, '2022-07-23 17:12:54'),
(57, 'aaa', 1, NULL, 'tukdana', 'aaa', NULL, '2022-07-23 17:12:55'),
(58, 'aaa', 1, NULL, 'tukdana', 'aaa', NULL, '2022-07-23 17:12:55'),
(59, 'aaa', 1, NULL, 'tukdana', 'aaa', NULL, '2022-07-23 17:13:32'),
(60, 'aaa', 1, NULL, 'tukdana', 'aaa', NULL, '2022-07-23 17:13:32'),
(61, 'aaa', 1, NULL, 'tukdana', 'aaa', NULL, '2022-07-23 17:13:33'),
(62, 'aaa', 1, NULL, 'tukdana', 'aaa', NULL, '2022-07-23 17:13:38'),
(63, 'aaa', 1, NULL, 'tukdana', 'aaa', NULL, '2022-07-23 17:13:39'),
(64, 'aaa', 1, NULL, 'tukdana', 'aaa', NULL, '2022-07-23 17:13:52'),
(65, 'aaa', 1, NULL, 'tukdana', 'aaa', NULL, '2022-07-23 17:13:52'),
(66, 'aaa', 1, NULL, 'tukdana', 'aaa', NULL, '2022-07-23 17:13:53'),
(67, 'aaa', 1, NULL, 'tukdana', 'aaa', NULL, '2022-07-23 17:14:01'),
(68, 'aaa', 1, NULL, 'tukdana', 'aaa', NULL, '2022-07-23 17:14:01'),
(69, 'aaa', 1, NULL, 'tukdana', 'aaa', NULL, '2022-07-23 17:14:10'),
(70, 'aaa', 1, NULL, 'tukdana', 'aaa', NULL, '2022-07-23 17:14:10'),
(71, 'aaa', 1, NULL, 'tukdana', 'aaa', NULL, '2022-07-23 17:14:11'),
(72, 'aaa', 1, NULL, 'tukdana', 'aaa', NULL, '2022-07-23 17:14:14'),
(73, 'aaa', 1, NULL, 'tukdana', 'aaa', NULL, '2022-07-23 17:14:58'),
(74, 'aaa', 1, NULL, 'tukdana', 'aaa', NULL, '2022-07-23 17:14:59'),
(75, 'aaa', 1, NULL, 'tukdana', 'aaa', NULL, '2022-07-23 17:15:13'),
(76, 'aaa', 1, NULL, 'tukdana', 'aaa', NULL, '2022-07-23 17:15:25'),
(77, 'aaa', 1, NULL, 'tukdana', 'aaa', NULL, '2022-07-23 17:15:26'),
(78, 'aaa', 1, NULL, 'tukdana', 'aaa', NULL, '2022-07-23 17:16:13'),
(79, 'aaa', 1, NULL, 'tukdana', 'aaa', NULL, '2022-07-23 17:16:18'),
(80, 'aaa', 1, NULL, 'tukdana', 'aaa', NULL, '2022-07-23 17:16:18'),
(81, 'aaa', 1, NULL, 'tukdana', 'aaa', NULL, '2022-07-23 17:16:26'),
(82, 'aaa', 1, NULL, 'tukdana', 'aaa', NULL, '2022-07-23 17:16:33'),
(83, 'aaa', 1, NULL, 'tukdana', 'aaa', NULL, '2022-07-23 17:16:33'),
(84, 'aaa', 1, NULL, 'tukdana', 'aaa', NULL, '2022-07-23 17:16:33'),
(85, 'aaa', 1, NULL, 'tukdana', 'aaa', NULL, '2022-07-23 17:16:34'),
(86, 'aaa', 1, NULL, 'tukdana', 'aaa', NULL, '2022-07-23 17:16:36'),
(87, 'aaa', 1, NULL, 'tukdana', 'aaa', NULL, '2022-07-23 17:16:41'),
(88, 'aaa', 1, NULL, 'tukdana', 'aaa', NULL, '2022-07-23 17:16:41'),
(89, 'aaa', 1, NULL, 'tukdana', 'aaa', NULL, '2022-07-23 17:16:59'),
(90, 'aasdasdasd', 1, NULL, 'tukdana', 'asd', NULL, '2022-07-23 17:19:06'),
(91, 'potak', 1, NULL, 'tukdana', 'asddd', NULL, '2022-07-23 17:24:12'),
(92, 'akwodmlsad', 1, NULL, 'tukdana', 'akwodmlsad', NULL, '2022-07-23 18:16:13'),
(93, 'akwodmlsad', 1, NULL, 'tukdana', 'akwodmlsad', NULL, '2022-07-23 18:36:07'),
(94, 'masldsa', 1, NULL, 'tukdana', 'masldsa', NULL, '2022-07-23 18:37:43'),
(95, 'wwoowow', 1, NULL, 'tukdana', 'wwoowow', NULL, '2022-07-23 18:40:30'),
(96, 'ajnsdmsadm', 1, NULL, 'tukdana', 'ajnsdmsadm', NULL, '2022-07-23 18:40:56');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` varchar(32) NOT NULL,
  `name` varchar(32) NOT NULL,
  `email` varchar(64) NOT NULL,
  `role` tinyint(4) NOT NULL,
  `username` varchar(64) NOT NULL,
  `password` varchar(255) NOT NULL,
  `avatar` varchar(32) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `last_login` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `email`, `role`, `username`, `password`, `avatar`, `created_at`, `last_login`) VALUES
('', 'udin', 'udin@gmail.com', 0, 'udin', '12345678', NULL, '2022-07-14 12:59:18', NULL),
('6118b2a943acc2.78631959', 'Administrator', 'admin@mail.com', 1, 'admin', '$2y$10$hRi1qju2KOeEPcBZ0wYfhu/PN5e9Wl.ddWeDTds8Uokad764X9D1a', NULL, '2021-08-14 23:22:33', '2022-07-23 12:24:44');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `dimensi`
--
ALTER TABLE `dimensi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jawaban`
--
ALTER TABLE `jawaban`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fkk` (`kuesioner_id`),
  ADD KEY `fkk2` (`responden_id`);

--
-- Indexes for table `kuesioner`
--
ALTER TABLE `kuesioner`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_kuesioner_dimensi_id` (`dimensi_id`);

--
-- Indexes for table `nilai`
--
ALTER TABLE `nilai`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `responden`
--
ALTER TABLE `responden`
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
-- AUTO_INCREMENT for table `dimensi`
--
ALTER TABLE `dimensi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=68;

--
-- AUTO_INCREMENT for table `jawaban`
--
ALTER TABLE `jawaban`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=85;

--
-- AUTO_INCREMENT for table `kuesioner`
--
ALTER TABLE `kuesioner`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `nilai`
--
ALTER TABLE `nilai`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `responden`
--
ALTER TABLE `responden`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=97;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `jawaban`
--
ALTER TABLE `jawaban`
  ADD CONSTRAINT `fkk` FOREIGN KEY (`kuesioner_id`) REFERENCES `kuesioner` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `fkk2` FOREIGN KEY (`responden_id`) REFERENCES `responden` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `kuesioner`
--
ALTER TABLE `kuesioner`
  ADD CONSTRAINT `fk_kuesioner_dimensi_id` FOREIGN KEY (`dimensi_id`) REFERENCES `dimensi` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
