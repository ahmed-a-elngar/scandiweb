-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Mar 09, 2023 at 09:37 AM
-- Server version: 10.3.35-MariaDB
-- PHP Version: 7.3.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `id20420608_products`
--

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `sku` varchar(50) NOT NULL,
  `name` varchar(50) NOT NULL,
  `price` decimal(20,4) NOT NULL,
  `type_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `products_dimensions`
--

CREATE TABLE `products_dimensions` (
  `id` int(11) NOT NULL,
  `height` decimal(20,4) NOT NULL,
  `width` decimal(20,4) NOT NULL,
  `length` decimal(20,4) NOT NULL,
  `product_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `products_measures_units`
--

CREATE TABLE `products_measures_units` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products_measures_units`
--

INSERT INTO `products_measures_units` (`id`, `name`) VALUES
(1, 'size'),
(2, 'weight'),
(3, 'dimensions');

-- --------------------------------------------------------

--
-- Table structure for table `products_size`
--

CREATE TABLE `products_size` (
  `id` int(11) NOT NULL,
  `size` decimal(20,4) NOT NULL,
  `product_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `products_types`
--

CREATE TABLE `products_types` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `measure_unit_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products_types`
--

INSERT INTO `products_types` (`id`, `name`, `measure_unit_id`) VALUES
(1, 'dvd', 1),
(2, 'book', 2),
(3, 'furniture', 3);

-- --------------------------------------------------------

--
-- Table structure for table `products_weight`
--

CREATE TABLE `products_weight` (
  `id` int(11) NOT NULL,
  `weight` decimal(20,4) NOT NULL,
  `product_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `unique_sku_index` (`sku`),
  ADD KEY `product_type_foreign_key` (`type_id`);

--
-- Indexes for table `products_dimensions`
--
ALTER TABLE `products_dimensions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_foreign_key` (`product_id`);

--
-- Indexes for table `products_measures_units`
--
ALTER TABLE `products_measures_units`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products_size`
--
ALTER TABLE `products_size`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_foreign_key` (`product_id`);

--
-- Indexes for table `products_types`
--
ALTER TABLE `products_types`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `measure_unit_foreign_key` (`measure_unit_id`);

--
-- Indexes for table `products_weight`
--
ALTER TABLE `products_weight`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_foreign_key` (`product_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;

--
-- AUTO_INCREMENT for table `products_dimensions`
--
ALTER TABLE `products_dimensions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;

--
-- AUTO_INCREMENT for table `products_measures_units`
--
ALTER TABLE `products_measures_units`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;

--
-- AUTO_INCREMENT for table `products_size`
--
ALTER TABLE `products_size`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;

--
-- AUTO_INCREMENT for table `products_types`
--
ALTER TABLE `products_types`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;

--
-- AUTO_INCREMENT for table `products_weight`
--
ALTER TABLE `products_weight`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_ibfk_1` FOREIGN KEY (`type_id`) REFERENCES `products_types` (`id`) ON UPDATE CASCADE;

--
-- Constraints for table `products_dimensions`
--
ALTER TABLE `products_dimensions`
  ADD CONSTRAINT `products_dimensions_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `products_size`
--
ALTER TABLE `products_size`
  ADD CONSTRAINT `products_size_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `products_types`
--
ALTER TABLE `products_types`
  ADD CONSTRAINT `products_types_ibfk_1` FOREIGN KEY (`measure_unit_id`) REFERENCES `products_measures_units` (`id`) ON UPDATE CASCADE;

--
-- Constraints for table `products_weight`
--
ALTER TABLE `products_weight`
  ADD CONSTRAINT `products_weight_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
