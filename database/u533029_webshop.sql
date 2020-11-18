-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Nov 18, 2020 at 10:24 AM
-- Server version: 5.5.14
-- PHP Version: 7.2.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `u533029_webshop`
--

-- --------------------------------------------------------

--
-- Table structure for table `costumer`
--

CREATE TABLE `costumer` (
  `id` int(11) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `middle_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `street` varchar(255) NOT NULL,
  `house_number` int(11) NOT NULL,
  `email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `costumer`
--

INSERT INTO `costumer` (`id`, `first_name`, `middle_name`, `last_name`, `street`, `house_number`, `email`) VALUES
(13, 'casey', 'htrgf', 'fdsaf', 'fdsaf', 0, 'dfasd'),
(14, 'casey', 'htrgf', 'fdsaf', 'fdsaf', 0, 'dfasd'),
(15, 'casey', 'htrgf', 'fdsaf', 'fdsaf', 0, 'dfasd'),
(16, 'casey', 'htrgf', 'fdsaf', 'fdsaf', 0, 'dfasd'),
(17, 'hgdhfghgf', 'hfghfghfg', 'hgfhfgh', 'fghfgh', 0, 'fghfgh'),
(18, 'casey', 'htrgf', 'van schaarenburg', 'fdsaf', 0, 'GODVERDOMME@GMAIL'),
(19, 'casey', 'van', 'schaarenburg', 'fuutstraat', 12345, 'casey2002@hotmail.nl'),
(20, 'casey', 'van', 'schaarenburg', 'fuutstraat', 13, 'casey2002@hotmail.nl'),
(130, 'casey', 'htrgf', 'fdsaf', 'fdsaf', 0, 'dfasd'),
(140, 'casey', 'htrgf', 'fdsaf', 'fdsaf', 0, 'dfasd'),
(150, 'casey', 'htrgf', 'fdsaf', 'fdsaf', 0, 'dfasd'),
(160, 'casey', 'htrgf', 'fdsaf', 'fdsaf', 0, 'dfasd'),
(170, 'hgdhfghgf', 'hfghfghfg', 'hgfhfgh', 'fghfgh', 0, 'fghfgh'),
(180, 'casey', 'htrgf', 'van schaarenburg', 'fdsaf', 0, 'GODVERDOMME@GMAIL'),
(190, 'casey', 'van', 'schaarenburg', 'fuutstraat', 12345, 'casey2002@hotmail.nl'),
(200, 'casey', 'van', 'schaarenburg', 'fuutstraat', 13, 'casey2002@hotmail.nl');

-- --------------------------------------------------------

--
-- Table structure for table `order`
--

CREATE TABLE `order` (
  `id` int(11) NOT NULL,
  `order_date` date NOT NULL,
  `costumer_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `order`
--

INSERT INTO `order` (`id`, `order_date`, `costumer_id`) VALUES
(1, '2020-06-22', 14),
(2, '2020-06-22', 15),
(3, '2020-06-22', 16),
(4, '2020-06-22', 17),
(5, '2020-06-22', 18),
(6, '2020-07-01', 19),
(7, '2020-07-02', 20);

-- --------------------------------------------------------

--
-- Table structure for table `order_details`
--

CREATE TABLE `order_details` (
  `id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `aantal` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `order_details`
--

INSERT INTO `order_details` (`id`, `order_id`, `product_id`, `aantal`) VALUES
(2, 3, 1, 10000),
(3, 4, 1, 10000),
(4, 4, 2, 1),
(5, 5, 2, 1),
(6, 6, 1, 1),
(7, 7, 2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `producten`
--

CREATE TABLE `producten` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` varchar(500) NOT NULL,
  `category_id` int(255) NOT NULL,
  `price` int(11) NOT NULL,
  `color` varchar(255) NOT NULL,
  `weight` int(11) NOT NULL,
  `active` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `producten`
--

INSERT INTO `producten` (`id`, `name`, `description`, `category_id`, `price`, `color`, `weight`, `active`) VALUES
(1, 'monopoly geld strooier', 'hiermee kan je geld strooien. ', 4, 47, 'multicolor', 60, 1),
(2, 'bitcoin', 'bitcoin is een crypto currency. bij ons de goedkoopste!', 2, 5000, 'goud', 30, 1),
(3, 'broodrooster', 'broodrooster zijn erg handig, vooral wanneer ze voor een erg goede deal worden aangeboden, en als je te oud brood heb wat taai is geworden natuurlijk. ', 2, 60, 'hotpink', 30, 1),
(4, 'grill', 'deze is bedoeld voor heerlijke panini\'s, of tosti\'s. \'t is net wat je maar wil.', 2, 40, 'hotpink', 30, 1),
(5, 'man', 'tja, dit is gewoon een man met een prachtig hotpink shirt.', 2, 1, 'hotpink', 60, 1),
(6, 'wc papier', 'hotpink wc papier? wie wilt dat nou niet?!', 2, 500, 'hotpink', 60, 1),
(7, 'roos', 'tja, dit is gewoon een prachtige roos. ', 2, 5, 'hotpink', 60, 1),
(8, 'tas', 'mooie dure tas. ', 2, 6000, 'hotpink', 60, 1);

-- --------------------------------------------------------

--
-- Table structure for table `product_foto`
--

CREATE TABLE `product_foto` (
  `id` int(11) NOT NULL,
  `product_id` int(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `active` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product_foto`
--

INSERT INTO `product_foto` (`id`, `product_id`, `image`, `active`) VALUES
(2, 3, 'broodrooster1.jpg', 1),
(3, 4, 'tosti1.jpg', 1),
(4, 2, 'bitcoin.jpg', 1),
(5, 1, 'monopoly.jpg', 1),
(6, 5, 'man.jpg', 1),
(7, 6, 'wc.jpg', 1),
(8, 7, 'roos.jpg', 1),
(9, 8, 'tas.jpg', 1);

-- --------------------------------------------------------

--
-- Table structure for table `qr`
--

CREATE TABLE `qr` (
  `id` int(11) NOT NULL,
  `qr_id` int(11) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `qr`
--

INSERT INTO `qr` (`id`, `qr_id`, `image`) VALUES
(1, 1, 'qr-code.png'),
(2, 2, 'qr-code2.png'),
(3, 3, 'qr-code3.png'),
(4, 4, 'qr-code4.png'),
(5, 5, 'qr-code5.png'),
(6, 6, 'qr-code6.png'),
(7, 7, 'qr-code7.png'),
(8, 8, 'qr-code8.png');

-- --------------------------------------------------------

--
-- Table structure for table `user_account`
--

CREATE TABLE `user_account` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `admin` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_account`
--

INSERT INTO `user_account` (`id`, `email`, `password`, `admin`) VALUES
(1, 'caseyschaarenburg@gmail.com', 'admin', 1),
(2, 'caseyschaarenburg@gmail.com', '12345', 0),
(3, 'test@gmail.com', '$2y$10$2idbp9cV6zyEtiG9DGllnee24Ltos46YNHF7DpL4fv7Ezi6kSNedO', 1),
(4, 'root@hallo', '$2y$10$9yiHngsL2bZV/nBLsEVQ1O/4GjpnqYEJnnVludY/eYLL98evQU/9G', 1),
(5, 'test@gmail.com', '$2y$10$eI3sA5mnJMn6v.l/cv.GK.zcQ72BhwTydrFchtBiyvhkKqMbo9sjC', 0),
(6, 'root@hallo', '$2y$10$JQ/ytYCoeJM/KQraknCvy.v5zMpYqsWwYxuuyAQOO72blQclfh8Y6', 1),
(7, 'henk@gmail.com', '$2y$10$b25o6oDCFvVFMTg6jrCzIePVnovLI4V/S8O0qDaTBk.BofdLTouyy', 1),
(8, 'henk@gmail.com', '$2y$10$b25o6oDCFvVFMTg6jrCzIePVnovLI4V/S8O0qDaTBk.BofdLTouyy', 1),
(9, 'test@test.nl', '$2y$10$XWqQkImm60VAuiIhx/a3Wu.k6qcYNzhzwGvm5zBzURlsaKmbr9KjK', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `costumer`
--
ALTER TABLE `costumer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order`
--
ALTER TABLE `order`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_details`
--
ALTER TABLE `order_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `producten`
--
ALTER TABLE `producten`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_foto`
--
ALTER TABLE `product_foto`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `qr`
--
ALTER TABLE `qr`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_account`
--
ALTER TABLE `user_account`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `costumer`
--
ALTER TABLE `costumer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=201;

--
-- AUTO_INCREMENT for table `order`
--
ALTER TABLE `order`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `order_details`
--
ALTER TABLE `order_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `producten`
--
ALTER TABLE `producten`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=120;

--
-- AUTO_INCREMENT for table `product_foto`
--
ALTER TABLE `product_foto`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `qr`
--
ALTER TABLE `qr`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `user_account`
--
ALTER TABLE `user_account`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
