-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Sep 28, 2024 at 06:12 PM
-- Server version: 10.11.8-MariaDB-cll-lve
-- PHP Version: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `u294306328_newsite`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `created_at`, `updated_at`) VALUES
(5, 'Outwear', '2023-03-22 15:58:32', '2023-05-21 03:58:08'),
(6, 'Children', '2023-03-22 15:58:32', '2023-03-22 15:58:32'),
(7, 'Accessories & Homewear', '2023-03-22 15:58:32', '2023-03-22 15:58:32'),
(8, 'Bed Sheets', '2023-03-22 15:58:32', '2023-03-22 15:58:32'),
(9, 'Duvet Covers', '2023-03-22 15:58:32', '2023-03-22 15:58:32'),
(10, 'Pillow Cases & Cushion Covers', '2023-03-22 15:58:32', '2023-03-22 15:58:32'),
(11, 'Bathroom Items', '2023-03-22 15:58:32', '2023-03-22 15:58:32'),
(12, 'Kitchen Items', '2023-03-22 15:58:32', '2023-03-22 15:58:32'),
(13, 'Suits', '2023-03-22 15:58:32', '2023-03-22 15:58:32'),
(14, 'Dresses & Blouses', '2023-03-22 15:58:32', '2023-03-22 15:58:32'),
(15, 'Duvets', '2023-03-22 15:58:32', '2023-03-22 15:58:32'),
(16, 'Blankets', '2023-03-22 15:58:32', '2023-03-22 15:58:32'),
(17, 'Throws', '2023-03-22 15:58:32', '2023-03-22 15:58:32'),
(18, 'Curtains', '2023-03-22 15:58:32', '2023-03-22 15:58:32'),
(19, 'Sofa & Cushion Covers', '2023-03-22 15:58:32', '2023-03-22 15:58:32'),
(20, 'Shirts', '2023-03-22 15:58:32', '2023-03-22 15:58:32'),
(21, 'Specialist', '2023-03-22 15:58:32', '2023-03-22 15:58:32');

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `phone_no` varchar(255) DEFAULT NULL,
  `user_type` varchar(255) DEFAULT NULL,
  `address` varchar(500) DEFAULT NULL,
  `address_1` varchar(500) DEFAULT NULL,
  `city` varchar(255) DEFAULT NULL,
  `postcode` varchar(255) DEFAULT NULL,
  `card_details` varchar(1000) DEFAULT NULL,
  `cards` varchar(10000) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `user_id`, `phone_no`, `user_type`, `address`, `address_1`, `city`, `postcode`, `card_details`, `cards`, `created_at`, `updated_at`) VALUES
(2, 2, '1234567890', 'individual', 'sa', 'd', NULL, 'kt11 2lw', NULL, NULL, '2023-05-11 19:14:19', '2023-05-11 19:15:13'),
(3, 17, '1234567890', 'individual', 'ygyugfgdf', 'YUUGUdsf', NULL, 'KT11', NULL, NULL, '2023-05-24 00:19:27', '2023-05-24 07:28:54'),
(4, 13, '1234567899', 'individual', 'Surat', 'Udhana', NULL, '425252', NULL, NULL, '2024-01-22 02:30:15', '2024-02-12 06:35:54'),
(15, 27, '7412589632', 'company', 'mumbai', 'dubai', NULL, '859654', NULL, NULL, '2024-01-22 07:20:43', '2024-01-22 07:21:18'),
(16, 28, '7458965874', 'individual', 'surat', 'test', NULL, '44456464', NULL, NULL, '2024-01-22 07:28:18', '2024-01-22 07:28:43'),
(17, 29, '7412589632', 'individual', 'dfafdasfdas', 'dsfafd', NULL, '4646', NULL, NULL, '2024-01-22 07:30:10', '2024-01-22 07:30:34'),
(18, 30, '4569874569', 'individual', 'suray', 'indoe', NULL, '458965', NULL, NULL, '2024-01-22 07:31:41', '2024-01-22 09:05:20'),
(19, 30, '4569874569', 'individual', 'suray', 'indoe', NULL, '458965', NULL, NULL, '2024-01-22 09:00:36', '2024-01-22 09:00:36'),
(21, 31, '1236547896', 'company', 'surat', 'inore', NULL, '123456', NULL, NULL, '2024-01-22 09:09:01', '2024-01-22 09:09:34'),
(22, 30, '4569874569', 'individual', 'suray', 'indoe', NULL, '458965', NULL, NULL, '2024-01-22 09:21:47', '2024-01-22 09:21:47'),
(23, 30, '4569874569', 'individual', 'suray', 'indoe', NULL, '458965', NULL, NULL, '2024-01-22 09:22:24', '2024-01-22 09:22:24'),
(24, 30, '4569874569', 'individual', 'suray', 'indoe', NULL, '458965', NULL, NULL, '2024-01-22 09:22:53', '2024-01-22 09:22:53'),
(25, 32, '9876543212', 'individual', 'mumbai', 'surat', NULL, '362545', NULL, NULL, '2024-01-22 23:34:19', '2024-01-22 23:38:04'),
(26, 32, '9876543212', 'individual', 'mumbai', 'surat', NULL, '362545', NULL, NULL, '2024-01-22 23:35:58', '2024-01-22 23:35:58'),
(27, 33, 'hiudsfhuifhsdihfsdiuhfih', 'company', 'yyyyuu', 'uihihikjjjjjjjj', NULL, '5644645', NULL, NULL, '2024-01-22 23:53:25', '2024-01-22 23:54:31'),
(28, 34, '9632587412', 'company', '679, gandi deghd', 'vgd dgud', NULL, '394210', NULL, NULL, '2024-01-22 23:58:54', '2024-01-23 00:02:53'),
(29, 34, '9632587412', 'company', '679, gandi deghd', 'vgd dgud', NULL, '394210', NULL, NULL, '2024-01-23 00:02:20', '2024-01-23 00:02:20'),
(30, 45, '7412589632', 'individual', 'surat', 'inoder', NULL, '987654', NULL, NULL, '2024-01-23 00:42:15', '2024-01-23 00:42:15'),
(31, 46, '1236547896', 'company', 'surat', 'ndpdp', NULL, '789654', NULL, NULL, '2024-01-23 00:44:05', '2024-01-23 06:41:56'),
(32, 48, '1234569874', 'individual', '70, hetsj mall , surat', '88, bhahi bhal, mumbai', NULL, '394210', NULL, NULL, '2024-01-24 00:43:26', '2024-01-24 00:44:17'),
(33, 49, '7894561232', 'company', '88, bendhi hai lall dubai', '77, huballa abu', NULL, '369852', NULL, NULL, '2024-01-25 00:00:45', '2024-01-25 00:05:14'),
(34, 49, '7894561232', 'company', '88, bendhi hai lall dubai', '77, huballa abu', NULL, '369852', NULL, NULL, '2024-01-25 00:04:00', '2024-01-25 00:04:00'),
(35, 50, '7896541232', 'individual', 'Surat', 'inore', NULL, '741258', NULL, NULL, '2024-01-25 01:48:19', '2024-01-25 01:49:24'),
(36, 51, 'asdsad', 'company', 'asdasd', 'asdsa', NULL, 'sadasdasd', NULL, NULL, '2024-01-26 11:20:02', '2024-01-26 11:21:54'),
(37, 52, '07862214917', 'individual', '17 Anyards Road', 'Cobham', NULL, 'kt11 2lw', '{\"id\":\"cus_PwwSKb3A52imlZ\",\"object\":\"customer\",\"address\":null,\"balance\":0,\"created\":1713475965,\"currency\":null,\"default_source\":\"card_1P72ZUEoWO9T9v9OTme4sYjv\",\"delinquent\":false,\"description\":null,\"discount\":null,\"email\":null,\"invoice_prefix\":\"ACA477D8\",\"invoice_settings\":{\"custom_fields\":null,\"default_payment_method\":null,\"footer\":null,\"rendering_options\":null},\"livemode\":false,\"metadata\":[],\"name\":\"BIlal Tahir\",\"next_invoice_sequence\":1,\"phone\":null,\"preferred_locales\":[],\"shipping\":null,\"tax_exempt\":\"none\",\"test_clock\":null}', '{\"id\":\"card_1P72ZUEoWO9T9v9OTme4sYjv\",\"object\":\"card\",\"address_city\":null,\"address_country\":null,\"address_line1\":null,\"address_line1_check\":null,\"address_line2\":null,\"address_state\":null,\"address_zip\":null,\"address_zip_check\":null,\"brand\":\"Visa\",\"country\":\"US\",\"customer\":\"cus_PwwSKb3A52imlZ\",\"cvc_check\":\"pass\",\"dynamic_last4\":null,\"exp_month\":12,\"exp_year\":2025,\"fingerprint\":\"jsKi0sOkZUzj6lNZ\",\"funding\":\"credit\",\"last4\":\"4242\",\"metadata\":{},\"name\":null,\"tokenization_method\":null,\"wallet\":null}', '2024-01-29 18:19:09', '2024-09-19 09:09:20'),
(38, 52, '07862214917', 'individual', '79', 'CHESTNUT GROVE', NULL, 'KT11 2LW', NULL, NULL, '2024-01-29 18:21:39', '2024-01-29 18:21:39'),
(39, 53, '07862214917', 'individual', '79 Chestnut Grove', 'New malden', NULL, 'KT3 3JS', NULL, NULL, '2024-01-29 20:12:41', '2024-01-29 20:12:41'),
(40, 52, '07862214917', 'individual', '79 Chestnut Grove', 'New Malden', NULL, 'KT11 2LW', NULL, NULL, '2024-02-01 22:11:41', '2024-02-01 22:11:41'),
(41, 52, '07862214917', 'individual', '79 chestnut grove', 'New Malden', NULL, 'KT11 2LW', NULL, NULL, '2024-02-01 22:22:39', '2024-02-01 22:22:39'),
(42, 52, '07862214917', 'individual', '79', 'CHESTNUT GROVE', NULL, 'KT11 2LW', NULL, NULL, '2024-02-07 23:31:29', '2024-02-07 23:31:29'),
(43, 54, '1234567899', 'individual', 'surat', 'mumbai', NULL, 'KT11', NULL, NULL, '2024-02-08 12:44:31', '2024-02-08 12:45:45'),
(44, 55, '1234567895', 'individual', 'surat', 'Mumbia', NULL, 'KT11', NULL, NULL, '2024-02-12 05:06:47', '2024-02-12 05:07:43'),
(45, 13, '1234567899', 'individual', 'Surat', 'Udhana', NULL, 'KT11', NULL, NULL, '2024-02-12 06:28:55', '2024-02-12 06:28:55'),
(46, 13, '1234567899', 'individual', 'Surat', 'Udhana', NULL, 'KT11', NULL, NULL, '2024-02-12 06:35:19', '2024-02-12 06:35:19'),
(47, 61, NULL, NULL, 'xc', 'vcx', NULL, 'agfa', NULL, NULL, '2024-02-12 07:02:33', '2024-02-12 07:02:33'),
(48, 61, NULL, NULL, 'xc', 'vcx', NULL, 'agfa', NULL, NULL, '2024-02-12 07:02:33', '2024-02-12 07:02:33'),
(49, 1, '123456789', 'individual', '322-329, Atlanta Shopping, Althan Bhimrad Road,Near Metro, Vesu, Surat.', 'United Kingdom (UK)', NULL, 'KT11', '{\"id\":\"cus_QUPuWJv6LSMJRm\",\"object\":\"customer\",\"address\":null,\"balance\":0,\"created\":1721196668,\"currency\":null,\"default_source\":\"card_1PdR4wEoWO9T9v9OLfQkt2MH\",\"delinquent\":false,\"description\":null,\"discount\":null,\"email\":\"bilal@admin.com\",\"invoice_prefix\":\"2062B37B\",\"invoice_settings\":{\"custom_fields\":null,\"default_payment_method\":null,\"footer\":null,\"rendering_options\":null},\"livemode\":false,\"metadata\":[],\"name\":\"Bilal Tahirasdasd\",\"next_invoice_sequence\":1,\"phone\":null,\"preferred_locales\":[],\"shipping\":null,\"tax_exempt\":\"none\",\"test_clock\":null}', '{\"id\":\"card_1PdR4wEoWO9T9v9OLfQkt2MH\",\"object\":\"card\",\"address_city\":null,\"address_country\":null,\"address_line1\":null,\"address_line1_check\":null,\"address_line2\":null,\"address_state\":null,\"address_zip\":null,\"address_zip_check\":null,\"brand\":\"Visa\",\"country\":\"US\",\"customer\":\"cus_QUPuWJv6LSMJRm\",\"cvc_check\":\"pass\",\"dynamic_last4\":null,\"exp_month\":11,\"exp_year\":2026,\"fingerprint\":\"GuG3C7FCIIqXfTbx\",\"funding\":\"credit\",\"last4\":\"1111\",\"metadata\":{},\"name\":null,\"tokenization_method\":null,\"wallet\":null}', '2024-02-14 10:46:52', '2024-07-17 06:11:09'),
(50, 52, '07862214917', 'individual', '79', 'CHESTNUT GROVE', NULL, 'KT11', NULL, NULL, '2024-02-15 14:36:41', '2024-02-15 14:36:41'),
(51, 62, '0854512464', 'individual', 'Test', NULL, NULL, 'KT11', NULL, NULL, '2024-02-16 07:01:16', '2024-02-16 07:01:16'),
(52, 52, '07862214917', 'individual', '79', 'CHESTNUT GROVE', NULL, 'KT11 2LW', NULL, NULL, '2024-02-16 11:44:25', '2024-02-16 11:44:25'),
(53, 52, '07862214917', 'individual', '79', 'CHESTNUT GROVE', NULL, 'kt3 3js', NULL, NULL, '2024-02-16 11:45:35', '2024-02-16 11:45:35'),
(54, 52, '07862214917', 'individual', '79', 'CHESTNUT GROVE', NULL, 'KT11 2LW', NULL, NULL, '2024-02-16 11:46:03', '2024-02-16 11:46:03'),
(55, 63, '0786251818', 'individual', '17 anyards road', 'cobham', NULL, 'kt3 3js', NULL, NULL, '2024-02-16 11:47:06', '2024-02-16 11:47:06'),
(56, 52, '07862214917', 'individual', '79', 'CHESTNUT GROVE', NULL, 'KT11 2LW', NULL, NULL, '2024-02-16 11:49:17', '2024-02-16 11:49:17'),
(57, 64, '098767897', 'individual', 'nowhere', 'nowhere', NULL, 'sw19 8hn', NULL, NULL, '2024-02-16 11:50:18', '2024-02-16 11:50:18'),
(58, 52, '07862214917', 'individual', '79', 'CHESTNUT GROVE', NULL, 'KT11 2LW', NULL, NULL, '2024-02-16 18:53:55', '2024-02-16 18:53:55'),
(59, 52, '07862214917', 'individual', '79', 'CHESTNUT GROVE', NULL, 'KT11 2LW', NULL, NULL, '2024-02-16 18:54:17', '2024-02-16 18:54:17'),
(60, 11, '1234567890', 'individual', 'asda', 'sdf', NULL, 'KT11 2LW', NULL, NULL, '2024-02-17 11:21:31', '2024-02-17 11:21:31'),
(61, 52, '07862214917', 'individual', '79', 'CHESTNUT GROVE', NULL, 'KT11 2LW', NULL, NULL, '2024-02-17 11:33:42', '2024-02-17 11:33:42'),
(63, 52, '07862214917', 'individual', '79', 'CHESTNUT GROVE', NULL, 'KT11 2LW', NULL, NULL, '2024-02-29 07:55:17', '2024-02-29 07:55:17'),
(64, 52, '07862214917', 'individual', '17 Anyards Road', 'Cobham', NULL, 'KT11 2LW', NULL, NULL, '2024-02-29 11:00:07', '2024-02-29 11:00:07'),
(65, 52, '07862214917', 'individual', '79', 'CHESTNUT GROVE', NULL, 'KT11 2LW', NULL, NULL, '2024-02-29 11:01:54', '2024-02-29 11:01:54'),
(66, 52, '07862214917', 'individual', '79', 'CHESTNUT GROVE', NULL, 'KT11 2LW', NULL, NULL, '2024-02-29 11:22:50', '2024-02-29 11:22:50'),
(67, 66, '0854512464', 'individual', 'Test', NULL, NULL, 'KT11', NULL, NULL, '2024-02-29 13:24:43', '2024-02-29 13:24:43'),
(68, 67, '077 2340 1930', 'individual', '3 Kendell Street', 'Shenmore, HR2 9YX', NULL, 'KT7', NULL, NULL, '2024-03-01 12:21:55', '2024-03-01 12:23:33'),
(69, 67, '077 2340 1930', 'individual', '3 Kendell Street', 'Shenmore, HR2 9YX', NULL, 'KT7', NULL, NULL, '2024-03-01 12:23:59', '2024-03-01 12:23:59'),
(70, 52, '07862214917', 'individual', '79', 'CHESTNUT GROVE', NULL, 'KT11 2LW', NULL, NULL, '2024-03-01 22:40:08', '2024-03-01 22:40:08'),
(71, 52, '07862214917', 'individual', '79', 'CHESTNUT GROVE', NULL, 'KT11 2LW', NULL, NULL, '2024-03-01 23:14:44', '2024-03-01 23:14:44'),
(72, 52, '07862214917', 'individual', '79 Chestnut Grove', 'Cobham', NULL, 'KT11 2LW', NULL, NULL, '2024-03-04 22:25:00', '2024-03-04 22:25:00'),
(73, 52, '07862214917', 'individual', '79', 'CHESTNUT GROVE', NULL, 'KT11 2LW', NULL, NULL, '2024-03-04 22:58:15', '2024-03-04 22:58:15'),
(74, 68, '0897665474', 'individual', '78 larence', '8hsbaa', NULL, 'KT11 2LW', NULL, NULL, '2024-03-04 23:00:51', '2024-03-04 23:00:51'),
(78, 72, '9977112233', 'individual', '3 Kendell Street', 'Shenmore', NULL, 'KT7', NULL, NULL, '2024-03-11 08:51:03', '2024-03-11 08:51:20'),
(79, 72, '9977112233', 'individual', '3 Kendell Street', 'Shenmore', NULL, 'KT7', NULL, NULL, '2024-03-11 08:53:05', '2024-03-11 08:53:05'),
(80, 73, '8844555662', 'individual', '2 Thames Street, Bo\'ness', 'United Kingdom', NULL, 'KT7', NULL, NULL, '2024-03-11 08:56:14', '2024-03-11 08:56:54'),
(81, 74, '078625271617', 'individual', 'Test address', NULL, NULL, 'KT11 2lp', NULL, NULL, '2024-03-11 21:58:04', '2024-06-25 18:39:53'),
(83, 52, '07862214917', 'individual', '79', 'CHESTNUT GROVE', NULL, 'KT11 2LW', NULL, NULL, '2024-03-12 22:47:51', '2024-03-12 22:47:51'),
(100, 83, '9977112233', 'individual', '2 Thames Street, Bo\'ness', 'United Kingdom (UK)', NULL, 'KT11 2LW', NULL, NULL, '2024-03-14 06:18:58', '2024-03-14 06:23:54'),
(101, 84, '9106939906', 'individual', 'Surat', 'Surat', NULL, '399999', NULL, NULL, '2024-03-14 12:04:33', '2024-03-14 12:11:42'),
(102, 85, '7999999551', 'company', '123', 'adajan', NULL, 'KT7', NULL, NULL, '2024-03-14 12:15:26', '2024-03-14 12:18:59'),
(103, 86, '9106939906', 'individual', 'Surat', 'Surat', NULL, 'KT7', NULL, NULL, '2024-03-14 12:23:20', '2024-03-14 12:23:34'),
(104, 87, '9106939906', 'individual', 'Surat', 'Surat', NULL, 'KT7', NULL, NULL, '2024-03-14 12:25:36', '2024-03-14 12:27:36'),
(105, 88, '7999929555', 'company', '123', 'adajan', NULL, 'KT11 2LW', NULL, NULL, '2024-03-14 12:27:26', '2024-03-14 12:28:50'),
(106, 89, '9106939906', 'company', 'Surat', 'Surat', NULL, 'KT7', NULL, NULL, '2024-03-14 12:28:48', '2024-03-14 12:30:35'),
(107, 90, '9106939906', 'individual', 'Surat', 'Surat', NULL, 'KT7', NULL, NULL, '2024-03-14 12:36:38', '2024-03-14 12:37:56'),
(108, 91, '8985347573', 'company', '24 ffdbdfdfdf', '54 fghhghfghfghfh', NULL, 'KT7', NULL, NULL, '2024-03-14 12:38:47', '2024-03-14 12:41:40'),
(109, 92, '9106939906', 'individual', 'Surat', 'Surat', NULL, 'KT7', NULL, NULL, '2024-03-14 12:41:11', '2024-03-14 12:41:57'),
(110, 93, '07862214917', 'individual', '17 Anyards Road', 'cobham', NULL, 'KT11 2LW', NULL, NULL, '2024-03-16 17:09:12', '2024-03-16 22:54:56'),
(111, 94, '8545612344', 'individual', '3 Kendell Street', 'United Kingdom (UK)', NULL, 'KT11 2LW', NULL, NULL, '2024-03-18 12:38:16', '2024-03-18 12:38:37'),
(112, 95, '8855221122', 'individual', '2 Thames Street, Bo\'ness', 'Shenmore, HR2 9YX', NULL, 'KT11 2LW', '{\"id\":\"cus_PlSzQxi6O4ozJF\",\"object\":\"customer\",\"address\":null,\"balance\":0,\"created\":1710829305,\"currency\":null,\"default_source\":\"card_1Ovw3QEoWO9T9v9OLLYj3DCw\",\"delinquent\":false,\"description\":null,\"discount\":null,\"email\":\"ravi00@yopmail.com\",\"invoice_prefix\":\"B435921F\",\"invoice_settings\":{\"custom_fields\":null,\"default_payment_method\":null,\"footer\":null,\"rendering_options\":null},\"livemode\":false,\"metadata\":[],\"name\":\"Ravi\",\"next_invoice_sequence\":1,\"phone\":null,\"preferred_locales\":[],\"shipping\":null,\"tax_exempt\":\"none\",\"test_clock\":null}', '{\"id\":\"card_1Ovw3QEoWO9T9v9OLLYj3DCw\",\"object\":\"card\",\"address_city\":null,\"address_country\":null,\"address_line1\":null,\"address_line1_check\":null,\"address_line2\":null,\"address_state\":null,\"address_zip\":null,\"address_zip_check\":null,\"brand\":\"MasterCard\",\"country\":\"US\",\"customer\":\"cus_PlSzQxi6O4ozJF\",\"cvc_check\":\"pass\",\"dynamic_last4\":null,\"exp_month\":1,\"exp_year\":2045,\"fingerprint\":\"i7vuRo7cel4O0aiH\",\"funding\":\"prepaid\",\"last4\":\"5100\",\"metadata\":{},\"name\":null,\"tokenization_method\":null,\"wallet\":null}', '2024-03-19 06:21:25', '2024-03-19 06:21:47'),
(113, 96, '9977112233', 'individual', '3 Kendell Street', 'Cobham', NULL, 'KT11 2LW', '{\"id\":\"cus_PlT94VC4uRyqvb\",\"object\":\"customer\",\"address\":null,\"balance\":0,\"created\":1710829911,\"currency\":null,\"default_source\":\"card_1OvwDCEoWO9T9v9ODJP7YG2t\",\"delinquent\":false,\"description\":null,\"discount\":null,\"email\":\"rakesh00@yopmail.com\",\"invoice_prefix\":\"8BD89C68\",\"invoice_settings\":{\"custom_fields\":null,\"default_payment_method\":null,\"footer\":null,\"rendering_options\":null},\"livemode\":false,\"metadata\":[],\"name\":\"Rakesh\",\"next_invoice_sequence\":1,\"phone\":null,\"preferred_locales\":[],\"shipping\":null,\"tax_exempt\":\"none\",\"test_clock\":null}', '{\"id\":\"card_1OvwDCEoWO9T9v9ODJP7YG2t\",\"object\":\"card\",\"address_city\":null,\"address_country\":null,\"address_line1\":null,\"address_line1_check\":null,\"address_line2\":null,\"address_state\":null,\"address_zip\":null,\"address_zip_check\":null,\"brand\":\"Visa\",\"country\":\"US\",\"customer\":\"cus_PlT94VC4uRyqvb\",\"cvc_check\":\"pass\",\"dynamic_last4\":null,\"exp_month\":12,\"exp_year\":2026,\"fingerprint\":\"jsKi0sOkZUzj6lNZ\",\"funding\":\"credit\",\"last4\":\"4242\",\"metadata\":{},\"name\":null,\"tokenization_method\":null,\"wallet\":null}', '2024-03-19 06:31:26', '2024-03-19 06:31:52'),
(114, 97, '+923319081000', 'individual', 'New Gardan Town Lahore', 'Pakistan', NULL, 'KT11 2LW', '{\"id\":\"cus_Q7a75Jg2TyzXUd\",\"object\":\"customer\",\"address\":null,\"balance\":0,\"created\":1715929928,\"currency\":null,\"default_source\":\"card_1PHKxXEoWO9T9v9OMv3i3SIU\",\"delinquent\":false,\"description\":null,\"discount\":null,\"email\":null,\"invoice_prefix\":\"422BB270\",\"invoice_settings\":{\"custom_fields\":null,\"default_payment_method\":null,\"footer\":null,\"rendering_options\":null},\"livemode\":false,\"metadata\":[],\"name\":\"Waqas Amjad\",\"next_invoice_sequence\":1,\"phone\":null,\"preferred_locales\":[],\"shipping\":null,\"tax_exempt\":\"none\",\"test_clock\":null}', '{\"id\":\"card_1PHKxXEoWO9T9v9OMv3i3SIU\",\"object\":\"card\",\"address_city\":null,\"address_country\":null,\"address_line1\":null,\"address_line1_check\":null,\"address_line2\":null,\"address_state\":null,\"address_zip\":null,\"address_zip_check\":null,\"brand\":\"Visa\",\"country\":\"US\",\"customer\":\"cus_Q7a75Jg2TyzXUd\",\"cvc_check\":\"pass\",\"dynamic_last4\":null,\"exp_month\":1,\"exp_year\":2025,\"fingerprint\":\"jsKi0sOkZUzj6lNZ\",\"funding\":\"credit\",\"last4\":\"4242\",\"metadata\":{},\"name\":null,\"tokenization_method\":null,\"wallet\":null}', '2024-04-07 00:21:48', '2024-05-17 07:12:10'),
(115, 98, '+923319081000', 'individual', 'Lahore', 'Pakistan', NULL, 'KT11 2LW', NULL, NULL, '2024-04-16 18:33:14', '2024-04-16 18:33:14'),
(116, 99, '+923319081000', 'individual', 'Lahore', 'Pakistan', NULL, 'KT11 2LW', '{\"id\":\"cus_Pw9E15pdUfmncn\",\"object\":\"customer\",\"address\":null,\"balance\":0,\"created\":1713292879,\"currency\":null,\"default_source\":\"card_1P6GwTEoWO9T9v9OaQi0A7VO\",\"delinquent\":false,\"description\":null,\"discount\":null,\"email\":\"abcxyz@xyz.com\",\"invoice_prefix\":\"F5E18319\",\"invoice_settings\":{\"custom_fields\":null,\"default_payment_method\":null,\"footer\":null,\"rendering_options\":null},\"livemode\":false,\"metadata\":[],\"name\":\"Waqas Amjad\",\"next_invoice_sequence\":1,\"phone\":null,\"preferred_locales\":[],\"shipping\":null,\"tax_exempt\":\"none\",\"test_clock\":null}', '{\"id\":\"card_1P6GwTEoWO9T9v9OaQi0A7VO\",\"object\":\"card\",\"address_city\":null,\"address_country\":null,\"address_line1\":null,\"address_line1_check\":null,\"address_line2\":null,\"address_state\":null,\"address_zip\":null,\"address_zip_check\":null,\"brand\":\"Visa\",\"country\":\"US\",\"customer\":\"cus_Pw9E15pdUfmncn\",\"cvc_check\":\"pass\",\"dynamic_last4\":null,\"exp_month\":2,\"exp_year\":2025,\"fingerprint\":\"jsKi0sOkZUzj6lNZ\",\"funding\":\"credit\",\"last4\":\"4242\",\"metadata\":{},\"name\":null,\"tokenization_method\":null,\"wallet\":null}', '2024-04-16 18:40:51', '2024-04-16 18:41:20'),
(117, 100, '447862214917', 'individual', 'Testing', NULL, NULL, 'KT11 2lp', NULL, NULL, '2024-06-25 18:27:51', '2024-06-25 18:27:51'),
(118, 101, '0854512464', 'individual', 'sdfdsfs', NULL, NULL, 'KT11 2LW', '{\"id\":\"cus_QUPXjMNYokiQaO\",\"object\":\"customer\",\"address\":null,\"balance\":0,\"created\":1721195295,\"currency\":null,\"default_source\":\"card_1PdQioDOoGfbZqKjDaCCVK6Z\",\"delinquent\":false,\"description\":null,\"discount\":null,\"email\":\"test.admin@yopmail.com\",\"invoice_prefix\":\"A730170A\",\"invoice_settings\":{\"custom_fields\":null,\"default_payment_method\":null,\"footer\":null,\"rendering_options\":null},\"livemode\":false,\"metadata\":[],\"name\":\"Freelancer\",\"next_invoice_sequence\":1,\"phone\":null,\"preferred_locales\":[],\"shipping\":null,\"tax_exempt\":\"none\",\"test_clock\":null}', NULL, '2024-07-01 05:52:36', '2024-07-17 05:48:16'),
(119, 101, '0854512464', 'individual', 'Test', 'sdvdsv', NULL, 'KT11 2LW', NULL, NULL, '2024-07-17 05:47:31', '2024-07-17 05:47:31'),
(120, 102, '9825121036', 'company', '12345678', 'rdfyugfdiyuyg8441154', NULL, 'KT11', NULL, NULL, '2024-07-17 06:41:07', '2024-07-17 06:41:07'),
(121, 103, '09488123456', 'individual', '12 test', NULL, NULL, 'kt11 2LW', NULL, NULL, '2024-07-21 13:44:02', '2024-07-21 13:44:02'),
(122, 104, NULL, NULL, 'Lushington Dr, Cobham KT11 2LU, United Kingdom', NULL, NULL, 'kt11 2LW', NULL, NULL, '2024-07-22 12:33:50', '2024-07-22 12:33:50'),
(123, 105, '07311759839', 'individual', 'Test', NULL, NULL, 'kt11 2LW', NULL, NULL, '2024-07-22 20:56:37', '2024-08-11 20:15:28'),
(124, 106, '03324242424', 'individual', 'line one address', 'line 2 address', NULL, 'kt11 2LW', '{\"id\":\"cus_QYMSdSGgiid60H\",\"object\":\"customer\",\"address\":null,\"balance\":0,\"created\":1722106370,\"currency\":null,\"default_source\":\"card_1PhFjZEoWO9T9v9ObbDKOfS2\",\"delinquent\":false,\"description\":null,\"discount\":null,\"email\":\"zia.khan@gmail.com\",\"invoice_prefix\":\"65B24DB1\",\"invoice_settings\":{\"custom_fields\":null,\"default_payment_method\":null,\"footer\":null,\"rendering_options\":null},\"livemode\":false,\"metadata\":[],\"name\":\"Xia\",\"next_invoice_sequence\":1,\"phone\":null,\"preferred_locales\":[],\"shipping\":null,\"tax_exempt\":\"none\",\"test_clock\":null}', '{\"id\":\"card_1PhFjZEoWO9T9v9ObbDKOfS2\",\"object\":\"card\",\"address_city\":null,\"address_country\":null,\"address_line1\":null,\"address_line1_check\":null,\"address_line2\":null,\"address_state\":null,\"address_zip\":null,\"address_zip_check\":null,\"brand\":\"Visa\",\"country\":\"US\",\"customer\":\"cus_QYMSdSGgiid60H\",\"cvc_check\":\"pass\",\"dynamic_last4\":null,\"exp_month\":12,\"exp_year\":2034,\"fingerprint\":\"jsKi0sOkZUzj6lNZ\",\"funding\":\"credit\",\"last4\":\"4242\",\"metadata\":{},\"name\":null,\"tokenization_method\":null,\"wallet\":null}', '2024-07-27 18:51:05', '2024-07-27 18:52:51'),
(125, 107, '09923232322', 'individual', 'line address one', 'line 12333', NULL, 'kt11 2LW', NULL, NULL, '2024-07-27 18:54:54', '2024-07-27 18:54:54'),
(126, 108, '03322222222', 'individual', 'Line one address', 'Line tow address filed', NULL, 'kt11 2LW', NULL, NULL, '2024-07-27 21:18:02', '2024-07-27 21:18:02'),
(127, 109, '092333232323', 'individual', 'Address line one', 'address line 2', NULL, 'kt11 2LW', NULL, NULL, '2024-08-03 21:49:08', '2024-08-03 21:49:08'),
(128, 110, '0987722233223', 'individual', 'Address  line one for without login', 'Address  line two for without login', NULL, 'kt11 2LW', NULL, NULL, '2024-08-04 11:37:10', '2024-08-04 11:37:10'),
(129, 111, '21545484848', 'individual', 'Test', NULL, NULL, 'Kt11 2lw', NULL, NULL, '2024-08-09 08:16:26', '2024-08-09 08:16:26'),
(130, 112, '9363321799', 'individual', 'The', NULL, NULL, 'KT11 2LW', '{\"id\":\"cus_QhWVlZr0dpygYm\",\"object\":\"customer\",\"address\":null,\"balance\":0,\"created\":1724219538,\"currency\":null,\"default_source\":\"card_1Pq7SuEoWO9T9v9Og79D2mSX\",\"delinquent\":false,\"description\":null,\"discount\":null,\"email\":\"saidhstu13@gmail.com\",\"invoice_prefix\":\"C73DBE7B\",\"invoice_settings\":{\"custom_fields\":null,\"default_payment_method\":null,\"footer\":null,\"rendering_options\":null},\"livemode\":false,\"metadata\":[],\"name\":\"Saidur Rohman\",\"next_invoice_sequence\":1,\"phone\":null,\"preferred_locales\":[],\"shipping\":null,\"tax_exempt\":\"none\",\"test_clock\":null}', '{\"id\":\"card_1Pq7SuEoWO9T9v9Og79D2mSX\",\"object\":\"card\",\"address_city\":null,\"address_country\":null,\"address_line1\":null,\"address_line1_check\":null,\"address_line2\":null,\"address_state\":null,\"address_zip\":null,\"address_zip_check\":null,\"brand\":\"Visa\",\"country\":\"US\",\"customer\":\"cus_QhWVlZr0dpygYm\",\"cvc_check\":\"pass\",\"dynamic_last4\":null,\"exp_month\":2,\"exp_year\":2042,\"fingerprint\":\"jsKi0sOkZUzj6lNZ\",\"funding\":\"credit\",\"last4\":\"4242\",\"metadata\":{},\"name\":null,\"tokenization_method\":null,\"wallet\":null}', '2024-08-20 15:29:08', '2024-08-30 15:24:07'),
(131, 113, NULL, NULL, '131 Woodrow Way Nacogdoches, TX 75964', 'Nur Alam Building', NULL, 'KT11 2LW', NULL, NULL, '2024-08-21 05:50:06', '2024-08-21 05:50:06'),
(132, 114, '9773176242', 'individual', 'Cobham', 'UK', NULL, 'KT11', '{\"id\":\"cus_Qq9ekzBT6ExJB4\",\"object\":\"customer\",\"address\":null,\"balance\":0,\"created\":1726210243,\"currency\":null,\"default_source\":\"card_1PyTL3EoWO9T9v9OwVqu5xKw\",\"delinquent\":false,\"description\":null,\"discount\":null,\"email\":\"jamodkiran.dev@gmail.com\",\"invoice_prefix\":\"59CBCCA9\",\"invoice_settings\":{\"custom_fields\":null,\"default_payment_method\":null,\"footer\":null,\"rendering_options\":null},\"livemode\":false,\"metadata\":[],\"name\":\"Kiran Jamod\",\"next_invoice_sequence\":1,\"phone\":null,\"preferred_locales\":[],\"shipping\":null,\"tax_exempt\":\"none\",\"test_clock\":null}', '{\"id\":\"card_1PyTL3EoWO9T9v9OwVqu5xKw\",\"object\":\"card\",\"address_city\":null,\"address_country\":null,\"address_line1\":null,\"address_line1_check\":null,\"address_line2\":null,\"address_state\":null,\"address_zip\":null,\"address_zip_check\":null,\"brand\":\"Visa\",\"country\":\"US\",\"customer\":\"cus_Qq9ekzBT6ExJB4\",\"cvc_check\":\"pass\",\"dynamic_last4\":null,\"exp_month\":12,\"exp_year\":2025,\"fingerprint\":\"jsKi0sOkZUzj6lNZ\",\"funding\":\"credit\",\"last4\":\"4242\",\"metadata\":{},\"name\":null,\"tokenization_method\":null,\"wallet\":null}', '2024-09-09 13:42:04', '2024-09-13 06:50:44');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `faqs`
--

CREATE TABLE `faqs` (
  `id` int(11) NOT NULL,
  `page_id` int(11) DEFAULT NULL,
  `question` varchar(255) DEFAULT NULL,
  `answer` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `faqs`
--

INSERT INTO `faqs` (`id`, `page_id`, `question`, `answer`, `created_at`, `updated_at`) VALUES
(1, 1, 'Quia qui sed facilis', 'Aut quam tenetur ven', '2024-04-16 08:48:08', '2024-04-16 08:48:08'),
(2, 1, 'Quia qui sed facilis Non ut praesentium c', 'Aut quam tenetur ven Non ut praesentium c', '2024-04-16 08:48:08', '2024-04-16 08:48:08'),
(3, 1, 'Quia qui sed facilis Quia qui sed facilis', 'Aut quam tenetur ven Quia qui sed facilis', '2024-04-16 08:48:08', '2024-04-16 08:48:08'),
(26, 6, 'Do you Deliver at Home?', 'Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.', '2024-05-02 20:47:42', '2024-05-02 20:47:42'),
(27, 6, 'question 2', 'Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.', '2024-05-02 20:47:42', '2024-05-02 20:47:42'),
(33, 12, 'Lorem Ipsum has been the industry\'s standard dummy tex', 'Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', '2024-05-06 07:40:14', '2024-05-06 07:40:14'),
(32, 12, 'What is Lorem Ipsum?', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.', '2024-05-06 07:40:14', '2024-05-06 07:40:14'),
(34, 13, 'Do you Deliver at Home?', 'yes', '2024-09-27 19:40:16', '2024-09-27 19:40:16');

-- --------------------------------------------------------

--
-- Table structure for table `footer_main_catagoris`
--

CREATE TABLE `footer_main_catagoris` (
  `id` int(11) NOT NULL,
  `catagory_name` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `footer_main_catagoris`
--

INSERT INTO `footer_main_catagoris` (`id`, `catagory_name`, `created_at`, `updated_at`) VALUES
(3, 'Services', '2024-01-24 02:48:17', '2024-01-25 03:42:13'),
(5, 'Areas Covered', '2024-01-24 04:33:31', '2024-04-30 20:19:33'),
(6, 'Company', '2024-01-24 05:20:36', '2024-01-24 05:20:36');

-- --------------------------------------------------------

--
-- Table structure for table `footer_sub_catagoris`
--

CREATE TABLE `footer_sub_catagoris` (
  `id` int(11) NOT NULL,
  `main_cat_id` int(11) DEFAULT NULL,
  `sub_cat_name` text DEFAULT NULL,
  `url` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `footer_sub_catagoris`
--

INSERT INTO `footer_sub_catagoris` (`id`, `main_cat_id`, `sub_cat_name`, `url`, `created_at`, `updated_at`) VALUES
(2, 2, 'test data', 'http://localhost/DryCleaner/admin/setting/sub-catagory', '2024-01-24 04:54:14', '2024-01-24 04:54:14'),
(5, 6, 'About Us', '#', '2024-01-24 05:21:13', '2024-01-24 23:34:28'),
(6, 6, 'Why Choose Us', '#', '2024-01-24 05:21:20', '2024-01-24 23:34:43'),
(7, 6, 'Location', '#', '2024-01-24 05:21:34', '2024-01-24 23:34:52'),
(8, 3, 'Dry Cleaning', 'http://localhost/DryCleaner/service/dry-cleaning', '2024-01-24 05:22:10', '2024-01-24 05:22:10'),
(9, 3, 'Shirt Laundry', 'http://localhost/DryCleaner/service/shirt-laundry', '2024-01-24 05:22:34', '2024-01-24 05:22:34'),
(10, 3, 'Bed linen', 'http://localhost/DryCleaner/service/bed-linen', '2024-01-24 05:23:00', '2024-01-24 23:36:13'),
(11, 3, 'Alterations', 'http://localhost/DryCleaner/service/alterations-repairs', '2024-01-24 05:23:15', '2024-01-24 23:36:34'),
(12, 3, 'Repairs', '#', '2024-01-24 05:23:28', '2024-01-24 05:23:28'),
(13, 5, 'Facebook', 'https://www.facebook.com/', '2024-01-24 05:24:20', '2024-01-24 09:40:08'),
(14, 5, 'Twitter', 'https://twitter.com/?lang=en', '2024-01-24 05:24:30', '2024-01-24 23:32:55'),
(15, 5, 'E-mail', 'https://www.google.com/gmail/about/', '2024-01-24 05:24:40', '2024-01-24 23:33:50'),
(17, NULL, '45345345345', 'fsg sdf gsdf', '2024-01-24 06:24:15', '2024-01-24 06:24:15');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2022_10_26_163101_create_payments_table', 1),
(6, '2022_10_27_163919_create_customers_table', 1),
(7, '2022_10_28_201001_create_orders_table', 1),
(8, '2022_10_29_163304_create_order_services_table', 1),
(9, '2022_12_08_152328_create_permission_tables', 1),
(10, '2022_12_08_154831_create_post_codes_table', 1),
(11, '2022_12_10_183416_add_custom_column_to_role_table', 1),
(12, '2023_01_06_181247_create_tags_table', 1),
(13, '2023_01_07_173751_create_section_icons_table', 1),
(14, '2023_01_08_173612_create_sections_table', 1),
(15, '2023_01_09_181321_create_categories_table', 1),
(16, '2023_01_09_184440_create_table_section_tag', 1),
(17, '2023_01_18_105407_create_order_sections_table', 1),
(18, '2023_01_27_172909_add_token_to_orders', 1),
(19, '2023_03_05_113622_create_off_days_table', 1),
(20, '2023_03_18_212729_create_switch_timings_table', 1),
(21, '2023_11_10_203225_create_services_table', 1),
(22, '2023_05_23_183124_google_social_auth_id', 2);

-- --------------------------------------------------------

--
-- Table structure for table `model_has_permissions`
--

CREATE TABLE `model_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `model_has_roles`
--

CREATE TABLE `model_has_roles` (
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `model_has_roles`
--

INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES
(1, 'App\\Models\\User', 1),
(1, 'App\\Models\\User', 3),
(1, 'App\\Models\\User', 4);

-- --------------------------------------------------------

--
-- Table structure for table `off_days`
--

CREATE TABLE `off_days` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `day` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `off_days`
--

INSERT INTO `off_days` (`id`, `day`, `created_at`, `updated_at`) VALUES
(1, 'Sun', '2024-09-19 09:09:41', '2024-09-19 09:09:41');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `no` varchar(255) DEFAULT NULL,
  `collection_date` varchar(255) NOT NULL,
  `collection_time` varchar(255) DEFAULT NULL,
  `delivery_date` varchar(255) NOT NULL,
  `delivery_time` varchar(255) DEFAULT NULL,
  `instruction` varchar(255) DEFAULT NULL,
  `infomation` mediumtext DEFAULT NULL,
  `frequency` varchar(255) NOT NULL DEFAULT 'once',
  `customer_id` bigint(20) UNSIGNED DEFAULT NULL,
  `amount` varchar(255) NOT NULL DEFAULT '0',
  `status` varchar(255) NOT NULL DEFAULT 'uncompleted',
  `payment_status` varchar(255) NOT NULL DEFAULT 'not-paid',
  `payment_id` text DEFAULT NULL,
  `payment_method_id` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `token` varchar(255) DEFAULT NULL,
  `collected_at` datetime DEFAULT NULL,
  `proceed_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `no`, `collection_date`, `collection_time`, `delivery_date`, `delivery_time`, `instruction`, `infomation`, `frequency`, `customer_id`, `amount`, `status`, `payment_status`, `payment_id`, `payment_method_id`, `created_at`, `updated_at`, `token`, `collected_at`, `proceed_at`) VALUES
(1, 'sav1', '2023-03-21', NULL, '2023-03-23', NULL, 'Driver Drops, Rings & Wait', 'Non ut quaerat eos a', 'weekly', NULL, '0', 'uncompleted', 'paid', NULL, NULL, '2023-03-20 15:50:26', '2023-03-20 15:50:26', NULL, NULL, NULL),
(2, 'sav2', '2023-04-20', '10:00am - 13:00 pm', '2023-04-25', '10:00am - 13:00 pm', 'Driver Drops, Rings & Wait', NULL, 'once', NULL, '0', 'uncompleted', 'paid', NULL, NULL, '2023-04-19 21:48:51', '2023-04-19 21:48:51', NULL, NULL, NULL),
(3, 'sav3', '2023-05-15', '10:00am - 13:00 pm', '2023-05-17', '10:00am - 13:00 pm', 'Driver Drops, Rings & Wait', NULL, 'weekly', NULL, '0', 'uncompleted', 'paid', NULL, NULL, '2023-05-11 19:08:26', '2023-05-11 19:08:26', NULL, NULL, NULL),
(4, 'sav4', '2023-05-19', '10:00am - 13:00 pm', '2023-05-24', '10:00am - 13:00 pm', 'Driver Drops, Rings & Wait', 'testingss', 'weekly', 2, '0', 'uncompleted', 'paid', NULL, NULL, '2023-05-11 19:16:17', '2023-05-11 19:16:17', NULL, NULL, NULL),
(5, 'sav5', '2023-05-13', '5:00pm - 7:00pm', '2023-05-17', '5:00pm - 7:00pm', 'Driver Drops, Rings & Wait', NULL, 'once', 3, '0', 'uncompleted', 'paid', NULL, NULL, '2023-05-11 19:41:33', '2023-05-11 19:41:33', NULL, NULL, NULL),
(15, 'sav15', '2024-01-22', '10:00am - 13:00 pm', '2024-01-22', '10:00am - 13:00 pm', 'Driver Drops, Rings & Wait', 'daf daews fdas', 'once', NULL, '0', 'uncompleted', 'not-paid', NULL, NULL, '2024-01-22 07:11:19', '2024-01-22 07:11:19', NULL, NULL, NULL),
(16, 'sav16', '2024-01-22', '10:00am - 13:00 pm', '2024-01-27', '10:00am - 13:00 pm', 'Driver Drops, Rings & Wait', 'fgfsdgdsf', 'once', 15, '0', 'uncompleted', 'not-paid', NULL, NULL, '2024-01-22 07:21:18', '2024-01-22 07:21:18', NULL, NULL, NULL),
(17, 'sav17', '2024-01-22', '10:00am - 13:00 pm', '2024-01-26', '10:00am - 13:00 pm', 'Leave it at The Door', 'sfdasfasdf', 'once', 16, '0', 'uncompleted', 'not-paid', NULL, NULL, '2024-01-22 07:28:43', '2024-01-22 07:28:43', NULL, NULL, NULL),
(18, 'sav18', '2024-01-23', '10:00am - 13:00 pm', '2024-02-02', '10:00am - 13:00 pm', 'Driver Drops, Rings & Wait', 'dsfaa', 'two_weeks', 17, '0', 'uncompleted', 'paid', NULL, NULL, '2024-01-22 07:30:34', '2024-01-22 07:30:34', NULL, NULL, NULL),
(19, 'sav19', '2024-01-22', '10:00am - 13:00 pm', '2024-02-06', '10:00am - 13:00 pm', 'Driver Drops, Rings & Wait', 'adfadfa', 'two_weeks', 18, '0', 'uncompleted', 'not-paid', NULL, NULL, '2024-01-22 07:32:03', '2024-01-22 07:32:03', NULL, NULL, NULL),
(20, 'sav20', '2024-01-22', '10:00am - 13:00 pm', '2024-02-02', '10:00am - 13:00 pm', 'Driver Drops, Rings & Wait', 'ghsd ghsdg hsdgh', 'weekly', 18, '0', 'uncompleted', 'not-paid', NULL, NULL, '2024-01-22 07:33:27', '2024-01-22 07:33:27', NULL, NULL, NULL),
(21, 'sav21', '2024-01-22', '10:00am - 13:00 pm', '2024-01-31', '5:00pm - 7:00pm', 'Leave it at The Door', 'da fdasf', 'once', 18, '0', 'uncompleted', 'not-paid', NULL, NULL, '2024-01-22 09:01:10', '2024-01-22 09:01:10', NULL, NULL, NULL),
(22, 'sav22', '2024-01-22', '10:00am - 13:00 pm', '2024-02-02', '10:00am - 13:00 pm', 'Leave it at The Door', 'dasf adsf', 'four_weeks', 18, '0', 'uncompleted', 'not-paid', NULL, NULL, '2024-01-22 09:03:29', '2024-01-22 09:03:29', NULL, NULL, NULL),
(23, 'sav23', '2024-01-22', '10:00am - 13:00 pm', '2024-02-06', '10:00am - 13:00 pm', 'Leave it at The Door', 'qa dfasf dasf', 'two_weeks', 18, '0', 'uncompleted', 'not-paid', NULL, NULL, '2024-01-22 09:04:59', '2024-01-22 09:04:59', NULL, NULL, NULL),
(24, 'sav24', '2024-01-22', '10:00am - 13:00 pm', '2024-02-02', '10:00am - 13:00 pm', 'Leave it at The Door', 'adsf dasf das gfas', 'weekly', 21, '0', 'uncompleted', 'not-paid', NULL, NULL, '2024-01-22 09:09:34', '2024-01-22 09:09:34', NULL, NULL, NULL),
(25, 'sav25', '2024-01-24', '5:00pm - 7:00pm', '2024-01-29', '5:00pm - 7:00pm', 'Leave it at The Door', 'vas gfs gfs gfd gds', 'weekly', 25, '0', 'uncompleted', 'not-paid', NULL, NULL, '2024-01-22 23:35:15', '2024-01-22 23:35:15', NULL, NULL, NULL),
(26, 'sav26', '2024-01-23', '10:00am - 13:00 pm', '2024-01-23', '10:00am - 13:00 pm', 'Driver Drops, Rings & Wait', 'ads a fds vsv asfg', 'two_weeks', 25, '0', 'uncompleted', 'not-paid', NULL, NULL, '2024-01-22 23:36:31', '2024-01-22 23:36:31', NULL, NULL, NULL),
(27, 'sav27', '2024-01-26', '5:00pm - 7:00pm', '2024-01-31', '10:00am - 13:00 pm', 'Leave it at The Door', 'ew fsda gdf ghdsf gsf g', 'four_weeks', 25, '0', 'uncompleted', 'not-paid', NULL, NULL, '2024-01-22 23:37:50', '2024-01-22 23:37:50', NULL, NULL, NULL),
(28, 'sav28', '2024-01-29', '5:00pm - 7:00pm', '2024-01-24', '5:00pm - 7:00pm', 'Driver Drops, Rings & Wait', NULL, 'weekly', 27, '0', 'uncompleted', 'not-paid', NULL, NULL, '2024-01-22 23:54:31', '2024-01-22 23:54:31', NULL, NULL, NULL),
(29, 'sav29', '2024-01-23', '5:00pm - 7:00pm', '2024-01-24', '5:00pm - 7:00pm', 'Leave it at The Door', 'gffag dh gfhdh', 'once', 28, '0', 'uncompleted', 'not-paid', NULL, NULL, '2024-01-22 23:59:45', '2024-01-22 23:59:45', NULL, NULL, NULL),
(30, 'sav30', '2024-01-23', '10:00am - 13:00 pm', '2024-01-27', '10:00am - 13:00 pm', 'Driver Drops, Rings & Wait', 'fgdfs fg dfs g', 'weekly', 28, '0', 'uncompleted', 'not-paid', NULL, NULL, '2024-01-23 00:00:54', '2024-01-23 00:00:54', NULL, NULL, NULL),
(31, 'sav31', '2024-01-23', '08.00 - 09.00', '2024-01-31', '08.00 - 09.00', 'Driver Drops, Rings & Wait', 'fad gfdas g', 'two_weeks', 28, '0', 'complete', 'paid', NULL, NULL, '2024-01-23 00:02:53', '2024-07-17 05:54:21', NULL, NULL, NULL),
(32, 'sav32', '2024-01-23', '10:00am - 13:00 pm', '2024-01-26', '10:00am - 13:00 pm', 'Leave it at The Door', 'a ddf asfvg', 'weekly', 31, '0', 'complete', 'paid', NULL, NULL, '2024-01-23 00:44:44', '2024-03-20 22:46:46', NULL, NULL, NULL),
(33, 'sav33', '2024-01-23', '5:00pm - 7:00pm', '2024-02-02', '5:00pm - 7:00pm', 'Driver Drops, Rings & Wait', 'asd fwf', 'two_weeks', 31, '0', 'complete', 'paid', NULL, NULL, '2024-01-23 06:41:45', '2024-01-24 00:35:46', NULL, NULL, NULL),
(34, 'sav34', '2024-01-24', '10:00am - 13:00 pm', '2024-01-31', '10:00am - 13:00 pm', 'Leave it at The Door', 'a fadsgfsf gas', 'two_weeks', 32, '0', 'uncompleted', 'not-paid', NULL, NULL, '2024-01-24 00:44:45', '2024-01-24 00:44:45', NULL, NULL, NULL),
(35, 'sav35', '2024-01-26', '5:00pm - 7:00pm', '2024-02-07', '5:00pm - 7:00pm', 'Leave it at The Door', 'Infor is a multinational company headquartered in New York City that provides industry specific, enterprise software licensed for use on premises or as a service. As of 2016, Infor\'s software had 58 million users, and 90,000 corporate customers in', 'four_weeks', 33, '0', 'uncompleted', 'not-paid', NULL, NULL, '2024-01-25 00:02:18', '2024-01-25 00:02:18', NULL, NULL, NULL),
(36, 'sav36', '2024-01-26', '10:00am - 13:00 pm', '2024-02-10', '10:00am - 13:00 pm', 'Driver Drops, Rings & Wait', 'Infor is a multinational company headquartered in New York City that provides industry specific, enterprise software licensed for use on premises or as a service. As of 2016, Infor\'s software had 58 million users, and 90,000 corporate customers in', 'once', 33, '0', 'complete', 'not-paid', NULL, NULL, '2024-01-25 00:05:14', '2024-01-25 01:47:01', NULL, NULL, NULL),
(37, 'sav37', '2024-01-26', '10:00am - 13:00 pm', '2024-02-07', '10:00am - 13:00 pm', 'Leave it at The Door', 'sdf ds hdg', 'once', 35, '0', 'complete', 'paid', NULL, NULL, '2024-01-25 01:49:24', '2024-01-25 02:14:03', NULL, NULL, NULL),
(38, 'sav38', '2024-01-27', '5:00pm - 7:00pm', '2024-02-14', '10:00am - 13:00 pm', 'Leave it at The Door', 'asdas', 'weekly', 36, '0', 'uncompleted', 'not-paid', NULL, NULL, '2024-01-26 11:21:54', '2024-01-26 11:21:54', NULL, NULL, NULL),
(39, 'sav39', '2024-02-03', '5:00pm - 7:00pm', '2024-02-12', '5:00pm - 7:00pm', 'Driver Drops, Rings & Wait', NULL, 'once', 37, '0', 'uncompleted', 'not-paid', NULL, NULL, '2024-01-29 18:22:37', '2024-01-29 18:22:37', NULL, NULL, NULL),
(40, 'sav40', '2024-02-09', '10:00am - 13:00 pm', '2024-02-11', '6:00pm - 7:00pm', 'Leave it at The Door', 'ewf adfdasfca', 'two_weeks', 43, '0', 'uncompleted', 'not-paid', NULL, NULL, '2024-02-08 12:45:45', '2024-02-08 12:45:45', NULL, NULL, NULL),
(41, 'sav41', '2024-02-13', '10:00am - 13:00 pm', '2024-02-16', '10:00am - 13:00 pm', 'Driver Drops, Rings & Wait', 'e dasf das fas', 'four_weeks', 44, '0', 'uncompleted', 'not-paid', NULL, NULL, '2024-02-12 05:07:43', '2024-02-12 05:07:43', NULL, NULL, NULL),
(42, 'sav42', '2024-02-13', '10:00am - 13:00 pm', '2024-02-15', '10:00am - 13:00 pm', 'Driver Drops, Rings & Wait', 'dfsadsfasd', 'two_weeks', 4, '0', 'uncompleted', 'not-paid', NULL, NULL, '2024-02-12 06:29:41', '2024-02-12 06:29:41', NULL, NULL, NULL),
(43, 'sav43', '2024-02-12', '10:00am - 13:00 pm', '2024-02-14', '10:00am - 13:00 pm', 'Driver Drops, Rings & Wait', 'as fd fad', 'four_weeks', 4, '0', 'uncompleted', 'not-paid', NULL, NULL, '2024-02-12 06:35:54', '2024-02-12 06:35:54', NULL, NULL, NULL),
(44, 'sav44', '2024-02-20', '10:00am - 13:00 pm', '2024-03-01', '6:00pm - 7:00pm', 'Driver Drops, Rings & Wait', NULL, 'once', 37, '0', 'uncompleted', 'not-paid', NULL, NULL, '2024-02-17 11:34:51', '2024-02-17 11:34:51', NULL, NULL, NULL),
(45, 'sav45', '2024-03-29', '10:00am - 13:00 pm', '2024-04-17', '10:00am - 13:00 pm', 'Driver Drops, Rings & Wait', NULL, 'once', NULL, '63', 'uncompleted', 'paid', NULL, NULL, '2024-02-28 09:49:08', '2024-02-28 10:17:53', 'DMQhcVEY2d170911547362', NULL, NULL),
(46, 'sav46', '2024-03-02', '08.00 - 09.00', '2024-03-12', '08.00 - 09.00', 'Driver Drops, Rings & Wait', NULL, 'once', NULL, '49.5', 'complete', 'paid', NULL, NULL, '2024-02-28 10:21:21', '2024-02-28 11:03:08', 'gxN1syTZzK170911812762', NULL, NULL),
(47, 'sav47', '2024-04-01', '10:00am - 13:00 pm', '2024-04-03', '10:00am - 13:00 pm', 'Driver Drops, Rings & Wait', NULL, 'two_weeks', 68, '39', 'uncompleted', 'paid', NULL, NULL, '2024-03-01 12:23:38', '2024-03-01 12:25:16', '2I5a9pewWb170929591668', NULL, NULL),
(48, 'sav48', '2024-03-29', '10:00am - 13:00 pm', '2024-03-31', '10:00am - 13:00 pm', 'Driver Drops, Rings & Wait', NULL, 'weekly', 68, '0', 'uncompleted', 'not-paid', NULL, NULL, '2024-03-01 12:24:19', '2024-03-01 12:24:19', NULL, NULL, NULL),
(49, 'sav49', '2024-03-13', '10:00am - 13:00 pm', '2024-03-15', '10:00am - 13:00 pm', 'Driver Drops, Rings & Wait', NULL, 'once', 68, '0', 'uncompleted', 'not-paid', NULL, NULL, '2024-03-01 12:28:50', '2024-03-01 12:28:50', NULL, NULL, NULL),
(50, 'sav50', '2024-03-06', '10:00am - 13:00 pm', '2024-03-08', '10:00am - 13:00 pm', 'Driver Drops, Rings & Wait', NULL, 'four_weeks', 68, '0', 'uncompleted', 'not-paid', NULL, NULL, '2024-03-01 12:29:34', '2024-03-01 12:29:34', NULL, NULL, NULL),
(51, 'sav51', '2024-03-04', '10:00am - 13:00 pm', '2024-03-11', '6:00pm - 7:00pm', 'Driver Drops, Rings & Wait', NULL, 'once', 37, '0', 'uncompleted', 'not-paid', NULL, NULL, '2024-03-01 22:40:43', '2024-03-01 22:40:43', NULL, NULL, NULL),
(52, 'sav52', '2024-03-04', '10:00am - 13:00 pm', '2024-03-12', '10:00am - 13:00 pm', 'Driver Drops, Rings & Wait', NULL, 'once', 37, '0', 'uncompleted', 'not-paid', NULL, NULL, '2024-03-01 23:15:57', '2024-03-01 23:15:57', NULL, NULL, NULL),
(53, 'sav53', '2024-03-22', '10:00am - 13:00 pm', '2024-03-24', '10:00am - 13:00 pm', 'Driver Drops, Rings & Wait', NULL, 'once', NULL, '60', 'uncompleted', 'paid', NULL, NULL, '2024-03-11 08:07:57', '2024-03-11 08:27:04', 'uHTG1Xl8XF171014562475', NULL, NULL),
(54, 'sav54', '2024-03-23', '10:00am - 13:00 pm', '2024-03-25', '10:00am - 13:00 pm', 'Driver Drops, Rings & Wait', NULL, 'once', NULL, '0', 'uncompleted', 'not-paid', NULL, NULL, '2024-03-11 08:38:21', '2024-03-11 08:38:21', NULL, NULL, NULL),
(55, 'sav55', '2024-03-25', '10:00am - 13:00 pm', '2024-03-27', '10:00am - 13:00 pm', 'Driver Drops, Rings & Wait', NULL, 'once', NULL, '0', 'uncompleted', 'not-paid', NULL, NULL, '2024-03-11 08:47:24', '2024-03-11 08:47:24', NULL, NULL, NULL),
(56, 'sav56', '2024-03-26', '10:00am - 13:00 pm', '2024-03-28', '10:00am - 13:00 pm', 'Driver Drops, Rings & Wait', NULL, 'once', 78, '120', 'uncompleted', 'paid', NULL, NULL, '2024-03-11 08:51:20', '2024-03-11 08:51:48', 'aQNSSYMPUc171014710878', NULL, NULL),
(57, 'sav57', '2024-03-23', '10:00am - 13:00 pm', '2024-03-25', '10:00am - 13:00 pm', 'Driver Drops, Rings & Wait', NULL, 'once', 78, '29.9', 'uncompleted', 'paid', NULL, NULL, '2024-03-11 08:53:18', '2024-03-11 08:53:44', 'RQa7fvkwbH171014722478', NULL, NULL),
(58, 'sav58', '2024-03-25', '10:00am - 13:00 pm', '2024-03-27', '10:00am - 13:00 pm', 'Driver Drops, Rings & Wait', NULL, 'once', 80, '57.5', 'uncompleted', 'paid', NULL, NULL, '2024-03-11 08:57:01', '2024-03-11 08:57:32', '4Kl7JXMGnQ171014745280', NULL, NULL),
(59, 'sav59', '2024-03-25', '10:00am - 13:00 pm', '2024-03-27', '10:00am - 13:00 pm', 'Driver Drops, Rings & Wait', NULL, 'once', 81, '0', 'uncompleted', 'not-paid', NULL, NULL, '2024-03-11 21:59:05', '2024-03-11 21:59:05', NULL, NULL, NULL),
(60, 'sav60', '2024-03-26', '10:00am - 13:00 pm', '2024-03-28', '10:00am - 13:00 pm', 'Driver Drops, Rings & Wait', NULL, 'once', 37, '0', 'uncompleted', 'not-paid', NULL, NULL, '2024-03-12 22:48:35', '2024-03-12 22:48:35', NULL, NULL, NULL),
(76, 'sav76', '2024-03-26', '10:00am - 13:00 pm', '2024-03-28', '10:00am - 13:00 pm', 'Driver Drops, Rings & Wait', NULL, 'once', NULL, '77.5', 'complete', 'paid', NULL, NULL, '2024-03-13 07:29:10', '2024-03-13 07:31:25', '0V5n8VUdFC171031504092', NULL, NULL),
(77, 'sav77', '2024-03-26', '10:00am - 13:00 pm', '2024-03-28', '10:00am - 13:00 pm', 'Driver Drops, Rings & Wait', NULL, 'once', NULL, '57.5', 'uncompleted', 'paid', NULL, NULL, '2024-03-13 07:30:08', '2024-03-13 07:31:45', '5yV1b8DKEi171031510592', NULL, NULL),
(78, 'sav78', '2024-03-16', '10:00am - 13:00 pm', '2024-03-18', '10:00am - 13:00 pm', 'Driver Drops, Rings & Wait', NULL, 'once', 37, '0', 'uncompleted', 'not-paid', NULL, NULL, '2024-03-13 22:26:46', '2024-03-13 22:26:46', NULL, NULL, NULL),
(79, 'sav79', '2024-03-30', '10:00am - 13:00 pm', '2024-04-01', '10:00am - 13:00 pm', 'Leave it at The Door', NULL, 'weekly', NULL, '85', 'uncompleted', 'paid', NULL, NULL, '2024-03-14 05:43:03', '2024-03-14 06:07:56', 'bKrnkGQ9bD171039647698', NULL, NULL),
(80, 'sav80', '2024-03-25', '10:00am - 13:00 pm', '2024-03-27', '10:00am - 13:00 pm', 'Driver Drops, Rings & Wait', NULL, 'two_weeks', NULL, '0', 'uncompleted', 'not-paid', NULL, NULL, '2024-03-14 05:45:08', '2024-03-14 05:45:08', NULL, NULL, NULL),
(81, 'sav81', '2024-03-29', '10:00am - 13:00 pm', '2024-03-31', '10:00am - 13:00 pm', 'Driver Drops, Rings & Wait', NULL, 'four_weeks', NULL, '0', 'uncompleted', 'not-paid', NULL, NULL, '2024-03-14 05:47:00', '2024-03-14 05:47:00', NULL, NULL, NULL),
(82, 'sav82', '2024-03-29', '10:00am - 13:00 pm', '2024-03-31', '10:00am - 13:00 pm', 'Leave it at The Door', NULL, 'weekly', 100, '102', 'complete', 'paid', NULL, NULL, '2024-03-14 06:19:22', '2024-03-14 06:20:49', '5FysyDmTdy1710397191100', NULL, NULL),
(83, 'sav83', '2024-04-01', '10:00am - 13:00 pm', '2024-04-03', '10:00am - 13:00 pm', 'Driver Drops, Rings & Wait', NULL, 'four_weeks', 100, '97.5', 'complete', 'paid', NULL, NULL, '2024-03-14 06:20:44', '2024-03-14 06:22:25', 'Px1wuJcMGA1710397278100', NULL, NULL),
(84, 'sav84', '2024-03-30', '10:00am - 13:00 pm', '2024-04-01', '10:00am - 13:00 pm', 'Driver Drops, Rings & Wait', NULL, 'once', 100, '139.5', 'complete', 'paid', NULL, NULL, '2024-03-14 06:22:17', '2024-03-14 06:24:15', 'OJwMYwEQOr1710397377100', NULL, NULL),
(85, 'sav85', '2024-04-01', '10:00am - 13:00 pm', '2024-04-03', '10:00am - 13:00 pm', 'Driver Drops, Rings & Wait', NULL, 'once', 100, '93', 'uncompleted', 'paid', NULL, NULL, '2024-03-14 06:24:09', '2024-03-14 06:24:37', 'J1A60y1PDL1710397477100', NULL, NULL),
(86, 'sav86', '2024-03-26', '10:00am - 13:00 pm', '2024-04-11', '10:00am - 13:00 pm', 'Driver Drops, Rings & Wait', NULL, 'once', 100, '703', 'uncompleted', 'paid', NULL, NULL, '2024-03-14 11:44:37', '2024-03-14 11:45:29', 'mf48Zv7uPw1710416729100', NULL, NULL),
(87, 'sav87', '2024-03-19', '10:00am - 13:00 pm', '2024-03-21', '10:00am - 13:00 pm', 'Leave it at The Door', NULL, 'once', 103, '0', 'uncompleted', 'not-paid', NULL, NULL, '2024-03-14 12:15:00', '2024-03-14 12:24:03', NULL, NULL, NULL),
(88, 'sav88', '2024-03-16', '10:00am - 13:00 pm', '2024-03-18', '10:00am - 13:00 pm', 'Leave it at The Door', 'turn right', 'weekly', 102, '0', 'uncompleted', 'not-paid', NULL, NULL, '2024-03-14 12:18:59', '2024-03-14 12:18:59', NULL, NULL, NULL),
(89, 'sav89', '2024-03-16', '10:00am - 13:00 pm', '2024-03-18', '10:00am - 13:00 pm', 'Leave it at The Door', 'right turn', 'weekly', 102, '0', 'uncompleted', 'not-paid', NULL, NULL, '2024-03-14 12:24:48', '2024-03-14 12:24:48', NULL, NULL, NULL),
(90, 'sav90', '2024-04-01', '10:00am - 13:00 pm', '2024-04-03', '10:00am - 13:00 pm', 'Driver Drops, Rings & Wait', NULL, 'once', 104, '0', 'uncompleted', 'not-paid', NULL, NULL, '2024-03-14 12:27:36', '2024-03-14 12:27:36', NULL, NULL, NULL),
(91, 'sav91', '2024-03-26', '10:00am - 13:00 pm', '2024-03-28', '10:00am - 13:00 pm', 'Driver Drops, Rings & Wait', NULL, 'once', 105, '0', 'uncompleted', 'not-paid', NULL, NULL, '2024-03-14 12:30:24', '2024-03-14 12:30:24', NULL, NULL, NULL),
(92, 'sav92', '2024-03-19', '10:00am - 13:00 pm', '2024-03-21', '10:00am - 13:00 pm', 'Leave it at The Door', NULL, 'weekly', 106, '0', 'uncompleted', 'not-paid', NULL, NULL, '2024-03-14 12:30:35', '2024-03-14 12:30:35', NULL, NULL, NULL),
(93, 'sav93', '2024-03-23', '10:00am - 13:00 pm', '2024-03-25', '10:00am - 13:00 pm', 'Leave it at The Door', NULL, 'two_weeks', 107, '0', 'uncompleted', 'not-paid', NULL, NULL, '2024-03-14 12:37:56', '2024-03-14 12:37:56', NULL, NULL, NULL),
(94, 'sav94', '2024-03-16', '10:00am - 13:00 pm', '2024-03-18', '10:00am - 13:00 pm', 'Driver Drops, Rings & Wait', '2qdwfegg', 'once', 107, '16.5', 'complete', 'paid', NULL, NULL, '2024-03-14 12:38:45', '2024-03-14 12:57:08', 'HLKJQZfKzH1710421028107', NULL, NULL),
(95, 'sav95', '2024-03-15', '6:00pm - 7:00pm', '2024-03-24', '10:00am - 13:00 pm', 'Driver Drops, Rings & Wait', 'grtrggfggfg', 'two_weeks', 108, '0', 'uncompleted', 'not-paid', NULL, NULL, '2024-03-14 12:41:40', '2024-03-14 12:41:40', NULL, NULL, NULL),
(96, 'sav96', '2024-03-25', '10:00am - 13:00 pm', '2024-03-27', '10:00am - 13:00 pm', 'Driver Drops, Rings & Wait', NULL, 'once', 109, '186', 'uncompleted', 'paid', NULL, NULL, '2024-03-14 12:42:38', '2024-03-14 12:55:07', 'MZm2RbTgqM1710420907109', NULL, NULL),
(97, 'sav97', '2024-03-23', '10:00am - 13:00 pm', '2024-03-25', '10:00am - 13:00 pm', 'Driver Drops, Rings & Wait', NULL, 'once', 109, '2193.5', 'uncompleted', 'paid', NULL, NULL, '2024-03-14 12:44:54', '2024-03-14 12:46:31', '64ltfJ7rSg1710420391109', NULL, NULL),
(98, 'sav98', '2024-03-19', '10:00am - 13:00 pm', '2024-03-21', '10:00am - 13:00 pm', 'Driver Drops, Rings & Wait', NULL, 'once', 37, '0', 'uncompleted', 'not-paid', NULL, NULL, '2024-03-15 22:20:23', '2024-03-15 22:20:23', NULL, NULL, NULL),
(99, 'sav99', '2024-03-27', '10:00am - 13:00 pm', '2024-04-02', '10:00am - 13:00 pm', 'Driver Drops, Rings & Wait', NULL, 'once', 37, '0', 'uncompleted', 'not-paid', NULL, NULL, '2024-03-15 22:22:04', '2024-03-15 22:22:04', NULL, NULL, NULL),
(100, 'sav100', '2024-03-27', '10:00am - 13:00 pm', '2024-03-29', '10:00am - 13:00 pm', 'Driver Drops, Rings & Wait', NULL, 'once', 37, '0', 'uncompleted', 'not-paid', NULL, NULL, '2024-03-15 22:52:40', '2024-03-15 22:52:40', NULL, NULL, NULL),
(101, 'sav101', '2024-03-20', '10:00am - 13:00 pm', '2024-03-22', '10:00am - 13:00 pm', 'Driver Drops, Rings & Wait', NULL, 'once', 37, '0', 'uncompleted', 'not-paid', NULL, NULL, '2024-03-16 17:04:54', '2024-03-16 17:04:54', NULL, NULL, NULL),
(102, 'sav102', '2024-03-18', '10:00am - 13:00 pm', '2024-03-20', '10:00am - 13:00 pm', 'Driver Drops, Rings & Wait', NULL, 'once', 110, '0', 'uncompleted', 'not-paid', NULL, NULL, '2024-03-16 17:06:14', '2024-03-16 17:09:31', NULL, NULL, NULL),
(103, 'sav103', '2024-03-18', '10:00am - 13:00 pm', '2024-03-20', '10:00am - 13:00 pm', 'Driver Drops, Rings & Wait', NULL, 'once', 110, '0', 'uncompleted', 'not-paid', NULL, NULL, '2024-03-16 22:42:30', '2024-03-16 22:42:30', NULL, NULL, NULL),
(104, 'sav104', '2024-04-03', '10:00am - 13:00 pm', '2024-04-05', '10:00am - 13:00 pm', 'Driver Drops, Rings & Wait', NULL, 'once', 111, '210', 'uncompleted', 'paid', NULL, NULL, '2024-03-18 12:38:37', '2024-03-18 12:39:40', 'HztXh7Y3zD1710765580111', NULL, NULL),
(105, 'sav105', '2024-03-20', '10:00am - 13:00 pm', '2024-03-27', '10:00am - 13:00 pm', 'Driver Drops, Rings & Wait', NULL, 'once', 110, '0', 'complete', 'not-paid', NULL, NULL, '2024-03-18 18:02:11', '2024-03-24 22:12:19', NULL, NULL, NULL),
(106, 'sav106', '2024-03-27', '10:00am - 13:00 pm', '2024-03-29', '10:00am - 13:00 pm', 'Driver Drops, Rings & Wait', NULL, 'two_weeks', 112, '175', 'complete', 'paid', NULL, NULL, '2024-03-19 06:21:47', '2024-03-19 06:23:04', '37H8haBraV1710829377112', NULL, NULL),
(107, 'sav107', '2024-04-05', '10:00am - 13:00 pm', '2024-04-07', '10:00am - 13:00 pm', 'Driver Drops, Rings & Wait', NULL, 'weekly', 112, '163', 'complete', 'paid', NULL, NULL, '2024-03-19 06:23:30', '2024-03-19 06:24:38', 'j1Oph27hmQ1710829475112', NULL, NULL),
(108, 'sav108', '2024-03-30', '10:00am - 13:00 pm', '2024-04-01', '10:00am - 13:00 pm', 'Driver Drops, Rings & Wait', NULL, 'four_weeks', 112, '270', 'complete', 'paid', NULL, NULL, '2024-03-19 06:25:54', '2024-03-19 06:26:38', 'GPXmaFiomw1710829595112', NULL, NULL),
(109, 'sav109', '2024-04-03', '10:00am - 13:00 pm', '2024-04-05', '10:00am - 13:00 pm', 'Driver Drops, Rings & Wait', NULL, 'weekly', 113, '120', 'complete', 'paid', NULL, NULL, '2024-03-19 06:31:52', '2024-03-19 06:32:22', 'FuZEpJEtdG1710829939113', NULL, NULL),
(110, 'sav110', '2024-04-02', '10:00am - 13:00 pm', '2024-04-04', '10:00am - 13:00 pm', 'Driver Drops, Rings & Wait', NULL, 'two_weeks', 113, '175', 'complete', 'paid', NULL, NULL, '2024-03-19 06:32:42', '2024-04-11 23:23:50', 'IpTkVEKzXY1710829990113', '2024-04-11 23:23:50', NULL),
(111, 'sav111', '2024-04-05', '10:00am - 13:00 pm', '2024-04-07', '10:00am - 13:00 pm', 'Driver Drops, Rings & Wait', NULL, 'four_weeks', 113, '77.5', 'complete', 'paid', NULL, NULL, '2024-03-19 06:34:01', '2024-03-19 06:34:25', 'hd2kGasQW61710830062113', NULL, NULL),
(112, 'sav112', '2024-03-30', '6:00pm - 7:00pm', '2024-04-08', '6:00pm - 7:00pm', 'Driver Drops, Rings & Wait', NULL, 'once', 37, '114', 'complete', 'paid', NULL, NULL, '2024-03-20 22:35:19', '2024-03-20 22:44:53', 'oGfGxtfB2o171097421337', NULL, NULL),
(113, 'sav113', '2024-04-04', '10:00am - 13:00 pm', '2024-04-06', '10:00am - 13:00 pm', 'Driver Drops, Rings & Wait', NULL, 'once', 37, '0', 'uncompleted', 'not-paid', NULL, NULL, '2024-04-02 15:00:27', '2024-04-02 15:00:27', NULL, NULL, NULL),
(114, 'sav114', '2024-04-04', '10:00am - 13:00 pm', '2024-04-06', '10:00am - 13:00 pm', 'Driver Drops, Rings & Wait', NULL, 'once', 37, '19.5', 'processed', 'paid', NULL, NULL, '2024-04-02 15:00:32', '2024-04-12 22:15:12', 'QD8EDLBZsB171296011037', '2024-04-12 22:15:03', '2024-04-12 22:15:12'),
(115, 'sav115', '2024-04-09', '10:00am - 13:00 pm', '2024-04-11', '10:00am - 13:00 pm', 'Leave it at The Door', 'This is a test instruction for the driver', 'once', 114, '2263.5', 'completed', 'paid', NULL, NULL, '2024-04-07 00:23:50', '2024-04-12 14:11:55', 'mxtDW3aoHp1712695621114', '2024-04-09 20:42:29', '2024-04-12 13:58:14'),
(116, 'sav116', '2024-04-09', '6:00pm - 7:00pm', '2024-04-11', '10:00am - 13:00 pm', 'Driver Drops, Rings & Wait', 'Test special', 'once', 114, '40.5', 'completed', 'paid', NULL, NULL, '2024-04-09 19:39:05', '2024-04-12 22:14:36', 'uBkpYMrkrs1712960039114', '2024-04-12 22:13:47', '2024-04-12 22:14:34'),
(117, 'sav117', '2024-04-13', '5:00pm - 6:00pm', '2024-04-15', '10:00am - 13:00 pm', 'Leave it at The Door', 'Test instructions', 'once', 114, '5.29', 'completed', 'paid', NULL, NULL, '2024-04-13 04:24:49', '2024-04-13 04:39:15', 'AcMV4TjXLy1712983143114', '2024-04-13 04:33:23', '2024-04-13 04:39:07'),
(118, 'sav118', '2024-04-18', '10:00am - 13:00 pm', '2024-04-20', '10:00am - 13:00 pm', 'Driver Drops, Rings & Wait', 'Aut ut lorem nostrum', 'weekly', 114, '0', 'uncompleted', 'not-paid', NULL, NULL, '2024-04-15 11:47:40', '2024-04-15 11:47:40', NULL, NULL, NULL),
(119, 'sav119', '2024-04-19', '10:00am - 13:00 pm', '2024-04-21', '10:00am - 13:00 pm', 'Driver Drops, Rings & Wait', 'Duis recusandae Dol', 'two_weeks', 114, '0', 'cancelled', 'not-paid', NULL, NULL, '2024-04-15 11:57:02', '2024-04-16 18:08:51', NULL, NULL, NULL),
(120, 'sav120', '2024-04-17', '10:00am - 13:00 pm', '2024-04-19', '10:00am - 13:00 pm', 'Leave it at The Door', 'Occaecat ut deserunt', 'two_weeks', 114, '0', 'uncompleted', 'not-paid', NULL, NULL, '2024-04-15 12:04:21', '2024-04-15 12:04:21', NULL, NULL, NULL),
(121, 'sav121', '2024-04-17', '10:00am - 13:00 pm', '2024-04-19', '10:00am - 13:00 pm', 'Driver Drops, Rings & Wait', 'test dsfsfdsa', 'once', 114, '0', 'uncompleted', 'not-paid', NULL, NULL, '2024-04-15 12:09:26', '2024-04-15 12:09:26', NULL, NULL, NULL),
(122, 'sav122', '2024-04-18', '10:00am - 13:00 pm', '2024-04-20', '10:00am - 13:00 pm', 'Driver Drops, Rings & Wait', NULL, 'once', 114, '0', 'uncompleted', 'not-paid', NULL, NULL, '2024-04-15 12:10:58', '2024-04-15 12:10:58', NULL, NULL, NULL),
(123, 'sav123', '2024-04-18', '10:00am - 13:00 pm', '2024-04-20', '10:00am - 13:00 pm', 'Driver Drops, Rings & Wait', NULL, 'once', 114, '0', 'uncompleted', 'not-paid', NULL, NULL, '2024-04-15 12:12:42', '2024-04-15 12:12:42', NULL, NULL, NULL),
(124, 'sav124', '2024-04-17', '10:00am - 13:00 pm', '2024-04-19', '10:00am - 13:00 pm', 'Driver Drops, Rings & Wait', 'dfgdfgdf', 'once', 114, '0', 'uncompleted', 'not-paid', NULL, NULL, '2024-04-15 12:16:21', '2024-04-15 12:16:21', NULL, NULL, NULL),
(125, 'sav125', '2024-04-19', '10:00am - 13:00 pm', '2024-04-21', '10:00am - 13:00 pm', 'Driver Drops, Rings & Wait', NULL, 'once', 114, '0', 'uncompleted', 'not-paid', NULL, NULL, '2024-04-15 12:17:30', '2024-04-15 12:17:30', NULL, NULL, NULL),
(126, 'sav126', '2024-04-19', '10:00am - 13:00 pm', '2024-04-21', '10:00am - 13:00 pm', 'Driver Drops, Rings & Wait', NULL, 'once', 114, '0', 'uncompleted', 'not-paid', NULL, NULL, '2024-04-15 12:19:54', '2024-04-15 12:19:54', NULL, NULL, NULL),
(127, 'sav127', '2024-04-19', '10:00am - 13:00 pm', '2024-04-21', '10:00am - 13:00 pm', 'Driver Drops, Rings & Wait', NULL, 'once', 114, '0', 'cancelled', 'not-paid', NULL, NULL, '2024-04-15 12:20:44', '2024-04-19 12:57:07', NULL, NULL, NULL),
(128, 'sav128', '2024-04-18', '10:00am - 13:00 pm', '2024-04-20', '10:00am - 13:00 pm', 'Driver Drops, Rings & Wait', 'fdgdfg', 'once', 114, '0', 'cancelled', 'not-paid', NULL, NULL, '2024-04-15 12:21:21', '2024-04-19 12:53:03', NULL, NULL, NULL),
(129, 'sav129', '2024-04-20', '10:00am - 13:00 pm', '2024-04-22', '10:00am - 13:00 pm', 'Driver Drops, Rings & Wait', 'test', 'once', 114, '0', 'cancelled', 'not-paid', NULL, NULL, '2024-04-16 18:32:34', '2024-04-19 12:52:23', NULL, NULL, NULL),
(130, 'sav130', '2024-04-22', '10:00am - 13:00 pm', '2024-04-22', '10:00am - 13:00 pm', 'Driver Drops, Rings & Wait', 'test', 'two_weeks', 116, '0', 'cancelled', 'not-paid', NULL, NULL, '2024-04-16 18:41:20', '2024-04-19 12:48:37', NULL, NULL, NULL),
(131, 'sav131', '2024-04-18', '5:00pm - 6:00pm', '2024-04-20', '10:00am - 13:00 pm', 'Driver Drops, Rings & Wait', NULL, 'once', 37, '31', 'completed', 'paid', NULL, NULL, '2024-04-16 22:33:26', '2024-04-16 22:35:12', '38Hdp8bD31171330690537', '2024-04-16 22:34:24', '2024-04-16 22:35:10'),
(132, 'sav132', '2024-04-20', '6:00pm - 7:00pm', '2024-04-25', '10:00am - 13:00 pm', 'Driver Drops, Rings & Wait', 'Code 2210#', 'once', 37, '0', 'cancelled', 'not-paid', NULL, NULL, '2024-04-16 22:44:17', '2024-04-18 21:28:41', NULL, '2024-04-18 15:55:32', NULL),
(133, 'sav133', '2024-04-21', '10:00am - 13:00 pm', '2024-04-23', '10:00am - 13:00 pm', 'Driver Drops, Rings & Wait', 'test', 'once', 114, '0', 'cancelled', 'not-paid', NULL, NULL, '2024-04-18 21:35:58', '2024-04-19 12:45:48', NULL, NULL, NULL),
(134, 'sav134', '2024-04-22', '10:00am - 13:00 pm', '2024-04-24', '10:00am - 13:00 pm', 'Driver Drops, Rings & Wait', 'gate codeis 2244/', 'once', 37, '0', 'cancelled', 'not-paid', NULL, NULL, '2024-04-18 21:37:12', '2024-04-18 21:37:26', NULL, NULL, NULL),
(135, 'sav135', '2024-04-21', '10:00am - 13:00 pm', '2024-04-23', '10:00am - 13:00 pm', 'Driver Drops, Rings & Wait', 'Test collection', 'once', 114, '0', 'uncompleted', 'not-paid', NULL, NULL, '2024-04-19 13:10:11', '2024-04-19 13:10:11', NULL, NULL, NULL),
(136, 'sav136', '2024-04-27', '10:00am - 13:00 pm', '2024-05-11', '10:00am - 13:00 pm', 'Driver Drops, Rings & Wait', 'Special Driver Instruction', 'once', 114, '0', 'cancelled', 'not-paid', NULL, NULL, '2024-04-19 13:14:52', '2024-04-30 22:23:31', NULL, NULL, NULL),
(137, NULL, '2024-04-25', '6:00pm - 7:00pm', '2024-04-26', '6:00pm - 7:00pm', NULL, NULL, 'once', NULL, '0', 'uncompleted', 'not-paid', NULL, NULL, '2024-04-19 14:10:35', '2024-04-19 14:10:35', NULL, NULL, NULL),
(138, NULL, '2024-05-05', '6:00pm - 7:00pm', '2024-05-06', '6:00pm - 7:00pm', NULL, NULL, 'once', NULL, '0', 'uncompleted', 'not-paid', NULL, NULL, '2024-04-19 14:10:47', '2024-04-19 14:10:47', NULL, NULL, NULL),
(139, NULL, '2024-05-05', '10:00am - 13:00 pm', '2024-05-07', '10:00am - 13:00 pm', NULL, NULL, 'once', NULL, '0', 'uncompleted', 'not-paid', NULL, NULL, '2024-04-19 14:11:02', '2024-04-19 14:11:02', NULL, NULL, NULL),
(140, NULL, '2024-04-29', '10:00am - 13:00 pm', '2024-05-15', '10:00am - 13:00 pm', NULL, NULL, 'once', NULL, '0', 'uncompleted', 'not-paid', NULL, NULL, '2024-04-19 14:15:32', '2024-04-19 14:15:32', NULL, NULL, NULL),
(141, 'sav141', '2024-05-03', '10:00am - 13:00 pm', '2024-05-11', '10:00am - 13:00 pm', 'Driver Drops, Rings & Wait', NULL, 'once', 37, '0', 'cancelled', 'not-paid', NULL, NULL, '2024-05-02 20:56:57', '2024-05-02 20:57:44', NULL, NULL, NULL),
(142, 'sav142', '2024-05-08', '10:00am - 13:00 pm', '2024-05-10', '10:00am - 13:00 pm', 'Driver Drops, Rings & Wait', NULL, 'once', 114, '36', 'uncompleted', 'paid', NULL, NULL, '2024-05-07 06:37:49', '2024-05-07 06:56:11', 'CVC0LcLZlb1715064971114', '2024-05-07 06:38:34', NULL),
(143, 'sav143', '2024-05-09', '10:00am - 13:00 pm', '2024-05-11', '10:00am - 13:00 pm', 'Driver Drops, Rings & Wait', NULL, 'once', 114, '58.94', 'uncompleted', 'paid', NULL, NULL, '2024-05-07 07:02:15', '2024-05-07 07:05:11', 'hDEXNnZ0qC1715065511114', '2024-05-07 07:03:34', NULL),
(144, 'sav144', '2024-05-19', '10:00am - 13:00 pm', '2024-05-21', '10:00am - 13:00 pm', 'Driver Drops, Rings & Wait', NULL, 'once', 114, '0', 'uncompleted', 'not-paid', NULL, NULL, '2024-05-17 07:06:07', '2024-05-17 07:06:07', NULL, NULL, NULL),
(145, 'sav145', '2024-05-19', '10:00am - 13:00 pm', '2024-05-21', '10:00am - 13:00 pm', 'Driver Drops, Rings & Wait', NULL, 'once', 114, '0', 'uncompleted', 'not-paid', NULL, NULL, '2024-05-17 07:06:21', '2024-05-17 07:06:21', NULL, NULL, NULL),
(146, 'sav146', '2024-05-20', '10:00am - 13:00 pm', '2024-05-22', '10:00am - 13:00 pm', 'Driver Drops, Rings & Wait', NULL, 'once', 114, '0', 'uncompleted', 'not-paid', NULL, NULL, '2024-05-17 07:11:24', '2024-05-17 07:11:24', NULL, NULL, NULL),
(147, 'sav147', '2024-05-19', '10:00am - 13:00 pm', '2024-05-21', '10:00am - 13:00 pm', 'Driver Drops, Rings & Wait', NULL, 'once', 114, '0', 'uncompleted', 'not-paid', NULL, NULL, '2024-05-17 07:12:21', '2024-05-17 07:12:21', NULL, NULL, NULL),
(148, 'sav148', '2024-05-24', '10:00am - 13:00 pm', '2024-05-26', '10:00am - 13:00 pm', 'Driver Drops, Rings & Wait', NULL, 'once', 114, '130', 'uncompleted', 'paid', NULL, NULL, '2024-05-17 07:13:45', '2024-05-17 10:28:44', 'K4bzjY3IPP1715941724114', '2024-05-17 09:09:43', NULL),
(149, 'sav149', '2024-05-19', '10:00am - 13:00 pm', '2024-05-21', '10:00am - 13:00 pm', 'Driver Drops, Rings & Wait', NULL, 'once', 114, '0', 'uncompleted', 'not-paid', NULL, NULL, '2024-05-17 07:21:36', '2024-05-17 07:21:36', NULL, NULL, NULL),
(150, 'sav150', '2024-05-19', '10:00am - 13:00 pm', '2024-05-21', '10:00am - 13:00 pm', 'Driver Drops, Rings & Wait', NULL, 'once', 114, '0', 'uncompleted', 'not-paid', NULL, NULL, '2024-05-17 07:25:48', '2024-05-17 07:25:48', NULL, NULL, NULL),
(151, 'sav151', '2024-05-23', '10:00am - 13:00 pm', '2024-05-25', '10:00am - 13:00 pm', 'Driver Drops, Rings & Wait', NULL, 'once', 114, '0', 'uncompleted', 'not-paid', NULL, NULL, '2024-05-17 07:33:54', '2024-05-17 07:33:54', NULL, NULL, NULL),
(152, 'sav152', '2024-05-24', '10:00am - 13:00 pm', '2024-05-26', '10:00am - 13:00 pm', 'Driver Drops, Rings & Wait', NULL, 'once', 114, '0', 'uncompleted', 'not-paid', NULL, NULL, '2024-05-17 07:34:38', '2024-05-17 07:34:38', NULL, NULL, NULL),
(153, 'sav153', '2024-05-26', '10:00am - 13:00 pm', '2024-05-28', '10:00am - 13:00 pm', 'Driver Drops, Rings & Wait', NULL, 'once', 114, '0', 'uncompleted', 'not-paid', NULL, NULL, '2024-05-17 07:37:54', '2024-05-17 07:37:54', NULL, NULL, NULL),
(154, 'sav154', '2024-05-20', '10:00am - 13:00 pm', '2024-05-22', '10:00am - 13:00 pm', 'Driver Drops, Rings & Wait', NULL, 'once', 114, '0', 'uncompleted', 'not-paid', NULL, NULL, '2024-05-17 07:48:27', '2024-05-17 07:48:27', NULL, NULL, NULL),
(155, 'sav155', '2024-05-21', '10:00am - 13:00 pm', '2024-05-23', '10:00am - 13:00 pm', 'Driver Drops, Rings & Wait', NULL, 'once', 114, '297', 'uncompleted', 'paid', NULL, NULL, '2024-05-17 07:49:56', '2024-05-17 10:34:41', 'RyvvjmOBkA1715942081114', '2024-05-17 10:33:56', NULL),
(156, 'sav156', '2024-06-11', '10:00am - 13:00 pm', '2024-06-13', '10:00am - 13:00 pm', 'Driver Drops, Rings & Wait', NULL, 'once', 114, '0', 'uncompleted', 'not-paid', NULL, NULL, '2024-05-17 07:51:22', '2024-05-17 07:51:22', NULL, NULL, NULL),
(157, 'sav157', '2024-06-11', '10:00am - 13:00 pm', '2024-06-13', '10:00am - 13:00 pm', 'Driver Drops, Rings & Wait', NULL, 'once', 114, '0', 'uncompleted', 'not-paid', NULL, NULL, '2024-05-17 07:54:09', '2024-05-17 07:54:09', NULL, NULL, NULL),
(158, 'sav158', '2024-05-20', '10:00am - 13:00 pm', '2024-05-31', '10:00am - 13:00 pm', 'Driver Drops, Rings & Wait', 'Hate code 4334', 'once', 37, '0', 'uncompleted', 'not-paid', NULL, NULL, '2024-05-18 08:14:47', '2024-05-18 08:14:47', NULL, NULL, NULL),
(159, 'sav159', '2024-05-21', '5:00pm - 6:00pm', '2024-05-23', '10:00am - 13:00 pm', 'Driver Drops, Rings & Wait', NULL, 'once', 37, '0', 'uncompleted', 'not-paid', NULL, NULL, '2024-05-19 12:33:15', '2024-05-19 12:33:15', NULL, NULL, NULL),
(160, 'sav160', '2024-05-22', '10:00am - 13:00 pm', '2024-05-24', '10:00am - 13:00 pm', 'Driver Drops, Rings & Wait', NULL, 'once', 37, '0', 'uncompleted', 'not-paid', NULL, NULL, '2024-05-20 21:09:51', '2024-05-20 21:09:51', NULL, NULL, NULL),
(161, 'sav161', '2024-05-24', '10:00am - 13:00 pm', '2024-06-02', '10:00am - 13:00 pm', 'Driver Drops, Rings & Wait', NULL, 'once', 37, '0', 'uncompleted', 'not-paid', NULL, NULL, '2024-05-22 07:52:29', '2024-05-22 07:52:29', NULL, NULL, NULL),
(162, 'sav162', '2024-05-27', '10:00am - 13:00 pm', '2024-05-29', '10:00am - 13:00 pm', 'Driver Drops, Rings & Wait', NULL, 'once', 114, '36', 'uncompleted', 'paid', NULL, NULL, '2024-05-26 00:12:04', '2024-05-26 00:15:08', 'TsSa7sB4ZL1716682508114', '2024-05-26 00:14:19', NULL),
(163, 'sav163', '2024-05-29', '10:00am - 13:00 pm', '2024-05-31', '10:00am - 13:00 pm', 'Driver Drops, Rings & Wait', NULL, 'once', 37, '0', 'uncompleted', 'not-paid', NULL, NULL, '2024-05-26 00:33:45', '2024-05-26 00:33:45', NULL, NULL, NULL),
(164, 'sav164', '2024-06-05', '10:00am - 13:00 pm', '2024-06-09', '10:00am - 13:00 pm', 'Driver Drops, Rings & Wait', NULL, 'once', 37, '39', 'completed', 'paid', NULL, NULL, '2024-06-03 23:25:42', '2024-06-04 16:51:30', 'FB20EaxUoX171751983337', '2024-06-04 16:50:15', '2024-06-04 16:50:52'),
(165, 'sav165', '2024-06-07', '10:00am - 13:00 pm', '2024-06-09', '10:00am - 13:00 pm', 'Driver Drops, Rings & Wait', NULL, 'once', 114, '36', 'completed', 'paid', NULL, NULL, '2024-06-05 12:42:10', '2024-06-05 12:47:57', 'ncCBn4mMY81717591388114', '2024-06-05 12:42:48', '2024-06-05 12:47:52'),
(166, 'sav166', '2024-06-08', '10:00am - 13:00 pm', '2024-06-10', '10:00am - 13:00 pm', 'Driver Drops, Rings & Wait', NULL, 'once', 114, '6.94', 'completed', 'paid', NULL, NULL, '2024-06-05 12:49:50', '2024-06-05 12:52:36', 'mRjXMNUDiJ1717591907114', '2024-06-05 12:51:17', '2024-06-05 12:52:30'),
(167, 'sav167', '2024-06-26', '10:00am - 13:00 pm', '2024-07-03', '5:00pm - 6:00pm', 'Driver Drops, Rings & Wait', NULL, 'once', 37, '0', 'uncompleted', 'not-paid', NULL, NULL, '2024-06-23 23:26:21', '2024-06-23 23:26:21', NULL, NULL, NULL),
(168, 'sav168', '2024-07-18', '6:00pm - 7:00pm', '2024-07-18', '6:00pm - 7:00pm', 'Leave it at The Door', 'sdsdsdsdv', 'weekly', 118, '0', 'uncompleted', 'not-paid', NULL, NULL, '2024-07-17 05:48:16', '2024-07-17 05:48:16', NULL, NULL, NULL),
(169, 'sav169', '2024-07-25', '10:00am - 13:00 pm', '2024-07-27', '10:00am - 13:00 pm', 'Driver Drops, Rings & Wait', NULL, 'once', 37, '0', 'uncompleted', 'not-paid', NULL, NULL, '2024-07-23 08:00:08', '2024-07-23 08:00:08', NULL, NULL, NULL),
(170, 'sav170', '2024-08-12', '10:00am - 13:00 pm', '2024-08-14', '10:00am - 13:00 pm', 'Leave it at The Door', NULL, 'once', 124, '0', 'uncompleted', 'not-paid', NULL, NULL, '2024-07-27 18:52:51', '2024-07-27 18:52:51', NULL, NULL, NULL),
(171, 'sav171', '2024-08-10', '5:00pm - 6:00pm', '2024-08-10', '10:00am - 13:00 pm', 'Leave it at The Door', NULL, 'once', 126, '0', 'uncompleted', 'not-paid', NULL, NULL, '2024-07-27 21:08:10', '2024-07-27 21:20:25', NULL, NULL, NULL),
(172, 'sav172', '2024-07-28', '10:00am - 13:00 pm', '2024-07-30', '10:00am - 13:00 pm', 'Driver Drops, Rings & Wait', NULL, 'once', 123, '0', 'uncompleted', 'not-paid', NULL, NULL, '2024-07-27 21:47:06', '2024-07-27 21:47:06', NULL, NULL, NULL),
(173, 'sav173', '2024-07-29', '10:00am - 13:00 pm', '2024-07-31', '10:00am - 13:00 pm', 'Driver Drops, Rings & Wait', NULL, 'once', 123, '0', 'uncompleted', 'not-paid', NULL, NULL, '2024-07-28 00:43:22', '2024-07-28 00:43:22', NULL, NULL, NULL),
(174, 'sav174', '2024-08-07', '10:00am - 13:00 pm', '2024-08-07', '10:00am - 13:00 pm', 'Driver Drops, Rings & Wait', NULL, 'once', 37, '0', 'cancelled', 'not-paid', NULL, NULL, '2024-07-31 19:43:55', '2024-08-03 20:57:08', NULL, NULL, NULL),
(175, 'sav175', '2024-08-07', '10:00am - 13:00 pm', '2024-08-09', '10:00am - 13:00 pm', 'Leave it at The Door', NULL, 'once', 127, '0', 'uncompleted', 'not-paid', NULL, NULL, '2024-08-03 21:59:13', '2024-08-03 21:59:13', NULL, NULL, NULL),
(176, 'sav176', '2024-08-10', '5:00pm - 6:00pm', '2024-08-20', '10:00am - 13:00 pm', 'Driver Drops, Rings & Wait', NULL, 'once', 128, '0', 'uncompleted', 'not-paid', NULL, NULL, '2024-08-04 11:40:45', '2024-08-04 11:40:45', NULL, NULL, NULL),
(177, 'sav177', '2024-08-05', '10:00am - 13:00 pm', '2024-08-07', '10:00am - 13:00 pm', 'Leave it at The Door', NULL, 'once', 122, '0', 'uncompleted', 'not-paid', NULL, NULL, '2024-08-04 11:50:13', '2024-08-04 11:50:13', NULL, NULL, NULL),
(178, 'sav178', '2024-08-05', '10:00am - 13:00 pm', '2024-08-07', '10:00am - 13:00 pm', 'Driver Drops, Rings & Wait', NULL, 'once', 123, '0', 'uncompleted', 'not-paid', NULL, NULL, '2024-08-04 12:02:01', '2024-08-04 12:02:01', NULL, NULL, NULL),
(179, 'sav179', '2024-08-06', '10:00am - 13:00 pm', '2024-08-08', '10:00am - 13:00 pm', 'Driver Drops, Rings & Wait', NULL, 'once', 37, '11.5', 'processed', 'paid', NULL, NULL, '2024-08-04 22:39:51', '2024-08-04 22:46:50', 'eZTFfazDb1172281160437', '2024-08-04 22:46:31', '2024-08-04 22:46:50'),
(180, 'sav180', '2024-08-06', '10:00am - 13:00 pm', '2024-08-08', '10:00am - 13:00 pm', 'Driver Drops, Rings & Wait', NULL, 'once', 37, '237', 'uncompleted', 'paid', NULL, NULL, '2024-08-04 22:53:38', '2024-08-04 22:54:41', 'd3tqSUWGap172281208137', '2024-08-04 22:54:14', NULL),
(181, 'sav181', '2024-08-09', '10:00am - 13:00 pm', '2024-08-11', '10:00am - 13:00 pm', 'Driver Drops, Rings & Wait', NULL, 'once', 123, '0', 'uncompleted', 'not-paid', NULL, NULL, '2024-08-08 22:06:01', '2024-08-08 22:06:01', NULL, NULL, NULL),
(182, 'sav182', '2024-08-09', '10:00am - 13:00 pm', '2024-08-11', '10:00am - 13:00 pm', 'Driver Drops, Rings & Wait', NULL, 'once', 123, '0', 'uncompleted', 'not-paid', NULL, NULL, '2024-08-08 22:40:08', '2024-08-08 22:40:08', NULL, NULL, NULL),
(183, 'sav183', '2024-08-09', '10:00am - 13:00 pm', '2024-08-11', '10:00am - 13:00 pm', 'Driver Drops, Rings & Wait', NULL, 'once', 123, '0', 'uncompleted', 'not-paid', NULL, NULL, '2024-08-08 23:23:32', '2024-08-08 23:23:32', NULL, NULL, NULL),
(184, 'sav184', '2024-08-09', '10:00am - 13:00 pm', '2024-08-11', '10:00am - 13:00 pm', 'Driver Drops, Rings & Wait', NULL, 'once', 123, '0', 'uncompleted', 'not-paid', NULL, NULL, '2024-08-08 23:44:38', '2024-08-08 23:44:38', NULL, NULL, NULL),
(185, 'sav185', '2024-08-09', '10:00am - 13:00 pm', '2024-08-11', '10:00am - 13:00 pm', 'Driver Drops, Rings & Wait', NULL, 'once', 123, '0', 'uncompleted', 'not-paid', NULL, NULL, '2024-08-08 23:50:44', '2024-08-08 23:50:44', NULL, NULL, NULL),
(186, 'sav186', '2024-08-10', '10:00am - 13:00 pm', '2024-08-12', '10:00am - 13:00 pm', 'Driver Drops, Rings & Wait', NULL, 'once', 129, '0', 'uncompleted', 'not-paid', NULL, NULL, '2024-08-09 08:17:00', '2024-08-09 08:17:00', NULL, NULL, NULL),
(187, 'sav187', '2024-08-13', '10:00am - 13:00 pm', '2024-08-15', '10:00am - 13:00 pm', 'Driver Drops, Rings & Wait', NULL, 'once', 123, '0', 'uncompleted', 'not-paid', NULL, NULL, '2024-08-11 20:18:01', '2024-08-11 20:18:01', NULL, NULL, NULL),
(188, 'sav188', '2024-08-13', '10:00am - 13:00 pm', '2024-08-15', '10:00am - 13:00 pm', 'Driver Drops, Rings & Wait', NULL, 'once', 37, '257.6', 'uncompleted', 'paid', NULL, NULL, '2024-08-11 21:20:42', '2024-08-11 21:22:03', 'RkE2zMEiQx172341132337', '2024-08-11 21:21:47', NULL),
(189, 'sav189', '2024-08-20', '6:00pm - 7:00pm', '2024-08-30', '5:00pm - 6:00pm', 'Driver Drops, Rings & Wait', NULL, 'once', 37, '12.5', 'completed', 'paid', NULL, NULL, '2024-08-19 13:16:28', '2024-08-21 21:26:39', 'uD314G2EDj172427551837', '2024-08-21 21:25:01', '2024-08-21 21:26:38'),
(190, 'sav190', '2024-08-24', '10:00am - 13:00 pm', '2024-09-11', '10:00am - 13:00 pm', 'Leave it at The Door', NULL, 'once', 130, '56', 'completed', 'paid', NULL, NULL, '2024-08-21 05:52:19', '2024-08-21 21:24:39', 'QWLyZeOnti1724275460130', '2024-08-21 21:24:06', '2024-08-21 21:24:38'),
(191, 'sav191', '2024-09-10', '10:00am - 13:00 pm', '2024-09-12', '10:00am - 13:00 pm', 'Driver Drops, Rings & Wait', NULL, 'once', 37, '0', 'uncompleted', 'not-paid', NULL, NULL, '2024-09-09 09:59:22', '2024-09-09 09:59:22', NULL, NULL, NULL),
(192, 'sav192', '2024-09-10', '10:00am - 13:00 pm', '2024-09-12', '10:00am - 13:00 pm', 'Driver Drops, Rings & Wait', NULL, 'once', 37, '0', 'uncompleted', 'not-paid', NULL, NULL, '2024-09-09 13:17:43', '2024-09-09 13:17:43', NULL, NULL, NULL),
(193, 'sav193', '2024-09-11', '10:00am - 13:00 pm', '2024-09-13', '10:00am - 13:00 pm', 'Driver Drops, Rings & Wait', NULL, 'once', 132, '0', 'cancelled', 'not-paid', NULL, NULL, '2024-09-10 02:46:01', '2024-09-10 02:46:25', NULL, NULL, NULL),
(194, 'sav194', '2024-09-11', '10:00am - 13:00 pm', '2024-09-13', '10:00am - 13:00 pm', 'Driver Drops, Rings & Wait', NULL, 'once', 132, '0', 'uncompleted', 'not-paid', NULL, NULL, '2024-09-10 12:00:44', '2024-09-10 12:00:44', NULL, NULL, NULL),
(195, 'sav195', '2024-09-11', '10:00am - 13:00 pm', '2024-09-13', '10:00am - 13:00 pm', 'Driver Drops, Rings & Wait', NULL, 'once', 37, '0', 'uncompleted', 'not-paid', NULL, NULL, '2024-09-10 20:18:20', '2024-09-10 20:18:20', NULL, NULL, NULL),
(196, 'sav196', '2024-09-12', '10:00am - 13:00 pm', '2024-09-14', '10:00am - 13:00 pm', 'Driver Drops, Rings & Wait', NULL, 'once', 132, '0', 'uncompleted', 'not-paid', NULL, NULL, '2024-09-11 02:50:03', '2024-09-11 02:50:03', NULL, NULL, NULL),
(197, 'sav197', '2024-09-14', '10:00am - 13:00 pm', '2024-09-16', '10:00am - 13:00 pm', 'Driver Drops, Rings & Wait', NULL, 'once', 37, '19.49', 'uncompleted', 'paid', NULL, NULL, '2024-09-12 12:00:09', '2024-09-12 12:01:34', 'JVmD6QvRCC172614249437', '2024-09-12 12:00:51', NULL),
(198, 'sav198', '2024-09-13', '10:00am - 13:00 pm', '2024-09-15', '10:00am - 13:00 pm', 'Driver Drops, Rings & Wait', NULL, 'once', 37, '0', 'uncompleted', 'not-paid', NULL, NULL, '2024-09-12 17:34:31', '2024-09-12 17:34:31', NULL, NULL, NULL),
(199, 'sav199', '2024-09-16', '10:00am - 13:00 pm', '2024-09-16', '10:00am - 13:00 pm', 'Driver Drops, Rings & Wait', NULL, 'once', 132, '0', 'uncompleted', 'not-paid', NULL, NULL, '2024-09-13 07:33:50', '2024-09-13 07:33:50', NULL, NULL, NULL),
(200, 'sav200', '2024-09-16', '10:00am - 13:00 pm', '2024-09-16', '10:00am - 13:00 pm', 'Driver Drops, Rings & Wait', NULL, 'once', 132, '0', 'uncompleted', 'not-paid', NULL, NULL, '2024-09-13 07:50:23', '2024-09-13 07:50:23', NULL, NULL, NULL),
(201, 'sav201', '2024-09-20', '10:00am - 13:00 pm', '2024-09-22', '10:00am - 13:00 pm', 'Driver Drops, Rings & Wait', NULL, 'once', 132, '0', 'uncompleted', 'not-paid', NULL, NULL, '2024-09-19 05:07:28', '2024-09-19 05:07:28', NULL, NULL, NULL),
(202, 'sav202', '2024-09-20', '10:00am - 13:00 pm', '2024-09-22', '10:00am - 13:00 pm', 'Driver Drops, Rings & Wait', NULL, 'once', 132, '0', 'uncompleted', 'not-paid', NULL, NULL, '2024-09-19 05:10:49', '2024-09-19 05:10:49', NULL, NULL, NULL),
(203, 'sav203', '2024-09-20', '10:00am - 13:00 pm', '2024-09-22', '10:00am - 13:00 pm', 'Driver Drops, Rings & Wait', NULL, 'once', 132, '0', 'uncompleted', 'not-paid', NULL, NULL, '2024-09-19 05:25:09', '2024-09-19 05:25:09', NULL, NULL, NULL),
(204, 'sav204', '2024-09-21', '10:00am - 13:00 pm', '2024-09-23', '10:00am - 13:00 pm', 'Driver Drops, Rings & Wait', NULL, 'once', 37, '96', 'completed', 'paid', NULL, NULL, '2024-09-19 06:34:42', '2024-09-19 09:09:05', 'gHP4QBObyE172673692337', '2024-09-19 09:08:28', '2024-09-19 09:09:04'),
(205, 'sav205', '2024-09-24', '10:00am - 13:00 pm', '2024-09-26', '10:00am - 13:00 pm', 'Driver Drops, Rings & Wait', NULL, 'once', 37, '61', 'processed', 'paid', NULL, NULL, '2024-09-19 09:16:13', '2024-09-19 09:17:02', '1G5SlzyMkp172673741937', '2024-09-19 09:16:34', '2024-09-19 09:17:02'),
(206, 'sav206', '2024-09-23', '10:00am - 13:00 pm', '2024-09-25', '10:00am - 13:00 pm', 'Driver Drops, Rings & Wait', NULL, 'once', 37, '165', 'processed', 'paid', NULL, NULL, '2024-09-19 09:18:49', '2024-09-19 09:19:49', 'RSxGgsCXFM172673758737', '2024-09-19 09:19:32', '2024-09-19 09:19:49'),
(207, 'sav207', '2024-09-24', '10:00am - 13:00 pm', '2024-10-01', '10:00am - 13:00 pm', 'Driver Drops, Rings & Wait', NULL, 'once', 37, '0', 'uncompleted', 'not-paid', NULL, NULL, '2024-09-20 21:13:38', '2024-09-20 21:13:38', NULL, NULL, NULL),
(208, 'sav208', '2024-10-14', '10:00am - 13:00 pm', '2024-10-28', '10:00am - 13:00 pm', 'Driver Drops, Rings & Wait', NULL, 'once', 37, '0', 'cancelled', 'not-paid', NULL, NULL, '2024-09-22 19:40:38', '2024-09-22 19:41:54', NULL, NULL, NULL),
(209, 'sav209', '2024-09-24', '10:00am - 13:00 pm', '2024-09-26', '10:00am - 13:00 pm', 'Driver Drops, Rings & Wait', NULL, 'once', 132, '0', 'uncompleted', 'not-paid', NULL, NULL, '2024-09-23 04:19:17', '2024-09-23 04:19:17', NULL, NULL, NULL),
(210, 'sav210', '2024-09-24', '10:00am - 13:00 pm', '2024-09-26', '10:00am - 13:00 pm', 'Driver Drops, Rings & Wait', NULL, 'once', 132, '33', 'uncompleted', 'paid', NULL, NULL, '2024-09-23 05:21:02', '2024-09-23 06:12:28', 'cjf2760Kbr1727071948132', '2024-09-23 06:10:53', NULL),
(211, 'sav211', '2024-09-26', '10:00am - 13:00 pm', '2024-09-28', '10:00am - 13:00 pm', 'Driver Drops, Rings & Wait', NULL, 'once', 132, '0', 'uncompleted', 'not-paid', 'pi_3Q26zVEoWO9T9v9O1VHezjsg', NULL, '2024-09-23 07:47:31', '2024-09-23 08:45:02', NULL, '2024-09-23 08:45:02', NULL),
(212, 'sav212', '2024-09-24', '10:00am - 13:00 pm', '2024-09-26', '10:00am - 13:00 pm', 'Driver Drops, Rings & Wait', NULL, 'once', 132, '0', 'uncompleted', 'not-paid', 'pi_3Q286YEoWO9T9v9O0iCHZqVK', NULL, '2024-09-23 08:58:52', '2024-09-23 08:59:58', NULL, '2024-09-23 08:59:58', NULL),
(213, 'sav213', '2024-10-02', '10:00am - 13:00 pm', '2024-10-04', '10:00am - 13:00 pm', 'Driver Drops, Rings & Wait', NULL, 'once', 132, '0', 'uncompleted', 'not-paid', 'pi_3Q29K5EoWO9T9v9O0nKj5nAu', NULL, '2024-09-23 10:16:55', '2024-09-23 10:18:11', NULL, '2024-09-23 10:18:11', NULL),
(214, 'sav214', '2024-10-09', '10:00am - 13:00 pm', '2024-10-11', '10:00am - 13:00 pm', 'Driver Drops, Rings & Wait', NULL, 'once', 132, '53.5', 'uncompleted', 'paid', 'pi_3Q29P5EoWO9T9v9O1mKM8QLH', NULL, '2024-09-23 10:22:04', '2024-09-23 10:24:48', 'egeKF6pldE1727087088132', '2024-09-23 10:23:59', NULL),
(215, 'sav215', '2024-09-25', '10:00am - 13:00 pm', '2024-09-27', '10:00am - 13:00 pm', 'Driver Drops, Rings & Wait', NULL, 'once', 132, '0', 'uncompleted', 'not-paid', 'pi_3Q2AKqEoWO9T9v9O0yBtlMYC', NULL, '2024-09-23 11:21:46', '2024-09-23 11:21:46', NULL, NULL, NULL),
(216, 'sav216', '2024-09-28', '10:00am - 13:00 pm', '2024-09-30', '10:00am - 13:00 pm', 'Driver Drops, Rings & Wait', NULL, 'once', 132, '0', 'uncompleted', 'not-paid', 'pi_3Q2mypEoWO9T9v9O1mekTDSC', NULL, '2024-09-25 04:37:36', '2024-09-25 04:40:52', NULL, '2024-09-25 04:40:52', NULL),
(217, 'sav217', '2024-09-27', '10:00am - 13:00 pm', '2024-09-29', '10:00am - 13:00 pm', 'Driver Drops, Rings & Wait', NULL, 'once', 132, '0', 'uncompleted', 'not-paid', 'pi_3Q2n6bEoWO9T9v9O0CL8kEyj', NULL, '2024-09-25 04:45:38', '2024-09-25 04:46:40', NULL, '2024-09-25 04:46:40', NULL),
(218, 'sav218', '2024-09-26', '10:00am - 13:00 pm', '2024-09-28', '10:00am - 13:00 pm', 'Driver Drops, Rings & Wait', NULL, 'once', 132, '0', 'uncompleted', 'not-paid', 'pi_3Q2nBxEoWO9T9v9O0zZk6BzZ', NULL, '2024-09-25 04:51:11', '2024-09-25 04:51:26', NULL, '2024-09-25 04:51:26', NULL);
INSERT INTO `orders` (`id`, `no`, `collection_date`, `collection_time`, `delivery_date`, `delivery_time`, `instruction`, `infomation`, `frequency`, `customer_id`, `amount`, `status`, `payment_status`, `payment_id`, `payment_method_id`, `created_at`, `updated_at`, `token`, `collected_at`, `proceed_at`) VALUES
(219, 'sav219', '2024-09-26', '10:00am - 13:00 pm', '2024-09-28', '10:00am - 13:00 pm', 'Driver Drops, Rings & Wait', NULL, 'once', 132, '0', 'uncompleted', 'not-paid', 'pi_3Q2nKQEoWO9T9v9O1BbH9heb', NULL, '2024-09-25 04:59:56', '2024-09-25 05:01:14', NULL, '2024-09-25 05:01:14', NULL),
(220, 'sav220', '2024-09-28', '10:00am - 13:00 pm', '2024-09-30', '10:00am - 13:00 pm', 'Driver Drops, Rings & Wait', NULL, 'once', 132, '0', 'uncompleted', 'not-paid', 'pi_3Q2niAEoWO9T9v9O1erTgYEy', NULL, '2024-09-25 05:24:28', '2024-09-25 05:24:28', NULL, NULL, NULL),
(221, 'sav221', '2024-09-26', '10:00am - 13:00 pm', '2024-09-28', '10:00am - 13:00 pm', 'Driver Drops, Rings & Wait', NULL, 'once', 132, '0', 'uncompleted', 'not-paid', 'pi_3Q2npYEoWO9T9v9O1nOcs9jL', NULL, '2024-09-25 05:32:05', '2024-09-25 05:32:42', NULL, '2024-09-25 05:32:42', NULL),
(225, 'sav225', '2024-09-26', '10:00am - 13:00 pm', '2024-09-28', '10:00am - 13:00 pm', 'Driver Drops, Rings & Wait', NULL, 'once', 132, '58.5', 'uncompleted', 'paid', 'pi_3Q2oc5EoWO9T9v9O0gjXiexS', 'pm_1Q2oc4EoWO9T9v9O2oIxzvdr', '2024-09-25 06:22:13', '2024-09-25 06:26:29', '096sDVRFTn1727245589132', '2024-09-25 06:22:31', NULL),
(226, 'sav226', '2024-10-07', '10:00am - 13:00 pm', '2024-10-09', '10:00am - 13:00 pm', 'Driver Drops, Rings & Wait', NULL, 'once', 132, '140', 'uncompleted', 'paid', 'pi_3Q2omxEoWO9T9v9O0fUZjsQj', 'pm_1Q2omwEoWO9T9v9OcJ89cKge', '2024-09-25 06:33:27', '2024-09-25 06:46:46', 'P1vTK283KF1727246806132', '2024-09-25 06:34:05', NULL),
(227, 'sav227', '2024-09-27', '10:00am - 13:00 pm', '2024-09-29', '10:00am - 13:00 pm', 'Driver Drops, Rings & Wait', NULL, 'once', 132, '155', 'uncompleted', 'paid', 'pi_3Q2p1wEoWO9T9v9O0IOooIxw', 'pm_1Q2p1vEoWO9T9v9OED8rxcd4', '2024-09-25 06:48:56', '2024-09-25 06:49:21', 'cSayA17mnI1727246961132', '2024-09-25 06:49:04', NULL),
(228, 'sav228', '2024-09-30', '10:00am - 13:00 pm', '2024-10-02', '10:00am - 13:00 pm', 'Driver Drops, Rings & Wait', NULL, 'once', 37, '15.5', 'uncompleted', 'paid', 'pi_3Q2w3pEoWO9T9v9O06YXpI8J', 'pm_1Q2w3oEoWO9T9v9OhTDphGVm', '2024-09-25 14:19:21', '2024-09-25 15:28:49', 'EeSkWPdA20172727812937', '2024-09-25 15:28:39', NULL),
(229, 'sav229', '2024-09-27', '10:00am - 13:00 pm', '2024-10-01', '10:00am - 13:00 pm', 'Driver Drops, Rings & Wait', NULL, 'once', 37, '0', 'uncompleted', 'not-paid', NULL, NULL, '2024-09-25 15:37:51', '2024-09-25 15:38:15', NULL, '2024-09-25 15:38:15', NULL),
(230, 'sav230', '2024-09-28', '10:00am - 13:00 pm', '2024-09-30', '10:00am - 13:00 pm', 'Driver Drops, Rings & Wait', NULL, 'once', 37, '0', 'uncompleted', 'not-paid', 'pi_3Q32s5EoWO9T9v9O1x3syuWA', 'pm_1Q32s5EoWO9T9v9ODQXh88Qp', '2024-09-25 21:35:41', '2024-09-25 21:35:41', NULL, NULL, NULL),
(231, 'sav231', '2024-10-03', '10:00am - 13:00 pm', '2024-10-05', '10:00am - 13:00 pm', 'Driver Drops, Rings & Wait', NULL, 'once', 37, '0', 'uncompleted', 'not-paid', NULL, NULL, '2024-09-25 21:35:59', '2024-09-25 21:35:59', NULL, NULL, NULL),
(232, 'sav232', '2024-09-30', '10:00am - 13:00 pm', '2024-10-02', '10:00am - 13:00 pm', 'Driver Drops, Rings & Wait', NULL, 'once', 37, '0', 'uncompleted', 'not-paid', NULL, NULL, '2024-09-25 22:17:40', '2024-09-25 22:17:40', NULL, NULL, NULL),
(233, 'sav233', '2024-10-03', '10:00am - 13:00 pm', '2024-10-05', '10:00am - 13:00 pm', 'Driver Drops, Rings & Wait', NULL, 'once', 37, '0', 'uncompleted', 'not-paid', 'pi_3Q33WwEoWO9T9v9O0VzWWhfj', 'pm_1Q33WvEoWO9T9v9Ojy083ipr', '2024-09-25 22:17:54', '2024-09-25 22:17:54', NULL, NULL, NULL),
(234, 'sav234', '2024-10-01', '10:00am - 13:00 pm', '2024-10-03', '10:00am - 13:00 pm', 'Driver Drops, Rings & Wait', NULL, 'once', 37, '0', 'uncompleted', 'not-paid', 'pi_3Q33XCEoWO9T9v9O1V85KQiT', 'pm_1Q33XCEoWO9T9v9OLUkol8AL', '2024-09-25 22:18:10', '2024-09-25 22:18:10', NULL, NULL, NULL),
(235, 'sav235', '2024-09-27', '10:00am - 13:00 pm', '2024-09-29', '10:00am - 13:00 pm', 'Driver Drops, Rings & Wait', NULL, 'once', 37, '0', 'uncompleted', 'not-paid', NULL, NULL, '2024-09-25 22:23:07', '2024-09-25 22:33:08', NULL, '2024-09-25 22:33:08', NULL),
(236, 'sav236', '2024-09-28', '10:00am - 13:00 pm', '2024-09-30', '10:00am - 13:00 pm', 'Driver Drops, Rings & Wait', NULL, 'once', 37, '0', 'uncompleted', 'not-paid', NULL, NULL, '2024-09-25 22:23:25', '2024-09-25 22:30:47', NULL, '2024-09-25 22:30:47', NULL),
(237, 'sav237', '2024-09-28', '10:00am - 13:00 pm', '2024-09-30', '10:00am - 13:00 pm', 'Driver Drops, Rings & Wait', NULL, 'once', 132, '9.5', 'completed', 'paid', 'pi_3Q386IEoWO9T9v9O0mrVw2bf', 'pm_1Q386HEoWO9T9v9OqNlhMTaN', '2024-09-26 03:10:42', '2024-09-26 03:15:05', 'knWQGiTJHG1727320320132', '2024-09-26 03:11:18', '2024-09-26 03:15:01'),
(238, 'sav238', '2024-10-26', '10:00am - 13:00 pm', '2024-10-28', '10:00am - 13:00 pm', 'Driver Drops, Rings & Wait', NULL, 'once', 132, '17', 'completed', 'paid', 'pi_3Q38GCEoWO9T9v9O0C8GZmt5', 'pm_1Q38GBEoWO9T9v9OJL9jTyvQ', '2024-09-26 03:20:57', '2024-09-26 03:21:53', '5Yzn7WUsGK1727320908132', '2024-09-26 03:21:25', '2024-09-26 03:21:51'),
(239, 'sav239', '2024-10-04', '10:00am - 13:00 pm', '2024-10-06', '10:00am - 13:00 pm', 'Driver Drops, Rings & Wait', NULL, 'once', 132, '3.95', 'completed', 'paid', 'pi_3Q38MyEoWO9T9v9O0A57TuTZ', 'pm_1Q38MxEoWO9T9v9OIBpmgwJ8', '2024-09-26 03:27:57', '2024-09-26 03:28:28', 'oMrPMtvpUa1727321305132', '2024-09-26 03:28:14', '2024-09-26 03:28:27'),
(240, 'sav240', '2024-09-30', '10:00am - 13:00 pm', '2024-10-02', '10:00am - 13:00 pm', 'Driver Drops, Rings & Wait', NULL, 'once', 132, '19.5', 'completed', 'paid', 'pi_3Q38PKEoWO9T9v9O0ROerq2N', 'pm_1Q38PJEoWO9T9v9OQQkHpja7', '2024-09-26 03:30:23', '2024-09-26 03:31:20', 'UFpGH4EpzH1727321474132', '2024-09-26 03:31:03', '2024-09-26 03:31:18'),
(241, 'sav241', '2024-09-30', '10:00am - 13:00 pm', '2024-10-02', '10:00am - 13:00 pm', 'Driver Drops, Rings & Wait', NULL, 'once', 37, '17', 'uncompleted', 'paid', 'pi_3Q3BJ2EoWO9T9v9O0Aoy8K5e', 'pm_1Q3BJ2EoWO9T9v9OPRb7czCL', '2024-09-26 06:36:05', '2024-09-26 10:28:31', 'PxGmrvI17J172734651137', '2024-09-26 10:28:21', NULL),
(242, 'sav242', '2024-09-28', '10:00am - 13:00 pm', '2024-09-30', '10:00am - 13:00 pm', 'Driver Drops, Rings & Wait', NULL, 'once', 37, '0', 'uncompleted', 'not-paid', NULL, NULL, '2024-09-26 10:30:53', '2024-09-26 10:31:15', NULL, '2024-09-26 10:31:15', NULL),
(243, 'sav243', '2024-10-01', '10:00am - 13:00 pm', '2024-10-03', '10:00am - 13:00 pm', 'Driver Drops, Rings & Wait', NULL, 'once', 37, '17', 'uncompleted', 'paid', 'pi_3Q3FdAEoWO9T9v9O0OJ2BkIO', 'pm_1Q3Fd9EoWO9T9v9O629cDfPh', '2024-09-26 11:13:08', '2024-09-26 11:14:07', 'oPXTOIsvEX172734924737', '2024-09-26 11:13:57', NULL),
(244, 'sav244', '2024-10-05', '10:00am - 13:00 pm', '2024-10-07', '10:00am - 13:00 pm', 'Driver Drops, Rings & Wait', NULL, 'once', 37, '12.5', 'completed', 'paid', 'pi_3Q3FsFEoWO9T9v9O0Yhq8tkO', 'pm_1Q3FsEEoWO9T9v9O3PNKej7x', '2024-09-26 11:28:43', '2024-09-26 11:29:28', 'Y0HyGweCi8172735016237', '2024-09-26 11:29:10', '2024-09-26 11:29:27'),
(245, 'sav245', '2024-10-08', '10:00am - 13:00 pm', '2024-10-10', '10:00am - 13:00 pm', 'Driver Drops, Rings & Wait', NULL, 'once', 37, '0', 'uncompleted', 'not-paid', NULL, NULL, '2024-09-26 11:30:22', '2024-09-26 11:30:32', NULL, '2024-09-26 11:30:32', NULL),
(246, 'sav246', '2024-09-28', '10:00am - 13:00 pm', '2024-09-30', '10:00am - 13:00 pm', 'Driver Drops, Rings & Wait', NULL, 'once', 37, '15.5', 'completed', 'paid', 'pi_3Q3FxOEoWO9T9v9O0kXtzUEV', 'pm_1Q3FxOEoWO9T9v9OzOcteDZo', '2024-09-26 11:34:03', '2024-09-26 11:35:03', 'rBKOrahoT6172735048137', '2024-09-26 11:34:31', '2024-09-26 11:35:02'),
(247, 'sav247', '2024-10-03', '10:00am - 13:00 pm', '2024-10-05', '10:00am - 13:00 pm', 'Driver Drops, Rings & Wait', NULL, 'once', 37, '19.5', 'uncompleted', 'paid', 'pi_3Q3FyMEoWO9T9v9O1e86jCVx', 'pm_1Q3FyLEoWO9T9v9OL2fuXVgC', '2024-09-26 11:35:02', '2024-09-26 11:35:30', '1sfNUba9h9172735053037', '2024-09-26 11:35:19', NULL),
(248, 'sav248', '2024-09-30', '10:00am - 13:00 pm', '2024-10-02', '10:00am - 13:00 pm', 'Driver Drops, Rings & Wait', NULL, 'once', 132, '23', 'uncompleted', 'paid', NULL, NULL, '2024-09-26 11:35:06', '2024-09-26 11:36:20', '93Jr9yIQ1p1727350580132', '2024-09-26 11:35:45', NULL),
(249, 'sav249', '2024-09-27', '10:00am - 13:00 pm', '2024-09-29', '10:00am - 13:00 pm', 'Driver Drops, Rings & Wait', NULL, 'once', 37, '19.5', 'uncompleted', 'paid', NULL, NULL, '2024-09-26 11:39:15', '2024-09-26 11:39:58', '9LZopZ8Td1172735079837', '2024-09-26 11:39:48', NULL),
(250, 'sav250', '2024-09-30', '10:00am - 13:00 pm', '2024-10-02', '10:00am - 13:00 pm', 'Driver Drops, Rings & Wait', NULL, 'once', 37, '19.5', 'uncompleted', 'paid', 'pi_3Q3G4VEoWO9T9v9O1S1cSWPO', 'pm_1Q3G4UEoWO9T9v9OwPTXmfru', '2024-09-26 11:41:23', '2024-09-26 11:43:09', 'lLhqL0hUGG172735098937', '2024-09-26 11:42:55', NULL),
(251, 'sav251', '2024-10-03', '10:00am - 13:00 pm', '2024-10-05', '10:00am - 13:00 pm', 'Driver Drops, Rings & Wait', NULL, 'once', 37, '17', 'uncompleted', 'paid', 'pi_3Q3G6aEoWO9T9v9O16TfeW7y', 'pm_1Q3G6ZEoWO9T9v9OrzXHs6R9', '2024-09-26 11:43:32', '2024-09-26 11:43:54', 'WoD2vOQA8o172735103437', '2024-09-26 11:43:45', NULL),
(252, 'sav252', '2024-10-03', '10:00am - 13:00 pm', '2024-10-05', '10:00am - 13:00 pm', 'Driver Drops, Rings & Wait', NULL, 'once', 37, '83.5', 'completed', 'paid', 'pi_3Q3PqlEoWO9T9v9O0vzk4yNm', 'pm_1Q3PqkEoWO9T9v9OZ8fuc7in', '2024-09-26 22:07:51', '2024-09-26 22:10:17', 'vAn4OirJPs172738856637', '2024-09-26 22:08:53', '2024-09-26 22:10:16'),
(253, 'sav253', '2024-09-28', '10:00am - 13:00 pm', '2024-09-30', '10:00am - 13:00 pm', 'Driver Drops, Rings & Wait', NULL, 'once', 37, '35', 'completed', 'paid', NULL, NULL, '2024-09-26 22:16:11', '2024-09-26 22:16:59', '3qXqpfUz4X172738899037', '2024-09-26 22:16:21', '2024-09-26 22:16:57');

-- --------------------------------------------------------

--
-- Table structure for table `order_sections`
--

CREATE TABLE `order_sections` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_id` bigint(20) UNSIGNED DEFAULT NULL,
  `section_id` bigint(20) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `order_sections`
--

INSERT INTO `order_sections` (`id`, `order_id`, `section_id`, `created_at`, `updated_at`) VALUES
(1, 1, 1, '2023-03-20 15:50:26', '2023-03-20 15:50:26'),
(2, 6, 1, '2024-01-22 03:45:29', '2024-01-22 03:45:29'),
(3, 6, 2, '2024-01-22 03:45:29', '2024-01-22 03:45:29'),
(4, 7, 1, '2024-01-22 04:36:35', '2024-01-22 04:36:35'),
(5, 8, 1, '2024-01-22 06:48:00', '2024-01-22 06:48:00'),
(6, 8, 2, '2024-01-22 06:48:00', '2024-01-22 06:48:00'),
(7, 9, 1, '2024-01-22 06:50:12', '2024-01-22 06:50:12'),
(8, 10, 1, '2024-01-22 06:55:13', '2024-01-22 06:55:13'),
(9, 11, 1, '2024-01-22 06:59:10', '2024-01-22 06:59:10'),
(10, 12, 1, '2024-01-22 07:01:16', '2024-01-22 07:01:16'),
(11, 13, 1, '2024-01-22 07:03:20', '2024-01-22 07:03:20'),
(12, 14, 1, '2024-01-22 07:06:14', '2024-01-22 07:06:14'),
(13, 14, 2, '2024-01-22 07:06:14', '2024-01-22 07:06:14'),
(14, 15, 1, '2024-01-22 07:11:19', '2024-01-22 07:11:19'),
(15, 15, 2, '2024-01-22 07:11:19', '2024-01-22 07:11:19'),
(16, 16, 1, '2024-01-22 07:21:18', '2024-01-22 07:21:18'),
(17, 16, 2, '2024-01-22 07:21:18', '2024-01-22 07:21:18'),
(18, 16, 4, '2024-01-22 07:21:18', '2024-01-22 07:21:18'),
(19, 17, 1, '2024-01-22 07:28:43', '2024-01-22 07:28:43'),
(20, 17, 2, '2024-01-22 07:28:43', '2024-01-22 07:28:43'),
(21, 17, 4, '2024-01-22 07:28:43', '2024-01-22 07:28:43'),
(22, 17, 8, '2024-01-22 07:28:43', '2024-01-22 07:28:43'),
(23, 18, 1, '2024-01-22 07:30:34', '2024-01-22 07:30:34'),
(24, 19, 1, '2024-01-22 07:32:03', '2024-01-22 07:32:03'),
(25, 20, 1, '2024-01-22 07:33:45', '2024-01-22 07:33:45'),
(26, 20, 2, '2024-01-22 07:33:45', '2024-01-22 07:33:45'),
(27, 20, 4, '2024-01-22 07:33:45', '2024-01-22 07:33:45'),
(28, 21, 2, '2024-01-22 09:01:10', '2024-01-22 09:01:10'),
(29, 21, 4, '2024-01-22 09:01:10', '2024-01-22 09:01:10'),
(30, 21, 8, '2024-01-22 09:01:10', '2024-01-22 09:01:10'),
(31, 22, 1, '2024-01-22 09:03:29', '2024-01-22 09:03:29'),
(32, 23, 2, '2024-01-22 09:05:20', '2024-01-22 09:05:20'),
(33, 23, 4, '2024-01-22 09:05:20', '2024-01-22 09:05:20'),
(34, 24, 1, '2024-01-22 09:09:34', '2024-01-22 09:09:34'),
(35, 24, 2, '2024-01-22 09:09:34', '2024-01-22 09:09:34'),
(36, 25, 1, '2024-01-22 23:35:15', '2024-01-22 23:35:15'),
(37, 25, 2, '2024-01-22 23:35:15', '2024-01-22 23:35:15'),
(38, 26, 4, '2024-01-22 23:36:31', '2024-01-22 23:36:31'),
(39, 26, 8, '2024-01-22 23:36:31', '2024-01-22 23:36:31'),
(40, 27, 1, '2024-01-22 23:38:04', '2024-01-22 23:38:04'),
(41, 28, 1, '2024-01-22 23:54:31', '2024-01-22 23:54:31'),
(42, 28, 2, '2024-01-22 23:54:31', '2024-01-22 23:54:31'),
(43, 29, 1, '2024-01-22 23:59:45', '2024-01-22 23:59:45'),
(44, 29, 2, '2024-01-22 23:59:45', '2024-01-22 23:59:45'),
(45, 30, 1, '2024-01-23 00:01:09', '2024-01-23 00:01:09'),
(46, 30, 2, '2024-01-23 00:01:09', '2024-01-23 00:01:09'),
(47, 30, 4, '2024-01-23 00:01:09', '2024-01-23 00:01:09'),
(48, 31, 2, '2024-01-23 00:02:53', '2024-01-23 00:02:53'),
(49, 32, 1, '2024-01-23 00:44:44', '2024-01-23 00:44:44'),
(50, 33, 1, '2024-01-23 06:41:56', '2024-01-23 06:41:56'),
(51, 33, 2, '2024-01-23 06:41:56', '2024-01-23 06:41:56'),
(52, 33, 4, '2024-01-23 06:41:56', '2024-01-23 06:41:56'),
(53, 33, 8, '2024-01-23 06:41:56', '2024-01-23 06:41:56'),
(54, 35, 1, '2024-01-25 00:02:18', '2024-01-25 00:02:18'),
(55, 35, 4, '2024-01-25 00:02:18', '2024-01-25 00:02:18'),
(56, 36, 1, '2024-01-25 00:05:14', '2024-01-25 00:05:14'),
(57, 36, 2, '2024-01-25 00:05:14', '2024-01-25 00:05:14'),
(58, 37, 1, '2024-01-25 01:49:24', '2024-01-25 01:49:24'),
(59, 37, 2, '2024-01-25 01:49:24', '2024-01-25 01:49:24'),
(60, 38, 1, '2024-01-26 11:21:54', '2024-01-26 11:21:54'),
(61, 38, 2, '2024-01-26 11:21:54', '2024-01-26 11:21:54'),
(62, 38, 4, '2024-01-26 11:21:54', '2024-01-26 11:21:54'),
(63, 39, 1, '2024-01-29 18:22:37', '2024-01-29 18:22:37'),
(64, 39, 2, '2024-01-29 18:22:37', '2024-01-29 18:22:37'),
(65, 39, 4, '2024-01-29 18:22:37', '2024-01-29 18:22:37'),
(66, 40, 1, '2024-02-08 12:45:45', '2024-02-08 12:45:45'),
(67, 40, 2, '2024-02-08 12:45:45', '2024-02-08 12:45:45'),
(68, 41, 1, '2024-02-12 05:07:43', '2024-02-12 05:07:43'),
(69, 41, 2, '2024-02-12 05:07:43', '2024-02-12 05:07:43'),
(70, 42, 1, '2024-02-12 06:29:41', '2024-02-12 06:29:41'),
(71, 42, 2, '2024-02-12 06:29:41', '2024-02-12 06:29:41'),
(72, 43, 1, '2024-02-12 06:35:54', '2024-02-12 06:35:54'),
(73, 43, 2, '2024-02-12 06:35:54', '2024-02-12 06:35:54'),
(74, 43, 4, '2024-02-12 06:35:54', '2024-02-12 06:35:54'),
(75, 43, 8, '2024-02-12 06:35:54', '2024-02-12 06:35:54'),
(76, 44, 1, '2024-02-17 11:34:51', '2024-02-17 11:34:51'),
(77, 44, 2, '2024-02-17 11:34:51', '2024-02-17 11:34:51'),
(78, 45, 2, '2024-02-28 09:49:08', '2024-02-28 09:49:08'),
(79, 45, 8, '2024-02-28 09:49:08', '2024-02-28 09:49:08'),
(80, 46, 1, '2024-02-28 10:21:21', '2024-02-28 10:21:21'),
(81, 46, 2, '2024-02-28 10:21:21', '2024-02-28 10:21:21'),
(82, 47, 1, '2024-03-01 12:23:38', '2024-03-01 12:23:38'),
(83, 47, 2, '2024-03-01 12:23:38', '2024-03-01 12:23:38'),
(84, 48, 8, '2024-03-01 12:24:19', '2024-03-01 12:24:19'),
(85, 49, 4, '2024-03-01 12:28:52', '2024-03-01 12:28:52'),
(86, 51, 1, '2024-03-01 22:40:43', '2024-03-01 22:40:43'),
(87, 51, 2, '2024-03-01 22:40:43', '2024-03-01 22:40:43'),
(88, 53, 1, '2024-03-11 08:07:57', '2024-03-11 08:07:57'),
(89, 54, 1, '2024-03-11 08:38:21', '2024-03-11 08:38:21'),
(90, 54, 2, '2024-03-11 08:38:21', '2024-03-11 08:38:21'),
(91, 55, 1, '2024-03-11 08:47:24', '2024-03-11 08:47:24'),
(92, 55, 4, '2024-03-11 08:47:24', '2024-03-11 08:47:24'),
(93, 56, 1, '2024-03-11 08:51:20', '2024-03-11 08:51:20'),
(94, 56, 2, '2024-03-11 08:51:20', '2024-03-11 08:51:20'),
(95, 57, 2, '2024-03-11 08:53:18', '2024-03-11 08:53:18'),
(96, 58, 1, '2024-03-11 08:57:06', '2024-03-11 08:57:06'),
(97, 58, 2, '2024-03-11 08:57:06', '2024-03-11 08:57:06'),
(98, 59, 1, '2024-03-11 21:59:05', '2024-03-11 21:59:05'),
(99, 59, 2, '2024-03-11 21:59:05', '2024-03-11 21:59:05'),
(100, 60, 1, '2024-03-12 22:48:35', '2024-03-12 22:48:35'),
(101, 61, 1, '2024-03-13 05:25:08', '2024-03-13 05:25:08'),
(102, 62, 1, '2024-03-13 05:26:16', '2024-03-13 05:26:16'),
(103, 62, 2, '2024-03-13 05:26:16', '2024-03-13 05:26:16'),
(104, 63, 1, '2024-03-13 05:31:48', '2024-03-13 05:31:48'),
(105, 64, 1, '2024-03-13 05:37:36', '2024-03-13 05:37:36'),
(106, 65, 1, '2024-03-13 05:37:37', '2024-03-13 05:37:37'),
(107, 66, 1, '2024-03-13 05:40:56', '2024-03-13 05:40:56'),
(108, 67, 1, '2024-03-13 05:51:20', '2024-03-13 05:51:20'),
(109, 67, 2, '2024-03-13 05:51:20', '2024-03-13 05:51:20'),
(110, 68, 1, '2024-03-13 05:55:42', '2024-03-13 05:55:42'),
(111, 69, 1, '2024-03-13 06:16:49', '2024-03-13 06:16:49'),
(112, 70, 1, '2024-03-13 07:13:41', '2024-03-13 07:13:41'),
(113, 71, 1, '2024-03-13 07:14:16', '2024-03-13 07:14:16'),
(114, 71, 2, '2024-03-13 07:14:16', '2024-03-13 07:14:16'),
(115, 72, 1, '2024-03-13 07:15:23', '2024-03-13 07:15:23'),
(116, 73, 1, '2024-03-13 07:16:49', '2024-03-13 07:16:49'),
(117, 73, 2, '2024-03-13 07:16:49', '2024-03-13 07:16:49'),
(118, 74, 2, '2024-03-13 07:25:36', '2024-03-13 07:25:36'),
(119, 74, 4, '2024-03-13 07:25:36', '2024-03-13 07:25:36'),
(120, 75, 1, '2024-03-13 07:26:18', '2024-03-13 07:26:18'),
(121, 76, 1, '2024-03-13 07:29:10', '2024-03-13 07:29:10'),
(122, 76, 2, '2024-03-13 07:29:10', '2024-03-13 07:29:10'),
(123, 77, 2, '2024-03-13 07:30:13', '2024-03-13 07:30:13'),
(124, 77, 4, '2024-03-13 07:30:13', '2024-03-13 07:30:13'),
(125, 79, 1, '2024-03-14 05:43:03', '2024-03-14 05:43:03'),
(126, 80, 1, '2024-03-14 05:45:08', '2024-03-14 05:45:08'),
(127, 80, 2, '2024-03-14 05:45:08', '2024-03-14 05:45:08'),
(128, 81, 1, '2024-03-14 05:47:17', '2024-03-14 05:47:17'),
(129, 81, 2, '2024-03-14 05:47:17', '2024-03-14 05:47:17'),
(130, 82, 1, '2024-03-14 06:19:22', '2024-03-14 06:19:22'),
(131, 82, 2, '2024-03-14 06:19:22', '2024-03-14 06:19:22'),
(132, 83, 1, '2024-03-14 06:20:44', '2024-03-14 06:20:44'),
(133, 83, 8, '2024-03-14 06:20:44', '2024-03-14 06:20:44'),
(134, 84, 1, '2024-03-14 06:22:20', '2024-03-14 06:22:20'),
(135, 84, 2, '2024-03-14 06:22:20', '2024-03-14 06:22:20'),
(136, 85, 1, '2024-03-14 06:24:11', '2024-03-14 06:24:11'),
(137, 86, 1, '2024-03-14 11:44:37', '2024-03-14 11:44:37'),
(138, 86, 2, '2024-03-14 11:44:37', '2024-03-14 11:44:37'),
(139, 88, 1, '2024-03-14 12:18:59', '2024-03-14 12:18:59'),
(140, 88, 8, '2024-03-14 12:18:59', '2024-03-14 12:18:59'),
(141, 87, 1, '2024-03-14 12:24:03', '2024-03-14 12:24:03'),
(142, 87, 8, '2024-03-14 12:24:03', '2024-03-14 12:24:03'),
(143, 89, 1, '2024-03-14 12:24:48', '2024-03-14 12:24:48'),
(144, 89, 2, '2024-03-14 12:24:48', '2024-03-14 12:24:48'),
(145, 89, 4, '2024-03-14 12:24:48', '2024-03-14 12:24:48'),
(146, 89, 8, '2024-03-14 12:24:48', '2024-03-14 12:24:48'),
(147, 90, 1, '2024-03-14 12:27:36', '2024-03-14 12:27:36'),
(148, 91, 1, '2024-03-14 12:30:32', '2024-03-14 12:30:32'),
(149, 91, 2, '2024-03-14 12:30:32', '2024-03-14 12:30:32'),
(150, 92, 1, '2024-03-14 12:30:35', '2024-03-14 12:30:35'),
(151, 92, 4, '2024-03-14 12:30:35', '2024-03-14 12:30:35'),
(152, 93, 1, '2024-03-14 12:37:56', '2024-03-14 12:37:56'),
(153, 93, 2, '2024-03-14 12:37:56', '2024-03-14 12:37:56'),
(154, 94, 8, '2024-03-14 12:39:00', '2024-03-14 12:39:00'),
(155, 95, 4, '2024-03-14 12:41:40', '2024-03-14 12:41:40'),
(156, 95, 8, '2024-03-14 12:41:40', '2024-03-14 12:41:40'),
(157, 96, 1, '2024-03-14 12:42:54', '2024-03-14 12:42:54'),
(158, 97, 2, '2024-03-14 12:45:04', '2024-03-14 12:45:04'),
(159, 98, 1, '2024-03-15 22:20:23', '2024-03-15 22:20:23'),
(160, 99, 1, '2024-03-15 22:50:32', '2024-03-15 22:50:32'),
(161, 101, 1, '2024-03-16 17:04:54', '2024-03-16 17:04:54'),
(162, 101, 2, '2024-03-16 17:04:54', '2024-03-16 17:04:54'),
(163, 101, 4, '2024-03-16 17:04:54', '2024-03-16 17:04:54'),
(164, 101, 8, '2024-03-16 17:04:54', '2024-03-16 17:04:54'),
(165, 102, 1, '2024-03-16 17:09:31', '2024-03-16 17:09:31'),
(166, 102, 1, '2024-03-16 17:09:31', '2024-03-16 17:09:31'),
(167, 104, 1, '2024-03-18 12:38:37', '2024-03-18 12:38:37'),
(168, 104, 2, '2024-03-18 12:38:37', '2024-03-18 12:38:37'),
(169, 105, 1, '2024-03-18 18:02:11', '2024-03-18 18:02:11'),
(170, 106, 1, '2024-03-19 06:21:47', '2024-03-19 06:21:47'),
(171, 107, 4, '2024-03-19 06:23:30', '2024-03-19 06:23:30'),
(172, 108, 1, '2024-03-19 06:25:55', '2024-03-19 06:25:55'),
(173, 108, 2, '2024-03-19 06:25:55', '2024-03-19 06:25:55'),
(174, 108, 4, '2024-03-19 06:25:55', '2024-03-19 06:25:55'),
(175, 109, 1, '2024-03-19 06:31:52', '2024-03-19 06:31:52'),
(176, 109, 2, '2024-03-19 06:31:52', '2024-03-19 06:31:52'),
(177, 110, 2, '2024-03-19 06:32:42', '2024-03-19 06:32:42'),
(178, 111, 1, '2024-03-19 06:34:03', '2024-03-19 06:34:03'),
(179, 112, 1, '2024-03-20 22:35:19', '2024-03-20 22:35:19'),
(180, 113, 1, '2024-04-02 15:00:27', '2024-04-02 15:00:27'),
(181, 113, 2, '2024-04-02 15:00:27', '2024-04-02 15:00:27'),
(182, 114, 1, '2024-04-02 15:00:32', '2024-04-02 15:00:32'),
(183, 114, 2, '2024-04-02 15:00:32', '2024-04-02 15:00:32'),
(184, 115, 1, '2024-04-07 00:23:50', '2024-04-07 00:23:50'),
(185, 115, 8, '2024-04-07 00:23:50', '2024-04-07 00:23:50'),
(186, 116, 1, '2024-04-09 19:39:05', '2024-04-09 19:39:05'),
(187, 117, 2, '2024-04-13 04:24:49', '2024-04-13 04:24:49'),
(188, 168, 1, '2024-07-17 05:48:16', '2024-07-17 05:48:16'),
(189, 168, 2, '2024-07-17 05:48:16', '2024-07-17 05:48:16');

-- --------------------------------------------------------

--
-- Table structure for table `order_services`
--

CREATE TABLE `order_services` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_id` bigint(20) UNSIGNED DEFAULT NULL,
  `service_id` bigint(20) NOT NULL,
  `qty` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `order_services`
--

INSERT INTO `order_services` (`id`, `order_id`, `service_id`, `qty`, `created_at`, `updated_at`) VALUES
(1, 4, 1, 1, '2023-05-11 19:36:32', '2023-05-11 19:36:32'),
(2, 4, 16, 4, '2023-05-11 19:36:41', '2023-05-11 19:36:41'),
(3, 45, 1, 2, '2024-02-28 10:17:35', '2024-02-28 10:17:35'),
(4, 45, 10, 1, '2024-02-28 10:17:46', '2024-02-28 10:17:46'),
(5, 46, 1, 3, '2024-02-28 11:02:00', '2024-02-28 11:02:00'),
(6, 47, 3, 2, '2024-03-01 12:25:09', '2024-03-01 12:25:09'),
(7, 53, 10, 2, '2024-03-11 08:08:51', '2024-03-11 08:08:51'),
(8, 56, 8, 5, '2024-03-11 08:51:42', '2024-03-11 08:51:42'),
(9, 57, 15, 10, '2024-03-11 08:53:38', '2024-03-11 08:53:38'),
(10, 58, 7, 5, '2024-03-11 08:57:24', '2024-03-11 08:57:24'),
(11, 76, 18, 5, '2024-03-13 07:30:34', '2024-03-13 07:30:34'),
(12, 77, 7, 5, '2024-03-13 07:31:40', '2024-03-13 07:31:40'),
(13, 79, 19, 5, '2024-03-14 06:07:51', '2024-03-14 06:07:51'),
(14, 82, 19, 6, '2024-03-14 06:19:43', '2024-03-14 06:19:43'),
(15, 83, 3, 5, '2024-03-14 06:21:09', '2024-03-14 06:21:09'),
(16, 84, 2, 1, '2024-03-14 06:22:45', '2024-03-14 06:22:45'),
(17, 84, 8, 5, '2024-03-14 06:22:50', '2024-03-14 06:22:50'),
(18, 85, 18, 6, '2024-03-14 06:24:31', '2024-03-14 06:24:31'),
(19, 86, 6, 54, '2024-03-14 11:45:09', '2024-03-14 11:45:09'),
(20, 86, 9, 1, '2024-03-14 11:45:20', '2024-03-14 11:45:20'),
(21, 97, 19, 124, '2024-03-14 12:46:22', '2024-03-14 12:46:22'),
(22, 97, 5, 9, '2024-03-14 12:46:22', '2024-03-14 12:46:22'),
(23, 96, 18, 12, '2024-03-14 12:55:00', '2024-03-14 12:55:00'),
(24, 94, 1, 1, '2024-03-14 12:55:48', '2024-03-14 12:55:48'),
(25, 104, 11, 2, '2024-03-18 12:39:24', '2024-03-18 12:39:24'),
(26, 104, 9, 5, '2024-03-18 12:39:34', '2024-03-18 12:39:34'),
(27, 105, 1, 2, '2024-03-18 18:08:23', '2024-03-18 18:08:23'),
(28, 106, 11, 5, '2024-03-19 06:22:49', '2024-03-19 06:22:49'),
(29, 107, 17, 10, '2024-03-19 06:23:58', '2024-03-19 06:23:58'),
(30, 107, 9, 5, '2024-03-19 06:24:08', '2024-03-19 06:24:08'),
(31, 108, 8, 5, '2024-03-19 06:26:20', '2024-03-19 06:26:20'),
(32, 108, 10, 5, '2024-03-19 06:26:30', '2024-03-19 06:26:30'),
(33, 109, 8, 5, '2024-03-19 06:32:14', '2024-03-19 06:32:14'),
(34, 110, 11, 5, '2024-03-19 06:33:06', '2024-03-19 06:33:06'),
(35, 111, 18, 5, '2024-03-19 06:34:18', '2024-03-19 06:34:18'),
(36, 112, 5, 12, '2024-03-20 22:36:46', '2024-03-20 22:36:46'),
(37, 114, 3, 1, '2024-04-02 15:04:51', '2024-04-02 15:04:51'),
(38, 52, 12, 1, '2024-04-03 09:10:53', '2024-04-03 09:10:53'),
(39, 115, 14, 12, '2024-04-07 00:57:05', '2024-04-07 00:57:05'),
(40, 115, 8, 12, '2024-04-07 00:57:22', '2024-04-07 00:57:22'),
(41, 115, 20, 16, '2024-04-07 01:13:30', '2024-04-07 01:13:30'),
(42, 115, 22, 15, '2024-04-07 01:13:30', '2024-04-07 01:13:30'),
(43, 115, 1, 5, '2024-04-07 07:37:54', '2024-04-07 07:37:54'),
(44, 115, 4, 2, '2024-04-07 07:41:34', '2024-04-07 07:41:34'),
(45, 116, 9, 1, '2024-04-12 22:13:31', '2024-04-12 22:13:31'),
(46, 116, 6, 1, '2024-04-12 22:13:38', '2024-04-12 22:13:38'),
(47, 117, 15, 1, '2024-04-13 04:38:38', '2024-04-13 04:38:38'),
(48, 117, 17, 1, '2024-04-13 04:38:52', '2024-04-13 04:38:52'),
(49, 131, 2, 1, '2024-04-16 22:34:39', '2024-04-16 22:34:39'),
(50, 131, 7, 1, '2024-04-16 22:34:46', '2024-04-16 22:34:46'),
(51, 132, 1, 1, '2024-04-18 15:55:44', '2024-04-18 15:55:44'),
(52, 132, 12, 1, '2024-04-18 16:06:02', '2024-04-18 16:06:02'),
(53, 142, 1, 1, '2024-05-07 06:39:18', '2024-05-07 06:39:18'),
(54, 142, 2, 1, '2024-05-07 06:52:49', '2024-05-07 06:52:49'),
(55, 143, 15, 1, '2024-05-07 07:03:55', '2024-05-07 07:03:55'),
(56, 143, 16, 1, '2024-05-07 07:04:06', '2024-05-07 07:04:06'),
(57, 143, 8, 1, '2024-05-07 07:04:38', '2024-05-07 07:04:38'),
(58, 143, 9, 1, '2024-05-07 07:04:58', '2024-05-07 07:04:58'),
(59, 148, 1, 2, '2024-05-17 10:27:22', '2024-05-17 10:27:22'),
(60, 148, 2, 1, '2024-05-17 10:27:32', '2024-05-17 10:27:32'),
(61, 148, 3, 3, '2024-05-17 10:27:44', '2024-05-17 10:27:44'),
(62, 148, 5, 2, '2024-05-17 10:27:55', '2024-05-17 10:27:55'),
(63, 155, 8, 1, '2024-05-17 10:34:03', '2024-05-17 10:34:03'),
(64, 155, 9, 2, '2024-05-17 10:34:12', '2024-05-17 10:34:12'),
(65, 155, 11, 3, '2024-05-17 10:34:20', '2024-05-17 10:34:20'),
(66, 155, 13, 4, '2024-05-17 10:34:34', '2024-05-17 10:34:34'),
(67, 162, 1, 1, '2024-05-26 00:14:54', '2024-05-26 00:14:54'),
(68, 162, 2, 1, '2024-05-26 00:15:03', '2024-05-26 00:15:03'),
(69, 164, 2, 2, '2024-06-04 16:50:27', '2024-06-04 16:50:27'),
(70, 165, 1, 1, '2024-06-05 12:42:55', '2024-06-05 12:42:55'),
(71, 165, 2, 1, '2024-06-05 12:43:02', '2024-06-05 12:43:02'),
(72, 166, 15, 1, '2024-06-05 12:51:25', '2024-06-05 12:51:25'),
(73, 166, 16, 1, '2024-06-05 12:51:33', '2024-06-05 12:51:33'),
(74, 179, 7, 1, '2024-08-04 22:46:37', '2024-08-04 22:46:37'),
(75, 180, 18, 4, '2024-08-04 22:54:29', '2024-08-04 22:54:29'),
(76, 180, 6, 14, '2024-08-04 22:54:38', '2024-08-04 22:54:38'),
(77, 188, 17, 112, '2024-08-11 21:21:58', '2024-08-11 21:21:58'),
(78, 190, 9, 2, '2024-08-21 21:24:16', '2024-08-21 21:24:16'),
(79, 189, 6, 1, '2024-08-21 21:25:13', '2024-08-21 21:25:13'),
(80, 197, 1, 1, '2024-09-12 12:01:02', '2024-09-12 12:01:02'),
(81, 197, 15, 1, '2024-09-12 12:01:09', '2024-09-12 12:01:09'),
(82, 204, 8, 4, '2024-09-19 09:08:37', '2024-09-19 09:08:37'),
(83, 205, 2, 1, '2024-09-19 09:16:42', '2024-09-19 09:16:42'),
(84, 205, 7, 1, '2024-09-19 09:16:48', '2024-09-19 09:16:48'),
(85, 205, 10, 1, '2024-09-19 09:16:53', '2024-09-19 09:16:53'),
(86, 206, 1, 10, '2024-09-19 09:19:41', '2024-09-19 09:19:41'),
(87, 210, 1, 2, '2024-09-23 06:12:19', '2024-09-23 06:12:19'),
(88, 211, 6, 2, '2024-09-23 08:45:21', '2024-09-23 08:45:21'),
(89, 211, 3, 1, '2024-09-23 08:45:29', '2024-09-23 08:45:29'),
(90, 212, 19, 1, '2024-09-23 09:00:05', '2024-09-23 09:00:05'),
(91, 212, 5, 1, '2024-09-23 09:00:11', '2024-09-23 09:00:11'),
(92, 212, 4, 1, '2024-09-23 09:00:18', '2024-09-23 09:00:18'),
(93, 213, 6, 4, '2024-09-23 10:18:24', '2024-09-23 10:18:24'),
(94, 214, 4, 2, '2024-09-23 10:24:09', '2024-09-23 10:24:09'),
(95, 214, 1, 1, '2024-09-23 10:24:40', '2024-09-23 10:24:40'),
(96, 216, 3, 5, '2024-09-25 04:41:03', '2024-09-25 04:41:03'),
(97, 217, 2, 3, '2024-09-25 04:46:49', '2024-09-25 04:46:49'),
(98, 218, 3, 2, '2024-09-25 04:51:41', '2024-09-25 04:51:41'),
(99, 219, 3, 2, '2024-09-25 05:01:23', '2024-09-25 05:01:23'),
(100, 221, 4, 3, '2024-09-25 05:32:51', '2024-09-25 05:32:51'),
(101, 225, 3, 3, '2024-09-25 06:22:41', '2024-09-25 06:22:41'),
(102, 226, 7, 2, '2024-09-25 06:34:16', '2024-09-25 06:34:16'),
(103, 226, 3, 6, '2024-09-25 06:34:25', '2024-09-25 06:34:25'),
(104, 227, 18, 10, '2024-09-25 06:49:15', '2024-09-25 06:49:15'),
(105, 228, 18, 1, '2024-09-25 15:28:43', '2024-09-25 15:28:43'),
(106, 229, 18, 10, '2024-09-25 15:38:23', '2024-09-25 15:38:23'),
(107, 229, 5, 4, '2024-09-25 15:38:32', '2024-09-25 15:38:32'),
(108, 236, 15, 1, '2024-09-25 22:30:53', '2024-09-25 22:30:53'),
(109, 235, 8, 1, '2024-09-25 22:33:13', '2024-09-25 22:33:13'),
(110, 237, 5, 1, '2024-09-26 03:11:26', '2024-09-26 03:11:26'),
(111, 238, 19, 1, '2024-09-26 03:21:41', '2024-09-26 03:21:41'),
(112, 239, 16, 1, '2024-09-26 03:28:20', '2024-09-26 03:28:20'),
(113, 240, 2, 1, '2024-09-26 03:31:08', '2024-09-26 03:31:08'),
(114, 241, 19, 1, '2024-09-26 10:28:27', '2024-09-26 10:28:27'),
(115, 242, 3, 10, '2024-09-26 10:31:24', '2024-09-26 10:31:24'),
(116, 243, 19, 1, '2024-09-26 11:14:03', '2024-09-26 11:14:03'),
(117, 244, 6, 1, '2024-09-26 11:29:16', '2024-09-26 11:29:16'),
(118, 245, 10, 1, '2024-09-26 11:31:08', '2024-09-26 11:31:08'),
(119, 246, 18, 1, '2024-09-26 11:34:37', '2024-09-26 11:34:37'),
(120, 247, 2, 1, '2024-09-26 11:35:25', '2024-09-26 11:35:25'),
(121, 248, 7, 2, '2024-09-26 11:35:52', '2024-09-26 11:35:52'),
(122, 249, 2, 1, '2024-09-26 11:39:53', '2024-09-26 11:39:53'),
(123, 250, 2, 1, '2024-09-26 11:43:01', '2024-09-26 11:43:01'),
(124, 251, 19, 1, '2024-09-26 11:43:50', '2024-09-26 11:43:50'),
(125, 252, 1, 1, '2024-09-26 22:09:01', '2024-09-26 22:09:01'),
(126, 252, 19, 1, '2024-09-26 22:09:06', '2024-09-26 22:09:06'),
(127, 252, 20, 1, '2024-09-26 22:09:18', '2024-09-26 22:09:18'),
(128, 253, 11, 1, '2024-09-26 22:16:27', '2024-09-26 22:16:27');

-- --------------------------------------------------------

--
-- Table structure for table `pages`
--

CREATE TABLE `pages` (
  `id` int(11) NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `slug` varchar(191) DEFAULT NULL,
  `excerpt` text DEFAULT NULL,
  `thumbnail` varchar(255) DEFAULT NULL,
  `main_text_body` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pages`
--

INSERT INTO `pages` (`id`, `title`, `slug`, `excerpt`, `thumbnail`, `main_text_body`, `created_at`, `updated_at`) VALUES
(6, 'Test blog NCA', 'test-blog-nca', 'Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book', NULL, '<h2>TITLE 1</h2><p>&nbsp;</p><p>Choose a convenient date, time, and location for pickup</p><p>&nbsp;</p><p>&nbsp;</p><figure class=\"image image-style-side\"><img src=\"https://www.savillesdrycleaners.co.uk/newsitedesign/public/pages/1714563562.png\"></figure><p>Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p><p>&nbsp;</p><p>Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p><p>&nbsp;</p><p>&nbsp;</p><p>Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p><p>&nbsp;</p><p>Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.&nbsp;</p><p>&nbsp;</p><h3>HEADING 2&nbsp;</h3><p>Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p><p>&nbsp;</p><p>Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p><p>&nbsp;</p><p>&nbsp;</p><p>Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p><p>&nbsp;</p><p>&nbsp;</p><p>&nbsp;</p>', '2024-04-17 07:31:29', '2024-05-01 11:41:05'),
(7, 'Ask HN: Does Anybody Still Use JQuery?', 'ask-hn-does-anybody-still-use-jquery', 'Do you like Cheese Whiz? Spray tan? Fake eyelashes? That\'s what is Lorem Ipsum to many—it rubs them the wrong way, all the way. It\'s unreal, uncanny, makes you wonder if something is wrong, it seems to seek your attention for all the wrong reasons. Usually, we prefer the real thing, wine without sulfur based preservatives, real butter, not margarine, and so we\'d like our layouts and designs to be filled with real words, with thoughts that count, information that has value.', '1713528302.jpg', '<h3>Lorem Ipsum: when, and when not to use it<br />\r\n<img alt=\"\" src=\"https://www.savillesdrycleaners.co.uk/newsitedesign/public/assets/ckeditor_full/uploads/1714980503.jpg\" style=\"height:153px; width:230px\" /><br />\r\n&nbsp;</h3>\r\n\r\n<p>Do you like Cheese Whiz? Spray tan? Fake eyelashes? That&#39;s what is Lorem Ipsum to many&mdash;it rubs them the wrong way, all the way. It&#39;s unreal, uncanny, makes you wonder if something is wrong, it seems to seek your attention for all the wrong reasons. Usually, we prefer the real thing, wine without sulfur based preservatives, real butter, not margarine, and so we&#39;d like our layouts and designs to be filled with real words, with thoughts that count, information that has value.</p>\r\n\r\n<p>The toppings you may chose for that TV dinner pizza slice when you forgot to shop for foods, the paint you may slap on your face to impress the new boss is your business. But what about your daily bread? Design comps, layouts, wireframes&mdash;will your clients accept that you go about things the facile way? Authorities in our business will tell in no uncertain terms that Lorem Ipsum is that huge, huge no no to forswear forever. Not so fast, I&#39;d say, there are some redeeming factors in favor of greeking text, as its use is merely the symptom of a worse problem to take into consideration.</p>\r\n\r\n<p><img alt=\"\" src=\"https://preview.colorlib.com/theme/webmag/img/post-4.jpg\" />So Lorem Ipsum is bad (not necessarily)</p>\r\n\r\n<p>You begin with a text, you sculpt information, you chisel away what&#39;s not needed, you come to the point, make things clear, add value, you&#39;re a content person, you like words. Design is no afterthought, far from it, but it comes in a deserved second. Anyway, you still use Lorem Ipsum and rightly so, as it will always have a place in the web workers toolbox, as things happen, not always the way you like it, not always in the preferred order. Even if your less into design and more into content strategy you may find some redeeming value with, wait for it, dummy copy, no less.</p>\r\n\r\n<p>There&#39;s lot of hate out there for a text that amounts to little more than garbled words in an old language. The villagers are out there with a vengeance to get that Frankenstein, wielding torches and pitchforks, wanting to tar and feather it at the least, running it out of town in shame.</p>\r\n\r\n<p>One of the villagers, Kristina Halvorson from Adaptive Path, holds steadfastly to the notion that design can&rsquo;t be tested without real content:</p>\r\n\r\n<blockquote>\r\n<p>I&rsquo;ve heard the argument that &ldquo;lorem ipsum&rdquo; is effective in wireframing or design because it helps people focus on the actual layout, or color scheme, or whatever. What kills me here is that we&rsquo;re talking about creating a user experience that will (whether we like it or not) be DRIVEN by words. The entire structure of the page or app flow is FOR THE WORDS.</p>\r\n</blockquote>\r\n\r\n<p>If that&#39;s what you think how bout the other way around? How can you evaluate content without design? No typography, no colors, no layout, no styles, all those things that convey the important signals that go beyond the mere textual, hierarchies of information, weight, emphasis, oblique stresses, priorities, all those subtle cues that also have visual and emotional appeal to the reader. Rigid proponents of content strategy may shun the use of dummy copy but then designers might want to ask them to provide style sheets with the copy decks they supply that are in tune with the design direction they require.</p>\r\n\r\n<h3>Summing up, if the copy is diverting attention from the design it&rsquo;s because it&rsquo;s not up to task.</h3>\r\n\r\n<p>Typographers of yore didn&#39;t come up with the concept of dummy copy because people thought that content is inconsequential window dressing, only there to be used by designers who can&rsquo;t be bothered to read. Lorem Ipsum is needed because words matter, a lot. Just fill up a page with draft copy about the client&rsquo;s business and they will actually read it and comment on it. They will be drawn to it, fiercely. Do it the wrong way and draft copy can derail your design review.</p>', '2024-04-19 12:05:02', '2024-05-06 07:28:48'),
(8, 'Rocket Lab mission fails shortly after launch', 'rocket-lab-mission-fails-shortly-after-launch', 'Apple today named eight app and game developers receiving an Apple Design Award, each one selected for being thoughtful and creative. Apple Design Award winners bring distinctive new ideas to life and demonstrate deep mastery of Apple technology. The apps spring up from developers large and small, in every part of the world, and provide users with new ways of working, creating, and playing.', '1713529425.jpg', '<ul><li>&nbsp;</li></ul><p><img src=\"https://new.axilthemes.com/themes/blogar/wp-content/uploads/2021/01/demo_image-13-1440x720.jpg\" alt=\"demo_image-13\" srcset=\"https://new.axilthemes.com/themes/blogar/wp-content/uploads/2021/01/demo_image-13-1440x720.jpg 1440w, https://new.axilthemes.com/themes/blogar/wp-content/uploads/2021/01/demo_image-13-1230x615.jpg 1230w\" sizes=\"100vw\" width=\"1440\"></p><p><strong>Winners are recognized for outstanding app design, innovation, ingenuity, and technical achievement</strong></p><p>Apple today named eight app and game developers receiving an Apple Design Award, each one selected for being thoughtful and creative. Apple Design Award winners bring distinctive new ideas to life and demonstrate deep mastery of Apple technology. The apps spring up from developers large and small, in every part of the world, and provide users with new ways of working, creating, and playing.</p><p>“Every year, app and game developers demonstrate exceptional craftsmanship and we’re honoring the best of the best,” said Ron Okamoto, Apple’s vice president of Worldwide Developer Relations. “Receiving an Apple Design Award is a special and laudable accomplishment. Past honorees have made some of the most noteworthy apps and games of all time. Through their vision, determination, and exacting standards, the winning developers inspire not only their peers in the Apple developer community, but all of us at Apple, too.”</p><h2>Apple Design Award Winners: Apps</h2><p>Apple today named eight app and game developers receiving an Apple Design Award, each one selected for being thoughtful and creative. Apple Design Award winners bring distinctive new ideas to life and demonstrate deep mastery of Apple technology. The apps spring up from developers large and small, in every part of the world, and provide users with new ways of working, creating, and playing.</p><p>“Every year, app and game developers demonstrate exceptional craftsmanship and we’re honoring the best of the best,” said Ron Okamoto, Apple’s vice president of Worldwide Developer Relations. “Receiving an Apple Design Award is a special and laudable accomplishment. Past honorees have made some of the most noteworthy apps and games of all time. Through their vision, determination, and exacting standards, the winning developers inspire not only their peers in the Apple developer community, but all of us at Apple, too.”</p><p>“Most of us felt like we could trust each other to be quarantined together, so we didn’t need to wear masks or stay far apart.”</p><p><img src=\"https://new.axilthemes.com/themes/blogar/wp-content/uploads/2021/01/post-single-03.jpg\" alt=\"single post image one \">The Apple Design Award trophy, created by the Apple Design team, is a symbol of achievement and excellence.</p><h2>Apple Design Award Winners: Apps</h2><p><a href=\"http://axilthemes.com/demo/template/blogar/post-details.html#\">Apple today named</a>&nbsp;eight app and game developers receiving an Apple Design Award, each one selected for being thoughtful and creative. Apple Design Award winners bring distinctive new ideas to life and demonstrate deep mastery of Apple technology. The apps spring up from developers large and small, in every part of the world, and provide users with new ways of working, creating, and playing.</p><p>“Every year, app and game developers demonstrate exceptional craftsmanship and we’re honoring the best of the best,” said Ron Okamoto, Apple’s vice president of Worldwide Developer Relations. “Receiving an Apple Design Award is a special and laudable accomplishment. Past honorees have made some of the most noteworthy apps and games of all time. Through their vision, determination, and exacting standards, the winning developers inspire not only their peers in the Apple developer community, but all of us at Apple, too.”</p><p><img src=\"https://new.axilthemes.com/themes/blogar/wp-content/uploads/2021/01/post-single-04.jpg\" alt=\"This image has an empty alt attribute; its file name is post-single-04.jpg\">The Apple Design Award trophy, created by the Apple Design team</p><h3>Apple Design Award Winners: Apps</h3><p><a href=\"https://new.axilthemes.com/themes/blogar/rocket-lab-mission-fails-shortly-after-launch/#\">Apple today named&nbsp;eight app and game developers receiving an Apple Design Award, each one selected for being thoughtful and creative. </a>Apple Design Award winners bring distinctive new ideas to life and demonstrate deep mastery of Apple technology. The apps spring up from developers large and small, in every part of the world, and provide users with new ways of working, creating, and playing.</p><p>“Every year, app and game developers demonstrate exceptional craftsmanship and we’re honoring the best of the best,” said Ron Okamoto, Apple’s vice president of Worldwide Developer Relations. “Receiving an Apple Design Award is a special and laudable accomplishment. Past honorees have made some of the most noteworthy apps and games of all time. Through their vision, determination, and exacting standards, the winning developers inspire not only their peers in the Apple developer community, but all of us at Apple, too.”</p><p>More than 250 developers have been recognized with Apple Design Awards over the past 20 years. The recognition has proven to be an accelerant for developers who are pioneering innovative designs within their individual apps and influencing entire categories. Previous winners such as Pixelmator, djay, Complete Anatomy, HomeCourt, “Florence,” and “Crossy Road” have set the standard in areas such as storytelling, interface design, and use of Apple tools and technologies.</p><p>For more information on the apps and games, visit the&nbsp;<a href=\"http://axilthemes.com/demo/template/blogar/post-details.html#\">App Store</a>.</p>', '2024-04-19 12:23:45', '2024-04-19 12:23:45'),
(9, 'Business BMW and Nissan Interested in Partnering With Tesla', 'business-bmw-and-nissan-interested-in-partnering-with-tesla', 'This is some dummy copy. You’re not really supposed to read this dummy copy, it is just a place holder for people who need some type to visualize what the actual copy might look like if it were real content.', '1713529843.jpg', '<p><a href=\"https://i0.wp.com/demo.wpzoom.com/tribune/files/2015/02/Tesla2.jpg2_.jpg\"><img src=\"https://i0.wp.com/demo.wpzoom.com/tribune/files/2015/02/Tesla2.jpg2_.jpg?resize=810%2C455\" alt=\"NG HAN GUAN/ASSOCIATED PRESS\" srcset=\"https://i0.wp.com/demo.wpzoom.com/tribune/files/2015/02/Tesla2.jpg2_.jpg?w=950&amp;ssl=1 950w, https://i0.wp.com/demo.wpzoom.com/tribune/files/2015/02/Tesla2.jpg2_.jpg?resize=300%2C169&amp;ssl=1 300w, https://i0.wp.com/demo.wpzoom.com/tribune/files/2015/02/Tesla2.jpg2_.jpg?resize=768%2C432&amp;ssl=1 768w, https://i0.wp.com/demo.wpzoom.com/tribune/files/2015/02/Tesla2.jpg2_.jpg?resize=98%2C55&amp;ssl=1 98w, https://i0.wp.com/demo.wpzoom.com/tribune/files/2015/02/Tesla2.jpg2_.jpg?resize=650%2C365&amp;ssl=1 650w\" sizes=\"100vw\" width=\"810\"></a>Image: NG HAN GUAN/ASSOCIATED PRESS</p><p>This is some dummy copy. You’re not really supposed to read this dummy copy, it is just a place holder for people who need some type to visualize what the actual copy might look like if it were real content.</p><p>If you want to read, I might suggest a good book, perhaps <a href=\"https://en.wikipedia.org/wiki/Ernest_Hemingway\">Hemingway</a> or <a href=\"https://en.wikipedia.org/wiki/Herman_Melville\">Melville</a>. That’s why they call it, the dummy copy. This, of course, is not the real copy for this entry. Rest assured, the words will expand the concept. With clarity. Conviction. And a little wit.</p><p>In today’s competitive <a href=\"https://en.wikipedia.org/wiki/Market_environment\">market environment</a>, the body copy of your entry must lead the reader through a series of <strong>disarmingly simple thoughts</strong>.</p><p>All your supporting arguments must be communicated with simplicity and charm. And in such a way that the reader will read on. (After all, that’s a reader’s job: to read, isn’t it?) And by the time your readers have reached this point in the finished copy, you will have convinced them that you not only respect their intelligence, but you also <strong>understand their needs as consumers</strong>.</p>', '2024-04-19 12:30:43', '2024-04-19 12:30:43'),
(10, 'Amid ban, X says working with govt to ‘understand concerns’', 'amid-ban-x-says-working-with-govt-to-understand-concerns', 'Social media platform X, which has been disrupted in Pakistan since February, has said that it continues to work with the government to “understand their concerns”.', '1713529958.jpg', '<p>Social media platform X, which has been disrupted in Pakistan since February, has said that it continues to work with the government to “understand their concerns”.<br><img src=\"https://www.savillesdrycleaners.co.uk/newsitedesign/public/pages/1713529940.jpg\"><br>Access to X has been disrupted since <a href=\"https://www.dawn.com/news/1814999\">February 17</a>, when former Rawal­pindi commissioner Liaquat Chattha accused the chief election commissioner and chief justice of Pakistan of being involved in rigging the February 8 general elections.</p><p>Rights bodies and journalists’ organisations have condemned the muzzling of social media, while internet service providers have also lamented losses due to disruptions. The United States had also <a href=\"https://www.dawn.com/news/1816152/govt-formation-pakistans-internal-matter-says-us\">called</a> on Pakistan to lift restrictions on social media platforms.</p><p>In March, the interior ministry had <a href=\"https://www.dawn.com/news/1822791\">informed</a> the Sindh High Court (SHC) that the social media platform was blocked pending further orders on the reports of intelligence agencies.</p><p>The interior ministry’s admission came days after Information Minister Attaullah Tarar <a href=\"https://www.dawn.com/news/1822336\">acknowledged</a> that X was “already banned” when the new government took over the reins from the caretaker set-up, saying there was no official notification for the clampdown.</p><p>On Wednesday, the SHC directed the interior ministry to either justify the shutdown of X or rescind its Feb 17 letter directing the telecom regulator to ban the site.</p><p>“The SHC has given the government one week to withdraw the letter, failing which, on the next date, they will pass appropriate orders,” Abdul Moiz Jaferii, a lawyer challenging the ban, told <i>AFP</i>.</p><p>Meanwhile, the ministry also submitted a detailed report before the Islamabad High Court (IHC), insisting that the site was banned “in the interest of upholding national security, maintaining public order, and preserving the integrity of our nation”.</p><p>The report, submitted before IHC Chief Justice Aamer Farooq, said the social media platform was not registered in Pakistan nor was it under any obligation to comply with Pakistani laws.</p><p>It claimed that X had “not complied with the requests of Pakistani authorities” after the Federal Investigation Agency (FIA)’s cybercrime wing forwarded numerous requests via the Pakistan Telecommun­ication Authority (PTA) to take “significant action to block accounts involved in a defamatory campaign against the honourable Chief Justice of Pakistan”.</p><p>Noting that the FIA’s wing had initiated several FIRs against hundreds of Twitter accounts, the interior ministry asserted that the “lack of cooperation from Twitter/X authorities in addressing content that violates Pakistani laws and values further justifies the need for regulatory measures, including the temporary ban”.</p><p>“The government of Pakistan has no alternative but to temporarily block access/suspend the operation of this platform within Pakistan,” it said.</p><p>The report said the interior ministry had on Feb 17 asked for blocking of X immediately till further orders on the reports of intelligence agencies.</p><p>“The decision to impose a ban on Twitter/X in Pakistan was made in the interest of upholding national security, maintaining public order, and preserving the integrity of our nation,” it contended, adding that the decision was taken after considering “various confidential reports received from intelligence and security agencies of Pakistan”.</p><p>It emphasised that “hostile elements operating on Twitter/X have nefarious intentions to create an environment of chaos and instability, with the ultimate goal of destabilising the country and plunging it into some form of anarchy”.</p><p>“The ban on Twitter serves as a necessary step to disrupt the activities of these elements and prevent them from achieving their destructive objectives,” the report said.</p><p>It noted that X was neither registered in Pakistan nor had it signed an agreement to abide by local laws. It said the platform’s “failure to establish a legal presence or engage in meaningful cooperation with Pakistani authorities underscores the need for regulatory measures to ensure accountability and adherence to national laws”.</p><p>“The ban on Twitter/X serves as a necessary step to address this regulatory vacuum and compel the platform to respect the sovereignty and legal jurisdiction of Pakistan,” the interior ministry added.</p><p>It said social media platforms were extensively used to propagate extremist ideologies and fake information, adding that some miscreants were using social media as a tool to create a law and order situation and destabilise Pakistan.</p><p>It said the ban on X was not to restrict access to information but to streamline the use of social media platforms, and the interior ministry was under obligation to protect citizens’ rights and national interests.</p><p>It pointed out that TikTok was also banned earlier and was only restored after it agreed to abide by the law of the land.</p>', '2024-04-19 12:32:38', '2024-04-19 12:32:38'),
(11, 'Unlocking Your Creative Potential: 7 Strategies to Ignite Your Imagination', 'unlocking-your-creative-potential-7-strategies-to-ignite-your-imagination', 'Creativity is not a gift bestowed upon a select few; it\'s a muscle that everyone possesses and can strengthen with practice. Whether you\'re an artist, writer, entrepreneur, or simply seeking to infuse more innovation into your daily life, nurturing your creative potential is key to unlocking new possibilities and solutions. In this blog post, we\'ll explore seven strategies to ignite your imagination and tap into your innate creativity.', '1713530955.png', '<p><img src=\"https://www.savillesdrycleaners.co.uk/newsitedesign/public/pages/1713530923.jpg\"><br>Introduction: Creativity is not a gift bestowed upon a select few; it\'s a muscle that everyone possesses and can strengthen with practice. Whether you\'re an artist, writer, entrepreneur, or simply seeking to infuse more innovation into your daily life, nurturing your creative potential is key to unlocking new possibilities and solutions. In this blog post, we\'ll explore seven strategies to ignite your imagination and tap into your innate creativity.</p><p>Embrace Curiosity: Curiosity is the spark that ignites creativity. Cultivate a mindset of wonder and exploration by asking questions, seeking new experiences, and staying open to the world around you. Allow yourself to be fascinated by the ordinary, and you\'ll uncover extraordinary insights and ideas.<br><img src=\"https://www.savillesdrycleaners.co.uk/newsitedesign/public/pages/1713530943.jpg\"></p><p>Break Routine: Routine can be the enemy of creativity, stifling inspiration and trapping you in a cycle of predictability. Break free from the monotony by introducing novelty into your daily life. Take a different route to work, try a new hobby, or engage in activities outside your comfort zone. Disrupting your routine stimulates your brain and encourages fresh perspectives.</p><p>Practice Mindfulness: Mindfulness is not only beneficial for reducing stress and enhancing well-being but also for nurturing creativity. Take moments throughout your day to pause, breathe, and bring your awareness to the present moment. By quieting the mind and grounding yourself in the here and now, you create space for inspiration to emerge.</p><p>Embrace Failure: Fear of failure can inhibit creativity, preventing you from taking risks and exploring new ideas. Instead of viewing failure as a setback, reframe it as a natural part of the creative process. Embrace failure as an opportunity to learn, grow, and refine your ideas. Remember, some of the greatest innovations were born from multiple attempts and iterations.</p><p>Stimulate Your Senses: Engage all your senses to awaken your creativity. Surround yourself with inspiring sights, sounds, textures, and aromas. Visit art galleries, listen to music from different genres, experiment with new cuisines, and spend time in nature. By immersing yourself in diverse sensory experiences, you fuel your imagination and enrich your creative output.</p><p>Collaborate and Connect: Creativity thrives in collaboration and community. Surround yourself with individuals who challenge and inspire you. Exchange ideas, seek feedback, and collaborate on projects that stimulate your creativity. By connecting with others, you tap into a collective pool of knowledge and perspectives, fostering innovation and mutual growth.</p><p>Make Time for Play: Play is not just for children; it\'s a powerful catalyst for creativity in adults too. Set aside time for unstructured, playful activities that allow your mind to wander and explore without constraints. Whether it\'s doodling, improvising music, or building with Lego bricks, play stimulates your imagination and encourages a playful approach to problem-solving.</p><p>Conclusion: Creativity is a journey of self-discovery and exploration, fueled by curiosity, courage, and an open mind. By incorporating these strategies into your life, you\'ll unleash your creative potential and unlock new realms of possibility. Embrace the joy of creation, and let your imagination soar.<br>&nbsp;</p>', '2024-04-19 12:49:15', '2024-04-19 12:49:15'),
(12, 'What is Lorem Ipsum?', 'what-is-lorem-ipsum', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.', '1714981127.jpg', '<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum</p>\r\n\r\n<p><br />\r\n<img alt=\"\" src=\"https://www.savillesdrycleaners.co.uk/newsitedesign/public/assets/ckeditor_full/uploads/1714980896.png\" style=\"float:right; height:338px; width:450px\" />Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><span style=\"font-size:10px\">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</span></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.<br />\r\n<br />\r\n<img alt=\"\" src=\"https://www.savillesdrycleaners.co.uk/newsitedesign/public/assets/ckeditor_full/uploads/1714981107.jpg\" style=\"height:304px; width:650px\" /></p>', '2024-05-06 07:36:51', '2024-05-06 07:40:14'),
(13, 'dry cleaners cobham', 'dry-cleaners-cobham', 'dry cleaners in cobham', NULL, '<p>dry cleaners in cobham</p>', '2024-09-27 19:40:16', '2024-09-27 19:40:16');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `password_resets`
--

INSERT INTO `password_resets` (`email`, `token`, `created_at`) VALUES
('kaushikkasodariya71@gmail.com', 'Hs2ArWMgMwGsIyPmAahrXL93CiB3DtfCUmjL8TDE0MIxqTyD0MyKqYpq4957BxgE', '2024-01-20 05:44:45'),
('bilalt.tahir@gmail.com', 'U99aCZP5aHvOoXSXyKPypqv3zFp1M6BNrChWj0Vq63t7friBp3mSf1nn1qO1kTtv', '2024-06-03 23:23:14'),
('bilalt.tahir@gmail.com', 'uFNfM1g6wk8dFP4DWrxV9Thhk6wACSbvKswTxJXFWmiLAkOn53e2ooD6Rd8iMPYV', '2024-06-03 23:23:14');

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `charge_id` varchar(255) NOT NULL,
  `transaction_id` varchar(255) NOT NULL,
  `customer` varchar(255) NOT NULL,
  `amount` varchar(255) NOT NULL DEFAULT '0',
  `currency` varchar(255) NOT NULL,
  `payment_method` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `guard_name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'user.view', 'web', '2023-03-20 15:46:39', '2023-03-20 15:46:39'),
(2, 'user.list', 'web', '2023-03-20 15:46:39', '2023-03-20 15:46:39'),
(3, 'user.create', 'web', '2023-03-20 15:46:39', '2023-03-20 15:46:39'),
(4, 'user.edit', 'web', '2023-03-20 15:46:39', '2023-03-20 15:46:39'),
(5, 'user.delete', 'web', '2023-03-20 15:46:39', '2023-03-20 15:46:39'),
(6, 'user.access', 'web', '2023-03-20 15:46:39', '2023-03-20 15:46:39'),
(7, 'service.view', 'web', '2023-03-20 15:46:39', '2023-03-20 15:46:39'),
(8, 'service.list', 'web', '2023-03-20 15:46:39', '2023-03-20 15:46:39'),
(9, 'service.create', 'web', '2023-03-20 15:46:39', '2023-03-20 15:46:39'),
(10, 'service.edit', 'web', '2023-03-20 15:46:39', '2023-03-20 15:46:39'),
(11, 'service.access', 'web', '2023-03-20 15:46:39', '2023-03-20 15:46:39'),
(12, 'service.delete', 'web', '2023-03-20 15:46:39', '2023-03-20 15:46:39'),
(13, 'post_code.list', 'web', '2023-03-20 15:46:39', '2023-03-20 15:46:39'),
(14, 'post_code.create', 'web', '2023-03-20 15:46:39', '2023-03-20 15:46:39'),
(15, 'post_code.edit', 'web', '2023-03-20 15:46:39', '2023-03-20 15:46:39'),
(16, 'post_code.access', 'web', '2023-03-20 15:46:39', '2023-03-20 15:46:39'),
(17, 'post_code.delete', 'web', '2023-03-20 15:46:39', '2023-03-20 15:46:39');

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `post_codes`
--

CREATE TABLE `post_codes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `code` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `post_codes`
--

INSERT INTO `post_codes` (`id`, `code`, `created_at`, `updated_at`) VALUES
(1, 'KT11', '2023-03-20 15:46:39', '2023-03-20 15:46:39'),
(2, 'KT10', '2023-03-20 15:46:39', '2023-03-20 15:46:39'),
(3, 'KT13', '2023-03-20 15:46:39', '2023-03-20 15:46:39'),
(4, 'KT12', '2023-03-20 15:46:39', '2023-03-20 15:46:39'),
(5, 'KT22', '2023-03-20 15:46:39', '2023-03-20 15:46:39'),
(6, 'KT7', '2023-03-20 15:46:39', '2023-03-20 15:46:39');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `guard_name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `access_to_panel` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `guard_name`, `created_at`, `updated_at`, `access_to_panel`) VALUES
(1, 'admin', 'web', '2023-03-20 15:46:39', '2023-03-20 15:46:39', 1),
(2, 'staff', 'web', '2023-03-20 15:46:39', '2023-03-20 15:46:39', 1),
(3, 'customer', 'web', '2023-03-20 15:46:39', '2023-03-20 15:46:39', 0);

-- --------------------------------------------------------

--
-- Table structure for table `role_has_permissions`
--

CREATE TABLE `role_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sections`
--

CREATE TABLE `sections` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `keywords` varchar(1000) DEFAULT NULL,
  `section_icon_id` bigint(20) UNSIGNED NOT NULL,
  `description` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sections`
--

INSERT INTO `sections` (`id`, `name`, `slug`, `keywords`, `section_icon_id`, `description`, `created_at`, `updated_at`) VALUES
(1, 'Dry Cleaning', 'dry-cleaning', NULL, 3, 'For Delicate Items And Fabrics', '2023-03-20 15:46:39', '2023-03-31 22:07:21'),
(2, 'Shirt Service', 'shirt-service', NULL, 4, 'Shirts Laundered & Pressed for a Crisp Finish', '2023-03-22 16:31:28', '2023-03-22 16:31:28'),
(3, 'Bed Linen', 'bed-linen', NULL, 6, 'Hotel Crisp Bed Linen, Duvets & Blankets', '2023-03-22 16:33:14', '2023-03-22 16:33:14'),
(4, 'Duvets & Household', 'duvets-household', NULL, 1, 'For Larger Items that requie Extra Care', '2023-03-22 16:35:52', '2023-03-22 16:35:52'),
(5, 'Alterations & Repairs', 'alterations-repairs', NULL, 5, 'Trousers, Jeans, Dresses, Skirts & Jackets', '2023-03-26 21:32:22', '2023-03-26 21:32:22'),
(6, 'Wedding Dresses', 'wedding-dresses', NULL, 9, 'Beautifully Cleaned, Restored and Presented to Keep Forever', '2023-03-26 21:33:38', '2023-03-26 21:33:38'),
(7, 'Suede & Leather', 'suede-leather', NULL, 8, 'Specialist cleaning for Leather, Suede & Fur Items', '2023-03-26 21:34:39', '2023-03-26 21:34:39'),
(8, 'Specialist', 'specialist', NULL, 2, 'Specialist Cleaning for Canada Goose, Moncler, Burberry & Ski Wear Items', '2023-03-26 21:39:19', '2023-03-26 21:39:19'),
(9, 'asdas', 'asdas', 'asdsadasdas', 1, 'sadsad', '2023-05-20 06:28:22', '2023-05-20 06:28:22');

-- --------------------------------------------------------

--
-- Table structure for table `section_icons`
--

CREATE TABLE `section_icons` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `icon` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `section_icons`
--

INSERT INTO `section_icons` (`id`, `icon`, `created_at`, `updated_at`) VALUES
(1, 'images/products/1.png', '2023-03-20 15:46:39', '2023-03-20 15:46:39'),
(2, 'images/products/2.png', '2023-03-20 15:46:39', '2023-03-20 15:46:39'),
(3, 'images/products/3.png', '2023-03-20 15:46:39', '2023-03-20 15:46:39'),
(4, 'images/products/4.png', '2023-03-20 15:46:39', '2023-03-20 15:46:39'),
(5, 'images/products/5.png', '2023-03-20 15:46:39', '2023-03-20 15:46:39'),
(6, 'images/products/6.png', '2023-03-20 15:46:39', '2023-03-20 15:46:39'),
(7, 'images/products/7.png', '2023-03-20 15:46:39', '2023-03-20 15:46:39'),
(8, 'images/products/8.png', '2023-03-20 15:46:39', '2023-03-20 15:46:39'),
(9, 'images/products/9.png', '2023-03-20 15:46:39', '2023-03-20 15:46:39');

-- --------------------------------------------------------

--
-- Table structure for table `section_tag`
--

CREATE TABLE `section_tag` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `section_id` bigint(20) UNSIGNED NOT NULL,
  `tag_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `section_tag`
--

INSERT INTO `section_tag` (`id`, `section_id`, `tag_id`, `created_at`, `updated_at`) VALUES
(1, 1, 1, NULL, NULL),
(2, 1, 2, NULL, NULL),
(3, 1, 3, NULL, NULL),
(4, 2, 2, NULL, NULL),
(5, 2, 3, NULL, NULL),
(6, 2, 4, NULL, NULL),
(7, 3, 2, NULL, NULL),
(8, 3, 4, NULL, NULL),
(9, 3, 5, NULL, NULL),
(10, 4, 1, NULL, NULL),
(11, 4, 4, NULL, NULL),
(12, 4, 5, NULL, NULL),
(13, 5, 6, NULL, NULL),
(14, 6, 1, NULL, NULL),
(15, 6, 2, NULL, NULL),
(16, 6, 3, NULL, NULL),
(17, 6, 5, NULL, NULL),
(18, 7, 5, NULL, NULL),
(19, 8, 1, NULL, NULL),
(20, 8, 5, NULL, NULL),
(21, 9, 7, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE `services` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `section_id` bigint(20) UNSIGNED NOT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `description` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`id`, `section_id`, `category_id`, `title`, `price`, `description`, `created_at`, `updated_at`) VALUES
(1, 1, 13, '2pc Suit', '16.50', NULL, '2023-03-20 15:49:21', '2023-03-22 15:58:52'),
(2, 1, 13, '2Pc Dinner Suit', '19.50', NULL, '2023-03-22 15:59:09', '2023-03-22 15:59:09'),
(3, 1, 13, '2pc Dress Suit', '19.50', NULL, '2023-03-22 15:59:27', '2023-03-22 15:59:27'),
(4, 1, 13, '2pc Skirt Suit', '18.50', NULL, '2023-03-22 15:59:43', '2023-03-22 15:59:43'),
(5, 1, 14, 'Blouse', '9.50', NULL, '2023-03-22 16:03:33', '2023-03-22 16:03:33'),
(6, 1, 14, 'Silk Blouse', '12.50', NULL, '2023-03-22 16:03:50', '2023-03-22 16:03:50'),
(7, 1, 14, 'Short Dress', '11.50', NULL, '2023-03-22 16:04:17', '2023-03-22 16:04:17'),
(8, 4, 15, 'Single Duvet', '24.00', NULL, '2023-03-22 16:36:53', '2023-03-22 16:42:04'),
(9, 4, 15, 'Double Duvet', '28.00', NULL, '2023-03-22 16:42:18', '2023-03-22 16:42:18'),
(10, 4, 15, 'Kings Size Duvet', '30.00', NULL, '2023-03-22 16:42:48', '2023-03-22 16:42:48'),
(11, 4, 15, 'Super King Duvet', '35.00', NULL, '2023-03-22 16:43:04', '2023-03-22 16:43:04'),
(12, 4, 16, 'Single Blanket', '22.00', NULL, '2023-03-22 16:43:22', '2023-03-22 16:43:22'),
(13, 4, 16, 'Double Blanket', '28.00', NULL, '2023-03-22 16:43:40', '2023-03-22 16:43:40'),
(14, 4, 17, 'Throw', '38.00', NULL, '2023-03-22 16:53:19', '2023-03-22 16:53:19'),
(15, 2, 20, 'Shirt Hung', '2.99', NULL, '2023-03-22 16:54:18', '2023-03-22 16:54:18'),
(16, 2, 20, 'Shirt Folded', '3.95', NULL, '2023-03-22 16:54:36', '2023-03-22 16:54:36'),
(17, 2, 20, 'Shirt Hung Press Only', '2.30', NULL, '2023-03-22 16:55:00', '2023-03-22 16:55:00'),
(18, 1, 14, 'Long Dress', '15.50', NULL, '2023-03-26 21:42:53', '2023-03-26 21:42:53'),
(19, 1, 14, 'Jumpsuit', '17.00', NULL, '2023-03-26 21:43:11', '2023-03-26 21:43:11'),
(20, 8, 21, 'Canada Goose', '50.00', NULL, '2023-03-26 21:44:53', '2023-03-26 21:44:53'),
(21, 8, 21, 'Moncler', '50.00', NULL, '2023-03-26 21:45:08', '2023-03-26 21:45:08'),
(22, 8, 21, 'Burberry Raincoat', '40.00', NULL, '2023-03-26 21:45:29', '2023-03-26 21:45:29'),
(23, 8, 21, 'Ski Jacket', '25.00', NULL, '2023-03-26 21:45:53', '2023-03-26 21:45:53'),
(24, 8, 21, 'Ski Trouser', '20.00', NULL, '2023-03-26 21:46:12', '2024-02-01 22:07:16');

-- --------------------------------------------------------

--
-- Table structure for table `setting`
--

CREATE TABLE `setting` (
  `id` int(11) NOT NULL,
  `logo` text DEFAULT NULL,
  `footer_info` text DEFAULT NULL,
  `mobile_number` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `setting`
--

INSERT INTO `setting` (`id`, `logo`, `footer_info`, `mobile_number`, `created_at`, `updated_at`) VALUES
(1, '1706101007.svg', 'Indulge in refined dry cleaning services with Savilles Dry Cleaning & Laundry. With over six decades of expertise, we cater to discerning clients in Cobham, Oxshott, Esher, Weybridge, and the surrounding areas.', '01932 863 248', '2024-01-24 06:38:31', '2024-05-03 21:26:42');

-- --------------------------------------------------------

--
-- Table structure for table `social`
--

CREATE TABLE `social` (
  `id` int(11) NOT NULL,
  `logo` text DEFAULT NULL,
  `url` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `social`
--

INSERT INTO `social` (`id`, `logo`, `url`, `created_at`, `updated_at`) VALUES
(4, '1706106880.svg', 'https://www.instagram.com/', '2024-01-24 09:04:40', '2024-01-25 08:09:44'),
(7, '1706107800.svg', 'https://www.facebook.com/', '2024-01-24 09:20:00', '2024-01-24 09:20:00');

-- --------------------------------------------------------

--
-- Table structure for table `switch_timings`
--

CREATE TABLE `switch_timings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `switch` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `switch_timings`
--

INSERT INTO `switch_timings` (`id`, `switch`, `created_at`, `updated_at`) VALUES
(1, 'yes', '2023-03-20 15:47:59', '2023-05-21 03:46:26');

-- --------------------------------------------------------

--
-- Table structure for table `tags`
--

CREATE TABLE `tags` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tags`
--

INSERT INTO `tags` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Dry Cleaning', NULL, NULL),
(2, 'Ironing', NULL, NULL),
(3, 'On Hangers', NULL, NULL),
(4, 'Wash', NULL, NULL),
(5, 'Custom Cleaning', NULL, NULL),
(6, 'Custom', NULL, NULL),
(7, 'On Hangers', NULL, NULL),
(8, 'Cleaning', NULL, NULL),
(9, 'Specialist', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `timings`
--

CREATE TABLE `timings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `timing` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `timings`
--

INSERT INTO `timings` (`id`, `timing`, `created_at`, `updated_at`) VALUES
(3, '10:00am - 13:00 pm', '2023-03-31 07:03:20', '2023-04-19 21:47:40'),
(4, '6:00pm - 7:00pm', '2023-03-31 07:11:25', '2024-02-01 22:06:21'),
(7, '5:00pm - 6:00pm', '2024-02-01 22:06:10', '2024-02-01 22:06:10');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `gauth_id` varchar(255) DEFAULT NULL,
  `gauth_type` varchar(255) DEFAULT NULL,
  `otp` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `gauth_id`, `gauth_type`, `otp`) VALUES
(1, 'Bilal Tahirasdasd', 'bilal@admin.com', NULL, '$2y$10$zxpjBUCoSbpRM5u7VVMl7ONuEaqJqy.lzBgvGje/1QY41YQ6arKJe', NULL, '2023-03-20 15:46:39', '2023-05-21 12:53:09', NULL, NULL, NULL),
(2, 'kaushik', 'kaushik@mailinator.com', NULL, '$2y$10$zxpjBUCoSbpRM5u7VVMl7ONuEaqJqy.lzBgvGje/1QY41YQ6arKJe', NULL, '2023-05-11 19:13:30', '2023-05-11 19:13:30', NULL, NULL, NULL),
(10, 'asda', 'asdsadas@gmail.com', NULL, '$2y$10$CUmz1AgoTZz3JdSGIJSP6.JRwUFdqWFDQUal62em1DdNcSUtbSNm6', NULL, '2023-05-20 05:08:14', '2023-05-20 05:08:14', NULL, NULL, NULL),
(11, 'asdas', 'asdasd@gmail.com', NULL, '$2y$10$KK34ulP/lix3ml./35u9XeR6CGyvbTUUY.TCv6.FnhRjuRfC4Szkq', NULL, '2023-05-20 05:09:10', '2023-05-20 05:09:10', NULL, NULL, NULL),
(12, 'dgfh', 'dfghfdg@gmail.com', NULL, '$2y$10$bfexRmt7DO.IVu4T5QymvOwBlcQg8I0wm4vVFyQ.xRvGIntUupdg2', NULL, '2023-05-20 05:10:24', '2023-05-20 05:10:24', NULL, NULL, NULL),
(13, 'dodo', 'dodo@mailinator.com', NULL, '$2y$10$BvKh5tcx82QvqALb/wigseFyoh4yJ8MdjbNgHxExZVCxLnNQRbPQq', NULL, '2023-05-20 05:12:05', '2024-02-08 12:16:59', '1', NULL, NULL),
(16, 'Kaushik Kasodariya', 'kaushik.kasodariya@gfacility.com', NULL, 'eyJpdiI6IldjblZPQmJDRVM5WDlnaXZDczlSUEE9PSIsInZhbHVlIjoiMFArQlhRNkpnNHlUb2tMZlYxQUN6MURRN0FRcVJoTXM5UjBIM2tzMk9CZz0iLCJtYWMiOiI4MjZkMmU4ZGM0MDkzZTZmODZlMWMzZWQzOWFlN2U4MjY3OGJiNjM3ZDU3Y2YxNjVjNDE0YjNjMTk1ZTQ5M2Y4IiwidGFnIjoiIn0=', NULL, '2023-05-23 13:12:46', '2023-05-23 13:12:46', '105761515039389777661', 'google', NULL),
(17, 'Kaushik Kasodariya', 'kaushikkasodariya71@gmail.com', NULL, 'eyJpdiI6Ik8xL2UwOG9QczEzbDd3UUcrSmszTVE9PSIsInZhbHVlIjoiRXJSZ2dlaDJhMlVnb0tFMGQ0MlRDTjJ4MDhvRC9EMGpSMGVrc0JSNmhFUT0iLCJtYWMiOiI4NzA5MGFkYzI5OGM0YWRhMjIzMzc2Y2Q4Y2IyMmI4M2U5OWEwZjM4MGNjY2E2OGNhYzgzMDFkZTI2NGZkM2FlIiwidGFnIjoiIn0=', NULL, '2023-05-24 00:16:47', '2023-05-24 00:16:47', '115632671056183435017', 'google', NULL),
(26, 'didi', 'didi@mailinator.com', NULL, '$2y$10$kxZqOJ8QfBipfNamFDxth.TwfZE33WOV5VF2HvBJEj61yIcQuSbJq', NULL, '2024-01-22 07:10:50', '2024-01-23 02:37:37', NULL, NULL, NULL),
(27, 'dada', 'dada@mailinator.com', NULL, '$2y$10$3MHSnti5itn4.0sLRdwR5.7q/RFeSxatS3w3.CTTSCnsBFA1MKpbm', NULL, '2024-01-22 07:20:40', '2024-01-22 07:20:40', NULL, NULL, NULL),
(28, 'bob', 'bob@mailinator.com', NULL, '$2y$10$/7o4MfzH3uf.ChlSxrJ/kO63wOFjNOqa56P.EUokCGgSPF/DtttCu', NULL, '2024-01-22 07:28:16', '2024-01-22 07:28:16', NULL, NULL, NULL),
(29, 'lolo', 'lol@mailinator.com', NULL, '$2y$10$DYTmTmDg/kCezhuUAznxMuqQyq/rRoGVCySerZaTDgfsE1Dke6q5S', NULL, '2024-01-22 07:30:08', '2024-01-22 07:30:08', NULL, NULL, NULL),
(30, 'jon', 'jon@mailinator.com', NULL, '$2y$10$2g5DkY/K2dPbCYE9k4lLCuTZ5mefv46KnC0kIJJ/J2.v8LalUmkze', NULL, '2024-01-22 07:31:39', '2024-01-24 23:55:12', NULL, NULL, NULL),
(31, 'developerBhai', 'developer@mailinator.com', NULL, '$2y$10$dJOdUWIr4/S9W/OdqHZBHOHov9nKsXFgyqt.IHpcv7R9XWfIIX0iO', NULL, '2024-01-22 09:08:59', '2024-01-22 09:08:59', NULL, NULL, NULL),
(32, 'programer', 'programer@mailinator.com', NULL, '$2y$10$eQQ3.ZaajaqTbVSNzX/qzeTD1Xf/Ip1aoZvI2U.QSvAy7durFCjge', NULL, '2024-01-22 23:34:17', '2024-01-22 23:34:17', NULL, NULL, NULL),
(33, 'jkkhjkhk', 'shdfudsf@gmail.com', NULL, '$2y$10$nNpzxQ/0kPrAO2u63SqK5eSO60RLLaMwDnaZxc9sAEDH9.Qqe6Vye', NULL, '2024-01-22 23:53:22', '2024-01-22 23:53:22', NULL, NULL, NULL),
(34, 'developerTesting', 'testing@mailinator.com', NULL, '$2y$10$Viwd5QzJdkJkt0WHOpMiEejrhRgps1qeQaxxs2solrFcshN4b6hmC', NULL, '2024-01-22 23:58:51', '2024-01-22 23:58:51', NULL, NULL, NULL),
(39, 'tester bro', 'testerbro@mailinator.com', NULL, '$2y$10$sh9hHNv1cS/AJTjaCArIyumWJiPeBmdOVnFz4V2NlGt3hCUGAZ4Pe', NULL, '2024-01-23 00:24:21', '2024-01-23 00:24:21', NULL, NULL, NULL),
(40, 'sgfds gf', 'tetst@mailinator.com', NULL, '$2y$10$/jOhtWuNDO2aWcfpPt4oj..fIK1h.gqTVUvze9g8MPfH6NPwNNqg.', NULL, '2024-01-23 00:25:39', '2024-01-23 00:25:39', NULL, NULL, NULL),
(41, 'daf af sad', 'fdasa@mailinator.com', NULL, '$2y$10$EZM2.7vcaN05pf4e3tRsLOykYSIRZVkzSTqCfYg8j/2AjnRLn0Oku', NULL, '2024-01-23 00:26:36', '2024-01-23 00:26:36', NULL, NULL, NULL),
(42, 'daf af sad', 'bross@mailinator.com', NULL, '$2y$10$u1tIVLOvDiaGQ7e7P5ofS.Q9doZ3c63S1hWAaMOSaK/z6jLZnKOmq', NULL, '2024-01-23 00:33:38', '2024-01-23 00:33:38', NULL, NULL, 2247),
(43, 'dodobahi', 'boss@mailinator.com', NULL, '$2y$10$fEidW0Tmvl91pST9I.u82eS7g13u/hPOgn3.Yy9KdFcY6qDF4KgjC', NULL, '2024-01-23 00:36:44', '2024-01-23 00:36:44', NULL, NULL, 9655),
(44, 'testerbri', 'testerbro1@mailinator.com', NULL, '$2y$10$WXeS54RfVWZXz7zynyne6.0Ftfu/3kDU11Hd2rrj8dz8QrWLZJIza', NULL, '2024-01-23 00:39:04', '2024-01-23 00:39:04', NULL, NULL, 8742),
(45, 'dodobro', 'ddobro@mailinator.com', NULL, '$2y$10$gFSUJTTsrukOX0GeRO6V4OGTwmVGA.mlbSs20on2Z5p9/WAcCKTmC', NULL, '2024-01-23 00:42:11', '2024-01-23 00:42:11', NULL, NULL, NULL),
(46, 'toto', 'weriyow922@wuzak.com', NULL, '$2y$10$IHmSm9ZAYh5IaLYVh8b.juLN4CchVytXk0UyxjVS5m2A3b3AJa002', NULL, '2024-01-23 00:44:03', '2024-01-23 00:44:03', NULL, NULL, NULL),
(47, 'dodo bro', 'dodobro@mailinator.com', NULL, '$2y$10$FoH6FiCSLfVmVi/MaV3Z.ekorrg9KyF6w9D.ORFO/PuTA5c/U/GLe', NULL, '2024-01-23 01:14:17', '2024-01-23 01:14:17', '2', NULL, 9671),
(48, 'ola', 'ola@mailinator.com', NULL, '$2y$10$CSA17vJEbM/ap1KUZf2YpOViciaFMXm6npO1hiIuoucAJYBF.XAuu', NULL, '2024-01-24 00:41:53', '2024-01-24 00:41:53', NULL, NULL, 2108),
(49, 'loyo', 'loyo@mailinator.com', NULL, '$2y$10$YM7QPviGxB.DeO8HgyxCZuMrE.ZcXv3w6ypi2CzWNtSk1dIHA54WC', NULL, '2024-01-25 00:00:42', '2024-01-25 00:07:28', NULL, NULL, NULL),
(50, 'lado', 'lado@mailinator.com', NULL, '$2y$10$6NeNZ085GfGSHWlH8H9d9.iDp13NZ7Ntxo0wy5tmfd3nwc0Yv/v0K', NULL, '2024-01-25 01:48:16', '2024-01-25 01:48:16', NULL, NULL, NULL),
(51, 'asdasd', 'asdsa@gmail.com', NULL, '$2y$10$nC6WjcAdNGj2dnWVSSyyjO8LLtonTgwxsmxOdfwV.KdHajD/7q0nC', NULL, '2024-01-26 11:20:01', '2024-01-26 11:20:01', NULL, NULL, NULL),
(52, 'BIlal Tahir', 'bilalt.tahir@gmail.com', NULL, '$2y$10$lkM24u7pykNM7ClzHvbQGu52DINVPsi/955ZuA1qR7ruMnd/gNHc2', NULL, '2024-01-29 18:19:08', '2024-03-12 23:03:49', NULL, NULL, NULL),
(53, 'Bilal Tahir', 'ripleycleaners@gmail.com', NULL, '$2y$10$MGWnAMKE86rttyYtECTRQO1Ciro3lkv/hXs7m2HVYcH6o9r93.vV6', NULL, '2024-01-29 20:12:40', '2024-01-29 20:12:40', NULL, NULL, NULL),
(54, 'testerDodo', 'dodo1@mailinator.com', NULL, '$2y$10$EHDezR8S2uDVoyMm1KW26eA6VuUVDmK8LFVH2bquKeXOZg46quZoO', NULL, '2024-02-08 12:44:30', '2024-02-08 12:47:29', NULL, NULL, NULL),
(55, 'dodo11', 'dodo11@mailinator.com', NULL, '$2y$10$kl49tSnbekVfVIQaI7vveuQtkc2u76jqHPiC6EtpsxZDTwL7SScie', NULL, '2024-02-12 05:06:46', '2024-02-12 05:20:32', NULL, NULL, NULL),
(56, 'akshay', 'akshaysonar450@gmail.com', NULL, '$2y$10$6v/27/unHs7tGSwOWHIGhu3mB5w6wNnUMQoz8Fk7RSY9cNOQO52Km', NULL, '2024-02-12 05:25:22', '2024-02-12 05:25:22', NULL, NULL, 9026),
(57, 'test developer', 'akshaysonar449@gmail.com', NULL, '$2y$10$NFhDRs.gZelZy1nRDhCFzOXWmYi2Y2hY8rvZv6AdljNRdaCRX1H3u', NULL, '2024-02-12 05:28:54', '2024-02-12 05:28:54', NULL, NULL, 1450),
(58, 'test developer', 'developer11@mailinator.com', NULL, '$2y$10$HYynKTmn4k9bNymPlua0zeaVr0B6.H0L4ktqIef4G8QAYsO7YyrIy', NULL, '2024-02-12 05:34:56', '2024-02-12 05:34:56', NULL, NULL, 8486),
(59, 'dodo121', 'dodo121@mailinator.com', NULL, '$2y$10$2sdOFKlGu7NuFaZcD5GmtuM6Y8uN9scoCLuqvI.7qK1j5uZQQXAZi', NULL, '2024-02-12 06:27:36', '2024-02-12 06:27:36', NULL, NULL, 8113),
(60, 'dodo121', 'dodo122@mailinator.com', NULL, '$2y$10$lrvedydqaYGlVqZU8VHpVOmq4Hcz6u6tYvr8qzYjvgaZXbmH9a1gC', NULL, '2024-02-12 06:27:59', '2024-02-12 06:27:59', NULL, NULL, 4331),
(61, 'dodo test', 'jon1@mailinator.com', NULL, '$2y$10$1jG3AsdvSqudHuPbnWXscueO3WgQk1M.SBZmp5Pxqa.q6HlV.ygmO', NULL, '2024-02-12 06:38:07', '2024-02-12 06:38:07', NULL, NULL, 2137),
(62, 'Jignesh', 'invoices@ASS.co.uk', NULL, '$2y$10$5guBqOr909uzLf4sMKLcd.2gYGEsUlKqwfij4Q59Comgpc4ZH.dRu', NULL, '2024-02-16 07:01:15', '2024-02-16 07:01:15', NULL, NULL, NULL),
(63, 'zara', 'b_theone_t@hotmail.com', NULL, '$2y$10$Q.yBPQKVCHhvRGQ.BSzzze5ZyQ.rzctGWpg395mrH2r8NXvDTjJZW', NULL, '2024-02-16 11:47:06', '2024-02-16 11:47:06', NULL, NULL, NULL),
(64, 'john doe', 'johndoe@gmail.com', NULL, '$2y$10$jCiOkB/2g7CHOzN5In07huZDqH9MqDZcaJrFcODw299DVEq1SCTEe', NULL, '2024-02-16 11:50:18', '2024-02-16 11:50:18', NULL, NULL, NULL),
(65, 'John Dev', 'johndev01@yopmail.com', NULL, '$2y$10$YIkOFyC65Xvb5MHXT8tC7.FtpfQmDdldxoAI7qJyjaqB9ZyE4Ed2W', NULL, '2024-02-28 08:36:06', '2024-03-13 04:58:36', NULL, NULL, 1403),
(66, 'test', 'puzzledevteam@example.com', NULL, '$2y$10$Z2Onq2ooTBuMph8r2Yyxtu3zYq/fOZcCz.MXn2UXs.w6m9OynU.p6', NULL, '2024-02-29 13:24:38', '2024-02-29 13:24:38', NULL, NULL, NULL),
(67, 'Sam Martin', 'sammartin@yopmail.com', NULL, '$2y$10$/UfS6XHTF4NUiw2taF8wEee1T8ykryb8bjv/INCy.3Ikf9kS5C9iK', NULL, '2024-03-01 12:21:55', '2024-03-01 12:21:55', NULL, NULL, NULL),
(68, 'BIlal Tahir', 'john@gmail.com', NULL, '$2y$10$hprhJqousT5./AKKDURgweQ7k7JEHch8Y4GbUf3IUzGjN7JYcrHVq', NULL, '2024-03-04 23:00:50', '2024-03-04 23:00:50', NULL, NULL, NULL),
(72, 'Test User', 'testuser001@yopmail.com', NULL, '$2y$10$0AN9W.xaEv5ofGlodFq7puforPs2RZ5toRJWfplYYVwDF6VrhY43q', NULL, '2024-03-11 08:51:01', '2024-03-11 08:51:01', NULL, NULL, NULL),
(73, 'Test Stripe User', 'teststripeuser001@yopmail.com', NULL, '$2y$10$XIFzk.bMSx76YUEvKmz5ee.JzyQUrOsxecIuepB6qL7ob7UQVV2IG', NULL, '2024-03-11 08:55:30', '2024-03-11 08:55:30', NULL, NULL, 7222),
(74, 'BIlal Tahir', 'test@gmail.com', NULL, '$2y$10$qInu6At32M5FBWjPo51RB.XMLvyi/PsyNCGLicsoaHhZ69IH92hjq', NULL, '2024-03-11 21:58:03', '2024-03-11 21:58:03', NULL, NULL, NULL),
(76, 'BIlal Tahir', 'savilles.drycleaners@gmail.com', NULL, '$2y$10$VDe7W5v0povwVoO54dUTzedhTS5rRrJfKUXmIykDcKc/SyiNJ//2G', NULL, '2024-03-12 23:00:28', '2024-03-12 23:00:28', NULL, NULL, 1166),
(83, 'Sam Luthar', 'samluthar0001@yopmail.com', NULL, '$2y$10$NePM4NNvF6qu5lmNORLY8eexW2sAU/nQgBCBI0913O4ASsHM5qDX6', NULL, '2024-03-14 06:18:57', '2024-03-14 06:18:57', NULL, NULL, NULL),
(84, 'admin', 'admin123@yopmail.com', NULL, '$2y$10$cOwOb0uHf65I2ZYRDWS8oOHul07hQzzbBSyBKyl6.kF8YFiV7Woeq', NULL, '2024-03-14 12:03:13', '2024-03-14 12:03:13', NULL, NULL, 1690),
(85, 'ravindra choudhary', 'ayush1234@yopmail.com', NULL, '$2y$10$ikzz10wDbSPX9YLlyQ3gMuh4KpNyudglrR/uzza7wgqZfgysCifZO', NULL, '2024-03-14 12:15:25', '2024-03-14 12:15:25', NULL, NULL, NULL),
(86, 'Manish', 'admin1234@yopmail.com', NULL, '$2y$10$F9/FbM3Papwyn/fBA68sD.xqfwK391wJwgYL/t7vtK1l1K2K8.BSq', NULL, '2024-03-14 12:21:01', '2024-03-14 12:21:01', NULL, NULL, 7662),
(87, 'Manish', 'admin12@yopmail.com', NULL, '$2y$10$aNYZZ.JRT1xxzrTkKUdqjuCYqQON3J0N6pirv3mx8kzTj6dhE9DR.', NULL, '2024-03-14 12:24:35', '2024-03-14 12:24:35', NULL, NULL, 1438),
(88, 'student00', 'student00@yopmail.com', NULL, '$2y$10$uWrxXaxqQ2bAXUM.p6fsD./163.EmAZVV6axiCSo8J20kKPAJouNe', NULL, '2024-03-14 12:26:32', '2024-03-14 12:26:32', NULL, NULL, 5207),
(89, 'Manish', 'admin@yopmail.com', NULL, '$2y$10$QEIeQQMR400bnTpVUMDuI.UY130B7gSIeu9/M7HkrprzM8oTBatcy', NULL, '2024-03-14 12:28:48', '2024-03-14 12:28:48', NULL, NULL, NULL),
(90, 'Manish', 'admin1@yopmail.com', NULL, '$2y$10$5sQVFyf7KNQ52wxVae6foepF9l/3P4hVdgml3RR5ofS.VFhW9XD9m', NULL, '2024-03-14 12:36:37', '2024-03-14 12:36:37', NULL, NULL, NULL),
(91, 'adsasdsa', 'student430@yopmail.com', NULL, '$2y$10$2sy7jpuUqY0Ed9yMSTBxmutEIlTNAIZtYY3LiA8JE1gP7ooiiEI2e', NULL, '2024-03-14 12:38:46', '2024-03-14 12:38:46', NULL, NULL, NULL),
(92, 'Manish', 'admin12345@yopmail.com', NULL, '$2y$10$G0F3pC/qIb3VFTkiOHKKduK1dTqyZaXy8RF.PkMm81viacvSqK2EO', NULL, '2024-03-14 12:40:01', '2024-03-14 12:40:01', NULL, NULL, 8125),
(93, 'Bilal Tahir', 'bilal@laundry.london', NULL, '$2y$10$YNxGO.k40UqisSfxnssDw.fMxDyj6QUBxZdyUwgZ4VRbljTclcS.G', NULL, '2024-03-16 17:09:12', '2024-03-16 22:36:44', NULL, NULL, NULL),
(94, 'samrty', 'samrty12@yopmail.com', NULL, '$2y$10$2/v8mwqZS6kN0b17Ymozf.KKYJu6fMXvmyWOj2Thitp13wgUuTFgi', NULL, '2024-03-18 12:38:16', '2024-03-18 12:38:16', NULL, NULL, NULL),
(95, 'Ravi', 'ravi00@yopmail.com', NULL, '$2y$10$6QgE0.hscQ2fw3sEQEe8sOxRjLAnFuXWrYihMw5PHt.KD1OhJtFKe', NULL, '2024-03-19 06:21:24', '2024-03-19 06:21:24', NULL, NULL, NULL),
(96, 'Rakesh', 'rakesh00@yopmail.com', NULL, '$2y$10$CEZ/okXn7sisl/CrMloJc.AAuWr8Fk3EWqyP.uR1PAHKkR8JIeTDe', NULL, '2024-03-19 06:31:26', '2024-03-19 06:31:26', NULL, NULL, NULL),
(97, 'Waqas Amjad', 'dev.mwaqas@gmail.com', NULL, '$2y$10$T5w5Q8cUI1QaA7nhKZWzZeNy7znuofwQUXOmTt1gTHxtYBPlxhS7a', NULL, '2024-04-07 00:21:48', '2024-04-16 10:53:32', NULL, NULL, NULL),
(98, 'Waqas Amjad', 'abc@xyz.com', NULL, '$2y$10$Bt1HumNR45xTnXZHddx4COXcPDbo.6EXYDqyVYSFlYPQNxOAov49u', NULL, '2024-04-16 18:33:13', '2024-04-16 18:33:13', NULL, NULL, NULL),
(99, 'Waqas Amjad', 'abcxyz@xyz.com', NULL, '$2y$10$Gzx1hb7ftuVEHb/11TtDeuyLf3Xjl6Tyv2b3OrwD31DOO9dENdMSi', NULL, '2024-04-16 18:40:51', '2024-04-16 18:40:51', NULL, NULL, NULL),
(100, 'Test', 'test2@GMAIL.COM', NULL, '$2y$10$LIdo69DU9IL4S0qL00PtdOzDQ5gkN1zBuvhi7QGS1SJrp/4vWylTC', NULL, '2024-06-25 18:27:50', '2024-06-25 18:27:50', NULL, NULL, NULL),
(101, 'Freelancer', 'test.admin@yopmail.com', NULL, '$2y$10$Ta/n6EtZb6bq6d0DTwB3De.Bm02A0ZmEyq/aIoWOthIVi4jRnXFJK', NULL, '2024-07-01 05:52:36', '2024-07-01 05:52:36', NULL, NULL, NULL),
(102, 'Yasin Shaikh', 'freelancingonupwork@gmail.com', NULL, '$2y$10$NjNsMnpZ9MgVBx33tHWkZ.xGkxJFNN7sogiq9lW3xcYRr.1NT/Ny.', NULL, '2024-07-17 06:41:06', '2024-07-17 06:41:06', NULL, NULL, NULL),
(103, 'John Doe', 'JohnDoe@test.com', NULL, '$2y$10$puzCKkBTwz2hCwbH7aGlWO4Z5mM5HX5KtjDRSKeynzWKbZ6tMu2Bu', NULL, '2024-07-21 13:44:02', '2024-07-21 13:44:02', NULL, NULL, NULL),
(104, 'Xieee jan', 'zia.khan@bitandbytes.net', NULL, '$2y$10$6XmKEL8JXetc0ckOF5JJP.UI3ze6idee2nJrLtN/yMboH0M0hd5.q', NULL, '2024-07-22 12:32:19', '2024-08-04 11:45:43', NULL, NULL, 9744),
(105, 'test', 'test@test.com', NULL, '$2y$10$IG.RiQFcHpeu2ZFp.ZzSMuHzXeEjpHTMJUiaFe8uzNPxq7oLZ2bJG', NULL, '2024-07-22 20:56:36', '2024-07-22 20:56:36', NULL, NULL, NULL),
(106, 'Xia', 'zia.khan@gmail.com', NULL, '$2y$10$Sw3BYfgVchwFHQ9dMJoPaOglaUt2ainGbXKR277WnpyJ4ygS55ksu', NULL, '2024-07-27 18:51:05', '2024-07-27 18:51:05', NULL, NULL, NULL),
(107, 'test', 'tesWmail@khan.co', NULL, '$2y$10$4KW0jDzpf9Q/XfuktzT68uuWWYoEOhD10L3CHS.yZ.a1nZphQlovO', NULL, '2024-07-27 18:54:53', '2024-07-27 18:54:53', NULL, NULL, NULL),
(108, 'Xia Khan', 'Xia.khan@gmail.com', NULL, '$2y$10$s.hsxeJjNRTkQ1BjGVakPOdoDfw9sEj5O8xLmh6qNKi.54yP6XEo2', NULL, '2024-07-27 21:18:02', '2024-07-27 21:18:02', NULL, NULL, NULL),
(109, 'Xia Kha', 'Khan@email.uk', NULL, '$2y$10$sSkbezhs6vxPUhHkRrgEdODjKa2FX/FCZCwzw7cxP.MuJRQFllwzu', NULL, '2024-08-03 21:49:07', '2024-08-03 21:49:07', NULL, NULL, NULL),
(110, 'with out logon', 'without@login.uk', NULL, '$2y$10$DY8SIlbbr9zNojz.LNkQu.T7d1K1khKgzw2CN4SQTzO3q5UF/P7Tm', NULL, '2024-08-04 11:37:09', '2024-08-04 11:37:09', NULL, NULL, NULL),
(111, 'Test', 'tws@gsi.com', NULL, '$2y$10$jYlJyUyKBzalYtEfGiQQJuFDIxxqgyzYKjm2Q1806ZSIQJpmkwYEC', NULL, '2024-08-09 08:16:25', '2024-08-09 08:16:25', NULL, NULL, NULL),
(112, 'Saidur Rohman', 'saidhstu13@gmail.com', NULL, '$2y$10$PAcw.k3fPdZH3ALRwKo/2utw.n4e283zqjseledx6QQLGRwnGFg4u', NULL, '2024-08-20 15:29:08', '2024-08-20 15:29:08', NULL, NULL, NULL),
(113, 'Saidur Rohman', 'saidhstu@gmail.com', NULL, '$2y$10$QsGOsFn7FKFvD.AXYykwT.9oa1nd2CY7bmvze3InukgkefAeYtlZO', NULL, '2024-08-21 05:49:18', '2024-08-21 05:49:18', NULL, NULL, 4758),
(114, 'Kiran Jamod', 'jamodkiran.dev@gmail.com', NULL, '$2y$10$nh5MynKvacbAycknQXQut.1NJr1IkS3L0d.9aRZl4z1KYgJgqV.C.', NULL, '2024-09-09 13:38:01', '2024-09-09 13:38:01', NULL, NULL, 3599),
(116, 'TESTER', 'tester123@gmail.com', NULL, '$2y$10$ts03QUbNFujhcr0sTdtEPO2BOBi4pbU8.tYC5lJuCTk4wU/.iaihS', NULL, '2024-09-26 03:16:40', '2024-09-26 03:16:40', NULL, NULL, 9610),
(117, 'TESTER', 'tester23@gmail.com', NULL, '$2y$10$ddBaHC0fSrjTZi3IGHcIMuCAO1RPyEdXGdykXh5DYOCXq0iuxE0Gy', NULL, '2024-09-26 03:19:03', '2024-09-26 03:19:03', NULL, NULL, 6320);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `customers_user_id_foreign` (`user_id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `faqs`
--
ALTER TABLE `faqs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `page_id` (`page_id`);

--
-- Indexes for table `footer_main_catagoris`
--
ALTER TABLE `footer_main_catagoris`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `footer_sub_catagoris`
--
ALTER TABLE `footer_sub_catagoris`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  ADD KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  ADD KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `off_days`
--
ALTER TABLE `off_days`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `orders_customer_id_foreign` (`customer_id`);

--
-- Indexes for table `order_sections`
--
ALTER TABLE `order_sections`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_services`
--
ALTER TABLE `order_services`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pages`
--
ALTER TABLE `pages`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `slug` (`slug`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `permissions_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `post_codes`
--
ALTER TABLE `post_codes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indexes for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `role_has_permissions_role_id_foreign` (`role_id`);

--
-- Indexes for table `sections`
--
ALTER TABLE `sections`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `sections_slug_unique` (`slug`),
  ADD KEY `sections_section_icon_id_foreign` (`section_icon_id`);

--
-- Indexes for table `section_icons`
--
ALTER TABLE `section_icons`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `section_tag`
--
ALTER TABLE `section_tag`
  ADD PRIMARY KEY (`id`),
  ADD KEY `section_tag_section_id_foreign` (`section_id`),
  ADD KEY `section_tag_tag_id_foreign` (`tag_id`);

--
-- Indexes for table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`id`),
  ADD KEY `services_section_id_foreign` (`section_id`),
  ADD KEY `services_category_id_foreign` (`category_id`);

--
-- Indexes for table `setting`
--
ALTER TABLE `setting`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `social`
--
ALTER TABLE `social`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `switch_timings`
--
ALTER TABLE `switch_timings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tags`
--
ALTER TABLE `tags`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `timings`
--
ALTER TABLE `timings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=133;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `faqs`
--
ALTER TABLE `faqs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `footer_main_catagoris`
--
ALTER TABLE `footer_main_catagoris`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `footer_sub_catagoris`
--
ALTER TABLE `footer_sub_catagoris`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `off_days`
--
ALTER TABLE `off_days`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=254;

--
-- AUTO_INCREMENT for table `order_sections`
--
ALTER TABLE `order_sections`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=190;

--
-- AUTO_INCREMENT for table `order_services`
--
ALTER TABLE `order_services`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=129;

--
-- AUTO_INCREMENT for table `pages`
--
ALTER TABLE `pages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `post_codes`
--
ALTER TABLE `post_codes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `sections`
--
ALTER TABLE `sections`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `section_icons`
--
ALTER TABLE `section_icons`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `section_tag`
--
ALTER TABLE `section_tag`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `setting`
--
ALTER TABLE `setting`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `social`
--
ALTER TABLE `social`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `switch_timings`
--
ALTER TABLE `switch_timings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tags`
--
ALTER TABLE `tags`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `timings`
--
ALTER TABLE `timings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=118;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `customers`
--
ALTER TABLE `customers`
  ADD CONSTRAINT `customers_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_customer_id_foreign` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`id`) ON DELETE SET NULL;

--
-- Constraints for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `sections`
--
ALTER TABLE `sections`
  ADD CONSTRAINT `sections_section_icon_id_foreign` FOREIGN KEY (`section_icon_id`) REFERENCES `section_icons` (`id`);

--
-- Constraints for table `section_tag`
--
ALTER TABLE `section_tag`
  ADD CONSTRAINT `section_tag_section_id_foreign` FOREIGN KEY (`section_id`) REFERENCES `sections` (`id`),
  ADD CONSTRAINT `section_tag_tag_id_foreign` FOREIGN KEY (`tag_id`) REFERENCES `tags` (`id`);

--
-- Constraints for table `services`
--
ALTER TABLE `services`
  ADD CONSTRAINT `services_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`),
  ADD CONSTRAINT `services_section_id_foreign` FOREIGN KEY (`section_id`) REFERENCES `sections` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
