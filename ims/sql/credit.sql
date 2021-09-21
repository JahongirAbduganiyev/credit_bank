git -- phpMyAdmin SQL Dump
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

-- --------------------------------------------------------

--
-- Table structure for table `client`
--

CREATE TABLE `client` (
  `id` int(11) NOT NULL,
  `sana` varchar(255) NOT NULL,
  `fish` varchar(255) NOT NULL,
  `p_nomer` varchar(255) NOT NULL,
  `manzil` varchar(255) NOT NULL,
  `moljal` varchar(255) NOT NULL,
  `tel_nomer` varchar(255) NOT NULL,
  `client_kodi` varchar(255) NOT NULL,
  `credit_kodi` varchar(255) NOT NULL,
  `filial_nomi` varchar(255) NOT NULL,
  `status` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `client`
--

INSERT INTO `client` (`id`, `sana`, `fish`, `p_nomer`, `manzil`, `moljal`, `tel_nomer`, `client_kodi`, `credit_kodi`, `filial_nomi`, `status`) VALUES
(1, '2021-07-13', 'Алибаева Хуршида Шералиевна', 'AB 7251190', 'Уртачирчик тумани Янги-хаёт МФЙ  Бирлик кучаси 91уй, Уртачирчик тумани Янги-хаёт МФЙ  Бирлик кучаси 91уй', 'Чигирик Янги богча  ёнида ', '993153755', '7288', '01', 'buvayda', 0),
(2, '2020-12-28', 'Абдухоликов Юлчивой ХХХ', 'AB 8299161', 'Жалаер МФЙ, Жийдали кишлоги', 'Гузарбоши кучаси 93-уй', '937311516', '72888', '01', 'buvayda', 0),
(3, '2021-06-18', 'Jalilov Alijon Qobiljon O\'g\'li', 'AB 1194596', 'Arab MFY, Buvayda Tumani O\'rta qishlog\'i Ajdodlar ko\'chasi 14-uy', 'Leksmi Do\'koni ro\'parasida', '996216169', '123', '01', 'bagdod', 0);

-- --------------------------------------------------------

--
-- Table structure for table `contragent`
--

CREATE TABLE `contragent` (
  `id` int(11) NOT NULL,
  `nomi` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `contragent`
--

INSERT INTO `contragent` (`id`, `nomi`) VALUES
(1, 'Texno Grand'),
(2, 'Artel'),
(3, 'Artel'),
(4, 'Mif MCHJ'),
(5, 'Mif MCHJ'),
(6, 'Artel'),
(7, 'Texno Grand'),
(8, 'Texno Grand'),
(9, 'Texno Grand'),
(10, 'Texno Grand'),
(11, 'Artel'),
(12, 'Texno Grand\''),
(13, 'Mif MCHJ'),
(14, 'Texno Grand');

-- --------------------------------------------------------

--
-- Table structure for table `credit_foiz`
--

CREATE TABLE `credit_foiz` (
  `id` int(11) NOT NULL,
  `client_id` int(255) NOT NULL,
  `kunlik_foiz` float NOT NULL,
  `kun` int(255) NOT NULL,
  `status` int(2) NOT NULL,
  `filial_nomi` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `credit_foiz`
--

INSERT INTO `credit_foiz` (`id`, `client_id`, `kunlik_foiz`, `kun`, `status`, `filial_nomi`) VALUES
(1, 1, 2968.77, 0, 0, 'buvayda'),
(2, 2, 1282.19, 0, 0, 'buvayda'),
(3, 3, 1183.56, 0, 0, 'buvayda');

-- --------------------------------------------------------

--
-- Table structure for table `credit_tani`
--

CREATE TABLE `credit_tani` (
  `id` int(11) NOT NULL,
  `client_id` int(255) NOT NULL,
  `tolov_sana` varchar(255) NOT NULL,
  `oylik_tani` float NOT NULL,
  `sondirilgan_tani` float NOT NULL,
  `izox` text NOT NULL,
  `filial_nomi` varchar(255) NOT NULL,
  `status` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `credit_tani`
--

INSERT INTO `credit_tani` (`id`, `client_id`, `tolov_sana`, `oylik_tani`, `sondirilgan_tani`, `izox`, `filial_nomi`, `status`) VALUES
(1, 1, '2021-08-13', 250833, 0, '', 'buvayda', 0),
(2, 1, '2021-09-13', 250833, 0, '', 'buvayda', 0),
(3, 1, '2021-10-13', 250833, 0, '', 'buvayda', 0),
(4, 1, '2021-11-13', 250833, 0, '', 'buvayda', 0),
(5, 1, '2021-12-13', 250833, 0, '', 'buvayda', 0),
(6, 1, '2022-01-13', 250833, 0, '', 'buvayda', 0),
(7, 1, '2022-02-13', 250833, 0, '', 'buvayda', 0),
(8, 1, '2022-03-13', 250833, 0, '', 'buvayda', 0),
(9, 1, '2022-04-13', 250833, 0, '', 'buvayda', 0),
(10, 1, '2022-05-13', 250833, 0, '', 'buvayda', 0),
(11, 1, '2022-06-13', 250833, 0, '', 'buvayda', 0),
(12, 1, '2022-07-13', 250833, 0, '', 'buvayda', 0),
(13, 2, '2021-01-28', 100000, 0, '', 'buvayda', 0),
(14, 2, '2021-02-28', 100000, 0, '', 'buvayda', 0),
(15, 2, '2021-03-28', 100000, 0, '', 'buvayda', 0),
(16, 2, '2021-04-28', 100000, 0, '', 'buvayda', 0),
(17, 2, '2021-05-28', 100000, 0, '', 'buvayda', 0),
(18, 2, '2021-06-28', 100000, 0, '', 'buvayda', 0),
(19, 2, '2021-07-28', 100000, 0, '', 'buvayda', 0),
(20, 2, '2021-08-28', 100000, 0, '', 'buvayda', 0),
(21, 2, '2021-09-28', 100000, 0, '', 'buvayda', 0),
(22, 2, '2021-10-28', 100000, 0, '', 'buvayda', 0),
(23, 2, '2021-11-28', 100000, 0, '', 'buvayda', 0),
(24, 2, '2021-12-28', 100000, 0, '', 'buvayda', 0),
(25, 3, '2021-07-18', 100000, 0, '', 'buvayda', 0),
(26, 3, '2021-08-18', 100000, 0, '', 'buvayda', 0),
(27, 3, '2021-09-18', 100000, 0, '', 'buvayda', 0),
(28, 3, '2021-10-18', 100000, 0, '', 'buvayda', 0),
(29, 3, '2021-11-18', 100000, 0, '', 'buvayda', 0),
(30, 3, '2021-12-18', 100000, 0, '', 'buvayda', 0),
(31, 3, '2022-01-18', 100000, 0, '', 'buvayda', 0),
(32, 3, '2022-02-18', 100000, 0, '', 'buvayda', 0),
(33, 3, '2022-03-18', 100000, 0, '', 'buvayda', 0),
(34, 3, '2022-04-18', 100000, 0, '', 'buvayda', 0),
(35, 3, '2022-05-18', 100000, 0, '', 'buvayda', 0),
(36, 3, '2022-06-18', 100000, 0, '', 'buvayda', 0);

-- --------------------------------------------------------

--
-- Table structure for table `depozit`
--

CREATE TABLE `depozit` (
  `id` int(11) NOT NULL,
  `client_id` int(255) NOT NULL,
  `kassa_id` int(2) NOT NULL,
  `sana` date NOT NULL DEFAULT current_timestamp(),
  `kirim` varchar(255) NOT NULL,
  `chiqim` varchar(255) NOT NULL,
  `qoldiq` varchar(255) NOT NULL,
  `izox` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `depozit`
--

INSERT INTO `depozit` (`id`, `client_id`, `kassa_id`, `sana`, `kirim`, `chiqim`, `qoldiq`, `izox`) VALUES
(1, 1, 0, '2021-09-07', '200000', '0', '200000', 'sfdfdf'),
(2, 2, 0, '2021-09-07', '100000', '0', '100000', 'sfdfdf'),
(3, 2, 0, '2021-09-07', '50000', '0', '150000', 'sfdfdf'),
(77, 3, 0, '2021-09-07', '0', '0', '0', 'sfdfdf'),
(280, 1, 0, '2021-09-11', '0', '50000', '150000', 'Muddati otgan foizidan sondirilgan'),
(281, 1, 0, '2021-09-11', '0', '150000', '0', 'Muddati otgan tanidan sondirilgan'),
(282, 2, 0, '2021-09-11', '0', '30000', '120000', 'Muddati otgan foizidan sondirilgan'),
(283, 2, 0, '2021-09-11', '0', '100000', '20000', 'Muddati otgan tanidan sondirilgan');

-- --------------------------------------------------------

--
-- Table structure for table `filiallar`
--

CREATE TABLE `filiallar` (
  `id` int(11) NOT NULL,
  `nomi` varchar(255) NOT NULL,
  `kodi` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `filiallar`
--

INSERT INTO `filiallar` (`id`, `nomi`, `kodi`) VALUES
(1, 'Buvayda', 100),
(2, 'Baliqchi', 200);

-- --------------------------------------------------------

--
-- Table structure for table `kassa`
--

CREATE TABLE `kassa` (
  `id` int(11) NOT NULL,
  `sana` datetime NOT NULL DEFAULT current_timestamp(),
  `client_id` int(11) NOT NULL,
  `summa` varchar(255) NOT NULL,
  `tolov_turi` varchar(255) NOT NULL,
  `kir_chiq_status` int(2) NOT NULL,
  `tasdiq_status` int(2) NOT NULL,
  `filial_kodi` varchar(255) NOT NULL,
  `insert_user_id` int(11) NOT NULL,
  `update_user_id` int(11) NOT NULL,
  `izox` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `kassa`
--

INSERT INTO `kassa` (`id`, `sana`, `client_id`, `summa`, `tolov_turi`, `kir_chiq_status`, `tasdiq_status`, `filial_kodi`, `insert_user_id`, `update_user_id`, `izox`) VALUES
(1, '2021-09-15 00:00:00', 1, '200000', 'naqt', 1, 0, '100', 101, 101, 'adfdf'),
(2, '2021-09-15 00:00:00', 2, '150000', 'naqt', 1, 2, '100', 101, 0, 'adfdf'),
(3, '2021-09-15 00:00:00', 2, '300000', 'naqt', 1, 2, '100', 101, 0, 'adfdf'),
(4, '2021-09-15 00:00:00', 2, '150000', 'naqt', 1, 0, '200', 101, 101, 'adfdf'),
(20, '2021-09-15 00:00:00', 0, '50000', 'naqt', 1, 1, '100', 1, 1, '.');

-- --------------------------------------------------------

--
-- Table structure for table `muddati_o_foiz`
--

CREATE TABLE `muddati_o_foiz` (
  `id` int(11) NOT NULL,
  `client_id` int(255) NOT NULL,
  `sana` date NOT NULL DEFAULT current_timestamp(),
  `qarzdorlik` int(255) NOT NULL,
  `status` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `muddati_o_foiz`
--

INSERT INTO `muddati_o_foiz` (`id`, `client_id`, `sana`, `qarzdorlik`, `status`) VALUES
(1, 1, '2021-09-01', 50000, 1),
(2, 2, '2021-09-01', 30000, 1),
(3, 3, '2021-09-01', 25000, 0);

-- --------------------------------------------------------

--
-- Table structure for table `muddati_o_tani`
--

CREATE TABLE `muddati_o_tani` (
  `id` int(11) NOT NULL,
  `client_id` int(255) NOT NULL,
  `sana` date NOT NULL DEFAULT current_timestamp(),
  `qarzdorlik` int(255) NOT NULL,
  `status` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `muddati_o_tani`
--

INSERT INTO `muddati_o_tani` (`id`, `client_id`, `sana`, `qarzdorlik`, `status`) VALUES
(1, 1, '2021-09-01', 100000, 1),
(2, 1, '2021-09-03', 100000, 1),
(3, 2, '2021-08-28', 100000, 1),
(4, 3, '2021-08-28', 100000, 1),
(21, 3, '2021-08-28', 100000, 0),
(23, 1, '2021-09-11', 50000, 0);

-- --------------------------------------------------------

--
-- Table structure for table `prasrochka`
--

CREATE TABLE `prasrochka` (
  `id` int(11) NOT NULL,
  `client_id` int(11) NOT NULL,
  `kun` int(11) NOT NULL,
  `status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `prasrochka`
--

INSERT INTO `prasrochka` (`id`, `client_id`, `kun`, `status`) VALUES
(1, 1, 0, '0'),
(2, 2, 13, '0.5'),
(3, 3, 9, '0.3');

-- --------------------------------------------------------

--
-- Table structure for table `shartnoma_info`
--

CREATE TABLE `shartnoma_info` (
  `id` int(11) NOT NULL,
  `client_id` int(11) NOT NULL,
  `summa` float NOT NULL,
  `muddat` varchar(255) NOT NULL,
  `oldindan_tolov` int(255) NOT NULL,
  `filial_nomi` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `shartnoma_info`
--

INSERT INTO `shartnoma_info` (`id`, `client_id`, `summa`, `muddat`, `oldindan_tolov`, `filial_nomi`) VALUES
(1, 1, 3010000, '12', 0, 'buvayda'),
(2, 2, 1300000, '12', 100000, 'buvayda'),
(3, 3, 1200000, '12', 0, 'buvayda');

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
-- Indexes for table `client`
--
ALTER TABLE `client`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contragent`
--
ALTER TABLE `contragent`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `credit_foiz`
--
ALTER TABLE `credit_foiz`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `credit_tani`
--
ALTER TABLE `credit_tani`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `depozit`
--
ALTER TABLE `depozit`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `filiallar`
--
ALTER TABLE `filiallar`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kassa`
--
ALTER TABLE `kassa`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `muddati_o_foiz`
--
ALTER TABLE `muddati_o_foiz`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `muddati_o_tani`
--
ALTER TABLE `muddati_o_tani`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `prasrochka`
--
ALTER TABLE `prasrochka`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `shartnoma_info`
--
ALTER TABLE `shartnoma_info`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bosh_kassa`
--
ALTER TABLE `bosh_kassa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `client`
--
ALTER TABLE `client`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `contragent`
--
ALTER TABLE `contragent`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `credit_foiz`
--
ALTER TABLE `credit_foiz`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `credit_tani`
--
ALTER TABLE `credit_tani`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `depozit`
--
ALTER TABLE `depozit`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=284;

--
-- AUTO_INCREMENT for table `filiallar`
--
ALTER TABLE `filiallar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `kassa`
--
ALTER TABLE `kassa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `muddati_o_foiz`
--
ALTER TABLE `muddati_o_foiz`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `muddati_o_tani`
--
ALTER TABLE `muddati_o_tani`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `prasrochka`
--
ALTER TABLE `prasrochka`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `shartnoma_info`
--
ALTER TABLE `shartnoma_info`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
