-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 28, 2021 at 12:25 PM
-- Server version: 10.4.13-MariaDB
-- PHP Version: 7.4.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `al_chisty`
--

-- --------------------------------------------------------

--
-- Table structure for table `sale__item`
--

CREATE TABLE `sale__item` (
  `item_id` bigint(255) NOT NULL,
  `sale_order_id` bigint(255) DEFAULT NULL,
  `item_description` varchar(255) DEFAULT NULL,
  `receive_date` text DEFAULT NULL,
  `delivery_date` text DEFAULT NULL,
  `uom_id` bigint(255) DEFAULT NULL,
  `item_quantity` bigint(255) DEFAULT NULL,
  `item_qty` bigint(255) DEFAULT NULL,
  `gross_total` varchar(255) DEFAULT NULL,
  `vat_total` varchar(255) DEFAULT NULL,
  `net_total` varchar(255) DEFAULT NULL,
  `time_interval` varchar(255) DEFAULT NULL,
  `time_unit` varchar(255) DEFAULT NULL,
  `cost_unit` varchar(255) DEFAULT NULL,
  `total_time` varchar(255) DEFAULT NULL,
  `item_note` varchar(255) DEFAULT NULL,
  `attachment_id` bigint(255) DEFAULT NULL,
  `created_at` text DEFAULT NULL,
  `updated_at` text DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `sale__item`
--
ALTER TABLE `sale__item`
  ADD PRIMARY KEY (`item_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `sale__item`
--
ALTER TABLE `sale__item`
  MODIFY `item_id` bigint(255) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
