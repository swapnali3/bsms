-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Apr 26, 2023 at 07:10 AM
-- Server version: 5.7.34
-- PHP Version: 7.4.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_bsms`
--

-- --------------------------------------------------------

--
-- Table structure for table `account_groups`
--

CREATE TABLE `account_groups` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1',
  `added_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_date` datetime NOT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `account_groups`
--

INSERT INTO `account_groups` (`id`, `name`, `status`, `added_date`, `updated_date`) VALUES
(1, 'Account Group 1', 1, '2023-01-02 13:13:04', '2023-01-02 07:42:58'),
(2, 'Account Group 2', 1, '2023-01-02 13:13:04', '2023-01-02 07:42:58');

-- --------------------------------------------------------

--
-- Table structure for table `acl_phinxlog`
--

CREATE TABLE `acl_phinxlog` (
  `version` bigint(20) NOT NULL,
  `migration_name` varchar(100) DEFAULT NULL,
  `start_time` timestamp NULL DEFAULT NULL,
  `end_time` timestamp NULL DEFAULT NULL,
  `breakpoint` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `acl_phinxlog`
--

INSERT INTO `acl_phinxlog` (`version`, `migration_name`, `start_time`, `end_time`, `breakpoint`) VALUES
(20141229162641, 'CakePhpDbAcl', '2023-01-05 09:06:01', '2023-01-05 09:06:01', 0);

-- --------------------------------------------------------

--
-- Table structure for table `acos`
--

CREATE TABLE `acos` (
  `id` int(11) NOT NULL,
  `parent_id` int(11) DEFAULT NULL,
  `model` varchar(255) DEFAULT NULL,
  `foreign_key` int(11) DEFAULT NULL,
  `alias` varchar(255) DEFAULT NULL,
  `lft` int(11) DEFAULT NULL,
  `rght` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `acos`
--

INSERT INTO `acos` (`id`, `parent_id`, `model`, `foreign_key`, `alias`, `lft`, `rght`) VALUES
(1, NULL, NULL, NULL, 'controllers', 1, 358),
(2, 1, NULL, NULL, 'Dealer', 2, 29),
(3, 2, NULL, NULL, 'login', 3, 4),
(4, 2, NULL, NULL, 'logout', 5, 6),
(5, 2, NULL, NULL, 'registration', 7, 8),
(6, 2, NULL, NULL, 'confirmation', 9, 10),
(7, 2, NULL, NULL, 'dashboard', 11, 12),
(8, 2, NULL, NULL, 'view', 13, 14),
(9, 2, NULL, NULL, 'addproduct', 15, 16),
(10, 2, NULL, NULL, 'copy', 17, 18),
(11, 2, NULL, NULL, 'copyPreview', 19, 20),
(12, 2, NULL, NULL, 'productlist', 21, 22),
(13, 2, NULL, NULL, 'inquiry', 23, 24),
(14, 2, NULL, NULL, 'search', 25, 26),
(15, 2, NULL, NULL, 'regionalsearch', 27, 28),
(16, 1, NULL, NULL, 'Home', 30, 35),
(17, 16, NULL, NULL, 'index', 31, 32),
(18, 16, NULL, NULL, 'search', 33, 34),
(19, 1, NULL, NULL, 'Error', 36, 37),
(20, 1, NULL, NULL, 'Groups', 38, 49),
(21, 20, NULL, NULL, 'index', 39, 40),
(22, 20, NULL, NULL, 'view', 41, 42),
(23, 20, NULL, NULL, 'add', 43, 44),
(24, 20, NULL, NULL, 'edit', 45, 46),
(25, 20, NULL, NULL, 'delete', 47, 48),
(26, 1, NULL, NULL, 'Users', 50, 65),
(27, 26, NULL, NULL, 'index', 51, 52),
(28, 26, NULL, NULL, 'view', 53, 54),
(29, 26, NULL, NULL, 'add', 55, 56),
(30, 26, NULL, NULL, 'edit', 57, 58),
(31, 26, NULL, NULL, 'delete', 59, 60),
(32, 26, NULL, NULL, 'login', 61, 62),
(33, 26, NULL, NULL, 'logout', 63, 64),
(34, 1, NULL, NULL, 'SchemaGroups', 66, 77),
(35, 34, NULL, NULL, 'index', 67, 68),
(36, 34, NULL, NULL, 'view', 69, 70),
(37, 34, NULL, NULL, 'add', 71, 72),
(38, 34, NULL, NULL, 'edit', 73, 74),
(39, 34, NULL, NULL, 'delete', 75, 76),
(40, 1, NULL, NULL, 'PoHeaders', 78, 89),
(41, 40, NULL, NULL, 'index', 79, 80),
(42, 40, NULL, NULL, 'view', 81, 82),
(43, 40, NULL, NULL, 'add', 83, 84),
(44, 40, NULL, NULL, 'edit', 85, 86),
(45, 40, NULL, NULL, 'delete', 87, 88),
(46, 1, NULL, NULL, 'Documents', 90, 101),
(47, 46, NULL, NULL, 'index', 91, 92),
(48, 46, NULL, NULL, 'view', 93, 94),
(49, 46, NULL, NULL, 'add', 95, 96),
(50, 46, NULL, NULL, 'edit', 97, 98),
(51, 46, NULL, NULL, 'delete', 99, 100),
(52, 1, NULL, NULL, 'PoFooters', 102, 113),
(53, 52, NULL, NULL, 'index', 103, 104),
(54, 52, NULL, NULL, 'view', 105, 106),
(55, 52, NULL, NULL, 'add', 107, 108),
(56, 52, NULL, NULL, 'edit', 109, 110),
(57, 52, NULL, NULL, 'delete', 111, 112),
(58, 1, NULL, NULL, 'Pages', 114, 117),
(59, 58, NULL, NULL, 'display', 115, 116),
(60, 1, NULL, NULL, 'Vendor', 118, 135),
(61, 60, NULL, NULL, 'Dashboard', 119, 124),
(62, 61, NULL, NULL, 'index', 120, 121),
(63, 61, NULL, NULL, 'getlist', 122, 123),
(64, 60, NULL, NULL, 'Onboarding', 125, 134),
(65, 64, NULL, NULL, 'verify', 126, 127),
(66, 64, NULL, NULL, 'add', 128, 129),
(67, 64, NULL, NULL, 'create', 130, 131),
(68, 64, NULL, NULL, 'delete', 132, 133),
(69, 1, NULL, NULL, 'Api', 136, 145),
(70, 69, NULL, NULL, 'Api', 137, 142),
(71, 70, NULL, NULL, 'index', 138, 139),
(72, 70, NULL, NULL, 'postPo', 140, 141),
(73, 69, NULL, NULL, 'ApiApp', 143, 144),
(74, 1, NULL, NULL, 'Admin', 146, 303),
(75, 74, NULL, NULL, 'ProductAttributes', 147, 160),
(76, 75, NULL, NULL, 'index', 148, 149),
(77, 75, NULL, NULL, 'view', 150, 151),
(78, 75, NULL, NULL, 'add', 152, 153),
(79, 75, NULL, NULL, 'edit', 154, 155),
(80, 75, NULL, NULL, 'delete', 156, 157),
(81, 75, NULL, NULL, 'getlist', 158, 159),
(82, 74, NULL, NULL, 'AdminUsers', 161, 176),
(83, 82, NULL, NULL, 'login', 162, 163),
(84, 82, NULL, NULL, 'logout', 164, 165),
(85, 82, NULL, NULL, 'index', 166, 167),
(86, 82, NULL, NULL, 'view', 168, 169),
(87, 82, NULL, NULL, 'add', 170, 171),
(88, 82, NULL, NULL, 'edit', 172, 173),
(89, 82, NULL, NULL, 'delete', 174, 175),
(90, 74, NULL, NULL, 'RfqInquiries', 177, 188),
(91, 90, NULL, NULL, 'index', 178, 179),
(92, 90, NULL, NULL, 'view', 180, 181),
(93, 90, NULL, NULL, 'add', 182, 183),
(94, 90, NULL, NULL, 'edit', 184, 185),
(95, 90, NULL, NULL, 'delete', 186, 187),
(96, 74, NULL, NULL, 'Dashboard', 189, 194),
(97, 96, NULL, NULL, 'index', 190, 191),
(98, 96, NULL, NULL, 'rfqList', 192, 193),
(99, 74, NULL, NULL, 'AdminApp', 195, 196),
(100, 74, NULL, NULL, 'SchemaGroups', 197, 208),
(101, 100, NULL, NULL, 'index', 198, 199),
(102, 100, NULL, NULL, 'view', 200, 201),
(103, 100, NULL, NULL, 'add', 202, 203),
(104, 100, NULL, NULL, 'edit', 204, 205),
(105, 100, NULL, NULL, 'delete', 206, 207),
(106, 74, NULL, NULL, 'ProductSubCategories', 209, 222),
(107, 106, NULL, NULL, 'index', 210, 211),
(108, 106, NULL, NULL, 'view', 212, 213),
(109, 106, NULL, NULL, 'add', 214, 215),
(110, 106, NULL, NULL, 'edit', 216, 217),
(111, 106, NULL, NULL, 'delete', 218, 219),
(112, 106, NULL, NULL, 'getlist', 220, 221),
(113, 74, NULL, NULL, 'RfqDetails', 223, 236),
(114, 113, NULL, NULL, 'index', 224, 225),
(115, 113, NULL, NULL, 'view', 226, 227),
(116, 113, NULL, NULL, 'add', 228, 229),
(117, 113, NULL, NULL, 'edit', 230, 231),
(118, 113, NULL, NULL, 'delete', 232, 233),
(119, 113, NULL, NULL, 'apprej', 234, 235),
(120, 74, NULL, NULL, 'PurchasingOrganizations', 237, 248),
(121, 120, NULL, NULL, 'index', 238, 239),
(122, 120, NULL, NULL, 'view', 240, 241),
(123, 120, NULL, NULL, 'add', 242, 243),
(124, 120, NULL, NULL, 'edit', 244, 245),
(125, 120, NULL, NULL, 'delete', 246, 247),
(126, 74, NULL, NULL, 'Products', 249, 260),
(127, 126, NULL, NULL, 'index', 250, 251),
(128, 126, NULL, NULL, 'view', 252, 253),
(129, 126, NULL, NULL, 'add', 254, 255),
(130, 126, NULL, NULL, 'edit', 256, 257),
(131, 126, NULL, NULL, 'delete', 258, 259),
(132, 74, NULL, NULL, 'AccountGroups', 261, 272),
(133, 132, NULL, NULL, 'index', 262, 263),
(134, 132, NULL, NULL, 'view', 264, 265),
(135, 132, NULL, NULL, 'add', 266, 267),
(136, 132, NULL, NULL, 'edit', 268, 269),
(137, 132, NULL, NULL, 'delete', 270, 271),
(138, 74, NULL, NULL, 'VendorTemps', 273, 286),
(139, 138, NULL, NULL, 'index', 274, 275),
(140, 138, NULL, NULL, 'view', 276, 277),
(141, 138, NULL, NULL, 'add', 278, 279),
(142, 138, NULL, NULL, 'edit', 280, 281),
(143, 138, NULL, NULL, 'delete', 282, 283),
(144, 138, NULL, NULL, 'approveVendor', 284, 285),
(145, 74, NULL, NULL, 'BuyerSellerUsers', 287, 298),
(146, 145, NULL, NULL, 'index', 288, 289),
(147, 145, NULL, NULL, 'view', 290, 291),
(148, 145, NULL, NULL, 'add', 292, 293),
(149, 145, NULL, NULL, 'edit', 294, 295),
(150, 145, NULL, NULL, 'delete', 296, 297),
(151, 74, NULL, NULL, 'Pages', 299, 302),
(152, 151, NULL, NULL, 'display', 300, 301),
(153, 1, NULL, NULL, 'Acl', 304, 305),
(154, 1, NULL, NULL, 'Bake', 306, 307),
(155, 1, NULL, NULL, 'BootstrapUI', 308, 309),
(156, 1, NULL, NULL, 'Cake\\TwigView', 310, 311),
(157, 1, NULL, NULL, 'CakeLte', 312, 317),
(158, 157, NULL, NULL, 'Pages', 313, 316),
(159, 158, NULL, NULL, 'debug', 314, 315),
(160, 1, NULL, NULL, 'DebugKit', 318, 355),
(161, 160, NULL, NULL, 'DebugKit', 319, 320),
(162, 160, NULL, NULL, 'Dashboard', 321, 326),
(163, 162, NULL, NULL, 'index', 322, 323),
(164, 162, NULL, NULL, 'reset', 324, 325),
(165, 160, NULL, NULL, 'MailPreview', 327, 334),
(166, 165, NULL, NULL, 'index', 328, 329),
(167, 165, NULL, NULL, 'sent', 330, 331),
(168, 165, NULL, NULL, 'email', 332, 333),
(169, 160, NULL, NULL, 'Composer', 335, 338),
(170, 169, NULL, NULL, 'checkDependencies', 336, 337),
(171, 160, NULL, NULL, 'Toolbar', 339, 342),
(172, 171, NULL, NULL, 'clearCache', 340, 341),
(173, 160, NULL, NULL, 'Requests', 343, 346),
(174, 173, NULL, NULL, 'view', 344, 345),
(175, 160, NULL, NULL, 'Panels', 347, 354),
(176, 175, NULL, NULL, 'index', 348, 349),
(177, 175, NULL, NULL, 'view', 350, 351),
(178, 175, NULL, NULL, 'latestHistory', 352, 353),
(179, 1, NULL, NULL, 'Migrations', 356, 357);

-- --------------------------------------------------------

--
-- Table structure for table `admin_users`
--

CREATE TABLE `admin_users` (
  `id` int(11) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(100) NOT NULL,
  `email_id` varchar(50) NOT NULL,
  `role` tinyint(1) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `last_login` datetime DEFAULT NULL,
  `added_date` datetime NOT NULL,
  `updated_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `admin_users`
--

INSERT INTO `admin_users` (`id`, `username`, `password`, `email_id`, `role`, `status`, `last_login`, `added_date`, `updated_date`) VALUES
(1, 'admin', 'e10adc3949ba59abbe56e057f20f883e', 'admin@vms.com', 1, 1, '2022-09-11 12:35:40', '2022-09-11 12:35:40', '2022-09-11 18:06:00'),
(2, 'apar_buyer', 'e10adc3949ba59abbe56e057f20f883e', 'apar@test.com', 2, 1, '2023-01-02 07:48:52', '2023-01-02 07:48:52', '2023-01-02 13:26:02');

-- --------------------------------------------------------

--
-- Table structure for table `aros`
--

CREATE TABLE `aros` (
  `id` int(11) NOT NULL,
  `parent_id` int(11) DEFAULT NULL,
  `model` varchar(255) DEFAULT NULL,
  `foreign_key` int(11) DEFAULT NULL,
  `alias` varchar(255) DEFAULT NULL,
  `lft` int(11) DEFAULT NULL,
  `rght` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `aros`
--

INSERT INTO `aros` (`id`, `parent_id`, `model`, `foreign_key`, `alias`, `lft`, `rght`) VALUES
(1, NULL, 'Groups', 1, NULL, 1, 4),
(2, NULL, 'Groups', 2, NULL, 5, 10),
(3, NULL, 'Groups', 3, NULL, 11, 14),
(4, 1, 'Users', 1, NULL, 2, 3),
(5, 2, 'Users', 2, NULL, 6, 7),
(6, 3, 'Users', 3, NULL, 12, 13),
(7, 2, 'Users', 4, NULL, 8, 9);

-- --------------------------------------------------------

--
-- Table structure for table `aros_acos`
--

CREATE TABLE `aros_acos` (
  `id` int(11) NOT NULL,
  `aro_id` int(11) NOT NULL,
  `aco_id` int(11) NOT NULL,
  `_create` varchar(2) NOT NULL DEFAULT '0',
  `_read` varchar(2) NOT NULL DEFAULT '0',
  `_update` varchar(2) NOT NULL DEFAULT '0',
  `_delete` varchar(2) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `aros_acos`
--

INSERT INTO `aros_acos` (`id`, `aro_id`, `aco_id`, `_create`, `_read`, `_update`, `_delete`) VALUES
(1, 1, 1, '1', '1', '1', '1'),
(2, 2, 1, '-1', '-1', '-1', '-1'),
(3, 3, 1, '-1', '-1', '-1', '-1');

-- --------------------------------------------------------

--
-- Table structure for table `asn_footers`
--

CREATE TABLE `asn_footers` (
  `id` int(11) NOT NULL,
  `asn_header_id` int(11) NOT NULL,
  `po_footer_id` int(11) NOT NULL,
  `po_schedule_id` int(11) NOT NULL,
  `qty` decimal(7,0) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `added_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `asn_footers`
--

INSERT INTO `asn_footers` (`id`, `asn_header_id`, `po_footer_id`, `po_schedule_id`, `qty`, `status`, `added_date`, `updated_date`) VALUES
(1, 1, 1, 2, '1', 1, '2023-03-17 09:38:16', '2023-03-17 09:38:16');

-- --------------------------------------------------------

--
-- Table structure for table `asn_headers`
--

CREATE TABLE `asn_headers` (
  `id` int(11) NOT NULL,
  `asn_no` varchar(15) NOT NULL,
  `po_header_id` int(11) NOT NULL,
  `invoice_path` json NOT NULL,
  `invoice_no` varchar(15) NOT NULL,
  `invoice_date` date DEFAULT NULL,
  `invoice_value` decimal(12,2) NOT NULL,
  `vehicle_no` varchar(12) NOT NULL,
  `driver_name` varchar(15) NOT NULL,
  `driver_contact` varchar(15) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  `added_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `asn_headers`
--

INSERT INTO `asn_headers` (`id`, `asn_no`, `po_header_id`, `invoice_path`, `invoice_no`, `invoice_date`, `invoice_value`, `vehicle_no`, `driver_name`, `driver_contact`, `status`, `added_date`, `updated_date`) VALUES
(1, '23000011', 1, '\"[]\"', '212312', '2023-03-08', '11223.00', 'dfdff', 'sdfsdf', '1212123', 1, '2023-03-17 09:38:16', '2023-03-17 09:38:16');

-- --------------------------------------------------------

--
-- Table structure for table `buyer_seller_users`
--

CREATE TABLE `buyer_seller_users` (
  `id` int(11) NOT NULL,
  `user_type` varchar(10) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(100) NOT NULL,
  `company_name` varchar(100) NOT NULL,
  `address` text NOT NULL,
  `cities` varchar(100) NOT NULL,
  `email` varchar(50) NOT NULL,
  `contact` varchar(10) NOT NULL,
  `alt_contact` varchar(10) NOT NULL,
  `business_type` varchar(20) NOT NULL,
  `product_deals` varchar(255) NOT NULL,
  `TIN` varchar(11) NOT NULL,
  `GST` varchar(15) NOT NULL,
  `tin_verified` tinyint(1) NOT NULL DEFAULT '0',
  `gst_verified` tinyint(1) NOT NULL DEFAULT '0',
  `is_verified` tinyint(4) NOT NULL DEFAULT '0',
  `status` tinyint(4) NOT NULL DEFAULT '0',
  `added_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `buyer_seller_users`
--

INSERT INTO `buyer_seller_users` (`id`, `user_type`, `username`, `password`, `company_name`, `address`, `cities`, `email`, `contact`, `alt_contact`, `business_type`, `product_deals`, `TIN`, `GST`, `tin_verified`, `gst_verified`, `is_verified`, `status`, `added_date`, `updated_date`) VALUES
(1, 'buyer', 'buyer1', '5cbd9d629096842872fdc665d2d03ba3', 'buyer1', 'mumbai', 'mumbai', 'deepak@ft.com', '0987654321', '1234567890', 'test', '', '', '', 0, 0, 1, 1, '0022-09-11 17:54:04', '2022-09-12 11:42:44'),
(2, 'seller', 'seller1', '95caed8e60e15871a6d12fe5505db2db', 'seller1', 'seller1', 'mumbai', 'seller1@sdsd.com', '9876543210', '1234567890', 'test', '1196', '', '', 0, 0, 0, 0, '0022-09-11 18:33:51', '2022-11-30 14:31:25'),
(3, 'seller', 'seller2', 'c30248d146039dd086b12f18154863e1', 'seller2', 'seller2', 'delhi', 'seller2@seller2.com', '8765432199', '2345678767', 'seller2', '1202', '98765432765', '0987654321hgfds', 0, 0, 0, 1, '0022-10-03 13:17:12', '2022-11-30 14:31:33'),
(4, 'seller', 'seller3', 'ece5ae58b2d51c16c5b61e1266dca96c', 'seller3', 'seller3', 'mumbai', 'seller3@seller3.com', '8765432145', '6754321345', 'seller3', '1196', 'jhnfgdew678', '987654321345678', 0, 0, 0, 0, '0022-10-03 14:37:46', '2022-11-30 14:31:29'),
(5, 'buyer', 'buyer2', 'ba71d29d4efdd8753c516db594fab6d8', 'GR', 'test', 'Mumbai', 'd@s.com', '8765432100', '7654321890', 'Block', '1207', '98765432762', '0987654321aafds', 0, 0, 0, 0, '0022-12-22 12:54:18', '2022-12-22 07:24:18');

-- --------------------------------------------------------

--
-- Table structure for table `delivery_details`
--

CREATE TABLE `delivery_details` (
  `id` int(11) NOT NULL,
  `po_header_id` int(11) NOT NULL,
  `po_footer_id` int(11) NOT NULL,
  `challan_no` varchar(20) NOT NULL,
  `qty` decimal(6,2) NOT NULL,
  `eway_bill_no` varchar(15) NOT NULL,
  `einvoice_no` varchar(15) NOT NULL,
  `challan_document` blob,
  `status` varchar(1) NOT NULL DEFAULT '0',
  `added_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `delivery_details`
--

INSERT INTO `delivery_details` (`id`, `po_header_id`, `po_footer_id`, `challan_no`, `qty`, `eway_bill_no`, `einvoice_no`, `challan_document`, `status`, `added_date`, `updated_date`) VALUES
(1, 1, 1, 'sds', '2323.00', 'sdsd', 'sdd', NULL, '0', '2023-01-14 10:37:57', '2023-01-14 10:37:57'),
(2, 1, 2, 'fgdfg4', '123.00', 'dfsdf', 'ewewe', NULL, '0', '2023-01-14 10:43:03', '2023-01-14 10:43:03'),
(3, 1, 2, 'sdsd', '212.00', 'ssdsd', 'sdsd', NULL, '0', '2023-01-14 10:47:05', '2023-01-14 10:47:05'),
(23, 1, 1, 'sdsd', '2323.00', 'sdfdf', 'dfdf', NULL, '0', '2023-01-14 11:10:24', '2023-01-14 11:10:24'),
(26, 1, 1, 'sdsd1', '122.00', '1212', 'qwqw', NULL, '0', '2023-01-14 11:11:03', '2023-01-14 11:11:03'),
(27, 1, 1, 'sdsd1dsdsd', '122.00', '1212', 'qwqw', NULL, '0', '2023-01-14 11:11:09', '2023-01-14 11:11:09'),
(29, 1, 1, 'qw', '122.00', '1212', 'qwqw', NULL, '0', '2023-01-14 11:11:50', '2023-01-14 11:11:50'),
(31, 1, 1, 'sdsdf', '2.00', 'dd', 'fr', NULL, '0', '2023-01-14 11:13:28', '2023-01-14 11:13:28'),
(33, 1, 1, 'sdsd5', '12.00', 'dfdf3', 'dfdf3', NULL, '0', '2023-01-14 11:14:45', '2023-01-14 11:14:45'),
(35, 1, 2, 'sdsd66', '54.00', 'd', 'dd', NULL, '0', '2023-01-14 11:15:53', '2023-01-14 11:15:53'),
(36, 1, 2, 'ss3', '1.00', 'f5', 'dfdf', NULL, '0', '2023-01-16 08:57:55', '2023-01-16 08:57:55'),
(40, 1, 2, 'sdsd5677', '1.00', 'f5', 'dfdf', NULL, '1', '2023-01-16 08:58:57', '2023-01-16 17:41:52'),
(41, 1, 1, 'dsfdsf', '55.00', 'ddffg', 'dfdfg', NULL, '0', '2023-01-19 11:59:40', '2023-01-19 11:59:40'),
(42, 1, 2, 'zz', '100.00', 'zz', 'zz', NULL, '0', '2023-01-19 12:00:08', '2023-01-19 12:00:08'),
(43, 1, 1, 'ss', '12.00', 'v', 'v', NULL, '0', '2023-01-19 12:07:52', '2023-01-19 12:07:52'),
(44, 1, 1, 'c', '1.00', 'c', 'c', NULL, '0', '2023-01-19 12:16:06', '2023-01-19 12:16:06'),
(45, 1, 1, 'q', '1.00', 'q', 'q', NULL, '0', '2023-01-19 12:23:05', '2023-01-19 12:23:05'),
(46, 1, 1, 'asa', '121.00', 'aas', 'asas', NULL, '0', '2023-02-18 23:16:28', '2023-02-18 23:16:28'),
(47, 1, 1, 'tet', '100.00', '232', 'sss', NULL, '0', '2023-02-18 23:18:57', '2023-02-18 23:18:57'),
(48, 1, 1, 'asdsd', '12.00', 'sdsd', 'sasdasd', NULL, '0', '2023-02-18 23:20:51', '2023-02-18 23:20:51');

-- --------------------------------------------------------

--
-- Table structure for table `documents`
--

CREATE TABLE `documents` (
  `id` int(11) NOT NULL,
  `type` varchar(200) NOT NULL,
  `path` varchar(255) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1',
  `added_date` datetime NOT NULL,
  `updated_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `groups`
--

CREATE TABLE `groups` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `groups`
--

INSERT INTO `groups` (`id`, `name`, `created`, `modified`) VALUES
(1, 'Admin', '2023-01-05 20:07:00', '2023-01-05 20:07:00'),
(2, 'Buyer', '2023-01-05 20:07:06', '2023-01-05 20:07:06'),
(3, 'Vendor', '2023-01-05 20:07:12', '2023-01-05 20:07:12');

-- --------------------------------------------------------

--
-- Table structure for table `item_schedule_messages`
--

CREATE TABLE `item_schedule_messages` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `schedule_id` int(11) NOT NULL,
  `message` text NOT NULL,
  `is_read` tinyint(1) NOT NULL DEFAULT '0',
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `added_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `item_schedule_messages`
--

INSERT INTO `item_schedule_messages` (`id`, `user_id`, `schedule_id`, `message`, `is_read`, `status`, `added_date`, `updated_date`) VALUES
(7, 8, 1, 'Issue with delivery', 0, 1, '2023-02-02 11:11:47', '2023-02-02 11:11:47'),
(8, 8, 1, '<p>fff</p>', 0, 1, '2023-02-02 11:14:52', '2023-02-02 11:14:52'),
(9, 8, 1, '<p>ss</p>', 0, 1, '2023-02-02 11:19:42', '2023-02-02 11:19:42'),
(10, 8, 1, '<p>xxx</p>', 0, 1, '2023-02-02 11:27:37', '2023-02-02 11:27:37'),
(11, 8, 1, 'sss', 0, 1, '2023-02-02 11:30:44', '2023-02-02 11:30:44'),
(12, 8, 1, 'Deepak', 0, 1, '2023-02-02 11:31:18', '2023-02-02 11:31:18'),
(13, 8, 1, 'ssssssssss', 0, 1, '2023-02-02 11:33:16', '2023-02-02 11:33:16');

-- --------------------------------------------------------

--
-- Table structure for table `po_footers`
--

CREATE TABLE `po_footers` (
  `id` int(11) NOT NULL,
  `po_header_id` int(11) NOT NULL,
  `item` varchar(5) NOT NULL,
  `deleted_indication` varchar(1) DEFAULT NULL,
  `material` varchar(18) NOT NULL,
  `short_text` varchar(40) NOT NULL,
  `po_qty` decimal(15,3) NOT NULL,
  `grn_qty` decimal(15,3) NOT NULL,
  `pending_qty` decimal(15,3) NOT NULL,
  `order_unit` varchar(3) NOT NULL,
  `net_price` decimal(15,3) NOT NULL,
  `price_unit` varchar(3) NOT NULL,
  `net_value` decimal(15,3) NOT NULL,
  `gross_value` decimal(15,3) NOT NULL,
  `part_code` varchar(20) DEFAULT NULL,
  `stock` decimal(15,0) DEFAULT NULL,
  `added_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `po_footers`
--

INSERT INTO `po_footers` (`id`, `po_header_id`, `item`, `deleted_indication`, `material`, `short_text`, `po_qty`, `grn_qty`, `pending_qty`, `order_unit`, `net_price`, `price_unit`, `net_value`, `gross_value`, `part_code`, `stock`, `added_date`, `updated_date`) VALUES
(1, 1, '00010', '', 'PHFG0411', 'Ethyl-2-(3-hydroxyphenyl)acetate', '100.000', '0.000', '0.000', 'KG', '20.000', '1', '2000.000', '2000.000', 'Ethyl-2', '12121', '2023-01-04 12:39:05', '2023-01-19 12:38:56'),
(2, 1, '00020', '', 'PHFG0417', ' 1-(3-Methyl -1-Phenyl-5-pyrazolyl)piper', '100.000', '0.000', '0.000', 'KG', '30.000', '1', '3000.000', '3000.000', 'part', '2000', '2023-01-04 12:39:05', '2023-01-19 12:32:01'),
(3, 2, '00010', '', 'PHFG0411', 'Ethyl-2-(3-hydroxyphenyl)acetate', '100.000', '0.000', '0.000', 'KG', '20.000', '1', '2000.000', '2000.000', NULL, NULL, '2023-01-18 12:46:06', '2023-01-18 12:46:06'),
(4, 2, '00020', '', 'PHFG0417', ' 1-(3-Methyl -1-Phenyl-5-pyrazolyl)piper', '100.000', '0.000', '0.000', 'KG', '30.000', '1', '3000.000', '3000.000', NULL, NULL, '2023-01-18 12:46:06', '2023-01-18 12:46:06');

-- --------------------------------------------------------

--
-- Table structure for table `po_headers`
--

CREATE TABLE `po_headers` (
  `id` int(11) NOT NULL,
  `sap_vendor_code` varchar(10) NOT NULL,
  `po_no` varchar(10) NOT NULL,
  `document_type` varchar(4) NOT NULL,
  `created_on` datetime NOT NULL,
  `created_by` varchar(12) NOT NULL,
  `pay_terms` varchar(40) NOT NULL,
  `currency` varchar(3) NOT NULL,
  `exchange_rate` decimal(6,3) NOT NULL,
  `release_status` varchar(10) NOT NULL,
  `added_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `po_headers`
--

INSERT INTO `po_headers` (`id`, `sap_vendor_code`, `po_no`, `document_type`, `created_on`, `created_by`, `pay_terms`, `currency`, `exchange_rate`, `release_status`, `added_date`, `updated_date`) VALUES
(1, 'LARET0', '4510000421', 'NB', '2022-12-30 00:00:00', 'FTS-SD', '0001', 'INR', '1.000', 'X', '2023-01-04 12:39:05', '2023-01-04 12:39:05'),
(2, 'LARET0', '4510000422', 'NB', '2022-12-30 00:00:00', 'FTS-SD', '0001', 'INR', '1.000', 'X', '2023-01-18 12:46:06', '2023-01-18 12:46:06');

-- --------------------------------------------------------

--
-- Table structure for table `po_item_schedules`
--

CREATE TABLE `po_item_schedules` (
  `id` int(11) NOT NULL,
  `po_header_id` int(11) NOT NULL,
  `po_footer_id` int(11) NOT NULL,
  `actual_qty` decimal(15,2) NOT NULL,
  `received_qty` decimal(15,2) NOT NULL DEFAULT '0.00',
  `delivery_date` date NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1',
  `added_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `po_item_schedules`
--

INSERT INTO `po_item_schedules` (`id`, `po_header_id`, `po_footer_id`, `actual_qty`, `received_qty`, `delivery_date`, `status`, `added_date`, `updated_date`) VALUES
(1, 1, 1, '20.00', '0.00', '2023-01-24', 1, '2023-01-23 08:35:59', '2023-01-23 08:35:59'),
(2, 1, 1, '3.00', '1.00', '2023-01-18', 1, '2023-01-23 10:42:29', '2023-03-17 09:38:16'),
(3, 1, 1, '222.00', '0.00', '2023-02-25', 1, '2023-02-02 11:23:01', '2023-02-02 11:23:01');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `description` varchar(100) DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `added_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `description`, `status`, `added_date`, `updated_date`) VALUES
(1196, 'ABS', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(1197, 'ADVERSETISEMENT HOLDER', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(1198, 'ALTERNATOR', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(1199, 'DROP ARM', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(1200, 'ANCHORAGE', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(1201, 'ALUMINIUM & ITS RELATED PARTS', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(1202, 'AIR CLEANER', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(1203, 'AIR TANK', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(1204, 'AXLE (FR RR)', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(1205, 'HV BATTERY PACK', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(1206, 'BUS BAR', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(1207, 'BLOCK', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(1208, 'AIR BELLOW', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(1209, 'BUZZER', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(1210, 'BEARING', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(1211, 'BALL JOINTS', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(1212, 'BRACKET', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(1213, 'BELT', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(1214, 'BEAM', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(1215, 'RUBBER BEADINGS', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(1216, 'BOX', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(1217, 'AIR DRYER', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(1218, 'BRUSH', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(1219, 'BACKREST', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(1220, 'HOOD', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(1221, 'BUMPER (FR, RR)', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(1222, 'BEZEL', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(1223, 'JUNCTION BOX', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(1224, 'ADHESIVE', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(1225, 'CIRCUIT DIAGRAM', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(1226, 'TRACTION CONTAINER', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(1227, 'COVER, MOUNTING ABS VALVES COVER', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(1228, 'USB CHARGER', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(1229, 'CLUTCH PLATE', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(1230, 'COIL IGNITION', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(1231, 'CLAMPS', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(1232, 'COMPRESSOR', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(1233, 'CONNECTORS', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(1234, 'CONTROLLER', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(1235, 'COUPLING', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(1236, 'CYLINDER', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(1237, 'COLLARS', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(1238, 'DRIVER CURTAIN', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(1239, 'Cooling System', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(1240, 'CASTING', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(1241, 'DASHBOARD', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(1242, 'DIMISTER', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(1243, 'DOME', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(1244, 'Floor Drainage', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(1245, 'PIN (HORN PIN)', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(1246, 'DOOR', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(1247, 'DIP STICK', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(1248, 'DISPLAY UNIT', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(1249, 'ELECTRICAL BASE', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(1250, 'ELECTROSTATIC DISCHARGE GASKET', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(1251, 'ELECTRICAL ANTENNA', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(1252, 'ENGINE', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(1253, 'ELECTRICAL MDVR', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(1254, 'EXTRUDED SECTIONS', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(1255, 'INLET & EXHAUST MANIFOLD', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(1256, 'FITTINGS', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(1257, 'FACIA', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(1258, 'FIRE DETECTION SYSTEM', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(1259, 'FRAME', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(1260, 'FIXTURE', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(1261, 'FLANGE', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(1262, 'CHASSIS FRAME ASSY', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(1263, 'FAN (EE)', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(1264, 'FRP', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(1265, 'FUEL SYSTEM', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(1266, 'FOOTSTEP', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(1267, 'FUSE', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(1268, 'FORGING', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(1269, 'BOLT - ON ASSEMBLY', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(1270, 'GEAR BOX - TRANSMISSION', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(1271, 'GANCIO', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(1272, 'GRID - TRAY', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(1273, 'MESH', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(1274, 'GUSSET', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(1275, 'GLASS - SIDE GLASS, FR WINDSCREEN, RR WINDSCREEN', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(1276, 'HOMOLOGATION CERTIFICATE', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(1277, 'HANDHOLD', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(1278, 'HINGE', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(1279, 'HARDDISK', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(1281, 'HPL', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(1282, 'ELECTRICAL HORN', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(1283, 'HOUSING', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(1284, 'HATCH', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(1285, 'HUB', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(1286, 'HVAC', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(1287, 'HARDWARE', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(1288, 'HYDRAULIC SYSTEM', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(1289, 'INSTRUMENT CLUSTER', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(1290, 'INSULATION', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(1291, 'INVERTER', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(1292, 'JACK', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(1293, 'KINGPIN', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(1294, 'KIT', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(1295, 'LAMP ASSY', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(1296, 'LID', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(1297, 'LATCHES', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(1298, 'LINNER', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(1299, 'LAMP', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(1300, 'VALIDATOR MACHINE', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(1301, 'MACHINED COMPO', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(1302, 'MEDICAL KIT', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(1303, 'MUDGUARD', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(1304, 'MOULDED NON-METALLIC ITEMS', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(1305, 'MOTOR', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(1306, 'MANUAL RAMP', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(1307, 'MIRROR', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(1308, 'MOUNTING ASSY', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(1309, 'GREASE NIPPLE', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(1310, 'OIL BAFFLE', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(1311, 'O MOUNT', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(1312, 'PANEL', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(1313, 'ACCELERATOR PEDAL', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(1314, 'PRINTED DOCUMENTS', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(1315, 'PLATE', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(1316, 'SWISS PROFILE', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(1317, 'PILLER', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(1318, 'PLASTIC', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(1319, 'PLASTIC PACKING', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(1320, 'BUSH', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(1321, 'PNEUMATIC SYSTEM', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(1322, 'PDU', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(1323, 'PUMP', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(1324, 'METAL PIPE', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(1325, 'PULLEY', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(1326, 'PLYWOOD', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(1327, 'RACK', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(1328, 'CANT  RAIL', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(1329, 'RADIATOR', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(1330, 'REFLECTOR', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(1331, 'RAIN GUTTER', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(1332, 'RIB', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(1333, 'REGULATOR', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(1334, 'RAW MATERIAL', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(1335, 'REINFORCEMENT', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(1336, 'RESERVOIR', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(1337, 'BRAKE RESISTOR', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(1338, 'RUPD', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(1339, 'RIVETED ASSY', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(1340, 'REXINE', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(1341, 'RELAYS', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(1342, 'SHOCK ABSORBER (FR, RR)', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(1343, 'SWITCHS', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(1344, 'STEERING DEVICE', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(1345, 'BOLTS', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(1346, 'SCHEMATIC', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(1347, 'STIFFNER', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(1348, 'SPRINGS', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(1349, 'SHAFT', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(1350, 'SHEET', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(1351, 'STAIR NOSING', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(1352, 'STOPPER', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(1353, 'STICKERS - CITY LIFE, JBM, ALL TYPES OF STICKERS', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(1354, 'REVERSE PARKING SENSOR', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(1355, 'STEERING LINK', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(1356, 'SEAT', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(1357, 'SUN SHADE', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(1358, 'SLEEVE', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(1359, 'SOFTWARE-VCU', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(1360, 'ANGLE', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(1361, 'WHEEL CHOKE', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(1362, 'COOLANT TANK', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(1363, 'MANSOON TAPE', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(1364, 'CABLE TRAY', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(1365, 'THERMOSTAT', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(1366, 'UNIVERSAL JOINT ASSY', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(1367, 'UNCLASSIFIED / MISCELLANEOUS', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(1368, 'VISER', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(1369, 'VALVE', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(1370, 'VINYAL', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(1371, 'ANTI VIBRATION PAD', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(1372, 'VTR', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(1373, 'WIRING HARNESS', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(1374, 'WIRE', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(1375, 'WELDMENT', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(1376, 'WEATHER STRIP', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(1377, 'WIPER SYSYTEM', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(1378, 'WHEEL & TYRES SYSTEM', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(1379, 'ARM', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(1380, 'AIR FILTER', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(1381, 'ASSY AIR TANK', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(1382, 'STUB AXLE', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(1383, 'BATTERY (LV)', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(1384, 'COPPER BAR', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(1385, 'MACHINING BLOCK', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(1386, 'STEERING COLUMN BELLOW', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(1387, 'RPAS BUZZER', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(1388, 'ROLLER', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(1389, 'FORGED BALL END', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(1390, 'SEAT BELT', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(1391, 'COMPRI RUBBER', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(1392, 'JUNCTION BOX', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(1393, 'AIR DISTRIBUTION UNIT', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(1394, 'BUMPER ASSY (FR, RR)', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(1395, 'ASSY CRADLE', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(1396, 'SEALANT', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(1397, 'COVERING', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(1398, 'PRECHARGER', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(1399, 'PRESSURE PLATE', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(1400, 'P CLAMP', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(1401, 'AIR COMPRESSOR', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(1402, 'TERMINAL', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(1403, 'BMS CONTROLLER', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(1404, 'CNG - CYLINDER', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(1405, 'ASSY DASHBOARD', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(1406, 'ASSY DIMISTER', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(1407, 'DOWELS', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(1408, 'SERVICE DOOR', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(1409, 'DISPLAY BOARD', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(1410, 'ELECTRICAL LENS', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(1411, 'ELECTRICAL CAMERA', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(1412, 'ENGINE OIL COOLER', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(1413, 'ELECTRICAL MNVR', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(1414, 'EXTRUSION', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(1415, 'INTERCOOLER & TURBOCHARGER', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(1416, 'UNION JOINTS', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(1417, 'FDSS-SUPPRESSION', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(1418, 'GAUGES', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(1419, 'RADIATOR FAN', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(1420, 'FUEL EQUIPMENTS', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(1421, 'MEGA FUSE HODER', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(1422, 'RIVETING ASSEMBLY', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(1423, 'GEARS', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(1424, 'GRILL', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(1425, 'SIDE GLASS', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(1426, 'HANDLES', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(1427, 'ASSY HINGE', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(1428, 'HOSE - METALIC', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(1429, 'CASING', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(1430, 'ASSY HATCH', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(1431, 'HVAC - RELATED PARTS', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(1432, 'HYDRAULIC SYSTEM - RELATED PARTS', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(1433, 'HEAT SHIELD', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(1434, 'JACK,JACK LEVER', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(1435, 'LOCK KEY KIT', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(1436, 'LOCK', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(1437, 'FOG LAMP', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(1438, 'ANY MACHINE', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(1439, 'MEDICAL PARTS', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(1440, 'MUDFLAP', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(1441, 'POWER STEERING MOTOR', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(1442, 'MIRROR ASSEMBLY', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(1443, 'NOZZLE', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(1444, 'OIL CATCHER (RR AXLE)', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(1445, 'DUCT PANEL', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(1446, 'PEDAL & CONTROLS', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(1447, 'OPERATOR MANUAL', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(1448, 'GROMMET', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(1449, 'POWER STEERING PUMP', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(1450, 'TUBE - BEND TUBE', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(1451, 'SKIRT RAIL', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(1452, 'FINISHER SCREEN', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(1453, 'TUBE - RM', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(1454, 'STEERING RESERVOIR', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(1455, 'BUS BAR RELAY', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(1456, 'BUTTON', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(1457, 'STEERING COLUMN', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(1458, 'NUT', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(1459, 'COIL SPRING, HELICAL SPRING', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(1460, 'SPINDLES', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(1461, 'BEND SHEET', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(1462, 'BUMP STOPPER', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(1463, 'LOGO', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(1464, 'RPAS WARNING UNIT', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(1465, 'DRAG LINK', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(1466, 'HEAD REST - SEAT', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(1467, 'OGIVE (SLEEVE)', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(1468, 'SOFTWARE-VCU FOR BMU FLASHING', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(1469, 'L / C SECTION', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(1470, 'TOW HOOK', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(1471, 'TIGER TAPE', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(1472, 'KNUCKLE JOINT', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(1473, 'CHAIN', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(1474, 'CHARGING VALVE', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(1475, 'VIBRATION PAD', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(1476, 'CABLES', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(1477, 'WELDED ASSEMBLY', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(1478, 'WIPER BLADE', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(1479, 'WHEEL RIM', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(1480, 'ASSY ARM', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(1481, 'FILTER', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(1482, 'ASSY AXLE', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(1483, 'ASSY BATTERY', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(1484, 'STOPPER BLOCK', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(1485, 'RUBBER BELLOW', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(1486, 'FLASHER', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(1487, 'ASSY ROLLER', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(1488, 'STOPPER BELT', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(1489, 'MNVR & MDVR BOX', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(1490, 'BRAKE DRUM', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(1491, 'PRIMER', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(1492, 'FLAP', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(1493, 'ANY CHARGER', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(1494, 'U BOLT CLAMPS', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(1495, 'ASSY COMPRESSOR', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(1496, 'CHARGING SOCKET', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(1497, 'RPAS CONTROLLER', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(1498, 'FIRE - CYLINDER', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(1499, 'SUBMODULE', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(1500, 'HORN PIN', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(1501, 'PASSENGER DOOR', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(1502, 'DESTINATION BOARD', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(1503, 'ELECTRICAL HOLDER', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(1504, 'ELECTRICAL MIC', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(1505, 'ENGINE CAMSHAFT', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(1506, 'ELECTRICAL HARD DISK', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(1507, 'EXTRUSION (FRONT ROUTE SIGN FASTENING GUIDE)', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(1508, 'CATALAYTIC CONVERTOR, CATCON', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(1509, 'FITTING REDUCER', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(1510, 'FUEL INJECTION EQUIPMENTS', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(1511, 'BLADE FUSE', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(1512, 'GENERAL ASSEMBLY', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(1513, 'LOUVER', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(1514, 'FR WINDSCREEN', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(1515, 'HANDRAIL', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(1516, 'HINGE BEZEL', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(1517, 'HOSE - RUBBER', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(1518, 'AC', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(1519, 'SPONGE RUBBER', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(1520, 'HSRP KIT', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(1521, 'KEY', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(1522, 'BULB', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(1523, 'FIRST AID KIT', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(1524, 'SPRAY SUPPRESSION', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(1525, 'TRACTION MOTOR', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(1526, 'ASSY PANEL', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(1527, 'SERVICE MANUAL', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(1528, 'PLUG', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(1529, 'ELECTRIC PUMP', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(1530, 'SS TUBE', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(1531, 'WINDOW RAIL', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(1532, 'VINYL - RM', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(1533, 'DAT TANK', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(1534, 'POWER RELAY', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(1535, 'POE SWITCH', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(1536, 'STEERING WHEEL ASSY', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(1537, 'WASHER, SPRING WASHER', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(1538, 'LEAF SPRING', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(1539, 'PROPELLER SHAFT ASSY', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(1540, 'CLIT', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(1541, 'EMBLEM', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(1542, 'TEMPERATURE SENSOR', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(1543, 'UPPER LINK', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(1544, 'ARM REST', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(1545, 'SOFTWARE-BMU', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(1546, 'Z SECTION', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(1547, 'HAMMER', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(1548, 'TAPE - RETRO REFLECTIVE TAPE', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(1549, 'UNIVERSAL JOINT', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(1550, 'FOOT BRAKE VALVE', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(1551, 'ANTI VIBRATION RUBBER', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(1552, 'JUMPER CABLE (EE)', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(1553, 'WIPER ARM', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(1554, 'TYRE', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(1555, 'ASSY DROP ARM', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(1556, 'PRECLEANER', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(1557, 'ASSY STUB AXLE', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(1558, 'NYLON BLOCK', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(1559, 'ASSY BUZZER', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(1560, 'ASSY BEARINGS', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(1561, 'V BELT - ENG BELT', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(1562, 'BOX ASSY', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(1563, 'BRAKE CHAMBER', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(1564, 'CLEANER', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(1565, 'ENCLOSURES', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(1566, 'CLAMP RING', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(1567, 'ASSY AIR COMPRESSOR', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(1568, 'UNIVERSAL SOCKET', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(1569, 'ERIC CONTROLLER', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(1570, 'PNEUMATIC CYLINDER', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(1571, 'EMERGENCY DOOR', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(1572, 'SIGN BOARD', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(1573, 'CONTACTOR', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(1574, 'ELECTRICAL SPEAKER', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(1575, 'ENGINE CRANK SHAFT', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(1576, 'MUFFLER - SILENCER', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(1577, 'FITTING JOINTS IN FUEL SYSTEM', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(1578, 'FUEL FEED & CHARGING PUMP', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(1579, 'CIRCUIT BREAKER', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(1580, 'PHANTOM ASSEMBLY', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(1581, 'ASSY MESH', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(1582, 'RR WINDSCREEN', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(1583, 'HOLDER (M/C)', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(1584, 'HOSE - NON METALIC', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(1585, 'AC DUCT', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(1586, 'FOAM,', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(1587, 'ENG KIT', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(1588, 'HOOK', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(1589, 'LIGHT', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(1590, 'FIRST AID DEVICE', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(1591, 'ELECTRIC MOTOR', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(1592, 'ASSY DUCT PANEL', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(1593, 'SERVICE BOOK', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(1594, 'CAP & DUST CAP', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(1595, 'FUEL INJECTION PUMP', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(1596, 'BUNDY TUBE', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(1597, 'WAIST RAIL', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(1598, 'SHEET - RM', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(1599, 'PNEUMATIC RELAY', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(1600, 'REMOTE BATTERY SWITCH', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(1601, 'POWER STEERING GEAR BOX', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(1602, 'SCREW', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(1603, 'GAS SPRING', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(1604, 'INTERMEDIATE SHAFT', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(1605, 'SIM', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(1606, 'SPECIAL PLATE - ENGINE , VIN , COMPLIANCE ,HSRP,INSTRUCTIONS', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(1607, 'ANTI PINCH SENSOR', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(1608, 'LOWER LINK', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(1609, 'CANTILEVER', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(1610, 'SOFTWARE-MCU', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(1611, 'CHANNEL', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(1612, 'TOOL KIT', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(1613, 'DSA TAPE', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(1614, 'QSPV', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(1615, 'RUBBER PAD', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(1616, 'POWER CABLE', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(1617, 'WIPER LINKAGES', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(1618, 'VALVE - TUBE', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(1619, 'ASSY AIR CLEANER', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(1620, 'ASSY FLASHER', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(1621, 'ASSY BELT', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(1622, 'BOXING ASSY', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(1623, 'BRAKE SHOES', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(1624, 'PAINT', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(1625, 'ASSY COVERS', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(1626, 'CLAMP BAND', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(1627, 'ASSY TERMINAL', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(1628, 'AUDIO CONTROLLER', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(1629, 'ASSY CYLINDER', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(1630, 'DOOR RELATED PARTS', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(1631, 'TOUCH SCREEN', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(1632, 'CAPACITOR', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(1633, 'ELECTRICAL MICROPHONE', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(1634, 'ENGINE FLYWHEEL', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(1635, 'FITTING JOINTS PNEMATIC SYTEM', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(1636, 'FUEL TANK', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(1637, 'ASSY GRILL', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(1638, 'WINDOW, SIDE WINDOW', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(1639, 'LEVER & KNOBS', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(1640, 'HOSE - TEFLON', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(1641, 'MANIFOLD', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(1642, 'PU FOAM', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(1643, 'FDSS KIT', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(1644, 'DIRECTION INDICATOR LAMP', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(1645, 'STARTOR MOTOR', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(1646, 'SKIRT PANEL', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(1647, 'WORKSHOP MANUAL', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(1648, 'RUBBER PACKING', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(1649, 'FLEXIBLE PIPE', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(1650, 'RUBRAIL', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(1651, 'PLYWOOD - RM', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(1652, 'BATTERY ISOLATOR SWITCH', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(1653, 'STEERING BEVEL BOX', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(1654, 'RIVETS', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(1655, 'HORN SPRING', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(1656, 'ENGINE COMP PLATE', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(1657, 'HUMIDITY SENSOR', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(1658, 'ROD - SUSPENSION', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(1659, 'DRIVER SEAT', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(1660, 'SOFTWARE-LENZE', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(1661, 'L SECTION', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(1662, 'SPANNER', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(1663, 'CORK TAPE', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(1664, 'PNEUMATIC VALVE', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(1665, 'RUBBER BUFFER', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(1666, 'LAN', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(1667, 'WIPER WASHER TANK', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(1668, 'TUBE - TYRE', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(1669, 'ASSY AIR FILTER', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(1670, 'ASSY SEAT BELT', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(1671, 'BOXING STRUCTURE', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(1672, 'COOLANT', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(1673, 'ASSY COVERING', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(1674, 'CLIPS', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(1675, 'ASSY SOCKETS', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(1676, 'SPEED CONTROLLER', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(1677, 'FIRE EXTINGUSHER', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(1678, 'ASSY DOOR', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(1679, 'BDC DISPLAY', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(1680, 'RESISTOR', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(1681, 'ENGINE PISTON', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(1682, 'FITTING STUD COUPLING', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(1683, 'ASSY LOUVER', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(1684, 'SIDE WINDOW', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(1685, 'VELCRO', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(1686, 'HOSE - PVC', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(1687, 'HEATING & DEFROST SYSTEM / UNIT', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(1688, 'INSULATION, HEAT SHIELD, FOAM, PU FOAM, SPONGE RUBBER,HEAT S', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(1689, 'CNG KIT', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(1690, 'TAIL LAMP', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(1691, 'WIPER MOTOR', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(1692, 'OPENABLE PANEL', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(1693, 'SPARE PARTS LIST', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(1694, 'SEALS', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(1695, 'ELBOW', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(1696, 'SEAT RAIL', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(1697, 'SPONGE RUBBER - RM', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(1698, 'LIMIT SWITCH', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(1699, 'INSERTS', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(1700, 'VIN PLATE', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(1701, 'OXYGEN SENSOR', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(1702, 'TORQUE ROD', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(1703, 'PASSENGER SEAT', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(1704, 'SOFTWARE-VCU SCREEN', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(1705, 'C SECTION', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(1706, 'SCREW DRIVER', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(1707, 'LEVELING VALVE', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(1708, 'WHEEL CAP', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(1709, 'ASSY PRECLEANER', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(1710, 'ASSY STOPPER BELT', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(1711, 'OIL (RANE TRW POWER CRUISE RTX III TQ, ENGINE OIL,…….)', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(1712, 'ASSY FLAP', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(1713, 'ASSY CONNECTORS', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(1714, 'CONTROL UNIT', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(1715, 'ENGINE FLYWHEEL HOUSING', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(1716, 'ASSY GLASS', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(1717, 'ASSY HANDHOLD', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(1718, 'AIR CURTAIN', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(1719, 'WH KIT', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(1720, 'EMERGENCY LIGHT', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(1721, 'MESH SUPPORT', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(1722, 'OIL SEALS', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(1723, 'ROD', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(1724, 'PVC VINYL BEADING RM', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(1725, 'HVSS', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(1726, 'SPACER', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(1727, 'HSRP PLATE', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(1728, 'SENSOR', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(1729, 'TIE ROD', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(1730, 'DISABLE SEAT', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(1731, 'SOFTWARE-EVCC FOR CHARGING', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(1732, 'HAT SECTION', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(1733, 'TOOL BAG', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(1734, 'SOLENOID VALVE', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(1735, 'VALVE EXENSION', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(1736, 'ASSY FILTER', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(1737, 'GREASE', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(1738, 'MOUNTING ABS VALVES COVER', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(1739, 'CIRCLIP', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(1740, 'ASSY TERMINAL', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(1741, 'SCU', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(1742, 'ENGINE WATER PUMP', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(1743, 'ASSY SIDE GLASS', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(1744, 'ASSY HANDLE', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(1745, 'HVAC KIT', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(1746, 'GASKET', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(1747, 'NYLON PIPE', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(1748, 'AL EXTRUSION RM', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(1749, 'STUDS', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(1750, 'INSTRUCTION PLATE (CNG PLATE,…)', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(1751, 'STEERING ROD', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(1752, 'SOFTWARE-BRAKES(MECHANICAL)', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(1753, 'SUPPORT', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(1754, 'REFLECTOR TRIANGLE', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(1755, 'HAND CONTROL VALVE', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(1756, 'COTTON WASTE', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(1757, 'TIE MOUNT', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(1758, 'ASSY SOCKETS', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(1759, 'ECU', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(1760, 'ASSY FR WINDSCREEN', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(1761, 'ASSY HANDRAIL', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(1762, 'AC KIT', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(1763, 'COPPER GASKET.D.18X24X1,5', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(1764, 'PLASTIC PIPE', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(1765, 'HOSE RM', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(1766, 'PIN', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(1767, 'RFID TAG', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(1768, 'STEERING CONNECTING ROD', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(1769, 'SOFTWARE-BRAKES(ELECTRICAL)', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(1770, 'T Section', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(1771, 'PLIER', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(1772, 'LIMITING VALVE', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(1773, 'REFERIGENT', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(1774, 'ABS ECU', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(1775, 'ASSY RR WINDSCREEN', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(1776, 'ASSY HOLDER', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(1777, 'SUSPENSION KIT', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(1778, 'O RING', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(1779, 'INSULATION RM', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(1780, 'FASTAG', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(1781, 'STEERING STAY ROD', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(1782, 'SOFTWARE-BCS', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(1783, 'ISOLATION VALVE', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(1784, 'DISTILED WATER', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(1785, 'CONTROL MODULE', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(1786, 'ASSY SIDE WINDOW', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(1787, 'ASSY LEVER', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(1788, 'TCS KIT', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(1789, 'CORK RUBBER', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(1790, 'HPL RM', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(1791, 'LICENSE PLATE', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(1792, 'UPPER ROD', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(1793, 'SOFTWARE-NODE FRONT', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(1794, 'SHIM', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(1795, 'I/O MODULE', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(1796, 'KIT (LOCK KEY, HSRP, ENG, FDSS, CNG, WH, HVAC, AC, ………)', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(1797, 'EPDM RUBBER', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(1798, 'WIRING HARNESS RM', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(1799, 'COMPLIANCE PLATE', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(1800, 'LOWER ROD', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(1801, 'SOFTWARE - NODE REAR', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(1802, 'LOCTITE', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(1803, 'SHIFT SELECTOR', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(1804, 'KIT (LOCK KEY, HSRP, ENG, FDSS, CNG, WH, HVAC, AC, ………)', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(1805, 'PLASTIC SHEET RM', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(1806, 'STABILIZER BAR', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(1807, 'SOFTWARE INSTRUMENT CLUSTER', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(1808, 'DISTILED WATER', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(1809, 'AXLE KIT', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(1810, 'EVA RM', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(1811, 'ANTI ROLL BAR', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(1812, 'SOFTWARE 7” INCH DISPLAY (DIAGNOSTIC SCREEN)', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(1813, 'SHIM', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(1814, 'POWER CABLE KIT', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(1815, 'AL COIL- RM', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(1816, 'COW HORN', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(1817, 'SOFTWARE-ENGINE ECM', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(1818, 'LOCTITE', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(1819, 'HARNESS KIT', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(1820, 'GPSL COIL- RM', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(1821, 'SUSPENDER ASSY', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(1822, 'SOFTWARE-TCM', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(1823, 'CABLE TIE', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(1824, 'PIS KIT', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(1825, 'TAPE-RETRO REFLECTIVE TAPE-RM', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(1826, 'STC ROD', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(1827, 'SOFTWARE-ITS', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(1828, 'WELDING ROD', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(1829, 'CCTV KIT', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(1830, 'CONNECTING ROD', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(1831, 'SOFTWARE-VTS', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(1832, 'ACTIVATOR', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(1833, 'FRP KIT', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(1834, 'CUSHION', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(1835, 'ABS KIT', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(1836, 'PLYWOOD KIT', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(1837, 'RPAS KIT', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(1838, 'BRAKE KIT', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(1839, 'BATTERY PACK SYSTEM KIT', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(1840, 'DDU KIT', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(1841, 'PA SYSTEM KIT', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15');
INSERT INTO `products` (`id`, `name`, `description`, `status`, `added_date`, `updated_date`) VALUES
(1842, 'ON BOARD UNIT KIT', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(1843, 'ENGINE KIT', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(1844, 'TRANSMISSION KIT', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(1845, 'BOP Axle Parts LCV', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(1846, 'BOP Axle Parts HCV', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(1847, 'BOP Axle Parts Agricultural Equipment', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(1848, 'BOP Exhaust System Parts 2-Wheeler', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(1849, 'BOP Exhaust System Parts 3-Wheeler', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(1850, 'BOP Exhaust System Parts HCV', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(1851, 'BOP Exhaust System Parts LCV', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(1852, 'BOP Forging Forged', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(1853, 'BOP Forging Machined', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(1854, 'BOP Heavy Fabrication Parts Railway', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(1855, 'BOP Heavy Fabrication Parts Defence', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(1856, 'BOP Heavy Fabrication Parts HCV', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(1857, 'BOP Fastners Parts Nuts', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(1858, 'BOP Fastners Parts Screw', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(1859, 'BOP Fastners Parts Pin', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(1860, 'BOP Fastners Parts Bolts', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(1861, 'BOP Fastners Parts Washer', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(1862, 'PIPE 90X1', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(1863, 'PIPE 90X2', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(1864, 'TUBE 20X20X2', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(1865, 'TUBE 40X30X2', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(1866, 'TUBE 60X40X3', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(1867, 'TUBE 80X80X3', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(1868, 'SHEET BSK 46X5', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(1869, 'SHEET BSK 46X6', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(1870, 'SHEET BSK 46X8', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(1871, 'SHEET BSK 46X12', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(1872, 'SHEET CR2X1.2', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(1873, 'SHEET CR2X2', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(1874, 'SHEET DOMEX640X8', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(1875, 'SHEET E250BX4', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(1876, 'SHEET E250BX5', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(1877, 'SHEET ERWX2', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(1878, 'SHEET FE410X12', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(1879, 'SHEET 50X1.5', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(1880, 'SHEET 60X2.5', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(1881, 'SHEET 60X3', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(1882, 'SHEET ST52X5', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(1883, 'SHEET ST52X6', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(1884, 'SHEET WELDOX700X10', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(1885, 'SHEET EN8D', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(1886, 'SHEET SSX1.5', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(1887, 'SHEET ST52X8', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(1888, 'TUBE 20X20X1.5', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(1889, 'TUBE 40X40X1.5', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(1890, 'TUBE 60X40X1.5', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(1891, 'TUBE 20X40X1.5', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(1892, 'TUBE 30X30X1.5', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(1893, 'TUBE 40X40X2.5', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(1894, 'TUBE 60X40X2.5', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(1895, 'TUBE 60X60X2.5', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(1896, 'TUBE 80X40X2.5', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(1897, 'TUBE 80X80X2.5', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(1898, 'TUBE 120X40X2.5', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(1899, 'TUBE 80X40X3', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(1900, 'TUBE 100X60X3', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(1901, 'TUBE 120X40X3', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(1902, 'TUBE 120X80X3', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(1903, 'BOP Pipe/Tubular Assly.Fuel Neck Pipe', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(1904, 'BOP Pipe/Tubular Assly.Frame', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(1905, 'BOP Pipe/Tubular Assly.Material Handling Trolleys', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(1906, 'BOP Pipe Component', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(1907, 'BOP Sheet Metal Welded Assembly', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(1908, 'BOP Sheet Metal Component', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(1909, 'BOP Sheet Metal Skin Pannel', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(1910, 'BOP Sheet Metal Blank', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(1911, 'BOP Sheet Metal Rolling Parts', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(1912, 'BOP Rim Assembly', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(1913, 'BOP Tooling Parts Dies Parts', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(1914, 'BOP Tooling Parts Fixture Parts', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(1915, 'BOP Tooling Parts Jigs', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(1916, 'BOP Tooling Parts Panel Checker', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(1917, 'BOP Others', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(1918, 'Consumables Paint & Adhasives', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(1919, 'Consumables General Electrodes', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(1920, 'Consumables Oil & Lubricants', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(1921, 'Consumables Safety Items', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(1922, 'Consumables Welding Consumables', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(1923, 'Consumables Hardware Parts', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(1924, 'Consumables Stationary Item', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(1925, 'Consumables Uniform', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(1926, 'Consumables Pantry', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(1927, 'Consumables Cleaning Item', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(1928, 'Consumables Medicines', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(1929, 'Consumables Vehicles', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(1930, 'Consumables Abrahsives', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(1931, 'Cons. Others', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(1932, 'Consumables Chemical', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(1933, 'Consumables Cutting Tools', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(1934, 'EV Charger', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(1935, 'Finished Goods Axle LCV', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(1936, 'Finished Goods Axle HCV', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(1937, 'Finished Goods Axle Agricultural Equipment', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(1938, 'Finished AL coated CTL Tubes', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(1939, 'Finished Al Longer Tubes', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(1940, 'Finished Goods Cylinders', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(1941, 'Finished Goods Exhaust System 2-Wheeler', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(1942, 'Finished Goods Exhaust System HCV', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(1943, 'Finished Goods Exhaust System LCV', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(1944, 'Finished Goods Forging Forged', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(1945, 'Finished Goods Forging Machined', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(1946, 'Finished Goods Heavy Fabrication Railway', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(1947, 'Finished Goods Heavy Fabrication HCV', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(1948, 'Finished Goods Heavy Fabrication MH Equipment', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(1949, 'Finished Goods Fastners Nuts', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(1950, 'Finished Goods Fastners Screw', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(1951, 'Finished Goods Fastners Pin', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(1952, 'Finished Goods Fastners Bolts', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(1953, 'Finished Goods Fastners Washer', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(1954, 'FG TUBE JOB WORK LONGER', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(1955, 'FG SLIT JOB WORK', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(1956, 'FG TUBE JOB WORK CUT TO LENGTH', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(1957, 'Finished MS CTL Tubes', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(1958, 'Finished MS Longer Tubes', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(1959, 'Finished Goods Pipe/Tubular Assy.Fuel Neck Pipe', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(1960, 'Finished Goods Pipe/Tubular Assy.Frame', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(1961, 'Finished Goods Pipe/Tubular Assy.MH Trolleys', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(1962, 'Finished Goods Pipe', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(1965, 'Finished Goods Sheet Metal Welded Assembly', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(1966, 'Finished Goods Sheet Metal Component', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(1967, 'Finished Goods Sheet Metal Skin Pannel', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(1968, 'Finished Goods Sheet Metal Blank', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(1969, 'Finished Goods Sheet Metal Rolling Parts', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(1970, 'Finished Goods Rim Assembly', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(1971, 'Finished Stainless Steel CTL Tubes', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(1972, 'Finished Stainless Steel Longer Tubes', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(1973, 'Finished Goods Tooling Dies', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(1974, 'Finished Goods Tooling Fixture', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(1975, 'Finished Goods Tooling Jigs', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(1976, 'Finished Goods Tooling Panel Checker', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(1977, 'Finished Goods Others', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(1978, 'Finished Goods SS Scrap', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(1979, 'Finished Goods Wooden Scrap', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(1980, 'Finished Goods Bulding Material Scrap', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(1981, 'Finished Goods Waste Scrap', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(1982, 'Finished Goods Empty Drum', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(1983, 'Finished Goods MS Scrap', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(1984, 'Finished Goods Used Oil', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(1985, 'Phentom Group', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(1986, 'Services Maintenance Contracts', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(1987, 'Services Sub-Contracting', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(1988, 'Services AMCs', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(1989, 'Services Others', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(1990, 'Services Labour Contract', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(1991, 'Services Transportation', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(1992, 'Services Clearing Agent', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(1993, 'Services Taxi Services', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(1994, 'Services Consultancy', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(1995, 'AMBULANCE', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(1996, 'CITY BUS_1', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(1997, 'CITY BUS', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(1998, 'INTERCITY BUS', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(1999, 'PRISON VEHICLES', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(2000, 'SCHOOL BUS', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(2001, 'SLEEPER COACH', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(2002, 'SPECIAL BUS', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(2003, 'STAFF BUS', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(2004, 'TARMAC BUS', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(2005, 'TOURIST  BUS', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(2006, 'Maruti Supplied Dies & Tools', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(2007, 'Packing MS Bin', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(2008, 'Packing Plastic Bin', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(2009, 'Packing Corrugated Box', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(2010, 'Packing Corrugated Sheet', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(2011, 'Packing Wooden Pallets', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(2012, 'Packing Polythene', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(2013, 'Packing Wooden Box', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(2014, 'Packing Thermacoal Packing', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(2015, 'Packing Polythene Bags', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(2016, 'Packing Packing Slips (Lables)', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(2017, 'Packing MS Packing Strips', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(2018, 'Packing Plastic Strips', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(2019, 'Packing Empties', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(2020, 'Packing Jute/HDBP Bag', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(2021, 'Packing Others', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(2022, 'RM,Casting,F30', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(2023, 'RM,Casting,FC300', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(2024, 'RM,Casting,FCD-550', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(2025, 'RM,Casting,FG260', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(2026, 'RM,Casting,GM-241', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(2027, 'RM,Casting,M15', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(2028, 'RM,Bar,Round,Black,Aluminium', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(2029, 'RM,Bar,Round,Black,Brass', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(2030, 'RM,Bar,Round,Black,C20', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(2031, 'RM,Bar,Round,Black,C35', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(2032, 'RM,Bar,Round,Black,CU', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(2033, 'RM,Bar,Round,Black,D2', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(2034, 'RM,Bar,Round,Black,EN1', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(2035, 'RM,Bar,Round,Black,EN24', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(2036, 'RM,Bar,Round,Black,EN31', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(2037, 'RM,Bar,Round,Black,EN353', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(2038, 'RM,Bar,Round,Black,EN36', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(2039, 'RM,Bar,Round,Black,EN8', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(2040, 'RM,Bar,Round,Black,EN9', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(2041, 'RM,Bar,Round,Black,HCHCR', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(2042, 'RM,Bar,Round,Black,Gun Metal', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(2043, 'RM,Bar,Round,Black,MS', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(2044, 'RM,Bar,Round,Black,OHNS', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(2045, 'RM,Bar,Round,Black,SAE1010', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(2046, 'RM,Bar,Round,Black,SKD11', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(2047, 'RM,Bar,Round,Black,Pneumatic Steel(SR4)', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(2048, 'RM,Bar,Round,Black,SS', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(2049, 'RM,Bar,Round,Clean,1541', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(2050, 'RM,Bar,Round,Clean,4140 / EN-19', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(2051, 'RM,Bar,Round,Clean,15B41', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(2052, 'RM,Bar,Round,Clean, 1020', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(2053, 'RM,Bar,Round,Clean,EN8 /1541', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(2054, 'RM,Bar,Round,Clean,EN8A', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(2055, 'RM,Bar,Round,Clean,HDS', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(2056, 'RM,Bar,Round,Clean,HSS', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(2057, 'RM,Bar,Round,Clean,MS', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(2058, 'RM,Bar,Round,Clean,S35C', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(2059, 'RM,Bar,Square,Black,C20', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(2060, 'RM,Bar,Square,Black,EN8', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(2061, 'RM,Bar,Square,Black,MS', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(2062, 'RM,Bar,Square,Black,SS', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(2063, 'RM,Bar,Square,Clean,MS', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(2064, 'RM,Coil,CR,CO,ZN,DP590', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(2065, 'RM,Coil,CR,NC,GRD-D', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(2066, 'RM,Coil,CR,NC,GRD-DD', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(2067, 'RM,Coil,CR,NC,DD1079', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(2068, 'RM,Coil,CR,NC,DP590', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(2069, 'RM,Coil,CR,NC,GRD-EDD', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(2070, 'RM,Coil,CR,NC,EDD1079', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(2071, 'RM,Coil,CR,NC,FEE220BH', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(2072, 'RM,Coil,CR,NC,FEE340F', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(2073, 'RM,Coil,CR,NC,FEE420F', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(2074, 'RM,Coil,CR,NC,FEP05', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(2075, 'RM,Coil,CR,NC,GRD-HT', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(2076, 'RM,Coil,CR,NC,GRD-IF', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(2077, 'RM,Coil,CR,NC,Pickle,GRD-D', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(2078, 'RM,Coil,CR,NC,Pickle,GRD-DD', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(2079, 'RM,Coil,CR,NC,Pickle,GRD-EDD', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(2080, 'RM,Coil,CR,NC,Pickle,GRD-HT', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(2081, 'RM,Coil,CR,NC,Pickle,GRD-IF', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(2082, 'RM,Coil,CR,NC,STCE440', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(2083, 'RM,Coil,CR,SS,SS-430,', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(2084, 'RM,Coil,CR,SS,SS-304,', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(2085, 'RM,Coil,CR,SS,SS-436,', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(2086, 'RM,Coil,CR,SS,SS-409,', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(2087, 'RM,Coil,CR,CO,AL,GRD-D', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(2088, 'RM,Coil,CR,CO,AL,GRD-DD', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(2089, 'RM,Coil,CR,CO,AL,GRD-EDD', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(2090, 'RM,Coil,CR,CO,Zinc,GRD-D', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(2091, 'RM,Coil,CR,CO,Zinc,GRD-DD', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(2092, 'RM,Coil,CR,CO,Zinc,GRD-EDD', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(2093, 'RM,Coil,CR,CO,Zinc,GRD-HT', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(2094, 'RM,Coil,HR,CO,E34', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(2095, 'RM,Coil,HR,FE410', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(2096, 'RM,Coil,HR,NC,E34', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(2097, 'RM,Coil,HR,NC,Pickle,GRD-D', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(2098, 'RM,Coil,HR,NC,Pickle,GRD-DD', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(2099, 'RM,Coil,HR,NC,Pickle,GRD-EDD', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(2100, 'RM,Coil,HR,NC,Pickle,GRD-HT', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(2101, 'RM,Coil,HR,SS,SS-430,', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(2102, 'RM,Coil,HR,SS,SS-436,', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(2103, 'RM,Coil,HR,SS,SS-409,', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(2104, 'RM,Coil,HR,WT41', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(2105, 'RM,Coil,HR,CO,AL,GRD-DD', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(2106, 'RM,Coil,HR,CO,AL,GRD-HT', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(2107, 'RM,Coil,HR,CO,Zinc,GRD-DD', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(2108, 'RM,Coil,HR,CO,Zinc,GRD-EDD', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(2109, 'RM,Coil,HR,CO,Zinc,GRD-HT', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(2110, 'RM,Die Parts', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(2111, 'RM,Structure Steel,Angle', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(2112, 'RM,Structure Steel,Beam', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(2113, 'RM,Structure Steel,Channel', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(2114, 'RM,Structure Steel,Flat', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(2115, 'RM,Structure Steel,Cheqred Steel', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(2116, 'RM,Plate,Aluminium', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(2117, 'RM,Plate,Brass', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(2118, 'RM,Plate,C40', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(2119, 'RM,Plate,105CR1', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(2120, 'RM,Plate,Copper', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(2121, 'RM,Plate,D2', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(2122, 'RM,Plate,EN24', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(2123, 'RM,Plate,EN31', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(2124, 'RM,Plate,EN353', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(2125, 'RM,Plate,EN36', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(2126, 'RM,Plate,EN8', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(2127, 'RM,Plate,Hardox', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(2128, 'RM,Plate,HCHCR', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(2129, 'RM,Plate,HMD5', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(2130, 'RM,Plate,IS2062', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(2131, 'RM,Plate,MS', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(2132, 'RM,Plate,OHNS', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(2133, 'RM,Plate,PhosPhorous Bronze', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(2134, 'RM,Plate,ST42', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(2135, 'RM,Plate,ST52', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(2136, 'RM,Plate,SAE8620', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(2137, 'RM,Plate,SKD11', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(2138, 'RM,Plate,Stainless Steel', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(2139, 'RM,Plate,Weldox', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(2140, 'Raw Material Others', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(2141, 'RM Sheet Pkt', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(2142, 'RM,Pipe,Round,Al,NC,GRD-DD', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(2144, 'RM,Pipe,Round,CR,NC,GRD-D', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(2145, 'RM,Pipe,Round,CR,NC,GRD-DD', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(2146, 'RM,Pipe,Round,CR,NC,GRD-EDD', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(2147, 'RM,Pipe,Round,CR,NC,GRD-MS', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(2148, 'RM,Pipe,Round,CR,SS,GRD-SS304', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(2149, 'RM,Pipe,Round,CR,SS,GRD-SS409', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(2150, 'RM,Pipe,Round,CR,CO,AL-Coating', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(2151, 'RM,Pipe,Round,CR,CO,Ni-Coating', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(2152, 'RM,Pipe,Round,HR,NC,GRD-DD', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(2153, 'RM,Pipe,Rectng,CR,NC,GRD-DD', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(2154, 'RM,Pipe,Rectng,CR,NC,GRD-MS', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(2155, 'RM,Pipe,Rectng,HR,NC,GRD-DD', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(2156, 'RM,Pipe,Rectng,HR,NC,GRD-MS', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(2157, 'RM,Pipe,Square,CR,NC,GRD-DD', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(2158, 'RM,Pipe,Square,CR,NC,GRD-MS', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(2159, 'RM,Pipe,Square,CR,SS,GRD-SS304', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(2160, 'RM,Pipe,Square,HR,NC,GRD-DD', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(2161, 'RM SEAMLESS TUBE', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(2162, 'RM,Rod in Coil form,Round,Black,4140', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(2163, 'RM,Rod in Coil form,Round,Black,EN19', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(2164, 'RM,Rod in Coil form,Round,Black,EN8A', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(2165, 'RM,Rod in Coil form,Round,Black,MS', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(2166, 'RM,Rod in Coil form,Round,Black,SS', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(2167, 'RM,Rod in Coil form,Round,Black,10B21', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(2168, 'RM,Rod in Coil form,Round,Black,15B25', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(2169, 'RM,Rod in Coil form,Round,Black,15B41', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(2170, 'RM,Rod in Coil form,Round,Clean,EN8A', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(2171, 'RM,Rod in Coil form,Round,Black,S35C', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(2172, 'RM,Rod in Coil form,Round,Clean,1021', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(2173, 'RM,Rod in Coil form,Round,Clean,15B25', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(2174, 'RM,Rod in Coil form,Round,Clean,15B41', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(2175, 'RM,Rod in Coil form,Round,Clean,SAE1541', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(2176, 'RM,Rod in Coil form,Round,Clean,4140', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(2177, 'RM,Rod in Coil form,Round,Clean,SPOKE WIRE', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(2178, 'RM,Rod in Coil form,Round,Clean,MS', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(2179, 'RM,Sheet,CR,Brass', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(2180, 'RM,Sheet,CR,Copper', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(2181, 'RM,Sheet,CR,CO,ZN,DP590', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(2182, 'RM,Sheet,CR,NC,Pickle,GRD-D', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(2183, 'RM,Sheet,CR,NC,Pickle,GRD-DD', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(2184, 'RM,Sheet,CR,NC,DD1079', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(2185, 'RM,Sheet,CR,NC,DP590', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(2186, 'RM,Sheet,CR,NC,Pickle,GRD-EDD', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(2187, 'RM,Sheet,CR,NC,EDD1079', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(2188, 'RM,Sheet,CR,NC,FEP04', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(2189, 'RM,Sheet,CR,NC,FEE220BH', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(2190, 'RM,Sheet,CR,NC,FEE300', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(2191, 'RM,Sheet,CR,NC,FEE340F', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(2192, 'RM,Sheet,CR,NC,FEE420F', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(2193, 'RM,Sheet,CR,NC,FEP05', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(2194, 'RM,Sheet,CR,NC,Pickle,GRD-HT', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(2195, 'RM,Sheet,CR,NC,Pickle,GRD-IF', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(2196, 'RM,Sheet,CR,NC,Pickle,GRD-D', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(2197, 'RM,Sheet,CR,NC,Pickle,GRD-EDD', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(2198, 'RM,Sheet,CR,NC,Pickle,GRD-IF', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(2199, 'RM,Sheet,CR,NC,STCE440', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(2200, 'RM,Sheet,CR,Chromium Copper', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(2201, 'RM,Sheet,CR,SS,SS-430,', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(2202, 'RM,Sheet,CR,SS,SS-304,', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(2203, 'RM,Sheet,CR,SS,SS-409,', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(2204, 'RM,Sheet,CR,CO,AL,GRD-D', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(2205, 'RM,Sheet,CR,CO,AL,GRD-DD', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(2206, 'RM,Sheet,CR,CO,AL,GRD-EDD', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(2207, 'RM,Sheet,CR,CO,Zinc,GRD-D', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(2208, 'RM,Sheet,CR,CO,Zinc,GRD-DD', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(2209, 'RM,Sheet,CR,CO,Zinc,GRD-EDD', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(2210, 'RM,Sheet,CR,CO,Zinc,GRD-HT', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(2211, 'RM,Sheet,CR,CO,Zinc,GRD-IF', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(2212, 'RM,Sheet,HR,CO,E34', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(2213, 'RM,Sheet,HR,FE410', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(2214, 'RM,Sheet,HR,NC,E34', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(2215, 'RM,Sheet,HR,NC,Pickle,GRD-D', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(2216, 'RM,Sheet,HR,NC,Pickle,GRD-DD', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(2217, 'RM,Sheet,HR,NC,Pickle,GRD-EDD', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(2218, 'RM,Sheet,HR,NC,Pickle,GRD-HT', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(2219, 'RM,Sheet,HR,SS,SS-430,', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(2220, 'RM,Sheet,HR,SS,SS-436,', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(2221, 'RM,Sheet,HR,SS,SS-409,', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(2222, 'RM,Sheet,HR,CO,AL,GRD-DD', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(2223, 'RM,Sheet,HR,CO,AL,GRD-HT', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(2224, 'RM,Sheet,HR,CO,Zinc,GRD-D', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(2225, 'RM,Sheet,HR,CO,Zinc,GRD-DD', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(2226, 'RM,Sheet,HR,CO,Zinc,GRD-EDD', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(2227, 'RM,Sheet,HR,CO,Zinc,GRD-HT', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(2228, 'RM,Sheet,MS', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(2229, 'Solar Equipments', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(2230, 'RM,Sheet,Poly Carbonated', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(2231, 'RM,Sheet,Spring Steel', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(2232, 'Spares Building Material', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(2233, 'Spares General  Electrical', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(2234, 'Spares General Mechanical', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(2235, 'Spares General Pneumatics', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(2236, 'Spares General  Pipe Line', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(2237, 'SG Tool/Die/Jig/Fix. Maintenance', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(2238, 'Spares Material Handling Equipment', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(2239, 'Spares Specific Air Dryer', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(2240, 'Spares Specific Pneumatics Press', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(2241, 'Spares Specific Hydraulics Press', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(2242, 'Spares Specific Shearing Machine', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(2243, 'Spares Specific Drilling Machine', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(2244, 'Spares Specific Grinder', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(2245, 'Spares Specific Power HackSaw', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(2246, 'Spares Specific Lathes', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(2247, 'Spares Specific Milling', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(2248, 'Spares Specific Shaper', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(2249, 'Spares Specific Laser Cutting Machine', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(2250, 'Spares  Specific Hoist', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(2251, 'Spares Specific Paint Shop', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(2252, 'Spares Specific Blank Line', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(2253, 'Spares Specific Cut to Length(CTL)', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(2254, 'Spares Specific Plating Line', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(2255, 'Specific Spares Heating Equipment', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(2256, 'Specific Spares Forging Machine', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(2257, 'Specific Spares Mechanical Press', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(2258, 'Spares Specific SPM', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(2259, 'Specific Spares Robot', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(2260, 'Spares Specific Rolling Mill', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(2261, 'Spares Specific Air Compressor', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(2262, 'Spares Specific Pipe Bending Machine', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(2263, 'SPARES SPECIFIC PIPE CUTTING', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(2264, 'SPARES SPECIFIC INDUCTION HEATING FURNACE', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(2265, 'SPARES SPECIFIC SPINNING MACHINE', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(2266, 'SPARES SPECIFIC BOTTOM PRESS', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(2267, 'SPARES SPECIFIC NECK CUT AND DRILL CENTRE', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(2268, 'SPARES SPECIFIC HQT', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(2269, 'SPARES SPECIFIC CNC', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(2270, 'SPARES SPECIFIC HST/ALT', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(2271, 'SPARES SPECIFIC ISB', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(2272, 'Spares Specific Cooling Tower', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(2273, 'SPARES SPECIFIC ESB', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(2274, 'SPARES SPECIFIC DATA STAMPING', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(2275, 'SPARES SPECIFIC VL FITMENT', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(2276, 'SPARES SPECIFIC BOILER', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(2277, 'SPARES SPECIFIC HQT FURNACE', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(2278, 'SPARES SPECIFIC STP', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(2279, 'Spares Specific DG Set', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(2280, 'Spares Specific Stacker', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(2281, 'Spares Specific Fork Lift', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(2282, 'Spares Specific Welding Machines', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(2283, 'Spares Specific Over Head Crane', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(2284, 'WIP Axle LCV', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(2285, 'WIP Axle Agricultural Equipment', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(2286, 'Semi-Finished AL coated CTL Tubes', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(2287, 'Semi-Finished AL Longer Tubes', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(2288, 'Semi-Finished AL coated Slits', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(2289, 'Warranty Parts', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(2290, 'WIP Blank Semifinished', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(2291, 'WIP Blank Finished', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(2292, 'WIP Component', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(2293, 'WIP COIL SLIT', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(2294, 'WIP Exhaust System 2-Wheeler', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(2295, 'WIP Exhaust System HCV', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(2296, 'WIP Exhaust System LCV', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(2297, 'WIP Fastner Nuts', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(2298, 'WIP Fastner Screw', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(2299, 'WIP Fastner Pin', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(2300, 'WIP Fastner Bolts', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(2301, 'WIP Fastner Washer', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(2302, 'WIP Forging Forged', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(2303, 'WIP Forging Machined', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(2304, 'WIP Heavy Fabrication RAILWAY', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(2305, 'WIP Heavy Fabrication HCV', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(2306, 'Semi-Finished job work Longer Tubes', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(2307, 'WIP JOB WORK SLIT', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(2308, 'Semi-Finished job work CTL Tubes', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(2309, 'Semi-Finished MS CTL Tubes', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(2310, 'Semi-Finished MS Longer Tubes', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(2311, 'Semi-Finished MS Slits', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(2312, 'WIP Pipe/Tubular Assly.Fuel Neck Pipe', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(2313, 'WIP Pipe/Tubular Assly.Frame', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(2314, 'WIP Pipe/Tubular Assly.Material Handling Trolleys', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(2315, 'WIP PIPE LONGER', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(2316, 'WIP Pipe', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(2317, 'WIP PIPE CUT TO LENGTH', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(2318, 'WIP Rod', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(2319, 'WIP Sheet Metal Welded Assembly', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(2320, 'WIP Sheet Metal Component', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(2321, 'WIP Sheet Metal Skin Pannel', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(2322, 'WIP Sheet Metal Rolling Parts', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(2323, 'WIP Rim Assembly', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(2324, 'Semi-Finished Stainless Steel CTL Tubes', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(2325, 'Semi-Finished Stainless Steel Longer Tubes', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(2326, 'Semi-Finished Stainless Steel Slits', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(2327, 'WIP Tooling Dies', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(2328, 'WIP Tooling Fixture', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(2329, 'WIP Tooling Jigs', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(2330, 'WIP Tooling Panel Checker', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(2331, 'WIP Assly.', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(2332, 'WIP Others', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(2333, 'Customer Supplied Die', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(2334, 'Customer Supplied  Scrap', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(2335, 'Cust. Supplied Other', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(2336, 'Customer supplied Chasis', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(2337, 'Customer Supplied Fixture', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(2338, 'Customer Supplied Panel Checker', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(2339, 'Customer Supplied RM for Job Work', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(2340, 'Customer Supplied Component', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(2341, 'Customer Supplied Assly.', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(2342, 'Customer Supplied Consumables', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(2343, 'Customer Supplied  Pipes', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(2344, 'Customer Supplied Material(Sold)', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(2345, 'Capital  Furniture Table', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(2346, 'Capital  Furniture Almirah', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(2347, 'Capital  Furniture Chair', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(2348, 'Capital Furniture Others', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(2349, 'Capital  IT Equipment:Hardware', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(2350, 'Capital  IT Equipment:Software', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(2351, 'Capital  IT Equipment:Networking', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(2352, 'Capital  Canteen EquipmentUtensil', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(2353, 'Capital  Canteen EquipmentStove', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(2354, 'Capital  Canteen EquipmentRefrigerator', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(2355, 'Capital Canteen Equipment others', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(2356, 'Capital Loan Material', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(2357, 'Capital  Dies/Tools', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(2358, 'Capital  Jigs Drilling Jig', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(2359, 'Capital  Jigs Welding Jig', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(2360, 'Capital  Jigs Bending Jig', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(2361, 'Capital  Jigs Machining Jig', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(2362, 'Capital  Fixture Drilling Fixture', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(2363, 'Capital  Fixture Welding Fixture', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(2364, 'Capital  Fixture Bending Fixture', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(2365, 'Capital  Fixture Machining Fixture', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(2366, 'Capital Assembly/Clamp Fixture', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(2367, 'Capital  Pannel Checkers', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(2368, 'Capital  Manufacturing Equipment Welding Machine', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(2369, 'Capital  Manufacturing Equipment Power Press Machine', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(2370, 'Capital  Manufacturing Equipment Tubing Machinary', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(2371, 'Capital  Manufacturing Equipment Metal Cutting Machine', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(2372, 'Capital  Utilites', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(2373, 'Capital  Measuring Instrument', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(2374, 'Capital Hand Tools', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(2375, 'Capital Plating Machinary and Accessories', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(2376, 'Capital Painting Machine and Assecsories', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(2377, 'Capital  Building Material Cement', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(2378, 'Capital  Building Material Brick', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(2379, 'Capital  Building Material Tor Steel', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(2380, 'Capital  Building Material Stone Dust', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(2381, 'Capital  Building Material Sand', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(2382, 'Capital  Building Material Glass', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(2383, 'Capital  Building Material Struct. Steel', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(2384, 'Capital Building Material Others', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(2385, 'Capital Maintenance Assembly', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(2386, 'Capital Solar Power Generating System', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(2387, 'Capital Production Resource Tools', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(2388, 'Capital Material Handling Equipment', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(2389, 'Capital Vehicles', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(2390, 'Capital Machinary/Equipment Others', NULL, 1, '2022-09-15 16:10:15', '2022-09-15 16:10:15'),
(2391, 'Computer', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(2392, 'Laptops/Notebooks', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(2393, 'Internet Services', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(2394, 'Brass Hardware', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(2395, 'Brass Builders Hardware', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(2396, 'Brass Cable Gland', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(2397, 'Brass Fittings', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(2398, 'Brass Nuts &amp; Bolts', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(2399, 'Brass Terminals', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(2400, 'Services', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(2401, 'Construction', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(2402, 'Agriculture', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(2403, 'Spices &amp; Seasonings', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(2404, 'Energy &amp; Power', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(2405, 'Health', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13');
INSERT INTO `products` (`id`, `name`, `description`, `status`, `added_date`, `updated_date`) VALUES
(2406, 'Transport', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(2407, 'Industrial', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(2408, 'Furnishings', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(2409, 'Furniture &amp; Fixture', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(2410, 'Software', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(2411, 'Gifts Crafts', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(2412, 'Corporate &amp; Promotional Gifts', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(2413, 'Road Transportation Services', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(2414, 'Event Management Services', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(2415, 'Artificial Flowers &amp; Plants, Crafts', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(2416, 'Web Services', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(2417, 'Hospital', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(2418, 'Surgical Equipment', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(2419, 'Bearings', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(2420, 'Industrial Brushes', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(2421, 'Plastics', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(2422, 'Plastic Products', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(2423, 'Web &amp; Internet Services', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(2424, 'Education &amp; Training', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(2425, 'Fabricators', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(2426, 'Marble', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(2427, 'Doors Windows Accessories &amp; Fittings', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(2428, 'Building &amp; Construction Material &amp; Supplies', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(2429, 'Bricks &amp; Tiles', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(2430, 'Decorative Laminates', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(2431, 'Scaffolding', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(2432, 'Cement &amp; Sand', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(2433, 'Building Material', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(2434, 'Pipes &amp; Pipe Fittings', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(2435, 'Granite', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(2436, 'Flooring', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(2437, 'Prefabricated &amp; Portable Structure', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(2438, 'Timber, Timber Products &amp; Plank', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(2439, 'Building Ceramic', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(2440, 'Wallpaper', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(2441, 'Slotted Angles', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(2442, 'Bathroom &amp; Toilet Accessories/Fittings', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(2443, 'Building Coating', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(2444, 'Sanitaryware', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(2445, 'Sheet Metal', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(2446, 'Adhesives', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(2447, 'Motor Couplings', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(2448, 'Pvc Profiles', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(2449, 'Plywood', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(2450, 'Sandstone', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(2451, 'Lime &amp; Lime Products', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(2452, 'Gates &amp; Grills', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(2453, 'Doorbell', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(2454, 'Stone', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(2455, 'Acoustic &amp; Soundproof Materials', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(2456, 'Roofing Systems', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(2457, 'Waterproof Materials', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(2458, 'Contractors - Building', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(2459, 'Nozzles', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(2460, 'Building Glass', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(2461, 'Environment', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(2462, 'Water Treatment Plants', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(2463, 'Doors/Wooden Door Panels', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(2464, 'Curtain Fittings', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(2465, 'Hardware Components', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(2466, 'Food &amp; Beverage', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(2467, 'Beverages', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(2468, 'Slate', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(2469, 'Hospital Equipment', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(2470, 'Building Facilities', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(2471, 'Fountains', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(2472, 'Computer Stationery', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(2473, 'Heat Insulation', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(2474, 'Fireproof/Flameproof Materials', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(2475, 'Consultant', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(2476, 'Vinyl Flooring', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(2477, 'Wall Materials', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(2478, 'Construction Materials Stocks', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(2479, 'Battery &amp; Industrial Batteries', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(2480, 'Special Materials', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(2481, 'Agro Products &amp; Commodities', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(2482, 'Building Metallic Materials', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(2483, 'Electronics', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(2484, 'Cables Cable Accessories &amp; Conductors', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(2485, 'Mineral, Metals', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(2486, 'Steel &amp; Stainless Steel Products &amp; Components', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(2487, 'Building Plastic', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(2488, 'Diagnostic Equipment &amp; Supplies', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(2489, 'Machinery', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(2490, 'Machine Tools', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(2491, 'Chemical Machinery', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(2492, 'Textile/Garment Machinery', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(2493, 'Industrial Machinery &amp; Parts', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(2494, 'Machinery', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(2495, 'Packaging Machinery', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(2496, 'Textile Machinery Spares, Components &amp; Accessories', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(2497, 'Machinery &amp; Parts', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(2498, 'Tyres Repair &amp; Retreading Materials &amp; Machinery', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(2499, 'Weighing Machines', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(2500, 'Injection Moulding And Inject Moulding Machinery', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(2501, 'Bakers Equipment &amp; Supplies', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(2502, 'Flexo Printing Machinery', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(2503, 'Agriculture, Farm Machines &amp; Tools', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(2504, 'Cnc Machines', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(2505, 'Plastic Processing Machinery', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(2506, 'Jewelry Making Tools &amp; Machinery', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(2507, 'Sewing &amp; Knitting Machinery &amp; Components', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(2508, 'Construction Machinery', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(2509, 'Pharmaceutical Machinery', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(2510, 'Food Processing Machinery', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(2511, 'Diamond Cutting Tools &amp; Machines', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(2512, 'Earth Moving Equipment &amp; Machinery', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(2513, 'Paper, Paper Converting Machinery', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(2514, 'Steel Pipes &amp; Tubes', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(2515, 'Plant &amp; Machinery', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(2516, 'Soaps &amp; Detergent Plants', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(2517, 'Tea &amp; Coffee Machinery', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(2518, 'Printing Machinery', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(2519, 'Grinding  &amp; Milling Machinery', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(2520, 'Other Machinery', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(2521, 'Cement Plant Machinery', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(2522, 'Oil Mill Machinery', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(2523, 'Vending Machinery', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(2524, 'Polish &amp; Polishing Material/Machinery', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(2525, 'Granite Processing Machinery', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(2526, 'Clothing Related Machinery', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(2527, 'Bag Closing Machinery', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(2528, 'Industrial Gas Plants', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(2529, 'Processing Machines &amp; Equipment', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(2530, 'Box Making Machinery', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(2531, 'Mining, Exploration &amp; Drilling Machinery', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(2532, 'Dairy Equipment', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(2533, 'Labelling &amp; Sticker Machinery', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(2534, 'Steel Rolling Mills Machinery', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(2535, 'Lamination Machinery', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(2536, 'Warehouse Services', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(2537, 'Paper Printing &amp; Book Binding Machinery', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(2538, 'Sugar Machinery', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(2539, 'Laser Cutting Machines', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(2540, 'Wire Machinery', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(2541, 'Cables / Electrical Cable Machinery', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(2542, 'Polyurethane Foaming Machines', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(2543, 'Footwear Machinery', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(2544, 'Seed Processing Machinery', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(2545, 'Rubber Machinery', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(2546, 'Roll Forming Machinery', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(2547, 'Leather Machinery', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(2548, 'Hot Stamping Machinery', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(2549, 'Flour Mill Machinery &amp; Accessories', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(2550, 'Banking Automation Products', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(2551, 'Used Machinery', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(2552, 'Filter Machinery', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(2553, 'Biscuit Making Machinery', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(2554, 'Woodworking &amp; Machinery', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(2555, 'Rice Mill Machinery', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(2556, 'Jute Mill Machinery', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(2557, 'Glass Processing Machines', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(2558, 'Coil &amp; Wire Winding Machines', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(2559, 'Braiding Machinery', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(2560, 'Fuel Dispensing Machinery', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(2561, 'Paint Manufacturing Machinery', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(2562, 'Metallic Processing Machinery', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(2563, 'Coating Machine', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(2564, 'Hosiery Machinery', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(2565, 'Horticulture, Gardening &amp; Irrigation Machinery', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(2566, 'Road Construction Machinery', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(2567, 'Coir Machinery', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(2568, 'Rice Machinery', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(2569, 'Machinery Designing &amp; Processing', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(2570, 'Printing Ink Machinery', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(2571, 'Plywood Machinery', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(2572, 'Ice Cream Plant &amp; Machinery', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(2573, 'Dairy Products Machinery', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(2574, 'Starch And Starch Machinery', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(2575, 'Fishery Machinery', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(2576, 'Cotton &amp; Synthetic Spinners', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(2577, 'Electrical Cables Machinery', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(2578, 'Pu False Twister', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(2579, 'Dehydrated Food Products', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(2580, 'Mosaic Tiles Machinery', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(2581, 'Food Products', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(2582, 'Extruder', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(2583, 'Metallurgy Machinery', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(2584, 'Decorative Laminate Machinery', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(2585, 'Lamp Making Machinery', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(2586, 'Pressure Fingers', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(2587, 'Automobile', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(2588, 'Auto Accessories-Car Stereos', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(2589, 'Automobile', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(2590, 'Automotive Parts &amp; Components', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(2591, 'Automobile Filters', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(2592, 'Garage &amp; Service Station Equipment', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(2593, 'Auto Parts', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(2594, 'Automobile Accessories', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(2595, 'Sheet Metal Components', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(2596, 'Trailers &amp; Trolleys', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(2597, 'Automobile-Head Lamps', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(2598, 'Piston &amp; Piston Rings', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(2599, 'Precision Auto Turned Parts &amp; Components', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(2600, 'Chemicals', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(2601, 'Resin', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(2602, 'Auto Maintenance', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(2603, 'Fuel Injection Systems/Pipes', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(2604, 'Tyres &amp; Tubes', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(2605, 'Automobile Electrical Spares', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(2606, 'Motorcycles, Scooters &amp; Two Wheeler Parts', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(2607, 'Brakes &amp; Clutches', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(2608, 'Used Engines &amp; Spares', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(2609, 'Shock Absorbers', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(2610, 'Automotive Chains &amp; Sprockets', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(2611, 'Taxi Meters', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(2612, 'Parking', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(2613, 'Special Transportation Equipment', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(2614, 'Three Wheeler &amp; Parts', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(2615, 'Hotel Supplies', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(2616, 'Hotel Equipment', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(2617, 'Others', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(2618, 'Medicine &amp; Health Products', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(2619, 'Shipping Services', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(2620, 'Security', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(2621, 'Access Control System', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(2622, 'Chemical Supplies', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(2623, 'Industrial Chemicals', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(2624, 'Flavours &amp; Food Additives', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(2625, 'Polymers', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(2626, 'Fertilizer', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(2627, 'Rubber - Natural', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(2628, 'Industrial Gases', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(2629, 'Rubber &amp; Rubber Products', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(2630, 'Gum &amp; Gum Products', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(2631, 'Coatings-Powder Coating Chemicals', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(2632, 'Lab Supplies Chemicals', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(2633, 'Pvc Resins', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(2634, 'Dyes', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(2635, 'Pharmaceutical Chemicals', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(2636, 'Leather', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(2637, 'Foam,Rexine &amp; P.U.Products', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(2638, 'Chemicals-Additives', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(2639, 'Fine Chemicals', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(2640, 'Active Carbon', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(2641, 'Wax &amp; Wax Products', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(2642, 'Paint &amp; Allied Products', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(2643, 'Acid', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(2644, 'Pvc Profiles', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(2645, 'Dyes &amp; Dyes Intermediates', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(2646, 'Pigments', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(2647, 'Solvents', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(2648, 'Adhesives &amp; Sealants', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(2649, 'Pharmaceutical Raw Material', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(2650, 'Paper', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(2651, 'Silicon Products', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(2652, 'Chemical Processing Plants', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(2653, 'Pu/Pvc Synthetic Leather', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(2654, 'Textile Chemicals', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(2655, 'Agrochemicals', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(2656, 'Salt', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(2657, 'Dyestuffs', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(2658, 'Chemicals - Rubber', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(2659, 'Chemicals Stocks', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(2660, 'Dyes-Natural Color', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(2661, 'Silica Gel', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(2662, 'Sulphur', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(2663, 'Explosive', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(2664, 'Corrosion Protection Materials', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(2665, 'X-Ray', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(2666, 'Rubber Synthetic', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(2667, 'Rubber Transmission Belting', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(2668, 'Chemicals Agents', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(2669, 'Chemical Reagent', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(2670, 'Printing Oil', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(2671, 'Fine Chemicals All', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(2672, 'Polyethylene Foam Films', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(2673, 'Bakery Equipment', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(2674, 'Glue &amp; Gelatin', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(2675, 'Agrochemicals &amp; Pesticides', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(2676, 'Home Furnishings', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(2677, 'Fiberglass Products', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(2678, 'Tour &amp; Travel', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(2679, 'Fodder Additives', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(2680, 'Inverters &amp; Ups Equipment', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(2681, 'Consumer Electronics &amp; Electronic Goods', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(2682, 'Control Panel Boards', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(2683, 'Electronic Products &amp; Components', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(2684, 'Relays', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(2685, 'Diesel Generator Sets', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(2686, 'Electrical Goods, Equipment &amp; Supplies', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(2687, 'Voltage Stabilizers', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(2688, 'Water Softener &amp; Purifier', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(2689, 'Chargers', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(2690, 'Transformers', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(2691, 'Water Heater', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(2692, 'Switches', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(2693, 'Electronic Liquid Level Controllers &amp; Indicators', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(2694, 'Fan', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(2695, 'Laser', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(2696, 'Switchgear &amp; Allied Products', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(2697, 'Wires/Cables &amp; Accessories', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(2698, 'Cable Terminal, Lugs &amp; Socket', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(2699, 'Electric Motors &amp; Engines', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(2700, 'Air-Conditioning &amp; Equipment', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(2701, 'Speaker', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(2702, 'Electric Power Tools', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(2703, 'Cables/Cable Accessories &amp;  Conductors', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(2704, 'Heaters', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(2705, 'Capacitors', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(2706, 'Circuit Breaker', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(2707, 'Electronic Testing Equipment', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(2708, 'Generator Sets &amp; Its Spares', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(2709, 'Microwave Oven', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(2710, 'Circuit Boards', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(2711, 'Electronic Instrument', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(2712, 'Audio &amp; Video Products', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(2713, 'Dehumidifier', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(2714, 'Electrical Transmission Line Goods', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(2715, 'Power Transmission Equipment', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(2716, 'Blank Records &amp; Tapes', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(2717, 'Audio, Video, Visual Products &amp; Equipments', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(2718, 'Electro Stampings', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(2719, 'Power Supplies', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(2720, 'Dc Power Supplies', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(2721, 'Sensors', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(2722, 'Electronic Data Systems', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(2723, 'Insulation Material', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(2724, 'Tv Picture Tubes', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(2725, 'Refrigerator', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(2726, 'Ups Equipment', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(2727, 'Household Products', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(2728, 'Hair Drier', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(2729, 'Vacuum Cleaner', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(2730, 'Others', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(2731, 'Electro Magnets', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(2732, 'Stainless Steel Wires &amp; Cables', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(2733, 'Electrical Testing &amp; Measuring Equipment', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(2734, 'Dvd, Vcd,Vcr', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(2735, 'Rectifiers', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(2736, 'Semiconductors', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(2737, 'Turbine', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(2738, 'Cable Trays', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(2739, 'Audio Visual Equipment', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(2740, 'Radio &amp; Tv Equipment', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(2741, 'Television', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(2742, 'Juicer', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(2743, 'Oil &amp; Lubricants', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(2744, 'Public Address Systems', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(2745, 'Mixer', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(2746, 'Power, Power Cable Accessories', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(2747, 'Dish Washer', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(2748, 'Iron', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(2749, 'Electrical Engineering', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(2750, 'Radio', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(2751, 'Calculator', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(2752, 'Washing Machine', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(2753, 'Rice Cooker', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(2754, 'Moulded Components', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(2755, 'Timer', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(2756, 'Wire-Resistance &amp; Heating', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(2757, 'Coffee Maker', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(2758, 'Oxygen Setup', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(2759, 'Water Dispenser', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(2760, 'Welding Generators', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(2761, 'Remote Control', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(2762, 'Jacks', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(2763, 'Others', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(2764, 'Humidifier', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(2765, 'Commercial Kitchen Equipment', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(2766, 'Electrical Outlets', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(2767, 'Diamonds', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(2768, 'Wooden / Stone Carvings', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(2769, 'Brushes - Industrial &amp; Paint', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(2770, 'Dies,Jigs,Fixtures', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(2771, 'Packaging', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(2772, 'Packaging Materials', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(2773, 'Gifts Articles', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(2774, 'Forged Products &amp; Equipment', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(2775, 'Scrap', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(2776, 'Boilers, Components &amp; Spares', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(2777, 'Filters-Air, Gas, Liquid', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(2778, 'Moulds', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(2779, 'Metal Mineral', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(2780, 'Compressors &amp; Allied Equipment', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(2781, 'Ferrous &amp; Non-Ferrous  Metal', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(2782, 'Nuts &amp; Bolts', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(2783, 'Iron &amp; Steel', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(2784, 'Crafts Gifts', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(2785, 'Bellows &amp; Expansion Joints', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(2786, 'Incense &amp; Agarbatti', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(2787, 'Industrial Supplies-General', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(2788, 'CNC Machine, Components', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(2789, 'Gases', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(2790, 'Engineering Goods &amp; Equipment', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(2791, 'Cast Products &amp; Equipment', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(2792, 'Candles &amp; Holders', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(2793, 'Material Handling Equipment', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(2794, 'Steel Components', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(2795, 'Gaskets &amp; Seals', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(2796, 'Cooling Tower &amp; Chilling Plants', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(2797, 'Labels, Stickers &amp; Tags', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(2798, 'Gear Boxes, Reduction Gears &amp; Gear Cutting', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(2799, 'Boxes', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(2800, 'Minerals &amp; Refractories', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(2801, 'Valves', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(2802, 'Metal Products &amp; Powder', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(2803, 'Handicrafts', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(2804, 'Wall Hangings', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(2805, 'Aluminium &amp; Foils', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(2806, 'Bullion-Gold &amp; Silver', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(2807, 'Plastic &amp; Paper Bags', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(2808, 'Cutting Tools, Broaches &amp; Cutters', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(2809, 'Packaging,Printing Projects', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(2810, 'Ci Castings', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(2811, 'Refrigeration &amp; Equipment', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(2812, 'Fasteners', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(2813, 'Scientific Instruments', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(2814, 'Glass &amp; Glassware', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(2815, 'Laboratory Glassware &amp; Equipment', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(2816, 'Measurement &amp; Meter', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(2817, 'Pressed Components', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(2818, 'Brassware &amp; Brass Handicrafts', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(2819, 'Pumps &amp; Pumping Equipment', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(2820, 'Bag - Plastic &amp; Paper', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(2821, 'Paper Products', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(2822, 'Iron &amp; Steel Castings', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(2823, 'Hoses', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(2824, 'Holiday &amp; Christmas Decorations', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(2825, 'Conveyor &amp; Conveyor/Industrial Belts', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(2826, 'Carbon &amp; Graphite Products', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(2827, 'Bottle Caps', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(2828, 'Pvc &amp; Hdpe Pipes', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(2829, 'Pressure Vessels', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(2830, 'Ball &amp; Roller Bearings / Bushes', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(2831, 'Industrial Ovens', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(2832, 'Paper &amp; Pulp', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(2833, 'Glass &amp; Glass Products', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(2834, 'Handmade Paper &amp; Products', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(2835, 'Decorative Items', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(2836, 'Paintings &amp; Sculpture', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(2837, 'Tubes &amp; Tube Fittings', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(2838, 'Energy Saving &amp; Energy Management', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(2839, 'Tapes', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(2840, 'Instrumentation', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(2841, 'Tapes-Self Adhesive', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(2842, 'Lamination Material', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(2843, 'Heat Exchangers', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(2844, 'Hardware &amp; Tools', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(2845, 'Antiques, Collectables &amp; Antique Handicrafts', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(2846, 'Industrial Tools', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(2847, 'Die Castings', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(2848, 'Investment Castings', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(2849, 'Pneumatic Products &amp; Tools', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(2850, 'Gauges &amp; Gauge Glasses', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(2851, 'Magnets &amp; Magnetic Devices', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(2852, 'Copper Products', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(2853, 'Diaries &amp; Calendars', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(2854, 'Tin Containers', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(2855, 'Shaft, Shaft Collars &amp; Bright Bars', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(2856, 'Welding Electrodes, Machinery &amp; Equipment', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(2857, 'Brass, Brass Products &amp; Brass Builders Hardware', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(2858, 'Abrasives', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(2859, 'Heating Elements', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(2860, 'Hand &amp; Allied Tools', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(2861, 'Wire Cloth &amp; Wire Mesh', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(2862, 'Ferroalloy &amp; Products', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(2863, 'Dies &amp; Moulds', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(2864, 'Hydraulic Products &amp; Equipment', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(2865, 'Testing &amp; Measuring Instruments', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(2866, 'Machine Tools Accessories', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(2867, 'Springs &amp; Coils', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(2868, 'Survey, Meteorological Instruments &amp; Equipment', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(2869, 'Furnace Manufacturers', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(2870, 'Air Dryers', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(2871, 'Acrylic Sheets', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(2872, 'Flags', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(2873, 'Industrial Cylinders', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(2874, 'Process Control Equipment &amp; Instruments', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(2875, 'Diesel Engine &amp; Electric Locomotive Spares', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(2876, 'Metals &amp; Alloys', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(2877, 'Storage Systems', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(2878, 'Bottles', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(2879, 'Filter Cloth, Filter Industrial', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(2880, 'Draught Fan', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(2881, 'Lead &amp; Articles Thereof', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(2882, 'Ingot', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(2883, 'Industrial Automation', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(2884, 'Radiators', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(2885, 'Aerosols', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(2886, 'Flexible Metal/Hydraulic Hoses', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(2887, 'Marking Systems', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(2888, 'Chains &amp; Chain Link Fence Fittings', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(2889, 'Cleaning Equipment', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(2890, 'Sculptures', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(2891, 'Polyester Films', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(2892, 'Pp &amp; Hdpe Sacks', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(2893, 'Paper-Newsprint', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(2894, 'Smoking Pipes &amp; Accessories', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(2895, 'Air-Compressing &amp; Air-Separation', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(2896, 'Pvc Products', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(2897, 'Mica', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(2898, 'Industrial Clothing', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(2899, 'Camphor', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(2900, 'Handcrafted Furniture', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(2901, 'Ceramics', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(2902, 'Electroplating Metal &amp; Equipment &amp; Chemicals', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(2903, 'Carving Crafts', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(2904, 'Packaging Bags', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(2905, 'Sandalwood Products &amp; Artifacts', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(2906, 'Paper Crafts', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(2907, 'Springwashers', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(2908, 'Horticulture &amp; Garden Tools', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(2909, 'Coupling &amp; Pulley', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(2910, 'Departmental Shelving', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(2911, 'Non-Ferrous Metal Products', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(2912, 'Basketry', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(2913, 'Industrial Brakes &amp; Clutches', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(2914, 'Pallets &amp; Skids', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(2915, 'Holograms &amp; Holographic Films', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(2916, 'Castor Wheels', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(2917, 'Burners/Industrial Burners &amp; Incinerators', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(2918, 'Wire Ropes', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(2919, 'Asbestos &amp; Asbestos Products', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(2920, 'V-Belts', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(2921, 'Water Coolers', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(2922, 'Welding &amp; Solders', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(2923, 'Mechanical Seals', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(2924, 'Pottery &amp; Enamel', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(2925, 'Engineering - Plastics', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(2926, 'Air Cooler', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(2927, 'Diamonds-Polished', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(2928, 'Bearings &amp; Its Hardware', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(2929, 'Laundry Equipment', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(2930, 'Clips, Clamps', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(2931, 'Antique Imitation Crafts', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(2932, 'Humidification &amp; Ventilation Equipments', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(2933, 'Centrifuges', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(2934, 'Needles', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(2935, 'Base Metals &amp; Articles Thereof', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(2936, 'Crystal', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(2937, 'Filtration &amp; Sedimentation Units', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(2938, 'Clay Figurine', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(2939, 'Grating Manufacturers', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(2940, 'Paper-Thermal', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(2941, 'Steel Balls', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(2942, 'Vacuum Equipment &amp; System', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(2943, 'Filter Cartridge', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(2944, 'Painting Equipments &amp; Maintenance', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(2945, 'Ultrasonic Equipment', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(2946, 'Perforated Sheets', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(2947, 'Religious Crafts', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(2948, 'Tungsten Carbide', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(2949, 'Thermostatic Bimetals &amp; Thermostats', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(2950, 'Drugs &amp; Medications', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(2951, 'Foundry Raw Material &amp; Equipment', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(2952, 'Hoses-Pvc', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(2953, 'Shellac &amp; Lac Products', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(2954, 'Soapstone Products', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(2955, 'Capital Goods', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(2956, 'Zinc &amp; Its Articles', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(2957, 'Flat Metal Processing Equipment', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(2958, 'Combustion Equipments', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(2959, 'Anti-Vibration Mountings', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(2960, 'Builders, Contractors &amp; Property Developers', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(2961, 'Papier Machie', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(2962, 'Industrial Explosives', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(2963, 'Brass Components', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(2964, 'Natural Crafts', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(2965, 'Thermocouples', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(2966, 'Thermacol', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(2967, 'Rubber Seals', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(2968, 'Steel Re-Rollers', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(2969, 'Non-Ferrous Metal  Alloy', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(2970, 'Fork Lift Truck Parts', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(2971, 'Pulverizers', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(2972, 'Industrial Knives', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(2973, 'Ballast Making Machines', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(2974, 'Nautical Gifts &amp; Crafts', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(2975, 'Cork &amp; Its Products', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(2976, 'Fork Lift Trucks', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(2977, 'Synthetic Industrial Diamonds', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(2978, 'Paper &amp; Paper Products', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(2979, 'Plastic Crafts', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(2980, 'Metallised Capacitor Films', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(2981, 'Non-Metallic Mineral Products', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(2982, 'Commercial Service', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(2983, 'Surface Finishing Equipment &amp; Services', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(2984, 'Model Making', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(2985, 'Packaging Product Stocks', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(2986, 'Bristles', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13');
INSERT INTO `products` (`id`, `name`, `description`, `status`, `added_date`, `updated_date`) VALUES
(2987, 'Sintered Bushes &amp; Parts', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(2988, 'Restaurant Equipment', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(2989, 'Party Goods', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(2990, 'Textiles', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(2991, 'Felt &amp; Felt Products', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(2992, 'Denim Fabrics', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(2993, 'Corduroy &amp; Velvet Fabrics', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(2994, 'Finished Leather', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(2995, 'Embroidery &amp; Embroiders', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(2996, 'Blend Fabrics', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(2997, 'Carpets - Hand Tufted', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(2998, 'Fabrics', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(2999, 'Grey Fabrics', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3000, 'Carpets, Rugs, Mats &amp; Durries', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3001, 'Cotton Fabrics', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3002, 'Leather Products', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3003, 'Leather Products', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3004, 'Saddlery &amp; Harness Goods', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3005, 'Quilts', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3006, 'Textile Accessories', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3007, 'Yarn', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3008, 'Textiles', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3009, 'Handlooms', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3010, 'Pillows', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3011, 'Computer &amp; Software Agents', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3012, 'Others', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3013, 'Tents &amp; Tarpaulins', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3014, 'Blankets', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3015, 'Pvc  Leather Cloth', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3016, 'Tassels &amp; Trimmings', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3017, 'Linen', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3018, 'Fibres', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3019, 'Non-Woven Fabrics', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3020, 'Silk, Silk Fabric', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3021, 'Threads', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3022, 'Export Fabrics', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3023, 'Rope,Twines &amp; Webbings', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3024, 'Knitted Fabrics', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3025, 'Fibres - Synthetic', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3026, 'Pet Animal Products', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3027, 'Flocked Fabric', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3028, 'Raw Silk Yarn', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3029, 'Zari &amp; Glitter Products', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3030, 'Handkerchiefs', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3031, 'Textile Agents', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3032, 'Poultry/Cattle Feed Supplements', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3033, 'Textiles Auxiliaries', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3034, 'Textile Testing Equipment', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3035, 'Polyester Yarn', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3036, 'Textile &amp; Textile Articles', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3037, 'Chemical Fabrics', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3038, 'Handwoven Textiles', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3039, 'Wool Fabrics', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3040, 'Textile Stocks', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3041, 'Leather Strings', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3042, 'Leather Accessories', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3043, 'Ups &amp; Power Supply', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3044, 'Peripherals', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3045, 'Scanners &amp; Scanning Devices', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3046, 'Multimedia', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3047, 'Computer', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3048, 'Server &amp; Workstation', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3049, 'Computer Networking', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3050, 'Pda', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3051, 'Monitors', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3052, 'Second Hand', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3053, 'Network Engineering', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3054, 'Jewelry &amp; Gem', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3055, 'Diamond Jewelry', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3056, 'Fashion/Imitation / Artificial/Costume Jewelry', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3057, 'Silver Jewelry', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3058, 'Jewelry', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3059, 'Gems &amp; Jewelry', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3060, 'Jewelry Boxes', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3061, 'Costume Jewelry', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3062, 'Jewelry Making Tools &amp; Machinery', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3063, 'Jewelry &amp; Imitation', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3064, 'Jewelry - Costume', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3065, 'Cargo Agents', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3066, 'Clearing &amp; Forwarding Agents', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3067, 'Freight Forwarders &amp; Brokers', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3068, 'Shipping Agents', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3069, 'Service provider', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3070, 'Pesticides', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3071, 'Agriculture &amp; By-Product Agents', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3072, 'Ac Drives', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3073, 'Ac Motors,Dc Motors', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3074, 'Acsr Conductors', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3075, 'Activated Alumina', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3076, 'Actuators', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3077, 'Adapters', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3078, 'Additives', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3079, 'Adhesive Tapes - Industrial Electrical', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3080, 'Adhesive Tapes - Surgical', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3081, 'Adhesive Tapes For Packaging', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3082, 'Adhesives,Abrasives', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3083, 'Advertising', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3084, 'Printing, Publishing', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3085, 'Advertising Materials', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3086, 'Aero Engines &amp; Aircraft Components', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3087, 'Aerosols', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3088, 'Agitators', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3089, 'Agricultural Equipments', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3090, 'Agricultural Implements', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3091, 'Noodles', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3092, 'Agriculture Product Stocks', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3093, 'Agro &amp; Agro Based Products &amp; Commodities', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3094, 'Agro Chemicals', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3095, 'Air Blowers', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3096, 'Air Cleaning Equipment', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3097, 'Air Compressor Spares', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3098, 'Air Curtains', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3099, 'Air Filters', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3100, 'Air Freshners', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3101, 'Air Handling System', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3102, 'Air Pollution Control Equipments', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3103, 'Alarm', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3104, 'Alkyd Resins', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3105, 'Alloy Castings', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3106, 'Alloy Steel Castings', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3107, 'Alloy Steel Dealers', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3108, 'Aluminium Alloy Castings', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3109, 'Aluminium Building Products', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3110, 'Aluminium Cans', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3111, 'Aluminium Caps', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3112, 'Aluminium Castings', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3113, 'Aluminium Chloride', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3114, 'Aluminium Collapsible Tubes', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3115, 'Aluminium Containers', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3116, 'Aluminium Die Castings', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3117, 'Aluminium Doors', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3118, 'Aluminium Extrusion Profiles &amp; Sections', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3119, 'Aluminium Foils', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3120, 'Aluminium Furniture', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3121, 'Aluminium Ingots', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3122, 'Aluminium Products', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3123, 'Aluminium Rolling Mills', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3124, 'Aluminium Sheets', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3125, 'Aluminium Sulphate', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3126, 'Aluminium Tubes', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3127, 'Home Supplies', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3128, 'Aluminium Utensils', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3129, 'Aluminium Windows', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3130, 'Aluminium Wires', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3131, 'Amine', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3132, 'Ammonium Bifluoride', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3133, 'Ammonium Chloride', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3134, 'Sports', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3135, 'Amusement Games &amp; Equipments', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3136, 'Scientific', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3137, 'Analysers', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3138, 'Analytical Instruments', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3139, 'Analytical Testing Laboratories', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3140, 'Animal Fodders', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3141, 'Animal Products', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3142, 'Animal Sheep Casings', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3143, 'Anodising', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3144, 'Anti Corrosive Chemicals', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3145, 'Anti Vibration Mountings', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3146, 'Apparel', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3147, 'Apparel &amp; Fashion Agents', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3148, 'Apparel Stocks', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3149, 'Aquaculture Equipment &amp; Supplies', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3150, 'Aquatic Products', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3151, 'Aroma Chemicals', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3152, 'Artificial Crafts', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3153, 'Athletic Wear', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3154, 'Auto Accessories', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3155, 'Ayurvedic Medicines &amp; Products', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3156, 'Baby &amp; Infant Products', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3157, 'Badges &amp; Emblems', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3158, 'Bag Making Machinery', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3159, 'Bags &amp; Cases', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3160, 'Bags &amp; Luggage - Cotton/Canvas/Synthetic', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3161, 'Bags &amp; Luggage - Leather', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3162, 'Ball Valves', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3163, 'Balloons', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3164, 'Bamboo &amp; Rattan Products', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3165, 'Bar Coded Stickers &amp; Equipment', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3166, 'Batteries', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3167, 'Telecomm', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3168, 'Telecommunication Equipments', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3169, 'Battery And Battery Management Systems', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3170, 'Beachwear', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3171, 'Beads', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3172, 'Others', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3173, 'Export Promotion Councils', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3174, 'Beauty Equipment &amp; Products', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3175, 'Bed Linen', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3176, 'Bedding', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3177, 'Bedspreads', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3178, 'Bicycles, Components &amp; Spares', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3179, 'Blankets', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3180, 'Boats &amp; Ships', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3181, 'Bolts', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3182, 'Book Publishers', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3183, 'Bopp Films', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3184, 'Bridal Wear', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3185, 'Bright Bars', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3186, 'Broker / Agent', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3187, 'Bulbs &amp; Tubes', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3188, 'Bulk Drug Intermediates', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3189, 'Bulk Drugs', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3190, 'Bus Body Parts &amp; Spares', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3191, 'Valve', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3192, 'Buttons', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3193, 'Buying Agents', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3194, 'Children Clothing', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3195, 'C.I.Castings', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3196, 'C.I.Castings,S.G.Iron Casting,Graded Casting', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3197, 'Others', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3198, 'Cables', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3199, 'Canned Food', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3200, 'Carpets', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3201, 'Castor Oil', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3202, 'Cds, Records &amp; Tapes', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3203, 'Ceremonial Dress', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3204, 'Charcoal', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3205, 'Childrenwear &amp; Baby Garments', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3206, 'Coal &amp; Coke', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3207, 'Confectionery &amp; Bakery Products', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3208, 'Consumer Goods', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3209, 'Containers', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3210, 'Contraceptives &amp; Condoms', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3211, 'Control Valves', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3212, 'Cookware', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3213, 'Corrugated Boxes', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3214, 'Cosmetic Accessories', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3215, 'Cosmetics', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3216, 'Cotton Yarn', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3217, 'Cranes', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3218, 'Crockery', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3219, 'Curtain Fabric', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3220, 'Cushion Covers', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3221, 'Dairy Products', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3222, 'Data Loggers', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3223, 'Denim Wear', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3224, 'Trade Associations', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3225, 'Dental Equipment', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3226, 'Disposable Products', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3227, 'Dummies &amp; Mannequins', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3228, 'Edible Oil', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3229, 'Edible Salt', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3230, 'Office &amp; School', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3231, 'Educational Aids', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3232, 'Educational Toys &amp; Games', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3233, 'Egg Products', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3234, 'Electrical / Lighting Products &amp; Components', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3235, 'Electrical Toys', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3236, 'Electronic Signs', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3237, 'Elevators &amp; Funicular Cars', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3238, 'Emergency Lights', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3239, 'Emulsifiers', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3240, 'Energy Conservation Products', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3241, 'Environment Product Agents', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3242, 'Enzyme (Ferment) Preparations', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3243, 'Eot Cranes', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3244, 'Essential Oils &amp; Aromatics', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3245, 'Ethnic Garment', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3246, 'Fashion &amp; Garment Accessories', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3247, 'Fax Machines', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3248, 'Finished Leather', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3249, 'Fire-Fighting &amp; Fire Protection Equipment', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3250, 'Others', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3251, 'Fireworks &amp; Crackers', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3252, 'Fishing, Fishing Nets &amp; Equipment', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3253, 'Pipes &amp; Fittings', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3254, 'Flanges', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3255, 'Frozen, Processed Food &amp; Meat', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3256, 'Fruit', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3257, 'Fruit &amp; Vegetables(Fresh, Processed &amp; Dry)', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3258, 'Fuel Oil', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3259, 'Games', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3260, 'Garden Accessories', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3261, 'Gaskets', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3262, 'Gloves &amp; Mittens', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3263, 'Gps', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3264, 'Grain', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3265, 'Handmade Paper', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3266, 'Hangers', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3267, 'Health Equipment', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3268, 'Health Food', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3269, 'Hearing Aid', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3270, 'Consumer', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3271, 'Heaters', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3272, 'Helmets', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3273, 'Henna &amp; Henna Products', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3274, 'Herb Medicine', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3275, 'Herbal &amp; Botanical Products', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3276, 'Human Resource Services', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3277, 'Herbicides', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3278, 'Herbs &amp; Natural Remedies', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3279, 'Home Appliances', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3280, 'Home Cleaning', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3281, 'Home Supplies Stocks', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3282, 'Homeopathic Medicines', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3283, 'Homoeopathic Medicines', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3284, 'Honey Products', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3285, 'Hosiery Goods', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3286, 'Hospital Furniture', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3287, 'Hotel Supplies &amp; Equipment', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3288, 'Household Products', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3289, 'Household Utensils', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3290, 'Housekeeping Products', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3291, 'Human Hair Accessories', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3292, 'Hydraulic Valves', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3293, 'Hygiene And Healthcare Products', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3294, 'Indoor Games', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3295, 'Industrial Garment', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3296, 'Hotel &amp; Restaurants', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3297, 'Industrial Valves', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3298, 'Infant Garment', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3299, 'Injection Moulding', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3300, 'Inorganic Salt', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3301, 'Insecticides', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3302, 'Jacket', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3303, 'Jeans', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3304, 'Jute Bags', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3305, 'Jute Products', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3306, 'Kitchen &amp; Canteen Accessories &amp; Equipment', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3307, 'Kitchen Appliances', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3308, 'Kitchenware', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3309, 'Knitwear &amp; Knitted Fabrics', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3310, 'Ladders', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3311, 'Lamps &amp; Lampshades', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3312, 'Leather Chemicals', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3313, 'Leather Garment', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3314, 'Leather Goods &amp; Accessories', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3315, 'Leather Raw Materials', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3316, 'Lighters &amp; Smoking', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3317, 'Liquid Filling Machines', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3318, 'Liquor &amp; Beverages', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3319, 'Locks', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3320, 'Lpg Equipment', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3321, 'Luggage &amp; Bags Components &amp; Accessories', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3322, 'Lungis', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3323, 'Made-Ups', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3324, 'Magazines', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3325, 'Management Consulting', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3326, 'Manpower &amp; Labor Export', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3327, 'Marine Equipment', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3328, 'Marine Products', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3329, 'Mattress', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3330, 'Meat &amp; Poultry', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3331, 'Medical / Surgical Instruments &amp; Apparatus', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3332, 'Medical Equipment', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3333, 'Medical, Diagnostic &amp; Hospital Supplies', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3334, 'Menswear', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3335, 'Merchant Exporters', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3336, 'Microscope', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3337, 'Military &amp; Defence Supplies', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3338, 'Mobile Phones &amp; Accessories', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3339, 'Mosquito Repellents', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3340, 'Mushroom &amp; Truffle', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3341, 'Musical Instrument', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3342, 'Name Plates', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3343, 'Network Communications', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3344, 'Newspaper', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3345, 'Non Woven Fabric', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3346, 'Nuts', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3347, 'Office Equipment &amp; Supplies', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3348, 'Office Furniture', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3349, 'Oil &amp; Gas Field Equipment', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3350, 'Ophthalmic Devices &amp; Solutions', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3351, 'Ophthalmic Instruments', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3352, 'Optical Goods &amp; Sunglasses', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3353, 'Petroleum &amp; Products', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3354, 'Others', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3355, 'Digital Printing', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3356, 'Packaging &amp; Printing Service', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3357, 'Packers &amp; Movers', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3358, 'Pan Masala', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3359, 'Pants, Trousers &amp; Bottomwear', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3360, 'Paper &amp; Paper Boards', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3361, 'Paper Bags', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3362, 'Pareos &amp; Sarongs', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3363, 'Pearls &amp; Natural Pearls', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3364, 'Perfumes &amp; Fragrances', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3365, 'Personal Safety Equipment', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3366, 'Pest Control', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3367, 'Petrochemical Products', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3368, 'Petroleum Products', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3369, 'Pharmaceutical Capsules-Empty &amp; Gelatin', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3370, 'Pharmaceutical Formulations', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3371, 'Phone Cards', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3372, 'Pickles &amp; Murabba', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3373, 'Plant &amp; Animal Oil', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3374, 'Plant Extract', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3375, 'Seeds', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3376, 'Plant, Flowers &amp; Dried Flowers', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3377, 'Plastic Bags', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3378, 'Plastic Moulding', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3379, 'Plastic Pet Products', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3380, 'Plastic Raw Material', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3381, 'Plastic Sealing Devices', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3382, 'Plastic Sheets', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3383, 'Plastic Toys', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3384, 'Plasticizer', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3385, 'Plastic-Scrap', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3386, 'Playground Equipment', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3387, 'Playing Cards', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3388, 'Pollution Control &amp; Monitoring Equipment', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3389, 'Postage Products', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3390, 'Poultry Equipment', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3391, 'Precious &amp; Semi Precious Stones', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3392, 'Pressure Cookers', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3393, 'Pressure Gauges', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3394, 'Printers &amp; Binders', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3395, 'Printing Ink &amp; Paint Raw Material', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3396, 'Printing Material', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3397, 'Pulleys', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3398, 'Pulses', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3399, 'Railway Components', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3400, 'Raw Cotton &amp; Cotton Waste', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3401, 'Rayon', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3402, 'Readymade Garments', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3403, 'Rice', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3404, 'Rolling Mill Machinery', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3405, 'Rolling Shutters', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3406, 'Rubber Chemicals', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3407, 'Saddlery &amp; Harness Goods', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3408, 'Sand Castings', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3409, 'Sarees', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3410, 'Scarves, Stoles, Pareos &amp;  Made-Ups', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3411, 'Screws', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3412, 'Seafood', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3413, 'Security Equipment', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3414, 'Security Fencing', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3415, 'Sequin Garments', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3416, 'Shawls, Sweaters', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3417, 'Sheet Metal Pressed Components', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3418, 'Shirts', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3419, 'Shoes Components &amp; Accessories', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3420, 'Shoes/Footwear &amp; Uppers', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3421, 'Shorts', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3422, 'Silk Garment', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3423, 'Silverware', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3424, 'Skirts &amp; Dresses', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3425, 'Socks &amp; Stockings', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3426, 'Solar Products &amp; Equipment', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3427, 'Special Purpose Machines', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3428, 'Spinning Machinery', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3429, 'Sports Goods', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3430, 'Stainless Steel Utensils', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3431, 'Stationery', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3432, 'Stove Burners', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3433, 'Stuffed Toys', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3434, 'Sugar', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3435, 'Suits &amp; Tuxedo', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3436, 'Surgical Dressings &amp; Disposable', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3437, 'Surgical Instruments', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3438, 'Surveillance Equipment', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3439, 'Sweets &amp; Namkeen', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3440, 'Switchboard', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3441, 'Synthetic Fabrics', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3442, 'Synthetic Rubber', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3443, 'Table Cloths And Runners', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3444, 'Tableware &amp; Cutlery', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3445, 'Tea &amp; Coffee', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3446, 'Telecom Parts', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3447, 'Telecommunication Cables &amp; Equipment', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3448, 'Telephones, Video Phones', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3449, 'Terry Towels', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3450, 'Textile Machinery', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3451, 'Textile Waste', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3452, 'Thermoware', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3453, 'Towels', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3454, 'Toy &amp; Games', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3455, 'T-Shirts', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3456, 'Umbrella &amp; Rainwear', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3457, 'Undergarments', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3458, 'Uniforms &amp; Workwear', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3459, 'Used Clothing', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3460, 'Velvet Textile Materials', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3461, 'Veterinary Medicine', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3462, 'Waste Management', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3463, 'Waste Paper', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3464, 'Watches &amp; Clocks', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3465, 'Water Heater', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3466, 'Water Softener &amp; Purifier', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3467, 'Water Treatment Chemicals', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3468, 'Welding Electrodes', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3469, 'Wireless Communication', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3470, 'Women Wear', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3471, 'Woven Bags', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3472, 'Writing Instruments', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3473, 'X-Ray Equipment', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3474, 'Interior Designers - Residential', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3475, 'Interior Designers - Commercial', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3476, 'Architects - Commercial', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3477, 'Architects - Residential', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3478, 'Architects - Landscape', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3479, 'Financial Services', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3480, 'Electronic Books', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3481, 'Photography &amp; Optics', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3482, 'Fashion Accessories', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3483, 'Legal Services', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3484, 'Gold Jewelry', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3485, 'Others', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3486, 'Others', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3487, 'Medical &amp; Health Service', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3488, 'Chemical Additives', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3489, 'Other', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3490, 'General Services', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3491, 'Salwar Kameez', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3492, 'Health Care Equipment &amp; Products', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3493, 'Skin Care Products', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3494, 'Bpo Services', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3495, 'Other Jewelry', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3496, 'Education &amp; Training', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3497, 'Office Services', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3498, 'Food Ingredients', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3499, 'Project And Program Management', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3500, 'Mobile Phones, Accessories &amp; Parts', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3501, 'Banking Services', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3502, 'Hire &amp; Rental Services', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3503, 'Adhesive Tapes', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3504, 'Engineering Services', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3505, 'Others', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3506, 'Transport Agents', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3507, 'Personal Care Products', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3508, 'Hair Care Products', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3509, 'Others', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3510, 'Hotel Bed', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3511, 'Others', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3512, 'Rugs &amp; Mats', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3513, 'Acoustics Sound Proofing Materials', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3514, 'Server Racks', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3515, 'Other Logistic Services', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3516, 'Education Appliances', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3517, 'Pet &amp; Accessories', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3518, 'Sports Product', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3519, 'Investment Projects', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3520, 'Footwear', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3521, 'Interphones', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3522, 'Transformer &amp; Transformer Components', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3523, 'Others', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3524, 'Insurance Services', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3525, 'Courier Services', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3526, 'Office Supplies', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3527, 'Testing &amp; Measuring Equipment', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3528, 'Astrology &amp; Vastu', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3529, 'Frozen &amp; Processed Food', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3530, 'Brass Furniture Fitting Parts', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3531, 'Research &amp; Development Services', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3532, 'Industrial Services', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3533, 'Security Solution', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3534, 'Solar Panel', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3535, 'Cargo Services', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3536, 'Trade Directories', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3537, 'Others', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3538, 'Processing Services', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3539, 'Orthopaedic Implants', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3540, 'Activated Carbon', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3541, 'Brass Auto Parts', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3542, 'Others', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3543, 'Brass Electrical &amp; Electronic Components', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3544, 'Grinding &amp; Milling Machinery', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3545, 'Alloy Steel Flanges', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3546, 'Inorganic Chemical Materials', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3547, 'Analytical Testing Laboratories', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3548, 'Decorators &amp; Contractors', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3549, 'Packaging &amp; Printing Projects', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3550, 'Lathe Machinery', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3551, 'Business Services', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3552, 'Brass Fasteners', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3553, 'Exim Services', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3554, 'Frozen &amp; Dried Fruit', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3555, 'Others', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3556, 'Scarves', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3557, 'Sensors &amp; Transducers', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3558, 'Others', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3559, 'Temperature Instruments', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3560, 'Transportation Services', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3561, 'Massager', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3562, 'Others', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3563, 'Dietary Supplements', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3564, 'Hotel Appliances', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3565, 'Window Blinds', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3566, 'Others', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3567, 'Contact Lenses', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3568, 'Others', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3569, 'Safe', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3570, 'Agent and Exporters', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3571, 'Agent and Importers', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3572, 'Agents', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3573, 'Architectures', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3574, 'Aviation services, maintenance &amp; repairing', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3575, 'Contractor', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3576, 'Dealer', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3577, 'Dealer &amp; Distributor', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3578, 'Dealer &amp; Supplier', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3579, 'Dealer and Distributors', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3580, 'Dealer and Importers', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3581, 'Dealer And Supplier', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3582, 'Dealer and Suppliers', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3583, 'Dealer, Distributors, Importers &amp; Manufacturers', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3584, 'Dealers', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3585, 'Dealers &amp; Distributors', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3586, 'Dealers &amp; Manufacturer', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13');
INSERT INTO `products` (`id`, `name`, `description`, `status`, `added_date`, `updated_date`) VALUES
(3587, 'Dealers &amp; Service Providers', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3588, 'Dealers and Distributers', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3589, 'Dealerss', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3590, 'design &amp; installation', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3591, 'Designing', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3592, 'Distributer', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3593, 'Distribution', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3594, 'Distribution and Manufacturing', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3595, 'Distributor', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3596, 'Distributor &amp; dealer', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3597, 'Distributor &amp; Dealers', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3598, 'Distributor &amp; Suppliers', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3599, 'Distributor and Dealers', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3600, 'Distributor and Exporters', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3601, 'Distributor and Importers', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3602, 'Distributor and Manufacturers', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3603, 'Distributor and Supplier', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3604, 'Distributors', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3605, 'Distributors &amp; Dealer', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3606, 'Distributors &amp; Manufacturer', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3607, 'Distributors &amp; Supplier', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3608, 'Distributors &amp; Traders', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3609, 'Distributors , Dealers', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3610, 'Distributors, Importers &amp; Manufacturers', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3611, 'Distributors, importers and exporters', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3612, 'Distributors, Manufacturer', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3613, 'Export &amp; Import', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3614, 'Exporter', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3615, 'Exporter &amp; Importer', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3616, 'Exporter &amp; Manufacturer', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3617, 'Exporter &amp; Supplier', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3618, 'Exporter &amp; Traders', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3619, 'Exporter and Agents', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3620, 'Exporter and Distributors', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3621, 'Exporter And Importer', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3622, 'Exporter and Importers', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3623, 'Exporter and Manufacturers', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3624, 'Exporter And Supplier', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3625, 'Exporter and Suppliers', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3626, 'Exporter, Distributor, Supplier', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3627, 'Exporter, Distributor, Supplier &amp; Trader', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3628, 'Exporter, Importer &amp; Manufacturer', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3629, 'Exporter, Importer and Dealers', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3630, 'Exporter, Manufacture, And Importer', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3631, 'Exporter, Manufacturer and Suppliers', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3632, 'Exporter, Supplier And Manufacturer', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3633, 'Exporter, Supplier and Manufacturers', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3634, 'Exporters', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3635, 'Exporters &amp; Importers', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3636, 'Exporters &amp; Manufactures', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3637, 'Exporters &amp; Suppliers', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3638, 'Exporters , Manufacturer', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3639, 'Exporters And traders', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3640, 'Exporters, Manufacturer &amp; Importers', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3641, 'Exporters, Manufacturer &amp; Supplier', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3642, 'Exporting', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3643, 'Exporting &amp; Manufacturing', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3644, 'I.T. Servie Provider', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3645, 'Importer', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3646, 'Importer &amp; Dealer', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3647, 'Importer &amp; Distributors', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3648, 'Importer &amp; Exporter', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3649, 'Importer &amp; Exporters', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3650, 'Importer &amp; Manufacture', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3651, 'Importer &amp; Manufacturer', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3652, 'Importer &amp; Trader', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3653, 'Importer and Dealers', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3654, 'Importer and Distributors', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3655, 'Importer and Exporters', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3656, 'Importer and Manufacturers', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3657, 'Importer, Distributor , Stockist', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3658, 'Importer, Distributor and Dealers', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3659, 'Importer, Exporter and Agents', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3660, 'Importer, Exporter And Distributor', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3661, 'Importer, Exporter And Supplier', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3662, 'Importer, Exporter And Trader', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3663, 'Importer, Exportes &amp; Supplyier', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3664, 'Importers', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3665, 'Importers &amp; Dealers', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3666, 'Importers &amp; Distributors', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3667, 'Importers &amp; Manufacturer', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3668, 'Importers &amp; Manufacturers', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3669, 'Importers &amp; Suppliers', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3670, 'Importers &amp; Traders', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3671, 'Importers and Dealers', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3672, 'Importers and Distributors', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3673, 'Importers and Exporters', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3674, 'Importers And Manufactures', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3675, 'Importers, Exporters, Commission Agents, Distributors, Wholesalers', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3676, 'Importers, Manufacturer &amp; Exporters', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3677, 'Importors', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3678, 'Imprter and Exporters', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3679, 'Institution', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3680, 'Mancufacturing', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3681, 'Manufa', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3682, 'Manufacaturer, Exporter and Suppliers', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3683, 'Manufacrure and Supply', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3684, 'Manufacture &amp; Supplier', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3685, 'Manufacture &amp; Trader', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3686, 'Manufacturer', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3687, 'Coir &amp; Coir Products', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3688, 'Manufacturer  &amp; Exporters', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3689, 'Manufacturer &amp; Dealer', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3690, 'Manufacturer &amp; designer', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3691, 'Manufacturer &amp; Distributor', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3692, 'Manufacturer &amp; Distributors', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3693, 'Manufacturer &amp; Exporter', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3694, 'Manufacturer &amp; Exporters', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3695, 'Manufacturer &amp; Exportes', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3696, 'Manufacturer &amp; Importer', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3697, 'Manufacturer &amp; Sales', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3698, 'Manufacturer &amp; Service Providers', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3699, 'Manufacturer &amp; stockist', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3700, 'Manufacturer &amp; Stockists', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3701, 'Manufacturer &amp; Supplier', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3702, 'Manufacturer &amp; Suppliers', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3703, 'Manufacturer &amp; Trader', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3704, 'Manufacturer &amp; Traders', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3705, 'Manufacturer &amp; Trading', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3706, 'Manufacturer &amp; Wholesale Dealers', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3707, 'Manufacturer &amp; Wholesaler', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3708, 'Manufacturer &amp;Repair', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3709, 'Manufacturer , Exporters', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3710, 'Manufacturer and Dealers', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3711, 'Manufacturer and Distributor', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3712, 'Manufacturer and Distributors', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3713, 'Manufacturer And Exorters', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3714, 'Manufacturer and Exporter', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3715, 'Manufacturer and Exporters', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3716, 'Manufacturer and Fabricators', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3717, 'Manufacturer and Importer', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3718, 'Manufacturer and Importers', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3719, 'Manufacturer and Marketers', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3720, 'Manufacturer and Supplier', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3721, 'Manufacturer and Suppliers', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3722, 'Manufacturer and supply', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3723, 'Manufacturer and Traders', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3724, 'Manufacturer and Wholesalers', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3725, 'Manufacturer Distributors', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3726, 'Manufacturer Expts.', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3727, 'Manufacturer, Distributor, Trader And Supplier', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3728, 'Manufacturer, Exporter', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3729, 'Manufacturer, Exporter &amp; Distributors', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3730, 'Manufacturer, Exporter &amp; Importer', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3731, 'Manufacturer, Exporter and Distributors', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3732, 'manufacturer, exporter, importer', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3733, 'Manufacturer, Exporter, service provider And Supplyier', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3734, 'Manufacturer, Exporter, Supplier and Trader', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3735, 'Manufacturer, Exporter, Trader', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3736, 'Manufacturer, Exporters and Service providers', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3737, 'Manufacturer, Importer &amp; Exporters', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3738, 'Manufacturer, Importer And Exorters', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3739, 'Manufacturer, Importer and Exporters', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3740, 'Manufacturer, Importer and Importers', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3741, 'Manufacturer, Service provider, Distributor and Supplier', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3742, 'Manufacturer, Supplier &amp; Exporter', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3743, 'Manufacturer, Supplier &amp; Exporters', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3744, 'Manufacturer, Supplier &amp; Importer', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3745, 'Manufacturer, Supplier and Dealer', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3746, 'Manufacturer, Supplier and Exporters', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3747, 'Manufacturer, Supply &amp; Exporters', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3748, 'Manufacturer, Trader &amp; Exporter', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3749, 'Manufacturer, Trader, Distributor and Supplier', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3750, 'Manufacturer, Trader, Importer , Exporter', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3751, 'Manufacturer, Wholesaler', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3752, 'Manufacturer, Wholesaler and Retailers', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3753, 'Manufacturer,Exporter,Supplier And Trader', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3754, 'Manufacturer,Supplier And Exporter', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3755, 'Manufacturers', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3756, 'Brass Inserts', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3757, 'Manufacturers &amp;  Exporters', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3758, 'Manufacturers , Exporters', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3759, 'Manufacturers And Dealer', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3760, 'Manufacturers And Distributors', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3761, 'Manufacturers and Exporters', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3762, 'Manufacturers and Suppliers', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3763, 'Manufacturers, Dealers and Suppliers', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3764, 'Manufacturers, Exporters, Service Providers and Traders', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3765, 'Manufacturers, Fabricators and Suppliers', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3766, 'Manufacturers, Supplier, Trader, Dealer, Importer, Exporter', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3767, 'Manufacturers, Suppliers, and Exporters', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3768, 'Manufacturers, Traders &amp; Service Providers', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3769, 'Manufactures', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3770, 'Manufactures &amp; Exporters', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3771, 'Manufactures &amp; Suppliers', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3772, 'Manufacturing', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3773, 'Manufacturing &amp; Distributing', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3774, 'Manufacturing &amp; Exporting', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3775, 'Manufacturing &amp; Supply', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3776, 'Manufacturing , Importer', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3777, 'Manufacturing , Suppliers', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3778, 'Manufacturing And Export', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3779, 'Manufacturing And Exporting', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3780, 'Manufacturing And Marketing', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3781, 'Manufacturing And Supplying', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3782, 'Manufacturing and Trading', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3783, 'Manufacturing, Supplying And  Exporting', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3784, 'Manufactuter , Exporter', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3785, 'Manufacure And Suppliers', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3786, 'Manufacurer and Supplier', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3787, 'Manufaturer and Suppliers', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3788, 'Manufcaturer', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3789, 'Manufcturer', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3790, 'Marketing &amp; Distributors', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3791, 'Merchants', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3792, 'Mfrs, Exports, Dealers, Distributors, Traders , Service Provider', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3793, 'Omport and Trade', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3794, 'Service Providers', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3795, 'Services and Products', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3796, 'Stockists &amp; Distributor', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3797, 'Supplier', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3798, 'Welding Equipment', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3799, 'Foreign Embassies', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3800, 'Coconuts', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3801, 'All Fruits &amp; Vegetables Crops', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3802, 'Trader', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3803, 'Manufacture', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3804, 'Manufacture, Trader', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3805, 'Animal Casings', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3806, 'Bean Products', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3807, 'Automobiles', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3808, 'Oil Products', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3809, 'Automotive Valves', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3810, 'Others', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3811, 'Two Wheeler &amp; Parts', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3812, 'Laboratory Furniture', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3813, 'Quality Surveyors', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3814, 'Others', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3815, 'Herbal Medicine', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3816, 'Auto Electrical System', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3817, 'Automobile &amp; Parts Agent', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3818, 'Others', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3819, 'Camping Equipment', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3820, 'Oil Expeller', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3821, 'Others', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3822, 'Home Supplies Agents', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3823, 'Others', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3824, 'Electrical Enclosures', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3825, 'Pet Products', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3826, 'Air Conditioner', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3827, 'Water Filter Parts', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3828, 'Medical &amp; Hospital Disposables', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3829, 'Car Cleaning Products', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3830, 'Animal Extract &amp; Products', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3831, 'Telecommunication Equipment', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3832, 'Vehical Body Parts &amp; Spares', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3833, 'Window Curtains', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3834, 'Precision Machine Components', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3835, 'Indian Embassies', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3836, 'Aluminum Composite Panels', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3837, 'Induction Heating Equipment', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3838, 'Safety Matches', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3839, 'Iv &amp; Infusion Set', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3840, 'Rodent Repellent', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3841, 'Brass Screws', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3842, 'Bath Products', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3843, 'Drinking Water', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3844, 'Brass Extruded Rod', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3845, 'Social Welfare', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3846, 'Plastic Pipes &amp; Tubes', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3847, 'Toothpaste &amp; Tooth Brush', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3848, 'Nightwear', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3849, 'Inspection Equipment', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3850, 'Infant Wear', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3851, 'Electronic Safe', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3852, 'Brass Anchors', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3853, 'Stainless Steel Pipes &amp; Tubes', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3854, 'Engraving Equipment', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3855, 'Hotel Uniforms', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3856, 'Rail Transportation Services', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3857, 'Auto Electronics', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3858, 'Industrial Roller', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3859, 'Mining Equipment', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3860, 'Fast Food', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3861, 'Pharmacy Stocks', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3862, 'Physiotherapy Equipment', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3863, 'Nail Care Products', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3864, 'Wooden Toys', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3865, 'Rehabilitation Aids', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3866, 'Mosquito Nets', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3867, 'Bio-Technology Products', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3868, 'Powder Coating Chemicals', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3869, 'Laparoscopic Instruments', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3870, 'Brass Turned Components', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3871, 'Humidification &amp; Ventilation Equipment', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3872, 'Horticulture &amp; Garden Tools', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3873, 'Brass Forged Components', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3874, 'Dehumidifier &amp; Humidifier', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3875, 'Industrial Supplies Stocks', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3876, 'Packaging Films', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3877, 'Others', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3878, 'Pvc Pipe Fittings', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3879, 'Brass Stove Parts', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3880, 'Others', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3881, 'Silver &amp; Sterling Silver Jewelry', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3882, 'Shoes Materials &amp; Accessories', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3883, 'New Product', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3884, 'Agriculture', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3885, 'Apparel', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3886, 'Automobile', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3887, 'Brass Hardware', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3888, 'Chemicals', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3889, 'Computer', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3890, 'Construction', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3891, 'Consumer', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3892, 'Electronics', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3893, 'Energy &amp; Power', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3894, 'Environment', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3895, 'Food &amp; Beverage', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3896, 'Furnishings', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3897, 'Gifts Crafts', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3898, 'Health', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3899, 'Home Supplies', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3900, 'Hospital', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3901, 'Hotel Supplies', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3902, 'Industrial', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3903, 'Jewelry &amp; Gem', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3904, 'Leather Products', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3905, 'Machinery', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3906, 'Mineral, Metals', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3907, 'Office &amp; School', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3908, 'Others', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3909, 'Packaging', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3910, 'Pipes &amp; Fittings', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3911, 'Plastics', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3912, 'Printing, Publishing', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3913, 'Scientific', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3914, 'Security', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3915, 'Services', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3916, 'Sports', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3917, 'Telecomm', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3918, 'Textiles', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3919, 'Transport', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3920, 'Agriculture', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3921, 'Apparel', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3922, 'Automobile', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3923, 'Brass Hardware', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3924, 'Chemicals', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3925, 'Computer', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3926, 'Construction', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3927, 'Consumer', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3928, 'Electronics', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3929, 'Energy &amp; Power', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3930, 'Environment', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3931, 'Food &amp; Beverage', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3932, 'Furnishings', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3933, 'Gifts Crafts', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3934, 'Health', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3935, 'Home Supplies', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3936, 'Hospital', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3937, 'Hotel Supplies', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3938, 'Industrial', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3939, 'Jewelry &amp; Gem', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3940, 'Leather Products', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3941, 'Machinery', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3942, 'Mineral, Metals', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3943, 'Office &amp; School', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3944, 'Others', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3945, 'Packaging', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3946, 'Pipes &amp; Fittings', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3947, 'Plastics', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3948, 'Printing, Publishing', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3949, 'Scientific', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3950, 'Security', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3951, 'Services', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3952, 'Sports', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3953, 'Telecomm', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3954, 'Textiles', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3955, 'Transport', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3956, 'Agriculture', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3957, 'Apparel', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3958, 'Automobile', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3959, 'Brass Hardware', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3960, 'Chemicals', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3961, 'Computer', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3962, 'Construction', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3963, 'Consumer', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3964, 'Electronics', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3965, 'Energy &amp; Power', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3966, 'Environment', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3967, 'Food &amp; Beverage', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3968, 'Furnishings', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3969, 'Gifts Crafts', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3970, 'Health', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3971, 'Home Supplies', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3972, 'Hospital', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3973, 'Hotel Supplies', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3974, 'Industrial', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3975, 'Jewelry &amp; Gem', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3976, 'Leather Products', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3977, 'Machinery', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3978, 'Mineral, Metals', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3979, 'Office &amp; School', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3980, 'Others', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3981, 'Packaging', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3982, 'Pipes &amp; Fittings', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3983, 'Plastics', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3984, 'Printing, Publishing', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3985, 'Scientific', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3986, 'Security', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3987, 'Services', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3988, 'Sports', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3989, 'Telecomm', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3990, 'Textiles', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3991, 'Transport', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3992, 'Residential', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3993, 'Commercial', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3994, 'For Rent', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3995, 'Agriculture', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3996, 'Apparel', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3997, 'Automobile', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3998, 'Foreign Trade', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(3999, 'Chemicals', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(4000, 'Computer', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(4001, 'Construction', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(4002, 'Consumer', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(4003, 'Electronics', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(4004, 'Energy &amp; Power', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(4005, 'Environment', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(4006, 'Food &amp; Beverage', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(4007, 'Furnishings', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(4008, 'Gifts Crafts', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(4009, 'Health', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(4010, 'Home Supplies', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(4011, 'Hospital', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(4012, 'Hotel Supplies', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(4013, 'Industrial', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(4014, 'Jewelry &amp; Gem', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(4015, 'Leather Products', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(4016, 'Machinery', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(4017, 'Mineral, Metals', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(4018, 'Office &amp; School', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(4019, 'Others', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(4020, 'Packaging', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(4021, 'Pipes &amp; Fittings', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(4022, 'Plastics', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(4023, 'Printing, Publishing', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(4024, 'Scientific', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(4025, 'Security', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(4026, 'Services', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(4027, 'Sports', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(4028, 'Telecomm', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(4029, 'Textiles', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(4030, 'Transport', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(4031, 'Attractions &amp; Tours', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(4032, 'Arts &amp; Culture', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(4033, 'Eat &amp; Drink', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(4034, 'Hotels', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(4035, 'Nightlife', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(4036, 'Outdoors &amp; Wellness', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(4037, 'Shopping', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(4038, 'Sports &amp; Recreation', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(4039, 'Apartment', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(4040, 'House', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(4041, 'Restaurant', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(4042, 'Shop', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(4043, 'Hotel', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(4044, 'Office', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(4045, 'Manufacture', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(4046, 'Land', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(4047, 'Warehouse', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13'),
(4048, 'Others', NULL, 1, '2023-02-21 15:36:13', '2023-02-21 15:36:13');

-- --------------------------------------------------------

--
-- Table structure for table `product_attributes`
--

CREATE TABLE `product_attributes` (
  `id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `attribute` varchar(100) NOT NULL,
  `sequence` int(11) DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1',
  `added_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `product_attributes`
--

INSERT INTO `product_attributes` (`id`, `product_id`, `attribute`, `sequence`, `status`, `added_date`, `updated_date`) VALUES
(1, 1202, 'Length', 0, 1, '2022-09-15 11:19:54', '2022-09-15 11:19:54'),
(2, 1202, 'Description', NULL, 1, '2022-09-15 11:27:04', '2022-09-15 11:27:04'),
(3, 1202, 'Color', NULL, 1, '2022-09-15 11:27:26', '2022-09-15 11:27:26'),
(4, 1196, 'Weight', NULL, 1, '2022-09-15 12:56:15', '2022-09-15 12:56:15'),
(5, 1196, 'Height', NULL, 1, '2022-09-15 12:56:29', '2022-09-15 12:56:29'),
(6, 1196, 'Description', NULL, 1, '2022-09-15 12:56:36', '2022-09-15 12:56:36'),
(7, 1196, 'Quantity', NULL, 1, '2022-10-03 09:15:14', '2022-10-03 09:15:14');

-- --------------------------------------------------------

--
-- Table structure for table `product_sub_categories`
--

CREATE TABLE `product_sub_categories` (
  `id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `description` varchar(100) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1',
  `added_date` datetime NOT NULL,
  `updated_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `product_sub_categories`
--

INSERT INTO `product_sub_categories` (`id`, `product_id`, `name`, `description`, `status`, `added_date`, `updated_date`) VALUES
(1, 1196, 'Sub Category 1', 'test', 1, '2022-10-10 19:02:24', '2022-10-10 19:01:51'),
(2, 1196, 'Sub Category 2', 'tww', 1, '2022-10-03 19:02:44', '2022-10-10 19:02:32'),
(3, 1199, 'DRP cat 1', 'DRP cat 1', 1, '2022-10-11 13:03:38', '2022-10-11 13:03:07');

-- --------------------------------------------------------

--
-- Table structure for table `pr_footers`
--

CREATE TABLE `pr_footers` (
  `id` int(11) NOT NULL,
  `pr_header_id` int(11) NOT NULL,
  `item` varchar(5) NOT NULL,
  `material` varchar(20) NOT NULL,
  `short_text` varchar(50) NOT NULL,
  `qty` decimal(10,2) NOT NULL,
  `unit` varchar(5) NOT NULL,
  `delivery_date` varchar(15) DEFAULT NULL,
  `material_group` varchar(10) DEFAULT NULL,
  `plant` varchar(10) NOT NULL,
  `storage_location` varchar(10) DEFAULT NULL,
  `purchase_group` varchar(10) DEFAULT NULL,
  `requisitioner` varchar(10) DEFAULT NULL,
  `total_value` decimal(20,2) DEFAULT NULL,
  `price` decimal(10,2) NOT NULL,
  `purchase_organization` int(11) DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `added_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `pr_footers`
--

INSERT INTO `pr_footers` (`id`, `pr_header_id`, `item`, `material`, `short_text`, `qty`, `unit`, `delivery_date`, `material_group`, `plant`, `storage_location`, `purchase_group`, `requisitioner`, `total_value`, `price`, `purchase_organization`, `status`, `added_date`, `updated_date`) VALUES
(1, 1, '10', 'PH000000223', '2489 176002489 WATERS', '5000.00', 'NOS', '2023-03-09', '1', '1500', '0001', '0001', 'Deepak', '2000.00', '25.00', 1, 1, '2023-03-08 07:19:59', '2023-03-08 07:19:59'),
(2, 1, '20', 'PH000000224', 'UV/VIS DETECTOR', '3000.00', 'NOS', '2023-03-09', '1', '1500', '0001', '0001', 'Deepak', '2300.00', '25.00', 1, 1, '2023-03-08 07:19:59', '2023-03-08 07:19:59'),
(5, 3, '10', 'PH000000100', '2489 176002489 WATERS', '5000.00', 'NOS', '2023-03-09', '1', '1500', '0001', '0001', 'Deepak', '2000.00', '25.00', 1, 1, '2023-03-10 07:58:32', '2023-03-10 07:58:32'),
(6, 3, '20', 'PH000000101', 'UV/VIS DETECTOR', '3000.00', 'NOS', '2023-03-09', '1', '1500', '0001', '0001', 'Deepak', '2300.00', '25.00', 1, 1, '2023-03-10 07:58:32', '2023-03-10 07:58:32');

-- --------------------------------------------------------

--
-- Table structure for table `pr_headers`
--

CREATE TABLE `pr_headers` (
  `id` int(11) NOT NULL,
  `pr_no` varchar(10) NOT NULL,
  `description` varchar(50) DEFAULT NULL,
  `pr_type` varchar(4) NOT NULL,
  `purchase_group` varchar(10) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `added_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `pr_headers`
--

INSERT INTO `pr_headers` (`id`, `pr_no`, `description`, `pr_type`, `purchase_group`, `status`, `added_date`, `updated_date`) VALUES
(1, '4510000433', 'TEST PR', '0022', '0001', 1, '2023-03-08 07:19:59', '2023-03-08 07:19:59'),
(3, '4510000434', 'TEST PR', '0022', '0001', 1, '2023-03-10 07:58:32', '2023-03-10 07:58:32');

-- --------------------------------------------------------

--
-- Table structure for table `purchasing_organizations`
--

CREATE TABLE `purchasing_organizations` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1',
  `added_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_date` datetime NOT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `purchasing_organizations`
--

INSERT INTO `purchasing_organizations` (`id`, `name`, `status`, `added_date`, `updated_date`) VALUES
(1, 'Pur. Orgzn 1', 1, '2023-01-02 13:11:55', '2023-01-02 07:41:17'),
(2, 'Pur. Orgzn 2', 1, '2023-01-02 13:11:55', '2023-01-02 07:41:17'),
(3, 'Pur. Orgzn 3', 1, '2023-01-02 13:12:32', '2023-01-02 07:42:26');

-- --------------------------------------------------------

--
-- Table structure for table `rfqs`
--

CREATE TABLE `rfqs` (
  `id` int(11) NOT NULL,
  `rfq_no` bigint(20) NOT NULL,
  `buyer_id` int(11) NOT NULL,
  `vendor_temp_id` int(11) NOT NULL,
  `pr_header_id` int(11) NOT NULL,
  `sub_total` decimal(10,2) NOT NULL DEFAULT '0.00',
  `freight_value` decimal(10,2) NOT NULL DEFAULT '0.00',
  `tax_value` decimal(10,2) NOT NULL DEFAULT '0.00',
  `total_value` decimal(10,2) NOT NULL DEFAULT '0.00',
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `added_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `rfqs`
--

INSERT INTO `rfqs` (`id`, `rfq_no`, `buyer_id`, `vendor_temp_id`, `pr_header_id`, `sub_total`, `freight_value`, `tax_value`, `total_value`, `status`, `added_date`, `updated_date`) VALUES
(1, 1, 8, 1, 3, '3960.00', '10.00', '714.60', '4684.60', 1, '2023-03-17 12:17:20', '2023-03-18 07:23:44');

-- --------------------------------------------------------

--
-- Table structure for table `rfq_communications`
--

CREATE TABLE `rfq_communications` (
  `id` int(11) NOT NULL,
  `rfq_id` int(11) NOT NULL,
  `buyer_id` int(11) DEFAULT NULL,
  `vendor_temp_id` int(11) DEFAULT NULL,
  `message` text NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `added_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `rfq_communications`
--

INSERT INTO `rfq_communications` (`id`, `rfq_id`, `buyer_id`, `vendor_temp_id`, `message`, `status`, `added_date`, `updated_date`) VALUES
(1, 1, 8, NULL, '<p>please share qoute</p>', 1, '2023-03-13 10:10:05', '2023-03-13 10:10:05'),
(2, 1, NULL, 1, '<p>please check</p>', 1, '2023-03-13 10:11:19', '2023-03-13 10:11:19'),
(3, 2, 8, NULL, '<p>check</p>', 1, '2023-03-13 10:12:21', '2023-03-13 10:12:21'),
(4, 2, NULL, 3, '<p>ok</p>', 1, '2023-03-13 10:13:18', '2023-03-13 10:13:18'),
(5, 1, 8, NULL, '<p>test&nbsp;</p>', 1, '2023-03-13 11:26:15', '2023-03-13 11:26:15'),
(6, 2, 8, NULL, '<p>xzxzx</p>', 1, '2023-03-13 11:29:27', '2023-03-13 11:29:27'),
(7, 1, 8, NULL, '<p>test</p>', 1, '2023-03-13 11:32:28', '2023-03-13 11:32:28'),
(8, 1, 8, NULL, '<p>asas</p>', 1, '2023-03-17 12:17:20', '2023-03-17 12:17:20'),
(9, 1, NULL, 1, '<p>asas</p>', 1, '2023-03-18 07:30:47', '2023-03-18 07:30:47');

-- --------------------------------------------------------

--
-- Table structure for table `rfq_details`
--

CREATE TABLE `rfq_details` (
  `id` int(11) NOT NULL,
  `buyer_seller_user_id` int(11) NOT NULL,
  `rfq_no` int(11) NOT NULL DEFAULT '0',
  `product_id` int(11) NOT NULL,
  `product_sub_category_id` int(11) DEFAULT NULL,
  `part_name` varchar(100) NOT NULL,
  `qty` decimal(4,0) NOT NULL,
  `uom_code` varchar(3) NOT NULL,
  `remarks` varchar(255) NOT NULL,
  `make` varchar(100) NOT NULL,
  `uploaded_files` json DEFAULT NULL,
  `status` int(1) NOT NULL DEFAULT '0',
  `added_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `rfq_details`
--

INSERT INTO `rfq_details` (`id`, `buyer_seller_user_id`, `rfq_no`, `product_id`, `product_sub_category_id`, `part_name`, `qty`, `uom_code`, `remarks`, `make`, `uploaded_files`, `status`, `added_date`, `updated_date`) VALUES
(98, 1, 1, 2, 2, '2', '2', '2', '2', '2', '\"[]\"', 0, '2023-02-10 15:43:59', '2023-02-10 10:13:59'),
(99, 1, 1, 1196, NULL, 'wwewe', '12', '3', 'wewewe', 'wewe', '\"[]\"', 1, '2023-02-10 15:43:59', '2023-02-17 07:26:35'),
(100, 1, 2, 2, 2, '2', '2', '2', '2', '2', '\"[]\"', 0, '2023-02-10 15:44:32', '2023-02-10 10:14:32'),
(101, 1, 2, 1196, NULL, 'wwewe', '12', '3', 'wewewe', 'wewe', '\"[]\"', 2, '2023-02-10 15:44:32', '2023-02-17 07:26:41'),
(102, 1, 3, 1196, NULL, 'sdsd', '12', '3', 'wwqe', '1212', '\"[]\"', 0, '2023-03-01 18:54:21', '2023-03-01 13:24:21'),
(103, 1, 4, 1196, NULL, 'sdsd', '12', '3', 'wwqe', '1212', '\"[]\"', 0, '2023-03-01 18:55:00', '2023-03-01 13:25:00'),
(104, 1, 5, 1202, NULL, 'as', '1', '3', '1', '1', '\"[]\"', 0, '2023-03-01 19:11:41', '2023-03-01 13:41:41'),
(105, 1, 6, 1202, NULL, 'as', '1', '3', '1', '1', '\"[]\"', 0, '2023-03-01 19:12:01', '2023-03-01 13:42:01'),
(106, 1, 7, 1202, NULL, 'as', '1', '3', '1', '1', '\"[]\"', 0, '2023-03-01 19:12:11', '2023-03-01 13:42:11'),
(107, 1, 8, 1196, NULL, 'as', '12', '4', 'sdsd', 'sdsd', '\"[]\"', 0, '2023-03-01 19:12:58', '2023-03-01 13:42:58'),
(108, 1, 9, 1196, NULL, 'as', '12', '4', 'sdsd', 'sdsd', '\"[]\"', 0, '2023-03-01 19:13:09', '2023-03-01 13:43:09'),
(109, 1, 10, 1197, NULL, 'asas', '1', '6', 'aa', 'aa', '\"[]\"', 0, '2023-03-01 19:14:13', '2023-03-01 13:44:13');

-- --------------------------------------------------------

--
-- Table structure for table `rfq_for_sellers`
--

CREATE TABLE `rfq_for_sellers` (
  `id` int(11) NOT NULL,
  `seller_id` int(11) NOT NULL,
  `rfq_no` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `rfq_for_sellers`
--

INSERT INTO `rfq_for_sellers` (`id`, `seller_id`, `rfq_no`) VALUES
(7, 2, 1),
(8, 2, 2),
(10, 2, 9),
(9, 3, 7),
(11, 4, 9);

-- --------------------------------------------------------

--
-- Table structure for table `rfq_inquiries`
--

CREATE TABLE `rfq_inquiries` (
  `id` int(11) NOT NULL,
  `rfq_id` int(11) NOT NULL,
  `rfq_item_id` int(11) NOT NULL,
  `seller_id` int(11) NOT NULL,
  `qty` decimal(12,0) DEFAULT NULL,
  `rate` decimal(12,2) DEFAULT NULL,
  `discount` decimal(7,2) NOT NULL DEFAULT '0.00',
  `sub_total` decimal(10,2) NOT NULL DEFAULT '0.00',
  `delivery_date` date DEFAULT NULL,
  `inquiry_data` json DEFAULT NULL,
  `inquiry` tinyint(1) DEFAULT NULL,
  `created_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `rfq_inquiries`
--

INSERT INTO `rfq_inquiries` (`id`, `rfq_id`, `rfq_item_id`, `seller_id`, `qty`, `rate`, `discount`, `sub_total`, `delivery_date`, `inquiry_data`, `inquiry`, `created_date`, `updated_date`) VALUES
(1, 1, 1, 1, '10', '100.00', '10.00', '990.00', '2023-03-15', NULL, 1, '2023-03-18 07:30:47', '2023-03-18 07:30:47'),
(2, 1, 3, 1, '10', '100.00', '10.00', '990.00', '2023-03-11', NULL, 1, '2023-03-18 07:30:47', '2023-03-18 07:30:47'),
(3, 1, 2, 1, '10', '100.00', '10.00', '990.00', '2023-03-15', NULL, 1, '2023-03-18 07:30:47', '2023-03-18 07:30:47'),
(4, 1, 4, 1, '10', '100.00', '10.00', '990.00', '2023-03-21', NULL, 1, '2023-03-18 07:30:47', '2023-03-18 07:30:47');

-- --------------------------------------------------------

--
-- Table structure for table `rfq_inquiries_histories`
--

CREATE TABLE `rfq_inquiries_histories` (
  `id` int(11) NOT NULL,
  `rfq_id` int(11) NOT NULL,
  `rfq_item_id` int(11) NOT NULL,
  `seller_id` int(11) NOT NULL,
  `qty` decimal(12,0) DEFAULT NULL,
  `rate` decimal(12,2) DEFAULT NULL,
  `delivery_date` date DEFAULT NULL,
  `inquiry_data` json DEFAULT NULL,
  `inquiry` tinyint(1) DEFAULT NULL,
  `created_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `rfq_inquiries_histories`
--

INSERT INTO `rfq_inquiries_histories` (`id`, `rfq_id`, `rfq_item_id`, `seller_id`, `qty`, `rate`, `delivery_date`, `inquiry_data`, `inquiry`, `created_date`, `updated_date`) VALUES
(1, 1, 1, 1, '1000', '1.00', '2023-03-30', NULL, 1, '2023-03-13 10:11:19', '2023-03-13 10:11:19'),
(2, 1, 2, 1, '4000', '2.00', '2023-03-24', NULL, 1, '2023-03-13 10:11:19', '2023-03-13 10:11:19'),
(3, 2, 3, 3, '450', '11.00', '2023-03-21', NULL, 1, '2023-03-13 10:13:18', '2023-03-13 10:13:18'),
(4, 2, 4, 3, '235', '1.00', '2023-03-15', NULL, 1, '2023-03-13 10:13:18', '2023-03-13 10:13:18'),
(5, 1, 1, 1, '10', '100.00', '2023-03-15', NULL, 1, '2023-03-18 07:30:47', '2023-03-18 07:30:47'),
(6, 1, 3, 1, '10', '100.00', '2023-03-11', NULL, 1, '2023-03-18 07:30:47', '2023-03-18 07:30:47'),
(7, 1, 2, 1, '10', '100.00', '2023-03-15', NULL, 1, '2023-03-18 07:30:47', '2023-03-18 07:30:47'),
(8, 1, 4, 1, '10', '100.00', '2023-03-21', NULL, 1, '2023-03-18 07:30:47', '2023-03-18 07:30:47');

-- --------------------------------------------------------

--
-- Table structure for table `rfq_items`
--

CREATE TABLE `rfq_items` (
  `id` int(11) NOT NULL,
  `rfq_id` int(11) NOT NULL,
  `pr_footer_id` int(11) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `added_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `rfq_items`
--

INSERT INTO `rfq_items` (`id`, `rfq_id`, `pr_footer_id`, `status`, `added_date`, `updated_date`) VALUES
(1, 1, 5, 1, '2023-03-13 11:32:28', '2023-03-13 11:32:28'),
(2, 1, 6, 1, '2023-03-13 11:32:28', '2023-03-13 11:32:28'),
(3, 1, 5, 1, '2023-03-17 12:17:20', '2023-03-17 12:17:20'),
(4, 1, 6, 1, '2023-03-17 12:17:20', '2023-03-17 12:17:20');

-- --------------------------------------------------------

--
-- Table structure for table `schema_groups`
--

CREATE TABLE `schema_groups` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1',
  `added_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_date` datetime NOT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `schema_groups`
--

INSERT INTO `schema_groups` (`id`, `name`, `status`, `added_date`, `updated_date`) VALUES
(1, 'Schema Group 1', 1, '2023-01-02 13:13:22', '2023-01-02 07:43:10'),
(2, 'Schema Group 2', 1, '2023-01-02 13:13:22', '2023-01-02 07:43:10');

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `value` text NOT NULL,
  `status` tinyint(4) NOT NULL,
  `added_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `name`, `value`, `status`, `added_date`, `updated_date`) VALUES
(1, 'sms_url', 'https://www.fast2sms.com/dev/bulkV2', 1, '2023-01-11 11:15:04', '2023-01-11 11:15:04'),
(2, 'sms_api_key', 'TUJOiyzGtxRpCSM5wu4QvFgs2onN19mAecDPZ37Y6XHWkjlE8K3VEDCRNMLb02gX1pYFqn5mo9vIke6J', 1, '2023-01-11 11:16:08', '2023-01-11 11:16:08'),
(3, 'sap_url', 'http://123.108.46.252', 1, '2023-01-11 11:19:39', '2023-01-11 11:19:39'),
(4, 'sap_segment', 'sap/bc/sftmob/VENDER_UPD', 1, '2023-01-11 11:20:44', '2023-01-11 11:20:44'),
(5, 'sap_client', '300', 1, '2023-01-11 11:21:07', '2023-01-11 11:21:07'),
(6, 'sap_port', '8000', 1, '2023-01-11 11:21:31', '2023-01-11 06:45:11'),
(7, 'sap_username', 'vcsupport1', 1, '2023-01-11 11:21:51', '2023-01-11 11:21:51'),
(8, 'sap_password', 'aarti@123', 1, '2023-01-11 11:22:01', '2023-01-11 11:22:01');

-- --------------------------------------------------------

--
-- Table structure for table `uoms`
--

CREATE TABLE `uoms` (
  `id` int(11) NOT NULL,
  `code` varchar(3) NOT NULL,
  `description` varchar(100) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1',
  `created_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `uoms`
--

INSERT INTO `uoms` (`id`, `code`, `description`, `status`, `created_date`, `updated_date`) VALUES
(1, 'BAG', 'BAGS', 1, '2022-10-07 15:10:31', '2022-10-07 15:10:31'),
(2, 'BAL', 'BALE', 1, '2022-10-07 15:10:31', '2022-10-07 15:10:31'),
(3, 'BDL', 'BUNDLES', 1, '2022-10-07 15:10:31', '2022-10-07 15:10:31'),
(4, 'BKL', 'BUCKLES', 1, '2022-10-07 15:10:31', '2022-10-07 15:10:31'),
(5, 'BOU', 'BILLION OF UNITS', 1, '2022-10-07 15:10:31', '2022-10-07 15:10:31'),
(6, 'BOX', 'BOX', 1, '2022-10-07 15:10:31', '2022-10-07 15:10:31'),
(7, 'BTL', 'BOTTLES', 1, '2022-10-07 15:10:31', '2022-10-07 15:10:31'),
(8, 'BUN', 'BUNCHES', 1, '2022-10-07 15:10:31', '2022-10-07 15:10:31'),
(9, 'CAN', 'CANS', 1, '2022-10-07 15:10:31', '2022-10-07 15:10:31'),
(10, 'CCM', 'CUBIC CENTIMETERS', 1, '2022-10-07 15:10:31', '2022-10-07 15:10:31'),
(11, 'CMS', 'CENTIMETERS ', 1, '2022-10-07 15:10:31', '2022-10-07 15:10:31'),
(12, 'CBM', 'CUBIC METERS', 1, '2022-10-07 15:10:31', '2022-10-07 15:10:31'),
(13, 'CTN', 'CARTONS', 1, '2022-10-07 15:10:31', '2022-10-07 15:10:31'),
(14, 'DOZ', 'DOZENS ', 1, '2022-10-07 15:10:31', '2022-10-07 15:10:31'),
(15, 'DRM', 'DRUMS', 1, '2022-10-07 15:10:31', '2022-10-07 15:10:31'),
(16, 'GGK', 'GREAT GROSS', 1, '2022-10-07 15:10:31', '2022-10-07 15:10:31'),
(17, 'GMS', 'GRAMMES', 1, '2022-10-07 15:10:31', '2022-10-07 15:10:31'),
(18, 'GRS', 'GROSS', 1, '2022-10-07 15:10:31', '2022-10-07 15:10:31'),
(19, 'GYD', 'GROSS YARDS', 1, '2022-10-07 15:10:31', '2022-10-07 15:10:31'),
(20, 'KGS', 'KILOGRAMS', 1, '2022-10-07 15:10:31', '2022-10-07 15:10:31'),
(21, 'KLR', 'KILOLITRE', 1, '2022-10-07 15:10:31', '2022-10-07 15:10:31'),
(22, 'KME', 'KILOMETRE', 1, '2022-10-07 15:10:31', '2022-10-07 15:10:31'),
(23, 'LTR', 'LITRES', 1, '2022-10-07 15:10:31', '2022-10-07 15:10:31'),
(24, 'MLS', 'MILLI LITRES', 1, '2022-10-07 15:10:31', '2022-10-07 15:10:31'),
(25, 'MLT', 'MILILITRE', 1, '2022-10-07 15:10:31', '2022-10-07 15:10:31'),
(26, 'MTR', 'METERS', 1, '2022-10-07 15:10:31', '2022-10-07 15:10:31'),
(27, 'MTS', 'METRIC TON', 1, '2022-10-07 15:10:31', '2022-10-07 15:10:31'),
(28, 'NOS', 'NUMBERS', 1, '2022-10-07 15:10:31', '2022-10-07 15:10:31'),
(29, 'OTH', 'OTHERS', 1, '2022-10-07 15:10:31', '2022-10-07 15:10:31'),
(30, 'PAC', 'PACKS', 1, '2022-10-07 15:10:31', '2022-10-07 15:10:31'),
(31, 'PCS', 'PIECES', 1, '2022-10-07 15:10:31', '2022-10-07 15:10:31'),
(32, 'PRS', 'PAIRS', 1, '2022-10-07 15:10:31', '2022-10-07 15:10:31'),
(33, 'QTL', 'QUINTAL', 1, '2022-10-07 15:10:31', '2022-10-07 15:10:31'),
(34, 'ROL', 'ROLLS', 1, '2022-10-07 15:10:31', '2022-10-07 15:10:31'),
(35, 'SET', 'SETS', 1, '2022-10-07 15:10:31', '2022-10-07 15:10:31'),
(36, 'SQF', 'SQUARE FEET', 1, '2022-10-07 15:10:31', '2022-10-07 15:10:31'),
(37, 'SQM', 'SQUARE METERS', 1, '2022-10-07 15:10:31', '2022-10-07 15:10:31'),
(38, 'SQY', 'SQUARE YARDS', 1, '2022-10-07 15:10:31', '2022-10-07 15:10:31'),
(39, 'TBS', 'TABLETS', 1, '2022-10-07 15:10:31', '2022-10-07 15:10:31'),
(40, 'TGM', 'TEN GROSS', 1, '2022-10-07 15:10:31', '2022-10-07 15:10:31'),
(41, 'THD', 'THOUSANDS', 1, '2022-10-07 15:10:31', '2022-10-07 15:10:31'),
(42, 'TON', 'TONNES', 1, '2022-10-07 15:10:31', '2022-10-07 15:10:31'),
(43, 'TUB', 'TUBES', 1, '2022-10-07 15:10:31', '2022-10-07 15:10:31'),
(44, 'UGS', 'US GALLONS', 1, '2022-10-07 15:10:31', '2022-10-07 15:10:31'),
(45, 'UNT', 'UNITS', 1, '2022-10-07 15:10:31', '2022-10-07 15:10:31'),
(46, 'YDS', 'YARDS', 1, '2022-10-07 15:10:31', '2022-10-07 15:10:31');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` char(60) NOT NULL,
  `mobile` varchar(13) NOT NULL,
  `group_id` int(11) NOT NULL,
  `sap_user` tinyint(1) NOT NULL DEFAULT '0',
  `status` varchar(10) NOT NULL DEFAULT '1',
  `otp_expiry_date` datetime DEFAULT NULL,
  `otp` varchar(6) DEFAULT NULL,
  `last_login` datetime DEFAULT NULL,
  `added_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `username`, `password`, `mobile`, `group_id`, `sap_user`, `status`, `otp_expiry_date`, `otp`, `last_login`, `added_date`, `updated_date`) VALUES
(1, 'Deepak', 'Singh', 'deepaksingh@fts-pl.com', '$2y$10$8TsZUBWFQc3zRMCbHJL1Y.BVME1Ye6DyqX.hudX3UDh782t6a5PKu', '9920687382', 1, 0, '1', NULL, '229051', NULL, '2023-01-05 20:09:03', '2023-01-30 10:41:14'),
(8, 'Venu', 'Chippa', 'venu@fts-pl.com', '$2y$10$KXpfva5Aush2TMu1.I3.4eHIU/MeXuxgCMW9nr2LMF/nHPtfThaly', '9372317094', 2, 0, '1', NULL, '986742', NULL, '2023-01-11 16:02:44', '2023-01-12 07:12:09'),
(9, 'Sanjay', 'Roy', 'ds@fts-pl.com', '$2y$10$kHrtKpqN1mwk73ivTO0fL.rDlDQze0hygBJK.Z6FCkMGxw5BfZ3Ba', '4535353412', 3, 0, '1', NULL, NULL, NULL, '2023-01-12 08:05:04', '2023-02-01 08:47:52'),
(15, 'D S', 'D S', 'deepaksingh0207@gmail.com', '$2y$10$sZDc.2qEe6bxfYH0UyfrXulJJZ8n6VpNcQB6DDaCSRo.dDeik/Gca', '9674323423', 3, 0, '1', NULL, NULL, NULL, '2023-02-02 12:50:41', '2023-02-02 12:50:41');

-- --------------------------------------------------------

--
-- Table structure for table `user_groups`
--

CREATE TABLE `user_groups` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user_groups`
--

INSERT INTO `user_groups` (`id`, `name`, `created`, `modified`) VALUES
(1, 'Admin', '2023-01-05 20:07:00', '2023-01-05 20:07:00'),
(2, 'Buyer', '2023-01-05 20:07:06', '2023-01-05 20:07:06'),
(3, 'Supplier', '2023-01-05 20:07:12', '2023-01-05 20:07:12');

-- --------------------------------------------------------

--
-- Table structure for table `vendor_material_stocks`
--

CREATE TABLE `vendor_material_stocks` (
  `id` int(11) NOT NULL,
  `sap_vendor_code` varchar(10) NOT NULL,
  `material` varchar(18) DEFAULT NULL,
  `part_code` varchar(20) NOT NULL,
  `material_desc` varchar(40) DEFAULT NULL,
  `current_stock` decimal(15,2) NOT NULL,
  `production_stock` decimal(15,2) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `added_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `vendor_material_stocks`
--

INSERT INTO `vendor_material_stocks` (`id`, `sap_vendor_code`, `material`, `part_code`, `material_desc`, `current_stock`, `production_stock`, `status`, `added_date`, `updated_date`) VALUES
(14, 'LARET0', NULL, 'SDPTEST', '489 UV/VIS DETECTOR 176002489 WATERS', '200.00', '300.00', 1, '2023-02-19 07:08:34', '2023-02-19 07:08:34');

-- --------------------------------------------------------

--
-- Table structure for table `vendor_temps`
--

CREATE TABLE `vendor_temps` (
  `id` int(11) NOT NULL,
  `purchasing_organization_id` int(11) NOT NULL,
  `account_group_id` int(11) NOT NULL,
  `schema_group_id` int(11) NOT NULL,
  `sap_vendor_code` varchar(10) DEFAULT NULL,
  `name` varchar(200) NOT NULL,
  `address` varchar(255) DEFAULT NULL,
  `city` varchar(50) DEFAULT NULL,
  `pincode` varchar(6) DEFAULT NULL,
  `mobile` varchar(12) NOT NULL,
  `email` varchar(100) NOT NULL,
  `country` varchar(50) DEFAULT NULL,
  `payment_term` varchar(50) NOT NULL,
  `order_currency` varchar(10) NOT NULL DEFAULT 'INR',
  `gst_no` varchar(20) DEFAULT NULL,
  `pan_no` varchar(20) DEFAULT NULL,
  `contact_person` varchar(50) DEFAULT NULL,
  `contact_email` varchar(50) DEFAULT NULL,
  `contact_mobile` varchar(12) DEFAULT NULL,
  `cin_no` varchar(25) DEFAULT NULL,
  `tan_no` varchar(25) DEFAULT NULL,
  `status` smallint(1) NOT NULL DEFAULT '0',
  `valid_date` datetime NOT NULL,
  `remark` text,
  `buyer_id` int(11) NOT NULL,
  `added_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `vendor_temps`
--

INSERT INTO `vendor_temps` (`id`, `purchasing_organization_id`, `account_group_id`, `schema_group_id`, `sap_vendor_code`, `name`, `address`, `city`, `pincode`, `mobile`, `email`, `country`, `payment_term`, `order_currency`, `gst_no`, `pan_no`, `contact_person`, `contact_email`, `contact_mobile`, `cin_no`, `tan_no`, `status`, `valid_date`, `remark`, `buyer_id`, `added_date`, `updated_date`) VALUES
(1, 1, 1, 1, 'LARET0', 'Dharti Enterprise', 'Mira road santacriz', 'mumbai', '401107', '4535353412', 'ds@fts-pl.com', 'India', '0001', 'INR', 'sdfsdfsdf324234dfsdf', 'sdfsdf3432sd', 'Test user', 'use@test.com', '67854635345', 'sdfsdf2434efgdfg', 'dfgdfgdfg3534tegfg', 2, '2023-01-03 15:42:23', '', 8, '2023-01-02 10:12:23', '2023-01-02 10:12:23'),
(3, 2, 2, 2, '0000100114', 'D S', 'Andheri', 'Thane', '402222', '9674323423', 'deepaksingh0207@gmail.com', 'IN', '0001', 'INR', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 3, '2023-01-13 17:59:43', 'rejected', 8, '2023-01-12 12:29:43', '2023-01-12 12:29:43');

-- --------------------------------------------------------

--
-- Table structure for table `vendor_temp_otps`
--

CREATE TABLE `vendor_temp_otps` (
  `id` int(11) NOT NULL,
  `vendor_temp_id` int(11) NOT NULL,
  `otp` varchar(6) NOT NULL,
  `expire_date` datetime NOT NULL,
  `verified` tinyint(1) NOT NULL DEFAULT '0',
  `added_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `vendor_temp_otps`
--

INSERT INTO `vendor_temp_otps` (`id`, `vendor_temp_id`, `otp`, `expire_date`, `verified`, `added_date`) VALUES
(1, 1, '600219', '2023-01-03 13:17:18', 0, '2023-01-03 07:42:18'),
(2, 1, '647436', '2023-01-03 13:22:28', 0, '2023-01-03 07:47:28'),
(3, 1, '421234', '2023-01-03 13:34:44', 0, '2023-01-03 07:59:44'),
(4, 1, '392193', '2023-01-03 13:34:51', 0, '2023-01-03 07:59:51'),
(5, 1, '699468', '2023-01-03 13:37:38', 0, '2023-01-03 08:02:38'),
(6, 1, '446631', '2023-01-03 13:38:05', 0, '2023-01-03 08:03:05'),
(7, 1, '652605', '2023-01-03 23:35:32', 0, '2023-01-03 18:00:32'),
(8, 1, '346797', '2023-01-03 23:35:35', 0, '2023-01-03 18:00:35'),
(9, 1, '514357', '2023-01-03 23:38:34', 0, '2023-01-03 18:03:34'),
(10, 1, '647309', '2023-01-03 23:38:37', 0, '2023-01-03 18:03:37'),
(11, 1, '326637', '2023-01-03 23:39:43', 0, '2023-01-03 18:04:43'),
(12, 1, '965993', '2023-01-03 23:39:45', 0, '2023-01-03 18:04:45'),
(13, 1, '236426', '2023-01-03 23:40:02', 0, '2023-01-03 18:05:02'),
(14, 1, '448557', '2023-01-03 23:41:11', 0, '2023-01-03 18:06:11'),
(15, 1, '164723', '2023-01-03 23:41:13', 0, '2023-01-03 18:06:13'),
(16, 1, '487496', '2023-01-03 23:41:32', 0, '2023-01-03 18:06:32'),
(17, 1, '733450', '2023-01-03 23:41:33', 0, '2023-01-03 18:06:33'),
(18, 1, '957396', '2023-01-05 11:58:53', 0, '2023-01-05 06:23:53');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `account_groups`
--
ALTER TABLE `account_groups`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `acl_phinxlog`
--
ALTER TABLE `acl_phinxlog`
  ADD PRIMARY KEY (`version`);

--
-- Indexes for table `acos`
--
ALTER TABLE `acos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `lft` (`lft`,`rght`),
  ADD KEY `alias` (`alias`);

--
-- Indexes for table `admin_users`
--
ALTER TABLE `admin_users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `aros`
--
ALTER TABLE `aros`
  ADD PRIMARY KEY (`id`),
  ADD KEY `lft` (`lft`,`rght`),
  ADD KEY `alias` (`alias`);

--
-- Indexes for table `aros_acos`
--
ALTER TABLE `aros_acos`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `aro_id` (`aro_id`,`aco_id`),
  ADD KEY `aco_id` (`aco_id`);

--
-- Indexes for table `asn_footers`
--
ALTER TABLE `asn_footers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `asn_headers`
--
ALTER TABLE `asn_headers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `asn_no` (`asn_no`);

--
-- Indexes for table `buyer_seller_users`
--
ALTER TABLE `buyer_seller_users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `delivery_details`
--
ALTER TABLE `delivery_details`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `po_footer_id` (`po_footer_id`,`challan_no`);

--
-- Indexes for table `documents`
--
ALTER TABLE `documents`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `groups`
--
ALTER TABLE `groups`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `item_schedule_messages`
--
ALTER TABLE `item_schedule_messages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `po_footers`
--
ALTER TABLE `po_footers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `po_headers`
--
ALTER TABLE `po_headers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `sap_vendor_code` (`sap_vendor_code`,`po_no`);

--
-- Indexes for table `po_item_schedules`
--
ALTER TABLE `po_item_schedules`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_attributes`
--
ALTER TABLE `product_attributes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_sub_categories`
--
ALTER TABLE `product_sub_categories`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cons_prod_id` (`product_id`);

--
-- Indexes for table `pr_footers`
--
ALTER TABLE `pr_footers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pr_headers`
--
ALTER TABLE `pr_headers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `pr_no` (`pr_no`);

--
-- Indexes for table `purchasing_organizations`
--
ALTER TABLE `purchasing_organizations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rfqs`
--
ALTER TABLE `rfqs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `vendor_temp_id` (`vendor_temp_id`,`pr_header_id`);

--
-- Indexes for table `rfq_communications`
--
ALTER TABLE `rfq_communications`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rfq_details`
--
ALTER TABLE `rfq_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rfq_for_sellers`
--
ALTER TABLE `rfq_for_sellers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `seller_id` (`seller_id`,`rfq_no`);

--
-- Indexes for table `rfq_inquiries`
--
ALTER TABLE `rfq_inquiries`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `rfq_id` (`rfq_item_id`,`seller_id`,`rfq_id`) USING BTREE;

--
-- Indexes for table `rfq_inquiries_histories`
--
ALTER TABLE `rfq_inquiries_histories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rfq_items`
--
ALTER TABLE `rfq_items`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `schema_groups`
--
ALTER TABLE `schema_groups`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `uoms`
--
ALTER TABLE `uoms`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `mobile` (`mobile`);

--
-- Indexes for table `user_groups`
--
ALTER TABLE `user_groups`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `vendor_material_stocks`
--
ALTER TABLE `vendor_material_stocks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `vendor_temps`
--
ALTER TABLE `vendor_temps`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `vendor_temp_otps`
--
ALTER TABLE `vendor_temp_otps`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `account_groups`
--
ALTER TABLE `account_groups`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `acos`
--
ALTER TABLE `acos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=180;

--
-- AUTO_INCREMENT for table `admin_users`
--
ALTER TABLE `admin_users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `aros`
--
ALTER TABLE `aros`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `aros_acos`
--
ALTER TABLE `aros_acos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `asn_footers`
--
ALTER TABLE `asn_footers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `asn_headers`
--
ALTER TABLE `asn_headers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `buyer_seller_users`
--
ALTER TABLE `buyer_seller_users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `delivery_details`
--
ALTER TABLE `delivery_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT for table `documents`
--
ALTER TABLE `documents`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `groups`
--
ALTER TABLE `groups`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `item_schedule_messages`
--
ALTER TABLE `item_schedule_messages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `po_footers`
--
ALTER TABLE `po_footers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `po_headers`
--
ALTER TABLE `po_headers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `po_item_schedules`
--
ALTER TABLE `po_item_schedules`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4049;

--
-- AUTO_INCREMENT for table `product_attributes`
--
ALTER TABLE `product_attributes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `product_sub_categories`
--
ALTER TABLE `product_sub_categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `pr_footers`
--
ALTER TABLE `pr_footers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `pr_headers`
--
ALTER TABLE `pr_headers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `purchasing_organizations`
--
ALTER TABLE `purchasing_organizations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `rfqs`
--
ALTER TABLE `rfqs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `rfq_communications`
--
ALTER TABLE `rfq_communications`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `rfq_details`
--
ALTER TABLE `rfq_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=110;

--
-- AUTO_INCREMENT for table `rfq_for_sellers`
--
ALTER TABLE `rfq_for_sellers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `rfq_inquiries`
--
ALTER TABLE `rfq_inquiries`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `rfq_inquiries_histories`
--
ALTER TABLE `rfq_inquiries_histories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `rfq_items`
--
ALTER TABLE `rfq_items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `schema_groups`
--
ALTER TABLE `schema_groups`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `uoms`
--
ALTER TABLE `uoms`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `user_groups`
--
ALTER TABLE `user_groups`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `vendor_material_stocks`
--
ALTER TABLE `vendor_material_stocks`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `vendor_temps`
--
ALTER TABLE `vendor_temps`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `vendor_temp_otps`
--
ALTER TABLE `vendor_temp_otps`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `product_sub_categories`
--
ALTER TABLE `product_sub_categories`
  ADD CONSTRAINT `cons_prod_id` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
