-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 28, 2021 at 12:26 PM
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
-- Table structure for table `sale__order`
--

CREATE TABLE `sale__order` (
  `sales_order_id` bigint(255) NOT NULL,
  `sales_mode` text DEFAULT NULL,
  `customer_id` bigint(255) NOT NULL,
  `booked_by_id` bigint(255) NOT NULL,
  `sales_order_date` varchar(255) DEFAULT NULL,
  `sales_person_name` text DEFAULT NULL,
  `sales_person_number` varchar(255) DEFAULT NULL,
  `sales_receiving_date` text DEFAULT NULL,
  `sales_delivery_date` text DEFAULT NULL,
  `sales_lpo` text DEFAULT NULL,
  `sales_focus_so` text DEFAULT NULL,
  `sales_order_subject` longtext DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `created_at` varchar(255) DEFAULT NULL,
  `updated_at` varchar(255) DEFAULT NULL,
  `deleted_at` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sale__order`
--

INSERT INTO `sale__order` (`sales_order_id`, `sales_mode`, `customer_id`, `booked_by_id`, `sales_order_date`, `sales_person_name`, `sales_person_number`, `sales_receiving_date`, `sales_delivery_date`, `sales_lpo`, `sales_focus_so`, `sales_order_subject`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(3, 'Credit', 4, 1, '2021-04-03', 'asdf', '23542', '2021-04-02', '2021-04-03', 'qwer', 'qwer', 'test update subject', 3, '2021-04-10 16:55:18', '2021-04-28 15:36:46', NULL),
(5, 'Cash', 1, 3, '2021-04-03', 'Habeeb', '9009090909', '0090-09-09', '2021-04-23', '90.09', '12.3', 'subject', 1, '2021-04-12 11:34:25', '2021-04-16 14:01:47', NULL),
(6, 'Cash', 3, 1, '2021-04-01', 'hdhj', '9090909090', '2021-04-23', '2021-04-29', '9090', '8989', 'kjskjkajs', 1, '2021-04-12 13:06:58', '2021-04-12 13:11:05', NULL),
(7, 'Cash', 3, 3, '2021-04-03', 'asasas', '32323232', '2021-04-23', '2021-04-09', '233333', '32222', '23333333333', 1, '2021-04-12 15:32:58', NULL, NULL),
(8, 'Credit', 1, 1, '2021-04-10', 'Nandu', '9096098163', '2021-05-01', '0009-09-09', '90', '090', 'Hello From', 1, '2021-04-12 15:34:18', '2021-04-16 12:28:02', NULL),
(9, 'Credit', 6, 3, '2021-04-07', '160cVDwOW7', '428678', '2021-04-18', '2021-04-15', '5bCUy12KsO', 'CzPcoSjE0P', 'sJDohferof', 1, '2021-04-28 14:55:49', NULL, NULL),
(10, 'Cash', 1, 1, '2021-04-01', 'dupBSPG9vo', '584543', '2021-04-21', '2021-04-29', 'LnEC8qc7jm', 'YBZx0mWU43', 'yKHnqcH1et', 1, '2021-04-28 14:58:42', NULL, NULL),
(11, 'Credit', 6, 3, '2021-04-07', 'yT0JJ7gvzP', '309899', '2021-04-18', '2021-04-15', 'DJXTjSCpOc', 'b59ALHwfqx', 'O9qK2DLxya', 1, '2021-04-28 15:07:22', NULL, NULL),
(12, 'Cash', 4, 1, '2021-04-29', 'asefsda', '54645766575', '2021-04-30', '2021-04-29', '675', 'yurty', 'fghfgjhhj', 1, '2021-04-28 15:08:33', NULL, NULL),
(13, 'Cash', 3, 4, '2021-04-29', 'fsdgdfg', '64565765', '2021-04-29', '2021-04-29', 'fghdfh', 'ghdfh', 'gfhdhg', 1, '2021-04-28 15:14:04', NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `sale__order`
--
ALTER TABLE `sale__order`
  ADD PRIMARY KEY (`sales_order_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `sale__order`
--
ALTER TABLE `sale__order`
  MODIFY `sales_order_id` bigint(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
