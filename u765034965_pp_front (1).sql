-- phpMyAdmin SQL Dump
-- version 5.2.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Aug 05, 2025 at 05:33 AM
-- Server version: 10.11.10-MariaDB-log
-- PHP Version: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `u765034965_pp_front`
--

-- --------------------------------------------------------

--
-- Table structure for table `accesslog`
--

CREATE TABLE `accesslog` (
  `sl_no` bigint(20) NOT NULL,
  `action_page` varchar(50) DEFAULT NULL,
  `action_done` text DEFAULT NULL,
  `remarks` text NOT NULL,
  `user_name` varchar(50) DEFAULT NULL,
  `entry_date` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

--
-- Dumping data for table `accesslog`
--

INSERT INTO `accesslog` (`sl_no`, `action_page`, `action_done`, `remarks`, `user_name`, `entry_date`) VALUES
(1, 'Add Category', 'Insert Data', 'Category is Created', 'John Doe', '2025-01-23 16:50:07'),
(2, 'Category List', 'Update Data', 'Category Updated', 'John Doe', '2025-01-23 16:59:40'),
(3, 'Category List', 'Update Data', 'Category Updated', 'John Doe', '2025-01-24 12:08:01'),
(4, 'Category List', 'Update Data', 'Category Updated', 'John Doe', '2025-01-24 12:14:07'),
(5, 'Category List', 'Update Data', 'Category Updated', 'John Doe', '2025-01-24 12:14:10'),
(6, 'Category List', 'Update Data', 'Category Updated', 'John Doe', '2025-01-24 12:15:24'),
(7, 'Category List', 'Update Data', 'Category Updated', 'John Doe', '2025-01-24 12:15:30'),
(8, 'Category List', 'Update Data', 'Category Updated', 'John Doe', '2025-01-24 12:15:37'),
(9, 'Category List', 'Update Data', 'Category Updated', 'John Doe', '2025-01-24 12:15:44'),
(10, 'Category List', 'Update Data', 'Category Updated', 'John Doe', '2025-01-24 12:16:13'),
(11, 'Category List', 'Update Data', 'Category Updated', 'John Doe', '2025-01-24 12:16:21'),
(12, 'Category List', 'Update Data', 'Category Updated', 'John Doe', '2025-01-24 12:16:38'),
(13, 'Category List', 'Update Data', 'Category Updated', 'John Doe', '2025-01-24 12:16:45'),
(14, 'Category List', 'Update Data', 'Category Updated', 'John Doe', '2025-01-24 12:16:54'),
(15, 'Category List', 'Update Data', 'Category Updated', 'John Doe', '2025-01-24 12:17:03'),
(16, 'Category List', 'Update Data', 'Category Updated', 'John Doe', '2025-01-24 12:17:15'),
(17, 'Category List', 'Update Data', 'Category Updated', 'John Doe', '2025-01-24 12:17:24'),
(18, 'Category List', 'Update Data', 'Category Updated', 'John Doe', '2025-01-24 12:18:43'),
(19, 'Category List', 'Update Data', 'Category Updated', 'John Doe', '2025-01-24 12:19:42'),
(20, 'Category List', 'Update Data', 'Category Updated', 'John Doe', '2025-01-24 12:20:29'),
(21, 'Category List', 'Update Data', 'Category Updated', 'John Doe', '2025-01-24 12:21:42'),
(22, 'Category List', 'Update Data', 'Category Updated', 'John Doe', '2025-01-24 12:22:12'),
(23, 'Category List', 'Update Data', 'Category Updated', 'John Doe', '2025-01-24 12:22:36'),
(24, 'Category List', 'Update Data', 'Category Updated', 'John Doe', '2025-01-24 12:23:24'),
(25, 'Category List', 'Update Data', 'Category Updated', 'John Doe', '2025-01-24 12:24:08'),
(26, 'Category List', 'Update Data', 'Category Updated', 'John Doe', '2025-01-24 12:24:12'),
(27, 'Category List', 'Update Data', 'Category Updated', 'John Doe', '2025-01-24 12:24:35'),
(28, 'Category List', 'Update Data', 'Category Updated', 'John Doe', '2025-01-24 12:24:58'),
(29, 'Category List', 'Update Data', 'Category Updated', 'John Doe', '2025-01-24 12:25:21'),
(30, 'Category List', 'Update Data', 'Category Updated', 'John Doe', '2025-01-24 12:26:39'),
(31, 'Category List', 'Update Data', 'Category Updated', 'John Doe', '2025-01-24 12:26:46'),
(32, 'Category List', 'Update Data', 'Category Updated', 'John Doe', '2025-01-24 12:27:32'),
(33, 'Category List', 'Update Data', 'Category Updated', 'John Doe', '2025-01-24 12:28:00'),
(34, 'Category List', 'Update Data', 'Category Updated', 'John Doe', '2025-01-24 12:28:14'),
(35, 'Category List', 'Update Data', 'Category Updated', 'John Doe', '2025-01-24 12:28:29'),
(36, 'Category List', 'Update Data', 'Category Updated', 'John Doe', '2025-01-24 12:29:46'),
(37, 'Category List', 'Update Data', 'Category Updated', 'John Doe', '2025-01-24 12:30:28'),
(38, 'Category List', 'Update Data', 'Category Updated', 'John Doe', '2025-01-24 12:30:38'),
(39, 'Category List', 'Update Data', 'Category Updated', 'John Doe', '2025-01-24 12:31:02'),
(40, 'Category List', 'Update Data', 'Category Updated', 'John Doe', '2025-01-24 12:31:24'),
(41, 'Category List', 'Update Data', 'Category Updated', 'John Doe', '2025-01-24 12:31:44'),
(42, 'Category List', 'Update Data', 'Category Updated', 'John Doe', '2025-01-24 12:32:07'),
(43, 'Category List', 'Update Data', 'Category Updated', 'John Doe', '2025-01-24 16:54:27'),
(44, 'Category List', 'Update Data', 'Category Updated', 'John Doe', '2025-01-24 16:55:50'),
(45, 'Category List', 'Update Data', 'Category Updated', 'John Doe', '2025-01-24 16:56:24'),
(46, 'Category List', 'Update Data', 'Category Updated', 'John Doe', '2025-01-24 16:56:45'),
(47, 'Category List', 'Update Data', 'Category Updated', 'John Doe', '2025-01-24 16:57:01'),
(48, 'Category List', 'Update Data', 'Category Updated', 'John Doe', '2025-01-24 16:57:06'),
(49, 'Category List', 'Update Data', 'Category Updated', 'John Doe', '2025-01-24 16:58:13'),
(50, 'Category List', 'Update Data', 'Category Updated', 'John Doe', '2025-01-24 16:58:30'),
(51, 'Category List', 'Update Data', 'Category Updated', 'John Doe', '2025-01-24 16:58:37'),
(52, 'Category List', 'Update Data', 'Category Updated', 'John Doe', '2025-01-24 16:58:53'),
(53, 'Category List', 'Update Data', 'Category Updated', 'John Doe', '2025-01-24 16:59:17'),
(54, 'Category List', 'Update Data', 'Category Updated', 'John Doe', '2025-01-24 17:00:52'),
(55, 'Category List', 'Update Data', 'Category Updated', 'John Doe', '2025-01-24 17:01:26'),
(56, 'Category List', 'Update Data', 'Category Updated', 'John Doe', '2025-01-24 17:01:48'),
(57, 'Category List', 'Update Data', 'Category Updated', 'John Doe', '2025-01-24 17:02:12'),
(58, 'Category List', 'Update Data', 'Category Updated', 'John Doe', '2025-01-24 17:03:04'),
(59, 'Category List', 'Update Data', 'Category Updated', 'John Doe', '2025-01-24 17:03:48'),
(60, 'Category List', 'Update Data', 'Category Updated', 'John Doe', '2025-01-24 17:04:11'),
(61, 'Category List', 'Update Data', 'Category Updated', 'John Doe', '2025-01-24 17:04:28'),
(62, 'Category List', 'Update Data', 'Category Updated', 'John Doe', '2025-01-24 17:05:08'),
(63, 'Category List', 'Update Data', 'Category Updated', 'John Doe', '2025-01-24 17:06:20'),
(64, 'Category List', 'Update Data', 'Category Updated', 'John Doe', '2025-01-24 17:06:40'),
(65, 'Category List', 'Update Data', 'Category Updated', 'John Doe', '2025-01-24 17:06:57'),
(66, 'Category List', 'Update Data', 'Category Updated', 'John Doe', '2025-01-24 17:07:21'),
(67, 'Category List', 'Update Data', 'Category Updated', 'John Doe', '2025-01-24 17:07:41'),
(68, 'Category List', 'Update Data', 'Category Updated', 'John Doe', '2025-01-24 17:07:52'),
(69, 'Category List', 'Update Data', 'Category Updated', 'John Doe', '2025-01-24 17:08:22'),
(70, 'Category List', 'Update Data', 'Category Updated', 'John Doe', '2025-01-24 17:08:50'),
(71, 'Category List', 'Update Data', 'Category Updated', 'John Doe', '2025-01-24 17:09:04'),
(72, 'Category List', 'Update Data', 'Category Updated', 'John Doe', '2025-01-24 17:09:18'),
(73, 'Category List', 'Update Data', 'Category Updated', 'John Doe', '2025-01-24 17:09:32'),
(74, 'Category List', 'Update Data', 'Category Updated', 'John Doe', '2025-01-24 17:09:42'),
(75, 'Category List', 'Update Data', 'Category Updated', 'John Doe', '2025-01-24 17:10:23'),
(76, 'Kitchen List', 'Insert Data', 'New Kitchen Created', 'John Doe', '2025-01-24 17:23:29'),
(77, 'Kitchen List', 'Insert Data', 'New Kitchen Created', 'John Doe', '2025-01-24 17:23:42'),
(78, 'Kitchen List', 'Insert Data', 'New Kitchen Created', 'John Doe', '2025-01-24 17:24:00'),
(79, 'Kitchen List', 'Insert Data', 'New Kitchen Created', 'John Doe', '2025-01-24 17:24:16'),
(80, 'Kitchen List', 'Insert Data', 'New Kitchen Created', 'John Doe', '2025-01-24 17:24:36'),
(81, 'Kitchen List', 'Insert Data', 'New Kitchen Created', 'John Doe', '2025-01-24 17:24:52'),
(82, 'Add Food', 'Insert Data', 'New Food Added', 'John Doe', '2025-01-24 17:28:05'),
(83, 'Varient List', 'Insert Data', 'New Varient Created', 'John Doe', '2025-01-24 17:29:13'),
(84, 'Add New Order', 'Insert Data', 'Item New Order Created', 'John Doe', '2025-01-24 17:30:54'),
(85, 'Order List', 'Insert Data', 'Order is Update', 'John Doe', '2025-01-24 17:31:34'),
(86, 'Add New Order', 'Insert Data', 'Item New Order Created', 'John Doe', '2025-01-24 17:33:09'),
(87, 'Order List', 'Insert Data', 'Order is Update', 'John Doe', '2025-01-24 17:34:49'),
(88, 'Add New Order', 'Insert Data', 'Item New Order Created', 'John Doe', '2025-01-24 18:47:57'),
(89, 'Add Customer', 'Insert Data', 'Customer is Created', 'John Doe', '2025-01-24 18:48:16'),
(90, 'Add New Order', 'Insert Data', 'Item New Order Created', 'John Doe', '2025-01-24 18:49:38'),
(91, 'Order List', 'Insert Data', 'Order is Update', 'John Doe', '2025-01-24 18:49:42'),
(92, 'Order List', 'Insert Data', 'Order is Update', 'John Doe', '2025-01-24 18:49:54'),
(93, 'Supplier List', 'Insert Data', 'New Supplier Created', 'John Doe', '2025-01-27 11:02:03'),
(94, 'Ingredient List', 'Insert Data', 'New Ingredient Created', 'John Doe', '2025-01-27 11:05:09'),
(95, 'Add Purchase', 'Insert Data', 'Item Purchase Created', 'John Doe', '2025-01-27 12:36:51'),
(96, 'Ingredient List', 'Insert Data', 'New Ingredient Created', 'John Doe', '2025-01-27 12:37:45'),
(97, 'Add Purchase', 'Insert Data', 'Item Purchase Created', 'John Doe', '2025-01-27 12:38:20'),
(98, 'set Production Unit', 'Insert Data', 'set Production Unit Created', 'John Doe', '2025-01-27 12:39:22'),
(99, 'Add New Order', 'Insert Data', 'Item New Order Created', 'John Doe', '2025-01-27 12:40:55'),
(100, 'Order List', 'Insert Data', 'Order is Update', 'John Doe', '2025-01-27 12:41:14'),
(101, 'Add Food', 'Insert Data', 'New Food Added', 'John Doe', '2025-01-28 10:47:48'),
(102, 'Varient List', 'Insert Data', 'New Varient Created', 'John Doe', '2025-01-28 10:48:54'),
(103, 'Ingredient List', 'Insert Data', 'New Ingredient Created', 'John Doe', '2025-01-28 10:49:36'),
(104, 'Ingredient List', 'Insert Data', 'New Ingredient Created', 'John Doe', '2025-01-28 10:50:06'),
(105, 'Ingredient List', 'Insert Data', 'New Ingredient Created', 'John Doe', '2025-01-28 10:50:32'),
(106, 'Ingredient List', 'Update Data', 'Ingredient Updated', 'John Doe', '2025-01-28 10:50:48'),
(107, 'Add Purchase', 'Insert Data', 'Item Purchase Created', 'John Doe', '2025-01-28 10:52:49'),
(108, 'set Production Unit', 'Insert Data', 'set Production Unit Created', 'John Doe', '2025-01-28 10:54:11'),
(109, 'Add New Order', 'Insert Data', 'Item New Order Created', 'John Doe', '2025-01-28 11:00:32'),
(110, 'Order List', 'Insert Data', 'Order is Update', 'John Doe', '2025-01-28 11:00:42'),
(111, 'Add New Order', 'Insert Data', 'Item New Order Created', 'John Doe', '2025-01-28 11:12:24'),
(112, 'Add Production', 'Insert Data', 'Add Production Created', 'John Doe', '2025-01-28 13:18:57'),
(113, 'Add Category', 'Insert Data', 'Category is Created', 'John Doe', '2025-01-28 13:28:08'),
(114, 'Add Category', 'Insert Data', 'Category is Created', 'John Doe', '2025-01-28 13:28:28'),
(115, 'Add New Order', 'Insert Data', 'Item New Order Created', 'John Doe', '2025-01-28 15:11:51'),
(116, 'Add New Order', 'Insert Data', 'Item New Order Created', 'John Doe', '2025-01-28 15:14:59'),
(117, 'Add New Order', 'Insert Data', 'Item New Order Created', 'John Doe', '2025-01-28 15:31:14'),
(118, 'Add New Order', 'Insert Data', 'Item New Order Created', 'John Doe', '2025-01-28 15:40:24'),
(119, 'Order List', 'Insert Data', 'Order is Update', 'John Doe', '2025-01-28 15:42:32'),
(120, 'Order List', 'Insert Data', 'Order is Update', 'John Doe', '2025-01-28 15:42:56'),
(121, 'Order List', 'Insert Data', 'Order is Update', 'John Doe', '2025-01-28 15:43:13'),
(122, 'Order List', 'Insert Data', 'Order is Update', 'John Doe', '2025-01-28 15:43:49'),
(123, 'Order List', 'Insert Data', 'Order is Update', 'John Doe', '2025-01-28 15:44:16'),
(124, 'Add New Order', 'Insert Data', 'Item New Order Created', 'John Doe', '2025-01-28 16:00:48'),
(125, 'Order List', 'Insert Data', 'Order is Update', 'John Doe', '2025-01-28 16:01:25'),
(126, 'Order List', 'Insert Data', 'Order is Update', 'John Doe', '2025-01-28 16:01:33'),
(127, 'Order List', 'Insert Data', 'Order is Update', 'John Doe', '2025-01-28 16:01:39'),
(128, 'Order List', 'Insert Data', 'Order is Update', 'John Doe', '2025-01-28 16:01:49'),
(129, 'Add New Order', 'Insert Data', 'Item New Order Created', 'John Doe', '2025-01-28 16:16:55'),
(130, 'Order List', 'Insert Data', 'Order is Update', 'John Doe', '2025-01-28 16:17:32'),
(131, 'Food List', 'Update Data', 'Food Updated', 'John Doe', '2025-01-28 16:23:10'),
(132, 'Add New Order', 'Insert Data', 'Item New Order Created', 'John Doe', '2025-01-28 16:24:21'),
(133, 'Order List', 'Insert Data', 'Order is Update', 'John Doe', '2025-01-28 16:25:04'),
(134, 'Add Food', 'Insert Data', 'New Food Added', 'John Doe', '2025-01-28 17:48:14'),
(135, 'Varient List', 'Insert Data', 'New Varient Created', 'John Doe', '2025-01-28 17:48:52'),
(136, 'set Production Unit', 'Insert Data', 'set Production Unit Created', 'John Doe', '2025-01-28 18:04:42'),
(137, 'Add New Order', 'Insert Data', 'Item New Order Created', 'John Doe', '2025-01-29 10:28:01'),
(138, 'Order List', 'Insert Data', 'Order is Update', 'John Doe', '2025-01-29 10:36:04'),
(139, 'Add Purchase', 'Insert Data', 'Item Purchase Created', 'John Doe', '2025-01-29 10:57:13'),
(140, 'Add Production', 'Insert Data', 'Add Production Created', 'John Doe', '2025-01-29 11:03:48'),
(141, 'Add Food', 'Insert Data', 'New Food Added', 'John Doe', '2025-01-29 11:06:54'),
(142, 'Varient List', 'Insert Data', 'New Varient Created', 'John Doe', '2025-01-29 11:07:11'),
(143, 'Add Food', 'Insert Data', 'New Food Added', 'John Doe', '2025-01-29 11:10:51'),
(144, 'Varient List', 'Insert Data', 'New Varient Created', 'John Doe', '2025-01-29 11:11:19'),
(145, 'set Production Unit', 'Insert Data', 'set Production Unit Created', 'John Doe', '2025-01-29 11:12:10'),
(146, 'Add Production', 'Insert Data', 'Add Production Created', 'John Doe', '2025-01-29 11:16:48'),
(147, 'Add Food', 'Insert Data', 'New Food Added', 'John Doe', '2025-01-29 11:50:30'),
(148, 'Add Food', 'Insert Data', 'New Food Added', 'John Doe', '2025-01-29 11:52:19'),
(149, 'Add New Order', 'Insert Data', 'Item New Order Created', 'John Doe', '2025-01-29 11:56:29'),
(150, 'Add Food', 'Insert Data', 'New Food Added', 'John Doe', '2025-01-29 18:51:41'),
(151, 'Add Food', 'Insert Data', 'New Food Added', 'John Doe', '2025-01-29 18:55:56'),
(152, 'Add Food', 'Insert Data', 'New Food Added', 'John Doe', '2025-01-29 18:56:36'),
(153, 'Varient List', 'Insert Data', 'New Varient Created', 'John Doe', '2025-01-30 15:42:19'),
(154, 'Varient List', 'Update Data', 'Varient Updated', 'John Doe', '2025-01-30 16:04:02'),
(155, 'Currency List', 'Update Data', 'Currency Updated', 'John Doe', '2025-01-30 12:22:37'),
(156, 'Varient List', 'Insert Data', 'New Varient Created', 'John Doe', '2025-01-30 12:25:24'),
(157, 'Food List', 'Update Data', 'Food Updated', 'John Doe', '2025-01-30 12:39:14'),
(158, 'Food List', 'Update Data', 'Food Updated', 'John Doe', '2025-01-30 12:39:26'),
(159, 'Food List', 'Update Data', 'Food Updated', 'John Doe', '2025-01-30 12:40:00'),
(160, 'Food List', 'Update Data', 'Food Updated', 'John Doe', '2025-01-30 12:40:36'),
(161, 'Food List', 'Update Data', 'Food Updated', 'John Doe', '2025-01-30 12:44:22'),
(162, 'Add Food', 'Insert Data', 'New Food Added', 'John Doe', '2025-01-31 06:01:46'),
(163, 'Add New Order', 'Insert Data', 'Item New Order Created', 'John Doe', '2025-01-31 06:17:39'),
(164, 'Order List', 'Insert Data', 'Order is Update', 'John Doe', '2025-01-31 06:46:33'),
(165, 'Add New Order', 'Insert Data', 'Item New Order Created', 'John Doe', '2025-01-31 06:46:59'),
(166, 'Ingredient List', 'Insert Data', 'New Ingredient Created', 'John Doe', '2025-01-31 07:33:58'),
(167, 'Ingredient List', 'Insert Data', 'New Ingredient Created', 'John Doe', '2025-01-31 07:34:11'),
(168, 'Ingredient List', 'Insert Data', 'New Ingredient Created', 'John Doe', '2025-01-31 07:34:32'),
(169, 'Ingredient List', 'Insert Data', 'New Ingredient Created', 'John Doe', '2025-01-31 07:35:00'),
(170, 'Ingredient List', 'Insert Data', 'New Ingredient Created', 'John Doe', '2025-01-31 07:35:34'),
(171, 'Ingredient List', 'Insert Data', 'New Ingredient Created', 'John Doe', '2025-01-31 07:35:50'),
(172, 'Ingredient List', 'Insert Data', 'New Ingredient Created', 'John Doe', '2025-01-31 07:36:14'),
(173, 'Ingredient List', 'Insert Data', 'New Ingredient Created', 'John Doe', '2025-01-31 07:36:35'),
(174, 'Ingredient List', 'Insert Data', 'New Ingredient Created', 'John Doe', '2025-01-31 07:38:18'),
(175, 'Ingredient List', 'Update Data', 'Ingredient Updated', 'John Doe', '2025-01-31 07:38:31'),
(176, 'Ingredient List', 'Insert Data', 'New Ingredient Created', 'John Doe', '2025-01-31 07:39:11'),
(177, 'Add Purchase', 'Insert Data', 'Item Purchase Created', 'John Doe', '2025-01-31 07:42:38'),
(178, 'Add Food', 'Insert Data', 'New Food Added', 'John Doe', '2025-01-31 07:45:14'),
(179, 'Varient List', 'Insert Data', 'New Varient Created', 'John Doe', '2025-01-31 07:46:20'),
(180, 'Varient List', 'Insert Data', 'New Varient Created', 'John Doe', '2025-01-31 07:46:55'),
(181, 'set Production Unit', 'Insert Data', 'set Production Unit Created', 'John Doe', '2025-01-31 07:48:33'),
(182, 'set Production Unit', 'Insert Data', 'set Production Unit Created', 'John Doe', '2025-01-31 07:51:23'),
(183, 'Add New Order', 'Insert Data', 'Item New Order Created', 'John Doe', '2025-01-31 07:52:25'),
(184, 'Add New Order', 'Insert Data', 'Item New Order Created', 'John Doe', '2025-01-31 08:03:40'),
(185, 'Add New Order', 'Insert Data', 'Item New Order Created', 'John Doe', '2025-01-31 08:11:46'),
(186, 'Add New Order', 'Insert Data', 'Item New Order Created', 'John Doe', '2025-01-31 08:31:17'),
(187, 'Add New Order', 'Insert Data', 'Item New Order Created', 'John Doe', '2025-01-31 08:34:39'),
(188, 'Add New Order', 'Insert Data', 'Item New Order Created', 'John Doe', '2025-01-31 09:53:45'),
(189, 'Order List', 'Insert Data', 'Order is Update', 'John Doe', '2025-01-31 09:53:57'),
(190, 'Order List', 'Insert Data', 'Order is Update', 'John Doe', '2025-01-31 09:54:05'),
(191, 'Add Purchase', 'Insert Data', 'Item Purchase Created', 'John Doe', '2025-01-31 09:55:43'),
(192, 'Add Food', 'Insert Data', 'New Food Added', 'John Doe', '2025-01-31 09:58:01'),
(193, 'Varient List', 'Insert Data', 'New Varient Created', 'John Doe', '2025-01-31 09:58:26'),
(194, 'set Production Unit', 'Insert Data', 'set Production Unit Created', 'John Doe', '2025-01-31 09:59:00'),
(195, 'Add Food', 'Insert Data', 'New Food Added', 'John Doe', '2025-01-31 10:03:50'),
(196, 'Add Production', 'Insert Data', 'Add Production Created', 'John Doe', '2025-01-31 10:50:26'),
(197, 'Add Production', 'Insert Data', 'Add Production Created', 'John Doe', '2025-01-31 11:04:37'),
(198, 'Add Production', 'Insert Data', 'Add Production Created', 'John Doe', '2025-01-31 11:23:20'),
(199, 'Add Food', 'Insert Data', 'New Food Added', 'John Doe', '2025-01-31 11:40:21'),
(200, 'Varient List', 'Insert Data', 'New Varient Created', 'John Doe', '2025-01-31 11:40:42'),
(201, 'Ingredient List', 'Insert Data', 'New Ingredient Created', 'John Doe', '2025-01-31 12:05:58'),
(202, 'Ingredient List', 'Insert Data', 'New Ingredient Created', 'John Doe', '2025-01-31 12:06:45'),
(203, 'Ingredient List', 'Insert Data', 'New Ingredient Created', 'John Doe', '2025-01-31 12:07:53'),
(204, 'Ingredient List', 'Insert Data', 'New Ingredient Created', 'John Doe', '2025-01-31 12:08:21'),
(205, 'Ingredient List', 'Insert Data', 'New Ingredient Created', 'John Doe', '2025-01-31 12:08:46'),
(206, 'Ingredient List', 'Insert Data', 'New Ingredient Created', 'John Doe', '2025-01-31 12:09:20'),
(207, 'Add Food', 'Insert Data', 'New Food Added', 'John Doe', '2025-01-31 12:12:05'),
(208, 'Add Purchase', 'Insert Data', 'Item Purchase Created', 'John Doe', '2025-01-31 13:25:25'),
(209, 'Add Food', 'Insert Data', 'New Food Added', 'John Doe', '2025-02-04 06:05:36'),
(210, 'Add Food', 'Insert Data', 'New Food Added', 'John Doe', '2025-02-04 06:06:09'),
(211, 'Varient List', 'Insert Data', 'New Varient Created', 'John Doe', '2025-02-04 06:07:08'),
(212, 'Varient List', 'Insert Data', 'New Varient Created', 'John Doe', '2025-02-04 06:07:27'),
(213, 'set Production Unit', 'Insert Data', 'set Production Unit Created', 'John Doe', '2025-02-04 06:11:01'),
(214, 'Add Production', 'Insert Data', 'Add Production Created', 'John Doe', '2025-02-04 06:12:56'),
(215, 'Category List', 'Update Data', 'Category Updated', 'John Doe', '2025-02-04 08:05:34'),
(216, 'Category List', 'Update Data', 'Category Updated', 'John Doe', '2025-02-04 08:06:05'),
(217, 'Add Food', 'Insert Data', 'New Food Added', 'John Doe', '2025-02-04 08:28:10'),
(218, 'Varient List', 'Insert Data', 'New Varient Created', 'John Doe', '2025-02-04 08:28:55'),
(219, 'Add Production', 'Insert Data', 'Add Production Created', 'John Doe', '2025-02-04 08:29:28'),
(220, 'Add Production', 'Insert Data', 'Add Production Created', 'John Doe', '2025-02-04 11:28:53'),
(221, 'Add Production', 'Insert Data', 'Add Production Created', 'John Doe', '2025-02-04 11:29:31'),
(222, 'Varient List', 'Insert Data', 'New Varient Created', 'John Doe', '2025-02-05 08:14:52'),
(223, 'Add Production', 'Insert Data', 'Add Production Created', 'John Doe', '2025-02-05 08:22:41'),
(224, 'Add Production', 'Insert Data', 'Add Production Created', 'John Doe', '2025-02-05 08:25:23'),
(225, 'Add Production', 'Insert Data', 'Add Production Created', 'John Doe', '2025-02-05 08:25:45'),
(226, 'Add Production', 'Insert Data', 'Add Production Created', 'John Doe', '2025-02-05 08:26:54'),
(227, 'set Production Unit', 'Insert Data', 'set Production Unit Created', 'John Doe', '2025-02-05 08:27:31'),
(228, 'Add Production', 'Insert Data', 'Add Production Created', 'John Doe', '2025-02-05 09:39:43'),
(229, 'Add Production', 'Insert Data', 'Add Production Created', 'John Doe', '2025-02-05 09:40:29'),
(230, 'Add Production', 'Insert Data', 'Add Production Created', 'John Doe', '2025-02-05 09:54:51'),
(231, 'Add Production', 'Insert Data', 'Add Production Created', 'John Doe', '2025-02-05 10:59:19'),
(232, 'Add Production', 'Insert Data', 'Add Production Created', 'John Doe', '2025-02-05 10:59:42'),
(233, 'Add Production', 'Insert Data', 'Add Production Created', 'John Doe', '2025-02-05 11:01:11'),
(234, 'Add Production', 'Insert Data', 'Add Production Created', 'John Doe', '2025-02-05 11:02:20'),
(235, 'Add Production', 'Insert Data', 'Add Production Created', 'John Doe', '2025-02-05 11:02:59'),
(236, 'Add Production', 'Insert Data', 'Add Production Created', 'John Doe', '2025-02-05 12:29:51'),
(237, 'Add Production', 'Insert Data', 'Add Production Created', 'John Doe', '2025-02-05 12:31:35'),
(238, 'Add New Order', 'Insert Data', 'Item New Order Created', 'John Doe', '2025-02-08 08:38:54'),
(239, 'Order List', 'Insert Data', 'Order is Update', 'John Doe', '2025-02-08 08:39:05'),
(240, 'Add Food', 'Insert Data', 'New Food Added', 'John Doe', '2025-02-08 08:41:02'),
(241, 'Varient List', 'Insert Data', 'New Varient Created', 'John Doe', '2025-02-08 08:41:37'),
(242, 'set Production Unit', 'Insert Data', 'set Production Unit Created', 'John Doe', '2025-02-08 08:42:41'),
(243, 'Add Food', 'Insert Data', 'New Food Added', 'John Doe', '2025-02-08 08:43:43'),
(244, 'Add Production', 'Insert Data', 'Add Production Created', 'John Doe', '2025-02-08 08:44:18'),
(245, 'Add New Order', 'Insert Data', 'Item New Order Created', 'John Doe', '2025-02-08 08:44:49'),
(246, 'Order List', 'Insert Data', 'Order is Update', 'John Doe', '2025-02-08 08:45:02'),
(247, 'set Production Unit', 'Insert Data', 'set Production Unit Created', 'John Doe', '2025-02-08 09:04:43'),
(248, 'Add Purchase', 'Insert Data', 'Item Purchase Created', 'John Doe', '2025-02-08 09:31:54'),
(249, 'Add Purchase', 'Insert Data', 'Item Purchase Created', 'John Doe', '2025-02-08 10:03:35'),
(250, 'Add Purchase', 'Insert Data', 'Item Purchase Created', 'John Doe', '2025-02-10 04:55:21'),
(251, 'Add Food', 'Insert Data', 'New Food Added', 'John Doe', '2025-02-10 05:08:11'),
(252, 'Varient List', 'Insert Data', 'New Varient Created', 'John Doe', '2025-02-10 05:08:38'),
(253, 'Ingredient List', 'Insert Data', 'New Ingredient Created', 'John Doe', '2025-02-10 05:09:48'),
(254, 'Ingredient List', 'Insert Data', 'New Ingredient Created', 'John Doe', '2025-02-10 05:10:08'),
(255, 'Ingredient List', 'Insert Data', 'New Ingredient Created', 'John Doe', '2025-02-10 05:10:45'),
(256, 'Ingredient List', 'Insert Data', 'New Ingredient Created', 'John Doe', '2025-02-10 05:11:22'),
(257, 'Ingredient List', 'Insert Data', 'New Ingredient Created', 'John Doe', '2025-02-10 05:11:57'),
(258, 'Ingredient List', 'Insert Data', 'New Ingredient Created', 'John Doe', '2025-02-10 05:12:18'),
(259, 'Ingredient List', 'Insert Data', 'New Ingredient Created', 'John Doe', '2025-02-10 05:13:08'),
(260, 'Add Purchase', 'Insert Data', 'Item Purchase Created', 'John Doe', '2025-02-10 05:26:12'),
(261, 'set Production Unit', 'Insert Data', 'set Production Unit Created', 'John Doe', '2025-02-10 05:27:12'),
(262, 'Add Production', 'Insert Data', 'Add Production Created', 'John Doe', '2025-02-10 05:29:18'),
(263, 'Add New Order', 'Insert Data', 'Item New Order Created', 'John Doe', '2025-02-10 05:29:54'),
(264, 'Order List', 'Insert Data', 'Order is Update', 'John Doe', '2025-02-10 05:30:07'),
(265, 'Add New Order', 'Insert Data', 'Item New Order Created', 'John Doe', '2025-02-10 05:35:41'),
(266, 'Order List', 'Insert Data', 'Order is Update', 'John Doe', '2025-02-10 05:35:54'),
(267, 'Add Food', 'Insert Data', 'New Food Added', 'John Doe', '2025-02-10 05:38:27'),
(268, 'Varient List', 'Insert Data', 'New Varient Created', 'John Doe', '2025-02-10 05:38:48'),
(269, 'Varient List', 'Insert Data', 'New Varient Created', 'John Doe', '2025-02-10 05:39:01'),
(270, 'Varient List', 'Insert Data', 'New Varient Created', 'John Doe', '2025-02-10 05:39:20'),
(271, 'Add Production', 'Insert Data', 'Add Production Created', 'John Doe', '2025-02-10 05:40:16'),
(272, 'Add Production', 'Insert Data', 'Add Production Created', 'John Doe', '2025-02-10 05:40:42'),
(273, 'Add Production', 'Insert Data', 'Add Production Created', 'John Doe', '2025-02-10 05:40:56'),
(274, 'Add New Order', 'Insert Data', 'Item New Order Created', 'John Doe', '2025-02-10 05:42:07'),
(275, 'Order List', 'Insert Data', 'Order is Update', 'John Doe', '2025-02-10 05:42:16'),
(276, 'Add Food', 'Insert Data', 'New Food Added', 'John Doe', '2025-02-10 05:52:59'),
(277, 'Varient List', 'Insert Data', 'New Varient Created', 'John Doe', '2025-02-10 05:53:49'),
(278, 'set Production Unit', 'Insert Data', 'set Production Unit Created', 'John Doe', '2025-02-10 05:55:02'),
(279, 'Add Production', 'Insert Data', 'Add Production Created', 'John Doe', '2025-02-10 06:11:49'),
(280, 'Add Food', 'Insert Data', 'New Food Added', 'John Doe', '2025-02-10 06:13:29'),
(281, 'Varient List', 'Insert Data', 'New Varient Created', 'John Doe', '2025-02-10 06:14:09'),
(282, 'Food List', 'Update Data', 'Food Updated', 'John Doe', '2025-02-10 06:15:28'),
(283, 'set Production Unit', 'Insert Data', 'set Production Unit Created', 'John Doe', '2025-02-10 06:16:06'),
(284, 'Add Production', 'Insert Data', 'Add Production Created', 'John Doe', '2025-02-10 06:16:58'),
(285, 'Add New Order', 'Insert Data', 'Item New Order Created', 'John Doe', '2025-02-10 06:22:38'),
(286, 'Add Food', 'Insert Data', 'New Food Added', 'John Doe', '2025-02-10 06:26:53'),
(287, 'Varient List', 'Insert Data', 'New Varient Created', 'John Doe', '2025-02-10 06:27:19'),
(288, 'Ingredient List', 'Insert Data', 'New Ingredient Created', 'John Doe', '2025-02-10 06:27:48'),
(289, 'Add Purchase', 'Insert Data', 'Item Purchase Created', 'John Doe', '2025-02-10 06:28:19'),
(290, 'set Production Unit', 'Insert Data', 'set Production Unit Created', 'John Doe', '2025-02-10 06:28:54'),
(291, 'Add Purchase', 'Insert Data', 'Item Purchase Created', 'John Doe', '2025-02-10 06:30:49'),
(292, 'Add Production', 'Insert Data', 'Add Production Created', 'John Doe', '2025-02-10 06:31:10'),
(293, 'Add New Order', 'Insert Data', 'Item New Order Created', 'John Doe', '2025-02-10 06:31:53'),
(294, 'Order List', 'Insert Data', 'Order is Update', 'John Doe', '2025-02-10 06:32:02'),
(295, 'Order List', 'Insert Data', 'Order is Update', 'John Doe', '2025-02-10 06:32:08'),
(296, 'Add Food', 'Insert Data', 'New Food Added', 'John Doe', '2025-02-10 08:05:33'),
(297, 'Varient List', 'Insert Data', 'New Varient Created', 'John Doe', '2025-02-10 08:06:07'),
(298, 'set Production Unit', 'Insert Data', 'set Production Unit Created', 'John Doe', '2025-02-10 08:07:29'),
(299, 'Add Production', 'Insert Data', 'Add Production Created', 'John Doe', '2025-02-10 08:08:24'),
(300, 'Add Purchase', 'Insert Data', 'Item Purchase Created', 'John Doe', '2025-02-10 08:10:55'),
(301, 'Add Food', 'Insert Data', 'New Food Added', 'John Doe', '2025-02-10 12:36:31'),
(302, 'Varient List', 'Insert Data', 'New Varient Created', 'John Doe', '2025-02-10 12:37:10'),
(303, 'set Production Unit', 'Insert Data', 'set Production Unit Created', 'John Doe', '2025-02-10 12:37:59'),
(304, 'Ingredient List', 'Insert Data', 'New Ingredient Created', 'John Doe', '2025-02-10 12:38:48'),
(305, 'Add Production', 'Insert Data', 'Add Production Created', 'John Doe', '2025-02-10 12:43:57'),
(306, 'Add New Order', 'Insert Data', 'Item New Order Created', 'John Doe', '2025-02-10 12:44:45'),
(307, 'Order List', 'Insert Data', 'Order is Update', 'John Doe', '2025-02-10 12:45:31'),
(308, 'Add Food', 'Insert Data', 'New Food Added', 'John Doe', '2025-02-10 13:15:05'),
(309, 'Add Production', 'Insert Data', 'Add Production Created', 'John Doe', '2025-02-10 13:16:07'),
(310, 'Add New Order', 'Insert Data', 'Item New Order Created', 'John Doe', '2025-02-10 13:16:33'),
(311, 'Add Purchase', 'Insert Data', 'Item Purchase Created', 'John Doe', '2025-02-11 12:08:37'),
(312, 'Add New Order', 'Insert Data', 'Item New Order Created', 'John Doe', '2025-02-11 12:43:15'),
(313, 'Order List', 'Insert Data', 'Order is Update', 'John Doe', '2025-02-11 12:44:20'),
(314, 'Order List', 'Insert Data', 'Order is Update', 'John Doe', '2025-02-11 12:44:43'),
(315, 'Add Category', 'Insert Data', 'Category is Created', 'John Doe', '2025-02-13 12:49:09'),
(316, 'Add Category', 'Insert Data', 'Category is Created', 'John Doe', '2025-02-13 12:49:55'),
(317, 'Add New Order', 'Insert Data', 'Item New Order Created', 'Di Maria', '2025-02-13 14:14:07'),
(318, 'Pending Order', 'Insert Data', 'Pending Order is Update', 'Di Maria', '2025-02-13 14:15:06'),
(319, 'Add Category', 'Insert Data', 'Category is Created', 'John Doe', '2025-02-17 05:07:59'),
(320, 'Category List', 'Update Data', 'Category Updated', 'John Doe', '2025-02-17 05:09:10'),
(321, 'Add Category', 'Insert Data', 'Category is Created', 'John Doe', '2025-02-17 05:15:19'),
(322, 'Add Category', 'Insert Data', 'Category is Created', 'John Doe', '2025-02-17 05:15:46'),
(323, 'Add Category', 'Insert Data', 'Category is Created', 'John Doe', '2025-02-17 05:15:59'),
(324, 'Add Food', 'Insert Data', 'New Food Added', 'John Doe', '2025-02-17 05:21:24'),
(325, 'Varient List', 'Insert Data', 'New Varient Created', 'John Doe', '2025-02-17 05:26:00'),
(326, 'Varient List', 'Insert Data', 'New Varient Created', 'John Doe', '2025-02-17 05:26:13'),
(327, 'Food List', 'Update Data', 'Food Updated', 'John Doe', '2025-02-17 05:27:11'),
(328, 'set Production Unit', 'Insert Data', 'set Production Unit Created', 'John Doe', '2025-02-17 05:28:23'),
(329, 'Add Purchase', 'Insert Data', 'Item Purchase Created', 'John Doe', '2025-02-17 05:30:24'),
(330, 'Add Production', 'Insert Data', 'Add Production Created', 'John Doe', '2025-02-17 05:30:40'),
(331, 'set Production Unit', 'Insert Data', 'set Production Unit Created', 'John Doe', '2025-02-17 05:31:15'),
(332, 'Add Production', 'Insert Data', 'Add Production Created', 'John Doe', '2025-02-17 05:31:30'),
(333, 'Add New Order', 'Insert Data', 'Item New Order Created', 'John Doe', '2025-02-17 05:54:24'),
(334, 'Pending Order', 'Insert Data', 'Pending Order is Update', 'John Doe', '2025-02-17 05:55:36'),
(335, 'Order List', 'Insert Data', 'Order is Update', 'John Doe', '2025-02-17 06:00:30'),
(336, 'Add Food', 'Insert Data', 'New Food Added', 'John Doe', '2025-02-17 06:10:07'),
(337, 'Varient List', 'Insert Data', 'New Varient Created', 'John Doe', '2025-02-17 06:12:32'),
(338, 'set Production Unit', 'Insert Data', 'set Production Unit Created', 'John Doe', '2025-02-17 06:12:59'),
(339, 'Add Production', 'Insert Data', 'Add Production Created', 'John Doe', '2025-02-17 06:13:22'),
(340, 'Add Category', 'Insert Data', 'Category is Created', 'John Doe', '2025-02-17 06:42:32'),
(341, 'Add Category', 'Insert Data', 'Category is Created', 'John Doe', '2025-02-17 06:42:43'),
(342, 'Add New Order', 'Insert Data', 'Item New Order Created', 'John Doe', '2025-02-18 06:26:56'),
(343, 'Order List', 'Insert Data', 'Order is Update', 'John Doe', '2025-02-18 06:27:06'),
(344, 'Add New Order', 'Insert Data', 'Item New Order Created', 'John Doe', '2025-02-18 06:31:09'),
(345, 'Order List', 'Insert Data', 'Order is Update', 'John Doe', '2025-02-18 06:31:25'),
(346, 'Add New Order', 'Insert Data', 'Item New Order Created', 'John Doe', '2025-02-18 06:49:51'),
(347, 'Order List', 'Insert Data', 'Order is Update', 'John Doe', '2025-02-18 06:50:04'),
(348, 'Add New Order', 'Insert Data', 'Item New Order Created', 'John Doe', '2025-02-18 08:10:59'),
(349, 'Add New Order', 'Insert Data', 'Item New Order Created', 'John Doe', '2025-02-18 08:11:28'),
(350, 'Add New Order', 'Insert Data', 'Item New Order Created', 'John Doe', '2025-02-18 08:23:21'),
(351, 'Add New Order', 'Insert Data', 'Item New Order Created', 'John Doe', '2025-02-18 08:24:54'),
(352, 'Add New Order', 'Insert Data', 'Item New Order Created', 'John Doe', '2025-02-18 08:25:37'),
(353, 'Order List', 'Insert Data', 'Order is Update', 'John Doe', '2025-02-18 08:30:21'),
(354, 'Order List', 'Insert Data', 'Order is Update', 'John Doe', '2025-02-18 08:30:29'),
(355, 'Order List', 'Insert Data', 'Order is Update', 'John Doe', '2025-02-18 08:31:11'),
(356, 'Order List', 'Insert Data', 'Order is Update', 'John Doe', '2025-02-19 14:01:19'),
(357, 'Order List', 'Insert Data', 'Order is Update', 'John Doe', '2025-02-19 14:01:25'),
(358, 'Order List', 'Insert Data', 'Order is Update', 'John Doe', '2025-02-19 14:01:31'),
(359, 'Add New Order', 'Insert Data', 'Item New Order Created', 'John Doe', '2025-02-19 14:02:13'),
(360, 'Add New Order', 'Insert Data', 'Item New Order Created', 'John Doe', '2025-02-19 19:45:39'),
(361, 'Add New Order', 'Insert Data', 'Item New Order Created', 'John Doe', '2025-02-19 20:34:21'),
(362, 'Add New Order', 'Insert Data', 'Item New Order Created', 'John Doe', '2025-02-19 20:35:54'),
(363, 'Add New Order', 'Insert Data', 'Item New Order Created', 'John Doe', '2025-02-19 20:56:39'),
(364, 'Add New Order', 'Insert Data', 'Item New Order Created', 'John Doe', '2025-02-19 21:31:42'),
(365, 'Add New Order', 'Insert Data', 'Item New Order Created', 'John Doe', '2025-02-19 22:14:22'),
(366, 'Add New Order', 'Insert Data', 'Item New Order Created', 'John Doe', '2025-02-20 15:29:11'),
(367, 'Add New Order', 'Insert Data', 'Item New Order Created', 'John Doe', '2025-02-20 19:49:08'),
(368, 'Add New Order', 'Insert Data', 'Item New Order Created', 'John Doe', '2025-02-20 20:16:10'),
(369, 'Add New Order', 'Insert Data', 'Item New Order Created', 'John Doe', '2025-02-20 20:16:59'),
(370, 'Add New Order', 'Insert Data', 'Item New Order Created', 'John Doe', '2025-02-20 20:18:50'),
(371, 'Add New Order', 'Insert Data', 'Item New Order Created', 'John Doe', '2025-02-20 20:46:06'),
(372, 'Add New Order', 'Insert Data', 'Item New Order Created', 'John Doe', '2025-02-20 20:57:50'),
(373, 'Add New Order', 'Insert Data', 'Item New Order Created', 'John Doe', '2025-02-20 21:23:55'),
(374, 'Add New Order', 'Insert Data', 'Item New Order Created', 'John Doe', '2025-02-20 21:31:06'),
(375, 'Add New Order', 'Insert Data', 'Item New Order Created', 'John Doe', '2025-02-20 22:18:26'),
(376, 'Add New Order', 'Insert Data', 'Item New Order Created', 'John Doe', '2025-02-20 22:19:58'),
(377, 'Add New Order', 'Insert Data', 'Item New Order Created', 'John Doe', '2025-02-20 22:20:46'),
(378, 'Add New Order', 'Insert Data', 'Item New Order Created', 'John Doe', '2025-02-20 22:26:20'),
(379, 'Add New Order', 'Insert Data', 'Item New Order Created', 'John Doe', '2025-02-20 22:27:20'),
(380, 'Reservation List', 'Insert Data', 'New Reservation Created', 'John Doe', '2025-02-20 22:34:18'),
(381, 'Order List', 'Insert Data', 'Order is Update', 'John Doe', '2025-02-20 22:41:04'),
(382, 'Order List', 'Insert Data', 'Order is Update', 'John Doe', '2025-02-20 22:41:10'),
(383, 'Order List', 'Insert Data', 'Order is Update', 'John Doe', '2025-02-20 22:41:16'),
(384, 'Order List', 'Insert Data', 'Order is Update', 'John Doe', '2025-02-20 22:41:23'),
(385, 'Order List', 'Insert Data', 'Order is Update', 'John Doe', '2025-02-20 22:41:39'),
(386, 'Order List', 'Insert Data', 'Order is Update', 'John Doe', '2025-02-20 22:41:46'),
(387, 'Order List', 'Insert Data', 'Order is Update', 'John Doe', '2025-02-20 22:41:51'),
(388, 'Order List', 'Insert Data', 'Order is Update', 'John Doe', '2025-02-20 22:41:57'),
(389, 'Reservation List', 'Update Data', 'Reservation Updated', 'John Doe', '2025-02-21 15:00:30'),
(390, 'Add New Order', 'Insert Data', 'Item New Order Created', 'John Doe', '2025-02-21 15:09:11'),
(391, 'Add New Order', 'Insert Data', 'Item New Order Created', 'John Doe', '2025-02-21 15:12:34'),
(392, 'Order List', 'Insert Data', 'Order is Update', 'John Doe', '2025-02-21 15:24:22'),
(393, 'Reservation List', 'Update Data', 'Reservation Updated', 'John Doe', '2025-02-21 15:37:14'),
(394, 'Reservation List', 'Update Data', 'Reservation Updated', 'John Doe', '2025-02-21 15:47:00'),
(395, 'Reservation List', 'Update Data', 'Reservation Updated', 'John Doe', '2025-02-21 15:53:40'),
(396, 'Add New Order', 'Insert Data', 'Item New Order Created', 'John Doe', '2025-02-24 15:06:34'),
(397, 'Reservation List', 'Update Data', 'Reservation Updated', 'John Doe', '2025-02-24 15:08:56'),
(398, 'Order List', 'Insert Data', 'Order is Update', 'John Doe', '2025-02-24 15:25:48'),
(399, 'Add New Order', 'Insert Data', 'Item New Order Created', 'John Doe', '2025-02-24 15:40:38'),
(400, 'Add New Order', 'Insert Data', 'Item New Order Created', 'John Doe', '2025-02-24 15:46:06'),
(401, 'Order List', 'Insert Data', 'Order is Update', 'John Doe', '2025-02-24 15:51:42'),
(402, 'Add New Order', 'Insert Data', 'Item New Order Created', 'John Doe', '2025-02-24 22:27:12'),
(403, 'Reservation List', 'Update Data', 'Reservation Updated', 'John Doe', '2025-02-25 14:25:31'),
(404, 'Add New Order', 'Insert Data', 'Item New Order Created', 'John Doe', '2025-02-25 14:33:35'),
(405, 'Order List', 'Insert Data', 'Order is Update', 'John Doe', '2025-02-25 14:47:32'),
(406, 'Order List', 'Insert Data', 'Order is Update', 'John Doe', '2025-02-25 14:47:51'),
(407, 'Reservation List', 'Update Data', 'Reservation Updated', 'John Doe', '2025-02-25 16:12:14'),
(408, 'Reservation List', 'Update Data', 'Reservation Updated', 'John Doe', '2025-02-25 16:30:53'),
(409, 'Add New Order', 'Insert Data', 'Item New Order Created', 'John Doe', '2025-02-25 16:37:52'),
(410, 'Order List', 'Insert Data', 'Order is Update', 'John Doe', '2025-02-25 16:38:26'),
(411, 'Reservation List', 'Update Data', 'Reservation Updated', 'John Doe', '2025-02-25 16:53:27'),
(412, 'Add New Order', 'Insert Data', 'Item New Order Created', 'John Doe', '2025-02-25 18:33:19'),
(413, 'Order List', 'Insert Data', 'Order is Update', 'John Doe', '2025-02-25 18:33:32'),
(414, 'Add New Order', 'Insert Data', 'Item New Order Created', 'John Doe', '2025-02-25 19:48:32'),
(415, 'Add New Order', 'Insert Data', 'Item New Order Created', 'John Doe', '2025-02-25 19:50:16'),
(416, 'Order List', 'Insert Data', 'Order is Update', 'John Doe', '2025-02-25 19:50:51'),
(417, 'Order List', 'Insert Data', 'Order is Update', 'John Doe', '2025-02-25 19:51:00'),
(418, 'Add Food', 'Insert Data', 'New Food Added', 'John Doe', '2025-02-28 15:13:02'),
(419, 'Varient List', 'Insert Data', 'New Varient Created', 'John Doe', '2025-02-28 15:13:28'),
(420, 'set Production Unit', 'Insert Data', 'set Production Unit Created', 'John Doe', '2025-02-28 15:13:57'),
(421, 'Add Purchase', 'Insert Data', 'Item Purchase Created', 'John Doe', '2025-02-28 15:14:51'),
(422, 'Add Production', 'Insert Data', 'Add Production Created', 'John Doe', '2025-02-28 15:15:08'),
(423, 'Add New Order', 'Insert Data', 'Item New Order Created', 'John Doe', '2025-03-03 20:38:13'),
(424, 'Payment Method List', 'Update Data', 'Payment Method Updated', 'John Doe', '2025-03-03 21:02:14'),
(425, 'Payment Method List', 'Update Data', 'Payment Method Updated', 'John Doe', '2025-03-03 21:02:25'),
(426, 'Payment Method List', 'Update Data', 'Payment Method Updated', 'John Doe', '2025-03-03 21:02:38'),
(427, 'Payment Method List', 'Update Data', 'Payment Method Updated', 'John Doe', '2025-03-03 21:02:51'),
(428, 'Payment Method List', 'Update Data', 'Payment Method Updated', 'John Doe', '2025-03-03 21:03:08'),
(429, 'Payment Method List', 'Update Data', 'Payment Method Updated', 'John Doe', '2025-03-03 21:03:22'),
(430, 'Payment Method List', 'Update Data', 'Payment Method Updated', 'John Doe', '2025-03-03 21:03:37'),
(431, 'Payment Method List', 'Update Data', 'Payment Method Updated', 'John Doe', '2025-03-03 21:03:51'),
(432, 'Payment Method List', 'Update Data', 'Payment Method Updated', 'John Doe', '2025-03-03 21:04:09'),
(433, 'Payment Method List', 'Update Data', 'Payment Method Updated', 'John Doe', '2025-03-03 21:04:26'),
(434, 'Payment Method List', 'Update Data', 'Payment Method Updated', 'John Doe', '2025-03-03 21:04:40'),
(435, 'Payment Method List', 'Update Data', 'Payment Method Updated', 'John Doe', '2025-03-03 21:04:52'),
(436, 'Add Food', 'Insert Data', 'New Food Added', 'John Doe', '2025-03-04 20:31:09'),
(437, 'Varient List', 'Insert Data', 'New Varient Created', 'John Doe', '2025-03-04 20:31:09'),
(438, 'Varient List', 'Update Data', 'Varient Updated', 'John Doe', '2025-03-04 21:08:24'),
(439, 'Varient List', 'Update Data', 'Varient Updated', 'John Doe', '2025-03-04 21:08:53'),
(440, 'Varient List', 'Insert Data', 'New Varient Created', 'John Doe', '2025-03-04 21:15:05'),
(441, 'Add Category', 'Insert Data', 'Category is Created', 'John Doe', '2025-03-07 21:51:19'),
(442, 'Add Category', 'Insert Data', 'Category is Created', 'John Doe', '2025-03-07 21:51:54'),
(443, 'Add Category', 'Insert Data', 'Category is Created', 'John Doe', '2025-03-07 21:52:54'),
(444, 'Add Category', 'Insert Data', 'Category is Created', 'John Doe', '2025-03-07 21:53:15'),
(445, 'Add Category', 'Insert Data', 'Category is Created', 'John Doe', '2025-03-07 21:54:20'),
(446, 'Add Category', 'Insert Data', 'Category is Created', 'John Doe', '2025-03-07 21:55:03'),
(447, 'Add Category', 'Insert Data', 'Category is Created', 'John Doe', '2025-03-07 21:55:32'),
(448, 'Add Category', 'Insert Data', 'Category is Created', 'John Doe', '2025-03-07 21:56:20'),
(449, 'Add Category', 'Insert Data', 'Category is Created', 'John Doe', '2025-03-07 21:56:43'),
(450, 'Add Category', 'Insert Data', 'Category is Created', 'John Doe', '2025-03-07 21:57:01'),
(451, 'Add Food', 'Insert Data', 'New Food Added', 'John Doe', '2025-03-10 15:44:21'),
(452, 'Food List', 'Update Data', 'Food Updated', 'John Doe', '2025-03-10 17:28:39'),
(453, 'Food List', 'Update Data', 'Food Updated', 'John Doe', '2025-03-10 17:39:15'),
(454, 'Food List', 'Update Data', 'Food Updated', 'John Doe', '2025-03-10 17:45:12'),
(455, 'Food List', 'Update Data', 'Food Updated', 'John Doe', '2025-03-10 17:47:50'),
(456, 'Food List', 'Update Data', 'Food Updated', 'John Doe', '2025-03-10 17:50:55'),
(457, 'Food List', 'Update Data', 'Food Updated', 'John Doe', '2025-03-10 17:51:22'),
(458, 'Food List', 'Update Data', 'Food Updated', 'John Doe', '2025-03-10 18:00:51'),
(459, 'Food List', 'Update Data', 'Food Updated', 'John Doe', '2025-03-10 18:02:05'),
(460, 'Add Food', 'Insert Data', 'New Food Added', 'John Doe', '2025-03-10 18:19:57'),
(461, 'Food List', 'Update Data', 'Food Updated', 'John Doe', '2025-03-10 18:21:25'),
(462, 'Food List', 'Update Data', 'Food Updated', 'John Doe', '2025-03-10 18:22:24'),
(463, 'Food List', 'Update Data', 'Food Updated', 'John Doe', '2025-03-10 19:09:21'),
(464, 'Food List', 'Update Data', 'Food Updated', 'John Doe', '2025-03-10 19:09:53'),
(465, 'Food List', 'Update Data', 'Food Updated', 'John Doe', '2025-03-10 19:13:32'),
(466, 'Food List', 'Update Data', 'Food Updated', 'John Doe', '2025-03-10 19:13:59'),
(467, 'Add Food', 'Insert Data', 'New Food Added', 'John Doe', '2025-03-10 19:15:13'),
(468, 'Food List', 'Update Data', 'Food Updated', 'John Doe', '2025-03-10 19:16:44'),
(469, 'Add Food', 'Insert Data', 'New Food Added', 'John Doe', '2025-03-10 19:22:33'),
(470, 'Add Food', 'Insert Data', 'New Food Added', 'John Doe', '2025-03-10 19:34:50'),
(471, 'Food List', 'Update Data', 'Food Updated', 'John Doe', '2025-03-10 19:37:41'),
(472, 'Add Food', 'Insert Data', 'New Food Added', 'John Doe', '2025-03-10 20:41:28'),
(473, 'Add Food', 'Insert Data', 'New Food Added', 'John Doe', '2025-03-10 20:44:50'),
(474, 'Add New Order', 'Insert Data', 'Item New Order Created', 'John Doe', '2025-03-11 17:32:30'),
(475, 'Add New Order', 'Insert Data', 'Item New Order Created', 'John Doe', '2025-03-11 17:34:04'),
(476, 'Add New Order', 'Insert Data', 'Item New Order Created', 'John Doe', '2025-03-11 17:35:42'),
(477, 'Add New Order', 'Insert Data', 'Item New Order Created', 'John Doe', '2025-03-11 17:54:13'),
(478, 'Add Purchase', 'Insert Data', 'Item Purchase Created', 'John Doe', '2025-03-11 17:57:05'),
(479, 'Add Purchase', 'Insert Data', 'Item Purchase Created', 'John Doe', '2025-03-11 18:00:15'),
(480, 'Add Purchase', 'Insert Data', 'Item Purchase Created', 'John Doe', '2025-03-11 19:08:04'),
(481, 'Add New Order', 'Insert Data', 'Item New Order Created', 'John Doe', '2025-03-11 19:09:55'),
(482, 'Add New Order', 'Insert Data', 'Item New Order Created', 'John Doe', '2025-03-11 19:15:02'),
(483, 'Category List', 'Insert Data', 'Multiple categories created', 'John Doe', '2025-03-11 20:57:27'),
(484, 'Category List', 'Insert Data', 'Multiple categories created', 'John Doe', '2025-03-11 20:59:00'),
(485, 'Category List', 'Insert Data', 'Multiple categories created', 'John Doe', '2025-03-11 21:00:01'),
(486, 'Category List', 'Insert Data', 'Multiple categories created', 'John Doe', '2025-03-11 21:00:55'),
(487, 'Category List', 'Insert Data', 'Multiple categories created', 'John Doe', '2025-03-11 21:02:49'),
(488, 'Category List', 'Insert Data', 'Multiple categories created', 'John Doe', '2025-03-11 21:05:55'),
(489, 'Category List', 'Insert Data', 'Multiple categories created', 'John Doe', '2025-03-11 21:06:33'),
(490, 'Add Food', 'Insert Data', 'New Food Added', 'John Doe', '2025-03-11 21:18:34'),
(491, 'Varient List', 'Insert Data', 'New Varient Created', 'John Doe', '2025-03-11 21:18:34'),
(492, 'Supplier List', 'Insert Data', 'New Supplier Created', 'John Doe', '2025-03-11 21:21:48'),
(493, 'Add Purchase', 'Insert Data', 'Item Purchase Created', 'John Doe', '2025-03-11 21:24:29'),
(494, 'Food List', 'Update Data', 'Food Updated', 'John Doe', '2025-03-11 21:29:12'),
(495, 'Ingredient List', 'Insert Data', 'New Ingredient Created', 'John Doe', '2025-03-11 21:32:01'),
(496, 'Ingredient List', 'Insert Data', 'New Ingredient Created', 'John Doe', '2025-03-11 21:32:24'),
(497, 'Add Purchase', 'Insert Data', 'Item Purchase Created', 'John Doe', '2025-03-11 21:33:14'),
(498, 'set Production Unit', 'Insert Data', 'set Production Unit Created', 'John Doe', '2025-03-11 21:36:45'),
(499, 'Add Production', 'Insert Data', 'Add Production Created', 'John Doe', '2025-03-11 21:37:13'),
(500, 'Add New Order', 'Insert Data', 'Item New Order Created', 'John Doe', '2025-03-11 21:38:01'),
(501, 'Category List', 'Insert Data', 'Multiple categories created', 'John Doe', '2025-03-17 15:28:04'),
(502, 'Category List', 'Insert Data', 'Multiple categories created', 'John Doe', '2025-03-17 15:31:11'),
(503, 'Category List', 'Insert Data', 'Multiple categories created', 'John Doe', '2025-03-17 15:33:51'),
(504, 'Category List', 'Insert Data', 'Multiple categories created', 'John Doe', '2025-03-17 15:34:59'),
(505, 'Category List', 'Insert Data', 'Multiple categories created', 'John Doe', '2025-03-17 15:35:39'),
(506, 'Add Purchase', 'Insert Data', 'Item Purchase Created', 'John Doe', '2025-03-17 16:02:53'),
(507, 'Add Food', 'Insert Data', 'New Food Added', 'John Doe', '2025-03-17 16:08:35'),
(508, 'Varient List', 'Insert Data', 'New Varient Created', 'John Doe', '2025-03-17 16:08:35'),
(509, 'Food List', 'Update Data', 'Food Updated', 'John Doe', '2025-03-17 16:09:13'),
(510, 'set Production Unit', 'Insert Data', 'set Production Unit Created', 'John Doe', '2025-03-17 21:56:16'),
(511, 'set Production Unit', 'Insert Data', 'set Production Unit Created', 'John Doe', '2025-03-18 16:53:31'),
(512, 'Add Production', 'Insert Data', 'Add Production Created', 'John Doe', '2025-03-18 17:14:09'),
(513, 'Create New', 'Insert Data', 'New Varient Created', 'John Doe', '2025-03-18 19:23:15'),
(514, 'Create New', 'Insert Data', 'New Varient Created', 'John Doe', '2025-03-18 19:27:02'),
(515, 'Create New', 'Insert Data', 'New Varient Created', 'John Doe', '2025-03-18 19:51:38'),
(516, 'Create New', 'Insert Data', 'New Varient Created', 'John Doe', '2025-03-18 19:57:11'),
(517, 'Create New', 'Insert Data', 'New Varient Created', 'John Doe', '2025-03-18 19:57:12'),
(518, 'Create New', 'Insert Data', 'New Varient Created', 'John Doe', '2025-03-18 20:01:51'),
(519, 'Create New', 'Insert Data', 'New Varient Created', 'John Doe', '2025-03-18 20:01:51'),
(520, 'Create New', 'Insert Data', 'New Varient Created', 'John Doe', '2025-03-18 22:46:25'),
(521, 'Create New', 'Insert Data', 'New Varient Created', 'John Doe', '2025-03-18 22:46:25'),
(522, 'Create New', 'Insert Data', 'New Varient Created', 'John Doe', '2025-03-18 23:01:35'),
(523, 'Create New', 'Insert Data', 'New Varient Created', 'John Doe', '2025-03-18 23:01:35'),
(524, 'Create New', 'Insert Data', 'New Varient Created', 'John Doe', '2025-03-19 15:05:08'),
(525, 'Create New', 'Insert Data', 'New Varient Created', 'John Doe', '2025-03-19 20:07:01'),
(526, 'Create New', 'Insert Data', 'New Varient Created', 'John Doe', '2025-03-19 20:16:57'),
(527, 'Create New', 'Insert Data', 'New Varient Created', 'John Doe', '2025-03-19 20:24:55'),
(528, 'Create New', 'Insert Data', 'New Varient Created', 'John Doe', '2025-03-19 20:37:24'),
(529, 'Create New', 'Insert Data', 'New Varient Created', 'John Doe', '2025-03-19 20:46:56'),
(530, 'Create New', 'Insert Data', 'New Varient Created', 'John Doe', '2025-03-19 21:22:39'),
(531, 'Ingredient List', 'Insert Data', 'New Ingredient Created', 'John Doe', '2025-03-24 15:01:47'),
(532, 'Ingredient List', 'Insert Data', 'New Ingredient Created', 'John Doe', '2025-03-24 15:02:06'),
(533, 'Add Purchase', 'Insert Data', 'Item Purchase Created', 'John Doe', '2025-03-24 15:05:25'),
(534, 'Create New', 'Insert Data', 'New Varient Created', 'John Doe', '2025-03-24 15:15:30'),
(535, 'Create New', 'Insert Data', 'New Varient Created', 'John Doe', '2025-03-24 15:18:41'),
(536, 'Create New', 'Insert Data', 'New Varient Created', 'John Doe', '2025-03-25 20:54:51'),
(537, 'Food List', 'Update Data', 'Food Updated', 'John Doe', '2025-03-31 16:33:33'),
(538, 'Food List', 'Update Data', 'Food Updated', 'John Doe', '2025-03-31 16:34:00'),
(539, 'Food List', 'Update Data', 'Food Updated', 'John Doe', '2025-03-31 16:35:22'),
(540, 'Food List', 'Update Data', 'Food Updated', 'John Doe', '2025-03-31 16:37:29'),
(541, 'Food List', 'Update Data', 'Food Updated', 'John Doe', '2025-03-31 16:37:36'),
(542, 'Food List', 'Update Data', 'Food Updated', 'John Doe', '2025-03-31 16:37:59'),
(543, 'Food List', 'Update Data', 'Food Updated', 'John Doe', '2025-03-31 16:39:24'),
(544, 'Food List', 'Update Data', 'Food Updated', 'John Doe', '2025-03-31 16:39:34'),
(545, 'Food List', 'Update Data', 'Food Updated', 'John Doe', '2025-03-31 16:40:13'),
(546, 'Food List', 'Update Data', 'Food Updated', 'John Doe', '2025-03-31 16:42:01'),
(547, 'Food List', 'Update Data', 'Food Updated', 'John Doe', '2025-03-31 16:42:08'),
(548, 'Food List', 'Update Data', 'Food Updated', 'John Doe', '2025-03-31 16:42:16'),
(549, 'Food List', 'Update Data', 'Food Updated', 'John Doe', '2025-03-31 16:54:10'),
(550, 'Food List', 'Update Data', 'Food Updated', 'John Doe', '2025-03-31 16:55:26'),
(551, 'Food List', 'Update Data', 'Food Updated', 'John Doe', '2025-03-31 16:57:24'),
(552, 'Food List', 'Update Data', 'Food Updated', 'John Doe', '2025-03-31 16:59:28'),
(553, 'Food List', 'Update Data', 'Food Updated', 'John Doe', '2025-03-31 16:59:37'),
(554, 'Food List', 'Update Data', 'Food Updated', 'John Doe', '2025-03-31 17:20:10'),
(555, 'Food List', 'Update Data', 'Food Updated', 'John Doe', '2025-03-31 17:21:18'),
(556, 'Food List', 'Update Data', 'Food Updated', 'John Doe', '2025-03-31 17:37:09'),
(557, 'Food List', 'Update Data', 'Food Updated', 'John Doe', '2025-03-31 17:37:45'),
(558, 'Food List', 'Update Data', 'Food Updated', 'John Doe', '2025-03-31 17:52:15'),
(559, 'Food List', 'Update Data', 'Food Updated', 'John Doe', '2025-03-31 17:52:25'),
(560, 'Food List', 'Update Data', 'Food Updated', 'John Doe', '2025-03-31 18:01:22'),
(561, 'Food List', 'Update Data', 'Food Updated', 'John Doe', '2025-03-31 18:01:36'),
(562, 'Create New', 'Insert Data', 'New Variant Created', 'John Doe', '2025-03-31 18:55:23'),
(563, 'Food List', 'Update Data', 'Food Updated', 'John Doe', '2025-03-31 18:55:23'),
(564, 'Food List', 'Update Data', 'Food Updated', 'John Doe', '2025-03-31 18:56:03'),
(565, 'Create New', 'Insert Data', 'New Variant Created', 'John Doe', '2025-03-31 19:34:59'),
(566, 'Food List', 'Update Data', 'Food Updated', 'John Doe', '2025-03-31 19:34:58'),
(567, 'Food List', 'Update Data', 'Food Updated', 'John Doe', '2025-03-31 21:24:22'),
(568, 'Food List', 'Update Data', 'Food Updated', 'John Doe', '2025-03-31 21:24:38'),
(569, 'Food List', 'Update Data', 'Food Updated', 'John Doe', '2025-03-31 22:11:00'),
(570, 'Food List', 'Update Data', 'Food Updated', 'John Doe', '2025-03-31 22:11:19'),
(571, 'Food List', 'Update Data', 'Food Updated', 'John Doe', '2025-03-31 22:12:46'),
(572, 'Food List', 'Update Data', 'Food Updated', 'John Doe', '2025-03-31 22:13:11'),
(573, 'Food List', 'Update Data', 'Food Updated', 'John Doe', '2025-03-31 22:14:57'),
(574, 'Food List', 'Update Data', 'Food Updated', 'John Doe', '2025-03-31 22:20:08'),
(575, 'Food List', 'Update Data', 'Food Updated', 'John Doe', '2025-03-31 22:43:59'),
(576, 'Create New', 'Insert Data', 'New Variant Created', 'John Doe', '2025-04-01 14:59:14'),
(577, 'Food List', 'Update Data', 'Food Updated', 'John Doe', '2025-04-01 14:59:13'),
(578, 'Create New', 'Insert Data', 'New Variant Created', 'John Doe', '2025-04-01 15:02:12'),
(579, 'Food List', 'Update Data', 'Food Updated', 'John Doe', '2025-04-01 15:02:11'),
(580, 'Food List', 'Update Data', 'Food Updated', 'John Doe', '2025-04-01 15:40:50'),
(581, 'Food List', 'Update Data', 'Food Updated', 'John Doe', '2025-04-01 15:41:04'),
(582, 'Food List', 'Update Data', 'Food Updated', 'John Doe', '2025-04-01 15:41:26'),
(583, 'Create New', 'Insert Data', 'New Variant Created', 'John Doe', '2025-04-01 16:09:23'),
(584, 'Food List', 'Update Data', 'Food Updated', 'John Doe', '2025-04-01 16:09:22'),
(585, 'Create New', 'Insert Data', 'New Variant Created', 'John Doe', '2025-04-01 16:27:50'),
(586, 'Food List', 'Update Data', 'Food Updated', 'John Doe', '2025-04-01 16:27:50'),
(587, 'Food List', 'Update Data', 'Food Updated', 'John Doe', '2025-04-01 16:28:51'),
(588, 'Food List', 'Update Data', 'Food Updated', 'John Doe', '2025-04-01 16:29:05'),
(589, 'Food List', 'Update Data', 'Food Updated', 'John Doe', '2025-04-01 17:54:32'),
(590, 'Food List', 'Update Data', 'Food Updated', 'John Doe', '2025-04-01 17:55:56'),
(591, 'Food List', 'Update Data', 'Food Updated', 'John Doe', '2025-04-01 17:56:49'),
(592, 'Food List', 'Update Data', 'Food Updated', 'John Doe', '2025-04-01 17:56:58'),
(593, 'Food List', 'Update Data', 'Food Updated', 'John Doe', '2025-04-01 17:58:31'),
(594, 'Food List', 'Update Data', 'Food Updated', 'John Doe', '2025-04-01 18:02:31'),
(595, 'Food List', 'Update Data', 'Food Updated', 'John Doe', '2025-04-01 18:04:41'),
(596, 'Food List', 'Update Data', 'Food Updated', 'John Doe', '2025-04-01 18:04:53'),
(597, 'Food List', 'Update Data', 'Food Updated', 'John Doe', '2025-04-01 18:07:44'),
(598, 'Food List', 'Update Data', 'Food Updated', 'John Doe', '2025-04-01 18:10:21'),
(599, 'Food List', 'Update Data', 'Food Updated', 'John Doe', '2025-04-01 18:10:49'),
(600, 'Food List', 'Update Data', 'Food Updated', 'John Doe', '2025-04-01 18:11:39'),
(601, 'Food List', 'Update Data', 'Food Updated', 'John Doe', '2025-04-01 18:12:17'),
(602, 'Food List', 'Update Data', 'Food Updated', 'John Doe', '2025-04-01 18:12:53'),
(603, 'Food List', 'Update Data', 'Food Updated', 'John Doe', '2025-04-01 18:14:49'),
(604, 'Food List', 'Update Data', 'Food Updated', 'John Doe', '2025-04-01 18:15:20'),
(605, 'Food List', 'Update Data', 'Food Updated', 'John Doe', '2025-04-01 19:03:59'),
(606, 'Food List', 'Update Data', 'Food Updated', 'John Doe', '2025-04-01 19:11:38'),
(607, 'Food List', 'Update Data', 'Food Updated', 'John Doe', '2025-04-01 19:14:26'),
(608, 'Food List', 'Update Data', 'Food Updated', 'John Doe', '2025-04-01 19:14:50'),
(609, 'Food List', 'Update Data', 'Food Updated', 'John Doe', '2025-04-01 19:15:37'),
(610, 'Food List', 'Update Data', 'Food Updated', 'John Doe', '2025-04-01 19:19:23'),
(611, 'Food List', 'Update Data', 'Food Updated', 'John Doe', '2025-04-01 19:30:16'),
(612, 'Food List', 'Update Data', 'Food Updated', 'John Doe', '2025-04-01 19:31:01'),
(613, 'Food List', 'Update Data', 'Food Updated', 'John Doe', '2025-04-01 19:35:54'),
(614, 'Food List', 'Update Data', 'Food Updated', 'John Doe', '2025-04-01 19:39:20'),
(615, 'Food List', 'Update Data', 'Food Updated', 'John Doe', '2025-04-01 19:40:35'),
(616, 'Food List', 'Update Data', 'Food Updated', 'John Doe', '2025-04-01 19:41:59'),
(617, 'Food List', 'Update Data', 'Food Updated', 'John Doe', '2025-04-01 19:47:14'),
(618, 'Food List', 'Update Data', 'Food Updated', 'John Doe', '2025-04-01 19:54:03'),
(619, 'Food List', 'Update Data', 'Food Updated', 'John Doe', '2025-04-01 20:02:51'),
(620, 'Food List', 'Update Data', 'Food Updated', 'John Doe', '2025-04-01 20:08:10'),
(621, 'Food List', 'Update Data', 'Food Updated', 'John Doe', '2025-04-01 20:15:47'),
(622, 'Food List', 'Update Data', 'Food Updated', 'John Doe', '2025-04-01 20:35:29'),
(623, 'Food List', 'Update Data', 'Food Updated', 'John Doe', '2025-04-01 20:49:05'),
(624, 'Food List', 'Update Data', 'Food Updated', 'John Doe', '2025-04-01 20:49:41'),
(625, 'Food List', 'Update Data', 'Food Updated', 'John Doe', '2025-04-01 20:53:32'),
(626, 'Food List', 'Update Data', 'Food Updated', 'John Doe', '2025-04-01 21:00:46'),
(627, 'Create New', 'Insert Data', 'New Variant Created', 'John Doe', '2025-04-01 21:10:59'),
(628, 'Food List', 'Update Data', 'Food Updated', 'John Doe', '2025-04-01 21:10:59'),
(629, 'Food List', 'Update Data', 'Food Updated', 'John Doe', '2025-04-01 21:15:27'),
(630, 'Food List', 'Update Data', 'Food Updated', 'John Doe', '2025-04-01 21:15:53'),
(631, 'Food List', 'Update Data', 'Food Updated', 'John Doe', '2025-04-01 21:18:17'),
(632, 'Food List', 'Update Data', 'Food Updated', 'John Doe', '2025-04-01 21:19:26'),
(633, 'Food List', 'Update Data', 'Food Updated', 'John Doe', '2025-04-01 22:45:23'),
(634, 'Food List', 'Update Data', 'Food Updated', 'John Doe', '2025-04-01 22:46:14'),
(635, 'Food List', 'Update Data', 'Food Updated', 'John Doe', '2025-04-01 22:46:25'),
(636, 'Food List', 'Update Data', 'Food Updated', 'John Doe', '2025-04-01 22:46:50'),
(637, 'Food List', 'Update Data', 'Food Updated', 'John Doe', '2025-04-01 22:50:09'),
(638, 'Food List', 'Update Data', 'Food Updated', 'John Doe', '2025-04-01 22:51:52'),
(639, 'Food List', 'Update Data', 'Food Updated', 'John Doe', '2025-04-01 22:58:41'),
(640, 'Food List', 'Update Data', 'Food Updated', 'John Doe', '2025-04-01 22:59:56'),
(641, 'Add Purchase', 'Insert Data', 'Item Purchase Created', 'John Doe', '2025-04-02 14:18:42'),
(642, 'Create New', 'Insert Data', 'New Variant Created', 'John Doe', '2025-04-02 14:31:39'),
(643, 'Food List', 'Update Data', 'Food Updated', 'John Doe', '2025-04-02 14:31:39'),
(644, 'Food List', 'Update Data', 'Food Updated', 'John Doe', '2025-04-02 15:19:27'),
(645, 'Food List', 'Update Data', 'Food Updated', 'John Doe', '2025-04-02 15:19:42'),
(646, 'Food List', 'Update Data', 'Food Updated', 'John Doe', '2025-04-02 15:32:07'),
(647, 'Ingredient List', 'Insert Data', 'New Ingredient Created', 'John Doe', '2025-04-02 15:47:28'),
(648, 'Ingredient List', 'Insert Data', 'New Ingredient Created', 'John Doe', '2025-04-02 15:47:31'),
(649, 'Ingredient List', 'Delete Data', 'Ingredient Deleted', 'John Doe', '2025-04-02 15:47:36'),
(650, 'Ingredient List', 'Insert Data', 'New Ingredient Created', 'John Doe', '2025-04-02 15:48:18'),
(651, 'Ingredient List', 'Insert Data', 'New Ingredient Created', 'John Doe', '2025-04-02 15:49:26'),
(652, 'Add Purchase', 'Insert Data', 'Item Purchase Created', 'John Doe', '2025-04-02 15:50:46'),
(653, 'Create New', 'Insert Data', 'New Variant Created', 'John Doe', '2025-04-02 16:15:01'),
(654, 'Food List', 'Update Data', 'Food Updated', 'John Doe', '2025-04-02 16:15:01'),
(655, 'Food List', 'Update Data', 'Food Updated', 'John Doe', '2025-04-02 16:15:33'),
(656, 'Food List', 'Update Data', 'Food Updated', 'John Doe', '2025-04-02 16:15:53'),
(657, 'Add New Order', 'Insert Data', 'Item New Order Created', 'John Doe', '2025-04-02 18:12:43'),
(658, 'Add New Order', 'Insert Data', 'Item New Order Created', 'John Doe', '2025-04-02 18:15:46'),
(659, 'Create New', 'Insert Data', 'New Variant Created', 'John Doe', '2025-04-02 19:31:26'),
(660, 'Food List', 'Update Data', 'Food Updated', 'John Doe', '2025-04-02 19:31:26'),
(661, 'Food List', 'Update Data', 'Food Updated', 'John Doe', '2025-04-02 19:36:11'),
(662, 'Create New', 'Insert Data', 'New Variant Created', 'John Doe', '2025-04-02 20:32:05'),
(663, 'Food List', 'Update Data', 'Food Updated', 'John Doe', '2025-04-02 20:32:04'),
(664, 'Create New', 'Insert Data', 'New Variant Created', 'John Doe', '2025-04-02 20:56:31'),
(665, 'Food List', 'Update Data', 'Food Updated', 'John Doe', '2025-04-02 20:56:30'),
(666, 'Create New', 'Insert Data', 'New Variant Created', 'John Doe', '2025-04-02 21:11:08'),
(667, 'Food List', 'Update Data', 'Food Updated', 'John Doe', '2025-04-02 21:11:04'),
(668, 'Create New', 'Insert Data', 'New Variant Created', 'John Doe', '2025-04-02 21:29:13'),
(669, 'Food List', 'Update Data', 'Food Updated', 'John Doe', '2025-04-02 21:29:08'),
(670, 'Food List', 'Update Data', 'Food Updated', 'John Doe', '2025-04-02 21:34:28'),
(671, 'Create New', 'Insert Data', 'New Variant Created', 'John Doe', '2025-04-02 21:35:41'),
(672, 'Food List', 'Update Data', 'Food Updated', 'John Doe', '2025-04-02 21:35:39'),
(673, 'Food List', 'Update Data', 'Food Updated', 'John Doe', '2025-04-02 21:35:59'),
(674, 'Food List', 'Update Data', 'Food Updated', 'John Doe', '2025-04-02 21:36:37'),
(675, 'Food List', 'Update Data', 'Food Updated', 'John Doe', '2025-04-02 21:37:05'),
(676, 'Food List', 'Update Data', 'Food Updated', 'John Doe', '2025-04-02 21:49:39'),
(677, 'Food List', 'Update Data', 'Food Updated', 'John Doe', '2025-04-02 22:11:43'),
(678, 'Food List', 'Update Data', 'Food Updated', 'John Doe', '2025-04-02 22:45:23'),
(679, 'Food List', 'Update Data', 'Food Updated', 'John Doe', '2025-04-02 22:57:27'),
(680, 'Food List', 'Update Data', 'Food Updated', 'John Doe', '2025-04-02 23:00:23'),
(681, 'Food List', 'Update Data', 'Food Updated', 'John Doe', '2025-04-03 14:29:13'),
(682, 'Food List', 'Update Data', 'Food Updated', 'John Doe', '2025-04-03 14:45:42'),
(683, 'Create New', 'Insert Data', 'New Variant Created', 'John Doe', '2025-04-03 14:51:58'),
(684, 'Food List', 'Update Data', 'Food Updated', 'John Doe', '2025-04-03 14:51:57'),
(685, 'Create New', 'Insert Data', 'New Variant Created', 'John Doe', '2025-04-03 15:08:45'),
(686, 'Food List', 'Update Data', 'Food Updated', 'John Doe', '2025-04-03 15:08:45'),
(687, 'Create New', 'Insert Data', 'New Variant Created', 'John Doe', '2025-04-03 16:00:43'),
(688, 'Food List', 'Update Data', 'Food Updated', 'John Doe', '2025-04-03 16:00:42'),
(689, 'Food List', 'Update Data', 'Food Updated', 'John Doe', '2025-04-03 16:01:33'),
(690, 'Food List', 'Update Data', 'Food Updated', 'John Doe', '2025-04-03 16:11:08'),
(691, 'Food List', 'Update Data', 'Food Updated', 'John Doe', '2025-04-03 16:12:20'),
(692, 'Food List', 'Update Data', 'Food Updated', 'John Doe', '2025-04-03 16:13:02'),
(693, 'Food List', 'Update Data', 'Food Updated', 'John Doe', '2025-04-03 16:13:32'),
(694, 'Food List', 'Update Data', 'Food Updated', 'John Doe', '2025-04-03 16:16:09'),
(695, 'Food List', 'Update Data', 'Food Updated', 'John Doe', '2025-04-03 16:17:24'),
(696, 'Food List', 'Update Data', 'Food Updated', 'John Doe', '2025-04-03 16:19:40'),
(697, 'Create New', 'Insert Data', 'New Variant Created', 'John Doe', '2025-04-03 16:26:35'),
(698, 'Food List', 'Update Data', 'Food Updated', 'John Doe', '2025-04-03 16:26:35'),
(699, 'Food List', 'Update Data', 'Food Updated', 'John Doe', '2025-04-03 16:26:56'),
(700, 'Food List', 'Update Data', 'Food Updated', 'John Doe', '2025-04-03 16:31:28'),
(701, 'Food List', 'Update Data', 'Food Updated', 'John Doe', '2025-04-03 16:42:19'),
(702, 'Food List', 'Update Data', 'Food Updated', 'John Doe', '2025-04-03 16:43:32'),
(703, 'Food List', 'Update Data', 'Food Updated', 'John Doe', '2025-04-03 16:45:29'),
(704, 'Food List', 'Update Data', 'Food Updated', 'John Doe', '2025-04-03 16:45:58'),
(705, 'Food List', 'Update Data', 'Food Updated', 'John Doe', '2025-04-03 16:46:30'),
(706, 'Food List', 'Update Data', 'Food Updated', 'John Doe', '2025-04-03 16:49:05'),
(707, 'Food List', 'Update Data', 'Food Updated', 'John Doe', '2025-04-03 16:51:08'),
(708, 'Food List', 'Update Data', 'Food Updated', 'John Doe', '2025-04-03 16:56:30'),
(709, 'Food List', 'Update Data', 'Food Updated', 'John Doe', '2025-04-03 17:05:16'),
(710, 'Food List', 'Update Data', 'Food Updated', 'John Doe', '2025-04-03 17:06:29'),
(711, 'Food List', 'Update Data', 'Food Updated', 'John Doe', '2025-04-03 17:07:16'),
(712, 'Food List', 'Update Data', 'Food Updated', 'John Doe', '2025-04-03 17:08:12'),
(713, 'Food List', 'Update Data', 'Food Updated', 'John Doe', '2025-04-03 17:13:36'),
(714, 'Food List', 'Update Data', 'Food Updated', 'John Doe', '2025-04-03 17:18:09'),
(715, 'Food List', 'Update Data', 'Food Updated', 'John Doe', '2025-04-03 17:18:40'),
(716, 'Food List', 'Update Data', 'Food Updated', 'John Doe', '2025-04-03 17:19:07'),
(717, 'Food List', 'Update Data', 'Food Updated', 'John Doe', '2025-04-03 17:19:17'),
(718, 'Create New', 'Insert Data', 'New Variant Created', 'John Doe', '2025-04-03 17:20:08'),
(719, 'Food List', 'Update Data', 'Food Updated', 'John Doe', '2025-04-03 17:20:07'),
(720, 'Food List', 'Update Data', 'Food Updated', 'John Doe', '2025-04-03 17:20:26'),
(721, 'Create New', 'Insert Data', 'New Variant Created', 'John Doe', '2025-04-03 17:21:36'),
(722, 'Food List', 'Update Data', 'Food Updated', 'John Doe', '2025-04-03 17:21:36'),
(723, 'Food List', 'Update Data', 'Food Updated', 'John Doe', '2025-04-03 17:21:56'),
(724, 'Food List', 'Update Data', 'Food Updated', 'John Doe', '2025-04-03 17:42:12'),
(725, 'Food List', 'Update Data', 'Food Updated', 'John Doe', '2025-04-03 19:07:55'),
(726, 'Food List', 'Update Data', 'Food Updated', 'John Doe', '2025-04-03 19:08:21'),
(727, 'Food List', 'Update Data', 'Food Updated', 'John Doe', '2025-04-03 19:26:15'),
(728, 'Food List', 'Update Data', 'Food Updated', 'John Doe', '2025-04-03 19:28:42'),
(729, 'Food List', 'Update Data', 'Food Updated', 'John Doe', '2025-04-03 19:36:35'),
(730, 'Food List', 'Update Data', 'Food Updated', 'John Doe', '2025-04-03 19:39:01'),
(731, 'Food List', 'Update Data', 'Food Updated', 'John Doe', '2025-04-03 19:46:59'),
(732, 'Food List', 'Update Data', 'Food Updated', 'John Doe', '2025-04-03 19:52:22'),
(733, 'Food List', 'Update Data', 'Food Updated', 'John Doe', '2025-04-03 20:02:38'),
(734, 'Food List', 'Update Data', 'Food Updated', 'John Doe', '2025-04-03 20:13:36'),
(735, 'Food List', 'Update Data', 'Food Updated', 'John Doe', '2025-04-03 20:14:06'),
(736, 'Food List', 'Update Data', 'Food Updated', 'John Doe', '2025-04-03 20:14:24'),
(737, 'Food List', 'Update Data', 'Food Updated', 'John Doe', '2025-04-03 20:14:38'),
(738, 'Food List', 'Update Data', 'Food Updated', 'John Doe', '2025-04-03 20:15:32'),
(739, 'Create New', 'Insert Data', 'New Variant Created', 'John Doe', '2025-04-03 20:16:43'),
(740, 'Food List', 'Update Data', 'Food Updated', 'John Doe', '2025-04-03 20:16:42'),
(741, 'Food List', 'Update Data', 'Food Updated', 'John Doe', '2025-04-03 20:17:30'),
(742, 'Add-ons Assign', 'Insert Data', 'Assigned multiple Add-ons to Menus', 'John Doe', '2025-04-04 16:07:38'),
(743, 'Add-ons Assign', 'Insert Data', 'Assigned multiple Add-ons to Menus', 'John Doe', '2025-04-04 16:08:29'),
(744, 'Add-ons Assign', 'Insert Data', 'Assigned multiple Add-ons to Menus', 'John Doe', '2025-04-04 16:10:34'),
(745, 'Add-ons Assign', 'Insert Data', 'Assigned multiple Add-ons to Menus', 'John Doe', '2025-04-04 16:11:37'),
(746, 'Add-ons Assign', 'Insert Data', 'Assigned multiple Add-ons to Menus', 'John Doe', '2025-04-04 16:13:37'),
(747, 'Add-ons Assign', 'Insert Data', 'Assigned multiple Add-ons to Menus', 'John Doe', '2025-04-04 16:24:45'),
(748, 'Add-ons Assign', 'Insert Data', 'Assigned multiple Add-ons to Menus', 'John Doe', '2025-04-04 16:27:08'),
(749, 'Add-ons Assign', 'Insert Data', 'Assigned multiple Add-ons to Menus', 'John Doe', '2025-04-04 16:29:15'),
(750, 'Add-ons Assign', 'Insert Data', 'Assigned multiple Add-ons to Menus', 'John Doe', '2025-04-04 16:31:44'),
(751, 'Add-ons Assign', 'Insert Data', 'Assigned multiple Add-ons to Menus', 'John Doe', '2025-04-04 16:32:50'),
(752, 'Add-ons Assign', 'Insert Data', 'Assigned multiple Add-ons to Menus', 'John Doe', '2025-04-04 16:33:32'),
(753, 'Add-ons Assign', 'Insert Data', 'Assigned multiple Add-ons to Menus', 'John Doe', '2025-04-04 16:35:28'),
(754, 'Add-ons Assign', 'Insert Data', 'Assigned multiple Add-ons to Menus', 'John Doe', '2025-04-04 16:38:11'),
(755, 'Add-ons Assign', 'Insert Data', 'Assigned multiple Add-ons to Menus', 'John Doe', '2025-04-04 16:43:24'),
(756, 'Add-ons Assign', 'Insert Data', 'Assigned multiple Add-ons to Menus', 'John Doe', '2025-04-04 16:46:17'),
(757, 'Add-ons Assign', 'Insert Data', 'Assigned multiple Add-ons to Menus', 'John Doe', '2025-04-04 16:57:57'),
(758, 'Add-ons Assign List', 'Update Data', 'Updated Add-ons Assign List', 'John Doe', '2025-04-04 19:59:02'),
(759, 'Add-ons Assign List', 'Update Data', 'Updated Add-ons Assign List', 'John Doe', '2025-04-04 19:59:15'),
(760, 'Add-ons Assign List', 'Update Data', 'Updated Add-ons Assign List', 'John Doe', '2025-04-04 20:01:19'),
(761, 'Add-ons Assign List', 'Update Data', 'Updated Add-ons Assign List', 'John Doe', '2025-04-04 20:02:14'),
(762, 'Add-ons Assign List', 'Update Data', 'Updated Add-ons Assign List', 'John Doe', '2025-04-04 20:02:24'),
(763, 'Add-ons List', 'Delete Data', 'Add-ons Assign Menu Deleted', 'John Doe', '2025-04-04 20:04:41'),
(764, 'Add-ons Assign', 'Insert Data', 'Assigned multiple Add-ons to Menus', 'John Doe', '2025-04-04 20:05:09'),
(765, 'Add-ons Assign List', 'Update Data', 'Updated Add-ons Assign List', 'John Doe', '2025-04-04 20:05:22'),
(766, 'Add-ons List', 'Delete Data', 'Add-ons Assign Menu Deleted', 'John Doe', '2025-04-04 20:05:31'),
(767, 'Food List', 'Update Data', 'Food Updated', 'John Doe', '2025-04-04 20:22:26'),
(768, 'Food List', 'Update Data', 'Food Updated', 'John Doe', '2025-04-04 20:22:44'),
(769, 'Food List', 'Update Data', 'Food Updated', 'John Doe', '2025-04-04 20:23:24'),
(770, 'Food List', 'Update Data', 'Food Updated', 'John Doe', '2025-04-04 21:02:32'),
(771, 'Food List', 'Update Data', 'Food Updated', 'John Doe', '2025-04-04 21:02:45'),
(772, 'Food List', 'Update Data', 'Food Updated', 'John Doe', '2025-04-04 21:02:55'),
(773, 'Food List', 'Update Data', 'Food Updated', 'John Doe', '2025-04-04 21:05:14'),
(774, 'Food List', 'Update Data', 'Food Updated', 'John Doe', '2025-04-04 21:05:24'),
(775, 'Food List', 'Update Data', 'Food Updated', 'John Doe', '2025-04-04 21:06:49'),
(776, 'Ingredient List', 'Insert Data', 'New Ingredient Created', 'John Doe', '2025-04-04 21:24:52'),
(777, 'Ingredient List', 'Insert Data', 'New Ingredient Created', 'John Doe', '2025-04-04 21:25:14'),
(778, 'Ingredient List', 'Insert Data', 'New Ingredient Created', 'John Doe', '2025-04-04 21:26:09'),
(779, 'Ingredient List', 'Insert Data', 'New Ingredient Created', 'John Doe', '2025-04-04 21:26:28'),
(780, 'Ingredient List', 'Insert Data', 'New Ingredient Created', 'John Doe', '2025-04-04 21:26:41'),
(781, 'Ingredient List', 'Insert Data', 'New Ingredient Created', 'John Doe', '2025-04-04 21:26:54'),
(782, 'Ingredient List', 'Insert Data', 'New Ingredient Created', 'John Doe', '2025-04-04 21:27:25'),
(783, 'Ingredient List', 'Insert Data', 'New Ingredient Created', 'John Doe', '2025-04-04 21:27:47'),
(784, 'Ingredient List', 'Insert Data', 'New Ingredient Created', 'John Doe', '2025-04-04 21:28:35'),
(785, 'Ingredient List', 'Insert Data', 'New Ingredient Created', 'John Doe', '2025-04-04 21:29:07'),
(786, 'Ingredient List', 'Insert Data', 'New Ingredient Created', 'John Doe', '2025-04-04 21:30:06'),
(787, 'Add Purchase', 'Insert Data', 'Item Purchase Created', 'John Doe', '2025-04-04 21:33:38'),
(788, 'Ingredient List', 'Insert Data', 'New Ingredient Created', 'John Doe', '2025-04-04 21:35:33'),
(789, 'Ingredient List', 'Insert Data', 'New Ingredient Created', 'John Doe', '2025-04-04 21:36:05'),
(790, 'Ingredient List', 'Insert Data', 'New Ingredient Created', 'John Doe', '2025-04-04 21:36:19'),
(791, 'Add Purchase', 'Insert Data', 'Item Purchase Created', 'John Doe', '2025-04-04 21:37:15'),
(792, 'Update Purchase', 'Update Data', 'Item Purchase Updated', 'John Doe', '2025-04-04 21:37:49'),
(793, 'Food List', 'Update Data', 'Food Updated', 'John Doe', '2025-04-04 21:43:33'),
(794, 'Food List', 'Update Data', 'Food Updated', 'John Doe', '2025-04-04 21:43:46'),
(795, 'Food List', 'Update Data', 'Food Updated', 'John Doe', '2025-04-07 13:58:24'),
(796, 'Add New Order', 'Insert Data', 'Item New Order Created', 'John Doe', '2025-04-07 14:21:13'),
(797, 'Order List', 'Insert Data', 'Order is Update', 'John Doe', '2025-04-07 15:47:51'),
(798, 'Add New Order', 'Insert Data', 'Item New Order Created', 'John Doe', '2025-04-07 16:24:40'),
(799, 'Food List', 'Update Data', 'Food Updated', 'John Doe', '2025-04-09 15:20:29'),
(800, 'Add New Order', 'Insert Data', 'Item New Order Created', 'John Doe', '2025-04-09 15:22:00'),
(801, 'Add New Order', 'Insert Data', 'Item New Order Created', 'John Doe', '2025-04-09 17:56:38'),
(802, 'Add New Order', 'Insert Data', 'Item New Order Created', 'John Doe', '2025-04-09 22:14:02'),
(803, 'Ingredient List', 'Insert Data', 'New Ingredient Created', 'John Doe', '2025-04-16 17:52:31'),
(804, 'Ingredient List', 'Insert Data', 'New Ingredient Created', 'John Doe', '2025-04-16 17:58:56'),
(805, 'Add Purchase', 'Insert Data', 'Item Purchase Created', 'John Doe', '2025-04-16 18:03:46'),
(806, 'Ingredient List', 'Insert Data', 'New Ingredient Created', 'John Doe', '2025-04-16 18:09:53'),
(807, 'Ingredient List', 'Insert Data', 'New Ingredient Created', 'John Doe', '2025-04-16 18:18:00'),
(808, 'Ingredient List', 'Insert Data', 'New Ingredient Created', 'John Doe', '2025-04-16 18:45:34'),
(809, 'Ingredient List', 'Insert Data', 'New Ingredient Created', 'John Doe', '2025-04-16 18:48:55'),
(810, 'Ingredient List', 'Insert Data', 'New Ingredient Created', 'John Doe', '2025-04-16 18:50:46'),
(811, 'Ingredient List', 'Insert Data', 'New Ingredient Created', 'John Doe', '2025-04-16 18:52:38'),
(812, 'Ingredient List', 'Insert Data', 'New Ingredient Created', 'John Doe', '2025-04-16 18:54:13'),
(813, 'Ingredient List', 'Insert Data', 'New Ingredient Created', 'John Doe', '2025-04-16 18:56:08'),
(814, 'Ingredient List', 'Insert Data', 'New Ingredient Created', 'John Doe', '2025-04-16 18:57:59'),
(815, 'Ingredient List', 'Insert Data', 'New Ingredient Created', 'John Doe', '2025-04-16 19:00:00'),
(816, 'Ingredient List', 'Insert Data', 'New Ingredient Created', 'John Doe', '2025-04-16 19:01:26'),
(817, 'Ingredient List', 'Insert Data', 'New Ingredient Created', 'John Doe', '2025-04-16 19:03:09'),
(818, 'Ingredient List', 'Insert Data', 'New Ingredient Created', 'John Doe', '2025-04-16 19:05:08'),
(819, 'Ingredient List', 'Update Data', 'Ingredient Updated', 'John Doe', '2025-04-16 19:05:45'),
(820, 'Ingredient List', 'Insert Data', 'New Ingredient Created', 'John Doe', '2025-04-16 19:59:55'),
(821, 'Ingredient List', 'Insert Data', 'New Ingredient Created', 'John Doe', '2025-04-16 20:01:10'),
(822, 'Add Purchase', 'Insert Data', 'Item Purchase Created', 'John Doe', '2025-04-16 22:23:12'),
(823, 'Ingredient List', 'Update Data', 'Ingredient Updated', 'John Doe', '2025-04-16 22:44:31'),
(824, 'Ingredient List', 'Update Data', 'Ingredient Updated', 'John Doe', '2025-04-16 22:45:08'),
(825, 'Ingredient List', 'Update Data', 'Ingredient Updated', 'John Doe', '2025-04-16 22:48:16'),
(826, 'Ingredient List', 'Update Data', 'Ingredient Updated', 'John Doe', '2025-04-16 22:48:33'),
(827, 'Ingredient List', 'Update Data', 'Ingredient Updated', 'John Doe', '2025-04-16 22:49:32'),
(828, 'Ingredient List', 'Insert Data', 'New Ingredient Created', 'John Doe', '2025-04-22 16:28:34'),
(829, 'Ingredient List', 'Insert Data', 'New Ingredient Created', 'John Doe', '2025-04-22 16:30:17'),
(830, 'Ingredient List', 'Insert Data', 'New Ingredient Created', 'John Doe', '2025-04-22 16:31:24'),
(831, 'Ingredient List', 'Update Data', 'Ingredient Updated', 'John Doe', '2025-04-22 16:31:37'),
(832, 'Ingredient List', 'Insert Data', 'New Ingredient Created', 'John Doe', '2025-04-22 16:33:42'),
(833, 'Ingredient List', 'Insert Data', 'New Ingredient Created', 'John Doe', '2025-04-22 16:35:46'),
(834, 'Ingredient List', 'Update Data', 'Ingredient Updated', 'John Doe', '2025-04-22 16:37:19'),
(835, 'Ingredient List', 'Update Data', 'Ingredient Updated', 'John Doe', '2025-04-22 16:37:38'),
(836, 'Ingredient List', 'Update Data', 'Ingredient Updated', 'John Doe', '2025-04-22 16:37:56'),
(837, 'Ingredient List', 'Update Data', 'Ingredient Updated', 'John Doe', '2025-04-22 16:38:07'),
(838, 'Ingredient List', 'Update Data', 'Ingredient Updated', 'John Doe', '2025-04-22 16:38:18'),
(839, 'Ingredient List', 'Update Data', 'Ingredient Updated', 'John Doe', '2025-04-22 16:38:28'),
(840, 'Ingredient List', 'Update Data', 'Ingredient Updated', 'John Doe', '2025-04-22 16:38:51'),
(841, 'Ingredient List', 'Update Data', 'Ingredient Updated', 'John Doe', '2025-04-22 16:39:01'),
(842, 'Ingredient List', 'Update Data', 'Ingredient Updated', 'John Doe', '2025-04-22 16:39:12'),
(843, 'Ingredient List', 'Update Data', 'Ingredient Updated', 'John Doe', '2025-04-22 16:39:23'),
(844, 'Ingredient List', 'Update Data', 'Ingredient Updated', 'John Doe', '2025-04-22 16:39:35'),
(845, 'Ingredient List', 'Update Data', 'Ingredient Updated', 'John Doe', '2025-04-22 16:39:46'),
(846, 'Ingredient List', 'Update Data', 'Ingredient Updated', 'John Doe', '2025-04-22 16:40:03'),
(847, 'Ingredient List', 'Update Data', 'Ingredient Updated', 'John Doe', '2025-04-22 16:40:16'),
(848, 'Ingredient List', 'Update Data', 'Ingredient Updated', 'John Doe', '2025-04-22 16:40:32'),
(849, 'Ingredient List', 'Update Data', 'Ingredient Updated', 'John Doe', '2025-04-22 16:40:45'),
(850, 'Ingredient List', 'Update Data', 'Ingredient Updated', 'John Doe', '2025-04-22 16:40:57'),
(851, 'Ingredient List', 'Insert Data', 'New Ingredient Created', 'John Doe', '2025-04-22 16:42:57'),
(852, 'Ingredient List', 'Update Data', 'Ingredient Updated', 'John Doe', '2025-04-22 16:43:10'),
(853, 'Ingredient List', 'Insert Data', 'New Ingredient Created', 'John Doe', '2025-04-22 16:44:43'),
(854, 'Ingredient List', 'Insert Data', 'New Ingredient Created', 'John Doe', '2025-04-22 16:46:35'),
(855, 'Ingredient List', 'Insert Data', 'New Ingredient Created', 'John Doe', '2025-04-22 17:16:39'),
(856, 'Ingredient List', 'Insert Data', 'New Ingredient Created', 'John Doe', '2025-04-22 17:18:30'),
(857, 'Ingredient List', 'Insert Data', 'New Ingredient Created', 'John Doe', '2025-04-22 17:39:30'),
(858, 'Ingredient List', 'Update Data', 'Ingredient Updated', 'John Doe', '2025-04-22 17:40:11'),
(859, 'Ingredient List', 'Update Data', 'Ingredient Updated', 'John Doe', '2025-04-22 17:40:24'),
(860, 'Ingredient List', 'Insert Data', 'New Ingredient Created', 'John Doe', '2025-04-22 17:41:20'),
(861, 'Ingredient List', 'Insert Data', 'New Ingredient Created', 'John Doe', '2025-04-22 17:42:33'),
(862, 'Ingredient List', 'Insert Data', 'New Ingredient Created', 'John Doe', '2025-04-22 17:43:17'),
(863, 'Ingredient List', 'Insert Data', 'New Ingredient Created', 'John Doe', '2025-04-22 17:44:09'),
(864, 'Ingredient List', 'Insert Data', 'New Ingredient Created', 'John Doe', '2025-04-22 17:45:39'),
(865, 'Ingredient List', 'Insert Data', 'New Ingredient Created', 'John Doe', '2025-04-22 18:00:39'),
(866, 'Ingredient List', 'Insert Data', 'New Ingredient Created', 'John Doe', '2025-04-22 18:00:46'),
(867, 'Ingredient List', 'Insert Data', 'New Ingredient Created', 'John Doe', '2025-04-22 18:00:53'),
(868, 'Ingredient List', 'Insert Data', 'New Ingredient Created', 'John Doe', '2025-04-22 18:00:58'),
(869, 'Ingredient List', 'Insert Data', 'New Ingredient Created', 'John Doe', '2025-04-22 18:01:05'),
(870, 'Ingredient List', 'Insert Data', 'New Ingredient Created', 'John Doe', '2025-04-22 19:26:27'),
(871, 'Ingredient List', 'Insert Data', 'New Ingredient Created', 'John Doe', '2025-04-22 19:29:25'),
(872, 'Ingredient List', 'Insert Data', 'New Ingredient Created', 'John Doe', '2025-04-22 19:30:28'),
(873, 'Ingredient List', 'Insert Data', 'New Ingredient Created', 'John Doe', '2025-04-22 19:32:39'),
(874, 'Ingredient List', 'Update Data', 'Ingredient Updated', 'John Doe', '2025-04-22 19:33:07'),
(875, 'Ingredient List', 'Insert Data', 'New Ingredient Created', 'John Doe', '2025-04-22 19:35:46'),
(876, 'Ingredient List', 'Insert Data', 'New Ingredient Created', 'John Doe', '2025-04-22 19:45:34'),
(877, 'Ingredient List', 'Insert Data', 'New Ingredient Created', 'John Doe', '2025-04-22 19:45:37'),
(878, 'Ingredient List', 'Insert Data', 'New Ingredient Created', 'John Doe', '2025-04-22 19:45:40'),
(879, 'Ingredient List', 'Insert Data', 'New Ingredient Created', 'John Doe', '2025-04-22 19:45:44'),
(880, 'Ingredient List', 'Insert Data', 'New Ingredient Created', 'John Doe', '2025-04-22 19:45:47'),
(881, 'Ingredient List', 'Insert Data', 'New Ingredient Created', 'John Doe', '2025-04-22 19:45:51'),
(882, 'Ingredient List', 'Insert Data', 'New Ingredient Created', 'John Doe', '2025-04-22 20:04:11'),
(883, 'Ingredient List', 'Insert Data', 'New Ingredient Created', 'John Doe', '2025-04-22 20:04:14'),
(884, 'Ingredient List', 'Insert Data', 'New Ingredient Created', 'John Doe', '2025-04-22 20:04:16'),
(885, 'Ingredient List', 'Insert Data', 'New Ingredient Created', 'John Doe', '2025-04-22 20:04:29'),
(886, 'Ingredient List', 'Insert Data', 'New Ingredient Created', 'John Doe', '2025-04-22 20:04:34'),
(887, 'Ingredient List', 'Insert Data', 'New Ingredient Created', 'John Doe', '2025-04-22 20:04:37'),
(888, 'Ingredient List', 'Insert Data', 'New Ingredient Created', 'John Doe', '2025-04-22 20:04:40'),
(889, 'Ingredient List', 'Insert Data', 'New Ingredient Created', 'John Doe', '2025-04-22 20:04:43'),
(890, 'Ingredient List', 'Insert Data', 'New Ingredient Created', 'John Doe', '2025-04-22 20:04:46'),
(891, 'Ingredient List', 'Insert Data', 'New Ingredient Created', 'John Doe', '2025-04-22 20:04:49'),
(892, 'Ingredient List', 'Insert Data', 'New Ingredient Created', 'John Doe', '2025-04-22 20:24:39'),
(893, 'Ingredient List', 'Insert Data', 'New Ingredient Created', 'John Doe', '2025-04-22 20:24:57'),
(894, 'Ingredient List', 'Insert Data', 'New Ingredient Created', 'John Doe', '2025-04-22 20:25:03'),
(895, 'Ingredient List', 'Insert Data', 'New Ingredient Created', 'John Doe', '2025-04-22 20:25:08'),
(896, 'Ingredient List', 'Insert Data', 'New Ingredient Created', 'John Doe', '2025-04-22 20:25:15'),
(897, 'Ingredient List', 'Insert Data', 'New Ingredient Created', 'John Doe', '2025-04-22 20:25:31'),
(898, 'Ingredient List', 'Insert Data', 'New Ingredient Created', 'John Doe', '2025-04-22 20:25:40'),
(899, 'Ingredient List', 'Insert Data', 'New Ingredient Created', 'John Doe', '2025-04-22 20:25:42'),
(900, 'Ingredient List', 'Insert Data', 'New Ingredient Created', 'John Doe', '2025-04-22 20:25:58'),
(901, 'Ingredient List', 'Insert Data', 'New Ingredient Created', 'John Doe', '2025-04-22 20:26:14'),
(902, 'Ingredient List', 'Insert Data', 'New Ingredient Created', 'John Doe', '2025-04-22 20:26:37'),
(903, 'Ingredient List', 'Insert Data', 'New Ingredient Created', 'John Doe', '2025-04-22 20:27:22'),
(904, 'Ingredient List', 'Insert Data', 'New Ingredient Created', 'John Doe', '2025-04-22 20:33:22'),
(905, 'Ingredient List', 'Insert Data', 'New Ingredient Created', 'John Doe', '2025-04-22 20:41:11'),
(906, 'Ingredient List', 'Insert Data', 'New Ingredient Created', 'John Doe', '2025-04-22 20:41:15'),
(907, 'Ingredient List', 'Insert Data', 'New Ingredient Created', 'John Doe', '2025-04-22 20:41:19'),
(908, 'Ingredient List', 'Insert Data', 'New Ingredient Created', 'John Doe', '2025-04-22 20:41:24'),
(909, 'Ingredient List', 'Insert Data', 'New Ingredient Created', 'John Doe', '2025-04-22 20:41:28'),
(910, 'Ingredient List', 'Insert Data', 'New Ingredient Created', 'John Doe', '2025-04-22 20:41:33'),
(911, 'Ingredient List', 'Insert Data', 'New Ingredient Created', 'John Doe', '2025-04-22 20:57:38'),
(912, 'Ingredient List', 'Insert Data', 'New Ingredient Created', 'John Doe', '2025-04-22 20:57:40'),
(913, 'Ingredient List', 'Insert Data', 'New Ingredient Created', 'John Doe', '2025-04-22 20:57:45'),
(914, 'Ingredient List', 'Insert Data', 'New Ingredient Created', 'John Doe', '2025-04-22 20:57:49'),
(915, 'Ingredient List', 'Insert Data', 'New Ingredient Created', 'John Doe', '2025-04-22 20:57:53'),
(916, 'Ingredient List', 'Insert Data', 'New Ingredient Created', 'John Doe', '2025-04-22 20:57:56'),
(917, 'Ingredient List', 'Insert Data', 'New Ingredient Created', 'John Doe', '2025-04-22 20:58:00'),
(918, 'Ingredient List', 'Insert Data', 'New Ingredient Created', 'John Doe', '2025-04-22 20:58:05'),
(919, 'Ingredient List', 'Insert Data', 'New Ingredient Created', 'John Doe', '2025-04-22 20:58:08'),
(920, 'Ingredient List', 'Insert Data', 'New Ingredient Created', 'John Doe', '2025-04-22 20:58:11'),
(921, 'Ingredient List', 'Insert Data', 'New Ingredient Created', 'John Doe', '2025-04-22 20:58:15'),
(922, 'Ingredient List', 'Insert Data', 'New Ingredient Created', 'John Doe', '2025-04-22 20:58:21'),
(923, 'Ingredient List', 'Insert Data', 'New Ingredient Created', 'John Doe', '2025-04-22 21:23:24'),
(924, 'Ingredient List', 'Insert Data', 'New Ingredient Created', 'John Doe', '2025-04-22 21:23:29'),
(925, 'Ingredient List', 'Insert Data', 'New Ingredient Created', 'John Doe', '2025-04-22 21:23:34'),
(926, 'Ingredient List', 'Insert Data', 'New Ingredient Created', 'John Doe', '2025-04-22 21:23:40'),
(927, 'Ingredient List', 'Insert Data', 'New Ingredient Created', 'John Doe', '2025-04-22 21:23:47'),
(928, 'Ingredient List', 'Insert Data', 'New Ingredient Created', 'John Doe', '2025-04-22 21:23:52'),
(929, 'Ingredient List', 'Insert Data', 'New Ingredient Created', 'John Doe', '2025-04-22 21:23:57'),
(930, 'Ingredient List', 'Insert Data', 'New Ingredient Created', 'John Doe', '2025-04-22 21:24:04'),
(931, 'Ingredient List', 'Insert Data', 'New Ingredient Created', 'John Doe', '2025-04-22 21:25:32'),
(932, 'Ingredient List', 'Insert Data', 'New Ingredient Created', 'John Doe', '2025-04-22 21:25:38'),
(933, 'Ingredient List', 'Insert Data', 'New Ingredient Created', 'John Doe', '2025-04-22 21:25:44'),
(934, 'Food List', 'Update Data', 'Food Updated', 'John Doe', '2025-04-23 19:29:37'),
(935, 'Food List', 'Update Data', 'Food Updated', 'John Doe', '2025-04-23 19:31:28'),
(936, 'Food List', 'Update Data', 'Food Updated', 'John Doe', '2025-04-23 22:36:03'),
(937, 'Add Food', 'Insert Data', 'New Food Added', 'John Doe', '2025-04-29 18:08:12'),
(938, 'Kitchen List', 'Delete Data', 'Kitchen Deleted', 'John Doe', '2025-04-30 14:55:57'),
(939, 'Kitchen List', 'Delete Data', 'Kitchen Deleted', 'John Doe', '2025-04-30 14:56:05'),
(940, 'Kitchen List', 'Delete Data', 'Kitchen Deleted', 'John Doe', '2025-04-30 14:56:13'),
(941, 'Kitchen List', 'Delete Data', 'Kitchen Deleted', 'John Doe', '2025-04-30 14:56:20'),
(942, 'Kitchen List', 'Delete Data', 'Kitchen Deleted', 'John Doe', '2025-04-30 14:56:27'),
(943, 'Kitchen List', 'Delete Data', 'Kitchen Deleted', 'John Doe', '2025-04-30 14:56:34'),
(944, 'Add Purchase', 'Insert Data', 'Item Purchase Created', 'John Doe', '2025-04-30 15:09:05'),
(945, 'Varient List', 'Insert Data', 'New Varient Created', 'John Doe', '2025-04-30 17:52:00'),
(946, 'Add Food', 'Insert Data', 'New Food Added', 'John Doe', '2025-05-01 15:58:54'),
(947, 'Varient List', 'Insert Data', 'New Varient Created', 'John Doe', '2025-05-01 16:11:39'),
(948, 'Food List', 'Update Data', 'Food Updated', 'John Doe', '2025-05-02 15:43:07'),
(949, 'Ingredient List', 'Insert Data', 'New Ingredient Created', 'John Doe', '2025-05-05 14:46:44'),
(950, 'Food List', 'Update Data', 'Food Updated', 'John Doe', '2025-05-05 14:50:29'),
(951, 'Add New Order', 'Insert Data', 'Item New Order Created', 'John Doe', '2025-05-05 14:51:06'),
(952, 'Pending Order', 'Insert Data', 'Pending Order is Update', 'John Doe', '2025-05-05 14:53:02'),
(953, 'Add New Order', 'Insert Data', 'Item New Order Created', 'John Doe', '2025-05-05 15:09:11'),
(954, 'Add New Order', 'Insert Data', 'Item New Order Created', 'John Doe', '2025-05-05 15:12:11'),
(955, 'Add New Order', 'Insert Data', 'Item New Order Created', 'John Doe', '2025-05-05 15:37:50'),
(956, 'Order List', 'Insert Data', 'Order is Update', 'John Doe', '2025-05-05 15:38:19'),
(957, 'Add New Order', 'Insert Data', 'Item New Order Created', 'John Doe', '2025-05-05 16:46:27'),
(958, 'Order List', 'Insert Data', 'Order is Update', 'John Doe', '2025-05-05 16:47:46'),
(959, 'Add New Order', 'Insert Data', 'Item New Order Created', 'John Doe', '2025-05-05 16:56:33'),
(960, 'Order List', 'Insert Data', 'Order is Update', 'John Doe', '2025-05-05 16:59:35'),
(961, 'Add New Order', 'Insert Data', 'Item New Order Created', 'John Doe', '2025-05-05 17:01:43'),
(962, 'Order List', 'Insert Data', 'Order is Update', 'John Doe', '2025-05-05 17:02:34'),
(963, 'Add New Order', 'Insert Data', 'Item New Order Created', 'John Doe', '2025-05-05 17:15:39'),
(964, 'Food List', 'Update Data', 'Food Updated', 'John Doe', '2025-05-05 19:51:01'),
(965, 'Food List', 'Update Data', 'Food Updated', 'John Doe', '2025-05-05 19:54:09'),
(966, 'Food List', 'Update Data', 'Food Updated', 'John Doe', '2025-05-05 19:56:09'),
(967, 'Food List', 'Update Data', 'Food Updated', 'John Doe', '2025-05-05 20:01:17'),
(968, 'Food List', 'Update Data', 'Food Updated', 'John Doe', '2025-05-05 20:24:24'),
(969, 'Add Purchase', 'Insert Data', 'Item Purchase Created', 'John Doe', '2025-05-05 20:26:09'),
(970, 'Add New Order', 'Insert Data', 'Item New Order Created', 'John Doe', '2025-05-06 13:59:05'),
(971, 'Order List', 'Insert Data', 'Order is Update', 'John Doe', '2025-05-06 13:59:20'),
(972, 'Add New Order', 'Insert Data', 'Item New Order Created', 'John Doe', '2025-05-06 16:10:56'),
(973, 'Add New Order', 'Insert Data', 'Item New Order Created', 'John Doe', '2025-05-06 16:16:59'),
(974, 'Add New Order', 'Insert Data', 'Item New Order Created', 'John Doe', '2025-05-06 16:42:04'),
(975, 'Add New Order', 'Insert Data', 'Item New Order Created', 'John Doe', '2025-05-06 16:45:01'),
(976, 'Add New Order', 'Insert Data', 'Item New Order Created', 'John Doe', '2025-05-06 16:48:51'),
(977, 'Add New Order', 'Insert Data', 'Item New Order Created', 'John Doe', '2025-05-06 16:55:07'),
(978, 'Add New Order', 'Insert Data', 'Item New Order Created', 'John Doe', '2025-05-06 17:02:27'),
(979, 'Add New Order', 'Insert Data', 'Item New Order Created', 'John Doe', '2025-05-06 17:23:27'),
(980, 'Add New Order', 'Insert Data', 'Item New Order Created', 'John Doe', '2025-05-06 17:30:47'),
(981, 'Reservation List', 'Update Data', 'Reservation Updated', 'John Doe', '2025-05-08 21:43:55'),
(982, 'Reservation List', 'Update Data', 'Reservation Updated', 'John Doe', '2025-05-08 21:45:22'),
(983, 'Reservation List', 'Update Data', 'Reservation Updated', 'John Doe', '2025-05-08 21:48:00'),
(984, 'Add Purchase', 'Insert Data', 'Item Purchase Created', 'John Doe', '2025-05-09 15:02:06'),
(985, 'Add Purchase', 'Insert Data', 'Item Purchase Created', 'John Doe', '2025-05-09 15:05:47'),
(986, 'Add Purchase', 'Insert Data', 'Item Purchase Created', 'John Doe', '2025-05-09 15:40:03'),
(987, 'Add Purchase', 'Insert Data', 'Item Purchase Created', 'John Doe', '2025-05-09 15:54:26'),
(988, 'Add Purchase', 'Insert Data', 'Item Purchase Created', 'John Doe', '2025-05-09 15:56:56'),
(989, 'Add Purchase', 'Insert Data', 'Item Purchase Created', 'John Doe', '2025-05-09 16:00:08'),
(990, 'Add Purchase', 'Insert Data', 'Item Purchase Created', 'John Doe', '2025-05-09 16:22:43'),
(991, 'Add Purchase', 'Insert Data', 'Item Purchase Created', 'John Doe', '2025-05-09 16:29:46'),
(992, 'Supplier List', 'Insert Data', 'New Supplier Created', 'John Doe', '2025-05-09 20:52:32'),
(993, 'Add Purchase', 'Insert Data', 'Item Purchase Created', 'John Doe', '2025-05-09 20:53:26'),
(994, 'Add New Order', 'Insert Data', 'Item New Order Created', 'John Doe', '2025-05-12 15:54:08'),
(995, 'Order List', 'Insert Data', 'Order is Update', 'John Doe', '2025-05-12 15:54:15'),
(996, 'Ingredient List', 'Insert Data', 'New Ingredient Created', 'John Doe', '2025-05-12 15:57:07'),
(997, 'Ingredient List', 'Insert Data', 'New Ingredient Created', 'John Doe', '2025-05-12 16:41:55'),
(998, 'Add Purchase', 'Insert Data', 'Item Purchase Created', 'John Doe', '2025-05-14 15:23:07'),
(999, 'Add Purchase', 'Insert Data', 'Item Purchase Created', 'John Doe', '2025-05-14 15:45:19'),
(1000, 'Add Purchase', 'Insert Data', 'Item Purchase Created', 'John Doe', '2025-05-14 15:47:50'),
(1001, 'Food List', 'Update Data', 'Food Updated', 'John Doe', '2025-05-14 21:31:19'),
(1002, 'Food List', 'Update Data', 'Food Updated', 'John Doe', '2025-05-14 21:32:33'),
(1003, 'Food List', 'Update Data', 'Food Updated', 'John Doe', '2025-05-14 22:40:45'),
(1004, 'Food List', 'Update Data', 'Food Updated', 'John Doe', '2025-05-14 22:46:19'),
(1005, 'Food List', 'Update Data', 'Food Updated', 'John Doe', '2025-05-15 14:58:09'),
(1006, 'Food List', 'Update Data', 'Food Updated', 'John Doe', '2025-05-15 14:58:33'),
(1007, 'Food List', 'Update Data', 'Food Updated', 'John Doe', '2025-05-15 20:23:56'),
(1008, 'Food List', 'Update Data', 'Food Updated', 'John Doe', '2025-05-15 20:48:37'),
(1009, 'Food List', 'Update Data', 'Food Updated', 'John Doe', '2025-05-15 21:11:07'),
(1010, 'Food List', 'Update Data', 'Food Updated', 'John Doe', '2025-05-15 21:11:34'),
(1011, 'Food List', 'Update Data', 'Food Updated', 'John Doe', '2025-05-15 21:13:38'),
(1012, 'Food List', 'Update Data', 'Food Updated', 'John Doe', '2025-05-15 21:54:57'),
(1013, 'Food List', 'Update Data', 'Food Updated', 'John Doe', '2025-05-15 22:36:14'),
(1014, 'Food List', 'Update Data', 'Food Updated', 'John Doe', '2025-05-16 16:11:52'),
(1015, 'Food List', 'Update Data', 'Food Updated', 'John Doe', '2025-05-16 19:42:36'),
(1016, 'Food List', 'Update Data', 'Food Updated', 'John Doe', '2025-05-16 19:43:05'),
(1017, 'Food List', 'Update Data', 'Food Updated', 'John Doe', '2025-05-16 19:56:53'),
(1018, 'Food List', 'Update Data', 'Food Updated', 'John Doe', '2025-05-16 19:57:37'),
(1019, 'Food List', 'Update Data', 'Food Updated', 'John Doe', '2025-05-16 20:00:28'),
(1020, 'Food List', 'Update Data', 'Food Updated', 'John Doe', '2025-05-16 20:03:36'),
(1021, 'Food List', 'Update Data', 'Food Updated', 'John Doe', '2025-05-16 20:03:52'),
(1022, 'Food List', 'Update Data', 'Food Updated', 'John Doe', '2025-05-16 20:08:00'),
(1023, 'Food List', 'Update Data', 'Food Updated', 'John Doe', '2025-05-16 20:08:17'),
(1024, 'Food List', 'Update Data', 'Food Updated', 'John Doe', '2025-05-16 20:11:55'),
(1025, 'Food List', 'Update Data', 'Food Updated', 'John Doe', '2025-05-16 20:26:02'),
(1026, 'Food List', 'Update Data', 'Food Updated', 'John Doe', '2025-05-16 20:26:16'),
(1027, 'Food List', 'Update Data', 'Food Updated', 'John Doe', '2025-05-16 20:26:54'),
(1028, 'Food List', 'Update Data', 'Food Updated', 'John Doe', '2025-05-16 20:33:18'),
(1029, 'Food List', 'Update Data', 'Food Updated', 'John Doe', '2025-05-16 20:33:29'),
(1030, 'Food List', 'Update Data', 'Food Updated', 'John Doe', '2025-05-16 20:33:39'),
(1031, 'Food List', 'Update Data', 'Food Updated', 'John Doe', '2025-05-16 20:34:03'),
(1032, 'Food List', 'Update Data', 'Food Updated', 'John Doe', '2025-05-16 20:34:37'),
(1033, 'Food List', 'Update Data', 'Food Updated', 'John Doe', '2025-05-16 20:35:12'),
(1034, 'Food List', 'Update Data', 'Food Updated', 'John Doe', '2025-05-16 20:35:43'),
(1035, 'Food List', 'Update Data', 'Food Updated', 'John Doe', '2025-05-16 20:35:53'),
(1036, 'Food List', 'Update Data', 'Food Updated', 'John Doe', '2025-05-16 20:36:02'),
(1037, 'Food List', 'Update Data', 'Food Updated', 'John Doe', '2025-05-16 20:36:13'),
(1038, 'Add Purchase', 'Insert Data', 'Item Purchase Created', 'John Doe', '2025-05-16 20:37:11'),
(1039, 'Food List', 'Update Data', 'Food Updated', 'John Doe', '2025-05-16 21:01:16'),
(1040, 'Add Purchase', 'Insert Data', 'Item Purchase Created', 'John Doe', '2025-05-19 21:31:06'),
(1041, 'Add Purchase', 'Insert Data', 'Item Purchase Created', 'John Doe', '2025-05-20 14:43:43'),
(1042, 'Add Purchase', 'Insert Data', 'Item Purchase Created', 'John Doe', '2025-05-20 14:45:06'),
(1043, 'Add Purchase', 'Insert Data', 'Item Purchase Created', 'John Doe', '2025-05-20 14:46:41'),
(1044, 'Add Purchase', 'Insert Data', 'Item Purchase Created', 'John Doe', '2025-05-20 15:22:52'),
(1045, 'Add Purchase', 'Insert Data', 'Item Purchase Created', 'John Doe', '2025-05-20 15:24:22'),
(1046, 'Add Purchase', 'Insert Data', 'Item Purchase Created', 'John Doe', '2025-05-20 15:25:58'),
(1047, 'Add Purchase', 'Insert Data', 'Item Purchase Created', 'John Doe', '2025-05-20 15:43:14'),
(1048, 'Add New Order', 'Insert Data', 'Item New Order Created', 'John Doe', '2025-05-20 15:49:04'),
(1049, 'Order List', 'Insert Data', 'Order is Update', 'John Doe', '2025-05-20 15:49:18'),
(1050, 'Add Purchase', 'Insert Data', 'Item Purchase Created', 'John Doe', '2025-05-20 15:57:09'),
(1051, 'Ingredient List', 'Insert Data', 'New Ingredient Created', 'John Doe', '2025-05-20 17:28:33'),
(1052, 'Add New Order', 'Insert Data', 'Item New Order Created', 'John Doe', '2025-05-20 17:51:44'),
(1053, 'Order List', 'Insert Data', 'Order is Update', 'John Doe', '2025-05-20 19:09:32'),
(1054, 'Order List', 'Insert Data', 'Order is Update', 'John Doe', '2025-05-20 19:13:11'),
(1055, 'Add Purchase', 'Insert Data', 'Item Purchase Created', 'John Doe', '2025-05-20 19:18:01'),
(1056, 'Add New Order', 'Insert Data', 'Item New Order Created', 'John Doe', '2025-05-20 19:19:10'),
(1057, 'Order List', 'Insert Data', 'Order is Update', 'John Doe', '2025-05-20 19:19:41'),
(1058, 'Add New Order', 'Insert Data', 'Item New Order Created', 'John Doe', '2025-05-20 19:22:13'),
(1059, 'Order List', 'Insert Data', 'Order is Update', 'John Doe', '2025-05-20 19:22:32'),
(1060, 'Ingredient List', 'Insert Data', 'New Ingredient Created', 'John Doe', '2025-05-20 21:08:58'),
(1061, 'Add Purchase', 'Insert Data', 'Item Purchase Created', 'John Doe', '2025-05-20 21:10:55'),
(1062, 'Add Purchase', 'Insert Data', 'Item Purchase Created', 'John Doe', '2025-05-20 21:12:19'),
(1063, 'Ingredient List', 'Insert Data', 'New Ingredient Created', 'John Doe', '2025-05-20 21:16:40'),
(1064, 'Add Purchase', 'Insert Data', 'Item Purchase Created', 'John Doe', '2025-05-20 21:22:06'),
(1065, 'Add New Order', 'Insert Data', 'Item New Order Created', 'John Doe', '2025-05-20 21:22:35'),
(1066, 'Order List', 'Insert Data', 'Order is Update', 'John Doe', '2025-05-20 21:22:47'),
(1067, 'Add New Order', 'Insert Data', 'Item New Order Created', 'John Doe', '2025-05-20 21:26:35'),
(1068, 'Order List', 'Insert Data', 'Order is Update', 'John Doe', '2025-05-20 21:26:47'),
(1069, 'Add New Order', 'Insert Data', 'Item New Order Created', 'John Doe', '2025-05-22 20:49:00'),
(1070, 'Add New Order', 'Insert Data', 'Item New Order Created', 'John Doe', '2025-05-22 20:53:19'),
(1071, 'Add New Order', 'Insert Data', 'Item New Order Created', 'John Doe', '2025-05-22 20:59:08'),
(1072, 'Order List', 'Insert Data', 'Order is Update', 'John Doe', '2025-05-22 20:59:50'),
(1073, 'Order List', 'Insert Data', 'Order is Update', 'John Doe', '2025-05-22 20:59:56'),
(1074, 'Order List', 'Insert Data', 'Order is Update', 'John Doe', '2025-05-22 21:00:03'),
(1075, 'Add New Order', 'Insert Data', 'Item New Order Created', 'John Doe', '2025-05-22 21:06:03'),
(1076, 'Order List', 'Insert Data', 'Order is Update', 'John Doe', '2025-05-22 21:06:41'),
(1077, 'Add New Order', 'Insert Data', 'Item New Order Created', 'John Doe', '2025-05-22 21:19:46'),
(1078, 'Add New Order', 'Insert Data', 'Item New Order Created', 'John Doe', '2025-05-22 21:21:35'),
(1079, 'Add New Order', 'Insert Data', 'Item New Order Created', 'John Doe', '2025-05-22 21:24:01'),
(1080, 'Order List', 'Insert Data', 'Order is Update', 'John Doe', '2025-05-22 21:24:34'),
(1081, 'Order List', 'Insert Data', 'Order is Update', 'John Doe', '2025-05-22 21:24:39'),
(1082, 'Order List', 'Insert Data', 'Order is Update', 'John Doe', '2025-05-22 21:24:45'),
(1083, 'Add New Order', 'Insert Data', 'Item New Order Created', 'John Doe', '2025-05-22 21:25:13'),
(1084, 'Order List', 'Insert Data', 'Order is Update', 'John Doe', '2025-05-22 21:38:04'),
(1085, 'Add New Order', 'Insert Data', 'Item New Order Created', 'John Doe', '2025-05-22 21:39:09'),
(1086, 'Add New Order', 'Insert Data', 'Item New Order Created', 'John Doe', '2025-05-22 21:39:58'),
(1087, 'Order List', 'Insert Data', 'Order is Update', 'John Doe', '2025-05-22 21:43:10'),
(1088, 'Order List', 'Insert Data', 'Order is Update', 'John Doe', '2025-05-22 21:43:16'),
(1089, 'Add New Order', 'Insert Data', 'Item New Order Created', 'John Doe', '2025-05-22 21:44:48'),
(1090, 'Add New Order', 'Insert Data', 'Item New Order Created', 'John Doe', '2025-05-22 21:57:29'),
(1091, 'Order List', 'Insert Data', 'Order is Update', 'John Doe', '2025-05-22 22:01:14'),
(1092, 'Order List', 'Insert Data', 'Order is Update', 'John Doe', '2025-05-22 22:01:21'),
(1093, 'Add New Order', 'Insert Data', 'Item New Order Created', 'John Doe', '2025-05-22 22:01:40'),
(1094, 'Add New Order', 'Insert Data', 'Item New Order Created', 'John Doe', '2025-05-22 22:04:01'),
(1095, 'Add New Order', 'Insert Data', 'Item New Order Created', 'John Doe', '2025-05-22 22:20:58'),
(1096, 'Add New Order', 'Insert Data', 'Item New Order Created', 'John Doe', '2025-05-22 22:50:23'),
(1097, 'Order List', 'Insert Data', 'Order is Update', 'John Doe', '2025-05-22 22:50:54'),
(1098, 'Food List', 'Update Data', 'Food Updated', 'John Doe', '2025-05-23 14:29:42'),
(1099, 'Food List', 'Update Data', 'Food Updated', 'John Doe', '2025-05-23 14:38:19'),
(1100, 'Add New Order', 'Insert Data', 'Item New Order Created', 'John Doe', '2025-05-23 14:39:52'),
(1101, 'Food List', 'Update Data', 'Food Updated', 'John Doe', '2025-05-23 14:53:53'),
(1102, 'Food List', 'Delete Data', 'Food Deleted', 'John Doe', '2025-05-23 15:03:08'),
(1103, 'Food List', 'Delete Data', 'Food Deleted', 'John Doe', '2025-05-23 15:12:02'),
(1104, 'Add New Order', 'Insert Data', 'Item New Order Created', 'John Doe', '2025-05-23 15:34:49'),
(1105, 'Order List', 'Insert Data', 'Order is Update', 'John Doe', '2025-05-23 15:35:22'),
(1106, 'Add New Order', 'Insert Data', 'Item New Order Created', 'John Doe', '2025-05-23 15:51:50'),
(1107, 'Add New Order', 'Insert Data', 'Item New Order Created', 'John Doe', '2025-05-23 19:14:46'),
(1108, 'Order List', 'Insert Data', 'Order is Update', 'John Doe', '2025-05-23 19:15:52'),
(1109, 'Order List', 'Insert Data', 'Order is Update', 'John Doe', '2025-05-23 19:16:03'),
(1110, 'Order List', 'Insert Data', 'Order is Update', 'John Doe', '2025-05-23 19:16:14'),
(1111, 'Add New Order', 'Insert Data', 'Item New Order Created', 'John Doe', '2025-05-23 19:17:32'),
(1112, 'Order List', 'Insert Data', 'Order is Update', 'John Doe', '2025-05-23 19:17:38'),
(1113, 'Order List', 'Insert Data', 'Order is Update', 'John Doe', '2025-05-23 19:18:17'),
(1114, 'Add New Order', 'Insert Data', 'Item New Order Created', 'John Doe', '2025-05-23 19:19:08'),
(1115, 'Order List', 'Insert Data', 'Order is Update', 'John Doe', '2025-05-23 19:19:51'),
(1116, 'Order List', 'Insert Data', 'Order is Update', 'John Doe', '2025-05-23 19:20:25'),
(1117, 'Food List', 'Update Data', 'Food Updated', 'John Doe', '2025-05-23 21:26:50'),
(1118, 'Food List', 'Update Data', 'Food Updated', 'John Doe', '2025-05-23 22:54:27'),
(1119, 'Food List', 'Update Data', 'Food Updated', 'John Doe', '2025-05-26 14:14:06'),
(1120, 'Food List', 'Update Data', 'Food Updated', 'John Doe', '2025-05-26 14:14:21'),
(1121, 'Food List', 'Update Data', 'Food Updated', 'John Doe', '2025-05-26 16:07:39'),
(1122, 'Food List', 'Update Data', 'Food Updated', 'John Doe', '2025-05-26 16:21:22'),
(1123, 'Food List', 'Update Data', 'Food Updated', 'John Doe', '2025-05-26 16:26:09'),
(1124, 'Food List', 'Update Data', 'Food Updated', 'John Doe', '2025-05-26 16:26:25'),
(1125, 'Food List', 'Update Data', 'Food Updated', 'John Doe', '2025-05-26 22:21:08'),
(1126, 'Food List', 'Update Data', 'Food Updated', 'John Doe', '2025-05-27 17:52:19'),
(1127, 'Food List', 'Update Data', 'Food Updated', 'John Doe', '2025-05-27 17:53:42'),
(1128, 'Food List', 'Update Data', 'Food Updated', 'John Doe', '2025-05-27 17:56:12'),
(1129, 'Food List', 'Update Data', 'Food Updated', 'John Doe', '2025-05-27 17:57:48'),
(1130, 'Food List', 'Update Data', 'Food Updated', 'John Doe', '2025-05-27 17:58:40'),
(1131, 'Stock Adjustment', 'Insert Data', 'Stock Adjustment Created', 'John Doe', '2025-06-02 16:11:14'),
(1132, 'Stock Adjustment', 'Insert Data', 'Stock Adjustment Created', 'John Doe', '2025-06-02 16:19:19'),
(1133, 'Stock Adjustment', 'Insert Data', 'Stock Adjustment Created', 'John Doe', '2025-06-02 16:21:00'),
(1134, 'Stock Adjustment', 'Update Data', 'Stock Adjustment Updated', 'John Doe', '2025-06-02 16:43:49'),
(1135, 'Stock Adjustment', 'Insert Data', 'Stock Adjustment Created', 'John Doe', '2025-06-02 16:45:03'),
(1136, 'Stock Adjustment', 'Insert Data', 'Stock Adjustment Created', 'John Doe', '2025-06-02 19:59:50'),
(1137, 'Stock Adjustment', 'Insert Data', 'Stock Adjustment Created', 'John Doe', '2025-06-02 20:04:57'),
(1138, 'Stock Adjustment', 'Insert Data', 'Stock Adjustment Created', 'John Doe', '2025-06-02 20:07:15'),
(1139, 'Stock Adjustment', 'Insert Data', 'Stock Adjustment Created', 'John Doe', '2025-06-02 20:13:07'),
(1140, 'Stock Adjustment', 'Insert Data', 'Stock Adjustment Created', 'John Doe', '2025-06-02 20:14:30'),
(1141, 'Stock Adjustment', 'Insert Data', 'Stock Adjustment Created', 'John Doe', '2025-06-02 20:15:45'),
(1142, 'Stock Adjustment', 'Insert Data', 'Stock Adjustment Created', 'John Doe', '2025-06-02 20:16:16'),
(1143, 'Stock Adjustment', 'Insert Data', 'Stock Adjustment Created', 'John Doe', '2025-06-02 20:29:20'),
(1144, 'Stock Adjustment', 'Insert Data', 'Stock Adjustment Created', 'John Doe', '2025-06-02 20:30:19'),
(1145, 'Stock Adjustment', 'Insert Data', 'Stock Adjustment Created', 'John Doe', '2025-06-02 20:30:44'),
(1146, 'Stock Adjustment', 'Insert Data', 'Stock Adjustment Created', 'John Doe', '2025-06-02 20:32:00'),
(1147, 'Stock Adjustment', 'Insert Data', 'Stock Adjustment Created', 'John Doe', '2025-06-02 20:32:30'),
(1148, 'Stock Adjustment', 'Insert Data', 'Stock Adjustment Created', 'John Doe', '2025-06-02 21:04:30'),
(1149, 'Stock Adjustment', 'Insert Data', 'Stock Adjustment Created', 'John Doe', '2025-06-02 21:04:58'),
(1150, 'Stock Adjustment', 'Insert Data', 'Stock Adjustment Created', 'John Doe', '2025-06-02 21:08:17'),
(1151, 'Stock Adjustment', 'Insert Data', 'Stock Adjustment Created', 'John Doe', '2025-06-02 21:56:40'),
(1152, 'Stock Adjustment', 'Insert Data', 'Stock Adjustment Created', 'John Doe', '2025-06-02 21:57:03'),
(1153, 'Stock Adjustment', 'Insert Data', 'Stock Adjustment Created', 'John Doe', '2025-06-02 22:14:30'),
(1154, 'Stock Adjustment', 'Insert Data', 'Stock Adjustment Created', 'John Doe', '2025-06-02 22:15:29'),
(1155, 'Stock Adjustment', 'Insert Data', 'Stock Adjustment Created', 'John Doe', '2025-06-02 22:15:46'),
(1156, 'Stock Adjustment', 'Insert Data', 'Stock Adjustment Created', 'John Doe', '2025-06-02 22:16:09'),
(1157, 'Add Purchase', 'Insert Data', 'Item Purchase Created', 'John Doe', '2025-06-03 17:18:25'),
(1158, 'Stock Adjustment', 'Insert Data', 'Stock Adjustment Created', 'John Doe', '2025-06-03 17:39:30'),
(1159, 'Stock Adjustment', 'Insert Data', 'Stock Adjustment Created', 'John Doe', '2025-06-03 17:42:27'),
(1160, 'Stock Adjustment', 'Insert Data', 'Stock Adjustment Created', 'John Doe', '2025-06-03 17:44:55'),
(1161, 'Add Purchase', 'Insert Data', 'Item Purchase Created', 'John Doe', '2025-06-03 18:58:37'),
(1162, 'Add New Order', 'Insert Data', 'Item New Order Created', 'John Doe', '2025-06-03 19:06:18'),
(1163, 'Order List', 'Insert Data', 'Order is Update', 'John Doe', '2025-06-03 19:06:27'),
(1164, 'Add New Order', 'Insert Data', 'Item New Order Created', 'John Doe', '2025-06-06 15:46:57'),
(1165, 'Order List', 'Insert Data', 'Order is Update', 'John Doe', '2025-06-06 15:49:03'),
(1166, 'Add New Order', 'Insert Data', 'Item New Order Created', 'John Doe', '2025-06-06 15:51:58'),
(1167, 'Order List', 'Insert Data', 'Order is Update', 'John Doe', '2025-06-06 15:52:14'),
(1168, 'Add New Order', 'Insert Data', 'Item New Order Created', 'John Doe', '2025-06-06 21:41:11'),
(1169, 'Add New Order', 'Insert Data', 'Item New Order Created', 'John Doe', '2025-06-09 18:25:13'),
(1170, 'Add New Order', 'Insert Data', 'Item New Order Created', 'John Doe', '2025-06-09 18:41:56'),
(1171, 'Order List', 'Insert Data', 'Order is Update', 'John Doe', '2025-06-09 18:42:08'),
(1172, 'Add New Order', 'Insert Data', 'Item New Order Created', 'John Doe', '2025-06-09 18:42:56'),
(1173, 'Add New Order', 'Insert Data', 'Item New Order Created', 'John Doe', '2025-06-09 18:44:35'),
(1174, 'Add New Order', 'Insert Data', 'Item New Order Created', 'John Doe', '2025-06-09 18:49:23'),
(1175, 'Add New Order', 'Insert Data', 'Item New Order Created', 'John Doe', '2025-06-09 19:05:50'),
(1176, 'Order List', 'Insert Data', 'Order is Update', 'Manik  Hassan', '2025-06-09 20:58:59'),
(1177, 'Order List', 'Insert Data', 'Order is Update', 'Manik  Hassan', '2025-06-09 20:59:05'),
(1178, 'Order List', 'Insert Data', 'Order is Update', 'Manik  Hassan', '2025-06-09 20:59:11'),
(1179, 'Order List', 'Insert Data', 'Order is Update', 'Manik  Hassan', '2025-06-09 20:59:17'),
(1180, 'Add New Order', 'Insert Data', 'Item New Order Created', 'John Doe', '2025-06-09 21:35:34'),
(1181, 'Add New Order', 'Insert Data', 'Item New Order Created', 'John Doe', '2025-06-09 22:22:08'),
(1182, 'Add New Order', 'Insert Data', 'Item New Order Created', 'John Doe', '2025-06-09 22:29:21'),
(1183, 'Order List', 'Insert Data', 'Order is Update', 'Manik  Hassan', '2025-06-09 22:30:42'),
(1184, 'Order List', 'Insert Data', 'Order is Update', 'Manik  Hassan', '2025-06-09 22:30:48'),
(1185, 'Order List', 'Insert Data', 'Order is Update', 'Manik  Hassan', '2025-06-09 22:30:53'),
(1186, 'Order List', 'Insert Data', 'Order is Update', 'Manik  Hassan', '2025-06-09 22:30:58'),
(1187, 'Add New Order', 'Insert Data', 'Item New Order Created', 'John Doe', '2025-06-09 22:31:53'),
(1188, 'Order List', 'Insert Data', 'Order is Update', 'John Doe', '2025-06-09 22:32:19'),
(1189, 'Add New Order', 'Insert Data', 'Item New Order Created', 'John Doe', '2025-06-09 22:38:17'),
(1190, 'Add New Order', 'Insert Data', 'Item New Order Created', 'John Doe', '2025-06-09 22:42:57'),
(1191, 'Add New Order', 'Insert Data', 'Item New Order Created', 'John Doe', '2025-06-09 22:43:52'),
(1192, 'Order List', 'Insert Data', 'Order is Update', 'John Doe', '2025-06-09 23:18:07'),
(1193, 'Order List', 'Insert Data', 'Order is Update', 'John Doe', '2025-06-09 23:18:17'),
(1194, 'Order List', 'Insert Data', 'Order is Update', 'John Doe', '2025-06-09 23:18:23'),
(1195, 'Add New Order', 'Insert Data', 'Item New Order Created', 'John Doe', '2025-06-10 14:02:57'),
(1196, 'Add New Order', 'Insert Data', 'Item New Order Created', 'John Doe', '2025-06-10 14:31:16'),
(1197, 'Add New Order', 'Insert Data', 'Item New Order Created', 'Shantanu Basak', '2025-06-11 18:27:43'),
(1198, 'Order List', 'Insert Data', 'Order is Update', 'Shantanu Basak', '2025-06-11 18:37:08'),
(1199, 'Order List', 'Insert Data', 'Order is Update', 'Shantanu Basak', '2025-06-11 18:37:18'),
(1200, 'Order List', 'Insert Data', 'Order is Update', 'Shantanu Basak', '2025-06-11 18:37:25'),
(1201, 'Add New Order', 'Insert Data', 'Item New Order Created', 'John Doe', '2025-06-12 14:14:51'),
(1202, 'Food List', 'Update Data', 'Food Updated', 'John Doe', '2025-06-12 14:29:43'),
(1203, 'Food List', 'Update Data', 'Food Updated', 'John Doe', '2025-06-12 14:39:52'),
(1204, 'Food List', 'Update Data', 'Food Updated', 'John Doe', '2025-06-12 14:40:05'),
(1205, 'Food List', 'Update Data', 'Food Updated', 'John Doe', '2025-06-12 14:41:24'),
(1206, 'Add New Order', 'Insert Data', 'Item New Order Created', 'John Doe', '2025-06-12 14:41:57'),
(1207, 'Add New Order', 'Insert Data', 'Item New Order Created', 'Manik  Hassan', '2025-06-12 19:44:51'),
(1208, 'Add New Order', 'Insert Data', 'Item New Order Created', 'Manik  Hassan', '2025-06-12 21:07:00'),
(1209, 'Add New Order', 'Insert Data', 'Item New Order Created', 'Manik  Hassan', '2025-06-12 21:25:33'),
(1210, 'Add New Order', 'Insert Data', 'Item New Order Created', 'Manik  Hassan', '2025-06-12 21:28:40'),
(1211, 'Add New Order', 'Insert Data', 'Item New Order Created', 'Manik  Hassan', '2025-06-12 22:10:28'),
(1212, 'Add New Order', 'Insert Data', 'Item New Order Created', 'Manik  Hassan', '2025-06-12 22:10:57'),
(1213, 'Add New Order', 'Insert Data', 'Item New Order Created', 'Manik  Hassan', '2025-06-12 22:44:36'),
(1214, 'Order List', 'Insert Data', 'Order is Update', 'Manik  Hassan', '2025-06-12 22:44:54'),
(1215, 'Order List', 'Insert Data', 'Order is Update', 'Manik  Hassan', '2025-06-12 22:45:01'),
(1216, 'Order List', 'Insert Data', 'Order is Update', 'Manik  Hassan', '2025-06-12 22:45:07'),
(1217, 'Order List', 'Insert Data', 'Order is Update', 'Manik  Hassan', '2025-06-12 22:45:13'),
(1218, 'Order List', 'Insert Data', 'Order is Update', 'Manik  Hassan', '2025-06-12 22:45:19'),
(1219, 'Order List', 'Insert Data', 'Order is Update', 'Manik  Hassan', '2025-06-12 22:45:25'),
(1220, 'Order List', 'Insert Data', 'Order is Update', 'Manik  Hassan', '2025-06-12 22:45:31'),
(1221, 'Order List', 'Insert Data', 'Order is Update', 'Manik  Hassan', '2025-06-12 22:45:37'),
(1222, 'Order List', 'Insert Data', 'Order is Update', 'Manik  Hassan', '2025-06-12 22:45:43'),
(1223, 'Promo Food List', 'Update Data', 'Promo Food Updated', 'John Doe', '2025-06-20 21:56:31'),
(1224, 'Promo Food List', 'Update Data', 'Promo Food Updated', 'John Doe', '2025-06-23 15:08:30'),
(1225, 'Promo Food List', 'Update Data', 'Promo Food Updated', 'John Doe', '2025-06-25 22:08:30'),
(1226, 'Promo Food List', 'Update Data', 'Promo Food Updated', 'John Doe', '2025-06-26 18:06:22'),
(1227, 'Add New Order', 'Insert Data', 'Item New Order Created', 'John Doe', '2025-06-26 18:39:36'),
(1228, 'Promo Food List', 'Update Data', 'Promo Food Updated', 'John Doe', '2025-06-27 21:56:19'),
(1229, 'Food List', 'Delete Data', 'Food Deleted', 'John Doe', '2025-07-08 15:03:20'),
(1230, 'Food List', 'Delete Data', 'Food Deleted', 'John Doe', '2025-07-08 15:03:47'),
(1231, 'Food List', 'Delete Data', 'Food Deleted', 'John Doe', '2025-07-08 15:04:52'),
(1232, 'Promo Food List', 'Update Data', 'Promo Food Updated', 'John Doe', '2025-07-08 21:33:50'),
(1233, 'Promo Food List', 'Update Data', 'Promo Food Updated', 'John Doe', '2025-07-09 20:34:12'),
(1234, 'Promo Food List', 'Update Data', 'Promo Food Updated', 'John Doe', '2025-07-14 16:25:03'),
(1235, 'Promo Food List', 'Update Data', 'Promo Food Updated', 'John Doe', '2025-07-14 21:40:49'),
(1236, 'Promo Food List', 'Update Data', 'Promo Food Updated', 'John Doe', '2025-07-14 21:42:55'),
(1237, 'Category List', 'Insert Data', 'Multiple categories created', 'John Doe', '2025-07-16 20:27:30'),
(1238, 'Category List', 'Update Data', 'Multiple categories updated', 'John Doe', '2025-07-16 20:28:46'),
(1239, 'Category List', 'Update Data', 'Multiple categories updated', 'John Doe', '2025-07-16 20:32:33'),
(1240, 'Category List', 'Update Data', 'Multiple categories updated', 'John Doe', '2025-07-16 20:35:10'),
(1241, 'Category List', 'Update Data', 'Multiple categories updated', 'John Doe', '2025-07-16 20:48:33'),
(1242, 'Category List', 'Update Data', 'Multiple categories updated', 'John Doe', '2025-07-16 20:52:51'),
(1243, 'Category List', 'Update Data', 'Multiple categories updated', 'John Doe', '2025-07-16 20:53:54'),
(1244, 'Category List', 'Update Data', 'Multiple categories updated', 'John Doe', '2025-07-16 20:54:21'),
(1245, 'Category List', 'Update Data', 'Multiple categories updated', 'John Doe', '2025-07-16 20:54:46'),
(1246, 'Category List', 'Insert Data', 'Multiple categories created', 'John Doe', '2025-07-18 18:38:11'),
(1247, 'Category List', 'Insert Data', 'Multiple subcategories created', 'John Doe', '2025-07-18 19:49:28'),
(1248, 'Category List', 'Insert Data', 'Multiple subcategories created', 'John Doe', '2025-07-18 20:54:13'),
(1249, 'Category List', 'Update Data', 'Multiple subcategories updated', 'John Doe', '2025-07-18 20:56:22'),
(1250, 'Category List', 'Insert Data', 'Multiple categories created', 'John Doe', '2025-07-21 14:39:06'),
(1251, 'Category List', 'Insert Data', 'Multiple categories created', 'John Doe', '2025-07-21 14:40:01'),
(1252, 'Category List', 'Insert Data', 'Multiple subcategories created', 'John Doe', '2025-07-21 15:08:03'),
(1253, 'Food List', 'Update Data', 'Food Updated', 'John Doe', '2025-07-21 15:44:23'),
(1254, 'Food List', 'Update Data', 'Food Updated', 'John Doe', '2025-07-21 16:21:44'),
(1255, 'Food List', 'Update Data', 'Food Updated', 'John Doe', '2025-07-21 17:11:53'),
(1256, 'Food List', 'Update Data', 'Food Updated', 'John Doe', '2025-07-21 17:12:04'),
(1257, 'Unit List', 'Insert Data', 'New unit Created', 'John Doe', '2025-07-21 17:14:51'),
(1258, 'Food List', 'Update Data', 'Food Updated', 'John Doe', '2025-07-21 17:16:57'),
(1259, 'Food List', 'Update Data', 'Food Updated', 'John Doe', '2025-07-21 17:17:11'),
(1260, 'Food List', 'Update Data', 'Food Updated', 'John Doe', '2025-07-21 18:45:54'),
(1261, 'Food List', 'Update Data', 'Food Updated', 'John Doe', '2025-07-21 19:03:38'),
(1262, 'Food List', 'Update Data', 'Food Updated', 'John Doe', '2025-07-21 19:04:47'),
(1263, 'Food List', 'Update Data', 'Food Updated', 'John Doe', '2025-07-21 19:16:57'),
(1264, 'Food List', 'Update Data', 'Food Updated', 'John Doe', '2025-07-21 19:35:54'),
(1265, 'Food List', 'Update Data', 'Food Updated', 'John Doe', '2025-07-21 19:38:33'),
(1266, 'Food List', 'Delete Data', 'Food Deleted', 'John Doe', '2025-07-21 21:09:51'),
(1267, 'Food List', 'Update Data', 'Food Updated', 'John Doe', '2025-07-22 14:25:52'),
(1268, 'Add New Order', 'Insert Data', 'Item New Order Created', 'John Doe', '2025-07-22 14:33:11'),
(1269, 'Order List', 'Insert Data', 'Order is Update', 'John Doe', '2025-07-22 14:37:24'),
(1270, 'Category List', 'Insert Data', 'Multiple categories created', 'John Doe', '2025-07-22 16:23:35'),
(1271, 'Category List', 'Insert Data', 'Multiple categories created', 'John Doe', '2025-07-22 16:25:46'),
(1272, 'Category List', 'Insert Data', 'Multiple subcategories created', 'John Doe', '2025-07-22 16:29:00'),
(1273, 'Category List', 'Insert Data', 'Multiple subcategories created', 'John Doe', '2025-07-22 16:31:36'),
(1274, 'Category List', 'Update Data', 'Multiple categories updated', 'John Doe', '2025-07-22 16:52:56'),
(1275, 'Food List', 'Update Data', 'Food Updated', 'John Doe', '2025-07-22 17:06:59'),
(1276, 'Food List', 'Update Data', 'Food Updated', 'John Doe', '2025-07-22 17:08:16'),
(1277, 'Food List', 'Update Data', 'Food Updated', 'John Doe', '2025-07-22 17:09:09'),
(1278, 'Food List', 'Update Data', 'Food Updated', 'John Doe', '2025-07-22 17:09:22'),
(1279, 'Food List', 'Update Data', 'Food Updated', 'John Doe', '2025-07-22 17:09:32'),
(1280, 'Food List', 'Update Data', 'Food Updated', 'John Doe', '2025-07-22 17:11:58'),
(1281, 'Food List', 'Update Data', 'Food Updated', 'John Doe', '2025-07-22 17:12:05'),
(1282, 'Food List', 'Update Data', 'Food Updated', 'John Doe', '2025-07-22 17:12:14'),
(1283, 'Food List', 'Update Data', 'Food Updated', 'John Doe', '2025-07-22 17:12:23'),
(1284, 'Food List', 'Update Data', 'Food Updated', 'John Doe', '2025-07-22 17:12:34'),
(1285, 'Food List', 'Update Data', 'Food Updated', 'John Doe', '2025-07-22 17:12:54'),
(1286, 'Food List', 'Update Data', 'Food Updated', 'John Doe', '2025-07-22 17:13:13'),
(1287, 'Food List', 'Update Data', 'Food Updated', 'John Doe', '2025-07-22 17:13:22'),
(1288, 'Food List', 'Update Data', 'Food Updated', 'John Doe', '2025-07-22 17:14:12'),
(1289, 'Food List', 'Update Data', 'Food Updated', 'John Doe', '2025-07-22 17:14:55'),
(1290, 'Food List', 'Update Data', 'Food Updated', 'John Doe', '2025-07-22 17:15:05'),
(1291, 'Food List', 'Update Data', 'Food Updated', 'John Doe', '2025-07-22 17:17:24'),
(1292, 'Food List', 'Update Data', 'Food Updated', 'John Doe', '2025-07-22 17:17:33'),
(1293, 'Food List', 'Update Data', 'Food Updated', 'John Doe', '2025-07-22 17:17:46'),
(1294, 'Food List', 'Update Data', 'Food Updated', 'John Doe', '2025-07-22 17:18:02'),
(1295, 'Food List', 'Update Data', 'Food Updated', 'John Doe', '2025-07-22 17:18:30'),
(1296, 'Food List', 'Update Data', 'Food Updated', 'John Doe', '2025-07-22 17:18:51'),
(1297, 'Food List', 'Update Data', 'Food Updated', 'John Doe', '2025-07-22 17:19:01'),
(1298, 'Food List', 'Update Data', 'Food Updated', 'John Doe', '2025-07-22 17:19:11'),
(1299, 'Food List', 'Update Data', 'Food Updated', 'John Doe', '2025-07-22 17:19:29'),
(1300, 'Food List', 'Update Data', 'Food Updated', 'John Doe', '2025-07-22 17:19:43'),
(1301, 'Food List', 'Update Data', 'Food Updated', 'John Doe', '2025-07-22 17:21:05'),
(1302, 'Food List', 'Update Data', 'Food Updated', 'John Doe', '2025-07-22 17:21:25'),
(1303, 'Food List', 'Update Data', 'Food Updated', 'John Doe', '2025-07-22 17:21:37'),
(1304, 'Food List', 'Update Data', 'Food Updated', 'John Doe', '2025-07-22 17:24:38'),
(1305, 'Food List', 'Update Data', 'Food Updated', 'John Doe', '2025-07-22 17:24:43'),
(1306, 'Food List', 'Update Data', 'Food Updated', 'John Doe', '2025-07-22 17:24:48'),
(1307, 'Food List', 'Update Data', 'Food Updated', 'John Doe', '2025-07-22 17:24:53'),
(1308, 'Food List', 'Update Data', 'Food Updated', 'John Doe', '2025-07-22 17:26:54'),
(1309, 'Food List', 'Update Data', 'Food Updated', 'John Doe', '2025-07-22 17:27:03'),
(1310, 'Food List', 'Update Data', 'Food Updated', 'John Doe', '2025-07-22 17:27:11'),
(1311, 'Food List', 'Update Data', 'Food Updated', 'John Doe', '2025-07-22 17:28:19'),
(1312, 'Food List', 'Update Data', 'Food Updated', 'John Doe', '2025-07-22 17:28:27'),
(1313, 'Food List', 'Update Data', 'Food Updated', 'John Doe', '2025-07-22 17:28:35'),
(1314, 'Food List', 'Update Data', 'Food Updated', 'John Doe', '2025-07-22 17:28:46'),
(1315, 'Food List', 'Update Data', 'Food Updated', 'John Doe', '2025-07-22 17:30:18'),
(1316, 'Food List', 'Update Data', 'Food Updated', 'John Doe', '2025-07-22 17:30:24'),
(1317, 'Food List', 'Update Data', 'Food Updated', 'John Doe', '2025-07-22 17:30:32'),
(1318, 'Food List', 'Update Data', 'Food Updated', 'John Doe', '2025-07-22 17:30:40'),
(1319, 'Food List', 'Update Data', 'Food Updated', 'John Doe', '2025-07-22 17:30:48'),
(1320, 'Food List', 'Update Data', 'Food Updated', 'John Doe', '2025-07-22 17:30:59'),
(1321, 'Food List', 'Update Data', 'Food Updated', 'John Doe', '2025-07-22 17:32:13'),
(1322, 'Food List', 'Delete Data', 'Food Deleted', 'John Doe', '2025-07-22 17:35:33'),
(1323, 'Food List', 'Update Data', 'Food Updated', 'John Doe', '2025-07-22 17:46:37'),
(1324, 'Add Food', 'Insert Data', 'New Food Added', 'John Doe', '2025-07-25 14:37:28'),
(1325, 'Add New Order', 'Insert Data', 'Item New Order Created', 'John Doe', '2025-07-25 14:49:25'),
(1326, 'Add New Order', 'Insert Data', 'Item New Order Created', 'John Doe', '2025-07-25 14:50:25'),
(1327, 'Add New Order', 'Insert Data', 'Item New Order Created', 'John Doe', '2025-07-25 21:01:55'),
(1328, 'Add New Order', 'Insert Data', 'Item New Order Created', 'John Doe', '2025-07-28 14:07:46'),
(1329, 'Add New Order', 'Insert Data', 'Item New Order Created', 'John Doe', '2025-07-28 15:53:00'),
(1330, 'Add New Order', 'Insert Data', 'Item New Order Created', 'John Doe', '2025-07-28 16:08:26'),
(1331, 'Add New Order', 'Insert Data', 'Item New Order Created', 'John Doe', '2025-07-28 17:00:47'),
(1332, 'Add New Order', 'Insert Data', 'Item New Order Created', 'John Doe', '2025-07-28 18:01:08'),
(1333, 'Order List', 'Insert Data', 'Order is Update', 'John Doe', '2025-07-28 19:23:31'),
(1334, 'Order List', 'Insert Data', 'Order is Update', 'John Doe', '2025-07-28 19:27:12'),
(1335, 'Order List', 'Insert Data', 'Order is Update', 'John Doe', '2025-07-28 19:27:24'),
(1336, 'Order List', 'Insert Data', 'Order is Update', 'John Doe', '2025-07-28 19:27:42'),
(1337, 'Add New Order', 'Insert Data', 'Item New Order Created', 'John Doe', '2025-07-28 19:29:10'),
(1338, 'Add New Order', 'Insert Data', 'Item New Order Created', 'John Doe', '2025-07-28 19:33:23'),
(1339, 'Add New Order', 'Insert Data', 'Item New Order Created', 'John Doe', '2025-07-28 20:21:31'),
(1340, 'Food List', 'Update Data', 'Food Updated', 'John Doe', '2025-07-28 21:29:04'),
(1341, 'Add New Order', 'Insert Data', 'Item New Order Created', 'John Doe', '2025-07-28 21:32:40'),
(1342, 'Order List', 'Insert Data', 'Order is Update', 'John Doe', '2025-07-28 21:33:01'),
(1343, 'Order List', 'Insert Data', 'Order is Update', 'John Doe', '2025-07-28 21:33:08'),
(1344, 'Order List', 'Insert Data', 'Order is Update', 'John Doe', '2025-07-28 21:33:16'),
(1345, 'Order List', 'Insert Data', 'Order is Update', 'John Doe', '2025-07-28 21:33:25'),
(1346, 'Order List', 'Insert Data', 'Order is Update', 'John Doe', '2025-07-28 21:33:31'),
(1347, 'Add New Order', 'Insert Data', 'Item New Order Created', 'John Doe', '2025-07-28 21:58:13'),
(1348, 'Add New Order', 'Insert Data', 'Item New Order Created', 'John Doe', '2025-07-29 15:19:45'),
(1349, 'Order List', 'Insert Data', 'Order is Update', 'John Doe', '2025-07-29 20:56:35'),
(1350, 'Add New Order', 'Insert Data', 'Item New Order Created', 'John Doe', '2025-07-29 21:03:11'),
(1351, 'Food List', 'Update Data', 'Food Updated', 'John Doe', '2025-07-29 22:15:57'),
(1352, 'Food List', 'Update Data', 'Food Updated', 'John Doe', '2025-07-29 22:17:36'),
(1353, 'Food List', 'Update Data', 'Food Updated', 'John Doe', '2025-07-29 22:19:24'),
(1354, 'Add New Order', 'Insert Data', 'Item New Order Created', 'John Doe', '2025-07-29 22:20:59'),
(1355, 'Order List', 'Insert Data', 'Order is Update', 'John Doe', '2025-07-29 22:24:09'),
(1356, 'Order List', 'Insert Data', 'Order is Update', 'John Doe', '2025-07-29 22:24:41'),
(1357, 'Pending Order', 'Insert Data', 'Pending Order is Update', 'John Doe', '2025-07-29 22:25:49'),
(1358, 'Pending Order', 'Insert Data', 'Pending Order is Update', 'John Doe', '2025-07-29 22:27:17'),
(1359, 'Order List', 'Insert Data', 'Order is Update', 'John Doe', '2025-07-29 22:42:22'),
(1360, 'Order List', 'Insert Data', 'Order is Update', 'John Doe', '2025-07-29 22:42:38'),
(1361, 'Food List', 'Update Data', 'Food Updated', 'John Doe', '2025-07-30 13:51:34'),
(1362, 'Food List', 'Update Data', 'Food Updated', 'John Doe', '2025-07-30 13:51:54'),
(1363, 'Add New Order', 'Insert Data', 'Item New Order Created', 'John Doe', '2025-07-30 13:58:23'),
(1364, 'Order List', 'Insert Data', 'Order is Update', 'John Doe', '2025-07-30 14:00:46'),
(1365, 'Add New Order', 'Insert Data', 'Item New Order Created', 'John Doe', '2025-07-30 14:01:43'),
(1366, 'Order List', 'Insert Data', 'Order is Update', 'John Doe', '2025-07-30 14:10:52'),
(1367, 'Add New Order', 'Insert Data', 'Item New Order Created', 'John Doe', '2025-07-30 14:11:09'),
(1368, 'Order List', 'Insert Data', 'Order is Update', 'John Doe', '2025-07-30 14:19:49'),
(1369, 'Add New Order', 'Insert Data', 'Item New Order Created', 'John Doe', '2025-07-30 14:49:03'),
(1370, 'Order List', 'Insert Data', 'Order is Update', 'John Doe', '2025-07-30 14:56:28'),
(1371, 'Add New Order', 'Insert Data', 'Item New Order Created', 'Manik  Hassan', '2025-07-30 17:22:36'),
(1372, 'Order List', 'Insert Data', 'Order is Update', 'Manik  Hassan', '2025-07-30 19:59:29'),
(1373, 'Add New Order', 'Insert Data', 'Item New Order Created', 'Manik  Hassan', '2025-07-30 20:00:51'),
(1374, 'Order List', 'Insert Data', 'Order is Update', 'Manik  Hassan', '2025-07-30 22:29:38'),
(1375, 'Add New Order', 'Insert Data', 'Item New Order Created', 'Manik  Hassan', '2025-07-30 22:33:51'),
(1376, 'Add New Order', 'Insert Data', 'Item New Order Created', 'Manik  Hassan', '2025-07-30 22:34:43'),
(1377, 'Add New Order', 'Insert Data', 'Item New Order Created', 'Manik  Hassan', '2025-07-31 13:57:14'),
(1378, 'Add New Order', 'Insert Data', 'Item New Order Created', 'Manik  Hassan', '2025-07-31 13:58:07'),
(1379, 'Add New Order', 'Insert Data', 'Item New Order Created', 'Manik  Hassan', '2025-07-31 14:16:09'),
(1380, 'Order List', 'Insert Data', 'Order is Update', 'Manik  Hassan', '2025-07-31 14:20:27'),
(1381, 'Order List', 'Insert Data', 'Order is Update', 'Manik  Hassan', '2025-07-31 14:20:37'),
(1382, 'Order List', 'Insert Data', 'Order is Update', 'Manik  Hassan', '2025-07-31 14:20:44'),
(1383, 'Order List', 'Insert Data', 'Order is Update', 'Manik  Hassan', '2025-07-31 14:20:49'),
(1384, 'Order List', 'Insert Data', 'Order is Update', 'Manik  Hassan', '2025-07-31 14:21:00'),
(1385, 'Add New Order', 'Insert Data', 'Item New Order Created', 'Manik  Hassan', '2025-07-31 14:22:32'),
(1386, 'Add New Order', 'Insert Data', 'Item New Order Created', 'Manik  Hassan', '2025-07-31 14:32:17'),
(1387, 'Add New Order', 'Insert Data', 'Item New Order Created', 'Manik  Hassan', '2025-07-31 14:47:26'),
(1388, 'Add New Order', 'Insert Data', 'Item New Order Created', 'Manik  Hassan', '2025-07-31 14:50:44'),
(1389, 'Add New Order', 'Insert Data', 'Item New Order Created', 'Manik  Hassan', '2025-07-31 14:52:29'),
(1390, 'Add New Order', 'Insert Data', 'Item New Order Created', 'Manik  Hassan', '2025-07-31 14:54:01'),
(1391, 'Add New Order', 'Insert Data', 'Item New Order Created', 'Manik  Hassan', '2025-07-31 14:54:24'),
(1392, 'Order List', 'Insert Data', 'Order is Update', 'Manik  Hassan', '2025-07-31 15:02:34'),
(1393, 'Order List', 'Insert Data', 'Order is Update', 'Manik  Hassan', '2025-07-31 15:02:40'),
(1394, 'Order List', 'Insert Data', 'Order is Update', 'Manik  Hassan', '2025-07-31 15:02:46'),
(1395, 'Order List', 'Insert Data', 'Order is Update', 'Manik  Hassan', '2025-07-31 15:02:53'),
(1396, 'Order List', 'Insert Data', 'Order is Update', 'Manik  Hassan', '2025-07-31 15:02:58'),
(1397, 'Order List', 'Insert Data', 'Order is Update', 'Manik  Hassan', '2025-07-31 15:03:04'),
(1398, 'Order List', 'Insert Data', 'Order is Update', 'Manik  Hassan', '2025-07-31 15:03:11'),
(1399, 'Order List', 'Insert Data', 'Order is Update', 'Manik  Hassan', '2025-07-31 15:03:18'),
(1400, 'Order List', 'Insert Data', 'Order is Update', 'Manik  Hassan', '2025-07-31 15:03:23'),
(1401, 'Order List', 'Insert Data', 'Order is Update', 'Manik  Hassan', '2025-07-31 15:03:32'),
(1402, 'Order List', 'Insert Data', 'Order is Update', 'Manik  Hassan', '2025-07-31 15:03:54'),
(1403, 'Order List', 'Insert Data', 'Order is Update', 'Manik  Hassan', '2025-07-31 15:04:04'),
(1404, 'Order List', 'Insert Data', 'Order is Update', 'Manik  Hassan', '2025-07-31 15:12:14'),
(1405, 'Order List', 'Insert Data', 'Order is Update', 'Manik  Hassan', '2025-07-31 15:12:31'),
(1406, 'Order List', 'Insert Data', 'Order is Update', 'Manik  Hassan', '2025-07-31 15:12:38'),
(1407, 'Order List', 'Insert Data', 'Order is Update', 'Manik  Hassan', '2025-07-31 15:12:44'),
(1408, 'Order List', 'Insert Data', 'Order is Update', 'Manik  Hassan', '2025-07-31 15:12:51'),
(1409, 'Add New Order', 'Insert Data', 'Item New Order Created', 'Manik  Hassan', '2025-07-31 15:19:29'),
(1410, 'Add New Order', 'Insert Data', 'Item New Order Created', 'John Doe', '2025-07-31 17:37:06'),
(1411, 'Add New Order', 'Insert Data', 'Item New Order Created', 'John Doe', '2025-07-31 17:38:05'),
(1412, 'Add New Order', 'Insert Data', 'Item New Order Created', 'John Doe', '2025-07-31 17:41:30'),
(1413, 'Add New Order', 'Insert Data', 'Item New Order Created', 'John Doe', '2025-07-31 17:42:55'),
(1414, 'Add New Order', 'Insert Data', 'Item New Order Created', 'Manik  Hassan', '2025-07-31 19:14:14'),
(1415, 'Order List', 'Insert Data', 'Order is Update', 'Manik  Hassan', '2025-07-31 19:15:09'),
(1416, 'Order List', 'Insert Data', 'Order is Update', 'Manik  Hassan', '2025-07-31 19:24:00'),
(1417, 'Order List', 'Insert Data', 'Order is Update', 'Manik  Hassan', '2025-07-31 19:24:05'),
(1418, 'Order List', 'Insert Data', 'Order is Update', 'Manik  Hassan', '2025-07-31 19:24:12'),
(1419, 'Order List', 'Insert Data', 'Order is Update', 'Manik  Hassan', '2025-07-31 19:24:20'),
(1420, 'Order List', 'Insert Data', 'Order is Update', 'Manik  Hassan', '2025-07-31 19:24:31'),
(1421, 'Add New Order', 'Insert Data', 'Item New Order Created', 'Manik  Hassan', '2025-07-31 19:25:44'),
(1422, 'Add New Order', 'Insert Data', 'Item New Order Created', 'Manik  Hassan', '2025-07-31 21:10:13'),
(1423, 'Order List', 'Insert Data', 'Order is Update', 'Manik  Hassan', '2025-07-31 21:24:47'),
(1424, 'Order List', 'Insert Data', 'Order is Update', 'Manik  Hassan', '2025-07-31 21:24:54'),
(1425, 'Order List', 'Insert Data', 'Order is Update', 'Manik  Hassan', '2025-07-31 21:25:37'),
(1426, 'Order List', 'Insert Data', 'Order is Update', 'Manik  Hassan', '2025-07-31 21:25:39'),
(1427, 'Order List', 'Insert Data', 'Order is Update', 'Manik  Hassan', '2025-07-31 21:27:47'),
(1428, 'Order List', 'Insert Data', 'Order is Update', 'Manik  Hassan', '2025-07-31 21:40:46'),
(1429, 'Order List', 'Insert Data', 'Order is Update', 'Manik  Hassan', '2025-07-31 21:44:26'),
(1430, 'Order List', 'Insert Data', 'Order is Update', 'Manik  Hassan', '2025-07-31 21:46:59'),
(1431, 'Order List', 'Insert Data', 'Order is Update', 'Manik  Hassan', '2025-07-31 21:47:04'),
(1432, 'Order List', 'Insert Data', 'Order is Update', 'Manik  Hassan', '2025-07-31 21:56:51'),
(1433, 'Order List', 'Insert Data', 'Order is Update', 'Manik  Hassan', '2025-07-31 22:02:40'),
(1434, 'Order List', 'Insert Data', 'Order is Update', 'Manik  Hassan', '2025-07-31 22:20:00'),
(1435, 'Order List', 'Insert Data', 'Order is Update', 'Manik  Hassan', '2025-07-31 22:20:05'),
(1436, 'Order List', 'Insert Data', 'Order is Update', 'Manik  Hassan', '2025-07-31 22:20:06'),
(1437, 'Order List', 'Insert Data', 'Order is Update', 'Manik  Hassan', '2025-07-31 22:20:06'),
(1438, 'Order List', 'Insert Data', 'Order is Update', 'Manik  Hassan', '2025-07-31 22:20:24'),
(1439, 'Add New Order', 'Insert Data', 'Item New Order Created', 'John Doe', '2025-08-01 14:25:18'),
(1440, 'Pending Order', 'Insert Data', 'Pending Order is Update', 'John Doe', '2025-08-01 15:33:29'),
(1441, 'Order List', 'Insert Data', 'Order is Update', 'John Doe', '2025-08-01 15:33:42'),
(1442, 'Unit List', 'Insert Data', 'New unit Created', 'John Doe', '2025-08-01 19:51:48'),
(1443, 'Unit List', 'Insert Data', 'New unit Created', 'John Doe', '2025-08-01 19:52:13'),
(1444, 'Food List', 'Update Data', 'Food Updated', 'John Doe', '2025-08-01 19:59:53'),
(1445, 'Food List', 'Update Data', 'Food Updated', 'John Doe', '2025-08-01 19:59:59'),
(1446, 'Food List', 'Update Data', 'Food Updated', 'John Doe', '2025-08-01 20:00:05'),
(1447, 'Food List', 'Update Data', 'Food Updated', 'John Doe', '2025-08-01 20:00:10'),
(1448, 'Food List', 'Update Data', 'Food Updated', 'John Doe', '2025-08-01 20:00:21'),
(1449, 'Food List', 'Update Data', 'Food Updated', 'John Doe', '2025-08-01 20:12:34'),
(1450, 'Add New Order', 'Insert Data', 'Item New Order Created', 'Manik  Hassan', '2025-08-04 13:51:49'),
(1451, 'Order List', 'Insert Data', 'Order is Update', 'Manik  Hassan', '2025-08-04 13:52:14'),
(1452, 'Food List', 'Update Data', 'Food Updated', 'John Doe', '2025-08-04 15:34:01'),
(1453, 'Food List', 'Update Data', 'Food Updated', 'John Doe', '2025-08-04 15:36:09'),
(1454, 'Add Customer', 'Insert Data', 'Customer is Created', 'Manik  Hassan', '2025-08-04 15:49:23'),
(1455, 'Add New Order', 'Insert Data', 'Item New Order Created', 'John Doe', '2025-08-04 15:52:09'),
(1456, 'Add New Order', 'Insert Data', 'Item New Order Created', 'John Doe', '2025-08-04 15:55:24'),
(1457, 'Add New Order', 'Insert Data', 'Item New Order Created', 'Manik  Hassan', '2025-08-04 16:27:46'),
(1458, 'Food List', 'Update Data', 'Food Updated', 'John Doe', '2025-08-04 17:41:23'),
(1459, 'Food List', 'Update Data', 'Food Updated', 'John Doe', '2025-08-04 17:42:26'),
(1460, 'Food List', 'Update Data', 'Food Updated', 'John Doe', '2025-08-04 17:47:47'),
(1461, 'Food List', 'Update Data', 'Food Updated', 'John Doe', '2025-08-04 19:29:06'),
(1462, 'Food List', 'Update Data', 'Food Updated', 'John Doe', '2025-08-04 19:47:29'),
(1463, 'Food List', 'Update Data', 'Food Updated', 'John Doe', '2025-08-04 19:54:03'),
(1464, 'Food List', 'Update Data', 'Food Updated', 'John Doe', '2025-08-04 20:18:50'),
(1465, 'Food List', 'Update Data', 'Food Updated', 'John Doe', '2025-08-04 20:27:13'),
(1466, 'Add New Order', 'Insert Data', 'Item New Order Created', 'Manik  Hassan', '2025-08-05 10:59:45'),
(1467, 'Pending Order', 'Insert Data', 'Pending Order is Update', 'Manik  Hassan', '2025-08-05 11:10:31'),
(1468, 'Order List', 'Insert Data', 'Order is Update', 'Manik  Hassan', '2025-08-05 11:19:12'),
(1469, 'Add Customer', 'Insert Data', 'Customer is Created', 'Manik  Hassan', '2025-08-05 11:27:52'),
(1470, 'Add Customer', 'Insert Data', 'Customer is Created', 'Manik  Hassan', '2025-08-05 11:28:43'),
(1471, 'Add Customer', 'Insert Data', 'Customer is Created', 'Manik  Hassan', '2025-08-05 11:29:33'),
(1472, 'Add Customer', 'Insert Data', 'Customer is Created', 'Manik  Hassan', '2025-08-05 11:30:12'),
(1473, 'Add Customer', 'Insert Data', 'Customer is Created', 'Manik  Hassan', '2025-08-05 11:33:04'),
(1474, 'Add New Order', 'Insert Data', 'Item New Order Created', 'Manik  Hassan', '2025-08-05 11:38:23'),
(1475, 'Order List', 'Insert Data', 'Order is Update', 'Manik  Hassan', '2025-08-05 11:44:19'),
(1476, 'Add New Order', 'Insert Data', 'Item New Order Created', 'Manik  Hassan', '2025-08-05 11:47:35'),
(1477, 'Add New Order', 'Insert Data', 'Item New Order Created', 'Manik  Hassan', '2025-08-05 12:03:59'),
(1478, 'Add New Order', 'Insert Data', 'Item New Order Created', 'Manik  Hassan', '2025-08-05 12:05:25'),
(1479, 'Add New Order', 'Insert Data', 'Item New Order Created', 'Manik  Hassan', '2025-08-05 12:08:28'),
(1480, 'Food List', 'Update Data', 'Food Updated', 'John Doe', '2025-08-05 14:46:22'),
(1481, 'Food List', 'Update Data', 'Food Updated', 'John Doe', '2025-08-05 14:49:56'),
(1482, 'Food List', 'Update Data', 'Food Updated', 'John Doe', '2025-08-05 14:52:49'),
(1483, 'Food List', 'Update Data', 'Food Updated', 'John Doe', '2025-08-05 15:01:17'),
(1484, 'Food List', 'Update Data', 'Food Updated', 'John Doe', '2025-08-05 15:11:17');

-- --------------------------------------------------------

--
-- Table structure for table `acc_account_name`
--

CREATE TABLE `acc_account_name` (
  `account_id` int(10) UNSIGNED NOT NULL,
  `account_name` varchar(255) NOT NULL,
  `account_type` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `acc_coa`
--

CREATE TABLE `acc_coa` (
  `HeadCode` varchar(50) NOT NULL,
  `HeadName` varchar(100) NOT NULL,
  `PHeadName` varchar(50) NOT NULL,
  `HeadLevel` int(11) NOT NULL,
  `IsActive` tinyint(1) NOT NULL,
  `IsTransaction` tinyint(1) NOT NULL,
  `IsGL` tinyint(1) NOT NULL,
  `HeadType` char(1) NOT NULL,
  `IsBudget` tinyint(1) NOT NULL,
  `IsDepreciation` tinyint(1) NOT NULL,
  `DepreciationRate` decimal(18,2) NOT NULL,
  `CreateBy` varchar(50) NOT NULL,
  `CreateDate` datetime NOT NULL,
  `UpdateBy` varchar(50) NOT NULL,
  `UpdateDate` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

--
-- Dumping data for table `acc_coa`
--

INSERT INTO `acc_coa` (`HeadCode`, `HeadName`, `PHeadName`, `HeadLevel`, `IsActive`, `IsTransaction`, `IsGL`, `HeadType`, `IsBudget`, `IsDepreciation`, `DepreciationRate`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`) VALUES
('502020000001', '145454-HmIsahaq', 'Account Payable', 2, 1, 1, 0, 'L', 0, 0, 0.00, 'John Doe', '2018-12-17 15:10:19', '', '0000-00-00 00:00:00'),
('4021403', 'AC', 'Repair and Maintenance', 3, 1, 1, 0, 'E', 0, 0, 0.00, 'admin', '2015-10-15 19:33:55', '', '0000-00-00 00:00:00'),
('50202', 'Account Payable', 'Current Liabilities', 2, 1, 0, 1, 'L', 0, 0, 0.00, 'admin', '2015-10-15 19:50:43', '', '0000-00-00 00:00:00'),
('10203', 'Account Receivable', 'Current Asset', 2, 1, 0, 0, 'A', 0, 0, 0.00, '', '0000-00-00 00:00:00', 'admin', '2013-09-18 15:29:35'),
('1020201', 'Advance', 'Advance, Deposit And Pre-payments', 3, 1, 0, 1, 'A', 0, 0, 0.00, 'Zoherul', '2015-05-31 13:29:12', 'admin', '2015-12-31 16:46:32'),
('102020103', 'Advance House Rent', 'Advance', 4, 1, 1, 0, 'A', 0, 0, 0.00, 'admin', '2016-10-02 16:55:38', 'admin', '2016-10-02 16:57:32'),
('10202', 'Advance, Deposit And Pre-payments', 'Current Asset', 2, 1, 0, 0, 'A', 0, 0, 0.00, '', '0000-00-00 00:00:00', 'admin', '2015-12-31 16:46:24'),
('4020602', 'Advertisement and Publicity', 'Promonational Expence', 3, 1, 1, 0, 'E', 0, 0, 0.00, 'admin', '2015-10-15 18:51:44', '', '0000-00-00 00:00:00'),
('1010410', 'Air Cooler', 'Others Assets', 3, 1, 1, 0, 'A', 0, 0, 0.00, 'admin', '2016-05-23 12:13:55', '', '0000-00-00 00:00:00'),
('4020603', 'AIT Against Advertisement', 'Promonational Expence', 3, 1, 1, 0, 'E', 0, 0, 0.00, 'admin', '2015-10-15 18:52:09', '', '0000-00-00 00:00:00'),
('1', 'Assets', 'COA', 0, 1, 0, 0, 'A', 0, 0, 0.00, '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00'),
('1010204', 'Attendance Machine', 'Office Equipment', 3, 1, 1, 0, 'A', 0, 0, 0.00, 'admin', '2015-10-15 15:49:31', '', '0000-00-00 00:00:00'),
('40216', 'Audit Fee', 'Other Expenses', 2, 1, 1, 1, 'E', 0, 0, 0.00, 'admin', '2017-07-18 12:54:30', '', '0000-00-00 00:00:00'),
('4021002', 'Bank Charge', 'Financial Expenses', 3, 1, 1, 0, 'E', 0, 0, 0.00, 'admin', '2015-10-15 19:21:03', '', '0000-00-00 00:00:00'),
('30203', 'Bank Interest', 'Other Income', 2, 1, 1, 1, 'I', 0, 0, 0.00, 'Obaidul', '2015-01-03 14:49:54', 'admin', '2016-09-25 11:04:19'),
('1010104', 'Book Shelf', 'Furniture & Fixturers', 3, 1, 1, 0, 'A', 0, 0, 0.00, 'admin', '2015-10-15 15:46:11', '', '0000-00-00 00:00:00'),
('1010407', 'Books and Journal', 'Others Assets', 3, 1, 1, 0, 'A', 0, 0, 0.00, 'admin', '2016-03-27 10:45:37', '', '0000-00-00 00:00:00'),
('102010207', 'Brac Bank', 'Cash At Bank', 4, 1, 1, 0, 'A', 0, 0, 0.00, '2', '2020-01-18 10:10:31', '', '0000-00-00 00:00:00'),
('4020604', 'Business Development Expenses', 'Promonational Expence', 3, 1, 1, 0, 'E', 0, 0, 0.00, 'admin', '2015-10-15 18:52:29', '', '0000-00-00 00:00:00'),
('4020606', 'Campaign Expenses', 'Promonational Expence', 3, 1, 1, 0, 'E', 0, 0, 0.00, 'admin', '2015-10-15 18:52:57', 'admin', '2016-09-19 14:52:48'),
('4020502', 'Campus Rent', 'House Rent', 3, 1, 1, 0, 'E', 0, 0, 0.00, 'admin', '2015-10-15 18:46:53', 'admin', '2017-04-27 17:02:39'),
('40212', 'Car Running Expenses', 'Other Expenses', 2, 1, 0, 1, 'E', 0, 0, 0.00, 'admin', '2015-10-15 19:28:43', '', '0000-00-00 00:00:00'),
('10201', 'Cash & Cash Equivalent', 'Current Asset', 2, 1, 0, 1, 'A', 0, 0, 0.00, '', '0000-00-00 00:00:00', 'admin', '2015-10-15 15:57:55'),
('1020102', 'Cash At Bank', 'Cash & Cash Equivalent', 3, 1, 0, 0, 'A', 0, 0, 0.00, '2', '2018-07-19 13:43:59', 'admin', '2015-10-15 15:32:42'),
('1020101', 'Cash In Hand', 'Cash & Cash Equivalent', 3, 1, 1, 1, 'A', 0, 0, 0.00, '2', '2018-07-31 12:56:28', 'admin', '2016-05-23 12:05:43'),
('30101', 'Cash Sale', 'Store Income', 1, 1, 1, 1, 'I', 0, 0, 0.00, '2', '2018-07-08 07:51:26', '', '0000-00-00 00:00:00'),
('1010207', 'CCTV', 'Office Equipment', 3, 1, 1, 0, 'A', 0, 0, 0.00, 'admin', '2015-10-15 15:51:24', '', '0000-00-00 00:00:00'),
('102020102', 'CEO Current A/C', 'Advance', 4, 1, 1, 0, 'A', 0, 0, 0.00, 'admin', '2016-09-25 11:54:54', '', '0000-00-00 00:00:00'),
('102010206', 'City Bank', 'Cash At Bank', 4, 1, 1, 0, 'A', 0, 0, 0.00, '2', '2020-01-18 10:09:32', '', '0000-00-00 00:00:00'),
('1010101', 'Class Room Chair', 'Furniture & Fixturers', 3, 1, 1, 0, 'A', 0, 0, 0.00, 'admin', '2015-10-15 15:45:29', '', '0000-00-00 00:00:00'),
('4021407', 'Close Circuit Cemera', 'Repair and Maintenance', 3, 1, 1, 0, 'E', 0, 0, 0.00, 'admin', '2015-10-15 19:35:35', '', '0000-00-00 00:00:00'),
('4020601', 'Commision on Admission', 'Promonational Expence', 3, 1, 1, 0, 'E', 0, 0, 0.00, 'admin', '2015-10-15 18:51:21', 'admin', '2016-09-19 14:42:54'),
('1010206', 'Computer', 'Office Equipment', 3, 1, 1, 0, 'A', 0, 0, 0.00, 'admin', '2015-10-15 15:51:09', '', '0000-00-00 00:00:00'),
('4021410', 'Computer (R)', 'Repair and Maintenance', 3, 1, 1, 0, 'E', 0, 0, 0.00, 'Zoherul', '2016-03-24 12:38:52', 'Zoherul', '2016-03-24 12:41:40'),
('1010102', 'Computer Table', 'Furniture & Fixturers', 3, 1, 1, 0, 'A', 0, 0, 0.00, 'admin', '2015-10-15 15:45:44', '', '0000-00-00 00:00:00'),
('301020401', 'Continuing Registration fee - UoL (Income)', 'Registration Fee (UOL) Income', 4, 1, 1, 0, 'I', 0, 0, 0.00, 'admin', '2015-10-15 17:40:40', '', '0000-00-00 00:00:00'),
('4020904', 'Contratuall Staff Salary', 'Salary & Allowances', 3, 1, 1, 0, 'E', 0, 0, 0.00, 'admin', '2015-10-15 19:12:34', '', '0000-00-00 00:00:00'),
('403', 'Cost of Sale', 'Expence', 0, 1, 1, 0, 'E', 0, 0, 0.00, '2', '2018-07-08 10:37:16', '', '0000-00-00 00:00:00'),
('30102', 'Credit Sale', 'Store Income', 1, 1, 1, 1, 'I', 0, 0, 0.00, '2', '2018-07-08 07:51:34', '', '0000-00-00 00:00:00'),
('4020709', 'Cultural Expense', 'Miscellaneous Expenses', 3, 1, 1, 0, 'E', 0, 0, 0.00, 'nasmud', '2017-04-29 12:45:10', '', '0000-00-00 00:00:00'),
('102', 'Current Asset', 'Assets', 1, 1, 0, 0, 'A', 0, 0, 0.00, '2', '2018-12-06 13:54:42', 'admin', '2018-07-07 11:23:00'),
('502', 'Current Liabilities', 'Liabilities', 1, 1, 0, 0, 'L', 0, 0, 0.00, 'anwarul', '2014-08-30 13:18:20', 'admin', '2015-10-15 19:49:21'),
('102030101', 'cusL-0001-Walkin', 'Customer Receivable', 4, 1, 1, 0, 'A', 0, 0, 0.00, '2', '2019-01-08 09:14:48', '', '2020-11-17 11:41:07'),
('102030108', 'cusL-0002-Jamil', 'Customer Receivable', 4, 1, 1, 0, 'A', 0, 0, 0.00, '2', '2021-08-25 14:12:02', '', '0000-00-00 00:00:00'),
('102030109', 'cusL-0004-Kabir khan', 'Customer Receivable', 4, 1, 1, 0, 'A', 0, 0, 0.00, '36', '2021-08-31 14:03:18', '', '0000-00-00 00:00:00'),
('102030115', 'cusL-0005-jaman', 'Customer Receivable', 4, 1, 1, 0, 'A', 0, 0, 0.00, '53', '2023-07-03 15:50:20', '', '0000-00-00 00:00:00'),
('102030116', 'cusL-0005-Ravi Kumar', 'Customer Receivable', 4, 1, 1, 0, 'A', 0, 0, 0.00, '2', '2025-01-24 18:48:16', '', '0000-00-00 00:00:00'),
('102030110', 'cusL-0007-jamil', 'Customer Receivable', 4, 1, 1, 0, 'A', 0, 0, 0.00, '39', '2021-09-05 19:38:26', '', '0000-00-00 00:00:00'),
('102030111', 'cusL-0008-kamal', 'Customer Receivable', 4, 1, 1, 0, 'A', 0, 0, 0.00, '40', '2021-09-19 11:53:13', '', '0000-00-00 00:00:00'),
('102030112', 'cusL-0009-shakil', 'Customer Receivable', 4, 1, 1, 0, 'A', 0, 0, 0.00, '41', '2021-10-26 10:20:44', '', '0000-00-00 00:00:00'),
('102030113', 'cusL-0010-shakil', 'Customer Receivable', 4, 1, 1, 0, 'A', 0, 0, 0.00, '42', '2021-10-26 10:23:52', '', '0000-00-00 00:00:00'),
('102030117', 'cusL-0016-Customer', 'Customer Receivable', 4, 1, 1, 0, 'A', 0, 0, 0.00, '66', '2025-03-03 16:28:30', '', '0000-00-00 00:00:00'),
('102030104', 'cusL-0018-jamildasd', 'Customer Receivable', 4, 1, 1, 0, 'A', 0, 0, 0.00, '20', '2021-01-05 14:14:11', '', '0000-00-00 00:00:00'),
('102030114', 'cusL-0019- ', 'Customer Receivable', 4, 1, 1, 0, 'A', 0, 0, 0.00, '0', '2021-11-10 14:06:32', '', '0000-00-00 00:00:00'),
('102030118', 'cusL-0020-Joy', 'Customer Receivable', 4, 1, 1, 0, 'A', 0, 0, 0.00, '70', '2025-07-31 15:43:25', '', '0000-00-00 00:00:00'),
('102030105', 'cusL-0021-jamil', 'Customer Receivable', 4, 1, 1, 0, 'A', 0, 0, 0.00, '25', '2021-01-31 14:17:07', '', '0000-00-00 00:00:00'),
('102030119', 'cusL-0021-Ravi Kumar', 'Customer Receivable', 4, 1, 1, 0, 'A', 0, 0, 0.00, '71', '2025-08-01 15:16:42', '', '0000-00-00 00:00:00'),
('102030120', 'cusL-0022-Ashish', 'Customer Receivable', 4, 1, 1, 0, 'A', 0, 0, 0.00, '168', '2025-08-04 15:49:23', '', '0000-00-00 00:00:00'),
('102030106', 'cusL-0022-Saiful Hassan', 'Customer Receivable', 4, 1, 1, 0, 'A', 0, 0, 0.00, '26', '2021-01-31 18:18:33', '', '0000-00-00 00:00:00'),
('102030121', 'cusL-0023-Ashish Kumar Tripathi', 'Customer Receivable', 4, 1, 1, 0, 'A', 0, 0, 0.00, '168', '2025-08-05 11:27:52', '', '0000-00-00 00:00:00'),
('102030107', 'cusL-0023-jamil', 'Customer Receivable', 4, 1, 1, 0, 'A', 0, 0, 0.00, '27', '2021-02-03 10:12:50', '', '0000-00-00 00:00:00'),
('102030122', 'cusL-0024-Ashish Kumar Tripathi', 'Customer Receivable', 4, 1, 1, 0, 'A', 0, 0, 0.00, '168', '2025-08-05 11:28:43', '', '0000-00-00 00:00:00'),
('102030123', 'cusL-0025-Ashish Kumar Tripathi', 'Customer Receivable', 4, 1, 1, 0, 'A', 0, 0, 0.00, '168', '2025-08-05 11:29:33', '', '0000-00-00 00:00:00'),
('102030124', 'cusL-0026-Ashish Kumar Tripathi', 'Customer Receivable', 4, 1, 1, 0, 'A', 0, 0, 0.00, '168', '2025-08-05 11:30:12', '', '0000-00-00 00:00:00'),
('102030125', 'cusL-0027-Ashish Kumar Tripathi', 'Customer Receivable', 4, 1, 1, 0, 'A', 0, 0, 0.00, '168', '2025-08-05 11:33:04', '', '0000-00-00 00:00:00'),
('1020301', 'Customer Receivable', 'Account Receivable', 3, 1, 0, 1, 'A', 0, 0, 0.00, '2', '2019-01-08 09:15:08', 'admin', '2018-07-07 12:31:42'),
('40100002', 'cw-Chichawatni', 'Store Expenses', 2, 1, 1, 0, 'E', 0, 0, 0.00, '2', '2018-08-02 16:30:41', '', '0000-00-00 00:00:00'),
('1020202', 'Deposit', 'Advance, Deposit And Pre-payments', 3, 1, 0, 0, 'A', 0, 0, 0.00, 'admin', '2015-10-15 15:40:42', '', '0000-00-00 00:00:00'),
('4020605', 'Design & Printing Expense', 'Promonational Expence', 3, 1, 1, 0, 'E', 0, 0, 0.00, 'admin', '2015-10-15 18:55:00', '', '0000-00-00 00:00:00'),
('4020404', 'Dish Bill', 'Utility Expenses', 3, 1, 1, 0, 'E', 0, 0, 0.00, 'admin', '2015-10-15 18:58:21', '', '0000-00-00 00:00:00'),
('40215', 'Dividend', 'Other Expenses', 2, 1, 1, 1, 'E', 0, 0, 0.00, 'admin', '2016-09-25 14:07:55', '', '0000-00-00 00:00:00'),
('4020403', 'Drinking Water Bill', 'Utility Expenses', 3, 1, 1, 0, 'E', 0, 0, 0.00, 'admin', '2015-10-15 18:58:10', '', '0000-00-00 00:00:00'),
('1010211', 'DSLR Camera', 'Office Equipment', 3, 1, 1, 0, 'A', 0, 0, 0.00, 'admin', '2015-10-15 15:53:17', 'admin', '2016-01-02 16:23:25'),
('102010205', 'Dutch-Bangla Bank', 'Cash At Bank', 4, 1, 1, 0, 'A', 0, 0, 0.00, '2', '2020-01-18 09:49:13', '', '0000-00-00 00:00:00'),
('502020000007', 'E3Y1WJMB-John Maria', 'Account Payable', 2, 1, 1, 0, 'L', 0, 0, 0.00, 'John Doe', '2019-01-27 05:55:58', '', '0000-00-00 00:00:00'),
('502020000010', 'E4Y91CAX-onlineorder', 'Account Payable', 2, 1, 1, 0, 'L', 0, 0, 0.00, 'John Doe', '2019-02-03 11:20:44', '', '0000-00-00 00:00:00'),
('502020000004', 'E97E9SJT-Manik Hassan', 'Account Payable', 2, 1, 1, 0, 'L', 0, 0, 0.00, 'John Doe', '2019-01-09 14:32:22', '', '0000-00-00 00:00:00'),
('4020908', 'Earned Leave', 'Salary & Allowances', 3, 1, 1, 0, 'E', 0, 0, 0.00, 'admin', '2015-10-15 19:13:38', '', '0000-00-00 00:00:00'),
('502020000006', 'EBK2UPRA-John Carlos', 'Account Payable', 2, 1, 1, 0, 'L', 0, 0, 0.00, 'John Doe', '2019-01-27 05:51:09', '', '0000-00-00 00:00:00'),
('4020607', 'Education Fair Expenses', 'Promonational Expence', 3, 1, 1, 0, 'E', 0, 0, 0.00, 'admin', '2015-10-15 18:53:42', '', '0000-00-00 00:00:00'),
('502020000011', 'EK9BYZVY-test sdafdssdfds', 'Account Payable', 2, 1, 1, 0, 'L', 0, 0, 0.00, 'John Doe', '2019-02-24 14:07:53', '', '0000-00-00 00:00:00'),
('1010602', 'Electric Equipment', 'Electrical Equipment', 3, 1, 1, 0, 'A', 0, 0, 0.00, 'admin', '2016-03-27 10:44:51', '', '0000-00-00 00:00:00'),
('1010203', 'Electric Kettle', 'Office Equipment', 3, 1, 1, 0, 'A', 0, 0, 0.00, 'admin', '2015-10-15 15:49:07', '', '0000-00-00 00:00:00'),
('10106', 'Electrical Equipment', 'Non Current Assets', 2, 1, 0, 1, 'A', 0, 0, 0.00, 'admin', '2016-03-27 10:43:44', '', '0000-00-00 00:00:00'),
('4020407', 'Electricity Bill', 'Utility Expenses', 3, 1, 1, 0, 'E', 0, 0, 0.00, 'admin', '2015-10-15 18:59:31', '', '0000-00-00 00:00:00'),
('10202010501', 'employ', 'Salary', 5, 1, 0, 0, 'A', 0, 0, 0.00, 'admin', '2018-07-05 11:47:10', '', '0000-00-00 00:00:00'),
('405', 'Entertainment', 'Expense', 1, 1, 1, 0, 'E', 1, 1, 1.00, '2', '2020-01-18 07:49:00', '', '0000-00-00 00:00:00'),
('502020000012', 'ENVBUZKE-kabirkhan', 'Account Payable', 2, 1, 1, 0, 'L', 0, 0, 0.00, 'John Doe', '2020-10-12 10:57:33', '', '0000-00-00 00:00:00'),
('502020000002', 'EQLAJFUW-AinalHaque', 'Account Payable', 2, 1, 1, 0, 'L', 0, 0, 0.00, 'John Doe', '2018-12-17 15:08:43', '', '0000-00-00 00:00:00'),
('2', 'Equity', 'COA', 0, 1, 0, 0, 'L', 0, 0, 0.00, '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00'),
('502020000009', 'EU3APTYY-JohnDoe', 'Account Payable', 2, 1, 1, 0, 'L', 0, 0, 0.00, 'John Doe', '2019-01-27 06:02:46', '', '0000-00-00 00:00:00'),
('502020000005', 'EW9PM201-test emp', 'Account Payable', 2, 1, 1, 0, 'L', 0, 0, 0.00, 'John Doe', '2019-01-09 14:38:15', '', '0000-00-00 00:00:00'),
('502020000008', 'EXL9WSCL-Mitchel Santner', 'Account Payable', 2, 1, 1, 0, 'L', 0, 0, 0.00, 'John Doe', '2019-01-27 05:58:55', '', '0000-00-00 00:00:00'),
('4', 'Expense', 'COA', 0, 1, 0, 0, 'E', 0, 0, 0.00, '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00'),
('502020000003', 'EY2T1OWA-jahangirAhmad', 'Account Payable', 2, 1, 1, 0, 'L', 0, 0, 0.00, 'John Doe', '2018-12-17 15:11:13', '', '0000-00-00 00:00:00'),
('502020000013', 'EZR0A9IB-DiMaria', 'Account Payable', 2, 1, 1, 0, 'L', 0, 0, 0.00, 'John Doe', '2021-11-14 10:54:22', '', '0000-00-00 00:00:00'),
('4020903', 'Faculty,Staff Salary & Allowances', 'Salary & Allowances', 3, 1, 1, 0, 'E', 0, 0, 0.00, 'admin', '2015-10-15 19:12:21', '', '0000-00-00 00:00:00'),
('4021404', 'Fax Machine', 'Repair and Maintenance', 3, 1, 1, 0, 'E', 0, 0, 0.00, 'admin', '2015-10-15 19:34:15', '', '0000-00-00 00:00:00'),
('4020905', 'Festival & Incentive Bonus', 'Salary & Allowances', 3, 1, 1, 0, 'E', 0, 0, 0.00, 'admin', '2015-10-15 19:12:48', '', '0000-00-00 00:00:00'),
('1010103', 'File Cabinet', 'Furniture & Fixturers', 3, 1, 1, 0, 'A', 0, 0, 0.00, 'admin', '2015-10-15 15:46:02', '', '0000-00-00 00:00:00'),
('40210', 'Financial Expenses', 'Other Expenses', 2, 1, 0, 1, 'E', 0, 0, 0.00, 'anwarul', '2013-08-20 12:24:31', 'admin', '2015-10-15 19:20:36'),
('1010403', 'Fire Extingushier', 'Others Assets', 3, 1, 1, 0, 'A', 0, 0, 0.00, 'admin', '2016-03-27 10:39:32', '', '0000-00-00 00:00:00'),
('4021408', 'Furniture', 'Repair and Maintenance', 3, 1, 1, 0, 'E', 0, 0, 0.00, 'admin', '2015-10-15 19:35:47', '', '0000-00-00 00:00:00'),
('10101', 'Furniture & Fixturers', 'Non Current Assets', 2, 1, 0, 1, 'A', 0, 0, 0.00, 'anwarul', '2013-08-20 16:18:15', 'anwarul', '2013-08-21 13:35:40'),
('4020406', 'Gas Bill', 'Utility Expenses', 3, 1, 1, 0, 'E', 0, 0, 0.00, 'admin', '2015-10-15 18:59:20', '', '0000-00-00 00:00:00'),
('20201', 'General Reserve', 'Reserve & Surplus', 2, 1, 1, 0, 'L', 0, 0, 0.00, 'admin', '2016-09-25 14:07:12', 'admin', '2016-10-02 17:48:49'),
('10105', 'Generator', 'Non Current Assets', 2, 1, 1, 1, 'A', 0, 0, 0.00, 'Zoherul', '2016-02-27 16:02:35', 'admin', '2016-05-23 12:05:18'),
('4021414', 'Generator Repair', 'Repair and Maintenance', 3, 1, 1, 0, 'E', 0, 0, 0.00, 'Zoherul', '2016-06-16 10:21:05', '', '0000-00-00 00:00:00'),
('40213', 'Generator Running Expenses', 'Other Expenses', 2, 1, 0, 1, 'E', 0, 0, 0.00, 'admin', '2015-10-15 19:29:29', '', '0000-00-00 00:00:00'),
('10103', 'Groceries and Cutleries', 'Non Current Assets', 2, 1, 1, 1, 'A', 0, 0, 0.00, '2', '2018-07-12 10:02:55', '', '0000-00-00 00:00:00'),
('1010408', 'Gym Equipment', 'Others Assets', 3, 1, 1, 0, 'A', 0, 0, 0.00, 'admin', '2016-03-27 10:46:03', '', '0000-00-00 00:00:00'),
('4020907', 'Honorarium', 'Salary & Allowances', 3, 1, 1, 0, 'E', 0, 0, 0.00, 'admin', '2015-10-15 19:13:26', '', '0000-00-00 00:00:00'),
('40205', 'House Rent', 'Other Expenses', 2, 1, 0, 1, 'E', 0, 0, 0.00, 'anwarul', '2013-08-24 10:26:56', '', '0000-00-00 00:00:00'),
('40100001', 'HP-Hasilpur', 'Academic Expenses', 2, 1, 1, 0, 'E', 0, 0, 0.00, '2', '2018-07-29 03:44:23', '', '0000-00-00 00:00:00'),
('4020702', 'HR Recruitment Expenses', 'Miscellaneous Expenses', 3, 1, 1, 0, 'E', 0, 0, 0.00, 'admin', '2016-09-25 12:55:49', '', '0000-00-00 00:00:00'),
('4020703', 'Incentive on Admission', 'Miscellaneous Expenses', 3, 1, 1, 0, 'E', 0, 0, 0.00, 'admin', '2016-09-25 12:56:09', '', '0000-00-00 00:00:00'),
('3', 'Income', 'COA', 0, 1, 0, 0, 'I', 0, 0, 0.00, '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00'),
('5020302', 'Income Tax Payable', 'Liabilities for Expenses', 3, 1, 0, 1, 'L', 0, 0, 0.00, 'admin', '2016-09-19 11:18:17', 'admin', '2016-09-28 13:18:35'),
('102020302', 'Insurance Premium', 'Prepayment', 4, 1, 1, 0, 'A', 0, 0, 0.00, 'admin', '2016-09-19 13:10:57', '', '0000-00-00 00:00:00'),
('4021001', 'Interest on Loan', 'Financial Expenses', 3, 1, 1, 0, 'E', 0, 0, 0.00, 'admin', '2015-10-15 19:20:53', 'admin', '2016-09-19 14:53:34'),
('4020401', 'Internet Bill', 'Utility Expenses', 3, 1, 1, 0, 'E', 0, 0, 0.00, 'admin', '2015-10-15 18:56:55', 'admin', '2015-10-15 18:57:32'),
('10107', 'Inventory', 'Non Current Assets', 1, 1, 0, 0, 'A', 0, 0, 0.00, '2', '2018-07-07 15:21:58', '', '0000-00-00 00:00:00'),
('102010309', 'iyzico', 'Online Payment', 2, 1, 1, 0, 'A', 0, 0, 0.00, '2', '2020-10-18 14:32:35', '', '0000-00-00 00:00:00'),
('10205010101', 'Jahangir', 'Hasan', 1, 1, 0, 0, 'A', 0, 0, 0.00, '2', '2018-07-07 10:40:56', '', '0000-00-00 00:00:00'),
('1010210', 'LCD TV', 'Office Equipment', 3, 1, 1, 0, 'A', 0, 0, 0.00, 'admin', '2015-10-15 15:52:27', '', '0000-00-00 00:00:00'),
('30103', 'Lease Sale', 'Store Income', 1, 1, 1, 1, 'I', 0, 0, 0.00, '2', '2018-07-08 07:51:52', '', '0000-00-00 00:00:00'),
('5', 'Liabilities', 'COA', 0, 1, 0, 0, 'L', 0, 0, 0.00, 'admin', '2013-07-04 12:32:07', 'admin', '2015-10-15 19:46:54'),
('50203', 'Liabilities for Expenses', 'Current Liabilities', 2, 1, 0, 0, 'L', 0, 0, 0.00, 'admin', '2015-10-15 19:50:59', '', '0000-00-00 00:00:00'),
('4020707', 'Library Expenses', 'Miscellaneous Expenses', 3, 1, 1, 0, 'E', 0, 0, 0.00, 'admin', '2017-01-10 15:34:54', '', '0000-00-00 00:00:00'),
('4021409', 'Lift', 'Repair and Maintenance', 3, 1, 1, 0, 'E', 0, 0, 0.00, 'admin', '2015-10-15 19:36:12', '', '0000-00-00 00:00:00'),
('50101', 'Long Term Borrowing', 'Non Current Liabilities', 2, 1, 0, 1, 'L', 0, 0, 0.00, 'admin', '2013-07-04 12:32:26', 'admin', '2015-10-15 19:47:40'),
('4020608', 'Marketing & Promotion Exp.', 'Promonational Expence', 3, 1, 1, 0, 'E', 0, 0, 0.00, 'admin', '2015-10-15 18:53:59', '', '0000-00-00 00:00:00'),
('4020901', 'Medical Allowance', 'Salary & Allowances', 3, 1, 1, 0, 'E', 0, 0, 0.00, 'admin', '2015-10-15 19:11:33', '', '0000-00-00 00:00:00'),
('1010411', 'Metal Ditector', 'Others Assets', 3, 1, 1, 0, 'A', 0, 0, 0.00, 'Zoherul', '2016-08-22 10:55:22', '', '0000-00-00 00:00:00'),
('4021413', 'Micro Oven', 'Repair and Maintenance', 3, 1, 1, 0, 'E', 0, 0, 0.00, 'Zoherul', '2016-05-12 14:53:51', '', '0000-00-00 00:00:00'),
('30202', 'Miscellaneous (Income)', 'Other Income', 2, 1, 1, 1, 'I', 0, 0, 0.00, 'anwarul', '2014-02-06 15:26:31', 'admin', '2016-09-25 11:04:35'),
('4020909', 'Miscellaneous Benifit', 'Salary & Allowances', 3, 1, 1, 0, 'E', 0, 0, 0.00, 'admin', '2015-10-15 19:13:53', '', '0000-00-00 00:00:00'),
('4020701', 'Miscellaneous Exp', 'Miscellaneous Expenses', 3, 1, 1, 0, 'E', 0, 0, 0.00, 'admin', '2016-09-25 12:54:39', '', '0000-00-00 00:00:00'),
('40207', 'Miscellaneous Expenses', 'Other Expenses', 2, 1, 0, 1, 'E', 0, 0, 0.00, 'anwarul', '2014-04-26 16:49:56', 'admin', '2016-09-25 12:54:19'),
('1010401', 'Mobile Phone', 'Others Assets', 3, 1, 1, 0, 'A', 0, 0, 0.00, 'admin', '2016-01-29 10:43:30', '', '0000-00-00 00:00:00'),
('102020101', 'Mr Ashiqur Rahman', 'Advance', 4, 1, 1, 0, 'A', 0, 0, 0.00, 'admin', '2015-12-31 16:47:23', 'admin', '2016-09-25 11:55:13'),
('1010212', 'Network Accessories', 'Office Equipment', 3, 1, 1, 0, 'A', 0, 0, 0.00, 'admin', '2016-01-02 16:23:32', '', '0000-00-00 00:00:00'),
('102020106', 'new head dfhgfh', 'Advance', 3, 1, 0, 0, 'A', 0, 0, 0.00, '2', '2020-01-16 06:25:10', '', '0000-00-00 00:00:00'),
('4020408', 'News Paper Bill', 'Utility Expenses', 3, 1, 1, 0, 'E', 0, 0, 0.00, 'admin', '2016-01-02 15:55:57', '', '0000-00-00 00:00:00'),
('101', 'Non Current Assets', 'Assets', 1, 1, 0, 0, 'A', 0, 0, 0.00, '', '0000-00-00 00:00:00', 'admin', '2015-10-15 15:29:11'),
('501', 'Non Current Liabilities', 'Liabilities', 1, 1, 0, 0, 'L', 0, 0, 0.00, 'anwarul', '2014-08-30 13:18:20', 'admin', '2015-10-15 19:49:21'),
('406', 'Office Accessories', 'Expense', 1, 1, 1, 0, 'E', 1, 1, 1.00, '2', '2020-01-18 07:51:32', '', '0000-00-00 00:00:00'),
('1010404', 'Office Decoration', 'Others Assets', 3, 1, 1, 0, 'A', 0, 0, 0.00, 'admin', '2016-03-27 10:40:02', '', '0000-00-00 00:00:00'),
('10102', 'Office Equipment', 'Non Current Assets', 2, 1, 0, 1, 'A', 0, 0, 0.00, 'anwarul', '2013-12-06 18:08:00', 'admin', '2015-10-15 15:48:21'),
('4021401', 'Office Repair & Maintenance', 'Repair and Maintenance', 3, 1, 1, 0, 'E', 0, 0, 0.00, 'admin', '2015-10-15 19:33:15', '', '0000-00-00 00:00:00'),
('30201', 'Office Stationary (Income)', 'Other Income', 2, 1, 1, 1, 'I', 0, 0, 0.00, 'anwarul', '2013-07-17 15:21:06', 'admin', '2016-09-25 11:04:50'),
('1020103', 'Online Payment', 'Cash & Cash Equivalent', 2, 1, 0, 1, 'A', 0, 0, 0.00, '2', '2020-10-18 14:26:41', '', '0000-00-00 00:00:00'),
('102010308', 'Orange Money payment', 'Online Payment', 2, 1, 1, 0, 'A', 0, 0, 0.00, '2', '2020-10-18 14:32:11', '', '0000-00-00 00:00:00'),
('402', 'Other Expenses', 'Expense', 1, 1, 0, 0, 'E', 0, 0, 0.00, '2', '2018-07-07 14:00:16', 'admin', '2015-10-15 18:37:42'),
('302', 'Other Income', 'Income', 1, 1, 0, 0, 'I', 0, 0, 0.00, '2', '2018-07-07 13:40:57', 'admin', '2016-09-25 11:04:09'),
('40211', 'Others (Non Academic Expenses)', 'Other Expenses', 2, 1, 0, 1, 'E', 0, 0, 0.00, 'Obaidul', '2014-12-03 16:05:42', 'admin', '2015-10-15 19:22:09'),
('30205', 'Others (Non-Academic Income)', 'Other Income', 2, 1, 0, 1, 'I', 0, 0, 0.00, 'admin', '2015-10-15 17:23:49', 'admin', '2015-10-15 17:57:52'),
('10104', 'Others Assets', 'Non Current Assets', 2, 1, 0, 1, 'A', 0, 0, 0.00, 'admin', '2016-01-29 10:43:16', '', '0000-00-00 00:00:00'),
('4020910', 'Outstanding Salary', 'Salary & Allowances', 3, 1, 1, 0, 'E', 0, 0, 0.00, 'Zoherul', '2016-04-24 11:56:50', '', '0000-00-00 00:00:00'),
('4021405', 'Oven', 'Repair and Maintenance', 3, 1, 1, 0, 'E', 0, 0, 0.00, 'admin', '2015-10-15 19:34:31', '', '0000-00-00 00:00:00'),
('4021412', 'PABX-Repair', 'Repair and Maintenance', 3, 1, 1, 0, 'E', 0, 0, 0.00, 'Zoherul', '2016-04-24 14:40:18', '', '0000-00-00 00:00:00'),
('4020902', 'Part-time Staff Salary', 'Salary & Allowances', 3, 1, 1, 0, 'E', 0, 0, 0.00, 'admin', '2015-10-15 19:12:06', '', '0000-00-00 00:00:00'),
('102010301', 'Paypal', 'Online Payment', 2, 1, 1, 0, 'A', 0, 0, 0.00, '2', '2020-10-18 14:27:41', '', '0000-00-00 00:00:00'),
('102010306', 'Paystack Payments', 'Online Payment', 2, 1, 1, 0, 'A', 0, 0, 0.00, '2', '2020-10-18 14:30:55', '', '0000-00-00 00:00:00'),
('102010307', 'Paytm Payments', 'Online Payment', 2, 1, 1, 0, 'A', 0, 0, 0.00, '2', '2020-10-18 14:31:23', '', '0000-00-00 00:00:00'),
('1010202', 'Photocopy & Fax Machine', 'Office Equipment', 3, 1, 1, 0, 'A', 0, 0, 0.00, 'admin', '2015-10-15 15:47:27', 'admin', '2016-05-23 12:14:40'),
('4021411', 'Photocopy Machine Repair', 'Repair and Maintenance', 3, 1, 1, 0, 'E', 0, 0, 0.00, 'Zoherul', '2016-04-24 12:40:02', 'admin', '2017-04-27 17:03:17'),
('3020503', 'Practical Fee', 'Others (Non-Academic Income)', 3, 1, 1, 1, 'I', 0, 0, 0.00, 'admin', '2017-07-22 18:00:37', '', '0000-00-00 00:00:00'),
('1020203', 'Prepayment', 'Advance, Deposit And Pre-payments', 3, 1, 0, 1, 'A', 0, 0, 0.00, 'admin', '2015-10-15 15:40:51', 'admin', '2015-12-31 16:49:58'),
('1010201', 'Printer', 'Office Equipment', 3, 1, 1, 0, 'A', 0, 0, 0.00, 'admin', '2015-10-15 15:47:15', '', '0000-00-00 00:00:00'),
('407', 'Product Purchase', 'Expense', 0, 1, 0, 0, 'E', 0, 0, 0.00, '2', '2020-01-23 07:09:10', '', '0000-00-00 00:00:00'),
('3020502', 'Professional Training Course(Oracal-1)', 'Others (Non-Academic Income)', 3, 1, 1, 0, 'I', 0, 0, 0.00, 'nasim', '2017-06-22 13:28:05', '', '0000-00-00 00:00:00'),
('30207', 'Professional Training Course(Oracal)', 'Other Income', 2, 1, 0, 1, 'I', 0, 0, 0.00, 'nasim', '2017-06-22 13:24:16', 'nasim', '2017-06-22 13:25:56'),
('1010208', 'Projector', 'Office Equipment', 3, 1, 1, 0, 'A', 0, 0, 0.00, 'admin', '2015-10-15 15:51:44', '', '0000-00-00 00:00:00'),
('40206', 'Promonational Expense', 'Other Expenses', 2, 1, 0, 1, 'E', 0, 0, 0.00, 'anwarul', '2013-07-11 13:48:57', 'anwarul', '2013-07-17 14:23:03'),
('40214', 'Repair and Maintenance', 'Other Expenses', 2, 1, 0, 1, 'E', 0, 0, 0.00, 'admin', '2015-10-15 19:32:46', '', '0000-00-00 00:00:00'),
('202', 'Reserve & Surplus', 'Equity', 1, 1, 0, 1, 'L', 0, 0, 0.00, 'admin', '2016-09-25 14:06:34', 'admin', '2016-10-02 17:48:57'),
('20102', 'Retained Earnings', 'Share Holders Equity', 2, 1, 1, 1, 'L', 0, 0, 0.00, 'admin', '2016-05-23 11:20:40', 'admin', '2016-09-25 14:05:06'),
('4020708', 'River Cruse', 'Miscellaneous Expenses', 3, 1, 1, 0, 'E', 0, 0, 0.00, 'admin', '2017-04-24 15:35:25', '', '0000-00-00 00:00:00'),
('102010311', 'RMA PAYMENT GATEWAY', 'Online Payment', 2, 1, 1, 0, 'A', 0, 0, 0.00, '2', '2020-10-18 14:33:12', '', '0000-00-00 00:00:00'),
('102020105', 'Salary', 'Advance', 4, 1, 0, 0, 'A', 0, 0, 0.00, 'admin', '2018-07-05 11:46:44', '', '0000-00-00 00:00:00'),
('40209', 'Salary & Allowances', 'Other Expenses', 2, 1, 0, 1, 'E', 0, 0, 0.00, 'anwarul', '2013-12-12 11:22:58', '', '0000-00-00 00:00:00'),
('404', 'Sale Discount', 'Expense', 1, 1, 1, 0, 'E', 0, 0, 0.00, '2', '2018-07-19 10:15:11', '', '0000-00-00 00:00:00'),
('303', 'Sale Income', 'Income', 0, 1, 1, 1, 'I', 0, 0, 0.00, '2', '2020-01-23 06:58:20', '', '0000-00-00 00:00:00'),
('1010406', 'Security Equipment', 'Others Assets', 3, 1, 1, 0, 'A', 0, 0, 0.00, 'admin', '2016-03-27 10:41:30', '', '0000-00-00 00:00:00'),
('30104', 'Service Charge Income', 'Store Income', 1, 1, 1, 0, 'I', 0, 0, 0.00, '2', '2020-12-30 11:23:32', '', '0000-00-00 00:00:00'),
('20101', 'Share Capital', 'Share Holders Equity', 2, 1, 0, 1, 'L', 0, 0, 0.00, 'anwarul', '2013-12-08 19:37:32', 'admin', '2015-10-15 19:45:35'),
('201', 'Share Holders Equity', 'Equity', 1, 1, 0, 0, 'L', 0, 0, 0.00, '', '0000-00-00 00:00:00', 'admin', '2015-10-15 19:43:51'),
('50201', 'Short Term Borrowing', 'Current Liabilities', 2, 1, 0, 1, 'L', 0, 0, 0.00, 'admin', '2015-10-15 19:50:30', '', '0000-00-00 00:00:00'),
('102010310', 'SIPS Office', 'Online Payment', 2, 1, 1, 0, 'A', 0, 0, 0.00, '2', '2020-10-18 14:32:54', '', '0000-00-00 00:00:00'),
('4020906', 'Special Allowances', 'Salary & Allowances', 3, 1, 1, 0, 'E', 0, 0, 0.00, 'admin', '2015-10-15 19:13:13', '', '0000-00-00 00:00:00'),
('50102', 'Sponsors Loan', 'Non Current Liabilities', 2, 1, 0, 1, 'L', 0, 0, 0.00, 'admin', '2015-10-15 19:48:02', '', '0000-00-00 00:00:00'),
('4020706', 'Sports Expense', 'Miscellaneous Expenses', 3, 1, 1, 0, 'E', 0, 0, 0.00, 'nasmud', '2016-11-09 13:16:53', '', '0000-00-00 00:00:00'),
('102010304', 'Square Payments', 'Online Payment', 2, 1, 1, 0, 'A', 0, 0, 0.00, '2', '2020-10-18 14:29:32', '', '0000-00-00 00:00:00'),
('102010302', 'SSLCommerz', 'Online Payment', 2, 1, 1, 0, 'A', 0, 0, 0.00, '2', '2020-10-18 14:28:06', '', '0000-00-00 00:00:00'),
('401', 'Store Expenses', 'Expense', 1, 1, 0, 0, 'E', 0, 0, 0.00, '2', '2018-07-07 13:38:59', 'admin', '2015-10-15 17:58:46'),
('301', 'Store Income', 'Income', 1, 1, 0, 0, 'I', 0, 0, 0.00, '2', '2018-07-07 13:40:37', 'admin', '2015-09-17 17:00:02'),
('102010305', 'Stripe Payment', 'Online Payment', 2, 1, 1, 0, 'A', 0, 0, 0.00, '2', '2020-10-18 14:29:59', '', '0000-00-00 00:00:00'),
('3020501', 'Students Info. Correction Fee', 'Others (Non-Academic Income)', 3, 1, 1, 0, 'I', 0, 0, 0.00, 'admin', '2015-10-15 17:24:45', '', '0000-00-00 00:00:00'),
('1010601', 'Sub Station', 'Electrical Equipment', 3, 1, 1, 0, 'A', 0, 0, 0.00, 'admin', '2016-03-27 10:44:11', '', '0000-00-00 00:00:00'),
('502020501', 'sup_002-Kamal Hossain', 'Suppliers', 4, 1, 1, 0, 'L', 0, 0, 0.00, '2', '2020-01-18 10:49:49', '', '0000-00-00 00:00:00'),
('502020505', 'sup_002-Mohan Store', 'Suppliers', 4, 1, 1, 0, 'L', 0, 0, 0.00, '2', '2025-01-27 11:02:03', '', '0000-00-00 00:00:00'),
('502020506', 'sup_002-Patza', 'Suppliers', 4, 1, 1, 0, 'L', 0, 0, 0.00, '2', '2025-03-11 21:21:48', '', '0000-00-00 00:00:00'),
('502020504', 'sup_002-Supplier_1', 'Suppliers', 4, 1, 1, 0, 'L', 0, 0, 0.00, '2', '2020-09-08 14:26:40', '', '0000-00-00 00:00:00'),
('502020502', 'sup_003-Maruf', 'Suppliers', 4, 1, 1, 0, 'L', 0, 0, 0.00, '2', '2020-01-18 10:56:31', '', '0000-00-00 00:00:00'),
('502020507', 'sup_003-Rizvi', 'Suppliers', 4, 1, 1, 0, 'L', 0, 0, 0.00, '2', '2025-05-09 20:52:32', '', '0000-00-00 00:00:00'),
('502020503', 'sup_004-Saiful', 'Suppliers', 4, 1, 1, 0, 'L', 0, 0, 0.00, '2', '2020-01-18 10:57:04', '2', '2020-01-21 13:10:59'),
('5020205', 'Suppliers', 'Account Payable', 3, 1, 0, 1, 'L', 0, 0, 0.00, '2', '2018-12-15 06:50:12', '', '0000-00-00 00:00:00'),
('4020704', 'TB Care Expenses', 'Miscellaneous Expenses', 3, 1, 1, 0, 'E', 0, 0, 0.00, 'admin', '2016-10-08 13:03:04', '', '0000-00-00 00:00:00'),
('4020501', 'TDS on House Rent', 'House Rent', 3, 1, 1, 0, 'E', 0, 0, 0.00, 'admin', '2015-10-15 18:44:07', 'admin', '2016-09-19 14:40:16'),
('502030201', 'TDS Payable House Rent', 'Income Tax Payable', 4, 1, 1, 0, 'L', 0, 0, 0.00, 'admin', '2016-09-19 11:19:42', 'admin', '2016-09-28 13:19:37'),
('502030203', 'TDS Payable on Advertisement Bill', 'Income Tax Payable', 4, 1, 1, 0, 'L', 0, 0, 0.00, 'admin', '2016-09-28 13:20:51', '', '0000-00-00 00:00:00'),
('502030202', 'TDS Payable on Salary', 'Income Tax Payable', 4, 1, 1, 0, 'L', 0, 0, 0.00, 'admin', '2016-09-28 13:20:17', '', '0000-00-00 00:00:00'),
('4021402', 'Tea Kettle', 'Repair and Maintenance', 3, 1, 1, 0, 'E', 0, 0, 0.00, 'admin', '2015-10-15 19:33:45', '', '0000-00-00 00:00:00'),
('4020402', 'Telephone Bill', 'Utility Expenses', 3, 1, 1, 0, 'E', 0, 0, 0.00, 'admin', '2015-10-15 18:57:59', '', '0000-00-00 00:00:00'),
('1010209', 'Telephone Set & PABX', 'Office Equipment', 3, 1, 1, 0, 'A', 0, 0, 0.00, 'admin', '2015-10-15 15:51:57', 'admin', '2016-10-02 17:10:40'),
('102020104', 'Test', 'Advance', 4, 1, 1, 0, 'A', 0, 0, 0.00, 'admin', '2018-07-05 11:42:48', '', '0000-00-00 00:00:00'),
('40203', 'Travelling & Conveyance', 'Other Expenses', 2, 1, 1, 1, 'E', 0, 0, 0.00, 'admin', '2013-07-08 16:22:06', 'admin', '2015-10-15 18:45:13'),
('4021406', 'TV', 'Repair and Maintenance', 3, 1, 1, 0, 'E', 0, 0, 0.00, 'admin', '2015-10-15 19:35:07', '', '0000-00-00 00:00:00'),
('102010303', 'Two Checkout', 'Online Payment', 2, 1, 1, 0, 'A', 0, 0, 0.00, '2', '2020-10-18 14:28:29', '', '0000-00-00 00:00:00'),
('1010205', 'UPS', 'Office Equipment', 3, 1, 1, 0, 'A', 0, 0, 0.00, 'admin', '2015-10-15 15:50:38', '', '0000-00-00 00:00:00'),
('40204', 'Utility Expenses', 'Other Expenses', 2, 1, 0, 1, 'E', 0, 0, 0.00, 'anwarul', '2013-07-11 16:20:24', 'admin', '2016-01-02 15:55:22'),
('4020503', 'VAT on House Rent Exp', 'House Rent', 3, 1, 1, 0, 'E', 0, 0, 0.00, 'admin', '2015-10-15 18:49:22', 'admin', '2016-09-25 14:00:52'),
('5020301', 'VAT Payable', 'Liabilities for Expenses', 3, 1, 0, 1, 'L', 0, 0, 0.00, 'admin', '2015-10-15 19:51:11', 'admin', '2016-09-28 13:23:53'),
('502030101', 'VAT- TAX', 'VAT Payable', 3, 1, 1, 0, 'L', 0, 0, 0.00, '2', '2020-12-30 10:58:49', '', '0000-00-00 00:00:00'),
('1010409', 'Vehicle A/C', 'Others Assets', 3, 1, 1, 0, 'A', 0, 0, 0.00, 'Zoherul', '2016-05-12 12:13:21', '', '0000-00-00 00:00:00'),
('1010405', 'Voltage Stablizer', 'Others Assets', 3, 1, 1, 0, 'A', 0, 0, 0.00, 'admin', '2016-03-27 10:40:59', '', '0000-00-00 00:00:00'),
('1010105', 'Waiting Sofa - Steel', 'Furniture & Fixturers', 3, 1, 1, 0, 'A', 0, 0, 0.00, 'admin', '2015-10-15 15:46:29', '', '0000-00-00 00:00:00'),
('4020405', 'WASA Bill', 'Utility Expenses', 3, 1, 1, 0, 'E', 0, 0, 0.00, 'admin', '2015-10-15 18:58:51', '', '0000-00-00 00:00:00'),
('1010402', 'Water Purifier', 'Others Assets', 3, 1, 1, 0, 'A', 0, 0, 0.00, 'admin', '2016-01-29 11:14:11', '', '0000-00-00 00:00:00'),
('4020705', 'Website Development Expenses', 'Miscellaneous Expenses', 3, 1, 1, 0, 'E', 0, 0, 0.00, 'admin', '2016-10-15 12:42:47', '', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `acc_customer_income`
--

CREATE TABLE `acc_customer_income` (
  `ID` int(11) NOT NULL,
  `Customer_Id` varchar(50) NOT NULL,
  `VNo` varchar(50) NOT NULL,
  `Date` date NOT NULL,
  `Amount` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `acc_glsummarybalance`
--

CREATE TABLE `acc_glsummarybalance` (
  `ID` int(11) NOT NULL,
  `COAID` varchar(50) DEFAULT NULL,
  `Debit` decimal(18,2) DEFAULT NULL,
  `Credit` decimal(18,2) DEFAULT NULL,
  `FYear` int(11) DEFAULT NULL,
  `CreateBy` varchar(50) DEFAULT NULL,
  `CreateDate` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `acc_income_expence`
--

CREATE TABLE `acc_income_expence` (
  `ID` int(11) NOT NULL,
  `VNo` varchar(50) NOT NULL,
  `Student_Id` varchar(50) NOT NULL,
  `Date` date NOT NULL,
  `Paymode` varchar(50) NOT NULL,
  `Perpose` varchar(50) NOT NULL,
  `Narration` text NOT NULL,
  `StoreID` int(11) NOT NULL,
  `COAID` varchar(50) NOT NULL,
  `Amount` decimal(10,2) NOT NULL,
  `IsApprove` tinyint(4) NOT NULL,
  `CreateBy` varchar(50) NOT NULL,
  `CreateDate` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `acc_temp`
--

CREATE TABLE `acc_temp` (
  `COAID` varchar(50) NOT NULL,
  `Name` varchar(50) NOT NULL,
  `Debit` decimal(18,2) NOT NULL,
  `Credit` decimal(18,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `acc_transaction`
--

CREATE TABLE `acc_transaction` (
  `ID` int(11) NOT NULL,
  `VNo` varchar(50) DEFAULT NULL,
  `Vtype` varchar(50) DEFAULT NULL,
  `VDate` date DEFAULT NULL,
  `COAID` varchar(50) DEFAULT NULL,
  `Narration` text DEFAULT NULL,
  `Debit` decimal(18,2) DEFAULT NULL,
  `Credit` decimal(18,2) DEFAULT NULL,
  `StoreID` int(11) NOT NULL,
  `IsPosted` char(10) DEFAULT NULL,
  `CreateBy` varchar(50) DEFAULT NULL,
  `CreateDate` datetime DEFAULT NULL,
  `UpdateBy` varchar(50) DEFAULT NULL,
  `UpdateDate` datetime DEFAULT NULL,
  `IsAppove` char(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

--
-- Dumping data for table `acc_transaction`
--

INSERT INTO `acc_transaction` (`ID`, `VNo`, `Vtype`, `VDate`, `COAID`, `Narration`, `Debit`, `Credit`, `StoreID`, `IsPosted`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`, `IsAppove`) VALUES
(1, 'Sale0001', 'Sales Products', '2025-08-04', '1020101', 'Sale Income For Online paymentcusL-0005-Ravi Kumar', 17.06, 0.00, 0, '1', '168', '2025-08-04 00:00:00', NULL, NULL, '1'),
(2, '0001', 'CIV', '2025-08-04', '102030116', 'Customer debit for Product Invoice#0001', 15.16, 0.00, 0, '1', '168', '2025-08-04 00:00:00', NULL, NULL, '1'),
(3, '0001', 'CIV', '2025-08-04', '10107', 'Inventory Credit for Product Invoice#0001', 0.00, 15.16, 0, '1', '168', '2025-08-04 00:00:00', NULL, NULL, '1'),
(4, '0001', 'CIV', '2025-08-04', '102030116', 'Customer Credit for Product Invoice#0001', 0.00, 15.16, 0, '1', '168', '2025-08-04 00:00:00', NULL, NULL, '1'),
(5, 'Sale0001', 'Sales Products', '2025-08-04', '303', 'Sale Income For cusL-0005-Ravi Kumar', 0.00, 15.16, 0, '1', '168', '2025-08-04 00:00:00', NULL, NULL, '1'),
(6, 'Sale0005', 'Sales Products', '2025-08-05', '1020101', 'Sale Income For Online paymentcusL-0001-Walkin', 42.85, 0.00, 0, '1', '168', '2025-08-05 00:00:00', NULL, NULL, '1'),
(7, 'Sale0006', 'Sales Products', '2025-08-05', '1020101', 'Sale Income For Online paymentcusL-0005-Ravi Kumar', 74.57, 0.00, 0, '1', '168', '2025-08-05 00:00:00', NULL, NULL, '1'),
(8, '0006', 'CIV', '2025-08-05', '102030116', 'Customer debit for Product Invoice#0006', 66.28, 0.00, 0, '1', '168', '2025-08-05 00:00:00', NULL, NULL, '1'),
(9, '0006', 'CIV', '2025-08-05', '10107', 'Inventory Credit for Product Invoice#0006', 0.00, 66.28, 0, '1', '168', '2025-08-05 00:00:00', NULL, NULL, '1'),
(10, '0006', 'CIV', '2025-08-05', '102030116', 'Customer Credit for Product Invoice#0006', 0.00, 66.28, 0, '1', '168', '2025-08-05 00:00:00', NULL, NULL, '1'),
(11, 'Sale0006', 'Sales Products', '2025-08-05', '303', 'Sale Income For cusL-0005-Ravi Kumar', 0.00, 66.28, 0, '1', '168', '2025-08-05 00:00:00', NULL, NULL, '1');

-- --------------------------------------------------------

--
-- Table structure for table `acn_account_transaction`
--

CREATE TABLE `acn_account_transaction` (
  `account_tran_id` int(10) UNSIGNED NOT NULL,
  `account_id` int(11) NOT NULL,
  `transaction_description` varchar(255) NOT NULL,
  `amount` varchar(25) NOT NULL,
  `tran_date` date NOT NULL,
  `payment_id` int(11) NOT NULL,
  `create_by_id` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `add_ons`
--

CREATE TABLE `add_ons` (
  `add_on_id` int(11) NOT NULL,
  `modifier_set_id` int(20) NOT NULL,
  `add_on_name` varchar(200) NOT NULL,
  `price` decimal(10,2) NOT NULL DEFAULT 0.00,
  `minqty` int(11) NOT NULL DEFAULT 0,
  `maxqty` int(11) NOT NULL DEFAULT 0,
  `is_comp` int(11) NOT NULL DEFAULT 0,
  `modifier_id` int(11) NOT NULL DEFAULT 0,
  `is_food_item` int(11) NOT NULL DEFAULT 0 COMMENT '0 = N/A, 1 = item_foods, 2 = ingredients',
  `sort_order` int(20) NOT NULL DEFAULT 0,
  `is_active` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

--
-- Dumping data for table `add_ons`
--

INSERT INTO `add_ons` (`add_on_id`, `modifier_set_id`, `add_on_name`, `price`, `minqty`, `maxqty`, `is_comp`, `modifier_id`, `is_food_item`, `sort_order`, `is_active`) VALUES
(1, 1, 'Hot', 0.00, 0, 0, 0, 0, 0, 0, 1),
(2, 1, 'Medium', 0.00, 0, 0, 0, 0, 0, 0, 1),
(3, 1, 'Mild', 0.00, 0, 0, 0, 0, 0, 0, 1),
(4, 1, 'Extra Hot', 0.00, 0, 0, 0, 0, 0, 0, 1),
(5, 2, 'Rare', 0.00, 0, 0, 0, 0, 0, 0, 1),
(6, 2, 'Rare to Medium', 0.00, 0, 0, 0, 0, 0, 0, 1),
(7, 2, 'Medium', 0.00, 0, 0, 0, 0, 0, 0, 1),
(8, 2, 'Medium to Welldone', 0.00, 0, 0, 0, 0, 0, 0, 1),
(9, 2, 'Welldone', 0.00, 0, 0, 0, 0, 0, 0, 1),
(10, 3, 'NAAN', 0.00, 1, 1, 0, 90, 1, 0, 1),
(11, 4, 'Chutney', 0.00, 1, 1, 0, 96, 1, 0, 1),
(18, 5, 'Jeera Rice', 0.00, 0, 0, 0, 74, 1, 0, 1),
(19, 5, 'Pulao Rice', 2.00, 0, 0, 0, 76, 1, 0, 1),
(20, 5, 'Lamb Cutlets (4 Per Serve)', 2.00, 0, 0, 0, 26, 1, 0, 1),
(21, 5, 'Saffron Rice', 0.00, 0, 0, 0, 73, 1, 0, 1),
(22, 5, 'Coconut Rice', 2.00, 0, 0, 0, 75, 1, 0, 1),
(23, 5, 'Alu Bonda (3 per serve)', 0.00, 0, 0, 0, 17, 1, 0, 1),
(24, 6, 'Yoghurt & Cucumber Raita', 0.00, 0, 0, 0, 91, 1, 0, 1),
(25, 6, 'Yoghurt & Mint Sauce ', 0.00, 0, 0, 0, 92, 1, 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `add_on_ingr_dtls`
--

CREATE TABLE `add_on_ingr_dtls` (
  `id` int(11) NOT NULL,
  `add_on_id` int(11) NOT NULL,
  `modifier_set_id` int(11) NOT NULL,
  `modifier_foodid` int(11) NOT NULL,
  `modifier_ingr_id` int(11) NOT NULL,
  `modifier_ingr_qty` decimal(10,2) NOT NULL,
  `modifier_ingr_adj_qty` decimal(10,2) NOT NULL,
  `modifier_ingr_unitname` varchar(50) NOT NULL,
  `modifier_ingr_unitid` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `award`
--

CREATE TABLE `award` (
  `award_id` int(11) NOT NULL,
  `award_name` varchar(50) NOT NULL,
  `aw_description` varchar(200) NOT NULL,
  `awr_gift_item` varchar(50) NOT NULL,
  `date` date NOT NULL,
  `employee_id` varchar(30) NOT NULL,
  `awarded_by` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `bank_summary`
--

CREATE TABLE `bank_summary` (
  `bank_id` varchar(250) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `deposite_id` varchar(250) DEFAULT NULL,
  `date` varchar(250) DEFAULT NULL,
  `ac_type` varchar(50) DEFAULT NULL,
  `dr` float DEFAULT NULL,
  `cr` float DEFAULT NULL,
  `ammount` float DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `bill`
--

CREATE TABLE `bill` (
  `bill_id` bigint(20) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `order_id` bigint(20) NOT NULL,
  `total_amount` float NOT NULL,
  `discount` float NOT NULL,
  `service_charge` float NOT NULL,
  `shipping_type` int(11) DEFAULT NULL COMMENT '1=home,2=pickup,3=none',
  `delivarydate` datetime DEFAULT NULL,
  `VAT` float NOT NULL,
  `bill_amount` float NOT NULL,
  `bill_date` date NOT NULL,
  `bill_time` time NOT NULL,
  `create_at` datetime DEFAULT '1970-01-01 01:01:01',
  `bill_status` tinyint(1) NOT NULL COMMENT '0=unpaid, 1=paid',
  `payment_method_id` tinyint(4) NOT NULL,
  `create_by` int(11) NOT NULL,
  `create_date` date NOT NULL,
  `update_by` int(11) NOT NULL,
  `update_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

--
-- Dumping data for table `bill`
--

INSERT INTO `bill` (`bill_id`, `customer_id`, `order_id`, `total_amount`, `discount`, `service_charge`, `shipping_type`, `delivarydate`, `VAT`, `bill_amount`, `bill_date`, `bill_time`, `create_at`, `bill_status`, `payment_method_id`, `create_by`, `create_date`, `update_by`, `update_date`) VALUES
(1, 54, 1, 18.95, 1.895, 0, NULL, NULL, 1.895, 17.055, '2025-08-04', '13:51:50', '2025-08-04 13:52:14', 1, 4, 168, '2025-08-04', 0, '0000-00-00'),
(2, 54, 2, 23.95, 0, 0, NULL, NULL, 2.395, 23.95, '2025-08-04', '15:52:09', '1970-01-01 01:01:01', 0, 4, 2, '2025-08-04', 0, '0000-00-00'),
(3, 54, 3, 18.95, 0, 0, NULL, NULL, 1.895, 18.95, '2025-08-04', '15:55:24', '1970-01-01 01:01:01', 0, 4, 2, '2025-08-04', 0, '0000-00-00'),
(4, 1, 4, 47.9, 0, 0, NULL, NULL, 4.79, 47.9, '2025-08-04', '16:27:46', '1970-01-01 01:01:01', 0, 4, 168, '2025-08-04', 0, '0000-00-00'),
(5, 1, 5, 85.54, 0, 0, NULL, NULL, 8.554, 85.54, '2025-08-05', '10:59:45', '1970-01-01 01:01:01', 0, 4, 168, '2025-08-05', 0, '0000-00-00'),
(6, 54, 6, 82.85, 8.285, 0, NULL, NULL, 8.285, 74.565, '2025-08-05', '11:38:24', '2025-08-05 11:44:19', 1, 4, 168, '2025-08-05', 0, '0000-00-00'),
(7, 54, 7, 150.5, 0, 0, NULL, NULL, 15.05, 150.5, '2025-08-05', '11:47:35', '1970-01-01 01:01:01', 0, 4, 168, '2025-08-05', 0, '0000-00-00'),
(8, 77, 8, 56.85, 0, 0, NULL, NULL, 5.685, 56.85, '2025-08-05', '12:03:59', '1970-01-01 01:01:01', 0, 4, 168, '2025-08-05', 0, '0000-00-00'),
(9, 77, 9, 32, 0, 0, NULL, NULL, 3.2, 32, '2025-08-05', '12:05:25', '1970-01-01 01:01:01', 0, 4, 168, '2025-08-05', 0, '0000-00-00'),
(10, 77, 10, 32, 0, 0, NULL, NULL, 3.2, 32, '2025-08-05', '12:08:28', '1970-01-01 01:01:01', 0, 4, 168, '2025-08-05', 0, '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `bill_card_payment`
--

CREATE TABLE `bill_card_payment` (
  `row_id` bigint(20) NOT NULL,
  `bill_id` bigint(20) NOT NULL,
  `multipay_id` int(11) DEFAULT NULL,
  `card_no` varchar(200) DEFAULT NULL,
  `terminal_name` int(11) NOT NULL,
  `bank_name` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `bkp_13062025_contact_data`
--

CREATE TABLE `bkp_13062025_contact_data` (
  `id` int(11) NOT NULL,
  `fullname` varchar(120) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `text` varchar(350) DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `bkp_13062025_contact_data`
--

INSERT INTO `bkp_13062025_contact_data` (`id`, `fullname`, `email`, `phone`, `text`, `created_at`) VALUES
(1, 'Joy Saha', 'sudip@adzguru.in', '8546328940', 'Test Message', '2025-03-04 14:00:38');

-- --------------------------------------------------------

--
-- Table structure for table `bkp_13062025_tbl_seoption`
--

CREATE TABLE `bkp_13062025_tbl_seoption` (
  `id` int(11) NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `title_slug` varchar(255) NOT NULL,
  `keywords` text DEFAULT NULL,
  `description` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

--
-- Dumping data for table `bkp_13062025_tbl_seoption`
--

INSERT INTO `bkp_13062025_tbl_seoption` (`id`, `title`, `title_slug`, `keywords`, `description`) VALUES
(1, 'Punjabi Palace Home page', 'home', 'restaurant,food,reservation', 'Best Restautant Management Software'),
(3, 'Menu', 'menu', 'Desert,Meet,fish,meet,bevarage', 'Menu Page'),
(4, 'Food Details', 'food_details', 'Meet,solt', 'Details food├é┬á information'),
(5, 'Reservation', 'reservation', 'Table,booking,reservation', 'Table Reservation'),
(6, 'Cart Page', 'cart_page', 'food,menu', 'Cart Page'),
(7, 'Checkout', 'checkout', 'Checkout', 'Checkout'),
(8, 'Login', 'login', 'Login', 'Login'),
(9, 'Registration', 'registration', 'Registration', 'Registration'),
(10, 'Payment information', 'payment_information', 'Online Payment information', 'Payment information'),
(11, 'Stripe Payment information', 'stripe_payment_information', 'Stripe Payment', 'Stripe Payment information'),
(12, 'About us', 'about_us', 'About restaurant', 'About us'),
(13, 'Contact Us', 'contact_us', 'Contact Us', 'Contact Us'),
(14, 'Privacy Policy', 'privacy_policy', 'privacy', 'Privacy Policy'),
(15, 'Our Terms', 'our_terms', 'Our Terms', 'Our Terms'),
(16, 'My Profile', 'my_profile', 'My Profile', 'My Profile'),
(17, 'My Order List', 'my_order_list', 'My Order List', 'My Order List'),
(18, 'View Order', 'view_order', 'View Order', 'View Order'),
(19, 'My Reservation', 'my_reservation', 'My Reservation', 'My Reservation'),
(20, 'Banquet & Catering', 'services', 'Banquet & Catering, Banquet, Catering, Services', 'Banquet & Catering');

-- --------------------------------------------------------

--
-- Table structure for table `bkp_13062025_tbl_slider`
--

CREATE TABLE `bkp_13062025_tbl_slider` (
  `slid` int(11) NOT NULL,
  `Sltypeid` int(11) NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `subtitle` varchar(255) DEFAULT NULL,
  `image` varchar(255) NOT NULL,
  `slink` text DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `delation_status` int(11) NOT NULL DEFAULT 0,
  `width` int(11) NOT NULL DEFAULT 0,
  `height` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

--
-- Dumping data for table `bkp_13062025_tbl_slider`
--

INSERT INTO `bkp_13062025_tbl_slider` (`slid`, `Sltypeid`, `title`, `subtitle`, `image`, `slink`, `status`, `delation_status`, `width`, `height`) VALUES
(1, 1, NULL, '', 'assets/img/banner/2025-02-18/W.png', '#', 1, 0, 1920, 902),
(2, 1, '', '', 'assets/img/banner/2025-02-18/W1.png', '#', 1, 0, 1920, 902),
(3, 1, '', '', 'assets/img/banner/2025-02-18/W2.png', '#', 1, 0, 1920, 902),
(4, 2, 'Discover', 'OUR STORY', 'assets/img/banner/2025-03-24/A.jpg', '/about', 1, 0, 263, 332),
(5, 2, 'Discover', 'OUR STORY', 'assets/img/banner/2025-03-24/2.jpg', '/about', 1, 0, 263, 332),
(6, 3, 'Discover', 'OUR MENU', 'assets/img/banner/2025-03-24/O2.jpg', '/menu', 1, 0, 263, 177),
(7, 3, 'Discover', 'OUR MENU', 'assets/img/banner/2025-03-24/O1.jpg', '/menu', 1, 0, 263, 177),
(8, 3, 'Discover', 'OUR MENU', 'assets/img/banner/2025-03-24/O.jpg', '/menu', 1, 0, 300, 379),
(9, 4, 'right', 'ads', 'assets/img/banner/2025-02-19/23.jpg', '#', 1, 0, 252, 621),
(10, 5, 'OUR AWESOME STREET', 'FOOD HISTORY', 'assets/img/banner/2025-02-19/I1.jpg', '#', 1, 0, 541, 516),
(11, 6, 'Reservation', 'BOOK YOUR TABLE', 'assets/img/banner/2025-02-19/b.jpg', '#', 1, 0, 470, 548),
(12, 7, 'Our Gallery', 'CHEF SELECTION', 'assets/img/banner/2025-02-19/R.jpg', '#', 1, 0, 363, 363),
(13, 7, 'Our Gallery', 'CHEF SELECTION', 'assets/img/banner/2025-02-19/R2.jpg', '#', 1, 0, 363, 363),
(14, 7, 'Our Gallery', 'CHEF SELECTION', 'assets/img/banner/2025-02-19/R3.jpg', '#', 1, 0, 363, 363),
(15, 7, 'Our Gallery', 'CHEF SELECTION', 'assets/img/banner/2025-02-19/R4.jpg', '#', 1, 0, 363, 363),
(16, 7, 'Our Gallery', 'CHEF SELECTION', 'assets/img/banner/2025-02-19/R5.jpg', '#', 1, 0, 363, 363),
(17, 7, 'Our Gallery', 'CHEF SELECTION', 'assets/img/banner/2025-02-19/R6.jpg', '#', 1, 0, 363, 363),
(18, 8, 'Offer', 'item offer', 'assets/img/banner/2025-02-19/o.jpg', '#', 1, 0, 250, 533),
(19, 9, 'Offer', 'food offer', 'assets/img/banner/2025-02-19/o1.jpg', '#', 1, 0, 250, 553),
(20, 10, 'contact us', 'contact', 'assets/img/banner/2025-02-19/c.jpg', '#', 1, 0, 475, 633);

-- --------------------------------------------------------

--
-- Table structure for table `bkp_13062025_tbl_slider_type`
--

CREATE TABLE `bkp_13062025_tbl_slider_type` (
  `stype_id` int(11) NOT NULL,
  `STypeName` varchar(255) DEFAULT NULL,
  `delation_status` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

--
-- Dumping data for table `bkp_13062025_tbl_slider_type`
--

INSERT INTO `bkp_13062025_tbl_slider_type` (`stype_id`, `STypeName`, `delation_status`) VALUES
(1, 'Home Top Slider', 0),
(2, 'Home our story', 0),
(3, 'Home our menu', 0),
(4, 'Menu Page right Banner', 0),
(5, 'Classic theme Home story', 0),
(6, 'Classic theme Home reservation', 0),
(7, 'Classic theme Home gallery', 0),
(8, 'Menu Page Offer Banner Right', 0),
(9, 'Cart Page Offer Banner Right', 0),
(10, 'Contact Us', 0);

-- --------------------------------------------------------

--
-- Table structure for table `bkp_13062025_tbl_widget`
--

CREATE TABLE `bkp_13062025_tbl_widget` (
  `widgetid` int(11) NOT NULL,
  `widget_name` varchar(100) NOT NULL,
  `widget_title` varchar(150) DEFAULT NULL,
  `widget_desc` text DEFAULT NULL,
  `widget_desc_full` text DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

--
-- Dumping data for table `bkp_13062025_tbl_widget`
--

INSERT INTO `bkp_13062025_tbl_widget` (`widgetid`, `widget_name`, `widget_title`, `widget_desc`, `widget_desc_full`, `status`) VALUES
(1, 'Footer left', '', '<p class=\"text-left\">Punjabi Palace is run by a traditional Punjabi Family and is an independently operated business. We offer you a vast assortment of traditional Punjabi food and a fabulous friendly environment to relax and take pleasure dining in.</p>', NULL, 1),
(2, 'footermiddle', 'Available On', '<p><strong>Monday - Wednesday </strong>11:00 AM - 10:00 PM</p>\r\n<p><strong>Thursday - Friday </strong>11:00 AM - 10:00 PM</p>\r\n<p><strong>Saturday </strong>11:00 PM - 10:00 PM</p>\r\n<p><strong>Sunday </strong>11:00 PM - 10:00 PM</p>', NULL, 1),
(3, 'Footer right', 'Contact Us', '<p>135 Melbourne St, South Brisbane, QLD 4101.</p>\r\n<p><a href=\"#\">admin@punjabipalace.com.au</a></p>\r\n<p><a href=\"#\">(07) 3846 3884</a></p>\r\n<p> </p>', NULL, 1),
(4, 'Our Store', 'Our Store', '<address>135 Melbourne St, South Brisbane, QLD 4101</address><address>Australia</address><address>NOW open 7 days a week</address>\r\n<p><a href=\"#\">(07) 3846 3884</a></p>\r\n<p><a href=\"#\">admin@punjabipalace.com.au</a></p>', NULL, 1),
(6, 'Reservation', 'BOOK YOUR TABLE', '<p>Enjoy your visit with us as our wide range of dishes, comprised of quality ingredients and vast combination of spices, entice your tastebuds and please don\'t hesitate to make any special dietary requests.</p>', NULL, 1),
(7, 'Our Menu text', 'Our Menu ', '<p>Punjabi Palace is run by a traditional Punjabi Family and is an independently operated business. We offer you a vast assortment of traditional Punjabi food and a fabulous friendly environment to relax and take pleasure dining in.</p>', NULL, 1),
(8, 'Specials', 'FOOD MENU', '<p>Indulge in our chef’s special dishes, crafted with authentic spices and fresh ingredients. From rich curries to sizzling tandoori delights, our specials bring you the true essence of Indian cuisine. Taste the tradition.</p>', NULL, 1),
(9, 'story text', 'OUR STORY', '<p>Punjabi Palace, an authentic Indian restaurant in Brisbane, has been serving delicious meals for over a decade. Known for using fresh ingredients and offering affordable prices, it has become a beloved spot for wholesome lunch and dinner options.</p>', '<p>Punjabi Palace, an authentic Indian restaurant in Brisbane, has been serving delicious meals for over a decade. Known for using fresh ingredients and offering affordable prices, it has become a beloved spot for wholesome lunch and dinner options. With a diverse clientele from all over Australia, people from all backgrounds appreciate the rich flavors and welcoming hospitality. To make it even more convenient for you to enjoy your favorite dishes, we\'ve launched a brand-new website, making ordering easier than ever before.</p>', 1),
(10, 'Professional', 'OUR EXPERT CHEFS', '<p>Our talented chefs bring passion and creativity to every dish, using the finest ingredients to craft exceptional flavors. With years of experience, they blend culinary artistry with innovation, ensuring a memorable dining experience for every guest.</p>', NULL, 0),
(11, 'Need Help Booking?', 'Need Help Booking?', '<p class=\"mb-2\">Just call our customer services at any time, we are waiting 24 hours to recieve your calls.</p>\r\n<p><a href=\"#\">+880 1712 123 123</a></p>', NULL, 1),
(12, 'Privacy', 'Privacy Policy', '<h2>What is Lorem Ipsum</h2>\r\n<p>Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n<h3>Contacting us :</h3>\r\n<p>If you have any questions about this Privacy Policy, the practices of this site, or your dealings with this site, please contact us.</p>', NULL, 1),
(13, 'termscondition', 'Terms of Use', '<h3>Web browser cookies</h3>\r\n<p>Our Site may use cache┬áand \"cookies\" to enhance User experience. User\'s web browser places cookies on their hard drive for record-keeping purposes and sometimes to track information about them. User may choose to set their web browser to refuse cookies, or to alert you when cookies are being sent. If they do so, note that some parts of the Site may not function properly.</p>\r\n<h3>How we use collected information bdtask may collect and use Users personal information for the following purposes:</h3>\r\n<p>To run and operate our Site We may need your information display content on the Site correctly. To improve customer service Information you provide helps us respond to your customer service requests and support needs more efficiently. To personalize user experience We may use information in the aggregate to understand how our Users as a group use the services and resources provided on our Site. To improve our Site We may use feedback you provide to improve our products and services. To run a promotion, contest, survey or other Site feature To send Users information they agreed to receive about topics we think will be of interest to them. To send periodic emails We may use the email address to send User information and updates pertaining to their order. It may also be used to respond to their inquiries, questions, and/or other requests.</p>', NULL, 1),
(14, 'map', 'Google Map', '<p><iframe width=\"100%\" height=\"150\" frameborder=\"0\" scrolling=\"no\" marginheight=\"0\" marginwidth=\"0\" src=\"https://maps.google.com/maps?width=300%25&amp;height=150&amp;hl=en&amp;q=%20135%20Melbourne%20St,%20South%20Brisbane,%20QLD%204101+(Punjabi%20Palace)&amp;t=&amp;z=14&amp;ie=UTF8&amp;iwloc=B&amp;output=embed\" frameborder=\"0\" allowfullscreen=\"allowfullscreen\"></iframe></p>', NULL, 1),
(15, 'carousal1', 'carousal', '<p>show</p>', NULL, 1),
(16, 'TASTY MENU TODAY', 'CHEF SELECTION', '', NULL, 1),
(17, 'FOOD HISTORY', 'OUR AWESOME STREET', '<p class=\"mb-4\">Punjabi Palace would like to welcome you. We hope you enjoy our authentic Indian food and relax in the friendly environment we have created for your dining pleasure.</p>\r\n<p class=\"mb-4\">We offer a comprehensive array of dishes from all over India for you to enjoy.</p>\r\n<p class=\"mb-4\">We suggest you sample a combination of meals off our vast menu to truly appreciate the unique flavours offered with each dish.We guarantee the meals for quality & quantity.</p>\r\n<p class=\"mb-4\">Every dish is individually prepared to suit your taste of mild, medium, hot or very hot.</p>\r\n<p class=\"mb-4\">Punjabi Palace is run by a traditional Punjabi family and is an independently operated business. We are the one & only Punjabi Palace & do not have any other branches.</p>\r\n<p><a class=\"simple_btn\" href=\"../../about\">Our Story</a></p>', NULL, 1),
(21, 'Our Gallery', 'Restaurant Photo Gallery', '', NULL, 1),
(22, 'subfooter', '', '', NULL, 1),
(23, 'Get In Touch', 'contact', '<p>Serving delicious, handcrafted meals with fresh ingredients and warm hospitality. Contact us for reservations, catering, or inquiries—we’d love to hear from you!</p>', NULL, 1),
(24, 'Refund Policies', 'Refund Policies', '<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard.</p>', NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `bkp_13062025_top_menu`
--

CREATE TABLE `bkp_13062025_top_menu` (
  `menuid` int(11) NOT NULL,
  `menu_name` varchar(50) NOT NULL,
  `menu_slug` varchar(70) NOT NULL,
  `parentid` int(11) NOT NULL,
  `entrydate` date NOT NULL,
  `isactive` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

--
-- Dumping data for table `bkp_13062025_top_menu`
--

INSERT INTO `bkp_13062025_top_menu` (`menuid`, `menu_name`, `menu_slug`, `parentid`, `entrydate`, `isactive`) VALUES
(1, 'Home', 'home', 0, '2021-09-19', 1),
(2, 'Reservation', 'reservation', 0, '2019-02-20', 1),
(3, 'Menu', 'menu', 0, '2021-10-18', 1),
(4, 'About Us', 'about', 0, '2019-11-25', 1),
(5, 'Contact Us', 'contact', 0, '2019-01-26', 1),
(6, 'Pages', 'pages', 0, '2019-11-28', 0),
(7, 'Cart', 'cart', 6, '2019-01-26', 0),
(8, 'Details', 'details', 7, '2020-01-15', 1),
(9, 'Banquet & Catering', 'services', 0, '2019-02-03', 1),
(10, 'My Profile', 'myprofile', 0, '2019-10-16', 1),
(11, 'Account', 'myprofile', 10, '2019-10-16', 1),
(12, 'Logout', 'hungry/logout', 10, '2019-02-03', 1);

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

CREATE TABLE `brands` (
  `id` int(11) NOT NULL,
  `brand_name` varchar(100) NOT NULL,
  `status` tinyint(1) DEFAULT 1,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`id`, `brand_name`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Aslphanso Indya', 1, '2025-04-11 04:54:44', '2025-04-11 04:54:44'),
(2, 'Chings', 1, '2025-04-11 04:54:44', '2025-04-11 04:54:44'),
(3, 'Indya', 1, '2025-04-11 04:54:44', '2025-04-11 04:54:44'),
(4, 'Roohafza', 1, '2025-04-11 04:54:44', '2025-04-11 04:54:44'),
(5, 'Mothers', 1, '2025-04-11 04:54:44', '2025-04-11 04:54:44'),
(6, 'Hamdard', 1, '2025-05-28 06:07:18', '2025-05-28 06:07:18'),
(7, 'Papin', 1, '2025-05-28 06:29:48', '2025-05-28 06:29:48'),
(8, 'Amul', 1, '2025-05-28 06:31:18', '2025-05-28 06:31:18'),
(9, 'Thackar', 1, '2025-05-28 07:51:10', '2025-05-28 07:51:10'),
(10, 'Mother', 1, '2025-05-28 07:54:10', '2025-05-28 07:54:10'),
(11, 'Akash', 1, '2025-05-28 11:58:40', '2025-05-28 11:58:40');

-- --------------------------------------------------------

--
-- Table structure for table `candidate_basic_info`
--

CREATE TABLE `candidate_basic_info` (
  `can_id` varchar(20) NOT NULL,
  `first_name` varchar(11) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `last_name` varchar(30) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `email` varchar(30) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `phone` varchar(20) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `alter_phone` varchar(20) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `present_address` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `parmanent_address` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `picture` text DEFAULT NULL,
  `ssn` varchar(50) NOT NULL,
  `state` varchar(30) NOT NULL,
  `city` varchar(30) NOT NULL,
  `zip` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `candidate_education_info`
--

CREATE TABLE `candidate_education_info` (
  `can_edu_id` int(11) NOT NULL,
  `can_id` varchar(30) NOT NULL,
  `degree_name` varchar(30) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `university_name` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `cgp` varchar(30) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `comments` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `sequencee` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `candidate_interview`
--

CREATE TABLE `candidate_interview` (
  `can_int_id` int(11) NOT NULL,
  `can_id` varchar(30) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `job_adv_id` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `interview_date` varchar(30) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `interviewer_id` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `interview_marks` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `written_total_marks` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `mcq_total_marks` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `total_marks` varchar(30) NOT NULL,
  `recommandation` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `selection` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `details` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `candidate_selection`
--

CREATE TABLE `candidate_selection` (
  `can_sel_id` int(11) NOT NULL,
  `can_id` varchar(30) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `employee_id` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `pos_id` varchar(30) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `selection_terms` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `candidate_shortlist`
--

CREATE TABLE `candidate_shortlist` (
  `can_short_id` int(11) NOT NULL,
  `can_id` varchar(30) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `job_adv_id` int(11) NOT NULL,
  `date_of_shortlist` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `interview_date` varchar(30) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `candidate_workexperience`
--

CREATE TABLE `candidate_workexperience` (
  `can_workexp_id` int(11) NOT NULL,
  `can_id` varchar(30) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `company_name` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `working_period` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `duties` varchar(30) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `supervisor` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `sequencee` varchar(10) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cart_selected_modifiers`
--

CREATE TABLE `cart_selected_modifiers` (
  `id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL,
  `variant_id` int(11) NOT NULL DEFAULT 0 COMMENT 'Relevant for foods only',
  `add_on_id` int(11) NOT NULL,
  `modifier_groupid` int(11) NOT NULL,
  `tr_row_id` varchar(100) DEFAULT NULL,
  `foods_or_mods` int(11) NOT NULL DEFAULT 2 COMMENT '1 = For Foods\r\n2 = For Mods',
  `meal_deal_id` int(11) NOT NULL DEFAULT 0,
  `is_active` int(11) NOT NULL DEFAULT 1 COMMENT '1=Active,0=Inactive',
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cart_selected_modifiers`
--

INSERT INTO `cart_selected_modifiers` (`id`, `menu_id`, `variant_id`, `add_on_id`, `modifier_groupid`, `tr_row_id`, `foods_or_mods`, `meal_deal_id`, `is_active`, `created_at`) VALUES
(7, 4, 5, 1, 15, '34186e9eb70e30487210b962e867b742', 1, 0, 1, '2025-05-02 22:14:46'),
(8, 4, 7, 2, 11, '34186e9eb70e30487210b962e867b742', 1, 0, 1, '2025-05-02 22:14:46'),
(9, 4, 0, 1, 6, '34186e9eb70e30487210b962e867b742', 2, 0, 1, '2025-05-02 22:14:46'),
(96, 31, 0, 3, 1, 'cef65a145c54dbe0f1ea8ad16a331421', 2, 0, 1, '2025-07-29 22:33:52'),
(99, 77, 0, 25, 6, '79d101630df6d313e10b24df196ce188', 2, 0, 1, '2025-08-04 15:36:17');

-- --------------------------------------------------------

--
-- Table structure for table `check_addones`
--

CREATE TABLE `check_addones` (
  `id` int(11) NOT NULL,
  `order_menuid` int(11) NOT NULL,
  `sub_order_id` int(11) NOT NULL,
  `status` tinyint(4) DEFAULT NULL COMMENT '1=insert, 0=notinserted'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `common_setting`
--

CREATE TABLE `common_setting` (
  `id` int(11) NOT NULL,
  `address` text DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `phone_optional` varchar(30) DEFAULT NULL,
  `logo` varchar(50) DEFAULT NULL,
  `logo_footer` varchar(255) DEFAULT NULL,
  `ismembership` int(11) NOT NULL DEFAULT 0 COMMENT '1=enable,0=disable',
  `powerbytxt` text DEFAULT NULL,
  `web_onoff` int(11) DEFAULT 1 COMMENT '1=enable,0=disable',
  `backgroundcolorweb` varchar(30) DEFAULT NULL,
  `webheaderfontcolor` varchar(20) DEFAULT NULL,
  `backgroundcolorqr` varchar(30) DEFAULT NULL,
  `qrheaderfontcolor` varchar(20) DEFAULT NULL,
  `recipe_feature_flag` enum('0','1') NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

--
-- Dumping data for table `common_setting`
--

INSERT INTO `common_setting` (`id`, `address`, `email`, `phone`, `phone_optional`, `logo`, `logo_footer`, `ismembership`, `powerbytxt`, `web_onoff`, `backgroundcolorweb`, `webheaderfontcolor`, `backgroundcolorqr`, `qrheaderfontcolor`, `recipe_feature_flag`) VALUES
(1, '<p>Level 2, Crown Hotel, Port Moresby,</p>\r\n<p>Papua New Guinea</p>', 'accounts@adzguru.co', '8582957232', '+91 8582957232', 'assets/img/2025-03-04/h.png', 'assets/img/2025-03-04/h1.png', 1, 'Developed with ❤️ by Adzguru (PNG) Limited\r\n', 1, NULL, NULL, NULL, NULL, '0');

-- --------------------------------------------------------

--
-- Table structure for table `contact_data`
--

CREATE TABLE `contact_data` (
  `id` int(11) NOT NULL,
  `fullname` varchar(120) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `text` varchar(350) DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `contact_data`
--

INSERT INTO `contact_data` (`id`, `fullname`, `email`, `phone`, `text`, `created_at`) VALUES
(1, 'Joy Saha', 'sudip@adzguru.in', '8546328940', 'Test Message', '2025-03-04 14:00:38'),
(2, 'Joy Saha', 'user@gmail.com', '8520963014', 'Test Contact on 16th April 2025', '2025-04-16 16:19:16'),
(3, 'Ashish Tripathi', 'ashishrajtripathi@gmail.com', '0452394024', 'Test', '2025-04-27 09:27:13'),
(4, 'Ashish Tripathi', 'ashishrajtripathi@gmail.com', '0452394024', 'Test', '2025-04-27 09:27:14'),
(5, ' ', NULL, NULL, NULL, '2025-04-28 12:49:25'),
(6, 'Daniel Edwards', 'danieledwards.web1@gmail.com', '8453630323', 'Hello,\r\n\r\nAfter closely reviewing your website, we encountered several SEO (Search Engine Optimization) issues that is preventing your website from appearing on the major search engines such as Google & Bing. As a result, when potential clients search using keywords related to your business, your website does not show up in the results. \r\n\r\nIf your', '2025-04-29 03:48:50'),
(7, 'Eric G', 'rachel@oval9.com', '3128780396', 'Do you need help with graphic design - brochures, banners, flyers, advertisements, social media posts, logos etc?\r\nWe charge a low fixed monthly fee. Let me know if you\'re interested and would like to see our portfolio.', '2025-04-30 22:23:35'),
(8, 'Carl Sinclair', 'pioneer2k@yahoo.com', '0403899493', 'Impossible to get a bad meal.  Carl Sinclair', '2025-05-05 08:10:00'),
(9, 'David Hynd', 'davehynd81@yahoo.com.au', '0491378894', 'Hi, \r\n\r\nI hope you are doing well. I\'m just curious if you would deliver to Tarragindi 4121. Happy to pay a fee. Thanks. \r\n\r\nKind regards, \r\nDavid', '2025-05-07 17:23:27'),
(10, 'Djohnmip DjohnmipUN', 'aferinohis056@gmail.com', '86341657485', 'Salam, qiymətinizi bilmək istədim.', '2025-05-08 08:55:09'),
(11, 'Terryvot TerryvotIS', 'djs.terry2025@gmail.com', '81643386618', 'Hello, \r\n \r\nExclusive promo quality music for DJs https://sceneflac.blogspot.com \r\nMP3/FLAC, label, music videos. Fans giving you full access to exclusive electronic, rap, rock, trance, dance... music. \r\n \r\n0day team.', '2025-05-11 21:46:03'),
(12, 'Saurabh Sonkusare', 'sonkusaresaurabh@gmail.com', '0468342792', 'Hi,\r\n\r\nI am wondering if I can book a place for 25 ppl on 26th June 6.15 pm?\r\n\r\nMany thanks.\r\n\r\nBest,\r\nSaurabh', '2025-05-14 13:05:43'),
(13, 'Amandeep  Kaur', 'harrysingh0522@gmail.com', '09463529520', 'I looking job australia sponcership ', '2025-05-20 12:20:57'),
(14, 'Sara Hatten-Masterson', 'sara.hatten-masterson@health.qld.gov.au', '414506658', 'Hello\r\nWe would like to make a group booking for approximately 30 people on Saturday the 14th of June.  We have previously done this and been allocated to the upstairs area.  Can you advise if you have availability for the date and group please.\r\nKind Regards\r\nSara', '2025-05-20 13:15:28'),
(15, 'Jay Patel', 'jaypatel271271@gmail.com', '424420127', 'Writing you to wake you guys up regarding your food quality, i am a vegetarian guy never ever eat meat, I ordered butter panner curry 2 times in a row at your place, and have received butter panner curry with chicken pieces, I have photos taken if you need. Please train your staff with appropriate training. It is absolutely disgusting experience 2 ', '2025-05-22 20:27:39'),
(16, 'Scott Muir', 'scottmuir15@bigpond.com', '0400852963', 'Good evening,\r\nMy wife Jade has ordered from you on uber eats tonight.\r\nUnfortunately you have given us a hot butter chicken instead of mild as requested.\r\nWe live in West End and have reported this to uber.\r\nAs this is the only real dish that Jade could eat she is very disappointed.\r\nI just thought I would let you know that this happened and that ', '2025-05-24 20:13:09'),
(17, 'Matthew Moore Matthew Moore', 'eon.23@hotmail.com', '0415609993', 'Please deliver to 40 Blakeney Street Highgate Hill', '2025-05-25 17:31:43'),
(18, 'Rosabel Edney', 'pageranktechnology@gmail.com', '1201201200', 'Hello punjabipalace.com.au,\r\n\r\nAttract 10 to 20 organic clients genuinely interested in your services through ethical marketing strategies.\r\n\r\nCan I provide you with some additional detailed solutions?\r\n\r\nWell wishes,\r\nRosabel Edney | Digital Marketing Manager\r\n\r\n\r\n\r\nNote: - If you’re not Interested in our Services, send us  \"opt-out\"', '2025-05-26 20:58:09'),
(19, ' ', NULL, NULL, NULL, '2025-05-27 00:38:40'),
(20, 'Daniel Edwards', 'danieledwards.websolution08@gmail.com', '8454479454', '\"Hello,\r\n\r\nYour website is currently not appearing in Google or Bing search results due to insufficient SEO (Search Engine Optimization) tags and keywords. This typically occurs when the SEO setup is incomplete or improperly configured.\r\n\r\nWe have a proven solution to help restore and improve your website\'s visibility, making it easier for your tar', '2025-05-29 06:35:42'),
(21, 'Samantha Sheldon', 'samantha.sheldon@epecgroup.com.au', '0402080547', 'Good Afternoon, \r\nI would like to check whether you have an option to provide corporate catering? We hold a full business update for all employees, once a month and are looking at a few local lunch options for the team. We would require meals to cater for roughly 120ppl in our office. Can you please advise if this is something you are able to do an', '2025-05-30 13:22:49'),
(22, 'aaron bourke', 'aaron.bourke@au.kwm.com', '0409349353', 'Hi - would you deliver to Gordon Park 4031 tonight if i paid extra for delivery?', '2025-05-30 17:24:33'),
(23, 'Simonmip SimonmipLR', 'yawiviseya67@gmail.com', '81666196395', 'Γεια σου, ήθελα να μάθω την τιμή σας.', '2025-06-01 20:40:55'),
(24, 'Jane Frost', 'jane.frost@radfords.co.nz', '0273684952', 'Hey guys, \r\nWas in for dinner last night and left my work diary on the chair, do you have it? Is there a chance that i could pop in and grab it around 4 assuming your there a tad earlier than opening at 5. Thanks so much! ', '2025-06-06 09:59:21'),
(25, 'Jane Frost', 'jane.frost@radfords.co.nz', '0273684952', 'Hey guys, \r\nWas in for dinner last night and left my work diary on the chair, do you have it? Is there a chance that i could pop in and grab it around 4 assuming your there a tad earlier than opening at 5. Thanks so much! ', '2025-06-06 09:59:22'),
(26, 'Meagan Pearse', 'meagan.pearse@churchie.com.au', '0413138968', 'Hello, \r\nPlease may I book a table for 16 people at 5pm on Wednesday 16th July.  This is a school group of 16–18-year-olds and includes three teachers.  We would need to pay separately and will be walking to see a show at QPAC afterwards.  Is it possible that we would be able to eat, pay and leave by no later than 6:30pm?\r\nThank you so much for you', '2025-06-11 13:42:33'),
(27, 'Louise Sheppard', 'louisecaradine@gmail.com', '0418651842', 'Hi there, \r\nthe order placed for Louise Sheppard at 12 Colton Place for 6:45 pm was incorrectly placed for pickup, \r\n\r\nwe would like delivery to 12 Colton street, Highgate hill please at or around 6:45 pm tonight,\r\n\r\nThanks\r\n\r\nLouise', '2025-06-12 17:30:30');

-- --------------------------------------------------------

--
-- Table structure for table `currency`
--

CREATE TABLE `currency` (
  `currencyid` int(11) NOT NULL,
  `currencyname` varchar(50) NOT NULL,
  `curr_icon` varchar(50) NOT NULL,
  `position` int(11) NOT NULL DEFAULT 1 COMMENT '1=left.2=right',
  `curr_rate` decimal(10,2) NOT NULL DEFAULT 0.00
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

--
-- Dumping data for table `currency`
--

INSERT INTO `currency` (`currencyid`, `currencyname`, `curr_icon`, `position`, `curr_rate`) VALUES
(1, 'BDT', 'BDT', 2, 83.00),
(2, 'USD', '$', 1, 1.00),
(3, 'INR', 'Rs.', 1, 0.50);

-- --------------------------------------------------------

--
-- Table structure for table `customer_info`
--

CREATE TABLE `customer_info` (
  `customer_id` int(11) NOT NULL,
  `cuntomer_no` varchar(120) NOT NULL,
  `membership_type` int(11) DEFAULT NULL COMMENT '1=bronze,2=silver,3=gold,4=platinum,5vip',
  `customer_name` varchar(150) NOT NULL,
  `customer_email` varchar(100) NOT NULL,
  `password` varchar(255) DEFAULT NULL,
  `customer_token` text DEFAULT NULL,
  `customer_address` varchar(250) DEFAULT NULL,
  `customer_phone` varchar(200) NOT NULL,
  `customer_picture` varchar(255) DEFAULT NULL,
  `favorite_delivery_address` varchar(200) DEFAULT NULL,
  `crdate` date DEFAULT NULL,
  `is_active` tinyint(4) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

--
-- Dumping data for table `customer_info`
--

INSERT INTO `customer_info` (`customer_id`, `cuntomer_no`, `membership_type`, `customer_name`, `customer_email`, `password`, `customer_token`, `customer_address`, `customer_phone`, `customer_picture`, `favorite_delivery_address`, `crdate`, `is_active`) VALUES
(1, 'cusL-0001', 2, 'Walkin', 'test@gmail.com', NULL, 'cO_Sa2fwscE:APA91bEFDD0sbV52pZPwJEl8MEUCcHBg2wIGjKfelfbiytAj4nJlPsKf8sSupfElBq-nm36DCkjYDEoUcA7qvtzKu4vDqjutF23f6Y_0uw4L_PlJIrtl61y4s-t5OKFAmdaU9OUQTtYS', 'dhaka', '8801717426371', NULL, 'ddd', NULL, 1),
(36, 'cusL-0004', 1, 'Kabir khan', 'kabir@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', NULL, 'DDD sgfsrgrg', '1732432434', 'assets/img/icons/2021-11-10/m.png', NULL, '2021-08-31', 1),
(54, 'cusL-0005', 0, 'Ravi Kumar', 'php.ravikr84@gmail.com', NULL, NULL, '11A RAMESHWAR GUHA STREET, TIRUPATI TOWER\r\nRoom 12, Dumdum Canttonment, KOLKATA-28', '07439272532', NULL, '11A RAMESHWAR GUHA STREET, TIRUPATI TOWER\r\nRoom 12, Dumdum Canttonment, KOLKATA-28', NULL, 1),
(55, '', NULL, 'RK', 'tinamunshi@gmail.com', NULL, NULL, 't', '123456789', NULL, 't', NULL, 1),
(56, 'cusL-0006', 0, 'John Doe', 'testingjohn@gmail.com', NULL, NULL, 't', '+8801234589', NULL, 't', '2025-02-21', 1),
(57, 'cusL-0007', 0, 'ram', 'ramkr88@gmail.com', NULL, NULL, 't', '+88057585869', NULL, 't', '2025-02-21', 1),
(58, 'cusL-0008', 0, 'Mahesh', 'mahesh22@gmail.com', NULL, NULL, 't', '+8011258933', NULL, 't', '2025-02-21', 1),
(59, 'cusL-0009', 0, 'Priyanshu', 'priyanshu@gmail.com', NULL, NULL, 't', '+880785826963', NULL, 't', '2025-02-24', 1),
(60, 'cusL-0010', 0, 'Pankaj Tripath', 'pankaj_tripathi@gmail.com', NULL, NULL, 't', '+99012589333', NULL, 't', '2025-02-25', 1),
(61, 'cusL-0011', 0, 'Jesu Das', 'jesu@gmail.com', NULL, NULL, 't', '+88012345678', NULL, 't', '2025-02-25', 1),
(62, 'cusL-0012', 0, 'Mathew Haidan', 'mathewhaidan@gmail.com', NULL, NULL, 't', '+918529633', NULL, 't', '2025-02-25', 1),
(63, 'cusL-0013', 0, 'Camroon', 'camroon@gmail.com', NULL, NULL, 't', '123456789000', NULL, 't', '2025-02-25', 1),
(64, 'cusL-0014', 0, 'Dhiraj Pandey', 'dhirajpandey@gmail.com', NULL, NULL, 't', '+8800529633', NULL, 't', '2025-02-25', 1),
(65, 'cusL-0015', 0, 'Sunny Singh', 'sunnysingh@gmail.com', NULL, NULL, 't', '+8809952369', NULL, 't', '2025-02-25', 1),
(66, 'cusL-0016', 0, 'Customer', 'customer@example.com', '827ccb0eea8a706c4c34a16891f84e7b', NULL, 'Test Customer Address', '9112345678', 'assets/img/icons/2025-03-26/4.jpg', NULL, '2025-03-03', 1),
(67, 'cusL-0017', 0, 'Ravi Kumar', 'php.ravikr84@gmail.com', NULL, NULL, 't', '+918582957232', NULL, 't', '2025-05-08', 1),
(68, 'cusL-0018', 0, 'Testing', 'john88@gmail.com', NULL, NULL, 't', 'testing', NULL, 't', '2025-05-08', 1),
(69, 'cusL-0019', 0, 'Joy', 'joy22@gmail.com', NULL, NULL, 't', '+918582957232', NULL, 't', '2025-05-08', 1),
(70, 'cusL-0020', 0, 'Joy', 'joy88@gmail.com', '25f9e794323b453885f5181f1b624d0b', NULL, 'Nalta Recreation club, Kolkata 28', '9885627532', 'assets/img/user/1329532847_1753940605', NULL, '2025-07-31', 1),
(71, 'cusL-0021', 0, 'Ravi Kumar', 'php.ravikr8686@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', NULL, 'Lokenath Apartment', '08582957232', NULL, 'Lokenath Apartment', '2025-08-01', 1),
(72, 'cusL-0022', 0, 'Ashish', 'ashishrajtripathi@gmail.com', NULL, NULL, '', '0452394024', NULL, '', NULL, 1),
(73, 'cusL-0023', 0, 'Ashish Kumar Tripathi', 'ashishrajtripathi@gmail.com', NULL, NULL, '3 Malmsey', '0452394024', NULL, 'malmsey street', NULL, 1),
(74, 'cusL-0024', 0, 'Ashish Kumar Tripathi', 'ashishrajtripathi@gmail.com', NULL, NULL, '', '0452394024', NULL, '', NULL, 1),
(75, 'cusL-0025', 0, 'Ashish Kumar Tripathi', 'ashishrajtripathi@gmail.com', NULL, NULL, '', '0452394024', NULL, '', NULL, 1),
(76, 'cusL-0026', 0, 'Ashish Kumar Tripathi', 'ashishrajtripathi@gmail.com', NULL, NULL, '', '0452394024', NULL, '', NULL, 1),
(77, 'cusL-0027', 0, 'Ashish Kumar Tripathi', 'punjabipalace@yahoo.com', NULL, NULL, '', '0452394024', NULL, '', NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `customer_membership_map`
--

CREATE TABLE `customer_membership_map` (
  `id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `membership_id` int(11) NOT NULL,
  `active_date` date NOT NULL,
  `active_by` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `customer_order`
--

CREATE TABLE `customer_order` (
  `order_id` bigint(20) NOT NULL,
  `saleinvoice` varchar(100) NOT NULL,
  `marge_order_id` varchar(30) DEFAULT NULL,
  `customer_id` int(11) NOT NULL,
  `cutomertype` int(11) NOT NULL,
  `isthirdparty` int(11) NOT NULL DEFAULT 0 COMMENT '0=normal,1>all Third Party',
  `thirdpartyinvoiceid` int(11) DEFAULT NULL,
  `waiter_id` int(11) DEFAULT NULL,
  `kitchen` int(11) DEFAULT NULL,
  `order_date` date NOT NULL,
  `order_time` time NOT NULL,
  `cookedtime` time NOT NULL DEFAULT '00:15:00',
  `table_no` int(11) DEFAULT NULL,
  `tokenno` varchar(30) DEFAULT NULL,
  `totalamount` decimal(10,2) NOT NULL DEFAULT 0.00,
  `customerpaid` decimal(10,2) DEFAULT 0.00,
  `customer_note` text DEFAULT NULL,
  `anyreason` text DEFAULT NULL,
  `order_status` tinyint(1) NOT NULL COMMENT '1=Pending, 2=Processing, 3=Ready, 4=Served,5=Cancel',
  `nofification` int(11) NOT NULL DEFAULT 0 COMMENT '0=unseen,1=seen',
  `orderacceptreject` int(11) DEFAULT NULL,
  `splitpay_status` tinyint(4) NOT NULL DEFAULT 0 COMMENT '0=no split,1=split',
  `isupdate` int(11) DEFAULT NULL,
  `shipping_date` datetime DEFAULT '1790-01-01 01:01:01',
  `tokenprint` int(11) NOT NULL DEFAULT 0 COMMENT '1=print done,0=not done',
  `invoiceprint` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

--
-- Dumping data for table `customer_order`
--

INSERT INTO `customer_order` (`order_id`, `saleinvoice`, `marge_order_id`, `customer_id`, `cutomertype`, `isthirdparty`, `thirdpartyinvoiceid`, `waiter_id`, `kitchen`, `order_date`, `order_time`, `cookedtime`, `table_no`, `tokenno`, `totalamount`, `customerpaid`, `customer_note`, `anyreason`, `order_status`, `nofification`, `orderacceptreject`, `splitpay_status`, `isupdate`, `shipping_date`, `tokenprint`, `invoiceprint`) VALUES
(1, '0001', NULL, 54, 1, 0, NULL, 168, NULL, '2025-08-04', '13:51:49', '00:15:00', 1, '01', 17.06, 17.06, '', NULL, 4, 1, NULL, 0, NULL, '1790-01-01 01:01:01', 0, NULL),
(2, '0002', NULL, 54, 1, 0, NULL, 168, NULL, '2025-08-04', '15:52:09', '00:15:00', 1, '02', 23.95, 0.00, '', NULL, 1, 1, NULL, 0, NULL, '1790-01-01 01:01:01', 0, NULL),
(3, '0003', NULL, 54, 1, 0, NULL, 168, NULL, '2025-08-04', '15:55:24', '00:15:00', 6, '03', 18.95, 0.00, '', NULL, 1, 1, NULL, 0, NULL, '1790-01-01 01:01:01', 0, NULL),
(4, '0004', NULL, 1, 1, 0, NULL, 168, NULL, '2025-08-04', '16:27:46', '00:15:00', 8, '04', 47.90, 0.00, '', NULL, 1, 1, NULL, 0, NULL, '1790-01-01 01:01:01', 0, NULL),
(5, '0005', NULL, 1, 1, 0, NULL, 168, NULL, '2025-08-05', '10:59:45', '00:15:00', 1, '01', 85.54, 0.00, '', NULL, 3, 1, NULL, 1, NULL, '1790-01-01 01:01:01', 0, 2),
(6, '0006', NULL, 54, 4, 0, NULL, 168, NULL, '2025-08-05', '11:38:23', '00:15:00', 0, '02', 74.57, 74.57, '', NULL, 4, 1, NULL, 0, NULL, '1790-01-01 01:01:01', 0, NULL),
(7, '0007', NULL, 54, 4, 0, NULL, 168, NULL, '2025-08-05', '11:47:35', '00:15:00', 0, '03', 150.50, 0.00, '', NULL, 1, 0, NULL, 0, NULL, '1790-01-01 01:01:01', 0, NULL),
(8, '0008', NULL, 77, 4, 0, NULL, 168, NULL, '2025-08-05', '12:03:59', '00:15:00', 0, '04', 56.85, 0.00, '', NULL, 1, 0, NULL, 0, NULL, '1790-01-01 01:01:01', 0, NULL),
(9, '0009', NULL, 77, 4, 0, NULL, 168, NULL, '2025-08-05', '12:05:25', '00:15:00', 0, '05', 32.00, 0.00, '', NULL, 1, 0, NULL, 0, NULL, '1790-01-01 01:01:01', 0, NULL),
(10, '0010', NULL, 77, 4, 0, NULL, 168, NULL, '2025-08-05', '12:08:28', '00:15:00', 0, '06', 32.00, 0.00, '', NULL, 1, 1, NULL, 0, NULL, '1790-01-01 01:01:01', 0, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `customer_type`
--

CREATE TABLE `customer_type` (
  `customer_type_id` int(11) NOT NULL,
  `customer_type` varchar(100) NOT NULL,
  `ordering` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

--
-- Dumping data for table `customer_type`
--

INSERT INTO `customer_type` (`customer_type_id`, `customer_type`, `ordering`) VALUES
(1, 'Dine In', 0),
(2, 'Ubereats', 0),
(4, 'Take Away', 0);

-- --------------------------------------------------------

--
-- Table structure for table `custom_table`
--

CREATE TABLE `custom_table` (
  `custom_id` int(11) NOT NULL,
  `custom_field` varchar(100) NOT NULL,
  `custom_data_type` int(11) NOT NULL,
  `custom_data` text NOT NULL,
  `employee_no` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `custom_table`
--

INSERT INTO `custom_table` (`custom_id`, `custom_field`, `custom_data_type`, `custom_data`, `employee_no`) VALUES
(52, 'Chinese Cuisine', 1, 'coffee roastery located on a busy corner site in Farringdon\'s Exmouth Market. With glazed frontage on two sides ', 'EU3APTYY'),
(54, 'French Suicine', 1, 'coffee roastery located on a busy corner site in Farringdon\'s Exmouth Market. With glazed frontage on two sides ', 'EXL9WSCL'),
(55, 'Chinese Cuisine', 1, 'coffee roastery located on a busy corner site in Farringdon\'s Exmouth Market. With glazed frontage on two sides ', 'E3Y1WJMB'),
(56, 'Kitchen Lead', 1, 'coffee roastery located on a busy corner site in Farringdon\'s Exmouth Market. With glazed frontage on two sides ', 'EBK2UPRA');

-- --------------------------------------------------------

--
-- Table structure for table `days`
--

CREATE TABLE `days` (
  `day_id` int(11) NOT NULL,
  `day_name` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `days`
--

INSERT INTO `days` (`day_id`, `day_name`) VALUES
(1, 'Monday'),
(2, 'Tuesday'),
(3, 'Wednesday'),
(4, 'Thursday'),
(5, 'Friday'),
(6, 'Saturday'),
(7, 'Sunday');

-- --------------------------------------------------------

--
-- Table structure for table `delivery_charges`
--

CREATE TABLE `delivery_charges` (
  `id` int(11) NOT NULL,
  `location` varchar(150) DEFAULT NULL,
  `charge` double NOT NULL DEFAULT 0,
  `is_active` int(11) NOT NULL DEFAULT 1 COMMENT '1 = Active\r\n0 = Inactive',
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `delivery_charges`
--

INSERT INTO `delivery_charges` (`id`, `location`, `charge`, `is_active`, `created_at`) VALUES
(1, 'Annerley', 7, 1, '2025-03-03 17:29:20'),
(2, 'Brisbane City', 7, 1, '2025-03-03 17:29:20'),
(3, 'Dutton Park', 7, 1, '2025-03-03 17:30:17'),
(4, 'Highate Hill', 6, 1, '2025-03-03 17:30:17'),
(5, 'East Brisbane', 7, 1, '2025-03-03 17:30:54'),
(6, 'Fairfield', 6.5, 1, '2025-03-03 17:30:54'),
(7, 'Kangaroo Point', 7, 1, '2025-03-03 17:31:31'),
(8, 'West End', 6.5, 1, '2025-03-03 17:31:31'),
(9, 'Yeronga', 7, 1, '2025-03-03 17:32:02'),
(10, 'Woolloongabba', 6.5, 1, '2025-03-03 17:32:02'),
(11, 'South Brisbane', 6, 1, '2025-03-03 17:32:24');

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

CREATE TABLE `department` (
  `dept_id` int(11) NOT NULL,
  `department_name` varchar(100) NOT NULL,
  `parent_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `department`
--

INSERT INTO `department` (`dept_id`, `department_name`, `parent_id`) VALUES
(8, 'ACCOUNTING', 0),
(9, 'Human Resource', 0),
(10, 'Delivery department', 0),
(11, 'Garage and Parking', 0),
(12, 'Manager', 0),
(13, 'Restaurant', 0),
(14, 'Waiter', 13),
(15, 'Senior Accountant', 8),
(16, 'Kitchen Manager', 12),
(17, 'Chef', 13),
(18, 'Sales Manager', 12);

-- --------------------------------------------------------

--
-- Table structure for table `duty_type`
--

CREATE TABLE `duty_type` (
  `id` int(11) NOT NULL,
  `type_name` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `duty_type`
--

INSERT INTO `duty_type` (`id`, `type_name`) VALUES
(1, 'Full Time'),
(2, 'Part Time'),
(3, 'Contructual'),
(4, 'Other');

-- --------------------------------------------------------

--
-- Table structure for table `email_config`
--

CREATE TABLE `email_config` (
  `email_config_id` int(11) NOT NULL,
  `smtp_host` varchar(200) DEFAULT NULL,
  `smtp_port` varchar(200) DEFAULT NULL,
  `smtp_password` varchar(200) DEFAULT NULL,
  `protocol` text NOT NULL,
  `mailpath` text NOT NULL,
  `mailtype` text NOT NULL,
  `sender` text NOT NULL,
  `api_key` varchar(250) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

--
-- Dumping data for table `email_config`
--

INSERT INTO `email_config` (`email_config_id`, `smtp_host`, `smtp_port`, `smtp_password`, `protocol`, `mailpath`, `mailtype`, `sender`, `api_key`, `status`) VALUES
(1, 'ssl://smtp.googlemail.com', '465', '123456', 'SMTP', '/usr/sbin/sendmail', 'html', 'jsaha.adzguru@gmail.com', '22c4c92a-e5a8-4293-b64c-befc9248521e', 1),
(2, 'ssl://smtp.googlemail.com', '465', '123456', 'SMTP', '/usr/sbin/sendmail', 'html', 'ainalcse@gmail.com', '22c4c92a-e5a8-4293-b64c-befc9248521e', 1);

-- --------------------------------------------------------

--
-- Table structure for table `employee_benifit`
--

CREATE TABLE `employee_benifit` (
  `id` int(11) NOT NULL,
  `bnf_cl_code` varchar(100) NOT NULL,
  `bnf_cl_code_des` varchar(250) NOT NULL,
  `bnff_acural_date` date NOT NULL,
  `bnf_status` tinyint(4) NOT NULL,
  `employee_id` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `employee_history`
--

CREATE TABLE `employee_history` (
  `emp_id` int(11) NOT NULL,
  `employee_no` varchar(30) NOT NULL,
  `pos_id` varchar(30) NOT NULL,
  `first_name` varchar(30) NOT NULL,
  `middle_name` varchar(50) DEFAULT NULL,
  `last_name` varchar(30) NOT NULL,
  `email` varchar(32) NOT NULL,
  `phone` varchar(30) NOT NULL,
  `alter_phone` varchar(30) DEFAULT NULL,
  `present_address` varchar(100) DEFAULT NULL,
  `parmanent_address` varchar(100) DEFAULT NULL,
  `picture` text DEFAULT NULL,
  `degree_name` varchar(30) DEFAULT NULL,
  `university_name` varchar(50) DEFAULT NULL,
  `cgp` varchar(30) DEFAULT NULL,
  `passing_year` varchar(30) DEFAULT NULL,
  `company_name` varchar(30) DEFAULT NULL,
  `working_period` varchar(30) DEFAULT NULL,
  `duties` varchar(30) DEFAULT NULL,
  `supervisor` varchar(30) DEFAULT NULL,
  `signature` text DEFAULT NULL,
  `is_admin` int(11) NOT NULL DEFAULT 0,
  `dept_id` int(11) DEFAULT NULL,
  `division_id` int(11) NOT NULL,
  `maiden_name` varchar(50) DEFAULT NULL,
  `state` varchar(30) NOT NULL,
  `city` varchar(30) NOT NULL,
  `zip` int(11) NOT NULL,
  `citizenship` int(11) NOT NULL,
  `duty_type` int(11) NOT NULL,
  `hire_date` date NOT NULL,
  `original_hire_date` date NOT NULL,
  `termination_date` date NOT NULL,
  `termination_reason` text NOT NULL,
  `voluntary_termination` int(11) NOT NULL,
  `rehire_date` date NOT NULL,
  `rate_type` int(11) NOT NULL,
  `rate` float NOT NULL,
  `pay_frequency` int(11) NOT NULL,
  `pay_frequency_txt` varchar(50) NOT NULL,
  `hourly_rate2` float NOT NULL,
  `hourly_rate3` float NOT NULL,
  `home_department` varchar(100) NOT NULL,
  `department_text` varchar(100) NOT NULL,
  `class_code` varchar(50) DEFAULT NULL,
  `class_code_desc` varchar(100) DEFAULT NULL,
  `class_acc_date` date DEFAULT NULL,
  `class_status` tinyint(4) DEFAULT NULL,
  `is_super_visor` int(11) DEFAULT NULL,
  `super_visor_id` varchar(30) NOT NULL,
  `supervisor_report` text NOT NULL,
  `dob` date NOT NULL,
  `gender` int(11) NOT NULL,
  `country` varchar(120) DEFAULT NULL,
  `marital_status` int(11) NOT NULL,
  `ethnic_group` varchar(100) NOT NULL,
  `eeo_class_gp` varchar(100) NOT NULL,
  `ssn` varchar(50) DEFAULT NULL,
  `work_in_state` int(11) NOT NULL,
  `live_in_state` int(11) NOT NULL,
  `home_email` varchar(50) NOT NULL,
  `business_email` varchar(50) NOT NULL,
  `home_phone` varchar(30) NOT NULL,
  `business_phone` varchar(30) NOT NULL,
  `cell_phone` varchar(30) NOT NULL,
  `emerg_contct` varchar(30) NOT NULL,
  `emrg_h_phone` varchar(30) NOT NULL,
  `emrg_w_phone` varchar(30) NOT NULL,
  `emgr_contct_relation` varchar(50) NOT NULL,
  `alt_em_contct` varchar(30) NOT NULL,
  `alt_emg_h_phone` varchar(30) NOT NULL,
  `alt_emg_w_phone` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

--
-- Dumping data for table `employee_history`
--

INSERT INTO `employee_history` (`emp_id`, `employee_no`, `pos_id`, `first_name`, `middle_name`, `last_name`, `email`, `phone`, `alter_phone`, `present_address`, `parmanent_address`, `picture`, `degree_name`, `university_name`, `cgp`, `passing_year`, `company_name`, `working_period`, `duties`, `supervisor`, `signature`, `is_admin`, `dept_id`, `division_id`, `maiden_name`, `state`, `city`, `zip`, `citizenship`, `duty_type`, `hire_date`, `original_hire_date`, `termination_date`, `termination_reason`, `voluntary_termination`, `rehire_date`, `rate_type`, `rate`, `pay_frequency`, `pay_frequency_txt`, `hourly_rate2`, `hourly_rate3`, `home_department`, `department_text`, `class_code`, `class_code_desc`, `class_acc_date`, `class_status`, `is_super_visor`, `super_visor_id`, `supervisor_report`, `dob`, `gender`, `country`, `marital_status`, `ethnic_group`, `eeo_class_gp`, `ssn`, `work_in_state`, `live_in_state`, `home_email`, `business_email`, `home_phone`, `business_phone`, `cell_phone`, `emerg_contct`, `emrg_h_phone`, `emrg_w_phone`, `emgr_contct_relation`, `alt_em_contct`, `alt_emg_h_phone`, `alt_emg_w_phone`) VALUES
(162, 'EY2T1OWA', '4', 'jahangir', NULL, 'Ahmad', 'jahangir@gmail.com', '0195511016', NULL, NULL, NULL, './application/modules/employee/assets/images/2018-09-20/pra.jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 4, 15, 3, NULL, 'New York', 'New', 234234, 0, 1, '2018-09-19', '2018-09-19', '2018-09-19', 'sdfasdf', 2, '2018-09-26', 1, 323, 2, '234', 324234, 2523, '234', '234532', '', '', '1970-01-01', 1, NULL, '0', 'dfasdfsdf', '2018-09-19', 1, 'India', 2, 'sunni', '234324', '23423', 1, 1, 'u@gmail.com', 'b@gmail.com', 'dsfsdf', 'dsfdsf', 'sdfsdf', '42342323', '234234', '234234', '2343', '234', '324234', '324324'),
(165, '145454', '6', 'Watier1', NULL, '', 'hmisahaq@gmail.com', '2344098234', NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 14, 6, NULL, 'Alabama', 'deom', 3243, 0, 1, '2018-09-20', '2018-09-20', '2018-09-29', 'fsdf', 1, '2018-09-29', 1, 234, 3, '234', 0, 0, '', '', '', '', '1970-01-01', 1, NULL, '0', '324', '2018-09-29', 1, 'India', 1, 'sdfsdf', '', '23423', 1, 1, '234', 'sd', '82309423', '', '234', '324234', '34242', '546456', '', '', '', ''),
(166, 'EQLAJFUW', '6', 'Waiter2', '', '', 'ainal@gmail.com', '01715234991', NULL, NULL, NULL, './application/modules/hrm/assets/images/2019-01-22/u.png', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 14, 0, NULL, 'Alabama', '', 0, 1, 1, '2018-11-12', '2018-11-12', '2018-11-12', '', 1, '2018-11-12', 1, 100, 1, '', 0, 0, '', '', '', '', '2018-11-12', 1, NULL, '0', '', '2018-11-12', 1, 'India', 1, '', '', '3425', 1, 1, '', '', '017123657332', '', '017123657332', '017123657332', '017123657332', '017123657332', '', '', '', ''),
(168, 'E97E9SJT', '6', 'Manik ', '', 'Hassan', 'manik@gmail.com', '01913251229', NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 14, 0, NULL, 'Alabama', 'Dhaka', 143325, 1, 1, '2019-01-01', '2019-01-01', '2021-01-31', 'sdfs', 1, '2022-01-09', 1, 100, 1, '', 0, 0, '', '', '', '', '2019-01-09', 1, NULL, '0', '', '1970-01-01', 1, 'India', 1, '', '', 'e4dfg', 1, 1, '', '', '34353636', '', '3636', '345345', '3453', '3453', '', '', '', ''),
(177, 'EZR0A9IB', '6', 'Waiter4', NULL, '', 'dimaria@gmail.com', '25423456272', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 17, 0, NULL, 'Oklahoma', '', 0, 1, 1, '2021-07-01', '2021-07-01', '2022-02-28', '', 1, '2022-02-28', 1, 200, 1, '', 0, 0, '', '', NULL, NULL, NULL, NULL, NULL, '1', '', '2000-09-01', 1, 'United State', 1, '', '', '', 1, 1, '', '', '457568234', '', '2323223', '366879', '889995454', '234245654', '', '', '', ''),
(178, '182', '6', 'Ramesh', NULL, 'Waiter55', 'waiter55@gmail.com', '', NULL, NULL, NULL, './assets/img/user/logo.png', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, 0, NULL, '', '', 0, 0, 0, '2025-06-10', '2025-06-10', '0000-00-00', '', 0, '0000-00-00', 0, 0, 0, '', 0, 0, '', '', NULL, NULL, NULL, NULL, NULL, '0', '', '2025-06-10', 0, NULL, 0, '', '', NULL, 0, 0, '', '', '', '', '', '', '', '', '', '', '', ''),
(183, 'ADZX', '6', 'Malay', NULL, 'Goswami', 'malaywaiter66@gmail.com', '', NULL, NULL, NULL, './assets/img/user/logo1.png', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, 0, NULL, '', '', 0, 0, 0, '2025-06-10', '2025-06-10', '0000-00-00', '', 0, '0000-00-00', 0, 0, 0, '', 0, 0, '', '', NULL, NULL, NULL, NULL, NULL, '0', '', '2025-06-10', 0, NULL, 0, '', '', NULL, 0, 0, '', '', '', '', '', '', '', '', '', '', '', ''),
(184, 'ADZATSO3', '6', 'Chandan', NULL, 'Waiter77', 'chandan77@gmail.com', '', NULL, NULL, NULL, './assets/img/user/logo2.png', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, 0, NULL, '', '', 0, 0, 0, '2025-06-10', '2025-06-10', '0000-00-00', '', 0, '0000-00-00', 0, 0, 0, '', 0, 0, '', '', NULL, NULL, NULL, NULL, NULL, '0', '', '2025-06-10', 0, NULL, 0, '', '', NULL, 0, 0, '', '', '', '', '', '', '', '', '', '', '', ''),
(185, 'ADZ25AVWVK', '6', 'Manashi', NULL, 'waiter44', 'manashi@gmail.com', '', NULL, NULL, NULL, './assets/img/user/logo3.png', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, 0, NULL, '', '', 0, 0, 0, '2025-06-10', '2025-06-10', '0000-00-00', '', 0, '0000-00-00', 0, 0, 0, '', 0, 0, '', '', NULL, NULL, NULL, NULL, NULL, '0', '', '2025-06-10', 0, NULL, 0, '', '', NULL, 0, 0, '', '', '', '', '', '', '', '', '', '', '', ''),
(186, 'ADZ25AY131', '6', 'Johan', NULL, 'Kundu', 'johan22@gmail.com', '', NULL, NULL, NULL, './assets/img/user/logo4.png', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, 0, NULL, '', '', 0, 0, 0, '2025-06-10', '2025-06-10', '0000-00-00', '', 0, '0000-00-00', 0, 0, 0, '', 0, 0, '', '', NULL, NULL, NULL, NULL, NULL, '', '', '2025-06-10', 0, NULL, 0, '', '', NULL, 0, 0, '', '', '', '', '', '', '', '', '', '', '', ''),
(187, 'ADZ25B05AI', '6', 'Anil', NULL, 'Shah Waiter', 'anilshah11@gmail.com', '', NULL, NULL, NULL, './assets/img/user/logo5.png', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, 0, NULL, '', '', 0, 0, 0, '2025-06-10', '2025-06-10', '0000-00-00', '', 0, '0000-00-00', 0, 0, 0, '', 0, 0, '', '', NULL, NULL, NULL, NULL, NULL, '', '', '2025-06-10', 0, NULL, 0, '', '', NULL, 0, 0, '', '', '', '', '', '', '', '', '', '', '', ''),
(188, 'ADZ25B29HZ', '3', 'Tanmoy', NULL, 'Das', 'tanmoywaiter@gmail.com', '', NULL, NULL, NULL, './assets/img/user/logo6.png', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, 0, NULL, '', '', 0, 0, 0, '2025-06-11', '2025-06-11', '0000-00-00', '', 0, '0000-00-00', 0, 0, 0, '', 0, 0, '', '', NULL, NULL, NULL, NULL, NULL, '', '', '2025-06-11', 0, NULL, 0, '', '', NULL, 0, 0, '', '', '', '', '', '', '', '', '', '', '', ''),
(189, 'ADZ25B4DPG', '6', 'Shantanu', NULL, 'Basak', 'shantanu88@gmail.com', '', NULL, NULL, NULL, './assets/img/user/logo7.png', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, 0, NULL, '', '', 0, 0, 0, '2025-06-11', '2025-06-11', '0000-00-00', '', 0, '0000-00-00', 0, 0, 0, '', 0, 0, '', '', NULL, NULL, NULL, NULL, NULL, '', '', '2025-06-11', 0, NULL, 0, '', '', NULL, 0, 0, '', '', '', '', '', '', '', '', '', '', '', ''),
(190, 'ADZ25B6HWX', '6', 'Chintan', NULL, 'Dhanani', 'chintan88@gmail.com', '', NULL, NULL, NULL, './assets/img/user/logo8.png', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, 0, NULL, '', '', 0, 0, 0, '2025-06-11', '2025-06-11', '0000-00-00', '', 0, '0000-00-00', 0, 0, 0, '', 0, 0, '', '', NULL, NULL, NULL, NULL, NULL, '', '', '2025-06-11', 0, NULL, 0, '', '', NULL, 0, 0, '', '', '', '', '', '', '', '', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `employee_performance`
--

CREATE TABLE `employee_performance` (
  `emp_per_id` int(10) UNSIGNED NOT NULL,
  `employee_id` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `note` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `date` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `note_by` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `number_of_star` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `status` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `updated_by` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `employee_salary_payment`
--

CREATE TABLE `employee_salary_payment` (
  `emp_sal_pay_id` int(10) UNSIGNED NOT NULL,
  `employee_id` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `total_salary` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `total_working_minutes` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `working_period` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `payment_due` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `payment_date` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `paid_by` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `employee_salary_setup`
--

CREATE TABLE `employee_salary_setup` (
  `e_s_s_id` int(10) UNSIGNED NOT NULL,
  `employee_id` varchar(30) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `sal_type` varchar(30) NOT NULL,
  `salary_type_id` varchar(30) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `amount` varchar(30) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `create_date` date DEFAULT NULL,
  `update_date` datetime(6) DEFAULT NULL,
  `update_id` varchar(30) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `gross_salary` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `employee_sal_pay_type`
--

CREATE TABLE `employee_sal_pay_type` (
  `emp_sal_pay_type_id` int(10) UNSIGNED NOT NULL,
  `payment_period` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `emp_attendance`
--

CREATE TABLE `emp_attendance` (
  `att_id` int(10) UNSIGNED NOT NULL,
  `employee_id` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `date` varchar(30) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `sign_in` varchar(30) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `sign_out` varchar(30) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `staytime` time DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `expense`
--

CREATE TABLE `expense` (
  `id` int(11) NOT NULL,
  `date` date NOT NULL,
  `type` varchar(100) NOT NULL,
  `voucher_no` varchar(50) NOT NULL,
  `amount` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `expense_item`
--

CREATE TABLE `expense_item` (
  `id` int(11) NOT NULL,
  `expense_item_name` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `foodvariable`
--

CREATE TABLE `foodvariable` (
  `availableID` int(11) NOT NULL,
  `foodid` int(11) NOT NULL,
  `availtime` varchar(50) NOT NULL,
  `availday` varchar(30) NOT NULL,
  `is_active` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `gender`
--

CREATE TABLE `gender` (
  `id` int(11) NOT NULL,
  `gender_name` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `gender`
--

INSERT INTO `gender` (`id`, `gender_name`) VALUES
(1, 'Male'),
(2, 'Female'),
(3, 'Other');

-- --------------------------------------------------------

--
-- Table structure for table `grand_loan`
--

CREATE TABLE `grand_loan` (
  `loan_id` int(11) NOT NULL,
  `employee_id` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `permission_by` varchar(30) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `loan_details` varchar(30) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `amount` varchar(30) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `interest_rate` varchar(30) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `installment` varchar(30) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `installment_period` varchar(30) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `repayment_amount` varchar(30) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `date_of_approve` varchar(30) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `repayment_start_date` varchar(30) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `created_by` varchar(30) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `updated_by` varchar(30) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `loan_status` varchar(30) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `ingredients`
--

CREATE TABLE `ingredients` (
  `id` int(11) NOT NULL,
  `ingredient_name` varchar(250) NOT NULL,
  `purchase_price` decimal(10,2) DEFAULT NULL,
  `cost_perunit` decimal(10,4) DEFAULT NULL,
  `uom_id` int(11) NOT NULL,
  `purchase_product` int(11) DEFAULT NULL COMMENT '''1=When Food like colddrink''',
  `consumption_unit` int(11) DEFAULT NULL,
  `pack_size` decimal(10,2) DEFAULT NULL,
  `convt_ratio` decimal(10,4) DEFAULT 1.0000,
  `stock_qty` decimal(10,2) NOT NULL DEFAULT 0.00,
  `min_stock` decimal(10,2) NOT NULL DEFAULT 1.00,
  `status` int(11) NOT NULL DEFAULT 0 COMMENT '0=kitchenitems,1=otheritems',
  `brand_id` int(10) DEFAULT NULL,
  `is_active` tinyint(4) NOT NULL,
  `pack_unit` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `ingredients_opening_stock`
--

CREATE TABLE `ingredients_opening_stock` (
  `id` int(11) NOT NULL,
  `ingredient_name` varchar(250) NOT NULL,
  `ingredient_id` int(11) NOT NULL,
  `purchase_price` decimal(10,2) DEFAULT NULL,
  `opening_balance` decimal(10,2) DEFAULT 0.00 COMMENT 'As per consumption unit (Lower Unit) & inserted in higher unit',
  `opening_date` date DEFAULT curdate(),
  `is_active` tinyint(4) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `ingredient_temp`
--

CREATE TABLE `ingredient_temp` (
  `id` int(11) NOT NULL,
  `ingredient_name` varchar(200) NOT NULL,
  `pack_size` float DEFAULT NULL,
  `pack_unit_id` int(11) DEFAULT NULL,
  `purchase_price` float DEFAULT NULL,
  `purchase_unit_id` int(11) DEFAULT NULL,
  `brand_id` int(11) DEFAULT NULL,
  `opening_balance` float DEFAULT NULL,
  `opening_date` date DEFAULT NULL,
  `consumption_unit_id` int(11) DEFAULT NULL,
  `convt_ratio` float DEFAULT NULL,
  `min_stock` decimal(10,2) DEFAULT NULL,
  `saved_by` int(11) DEFAULT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `invprice_difference_notification`
--

CREATE TABLE `invprice_difference_notification` (
  `notify_id` int(11) NOT NULL,
  `purchase_id` int(11) NOT NULL,
  `supplier_id` int(11) NOT NULL,
  `ingredient_id` int(11) NOT NULL,
  `last_purchase_id` int(11) DEFAULT NULL,
  `last_supplier_id` int(11) DEFAULT NULL,
  `last_unit` int(11) NOT NULL,
  `last_unit_price` decimal(10,2) NOT NULL,
  `current_unit_price` decimal(19,3) NOT NULL,
  `price_difference` decimal(19,3) NOT NULL,
  `price_up` tinyint(10) NOT NULL DEFAULT 0,
  `price_down` tinyint(10) NOT NULL DEFAULT 0,
  `price_diff_percentage` decimal(19,3) NOT NULL,
  `is_seen` tinyint(10) NOT NULL DEFAULT 10
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `item_category`
--

CREATE TABLE `item_category` (
  `CategoryID` int(11) NOT NULL,
  `Name` varchar(255) DEFAULT NULL,
  `CategoryImage` varchar(255) DEFAULT NULL,
  `Position` int(11) DEFAULT NULL,
  `CategoryIsActive` int(11) DEFAULT NULL,
  `offerstartdate` date DEFAULT '1970-01-01',
  `offerendate` date NOT NULL DEFAULT '1970-01-01',
  `isoffer` int(11) DEFAULT 0,
  `offerpercentage` decimal(5,2) DEFAULT 0.00,
  `parentid` int(11) DEFAULT 0,
  `UserIDInserted` int(11) NOT NULL DEFAULT 0,
  `UserIDUpdated` int(11) NOT NULL DEFAULT 0,
  `UserIDLocked` int(11) NOT NULL DEFAULT 0,
  `DateInserted` datetime NOT NULL DEFAULT '1970-01-01 00:00:01',
  `DateUpdated` datetime NOT NULL DEFAULT '1970-01-01 00:00:01',
  `DateLocked` datetime NOT NULL DEFAULT '1970-01-01 00:00:01'
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

--
-- Dumping data for table `item_category`
--

INSERT INTO `item_category` (`CategoryID`, `Name`, `CategoryImage`, `Position`, `CategoryIsActive`, `offerstartdate`, `offerendate`, `isoffer`, `offerpercentage`, `parentid`, `UserIDInserted`, `UserIDUpdated`, `UserIDLocked`, `DateInserted`, `DateUpdated`, `DateLocked`) VALUES
(1, 'Food Menu', NULL, NULL, 1, '0000-00-00', '0000-00-00', 0, 0.00, 0, 2, 2, 2, '2025-07-21 14:39:06', '2025-07-21 14:39:06', '2025-07-21 14:39:06'),
(2, 'Beverage', NULL, NULL, 1, '0000-00-00', '0000-00-00', 0, 0.00, 0, 2, 2, 2, '2025-07-21 14:39:06', '2025-07-21 14:39:06', '2025-07-21 14:39:06'),
(3, 'Main Course', NULL, NULL, 1, '0000-00-00', '0000-00-00', 0, 0.00, 1, 2, 2, 0, '2025-07-21 14:40:01', '2025-07-22 16:52:56', '2025-07-21 14:40:01'),
(4, 'Indian Street Food', NULL, NULL, 1, '0000-00-00', '0000-00-00', 0, 0.00, 1, 2, 2, 0, '2025-07-21 15:08:03', '2025-07-22 16:52:56', '2025-07-21 15:08:03'),
(5, 'Small Plates', NULL, NULL, 1, '0000-00-00', '0000-00-00', 0, 0.00, 1, 2, 2, 0, '2025-07-21 15:08:03', '2025-07-22 16:52:56', '2025-07-21 15:08:03'),
(6, 'Tandoori Small Plates', NULL, NULL, 1, '0000-00-00', '0000-00-00', 0, 0.00, 1, 2, 2, 0, '2025-07-21 15:08:03', '2025-07-22 16:52:56', '2025-07-21 15:08:03'),
(7, 'Signature Curries (Dry)', NULL, NULL, 1, '0000-00-00', '0000-00-00', 0, 0.00, 3, 2, 2, 0, '2025-07-21 15:08:03', '2025-07-21 15:08:03', '2025-07-21 15:08:03'),
(8, 'Signature Curries (Gravy)', NULL, NULL, 1, '0000-00-00', '0000-00-00', 0, 0.00, 3, 2, 2, 0, '2025-07-21 15:08:03', '2025-07-21 15:08:03', '2025-07-21 15:08:03'),
(9, 'Panjabi Palace Special', NULL, NULL, 1, '0000-00-00', '0000-00-00', 0, 0.00, 3, 2, 2, 0, '2025-07-21 15:08:03', '2025-07-21 15:08:03', '2025-07-21 15:08:03'),
(10, 'Tandoori Special', NULL, NULL, 1, '0000-00-00', '0000-00-00', 0, 0.00, 1, 2, 2, 0, '2025-07-21 15:08:03', '2025-07-22 16:52:56', '2025-07-21 15:08:03'),
(11, 'Rice', NULL, NULL, 1, '0000-00-00', '0000-00-00', 0, 0.00, 1, 2, 2, 0, '2025-07-21 15:08:03', '2025-07-22 16:52:56', '2025-07-21 15:08:03'),
(12, 'Biryani', NULL, NULL, 1, '0000-00-00', '0000-00-00', 0, 0.00, 1, 2, 2, 0, '2025-07-21 15:08:03', '2025-07-22 16:52:56', '2025-07-21 15:08:03'),
(13, 'Prawns or Fish', NULL, NULL, 1, '0000-00-00', '0000-00-00', 0, 0.00, 3, 2, 2, 0, '2025-07-21 15:08:03', '2025-07-21 15:08:03', '2025-07-21 15:08:03'),
(14, 'Accompaniments', NULL, NULL, 1, '0000-00-00', '0000-00-00', 0, 0.00, 1, 2, 2, 0, '2025-07-21 15:08:03', '2025-07-22 16:52:56', '2025-07-21 15:08:03'),
(15, 'Bread', NULL, NULL, 1, '0000-00-00', '0000-00-00', 0, 0.00, 1, 2, 2, 0, '2025-07-21 15:08:03', '2025-07-22 16:52:56', '2025-07-21 15:08:03'),
(16, 'Kids Meals', NULL, NULL, 1, '0000-00-00', '0000-00-00', 0, 0.00, 1, 2, 2, 0, '2025-07-21 15:08:03', '2025-07-22 16:52:56', '2025-07-21 15:08:03'),
(17, 'Sweet Treats', NULL, NULL, 1, '0000-00-00', '0000-00-00', 0, 0.00, 1, 2, 2, 0, '2025-07-21 15:08:03', '2025-07-22 16:52:56', '2025-07-21 15:08:03'),
(18, 'Hot Beverages', NULL, NULL, 1, '0000-00-00', '0000-00-00', 0, 0.00, 2, 2, 2, 0, '2025-07-22 16:23:35', '2025-07-22 16:23:35', '2025-07-22 16:23:35'),
(19, 'Cold Beverages', NULL, NULL, 1, '0000-00-00', '0000-00-00', 0, 0.00, 2, 2, 2, 0, '2025-07-22 16:23:35', '2025-07-22 16:23:35', '2025-07-22 16:23:35'),
(20, 'Wine', NULL, NULL, 1, '0000-00-00', '0000-00-00', 0, 0.00, 2, 2, 2, 0, '2025-07-22 16:25:46', '2025-07-22 16:25:46', '2025-07-22 16:25:46'),
(21, 'Beer', NULL, NULL, 1, '0000-00-00', '0000-00-00', 0, 0.00, 2, 2, 2, 0, '2025-07-22 16:25:46', '2025-07-22 16:25:46', '2025-07-22 16:25:46'),
(22, 'Spirits', NULL, NULL, 1, '0000-00-00', '0000-00-00', 0, 0.00, 2, 2, 2, 0, '2025-07-22 16:25:46', '2025-07-22 16:25:46', '2025-07-22 16:25:46'),
(23, 'Sparkling Wines', NULL, NULL, 1, '0000-00-00', '0000-00-00', 0, 0.00, 20, 2, 2, 0, '2025-07-22 16:29:00', '2025-07-22 16:29:00', '2025-07-22 16:29:00'),
(24, 'White Wines', NULL, NULL, 1, '0000-00-00', '0000-00-00', 0, 0.00, 20, 2, 2, 0, '2025-07-22 16:29:00', '2025-07-22 16:29:00', '2025-07-22 16:29:00'),
(25, 'Rose Wines', NULL, NULL, 1, '0000-00-00', '0000-00-00', 0, 0.00, 20, 2, 2, 0, '2025-07-22 16:29:00', '2025-07-22 16:29:00', '2025-07-22 16:29:00'),
(26, 'Imported Beer', NULL, NULL, 1, '0000-00-00', '0000-00-00', 0, 0.00, 21, 2, 2, 0, '2025-07-22 16:31:36', '2025-07-22 16:31:36', '2025-07-22 16:31:36'),
(27, 'Local Beer', NULL, NULL, 1, '0000-00-00', '0000-00-00', 0, 0.00, 21, 2, 2, 0, '2025-07-22 16:31:36', '2025-07-22 16:31:36', '2025-07-22 16:31:36'),
(28, 'Cider', NULL, NULL, 1, '0000-00-00', '0000-00-00', 0, 0.00, 21, 2, 2, 0, '2025-07-22 16:31:36', '2025-07-22 16:31:36', '2025-07-22 16:31:36');

-- --------------------------------------------------------

--
-- Table structure for table `item_foods`
--

CREATE TABLE `item_foods` (
  `ProductsID` int(11) NOT NULL,
  `GroupID` int(11) DEFAULT NULL,
  `CategoryID` varchar(155) NOT NULL,
  `SubCategoryID` int(11) DEFAULT NULL,
  `ProductName` varchar(255) DEFAULT NULL,
  `item_code` varchar(255) DEFAULT NULL,
  `ProductImage` varchar(200) DEFAULT NULL,
  `bigthumb` varchar(255) NOT NULL,
  `medium_thumb` varchar(255) NOT NULL,
  `small_thumb` varchar(255) NOT NULL,
  `component` text DEFAULT NULL,
  `descrip` text DEFAULT NULL,
  `itemnotes` varchar(255) DEFAULT NULL,
  `menutype` varchar(25) DEFAULT NULL,
  `productvat` decimal(10,3) DEFAULT 0.000,
  `special` int(11) NOT NULL DEFAULT 0,
  `OffersRate` int(11) NOT NULL DEFAULT 0 COMMENT '1=offer rate',
  `offerIsavailable` int(11) NOT NULL DEFAULT 0 COMMENT '1=offer available,0=No Offer',
  `offerstartdate` date DEFAULT NULL,
  `offerendate` date DEFAULT NULL,
  `Position` int(11) DEFAULT NULL,
  `kitchenid` int(11) NOT NULL,
  `isgroup` int(11) DEFAULT NULL,
  `is_customqty` int(11) DEFAULT 0,
  `cookedtime` time NOT NULL DEFAULT '00:00:00',
  `ProductsIsActive` int(11) DEFAULT NULL,
  `UserIDInserted` int(11) NOT NULL DEFAULT 0,
  `UserIDUpdated` int(11) NOT NULL DEFAULT 0,
  `UserIDLocked` int(11) NOT NULL DEFAULT 0,
  `DateInserted` date DEFAULT NULL,
  `DateUpdated` date DEFAULT NULL,
  `DateLocked` date DEFAULT NULL,
  `cusine_type` int(10) DEFAULT 1 COMMENT '''1 => for restaurant menu, 2 => banquet menu, 3 => product menu''',
  `is_bom` int(10) DEFAULT 1 COMMENT '''0 => Without bill of materials, 1 => With bill of material''',
  `food_type` tinyint(1) NOT NULL COMMENT '1 = Veg, 0 = Non-Veg',
  `weightage` decimal(10,2) NOT NULL DEFAULT 0.00,
  `uomid` int(10) NOT NULL DEFAULT 0,
  `tax0` text DEFAULT NULL,
  `tax1` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

--
-- Dumping data for table `item_foods`
--

INSERT INTO `item_foods` (`ProductsID`, `GroupID`, `CategoryID`, `SubCategoryID`, `ProductName`, `item_code`, `ProductImage`, `bigthumb`, `medium_thumb`, `small_thumb`, `component`, `descrip`, `itemnotes`, `menutype`, `productvat`, `special`, `OffersRate`, `offerIsavailable`, `offerstartdate`, `offerendate`, `Position`, `kitchenid`, `isgroup`, `is_customqty`, `cookedtime`, `ProductsIsActive`, `UserIDInserted`, `UserIDUpdated`, `UserIDLocked`, `DateInserted`, `DateUpdated`, `DateLocked`, `cusine_type`, `is_bom`, `food_type`, `weightage`, `uomid`, `tax0`, `tax1`) VALUES
(1, 1, '4', NULL, 'Chole Bhature', 'CHB', '', '', '', '', '', 'Bhature Naan served with chickpeas curry, sliced onion, pickles & raita.', '', '', 0.000, 0, 0, 0, '0000-00-00', '0000-00-00', NULL, 1, NULL, 0, '00:00:00', 1, 2, 2, 2, '2025-07-22', '2025-07-22', '2025-07-22', 1, 0, 1, 1.00, 12, NULL, NULL),
(2, 1, '4', NULL, 'Soya Chaap Tikka', 'SOCT', '', '', '', '', '', 'Soyabean dough cufltes marinsted with creamy and mild spicy gravy. cooked in tandoor. served with mint sauce.', '', '', 0.000, 0, 0, 0, '0000-00-00', '0000-00-00', NULL, 1, NULL, 0, '00:00:00', 1, 2, 2, 2, '2025-07-22', '2025-07-22', '2025-07-22', 1, 0, 1, 1.00, 12, NULL, NULL),
(3, 1, '4', NULL, 'Veg Manchurian', 'VEM', '', '', '', '', '', 'Deep-fried grated balls of veggies in combination with sweet-sour tangy say mild chilli sauce.', '', '', 0.000, 0, 0, 0, '0000-00-00', '0000-00-00', NULL, 1, NULL, 0, '00:00:00', 1, 2, 2, 2, '2025-07-22', '2025-07-22', '2025-07-22', 1, 0, 1, 1.00, 12, NULL, NULL),
(4, 1, '4', NULL, 'Chicken Manchurian', 'CHM', '', '', '', '', '', 'Deep-fried grated balls of chicken in combination with sweet.sour tangy soy mild chilli sauce.', '', '', 0.000, 0, 0, 0, '0000-00-00', '0000-00-00', NULL, 1, NULL, 0, '00:00:00', 1, 2, 2, 2, '2025-07-22', '2025-07-22', '2025-07-22', 1, 0, 0, 1.00, 12, NULL, NULL),
(5, 1, '4', NULL, 'Chilli Chicken', 'CHC', '', '', '', '', '', 'Chicken pieces tossed with onian, capsicum, gorlic, herbs and fresh chilli.', '', '', 0.000, 0, 0, 0, '0000-00-00', '0000-00-00', NULL, 1, NULL, 0, '00:00:00', 1, 2, 2, 2, '2025-07-22', '2025-07-22', '2025-07-22', 1, 0, 0, 1.00, 12, NULL, NULL),
(6, 1, '4', NULL, 'Chilli Paneer', 'CHP', '', '', '', '', '', 'Lightly battered pieces of paneer, deep fried and then sauteed with onions & capsicum in a sweet sauce.', '', '', 0.000, 0, 0, 0, '0000-00-00', '0000-00-00', NULL, 1, NULL, 0, '00:00:00', 1, 2, 2, 2, '2025-07-28', '2025-07-28', '2025-07-28', 1, 0, 1, 1.00, 12, NULL, NULL),
(7, 1, '4', NULL, 'Chilli Fish', 'CHF', '', '', '', '', '', 'Fish tossed with onion, capsicum, garlic, herbs and fresh chilli.', '', '', 0.000, 0, 0, 0, '0000-00-00', '0000-00-00', NULL, 1, NULL, 0, '00:00:00', 1, 2, 2, 2, '2025-07-22', '2025-07-22', '2025-07-22', 1, 0, 0, 1.00, 12, NULL, NULL),
(8, 1, '4', NULL, 'Alu Tikki Chaat', 'ALTC', '', '', '', '', '', 'Round patties of potatoes with chat spices mint & tamarind chutney.', '', '', 0.000, 0, 0, 0, '0000-00-00', '0000-00-00', NULL, 1, NULL, 0, '00:00:00', 1, 2, 2, 2, '2025-07-22', '2025-07-22', '2025-07-22', 1, 0, 1, 1.00, 12, NULL, NULL),
(9, 1, '4', NULL, 'Samosa Chaat', 'SAC', '', '', '', '', '', 'Samosa with chickpeas mixed with chat spices, mint & tamarind chutney.', '', '', 0.000, 0, 0, 0, '0000-00-00', '0000-00-00', NULL, 1, NULL, 0, '00:00:00', 1, 2, 2, 2, '2025-07-22', '2025-07-22', '2025-07-22', 1, 0, 1, 1.00, 12, NULL, NULL),
(10, 1, '4', NULL, 'Pani Puri Shots', 'PAPS', '', '', '', '', '', 'Pani puri in shot glasses', '', '', 0.000, 0, 0, 0, '0000-00-00', '0000-00-00', NULL, 1, NULL, 0, '00:00:00', 1, 2, 2, 2, '2025-07-22', '2025-07-22', '2025-07-22', 1, 0, 1, 1.00, 12, NULL, NULL),
(11, 1, '4', NULL, 'Veg Curry Bombs', 'VECB', '', '', '', '', '', 'Curry shots in crispy putfs', '', '', 0.000, 0, 0, 0, '0000-00-00', '0000-00-00', NULL, 1, NULL, 0, '00:00:00', 1, 2, 2, 2, '2025-07-22', '2025-07-22', '2025-07-22', 1, 0, 1, 1.00, 12, NULL, NULL),
(12, 1, '4', NULL, 'Chicken Curry Bombs', 'CHCB', '', '', '', '', '', 'Curry shots in crispy puffs', '', '', 0.000, 0, 0, 0, '0000-00-00', '0000-00-00', NULL, 1, NULL, 0, '00:00:00', 1, 2, 2, 2, '2025-07-22', '2025-07-22', '2025-07-22', 1, 0, 0, 1.00, 12, NULL, NULL),
(13, 1, '4', NULL, 'Veg Fried Rice', 'VEFR', '', '', '', '', '', 'Hot wok stir.fried rice infused with spices and vegetables.', '', '', 0.000, 0, 0, 0, '0000-00-00', '0000-00-00', NULL, 1, NULL, 0, '00:00:00', 1, 2, 2, 2, '2025-07-22', '2025-07-22', '2025-07-22', 1, 0, 1, 1.00, 12, NULL, NULL),
(14, 1, '4', NULL, 'Chicken Fried Rice', 'CHFR', '', '', '', '', '', 'Hot wok stir-fried rice infused with spices and chicken', '', '', 0.000, 0, 0, 0, '0000-00-00', '0000-00-00', NULL, 1, NULL, 0, '00:00:00', 1, 2, 2, 2, '2025-07-22', '2025-07-22', '2025-07-22', 1, 0, 0, 1.00, 12, NULL, NULL),
(15, 1, '5', NULL, 'Vegetable Samosa (3 per serve)', 'VES', '', '', '', '', 'DF', 'Spiced potatoes with peas, onion & fresh coriander stuffed into our homemade pastry & fried', '', '', 0.000, 0, 0, 0, '0000-00-00', '0000-00-00', NULL, 1, NULL, 0, '00:00:00', 1, 2, 2, 2, '2025-07-22', '2025-07-22', '2025-07-22', 1, 0, 1, 1.00, 12, NULL, NULL),
(16, 1, '5', NULL, 'Onion Bhaji Pakora (4 per serve)', 'ONBP', '', '', '', '', 'DF,GF', 'Sliced onion fritter dipped in chickpea batter with spices & gently fried', '', '', 0.000, 0, 0, 0, '0000-00-00', '0000-00-00', NULL, 1, NULL, 0, '00:00:00', 1, 2, 2, 2, '2025-07-22', '2025-07-22', '2025-07-22', 1, 0, 1, 1.00, 12, NULL, NULL),
(17, 1, '5', NULL, 'Alu Bonda (3 per serve)', 'ALB', '', '', '', '', '', 'Mashed potatoes, homemade cheese, fresh coriander coated in bread crumbs, lightly spiced & fried.', '', '', 0.000, 0, 0, 0, '0000-00-00', '0000-00-00', NULL, 1, NULL, 0, '00:00:00', 1, 2, 2, 2, '2025-07-29', '2025-07-29', '2025-07-29', 1, 0, 1, 1.00, 12, NULL, NULL),
(18, 1, '5', NULL, 'Paneer Pakora (4 per serve)', 'PAP', '', '', '', '', 'GF', 'Homemade cheese coated in chickpea batter & fried with spices.', '', '', 0.000, 0, 0, 0, '0000-00-00', '0000-00-00', NULL, 1, NULL, 0, '00:00:00', 1, 2, 2, 2, '2025-07-22', '2025-07-22', '2025-07-22', 1, 0, 1, 1.00, 12, NULL, NULL),
(19, 1, '5', NULL, 'Papadum Platter', 'PAP', '', '', '', '', '', '6 papadums served with 3 dips of choice (mint sauce, sweet chutney, raita, hot mix pickle or lime pickle).', '', '', 0.000, 0, 0, 0, '0000-00-00', '0000-00-00', NULL, 1, NULL, 0, '00:00:00', 1, 2, 2, 2, '2025-07-22', '2025-07-22', '2025-07-22', 1, 0, 1, 1.00, 12, NULL, NULL),
(20, 1, '5', NULL, 'Keema Samosa (3 per serve)', 'KES', '', '', '', '', 'DF', 'Spiced mince meat seasoned with fresh herbs & spices stuffed into our homemade pastry & fried.', '', '', 0.000, 0, 0, 0, '0000-00-00', '0000-00-00', NULL, 1, NULL, 0, '00:00:00', 1, 2, 2, 2, '2025-07-22', '2025-07-22', '2025-07-22', 1, 0, 0, 1.00, 12, NULL, NULL),
(21, 1, '5', NULL, 'Machi Pakora (6 Per Serve)', 'MAP', '', '', '', '', '', 'Pieces of fish coated in chickpea batter flavoured with mint, lemon, lightly spiced & fried.', '', '', 0.000, 0, 0, 0, '0000-00-00', '0000-00-00', NULL, 1, NULL, 0, '00:00:00', 1, 2, 2, 2, '2025-07-22', '2025-07-22', '2025-07-22', 1, 0, 0, 1.00, 12, NULL, NULL),
(22, 1, '5', NULL, 'Chicken Pakora (6 Per Serve)', 'CHP', '', '', '', '', 'GF,DF', 'Boneless chicken pieces marinated in chick pea batter, spices & herbs and fried till they are crispy.', '', '', 0.000, 0, 0, 0, '0000-00-00', '0000-00-00', NULL, 1, NULL, 0, '00:00:00', 1, 2, 2, 2, '2025-07-22', '2025-07-22', '2025-07-22', 1, 0, 0, 1.00, 12, NULL, NULL),
(23, 1, '5', NULL, 'Prawn Pakora (6 Per Serve)', 'PRP', '', '', '', '', '', 'Prawn coated in chickpea batter flavoured with spices, crumbled & fried.', '', '', 0.000, 0, 0, 0, '0000-00-00', '0000-00-00', NULL, 1, NULL, 0, '00:00:00', 1, 2, 2, 2, '2025-07-22', '2025-07-22', '2025-07-22', 1, 0, 0, 1.00, 12, NULL, NULL),
(24, 1, '5', NULL, 'Lamb Seekh Kebab (4 Per Serve)', 'LASK', '', '', '', '', 'GF', 'Skewers of lamb mince cooked in traditional aromatic spices.', '', '', 0.000, 0, 0, 0, '0000-00-00', '0000-00-00', NULL, 1, NULL, 0, '00:00:00', 1, 2, 2, 2, '2025-07-22', '2025-07-22', '2025-07-22', 1, 0, 0, 1.00, 12, NULL, NULL),
(25, 1, '5', NULL, 'Chilli Garlic Prawns (8 Per Serve)', 'CHGP', '', '', '', '', 'GF', 'Prawns cooked with capsicum, onion, ginger, garlic & spices in a sweet and sour ', '', '', 0.000, 0, 0, 0, '0000-00-00', '0000-00-00', NULL, 1, NULL, 0, '00:00:00', 1, 2, 2, 2, '2025-07-22', '2025-07-22', '2025-07-22', 1, 0, 0, 1.00, 12, NULL, NULL),
(26, 1, '5', NULL, 'Lamb Cutlets (4 Per Serve)', 'LAC', '', '', '', '', 'DF,GF', 'Tender lamb cutlets marinated in basic spices & served with mint sauce.', '', '', 0.000, 0, 0, 0, '0000-00-00', '0000-00-00', NULL, 1, NULL, 0, '00:00:00', 1, 2, 2, 2, '2025-07-22', '2025-07-22', '2025-07-22', 1, 0, 0, 1.00, 12, NULL, NULL),
(27, 1, '6', NULL, 'Paneer Tikka (6 Per Serve)', 'PAT', '', '', '', '', 'GF', 'Home made cheese cubes, capsicum and onion marinated in tandoori spices, skewered & grilled.', '', '', 0.000, 0, 0, 0, '0000-00-00', '0000-00-00', NULL, 1, NULL, 0, '00:00:00', 1, 2, 2, 2, '2025-07-22', '2025-07-22', '2025-07-22', 1, 0, 1, 1.00, 12, NULL, NULL),
(28, 1, '6', NULL, 'Tandoori Chicken Wings (6 Per Serve)', 'TACW', '', '', '', '', 'GF', 'Chicken wings marinated in yoghurt, fresh herbs, spices and grille', '', '', 0.000, 0, 0, 0, '0000-00-00', '0000-00-00', NULL, 1, NULL, 0, '00:00:00', 1, 2, 2, 2, '2025-07-22', '2025-07-22', '2025-07-22', 1, 0, 0, 1.00, 12, NULL, NULL),
(29, 1, '6', NULL, 'Tandoori Drumsticks (2 Per Serve)', 'TAD', '', '', '', '', 'GF', 'Chicken drumsticks marinated in yoghurt, fresh herbs & spices & grilled', '', '', 0.000, 0, 0, 0, '0000-00-00', '0000-00-00', NULL, 1, NULL, 0, '00:00:00', 1, 2, 2, 2, '2025-07-22', '2025-07-22', '2025-07-22', 1, 0, 0, 1.00, 12, NULL, NULL),
(30, 1, '6', NULL, 'Chicken Tikka (4 Per Serve)', 'CHT', '', '', '', '', 'GF', 'Boneless chicken pieces marinated with yoghurt, fresh herbs & spices, skewered & grilled. ', '', '', 0.000, 0, 0, 0, '0000-00-00', '0000-00-00', NULL, 1, NULL, 0, '00:00:00', 1, 2, 2, 2, '2025-07-22', '2025-07-22', '2025-07-22', 1, 0, 0, 1.00, 12, NULL, NULL),
(31, 1, '3', 7, 'Alu Gobi', 'ALG', '', '', '', '', 'DF,GF', 'Traditional North Indian curry cooked with cauliflower & potatoes with fresh coriander.', '', '', 0.000, 0, 0, 0, '0000-00-00', '0000-00-00', NULL, 1, NULL, 0, '00:00:00', 1, 2, 2, 2, '2025-07-22', '2025-07-22', '2025-07-22', 1, 0, 1, 1.00, 12, NULL, NULL),
(32, 1, '3', 7, 'Mixed Vegetable Curry', 'MIVC', '', '', '', '', 'GF', 'An assortment of fresh vegetables blended with fresh coriander & various spices.', '', '', 0.000, 0, 0, 0, '0000-00-00', '0000-00-00', NULL, 1, NULL, 0, '00:00:00', 1, 2, 2, 2, '2025-07-21', '2025-07-21', '2025-07-21', 1, 0, 1, 1.00, 12, NULL, NULL),
(33, 1, '3', 7, 'Bombay Potatoes', 'BOP', '', '', '', '', 'DF,GF', 'Pan fried with garlic & onion & lightly spiced with fresh coriander.', '', '', 0.000, 0, 0, 0, '0000-00-00', '0000-00-00', NULL, 1, NULL, 0, '00:00:00', 1, 2, 2, 2, '2025-07-21', '2025-07-21', '2025-07-21', 1, 0, 1, 1.00, 12, NULL, NULL),
(35, 1, '3', 8, 'Channa Masala', 'CHM', '', '', '', '', 'GF,DF', 'A chickpea curry cooked with basic spices & herbs.', '', '', 0.000, 0, 0, 0, '0000-00-00', '0000-00-00', NULL, 1, NULL, 0, '00:00:00', 1, 2, 2, 2, '2025-07-21', '2025-07-21', '2025-07-21', 1, 0, 1, 1.00, 12, NULL, NULL),
(36, 1, '3', 8, 'Malai Kofta', 'MAK', '', '', '', '', '', 'Mashed potato & homemade cheese donut deep fried and served with a creamy sauce.', '', '', 0.000, 0, 0, 0, '0000-00-00', '0000-00-00', NULL, 1, NULL, 0, '00:00:00', 1, 2, 2, 2, '2025-07-21', '2025-07-21', '2025-07-21', 1, 0, 1, 1.00, 12, NULL, NULL),
(37, 1, '3', 8, 'Alu Matar', 'ALM', '', '', '', '', '', 'A popular dish from Kashmir, cubed potatoes cooked with peas & roasted spices.', '', '', 0.000, 0, 0, 0, '0000-00-00', '0000-00-00', NULL, 1, NULL, 0, '00:00:00', 1, 2, 2, 2, '2025-07-21', '2025-07-21', '2025-07-21', 1, 0, 1, 1.00, 7, NULL, NULL),
(38, 1, '3', 8, 'Alu or Paneer Palak', 'AL, PAP', '', '', '', '', 'GF', 'A spinach delicacy blended with fresh masala & served with cubes of potatoes or homemade cheese.', '', '', 0.000, 0, 0, 0, '0000-00-00', '0000-00-00', NULL, 1, NULL, 0, '00:00:00', 1, 2, 2, 2, '2025-07-21', '2025-07-21', '2025-07-21', 1, 0, 1, 1.00, 12, NULL, NULL),
(39, 1, '3', 8, 'Dhal Makhini', 'DHM', '', '', '', '', 'GF', 'Lentil curry mixed in a variety of spices & simmered.', '', '', 0.000, 0, 0, 0, '0000-00-00', '0000-00-00', NULL, 1, NULL, 0, '00:00:00', 1, 2, 2, 2, '2025-07-21', '2025-07-21', '2025-07-21', 1, 0, 1, 1.00, 12, NULL, NULL),
(40, 1, '3', 8, 'Dhal Palak', 'DHP', '', '', '', '', 'GF', 'Spinach curry with lentils & traditional spices & herbs.', '', '', 0.000, 0, 0, 0, '0000-00-00', '0000-00-00', NULL, 1, NULL, 0, '00:00:00', 1, 2, 2, 2, '2025-07-21', '2025-07-21', '2025-07-21', 1, 0, 1, 1.00, 12, NULL, NULL),
(41, 1, '3', 8, 'Veg Dhal', 'VED', '', '', '', '', '', 'Lentil curry cooked with vegetables & fresh coriander.', '', '', 0.000, 0, 0, 0, '0000-00-00', '0000-00-00', NULL, 1, NULL, 0, '00:00:00', 1, 2, 2, 2, '2025-07-21', '2025-07-21', '2025-07-21', 1, 0, 1, 1.00, 12, NULL, NULL),
(42, 1, '3', 8, 'Dhal Masala', 'DHM', '', '', '', '', 'Gf', 'Lentil curry mixed in a variety of spices & simmered.', '', '', 0.000, 0, 0, 0, '0000-00-00', '0000-00-00', NULL, 1, NULL, 0, '00:00:00', 1, 2, 2, 2, '2025-07-21', '2025-07-21', '2025-07-21', 1, 0, 1, 1.00, 12, NULL, NULL),
(43, 1, '3', 8, 'Kadahi Paneer', 'KAP', '', '', '', '', 'GF', 'Cubes of homemade cheese with pan fried fresh ginger, garlic, tomato, onion and capsicum. Finished with hot spices in a creamy tomato based sauce.', '', '', 0.000, 0, 0, 0, '0000-00-00', '0000-00-00', NULL, 1, NULL, 0, '00:00:00', 1, 2, 2, 2, '2025-07-21', '2025-07-21', '2025-07-21', 1, 0, 1, 1.00, 12, NULL, NULL),
(44, 1, '3', 8, 'Butter Matar Paneer', 'BUMP', '', '', '', '', 'Gf', 'Cubes of homemade cheese & peas cooked in tomatoes ground cashews & spices giving a smooth rich gravy.', '', '', 0.000, 0, 0, 0, '0000-00-00', '0000-00-00', NULL, 1, NULL, 0, '00:00:00', 1, 2, 2, 2, '2025-07-21', '2025-07-21', '2025-07-21', 1, 0, 1, 1.00, 12, NULL, NULL),
(45, 1, '3', 8, 'Vegetable Paneer Tikka Masala', 'VEPTM', '', '', '', '', 'GF', 'Mixed vegetables & cubes of homemade cheese cooked in a gentle & sweet tomato creamy sauce.', '', '', 0.000, 0, 0, 0, '0000-00-00', '0000-00-00', NULL, 1, NULL, 0, '00:00:00', 1, 2, 2, 2, '2025-07-21', '2025-07-21', '2025-07-21', 1, 0, 1, 1.00, 12, NULL, NULL),
(46, 1, '3', 8, 'Alu Matar Madras', 'ALMM', '', '', '', '', 'GF,DF', 'Cooked in fresh tomatoes, onions, herbs & spices South Indian curry with cubes of potatoes & peas.', '', '', 0.000, 0, 0, 0, '0000-00-00', '0000-00-00', NULL, 1, NULL, 0, '00:00:00', 1, 2, 2, 2, '2025-07-21', '2025-07-21', '2025-07-21', 1, 0, 1, 1.00, 12, NULL, NULL),
(47, 1, '3', 8, 'Butter Paneer', 'BUP', '', '', '', '', 'GF', 'Cubes of cottage cheese cooked with a special butter sauce.', '', '', 0.000, 0, 0, 0, '0000-00-00', '0000-00-00', NULL, 1, NULL, 0, '00:00:00', 1, 2, 2, 2, '2025-07-21', '2025-07-21', '2025-07-21', 1, 0, 1, 1.00, 12, NULL, NULL),
(48, 1, '3', 8, 'Shahi Paneer', 'SHP', '', '', '', '', 'GF', 'Cubes of cottage cheese cooked in a gentle creamy sauce.', '', '', 0.000, 0, 0, 0, '0000-00-00', '0000-00-00', NULL, 1, NULL, 0, '00:00:00', 1, 2, 2, 2, '2025-07-21', '2025-07-21', '2025-07-21', 1, 0, 1, 1.00, 12, NULL, NULL),
(49, 1, '3', 8, 'Paneer Tikka Masala', 'PATM', '', '', '', '', 'GF', 'Cubes of homemade cheese cooked in a gentle tomato sauce with chunks of onion & capsicum.', '', '', 0.000, 0, 0, 0, '0000-00-00', '0000-00-00', NULL, 1, NULL, 0, '00:00:00', 1, 2, 2, 2, '2025-07-21', '2025-07-21', '2025-07-21', 1, 0, 1, 1.00, 7, NULL, NULL),
(50, 1, '3', 8, 'Mushroom Malai', 'MUM', '', '', '', '', 'GF', 'Mushrooms cooked in a rich exotic sauce with coconut milk and spices.', '', '', 0.000, 0, 0, 0, '0000-00-00', '0000-00-00', NULL, 1, NULL, 0, '00:00:00', 1, 2, 2, 2, '2025-07-21', '2025-07-21', '2025-07-21', 1, 0, 1, 1.00, 12, NULL, NULL),
(51, 1, '3', 8, 'Veg Dhansak', 'VED', '', '', '', '', 'GF', 'Chef\'s special creation simmered with lentils and flavoured with fresh lemon juice and garlic', '', '', 0.000, 0, 0, 0, '0000-00-00', '0000-00-00', NULL, 1, NULL, 0, '00:00:00', 1, 2, 2, 2, '2025-08-04', '2025-08-04', '2025-08-04', 1, 0, 1, 1.00, 12, NULL, NULL),
(52, 1, '3', 8, 'Veg Korma', 'VEK', '', '', '', '', '', 'The Korma was created for the Moghul emperors. Yoghurt & selected spices are used to create this rich & exotic curry.', '', '', 0.000, 0, 0, 0, '0000-00-00', '0000-00-00', NULL, 1, NULL, 0, '00:00:00', 1, 2, 2, 2, '2025-08-04', '2025-08-04', '2025-08-04', 1, 0, 1, 1.00, 12, NULL, NULL),
(53, 1, '3', 8, 'Veg Madras', 'VEM', '', '', '', '', 'GF,DF', 'A delicious curry from the south of India prepared with tomatoes onions & fresh herbs & spices.', '', '', 0.000, 0, 0, 0, '0000-00-00', '0000-00-00', NULL, 1, NULL, 0, '00:00:00', 1, 2, 2, 2, '2025-08-04', '2025-08-04', '2025-08-04', 1, 0, 1, 1.00, 12, NULL, NULL),
(54, 1, '3', 8, 'Vindaloo', 'VI', '', '', '', '', '', ' lovers dream - uniquely blended spices make it tangy & HOT.This is a seasoned curry', '', '', 0.000, 0, 0, 0, '0000-00-00', '0000-00-00', NULL, 1, NULL, 0, '00:00:00', 1, 2, 2, 2, '2025-07-21', '2025-07-21', '2025-07-21', 1, 0, 1, 1.00, 12, NULL, NULL),
(55, 1, '3', 8, 'Veg Ceylon', 'VEC', '', '', '', '', 'GF,DF', 'Goan style curry, prepared with coconut & traditional Ceylonese spices creating a unique flavour.', '', '', 0.000, 0, 0, 0, '0000-00-00', '0000-00-00', NULL, 1, NULL, 0, '00:00:00', 1, 2, 2, 2, '2025-08-04', '2025-08-04', '2025-08-04', 1, 0, 1, 1.00, 12, NULL, NULL),
(56, 1, '3', 8, 'Veg Bhuna', 'VEB', '', '', '', '', 'GF,DF', 'An English favourite curry cooked with fresh garlic, capsicum, onion, tomato & fresh herbs and spices', '', '', 0.000, 0, 0, 0, '0000-00-00', '0000-00-00', NULL, 1, NULL, 0, '00:00:00', 1, 2, 2, 2, '2025-08-05', '2025-08-05', '2025-08-05', 1, 0, 1, 1.00, 12, NULL, NULL),
(57, 1, '3', 8, 'Veg Punjabi Delight', 'VEPD', '', '', '', '', '', 'Meat cooked in basic spices, cashews & sultanas. A curry which is commonly used in the every day life of Indian Families.', '', '', 0.000, 0, 0, 0, '0000-00-00', '0000-00-00', NULL, 1, NULL, 0, '00:00:00', 1, 2, 2, 2, '2025-08-05', '2025-08-05', '2025-08-05', 1, 0, 1, 1.00, 12, NULL, NULL),
(58, 1, '3', 8, 'Veg Rogan Josh', 'VERJ', '', '', '', '', '', 'Traditional style curry cooked with a north Indian spice blend in our signature rogan josh sauce.', '', '', 0.000, 0, 0, 0, '0000-00-00', '0000-00-00', NULL, 1, NULL, 0, '00:00:00', 1, 2, 2, 2, '2025-08-05', '2025-08-05', '2025-08-05', 1, 0, 1, 1.00, 12, NULL, NULL),
(59, 1, '3', 8, 'Masala', 'MA', '', '', '', '', '', ' Your choice of meat cooked with basic spices, herbs & flavoured with fresh coriander.', '', '', 0.000, 0, 0, 0, '0000-00-00', '0000-00-00', NULL, 1, NULL, 0, '00:00:00', 1, 2, 2, 2, '2025-07-21', '2025-07-21', '2025-07-21', 1, 0, 0, 1.00, 12, NULL, NULL),
(60, 1, '3', 9, 'Butter Chicken', 'BUC', '', '', '', '', 'GF', 'Boneless curried chicken pieces cooked in tomato, ground cashew nuts & spices in a thick smooth gravy.', '', '', 0.000, 0, 0, 0, '0000-00-00', '0000-00-00', NULL, 1, NULL, 0, '00:00:00', 1, 2, 2, 2, '2025-07-21', '2025-07-21', '2025-07-21', 1, 0, 0, 1.00, 7, NULL, NULL),
(61, 1, '3', 9, 'Chicken Tikka Masala', 'CHTM', '', '', '', '', 'GF', 'Boneless chicken pieces baked in the oven then blended in a sweet & gentle creamy tomato sauce with ground cashew nuts.', '', '', 0.000, 0, 0, 0, '0000-00-00', '0000-00-00', NULL, 1, NULL, 0, '00:00:00', 1, 2, 2, 2, '2025-07-21', '2025-07-21', '2025-07-21', 1, 0, 0, 1.00, 12, NULL, NULL),
(62, 1, '3', 9, 'Kadahi Chicken', 'KAC', '', '', '', '', 'GF', 'Chicken pieces with pan fried fresh ginger, garlic, tomato, onion & capsicum. Finished with hot spices in a creamy tomato based sauce.', '', '', 0.000, 0, 0, 0, '0000-00-00', '0000-00-00', NULL, 1, NULL, 0, '00:00:00', 1, 2, 2, 2, '2025-07-21', '2025-07-21', '2025-07-21', 1, 0, 0, 1.00, 12, NULL, NULL),
(63, 1, '3', 9, 'Chicken Palak', 'CHP', '', '', '', '', 'GF', 'Tender & flavoursome Punjabi curry with spinach & herbs.', '', '', 0.000, 0, 0, 0, '0000-00-00', '0000-00-00', NULL, 1, NULL, 0, '00:00:00', 1, 2, 2, 2, '2025-08-04', '2025-08-04', '2025-08-04', 1, 0, 0, 1.00, 12, NULL, NULL),
(64, 1, '3', 9, 'Chicken Makhini', 'CHM', '', '', '', '', 'GF', ' Tandoori baked chicken cooked in ground cashews and spices with hints of onion and capsicum. ', '', '', 0.000, 0, 0, 0, '0000-00-00', '0000-00-00', NULL, 1, NULL, 0, '00:00:00', 1, 2, 2, 2, '2025-07-21', '2025-07-21', '2025-07-21', 1, 0, 0, 1.00, 12, NULL, NULL),
(65, 1, '3', 9, 'Mango Chicken', 'MAC', '', '', '', '', 'GF', ' Chicken pieces blended in a smooth thick mango gravy.', '', '', 0.000, 0, 0, 0, '0000-00-00', '0000-00-00', NULL, 1, NULL, 0, '00:00:00', 1, 2, 2, 2, '2025-07-21', '2025-07-21', '2025-07-21', 1, 0, 0, 1.00, 12, NULL, NULL),
(66, 1, '3', 9, 'Chicken Tikka Biryani', 'CHTB', '', '', '', '', 'GF', 'Tandoori chicken tikka pieces cooked in basic spices & flavoured rice served with yogurt.', '', '', 0.000, 0, 0, 0, '0000-00-00', '0000-00-00', NULL, 1, NULL, 0, '00:00:00', 1, 2, 2, 2, '2025-07-21', '2025-07-21', '2025-07-21', 1, 0, 0, 1.00, 12, NULL, NULL),
(67, 1, '3', 9, 'Chicken Tikka Jalfrezi', 'CHTJ', '', '', '', '', 'GF', 'This is a wonderfully aromatic dish cooked in royal spices with onions, tomator and capsicum.', '', '', 0.000, 0, 0, 0, '0000-00-00', '0000-00-00', NULL, 1, NULL, 0, '00:00:00', 1, 2, 2, 2, '2025-07-21', '2025-07-21', '2025-07-21', 1, 0, 0, 1.00, 12, NULL, NULL),
(68, 1, '3', 9, 'Goat Curry', 'GOC', '', '', '', '', 'GF', 'Goat curry made in the traditional way – slow cooked goat on-the-bone, full of ȵDYRXU SHUIHFWO\\WHQGHU MXLF\\', '', '', 0.000, 0, 0, 0, '0000-00-00', '0000-00-00', NULL, 1, NULL, 0, '00:00:00', 1, 2, 2, 2, '2025-07-21', '2025-07-21', '2025-07-21', 1, 0, 0, 1.00, 12, NULL, NULL),
(69, 1, '3', 9, 'Mutton Keema Curry', 'MUKC', '', '', '', '', 'GF', 'Traditional slow cooked dish with mince and your choice of meat (available with lamb, goat or beef).', '', '', 0.000, 0, 0, 0, '0000-00-00', '0000-00-00', NULL, 1, NULL, 0, '00:00:00', 1, 2, 2, 2, '2025-07-21', '2025-07-21', '2025-07-21', 1, 0, 0, 1.00, 12, NULL, NULL),
(70, 1, '10', NULL, 'Half Tandoori Chicken', 'HATC', '', '', '', '', 'GF', '', '', '', 0.000, 0, 0, 0, '0000-00-00', '0000-00-00', NULL, 1, NULL, 0, '00:00:00', 1, 2, 2, 2, '2025-07-22', '2025-07-22', '2025-07-22', 1, 0, 0, 1.00, 12, NULL, NULL),
(71, 1, '10', NULL, 'Full Tandoori Chicken', 'FUTC', '', '', '', '', 'GF', '', '', '', 0.000, 0, 0, 0, '0000-00-00', '0000-00-00', NULL, 1, NULL, 0, '00:00:00', 1, 2, 2, 2, '2025-07-22', '2025-07-22', '2025-07-22', 1, 0, 0, 1.00, 12, NULL, NULL),
(72, 1, '10', NULL, 'Tandoori Platter For 2', 'TAPF2', '', '', '', '', '', 'Consists of 6 pieces of tandoori prawns and 2 pieces each of chicken tikka, lamb cutlets and lamb sheekh kebabs.', '', '', 0.000, 0, 0, 0, '0000-00-00', '0000-00-00', NULL, 1, NULL, 0, '00:00:00', 1, 2, 2, 2, '2025-07-22', '2025-07-22', '2025-07-22', 1, 0, 0, 1.00, 12, NULL, NULL),
(73, 1, '11', NULL, 'Saffron Rice', 'SAR', '', '', '', '', '', '', '', '', 0.000, 0, 0, 0, '0000-00-00', '0000-00-00', NULL, 1, NULL, 0, '00:00:00', 1, 2, 2, 2, '2025-07-22', '2025-07-22', '2025-07-22', 1, 0, 1, 1.00, 12, NULL, NULL),
(74, 1, '11', NULL, 'Jeera Rice', 'JER', '', '', '', '', '', '', '', '', 0.000, 0, 0, 0, '0000-00-00', '0000-00-00', NULL, 1, NULL, 0, '00:00:00', 1, 2, 2, 2, '2025-07-22', '2025-07-22', '2025-07-22', 1, 0, 1, 1.00, 12, NULL, NULL),
(75, 1, '11', NULL, 'Coconut Rice', 'COR', '', '', '', '', '', '', '', '', 0.000, 0, 0, 0, '0000-00-00', '0000-00-00', NULL, 1, NULL, 0, '00:00:00', 1, 2, 2, 2, '2025-07-22', '2025-07-22', '2025-07-22', 1, 0, 1, 1.00, 12, NULL, NULL),
(76, 1, '11', NULL, 'Pulao Rice', 'PUR', '', '', '', '', '', '', '', '', 0.000, 0, 0, 0, '0000-00-00', '0000-00-00', NULL, 1, NULL, 0, '00:00:00', 1, 2, 2, 2, '2025-07-22', '2025-07-22', '2025-07-22', 1, 0, 1, 1.00, 12, NULL, NULL),
(77, 1, '12', NULL, 'Vegetable Biryani', 'VEB', '', '', '', '', '', '', '', '', 0.000, 0, 0, 0, '0000-00-00', '0000-00-00', NULL, 1, NULL, 0, '00:00:00', 1, 2, 2, 2, '2025-08-04', '2025-08-04', '2025-08-04', 1, 0, 1, 1.00, 12, NULL, NULL),
(78, 1, '12', NULL, 'Chicken Biryani', 'CHB', '', '', '', '', '', '', '', '', 0.000, 0, 0, 0, '0000-00-00', '0000-00-00', NULL, 1, NULL, 0, '00:00:00', 1, 2, 2, 2, '2025-07-22', '2025-07-22', '2025-07-22', 1, 0, 0, 1.00, 12, NULL, NULL),
(79, 1, '12', NULL, 'Chicken Tikka Biryani', 'CHTB', '', '', '', '', '', '', '', '', 0.000, 0, 0, 0, '0000-00-00', '0000-00-00', NULL, 1, NULL, 0, '00:00:00', 1, 2, 2, 2, '2025-07-22', '2025-07-22', '2025-07-22', 1, 0, 0, 1.00, 12, NULL, NULL),
(80, 1, '12', NULL, 'Lamb Biryani', 'LAB', '', '', '', '', '', '', '', '', 0.000, 0, 0, 0, '0000-00-00', '0000-00-00', NULL, 1, NULL, 0, '00:00:00', 1, 2, 2, 2, '2025-07-22', '2025-07-22', '2025-07-22', 1, 0, 0, 1.00, 12, NULL, NULL),
(81, 1, '12', NULL, 'Beef Biryani', 'BEB', '', '', '', '', '', '', '', '', 0.000, 0, 0, 0, '0000-00-00', '0000-00-00', NULL, 1, NULL, 0, '00:00:00', 1, 2, 2, 2, '2025-07-22', '2025-07-22', '2025-07-22', 1, 0, 0, 1.00, 12, NULL, NULL),
(82, 1, '12', NULL, 'Prawn Biryani', 'PRB', '', '', '', '', '', '', '', '', 0.000, 0, 0, 0, '0000-00-00', '0000-00-00', NULL, 1, NULL, 0, '00:00:00', 1, 2, 2, 2, '2025-07-22', '2025-07-22', '2025-07-22', 1, 0, 0, 1.00, 12, NULL, NULL),
(83, 1, '3', 13, 'Malai', 'MA', '', '', '', '', 'GF', 'Prawns/Fish cooked in a rich sauce with coconut milk & spices.', '', '', 0.000, 0, 0, 0, '0000-00-00', '0000-00-00', NULL, 1, NULL, 0, '00:00:00', 1, 2, 2, 2, '2025-07-21', '2025-07-21', '2025-07-21', 1, 0, 0, 1.00, 12, NULL, NULL),
(84, 1, '3', 13, 'Veg Vindaloo', 'VEV', '', '', '', '', 'GF,DF', 'A seafood curry prepared with a wide array of spices, garlic & ginger simmered in a special onion sauce', '', '', 0.000, 0, 0, 0, '0000-00-00', '0000-00-00', NULL, 1, NULL, 0, '00:00:00', 1, 2, 2, 2, '2025-08-04', '2025-08-04', '2025-08-04', 1, 0, 0, 1.00, 12, NULL, NULL),
(85, 1, '3', 8, 'Veg Masala', 'VEM', '', '', '', '', 'GF,DF', 'Prawns/Fish marinated with ginger & garlic then pan fried with spices, fresh tomatoes & coriander', '', '', 0.000, 0, 0, 0, '0000-00-00', '0000-00-00', NULL, 1, NULL, 0, '00:00:00', 1, 2, 2, 2, '2025-08-05', '2025-08-05', '2025-08-05', 1, 0, 0, 1.00, 12, NULL, NULL),
(86, 1, '3', 13, 'Palak', 'PA', '', '', '', '', 'GF', 'Cooked with spinach & traditional spices', '', '', 0.000, 0, 0, 0, '0000-00-00', '0000-00-00', NULL, 1, NULL, 0, '00:00:00', 1, 2, 2, 2, '2025-07-21', '2025-07-21', '2025-07-21', 1, 0, 0, 1.00, 12, NULL, NULL),
(87, 1, '3', 13, 'Tikka Masala', 'TIM', '', '', '', '', 'GF', 'Prawns/Fish cooked in a sweet tomato creamy sauce & spices.', '', '', 0.000, 0, 0, 0, '0000-00-00', '0000-00-00', NULL, 1, NULL, 0, '00:00:00', 1, 2, 2, 2, '2025-07-30', '2025-07-30', '2025-07-30', 1, 0, 0, 1.00, 12, NULL, NULL),
(88, 1, '3', 13, 'Prawn Biryani', 'PRB', '', '', '', '', 'GF', 'Prawns sauteed and simmered in fresh garlic & cooked with flavoured rice served.', '', '', 0.000, 0, 0, 0, '0000-00-00', '0000-00-00', NULL, 1, NULL, 0, '00:00:00', 1, 2, 2, 2, '2025-07-30', '2025-07-30', '2025-07-30', 1, 0, 0, 1.00, 12, NULL, NULL),
(89, 1, '14', NULL, 'Papadums (4 per serve)', 'PA', '', '', '', '', 'DF,GF', '', '', '', 0.000, 0, 0, 0, '0000-00-00', '0000-00-00', NULL, 1, NULL, 0, '00:00:00', 1, 2, 2, 2, '2025-07-22', '2025-07-22', '2025-07-22', 1, 0, 1, 1.00, 12, NULL, NULL),
(91, 1, '14', NULL, 'Yoghurt & Cucumber Raita', 'YO&CR', '', '', '', '', '', '', '', '', 0.000, 0, 0, 0, '0000-00-00', '0000-00-00', NULL, 1, NULL, 0, '00:00:00', 1, 2, 2, 2, '2025-07-22', '2025-07-22', '2025-07-22', 1, 0, 1, 1.00, 12, NULL, NULL),
(92, 1, '14', NULL, 'Yoghurt & Mint Sauce ', 'YO&MS', '', '', '', '', '', '', '', '', 0.000, 0, 0, 0, '0000-00-00', '0000-00-00', NULL, 1, NULL, 0, '00:00:00', 1, 2, 2, 2, '2025-07-22', '2025-07-22', '2025-07-22', 1, 0, 1, 1.00, 12, NULL, NULL),
(93, 1, '14', NULL, 'Hot Mix Pickle', 'HOMP', '', '', '', '', '', '', '', '', 0.000, 0, 0, 0, '0000-00-00', '0000-00-00', NULL, 1, NULL, 0, '00:00:00', 1, 2, 2, 2, '2025-07-22', '2025-07-22', '2025-07-22', 1, 0, 1, 1.00, 12, NULL, NULL),
(94, 1, '14', NULL, 'Chilli Pickle', 'CHP', '', '', '', '', '', '', '', '', 0.000, 0, 0, 0, '0000-00-00', '0000-00-00', NULL, 1, NULL, 0, '00:00:00', 1, 2, 2, 2, '2025-07-22', '2025-07-22', '2025-07-22', 1, 0, 1, 1.00, 12, NULL, NULL),
(95, 1, '14', NULL, 'Lime Pickle', 'LIP', '', '', '', '', '', '', '', '', 0.000, 0, 0, 0, '0000-00-00', '0000-00-00', NULL, 1, NULL, 0, '00:00:00', 1, 2, 2, 2, '2025-07-22', '2025-07-22', '2025-07-22', 1, 0, 1, 1.00, 12, NULL, NULL),
(96, 1, '14', NULL, 'Sweet Chutney', 'SWC', '', '', '', '', '', '', '', '', 0.000, 0, 0, 0, '0000-00-00', '0000-00-00', NULL, 1, NULL, 0, '00:00:00', 1, 2, 2, 2, '2025-07-22', '2025-07-22', '2025-07-22', 1, 0, 1, 1.00, 12, NULL, NULL),
(97, 1, '14', NULL, 'Sliced Onions', 'SLO', '', '', '', '', '', '', '', '', 0.000, 0, 0, 0, '0000-00-00', '0000-00-00', NULL, 1, NULL, 0, '00:00:00', 1, 2, 2, 2, '2025-07-22', '2025-07-22', '2025-07-22', 1, 0, 1, 1.00, 12, NULL, NULL),
(98, 1, '14', NULL, 'Indian Salad', 'INS', '', '', '', '', '', '', '', '', 0.000, 0, 0, 0, '0000-00-00', '0000-00-00', NULL, 1, NULL, 0, '00:00:00', 1, 2, 2, 2, '2025-07-22', '2025-07-22', '2025-07-22', 1, 0, 1, 1.00, 12, NULL, NULL),
(100, 1, '15', NULL, 'Naan', 'NA', '', '', '', '', '', 'A traditional Indian bread made with plain flour', '', '', 0.000, 0, 0, 0, '0000-00-00', '0000-00-00', NULL, 1, NULL, 0, '00:00:00', 1, 2, 2, 2, '2025-08-01', '2025-08-01', '2025-08-01', 1, 0, 1, 1.00, 7, NULL, NULL),
(101, 1, '15', NULL, 'Roti', 'RO', '', '', '', '', '', 'Round Indian bread simply made with wholemeal flour', '', '', 0.000, 0, 0, 0, '0000-00-00', '0000-00-00', NULL, 1, NULL, 0, '00:00:00', 1, 2, 2, 2, '2025-08-01', '2025-08-01', '2025-08-01', 1, 0, 1, 1.00, 7, NULL, NULL),
(102, 1, '15', NULL, 'Garlic Naan', 'GAN', '', '', '', '', '', '', '', '', 0.000, 0, 0, 0, '0000-00-00', '0000-00-00', NULL, 1, NULL, 0, '00:00:00', 1, 2, 2, 2, '2025-08-01', '2025-08-01', '2025-08-01', 1, 0, 1, 1.00, 7, NULL, NULL),
(103, 1, '15', NULL, 'Onion Kulcha', 'ONK', '', '', '', '', '', 'Naan bread filled with chopped onion', '', '', 0.000, 0, 0, 0, '0000-00-00', '0000-00-00', NULL, 1, NULL, 0, '00:00:00', 1, 2, 2, 2, '2025-08-01', '2025-08-01', '2025-08-01', 1, 0, 1, 1.00, 7, NULL, NULL),
(104, 1, '15', NULL, 'Cheese Naan', 'CHN', '', '', '', '', '', 'Naan bread filled with cheese', '', '', 0.000, 0, 0, 0, '0000-00-00', '0000-00-00', NULL, 1, NULL, 0, '00:00:00', 1, 2, 2, 2, '2025-08-01', '2025-08-01', '2025-08-01', 1, 0, 1, 1.00, 7, NULL, NULL),
(105, 1, '15', NULL, 'Masala Kulcha', 'MAK', '', '', '', '', '', 'Naan bread filled with lightly spiced potatoes.', '', '', 0.000, 0, 0, 0, '0000-00-00', '0000-00-00', NULL, 1, NULL, 0, '00:00:00', 1, 2, 2, 2, '2025-08-01', '2025-08-01', '2025-08-01', 1, 0, 1, 1.00, 7, NULL, NULL),
(106, 1, '15', NULL, 'Chilli Naan', 'CHN', '', '', '', '', '', '', '', '', 0.000, 0, 0, 0, '0000-00-00', '0000-00-00', NULL, 1, NULL, 0, '00:00:00', 1, 2, 2, 2, '2025-08-01', '2025-08-01', '2025-08-01', 1, 0, 1, 1.00, 7, NULL, NULL),
(107, 1, '15', NULL, 'Chilli & Cheese Naan', 'CH&CN', '', '', '', '', '', '', '', '', 0.000, 0, 0, 0, '0000-00-00', '0000-00-00', NULL, 1, NULL, 0, '00:00:00', 1, 2, 2, 2, '2025-08-01', '2025-08-01', '2025-08-01', 1, 0, 1, 1.00, 7, NULL, NULL),
(108, 1, '15', NULL, 'Garlic & Cheese Naan', 'GA&CN', '', '', '', '', '', '', '', '', 0.000, 0, 0, 0, '0000-00-00', '0000-00-00', NULL, 1, NULL, 0, '00:00:00', 1, 2, 2, 2, '2025-08-01', '2025-08-01', '2025-08-01', 1, 0, 1, 1.00, 7, NULL, NULL),
(109, 1, '15', NULL, 'Onion & Cheese Naan', 'ON&CN', '', '', '', '', '', '', '', '', 0.000, 0, 0, 0, '0000-00-00', '0000-00-00', NULL, 1, NULL, 0, '00:00:00', 1, 2, 2, 2, '2025-08-01', '2025-08-01', '2025-08-01', 1, 0, 1, 1.00, 7, NULL, NULL),
(110, 1, '15', NULL, 'Punjabi Naan', 'PUN', '', '', '', '', '', 'Chef\'s special Naan bread stuffed with cheese, spinach & herbs', '', '', 0.000, 0, 0, 0, '0000-00-00', '0000-00-00', NULL, 1, NULL, 0, '00:00:00', 1, 2, 2, 2, '2025-08-01', '2025-08-01', '2025-08-01', 1, 0, 1, 1.00, 7, NULL, NULL),
(111, 1, '15', NULL, 'Amritsari Kulcha', 'AMK', '', '', '', '', '', 'A fiery bread flavoured with herbs & a potato filling seasoned with ground spices', '', '', 0.000, 0, 0, 0, '0000-00-00', '0000-00-00', NULL, 1, NULL, 0, '00:00:00', 1, 2, 2, 2, '2025-08-01', '2025-08-01', '2025-08-01', 1, 0, 1, 1.00, 7, NULL, NULL),
(112, 1, '15', NULL, 'Peshwari Naan', 'PEN', '', '', '', '', '', 'Sweet Naan bread stuffed with nuts & dried fruit', '', '', 0.000, 0, 0, 0, '0000-00-00', '0000-00-00', NULL, 1, NULL, 0, '00:00:00', 1, 2, 2, 2, '2025-08-01', '2025-08-01', '2025-08-01', 1, 0, 1, 1.00, 7, NULL, NULL),
(113, 1, '15', NULL, 'Keema Naan', 'KEN', '', '', '', '', '', 'Naan bread stuffed with lightly spiced mince', '', '', 0.000, 0, 0, 0, '0000-00-00', '0000-00-00', NULL, 1, NULL, 0, '00:00:00', 1, 2, 2, 2, '2025-08-01', '2025-08-01', '2025-08-01', 1, 0, 1, 1.00, 7, NULL, NULL),
(114, 1, '15', NULL, 'Paneer Kulcha', 'PAK', '', '', '', '', '', 'Naan bread stuffed with cottage cheese.', '', '', 0.000, 0, 0, 0, '0000-00-00', '0000-00-00', NULL, 1, NULL, 0, '00:00:00', 1, 2, 2, 2, '2025-08-01', '2025-08-01', '2025-08-01', 1, 0, 1, 1.00, 7, NULL, NULL),
(115, 1, '15', NULL, 'Chicken Paneer Naan', 'CHPN', '', '', '', '', '', 'Naan based stuffed with chicken, cheese, onion and herbs', '', '', 0.000, 0, 0, 0, '0000-00-00', '0000-00-00', NULL, 1, NULL, 0, '00:00:00', 1, 2, 2, 2, '2025-08-01', '2025-08-01', '2025-08-01', 1, 0, 0, 1.00, 7, NULL, NULL),
(116, 1, '16', NULL, 'Chips', 'CH', '', '', '', '', '', '', '', '', 0.000, 0, 0, 0, '0000-00-00', '0000-00-00', NULL, 1, NULL, 0, '00:00:00', 1, 2, 2, 2, '2025-08-01', '2025-08-01', '2025-08-01', 1, 0, 1, 1.00, 12, NULL, NULL),
(117, 1, '16', NULL, 'Chicken Nuggets (5 Pieces)', 'CHN', '', '', '', '', '', '', '', '', 0.000, 0, 0, 0, '0000-00-00', '0000-00-00', NULL, 1, NULL, 0, '00:00:00', 1, 2, 2, 2, '2025-08-01', '2025-08-01', '2025-08-01', 1, 0, 0, 1.00, 12, NULL, NULL),
(118, 1, '16', NULL, 'Fish Fingers (4 Pieces)', 'FIF', '', '', '', '', '', '', '', '', 0.000, 0, 0, 0, '0000-00-00', '0000-00-00', NULL, 1, NULL, 0, '00:00:00', 1, 2, 2, 2, '2025-08-01', '2025-08-01', '2025-08-01', 1, 0, 0, 1.00, 12, NULL, NULL),
(119, 1, '17', NULL, 'Ice Cream', 'ICC', '', '', '', '', '', 'Vanilla or Chocolate', '', '', 0.000, 0, 0, 0, '0000-00-00', '0000-00-00', NULL, 1, NULL, 0, '00:00:00', 1, 2, 2, 2, '2025-08-01', '2025-08-01', '2025-08-01', 1, 0, 1, 1.00, 7, NULL, NULL),
(120, 1, '17', NULL, 'Gulab Jamun (2 Per Serve)', 'GUJ', '', '', '', '', '', 'Deep fried donut balls dipped in rose flavoured syrup.', '', '', 0.000, 0, 0, 0, '0000-00-00', '0000-00-00', NULL, 1, NULL, 0, '00:00:00', 1, 2, 2, 2, '2025-08-01', '2025-08-01', '2025-08-01', 1, 0, 1, 1.00, 7, NULL, NULL),
(121, 1, '17', NULL, 'Gulab Jamun (2 Per Serve) With Ice Cream', 'GUJWIC', '', '', '', '', '', '', '', '', 0.000, 0, 0, 0, '0000-00-00', '0000-00-00', NULL, 1, NULL, 0, '00:00:00', 1, 2, 2, 2, '2025-08-01', '2025-08-01', '2025-08-01', 1, 0, 1, 1.00, 7, NULL, NULL),
(122, 1, '17', NULL, 'Ras Malai', 'RAM', '', '', '', '', '', 'An Indian sweet dish consisting of small, flat cakes of paneer (curd cheese) in sweetened, thickened milk.', '', '', 0.000, 0, 0, 0, '0000-00-00', '0000-00-00', NULL, 1, NULL, 0, '00:00:00', 1, 2, 2, 2, '2025-08-01', '2025-08-01', '2025-08-01', 1, 0, 1, 1.00, 7, NULL, NULL),
(123, 1, '17', NULL, 'Mango Kulfi', 'MAK', '', '', '', '', '', '', '', '', 0.000, 0, 0, 0, '0000-00-00', '0000-00-00', NULL, 1, NULL, 0, '00:00:00', 1, 2, 2, 2, '2025-08-01', '2025-08-01', '2025-08-01', 1, 0, 1, 1.00, 7, NULL, NULL),
(124, 2, '19', NULL, 'Mineral Water (Still, Sparkling)', 'MIW', '', '', '', '', '', '', '', '', 0.000, 0, 0, 0, '0000-00-00', '0000-00-00', NULL, 1, NULL, 0, '00:00:00', 1, 2, 2, 2, '2025-08-01', '2025-08-01', '2025-08-01', 1, 0, 1, 1.00, 7, NULL, NULL),
(125, 2, '19', NULL, 'Ginger Beer  (Non-alcoholic)', 'GIB', '', '', '', '', '', '', '', '', 0.000, 0, 0, 0, '0000-00-00', '0000-00-00', NULL, 1, NULL, 0, '00:00:00', 1, 2, 2, 2, '2025-08-01', '2025-08-01', '2025-08-01', 1, 0, 1, 1.00, 7, NULL, NULL),
(126, 2, '19', NULL, 'Apple Juice', 'APJ', '', '', '', '', '', '', '', '', 0.000, 0, 0, 0, '0000-00-00', '0000-00-00', NULL, 1, NULL, 0, '00:00:00', 1, 2, 2, 2, '2025-08-01', '2025-08-01', '2025-08-01', 1, 0, 1, 1.00, 7, NULL, NULL),
(127, 2, '19', NULL, 'Orange Juice', 'ORJ', '', '', '', '', '', '', '', '', 0.000, 0, 0, 0, '0000-00-00', '0000-00-00', NULL, 1, NULL, 0, '00:00:00', 1, 2, 2, 2, '2025-08-01', '2025-08-01', '2025-08-01', 1, 0, 1, 1.00, 7, NULL, NULL),
(128, 2, '19', NULL, 'Sweet Lassi', 'SWL', '', '', '', '', '', '', '', '', 0.000, 0, 0, 0, '0000-00-00', '0000-00-00', NULL, 1, NULL, 0, '00:00:00', 1, 2, 2, 2, '2025-08-01', '2025-08-01', '2025-08-01', 1, 0, 1, 1.00, 7, NULL, NULL),
(129, 2, '19', NULL, 'Salty Lassi', 'SAL', '', '', '', '', '', '', '', '', 0.000, 0, 0, 0, '0000-00-00', '0000-00-00', NULL, 1, NULL, 0, '00:00:00', 1, 2, 2, 2, '2025-08-01', '2025-08-01', '2025-08-01', 1, 0, 1, 1.00, 7, NULL, NULL),
(130, 2, '19', NULL, 'Rose Lassi', 'ROL', '', '', '', '', '', '', '', '', 0.000, 0, 0, 0, '0000-00-00', '0000-00-00', NULL, 1, NULL, 0, '00:00:00', 1, 2, 2, 2, '2025-08-01', '2025-08-01', '2025-08-01', 1, 0, 1, 1.00, 7, NULL, NULL),
(131, 2, '19', NULL, 'Mango Lassi', 'MAL', '', '', '', '', '', '', '', '', 0.000, 0, 0, 0, '0000-00-00', '0000-00-00', NULL, 1, NULL, 0, '00:00:00', 1, 2, 2, 2, '2025-08-01', '2025-08-01', '2025-08-01', 1, 0, 1, 1.00, 7, NULL, NULL),
(132, 2, '19', NULL, 'Jug (Coca Cola, Diet Coke Lemonade, Fanta) (Regular, No Sugar, Diet)', 'JU', '', '', '', '', '', '', '', '', 0.000, 0, 0, 0, '0000-00-00', '0000-00-00', NULL, 1, NULL, 0, '00:00:00', 1, 2, 2, 2, '2025-08-01', '2025-08-01', '2025-08-01', 1, 0, 1, 1.00, 7, NULL, NULL),
(133, 2, '19', NULL, 'Lemon, Lime & Bitters Can/ Glass', 'LEL&BCG', '', '', '', '', '', '', '', '', 0.000, 0, 0, 0, '0000-00-00', '0000-00-00', NULL, 1, NULL, 0, '00:00:00', 1, 2, 2, 2, '2025-08-01', '2025-08-01', '2025-08-01', 1, 0, 1, 1.00, 7, NULL, NULL),
(134, 2, '19', NULL, 'Coke Can/ Glass', 'COCG', '', '', '', '', '', '', '', '', 0.000, 0, 0, 0, '0000-00-00', '0000-00-00', NULL, 1, NULL, 0, '00:00:00', 1, 2, 2, 2, '2025-08-01', '2025-08-01', '2025-08-01', 1, 0, 1, 1.00, 7, NULL, NULL),
(135, 2, '19', NULL, 'Coke No Sugar Can/ Glass', 'CONSCG', '', '', '', '', '', '', '', '', 0.000, 0, 0, 0, '0000-00-00', '0000-00-00', NULL, 1, NULL, 0, '00:00:00', 1, 2, 2, 2, '2025-08-01', '2025-08-01', '2025-08-01', 1, 0, 1, 1.00, 7, NULL, NULL),
(136, 2, '19', NULL, 'Diet Coke Can/ Glass', 'DICCG', '', '', '', '', '', '', '', '', 0.000, 0, 0, 0, '0000-00-00', '0000-00-00', NULL, 1, NULL, 0, '00:00:00', 1, 2, 2, 2, '2025-08-01', '2025-08-01', '2025-08-01', 1, 0, 1, 1.00, 7, NULL, NULL),
(137, 2, '19', NULL, 'Sprite Can/ Glass', 'SPCG', '', '', '', '', '', '', '', '', 0.000, 0, 0, 0, '0000-00-00', '0000-00-00', NULL, 1, NULL, 0, '00:00:00', 1, 2, 2, 2, '2025-08-01', '2025-08-01', '2025-08-01', 1, 0, 1, 1.00, 7, NULL, NULL),
(138, 2, '19', NULL, 'Fanta Can/ Glass', 'FACG', '', '', '', '', '', '', '', '', 0.000, 0, 0, 0, '0000-00-00', '0000-00-00', NULL, 1, NULL, 0, '00:00:00', 1, 2, 2, 2, '2025-08-01', '2025-08-01', '2025-08-01', 1, 0, 1, 1.00, 7, NULL, NULL),
(139, 2, '18', NULL, 'Coffee (White Or Black)', 'CO', '', '', '', '', '', '', '', '', 0.000, 0, 0, 0, '0000-00-00', '0000-00-00', NULL, 1, NULL, 0, '00:00:00', 1, 2, 2, 2, '2025-08-01', '2025-08-01', '2025-08-01', 1, 0, 1, 1.00, 7, NULL, NULL),
(140, 2, '18', NULL, 'Indian Tea', 'INT', '', '', '', '', '', '', '', '', 0.000, 0, 0, 0, '0000-00-00', '0000-00-00', NULL, 1, NULL, 0, '00:00:00', 1, 2, 2, 2, '2025-08-01', '2025-08-01', '2025-08-01', 1, 0, 1, 1.00, 7, NULL, NULL),
(141, 2, '20', 23, 'Yves Premium Cuvée 200ml Piccolo', 'YVPC2P', '', '', '', '', '', 'YARRA VALLEY - VIC Delicate and floral, with a creamy mid-placte and a lingering, zippy finish.', '', '', 0.000, 0, 0, 0, '0000-00-00', '0000-00-00', NULL, 1, NULL, 0, '00:00:00', 1, 2, 2, 2, '2025-08-01', '2025-08-01', '2025-08-01', 1, 0, 1, 1.00, 7, NULL, NULL),
(142, 2, '20', 23, 'Fiore White Moscato 200ml Piccolo', 'FIWM2P', '', '', '', '', '', 'SOUTH EAST AUSTRALIA Refreshingly spritzy, exotic aromas of rose, sweet spice, lychee and grapes. Low alcohol, hint of sweetness.', '', '', 0.000, 0, 0, 0, '0000-00-00', '0000-00-00', NULL, 1, NULL, 0, '00:00:00', 1, 2, 2, 2, '2025-08-01', '2025-08-01', '2025-08-01', 1, 0, 1, 1.00, 7, NULL, NULL),
(143, 2, '20', 23, 'Mio Cappello Prosecco', 'MICP', '', '', '', '', '', 'KING VALLEY Bright with floral aromas of pear & citrus. Softly textured with flavours of honeydrew and green apple, and a dry citrus finish.', '', '', 0.000, 0, 0, 0, '0000-00-00', '0000-00-00', NULL, 1, NULL, 0, '00:00:00', 1, 2, 2, 2, '2025-08-01', '2025-08-01', '2025-08-01', 1, 0, 1, 1.00, 7, NULL, NULL),
(144, 2, '20', 23, 'Castelli Estate Sparkling Cuvée', 'CAESC', '', '', '', '', '', 'GREAT SOTHERN, WA Attractive aromas of grilled toast, butter and nutty cashes with subtie honeycomb notes to finish', '', '', 0.000, 0, 0, 0, '0000-00-00', '0000-00-00', NULL, 1, NULL, 0, '00:00:00', 1, 2, 2, 2, '2025-08-01', '2025-08-01', '2025-08-01', 1, 0, 1, 1.00, 7, NULL, NULL),
(145, 2, '20', 24, 'Folklore Sauvignon Blanc Semillon (Glass)', 'FOSBS', '', '', '', '', '', 'WESTERN AUSTRALIA Passionfruit, lime zest & cut grass with a lively acidity & long finish', '', '', 0.000, 0, 0, 0, '0000-00-00', '0000-00-00', NULL, 1, NULL, 0, '00:00:00', 1, 2, 2, 2, '2025-08-01', '2025-08-01', '2025-08-01', 1, 0, 1, 1.00, 13, NULL, NULL),
(146, 2, '20', 24, 'Pikes Pinot Grigio Luccio  (Glass)', 'PIPGL', '', '', '', '', '', 'CLARE VALLEY - SA Light and fresh on the palate, displaying crisp flavours of apple skins and melon. Finishing pleasingly dry with just a subtie hind of minerality.', '', '', 0.000, 0, 0, 0, '0000-00-00', '0000-00-00', NULL, 1, NULL, 0, '00:00:00', 1, 2, 2, 2, '2025-08-01', '2025-08-01', '2025-08-01', 1, 0, 1, 1.00, 13, NULL, NULL),
(147, 2, '20', 24, 'Hentley Farm Riesling  (Glass)', 'HEFR', '', '', '', '', '', 'EDEN VALLEY - SA Lime and lemon curd, tropical characters, passionfruit and guava more intensity & combine with a slight herbal influence.', '', '', 0.000, 0, 0, 0, '0000-00-00', '0000-00-00', NULL, 1, NULL, 0, '00:00:00', 1, 2, 2, 2, '2025-08-01', '2025-08-01', '2025-08-01', 1, 0, 1, 1.00, 13, NULL, NULL),
(148, 2, '20', 24, 'Wicks Estate Sauvignon Blanc  (Glass)', 'WIESB', '', '', '', '', '', 'ADELAIDE HILLS - SA Offering aromas of crisp green appie and tropical fruits, it\'s perfectly balanced by a lively palate and elegant, clean finish.', '', '', 0.000, 0, 0, 0, '0000-00-00', '0000-00-00', NULL, 1, NULL, 0, '00:00:00', 1, 2, 2, 2, '2025-08-01', '2025-08-01', '2025-08-01', 1, 0, 1, 1.00, 13, NULL, NULL),
(149, 2, '20', 24, 'Cape Mentelle Marmaduke Chardonnay  (Glass)', 'CAMMC', '', '', '', '', '', 'MARGRET RIVER - WA White flowers, tropical notes and hints of brioche.', '', '', 0.000, 0, 0, 0, '0000-00-00', '0000-00-00', NULL, 1, NULL, 0, '00:00:00', 1, 2, 2, 2, '2025-08-01', '2025-08-01', '2025-08-01', 1, 0, 1, 1.00, 13, NULL, NULL),
(150, 2, '20', 24, 'Folklore Sauvignon Blanc Semillon (Bottle)', 'FOSBS', '', '', '', '', '', 'WESTERN AUSTRALIA Passionfruit, lime zest & cut grass with a lively acidity & long finish', '', '', 0.000, 0, 0, 0, '0000-00-00', '0000-00-00', NULL, 1, NULL, 0, '00:00:00', 1, 2, 2, 2, '2025-08-01', '2025-08-01', '2025-08-01', 1, 0, 1, 1.00, 14, NULL, NULL),
(151, 2, '20', 24, 'Pikes Pinot Grigio Luccio (Bottle)', 'PIPGL', '', '', '', '', '', 'CLARE VALLEY - SA Light and fresh on the palate, displaying crisp flavours of apple skins and melon. Finishing pleasingly dry with just a subtie hind of minerality.', '', '', 0.000, 0, 0, 0, '0000-00-00', '0000-00-00', NULL, 1, NULL, 0, '00:00:00', 1, 2, 2, 2, '2025-08-01', '2025-08-01', '2025-08-01', 1, 0, 1, 1.00, 14, NULL, NULL),
(152, 2, '20', 24, 'Hentley Farm Riesling (Bottle)', 'HEFR', '', '', '', '', '', ' EDEN VALLEY - SA Lime and lemon curd, tropical characters, passionfruit and guava more intensity & combine with a slight herbal influence.', '', '', 0.000, 0, 0, 0, '0000-00-00', '0000-00-00', NULL, 1, NULL, 0, '00:00:00', 1, 2, 2, 2, '2025-08-01', '2025-08-01', '2025-08-01', 1, 0, 1, 1.00, 14, NULL, NULL),
(153, 2, '20', 24, 'Wicks Estate Sauvignon Blanc (Bottle)', 'WIESB', '', '', '', '', '', 'ADELAIDE HILLS - SA Offering aromas of crisp green appie and tropical fruits, it\'s perfectly balanced by a lively palate and elegant, clean finish.', '', '', 0.000, 0, 0, 0, '0000-00-00', '0000-00-00', NULL, 1, NULL, 0, '00:00:00', 1, 2, 2, 2, '2025-08-01', '2025-08-01', '2025-08-01', 1, 0, 1, 1.00, 14, NULL, NULL),
(154, 2, '20', 24, 'Cape Mentelle Marmaduke Chardonnay (Bottle)', 'CAMMC', '', '', '', '', '', ' MARGRET RIVER - WA White flowers, tropical notes and hints of brioche.', '', '', 0.000, 0, 0, 0, '0000-00-00', '0000-00-00', NULL, 1, NULL, 0, '00:00:00', 1, 2, 2, 2, '2025-08-01', '2025-08-01', '2025-08-01', 1, 0, 1, 1.00, 14, NULL, NULL),
(155, 2, '20', 25, 'Gris De Garille Rose Carcassonne Igp (Glass)', 'GRDGRCI', '', '', '', '', '', 'LANGUEDOC - FRANCE Pale rose colour, copper hue. On the nose, aromas of red berries. On the palette, round and creamy with nice acidity and tension.', '', '', 0.000, 0, 0, 0, '0000-00-00', '0000-00-00', NULL, 1, NULL, 0, '00:00:00', 1, 2, 2, 2, '2025-08-01', '2025-08-01', '2025-08-01', 1, 0, 1, 1.00, 13, NULL, NULL),
(156, 2, '20', 25, 'Crimson Peak Pinot Noir (Glass)', 'CRPPN', '', '', '', '', '', 'CENTRAL OTAGO - NZ Velvety Texture with notes of ripe plum, black cherry subtle hints of integrated oak creating a complex & well balanced wine.', '', '', 0.000, 0, 0, 0, '0000-00-00', '0000-00-00', NULL, 1, NULL, 0, '00:00:00', 1, 2, 2, 2, '2025-08-01', '2025-08-01', '2025-08-01', 1, 0, 1, 1.00, 13, NULL, NULL),
(157, 2, '20', 25, 'Quilty & Gransden Merlot (Glass)', 'QU&GM', '', '', '', '', '', 'CENTRAL RANGES - NSW Deep red with purple edges. Cherries & redcurrants. Elegant & robust. Richly flavoured with violets & cherries.', '', '', 0.000, 0, 0, 0, '0000-00-00', '0000-00-00', NULL, 1, NULL, 0, '00:00:00', 1, 2, 2, 2, '2025-08-01', '2025-08-01', '2025-08-01', 1, 0, 1, 1.00, 13, NULL, NULL),
(158, 2, '20', 25, 'Hintons Hundred Cabernet Sauvignon (Glass)', 'HIHCS', '', '', '', '', '', '', 'COONAWARRA - SA Coonawarra’s signature variety. Fragrant dark cherries with notes of vanilla give way to a generous palate with savoury blackcurrant and chocolate flavours. The local terroir shines through with notes of peppermint and a lengthy finish.', '', 0.000, 0, 0, 0, '0000-00-00', '0000-00-00', NULL, 1, NULL, 0, '00:00:00', 1, 2, 2, 2, '2025-08-01', '2025-08-01', '2025-08-01', 1, 0, 1, 1.00, 13, NULL, NULL),
(159, 2, '20', 25, 'Folklore Shiraz (Glass)', 'FOS', '', '', '', '', '', '', 'WESTERN AUSTRALIA A softly textured Shiraz with red flowers, black spice & blueberry.', '', 0.000, 0, 0, 0, '0000-00-00', '0000-00-00', NULL, 1, NULL, 0, '00:00:00', 1, 2, 2, 2, '2025-08-01', '2025-08-01', '2025-08-01', 1, 0, 1, 1.00, 13, NULL, NULL),
(160, 2, '20', 25, 'Hentley Farm Villain & Vixen Shiraz (Glass)', 'HEFV&VS', '', '', '', '', '', ' BAROSSA VALLEY - SA A rich nose with blackcurrant and mulberries leading the way, secondary aromatics of nutmeg, coco and sage provide the alluring complexity.', '', '', 0.000, 0, 0, 0, '0000-00-00', '0000-00-00', NULL, 1, NULL, 0, '00:00:00', 1, 2, 2, 2, '2025-08-01', '2025-08-01', '2025-08-01', 1, 0, 1, 1.00, 13, NULL, NULL),
(161, 2, '20', 25, 'Gris De Garille Rose Carcassonne Igp (Bottle)', 'GRDGRCI', '', '', '', '', '', 'LANGUEDOC - FRANCE Pale rose colour, copper hue. On the nose, aromas of red berries. On the palette, round and creamy with nice acidity and tension.', '', '', 0.000, 0, 0, 0, '0000-00-00', '0000-00-00', NULL, 1, NULL, 0, '00:00:00', 1, 2, 2, 2, '2025-08-01', '2025-08-01', '2025-08-01', 1, 0, 1, 1.00, 14, NULL, NULL),
(162, 2, '20', 25, 'Crimson Peak Pinot Noir (Bottle)', 'CRPPN', '', '', '', '', '', 'CENTRAL OTAGO - NZ Velvety Texture with notes of ripe plum, black cherry subtle hints of integrated oak creating a complex & well balanced wine.', '', '', 0.000, 0, 0, 0, '0000-00-00', '0000-00-00', NULL, 1, NULL, 0, '00:00:00', 1, 2, 2, 2, '2025-08-01', '2025-08-01', '2025-08-01', 1, 0, 1, 1.00, 14, NULL, NULL),
(163, 2, '20', 25, 'Quilty & Gransden Merlot', 'QU&GM', '', '', '', '', '', 'CENTRAL RANGES - NSW Deep red with purple edges. Cherries & redcurrants. Elegant & robust. Richly flavoured with violets & cherries.', '', '', 0.000, 0, 0, 0, '0000-00-00', '0000-00-00', NULL, 1, NULL, 0, '00:00:00', 1, 2, 2, 2, '2025-08-01', '2025-08-01', '2025-08-01', 1, 0, 1, 1.00, 14, NULL, NULL),
(164, 2, '20', 25, 'Hintons Hundred Cabernet Sauvignon (Bottle)', 'HIHCS', '', '', '', '', '', 'COONAWARRA - SA Coonawarra’s signature variety. Fragrant dark cherries with notes of vanilla give way to a generous palate with savoury blackcurrant and chocolate flavours. The local terroir shines through with notes of peppermint and a lengthy finish.', '', '', 0.000, 0, 0, 0, '0000-00-00', '0000-00-00', NULL, 1, NULL, 0, '00:00:00', 1, 2, 2, 2, '2025-08-01', '2025-08-01', '2025-08-01', 1, 0, 1, 1.00, 14, NULL, NULL),
(165, 2, '20', 25, 'Folklore Shiraz (Bottle)', 'FOS', '', '', '', '', '', 'WESTERN AUSTRALIA A softly textured Shiraz with red flowers, black spice & blueberry.', '', '', 0.000, 0, 0, 0, '0000-00-00', '0000-00-00', NULL, 1, NULL, 0, '00:00:00', 1, 2, 2, 2, '2025-08-01', '2025-08-01', '2025-08-01', 1, 0, 1, 1.00, 14, NULL, NULL),
(166, 2, '20', 25, 'Hentley Farm Villain & Vixen Shiraz (Bottle)', 'HEFV&VS', '', '', '', '', '', 'BAROSSA VALLEY - SA A rich nose with blackcurrant and mulberries leading the way, secondary aromatics of nutmeg, coco and sage provide the alluring complexity.', '', '', 0.000, 0, 0, 0, '0000-00-00', '0000-00-00', NULL, 1, NULL, 0, '00:00:00', 1, 2, 2, 2, '2025-08-01', '2025-08-01', '2025-08-01', 1, 0, 1, 1.00, 14, NULL, NULL),
(167, 2, '21', 26, 'Kingfisher Lager', 'KIL', '', '', '', '', '', 'Light gold in colour with a clean and hoppy aroma, this Indian Lager is clean & refreshing. ', '', '', 0.000, 0, 0, 0, '0000-00-00', '0000-00-00', NULL, 1, NULL, 0, '00:00:00', 1, 2, 2, 2, '2025-08-01', '2025-08-01', '2025-08-01', 1, 0, 1, 1.00, 14, NULL, NULL),
(168, 2, '21', 26, 'Corona', 'CO', '', '', '', '', '', 'Corona is famous around the world for its smooth, refreshing taste. It displays a well-rounded character with pleasant malt and hop aromas.', '', '', 0.000, 0, 0, 0, '0000-00-00', '0000-00-00', NULL, 1, NULL, 0, '00:00:00', 1, 2, 2, 2, '2025-08-01', '2025-08-01', '2025-08-01', 1, 0, 1, 1.00, 14, NULL, NULL),
(169, 2, '21', 27, 'Cascade Light', 'CAL', '', '', '', '', '', 'A perfect balance of master brewing skills, the finest malt, hops and premium yeast culture, Sparkling bright amber with a spicy hop aroma and tightly packed head. ', '', '', 0.000, 0, 0, 0, '0000-00-00', '0000-00-00', NULL, 1, NULL, 0, '00:00:00', 1, 2, 2, 2, '2025-08-01', '2025-08-01', '2025-08-01', 1, 0, 1, 1.00, 14, NULL, NULL),
(170, 2, '21', 27, 'Tooheys Extra Dry', 'TOED', '', '', '', '', '', 'Renowned for a clean and refreshing taste a crisp, dry finish. Wonderful fruity, malty notes accompany a mellow middle palate, leaving a clean aftertaste', '', '', 0.000, 0, 0, 0, '0000-00-00', '0000-00-00', NULL, 1, NULL, 0, '00:00:00', 1, 2, 2, 2, '2025-08-01', '2025-08-01', '2025-08-01', 1, 0, 1, 1.00, 14, NULL, NULL),
(171, 2, '21', 27, '150 Lashes Pale Ale', '15LPA', '', '', '', '', '', 'A clean-finishing, Australian-style cloudy pale ale for cracking refreshement. Malted wheat adds to its refreshing character and a concoction of hops creates fruity aromas with hints of passionfruit, grapefruit & citrus.', '', '', 0.000, 0, 0, 0, '0000-00-00', '0000-00-00', NULL, 1, NULL, 0, '00:00:00', 1, 2, 2, 2, '2025-08-01', '2025-08-01', '2025-08-01', 1, 0, 1, 1.00, 14, NULL, NULL),
(172, 2, '21', 28, 'Apple Cider', 'APC', '', '', '', '', '', 'Wonderfully refreshing Cider with flavoursome apple characterstics coming through in both the aroma and flavour', '', '', 0.000, 0, 0, 0, '0000-00-00', '0000-00-00', NULL, 1, NULL, 0, '00:00:00', 1, 2, 2, 2, '2025-08-01', '2025-08-01', '2025-08-01', 1, 0, 1, 1.00, 14, NULL, NULL),
(173, 2, '21', 28, 'Alcoholic Ginger Beer', 'ALGB', '', '', '', '', '', ' With a hit of ginger flavour and a touch of sweetness, there \'s nothing quite so refreshing on a hot summer\'s day.', '', '', 0.000, 0, 0, 0, '0000-00-00', '0000-00-00', NULL, 1, NULL, 0, '00:00:00', 1, 2, 2, 2, '2025-08-01', '2025-08-01', '2025-08-01', 1, 0, 1, 1.00, 14, NULL, NULL),
(174, 2, '22', NULL, 'Smirnoff Vodka (30ml)', 'SMV', '', '', '', '', '', '', '', '', 0.000, 0, 0, 0, '0000-00-00', '0000-00-00', NULL, 1, NULL, 0, '00:00:00', 1, 2, 2, 2, '2025-08-01', '2025-08-01', '2025-08-01', 1, 0, 1, 1.00, 13, NULL, NULL),
(175, 2, '22', NULL, 'Black Label (30ml) ', 'BLL', '', '', '', '', '', '', '', '', 0.000, 0, 0, 0, '0000-00-00', '0000-00-00', NULL, 1, NULL, 0, '00:00:00', 1, 2, 2, 2, '2025-08-01', '2025-08-01', '2025-08-01', 1, 0, 1, 1.00, 13, NULL, NULL),
(176, 2, '22', NULL, 'Bundaberg Rum (30ml)', 'BUR', '', '', '', '', '', '', '', '', 0.000, 0, 0, 0, '0000-00-00', '0000-00-00', NULL, 1, NULL, 0, '00:00:00', 1, 2, 2, 2, '2025-08-01', '2025-08-01', '2025-08-01', 1, 0, 1, 1.00, 13, NULL, NULL),
(177, 2, '22', NULL, 'Glenfiddich (30ml)', 'GL', '', '', '', '', '', '', '', '', 0.000, 0, 0, 0, '0000-00-00', '0000-00-00', NULL, 1, NULL, 0, '00:00:00', 1, 2, 2, 2, '2025-08-01', '2025-08-01', '2025-08-01', 1, 0, 1, 1.00, 13, NULL, NULL),
(178, 1, '3', 9, ' Lamb Palak', 'LAP', '', '', '', '', 'GF', 'Tender & flavoursome Punjabi curry with spinach & herbs.', '', '', 0.000, 0, 0, 0, '0000-00-00', '0000-00-00', NULL, 1, NULL, 0, '00:00:00', 1, 2, 2, 2, '2025-08-04', '2025-08-04', '2025-08-04', 1, 0, 0, 1.00, 12, NULL, NULL),
(179, 1, '3', 8, 'Chicken Dhansak', 'CHD', '', '', '', '', 'GF', 'Chef\'s special creation simmered with lentils and flavoured with fresh lemon juice and garlic', '', '', 0.000, 0, 0, 0, '0000-00-00', '0000-00-00', NULL, 1, NULL, 0, '00:00:00', 1, 2, 2, 2, '2025-08-04', '2025-08-04', '2025-08-04', 1, 0, 0, 1.00, 12, NULL, NULL),
(180, 1, '3', 8, 'Lamb Dhansak', 'LAD', '', '', '', '', 'Gf', 'Chef\'s special creation simmered with lentils and flavoured with fresh lemon juice and garlic', '', '', 0.000, 0, 0, 0, '0000-00-00', '0000-00-00', NULL, 1, NULL, 0, '00:00:00', 1, 2, 2, 2, '2025-08-04', '2025-08-04', '2025-08-04', 1, 0, 0, 1.00, 12, NULL, NULL),
(181, 1, '3', 8, 'Beef Dhansak', 'BED', '', '', '', '', 'GF', 'Chef\'s special creation simmered with lentils and flavoured with fresh lemon juice and garlic', '', '', 0.000, 0, 0, 0, '0000-00-00', '0000-00-00', NULL, 1, NULL, 0, '00:00:00', 1, 2, 2, 2, '2025-08-04', '2025-08-04', '2025-08-04', 1, 0, 0, 1.00, 12, NULL, NULL),
(182, 1, '3', 8, 'Chicken Korma', 'CHK', '', '', '', '', '', 'The Korma was created for the Moghul emperors. Yoghurt & selected spices are used to create this rich & exotic curry.', '', '', 0.000, 0, 0, 0, '0000-00-00', '0000-00-00', NULL, 1, NULL, 0, '00:00:00', 1, 2, 2, 2, '2025-08-04', '2025-08-04', '2025-08-04', 1, 0, 0, 1.00, 12, NULL, NULL),
(183, 1, '3', 8, 'Lamb Korma', 'LAK', '', '', '', '', '', 'The Korma was created for the Moghul emperors. Yoghurt & selected spices are used to create this rich & exotic curry.', '', '', 0.000, 0, 0, 0, '0000-00-00', '0000-00-00', NULL, 1, NULL, 0, '00:00:00', 1, 2, 2, 2, '2025-08-04', '2025-08-04', '2025-08-04', 1, 0, 0, 1.00, 12, NULL, NULL),
(184, 1, '3', 8, 'Beef Korma', 'BEK', '', '', '', '', '', 'The Korma was created for the Moghul emperors. Yoghurt & selected spices are used to create this rich & exotic curry.', '', '', 0.000, 0, 0, 0, '0000-00-00', '0000-00-00', NULL, 1, NULL, 0, '00:00:00', 1, 2, 2, 2, '2025-08-04', '2025-08-04', '2025-08-04', 1, 0, 0, 1.00, 12, NULL, NULL),
(185, 1, '3', 8, 'Chicken Madras', 'CHM', '', '', '', '', 'Gf,DF', 'A delicious curry from the south of India prepared with tomatoes onions & fresh herbs & spices.', '', '', 0.000, 0, 0, 0, '0000-00-00', '0000-00-00', NULL, 1, NULL, 0, '00:00:00', 1, 2, 2, 2, '2025-08-04', '2025-08-04', '2025-08-04', 1, 0, 0, 1.00, 12, NULL, NULL),
(186, 1, '3', 8, 'Lamb Madras', 'LAM', '', '', '', '', 'GF,DF', 'A delicious curry from the south of India prepared with tomatoes onions & fresh herbs & spices.', '', '', 0.000, 0, 0, 0, '0000-00-00', '0000-00-00', NULL, 1, NULL, 0, '00:00:00', 1, 2, 2, 2, '2025-08-04', '2025-08-04', '2025-08-04', 1, 0, 0, 1.00, 12, NULL, NULL),
(187, 1, '3', 8, 'Beef Madras', 'BEM', '', '', '', '', 'GF,DF', 'A delicious curry from the south of India prepared with tomatoes onions & fresh herbs & spices.', '', '', 0.000, 0, 0, 0, '0000-00-00', '0000-00-00', NULL, 1, NULL, 0, '00:00:00', 1, 2, 2, 2, '2025-08-04', '2025-08-04', '2025-08-04', 1, 0, 0, 1.00, 12, NULL, NULL),
(188, 1, '3', 8, 'Chicken Vindaloo', 'CHV', '', '', '', '', 'GF,DF', 'A seafood curry prepared with a wide array of spices, garlic & ginger simmered in a special onion sauce', '', '', 0.000, 0, 0, 0, '0000-00-00', '0000-00-00', NULL, 1, NULL, 0, '00:00:00', 1, 2, 2, 2, '2025-08-04', '2025-08-04', '2025-08-04', 1, 0, 0, 1.00, 12, NULL, NULL),
(189, 1, '3', 8, 'Lamb Vindaloo', 'LAV', '', '', '', '', 'Gf,DF', 'A seafood curry prepared with a wide array of spices, garlic & ginger simmered in a special onion sauce', '', '', 0.000, 0, 0, 0, '0000-00-00', '0000-00-00', NULL, 1, NULL, 0, '00:00:00', 1, 2, 2, 2, '2025-08-04', '2025-08-04', '2025-08-04', 1, 0, 0, 1.00, 12, NULL, NULL),
(190, 1, '3', 8, 'Beef Vindaloo', 'BEV', '', '', '', '', 'GF,DF', 'A seafood curry prepared with a wide array of spices, garlic & ginger simmered in a special onion sauce', '', '', 0.000, 0, 0, 0, '0000-00-00', '0000-00-00', NULL, 1, NULL, 0, '00:00:00', 1, 2, 2, 2, '2025-08-04', '2025-08-04', '2025-08-04', 1, 0, 0, 1.00, 12, NULL, NULL),
(191, 1, '3', 8, 'Chicken Ceylon', 'CHC', '', '', '', '', 'GF,DF', 'Goan style curry, prepared with coconut & traditional Ceylonese spices creating a unique flavour.', '', '', 0.000, 0, 0, 0, '0000-00-00', '0000-00-00', NULL, 1, NULL, 0, '00:00:00', 1, 2, 2, 2, '2025-08-04', '2025-08-04', '2025-08-04', 1, 0, 0, 1.00, 12, NULL, NULL),
(192, 1, '3', 8, 'Lamb Ceylon', 'LAC', '', '', '', '', 'GF,DF', 'Goan style curry, prepared with coconut & traditional Ceylonese spices creating a unique flavour.', '', '', 0.000, 0, 0, 0, '0000-00-00', '0000-00-00', NULL, 1, NULL, 0, '00:00:00', 1, 2, 2, 2, '2025-08-04', '2025-08-04', '2025-08-04', 1, 0, 0, 1.00, 12, NULL, NULL),
(193, 1, '3', 8, 'Beef Ceylon', 'BEC', '', '', '', '', 'GF,DF', 'Goan style curry, prepared with coconut & traditional Ceylonese spices creating a unique flavour.', '', '', 0.000, 0, 0, 0, '0000-00-00', '0000-00-00', NULL, 1, NULL, 0, '00:00:00', 1, 2, 2, 2, '2025-08-04', '2025-08-04', '2025-08-04', 1, 0, 0, 1.00, 12, NULL, NULL),
(194, 1, '3', 8, 'Chicken Bhuna', 'CHB', '', '', '', '', 'GF,DF', 'An English favourite curry cooked with fresh garlic, capsicum, onion, tomato & fresh herbs and spices', '', '', 0.000, 0, 0, 0, '0000-00-00', '0000-00-00', NULL, 1, NULL, 0, '00:00:00', 1, 2, 2, 2, '2025-08-05', '2025-08-05', '2025-08-05', 1, 0, 0, 1.00, 12, NULL, NULL),
(195, 1, '3', 8, 'Lamb Bhuna', 'LAB', '', '', '', '', 'GF,DF', 'An English favourite curry cooked with fresh garlic, capsicum, onion, tomato & fresh herbs and spices', '', '', 0.000, 0, 0, 0, '0000-00-00', '0000-00-00', NULL, 1, NULL, 0, '00:00:00', 1, 2, 2, 2, '2025-08-05', '2025-08-05', '2025-08-05', 1, 0, 0, 1.00, 12, NULL, NULL),
(196, 1, '3', 8, 'Beef Bhuna', 'BEB', '', '', '', '', 'GF,DF', 'An English favourite curry cooked with fresh garlic, capsicum, onion, tomato & fresh herbs and spices', '', '', 0.000, 0, 0, 0, '0000-00-00', '0000-00-00', NULL, 1, NULL, 0, '00:00:00', 1, 2, 2, 2, '2025-08-05', '2025-08-05', '2025-08-05', 1, 0, 0, 1.00, 12, NULL, NULL),
(197, 1, '3', 8, 'Chicken Punjabi Delight', 'CHPD', '', '', '', '', 'GF', '', '', '', 0.000, 0, 0, 0, '0000-00-00', '0000-00-00', NULL, 1, NULL, 0, '00:00:00', 1, 2, 2, 2, '2025-08-05', '2025-08-05', '2025-08-05', 1, 0, 0, 1.00, 12, NULL, NULL),
(198, 1, '3', 8, 'Lamb Punjabi Delight', 'LAPD', '', '', '', '', 'GF', '', '', '', 0.000, 0, 0, 0, '0000-00-00', '0000-00-00', NULL, 1, NULL, 0, '00:00:00', 1, 2, 2, 2, '2025-08-05', '2025-08-05', '2025-08-05', 1, 0, 0, 1.00, 12, NULL, NULL),
(199, 1, '3', 8, 'Beef Punjabi Delight', 'BEPD', '', '', '', '', 'GF', '', '', '', 0.000, 0, 0, 0, '0000-00-00', '0000-00-00', NULL, 1, NULL, 0, '00:00:00', 1, 2, 2, 2, '2025-08-05', '2025-08-05', '2025-08-05', 1, 0, 0, 1.00, 12, NULL, NULL),
(200, 1, '3', 8, 'Chicken Rogan Josh', 'CHRJ', '', '', '', '', '', 'Traditional style curry cooked with a north Indian spice blend in our signature rogan josh sauce.', '', '', 0.000, 0, 0, 0, '0000-00-00', '0000-00-00', NULL, 1, NULL, 0, '00:00:00', 1, 2, 2, 2, '2025-08-05', '2025-08-05', '2025-08-05', 1, 0, 0, 1.00, 12, NULL, NULL),
(201, 1, '3', 8, 'Lamb Rogan Josh', 'LARJ', '', '', '', '', '', 'Traditional style curry cooked with a north Indian spice blend in our signature rogan josh sauce.', '', '', 0.000, 0, 0, 0, '0000-00-00', '0000-00-00', NULL, 1, NULL, 0, '00:00:00', 1, 2, 2, 2, '2025-08-05', '2025-08-05', '2025-08-05', 1, 0, 0, 1.00, 12, NULL, NULL),
(202, 1, '3', 8, 'Beef Rogan Josh', 'BERJ', '', '', '', '', '', 'Traditional style curry cooked with a north Indian spice blend in our signature rogan josh sauce.', '', '', 0.000, 0, 0, 0, '0000-00-00', '0000-00-00', NULL, 1, NULL, 0, '00:00:00', 1, 2, 2, 2, '2025-08-05', '2025-08-05', '2025-08-05', 1, 0, 0, 1.00, 12, NULL, NULL),
(203, 1, '3', 8, 'Chicken Masala', 'CHM', '', '', '', '', 'Gf,DF', 'Prawns/Fish marinated with ginger & garlic then pan fried with spices, fresh tomatoes & coriander', '', '', 0.000, 0, 0, 0, '0000-00-00', '0000-00-00', NULL, 1, NULL, 0, '00:00:00', 1, 2, 2, 2, '2025-08-05', '2025-08-05', '2025-08-05', 1, 0, 0, 1.00, 12, NULL, NULL),
(204, 1, '3', 8, 'Lamb Masala', 'LAM', '', '', '', '', 'Gf,DF', 'Prawns/Fish marinated with ginger & garlic then pan fried with spices, fresh tomatoes & coriander', '', '', 0.000, 0, 0, 0, '0000-00-00', '0000-00-00', NULL, 1, NULL, 0, '00:00:00', 1, 2, 2, 2, '2025-08-05', '2025-08-05', '2025-08-05', 1, 0, 0, 1.00, 12, NULL, NULL),
(205, 1, '3', 8, 'Beef Masala', 'BEM', '', '', '', '', 'GF,DF', 'Prawns/Fish marinated with ginger & garlic then pan fried with spices, fresh tomatoes & coriander', '', '', 0.000, 0, 0, 0, '0000-00-00', '0000-00-00', NULL, 1, NULL, 0, '00:00:00', 1, 2, 2, 2, '2025-08-05', '2025-08-05', '2025-08-05', 1, 0, 0, 1.00, 12, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `itxn`
--

CREATE TABLE `itxn` (
  `tid` bigint(20) NOT NULL,
  `order_id` bigint(20) DEFAULT NULL,
  `food_id` bigint(20) DEFAULT NULL,
  `pvarient_id` bigint(20) DEFAULT NULL,
  `ingredient_id` bigint(20) DEFAULT NULL,
  `used_qty` decimal(10,3) DEFAULT NULL,
  `used_sales_price` decimal(10,2) DEFAULT NULL,
  `unit_id` bigint(20) DEFAULT NULL,
  `production_dtl_id` bigint(20) DEFAULT NULL,
  `created_at` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `job_advertisement`
--

CREATE TABLE `job_advertisement` (
  `job_adv_id` int(10) UNSIGNED NOT NULL,
  `pos_id` varchar(30) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `adv_circular_date` varchar(30) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `circular_dadeline` varchar(30) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `adv_file` tinytext CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `adv_details` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `language`
--

CREATE TABLE `language` (
  `id` int(11) NOT NULL,
  `phrase` varchar(100) NOT NULL,
  `english` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

--
-- Dumping data for table `language`
--

INSERT INTO `language` (`id`, `phrase`, `english`) VALUES
(2, 'login', 'Login'),
(3, 'email', 'Email Address'),
(4, 'password', 'Password'),
(5, 'reset', 'Reset'),
(6, 'dashboard', 'Dashboard'),
(7, 'home', 'Home'),
(8, 'profile', 'Profile'),
(9, 'profile_setting', 'Profile Setting'),
(10, 'firstname', 'First Name'),
(11, 'lastname', 'Last Name'),
(12, 'about', 'About'),
(13, 'preview', 'Preview'),
(14, 'image', 'Image'),
(15, 'save', 'Save'),
(16, 'upload_successfully', 'Upload Successfully!'),
(17, 'user_added_successfully', 'User Added Successfully!'),
(18, 'please_try_again', 'Please Try Again...'),
(19, 'inbox_message', 'Inbox Messages'),
(20, 'sent_message', 'Sent Message'),
(21, 'message_details', 'Message Details'),
(22, 'new_message', 'New Message'),
(23, 'receiver_name', 'Receiver Name'),
(24, 'sender_name', 'Sender Name'),
(25, 'subject', 'Subject'),
(26, 'message', 'Message'),
(27, 'message_sent', 'Message Sent!'),
(28, 'ip_address', 'IP Address'),
(29, 'last_login', 'Last Login'),
(30, 'last_logout', 'Last Logout'),
(31, 'status', 'Status'),
(33, 'send', 'Send'),
(34, 'date', 'Date'),
(35, 'action', 'Action'),
(36, 'sl_no', 'SL No.'),
(37, 'are_you_sure', 'Are You Sure ? '),
(38, 'application_setting', 'Application Setting'),
(39, 'application_title', 'Application Title'),
(41, 'phone', 'Phone'),
(42, 'favicon', 'Favicon'),
(43, 'logo', 'Logo'),
(44, 'language', 'Language'),
(45, 'left_to_right', 'Left To Right'),
(46, 'right_to_left', 'Right To Left'),
(47, 'footer_text', 'Footer Text'),
(48, 'site_align', 'Application Alignment'),
(49, 'welcome_back', 'Welcome Back!'),
(50, 'please_contact_with_admin', 'Please Contact With Admin'),
(51, 'incorrect_email_or_password', 'Incorrect Email/Password'),
(52, 'select_option', 'Select Option'),
(53, 'ftp_setting', 'Data Synchronize [FTP Setting]'),
(54, 'hostname', 'Host Name'),
(55, 'username', 'User Name'),
(56, 'ftp_port', 'FTP Port'),
(57, 'ftp_debug', 'FTP Debug'),
(58, 'project_root', 'Project Root'),
(59, 'update_successfully', 'Update Successfully'),
(60, 'save_successfully', 'Save Successfully!'),
(61, 'delete_successfully', 'Delete Successfully!'),
(62, 'internet_connection', 'Internet Connection'),
(63, 'ok', 'Okay'),
(64, 'not_available', 'Not Available'),
(65, 'available', 'Available'),
(66, 'outgoing_file', 'Outgoing File'),
(67, 'incoming_file', 'Incoming File'),
(68, 'data_synchronize', 'Data Synchronize'),
(69, 'unable_to_upload_file_please_check_configuration', 'Unable to upload file! please check configuration'),
(70, 'please_configure_synchronizer_settings', 'Please configure synchronizer settings'),
(71, 'download_successfully', 'Download Successfully'),
(72, 'unable_to_download_file_please_check_configuration', 'Unable to download file! please check configuration'),
(73, 'data_import_first', 'Data Import First'),
(74, 'data_import_successfully', 'Data Import Successfully!'),
(75, 'unable_to_import_data_please_check_config_or_sql_file', 'Unable to Import Data! Please Check Configuration / SQL File.'),
(76, 'download_data_from_server', 'Download Data from Server'),
(77, 'data_import_to_database', 'Data Import To Database'),
(79, 'data_upload_to_server', 'Data Upload to Server'),
(81, 'ooops_something_went_wrong', ' Ops Something Went Wrong...'),
(82, 'module_permission_list', 'Module Permission List'),
(83, 'user_permission', 'User Permission'),
(84, 'add_module_permission', 'Add Module Permission'),
(85, 'module_permission_added_successfully', 'Module Permission Added Successfully!'),
(86, 'update_module_permission', 'Update Module Permission'),
(87, 'download', 'Download'),
(88, 'module_name', 'Module Name'),
(89, 'create', 'Create'),
(90, 'read', 'Read'),
(91, 'update', 'Update'),
(92, 'delete', 'Delete'),
(93, 'module_list', 'Module List'),
(94, 'add_module', 'Add Module'),
(95, 'directory', 'Module Directory'),
(96, 'description', 'Description'),
(97, 'image_upload_successfully', 'Image Upload Successfully!'),
(98, 'module_added_successfully', 'Module Added Successfully'),
(99, 'inactive', 'Inactive'),
(100, 'active', 'Active'),
(101, 'user_list', 'User List'),
(102, 'see_all_message', 'See All Messages'),
(103, 'setting', 'Setting'),
(104, 'logout', 'Logout'),
(105, 'admin', 'Admin'),
(106, 'add_user', 'Add User'),
(107, 'user', 'User'),
(108, 'module', 'Module'),
(109, 'new', 'New'),
(110, 'inbox', 'Inbox'),
(111, 'sent', 'Sent'),
(112, 'synchronize', 'Synchronize'),
(113, 'data_synchronizer', 'Data Synchronizer'),
(114, 'module_permission', 'Module Permission'),
(115, 'backup_now', 'Backup Now!'),
(116, 'restore_now', 'Restore Now!'),
(117, 'backup_and_restore', 'Backup and Restore'),
(118, 'captcha', 'Captcha Word'),
(119, 'database_backup', 'Database Backup'),
(120, 'restore_successfully', 'Restore Successfully'),
(121, 'backup_successfully', 'Backup Successfully'),
(122, 'filename', 'File Name'),
(123, 'file_information', 'File Information'),
(125, 'backup_date', 'Backup Date'),
(126, 'overwrite', 'Overwrite'),
(127, 'invalid_file', 'Invalid File!'),
(128, 'invalid_module', 'Invalid Module'),
(129, 'remove_successfully', 'Remove Successfully!'),
(130, 'install', 'Install'),
(131, 'uninstall', 'Uninstall'),
(132, 'tables_are_not_available_in_database', 'Tables are not available in database.sql'),
(133, 'no_tables_are_registered_in_config', 'No tables are registered in config.php'),
(134, 'enquiry', 'Enquiry'),
(135, 'read_unread', 'Read/Unread'),
(136, 'enquiry_information', 'Enquiry Information'),
(137, 'user_agent', 'User Agent'),
(138, 'checked_by', 'Checked By'),
(139, 'new_enquiry', 'New Enquiry'),
(140, 'crud', 'Crud'),
(141, 'view', 'View'),
(144, 'ph', 'Phone'),
(145, 'cid', 'SL No'),
(146, 'view_atn', 'Attendance View'),
(147, 'mang', 'Employee Management'),
(148, 'designation', 'Designation'),
(149, 'test', 'Test'),
(150, 'sl', 'SL'),
(151, 'bdtask', 'BDTASK'),
(152, 'practice', 'Practice'),
(153, 'branch_name', 'Branch Name'),
(154, 'chairman_name', 'Chairman'),
(155, 'b_photo', 'Photo'),
(156, 'b_address', 'Address'),
(157, 'position', 'Designation'),
(158, 'advertisement', 'Advertisement'),
(159, 'position_name', 'Position'),
(160, 'position_details', 'Details'),
(161, 'circularprocess', 'Recruitment'),
(162, 'pos_id', 'Position'),
(163, 'adv_circular_date', 'Publish Date'),
(164, 'circular_dadeline', 'Deadline'),
(165, 'adv_file', 'Documents'),
(166, 'adv_details', 'Details'),
(167, 'attendance', 'Attendance'),
(168, 'employee', 'Employee'),
(169, 'emp_id', 'Employee Name'),
(170, 'sign_in', 'Sign In'),
(171, 'sign_out', 'Sign Out'),
(172, 'staytime', 'Stay Time'),
(173, 'abc', 'abc'),
(174, 'first_name', 'First Name'),
(175, 'last_name', 'Last Name'),
(176, 'alter_phone', 'Alternative Phone'),
(177, 'present_address', 'Present Address'),
(178, 'parmanent_address', 'Permanent Address'),
(179, 'candidateinfo', 'Candidate Info'),
(180, 'add_advertisement', 'Add Advertisement'),
(181, 'advertisement_list', 'Manage Advertisement '),
(182, 'candidate_basic_info', 'Candidate Information'),
(183, 'can_basicinfo_list', 'Manage Candidate'),
(184, 'add_canbasic_info', 'Add New Candidate'),
(185, 'candidate_education_info', 'Candidate Educational Info'),
(186, 'can_educationinfo_list', 'Candidate Edu Info List'),
(187, 'add_edu_info', 'Add Educational Info'),
(188, 'can_id', 'Candidate Id'),
(189, 'degree_name', 'Obtained Degree'),
(190, 'university_name', 'University'),
(191, 'cgp', 'CGPA'),
(192, 'comments', 'Comments'),
(193, 'signature', 'Signature'),
(194, 'candidate_workexperience', 'Candidate Work Experience'),
(195, 'can_workexperience_list', 'Work Experience List'),
(196, 'add_can_experience', 'Add Work Experience'),
(197, 'company_name', 'Company Name'),
(198, 'working_period', 'Working Period'),
(199, 'duties', 'Duties'),
(200, 'supervisor', 'Supervisor'),
(201, 'candidate_workexpe', 'Candidate Work Experience'),
(202, 'candidate_shortlist', 'Candidate Shortlist'),
(203, 'shortlist_view', 'Manage Shortlist'),
(204, 'add_shortlist', 'Add Shortlist'),
(205, 'date_of_shortlist', 'Shortlist Date'),
(206, 'interview_date', 'Interview Date'),
(207, 'submit', 'Submit'),
(208, 'candidate_id', 'Your ID'),
(209, 'job_adv_id', 'Job Position'),
(210, 'sequence', 'Sequence'),
(211, 'candidate_interview', 'Interview'),
(212, 'interview_list', 'Interview list'),
(213, 'add_interview', 'Add interview'),
(214, 'interviewer_id', 'Interviewer'),
(215, 'interview_marks', 'Viva Marks'),
(216, 'written_total_marks', 'Written Total Marks'),
(217, 'mcq_total_marks', 'MCQ Total Marks'),
(218, 'recommandation', 'Recommendation'),
(219, 'selection', 'Selection'),
(220, 'details', 'Details'),
(221, 'candidate_selection', 'Candidate Selection'),
(222, 'selection_list', 'Selection List'),
(223, 'add_selection', 'Add Selection'),
(224, 'employee_id', 'Employee Id'),
(225, 'position_id', '1'),
(226, 'selection_terms', 'Selection Terms'),
(227, 'total_marks', 'Total Marks'),
(228, 'photo', 'Picture'),
(229, 'your_id', 'Your ID'),
(230, 'change_image', 'Change Photo'),
(231, 'picture', 'Photograph'),
(232, 'ad', 'Add'),
(233, 'write_y_p_info', 'Write Your Personal Information'),
(234, 'emp_position', 'Employee Position'),
(235, 'add_pos', 'Add Position'),
(236, 'list_pos', 'List of Position'),
(237, 'emp_salary_stup', 'Employee Salary Setup'),
(238, 'add_salary_stup', 'Add Salary Setup'),
(239, 'list_salarystup', 'List of Salary Setup'),
(240, 'emp_sal_name', 'Salary Name'),
(241, 'emp_sal_type', 'Salary Type'),
(242, 'emp_performance', 'Employee Performance'),
(243, 'add_performance', 'Add Performance'),
(244, 'list_performance', 'List of Performance'),
(245, 'note', 'Note'),
(246, 'note_by', 'Note By'),
(247, 'number_of_star', 'Number of Star'),
(248, 'updated_by', 'Updated By'),
(249, 'emp_sal_payment', 'Manage Employee Salary'),
(250, 'add_payment', 'Add Payment'),
(251, 'list_payment', 'List of payment'),
(252, 'total_salary', 'Total Salary'),
(253, 'total_working_minutes', 'Working Hour'),
(254, 'payment_due', 'Payment Type'),
(255, 'payment_date', 'Date'),
(256, 'paid_by', 'Paid By'),
(257, 'view_employee_payment', 'Employee Payment List'),
(258, 'sal_payment_type', 'Salary Payment Type'),
(259, 'add_payment_type', 'Add Payment Type'),
(260, 'list_payment_type', 'List of Payment Type'),
(261, 'payment_period', 'Payment Period'),
(262, 'payment_type', 'Payment Type'),
(263, 'time', 'Punch Time'),
(264, 'shift', 'Shift'),
(265, 'location', 'Location'),
(266, 'logtype', 'Log Type'),
(267, 'branch', 'Location'),
(268, 'student', 'Students'),
(269, 'csv', 'CSV'),
(270, 'save_successfull', 'Your Data Save Successfully'),
(271, 'successfully_updated', 'Your Data Successfully Updated'),
(272, 'atn_form', 'Attendance Form'),
(273, 'atn_report', 'Attendance Report'),
(274, 'end_date', 'To'),
(275, 'start_date', 'From'),
(276, 'done', 'Done'),
(277, 'employee_id_se', 'Write Employee Id or name here '),
(278, 'attendance_repor', 'Attendance Report'),
(279, 'e_time', 'End Time'),
(280, 's_time', 'Start Time'),
(281, 'atn_datewiserer', 'Date Wise Report'),
(282, 'atn_report_id', 'Date And Id base Report'),
(283, 'atn_report_time', 'Date And Time report'),
(284, 'payroll', 'Payroll'),
(285, 'loan', 'Loan'),
(286, 'loan_grand', 'Grant Loan'),
(287, 'add_loan', 'Add Loan'),
(288, 'loan_list', 'List of Loan'),
(289, 'loan_details', 'Loan Details'),
(290, 'amount', 'Amount'),
(291, 'interest_rate', 'Interest Percentage'),
(292, 'installment_period', 'Installment Period'),
(293, 'repayment_amount', 'Repayment Total'),
(294, 'date_of_approve', 'Approved Date'),
(295, 'repayment_start_date', 'Repayment From'),
(296, 'permission_by', 'Permitted By'),
(297, 'grand', 'Grand'),
(298, 'installment', 'Installment'),
(299, 'loan_status', 'Status'),
(300, 'installment_period_m', 'Installment Period in Month'),
(301, 'successfully_inserted', 'Your loan Successfully Granted'),
(302, 'loan_installment', 'Loan Installment'),
(303, 'add_installment', 'Add Installment'),
(304, 'installment_list', 'List of Installment'),
(305, 'loan_id', 'Loan No'),
(306, 'installment_amount', 'Installment Amount'),
(307, 'payment', 'Payment'),
(308, 'received_by', 'Receiver'),
(309, 'installment_no', 'Install No'),
(310, 'notes', 'Notes'),
(311, 'paid', 'Paid'),
(312, 'loan_report', 'Loan Report'),
(313, 'e_r_id', 'Enter Your Employee ID'),
(314, 'leave', 'Leave'),
(315, 'add_leave', 'Add Leave'),
(316, 'list_leave', 'List of Leave'),
(317, 'dayname', 'Weekly Leave Day'),
(318, 'holiday', 'Holiday'),
(319, 'list_holiday', 'List of Holidays'),
(320, 'no_of_days', 'Number of Days'),
(321, 'holiday_name', 'Holiday Name'),
(322, 'set', 'Set'),
(323, 'tax', 'Tax'),
(324, 'tax_setup', 'Tax Setup'),
(325, 'add_tax_setup', 'Add Tax Setup'),
(326, 'list_tax_setup', 'List of Tax setup'),
(327, 'tax_collection', 'Tax collection'),
(328, 'start_amount', 'Start Amount'),
(329, 'end_amount', 'End Amount'),
(330, 'rate', 'Tax Rate'),
(331, 'date_start', 'Date Start'),
(332, 'amount_tax', 'Tax Amount'),
(333, 'collection_by', 'Collection By'),
(334, 'date_end', 'Date End'),
(335, 'income_net_period', 'Income  Net period'),
(336, 'default_amount', 'Default Amount'),
(337, 'add_sal_type', 'Add Salary Type'),
(338, 'list_sal_type', 'Salary Type List'),
(339, 'salary_type_setup', 'Salary Type Setup'),
(340, 'salary_setup', 'Salary Setup'),
(341, 'add_sal_setup', 'Add Salary Setup'),
(342, 'list_sal_setup', 'Salary Setup List'),
(343, 'salary_type_id', 'Salary Type'),
(344, 'salary_generate', 'Salary Generate'),
(345, 'add_sal_generate', 'Generate Now'),
(346, 'list_sal_generate', 'Generated Salary List'),
(347, 'gdate', 'Generate Date'),
(348, 'start_dates', 'Start Date'),
(349, 'generate', 'Generate '),
(350, 'successfully_saved_saletup', ' Set up Successful'),
(351, 's_date', 'Start Date'),
(352, 'e_date', 'End Date'),
(353, 'salary_payable', 'Payable Salary'),
(354, 'tax_manager', 'Tax'),
(355, 'generate_by', 'Generated By'),
(356, 'successfully_paid', 'Successfully Paid'),
(357, 'direct_empl', ' Employee'),
(358, 'add_emp_info', 'Add New Employee'),
(359, 'new_empl_pos', 'Add New Employee Position'),
(360, 'manage', 'Manage Designation'),
(361, 'ad_advertisement', 'ADD POSITION'),
(362, 'moduless', 'Modules'),
(363, 'next', 'Next'),
(364, 'finish', 'Finish'),
(365, 'request', 'Request'),
(366, 'successfully_saved', 'Your Data Successfully Saved'),
(367, 'sal_type', 'Salary Type'),
(368, 'sal_name', 'Salary Name'),
(369, 'leave_application', 'Leave Application'),
(370, 'apply_strt_date', 'Application Start Date'),
(371, 'apply_end_date', 'Application End date'),
(372, 'leave_aprv_strt_date', 'Approved Start Date'),
(373, 'leave_aprv_end_date', 'Approved End Date'),
(374, 'num_aprv_day', 'Approved Day'),
(375, 'reason', 'Reason'),
(376, 'approve_date', 'Approved Date'),
(377, 'leave_type', 'Leave Type'),
(378, 'apply_hard_copy', 'Application Hard Copy'),
(379, 'approved_by', 'Approved By'),
(380, 'notice', 'Notice Board'),
(381, 'noticeboard', 'Notice Board'),
(382, 'notice_descriptiion', 'Description'),
(383, 'notice_date', 'Notice Date'),
(384, 'notice_type', 'Notice Type'),
(385, 'notice_by', 'Notice By'),
(386, 'notice_attachment', 'Attachment'),
(387, 'account_name', 'Account Name'),
(388, 'account_type', 'Account Type'),
(389, 'account_id', 'Account Name'),
(390, 'transaction_description', 'Description'),
(391, 'payment_id', 'Payment'),
(392, 'create_by_id', 'Created By'),
(393, 'account', 'Account'),
(394, 'account_add', 'Add Account'),
(395, 'account_transaction', 'Transaction'),
(396, 'award', 'Award'),
(397, 'new_award', 'New Award'),
(398, 'award_name', 'Award Name'),
(399, 'aw_description', 'Award Description'),
(400, 'awr_gift_item', 'Gift Item'),
(401, 'awarded_by', 'Award By'),
(402, 'employee_name', 'Employee Name'),
(403, 'employee_list', 'Atn List'),
(404, 'department', 'Department'),
(405, 'department_name', 'Department Name '),
(406, 'clockout', 'Clock Out'),
(407, 'se_account_id', 'Select Account Name'),
(408, 'division', 'Division'),
(409, 'add_division', 'Add Division'),
(410, 'update_division', 'Update Division'),
(411, 'division_name', 'Division Name'),
(412, 'division_list', 'Manage Division '),
(413, 'designation_list', 'Designation List'),
(414, 'manage_designation', 'Manage Designation'),
(415, 'add_designation', 'Add Designation'),
(416, 'select_division', 'Select Division'),
(417, 'select_designation', 'Select Designation'),
(418, 'asset', 'Asset'),
(419, 'asset_type', 'Asset Type'),
(420, 'add_type', 'Add Type'),
(421, 'type_list', 'Type List'),
(422, 'type_name', 'Type Name'),
(423, 'select_type', 'Select Type'),
(424, 'equipment_name', 'Equipment Name'),
(425, 'model', 'Model'),
(426, 'serial_no', 'Serial No'),
(427, 'equipment', 'Equipment'),
(428, 'add_equipment', 'Add Equipment'),
(429, 'equipment_list', 'Equipment List'),
(430, 'type', 'Type'),
(431, 'equipment_maping', 'Equipment Mapping'),
(432, 'add_maping', 'Add Mapping'),
(433, 'maping_list', 'Mapping List'),
(434, 'update_equipment', 'Update Equipment'),
(435, 'select_employee', 'Select Employee'),
(436, 'select_equipment', 'Select Equipment'),
(437, 'basic_info', 'Basic Information'),
(438, 'middle_name', 'Middle Name'),
(441, 'zip_code', 'Zip Code'),
(442, 'maiden_name', 'Maiden Name'),
(443, 'add_employee', 'Add Employee'),
(444, 'manage_employee', 'Manage Employee'),
(445, 'employee_update_form', 'Employee Update Form'),
(446, 'what_you_search', 'What You Search'),
(448, 'duty_type', 'Duty Type'),
(449, 'hire_date', 'Hire Date'),
(450, 'original_h_date', 'Original Hire Date'),
(451, 'voluntary_termination', 'Voluntary Termination'),
(452, 'termination_reason', 'Termination Reason'),
(453, 'termination_date', 'Termination Date'),
(454, 're_hire_date', 'Re Hire Date'),
(455, 'rate_type', 'Rate Type'),
(456, 'pay_frequency', 'Pay Frequency'),
(457, 'pay_frequency_txt', 'Pay Frequency Text'),
(458, 'hourly_rate2', 'Hourly Rate2'),
(459, 'hourly_rate3', 'Hourly Rate3'),
(460, 'home_department', 'Home Department'),
(461, 'department_text', 'Department Text'),
(462, 'benifit_class_code', 'Benefit Class code'),
(463, 'benifit_desc', 'Benefit Description'),
(464, 'benifit_acc_date', 'Benefit Accrual Date'),
(465, 'benifit_sta', 'Benefit Status'),
(466, 'super_visor_name', 'Supervisor Name'),
(467, 'is_super_visor', 'Is Supervisor'),
(468, 'supervisor_report', 'Supervisor Report'),
(469, 'dob', 'Date of Birth'),
(470, 'gender', 'Gender'),
(471, 'marital_stats', 'Marital Status'),
(472, 'ethnic_group', 'Ethnic Group'),
(473, 'eeo_class_gp', 'EEO Class'),
(474, 'ssn', 'SSN'),
(475, 'work_in_state', 'Work in State'),
(476, 'live_in_state', 'Live in State'),
(477, 'home_email', 'Home Email'),
(478, 'business_email', 'Business Email'),
(479, 'home_phone', 'Home Phone'),
(480, 'business_phone', 'Business Phone'),
(481, 'cell_phone', 'Cell Phone'),
(482, 'emerg_contct', 'Emergency Contact'),
(483, 'emerg_home_phone', 'Emergency Home Phone'),
(484, 'emrg_w_phone', 'Emergency Work Phone'),
(485, 'emer_con_rela', 'Emergency Contact Relation'),
(486, 'alt_em_contct', 'Alter Emergency Contact'),
(487, 'alt_emg_h_phone', 'Alt Emergency Home Phone'),
(488, 'alt_emg_w_phone', 'Alt Emergency  Work Phone'),
(489, 'reports', 'Reports'),
(490, 'employee_reports', 'Employee Reports'),
(491, 'demographic_report', 'Demographic Report'),
(492, 'posting_report', 'Positional Report'),
(493, 'custom_report', 'Custom Report'),
(494, 'benifit_report', 'Benefit Report'),
(495, 'demographic_info', 'Demographical Information'),
(496, 'positional_info', 'Positional Info'),
(497, 'assets_info', 'Assets Information'),
(498, 'custom_field', 'Custom Field'),
(499, 'custom_value', 'Custom Data'),
(500, 'adhoc_report', 'Adhoc Report'),
(501, 'asset_assignment', 'Asset Assignment'),
(502, 'assign_asset', 'Assign Assets'),
(503, 'assign_list', 'Assign List'),
(504, 'update_assign', 'Update Assign'),
(505, 'citizenship', 'Citizenship'),
(506, 'class_sta', 'Class status'),
(507, 'class_acc_date', 'Class Accrual date'),
(508, 'class_descript', 'Class Description'),
(509, 'class_code', 'Class Code'),
(510, 'return_asset', 'Return Assets'),
(511, 'dept_id', 'Department ID'),
(512, 'parent_id', 'Parent ID'),
(513, 'equipment_id', 'Equipment ID'),
(514, 'issue_date', 'Issue Date'),
(515, 'damarage_desc', 'Damarage Description'),
(516, 'return_date', 'Return Date'),
(517, 'is_assign', 'Is Assign'),
(518, 'emp_his_id', 'Employee History ID'),
(519, 'damarage_descript', 'Damage Description'),
(520, 'return', 'Return'),
(521, 'return_successfull', 'Return Successful'),
(522, 'return_list', 'Return List'),
(523, 'custom_data', 'Custom Data'),
(524, 'passing_year', 'Passing Year'),
(525, 'is_admin', 'Is Admin'),
(526, 'zip', 'Zip Code'),
(527, 'original_hire_date', 'Original Hire Date'),
(528, 'rehire_date', 'Rehire Date'),
(529, 'class_code_desc', 'Class Code Description'),
(530, 'class_status', 'Class Status'),
(531, 'super_visor_id', 'Supervisor ID'),
(532, 'marital_status', 'Marital Status'),
(533, 'emrg_h_phone', 'Emergency Home Phone'),
(534, 'emgr_contct_relation', 'Emergency Contact Relation'),
(535, 'id', 'ID'),
(536, 'type_id', 'Equipment Type'),
(537, 'custom_id', 'Custom ID'),
(538, 'custom_data_type', 'Custom Data Type'),
(539, 'role_permission', 'Role Permission'),
(540, 'permission_setup', 'Permission Setup'),
(541, 'add_role', 'Add Role'),
(542, 'role_list', 'Role List'),
(543, 'user_access_role', 'User Access Role'),
(544, 'menu_item_list', 'Menu Item List'),
(545, 'ins_menu_for_application', 'Ins Menu  For Application'),
(547, 'page_url', 'Page URL'),
(549, 'role', 'Role'),
(550, 'role_name', 'Role Name'),
(551, 'single_checkin', 'Single Check In'),
(552, 'bulk_checkin', 'Bulk Check In'),
(553, 'manage_attendance', 'Manage Attendance'),
(554, 'attendance_list', 'Attendance List'),
(557, 'stay', 'Stay'),
(558, 'attendance_report', 'Attendance Report'),
(559, 'work_hour', 'Work Hour'),
(560, 'cancel', 'Cancel'),
(561, 'confirm_clock', 'Confirm Checkout'),
(562, 'add_attendance', 'Add Attendance'),
(563, 'upload_csv', 'Upload CSV'),
(564, 'import_attendance', 'Import Attendance'),
(565, 'manage_account', 'Manage Account'),
(566, 'add_account', 'Add Account'),
(567, 'add_new_account', 'Add New Account'),
(568, 'account_details', 'Account Details'),
(569, 'manage_transaction', 'Manage Transaction'),
(570, 'add_expence', 'Add Experience'),
(571, 'add_income', 'Add Income'),
(572, 'return_now', 'Return Now !!'),
(573, 'manage_award', 'Manage Award'),
(574, 'add_new_award', 'Add New Award'),
(575, 'personal_information', 'Personal Information'),
(576, 'educational_information', 'Educational Information'),
(577, 'past_experience', 'Past Experience'),
(578, 'basic_information', 'Basic Information'),
(579, 'result', 'Result'),
(580, 'institute_name', 'Institute Name'),
(581, 'education', 'Education'),
(582, 'manage_shortlist', 'Manage Short List'),
(583, 'manage_interview', 'Manage Interview'),
(584, 'manage_selection', 'Manage Selection'),
(585, 'add_new_dept', 'Add New Department'),
(586, 'manage_dept', 'Manage Department'),
(587, 'successfully_checkout', 'Checkout Successful !'),
(588, 'grant_loan', 'Grant Loan'),
(589, 'successfully_installed', 'Successfully Installed'),
(590, 'total_loan', 'Total Loan'),
(591, 'total_amount', 'Total Amount'),
(592, 'filter', 'Filter'),
(593, 'weekly_holiday', 'Weekly Holiday'),
(594, 'manage_application', 'Manage Application'),
(595, 'add_application', 'Add Application'),
(596, 'manage_holiday', 'Manage Holiday'),
(597, 'add_more_holiday', 'Add More Holiday'),
(598, 'manage_weekly_holiday', 'Manage Weekly Holiday'),
(599, 'add_weekly_holiday', 'Add Weekly Holiday'),
(600, 'manage_granted_loan', 'Manage Granted Loan'),
(601, 'manage_installment', 'Manage Installment'),
(602, 'add_new_notice', 'Add New Notice'),
(603, 'manage_notice', 'Manage Notice'),
(604, 'salary_type', 'Salary Type'),
(605, 'manage_salary_generate', 'Manage Salary Generate'),
(606, 'generate_now', 'Generate Now'),
(607, 'add_salary_setup', 'Add Salary Setup'),
(608, 'manage_salary_setup', 'Manage Salary Setup'),
(609, 'add_salary_type', 'Add Salary Type'),
(610, 'manage_salary_type', 'Manage Salary Type'),
(611, 'manage_tax_setup', 'Manage Tax Setup'),
(612, 'setup_tax', 'Setup Tax'),
(613, 'add_more', 'Add More'),
(614, 'tax_rate', 'Tax Rate'),
(615, 'no', 'No'),
(616, 'setup', 'Setup'),
(617, 'biographicalinfo', 'Bio-Graphical Information'),
(618, 'positional_information', 'Positional Information'),
(620, 'benifits', 'Benefits'),
(621, 'others_leave_application', 'Others Leave'),
(622, 'add_leave_type', 'Add Leave Type'),
(623, 'others_leave', 'Apply Leave'),
(624, 'number_of_leave_days', 'Number of Leave Days'),
(627, 'add_category', 'Add Category'),
(630, 'add_food', 'Add Food'),
(634, 'category_subtitle', 'Category Subtitle'),
(635, 'update_category', 'Update Category'),
(636, 'update_fooditem', 'Update Food Item'),
(713, 'food_list', 'Food List'),
(717, 'category_name', 'Category Name'),
(718, 'category_list', 'Category List'),
(719, 'itemmanage', 'Food Management'),
(720, 'manage_category', 'Manage Category'),
(721, 'manage_food', 'Manage Food'),
(722, 'offerdate', 'Offer Start Date'),
(723, 'manage_addons', 'Manage Add-ons'),
(724, 'add_adons', 'Add Add-ons'),
(725, 'menu_addons', 'Add-ons Menu'),
(726, 'addons_list', 'Add-ons List'),
(727, 'assign_adons', 'Add-ons Assign'),
(728, 'assign_adons_list', 'Add-ons Assign List'),
(729, 'update_adons', 'Update Add-ons'),
(730, 'item_name', 'Food Name'),
(731, 'price', 'Price'),
(732, 'offerenddate', 'Offer End Date'),
(733, 'units', 'Unit and Ingredients'),
(734, 'manage_unitmeasurement', 'Unit Measurement'),
(735, 'unit_list', 'Unit Measurement List'),
(736, 'unit_add', 'Add Unit'),
(737, 'unit_update', 'Unit Update'),
(738, 'unit_name', 'Unit Name'),
(739, 'manage_ingradient', 'Manage Ingredients'),
(740, 'ingradient_list', 'Ingredient List'),
(741, 'add_ingredient', 'Add Ingredient'),
(742, 'ingredient_name', 'Ingredient Name'),
(743, 'unit_short_name', 'Short Name'),
(744, 'update_ingredient', 'Update Ingredient'),
(745, 'component', 'Components'),
(746, 'vat_tax', 'GST'),
(748, 'food_varient', 'Food Variant'),
(749, 'food_availablity', 'Food Availability'),
(750, 'add_varient', 'Add Variant'),
(751, 'varient_name', 'Variant Name'),
(752, 'variant_list', 'Variant List'),
(753, 'variant_edit', 'Update Variant'),
(754, 'food_availablelist', 'Food Available List'),
(755, 'add_availablity', 'Add Available Day & Time'),
(756, 'edit_availablity', 'Update Available Day & Time'),
(757, 'available_day', 'Available Day'),
(758, 'available_time', 'Available Time'),
(759, 'membership_management', 'Membership Management'),
(760, 'membership_list', 'Membership List'),
(761, 'membership_name', 'Membership Name'),
(762, 'discount', 'Discount'),
(763, 'other_facilities', 'Other Facilities'),
(764, 'membership_add', 'Add Membership'),
(765, 'membership_edit', 'Update Membership'),
(766, 'payment_setting', 'Payment Method Setting'),
(767, 'paymentmethod_list', 'Payment Method List'),
(768, 'payment_add', 'Add Payment Method'),
(769, 'payment_edit', 'Update Payment Method'),
(770, 'payment_name', 'Payment Method Name'),
(771, 'shipping_setting', 'Shipping Method Setting'),
(772, 'shipping_list', 'Shipping Method List'),
(773, 'shipping_name', 'Shipping Method Name'),
(774, 'shipping_add', 'Add Shipping Method'),
(775, 'shipping_edit', 'Update Shipping Method'),
(776, 'shippingrate', 'Shipping Rate'),
(777, 'supplier_manage', 'Supplier Manage'),
(778, 'supplier_name', 'Supplier Name'),
(779, 'supplier_list', 'Supplier List'),
(780, 'mobile', 'Mobile'),
(781, 'address', 'Address'),
(782, 'supplier_add', 'Add Supplier'),
(783, 'supplier_edit', 'Update Supplier'),
(784, 'purchase_item', 'Purchase Item'),
(785, 'purchase', 'Purchase Manage'),
(786, 'purchase_list', 'Purchase List'),
(787, 'purchase_add', 'Add Purchase'),
(788, 'purchase_edit', 'Update Purchase'),
(789, 'quantity', 'Quantity'),
(790, 'supplier_information', 'Supplier Information'),
(791, 'add_new_order', 'Add New Order'),
(792, 'pending_order', 'Pending Order'),
(793, 'processing_order', 'Processing Order'),
(794, 'cancel_order', 'Cancel Order'),
(795, 'complete_order', 'Complete Order'),
(796, 'pos_invoice', 'POS Invoice'),
(797, 'ordermanage', 'Manage Order'),
(798, 'table_manage', 'Manage Table'),
(799, 'table_edit', 'Update Table'),
(800, 'table_list', 'Table List'),
(801, 'table_name', 'Table Name'),
(802, 'customer_type', 'Customer Type'),
(803, 'customertype_list', 'Customer Type List'),
(804, 'production', 'Production'),
(805, 'add_table', 'Table Add'),
(806, 'table_add', 'Add Table'),
(807, 'add_new_table', 'Add Table'),
(808, 'order_list', 'Order List'),
(809, 'currency', 'Currency'),
(810, 'currency_list', 'Currency List'),
(811, 'currency_name', 'Currency Name'),
(812, 'currency_add', 'Add Currency'),
(813, 'currency_edit', 'Update Currency'),
(814, 'currency_icon', 'Currency Icon'),
(815, 'currency_rate', 'Conversion Rate'),
(816, 'report', 'Report'),
(817, 'purchase_report', 'Purchase Report'),
(818, 'purchase_report_ingredient', 'Stock Report (Kitchen)'),
(819, 'stock_report', 'Stock Report'),
(820, 'sell_report', 'Sales Report'),
(821, 'stock_report_product_wise', 'Stock Report (Food Items)'),
(822, 'accounts', 'Accounts'),
(823, 'c_o_a', 'Chart of Accounts'),
(824, 'debit_voucher', 'Debit Voucher'),
(825, 'credit_voucher', 'Credit Voucher'),
(826, 'contra_voucher', 'Contra Voucher'),
(827, 'journal_voucher', 'Journal Voucher'),
(828, 'voucher_approval', 'Voucher Approval'),
(829, 'account_report', 'Accounts Report'),
(830, 'voucher_report', 'Voucher Report'),
(831, 'cash_book', 'Cash Book'),
(832, 'bank_book', 'Bank Book'),
(833, 'general_ledger', 'General Ledger'),
(834, 'trial_balance', 'Trial Balance'),
(835, 'profit_loss', 'Profit Loss'),
(836, 'cash_flow', 'Cash Flow'),
(837, 'coa_print', 'COA Print'),
(838, 'in_quantity', 'In Quantity'),
(839, 'out_quantity', 'Out Quantity'),
(840, 'stock', 'Stock'),
(841, 'find', 'Find'),
(842, 'from_date', 'From'),
(843, 'to_date', 'To'),
(844, 'approved', 'Approved'),
(845, 'total_ammount', 'Total Amount'),
(846, 'total_purchase', 'Total Purchase'),
(847, 'total_sale', 'Total Sale'),
(848, 'csv_file_informaion', 'CSV File Information'),
(849, 'import_product_csv', 'Import product (CSV)'),
(851, 'production_set_list', 'Production Set List'),
(852, 'production_add', 'Add Production'),
(853, 'production_list', 'Production List'),
(854, 'billing_from', 'Billing From'),
(855, 'invoice', 'Invoice'),
(856, 'invoice_no', 'Invoice No'),
(857, 'billing_date', 'Billing Date'),
(858, 'billing_to', 'Billing To'),
(859, 'reservation', 'Reservation'),
(860, 'take_reservation', 'Take A Reservation'),
(861, 'update_table', 'Table Update'),
(862, 'reserve_time', 'Reservation Table'),
(863, 'reservation_table', 'Add Booking'),
(864, 'table_setting', 'Table Setting'),
(865, 'capacity', 'Capacity'),
(866, 'icon', 'Icon'),
(867, 'purchase_return', 'Purchase Return'),
(868, 'purchase_qty', 'Purchase Qty'),
(869, 'return_qty', 'Return Qty'),
(870, 'total', 'Total'),
(871, 'select', 'Select'),
(872, 'return_invoice', 'Return Invoice'),
(873, 'invoice_view', 'View Invoice'),
(874, 'grand_total', 'Grand Total'),
(875, 'supplier', 'Supplier'),
(876, 'po_no', 'Invoice No'),
(877, 'grant', 'Grant'),
(878, 'hrm', 'Human Resource'),
(879, 'departmentfrm', 'Add Department'),
(880, 'benefits', 'Benefits'),
(881, 'class', 'Class'),
(882, 'biographical_info', 'Biographical Info'),
(883, 'additional_address', 'Additional Address'),
(884, 'custom', 'Custom'),
(885, 'pay_now', 'Pay Now ??'),
(886, 'paymentmethod_setup', 'Payment Setup'),
(887, 'add_paymentsetup', 'Add New Payment Setup'),
(888, 'edit_setup', 'Update Setup'),
(889, 'marchantid', 'Marchant ID'),
(890, 'order_successfully', 'Your Payment was Completed!!!.'),
(891, 'order_fail', 'Payment Incomplete!!!'),
(892, 'voucher_no', 'Voucher No'),
(893, 'remark', 'Remark'),
(894, 'code', 'Code'),
(895, 'debit', 'Debit'),
(896, 'credit', 'Credit'),
(897, 'template_name', 'Template Name '),
(898, 'sms_template', 'SMS Template'),
(899, 'sms_template_warning', 'Please Use '),
(900, 'userid', 'User ID'),
(901, 'from', 'From'),
(902, 'opening_cash_and_equivalent', 'Opening Cash & Equivalent'),
(903, 'amount_in_Dollar', 'Amount In Dollar'),
(904, 'pre_balance', 'Pre Balance'),
(905, 'current_balance', 'Current Balance'),
(906, 'with_details', 'With Details'),
(907, 'credit_account_head', 'Credit Account Head'),
(908, 'gl_head', 'GL Head'),
(909, 'transaction_head', 'Transaction Head'),
(910, 'confirm', 'Confirm'),
(911, 's_rate', 'Rate'),
(912, 'web_setting', 'Web Setting'),
(913, 'banner_setting', 'Banner Setting'),
(914, 'menu_setting', 'Menu Setting'),
(915, 'widget_setting', 'Widget Setting'),
(916, 'add_banner', 'Add Banner'),
(917, 'bannertype', 'Add Banner Type'),
(918, 'banner_list', 'Banner List'),
(919, 'title', 'Title'),
(920, 'subtitle', 'Sub Title'),
(921, 'banner_type', 'Banner Type'),
(922, 'link_url', 'Link URL'),
(923, 'banner_edit', 'Banner Update'),
(924, 'menu_name', 'Menu Name'),
(925, 'menu_url', 'Menu Slug'),
(926, 'sub_menu', 'Sub Menu'),
(927, 'add_menu', 'Add Menu'),
(928, 'parent_menu', 'Parent Menu'),
(929, 'widget_name', 'Widget Name'),
(930, 'widget_title', 'Widget Title'),
(931, 'widget_desc', 'Description'),
(932, 'add_widget', 'Add New'),
(933, 'common_setting', 'Common Setting'),
(934, 'bannersize', 'Banner Size'),
(936, 'height', 'Height'),
(937, 'exclusive', 'Exclusive'),
(938, 'best_Offers', 'Best Offer'),
(939, 'invalid_size', 'Invalid Size'),
(940, 'confirm_reservation', 'Confirm Reservation'),
(941, 'food_details', 'Food Details'),
(942, 'email_setting', 'Email Setting'),
(943, 'contact_email_list', 'Contact List'),
(944, 'subscribelist', 'Subscribe List'),
(945, 'contact_send', 'Your Contact Information Send Successfully.'),
(946, 'couponlist', 'Coupon List'),
(947, 'add_coupon', 'Add Coupon'),
(948, 'coupon_Code', 'Coupon Code'),
(949, 'coupon_rate', 'Coupon Value'),
(950, 'coupon_startdate', 'Start Date'),
(951, 'coupon_enddate', 'End Date'),
(952, 'coupon_edit', 'Update Coupon'),
(953, 'rating', 'Rating '),
(954, 'add_rating', 'Add Rating'),
(955, 'reviewtxt', 'Review Text'),
(956, 'rating_edit', 'Rating Update'),
(957, 'customer_rating', 'Customer Rating'),
(958, 'country_list', 'Country List'),
(959, 'countryname', 'Country Name'),
(960, 'add_country', 'Add Country'),
(961, 'edit_country', 'Update Country'),
(962, 'add_state', 'Add State'),
(963, 'edit_state', 'State Update'),
(964, 'state', 'State'),
(965, 'city', 'City'),
(966, 'add_city', 'Add City'),
(967, 'edit_city', 'City Update'),
(968, 'country', 'Country'),
(969, 'state_list', 'State List'),
(970, 'city_list', 'All City'),
(971, 'server_setting', 'App Setting'),
(972, 'netip', 'Your Local Host Full URL'),
(974, 'onlinebdname', 'Online Database Name'),
(975, 'dbuser', 'Database User'),
(976, 'dbpassword', 'Database Password'),
(977, 'dbhost', 'Database Host Name'),
(978, 'social_setting', 'Social Setting'),
(979, 'url_link', 'URL'),
(980, 'sicon', 'Select Icon'),
(981, 'ord_failed', 'Order Failed!!!'),
(982, 'failed_msg', 'Order not placed due to some reason. Please Try Again!!!. Thank You !!!'),
(983, 'ord_succ', 'Order Placed Successfully!!!'),
(984, 'succ_smg', 'Are you Sure to Print This Invoice????'),
(985, 'no_order_run', 'No Order Running'),
(986, 'thirdpartycustomer_list', 'Third-Party Customers'),
(987, '3rd_customer_list', 'Third-Party Customers List'),
(988, '3rdcompany_name', 'Company Name'),
(989, 'add_3rdparty_comapny', 'Add New Company'),
(990, 'update_3rdparty', 'Update Company'),
(991, 'commision', 'Commission'),
(992, 'list_of_card_terminal', 'Card Terminal List'),
(993, 'add_new_terminal', 'Add New Terminal'),
(994, 'update_terminal', 'Update Terminal'),
(995, 'card_terminal_name', 'Card Terminal Name'),
(996, 'list_of_bank', 'Bank List'),
(997, 'add_bank', 'Add New Bank'),
(998, 'update_bank', 'Update Bank'),
(999, 'bank_name', 'Bank Name'),
(1000, 'sell_report_filter', 'Sale Report Filtering'),
(1001, 'sms_setting', 'SMS Setting'),
(1002, 'sms_configuration', 'SMS Configuration'),
(1003, 'sms_temp', 'SMS Template'),
(1004, 'candidate_name', 'Candidate Name'),
(1005, 'assign1_role', 'Assign Role'),
(1006, 'customer_list', 'Customer List'),
(1007, 'customer_name', 'Customer Name'),
(1008, 'update_ord', 'Update Order'),
(1009, 'final_report', 'Final Report'),
(1010, 'ehrm', 'HRM'),
(1011, 'add_expense_item', 'Add Expense Item'),
(1012, 'manage_expense_item', 'Manage Expense Item'),
(1013, 'add_expense', 'Add Expense'),
(1014, 'manage_expense', 'Manage Expense'),
(1015, 'expense_statement', 'Expense Statement'),
(1016, 'expense_type', 'Expense Type'),
(1017, 'expense_item_name', 'Expense Item Name'),
(1018, 'expense', 'Expense'),
(1020, 'signature_pic', 'Signature Picture'),
(1021, 'branch1', 'Branch'),
(1022, 'ac_no', 'A/C Number'),
(1023, 'ac_name', 'A/C Name'),
(1024, 'bank_transaction', 'Bank Transaction'),
(1025, 'bank', 'Bank'),
(1027, 'bank_ledger', 'Bank Ledger'),
(1028, 'note_name', 'Note Name'),
(1029, 'balance', 'Balance'),
(1030, 'previous_balance', 'Previous Credit Balance'),
(1031, 'manage_supplier_ledger', 'Manage supplier Ledger'),
(1032, 'supplier_ledger', 'Supplier Ledger'),
(1033, 'print', 'Print'),
(1034, 'select_supplier', 'Select Supplier'),
(1035, 'deposite_id', 'Deposit ID'),
(1036, 'print_date', 'Print Date'),
(1037, 'manage_bank', 'Manage Bank'),
(1038, 'add_new_bank', 'Add New Bank'),
(1039, 'bank_list', 'Bank List'),
(1040, 'bank_edit', 'Bank Edit'),
(1041, 'debit_plus', 'Debit (+)'),
(1042, 'credit_minus', 'Credit (-)'),
(1043, 'withdraw_deposite_id', 'Withdraw / Deposit ID'),
(1044, 'cash_adjustment', 'Cash Adjustment'),
(1045, 'adjustment_type', 'Adjustment Type'),
(1046, 'supplier_payment', 'Supplier Payment'),
(1047, 'prepared_by', 'Prepared By'),
(1048, 'authorized_signature', 'Authorized Signature'),
(1049, 'chairman', 'Chairman'),
(1050, 'kitchen_dashboard', 'Kitchen Dashboard'),
(1051, 'counter_dashboard', 'Counter Dashboard'),
(1052, 'nw_order', 'New Order'),
(1053, 'ongoingorder', 'On Going Order'),
(1054, 'tdayorder', 'Today Order'),
(1055, 'onlineord', 'Online Order '),
(1056, 'table', 'Table'),
(1057, 'waiter', 'Waiter'),
(1058, 'del_company', 'Delivery Company'),
(1059, 'cookedtime', 'Cooking Time'),
(1060, 'ord_num', 'Order Number'),
(1061, 'cmplt', 'Complete'),
(1062, 'sl_payment', 'Select Your Payment Method'),
(1063, 'paymd', 'Payment Method'),
(1064, 'crd_terminal', 'Card Terminal'),
(1065, 'sl_bank', 'Select Bank'),
(1066, 'lstdigit', 'Last 4 Digit'),
(1067, 'cuspayment', 'Customer Payment'),
(1068, 'cng_amount', 'Changes Amount'),
(1069, 'pay_print', 'Pay Now & Print Invoice'),
(1070, 'payn', 'Pay Now'),
(1071, 'ordid', 'Order ID'),
(1072, 'can_reason', 'Cancel Reason'),
(1073, 'can_ord', 'Cancel Order'),
(1074, 'close', 'Close'),
(1075, 'add_customer', 'Add Customer'),
(1076, 'fav_addesrr', 'Favorite Address'),
(1077, 'tabltno', 'Table No'),
(1078, 'ordate', 'Order Date'),
(1079, 'payment_status', 'Payment Status'),
(1080, 'ordtcoun', 'Order Time Countdown Board'),
(1081, 'remtime', 'Remaining Time'),
(1082, 'ordtime', 'Order Time'),
(1083, 'ord', 'Order'),
(1084, 'tok', 'Token'),
(1085, 'view_ord', 'View Order'),
(1086, 'fdready', 'Food Ready'),
(1087, 'fdnready', 'Food Not Ready'),
(1088, 'foodrfs', 'Food is Ready for Served!!'),
(1089, 'foodnrfs', 'Food Not Ready for Served'),
(1090, 'ordready', 'Order Ready'),
(1091, 'sele_by_date', 'Sale By Date'),
(1092, 'withdetails', 'With Details'),
(1093, 'topeneqv', 'Total Opening Cash & Cash Equivalent'),
(1094, 'cashopen', 'Cashflow from Operating Activities'),
(1095, 'payact', 'Payment for Other Operating Activities'),
(1096, 'cash_gand_lie', 'Cash generated from Operating Activities before Changing in Operating Assets & Liabilities'),
(1097, 'casfactive', 'Cashflow from Non Operating Activities'),
(1098, 'cashnonlia', 'Cash generated from Non Operating Activities before Changing in Operating Assets & Liabilities'),
(1099, 'incdre', 'Increase/Decrease in Operating Assets & Liabilities'),
(1100, 'Tincdre', 'Total Increase/Decrease'),
(1101, 'netopenactv', 'Net Cash From Operating/Non Operating Activities'),
(1102, 'cfact', 'Cash Flow from Investing Activities'),
(1103, 'ncuia', 'Net Cash Used Investing Activities'),
(1104, 'cfffa', 'Cash Flow from Financing Activities'),
(1105, 'netcufa', 'Net  Cash Used Financing Activities'),
(1106, 'ncio', 'Net Cash Inflow/Outflow'),
(1107, 'pflos', 'Profit Loss'),
(1108, 'clcEq', 'Closing Cash & Cash Equivalent:'),
(1109, 'TcccE', 'Total Closing Cash & Cash Equivalent'),
(1110, 'pp_by', 'Prepared By'),
(1111, 'act', 'Accounts'),
(1112, 'ausig', 'Authorized Signature'),
(1113, 'particls', 'Particulars'),
(1114, 'back', 'Back'),
(1115, 'bk_vouchar', 'Bank Book Voucher'),
(1116, 'errorajdata', 'Error get data from ajax'),
(1117, 'reach_limit', 'You have reached the limit of adding'),
(1118, 'inpt', 'inputs'),
(1119, 'cantdel', 'There only one row you can\'t delete.'),
(1120, 'slsuplier', 'Select Supplier'),
(1121, 'ptype', 'Payment Type'),
(1122, 'casp', 'Cash Payment'),
(1123, 'bnkp', 'Bank Payment'),
(1124, 'slbank', 'Select Bank'),
(1125, 'cscrv', 'Cash Credit Voucher'),
(1126, 'ac_code', 'Account Code'),
(1127, 'ac_head', 'Account Head'),
(1128, 'iword', 'In word'),
(1129, 'ac_office', 'Accounts Officer'),
(1130, 'latestv', 'Latest version'),
(1131, 'after19', 'Auto Update Feature working On  after 1.9'),
(1132, 'crver', 'Current version'),
(1133, 'notesupdate', 'note: strongly recommended to backup your <b>SOURCE FILE</b> and <b>DATABASE</b> before update.'),
(1134, 'noupdates', 'No Update available'),
(1135, 'lic_pur_key', 'License/Purchase key'),
(1136, 'lifeord', 'Lifetime Orders'),
(1137, 'tdaysell', 'Today Sale'),
(1138, 'tcustomer', 'Total Customer'),
(1139, 'tdeliv', 'Total Delivered'),
(1140, 'treserv', 'Total Reservation'),
(1141, 'latestord', 'Latest Order'),
(1142, 'latest_reser', 'Latest Reservation'),
(1143, 'ord_number', 'Order No.'),
(1144, 'latestolorder', 'Latest Online Order'),
(1145, 'monsalamntorder', 'Monthly Sales Amount and Order'),
(1146, 'onlineofline', 'Online Vs Offline Order & Sales'),
(1147, 'pending_ord', 'Pending Order'),
(1148, 'onlinesamnt', 'Online Sale Amount'),
(1149, 'onlineordnum', 'Online Order Number'),
(1150, 'offsalamnt', 'Offline Sale Amount'),
(1151, 'offlordnum', 'Offline Order Number'),
(1152, 'saleamnt', 'Sale Amount'),
(1153, 'ordnumb', 'Order Number'),
(1154, 'store_name', 'Store Name'),
(1155, 'opent', 'Available On'),
(1156, 'closeTime', 'Closing Time'),
(1157, 'sldistype', 'Select Discount Type'),
(1158, 'distype', 'Discount Type'),
(1159, 'percent', 'Percent'),
(1160, 'sl_se_ch_ty', 'Select Service Charge Type'),
(1161, 'vatset', 'GST Setting(%)'),
(1162, 'mindeltime', 'Min. Delivery Time'),
(1163, 'dateformat', 'Date Format'),
(1164, 'sedateformat', 'Seletet Date Format'),
(1165, 'add_menu_item', 'Add Menu Item'),
(1166, 'menu_title', 'Menu Title'),
(1167, 'can_create', 'Can Create'),
(1168, 'can_read', 'Can Read'),
(1169, 'can_edit', 'Can Edit'),
(1170, 'can_delete', 'Can Delete'),
(1171, 'smsrankgateway', 'To get <b>50</b> free SMS from smsrank.com click'),
(1172, 'ranktext', ' and register in registration section click Already Envato user and put your envato purchase key and product id  after registration put your username and password into the password and user name field this form.'),
(1173, 'managementsection', 'This Section is Use Only for Store Management.'),
(1174, 'width', 'Width'),
(1175, 'protocal', 'Protocol'),
(1176, 'mailpath', 'Mail Path'),
(1177, 'Mail_type', 'Mail Type'),
(1178, 'smtp_host', 'SMTP Host'),
(1179, 'smtp_post', 'SMTP Port'),
(1180, 'sender_email', 'Sender Email'),
(1181, 'smtp_password', 'SMTP Password'),
(1183, 'powered_by', 'Powered By Text'),
(1184, 'item_information', 'Item Information'),
(1185, 'size', 'Size'),
(1186, 'qty', 'Quantity'),
(1187, 'addons_name', 'Add-ons Name '),
(1188, 'addons_qty', 'Add-ons Qty'),
(1190, 'item', 'Item'),
(1191, 'unit_price', 'Unit Price'),
(1192, 'total_price', 'Total Price'),
(1193, 'order_status', 'Order Status'),
(1194, 'served', 'Served'),
(1195, 'cancel_reason', 'Cancel Reason'),
(1196, 'customer_order', 'Customer Notes'),
(1197, 'customerpicktime', 'Customer Pick-up Date and time'),
(1199, 'service_chrg', 'Service Charge'),
(1200, 'customer_paid_amount', 'Customer Paid Amount'),
(1201, 'change_due', 'Change Due'),
(1202, 'total_due', 'Total Due'),
(1203, 'powerbybdtask', 'Powered  By: BDTASK, www.bdtask.com'),
(1204, 'recept', 'Receipt  No'),
(1205, 'orderno', 'Order No.'),
(1206, 'ref_page', 'Refresh Page'),
(1207, 'orderid', 'Order ID'),
(1208, 'all', 'All'),
(1209, 'vat_tax1', 'GST/Tax'),
(1210, 'ord_uodate_success', 'Order Update Successfully!!!'),
(1211, 'do_print_token', 'Do you Want to Print Token No.???'),
(1212, 'req_failed', 'Request Failed, Please check your code and try again!'),
(1213, 'ord_places', 'Order Placed Successfully'),
(1214, 'do_print_in', 'Do you Want to Print Invoice???'),
(1215, 'ord_complte', 'Order Completed'),
(1216, 'ord_com_sucs', 'Order Completed Successfully'),
(1217, 'token_no', 'Token NO'),
(1218, 'qr-order', 'QR Order'),
(1219, 'cuschange', 'Customer Change'),
(1220, 'order_successfully_placed', 'Order Has Been Placed Successfully!'),
(1221, 'kitchen_setting', 'kitchen Setting'),
(1222, 'kitchen_name', 'Kitchen Name'),
(1223, 'kitchen_user_assign', 'Assign Kitchen User'),
(1224, 'kitchen_list', 'Kitchen List'),
(1225, 'add_kitchen', 'Add Kitchen'),
(1226, 'kitchen_assign', 'Kitchen Assign'),
(1227, 'kitchen_edit', 'Kitchen Edit'),
(1228, 'please_try_again_userassign', 'This user is already assign in this kitchen'),
(1229, 'select_kitchen', 'Select Kitchen'),
(1230, 'memberid', 'Member ID'),
(1231, 'member_name', 'Member Name'),
(1232, 'add_member', 'Add New Member'),
(1233, 'update_member', 'Update Member'),
(1234, 'member_list', 'Member List'),
(1236, 'meminfo', 'Member Manage'),
(1237, 'blocked', 'Blocked'),
(1238, 'memberid_exist', 'Member ID Already Exists. Please Try Another.'),
(1239, 'add_new_payment_type', 'Add New Payment Method'),
(1240, 'sell_report_items', 'Items Sales Report'),
(1241, 'sell_report_waiters', 'Waiters Sales Report'),
(1242, 'sell_report_delvirytype', 'Delivery Type Sales Report'),
(1243, 'sell_report_casher', 'Sale Report Cashier'),
(1244, 'ready_all_ietm', 'All Item Ready'),
(1245, 'unpaid_sell', 'Unpaid Sale'),
(1246, 'kitchen_sell', 'Kitchen Sales Report'),
(1247, 'order_total', 'Total Order '),
(1248, 'scharge_report', 'Service Charge Report '),
(1249, 'seo_setting', 'SEO Setting'),
(1250, 'seo_title', 'Title'),
(1251, 'seo_keyword', 'Keyword'),
(1252, 'seo_description', 'Description'),
(1257, 'buy_now', 'Buy Now'),
(1264, 'purchase_key', 'Purchase Key'),
(1271, 'kitchen_status', 'Kitchen Status'),
(1278, 'habittrack', 'Customer Habit List'),
(1279, 'review_rating', 'Review & Rating'),
(1280, 'pos_setting', 'POS Setting'),
(1286, 'month', 'Month'),
(1287, 'sl_option', 'Select Option'),
(1288, 'sl_product', 'Search Product'),
(1289, 'quickorder', 'Quick Order'),
(1290, 'placeorder', 'Place Order'),
(1291, 'type_slorder', 'Type and Select Order'),
(1292, 'mergeord', 'Merge Order'),
(1293, 'Processingod', 'Processing...'),
(1294, 'sLengthMenu', 'Display _MENU_ records per page'),
(1295, 'sInfo', 'Showing _START_ to _END_ of _TOTAL_ entries'),
(1296, 'sInfoEmpty', 'Showing 0 to 0 of 0 entries'),
(1297, 'sInfoFiltered', '(Filtered from _MAX_ Total Records)'),
(1298, 'sLoadingRecords', 'Loading...'),
(1299, 'sZeroRecords', 'Nothing found - sorry'),
(1300, 'sEmptyTable', 'No Data Available in Table'),
(1301, 'sFirst', 'First'),
(1302, 'sLast', 'Last'),
(1303, 'sPrevious', 'Previous'),
(1304, 'sNext', 'Next'),
(1305, 'sSortAscending', 'Activate to sort column ascending'),
(1306, 'sSortDescending', 'Activate to Sort Column Descending'),
(1307, '_sign', 'Show %d Rows'),
(1308, '_0sign', 'No Row Selected'),
(1309, '_1sign', '1 Line Selected'),
(1310, 'copy', 'Copy'),
(1312, 'excel', 'Excel'),
(1313, 'pdf', 'Pdf'),
(1314, 'colvis', 'Column Visibility'),
(1316, 'no_orderfound', 'No Order Found!!!'),
(1317, 'prepared', 'Prepared'),
(1318, 'accept', 'Accept'),
(1319, 'reject', 'Reject'),
(1320, 'ready', 'Ready'),
(1321, 'processing', 'Processing'),
(1322, 'kitnotacpt', 'Kitchen Not Accept'),
(1425, 'person', 'Person'),
(1426, 'before_time', 'Running Time'),
(1427, 'select_this_table', 'Select This Table'),
(1428, 'seat', 'Seat'),
(1429, 'seat_time', 'Time'),
(1430, '+', 'Add'),
(1431, 'clear', 'Clear'),
(1432, 'no_customer', 'No Customer'),
(1433, 'table_map', 'Table Map'),
(1434, 'add', 'Add'),
(1435, 'itemsincart', 'Item(s) in Cart'),
(1436, 'view_cart', 'View Cart'),
(1437, 'morderlist', 'My Order List'),
(1438, 'edit', 'Edit'),
(1439, 'foodde', 'Food Details'),
(1440, 'cartlist', 'Cart List'),
(1441, 'subtotal', 'Subtotal'),
(1442, 'ordnote', 'Order Notes'),
(1443, 'upsummery', 'Update Summery'),
(1444, 'upsumlist', 'Update Summery List'),
(1445, 'mkpayment', 'Make Payment'),
(1446, 'foodnote', 'Food Note'),
(1447, 'addnotesi', 'Add Note'),
(1448, 'thirdparty_orderid', 'Third-party Order ID'),
(1456, 'themes', 'Themes'),
(1457, 'menu_type', 'Menu Type'),
(1458, 'add_menu_type', 'Add Menu Type'),
(1459, 'menutype_edit', 'Menu Type Edit'),
(1460, 'menu_type_name', 'Menu Type'),
(1461, 'storetime', 'Manage Store Time'),
(1462, 'day_name', 'Day'),
(1463, 'saturday', 'Saturday'),
(1464, 'sunday', 'Sunday'),
(1465, 'monday', 'Monday'),
(1466, 'tuesday', 'Tuesday'),
(1467, 'wednesday', 'Wednesday'),
(1468, 'thursday', 'Thursday'),
(1469, 'friday', 'Friday'),
(1470, 'footer_logo', 'Footer Logo'),
(1471, 'contact_us', 'Contact Us'),
(1472, 'opening_time', 'Available On'),
(1473, 'ourstore', 'Our Store'),
(1474, 'call_reservation', 'Call for Reservations'),
(1475, 'item_available', 'Items Available'),
(1479, 'membership_card', 'Bar Code'),
(1480, 'barcode_start', 'From Barcode'),
(1481, 'barcode_end', 'To Barcode'),
(1494, 'commission', 'Commission'),
(1495, 'sale_by_table', 'Sale By Table'),
(1496, 'stock_limit', 'Re-Stock Level'),
(1497, 'ingredients', 'Ingredients'),
(1498, 'stock_out_ingredients', 'Stock Out Ingredients'),
(1499, 'office_addres1', 'Office Address'),
(1500, 'call_us', 'Call Us'),
(1501, 'email_us', 'Email Us'),
(1502, 'upload_theme', 'Upload Theme'),
(1503, 'discount_type', 'Discount Type'),
(1504, 'confirm_password', 'Confirm Password'),
(1559, 'wastemangment', 'Waste Management'),
(1590, 'add_group_item', 'Add Group Item'),
(1591, 'update_group_item', 'Update Group Item'),
(1592, 'production_setting', 'Production Setting'),
(1593, 'select_auto', 'Select auto Production'),
(1594, 'split', 'Split'),
(1595, 'tinvat', 'TIN OR GST NUM.'),
(1596, 'bill', 'Bill'),
(1597, 'checkin', 'Check In'),
(1598, 'checkout', 'Check Out'),
(1599, 'totalpayment', 'Total payment'),
(1600, 'thanssuport', 'Thank You for Your Support'),
(1601, 'thanks_you', 'Thank you very much'),
(1602, 'opening_balance', 'Opening Balance'),
(1603, 'transaction_date', 'Date'),
(1604, 'voucher_type', 'Voucher Type'),
(1605, 'particulars', 'Head Name'),
(1606, 'total_empolyee', 'Total Employee'),
(1607, 'apply_day', 'Days'),
(1608, 'loan_no', 'Loan No.'),
(1609, 'add_floor', 'Add Floor'),
(1610, 'floor_name', 'Floor Name'),
(1611, 'edit_floor', 'Edit Floor'),
(1612, 'floor_list', 'Floor List'),
(1613, 'floor_select', 'Floor Select'),
(1614, 'add_to_cart_more', 'Add Multiple Variant'),
(1615, 'kitchen_printers', 'Kitchen printer Setting'),
(1616, 'printer_list', 'Printer List'),
(1617, 'add_printer', 'Add Printer'),
(1618, 'ip_port', 'Your Online URL'),
(1625, 'counter_list', 'Counter List'),
(1626, 'add_counter', 'Add Counter'),
(1627, 'edit_counter', 'Edit Counter'),
(1628, 'counter_no', 'Counter Number'),
(1629, 'add_opening_balance', 'Add Opening Balance'),
(1630, 'add_closing_balance', 'Add Closing Balance'),
(1632, 'sell_report_cashregister', 'Cash Register Report'),
(1633, 'closing_balance', 'Closing Balance'),
(1634, 'factory_reset', 'Factory Reset'),
(1635, 'fresettext', 'Note: Strongly recommended to backup your SOURCE file and DATABASE before resetting because all transactional data will be cleared after running the factory reset.'),
(1636, 'bill_by', 'Bill By'),
(1640, 'type_table', 'Type and Select Table'),
(1648, 'sound_setting', 'Sound Setting'),
(1649, 'is_sound', 'Is Sound Enable'),
(1650, 'upload_notify', 'Upload Notification Sound'),
(1651, 'upload_order', 'Upload order Add Sound'),
(1655, 'room_list', 'Room List'),
(1656, 'add_room', 'Add Room'),
(1657, 'room_no', 'Room No'),
(1658, 'room_qr', 'All Room QR'),
(1659, 'restaurant_closed', 'Restaurant is Closed!!'),
(1660, 'closed_msg', 'You order Only when restaurant is open. Our opening and closing Time is:'),
(1661, 'privactp', 'Privacy Policy'),
(1662, 'terms_condition', 'Terms & conditions'),
(1663, 'refundp', 'Refund Policies'),
(1664, 'reservation_on_off', 'Reservation On Off'),
(1665, 'unavailable_day', 'Unavailable Day'),
(1666, 'unavaildate', 'Unavailable Date'),
(1667, 'add_unavailablity', 'Add Unavailability'),
(1668, 'edit_unavailablity', 'Edit Unavailability'),
(1669, 'unavailable_time', 'Unavailable Time'),
(1670, 'max_reserveperson', 'Max Reserve Person'),
(1671, 'reservasetting', 'Reservation Setting'),
(1672, 'webon', 'Website ON'),
(1673, 'weboff', 'Website Off'),
(1674, 'webdisable', 'Web site ON/Off'),
(1675, 'placr_setting', 'Place order Setting'),
(1676, 'quick_ord', 'Quick Order Setting'),
(1677, 'shippingtime', 'Shipping Date & Time'),
(1678, 'search_food_item', 'Search Food Item'),
(1679, 'search_category', 'Search Category'),
(1680, 'check_availablity', 'Check Availability'),
(1681, 'subscribe_paragraph', 'Subscribe to Receive Our Weekly Promotion'),
(1682, 'shipping_method', 'Shipping Method'),
(1683, 'please_select_shipping_method', 'Please Select Shipping Method'),
(1684, 'autoupdate', 'Auto Update'),
(1685, 'coa_head', 'COA Head'),
(1686, 'apps_addons', 'Apps Add-ons'),
(1687, 'download_apps_playstore', 'Please Download Apps on Playstore'),
(1688, 'kitchen_app', 'Kitchen App'),
(1689, 'waiter_app', 'Waiter App'),
(1690, 'customer_app', 'Customer App'),
(1691, 'if_you_need_the_above_all_apps', 'If you need the above all apps, please feel free to contact us.'),
(1692, 'do_you_want_proceed', 'Do You Want to Proceed?'),
(1693, 'is_offer', 'Offer'),
(1694, 'is_special', 'Special'),
(1695, 'is_custome_quantity', 'Custom Quantity'),
(1696, 'kitchenitemsell', 'Kitchen Sell'),
(1697, 'due_marge', 'Due Merge'),
(1698, 'book_table', 'Book Table'),
(1699, 'reserve_table', 'Reserve Table'),
(1700, 'see_more', 'See More'),
(1701, 'food_name', 'Food Name'),
(1702, 'category', 'Category'),
(1703, 'search', 'Search'),
(1704, 'read_more', 'Read more'),
(1705, 'item_has_been_successfully_added', 'Item has been successfully added'),
(1706, 'add_to_cart', 'add to cart'),
(1707, 'view_full_menu', 'View Full Menu'),
(1709, 'subscribe_to_newsletter', 'Subscribe to Newsletter'),
(1710, 'subscribe', 'subscribe'),
(1711, 'get_directions', 'Get Directions'),
(1712, 'teams_of_use', 'Teams of use'),
(1713, 'privacy_policy', 'Privacy Policy'),
(1714, 'contact', 'Contact'),
(1715, 'please_enter_your_email', 'Please Enter Your email !!'),
(1716, 'please_enter_valid_email', 'Please enter a valid Email'),
(1717, 'thanks_for_subscription', 'Thanks for Subscription'),
(1718, 'note_added', 'Note Added'),
(1719, 'posting_failed', 'Posting failed'),
(1720, 'our_service_is_closed_on_this_date_and_time', 'Our service is Closed on this date and time !!!'),
(1721, 'reservation_time_closed_try_later', 'Reservation Time is closed!! Please try later.'),
(1722, 'select_date', 'Please select date'),
(1723, 'select_time', 'Please select Time'),
(1724, 'enter_number_of_people', 'Please enter the number of people'),
(1725, 'select_after_hour_current_time', 'Please select after 1 hour to Current time'),
(1726, 'no_free_seat_to_the_reservation', 'Currently, there is no free seat to the reservation'),
(1727, 'search_topics_or_keywords', 'Search topics or keywords'),
(1728, 'no_data_found', 'No Data Found'),
(1729, 'please_wait', 'Please Wait'),
(1730, 'reservation_contact', 'Contact No.'),
(1731, 'reservation_time', 'Expected Time'),
(1732, 'reservation_date', 'Expected Date'),
(1733, 'reservation_person', 'Total Person'),
(1734, 'deal_of_the_day', 'Deal of the day'),
(1735, 'cart', 'Cart'),
(1736, 'unavailable', 'Unavailable'),
(1737, 'write_comments', 'Write Your Comments'),
(1738, 'get_in_touch', 'Get In Touch'),
(1739, 'forgot_password', 'Forgot Password'),
(1740, 'shopping_details_information_msg', 'If you have shopped with us before, please enter your details in the boxes below.'),
(1741, 'remember_me', 'Remember Me'),
(1742, 'or', 'OR'),
(1743, 'register', 'Register'),
(1744, 'enter_your_phone_or_email', 'Please enter your Phone or Email.'),
(1745, 'password_not_empty', 'Password Not Empty.'),
(1746, 'failed_login_msg', 'Failed Login: Check your Email and password!'),
(1747, 'email_not_registered_msg', 'Failed: Email has not been registered yet.!!!'),
(1748, 'have_been_sent_email', 'Success: We have been sent an email to this'),
(1749, 'check_your_new_password', 'Email Address. Please check your New Password..!!!'),
(1750, 'profile_picture', 'Profile Picture'),
(1751, 'my_profile', 'My Profile'),
(1752, 'my_reservation', 'My Reservation'),
(1753, 'profile_update', 'Profile Update'),
(1754, 'name', 'Name'),
(1755, 'returning_customer', 'Returning customer?'),
(1756, 'click_login', 'Click here to login'),
(1757, 'checkout_msg', 'If you have shopped with us before, please enter your details in the boxes below. If you are a new customer, please proceed to the Billing & Shipping section.'),
(1758, 'username_or_email', 'Username or Email'),
(1759, 'billing_address', 'Billing Address'),
(1760, 'select_country', 'Select Country'),
(1761, 'select_state', 'Select State'),
(1762, 'town_city', 'Town / City'),
(1763, 'select_city', 'Select City'),
(1764, 'street_address', 'Street Address'),
(1765, 'postcode_zip', 'Postcode / ZIP'),
(1766, 'create_account', 'Create an Account?'),
(1767, 'create_account_password', 'Create account password'),
(1768, 'shipping_different_address', 'Ship to a Different Address?'),
(1769, 'your_order', 'Your Order'),
(1770, 'product', 'Product'),
(1771, 'total_vat', 'Total GST'),
(1772, 'coupon_discount', 'Coupon Discount'),
(1773, 'service', 'Service'),
(1774, 'tag', 'Tag'),
(1775, 'review', 'Review'),
(1776, 'average_user_rating', 'Average User Rating'),
(1777, 'rating_breakdown', 'Rating Breakdown'),
(1778, 'complete_success', '100% Complete (success)'),
(1779, '80_complete_primary', '80% Complete (primary)'),
(1780, '60_complete_info', '60% Complete (info)'),
(1781, '40_complete_warning', '40% Complete (warning)'),
(1782, '20_complete_danger', '20% Complete (danger)'),
(1783, 'rate_it', 'Rate It'),
(1784, 'french_chicken_burger_tomato_sauce', 'French Chicken Burger With Hot tomato Sauce'),
(1785, 'review_submit', 'Review Submit'),
(1786, 'related_items', 'Related Items'),
(1787, 'pickup', 'Pickup'),
(1788, 'dine_in', 'Dine-in'),
(1789, 'enter_coupon_code', 'Enter coupon code'),
(1790, '00_15_min', '00:15 MIN'),
(1791, 'go_to_checkout', 'Go to Checkout'),
(1798, 'timezone', 'Time Zome'),
(1799, 'discountrate', 'Discount Rate'),
(1800, 'vat', 'Gst'),
(1801, 'loan_issue_id', 'Loan Issue ID'),
(1802, 'repayment', 'Re-payment'),
(1803, 'loan_report_details', 'Loan Details'),
(1804, 'balance_sheet', 'Balance Sheet'),
(1813, 'purdate', 'Purchase Date'),
(1814, 'expdate', 'Expiry Date'),
(1815, 'parent_cat', 'Parent Category'),
(1816, 'set_productioncost', 'Set Production Cost Per Unit'),
(1817, 'set_productionunit', 'Set Production Unit'),
(1818, 'production_set', 'Production Set'),
(1819, 'production_set_for', 'Production Set For'),
(1820, 'serving_unit', 'Serving Unit'),
(1821, 'kit_dashoard_setting', 'Kitchen Dashboard Setting'),
(1822, 'kot_reftime', 'Kitchen Refresh time In Second'),
(1823, 'bulk_upload', 'Bulk Upload'),
(1824, 'upload_food_csv', 'Upload Food Item csv'),
(2202, 'appcartempty', 'Your Cart is empty!!!.Please add some food.'),
(2203, 'apporderempty', 'You Order List is empty!!! Please Place A Order First!!!'),
(2244, 'topselleingitem', 'Top selling Item'),
(2252, 'logininfo', 'Login Info'),
(2253, 'newuser', 'New User'),
(2254, 'orloginwith', 'or login with'),
(2255, 'registerinfo', 'Registration Info'),
(2256, 'register_txt', 'If you have shopped with us before, please enter your details in the boxes below.'),
(2257, 'customerinfo', 'Customer Info'),
(2258, 'delvtype', 'Delivery Type'),
(2259, 'delv_date', 'Delivery Date'),
(2260, 'delvtime', 'Delivery Time'),
(2261, 'yourcart', 'Your Cart'),
(2262, 'items', 'items'),
(2263, 'delivarycrg', 'Delivery charge'),
(2264, 'offercodegift', 'Offer code / gift card code'),
(2265, 'apply', 'Apply'),
(2266, 'proceedtocart', 'Proceed to Checkout'),
(2267, 'delv_address', 'Delivary address List'),
(2268, 'create_address', 'Create Address'),
(2269, 'seeallmenu', 'See all menu'),
(2270, 'sendymsg', 'Send Your Message'),
(2271, 'send_us', 'Send Us Message'),
(2297, 'number_of_tax', 'Number of tax'),
(2300, 'tax_name', 'Tax Name'),
(2302, 'closing_note', 'Closing Note'),
(2304, 'close_resister_and_print_summery', 'Close Resister and print Summery'),
(2305, 'previous', 'Previous'),
(2306, 'unpaid', 'Unpaid'),
(2307, 'check_item', 'Check Item'),
(2308, 'check_item_message', 'Please check at least one item!!'),
(2309, 'yes', 'Yes'),
(2311, 'time_over', 'Time Over'),
(2312, 'add_phrase', 'Add Phrase'),
(2313, 'crd_terminal_message', 'Please Select Card Terminal!!!'),
(2314, 'language_list', 'Language List'),
(2315, 'commission_setting', 'Commission Setting'),
(2316, 'pending', 'Pending'),
(2317, 'current_register', 'Current Register'),
(2318, 'due', 'Due'),
(2319, 'due_invoice', 'Due Invoice'),
(2320, 'payable_amount', 'Payable Amount'),
(2321, 'isinclusivetax', 'Is Tax Inclusive?'),
(2322, 'showhidevattin', 'Show/Hide(GST/TIN)'),
(2323, 'custfldname', 'Custom Field Name'),
(2324, 'custfldtype', 'Custom Field Type'),
(2325, 'customvalue', 'Custom Value'),
(2326, 'cash_in_hand', 'Cash In Hand'),
(2327, 'booked', 'Booked'),
(2328, 'realease', 'Release\r\n'),
(2329, 'liveortest', 'Live Or Test'),
(2330, 'live', 'Live Mode'),
(2331, 'test_mode', 'Test Mode'),
(2346, 'offer_rate', 'Offer Percentage');

-- --------------------------------------------------------

--
-- Table structure for table `leave_apply`
--

CREATE TABLE `leave_apply` (
  `leave_appl_id` int(11) NOT NULL,
  `employee_id` varchar(20) NOT NULL,
  `leave_type_id` int(11) NOT NULL,
  `apply_strt_date` varchar(20) NOT NULL,
  `apply_end_date` varchar(20) NOT NULL,
  `apply_day` int(11) NOT NULL,
  `leave_aprv_strt_date` varchar(20) NOT NULL,
  `leave_aprv_end_date` varchar(20) NOT NULL,
  `num_aprv_day` varchar(15) NOT NULL,
  `reason` varchar(100) NOT NULL,
  `apply_hard_copy` text DEFAULT NULL,
  `apply_date` varchar(20) NOT NULL,
  `approve_date` varchar(20) NOT NULL,
  `approved_by` varchar(30) NOT NULL,
  `leave_type` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `leave_type`
--

CREATE TABLE `leave_type` (
  `leave_type_id` int(11) NOT NULL,
  `leave_type` varchar(50) NOT NULL,
  `leave_days` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `loan_installment`
--

CREATE TABLE `loan_installment` (
  `loan_inst_id` int(11) NOT NULL,
  `employee_id` varchar(21) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `loan_id` varchar(21) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `installment_amount` varchar(20) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `payment` varchar(20) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `date` varchar(20) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `received_by` varchar(20) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `installment_no` varchar(20) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL DEFAULT '1',
  `notes` varchar(80) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `marital_info`
--

CREATE TABLE `marital_info` (
  `id` int(11) NOT NULL,
  `marital_sta` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `marital_info`
--

INSERT INTO `marital_info` (`id`, `marital_sta`) VALUES
(1, 'Single'),
(2, 'Married'),
(3, 'Divorced'),
(4, 'Widowed'),
(5, 'Other');

-- --------------------------------------------------------

--
-- Table structure for table `measurement_units`
--

CREATE TABLE `measurement_units` (
  `id` int(10) NOT NULL,
  `uomid` int(10) NOT NULL,
  `quantity` decimal(10,2) NOT NULL,
  `quantity_measure` enum('ml','gm') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `measurement_units`
--

INSERT INTO `measurement_units` (`id`, `uomid`, `quantity`, `quantity_measure`) VALUES
(1, 10, 10.00, 'gm'),
(2, 12, 20.00, 'gm'),
(3, 8, 250.00, 'ml'),
(4, 7, 50.00, 'gm');

-- --------------------------------------------------------

--
-- Table structure for table `membership`
--

CREATE TABLE `membership` (
  `id` int(11) NOT NULL,
  `membership_name` varchar(250) NOT NULL,
  `discount` float NOT NULL,
  `other_facilities` varchar(255) NOT NULL,
  `create_by` int(11) NOT NULL,
  `create_date` date NOT NULL,
  `update_by` int(11) NOT NULL,
  `update_date` date NOT NULL,
  `startpoint` int(11) NOT NULL,
  `endpoint` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

--
-- Dumping data for table `membership`
--

INSERT INTO `membership` (`id`, `membership_name`, `discount`, `other_facilities`, `create_by`, `create_date`, `update_by`, `update_date`, `startpoint`, `endpoint`) VALUES
(1, 'Normal User', 0, '', 2, '2018-11-07', 2, '2018-11-07', 0, 0),
(2, 'Premium Member', 0, '', 1, '2020-11-04', 0, '0000-00-00', 250, 999),
(3, 'VIP', 0, '', 1, '2020-11-04', 0, '0000-00-00', 1001, 5000000);

-- --------------------------------------------------------

--
-- Table structure for table `menu_add_on`
--

CREATE TABLE `menu_add_on` (
  `row_id` bigint(20) NOT NULL,
  `menu_id` int(11) NOT NULL,
  `add_on_id` int(11) NOT NULL,
  `modifier_groupid` int(11) DEFAULT NULL,
  `min` int(11) NOT NULL DEFAULT 0,
  `max` int(11) NOT NULL DEFAULT 0,
  `isreq` int(11) NOT NULL DEFAULT 0,
  `sortby` int(11) NOT NULL DEFAULT 0,
  `is_active` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

--
-- Dumping data for table `menu_add_on`
--

INSERT INTO `menu_add_on` (`row_id`, `menu_id`, `add_on_id`, `modifier_groupid`, `min`, `max`, `isreq`, `sortby`, `is_active`) VALUES
(1, 31, 0, 1, 0, 0, 0, 0, 1),
(4, 6, 0, 1, 0, 0, 0, 0, 1),
(8, 17, 0, 1, 0, 0, 0, 0, 1),
(11, 88, 0, 1, 0, 0, 0, 0, 1),
(12, 87, 0, 1, 0, 0, 0, 0, 1),
(13, 77, 0, 6, 0, 1, 0, 0, 1),
(14, 77, 0, 1, 0, 0, 0, 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `menu_group_modifiers`
--

CREATE TABLE `menu_group_modifiers` (
  `id` int(11) NOT NULL,
  `menu_group_id` int(11) NOT NULL,
  `modifier_id` int(11) NOT NULL,
  `is_default` tinyint(1) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `menu_modifier_groups`
--

CREATE TABLE `menu_modifier_groups` (
  `id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL,
  `group_id` int(11) NOT NULL,
  `sort_order` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `menu_pdf_materials`
--

CREATE TABLE `menu_pdf_materials` (
  `id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL,
  `menu_slug` varchar(70) NOT NULL,
  `pdf_file` varchar(255) NOT NULL,
  `btn_text` varchar(255) DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `pdf_group_id` bigint(20) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `menu_pdf_materials`
--

INSERT INTO `menu_pdf_materials` (`id`, `menu_id`, `menu_slug`, `pdf_file`, `btn_text`, `status`, `created_at`, `pdf_group_id`) VALUES
(1, 5, 'our-menu', '1750050936_menu1.pdf', 'Download Dining Menu', 1, '2025-06-16 10:45:37', 1750050937),
(2, 5, 'our-menu', '1750050999_menu2.pdf', 'Download Take Away Menu', 1, '2025-06-16 10:46:39', 1750050999),
(3, 9, 'services', '1750051039_Punjabi_palace_Function_MENU_16042025_copy.pdf', 'Download Banquet Menu', 1, '2025-06-16 10:47:19', 1750051039),
(4, 5, 'our-menu', '1750051039_Punjabi_palace_Function_MENU_16042025_copy.pdf', 'Download Banquet Menu', 1, '2025-06-16 10:47:19', 1750051039);

-- --------------------------------------------------------

--
-- Table structure for table `message`
--

CREATE TABLE `message` (
  `id` int(11) NOT NULL,
  `sender_id` int(11) NOT NULL,
  `receiver_id` int(11) NOT NULL,
  `subject` varchar(255) NOT NULL,
  `message` text NOT NULL,
  `datetime` datetime NOT NULL,
  `sender_status` tinyint(1) NOT NULL DEFAULT 0 COMMENT '0=unseen, 1=seen, 2=delete',
  `receiver_status` tinyint(1) NOT NULL DEFAULT 0 COMMENT '0=unseen, 1=seen, 2=delete'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `modifiers`
--

CREATE TABLE `modifiers` (
  `id` int(11) NOT NULL,
  `group_id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `cost_price` decimal(10,2) DEFAULT 0.00,
  `sell_price` decimal(10,2) DEFAULT 0.00,
  `is_default` tinyint(1) DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `modifier_groups`
--

CREATE TABLE `modifier_groups` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `description` varchar(255) DEFAULT NULL,
  `is_required` tinyint(1) DEFAULT 0,
  `min_selection` int(11) DEFAULT 0,
  `isMealDeal` int(11) NOT NULL DEFAULT 0,
  `meal_deal_item_id` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `modifier_groups`
--

INSERT INTO `modifier_groups` (`id`, `name`, `description`, `is_required`, `min_selection`, `isMealDeal`, `meal_deal_item_id`, `created_at`, `updated_at`) VALUES
(1, 'Spice Level', '', 0, 0, 0, 0, '2025-07-22 08:48:18', '2025-07-22 08:48:18'),
(2, 'Donness', '', 0, 0, 0, 0, '2025-07-22 08:50:08', '2025-07-22 08:50:08'),
(3, 'Breads', '', 0, 0, 0, 0, '2025-07-22 08:53:44', '2025-07-22 08:53:44'),
(4, 'Test Modifier', '', 0, 0, 0, 0, '2025-07-24 12:09:08', '2025-07-24 12:09:36'),
(5, 'Rice', '', 0, 0, 1, 5, '2025-07-29 16:44:34', '2025-07-29 16:45:27'),
(6, 'ACCOMPANIMENTS', '', 0, 0, 0, 1, '2025-08-04 15:32:43', '2025-08-04 15:32:43');

-- --------------------------------------------------------

--
-- Table structure for table `module`
--

CREATE TABLE `module` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `description` text DEFAULT NULL,
  `image` varchar(255) NOT NULL,
  `directory` varchar(100) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `module_permission`
--

CREATE TABLE `module_permission` (
  `id` int(11) NOT NULL,
  `fk_module_id` int(11) NOT NULL,
  `fk_user_id` int(11) NOT NULL,
  `create` tinyint(1) DEFAULT NULL,
  `read` tinyint(1) DEFAULT NULL,
  `update` tinyint(1) DEFAULT NULL,
  `delete` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `module_purchase_key`
--

CREATE TABLE `module_purchase_key` (
  `id` int(11) NOT NULL,
  `identity` varchar(250) DEFAULT NULL,
  `purchase_key` varchar(255) DEFAULT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `multipay_bill`
--

CREATE TABLE `multipay_bill` (
  `multipay_id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `multipayid` varchar(30) DEFAULT NULL,
  `payment_type_id` int(11) NOT NULL,
  `amount` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

--
-- Dumping data for table `multipay_bill`
--

INSERT INTO `multipay_bill` (`multipay_id`, `order_id`, `multipayid`, `payment_type_id`, `amount`) VALUES
(1, 1, NULL, 4, 26.01),
(2, 4, NULL, 4, 34.47),
(3, 6, NULL, 4, 65.565),
(4, 5, NULL, 4, 57.465),
(5, 7, NULL, 4, 76.23),
(6, 12, NULL, 4, 17.055),
(7, 10, NULL, 4, 13.5),
(8, 11, NULL, 4, 51.525),
(9, 8, NULL, 4, 14.355),
(10, 9, NULL, 4, 34.47),
(11, 14, NULL, 4, 34.47),
(12, 15, NULL, 4, 17.055),
(13, 13, NULL, 4, 42.471),
(14, 16, NULL, 4, -4.05),
(15, 16, NULL, 4, 0.405),
(16, 17, NULL, 4, 30.555),
(17, 18, NULL, 4, 31.41),
(18, 19, NULL, 4, 49.365),
(19, 20, NULL, 4, 46.665),
(20, 21, NULL, 4, 34.47),
(21, 22, NULL, 4, 34.47),
(22, 27, NULL, 4, 17.055),
(23, 26, NULL, 4, 17.055),
(24, 25, NULL, 4, 11.655),
(25, 24, NULL, 4, 27),
(26, 23, NULL, 4, 68.94),
(27, 34, NULL, 4, 63.27),
(28, 33, NULL, 4, 34.47),
(29, 34, NULL, 4, -6.327),
(30, 34, NULL, 4, 57.576),
(31, 33, NULL, 4, -3.447),
(32, 34, NULL, 4, -11.455),
(33, 34, NULL, 4, 52.977),
(34, 34, NULL, 4, -15.612),
(35, 30, NULL, 4, 17.055),
(36, 28, NULL, 4, 17.055),
(37, 28, NULL, 4, 15),
(38, 28, NULL, 4, 15),
(39, 33, NULL, 4, 31.368),
(40, 29, NULL, 4, 17.055),
(41, 31, NULL, 4, 13.455),
(42, 32, NULL, 4, 34.47),
(43, 34, NULL, 4, 49.243),
(44, 40, NULL, 4, 34.5),
(45, 39, NULL, 4, 13.5),
(46, 38, NULL, 4, 28.8),
(47, 37, NULL, 4, 28.8),
(48, 36, NULL, 4, 34.47),
(49, 35, NULL, 4, 34.47),
(50, 42, NULL, 4, 8.2225),
(51, 42, NULL, 4, 8.2225),
(52, 42, NULL, 4, 8.2225),
(53, 42, NULL, 4, 8.2225),
(54, 41, NULL, 4, 12.7967),
(55, 41, NULL, 4, 12.7967),
(56, 42, NULL, 4, 8.2225),
(57, 42, NULL, 4, 8.2225),
(58, 42, NULL, 4, 8.2225),
(59, 42, NULL, 4, 13.455),
(60, 41, NULL, 4, 12),
(61, 41, NULL, 4, 12),
(62, 41, NULL, 4, 12),
(63, 41, NULL, 4, 12),
(64, 41, NULL, 4, 0),
(65, 44, NULL, 4, 61.965),
(66, 1, NULL, 4, 17.055),
(67, 5, NULL, 4, 42.845),
(68, 6, NULL, 4, 74.565);

-- --------------------------------------------------------

--
-- Table structure for table `ordered_menu_item_modifiers`
--

CREATE TABLE `ordered_menu_item_modifiers` (
  `id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL,
  `variant_id` int(11) NOT NULL DEFAULT 0 COMMENT 'Relevant for foods only',
  `add_on_id` int(11) NOT NULL,
  `modifier_groupid` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `foods_or_mods` int(11) NOT NULL DEFAULT 2 COMMENT '1 = For Foods\r\n2 = For Mods',
  `meal_deal_id` int(11) NOT NULL DEFAULT 0,
  `is_active` int(11) NOT NULL DEFAULT 1 COMMENT '1 = Active, 0 = Inactive',
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `ordered_menu_item_modifiers`
--

INSERT INTO `ordered_menu_item_modifiers` (`id`, `menu_id`, `variant_id`, `add_on_id`, `modifier_groupid`, `order_id`, `foods_or_mods`, `meal_deal_id`, `is_active`, `created_at`) VALUES
(1, 31, 0, 2, 1, 1, 2, 0, 1, '2025-07-22 14:33:11'),
(2, 6, 0, 2, 1, 12, 2, 0, 1, '2025-07-28 21:32:41'),
(3, 6, 0, 3, 1, 12, 2, 0, 1, '2025-07-28 21:32:41'),
(4, 99, 0, 19, 5, 16, 2, 0, 1, '2025-07-29 22:21:00'),
(5, 99, 0, 23, 5, 16, 2, 0, 1, '2025-07-29 22:21:00'),
(6, 99, 0, 10, 3, 16, 2, 0, 1, '2025-07-29 22:21:00'),
(7, 6, 0, 2, 1, 26, 2, 0, 1, '2025-07-31 13:58:08'),
(8, 6, 0, 1, 1, 8, 2, 0, 1, '2025-08-05 12:03:59');

-- --------------------------------------------------------

--
-- Table structure for table `order_item_modifiers`
--

CREATE TABLE `order_item_modifiers` (
  `id` int(11) NOT NULL,
  `order_menu_id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL,
  `modifier_id` int(11) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `quantity` int(11) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `order_menu`
--

CREATE TABLE `order_menu` (
  `row_id` bigint(20) NOT NULL,
  `order_id` bigint(20) NOT NULL,
  `menu_id` int(11) NOT NULL,
  `price` decimal(19,3) DEFAULT 0.000,
  `groupmid` int(11) DEFAULT 0,
  `notes` varchar(255) DEFAULT NULL,
  `menuqty` float NOT NULL,
  `add_on_id` varchar(100) NOT NULL,
  `addonsqty` varchar(100) NOT NULL,
  `varientid` int(11) NOT NULL,
  `groupvarient` int(11) DEFAULT NULL,
  `addonsuid` int(11) DEFAULT NULL,
  `qroupqty` int(11) DEFAULT NULL,
  `isgroup` int(11) DEFAULT 0,
  `food_status` int(11) DEFAULT 0,
  `allfoodready` int(11) DEFAULT NULL,
  `isupdate` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

--
-- Dumping data for table `order_menu`
--

INSERT INTO `order_menu` (`row_id`, `order_id`, `menu_id`, `price`, `groupmid`, `notes`, `menuqty`, `add_on_id`, `addonsqty`, `varientid`, `groupvarient`, `addonsuid`, `qroupqty`, `isgroup`, `food_status`, `allfoodready`, `isupdate`) VALUES
(1, 1, 4, 18.950, 0, '', 1, '', '', 107, NULL, 4107, NULL, 0, 1, 1, NULL),
(2, 2, 38, 23.950, 0, '', 1, '', '', 50, NULL, 3850, NULL, 0, 0, NULL, NULL),
(3, 3, 7, 18.950, 0, '', 1, '', '', 111, NULL, 7111, NULL, 0, 0, NULL, NULL),
(4, 4, 36, 23.950, 0, 'Abcd', 2, '', '', 48, NULL, 3648, NULL, 0, 0, NULL, NULL),
(5, 5, 54, 24.950, 0, 'chix', 1, '', '', 66, NULL, 5466, NULL, 0, 0, NULL, NULL),
(6, 5, 73, 29.690, 0, '', 1, '', '', 140, NULL, 73140, NULL, 0, 0, NULL, NULL),
(7, 5, 120, 6.950, 0, '', 1, '', '', 186, NULL, 120186, NULL, 0, 0, NULL, NULL),
(8, 5, 15, 9.950, 0, '', 1, '', '', 120, NULL, 15120, NULL, 0, 0, NULL, NULL),
(9, 5, 141, 14.000, 0, NULL, 1, '', '', 207, NULL, 141207, NULL, 0, 0, NULL, NULL),
(10, 6, 32, 22.950, 0, '', 1, '', '', 44, NULL, 3244, NULL, 0, 1, 1, NULL),
(11, 6, 37, 22.950, 0, '', 1, '', '', 49, NULL, 3749, NULL, 0, 1, 1, NULL),
(12, 6, 86, 26.950, 0, '', 1, '', '', 98, NULL, 8698, NULL, 0, 1, 1, NULL),
(13, 6, 167, 10.000, 0, '', 1, '', '', 239, NULL, 167239, NULL, 0, 1, 1, NULL),
(14, 7, 73, 38.300, 0, '', 1, '', '', 140, NULL, 73140, NULL, 0, 0, NULL, NULL),
(15, 7, 102, 5.950, 0, '', 2, '', '', 226, NULL, 102226, NULL, 0, 0, NULL, NULL),
(16, 7, 75, 32.000, 0, '', 1, '', '', 142, NULL, 75142, NULL, 0, 0, NULL, NULL),
(17, 7, 76, 38.300, 0, '', 1, '', '', 143, NULL, 76143, NULL, 0, 0, NULL, NULL),
(18, 7, 79, 15.000, 0, '', 1, '', '', 146, NULL, 79146, NULL, 0, 0, NULL, NULL),
(19, 7, 80, 15.000, 0, '', 1, '', '', 147, NULL, 80147, NULL, 0, 0, NULL, NULL),
(20, 8, 6, 18.950, 0, 'not chilly', 3, '', '', 160, NULL, 6160, NULL, 0, 0, NULL, NULL),
(21, 9, 75, 32.000, 0, 'no coconut', 1, '', '', 142, NULL, 75142, NULL, 0, 0, NULL, NULL),
(22, 10, 75, 32.000, 0, 'no coconut', 1, '', '', 142, NULL, 75142, NULL, 0, 0, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `paymentsetup`
--

CREATE TABLE `paymentsetup` (
  `setupid` int(11) NOT NULL,
  `paymentid` int(11) NOT NULL,
  `marchantid` varchar(255) DEFAULT NULL,
  `password` varchar(120) NOT NULL,
  `email` varchar(100) DEFAULT NULL,
  `currency` varchar(20) NOT NULL,
  `Islive` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `edit_url` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

--
-- Dumping data for table `paymentsetup`
--

INSERT INTO `paymentsetup` (`setupid`, `paymentid`, `marchantid`, `password`, `email`, `currency`, `Islive`, `status`, `edit_url`) VALUES
(1, 5, 'bdtas5e772deb8ff87', 'bdtas5e772deb8ff87@ssl', 'ainalcse@gmail.com', 'BDT', 0, 1, NULL),
(2, 3, '', '', 'tareq7500personal2@gmail.com', 'USD', 0, 1, NULL),
(3, 2, '901400787', '', 'ainalcse@gmail.com', 'USD', 0, 1, NULL),
(4, 6, '002020000000001', '002020000000001_KEY1', '1', '', 0, 1, NULL),
(5, 7, 'BE10000072', 'BE10000072', 'karmadorji@gmail.com', 'BTN', 0, 1, NULL),
(6, 8, 'sandbox-sq0idb-ShIOgPUIHSXxsjCPG4oh_A', 'EAAAEE3gxSvOVaHIq-5A5P_yFkUbkAfUM2-JiQju2FTxQ4n7epxmvKpaOhECxHcN', '5SNY8GNKAZM00', 'AUD', 0, 1, NULL),
(7, 9, 'sk_test_ol4WUcbGsqxNJItpeOi1ecDT00k5mDyC2G', 'pk_test_TrVFpmZBkgasCE6WTPkZgMPr00UzVVOqgp', 'ainalcse@gmail.com', 'USD', 0, 1, NULL),
(8, 10, 'sk_test_71353c2613675acb967ea532f4c4c8105ea175b8', 'pk_test_328da55755b88b1aaed96c5cda215b2fd887edb9', 'ainalcse@gmail.com', 'NGN', 0, 1, NULL),
(9, 11, NULL, '', '', '', 0, 0, NULL),
(10, 12, '7BUkXCbuHDcx1ZyQqmcKVtsLnFxF0r3f', 'vmUIfeoHXpZSKc20Wt50d6hqeIY5FcWtFR6prg0Ubak8IvmmZEFDDpQr5ZMEdnoS', '', 'XAF', 0, 1, NULL),
(12, 13, 'sandbox-5rd4uUC2yAz7LWDaalyJAOEsH2rxrqVB', 'sandbox-FsKRCZpk0BpdUss3wVsNLhvs5Ty5PSpi', '', 'BDT', 0, 1, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `payment_method`
--

CREATE TABLE `payment_method` (
  `payment_method_id` tinyint(4) NOT NULL,
  `payment_method` varchar(100) NOT NULL,
  `is_active` tinyint(1) NOT NULL,
  `modulename` varchar(50) CHARACTER SET utf8mb3 COLLATE utf8mb3_estonian_ci NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

--
-- Dumping data for table `payment_method`
--

INSERT INTO `payment_method` (`payment_method_id`, `payment_method`, `is_active`, `modulename`) VALUES
(1, 'Card Payment', 0, ''),
(2, 'Two Checkout', 0, ''),
(3, 'Paypal', 0, ''),
(4, 'Cash Payment', 1, ''),
(5, 'SSLCommerz', 0, ''),
(6, 'SIPS Office', 0, ''),
(7, 'RMA PAYMENT GATEWAY', 0, ''),
(8, 'Square Payments', 0, ''),
(9, 'Stripe Payment', 0, ''),
(10, 'Paystack Payments', 0, ''),
(11, 'Paytm Payments', 0, ''),
(12, 'Orange Money payment', 0, ''),
(13, 'iyzico', 0, '');

-- --------------------------------------------------------

--
-- Table structure for table `payroll_commission_setting`
--

CREATE TABLE `payroll_commission_setting` (
  `id` int(11) NOT NULL,
  `pos_id` int(11) NOT NULL,
  `rate` int(11) NOT NULL,
  `create_by` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `payroll_holiday`
--

CREATE TABLE `payroll_holiday` (
  `payrl_holi_id` int(10) UNSIGNED NOT NULL,
  `holiday_name` varchar(30) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `start_date` varchar(30) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `end_date` varchar(30) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `no_of_days` varchar(30) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `created_by` varchar(30) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `updated_by` varchar(30) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `payroll_tax_setup`
--

CREATE TABLE `payroll_tax_setup` (
  `tax_setup_id` int(10) UNSIGNED NOT NULL,
  `start_amount` varchar(30) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `end_amount` varchar(30) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `rate` varchar(30) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `status` varchar(30) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pay_frequency`
--

CREATE TABLE `pay_frequency` (
  `id` int(11) NOT NULL,
  `frequency_name` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `pay_frequency`
--

INSERT INTO `pay_frequency` (`id`, `frequency_name`) VALUES
(1, 'Weekly'),
(2, 'Biweekly'),
(3, 'Annual'),
(4, 'Monthly');

-- --------------------------------------------------------

--
-- Table structure for table `position`
--

CREATE TABLE `position` (
  `pos_id` int(10) UNSIGNED NOT NULL,
  `position_name` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `position_details` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

--
-- Dumping data for table `position`
--

INSERT INTO `position` (`pos_id`, `position_name`, `position_details`) VALUES
(1, 'chef', 'Responsible for the pastry shop in a foodservice establishment. Ensures that the products produced in the pastry shop meet the quality standards in conjunction with the executive chef.'),
(2, 'HRM', 'Recruits and hires qualified employees, creates in-house job-training programs, and assists employees with their career needs.'),
(3, 'Kitchen manager', 'Supervises and coordinates activities concerning all back-of-the-house operations and personnel, including food preparation, kitchen and storeroom areas.'),
(4, 'Counter server', 'Responsible for providing quick and efficient service to customers. Greets customers, takes their food and beverage orders, rings orders into register, and prepares and serves hot and cold drinks.'),
(6, 'Waiter', 'Most waiters and waitresses, also called servers, work in full-service restaurants. They greet customers, take food orders, bring food and drinks to the tables and take payment and make change.'),
(7, 'Accounts', 'Play a key role in every restaurant. '),
(8, 'Salesman', 'A salesman is someone who works in sales, with the main function of selling products or services to others either by visiting locations');

-- --------------------------------------------------------

--
-- Table structure for table `price_schedules`
--

CREATE TABLE `price_schedules` (
  `ScheduleID` int(11) NOT NULL,
  `PriceLevel` varchar(50) NOT NULL,
  `EffectiveDate` date NOT NULL,
  `Description` text DEFAULT NULL,
  `CategoryID` int(11) DEFAULT NULL,
  `Items` longtext DEFAULT NULL,
  `BasedOn` varchar(50) DEFAULT NULL,
  `BasePrice` varchar(50) DEFAULT NULL,
  `CalculationMethod` varchar(50) DEFAULT NULL,
  `Percentage` decimal(5,2) DEFAULT 0.00,
  `RoundingMethod` varchar(50) DEFAULT NULL,
  `RoundToNearest` decimal(5,2) DEFAULT 0.00,
  `AdjustedBy` decimal(5,2) DEFAULT 0.00,
  `UserIDInserted` int(11) DEFAULT 0,
  `DateInserted` datetime DEFAULT current_timestamp(),
  `schedule_flag` tinyint(1) NOT NULL DEFAULT 0 COMMENT '0 = Not applied, 1 = Applied',
  `cron_run_datetime` datetime DEFAULT NULL COMMENT 'Date and time when cron applied price changes',
  `is_enabled` tinyint(1) NOT NULL DEFAULT 1 COMMENT '1 = Enabled, 0 = Disabled'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

--
-- Dumping data for table `price_schedules`
--

INSERT INTO `price_schedules` (`ScheduleID`, `PriceLevel`, `EffectiveDate`, `Description`, `CategoryID`, `Items`, `BasedOn`, `BasePrice`, `CalculationMethod`, `Percentage`, `RoundingMethod`, `RoundToNearest`, `AdjustedBy`, `UserIDInserted`, `DateInserted`, `schedule_flag`, `cron_run_datetime`, `is_enabled`) VALUES
(1, '1', '2025-07-24', '', 10, '[{\"product_id\":\"70\",\"product_name\":\"Half Tandoori Chicken\",\"item_code\":\"HATC\",\"category\":\"Tandoori Special\",\"price\":\"16.95\",\"prices\":{\"1\":\"16.95\",\"2\":\"0.00\",\"3\":\"0.00\"},\"cost_price\":\"0.00\",\"last_cost\":\"0.00\",\"average_cost\":\"0.00\",\"new_price\":\"33.90\",\"adjustment\":\"0.00\",\"margin\":\"100.00\"},{\"product_id\":\"71\",\"product_name\":\"Full Tandoori Chicken\",\"item_code\":\"FUTC\",\"category\":\"Tandoori Special\",\"price\":\"25.95\",\"prices\":{\"1\":\"25.95\",\"2\":\"0.00\",\"3\":\"0.00\"},\"cost_price\":\"0.00\",\"last_cost\":\"0.00\",\"average_cost\":\"0.00\",\"new_price\":\"51.90\",\"adjustment\":\"0.00\",\"margin\":\"100.00\"},{\"product_id\":\"72\",\"product_name\":\"Tandoori Platter For 2\",\"item_code\":\"TAPF2\",\"category\":\"Tandoori Special\",\"price\":\"26.95\",\"prices\":{\"1\":\"26.95\",\"2\":\"0.00\",\"3\":\"0.00\"},\"cost_price\":\"0.00\",\"last_cost\":\"0.00\",\"average_cost\":\"0.00\",\"new_price\":\"53.90\",\"adjustment\":\"0.00\",\"margin\":\"100.00\"}]', 'sp', NULL, 'Percentage Markup', 100.00, 'none', 0.00, 0.00, 2, '2025-07-24 14:46:34', 0, NULL, 0),
(2, '1', '2025-07-24', 'my schedule', 5, '[{\"product_id\":\"16\",\"product_name\":\"Onion Bhaji Pakora (4 per serve)\",\"item_code\":\"ONBP\",\"category\":\"Small Plates\",\"price\":\"9.95\",\"prices\":{\"1\":\"9.95\",\"2\":\"0.00\",\"3\":\"0.00\"},\"cost_price\":\"0.00\",\"last_cost\":\"0.00\",\"average_cost\":\"0.00\",\"new_price\":\"20.00\",\"adjustment\":\"0.10\",\"margin\":\"101.01\"},{\"product_id\":\"17\",\"product_name\":\"Alu Bonda (3 per serve)\",\"item_code\":\"ALB\",\"category\":\"Small Plates\",\"price\":\"9.95\",\"prices\":{\"1\":\"9.95\",\"2\":\"0.00\",\"3\":\"0.00\"},\"cost_price\":\"0.00\",\"last_cost\":\"0.00\",\"average_cost\":\"0.00\",\"new_price\":\"20.00\",\"adjustment\":\"0.10\",\"margin\":\"101.01\"},{\"product_id\":\"18\",\"product_name\":\"Paneer Pakora (4 per serve)\",\"item_code\":\"PAP\",\"category\":\"Small Plates\",\"price\":\"12.95\",\"prices\":{\"1\":\"12.95\",\"2\":\"0.00\",\"3\":\"0.00\"},\"cost_price\":\"0.00\",\"last_cost\":\"0.00\",\"average_cost\":\"0.00\",\"new_price\":\"26.00\",\"adjustment\":\"0.10\",\"margin\":\"100.77\"}]', 'sp', NULL, 'Percentage Markup', 100.00, 'none', 0.00, 0.10, 2, '2025-07-24 15:06:20', 0, NULL, 0),
(3, '2', '2025-07-24', 'Testing', 11, '[{\"product_id\":\"73\",\"product_name\":\"Saffron Rice\",\"item_code\":\"SAR\",\"category\":\"Rice\",\"price\":\"5.95\",\"prices\":{\"1\":\"5.95\",\"2\":\"0.00\",\"3\":\"0.00\"},\"cost_price\":\"0.00\",\"last_cost\":\"0.00\",\"average_cost\":\"0.00\",\"new_price\":\"0.10\",\"adjustment\":\"0.10\",\"margin\":\"0.00\"},{\"product_id\":\"74\",\"product_name\":\"Jeera Rice\",\"item_code\":\"JER\",\"category\":\"Rice\",\"price\":\"7.95\",\"prices\":{\"1\":\"7.95\",\"2\":\"0.00\",\"3\":\"0.00\"},\"cost_price\":\"0.00\",\"last_cost\":\"0.00\",\"average_cost\":\"0.00\",\"new_price\":\"0.10\",\"adjustment\":\"0.10\",\"margin\":\"0.00\"},{\"product_id\":\"75\",\"product_name\":\"Coconut Rice\",\"item_code\":\"COR\",\"category\":\"Rice\",\"price\":\"7.95\",\"prices\":{\"1\":\"7.95\",\"2\":\"0.00\",\"3\":\"0.00\"},\"cost_price\":\"0.00\",\"last_cost\":\"0.00\",\"average_cost\":\"0.00\",\"new_price\":\"0.10\",\"adjustment\":\"0.10\",\"margin\":\"0.00\"},{\"product_id\":\"76\",\"product_name\":\"Pulao Rice\",\"item_code\":\"PUR\",\"category\":\"Rice\",\"price\":\"7.95\",\"prices\":{\"1\":\"7.95\",\"2\":\"0.00\",\"3\":\"0.00\"},\"cost_price\":\"0.00\",\"last_cost\":\"0.00\",\"average_cost\":\"0.00\",\"new_price\":\"0.10\",\"adjustment\":\"0.10\",\"margin\":\"0.00\"}]', 'sp', NULL, 'Percentage Markup', 100.00, 'none', 0.00, 0.10, 2, '2025-07-24 15:11:30', 0, NULL, 1),
(4, '1', '2025-07-25', 'Testing purpose', NULL, '[{\"product_id\":\"70\",\"product_name\":\"Half Tandoori Chicken\",\"item_code\":\"HATC\",\"category\":\"Tandoori Special\",\"price\":\"16.95\",\"prices\":{\"1\":\"16.95\",\"2\":\"0.00\",\"3\":\"0.00\"},\"cost_price\":\"0.00\",\"last_cost\":\"0.00\",\"average_cost\":\"0.00\",\"new_price\":\"33.90\",\"adjustment\":\"0.00\",\"margin\":\"100.00\"},{\"product_id\":\"71\",\"product_name\":\"Full Tandoori Chicken\",\"item_code\":\"FUTC\",\"category\":\"Tandoori Special\",\"price\":\"25.95\",\"prices\":{\"1\":\"25.95\",\"2\":\"0.00\",\"3\":\"0.00\"},\"cost_price\":\"0.00\",\"last_cost\":\"0.00\",\"average_cost\":\"0.00\",\"new_price\":\"51.90\",\"adjustment\":\"0.00\",\"margin\":\"100.00\"},{\"product_id\":\"72\",\"product_name\":\"Tandoori Platter For 2\",\"item_code\":\"TAPF2\",\"category\":\"Tandoori Special\",\"price\":\"26.95\",\"prices\":{\"1\":\"26.95\",\"2\":\"0.00\",\"3\":\"0.00\"},\"cost_price\":\"0.00\",\"last_cost\":\"0.00\",\"average_cost\":\"0.00\",\"new_price\":\"53.90\",\"adjustment\":\"0.00\",\"margin\":\"100.00\"}]', 'sp', NULL, 'Percentage Markup', 100.00, 'none', 0.00, 0.00, 2, '2025-07-24 17:46:19', 1, '2025-07-25 19:53:08', 1),
(5, '1', '2025-07-28', 'fdsfdsfs', 11, '[{\"product_id\":\"74\",\"product_name\":\"Jeera Rice\",\"item_code\":\"JER\",\"category\":\"Rice\",\"price\":\"7.95\",\"prices\":{\"1\":\"7.95\",\"2\":\"0.00\",\"3\":\"0.00\"},\"cost_price\":\"0.00\",\"last_cost\":\"0.00\",\"average_cost\":\"0.00\"},{\"product_id\":\"75\",\"product_name\":\"Coconut Rice\",\"item_code\":\"COR\",\"category\":\"Rice\",\"price\":\"7.95\",\"prices\":{\"1\":\"7.95\",\"2\":\"0.00\",\"3\":\"0.00\"},\"cost_price\":\"0.00\",\"last_cost\":\"0.00\",\"average_cost\":\"0.00\"}]', 'sp', '1', 'Percentage Markup', 50.00, 'none', 0.00, 0.07, 2, '2025-07-24 18:55:29', 1, '2025-07-28 14:03:20', 1),
(6, '1', '2025-07-25', '', 11, '[{\"product_id\":\"76\",\"product_name\":\"Pulao Rice\",\"item_code\":\"PUR\",\"category\":\"Rice\",\"price\":\"7.95\",\"prices\":{\"1\":\"7.95\",\"2\":\"0.00\",\"3\":\"0.00\"},\"cost_price\":\"0.00\",\"last_cost\":\"0.00\",\"average_cost\":\"0.00\",\"new_price\":\"15.90\",\"adjustment\":\"0.00\",\"margin\":\"100.00\"}]', 'sp', '1', 'Percentage Markup', 100.00, 'none', 0.00, 0.00, 2, '2025-07-24 19:16:25', 1, '2025-07-25 19:53:08', 1),
(7, '1', '2025-07-25', 'testing', 11, '[{\"product_id\":\"73\",\"product_name\":\"Saffron Rice\",\"item_code\":\"SAR\",\"category\":\"Rice\",\"price\":\"5.95\",\"prices\":{\"1\":\"5.95\",\"2\":\"0.00\",\"3\":\"0.00\"},\"cost_price\":\"0.00\",\"last_cost\":\"0.00\",\"average_cost\":\"0.00\",\"new_price\":\"11.90\",\"adjustment\":\"0.00\",\"margin\":\"100.00\"},{\"product_id\":\"74\",\"product_name\":\"Jeera Rice\",\"item_code\":\"JER\",\"category\":\"Rice\",\"price\":\"0.00\",\"prices\":{\"1\":\"0.00\",\"2\":\"0.00\",\"3\":\"0.00\"},\"cost_price\":\"0.00\",\"last_cost\":\"0.00\",\"average_cost\":\"0.00\",\"new_price\":\"0.00\",\"adjustment\":\"0.00\",\"margin\":\"100.00\"},{\"product_id\":\"75\",\"product_name\":\"Coconut Rice\",\"item_code\":\"COR\",\"category\":\"Rice\",\"price\":\"0.00\",\"prices\":{\"1\":\"0.00\",\"2\":\"0.00\",\"3\":\"0.00\"},\"cost_price\":\"0.00\",\"last_cost\":\"0.00\",\"average_cost\":\"0.00\",\"new_price\":\"0.00\",\"adjustment\":\"0.00\",\"margin\":\"100.00\"},{\"product_id\":\"76\",\"product_name\":\"Pulao Rice\",\"item_code\":\"PUR\",\"category\":\"Rice\",\"price\":\"15.90\",\"prices\":{\"1\":\"15.90\",\"2\":\"0.00\",\"3\":\"0.00\"},\"cost_price\":\"0.00\",\"last_cost\":\"0.00\",\"average_cost\":\"0.00\",\"new_price\":\"31.80\",\"adjustment\":\"0.00\",\"margin\":\"100.00\"}]', 'sp', '1', 'Percentage Markup', 100.00, 'none', 0.00, 0.00, 2, '2025-07-24 19:18:11', 1, '2025-07-25 19:53:08', 1),
(8, '1', '2025-07-29', 'testing', NULL, '[{\"product_id\":\"73\",\"product_name\":\"Saffron Rice\",\"item_code\":\"SAR\",\"category\":\"Rice\",\"price\":\"11.90\",\"prices\":{\"1\":\"11.90\",\"2\":\"0.00\",\"3\":\"0.00\"},\"cost_price\":\"0.00\",\"last_cost\":\"0.00\",\"average_cost\":\"0.00\",\"new_price\":\"26.90\",\"adjustment\":\"0.00\",\"margin\":\"126.05\"},{\"product_id\":\"74\",\"product_name\":\"Jeera Rice\",\"item_code\":\"JER\",\"category\":\"Rice\",\"price\":\"0.00\",\"prices\":{\"1\":\"0.00\",\"2\":\"0.00\",\"3\":\"0.00\"},\"cost_price\":\"0.00\",\"last_cost\":\"0.00\",\"average_cost\":\"0.00\",\"new_price\":\"15.00\",\"adjustment\":\"0.00\",\"margin\":\"0.00\"},{\"product_id\":\"75\",\"product_name\":\"Coconut Rice\",\"item_code\":\"COR\",\"category\":\"Rice\",\"price\":\"0.00\",\"prices\":{\"1\":\"0.00\",\"2\":\"0.00\",\"3\":\"0.00\"},\"cost_price\":\"0.00\",\"last_cost\":\"0.00\",\"average_cost\":\"0.00\",\"new_price\":\"15.00\",\"adjustment\":\"0.00\",\"margin\":\"0.00\"},{\"product_id\":\"76\",\"product_name\":\"Pulao Rice\",\"item_code\":\"PUR\",\"category\":\"Rice\",\"price\":\"31.80\",\"prices\":{\"1\":\"31.80\",\"2\":\"0.00\",\"3\":\"0.00\"},\"cost_price\":\"0.00\",\"last_cost\":\"0.00\",\"average_cost\":\"0.00\",\"new_price\":\"46.80\",\"adjustment\":\"0.00\",\"margin\":\"47.17\"}]', 'sp', NULL, 'Amount Markup', 15.00, 'none', 0.00, 0.00, 2, '2025-07-24 19:20:23', 1, '2025-07-29 14:02:11', 1),
(9, '2', '2025-07-26', 'testing', 11, '[{\"product_id\":\"73\",\"product_name\":\"Saffron Rice\",\"item_code\":\"SAR\",\"category\":\"Rice\",\"price\":\"0.00\",\"prices\":{\"1\":\"11.90\",\"2\":\"0.00\",\"3\":\"0.00\"},\"cost_price\":\"0.00\",\"last_cost\":\"0.00\",\"average_cost\":\"0.00\",\"new_price\":\"20.00\",\"adjustment\":\"0.00\",\"margin\":\"0.00\"},{\"product_id\":\"74\",\"product_name\":\"Jeera Rice\",\"item_code\":\"JER\",\"category\":\"Rice\",\"price\":\"0.00\",\"prices\":{\"1\":\"0.00\",\"2\":\"0.00\",\"3\":\"0.00\"},\"cost_price\":\"0.00\",\"last_cost\":\"0.00\",\"average_cost\":\"0.00\",\"new_price\":\"20.00\",\"adjustment\":\"0.00\",\"margin\":\"0.00\"},{\"product_id\":\"75\",\"product_name\":\"Coconut Rice\",\"item_code\":\"COR\",\"category\":\"Rice\",\"price\":\"0.00\",\"prices\":{\"1\":\"0.00\",\"2\":\"0.00\",\"3\":\"0.00\"},\"cost_price\":\"0.00\",\"last_cost\":\"0.00\",\"average_cost\":\"0.00\",\"new_price\":\"20.00\",\"adjustment\":\"0.00\",\"margin\":\"0.00\"},{\"product_id\":\"76\",\"product_name\":\"Pulao Rice\",\"item_code\":\"PUR\",\"category\":\"Rice\",\"price\":\"0.00\",\"prices\":{\"1\":\"31.80\",\"2\":\"0.00\",\"3\":\"0.00\"},\"cost_price\":\"0.00\",\"last_cost\":\"0.00\",\"average_cost\":\"0.00\",\"new_price\":\"20.00\",\"adjustment\":\"0.00\",\"margin\":\"0.00\"}]', 'sp', '2', 'Amount Markup', 20.00, 'none', 0.00, 0.00, 2, '2025-07-24 20:01:25', 0, NULL, 1),
(10, '2', '2025-07-26', 'testing', 11, '[{\"product_id\":\"73\",\"product_name\":\"Saffron Rice\",\"item_code\":\"SAR\",\"category\":\"Rice\",\"price\":\"0.00\",\"prices\":{\"1\":\"11.90\",\"2\":\"0.00\",\"3\":\"20.00\"},\"cost_price\":\"0.00\",\"last_cost\":\"0.00\",\"average_cost\":\"0.00\",\"new_price\":\"12.00\",\"adjustment\":\"0.00\",\"margin\":\"0.00\"},{\"product_id\":\"74\",\"product_name\":\"Jeera Rice\",\"item_code\":\"JER\",\"category\":\"Rice\",\"price\":\"0.00\",\"prices\":{\"1\":\"0.00\",\"2\":\"0.00\",\"3\":\"20.00\"},\"cost_price\":\"0.00\",\"last_cost\":\"0.00\",\"average_cost\":\"0.00\",\"new_price\":\"12.00\",\"adjustment\":\"0.00\",\"margin\":\"0.00\"},{\"product_id\":\"75\",\"product_name\":\"Coconut Rice\",\"item_code\":\"COR\",\"category\":\"Rice\",\"price\":\"0.00\",\"prices\":{\"1\":\"0.00\",\"2\":\"0.00\",\"3\":\"20.00\"},\"cost_price\":\"0.00\",\"last_cost\":\"0.00\",\"average_cost\":\"0.00\",\"new_price\":\"12.00\",\"adjustment\":\"0.00\",\"margin\":\"0.00\"},{\"product_id\":\"76\",\"product_name\":\"Pulao Rice\",\"item_code\":\"PUR\",\"category\":\"Rice\",\"price\":\"0.00\",\"prices\":{\"1\":\"31.80\",\"2\":\"0.00\",\"3\":\"20.00\"},\"cost_price\":\"0.00\",\"last_cost\":\"0.00\",\"average_cost\":\"0.00\",\"new_price\":\"12.00\",\"adjustment\":\"0.00\",\"margin\":\"0.00\"}]', 'sp', '2', 'Amount Markup', 12.00, 'none', 0.00, 0.00, 2, '2025-07-24 20:05:45', 0, NULL, 1),
(11, '3', '2025-07-28', 'testing', 11, '[{\"product_id\":\"73\",\"product_name\":\"Saffron Rice\",\"item_code\":\"SAR\",\"category\":\"Rice\",\"price\":\"20.00\",\"prices\":{\"1\":\"11.90\",\"2\":\"12.00\",\"3\":\"20.00\"},\"cost_price\":\"0.00\",\"last_cost\":\"0.00\",\"average_cost\":\"0.00\",\"new_price\":\"18.00\",\"adjustment\":\"0.00\",\"margin\":\"-10.00\"},{\"product_id\":\"74\",\"product_name\":\"Jeera Rice\",\"item_code\":\"JER\",\"category\":\"Rice\",\"price\":\"20.00\",\"prices\":{\"1\":\"0.00\",\"2\":\"12.00\",\"3\":\"20.00\"},\"cost_price\":\"0.00\",\"last_cost\":\"0.00\",\"average_cost\":\"0.00\",\"new_price\":\"18.00\",\"adjustment\":\"0.00\",\"margin\":\"-10.00\"},{\"product_id\":\"75\",\"product_name\":\"Coconut Rice\",\"item_code\":\"COR\",\"category\":\"Rice\",\"price\":\"20.00\",\"prices\":{\"1\":\"0.00\",\"2\":\"12.00\",\"3\":\"20.00\"},\"cost_price\":\"0.00\",\"last_cost\":\"0.00\",\"average_cost\":\"0.00\",\"new_price\":\"18.00\",\"adjustment\":\"0.00\",\"margin\":\"-10.00\"},{\"product_id\":\"76\",\"product_name\":\"Pulao Rice\",\"item_code\":\"PUR\",\"category\":\"Rice\",\"price\":\"20.00\",\"prices\":{\"1\":\"31.80\",\"2\":\"12.00\",\"3\":\"20.00\"},\"cost_price\":\"0.00\",\"last_cost\":\"0.00\",\"average_cost\":\"0.00\",\"new_price\":\"18.00\",\"adjustment\":\"0.00\",\"margin\":\"-10.00\"}]', 'sp', '3', 'Percentage Markup', -10.00, 'none', 0.00, 0.00, 2, '2025-07-24 20:07:17', 0, NULL, 1),
(12, '3', '2025-07-29', 'testing', 11, '[{\"product_id\":\"73\",\"product_name\":\"Saffron Rice\",\"item_code\":\"SAR\",\"category\":\"Rice\",\"price\":\"20.00\",\"prices\":{\"1\":\"11.90\",\"2\":\"12.00\",\"3\":\"20.00\"},\"cost_price\":\"0.00\",\"last_cost\":\"0.00\",\"average_cost\":\"0.00\",\"new_price\":\"21.00\",\"adjustment\":\"0.00\",\"margin\":\"5.00\"},{\"product_id\":\"74\",\"product_name\":\"Jeera Rice\",\"item_code\":\"JER\",\"category\":\"Rice\",\"price\":\"20.00\",\"prices\":{\"1\":\"0.00\",\"2\":\"12.00\",\"3\":\"20.00\"},\"cost_price\":\"0.00\",\"last_cost\":\"0.00\",\"average_cost\":\"0.00\",\"new_price\":\"21.00\",\"adjustment\":\"0.00\",\"margin\":\"5.00\"},{\"product_id\":\"75\",\"product_name\":\"Coconut Rice\",\"item_code\":\"COR\",\"category\":\"Rice\",\"price\":\"20.00\",\"prices\":{\"1\":\"0.00\",\"2\":\"12.00\",\"3\":\"20.00\"},\"cost_price\":\"0.00\",\"last_cost\":\"0.00\",\"average_cost\":\"0.00\",\"new_price\":\"21.00\",\"adjustment\":\"0.00\",\"margin\":\"5.00\"},{\"product_id\":\"76\",\"product_name\":\"Pulao Rice\",\"item_code\":\"PUR\",\"category\":\"Rice\",\"price\":\"20.00\",\"prices\":{\"1\":\"31.80\",\"2\":\"12.00\",\"3\":\"20.00\"},\"cost_price\":\"0.00\",\"last_cost\":\"0.00\",\"average_cost\":\"0.00\",\"new_price\":\"21.00\",\"adjustment\":\"0.00\",\"margin\":\"5.00\"}]', 'sp', '3', 'Percentage Markup', 5.00, 'none', 0.00, 0.00, 2, '2025-07-24 20:08:39', 0, NULL, 1),
(13, '3', '2025-07-26', 'testing', 11, '[{\"product_id\":\"73\",\"product_name\":\"Saffron Rice\",\"item_code\":\"SAR\",\"category\":\"Rice\",\"price\":\"20.00\",\"prices\":{\"1\":\"11.90\",\"2\":\"12.00\",\"3\":\"20.00\"},\"cost_price\":\"0.00\",\"last_cost\":\"0.00\",\"average_cost\":\"0.00\",\"new_price\":\"15.00\",\"adjustment\":\"0.00\",\"margin\":\"-25.00\"},{\"product_id\":\"74\",\"product_name\":\"Jeera Rice\",\"item_code\":\"JER\",\"category\":\"Rice\",\"price\":\"20.00\",\"prices\":{\"1\":\"0.00\",\"2\":\"12.00\",\"3\":\"20.00\"},\"cost_price\":\"0.00\",\"last_cost\":\"0.00\",\"average_cost\":\"0.00\",\"new_price\":\"15.00\",\"adjustment\":\"0.00\",\"margin\":\"-25.00\"},{\"product_id\":\"75\",\"product_name\":\"Coconut Rice\",\"item_code\":\"COR\",\"category\":\"Rice\",\"price\":\"20.00\",\"prices\":{\"1\":\"0.00\",\"2\":\"12.00\",\"3\":\"20.00\"},\"cost_price\":\"0.00\",\"last_cost\":\"0.00\",\"average_cost\":\"0.00\",\"new_price\":\"15.00\",\"adjustment\":\"0.00\",\"margin\":\"-25.00\"},{\"product_id\":\"76\",\"product_name\":\"Pulao Rice\",\"item_code\":\"PUR\",\"category\":\"Rice\",\"price\":\"20.00\",\"prices\":{\"1\":\"31.80\",\"2\":\"12.00\",\"3\":\"20.00\"},\"cost_price\":\"0.00\",\"last_cost\":\"0.00\",\"average_cost\":\"0.00\",\"new_price\":\"15.00\",\"adjustment\":\"0.00\",\"margin\":\"-25.00\"}]', 'sp', '3', 'Percentage Markup', -25.00, 'none', 0.00, 0.00, 2, '2025-07-24 20:10:41', 0, NULL, 1),
(14, '3', '2025-07-28', 'Testing', 11, '[{\"product_id\":\"73\",\"product_name\":\"Saffron Rice\",\"item_code\":\"SAR\",\"category\":\"Rice\",\"price\":\"15.00\",\"prices\":{\"1\":\"11.90\",\"2\":\"12.00\",\"3\":\"15.00\"},\"cost_price\":\"0.00\",\"last_cost\":\"0.00\",\"average_cost\":\"0.00\",\"new_price\":\"17.00\",\"adjustment\":\"0.50\",\"margin\":\"13.33\"},{\"product_id\":\"74\",\"product_name\":\"Jeera Rice\",\"item_code\":\"JER\",\"category\":\"Rice\",\"price\":\"15.00\",\"prices\":{\"1\":\"0.00\",\"2\":\"12.00\",\"3\":\"15.00\"},\"cost_price\":\"0.00\",\"last_cost\":\"0.00\",\"average_cost\":\"0.00\",\"new_price\":\"17.00\",\"adjustment\":\"0.50\",\"margin\":\"13.33\"},{\"product_id\":\"75\",\"product_name\":\"Coconut Rice\",\"item_code\":\"COR\",\"category\":\"Rice\",\"price\":\"15.00\",\"prices\":{\"1\":\"0.00\",\"2\":\"12.00\",\"3\":\"15.00\"},\"cost_price\":\"0.00\",\"last_cost\":\"0.00\",\"average_cost\":\"0.00\",\"new_price\":\"17.00\",\"adjustment\":\"0.50\",\"margin\":\"13.33\"},{\"product_id\":\"76\",\"product_name\":\"Pulao Rice\",\"item_code\":\"PUR\",\"category\":\"Rice\",\"price\":\"15.00\",\"prices\":{\"1\":\"31.80\",\"2\":\"12.00\",\"3\":\"15.00\"},\"cost_price\":\"0.00\",\"last_cost\":\"0.00\",\"average_cost\":\"0.00\",\"new_price\":\"17.00\",\"adjustment\":\"0.50\",\"margin\":\"13.33\"}]', 'sp', '3', 'Percentage Markup', 10.00, 'none', 0.00, 0.50, 2, '2025-07-24 20:34:54', 0, NULL, 1),
(15, '2', '2025-07-29', 'testing', 11, '[{\"product_id\":\"73\",\"product_name\":\"Saffron Rice\",\"item_code\":\"SAR\",\"category\":\"Rice\",\"price\":\"12.00\",\"prices\":{\"1\":\"11.90\",\"2\":\"12.00\",\"3\":\"17.00\"},\"cost_price\":\"0.00\",\"last_cost\":\"0.00\",\"average_cost\":\"0.00\",\"new_price\":\"14.50\",\"adjustment\":\"0.50\",\"margin\":\"20.83\"},{\"product_id\":\"74\",\"product_name\":\"Jeera Rice\",\"item_code\":\"JER\",\"category\":\"Rice\",\"price\":\"12.00\",\"prices\":{\"1\":\"0.00\",\"2\":\"12.00\",\"3\":\"17.00\"},\"cost_price\":\"0.00\",\"last_cost\":\"0.00\",\"average_cost\":\"0.00\",\"new_price\":\"14.50\",\"adjustment\":\"0.50\",\"margin\":\"20.83\"},{\"product_id\":\"75\",\"product_name\":\"Coconut Rice\",\"item_code\":\"COR\",\"category\":\"Rice\",\"price\":\"12.00\",\"prices\":{\"1\":\"0.00\",\"2\":\"12.00\",\"3\":\"17.00\"},\"cost_price\":\"0.00\",\"last_cost\":\"0.00\",\"average_cost\":\"0.00\",\"new_price\":\"14.50\",\"adjustment\":\"0.50\",\"margin\":\"20.83\"},{\"product_id\":\"76\",\"product_name\":\"Pulao Rice\",\"item_code\":\"PUR\",\"category\":\"Rice\",\"price\":\"12.00\",\"prices\":{\"1\":\"31.80\",\"2\":\"12.00\",\"3\":\"17.00\"},\"cost_price\":\"0.00\",\"last_cost\":\"0.00\",\"average_cost\":\"0.00\",\"new_price\":\"14.50\",\"adjustment\":\"0.50\",\"margin\":\"20.83\"}]', 'sp', '2', 'Amount Markup', 2.00, 'none', 0.00, 0.50, 2, '2025-07-24 20:36:37', 0, NULL, 1),
(16, '1', '2025-07-28', 'Testing', 11, '[{\"product_id\":\"74\",\"product_name\":\"Jeera Rice\",\"item_code\":\"JER\",\"category\":\"Rice\",\"price\":\"0.00\",\"prices\":{\"1\":\"0.00\",\"2\":\"14.50\",\"3\":\"17.00\"},\"cost_price\":\"0.00\",\"last_cost\":\"0.00\",\"average_cost\":\"0.00\",\"new_price\":\"11.80\",\"adjustment\":\"0.00\",\"margin\":\"0.00\"},{\"product_id\":\"75\",\"product_name\":\"Coconut Rice\",\"item_code\":\"COR\",\"category\":\"Rice\",\"price\":\"0.00\",\"prices\":{\"1\":\"0.00\",\"2\":\"14.50\",\"3\":\"17.00\"},\"cost_price\":\"0.00\",\"last_cost\":\"0.00\",\"average_cost\":\"0.00\",\"new_price\":\"11.80\",\"adjustment\":\"0.00\",\"margin\":\"0.00\"}]', 'sp', '1', 'Amount Markup', 11.80, 'none', 0.00, 0.00, 2, '2025-07-24 20:38:18', 0, NULL, 1),
(17, '1', '2025-07-26', 'dsfdsfds', 11, '[{\"product_id\":\"73\",\"product_name\":\"Saffron Rice\",\"item_code\":\"SAR\",\"category\":\"Rice\",\"price\":\"11.90\",\"prices\":{\"1\":\"11.90\",\"2\":\"14.50\",\"3\":\"17.00\"},\"cost_price\":\"0.00\",\"last_cost\":\"0.00\",\"average_cost\":\"0.00\",\"new_price\":\"14.00\",\"adjustment\":\"0.10\",\"margin\":\"17.65\"},{\"product_id\":\"74\",\"product_name\":\"Jeera Rice\",\"item_code\":\"JER\",\"category\":\"Rice\",\"price\":\"11.80\",\"prices\":{\"1\":\"11.80\",\"2\":\"14.50\",\"3\":\"17.00\"},\"cost_price\":\"0.00\",\"last_cost\":\"0.00\",\"average_cost\":\"0.00\",\"new_price\":\"13.90\",\"adjustment\":\"0.10\",\"margin\":\"17.80\"},{\"product_id\":\"75\",\"product_name\":\"Coconut Rice\",\"item_code\":\"COR\",\"category\":\"Rice\",\"price\":\"11.80\",\"prices\":{\"1\":\"11.80\",\"2\":\"14.50\",\"3\":\"17.00\"},\"cost_price\":\"0.00\",\"last_cost\":\"0.00\",\"average_cost\":\"0.00\",\"new_price\":\"13.90\",\"adjustment\":\"0.10\",\"margin\":\"17.80\"},{\"product_id\":\"76\",\"product_name\":\"Pulao Rice\",\"item_code\":\"PUR\",\"category\":\"Rice\",\"price\":\"31.80\",\"prices\":{\"1\":\"31.80\",\"2\":\"14.50\",\"3\":\"17.00\"},\"cost_price\":\"0.00\",\"last_cost\":\"0.00\",\"average_cost\":\"0.00\",\"new_price\":\"33.90\",\"adjustment\":\"0.10\",\"margin\":\"6.60\"}]', 'sp', '1', 'Amount Markup', 2.00, 'none', 0.00, 0.10, 2, '2025-07-24 20:39:38', 0, NULL, 1),
(18, '2', '2025-07-29', '', NULL, '[{\"product_id\":\"70\",\"product_name\":\"Half Tandoori Chicken\",\"item_code\":\"HATC\",\"category\":\"Tandoori Special\",\"price\":\"16.95\",\"prices\":{\"1\":\"16.95\",\"2\":\"0.00\",\"3\":\"0.00\"},\"cost_price\":\"0.00\",\"last_cost\":\"0.00\",\"average_cost\":\"0.00\",\"new_price\":\"20.00\",\"adjustment\":\"0.00\",\"margin\":\"0.00\"},{\"product_id\":\"71\",\"product_name\":\"Full Tandoori Chicken\",\"item_code\":\"FUTC\",\"category\":\"Tandoori Special\",\"price\":\"25.95\",\"prices\":{\"1\":\"25.95\",\"2\":\"0.00\",\"3\":\"0.00\"},\"cost_price\":\"0.00\",\"last_cost\":\"0.00\",\"average_cost\":\"0.00\",\"new_price\":\"20.00\",\"adjustment\":\"0.00\",\"margin\":\"0.00\"},{\"product_id\":\"72\",\"product_name\":\"Tandoori Platter For 2\",\"item_code\":\"TAPF2\",\"category\":\"Tandoori Special\",\"price\":\"26.95\",\"prices\":{\"1\":\"26.95\",\"2\":\"0.00\",\"3\":\"0.00\"},\"cost_price\":\"0.00\",\"last_cost\":\"0.00\",\"average_cost\":\"0.00\",\"new_price\":\"20.00\",\"adjustment\":\"0.00\",\"margin\":\"0.00\"}]', 'sp', NULL, 'Amount Markup', 20.00, 'none', 0.00, 0.00, 2, '2025-07-24 20:59:58', 0, NULL, 1),
(19, '3', '2025-07-30', '', 11, '[{\"product_id\":\"73\",\"product_name\":\"Saffron Rice\",\"item_code\":\"SAR\",\"category\":\"Rice\",\"price\":\"14.00\",\"prices\":{\"1\":\"14.00\",\"2\":\"14.50\",\"3\":\"17.00\"},\"cost_price\":\"0.00\",\"last_cost\":\"0.00\",\"average_cost\":\"0.00\",\"new_price\":\"37.00\",\"adjustment\":\"0.00\",\"margin\":\"117.65\"},{\"product_id\":\"74\",\"product_name\":\"Jeera Rice\",\"item_code\":\"JER\",\"category\":\"Rice\",\"price\":\"13.90\",\"prices\":{\"1\":\"13.90\",\"2\":\"14.50\",\"3\":\"17.00\"},\"cost_price\":\"0.00\",\"last_cost\":\"0.00\",\"average_cost\":\"0.00\",\"new_price\":\"37.00\",\"adjustment\":\"0.00\",\"margin\":\"117.65\"},{\"product_id\":\"75\",\"product_name\":\"Coconut Rice\",\"item_code\":\"COR\",\"category\":\"Rice\",\"price\":\"13.90\",\"prices\":{\"1\":\"13.90\",\"2\":\"14.50\",\"3\":\"17.00\"},\"cost_price\":\"0.00\",\"last_cost\":\"0.00\",\"average_cost\":\"0.00\",\"new_price\":\"37.00\",\"adjustment\":\"0.00\",\"margin\":\"117.65\"},{\"product_id\":\"76\",\"product_name\":\"Pulao Rice\",\"item_code\":\"PUR\",\"category\":\"Rice\",\"price\":\"33.90\",\"prices\":{\"1\":\"33.90\",\"2\":\"14.50\",\"3\":\"17.00\"},\"cost_price\":\"0.00\",\"last_cost\":\"0.00\",\"average_cost\":\"0.00\",\"new_price\":\"37.00\",\"adjustment\":\"0.00\",\"margin\":\"117.65\"}]', 'sp', NULL, 'Amount Markup', 20.00, 'none', 0.00, 0.00, 2, '2025-07-24 21:11:21', 0, NULL, 1),
(20, '2', '2025-07-26', 'Testing', 11, '[{\"product_id\":\"73\",\"product_name\":\"Saffron Rice\",\"item_code\":\"SAR\",\"category\":\"Rice\",\"price\":\"14.50\",\"prices\":{\"1\":\"14.00\",\"2\":\"14.50\",\"3\":\"17.00\"},\"cost_price\":\"0.00\",\"last_cost\":\"0.00\",\"average_cost\":\"0.00\",\"new_price\":\"16.50\",\"adjustment\":\"0.00\",\"margin\":\"13.79\"},{\"product_id\":\"74\",\"product_name\":\"Jeera Rice\",\"item_code\":\"JER\",\"category\":\"Rice\",\"price\":\"14.50\",\"prices\":{\"1\":\"13.90\",\"2\":\"14.50\",\"3\":\"17.00\"},\"cost_price\":\"0.00\",\"last_cost\":\"0.00\",\"average_cost\":\"0.00\",\"new_price\":\"16.50\",\"adjustment\":\"0.00\",\"margin\":\"13.79\"},{\"product_id\":\"75\",\"product_name\":\"Coconut Rice\",\"item_code\":\"COR\",\"category\":\"Rice\",\"price\":\"14.50\",\"prices\":{\"1\":\"13.90\",\"2\":\"14.50\",\"3\":\"17.00\"},\"cost_price\":\"0.00\",\"last_cost\":\"0.00\",\"average_cost\":\"0.00\",\"new_price\":\"16.50\",\"adjustment\":\"0.00\",\"margin\":\"13.79\"},{\"product_id\":\"76\",\"product_name\":\"Pulao Rice\",\"item_code\":\"PUR\",\"category\":\"Rice\",\"price\":\"14.50\",\"prices\":{\"1\":\"33.90\",\"2\":\"14.50\",\"3\":\"17.00\"},\"cost_price\":\"0.00\",\"last_cost\":\"0.00\",\"average_cost\":\"0.00\",\"new_price\":\"16.50\",\"adjustment\":\"0.00\",\"margin\":\"13.79\"}]', 'sp', '2', 'Amount Markup', 2.00, 'none', 0.00, 0.00, 2, '2025-07-24 21:26:43', 0, NULL, 1),
(21, '2', '2025-07-26', '', 11, '[{\"product_id\":\"73\",\"product_name\":\"Saffron Rice\",\"item_code\":\"SAR\",\"category\":\"Rice\",\"price\":\"14.00\",\"prices\":{\"1\":\"14.00\",\"2\":\"16.50\",\"3\":\"17.00\"},\"cost_price\":\"0.00\",\"last_cost\":\"0.00\",\"average_cost\":\"0.00\",\"new_price\":\"21.50\",\"adjustment\":\"0.00\",\"margin\":\"30.30\"},{\"product_id\":\"74\",\"product_name\":\"Jeera Rice\",\"item_code\":\"JER\",\"category\":\"Rice\",\"price\":\"13.90\",\"prices\":{\"1\":\"13.90\",\"2\":\"16.50\",\"3\":\"17.00\"},\"cost_price\":\"0.00\",\"last_cost\":\"0.00\",\"average_cost\":\"0.00\",\"new_price\":\"21.50\",\"adjustment\":\"0.00\",\"margin\":\"30.30\"},{\"product_id\":\"75\",\"product_name\":\"Coconut Rice\",\"item_code\":\"COR\",\"category\":\"Rice\",\"price\":\"13.90\",\"prices\":{\"1\":\"13.90\",\"2\":\"16.50\",\"3\":\"17.00\"},\"cost_price\":\"0.00\",\"last_cost\":\"0.00\",\"average_cost\":\"0.00\",\"new_price\":\"21.50\",\"adjustment\":\"0.00\",\"margin\":\"30.30\"},{\"product_id\":\"76\",\"product_name\":\"Pulao Rice\",\"item_code\":\"PUR\",\"category\":\"Rice\",\"price\":\"33.90\",\"prices\":{\"1\":\"33.90\",\"2\":\"16.50\",\"3\":\"17.00\"},\"cost_price\":\"0.00\",\"last_cost\":\"0.00\",\"average_cost\":\"0.00\",\"new_price\":\"21.50\",\"adjustment\":\"0.00\",\"margin\":\"30.30\"}]', 'sp', NULL, 'Amount Markup', 5.00, 'none', 0.00, 0.00, 2, '2025-07-24 21:58:14', 0, NULL, 1),
(22, '2', '2025-07-26', 'dsfsfds', 11, '[{\"product_id\":\"73\",\"product_name\":\"Saffron Rice\",\"item_code\":\"SAR\",\"category\":\"Rice\",\"price\":\"16.50\",\"prices\":{\"1\":\"14.00\",\"2\":\"16.50\",\"3\":\"17.00\"},\"cost_price\":\"0.00\",\"last_cost\":\"0.00\",\"average_cost\":\"0.00\",\"new_price\":\"18.15\",\"adjustment\":\"0.00\",\"margin\":\"10.00\"},{\"product_id\":\"74\",\"product_name\":\"Jeera Rice\",\"item_code\":\"JER\",\"category\":\"Rice\",\"price\":\"16.50\",\"prices\":{\"1\":\"13.90\",\"2\":\"16.50\",\"3\":\"17.00\"},\"cost_price\":\"0.00\",\"last_cost\":\"0.00\",\"average_cost\":\"0.00\",\"new_price\":\"18.15\",\"adjustment\":\"0.00\",\"margin\":\"10.00\"},{\"product_id\":\"75\",\"product_name\":\"Coconut Rice\",\"item_code\":\"COR\",\"category\":\"Rice\",\"price\":\"16.50\",\"prices\":{\"1\":\"13.90\",\"2\":\"16.50\",\"3\":\"17.00\"},\"cost_price\":\"0.00\",\"last_cost\":\"0.00\",\"average_cost\":\"0.00\",\"new_price\":\"18.15\",\"adjustment\":\"0.00\",\"margin\":\"10.00\"},{\"product_id\":\"76\",\"product_name\":\"Pulao Rice\",\"item_code\":\"PUR\",\"category\":\"Rice\",\"price\":\"16.50\",\"prices\":{\"1\":\"33.90\",\"2\":\"16.50\",\"3\":\"17.00\"},\"cost_price\":\"0.00\",\"last_cost\":\"0.00\",\"average_cost\":\"0.00\",\"new_price\":\"18.15\",\"adjustment\":\"0.00\",\"margin\":\"10.00\"}]', 'sp', '2', 'Percentage Markup', 10.00, 'none', 0.00, 0.00, 2, '2025-07-24 21:58:55', 1, '2025-07-24 21:58:55', 1),
(23, '3', '2025-07-29', 'sfsdfsdsd', 11, '[{\"product_id\":\"73\",\"product_name\":\"Saffron Rice\",\"item_code\":\"SAR\",\"category\":\"Rice\",\"price\":\"17.00\",\"prices\":{\"1\":\"14.00\",\"2\":\"18.15\",\"3\":\"17.00\"},\"cost_price\":\"0.00\",\"last_cost\":\"0.00\",\"average_cost\":\"0.00\",\"new_price\":\"21.25\",\"adjustment\":\"0.00\",\"margin\":\"25.00\"},{\"product_id\":\"74\",\"product_name\":\"Jeera Rice\",\"item_code\":\"JER\",\"category\":\"Rice\",\"price\":\"17.00\",\"prices\":{\"1\":\"13.90\",\"2\":\"18.15\",\"3\":\"17.00\"},\"cost_price\":\"0.00\",\"last_cost\":\"0.00\",\"average_cost\":\"0.00\",\"new_price\":\"21.25\",\"adjustment\":\"0.00\",\"margin\":\"25.00\"},{\"product_id\":\"75\",\"product_name\":\"Coconut Rice\",\"item_code\":\"COR\",\"category\":\"Rice\",\"price\":\"17.00\",\"prices\":{\"1\":\"13.90\",\"2\":\"18.15\",\"3\":\"17.00\"},\"cost_price\":\"0.00\",\"last_cost\":\"0.00\",\"average_cost\":\"0.00\",\"new_price\":\"21.25\",\"adjustment\":\"0.00\",\"margin\":\"25.00\"},{\"product_id\":\"76\",\"product_name\":\"Pulao Rice\",\"item_code\":\"PUR\",\"category\":\"Rice\",\"price\":\"17.00\",\"prices\":{\"1\":\"33.90\",\"2\":\"18.15\",\"3\":\"17.00\"},\"cost_price\":\"0.00\",\"last_cost\":\"0.00\",\"average_cost\":\"0.00\",\"new_price\":\"21.25\",\"adjustment\":\"0.00\",\"margin\":\"25.00\"}]', 'sp', '3', 'Percentage Markup', 25.00, 'none', 0.00, 0.00, 2, '2025-07-24 22:00:23', 1, '2025-07-24 22:00:23', 1),
(24, '1', '2025-07-27', 'testing', 11, '[{\"product_id\":\"73\",\"product_name\":\"Saffron Rice\",\"item_code\":\"SAR\",\"category\":\"Rice\",\"price\":\"14.00\",\"prices\":{\"1\":\"14.00\",\"2\":\"18.15\",\"3\":\"21.25\"},\"cost_price\":\"0.00\",\"last_cost\":\"0.00\",\"average_cost\":\"0.00\",\"new_price\":\"17.00\",\"adjustment\":\"0.20\",\"margin\":\"21.43\"},{\"product_id\":\"74\",\"product_name\":\"Jeera Rice\",\"item_code\":\"JER\",\"category\":\"Rice\",\"price\":\"13.90\",\"prices\":{\"1\":\"13.90\",\"2\":\"18.15\",\"3\":\"21.25\"},\"cost_price\":\"0.00\",\"last_cost\":\"0.00\",\"average_cost\":\"0.00\",\"new_price\":\"16.88\",\"adjustment\":\"0.20\",\"margin\":\"21.44\"},{\"product_id\":\"75\",\"product_name\":\"Coconut Rice\",\"item_code\":\"COR\",\"category\":\"Rice\",\"price\":\"13.90\",\"prices\":{\"1\":\"13.90\",\"2\":\"18.15\",\"3\":\"21.25\"},\"cost_price\":\"0.00\",\"last_cost\":\"0.00\",\"average_cost\":\"0.00\",\"new_price\":\"16.88\",\"adjustment\":\"0.20\",\"margin\":\"21.44\"},{\"product_id\":\"76\",\"product_name\":\"Pulao Rice\",\"item_code\":\"PUR\",\"category\":\"Rice\",\"price\":\"33.90\",\"prices\":{\"1\":\"33.90\",\"2\":\"18.15\",\"3\":\"21.25\"},\"cost_price\":\"0.00\",\"last_cost\":\"0.00\",\"average_cost\":\"0.00\",\"new_price\":\"40.88\",\"adjustment\":\"0.20\",\"margin\":\"20.59\"}]', 'sp', NULL, 'Percentage Markup', 20.00, 'none', 0.00, 0.20, 2, '2025-07-25 14:06:19', 0, NULL, 1),
(25, '2', '2025-07-27', '', 11, '[{\"product_id\":\"73\",\"product_name\":\"Saffron Rice\",\"item_code\":\"SAR\",\"category\":\"Rice\",\"price\":\"18.15\",\"prices\":{\"1\":\"14.00\",\"2\":\"18.15\",\"3\":\"21.25\"},\"cost_price\":\"0.00\",\"last_cost\":\"0.00\",\"average_cost\":\"0.00\",\"new_price\":\"38.30\",\"adjustment\":\"0.15\",\"margin\":\"111.02\"},{\"product_id\":\"74\",\"product_name\":\"Jeera Rice\",\"item_code\":\"JER\",\"category\":\"Rice\",\"price\":\"18.15\",\"prices\":{\"1\":\"13.90\",\"2\":\"18.15\",\"3\":\"21.25\"},\"cost_price\":\"0.00\",\"last_cost\":\"0.00\",\"average_cost\":\"0.00\",\"new_price\":\"38.30\",\"adjustment\":\"0.15\",\"margin\":\"111.02\"},{\"product_id\":\"75\",\"product_name\":\"Coconut Rice\",\"item_code\":\"COR\",\"category\":\"Rice\",\"price\":\"18.15\",\"prices\":{\"1\":\"13.90\",\"2\":\"18.15\",\"3\":\"21.25\"},\"cost_price\":\"0.00\",\"last_cost\":\"0.00\",\"average_cost\":\"0.00\",\"new_price\":\"38.30\",\"adjustment\":\"0.15\",\"margin\":\"111.02\"},{\"product_id\":\"76\",\"product_name\":\"Pulao Rice\",\"item_code\":\"PUR\",\"category\":\"Rice\",\"price\":\"18.15\",\"prices\":{\"1\":\"33.90\",\"2\":\"18.15\",\"3\":\"21.25\"},\"cost_price\":\"0.00\",\"last_cost\":\"0.00\",\"average_cost\":\"0.00\",\"new_price\":\"38.30\",\"adjustment\":\"0.15\",\"margin\":\"111.02\"}]', 'sp', '2', 'Amount Markup', 20.00, 'none', 0.00, 0.15, 2, '2025-07-25 14:11:35', 1, '2025-07-25 14:11:35', 1),
(26, '1', '2025-07-28', '', 11, '[{\"product_id\":\"73\",\"product_name\":\"Saffron Rice\",\"item_code\":\"SAR\",\"category\":\"Rice\",\"price\":\"14.00\",\"prices\":{\"1\":\"14.00\",\"2\":\"38.30\",\"3\":\"21.25\"},\"cost_price\":\"0.00\",\"last_cost\":\"0.00\",\"average_cost\":\"0.00\",\"new_price\":\"15.60\",\"adjustment\":\"0.20\",\"margin\":\"11.43\"},{\"product_id\":\"74\",\"product_name\":\"Jeera Rice\",\"item_code\":\"JER\",\"category\":\"Rice\",\"price\":\"13.90\",\"prices\":{\"1\":\"13.90\",\"2\":\"38.30\",\"3\":\"21.25\"},\"cost_price\":\"0.00\",\"last_cost\":\"0.00\",\"average_cost\":\"0.00\",\"new_price\":\"15.49\",\"adjustment\":\"0.20\",\"margin\":\"11.44\"},{\"product_id\":\"75\",\"product_name\":\"Coconut Rice\",\"item_code\":\"COR\",\"category\":\"Rice\",\"price\":\"13.90\",\"prices\":{\"1\":\"13.90\",\"2\":\"38.30\",\"3\":\"21.25\"},\"cost_price\":\"0.00\",\"last_cost\":\"0.00\",\"average_cost\":\"0.00\",\"new_price\":\"15.49\",\"adjustment\":\"0.20\",\"margin\":\"11.44\"},{\"product_id\":\"76\",\"product_name\":\"Pulao Rice\",\"item_code\":\"PUR\",\"category\":\"Rice\",\"price\":\"33.90\",\"prices\":{\"1\":\"33.90\",\"2\":\"38.30\",\"3\":\"21.25\"},\"cost_price\":\"0.00\",\"last_cost\":\"0.00\",\"average_cost\":\"0.00\",\"new_price\":\"37.49\",\"adjustment\":\"0.20\",\"margin\":\"10.59\"}]', 'sp', NULL, 'Percentage Markup', 10.00, 'none', 0.00, 0.20, 2, '2025-07-25 15:23:44', 0, NULL, 1),
(27, '1', '2025-07-28', '', 11, '[{\"product_id\":\"73\",\"product_name\":\"Saffron Rice\",\"item_code\":\"SAR\",\"category\":\"Rice\",\"price\":\"14.00\",\"prices\":{\"1\":\"14.00\",\"2\":\"38.30\",\"3\":\"21.25\"},\"cost_price\":\"0.00\",\"last_cost\":\"0.00\",\"average_cost\":\"0.00\",\"new_price\":\"14.00\",\"adjustment\":\"0.00\",\"margin\":\"0.00\"},{\"product_id\":\"74\",\"product_name\":\"Jeera Rice\",\"item_code\":\"JER\",\"category\":\"Rice\",\"price\":\"13.90\",\"prices\":{\"1\":\"13.90\",\"2\":\"38.30\",\"3\":\"21.25\"},\"cost_price\":\"0.00\",\"last_cost\":\"0.00\",\"average_cost\":\"0.00\",\"new_price\":\"13.90\",\"adjustment\":\"0.00\",\"margin\":\"0.00\"},{\"product_id\":\"75\",\"product_name\":\"Coconut Rice\",\"item_code\":\"COR\",\"category\":\"Rice\",\"price\":\"13.90\",\"prices\":{\"1\":\"13.90\",\"2\":\"38.30\",\"3\":\"21.25\"},\"cost_price\":\"0.00\",\"last_cost\":\"0.00\",\"average_cost\":\"0.00\",\"new_price\":\"15.00\",\"adjustment\":\"1.10\",\"margin\":\"7.91\"},{\"product_id\":\"76\",\"product_name\":\"Pulao Rice\",\"item_code\":\"PUR\",\"category\":\"Rice\",\"price\":\"33.90\",\"prices\":{\"1\":\"33.90\",\"2\":\"38.30\",\"3\":\"21.25\"},\"cost_price\":\"0.00\",\"last_cost\":\"0.00\",\"average_cost\":\"0.00\",\"new_price\":\"33.90\",\"adjustment\":\"0.00\",\"margin\":\"0.00\"}]', 'sp', '1', 'Percentage Markup', 0.00, 'none', 0.00, 0.00, 2, '2025-07-25 17:07:04', 1, '2025-07-25 17:07:04', 1),
(28, '1', '2025-07-25', '', 11, '[{\"product_id\":\"73\",\"product_name\":\"Saffron Rice\",\"item_code\":\"SAR\",\"category\":\"Rice\",\"price\":\"14.00\",\"prices\":{\"1\":\"14.00\",\"2\":\"38.30\",\"3\":\"21.25\"},\"cost_price\":\"0.00\",\"last_cost\":\"0.00\",\"average_cost\":\"0.00\",\"new_price\":\"14.00\",\"adjustment\":\"0.00\",\"margin\":\"0.00\"},{\"product_id\":\"74\",\"product_name\":\"Jeera Rice\",\"item_code\":\"JER\",\"category\":\"Rice\",\"price\":\"13.90\",\"prices\":{\"1\":\"13.90\",\"2\":\"38.30\",\"3\":\"21.25\"},\"cost_price\":\"0.00\",\"last_cost\":\"0.00\",\"average_cost\":\"0.00\",\"new_price\":\"13.90\",\"adjustment\":\"0.00\",\"margin\":\"0.00\"},{\"product_id\":\"75\",\"product_name\":\"Coconut Rice\",\"item_code\":\"COR\",\"category\":\"Rice\",\"price\":\"15.00\",\"prices\":{\"1\":\"15.00\",\"2\":\"38.30\",\"3\":\"21.25\"},\"cost_price\":\"0.00\",\"last_cost\":\"0.00\",\"average_cost\":\"0.00\",\"new_price\":\"18.00\",\"adjustment\":\"3.00\",\"margin\":\"20.00\"},{\"product_id\":\"76\",\"product_name\":\"Pulao Rice\",\"item_code\":\"PUR\",\"category\":\"Rice\",\"price\":\"33.90\",\"prices\":{\"1\":\"33.90\",\"2\":\"38.30\",\"3\":\"21.25\"},\"cost_price\":\"0.00\",\"last_cost\":\"0.00\",\"average_cost\":\"0.00\",\"new_price\":\"33.90\",\"adjustment\":\"0.00\",\"margin\":\"0.00\"}]', 'sp', '1', 'Percentage Markup', 0.00, 'none', 0.00, 0.00, 2, '2025-07-25 17:10:21', 1, '2025-07-25 19:53:08', 1),
(29, '2', '2025-07-28', '', 11, '[{\"product_id\":\"75\",\"product_name\":\"Coconut Rice\",\"item_code\":\"COR\",\"category\":\"Rice\",\"price\":\"38.30\",\"prices\":{\"1\":\"18.00\",\"2\":\"38.30\",\"3\":\"21.25\"},\"cost_price\":\"0.00\",\"last_cost\":\"0.00\",\"average_cost\":\"0.00\",\"new_price\":\"28.29\",\"adjustment\":\"-10.01\",\"margin\":\"-26.14\"}]', 'sp', '2', 'Amount Markup', 0.00, 'none', 0.00, 0.00, 2, '2025-07-25 17:18:06', 1, '2025-07-25 17:18:06', 1),
(30, '1', '2025-07-29', '', 11, '[{\"product_id\":\"75\",\"product_name\":\"Coconut Rice\",\"item_code\":\"COR\",\"category\":\"Rice\",\"price\":\"18.00\",\"prices\":{\"1\":\"18.00\",\"2\":\"28.29\",\"3\":\"21.25\"},\"cost_price\":\"0.00\",\"last_cost\":\"0.00\",\"average_cost\":\"0.00\",\"new_price\":\"19.80\",\"adjustment\":\"1.80\",\"margin\":\"10.00\"}]', 'sp', '1', 'Percentage Markup', 9.99, 'none', 0.00, 0.00, 2, '2025-07-25 17:19:48', 1, '2025-07-25 17:19:48', 1),
(31, '2', '2025-07-28', '', 12, '[{\"product_id\":\"79\",\"product_name\":\"Chicken Tikka Biryani\",\"item_code\":\"CHTB\",\"category\":\"Biryani\",\"price\":\"0.00\",\"prices\":{\"1\":\"25.95\",\"2\":\"0.00\",\"4\":\"0.00\"},\"cost_price\":\"0.00\",\"last_cost\":\"0.00\",\"average_cost\":\"0.00\",\"new_price\":\"10.00\",\"adjustment\":\"10.00\",\"margin\":\"0.00\"},{\"product_id\":\"80\",\"product_name\":\"Lamb Biryani\",\"item_code\":\"LAB\",\"category\":\"Biryani\",\"price\":\"0.00\",\"prices\":{\"1\":\"25.95\",\"2\":\"0.00\",\"4\":\"0.00\"},\"cost_price\":\"0.00\",\"last_cost\":\"0.00\",\"average_cost\":\"0.00\",\"new_price\":\"10.00\",\"adjustment\":\"10.00\",\"margin\":\"0.00\"}]', 'sp', '2', 'Amount Markup', 10.00, 'none', 0.00, 0.00, 2, '2025-07-25 20:42:56', 1, '2025-07-25 20:42:56', 1),
(32, '4', '2025-07-29', '', 12, '[{\"product_id\":\"79\",\"product_name\":\"Chicken Tikka Biryani\",\"item_code\":\"CHTB\",\"category\":\"Biryani\",\"price\":\"0.00\",\"prices\":{\"1\":\"25.95\",\"2\":\"10.00\",\"4\":\"0.00\"},\"cost_price\":\"0.00\",\"last_cost\":\"0.00\",\"average_cost\":\"0.00\",\"new_price\":\"15.00\",\"adjustment\":\"15.00\",\"margin\":\"0.00\"},{\"product_id\":\"80\",\"product_name\":\"Lamb Biryani\",\"item_code\":\"LAB\",\"category\":\"Biryani\",\"price\":\"0.00\",\"prices\":{\"1\":\"25.95\",\"2\":\"10.00\",\"4\":\"0.00\"},\"cost_price\":\"0.00\",\"last_cost\":\"0.00\",\"average_cost\":\"0.00\",\"new_price\":\"15.00\",\"adjustment\":\"15.00\",\"margin\":\"0.00\"}]', 'sp', '4', 'Amount Markup', 15.00, 'none', 0.00, 0.00, 2, '2025-07-25 20:46:33', 1, '2025-07-25 20:46:33', 1),
(33, '1', '2025-07-28', '', 12, '[{\"product_id\":\"79\",\"product_name\":\"Chicken Tikka Biryani\",\"item_code\":\"CHTB\",\"category\":\"Biryani\",\"price\":\"25.95\",\"prices\":{\"1\":\"25.95\",\"2\":\"10.00\",\"4\":\"15.00\"},\"cost_price\":\"0.00\",\"last_cost\":\"0.00\",\"average_cost\":\"0.00\",\"new_price\":\"23.56\",\"adjustment\":\"-2.39\",\"margin\":\"-9.21\"},{\"product_id\":\"80\",\"product_name\":\"Lamb Biryani\",\"item_code\":\"LAB\",\"category\":\"Biryani\",\"price\":\"25.95\",\"prices\":{\"1\":\"25.95\",\"2\":\"10.00\",\"4\":\"15.00\"},\"cost_price\":\"0.00\",\"last_cost\":\"0.00\",\"average_cost\":\"0.00\",\"new_price\":\"23.56\",\"adjustment\":\"-2.39\",\"margin\":\"-9.21\"},{\"product_id\":\"81\",\"product_name\":\"Beef Biryani\",\"item_code\":\"BEB\",\"category\":\"Biryani\",\"price\":\"25.95\",\"prices\":{\"1\":\"25.95\",\"2\":\"0.00\",\"4\":\"0.00\"},\"cost_price\":\"0.00\",\"last_cost\":\"0.00\",\"average_cost\":\"0.00\",\"new_price\":\"23.56\",\"adjustment\":\"-2.39\",\"margin\":\"-9.21\"}]', 'sp', '1', 'Percentage Markup', -10.00, 'none', 0.00, 0.20, 2, '2025-07-25 20:51:01', 1, '2025-07-25 20:51:01', 1),
(34, '4', '2025-07-31', 'testing', 11, '[{\"product_id\":\"75\",\"product_name\":\"Coconut Rice\",\"item_code\":\"COR\",\"category\":\"Rice\",\"price\":\"28.29\",\"prices\":{\"1\":\"15.00\",\"2\":\"21.25\",\"4\":\"28.29\"},\"cost_price\":\"0.00\",\"last_cost\":\"0.00\",\"average_cost\":\"0.00\",\"new_price\":\"32.00\",\"adjustment\":\"3.71\",\"margin\":\"13.11\"}]', 'sp', '4', 'Percentage Markup', 10.00, 'none', 0.00, 0.00, 2, '2025-07-30 13:49:49', 1, '2025-07-30 13:49:49', 1),
(35, '1', '2025-07-31', '', 11, '[{\"product_id\":\"73\",\"product_name\":\"Saffron Rice\",\"item_code\":\"SAR\",\"category\":\"Rice\",\"price\":\"26.90\",\"prices\":{\"1\":\"26.90\",\"2\":\"21.25\",\"4\":\"38.30\"},\"cost_price\":\"0.00\",\"last_cost\":\"0.00\",\"average_cost\":\"0.00\",\"new_price\":\"29.69\",\"adjustment\":\"2.79\",\"margin\":\"10.37\"},{\"product_id\":\"74\",\"product_name\":\"Jeera Rice\",\"item_code\":\"JER\",\"category\":\"Rice\",\"price\":\"15.00\",\"prices\":{\"1\":\"15.00\",\"2\":\"21.25\",\"4\":\"38.30\"},\"cost_price\":\"0.00\",\"last_cost\":\"0.00\",\"average_cost\":\"0.00\",\"new_price\":\"16.60\",\"adjustment\":\"1.60\",\"margin\":\"10.67\"},{\"product_id\":\"75\",\"product_name\":\"Coconut Rice\",\"item_code\":\"COR\",\"category\":\"Rice\",\"price\":\"15.00\",\"prices\":{\"1\":\"15.00\",\"2\":\"21.25\",\"4\":\"32.00\"},\"cost_price\":\"0.00\",\"last_cost\":\"0.00\",\"average_cost\":\"0.00\",\"new_price\":\"25.00\",\"adjustment\":\"10.00\",\"margin\":\"66.67\"},{\"product_id\":\"76\",\"product_name\":\"Pulao Rice\",\"item_code\":\"PUR\",\"category\":\"Rice\",\"price\":\"46.80\",\"prices\":{\"1\":\"46.80\",\"2\":\"21.25\",\"4\":\"38.30\"},\"cost_price\":\"0.00\",\"last_cost\":\"0.00\",\"average_cost\":\"0.00\",\"new_price\":\"51.58\",\"adjustment\":\"4.78\",\"margin\":\"10.21\"}]', 'sp', '1', 'Percentage Markup', 9.99, 'none', 0.00, 0.10, 2, '2025-07-30 14:46:12', 1, '2025-07-30 14:46:12', 1);

-- --------------------------------------------------------

--
-- Table structure for table `production`
--

CREATE TABLE `production` (
  `productionid` int(11) NOT NULL,
  `itemid` int(11) NOT NULL,
  `itemvid` int(11) DEFAULT NULL,
  `itemquantity` int(11) NOT NULL,
  `savedby` int(11) NOT NULL,
  `suplierid` int(10) DEFAULT NULL,
  `is_bom` int(10) DEFAULT 1 COMMENT '''0 => Without bill of materials, 1 => With bill of material''',
  `saveddate` date NOT NULL,
  `productionexpiredate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

--
-- Dumping data for table `production`
--

INSERT INTO `production` (`productionid`, `itemid`, `itemvid`, `itemquantity`, `savedby`, `suplierid`, `is_bom`, `saveddate`, `productionexpiredate`) VALUES
(44, 32, 44, 1, 2, 0, 0, '2025-07-21', '2025-07-21'),
(45, 33, 45, 1, 2, 0, 0, '2025-07-21', '2025-07-21'),
(47, 35, 47, 1, 2, 0, 0, '2025-07-21', '2025-07-21'),
(48, 36, 48, 1, 2, 0, 0, '2025-07-21', '2025-07-21'),
(49, 37, 49, 1, 2, 0, 0, '2025-07-21', '2025-07-21'),
(50, 38, 50, 1, 2, 0, 0, '2025-07-21', '2025-07-21'),
(51, 39, 51, 1, 2, 0, 0, '2025-07-21', '2025-07-21'),
(52, 40, 52, 1, 2, 0, 0, '2025-07-21', '2025-07-21'),
(53, 41, 53, 1, 2, 0, 0, '2025-07-21', '2025-07-21'),
(54, 42, 54, 1, 2, 0, 0, '2025-07-21', '2025-07-21'),
(55, 43, 55, 1, 2, 0, 0, '2025-07-21', '2025-07-21'),
(56, 44, 56, 1, 2, 0, 0, '2025-07-21', '2025-07-21'),
(57, 45, 57, 1, 2, 0, 0, '2025-07-21', '2025-07-21'),
(58, 46, 58, 1, 2, 0, 0, '2025-07-21', '2025-07-21'),
(59, 47, 59, 1, 2, 0, 0, '2025-07-21', '2025-07-21'),
(60, 48, 60, 1, 2, 0, 0, '2025-07-21', '2025-07-21'),
(61, 49, 61, 1, 2, 0, 0, '2025-07-21', '2025-07-21'),
(62, 50, 62, 1, 2, 0, 0, '2025-07-21', '2025-07-21'),
(66, 54, 66, 1, 2, 0, 0, '2025-07-21', '2025-07-21'),
(71, 59, 71, 1, 2, 0, 0, '2025-07-21', '2025-07-21'),
(72, 60, 72, 1, 2, 0, 0, '2025-07-21', '2025-07-21'),
(73, 61, 73, 1, 2, 0, 0, '2025-07-21', '2025-07-21'),
(74, 62, 74, 1, 2, 0, 0, '2025-07-21', '2025-07-21'),
(76, 64, 76, 1, 2, 0, 0, '2025-07-21', '2025-07-21'),
(77, 65, 77, 1, 2, 0, 0, '2025-07-21', '2025-07-21'),
(78, 66, 78, 1, 2, 0, 0, '2025-07-21', '2025-07-21'),
(79, 67, 79, 1, 2, 0, 0, '2025-07-21', '2025-07-21'),
(80, 68, 80, 1, 2, 0, 0, '2025-07-21', '2025-07-21'),
(81, 69, 81, 1, 2, 0, 0, '2025-07-21', '2025-07-21'),
(95, 83, 95, 1, 2, 0, 0, '2025-07-21', '2025-07-21'),
(98, 86, 98, 1, 2, 0, 0, '2025-07-21', '2025-07-21'),
(103, 31, 103, 1, 2, 0, 0, '2025-07-21', '2025-07-21'),
(104, 31, 103, 1, 2, NULL, 1, '2025-07-22', '2025-07-22'),
(107, 1, 105, 1, 2, 0, 0, '2025-07-21', '2025-07-21'),
(108, 2, 106, 1, 2, 0, 0, '2025-07-21', '2025-07-21'),
(109, 4, 107, 1, 2, 0, 0, '2025-07-21', '2025-07-21'),
(110, 3, 108, 1, 2, 0, 0, '2025-07-21', '2025-07-21'),
(111, 5, 109, 1, 2, 0, 0, '2025-07-21', '2025-07-21'),
(113, 7, 111, 1, 2, 0, 0, '2025-07-21', '2025-07-21'),
(114, 8, 112, 1, 2, 0, 0, '2025-07-21', '2025-07-21'),
(115, 11, 113, 1, 2, 0, 0, '2025-07-21', '2025-07-21'),
(116, 12, 114, 1, 2, 0, 0, '2025-07-21', '2025-07-21'),
(117, 13, 115, 1, 2, 0, 0, '2025-07-21', '2025-07-21'),
(118, 14, 116, 1, 2, 0, 0, '2025-07-21', '2025-07-21'),
(120, 10, 118, 1, 2, 0, 0, '2025-07-21', '2025-07-21'),
(121, 9, 119, 1, 2, 0, 0, '2025-07-21', '2025-07-21'),
(122, 15, 120, 1, 2, 0, 0, '2025-07-21', '2025-07-21'),
(123, 16, 121, 1, 2, 0, 0, '2025-07-21', '2025-07-21'),
(125, 18, 123, 1, 2, 0, 0, '2025-07-21', '2025-07-21'),
(126, 19, 124, 1, 2, 0, 0, '2025-07-21', '2025-07-21'),
(127, 20, 125, 1, 2, 0, 0, '2025-07-21', '2025-07-21'),
(128, 21, 126, 1, 2, 0, 0, '2025-07-21', '2025-07-21'),
(129, 22, 127, 1, 2, 0, 0, '2025-07-21', '2025-07-21'),
(130, 23, 128, 1, 2, 0, 0, '2025-07-21', '2025-07-21'),
(132, 24, 130, 1, 2, 0, 0, '2025-07-21', '2025-07-21'),
(133, 25, 131, 1, 2, 0, 0, '2025-07-21', '2025-07-21'),
(134, 26, 132, 1, 2, 0, 0, '2025-07-21', '2025-07-21'),
(135, 30, 133, 1, 2, 0, 0, '2025-07-21', '2025-07-21'),
(136, 29, 134, 1, 2, 0, 0, '2025-07-21', '2025-07-21'),
(137, 28, 135, 1, 2, 0, 0, '2025-07-21', '2025-07-21'),
(138, 27, 136, 1, 2, 0, 0, '2025-07-21', '2025-07-21'),
(139, 70, 137, 1, 2, 0, 0, '2025-07-21', '2025-07-21'),
(140, 71, 138, 1, 2, 0, 0, '2025-07-21', '2025-07-21'),
(141, 72, 139, 1, 2, 0, 0, '2025-07-21', '2025-07-21'),
(142, 73, 140, 1, 2, 0, 0, '2025-07-21', '2025-07-21'),
(143, 74, 141, 1, 2, 0, 0, '2025-07-21', '2025-07-21'),
(144, 75, 142, 1, 2, 0, 0, '2025-07-21', '2025-07-21'),
(145, 76, 143, 1, 2, 0, 0, '2025-07-21', '2025-07-21'),
(147, 78, 145, 1, 2, 0, 0, '2025-07-21', '2025-07-21'),
(148, 79, 146, 1, 2, 0, 0, '2025-07-21', '2025-07-21'),
(149, 80, 147, 1, 2, 0, 0, '2025-07-21', '2025-07-21'),
(150, 81, 148, 1, 2, 0, 0, '2025-07-21', '2025-07-21'),
(151, 82, 149, 1, 2, 0, 0, '2025-07-21', '2025-07-21'),
(152, 89, 150, 1, 2, 0, 0, '2025-07-22', '2025-07-22'),
(153, 91, 151, 1, 2, 0, 0, '2025-07-22', '2025-07-22'),
(154, 92, 152, 1, 2, 0, 0, '2025-07-22', '2025-07-22'),
(155, 93, 153, 1, 2, 0, 0, '2025-07-22', '2025-07-22'),
(156, 94, 154, 1, 2, 0, 0, '2025-07-22', '2025-07-22'),
(157, 95, 155, 1, 2, 0, 0, '2025-07-22', '2025-07-22'),
(158, 96, 156, 1, 2, 0, 0, '2025-07-22', '2025-07-22'),
(159, 97, 157, 1, 2, 0, 0, '2025-07-22', '2025-07-22'),
(161, 98, 159, 1, 2, 0, 0, '2025-07-22', '2025-07-22'),
(162, 73, 140, 1, 2, NULL, 1, '2025-07-28', '2025-07-28'),
(163, 68, 80, 1, 2, NULL, 1, '2025-07-28', '2025-07-28'),
(165, 26, 132, 1, 2, NULL, 1, '2025-07-28', '2025-07-28'),
(166, 26, 132, 1, 2, NULL, 1, '2025-07-28', '2025-07-28'),
(167, 82, 149, 1, 2, NULL, 1, '2025-07-28', '2025-07-28'),
(168, 14, 116, 1, 2, NULL, 1, '2025-07-28', '2025-07-28'),
(169, 61, 73, 1, 2, NULL, 1, '2025-07-28', '2025-07-28'),
(170, 45, 57, 1, 2, NULL, 1, '2025-07-28', '2025-07-28'),
(172, 16, 121, 1, 2, NULL, 1, '2025-07-28', '2025-07-28'),
(173, 74, 141, 1, 2, NULL, 1, '2025-07-28', '2025-07-28'),
(174, 6, 160, 1, 2, 0, 0, '2025-07-21', '2025-07-21'),
(175, 6, 160, 1, 2, NULL, 1, '2025-07-28', '2025-07-28'),
(176, 79, 146, 1, 2, NULL, 1, '2025-07-28', '2025-07-28'),
(177, 4, 107, 1, 2, NULL, 1, '2025-07-28', '2025-07-28'),
(178, 74, 141, 1, 2, NULL, 1, '2025-07-28', '2025-07-28'),
(179, 8, 112, 1, 2, NULL, 1, '2025-07-28', '2025-07-28'),
(180, 76, 143, 1, 2, NULL, 1, '2025-07-28', '2025-07-28'),
(181, 76, 143, 1, 2, NULL, 1, '2025-07-29', '2025-07-29'),
(182, 17, 162, 1, 2, 0, 0, '2025-07-21', '2025-07-21'),
(183, 7, 111, 1, 2, NULL, 1, '2025-07-29', '2025-07-29'),
(184, 4, 107, 1, 2, NULL, 1, '2025-07-29', '2025-07-29'),
(185, 41, 53, 1, 2, NULL, 1, '2025-07-29', '2025-07-29'),
(187, 88, 164, 1, 2, 0, 0, '2025-07-21', '2025-07-21'),
(188, 87, 165, 1, 2, 0, 0, '2025-07-21', '2025-07-21'),
(189, 4, 107, 1, 2, NULL, 1, '2025-07-30', '2025-07-30'),
(190, 75, 142, 1, 2, NULL, 1, '2025-07-30', '2025-07-30'),
(191, 4, 107, 1, 2, NULL, 1, '2025-07-30', '2025-07-30'),
(192, 8, 112, 1, 2, NULL, 1, '2025-07-30', '2025-07-30'),
(193, 2, 106, 1, 2, NULL, 1, '2025-07-30', '2025-07-30'),
(194, 3, 108, 1, 2, NULL, 1, '2025-07-30', '2025-07-30'),
(195, 4, 107, 1, 2, NULL, 1, '2025-07-30', '2025-07-30'),
(196, 2, 106, 1, 2, NULL, 1, '2025-07-30', '2025-07-30'),
(197, 3, 108, 1, 2, NULL, 1, '2025-07-30', '2025-07-30'),
(198, 23, 128, 1, 2, NULL, 1, '2025-07-30', '2025-07-30'),
(199, 74, 141, 1, 168, NULL, 1, '2025-07-30', '2025-07-30'),
(200, 76, 143, 1, 168, NULL, 1, '2025-07-30', '2025-07-30'),
(201, 4, 107, 1, 168, NULL, 1, '2025-07-31', '2025-07-31'),
(202, 6, 160, 1, 168, NULL, 1, '2025-07-31', '2025-07-31'),
(203, 10, 118, 1, 168, NULL, 1, '2025-07-31', '2025-07-31'),
(204, 80, 147, 2, 168, NULL, 1, '2025-07-31', '2025-07-31'),
(205, 74, 141, 1, 168, NULL, 1, '2025-07-31', '2025-07-31'),
(206, 73, 140, 1, 168, NULL, 1, '2025-07-31', '2025-07-31'),
(207, 75, 142, 1, 168, NULL, 1, '2025-07-31', '2025-07-31'),
(208, 74, 141, 1, 168, NULL, 1, '2025-07-31', '2025-07-31'),
(209, 76, 143, 1, 168, NULL, 1, '2025-07-31', '2025-07-31'),
(210, 75, 142, 1, 168, NULL, 1, '2025-07-31', '2025-07-31'),
(211, 74, 141, 1, 168, NULL, 1, '2025-07-31', '2025-07-31'),
(212, 75, 142, 1, 168, NULL, 1, '2025-07-31', '2025-07-31'),
(213, 74, 141, 1, 168, NULL, 1, '2025-07-31', '2025-07-31'),
(214, 7, 111, 1, 168, NULL, 1, '2025-07-31', '2025-07-31'),
(215, 4, 107, 1, 168, NULL, 1, '2025-07-31', '2025-07-31'),
(216, 4, 107, 1, 168, NULL, 1, '2025-07-31', '2025-07-31'),
(217, 4, 107, 1, 168, NULL, 1, '2025-07-31', '2025-07-31'),
(218, 76, 143, 1, 168, NULL, 1, '2025-07-31', '2025-07-31'),
(219, 4, 107, 1, 168, NULL, 1, '2025-07-31', '2025-07-31'),
(220, 12, 114, 1, 168, NULL, 1, '2025-07-31', '2025-07-31'),
(221, 76, 143, 1, 168, NULL, 1, '2025-07-31', '2025-07-31'),
(222, 75, 142, 1, 168, NULL, 1, '2025-07-31', '2025-07-31'),
(223, 74, 141, 1, 168, NULL, 1, '2025-07-31', '2025-07-31'),
(224, 76, 143, 1, 168, NULL, 1, '2025-07-31', '2025-07-31'),
(225, 80, 147, 1, 168, NULL, 1, '2025-07-31', '2025-07-31'),
(226, 75, 142, 1, 168, NULL, 1, '2025-07-31', '2025-07-31'),
(227, 75, 142, 1, 168, NULL, 1, '2025-07-31', '2025-07-31'),
(228, 76, 143, 1, 168, NULL, 1, '2025-07-31', '2025-07-31'),
(229, 76, 143, 1, 168, NULL, 1, '2025-07-31', '2025-07-31'),
(230, 11, 113, 1, 168, NULL, 1, '2025-07-31', '2025-07-31'),
(231, 4, 107, 1, 168, NULL, 1, '2025-07-31', '2025-07-31'),
(232, 8, 112, 1, 168, NULL, 1, '2025-07-31', '2025-07-31'),
(233, 32, 44, 3, 2, NULL, 1, '2025-08-01', '2025-08-01'),
(234, 100, 166, 1, 2, 0, 0, '2025-08-01', '2025-08-01'),
(235, 101, 167, 1, 2, 0, 0, '2025-08-01', '2025-08-01'),
(237, 103, 169, 1, 2, 0, 0, '2025-08-01', '2025-08-01'),
(238, 104, 170, 1, 2, 0, 0, '2025-08-01', '2025-08-01'),
(239, 105, 171, 1, 2, 0, 0, '2025-08-01', '2025-08-01'),
(240, 106, 172, 1, 2, 0, 0, '2025-08-01', '2025-08-01'),
(241, 107, 173, 1, 2, 0, 0, '2025-08-01', '2025-08-01'),
(242, 108, 174, 1, 2, 0, 0, '2025-08-01', '2025-08-01'),
(243, 109, 175, 1, 2, 0, 0, '2025-08-01', '2025-08-01'),
(244, 110, 176, 1, 2, 0, 0, '2025-08-01', '2025-08-01'),
(245, 111, 177, 1, 2, 0, 0, '2025-08-01', '2025-08-01'),
(246, 112, 178, 1, 2, 0, 0, '2025-08-01', '2025-08-01'),
(247, 113, 179, 1, 2, 0, 0, '2025-08-01', '2025-08-01'),
(248, 114, 180, 1, 2, 0, 0, '2025-08-01', '2025-08-01'),
(249, 115, 181, 1, 2, 0, 0, '2025-08-01', '2025-08-01'),
(250, 116, 182, 1, 2, 0, 0, '2025-08-01', '2025-08-01'),
(251, 117, 183, 1, 2, 0, 0, '2025-08-01', '2025-08-01'),
(252, 118, 184, 1, 2, 0, 0, '2025-08-01', '2025-08-01'),
(253, 119, 185, 1, 2, 0, 0, '2025-08-01', '2025-08-01'),
(254, 120, 186, 1, 2, 0, 0, '2025-08-01', '2025-08-01'),
(255, 121, 187, 1, 2, 0, 0, '2025-08-01', '2025-08-01'),
(256, 122, 188, 1, 2, 0, 0, '2025-08-01', '2025-08-01'),
(257, 123, 189, 1, 2, 0, 0, '2025-08-01', '2025-08-01'),
(258, 124, 190, 1, 2, 0, 0, '2025-08-01', '2025-08-01'),
(259, 125, 191, 1, 2, 0, 0, '2025-08-01', '2025-08-01'),
(260, 126, 192, 1, 2, 0, 0, '2025-08-01', '2025-08-01'),
(261, 127, 193, 1, 2, 0, 0, '2025-08-01', '2025-08-01'),
(262, 128, 194, 1, 2, 0, 0, '2025-08-01', '2025-08-01'),
(263, 129, 195, 1, 2, 0, 0, '2025-08-01', '2025-08-01'),
(264, 130, 196, 1, 2, 0, 0, '2025-08-01', '2025-08-01'),
(265, 131, 197, 1, 2, 0, 0, '2025-08-01', '2025-08-01'),
(266, 132, 198, 1, 2, 0, 0, '2025-08-01', '2025-08-01'),
(267, 133, 199, 1, 2, 0, 0, '2025-08-01', '2025-08-01'),
(268, 134, 200, 1, 2, 0, 0, '2025-08-01', '2025-08-01'),
(269, 135, 201, 1, 2, 0, 0, '2025-08-01', '2025-08-01'),
(270, 136, 202, 1, 2, 0, 0, '2025-08-01', '2025-08-01'),
(271, 137, 203, 1, 2, 0, 0, '2025-08-01', '2025-08-01'),
(272, 138, 204, 1, 2, 0, 0, '2025-08-01', '2025-08-01'),
(273, 139, 205, 1, 2, 0, 0, '2025-08-01', '2025-08-01'),
(274, 140, 206, 1, 2, 0, 0, '2025-08-01', '2025-08-01'),
(275, 141, 207, 1, 2, 0, 0, '2025-08-01', '2025-08-01'),
(276, 142, 208, 1, 2, 0, 0, '2025-08-01', '2025-08-01'),
(277, 143, 209, 1, 2, 0, 0, '2025-08-01', '2025-08-01'),
(278, 144, 210, 1, 2, 0, 0, '2025-08-01', '2025-08-01'),
(284, 145, 216, 1, 2, 0, 0, '2025-08-01', '2025-08-01'),
(285, 146, 217, 1, 2, 0, 0, '2025-08-01', '2025-08-01'),
(286, 147, 218, 1, 2, 0, 0, '2025-08-01', '2025-08-01'),
(287, 148, 219, 1, 2, 0, 0, '2025-08-01', '2025-08-01'),
(288, 149, 220, 1, 2, 0, 0, '2025-08-01', '2025-08-01'),
(289, 150, 221, 1, 2, 0, 0, '2025-08-01', '2025-08-01'),
(290, 151, 222, 1, 2, 0, 0, '2025-08-01', '2025-08-01'),
(291, 152, 223, 1, 2, 0, 0, '2025-08-01', '2025-08-01'),
(292, 153, 224, 1, 2, 0, 0, '2025-08-01', '2025-08-01'),
(293, 154, 225, 1, 2, 0, 0, '2025-08-01', '2025-08-01'),
(294, 102, 226, 1, 2, 0, 0, '2025-08-01', '2025-08-01'),
(295, 155, 227, 1, 2, 0, 0, '2025-08-01', '2025-08-01'),
(296, 156, 228, 1, 2, 0, 0, '2025-08-01', '2025-08-01'),
(297, 157, 229, 1, 2, 0, 0, '2025-08-01', '2025-08-01'),
(298, 158, 230, 1, 2, 0, 0, '2025-08-01', '2025-08-01'),
(299, 159, 231, 1, 2, 0, 0, '2025-08-01', '2025-08-01'),
(300, 160, 232, 1, 2, 0, 0, '2025-08-01', '2025-08-01'),
(301, 161, 233, 1, 2, 0, 0, '2025-08-01', '2025-08-01'),
(302, 162, 234, 1, 2, 0, 0, '2025-08-01', '2025-08-01'),
(303, 163, 235, 1, 2, 0, 0, '2025-08-01', '2025-08-01'),
(304, 164, 236, 1, 2, 0, 0, '2025-08-01', '2025-08-01'),
(305, 165, 237, 1, 2, 0, 0, '2025-08-01', '2025-08-01'),
(306, 166, 238, 1, 2, 0, 0, '2025-08-01', '2025-08-01'),
(307, 167, 239, 1, 2, 0, 0, '2025-08-01', '2025-08-01'),
(308, 168, 240, 1, 2, 0, 0, '2025-08-01', '2025-08-01'),
(309, 169, 241, 1, 2, 0, 0, '2025-08-01', '2025-08-01'),
(310, 170, 242, 1, 2, 0, 0, '2025-08-01', '2025-08-01'),
(311, 171, 243, 1, 2, 0, 0, '2025-08-01', '2025-08-01'),
(312, 172, 244, 1, 2, 0, 0, '2025-08-01', '2025-08-01'),
(313, 173, 245, 1, 2, 0, 0, '2025-08-01', '2025-08-01'),
(314, 174, 246, 1, 2, 0, 0, '2025-08-01', '2025-08-01'),
(315, 175, 247, 1, 2, 0, 0, '2025-08-01', '2025-08-01'),
(316, 176, 248, 1, 2, 0, 0, '2025-08-01', '2025-08-01'),
(317, 177, 249, 1, 2, 0, 0, '2025-08-01', '2025-08-01'),
(318, 4, 107, 1, 168, NULL, 1, '2025-08-04', '2025-08-04'),
(320, 77, 251, 1, 2, 0, 0, '2025-07-21', '2025-07-21'),
(321, 63, 252, 1, 2, 0, 0, '2025-07-21', '2025-07-21'),
(322, 178, 253, 1, 2, 0, 0, '2025-08-04', '2025-08-04'),
(324, 51, 255, 1, 2, 0, 0, '2025-07-21', '2025-07-21'),
(325, 179, 256, 1, 2, 0, 0, '2025-08-04', '2025-08-04'),
(326, 180, 257, 1, 2, 0, 0, '2025-08-04', '2025-08-04'),
(327, 181, 258, 1, 2, 0, 0, '2025-08-04', '2025-08-04'),
(329, 182, 260, 1, 2, 0, 0, '2025-08-04', '2025-08-04'),
(330, 52, 261, 1, 2, 0, 0, '2025-07-21', '2025-07-21'),
(331, 183, 262, 1, 2, 0, 0, '2025-08-04', '2025-08-04'),
(332, 184, 263, 1, 2, 0, 0, '2025-08-04', '2025-08-04'),
(333, 53, 264, 1, 2, 0, 0, '2025-07-21', '2025-07-21'),
(334, 185, 265, 1, 2, 0, 0, '2025-08-04', '2025-08-04'),
(335, 186, 266, 1, 2, 0, 0, '2025-08-04', '2025-08-04'),
(336, 187, 267, 1, 2, 0, 0, '2025-08-04', '2025-08-04'),
(337, 84, 268, 1, 2, 0, 0, '2025-07-21', '2025-07-21'),
(338, 188, 269, 1, 2, 0, 0, '2025-08-04', '2025-08-04'),
(339, 189, 270, 1, 2, 0, 0, '2025-08-04', '2025-08-04'),
(340, 190, 271, 1, 2, 0, 0, '2025-08-04', '2025-08-04'),
(341, 55, 272, 1, 2, 0, 0, '2025-07-21', '2025-07-21'),
(342, 191, 273, 1, 2, 0, 0, '2025-08-04', '2025-08-04'),
(343, 192, 274, 1, 2, 0, 0, '2025-08-04', '2025-08-04'),
(344, 193, 275, 1, 2, 0, 0, '2025-08-04', '2025-08-04'),
(345, 32, 44, 1, 168, NULL, 1, '2025-08-05', '2025-08-05'),
(346, 37, 49, 1, 168, NULL, 1, '2025-08-05', '2025-08-05'),
(347, 86, 98, 1, 168, NULL, 1, '2025-08-05', '2025-08-05'),
(348, 167, 239, 1, 168, NULL, 1, '2025-08-05', '2025-08-05'),
(350, 194, 277, 1, 2, 0, 0, '2025-08-05', '2025-08-05'),
(351, 195, 278, 1, 2, 0, 0, '2025-08-05', '2025-08-05'),
(352, 196, 279, 1, 2, 0, 0, '2025-08-05', '2025-08-05'),
(353, 56, 280, 1, 2, 0, 0, '2025-07-21', '2025-07-21'),
(354, 57, 281, 1, 2, 0, 0, '2025-07-21', '2025-07-21'),
(355, 197, 282, 1, 2, 0, 0, '2025-08-05', '2025-08-05'),
(356, 198, 283, 1, 2, 0, 0, '2025-08-05', '2025-08-05'),
(357, 199, 284, 1, 2, 0, 0, '2025-08-05', '2025-08-05'),
(358, 58, 285, 1, 2, 0, 0, '2025-07-21', '2025-07-21'),
(359, 200, 286, 1, 2, 0, 0, '2025-08-05', '2025-08-05'),
(360, 201, 287, 1, 2, 0, 0, '2025-08-05', '2025-08-05'),
(361, 202, 288, 1, 2, 0, 0, '2025-08-05', '2025-08-05'),
(362, 85, 289, 1, 2, 0, 0, '2025-07-21', '2025-07-21'),
(363, 203, 290, 1, 2, 0, 0, '2025-08-05', '2025-08-05'),
(364, 204, 291, 1, 2, 0, 0, '2025-08-05', '2025-08-05'),
(365, 205, 292, 1, 2, 0, 0, '2025-08-05', '2025-08-05');

-- --------------------------------------------------------

--
-- Table structure for table `production_details`
--

CREATE TABLE `production_details` (
  `pro_detailsid` int(11) NOT NULL,
  `foodid` int(11) NOT NULL,
  `pvarientid` int(11) DEFAULT NULL,
  `ingredientid` int(11) NOT NULL,
  `qty` decimal(10,2) NOT NULL DEFAULT 0.00,
  `unitid` bigint(20) DEFAULT NULL,
  `unitname` varchar(100) NOT NULL,
  `recipe_price` decimal(10,2) NOT NULL DEFAULT 0.00,
  `createdby` int(11) NOT NULL,
  `created_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `promotion_main_modifiers`
--

CREATE TABLE `promotion_main_modifiers` (
  `id` int(11) NOT NULL,
  `promotion_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `category_max_qty` int(11) NOT NULL,
  `category_weight_percent` double NOT NULL,
  `total_weight_percent` double NOT NULL,
  `total_no_of_item` int(11) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `promotion_other_modifiers`
--

CREATE TABLE `promotion_other_modifiers` (
  `id` int(11) NOT NULL,
  `promotion_id` int(11) NOT NULL,
  `modifier_set_id` int(11) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `promo_data`
--

CREATE TABLE `promo_data` (
  `id` int(11) NOT NULL,
  `promo_title` varchar(200) DEFAULT NULL,
  `promo_type` int(11) NOT NULL DEFAULT 1 COMMENT '1=Discount, 2=Free Item',
  `start_date` date DEFAULT NULL,
  `end_date` date DEFAULT NULL,
  `get_food_id` int(11) NOT NULL DEFAULT 0,
  `buy_qty` int(11) NOT NULL DEFAULT 0,
  `get_qty` int(11) NOT NULL DEFAULT 0,
  `discount_rate` int(11) NOT NULL DEFAULT 0,
  `offer_food_id` int(11) NOT NULL DEFAULT 0,
  `status` int(11) NOT NULL DEFAULT 1 COMMENT '1 = Active, 0 = Inactive',
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `purchaseitem`
--

CREATE TABLE `purchaseitem` (
  `purID` int(11) NOT NULL,
  `invoiceid` varchar(100) DEFAULT NULL,
  `suplierID` int(11) NOT NULL,
  `paymenttype` int(11) DEFAULT NULL,
  `bankid` int(11) DEFAULT NULL,
  `total_price` decimal(19,3) NOT NULL DEFAULT 0.000,
  `paid_amount` decimal(19,3) DEFAULT 0.000,
  `details` text DEFAULT NULL,
  `purchasedate` date NOT NULL,
  `purchaseexpiredate` date NOT NULL,
  `savedby` int(11) NOT NULL,
  `is_bom` int(10) NOT NULL DEFAULT 1 COMMENT '''0 => Without bill of materials, 1 => With bill of material'''
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `purchase_details`
--

CREATE TABLE `purchase_details` (
  `detailsid` int(11) NOT NULL,
  `purchaseid` int(11) NOT NULL,
  `indredientid` int(11) NOT NULL,
  `quantity` decimal(19,3) NOT NULL DEFAULT 0.000,
  `unitname` varchar(80) NOT NULL,
  `price` decimal(19,3) NOT NULL DEFAULT 0.000,
  `totalprice` decimal(19,3) NOT NULL DEFAULT 0.000,
  `purchaseby` int(11) NOT NULL,
  `is_bom` int(10) DEFAULT 1 COMMENT '0 => Without bill of materials, 1 => With bill of material',
  `purchasedate` date NOT NULL,
  `purchaseexpiredate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `purchase_return`
--

CREATE TABLE `purchase_return` (
  `preturn_id` int(11) NOT NULL,
  `supplier_id` int(11) NOT NULL,
  `po_no` varchar(120) NOT NULL,
  `return_date` date NOT NULL,
  `totalamount` float NOT NULL,
  `totaldiscount` float NOT NULL,
  `return_reason` varchar(250) NOT NULL,
  `createby` int(11) NOT NULL,
  `createdate` datetime NOT NULL,
  `updateby` int(11) NOT NULL,
  `updatedate` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `purchase_return_details`
--

CREATE TABLE `purchase_return_details` (
  `preturn_id` int(11) NOT NULL,
  `product_id` bigint(20) NOT NULL,
  `qty` int(11) NOT NULL,
  `product_rate` float NOT NULL,
  `store_id` int(11) NOT NULL,
  `discount` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `rate_type`
--

CREATE TABLE `rate_type` (
  `id` int(11) NOT NULL,
  `r_type_name` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `rate_type`
--

INSERT INTO `rate_type` (`id`, `r_type_name`) VALUES
(1, 'Hourly'),
(2, 'Salary');

-- --------------------------------------------------------

--
-- Table structure for table `reservationofday`
--

CREATE TABLE `reservationofday` (
  `offdayid` int(11) NOT NULL,
  `offdaydate` date NOT NULL,
  `availtime` varchar(50) NOT NULL,
  `is_active` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `rest_table`
--

CREATE TABLE `rest_table` (
  `tableid` int(11) NOT NULL,
  `tablename` varchar(50) NOT NULL,
  `person_capicity` int(11) NOT NULL,
  `table_icon` varchar(255) NOT NULL,
  `floor` int(11) DEFAULT 0,
  `status` int(11) NOT NULL DEFAULT 0 COMMENT '1=booked,0=free'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

--
-- Dumping data for table `rest_table`
--

INSERT INTO `rest_table` (`tableid`, `tablename`, `person_capicity`, `table_icon`, `floor`, `status`) VALUES
(1, '1', 2, 'assets/img/icons/resttable/1.png', 3, 1),
(2, '2', 4, 'assets/img/icons/resttable/4.png', 1, 1),
(3, '3', 2, 'assets/img/icons/resttable/2.png', 1, 1),
(6, '6', 3, 'assets/img/icons/resttable/3.png', 1, 1),
(7, '7', 8, 'assets/img/icons/resttable/8.png', 1, 1),
(8, '8', 4, 'assets/img/icons/resttable/4.png', 3, 1),
(9, '9', 3, 'assets/img/icons/resttable/3.png', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `role_permission`
--

CREATE TABLE `role_permission` (
  `id` int(11) NOT NULL,
  `fk_module_id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL,
  `create` tinyint(1) DEFAULT NULL,
  `read` tinyint(1) DEFAULT NULL,
  `update` tinyint(1) DEFAULT NULL,
  `delete` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `salary_setup_header`
--

CREATE TABLE `salary_setup_header` (
  `s_s_h_id` int(10) UNSIGNED NOT NULL,
  `employee_id` varchar(30) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `salary_payable` varchar(30) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `absent_deduct` varchar(30) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `tax_manager` varchar(30) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `status` varchar(30) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `salary_sheet_generate`
--

CREATE TABLE `salary_sheet_generate` (
  `ssg_id` int(10) UNSIGNED NOT NULL,
  `employee_id` varchar(20) NOT NULL,
  `name` varchar(30) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `gdate` varchar(20) DEFAULT NULL,
  `start_date` varchar(30) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `end_date` varchar(30) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `generate_by` varchar(30) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `salary_type`
--

CREATE TABLE `salary_type` (
  `salary_type_id` int(10) UNSIGNED NOT NULL,
  `sal_name` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `emp_sal_type` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `default_amount` varchar(30) NOT NULL,
  `status` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

--
-- Dumping data for table `salary_type`
--

INSERT INTO `salary_type` (`salary_type_id`, `sal_name`, `emp_sal_type`, `default_amount`, `status`) VALUES
(1, 'House Rent', '1', '', ''),
(2, 'Medical', '1', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `sec_menu_item`
--

CREATE TABLE `sec_menu_item` (
  `menu_id` int(11) NOT NULL,
  `menu_title` varchar(200) DEFAULT NULL,
  `page_url` varchar(250) DEFAULT NULL,
  `module` varchar(200) DEFAULT NULL,
  `parent_menu` int(11) DEFAULT NULL,
  `is_report` tinyint(1) DEFAULT NULL,
  `createby` int(11) NOT NULL,
  `createdate` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

--
-- Dumping data for table `sec_menu_item`
--

INSERT INTO `sec_menu_item` (`menu_id`, `menu_title`, `page_url`, `module`, `parent_menu`, `is_report`, `createby`, `createdate`) VALUES
(1, 'manage_category', '', 'itemmanage', 0, 0, 2, '2018-11-05 00:00:00'),
(2, 'category_list', 'item_category', 'itemmanage', 0, 0, 2, '2018-11-05 00:00:00'),
(3, 'add_category', 'create', 'itemmanage', 2, 0, 2, '2018-11-05 00:00:00'),
(4, 'manage_food', '', 'itemmanage', 0, 0, 2, '2018-11-05 00:00:00'),
(5, 'food_list', 'item_food', 'itemmanage', 0, 0, 2, '2018-11-05 00:00:00'),
(6, 'add_food', 'index', 'itemmanage', 5, 0, 2, '2018-11-05 00:00:00'),
(7, 'food_varient', 'foodvarientlist', 'itemmanage', 5, 0, 2, '2018-11-07 00:00:00'),
(8, 'add_varient', 'addvariant', 'itemmanage', 5, 0, 2, '2018-11-07 00:00:00'),
(9, 'food_availablity', 'availablelist', 'itemmanage', 5, 0, 2, '2018-11-07 00:00:00'),
(10, 'add_availablity', 'addavailable', 'itemmanage', 5, 0, 2, '2018-11-07 00:00:00'),
(11, 'manage_addons', '', 'itemmanage', 0, 0, 2, '2018-11-05 00:00:00'),
(12, 'addons_list', 'menu_addons', 'itemmanage', 0, 0, 2, '2018-11-05 00:00:00'),
(13, 'add_adons', 'create', 'itemmanage', 8, 0, 2, '2018-11-05 00:00:00'),
(14, 'manage_unitmeasurement', '', 'units', 0, 0, 2, '2018-11-05 00:00:00'),
(15, 'unit_list', 'unitmeasurement', 'units', 1522, 0, 2, '2018-11-05 00:00:00'),
(16, 'unit_add', 'create', 'units', 12, 0, 2, '2018-11-05 00:00:00'),
(17, 'manage_ingradient', '', 'units', 0, 0, 2, '2018-11-05 00:00:00'),
(18, 'ingradient_list', 'ingradient', 'units', 1522, 0, 2, '2018-11-05 00:00:00'),
(19, 'add_ingredient', 'create', 'units', 1522, 0, 2, '2018-11-05 00:00:00'),
(20, 'assign_adons_list', 'assignaddons', 'itemmanage', 8, 0, 2, '2018-11-06 00:00:00'),
(21, 'assign_adons', 'assignaddonscreate', 'itemmanage', 8, 0, 2, '2018-11-06 00:00:00'),
(28, 'membership_management', '', 'setting', 0, 0, 2, '2018-11-12 00:00:00'),
(29, 'membership_list', 'index', 'setting', 28, 0, 2, '2018-11-12 00:00:00'),
(30, 'membership_add', 'create', 'setting', 29, 0, 2, '2018-11-12 00:00:00'),
(31, 'payment_setting', '', 'setting', 0, 0, 2, '2018-11-12 00:00:00'),
(32, 'paymentmethod_list', 'index', 'setting', 31, 0, 2, '2018-11-12 00:00:00'),
(33, 'payment_add', 'create', 'setting', 32, 0, 2, '2018-11-12 00:00:00'),
(34, 'shipping_setting', '', 'setting', 0, 0, 2, '2018-11-12 00:00:00'),
(35, 'shipping_list', 'index', 'setting', 34, 0, 2, '2018-11-12 00:00:00'),
(36, 'shipping_add', 'create', 'setting', 35, 0, 2, '2018-11-12 00:00:00'),
(37, 'supplier_manage', '', 'setting', 0, 0, 2, '2018-11-12 00:00:00'),
(38, 'supplier_list', 'index', 'setting', 37, 0, 2, '2018-11-12 00:00:00'),
(39, 'supplier_add', 'create', 'setting', 38, 0, 2, '2018-11-12 00:00:00'),
(40, 'purchase_item', 'index', 'purchase', 0, 0, 2, '2018-11-12 00:00:00'),
(41, 'purchase_add', 'create', 'purchase', 40, 0, 2, '2018-11-12 00:00:00'),
(42, 'table_manage', '', 'setting', 0, 0, 2, '2018-11-13 00:00:00'),
(43, 'add_new_table', 'create', 'setting', 44, 0, 2, '2018-11-13 00:00:00'),
(44, 'table_list', 'restauranttable', 'setting', 42, 0, 2, '2018-11-13 00:00:00'),
(45, 'ordermanage', 'index', 'ordermanage', 0, 0, 2, '2018-11-22 00:00:00'),
(46, 'add_new_order', 'neworder', 'ordermanage', 45, 0, 2, '2018-11-22 00:00:00'),
(47, 'order_list', 'orderlist', 'ordermanage', 45, 0, 2, '2018-11-22 00:00:00'),
(48, 'pending_order', 'pendingorder', 'ordermanage', 45, 0, 2, '2018-11-22 00:00:00'),
(49, 'processing_order', 'processing', 'ordermanage', 45, 0, 2, '2018-11-22 00:00:00'),
(50, 'complete_order', 'completelist', 'ordermanage', 45, 0, 2, '2018-11-22 00:00:00'),
(51, 'cancel_order', 'cancellist', 'ordermanage', 45, 0, 2, '2018-11-22 00:00:00'),
(52, 'pos_invoice', 'pos_invoice', 'ordermanage', 45, 0, 2, '2018-11-22 00:00:00'),
(53, 'c_o_a', 'treeview', 'accounts', 0, 0, 2, '2018-12-17 00:00:00'),
(54, 'debit_voucher', 'debit_voucher', 'accounts', 0, 0, 2, '2018-12-17 00:00:00'),
(55, 'credit_voucher', 'credit_voucher', 'accounts', 0, 0, 2, '2018-12-17 00:00:00'),
(56, 'contra_voucher', 'contra_voucher', 'accounts', 0, 0, 2, '2018-12-17 00:00:00'),
(57, 'journal_voucher', 'journal_voucher', 'accounts', 0, 0, 2, '2018-12-17 00:00:00'),
(58, 'voucher_approval', 'voucher_approval', 'accounts', 0, 0, 2, '2018-12-17 00:00:00'),
(59, 'account_report', '', 'accounts', 0, 0, 2, '2018-12-17 00:00:00'),
(60, 'voucher_report', 'coa', 'accounts', 59, 0, 2, '2018-12-17 00:00:00'),
(61, 'cash_book', 'cash_book', 'accounts', 59, 0, 2, '2018-12-17 00:00:00'),
(62, 'bank_book', 'bank_book', 'accounts', 59, 0, 2, '2018-12-17 00:00:00'),
(63, 'general_ledger', 'general_ledger', 'accounts', 59, 0, 2, '2018-12-17 00:00:00'),
(64, 'trial_balance', 'trial_balance', 'accounts', 59, 0, 2, '2018-12-17 00:00:00'),
(65, 'profit_loss', 'profit_loss_report', 'accounts', 59, 0, 2, '2018-12-17 00:00:00'),
(66, 'cash_flow', 'cash_flow_report', 'accounts', 59, 0, 2, '2018-12-17 00:00:00'),
(67, 'coa_print', 'coa_print', 'accounts', 59, 0, 2, '2018-12-17 00:00:00'),
(68, 'hrm', '', 'hrm', 0, 0, 2, '2018-12-18 00:00:00'),
(69, 'attendance', 'Home', 'hrm', 0, 0, 2, '2018-12-18 00:00:00'),
(70, 'atn_form', 'atnview', 'hrm', 69, 0, 2, '2018-12-18 00:00:00'),
(71, 'atn_report', 'attendance_list', 'hrm', 69, 0, 2, '2018-12-18 00:00:00'),
(72, 'award', 'Award_controller', 'hrm', 0, 0, 2, '2018-12-18 00:00:00'),
(73, 'new_award', 'create_award', 'hrm', 72, 0, 2, '2018-12-18 00:00:00'),
(74, 'circularprocess', 'Candidate', 'hrm', 0, 0, 2, '2018-12-18 00:00:00'),
(75, 'add_canbasic_info', 'caninfo_create', 'hrm', 74, 0, 2, '2018-12-18 00:00:00'),
(76, 'can_basicinfo_list', 'canInfoview', 'hrm', 74, 0, 2, '2018-12-18 00:00:00'),
(77, 'candidate_basic_info', 'Candidate_select', 'hrm', 0, 0, 2, '2018-12-18 00:00:00'),
(78, 'candidate_shortlist', 'shortlist_form', 'hrm', 77, 0, 2, '2018-12-18 00:00:00'),
(79, 'candidate_interview', 'interview_form', 'hrm', 77, 0, 2, '2018-12-18 00:00:00'),
(80, 'candidate_selection', 'selection_form', 'hrm', 77, 0, 2, '2018-12-18 00:00:00'),
(81, 'department', 'Department_controller', 'hrm', 0, 0, 2, '2018-12-18 00:00:00'),
(82, 'departmentfrm', 'create_dept', 'hrm', 81, 0, 2, '2018-12-18 00:00:00'),
(83, 'division', 'Division_controller', 'hrm', 0, 0, 2, '2018-12-18 00:00:00'),
(84, 'add_division', 'division_form', 'hrm', 83, 0, 2, '2018-12-18 00:00:00'),
(85, 'ehrm', 'Employees', 'hrm', 0, 0, 2, '2018-12-18 00:00:00'),
(86, 'division_list', 'position_form', 'hrm', 87, 0, 2, '2018-12-18 00:00:00'),
(87, 'designation', 'create_position', 'hrm', 87, 0, 2, '2018-12-18 00:00:00'),
(88, 'add_employee', 'viewEmhistory', 'hrm', 87, 0, 2, '2018-12-18 00:00:00'),
(89, 'manage_employee', 'manageemployee', 'hrm', 87, 0, 2, '2018-12-18 00:00:00'),
(91, 'emp_sal_payment', 'paymentview', 'hrm', 87, 0, 2, '2018-12-18 00:00:00'),
(92, 'leave', 'leave', 'hrm', 0, 0, 2, '2018-12-18 00:00:00'),
(93, 'weekly_holiday', 'weeklyform', 'hrm', 92, 0, 2, '2018-12-18 00:00:00'),
(94, 'holiday', 'holiday_form', 'hrm', 92, 0, 2, '2018-12-18 00:00:00'),
(95, 'others_leave_application', 'others_leave', 'hrm', 92, 0, 2, '2018-12-18 00:00:00'),
(96, 'add_leave_type', 'leave_type_form', 'hrm', 92, 0, 2, '2018-12-18 00:00:00'),
(97, 'leave_application', 'others_leave', 'hrm', 92, 0, 2, '2018-12-18 00:00:00'),
(98, 'loan', 'loan', 'hrm', 0, 0, 2, '2018-12-18 00:00:00'),
(99, 'loan_grand', 'create_grandloan', 'hrm', 98, 0, 2, '2018-12-18 00:00:00'),
(100, 'loan_installment', 'create_installment', 'hrm', 98, 0, 2, '2018-12-19 00:00:00'),
(101, 'manage_installment', 'installmentView', 'hrm', 98, 0, 2, '2018-12-19 00:00:00'),
(102, 'manage_granted_loan', 'loan_view', 'hrm', 98, 0, 2, '2018-12-19 00:00:00'),
(103, 'loan_report', 'loan_report', 'hrm', 98, 0, 2, '2018-12-19 00:00:00'),
(104, 'payroll', 'Payroll', 'hrm', 0, 0, 2, '2018-12-19 00:00:00'),
(105, 'salary_type_setup', 'create_salary_setup', 'hrm', 104, 0, 2, '2018-12-19 00:00:00'),
(106, 'manage_salary_setup', 'emp_salary_setup_view', 'hrm', 104, 0, 2, '2018-12-19 00:00:00'),
(107, 'salary_setup', 'create_s_setup', 'hrm', 104, 0, 2, '2018-12-19 00:00:00'),
(108, 'manage_salary_type', 'salary_setup_view', 'hrm', 104, 0, 2, '2018-12-19 00:00:00'),
(109, 'salary_generate', 'create_salary_generate', 'hrm', 104, 0, 2, '2018-12-19 00:00:00'),
(110, 'manage_salary_generate', 'salary_generate_view', 'hrm', 104, 0, 2, '2018-12-19 00:00:00'),
(111, 'purchase_return', 'return_form', 'purchase', 40, 0, 2, '2018-12-19 00:00:00'),
(112, 'return_invoice', 'return_invoice', 'purchase', 40, 0, 2, '2018-12-19 00:00:00'),
(113, 'report', 'reports', 'report', 0, 0, 2, '2018-12-19 00:00:00'),
(114, 'purchase_report', 'index', 'report', 113, 0, 2, '2018-12-19 00:00:00'),
(115, 'stock_report_product_wise', 'productwise', 'report', 113, 0, 2, '2018-12-19 00:00:00'),
(116, 'purchase_report_ingredient', 'ingredientwise', 'report', 113, 0, 2, '2018-12-19 00:00:00'),
(117, 'sell_report', 'sellrpt', 'report', 113, 0, 2, '2018-12-19 00:00:00'),
(118, 'table_setting', 'tablesetting', 'setting', 44, 0, 2, '2018-12-19 00:00:00'),
(119, 'customer_type', '', 'setting', 0, 0, 2, '2018-12-19 00:00:00'),
(120, 'customertype_list', 'customertype', 'setting', 0, 0, 2, '2018-12-19 00:00:00'),
(121, 'add_type', 'create', 'setting', 120, 0, 2, '2018-12-19 00:00:00'),
(122, 'currency', '', 'setting', 0, 0, 2, '2018-12-19 00:00:00'),
(123, 'currency_list', 'currency', 'setting', 0, 0, 2, '2018-12-19 00:00:00'),
(124, 'currency_add', 'create', 'setting', 123, 0, 2, '2018-12-19 00:00:00'),
(125, 'production', '', 'production', 0, 0, 2, '2018-12-19 00:00:00'),
(126, 'production_set_list', 'production', 'production', 0, 0, 2, '2018-12-19 00:00:00'),
(127, 'set_productionunit', 'productionunit', 'production', 126, 0, 2, '2018-12-19 00:00:00'),
(128, 'production_add', 'create', 'production', 126, 0, 2, '2018-12-19 00:00:00'),
(129, 'production_list', 'addproduction', 'production', 126, 0, 2, '2018-12-19 00:00:00'),
(130, 'reservation', '', 'reservation', 0, 0, 2, '2018-12-19 00:00:00'),
(131, 'reservation_table', 'tablebooking', 'reservation', 130, 0, 2, '2018-12-19 00:00:00'),
(132, 'update_ord', 'updateorder', 'ordermanage', 45, 0, 2, '2019-12-11 00:00:00'),
(133, 'kitchen_dashboard', 'kitchen', 'ordermanage', 45, 0, 2, '2020-02-13 00:00:00'),
(134, 'counter_dashboard', 'counterboard', 'ordermanage', 45, 0, 2, '2020-02-16 00:00:00'),
(191, 'counter_list', 'counterlist', 'ordermanage', 45, 0, 2, '2021-03-28 00:00:00'),
(192, 'pos_setting', 'possetting', 'ordermanage', 45, 0, 2, '2021-03-28 00:00:00'),
(193, 'sound_setting', 'soundsetting', 'ordermanage', 45, 0, 2, '2021-03-28 00:00:00'),
(194, 'supplier_ledger', 'supplier_ledger_report', 'purchase', 38, 0, 2, '2021-03-28 00:00:00'),
(195, 'stock_out_ingredients', 'stock_out_ingredients', 'purchase', 40, 0, 2, '2021-03-28 00:00:00'),
(196, 'sell_report_items', 'sellrptItems', 'report', 117, 0, 2, '2021-01-21 00:00:00'),
(197, 'scharge_report', 'servicerpt', 'report', 113, 0, 2, '2021-01-21 00:00:00'),
(198, 'sell_report_waiters', 'sellrptwaiter', 'report', 113, 0, 2, '2021-01-21 00:00:00'),
(199, 'kitchen_sell', 'kichansrpt', 'report', 113, 0, 2, '2021-01-21 00:00:00'),
(200, 'sell_report_delvirytype', 'sellrptdelvirytype', 'report', 113, 0, 2, '2021-01-21 00:00:00'),
(201, 'sell_report_casher', 'sellrptCasher', 'report', 113, 0, 2, '2021-01-21 00:00:00'),
(202, 'unpaid_sell', 'unpaid_sell', 'report', 113, 0, 2, '2021-01-21 00:00:00'),
(203, 'sell_report_filter', 'sellrpt2', 'report', 113, 0, 2, '2021-01-21 00:00:00'),
(204, 'sele_by_date', 'sellrptbydate', 'report', 113, 0, 2, '2021-01-21 00:00:00'),
(205, 'production_setting', 'possetting', 'production', 125, 0, 2, '2021-03-28 00:00:00'),
(206, 'kitchen_setting', 'kitchensetting', 'setting', 0, 0, 2, '2021-03-28 00:00:00'),
(207, 'kitchen_assign', 'assignkitchen', 'setting', 206, 0, 2, '2021-03-28 00:00:00'),
(208, 'sms_setting', 'smsetting', 'setting', 0, 0, 2, '2021-03-28 00:00:00'),
(209, 'sms_configuration', 'sms_configuration', 'setting', 208, 0, 2, '2021-03-28 00:00:00'),
(210, 'sms_temp', 'sms_template', 'setting', 208, 0, 2, '2021-03-28 00:00:00'),
(211, 'bank', 'bank_list', 'setting', 0, 0, 2, '2021-03-28 00:00:00'),
(212, 'list_of_bank', 'index', 'setting', 211, 0, 2, '2021-03-28 00:00:00'),
(213, 'language', 'language', 'setting', 0, 0, 2, '2021-03-28 00:00:00'),
(214, 'application_setting', 'setting', 'setting', 0, 0, 2, '2021-03-28 00:00:00'),
(215, 'server_setting', 'serversetting', 'setting', 0, 0, 2, '2021-03-28 00:00:00'),
(216, 'factory_reset', 'factoryreset', 'setting', 214, 0, 2, '2021-03-28 00:00:00'),
(217, 'country', 'country_city_list', 'setting', 0, 0, 2, '2021-03-28 00:00:00'),
(218, 'state', 'statelist', 'setting', 217, 0, 2, '2021-03-28 00:00:00'),
(219, 'city', 'citylist', 'setting', 217, 0, 2, '2021-03-28 00:00:00'),
(220, 'commission', 'Commissionsetting/payroll_commission', 'setting', 0, 0, 2, '2021-03-28 00:00:00'),
(221, 'supplier_payment', 'supplier_payments', 'accounts', 59, 0, 2, '2021-03-28 00:00:00'),
(222, 'cash_adjustment', 'cash_adjustment', 'accounts', 59, 0, 2, '2021-03-28 00:00:00'),
(223, 'balance_sheet', 'balance_sheet', 'accounts', 59, 0, 2, '2021-03-28 00:00:00'),
(224, 'expense', 'Cexpense', 'hrm', 0, 0, 2, '2021-03-28 00:00:00'),
(225, 'unavailable_day', 'unavailablelist', 'reservation', 130, 0, 2, '2021-03-28 00:00:00'),
(226, 'reservasetting', 'setting', 'reservation', 130, 0, 2, '2021-03-28 00:00:00'),
(1388, 'dashboard', 'home', 'dashboard', 0, 0, 2, '2021-09-02 00:00:00'),
(1522, 'ingredmanage', 'ingradient/index', 'setting', 0, 0, 2, '2018-11-22 00:00:00'),
(1523, 'stock_adjustment', 'stock_adjustment/index', 'setting', NULL, NULL, 2, '2025-06-02 07:29:35');

-- --------------------------------------------------------

--
-- Table structure for table `sec_role_permission`
--

CREATE TABLE `sec_role_permission` (
  `id` bigint(20) NOT NULL,
  `role_id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL,
  `can_access` tinyint(1) NOT NULL,
  `can_create` tinyint(1) NOT NULL,
  `can_edit` tinyint(1) NOT NULL,
  `can_delete` tinyint(1) NOT NULL,
  `createby` int(11) NOT NULL,
  `createdate` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

--
-- Dumping data for table `sec_role_permission`
--

INSERT INTO `sec_role_permission` (`id`, `role_id`, `menu_id`, `can_access`, `can_create`, `can_edit`, `can_delete`, `createby`, `createdate`) VALUES
(1528, 4, 53, 0, 0, 0, 0, 2, '2025-06-11 03:38:30'),
(1529, 4, 54, 0, 0, 0, 0, 2, '2025-06-11 03:38:30'),
(1530, 4, 55, 0, 0, 0, 0, 2, '2025-06-11 03:38:30'),
(1531, 4, 56, 0, 0, 0, 0, 2, '2025-06-11 03:38:30'),
(1532, 4, 57, 0, 0, 0, 0, 2, '2025-06-11 03:38:30'),
(1533, 4, 58, 0, 0, 0, 0, 2, '2025-06-11 03:38:30'),
(1534, 4, 59, 0, 0, 0, 0, 2, '2025-06-11 03:38:30'),
(1535, 4, 60, 0, 0, 0, 0, 2, '2025-06-11 03:38:30'),
(1536, 4, 61, 0, 0, 0, 0, 2, '2025-06-11 03:38:30'),
(1537, 4, 62, 0, 0, 0, 0, 2, '2025-06-11 03:38:30'),
(1538, 4, 63, 0, 0, 0, 0, 2, '2025-06-11 03:38:30'),
(1539, 4, 64, 0, 0, 0, 0, 2, '2025-06-11 03:38:30'),
(1540, 4, 65, 0, 0, 0, 0, 2, '2025-06-11 03:38:30'),
(1541, 4, 66, 0, 0, 0, 0, 2, '2025-06-11 03:38:30'),
(1542, 4, 67, 0, 0, 0, 0, 2, '2025-06-11 03:38:30'),
(1543, 4, 221, 0, 0, 0, 0, 2, '2025-06-11 03:38:30'),
(1544, 4, 222, 0, 0, 0, 0, 2, '2025-06-11 03:38:30'),
(1545, 4, 223, 0, 0, 0, 0, 2, '2025-06-11 03:38:30'),
(1546, 4, 1388, 1, 1, 1, 0, 2, '2025-06-11 03:38:30'),
(1547, 4, 68, 0, 0, 0, 0, 2, '2025-06-11 03:38:30'),
(1548, 4, 69, 0, 0, 0, 0, 2, '2025-06-11 03:38:30'),
(1549, 4, 70, 0, 0, 0, 0, 2, '2025-06-11 03:38:30'),
(1550, 4, 71, 0, 0, 0, 0, 2, '2025-06-11 03:38:30'),
(1551, 4, 72, 0, 0, 0, 0, 2, '2025-06-11 03:38:30'),
(1552, 4, 73, 0, 0, 0, 0, 2, '2025-06-11 03:38:30'),
(1553, 4, 74, 0, 0, 0, 0, 2, '2025-06-11 03:38:30'),
(1554, 4, 75, 0, 0, 0, 0, 2, '2025-06-11 03:38:30'),
(1555, 4, 76, 0, 0, 0, 0, 2, '2025-06-11 03:38:30'),
(1556, 4, 77, 0, 0, 0, 0, 2, '2025-06-11 03:38:30'),
(1557, 4, 78, 0, 0, 0, 0, 2, '2025-06-11 03:38:30'),
(1558, 4, 79, 0, 0, 0, 0, 2, '2025-06-11 03:38:30'),
(1559, 4, 80, 0, 0, 0, 0, 2, '2025-06-11 03:38:30'),
(1560, 4, 81, 0, 0, 0, 0, 2, '2025-06-11 03:38:30'),
(1561, 4, 82, 0, 0, 0, 0, 2, '2025-06-11 03:38:30'),
(1562, 4, 83, 0, 0, 0, 0, 2, '2025-06-11 03:38:30'),
(1563, 4, 84, 0, 0, 0, 0, 2, '2025-06-11 03:38:30'),
(1564, 4, 85, 0, 0, 0, 0, 2, '2025-06-11 03:38:30'),
(1565, 4, 86, 0, 0, 0, 0, 2, '2025-06-11 03:38:30'),
(1566, 4, 87, 0, 0, 0, 0, 2, '2025-06-11 03:38:30'),
(1567, 4, 88, 0, 0, 0, 0, 2, '2025-06-11 03:38:30'),
(1568, 4, 89, 0, 0, 0, 0, 2, '2025-06-11 03:38:30'),
(1569, 4, 91, 0, 0, 0, 0, 2, '2025-06-11 03:38:30'),
(1570, 4, 92, 0, 0, 0, 0, 2, '2025-06-11 03:38:30'),
(1571, 4, 93, 0, 0, 0, 0, 2, '2025-06-11 03:38:30'),
(1572, 4, 94, 0, 0, 0, 0, 2, '2025-06-11 03:38:30'),
(1573, 4, 95, 0, 0, 0, 0, 2, '2025-06-11 03:38:30'),
(1574, 4, 96, 0, 0, 0, 0, 2, '2025-06-11 03:38:30'),
(1575, 4, 97, 0, 0, 0, 0, 2, '2025-06-11 03:38:30'),
(1576, 4, 98, 0, 0, 0, 0, 2, '2025-06-11 03:38:30'),
(1577, 4, 99, 0, 0, 0, 0, 2, '2025-06-11 03:38:30'),
(1578, 4, 100, 0, 0, 0, 0, 2, '2025-06-11 03:38:30'),
(1579, 4, 101, 0, 0, 0, 0, 2, '2025-06-11 03:38:30'),
(1580, 4, 102, 0, 0, 0, 0, 2, '2025-06-11 03:38:30'),
(1581, 4, 103, 0, 0, 0, 0, 2, '2025-06-11 03:38:30'),
(1582, 4, 104, 0, 0, 0, 0, 2, '2025-06-11 03:38:30'),
(1583, 4, 105, 0, 0, 0, 0, 2, '2025-06-11 03:38:30'),
(1584, 4, 106, 0, 0, 0, 0, 2, '2025-06-11 03:38:30'),
(1585, 4, 107, 0, 0, 0, 0, 2, '2025-06-11 03:38:30'),
(1586, 4, 108, 0, 0, 0, 0, 2, '2025-06-11 03:38:30'),
(1587, 4, 109, 0, 0, 0, 0, 2, '2025-06-11 03:38:30'),
(1588, 4, 110, 0, 0, 0, 0, 2, '2025-06-11 03:38:30'),
(1589, 4, 224, 0, 0, 0, 0, 2, '2025-06-11 03:38:30'),
(1590, 4, 1, 1, 1, 1, 0, 2, '2025-06-11 03:38:30'),
(1591, 4, 2, 1, 1, 1, 0, 2, '2025-06-11 03:38:30'),
(1592, 4, 3, 1, 1, 1, 0, 2, '2025-06-11 03:38:30'),
(1593, 4, 4, 1, 1, 1, 0, 2, '2025-06-11 03:38:30'),
(1594, 4, 5, 1, 1, 1, 0, 2, '2025-06-11 03:38:30'),
(1595, 4, 6, 1, 1, 1, 0, 2, '2025-06-11 03:38:30'),
(1596, 4, 7, 1, 1, 1, 0, 2, '2025-06-11 03:38:30'),
(1597, 4, 8, 1, 1, 1, 0, 2, '2025-06-11 03:38:30'),
(1598, 4, 9, 1, 1, 1, 0, 2, '2025-06-11 03:38:30'),
(1599, 4, 10, 1, 1, 1, 0, 2, '2025-06-11 03:38:30'),
(1600, 4, 11, 1, 1, 1, 0, 2, '2025-06-11 03:38:30'),
(1601, 4, 12, 1, 1, 1, 0, 2, '2025-06-11 03:38:30'),
(1602, 4, 13, 1, 1, 1, 0, 2, '2025-06-11 03:38:30'),
(1603, 4, 20, 1, 1, 1, 0, 2, '2025-06-11 03:38:30'),
(1604, 4, 21, 1, 1, 1, 0, 2, '2025-06-11 03:38:30'),
(1605, 4, 45, 1, 1, 1, 0, 2, '2025-06-11 03:38:30'),
(1606, 4, 46, 1, 1, 1, 0, 2, '2025-06-11 03:38:30'),
(1607, 4, 47, 1, 1, 1, 0, 2, '2025-06-11 03:38:30'),
(1608, 4, 48, 1, 1, 1, 0, 2, '2025-06-11 03:38:30'),
(1609, 4, 49, 1, 1, 1, 0, 2, '2025-06-11 03:38:30'),
(1610, 4, 50, 1, 1, 1, 0, 2, '2025-06-11 03:38:30'),
(1611, 4, 51, 1, 1, 1, 0, 2, '2025-06-11 03:38:30'),
(1612, 4, 52, 1, 1, 1, 0, 2, '2025-06-11 03:38:30'),
(1613, 4, 132, 1, 1, 1, 0, 2, '2025-06-11 03:38:30'),
(1614, 4, 133, 1, 1, 1, 0, 2, '2025-06-11 03:38:30'),
(1615, 4, 134, 1, 1, 1, 0, 2, '2025-06-11 03:38:30'),
(1616, 4, 191, 1, 1, 1, 0, 2, '2025-06-11 03:38:30'),
(1617, 4, 192, 1, 1, 1, 0, 2, '2025-06-11 03:38:30'),
(1618, 4, 193, 1, 1, 1, 0, 2, '2025-06-11 03:38:30'),
(1619, 4, 125, 1, 1, 1, 0, 2, '2025-06-11 03:38:30'),
(1620, 4, 126, 1, 1, 1, 0, 2, '2025-06-11 03:38:30'),
(1621, 4, 127, 1, 1, 1, 0, 2, '2025-06-11 03:38:30'),
(1622, 4, 128, 1, 1, 1, 0, 2, '2025-06-11 03:38:30'),
(1623, 4, 129, 1, 1, 1, 0, 2, '2025-06-11 03:38:30'),
(1624, 4, 205, 1, 1, 1, 0, 2, '2025-06-11 03:38:30'),
(1625, 4, 40, 1, 1, 1, 0, 2, '2025-06-11 03:38:30'),
(1626, 4, 41, 1, 1, 1, 0, 2, '2025-06-11 03:38:30'),
(1627, 4, 111, 1, 1, 1, 0, 2, '2025-06-11 03:38:30'),
(1628, 4, 112, 1, 1, 1, 0, 2, '2025-06-11 03:38:30'),
(1629, 4, 194, 1, 1, 1, 0, 2, '2025-06-11 03:38:30'),
(1630, 4, 195, 1, 1, 1, 0, 2, '2025-06-11 03:38:30'),
(1631, 4, 113, 1, 1, 1, 0, 2, '2025-06-11 03:38:30'),
(1632, 4, 114, 1, 1, 1, 0, 2, '2025-06-11 03:38:30'),
(1633, 4, 115, 1, 1, 1, 0, 2, '2025-06-11 03:38:30'),
(1634, 4, 116, 1, 1, 1, 0, 2, '2025-06-11 03:38:30'),
(1635, 4, 117, 1, 1, 1, 0, 2, '2025-06-11 03:38:30'),
(1636, 4, 196, 1, 1, 1, 0, 2, '2025-06-11 03:38:30'),
(1637, 4, 197, 1, 1, 1, 0, 2, '2025-06-11 03:38:30'),
(1638, 4, 198, 1, 1, 1, 0, 2, '2025-06-11 03:38:30'),
(1639, 4, 199, 1, 1, 1, 0, 2, '2025-06-11 03:38:30'),
(1640, 4, 200, 1, 1, 1, 0, 2, '2025-06-11 03:38:30'),
(1641, 4, 201, 1, 1, 1, 0, 2, '2025-06-11 03:38:30'),
(1642, 4, 202, 1, 1, 1, 0, 2, '2025-06-11 03:38:30'),
(1643, 4, 203, 1, 1, 1, 0, 2, '2025-06-11 03:38:30'),
(1644, 4, 204, 1, 1, 1, 0, 2, '2025-06-11 03:38:30'),
(1645, 4, 130, 1, 1, 1, 0, 2, '2025-06-11 03:38:30'),
(1646, 4, 131, 1, 1, 1, 0, 2, '2025-06-11 03:38:30'),
(1647, 4, 225, 1, 1, 1, 0, 2, '2025-06-11 03:38:30'),
(1648, 4, 226, 1, 1, 1, 0, 2, '2025-06-11 03:38:30'),
(1649, 4, 28, 1, 1, 1, 0, 2, '2025-06-11 03:38:30'),
(1650, 4, 29, 1, 1, 1, 0, 2, '2025-06-11 03:38:30'),
(1651, 4, 30, 1, 1, 1, 0, 2, '2025-06-11 03:38:30'),
(1652, 4, 31, 1, 1, 1, 0, 2, '2025-06-11 03:38:30'),
(1653, 4, 32, 1, 1, 1, 0, 2, '2025-06-11 03:38:30'),
(1654, 4, 33, 1, 1, 1, 0, 2, '2025-06-11 03:38:30'),
(1655, 4, 34, 1, 1, 1, 0, 2, '2025-06-11 03:38:30'),
(1656, 4, 35, 1, 1, 1, 0, 2, '2025-06-11 03:38:30'),
(1657, 4, 36, 1, 1, 1, 0, 2, '2025-06-11 03:38:30'),
(1658, 4, 37, 1, 1, 1, 0, 2, '2025-06-11 03:38:30'),
(1659, 4, 38, 1, 1, 1, 0, 2, '2025-06-11 03:38:30'),
(1660, 4, 39, 1, 1, 1, 0, 2, '2025-06-11 03:38:30'),
(1661, 4, 42, 1, 1, 1, 0, 2, '2025-06-11 03:38:30'),
(1662, 4, 43, 1, 1, 1, 0, 2, '2025-06-11 03:38:30'),
(1663, 4, 44, 1, 1, 1, 0, 2, '2025-06-11 03:38:30'),
(1664, 4, 118, 1, 1, 1, 0, 2, '2025-06-11 03:38:30'),
(1665, 4, 119, 1, 1, 1, 0, 2, '2025-06-11 03:38:30'),
(1666, 4, 120, 1, 1, 1, 0, 2, '2025-06-11 03:38:30'),
(1667, 4, 121, 1, 1, 1, 0, 2, '2025-06-11 03:38:30'),
(1668, 4, 122, 1, 1, 1, 0, 2, '2025-06-11 03:38:30'),
(1669, 4, 123, 1, 1, 1, 0, 2, '2025-06-11 03:38:30'),
(1670, 4, 124, 1, 1, 1, 0, 2, '2025-06-11 03:38:30'),
(1671, 4, 206, 1, 1, 1, 0, 2, '2025-06-11 03:38:30'),
(1672, 4, 207, 1, 1, 1, 0, 2, '2025-06-11 03:38:30'),
(1673, 4, 208, 1, 1, 1, 0, 2, '2025-06-11 03:38:30'),
(1674, 4, 209, 1, 1, 1, 0, 2, '2025-06-11 03:38:30'),
(1675, 4, 210, 1, 1, 1, 0, 2, '2025-06-11 03:38:30'),
(1676, 4, 211, 1, 1, 1, 0, 2, '2025-06-11 03:38:30'),
(1677, 4, 212, 1, 1, 1, 0, 2, '2025-06-11 03:38:30'),
(1678, 4, 213, 1, 1, 1, 0, 2, '2025-06-11 03:38:30'),
(1679, 4, 214, 1, 1, 1, 0, 2, '2025-06-11 03:38:30'),
(1680, 4, 215, 1, 1, 1, 0, 2, '2025-06-11 03:38:30'),
(1681, 4, 216, 1, 1, 1, 0, 2, '2025-06-11 03:38:30'),
(1682, 4, 217, 1, 1, 1, 0, 2, '2025-06-11 03:38:30'),
(1683, 4, 218, 1, 1, 1, 0, 2, '2025-06-11 03:38:30'),
(1684, 4, 219, 1, 1, 1, 0, 2, '2025-06-11 03:38:30'),
(1685, 4, 220, 1, 1, 1, 0, 2, '2025-06-11 03:38:30'),
(1686, 4, 1522, 1, 1, 1, 0, 2, '2025-06-11 03:38:30'),
(1687, 4, 1523, 1, 1, 1, 0, 2, '2025-06-11 03:38:30'),
(1688, 4, 14, 1, 1, 1, 0, 2, '2025-06-11 03:38:30'),
(1689, 4, 15, 1, 1, 1, 0, 2, '2025-06-11 03:38:30'),
(1690, 4, 16, 1, 1, 1, 0, 2, '2025-06-11 03:38:30'),
(1691, 4, 17, 1, 1, 1, 0, 2, '2025-06-11 03:38:30'),
(1692, 4, 18, 1, 1, 1, 0, 2, '2025-06-11 03:38:30'),
(1693, 4, 19, 1, 1, 1, 0, 2, '2025-06-11 03:38:30'),
(2026, 1, 53, 0, 0, 0, 0, 2, '2025-08-04 03:02:00'),
(2027, 1, 54, 0, 0, 0, 0, 2, '2025-08-04 03:02:00'),
(2028, 1, 55, 0, 0, 0, 0, 2, '2025-08-04 03:02:00'),
(2029, 1, 56, 0, 0, 0, 0, 2, '2025-08-04 03:02:00'),
(2030, 1, 57, 0, 0, 0, 0, 2, '2025-08-04 03:02:00'),
(2031, 1, 58, 0, 0, 0, 0, 2, '2025-08-04 03:02:00'),
(2032, 1, 59, 0, 0, 0, 0, 2, '2025-08-04 03:02:00'),
(2033, 1, 60, 0, 0, 0, 0, 2, '2025-08-04 03:02:00'),
(2034, 1, 61, 0, 0, 0, 0, 2, '2025-08-04 03:02:00'),
(2035, 1, 62, 0, 0, 0, 0, 2, '2025-08-04 03:02:00'),
(2036, 1, 63, 0, 0, 0, 0, 2, '2025-08-04 03:02:00'),
(2037, 1, 64, 0, 0, 0, 0, 2, '2025-08-04 03:02:00'),
(2038, 1, 65, 0, 0, 0, 0, 2, '2025-08-04 03:02:00'),
(2039, 1, 66, 0, 0, 0, 0, 2, '2025-08-04 03:02:00'),
(2040, 1, 67, 0, 0, 0, 0, 2, '2025-08-04 03:02:00'),
(2041, 1, 221, 0, 0, 0, 0, 2, '2025-08-04 03:02:00'),
(2042, 1, 222, 0, 0, 0, 0, 2, '2025-08-04 03:02:00'),
(2043, 1, 223, 0, 0, 0, 0, 2, '2025-08-04 03:02:00'),
(2044, 1, 1388, 1, 1, 1, 0, 2, '2025-08-04 03:02:00'),
(2045, 1, 68, 0, 0, 0, 0, 2, '2025-08-04 03:02:00'),
(2046, 1, 69, 0, 0, 0, 0, 2, '2025-08-04 03:02:00'),
(2047, 1, 70, 0, 0, 0, 0, 2, '2025-08-04 03:02:00'),
(2048, 1, 71, 0, 0, 0, 0, 2, '2025-08-04 03:02:00'),
(2049, 1, 72, 0, 0, 0, 0, 2, '2025-08-04 03:02:00'),
(2050, 1, 73, 0, 0, 0, 0, 2, '2025-08-04 03:02:00'),
(2051, 1, 74, 0, 0, 0, 0, 2, '2025-08-04 03:02:00'),
(2052, 1, 75, 0, 0, 0, 0, 2, '2025-08-04 03:02:00'),
(2053, 1, 76, 0, 0, 0, 0, 2, '2025-08-04 03:02:00'),
(2054, 1, 77, 0, 0, 0, 0, 2, '2025-08-04 03:02:00'),
(2055, 1, 78, 0, 0, 0, 0, 2, '2025-08-04 03:02:00'),
(2056, 1, 79, 0, 0, 0, 0, 2, '2025-08-04 03:02:00'),
(2057, 1, 80, 0, 0, 0, 0, 2, '2025-08-04 03:02:00'),
(2058, 1, 81, 0, 0, 0, 0, 2, '2025-08-04 03:02:00'),
(2059, 1, 82, 0, 0, 0, 0, 2, '2025-08-04 03:02:00'),
(2060, 1, 83, 0, 0, 0, 0, 2, '2025-08-04 03:02:00'),
(2061, 1, 84, 0, 0, 0, 0, 2, '2025-08-04 03:02:00'),
(2062, 1, 85, 0, 0, 0, 0, 2, '2025-08-04 03:02:00'),
(2063, 1, 86, 0, 0, 0, 0, 2, '2025-08-04 03:02:00'),
(2064, 1, 87, 0, 0, 0, 0, 2, '2025-08-04 03:02:00'),
(2065, 1, 88, 0, 0, 0, 0, 2, '2025-08-04 03:02:00'),
(2066, 1, 89, 0, 0, 0, 0, 2, '2025-08-04 03:02:00'),
(2067, 1, 91, 0, 0, 0, 0, 2, '2025-08-04 03:02:00'),
(2068, 1, 92, 0, 0, 0, 0, 2, '2025-08-04 03:02:00'),
(2069, 1, 93, 0, 0, 0, 0, 2, '2025-08-04 03:02:00'),
(2070, 1, 94, 0, 0, 0, 0, 2, '2025-08-04 03:02:00'),
(2071, 1, 95, 0, 0, 0, 0, 2, '2025-08-04 03:02:00'),
(2072, 1, 96, 0, 0, 0, 0, 2, '2025-08-04 03:02:00'),
(2073, 1, 97, 0, 0, 0, 0, 2, '2025-08-04 03:02:00'),
(2074, 1, 98, 0, 0, 0, 0, 2, '2025-08-04 03:02:00'),
(2075, 1, 99, 0, 0, 0, 0, 2, '2025-08-04 03:02:00'),
(2076, 1, 100, 0, 0, 0, 0, 2, '2025-08-04 03:02:00'),
(2077, 1, 101, 0, 0, 0, 0, 2, '2025-08-04 03:02:00'),
(2078, 1, 102, 0, 0, 0, 0, 2, '2025-08-04 03:02:00'),
(2079, 1, 103, 0, 0, 0, 0, 2, '2025-08-04 03:02:00'),
(2080, 1, 104, 0, 0, 0, 0, 2, '2025-08-04 03:02:00'),
(2081, 1, 105, 0, 0, 0, 0, 2, '2025-08-04 03:02:00'),
(2082, 1, 106, 0, 0, 0, 0, 2, '2025-08-04 03:02:00'),
(2083, 1, 107, 0, 0, 0, 0, 2, '2025-08-04 03:02:00'),
(2084, 1, 108, 0, 0, 0, 0, 2, '2025-08-04 03:02:00'),
(2085, 1, 109, 0, 0, 0, 0, 2, '2025-08-04 03:02:00'),
(2086, 1, 110, 0, 0, 0, 0, 2, '2025-08-04 03:02:00'),
(2087, 1, 224, 0, 0, 0, 0, 2, '2025-08-04 03:02:00'),
(2088, 1, 1, 0, 0, 0, 0, 2, '2025-08-04 03:02:00'),
(2089, 1, 2, 0, 0, 0, 0, 2, '2025-08-04 03:02:00'),
(2090, 1, 3, 0, 0, 0, 0, 2, '2025-08-04 03:02:00'),
(2091, 1, 4, 0, 0, 0, 0, 2, '2025-08-04 03:02:00'),
(2092, 1, 5, 0, 0, 0, 0, 2, '2025-08-04 03:02:00'),
(2093, 1, 6, 0, 0, 0, 0, 2, '2025-08-04 03:02:00'),
(2094, 1, 7, 0, 0, 0, 0, 2, '2025-08-04 03:02:00'),
(2095, 1, 8, 0, 0, 0, 0, 2, '2025-08-04 03:02:00'),
(2096, 1, 9, 0, 0, 0, 0, 2, '2025-08-04 03:02:00'),
(2097, 1, 10, 0, 0, 0, 0, 2, '2025-08-04 03:02:00'),
(2098, 1, 11, 0, 0, 0, 0, 2, '2025-08-04 03:02:00'),
(2099, 1, 12, 0, 0, 0, 0, 2, '2025-08-04 03:02:00'),
(2100, 1, 13, 0, 0, 0, 0, 2, '2025-08-04 03:02:00'),
(2101, 1, 20, 0, 0, 0, 0, 2, '2025-08-04 03:02:00'),
(2102, 1, 21, 0, 0, 0, 0, 2, '2025-08-04 03:02:00'),
(2103, 1, 45, 1, 1, 1, 0, 2, '2025-08-04 03:02:00'),
(2104, 1, 46, 1, 1, 1, 0, 2, '2025-08-04 03:02:00'),
(2105, 1, 47, 1, 1, 1, 0, 2, '2025-08-04 03:02:00'),
(2106, 1, 48, 1, 1, 1, 0, 2, '2025-08-04 03:02:00'),
(2107, 1, 49, 1, 1, 1, 0, 2, '2025-08-04 03:02:00'),
(2108, 1, 50, 1, 1, 1, 0, 2, '2025-08-04 03:02:00'),
(2109, 1, 51, 1, 1, 1, 0, 2, '2025-08-04 03:02:00'),
(2110, 1, 52, 0, 0, 0, 0, 2, '2025-08-04 03:02:00'),
(2111, 1, 132, 1, 1, 1, 0, 2, '2025-08-04 03:02:00'),
(2112, 1, 133, 1, 1, 1, 0, 2, '2025-08-04 03:02:00'),
(2113, 1, 134, 1, 1, 1, 0, 2, '2025-08-04 03:02:00'),
(2114, 1, 191, 1, 1, 1, 0, 2, '2025-08-04 03:02:00'),
(2115, 1, 192, 1, 1, 1, 0, 2, '2025-08-04 03:02:00'),
(2116, 1, 193, 1, 1, 1, 0, 2, '2025-08-04 03:02:00'),
(2117, 1, 125, 0, 0, 0, 0, 2, '2025-08-04 03:02:00'),
(2118, 1, 126, 0, 0, 0, 0, 2, '2025-08-04 03:02:00'),
(2119, 1, 127, 0, 0, 0, 0, 2, '2025-08-04 03:02:00'),
(2120, 1, 128, 0, 0, 0, 0, 2, '2025-08-04 03:02:00'),
(2121, 1, 129, 0, 0, 0, 0, 2, '2025-08-04 03:02:00'),
(2122, 1, 205, 0, 0, 0, 0, 2, '2025-08-04 03:02:00'),
(2123, 1, 40, 0, 0, 0, 0, 2, '2025-08-04 03:02:00'),
(2124, 1, 41, 0, 0, 0, 0, 2, '2025-08-04 03:02:00'),
(2125, 1, 111, 0, 0, 0, 0, 2, '2025-08-04 03:02:00'),
(2126, 1, 112, 0, 0, 0, 0, 2, '2025-08-04 03:02:00'),
(2127, 1, 194, 0, 0, 0, 0, 2, '2025-08-04 03:02:00'),
(2128, 1, 195, 0, 0, 0, 0, 2, '2025-08-04 03:02:00'),
(2129, 1, 113, 0, 0, 0, 0, 2, '2025-08-04 03:02:00'),
(2130, 1, 114, 0, 0, 0, 0, 2, '2025-08-04 03:02:00'),
(2131, 1, 115, 0, 0, 0, 0, 2, '2025-08-04 03:02:00'),
(2132, 1, 116, 0, 0, 0, 0, 2, '2025-08-04 03:02:00'),
(2133, 1, 117, 0, 0, 0, 0, 2, '2025-08-04 03:02:00'),
(2134, 1, 196, 0, 0, 0, 0, 2, '2025-08-04 03:02:00'),
(2135, 1, 197, 0, 0, 0, 0, 2, '2025-08-04 03:02:00'),
(2136, 1, 198, 0, 0, 0, 0, 2, '2025-08-04 03:02:00'),
(2137, 1, 199, 0, 0, 0, 0, 2, '2025-08-04 03:02:00'),
(2138, 1, 200, 0, 0, 0, 0, 2, '2025-08-04 03:02:00'),
(2139, 1, 201, 0, 0, 0, 0, 2, '2025-08-04 03:02:00'),
(2140, 1, 202, 0, 0, 0, 0, 2, '2025-08-04 03:02:00'),
(2141, 1, 203, 0, 0, 0, 0, 2, '2025-08-04 03:02:00'),
(2142, 1, 204, 0, 0, 0, 0, 2, '2025-08-04 03:02:00'),
(2143, 1, 130, 0, 0, 0, 0, 2, '2025-08-04 03:02:00'),
(2144, 1, 131, 0, 0, 0, 0, 2, '2025-08-04 03:02:00'),
(2145, 1, 225, 0, 0, 0, 0, 2, '2025-08-04 03:02:00'),
(2146, 1, 226, 0, 0, 0, 0, 2, '2025-08-04 03:02:00'),
(2147, 1, 28, 0, 0, 0, 0, 2, '2025-08-04 03:02:00'),
(2148, 1, 29, 0, 0, 0, 0, 2, '2025-08-04 03:02:00'),
(2149, 1, 30, 0, 0, 0, 0, 2, '2025-08-04 03:02:00'),
(2150, 1, 31, 0, 0, 0, 0, 2, '2025-08-04 03:02:00'),
(2151, 1, 32, 0, 0, 0, 0, 2, '2025-08-04 03:02:00'),
(2152, 1, 33, 0, 0, 0, 0, 2, '2025-08-04 03:02:00'),
(2153, 1, 34, 0, 0, 0, 0, 2, '2025-08-04 03:02:00'),
(2154, 1, 35, 0, 0, 0, 0, 2, '2025-08-04 03:02:00'),
(2155, 1, 36, 0, 0, 0, 0, 2, '2025-08-04 03:02:00'),
(2156, 1, 37, 0, 0, 0, 0, 2, '2025-08-04 03:02:00'),
(2157, 1, 38, 0, 0, 0, 0, 2, '2025-08-04 03:02:00'),
(2158, 1, 39, 0, 0, 0, 0, 2, '2025-08-04 03:02:00'),
(2159, 1, 42, 0, 0, 0, 0, 2, '2025-08-04 03:02:00'),
(2160, 1, 43, 0, 0, 0, 0, 2, '2025-08-04 03:02:00'),
(2161, 1, 44, 0, 0, 0, 0, 2, '2025-08-04 03:02:00'),
(2162, 1, 118, 0, 0, 0, 0, 2, '2025-08-04 03:02:00'),
(2163, 1, 119, 0, 0, 0, 0, 2, '2025-08-04 03:02:00'),
(2164, 1, 120, 0, 0, 0, 0, 2, '2025-08-04 03:02:00'),
(2165, 1, 121, 0, 0, 0, 0, 2, '2025-08-04 03:02:00'),
(2166, 1, 122, 0, 0, 0, 0, 2, '2025-08-04 03:02:00'),
(2167, 1, 123, 0, 0, 0, 0, 2, '2025-08-04 03:02:00'),
(2168, 1, 124, 0, 0, 0, 0, 2, '2025-08-04 03:02:00'),
(2169, 1, 206, 0, 0, 0, 0, 2, '2025-08-04 03:02:00'),
(2170, 1, 207, 0, 0, 0, 0, 2, '2025-08-04 03:02:00'),
(2171, 1, 208, 0, 0, 0, 0, 2, '2025-08-04 03:02:00'),
(2172, 1, 209, 0, 0, 0, 0, 2, '2025-08-04 03:02:00'),
(2173, 1, 210, 0, 0, 0, 0, 2, '2025-08-04 03:02:00'),
(2174, 1, 211, 0, 0, 0, 0, 2, '2025-08-04 03:02:00'),
(2175, 1, 212, 0, 0, 0, 0, 2, '2025-08-04 03:02:00'),
(2176, 1, 213, 0, 0, 0, 0, 2, '2025-08-04 03:02:00'),
(2177, 1, 214, 0, 0, 0, 0, 2, '2025-08-04 03:02:00'),
(2178, 1, 215, 0, 0, 0, 0, 2, '2025-08-04 03:02:00'),
(2179, 1, 216, 0, 0, 0, 0, 2, '2025-08-04 03:02:00'),
(2180, 1, 217, 0, 0, 0, 0, 2, '2025-08-04 03:02:00'),
(2181, 1, 218, 0, 0, 0, 0, 2, '2025-08-04 03:02:00'),
(2182, 1, 219, 0, 0, 0, 0, 2, '2025-08-04 03:02:00'),
(2183, 1, 220, 0, 0, 0, 0, 2, '2025-08-04 03:02:00'),
(2184, 1, 1522, 1, 1, 1, 0, 2, '2025-08-04 03:02:00'),
(2185, 1, 1523, 1, 1, 1, 0, 2, '2025-08-04 03:02:00'),
(2186, 1, 14, 0, 0, 0, 0, 2, '2025-08-04 03:02:00'),
(2187, 1, 15, 0, 0, 0, 0, 2, '2025-08-04 03:02:00'),
(2188, 1, 16, 0, 0, 0, 0, 2, '2025-08-04 03:02:00'),
(2189, 1, 17, 0, 0, 0, 0, 2, '2025-08-04 03:02:00'),
(2190, 1, 18, 0, 0, 0, 0, 2, '2025-08-04 03:02:00'),
(2191, 1, 19, 0, 0, 0, 0, 2, '2025-08-04 03:02:00'),
(2192, 3, 53, 0, 0, 0, 0, 2, '2025-08-04 04:30:23'),
(2193, 3, 54, 0, 0, 0, 0, 2, '2025-08-04 04:30:23'),
(2194, 3, 55, 0, 0, 0, 0, 2, '2025-08-04 04:30:23'),
(2195, 3, 56, 0, 0, 0, 0, 2, '2025-08-04 04:30:23'),
(2196, 3, 57, 0, 0, 0, 0, 2, '2025-08-04 04:30:23'),
(2197, 3, 58, 0, 0, 0, 0, 2, '2025-08-04 04:30:23'),
(2198, 3, 59, 0, 0, 0, 0, 2, '2025-08-04 04:30:23'),
(2199, 3, 60, 0, 0, 0, 0, 2, '2025-08-04 04:30:23'),
(2200, 3, 61, 0, 0, 0, 0, 2, '2025-08-04 04:30:23'),
(2201, 3, 62, 0, 0, 0, 0, 2, '2025-08-04 04:30:23'),
(2202, 3, 63, 0, 0, 0, 0, 2, '2025-08-04 04:30:23'),
(2203, 3, 64, 0, 0, 0, 0, 2, '2025-08-04 04:30:23'),
(2204, 3, 65, 0, 0, 0, 0, 2, '2025-08-04 04:30:23'),
(2205, 3, 66, 0, 0, 0, 0, 2, '2025-08-04 04:30:23'),
(2206, 3, 67, 0, 0, 0, 0, 2, '2025-08-04 04:30:23'),
(2207, 3, 221, 0, 0, 0, 0, 2, '2025-08-04 04:30:23'),
(2208, 3, 222, 0, 0, 0, 0, 2, '2025-08-04 04:30:23'),
(2209, 3, 223, 0, 0, 0, 0, 2, '2025-08-04 04:30:23'),
(2210, 3, 1388, 1, 1, 1, 1, 2, '2025-08-04 04:30:23'),
(2211, 3, 68, 0, 0, 0, 0, 2, '2025-08-04 04:30:23'),
(2212, 3, 69, 0, 0, 0, 0, 2, '2025-08-04 04:30:23'),
(2213, 3, 70, 0, 0, 0, 0, 2, '2025-08-04 04:30:23'),
(2214, 3, 71, 0, 0, 0, 0, 2, '2025-08-04 04:30:23'),
(2215, 3, 72, 0, 0, 0, 0, 2, '2025-08-04 04:30:23'),
(2216, 3, 73, 0, 0, 0, 0, 2, '2025-08-04 04:30:23'),
(2217, 3, 74, 0, 0, 0, 0, 2, '2025-08-04 04:30:23'),
(2218, 3, 75, 0, 0, 0, 0, 2, '2025-08-04 04:30:23'),
(2219, 3, 76, 0, 0, 0, 0, 2, '2025-08-04 04:30:23'),
(2220, 3, 77, 0, 0, 0, 0, 2, '2025-08-04 04:30:23'),
(2221, 3, 78, 0, 0, 0, 0, 2, '2025-08-04 04:30:23'),
(2222, 3, 79, 0, 0, 0, 0, 2, '2025-08-04 04:30:23'),
(2223, 3, 80, 0, 0, 0, 0, 2, '2025-08-04 04:30:23'),
(2224, 3, 81, 0, 0, 0, 0, 2, '2025-08-04 04:30:23'),
(2225, 3, 82, 0, 0, 0, 0, 2, '2025-08-04 04:30:23'),
(2226, 3, 83, 0, 0, 0, 0, 2, '2025-08-04 04:30:23'),
(2227, 3, 84, 0, 0, 0, 0, 2, '2025-08-04 04:30:23'),
(2228, 3, 85, 0, 0, 0, 0, 2, '2025-08-04 04:30:23'),
(2229, 3, 86, 0, 0, 0, 0, 2, '2025-08-04 04:30:23'),
(2230, 3, 87, 0, 0, 0, 0, 2, '2025-08-04 04:30:23'),
(2231, 3, 88, 0, 0, 0, 0, 2, '2025-08-04 04:30:23'),
(2232, 3, 89, 0, 0, 0, 0, 2, '2025-08-04 04:30:23'),
(2233, 3, 91, 0, 0, 0, 0, 2, '2025-08-04 04:30:23'),
(2234, 3, 92, 0, 0, 0, 0, 2, '2025-08-04 04:30:23'),
(2235, 3, 93, 0, 0, 0, 0, 2, '2025-08-04 04:30:23'),
(2236, 3, 94, 0, 0, 0, 0, 2, '2025-08-04 04:30:23'),
(2237, 3, 95, 0, 0, 0, 0, 2, '2025-08-04 04:30:23'),
(2238, 3, 96, 0, 0, 0, 0, 2, '2025-08-04 04:30:23'),
(2239, 3, 97, 0, 0, 0, 0, 2, '2025-08-04 04:30:23'),
(2240, 3, 98, 0, 0, 0, 0, 2, '2025-08-04 04:30:23'),
(2241, 3, 99, 0, 0, 0, 0, 2, '2025-08-04 04:30:23'),
(2242, 3, 100, 0, 0, 0, 0, 2, '2025-08-04 04:30:23'),
(2243, 3, 101, 0, 0, 0, 0, 2, '2025-08-04 04:30:23'),
(2244, 3, 102, 0, 0, 0, 0, 2, '2025-08-04 04:30:23'),
(2245, 3, 103, 0, 0, 0, 0, 2, '2025-08-04 04:30:23'),
(2246, 3, 104, 0, 0, 0, 0, 2, '2025-08-04 04:30:23'),
(2247, 3, 105, 0, 0, 0, 0, 2, '2025-08-04 04:30:23'),
(2248, 3, 106, 0, 0, 0, 0, 2, '2025-08-04 04:30:23'),
(2249, 3, 107, 0, 0, 0, 0, 2, '2025-08-04 04:30:23'),
(2250, 3, 108, 0, 0, 0, 0, 2, '2025-08-04 04:30:23'),
(2251, 3, 109, 0, 0, 0, 0, 2, '2025-08-04 04:30:23'),
(2252, 3, 110, 0, 0, 0, 0, 2, '2025-08-04 04:30:23'),
(2253, 3, 224, 0, 0, 0, 0, 2, '2025-08-04 04:30:23'),
(2254, 3, 1, 0, 0, 0, 0, 2, '2025-08-04 04:30:23'),
(2255, 3, 2, 0, 0, 0, 0, 2, '2025-08-04 04:30:23'),
(2256, 3, 3, 0, 0, 0, 0, 2, '2025-08-04 04:30:23'),
(2257, 3, 4, 0, 0, 0, 0, 2, '2025-08-04 04:30:23'),
(2258, 3, 5, 0, 0, 0, 0, 2, '2025-08-04 04:30:23'),
(2259, 3, 6, 0, 0, 0, 0, 2, '2025-08-04 04:30:23'),
(2260, 3, 7, 0, 0, 0, 0, 2, '2025-08-04 04:30:23'),
(2261, 3, 8, 0, 0, 0, 0, 2, '2025-08-04 04:30:23'),
(2262, 3, 9, 0, 0, 0, 0, 2, '2025-08-04 04:30:23'),
(2263, 3, 10, 0, 0, 0, 0, 2, '2025-08-04 04:30:23'),
(2264, 3, 11, 0, 0, 0, 0, 2, '2025-08-04 04:30:23'),
(2265, 3, 12, 0, 0, 0, 0, 2, '2025-08-04 04:30:23'),
(2266, 3, 13, 0, 0, 0, 0, 2, '2025-08-04 04:30:23'),
(2267, 3, 20, 0, 0, 0, 0, 2, '2025-08-04 04:30:23'),
(2268, 3, 21, 0, 0, 0, 0, 2, '2025-08-04 04:30:23'),
(2269, 3, 45, 1, 1, 1, 0, 2, '2025-08-04 04:30:23'),
(2270, 3, 46, 1, 1, 1, 0, 2, '2025-08-04 04:30:23'),
(2271, 3, 47, 1, 1, 1, 0, 2, '2025-08-04 04:30:23'),
(2272, 3, 48, 1, 1, 1, 0, 2, '2025-08-04 04:30:23'),
(2273, 3, 49, 1, 1, 1, 0, 2, '2025-08-04 04:30:23'),
(2274, 3, 50, 1, 1, 1, 0, 2, '2025-08-04 04:30:23'),
(2275, 3, 51, 1, 1, 1, 0, 2, '2025-08-04 04:30:23'),
(2276, 3, 52, 1, 1, 1, 0, 2, '2025-08-04 04:30:23'),
(2277, 3, 132, 1, 1, 1, 0, 2, '2025-08-04 04:30:23'),
(2278, 3, 133, 1, 1, 1, 0, 2, '2025-08-04 04:30:23'),
(2279, 3, 134, 1, 1, 1, 0, 2, '2025-08-04 04:30:23'),
(2280, 3, 191, 1, 1, 1, 0, 2, '2025-08-04 04:30:23'),
(2281, 3, 192, 0, 0, 0, 0, 2, '2025-08-04 04:30:23'),
(2282, 3, 193, 0, 0, 0, 0, 2, '2025-08-04 04:30:23'),
(2283, 3, 125, 0, 0, 0, 0, 2, '2025-08-04 04:30:23'),
(2284, 3, 126, 0, 0, 0, 0, 2, '2025-08-04 04:30:23'),
(2285, 3, 127, 0, 0, 0, 0, 2, '2025-08-04 04:30:23'),
(2286, 3, 128, 0, 0, 0, 0, 2, '2025-08-04 04:30:23'),
(2287, 3, 129, 0, 0, 0, 0, 2, '2025-08-04 04:30:23'),
(2288, 3, 205, 0, 0, 0, 0, 2, '2025-08-04 04:30:23'),
(2289, 3, 40, 0, 0, 0, 0, 2, '2025-08-04 04:30:23'),
(2290, 3, 41, 0, 0, 0, 0, 2, '2025-08-04 04:30:23'),
(2291, 3, 111, 0, 0, 0, 0, 2, '2025-08-04 04:30:23'),
(2292, 3, 112, 0, 0, 0, 0, 2, '2025-08-04 04:30:23'),
(2293, 3, 194, 0, 0, 0, 0, 2, '2025-08-04 04:30:23'),
(2294, 3, 195, 0, 0, 0, 0, 2, '2025-08-04 04:30:23'),
(2295, 3, 113, 0, 0, 0, 0, 2, '2025-08-04 04:30:23'),
(2296, 3, 114, 0, 0, 0, 0, 2, '2025-08-04 04:30:23'),
(2297, 3, 115, 0, 0, 0, 0, 2, '2025-08-04 04:30:23'),
(2298, 3, 116, 0, 0, 0, 0, 2, '2025-08-04 04:30:23'),
(2299, 3, 117, 0, 0, 0, 0, 2, '2025-08-04 04:30:23'),
(2300, 3, 196, 0, 0, 0, 0, 2, '2025-08-04 04:30:23'),
(2301, 3, 197, 0, 0, 0, 0, 2, '2025-08-04 04:30:23'),
(2302, 3, 198, 0, 0, 0, 0, 2, '2025-08-04 04:30:23'),
(2303, 3, 199, 0, 0, 0, 0, 2, '2025-08-04 04:30:23'),
(2304, 3, 200, 0, 0, 0, 0, 2, '2025-08-04 04:30:23'),
(2305, 3, 201, 0, 0, 0, 0, 2, '2025-08-04 04:30:23'),
(2306, 3, 202, 0, 0, 0, 0, 2, '2025-08-04 04:30:23'),
(2307, 3, 203, 0, 0, 0, 0, 2, '2025-08-04 04:30:23'),
(2308, 3, 204, 0, 0, 0, 0, 2, '2025-08-04 04:30:23'),
(2309, 3, 130, 0, 0, 0, 0, 2, '2025-08-04 04:30:23'),
(2310, 3, 131, 0, 0, 0, 0, 2, '2025-08-04 04:30:23'),
(2311, 3, 225, 0, 0, 0, 0, 2, '2025-08-04 04:30:23'),
(2312, 3, 226, 0, 0, 0, 0, 2, '2025-08-04 04:30:23'),
(2313, 3, 28, 0, 0, 0, 0, 2, '2025-08-04 04:30:23'),
(2314, 3, 29, 0, 0, 0, 0, 2, '2025-08-04 04:30:23'),
(2315, 3, 30, 0, 0, 0, 0, 2, '2025-08-04 04:30:23'),
(2316, 3, 31, 0, 0, 0, 0, 2, '2025-08-04 04:30:23'),
(2317, 3, 32, 0, 0, 0, 0, 2, '2025-08-04 04:30:23'),
(2318, 3, 33, 0, 0, 0, 0, 2, '2025-08-04 04:30:23'),
(2319, 3, 34, 0, 0, 0, 0, 2, '2025-08-04 04:30:23'),
(2320, 3, 35, 0, 0, 0, 0, 2, '2025-08-04 04:30:23'),
(2321, 3, 36, 0, 0, 0, 0, 2, '2025-08-04 04:30:23'),
(2322, 3, 37, 0, 0, 0, 0, 2, '2025-08-04 04:30:23'),
(2323, 3, 38, 0, 0, 0, 0, 2, '2025-08-04 04:30:23'),
(2324, 3, 39, 0, 0, 0, 0, 2, '2025-08-04 04:30:23'),
(2325, 3, 42, 0, 0, 0, 0, 2, '2025-08-04 04:30:23'),
(2326, 3, 43, 0, 0, 0, 0, 2, '2025-08-04 04:30:23'),
(2327, 3, 44, 0, 0, 0, 0, 2, '2025-08-04 04:30:23'),
(2328, 3, 118, 0, 0, 0, 0, 2, '2025-08-04 04:30:23'),
(2329, 3, 119, 0, 0, 0, 0, 2, '2025-08-04 04:30:23'),
(2330, 3, 120, 0, 0, 0, 0, 2, '2025-08-04 04:30:23'),
(2331, 3, 121, 0, 0, 0, 0, 2, '2025-08-04 04:30:23'),
(2332, 3, 122, 0, 0, 0, 0, 2, '2025-08-04 04:30:23'),
(2333, 3, 123, 0, 0, 0, 0, 2, '2025-08-04 04:30:23'),
(2334, 3, 124, 0, 0, 0, 0, 2, '2025-08-04 04:30:23'),
(2335, 3, 206, 0, 0, 0, 0, 2, '2025-08-04 04:30:23'),
(2336, 3, 207, 0, 0, 0, 0, 2, '2025-08-04 04:30:23'),
(2337, 3, 208, 0, 0, 0, 0, 2, '2025-08-04 04:30:23'),
(2338, 3, 209, 0, 0, 0, 0, 2, '2025-08-04 04:30:23'),
(2339, 3, 210, 0, 0, 0, 0, 2, '2025-08-04 04:30:23'),
(2340, 3, 211, 0, 0, 0, 0, 2, '2025-08-04 04:30:23'),
(2341, 3, 212, 0, 0, 0, 0, 2, '2025-08-04 04:30:23'),
(2342, 3, 213, 0, 0, 0, 0, 2, '2025-08-04 04:30:23'),
(2343, 3, 214, 0, 0, 0, 0, 2, '2025-08-04 04:30:23'),
(2344, 3, 215, 0, 0, 0, 0, 2, '2025-08-04 04:30:23'),
(2345, 3, 216, 0, 0, 0, 0, 2, '2025-08-04 04:30:23'),
(2346, 3, 217, 0, 0, 0, 0, 2, '2025-08-04 04:30:23'),
(2347, 3, 218, 0, 0, 0, 0, 2, '2025-08-04 04:30:23'),
(2348, 3, 219, 0, 0, 0, 0, 2, '2025-08-04 04:30:23'),
(2349, 3, 220, 0, 0, 0, 0, 2, '2025-08-04 04:30:23'),
(2350, 3, 1522, 1, 1, 1, 0, 2, '2025-08-04 04:30:23'),
(2351, 3, 1523, 1, 1, 1, 1, 2, '2025-08-04 04:30:23'),
(2352, 3, 14, 0, 0, 0, 0, 2, '2025-08-04 04:30:23'),
(2353, 3, 15, 0, 0, 0, 0, 2, '2025-08-04 04:30:23'),
(2354, 3, 16, 0, 0, 0, 0, 2, '2025-08-04 04:30:23'),
(2355, 3, 17, 0, 0, 0, 0, 2, '2025-08-04 04:30:23'),
(2356, 3, 18, 0, 0, 0, 0, 2, '2025-08-04 04:30:23'),
(2357, 3, 19, 0, 0, 0, 0, 2, '2025-08-04 04:30:23');

-- --------------------------------------------------------

--
-- Table structure for table `sec_role_tbl`
--

CREATE TABLE `sec_role_tbl` (
  `role_id` int(11) NOT NULL,
  `role_name` text NOT NULL,
  `role_description` text NOT NULL,
  `create_by` int(11) DEFAULT NULL,
  `date_time` datetime DEFAULT NULL,
  `role_status` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

--
-- Dumping data for table `sec_role_tbl`
--

INSERT INTO `sec_role_tbl` (`role_id`, `role_name`, `role_description`, `create_by`, `date_time`, `role_status`) VALUES
(1, 'kitchen', 'manage kitchen', 2, '2020-10-12 10:27:03', 1),
(2, 'Counter', 'Display Order timing', 2, '2020-10-12 10:27:45', 1),
(3, 'Waiter', 'Order Taken and served food', 2, '2020-10-12 10:29:13', 1),
(4, 'Manager', 'Managing Outlet', 2, '2025-06-11 03:38:30', 1);

-- --------------------------------------------------------

--
-- Table structure for table `sec_user_access_tbl`
--

CREATE TABLE `sec_user_access_tbl` (
  `role_acc_id` int(11) NOT NULL,
  `fk_role_id` int(11) NOT NULL,
  `fk_user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

--
-- Dumping data for table `sec_user_access_tbl`
--

INSERT INTO `sec_user_access_tbl` (`role_acc_id`, `fk_role_id`, `fk_user_id`) VALUES
(1, 3, 172),
(7, 3, 177),
(8, 3, 179),
(15, 3, 180),
(16, 3, 181),
(17, 3, 168),
(18, 3, 182),
(19, 6, 186),
(20, 6, 187),
(21, 3, 189),
(24, 1, 190);

-- --------------------------------------------------------

--
-- Table structure for table `setting`
--

CREATE TABLE `setting` (
  `id` int(11) NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `storename` varchar(100) DEFAULT NULL,
  `address` text DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `logo` varchar(50) DEFAULT NULL,
  `logoweb` varchar(255) DEFAULT NULL,
  `favicon` varchar(100) DEFAULT NULL,
  `opentime` varchar(255) DEFAULT NULL,
  `closetime` varchar(255) DEFAULT NULL,
  `vat` decimal(10,2) NOT NULL DEFAULT 0.00,
  `isvatnumshow` int(11) DEFAULT 0,
  `vattinno` varchar(30) DEFAULT NULL,
  `isvatinclusive` int(11) NOT NULL DEFAULT 0,
  `discount_type` int(11) NOT NULL DEFAULT 0 COMMENT '0=amount,1=percent',
  `discountrate` decimal(19,3) DEFAULT 0.000,
  `servicecharge` decimal(10,0) NOT NULL DEFAULT 0,
  `service_chargeType` int(11) NOT NULL DEFAULT 0 COMMENT '0=amount,1=percent',
  `currency` int(11) DEFAULT 0,
  `min_prepare_time` varchar(50) DEFAULT NULL,
  `language` varchar(100) DEFAULT NULL,
  `timezone` varchar(150) NOT NULL,
  `dateformat` text NOT NULL,
  `site_align` varchar(50) DEFAULT NULL,
  `kitchenrefreshtime` int(11) DEFAULT 5,
  `powerbytxt` text DEFAULT NULL,
  `footer_text` varchar(255) DEFAULT NULL,
  `reservation_open` varchar(30) DEFAULT NULL,
  `reservation_close` varchar(30) DEFAULT NULL,
  `maxreserveperson` int(11) DEFAULT NULL,
  `printtype` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

--
-- Dumping data for table `setting`
--

INSERT INTO `setting` (`id`, `title`, `storename`, `address`, `email`, `phone`, `logo`, `logoweb`, `favicon`, `opentime`, `closetime`, `vat`, `isvatnumshow`, `vattinno`, `isvatinclusive`, `discount_type`, `discountrate`, `servicecharge`, `service_chargeType`, `currency`, `min_prepare_time`, `language`, `timezone`, `dateformat`, `site_align`, `kitchenrefreshtime`, `powerbytxt`, `footer_text`, `reservation_open`, `reservation_close`, `maxreserveperson`, `printtype`) VALUES
(2, 'Punjabi Palace Restaurant', 'Punjabi Palace Restaurant', '135, Melbourne Street, South Brisbane, QLD', 'info@PunjabiPalace.com.au', '(07) 3846 3884', 'assets/img/icons/2019-10-29/h.png', NULL, 'assets/img/icons/m.png', '9:00AM', '10:00PM', 10.00, NULL, '23457586', 1, 1, 10.000, 0, 1, 2, '1:00 Hour', 'english', 'Australia/Brisbane', 'd/m/Y', 'LTR', 15, 'Powered By: Adzguru, www.adzguru.com\n', '2025', '09:00:00', '22:00:00', 10, 2);

-- --------------------------------------------------------

--
-- Table structure for table `shipping_method`
--

CREATE TABLE `shipping_method` (
  `ship_id` int(11) NOT NULL,
  `shipping_method` varchar(150) NOT NULL,
  `shippingrate` decimal(10,2) NOT NULL DEFAULT 0.00,
  `payment_method` varchar(255) DEFAULT NULL,
  `is_active` int(11) NOT NULL DEFAULT 0,
  `shiptype` int(11) DEFAULT NULL COMMENT '1=dinein,2=pickup,3=home'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

--
-- Dumping data for table `shipping_method`
--

INSERT INTO `shipping_method` (`ship_id`, `shipping_method`, `shippingrate`, `payment_method`, `is_active`, `shiptype`) VALUES
(1, 'Home Delivary', 60.00, '9, 8, 5, 4, 3, 1', 1, 3),
(2, 'Pickup', 0.00, '4, 3, 1', 1, 2),
(3, 'Dine-in', 0.00, '9, 8, 5, 4, 3', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `slots`
--

CREATE TABLE `slots` (
  `slot_id` int(11) NOT NULL,
  `day_id` int(11) NOT NULL,
  `start_time` time NOT NULL,
  `end_time` time NOT NULL,
  `is_active` tinyint(1) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `slots`
--

INSERT INTO `slots` (`slot_id`, `day_id`, `start_time`, `end_time`, `is_active`) VALUES
(1, 1, '10:00:00', '11:00:00', 1),
(2, 1, '11:00:00', '12:00:00', 1),
(3, 1, '12:00:00', '13:00:00', 1),
(4, 1, '13:00:00', '14:00:00', 1),
(5, 1, '14:00:00', '15:00:00', 1),
(6, 1, '15:00:00', '16:00:00', 1),
(7, 1, '16:00:00', '17:00:00', 1),
(8, 1, '17:00:00', '18:00:00', 1),
(9, 1, '18:00:00', '19:00:00', 1),
(10, 1, '19:00:00', '20:00:00', 1),
(11, 1, '20:00:00', '21:00:00', 1),
(12, 2, '10:00:00', '11:00:00', 1),
(13, 2, '11:00:00', '12:00:00', 1),
(14, 2, '12:00:00', '13:00:00', 1),
(15, 2, '13:00:00', '14:00:00', 1),
(16, 2, '14:00:00', '15:00:00', 1),
(17, 2, '15:00:00', '16:00:00', 1),
(18, 2, '16:00:00', '17:00:00', 1),
(19, 2, '17:00:00', '18:00:00', 1),
(20, 2, '18:00:00', '19:00:00', 1),
(21, 2, '19:00:00', '20:00:00', 1),
(22, 2, '20:00:00', '21:00:00', 1),
(23, 3, '10:00:00', '11:00:00', 1),
(24, 3, '11:00:00', '12:00:00', 1),
(25, 3, '12:00:00', '13:00:00', 1),
(26, 3, '13:00:00', '14:00:00', 1),
(27, 3, '14:00:00', '15:00:00', 1),
(28, 3, '15:00:00', '16:00:00', 1),
(29, 3, '16:00:00', '17:00:00', 1),
(30, 3, '17:00:00', '18:00:00', 1),
(31, 3, '18:00:00', '19:00:00', 1),
(32, 3, '19:00:00', '20:00:00', 1),
(33, 3, '20:00:00', '21:00:00', 1),
(34, 4, '10:00:00', '11:00:00', 1),
(35, 4, '11:00:00', '12:00:00', 1),
(36, 4, '12:00:00', '13:00:00', 1),
(37, 4, '13:00:00', '14:00:00', 1),
(38, 4, '14:00:00', '15:00:00', 1),
(39, 4, '15:00:00', '16:00:00', 1),
(40, 4, '16:00:00', '17:00:00', 1),
(41, 4, '17:00:00', '18:00:00', 1),
(42, 4, '18:00:00', '19:00:00', 1),
(43, 4, '19:00:00', '20:00:00', 1),
(44, 4, '20:00:00', '21:00:00', 1),
(45, 5, '10:00:00', '11:00:00', 1),
(46, 5, '11:00:00', '12:00:00', 1),
(47, 5, '12:00:00', '13:00:00', 1),
(48, 5, '13:00:00', '14:00:00', 1),
(49, 5, '14:00:00', '15:00:00', 1),
(50, 5, '15:00:00', '16:00:00', 1),
(51, 5, '16:00:00', '17:00:00', 1),
(52, 5, '17:00:00', '18:00:00', 1),
(53, 5, '18:00:00', '19:00:00', 1),
(54, 5, '19:00:00', '20:00:00', 1),
(55, 5, '20:00:00', '21:00:00', 1),
(56, 6, '10:00:00', '11:00:00', 1),
(57, 6, '11:00:00', '12:00:00', 1),
(58, 6, '12:00:00', '13:00:00', 1),
(59, 6, '13:00:00', '14:00:00', 1),
(60, 6, '14:00:00', '15:00:00', 1),
(61, 6, '15:00:00', '16:00:00', 1),
(62, 6, '16:00:00', '17:00:00', 1),
(63, 6, '17:00:00', '18:00:00', 1),
(64, 6, '18:00:00', '19:00:00', 1),
(65, 6, '19:00:00', '20:00:00', 1),
(66, 6, '20:00:00', '21:00:00', 1),
(67, 7, '10:00:00', '11:00:00', 0),
(68, 7, '11:00:00', '12:00:00', 0),
(69, 7, '12:00:00', '13:00:00', 0),
(70, 7, '13:00:00', '14:00:00', 1),
(71, 7, '14:00:00', '15:00:00', 1),
(72, 7, '15:00:00', '16:00:00', 1),
(73, 7, '16:00:00', '17:00:00', 1),
(74, 7, '17:00:00', '18:00:00', 1),
(75, 7, '18:00:00', '19:00:00', 1),
(76, 7, '19:00:00', '20:00:00', 1),
(77, 7, '20:00:00', '21:00:00', 1),
(78, 5, '21:00:00', '22:00:00', 1);

-- --------------------------------------------------------

--
-- Table structure for table `sms_configuration`
--

CREATE TABLE `sms_configuration` (
  `id` int(11) NOT NULL,
  `link` text NOT NULL,
  `gateway` varchar(200) NOT NULL,
  `user_name` varchar(200) NOT NULL,
  `password` varchar(255) NOT NULL,
  `sms_from` varchar(200) NOT NULL,
  `userid` varchar(100) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

--
-- Dumping data for table `sms_configuration`
--

INSERT INTO `sms_configuration` (`id`, `link`, `gateway`, `user_name`, `password`, `sms_from`, `userid`, `status`) VALUES
(1, 'http://trello.com/', 'SMS Rank', 'ravi', '123456', 'smsrank', '', 1),
(2, 'https://www.nexmo.com/', 'nexmo', '50489b88', 'z1cBmtrDeQrOaqhg', 'restaurant', '', 0),
(3, 'https://www.budgetsms.net/', 'budgetsms', 'user1', '1e753da74', 'budgetsms', '21547', 0);

-- --------------------------------------------------------

--
-- Table structure for table `sms_template`
--

CREATE TABLE `sms_template` (
  `id` int(11) NOT NULL,
  `template_name` varchar(255) NOT NULL,
  `message` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `default_status` tinyint(4) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `sms_template`
--

INSERT INTO `sms_template` (`id`, `template_name`, `message`, `type`, `status`, `default_status`, `created_at`, `updated_at`) VALUES
(1, 'one', 'your Order {id} is cancel for some reason.', 'Cancel', 0, 0, '2018-12-30 12:38:07', '0000-00-00 00:00:00'),
(2, 'two', 'your order {id} is completed', 'CompleteOrder', 0, 1, '2018-12-30 14:28:19', '0000-00-00 00:00:00'),
(3, 'three', 'your order {id} is processing', 'Processing', 0, 1, '2018-11-06 12:30:46', '0000-00-00 00:00:00'),
(8, 'four', 'Your Order Has been Placed Successfully.', 'Neworder', 1, 0, '2018-12-30 14:29:32', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `stock_adjustments`
--

CREATE TABLE `stock_adjustments` (
  `id` int(11) NOT NULL,
  `ingredient_id` int(11) NOT NULL,
  `adjusted_qty` decimal(10,2) NOT NULL COMMENT 'Positive = addition, Negative = subtraction',
  `adjustment_date` datetime NOT NULL DEFAULT current_timestamp(),
  `responsible_person` varchar(100) NOT NULL,
  `note` text DEFAULT NULL,
  `added_by` int(11) NOT NULL,
  `created_at` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `subscribe_emaillist`
--

CREATE TABLE `subscribe_emaillist` (
  `emailid` int(11) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `dateinsert` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sub_order`
--

CREATE TABLE `sub_order` (
  `sub_id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `customer_id` int(11) DEFAULT NULL,
  `vat` float DEFAULT NULL,
  `discount` decimal(10,2) DEFAULT 0.00,
  `s_charge` float DEFAULT NULL,
  `total_price` float DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 0 COMMENT '0=unpaid,1=paid',
  `order_menu_id` text DEFAULT NULL,
  `adons_id` varchar(20) DEFAULT NULL,
  `adons_qty` varchar(20) DEFAULT NULL,
  `invoiceprint` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

--
-- Dumping data for table `sub_order`
--

INSERT INTO `sub_order` (`sub_id`, `order_id`, `customer_id`, `vat`, `discount`, `s_charge`, `total_price`, `status`, `order_menu_id`, `adons_id`, `adons_qty`, `invoiceprint`) VALUES
(1, 5, 1, 3.895, 0.00, 0, 38.95, 1, 'a:2:{i:5;i:1;i:9;i:1;}', NULL, NULL, NULL),
(2, 5, NULL, NULL, 0.00, NULL, NULL, 0, 'a:1:{i:6;i:1;}', NULL, NULL, NULL),
(3, 5, NULL, NULL, 0.00, NULL, NULL, 0, 'a:2:{i:7;i:1;i:8;i:1;}', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `supplier`
--

CREATE TABLE `supplier` (
  `supid` int(11) NOT NULL,
  `suplier_code` varchar(255) NOT NULL,
  `supName` varchar(100) NOT NULL,
  `supEmail` varchar(100) NOT NULL,
  `supMobile` varchar(50) NOT NULL,
  `supAddress` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

--
-- Dumping data for table `supplier`
--

INSERT INTO `supplier` (`supid`, `suplier_code`, `supName`, `supEmail`, `supMobile`, `supAddress`) VALUES
(1, 'sup_002', 'Patza', 'patza@gmail.com', '61298977383', 'Suite 2/22F, 66 Goulburn St, Sydney NSW 2000, Australia'),
(2, 'sup_003', 'Rizvi', 'rizvi@gmail.com', '08582957232', 'Lokenath Apartment');

-- --------------------------------------------------------

--
-- Table structure for table `supplier_ledger`
--

CREATE TABLE `supplier_ledger` (
  `id` int(11) NOT NULL,
  `transaction_id` varchar(100) NOT NULL,
  `supplier_id` bigint(20) DEFAULT NULL,
  `chalan_no` varchar(100) DEFAULT NULL,
  `deposit_no` varchar(50) DEFAULT NULL,
  `amount` decimal(19,3) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `payment_type` varchar(255) DEFAULT NULL,
  `cheque_no` varchar(255) DEFAULT NULL,
  `date` varchar(50) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `d_c` varchar(10) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `synchronizer_setting`
--

CREATE TABLE `synchronizer_setting` (
  `id` int(11) NOT NULL,
  `hostname` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `port` varchar(10) NOT NULL,
  `debug` varchar(10) NOT NULL,
  `project_root` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

--
-- Dumping data for table `synchronizer_setting`
--

INSERT INTO `synchronizer_setting` (`id`, `hostname`, `username`, `password`, `port`, `debug`, `project_root`) VALUES
(8, '223.185.34.102', 'adzguru', '@dm!n2024', '21', 'true', './public_html/');

-- --------------------------------------------------------

--
-- Table structure for table `table_details`
--

CREATE TABLE `table_details` (
  `id` int(11) NOT NULL,
  `table_id` int(11) NOT NULL,
  `customer_id` int(11) DEFAULT NULL,
  `order_id` int(11) NOT NULL,
  `time_enter` time NOT NULL,
  `total_people` int(11) NOT NULL,
  `delete_at` int(11) NOT NULL DEFAULT 0,
  `created_at` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

--
-- Dumping data for table `table_details`
--

INSERT INTO `table_details` (`id`, `table_id`, `customer_id`, `order_id`, `time_enter`, `total_people`, `delete_at`, `created_at`) VALUES
(14, 2, 54, 2, '14:50:25', 2, 0, '2025-07-25'),
(37, 1, 54, 2, '15:52:09', 2, 0, '2025-08-04'),
(38, 6, 54, 3, '15:55:24', 3, 0, '2025-08-04'),
(39, 8, 1, 4, '16:27:46', 4, 0, '2025-08-04'),
(40, 1, 1, 5, '10:59:45', 2, 0, '2025-08-05');

-- --------------------------------------------------------

--
-- Table structure for table `table_setting`
--

CREATE TABLE `table_setting` (
  `settingid` int(11) NOT NULL,
  `tableid` int(11) NOT NULL,
  `iconpos` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

--
-- Dumping data for table `table_setting`
--

INSERT INTO `table_setting` (`settingid`, `tableid`, `iconpos`) VALUES
(1, 2, 'position: relative; left: 221px; top: 182px;'),
(2, 4, 'position: relative; left: 87px; top: 17px;'),
(3, 3, 'position: relative; left: -105px; top: 42px;'),
(4, 1, 'position: relative; left: -205px; top: -25px;'),
(5, 8, 'position: relative; left: -312px; top: 121px;'),
(6, 6, 'position: relative; left: -157px; top: 112px;'),
(7, 5, 'position: relative; left: -153px; top: 85px;'),
(8, 7, 'position: relative; left: -523px; top: 335px;'),
(9, 9, 'position: relative; left: -744px; top: 14px;'),
(10, 10, 'position: relative; left: -405px; top: 194px;'),
(11, 13, 'position: relative; left: 6px; top: 0px;');

-- --------------------------------------------------------

--
-- Table structure for table `tblreservation`
--

CREATE TABLE `tblreservation` (
  `reserveid` int(11) NOT NULL,
  `cid` int(11) NOT NULL,
  `tableid` int(11) NOT NULL,
  `person_capicity` int(11) NOT NULL,
  `formtime` time NOT NULL,
  `totime` time NOT NULL,
  `reserveday` date NOT NULL,
  `customer_notes` text DEFAULT NULL,
  `status` int(11) NOT NULL COMMENT '1=free,2=booked,3=complete,4=expire',
  `notif` int(11) NOT NULL DEFAULT 0 COMMENT '0=unseen,1=seen'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

--
-- Dumping data for table `tblreservation`
--

INSERT INTO `tblreservation` (`reserveid`, `cid`, `tableid`, `person_capicity`, `formtime`, `totime`, `reserveday`, `customer_notes`, `status`, `notif`) VALUES
(1, 67, 14, 4, '20:00:00', '21:00:00', '2025-05-16', 'testing', 1, 1),
(2, 68, 15, 5, '19:00:00', '20:00:00', '2025-05-28', '123456', 1, 1),
(3, 69, 0, 6, '17:00:00', '18:00:00', '2025-05-13', 'New Booking', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tblserver`
--

CREATE TABLE `tblserver` (
  `serverid` int(11) NOT NULL,
  `localhost_url` varchar(255) NOT NULL,
  `online_url` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tblserver`
--

INSERT INTO `tblserver` (`serverid`, `localhost_url`, `online_url`) VALUES
(1, 'http://localhost/punjabi-palace', 'https://bcent.adzguruprojects.biz');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_assign_kitchen`
--

CREATE TABLE `tbl_assign_kitchen` (
  `assignid` int(11) NOT NULL,
  `kitchen_id` int(11) NOT NULL,
  `userid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_bank`
--

CREATE TABLE `tbl_bank` (
  `bankid` int(11) NOT NULL,
  `bank_name` varchar(255) NOT NULL,
  `ac_name` varchar(200) DEFAULT NULL,
  `ac_number` varchar(200) DEFAULT NULL,
  `branch` varchar(200) DEFAULT NULL,
  `signature_pic` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

--
-- Dumping data for table `tbl_bank`
--

INSERT INTO `tbl_bank` (`bankid`, `bank_name`, `ac_name`, `ac_number`, `branch`, `signature_pic`) VALUES
(1, 'Bank Australia', 'Anil Singh', '535764655', 'Brisbane', NULL),
(2, 'City Bank', 'Awadhesh Pandey', '3869583', 'South Brisbane', NULL),
(3, 'ANZ Bank', 'Praveen Mishra', '9356346', 'Brisbane', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_billingaddress`
--

CREATE TABLE `tbl_billingaddress` (
  `billaddressid` int(11) NOT NULL,
  `orderid` int(11) NOT NULL,
  `firstname` varchar(100) DEFAULT NULL,
  `lastname` varchar(100) DEFAULT NULL,
  `companyname` varchar(100) DEFAULT NULL,
  `email` varchar(150) DEFAULT NULL,
  `phone` varchar(50) DEFAULT NULL,
  `city` varchar(70) DEFAULT NULL,
  `district` varchar(255) DEFAULT NULL,
  `country` varchar(150) DEFAULT NULL,
  `zip` varchar(50) DEFAULT NULL,
  `address` text DEFAULT NULL,
  `address2` text DEFAULT NULL,
  `DateInserted` datetime NOT NULL DEFAULT '1970-01-01 01:01:01'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

--
-- Dumping data for table `tbl_billingaddress`
--

INSERT INTO `tbl_billingaddress` (`billaddressid`, `orderid`, `firstname`, `lastname`, `companyname`, `email`, `phone`, `city`, `district`, `country`, `zip`, `address`, `address2`, `DateInserted`) VALUES
(1, 44, 'Ravi', 'Kumar', NULL, 'php.ravikr8686@gmail.com', '08582957232', '', 'West Bengal', 'India', '700028', 'Lokenath Apartment', NULL, '2025-08-01 15:16:42');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_cancelitem`
--

CREATE TABLE `tbl_cancelitem` (
  `cancelid` int(11) NOT NULL,
  `orderid` int(11) NOT NULL,
  `foodid` int(11) NOT NULL,
  `varientid` int(11) NOT NULL,
  `quantity` decimal(19,3) NOT NULL DEFAULT 0.000
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_card_terminal`
--

CREATE TABLE `tbl_card_terminal` (
  `card_terminalid` int(11) NOT NULL,
  `terminal_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

--
-- Dumping data for table `tbl_card_terminal`
--

INSERT INTO `tbl_card_terminal` (`card_terminalid`, `terminal_name`) VALUES
(1, 'Square Terminal'),
(2, 'Stripe Terminal'),
(3, 'Visa-Master Terminal');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_cashcounter`
--

CREATE TABLE `tbl_cashcounter` (
  `ccid` int(11) NOT NULL,
  `counterno` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tbl_cashcounter`
--

INSERT INTO `tbl_cashcounter` (`ccid`, `counterno`) VALUES
(1, 1),
(2, 2),
(6, 5),
(7, 3),
(8, 4),
(9, 6),
(10, 7),
(11, 8),
(12, 9);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_cashregister`
--

CREATE TABLE `tbl_cashregister` (
  `id` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `counter_no` int(11) NOT NULL,
  `opening_balance` decimal(19,3) NOT NULL DEFAULT 0.000,
  `closing_balance` decimal(19,3) NOT NULL DEFAULT 0.000,
  `openclosedate` date NOT NULL,
  `opendate` datetime DEFAULT '1970-01-01 01:01:01',
  `closedate` datetime DEFAULT '1970-01-01 01:01:01',
  `status` int(11) NOT NULL DEFAULT 0,
  `openingnote` text DEFAULT NULL,
  `closing_note` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tbl_cashregister`
--

INSERT INTO `tbl_cashregister` (`id`, `userid`, `counter_no`, `opening_balance`, `closing_balance`, `openclosedate`, `opendate`, `closedate`, `status`, `openingnote`, `closing_note`) VALUES
(1, 2, 1, 14000.000, 58787.600, '2025-01-23', '2025-01-23 15:40:46', '2025-02-20 19:36:50', 1, '', ''),
(2, 177, 2, 14000.000, 0.000, '2025-02-10', '2025-02-10 12:56:48', '1970-01-01 00:00:00', 0, 'Cash Register', ''),
(3, 179, 3, 10000.000, 0.000, '2025-02-14', '2025-02-14 08:29:33', '1970-01-01 00:00:00', 0, 'testing note', ''),
(4, 180, 6, 25000.000, 0.000, '2025-02-14', '2025-02-14 11:39:15', '1970-01-01 00:00:00', 0, 'my wallet', ''),
(5, 2, 1, 58787.600, 76981.800, '2025-02-20', '2025-02-20 19:37:23', '2025-07-15 20:31:06', 1, '', ''),
(6, 168, 7, 200.000, 0.000, '2025-06-09', '2025-06-09 20:56:39', '1970-01-01 00:00:00', 0, 'opening balance', ''),
(7, 182, 8, 500.000, 0.000, '2025-06-10', '2025-06-10 14:53:16', '1970-01-01 00:00:00', 0, '', ''),
(8, 189, 9, 100.000, 0.000, '2025-06-11', '2025-06-11 16:51:11', '1970-01-01 00:00:00', 0, 'starting wallet', ''),
(9, 2, 1, 76981.800, 0.000, '2025-07-15', '2025-07-15 20:32:34', '1970-01-01 00:00:00', 0, '', '');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_city`
--

CREATE TABLE `tbl_city` (
  `cityid` int(11) NOT NULL,
  `countryid` int(11) NOT NULL,
  `stateid` int(11) NOT NULL,
  `cityname` varchar(100) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

--
-- Dumping data for table `tbl_city`
--

INSERT INTO `tbl_city` (`cityid`, `countryid`, `stateid`, `cityname`, `status`) VALUES
(3, 1, 14, 'Brisbane', 1),
(4, 1, 14, 'Gold Coast', 1),
(5, 1, 14, 'Sunshine Coast', 1),
(6, 1, 14, 'Ipswich', 1),
(7, 1, 14, 'Toowoomba', 1),
(8, 1, 14, 'Cairns, and Townsville', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_country`
--

CREATE TABLE `tbl_country` (
  `countryid` int(11) NOT NULL,
  `countryname` varchar(70) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

--
-- Dumping data for table `tbl_country`
--

INSERT INTO `tbl_country` (`countryid`, `countryname`, `status`) VALUES
(1, 'Australia', 1),
(2, 'United State', 1),
(3, 'United Kingdom', 1),
(4, 'India', 1),
(5, 'Vietnam', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_delivaritime`
--

CREATE TABLE `tbl_delivaritime` (
  `dtimeid` int(11) NOT NULL,
  `deltime` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tbl_delivaritime`
--

INSERT INTO `tbl_delivaritime` (`dtimeid`, `deltime`) VALUES
(1, '10:00-10:30'),
(2, '10:30-11:00'),
(3, '11:00-11:30'),
(4, '11:30-12:00'),
(5, '12:00-12:30'),
(6, '12:30-13:00'),
(7, '13:00-13:30'),
(8, '13:30-14:00'),
(9, '14:00-14:30'),
(10, '14:30-15:00'),
(11, '15:00-15:30'),
(12, '15:30-16:00'),
(13, '16:00-16:30'),
(14, '16:30-17:00'),
(15, '17:00-17:30'),
(16, '17:30-18:00'),
(17, '18:00-18:30'),
(18, '18:30-19:00'),
(19, '19:00-19:30'),
(20, '19:30-20:00'),
(21, '20:00-20:30'),
(22, '20:30-21:00');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_delivaryaddress`
--

CREATE TABLE `tbl_delivaryaddress` (
  `delivaryid` int(11) NOT NULL,
  `deladdress` text NOT NULL,
  `delcharge` decimal(10,2) NOT NULL DEFAULT 0.00
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_generatedreport`
--

CREATE TABLE `tbl_generatedreport` (
  `generateid` int(11) NOT NULL,
  `order_id` bigint(20) NOT NULL,
  `saleinvoice` varchar(100) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `cutomertype` int(11) NOT NULL,
  `isthirdparty` int(11) NOT NULL DEFAULT 0,
  `waiter_id` int(11) DEFAULT NULL,
  `kitchen` int(11) DEFAULT NULL,
  `order_date` date NOT NULL,
  `order_time` time NOT NULL,
  `table_no` int(11) DEFAULT NULL,
  `tokenno` varchar(30) DEFAULT NULL,
  `totalamount` decimal(10,2) NOT NULL DEFAULT 0.00,
  `customerpaid` decimal(10,2) DEFAULT 0.00,
  `customer_note` text DEFAULT NULL,
  `anyreason` text DEFAULT NULL,
  `order_status` tinyint(4) NOT NULL,
  `nofification` int(11) NOT NULL,
  `orderacceptreject` int(11) DEFAULT NULL,
  `reportDate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_groupitems`
--

CREATE TABLE `tbl_groupitems` (
  `groupid` int(11) NOT NULL,
  `gitemid` int(11) NOT NULL,
  `items` int(11) NOT NULL,
  `item_qty` decimal(10,2) NOT NULL DEFAULT 0.00,
  `varientid` int(11) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_itemaccepted`
--

CREATE TABLE `tbl_itemaccepted` (
  `acid` int(11) NOT NULL,
  `orderid` int(11) NOT NULL,
  `menuid` int(11) NOT NULL,
  `varient` int(11) NOT NULL,
  `accepttime` datetime NOT NULL DEFAULT '1970-01-01 01:01:01'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tbl_itemaccepted`
--

INSERT INTO `tbl_itemaccepted` (`acid`, `orderid`, `menuid`, `varient`, `accepttime`) VALUES
(1, 32, 51, 48, '2025-06-09 18:40:34'),
(2, 34, 51, 48, '2025-06-09 18:43:28'),
(3, 35, 51, 48, '2025-06-09 18:47:04'),
(4, 36, 51, 48, '2025-06-09 19:00:32'),
(5, 37, 51, 48, '2025-06-09 19:06:24'),
(6, 38, 51, 48, '2025-06-09 22:17:48'),
(7, 39, 51, 48, '2025-06-09 22:22:36'),
(8, 40, 51, 48, '2025-06-09 22:29:38'),
(9, 45, 44, 27, '2025-06-10 14:11:21'),
(10, 1, 8, 112, '2025-07-25 21:12:29'),
(11, 2, 4, 107, '2025-07-25 22:33:12'),
(12, 2, 8, 112, '2025-07-25 22:33:12'),
(13, 4, 73, 140, '2025-07-28 16:23:26'),
(14, 5, 26, 132, '2025-07-28 16:38:04'),
(15, 5, 82, 149, '2025-07-28 16:38:04'),
(16, 5, 14, 116, '2025-07-28 16:38:05'),
(17, 6, 26, 132, '2025-07-28 16:40:12'),
(18, 6, 68, 80, '2025-07-28 16:40:12'),
(19, 6, 85, 97, '2025-07-28 16:40:12'),
(20, 7, 17, 122, '2025-07-28 17:01:34'),
(21, 7, 16, 121, '2025-07-28 17:01:34'),
(22, 7, 61, 73, '2025-07-28 17:01:34'),
(23, 7, 45, 57, '2025-07-28 17:01:34'),
(24, 7, 74, 141, '2025-07-28 17:01:34'),
(25, 8, 8, 112, '2025-07-28 19:24:41'),
(26, 9, 76, 143, '2025-07-28 19:32:18'),
(27, 10, 79, 146, '2025-07-28 19:33:36'),
(28, 14, 76, 143, '2025-07-29 16:31:38'),
(29, 17, 4, 107, '2025-07-30 13:59:02'),
(30, 17, 75, 142, '2025-07-30 13:59:02'),
(31, 20, 23, 128, '2025-07-30 14:50:56'),
(32, 20, 2, 106, '2025-07-30 14:50:56'),
(33, 20, 3, 108, '2025-07-30 14:50:56'),
(34, 21, 74, 141, '2025-07-30 17:22:59'),
(35, 22, 76, 143, '2025-07-30 20:10:10'),
(36, 24, 80, 147, '2025-07-30 22:35:01'),
(37, 23, 74, 141, '2025-07-30 22:35:05'),
(38, 23, 73, 140, '2025-07-30 22:35:05'),
(39, 26, 6, 160, '2025-07-31 14:07:08'),
(40, 25, 10, 118, '2025-07-31 14:07:16'),
(41, 28, 4, 107, '2025-07-31 14:23:27'),
(42, 29, 4, 107, '2025-07-31 14:41:11'),
(43, 30, 7, 111, '2025-07-31 14:47:56'),
(44, 31, 12, 114, '2025-07-31 14:51:04'),
(45, 32, 76, 143, '2025-07-31 14:52:39'),
(46, 34, 75, 142, '2025-07-31 14:54:45'),
(47, 34, 74, 141, '2025-07-31 14:54:45'),
(48, 33, 76, 143, '2025-07-31 14:54:51'),
(49, 35, 76, 143, '2025-07-31 15:21:32'),
(50, 5, 15, 120, '2025-08-05 11:16:06'),
(51, 5, 54, 66, '2025-08-05 11:16:06'),
(52, 5, 120, 186, '2025-08-05 11:16:06'),
(53, 5, 73, 140, '2025-08-05 11:16:06'),
(54, 5, 141, 207, '2025-08-05 11:16:06'),
(55, 6, 32, 44, '2025-08-05 11:38:42'),
(56, 6, 37, 49, '2025-08-05 11:38:42'),
(57, 6, 86, 98, '2025-08-05 11:38:42'),
(58, 6, 167, 239, '2025-08-05 11:38:42'),
(59, 7, 73, 140, '2025-08-05 11:47:50'),
(60, 7, 75, 142, '2025-08-05 11:47:50');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_kitchen`
--

CREATE TABLE `tbl_kitchen` (
  `kitchenid` int(11) NOT NULL,
  `kitchen_name` varchar(100) NOT NULL,
  `ip` varchar(255) DEFAULT NULL,
  `port` varchar(10) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

--
-- Dumping data for table `tbl_kitchen`
--

INSERT INTO `tbl_kitchen` (`kitchenid`, `kitchen_name`, `ip`, `port`, `status`) VALUES
(1, 'Common Kitchen', '192.168.1.87', '9100', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_kitchen_order`
--

CREATE TABLE `tbl_kitchen_order` (
  `ktid` int(11) NOT NULL,
  `kitchenid` int(11) NOT NULL,
  `orderid` int(11) NOT NULL,
  `itemid` int(11) NOT NULL,
  `varient` int(11) DEFAULT NULL,
  `addonsuid` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

--
-- Dumping data for table `tbl_kitchen_order`
--

INSERT INTO `tbl_kitchen_order` (`ktid`, `kitchenid`, `orderid`, `itemid`, `varient`, `addonsuid`) VALUES
(1, 1, 1, 4, 107, NULL),
(2, 1, 5, 15, 120, NULL),
(3, 1, 5, 54, 66, NULL),
(4, 1, 5, 120, 186, NULL),
(5, 1, 5, 73, 140, NULL),
(6, 1, 5, 141, 207, NULL),
(7, 1, 6, 32, 44, NULL),
(8, 1, 6, 37, 49, NULL),
(9, 1, 6, 86, 98, NULL),
(10, 1, 6, 167, 239, NULL),
(11, 1, 7, 73, 140, NULL),
(12, 1, 7, 75, 142, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_menutype`
--

CREATE TABLE `tbl_menutype` (
  `menutypeid` int(11) NOT NULL,
  `menutype` varchar(120) NOT NULL,
  `menu_icon` varchar(150) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_module_purchasekey`
--

CREATE TABLE `tbl_module_purchasekey` (
  `mpid` int(11) NOT NULL,
  `module` varchar(25) DEFAULT NULL,
  `purchasekey` varchar(55) DEFAULT NULL,
  `downloaddate` datetime NOT NULL DEFAULT '1970-01-01 01:01:01',
  `updatedate` datetime NOT NULL DEFAULT '1970-01-01 01:01:01'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_notificationsetting`
--

CREATE TABLE `tbl_notificationsetting` (
  `notifid` int(11) NOT NULL,
  `firebasewaiterkitchen` text DEFAULT NULL,
  `onesignalcustomer` text NOT NULL,
  `onesignal_ioswaiter` text NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_openclose`
--

CREATE TABLE `tbl_openclose` (
  `stid` int(11) NOT NULL,
  `dayname` varchar(20) NOT NULL,
  `opentime` varchar(15) NOT NULL,
  `closetime` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tbl_openclose`
--

INSERT INTO `tbl_openclose` (`stid`, `dayname`, `opentime`, `closetime`) VALUES
(1, 'Saturday', '08:00', '21:00'),
(2, 'Sunday', '08:00', '20:00'),
(3, 'Monday', '08:00', '20:00'),
(4, 'Tuesday', '08:00', '20:00'),
(5, 'Wednesday', '08:00', '20:00'),
(6, 'Thursday', '08:00', '20:00'),
(7, 'Friday', 'Closed', 'Closed');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_orderprepare`
--

CREATE TABLE `tbl_orderprepare` (
  `opid` int(11) NOT NULL,
  `orderid` int(11) NOT NULL,
  `menuid` int(11) NOT NULL,
  `varient` int(11) NOT NULL,
  `preparetime` datetime NOT NULL DEFAULT '1970-01-01 01:01:01'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tbl_orderprepare`
--

INSERT INTO `tbl_orderprepare` (`opid`, `orderid`, `menuid`, `varient`, `preparetime`) VALUES
(1, 32, 51, 48, '2025-06-09 18:41:20'),
(2, 0, 0, 0, '2025-06-09 18:41:22'),
(3, 36, 51, 48, '2025-06-09 19:00:35'),
(4, 37, 51, 48, '2025-06-09 21:01:30'),
(5, 38, 51, 48, '2025-06-09 22:20:56'),
(6, 39, 51, 48, '2025-06-09 22:23:19'),
(7, 40, 51, 48, '2025-06-09 22:30:19'),
(8, 45, 44, 27, '2025-06-10 14:29:35');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_posetting`
--

CREATE TABLE `tbl_posetting` (
  `possettingid` int(11) NOT NULL,
  `waiter` int(11) NOT NULL DEFAULT 0 COMMENT '1=show,0=hide',
  `tableid` int(11) NOT NULL DEFAULT 0 COMMENT '1=show,0=hide',
  `cooktime` int(11) NOT NULL DEFAULT 0 COMMENT '1=enable,0=disable',
  `productionsetting` tinyint(4) NOT NULL DEFAULT 0 COMMENT '0=manual,1=auto',
  `tablemaping` int(11) NOT NULL DEFAULT 0 COMMENT '1=enable,0=disable',
  `soundenable` int(11) DEFAULT NULL COMMENT '1=enable,0=disable'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

--
-- Dumping data for table `tbl_posetting`
--

INSERT INTO `tbl_posetting` (`possettingid`, `waiter`, `tableid`, `cooktime`, `productionsetting`, `tablemaping`, `soundenable`) VALUES
(1, 1, 1, 1, 1, 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_quickordersetting`
--

CREATE TABLE `tbl_quickordersetting` (
  `quickordid` int(11) NOT NULL,
  `waiter` int(11) NOT NULL DEFAULT 1 COMMENT '1=show,0=hide',
  `tableid` int(11) NOT NULL DEFAULT 1 COMMENT '1=show,0=hide',
  `cooktime` int(11) NOT NULL DEFAULT 1 COMMENT '1=show,0=hide',
  `soundenable` int(11) NOT NULL DEFAULT 1 COMMENT '1=enable,0=disable	',
  `tablemaping` int(11) NOT NULL DEFAULT 1 COMMENT '1=enable,0=disable'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

--
-- Dumping data for table `tbl_quickordersetting`
--

INSERT INTO `tbl_quickordersetting` (`quickordid`, `waiter`, `tableid`, `cooktime`, `soundenable`, `tablemaping`) VALUES
(1, 1, 1, 1, 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_rating`
--

CREATE TABLE `tbl_rating` (
  `ratingid` int(11) NOT NULL,
  `title` varchar(200) DEFAULT NULL,
  `name` varchar(200) NOT NULL,
  `reviewtxt` text DEFAULT NULL,
  `proid` int(11) NOT NULL,
  `rating` decimal(10,2) NOT NULL DEFAULT 0.00,
  `status` int(11) NOT NULL DEFAULT 0,
  `email` varchar(255) NOT NULL,
  `ratetime` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_room`
--

CREATE TABLE `tbl_room` (
  `id` int(11) NOT NULL,
  `roomno` varchar(100) NOT NULL,
  `floorno` int(11) NOT NULL,
  `status` int(11) NOT NULL COMMENT '1=active,0=inactive'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_seoption`
--

CREATE TABLE `tbl_seoption` (
  `id` int(11) NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `title_slug` varchar(255) NOT NULL,
  `keywords` text DEFAULT NULL,
  `description` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

--
-- Dumping data for table `tbl_seoption`
--

INSERT INTO `tbl_seoption` (`id`, `title`, `title_slug`, `keywords`, `description`) VALUES
(1, 'Punjabi Palace Home page', 'home', 'restaurant,food,reservation', 'Best Restautant Management Software'),
(3, 'Menu', 'menu', 'Desert,Meet,fish,meet,bevarage', 'Menu Page'),
(4, 'Food Details', 'food_details', 'Meet,solt', 'Details food├é┬á information'),
(5, 'Reservation', 'reservation', 'Table,booking,reservation', 'Table Reservation'),
(6, 'Cart Page', 'cart_page', 'food,menu', 'Cart Page'),
(7, 'Checkout', 'checkout', 'Checkout', 'Checkout'),
(8, 'Login', 'login', 'Login', 'Login'),
(9, 'Registration', 'registration', 'Registration', 'Registration'),
(10, 'Payment information', 'payment_information', 'Online Payment information', 'Payment information'),
(11, 'Stripe Payment information', 'stripe_payment_information', 'Stripe Payment', 'Stripe Payment information'),
(12, 'About us', 'about_us', 'About restaurant', 'About us'),
(13, 'Contact Us', 'contact_us', 'Contact Us', 'Contact Us'),
(14, 'Privacy Policy', 'privacy_policy', 'privacy', 'Privacy Policy'),
(15, 'Our Terms', 'our_terms', 'Our Terms', 'Our Terms'),
(16, 'My Profile', 'my_profile', 'My Profile', 'My Profile'),
(17, 'My Order List', 'my_order_list', 'My Order List', 'My Order List'),
(18, 'View Order', 'view_order', 'View Order', 'View Order'),
(19, 'My Reservation', 'my_reservation', 'My Reservation', 'My Reservation'),
(20, 'Banquet & Catering', 'services', 'Banquet & Catering, Banquet, Catering, Services', 'Banquet & Catering'),
(21, 'Home Delivery', 'delivery', 'Details of delivery charges', 'Details of delivery charges'),
(22, 'Our Menu', 'our_menu', 'Details of Online Menu', 'Details of Online Menu');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_shippingaddress`
--

CREATE TABLE `tbl_shippingaddress` (
  `shipaddressid` int(11) NOT NULL,
  `orderid` int(11) NOT NULL,
  `firstname` varchar(100) DEFAULT NULL,
  `lastname` varchar(100) DEFAULT NULL,
  `companyname` varchar(100) DEFAULT NULL,
  `email` varchar(150) DEFAULT NULL,
  `phone` varchar(50) DEFAULT NULL,
  `city` varchar(70) DEFAULT NULL,
  `district` varchar(255) DEFAULT NULL,
  `country` varchar(150) DEFAULT NULL,
  `zip` varchar(50) DEFAULT NULL,
  `address` text DEFAULT NULL,
  `address2` text DEFAULT NULL,
  `DateInserted` datetime NOT NULL DEFAULT '1970-01-01 01:01:01'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

--
-- Dumping data for table `tbl_shippingaddress`
--

INSERT INTO `tbl_shippingaddress` (`shipaddressid`, `orderid`, `firstname`, `lastname`, `companyname`, `email`, `phone`, `city`, `district`, `country`, `zip`, `address`, `address2`, `DateInserted`) VALUES
(1, 52, 'Joy', 'Saha', NULL, 'jsaha.adzguru@gmail.com', '9112345678', '', 'West Bengal', 'India', '852741', 'Demo Address', NULL, '2025-03-04 14:57:52'),
(2, 53, 'Joy', 'Saha', NULL, 'jsaha.adzguru@gmail.com', '9112345678', '', 'West Bengal', 'India', '852741', 'Demo Address', NULL, '2025-03-04 15:30:48'),
(3, 44, 'Ravi', 'Kumar', NULL, 'php.ravikr8686@gmail.com', '08582957232', '', 'West Bengal', 'India', '700028', 'Lokenath Apartment', NULL, '2025-08-01 15:16:42');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_slider`
--

CREATE TABLE `tbl_slider` (
  `slid` int(11) NOT NULL,
  `Sltypeid` int(11) NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `subtitle` varchar(255) DEFAULT NULL,
  `image` varchar(255) NOT NULL,
  `slink` text DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `delation_status` int(11) NOT NULL DEFAULT 0,
  `width` int(11) NOT NULL DEFAULT 0,
  `height` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

--
-- Dumping data for table `tbl_slider`
--

INSERT INTO `tbl_slider` (`slid`, `Sltypeid`, `title`, `subtitle`, `image`, `slink`, `status`, `delation_status`, `width`, `height`) VALUES
(1, 1, NULL, '', 'assets/img/banner/2025-02-18/W.webp', '#', 1, 0, 1920, 902),
(2, 1, '', '', 'assets/img/banner/2025-02-18/W1.webp', '#', 1, 0, 1920, 902),
(3, 1, '', '', 'assets/img/banner/2025-02-18/W3.png', '#', 1, 0, 1920, 902),
(4, 1, '', '', 'assets/img/banner/2025-02-18/W2.webp', '#', 1, 0, 1920, 902),
(5, 2, 'Discover', 'OUR STORY', 'assets/img/banner/2025-03-24/2.webp', '/about', 1, 0, 263, 332),
(6, 3, 'Discover', 'OUR MENU', 'assets/img/banner/2025-03-24/O2.webp', '/our-menu', 1, 0, 263, 177),
(7, 3, 'Discover', 'OUR MENU', 'assets/img/banner/2025-04-09/O1.webp', '/our-menu', 1, 0, 263, 177),
(8, 3, 'Discover', 'OUR MENU', 'assets/img/banner/2025-04-09/O.webp', '/our-menu', 1, 0, 300, 379),
(9, 4, 'right', 'ads', 'assets/img/banner/2025-02-19/23.jpg', '#', 1, 0, 252, 621),
(10, 5, 'OUR AWESOME STREET', 'FOOD HISTORY', 'assets/img/banner/2025-02-19/I1.jpg', '#', 1, 0, 541, 516),
(11, 6, 'Reservation', 'BOOK YOUR TABLE', 'assets/img/banner/2025-02-19/b.jpg', '#', 1, 0, 470, 548),
(12, 7, 'Our Gallery', 'CHEF SELECTION', 'assets/img/banner/2025-02-19/R.jpg', '#', 1, 0, 363, 363),
(13, 7, 'Our Gallery', 'CHEF SELECTION', 'assets/img/banner/2025-02-19/R2.jpg', '#', 1, 0, 363, 363),
(14, 7, 'Our Gallery', 'CHEF SELECTION', 'assets/img/banner/2025-02-19/R3.jpg', '#', 1, 0, 363, 363),
(15, 7, 'Our Gallery', 'CHEF SELECTION', 'assets/img/banner/2025-02-19/R4.jpg', '#', 1, 0, 363, 363),
(16, 7, 'Our Gallery', 'CHEF SELECTION', 'assets/img/banner/2025-02-19/R5.jpg', '#', 1, 0, 363, 363),
(17, 7, 'Our Gallery', 'CHEF SELECTION', 'assets/img/banner/2025-02-19/R6.jpg', '#', 1, 0, 363, 363),
(18, 8, 'Offer', 'item offer', 'assets/img/banner/2025-02-19/o.jpg', '#', 1, 0, 250, 533),
(19, 9, 'Offer', 'food offer', 'assets/img/banner/2025-02-19/o1.jpg', '#', 1, 0, 250, 553),
(20, 10, 'contact us', 'contact', 'assets/img/banner/2025-02-19/c.jpg', '#', 1, 0, 475, 633),
(21, 2, 'Discover', 'OUR STORY', 'assets/img/banner/2025-03-24/A.webp', '/about', 1, 0, 263, 332);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_slider_type`
--

CREATE TABLE `tbl_slider_type` (
  `stype_id` int(11) NOT NULL,
  `STypeName` varchar(255) DEFAULT NULL,
  `delation_status` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

--
-- Dumping data for table `tbl_slider_type`
--

INSERT INTO `tbl_slider_type` (`stype_id`, `STypeName`, `delation_status`) VALUES
(1, 'Home Top Slider', 0),
(2, 'Home our story', 0),
(3, 'Home our menu', 0),
(4, 'Menu Page right Banner', 0),
(5, 'Classic theme Home story', 0),
(6, 'Classic theme Home reservation', 0),
(7, 'Classic theme Home gallery', 0),
(8, 'Menu Page Offer Banner Right', 0),
(9, 'Cart Page Offer Banner Right', 0),
(10, 'Contact Us', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_sociallink`
--

CREATE TABLE `tbl_sociallink` (
  `sid` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `socialurl` text DEFAULT NULL,
  `icon` varchar(100) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

--
-- Dumping data for table `tbl_sociallink`
--

INSERT INTO `tbl_sociallink` (`sid`, `title`, `socialurl`, `icon`, `status`) VALUES
(1, 'Facebook', 'https://www.facebook.com', 'fab fa-facebook', 1),
(2, 'Twitter', 'https://www.twitter.com', 'fab fa-twitter', 1),
(3, 'Google Plus', 'https://plus.google.com', 'fab fa-google-plus', 1),
(4, 'Pinterest', 'https://www.pinterest.com/', 'fab fa-pinterest', 1),
(6, 'Linkedin', 'https://linkedin.com', 'fab fa-linkedin', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_soundsetting`
--

CREATE TABLE `tbl_soundsetting` (
  `soundid` int(11) NOT NULL,
  `nofitysound` text DEFAULT NULL,
  `addtocartsound` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

--
-- Dumping data for table `tbl_soundsetting`
--

INSERT INTO `tbl_soundsetting` (`soundid`, `nofitysound`, `addtocartsound`) VALUES
(1, 'assets/2021-03-21/b1.mp3', 'h');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_state`
--

CREATE TABLE `tbl_state` (
  `stateid` int(11) NOT NULL,
  `countryid` int(11) NOT NULL,
  `statename` varchar(100) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

--
-- Dumping data for table `tbl_state`
--

INSERT INTO `tbl_state` (`stateid`, `countryid`, `statename`, `status`) VALUES
(1, 2, 'Alabama', 1),
(2, 2, 'Alaska', 1),
(3, 2, 'Arizona', 1),
(4, 2, 'Arkansas', 1),
(5, 2, 'California', 1),
(6, 2, 'Florida', 1),
(7, 2, 'New Mexico', 1),
(8, 2, 'New York', 1),
(9, 2, 'Oklahoma', 1),
(10, 2, 'Texas', 1),
(11, 2, 'Virginia', 1),
(12, 1, 'New South Wales', 1),
(13, 1, 'Victoria', 1),
(14, 1, 'Queensland', 1),
(15, 1, 'Western Australia', 1),
(16, 1, 'South Australia', 1),
(17, 1, 'Tasmania', 1),
(20, 4, 'West Bengal', 1),
(21, 4, 'Uttar Pradesh', 1),
(22, 4, 'Tripura', 1),
(23, 4, 'Telangana', 1),
(24, 4, 'Tamil Nadu', 1),
(25, 4, 'Sikkim', 1),
(26, 4, 'Rajasthan', 1),
(27, 4, 'Punjab', 1),
(28, 4, 'Odisha', 1),
(29, 4, 'Nagaland', 1),
(30, 4, 'Kerala', 1),
(31, 4, 'Haryana', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_tablefloor`
--

CREATE TABLE `tbl_tablefloor` (
  `tbfloorid` int(11) NOT NULL,
  `floorName` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tbl_tablefloor`
--

INSERT INTO `tbl_tablefloor` (`tbfloorid`, `floorName`) VALUES
(1, 'First Floor'),
(2, 'VIP Floor'),
(3, 'Second Floor');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_thirdparty_customer`
--

CREATE TABLE `tbl_thirdparty_customer` (
  `companyId` int(11) NOT NULL,
  `company_name` varchar(150) NOT NULL,
  `address` text DEFAULT NULL,
  `commision` decimal(10,2) DEFAULT 0.00
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_token`
--

CREATE TABLE `tbl_token` (
  `tokenid` int(11) NOT NULL,
  `tokencode` varchar(50) NOT NULL,
  `tokenrate` decimal(10,2) NOT NULL DEFAULT 0.00,
  `tokenstartdate` date NOT NULL,
  `tokenendate` date NOT NULL,
  `tokenstatus` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

--
-- Dumping data for table `tbl_token`
--

INSERT INTO `tbl_token` (`tokenid`, `tokencode`, `tokenrate`, `tokenstartdate`, `tokenendate`, `tokenstatus`) VALUES
(1, 'ABCD', 10.00, '2021-08-28', '2021-12-30', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_updateitems`
--

CREATE TABLE `tbl_updateitems` (
  `updateid` int(11) NOT NULL,
  `ordid` int(11) NOT NULL,
  `menuid` int(11) NOT NULL,
  `qty` decimal(10,3) NOT NULL DEFAULT 0.000,
  `adonsqty` varchar(50) DEFAULT NULL,
  `addonsid` varchar(50) DEFAULT NULL,
  `varientid` int(11) NOT NULL,
  `addonsuid` int(11) DEFAULT NULL,
  `isupdate` varchar(5) DEFAULT NULL,
  `insertdate` date DEFAULT '0000-00-00'
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_version_checker`
--

CREATE TABLE `tbl_version_checker` (
  `vid` int(11) NOT NULL,
  `version` varchar(10) DEFAULT NULL,
  `disable` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tbl_version_checker`
--

INSERT INTO `tbl_version_checker` (`vid`, `version`, `disable`) VALUES
(1, '2.8', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_waiterappcart`
--

CREATE TABLE `tbl_waiterappcart` (
  `weaterappid` int(11) NOT NULL,
  `waiterid` int(11) NOT NULL,
  `alladdOnsName` varchar(255) DEFAULT NULL,
  `total_addonsprice` decimal(10,2) DEFAULT 0.00,
  `totaladdons` int(11) DEFAULT NULL,
  `addons_name` varchar(255) DEFAULT NULL,
  `addons_id` int(11) DEFAULT NULL,
  `addons_price` double(10,2) DEFAULT 0.00,
  `addonsQty` int(11) DEFAULT NULL,
  `component` varchar(255) DEFAULT NULL,
  `destcription` text DEFAULT NULL,
  `itemnotes` varchar(255) DEFAULT NULL,
  `offerIsavailable` int(11) DEFAULT 0,
  `offerstartdate` date DEFAULT '0000-00-00',
  `OffersRate` int(11) DEFAULT NULL,
  `offerendate` date DEFAULT '0000-00-00',
  `price` decimal(10,2) DEFAULT 0.00,
  `ProductsID` int(11) NOT NULL,
  `ProductImage` varchar(255) NOT NULL,
  `ProductName` varchar(255) NOT NULL,
  `productvat` int(11) DEFAULT NULL,
  `quantity` int(11) NOT NULL,
  `variantName` varchar(255) NOT NULL,
  `variantid` int(11) NOT NULL,
  `orderid` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_widget`
--

CREATE TABLE `tbl_widget` (
  `widgetid` int(11) NOT NULL,
  `widget_name` varchar(100) NOT NULL,
  `widget_title` varchar(150) DEFAULT NULL,
  `widget_desc` text DEFAULT NULL,
  `widget_desc_full` text DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

--
-- Dumping data for table `tbl_widget`
--

INSERT INTO `tbl_widget` (`widgetid`, `widget_name`, `widget_title`, `widget_desc`, `widget_desc_full`, `status`) VALUES
(1, 'Footer left', '', '<p class=\"text-left\">At Punjabi Palace, our menu is a celebration of delicious, wholesome meals made with fresh, organic produce sourced from Brisbane.</p>', NULL, 1),
(2, 'footermiddle', 'Available On', '<p><strong>Monday to  Friday </strong></p>\r\n<p>11am -2:30pm & 4:30pm - 10pm</p>\r\n<p> </p>\r\n<p><strong>Saturday and Sunday</strong></p>\r\n<p>4:30pm - 10pm</p>\r\n<p> </p>', NULL, 1),
(3, 'Footer right', 'Contact Us', '<p>135 Melbourne St, South Brisbane, QLD 4101.</p>\r\n<p><a href=\"mailto:bookings@punjabipalace.com.au\">bookings@punjabipalace.com.au</a></p>\r\n<p><a href=\"#\">(07) 3846 3884</a></p>\r\n<p> </p>', NULL, 1),
(4, 'Our Store', 'Our Store', '<address>135 Melbourne St, South Brisbane, QLD 4101</address><address>Australia</address><address>NOW open 7 days a week</address>\r\n<p><a href=\"#\">(07) 3846 3884</a></p>\r\n<p><a href=\"mailto:bookings@punjabipalace.com.au\">bookings@punjabipalace.com.au</a></p>\r\n<p> </p>', NULL, 1),
(6, 'Reservation', 'BOOK YOUR TABLE', '<p>Enjoy your visit with us as our wide range of dishes, comprised of quality ingredients and vast combination of spices, entice your tastebuds and please don\'t hesitate to make any special dietary requests.</p>', NULL, 1),
(7, 'Our Menu text', 'Our Menu ', '<p>Punjabi Palace is run by a traditional Punjabi Family and is an independently operated business. We offer you a vast assortment of traditional Punjabi food and a fabulous friendly environment to relax and take pleasure dining in.</p>', NULL, 1),
(8, 'Specials', 'FOOD MENU', '<p>Indulge in our chef’s special dishes, crafted with authentic spices and fresh ingredients. From rich curries to sizzling tandoori delights, our specials bring you the true essence of Indian cuisine. Taste the tradition.</p>', NULL, 1),
(9, 'story text', 'OUR STORY', '<p>At Punjabi Palace, our menu is a celebration of delicious, wholesome meals made with fresh, organic produce sourced from Brisbane. Whether you\'re craving a flavorful biryani, soft breads, tandoori-roasted chicken, or a creamy, fresh prawn curry, we\'ve got something to satisfy every palate.</p>', '<p>At Punjabi Palace, our menu is a celebration of delicious, wholesome meals made with fresh, organic produce sourced from Brisbane. Whether you\'re craving a flavorful biryani, soft breads, tandoori-roasted chicken, or a creamy, fresh prawn curry, we\'ve got something to satisfy every palate. Our diverse selection includes both vegetarian and non-vegetarian dishes, ensuring there’s something for everyone.</p> <p> For the adults, we offer a fine selection of wines, and for the kids, we’ve got sweet treats that are sure to delight. We understand that food preferences can vary, even within families and among friends, but at Punjabi Palace, we’ve curated a menu that will keep everyone’s tastebuds happy. Come and explore our offerings – there\'s something for everyone!</p>', 1),
(10, 'Professional', 'OUR EXPERT CHEFS', '<p>Our talented chefs bring passion and creativity to every dish, using the finest ingredients to craft exceptional flavors. With years of experience, they blend culinary artistry with innovation, ensuring a memorable dining experience for every guest.</p>', NULL, 0),
(11, 'Need Help Booking?', 'Need Help Booking?', '<p class=\"mb-2\">Just call our customer services at any time, we are waiting 24 hours to recieve your calls.</p>\r\n<p><a href=\"#\">+880 1712 123 123</a></p>', NULL, 1),
(12, 'Privacy', 'Privacy Policy', '<p>We are committed to protecting the privacy of all visitors to the Website, including all visitors who access the Website or Service through any mobile application or other platform or device. Please read the following Privacy Policy which explains how we use and protect your information.</p>\r\n<p>By visiting and/or using the Service on the Website, you agree and, where required, you consent to the collection, use, storage, disclosure and transfer of your information as set out in this policy.</p>\r\n<ol>\r\n<li><strong> INFORMATION THAT WE COLLECT FROM YOU</strong></li>\r\n</ol>\r\n<p>1.1. When you visit the Website or use the Service to make an Order from a Restaurant through the Website, you may be asked to provide information about yourself including your name, address, contact details (such as telephone and mobile numbers and e-mail address) and payment information (such as credit or debit card information). We may also collect information about your usage of the Website and Service and information about you from the materials (such as messages and reviews) you post to the Website and the e-mails or letters you send to us. Your telephone calls to us may also be recorded for training and quality purposes.</p>\r\n<p>1.2. By accessing Punjabi Palace information and/or the Website or Service using mobile digital routes such as (but not limited to) mobile, tablet or other devices/technology including mobile applications, then you should expect that our data collection and usage as set out in this Privacy Policy will apply in that context too. We may collect technical information from your mobile device or your use of the Website or the Service through a mobile device, for example, location data and certain characteristics of, and performance data about, your device, carrier/operating system including device and connection type, IP address, mobile payment methods, interaction with other retail technology such as use of NFC Tags, QR Codes or use of mobile vouchers. Unless you have elected to remain anonymous through your device and/or platform settings, this information may be collected and used by us automatically if you use the Website or Service through your mobile device(s) via any Punjabi Palace mobile application, through your mobile\'s browser or otherwise.</p>\r\n<ol start=\"2\">\r\n<li><strong> USE OF YOUR INFORMATION</strong></li>\r\n</ol>\r\n<p>2.1. Your information will enable us to provide you with access to the relevant parts of the Website and to supply the Service. It will also enable us to bill you and enable us and/or a Restaurant with whom you have placed an Order to contact you where necessary concerning the Service. For example, we and/or the Restaurant may use your information to provide you with status updates or other information regarding your Order by e-mail, telephone, mobile or mobile messaging (e.g. SMS, MMS etc.). We will also use and analyse the information we collect so that we can administer, support, improve and develop our business, for any other purpose whether statistical or analytical and to help us prevent fraud. Where appropriate, now and in the future you may have the ability to express your preferences around the use of your data as set out in this Privacy Policy and this may be exercised though your chosen method of using the Service, for example mobile, mobile applications or any representation of the Website.</p>\r\n<p>2.2. We may use your information to contact you for your views on the Service and to notify you occasionally about important changes or developments to the Website or the Service.</p>\r\n<p> </p>\r\n<p>2.3. When you register with Punjabi Palace, you consent to Punjabi Palace using your personal information for direct marketing purposes to communicate with you by phone, email or SMS and, if you use our mobile application, via push notification, to tell you about offers, updates and our products and services that may be of interest to you.</p>\r\n<p>You may choose to stop receiving direct marketing communications from a channel at any time by using the unsubscribe mechanism in the marketing communication itself. To opt-out of communications via email click the \"unsubscribe\" link at the bottom of the email and to opt-out of communications by SMS reply with \"STOP\". You may also decline marketing messaging sent by push notifications by refusing the relevant permission to our app in your phone or tablet settings, however this will also prevent you from receiving order updates via push.</p>\r\n<p>2.4. Where you have given express consent, you agree that we may also share information with third parties (including those in the food, drink, leisure, marketing and advertising sectors) to use your information in order to let you know about goods and services which may be of interest to you (by post, telephone, mobile messaging (e.g. SMS, MMS etc.) and/or e-mail) in accordance with the Spam Act and the Privacy Act.</p>\r\n<p>We may also disclose your information to help us analyse the information which we collect so that we can administer, support, improve and develop our business and services to you.</p>\r\n<p>2.5. You agree that we may disclose personal information which we collect from you to other companies that also hold information about you. We may also collect personal information from those other companies. We and/or those companies may combine the information in order to better understand your preferences and interests, thereby enabling them and us to serve you better.</p>\r\n<p>2.6 If you do not want us to use your data in this way or change your mind about being contacted in the future, please let us know by using the contact details set out in paragraph 8 below, by amending your profile accordingly or by using the opt-out facilities provided (eg an unsubscribe link).</p>\r\n<p>2.7. Please note that by submitting Reviews regarding the Website, Service and/or Restaurants, you consent to us to use such Reviews on the Website and in any marketing or advertising materials. We will only identify you for this purpose by your first name and the city in which you reside (and any other information that you may from time to time consent to us disclosing).</p>\r\n<ol start=\"3\">\r\n<li><strong> DISCLOSURE OF YOUR INFORMATION</strong></li>\r\n</ol>\r\n<p>3.1. The information you provide to us will be transferred to and stored on our servers which may be in or outside Australia, and may be accessed by or given to our staff working outside Australia and third parties including companies within the Punjabi Palace group of companies (which means our subsidiaries and affiliates, our ultimate holding company and its subsidiaries and affiliates) who act for us for the purposes set out in this policy or for other purposes notified to you from time to time in this policy. We may disclose your information to overseas recipients, including, without limitation, recipients located in India. Where we disclose your personal information to overseas recipients, we will always take reasonable steps to ensure that your information is treated in accordance with this policy and the Australian Privacy Principles.</p>\r\n<p>3.2. The third parties with whom we share your information may undertake various activities such as processing credit card payments and providing support services for us. In addition, we may need to provide your information to any Restaurants that you have placed an Order with so as to allow the Restaurant to process and deliver your Order. By submitting your personal data, you agree to this transfer, storing or processing. We will take all steps reasonably necessary to ensure that your data is treated securely and in accordance with this Privacy Policy.</p>\r\n<p>3.3. If our business enters into a joint venture with, purchases or is sold to or merged with another business entity, your information may be disclosed or transferred to the target company, our new business partners or owners or their advisors.</p>\r\n<p>3.4. We may use the information that you provide to us if we are under a duty to disclose or share your information in order to comply with (and/or where we believe we are under a duty to comply with) any legal obligation; or in order to enforce the Website Terms and any other agreement; or to protect our rights or the rights of Restaurants or other third parties. This includes exchanging information with other companies and other organisations for the purposes of fraud protection and prevention.</p>\r\n<ol start=\"4\">\r\n<li><strong> SECURITY AND DATA RETENTION</strong></li>\r\n</ol>\r\n<p>4.1. We take steps to protect your information from unauthorised access, modification or disclosure and against misuse, interference, loss, destruction and damage. Once your information is no longer required for any purpose for which it may be used or disclosed by us, and we are not required by law to retain the information, we will destroy the information or ensure that it is de-identified.</p>\r\n<p>4.2. Where you have registered an account with Punjabi Palace and chosen a password which allows you to access certain parts of the Website, you are responsible for keeping this password confidential. We advise you not to share your password with anyone. Unless we negligently disclose your password to a third party, we will not be liable for any unauthorised transactions entered into using your name and password.</p>\r\n<p>4.3. All user details captured by Punjabi Palace are stored securely at all times and will never be provided to any unauthorised third parties. All credit card details are protected using SSL (Secure Socket Layer) encryption. Punjabi Palace has been verified for security and compliance to Crazy domains, an independent third party. Payment Method selection (for online order to Punjabi Palace pty ltd. only). Where payment is made by credit or direct card, this is conducted through PayPal, which is governed by the Privacy Policy of PayPal Inc.. Punjabi Palace will never save your actual credit card details.</p>\r\n<p>4.4. However, the transmission of information via the internet is not completely secure. Although we will take reasonable steps to protect your information and make sure it is safe and secure and we use a number of physical, administrative, personnel and technical measures to protect your personal information, we cannot guarantee the security of your data transmitted to the Website; any transmission is at your own risk. For the avoidance of doubt, Punjabi Palace will not in any circumstances be liable to you, or third parties, for loss or damage arising from credit card fraud or identity theft.</p>\r\n<ol start=\"5\">\r\n<li><strong> COOKIES AND THIRD PARTY ANALYTICS AND ADVERTISING</strong></li>\r\n</ol>\r\n<p>5.1. We may collect personal information about you when you use and access our website. While we do not use browsing information to identify you personally, we may record certain information about your use of our website, such as which pages you visit, the time and date of your visit and the internet protocol address assigned to your computer.</p>\r\n<p>5.2. We may also use \'cookies\' or other similar tracking technologies on our website that help us track your website usage and remember your preferences. Cookies are small files that store information on your computer, TV, mobile phone or other device. They enable the entity that put the cookie on your device to recognise you across different websites, services, devices and/or browsing sessions. You can disable cookies through your internet browser but our websites may not work as intended for you if you do so.</p>\r\n<p>5.3. We may also use cookies to enable us to collect data that may include personal information. For example, where a cookie is linked to your account, it will be considered personal information under the Privacy Act. We will handle any personal information collected by cookies in the same way that we handle all other personal information as described in this Privacy Policy.</p>\r\n<p>5.4. This site uses the Google Analytics cookie, and other cookies and identifiers to collect anonymous, aggregated audience data in order to measure user interactions on our site and improve our service. This includes the use of Google Analytics Advertiser Features which provides Demographic and Interest reports, Remarketing, GDN Impression Reporting, and the DoubleClick Campaign Manager integration. For more information on how this works and to opt-out of this service, please visit the following Google support page: <span xss=removed><a xss=removed href=\"https://support.google.com/analytics/answer/2700409?hl=en\" target=\"_blank\" rel=\"noopener noreferrer\">https://support.google.com/analytics/answer/2700409?hl=en</a></span></p>\r\n<ol start=\"6\">\r\n<li><strong> ACCESSING AND UPDATING</strong></li>\r\n</ol>\r\n<p>You have the right to see the information we hold about you and to ask us to make any changes to ensure that it is accurate and up to date. If you wish to do this, please contact us using the contact details set out in paragraph 8 below.</p>\r\n<ol start=\"7\">\r\n<li><strong> CHANGES TO OUR PRIVACY POLICY</strong></li>\r\n</ol>\r\n<p>Any changes to our Privacy Policy will be posted to the Website and, where appropriate, through e-mail notification. We encourage you to check our website periodically to ensure that you are aware of our current Privacy Policy.</p>\r\n<ol start=\"8\">\r\n<li><strong> CONTACT</strong></li>\r\n</ol>\r\n<p>All comments, queries and requests relating to our use of your information are welcomed. You can also lodge a complaint if you think we have breached the Privacy Act (Cth) 1988 in relation to your personal information. We will acknowledge your complaint and respond to you regarding your complaint within a reasonable period of time. If you think that we have failed to resolve the complaint satisfactorily, we will provide you with information about the further steps you can take. All correspondence should be addressed to 135 Melbourne St, South Brisbane, QLD 4101, Australia. Alternatively, you can contact us by emailing admin@punjabipalace.com.au or by calling (07) 3846 3884. Punjabi Palace is owned and operated by Punjabi Palace Pty Ltd.</p>', NULL, 1),
(13, 'termscondition', 'Terms and Conditions', '<p><strong>Cancellation Policy </strong></p>\r\n<p>Due to the size and nature of our restaurant, cancellations can have a very strong impact us. We require full payment of food menu at the time of booking as all sales are final and non-refundable. In the event you are unable to attend your dining experience we encourage you to transfer the booking to other guests of your choice. </p>\r\n<p> </p>\r\n<p>Any changes made to upcoming reservations (change of date or party size) must be made with a minimum of 7 days’ notice, where all changes will be based on availability. We do not permit any booking amendments made within 7 days’ notice of your booking, with the exception of unforeseen circumstances and at the discretion of restaurant staff. Any amendments to your reservation must be issued in writing via email to <a href=\"mailto:admin@punjabipalace.com.au\">admin@punjabipalace.com.au</a>.</p>\r\n<p> </p>\r\n<p><strong>Dietary Requirements </strong></p>\r\n<p>We can cater to all dietary requirements & allergies if given notice upon reservation. Please email us at <a href=\"mailto:admin@punjabipalace.com.au\">admin@punjabipalace.com.au</a> to advise us of your requirements or add notes to the comments section when booking. Our venue follows all food hygiene protocols and appropriate food handling practices. Whilst care is taken in the preparation of all food, traces may still be present.</p>\r\n<p><strong> </strong></p>\r\n<p><strong>Age and Pram Policy</strong></p>\r\n<p>Children over the age of 5 are more than welcome to dine at Punjabi Palace, but please be aware that no reduction in menu size or price is available. If you are bringing your child along with you then you must reserve them a seat and pay the menu price.</p>', NULL, 1),
(14, 'map', 'Google Map', '<p><iframe width=\"100%\" height=\"150\" frameborder=\"0\" scrolling=\"no\" marginheight=\"0\" marginwidth=\"0\" src=\"https://maps.google.com/maps?width=300%25&amp;height=150&amp;hl=en&amp;q=%20135%20Melbourne%20St,%20South%20Brisbane,%20QLD%204101+(Punjabi%20Palace)&amp;t=&amp;z=14&amp;ie=UTF8&amp;iwloc=B&amp;output=embed\" frameborder=\"0\" allowfullscreen=\"allowfullscreen\"></iframe></p>', NULL, 1),
(15, 'carousal1', 'carousal', '<p>show</p>', NULL, 1),
(16, 'TASTY MENU TODAY', 'CHEF SELECTION', '', NULL, 1),
(17, 'FOOD HISTORY', 'OUR AWESOME STREET', '<p class=\"mb-4\">Punjabi Palace would like to welcome you. We hope you enjoy our authentic Indian food and relax in the friendly environment we have created for your dining pleasure.</p>\r\n<p class=\"mb-4\">We offer a comprehensive array of dishes from all over India for you to enjoy.</p>\r\n<p class=\"mb-4\">We suggest you sample a combination of meals off our vast menu to truly appreciate the unique flavours offered with each dish.We guarantee the meals for quality & quantity.</p>\r\n<p class=\"mb-4\">Every dish is individually prepared to suit your taste of mild, medium, hot or very hot.</p>\r\n<p class=\"mb-4\">Punjabi Palace is run by a traditional Punjabi family and is an independently operated business. We are the one & only Punjabi Palace & do not have any other branches.</p>\r\n<p><a class=\"simple_btn\" href=\"../../about\">Our Story</a></p>', NULL, 1),
(21, 'Our Gallery', 'Restaurant Photo Gallery', '', NULL, 1),
(22, 'subfooter', '', '', NULL, 1),
(23, 'Get In Touch', 'contact', '<p>Serving delicious, handcrafted meals with fresh ingredients and warm hospitality. Contact us for reservations, catering, or inquiries—we’d love to hear from you!</p>', NULL, 1),
(24, 'Refund Policies', 'Refund Policies', '<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard.</p>', NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `themes`
--

CREATE TABLE `themes` (
  `themeid` int(11) NOT NULL,
  `themename` varchar(100) NOT NULL,
  `theme_thumb` varchar(255) DEFAULT NULL,
  `status` int(11) NOT NULL COMMENT '0=inactive,1=active',
  `activedate` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `themes`
--

INSERT INTO `themes` (`themeid`, `themename`, `theme_thumb`, `status`, `activedate`) VALUES
(1, 'defaults', NULL, 1, '2020-11-19'),
(3, 'classic', NULL, 0, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `top_menu`
--

CREATE TABLE `top_menu` (
  `menuid` int(11) NOT NULL,
  `menu_name` varchar(50) NOT NULL,
  `menu_slug` varchar(70) NOT NULL,
  `parentid` int(11) NOT NULL,
  `entrydate` date NOT NULL,
  `isactive` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

--
-- Dumping data for table `top_menu`
--

INSERT INTO `top_menu` (`menuid`, `menu_name`, `menu_slug`, `parentid`, `entrydate`, `isactive`) VALUES
(1, 'Home', '', 0, '2021-09-19', 1),
(2, 'Reservation', 'reservation', 0, '2025-04-14', 0),
(4, 'About Us', 'about', 0, '2019-11-25', 1),
(5, 'Menu', 'our-menu', 0, '2021-10-18', 1),
(6, 'Home Delivery', 'delivery', 0, '2025-04-09', 1),
(7, 'Cart', 'cart', 6, '2025-07-31', 1),
(8, 'Details', 'details', 7, '2020-01-15', 1),
(9, 'Banquet & Catering', 'services', 0, '2019-02-03', 1),
(10, 'My Profile', 'myprofile', 0, '2019-10-16', 1),
(11, 'Account', 'myprofile', 10, '2019-10-16', 1),
(12, 'Logout', 'frontend/logout', 10, '2019-02-03', 1),
(13, 'Contact Us', 'contact', 0, '2019-01-26', 1);

-- --------------------------------------------------------

--
-- Table structure for table `unit_of_measurement`
--

CREATE TABLE `unit_of_measurement` (
  `id` int(11) NOT NULL,
  `uom_name` varchar(200) NOT NULL,
  `uom_short_code` varchar(10) NOT NULL,
  `is_foodunit` int(11) NOT NULL DEFAULT 0,
  `uom_variations` text DEFAULT NULL,
  `is_active` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

--
-- Dumping data for table `unit_of_measurement`
--

INSERT INTO `unit_of_measurement` (`id`, `uom_name`, `uom_short_code`, `is_foodunit`, `uom_variations`, `is_active`) VALUES
(1, 'Kilogram', 'kg.', 0, 'kg,KG,kilogram,kgs,Kilograms,Kgs,KGS,kg.,Kg.', 1),
(2, 'Liter', 'ltr.', 0, 'ltr,liter,LTR,litre', 1),
(3, 'Gram', 'gm.', 1, 'grm,gram,GRAM,grams,gm,gms,grms', 1),
(4, 'tonne', 'tn.', 0, 'tn,tonne,TONNE,tons', 1),
(5, 'milligram', 'mg.', 0, 'mg,milligram,MG,milligrams', 1),
(6, 'carat', 'carat', 0, 'carat,CARAT,ct', 1),
(7, 'Per Pieces', 'pcs', 1, 'pcs,piece,PCS,pieces', 1),
(8, 'Per Cup', 'cup', 0, 'cup,CUP,cups', 1),
(9, 'Pound', 'pnd.', 0, 'pnd,pound,lb,POUND,lbs', 1),
(10, 'tablespoon', 'tspoon', 0, 'tspoon,tablespoon,TABLESPOON,tbsp,tsp', 1),
(11, 'Milliliter', 'ML', 1, 'ml,ML,milliliter,millilitre,mls,Mililiters,Mililiter,Ml.,ml.', 1),
(12, 'Per Plate', 'plate', 1, 'plate, Plate, Plates, plates', 1),
(13, 'Per Glass', 'per glass', 1, 'glass,Glass,GLASS,per glass', 1),
(14, 'Per Bottle', 'per bottle', 1, 'bottle,Bottle,BOTTLE,per bottle', 1);

-- --------------------------------------------------------

--
-- Table structure for table `usedcoupon`
--

CREATE TABLE `usedcoupon` (
  `cusedid` int(11) NOT NULL,
  `orderid` int(11) NOT NULL,
  `couponcode` varchar(100) NOT NULL,
  `couponrate` decimal(10,2) NOT NULL DEFAULT 0.00
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `firstname` varchar(50) DEFAULT NULL,
  `lastname` varchar(50) DEFAULT NULL,
  `about` text DEFAULT NULL,
  `waiter_kitchenToken` text DEFAULT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(32) NOT NULL,
  `login_pin` varchar(4) DEFAULT NULL,
  `password_reset_token` varchar(20) DEFAULT NULL,
  `image` varchar(100) DEFAULT NULL,
  `last_login` datetime DEFAULT NULL,
  `last_logout` datetime DEFAULT NULL,
  `ip_address` varchar(14) DEFAULT NULL,
  `counter` int(11) DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `is_admin` tinyint(4) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `firstname`, `lastname`, `about`, `waiter_kitchenToken`, `email`, `password`, `login_pin`, `password_reset_token`, `image`, `last_login`, `last_logout`, `ip_address`, `counter`, `status`, `is_admin`) VALUES
(2, 'John', 'Doe', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum', '', 'admin@example.com', '827ccb0eea8a706c4c34a16891f84e7b', '9630', '', './assets/img/user/m2.png', '2025-08-05 14:44:37', '2025-08-04 19:23:35', '2405:201:8005:', NULL, 1, 1),
(165, 'Hm', 'Isahaq', NULL, NULL, 'hmisahaq@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', '3333', NULL, NULL, NULL, NULL, NULL, NULL, 1, 0),
(166, 'Ainal', 'Haque', NULL, NULL, 'ainal@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', '4444', NULL, NULL, '2020-12-17 12:30:42', '2020-12-17 12:30:31', '::1', NULL, 1, 0),
(168, 'Manik ', 'Hassan', NULL, NULL, 'manik@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', '7777', NULL, NULL, '2025-08-05 12:07:30', '2025-08-05 12:06:43', '43.245.57.51', NULL, 1, 0),
(177, 'Di', 'Maria', NULL, NULL, 'dimaria@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', '2522', NULL, NULL, '2025-06-10 22:55:58', '2025-06-10 22:56:32', '::1', NULL, 1, 0),
(179, 'Charley', 'Macay', 'Waiter', NULL, 'charley88@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', '3434', NULL, '', '2025-02-14 08:52:48', '2025-02-14 08:54:17', '::1', NULL, 1, 0),
(180, 'Andray', 'Ochkas', 'Waiter', NULL, 'andray@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', '1313', NULL, '', '2025-02-14 11:37:39', '2025-02-14 13:15:27', '::1', NULL, 1, 0),
(181, 'Chand', 'kumar', 'testing', NULL, 'chanda@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', NULL, NULL, '', NULL, NULL, NULL, NULL, 1, 0),
(182, 'Ramesh', 'Waiter55', 'testing', NULL, 'waiter55@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', NULL, NULL, './assets/img/user/logo.png', '2025-06-10 14:51:23', '2025-06-10 15:24:01', '::1', 1, 1, 0),
(183, 'Malay', 'Goswami', 'testing', NULL, 'malaywaiter66@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', NULL, NULL, './assets/img/user/logo1.png', NULL, NULL, NULL, 1, 1, 0),
(184, 'Chandan', 'Waiter77', 'testing', NULL, 'chandan77@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', NULL, NULL, './assets/img/user/logo2.png', NULL, NULL, NULL, 1, 1, 0),
(185, 'Manashi', 'waiter44', 'testing', NULL, 'manashi@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', NULL, NULL, './assets/img/user/logo3.png', NULL, NULL, NULL, 1, 1, 0),
(186, 'Johan', 'Kundu', 'testing', NULL, 'johan22@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', '3333', NULL, './assets/img/user/logo4.png', NULL, NULL, NULL, NULL, 1, 0),
(187, 'Anil', 'Shah Waiter', '', NULL, 'anilshah11@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', '1212', NULL, './assets/img/user/logo5.png', '2025-06-10 22:53:22', '2025-06-10 22:54:55', '::1', NULL, 1, 0),
(188, 'Tanmoy', 'Das', 'Nice Person', NULL, 'tanmoywaiter@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', '8932', NULL, './assets/img/user/logo6.png', NULL, NULL, NULL, NULL, 1, 0),
(189, 'Shantanu', 'Basak', 'Waiter have experience', NULL, 'shantanu88@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', '3413', NULL, './assets/img/user/logo7.png', '2025-06-11 16:50:31', '2025-06-11 18:38:31', '::1', NULL, 1, 0),
(190, 'Chintan', 'Dhanani', '7 years experience in Cook', NULL, 'chintan88@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', '3762', NULL, './assets/img/user/logo8.png', '2025-08-05 11:04:42', '2025-08-04 15:00:38', '175.34.9.75', NULL, 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `variant`
--

CREATE TABLE `variant` (
  `variantid` int(11) NOT NULL,
  `menuid` int(11) NOT NULL,
  `variantName` varchar(120) NOT NULL,
  `price` decimal(10,2) NOT NULL DEFAULT 0.00,
  `takeaway_price` decimal(10,2) NOT NULL DEFAULT 0.00,
  `uber_eats_price` decimal(10,2) NOT NULL DEFAULT 0.00,
  `doordash_price` decimal(10,2) NOT NULL DEFAULT 0.00,
  `web_order_price` decimal(10,2) NOT NULL DEFAULT 0.00,
  `recipe_cost` decimal(10,2) DEFAULT NULL,
  `recipe_weightage` decimal(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

--
-- Dumping data for table `variant`
--

INSERT INTO `variant` (`variantid`, `menuid`, `variantName`, `price`, `takeaway_price`, `uber_eats_price`, `doordash_price`, `web_order_price`, `recipe_cost`, `recipe_weightage`) VALUES
(44, 32, 'Regular', 22.95, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00),
(45, 33, 'Regular', 22.95, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00),
(47, 35, 'Regular', 22.95, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00),
(48, 36, 'Regular', 23.95, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00),
(49, 37, 'Regular', 22.95, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00),
(50, 38, 'Regular', 23.95, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00),
(51, 39, 'Regular', 23.95, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00),
(52, 40, 'Regular', 23.95, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00),
(53, 41, 'Regular', 23.95, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00),
(54, 42, 'Regular', 23.95, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00),
(55, 43, 'Regular', 24.95, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00),
(56, 44, 'Regular', 24.95, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00),
(57, 45, 'Regular', 24.95, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00),
(58, 46, 'Regular', 22.95, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00),
(59, 47, 'Regular', 24.95, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00),
(60, 48, 'Regular', 24.95, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00),
(61, 49, 'Regular', 24.95, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00),
(62, 50, 'Regular', 22.95, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00),
(66, 54, 'Regular', 24.95, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00),
(71, 59, 'Regular', 24.95, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00),
(72, 60, 'Regular', 25.95, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00),
(73, 61, 'Regular', 25.95, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00),
(74, 62, 'Regular', 25.95, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00),
(76, 64, 'Regular', 25.95, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00),
(77, 65, 'Regular', 25.95, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00),
(78, 66, 'Regular', 25.95, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00),
(79, 67, 'Regular', 25.95, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00),
(80, 68, 'Regular', 25.95, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00),
(81, 69, 'Regular', 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00),
(95, 83, 'Regular', 26.95, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00),
(98, 86, 'Regular', 26.95, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00),
(103, 31, 'Regular', 22.95, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00),
(105, 1, 'Regular', 16.95, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00),
(106, 2, 'Regular', 17.95, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00),
(107, 4, 'Regular', 18.95, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00),
(108, 3, 'Regular', 17.95, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00),
(109, 5, 'Regular', 18.95, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00),
(111, 7, 'Regular', 18.95, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00),
(112, 8, 'Regular', 15.95, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00),
(113, 11, 'Regular', 14.95, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00),
(114, 12, 'Regular', 14.95, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00),
(115, 13, 'Regular', 14.95, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00),
(116, 14, 'Regular', 16.95, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00),
(118, 10, 'Regular', 12.95, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00),
(119, 9, 'Regular', 15.95, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00),
(120, 15, 'Regular', 9.95, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00),
(121, 16, 'Regular', 9.95, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00),
(123, 18, 'Regular', 12.95, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00),
(124, 19, 'Regular', 12.95, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00),
(125, 20, 'Regular', 12.95, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00),
(126, 21, 'Regular', 14.95, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00),
(127, 22, 'Regular', 12.95, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00),
(128, 23, 'Regular', 15.95, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00),
(130, 24, 'Regular', 17.95, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00),
(131, 25, 'Regular', 19.95, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00),
(132, 26, 'Regular', 19.95, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00),
(133, 30, 'Regular', 14.95, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00),
(134, 29, 'Regular', 11.95, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00),
(135, 28, 'Regular', 11.95, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00),
(136, 27, 'Regular', 18.95, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00),
(137, 70, 'Regular', 33.90, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00),
(138, 71, 'Regular', 51.90, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00),
(139, 72, 'Regular', 53.90, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00),
(140, 73, 'Regular', 29.69, 38.30, 21.25, 0.00, 0.00, 0.00, 0.00),
(141, 74, 'Regular', 16.60, 38.30, 21.25, 0.00, 0.00, 0.00, 0.00),
(142, 75, 'Regular', 25.00, 32.00, 21.25, 0.00, 0.00, 0.00, 0.00),
(143, 76, 'Regular', 51.58, 38.30, 21.25, 0.00, 0.00, 0.00, 0.00),
(145, 78, 'Regular', 25.95, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00),
(146, 79, 'Regular', 23.56, 15.00, 10.00, 0.00, 0.00, 0.00, 0.00),
(147, 80, 'Regular', 23.56, 15.00, 10.00, 0.00, 0.00, 0.00, 0.00),
(148, 81, 'Regular', 23.56, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00),
(149, 82, 'Regular', 26.95, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00),
(150, 89, 'Regular', 3.95, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00),
(151, 91, 'Regular', 4.95, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00),
(152, 92, 'Regular', 4.95, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00),
(153, 93, 'Regular', 4.95, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00),
(154, 94, 'Regular', 4.95, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00),
(155, 95, 'Regular', 4.95, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00),
(156, 96, 'Regular', 4.95, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00),
(157, 97, 'Regular', 4.95, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00),
(159, 98, 'Regular', 8.95, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00),
(160, 6, 'Regular', 18.95, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00),
(162, 17, 'Regular', 9.95, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00),
(164, 88, 'Regular', 26.95, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00),
(165, 87, 'Regular', 26.95, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00),
(166, 100, 'Regular', 5.95, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00),
(167, 101, 'Regular', 5.95, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00),
(169, 103, 'Regular', 8.95, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00),
(170, 104, 'Regular', 6.95, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00),
(171, 105, 'Regular', 8.95, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00),
(172, 106, 'Regular', 6.95, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00),
(173, 107, 'Regular', 8.95, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00),
(174, 108, 'Regular', 8.95, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00),
(175, 109, 'Regular', 8.95, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00),
(176, 110, 'Regular', 8.95, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00),
(177, 111, 'Regular', 8.95, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00),
(178, 112, 'Regular', 8.95, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00),
(179, 113, 'Regular', 8.95, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00),
(180, 114, 'Regular', 8.95, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00),
(181, 115, 'Regular', 8.95, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00),
(182, 116, 'Regular', 9.95, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00),
(183, 117, 'Regular', 13.95, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00),
(184, 118, 'Regular', 13.95, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00),
(185, 119, 'Regular', 5.95, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00),
(186, 120, 'Regular', 6.95, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00),
(187, 121, 'Regular', 8.95, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00),
(188, 122, 'Regular', 8.95, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00),
(189, 123, 'Regular', 8.95, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00),
(190, 124, 'Regular', 8.95, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00),
(191, 125, 'Regular', 8.95, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00),
(192, 126, 'Regular', 8.95, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00),
(193, 127, 'Regular', 8.95, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00),
(194, 128, 'Regular', 8.95, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00),
(195, 129, 'Regular', 8.95, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00),
(196, 130, 'Regular', 8.95, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00),
(197, 131, 'Regular', 8.95, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00),
(198, 132, 'Regular', 11.95, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00),
(199, 133, 'Regular', 5.95, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00),
(200, 134, 'Regular', 5.95, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00),
(201, 135, 'Regular', 5.95, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00),
(202, 136, 'Regular', 5.95, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00),
(203, 137, 'Regular', 5.95, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00),
(204, 138, 'Regular', 5.95, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00),
(205, 139, 'Regular', 4.50, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00),
(206, 140, 'Regular', 4.50, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00),
(207, 141, 'Regular', 14.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00),
(208, 142, 'Regular', 12.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00),
(209, 143, 'Regular', 35.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00),
(210, 144, 'Regular', 59.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00),
(216, 145, 'Regular', 8.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00),
(217, 146, 'Regular', 10.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00),
(218, 147, 'Regular', 12.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00),
(219, 148, 'Regular', 11.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00),
(220, 149, 'Regular', 10.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00),
(221, 150, 'Regular', 35.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00),
(222, 151, 'Regular', 49.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00),
(223, 152, 'Regular', 55.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00),
(224, 153, 'Regular', 59.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00),
(225, 154, 'Regular', 45.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00),
(226, 102, 'Regular', 6.95, 5.95, 0.00, 0.00, 0.00, 0.00, 0.00),
(227, 155, 'Regular', 10.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00),
(228, 156, 'Regular', 13.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00),
(229, 157, 'Regular', 8.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00),
(230, 158, 'Regular', 8.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00),
(231, 159, 'Regular', 8.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00),
(232, 160, 'Regular', 12.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00),
(233, 161, 'Regular', 45.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00),
(234, 162, 'Regular', 59.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00),
(235, 163, 'Regular', 35.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00),
(236, 164, 'Regular', 35.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00),
(237, 165, 'Regular', 49.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00),
(238, 166, 'Regular', 55.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00),
(239, 167, 'Regular', 10.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00),
(240, 168, 'Regular', 10.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00),
(241, 169, 'Regular', 10.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00),
(242, 170, 'Regular', 10.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00),
(243, 171, 'Regular', 10.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00),
(244, 172, 'Regular', 10.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00),
(245, 173, 'Regular', 10.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00),
(246, 174, 'Regular', 11.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00),
(247, 175, 'Regular', 11.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00),
(248, 176, 'Regular', 10.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00),
(249, 177, 'Regular', 14.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00),
(251, 77, 'Regular', 24.95, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00),
(252, 63, 'Regular', 25.95, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00),
(253, 178, 'Regular', 25.95, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00),
(255, 51, 'Regular', 24.95, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00),
(256, 179, 'Regular', 24.95, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00),
(257, 180, 'Regular', 24.95, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00),
(258, 181, 'Regular', 24.95, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00),
(260, 182, 'Regular', 24.95, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00),
(261, 52, 'Regular', 24.95, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00),
(262, 183, 'Regular', 24.95, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00),
(263, 184, 'Regular', 24.95, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00),
(264, 53, 'Regular', 24.95, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00),
(265, 185, 'Regular', 24.95, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00),
(266, 186, 'Regular', 24.95, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00),
(267, 187, 'Regular', 24.95, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00),
(268, 84, 'Regular', 26.95, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00),
(269, 188, 'Regular', 26.95, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00),
(270, 189, 'Regular', 26.95, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00),
(271, 190, 'Regular', 26.95, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00),
(272, 55, 'Regular', 24.95, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00),
(273, 191, 'Regular', 24.95, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00),
(274, 192, 'Regular', 24.95, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00),
(275, 193, 'Regular', 24.95, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00),
(277, 194, 'Regular', 24.95, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00),
(278, 195, 'Regular', 24.95, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00),
(279, 196, 'Regular', 24.94, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00),
(280, 56, 'Regular', 24.95, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00),
(281, 57, 'Regular', 24.95, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00),
(282, 197, 'Regular', 24.95, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00),
(283, 198, 'Regular', 24.95, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00),
(284, 199, 'Regular', 24.95, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00),
(285, 58, 'Regular', 24.95, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00),
(286, 200, 'Regular', 24.95, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00),
(287, 201, 'Regular', 24.95, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00),
(288, 202, 'Regular', 24.95, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00),
(289, 85, 'Regular', 26.95, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00),
(290, 203, 'Regular', 26.95, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00),
(291, 204, 'Regular', 26.95, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00),
(292, 205, 'Regular', 26.95, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00);

-- --------------------------------------------------------

--
-- Table structure for table `waste_management`
--

CREATE TABLE `waste_management` (
  `id` int(11) NOT NULL,
  `reference_no` varchar(50) NOT NULL,
  `waste_date` date NOT NULL,
  `user_id` int(11) NOT NULL,
  `waste_type` enum('ingredient','food') NOT NULL,
  `total_loss_amt` decimal(10,2) DEFAULT 0.00,
  `note` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `waste_management_items`
--

CREATE TABLE `waste_management_items` (
  `id` int(11) NOT NULL,
  `waste_id` int(11) NOT NULL,
  `ingredient_id` int(11) DEFAULT NULL,
  `qty` decimal(10,2) DEFAULT NULL,
  `unit_id` int(11) DEFAULT NULL,
  `ingredient_status` tinyint(1) DEFAULT 0,
  `loss_amount` decimal(10,2) DEFAULT NULL,
  `food_id` int(11) DEFAULT NULL,
  `food_qty` decimal(10,2) DEFAULT NULL,
  `food_variant` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `weekly_holiday`
--

CREATE TABLE `weekly_holiday` (
  `wk_id` int(11) NOT NULL,
  `dayname` varchar(30) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

--
-- Dumping data for table `weekly_holiday`
--

INSERT INTO `weekly_holiday` (`wk_id`, `dayname`) VALUES
(1, 'Friday,Satarday,Sunday');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `accesslog`
--
ALTER TABLE `accesslog`
  ADD PRIMARY KEY (`sl_no`);

--
-- Indexes for table `acc_account_name`
--
ALTER TABLE `acc_account_name`
  ADD PRIMARY KEY (`account_id`);

--
-- Indexes for table `acc_coa`
--
ALTER TABLE `acc_coa`
  ADD PRIMARY KEY (`HeadName`);

--
-- Indexes for table `acc_customer_income`
--
ALTER TABLE `acc_customer_income`
  ADD UNIQUE KEY `ID` (`ID`);

--
-- Indexes for table `acc_glsummarybalance`
--
ALTER TABLE `acc_glsummarybalance`
  ADD UNIQUE KEY `ID` (`ID`);

--
-- Indexes for table `acc_income_expence`
--
ALTER TABLE `acc_income_expence`
  ADD UNIQUE KEY `ID` (`ID`);

--
-- Indexes for table `acc_transaction`
--
ALTER TABLE `acc_transaction`
  ADD UNIQUE KEY `ID` (`ID`);

--
-- Indexes for table `acn_account_transaction`
--
ALTER TABLE `acn_account_transaction`
  ADD PRIMARY KEY (`account_tran_id`);

--
-- Indexes for table `add_ons`
--
ALTER TABLE `add_ons`
  ADD PRIMARY KEY (`add_on_id`);

--
-- Indexes for table `add_on_ingr_dtls`
--
ALTER TABLE `add_on_ingr_dtls`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `award`
--
ALTER TABLE `award`
  ADD PRIMARY KEY (`award_id`);

--
-- Indexes for table `bill`
--
ALTER TABLE `bill`
  ADD PRIMARY KEY (`bill_id`),
  ADD KEY `order_id` (`order_id`),
  ADD KEY `customer_id` (`customer_id`);

--
-- Indexes for table `bill_card_payment`
--
ALTER TABLE `bill_card_payment`
  ADD PRIMARY KEY (`row_id`);

--
-- Indexes for table `bkp_13062025_contact_data`
--
ALTER TABLE `bkp_13062025_contact_data`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bkp_13062025_tbl_seoption`
--
ALTER TABLE `bkp_13062025_tbl_seoption`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bkp_13062025_tbl_slider`
--
ALTER TABLE `bkp_13062025_tbl_slider`
  ADD PRIMARY KEY (`slid`);

--
-- Indexes for table `bkp_13062025_tbl_slider_type`
--
ALTER TABLE `bkp_13062025_tbl_slider_type`
  ADD PRIMARY KEY (`stype_id`);

--
-- Indexes for table `bkp_13062025_tbl_widget`
--
ALTER TABLE `bkp_13062025_tbl_widget`
  ADD PRIMARY KEY (`widgetid`);

--
-- Indexes for table `bkp_13062025_top_menu`
--
ALTER TABLE `bkp_13062025_top_menu`
  ADD PRIMARY KEY (`menuid`);

--
-- Indexes for table `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `brand_name` (`brand_name`);

--
-- Indexes for table `candidate_basic_info`
--
ALTER TABLE `candidate_basic_info`
  ADD PRIMARY KEY (`can_id`);

--
-- Indexes for table `candidate_education_info`
--
ALTER TABLE `candidate_education_info`
  ADD PRIMARY KEY (`can_edu_id`);

--
-- Indexes for table `candidate_interview`
--
ALTER TABLE `candidate_interview`
  ADD PRIMARY KEY (`can_int_id`);

--
-- Indexes for table `candidate_selection`
--
ALTER TABLE `candidate_selection`
  ADD PRIMARY KEY (`can_sel_id`);

--
-- Indexes for table `candidate_shortlist`
--
ALTER TABLE `candidate_shortlist`
  ADD PRIMARY KEY (`can_short_id`);

--
-- Indexes for table `candidate_workexperience`
--
ALTER TABLE `candidate_workexperience`
  ADD PRIMARY KEY (`can_workexp_id`);

--
-- Indexes for table `cart_selected_modifiers`
--
ALTER TABLE `cart_selected_modifiers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `check_addones`
--
ALTER TABLE `check_addones`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `common_setting`
--
ALTER TABLE `common_setting`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contact_data`
--
ALTER TABLE `contact_data`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `currency`
--
ALTER TABLE `currency`
  ADD PRIMARY KEY (`currencyid`);

--
-- Indexes for table `customer_info`
--
ALTER TABLE `customer_info`
  ADD PRIMARY KEY (`customer_id`);

--
-- Indexes for table `customer_membership_map`
--
ALTER TABLE `customer_membership_map`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customer_order`
--
ALTER TABLE `customer_order`
  ADD PRIMARY KEY (`order_id`),
  ADD KEY `customer_id` (`customer_id`),
  ADD KEY `cutomertype` (`cutomertype`),
  ADD KEY `waiter_id` (`waiter_id`),
  ADD KEY `kitchen` (`kitchen`),
  ADD KEY `thirdpartyinvoiceid` (`thirdpartyinvoiceid`);

--
-- Indexes for table `customer_type`
--
ALTER TABLE `customer_type`
  ADD PRIMARY KEY (`customer_type_id`);

--
-- Indexes for table `custom_table`
--
ALTER TABLE `custom_table`
  ADD PRIMARY KEY (`custom_id`);

--
-- Indexes for table `days`
--
ALTER TABLE `days`
  ADD PRIMARY KEY (`day_id`);

--
-- Indexes for table `delivery_charges`
--
ALTER TABLE `delivery_charges`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `department`
--
ALTER TABLE `department`
  ADD PRIMARY KEY (`dept_id`);

--
-- Indexes for table `duty_type`
--
ALTER TABLE `duty_type`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `email_config`
--
ALTER TABLE `email_config`
  ADD PRIMARY KEY (`email_config_id`);

--
-- Indexes for table `employee_benifit`
--
ALTER TABLE `employee_benifit`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `employee_history`
--
ALTER TABLE `employee_history`
  ADD PRIMARY KEY (`emp_id`);

--
-- Indexes for table `employee_performance`
--
ALTER TABLE `employee_performance`
  ADD PRIMARY KEY (`emp_per_id`);

--
-- Indexes for table `employee_salary_payment`
--
ALTER TABLE `employee_salary_payment`
  ADD PRIMARY KEY (`emp_sal_pay_id`);

--
-- Indexes for table `employee_salary_setup`
--
ALTER TABLE `employee_salary_setup`
  ADD PRIMARY KEY (`e_s_s_id`);

--
-- Indexes for table `emp_attendance`
--
ALTER TABLE `emp_attendance`
  ADD PRIMARY KEY (`att_id`);

--
-- Indexes for table `expense`
--
ALTER TABLE `expense`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `expense_item`
--
ALTER TABLE `expense_item`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `foodvariable`
--
ALTER TABLE `foodvariable`
  ADD PRIMARY KEY (`availableID`);

--
-- Indexes for table `gender`
--
ALTER TABLE `gender`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `grand_loan`
--
ALTER TABLE `grand_loan`
  ADD PRIMARY KEY (`loan_id`);

--
-- Indexes for table `ingredients`
--
ALTER TABLE `ingredients`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ingredients_opening_stock`
--
ALTER TABLE `ingredients_opening_stock`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ingredient_temp`
--
ALTER TABLE `ingredient_temp`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `invprice_difference_notification`
--
ALTER TABLE `invprice_difference_notification`
  ADD PRIMARY KEY (`notify_id`);

--
-- Indexes for table `item_category`
--
ALTER TABLE `item_category`
  ADD PRIMARY KEY (`CategoryID`);

--
-- Indexes for table `item_foods`
--
ALTER TABLE `item_foods`
  ADD PRIMARY KEY (`ProductsID`);

--
-- Indexes for table `itxn`
--
ALTER TABLE `itxn`
  ADD PRIMARY KEY (`tid`);

--
-- Indexes for table `language`
--
ALTER TABLE `language`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `phrase` (`phrase`);

--
-- Indexes for table `leave_apply`
--
ALTER TABLE `leave_apply`
  ADD PRIMARY KEY (`leave_appl_id`);

--
-- Indexes for table `leave_type`
--
ALTER TABLE `leave_type`
  ADD PRIMARY KEY (`leave_type_id`);

--
-- Indexes for table `loan_installment`
--
ALTER TABLE `loan_installment`
  ADD PRIMARY KEY (`loan_inst_id`);

--
-- Indexes for table `marital_info`
--
ALTER TABLE `marital_info`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `measurement_units`
--
ALTER TABLE `measurement_units`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `membership`
--
ALTER TABLE `membership`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `menu_add_on`
--
ALTER TABLE `menu_add_on`
  ADD PRIMARY KEY (`row_id`);

--
-- Indexes for table `menu_group_modifiers`
--
ALTER TABLE `menu_group_modifiers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `menu_group_id` (`menu_group_id`),
  ADD KEY `modifier_id` (`modifier_id`);

--
-- Indexes for table `menu_modifier_groups`
--
ALTER TABLE `menu_modifier_groups`
  ADD PRIMARY KEY (`id`),
  ADD KEY `menu_id` (`menu_id`),
  ADD KEY `group_id` (`group_id`);

--
-- Indexes for table `menu_pdf_materials`
--
ALTER TABLE `menu_pdf_materials`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `message`
--
ALTER TABLE `message`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `modifiers`
--
ALTER TABLE `modifiers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `group_id` (`group_id`);

--
-- Indexes for table `modifier_groups`
--
ALTER TABLE `modifier_groups`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `module`
--
ALTER TABLE `module`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `module_permission`
--
ALTER TABLE `module_permission`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_module_id` (`fk_module_id`),
  ADD KEY `fk_user_id` (`fk_user_id`);

--
-- Indexes for table `module_purchase_key`
--
ALTER TABLE `module_purchase_key`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `multipay_bill`
--
ALTER TABLE `multipay_bill`
  ADD PRIMARY KEY (`multipay_id`);

--
-- Indexes for table `ordered_menu_item_modifiers`
--
ALTER TABLE `ordered_menu_item_modifiers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_item_modifiers`
--
ALTER TABLE `order_item_modifiers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_menu`
--
ALTER TABLE `order_menu`
  ADD PRIMARY KEY (`row_id`);

--
-- Indexes for table `paymentsetup`
--
ALTER TABLE `paymentsetup`
  ADD PRIMARY KEY (`setupid`);

--
-- Indexes for table `payment_method`
--
ALTER TABLE `payment_method`
  ADD PRIMARY KEY (`payment_method_id`);

--
-- Indexes for table `payroll_commission_setting`
--
ALTER TABLE `payroll_commission_setting`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `payroll_holiday`
--
ALTER TABLE `payroll_holiday`
  ADD PRIMARY KEY (`payrl_holi_id`);

--
-- Indexes for table `payroll_tax_setup`
--
ALTER TABLE `payroll_tax_setup`
  ADD PRIMARY KEY (`tax_setup_id`);

--
-- Indexes for table `pay_frequency`
--
ALTER TABLE `pay_frequency`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `position`
--
ALTER TABLE `position`
  ADD PRIMARY KEY (`pos_id`);

--
-- Indexes for table `price_schedules`
--
ALTER TABLE `price_schedules`
  ADD PRIMARY KEY (`ScheduleID`);

--
-- Indexes for table `production`
--
ALTER TABLE `production`
  ADD PRIMARY KEY (`productionid`);

--
-- Indexes for table `production_details`
--
ALTER TABLE `production_details`
  ADD PRIMARY KEY (`pro_detailsid`);

--
-- Indexes for table `promotion_main_modifiers`
--
ALTER TABLE `promotion_main_modifiers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `promotion_other_modifiers`
--
ALTER TABLE `promotion_other_modifiers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `promo_data`
--
ALTER TABLE `promo_data`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `purchaseitem`
--
ALTER TABLE `purchaseitem`
  ADD PRIMARY KEY (`purID`);

--
-- Indexes for table `purchase_details`
--
ALTER TABLE `purchase_details`
  ADD PRIMARY KEY (`detailsid`);

--
-- Indexes for table `purchase_return`
--
ALTER TABLE `purchase_return`
  ADD PRIMARY KEY (`preturn_id`);

--
-- Indexes for table `rate_type`
--
ALTER TABLE `rate_type`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reservationofday`
--
ALTER TABLE `reservationofday`
  ADD PRIMARY KEY (`offdayid`);

--
-- Indexes for table `rest_table`
--
ALTER TABLE `rest_table`
  ADD PRIMARY KEY (`tableid`);

--
-- Indexes for table `role_permission`
--
ALTER TABLE `role_permission`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_module_id` (`fk_module_id`),
  ADD KEY `fk_user_id` (`role_id`);

--
-- Indexes for table `salary_setup_header`
--
ALTER TABLE `salary_setup_header`
  ADD PRIMARY KEY (`s_s_h_id`);

--
-- Indexes for table `salary_sheet_generate`
--
ALTER TABLE `salary_sheet_generate`
  ADD PRIMARY KEY (`ssg_id`);

--
-- Indexes for table `salary_type`
--
ALTER TABLE `salary_type`
  ADD PRIMARY KEY (`salary_type_id`);

--
-- Indexes for table `sec_menu_item`
--
ALTER TABLE `sec_menu_item`
  ADD PRIMARY KEY (`menu_id`);

--
-- Indexes for table `sec_role_permission`
--
ALTER TABLE `sec_role_permission`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sec_role_tbl`
--
ALTER TABLE `sec_role_tbl`
  ADD PRIMARY KEY (`role_id`);

--
-- Indexes for table `sec_user_access_tbl`
--
ALTER TABLE `sec_user_access_tbl`
  ADD PRIMARY KEY (`role_acc_id`);

--
-- Indexes for table `setting`
--
ALTER TABLE `setting`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `shipping_method`
--
ALTER TABLE `shipping_method`
  ADD PRIMARY KEY (`ship_id`);

--
-- Indexes for table `slots`
--
ALTER TABLE `slots`
  ADD PRIMARY KEY (`slot_id`);

--
-- Indexes for table `sms_configuration`
--
ALTER TABLE `sms_configuration`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sms_template`
--
ALTER TABLE `sms_template`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `stock_adjustments`
--
ALTER TABLE `stock_adjustments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ingredient_id` (`ingredient_id`);

--
-- Indexes for table `subscribe_emaillist`
--
ALTER TABLE `subscribe_emaillist`
  ADD PRIMARY KEY (`emailid`);

--
-- Indexes for table `sub_order`
--
ALTER TABLE `sub_order`
  ADD PRIMARY KEY (`sub_id`);

--
-- Indexes for table `supplier`
--
ALTER TABLE `supplier`
  ADD PRIMARY KEY (`supid`);

--
-- Indexes for table `supplier_ledger`
--
ALTER TABLE `supplier_ledger`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `synchronizer_setting`
--
ALTER TABLE `synchronizer_setting`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `table_details`
--
ALTER TABLE `table_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `table_setting`
--
ALTER TABLE `table_setting`
  ADD PRIMARY KEY (`settingid`);

--
-- Indexes for table `tblreservation`
--
ALTER TABLE `tblreservation`
  ADD PRIMARY KEY (`reserveid`);

--
-- Indexes for table `tblserver`
--
ALTER TABLE `tblserver`
  ADD PRIMARY KEY (`serverid`);

--
-- Indexes for table `tbl_assign_kitchen`
--
ALTER TABLE `tbl_assign_kitchen`
  ADD PRIMARY KEY (`assignid`);

--
-- Indexes for table `tbl_bank`
--
ALTER TABLE `tbl_bank`
  ADD PRIMARY KEY (`bankid`);

--
-- Indexes for table `tbl_billingaddress`
--
ALTER TABLE `tbl_billingaddress`
  ADD PRIMARY KEY (`billaddressid`);

--
-- Indexes for table `tbl_cancelitem`
--
ALTER TABLE `tbl_cancelitem`
  ADD PRIMARY KEY (`cancelid`);

--
-- Indexes for table `tbl_card_terminal`
--
ALTER TABLE `tbl_card_terminal`
  ADD PRIMARY KEY (`card_terminalid`);

--
-- Indexes for table `tbl_cashcounter`
--
ALTER TABLE `tbl_cashcounter`
  ADD PRIMARY KEY (`ccid`);

--
-- Indexes for table `tbl_cashregister`
--
ALTER TABLE `tbl_cashregister`
  ADD PRIMARY KEY (`id`),
  ADD KEY `userid` (`userid`);

--
-- Indexes for table `tbl_city`
--
ALTER TABLE `tbl_city`
  ADD PRIMARY KEY (`cityid`);

--
-- Indexes for table `tbl_country`
--
ALTER TABLE `tbl_country`
  ADD PRIMARY KEY (`countryid`);

--
-- Indexes for table `tbl_delivaritime`
--
ALTER TABLE `tbl_delivaritime`
  ADD PRIMARY KEY (`dtimeid`);

--
-- Indexes for table `tbl_delivaryaddress`
--
ALTER TABLE `tbl_delivaryaddress`
  ADD PRIMARY KEY (`delivaryid`);

--
-- Indexes for table `tbl_generatedreport`
--
ALTER TABLE `tbl_generatedreport`
  ADD PRIMARY KEY (`generateid`);

--
-- Indexes for table `tbl_groupitems`
--
ALTER TABLE `tbl_groupitems`
  ADD PRIMARY KEY (`groupid`);

--
-- Indexes for table `tbl_itemaccepted`
--
ALTER TABLE `tbl_itemaccepted`
  ADD PRIMARY KEY (`acid`);

--
-- Indexes for table `tbl_kitchen`
--
ALTER TABLE `tbl_kitchen`
  ADD PRIMARY KEY (`kitchenid`);

--
-- Indexes for table `tbl_kitchen_order`
--
ALTER TABLE `tbl_kitchen_order`
  ADD PRIMARY KEY (`ktid`);

--
-- Indexes for table `tbl_menutype`
--
ALTER TABLE `tbl_menutype`
  ADD PRIMARY KEY (`menutypeid`);

--
-- Indexes for table `tbl_module_purchasekey`
--
ALTER TABLE `tbl_module_purchasekey`
  ADD PRIMARY KEY (`mpid`);

--
-- Indexes for table `tbl_notificationsetting`
--
ALTER TABLE `tbl_notificationsetting`
  ADD PRIMARY KEY (`notifid`);

--
-- Indexes for table `tbl_openclose`
--
ALTER TABLE `tbl_openclose`
  ADD PRIMARY KEY (`stid`);

--
-- Indexes for table `tbl_orderprepare`
--
ALTER TABLE `tbl_orderprepare`
  ADD PRIMARY KEY (`opid`);

--
-- Indexes for table `tbl_posetting`
--
ALTER TABLE `tbl_posetting`
  ADD PRIMARY KEY (`possettingid`);

--
-- Indexes for table `tbl_quickordersetting`
--
ALTER TABLE `tbl_quickordersetting`
  ADD PRIMARY KEY (`quickordid`);

--
-- Indexes for table `tbl_rating`
--
ALTER TABLE `tbl_rating`
  ADD PRIMARY KEY (`ratingid`);

--
-- Indexes for table `tbl_room`
--
ALTER TABLE `tbl_room`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_seoption`
--
ALTER TABLE `tbl_seoption`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_shippingaddress`
--
ALTER TABLE `tbl_shippingaddress`
  ADD PRIMARY KEY (`shipaddressid`);

--
-- Indexes for table `tbl_slider`
--
ALTER TABLE `tbl_slider`
  ADD PRIMARY KEY (`slid`);

--
-- Indexes for table `tbl_slider_type`
--
ALTER TABLE `tbl_slider_type`
  ADD PRIMARY KEY (`stype_id`);

--
-- Indexes for table `tbl_sociallink`
--
ALTER TABLE `tbl_sociallink`
  ADD PRIMARY KEY (`sid`);

--
-- Indexes for table `tbl_soundsetting`
--
ALTER TABLE `tbl_soundsetting`
  ADD PRIMARY KEY (`soundid`);

--
-- Indexes for table `tbl_state`
--
ALTER TABLE `tbl_state`
  ADD PRIMARY KEY (`stateid`);

--
-- Indexes for table `tbl_tablefloor`
--
ALTER TABLE `tbl_tablefloor`
  ADD PRIMARY KEY (`tbfloorid`);

--
-- Indexes for table `tbl_thirdparty_customer`
--
ALTER TABLE `tbl_thirdparty_customer`
  ADD PRIMARY KEY (`companyId`);

--
-- Indexes for table `tbl_token`
--
ALTER TABLE `tbl_token`
  ADD PRIMARY KEY (`tokenid`);

--
-- Indexes for table `tbl_updateitems`
--
ALTER TABLE `tbl_updateitems`
  ADD PRIMARY KEY (`updateid`);

--
-- Indexes for table `tbl_version_checker`
--
ALTER TABLE `tbl_version_checker`
  ADD PRIMARY KEY (`vid`);

--
-- Indexes for table `tbl_waiterappcart`
--
ALTER TABLE `tbl_waiterappcart`
  ADD PRIMARY KEY (`weaterappid`);

--
-- Indexes for table `tbl_widget`
--
ALTER TABLE `tbl_widget`
  ADD PRIMARY KEY (`widgetid`);

--
-- Indexes for table `themes`
--
ALTER TABLE `themes`
  ADD PRIMARY KEY (`themeid`);

--
-- Indexes for table `top_menu`
--
ALTER TABLE `top_menu`
  ADD PRIMARY KEY (`menuid`);

--
-- Indexes for table `unit_of_measurement`
--
ALTER TABLE `unit_of_measurement`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `usedcoupon`
--
ALTER TABLE `usedcoupon`
  ADD PRIMARY KEY (`cusedid`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `variant`
--
ALTER TABLE `variant`
  ADD PRIMARY KEY (`variantid`);

--
-- Indexes for table `waste_management`
--
ALTER TABLE `waste_management`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `waste_management_items`
--
ALTER TABLE `waste_management_items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `waste_id` (`waste_id`);

--
-- Indexes for table `weekly_holiday`
--
ALTER TABLE `weekly_holiday`
  ADD PRIMARY KEY (`wk_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `accesslog`
--
ALTER TABLE `accesslog`
  MODIFY `sl_no` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1485;

--
-- AUTO_INCREMENT for table `acc_account_name`
--
ALTER TABLE `acc_account_name`
  MODIFY `account_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `acc_customer_income`
--
ALTER TABLE `acc_customer_income`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `acc_glsummarybalance`
--
ALTER TABLE `acc_glsummarybalance`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `acc_income_expence`
--
ALTER TABLE `acc_income_expence`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `acc_transaction`
--
ALTER TABLE `acc_transaction`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `acn_account_transaction`
--
ALTER TABLE `acn_account_transaction`
  MODIFY `account_tran_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `add_ons`
--
ALTER TABLE `add_ons`
  MODIFY `add_on_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `add_on_ingr_dtls`
--
ALTER TABLE `add_on_ingr_dtls`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `award`
--
ALTER TABLE `award`
  MODIFY `award_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `bill`
--
ALTER TABLE `bill`
  MODIFY `bill_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `bill_card_payment`
--
ALTER TABLE `bill_card_payment`
  MODIFY `row_id` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `bkp_13062025_contact_data`
--
ALTER TABLE `bkp_13062025_contact_data`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `bkp_13062025_tbl_seoption`
--
ALTER TABLE `bkp_13062025_tbl_seoption`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `bkp_13062025_tbl_slider`
--
ALTER TABLE `bkp_13062025_tbl_slider`
  MODIFY `slid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `bkp_13062025_tbl_slider_type`
--
ALTER TABLE `bkp_13062025_tbl_slider_type`
  MODIFY `stype_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `bkp_13062025_tbl_widget`
--
ALTER TABLE `bkp_13062025_tbl_widget`
  MODIFY `widgetid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `bkp_13062025_top_menu`
--
ALTER TABLE `bkp_13062025_top_menu`
  MODIFY `menuid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `candidate_education_info`
--
ALTER TABLE `candidate_education_info`
  MODIFY `can_edu_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `candidate_interview`
--
ALTER TABLE `candidate_interview`
  MODIFY `can_int_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `candidate_selection`
--
ALTER TABLE `candidate_selection`
  MODIFY `can_sel_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `candidate_shortlist`
--
ALTER TABLE `candidate_shortlist`
  MODIFY `can_short_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `candidate_workexperience`
--
ALTER TABLE `candidate_workexperience`
  MODIFY `can_workexp_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `cart_selected_modifiers`
--
ALTER TABLE `cart_selected_modifiers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=101;

--
-- AUTO_INCREMENT for table `check_addones`
--
ALTER TABLE `check_addones`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `common_setting`
--
ALTER TABLE `common_setting`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `contact_data`
--
ALTER TABLE `contact_data`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `currency`
--
ALTER TABLE `currency`
  MODIFY `currencyid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `customer_info`
--
ALTER TABLE `customer_info`
  MODIFY `customer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=78;

--
-- AUTO_INCREMENT for table `customer_membership_map`
--
ALTER TABLE `customer_membership_map`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `customer_order`
--
ALTER TABLE `customer_order`
  MODIFY `order_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `customer_type`
--
ALTER TABLE `customer_type`
  MODIFY `customer_type_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=100;

--
-- AUTO_INCREMENT for table `custom_table`
--
ALTER TABLE `custom_table`
  MODIFY `custom_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- AUTO_INCREMENT for table `days`
--
ALTER TABLE `days`
  MODIFY `day_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `delivery_charges`
--
ALTER TABLE `delivery_charges`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `department`
--
ALTER TABLE `department`
  MODIFY `dept_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `duty_type`
--
ALTER TABLE `duty_type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `email_config`
--
ALTER TABLE `email_config`
  MODIFY `email_config_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `employee_benifit`
--
ALTER TABLE `employee_benifit`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `employee_history`
--
ALTER TABLE `employee_history`
  MODIFY `emp_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=191;

--
-- AUTO_INCREMENT for table `employee_performance`
--
ALTER TABLE `employee_performance`
  MODIFY `emp_per_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `employee_salary_payment`
--
ALTER TABLE `employee_salary_payment`
  MODIFY `emp_sal_pay_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `employee_salary_setup`
--
ALTER TABLE `employee_salary_setup`
  MODIFY `e_s_s_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `emp_attendance`
--
ALTER TABLE `emp_attendance`
  MODIFY `att_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `expense`
--
ALTER TABLE `expense`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `expense_item`
--
ALTER TABLE `expense_item`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `foodvariable`
--
ALTER TABLE `foodvariable`
  MODIFY `availableID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `gender`
--
ALTER TABLE `gender`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `grand_loan`
--
ALTER TABLE `grand_loan`
  MODIFY `loan_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ingredients`
--
ALTER TABLE `ingredients`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ingredients_opening_stock`
--
ALTER TABLE `ingredients_opening_stock`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ingredient_temp`
--
ALTER TABLE `ingredient_temp`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `invprice_difference_notification`
--
ALTER TABLE `invprice_difference_notification`
  MODIFY `notify_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `item_category`
--
ALTER TABLE `item_category`
  MODIFY `CategoryID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `item_foods`
--
ALTER TABLE `item_foods`
  MODIFY `ProductsID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=206;

--
-- AUTO_INCREMENT for table `itxn`
--
ALTER TABLE `itxn`
  MODIFY `tid` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `language`
--
ALTER TABLE `language`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2347;

--
-- AUTO_INCREMENT for table `leave_apply`
--
ALTER TABLE `leave_apply`
  MODIFY `leave_appl_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `leave_type`
--
ALTER TABLE `leave_type`
  MODIFY `leave_type_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `loan_installment`
--
ALTER TABLE `loan_installment`
  MODIFY `loan_inst_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `marital_info`
--
ALTER TABLE `marital_info`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `measurement_units`
--
ALTER TABLE `measurement_units`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `membership`
--
ALTER TABLE `membership`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `menu_add_on`
--
ALTER TABLE `menu_add_on`
  MODIFY `row_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `menu_group_modifiers`
--
ALTER TABLE `menu_group_modifiers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `menu_modifier_groups`
--
ALTER TABLE `menu_modifier_groups`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `menu_pdf_materials`
--
ALTER TABLE `menu_pdf_materials`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `message`
--
ALTER TABLE `message`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `modifiers`
--
ALTER TABLE `modifiers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `modifier_groups`
--
ALTER TABLE `modifier_groups`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `module`
--
ALTER TABLE `module`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `module_permission`
--
ALTER TABLE `module_permission`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `module_purchase_key`
--
ALTER TABLE `module_purchase_key`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `multipay_bill`
--
ALTER TABLE `multipay_bill`
  MODIFY `multipay_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=69;

--
-- AUTO_INCREMENT for table `ordered_menu_item_modifiers`
--
ALTER TABLE `ordered_menu_item_modifiers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `order_item_modifiers`
--
ALTER TABLE `order_item_modifiers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `order_menu`
--
ALTER TABLE `order_menu`
  MODIFY `row_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `paymentsetup`
--
ALTER TABLE `paymentsetup`
  MODIFY `setupid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `payment_method`
--
ALTER TABLE `payment_method`
  MODIFY `payment_method_id` tinyint(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `payroll_commission_setting`
--
ALTER TABLE `payroll_commission_setting`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `payroll_holiday`
--
ALTER TABLE `payroll_holiday`
  MODIFY `payrl_holi_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `payroll_tax_setup`
--
ALTER TABLE `payroll_tax_setup`
  MODIFY `tax_setup_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pay_frequency`
--
ALTER TABLE `pay_frequency`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `position`
--
ALTER TABLE `position`
  MODIFY `pos_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `price_schedules`
--
ALTER TABLE `price_schedules`
  MODIFY `ScheduleID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `production`
--
ALTER TABLE `production`
  MODIFY `productionid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=366;

--
-- AUTO_INCREMENT for table `production_details`
--
ALTER TABLE `production_details`
  MODIFY `pro_detailsid` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `promotion_main_modifiers`
--
ALTER TABLE `promotion_main_modifiers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `promotion_other_modifiers`
--
ALTER TABLE `promotion_other_modifiers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `promo_data`
--
ALTER TABLE `promo_data`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `purchaseitem`
--
ALTER TABLE `purchaseitem`
  MODIFY `purID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `purchase_details`
--
ALTER TABLE `purchase_details`
  MODIFY `detailsid` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `purchase_return`
--
ALTER TABLE `purchase_return`
  MODIFY `preturn_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `rate_type`
--
ALTER TABLE `rate_type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `reservationofday`
--
ALTER TABLE `reservationofday`
  MODIFY `offdayid` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `rest_table`
--
ALTER TABLE `rest_table`
  MODIFY `tableid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `role_permission`
--
ALTER TABLE `role_permission`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `salary_setup_header`
--
ALTER TABLE `salary_setup_header`
  MODIFY `s_s_h_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `salary_sheet_generate`
--
ALTER TABLE `salary_sheet_generate`
  MODIFY `ssg_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `salary_type`
--
ALTER TABLE `salary_type`
  MODIFY `salary_type_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `sec_menu_item`
--
ALTER TABLE `sec_menu_item`
  MODIFY `menu_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1524;

--
-- AUTO_INCREMENT for table `sec_role_permission`
--
ALTER TABLE `sec_role_permission`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2358;

--
-- AUTO_INCREMENT for table `sec_role_tbl`
--
ALTER TABLE `sec_role_tbl`
  MODIFY `role_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `sec_user_access_tbl`
--
ALTER TABLE `sec_user_access_tbl`
  MODIFY `role_acc_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `setting`
--
ALTER TABLE `setting`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `shipping_method`
--
ALTER TABLE `shipping_method`
  MODIFY `ship_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `slots`
--
ALTER TABLE `slots`
  MODIFY `slot_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=79;

--
-- AUTO_INCREMENT for table `sms_configuration`
--
ALTER TABLE `sms_configuration`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `sms_template`
--
ALTER TABLE `sms_template`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `stock_adjustments`
--
ALTER TABLE `stock_adjustments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `subscribe_emaillist`
--
ALTER TABLE `subscribe_emaillist`
  MODIFY `emailid` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sub_order`
--
ALTER TABLE `sub_order`
  MODIFY `sub_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `supplier`
--
ALTER TABLE `supplier`
  MODIFY `supid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `supplier_ledger`
--
ALTER TABLE `supplier_ledger`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `synchronizer_setting`
--
ALTER TABLE `synchronizer_setting`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `table_details`
--
ALTER TABLE `table_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `table_setting`
--
ALTER TABLE `table_setting`
  MODIFY `settingid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `tblreservation`
--
ALTER TABLE `tblreservation`
  MODIFY `reserveid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tblserver`
--
ALTER TABLE `tblserver`
  MODIFY `serverid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_assign_kitchen`
--
ALTER TABLE `tbl_assign_kitchen`
  MODIFY `assignid` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_bank`
--
ALTER TABLE `tbl_bank`
  MODIFY `bankid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_billingaddress`
--
ALTER TABLE `tbl_billingaddress`
  MODIFY `billaddressid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_cancelitem`
--
ALTER TABLE `tbl_cancelitem`
  MODIFY `cancelid` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_card_terminal`
--
ALTER TABLE `tbl_card_terminal`
  MODIFY `card_terminalid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_cashcounter`
--
ALTER TABLE `tbl_cashcounter`
  MODIFY `ccid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `tbl_cashregister`
--
ALTER TABLE `tbl_cashregister`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tbl_city`
--
ALTER TABLE `tbl_city`
  MODIFY `cityid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tbl_country`
--
ALTER TABLE `tbl_country`
  MODIFY `countryid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_delivaritime`
--
ALTER TABLE `tbl_delivaritime`
  MODIFY `dtimeid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `tbl_delivaryaddress`
--
ALTER TABLE `tbl_delivaryaddress`
  MODIFY `delivaryid` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_generatedreport`
--
ALTER TABLE `tbl_generatedreport`
  MODIFY `generateid` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_groupitems`
--
ALTER TABLE `tbl_groupitems`
  MODIFY `groupid` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_itemaccepted`
--
ALTER TABLE `tbl_itemaccepted`
  MODIFY `acid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- AUTO_INCREMENT for table `tbl_kitchen`
--
ALTER TABLE `tbl_kitchen`
  MODIFY `kitchenid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `tbl_kitchen_order`
--
ALTER TABLE `tbl_kitchen_order`
  MODIFY `ktid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `tbl_menutype`
--
ALTER TABLE `tbl_menutype`
  MODIFY `menutypeid` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_module_purchasekey`
--
ALTER TABLE `tbl_module_purchasekey`
  MODIFY `mpid` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_notificationsetting`
--
ALTER TABLE `tbl_notificationsetting`
  MODIFY `notifid` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_openclose`
--
ALTER TABLE `tbl_openclose`
  MODIFY `stid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tbl_orderprepare`
--
ALTER TABLE `tbl_orderprepare`
  MODIFY `opid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tbl_posetting`
--
ALTER TABLE `tbl_posetting`
  MODIFY `possettingid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_quickordersetting`
--
ALTER TABLE `tbl_quickordersetting`
  MODIFY `quickordid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_rating`
--
ALTER TABLE `tbl_rating`
  MODIFY `ratingid` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_room`
--
ALTER TABLE `tbl_room`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_seoption`
--
ALTER TABLE `tbl_seoption`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `tbl_shippingaddress`
--
ALTER TABLE `tbl_shippingaddress`
  MODIFY `shipaddressid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_slider`
--
ALTER TABLE `tbl_slider`
  MODIFY `slid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `tbl_slider_type`
--
ALTER TABLE `tbl_slider_type`
  MODIFY `stype_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `tbl_sociallink`
--
ALTER TABLE `tbl_sociallink`
  MODIFY `sid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tbl_soundsetting`
--
ALTER TABLE `tbl_soundsetting`
  MODIFY `soundid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_state`
--
ALTER TABLE `tbl_state`
  MODIFY `stateid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `tbl_tablefloor`
--
ALTER TABLE `tbl_tablefloor`
  MODIFY `tbfloorid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_thirdparty_customer`
--
ALTER TABLE `tbl_thirdparty_customer`
  MODIFY `companyId` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_token`
--
ALTER TABLE `tbl_token`
  MODIFY `tokenid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_updateitems`
--
ALTER TABLE `tbl_updateitems`
  MODIFY `updateid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_version_checker`
--
ALTER TABLE `tbl_version_checker`
  MODIFY `vid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_waiterappcart`
--
ALTER TABLE `tbl_waiterappcart`
  MODIFY `weaterappid` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_widget`
--
ALTER TABLE `tbl_widget`
  MODIFY `widgetid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `themes`
--
ALTER TABLE `themes`
  MODIFY `themeid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `top_menu`
--
ALTER TABLE `top_menu`
  MODIFY `menuid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `unit_of_measurement`
--
ALTER TABLE `unit_of_measurement`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `usedcoupon`
--
ALTER TABLE `usedcoupon`
  MODIFY `cusedid` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=191;

--
-- AUTO_INCREMENT for table `variant`
--
ALTER TABLE `variant`
  MODIFY `variantid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=293;

--
-- AUTO_INCREMENT for table `waste_management`
--
ALTER TABLE `waste_management`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `waste_management_items`
--
ALTER TABLE `waste_management_items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `weekly_holiday`
--
ALTER TABLE `weekly_holiday`
  MODIFY `wk_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `menu_group_modifiers`
--
ALTER TABLE `menu_group_modifiers`
  ADD CONSTRAINT `menu_group_modifiers_ibfk_1` FOREIGN KEY (`menu_group_id`) REFERENCES `menu_modifier_groups` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `menu_group_modifiers_ibfk_2` FOREIGN KEY (`modifier_id`) REFERENCES `modifiers` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `menu_modifier_groups`
--
ALTER TABLE `menu_modifier_groups`
  ADD CONSTRAINT `menu_modifier_groups_ibfk_1` FOREIGN KEY (`menu_id`) REFERENCES `item_foods` (`ProductsID`) ON DELETE CASCADE,
  ADD CONSTRAINT `menu_modifier_groups_ibfk_2` FOREIGN KEY (`group_id`) REFERENCES `modifier_groups` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `modifiers`
--
ALTER TABLE `modifiers`
  ADD CONSTRAINT `modifiers_ibfk_1` FOREIGN KEY (`group_id`) REFERENCES `modifier_groups` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `stock_adjustments`
--
ALTER TABLE `stock_adjustments`
  ADD CONSTRAINT `stock_adjustments_ibfk_1` FOREIGN KEY (`ingredient_id`) REFERENCES `ingredients` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `waste_management_items`
--
ALTER TABLE `waste_management_items`
  ADD CONSTRAINT `waste_management_items_ibfk_1` FOREIGN KEY (`waste_id`) REFERENCES `waste_management` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
