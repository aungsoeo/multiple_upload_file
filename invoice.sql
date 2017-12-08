-- phpMyAdmin SQL Dump
-- version 4.4.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Dec 08, 2017 at 11:21 AM
-- Server version: 5.6.26
-- PHP Version: 5.6.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `invoice`
--

-- --------------------------------------------------------

--
-- Table structure for table `invoicedetails`
--

CREATE TABLE IF NOT EXISTS `invoicedetails` (
  `id` int(11) NOT NULL,
  `discount` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `grandtotal` text COLLATE utf8_unicode_ci NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `invoicedetails`
--

INSERT INTO `invoicedetails` (`id`, `discount`, `grandtotal`, `updated_at`) VALUES
(1, '2', '98', '0000-00-00 00:00:00'),
(2, '2', '1078', '0000-00-00 00:00:00'),
(3, '3', '1722.72', '2017-11-10 08:40:08'),
(4, '3', '388', '0000-00-00 00:00:00'),
(5, '2', '2940', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `invoice_create`
--

CREATE TABLE IF NOT EXISTS `invoice_create` (
  `id` int(11) NOT NULL,
  `date` text COLLATE utf8_unicode_ci NOT NULL,
  `item_name` text COLLATE utf8_unicode_ci NOT NULL,
  `qty` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `price` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `invoiceid` int(11) NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `invoice_create`
--

INSERT INTO `invoice_create` (`id`, `date`, `item_name`, `qty`, `price`, `invoiceid`, `updated_at`) VALUES
(5, '11/03/2017', 'ww', '10', '22', 0, '0000-00-00 00:00:00'),
(6, '12/05/2017', 'ee', '20', '33', 0, '0000-00-00 00:00:00'),
(7, '11/03/2017', 'qq', '1', '100', 1, '0000-00-00 00:00:00'),
(8, '11/10/2017', 'item1', '2', '100', 2, '0000-00-00 00:00:00'),
(9, '12/20/2017', 'item2', '3', '300', 2, '0000-00-00 00:00:00'),
(10, '11/09/2017', 'apple juice', '1', '100', 3, '2017-11-10 08:40:08'),
(11, '11/09/2017', 'orange juice', '2', '200', 3, '2017-11-10 08:40:08'),
(13, '11/09/2017', 'apple juice', '2', '200', 4, '0000-00-00 00:00:00'),
(14, '11/23/2017', 'white wine', '3', '1000', 5, '0000-00-00 00:00:00'),
(17, '11/09/2017', 'strawberry juice', '3', '300', 3, '2017-11-10 08:40:09'),
(19, '11/09/2017', 'lime juice', '4', '400', 3, '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `photos`
--

CREATE TABLE IF NOT EXISTS `photos` (
  `id` int(11) NOT NULL,
  `name` text COLLATE utf8_unicode_ci NOT NULL,
  `price` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `image` text COLLATE utf8_unicode_ci NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=78 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `photos`
--

INSERT INTO `photos` (`id`, `name`, `price`, `image`, `updated_at`) VALUES
(18, 'disney cartoon', '3000', 'download.jpg,maxresdefault.jpg,ce5f53437e291c48705428721406985c--cartoons-characters-looney-tunes-characters.jpg,cartoon-clipart-disney-5.jpg', '2017-12-08 02:31:17'),
(19, 'hninn thazin myint', '200000', 'download.jpg,maxresdefault.jpg,ce5f53437e291c48705428721406985c--cartoons-characters-looney-tunes-characters.jpg,cartoon-clipart-disney-5.jpg,175a2251d711c268e00f1cc42500a469.jpg,987a09b6279ecb2c8d91e80cdabfecf9.jpg', '2017-12-08 03:00:01'),
(20, 'ggg', '20', 'download.jpg,maxresdefault.jpg,ce5f53437e291c48705428721406985c--cartoons-characters-looney-tunes-characters.jpg,cartoon-clipart-disney-5.jpg', '0000-00-00 00:00:00'),
(21, 'sss', '200', 'download.jpg,maxresdefault.jpg', '0000-00-00 00:00:00'),
(22, 'aaa', '300', 'download.jpg,maxresdefault.jpg,ce5f53437e291c48705428721406985c--cartoons-characters-looney-tunes-characters.jpg', '0000-00-00 00:00:00'),
(23, 'aaa', '300', 'download.jpg,maxresdefault.jpg,ce5f53437e291c48705428721406985c--cartoons-characters-looney-tunes-characters.jpg', '0000-00-00 00:00:00'),
(24, 'hninn hninn', '30000', 'download.jpg,maxresdefault.jpg,ce5f53437e291c48705428721406985c--cartoons-characters-looney-tunes-characters.jpg', '0000-00-00 00:00:00'),
(25, 'hninn hninn', '30000', 'download.jpg,maxresdefault.jpg,ce5f53437e291c48705428721406985c--cartoons-characters-looney-tunes-characters.jpg', '0000-00-00 00:00:00'),
(26, 'ttt', '100000', 'download.jpg,maxresdefault.jpg,ce5f53437e291c48705428721406985c--cartoons-characters-looney-tunes-characters.jpg,cartoon-clipart-disney-5.jpg', '0000-00-00 00:00:00'),
(27, 'rrrr', '2000000', 'download.jpg,maxresdefault.jpg,ce5f53437e291c48705428721406985c--cartoons-characters-looney-tunes-characters.jpg,cartoon-clipart-disney-5.jpg', '0000-00-00 00:00:00'),
(28, 'rrrr', '2000000', 'download.jpg,maxresdefault.jpg,ce5f53437e291c48705428721406985c--cartoons-characters-looney-tunes-characters.jpg,cartoon-clipart-disney-5.jpg', '0000-00-00 00:00:00'),
(29, 'shweyin', '20000', 'download.jpg', '0000-00-00 00:00:00'),
(30, 'RL', '1000000', '987a09b6279ecb2c8d91e80cdabfecf9.jpg', '0000-00-00 00:00:00'),
(31, 'ttttt', '200', 'download.jpg,maxresdefault.jpg', '0000-00-00 00:00:00'),
(32, 'ttttt', '200', 'download.jpg,maxresdefault.jpg', '0000-00-00 00:00:00'),
(33, 'eeee', '200', 'download.jpg,maxresdefault.jpg', '0000-00-00 00:00:00'),
(34, 'eeee', '200', 'download.jpg,maxresdefault.jpg', '0000-00-00 00:00:00'),
(35, 'aaa', '7000', 'download.jpg,maxresdefault.jpg', '0000-00-00 00:00:00'),
(36, 'aaa', '7000', 'download.jpg,maxresdefault.jpg', '0000-00-00 00:00:00'),
(37, 'www', '2000', 'download.jpg,maxresdefault.jpg', '0000-00-00 00:00:00'),
(38, 'www', '2000', 'download.jpg,maxresdefault.jpg', '0000-00-00 00:00:00'),
(39, 'www', '2000', 'download.jpg,maxresdefault.jpg', '0000-00-00 00:00:00'),
(40, 'www', '2000', 'download.jpg,maxresdefault.jpg', '0000-00-00 00:00:00'),
(41, 'hhhhhh', '2000', 'download.jpg,maxresdefault.jpg', '0000-00-00 00:00:00'),
(42, 'hhhhhh', '2000', 'download.jpg,maxresdefault.jpg', '0000-00-00 00:00:00'),
(43, 'qqqqqq', '20000', 'download.jpg,maxresdefault.jpg', '0000-00-00 00:00:00'),
(44, 'qqqqqq', '20000', 'download.jpg,maxresdefault.jpg', '0000-00-00 00:00:00'),
(45, 'qqqqqq', '20000', 'download.jpg,maxresdefault.jpg', '0000-00-00 00:00:00'),
(46, 'qqqqqq', '20000', 'download.jpg,maxresdefault.jpg', '0000-00-00 00:00:00'),
(47, 'qqqqqq', '20000', 'download.jpg,maxresdefault.jpg', '0000-00-00 00:00:00'),
(48, 'qqqqqq', '20000', 'download.jpg,maxresdefault.jpg', '0000-00-00 00:00:00'),
(49, 'qqqqqq', '20000', 'download.jpg,maxresdefault.jpg', '0000-00-00 00:00:00'),
(50, 'qqqqqq', '20000', 'download.jpg,maxresdefault.jpg', '0000-00-00 00:00:00'),
(51, 'hein htet aung', '3000000', 'maxresdefault.jpg', '0000-00-00 00:00:00'),
(52, 'hein htet aung', '2000', 'download.jpg,maxresdefault.jpg', '0000-00-00 00:00:00'),
(53, 'hein htet aung', '2000', 'download.jpg,maxresdefault.jpg', '0000-00-00 00:00:00'),
(54, 'hein htet aung', '2000', 'download.jpg,maxresdefault.jpg', '0000-00-00 00:00:00'),
(55, 'hein htet aung', '2000', 'download.jpg,maxresdefault.jpg', '0000-00-00 00:00:00'),
(56, 'hein htet aung', '2000', 'download.jpg,maxresdefault.jpg', '0000-00-00 00:00:00'),
(57, 'hein', '1000', 'download.jpg,maxresdefault.jpg', '0000-00-00 00:00:00'),
(58, 'hein', '1000', 'download.jpg,maxresdefault.jpg', '0000-00-00 00:00:00'),
(59, 'hein', '1000', 'download.jpg,maxresdefault.jpg', '0000-00-00 00:00:00'),
(60, 'aung soe oo', '20000', 'download.jpg,maxresdefault.jpg', '0000-00-00 00:00:00'),
(61, 'R Gyi', '300000', 'download.jpg', '0000-00-00 00:00:00'),
(62, 'Aung Soe', '300000', 'download.jpg', '0000-00-00 00:00:00'),
(63, 'rrr', '300000', 'download.jpg', '0000-00-00 00:00:00'),
(64, 'rrr', '300000', 'download.jpg', '0000-00-00 00:00:00'),
(65, 'aung soe oo', '22222', 'download.jpg', '0000-00-00 00:00:00'),
(66, 'aung soe oo', '22222', 'download.jpg', '0000-00-00 00:00:00'),
(67, 'qqq', '333', 'download.jpg', '0000-00-00 00:00:00'),
(68, 'tttt', '33333', 'download.jpg', '0000-00-00 00:00:00'),
(69, 'hninn lay', '300000', 'download.jpg,maxresdefault.jpg,ce5f53437e291c48705428721406985c--cartoons-characters-looney-tunes-characters.jpg,cartoon-clipart-disney-5.jpg', '0000-00-00 00:00:00'),
(70, 'hninn lay', '300000', 'download.jpg,maxresdefault.jpg', '0000-00-00 00:00:00'),
(71, 'hninn lay', '30000', 'download.jpg', '0000-00-00 00:00:00'),
(72, 'thu thu', '300000', 'download.jpg', '0000-00-00 00:00:00'),
(73, 'hninn lay', '4000000', 'download.jpg', '0000-00-00 00:00:00'),
(74, 'hninn lay', '4000000', 'download.jpg', '0000-00-00 00:00:00'),
(75, 'sithu', '400000', 'download.jpg,maxresdefault.jpg,ce5f53437e291c48705428721406985c--cartoons-characters-looney-tunes-characters.jpg', '0000-00-00 00:00:00'),
(76, 'kyaw swar', '30000', 'download.jpg,maxresdefault.jpg,ce5f53437e291c48705428721406985c--cartoons-characters-looney-tunes-characters.jpg', '0000-00-00 00:00:00'),
(77, 'hninn lay', '400000', 'download.jpg,maxresdefault.jpg,ce5f53437e291c48705428721406985c--cartoons-characters-looney-tunes-characters.jpg', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE IF NOT EXISTS `products` (
  `id` int(11) NOT NULL,
  `name` text COLLATE utf8_unicode_ci NOT NULL,
  `parent_id` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `parent_id`) VALUES
(1, 'Waterfall', 0),
(2, 'Mountain', 0),
(3, 'BE', 1),
(4, 'BE Fall', 3),
(5, 'Pyin Oo Lwin', 4),
(6, 'Paik Chinn Myaung', 1),
(7, 'Lashio Waterall', 3),
(8, 'Pagoda', 0),
(9, 'Monywa', 8),
(10, 'Bawdi 1000 pagoda', 9),
(11, 'Shwe Sii Gon pagoda', 9),
(12, 'Heaven Pagoda', 11),
(13, 'Sagaing', 8),
(14, 'Yangon', 8),
(15, 'Shwe Gu Ni', 9),
(16, 'Hlyang Taw Mu', 10),
(17, 'Htan Zalote Waterfall', 9),
(18, 'Restaurant', 0),
(19, 'aa', 5),
(20, 'bb', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `invoicedetails`
--
ALTER TABLE `invoicedetails`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `invoice_create`
--
ALTER TABLE `invoice_create`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `photos`
--
ALTER TABLE `photos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `invoicedetails`
--
ALTER TABLE `invoicedetails`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `invoice_create`
--
ALTER TABLE `invoice_create`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT for table `photos`
--
ALTER TABLE `photos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=78;
--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=21;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
