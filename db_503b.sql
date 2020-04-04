-- phpMyAdmin SQL Dump
-- version 4.7.8
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Sep 24, 2019 at 05:00 AM
-- Server version: 5.5.60-MariaDB
-- PHP Version: 7.1.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_503b`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(5) NOT NULL,
  `category` varchar(200) NOT NULL,
  `sequence` int(5) NOT NULL,
  `created_at` datetime NOT NULL,
  `created_by` bigint(20) NOT NULL,
  `updated_at` datetime NOT NULL,
  `updated_by` bigint(20) DEFAULT NULL,
  `deleted_by` bigint(10) DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `category`, `sequence`, `created_at`, `created_by`, `updated_at`, `updated_by`, `deleted_by`, `deleted_at`) VALUES
(1, 'Wellness Health', 1, '2019-04-29 04:54:10', 1, '2019-05-30 06:57:19', NULL, NULL, NULL),
(2, 'IV Nutrition', 2, '2019-04-29 04:54:22', 1, '2019-05-30 06:57:19', NULL, NULL, NULL),
(3, 'Weight Management', 3, '2019-04-29 04:54:31', 1, '2019-05-30 06:57:19', NULL, NULL, NULL),
(4, 'Non-Sterile Topicals', 6, '2019-04-29 04:59:14', 1, '2019-07-10 23:09:45', NULL, NULL, NULL),
(5, 'Peptides', 5, '2019-04-29 04:59:29', 1, '2019-07-10 23:09:45', NULL, NULL, NULL),
(6, 'Commercial Products (subject to availability)', 7, '2019-04-29 04:59:50', 1, '2019-07-10 23:09:45', NULL, NULL, NULL),
(7, 'Miscellaneous Products', 8, '2019-04-29 05:00:14', 1, '2019-07-10 23:09:45', NULL, NULL, NULL),
(8, 'Sexual Dysfuntion', 3, '2019-04-29 05:00:34', 1, '2019-05-10 03:32:42', NULL, 1, '2019-05-10 03:32:42'),
(9, 'Pain Management', 4, '2019-07-10 23:08:15', 1, '2019-07-10 23:09:45', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `company_products`
--

CREATE TABLE `company_products` (
  `id` int(30) NOT NULL,
  `company_id` bigint(20) UNSIGNED NOT NULL,
  `category_id` int(5) NOT NULL,
  `sequence` int(30) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `strength` varchar(255) DEFAULT NULL,
  `pellet_size` varchar(255) DEFAULT NULL,
  `price` varchar(10) NOT NULL DEFAULT '0',
  `created_at` datetime NOT NULL,
  `created_by` bigint(20) NOT NULL,
  `updated_at` datetime NOT NULL,
  `updated_by` bigint(20) DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  `deleted_by` bigint(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `company_products`
--

INSERT INTO `company_products` (`id`, `company_id`, `category_id`, `sequence`, `product_name`, `strength`, `pellet_size`, `price`, `created_at`, `created_by`, `updated_at`, `updated_by`, `deleted_at`, `deleted_by`) VALUES
(1, 2, 7, 4, 'Estradiol Pellet', '6 mg', '(35mm)', '1.2', '2019-05-03 12:47:00', 1, '2019-07-10 23:29:42', 1, NULL, 2),
(2, 2, 4, 3, 'Erectile Dysfunction', '12.5 mg', '(34mm)', '0', '2019-05-03 12:49:00', 1, '2019-07-10 23:29:52', 2, '2019-07-10 23:29:52', 2),
(3, 2, 3, 3, 'test', '12.5 mg sdf', 'dsfsdf', '0', '2019-05-03 12:49:59', 1, '2019-05-03 12:53:24', 1, '2019-05-03 12:53:24', 1),
(4, 2, 7, 1, 'REGENERATE', NULL, '100ML', '0', '2019-05-07 17:19:59', 1, '2019-07-10 23:29:55', NULL, '2019-07-10 23:29:55', 2),
(6, 3, 2, 1, 'IREGENRATE', NULL, '10ML', '0', '2019-05-10 18:35:27', 1, '2019-05-12 16:09:57', 1, NULL, NULL),
(7, 3, 2, 2, 'IWANTITALL', NULL, '100ML', '0', '2019-05-12 16:09:01', 1, '2019-05-12 16:10:07', 1, NULL, NULL),
(8, 3, 2, 3, 'IREHYDRATE', NULL, '100mL', '0', '2019-05-16 04:14:26', 1, '2019-05-16 04:14:26', NULL, NULL, NULL),
(9, 3, 2, 4, 'IREVIVE', NULL, '100mL', '0', '2019-05-16 04:15:06', 1, '2019-05-16 04:15:06', NULL, NULL, NULL),
(10, 3, 2, 5, 'IREJUVENATE', NULL, '100mL', '0', '2019-05-16 04:15:45', 1, '2019-05-16 04:15:45', NULL, NULL, NULL),
(11, 3, 2, 6, 'IRIVITALIZE', NULL, '100mL', '0', '2019-05-16 04:16:22', 1, '2019-05-16 04:16:22', NULL, NULL, NULL),
(12, 3, 2, 7, 'IRECOVER', NULL, '100mL', '0', '2019-05-16 04:16:51', 1, '2019-05-16 04:16:51', NULL, NULL, NULL),
(13, 3, 2, 8, 'IREDUCE', NULL, '100mL', '0', '2019-05-16 04:17:14', 1, '2019-05-16 04:17:14', NULL, NULL, NULL),
(14, 2, 4, 5, 'Peracitamol', '24.5 mg', NULL, '0', '2019-05-23 07:30:23', 2, '2019-07-10 23:29:58', 2, '2019-07-10 23:29:58', 2),
(15, 4, 2, 1, 'Estradiol Pellet MT', '12.5 mg', '(34mm)', '0', '2019-07-16 04:39:26', 4, '2019-07-16 18:04:37', NULL, '2019-07-16 18:04:37', 4),
(16, 4, 2, 1, 'Dexpanthenol', '250 mg/mL', '30mL MDV', '20.50', '2019-07-16 17:59:38', 4, '2019-07-29 13:44:23', 1, NULL, NULL),
(17, 4, 2, 2, 'Ascorbic Acid (Vitamin C)', '500 mg/mL', '50 mL MDV', '16.50', '2019-07-16 18:00:37', 4, '2019-07-29 13:43:54', 1, NULL, NULL),
(18, 4, 2, 3, 'Pyridoxine (B6)', '100 mg/mL', '30mL MDV', '23.50', '2019-07-16 18:01:37', 4, '2019-07-29 13:45:11', 1, NULL, NULL),
(19, 4, 2, 4, 'Methycobalamin (B12)', '1000 mcg/mL', '30mL MDV', '21.50', '2019-07-16 18:02:17', 4, '2019-07-29 13:44:55', 1, NULL, NULL),
(20, 4, 2, 5, 'B-Complex', '100/2/100/2/2 mg/mL', '30mL MDV', '20.00', '2019-07-16 18:03:23', 4, '2019-08-09 03:52:06', 1, NULL, NULL),
(21, 4, 2, 6, 'Magnesium chloride', '200mg/mL', '50 mL MDV', '16.00', '2019-07-16 18:03:58', 4, '2019-08-09 03:52:16', 1, NULL, NULL),
(22, 4, 2, 7, 'Calcium Gluconate', '100 mg/mL', '10 mL SDV', '13.00', '2019-07-16 18:04:31', 4, '2019-08-09 03:52:26', 1, NULL, NULL),
(23, 4, 2, 8, 'Glutathione', '200mg/mL', '30mL MDV', '35.75', '2019-07-16 18:05:19', 4, '2019-07-29 13:44:40', 1, NULL, NULL),
(24, 5, 1, 1, 'Estradiol Pellet (Coming soon)', '6 mg', '(3mm)', '0', '2019-07-17 05:44:03', 5, '2019-07-17 05:44:11', NULL, '2019-07-17 05:44:11', 5),
(25, 6, 1, 1, 'TESTOSTERONE', '200 mg/mL', '30 mL MDV', '50', '2019-07-24 21:07:13', 1, '2019-08-13 01:38:17', 1, NULL, NULL),
(26, 2, 1, 5, 'Estradiol Pellet (Coming soon)', '6 mg', '(3mm)', '2.5', '2019-08-08 06:01:55', 1, '2019-08-08 06:01:55', NULL, NULL, NULL),
(27, 13, 1, 1, 'Dexpanthenol', '250 mg/mL', '30mL MDV', '', '2019-08-08 18:36:57', 1, '2019-08-09 03:27:12', NULL, '2019-08-09 03:27:12', 1),
(28, 13, 2, 2, 'Ascorbic Acid (Vitamin C)', '500 mg/mL', '50 mL MDV', '', '2019-08-08 18:36:57', 1, '2019-08-09 03:27:19', NULL, '2019-08-09 03:27:19', 1),
(29, 13, 3, 3, 'Pyridoxine (B6)', '100 mg/mL', '30mL MDV', '', '2019-08-08 18:36:57', 1, '2019-08-09 03:27:22', NULL, '2019-08-09 03:27:22', 1),
(30, 13, 4, 4, 'Methycobalamin (B12)', '1000 mcg/mL', '30mL MDV', '', '2019-08-08 18:36:57', 1, '2019-08-09 03:27:27', NULL, '2019-08-09 03:27:27', 1),
(31, 13, 5, 5, 'B-Complex', '100/2/100/2/2 mg/mL', '30mL MDV', '', '2019-08-08 18:36:57', 1, '2019-08-09 03:27:32', NULL, '2019-08-09 03:27:32', 1),
(32, 13, 6, 6, 'Magnesium chloride', '200mg/mL', '50 mL MDV', '', '2019-08-08 18:36:57', 1, '2019-08-09 03:27:35', NULL, '2019-08-09 03:27:35', 1),
(33, 13, 7, 7, 'Calcium Gluconate', '100 mg/mL', '10 mL SDV', '', '2019-08-08 18:36:57', 1, '2019-08-09 03:27:38', NULL, '2019-08-09 03:27:38', 1),
(34, 13, 8, 8, 'Glutathione', '200mg/mL', '30mL MDV', '', '2019-08-08 18:36:57', 1, '2019-08-09 03:27:42', NULL, '2019-08-09 03:27:42', 1),
(35, 13, 2, 1, 'Dexpanthenol', '250 mg/mL', '30mL MDV', '1', '2019-08-09 03:33:23', 1, '2019-08-09 03:41:47', 1, '2019-08-09 03:41:47', 1),
(36, 13, 2, 2, 'Ascorbic Acid (Vitamin C)', '500 mg/mL', '50 mL MDV', '$0.00', '2019-08-09 03:33:23', 1, '2019-08-09 03:41:50', NULL, '2019-08-09 03:41:50', 1),
(37, 13, 3, 3, 'Pyridoxine (B6)', '100 mg/mL', '30mL MDV', '$0.00', '2019-08-09 03:33:23', 1, '2019-08-09 03:41:58', NULL, '2019-08-09 03:41:58', 1),
(38, 13, 4, 4, 'Methycobalamin (B12)', '1000 mcg/mL', '30mL MDV', '$0.00', '2019-08-09 03:33:23', 1, '2019-08-09 03:42:02', NULL, '2019-08-09 03:42:02', 1),
(39, 13, 5, 5, 'B-Complex', '100/2/100/2/2 mg/mL', '30mL MDV', '$0', '2019-08-09 03:33:23', 1, '2019-08-09 03:42:05', NULL, '2019-08-09 03:42:05', 1),
(40, 13, 6, 6, 'Magnesium chloride', '200mg/mL', '50 mL MDV', '$0', '2019-08-09 03:33:23', 1, '2019-08-09 03:42:08', NULL, '2019-08-09 03:42:08', 1),
(41, 13, 7, 7, 'Calcium Gluconate', '100 mg/mL', '10 mL SDV', '$0', '2019-08-09 03:33:23', 1, '2019-08-09 03:42:10', NULL, '2019-08-09 03:42:10', 1),
(42, 13, 8, 8, 'Glutathione', '200mg/mL', '30mL MDV', '$0.00', '2019-08-09 03:33:23', 1, '2019-08-09 03:42:17', NULL, '2019-08-09 03:42:17', 1),
(43, 13, 1, 1, 'Dexpanthenol', '250 mg/mL', '30mL MDV', '25.00', '2019-08-09 03:43:24', 1, '2019-08-09 03:59:12', 1, '2019-08-09 03:59:12', 1),
(44, 13, 1, 2, 'Ascorbic Acid (Vitamin C)', '500 mg/mL', '50 mL MDV', '22.75', '2019-08-09 03:43:24', 1, '2019-08-09 03:59:15', 1, '2019-08-09 03:59:15', 1),
(45, 13, 1, 3, 'Pyridoxine (B6)', '100 mg/mL', '30mL MDV', '30.00', '2019-08-09 03:43:24', 1, '2019-08-09 03:59:18', 1, '2019-08-09 03:59:18', 1),
(46, 13, 1, 4, 'Methycobalamin (B12)', '1000 mcg/mL', '30mL MDV', '29.00', '2019-08-09 03:43:24', 1, '2019-08-09 03:59:21', 1, '2019-08-09 03:59:21', 1),
(47, 13, 1, 5, 'B-Complex', '100/2/100/2/2 mg/mL', '30mL MDV', '34.00', '2019-08-09 03:43:24', 1, '2019-08-09 03:59:25', 1, '2019-08-09 03:59:25', 1),
(48, 13, 1, 6, 'Magnesium chloride', '200mg/mL', '50 mL MDV', '20.00', '2019-08-09 03:43:24', 1, '2019-08-09 03:59:27', 1, '2019-08-09 03:59:27', 1),
(49, 13, 1, 7, 'Calcium Gluconate', '100 mg/mL', '10 mL SDV', '13.00', '2019-08-09 03:43:24', 1, '2019-08-09 03:59:31', 1, '2019-08-09 03:59:31', 1),
(50, 13, 1, 8, 'Glutathione', '200mg/mL', '30mL MDV', '47.00', '2019-08-09 03:43:24', 1, '2019-08-09 03:59:33', 1, '2019-08-09 03:59:33', 1),
(51, 13, 1, 9, 'Taurine', '50mg/mL', '30mL MDV', '$27.75', '2019-08-09 03:51:33', 1, '2019-08-09 03:59:37', NULL, '2019-08-09 03:59:37', 1),
(52, 13, 1, 10, 'Arginine HCL', '200 mg/mL', '30 mL MDV', '$31.00', '2019-08-09 03:51:33', 1, '2019-08-09 03:59:41', NULL, '2019-08-09 03:59:41', 1),
(53, 13, 1, 11, 'Zinc Sulfate', '2.5 mg/mL', '30mL MDV', '$27.75', '2019-08-09 03:51:33', 1, '2019-08-09 03:59:44', NULL, '2019-08-09 03:59:44', 1),
(54, 4, 1, 9, 'Taurine', '50mg/mL', '30mL MDV', '$27.75', '2019-08-09 03:51:55', 1, '2019-08-09 03:53:44', NULL, '2019-08-09 03:53:44', 1),
(55, 4, 1, 10, 'Arginine HCL', '200 mg/mL', '30 mL MDV', '$31.00', '2019-08-09 03:51:55', 1, '2019-08-09 03:53:50', NULL, '2019-08-09 03:53:50', 1),
(56, 4, 1, 11, 'Zinc Sulfate', '2.5 mg/mL', '30mL MDV', '$27.75', '2019-08-09 03:51:55', 1, '2019-08-09 03:53:56', NULL, '2019-08-09 03:53:56', 1),
(57, 4, 2, 9, 'Taurine', '50mg/mL', '30mL MDV', '$27.75', '2019-08-09 03:54:51', 1, '2019-08-09 03:54:51', NULL, NULL, NULL),
(58, 4, 2, 10, 'Arginine HCL', '200 mg/mL', '30 mL MDV', '$31.00', '2019-08-09 03:54:51', 1, '2019-08-09 03:54:51', NULL, NULL, NULL),
(59, 4, 2, 11, 'Zinc Sulfate', '2.5 mg/mL', '30mL MDV', '$27.75', '2019-08-09 03:54:51', 1, '2019-08-09 03:54:51', NULL, NULL, NULL),
(60, 13, 2, 13, 'Dexpanthenol', '250 mg/mL', '30mL MDV', '$25.00', '2019-08-09 03:58:59', 1, '2019-08-09 04:00:23', NULL, '2019-08-09 04:00:23', 1),
(61, 13, 2, 14, 'Ascorbic Acid (Vitamin C)', '500 mg/mL', '50 mL MDV', '$22.75', '2019-08-09 03:58:59', 1, '2019-08-09 04:00:27', NULL, '2019-08-09 04:00:27', 1),
(62, 13, 2, 15, 'Pyridoxine (B6)', '100 mg/mL', '30mL MDV', '$30.00', '2019-08-09 03:58:59', 1, '2019-08-09 04:00:31', NULL, '2019-08-09 04:00:31', 1),
(63, 13, 2, 16, 'Methycobalamin (B12)', '1000 mcg/mL', '30mL MDV', '$29.00', '2019-08-09 03:58:59', 1, '2019-08-09 04:00:33', NULL, '2019-08-09 04:00:33', 1),
(64, 13, 2, 17, 'B-Complex', '100/2/100/2/2 mg/mL', '30mL MDV', '$34.00', '2019-08-09 03:58:59', 1, '2019-08-09 04:00:36', NULL, '2019-08-09 04:00:36', 1),
(65, 13, 2, 18, 'Magnesium chloride', '200mg/mL', '50 mL MDV', '$20.00', '2019-08-09 03:58:59', 1, '2019-08-09 04:00:39', NULL, '2019-08-09 04:00:39', 1),
(66, 13, 2, 19, 'Calcium Gluconate', '100 mg/mL', '10 mL SDV', '$13.00', '2019-08-09 03:58:59', 1, '2019-08-09 04:00:42', NULL, '2019-08-09 04:00:42', 1),
(67, 13, 2, 20, 'Glutathione', '200mg/mL', '30mL MDV', '$47.00', '2019-08-09 03:58:59', 1, '2019-08-09 04:00:45', NULL, '2019-08-09 04:00:45', 1),
(68, 13, 2, 21, 'Taurine', '50mg/mL', '30mL MDV', '$ $27.75', '2019-08-09 03:58:59', 1, '2019-08-09 04:00:47', NULL, '2019-08-09 04:00:47', 1),
(69, 13, 2, 22, 'Arginine HCL', '200 mg/mL', '30 mL MDV', '$ $31.00', '2019-08-09 03:58:59', 1, '2019-08-09 04:00:51', NULL, '2019-08-09 04:00:51', 1),
(70, 13, 2, 23, 'Zinc Sulfate', '2.5 mg/mL', '30mL MDV', '$ $27.75', '2019-08-09 03:58:59', 1, '2019-08-09 04:00:10', NULL, '2019-08-09 04:00:10', 1),
(71, 13, 2, 2, 'Dexpanthenol', '250 mg/mL', '30mL MDV', '25.00', '2019-08-09 04:04:55', 1, '2019-08-09 04:05:21', 1, NULL, NULL),
(72, 13, 2, 3, 'Ascorbic Acid (Vitamin C)', '500 mg/mL', '50 mL MDV', '22.75', '2019-08-09 04:04:55', 1, '2019-08-09 04:04:55', NULL, NULL, NULL),
(73, 13, 2, 4, 'Pyridoxine (B6)', '100 mg/mL', '30mL MDV', '30.00', '2019-08-09 04:04:55', 1, '2019-08-09 04:05:31', 1, NULL, NULL),
(74, 13, 2, 5, 'Methycobalamin (B12)', '1000 mcg/mL', '30mL MDV', '29.00', '2019-08-09 04:04:55', 1, '2019-08-09 04:05:46', 1, NULL, NULL),
(75, 13, 2, 6, 'B-Complex', '100/2/100/2/2 mg/mL', '30mL MDV', '34.00', '2019-08-09 04:04:55', 1, '2019-08-09 04:05:56', 1, NULL, NULL),
(76, 13, 2, 7, 'Magnesium chloride', '200mg/mL', '50 mL MDV', '20.00', '2019-08-09 04:04:55', 1, '2019-08-09 04:06:06', 1, NULL, NULL),
(77, 13, 2, 8, 'Calcium Gluconate', '100 mg/mL', '10 mL SDV', '13.00', '2019-08-09 04:04:55', 1, '2019-08-09 04:06:18', 1, NULL, NULL),
(78, 13, 2, 9, 'Glutathione', '200mg/mL', '30mL MDV', '47.00', '2019-08-09 04:04:55', 1, '2019-08-09 04:06:28', 1, NULL, NULL),
(79, 13, 2, 10, 'Taurine', '50mg/mL', '30mL MDV', '27.75', '2019-08-09 04:04:55', 1, '2019-08-09 04:04:55', NULL, NULL, NULL),
(80, 13, 2, 11, 'Arginine HCL', '200 mg/mL', '30 mL MDV', '31.00', '2019-08-09 04:04:55', 1, '2019-08-09 04:06:38', 1, NULL, NULL),
(81, 13, 2, 12, 'Zinc Sulfate', '2.5 mg/mL', '30mL MDV', '27.75', '2019-08-09 04:04:55', 1, '2019-08-09 04:04:55', NULL, NULL, NULL),
(97, 11, 1, 1, 'Dexpanthenol', '250 mg/mL', '30mL MDV', '', '2019-08-28 23:53:58', 1, '2019-08-28 23:53:58', NULL, NULL, NULL),
(98, 11, 1, 2, 'Ascorbic Acid (Vitamin C)', '500 mg/mL', '50 mL MDV', '', '2019-08-28 23:53:58', 1, '2019-08-28 23:53:58', NULL, NULL, NULL),
(99, 11, 1, 3, 'Pyridoxine (B6)', '100 mg/mL', '30mL MDV', '', '2019-08-28 23:53:58', 1, '2019-08-28 23:53:58', NULL, NULL, NULL),
(100, 11, 1, 4, 'Methycobalamin (B12)', '1000 mcg/mL', '30mL MDV', '', '2019-08-28 23:53:58', 1, '2019-08-28 23:53:58', NULL, NULL, NULL),
(101, 11, 1, 5, 'B-Complex', '100/2/100/2/2 mg/mL', '30mL MDV', '', '2019-08-28 23:53:58', 1, '2019-08-28 23:53:58', NULL, NULL, NULL),
(102, 11, 1, 6, 'Magnesium chloride', '200mg/mL', '50 mL MDV', '', '2019-08-28 23:53:58', 1, '2019-08-28 23:53:58', NULL, NULL, NULL),
(103, 11, 1, 7, 'Calcium Gluconate', '100 mg/mL', '10 mL SDV', '', '2019-08-28 23:53:58', 1, '2019-08-28 23:53:58', NULL, NULL, NULL),
(104, 11, 1, 8, 'Glutathione', '200mg/mL', '30mL MDV', '', '2019-08-28 23:53:58', 1, '2019-08-28 23:53:58', NULL, NULL, NULL),
(105, 11, 1, 9, 'Taurine', '50mg/mL', '30mL MDV', '', '2019-08-28 23:53:58', 1, '2019-08-28 23:53:58', NULL, NULL, NULL),
(106, 11, 1, 10, 'Arginine HCL', '200 mg/mL', '30 mL MDV', '', '2019-08-28 23:53:58', 1, '2019-08-28 23:53:58', NULL, NULL, NULL),
(107, 11, 1, 11, 'Zinc Sulfate', '2.5 mg/mL', '30mL MDV', '', '2019-08-28 23:53:58', 1, '2019-08-28 23:53:58', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `locations`
--

CREATE TABLE `locations` (
  `id` int(80) NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `address1` varchar(255) NOT NULL,
  `address2` varchar(255) NOT NULL,
  `state` varchar(20) NOT NULL,
  `city` varchar(30) NOT NULL,
  `zip` varchar(10) NOT NULL,
  `billing_same_as_shipping` int(1) NOT NULL DEFAULT '1',
  `billing_address1` varchar(255) DEFAULT NULL,
  `billing_address2` varchar(255) DEFAULT NULL,
  `billing_state` varchar(20) DEFAULT NULL,
  `billing_city` varchar(30) DEFAULT NULL,
  `billing_zip` varchar(10) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `created_by` bigint(20) NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_by` bigint(20) DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `deleted_by` bigint(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `locations`
--

INSERT INTO `locations` (`id`, `user_id`, `address1`, `address2`, `state`, `city`, `zip`, `billing_same_as_shipping`, `billing_address1`, `billing_address2`, `billing_state`, `billing_city`, `billing_zip`, `created_at`, `created_by`, `updated_at`, `updated_by`, `deleted_at`, `deleted_by`) VALUES
(1, 3, 'location 1', '', '', '', '', 1, NULL, NULL, NULL, NULL, NULL, '2019-05-25 12:05:12', 3, '2019-05-25 12:05:12', NULL, NULL, NULL),
(2, 3, 'location 2', '', '', '', '', 1, NULL, NULL, NULL, NULL, NULL, '2019-05-25 12:06:16', 3, '2019-05-25 12:06:16', NULL, NULL, NULL),
(3, 3, 'Satellite 3', '', '', '', '', 1, NULL, NULL, NULL, NULL, NULL, '2019-05-31 22:25:09', 3, '2019-05-31 22:25:09', NULL, NULL, NULL),
(4, 4, 'HOWARD CENTER WAYCROSS', '', '', '', '', 1, NULL, NULL, NULL, NULL, NULL, '2019-07-14 21:51:49', 4, '2019-07-15 01:51:49', 4, NULL, NULL),
(5, 4, 'HOWARD CENTER TIFTON (1806 Lee Avenue)', '', '', '', '', 1, NULL, NULL, NULL, NULL, NULL, '2019-07-14 21:49:05', 4, '2019-07-15 01:49:05', 4, NULL, NULL),
(6, 4, 'HOWARD CENTER VALDOSTA', '', '', '', '', 1, NULL, NULL, NULL, NULL, NULL, '2019-07-15 01:48:26', 4, '2019-07-15 01:48:26', NULL, NULL, NULL),
(7, 4, 'HOWARD CENTER TIFTON (1948 Old Ocilla Rd)', '', '', '', '', 1, NULL, NULL, NULL, NULL, NULL, '2019-07-15 01:49:42', 4, '2019-07-15 01:49:42', NULL, NULL, NULL),
(8, 4, 'HOWARD CENTER DOUGLAS', '', '', '', '', 1, NULL, NULL, NULL, NULL, NULL, '2019-07-15 01:50:09', 4, '2019-07-15 01:50:09', NULL, NULL, NULL),
(9, 4, 'HOWARD CENTER MOULTRIE', '', '', '', '', 1, NULL, NULL, NULL, NULL, NULL, '2019-07-15 01:50:32', 4, '2019-07-15 01:50:32', NULL, NULL, NULL),
(10, 4, 'HOWARD CENTER WARNER ROBINSON', '', '', '', '', 1, NULL, NULL, NULL, NULL, NULL, '2019-07-15 01:50:58', 4, '2019-07-15 01:50:58', NULL, NULL, NULL),
(11, 4, 'HOWARD CENTER LEESBURG', '', '', '', '', 1, NULL, NULL, NULL, NULL, NULL, '2019-07-15 01:51:25', 4, '2019-07-15 01:51:25', NULL, NULL, NULL),
(12, 2, 'Acme Industrial Park', 'Goregaon E', 'Maharastra', 'Mumbai', '400063', 1, NULL, NULL, NULL, NULL, NULL, '2019-08-03 11:58:15', 2, '2019-08-03 15:58:15', 2, NULL, NULL),
(13, 6, 'Everest Mens Health (WOODBURY)', '', '', '', '', 1, NULL, NULL, NULL, NULL, NULL, '2019-07-25 01:10:31', 6, '2019-07-25 01:10:31', NULL, NULL, NULL),
(14, 6, 'EVEREST MENS HEALTH (PLYMOUTH)', '', '', '', '', 1, NULL, NULL, NULL, NULL, NULL, '2019-07-25 01:11:22', 6, '2019-07-25 01:11:22', NULL, NULL, NULL),
(15, 8, 'TAK SAN ANTONIO', '', '', '', '', 1, NULL, NULL, NULL, NULL, NULL, '2019-07-27 23:26:27', 8, '2019-07-27 23:26:27', NULL, NULL, NULL),
(16, 8, 'TAK LASVEGAS', '', '', '', '', 1, NULL, NULL, NULL, NULL, NULL, '2019-07-27 23:26:38', 8, '2019-07-27 23:26:38', NULL, NULL, NULL),
(17, 7, 'Nova Vita Wellness Center (Edinburg)', '', '', '', '', 1, NULL, NULL, NULL, NULL, NULL, '2019-07-31 16:55:58', 7, '2019-07-31 20:55:58', 7, NULL, NULL),
(18, 2, '777 Brockton Avenu', 'Memorial Drive', 'MA', 'Abington', '2351', 0, '700 Oak Street', 'Parkhurst Rd', 'NY', 'Chelmsford', '12205', '2019-08-03 15:29:25', 2, '2019-08-03 15:29:25', NULL, NULL, NULL),
(19, 2, '700 Oak Street New Street', 'Parkhurst Rd Line 1', 'MA', 'Mohegan Lake', '6340', 0, 'Acme Industrial Park 1', 'Goregaon E', 'Alabama', 'Mumbai', '400063', '2019-08-09 09:16:27', 2, '2019-08-09 13:16:27', 2, NULL, NULL),
(20, 2, '700 Oak Street qwr', 'Parkhurst Rd', 'NY', 'Chelmsford', '12208', 1, NULL, NULL, NULL, NULL, NULL, '2019-08-03 11:58:31', 2, '2019-08-03 15:58:31', NULL, '2019-08-03 15:58:31', 2),
(21, 13, 'FORUM HEALTH  ILLINOIS', '8822 S REDWOOD RD,  STE- CIII', 'ILLINOIS', 'OAK BROOK', '60523', 1, NULL, NULL, NULL, NULL, NULL, '2019-08-09 04:11:22', 13, '2019-08-09 08:11:22', NULL, '2019-08-09 08:11:22', 13),
(23, 13, 'Forum Health Illinois', '8822 S REDWOOD RD, STE CIII', 'UTAH', 'WEST JORDAN', '84107', 1, NULL, NULL, NULL, NULL, NULL, '2019-08-10 06:49:23', 13, '2019-08-10 06:49:23', NULL, NULL, NULL),
(24, 15, '4428 S McColl Rd', 'Not Applicable', 'Texas', 'Edinburg', '78539', 0, '1701 Directors Blvd #110', '#110', 'TX', 'Austin', '78744', '2019-09-19 22:59:21', 15, '2019-09-19 22:59:21', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `password_resets`
--

INSERT INTO `password_resets` (`email`, `token`, `created_at`) VALUES
('rajusagi@gmail.com', '$2y$10$tqjWS1jPATJHuqBbUY0KOeZU.Mv2JGVPR1NqlXk49G0PkT6yaql3W', '2019-05-16 08:20:20'),
('chernandez@howarddiet.com', '$2y$10$J9yd418bu2AYXrXn89GmQ.EJIDESxYQI91tSyY6xjhEa5SAH5ndN.', '2019-07-30 22:57:03');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(30) NOT NULL,
  `category_id` int(5) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `strength` varchar(255) DEFAULT NULL,
  `pellet_size` varchar(255) DEFAULT NULL,
  `sequence` int(30) NOT NULL,
  `created_at` datetime NOT NULL,
  `created_by` bigint(20) NOT NULL,
  `updated_at` datetime NOT NULL,
  `updated_by` bigint(20) DEFAULT NULL,
  `deleted_by` bigint(20) DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `category_id`, `product_name`, `strength`, `pellet_size`, `sequence`, `created_at`, `created_by`, `updated_at`, `updated_by`, `deleted_by`, `deleted_at`) VALUES
(2, 1, 'Estradiol Pellet (Coming soon)', '6 mg', '(3mm)', 1, '2019-05-03 11:55:09', 1, '2019-05-12 15:48:02', NULL, 1, '2019-05-12 15:48:02'),
(3, 1, 'Estradiol Pellet (Coming soon)', '12.5 mg', '(3mm)', 2, '2019-05-03 11:55:09', 1, '2019-05-12 15:48:10', NULL, 1, '2019-05-12 15:48:10'),
(4, 1, 'Estradiol Pellet (Coming soon)', '25 mg', '(3mm)', 3, '2019-05-03 11:55:09', 1, '2019-05-12 15:48:17', NULL, 1, '2019-05-12 15:48:17'),
(5, 1, 'Progesterone Pellet (Coming soon)', '50 mg', '(3mm)', 4, '2019-05-03 11:55:09', 1, '2019-05-12 15:48:22', NULL, 1, '2019-05-12 15:48:22'),
(6, 1, 'Testosterone (Coming soon)', '25 mg', '(3mm)', 5, '2019-05-03 11:55:09', 1, '2019-05-12 15:48:26', NULL, 1, '2019-05-12 15:48:26'),
(7, 1, 'Testosterone (Coming soon)', '50 mg', '(3mm)', 6, '2019-05-03 11:55:09', 1, '2019-05-12 15:48:33', NULL, 1, '2019-05-12 15:48:33'),
(8, 1, 'Testosterone Pellet (Coming soon)', '100 mg', 'Each (3mm)', 2, '2019-05-03 11:55:09', 1, '2019-07-22 06:05:16', 1, NULL, NULL),
(9, 1, 'Testosterone Pellet (Coming soon)', '200 mg', 'Each (4.5mm)', 3, '2019-05-03 11:55:09', 1, '2019-07-22 06:05:16', 1, NULL, NULL),
(10, 1, 'Testosterone / Anastrozole Pellet (Coming soon)', '75 mg / 4 mg', '(3mm)', 9, '2019-05-03 11:55:09', 1, '2019-05-12 15:48:39', NULL, 1, '2019-05-12 15:48:39'),
(11, 1, 'Testosterone / Anastrozole Pellet (Coming soon)', '100 mg / 4 mg', '(3mm)', 10, '2019-05-03 11:55:09', 1, '2019-05-12 15:48:46', NULL, 1, '2019-05-12 15:48:46'),
(12, 1, 'Testosterone / Anastrozole Pellet (Coming soon)', '200 mg / 20 mg', '(4.5mm)', 11, '2019-05-03 11:55:09', 1, '2019-05-12 15:48:52', NULL, 1, '2019-05-12 15:48:52'),
(13, 1, 'Nandrolone Decanoate', '200 mg/mL', '5 mL MDV', 1, '2019-05-03 11:55:09', 1, '2019-07-22 06:05:16', 1, NULL, NULL),
(14, 1, 'Testosterone Cypionate in Grapeseed Oil', '200 mg / mL', '5 mL MDV', 4, '2019-05-03 11:55:09', 1, '2019-07-24 03:42:59', 1, NULL, NULL),
(15, 1, 'Testosterone Cypionate in Grapeseed Oil', '200 mg / mL', '30 mL MDV', 5, '2019-05-03 11:55:09', 1, '2019-07-22 06:05:16', 1, NULL, NULL),
(16, 1, 'Testosterone  Cypionate / Propionate', '200 mg / 50mg / mL', '30 mL MDV', 6, '2019-05-03 11:55:09', 1, '2019-07-22 06:05:16', 1, NULL, NULL),
(17, 1, 'Testosterone Propionate in Grapeseed Oil', '100 mg / mL', '10 mL', 15, '2019-05-03 11:55:09', 1, '2019-06-04 16:37:40', NULL, 1, '2019-06-04 16:37:40'),
(18, 2, 'Ascorbic Acid', '500 mg/mL', '50 mL MDV', 12, '2019-05-03 12:20:08', 1, '2019-07-22 06:05:44', NULL, NULL, NULL),
(19, 2, 'B-Complex (B1/B2/B3/B5/B6)', '100/2/100/2/2 mg/mL', '30 mL MDV', 13, '2019-05-03 12:20:08', 1, '2019-07-22 06:05:47', NULL, NULL, NULL),
(20, 2, 'Dexpanthenol', '250 mg/mL', '30 mL MDV', 14, '2019-05-03 12:20:08', 1, '2019-07-22 06:05:55', NULL, NULL, NULL),
(21, 2, 'Glutathione', '200 mg/mL', '30 mL MDV', 17, '2019-05-03 12:20:08', 1, '2019-07-22 06:06:09', NULL, NULL, NULL),
(22, 2, 'L-Arginine HCl', '200 mg/mL', '30 mL MDV', 18, '2019-05-03 12:20:08', 1, '2019-07-22 06:06:13', 1, NULL, NULL),
(23, 2, 'L-Carnitine (Coming soon)', '250 mg/mL', '30 mL MDV', 23, '2019-05-03 12:20:08', 1, '2019-06-04 16:46:43', NULL, 1, '2019-06-04 16:46:43'),
(24, 2, 'Methylcobalamin', '1 mg/mL', '30 mL MDV', 19, '2019-05-03 12:20:08', 1, '2019-07-22 06:06:15', NULL, NULL, NULL),
(25, 2, 'Myers Cocktail Ingredients', 'Contact Us', 'Contact Us', 20, '2019-05-03 12:20:08', 1, '2019-07-22 06:06:15', NULL, NULL, NULL),
(26, 2, 'Pyridoxine HCl', '100 mg/mL', '30 mL MDV', 21, '2019-05-03 12:20:08', 1, '2019-07-22 06:06:06', NULL, NULL, NULL),
(27, 2, 'Taurine', '50 mg/mL', '30 mL MDV', 22, '2019-05-03 12:20:08', 1, '2019-07-22 06:06:06', NULL, NULL, NULL),
(28, 2, 'Zinc (Sulfate)', '2.5 mg/mL', '30 mL MDV', 23, '2019-05-03 12:20:08', 1, '2019-07-22 06:06:06', NULL, NULL, NULL),
(29, 3, 'Methionine / Inositol / Choline (MIC)', '25 / 50 / 50 mg / mL', '30 mL MDV', 24, '2019-05-03 12:20:08', 1, '2019-07-24 03:43:46', 1, NULL, NULL),
(30, 4, 'Benzocaine / Lidocaine / Tetracaine Cream with DMSO', '20% / 10% / 6%', '30 g Jar', 34, '2019-05-03 12:20:08', 1, '2019-07-22 06:05:16', NULL, NULL, NULL),
(31, 4, 'Lidocaine / Tetracaine Ointment (Plasticized)', '23% / 7%', '75 g Jar', 35, '2019-05-03 12:20:08', 1, '2019-07-22 06:05:16', 1, NULL, NULL),
(32, 4, 'Tetracaine Gel', '6%', '10 mL Syringe', 36, '2019-05-03 12:20:08', 1, '2019-07-22 06:05:16', NULL, NULL, NULL),
(33, 4, 'Tretinoin Solution', '0.30%', '60 mL Dropper', 37, '2019-05-03 12:20:09', 1, '2019-07-22 06:05:16', NULL, NULL, NULL),
(34, 4, 'Cantharidin', '0.70%', '10 mL Dropper', 49, '2019-05-03 12:20:09', 1, '2019-07-12 19:44:10', NULL, 1, '2019-07-12 19:44:10'),
(35, 5, 'GHRP2/GHRP6/Sermorelin Acetate (LYO) (Coming soon)', '3 / 3 / 3  mg', 'Each', 29, '2019-05-03 12:20:09', 1, '2019-06-04 16:47:37', NULL, 1, '2019-06-04 16:47:37'),
(36, 5, 'GHRP2/GHRP6/Sermorelin Acetate (LYO) (Coming soon)', '15 / 3 / 6 mg', 'Each', 30, '2019-05-03 12:20:09', 1, '2019-06-04 16:47:47', NULL, 1, '2019-06-04 16:47:47'),
(37, 5, 'GHRP2/GHRP6/Sermorelin Acetate (LYO) (Coming soon)', '20 / 6 / 15 mg', 'Each', 31, '2019-05-03 12:20:09', 1, '2019-06-04 17:03:06', NULL, 1, '2019-06-04 17:03:06'),
(38, 5, 'GHRP2/Sermorelin Acetate (LYO) (Coming soon)', '1.8 / 3 mg', 'Each', 32, '2019-05-03 12:20:09', 1, '2019-06-04 17:03:15', NULL, 1, '2019-06-04 17:03:15'),
(39, 5, 'GHRP2/Sermorelin Acetate (LYO) (Coming soon)', '3 / 3 mg', 'Each', 33, '2019-05-03 12:20:09', 1, '2019-06-04 17:03:25', NULL, 1, '2019-06-04 17:03:25'),
(40, 5, 'GHRP2/Sermorelin Acetate (LYO) (Coming soon', '4.5 / 4.5 mg', 'Each', 34, '2019-05-03 12:20:09', 1, '2019-06-04 17:03:33', NULL, 1, '2019-06-04 17:03:33'),
(41, 5, 'GHRP2/Sermorelin Acetate (LYO) (Coming soon)', '15 / 9 mg', 'Each', 35, '2019-05-03 12:20:09', 1, '2019-06-04 17:03:47', NULL, 1, '2019-06-04 17:03:47'),
(42, 5, 'HCG (Lyo)  (Coming soon)', '3000 IU', 'Each', 36, '2019-05-03 12:20:09', 1, '2019-07-10 22:48:44', NULL, 1, '2019-07-10 22:48:44'),
(43, 5, 'HCG (Lyo)  (Coming soon)', '5000 IU', 'Vial', 27, '2019-05-03 12:20:09', 1, '2019-07-22 06:05:16', 1, NULL, NULL),
(44, 5, 'HCG (Lyo)  (Coming soon)', '11000 IU', 'Vial', 28, '2019-05-03 12:20:09', 1, '2019-07-22 06:05:16', 1, NULL, NULL),
(45, 5, 'HCG (Lyo)  (Coming soon)', '50000 IU', 'Each', 39, '2019-05-03 12:20:09', 1, '2019-07-10 22:49:12', NULL, 1, '2019-07-10 22:49:12'),
(46, 5, 'Ipamorelin Acetate  (Coming soon)', '9 mg', 'Per Kit', 29, '2019-05-03 12:20:09', 1, '2019-07-22 06:05:16', NULL, NULL, NULL),
(47, 5, 'Ipamorelin Acetate  (Coming soon)', '15 mg', '10 mL', 30, '2019-05-03 12:20:09', 1, '2019-07-22 06:05:16', 1, NULL, NULL),
(48, 5, 'Sermorelin Acetate  (Coming soon)', '6 mg', 'Per Kit', 31, '2019-05-03 12:20:09', 1, '2019-07-22 06:05:16', NULL, NULL, NULL),
(49, 5, 'Sermorelin Acetate  (Coming soon)', '9 mg', 'Per Kit', 32, '2019-05-03 12:20:09', 1, '2019-07-22 06:05:16', NULL, NULL, NULL),
(50, 5, 'Sermorelin Acetate  (Coming soon)', '15 mg', 'Per Kit', 33, '2019-05-03 12:20:09', 1, '2019-07-22 06:05:16', NULL, NULL, NULL),
(51, 6, 'Bacteriostatic Sodium Chloride', '0.90%', '30 mL MDV', 38, '2019-05-03 12:20:09', 1, '2019-07-22 06:05:16', NULL, NULL, NULL),
(52, 6, 'Bacteriostatic Water for Injection', 'N/A', '30 mL  MDV', 39, '2019-05-03 12:20:09', 1, '2019-07-22 06:05:16', NULL, NULL, NULL),
(53, 6, 'Bupivacaine', '0.25%', '50 mL MDV', 40, '2019-05-03 12:20:09', 1, '2019-07-22 06:05:16', NULL, NULL, NULL),
(54, 6, 'Calcium Gluconate', '10%', 'Variable SDV', 41, '2019-05-03 12:20:09', 1, '2019-07-22 06:05:16', NULL, NULL, NULL),
(55, 6, 'Folic Acid', '5 mg/mL', '10 mL MDV', 42, '2019-05-03 12:20:09', 1, '2019-07-22 06:05:16', 1, NULL, NULL),
(56, 6, 'FreAmine III', '10%', '1 Liter IV Bag', 43, '2019-05-03 12:20:09', 1, '2019-07-22 06:05:16', NULL, NULL, NULL),
(57, 6, 'Ketamine Inj', '50 mg/mL', '10 mL', 44, '2019-05-03 12:20:09', 1, '2019-07-22 06:05:16', NULL, NULL, NULL),
(58, 6, 'Ketamine Inj', '100 mg/mL', '5 mL', 45, '2019-05-03 12:20:09', 1, '2019-07-22 06:05:16', NULL, NULL, NULL),
(59, 6, 'Ketorolac Tromethamine', '30 mg/mL', 'Variable SDV', 46, '2019-05-03 12:20:09', 1, '2019-07-22 06:05:16', 1, NULL, NULL),
(60, 6, 'Lactated Ringers', 'N/A', 'Variable', 47, '2019-05-03 12:20:09', 1, '2019-07-22 06:05:16', NULL, NULL, NULL),
(61, 6, 'Lidocaine HCl', '1%', 'Variable MDV', 48, '2019-05-03 12:20:09', 1, '2019-07-22 06:05:16', NULL, NULL, NULL),
(62, 6, 'Lidocaine HCl', '2%', 'Variable MDV', 49, '2019-05-03 12:20:09', 1, '2019-07-22 06:05:16', NULL, NULL, NULL),
(63, 6, 'Lidocaine HCl / Epinephrine', '1% / 1:100,000', '50 mL Variable', 50, '2019-05-03 12:20:09', 1, '2019-07-24 03:44:28', 1, NULL, NULL),
(64, 6, 'Lidocaine HCl / Epinephrine', '2% / 1:100,000', '50 mL Variable', 51, '2019-05-03 12:20:09', 1, '2019-07-24 03:44:45', 1, NULL, NULL),
(65, 6, 'Magnesium Chloride', '200 mg/mL', '50 mL MDV', 52, '2019-05-03 12:20:09', 1, '2019-07-22 06:05:16', NULL, NULL, NULL),
(66, 6, 'Multitrace-5', 'N/A', '10 mL MDV', 53, '2019-05-03 12:20:09', 1, '2019-07-22 06:05:16', NULL, NULL, NULL),
(67, 6, 'Ondansetron', '2 mg/mL', '20 mL MDV', 54, '2019-05-03 12:20:09', 1, '2019-07-22 06:05:16', NULL, NULL, NULL),
(68, 6, 'Selenium', '40 mcg/mL', '10 mL SDV', 55, '2019-05-03 12:20:09', 1, '2019-07-22 06:05:16', 1, NULL, NULL),
(69, 6, 'Sodium Bicarbonate Injection', '8.40%', 'Variable', 56, '2019-05-03 12:20:09', 1, '2019-07-22 06:05:16', 1, NULL, NULL),
(70, 6, 'Sodium Chloride Injection', '0.90%', 'Variable', 57, '2019-05-03 12:20:09', 1, '2019-07-22 06:05:16', NULL, NULL, NULL),
(71, 6, 'Sterile Water for Injection', 'N/A', 'Variable', 58, '2019-05-03 12:20:09', 1, '2019-07-22 06:05:16', NULL, NULL, NULL),
(72, 6, 'Testosterone Cypionate in CottonSeed Oil', '200 mg/ ml', '10mL  MDV', 59, '2019-05-03 12:20:09', 1, '2019-07-22 06:05:16', 1, NULL, NULL),
(73, 6, 'Zinc (Chloride)', '1 mg/mL', '10mL SDV', 60, '2019-05-03 12:20:09', 1, '2019-07-22 06:05:16', 1, NULL, NULL),
(74, 7, 'Naloxone Oral Solution', '1 mg/mL', '2 mL Syringe', 61, '2019-05-03 12:20:09', 1, '2019-07-22 06:05:16', 1, NULL, NULL),
(75, 7, 'Phenol', '6%', '10 mL Syringe', 62, '2019-05-03 12:20:09', 1, '2019-07-24 03:45:10', 1, NULL, NULL),
(76, 7, 'Oxytocin Nasal Spray', '50 IU/mL', '10 mL', 75, '2019-05-03 12:20:09', 1, '2019-07-12 19:56:43', NULL, 1, '2019-07-12 19:56:43'),
(77, 7, 'Ketamine Nasal Spray', '100 mg/mL', '10 mL', 76, '2019-05-03 12:20:09', 1, '2019-07-12 19:56:53', NULL, 1, '2019-07-12 19:56:53'),
(78, 7, 'Syringes / Needles', '', '', 63, '2019-05-03 12:20:09', 1, '2019-07-22 06:05:16', NULL, NULL, NULL),
(79, 7, 'Subcutaneous Use', 'Syringe w/Needle', '29 g x 1/2\" 0.5 mL', 64, '2019-05-03 12:20:09', 1, '2019-07-22 06:05:16', NULL, NULL, NULL),
(80, 7, 'Subcutaneous Use', 'Syringe w/Needle', '29 g  x 1/2\" 1 mL', 65, '2019-05-03 12:20:09', 1, '2019-07-22 06:05:16', NULL, NULL, NULL),
(81, 7, 'Subcutaneous Use', 'Syringe w/Needle', '30 g x 1/2\" 1 mL', 66, '2019-05-03 12:20:09', 1, '2019-07-22 06:05:16', NULL, NULL, NULL),
(82, 7, 'Insulin Syringes', 'Syringe w/Needle', '30 g x 5/16\" 0.5 mL', 67, '2019-05-03 12:20:09', 1, '2019-07-22 06:05:16', NULL, NULL, NULL),
(83, 7, 'Insulin Syringes', 'Syringe w/Needle', '30 g x 5/16\" 0.3 mL', 68, '2019-05-03 12:20:09', 1, '2019-07-22 06:05:16', NULL, NULL, NULL),
(84, 7, 'Insulin Syringes', 'Syringe w/Needle', '30 g x 5/16\" 1 mL', 69, '2019-05-03 12:20:09', 1, '2019-07-22 06:05:16', NULL, NULL, NULL),
(85, 7, 'Insulin Syringes', 'Syringe w/Needle', '31 g x 5/16\" 0.5 mL', 70, '2019-05-03 12:20:09', 1, '2019-07-22 06:05:16', NULL, NULL, NULL),
(86, 7, 'Insulin Syringes', 'Syringe w/Needle', '31 g x 5/16\" 1 mL', 71, '2019-05-03 12:20:09', 1, '2019-07-22 06:05:16', NULL, NULL, NULL),
(87, 7, 'Intramuscular Syringes', 'Syringe w/Needle', '18 g x 1.5\" 3 mL', 72, '2019-05-03 12:20:09', 1, '2019-07-22 06:05:16', NULL, NULL, NULL),
(88, 7, 'Intramuscular Syringes', 'Syringe w/Needle', '20 g x 1\" 3 mL', 73, '2019-05-03 12:20:09', 1, '2019-07-22 06:05:16', NULL, NULL, NULL),
(89, 7, 'Intramuscular Syringes', 'Syringe w/Needle', '20 g x 1.5\" 3 mL', 74, '2019-05-03 12:20:09', 1, '2019-07-22 06:05:16', NULL, NULL, NULL),
(90, 7, 'Intramuscular Syringes', 'Syringe w/Needle', '21 g x 1\" 3 mL', 75, '2019-05-03 12:20:09', 1, '2019-07-22 06:05:16', NULL, NULL, NULL),
(91, 7, 'Needles', 'Needle', '18 g x 1\"', 76, '2019-05-03 12:20:09', 1, '2019-07-22 06:05:16', NULL, NULL, NULL),
(92, 7, 'Needles', 'Needle', '20 g x 1\"', 77, '2019-05-03 12:20:09', 1, '2019-07-22 06:05:16', NULL, NULL, NULL),
(93, 7, 'Needles', 'Needle', '21 g x 1\"', 78, '2019-05-03 12:20:09', 1, '2019-07-22 06:05:16', NULL, NULL, NULL),
(94, 7, 'Needles', 'Needle', '22 g x 1\"', 79, '2019-05-03 12:20:09', 1, '2019-07-22 06:05:16', NULL, NULL, NULL),
(95, 7, 'Needles', 'Needle', '23 g x 1\"', 80, '2019-05-03 12:20:09', 1, '2019-07-22 06:05:16', NULL, NULL, NULL),
(96, 7, 'Needles', 'Needle', '25 g x 1\"', 81, '2019-05-03 12:20:09', 1, '2019-07-22 06:05:16', NULL, NULL, NULL),
(97, 7, 'Needles', 'Needle', '27 g x 0.5\"', 82, '2019-05-03 12:20:09', 1, '2019-07-22 06:05:16', NULL, NULL, NULL),
(98, 7, 'Alcohol Prep Pads', '100 Box Count', 'Prep Pads', 83, '2019-05-03 12:20:09', 1, '2019-07-22 06:05:16', NULL, NULL, NULL),
(99, 7, 'IWANTITALL', NULL, '100ML', 98, '2019-05-12 16:07:34', 1, '2019-05-12 16:08:14', NULL, 1, '2019-05-12 16:08:14'),
(100, 1, 'Tadalafil', '75 mg', 'Each', 98, '2019-06-04 16:59:06', 1, '2019-07-10 23:07:42', NULL, 1, '2019-07-10 23:07:42'),
(101, 1, 'Sildenafil', '110 mg', 'Each', 99, '2019-06-04 16:59:30', 1, '2019-07-10 23:07:15', NULL, 1, '2019-07-10 23:07:15'),
(102, 1, 'Sildenafil', NULL, 'Each', 100, '2019-06-04 17:00:01', 1, '2019-07-10 23:07:32', NULL, 1, '2019-07-10 23:07:32'),
(103, 1, 'Tadalafil Troche', '25 mg', 'Each', 7, '2019-07-10 22:50:39', 1, '2019-07-22 06:05:16', 1, NULL, NULL),
(104, 1, 'Tadalafil Troche', '75 mg', 'Each', 8, '2019-07-10 22:51:08', 1, '2019-07-22 06:05:16', 1, NULL, NULL),
(105, 1, 'Tadalafil Troche', '80 mg', 'Each', 9, '2019-07-10 22:51:43', 1, '2019-07-22 06:05:16', 1, NULL, NULL),
(106, 1, 'Sildenafil Troche', '100 mg', 'Each', 10, '2019-07-10 22:52:12', 1, '2019-07-22 06:05:16', 1, NULL, NULL),
(107, 1, 'Sildenafil Troche', '150 mg', 'Each', 11, '2019-07-10 22:52:48', 1, '2019-07-22 06:05:16', 1, NULL, NULL),
(108, 2, 'Edetate Calcium Disodium', '300 mg/mL', '30 mL MDV', 15, '2019-07-10 22:59:45', 1, '2019-07-22 06:06:02', 1, NULL, NULL),
(109, 2, 'Edetate Calcium Disodium (PF)', '300 mg/mL', '10 mL SDV', 16, '2019-07-10 23:03:54', 1, '2019-07-22 06:06:06', 1, NULL, NULL),
(110, 9, 'Ketamine', '50 mg/mL', '50 mL MDV', 26, '2019-07-10 23:09:27', 1, '2019-07-22 06:05:16', 1, NULL, NULL),
(111, 3, 'Lipo - B (Methionine/Inositol/Choline/ Cy-B12)', '25/50/50/1 mg/mL', '30 mL MDV', 25, '2019-07-10 23:11:31', 1, '2019-07-24 03:45:48', 1, NULL, NULL),
(112, 2, 'Biotin', '10 mg/mL', '30 mL MDV', 84, '2019-07-24 03:48:36', 1, '2019-07-24 03:48:36', NULL, NULL, NULL),
(114, 7, 'LACTATED RINGERS SOLUTION', NULL, '1000 mL ( 12 per case)', 85, '2019-08-26 14:49:06', 1, '2019-08-26 15:15:27', 1, NULL, NULL),
(115, 7, 'LACTATED RINGERS SOLUTION', NULL, '500mL (24 per case)', 86, '2019-08-26 15:14:19', 1, '2019-08-26 15:16:11', 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_type` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'admin',
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `company_name` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_by` bigint(20) DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `user_type`, `name`, `username`, `company_name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `deleted_by`, `deleted_at`) VALUES
(1, 'admin', 'Admin', 'aspcares_admin', NULL, NULL, NULL, '$2y$10$5TiSYxnYgOI3FfVrpF6k6uUtBNWDSFLdDHrzenoYsFBTRwhKAOgeC', NULL, '2019-04-26 06:41:39', '2019-04-26 06:41:39', NULL, NULL),
(2, 'company', 'GWS', NULL, 'GWS Pvt. Ltd.', 'laravel@gmicro.us', NULL, '$2y$10$0todE0dNO0pNXrUXTATmSuonJVUEQK7AMrzS6oKwu7i5bU/nsUfmi', 'GLmFlcVwQkWMHdEFRQmAptxy2rvyksFHjdZBWVpOTkCjJ2jkLzv4n7QQUt8V', '2019-04-29 03:13:15', '2019-07-15 01:42:20', 1, NULL),
(3, 'company', 'JANA / JORDAN', NULL, 'IVITAMIN', 'jgavin@ivitaminatx.com', NULL, '$2y$10$PkF2NWjD0x0an7XWRgZWVOdeG2KcT8CDIbbdbxDh.1nVDaVLRnsaC', 'ixXHufvbGFlAkMXc9HPAKTHpq884T7mfn9wGjLbTdlWLz587bfFMhhG9HNwt', '2019-05-10 07:35:09', '2019-07-15 01:42:33', 1, '2019-07-15 01:42:33'),
(4, 'company', 'CALISTA HERNANDEZ', NULL, 'THE HOWARD CENTER', 'chernandez@howarddiet.com', NULL, '$2y$10$EZYjmu6WGVaksCDixpxiKeKTZuXcIYBsDS6YUKnItqco5Df.Cv2zW', NULL, '2019-07-15 01:46:06', '2019-07-15 01:53:22', NULL, NULL),
(5, 'company', 'kalpesh', NULL, 'GWS', 'kalpesh@ibridgedigital.com', NULL, '$2y$10$pul0cwOUKYO6i6gsW9Rkfej0MwkYGpGUVz7dfns.JdIXhN5wUoxjC', NULL, '2019-07-15 18:52:34', '2019-07-16 09:00:19', NULL, NULL),
(6, 'company', 'AARON DAVIS', NULL, 'EVEREST MENS HEALTH', 'AARON@EVERESTMENSHEALTH.COM', NULL, '$2y$10$9tNjCrr1tTLT/t2UBOTACu8Q.BO4kwM5BShzdei.UnqLOHVrBWNI.', NULL, '2019-07-25 01:05:27', '2019-07-25 01:05:39', NULL, NULL),
(7, 'company', 'Jerry', NULL, 'INTIVA HEALTH', 'jerry@intivahealth.com', NULL, '$2y$10$Pe/yggYTk.xa9m1Q5f.ZcuImo6nNxTJY/yZoUy8pe0JDusGsILsGu', NULL, '2019-07-26 23:28:07', '2019-09-19 22:38:08', 1, '2019-09-19 22:38:08'),
(8, 'company', 'Tak upshur', NULL, 'ASPCARES', 'tupshur@aspcares.com', NULL, '$2y$10$8gRS2XjtXXVEeV/JEbTD5O5w9E3QAIQxopRY11OMNiYrGJdoYqeNe', NULL, '2019-07-27 23:21:17', '2019-07-27 23:21:17', NULL, NULL),
(9, 'company', 'AMERICAN MALE WELLNESS', NULL, 'AMERICAN MALE WELLNESS', 'fernando@americanmalewellness.com', NULL, '$2y$10$be165JNxFkPsbBgI2ZE6l.LduJEjgCe2kmc2FrCXNQSOtuZIGo1uC', NULL, '2019-07-27 23:41:44', '2019-07-27 23:41:44', NULL, NULL),
(10, 'company', 'Lindsay Gambit- Sunset Rd', NULL, 'INFUSION CENTERS (VEGAS VALLEY)', 'lgambit@vegasvalleyinfusion.com', NULL, '$2y$10$vA1/7lZOkhOIXTbIbqUiAuojl4FmcezoYXjB3GPEuHP8/UMUZ2UTe', NULL, '2019-07-27 23:43:17', '2019-07-27 23:56:05', NULL, NULL),
(11, 'company', 'LV HOLISTIC HEALTH', NULL, 'LV HOLISTIC HEALTH', 'lvholistichealth@gmail.com', NULL, '$2y$10$QeEYRnElWrC0S0uTcI.rP./hGhv4m9OOHwKgNBUGwBr93FgibCCH2', NULL, '2019-07-27 23:44:46', '2019-09-10 02:27:54', NULL, NULL),
(12, 'company', 'INFUZE WELLNESS CENTER', NULL, 'INFUZE WELLNESS CENTER', 'jaime@infuzelv.com', NULL, '$2y$10$cgP.Kav5GIZz3pNR8Zj5HeHaigezKeJrVP.gPU.xqiQi.vJLqeTMu', NULL, '2019-07-31 01:50:48', '2019-07-31 01:50:48', NULL, NULL),
(13, 'company', 'EURI MORENO', NULL, 'FORUM HEALTH OAKBROOK (ILLINOIS)', 'euri@forumhealth.com', NULL, '$2y$10$Qg8WFu3VYSU7WHe.eiKPwOn1G1a3xNKc7qRAyetpWOhjQURDjOwTO', NULL, '2019-08-08 02:16:15', '2019-08-08 02:16:15', NULL, NULL),
(14, 'company', 'THRIVE SOLUTION MD', NULL, 'THRIVE SOLUTIONS MD', 'thrivesolutionsmd@gmail.com', NULL, '$2y$10$uK5jYUP0bmkiIn5TS0cs.O.CmoG2Vczl5fVBGROQSFYXSZMdPeSQS', NULL, '2019-08-26 18:49:55', '2019-08-26 18:49:55', NULL, NULL),
(15, 'company', 'JERRY', NULL, 'INTIVA HEALTH', 'JERRY@NOVAVITACARE.COM', NULL, '$2y$10$cb21UxF/BIBODxYHUu8VbuWHhbXXq3e84ElounmJNcZqmKLa22/ay', NULL, '2019-09-19 22:43:21', '2019-09-19 22:44:20', NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `company_products`
--
ALTER TABLE `company_products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `company_id` (`company_id`);

--
-- Indexes for table `locations`
--
ALTER TABLE `locations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `company_products`
--
ALTER TABLE `company_products`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=108;

--
-- AUTO_INCREMENT for table `locations`
--
ALTER TABLE `locations`
  MODIFY `id` int(80) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=116;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `company_products`
--
ALTER TABLE `company_products`
  ADD CONSTRAINT `company_products_ibfk_1` FOREIGN KEY (`company_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
