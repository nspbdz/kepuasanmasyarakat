-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 06, 2022 at 10:00 PM
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
-- Database: `kepuasans`
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
  `jawaban1` int(11) NOT NULL,
  `jawaban2` int(11) NOT NULL,
  `jawaban3` int(11) NOT NULL,
  `jawaban4` int(11) NOT NULL,
  `jawaban5` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `jawaban`
--

INSERT INTO `jawaban` (`id`, `kuesioner_id`, `responden_id`, `jawaban1`, `jawaban2`, `jawaban3`, `jawaban4`, `jawaban5`) VALUES
(42774, 2, 106, 0, 1, 0, 0, 0),
(42775, 3, 106, 0, 1, 1, 0, 0),
(42776, 4, 106, 0, 1, 1, 1, 0),
(42777, 5, 107, 1, 0, 0, 0, 0),
(42778, 6, 107, 1, 0, 1, 0, 0),
(42779, 7, 107, 1, 0, 1, 0, 0),
(42780, 5, 107, 1, 0, 0, 0, 0),
(42781, 6, 107, 1, 0, 1, 0, 0),
(42782, 7, 107, 1, 0, 1, 0, 0),
(42783, 2, 107, 1, 0, 0, 0, 0),
(42784, 3, 107, 1, 0, 1, 0, 0),
(42785, 4, 107, 1, 0, 1, 0, 0),
(42786, 2, 108, 1, 0, 0, 0, 0),
(42787, 3, 108, 1, 1, 0, 0, 0),
(42788, 4, 108, 1, 1, 1, 0, 0),
(42789, 2, 108, 0, 0, 1, 0, 0),
(42790, 3, 108, 0, 1, 1, 0, 0),
(42791, 4, 108, 1, 1, 1, 0, 0),
(42792, 2, 108, 0, 1, 0, 0, 0),
(42793, 3, 108, 1, 1, 0, 0, 0),
(42794, 4, 108, 1, 1, 0, 0, 0),
(42795, 2, 108, 0, 0, 1, 0, 0),
(42796, 3, 108, 0, 1, 1, 0, 0),
(42797, 4, 108, 1, 1, 1, 0, 0),
(42798, 2, 108, 0, 0, 1, 0, 0),
(42799, 3, 108, 0, 1, 1, 0, 0),
(42800, 4, 108, 1, 1, 1, 0, 0),
(42801, 2, 108, 0, 0, 1, 0, 0),
(42802, 3, 108, 0, 1, 1, 0, 0),
(42803, 4, 108, 1, 1, 1, 0, 0),
(42804, 2, 108, 0, 0, 1, 0, 0),
(42805, 3, 108, 0, 0, 1, 0, 0),
(42806, 4, 108, 0, 0, 1, 0, 0),
(42807, 2, 108, 0, 0, 1, 0, 0),
(42808, 3, 108, 0, 0, 1, 0, 0),
(42809, 4, 108, 0, 0, 1, 0, 0),
(42810, 2, 108, 0, 0, 1, 0, 0),
(42811, 3, 108, 0, 1, 1, 0, 0),
(42812, 4, 108, 1, 0, 1, 0, 0),
(42813, 2, 108, 0, 0, 1, 0, 0),
(42814, 3, 108, 0, 1, 1, 0, 0),
(42815, 4, 108, 1, 0, 0, 0, 0),
(42816, 2, 108, 0, 0, 1, 0, 0),
(42817, 3, 108, 0, 1, 0, 0, 0),
(42818, 4, 108, 1, 0, 0, 0, 0),
(42819, 2, 108, 0, 0, 0, 0, 0),
(42820, 3, 108, 0, 0, 0, 0, 0),
(42821, 4, 108, 0, 0, 0, 0, 0),
(42822, 2, 108, 0, 0, 1, 0, 0),
(42823, 3, 108, 0, 1, 0, 0, 0),
(42824, 4, 108, 1, 0, 0, 0, 0),
(42825, 2, 108, 0, 0, 1, 0, 0),
(42826, 3, 108, 0, 1, 0, 0, 0),
(42827, 4, 108, 1, 0, 0, 0, 0),
(42828, 2, 108, 0, 0, 1, 0, 0),
(42829, 3, 108, 0, 1, 0, 0, 0),
(42830, 4, 108, 1, 0, 0, 0, 0),
(42831, 2, 109, 1, 0, 0, 0, 0),
(42832, 3, 109, 1, 0, 0, 0, 0),
(42833, 4, 109, 1, 0, 0, 0, 0),
(42834, 2, 110, 1, 0, 0, 0, 0),
(42835, 3, 110, 1, 0, 0, 0, 0),
(42836, 4, 110, 1, 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `jawaban_harapan`
--

CREATE TABLE `jawaban_harapan` (
  `id` int(11) NOT NULL,
  `kuesioner_id` int(11) NOT NULL,
  `responden_id` int(11) DEFAULT NULL,
  `jawaban1` int(11) NOT NULL,
  `jawaban2` int(11) NOT NULL,
  `jawaban3` int(11) NOT NULL,
  `jawaban4` int(11) NOT NULL,
  `jawaban5` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `jawaban_harapan`
--

INSERT INTO `jawaban_harapan` (`id`, `kuesioner_id`, `responden_id`, `jawaban1`, `jawaban2`, `jawaban3`, `jawaban4`, `jawaban5`) VALUES
(42774, 2, 106, 0, 1, 0, 0, 0),
(42775, 3, 106, 0, 1, 1, 0, 0),
(42776, 4, 106, 0, 1, 1, 1, 0),
(42777, 5, 107, 1, 0, 0, 0, 0),
(42778, 6, 107, 1, 0, 1, 0, 0),
(42779, 7, 107, 1, 0, 1, 0, 0),
(42780, 5, 107, 1, 0, 0, 0, 0),
(42781, 6, 107, 1, 0, 1, 0, 0),
(42782, 7, 107, 1, 0, 1, 0, 0),
(42783, 2, 107, 1, 0, 0, 0, 0),
(42784, 3, 107, 1, 0, 1, 0, 0),
(42785, 4, 107, 1, 0, 1, 0, 0),
(42786, 2, 108, 1, 0, 0, 0, 0),
(42787, 3, 108, 1, 1, 0, 0, 0),
(42788, 4, 108, 1, 1, 1, 0, 0),
(42789, 2, 108, 0, 0, 1, 0, 0),
(42790, 3, 108, 0, 1, 1, 0, 0),
(42791, 4, 108, 1, 1, 1, 0, 0),
(42792, 2, 108, 0, 1, 0, 0, 0),
(42793, 3, 108, 1, 1, 0, 0, 0),
(42794, 4, 108, 1, 1, 0, 0, 0),
(42795, 2, 108, 0, 0, 1, 0, 0),
(42796, 3, 108, 0, 1, 1, 0, 0),
(42797, 4, 108, 1, 1, 1, 0, 0),
(42798, 2, 108, 0, 0, 1, 0, 0),
(42799, 3, 108, 0, 1, 1, 0, 0),
(42800, 4, 108, 1, 1, 1, 0, 0),
(42801, 2, 108, 0, 0, 1, 0, 0),
(42802, 3, 108, 0, 1, 1, 0, 0),
(42803, 4, 108, 1, 1, 1, 0, 0),
(42804, 2, 108, 0, 0, 1, 0, 0),
(42805, 3, 108, 0, 0, 1, 0, 0),
(42806, 4, 108, 0, 0, 1, 0, 0),
(42807, 2, 108, 0, 0, 1, 0, 0),
(42808, 3, 108, 0, 0, 1, 0, 0),
(42809, 4, 108, 0, 0, 1, 0, 0),
(42810, 2, 108, 0, 0, 1, 0, 0),
(42811, 3, 108, 0, 1, 1, 0, 0),
(42812, 4, 108, 1, 0, 1, 0, 0),
(42813, 2, 108, 0, 0, 1, 0, 0),
(42814, 3, 108, 0, 1, 1, 0, 0),
(42815, 4, 108, 1, 0, 0, 0, 0),
(42816, 2, 108, 0, 0, 1, 0, 0),
(42817, 3, 108, 0, 1, 0, 0, 0),
(42818, 4, 108, 1, 0, 0, 0, 0),
(42819, 2, 108, 0, 0, 0, 0, 0),
(42820, 3, 108, 0, 0, 0, 0, 0),
(42821, 4, 108, 0, 0, 0, 0, 0),
(42822, 2, 108, 0, 0, 1, 0, 0),
(42823, 3, 108, 0, 1, 0, 0, 0),
(42824, 4, 108, 1, 0, 0, 0, 0),
(42825, 2, 108, 0, 0, 1, 0, 0),
(42826, 3, 108, 0, 1, 0, 0, 0),
(42827, 4, 108, 1, 0, 0, 0, 0),
(42828, 2, 108, 0, 0, 1, 0, 0),
(42829, 3, 108, 0, 1, 0, 0, 0),
(42830, 4, 108, 1, 0, 0, 0, 0),
(42831, 2, 109, 1, 0, 0, 0, 0),
(42832, 3, 109, 1, 0, 0, 0, 0),
(42833, 4, 109, 1, 0, 0, 0, 0),
(42834, 2, 110, 1, 0, 0, 0, 0),
(42835, 3, 110, 1, 0, 0, 0, 0),
(42836, 4, 110, 1, 0, 0, 0, 0);

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
(2, '123asd', 1, '123asd'),
(3, 'aws', 1, 'awawawa'),
(4, 'op', 3, 'awawawa'),
(5, 'aw', 2, 'awawawa'),
(6, 'alsd', 62, 'awawawa'),
(7, 'wsqsf', 3, 'awawawa'),
(8, '1p23', 63, '1p23');

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
(96, 'ajnsdmsadm', 1, NULL, 'tukdana', 'ajnsdmsadm', NULL, '2022-07-23 18:40:56'),
(97, 'kansdn', 1, NULL, 'tukdana', 'kansdn', NULL, '2022-07-23 18:52:33'),
(98, 'asdasd', 1, NULL, 'tukdana', 'asdasd', NULL, '2022-07-23 18:52:48'),
(99, 'koala', 1, NULL, 'tukdana', 'koala', NULL, '2022-07-24 01:30:39'),
(100, 'aaa', 1, NULL, 'tukdana', 'aaa', NULL, '2022-08-04 15:02:55'),
(101, 'alfian', 1, NULL, 'tukdana', 'asd', NULL, '2022-08-06 05:36:34'),
(102, 'bowo', 1, NULL, 'tukdana', 'asd', NULL, '2022-08-06 06:05:29'),
(103, 'aaaa', 1, NULL, 'tukdana', 'aaaa', NULL, '2022-08-06 06:20:51'),
(104, 'aaaa', 1, NULL, 'tukdana', 'aaaa', NULL, '2022-08-06 06:21:17'),
(105, 'alksdlsad', 1, NULL, 'tukdana', 'alksdlsad', NULL, '2022-08-06 06:24:09'),
(106, 'lwpalwpl', 1, NULL, 'tukdana', 'lwpalwpl', NULL, '2022-08-06 06:31:39'),
(107, 'asdasdas', 1, NULL, 'tukdana', 'asdasdas', NULL, '2022-08-06 06:32:32'),
(108, 'asdasd', 1, NULL, 'tukdana', 'asdasd', NULL, '2022-08-06 06:38:21'),
(109, 'asdasda', 1, NULL, 'tukdana', 'asdasda', NULL, '2022-08-06 07:33:04'),
(110, 'kad', 1, NULL, 'tukdana', 'kad', NULL, '2022-08-06 07:50:33');

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
('6118b2a943acc2.78631959', 'Administrator', 'admin@mail.com', 1, 'admin', '$2y$10$hRi1qju2KOeEPcBZ0wYfhu/PN5e9Wl.ddWeDTds8Uokad764X9D1a', NULL, '2021-08-14 23:22:33', '2022-08-06 05:19:39');

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
-- Indexes for table `jawaban_harapan`
--
ALTER TABLE `jawaban_harapan`
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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42837;

--
-- AUTO_INCREMENT for table `jawaban_harapan`
--
ALTER TABLE `jawaban_harapan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42837;

--
-- AUTO_INCREMENT for table `kuesioner`
--
ALTER TABLE `kuesioner`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `nilai`
--
ALTER TABLE `nilai`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `responden`
--
ALTER TABLE `responden`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=111;

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
