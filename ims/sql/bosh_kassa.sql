-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Sep 15, 2021 at 03:46 PM
-- Server version: 10.3.22-MariaDB
-- PHP Version: 7.1.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `credit`
--

-- --------------------------------------------------------

--
-- Table structure for table `bosh_kassa`
--

CREATE TABLE `bosh_kassa` (
  `id` int(11) NOT NULL,
  `kassa_id` varchar(255) NOT NULL,
  `sana` datetime NOT NULL DEFAULT current_timestamp(),
  `summa` varchar(255) NOT NULL,
  `kir_chiq_status` varchar(255) NOT NULL,
  `tasdiq_status` varchar(255) NOT NULL,
  `contragent_id` varchar(255) NOT NULL,
  `izox` text NOT NULL,
  `filial_kodi` varchar(255) NOT NULL,
  `user_id` varchar(255) NOT NULL,
  `update_sana` datetime NOT NULL,
  `update_user_id` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `bosh_kassa`
--

INSERT INTO `bosh_kassa` (`id`, `kassa_id`, `sana`, `summa`, `kir_chiq_status`, `tasdiq_status`, `contragent_id`, `izox`, `filial_kodi`, `user_id`, `update_sana`, `update_user_id`) VALUES
(1, '1', '2021-09-15 17:01:33', '200000', '0', '1', '0', '', '100', '1', '2021-09-15 17:01:33', '0'),
(2, '4', '2021-09-15 17:16:19', '150000', '0', '1', '0', '', '200', '1', '2021-09-15 17:16:19', '0'),
(3, '20', '2021-09-15 17:16:21', '50000', '0', '1', '0', '', '100', '1', '2021-09-15 17:16:21', '0'),
(4, '20', '2021-09-15 17:17:29', '50000', '0', '1', '0', '', '100', '1', '2021-09-15 17:17:29', '0'),
(5, '20', '2021-09-15 17:17:42', '50000', '0', '1', '0', '', '100', '1', '2021-09-15 17:17:42', '0'),
(6, '20', '2021-09-15 17:18:57', '50000', '0', '1', '0', '', '100', '1', '2021-09-15 17:18:57', '0'),
(7, '20', '2021-09-15 17:19:45', '50000', '0', '1', '0', '', '100', '1', '2021-09-15 17:19:45', '0'),
(8, '20', '2021-09-15 17:23:42', '50000', '0', '1', '0', '', '100', '1', '2021-09-15 17:23:42', '0'),
(9, '20', '2021-09-15 17:29:29', '50000', '0', '1', '0', '', '100', '1', '2021-09-15 17:29:29', '0'),
(10, '20', '2021-09-15 17:29:58', '50000', '0', '1', '0', '', '100', '1', '2021-09-15 17:29:58', '0');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bosh_kassa`
--
ALTER TABLE `bosh_kassa`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bosh_kassa`
--
ALTER TABLE `bosh_kassa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
