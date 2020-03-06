-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 05, 2020 at 07:28 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pt14314-web-assignment`
--

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

CREATE TABLE `brands` (
  `id` int(11) NOT NULL,
  `brand_name` varchar(255) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `logo` varchar(255) COLLATE utf8mb4_vietnamese_ci DEFAULT NULL,
  `country` varchar(255) COLLATE utf8mb4_vietnamese_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`id`, `brand_name`, `logo`, `country`) VALUES
(1, 'BMW', NULL, 'Germany'),
(2, 'Honda', 'public/images/5e5e936fc815d-brasol.vn-logo-honda-vector-honda.png', 'Japan'),
(4, 'Nissan', 'public/images/5e5fce5e4b716-download (2).jpg', 'Japan');

-- --------------------------------------------------------

--
-- Table structure for table `cars`
--

CREATE TABLE `cars` (
  `id` int(11) NOT NULL,
  `brand_id` int(11) NOT NULL,
  `model_name` varchar(255) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_vietnamese_ci DEFAULT NULL,
  `price` int(11) NOT NULL,
  `sale_price` int(11) DEFAULT 0,
  `detail` text COLLATE utf8mb4_vietnamese_ci DEFAULT NULL,
  `quanity` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Dumping data for table `cars`
--

INSERT INTO `cars` (`id`, `brand_id`, `model_name`, `image`, `price`, `sale_price`, `detail`, `quanity`) VALUES
(1, 1, 'BMW M235i xDrive Gran Coup', NULL, 20000, 0, 'The BMW M235i xDrive Gran Coupé is uncompromisingly designed for dynamics in every respect – above all in terms of styling. From the distinctive front with BMW kidney grille in mesh design through to the free-form trims of the exhaust system at the powerful rear – an athlete through and through. The interior offers a modern and sporty ambience with exclusive M design details such as door sill finishers or pedals and dynamic features such as the M Sport seats.    ', 2),
(2, 4, 'TERRA', 'public/images/5e5fcf75ea360-18TDIPHILHD_P60A038_007_proxy_JPEG-High-Res.jpeg.jpg', 38068, 0, 'ccc', 3),
(11, 1, 'ccccccccc', 'public/images/5e5fd58edff24-download (1).jpg', 13123, 0, '', 3);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cars`
--
ALTER TABLE `cars`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_brand_id` (`brand_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `cars`
--
ALTER TABLE `cars`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cars`
--
ALTER TABLE `cars`
  ADD CONSTRAINT `FK_brand_id` FOREIGN KEY (`brand_id`) REFERENCES `brands` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
