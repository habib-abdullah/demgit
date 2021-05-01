-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 20, 2021 at 08:49 AM
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
-- Table structure for table `client`
--

CREATE TABLE `client` (
  `client_id` bigint(255) NOT NULL,
  `client_type` varchar(255) DEFAULT NULL,
  `client_name` varchar(255) DEFAULT NULL,
  `company_name` varchar(255) DEFAULT NULL,
  `client_code` varchar(255) DEFAULT NULL,
  `client_address` varchar(255) DEFAULT NULL,
  `company_address` varchar(255) DEFAULT NULL,
  `company_state` varchar(255) DEFAULT NULL,
  `company_country` varchar(255) DEFAULT NULL,
  `pobox` varchar(255) DEFAULT NULL,
  `client_mobile` varchar(255) DEFAULT NULL,
  `company_mobile` varchar(255) DEFAULT NULL,
  `company_phone` bigint(255) DEFAULT NULL,
  `company_fax` varchar(255) DEFAULT NULL,
  `client_email` varchar(255) DEFAULT NULL,
  `company_email` varchar(255) DEFAULT NULL,
  `company_website` varchar(255) DEFAULT NULL,
  `balance_limit` varchar(255) DEFAULT NULL,
  `credit_duration` varchar(255) DEFAULT NULL,
  `trade_license_register_authority` varchar(255) DEFAULT NULL,
  `trade_license_number` varchar(255) DEFAULT NULL,
  `trade_license_issue_date` text DEFAULT NULL,
  `trade_license_expiry_date` text NOT NULL,
  `trn_number` varchar(255) DEFAULT NULL,
  `company_site` varchar(255) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `created_at` text DEFAULT NULL,
  `updated_at` text DEFAULT NULL,
  `deleted_at` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `client`
--

INSERT INTO `client` (`client_id`, `client_type`, `client_name`, `company_name`, `client_code`, `client_address`, `company_address`, `company_state`, `company_country`, `pobox`, `client_mobile`, `company_mobile`, `company_phone`, `company_fax`, `client_email`, `company_email`, `company_website`, `balance_limit`, `credit_duration`, `trade_license_register_authority`, `trade_license_number`, `trade_license_issue_date`, `trade_license_expiry_date`, `trn_number`, `company_site`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Client', 'abdul rahim', 'dualsysco', '111111111', '', 'maqsood colony, toshan gate, kaisar colony, megha nagar, aurangabad', 'maharashtra', '', 'PO12', '0', '9798765499', 9876543219, '65432198', '', 'mail@mail.com', 'dual.com', '5000', '5 months', 'asd54asdf', '6546546464dsd45654', '2021-03-23', '2021-04-23', '11111222222', 'customer_site', 0, NULL, '2021-03-27 17:42:08', NULL),
(3, 'Vendor', 'sdfg', 'fake company', 'sdfg', '', 'dsg', 'dsfg', '', 'asdg', '0', '333', 333, 'asdf', '', 'asdf', 'asdf', 'asdf', 'asdf', 'asdf', 'asdf', '2021-03-24', '2021-03-05', 'asdf', 'main_site', 1, '2021-03-26 15:08:27', NULL, NULL),
(4, 'Client', 'Habeeb Abdur Rehman', 'IT2lab', '431001', '', 'Nepal', 'maharahtra', '', 'asddsad', '0', '09096098163', 9096098163, 'sadsadsad', '', 'asdsadsadsd', 'dsadsa', 'sdassa', 'dsdasd', 'saddsds', 'sdsdasda', '2021-04-29', '2021-04-24', 'saaaa', 'main_site', 1, '2021-04-12 13:14:21', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `client__bank`
--

CREATE TABLE `client__bank` (
  `bank_id` bigint(255) NOT NULL,
  `client_id` bigint(255) NOT NULL,
  `bank_name` longtext DEFAULT NULL,
  `account_name` longtext DEFAULT NULL,
  `account_number` longtext DEFAULT NULL,
  `bank_branch` longtext DEFAULT NULL,
  `bank_swift` varchar(255) DEFAULT NULL,
  `bank_iban` varchar(255) DEFAULT NULL,
  `created_at` text DEFAULT NULL,
  `updated_at` text DEFAULT NULL,
  `deleted_at` text DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `client__bank`
--

INSERT INTO `client__bank` (`bank_id`, `client_id`, `bank_name`, `account_name`, `account_number`, `bank_branch`, `bank_swift`, `bank_iban`, `created_at`, `updated_at`, `deleted_at`, `status`) VALUES
(1, 1, 'asdf', 'asd', '34234', 'sadf', 'asdf', 'asdf', '2021-03-28 16:39:18', NULL, NULL, 1),
(3, 3, 'aaaaa', 'aaa', 'ssssssss', 'eeeeee', 'dsfdfdfd', '11111111', '2021-03-28 16:44:50', NULL, NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `client__contact`
--

CREATE TABLE `client__contact` (
  `contact_id` bigint(255) NOT NULL,
  `client_id` bigint(255) NOT NULL,
  `title` longtext DEFAULT NULL,
  `contact_name` longtext DEFAULT NULL,
  `contact_alias` longtext DEFAULT NULL,
  `contact_mobile` varchar(255) DEFAULT NULL,
  `contact_phone` varchar(255) DEFAULT NULL,
  `contact_ext` varchar(255) DEFAULT NULL,
  `contact_email` varchar(255) DEFAULT NULL,
  `contact_designation` varchar(255) DEFAULT NULL,
  `contact_department` varchar(255) DEFAULT NULL,
  `created_at` text DEFAULT NULL,
  `updated_at` text DEFAULT NULL,
  `deleted_at` text DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `client__contact`
--

INSERT INTO `client__contact` (`contact_id`, `client_id`, `title`, `contact_name`, `contact_alias`, `contact_mobile`, `contact_phone`, `contact_ext`, `contact_email`, `contact_designation`, `contact_department`, `created_at`, `updated_at`, `deleted_at`, `status`) VALUES
(3, 3, 'Mr', 'aaaaaaa', 'asdf', '234324', '234', 'sdf', 'asdf@asdf', 'sdf', 'asdf', '2021-03-28 16:44:19', '2021-03-29 13:18:34', NULL, 1),
(5, 1, 'Mr', 'asdfsdfsdfsadfadsfsdff', 'asdf', '2', '234', 'asdf', 'sadf@asdf', 'sadf', 'asdf', '2021-03-29 15:45:59', '2021-03-29 15:46:12', NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `client__document`
--

CREATE TABLE `client__document` (
  `document_id` bigint(255) NOT NULL,
  `client_id` bigint(255) NOT NULL,
  `document_name` longtext DEFAULT NULL,
  `document_file` longtext DEFAULT NULL,
  `trade_license` varchar(255) DEFAULT NULL,
  `trn_certificate` varchar(255) DEFAULT NULL,
  `chamber_of_commerce_certificate` varchar(255) DEFAULT NULL,
  `credit_application` varchar(255) DEFAULT NULL,
  `power_of_attorney` varchar(255) DEFAULT NULL,
  `created_at` text DEFAULT NULL,
  `updated-at` text DEFAULT NULL,
  `deleted_at` text DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `client__document`
--

INSERT INTO `client__document` (`document_id`, `client_id`, `document_name`, `document_file`, `trade_license`, `trn_certificate`, `chamber_of_commerce_certificate`, `credit_application`, `power_of_attorney`, `created_at`, `updated-at`, `deleted_at`, `status`) VALUES
(10, 3, '1', 'barcode_77370.png', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1),
(11, 3, '2', 'logo4_79213.jpeg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1),
(12, 3, '3', 'card_80584.png', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1),
(13, 3, '1', 'barcode_38484.png', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1),
(14, 3, 'asdf', 'logo4_61024.jpeg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1),
(15, 3, '3', 'card_20518.png', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1),
(16, 3, 'asdsdf', 'barcode_94492.png', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1),
(17, 3, 'asdf', 'card_35916.png', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1),
(23, 1, 'mew doc', 'adhar card_76166.pdf', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1),
(24, 1, 'testing still', 'default_54291.jpeg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1),
(25, 5, 'Document', 'img_54001.jpeg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1),
(26, 1, 'temp doc', '3_50996.jpeg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `company_sites`
--

CREATE TABLE `company_sites` (
  `site_id` bigint(255) NOT NULL,
  `site_name` longtext DEFAULT NULL,
  `site_mobile` varchar(255) DEFAULT NULL,
  `site_address` longtext DEFAULT NULL,
  `longitude` varchar(255) DEFAULT NULL,
  `latitude` varchar(255) DEFAULT NULL,
  `created_at` text DEFAULT NULL,
  `updated_at` text DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `company_sites`
--

INSERT INTO `company_sites` (`site_id`, `site_name`, `site_mobile`, `site_address`, `longitude`, `latitude`, `created_at`, `updated_at`, `status`) VALUES
(7, 'ALChishty', '9096098787', 'Dubai', '9900', NULL, '2021-04-07 18:07:43', '2021-04-17 16:37:04', 0),
(8, 'Facebook', '987654321', 'England', '1234', '4321', '2021-04-07 18:10:23', '2021-04-07 18:46:26', 0),
(9, 'Dezine Edge', '0987654321', 'Roshan Function Hall', '0099', NULL, '2021-04-07 18:10:53', '2021-04-14 18:15:51', 1),
(11, 'dddd', '4', 'Arba', '9900', '0099', '2021-04-07 18:14:55', '2021-04-07 18:50:29', 1),
(16, 'QsM7Yq4BOW', '433258', 'MVy0SVQ3Gf', '720758', '379865', '2021-04-17 16:27:05', NULL, 1),
(17, 'gthjfgj', '786666667', 'ghfhdgjgh', '78657867', '768567865', '2021-04-17 16:27:55', NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `employee__bank`
--

CREATE TABLE `employee__bank` (
  `emp_bank_id` bigint(255) NOT NULL,
  `employee_id` bigint(255) NOT NULL,
  `bank_name` longtext DEFAULT NULL,
  `branch_name` longtext DEFAULT NULL,
  `account_name` longtext DEFAULT NULL,
  `account_number` varchar(255) DEFAULT NULL,
  `account_type` longtext DEFAULT NULL,
  `iban` longtext DEFAULT NULL,
  `swift` longtext DEFAULT NULL,
  `card_no` varchar(255) DEFAULT NULL,
  `bank_passbook_image` longtext DEFAULT NULL,
  `created_at` text DEFAULT NULL,
  `updated_at` text DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `employee__bank`
--

INSERT INTO `employee__bank` (`emp_bank_id`, `employee_id`, `bank_name`, `branch_name`, `account_name`, `account_number`, `account_type`, `iban`, `swift`, `card_no`, `bank_passbook_image`, `created_at`, `updated_at`, `status`) VALUES
(2, 17, 'sbi', 'a', 'a', 'a', 'a', 'a', 'a', 'a', NULL, NULL, '2021-04-13 17:12:39', 1),
(3, 17, 'icici', 'test', 'test', '121', 'test', 'test', 'rwat', '121', NULL, NULL, '2021-04-13 17:07:51', 1),
(4, 17, 'hello bank', 'test', 'test', '11', 'test', '11', '11', '11', NULL, NULL, '2021-04-13 17:12:04', 1),
(8, 16, 'asdf', '1Tgs7S7Wr7', 'Y1eS9z6cw6', '0KfYb8unNk', 'rEA5hEV0Gd', 'Bwv2RhYna0', '7hVbFrHtK8', 'MHiD8xuiS6', NULL, NULL, '2021-04-13 17:13:51', 1),
(9, 15, 'marathwada asdf asdf asdf asdf aadf sdf asdf ', 'cidco asfasdf asdfasdf asdfasdf asdfasdf asdf', 'saving', '3456576657', 'rfgdg', 'gsddffg', 'ghfdht', '7657', NULL, NULL, '2021-04-13 18:22:50', 1),
(10, 15, 'sbi', 'mondha', 'abrar', '6565464', 'savings', 'iban', 'swift', '212212212212', NULL, NULL, '2021-04-15 18:39:33', 1),
(11, 15, 'test 2', 'test 2', 'test 2', '11', 'test 2', 'test 2', 'test 2', '222', NULL, NULL, '2021-04-16 11:39:31', 1),
(12, 15, 'aaaaa', 'test', 'bSwKIGd9di', 'CMDIKUgLRa', 'gDSXUpuvse', '2nWw9Oa3tx', 'TpeSejs8vA', '6cRuHzc14t', NULL, NULL, '2021-04-16 11:40:29', 1),
(13, 15, 'sbi', 'qwer', 'qwer', 'qwre', 'wer', 'wer', 'wer', 'werrwer', NULL, NULL, '2021-04-16 11:43:44', 1),
(14, 19, 'sbi', 'mondha', 'cruo', '44564654564', 'savings', 'test', 'aaaaa', 'asdfdsf456456', NULL, NULL, '2021-04-16 16:06:31', 1);

-- --------------------------------------------------------

--
-- Table structure for table `employee__contact`
--

CREATE TABLE `employee__contact` (
  `contact_id` bigint(255) NOT NULL,
  `employee_id` bigint(255) NOT NULL,
  `contact_name` longtext DEFAULT NULL,
  `contact_relation` longtext DEFAULT NULL,
  `contact_number` bigint(255) DEFAULT NULL,
  `contact_address` longtext DEFAULT NULL,
  `created_at` text DEFAULT NULL,
  `updated_at` text DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `employee__contact`
--

INSERT INTO `employee__contact` (`contact_id`, `employee_id`, `contact_name`, `contact_relation`, `contact_number`, `contact_address`, `created_at`, `updated_at`, `status`) VALUES
(1, 15, 'habeeb', 'Dubai', 9096098163, 'Daman', '2021-04-13 17:20:20', '2021-04-14 11:53:37', 1),
(6, 15, 'habeeb Abdurrehman', 'Nandu', 9096098163, 'aaaaaaaaaaaa', '2021-04-13 19:46:41', '2021-04-16 16:21:58', 1),
(7, 15, 'My Name', 'From South African', 9096098163, 'kunj Kheda', '2021-04-14 11:51:13', '2021-04-14 11:52:26', 1);

-- --------------------------------------------------------

--
-- Table structure for table `employee__contact_details`
--

CREATE TABLE `employee__contact_details` (
  `emp_contact_detail_id` bigint(20) UNSIGNED NOT NULL,
  `employee_id` bigint(20) UNSIGNED NOT NULL,
  `emp_email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `emp_contact_no` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `emp_whatsapp_no` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `emp_imo_no` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `emp_facebook_id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `emp_permanent_contact_name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `emp_permanent_contact_no` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `emp_permanent_contact_relation` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `emp_uae_emerge_contact_no` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `emp_uae_emerge_contact_name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `emp_uae_contact_relation` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `emp_uae_permanent_address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `employee__designation`
--

CREATE TABLE `employee__designation` (
  `designation_id` bigint(255) NOT NULL,
  `designation_name` varchar(255) NOT NULL,
  `workshop_emp` text DEFAULT NULL,
  `working_site` text DEFAULT NULL,
  `emp_status` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` text NOT NULL,
  `deleted_at` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `employee__designation`
--

INSERT INTO `employee__designation` (`designation_id`, `designation_name`, `workshop_emp`, `working_site`, `emp_status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(3, 'ACCOUNTANT', '1', 'main_site', 1, '2021-03-23 10:24:02', '', NULL),
(4, 'TURNER', '1', 'main_site', 1, '2021-03-23 10:27:09', '', NULL),
(5, 'test', '1', 'main_site', 1, '2021-04-16 10:15:08', '', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `employee__documents`
--

CREATE TABLE `employee__documents` (
  `document_id` bigint(255) NOT NULL,
  `employee_id` bigint(255) NOT NULL,
  `document_category` text NOT NULL,
  `document_name` longtext NOT NULL,
  `attachment` varchar(255) DEFAULT NULL,
  `document_expiry` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` text DEFAULT NULL,
  `deleted_at` text DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `employee__documents`
--

INSERT INTO `employee__documents` (`document_id`, `employee_id`, `document_category`, `document_name`, `attachment`, `document_expiry`, `created_at`, `updated_at`, `deleted_at`, `status`) VALUES
(88, 16, 'Identity', 'ahgsadf', 'bonus-pdf-26-point-seo-checklist-for-new-websites-seo-audits_87395.pdf', '2021-04-13', '2021-04-13 13:20:52', NULL, NULL, 1),
(89, 15, 'Identity', 'other doc asdf asdf asdf adsf asdf asdf asf asdf ', 'DualSyscoAttendanceSheet_56426.xlsx', '2021-04-19', '2021-04-13 13:49:22', NULL, NULL, 1),
(91, 16, 'Identity', 'ghar ke paper', 'HTML5NotesForProfessionals_91530.pdf', '2021-04-18', '2021-04-16 08:44:53', NULL, NULL, 1),
(92, 17, 'Identity', 'abdurrahman ke paper', 'logo (1)_38819.png', '2021-04-18', '2021-04-16 08:47:51', NULL, NULL, 1),
(93, 17, 'Identity', 'abd', 'logo (1)_51587.png', '2021-04-25', '2021-04-16 08:53:38', NULL, NULL, 1),
(94, 15, 'Identity', 'qwerr', 'logo (1)_1171.png', '2021-04-25', '2021-04-16 08:58:49', NULL, NULL, 1),
(95, 15, 'Identity', 'aaaa', 'logo (1)_83328.png', '2021-04-17', '2021-04-16 09:03:03', NULL, NULL, 1),
(96, 15, 'Identity', 'abrar test doc', 'sample_80147.pdf', '2021-04-23', '2021-04-16 09:13:54', NULL, NULL, 1),
(97, 17, 'Identity', 'qqqqq', 'logo (1)_60299.png', '2021-04-29', '2021-04-16 09:14:18', NULL, NULL, 1),
(98, 17, 'Identity', 'ddddddddddd', 'logo (1)_63046.png', '2021-04-30', '2021-04-16 09:26:21', NULL, NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `employee__doc_cat`
--

CREATE TABLE `employee__doc_cat` (
  `category_id` bigint(255) NOT NULL,
  `category_name` longtext NOT NULL,
  `category_type` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `employee__doc_cat`
--

INSERT INTO `employee__doc_cat` (`category_id`, `category_name`, `category_type`) VALUES
(5, 'Identity', '');

-- --------------------------------------------------------

--
-- Table structure for table `employee__personal_detail`
--

CREATE TABLE `employee__personal_detail` (
  `employee_id` bigint(255) UNSIGNED NOT NULL,
  `employee_code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `employee_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `designation_id` bigint(20) NOT NULL,
  `designation` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `emp_profile_img` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `first_name` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `middle_name` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_name` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gender` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `birth_date` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nationality` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `marital_status` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `visa_Issued_from` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `passport_no` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `passport_date` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `passport_issue_place` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `passport_issue_date` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `passport_expiry_date` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `permanent_add_in_passport` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `father_name` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mother_name` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pp_personal_no` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nic_card_no` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nic_expiry` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `entry_permit_no` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `entry_permit_date` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `uid_no` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `file_no` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `profession_in_residence` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `residence_issude_date` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `residence_expiry_date` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `emirate_id_no` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `emirate_id_expiry` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `e_id_card_no` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `work_permit_no` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `personal_no` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `work_permit_expiry` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `blood_group` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `height` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `medical_issues` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `contact` bigint(255) DEFAULT NULL,
  `whatsapp_no` bigint(255) DEFAULT NULL,
  `imo_no` bigint(255) DEFAULT NULL,
  `facebook` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `permanent_contact_name` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `permanent_contact_no` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `permanent_contact_relation` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `uae_emergency_contact_name` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `uae_emergency_contact_no` bigint(255) DEFAULT NULL,
  `uae_emergency_contact_address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `updated_at` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` int(11) DEFAULT 1,
  `company_site` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `employee__personal_detail`
--

INSERT INTO `employee__personal_detail` (`employee_id`, `employee_code`, `employee_type`, `designation_id`, `designation`, `emp_profile_img`, `first_name`, `middle_name`, `last_name`, `gender`, `birth_date`, `nationality`, `marital_status`, `visa_Issued_from`, `passport_no`, `passport_date`, `passport_issue_place`, `passport_issue_date`, `passport_expiry_date`, `permanent_add_in_passport`, `father_name`, `mother_name`, `pp_personal_no`, `nic_card_no`, `nic_expiry`, `entry_permit_no`, `entry_permit_date`, `uid_no`, `file_no`, `profession_in_residence`, `residence_issude_date`, `residence_expiry_date`, `emirate_id_no`, `emirate_id_expiry`, `e_id_card_no`, `work_permit_no`, `personal_no`, `work_permit_expiry`, `blood_group`, `height`, `medical_issues`, `contact`, `whatsapp_no`, `imo_no`, `facebook`, `permanent_contact_name`, `permanent_contact_no`, `permanent_contact_relation`, `uae_emergency_contact_name`, `uae_emergency_contact_no`, `uae_emergency_contact_address`, `created_at`, `updated_at`, `date`, `status`, `company_site`, `email`, `password`) VALUES
(15, '121', 'Permanent', 1, 'SALES', '60783903a2f2b.png', 'Abrar', 'Akram', 'Shaikh', 'Male', '1984-03-30', 'India', 'unmarried', 'Mumbai', 'a1ww1w1w', NULL, 'aurangabad', '2021-01-14', '2021-04-19', 'dash colony', 'father', 'mum', '009684635', '3333', '2021-04-23', '111111111111', '2021-04-15', '665456', '78', 'web', '2021-04-17', '2021-04-19', '453632', '2021-03-19', '43255', '123123123123', '7685940343', '2021-04-20', 'B+', '6_feat', 'aaaaaaa', 5555555, 325345, 89787897, 'face', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-04-15 18:30:51', NULL, 1, 'main_site', 'check@gmail.com', '123456789'),
(16, '121', 'aa', 4, 'TURNER', NULL, 'Jaleel', 'asdf', 'MzZbZ0YTv6', 'Male', '2021-04-02', 'vPJ9BtAtok', 'married', 'bU6zrU3ItS', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL),
(17, '8899', 'Permanent', 4, 'TURNER', '607548186ed14.png', 'habeeb', 'Abdur', 'Abdurrehman', 'Male', '2021-04-01', 'INDIAN', 'unmarried', 'Dubai', 'u38839893', NULL, 'sharjah', '2021-04-02', '2021-04-07', 'Indian', 'Habeeb', 'Habeeb', '90909', '90909', '2021-04-24', '2121312121', '2021-04-14', '1212121212', '1212121212', '1jkjkjkjjkjjhkjk', '2021-04-22', '2021-04-09', '213213132131313', '2021-04-17', '31333231232131', '2313113', '1232311', '2021-04-30', 'O+', '6_feat', 'non', 328938192389183, 213131321, 123123213, '13123123', '12321313', '12312313', '3213123', '23131231123', 213123123123, '12321312312', NULL, '2021-04-13 12:58:24', NULL, 1, 'main_site', 'aadsadsdsa', '88998899'),
(18, '5432', 'abd', 3, 'ACCOUNTANT', '60768f6cdb7f9.png', 'Imran', 'abd', 'z', 'Male', '2021-04-18', 'indian', 'married', 'indian', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-04-14 12:15:00', NULL, 1, NULL, NULL, NULL),
(19, 'sdg', 'asdf', 3, 'ACCOUNTANT', '607964beccaaf.png', 'asdf', 'asf', 'asf', 'Male', '1990-01-01', 'asdf', 'unmarried', 'sdf', 'asdf', NULL, 'asdf', '2021-04-16', '2021-04-16', 'asdf', 'asdf', 'asdf', 'asdf', 'asdf', '2021-04-16', 'asdf', '2021-04-16', 'asdf', 'asdf', 'asdf', '2021-04-16', '2021-04-16', 'asdf', '2021-04-16', 'asdf', 'asdf', 'asdf', '2021-04-17', 'A+', '6_feat', 'no issue at all', 5454456465456, 345345, 3245, 'dasdasf', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-04-16 15:49:42', NULL, 1, 'main_site', '9175261798', '123456');

-- --------------------------------------------------------

--
-- Table structure for table `employee__role`
--

CREATE TABLE `employee__role` (
  `role_id` bigint(255) NOT NULL,
  `employee_id` bigint(255) DEFAULT NULL,
  `can_view` varchar(255) DEFAULT NULL,
  `can_create` varchar(255) DEFAULT NULL,
  `can_edit` varchar(255) DEFAULT NULL,
  `can_delete` varchar(255) DEFAULT NULL,
  `created_at` text DEFAULT NULL,
  `updated_at` text DEFAULT NULL,
  `deleted_at` text DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `employee__shift`
--

CREATE TABLE `employee__shift` (
  `shift_id` bigint(255) NOT NULL,
  `employee_id` bigint(255) NOT NULL,
  `shift_start` varchar(255) DEFAULT NULL,
  `shift_end` varchar(255) DEFAULT NULL,
  `break_start` varchar(255) DEFAULT NULL,
  `break_end` varchar(255) DEFAULT NULL,
  `shift_name` varchar(255) DEFAULT NULL,
  `shift_total_time` varchar(255) DEFAULT NULL,
  `break_total_time` varchar(255) DEFAULT NULL,
  `shift_date` text DEFAULT NULL,
  `created_at` text DEFAULT NULL,
  `updated_at` text DEFAULT NULL,
  `deleted_at` text DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `inventory__grade`
--

CREATE TABLE `inventory__grade` (
  `grade_id` bigint(255) NOT NULL,
  `grade_title` longtext DEFAULT NULL,
  `grade_description` longtext DEFAULT NULL,
  `created_at` text DEFAULT NULL,
  `updated_at` text DEFAULT NULL,
  `deleted_at` text DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `inventory__grade`
--

INSERT INTO `inventory__grade` (`grade_id`, `grade_title`, `grade_description`, `created_at`, `updated_at`, `deleted_at`, `status`) VALUES
(3, 'SS304', 'SS304', '2021-04-01 13:33:27', '2021-04-17 16:48:42', NULL, 1),
(4, 'EN24', 'EN24', '2021-04-01 13:33:40', NULL, NULL, 1),
(5, 'tryutu', 'yujyfg', '2021-04-17 16:48:06', NULL, NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `inventory__item`
--

CREATE TABLE `inventory__item` (
  `item_id` bigint(255) NOT NULL,
  `grade_id` bigint(255) DEFAULT NULL,
  `size_id` bigint(255) DEFAULT NULL,
  `item_title` longtext DEFAULT NULL,
  `item_description` longtext DEFAULT NULL,
  `item_material_type` longtext DEFAULT NULL,
  `item_material_form` longtext DEFAULT NULL,
  `item_price` varchar(255) DEFAULT NULL,
  `created_at` text DEFAULT NULL,
  `updated_at` text DEFAULT NULL,
  `deleted_at` text DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `inventory__item`
--

INSERT INTO `inventory__item` (`item_id`, `grade_id`, `size_id`, `item_title`, `item_description`, `item_material_type`, `item_material_form`, `item_price`, `created_at`, `updated_at`, `deleted_at`, `status`) VALUES
(2, 3, 3, 'chair', 'stting', 'iron', 'raw', '44.00', '2021-04-01 13:36:58', '2021-04-01 13:37:50', NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `inventory__size`
--

CREATE TABLE `inventory__size` (
  `size_id` bigint(255) NOT NULL,
  `size_title` longtext DEFAULT NULL,
  `size_description` longtext DEFAULT NULL,
  `created_at` text DEFAULT NULL,
  `updated_at` text DEFAULT NULL,
  `deleted_at` int(11) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `inventory__size`
--

INSERT INTO `inventory__size` (`size_id`, `size_title`, `size_description`, `created_at`, `updated_at`, `deleted_at`, `status`) VALUES
(4, 'tyrytu', 'ghjfffg', '2021-04-17 16:50:22', NULL, 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2020_12_10_080438_create_employee__personal_detail', 1),
(2, '2020_12_10_081302_create_employee__bank', 1),
(3, '2020_12_17_092156_create_employee__contact_details_table', 2);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `order_id` bigint(255) NOT NULL,
  `client_id` bigint(255) DEFAULT NULL,
  `employee_id` bigint(255) DEFAULT NULL,
  `order_cat_id` bigint(255) DEFAULT NULL,
  `order_title` varchar(255) DEFAULT NULL,
  `order_description` varchar(255) DEFAULT NULL,
  `item_rate` varchar(255) DEFAULT NULL,
  `order_total` varchar(255) DEFAULT NULL,
  `created_at` text DEFAULT NULL,
  `updated_at` text DEFAULT NULL,
  `deleted_at` text DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `orders__items`
--

CREATE TABLE `orders__items` (
  `item_id` bigint(255) NOT NULL,
  `item_title` longtext DEFAULT NULL,
  `item_cat_id` bigint(255) NOT NULL,
  `item_price` varchar(255) DEFAULT NULL,
  `order_id` bigint(255) DEFAULT NULL,
  `created_at` text DEFAULT NULL,
  `updated_at` text DEFAULT NULL,
  `deleted_at` text DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `purchase`
--

CREATE TABLE `purchase` (
  `purchase_id` bigint(255) NOT NULL,
  `order_id` bigint(255) NOT NULL,
  `order_item_id` bigint(255) NOT NULL,
  `vendor_id` bigint(255) NOT NULL,
  `purchase_bill_no` varchar(255) DEFAULT NULL,
  `purchase_description` longtext DEFAULT NULL,
  `purchase_quantity` varchar(255) DEFAULT NULL,
  `purchase_rate` bigint(255) DEFAULT NULL,
  `purchase_total` bigint(255) DEFAULT NULL,
  `created_at` text DEFAULT NULL,
  `updated_at` text DEFAULT NULL,
  `deleted_at` text DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `purchase`
--

INSERT INTO `purchase` (`purchase_id`, `order_id`, `order_item_id`, `vendor_id`, `purchase_bill_no`, `purchase_description`, `purchase_quantity`, `purchase_rate`, `purchase_total`, `created_at`, `updated_at`, `deleted_at`, `status`) VALUES
(3, 1, 0, 1, '9090', 'This is a discription', '12', 80, 999000, '2021-04-09 11:50:54', '2021-04-17 13:12:18', NULL, 1),
(5, 1, 0, 1, '465546435', 'The Description', '23423453', 4567, 67777867, '2021-04-16 13:43:53', '2021-04-17 13:05:02', NULL, 1),
(6, 1, 0, 4, '1234', 'Subject', '3453', 6787, 76876, '2021-04-16 13:54:13', '2021-04-17 13:05:35', NULL, 1),
(7, 1, 0, 1, 'V1rXoDrRIh', 'sX7OhchfGO', '23432', 423163, 231475, '2021-04-17 15:06:06', NULL, NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `sales_order`
--

CREATE TABLE `sales_order` (
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
-- Dumping data for table `sales_order`
--

INSERT INTO `sales_order` (`sales_order_id`, `sales_mode`, `customer_id`, `booked_by_id`, `sales_order_date`, `sales_person_name`, `sales_person_number`, `sales_receiving_date`, `sales_delivery_date`, `sales_lpo`, `sales_focus_so`, `sales_order_subject`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(3, 'Credit', 4, 1, '2021-04-03', 'asdf', '23542', '2021-04-02', '2021-04-03', 'qwer', 'qwer', 'wqer', 3, '2021-04-10 16:55:18', '2021-04-19 18:08:17', NULL),
(5, 'Cash', 1, 3, '2021-04-03', 'Habeeb', '9009090909', '0090-09-09', '2021-04-23', '90.09', '12.3', 'subject', 1, '2021-04-12 11:34:25', '2021-04-16 14:01:47', NULL),
(6, 'Cash', 3, 1, '2021-04-01', 'hdhj', '9090909090', '2021-04-23', '2021-04-29', '9090', '8989', 'kjskjkajs', 1, '2021-04-12 13:06:58', '2021-04-12 13:11:05', NULL),
(7, 'Cash', 3, 3, '2021-04-03', 'asasas', '32323232', '2021-04-23', '2021-04-09', '233333', '32222', '23333333333', 1, '2021-04-12 15:32:58', NULL, NULL),
(8, 'Credit', 1, 1, '2021-04-10', 'Nandu', '9096098163', '2021-05-01', '0009-09-09', '90', '090', 'Hello From', 1, '2021-04-12 15:34:18', '2021-04-16 12:28:02', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `sales__inquiry`
--

CREATE TABLE `sales__inquiry` (
  `inquiry_id` bigint(255) NOT NULL,
  `inquiry_date` text DEFAULT NULL,
  `inquiry_response_date` text DEFAULT NULL,
  `client_id` bigint(255) NOT NULL,
  `inquiry_person` longtext DEFAULT NULL,
  `inquiry_person_mobile` bigint(255) DEFAULT NULL,
  `inquiry_person_email` varchar(255) DEFAULT NULL,
  `inquiry_channel` varchar(255) DEFAULT NULL,
  `inquiry_no` varchar(255) DEFAULT NULL,
  `employee_id` bigint(255) NOT NULL,
  `inquiry_subject` longtext DEFAULT NULL,
  `inquiry_note` longtext DEFAULT NULL,
  `created_at` text DEFAULT NULL,
  `updated_at` text DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sales__inquiry`
--

INSERT INTO `sales__inquiry` (`inquiry_id`, `inquiry_date`, `inquiry_response_date`, `client_id`, `inquiry_person`, `inquiry_person_mobile`, `inquiry_person_email`, `inquiry_channel`, `inquiry_no`, `employee_id`, `inquiry_subject`, `inquiry_note`, `created_at`, `updated_at`, `status`) VALUES
(1, '2021-04-20', '2021-04-30', 1, 'james', 9876543210, 'james@gmail.com', 'Manual', '212', 12, 'test', 'test note', '2021-04-19', NULL, 1),
(7, '2021-04-20', '2021-04-20', 0, 'abdull21432', 7085744772, 'enwJ2aO0P2', 'QkKUZjMntl', 'dVHMd70Te6', 0, 'mg9s6j1q3J', 'xadh21MgBC', NULL, NULL, 1),
(8, '2021-04-20', '2021-04-20', 0, 'kyEgw5pNIw', 6892690976, '3t2DM1ipTq', 'Y7dNqP137f', 'lwX8WNW7C7', 0, 'lA8T7jVs4z', '5UqUCyk4BF', NULL, NULL, 1),
(9, '2021-04-20', '2021-04-20', 0, 'HGyt66ArGR', 821589267, 'PeisWdS2bw', 'jyR3AKiP5a', 'CzNl9sfSEn', 0, 'njgMWv0TMX', 'YtRJbou80G', NULL, NULL, 1),
(10, '2021-04-20', '2021-04-20', 0, 'abbbb', 8616772095, 'AzNvAgXhO3', 'KzPMncOY13', 'lzptHr4wkU', 0, 'Y3RZaZUWhc', '5JXsgrNKYl', NULL, NULL, 1),
(11, '2021-04-20', '2021-04-20', 0, 'abdc', 2938679945, 'ixvNyfZ1vc', 't01uJXBNsC', 'HPxnqFVPWx', 0, 'N2vVm3u364', '1K4zhZlXtj', '2021-04-20 12:11:40', NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `sales__inquiry_attachments`
--

CREATE TABLE `sales__inquiry_attachments` (
  `attachment_id` bigint(255) NOT NULL,
  `inquiry_id` bigint(255) NOT NULL,
  `attachment_file` longtext DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `sales__inquiry_item`
--

CREATE TABLE `sales__inquiry_item` (
  `item_id` bigint(255) NOT NULL,
  `inquiry_id` bigint(255) NOT NULL,
  `item_description` longtext DEFAULT NULL,
  `item_quantity` varchar(255) DEFAULT NULL,
  `uom_id` bigint(255) DEFAULT NULL,
  `item_note` longtext DEFAULT NULL,
  `created_at` text DEFAULT NULL,
  `updated_at` text DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sales__inquiry_item`
--

INSERT INTO `sales__inquiry_item` (`item_id`, `inquiry_id`, `item_description`, `item_quantity`, `uom_id`, `item_note`, `created_at`, `updated_at`, `status`) VALUES
(1, 1, 'hello', '10', 1, 'hell bro', '2021-04-19', NULL, 2);

-- --------------------------------------------------------

--
-- Table structure for table `sales__inquiry_item_attachments`
--

CREATE TABLE `sales__inquiry_item_attachments` (
  `attachment_id` bigint(255) NOT NULL,
  `attachment_file` longtext DEFAULT NULL,
  `item_id` bigint(255) NOT NULL,
  `inquiry_id` bigint(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `setup__department`
--

CREATE TABLE `setup__department` (
  `department_id` bigint(255) NOT NULL,
  `department_name` longtext DEFAULT NULL,
  `department_code` longtext DEFAULT NULL,
  `department_location` longtext DEFAULT NULL,
  `department_decription` longtext DEFAULT NULL,
  `department_supervised_by` bigint(255) NOT NULL,
  `exclude_from_floor_load` int(11) NOT NULL DEFAULT 1,
  `company_site` varchar(255) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `created_at` text DEFAULT NULL,
  `updated_at` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `setup__department`
--

INSERT INTO `setup__department` (`department_id`, `department_name`, `department_code`, `department_location`, `department_decription`, `department_supervised_by`, `exclude_from_floor_load`, `company_site`, `status`, `created_at`, `updated_at`) VALUES
(8, 'Hab', '404', 'Zameen', 'Description', 17, 0, 'customer_site', 0, '2021-04-16 12:24:40', '2021-04-16 12:26:07'),
(9, 'name', 'code', 'location', 'description', 15, 0, 'main_site', 0, '2021-04-16 12:36:18', '2021-04-16 12:36:31'),
(10, 'fgdsgffg', '4576', 'rtyhfthgdfg', 'rtyhrtyhdfr', 17, 1, 'main_site', 2021, '2021-04-17 16:42:54', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `setup__machine`
--

CREATE TABLE `setup__machine` (
  `machine_id` bigint(255) NOT NULL,
  `machine_name` longtext DEFAULT NULL,
  `machine_code` longtext DEFAULT NULL,
  `machine_title` longtext DEFAULT NULL,
  `machine_make` longtext DEFAULT NULL,
  `machine_model` varchar(255) DEFAULT NULL,
  `machine_description` longtext DEFAULT NULL,
  `machine_hour_rate` longtext DEFAULT NULL,
  `department_id` bigint(255) NOT NULL,
  `company_site` varchar(255) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `created_at` text DEFAULT NULL,
  `updated_at` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `setup__machine`
--

INSERT INTO `setup__machine` (`machine_id`, `machine_name`, `machine_code`, `machine_title`, `machine_make`, `machine_model`, `machine_description`, `machine_hour_rate`, `department_id`, `company_site`, `status`, `created_at`, `updated_at`) VALUES
(4, 'gfdhgrty', '565456', 'gfdfgf', 'fgdhg', 'gfhddg', 'ghfdgh', 'errrwtrewrt', 9, 'main_site', 1, '2021-04-17 16:44:46', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `setup__operation`
--

CREATE TABLE `setup__operation` (
  `operation_id` bigint(255) NOT NULL,
  `operation_name` longtext DEFAULT NULL,
  `operation_code` longtext DEFAULT NULL,
  `operation_title` longtext DEFAULT NULL,
  `operation_description` longtext DEFAULT NULL,
  `operation_hour_rate` varchar(255) DEFAULT NULL,
  `company_site` varchar(255) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `created_at` text DEFAULT NULL,
  `updated_at` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `setup__operation`
--

INSERT INTO `setup__operation` (`operation_id`, `operation_name`, `operation_code`, `operation_title`, `operation_description`, `operation_hour_rate`, `company_site`, `status`, `created_at`, `updated_at`) VALUES
(4, 'yytuty', '768567', 'ytruy', 'fghjgyhj', 'yturtyu', 'main_site', 1, '2021-04-17 16:40:33', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `setup__shift`
--

CREATE TABLE `setup__shift` (
  `shift_id` bigint(255) NOT NULL,
  `shift_name` varchar(255) DEFAULT NULL,
  `shift_start` varchar(255) DEFAULT NULL,
  `shift_end` varchar(255) DEFAULT NULL,
  `company_site` varchar(255) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `created_at` text DEFAULT NULL,
  `updated_at` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `setup__shift`
--

INSERT INTO `setup__shift` (`shift_id`, `shift_name`, `shift_start`, `shift_end`, `company_site`, `status`, `created_at`, `updated_at`) VALUES
(4, NULL, '05:45', '04:51', 'main_site', 1, '2021-04-17 16:46:21', '2021-04-17 16:47:32'),
(5, NULL, '16:46', '04:46', 'main_site', 1, '2021-04-17 16:46:41', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `setup__uom`
--

CREATE TABLE `setup__uom` (
  `uom_id` bigint(255) NOT NULL,
  `uom_name` longtext DEFAULT NULL,
  `uom_code` longtext DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `created_at` text DEFAULT NULL,
  `updated_at` text DEFAULT NULL,
  `deleted_at` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `setup__uom`
--

INSERT INTO `setup__uom` (`uom_id`, `uom_name`, `uom_code`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'james', '123123', 1, '2021-03-30 11:31:18', '2021-03-30 12:54:06', NULL),
(4, 'hello tunes', '23233', 1, '2021-03-30 12:56:43', NULL, NULL),
(6, 'jklhjkl', '7895689', 1, '2021-04-17 16:39:00', '2021-04-17 16:39:49', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(255) NOT NULL,
  `type_id` bigint(255) NOT NULL,
  `user_type` varchar(50) NOT NULL,
  `user_name` text NOT NULL,
  `user_email` varchar(255) DEFAULT NULL,
  `user_password` varchar(255) DEFAULT NULL,
  `created_at` text DEFAULT NULL,
  `updated_at` text DEFAULT NULL,
  `deleted_at` text DEFAULT NULL,
  `date` text DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `type_id`, `user_type`, `user_name`, `user_email`, `user_password`, `created_at`, `updated_at`, `deleted_at`, `date`, `status`) VALUES
(1, 1, 'admin', 'Bilal Shaikh', 'bilal@gmail.com', 'pass', '2020-11-24 14:48:03', '2020-11-24 12:49:07', NULL, NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `users__type`
--

CREATE TABLE `users__type` (
  `type_id` bigint(255) NOT NULL,
  `user_type` varchar(50) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users__type`
--

INSERT INTO `users__type` (`type_id`, `user_type`, `created_at`) VALUES
(1, 'Admin', '2020-11-24 07:02:29'),
(2, 'Master Admin', '2020-11-24 07:02:29');

-- --------------------------------------------------------

--
-- Table structure for table `visitor__attachments`
--

CREATE TABLE `visitor__attachments` (
  `attachment_id` bigint(255) NOT NULL,
  `visitor_id` bigint(255) NOT NULL,
  `attachment_file` longtext DEFAULT NULL,
  `created_at` text DEFAULT NULL,
  `updated_at` text DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `visitor__attachments`
--

INSERT INTO `visitor__attachments` (`attachment_id`, `visitor_id`, `attachment_file`, `created_at`, `updated_at`, `status`) VALUES
(10, 8, 'notes_80376076bb0f3b682.txt', '2021-04-14 15:21:11', NULL, 1),
(14, 10, 'icons8-lease-100_9882607ad79b3f34a.png', '2021-04-17 18:12:03', NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `visitor__log`
--

CREATE TABLE `visitor__log` (
  `visitor_id` bigint(255) NOT NULL,
  `visitor_type` longtext DEFAULT NULL,
  `visit_time` text DEFAULT NULL,
  `client_id` bigint(255) DEFAULT NULL,
  `visitor_name` longtext DEFAULT NULL,
  `visitor_mobile` bigint(255) DEFAULT NULL,
  `employee_id` bigint(255) DEFAULT NULL,
  `visitor_purpose` varchar(255) DEFAULT NULL,
  `visitor_note` longtext DEFAULT NULL,
  `visitor_attachement_id` bigint(255) DEFAULT NULL,
  `date_now` text DEFAULT NULL,
  `created_at` text DEFAULT NULL,
  `updated_at` text DEFAULT NULL,
  `deleted_at` text DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `visitor__log`
--

INSERT INTO `visitor__log` (`visitor_id`, `visitor_type`, `visit_time`, `client_id`, `visitor_name`, `visitor_mobile`, `employee_id`, `visitor_purpose`, `visitor_note`, `visitor_attachement_id`, `date_now`, `created_at`, `updated_at`, `deleted_at`, `status`) VALUES
(7, 'Visitor', '2021-04-14T15:17', 3, 'Ve94cKtCMn', 564858, 18, 'OpTOP4fvJG', 'no8LPfa6YW', NULL, '2021-04-14', '2021-04-14 15:18:03', '2021-04-14 15:21:49', NULL, 1),
(8, 'Call', '2021-04-05T14:54', 1, 'O3CmSyFWgm', 800248, 15, 'iyU88sOUwm', 'BWSkhWSsEk', NULL, '2021-04-14', '2021-04-14 15:21:11', NULL, NULL, 1),
(9, 'Call', '2021-04-05T14:54', 1, 'PlcD2GyMTz', 540654, 17, 'TMi4JD616P', 'VScWueGFwm', NULL, '2021-04-14', '2021-04-14 16:12:21', NULL, NULL, 1),
(10, 'Visitor', '2021-05-09T18:14', 3, '8768678', 5675786, 19, '768657', 'yuiuy', NULL, '2021-04-17', '2021-04-17 18:12:03', NULL, NULL, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `client`
--
ALTER TABLE `client`
  ADD PRIMARY KEY (`client_id`);

--
-- Indexes for table `client__bank`
--
ALTER TABLE `client__bank`
  ADD PRIMARY KEY (`bank_id`);

--
-- Indexes for table `client__contact`
--
ALTER TABLE `client__contact`
  ADD PRIMARY KEY (`contact_id`);

--
-- Indexes for table `client__document`
--
ALTER TABLE `client__document`
  ADD PRIMARY KEY (`document_id`);

--
-- Indexes for table `company_sites`
--
ALTER TABLE `company_sites`
  ADD PRIMARY KEY (`site_id`);

--
-- Indexes for table `employee__bank`
--
ALTER TABLE `employee__bank`
  ADD PRIMARY KEY (`emp_bank_id`);

--
-- Indexes for table `employee__contact`
--
ALTER TABLE `employee__contact`
  ADD PRIMARY KEY (`contact_id`);

--
-- Indexes for table `employee__contact_details`
--
ALTER TABLE `employee__contact_details`
  ADD PRIMARY KEY (`emp_contact_detail_id`),
  ADD KEY `employee__contact_details_employee_id_foreign` (`employee_id`);

--
-- Indexes for table `employee__designation`
--
ALTER TABLE `employee__designation`
  ADD PRIMARY KEY (`designation_id`);

--
-- Indexes for table `employee__documents`
--
ALTER TABLE `employee__documents`
  ADD PRIMARY KEY (`document_id`);

--
-- Indexes for table `employee__doc_cat`
--
ALTER TABLE `employee__doc_cat`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `employee__personal_detail`
--
ALTER TABLE `employee__personal_detail`
  ADD PRIMARY KEY (`employee_id`);

--
-- Indexes for table `employee__role`
--
ALTER TABLE `employee__role`
  ADD PRIMARY KEY (`role_id`);

--
-- Indexes for table `employee__shift`
--
ALTER TABLE `employee__shift`
  ADD PRIMARY KEY (`shift_id`);

--
-- Indexes for table `inventory__grade`
--
ALTER TABLE `inventory__grade`
  ADD PRIMARY KEY (`grade_id`);

--
-- Indexes for table `inventory__item`
--
ALTER TABLE `inventory__item`
  ADD PRIMARY KEY (`item_id`);

--
-- Indexes for table `inventory__size`
--
ALTER TABLE `inventory__size`
  ADD PRIMARY KEY (`size_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `orders__items`
--
ALTER TABLE `orders__items`
  ADD PRIMARY KEY (`item_id`);

--
-- Indexes for table `purchase`
--
ALTER TABLE `purchase`
  ADD PRIMARY KEY (`purchase_id`);

--
-- Indexes for table `sales_order`
--
ALTER TABLE `sales_order`
  ADD PRIMARY KEY (`sales_order_id`);

--
-- Indexes for table `sales__inquiry`
--
ALTER TABLE `sales__inquiry`
  ADD PRIMARY KEY (`inquiry_id`);

--
-- Indexes for table `sales__inquiry_attachments`
--
ALTER TABLE `sales__inquiry_attachments`
  ADD PRIMARY KEY (`attachment_id`);

--
-- Indexes for table `sales__inquiry_item`
--
ALTER TABLE `sales__inquiry_item`
  ADD PRIMARY KEY (`item_id`);

--
-- Indexes for table `sales__inquiry_item_attachments`
--
ALTER TABLE `sales__inquiry_item_attachments`
  ADD PRIMARY KEY (`attachment_id`);

--
-- Indexes for table `setup__department`
--
ALTER TABLE `setup__department`
  ADD PRIMARY KEY (`department_id`);

--
-- Indexes for table `setup__machine`
--
ALTER TABLE `setup__machine`
  ADD PRIMARY KEY (`machine_id`);

--
-- Indexes for table `setup__operation`
--
ALTER TABLE `setup__operation`
  ADD PRIMARY KEY (`operation_id`);

--
-- Indexes for table `setup__shift`
--
ALTER TABLE `setup__shift`
  ADD PRIMARY KEY (`shift_id`);

--
-- Indexes for table `setup__uom`
--
ALTER TABLE `setup__uom`
  ADD PRIMARY KEY (`uom_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `visitor__attachments`
--
ALTER TABLE `visitor__attachments`
  ADD PRIMARY KEY (`attachment_id`);

--
-- Indexes for table `visitor__log`
--
ALTER TABLE `visitor__log`
  ADD PRIMARY KEY (`visitor_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `client`
--
ALTER TABLE `client`
  MODIFY `client_id` bigint(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `client__bank`
--
ALTER TABLE `client__bank`
  MODIFY `bank_id` bigint(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `client__contact`
--
ALTER TABLE `client__contact`
  MODIFY `contact_id` bigint(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `client__document`
--
ALTER TABLE `client__document`
  MODIFY `document_id` bigint(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `company_sites`
--
ALTER TABLE `company_sites`
  MODIFY `site_id` bigint(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `employee__bank`
--
ALTER TABLE `employee__bank`
  MODIFY `emp_bank_id` bigint(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `employee__contact`
--
ALTER TABLE `employee__contact`
  MODIFY `contact_id` bigint(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `employee__contact_details`
--
ALTER TABLE `employee__contact_details`
  MODIFY `emp_contact_detail_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `employee__designation`
--
ALTER TABLE `employee__designation`
  MODIFY `designation_id` bigint(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `employee__documents`
--
ALTER TABLE `employee__documents`
  MODIFY `document_id` bigint(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=99;

--
-- AUTO_INCREMENT for table `employee__doc_cat`
--
ALTER TABLE `employee__doc_cat`
  MODIFY `category_id` bigint(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `employee__personal_detail`
--
ALTER TABLE `employee__personal_detail`
  MODIFY `employee_id` bigint(255) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `employee__role`
--
ALTER TABLE `employee__role`
  MODIFY `role_id` bigint(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `employee__shift`
--
ALTER TABLE `employee__shift`
  MODIFY `shift_id` bigint(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `inventory__grade`
--
ALTER TABLE `inventory__grade`
  MODIFY `grade_id` bigint(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `inventory__item`
--
ALTER TABLE `inventory__item`
  MODIFY `item_id` bigint(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `inventory__size`
--
ALTER TABLE `inventory__size`
  MODIFY `size_id` bigint(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` bigint(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `orders__items`
--
ALTER TABLE `orders__items`
  MODIFY `item_id` bigint(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `purchase`
--
ALTER TABLE `purchase`
  MODIFY `purchase_id` bigint(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `sales_order`
--
ALTER TABLE `sales_order`
  MODIFY `sales_order_id` bigint(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `sales__inquiry`
--
ALTER TABLE `sales__inquiry`
  MODIFY `inquiry_id` bigint(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `sales__inquiry_attachments`
--
ALTER TABLE `sales__inquiry_attachments`
  MODIFY `attachment_id` bigint(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sales__inquiry_item`
--
ALTER TABLE `sales__inquiry_item`
  MODIFY `item_id` bigint(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `sales__inquiry_item_attachments`
--
ALTER TABLE `sales__inquiry_item_attachments`
  MODIFY `attachment_id` bigint(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `setup__department`
--
ALTER TABLE `setup__department`
  MODIFY `department_id` bigint(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `setup__machine`
--
ALTER TABLE `setup__machine`
  MODIFY `machine_id` bigint(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `setup__operation`
--
ALTER TABLE `setup__operation`
  MODIFY `operation_id` bigint(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `setup__shift`
--
ALTER TABLE `setup__shift`
  MODIFY `shift_id` bigint(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `setup__uom`
--
ALTER TABLE `setup__uom`
  MODIFY `uom_id` bigint(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `visitor__attachments`
--
ALTER TABLE `visitor__attachments`
  MODIFY `attachment_id` bigint(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `visitor__log`
--
ALTER TABLE `visitor__log`
  MODIFY `visitor_id` bigint(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `employee__contact_details`
--
ALTER TABLE `employee__contact_details`
  ADD CONSTRAINT `employee__contact_details_employee_id_foreign` FOREIGN KEY (`employee_id`) REFERENCES `employee__personal_detail` (`employee_id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
