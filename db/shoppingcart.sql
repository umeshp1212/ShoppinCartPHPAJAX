-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 05, 2018 at 02:43 PM
-- Server version: 10.1.32-MariaDB
-- PHP Version: 7.2.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `shoppingcart`
--

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

CREATE TABLE `brands` (
  `brand_id` int(10) NOT NULL,
  `brand_title` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`brand_id`, `brand_title`) VALUES
(1, 'Della1'),
(2, 'Della2'),
(3, 'Della3');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `cart_id` int(10) NOT NULL,
  `p_id` int(10) NOT NULL,
  `ip_addr` varchar(200) NOT NULL,
  `user_id` int(10) NOT NULL,
  `product_title` varchar(300) NOT NULL,
  `product_image` text NOT NULL,
  `qty` int(100) NOT NULL,
  `price` int(100) NOT NULL,
  `total_amount` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `cat_id` int(100) NOT NULL,
  `cat_title` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`cat_id`, `cat_title`) VALUES
(1, 'Sofa'),
(2, 'Chair'),
(3, 'Chandilier'),
(4, 'Pendant');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `product_id` int(100) NOT NULL,
  `product_cat` int(100) NOT NULL,
  `product_brand` int(100) NOT NULL,
  `product_title` varchar(100) NOT NULL,
  `product_price` int(100) NOT NULL,
  `product_desc` text NOT NULL,
  `product_image` varchar(100) NOT NULL,
  `product_keyword` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `product_cat`, `product_brand`, `product_title`, `product_price`, `product_desc`, `product_image`, `product_keyword`) VALUES
(1, 1, 1, 'Octavia Six-Seater Sofa', 20000, ' Seasoned Teakwood, Marine Plywood, Multi-Density Foam, Veneer, Leatherite', 'sofa4.jpg', 'sofa six seater'),
(2, 1, 2, 'Ciana Four-Seater Sofa', 250000, 'Seasoned Teakwood, Marine Plywood, Multi-Density Foam, Leatherite', 'sofa1.jpg', 'sofa four seater'),
(3, 1, 3, 'Viviana Four-Seater', 30000, 'Seasoned Teakwood, Marine Plywood, High Gloss Veneer, Multi-Density Foam, Nubuck Leatherite/Fabric', 'sofa2.jpg', 'four seater sofa'),
(4, 1, 1, 'Siena Four-Seater', 35000, 'Seasoned Teakwood, Marine Plywood, Multi-Density Foam, Veneer, Leatherite', 'sofa3.jpg', 'siena four seater sofa'),
(5, 2, 2, 'Mansory Office Chair', 10000, '', 'chair1.jpg', 'chair office'),
(6, 2, 3, 'Monarch Office Chair2', 15000, '', 'chair2.jpg', 'chair office'),
(7, 2, 1, 'Sentinel Office Chair ', 5000, '', 'chair3.jpg', 'chair office'),
(8, 2, 2, 'Vizier Office Chair', 12000, '', 'chair4.jpg', 'chair office'),
(9, 2, 3, 'Mansory Office Chair', 16000, '', 'chair5.jpg', 'chair office'),
(10, 2, 1, 'Monarch Office Chair', 21000, '', 'chair6.jpg', 'chair office'),
(11, 3, 2, 'Mozart Three-Level Crystal Glass', 850000, 'Crystal Glass, Stainless Steel, FR Fabric', 'chandilier1.jpg', 'three level crystal glass'),
(12, 3, 3, 'Mozart Four-Level Crystal Glass', 748000, ' Crystal Glass, Stainless Steel, FR Fabric', 'chandilier2.jpg', 'four level crystal glass'),
(13, 4, 1, 'Bennasconi 2-Arm Pendant Lamp', 48000, 'Stainless Steel, Aluminium, FR Fabric', 'pendant1.jpg', 'pendant, lamp'),
(14, 4, 2, 'Huberman Pedant Light 19\"', 112000, ' Ceramic', 'pendant2.jpg', 'pendant, lamp');

-- --------------------------------------------------------

--
-- Table structure for table `user_table`
--

CREATE TABLE `user_table` (
  `user_id` int(10) NOT NULL,
  `first_name` varchar(300) NOT NULL,
  `last_name` varchar(300) NOT NULL,
  `email` varchar(300) NOT NULL,
  `password` varchar(100) NOT NULL,
  `mobile` int(10) NOT NULL,
  `address1` varchar(500) NOT NULL,
  `address2` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_table`
--

INSERT INTO `user_table` (`user_id`, `first_name`, `last_name`, `email`, `password`, `mobile`, `address1`, `address2`) VALUES
(1, 'Umesh', 'Patil', 'umeshpatil@della.in', '123456789', 1234567890, 'dsfs', 'sdsdadsa'),
(2, 'Umesh', 'Patil', 'umesh@della.in', '1234569870', 123456789, 'one ', 'two'),
(3, 'Umesh', 'Patil', 'umesh123@della.in', '1234567990', 25, 'asd', 'asd');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`brand_id`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`cart_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `user_table`
--
ALTER TABLE `user_table`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
  MODIFY `brand_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `cart_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `cat_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `user_table`
--
ALTER TABLE `user_table`
  MODIFY `user_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
