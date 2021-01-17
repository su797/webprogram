-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: 
-- サーバのバージョン： 8.0.12
-- PHP Version: 7.3.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `shop`
--

-- --------------------------------------------------------

--
-- テーブルの構造 `dat_member`
--

CREATE TABLE `dat_member` (
  `code` int(11) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `password` varchar(32) NOT NULL,
  `name` varchar(15) NOT NULL,
  `email` varchar(50) NOT NULL,
  `postal1` varchar(3) NOT NULL,
  `postal2` varchar(4) NOT NULL,
  `address` varchar(50) NOT NULL,
  `tel` varchar(13) NOT NULL,
  `danjo` int(11) NOT NULL,
  `born` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- テーブルのデータのダンプ `dat_member`
--

INSERT INTO `dat_member` (`code`, `date`, `password`, `name`, `email`, `postal1`, `postal2`, `address`, `tel`, `danjo`, `born`) VALUES
(1, '2020-12-10 15:50:14', '1f4d02518d7b7c0c4a3bbde51570628f', 'ソハン', 'su7976@outlook.com', '345', '0836', '和戸5-3-2', '08067611858', 1, 1990),
(2, '2020-12-10 16:39:12', '1f4d02518d7b7c0c4a3bbde51570628f', '蘇函', 'visitor@suhan.site', '345', '0836', '宮代町', '08012345678', 1, 1980);

-- --------------------------------------------------------

--
-- テーブルの構造 `dat_sales`
--

CREATE TABLE `dat_sales` (
  `code` int(11) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `code_member` int(11) NOT NULL,
  `name` varchar(15) NOT NULL,
  `email` varchar(50) NOT NULL,
  `postal1` varchar(3) NOT NULL,
  `postal2` varchar(4) NOT NULL,
  `address` varchar(50) NOT NULL,
  `tel` varchar(13) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- テーブルのデータのダンプ `dat_sales`
--

INSERT INTO `dat_sales` (`code`, `date`, `code_member`, `name`, `email`, `postal1`, `postal2`, `address`, `tel`) VALUES
(2, '2020-11-26 05:39:38', 0, 'ソハン', 'su79767960@outlook.com', '345', '0836', '和戸5-3-2', '08067611858'),
(3, '2020-11-26 05:40:33', 0, 'ソハン', 'su79767960@outlook.com', '345', '0836', '和戸5-3-2', '08067611858'),
(4, '2020-11-26 05:40:56', 0, 'ソハン', 'su79767960@outlook.com', '345', '0836', '和戸5-3-2', '08067611858'),
(5, '2020-11-26 05:41:31', 0, 'ソハン', 'su79767960@outlook.com', '345', '0836', '和戸5-3-2', '08067611858'),
(6, '2020-12-10 15:50:14', 1, 'ソハン', 'su79767960@outlook.com', '345', '0836', '和戸5-3-2', '08067611858'),
(7, '2020-12-10 15:52:41', 1, 'ソハン', 'su79767960@outlook.com', '345', '0836', '和戸5-3-2', '08067611858'),
(8, '2020-12-10 15:53:32', 1, 'ソハン', 'su79767960@outlook.com', '345', '0836', '和戸5-3-2', '08067611858'),
(9, '2020-12-10 15:54:36', 1, 'ソハン', 'su79767960@outlook.com', '345', '0836', '和戸5-3-2', '08067611858'),
(10, '2020-12-10 15:55:06', 1, 'ソハン', 'su79767960@outlook.com', '345', '0836', '和戸5-3-2', '08067611858'),
(11, '2020-12-10 16:39:12', 2, '蘇函', 'visitor@suhan.site', '345', '0836', '宮代町', '08012345678'),
(12, '2020-12-10 16:40:20', 2, '蘇函', 'visitor@suhan.site', '345', '0836', '宮代町', '08012345678'),
(15, '2021-01-06 08:12:28', 2, '蘇函', 'visitor@suhan.site', '345', '0836', '宮代町', '08012345678'),
(16, '2021-01-06 08:14:10', 2, '蘇函', 'visitor@suhan.site', '345', '0836', '宮代町', '08012345678'),
(17, '2021-01-06 08:14:49', 2, '蘇函', 'visitor@suhan.site', '345', '0836', '宮代町', '08012345678'),
(18, '2021-01-06 08:17:24', 2, '蘇函', 'visitor@suhan.site', '345', '0836', '宮代町', '08012345678');

-- --------------------------------------------------------

--
-- テーブルの構造 `dat_sales_product`
--

CREATE TABLE `dat_sales_product` (
  `code` int(11) NOT NULL,
  `code_sales` int(11) NOT NULL,
  `code_product` int(11) DEFAULT NULL,
  `price` int(11) NOT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- テーブルのデータのダンプ `dat_sales_product`
--

INSERT INTO `dat_sales_product` (`code`, `code_sales`, `code_product`, `price`, `quantity`) VALUES
(1, 5, 4, 150, 1),
(2, 10, 2, 98, 1),
(3, 10, 5, 280, 1),
(4, 11, 2, 98, 1),
(5, 12, 2, 98, 1),
(6, 14, 5, 280, 1),
(7, 14, 4, 150, 1),
(8, 15, 6, 100, 10),
(9, 16, 6, 100, 10),
(10, 17, 6, 100, 10),
(11, 18, 6, 100, 10);

-- --------------------------------------------------------

--
-- テーブルの構造 `mst_product`
--

CREATE TABLE `mst_product` (
  `code` int(11) NOT NULL,
  `name` varchar(30) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `price` int(11) NOT NULL,
  `gazou` varchar(30) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `num` int(11) UNSIGNED NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- テーブルのデータのダンプ `mst_product`
--

INSERT INTO `mst_product` (`code`, `name`, `price`, `gazou`, `num`) VALUES
(2, '丸かじりトマト', 98, 'tomato_yama.jpg', 0),
(4, '甘~いにんじん', 150, 'ninjin.jpg', 0),
(5, '焼いて最高のナス', 280, 'nasu.jpg', 0),
(6, '1ere', 100, 'aspara.jpg', 1);

-- --------------------------------------------------------

--
-- テーブルの構造 `mst_staff`
--

CREATE TABLE `mst_staff` (
  `code` int(11) NOT NULL,
  `name` varchar(15) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(32) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- テーブルのデータのダンプ `mst_staff`
--

INSERT INTO `mst_staff` (`code`, `name`, `password`) VALUES
(16, 'musatoru', '4ac34959ca689cea45f2102ba0dd5383'),
(3, 'ろくまる社長', '81dc9bdb52d04dc20036dbd8313ed055'),
(7, 'あゆみ', '202cb962ac59075b964b07152d234b70'),
(8, 'いまだ', '202cb962ac59075b964b07152d234b70'),
(9, 'かずこ', '202cb962ac59075b964b07152d234b70'),
(10, 'SuHan', '25f9e794323b453885f5181f1b624d0b');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `dat_member`
--
ALTER TABLE `dat_member`
  ADD PRIMARY KEY (`code`);

--
-- Indexes for table `dat_sales`
--
ALTER TABLE `dat_sales`
  ADD PRIMARY KEY (`code`);

--
-- Indexes for table `dat_sales_product`
--
ALTER TABLE `dat_sales_product`
  ADD PRIMARY KEY (`code`);

--
-- Indexes for table `mst_product`
--
ALTER TABLE `mst_product`
  ADD PRIMARY KEY (`code`);

--
-- Indexes for table `mst_staff`
--
ALTER TABLE `mst_staff`
  ADD PRIMARY KEY (`code`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `dat_member`
--
ALTER TABLE `dat_member`
  MODIFY `code` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `dat_sales`
--
ALTER TABLE `dat_sales`
  MODIFY `code` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `dat_sales_product`
--
ALTER TABLE `dat_sales_product`
  MODIFY `code` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `mst_product`
--
ALTER TABLE `mst_product`
  MODIFY `code` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `mst_staff`
--
ALTER TABLE `mst_staff`
  MODIFY `code` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
