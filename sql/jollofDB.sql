-- phpMyAdmin SQL Dump
-- version 4.7.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Oct 03, 2017 at 01:45 PM
-- Server version: 5.6.35
-- PHP Version: 7.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `jollofDB`
--

-- --------------------------------------------------------

--
-- Table structure for table `account`
--

CREATE TABLE `account` (
  `id` int(11) NOT NULL,
  `firstname` varchar(200) NOT NULL DEFAULT '',
  `lastname` varchar(200) DEFAULT NULL,
  `gender` char(11) DEFAULT NULL,
  `email` varchar(200) NOT NULL DEFAULT '',
  `pwd` varchar(200) NOT NULL DEFAULT '',
  `phone` varchar(200) DEFAULT NULL,
  `phone2` varchar(200) DEFAULT NULL,
  `address` varchar(200) DEFAULT NULL,
  `city` varchar(200) DEFAULT NULL,
  `add_state` int(11) DEFAULT NULL,
  `country` varchar(200) DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `categoryname` varchar(200) DEFAULT NULL,
  `categorydesc` text,
  `status` tinyint(4) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
('0bed366d257cd339feb55a0609d81715c566906f', '::1', 1507022435, 0x5f5f63695f6c6173745f726567656e65726174657c693a313530373032323433353b),
('0908c0a7fdcc452352661eb0e64d19d1f5efc141', '::1', 1507022791, 0x5f5f63695f6c6173745f726567656e65726174657c693a313530373032323739313b),
('7a0b725972e0c9729c07bdca99e652d92556fe3a', '::1', 1507023806, 0x5f5f63695f6c6173745f726567656e65726174657c693a313530373032333830363b),
('1bd4e5f8bc18a18da19b00548be37e26b41781fe', '::1', 1507024333, 0x5f5f63695f6c6173745f726567656e65726174657c693a313530373032343333333b),
('192efe8ca2f781ca1ade4bf40e287dada9aa5eca', '::1', 1507024648, 0x5f5f63695f6c6173745f726567656e65726174657c693a313530373032343634383b),
('0e94213b0b0b83ef0e881d12c2c34631bf29f65e', '::1', 1507024955, 0x5f5f63695f6c6173745f726567656e65726174657c693a313530373032343935353b),
('8ae4f9ca783df42c9d39f583c1bc8f7c33edcaf2', '::1', 1507025266, 0x5f5f63695f6c6173745f726567656e65726174657c693a313530373032353236363b),
('56e58c0fb4f9b965338771c98873e7ad64d13c6f', '::1', 1507025571, 0x5f5f63695f6c6173745f726567656e65726174657c693a313530373032353537313b),
('ff8d79159286fb7d539f1e4427287a42b093b098', '::1', 1507025880, 0x5f5f63695f6c6173745f726567656e65726174657c693a313530373032353838303b),
('e4fbc10abae003d51c0419bb11c76690d1f83f4f', '::1', 1507026275, 0x5f5f63695f6c6173745f726567656e65726174657c693a313530373032363237353b),
('fc3b71ac4586df1ea5fa633ea968e36685382b90', '::1', 1507026579, 0x5f5f63695f6c6173745f726567656e65726174657c693a313530373032363537393b),
('0ae4bf811368b8e00cae3a289011fbbf476d49a4', '::1', 1507027269, 0x5f5f63695f6c6173745f726567656e65726174657c693a313530373032373236393b),
('d5d0bc49906117786bcb73c9089819d33e27cea3', '::1', 1507028276, 0x5f5f63695f6c6173745f726567656e65726174657c693a313530373032383237363b),
('7ebb5d54179b59c5144b51cc926b4d72c2c43362', '::1', 1507028583, 0x5f5f63695f6c6173745f726567656e65726174657c693a313530373032383538333b),
('8546fb80bfffd0cd266fe9bfaff9c8bf7694357e', '::1', 1507028971, 0x5f5f63695f6c6173745f726567656e65726174657c693a313530373032383937313b),
('2e62656a0d37968697b32ead96005da46a2c9e5f', '::1', 1507029295, 0x5f5f63695f6c6173745f726567656e65726174657c693a313530373032393239353b),
('59a5357132a93294b1c28939264b099a5752e9c9', '::1', 1507029609, 0x5f5f63695f6c6173745f726567656e65726174657c693a313530373032393630393b),
('910902e7ad4d1122e9ceeb3e3ca84be9a5be3357', '::1', 1507029922, 0x5f5f63695f6c6173745f726567656e65726174657c693a313530373032393932323b),
('5a5d412cc5471f6dc7929c3975cb31368028e52a', '::1', 1507030225, 0x5f5f63695f6c6173745f726567656e65726174657c693a313530373033303232353b),
('c3465979918313f2f57788d898e5cad2135ad25a', '::1', 1507030557, 0x5f5f63695f6c6173745f726567656e65726174657c693a313530373033303535373b),
('9f7a0a3930b96823167ca1fe631d6cafdc12dd20', '::1', 1507030897, 0x5f5f63695f6c6173745f726567656e65726174657c693a313530373033303839373b),
('694cee0b0689a08435e32ff47cfb8bb65ba0ce2b', '::1', 1507031001, 0x5f5f63695f6c6173745f726567656e65726174657c693a313530373033303839373b);

-- --------------------------------------------------------

--
-- Table structure for table `orderlistdetails`
--

CREATE TABLE `orderlistdetails` (
  `id` int(11) NOT NULL,
  `product_id` int(11) DEFAULT NULL,
  `orders_id` int(11) DEFAULT NULL,
  `qty` int(200) DEFAULT NULL,
  `price` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `account_id` int(11) NOT NULL,
  `total_amount` int(30) NOT NULL,
  `order_status_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `orderstatus`
--

CREATE TABLE `orderstatus` (
  `id` int(11) NOT NULL,
  `orderstatus_desc` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `productID` int(11) NOT NULL,
  `restaurantID` int(11) NOT NULL,
  `categoryID` int(11) NOT NULL,
  `productname` varchar(250) NOT NULL,
  `productprice` varchar(30) NOT NULL,
  `productdesc` text NOT NULL,
  `productimage` varchar(250) NOT NULL,
  `productgrand_unit_qty` int(255) NOT NULL,
  `productinstock` int(255) NOT NULL,
  `productrate` int(255) NOT NULL,
  `othernote` text NOT NULL,
  `status` tinyint(4) NOT NULL,
  `createdat` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updatedat` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deletedat` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`productID`, `restaurantID`, `categoryID`, `productname`, `productprice`, `productdesc`, `productimage`, `productgrand_unit_qty`, `productinstock`, `productrate`, `othernote`, `status`, `createdat`, `updatedat`, `deletedat`) VALUES
(1, 0, 1, 'ASUS Laptop 1500', '799.00', '', 'asus-laptop.jpg', 0, 0, 0, '', 0, '2017-09-21 16:08:54', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(2, 0, 1, 'Microsoft Surface Pro 3', '898.00', '', 'surface-pro.jpg', 0, 0, 0, '', 0, '2017-09-21 16:08:54', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(3, 0, 1, 'Samsung EVO 32GB', '12.00', '', 'samsung-sd-card.jpg', 0, 0, 0, '', 0, '2017-09-21 16:08:54', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(4, 0, 1, 'Desktop Hard Drive', '50.00', '', 'computer-hard-disk.jpg', 0, 0, 0, '', 0, '2017-09-21 16:08:54', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(5, 0, 1, 'External Hard Drive', '80.00', '', 'external-hard-disk.jpg', 0, 0, 0, '', 0, '2017-09-21 16:08:54', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(6, 0, 2, 'Crock-Pot Oval Slow Cooker', '34.00', '', 'crok-pot-cooker.jpg', 0, 0, 0, '', 0, '2017-09-21 16:08:54', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(7, 0, 2, 'Magic Blender System', '80.00', '', 'blender.jpg', 0, 0, 0, '', 0, '2017-09-21 16:08:54', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(8, 0, 2, 'Cordless Hand Vacuum', '40.00', '', 'vaccum-cleaner.jpg', 0, 0, 0, '', 0, '2017-09-21 16:08:54', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(9, 0, 2, 'Dishwasher Detergent', '15.00', '', 'detergent-powder.jpg', 0, 0, 0, '', 0, '2017-09-21 16:08:54', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(10, 0, 2, 'Essential Oil Diffuser', '20.00', '', 'unpower-difuser.jpg', 0, 0, 0, '', 0, '2017-09-21 16:08:54', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(11, 0, 3, 'Medical Personalized', '11.00', '', 'hand-bag.jpg', 0, 0, 0, '', 0, '2017-09-21 16:08:54', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(12, 0, 3, 'Best Bridle Leather Belt', '64.00', '', 'mens-belt.jpg', 0, 0, 0, '', 0, '2017-09-21 16:08:54', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(13, 0, 3, 'HANDMADE Bow set', '24.00', '', 'pastal-colors.jpg', 0, 0, 0, '', 0, '2017-09-21 16:08:54', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(14, 0, 3, 'Ceramic Coffee Mug', '18.00', '', 'coffee-mug.jpg', 0, 0, 0, '', 0, '2017-09-21 16:08:54', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(15, 0, 3, 'Wine Birthday Glass', '18.00', '', 'wine-glass.jpg', 0, 0, 0, '', 0, '2017-09-21 16:08:54', '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `productimage`
--

CREATE TABLE `productimage` (
  `id` int(255) NOT NULL,
  `productID` int(255) NOT NULL,
  `imagename` text NOT NULL,
  `status` tinyint(4) NOT NULL,
  `createdat` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updatedat` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deletedat` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `products_old`
--

CREATE TABLE `products_old` (
  `id` int(11) NOT NULL,
  `restaurant_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `productname` varchar(200) NOT NULL DEFAULT '',
  `productdesc` varchar(200) NOT NULL DEFAULT '',
  `productcolor` varchar(200) DEFAULT NULL,
  `productsize` varchar(200) DEFAULT NULL,
  `price` double DEFAULT NULL,
  `productrate` int(200) DEFAULT NULL,
  `productgrand_unit_qty` int(200) DEFAULT NULL,
  `productcurrent_order` int(200) DEFAULT NULL,
  `product_in_stock` int(200) DEFAULT NULL,
  `other_note` text,
  `status` tinyint(4) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `product_qty_price_color`
--

CREATE TABLE `product_qty_price_color` (
  `id` int(11) NOT NULL,
  `productID` int(255) NOT NULL,
  `quantity` int(255) NOT NULL,
  `size` varchar(255) NOT NULL,
  `color` varchar(255) NOT NULL,
  `colorimage` text NOT NULL,
  `productpricequantity` double NOT NULL,
  `description` text NOT NULL,
  `status` tinyint(4) NOT NULL,
  `createdat` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updatedat` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deletedat` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `restaurants`
--

CREATE TABLE `restaurants` (
  `id` int(11) NOT NULL,
  `companyname` varchar(200) NOT NULL,
  `firstname` varchar(200) NOT NULL DEFAULT '',
  `lastname` varchar(200) DEFAULT NULL,
  `gender` char(11) DEFAULT NULL,
  `email` varchar(200) NOT NULL DEFAULT '',
  `pwd` varchar(200) NOT NULL DEFAULT '',
  `phone` varchar(200) DEFAULT NULL,
  `phone2` varchar(200) DEFAULT NULL,
  `address` varchar(200) DEFAULT NULL,
  `city` varchar(200) DEFAULT NULL,
  `add_state` int(11) DEFAULT NULL,
  `country` varchar(200) DEFAULT NULL,
  `logo` varchar(200) DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
(1, 'User logged in successfully', 25, '::1', '2017-09-25 13:49:00', 'Chrome', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_12_6) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/60.0.3112.113 Safari/537.36', 'Mac OS X'),
(2, 'User logged in successfully', 25, '::1', '2017-09-25 13:50:00', 'Chrome', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_12_6) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/60.0.3112.113 Safari/537.36', 'Mac OS X');

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
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `userID` int(11) NOT NULL,
  `userroleid` int(11) DEFAULT NULL,
  `firstname` varchar(30) DEFAULT NULL,
  `lastname` varchar(30) DEFAULT NULL,
  `email` varchar(30) DEFAULT NULL,
  `phonenumber` varchar(20) DEFAULT NULL,
  `merchantid` int(11) DEFAULT NULL,
  `username` varchar(20) DEFAULT NULL,
  `password` varchar(255) DEFAULT '',
  `userstatus` int(11) DEFAULT NULL,
  `accesstype` tinyint(4) DEFAULT NULL,
  `forcepasswordchange` tinyint(4) DEFAULT '0',
  `lastLogin` datetime DEFAULT NULL,
  `lastLoginIP` varchar(30) DEFAULT NULL,
  `passwordresettoken` varchar(255) DEFAULT NULL,
  `createdat` datetime DEFAULT NULL,
  `updatedat` datetime DEFAULT NULL,
  `deletedat` datetime DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`userID`, `userroleid`, `firstname`, `lastname`, `email`, `phonenumber`, `merchantid`, `username`, `password`, `userstatus`, `accesstype`, `forcepasswordchange`, `lastLogin`, `lastLoginIP`, `passwordresettoken`, `createdat`, `updatedat`, `deletedat`) VALUES
(7, 1, 'OLUWASEUN', 'OLUDELE', 'seun@oludeleseun.com', '08032530125', NULL, 'oludeleseun', 'c5864e0679a35c03abd1c36ad81c8d20', 1, 1, 0, NULL, '127.0.0.1', NULL, '2017-05-24 06:07:12', NULL, NULL),
(11, 1, 'Obianuju', 'Ezeanyangu', 'uju@softcom.ng', '07031312454', 70002, 'softcom-admin', 'c5864e0679a35c03abd1c36ad81c8d20', 1, 2, NULL, NULL, NULL, NULL, '2017-05-24 06:07:12', NULL, NULL),
(12, 1, 'Medplus', 'Admin', 'seun@oludeleseun.com', '08032530125', 70001, 'medplusikeja', 'dad40339cf9ecde78ef6d9ae3b0dcb6f', 1, 2, 1, NULL, '', NULL, '2017-05-24 06:07:12', NULL, NULL),
(13, 1, 'Admin', 'GSK', 'uju@softcom.ng', '08032530125', 0, 'gsk-admin', '30ee699bd369d7989888ad5b4599b778', 0, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(14, 0, 'Riordan', 'Dolores', 'seun@oludele.com', '08032530125', 70002, 'dolores.chan', 'c5864e0679a35c03abd1c36ad81c8d20', 1, 2, 0, NULL, NULL, NULL, NULL, NULL, NULL),
(21, 1, 'O\'RIORDAN', 'DOLORES', 'oludeleseun@gmail.com', '08032530125', 0, 'dolores.seun', 'c5864e0679a35c03abd1c36ad81c8d20', 1, 1, 1, NULL, NULL, NULL, NULL, '2017-07-06 07:10:07', NULL),
(22, 1, 'Mark', 'Baeka', 'didiokoh@gmail.com', '07061113853', 0, 'ndudi.okoh1', 'c5864e0679a35c03abd1c36ad81c8d20', 1, 1, 0, NULL, NULL, NULL, '2017-06-23 19:10:18', '2017-07-06 05:58:02', NULL),
(24, 1, 'Oluwaseun', 'Oludele', 'seun@stakle.com', '08032530125', 70004, 'seun01', '2ac9cb7dc02b3c0083eb70898e549b63', 1, 2, 0, NULL, NULL, NULL, '2017-09-05 16:33:39', NULL, NULL),
(25, 1, 'oy3', 'trivin', 'oye@ebs.com', '0800989522', 201, 'oy3', '21232f297a57a5a743894a0e4a801fc3', 1, 0, 1, NULL, '::1', NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `user_roles`
--

CREATE TABLE `user_roles` (
  `roleID` int(11) NOT NULL,
  `roleName` varchar(30) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `stationID` int(11) DEFAULT NULL,
  `createdat` datetime DEFAULT NULL,
  `updatedat` datetime DEFAULT NULL,
  `deletedat` datetime DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_roles`
--

INSERT INTO `user_roles` (`roleID`, `roleName`, `status`, `stationID`, `createdat`, `updatedat`, `deletedat`) VALUES
(1, 'Super Admin', 1, 1, NULL, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `account`
--
ALTER TABLE `account`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ci_sessions`
--
ALTER TABLE `ci_sessions`
  ADD KEY `ci_sessions_timestamp` (`timestamp`);

--
-- Indexes for table `orderlistdetails`
--
ALTER TABLE `orderlistdetails`
  ADD PRIMARY KEY (`id`),
  ADD KEY `orderlistdetails_prd_fk` (`product_id`),
  ADD KEY `orderlistdetails_ord_fk` (`orders_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `orders_acc_fk` (`account_id`),
  ADD KEY `orders_status_fk` (`order_status_id`);

--
-- Indexes for table `orderstatus`
--
ALTER TABLE `orderstatus`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`productID`);

--
-- Indexes for table `productimage`
--
ALTER TABLE `productimage`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products_old`
--
ALTER TABLE `products_old`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_rest_fk` (`restaurant_id`),
  ADD KEY `product_cate_fk` (`category_id`);

--
-- Indexes for table `product_qty_price_color`
--
ALTER TABLE `product_qty_price_color`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `restaurants`
--
ALTER TABLE `restaurants`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `role_assignments`
--
ALTER TABLE `role_assignments`
  ADD PRIMARY KEY (`roleAssignmentID`);

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
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`userID`);

--
-- Indexes for table `user_roles`
--
ALTER TABLE `user_roles`
  ADD PRIMARY KEY (`roleID`),
  ADD UNIQUE KEY `uniqueName` (`roleName`,`stationID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `account`
--
ALTER TABLE `account`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `orderlistdetails`
--
ALTER TABLE `orderlistdetails`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `orderstatus`
--
ALTER TABLE `orderstatus`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `productID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `productimage`
--
ALTER TABLE `productimage`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `products_old`
--
ALTER TABLE `products_old`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `product_qty_price_color`
--
ALTER TABLE `product_qty_price_color`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `restaurants`
--
ALTER TABLE `restaurants`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `role_assignments`
--
ALTER TABLE `role_assignments`
  MODIFY `roleAssignmentID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;
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
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `userID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
--
-- AUTO_INCREMENT for table `user_roles`
--
ALTER TABLE `user_roles`
  MODIFY `roleID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `orderlistdetails`
--
ALTER TABLE `orderlistdetails`
  ADD CONSTRAINT `orderlistdetails_ord_fk` FOREIGN KEY (`orders_id`) REFERENCES `orders` (`id`),
  ADD CONSTRAINT `orderlistdetails_prd_fk` FOREIGN KEY (`product_id`) REFERENCES `products_old` (`id`);

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_acc_fk` FOREIGN KEY (`account_id`) REFERENCES `account` (`id`),
  ADD CONSTRAINT `orders_status_fk` FOREIGN KEY (`order_status_id`) REFERENCES `orderstatus` (`id`);

--
-- Constraints for table `products_old`
--
ALTER TABLE `products_old`
  ADD CONSTRAINT `product_cate_fk` FOREIGN KEY (`category_id`) REFERENCES `category` (`id`),
  ADD CONSTRAINT `product_rest_fk` FOREIGN KEY (`restaurant_id`) REFERENCES `restaurants` (`id`);
