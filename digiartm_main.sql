-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Feb 23, 2019 at 04:22 PM
-- Server version: 5.6.41
-- PHP Version: 7.2.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `digiartm_main`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `adminid` int(250) NOT NULL,
  `adminname` varchar(250) NOT NULL,
  `adminmail` varchar(250) NOT NULL,
  `adminpass` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`adminid`, `adminname`, `adminmail`, `adminpass`) VALUES
(1, 'Byez', 'admin@ArtBuySell.com', 'FluffyBunnies420!');

-- --------------------------------------------------------

--
-- Table structure for table `buyertable`
--

CREATE TABLE `buyertable` (
  `BuyerId` int(11) NOT NULL,
  `BuyerName` varchar(250) DEFAULT NULL,
  `BuyerEmail` varchar(250) DEFAULT NULL,
  `TransactionID` varchar(250) DEFAULT NULL,
  `ItemName` varchar(250) NOT NULL,
  `ItemNumber` varchar(250) NOT NULL,
  `ItemAmount` varchar(250) NOT NULL,
  `ItemQTY` varchar(250) DEFAULT NULL,
  `UserId` int(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `buyertable`
--

INSERT INTO `buyertable` (`BuyerId`, `BuyerName`, `BuyerEmail`, `TransactionID`, `ItemName`, `ItemNumber`, `ItemAmount`, `ItemQTY`, `UserId`) VALUES
(1, 'test buyer', 'Pickperfection-buyer@gmail.com', '6N225968HT143022S', 'External+Hard+Disk', 'PD1003', '1', '1', 5),
(2, 'test buyer', 'Pickperfection-buyer@gmail.com', '86057207HC4237810', 'External+Hard+Disk', 'PD1003', '6.85', '1', 5),
(9, 'test buyer', 'Pickperfection-buyer@gmail.com', '52163058TB520782E', 'product+1+', '0489', '12', '1', 1),
(10, 'test buyer', 'Pickperfection-buyer@gmail.com', '52163058TB520782E', 'awain+e+installing+new+product+for+testing+purpose', '0789', '23', '1', 1),
(11, 'test buyer', 'Pickperfection-buyer@gmail.com', '56X514827M317120P', 'awain+e+installing+new+product+for+testing+purpose', '0789', '23', '1', 1),
(12, 'test buyer', 'Pickperfection-buyer@gmail.com', '15T828778L9472028', 'product+1+', '0489', '12', '1', 1),
(13, 'test buyer', 'Pickperfection-buyer@gmail.com', '2B882439HX7948825', 'product+1+', '0489', '12', '1', 1),
(14, 'test buyer', 'Pickperfection-buyer@gmail.com', '2B882439HX7948825', 'product+5', '878', '34', '1', 1),
(15, 'test buyer', 'Pickperfection-buyer@gmail.com', '7JG833661Y904350J', 'Django+head+phone+avalable+awsome+beat', '077', '17', '1', 6);

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `categoryid` int(11) NOT NULL,
  `categoryname` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`categoryid`, `categoryname`) VALUES
(1, 'Seamless Textures'),
(2, 'Textures'),
(5, '3D Models'),
(6, 'Characters'),
(9, 'Scenery'),
(10, 'Sound Effects'),
(13, 'Audio');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `userid` int(250) NOT NULL,
  `product_code` varchar(60) NOT NULL,
  `product_name` varchar(60) NOT NULL,
  `product_cat` varchar(150) DEFAULT NULL,
  `product_desc` tinytext NOT NULL,
  `product_img_name` varchar(60) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `rating` tinyint(2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `userid`, `product_code`, `product_name`, `product_cat`, `product_desc`, `product_img_name`, `price`, `rating`) VALUES
(25, 5, '07898', 'awain e installing new product for testing purpose', '2', 'fhjkg jgkds hgkljd kjgds jkbgdjf jkhgdkfjg jkghkjdfg ngbdljkf', 'external-hard-disk.jpg', '4534.00', 5),
(28, 5, '0489', 'product 1 ', '1', 'j jkhtker kjhgkjg ,hfdg kjhgkjdfg jhdfkjg kfjghdkg kfjhgkf', 's.PNG', '12.00', NULL),
(30, 1, '04894', 'product 2', '1', 'j jkhtker kjhgkjg ,hfdg kjhgkjdfg jhdfkjg kfjghdkg kfjhgkf', 's.PNG', '23.00', NULL),
(36, 5, '678', 'product 6', '1', 'j jkhtker kjhgkjg ,hfdg kjhgkjdfg jhdfkjg kfjghdkg kfjhgkf', 's.PNG', '23.00', NULL),
(38, 6, '077', 'Django head phone avalable awsome beat', '9', 'Django head phone avalable awsome beat use once and u will see the differecne', '13895321_1646492085667684_8838381262657400282_n.jpg', '17.00', NULL),
(39, 1, '07775', 'Product8', '1', 'Achi ha markit me in ha le jao acha ha na b lo to chRO', 'similar2.jpg', '7.00', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `rating`
--

CREATE TABLE `rating` (
  `ratid` int(11) NOT NULL,
  `productid` int(250) NOT NULL,
  `userIp` varchar(250) NOT NULL,
  `rating` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `UserId` int(11) NOT NULL,
  `username` varchar(150) NOT NULL,
  `userphone` varchar(150) NOT NULL,
  `useraddress` varchar(150) NOT NULL,
  `usermail` varchar(150) NOT NULL,
  `userpass` varchar(150) NOT NULL,
  `userimg` varchar(250) DEFAULT NULL,
  `imgtoken` varchar(250) DEFAULT NULL,
  `satus` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`UserId`, `username`, `userphone`, `useraddress`, `usermail`, `userpass`, `userimg`, `imgtoken`, `satus`) VALUES
(1, 'waqas sheikh', '+923360057577', 'New westridge Colony Hno#57', 'hubdub@gmail.com', 'hubdub', 'shakeel.jpg', 'd86c8695f38f102b', 0),
(5, 'Ahsan ghaba', '098979868767', 'ghaba ', 'hup@gmail.com', 'hup', '20068163_1922642084614329_1415954465_n.jpg', 'cf3ede04dea76ac9', 0),
(6, 'shakeel zaman', '033600068686', 'Rawalpindi, Pakistan', 'shanishakeel7@gmail.com', 'shani123', 'shakeel.jpg', '4c83483f1385f3f0', 0),
(7, 'shane gilday', '7194292944', '2147 central ave lot 13', 'shane0326@icloud.com', 'Shane0326', NULL, NULL, 0),
(8, 'bryan', '7197171025', '410 n pikes peak ave', 'galatia420@live.com', 'garbonzo', '21b14909a-ceba-4b7a-b7e8-a42f4258c25f.2.jpg', '6d11d894163dd235', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`adminid`);

--
-- Indexes for table `buyertable`
--
ALTER TABLE `buyertable`
  ADD PRIMARY KEY (`BuyerId`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`categoryid`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `product_code` (`product_code`);

--
-- Indexes for table `rating`
--
ALTER TABLE `rating`
  ADD PRIMARY KEY (`ratid`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`UserId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `adminid` int(250) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `buyertable`
--
ALTER TABLE `buyertable`
  MODIFY `BuyerId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `categoryid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `rating`
--
ALTER TABLE `rating`
  MODIFY `ratid` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `UserId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
