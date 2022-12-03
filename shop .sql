-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 03, 2022 at 04:27 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.0.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
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
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `EMAIL` varchar(255) NOT NULL,
  `PASSWORD` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`EMAIL`, `PASSWORD`) VALUES
('ADMIN@gmail.com', 'Admin@123');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `product_id` varchar(20) NOT NULL,
  `product_tittle` varchar(20) NOT NULL,
  `product_price` varchar(10) NOT NULL,
  `user_id` varchar(20) NOT NULL,
  `product_count` varchar(10) NOT NULL,
  `product_image` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`product_id`, `product_tittle`, `product_price`, `user_id`, `product_count`, `product_image`) VALUES
('62b95220adc35', 'steel kadayi', '249', 'sharon@gmail.com', '1', '1656312352_g4.jpg'),
('62b94b6a80575', 'cooker', '399', 'aditi@gmail.com', '3', '1656310634_51EwzMyO5iL._SX569_.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `phn` varchar(10) NOT NULL,
  `email` varchar(255) NOT NULL,
  `subject` varchar(255) NOT NULL,
  `message` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`id`, `name`, `phn`, `email`, `subject`, `message`) VALUES
(1, 'gdegfye', '7647654365', 'hbdhbd@gmail.com', 'dhbchdsbchd', 'abchbchdbcx'),
(2, 'treesa', '5737657657', 'fdgfhd@gmail.com', 'bdgdhkad', 'dbjabjkdabjkdabea');

-- --------------------------------------------------------

--
-- Table structure for table `notif_supplier`
--

CREATE TABLE `notif_supplier` (
  `id` int(11) NOT NULL,
  `pro_id` varchar(100) NOT NULL,
  `product_name` varchar(255) CHARACTER SET latin1 NOT NULL,
  `required_quantity` int(100) NOT NULL,
  `supplier_email` varchar(255) NOT NULL,
  `status` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `notif_supplier`
--

INSERT INTO `notif_supplier` (`id`, `pro_id`, `product_name`, `required_quantity`, `supplier_email`, `status`) VALUES
(3, '62b94b05610f2', 'steel kadayi', 1000, 'supplier@gmail.com', 'approved'),
(4, '62b94f0d4ba6c', 'Mini Springform Cake Tin', 67, 'molgy@gmail.com', 'approved'),
(5, '62b94b05610f2', 'steel kadayi', 1002, 'molgy@gmail.com', 'approved'),
(6, '62b95220adc35', 'steel kadayi', 100, 'josephspv93@gmail.com', 'approved'),
(7, '62b94b05610f2', 'steel kadayi', 190, 'josephspv93@gmail.com', 'approved'),
(8, '62b94f0d4ba6c', 'Mini Springform Cake Tin', 100, 'molgy@gmail.com', 'rejected'),
(9, '62b94b05610f2', 'steel kadayi', 50, 'molgy@gmail.com', 'approved'),
(10, '62d8275b54b5f', 'plate', 100, 'Mary@gmail.com', 'approved'),
(11, '62b94b05610f2', 'steel kadayi', 100, 'Mary@gmail.com', 'rejected'),
(12, '62b94b05610f2', 'steel kadayi', 100, 'josephspv93@gmail.com', 'rejected'),
(13, '62bb3a6b2bf7a', 'dinnerset', 100, 'Mary@gmail.com', 'approved'),
(14, '62b94b05610f2', 'steel kadayi', 100, 'honey@gmail.com', 'approved'),
(15, '62b94b05610f2', 'steel kadayi', 666, 'josephspv93@gmail.com', '');

-- --------------------------------------------------------

--
-- Table structure for table `order_details`
--

CREATE TABLE `order_details` (
  `product_id` text NOT NULL,
  `product_tittle` varchar(20) NOT NULL,
  `product_price` varchar(10) NOT NULL,
  `user_id` varchar(20) NOT NULL,
  `product_quantity` int(11) NOT NULL,
  `order_id` text NOT NULL,
  `order_date` timestamp(6) NOT NULL DEFAULT current_timestamp(6) ON UPDATE current_timestamp(6)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `order_details`
--

INSERT INTO `order_details` (`product_id`, `product_tittle`, `product_price`, `user_id`, `product_quantity`, `order_id`, `order_date`) VALUES
('62b94b05610f2', 'steel kadayi', '299', 'jefrin@gmail.com', 1, '1494830222', '0000-00-00 00:00:00.000000'),
('62b94b6a80575', 'cooker', '399', 'jefrin@gmail.com', 1, '2063088967', '2022-07-07 05:26:21.000000'),
('62b94ffdc8595', 'prestige dinnerset', '398', 'jefrin@gmail.com', 2, '942515063', '2022-07-09 13:22:46.000000'),
('62b94b05610f2', 'steel kadayi', '299', 'jefrin@gmail.com', 1, '940874878', '2022-07-09 13:22:46.000000'),
('62b94ffdc8595', 'prestige dinnerset', '199', 'jefrin@gmail.com', 1, '1568092824', '2022-07-18 08:20:33.000000'),
('62b94b6a80575', 'cooker', '399', 'jefrin@gmail.com', 1, '128988022', '2022-07-18 08:20:33.000000'),
('62b94b05610f2', 'steel kadayi', '1495', 'greeshma@gmail.com', 5, '1549891123', '2022-07-24 14:02:08.000000'),
('62d8275b54b5f', 'plate', '776', 'greeshma@gmail.com', 2, '556113979', '2022-07-24 14:55:29.000000'),
('62b95220adc35', 'steel kadayi', '249', 'hanan@gmail.com', 1, '1939912999', '2022-07-24 15:18:50.000000'),
('62d8275b54b5f', 'plate', '776', 'hanan@gmail.com', 2, '1566157305', '2022-07-24 15:27:37.000000'),
('62b94f0d4ba6c', 'Mini Springform Cake', '249', 'hanan@gmail.com', 1, '1650975857', '2022-07-24 17:20:24.000000'),
('62b95220adc35', 'steel kadayi', '249', 'hanan@gmail.com', 1, '1136869954', '2022-07-24 17:21:42.000000'),
('62b95220adc35', 'steel kadayi', '249', 'hanan@gmail.com', 1, '916771338', '2022-07-24 17:30:08.000000'),
('62d8275b54b5f', 'plate', '388', 'greeshma@gmail.com', 1, '982841744', '2022-07-25 16:09:23.000000'),
('62b94ffdc8595', 'prestige dinnerset', '995', 'greeshma@gmail.com', 5, '1519983400', '2022-07-25 16:09:24.000000'),
('62b94b6a80575', 'cooker', '399', 'greeshma@gmail.com', 1, '1771935713', '2022-07-25 16:09:24.000000'),
('62b94b6a80575', 'cooker', '1197', 'hanan@gmail.com', 3, '1137399136', '2022-07-25 18:16:10.000000'),
('62bb3a6b2bf7a', 'dinnerset', '289', 'hanan@gmail.com', 1, '156858524', '2022-07-25 18:18:26.000000'),
('62b94b05610f2', 'steel kadayi', '598', 'hanan@gmail.com', 2, '1923800505', '2022-07-26 03:47:40.000000'),
('62b94b6a80575', 'cooker', '399', 'hanan@gmail.com', 1, '1061377887', '2022-08-19 07:59:58.000000'),
('62b94b6a80575', 'cooker', '399', 'hanan@gmail.com', 1, '1785315700', '2022-10-25 19:01:57.000000'),
('62b94b05610f2', 'steel kadayi', '300', 'hanan@gmail.com', 1, '990592616', '2022-10-25 19:01:57.000000'),
('62b94b05610f2', 'steel kadayi', '300', 'Mary@gmail.com', 1, '1037987458', '2022-10-29 06:42:47.000000'),
('62b94b6a80575', 'cooker', '399', 'Mary@gmail.com', 1, '1559743316', '2022-10-29 06:42:48.000000'),
('62b94f0d4ba6c', 'Mini Springform Cake', '249', 'Mary@gmail.com', 1, '341049657', '2022-10-29 06:42:49.000000');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `product_id` varchar(100) NOT NULL,
  `product_cat` int(100) NOT NULL,
  `product_brand` varchar(255) NOT NULL,
  `product_title` varchar(255) CHARACTER SET latin1 NOT NULL,
  `product_price` int(100) NOT NULL,
  `product_desc` text CHARACTER SET latin1 NOT NULL,
  `product_image` text CHARACTER SET latin1 NOT NULL,
  `rol` int(100) NOT NULL,
  `product_count` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `product_cat`, `product_brand`, `product_title`, `product_price`, `product_desc`, `product_image`, `rol`, `product_count`) VALUES
('62b94b05610f2', 1, 'prestige', 'steel kadayi', 300, '																																	100% steel', '1656442344_aluminum-kadai-500x500.jpg', 10, 98),
('62b94b6a80575', 1, 'prestige', 'cooker', 399, '											DGGCGC	', '1656310634_51EwzMyO5iL._SX569_.jpg', 12, 79),
('62b94f0d4ba6c', 1, 'nolta', 'Mini Springform Cake Tin', 249, '												BJJJ', '1656311565_jamie-oliver-mini-springform-cake-tin-set-of-4-atlantic-green-36863216058624_540x.webp', 101, 97),
('62b94ffdc8595', 1, 'PIGEON', 'prestige dinnerset', 199, '																BBBBB		', '1656311805_b2.jpg', 7, 130),
('62b95220adc35', 1, 'pigeon', 'steel kadayi', 249, '						nbbn', '1656312352_g4.jpg', 10, 400),
('62bb3a6b2bf7a', 1, 'nolta', 'dinnerset', 289, '																		jbnbnbnbnbn', '1656437355_g5.jpg', 1, 100),
('62d8275b54b5f', 1, 'pigeon', 'plate', 388, '		vhbvfhbv				', '1658333019_istockphoto-912985692-170667a.jpg', 10, 188),
('62dd8d8af2ea7', 1, 'nolta', 'Solimo 3-Piece Aluminium Non-Stick Cookware Set - Fry Pan, Kadhai & Tawa (Induction And Gas Compatible) (Maroon)', 1299, '		3 piece non-stick cookware set; frypan, kadhai with glass lid and tawa for convenient everyday cooking\r\nMade using virgin aluminium for even heat distribution\r\nDurable and long lasting with 3 layers of food grade non-stick coating facilitating minimal oil use while preventing stickiness and mess\r\nPremium metallic finish with High Temperature Resistance (HTR) and a sleek shiny appeal\r\nBakelite handles provide a safe and firm ergonomic grip\r\nPrepare rotis, chapatis, dosa, stir-fries, pulao, korma, sauteed vegetables as well as sear meats and fish, and fry eggs with this 3 piece cookware set\r\nCan be used on gas stove and induction cooktops				', '1658686858_71bwxsfTaeL._SX569_.jpg', 10, 200),
('62ff450b757d9', 2, 'prestige', 'EFGHJK', 77777777, '				RFTGYHUJI		', '1660896523_51EwzMyO5iL._SX569_.jpg', 44, 666),
('631d8cefdca8a', 1, 'nirlon', 'Nirlon Premium Non Stick Aluminium Kitchen Ware 4 Piece Combo Set', 2034, 'Soft Touch Bakelite Handles Are Heat Resistant\r\nManufactured From Die cast Aluminium To Distribute Heat Evenly					', '1662881007_81rQPDUxGOL._AC_UL320_.webp', 5, 109),
('631d8dec05739', 1, 'prestige', 'Nonstick Frying Pan', 500, '		\r\nBrand	Amazon Brand - Solimo\r\nMaterial	Aluminium\r\nSpecial Feature	Dishwasher safe\r\nColour	Black\r\nCapacity	1500 Milliliters				', '1662881260_31Yp5Vae4wL._AC_SR320,320_.jpg', 10, 34),
('631d8e78e4765', 1, 'prestige', 'Cello Non-Stick 12 Cavity Grill Appam Patra with Stainless Steel Lid', 3333, '				\r\nBrand	Cello\r\nMaterial	Stainless Steel\r\nSpecial Feature	Dishwasher Safe\r\nColour	Black		', '1662881400_41+EEe5+g0L._AC_SR320,320_.webp', 1, 177);

-- --------------------------------------------------------

--
-- Table structure for table `registration`
--

CREATE TABLE `registration` (
  `USERID` int(11) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `mobile` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `registration`
--

INSERT INTO `registration` (`USERID`, `first_name`, `last_name`, `password`, `email`, `mobile`, `address`) VALUES
(6, 'megha', 'jobi', 'Megha@123', 'megha@gmail.com', '7676676676', 'gcggcgcgcg'),
(10, 'Greeshman ', 'Remanan', 'Greeshma@123', 'greeshma@gmail.com', '7777777777', 'thoppil house'),
(11, 'Hanan ', 'Ashreff', 'Hanan@123', 'hanan@gmail.com', '9999999999', 'dfghjkl'),
(12, 'sharon', 'k v', 'Sharon@123', 'sharon@gmail.com', '4444444444', 'sdfghjkl'),
(16, 'aditi', 'dileep', 'Aditi@123', 'aditi@gmail.com', '4444444444', 'fghjk'),
(17, 'jo', 'jo', 'Jo@12345', 'jo@gmail.com', '7777777777', 'fghjk'),
(18, 'Lo', 'Lo', 'Lo@123456', 'lo@gmail.com', '9999999999', 'vbnm'),
(19, 'Appu', 'Appu', 'Appu@1234567', 'appu@gmail.com', '1234567899', 'cvbnm'),
(20, 'vbnm', 'vbnm', 'Admin@123', 'dfghjk@gmail.com', '6666666666', 'fcvgbhnjkm'),
(21, 'sd', 'sd', 'Admin@123', 'sd@gmail.com', '7777777777', 'vbnmm'),
(22, 'Mary', 'Mary', 'Mary@123', 'mary@gmail.com', '9999999999', 'dfghjkfghjk'),
(23, 'Mary', 'Grace', 'Grace@123', 'Mary@gmail.com', '5555555555', 'dfcgvhbnjkm');

-- --------------------------------------------------------

--
-- Table structure for table `shipping_details`
--

CREATE TABLE `shipping_details` (
  `user_id` text NOT NULL,
  `name` varchar(20) NOT NULL,
  `mobile` varchar(13) NOT NULL,
  `landmark` text NOT NULL,
  `city` varchar(20) NOT NULL,
  `add_type` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `shipping_details`
--

INSERT INTO `shipping_details` (`user_id`, `name`, `mobile`, `landmark`, `city`, `add_type`) VALUES
('hanan@gmail.com', 'Hanan ', '7777777777', 'fdfghjhkjfgh', 'Kottayam', 'Home'),
('hanan@gmail.com', 'Hanan ', '7777777777', 'fdfghjhkjfgh', 'Kottayam', 'Home'),
('hanan@gmail.com', 'Hanan ', '7777777777', 'fdfghjhkjfgh', 'Kottayam', 'Home'),
('hanan@gmail.com', 'Hanan ', '7777777777', 'fdfghjhkjfgh', 'Kottayam', 'Home'),
('hanan@gmail.com', 'Hanan ', '7777777777', 'fdfghjhkjfgh', 'Kottayam', 'Home'),
('hanan@gmail.com', 'Hanan ', '7777777777', 'fdfghjhkjfgh', 'Kottayam', 'Home'),
('hanan@gmail.com', 'Hanan ', '7777777777', 'fdfghjhkjfgh', 'Kottayam', 'Home'),
('hanan@gmail.com', 'Hanan ', '7777777777', 'fdfghjhkjfgh', 'Kottayam', 'Home'),
('hanan@gmail.com', 'Hanan ', '7777777777', 'fdfghjhkjfgh', 'Kottayam', 'Home'),
('hanan@gmail.com', 'Hanan ', '7777777777', 'fdfghjhkjfgh', 'Kottayam', 'Home'),
('Mary@gmail.com', 'Mary Grace', '5555555555', 'hhghgh', 'Changanacherry', 'Home');

-- --------------------------------------------------------

--
-- Table structure for table `supplier_info`
--

CREATE TABLE `supplier_info` (
  `id` int(11) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `mobile` varchar(10) NOT NULL,
  `address` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `supplier_info`
--

INSERT INTO `supplier_info` (`id`, `first_name`, `last_name`, `email`, `password`, `mobile`, `address`) VALUES
(3, 'Joseph', 'Sebastian', 'josephspv93@gmail.com', 'Joseph@123', '9995791320', 'pannackal'),
(9, 'jessy', 'sebastain', 'jessy@gmail.com', 'Jessy@123', '6666666666', '*'),
(10, 'jerin', 'joseph', 'jerin@gmail.com', 'Jerin@123', '9999999999', 'bbchbcf'),
(11, 'Mary Grace', 'Joseph', 'Mary@gmail.com', 'Mary@123', '5555555555', 'asdfghjklpoiuytrewq'),
(12, 'Reshma', 'Remanan', 'Reshma@gmail.com', 'Reshma@123', '6666666666', '%'),
(13, 'honey', 'Sebastian', 'honey@gmail.com', 'Honey@123', '5666666666', 'kottayam,Chry');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notif_supplier`
--
ALTER TABLE `notif_supplier`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `registration`
--
ALTER TABLE `registration`
  ADD PRIMARY KEY (`USERID`);

--
-- Indexes for table `supplier_info`
--
ALTER TABLE `supplier_info`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `notif_supplier`
--
ALTER TABLE `notif_supplier`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `registration`
--
ALTER TABLE `registration`
  MODIFY `USERID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `supplier_info`
--
ALTER TABLE `supplier_info`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
