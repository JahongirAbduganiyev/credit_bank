-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1
-- Время создания: Сен 10 2021 г., 14:56
-- Версия сервера: 10.4.14-MariaDB
-- Версия PHP: 7.4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `credit`
--

-- --------------------------------------------------------

--
-- Структура таблицы `client`
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
-- Дамп данных таблицы `client`
--

INSERT INTO `client` (`id`, `sana`, `fish`, `p_nomer`, `manzil`, `moljal`, `tel_nomer`, `client_kodi`, `credit_kodi`, `filial_nomi`, `status`) VALUES
(1, '2021-07-13', 'Алибаева Хуршида Шералиевна', 'AB 7251190', 'Уртачирчик тумани Янги-хаёт МФЙ  Бирлик кучаси 91уй, Уртачирчик тумани Янги-хаёт МФЙ  Бирлик кучаси 91уй', 'Чигирик Янги богча  ёнида ', '993153755', '7288', '01', 'buvayda', 0),
(2, '2020-12-28', 'Абдухоликов Юлчивой ХХХ', 'AB 8299161', 'Жалаер МФЙ, Жийдали кишлоги', 'Гузарбоши кучаси 93-уй', '937311516', '72888', '01', 'buvayda', 0),
(3, '2021-06-18', 'Jalilov Alijon Qobiljon O\'g\'li', 'AB 1194596', 'Arab MFY, Buvayda Tumani O\'rta qishlog\'i Ajdodlar ko\'chasi 14-uy', 'Leksmi Do\'koni ro\'parasida', '996216169', '1', '01', 'buvayda', 0);

-- --------------------------------------------------------

--
-- Структура таблицы `credit_foiz`
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
-- Дамп данных таблицы `credit_foiz`
--

INSERT INTO `credit_foiz` (`id`, `client_id`, `kunlik_foiz`, `kun`, `status`, `filial_nomi`) VALUES
(1, 1, 2968.77, 0, 0, 'buvayda'),
(2, 2, 1282.19, 0, 0, 'buvayda'),
(3, 3, 1183.56, 0, 0, 'buvayda');

-- --------------------------------------------------------

--
-- Структура таблицы `credit_tani`
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
-- Дамп данных таблицы `credit_tani`
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
-- Структура таблицы `depozit`
--

CREATE TABLE `depozit` (
  `id` int(11) NOT NULL,
  `client_id` int(255) NOT NULL,
  `kassa_id` int(2) NOT NULL,
  `sana` date NOT NULL DEFAULT current_timestamp(),
  `kirim` varchar(255) NOT NULL,
  `chiqim` varchar(255) NOT NULL,
  `qoldiq` varchar(255) NOT NULL,
  `izox` text NOT NULL,
  `filial_nomi` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `depozit`
--

INSERT INTO `depozit` (`id`, `client_id`, `kassa_id`, `sana`, `kirim`, `chiqim`, `qoldiq`, `izox`, `filial_nomi`) VALUES
(1, 1, 0, '2021-09-07', '200000', '0', '200000', 'sfdfdf', 'buvayda'),
(2, 2, 0, '2021-09-07', '100000', '0', '100000', 'sfdfdf', 'buvayda'),
(3, 2, 0, '2021-09-07', '50000', '0', '150000', 'sfdfdf', 'buvayda'),
(77, 3, 0, '2021-09-07', '0', '0', '0', 'sfdfdf', 'buvayda'),
(272, 1, 0, '2021-09-10', '0', '50000', '150000', 'Muddati otgan foizidan sondirilgan', 'buvayda'),
(273, 1, 0, '2021-09-10', '0', '150000', '0', 'Muddati otgan tanidan sondirilgan', 'buvayda'),
(274, 2, 0, '2021-09-10', '0', '30000', '120000', 'Muddati otgan foizidan sondirilgan', 'buvayda'),
(275, 2, 0, '2021-09-10', '0', '100000', '20000', 'Muddati otgan tanidan sondirilgan', 'buvayda');

-- --------------------------------------------------------

--
-- Структура таблицы `kassa`
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
-- Дамп данных таблицы `kassa`
--

INSERT INTO `kassa` (`id`, `sana`, `client_id`, `summa`, `tolov_turi`, `kir_chiq_status`, `tasdiq_status`, `filial_kodi`, `insert_user_id`, `update_user_id`, `izox`) VALUES
(1, '2021-09-10 17:31:38', 1, '254000', 'naqd', 0, 0, '100', 1, 1, 'Oktabr'),
(2, '2021-09-10 17:31:41', 1, '65000', 'naqd', 0, 0, '100', 1, 1, 'Avgust');

-- --------------------------------------------------------

--
-- Структура таблицы `muddati_o_foiz`
--

CREATE TABLE `muddati_o_foiz` (
  `id` int(11) NOT NULL,
  `client_id` int(255) NOT NULL,
  `sana` date NOT NULL DEFAULT current_timestamp(),
  `qarzdorlik` int(255) NOT NULL,
  `status` int(2) NOT NULL,
  `filial_nomi` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `muddati_o_foiz`
--

INSERT INTO `muddati_o_foiz` (`id`, `client_id`, `sana`, `qarzdorlik`, `status`, `filial_nomi`) VALUES
(1, 1, '2021-09-01', 50000, 1, 'buvayda'),
(2, 2, '2021-09-01', 30000, 1, 'buvayda'),
(3, 3, '2021-09-01', 25000, 0, 'buvayda');

-- --------------------------------------------------------

--
-- Структура таблицы `muddati_o_tani`
--

CREATE TABLE `muddati_o_tani` (
  `id` int(11) NOT NULL,
  `client_id` int(255) NOT NULL,
  `sana` date NOT NULL DEFAULT current_timestamp(),
  `qarzdorlik` int(255) NOT NULL,
  `status` int(2) NOT NULL,
  `filial_nomi` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `muddati_o_tani`
--

INSERT INTO `muddati_o_tani` (`id`, `client_id`, `sana`, `qarzdorlik`, `status`, `filial_nomi`) VALUES
(1, 1, '2021-09-01', 100000, 1, 'buvayda'),
(2, 1, '2021-09-03', 100000, 1, 'buvayda'),
(3, 2, '2021-08-28', 100000, 1, 'buvayda'),
(4, 3, '2021-08-28', 100000, 1, 'buvayda'),
(5, 3, '2021-09-01', 100000, 0, 'buvayda'),
(20, 1, '2021-09-10', 50000, 0, 'buvayda');

-- --------------------------------------------------------

--
-- Структура таблицы `prasrochka`
--

CREATE TABLE `prasrochka` (
  `id` int(11) NOT NULL,
  `client_id` int(11) NOT NULL,
  `kun` int(11) NOT NULL,
  `status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `prasrochka`
--

INSERT INTO `prasrochka` (`id`, `client_id`, `kun`, `status`) VALUES
(1, 1, 0, '0'),
(2, 2, 13, '0.5'),
(3, 3, 9, '0.3');

-- --------------------------------------------------------

--
-- Структура таблицы `shartnoma_info`
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
-- Дамп данных таблицы `shartnoma_info`
--

INSERT INTO `shartnoma_info` (`id`, `client_id`, `summa`, `muddat`, `oldindan_tolov`, `filial_nomi`) VALUES
(1, 1, 3010000, '12', 0, 'buvayda'),
(2, 2, 1300000, '12', 100000, 'buvayda'),
(3, 3, 1200000, '12', 0, 'buvayda');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `client`
--
ALTER TABLE `client`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `credit_foiz`
--
ALTER TABLE `credit_foiz`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `credit_tani`
--
ALTER TABLE `credit_tani`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `depozit`
--
ALTER TABLE `depozit`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `kassa`
--
ALTER TABLE `kassa`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `muddati_o_foiz`
--
ALTER TABLE `muddati_o_foiz`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `muddati_o_tani`
--
ALTER TABLE `muddati_o_tani`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `prasrochka`
--
ALTER TABLE `prasrochka`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `shartnoma_info`
--
ALTER TABLE `shartnoma_info`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `client`
--
ALTER TABLE `client`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT для таблицы `credit_foiz`
--
ALTER TABLE `credit_foiz`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT для таблицы `credit_tani`
--
ALTER TABLE `credit_tani`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT для таблицы `depozit`
--
ALTER TABLE `depozit`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=276;

--
-- AUTO_INCREMENT для таблицы `kassa`
--
ALTER TABLE `kassa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT для таблицы `muddati_o_foiz`
--
ALTER TABLE `muddati_o_foiz`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT для таблицы `muddati_o_tani`
--
ALTER TABLE `muddati_o_tani`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT для таблицы `prasrochka`
--
ALTER TABLE `prasrochka`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT для таблицы `shartnoma_info`
--
ALTER TABLE `shartnoma_info`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
