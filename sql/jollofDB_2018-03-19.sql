-- phpMyAdmin SQL Dump
-- version 4.7.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Mar 19, 2018 at 04:12 PM
-- Server version: 5.6.35
-- PHP Version: 7.1.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `jollofDB`
--

-- --------------------------------------------------------

--
-- Table structure for table `accountaddresses`
--

CREATE TABLE `accountaddresses` (
  `id` int(11) NOT NULL,
  `accountid` int(255) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `phone` char(20) DEFAULT NULL,
  `phone2` char(20) DEFAULT NULL,
  `address` text NOT NULL,
  `cityid` int(255) NOT NULL,
  `stateid` int(255) NOT NULL,
  `createdat` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updatedat` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `deletedat` timestamp NULL DEFAULT NULL,
  `isdeleted` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `accountaddresses`
--

INSERT INTO `accountaddresses` (`id`, `accountid`, `firstname`, `lastname`, `phone`, `phone2`, `address`, `cityid`, `stateid`, `createdat`, `updatedat`, `deletedat`, `isdeleted`) VALUES
(1, 1, 'Ademibo', 'Opeyemi', NULL, NULL, 'No 30 school road ', 495, 25, '2017-11-02 15:56:34', '2017-11-02 15:56:34', NULL, 0),
(2, 1, 'Oye', 'Admin', '08080886654', '029272222', 'No 15 main close avn.', 483, 25, '2017-11-02 15:58:34', '2017-11-02 15:56:34', NULL, 0),
(3, 5, 'Prince', 'test', '2323456789', '', '30 rasaki Tijani Street, Ikotun', 17, 2, '2018-02-02 12:25:35', '2018-02-02 12:25:35', NULL, 0);

-- --------------------------------------------------------

--
-- Table structure for table `accounts`
--

CREATE TABLE `accounts` (
  `id` int(11) NOT NULL,
  `firstname` char(200) NOT NULL DEFAULT '',
  `lastname` char(200) DEFAULT NULL,
  `gender` char(11) DEFAULT NULL,
  `email` char(200) NOT NULL DEFAULT '',
  `password` char(200) NOT NULL DEFAULT '',
  `phone` char(200) DEFAULT NULL,
  `phone2` char(200) DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '0',
  `image` varchar(255) NOT NULL,
  `token` char(200) DEFAULT NULL,
  `admin_read_status` tinyint(4) NOT NULL DEFAULT '0',
  `createdat` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updatedat` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `deletedat` timestamp NULL DEFAULT NULL,
  `isdeleted` tinyint(1) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `accounts`
--

INSERT INTO `accounts` (`id`, `firstname`, `lastname`, `gender`, `email`, `password`, `phone`, `phone2`, `status`, `image`, `token`, `admin_read_status`, `createdat`, `updatedat`, `deletedat`, `isdeleted`) VALUES
(1, 'Oye\'s', 'Segun', 'male', 'oye@ebs.com', '21232f297a57a5a743894a0e4a801fc3', '08080786656', '', 1, '4272f7683b.jpg', NULL, 0, '2017-10-07 00:34:09', '2018-02-20 13:48:12', NULL, 0),
(2, 'trivin', 'Oye', 'male', 'talk2mitchy4cool@yahoo.com', '0192023a7bbd73250516f069df18b500', '08080696622', NULL, 1, '4272f7683b.jpg', NULL, 0, '2017-12-05 15:54:25', '2017-12-13 14:47:04', NULL, 0),
(5, 'trivin', 'segun', 'male', 'trivin98@gmail.com', '21232f297a57a5a743894a0e4a801fc3', '08080696623', '', 1, '', NULL, 0, '2017-12-13 10:40:08', '0000-00-00 00:00:00', NULL, 0);

-- --------------------------------------------------------

--
-- Table structure for table `bannertype`
--

CREATE TABLE `bannertype` (
  `id` int(11) NOT NULL,
  `bannertypename` varchar(200) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `bannertype`
--

INSERT INTO `bannertype` (`id`, `bannertypename`, `status`) VALUES
(1, 'Homepage Banner', 1),
(2, 'Homepage Center ', 1),
(3, 'Restaurant Page ads', 1);

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `restaurantid` int(11) NOT NULL,
  `slug` char(200) DEFAULT NULL,
  `categoryname` char(200) DEFAULT NULL,
  `arrangecategory` int(11) DEFAULT '1',
  `categorystatus` tinyint(4) NOT NULL DEFAULT '1',
  `createdat` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updatedat` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `deletedat` timestamp NULL DEFAULT NULL,
  `isdeleted` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `restaurantid`, `slug`, `categoryname`, `arrangecategory`, `categorystatus`, `createdat`, `updatedat`, `deletedat`, `isdeleted`) VALUES
(1, 3, 'Swallow', 'Swallow', 1, 1, '2017-10-09 08:56:13', '2018-03-17 23:18:03', NULL, 0),
(2, 3, 'Soups', 'Soups', 2, 1, '2017-10-09 08:56:13', '2018-03-17 20:19:52', NULL, 0),
(3, 3, 'drinks-1', 'Drinks', 2, 1, '2017-10-09 08:57:45', '2018-03-17 22:51:02', NULL, 0),
(4, 3, 'Meat', 'Meat', 1, 1, '2017-10-09 08:57:45', '2018-03-17 20:20:03', NULL, 0),
(5, 2, 'Swallow', 'Swallow', 1, 1, '2017-10-09 09:03:49', '2018-03-17 20:20:08', NULL, 0),
(6, 2, 'Soup', 'Soup', 1, 1, '2017-10-09 09:03:49', '2018-03-17 20:20:13', NULL, 0),
(7, 2, 'Add-Ups', 'Add Ups', 1, 1, '2017-10-09 09:03:49', '2018-03-17 20:21:03', NULL, 0),
(8, 2, 'meat', 'Meat', 1, 1, '2017-10-09 09:03:49', '2018-03-17 20:20:26', NULL, 0),
(9, 2, 'fish', 'Fish', 1, 1, '2017-10-09 09:03:49', '2018-03-17 20:20:30', NULL, 0),
(10, 2, 'drinks', 'Drinks', 1, 1, '2017-10-09 09:03:49', '2018-03-17 20:20:38', NULL, 0),
(11, 2, 'main-menu', 'Main Menu', 0, 1, '2017-11-02 11:41:39', '2018-03-17 20:20:56', NULL, 0),
(12, 3, 'main-menu', 'Main Menu', 0, 1, '2017-11-02 11:41:39', '2018-03-17 20:20:59', NULL, 0);

-- --------------------------------------------------------

--
-- Table structure for table `categories_cusine`
--

CREATE TABLE `categories_cusine` (
  `id` int(11) NOT NULL,
  `slug` char(200) NOT NULL DEFAULT '',
  `categoryname` char(200) NOT NULL DEFAULT '',
  `arrangecategory` int(11) DEFAULT '100',
  `status` tinyint(4) NOT NULL DEFAULT '1',
  `createdat` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updatedat` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `deletedat` timestamp NULL DEFAULT NULL,
  `isdeleted` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `categories_cusine`
--

INSERT INTO `categories_cusine` (`id`, `slug`, `categoryname`, `arrangecategory`, `status`, `createdat`, `updatedat`, `deletedat`, `isdeleted`) VALUES
(1, 'african-food', 'African food', 1, 1, '2018-03-15 20:14:56', '2018-03-17 23:19:42', NULL, 0),
(2, 'fast-food', 'Fast Food', 100, 1, '2018-03-15 20:15:40', '2018-03-15 20:15:40', NULL, 0),
(3, 'casual-dining', 'Casual Dining', 100, 1, '2018-03-15 20:16:26', '2018-03-15 20:16:26', NULL, 0),
(4, 'chinese', 'Chinese', 100, 1, '2018-03-15 20:18:50', '2018-03-15 20:19:51', NULL, 0),
(5, 'desserts', 'Desserts', 100, 1, '2018-03-15 20:19:33', '2018-03-15 20:19:48', NULL, 0),
(6, 'continental', 'Continental', 100, 1, '2018-03-15 20:21:13', '2018-03-15 20:21:29', NULL, 0),
(7, 'barbecue', 'Barbecue', 100, 1, '2018-03-15 20:23:39', '2018-03-15 20:23:39', NULL, 0),
(8, 'cafeteria', 'Cafeteria', 100, 1, '2018-03-15 20:25:41', '2018-03-15 20:25:41', NULL, 0),
(9, 'oriental', 'Oriental', 100, 1, '2018-03-15 20:47:55', '2018-03-15 20:47:55', NULL, 0),
(10, 'bakery', 'Bakery', 100, 1, '2018-03-15 20:48:37', '2018-03-15 20:48:37', NULL, 0),
(11, 'cafe', 'Cafe', 100, 1, '2018-03-15 20:49:06', '2018-03-15 20:49:06', NULL, 0);

-- --------------------------------------------------------

--
-- Table structure for table `categories_fashion`
--

CREATE TABLE `categories_fashion` (
  `id` int(11) NOT NULL,
  `slug` char(200) DEFAULT NULL,
  `categoryname` char(200) DEFAULT NULL,
  `categoryparentid` int(11) NOT NULL DEFAULT '0',
  `arrangecategory` int(11) DEFAULT '1',
  `status` tinyint(4) NOT NULL DEFAULT '1',
  `createdat` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updatedat` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `deletedat` timestamp NULL DEFAULT NULL,
  `isdeleted` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `categories_fashion`
--

INSERT INTO `categories_fashion` (`id`, `slug`, `categoryname`, `categoryparentid`, `arrangecategory`, `status`, `createdat`, `updatedat`, `deletedat`, `isdeleted`) VALUES
(1, 'womens-clothing', 'Women\'s Clothing', 0, 1, 1, '2018-01-22 15:41:02', '2018-01-23 21:24:53', NULL, 0),
(2, 'mens-clothing', 'Men\'s Clothing', 0, 2, 1, '2018-01-22 15:41:18', '2018-01-23 21:24:57', NULL, 0),
(3, 'jewelry-watches', 'Jewelry & Watches', 0, 3, 1, '2018-01-22 15:42:04', '2018-01-23 21:27:06', NULL, 0),
(4, 'bags-shoes', 'Bags & Shoes', 0, 4, 1, '2018-01-22 15:42:23', '2018-01-23 21:27:12', NULL, 0),
(5, 'kids-babys', 'Kids & Babys', 0, 5, 1, '2018-01-22 15:42:57', '2018-02-28 14:18:20', NULL, 0),
(6, 'sportoutdoors-wears', 'Sport&Outdoors Wears', 0, 6, 1, '2018-01-22 15:43:16', '2018-01-23 21:27:22', NULL, 0),
(7, 'much-more', 'Much More', 0, 7, 1, '2018-01-22 15:43:28', '2018-01-23 20:28:56', NULL, 0),
(8, 'tops-dresses-sets', 'Tops & Dresses Sets', 1, 1, 1, '2018-01-24 15:03:37', '2018-02-28 15:15:51', NULL, 0),
(9, 'bottoms', 'Bottoms', 1, 2, 1, '2018-01-24 15:05:07', '2018-01-24 15:05:07', NULL, 0),
(10, 'outwear-jackets', 'Outwear & Jackets', 1, 3, 1, '2018-01-24 15:05:33', '2018-01-24 15:05:42', NULL, 0),
(11, 'accessories', 'Accessories', 1, 4, 1, '2018-01-24 15:06:05', '2018-01-24 15:06:05', NULL, 0),
(12, 'jeans', 'Jeans', 9, 1, 1, '2018-01-24 15:11:53', '2018-01-24 15:12:13', NULL, 0),
(13, 'shorts', 'Shorts', 9, 2, 1, '2018-01-24 15:13:13', '2018-01-24 15:57:31', NULL, 0),
(14, 'skirts', 'Skirts', 9, 3, 1, '2018-01-24 15:14:37', '2018-01-24 15:57:32', NULL, 0),
(15, 'pants-capris', 'Pants & Capris', 9, 4, 1, '2018-01-24 15:15:20', '2018-01-24 15:57:33', NULL, 0),
(16, 'leggings', 'Leggings', 9, 5, 1, '2018-01-24 15:15:40', '2018-01-24 15:57:34', NULL, 0),
(17, 'dresses', 'Dresses', 8, 1, 1, '2018-01-24 15:17:04', '2018-01-24 15:17:04', NULL, 0),
(18, 'blouses-shirts', 'Blouses & Shirts', 8, 2, 1, '2018-01-24 15:17:22', '2018-01-24 15:56:43', NULL, 0),
(19, 'suits-sets', 'Suits & Sets', 8, 3, 1, '2018-01-24 15:17:58', '2018-01-24 15:56:44', NULL, 0),
(20, 'jumpsuits', 'Jumpsuits', 8, 4, 1, '2018-01-24 15:18:28', '2018-01-24 15:56:46', NULL, 0),
(21, 'rompers', 'Rompers', 8, 5, 1, '2018-01-24 15:18:51', '2018-01-24 15:56:56', NULL, 0),
(22, 'basic-jackets', 'Basic Jackets', 10, 1, 1, '2018-01-24 15:19:44', '2018-01-24 15:19:44', NULL, 0),
(23, 'women-bags', 'Women Bags', 11, 1, 1, '2018-01-24 15:22:33', '2018-01-28 15:23:31', NULL, 0),
(24, 'glasses', 'Glasses', 11, 1, 1, '2018-01-24 15:21:29', '2018-01-28 15:22:34', NULL, 0),
(25, 'scarves-wraps', 'Scarves & Wraps', 11, 1, 1, '2018-01-24 15:21:54', '2018-01-24 15:21:54', NULL, 0),
(26, 'caps-hats', 'Caps & Hats', 11, 1, 1, '2018-01-24 15:22:31', '2018-01-24 15:22:31', NULL, 0),
(27, 'outwear-jackets', 'Outwear & Jackets', 2, 1, 1, '2018-01-24 15:05:33', '2018-01-24 15:24:00', NULL, 0),
(28, 'pants-jeans', 'Pants & Jeans', 2, 2, 1, '2018-01-24 15:24:54', '2018-01-24 15:24:54', NULL, 0),
(29, 'sweaters', 'Sweaters', 2, 3, 1, '2018-01-24 15:25:14', '2018-01-24 15:25:14', NULL, 0),
(30, 'gloves-mittens', 'Gloves & Mittens', 11, 1, 1, '2018-01-24 15:21:08', '2018-01-24 15:21:08', NULL, 0),
(31, 'women-shoes', 'Women Shoes', 11, 1, 1, '2018-01-24 15:22:33', '2018-01-28 15:47:40', NULL, 0);

-- --------------------------------------------------------

--
-- Table structure for table `ci_sessions`
--

CREATE TABLE `ci_sessions` (
  `id` varchar(128) NOT NULL,
  `ip_address` varchar(45) NOT NULL,
  `timestamp` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `data` blob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `ci_sessions`
--

INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES
('d9701733c412cf0542895e1f038707c4d9457757', '::1', 1521468255, 0x5f5f63695f6c6173745f726567656e65726174657c693a313532313436383235353b557365725f69647c733a323a223235223b726573745f69647c733a313a2233223b66697273745f6e616d657c733a333a226f7933223b6c6173745f6e616d657c733a363a2274726976696e223b456d61696c7c733a31313a226f7965406562732e636f6d223b547970657c733a31303a2272657374617572616e74223b6c6f676765645f696e7c623a313b),
('f38aba15f86392c499fcfdae26b7e9ca30a7fb84', '::1', 1521467838, 0x5f5f63695f6c6173745f726567656e65726174657c693a313532313436373833383b557365725f69647c733a323a223235223b726573745f69647c733a313a2233223b66697273745f6e616d657c733a333a226f7933223b6c6173745f6e616d657c733a363a2274726976696e223b456d61696c7c733a31313a226f7965406562732e636f6d223b547970657c733a31303a2272657374617572616e74223b6c6f676765645f696e7c623a313b),
('a2dfb190f0513ac89bf41c930dbeee1486a94528', '::1', 1521468932, 0x5f5f63695f6c6173745f726567656e65726174657c693a313532313436383933323b557365725f69647c733a323a223235223b726573745f69647c733a313a2233223b66697273745f6e616d657c733a333a226f7933223b6c6173745f6e616d657c733a363a2274726976696e223b456d61696c7c733a31313a226f7965406562732e636f6d223b547970657c733a31303a2272657374617572616e74223b6c6f676765645f696e7c623a313b),
('e21b2b33c9ecdef2cd857107cc45367ce5b0230f', '::1', 1521470282, 0x5f5f63695f6c6173745f726567656e65726174657c693a313532313437303238323b),
('ad87fa8a31398cd684afd1a07a21b0ed7187acc2', '::1', 1521469980, 0x5f5f63695f6c6173745f726567656e65726174657c693a313532313436393938303b557365725f69647c733a323a223235223b726573745f69647c733a313a2233223b66697273745f6e616d657c733a333a226f7933223b6c6173745f6e616d657c733a363a2274726976696e223b456d61696c7c733a31313a226f7965406562732e636f6d223b547970657c733a31303a2272657374617572616e74223b6c6f676765645f696e7c623a313b),
('f9ab45a6930631a392a6f6be532a8eb19b6b71f9', '::1', 1521469092, 0x5f5f63695f6c6173745f726567656e65726174657c693a313532313436393039323b),
('ca4f3484f6357a21cf503b7524913649ccd4fee9', '::1', 1521469506, 0x5f5f63695f6c6173745f726567656e65726174657c693a313532313436393530363b),
('d0b798b460ba7083331f31479eef9f7aff5906a5', '::1', 1521469808, 0x5f5f63695f6c6173745f726567656e65726174657c693a313532313436393830383b),
('b15c9ccade0306c092bc79cee27a6930e3d9c47b', '::1', 1521470671, 0x5f5f63695f6c6173745f726567656e65726174657c693a313532313437303637313b557365725f69647c733a323a223235223b726573745f69647c733a313a2233223b66697273745f6e616d657c733a333a226f7933223b6c6173745f6e616d657c733a363a2274726976696e223b456d61696c7c733a31313a226f7965406562732e636f6d223b547970657c733a31303a2272657374617572616e74223b6c6f676765645f696e7c623a313b),
('0c09d0554ce041e1a2356023469f511ea7ae9f75', '::1', 1521470282, 0x5f5f63695f6c6173745f726567656e65726174657c693a313532313437303238323b),
('873297f70d3a3406bd13557eab4380b194c1a702', '::1', 1521471003, 0x5f5f63695f6c6173745f726567656e65726174657c693a313532313437313030333b557365725f69647c733a323a223235223b726573745f69647c733a313a2233223b66697273745f6e616d657c733a333a226f7933223b6c6173745f6e616d657c733a363a2274726976696e223b456d61696c7c733a31313a226f7965406562732e636f6d223b547970657c733a31303a2272657374617572616e74223b6c6f676765645f696e7c623a313b),
('aee29334f723e694f0928f0be5ec6e87ac8ce1ae', '::1', 1521471314, 0x5f5f63695f6c6173745f726567656e65726174657c693a313532313437313331343b557365725f69647c733a323a223235223b726573745f69647c733a313a2233223b66697273745f6e616d657c733a333a226f7933223b6c6173745f6e616d657c733a363a2274726976696e223b456d61696c7c733a31313a226f7965406562732e636f6d223b547970657c733a31303a2272657374617572616e74223b6c6f676765645f696e7c623a313b),
('8d3f946a1ec06661c46df86770b7e55c49ae3a2c', '::1', 1521471635, 0x5f5f63695f6c6173745f726567656e65726174657c693a313532313437313633353b557365725f69647c733a323a223235223b726573745f69647c733a313a2233223b66697273745f6e616d657c733a333a226f7933223b6c6173745f6e616d657c733a363a2274726976696e223b456d61696c7c733a31313a226f7965406562732e636f6d223b547970657c733a31303a2272657374617572616e74223b6c6f676765645f696e7c623a313b),
('a170cb874c82d00e9532188136acba9adf00b008', '::1', 1521472117, 0x5f5f63695f6c6173745f726567656e65726174657c693a313532313437323131373b557365725f69647c733a323a223235223b726573745f69647c733a313a2233223b66697273745f6e616d657c733a333a226f7933223b6c6173745f6e616d657c733a363a2274726976696e223b456d61696c7c733a31313a226f7965406562732e636f6d223b547970657c733a31303a2272657374617572616e74223b6c6f676765645f696e7c623a313b),
('35ce3b6b109dacc31c9a6b27673259ca83713794', '::1', 1521472328, 0x5f5f63695f6c6173745f726567656e65726174657c693a313532313437323131373b557365725f69647c733a323a223235223b726573745f69647c733a313a2233223b66697273745f6e616d657c733a333a226f7933223b6c6173745f6e616d657c733a363a2274726976696e223b456d61696c7c733a31313a226f7965406562732e636f6d223b547970657c733a31303a2272657374617572616e74223b6c6f676765645f696e7c623a313b);

-- --------------------------------------------------------

--
-- Table structure for table `color_tbl`
--

CREATE TABLE `color_tbl` (
  `id` int(20) NOT NULL,
  `colorname` varchar(255) CHARACTER SET latin1 DEFAULT NULL,
  `colorcode` varchar(255) CHARACTER SET latin1 NOT NULL,
  `status` tinyint(4) DEFAULT '1',
  `createdat` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updatedat` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `deletedat` timestamp NULL DEFAULT NULL,
  `isdeleted` tinyint(4) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `color_tbl`
--

INSERT INTO `color_tbl` (`id`, `colorname`, `colorcode`, `status`, `createdat`, `updatedat`, `deletedat`, `isdeleted`) VALUES
(1, 'White', 'FFFFFF', 1, '2018-01-25 14:39:13', '2018-01-25 14:43:23', NULL, 0),
(2, 'Black', '000000', 1, '2018-01-25 14:43:07', '2018-01-25 14:43:52', NULL, 0),
(3, 'SILVER', 'C0C0C0', 1, '2018-01-25 14:44:01', '2018-01-25 14:44:01', NULL, 0),
(4, 'GRAY', '778899', 1, '2018-01-25 14:44:26', '2018-01-26 05:54:14', NULL, 0),
(5, 'RED', 'FF0000', 1, '2018-01-25 14:44:40', '2018-01-25 14:44:40', NULL, 0),
(7, 'YELLOW', 'FFFF00', 1, '2018-01-25 14:45:17', '2018-01-25 14:45:17', NULL, 0),
(8, 'LIME', '00FF00', 1, '2018-01-25 14:45:37', '2018-01-25 14:45:37', NULL, 0),
(9, 'GREEN', '008000', 1, '2018-01-25 14:45:49', '2018-01-25 14:45:49', NULL, 0),
(10, 'BLUE', '0000FF', 1, '2018-01-25 14:46:06', '2018-01-25 14:46:06', NULL, 0),
(11, 'NAVY', '000080', 1, '2018-01-25 14:46:27', '2018-01-25 14:46:27', NULL, 0),
(12, 'PURPLE', '800080', 1, '2018-01-25 14:46:36', '2018-01-25 14:46:36', NULL, 0),
(13, 'TEAL', '00BFA5', 1, '2018-01-26 02:04:23', '2018-01-26 02:04:23', NULL, 0),
(14, 'BROWN', '795548', 1, '2018-01-26 02:07:09', '2018-01-26 02:07:09', NULL, 0),
(15, 'GOLD', 'ffd700', 1, '2018-03-09 00:57:28', '2018-03-09 01:55:30', NULL, 0),
(16, 'PINK', 'ffc0cb', 1, '2018-03-09 01:58:26', '2018-03-09 01:58:26', NULL, 0);

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` int(11) NOT NULL,
  `accountid` int(11) NOT NULL,
  `orderlistdetails` int(11) DEFAULT NULL,
  `comment` text NOT NULL,
  `admin_read_status` tinyint(4) NOT NULL DEFAULT '0',
  `status` tinyint(4) NOT NULL DEFAULT '0',
  `createdat` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updatedat` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `deletedat` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `isdeleted` tinyint(4) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `accountid`, `orderlistdetails`, `comment`, `admin_read_status`, `status`, `createdat`, `updatedat`, `deletedat`, `isdeleted`) VALUES
(1, 1, 17, 'cool product', 0, 1, '2017-11-29 16:42:48', '2017-11-29 23:01:14', '0000-00-00 00:00:00', 0);

-- --------------------------------------------------------

--
-- Table structure for table `cuisine_merchant_cate_assign`
--

CREATE TABLE `cuisine_merchant_cate_assign` (
  `id` int(11) UNSIGNED NOT NULL,
  `cat_cusid` int(11) NOT NULL,
  `restaurantid` int(11) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1',
  `createdat` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updatedat` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `deletedat` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `isdeleted` tinyint(4) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `cuisine_merchant_cate_assign`
--

INSERT INTO `cuisine_merchant_cate_assign` (`id`, `cat_cusid`, `restaurantid`, `status`, `createdat`, `updatedat`, `deletedat`, `isdeleted`) VALUES
(1, 1, 3, 1, '2018-03-15 20:43:47', '2018-03-15 20:43:47', '0000-00-00 00:00:00', 0),
(2, 1, 6, 1, '2018-03-15 20:53:43', '2018-03-15 20:53:43', '0000-00-00 00:00:00', 0),
(3, 10, 5, 1, '2018-03-15 20:54:23', '2018-03-15 20:55:05', '0000-00-00 00:00:00', 0),
(4, 11, 5, 1, '2018-03-15 20:55:09', '2018-03-15 20:55:09', '0000-00-00 00:00:00', 0),
(5, 6, 7, 1, '2018-03-15 20:56:24', '2018-03-17 19:02:06', '0000-00-00 00:00:00', 0),
(6, 10, 7, 1, '2018-03-15 20:56:29', '2018-03-17 19:02:08', '0000-00-00 00:00:00', 0),
(7, 11, 7, 1, '2018-03-15 20:56:34', '2018-03-17 19:02:11', '0000-00-00 00:00:00', 0),
(8, 6, 8, 1, '2018-03-15 20:56:49', '2018-03-17 19:02:13', '0000-00-00 00:00:00', 0),
(9, 1, 8, 1, '2018-03-15 20:56:54', '2018-03-17 19:02:15', '0000-00-00 00:00:00', 0),
(10, 10, 9, 1, '2018-03-15 20:57:22', '2018-03-17 19:02:18', '0000-00-00 00:00:00', 0),
(11, 10, 10, 1, '2018-03-15 20:57:40', '2018-03-17 19:02:20', '0000-00-00 00:00:00', 0),
(12, 1, 11, 1, '2018-03-15 20:58:52', '2018-03-19 11:54:27', '0000-00-00 00:00:00', 0),
(13, 4, 11, 1, '2018-03-15 20:58:56', '2018-03-17 19:02:24', '0000-00-00 00:00:00', 0),
(14, 6, 11, 1, '2018-03-15 20:59:04', '2018-03-17 19:02:27', '0000-00-00 00:00:00', 0),
(15, 5, 12, 1, '2018-03-15 21:00:06', '2018-03-17 19:02:29', '0000-00-00 00:00:00', 0),
(16, 6, 12, 1, '2018-03-15 21:00:10', '2018-03-17 19:02:31', '0000-00-00 00:00:00', 0);

-- --------------------------------------------------------

--
-- Table structure for table `email_templates`
--

CREATE TABLE `email_templates` (
  `id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `subject` varchar(200) NOT NULL,
  `content` text NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '0',
  `createdat` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updatedat` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `deletedat` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `isdeleted` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `email_templates`
--

INSERT INTO `email_templates` (`id`, `name`, `subject`, `content`, `status`, `createdat`, `updatedat`, `deletedat`, `isdeleted`) VALUES
(1, 'Registration Confirmation', 'Thank you for registering at {site_name}!', '<!DOCTYPE html PUBLIC \"-//W3C//DTD XHTML 1.0 Transitional//EN\" \"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd\">\r\n<html xmlns=\"http://www.w3.org/1999/xhtml\">\r\n<head>\r\n<meta http-equiv=\"Content-Type\" content=\"text/html; charset=utf-8\" />\r\n<title>Untitled Document</title>\r\n\r\n</head>\r\n\r\n<body>\r\n\r\n<style>\r\n\r\n.container {\r\n  padding-right: 15px;\r\n  padding-left: 15px;\r\n   width:90%;\r\n  margin-right: auto;\r\n  margin-left: auto;\r\n}\r\n\r\n.col-md-12{\r\n  padding-right: 15px;\r\n  padding-left: 15px;\r\n  \r\n}\r\n\r\n.mail-welcome-hdr{\r\n font-size:18px;\r\n padding-top:10px;\r\n padding-bottom:10px;\r\n  margin-bottom:10px;\r\n margin-top:10px;\r\n  background-color: #e74c3c;\r\n  text-transform: uppercase;\r\n  font-family:Verdana, Geneva, sans-serif;\r\n  font-weight: 700;\r\n color:#fff;\r\n text-align:center;\r\n}\r\n\r\n.mail-msg-usr-hdr{\r\n font-weight:600;\r\n}\r\n\r\n.mail-msg-cnt ul{\r\n  padding-left:15px;\r\n}\r\n\r\n.mail-msg-cnt ul li{\r\n margin-top:10px;\r\n  margin-bottom:10px; \r\n}\r\n\r\n.msg-mail-cnct{\r\n  color: #317EAC;\r\n font-weight:600;\r\n}\r\n\r\n.msg-mail-cnct a{\r\n  text-decoration:none;\r\n color: #317EAC;\r\n}\r\n\r\n.mail-cust-name{\r\n  font-weight:600;\r\n}\r\n.mail-msg-usr-btn{\r\n font-size:18px;\r\n padding:10px;\r\n background-color: #e74c3c;\r\n  text-transform: uppercase;\r\n  font-family:Verdana, Geneva, sans-serif;\r\n  font-weight: 700;\r\n color:#fff;\r\n   text-decoration: none;\r\n}\r\n.tp-contacts{\r\n  padding-top:3px;\r\n  overflow:auto;\r\n  text-align:center;\r\n}\r\n\r\n.tp-contacts ul{\r\n padding-left:0px;\r\n display: inline-block;\r\n}\r\n\r\n.tp-contacts ul li{\r\n  float:left;\r\n display:inline-block;\r\n margin-left:5px;\r\n  margin-right:5px; \r\n  padding-right:15px;\r\n padding-left:10px;\r\n  font-family: \"AlegreyaSansSC-Thin\";\r\n font-size:14px;\r\n font-weight:600;\r\n  border-right:1px solid #000;\r\n}\r\n\r\n.tp-contacts ul li:last-child{\r\n border:none;\r\n  padding-right:0px;\r\n  margin-right:0px;\r\n}\r\n\r\n.top-logo{\r\n  text-align:center;\r\n}\r\n\r\n</style>\r\n\r\n<div class=\"\" style=\"padding-bottom:30px; padding-top:30px; padding-left:0px; padding-right:0px; background-color:#cccccc; \">\r\n\r\n  <div class=\"container\" style=\"background-color:#fff; padding-bottom:20px; padding-top:20px;\">\r\n    \r\n     <div class=\"col-md-12\">\r\n         \r\n            <div class=\"tp-contacts\">\r\n                        \r\n                <ul>\r\n                    <li>Email: info@jollof.com</li>\r\n                    <li>Phone no: +234 (909) 532 5236</li>\r\n                </ul>\r\n                \r\n            </div>\r\n            \r\n            <div class=\"top-logo\">\r\n             \r\n                <img src=\"{site_logo}\" />\r\n                \r\n            </div>\r\n\r\n            \r\n        </div>\r\n        \r\n        <div class=\"col-md-12\">\r\n          \r\n            <div class=\"mail-welcome-hdr\">\r\n              Welcome to Jollof\r\n            </div>\r\n            \r\n        </div>\r\n        \r\n        <div class=\"col-md-12\">\r\n        \r\n          <div class=\"\" style=\"margin-bottom:10px; padding-left:10px; line-height:25px;\">\r\n             \r\n                Dear <span class=\"mail-cust-name\">{customer_name},</span> <br/>\r\n                \r\n                <p>Thanks for registering at jollof.com, Your participation is appreciated. </p>\r\n                 \r\n    <p>\r\n     Please confirm your account by clicking the button below:\r\n   </p>\r\n    \r\n    <div style=\"text-align:; padding-bottom:20px; padding-top:10px;\">\r\n     <a class=\"mail-msg-usr-btn\" href=\"{url_confirm}\">Confirm </a>\r\n                \r\n   </div>\r\n\r\n            </div>\r\n            \r\n            <div class=\"\" style=\"color:#fff; padding-bottom:10px; padding-top:10px; background-color:#3b4248; margin-top:10px; margin-bottom:10px; padding-left:10px; line-height:25px;\">\r\n             Use the following when prompted to login <br />\r\n                \r\n                <span class=\"mail-msg-usr-hdr\">Username:</span> {customer_email} <br />\r\n                <span class=\"mail-msg-usr-hdr\">Password:</span> the password provided on signup <br />\r\n                 {voucher} \r\n                \r\n            </div>\r\n            \r\n            \r\n\r\n       If you have any questions, please feel free to contact us at <span class=\"msg-mail-cnct\">info@jollof.com</span> or by phone at <span class=\"msg-mail-cnct\">+234 (909) 532 5236 | +234 (909) 532 5226</span>. \r\n            </div>\r\n            \r\n        </div>\r\n        \r\n    </div>\r\n    \r\n</div>\r\n\r\n</body>\r\n</html>', 1, '2017-11-14 06:04:02', '2017-12-04 14:10:57', '0000-00-00 00:00:00', 0),
(2, 'Password Reset', 'Password Reset Confirmation for {customer_name}!', '<!DOCTYPE html PUBLIC \"-//W3C//DTD XHTML 1.0 Transitional//EN\" \"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd\">\r\n<html xmlns=\"http://www.w3.org/1999/xhtml\">\r\n<head>\r\n<meta http-equiv=\"Content-Type\" content=\"text/html; charset=utf-8\" />\r\n<title>Untitled Document</title>\r\n\r\n</head>\r\n\r\n<body>\r\n\r\n<style>\r\n\r\n.container {\r\n  padding-right: 15px;\r\n  padding-left: 15px;\r\n   width:90%;\r\n  margin-right: auto;\r\n  margin-left: auto;\r\n}\r\n\r\n.col-md-12{\r\n  padding-right: 15px;\r\n  padding-left: 15px;\r\n  \r\n}\r\n\r\n.mail-welcome-hdr{\r\n font-size:18px;\r\n padding-top:10px;\r\n padding-bottom:10px;\r\n  margin-bottom:10px;\r\n margin-top:10px;\r\n  background-color: #e74c3c;\r\n  text-transform: uppercase;\r\n  font-family:Verdana, Geneva, sans-serif;\r\n  font-weight: 700;\r\n color:#fff;\r\n text-align:center;\r\n}\r\n\r\n.mail-msg-usr-hdr{\r\n font-weight:600;\r\n}\r\n\r\n.mail-msg-cnt ul{\r\n  padding-left:15px;\r\n}\r\n\r\n.mail-msg-cnt ul li{\r\n margin-top:10px;\r\n  margin-bottom:10px; \r\n}\r\n\r\n.msg-mail-cnct{\r\n  color: #317EAC;\r\n font-weight:600;\r\n}\r\n\r\n.msg-mail-cnct a{\r\n  text-decoration:none;\r\n color: #DC214C;\r\n}\r\n\r\n.mail-cust-name{\r\n  font-weight:600;\r\n}\r\n\r\n.tp-contacts{\r\n  padding-top:3px;\r\n  overflow:auto;\r\n  text-align:center;\r\n}\r\n\r\n.tp-contacts ul{\r\n padding-left:0px;\r\n display: inline-block;\r\n}\r\n\r\n.tp-contacts ul li{\r\n  float:left;\r\n display:inline-block;\r\n margin-left:5px;\r\n  margin-right:5px; \r\n  padding-right:15px;\r\n padding-left:10px;\r\n  font-family: \"candara\";\r\n font-size:14px;\r\n font-weight:600;\r\n  border-right:1px solid #000;\r\n}\r\n\r\n.tp-contacts ul li:last-child{\r\n border:none;\r\n  padding-right:0px;\r\n  margin-right:0px;\r\n}\r\n\r\n.top-logo{\r\n  text-align:center;\r\n}\r\n\r\n</style>\r\n\r\n<div class=\"\" style=\"padding-bottom:30px; padding-top:30px; padding-left:0px; padding-right:0px; background-color:#cccccc; \">\r\n\r\n  <div class=\"container\" style=\"background-color:#fff; padding-bottom:20px; padding-top:20px;\">\r\n    \r\n     <div class=\"col-md-12\">\r\n         \r\n            <div class=\"tp-contacts\">\r\n                        \r\n                <ul>\r\n                    <li>Email: info@jollof.com</li>\r\n                    <li>Phone no: +234 (909) 532 5236</li>\r\n                </ul>\r\n                \r\n            </div>\r\n            \r\n            <div class=\"top-logo\">\r\n             \r\n                <img src=\"{site_logo}\" />\r\n                \r\n            </div>\r\n\r\n            \r\n        </div>\r\n        \r\n        <div class=\"col-md-12\">\r\n          \r\n            <div class=\"mail-welcome-hdr\">\r\n              Password Reset\r\n            </div>\r\n            \r\n        </div>\r\n        \r\n        <div class=\"col-md-12\">\r\n        \r\n         <div class=\"\" style=\"margin-bottom:10px; padding-left:10px; line-height:25px;\">\r\n             \r\n                Dear <span class=\"mail-cust-name\">{customer_name},</span> <br/>\r\n                \r\n                <p>There was recently a request to change the password for your account. </p>\r\n                \r\n               <p>If you requested this password change, please click on the following link to reset your password:\r\n</p>\r\n\r\n       <p>\r\n                 <span class=\"msg-mail-cnct\">{reset_link}</span>\r\n                </p>\r\n\r\n       <p>\r\n                 If clicking the link does not work, please copy and paste the URL into your browser instead.\r\n                </p>\r\n                \r\n                <p>\r\n                 If you did not make this request, you can ignore this message and your password will remain the same. \r\n                </p>\r\n                \r\n            </div>\r\n            \r\n            <div class=\"mail-msg-cnt\" style=\"margin-top:10px; margin-bottom:10px; padding-left:10px; padding-right:10px;s\">\r\n             \r\n                If you have any questions, please feel free to contact us at <span class=\"msg-mail-cnct\">info@jollof.com</span> or by phone at <span class=\"msg-mail-cnct\">+234 (909) 532 5236 | +234 (909) 532 5226</span>. \r\n            </div>\r\n            \r\n        </div>\r\n        \r\n    </div>\r\n    \r\n</div>\r\n\r\n</body>\r\n</html>', 1, '2017-11-14 06:04:02', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0),
(3, 'Order Submitted Confirmation', 'Thank you for your order with {site_name}!', '<!DOCTYPE html PUBLIC \"-//W3C//DTD XHTML 1.0 Transitional//EN\" \"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd\">\n<html xmlns=\"http://www.w3.org/1999/xhtml\">\n<head>\n<meta http-equiv=\"Content-Type\" content=\"text/html; charset=utf-8\" />\n<title>Untitled Document</title>\n\n</head>\n\n<body>\n\n<style>\n\n.col-md-12{\n  padding-right: 15px;\n  padding-left: 15px;\n  \n}\n\n    /*.container {\n        width: 1170px;\n    }\n    \n    .container {\n        width: 970px;\n    }*/\n    \n    .container {\n        width: 80%;\n    }\n    \n    .container {\n        padding-right: 15px;\n        padding-left: 15px;\n        margin-right: auto;\n        margin-left: auto;\n    }\n    \n    * {\n        box-sizing: border-box;\n    }\n    \n    html, body {\n        font-family: Verdana;\n        font-size: 12px;\n    }\n    \n    body {\n        font-family: \"Helvetica Neue\",Helvetica,Arial,sans-serif;\n        font-size: 14px;\n        line-height: 1.42857;\n        color: #333;\n    }\n    \n    html {\n        font-size: 62.5%;\n    }\n    \n    html {\n        font-family: sans-serif;\n    }\n    \n    \n.clearfix::before, .clearfix::after, .container::before, .container::after, .container-fluid::before, .container-fluid::after, .row::before, .row::after, .form-horizontal .form-group::before, .form-horizontal .form-group::after, .btn-toolbar::before, .btn-toolbar::after, .btn-group-vertical > .btn-group::before, .btn-group-vertical > .btn-group::after, .nav::before, .nav::after, .navbar::before, .navbar::after, .navbar-header::before, .navbar-header::after, .navbar-collapse::before, .navbar-collapse::after, .pager::before, .pager::after, .panel-body::before, .panel-body::after, .modal-footer::before, .modal-footer::after {\n    display: table;\n    content: \" \";\n}\n*::before, *::after {\n    box-sizing: border-box;\n}\n\n.col-md-12 {\n    width: 100%;\n}\n\n.col-md-4 {\n    width: 28%;\n}\n\n.col-md-1, .col-md-2, .col-mds-2, .col-md-3, .col-md-4, .col-md-5, .col-md-6, .col-md-7, .col-md-8, .col-md-9, .col-md-10, .col-md-11, .col-md-12 {\n    float: left;\n}\n.col-xs-1, .col-sm-1, .col-md-1, .col-lg-1, .col-xs-2, .col-sm-2, .col-md-2, .col-mds-2, .col-lg-2, .col-xs-3, .col-sm-3, .col-md-3, .col-lg-3, .col-xs-4, .col-sm-4, .col-md-4, .col-lg-4, .col-xs-5, .col-sm-5, .col-md-5, .col-lg-5, .col-xs-6, .col-sm-6, .col-md-6, .col-lg-6, .col-xs-7, .col-sm-7, .col-md-7, .col-lg-7, .col-xs-8, .col-sm-8, .col-md-8, .col-lg-8, .col-xs-9, .col-sm-9, .col-md-9, .col-lg-9, .col-xs-10, .col-sm-10, .col-md-10, .col-lg-10, .col-xs-11, .col-sm-11, .col-md-11, .col-lg-11, .col-xs-12, .col-sm-12, .col-md-12, .col-lg-12 {\n    position: relative;\n    min-height: 1px;\n    padding-right: 15px;\n    padding-left: 15px;\n}\n\n.page-header {\n    padding-bottom: 9px;\n    margin: 40px 0px 20px;\n}\n\nh1, h2, h3, h4, h5, h6 {\n    margin: 10px 0px;\n    font-weight: bold;\n    line-height: 20px;\n    color: #DC214C;\n    font-family: \"candara\";\n    text-rendering: optimizelegibility;\n}\nh2, .h2 {\n    font-size: 30px;\n}\n\n/*.container::after {\n    content: \" \";\n    display: block;\n    height: 0px;\n    clear: both;\n    visibility: hidden;\n}*/\n\n.table-bordered {\n    border: 1px solid #DDD;\n}\n\n.table {\n    width: 95%;\n    margin-bottom: 20px;\n}\n\ntable {\n    max-width: 100%;\n    background-color: transparent;\n}\n\ntable {\n    border-spacing: 0px;\n    border-collapse: collapse;\n}\n\n.table > caption + thead > tr:first-child > th, .table > colgroup + thead > tr:first-child > th, .table > thead:first-child > tr:first-child > th, .table > caption + thead > tr:first-child > td, .table > colgroup + thead > tr:first-child > td, .table > thead:first-child > tr:first-child > td {\n    border-top: 0px none;\n}\n\n.table-bordered > thead > tr > th, .table-bordered > thead > tr > td {\n    border-bottom-width: 2px;\n}\n\n.table-bordered > thead > tr > th, .table-bordered > tbody > tr > th, .table-bordered > tfoot > tr > th, .table-bordered > thead > tr > td, .table-bordered > tbody > tr > td, .table-bordered > tfoot > tr > td {\n    border: 1px solid #DDD;\n}\n\n.table > thead > tr > th {\n    vertical-align: bottom;\n    border-bottom: 2px solid #DDD;\n}\n\n.table > thead > tr > th, .table > tbody > tr > th, .table > tfoot > tr > th, .table > thead > tr > td, .table > tbody > tr > td, .table > tfoot > tr > td {\n    padding: 8px;\n    line-height: 1.42857;\n    vertical-align: top;\n    border-top: 1px solid #DDD;\n}\n\nth {\n    text-align: left;\n}\n\n.table-striped > tbody > tr:nth-child(2n+1) > td, .table-striped > tbody > tr:nth-child(2n+1) > th {\n    background-color: #F9F9F9;\n}\n\n.mail-welcome-hdr{\n    font-size:18px;\n    padding-top:10px;\n    padding-bottom:10px;\n    margin-bottom:10px;\n    margin-top:10px;\n    background-color: #e74c3c;\n    text-transform: uppercase;\n    font-family:Verdana, Geneva, sans-serif;\n    font-weight: 700;\n    color:#fff;\n    text-align:center;\n}\n\n.mail-msg-usr-hdr{\n    font-weight:600;\n}\n\n.mail-msg-cnt ul{\n    padding-left:15px;\n}\n\n.mail-msg-cnt ul li{\n    margin-top:10px;\n    margin-bottom:10px; \n}\n\n.msg-mail-cnct{\n    color: #317EAC;\n    font-weight:600;\n}\n\n.msg-mail-cnct a{\n    text-decoration:none;\n    color: #317EAC;\n}\n\n.mail-cust-name{\n    font-weight:600;\n}\n\n.tp-contacts{\n    padding-top:3px;\n    overflow:auto;\n    text-align:center;\n}\n\n.tp-contacts ul{\n    padding-left:0px;\n    display: inline-block;\n}\n\n.tp-contacts ul li{\n    float:left;\n    display:inline-block;\n    margin-left:5px;\n    margin-right:5px;   \n    padding-right:15px;\n    padding-left:10px;\n    font-family: \"candara\";\n    font-size:14px;\n    font-weight:600;\n    border-right:1px solid #000;\n}\n\n.tp-contacts ul li:last-child{\n    border:none;\n    padding-right:0px;\n    margin-right:0px;\n}\n\n.top-logo{\n    text-align:center;\n}\n\n</style>\n\n<div class=\"\" style=\"padding-bottom:30px; padding-top:30px; padding-left:2%; padding-right:2%; background-color:#cccccc; overflow: auto;\">\n\n    <div class=\"container\">\n        \n        <div class=\"col-md-12\" style=\"background-color:#fff; padding-bottom:20px; padding-top:20px; padding-left:0px; padding-right:25px;\">\n        \n            <div class=\"col-md-12\">\n                \n                <div class=\"tp-contacts\">\n                            \n                    <ul>\n                        <li>Email: info@jollof.com</li>\n                        <li>Phone no: +234 (909) 532 5236</li>\n                    </ul>\n                    \n                </div>\n                \n                <div class=\"top-logo\">\n                    \n                    <img src=\"{site_logo}\" />\n                    \n                </div>\n    \n                \n            </div>\n            \n            <div class=\"col-md-12\">\n                \n                <div class=\"mail-welcome-hdr\">\n                    Order Confirmation\n                </div>\n                \n            </div>\n            \n            <div class=\"col-md-12\">\n            \n                <div class=\"\" style=\"margin-bottom:10px; padding-left:10px; line-height:25px;\">\n                    \n                    Dear <span class=\"mail-cust-name\">{customer_name},</span> <br/>\n                   \n                    <p>Thank you for your order with {site_name}! </p>\n                  \n                   <p>{order_summary}</p>\n    \n                    \n                </div>\n    \n                <div class=\"mail-msg-cnt\" style=\"margin-top:10px; margin-bottom:10px; padding-left:10px; padding-right:10px;s\">\n    \n                   If you have any questions, please feel free to contact us at <span class=\"msg-mail-cnct\">info@jollof.com</span> or by phone at <span class=\"msg-mail-cnct\">+234 (909) 532 5236 | +234 (909) 532 5226</span>. \n                </div>\n                \n            </div>\n        \n        </div>\n        \n    </div>\n    \n</div>\n\n</body>\n</html>\n', 1, '2017-11-14 06:04:02', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0);

-- --------------------------------------------------------

--
-- Table structure for table `img_ads`
--

CREATE TABLE `img_ads` (
  `id` int(11) NOT NULL,
  `imageurl` varchar(200) DEFAULT NULL,
  `imagename` varchar(200) NOT NULL,
  `arrangeimage` int(11) NOT NULL DEFAULT '1',
  `bannertypeid` int(11) NOT NULL,
  `usertype` varchar(200) NOT NULL,
  `userid` int(11) DEFAULT NULL,
  `username` varchar(200) NOT NULL,
  `useremail` varchar(200) NOT NULL,
  `userphone` char(20) NOT NULL,
  `useradd` varchar(200) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '0',
  `startdate` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
  `enddate` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `admin_read_status` tinyint(4) NOT NULL DEFAULT '0',
  `createdat` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updatedat` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `deletedat` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `isdeleted` tinyint(4) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `img_ads`
--

INSERT INTO `img_ads` (`id`, `imageurl`, `imagename`, `arrangeimage`, `bannertypeid`, `usertype`, `userid`, `username`, `useremail`, `userphone`, `useradd`, `status`, `startdate`, `enddate`, `admin_read_status`, `createdat`, `updatedat`, `deletedat`, `isdeleted`) VALUES
(1, NULL, 'food.png', 1, 1, 'admin', 1, 'ebs', 'admin@ebs.com', '0808099223', '', 1, '2017-12-03 12:42:25', '0000-00-00 00:00:00', 0, '2017-11-29 11:02:10', '2017-12-03 12:42:25', '0000-00-00 00:00:00', 0),
(2, 'http://en.muzmo.ru/info?id=46821400&show_lyrics=orig', 'food.png', 2, 1, 'third', 0, 'Weak Joe', 'weak@boyoo.com', '08080808765', 'music', 0, '2017-12-09 08:55:43', '0000-00-00 00:00:00', 0, '2017-11-30 11:13:54', '2017-12-09 08:55:43', '0000-00-00 00:00:00', 0),
(3, NULL, 'fo.png', 1, 2, 'admin', 1, 'ebs', 'admin@ebs.com', '0808007433', '', 1, '2017-11-29 11:13:54', '0000-00-00 00:00:00', 0, '2017-11-29 11:13:54', '2017-11-29 11:13:54', '0000-00-00 00:00:00', 0),
(4, 'http://en.muzmo.ru/info?id=46821400&show_lyrics=orig', 'CPRimagefor landingpagebanner(beneath).png', 2, 1, 'third ', 0, 'Weak Joe', 'weak@boyoo.com', '08080808765', 'music', 1, '2017-12-02 14:46:16', '0000-00-00 00:00:00', 0, '2017-11-29 11:14:40', '2017-12-02 14:46:16', '0000-00-00 00:00:00', 0),
(5, NULL, 'fo.png', 1, 2, 'restaurant', 3, 'Bukka Hats', 'admin@bukkahat.com', '080831123343', '', 1, '2017-11-29 13:28:27', '2017-12-27 23:00:00', 0, '2017-11-29 11:14:40', '2017-11-29 13:28:27', '0000-00-00 00:00:00', 0),
(6, NULL, 'friedricecombo(chicken)N1100.jpg', 1, 2, 'admin', NULL, '', '', '', '', 1, '2017-11-29 13:41:39', '0000-00-00 00:00:00', 0, '2017-11-29 13:41:39', '2017-11-29 13:41:39', '0000-00-00 00:00:00', 0),
(7, NULL, 'friedriceN300.jpg', 1, 2, 'admin', 1, '', '', '', '', 1, '2017-11-29 13:41:39', '0000-00-00 00:00:00', 0, '2017-11-29 13:41:39', '2017-11-29 13:41:39', '0000-00-00 00:00:00', 0),
(8, NULL, 'friedfishN400.jpg', 1, 2, 'admin', 1, '', '', '', '', 1, '2017-11-29 13:41:39', '0000-00-00 00:00:00', 0, '2017-11-29 13:41:39', '2017-11-29 13:41:39', '0000-00-00 00:00:00', 0),
(9, NULL, 'EjaKikaN500.jpg', 1, 2, 'admin', 1, '', '', '', '', 0, '2017-11-29 13:41:39', '0000-00-00 00:00:00', 0, '2017-11-29 13:41:39', '2017-11-29 13:41:39', '0000-00-00 00:00:00', 0),
(10, NULL, 'eggN70.jpg', 1, 2, 'admin', 1, '', '', '', '', 1, '2017-11-29 13:41:39', '0000-00-00 00:00:00', 0, '2017-11-29 13:41:39', '2017-11-29 13:41:39', '0000-00-00 00:00:00', 0),
(11, NULL, 'eforiroN200.jpg', 1, 2, 'admin', 1, '', '', '', '', 0, '2017-11-29 13:41:39', '0000-00-00 00:00:00', 0, '2017-11-29 13:41:39', '2017-11-29 13:41:39', '0000-00-00 00:00:00', 0),
(12, NULL, 'edikaikongN250.jpg', 1, 2, 'third', NULL, 'ada', 'chin@ada.com', '', '', 0, '2017-11-29 14:18:34', '0000-00-00 00:00:00', 0, '2017-11-29 13:41:39', '2017-11-29 14:18:34', '0000-00-00 00:00:00', 0),
(13, NULL, 'ebaN100.JPG', 1, 2, 'restaurant', 4, '', '', '', '', 1, '2017-11-30 14:59:53', '2017-12-19 23:00:00', 0, '2017-11-29 13:41:39', '2017-11-30 14:59:53', '0000-00-00 00:00:00', 0),
(14, NULL, 'chickenN600.jpg', 1, 2, 'restaurant', 3, '', '', '', '', 0, '2017-11-29 13:58:52', '2018-01-30 23:00:00', 0, '2017-11-29 13:41:39', '2017-11-29 13:58:52', '0000-00-00 00:00:00', 0),
(15, NULL, 'catfishpeppersoupN2000.jpg', 1, 2, 'restaurant', 1, '', '', '', '', 0, '2017-11-29 13:59:11', '2018-01-05 23:00:00', 0, '2017-11-29 13:41:39', '2017-11-29 13:59:11', '0000-00-00 00:00:00', 0),
(16, NULL, 'beefN50each.jpg', 1, 2, 'restaurant', 3, '', '', '', '', 0, '2017-11-29 13:59:27', '2017-12-26 23:00:00', 0, '2017-11-29 13:41:39', '2017-11-29 13:59:27', '0000-00-00 00:00:00', 0),
(17, NULL, 'beansN100.jpg', 1, 2, 'third', NULL, 'dav', 'joe', 'joedav@gmail.com', '', 0, '2017-11-29 13:41:39', '0000-00-00 00:00:00', 0, '2017-11-29 13:41:39', '2017-11-29 13:41:39', '0000-00-00 00:00:00', 0),
(18, NULL, 'assortedmeat.jpg', 1, 2, 'restaurant', 2, '', '', '', '', 0, '2017-11-29 15:49:21', '2018-01-30 23:00:00', 0, '2017-11-29 13:41:39', '2017-11-29 15:49:21', '0000-00-00 00:00:00', 0),
(19, NULL, 'asarocombo.jpg', 1, 3, 'restaurant', 3, '', '', '', '', 1, '2017-11-30 15:19:30', '0000-00-00 00:00:00', 0, '2017-11-29 13:41:39', '2017-11-30 15:19:30', '0000-00-00 00:00:00', 0);

-- --------------------------------------------------------

--
-- Table structure for table `orderlistdetails`
--

CREATE TABLE `orderlistdetails` (
  `id` int(11) NOT NULL,
  `ordercode` varchar(255) NOT NULL,
  `restaurantid` int(20) NOT NULL,
  `productid` int(11) DEFAULT NULL,
  `product_fashionid` int(11) DEFAULT NULL,
  `orderid` int(11) DEFAULT NULL,
  `productname` varchar(255) NOT NULL,
  `addedmenu` text,
  `quantity` int(200) DEFAULT NULL,
  `price` int(11) DEFAULT NULL,
  `color` char(255) DEFAULT NULL,
  `size` char(255) DEFAULT NULL,
  `vat` int(200) NOT NULL,
  `note` text NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  `cancledordercomment` text,
  `read_status` int(11) NOT NULL DEFAULT '0',
  `admin_read_status` int(11) NOT NULL DEFAULT '0',
  `createdat` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updatedat` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `deletedat` timestamp NULL DEFAULT NULL,
  `isdeleted` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `orderlistdetails`
--

INSERT INTO `orderlistdetails` (`id`, `ordercode`, `restaurantid`, `productid`, `product_fashionid`, `orderid`, `productname`, `addedmenu`, `quantity`, `price`, `color`, `size`, `vat`, `note`, `status`, `cancledordercomment`, `read_status`, `admin_read_status`, `createdat`, `updatedat`, `deletedat`, `isdeleted`) VALUES
(1, 'ORD-C5DCA222C11996', 3, 1, NULL, 3, 'Coconut Rice', NULL, 1, 400, NULL, NULL, 50, ' ', 4, NULL, 1, 1, '2017-11-04 17:49:44', '2018-01-16 13:07:33', NULL, 0),
(2, 'ORD-5a08e8f0e73abHF', 3, 2, NULL, 3, 'Ewa-Riro', NULL, 1, 400, NULL, NULL, 50, ' ', 4, NULL, 1, 1, '2017-11-04 17:49:44', '2018-01-16 13:07:33', NULL, 0),
(5, 'ORD-520C6A001280EE4', 3, 4, NULL, 4, 'Egusi', NULL, 1, 250, NULL, NULL, 50, ' ', 1, NULL, 1, 1, '2017-11-04 22:40:37', '2018-01-16 13:07:33', NULL, 0),
(6, 'ORD-DB32F6863F5F2D', 3, 5, NULL, 1, 'Pounded Yam', NULL, 1, 400, NULL, NULL, 50, ' ', 1, NULL, 1, 1, '2017-11-04 22:42:09', '2018-01-16 13:07:33', NULL, 0),
(7, 'ORD-ED9C62D795F54', 2, 7, NULL, 1, 'Ofada Rice', NULL, 1, 300, NULL, NULL, 50, ' ', 3, NULL, 0, 1, '2017-11-04 22:43:36', '2018-01-16 13:07:33', NULL, 0),
(8, 'ORD-B9C6DD8EDD82A', 2, 7, NULL, 4, 'Ofada Rice', NULL, 1, 300, NULL, NULL, 50, ' ', 3, NULL, 0, 1, '2017-11-04 22:47:32', '2018-01-16 13:07:33', NULL, 0),
(9, 'ORD-075630E17686441', 3, 1, NULL, 2, 'Coconut Rice', NULL, 1, 400, NULL, NULL, 50, ' ', 3, NULL, 1, 1, '2017-11-04 23:56:07', '2018-01-16 13:07:33', NULL, 0),
(10, 'ORD-F7F23E7FB7F579', 3, 1, NULL, 2, 'Coconut Rice', NULL, 1, 400, NULL, NULL, 50, ' ', 2, NULL, 1, 1, '2017-11-04 23:58:06', '2018-01-16 13:07:33', NULL, 0),
(11, 'ORD-1B027269AA976', 2, 7, NULL, 4, 'Ofada Rice', NULL, 1, 300, NULL, NULL, 50, ' ', 1, NULL, 0, 1, '2017-11-05 01:03:10', '2018-01-16 13:07:33', NULL, 0),
(12, 'ORD-9E33D52C58822', 2, 7, NULL, 18, 'Ofada Rice', NULL, 1, 300, NULL, NULL, 50, ' ', 1, NULL, 0, 1, '2017-11-05 01:24:00', '2018-01-16 13:07:33', NULL, 0),
(13, 'ORD-645A7DBF9C9104', 2, 7, NULL, 19, 'Ofada Rice', NULL, 1, 300, NULL, NULL, 50, ' ', 3, NULL, 0, 1, '2017-11-05 01:40:11', '2018-01-16 13:07:33', NULL, 0),
(14, 'ORD-85938CFF651AF20', 3, 1, NULL, 20, 'Coconut Rice', NULL, 1, 400, NULL, NULL, 50, ' ', 2, NULL, 1, 1, '2017-11-05 01:47:04', '2018-01-16 13:07:33', NULL, 0),
(16, 'ORD-A82C346DFB543', 3, 1, NULL, 21, 'Coconut Rice', NULL, 1, 400, NULL, NULL, 50, ' ', 5, 'out of stock', 1, 1, '2017-11-05 01:49:07', '2018-02-23 10:46:18', NULL, 0),
(17, 'ORD-C70279BFC47A4', 2, 7, NULL, 21, 'Ofada Rice', NULL, 1, 300, NULL, NULL, 50, ' ', 4, NULL, 0, 1, '2017-11-05 01:49:07', '2018-01-16 13:07:33', NULL, 0),
(18, 'ORD-28FD23A2E863F', 3, 2, NULL, 22, 'Ewa-Riro', NULL, 2, 400, NULL, NULL, 50, ' ', 3, NULL, 1, 1, '2017-11-06 15:23:00', '2018-01-16 13:07:33', NULL, 0),
(19, 'ORD-91BF3C61597D200', 1, 1, NULL, 22, 'Coconut Rice', NULL, 1, 400, NULL, NULL, 50, ' ', 3, NULL, 0, 1, '2017-11-06 15:23:00', '2018-01-16 13:07:33', NULL, 0),
(20, 'ORD-9D6085EDDEEB', 3, 6, NULL, 24, 'Beef', NULL, 1, 250, NULL, NULL, 50, ' ', 4, NULL, 1, 1, '2017-11-21 02:26:26', '2018-01-16 13:07:33', NULL, 0),
(29, 'ORD-84C8313977E6E', 3, 2, NULL, 31, 'Ewa-Riro', NULL, 2, 400, NULL, NULL, 50, ' ', 4, NULL, 1, 1, '2017-11-22 13:35:05', '2018-01-16 13:07:33', NULL, 0),
(30, 'ORD-B66A1AFB68EB', 3, 2, NULL, 32, 'Ewa-Riro', NULL, 1, 450, NULL, NULL, 0, ' ', 4, NULL, 1, 1, '2017-12-07 20:38:52', '2018-01-16 13:07:33', NULL, 0),
(31, 'ORD-B66A1AFB68EB', 3, 6, NULL, 32, 'Beef', NULL, 1, 250, NULL, NULL, 0, ' ', 4, NULL, 1, 1, '2017-12-07 20:38:52', '2018-01-16 13:07:33', NULL, 0),
(32, 'ORD-B66A1AFB68EB', 2, 7, NULL, 32, 'Ofada Rice', NULL, 1, 300, NULL, NULL, 0, ' ', 4, NULL, 0, 1, '2017-12-07 20:38:52', '2018-01-16 13:07:33', NULL, 0),
(38, 'ORD-0FEC90126CFE', 3, 1, NULL, 39, 'Coconut Rice', '                                                                                                            \r\n                                                                <div class=\"added_menu\">\r\n                                                                    <table class=\" \">     \r\n                                                                        <tbody>\r\n                                                                            <tr>\r\n                                                                                <td>Beef</td>\r\n                                                                                <td class=\"text-center\">3qty </td>\r\n                                                                                <td class=\"text-right\"> ₦500.5</td>\r\n                                                                            </tr>\r\n                                                                        </tbody>\r\n                                                                    </table>\r\n                                                                </div>\r\n\r\n                                                                                                                                                                ', 4, 1902, NULL, NULL, 0, ' ', 1, NULL, 1, 1, '2017-12-14 15:21:19', '2018-01-16 13:07:33', NULL, 0),
(39, 'ORD-656DEE21A91A', 3, 6, NULL, 41, 'Beef', NULL, 1, 250, NULL, NULL, 0, ' ', 2, NULL, 1, 1, '2017-12-23 10:49:48', '2018-01-16 13:07:33', NULL, 0),
(40, 'ORD-656DEE21A91A', 3, 4, NULL, 41, 'Egusi', NULL, 1, 250, NULL, NULL, 0, ' ', 4, NULL, 1, 1, '2017-12-23 10:49:48', '2018-01-16 13:07:33', NULL, 0),
(41, 'ORD-656DEE21A91A', 3, 3, NULL, 41, 'Water bottle with rice', NULL, 1, 100, NULL, NULL, 0, ' ', 1, NULL, 1, 1, '2017-12-23 10:49:48', '2018-01-16 13:07:33', NULL, 0),
(42, 'ORD-656DEE21A91A', 3, 2, NULL, 41, 'Ewa-Riro', NULL, 2, 800, NULL, NULL, 0, ' ', 1, NULL, 1, 1, '2017-12-23 10:49:48', '2018-01-16 13:07:33', NULL, 0),
(43, 'ORD-8715DE680674', 3, 1, NULL, 42, 'Coconut Rice', '                                                                                                            \r\n                                                                <div class=\"added_menu\">\r\n                                                                    <table class=\" \">     \r\n                                                                        <tbody>\r\n                                                                            <tr>\r\n                                                                                <td>Beef</td>\r\n                                                                                <td class=\"text-center\">1qty </td>\r\n                                                                                <td class=\"text-right\"> ₦500.5</td>\r\n                                                                            </tr>\r\n                                                                        </tbody>\r\n                                                                    </table>\r\n                                                                </div>\r\n\r\n                                                            \r\n                                                                <div class=\"added_menu\">\r\n                                                                    <table class=\" \">     \r\n                                                                        <tbody>\r\n                                                                            <tr>\r\n                                                                                <td>Water bottle with rice</td>\r\n                                                                                <td class=\"text-center\">1qty </td>\r\n                                                                                <td class=\"text-right\"> ₦450.9</td>\r\n                                                                            </tr>\r\n                                                                        </tbody>\r\n                                                                    </table>\r\n                                                                </div>\r\n\r\n                                                                                                                                                                ', 3, 2151, NULL, NULL, 0, ' ', 1, NULL, 1, 1, '2018-01-16 13:07:14', '2018-01-16 13:08:14', NULL, 0),
(44, 'ORD-CK9UGQC4JEQW', 3, 8, NULL, 44, 'testing', '', 1, 200, NULL, NULL, 0, '', 5, 'pleas out for now', 1, 1, '2018-02-23 08:55:27', '2018-03-07 10:53:06', NULL, 0),
(45, 'ORD-FPABULZZYA2P', 3, 16, NULL, 44, 'Beans', '', 1, 300, NULL, NULL, 0, '', 1, NULL, 1, 1, '2018-02-23 08:55:27', '2018-03-07 10:53:06', NULL, 0),
(46, 'ORD-MJUVEM44AFCH', 3, 6, NULL, 44, 'Beef', '', 2, 500, NULL, NULL, 0, '', 1, NULL, 1, 1, '2018-02-23 08:55:27', '2018-03-07 10:53:06', NULL, 0),
(48, 'ORD-JW6TR2QWWP73', 3, 13, NULL, 46, 'Oporopo Soup', '                                                                                                                            <div class=\"added_menu\">\r\n                                                                    <table class=\" \">     \r\n                                                                        <tbody>\r\n                                                                            <tr>\r\n                                                                                <td>+ stock meat</td>\r\n                                                                                <td class=\"text-center\">1qty </td>\r\n                                                                                <td class=\"text-right\"> ₦100</td>\r\n                                                                            </tr>\r\n                                                                        </tbody>\r\n                                                                    </table>\r\n                                                                </div>\r\n                                                                                                                            <div class=\"added_menu\">\r\n                                                                    <table class=\" \">     \r\n                                                                        <tbody>\r\n                                                                            <tr>\r\n                                                                                <td>+ Cat Fish</td>\r\n                                                                                <td class=\"text-center\">1qty </td>\r\n                                                                                <td class=\"text-right\"> ₦200</td>\r\n                                                                            </tr>\r\n                                                                        </tbody>\r\n                                                                    </table>\r\n                                                                </div>\r\n                                                                                                                    ', 1, 700, NULL, NULL, 0, '', 5, 'close for the day', 1, 1, '2018-02-23 09:12:39', '2018-03-07 10:53:06', NULL, 0),
(49, 'ORD-6YCKPRVEW9HD', 3, 3, NULL, 47, 'Water bottle with rice', '', 1, 100, NULL, NULL, 0, '', 5, NULL, 1, 1, '2018-02-23 09:13:47', '2018-03-07 10:53:06', NULL, 0),
(50, 'ORD-6GDT98WV90W1', 16, NULL, 16, 48, 'MIDUO Brand 2017 Hot Design Swimwear Sexy Bandage Bathing Suits Push Up Brazilian Bikini Digital Printing Women Bikinis', '', 1, 4500, '03-BROWN', 'S', 0, '', 1, NULL, 1, 1, '2018-02-23 09:13:47', '2018-03-07 10:53:06', NULL, 0),
(53, 'ORD-7ESWVEBQYJHD', 3, 8, NULL, 49, 'testing', '', 4, 600, NULL, NULL, 0, '', 1, NULL, 1, 1, '2018-03-06 14:07:51', '2018-03-07 10:53:06', NULL, 0),
(54, 'ORD-E6NHBDTUATB7', 16, NULL, 6, 49, 'MIDUO Brand 2017 Hot Design Swimwear Sexy Bandage Bathing Suits Push Up Brazilian Bikini Digital Printing Women Bikinis', '', 1, 4500, '03-BROWN', 'M', 0, '', 2, NULL, 1, 1, '2018-03-06 14:07:51', '2018-03-07 10:53:06', NULL, 0);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `accountid` int(11) NOT NULL,
  `reference` varchar(255) NOT NULL,
  `accountaddressid` int(11) NOT NULL,
  `vat` float NOT NULL,
  `additionalcharges` float NOT NULL,
  `discount` float NOT NULL,
  `couponcode` float NOT NULL,
  `totalordervalue` float NOT NULL,
  `deliverytype` varchar(255) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '0',
  `createdat` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updatedat` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `deletedat` timestamp NULL DEFAULT NULL,
  `isdeleted` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `accountid`, `reference`, `accountaddressid`, `vat`, `additionalcharges`, `discount`, `couponcode`, `totalordervalue`, `deliverytype`, `status`, `createdat`, `updatedat`, `deletedat`, `isdeleted`) VALUES
(1, 1, 'k8e3j5wn1g', 2, 50, 0, 0, 0, 750, 'Card', 1, '2017-11-04 16:49:32', NULL, NULL, 0),
(2, 1, 'aafkxte4vu', 2, 50, 0, 0, 0, 850, 'Card', 1, '2017-11-04 16:57:42', NULL, NULL, 0),
(3, 1, '9kc5n3eblo', 2, 50, 0, 0, 0, 850, 'Card', 1, '2017-11-04 16:58:15', NULL, NULL, 0),
(4, 1, 'ep3g7o489p', 2, 50, 0, 0, 0, 900, 'Card', 1, '2017-11-04 22:30:09', NULL, NULL, 0),
(18, 1, 'h3xpgc3evx68xpu', 1, 50, 0, 0, 0, 350, 'Card', 1, '2017-11-05 01:24:00', NULL, NULL, 0),
(19, 1, 'w3fk5clnj6', 1, 50, 0, 0, 0, 350, 'Card', 1, '2017-11-05 01:39:37', NULL, NULL, 0),
(20, 1, 'oyxtsye5473n5l8', 2, 50, 0, 0, 0, 750, 'Card', 1, '2017-11-05 01:47:04', NULL, NULL, 0),
(21, 1, '9hr3cnu62zi513d', 2, 50, 0, 0, 0, 750, 'Card', 1, '2017-11-05 01:49:07', NULL, NULL, 0),
(22, 1, '2axk730fjp', 1, 50, 0, 0, 0, 1250, 'Card', 1, '2017-11-06 15:21:12', NULL, NULL, 0),
(24, 1, '0qzgonmgql0ej52', 1, 50, 0, 0, 0, 300, 'Card', 1, '2017-11-21 02:26:26', NULL, NULL, 0),
(31, 1, '84c8313977', 2, 0, 0, 0, 0, 850, 'On Delivery ', 1, '2017-11-22 13:35:05', NULL, NULL, 0),
(32, 1, 'b66a1afb68', 1, 0, 0, 0, 0, 1000, 'On Delivery ', 1, '2017-12-07 20:38:52', '2017-12-07 20:38:52', NULL, 0),
(39, 1, '0fec90126c', 2, 0, 0, 0, 0, 1951.5, 'On Delivery ', 1, '2017-12-14 15:21:19', '2017-12-14 15:21:19', NULL, 0),
(40, 1, 'hcb5uo9gdn', 2, 0, 0, 0, 0, 350, 'Card', 0, '2017-12-20 10:22:07', '2017-12-20 10:22:07', NULL, 0),
(41, 1, '742mztwl49', 2, 0, 0, 0, 0, 1450, 'Card', 1, '2017-12-23 10:48:44', '2017-12-23 10:49:48', NULL, 0),
(42, 1, '8715de6806', 2, 0, 0, 0, 0, 2201.4, 'On Delivery ', 1, '2018-01-16 13:07:14', '2018-01-16 13:07:14', NULL, 0),
(43, 5, '9hq9uuap5g', 3, 0, 0, 0, 0, 450, 'Card', 0, '2018-02-02 12:25:44', '2018-02-02 12:25:44', NULL, 0),
(44, 1, '9f545d41f8', 2, 0, 0, 0, 0, 1200, 'On Delivery ', 1, '2018-02-23 08:55:27', '2018-02-23 08:55:27', NULL, 0),
(46, 1, 'a5b7b26314', 2, 0, 0, 0, 0, 750, 'On Delivery ', 1, '2018-02-23 09:12:39', '2018-02-23 09:12:39', NULL, 0),
(47, 1, 'dcad942560', 2, 0, 0, 0, 0, 150, 'On Delivery ', 1, '2018-02-23 09:13:47', '2018-02-23 09:13:47', NULL, 0),
(48, 1, 'ddad354650', 2, 0, 0, 0, 0, 150, 'On Delivery ', 1, '2018-02-23 09:13:47', '2018-03-05 07:02:19', NULL, 0),
(49, 1, '419524317f', 2, 0, 0, 0, 0, 5150, 'On Delivery ', 1, '2018-03-06 14:07:51', '2018-03-06 14:07:51', NULL, 0);

-- --------------------------------------------------------

--
-- Table structure for table `orderstatus`
--

CREATE TABLE `orderstatus` (
  `id` int(11) NOT NULL,
  `orderstatus_desc` char(200) DEFAULT NULL,
  `createdat` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updatedat` timestamp NULL DEFAULT NULL,
  `deletedat` timestamp NULL DEFAULT NULL,
  `isdeleted` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `orderstatus`
--

INSERT INTO `orderstatus` (`id`, `orderstatus_desc`, `createdat`, `updatedat`, `deletedat`, `isdeleted`) VALUES
(1, 'Pending', '2017-11-10 12:15:27', NULL, NULL, 0),
(2, 'Processing', '2017-11-10 12:15:27', NULL, NULL, 0),
(3, 'In Delivery', '2017-11-10 12:15:27', NULL, NULL, 0),
(4, 'Delivered', '2017-11-10 12:15:27', NULL, NULL, 0),
(5, 'Canceled', '2017-11-10 12:15:27', NULL, NULL, 0);

-- --------------------------------------------------------

--
-- Table structure for table `password_reset`
--

CREATE TABLE `password_reset` (
  `id` int(11) NOT NULL,
  `accountid` int(11) NOT NULL,
  `token` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `createdat` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `deletedat` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `isdeleted` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `password_reset`
--

INSERT INTO `password_reset` (`id`, `accountid`, `token`, `email`, `createdat`, `deletedat`, `isdeleted`) VALUES
(4, 1, 'a01c11823e9fa75b977dcc43f1a5a0755926603e', 'oye@ebs.com', '2017-11-14 17:32:03', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(5, 1, '4d9dfb6da5d78e0cf26ed0b8d9bac47f32c0c0c1', 'oye@ebs.com', '2017-11-15 04:50:44', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(6, 1, '3ecc46fe4fe06484b4a63d1968f74d89fa0cccbf', 'oye@ebs.com', '2017-11-15 04:52:57', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(7, 1, 'b43fd76ad63d974bcf525d2da49255ed6c6b4032', 'oye@ebs.com', '2017-11-15 05:09:57', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(8, 1, 'b84047e5e8fca28dab04019a0241a79f1a69593f', 'oye@ebs.com', '2017-11-15 05:14:10', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(9, 1, 'd8667d5d12320352bb0104406997ca7b2105405d', 'oye@ebs.com', '2017-11-15 15:01:45', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(10, 1, '6b3b58ddbd455d248f3eef315d9b0bfdb88b9185', 'oye@ebs.com', '2017-12-05 15:46:24', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(11, 2, 'b1e8d57a76f316473a01beed0b3366354183d7ae', 'trivin98@gmail.com', '2017-12-05 15:55:37', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(12, 2, '4c6a8bd9d9785ebfac38583d18b8ef58aefa615d', 'trivin98@gmail.com', '2017-12-05 15:57:15', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(13, 2, 'f76c3282725b56f5d5d71293faff7e83c18864f3', 'trivin98@gmail.com', '2017-12-05 16:23:47', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(14, 2, 'aadc7da5a78d89ff7b1c55d8cee915466f3b9731', 'trivin98@gmail.com', '2017-12-05 16:28:51', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(15, 2, '8b305b91c28c7e1ff7c4f7845ec09c02533a7648', 'trivin98@gmail.com', '2017-12-05 16:37:07', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(17, 2, 'c382eee8e54b6d46a9b51000a0fc56b632fa396e', 'trivin98@gmail.com', '2017-12-05 16:50:18', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(18, 2, '27b14b20367a305858e5754a656c835848e3b2b2', 'trivin98@gmail.com', '2017-12-05 16:52:36', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(19, 2, 'a6d7e9b4f928e0398bbe7c34f64cce7297ca9b47', 'trivin98@gmail.com', '2017-12-05 16:53:17', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(20, 2, '824cf5e6b2023069ca4c9d9b62df48b06768002e', 'trivin98@gmail.com', '2017-12-05 16:56:40', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(21, 2, '1c4510457e527c6918a5033aed2383d1ea06a730', 'trivin98@gmail.com', '2017-12-05 16:57:44', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(22, 2, 'e013d8db4395896a00454172b880557a10c59195', 'trivin98@gmail.com', '2017-12-05 17:05:22', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(23, 2, '9bbed9bb680f4b31d106d48c33b4e588e9ff70ca', 'trivin98@gmail.com', '2017-12-05 17:07:21', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(24, 2, '72febed62b8120e6517c8dadca0b90812c9b0f94', 'trivin98@gmail.com', '2017-12-05 17:08:32', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(25, 2, 'cfa707ad8c7c0f56d4451b522832aeb6e4050586', 'talk2mitchy4cool@yahoo.com', '2017-12-13 14:47:12', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(26, 5, '2dc8fa2f3c799edada3f104864ee854fb9f07ac3', 'trivin98@gmail.com', '2018-01-24 12:03:15', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(27, 5, '1fdbd95bf585bc7405b61a295aa26a682c64a7b2', 'trivin98@gmail.com', '2018-01-24 12:03:33', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(28, 5, '31e3970be347dd00386b0670e9ab79fe1a1d71da', 'trivin98@gmail.com', '2018-01-24 12:08:37', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(29, 5, 'f19b073832aaf362fecc0f303d1ea503df06e460', 'trivin98@gmail.com', '2018-01-24 12:09:26', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(30, 5, 'ca390be694c58076d93d0c8b80a0c02451b6c58f', 'trivin98@gmail.com', '2018-01-24 12:12:16', '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `price_locations`
--

CREATE TABLE `price_locations` (
  `id` int(11) NOT NULL,
  `restaurantid` int(11) NOT NULL,
  `cityid` int(11) NOT NULL,
  `deliveryprice` double NOT NULL,
  `createdat` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updatedat` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `deletedat` timestamp NULL DEFAULT NULL,
  `isdeleted` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `productimages`
--

CREATE TABLE `productimages` (
  `id` int(255) NOT NULL,
  `restaurantid` int(11) NOT NULL,
  `productid` int(255) DEFAULT NULL,
  `imagename` varchar(255) NOT NULL DEFAULT '',
  `arrange` int(11) DEFAULT '100',
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `createdat` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updatedat` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `deletedat` timestamp NULL DEFAULT NULL,
  `isdeleted` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `productimages`
--

INSERT INTO `productimages` (`id`, `restaurantid`, `productid`, `imagename`, `arrange`, `status`, `createdat`, `updatedat`, `deletedat`, `isdeleted`) VALUES
(1, 16, 2, '16_Blue_Bag1.png', 100, 1, '2018-01-26 01:59:20', '2018-02-15 21:04:20', NULL, 0),
(2, 16, 2, '16_Blue_Bag7.png', 100, 1, '2018-01-26 02:12:11', '2018-01-30 12:57:43', NULL, 0),
(3, 16, 2, '16_Blue_Bag3.png', 100, 1, '2018-01-26 02:13:49', '2018-01-26 06:30:15', NULL, 0),
(4, 16, 2, '16_Blue_Bag4.png', 100, 1, '2018-01-26 02:13:55', '2018-01-26 06:30:21', NULL, 0),
(5, 16, 2, '16_Blue_Bag5.png', 100, 1, '2018-01-26 02:14:02', '2018-01-26 06:30:25', NULL, 0),
(6, 16, 2, '16_Blue_Bag6.png', 100, 1, '2018-01-26 02:14:11', '2018-01-26 06:30:29', NULL, 0),
(7, 16, 1, '16_Black_Plain_Leather2.png', 100, 1, '2018-01-26 02:23:30', '2018-01-26 06:30:34', NULL, 0),
(8, 16, 1, '16_Black_Plain_Leather1.png', 100, 1, '2018-01-26 02:23:45', '2018-01-26 06:30:38', NULL, 0),
(9, 16, 1, '16_Black_Plain_Leather3.png', 100, 1, '2018-01-26 02:24:11', '2018-01-26 06:30:43', NULL, 0),
(10, 16, 3, '16_AligatorSkin1_Red.png', 2, 1, '2018-01-26 06:30:59', '2018-02-17 18:58:54', NULL, 0),
(11, 16, 3, '16_AligatorSkin1.png', 100, 1, '2018-01-26 06:39:28', '2018-02-17 18:52:02', NULL, 0),
(12, 16, 3, '16_AligatorSkin2.png', 1, 1, '2018-01-26 06:30:59', '2018-02-17 18:58:49', NULL, 0),
(13, 16, 3, '16_AligatorSkin3.png', 100, 1, '2018-01-26 06:30:59', '2018-01-26 06:40:44', NULL, 0),
(14, 16, 3, '16_AligatorSkin2_Red.png', 100, 1, '2018-01-26 06:39:28', '2018-02-17 23:20:12', NULL, 0),
(15, 16, 3, '16_AligatorSkin4.png', 100, 1, '2018-01-26 06:30:59', '2018-01-26 06:40:44', NULL, 0),
(18, 16, 5, '16_151925991201.jpg', 100, 1, '2018-02-22 00:38:33', '2018-02-22 00:39:43', NULL, 0),
(19, 16, 5, '16_151925991312.jpg', 100, 1, '2018-02-22 00:38:33', '2018-02-22 00:39:43', NULL, 0),
(20, 16, 5, '16_151925991323.jpg', 100, 1, '2018-02-22 00:38:33', '2018-02-22 00:39:43', NULL, 0),
(21, 16, 5, '16_151925991334.jpg', 2, 1, '2018-02-22 00:38:33', '2018-02-22 00:41:03', NULL, 0),
(22, 16, 5, '16_151925991345.jpg', 100, 1, '2018-02-22 00:38:33', '2018-02-22 00:39:43', NULL, 0),
(23, 16, 5, '16_151925991356.jpg', 100, 1, '2018-02-22 00:38:33', '2018-02-22 00:39:43', NULL, 0),
(24, 16, 5, '16_151925994401.jpg', 100, 1, '2018-02-22 00:39:04', '2018-02-22 00:39:43', NULL, 0),
(25, 16, 5, '16_151925995301.jpg', 100, 1, '2018-02-22 00:39:13', '2018-02-22 00:39:43', NULL, 0),
(26, 16, 6, '16_151926468901.jpg', 100, 1, '2018-02-22 01:58:09', '2018-02-22 01:59:20', NULL, 0),
(27, 16, 6, '16_151926469201.jpg', 100, 1, '2018-02-22 01:58:12', '2018-02-22 01:59:20', NULL, 0),
(28, 16, 6, '16_151926469601.jpg', 100, 1, '2018-02-22 01:58:16', '2018-02-22 01:59:20', NULL, 0),
(29, 16, 6, '16_151926470001.jpg', 100, 1, '2018-02-22 01:58:20', '2018-02-22 01:59:20', NULL, 0),
(30, 16, 6, '16_151926470601.jpg', 100, 1, '2018-02-22 01:58:26', '2018-02-22 01:59:20', NULL, 0),
(31, 16, 6, '16_151926473101.jpg', 100, 1, '2018-02-22 01:58:52', '2018-02-22 11:32:46', NULL, 0),
(32, 16, 6, '16_151926473601.jpg', 100, 1, '2018-02-22 01:58:56', '2018-02-22 01:59:20', NULL, 0),
(33, 16, NULL, '16_151926610301.jpg', 100, 1, '2018-02-22 02:21:43', '2018-02-22 02:21:43', NULL, 0),
(34, 16, NULL, '16_151926612201.jpg', 100, 1, '2018-02-22 02:22:02', '2018-02-22 02:22:02', NULL, 0),
(35, 16, NULL, '16_151926630101.jpg', 100, 1, '2018-02-22 02:25:01', '2018-02-22 02:25:01', NULL, 0),
(36, 16, NULL, '16_151926630101.jpg', 100, 1, '2018-02-22 02:25:01', '2018-02-22 02:25:01', NULL, 0),
(37, 16, NULL, '16_151926631901.jpg', 100, 1, '2018-02-22 02:25:19', '2018-02-22 02:25:19', NULL, 0),
(38, 16, NULL, '16_151926652201.jpg', 100, 1, '2018-02-22 02:28:42', '2018-02-22 02:28:42', NULL, 0);

-- --------------------------------------------------------

--
-- Table structure for table `productmerges`
--

CREATE TABLE `productmerges` (
  `id` int(11) NOT NULL,
  `parentproductid` int(11) NOT NULL,
  `childproductid` int(11) NOT NULL,
  `price` float NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1',
  `createdat` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `deletedat` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `isdeleted` tinyint(4) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `productmerges`
--

INSERT INTO `productmerges` (`id`, `parentproductid`, `childproductid`, `price`, `status`, `createdat`, `deletedat`, `isdeleted`) VALUES
(1, 1, 6, 500.5, 1, '2017-11-02 12:51:34', '0000-00-00 00:00:00', 0),
(2, 1, 3, 450.9, 1, '2017-11-02 12:51:34', '0000-00-00 00:00:00', 0),
(4, 13, 14, 100, 1, '2017-12-19 10:22:40', '0000-00-00 00:00:00', 1),
(5, 13, 15, 200, 1, '2017-12-19 10:22:40', '0000-00-00 00:00:00', 1),
(7, 16, 18, 50, 1, '2017-12-19 10:24:19', '0000-00-00 00:00:00', 0),
(8, 16, 19, 100, 1, '2017-12-19 10:24:19', '0000-00-00 00:00:00', 0);

-- --------------------------------------------------------

--
-- Table structure for table `products_cuisine`
--

CREATE TABLE `products_cuisine` (
  `id` int(11) NOT NULL,
  `restaurantid` int(11) NOT NULL,
  `categoryid` int(11) NOT NULL DEFAULT '0',
  `productname` varchar(250) NOT NULL,
  `productprice` float NOT NULL,
  `productdesc` text NOT NULL,
  `productimage` varchar(250) DEFAULT '',
  `status` tinyint(4) NOT NULL DEFAULT '1',
  `createdat` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updatedat` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `deletedat` timestamp NULL DEFAULT NULL,
  `isdeleted` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `products_cuisine`
--

INSERT INTO `products_cuisine` (`id`, `restaurantid`, `categoryid`, `productname`, `productprice`, `productdesc`, `productimage`, `status`, `createdat`, `updatedat`, `deletedat`, `isdeleted`) VALUES
(1, 3, 12, 'Coconut Rice', 400, 'Rice', '3_coconut_rice.jpg', 1, '2017-10-09 08:50:35', NULL, NULL, 0),
(2, 3, 12, 'Ewa-Riro', 400, 'Beans', '3_ewa_riro.jpg', 1, '2017-10-09 08:50:35', NULL, NULL, 0),
(3, 3, 3, 'Water bottle with rice', 100, 'Cold Drinks', '3_Get-Ice-Cold-Water-Go.jpg', 1, '2017-10-09 09:25:29', '2018-02-18 01:24:37', NULL, 0),
(4, 3, 2, 'Egusi', 250, '', '3_Egusi_soup.jpg', 1, '2017-10-09 09:25:29', NULL, NULL, 0),
(5, 3, 1, 'Pounded Yam', 400, '', '3_pounded_yam.jpg', 1, '2017-10-09 09:34:59', NULL, NULL, 0),
(6, 3, 4, 'Beef', 250, '', '', 1, '2017-10-09 09:34:59', NULL, NULL, 0),
(7, 2, 11, 'Ofada Rice', 300, '', '', 1, '2017-10-09 15:41:41', NULL, NULL, 0),
(8, 3, 12, 'testing', 200, 'cool', '3_1511779654.jpeg', 1, '2017-11-27 10:47:34', NULL, NULL, 0),
(13, 3, 2, 'Oporopo Soup', 400, 'Best in all ', '3_1513783754.jpg', 1, '2017-12-19 10:22:40', '2017-12-20 15:32:33', NULL, 1),
(14, 3, 0, '+ stock meat', 100, '', '', 1, '2017-12-19 10:22:40', '2017-12-19 12:35:21', NULL, 0),
(15, 3, 0, '+ Cat Fish', 200, '', '', 1, '2017-12-19 10:22:40', '2017-12-19 10:22:40', NULL, 0),
(16, 3, 12, 'Beans', 300, 'Good product', '', 1, '2017-12-19 10:24:19', '2017-12-20 13:30:10', NULL, 0),
(17, 3, 0, 'youghut', 50, '', '', 1, '2017-12-19 10:24:19', '2017-12-20 12:42:43', NULL, 0),
(18, 3, 0, '7up', 50, '', '', 1, '2017-12-19 10:24:19', '2017-12-19 10:24:19', NULL, 0),
(19, 3, 0, 'dodo', 100, 'dodo', '', 1, '2017-12-19 10:24:19', '2017-12-20 12:36:09', NULL, 0);

-- --------------------------------------------------------

--
-- Table structure for table `products_fashion`
--

CREATE TABLE `products_fashion` (
  `id` int(11) NOT NULL,
  `merchantid` int(11) NOT NULL,
  `slug` varchar(255) NOT NULL DEFAULT '',
  `productfrontimage` varchar(255) DEFAULT NULL,
  `productname` varchar(250) NOT NULL,
  `productdesc` mediumtext NOT NULL,
  `sales` tinyint(4) NOT NULL DEFAULT '0',
  `discount_percentage` int(250) DEFAULT NULL,
  `productgrand_unit_qty` int(255) NOT NULL,
  `productinstock` int(255) NOT NULL,
  `productrate` int(255) NOT NULL,
  `othernote` mediumtext NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1',
  `createdat` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updatedat` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `deletedat` timestamp NULL DEFAULT NULL,
  `isdeleted` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `products_fashion`
--

INSERT INTO `products_fashion` (`id`, `merchantid`, `slug`, `productfrontimage`, `productname`, `productdesc`, `sales`, `discount_percentage`, `productgrand_unit_qty`, `productinstock`, `productrate`, `othernote`, `status`, `createdat`, `updatedat`, `deletedat`, `isdeleted`) VALUES
(1, 16, 'prada-saffiano-brief-case-bag', '', 'Prada Saffiano Brief Case Bag', 'Italian Saffiano Brief Case Leather black bag features double top handle, detachable purse and side purse, gold tone hardware and zipper, zipper top closure, two main open compartments, one middle compartment with zipper closure. Made in Italy..', 0, NULL, 0, 0, 0, '', 1, '2018-01-25 13:02:30', '2018-02-18 00:53:04', NULL, 0),
(2, 16, 'handheld-bag', NULL, 'Handheld bag', '', 1, 1, 0, 0, 0, '', 1, '2018-01-26 02:11:39', '2018-02-17 13:58:06', NULL, 0),
(3, 16, 'osvaldo-rossi-snake-skin-shoe', NULL, 'Osvaldo Rossi Snake Skin Shoe', 'Grey SNAKE SKIN Italian SHOE', 0, NULL, 0, 0, 0, '', 1, '2018-01-26 05:44:22', '2018-02-19 01:51:32', NULL, 0),
(5, 16, 'lemfo-lef2-android-51-smart-watch-phone-two-modes-mtk6580-quad-core-512mb-8gb-smartwatch-heart-rate-monitor', '16_151925991356.jpg', 'LEMFO LEF2 Android 5.1 Smart Watch Phone Two Modes MTK6580 Quad Core 512MB+ 8GB Smartwatch Heart Rate Monitor', '<ul>\r\n  <li>Brand Name:LEMFO</li>\r\n <li>Function:Answer Call,Message Reminder,Heart Rate Tracker,Call Reminder,Calendar,Dial Call,Alarm Clock,Push Message,Passometer</li>\r\n  <li>APP Download Available:Yes</li>\r\n <li>Band Detachable:No</li>\r\n <li>Band Material:Silica Gel</li>\r\n <li>Language:French,Japanese,Italian,Russian,Indonesian,Turkish,German,Arabic,Spanish,Polish,Portuguese,English,Korean</li>\r\n <li>CPU Model:MTK6580</li>\r\n  <li>Style:Fashion</li>\r\n  <li>RAM:512mb</li>\r\n  <li>Multiple Dials:Yes</li>\r\n <li>Application Age Group:Adult</li>\r\n  <li>Waterproof Grade:Life Waterproof</li>\r\n <li>Compatibility:All Compatible</li>\r\n <li>Screen Size:1.3 inch</li>\r\n <li>Resolution:240*240 Pixel</li>\r\n <li>Mechanism:No</li>\r\n <li>Type:On Wrist</li>\r\n  <li>Battery Detachable:No</li>\r\n  <li>Battery Capacity:&gt;450mAh</li>\r\n  <li>CPU Manufacturer:Mediatek</li>\r\n  <li>Movement Type:Electronic</li>\r\n <li>Screen Shape:Round</li>\r\n <li>Case Material:Alloy</li>\r\n  <li>SIM Card Available:Yes</li>\r\n <li>System:Android OS</li>\r\n  <li>ROM:8GB</li>\r\n  <li>GPS:Yes</li>\r\n  <li>Network Mode:3G</li>\r\n  <li>Rear Camera:2MP</li>\r\n</ul>\r\n', 0, NULL, 0, 0, 0, '', 1, '2018-02-22 00:39:43', '2018-02-22 00:43:06', NULL, 0),
(6, 16, 'miduo-brand-2017-hot-design-swimwear-sexy-bandage-bathing-suits-push-up-brazilian-bikini-digital-printing-women-bikinis', NULL, 'MIDUO Brand 2017 Hot Design Swimwear Sexy Bandage Bathing Suits Push Up Brazilian Bikini Digital Printing Women Bikinis', '<ul>\r\n <li>Brand Name:miduo</li>\r\n <li>Gender:Women</li>\r\n <li>Waist:High Waist</li>\r\n <li>Support Type:Wire Free</li>\r\n <li>With Pad:No</li>\r\n  <li>Pattern Type:Solid,Print,Bordered</li>\r\n  <li>Model Number:80182001</li>\r\n  <li>Material:Polyester</li>\r\n <li>Fit:Fits true to size, take your normal size</li>\r\n <li>Item Type:Bikinis Set</li>\r\n  <li>Applicable Gender:Female</li>\r\n <li>Whether The Steel Drag:With A Chest Pad Without Steel Care</li>\r\n <li>Item No:80182001</li>\r\n <li>Applicable Age:Adult</li>\r\n <li>Fabric Name:Polyester</li>\r\n  <li>Weight:110 (G)</li>\r\n <li>Size:S, M, L, XL</li>\r\n</ul>\r\n', 0, NULL, 0, 0, 0, '', 1, '2018-02-22 01:59:20', '2018-03-06 14:37:43', NULL, 0);

-- --------------------------------------------------------

--
-- Table structure for table `product_fashion_cate_assign`
--

CREATE TABLE `product_fashion_cate_assign` (
  `id` int(11) UNSIGNED NOT NULL,
  `cat_fasid` int(11) NOT NULL,
  `product_fasid` int(11) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1',
  `createdat` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updatedat` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `deletedat` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `isdeleted` tinyint(4) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `product_fashion_cate_assign`
--

INSERT INTO `product_fashion_cate_assign` (`id`, `cat_fasid`, `product_fasid`, `status`, `createdat`, `updatedat`, `deletedat`, `isdeleted`) VALUES
(1, 1, 1, 1, '2018-01-28 15:49:55', '2018-01-28 15:50:20', '0000-00-00 00:00:00', 0),
(2, 11, 1, 1, '2018-01-28 15:50:29', '2018-01-28 15:51:44', '0000-00-00 00:00:00', 0),
(3, 23, 1, 1, '2018-01-28 15:51:28', '2018-01-28 15:51:49', '0000-00-00 00:00:00', 0),
(5, 1, 2, 1, '2018-01-28 15:51:58', '2018-01-28 15:51:58', '0000-00-00 00:00:00', 0),
(6, 11, 2, 1, '2018-01-28 15:52:14', '2018-01-28 15:52:14', '0000-00-00 00:00:00', 0),
(7, 23, 2, 1, '2018-01-28 15:52:24', '2018-01-28 15:52:24', '0000-00-00 00:00:00', 0),
(8, 11, 3, 1, '2018-01-28 15:52:33', '2018-02-17 22:35:28', '0000-00-00 00:00:00', 0),
(9, 1, 3, 1, '2018-01-28 15:52:40', '2018-02-17 22:35:30', '0000-00-00 00:00:00', 0),
(18, 3, 5, 1, '2018-02-22 00:39:43', '2018-02-22 00:58:55', '0000-00-00 00:00:00', 0),
(19, 1, 6, 1, '2018-02-22 01:59:20', '2018-02-22 01:59:20', '0000-00-00 00:00:00', 0),
(20, 8, 6, 1, '2018-02-22 01:59:20', '2018-02-22 01:59:20', '0000-00-00 00:00:00', 0),
(21, 25, 6, 1, '2018-02-22 01:59:20', '2018-02-22 01:59:20', '0000-00-00 00:00:00', 0);

-- --------------------------------------------------------

--
-- Table structure for table `product_qty_color_size`
--

CREATE TABLE `product_qty_color_size` (
  `id` int(11) NOT NULL,
  `productid` int(255) NOT NULL,
  `quantity` int(255) NOT NULL,
  `productinstock` int(11) DEFAULT NULL,
  `sizeid` int(11) DEFAULT NULL,
  `colorid` int(11) DEFAULT NULL,
  `colorimagename` text NOT NULL,
  `colorimage` char(255) DEFAULT NULL,
  `price` double DEFAULT NULL,
  `discount_price` double NOT NULL DEFAULT '0',
  `status` tinyint(4) NOT NULL DEFAULT '1',
  `createdat` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updatedat` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `deletedat` timestamp NULL DEFAULT NULL,
  `isdeleted` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `product_qty_color_size`
--

INSERT INTO `product_qty_color_size` (`id`, `productid`, `quantity`, `productinstock`, `sizeid`, `colorid`, `colorimagename`, `colorimage`, `price`, `discount_price`, `status`, `createdat`, `updatedat`, `deletedat`, `isdeleted`) VALUES
(1, 1, 20, 20, 9, 2, '', NULL, 20000, 0, 1, '2018-01-25 13:10:18', '2018-03-05 03:06:13', NULL, 0),
(2, 2, 10, 10, NULL, 10, '', NULL, 13200, 1320, 1, '2018-01-25 13:10:18', '2018-02-17 23:55:44', NULL, 0),
(3, 2, 10, 8, NULL, 13, '', NULL, 13500, 1350, 1, '2018-01-25 13:10:18', '2018-02-07 22:44:45', NULL, 0),
(4, 3, 7, 7, 9, 4, '', '16_AligatorSkin1.png', 37500, 0, 1, '2018-01-26 05:52:51', '2018-01-26 06:34:37', NULL, 0),
(5, 3, 7, 7, 10, 4, '', '16_AligatorSkin1.png', 37500, 0, 1, '2018-01-26 05:52:51', '2018-01-26 06:34:40', NULL, 0),
(6, 3, 6, 6, 11, 4, '', '16_AligatorSkin1.png', 37500, 0, 1, '2018-01-26 05:52:51', '2018-01-26 06:34:43', NULL, 0),
(7, 3, 5, 5, 11, 5, '', '16_AligatorSkin1_Red.png', 37500, 0, 1, '2018-01-26 05:52:51', '2018-01-26 06:36:53', NULL, 0),
(8, 3, 10, 10, 10, 5, '', '16_AligatorSkin1_Red.png', 37500, 0, 1, '2018-01-26 05:52:51', '2018-01-26 06:36:41', NULL, 0),
(9, 3, 5, 5, 9, 5, '', '16_AligatorSkin1_Red.png', 37500, 0, 1, '2018-01-26 05:52:51', '2018-01-26 06:38:44', NULL, 0),
(14, 5, 20, 20, NULL, 2, 'Black', '16_151925994401.jpg', 28479, 0, 1, '2018-02-22 00:39:43', '2018-02-22 00:39:43', NULL, 0),
(15, 5, 20, 20, NULL, 3, 'SILVER', '16_151925995301.jpg', 28479, 0, 1, '2018-02-22 00:39:43', '2018-02-22 00:39:43', NULL, 0),
(16, 6, 10, 10, 5, 14, '03-BROWN', '16_151926473101.jpg', 4500, 0, 1, '2018-02-22 01:59:20', '2018-03-05 07:08:55', NULL, 0),
(17, 6, 10, 10, 4, 14, 'BROWN', '16_151926473101.jpg', 4500, 0, 1, '2018-02-22 01:59:20', '2018-02-22 11:39:49', NULL, 0),
(18, 6, 10, 10, 3, 14, 'BROWN', '16_151926473101.jpg', 4500, 0, 1, '2018-02-22 01:59:20', '2018-02-22 11:39:54', NULL, 0),
(19, 6, 10, 10, 2, 14, 'BROWN', '16_151926473101.jpg', 4500, 0, 1, '2018-02-22 01:59:20', '2018-03-04 23:19:12', NULL, 0),
(20, 6, 10, 10, 5, 1, 'White', '16_151926473601.jpg', 4500, 0, 1, '2018-02-22 01:59:20', '2018-02-22 01:59:20', NULL, 0),
(21, 6, 10, 10, 4, 1, 'White', '16_151926473601.jpg', 4500, 0, 1, '2018-02-22 01:59:20', '2018-03-04 23:18:04', NULL, 0),
(22, 6, 10, 10, 3, 1, 'White', '16_151926473601.jpg', 4800, 0, 1, '2018-02-22 01:59:20', '2018-03-04 23:18:57', NULL, 0),
(23, 6, 10, 10, 1, 1, 'White', '16_151926473601.jpg', 4500, 0, 1, '2018-02-22 01:59:20', '2018-03-04 21:49:31', NULL, 0);

-- --------------------------------------------------------

--
-- Table structure for table `product_qty_size`
--

CREATE TABLE `product_qty_size` (
  `id` int(11) NOT NULL,
  `product_id` int(255) NOT NULL,
  `quantity` int(255) NOT NULL,
  `sizeid` int(11) NOT NULL,
  `colorid` int(11) DEFAULT NULL,
  `price` double NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1',
  `createdat` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updatedat` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `deletedat` timestamp NULL DEFAULT NULL,
  `isdeleted` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `restaurants`
--

CREATE TABLE `restaurants` (
  `id` int(11) NOT NULL,
  `merchanttype` varchar(200) NOT NULL DEFAULT '',
  `companyname` varchar(200) NOT NULL,
  `slug` varchar(200) DEFAULT NULL,
  `companydesc` text NOT NULL,
  `usersid` int(12) NOT NULL,
  `parentid` int(11) NOT NULL DEFAULT '0',
  `minorder` double DEFAULT NULL,
  `deliverytime` varchar(12) DEFAULT NULL,
  `firstname` varchar(200) NOT NULL,
  `lastname` varchar(200) DEFAULT NULL,
  `gender` varchar(11) DEFAULT NULL,
  `email` varchar(200) NOT NULL,
  `pwd` varchar(200) NOT NULL,
  `phone` char(20) DEFAULT NULL,
  `phone2` char(20) DEFAULT NULL,
  `address` text,
  `cityid` int(11) DEFAULT NULL,
  `stateid` int(11) DEFAULT NULL,
  `country` varchar(200) DEFAULT NULL,
  `logo` varchar(200) DEFAULT NULL,
  `banner` varchar(200) NOT NULL,
  `pickup` tinyint(4) NOT NULL DEFAULT '0',
  `homedelivery` tinyint(4) NOT NULL DEFAULT '1',
  `tablereservation` tinyint(4) NOT NULL DEFAULT '0',
  `vat` int(200) NOT NULL,
  `percharge` int(11) NOT NULL,
  `perchargestatus` tinyint(4) NOT NULL DEFAULT '0',
  `admin_read_status` tinyint(4) NOT NULL DEFAULT '0',
  `status` tinyint(4) NOT NULL DEFAULT '0',
  `createdat` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updatedat` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `deletedat` timestamp NULL DEFAULT NULL,
  `isdeleted` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `restaurants`
--

INSERT INTO `restaurants` (`id`, `merchanttype`, `companyname`, `slug`, `companydesc`, `usersid`, `parentid`, `minorder`, `deliverytime`, `firstname`, `lastname`, `gender`, `email`, `pwd`, `phone`, `phone2`, `address`, `cityid`, `stateid`, `country`, `logo`, `banner`, `pickup`, `homedelivery`, `tablereservation`, `vat`, `percharge`, `perchargestatus`, `admin_read_status`, `status`, `createdat`, `updatedat`, `deletedat`, `isdeleted`) VALUES
(1, 'cuisine', 'Adega Express', NULL, 'MEDITERRANEAN, SANDWICHES,\r\n', 7, 0, NULL, NULL, 'Adega', 'Express', 'male', 'adega@ebs.com', '', NULL, NULL, '31 Fola Osibo Road', 489, 25, NULL, 'res_11.jpeg', '', 0, 1, 0, 0, 0, 0, 0, 1, '2017-10-07 20:37:55', '2018-03-15 21:02:07', NULL, 0),
(2, 'cuisine', 'Better Option', NULL, 'SALADS AND FRUITS, SANDWICHES,', 7, 0, NULL, NULL, 'Better', 'Option', 'male', 'better@ebs.com', '', '08000000000', NULL, '7 Ilu Drive', 488, 25, NULL, 'res_3.png', '', 0, 1, 0, 0, 30, 1, 0, 1, '2017-10-07 20:37:55', '2017-12-07 16:10:38', NULL, 0),
(3, 'cuisine', 'Bukka Hats', NULL, 'Swallow,Finger etc food', 25, 0, 0, '', 'Bukka', 'Huts', 'female', 'admin@bukkahat.com', '', '080831123343', '08048324322', 'Block 69A Plot 8 Admiralty Way', 489, 25, NULL, 'LOGOB53757573.jpeg', '3__banner1513693155.png', 0, 1, 1, 50, 20, 1, 0, 1, '2017-10-07 20:59:00', '2018-01-25 11:56:33', NULL, 0),
(4, 'cuisine', 'CAFE JADE', NULL, 'BREAKFAST, BRITISH, BURGERS, CAFE, CREPE, GRILL & BBQ, NIGERIAN, SALADS AND FRUITS, SANDWICHES, SMALL CHOPS/FINGER FOODS', 25, 0, NULL, NULL, 'cafe', 'jade', 'female', 'info@cafejade.com', '', NULL, NULL, '1139 Bishop Oluwole Street,Victoria Island', 488, 25, NULL, 'LOGOB41472901.jpeg', '', 0, 1, 0, 0, 0, 0, 0, 1, '2017-10-07 20:59:00', '2018-03-16 10:02:38', NULL, 0),
(5, 'cuisine', 'CAFE LICIOUS', NULL, 'AMERICAN, BURGERS, CAFE, JUICES, SANDWICHES,', 7, 0, NULL, NULL, 'cafe', 'licious', 'male', 'info@cafelicious.com', '', NULL, NULL, '60 Allen avenue', 491, 25, NULL, 'LOGOB41371706.png', '', 0, 1, 0, 0, 30, 1, 0, 1, '2017-10-07 21:38:54', '2017-12-07 13:46:51', NULL, 0),
(6, 'cuisine', 'Dotimi (Mobile Pot of Soups)', NULL, 'Nigeria foods', 25, 0, NULL, NULL, 'Dotun', 'dman', 'male', 'order@dotimi.com', '', NULL, NULL, '40 B Ogudu Ojota Road, Ogudu GRA', 491, 25, NULL, 'LOGOB32462705.png', '', 0, 1, 0, 0, 0, 0, 0, 1, '2017-10-07 21:38:54', NULL, NULL, 0),
(7, 'cuisine', 'Gits', NULL, 'BURGERS, CAKES, CONFECTIONERIES, CONTINENTAL, CREPE, PIZZA, SANDWICHES,', 24, 0, NULL, NULL, 'gift', 'ik', 'female', 'get@gits.com', '', NULL, NULL, 'Emerald Shops, Opposite Unilag Main Gate, Akoka', 495, 25, NULL, 'LOGOB45254629.jpeg', '', 0, 1, 0, 0, 0, 0, 0, 1, '2017-10-07 21:38:54', NULL, NULL, 0),
(8, 'cuisine', 'Mama Cass', NULL, 'CONFECTIONERIES, NIGERIAN,', 25, 0, NULL, NULL, 'mama', 'cass', 'female', 'info@mamacass.com', '', NULL, NULL, '4a, Oyeleke Street, Off Kudirat Abiola Way, Alausa', 491, 25, NULL, 'LOGOB38190949.jpeg', '', 0, 1, 0, 0, 0, 0, 0, 1, '2017-10-07 21:38:54', '2017-11-30 00:00:25', NULL, 0),
(9, 'cuisine', 'Pizza House', NULL, 'Pizza', 21, 0, NULL, NULL, 'Pizza', 'house', 'male', 'info@Pizzahouse.com', '', NULL, NULL, 'Adeniran Ogunsanya Shopping Mall, Inside the Food court (Shoprite)', 500, 25, NULL, 'LOGOB45254629.png', '', 0, 1, 0, 0, 20, 1, 0, 1, '2017-10-07 21:38:54', '2017-12-07 13:47:00', NULL, 0),
(10, 'cuisine', 'Pizza House', NULL, 'Pizza', 22, 9, NULL, NULL, 'Pizza', 'house', 'male', 'info@Pizzahouse.com', '', NULL, NULL, 'Ogudu GRA', 491, 25, NULL, 'LOGOB45254629.png', '', 0, 1, 0, 0, 0, 0, 0, 1, '2017-10-07 21:38:54', NULL, NULL, 0),
(11, 'cuisine', 'Otanwa Kitchen', NULL, 'CHINESE, CONTINENTAL, NIGERIAN, SANDWICHES', 14, 0, NULL, NULL, 'Otanwa', 'Kitchen', 'male', 'info@otanwakitchen.com', '', NULL, NULL, '1,Ojileru street,Oworonshoki', 495, 25, NULL, 'LOGOB13169509.png', '', 0, 1, 0, 0, 0, 0, 0, 0, '2017-10-07 21:38:54', '2018-03-19 11:07:26', NULL, 0),
(12, 'cuisine', 'Rhapsody\'s', NULL, 'CONTINENTAL, DESSERTS, GRILL & BBQ, PIZZA(STRICTLY FOR CORPORATE PARTIES AND TABLE RESERVATIONS)', 13, 0, NULL, NULL, 'rhapsody', 'res', 'male', 'info@rhapsody.com', '', NULL, NULL, '19A Agoro Odiyan, Victoria Island', 488, 25, NULL, 'LOGOB32731810.png', '', 0, 1, 0, 0, 20, 1, 0, 0, '2017-10-07 21:53:14', '2018-03-19 11:07:39', NULL, 0),
(13, 'cuisine', 'Melting Moments', NULL, 'DESSERTS', 12, 0, NULL, NULL, '', NULL, 'male', 'info@meltingmoments.com', '', NULL, NULL, '', 491, 25, NULL, 'LOGOB14691591.png', '', 0, 1, 0, 0, 0, 0, 0, 0, '2017-10-07 21:53:14', '2018-03-15 21:02:05', NULL, 0),
(14, 'cuisine', 'Mr Goodfood', NULL, 'Good food ', 11, 0, NULL, NULL, 'John', 'Goodfood', 'female', 'order@mrgoodfood.com', '', NULL, NULL, '128A,Association Way,Dolphin estate.Ikoyi', 488, 25, NULL, NULL, '', 0, 1, 0, 0, 0, 0, 0, 0, '2017-10-07 21:57:56', '2018-03-15 21:01:57', NULL, 0),
(15, 'cuisine', 'YIN YANG', NULL, 'Chinese Foods', 7, 0, NULL, NULL, 'Yin', 'Yang', 'female', 'admin@yinyang.com', '', NULL, NULL, '5, Admiralty Way, Lekki Phase 1', 489, 25, NULL, 'LOGOB73902707.jpeg', '', 0, 1, 0, 0, 0, 0, 0, 0, '2017-10-07 21:57:56', '2018-03-15 21:01:53', NULL, 0),
(16, 'fashion', 'Bongiwe Walazas', 'bongiwe-walazas', '', 25, 0, NULL, NULL, 'Bongiwe', 'Walaza', NULL, 'info@bongiwewalaza.com', '', NULL, NULL, '1292, lake Way, Lekki Phase 1', 489, 25, NULL, 'Bongiwe_Walaza.jpg', '', 0, 1, 0, 0, 0, 0, 0, 1, '2018-01-25 11:31:29', '2018-03-07 10:40:56', NULL, 0);

-- --------------------------------------------------------

--
-- Table structure for table `restaurantstime`
--

CREATE TABLE `restaurantstime` (
  `id` int(11) NOT NULL,
  `restaurantid` int(11) NOT NULL,
  `monopen` varchar(12) DEFAULT NULL,
  `monclose` varchar(12) DEFAULT NULL,
  `monstatus` tinyint(4) NOT NULL DEFAULT '1',
  `tueopen` varchar(12) DEFAULT NULL,
  `tueclose` varchar(12) DEFAULT NULL,
  `tuestatus` tinyint(4) NOT NULL DEFAULT '1',
  `wedopen` varchar(12) DEFAULT NULL,
  `wedclose` varchar(12) DEFAULT NULL,
  `wedstatus` tinyint(4) NOT NULL DEFAULT '1',
  `thuopen` varchar(12) DEFAULT NULL,
  `thuclose` varchar(12) DEFAULT NULL,
  `thustatus` tinyint(4) NOT NULL DEFAULT '1',
  `friopen` varchar(12) DEFAULT NULL,
  `friclose` varchar(12) DEFAULT NULL,
  `fristatus` tinyint(4) NOT NULL DEFAULT '1',
  `satopen` varchar(12) DEFAULT NULL,
  `satclose` varchar(12) DEFAULT NULL,
  `satstatus` tinyint(4) NOT NULL DEFAULT '1',
  `sunopen` varchar(12) DEFAULT NULL,
  `sunclose` varchar(12) DEFAULT NULL,
  `sunstatus` tinyint(4) NOT NULL DEFAULT '1',
  `createdat` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updatedat` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `deletedat` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `isdeleted` tinyint(4) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `restaurantstime`
--

INSERT INTO `restaurantstime` (`id`, `restaurantid`, `monopen`, `monclose`, `monstatus`, `tueopen`, `tueclose`, `tuestatus`, `wedopen`, `wedclose`, `wedstatus`, `thuopen`, `thuclose`, `thustatus`, `friopen`, `friclose`, `fristatus`, `satopen`, `satclose`, `satstatus`, `sunopen`, `sunclose`, `sunstatus`, `createdat`, `updatedat`, `deletedat`, `isdeleted`) VALUES
(4, 1, '09:00:00', '17:00:00', 1, '09:00:00', '18:00:00', 1, '09:00:00', '18:00:00', 1, '09:00:00', '18:00:00', 1, '09:00:00', '18:00:00', 1, '09:00:00', '16:30:00', 1, '09:00:00', '16:30:00', 1, '2017-11-23 13:17:51', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0),
(5, 2, '09:00:00', '18:00:00', 1, '09:00:00', '18:00:00', 1, '09:00:00', '18:00:00', 1, '09:00:00', '18:00:00', 1, '09:00:00', '18:00:00', 1, '09:00:00', '16:30:00', 1, '09:00:00', '16:30:00', 1, '2017-11-23 13:17:51', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0),
(6, 3, '09:00:00', '17:00:00', 1, '09:00:00', '12:50:00', 1, '00:30:00', '00:50:00', 1, '09:00:00', '18:59:00', 1, '09:00:00', '18:00:00', 1, '09:00:00', '16:30:00', 1, '12:00:00', '12:00:00', 0, '2017-11-23 13:17:51', '2018-01-09 11:49:17', '0000-00-00 00:00:00', 0),
(7, 4, '09:00:00', '18:00:00', 1, '09:00:00', '18:00:00', 1, '09:00:00', '18:00:00', 1, '09:00:00', '18:00:00', 1, '09:00:00', '18:00:00', 1, '09:00:00', '16:30:00', 1, '09:00:00', '16:30:00', 1, '2017-11-23 13:17:51', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0),
(8, 5, '09:00:00', '18:00:00', 1, '09:00:00', '18:00:00', 1, '09:00:00', '18:00:00', 1, '09:00:00', '18:00:00', 1, '09:00:00', '18:00:00', 1, '09:00:00', '16:30:00', 1, '09:00:00', '16:30:00', 1, '2017-11-23 13:17:51', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0),
(9, 6, '09:00:00', '18:00:00', 1, '09:00:00', '18:00:00', 1, '09:00:00', '18:00:00', 1, '09:00:00', '18:00:00', 1, '09:00:00', '18:00:00', 1, '09:00:00', '16:30:00', 1, '09:00:00', '16:30:00', 1, '2017-11-23 13:17:51', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0),
(10, 7, '09:00:00', '18:00:00', 1, '09:00:00', '18:00:00', 1, '09:00:00', '18:00:00', 1, '09:00:00', '18:00:00', 1, '09:00:00', '18:00:00', 1, '09:00:00', '16:30:00', 1, '09:00:00', '16:30:00', 1, '2017-11-23 13:17:51', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0),
(11, 8, '09:00:00', '18:00:00', 1, '09:00:00', '18:00:00', 1, '09:00:00', '18:00:00', 1, '09:00:00', '18:00:00', 1, '09:00:00', '18:00:00', 1, '09:00:00', '16:30:00', 1, '09:00:00', '16:30:00', 1, '2017-11-23 13:17:51', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0),
(12, 9, '09:00:00', '18:00:00', 1, '09:00:00', '18:00:00', 1, '0:00:00', '0:42:00', 1, '09:00:00', '18:00:00', 1, '09:00:00', '18:00:00', 1, '09:00:00', '16:30:00', 1, '09:00:00', '16:30:00', 1, '2017-11-23 13:17:51', '2017-12-12 23:40:55', '0000-00-00 00:00:00', 0),
(13, 12, '09:00:00', '18:00:00', 1, '09:00:00', '18:00:00', 1, '0:00:00', '0:42:00', 1, '09:00:00', '18:00:00', 1, '09:00:00', '18:00:00', 1, '09:00:00', '16:30:00', 1, '09:00:00', '16:30:00', 1, '2017-11-23 13:17:51', '2017-12-12 23:40:55', '0000-00-00 00:00:00', 0);

-- --------------------------------------------------------

--
-- Table structure for table `returncustomers`
--

CREATE TABLE `returncustomers` (
  `id` int(11) NOT NULL,
  `accountid` int(11) NOT NULL,
  `authorizationcode` varchar(255) NOT NULL,
  `cardtype` varchar(255) NOT NULL,
  `last4` char(4) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  `createdat` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `deletedat` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `isdeleted` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `returncustomers`
--

INSERT INTO `returncustomers` (`id`, `accountid`, `authorizationcode`, `cardtype`, `last4`, `status`, `createdat`, `deletedat`, `isdeleted`) VALUES
(1, 1, 'AUTH_ysmunya50i', 'visa DEBIT', '4081', 1, '2017-11-04 23:58:09', '0000-00-00 00:00:00', 0),
(2, 1, 'AUTH_dzqrrvt6l8', 'visa DEBIT', '4081', 1, '2017-11-06 15:23:54', '0000-00-00 00:00:00', 0);

-- --------------------------------------------------------

--
-- Table structure for table `role_assignments`
--

CREATE TABLE `role_assignments` (
  `roleAssignmentID` int(11) NOT NULL,
  `roleID` int(11) DEFAULT NULL,
  `moduleID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `role_assignments`
--

INSERT INTO `role_assignments` (`roleAssignmentID`, `roleID`, `moduleID`) VALUES
(1, 1, 2),
(2, 1, 1),
(3, 1, 3),
(4, 1, 4),
(5, 1, 5),
(6, 1, 6),
(7, 1, 7),
(8, 1, 8),
(9, 1, 9),
(10, 1, 10),
(11, 1, 11),
(12, 1, 12),
(13, 1, 13),
(14, 1, 14),
(15, 1, 15),
(16, 1, 16),
(17, 1, 17),
(18, 1, 18),
(19, 1, 19),
(20, 1, 20),
(21, 1, 21),
(22, 1, 22),
(23, 1, 23),
(24, 1, 24),
(25, 1, 25),
(26, 1, 26),
(27, 1, 27),
(28, 1, 28),
(29, 1, 29),
(30, 1, 30),
(31, 1, 31),
(32, 1, 32),
(33, 1, 33),
(34, 1, 34),
(35, 1, 35),
(36, 1, 36),
(37, 1, 37),
(38, 1, 38);

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` int(11) NOT NULL,
  `b2bemail` varchar(200) NOT NULL,
  `b2bphone` char(15) NOT NULL,
  `b2bphone2` char(15) NOT NULL,
  `b2cemail` varchar(200) NOT NULL,
  `b2cphone` char(15) NOT NULL,
  `b2cphone2` char(15) NOT NULL,
  `homebannertimer` int(11) NOT NULL,
  `placeadtimer` int(11) NOT NULL,
  `facebookpage` varchar(200) NOT NULL,
  `twitterpage` varchar(200) NOT NULL,
  `insterpage` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `b2bemail`, `b2bphone`, `b2bphone2`, `b2cemail`, `b2cphone`, `b2cphone2`, `homebannertimer`, `placeadtimer`, `facebookpage`, `twitterpage`, `insterpage`) VALUES
(1, 'info@ebs.com', '0', '', '', '', '', 5, 10, 'https://facebook.com', '  ', ' ');

-- --------------------------------------------------------

--
-- Table structure for table `size_category`
--

CREATE TABLE `size_category` (
  `id` int(11) NOT NULL,
  `sizecategory` varchar(255) NOT NULL DEFAULT '',
  `status` tinyint(4) DEFAULT '1',
  `createdat` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updatedat` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `deletedat` timestamp NULL DEFAULT NULL,
  `isdeleted` tinyint(4) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `size_category`
--

INSERT INTO `size_category` (`id`, `sizecategory`, `status`, `createdat`, `updatedat`, `deletedat`, `isdeleted`) VALUES
(1, 'general', 1, '2018-03-07 15:28:18', NULL, NULL, 0),
(2, 'women shoes', 1, '2018-03-07 15:28:18', NULL, NULL, 0);

-- --------------------------------------------------------

--
-- Table structure for table `size_tbl`
--

CREATE TABLE `size_tbl` (
  `id` int(20) NOT NULL,
  `sizecategoryid` int(20) NOT NULL,
  `sizename` varchar(255) CHARACTER SET latin1 DEFAULT NULL,
  `sizecode` varchar(255) CHARACTER SET latin1 NOT NULL DEFAULT '',
  `arrange` int(11) NOT NULL DEFAULT '100',
  `status` tinyint(4) DEFAULT '1',
  `createdat` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updatedat` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `deletedat` timestamp NULL DEFAULT NULL,
  `isdeleted` tinyint(4) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `size_tbl`
--

INSERT INTO `size_tbl` (`id`, `sizecategoryid`, `sizename`, `sizecode`, `arrange`, `status`, `createdat`, `updatedat`, `deletedat`, `isdeleted`) VALUES
(1, 1, 'Large', 'L', 40, 1, '2018-01-26 01:45:41', '2018-03-07 15:15:56', NULL, 0),
(2, 1, 'extra large', 'XL', 50, 1, '2018-01-26 01:46:03', '2018-03-07 15:15:58', NULL, 0),
(3, 1, 'extra extra large', 'XXL', 60, 1, '2018-01-26 01:46:06', '2018-03-07 15:15:59', NULL, 0),
(4, 1, 'medium', 'M', 30, 1, '2018-01-26 01:46:34', '2018-03-07 15:16:01', NULL, 0),
(5, 1, 'small', 'S', 20, 1, '2018-01-26 01:46:52', '2018-03-07 15:16:03', NULL, 0),
(6, 1, 'extra small', 'XS', 11, 1, '2018-01-26 01:47:11', '2018-03-07 15:42:50', NULL, 0),
(7, 2, 'shoes', '4', 40, 1, '2018-01-26 06:22:34', '2018-03-07 15:16:07', NULL, 0),
(8, 2, 'shoes', '5', 50, 1, '2018-01-26 06:22:34', '2018-03-07 15:16:08', NULL, 0),
(9, 2, 'shoes', '6', 60, 1, '2018-01-26 06:22:34', '2018-03-07 15:16:09', NULL, 0),
(10, 2, 'shoes', '7', 70, 1, '2018-01-26 06:22:34', '2018-03-07 15:16:10', NULL, 0),
(11, 2, 'shoes', '8', 80, 1, '2018-01-26 06:22:34', '2018-03-07 15:16:11', NULL, 0),
(12, 2, 'shoes', '9', 90, 1, '2018-01-26 06:22:34', '2018-03-07 15:16:12', NULL, 0),
(13, 2, 'shoes', '10', 100, 1, '2018-01-26 06:22:34', '2018-03-07 15:16:13', NULL, 0),
(14, 2, 'shoes', '11', 110, 1, '2018-01-26 06:22:34', '2018-03-07 15:16:14', NULL, 0),
(15, 2, 'shoes', '12', 120, 1, '2018-01-26 06:22:34', '2018-03-07 15:16:15', NULL, 0);

-- --------------------------------------------------------

--
-- Table structure for table `states`
--

CREATE TABLE `states` (
  `id` int(11) NOT NULL,
  `statename` varchar(100) NOT NULL DEFAULT '',
  `createdat` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updatedat` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `deletedat` timestamp NULL DEFAULT NULL,
  `isdeleted` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `states`
--

INSERT INTO `states` (`id`, `statename`, `createdat`, `updatedat`, `deletedat`, `isdeleted`) VALUES
(1, 'Abiaaa State', '2017-10-06 09:49:50', '2018-03-16 10:05:44', '0000-00-00 00:00:00', 0),
(2, 'Adamawa State', '2017-10-06 09:49:50', NULL, '0000-00-00 00:00:00', 0),
(3, 'Akwa Ibom State', '2017-10-06 09:49:50', NULL, '0000-00-00 00:00:00', 0),
(4, 'Anambra State', '2017-10-06 09:49:50', NULL, '0000-00-00 00:00:00', 0),
(5, 'Bauchi State', '2017-10-06 09:49:50', NULL, '0000-00-00 00:00:00', 0),
(6, 'Bayelsa State', '2017-10-06 09:49:50', NULL, '0000-00-00 00:00:00', 0),
(7, 'Benue State', '2017-10-06 09:49:50', NULL, '0000-00-00 00:00:00', 0),
(8, 'Borno State', '2017-10-06 09:49:50', NULL, '0000-00-00 00:00:00', 0),
(9, 'Cross River State', '2017-10-06 09:49:50', NULL, '0000-00-00 00:00:00', 0),
(10, 'Delta State', '2017-10-06 09:49:50', NULL, '0000-00-00 00:00:00', 0),
(11, 'Ebonyi State', '2017-10-06 09:49:50', NULL, '0000-00-00 00:00:00', 0),
(12, 'Edo State', '2017-10-06 09:49:50', NULL, '0000-00-00 00:00:00', 0),
(13, 'Ekiti State', '2017-10-06 09:49:50', NULL, '0000-00-00 00:00:00', 0),
(14, 'Enugu State', '2017-10-06 09:49:50', NULL, '0000-00-00 00:00:00', 0),
(15, 'FCT', '2017-10-06 09:49:50', NULL, '0000-00-00 00:00:00', 0),
(16, 'Gombe State', '2017-10-06 09:49:50', NULL, '0000-00-00 00:00:00', 0),
(17, 'Imo State', '2017-10-06 09:49:50', NULL, '0000-00-00 00:00:00', 0),
(18, 'Jigawa State', '2017-10-06 09:49:50', NULL, '0000-00-00 00:00:00', 0),
(19, 'Kaduna State', '2017-10-06 09:49:50', NULL, '0000-00-00 00:00:00', 0),
(20, 'Kano State', '2017-10-06 09:49:50', NULL, '0000-00-00 00:00:00', 0),
(21, 'Katsina State', '2017-10-06 09:49:50', NULL, '0000-00-00 00:00:00', 0),
(22, 'Kebbi State', '2017-10-06 09:49:50', NULL, '0000-00-00 00:00:00', 0),
(23, 'Kogi State', '2017-10-06 09:49:50', NULL, '0000-00-00 00:00:00', 0),
(24, 'Kwara State', '2017-10-06 09:49:50', NULL, '0000-00-00 00:00:00', 0),
(25, 'Lagos State', '2017-10-06 09:49:50', NULL, '0000-00-00 00:00:00', 0),
(26, 'Nasarawa State', '2017-10-06 09:49:50', NULL, '0000-00-00 00:00:00', 0),
(27, 'Niger State', '2017-10-06 09:49:50', NULL, '0000-00-00 00:00:00', 0),
(28, 'Ogun State', '2017-10-06 09:49:50', NULL, '0000-00-00 00:00:00', 0),
(29, 'Ondo State', '2017-10-06 09:49:50', NULL, '0000-00-00 00:00:00', 0),
(30, 'Osun State', '2017-10-06 09:49:50', NULL, '0000-00-00 00:00:00', 0),
(31, 'Oyo State', '2017-10-06 09:49:50', NULL, '0000-00-00 00:00:00', 0),
(32, 'Plateau State', '2017-10-06 09:49:50', NULL, '0000-00-00 00:00:00', 0),
(33, 'Rivers State', '2017-10-06 09:49:50', NULL, '0000-00-00 00:00:00', 0),
(34, 'Sokoto State', '2017-10-06 09:49:50', NULL, '0000-00-00 00:00:00', 0),
(35, 'Taraba State', '2017-10-06 09:49:50', NULL, '0000-00-00 00:00:00', 0),
(36, 'Yobe State', '2017-10-06 09:49:50', NULL, '0000-00-00 00:00:00', 0),
(37, 'Zamfara State', '2017-10-06 09:49:50', NULL, '0000-00-00 00:00:00', 0);

-- --------------------------------------------------------

--
-- Table structure for table `state_cities`
--

CREATE TABLE `state_cities` (
  `id` int(11) NOT NULL,
  `cityname` varchar(100) NOT NULL,
  `stateid` int(11) NOT NULL,
  `createdat` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updatedat` timestamp NULL DEFAULT NULL,
  `deletedat` timestamp NULL DEFAULT NULL,
  `isdeleted` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `state_cities`
--

INSERT INTO `state_cities` (`id`, `cityname`, `stateid`, `createdat`, `updatedat`, `deletedat`, `isdeleted`) VALUES
(1, 'Aba South', 1, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(2, 'Arochukwu', 1, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(3, 'Bende', 1, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(4, 'Ikwuano', 1, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(5, 'Isiala Ngwa North', 1, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(6, 'Isiala Ngwa South', 1, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(7, 'Isuikwuato', 1, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(8, 'Obi Ngwa', 1, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(9, 'Ohafia', 1, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(10, 'Osisioma', 1, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(11, 'Ugwunagbo', 1, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(12, 'Ukwa East', 1, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(13, 'Ukwa West', 1, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(14, 'Umuahia North', 1, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(15, 'Umuahia South', 1, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(16, 'Umu Nneochi', 1, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(17, 'Fufure', 2, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(18, 'Ganye', 2, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(19, 'Gayuk', 2, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(20, 'Gombi', 2, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(21, 'Grie', 2, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(22, 'Hong', 2, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(23, 'Jada', 2, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(24, 'Lamurde', 2, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(25, 'Madagali', 2, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(26, 'Maiha', 2, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(27, 'Mayo Belwa', 2, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(28, 'Michika', 2, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(29, 'Mubi North', 2, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(30, 'Mubi South', 2, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(31, 'Numan', 2, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(32, 'Shelleng', 2, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(33, 'Song', 2, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(34, 'Toungo', 2, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(35, 'Yola North', 2, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(36, 'Yola South', 2, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(37, 'Eastern Obolo', 3, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(38, 'Eket', 3, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(39, 'Esit Eket', 3, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(40, 'Essien Udim', 3, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(41, 'Etim Ekpo', 3, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(42, 'Etinan', 3, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(43, 'Ibeno', 3, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(44, 'Ibesikpo Asutan', 3, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(45, 'Ibiono-Ibom', 3, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(46, 'Ika', 3, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(47, 'Ikono', 3, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(48, 'Ikot Abasi', 3, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(49, 'Ikot Ekpene', 3, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(50, 'Ini', 3, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(51, 'Itu', 3, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(52, 'Mbo', 3, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(53, 'Mkpat-Enin', 3, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(54, 'Nsit-Atai', 3, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(55, 'Nsit-Ibom', 3, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(56, 'Nsit-Ubium', 3, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(57, 'Obot Akara', 3, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(58, 'Okobo', 3, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(59, 'Onna', 3, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(60, 'Oron', 3, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(61, 'Oruk Anam', 3, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(62, 'Udung-Uko', 3, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(63, 'Ukanafun', 3, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(64, 'Uruan', 3, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(65, 'Urue-Offong/Oruko', 3, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(66, 'Uyo', 3, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(67, 'Anambra East', 4, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(68, 'Anambra West', 4, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(69, 'Anaocha', 4, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(70, 'Awka North', 4, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(71, 'Awka South', 4, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(72, 'Ayamelum', 4, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(73, 'Dunukofia', 4, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(74, 'Ekwusigo', 4, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(75, 'Idemili North', 4, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(76, 'Idemili South', 4, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(77, 'Ihiala', 4, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(78, 'Njikoka', 4, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(79, 'Nnewi North', 4, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(80, 'Nnewi South', 4, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(81, 'Ogbaru', 4, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(82, 'Onitsha North', 4, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(83, 'Onitsha South', 4, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(84, 'Orumba North', 4, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(85, 'Orumba South', 4, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(86, 'Oyi', 4, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(87, 'Bauchi', 5, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(88, 'Bogoro', 5, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(89, 'Damban', 5, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(90, 'Darazo', 5, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(91, 'Dass', 5, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(92, 'Gamawa', 5, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(93, 'Ganjuwa', 5, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(94, 'Giade', 5, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(95, 'Itas/Gadau', 5, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(96, 'Jama\'are', 5, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(97, 'Katagum', 5, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(98, 'Kirfi', 5, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(99, 'Misau', 5, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(100, 'Ningi', 5, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(101, 'Shira', 5, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(102, 'Tafawa Balewa', 5, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(103, 'Toro', 5, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(104, 'Warji', 5, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(105, 'Zaki', 5, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(106, 'Ekeremor', 6, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(107, 'Kolokuma/Opokuma', 6, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(108, 'Nembe', 6, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(109, 'Ogbia', 6, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(110, 'Sagbama', 6, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(111, 'Southern Ijaw', 6, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(112, 'Yenagoa', 6, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(113, 'Apa', 7, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(114, 'Ado', 7, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(115, 'Buruku', 7, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(116, 'Gboko', 7, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(117, 'Guma', 7, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(118, 'Gwer East', 7, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(119, 'Gwer West', 7, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(120, 'Katsina-Ala', 7, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(121, 'Konshisha', 7, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(122, 'Kwande', 7, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(123, 'Logo', 7, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(124, 'Makurdi', 7, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(125, 'Obi', 7, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(126, 'Ogbadibo', 7, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(127, 'Ohimini', 7, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(128, 'Oju', 7, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(129, 'Okpokwu', 7, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(130, 'Oturkpo', 7, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(131, 'Tarka', 7, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(132, 'Ukum', 7, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(133, 'Ushongo', 7, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(134, 'Vandeikya', 7, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(135, 'Askira/Uba', 8, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(136, 'Bama', 8, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(137, 'Bayo', 8, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(138, 'Biu', 8, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(139, 'Chibok', 8, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(140, 'Damboa', 8, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(141, 'Dikwa', 8, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(142, 'Gubio', 8, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(143, 'Guzamala', 8, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(144, 'Gwoza', 8, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(145, 'Hawul', 8, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(146, 'Jere', 8, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(147, 'Kaga', 8, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(148, 'Kala/Balge', 8, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(149, 'Konduga', 8, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(150, 'Kukawa', 8, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(151, 'Kwaya Kusar', 8, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(152, 'Mafa', 8, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(153, 'Magumeri', 8, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(154, 'Maiduguri', 8, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(155, 'Marte', 8, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(156, 'Mobbar', 8, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(157, 'Monguno', 8, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(158, 'Ngala', 8, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(159, 'Nganzai', 8, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(160, 'Shani', 8, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(161, 'Akamkpa', 9, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(162, 'Akpabuyo', 9, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(163, 'Bakassi', 9, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(164, 'Bekwarra', 9, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(165, 'Biase', 9, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(166, 'Boki', 9, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(167, 'Calabar Municipal', 9, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(168, 'Calabar South', 9, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(169, 'Etung', 9, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(170, 'Ikom', 9, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(171, 'Obanliku', 9, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(172, 'Obubra', 9, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(173, 'Obudu', 9, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(174, 'Odukpani', 9, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(175, 'Ogoja', 9, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(176, 'Yakuur', 9, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(177, 'Yala', 9, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(178, 'Aniocha South', 10, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(179, 'Bomadi', 10, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(180, 'Burutu', 10, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(181, 'Ethiope East', 10, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(182, 'Ethiope West', 10, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(183, 'Ika North East', 10, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(184, 'Ika South', 10, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(185, 'Isoko North', 10, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(186, 'Isoko South', 10, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(187, 'Ndokwa East', 10, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(188, 'Ndokwa West', 10, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(189, 'Okpe', 10, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(190, 'Oshimili North', 10, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(191, 'Oshimili South', 10, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(192, 'Patani', 10, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(193, 'Sapele', 10, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(194, 'Udu', 10, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(195, 'Ughelli North', 10, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(196, 'Ughelli South', 10, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(197, 'Ukwuani', 10, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(198, 'Uvwie', 10, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(199, 'Warri North', 10, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(200, 'Warri South', 10, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(201, 'Warri South West', 10, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(202, 'Afikpo North', 11, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(203, 'Afikpo South', 11, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(204, 'Ebonyi', 11, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(205, 'Ezza North', 11, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(206, 'Ezza South', 11, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(207, 'Ikwo', 11, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(208, 'Ishielu', 11, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(209, 'Ivo', 11, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(210, 'Izzi', 11, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(211, 'Ohaozara', 11, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(212, 'Ohaukwu', 11, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(213, 'Onicha', 11, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(214, 'Egor', 12, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(215, 'Esan Central', 12, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(216, 'Esan North-East', 12, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(217, 'Esan South-East', 12, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(218, 'Esan West', 12, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(219, 'Etsako Central', 12, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(220, 'Etsako East', 12, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(221, 'Etsako West', 12, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(222, 'Igueben', 12, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(223, 'Ikpoba Okha', 12, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(224, 'Orhionmwon', 12, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(225, 'Oredo', 12, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(226, 'Ovia North-East', 12, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(227, 'Ovia South-West', 12, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(228, 'Owan East', 12, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(229, 'Owan West', 12, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(230, 'Uhunmwonde', 12, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(231, 'Efon', 13, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(232, 'Ekiti East', 13, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(233, 'Ekiti South-West', 13, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(234, 'Ekiti West', 13, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(235, 'Emure', 13, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(236, 'Gbonyin', 13, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(237, 'Ido Osi', 13, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(238, 'Ijero', 13, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(239, 'Ikere', 13, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(240, 'Ikole', 13, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(241, 'Ilejemeje', 13, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(242, 'Irepodun/Ifelodun', 13, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(243, 'Ise/Orun', 13, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(244, 'Moba', 13, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(245, 'Oye', 13, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(246, 'Awgu', 14, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(247, 'Enugu East', 14, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(248, 'Enugu North', 14, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(249, 'Enugu South', 14, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(250, 'Ezeagu', 14, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(251, 'Igbo Etiti', 14, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(252, 'Igbo Eze North', 14, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(253, 'Igbo Eze South', 14, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(254, 'Isi Uzo', 14, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(255, 'Nkanu East', 14, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(256, 'Nkanu West', 14, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(257, 'Nsukka', 14, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(258, 'Oji River', 14, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(259, 'Udenu', 14, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(260, 'Udi', 14, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(261, 'Uzo Uwani', 14, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(262, 'Bwari', 15, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(263, 'Gwagwalada', 15, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(264, 'Kuje', 15, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(265, 'Kwali', 15, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(266, 'Municipal Area Council', 15, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(267, 'Balanga', 16, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(268, 'Billiri', 16, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(269, 'Dukku', 16, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(270, 'Funakaye', 16, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(271, 'Gombe', 16, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(272, 'Kaltungo', 16, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(273, 'Kwami', 16, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(274, 'Nafada', 16, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(275, 'Shongom', 16, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(276, 'Yamaltu/Deba', 16, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(277, 'Ahiazu Mbaise', 17, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(278, 'Ehime Mbano', 17, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(279, 'Ezinihitte', 17, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(280, 'Ideato North', 17, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(281, 'Ideato South', 17, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(282, 'Ihitte/Uboma', 17, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(283, 'Ikeduru', 17, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(284, 'Isiala Mbano', 17, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(285, 'Isu', 17, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(286, 'Mbaitoli', 17, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(287, 'Ngor Okpala', 17, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(288, 'Njaba', 17, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(289, 'Nkwerre', 17, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(290, 'Nwangele', 17, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(291, 'Obowo', 17, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(292, 'Oguta', 17, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(293, 'Ohaji/Egbema', 17, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(294, 'Okigwe', 17, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(295, 'Orlu', 17, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(296, 'Orsu', 17, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(297, 'Oru East', 17, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(298, 'Oru West', 17, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(299, 'Owerri Municipal', 17, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(300, 'Owerri North', 17, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(301, 'Owerri West', 17, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(302, 'Unuimo', 17, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(303, 'Babura', 18, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(304, 'Biriniwa', 18, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(305, 'Birnin Kudu', 18, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(306, 'Buji', 18, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(307, 'Dutse', 18, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(308, 'Gagarawa', 18, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(309, 'Garki', 18, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(310, 'Gumel', 18, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(311, 'Guri', 18, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(312, 'Gwaram', 18, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(313, 'Gwiwa', 18, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(314, 'Hadejia', 18, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(315, 'Jahun', 18, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(316, 'Kafin Hausa', 18, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(317, 'Kazaure', 18, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(318, 'Kiri Kasama', 18, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(319, 'Kiyawa', 18, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(320, 'Kaugama', 18, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(321, 'Maigatari', 18, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(322, 'Malam Madori', 18, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(323, 'Miga', 18, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(324, 'Ringim', 18, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(325, 'Roni', 18, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(326, 'Sule Tankarkar', 18, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(327, 'Taura', 18, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(328, 'Yankwashi', 18, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(329, 'Chikun', 19, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(330, 'Giwa', 19, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(331, 'Igabi', 19, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(332, 'Ikara', 19, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(333, 'Jaba', 19, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(334, 'Jema\'a', 19, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(335, 'Kachia', 19, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(336, 'Kaduna North', 19, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(337, 'Kaduna South', 19, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(338, 'Kagarko', 19, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(339, 'Kajuru', 19, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(340, 'Kaura', 19, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(341, 'Kauru', 19, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(342, 'Kubau', 19, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(343, 'Kudan', 19, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(344, 'Lere', 19, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(345, 'Makarfi', 19, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(346, 'Sabon Gari', 19, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(347, 'Sanga', 19, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(348, 'Soba', 19, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(349, 'Zangon Kataf', 19, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(350, 'Zaria', 19, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(351, 'Albasu', 20, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(352, 'Bagwai', 20, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(353, 'Bebeji', 20, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(354, 'Bichi', 20, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(355, 'Bunkure', 20, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(356, 'Dala', 20, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(357, 'Dambatta', 20, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(358, 'Dawakin Kudu', 20, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(359, 'Dawakin Tofa', 20, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(360, 'Doguwa', 20, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(361, 'Fagge', 20, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(362, 'Gabasawa', 20, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(363, 'Garko', 20, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(364, 'Garun Mallam', 20, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(365, 'Gaya', 20, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(366, 'Gezawa', 20, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(367, 'Gwale', 20, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(368, 'Gwarzo', 20, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(369, 'Kabo', 20, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(370, 'Kano Municipal', 20, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(371, 'Karaye', 20, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(372, 'Kibiya', 20, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(373, 'Kiru', 20, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(374, 'Kumbotso', 20, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(375, 'Kunchi', 20, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(376, 'Kura', 20, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(377, 'Madobi', 20, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(378, 'Makoda', 20, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(379, 'Minjibir', 20, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(380, 'Nasarawa', 20, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(381, 'Rano', 20, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(382, 'Rimin Gado', 20, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(383, 'Rogo', 20, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(384, 'Shanono', 20, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(385, 'Sumaila', 20, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(386, 'Takai', 20, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(387, 'Tarauni', 20, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(388, 'Tofa', 20, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(389, 'Tsanyawa', 20, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(390, 'Tudun Wada', 20, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(391, 'Ungogo', 20, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(392, 'Warawa', 20, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(393, 'Wudil', 20, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(394, 'Batagarawa', 21, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(395, 'Batsari', 21, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(396, 'Baure', 21, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(397, 'Bindawa', 21, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(398, 'Charanchi', 21, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(399, 'Dandume', 21, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(400, 'Danja', 21, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(401, 'Dan Musa', 21, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(402, 'Daura', 21, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(403, 'Dutsi', 21, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(404, 'Dutsin Ma', 21, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(405, 'Faskari', 21, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(406, 'Funtua', 21, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(407, 'Ingawa', 21, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(408, 'Jibia', 21, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(409, 'Kafur', 21, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(410, 'Kaita', 21, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(411, 'Kankara', 21, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(412, 'Kankia', 21, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(413, 'Katsina', 21, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(414, 'Kurfi', 21, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(415, 'Kusada', 21, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(416, 'Mai\'Adua', 21, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(417, 'Malumfashi', 21, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(418, 'Mani', 21, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(419, 'Mashi', 21, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(420, 'Matazu', 21, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(421, 'Musawa', 21, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(422, 'Rimi', 21, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(423, 'Sabuwa', 21, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(424, 'Safana', 21, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(425, 'Sandamu', 21, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(426, 'Zango', 21, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(427, 'Arewa Dandi', 22, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(428, 'Argungu', 22, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(429, 'Augie', 22, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(430, 'Bagudo', 22, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(431, 'Birnin Kebbi', 22, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(432, 'Bunza', 22, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(433, 'Dandi', 22, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(434, 'Fakai', 22, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(435, 'Gwandu', 22, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(436, 'Jega', 22, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(437, 'Kalgo', 22, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(438, 'Koko/Besse', 22, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(439, 'Maiyama', 22, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(440, 'Ngaski', 22, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(441, 'Sakaba', 22, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(442, 'Shanga', 22, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(443, 'Suru', 22, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(444, 'Wasagu/Danko', 22, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(445, 'Yauri', 22, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(446, 'Zuru', 22, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(447, 'Ajaokuta', 23, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(448, 'Ankpa', 23, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(449, 'Bassa', 23, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(450, 'Dekina', 23, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(451, 'Ibaji', 23, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(452, 'Idah', 23, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(453, 'Igalamela Odolu', 23, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(454, 'Ijumu', 23, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(455, 'Kabba/Bunu', 23, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(456, 'Kogi', 23, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(457, 'Lokoja', 23, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(458, 'Mopa Muro', 23, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(459, 'Ofu', 23, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(460, 'Ogori/Magongo', 23, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(461, 'Okehi', 23, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(462, 'Okene', 23, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(463, 'Olamaboro', 23, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(464, 'Omala', 23, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(465, 'Yagba East', 23, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(466, 'Yagba West', 23, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(467, 'Baruten', 24, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(468, 'Edu', 24, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(469, 'Ekiti', 24, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(470, 'Ifelodun', 24, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(471, 'Ilorin East', 24, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(472, 'Ilorin South', 24, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(473, 'Ilorin West', 24, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(474, 'Irepodun', 24, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(475, 'Isin', 24, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(476, 'Kaiama', 24, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(477, 'Moro', 24, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(478, 'Offa', 24, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(479, 'Oke Ero', 24, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(480, 'Oyun', 24, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(481, 'Pategi', 24, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(482, 'Ajeromi-Ifelodun', 25, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(483, 'Alimosho', 25, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(484, 'Amuwo-Odofin', 25, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(485, 'Apapa', 25, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(486, 'Badagry', 25, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(487, 'Epe', 25, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(488, 'Eti Osa', 25, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(489, 'Ibeju-Lekki', 25, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(490, 'Ifako-Ijaiye', 25, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(491, 'Ikeja', 25, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(492, 'Ikorodu', 25, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(493, 'Kosofe', 25, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(494, 'Lagos Island', 25, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(495, 'Lagos Mainland', 25, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(496, 'Mushin', 25, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(497, 'Ojo', 25, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(498, 'Oshodi-Isolo', 25, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(499, 'Shomolu', 25, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(500, 'Surulere', 25, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(501, 'Awe', 26, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(502, 'Doma', 26, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(503, 'Karu', 26, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(504, 'Keana', 26, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(505, 'Keffi', 26, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(506, 'Kokona', 26, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(507, 'Lafia', 26, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(508, 'Nasarawa', 26, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(509, 'Nasarawa Egon', 26, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(510, 'Obi', 26, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(511, 'Toto', 26, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(512, 'Wamba', 26, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(513, 'Agwara', 27, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(514, 'Bida', 27, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(515, 'Borgu', 27, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(516, 'Bosso', 27, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(517, 'Chanchaga', 27, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(518, 'Edati', 27, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(519, 'Gbako', 27, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(520, 'Gurara', 27, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(521, 'Katcha', 27, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(522, 'Kontagora', 27, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(523, 'Lapai', 27, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(524, 'Lavun', 27, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(525, 'Magama', 27, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(526, 'Mariga', 27, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(527, 'Mashegu', 27, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(528, 'Mokwa', 27, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(529, 'Moya', 27, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(530, 'Paikoro', 27, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(531, 'Rafi', 27, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(532, 'Rijau', 27, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(533, 'Shiroro', 27, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(534, 'Suleja', 27, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(535, 'Tafa', 27, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(536, 'Wushishi', 27, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(537, 'Abeokuta South', 28, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(538, 'Ado-Odo/Ota', 28, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(539, 'Egbado North', 28, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(540, 'Egbado South', 28, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(541, 'Ewekoro', 28, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(542, 'Ifo', 28, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(543, 'Ijebu East', 28, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(544, 'Ijebu North', 28, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(545, 'Ijebu North East', 28, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(546, 'Ijebu Ode', 28, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(547, 'Ikenne', 28, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(548, 'Imeko Afon', 28, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(549, 'Ipokia', 28, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(550, 'Obafemi Owode', 28, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(551, 'Odeda', 28, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(552, 'Odogbolu', 28, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(553, 'Ogun Waterside', 28, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(554, 'Remo North', 28, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(555, 'Shagamu', 28, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(556, 'Akoko North-West', 29, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(557, 'Akoko South-West', 29, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(558, 'Akoko South-East', 29, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(559, 'Akure North', 29, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(560, 'Akure South', 29, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(561, 'Ese Odo', 29, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(562, 'Idanre', 29, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(563, 'Ifedore', 29, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(564, 'Ilaje', 29, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(565, 'Ile Oluji/Okeigbo', 29, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(566, 'Irele', 29, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(567, 'Odigbo', 29, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(568, 'Okitipupa', 29, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(569, 'Ondo East', 29, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(570, 'Ondo West', 29, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(571, 'Ose', 29, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(572, 'Owo', 29, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(573, 'Atakunmosa West', 30, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(574, 'Aiyedaade', 30, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(575, 'Aiyedire', 30, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(576, 'Boluwaduro', 30, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(577, 'Boripe', 30, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(578, 'Ede North', 30, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(579, 'Ede South', 30, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(580, 'Ife Central', 30, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(581, 'Ife East', 30, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(582, 'Ife North', 30, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(583, 'Ife South', 30, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(584, 'Egbedore', 30, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(585, 'Ejigbo', 30, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(586, 'Ifedayo', 30, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(587, 'Ifelodun', 30, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(588, 'Ila', 30, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(589, 'Ilesa East', 30, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(590, 'Ilesa West', 30, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(591, 'Irepodun', 30, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(592, 'Irewole', 30, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(593, 'Isokan', 30, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(594, 'Iwo', 30, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(595, 'Obokun', 30, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(596, 'Odo Otin', 30, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(597, 'Ola Oluwa', 30, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(598, 'Olorunda', 30, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(599, 'Oriade', 30, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(600, 'Orolu', 30, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(601, 'Osogbo', 30, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(602, 'Akinyele', 31, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(603, 'Atiba', 31, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(604, 'Atisbo', 31, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(605, 'Egbeda', 31, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(606, 'Ibadan North', 31, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(607, 'Ibadan North-East', 31, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(608, 'Ibadan North-West', 31, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(609, 'Ibadan South-East', 31, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(610, 'Ibadan South-West', 31, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(611, 'Ibarapa Central', 31, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(612, 'Ibarapa East', 31, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(613, 'Ibarapa North', 31, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(614, 'Ido', 31, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(615, 'Irepo', 31, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(616, 'Iseyin', 31, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(617, 'Itesiwaju', 31, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(618, 'Iwajowa', 31, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(619, 'Kajola', 31, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(620, 'Lagelu', 31, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(621, 'Ogbomosho North', 31, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(622, 'Ogbomosho South', 31, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(623, 'Ogo Oluwa', 31, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(624, 'Olorunsogo', 31, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(625, 'Oluyole', 31, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(626, 'Ona Ara', 31, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(627, 'Orelope', 31, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(628, 'Ori Ire', 31, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(629, 'Oyo', 31, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(630, 'Oyo East', 31, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(631, 'Saki East', 31, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(632, 'Saki West', 31, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(633, 'Surulere', 31, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(634, 'Barkin Ladi', 32, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(635, 'Bassa', 32, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(636, 'Jos East', 32, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(637, 'Jos North', 32, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(638, 'Jos South', 32, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(639, 'Kanam', 32, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(640, 'Kanke', 32, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(641, 'Langtang South', 32, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(642, 'Langtang North', 32, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(643, 'Mangu', 32, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(644, 'Mikang', 32, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(645, 'Pankshin', 32, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(646, 'Qua\'an Pan', 32, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(647, 'Riyom', 32, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(648, 'Shendam', 32, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(649, 'Wase', 32, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(650, 'Ahoada East', 33, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(651, 'Ahoada West', 33, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(652, 'Akuku-Toru', 33, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(653, 'Andoni', 33, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(654, 'Asari-Toru', 33, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(655, 'Bonny', 33, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(656, 'Degema', 33, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(657, 'Eleme', 33, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(658, 'Emuoha', 33, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(659, 'Etche', 33, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(660, 'Gokana', 33, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(661, 'Ikwerre', 33, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(662, 'Khana', 33, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(663, 'Obio/Akpor', 33, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0);
INSERT INTO `state_cities` (`id`, `cityname`, `stateid`, `createdat`, `updatedat`, `deletedat`, `isdeleted`) VALUES
(664, 'Ogba/Egbema/Ndoni', 33, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(665, 'Ogu/Bolo', 33, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(666, 'Okrika', 33, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(667, 'Omuma', 33, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(668, 'Opobo/Nkoro', 33, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(669, 'Oyigbo', 33, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(670, 'Port Harcourt', 33, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(671, 'Tai', 33, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(672, 'Bodinga', 34, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(673, 'Dange Shuni', 34, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(674, 'Gada', 34, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(675, 'Goronyo', 34, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(676, 'Gudu', 34, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(677, 'Gwadabawa', 34, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(678, 'Illela', 34, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(679, 'Isa', 34, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(680, 'Kebbe', 34, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(681, 'Kware', 34, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(682, 'Rabah', 34, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(683, 'Sabon Birni', 34, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(684, 'Shagari', 34, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(685, 'Silame', 34, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(686, 'Sokoto North', 34, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(687, 'Sokoto South', 34, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(688, 'Tambuwal', 34, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(689, 'Tangaza', 34, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(690, 'Tureta', 34, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(691, 'Wamako', 34, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(692, 'Wurno', 34, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(693, 'Yabo', 34, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(694, 'Bali', 35, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(695, 'Donga', 35, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(696, 'Gashaka', 35, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(697, 'Gassol', 35, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(698, 'Ibi', 35, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(699, 'Jalingo', 35, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(700, 'Karim Lamido', 35, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(701, 'Kumi', 35, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(702, 'Lau', 35, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(703, 'Sardauna', 35, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(704, 'Takum', 35, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(705, 'Ussa', 35, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(706, 'Wukari', 35, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(707, 'Yorro', 35, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(708, 'Zing', 35, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(709, 'Bursari', 36, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(710, 'Damaturu', 36, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(711, 'Fika', 36, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(712, 'Fune', 36, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(713, 'Geidam', 36, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(714, 'Gujba', 36, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(715, 'Gulani', 36, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(716, 'Jakusko', 36, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(717, 'Karasuwa', 36, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(718, 'Machina', 36, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(719, 'Nangere', 36, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(720, 'Nguru', 36, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(721, 'Potiskum', 36, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(722, 'Tarmuwa', 36, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(723, 'Yunusari', 36, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(724, 'Yusufari', 36, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(725, 'Bakura', 37, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(726, 'Birnin Magaji/Kiyaw', 37, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(727, 'Bukkuyum', 37, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(728, 'Bungudu', 37, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(729, 'Gummi', 37, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(730, 'Gusau', 37, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(731, 'Kaura Namoda', 37, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(732, 'Maradun', 37, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(733, 'Maru', 37, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(734, 'Shinkafi', 37, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(735, 'Talata Mafara', 37, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(736, 'Chafe', 37, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(737, 'Zurmi', 37, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(738, 'Agege', 25, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0);

-- --------------------------------------------------------

--
-- Table structure for table `system_audit`
--

CREATE TABLE `system_audit` (
  `id` int(11) NOT NULL,
  `actionPerformed` varchar(255) NOT NULL,
  `userID` int(11) NOT NULL,
  `IPAddress` varchar(255) NOT NULL,
  `dateTime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `browser` varchar(255) NOT NULL,
  `userAgent` varchar(255) NOT NULL,
  `platform` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `system_audit`
--

INSERT INTO `system_audit` (`id`, `actionPerformed`, `userID`, `IPAddress`, `dateTime`, `browser`, `userAgent`, `platform`) VALUES
(1, 'User logged in successfully', 25, '::1', '2017-09-25 12:49:00', 'Chrome', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_12_6) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/60.0.3112.113 Safari/537.36', 'Mac OS X'),
(2, 'User logged in successfully', 25, '::1', '2017-09-25 12:50:00', 'Chrome', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_12_6) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/60.0.3112.113 Safari/537.36', 'Mac OS X');

-- --------------------------------------------------------

--
-- Table structure for table `system_modules`
--

CREATE TABLE `system_modules` (
  `moduleID` int(11) NOT NULL,
  `controlerName` varchar(50) DEFAULT NULL,
  `Description` varchar(255) DEFAULT '',
  `moduleStatus` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `system_modules`
--

INSERT INTO `system_modules` (`moduleID`, `controlerName`, `Description`, `moduleStatus`) VALUES
(4, 'Transaction::index', 'View All Transactions', 1),
(3, 'Merchant::savedata', 'Save Store Information', 1),
(2, 'Merchant::loadform', 'View Store Add/Edit form', 1),
(1, 'Merchant::index', 'View All Stores', 1),
(8, 'Product::index', 'View All Products', 1),
(9, 'Product::loadform', 'View Product Add/Edit Form', 1),
(10, 'Product::savedata', 'Save Product Information', 1),
(11, 'Product::delete', 'Delete Products', 1),
(12, 'User_role::index', 'User Roles Listing', 1),
(13, 'User_role::loadForm', 'View Permissions', 1),
(14, 'User_role::saveData', 'Edit/Save User Permissions', 1),
(15, 'User::index', 'Users Listing', 1),
(16, 'User::loadForm', 'View System Users', 1),
(17, 'User::saveData', 'Edit/Save System User', 1),
(18, 'Orangecard::index', 'View All Orange Cards', 1),
(19, 'Orangecard::loadform', 'Load Add/Edit Orange Card Form', 1),
(20, 'Orangecard::savedata', 'Save Orange Card Information', 1),
(21, 'Orangecard::delete', 'Delete Orange Card', 1),
(22, 'Orangecard::upload', 'Bulk Upload Orange Cards', 1),
(23, 'Merchant::delete', 'Delete Stores and Pharmacies', 1),
(24, 'User::activate', 'Activate a user', 1),
(25, 'User::deactivate', 'De-activate a user', 1),
(26, 'User::delete', 'Delete Users', 1),
(27, 'User::resetpassword', 'Reset User Password', 1),
(7, 'Customer::index', 'View All Customers', 1),
(6, 'Transaction::unsettled', 'View All Unsettled VAT Transaction', 1),
(5, 'Transaction::loadform', 'Load Transaction Details Form', 1),
(28, 'Merchant::cardgiveoutform', 'Orange Card Give Out Form', 1),
(29, 'Merchant::cardgiveout', 'Give Out Orange Cards', 1),
(30, 'Pharmacy::index', 'View All Pharmacies', 1),
(31, 'Pharmacy::loadform', 'View Pharmacy Add/Edit form', 1),
(32, 'Pharmacy::savedata', 'Save Pharmacy Information', 1),
(33, 'Pharmacy::delete', 'Delete Pharmacies', 1),
(34, 'Merchant::upload', 'Bulk Upload Stores', 1),
(35, 'Pharmacy::upload', 'Bulk Upload Pharmacies', 1),
(36, 'User::upload', 'Bulk Upload Users', 1),
(37, 'Orangecard::activate', 'Activate Orange Card', 1),
(38, 'Orangecard::deactivate', 'De-activate Orange Card', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tablereservations`
--

CREATE TABLE `tablereservations` (
  `id` int(11) NOT NULL,
  `tablecode` varchar(200) NOT NULL,
  `restaurantid` int(12) NOT NULL,
  `accountid` int(12) NOT NULL,
  `numguest` int(12) NOT NULL,
  `checkindate` date NOT NULL,
  `checkintime` varchar(12) NOT NULL,
  `contactname` varchar(200) NOT NULL,
  `contactemail` varchar(200) NOT NULL,
  `contactphone` char(200) NOT NULL,
  `contactnote` text NOT NULL,
  `requeststatus` int(10) NOT NULL DEFAULT '1',
  `status` tinyint(4) NOT NULL DEFAULT '0',
  `read_status` tinyint(4) NOT NULL DEFAULT '0',
  `admin_read_status` tinyint(4) NOT NULL DEFAULT '0',
  `createdat` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updatedat` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `deletedat` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `isdeleted` tinyint(4) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tablereservations`
--

INSERT INTO `tablereservations` (`id`, `tablecode`, `restaurantid`, `accountid`, `numguest`, `checkindate`, `checkintime`, `contactname`, `contactemail`, `contactphone`, `contactnote`, `requeststatus`, `status`, `read_status`, `admin_read_status`, `createdat`, `updatedat`, `deletedat`, `isdeleted`) VALUES
(1, 'TBR-6820BDC5485A', 3, 1, 5, '2018-01-10', '23:00:00', 'Prince Ade', 'oginniadenike5@gmail.com', '08050544421', ' close and quiet place ples', 1, 1, 1, 0, '2018-01-09 13:59:58', '2018-01-14 08:04:51', '0000-00-00 00:00:00', 0),
(2, '', 3, 1, 7, '2018-01-19', '13:30:00', 'Prince oye', 'pncbanking@yahoo.com', '08050544421', ' ', 1, 0, 1, 0, '2018-01-11 16:27:27', '2018-01-14 08:04:51', '0000-00-00 00:00:00', 0),
(3, '', 3, 5, 19, '2018-01-25', '14:30:00', 'Prince oye', 'pncbanking@yahoo.com', '08056786777', ' ', 1, 0, 0, 0, '2018-01-16 12:53:53', NULL, '0000-00-00 00:00:00', 0);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `restaurantid` int(255) DEFAULT NULL,
  `userroleid` int(11) DEFAULT NULL,
  `firstname` varchar(30) CHARACTER SET latin1 DEFAULT NULL,
  `lastname` varchar(30) CHARACTER SET latin1 DEFAULT NULL,
  `email` varchar(30) CHARACTER SET latin1 DEFAULT NULL,
  `phonenumber` varchar(20) CHARACTER SET latin1 DEFAULT NULL,
  `merchantid` int(11) DEFAULT NULL,
  `username` varchar(20) CHARACTER SET latin1 DEFAULT NULL,
  `password` varchar(255) CHARACTER SET latin1 DEFAULT '',
  `status` tinyint(4) DEFAULT '0',
  `accesstype` tinyint(4) DEFAULT NULL,
  `forcepasswordchange` tinyint(4) DEFAULT '0',
  `lastLogin` datetime DEFAULT NULL,
  `lastLoginIP` varchar(30) CHARACTER SET latin1 DEFAULT NULL,
  `passwordresettoken` varchar(255) CHARACTER SET latin1 DEFAULT NULL,
  `admin_read_status` tinyint(4) NOT NULL DEFAULT '0',
  `createdat` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updatedat` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `deletedat` timestamp NULL DEFAULT NULL,
  `isdeleted` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `restaurantid`, `userroleid`, `firstname`, `lastname`, `email`, `phonenumber`, `merchantid`, `username`, `password`, `status`, `accesstype`, `forcepasswordchange`, `lastLogin`, `lastLoginIP`, `passwordresettoken`, `admin_read_status`, `createdat`, `updatedat`, `deletedat`, `isdeleted`) VALUES
(7, 0, 1, 'OLUWASEUN', 'OLUDELE', 'seun@oludeleseun.com', '08032530125', NULL, 'oludeleseun', 'c5864e0679a35c03abd1c36ad81c8d20', 1, 1, 0, NULL, '127.0.0.1', NULL, 0, '2017-05-24 05:07:12', NULL, NULL, 0),
(11, 0, 1, 'Obianuju', 'Ezeanyangu', 'uju@softcom.ng', '07031312454', 70002, 'softcom-admin', 'c5864e0679a35c03abd1c36ad81c8d20', 1, 2, NULL, NULL, NULL, NULL, 0, '2017-05-24 05:07:12', NULL, NULL, 0),
(12, 0, 1, 'Medplus', 'Admin', 'seun@oludeleseun.com', '08032530125', 70001, 'medplusikeja', 'dad40339cf9ecde78ef6d9ae3b0dcb6f', 1, 2, 1, NULL, '', NULL, 0, '2017-05-24 05:07:12', NULL, NULL, 0),
(13, 0, 1, 'Admin', 'GSK', 'uju@softcom.ng', '08032530125', 0, 'gsk-admin', '30ee699bd369d7989888ad5b4599b778', 0, 1, NULL, NULL, NULL, NULL, 0, '2017-10-06 13:34:38', NULL, NULL, 0),
(14, 0, 0, 'Riordan', 'Dolores', 'seun@oludele.com', '08032530125', 70002, 'dolores.chan', 'c5864e0679a35c03abd1c36ad81c8d20', 1, 2, 0, NULL, NULL, NULL, 0, '2017-10-06 13:34:38', NULL, NULL, 0),
(21, 0, 1, 'O\'RIORDAN', 'DOLORES', 'oludeleseun@gmail.com', '08032530125', 0, 'dolores.seun', 'c5864e0679a35c03abd1c36ad81c8d20', 1, 1, 1, NULL, NULL, NULL, 0, '2017-10-06 13:34:38', '2017-07-06 06:10:07', NULL, 0),
(22, 0, 1, 'Mark', 'Baeka', 'didiokoh@gmail.com', '07061113853', 0, 'ndudi.okoh1', 'c5864e0679a35c03abd1c36ad81c8d20', 1, 1, 0, NULL, NULL, NULL, 0, '2017-06-23 18:10:18', '2017-07-06 04:58:02', NULL, 0),
(24, 0, 1, 'Oluwaseun', 'Oludele', 'seun@stakle.com', '08032530125', 70004, 'seun01', '2ac9cb7dc02b3c0083eb70898e549b63', 1, 2, 0, NULL, NULL, NULL, 0, '2017-09-05 15:33:39', NULL, NULL, 0),
(25, 3, 1, 'oy3', 'trivin', 'oye@ebs.com', '0800989522', 201, '21232f297a57a5a74389', '21232f297a57a5a743894a0e4a801fc3', 1, 0, 1, NULL, '::1', NULL, 0, '2017-10-06 13:34:38', NULL, NULL, 0),
(26, 16, 1, 'oy3', 'trivin', 'oye2@ebs.com', '0800989522', 201, '21232f297a57a5a74389', '21232f297a57a5a743894a0e4a801fc3', 1, 0, 1, NULL, '::1', NULL, 0, '2017-10-06 13:34:38', '2018-02-20 11:51:20', NULL, 0);

-- --------------------------------------------------------

--
-- Table structure for table `user_roles`
--

CREATE TABLE `user_roles` (
  `id` int(11) NOT NULL,
  `roleName` varchar(30) CHARACTER SET latin1 DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `stationID` int(11) DEFAULT NULL,
  `createdat` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updatedat` timestamp NULL DEFAULT NULL,
  `deletedat` timestamp NULL DEFAULT NULL,
  `isdeleted` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user_roles`
--

INSERT INTO `user_roles` (`id`, `roleName`, `status`, `stationID`, `createdat`, `updatedat`, `deletedat`, `isdeleted`) VALUES
(1, 'Super Admin', 1, 1, '2017-10-06 13:40:25', NULL, NULL, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `accountaddresses`
--
ALTER TABLE `accountaddresses`
  ADD PRIMARY KEY (`id`),
  ADD KEY `account_addresses_ibfk_city` (`cityid`),
  ADD KEY `account_addresses_ibfk_state` (`stateid`),
  ADD KEY `accountid` (`accountid`);

--
-- Indexes for table `accounts`
--
ALTER TABLE `accounts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bannertype`
--
ALTER TABLE `bannertype`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`),
  ADD KEY `restaurantid` (`restaurantid`);

--
-- Indexes for table `categories_cusine`
--
ALTER TABLE `categories_cusine`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories_fashion`
--
ALTER TABLE `categories_fashion`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ci_sessions`
--
ALTER TABLE `ci_sessions`
  ADD KEY `ci_sessions_timestamp` (`timestamp`);

--
-- Indexes for table `color_tbl`
--
ALTER TABLE `color_tbl`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `accountid` (`accountid`),
  ADD KEY `orderlistdetails` (`orderlistdetails`);

--
-- Indexes for table `cuisine_merchant_cate_assign`
--
ALTER TABLE `cuisine_merchant_cate_assign`
  ADD PRIMARY KEY (`id`),
  ADD KEY `categoryid` (`cat_cusid`),
  ADD KEY `productid` (`restaurantid`);

--
-- Indexes for table `email_templates`
--
ALTER TABLE `email_templates`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `img_ads`
--
ALTER TABLE `img_ads`
  ADD PRIMARY KEY (`id`),
  ADD KEY `bannertypeid` (`bannertypeid`);

--
-- Indexes for table `orderlistdetails`
--
ALTER TABLE `orderlistdetails`
  ADD PRIMARY KEY (`id`),
  ADD KEY `orderlistdetails_ord_fk` (`orderid`),
  ADD KEY `orderlistdetails_prd_fk` (`productid`),
  ADD KEY `restaurantid` (`restaurantid`),
  ADD KEY `status` (`status`),
  ADD KEY `product_fashionid` (`product_fashionid`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`) USING BTREE,
  ADD KEY `orders_acc_fk` (`accountid`),
  ADD KEY `accountaddressid` (`accountaddressid`);

--
-- Indexes for table `orderstatus`
--
ALTER TABLE `orderstatus`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_reset`
--
ALTER TABLE `password_reset`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `price_locations`
--
ALTER TABLE `price_locations`
  ADD PRIMARY KEY (`id`),
  ADD KEY `price_location_ibfk_city` (`cityid`),
  ADD KEY `restaurantid` (`restaurantid`);

--
-- Indexes for table `productimages`
--
ALTER TABLE `productimages`
  ADD PRIMARY KEY (`id`),
  ADD KEY `productimages_ibfk_prd` (`productid`),
  ADD KEY `restaurantid` (`restaurantid`);

--
-- Indexes for table `productmerges`
--
ALTER TABLE `productmerges`
  ADD PRIMARY KEY (`id`),
  ADD KEY `parentproductid` (`parentproductid`),
  ADD KEY `childproductid` (`childproductid`);

--
-- Indexes for table `products_cuisine`
--
ALTER TABLE `products_cuisine`
  ADD PRIMARY KEY (`id`),
  ADD KEY `restaurantid` (`restaurantid`),
  ADD KEY `categoryid` (`categoryid`);

--
-- Indexes for table `products_fashion`
--
ALTER TABLE `products_fashion`
  ADD PRIMARY KEY (`id`),
  ADD KEY `merchantid` (`merchantid`);

--
-- Indexes for table `product_fashion_cate_assign`
--
ALTER TABLE `product_fashion_cate_assign`
  ADD PRIMARY KEY (`id`),
  ADD KEY `categoryid` (`cat_fasid`),
  ADD KEY `productid` (`product_fasid`);

--
-- Indexes for table `product_qty_color_size`
--
ALTER TABLE `product_qty_color_size`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_qty_price_color_ibfk_prd` (`productid`),
  ADD KEY `colorid` (`colorid`),
  ADD KEY `sizeid` (`sizeid`);

--
-- Indexes for table `product_qty_size`
--
ALTER TABLE `product_qty_size`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_qty_price_color_ibfk_prd` (`product_id`),
  ADD KEY `colorid` (`colorid`);

--
-- Indexes for table `restaurants`
--
ALTER TABLE `restaurants`
  ADD PRIMARY KEY (`id`),
  ADD KEY `restaurants_ibfk_city` (`cityid`),
  ADD KEY `restaurants_ibfk_state` (`stateid`);

--
-- Indexes for table `restaurantstime`
--
ALTER TABLE `restaurantstime`
  ADD PRIMARY KEY (`id`),
  ADD KEY `restaurantid` (`restaurantid`);

--
-- Indexes for table `returncustomers`
--
ALTER TABLE `returncustomers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `role_assignments`
--
ALTER TABLE `role_assignments`
  ADD PRIMARY KEY (`roleAssignmentID`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `size_category`
--
ALTER TABLE `size_category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `size_tbl`
--
ALTER TABLE `size_tbl`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sizecategoryid` (`sizecategoryid`);

--
-- Indexes for table `states`
--
ALTER TABLE `states`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `state_cities`
--
ALTER TABLE `state_cities`
  ADD PRIMARY KEY (`id`),
  ADD KEY `state_cities_ibfk_state` (`stateid`);

--
-- Indexes for table `system_audit`
--
ALTER TABLE `system_audit`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `system_modules`
--
ALTER TABLE `system_modules`
  ADD PRIMARY KEY (`moduleID`);

--
-- Indexes for table `tablereservations`
--
ALTER TABLE `tablereservations`
  ADD PRIMARY KEY (`id`),
  ADD KEY `restaurantid` (`restaurantid`),
  ADD KEY `userid` (`accountid`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_roles`
--
ALTER TABLE `user_roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `uniqueName` (`roleName`,`stationID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `accountaddresses`
--
ALTER TABLE `accountaddresses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `accounts`
--
ALTER TABLE `accounts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `bannertype`
--
ALTER TABLE `bannertype`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `categories_cusine`
--
ALTER TABLE `categories_cusine`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `categories_fashion`
--
ALTER TABLE `categories_fashion`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;
--
-- AUTO_INCREMENT for table `color_tbl`
--
ALTER TABLE `color_tbl`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `cuisine_merchant_cate_assign`
--
ALTER TABLE `cuisine_merchant_cate_assign`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `email_templates`
--
ALTER TABLE `email_templates`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `img_ads`
--
ALTER TABLE `img_ads`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT for table `orderlistdetails`
--
ALTER TABLE `orderlistdetails`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;
--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;
--
-- AUTO_INCREMENT for table `orderstatus`
--
ALTER TABLE `orderstatus`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `password_reset`
--
ALTER TABLE `password_reset`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;
--
-- AUTO_INCREMENT for table `price_locations`
--
ALTER TABLE `price_locations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `productimages`
--
ALTER TABLE `productimages`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;
--
-- AUTO_INCREMENT for table `productmerges`
--
ALTER TABLE `productmerges`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `products_cuisine`
--
ALTER TABLE `products_cuisine`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT for table `products_fashion`
--
ALTER TABLE `products_fashion`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `product_fashion_cate_assign`
--
ALTER TABLE `product_fashion_cate_assign`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
--
-- AUTO_INCREMENT for table `product_qty_color_size`
--
ALTER TABLE `product_qty_color_size`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
--
-- AUTO_INCREMENT for table `product_qty_size`
--
ALTER TABLE `product_qty_size`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `restaurants`
--
ALTER TABLE `restaurants`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `restaurantstime`
--
ALTER TABLE `restaurantstime`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `returncustomers`
--
ALTER TABLE `returncustomers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `role_assignments`
--
ALTER TABLE `role_assignments`
  MODIFY `roleAssignmentID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;
--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `size_category`
--
ALTER TABLE `size_category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `size_tbl`
--
ALTER TABLE `size_tbl`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `states`
--
ALTER TABLE `states`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;
--
-- AUTO_INCREMENT for table `state_cities`
--
ALTER TABLE `state_cities`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=739;
--
-- AUTO_INCREMENT for table `system_audit`
--
ALTER TABLE `system_audit`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `system_modules`
--
ALTER TABLE `system_modules`
  MODIFY `moduleID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;
--
-- AUTO_INCREMENT for table `tablereservations`
--
ALTER TABLE `tablereservations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
--
-- AUTO_INCREMENT for table `user_roles`
--
ALTER TABLE `user_roles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `accountaddresses`
--
ALTER TABLE `accountaddresses`
  ADD CONSTRAINT `accountaddresses_ibfk_1` FOREIGN KEY (`accountid`) REFERENCES `accounts` (`id`),
  ADD CONSTRAINT `accountaddresses_ibfk_city` FOREIGN KEY (`cityid`) REFERENCES `state_cities` (`id`),
  ADD CONSTRAINT `accountaddresses_ibfk_state` FOREIGN KEY (`stateid`) REFERENCES `states` (`id`);

--
-- Constraints for table `categories`
--
ALTER TABLE `categories`
  ADD CONSTRAINT `categories_ibfk_1` FOREIGN KEY (`restaurantid`) REFERENCES `restaurants` (`id`);

--
-- Constraints for table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_ibfk_1` FOREIGN KEY (`accountid`) REFERENCES `accounts` (`id`),
  ADD CONSTRAINT `comments_ibfk_2` FOREIGN KEY (`orderlistdetails`) REFERENCES `orderlistdetails` (`id`);

--
-- Constraints for table `cuisine_merchant_cate_assign`
--
ALTER TABLE `cuisine_merchant_cate_assign`
  ADD CONSTRAINT `cuisine_merchant_cate_assign_ibfk_1` FOREIGN KEY (`cat_cusid`) REFERENCES `categories_cusine` (`id`),
  ADD CONSTRAINT `cuisine_merchant_cate_assign_ibfk_2` FOREIGN KEY (`restaurantid`) REFERENCES `restaurants` (`id`);

--
-- Constraints for table `img_ads`
--
ALTER TABLE `img_ads`
  ADD CONSTRAINT `img_ads_ibfk_1` FOREIGN KEY (`bannertypeid`) REFERENCES `bannertype` (`id`);

--
-- Constraints for table `orderlistdetails`
--
ALTER TABLE `orderlistdetails`
  ADD CONSTRAINT `orderlistdetails_ibfk_1` FOREIGN KEY (`restaurantid`) REFERENCES `restaurants` (`id`),
  ADD CONSTRAINT `orderlistdetails_ibfk_2` FOREIGN KEY (`status`) REFERENCES `orderstatus` (`id`),
  ADD CONSTRAINT `orderlistdetails_ibfk_3` FOREIGN KEY (`product_fashionid`) REFERENCES `product_qty_color_size` (`id`),
  ADD CONSTRAINT `orderlistdetails_ord_fk` FOREIGN KEY (`orderid`) REFERENCES `orders` (`id`),
  ADD CONSTRAINT `orderlistdetails_prd_fk` FOREIGN KEY (`productid`) REFERENCES `products_cuisine` (`id`);

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_acc_fk` FOREIGN KEY (`accountid`) REFERENCES `accounts` (`id`),
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`accountaddressid`) REFERENCES `accountaddresses` (`id`);

--
-- Constraints for table `price_locations`
--
ALTER TABLE `price_locations`
  ADD CONSTRAINT `price_locations_ibfk_1` FOREIGN KEY (`restaurantid`) REFERENCES `restaurants` (`id`),
  ADD CONSTRAINT `price_locations_ibfk_city` FOREIGN KEY (`cityid`) REFERENCES `state_cities` (`id`);

--
-- Constraints for table `productimages`
--
ALTER TABLE `productimages`
  ADD CONSTRAINT `productimages_ibfk_1` FOREIGN KEY (`productid`) REFERENCES `products_fashion` (`id`),
  ADD CONSTRAINT `productimages_ibfk_2` FOREIGN KEY (`restaurantid`) REFERENCES `restaurants` (`id`);

--
-- Constraints for table `productmerges`
--
ALTER TABLE `productmerges`
  ADD CONSTRAINT `productmerges_ibfk_1` FOREIGN KEY (`parentproductid`) REFERENCES `products_cuisine` (`id`),
  ADD CONSTRAINT `productmerges_ibfk_2` FOREIGN KEY (`childproductid`) REFERENCES `products_cuisine` (`id`);

--
-- Constraints for table `products_cuisine`
--
ALTER TABLE `products_cuisine`
  ADD CONSTRAINT `products_cuisine_ibfk_1` FOREIGN KEY (`restaurantid`) REFERENCES `restaurants` (`id`);

--
-- Constraints for table `products_fashion`
--
ALTER TABLE `products_fashion`
  ADD CONSTRAINT `products_fashion_ibfk_1` FOREIGN KEY (`merchantid`) REFERENCES `restaurants` (`id`);

--
-- Constraints for table `product_fashion_cate_assign`
--
ALTER TABLE `product_fashion_cate_assign`
  ADD CONSTRAINT `product_fashion_cate_assign_ibfk_1` FOREIGN KEY (`cat_fasid`) REFERENCES `categories_fashion` (`id`),
  ADD CONSTRAINT `product_fashion_cate_assign_ibfk_2` FOREIGN KEY (`product_fasid`) REFERENCES `products_fashion` (`id`);

--
-- Constraints for table `product_qty_color_size`
--
ALTER TABLE `product_qty_color_size`
  ADD CONSTRAINT `product_qty_color_size_ibfk_1` FOREIGN KEY (`productid`) REFERENCES `products_fashion` (`id`),
  ADD CONSTRAINT `product_qty_color_size_ibfk_2` FOREIGN KEY (`colorid`) REFERENCES `color_tbl` (`id`),
  ADD CONSTRAINT `product_qty_color_size_ibfk_3` FOREIGN KEY (`sizeid`) REFERENCES `size_tbl` (`id`);

--
-- Constraints for table `product_qty_size`
--
ALTER TABLE `product_qty_size`
  ADD CONSTRAINT `product_qty_size_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `products_fashion` (`id`),
  ADD CONSTRAINT `product_qty_size_ibfk_2` FOREIGN KEY (`colorid`) REFERENCES `color_tbl` (`id`);

--
-- Constraints for table `restaurants`
--
ALTER TABLE `restaurants`
  ADD CONSTRAINT `restaurants_ibfk_city` FOREIGN KEY (`cityid`) REFERENCES `state_cities` (`id`),
  ADD CONSTRAINT `restaurants_ibfk_state` FOREIGN KEY (`stateid`) REFERENCES `states` (`id`);

--
-- Constraints for table `restaurantstime`
--
ALTER TABLE `restaurantstime`
  ADD CONSTRAINT `restaurantstime_ibfk_1` FOREIGN KEY (`restaurantid`) REFERENCES `restaurants` (`id`);

--
-- Constraints for table `size_tbl`
--
ALTER TABLE `size_tbl`
  ADD CONSTRAINT `size_tbl_ibfk_1` FOREIGN KEY (`sizecategoryid`) REFERENCES `size_category` (`id`);

--
-- Constraints for table `state_cities`
--
ALTER TABLE `state_cities`
  ADD CONSTRAINT `state_cities_ibfk_state` FOREIGN KEY (`stateid`) REFERENCES `states` (`id`);

--
-- Constraints for table `tablereservations`
--
ALTER TABLE `tablereservations`
  ADD CONSTRAINT `tablereservations_ibfk_1` FOREIGN KEY (`restaurantid`) REFERENCES `restaurants` (`id`),
  ADD CONSTRAINT `tablereservations_ibfk_2` FOREIGN KEY (`accountid`) REFERENCES `accounts` (`id`);
