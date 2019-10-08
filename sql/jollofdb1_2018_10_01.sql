-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Oct 01, 2018 at 09:38 AM
-- Server version: 10.1.16-MariaDB
-- PHP Version: 7.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `jollofdb1`
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
  `isdeleted` tinyint(1) NOT NULL DEFAULT '0',
  `status` tinyint(4) DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `accountaddresses`
--

INSERT INTO `accountaddresses` (`id`, `accountid`, `firstname`, `lastname`, `phone`, `phone2`, `address`, `cityid`, `stateid`, `createdat`, `updatedat`, `deletedat`, `isdeleted`, `status`) VALUES
(1, 1, 'Ademibo', 'Opeyemi', NULL, NULL, 'No 30 school road ', 495, 25, '2017-11-02 15:56:34', '2017-11-02 15:56:34', NULL, 0, 1),
(2, 1, 'Oye', 'Admin', '08080886654', '029272222', 'No 15 main close avn.', 483, 25, '2017-11-02 15:58:34', '2017-11-02 15:56:34', NULL, 0, 1),
(3, 5, 'Prince', 'test', '2323456789', '', '30 rasaki Tijani Street, Ikotun', 17, 2, '2018-02-02 12:25:35', '2018-02-02 12:25:35', NULL, 0, 1),
(4, 5, 'Prince', 'test', '2323456789', '', '30 rasaki Tijani Street, Ikotun', 17, 2, '2018-02-02 12:25:35', '2018-02-02 12:25:35', NULL, 0, 1),
(5, 575, 'ade', 'tunde', '0859559', NULL, 'lake size close', 25, 492, '2018-08-19 20:01:29', '2018-08-19 20:01:29', NULL, 0, 1),
(6, 576, 'ade', 'tunde', '0859559', NULL, 'lake size close', 25, 492, '2018-08-19 20:02:21', '2018-08-19 20:02:21', NULL, 0, 1),
(7, 577, 'ade', 'tunde', '0859559', NULL, 'lake size close', 25, 492, '2018-08-20 09:18:22', '2018-08-20 09:18:22', NULL, 0, 1),
(8, 578, 'ade', 'tunde', '0859559', NULL, 'lake size close', 25, 486, '2018-08-20 11:20:02', '2018-08-20 11:20:02', NULL, 0, 1),
(9, 578, 'ade', 'tunde', '0859559', NULL, 'lake size close', 25, 485, '2018-08-20 11:45:09', '2018-08-20 11:45:09', NULL, 0, 1),
(10, 578, 'ade', 'tunde', '0859559', NULL, 'lake size close', 25, 485, '2018-08-20 11:55:51', '2018-08-20 11:55:51', NULL, 0, 1),
(11, 578, 'ade', 'tunde', '0859559', NULL, 'lake size close', 25, 485, '2018-08-20 11:57:45', '2018-08-20 11:57:45', NULL, 0, 1),
(12, 578, 'ade', 'tunde', '0859559', NULL, 'lake size close', 25, 485, '2018-08-20 12:04:49', '2018-08-20 12:04:49', NULL, 0, 1),
(13, 578, 'ade', 'tunde', '0859559', NULL, 'lake size close', 25, 485, '2018-08-20 12:05:14', '2018-08-20 12:05:14', NULL, 0, 1),
(14, 578, 'ade', 'tunde', '0859559', NULL, 'lake size close', 25, 485, '2018-08-20 12:06:58', '2018-08-20 12:06:58', NULL, 0, 1),
(15, 578, 'ade', 'tundewe', '0859559', NULL, 'lake size close', 25, 486, '2018-08-20 12:24:08', '2018-08-20 12:24:08', NULL, 0, 1),
(16, 578, 'ade', 'tundewe', '0859559', NULL, 'lake size close', 25, 486, '2018-08-20 12:27:13', '2018-08-20 12:27:13', NULL, 0, 1),
(17, 578, 'ade', 'tundewe', '0859559', NULL, 'lake size close', 25, 487, '2018-08-20 12:27:44', '2018-08-20 12:27:44', NULL, 0, 1),
(18, 578, 'ade', 'tunde', '0859559', NULL, 'lake size close', 25, 485, '2018-08-20 12:34:34', '2018-08-20 12:34:34', NULL, 0, 1),
(19, 578, 'ade', 'tunde', '0859559', NULL, 'lake size close', 25, 485, '2018-08-20 12:40:55', '2018-08-20 12:40:55', NULL, 0, 1),
(20, 578, 'ade', 'tunde', '0859559', NULL, 'lake size close', 482, 25, '2018-08-20 13:38:44', '2018-08-20 13:38:44', NULL, 0, 1),
(21, 585, 'ade', 'tunde', '0859559', NULL, '30 rasaki Tijani Street, Ikotun', 486, 25, '2018-09-14 09:48:03', '2018-09-14 09:48:03', NULL, 0, 1);

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
  `point` int(11) DEFAULT '0',
  `usertype` varchar(200) DEFAULT 'user',
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

INSERT INTO `accounts` (`id`, `firstname`, `lastname`, `gender`, `email`, `password`, `phone`, `phone2`, `point`, `usertype`, `status`, `image`, `token`, `admin_read_status`, `createdat`, `updatedat`, `deletedat`, `isdeleted`) VALUES
(1, 'Oye''s', 'Segun', 'male', 'oye@ebs.com', '21232f297a57a5a743894a0e4a801fc3', '08080786656', '', 200, 'user', 1, '4272f7683b.jpg', NULL, 0, '2017-10-07 00:34:09', '2018-08-24 09:13:38', NULL, 0),
(2, 'yinka', 'tunji', NULL, 'yinka@ebsafr.com', '', '0907865432', '09087654321', 0, 'user', 1, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-15 14:42:46', NULL, 0),
(3, 'Ebuka', 'Ezewuzie', NULL, 'ebuka.ezewuzie@gmail.com', '', '08069802185', NULL, 0, 'user', 1, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-15 14:42:46', NULL, 0),
(4, 'gbemi', 'Eda', NULL, 'edab@ebsafr.com', '', '07090345678', NULL, 0, 'user', 1, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-15 14:42:46', NULL, 0),
(5, 'Bemigho', 'Eda', NULL, 'gbemiaus@yahoo.com', '', '08037078922', '08037078923', 0, 'user', 1, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-15 14:42:46', NULL, 0),
(6, 'lucy', 'mballa', NULL, 'mballalucy87@gmail.com', '', '08141226692', NULL, 0, 'user', 1, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-15 14:42:46', NULL, 0),
(7, 'Bobby', 'A.', NULL, 'bobbya@ebsafr.com', '', '08073154434', NULL, 0, 'user', 1, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-15 14:42:46', NULL, 0),
(8, 'kannike', 'ibrahim', NULL, 'vdjtribe@yahoo.com', '', '+971555930483', '+971555930483', 0, 'user', 1, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-15 14:42:46', NULL, 0),
(9, 'Bukola', 'Oshinyemi', NULL, 'bhouckie@gmail.com', '', '08029858731', NULL, 0, 'user', 1, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-15 14:42:46', NULL, 0),
(10, 'Abiola', 'Oyebolu', NULL, 'bolub1@yahoo.com', '', '08026754151', NULL, 0, 'user', 1, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-15 14:42:46', NULL, 0),
(11, 'Onafalujo', 'Adewale', NULL, 'walengy2001@gmal.com', '', '07084223896', NULL, 0, 'user', 1, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-15 14:42:46', NULL, 0),
(12, 'Abiola', 'Oyebolu', NULL, 'oyeboluabiola@gmail.com', '', '08026754151', NULL, 0, 'user', 1, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-15 14:42:46', NULL, 0),
(13, 'oyinda', 'olashoju', NULL, 'oolashoju@gmail.com', '', '08136617350', NULL, 0, 'user', 1, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-15 14:42:46', NULL, 0),
(14, 'olufemi', 'adeniregun', NULL, 'boxer2905@yahoo.ca', '', '07035045787', NULL, 0, 'user', 1, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-15 14:42:46', NULL, 0),
(15, 'boro', 'akintunde', NULL, 'olajobi@hotmail.com', '', '08087000074', '08087000074', 0, 'user', 1, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-15 14:42:46', NULL, 0),
(16, 'Sherif', 'Kabiawu', NULL, 'sherifkk@gmail.com', '', '08077770771', NULL, 0, 'user', 1, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-15 14:42:46', NULL, 0),
(17, 'Cyril', 'Nwabudike', NULL, 'cyril_nwa@yahoo.co.uk', '', '08035523397', NULL, 0, 'user', 1, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-15 14:42:46', NULL, 0),
(18, 'Albert', 'iyorah', NULL, 'al@al-brett.com', '', '08050703000', NULL, 0, 'user', 1, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-15 14:42:46', NULL, 0),
(19, 'Taiwo', 'Oniru-Akintokun', NULL, 'taiwo.oniruakintokun@gmail.com', '', '07089997466', NULL, 0, 'user', 1, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-15 14:42:46', NULL, 0),
(20, 'martin', 'okulaja', NULL, 'martin.okulaja@addaxpetroleum.com', '', '08034021948', NULL, 0, 'user', 1, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-15 14:42:46', NULL, 0),
(21, 'kehinde', 'adewole', NULL, 'allaboutprintng@gmail.com', '', '07089995322', '08187998418', 0, 'user', 1, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-15 14:42:46', NULL, 0),
(22, 'matthew', 'karieren', NULL, 'mkarieren@yahoo.co.uk', '', '08023122015', NULL, 0, 'user', 1, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-15 14:42:46', NULL, 0),
(23, 'fola', 'aganga-williams', NULL, 'fogagtta@aol.com', '', '08072797167', NULL, 0, 'user', 1, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-15 14:42:46', NULL, 0),
(24, 'shoyinka', 'shodunke', NULL, 'shoyins@mtnngeria.net', '', '08032001964', NULL, 0, 'user', 1, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-15 14:42:46', NULL, 0),
(25, 'aderinko', 'eliot', NULL, 'rinkoeliot@yahoo.com', '', '08029311012', '08029311012', 0, 'user', 1, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-15 14:42:46', NULL, 0),
(26, 'princess', 'ogunlusi', NULL, 'helleanababe@ymail.com', '', '08027000960', '08127464834', 0, 'user', 1, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-15 14:42:46', NULL, 0),
(27, 'obianuju', 'ogubuike', NULL, 'Oby_ogu@yahoo.com', '', '07067839263', '08085247131', 0, 'user', 1, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-15 14:42:46', NULL, 0),
(28, 'olufemi', 'oyenuga', NULL, 'olufemo@mtnnigeria.net', '', '08032008540', '0809992407', 0, 'user', 1, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-15 14:42:46', NULL, 0),
(29, 'mary', 'fasheitan', NULL, 'mfasheitan@gmail.com', '', '08032024429', '07025015135', 0, 'user', 1, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-15 14:42:46', NULL, 0),
(30, 'albert', 'iyorah', NULL, 'albrett2001@yahoo.com', '', '08050703000', NULL, 0, 'user', 1, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-15 14:42:46', NULL, 0),
(31, 'christopher', 'kelechukwu', NULL, 'wziwabo11@yahoo.es', '', '08125078696', NULL, 0, 'user', 1, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-15 14:42:46', NULL, 0),
(32, 'david', 'yerima', NULL, 'yerimadh@gnail.com', '', '08035956295', NULL, 0, 'user', 1, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-15 14:42:46', NULL, 0),
(33, 'ola', 'beldore', NULL, 'olabeldore@yahoo.com', '', '08023234910', NULL, 0, 'user', 1, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-15 14:42:46', NULL, 0),
(34, 'Ebuka', 'Ezewuzie', NULL, 'ebuka@vationsys.com', '', '08032009295', NULL, 0, 'user', 1, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-15 14:42:46', NULL, 0),
(35, 'Babajide', 'Akintokun', NULL, 'akintokun7@gmail.com', '', '08022224320', '08058074266', 0, 'user', 1, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-15 14:42:46', NULL, 0),
(36, 'charles', 'anyanwu', NULL, 'demo4eva@hotmail.com', '', '08035036336', NULL, 0, 'user', 1, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-15 14:42:46', NULL, 0),
(37, 'omolola', 'ogunmoroti', NULL, 'teju_4real@yahoo.com', '', '08120173873', NULL, 0, 'user', 1, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-15 14:42:46', NULL, 0),
(38, 'olatubosun', 'ebenezer', NULL, 'tubosun4dare@yahoo.com', '', '07062261028', '07062261028', 0, 'user', 1, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-15 14:42:46', NULL, 0),
(39, 'SHEILA', 'HUNTER', NULL, 'sheila.hunter80@yahoo.com', '', '08060145470', '08037689872', 0, 'user', 1, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-15 14:42:46', NULL, 0),
(40, 'Jide', 'Shitta-Bey', NULL, 'jidebey@hotmail.com', '', '08092222224', '08092222224', 0, 'user', 1, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-15 14:42:46', NULL, 0),
(41, 'murphy', 'okojie', NULL, 'info@shaunzbar.com', '', '08038077536', NULL, 0, 'user', 1, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-15 14:42:46', NULL, 0),
(42, 'kaee', 'kekere', NULL, 'kaekekere@gmail.com', '', '08077707604', NULL, 0, 'user', 1, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-15 14:42:46', NULL, 0),
(43, 'lolo', 'majin', NULL, 'lolomajin@yahoo.com', '', '08023096473', NULL, 0, 'user', 1, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-15 14:42:46', NULL, 0),
(44, 'Valentine', 'anozia', NULL, 'vanozia@yahoo.com', '', '08034563328', NULL, 0, 'user', 1, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-15 14:42:46', NULL, 0),
(45, 'nurad', 'ahmed', NULL, 'goldenhammer62@yahoo.co.uk', '', '08037050786', NULL, 0, 'user', 1, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-15 14:42:46', NULL, 0),
(46, 'marshall', 'onwuameze', NULL, 'marshallonwuameze@yahoo.com', '', '08033009988', NULL, 0, 'user', 1, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-15 14:42:46', NULL, 0),
(47, 'supa', 'famuyiwa', NULL, 'sgsl@qualityssrvice.com', '', '08077719777', NULL, 0, 'user', 1, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-15 14:42:46', NULL, 0),
(48, 'kayode', 'olaleye', NULL, 'olaleye@eyespynigeria.com', '', '07030012223', NULL, 0, 'user', 1, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-15 14:42:46', NULL, 0),
(49, 'Abisola', 'Olowe', NULL, 'bslash90@yahoo.com', '', '07038409739', '09024002000', 0, 'user', 1, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-15 14:42:46', NULL, 0),
(50, 'Bukola', 'Kolade', NULL, 'tessybukkie@yahoo.com', '', '08069027132', NULL, 0, 'user', 1, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-15 14:42:46', NULL, 0),
(51, 'Rofiat', 'abdulazeez', NULL, 'rofiatabdul@gmail.com', '', '08034498798', NULL, 0, 'user', 1, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-15 14:42:46', NULL, 0),
(52, 'Awobotu', 'omowunmi', NULL, 'omocheezy@yahoo.com', '', '07068392470', '07033268322', 0, 'user', 1, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-15 14:42:46', NULL, 0),
(53, 'Awobotu', 'omowunmi', NULL, 'omocheezy@gmail.com', '', '07068392470', '07033268322', 0, 'user', 1, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-15 14:42:46', NULL, 0),
(54, 'Ogunsanya', 'Nelson', NULL, 'ogunsanya_abiodunnelson@yahoo.com', '', '08066295989', '08027028781', 0, 'user', 1, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-15 14:42:46', NULL, 0),
(55, 'francis', 'Euzebio', NULL, 'francis.euzebio@yahoo.com', '', '07988764008', NULL, 0, 'user', 1, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-15 14:42:46', NULL, 0),
(56, 'Suraju', 'Arogundade', NULL, 'Sarogundade@yahoo.com', '', '00912404639853', '00912404639853', 0, 'user', 1, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-15 14:42:46', NULL, 0),
(57, 'nosa', 'o', NULL, 'ogbemski@yahoo.co.uk', '', '08061352555', NULL, 0, 'user', 1, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-15 14:42:46', NULL, 0),
(58, 'Akinola', 'Sawyerr', NULL, 'a_sawyerr@yahoo.co.uk', '', '07055238880', NULL, 0, 'user', 1, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-15 14:42:46', NULL, 0),
(59, 'Godwin', 'Anthony', NULL, 'Nsisong2000@yahoo.co.uk', '', '07042689772', NULL, 0, 'user', 1, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-15 14:42:46', NULL, 0),
(60, 'Doyin', 'Ogunnoiki', NULL, 'ddoyinaquarious@gmail.com', '', '8033980242', '8090111122', 0, 'user', 1, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-15 14:42:46', NULL, 0),
(61, 'Adetutu', 'onadeko', NULL, 'onadekosunbo@yahoo.com', '', '08136138275', NULL, 0, 'user', 1, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-15 14:42:46', NULL, 0),
(62, 'Akindele', 'Age', NULL, 'Akin.afe@hotmail.com', '', '+447415335055', NULL, 0, 'user', 1, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-15 14:42:46', NULL, 0),
(63, 'SULAIMON', 'OLAOTAN', NULL, 'sulaimonolaotan@yahoo.com', '', '08027194743', NULL, 0, 'user', 1, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-15 14:42:46', NULL, 0),
(64, 'Kareem', 'Arogundade', NULL, 'Arogundadekareem@gmail.com', '', '+44 7427 690704', NULL, 0, 'user', 1, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-15 14:42:46', NULL, 0),
(65, 'Taiwo', 'Joseph', NULL, 'tobi4reel2001@gmail.com', '', '08036984014', '07039225786', 0, 'user', 1, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-15 14:42:46', NULL, 0),
(66, 'Motunrayo', 'Adebo', NULL, 'tumo2mo@yahoo.com', '', '08023444882', NULL, 0, 'user', 1, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-15 14:42:46', NULL, 0),
(67, 'Odunayo', 'Adams', NULL, 'adamsodunayo@gmail.com', '', '08082994560', NULL, 0, 'user', 1, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-15 14:42:46', NULL, 0),
(68, 'Oluwatobi', 'Samuel', NULL, 'tboypompin@gmail.com', '', '08104663302', NULL, 0, 'user', 1, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-15 14:42:46', NULL, 0),
(69, 'modinat', 'yusuf', NULL, 'aprise_17@yahoo.com', '', '08171114417', '08026235688', 0, 'user', 1, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-15 14:42:46', NULL, 0),
(70, 'ADEGBESAN', 'OLANREWAJU', NULL, 'dailysun2004@yahoo.com', '', '08032571367', '08032571367', 0, 'user', 1, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-15 14:42:46', NULL, 0),
(71, 'Tayelolu', 'hassan', NULL, 'mailboxfifty3@gmail.com', '', '08028442500', NULL, 0, 'user', 1, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-15 14:42:46', NULL, 0),
(72, 'Abdurrahman', 'Adebiyi', NULL, 'abdbaddude@gmail.com', '', '07063376867', '08051600166', 0, 'user', 1, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-15 14:42:46', NULL, 0),
(73, 'Don', 'Abdul-Kareem', NULL, 'kpapetson@gmail.com', '', '+2348090657799', NULL, 0, 'user', 1, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-15 14:42:46', NULL, 0),
(74, 'Uche', 'Adophy', NULL, 'adophyuche@gmail.com', '', '08053653935', '07035138365', 0, 'user', 1, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-15 14:42:46', NULL, 0),
(75, 'Nkechi', 'Emeruwa', NULL, 'kechiwam@gmail.com', '', '08029113957', NULL, 0, 'user', 1, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-15 14:42:46', NULL, 0),
(76, 'seni', 'olumole', NULL, 'seni.olumole@gmail.com', '', '08055137237', NULL, 0, 'user', 1, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-15 14:42:46', NULL, 0),
(77, 'Bukola', 'Oshinyemi', NULL, 'bukolaoshinyemi@gmail.com', '', '08029858731', NULL, 0, 'user', 1, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-15 14:42:46', NULL, 0),
(78, 'Funmilayo', 'Atolagbe', NULL, 'fatolagbe@hotmail.com', '', '07055555487', NULL, 0, 'user', 1, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-15 14:42:46', NULL, 0),
(79, 'Idara', 'Usoro', NULL, 'usoroidee@gmail.com', '', '07012084678', '07082224616', 0, 'user', 1, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-15 14:42:46', NULL, 0),
(80, 'will', 'leb', NULL, 'guillaume.leblond@essec.edu', '', '077088330546', NULL, 0, 'user', 1, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-15 14:42:46', NULL, 0),
(81, 'victoria', 'lukoh', NULL, 'victorialukoh@yahoo.com', '', '08077311043', '07045047720', 0, 'user', 1, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-15 14:42:46', NULL, 0),
(82, 'Abiola', 'Leshi', NULL, 'biolaleshi@yahoo.com', '', '08084334724', '07032345113', 0, 'user', 1, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-15 14:42:46', NULL, 0),
(83, 'Rasheedat', 'Olatunji', NULL, 'rasheedat.sekoni@yahoo.com', '', '+2348031848010', NULL, 0, 'user', 1, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-15 14:42:46', NULL, 0),
(84, 'Jumper', 'Ladipo', NULL, 'jumberladipo@gmail.com', '', '08107563212', '08180799754', 0, 'user', 1, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-15 14:42:46', NULL, 0),
(85, 'Tamara', 'Arogundade', NULL, 'tamara@qbsolutionslimited.com', '', '08032012512', NULL, 0, 'user', 1, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-15 14:42:46', NULL, 0),
(86, 'Balogun', 'ibrahim', NULL, 'Balogunibrahim93@gmail.com', '', '08182149944', '08163443493', 0, 'user', 1, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-15 14:42:46', NULL, 0),
(87, 'Atinuke', 'Iroko', NULL, 'atinukeiroko@gmail.com', '', '08086801464', NULL, 0, 'user', 1, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-15 14:42:46', NULL, 0),
(88, 'Omotola', 'Olukemi', NULL, 'omotolakemi@yahoo.com', '', '+2347034170161', NULL, 0, 'user', 1, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-15 14:42:46', NULL, 0),
(89, 'Tosin', 'Royal', NULL, 'gufrich@gmail.com', '', '07066295496', NULL, 0, 'user', 1, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-15 14:42:46', NULL, 0),
(90, 'Tosin', 'Royal', NULL, 'gulfrich@gmail.com', '', '07066295496', NULL, 0, 'user', 1, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-15 14:42:46', NULL, 0),
(91, 'Olawumi', 'Daniel', NULL, 'd.olawumi@yahoo.com', '', '08032290014', '08130040014', 0, 'user', 1, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-15 14:42:46', NULL, 0),
(92, 'jean', 'amougou', NULL, 'mballalucy87@yahoo.com', '', '08141226692', '08088032213', 0, 'user', 1, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-15 14:42:46', NULL, 0),
(93, 'Eme', 'Godwin', NULL, 'emelwoklaw@yahoo.com', '', '08033528928', '01234785', 0, 'user', 1, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-15 14:42:46', NULL, 0),
(94, 'Arogz', 'Remi', NULL, 'lebuyah@gmail.com', '', '08022228577', NULL, 0, 'user', 1, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-15 14:42:46', NULL, 0),
(95, 'omotolani', 'alamu', NULL, 'ebony_tee1@yahoo.com', '', '08056355261', NULL, 0, 'user', 1, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-15 14:42:46', NULL, 0),
(96, 'olalekan', 'benjamin-oguntade', NULL, 'ceolababy@yahoo.com', '', '+447447032034', NULL, 0, 'user', 1, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-15 14:42:46', NULL, 0),
(97, 'bobby', 'Atos', NULL, 'bazuz@bellsouth.net', '', '08073154434', NULL, 0, 'user', 1, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-15 14:42:46', NULL, 0),
(98, 'Abiola', 'Bolu', NULL, 'Abiolao@ebsafr.com', '', '08026754151', NULL, 0, 'user', 1, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-15 14:42:46', NULL, 0),
(99, 'Abies', 'Imonioro', NULL, 'Aevbuomwan@gmail.com', '', '08180108808', '08036666382', 0, 'user', 1, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-15 14:42:46', NULL, 0),
(100, 'Shola', 'Oyeniyi', NULL, 'Tescomagana6@gmail.com', '', '07034646873', '07053002779', 0, 'user', 1, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-15 14:42:46', NULL, 0),
(101, 'Robert', 'Nwaoliwe', NULL, 'mrgoodfood@yahoo.com', '', '08128773337', '08038614735', 0, 'user', 1, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-15 14:42:46', NULL, 0),
(102, 'Adedoyin', 'Ajayi', NULL, 'lamarmiteng@gmail.com', '', '08181189301', '08033344287', 0, 'user', 1, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-15 14:42:46', NULL, 0),
(103, 'Glory', 'Henshaw', NULL, 'gloryhenshaw4real@gmail.com', '', '08134544508', NULL, 0, 'user', 1, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-15 14:42:46', NULL, 0),
(104, 'bukola', 'aleshe', NULL, 'aleshebukola@gmail.com', '', '07063830997', NULL, 0, 'user', 1, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-15 14:42:46', NULL, 0),
(105, 'giwa', 'abdullahi', NULL, 'abdolla_luv18@yahoo.com', '', '08026948679', NULL, 0, 'user', 1, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-15 14:42:46', NULL, 0),
(106, 'Charity', 'Arinze', NULL, 'Charitya@ebsafr.com', '', '2348131182500', '2348131182500', 0, 'user', 1, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-15 14:42:46', NULL, 0),
(107, 'Ayodeji', 'Somoye', NULL, 'dejisomoye@gmail.com', '', '07088886836', NULL, 0, 'user', 1, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-15 14:42:46', NULL, 0),
(108, 'victor', 'udoh', NULL, 'vicfourmedicals@yahoo.com', '', '08097019486', NULL, 0, 'user', 1, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-15 14:42:46', NULL, 0),
(109, 'vincente', 'follitse', NULL, 'follitsav@gmail.com', '', '07038157647', NULL, 0, 'user', 1, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-15 14:42:46', NULL, 0),
(110, 'yemi', 'lap', NULL, 'yemlap@yahoo.com', '', '08023299946', NULL, 0, 'user', 1, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-15 14:42:46', NULL, 0),
(111, 'Kayode', 'Kay', NULL, 'kaymachine@yahoo.com', '', '08032293604', NULL, 0, 'user', 1, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-15 14:42:46', NULL, 0),
(112, 'Ifeoma', 'Oragwu', NULL, 'ifeomaoragwu@gmail.com', '', '07013942083', NULL, 0, 'user', 1, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-15 14:42:46', NULL, 0),
(113, 'tola', 'gbuyiro', NULL, 'tolagbuyiro@yahoo.com', '', '08087060008', NULL, 0, 'user', 1, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-15 14:42:46', NULL, 0),
(114, 'eyo', 'odion', NULL, 'eeyodiong@yahoo.com', '', '08023298988', NULL, 0, 'user', 1, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-15 14:42:46', NULL, 0),
(115, 'adeyemi', 'arosoye', NULL, 'adeyemiarosoye@gmail.com', '', '08094121071', NULL, 0, 'user', 1, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-15 14:42:46', NULL, 0),
(116, 'Chinedu', 'Onwedi', NULL, 'chinedu-cxonwed@yahoo.co.uk', '', '08083356842', NULL, 0, 'user', 1, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-15 14:42:46', NULL, 0),
(117, 'Banji', 'Ajisomo', NULL, 'danji_ajisomo@yahoo.com', '', '08034135441', NULL, 0, 'user', 1, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-15 14:42:46', NULL, 0),
(118, 'Banji', 'Ajisomo', NULL, 'banji_ajisomo@yahoo.com', '', '08034135441', NULL, 0, 'user', 1, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-15 14:42:46', NULL, 0),
(119, 'anitha', 'heamie', NULL, 'spicyheamie@yahoo.com', '', '07035226287', NULL, 0, 'user', 1, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-15 14:42:46', NULL, 0),
(120, 'emmanuel', 'lajidefun', NULL, 'emmanuellajidefun@gmail.com', '', '08022122972', NULL, 0, 'user', 1, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-15 14:42:46', NULL, 0),
(121, 'harrison', 'olile', NULL, 'olileharrison08@gmail.cm', '', '08038592655', NULL, 0, 'user', 1, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-15 14:42:46', NULL, 0),
(122, 'victor', 'udoh', NULL, 'vic4medical@yahoo.com', '', '08097019486', NULL, 0, 'user', 1, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-15 14:42:46', NULL, 0),
(123, 'victor', 'udoh', NULL, 'vic4medicals@yahoo.com', '', '08097019486', NULL, 0, 'user', 1, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-15 14:42:46', NULL, 0),
(124, 'jimmy', 'sanwo', NULL, 'jsanwo64@gmail.com', '', '08023542623', '08023542623', 0, 'user', 1, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-15 14:42:46', NULL, 0),
(125, 'Friday', 'Otanwa', NULL, 'friday.otanwa@gmail.com', '', '08036391204', NULL, 0, 'user', 1, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-15 14:42:46', NULL, 0),
(126, 'buki', 'olatundun', NULL, 'olatundunbuki@gmail.com', '', '08028474983', NULL, 0, 'user', 1, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-15 14:42:46', NULL, 0),
(127, 'gibson', 'panice', NULL, 'gibspanice99@yahoo.com', '', '08023139049', NULL, 0, 'user', 1, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-15 14:42:46', NULL, 0),
(128, 'olatundun', 'bukky', NULL, 'olatundunbuki@gamail.com', '', '08067719349', '08028474983', 0, 'user', 1, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-15 14:42:46', NULL, 0),
(129, 'kike', 'rubu', NULL, 'kikearubu@gmail.com', '', '08180285940', NULL, 0, 'user', 1, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-15 14:42:46', NULL, 0),
(130, 'oluchi', 'maria', NULL, 'enquiries.mariashouse@gmail.com', '', '08146862678', NULL, 0, 'user', 1, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-15 14:42:46', NULL, 0),
(131, 'peace', 'nduchukwwu', NULL, 'pnduchukwu@yahoo.com', '', '08032428742', NULL, 0, 'user', 1, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-15 14:42:46', NULL, 0),
(132, 'Abubakar', 'Ibrahim', NULL, 'Ibrahimabubakar209@gmail.com', '', '08061631556', '08061631556', 0, 'user', 1, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-15 14:42:46', NULL, 0),
(133, 'Ajimat', 'Sekoni', NULL, 'ajimatsekoni@yahoo.com', '', '08031848010', NULL, 0, 'user', 1, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-15 14:42:46', NULL, 0),
(134, 'bolaji', 'badejo', NULL, 'scarletigbo@yahoo.com', '', '08135998822', NULL, 0, 'user', 1, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-15 14:42:46', NULL, 0),
(135, 'bolaji', 'badejo', NULL, 'scarletigbo@gmail.com', '', '08135998822', NULL, 0, 'user', 1, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-15 14:42:46', NULL, 0),
(136, 'gbadamosi', 'funmillola', NULL, 'pemisiremylove@gmail.com', '', '08036339979', NULL, 0, 'user', 1, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-15 14:42:46', NULL, 0),
(137, 'shamusideen', 'Olaotan', NULL, 'shamusideen.molaotan@gmail.com', '', '08136725813', NULL, 0, 'user', 1, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-15 14:42:46', NULL, 0),
(138, 'shamusideen', 'olaotan', NULL, 'shamsudeenolaotan@gmail.com', '', '08136725813', NULL, 0, 'user', 1, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-15 14:42:46', NULL, 0),
(139, 'Temitope', 'Akinremi', NULL, 'akinremi.t@gmail.com', '', '08085321987', NULL, 0, 'user', 1, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-15 14:42:46', NULL, 0),
(140, 'chigozie', 'okezie kingsley', NULL, 'icekings6000@gmail.com', '', '08169541058', NULL, 0, 'user', 1, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-15 14:42:46', NULL, 0),
(141, 'uche', 'onuorah', NULL, 'onuorahuche@yahoo.co.uk', '', '08182118548', '08023465996', 0, 'user', 1, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-15 14:42:46', NULL, 0),
(142, 'Maryam', 'Aderemi', NULL, 'maryamaderemi@gmail.com', '', '08133511477', '08020512409', 0, 'user', 1, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-15 14:42:46', NULL, 0),
(143, 'richard', 'ogalu', NULL, 'rico4liverpool@yahoo.com', '', '08094824922', '08094824922', 0, 'user', 1, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-15 14:42:46', NULL, 0),
(144, 'Oluwatosin', 'Ogunsanwo', NULL, 'tosinsnazzyogunsanwo@yahoo.com', '', '08100444771', NULL, 0, 'user', 1, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-15 14:42:46', NULL, 0),
(145, 'damilola', 'adeleke', NULL, 'toyosi.adeleke@yahoo.com', '', '08033684761', '08055108362', 0, 'user', 1, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-15 14:42:46', NULL, 0),
(146, 'adebanjo', 'bukoa', NULL, 'bukkieluv72@yahoo.com', '', '08034444998', '090926746028', 0, 'user', 1, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-15 14:42:46', NULL, 0),
(147, 'Esther', 'Lukoh', NULL, 'estherlukoh@gmail.com', '', '08064766939', '08064766939', 0, 'user', 1, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-15 14:42:46', NULL, 0),
(148, 'iris', 'afangbedji', NULL, 'afangbedjiris@gmail.com', '', '08174120505', '08023034408', 0, 'user', 1, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-15 14:42:46', NULL, 0),
(149, 'Adejoke', 'Adeyan', NULL, 'Adeyan.adejoke@yahoo.com', '', '08136977537', '09025101761', 0, 'user', 1, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-15 14:42:46', NULL, 0),
(150, 'Adikat', 'Morolake', NULL, 'adikat.alaka@yahoo.com', '', '07066396560', NULL, 0, 'user', 1, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-15 14:42:46', NULL, 0),
(151, 'Maryjane', 'Oluwatoyin', NULL, 'Maryjaneabalokwu@yahoo.com', '', '08090751012', '07061106166', 0, 'user', 1, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-15 14:42:46', NULL, 0),
(152, 'debo', 'banjo', NULL, 'debbour2010@yahoo.com', '', '08032308448', '08032308448', 0, 'user', 1, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-15 14:42:46', NULL, 0),
(153, 'Tewogbola', 'Adebanjo', NULL, 'armellemoi@gmail.com', '', '08177587928', '08054161133', 0, 'user', 1, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-15 14:42:46', NULL, 0),
(154, 'toyin', 'ruth', NULL, 'toyinoyegunwa@yahoo.com', '', '08028359025', '08028359025', 0, 'user', 1, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-15 14:42:46', NULL, 0),
(155, 'Chisom', 'Ogbummuo', NULL, 'Chisomjoan@gmail.com', '', '07067325709', NULL, 0, 'user', 1, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-15 14:42:46', NULL, 0),
(156, 'Oreoluwa', 'Oduko', NULL, 'ore_oduko@yahoo.com', '', '08035250734', NULL, 0, 'user', 1, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-15 14:42:46', NULL, 0),
(157, 'kolawole', 'oyefeso', NULL, 'kolawoleoyefeso@gmail.com', '', '08033206295', '08022239122', 0, 'user', 1, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-15 14:42:46', NULL, 0),
(158, 'Temidayo', 'Abimbola', NULL, 'bims_t@yahoo.com', '', '08033262057', NULL, 0, 'user', 1, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-15 14:42:46', NULL, 0),
(159, 'vwede', 'edah', NULL, 'vwedeedah@yahoo.co.uk', '', '07065070436', '07011778372', 0, 'user', 1, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-15 14:42:46', NULL, 0),
(160, 'Sade', 'Ipaye', NULL, 'aleroipaye@gmail.com', '', '08087100655', NULL, 0, 'user', 1, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-15 14:42:46', NULL, 0),
(161, 'alakpodia', 'enifome', NULL, 'Enifome.a@gmail.com', '', '07082170941', '08161838464', 0, 'user', 1, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-15 14:42:46', NULL, 0),
(162, 'Adebanke', 'Adeniji-Fashola', NULL, 'dekunbifashola@gmail.com', '', '08069006332', '08083824376', 0, 'user', 1, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-15 14:42:46', NULL, 0),
(163, 'Ngozi', 'Opara', NULL, 'Engee_opra@yahoo.com', '', '08126812325', '07065030674', 0, 'user', 1, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-15 14:42:46', NULL, 0),
(164, 'faith', 'oke', NULL, 'faithoke20@yahoo.com', '', '08082962897', '08095202418', 0, 'user', 1, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-15 14:42:46', NULL, 0),
(165, 'Temi- tope', 'Aluko', NULL, 'Ti_aluko@yahoo.com', '', '08167391375', '08051686001', 0, 'user', 1, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-15 14:42:46', NULL, 0),
(166, 'Kara', 'Mosopefoluwa', NULL, 'Karamoshefoluwa@gmail.com', '', '07089313815', NULL, 0, 'user', 1, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-15 14:42:46', NULL, 0),
(167, 'alade-adesina', 'olutola', NULL, 'olutolaaa@yahoo.com', '', '08077580637', '08077580637', 0, 'user', 1, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-15 14:42:46', NULL, 0),
(168, 'Karen', 'Finite me', NULL, 'Karenginigeme@gmail.com', '', '08062398605', NULL, 0, 'user', 1, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-15 14:42:46', NULL, 0),
(169, 'Islamist', 'Ekenimoh', NULL, 'Tyilamosiekenimoh@gmail.com', '', '08179580731', NULL, 0, 'user', 1, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-15 14:42:46', NULL, 0),
(170, 'kenedy', 'tracy', NULL, 'kenedytracy@yahoo.com', '', '08096330332', '08096330332', 0, 'user', 1, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-15 14:42:46', NULL, 0),
(171, 'Abisoye', 'Odewole', NULL, 'Odewolebisoye@gmail.com', '', '08051998856', '09096500799', 0, 'user', 1, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-15 14:42:46', NULL, 0),
(172, 'Oyinlola', 'Ojugbele', NULL, 'oyinlolaojus@yahoo.com', '', '08097004586', '08154911113', 0, 'user', 1, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-15 14:42:46', NULL, 0),
(173, 'Juliana', 'Ejike', NULL, 'julianaejike@yahoo.com', '', '08147744534', NULL, 0, 'user', 1, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-15 14:42:46', NULL, 0),
(174, 'lawal', 'bukola', NULL, 'bukkylawal35@yahoo.com', '', '07037816645', '07037816645', 0, 'user', 1, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-15 14:42:46', NULL, 0),
(175, 'Ada', 'Iwe', NULL, 'katrinna_iwe@yahoo.com', '', '08166874607', '08166874607', 0, 'user', 1, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-15 14:42:46', NULL, 0),
(176, 'Olamide', 'Adeteye', NULL, 'Olamideadeteye@gmail.com', '', '08163963759', '07081534418', 0, 'user', 1, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-15 14:42:46', NULL, 0),
(177, 'sterphanie', 'maku', NULL, 'kiki_steph@yahoo.com', '', '08139159618', '08139159618', 0, 'user', 1, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-15 14:42:46', NULL, 0),
(178, 'Temitayo', 'Elebiyo', NULL, 'T.elebz@yahoo.com', '', '08134501888', NULL, 0, 'user', 1, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-15 14:42:46', NULL, 0),
(179, 'bimbo', 'fanimokun', NULL, 'abimbolafanimokun@yahoo.com', '', '+2348168956743', '+2348168956743', 0, 'user', 1, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-15 14:42:46', NULL, 0),
(180, 'Nonye', 'Okwuonu', NULL, 'nonye_okwuonu2005@yahoo.com', '', '08139004743', '08086281785', 0, 'user', 1, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-15 14:42:46', NULL, 0),
(181, 'Adelakun', 'Olalekan', NULL, 'lekanlinc@gmail.com', '', '08021024590', NULL, 0, 'user', 1, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-15 14:42:46', NULL, 0),
(182, 'Omotoyosi', 'Adetunji', NULL, 'omotoyosiadetunji@gmail.com', '', '07011588672', NULL, 0, 'user', 1, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-15 14:42:46', NULL, 0),
(183, 'Fatim', 'Doumbouya', NULL, 'Fatimdoumbouya@yahoo.com', '', '08134988379', NULL, 0, 'user', 1, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-15 14:42:46', NULL, 0),
(184, 'belema', 'wakama', NULL, 'belemawakama@gmail.com', '', '08135743984', NULL, 0, 'user', 1, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-15 14:42:46', NULL, 0),
(185, 'Aderonke', 'Lasisi', NULL, 'Aderonkelasisi@yahoo.com', '', '08187241756', NULL, 0, 'user', 1, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-15 14:42:46', NULL, 0),
(186, 'chiazor', 'uduh', NULL, 'chiazorpeace@yahoo.com', '', '07039409241', '08128972932', 0, 'user', 1, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-15 14:42:46', NULL, 0),
(187, 'igbudu', 'felix', NULL, 'flexyjeff2000@yahoo.com', '', '08025911133', NULL, 0, 'user', 1, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-15 14:42:46', NULL, 0),
(188, 'Johnson', 'Ehis', NULL, 'naijalord4life@gmail.com', '', '07038917312', NULL, 0, 'user', 1, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-15 14:42:46', NULL, 0),
(189, 'oyeyemi', 'olagbaiye', NULL, 'olagbaiyeo@yahoo.com', '', '08180045223', NULL, 0, 'user', 1, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-15 14:42:46', NULL, 0),
(190, 'iris', 'afangbedji', NULL, 'afangbedjiiris@gmail.com', '', '08074120505', '08023034408', 0, 'user', 1, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-15 14:42:46', NULL, 0),
(191, 'Gabriel', 'Oni', NULL, 'justgbemiro@gmail.com', '', '08102511164', '08102511164', 0, 'user', 1, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-15 14:42:46', NULL, 0),
(192, 'lungfa', 'ndam', NULL, 'lungfandam@gmail.com', '', '07032115378', '08038932260', 0, 'user', 1, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-15 14:42:46', NULL, 0),
(193, 'Basit', 'Arogundade', NULL, 'basita@ebsafr.com', '', '08032002512', '08182102198', 0, 'user', 1, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-15 14:42:46', NULL, 0),
(194, 'Remilekun', 'Ayeni', NULL, 'ayeniremi2001@yahoo.com', '', '08027297055', NULL, 0, 'user', 1, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-15 14:42:46', NULL, 0),
(195, 'Edu', 'Andrew', NULL, 'eduandrewsat@yahoo.com', '', '07033868155', '08185991363', 0, 'user', 1, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-15 14:42:46', NULL, 0),
(196, 'tewogbola', 'adebanjo', NULL, 'armellemoi93@gmail.com', '', '08177587928', '08054161133', 0, 'user', 1, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-15 14:42:46', NULL, 0),
(197, 'ife', 'ajadi', NULL, 'ify_4r_real@yahoo.com', '', '07032629551', NULL, 0, 'user', 1, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-15 14:42:46', NULL, 0),
(198, 'Uwa', 'Oga', NULL, 'shus4real@yahoo.com', '', '08087237631', '07034342184', 0, 'user', 1, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-15 14:42:46', NULL, 0),
(199, 'Subuola', 'Elufioye', NULL, 'temitopeelufioye@yahoo.com', '', '07057721851', NULL, 0, 'user', 1, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-15 14:42:46', NULL, 0),
(200, 'Angel', 'Ekuma', NULL, 'Rahfeneekuma@yahoo.com', '', '08064257296', NULL, 0, 'user', 1, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-15 14:42:46', NULL, 0),
(201, 'Isioma', 'Onuora', NULL, 'Onuorachukwufumnanya@gmail.com', '', '08160476023', '08160476023', 0, 'user', 1, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-15 14:42:46', NULL, 0),
(202, 'Angel', 'Udoh', NULL, 'Cassiudoh11@yahoo.com', '', '08089623280', NULL, 0, 'user', 1, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-15 14:42:46', NULL, 0),
(203, 'Mary', 'Ayotunde', NULL, 'Maryjoanne.ayotunde@yahoo.com', '', '07014255848', NULL, 0, 'user', 1, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-15 14:42:46', NULL, 0),
(204, 'Amarachi', 'Nwaobiala', NULL, 'Kingamy20@gmail.com', '', '08122220096', NULL, 0, 'user', 1, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-15 14:42:46', NULL, 0),
(205, 'Rabi', 'Hassan', NULL, 'Mannequin_mimmy16@yahoo.com', '', '08022341878', NULL, 0, 'user', 1, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-15 14:42:46', NULL, 0),
(206, 'Ruth', 'Titilopemi', NULL, 'abolarin_ruth@yahoo.com', '', '09096854785', '07051241830', 0, 'user', 1, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-15 14:42:46', NULL, 0),
(207, 'Sherifat', 'Omogiafo', NULL, 'Sa_omogiafo@yahoo.com', '', '08027853406', '08027853406', 0, 'user', 1, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-15 14:42:46', NULL, 0),
(208, 'Deborah', 'Abolarin', NULL, 'abolarin.d@gmail.com', '', '08092939879', '08139051772', 0, 'user', 1, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-15 14:42:46', NULL, 0),
(209, 'Funto', 'Musa', NULL, 'funtomusa@yahoo.com', '', '08160856740', NULL, 0, 'user', 1, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-15 14:42:46', NULL, 0),
(210, 'Idera', 'Ajisafe', NULL, 'Idera_ajisafe@yahoo.com', '', '08034156189', NULL, 0, 'user', 1, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-15 14:42:46', NULL, 0),
(211, 'Bolu', 'Kara', NULL, 'Bkaykara@gmail.cok', '', '08059393729', NULL, 0, 'user', 1, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-15 14:42:46', NULL, 0),
(212, 'Stephanie', 'Modilim', NULL, 'Modilimstephanie@gmail.com', '', '08175075076', '08175075076', 0, 'user', 1, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-15 14:42:46', NULL, 0),
(213, 'Itoro', 'Robert', NULL, 'Itoro90@gmail.com', '', '07067420247', NULL, 0, 'user', 1, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-15 14:42:46', NULL, 0),
(214, 'Titilope', 'Akinsola', NULL, 'Titilopeakinsola@yahoo.com', '', '07061581022', '07061581022', 0, 'user', 1, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-15 14:42:46', NULL, 0),
(215, 'Modupe', 'Edward-Mills', NULL, 'Millsmodupe@yahoo.com', '', '08102579130', '08080288090', 0, 'user', 1, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-15 14:42:46', NULL, 0),
(216, 'Elaami', 'Amaso', NULL, 'Amasoelaami@gmail.com', '', '08074671556', '07011342756', 0, 'user', 1, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-15 14:42:46', NULL, 0),
(217, 'Omonehmie', 'Okoeguale', NULL, 'aeezy101@yahoo.com', '', '08030471558', '07014085865', 0, 'user', 1, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-15 14:42:46', NULL, 0),
(218, 'Ogeolouwa', 'Afolabi', NULL, 'Ogeoluwafrancess@yahoo.com', '', '07088199138', NULL, 0, 'user', 1, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-15 14:42:46', NULL, 0),
(219, 'Chinyere', 'Edom', NULL, 'Chichiedom@yahoo.com', '', '07064466655', NULL, 0, 'user', 1, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-15 14:42:46', NULL, 0),
(220, 'Esther', 'Lawanson', NULL, 'Fleshistar@gmail.com', '', '08188699271', '0815073490', 0, 'user', 1, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-15 14:42:46', NULL, 0),
(221, 'Adetola', 'Jones', NULL, 'adetolajones@gmail.com', '', '08104872479', '09098971335', 0, 'user', 1, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-15 14:42:46', NULL, 0),
(222, 'Ngozi', 'Ononogbu', NULL, 'Pearlycrystal@ymail.com', '', '08163637333', '08179888753', 0, 'user', 1, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-15 14:42:46', NULL, 0),
(223, 'Halima', 'Mason', NULL, 'Leema.mason@gmail.com', '', '08030878818', NULL, 0, 'user', 1, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-15 14:42:46', NULL, 0),
(224, 'Johnson', 'Josephine', NULL, 'Josephinej67@yahoo.com', '', '08189149116', '08189149116', 0, 'user', 1, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-15 14:42:46', NULL, 0),
(225, 'Chiamaka', 'Amajuoyi', NULL, 'Chiamaka.amajuoyi@gmail.com', '', '08160250805', NULL, 0, 'user', 1, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-15 14:42:46', NULL, 0),
(226, 'Mobolaji', 'Olotu', NULL, 'tinukeo@hotmail.com', '', '07036308393', NULL, 0, 'user', 1, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-15 14:42:46', NULL, 0),
(227, 'Yetunde', 'Adelumola', NULL, 'Baddieyates@yahoo.com', '', '08088117957', NULL, 0, 'user', 1, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-15 14:42:46', NULL, 0),
(228, 'damilola', 'atiri', NULL, 'damilola.atiri@gmail.com', '', '08060815449', NULL, 0, 'user', 1, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-15 14:42:46', NULL, 0),
(229, 'ikyuma', 'aondo-akaa', NULL, 'iyahma@yahoo.com', '', '08033045313', NULL, 0, 'user', 1, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-15 14:42:46', NULL, 0),
(230, 'isaac', 'nnamdi', NULL, 'isaac_ekeoma@yahoo.com', '', '07031806515', '08059759229', 0, 'user', 1, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-15 14:42:46', NULL, 0),
(231, 'karimah', 'lawal', NULL, 'karimah.lawal@yahoo.com', '', '07082964648', '08183828772', 0, 'user', 1, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-15 14:42:46', NULL, 0),
(232, 'Adaeze', 'Madubuike', NULL, 'adaezemadubuike@yahoo.com', '', '2348036753879', '07040002887', 0, 'user', 1, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-15 14:42:46', NULL, 0),
(233, 'Osifeso', 'Anuoluwapo', NULL, 'Osifunjay@yahoo.com', '', '08068167555', '08068167555', 0, 'user', 1, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-15 14:42:46', NULL, 0),
(234, 'Nikki', 'Chinakwe', NULL, 'nikkichinakwe@gmail.com', '', '08032378940', '08186024540', 0, 'user', 1, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-15 14:42:46', NULL, 0),
(235, 'Ahmed', 'Oni', NULL, 'onyxhamed@yahoo.com', '', '08052986547', '08068287057', 0, 'user', 1, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-15 14:42:46', NULL, 0),
(236, 'ubong', 'brownson', NULL, 'ubong6666@gmail.com', '', '08138859939', '08138859939', 0, 'user', 1, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-15 14:42:46', NULL, 0),
(237, 'oladipupo', 'morenikeji', NULL, 'oladipupomorenikeji@gmail.com', '', '09028965478', '09028965478', 0, 'user', 1, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-15 14:42:46', NULL, 0),
(238, 'Omolade', 'Oderinde', NULL, 'flowerchild_y@hotmail.com', '', '0037152973', '08099876569', 0, 'user', 1, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-15 14:42:46', NULL, 0),
(239, 'Kazeem', 'Kareem', NULL, 'kmobol@yahoo.com', '', '08035804563', NULL, 0, 'user', 1, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-15 14:42:46', NULL, 0),
(240, 'korede', 'edih', NULL, 'cupidcore@yahoo.com', '', '08058323705', '08027171383', 0, 'user', 1, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-15 14:42:46', NULL, 0),
(241, 'Ifeanyichukwu', 'Nwachukwu', NULL, 'keenflashbzy@gmail.com', '', '08080504702', NULL, 0, 'user', 1, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-15 14:42:46', NULL, 0),
(242, 'adekemi', 'adewale', NULL, 'abyem78@yahoo.com', '', '07040001864', NULL, 0, 'user', 1, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-15 14:42:46', NULL, 0),
(243, 'Aisha', 'Adigun', NULL, 'oaadigun@gmail.com', '', '08103156116', '08120797998', 0, 'user', 1, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-15 14:42:46', NULL, 0),
(244, 'Ngozi', 'Blessing', NULL, 'Angelblessing572@yahoo.com', '', '09092139439', NULL, 0, 'user', 1, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-15 14:42:46', NULL, 0),
(245, 'Kayode', 'Peter', NULL, 'Kcie4mary@yahoo.com', '', '07042322924', NULL, 0, 'user', 1, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-15 14:42:46', NULL, 0),
(246, 'Kayzee', 'Peters', NULL, 'Kcie4peter@yahoo.com', '', '07042322924', NULL, 0, 'user', 1, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-15 14:42:46', NULL, 0),
(247, 'Ibukun', 'Ogbongbemiga', NULL, 'Ibk_ogbon@yahoo.com', '', '08071915175', NULL, 0, 'user', 1, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-15 14:42:46', NULL, 0),
(248, 'Sam', 'Sos', NULL, 'tito2010_4real@yahoo.com', '', '08054980601', '08054980601', 0, 'user', 1, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-15 14:42:46', NULL, 0),
(249, 'Kayito', 'Nwokedi', NULL, 'Kayitonwokedi@gmail.com', '', '08024246895', NULL, 0, 'user', 1, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-15 14:42:46', NULL, 0),
(250, 'shola', 'Akinloye', NULL, 'Akinloyeshola@hotmail.com', '', '07066234425', NULL, 0, 'user', 1, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-15 14:42:46', NULL, 0),
(251, 'Tobi', 'Ayoola', NULL, 'victoriaayoolah@gmail.com', '', '07062747571', NULL, 0, 'user', 1, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-15 14:42:46', NULL, 0),
(252, 'funbi', 'oluyisola', NULL, 'oluyisolafunbi@yahoo.com', '', '08069104385', NULL, 0, 'user', 1, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-15 14:42:46', NULL, 0),
(253, 'Ebus', 'E', NULL, 'fusionlogic@gmail.com', '', '08033332222', NULL, 0, 'user', 1, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-15 14:42:46', NULL, 0),
(254, 'Samuel', 'Ojo', NULL, 'ojoakinjidesamuel@gmail.com', '', '07033383932', NULL, 0, 'user', 1, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-15 14:42:46', NULL, 0),
(255, 'Stephen', 'Ogechi', NULL, 'adestephen20@gmail.com', '', '08032008890', '08032581535', 0, 'user', 1, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-15 14:42:46', NULL, 0),
(256, 'imonikhe', 'isaiah', NULL, 'imonikhe.isaiah@yayoo.com', '', '08139262765', '08139262765', 0, 'user', 1, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-15 14:42:46', NULL, 0),
(257, 'Ibukun', 'Akinpelu', NULL, 'Ibukun.akinpelu@yahoo.com', '', '08057012810', NULL, 0, 'user', 1, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-15 14:42:46', NULL, 0),
(258, 'Christabel', 'One amuse', NULL, 'Kristabelibeanusi@gmail.com', '', '08134547125', NULL, 0, 'user', 1, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-15 14:42:46', NULL, 0),
(259, 'Adeagbo', 'Festus', NULL, 'festusadeniy52i@yahoo.com', '', '08038404404', NULL, 0, 'user', 1, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-15 14:42:46', NULL, 0),
(260, 'Gerald', 'Ogwurumba', NULL, 'Geraldog25@yahoo.com', '', '07037725652', NULL, 0, 'user', 1, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-15 14:42:46', NULL, 0),
(261, 'Adeagbo', 'Festus', NULL, 'festusadeniy52@yahoo.com', '', '08038404404', NULL, 0, 'user', 1, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-15 14:42:46', NULL, 0),
(262, 'RichardS', 'Somade', NULL, 'richardsomade@yahoo.com', '', '08034975288', NULL, 0, 'user', 1, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-15 14:42:46', NULL, 0),
(263, 'Jerry', 'Ubah', NULL, 'jerryprudence@yahoo.com', '', '07033251924', NULL, 0, 'user', 1, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-15 14:42:46', NULL, 0),
(264, 'adewale', 'martins', NULL, 'walextradingcompany@gmail.com', '', '09098933144', '09098933144', 0, 'user', 1, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-15 14:42:46', NULL, 0),
(265, 'chinyere', 'nnadi', NULL, 'chichiimo28@gmail.com', '', '08030952243', NULL, 0, 'user', 1, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-15 14:42:46', NULL, 0),
(266, 'Omagbitse', 'Esisi', NULL, 'gbitse2000@yahoo.com', '', '08056241552', NULL, 0, 'user', 1, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-15 14:42:46', NULL, 0),
(267, 'En', 'Bee', NULL, 'Nelsonbenye@gmail.com', '', '08092239930', NULL, 0, 'user', 1, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-15 14:42:46', NULL, 0),
(268, 'Abdulazeez', 'Abebefe', NULL, 'abdulabebefe@gmail.com', '', '08030729344', '09098749274', 0, 'user', 1, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-15 14:42:46', NULL, 0),
(269, 'Sheriff', 'Akinbola', NULL, 'shareefakinbola1@yahoo.com', '', '008023394661', NULL, 0, 'user', 1, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-15 14:42:46', NULL, 0),
(270, 'Chiebuka', 'Obumselu', NULL, 'chy_obum@live.com', '', '08072913691', NULL, 0, 'user', 1, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-15 14:42:46', NULL, 0),
(271, 'emmanuel', 'nkansah', NULL, 'emma.nkansah15@gmail.com', '', '08038557050', NULL, 0, 'user', 1, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-15 14:42:46', NULL, 0),
(272, 'Wummy', 'Lawrence', NULL, 'ainawummy@gmail.com', '', '08037834617', '08037834617', 0, 'user', 1, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-15 14:42:46', NULL, 0),
(273, 'Rodrigue', 'Leroy', NULL, 'rodrigue.leroy@hellofood.com', '', '+2348889990000', NULL, 0, 'user', 1, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-15 14:42:46', NULL, 0),
(274, 'Daniella', 'Olieh', NULL, 'ogo_for_you@yahoo.com', '', '08035874497', '07046084443', 0, 'user', 1, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-15 14:42:46', NULL, 0),
(275, 'Omolara', 'Awosanya', NULL, 'Omolara.awosanya@yahoo.com', '', '08130816001', '08024590281', 0, 'user', 1, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-15 14:42:46', NULL, 0),
(276, 'Oyenike', 'Motunrayo', NULL, 'Tunrayola@gmail.com', '', '08034371626', NULL, 0, 'user', 1, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-15 14:42:46', NULL, 0),
(277, 'Nwabueze', 'Odimokwu', NULL, 'Odmk.int@live.com', '', '08167749308', NULL, 0, 'user', 1, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-15 14:42:46', NULL, 0),
(278, 'Monday', 'Igbu', NULL, 'monnyigbu@gmail.com', '', '08054144171', NULL, 0, 'user', 1, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-15 14:42:46', NULL, 0),
(279, 'Jenifer', 'Amaka', NULL, 'Love.jenifer18@yahoo.com', '', '08062311510', NULL, 0, 'user', 1, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-15 14:42:46', NULL, 0),
(280, 'Afolabi', 'Otubaga', NULL, 'Afolabi.otubaga@dangote.com', '', '08023170314', NULL, 0, 'user', 1, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-15 14:42:46', NULL, 0),
(281, 'Gbenga', 'Fakoya', NULL, 'ga.fakoya@gmail.com', '', '08075519297', '07033601411', 0, 'user', 1, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-15 14:42:46', NULL, 0),
(282, 'Peter', 'Utom', NULL, 'Peterutom75@gmail.com', '', '08101639352', '08173676083', 0, 'user', 1, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-15 14:42:46', NULL, 0),
(283, 'Yetunde', 'Saka', NULL, 'Limsy04@gmail.com', '', '07066000726', NULL, 0, 'user', 1, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-15 14:42:46', NULL, 0),
(284, 'ABIMBOLA', 'FOLASHADE', NULL, 'folawalemi2014@gmail.com', '', '08126008870', '08126008870', 0, 'user', 1, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-15 14:42:46', NULL, 0),
(285, 'Josephine', 'Israel', NULL, 'Phinnyisrael@gmail.com', '', '08035517504', NULL, 0, 'user', 1, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-15 14:42:46', NULL, 0),
(286, 'Benjamin', 'Bassey', NULL, 'benjamin.ooelaw@gmail.com', '', '08038629134', NULL, 0, 'user', 1, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-15 14:42:46', NULL, 0),
(287, 'victoria', 'olorunnisola', NULL, 'victoriaolorunnisola@gmail.com', '', '08105867700', NULL, 0, 'user', 1, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-15 14:42:46', NULL, 0),
(288, 'Sunday', 'Samson', NULL, 'Sunday.samson@yahoo.com', '', '07035675422', NULL, 0, 'user', 1, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-15 14:42:46', NULL, 0),
(289, 'ogechi', 'nwachukwu', NULL, 'oge.nwachukwu@yahoo.com', '', '08091464302', NULL, 0, 'user', 1, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-15 14:42:46', NULL, 0),
(290, 'donatus', 'akpan', NULL, 'dakpan@yahoo.com', '', '08029497585', '08039596535', 0, 'user', 1, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-15 14:42:46', NULL, 0),
(291, 'yetunde', 'akin', NULL, 'babyluvtijani@yahoo.com', '', '08103031506', NULL, 0, 'user', 1, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-15 14:42:46', NULL, 0),
(292, 'Williams', 'Obikwame', NULL, 'juwily@yahoo.com', '', '08060348787', '08075559147', 0, 'user', 1, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-15 14:42:46', NULL, 0),
(293, 'Tayo', 'Olanrewaju', NULL, 'tayosuper@yahoo.com', '', '08160075278', NULL, 0, 'user', 1, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-15 14:42:46', NULL, 0),
(294, 'Joy', 'Adeyemi', NULL, 'Joyabim@gmail.com', '', '08137756441', NULL, 0, 'user', 1, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-15 14:42:46', NULL, 0),
(295, 'Kemi', 'ONI', NULL, 'Kemisola.oni@yahoo.co.uk', '', '08085973653', NULL, 0, 'user', 1, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-15 14:42:46', NULL, 0);
INSERT INTO `accounts` (`id`, `firstname`, `lastname`, `gender`, `email`, `password`, `phone`, `phone2`, `point`, `usertype`, `status`, `image`, `token`, `admin_read_status`, `createdat`, `updatedat`, `deletedat`, `isdeleted`) VALUES
(296, 'Opeyemi', 'Oke', NULL, 'Okeopeyemi@ymail.com', '', '08035029537', NULL, 0, 'user', 1, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-15 14:42:46', NULL, 0),
(297, 'chris', 'akagha', NULL, 'akagha.chris@yahoo.com', '', '08077556422', NULL, 0, 'user', 1, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-15 14:42:46', NULL, 0),
(298, 'Praise', 'Ajewole', NULL, 'praiseebun@gmail.com', '', '08054248874', NULL, 0, 'user', 1, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-15 14:42:46', NULL, 0),
(299, 'yewande', 'ade', NULL, 'ade_wande@yahoo.com', '', '08093264567', NULL, 0, 'user', 1, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-15 14:42:46', NULL, 0),
(300, 'opeyemi', 'adeoye', NULL, 'adeoyeope@gmail.com', '', '080265656402', NULL, 0, 'user', 1, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-15 14:42:46', NULL, 0),
(301, 'afe', 'afekhume', NULL, 'afebinafe@yahoo.com', '', '07013555371', NULL, 0, 'user', 1, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-15 14:42:46', NULL, 0),
(302, 'ibrahim', 'olaide', NULL, 'ibrahimolaide91@yahoo.com', '', 'â—â—â—â—â—â—â—', NULL, 0, 'user', 1, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-15 14:42:46', NULL, 0),
(303, 'olutola', 'oni', NULL, 'oniolutola@yahoo.com', '', '08032729765', NULL, 0, 'user', 1, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-15 14:42:46', NULL, 0),
(304, 'tunde', 'smith', NULL, 'modishmetier@gmail.com', '', '08023325717', NULL, 0, 'user', 1, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-15 14:42:46', NULL, 0),
(305, 'babatunde', 'awe', NULL, 'awe.babatunde03@gmail.com', '', '08068654805', NULL, 0, 'user', 1, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-15 14:42:46', NULL, 0),
(306, 'lawal', 'ayomide', NULL, 'lawalayomideadeyemi@gmail.com', '', '08164221726', '09021818101', 0, 'user', 1, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-15 14:42:46', NULL, 0),
(307, 'faramade', 'ayeni', NULL, 'bigbabygal101@yahoo.com', '', '08062252083', NULL, 0, 'user', 1, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-15 14:42:46', NULL, 0),
(308, 'busola', 'alabi', NULL, 'boafuwa@yahoo.comn', '', '080787855794', NULL, 0, 'user', 1, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-15 14:42:46', NULL, 0),
(309, 'Olatunbi', 'Module', NULL, 'Kolaayuba@yahoo.com', '', '07056846517', NULL, 0, 'user', 1, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-15 14:42:46', NULL, 0),
(310, 'Chaverkper', 'Tobias', NULL, 'Chavertor@yahoo.com', '', '09094805538', NULL, 0, 'user', 1, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-15 14:42:46', NULL, 0),
(311, 'Simon', 'Stephen', NULL, 'Stephendonsimon@yahoo.com', '', '08061657412', NULL, 0, 'user', 1, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-15 14:42:46', NULL, 0),
(312, 'Maver', 'Simon', NULL, 'Maversimon@yahoo.com', '', '08111165434', NULL, 0, 'user', 1, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-15 14:42:46', NULL, 0),
(313, 'Kazeem', 'Olalekan', NULL, 'Kazeemmolalekan@gmail.com', '', '08088386424', NULL, 0, 'user', 1, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-15 14:42:46', NULL, 0),
(314, 'Tutu', 'Emeji', NULL, 'tutuoru@yahoo.co.uk', '', '08067946569', NULL, 0, 'user', 1, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-15 14:42:46', NULL, 0),
(315, 'Enitan', 'Soyemi', NULL, 'ennyninny@gmail.com', '', '07033240038', NULL, 0, 'user', 1, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-15 14:42:46', NULL, 0),
(316, 'Alabi', 'Akeem', NULL, 'Akeem.alabi@aklablimited.com', '', '08057244444', NULL, 0, 'user', 1, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-15 14:42:46', NULL, 0),
(317, 'Comfort', 'Funniest', NULL, 'Imole@email.com', '', '08104145593', NULL, 0, 'user', 1, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-15 14:42:46', NULL, 0),
(318, 'Zainab', 'Funmilayo', NULL, 'Zainab@yahoo.com', '', '08083032581', NULL, 0, 'user', 1, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-15 14:42:46', NULL, 0),
(319, 'Abiola', 'Mary', NULL, 'Binary_14@yahoo.com', '', '08122686057', '07033887474', 0, 'user', 1, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-15 14:42:46', NULL, 0),
(320, 'Joshua', 'Olaniyan', NULL, 'hollajosh001@yahoo.com', '', '08023030447', NULL, 0, 'user', 1, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-15 14:42:46', NULL, 0),
(321, 'Ogunfeyimi', 'Afolabi', NULL, 'Afochelsea@yahoo.com', '', '08141155360', NULL, 0, 'user', 1, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-15 14:42:46', NULL, 0),
(322, 'Oloruntoba', 'Christopher', NULL, 'Christopheroloruntoba@gmail.com', '', '07038712582', NULL, 0, 'user', 1, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-15 14:42:46', NULL, 0),
(323, 'Ayodeji', 'Fatoki', NULL, 'Charles.fatoki@gmail.com', '', '08033747974', NULL, 0, 'user', 1, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-15 14:42:46', NULL, 0),
(324, 'Itunu', 'Dosekun', NULL, 'bumsy02@yahoo.com', '', '08024663314', NULL, 0, 'user', 1, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-15 14:42:46', NULL, 0),
(325, 'Elaye', 'Jasper', NULL, 'ellahumez@yahoo.cm', '', '08130850501', '07066547009', 0, 'user', 1, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-15 14:42:46', NULL, 0),
(326, 'Charles', 'Alex', NULL, 'Alexcharles@yahoo.com', '', '08143235702', NULL, 0, 'user', 1, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-15 14:42:46', NULL, 0),
(327, 'Adekunle', 'Adeyemi', NULL, 'Bankufx1@gmail.com', '', '080333486665', NULL, 0, 'user', 1, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-15 14:42:46', NULL, 0),
(328, 'Adeniyi', 'Seriki', NULL, 'seriki4med@hotmail.com', '', '08027887773', NULL, 0, 'user', 1, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-15 14:42:46', NULL, 0),
(329, 'Adeniyi', 'Seriki', NULL, 'seriki4med@icloud.com', '', '08027887773', NULL, 0, 'user', 1, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-15 14:42:46', NULL, 0),
(330, 'Omotayo', 'Seriki', NULL, 'barakatalabi@yahoo.com', '', '08034663126', NULL, 0, 'user', 1, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-15 14:42:46', NULL, 0),
(331, 'Ikenna', 'Agbasimalo', NULL, 'ikmich@yahoo.com', '', '08033971712', NULL, 0, 'user', 1, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-15 14:42:46', NULL, 0),
(332, 'Omokaro', 'Khare', NULL, 'Omokarokhare@gmail.com', '', '08062578665', NULL, 0, 'user', 1, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-15 14:42:46', NULL, 0),
(333, 'Felix', 'Mesio', NULL, 'Felixmesio@gmail.com', '', '08039683946', NULL, 0, 'user', 1, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-15 14:42:46', NULL, 0),
(334, 'Tony', 'Asije', NULL, 'Asije.anthony@gmail.com', '', '07065386050', NULL, 0, 'user', 1, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-15 14:42:46', NULL, 0),
(335, 'Tomiwa', 'Obadofin', NULL, 'Tomiwa.tosi@yahoo.com', '', '08112142441', '08162751235', 0, 'user', 1, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-15 14:42:46', NULL, 0),
(336, 'Ishmael', 'Ebhodaghe', NULL, 'ishmaeldaghe@hotmail.com', '', '08189488888', NULL, 0, 'user', 1, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-15 14:42:46', NULL, 0),
(337, 'David', 'Ogunsola', NULL, 'Dafidis@yahoo.com', '', '08022228857', NULL, 0, 'user', 1, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-15 14:42:46', NULL, 0),
(338, 'olakunle', 'salu', NULL, 'Saluchi@gmail.com', '', '08034021543', NULL, 0, 'user', 1, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-15 14:42:46', NULL, 0),
(339, 'Olamide', 'Laja', NULL, 'Lasupoo@gmail.com', '', '08106145760', NULL, 0, 'user', 1, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-15 14:42:46', NULL, 0),
(340, 'Juliet', 'Chisom', NULL, 'Juchipoke@gmail.com', '', '08038652995', NULL, 0, 'user', 1, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-15 14:42:46', NULL, 0),
(341, 'Fadekemi', 'Kristina', NULL, 'Onakoyafadekemi@yahoo.com', '', '08122454587', NULL, 0, 'user', 1, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-15 14:42:46', NULL, 0),
(342, 'Oladotun', 'Alade', NULL, 'Dortmahn@gmail.com', '', '08137872728', NULL, 0, 'user', 1, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-15 14:42:46', NULL, 0),
(343, 'Vivian', 'Osekwe', NULL, 'Divido3@yahoo.com', '', '08022316510', '08098329699', 0, 'user', 1, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-15 14:42:46', NULL, 0),
(344, 'Hamza', 'Adisa', NULL, 'Hadisa@trinity.edu', '', '07053087321', NULL, 0, 'user', 1, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-15 14:42:46', NULL, 0),
(345, 'Bibiresanmi', 'otitoloju', NULL, 'bibi_otito@yahoo.com', '', '08026787612', '08066443135', 0, 'user', 1, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-15 14:42:46', NULL, 0),
(346, 'Tomisin', 'Uwa', NULL, 'Silverbabra@yahoo.com', '', '08183347536', NULL, 0, 'user', 1, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-15 14:42:46', NULL, 0),
(347, 'Durosomo', 'Ibitayo', NULL, 'Legallytee@yahoo.com', '', '08090800290', NULL, 0, 'user', 1, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-15 14:42:46', NULL, 0),
(348, 'Soji', 'Kukoyi', NULL, 'Sojukukoyi@yahoo.com', '', '08178033398', NULL, 0, 'user', 1, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-15 14:42:46', NULL, 0),
(349, 'Rebecca', 'Okhimamhe', NULL, 'rebokhis@yahoo.co.uk', '', '08039692669', NULL, 0, 'user', 1, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-15 14:42:46', NULL, 0),
(350, 'peggy', 'abel', NULL, 'billypeggy53@yahoo.com', '', '08169307338', NULL, 0, 'user', 1, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-15 14:42:46', NULL, 0),
(351, 'Cynthia', 'Ezegbu', NULL, 'Gistwitcynty@yahoo.co.uk', '', '07032307690', NULL, 0, 'user', 1, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-15 14:42:46', NULL, 0),
(352, 'Temitope', 'Oguntade', NULL, 'tope.oguntade@gmail.com', '', '08030463676', NULL, 0, 'user', 1, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-15 14:42:46', NULL, 0),
(353, 'Oluwaseun', 'Adegbiji', NULL, 'adeoluoyejohn@yahoo.com', '', '07035674907', NULL, 0, 'user', 1, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-15 14:42:46', NULL, 0),
(354, 'killmer', 'ekowa', NULL, 'emekaekowa@yahoo.com', '', '08037325385', NULL, 0, 'user', 1, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-15 14:42:46', NULL, 0),
(355, 'Bukky', 'Bello', NULL, 'bookkeybells@gmail.com', '', '08086363970', NULL, 0, 'user', 1, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-15 14:42:46', NULL, 0),
(356, 'olamide', 'Obadofin', NULL, 'olamideobadofin@yahoo.com', '', '08033060405', NULL, 0, 'user', 1, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-15 14:42:46', NULL, 0),
(357, 'Yetunde', 'Dabiri', NULL, 'Yetunde_dabiri@yahoo.com', '', '0803305050300', '08025638960', 0, 'user', 1, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-15 14:42:46', NULL, 0),
(358, 'dupe', 'Obadofin', NULL, 'dupe.obadofin@yahoo.com', '', '08051487323', NULL, 0, 'user', 1, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-15 14:42:46', NULL, 0),
(359, 'Oluwakemi', 'Akinloye', NULL, 'khemmieweb@gmail.com', '', '08033455292', NULL, 0, 'user', 1, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-15 14:42:46', NULL, 0),
(360, 'Samuel', 'Olorundare', NULL, 'samuelolorundare@rocketmail.com', '', '07088780329', NULL, 0, 'user', 1, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-15 14:42:46', NULL, 0),
(361, 'Silas', 'Okwoche', NULL, 'silasreally@yahoo.com', '', '08103915629', NULL, 0, 'user', 1, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-15 14:42:46', NULL, 0),
(362, 'Shittu', 'Akeem', NULL, 'Akeem4alberta@gmail.com', '', '07031115085', NULL, 0, 'user', 1, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-15 14:42:46', NULL, 0),
(363, 'Blessing', 'Onokpite', NULL, 'blessing.onokpite@gmail.com', '', '08086920480', '09038946593', 0, 'user', 1, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-15 14:42:46', NULL, 0),
(364, 'toyin', 'fakorede', NULL, 'toyinfak@yahoo.com', '', '07064410300', NULL, 0, 'user', 1, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-15 14:42:46', NULL, 0),
(365, 'stella', 'adeseye', NULL, 'stellaadeseye@yahoo.com', '', '08029994274', '0802994274', 0, 'user', 1, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-15 14:42:46', NULL, 0),
(366, 'Olajumoke', 'Olawoyin', NULL, 'Kaffie09@yahoo.com', '', '08077927292', '08087306699', 0, 'user', 1, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-15 14:42:46', NULL, 0),
(367, 'Igho', 'Efevoghor', NULL, 'ighoyefe@yahoo.com', '', '08083277219', '08033040175', 0, 'user', 1, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-15 14:42:46', NULL, 0),
(368, 'ofegbu', 'oladuni', NULL, 'oladunni.ofegbu@gmail.com', '', '08033157658', NULL, 0, 'user', 1, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-15 14:42:46', NULL, 0),
(369, 'Gbemi', 'Oduntan', NULL, 'gbemistic@gmail.com', '', '08023141841', NULL, 0, 'user', 1, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-15 14:42:46', NULL, 0),
(370, 'Funmi', 'Yussuff', NULL, 'Phummyzx@yahoo.com', '', '08023607951', '08023607951', 0, 'user', 1, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-15 14:42:46', NULL, 0),
(371, 'Modeenat', 'Bioshogun', NULL, 'talk_2_deenah@yahoo.com', '', '08023109735', NULL, 0, 'user', 1, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-15 14:42:46', NULL, 0),
(372, 'Kemi', 'Bello', NULL, 'kemibello@yahoomail.com', '', '08023109735', NULL, 0, 'user', 1, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-15 14:42:46', NULL, 0),
(373, 'Tope', 'Adu', NULL, 'Aduoluwatope@yahoo.com', '', '08034740214', NULL, 0, 'user', 1, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-15 14:42:46', NULL, 0),
(374, 'Segun', 'Lafup', NULL, 'Segunshow23@gmail.com', '', '08099003333', NULL, 0, 'user', 1, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-15 14:42:46', NULL, 0),
(375, 'Rachael', 'Adejobi', NULL, 'Racheladejobi90@gmail.com', '', '07036552322', NULL, 0, 'user', 1, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-15 14:42:46', NULL, 0),
(376, 'Dami', 'Dare', NULL, 'Subair_damilola@yahoo.com', '', '08168878202', NULL, 0, 'user', 1, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-15 14:42:46', NULL, 0),
(377, 'Olaoluwa', 'Oshobu', NULL, 'olaoluwaoshobu@gmail.com', '', '08055567789', NULL, 0, 'user', 1, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-15 14:42:46', NULL, 0),
(378, 'Qudus', 'Sokunbi', NULL, 'Qustidamus@yahoo.com', '', '08032394212', NULL, 0, 'user', 1, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-15 14:42:46', NULL, 0),
(379, 'Michael', 'Olamilekan', NULL, 'gbolamik@yahoo.com', '', '08036516534', NULL, 0, 'user', 1, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-15 14:42:46', NULL, 0),
(380, 'Abimbola', 'Binuyo', NULL, 'abimbola.binuyo@yahoo.co.uk', '', '08066771798', NULL, 0, 'user', 1, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-15 14:42:46', NULL, 0),
(381, 'Femi', 'Daramola', NULL, 'femi_daramola@yahoo.com', '', '08029519107', NULL, 0, 'user', 1, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-15 14:42:46', NULL, 0),
(382, 'Dolapo', 'Adu', NULL, 'Dolapoadu@gmail.com', '', '07060516018', '07060516018', 0, 'user', 1, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-15 14:42:46', NULL, 0),
(383, 'bimbo', 'sanni', NULL, 'bimboakinsanya5@yahoo.com', '', '080267906753', NULL, 0, 'user', 1, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-15 14:42:46', NULL, 0),
(384, 'Olumide', 'ikusedun', NULL, 'lummysedun@gmail.com', '', '08035841144', '08028995632', 0, 'user', 1, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-15 14:42:46', NULL, 0),
(385, 'Tamunomieibi', 'Oriala', NULL, 'makeithappen_4real@yahoo.com', '', '08059800832', NULL, 0, 'user', 1, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-15 14:42:46', NULL, 0),
(386, 'Abduljelil', 'Adebola', NULL, 'Iiyaniroh@yahoo.com', '', '08064120645', '07057627862', 0, 'user', 1, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-15 14:42:46', NULL, 0),
(387, 'Abduljelil', 'Adebola', NULL, 'iyaniroh@yahoo.com', '', '08064120645', '07057627862', 0, 'user', 1, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-15 14:42:46', NULL, 0),
(388, 'Chukwudi', 'chineme', NULL, 'picejay@yahoo.com', '', '08037027002', NULL, 0, 'user', 1, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-15 14:42:46', NULL, 0),
(389, 'Olubunmi Aisha', 'Olusui', NULL, 'bunmioks@yahoo.com', '', '08060218940', NULL, 0, 'user', 1, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-15 14:42:46', NULL, 0),
(390, 'PRECIOUS', 'SOKARI', NULL, 'precioussokari0@gmail.com', '', '08160146381', '08034675447', 0, 'user', 1, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-15 14:42:46', NULL, 0),
(391, 'oluwaseyi', 'olukemi', NULL, 'oluwaseyi.bola@gmail.com', '', '07030585463', '08029702334', 0, 'user', 1, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-15 14:42:46', NULL, 0),
(392, 'Olanrewaju', 'Ajibola', NULL, 'k3j4n8@mail.com', '', '08168910377', NULL, 0, 'user', 1, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-15 14:42:46', NULL, 0),
(393, 'kike', 'ebz', NULL, 'hauwashodunke@gmail.com', '', '08023714483', '08023714483', 0, 'user', 1, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-15 14:42:46', NULL, 0),
(394, 'Chigozie', 'Sunday', NULL, 'berrie_011@yahoo.com', '', '08056957293', '07066360780', 0, 'user', 1, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-15 14:42:46', NULL, 0),
(395, 'Konum', 'Elebuwa', NULL, 'Konum@live.com', '', '09091271476', '08188792097', 0, 'user', 1, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-15 14:42:46', NULL, 0),
(396, 'yemi', 'Kolawole', NULL, 'yemiwale@yahoo.co.uk', '', '08094033084', '08087184856', 0, 'user', 1, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-15 14:42:46', NULL, 0),
(397, 'taiwo', 'akindele', NULL, 'taiwoakindele@yahoo.com', '', '07034006678', '08023192895', 0, 'user', 1, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-15 14:42:46', NULL, 0),
(398, 'Tokunbo', 'Tosin-Famakinwa', NULL, 'tokunbo.adewale@anakle.com', '', '07031231858', '07031231858', 0, 'user', 1, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-15 14:42:46', NULL, 0),
(399, 'Olayinka', 'Ogunlere', NULL, 'yinkajayi2003@yahoo.com', '', '07034717507', NULL, 0, 'user', 1, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-15 14:42:46', NULL, 0),
(400, 'Lucky', 'Nwokorie', NULL, 'uchemillions@yahoo.com', '', '09039292289', NULL, 0, 'user', 1, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-15 14:42:46', NULL, 0),
(401, 'Baby', 'Mukoro', NULL, 'babymukoro@gmail.com', '', '08032004230', NULL, 0, 'user', 1, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-15 14:42:46', NULL, 0),
(402, 'Handsome', 'Chris', NULL, 'Hanzyung@gmail.com', '', '08184917667', '08103313108', 0, 'user', 1, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-15 14:42:46', NULL, 0),
(403, 'Andrew', 'Ameh', NULL, 'Aia_gp@yahoo.com', '', '08090211619', NULL, 0, 'user', 1, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-15 14:42:46', NULL, 0),
(404, 'Victoria', 'Ekenimoh', NULL, 'Vekenimoh@yahoo.com', '', '08022227304', NULL, 0, 'user', 1, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-15 14:42:46', NULL, 0),
(405, 'chinedu', 'anochiri', NULL, 'ano_ace@yahoo.com', '', '08022222066', NULL, 0, 'user', 1, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-15 14:42:46', NULL, 0),
(406, 'Funmilayo', 'Omoliki', NULL, 'funmiomoliki@gmail.com', '', '08067746170', NULL, 0, 'user', 1, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-15 14:42:46', NULL, 0),
(407, 'Olufunke', 'Mukandas', NULL, 'funkemukandas@gmail.com', '', '08034418929', '07031122770', 0, 'user', 1, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-15 14:42:46', NULL, 0),
(408, 'Winnie', 'Amosu', NULL, 'Winifred.monnie@gmail.com', '', '2347064174300', NULL, 0, 'user', 1, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-15 14:42:46', NULL, 0),
(409, 'Jumoke', 'Ajala', NULL, 'Jayluyi@gmail.com', '', '08139615992', '08091316327', 0, 'user', 1, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-15 14:42:46', NULL, 0),
(410, 'Asiedu', 'Fred', NULL, 'Asiedufr@yahoo.com', '', '0249310443', '0249310443', 0, 'user', 1, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-15 14:42:46', NULL, 0),
(411, 'anslem', 'ordia', NULL, 'anslemordia@gmail.com', '', '08030494422', NULL, 0, 'user', 1, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-15 14:42:46', NULL, 0),
(412, 'Demilade', 'Adekolu', NULL, 'demiladeadekolu@gmail.com', '', '+2348188635961', '+2348188635961', 0, 'user', 1, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-15 14:42:46', NULL, 0),
(413, 'queen', 'ampah', NULL, 'ayekwa.ampah@gmail.com', '', '08100694109', NULL, 0, 'user', 1, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-15 14:42:46', NULL, 0),
(414, 'Aremu', 'kafayat', NULL, 'kafayataremu@gmail.com', '', '08039162850', NULL, 0, 'user', 1, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-15 14:42:46', NULL, 0),
(415, 'tayo', 'dongo', NULL, 'tayodongo1@yahoo.com', '', '08178773937', NULL, 0, 'user', 1, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-15 14:42:46', NULL, 0),
(416, 'dickson', 'okpe', NULL, 'okpedickson@yahoo.com', '', '08056513454', '08056513454', 0, 'user', 1, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-15 14:42:46', NULL, 0),
(417, 'Ayo', 'Lasisi', NULL, 'ayoo31@yahoo.com', '', '08183701095', NULL, 0, 'user', 1, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-15 14:42:46', NULL, 0),
(418, 'Olaitan', 'Akinbode', NULL, 'Olaitan.ea@gmail.com', '', '08035001077', '08035001077', 0, 'user', 1, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-15 14:42:46', NULL, 0),
(419, 'motunrayo', 'odu', NULL, 'motunrayo.odu@hotmail.com', '', '08101882018', NULL, 0, 'user', 1, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-15 14:42:46', NULL, 0),
(420, 'Chinedu', 'madu', NULL, 'chinedu.epuechi@zenithbank.com', '', '+2347035030164', '+2347035030164', 0, 'user', 1, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-15 14:42:46', NULL, 0),
(421, 'boluwaatifee', 'akinyemi', NULL, 'akinyemi.clajournalists@gmail.com', '', '08176374132', NULL, 0, 'user', 1, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-15 14:42:46', NULL, 0),
(422, 'faith', 'obaze', NULL, 'faithadaobaze@yahoo.co.uk', '', '08166720717', NULL, 0, 'user', 1, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-15 14:42:46', NULL, 0),
(423, 'Dammy', 'Emuze', NULL, 'damilolaemuze@yahoo.com', '', '08188559476', NULL, 0, 'user', 1, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-15 14:42:46', NULL, 0),
(424, 'deola', 'ibitola', NULL, 'getdeolahere@yahoo.com', '', '2347085519435', NULL, 0, 'user', 1, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-15 14:42:46', NULL, 0),
(425, 'Adeola', 'Arije', NULL, 'aarije969@gmail.com', '', '08029293178', '08145466046', 0, 'user', 1, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-15 14:42:46', NULL, 0),
(426, 'nkeiru', 'nwaobiala', NULL, 'nkeiru.n@1musicnetworks.com', '', '08064551974', '08064551974', 0, 'user', 1, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-15 14:42:46', NULL, 0),
(427, 'aisha', 'olamide', NULL, 'olashanty@yahoo.com', '', '08120797998', NULL, 0, 'user', 1, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-15 14:42:46', NULL, 0),
(428, 'Omotomilola', 'Abiodun', NULL, 'tomiabiodun@yahoo.com', '', '08033358819', '08088571664', 0, 'user', 1, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-15 14:42:46', NULL, 0),
(429, 'chisom jeffrey', 'anyando', NULL, 'chisomjeffrey1998@yahoo.com', '', '09094940451', NULL, 0, 'user', 1, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-15 14:42:46', NULL, 0),
(430, 'opeyemi', 'adetibs', NULL, 'realopsy@yahoo.com', '', '07066893606', NULL, 0, 'user', 1, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-15 14:42:46', NULL, 0),
(431, 'Odini', 'Oriseh', NULL, 'omo525@yahoo.com', '', '08033881592', '08059774733', 0, 'user', 1, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-15 14:42:46', NULL, 0),
(432, 'Rotimi', 'Ajasa', NULL, 'rothmanx2000@yahoo.com', '', '07039125104', NULL, 0, 'user', 1, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-15 14:42:46', NULL, 0),
(433, 'mobolaji', 'oduyoye', NULL, 'guzzls@yahoo.co.uk', '', '08023212759', NULL, 0, 'user', 1, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-15 14:42:46', NULL, 0),
(434, 'ogechi', 'emegho', NULL, 'ogemms@gmail.com', '', '08033356100', NULL, 0, 'user', 1, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-15 14:42:46', NULL, 0),
(435, 'Adaora', 'Aroh', NULL, 'ADARH9@gmail.com', '', '07050997810', '07050997810', 0, 'user', 1, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-15 14:42:46', NULL, 0),
(436, 'LOLA', 'MATESUN', NULL, 'Lolatantoluwa@yahoo.com', '', '08052150438', NULL, 0, 'user', 1, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-15 14:42:46', NULL, 0),
(437, 'Temiloluwa', 'Sotubo', NULL, 'seny29@yahoo.com', '', '09025179516', '08098247995', 0, 'user', 1, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-15 14:42:46', NULL, 0),
(438, 'Abisoye', 'Odewole', NULL, 'madmenops@gmail.com', '', '09096500799', '08051998856', 0, 'user', 1, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-15 14:42:46', NULL, 0),
(439, 'N', 'Newton', NULL, 'newdenilank@hotmail.com', '', '08172428019', '08090211624', 0, 'user', 1, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-15 14:42:46', NULL, 0),
(440, 'bello', 'oluwadamilola', NULL, 'dahmylorlar@gmail.com', '', '08184019919', '08027612227', 0, 'user', 1, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-15 14:42:46', NULL, 0),
(441, 'Chioma', 'Achebe', NULL, 'chiomachebe@yahoo.com', '', '08134430182', NULL, 0, 'user', 1, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-15 14:42:46', NULL, 0),
(442, 'michael', 'aguzie', NULL, 'maguzie@gmail.com', '', '08028750802', '08028750802', 0, 'user', 1, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-15 14:42:46', NULL, 0),
(443, 'Prince', 'Azubuike', NULL, 'princeazubuike@gmail.com', '', '08099445544', '08032004301', 0, 'user', 1, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-15 14:42:46', NULL, 0),
(444, 'Winifred', 'Inwang', NULL, 'inwanguyai@gmail.com', '', '08137828160', NULL, 0, 'user', 1, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-15 14:42:46', NULL, 0),
(445, 'Emeka', 'Uzowulu', NULL, 'uzowulue@gmail.com', '', '08098574398', '2348098574398', 0, 'user', 1, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-15 14:42:46', NULL, 0),
(446, 'EDMOND', 'ONOJA', NULL, 'EDMONOJA@GMAIL.COM', '', '08034356782', NULL, 0, 'user', 1, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-15 14:42:46', NULL, 0),
(447, 'olasumbo', 'osowo', NULL, 'sunnyosowo@gmail.com', '', '08059001655', NULL, 0, 'user', 1, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-15 14:42:46', NULL, 0),
(448, 'Alesinloye-king', 'pelumi', NULL, 'Alesinloyepelumi@yahoo.com', '', '08171920004', '08101107340', 0, 'user', 1, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-15 14:42:46', NULL, 0),
(449, 'candice', 'Sy-Onwuka', NULL, 'candy_syng@yahoo.com', '', '08083114263', NULL, 0, 'user', 1, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-15 14:42:46', NULL, 0),
(450, 'sam', 'akingboye', NULL, 'sam_akingboye@yahoo.com', '', '07058898341', NULL, 0, 'user', 1, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-15 14:42:46', NULL, 0),
(451, 'voke', 'ekokobe', NULL, 'vokeekokobe@gmail.com', '', '07012620498', NULL, 0, 'user', 1, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-15 14:42:46', NULL, 0),
(452, 'tayo', 'olofun', NULL, 'olofunta@yahoo.com', '', '07082286583', NULL, 0, 'user', 1, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-15 14:42:46', NULL, 0),
(453, 'bisi', 'badero', NULL, 'bisi_badero@yahoo.com', '', '08035477918', NULL, 0, 'user', 1, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-15 14:42:46', NULL, 0),
(454, 'ama', 'achonu', NULL, 'alexandra.achonu@gmail.com', '', '07063383933', NULL, 0, 'user', 1, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-15 14:42:46', NULL, 0),
(455, 'chidi', 'koldsweat', NULL, 'pnponlinebabystore@gmail.com', '', '08034682060', NULL, 0, 'user', 1, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-15 14:42:46', NULL, 0),
(456, 'temitayo', 'nathan', NULL, 'tayo_nat@yahoo.com', '', '08164691226', NULL, 0, 'user', 1, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-15 14:42:46', NULL, 0),
(457, 'Magnify', 'Adepena', NULL, 'Adepenamag@yahoo.com', '', '08146071061', NULL, 0, 'user', 1, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-15 14:42:46', NULL, 0),
(458, 'bolanle', 'adeola', NULL, 'bsfashionroom@gmail.com', '', '08028971495', NULL, 0, 'user', 1, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-15 14:42:46', NULL, 0),
(459, 'Afoma', 'Okwukaogu', NULL, 'Afomaonyejekwe@yahoo.com', '', '08037448782', NULL, 0, 'user', 1, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-15 14:42:46', NULL, 0),
(460, 'Damilola', 'Olusanya', NULL, 'Olusanya.damilola@gmail.com', '', '07087472640', NULL, 0, 'user', 1, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-15 14:42:46', NULL, 0),
(461, 'Adeola', 'Odusote', NULL, 'Dixiesapparel@gmail.com', '', '08077560633', NULL, 0, 'user', 1, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-15 14:42:46', NULL, 0),
(462, 'habiba', 'diaw', NULL, 'habibadiaw@gmail.com', '', '080282996432', NULL, 0, 'user', 1, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-15 14:42:46', NULL, 0),
(463, 'anita', 'nwosu', NULL, 'anitanwosu@gmail.com', '', '08146220489', NULL, 0, 'user', 1, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-15 14:42:46', NULL, 0),
(464, 'wumi', 'omidiji', NULL, 'woomediji@gmail.com', '', '07036727435', NULL, 0, 'user', 1, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-15 14:42:46', NULL, 0),
(465, 'kiki', 'Adesanya', NULL, 'kikiadesanya@ymail.com', '', '08090901985', NULL, 0, 'user', 1, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-15 14:42:46', NULL, 0),
(466, 'Pearl', 'Icy', NULL, 'Paliandu89@gmail.com', '', '07039338233', NULL, 0, 'user', 1, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-15 14:42:46', NULL, 0),
(467, 'ibrahim', 'momodu', NULL, 'iamomodu@yahoo.com', '', '08088381708', NULL, 0, 'user', 1, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-15 14:42:46', NULL, 0),
(468, 'Abimbola', 'Akande', NULL, 'Cruzwitbibi@yahoo.co.uk', '', '08036602706', '07088122755', 0, 'user', 1, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-15 14:42:46', NULL, 0),
(469, 'yetunde', 'shode', NULL, 'yetunde.shode@gmail.com', '', '08182442468', NULL, 0, 'user', 1, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-15 14:42:46', NULL, 0),
(470, 'Ayobami', 'Odedina', NULL, 'Ayobamiodedina@gmail.com', '', '08036602706', '07088122755', 0, 'user', 1, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-15 14:42:46', NULL, 0),
(471, 'Anita', 'Nnbuife', NULL, 'nnabuifeanita@yahoo.com', '', '08094705960', NULL, 0, 'user', 1, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-15 14:42:46', NULL, 0),
(472, 'adetutu', 'ogunsowo', NULL, 'tutunoni@gmail.com', '', '08033593760', '08033593760', 0, 'user', 1, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-15 14:42:46', NULL, 0),
(473, 'Darlyn', 'Okojie', NULL, 'Darlzkojie@gmail.com', '', '08153806478', NULL, 0, 'user', 1, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-15 14:42:46', NULL, 0),
(474, 'Abby', 'Rockson', NULL, 'abiola.rockson@yahoo.com', '', '08181041478', NULL, 0, 'user', 1, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-15 14:42:46', NULL, 0),
(475, 'Henrietta', 'Mom odd', NULL, 'adesetta@gmail.com', '', '08089039812', '08070515725', 0, 'user', 1, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-15 14:42:46', NULL, 0),
(476, 'Goke', 'Fowode', NULL, 'seyefowode@gmail.com', '', '07084532690', NULL, 0, 'user', 1, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-15 14:42:46', NULL, 0),
(477, 'Adedapo', 'Oniru', NULL, 'daponiru@gmail.com', '', '08091895708', '08033047523', 0, 'user', 1, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-15 14:42:46', NULL, 0),
(478, 'oge', 'oge', NULL, 'ogemm5@gmail.com', '', '08033356100', '08055633781', 0, 'user', 1, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-15 14:42:46', NULL, 0),
(479, 'Stephanie', 'chidinma', NULL, 'chidinmastephanie57@gmail.com', '', '09099254560', NULL, 0, 'user', 1, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-15 14:42:46', NULL, 0),
(480, 'adiat', 'bashorun', NULL, 'adiatbashorun@hotmail.co.uk', '', '07784185539', NULL, 0, 'user', 1, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-15 14:42:46', NULL, 0),
(481, 'tairat', 'bashorun', NULL, 'tairatb@gmail.com', '', '0817860032', NULL, 0, 'user', 1, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-15 14:42:46', NULL, 0),
(482, 'Mariam', 'Bashorun', NULL, 'm_bashorun@hotmail.co.uk', '', '07970167402', NULL, 0, 'user', 1, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-15 14:42:46', NULL, 0),
(483, 'temilade', 'shoyinka', NULL, 'bummmy2005@yahoo.com', '', '08178484484', NULL, 0, 'user', 1, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-15 14:42:46', NULL, 0),
(484, 'Damilola', 'Adewunmi', NULL, 'damilolaadewunmi@outlook.com', '', '08094660985', NULL, 0, 'user', 1, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-15 14:42:46', NULL, 0),
(485, 'toyin', 'oyeledun', NULL, 'toyinoyeledun@yahoo.com', '', '08138559020', NULL, 0, 'user', 1, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-15 14:42:46', NULL, 0),
(486, 'adesuwaa', 'oseghe', NULL, 'adesuwaoseghe@gmail.com', '', '08032065065', NULL, 0, 'user', 1, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-15 14:42:46', NULL, 0),
(487, 'tayo', 'odunowo', NULL, 'tayo100@yahoo.com', '', '07033238838', NULL, 0, 'user', 1, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-15 14:42:46', NULL, 0),
(488, 'ogochukwu', 'nwachukwu', NULL, 'ogo@oandg.us', '', '08092838322', NULL, 0, 'user', 1, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-15 14:42:46', NULL, 0),
(489, 'JeNika', 'Mukoro', NULL, 'jenikapmukoro@me.com', '', '08133979889', NULL, 0, 'user', 1, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-15 14:42:46', NULL, 0),
(490, 'Ngozi', 'Ezimako', NULL, 'ngoziez@ymail.com', '', '08181451105', NULL, 0, 'user', 1, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-15 14:42:46', NULL, 0),
(491, 'Akinyemi', 'Sanya', NULL, 'gradeocservices@gmail.com', '', '08139721825', NULL, 0, 'user', 1, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-15 14:42:46', NULL, 0),
(492, 'Fadeyi', 'Olayinka', NULL, 'fadeyiolayinka@gmail.com', '', '08137896250', '08106181372', 0, 'user', 1, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-15 14:42:46', NULL, 0),
(493, 'jamila', 'Mohammed. A', NULL, 'jamilamohammedaudu@gmail.com', '', '09099256744', NULL, 0, 'user', 1, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-15 14:42:46', NULL, 0),
(494, 'Bipin', 'Prasad', NULL, 'mail2bipinprasad@gmail.com', '', '07602570227', '07602570227', 0, 'user', 1, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-15 14:42:46', NULL, 0),
(495, 'Semiire', 'Folorunso', NULL, 'semiire@yahoo.com', '', '08030567571', '08054954924', 0, 'user', 1, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-15 14:42:46', NULL, 0),
(496, 'michael', 'idah', NULL, 'midah2007@gmail.com', '', '08064675056', NULL, 0, 'user', 1, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-15 14:42:46', NULL, 0),
(497, 'Damien', 'Kehinde', NULL, 'kehindedamien@gmail.com', '', '08027569864', NULL, 0, 'user', 1, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-15 14:42:46', NULL, 0),
(498, 'Chinyere', 'Nwachukwu', NULL, 'nwachukwu_chinyere@hotmail.com', '', '07069725225', NULL, 0, 'user', 1, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-15 14:42:46', NULL, 0),
(499, 'peter', 'agwu', NULL, 'agupetert75@gmail.com', '', '0817531055', '07018088818', 0, 'user', 1, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-15 14:42:46', NULL, 0),
(500, 'Abu', 'Abu', NULL, 'abu@hotmail.com', '', '07023280626', NULL, 0, 'user', 1, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-15 14:42:46', NULL, 0),
(501, 'AbU', 'Abu', NULL, 'abu.abubakar@hotmail.com', '', '08187303656', NULL, 0, 'user', 1, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-15 14:42:46', NULL, 0),
(502, 'Nwando', 'Ozobia', NULL, 'ndozobia@gmail.com', '', '07034492828', '08183444000', 0, 'user', 1, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-15 14:42:46', NULL, 0),
(503, 'odunayo', 'adesanya', NULL, 'temmie_bworm@yahoo.com', '', '08085416129', '08167574443', 0, 'user', 1, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-15 14:42:46', NULL, 0),
(504, 'Osariase', 'Idubor', NULL, 'osariase.idubor@gmail.com', '', '08033767742', NULL, 0, 'user', 1, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-15 14:42:46', NULL, 0),
(505, 'Ade', 'Mba', NULL, 'Ademba@gmail.com', '', '07022223232', NULL, 0, 'user', 1, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-15 14:42:46', NULL, 0),
(506, 'Anthony', 'Odu', NULL, 'antonyodu@gmail.com', '', '08145632564', '09090311929', 0, 'user', 1, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-15 14:42:46', NULL, 0),
(507, 'Funmi', 'Alonge', NULL, 'olufunmialonge@gmail.com', '', '08055822838', NULL, 0, 'user', 1, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-15 14:42:46', NULL, 0),
(508, 'vivian', 'okunbor', NULL, 'elenaomonuwa2@gmail.com', '', '+39 3208458563', NULL, 0, 'user', 1, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-15 14:42:46', NULL, 0),
(509, 'Rolake', 'Job', NULL, 'Morolakejob@gmail.com', '', '08099235702', NULL, 0, 'user', 1, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-15 14:42:46', NULL, 0),
(510, 'Kayode O', 'U', NULL, 'tosinodu@genewglobalconsult.com', '', '08023187033', '08023187033', 0, 'user', 1, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-15 14:42:46', NULL, 0),
(511, 'Kayode O', 'U', NULL, 'antonyodu@gmail2.com', '', '08023187033', '08023187033', 0, 'user', 1, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-15 14:42:46', NULL, 0),
(514, 'Olumide', 'Arokodare', NULL, 'oarokoda2re@primewealthcapital.com', '', '09090311929', '09090311929', 0, 'user', 1, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-15 14:42:46', NULL, 0),
(515, 'Olumide', 'Arokodare', NULL, 'oarokodare2@primewealthcapital.com', '', '09090311929', '09090311929', 0, 'user', 1, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-15 14:42:46', NULL, 0),
(516, 'Olumide', 'Arokodare', NULL, 'oarokodare3@primewealthcapital.com', '', '09090311929', '09090311929', 0, 'user', 1, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-15 14:42:46', NULL, 0),
(517, 'Raphael', 'Yemitan', NULL, 'raphaey@mtnnigeria.net', '', '08032003058', NULL, 0, 'user', 1, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-15 14:42:46', NULL, 0),
(518, 'Emeka', 'Uzowulu', NULL, 'euzowulu@yahoo.co.uk', '', '2348098574398', '2348098574398', 0, 'user', 1, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-15 14:42:46', NULL, 0),
(519, 'Andrew', 'Airelobhegbe', NULL, 'andrewairelobhegbe@gmail.com', '', '08165047290', NULL, 0, 'user', 1, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-15 14:42:46', NULL, 0),
(520, 'preye', 'marcus', NULL, 'preyedeals@gmail.com', '', '07038001097', NULL, 0, 'user', 1, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-15 14:42:46', NULL, 0),
(521, 'tobiloba', 'abby', NULL, 'tobifimiabby@gmail.com', '', '09096829237', '08081779438', 0, 'user', 1, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-15 14:42:46', NULL, 0),
(522, 'Adeola', 'Oyebola', NULL, 'Halloedah@gmail.com', '', '09090409765', NULL, 0, 'user', 1, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-15 14:42:46', NULL, 0),
(523, 'Maya', 'Arogundade', NULL, 'Mayaaro@hotmail.com', '', '078026380&8', NULL, 0, 'user', 1, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-15 14:42:46', NULL, 0),
(524, 'Somto', 'Ogbonna', NULL, 'sogbonna10@gmail.com', '', '08170587131', '09031190295', 0, 'user', 1, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-15 14:42:46', NULL, 0),
(525, 'UPL Events', '& Catering Service', NULL, 'universalperfectionltd@yahoo.com', '', '08109333210', '08109333210', 0, 'user', 1, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-15 14:42:46', NULL, 0),
(526, 'Rosemary', 'Etim', NULL, 'creamy189@gmail.com', '', '08089372797', NULL, 0, 'user', 1, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-15 14:42:46', NULL, 0),
(527, 'George', 'Ederard', NULL, 'zdrad@yahoo.com', '', '08066643999', '08023166918', 0, 'user', 1, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-15 14:42:46', NULL, 0),
(528, 'Elizabeth', 'onwodi', NULL, 'onwodi.elizabeth@gmail.com', '', '08169599064', NULL, 0, 'user', 1, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-15 14:42:46', NULL, 0),
(529, 'Jummai', 'Arome', NULL, 'iyearome@gmail.com', '', '08078430480', '08078430480', 0, 'user', 1, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-15 14:42:46', NULL, 0),
(530, 'Golden', 'Oluchukwu', NULL, 'oluchukwugolden@gmail.com', '', '07033593600', NULL, 0, 'user', 1, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-15 14:42:46', NULL, 0),
(531, 'Anthony', 'Odu', NULL, 'tosin@vationsys.com', '', '09090311929', NULL, 0, 'user', 1, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-15 14:42:46', NULL, 0),
(532, 'Huldee', 'Anie', NULL, 'emekau@vationsys.com', '', '2348098574398', NULL, 0, 'user', 1, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-15 14:42:46', NULL, 0),
(533, 'adewale', 'onafalujo', NULL, 'walengy2001@gmail.com', '', '07084223896', NULL, 0, 'user', 1, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-15 14:42:46', NULL, 0),
(534, 'Lisa', 'Lisa', NULL, 'Lisaatuyota@live.co.uk', '', '08033088858', '09093608448', 0, 'user', 1, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-15 14:42:46', NULL, 0),
(535, 'Kayode', 'Ayantola', NULL, 'kdoo4rreal@yahoo.com', '', '08054634176', '07068755614', 0, 'user', 1, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-15 14:42:46', NULL, 0),
(536, 'Adedeji', 'Awobona', NULL, 'dejibona@yahoo.com', '', '08035350160', '08034031631', 0, 'user', 1, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-15 14:42:46', NULL, 0),
(537, 'Adebamowo', 'Adedoyin', NULL, 'wunmade.addey@gmail.com', '', '08130088568', '09054561595', 0, 'user', 1, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-15 14:42:46', NULL, 0),
(538, 'ojukwu', 'onwuzulike', NULL, 'ojwardrobesboutique@yahoo.com', '', '08055584444', NULL, 0, 'user', 1, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-15 14:42:46', NULL, 0),
(539, 'Dami', 'O', NULL, 'damiolowokere@gmail.com', '', '08040070703', NULL, 0, 'user', 1, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-15 14:42:46', NULL, 0),
(540, 'Damilola', 'Olumide-Ajayi', NULL, 'damiolumideajayi@gmail.com', '', '08032003562', NULL, 0, 'user', 1, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-15 14:42:46', NULL, 0),
(541, 'femi', 'abioye', NULL, 'afemo2000@hotmail.com', '', '08074129736', NULL, 0, 'user', 1, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-15 14:42:46', NULL, 0),
(542, 'Jeffrey', 'Anyado', NULL, 'Anyadojeffrey14@yahoo.com', '', '+2348070448954', '+2348070448954', 0, 'user', 1, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-15 14:42:46', NULL, 0),
(543, 'Adesuwa', 'Ossai', NULL, 'adesuwa.ossai@yahoo.com', '', '08152748870', NULL, 0, 'user', 1, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-15 14:42:46', NULL, 0),
(544, 'matilda', 'okereke', NULL, 'uandmatty@gmail.com', '', '08095492596', NULL, 0, 'user', 1, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-15 14:42:46', NULL, 0),
(545, 'chinyere', 'eze', NULL, 'chezzyeze2013@yahoo.com', '', '08039358692', NULL, 0, 'user', 1, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-15 14:42:46', NULL, 0),
(546, 'uche', 'Gene', NULL, 'Chimamanda1234@gmail', '', '08032672570', NULL, 0, 'user', 1, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-15 14:42:46', NULL, 0),
(547, 'Nnenna', 'Ukegbu', NULL, 'nnennaukegbu@yahoo.co.uk', '', '08083607693', '08083607693', 0, 'user', 1, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-15 14:42:46', NULL, 0),
(548, 'Ona', 'Ofunne', NULL, 'ona660@gmail.com', '', '07080247144', NULL, 0, 'user', 1, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-15 14:42:46', NULL, 0),
(549, 'Jace', 'Afolahan', NULL, 'gbengaa@ebsafr.com', '', '08189558783', NULL, 0, 'user', 1, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-15 14:42:46', NULL, 0),
(550, 'Fatima', 'Olubunmi', NULL, 'fatima_chinwe@yahoo.com', '', '08173722181', NULL, 0, 'user', 1, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-15 14:42:46', NULL, 0),
(551, 'Adaeze', 'Mba', NULL, 'mba.adaeze@yahoo.com', '', '07066204369', NULL, 0, 'user', 1, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-15 14:42:46', NULL, 0),
(552, 'nduka', 'emi', NULL, 'ndukaemi@yahoo.com', '', '08110160588', '08038312805', 0, 'user', 1, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-15 14:42:46', NULL, 0),
(553, 'Anna', 'Etonu', NULL, 'aetonu24@gmail.com', '', '07037058570', NULL, 0, 'user', 1, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-15 14:42:46', NULL, 0),
(554, 'shekoni', 'mariam', NULL, 'mariamshekoni@yahoo.com', '', '08029079144', NULL, 0, 'user', 1, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-15 14:42:46', NULL, 0),
(555, 'angel', 'beckky', NULL, 'angelbeckky@yahoo.co.uk', '', '09029095645', NULL, 0, 'user', 1, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-15 14:42:46', NULL, 0),
(556, 'Chinenye', 'Nwanna', NULL, 'chinenyenwanna@gmail.com', '', '08080803855', NULL, 0, 'user', 1, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-15 14:42:46', NULL, 0),
(557, 'Jace', 'Afo', NULL, 'jac0422@gmail.com', '', '08189558783', NULL, 0, 'user', 1, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-15 14:42:46', NULL, 0),
(558, 'Anthony', 'Odu', NULL, 'antonyodu@yahoo.com', '', '08145632564', NULL, 0, 'user', 1, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-15 14:42:46', NULL, 0),
(559, 'John', 'Doe', NULL, 'info@vationsys.com', '', '08323423423', NULL, 0, 'user', 1, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-15 14:42:46', NULL, 0),
(560, 'Lucy', 'Mba', NULL, 'prestreal4@live.com', '', '07879998210', NULL, 0, 'user', 1, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-15 14:42:46', NULL, 0),
(561, 'Anthony', 'Odu', NULL, 'antonyodusfvsdvsdv@gmail.com', '', '08145632564', NULL, 0, 'user', 1, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-15 14:42:46', NULL, 0),
(562, 'Anthony', 'Odu', NULL, 'antonybdfbdfbdodu@gmail.com', '', '08145632564', NULL, 0, 'user', 1, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-15 14:42:46', NULL, 0),
(563, 'sdcvsv', 'vsdcsdcs', NULL, 'aaa@ssss.com', '', '0987654', NULL, 0, 'user', 1, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-15 14:42:46', NULL, 0),
(564, 'cccc', 'mmmm', NULL, 'aa@ss.com', '', '90876543', NULL, 0, 'user', 1, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-15 14:42:46', NULL, 0),
(565, 'Anthony', 'Oduduwa', NULL, 'info@ggc.com', '', '08145632564', NULL, 0, 'user', 1, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-15 14:42:46', NULL, 0),
(566, 'Info', 'Jlf', NULL, 'info@jollof.com', '', '23432343565', NULL, 0, 'user', 1, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-15 14:42:46', NULL, 0),
(567, 'Basita', 'Arog', NULL, 'esb009@gmail.com', '', '08182102198', NULL, 0, 'user', 1, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-15 14:42:46', NULL, 0),
(568, 'Chinny', 'Eze', NULL, 'chinyerege@ebsafr.com', '', '08038358692', NULL, 0, 'user', 1, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-15 14:42:46', NULL, 0),
(569, 'Ugochukwu', 'Ihechukwu', NULL, 'flexopjoel@gmail.com', '', '7134740966', NULL, 0, 'user', 1, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-15 14:42:46', NULL, 0),
(570, 'Eze', 'Chinyere', NULL, 'eje_jenny@yahoo.com', '', '08039358692', NULL, 0, 'user', 1, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-15 14:42:46', NULL, 0),
(572, 'oye', 'cool', 'male', 'segun@stakle.com', '21232f297a57a5a743894a0e4a801fc3', '', NULL, 0, 'user', 1, '', NULL, 0, '2018-05-08 12:38:23', '2018-09-05 10:44:47', NULL, 0),
(584, 'segun', 'oye', 'male', 'trivin98@gmail.com', '21232f297a57a5a743894a0e4a801fc3', '0808303039', NULL, 0, 'user', 1, '', NULL, 0, '2018-09-05 10:58:18', '2018-09-05 11:02:22', NULL, 0),
(585, 'ade', 'tunde', NULL, 'trivin98@gmail.com', '', '0859559', NULL, 0, 'guest', 0, '', NULL, 0, '2018-09-14 09:48:03', '2018-09-14 09:48:03', NULL, 0);

-- --------------------------------------------------------

--
-- Table structure for table `accounts_copy`
--

CREATE TABLE `accounts_copy` (
  `id` int(11) NOT NULL,
  `firstname` char(200) NOT NULL DEFAULT '',
  `lastname` char(200) DEFAULT NULL,
  `gender` char(11) DEFAULT NULL,
  `email` char(200) NOT NULL DEFAULT '',
  `password` char(200) NOT NULL DEFAULT '',
  `phone` char(200) DEFAULT NULL,
  `phone2` char(200) DEFAULT NULL,
  `point` int(11) DEFAULT '0',
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
-- Dumping data for table `accounts_copy`
--

INSERT INTO `accounts_copy` (`id`, `firstname`, `lastname`, `gender`, `email`, `password`, `phone`, `phone2`, `point`, `status`, `image`, `token`, `admin_read_status`, `createdat`, `updatedat`, `deletedat`, `isdeleted`) VALUES
(1, 'Oye''s', 'Segun', 'male', 'oye@ebs.com', '21232f297a57a5a743894a0e4a801fc3', '08080786656', '', 200, 1, '4272f7683b.jpg', NULL, 0, '2017-10-07 00:34:09', '2018-04-08 08:04:48', NULL, 0),
(2, 'yinka', 'tunji', NULL, 'yinka@ebsafr.com', '', '0907865432', '09087654321', 0, 0, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-04 23:16:12', NULL, 0),
(3, 'Ebuka', 'Ezewuzie', NULL, 'ebuka.ezewuzie@gmail.com', '', '08069802185', NULL, 0, 0, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-04 23:16:12', NULL, 0),
(4, 'gbemi', 'Eda', NULL, 'edab@ebsafr.com', '', '07090345678', NULL, 0, 0, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-04 23:16:12', NULL, 0),
(5, 'Bemigho', 'Eda', NULL, 'gbemiaus@yahoo.com', '', '08037078922', '08037078923', 0, 0, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-04 23:16:12', NULL, 0),
(6, 'lucy', 'mballa', NULL, 'mballalucy87@gmail.com', '', '08141226692', NULL, 0, 0, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-04 23:16:12', NULL, 0),
(7, 'Bobby', 'A.', NULL, 'bobbya@ebsafr.com', '', '08073154434', NULL, 0, 0, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-04 23:16:12', NULL, 0),
(8, 'kannike', 'ibrahim', NULL, 'vdjtribe@yahoo.com', '', '+971555930483', '+971555930483', 0, 0, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-04 23:16:12', NULL, 0),
(9, 'Bukola', 'Oshinyemi', NULL, 'bhouckie@gmail.com', '', '08029858731', NULL, 0, 0, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-04 23:16:12', NULL, 0),
(10, 'Abiola', 'Oyebolu', NULL, 'bolub1@yahoo.com', '', '08026754151', NULL, 0, 0, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-04 23:16:12', NULL, 0),
(11, 'Onafalujo', 'Adewale', NULL, 'walengy2001@gmal.com', '', '07084223896', NULL, 0, 0, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-04 23:16:12', NULL, 0),
(12, 'Abiola', 'Oyebolu', NULL, 'oyeboluabiola@gmail.com', '', '08026754151', NULL, 0, 0, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-04 23:16:12', NULL, 0),
(13, 'oyinda', 'olashoju', NULL, 'oolashoju@gmail.com', '', '08136617350', NULL, 0, 0, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-04 23:16:12', NULL, 0),
(14, 'olufemi', 'adeniregun', NULL, 'boxer2905@yahoo.ca', '', '07035045787', NULL, 0, 0, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-04 23:16:12', NULL, 0),
(15, 'boro', 'akintunde', NULL, 'olajobi@hotmail.com', '', '08087000074', '08087000074', 0, 0, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-04 23:16:12', NULL, 0),
(16, 'Sherif', 'Kabiawu', NULL, 'sherifkk@gmail.com', '', '08077770771', NULL, 0, 0, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-04 23:16:12', NULL, 0),
(17, 'Cyril', 'Nwabudike', NULL, 'cyril_nwa@yahoo.co.uk', '', '08035523397', NULL, 0, 0, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-04 23:16:12', NULL, 0),
(18, 'Albert', 'iyorah', NULL, 'al@al-brett.com', '', '08050703000', NULL, 0, 0, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-04 23:16:12', NULL, 0),
(19, 'Taiwo', 'Oniru-Akintokun', NULL, 'taiwo.oniruakintokun@gmail.com', '', '07089997466', NULL, 0, 0, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-04 23:16:12', NULL, 0),
(20, 'martin', 'okulaja', NULL, 'martin.okulaja@addaxpetroleum.com', '', '08034021948', NULL, 0, 0, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-04 23:16:12', NULL, 0),
(21, 'kehinde', 'adewole', NULL, 'allaboutprintng@gmail.com', '', '07089995322', '08187998418', 0, 0, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-04 23:16:12', NULL, 0),
(22, 'matthew', 'karieren', NULL, 'mkarieren@yahoo.co.uk', '', '08023122015', NULL, 0, 0, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-04 23:16:12', NULL, 0),
(23, 'fola', 'aganga-williams', NULL, 'fogagtta@aol.com', '', '08072797167', NULL, 0, 0, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-04 23:16:12', NULL, 0),
(24, 'shoyinka', 'shodunke', NULL, 'shoyins@mtnngeria.net', '', '08032001964', NULL, 0, 0, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-04 23:16:12', NULL, 0),
(25, 'aderinko', 'eliot', NULL, 'rinkoeliot@yahoo.com', '', '08029311012', '08029311012', 0, 0, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-04 23:16:12', NULL, 0),
(26, 'princess', 'ogunlusi', NULL, 'helleanababe@ymail.com', '', '08027000960', '08127464834', 0, 0, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-04 23:16:12', NULL, 0),
(27, 'obianuju', 'ogubuike', NULL, 'Oby_ogu@yahoo.com', '', '07067839263', '08085247131', 0, 0, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-04 23:16:12', NULL, 0),
(28, 'olufemi', 'oyenuga', NULL, 'olufemo@mtnnigeria.net', '', '08032008540', '0809992407', 0, 0, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-04 23:16:12', NULL, 0),
(29, 'mary', 'fasheitan', NULL, 'mfasheitan@gmail.com', '', '08032024429', '07025015135', 0, 0, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-04 23:16:12', NULL, 0),
(30, 'albert', 'iyorah', NULL, 'albrett2001@yahoo.com', '', '08050703000', NULL, 0, 0, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-04 23:16:12', NULL, 0),
(31, 'christopher', 'kelechukwu', NULL, 'wziwabo11@yahoo.es', '', '08125078696', NULL, 0, 0, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-04 23:16:12', NULL, 0),
(32, 'david', 'yerima', NULL, 'yerimadh@gnail.com', '', '08035956295', NULL, 0, 0, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-04 23:16:12', NULL, 0),
(33, 'ola', 'beldore', NULL, 'olabeldore@yahoo.com', '', '08023234910', NULL, 0, 0, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-04 23:16:12', NULL, 0),
(34, 'Ebuka', 'Ezewuzie', NULL, 'ebuka@vationsys.com', '', '08032009295', NULL, 0, 0, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-04 23:16:12', NULL, 0),
(35, 'Babajide', 'Akintokun', NULL, 'akintokun7@gmail.com', '', '08022224320', '08058074266', 0, 0, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-04 23:16:12', NULL, 0),
(36, 'charles', 'anyanwu', NULL, 'demo4eva@hotmail.com', '', '08035036336', NULL, 0, 0, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-04 23:16:12', NULL, 0),
(37, 'omolola', 'ogunmoroti', NULL, 'teju_4real@yahoo.com', '', '08120173873', NULL, 0, 0, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-04 23:16:12', NULL, 0),
(38, 'olatubosun', 'ebenezer', NULL, 'tubosun4dare@yahoo.com', '', '07062261028', '07062261028', 0, 0, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-04 23:16:12', NULL, 0),
(39, 'SHEILA', 'HUNTER', NULL, 'sheila.hunter80@yahoo.com', '', '08060145470', '08037689872', 0, 0, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-04 23:16:12', NULL, 0),
(40, 'Jide', 'Shitta-Bey', NULL, 'jidebey@hotmail.com', '', '08092222224', '08092222224', 0, 0, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-04 23:16:12', NULL, 0),
(41, 'murphy', 'okojie', NULL, 'info@shaunzbar.com', '', '08038077536', NULL, 0, 0, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-04 23:16:12', NULL, 0),
(42, 'kaee', 'kekere', NULL, 'kaekekere@gmail.com', '', '08077707604', NULL, 0, 0, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-04 23:16:12', NULL, 0),
(43, 'lolo', 'majin', NULL, 'lolomajin@yahoo.com', '', '08023096473', NULL, 0, 0, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-04 23:16:12', NULL, 0),
(44, 'Valentine', 'anozia', NULL, 'vanozia@yahoo.com', '', '08034563328', NULL, 0, 0, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-04 23:16:12', NULL, 0),
(45, 'nurad', 'ahmed', NULL, 'goldenhammer62@yahoo.co.uk', '', '08037050786', NULL, 0, 0, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-04 23:16:12', NULL, 0),
(46, 'marshall', 'onwuameze', NULL, 'marshallonwuameze@yahoo.com', '', '08033009988', NULL, 0, 0, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-04 23:16:12', NULL, 0),
(47, 'supa', 'famuyiwa', NULL, 'sgsl@qualityssrvice.com', '', '08077719777', NULL, 0, 0, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-04 23:16:12', NULL, 0),
(48, 'kayode', 'olaleye', NULL, 'olaleye@eyespynigeria.com', '', '07030012223', NULL, 0, 0, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-04 23:16:12', NULL, 0),
(49, 'Abisola', 'Olowe', NULL, 'bslash90@yahoo.com', '', '07038409739', '09024002000', 0, 0, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-04 23:16:12', NULL, 0),
(50, 'Bukola', 'Kolade', NULL, 'tessybukkie@yahoo.com', '', '08069027132', NULL, 0, 0, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-04 23:16:12', NULL, 0),
(51, 'Rofiat', 'abdulazeez', NULL, 'rofiatabdul@gmail.com', '', '08034498798', NULL, 0, 0, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-04 23:16:12', NULL, 0),
(52, 'Awobotu', 'omowunmi', NULL, 'omocheezy@yahoo.com', '', '07068392470', '07033268322', 0, 0, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-04 23:16:12', NULL, 0),
(53, 'Awobotu', 'omowunmi', NULL, 'omocheezy@gmail.com', '', '07068392470', '07033268322', 0, 0, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-04 23:16:12', NULL, 0),
(54, 'Ogunsanya', 'Nelson', NULL, 'ogunsanya_abiodunnelson@yahoo.com', '', '08066295989', '08027028781', 0, 0, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-04 23:16:12', NULL, 0),
(55, 'francis', 'Euzebio', NULL, 'francis.euzebio@yahoo.com', '', '07988764008', NULL, 0, 0, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-04 23:16:12', NULL, 0),
(56, 'Suraju', 'Arogundade', NULL, 'Sarogundade@yahoo.com', '', '00912404639853', '00912404639853', 0, 0, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-04 23:16:12', NULL, 0),
(57, 'nosa', 'o', NULL, 'ogbemski@yahoo.co.uk', '', '08061352555', NULL, 0, 0, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-04 23:16:12', NULL, 0),
(58, 'Akinola', 'Sawyerr', NULL, 'a_sawyerr@yahoo.co.uk', '', '07055238880', NULL, 0, 0, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-04 23:16:12', NULL, 0),
(59, 'Godwin', 'Anthony', NULL, 'Nsisong2000@yahoo.co.uk', '', '07042689772', NULL, 0, 0, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-04 23:16:12', NULL, 0),
(60, 'Doyin', 'Ogunnoiki', NULL, 'ddoyinaquarious@gmail.com', '', '8033980242', '8090111122', 0, 0, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-04 23:16:12', NULL, 0),
(61, 'Adetutu', 'onadeko', NULL, 'onadekosunbo@yahoo.com', '', '08136138275', NULL, 0, 0, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-04 23:16:12', NULL, 0),
(62, 'Akindele', 'Age', NULL, 'Akin.afe@hotmail.com', '', '+447415335055', NULL, 0, 0, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-04 23:16:12', NULL, 0),
(63, 'SULAIMON', 'OLAOTAN', NULL, 'sulaimonolaotan@yahoo.com', '', '08027194743', NULL, 0, 0, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-04 23:16:12', NULL, 0),
(64, 'Kareem', 'Arogundade', NULL, 'Arogundadekareem@gmail.com', '', '+44 7427 690704', NULL, 0, 0, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-04 23:16:12', NULL, 0),
(65, 'Taiwo', 'Joseph', NULL, 'tobi4reel2001@gmail.com', '', '08036984014', '07039225786', 0, 0, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-04 23:16:12', NULL, 0),
(66, 'Motunrayo', 'Adebo', NULL, 'tumo2mo@yahoo.com', '', '08023444882', NULL, 0, 0, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-04 23:16:12', NULL, 0),
(67, 'Odunayo', 'Adams', NULL, 'adamsodunayo@gmail.com', '', '08082994560', NULL, 0, 0, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-04 23:16:12', NULL, 0),
(68, 'Oluwatobi', 'Samuel', NULL, 'tboypompin@gmail.com', '', '08104663302', NULL, 0, 0, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-04 23:16:12', NULL, 0),
(69, 'modinat', 'yusuf', NULL, 'aprise_17@yahoo.com', '', '08171114417', '08026235688', 0, 0, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-04 23:16:12', NULL, 0),
(70, 'ADEGBESAN', 'OLANREWAJU', NULL, 'dailysun2004@yahoo.com', '', '08032571367', '08032571367', 0, 0, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-04 23:16:12', NULL, 0),
(71, 'Tayelolu', 'hassan', NULL, 'mailboxfifty3@gmail.com', '', '08028442500', NULL, 0, 0, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-04 23:16:12', NULL, 0),
(72, 'Abdurrahman', 'Adebiyi', NULL, 'abdbaddude@gmail.com', '', '07063376867', '08051600166', 0, 0, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-04 23:16:12', NULL, 0),
(73, 'Don', 'Abdul-Kareem', NULL, 'kpapetson@gmail.com', '', '+2348090657799', NULL, 0, 0, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-04 23:16:12', NULL, 0),
(74, 'Uche', 'Adophy', NULL, 'adophyuche@gmail.com', '', '08053653935', '07035138365', 0, 0, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-04 23:16:12', NULL, 0),
(75, 'Nkechi', 'Emeruwa', NULL, 'kechiwam@gmail.com', '', '08029113957', NULL, 0, 0, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-04 23:16:12', NULL, 0),
(76, 'seni', 'olumole', NULL, 'seni.olumole@gmail.com', '', '08055137237', NULL, 0, 0, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-04 23:16:12', NULL, 0),
(77, 'Bukola', 'Oshinyemi', NULL, 'bukolaoshinyemi@gmail.com', '', '08029858731', NULL, 0, 0, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-04 23:16:12', NULL, 0),
(78, 'Funmilayo', 'Atolagbe', NULL, 'fatolagbe@hotmail.com', '', '07055555487', NULL, 0, 0, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-04 23:16:12', NULL, 0),
(79, 'Idara', 'Usoro', NULL, 'usoroidee@gmail.com', '', '07012084678', '07082224616', 0, 0, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-04 23:16:12', NULL, 0),
(80, 'will', 'leb', NULL, 'guillaume.leblond@essec.edu', '', '077088330546', NULL, 0, 0, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-04 23:16:12', NULL, 0),
(81, 'victoria', 'lukoh', NULL, 'victorialukoh@yahoo.com', '', '08077311043', '07045047720', 0, 0, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-04 23:16:12', NULL, 0),
(82, 'Abiola', 'Leshi', NULL, 'biolaleshi@yahoo.com', '', '08084334724', '07032345113', 0, 0, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-04 23:16:12', NULL, 0),
(83, 'Rasheedat', 'Olatunji', NULL, 'rasheedat.sekoni@yahoo.com', '', '+2348031848010', NULL, 0, 0, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-04 23:16:12', NULL, 0),
(84, 'Jumper', 'Ladipo', NULL, 'jumberladipo@gmail.com', '', '08107563212', '08180799754', 0, 0, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-04 23:16:12', NULL, 0),
(85, 'Tamara', 'Arogundade', NULL, 'tamara@qbsolutionslimited.com', '', '08032012512', NULL, 0, 0, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-04 23:16:12', NULL, 0),
(86, 'Balogun', 'ibrahim', NULL, 'Balogunibrahim93@gmail.com', '', '08182149944', '08163443493', 0, 0, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-04 23:16:12', NULL, 0),
(87, 'Atinuke', 'Iroko', NULL, 'atinukeiroko@gmail.com', '', '08086801464', NULL, 0, 0, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-04 23:16:12', NULL, 0),
(88, 'Omotola', 'Olukemi', NULL, 'omotolakemi@yahoo.com', '', '+2347034170161', NULL, 0, 0, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-04 23:16:12', NULL, 0),
(89, 'Tosin', 'Royal', NULL, 'gufrich@gmail.com', '', '07066295496', NULL, 0, 0, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-04 23:16:12', NULL, 0),
(90, 'Tosin', 'Royal', NULL, 'gulfrich@gmail.com', '', '07066295496', NULL, 0, 0, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-04 23:16:12', NULL, 0),
(91, 'Olawumi', 'Daniel', NULL, 'd.olawumi@yahoo.com', '', '08032290014', '08130040014', 0, 0, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-04 23:16:12', NULL, 0),
(92, 'jean', 'amougou', NULL, 'mballalucy87@yahoo.com', '', '08141226692', '08088032213', 0, 0, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-04 23:16:12', NULL, 0),
(93, 'Eme', 'Godwin', NULL, 'emelwoklaw@yahoo.com', '', '08033528928', '01234785', 0, 0, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-04 23:16:12', NULL, 0),
(94, 'Arogz', 'Remi', NULL, 'lebuyah@gmail.com', '', '08022228577', NULL, 0, 0, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-04 23:16:12', NULL, 0),
(95, 'omotolani', 'alamu', NULL, 'ebony_tee1@yahoo.com', '', '08056355261', NULL, 0, 0, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-04 23:16:12', NULL, 0),
(96, 'olalekan', 'benjamin-oguntade', NULL, 'ceolababy@yahoo.com', '', '+447447032034', NULL, 0, 0, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-04 23:16:12', NULL, 0),
(97, 'bobby', 'Atos', NULL, 'bazuz@bellsouth.net', '', '08073154434', NULL, 0, 0, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-04 23:16:12', NULL, 0),
(98, 'Abiola', 'Bolu', NULL, 'Abiolao@ebsafr.com', '', '08026754151', NULL, 0, 0, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-04 23:16:12', NULL, 0),
(99, 'Abies', 'Imonioro', NULL, 'Aevbuomwan@gmail.com', '', '08180108808', '08036666382', 0, 0, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-04 23:16:12', NULL, 0),
(100, 'Shola', 'Oyeniyi', NULL, 'Tescomagana6@gmail.com', '', '07034646873', '07053002779', 0, 0, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-04 23:16:12', NULL, 0),
(101, 'Robert', 'Nwaoliwe', NULL, 'mrgoodfood@yahoo.com', '', '08128773337', '08038614735', 0, 0, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-04 23:16:12', NULL, 0),
(102, 'Adedoyin', 'Ajayi', NULL, 'lamarmiteng@gmail.com', '', '08181189301', '08033344287', 0, 0, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-04 23:16:12', NULL, 0),
(103, 'Glory', 'Henshaw', NULL, 'gloryhenshaw4real@gmail.com', '', '08134544508', NULL, 0, 0, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-04 23:16:12', NULL, 0),
(104, 'bukola', 'aleshe', NULL, 'aleshebukola@gmail.com', '', '07063830997', NULL, 0, 0, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-04 23:16:12', NULL, 0),
(105, 'giwa', 'abdullahi', NULL, 'abdolla_luv18@yahoo.com', '', '08026948679', NULL, 0, 0, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-04 23:16:12', NULL, 0),
(106, 'Charity', 'Arinze', NULL, 'Charitya@ebsafr.com', '', '2348131182500', '2348131182500', 0, 0, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-04 23:16:12', NULL, 0),
(107, 'Ayodeji', 'Somoye', NULL, 'dejisomoye@gmail.com', '', '07088886836', NULL, 0, 0, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-04 23:16:12', NULL, 0),
(108, 'victor', 'udoh', NULL, 'vicfourmedicals@yahoo.com', '', '08097019486', NULL, 0, 0, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-04 23:16:12', NULL, 0),
(109, 'vincente', 'follitse', NULL, 'follitsav@gmail.com', '', '07038157647', NULL, 0, 0, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-04 23:16:12', NULL, 0),
(110, 'yemi', 'lap', NULL, 'yemlap@yahoo.com', '', '08023299946', NULL, 0, 0, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-04 23:16:12', NULL, 0),
(111, 'Kayode', 'Kay', NULL, 'kaymachine@yahoo.com', '', '08032293604', NULL, 0, 0, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-04 23:16:12', NULL, 0),
(112, 'Ifeoma', 'Oragwu', NULL, 'ifeomaoragwu@gmail.com', '', '07013942083', NULL, 0, 0, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-04 23:16:12', NULL, 0),
(113, 'tola', 'gbuyiro', NULL, 'tolagbuyiro@yahoo.com', '', '08087060008', NULL, 0, 0, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-04 23:16:12', NULL, 0),
(114, 'eyo', 'odion', NULL, 'eeyodiong@yahoo.com', '', '08023298988', NULL, 0, 0, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-04 23:16:12', NULL, 0),
(115, 'adeyemi', 'arosoye', NULL, 'adeyemiarosoye@gmail.com', '', '08094121071', NULL, 0, 0, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-04 23:16:12', NULL, 0),
(116, 'Chinedu', 'Onwedi', NULL, 'chinedu-cxonwed@yahoo.co.uk', '', '08083356842', NULL, 0, 0, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-04 23:16:12', NULL, 0),
(117, 'Banji', 'Ajisomo', NULL, 'danji_ajisomo@yahoo.com', '', '08034135441', NULL, 0, 0, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-04 23:16:12', NULL, 0),
(118, 'Banji', 'Ajisomo', NULL, 'banji_ajisomo@yahoo.com', '', '08034135441', NULL, 0, 0, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-04 23:16:12', NULL, 0),
(119, 'anitha', 'heamie', NULL, 'spicyheamie@yahoo.com', '', '07035226287', NULL, 0, 0, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-04 23:16:12', NULL, 0),
(120, 'emmanuel', 'lajidefun', NULL, 'emmanuellajidefun@gmail.com', '', '08022122972', NULL, 0, 0, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-04 23:16:12', NULL, 0),
(121, 'harrison', 'olile', NULL, 'olileharrison08@gmail.cm', '', '08038592655', NULL, 0, 0, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-04 23:16:12', NULL, 0),
(122, 'victor', 'udoh', NULL, 'vic4medical@yahoo.com', '', '08097019486', NULL, 0, 0, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-04 23:16:12', NULL, 0),
(123, 'victor', 'udoh', NULL, 'vic4medicals@yahoo.com', '', '08097019486', NULL, 0, 0, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-04 23:16:12', NULL, 0),
(124, 'jimmy', 'sanwo', NULL, 'jsanwo64@gmail.com', '', '08023542623', '08023542623', 0, 0, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-04 23:16:12', NULL, 0),
(125, 'Friday', 'Otanwa', NULL, 'friday.otanwa@gmail.com', '', '08036391204', NULL, 0, 0, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-04 23:16:12', NULL, 0),
(126, 'buki', 'olatundun', NULL, 'olatundunbuki@gmail.com', '', '08028474983', NULL, 0, 0, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-04 23:16:12', NULL, 0),
(127, 'gibson', 'panice', NULL, 'gibspanice99@yahoo.com', '', '08023139049', NULL, 0, 0, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-04 23:16:12', NULL, 0),
(128, 'olatundun', 'bukky', NULL, 'olatundunbuki@gamail.com', '', '08067719349', '08028474983', 0, 0, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-04 23:16:12', NULL, 0),
(129, 'kike', 'rubu', NULL, 'kikearubu@gmail.com', '', '08180285940', NULL, 0, 0, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-04 23:16:12', NULL, 0),
(130, 'oluchi', 'maria', NULL, 'enquiries.mariashouse@gmail.com', '', '08146862678', NULL, 0, 0, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-04 23:16:12', NULL, 0),
(131, 'peace', 'nduchukwwu', NULL, 'pnduchukwu@yahoo.com', '', '08032428742', NULL, 0, 0, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-04 23:16:12', NULL, 0),
(132, 'Abubakar', 'Ibrahim', NULL, 'Ibrahimabubakar209@gmail.com', '', '08061631556', '08061631556', 0, 0, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-04 23:16:12', NULL, 0),
(133, 'Ajimat', 'Sekoni', NULL, 'ajimatsekoni@yahoo.com', '', '08031848010', NULL, 0, 0, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-04 23:16:12', NULL, 0),
(134, 'bolaji', 'badejo', NULL, 'scarletigbo@yahoo.com', '', '08135998822', NULL, 0, 0, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-04 23:16:12', NULL, 0),
(135, 'bolaji', 'badejo', NULL, 'scarletigbo@gmail.com', '', '08135998822', NULL, 0, 0, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-04 23:16:12', NULL, 0),
(136, 'gbadamosi', 'funmillola', NULL, 'pemisiremylove@gmail.com', '', '08036339979', NULL, 0, 0, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-04 23:16:12', NULL, 0),
(137, 'shamusideen', 'Olaotan', NULL, 'shamusideen.molaotan@gmail.com', '', '08136725813', NULL, 0, 0, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-04 23:16:12', NULL, 0),
(138, 'shamusideen', 'olaotan', NULL, 'shamsudeenolaotan@gmail.com', '', '08136725813', NULL, 0, 0, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-04 23:16:12', NULL, 0),
(139, 'Temitope', 'Akinremi', NULL, 'akinremi.t@gmail.com', '', '08085321987', NULL, 0, 0, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-04 23:16:12', NULL, 0),
(140, 'chigozie', 'okezie kingsley', NULL, 'icekings6000@gmail.com', '', '08169541058', NULL, 0, 0, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-04 23:16:12', NULL, 0),
(141, 'uche', 'onuorah', NULL, 'onuorahuche@yahoo.co.uk', '', '08182118548', '08023465996', 0, 0, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-04 23:16:12', NULL, 0),
(142, 'Maryam', 'Aderemi', NULL, 'maryamaderemi@gmail.com', '', '08133511477', '08020512409', 0, 0, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-04 23:16:12', NULL, 0),
(143, 'richard', 'ogalu', NULL, 'rico4liverpool@yahoo.com', '', '08094824922', '08094824922', 0, 0, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-04 23:16:12', NULL, 0),
(144, 'Oluwatosin', 'Ogunsanwo', NULL, 'tosinsnazzyogunsanwo@yahoo.com', '', '08100444771', NULL, 0, 0, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-04 23:16:12', NULL, 0),
(145, 'damilola', 'adeleke', NULL, 'toyosi.adeleke@yahoo.com', '', '08033684761', '08055108362', 0, 0, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-04 23:16:12', NULL, 0),
(146, 'adebanjo', 'bukoa', NULL, 'bukkieluv72@yahoo.com', '', '08034444998', '090926746028', 0, 0, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-04 23:16:12', NULL, 0),
(147, 'Esther', 'Lukoh', NULL, 'estherlukoh@gmail.com', '', '08064766939', '08064766939', 0, 0, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-04 23:16:12', NULL, 0),
(148, 'iris', 'afangbedji', NULL, 'afangbedjiris@gmail.com', '', '08174120505', '08023034408', 0, 0, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-04 23:16:12', NULL, 0),
(149, 'Adejoke', 'Adeyan', NULL, 'Adeyan.adejoke@yahoo.com', '', '08136977537', '09025101761', 0, 0, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-04 23:16:12', NULL, 0),
(150, 'Adikat', 'Morolake', NULL, 'adikat.alaka@yahoo.com', '', '07066396560', NULL, 0, 0, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-04 23:16:12', NULL, 0),
(151, 'Maryjane', 'Oluwatoyin', NULL, 'Maryjaneabalokwu@yahoo.com', '', '08090751012', '07061106166', 0, 0, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-04 23:16:12', NULL, 0),
(152, 'debo', 'banjo', NULL, 'debbour2010@yahoo.com', '', '08032308448', '08032308448', 0, 0, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-04 23:16:12', NULL, 0),
(153, 'Tewogbola', 'Adebanjo', NULL, 'armellemoi@gmail.com', '', '08177587928', '08054161133', 0, 0, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-04 23:16:12', NULL, 0),
(154, 'toyin', 'ruth', NULL, 'toyinoyegunwa@yahoo.com', '', '08028359025', '08028359025', 0, 0, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-04 23:16:12', NULL, 0),
(155, 'Chisom', 'Ogbummuo', NULL, 'Chisomjoan@gmail.com', '', '07067325709', NULL, 0, 0, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-04 23:16:12', NULL, 0),
(156, 'Oreoluwa', 'Oduko', NULL, 'ore_oduko@yahoo.com', '', '08035250734', NULL, 0, 0, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-04 23:16:12', NULL, 0),
(157, 'kolawole', 'oyefeso', NULL, 'kolawoleoyefeso@gmail.com', '', '08033206295', '08022239122', 0, 0, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-04 23:16:12', NULL, 0),
(158, 'Temidayo', 'Abimbola', NULL, 'bims_t@yahoo.com', '', '08033262057', NULL, 0, 0, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-04 23:16:12', NULL, 0),
(159, 'vwede', 'edah', NULL, 'vwedeedah@yahoo.co.uk', '', '07065070436', '07011778372', 0, 0, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-04 23:16:12', NULL, 0),
(160, 'Sade', 'Ipaye', NULL, 'aleroipaye@gmail.com', '', '08087100655', NULL, 0, 0, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-04 23:16:12', NULL, 0),
(161, 'alakpodia', 'enifome', NULL, 'Enifome.a@gmail.com', '', '07082170941', '08161838464', 0, 0, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-04 23:16:12', NULL, 0),
(162, 'Adebanke', 'Adeniji-Fashola', NULL, 'dekunbifashola@gmail.com', '', '08069006332', '08083824376', 0, 0, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-04 23:16:12', NULL, 0),
(163, 'Ngozi', 'Opara', NULL, 'Engee_opra@yahoo.com', '', '08126812325', '07065030674', 0, 0, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-04 23:16:12', NULL, 0),
(164, 'faith', 'oke', NULL, 'faithoke20@yahoo.com', '', '08082962897', '08095202418', 0, 0, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-04 23:16:12', NULL, 0),
(165, 'Temi- tope', 'Aluko', NULL, 'Ti_aluko@yahoo.com', '', '08167391375', '08051686001', 0, 0, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-04 23:16:12', NULL, 0),
(166, 'Kara', 'Mosopefoluwa', NULL, 'Karamoshefoluwa@gmail.com', '', '07089313815', NULL, 0, 0, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-04 23:16:12', NULL, 0),
(167, 'alade-adesina', 'olutola', NULL, 'olutolaaa@yahoo.com', '', '08077580637', '08077580637', 0, 0, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-04 23:16:12', NULL, 0),
(168, 'Karen', 'Finite me', NULL, 'Karenginigeme@gmail.com', '', '08062398605', NULL, 0, 0, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-04 23:16:12', NULL, 0),
(169, 'Islamist', 'Ekenimoh', NULL, 'Tyilamosiekenimoh@gmail.com', '', '08179580731', NULL, 0, 0, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-04 23:16:12', NULL, 0),
(170, 'kenedy', 'tracy', NULL, 'kenedytracy@yahoo.com', '', '08096330332', '08096330332', 0, 0, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-04 23:16:12', NULL, 0),
(171, 'Abisoye', 'Odewole', NULL, 'Odewolebisoye@gmail.com', '', '08051998856', '09096500799', 0, 0, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-04 23:16:12', NULL, 0),
(172, 'Oyinlola', 'Ojugbele', NULL, 'oyinlolaojus@yahoo.com', '', '08097004586', '08154911113', 0, 0, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-04 23:16:12', NULL, 0),
(173, 'Juliana', 'Ejike', NULL, 'julianaejike@yahoo.com', '', '08147744534', NULL, 0, 0, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-04 23:16:12', NULL, 0),
(174, 'lawal', 'bukola', NULL, 'bukkylawal35@yahoo.com', '', '07037816645', '07037816645', 0, 0, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-04 23:16:12', NULL, 0),
(175, 'Ada', 'Iwe', NULL, 'katrinna_iwe@yahoo.com', '', '08166874607', '08166874607', 0, 0, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-04 23:16:12', NULL, 0),
(176, 'Olamide', 'Adeteye', NULL, 'Olamideadeteye@gmail.com', '', '08163963759', '07081534418', 0, 0, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-04 23:16:12', NULL, 0),
(177, 'sterphanie', 'maku', NULL, 'kiki_steph@yahoo.com', '', '08139159618', '08139159618', 0, 0, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-04 23:16:12', NULL, 0),
(178, 'Temitayo', 'Elebiyo', NULL, 'T.elebz@yahoo.com', '', '08134501888', NULL, 0, 0, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-04 23:16:12', NULL, 0),
(179, 'bimbo', 'fanimokun', NULL, 'abimbolafanimokun@yahoo.com', '', '+2348168956743', '+2348168956743', 0, 0, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-04 23:16:12', NULL, 0),
(180, 'Nonye', 'Okwuonu', NULL, 'nonye_okwuonu2005@yahoo.com', '', '08139004743', '08086281785', 0, 0, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-04 23:16:12', NULL, 0),
(181, 'Adelakun', 'Olalekan', NULL, 'lekanlinc@gmail.com', '', '08021024590', NULL, 0, 0, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-04 23:16:12', NULL, 0),
(182, 'Omotoyosi', 'Adetunji', NULL, 'omotoyosiadetunji@gmail.com', '', '07011588672', NULL, 0, 0, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-04 23:16:12', NULL, 0),
(183, 'Fatim', 'Doumbouya', NULL, 'Fatimdoumbouya@yahoo.com', '', '08134988379', NULL, 0, 0, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-04 23:16:12', NULL, 0),
(184, 'belema', 'wakama', NULL, 'belemawakama@gmail.com', '', '08135743984', NULL, 0, 0, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-04 23:16:12', NULL, 0),
(185, 'Aderonke', 'Lasisi', NULL, 'Aderonkelasisi@yahoo.com', '', '08187241756', NULL, 0, 0, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-04 23:16:12', NULL, 0),
(186, 'chiazor', 'uduh', NULL, 'chiazorpeace@yahoo.com', '', '07039409241', '08128972932', 0, 0, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-04 23:16:12', NULL, 0),
(187, 'igbudu', 'felix', NULL, 'flexyjeff2000@yahoo.com', '', '08025911133', NULL, 0, 0, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-04 23:16:12', NULL, 0),
(188, 'Johnson', 'Ehis', NULL, 'naijalord4life@gmail.com', '', '07038917312', NULL, 0, 0, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-04 23:16:12', NULL, 0),
(189, 'oyeyemi', 'olagbaiye', NULL, 'olagbaiyeo@yahoo.com', '', '08180045223', NULL, 0, 0, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-04 23:16:12', NULL, 0),
(190, 'iris', 'afangbedji', NULL, 'afangbedjiiris@gmail.com', '', '08074120505', '08023034408', 0, 0, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-04 23:16:12', NULL, 0),
(191, 'Gabriel', 'Oni', NULL, 'justgbemiro@gmail.com', '', '08102511164', '08102511164', 0, 0, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-04 23:16:12', NULL, 0),
(192, 'lungfa', 'ndam', NULL, 'lungfandam@gmail.com', '', '07032115378', '08038932260', 0, 0, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-04 23:16:12', NULL, 0),
(193, 'Basit', 'Arogundade', NULL, 'basita@ebsafr.com', '', '08032002512', '08182102198', 0, 0, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-04 23:16:12', NULL, 0),
(194, 'Remilekun', 'Ayeni', NULL, 'ayeniremi2001@yahoo.com', '', '08027297055', NULL, 0, 0, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-04 23:16:12', NULL, 0),
(195, 'Edu', 'Andrew', NULL, 'eduandrewsat@yahoo.com', '', '07033868155', '08185991363', 0, 0, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-04 23:16:12', NULL, 0),
(196, 'tewogbola', 'adebanjo', NULL, 'armellemoi93@gmail.com', '', '08177587928', '08054161133', 0, 0, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-04 23:16:12', NULL, 0),
(197, 'ife', 'ajadi', NULL, 'ify_4r_real@yahoo.com', '', '07032629551', NULL, 0, 0, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-04 23:16:12', NULL, 0),
(198, 'Uwa', 'Oga', NULL, 'shus4real@yahoo.com', '', '08087237631', '07034342184', 0, 0, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-04 23:16:12', NULL, 0),
(199, 'Subuola', 'Elufioye', NULL, 'temitopeelufioye@yahoo.com', '', '07057721851', NULL, 0, 0, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-04 23:16:12', NULL, 0),
(200, 'Angel', 'Ekuma', NULL, 'Rahfeneekuma@yahoo.com', '', '08064257296', NULL, 0, 0, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-04 23:16:12', NULL, 0),
(201, 'Isioma', 'Onuora', NULL, 'Onuorachukwufumnanya@gmail.com', '', '08160476023', '08160476023', 0, 0, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-04 23:16:12', NULL, 0),
(202, 'Angel', 'Udoh', NULL, 'Cassiudoh11@yahoo.com', '', '08089623280', NULL, 0, 0, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-04 23:16:12', NULL, 0),
(203, 'Mary', 'Ayotunde', NULL, 'Maryjoanne.ayotunde@yahoo.com', '', '07014255848', NULL, 0, 0, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-04 23:16:12', NULL, 0),
(204, 'Amarachi', 'Nwaobiala', NULL, 'Kingamy20@gmail.com', '', '08122220096', NULL, 0, 0, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-04 23:16:12', NULL, 0),
(205, 'Rabi', 'Hassan', NULL, 'Mannequin_mimmy16@yahoo.com', '', '08022341878', NULL, 0, 0, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-04 23:16:12', NULL, 0),
(206, 'Ruth', 'Titilopemi', NULL, 'abolarin_ruth@yahoo.com', '', '09096854785', '07051241830', 0, 0, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-04 23:16:12', NULL, 0),
(207, 'Sherifat', 'Omogiafo', NULL, 'Sa_omogiafo@yahoo.com', '', '08027853406', '08027853406', 0, 0, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-04 23:16:12', NULL, 0),
(208, 'Deborah', 'Abolarin', NULL, 'abolarin.d@gmail.com', '', '08092939879', '08139051772', 0, 0, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-04 23:16:12', NULL, 0),
(209, 'Funto', 'Musa', NULL, 'funtomusa@yahoo.com', '', '08160856740', NULL, 0, 0, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-04 23:16:12', NULL, 0),
(210, 'Idera', 'Ajisafe', NULL, 'Idera_ajisafe@yahoo.com', '', '08034156189', NULL, 0, 0, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-04 23:16:12', NULL, 0),
(211, 'Bolu', 'Kara', NULL, 'Bkaykara@gmail.cok', '', '08059393729', NULL, 0, 0, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-04 23:16:12', NULL, 0),
(212, 'Stephanie', 'Modilim', NULL, 'Modilimstephanie@gmail.com', '', '08175075076', '08175075076', 0, 0, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-04 23:16:12', NULL, 0),
(213, 'Itoro', 'Robert', NULL, 'Itoro90@gmail.com', '', '07067420247', NULL, 0, 0, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-04 23:16:12', NULL, 0),
(214, 'Titilope', 'Akinsola', NULL, 'Titilopeakinsola@yahoo.com', '', '07061581022', '07061581022', 0, 0, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-04 23:16:12', NULL, 0),
(215, 'Modupe', 'Edward-Mills', NULL, 'Millsmodupe@yahoo.com', '', '08102579130', '08080288090', 0, 0, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-04 23:16:12', NULL, 0),
(216, 'Elaami', 'Amaso', NULL, 'Amasoelaami@gmail.com', '', '08074671556', '07011342756', 0, 0, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-04 23:16:12', NULL, 0),
(217, 'Omonehmie', 'Okoeguale', NULL, 'aeezy101@yahoo.com', '', '08030471558', '07014085865', 0, 0, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-04 23:16:12', NULL, 0),
(218, 'Ogeolouwa', 'Afolabi', NULL, 'Ogeoluwafrancess@yahoo.com', '', '07088199138', NULL, 0, 0, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-04 23:16:12', NULL, 0),
(219, 'Chinyere', 'Edom', NULL, 'Chichiedom@yahoo.com', '', '07064466655', NULL, 0, 0, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-04 23:16:12', NULL, 0),
(220, 'Esther', 'Lawanson', NULL, 'Fleshistar@gmail.com', '', '08188699271', '0815073490', 0, 0, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-04 23:16:12', NULL, 0),
(221, 'Adetola', 'Jones', NULL, 'adetolajones@gmail.com', '', '08104872479', '09098971335', 0, 0, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-04 23:16:12', NULL, 0),
(222, 'Ngozi', 'Ononogbu', NULL, 'Pearlycrystal@ymail.com', '', '08163637333', '08179888753', 0, 0, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-04 23:16:12', NULL, 0),
(223, 'Halima', 'Mason', NULL, 'Leema.mason@gmail.com', '', '08030878818', NULL, 0, 0, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-04 23:16:12', NULL, 0),
(224, 'Johnson', 'Josephine', NULL, 'Josephinej67@yahoo.com', '', '08189149116', '08189149116', 0, 0, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-04 23:16:12', NULL, 0),
(225, 'Chiamaka', 'Amajuoyi', NULL, 'Chiamaka.amajuoyi@gmail.com', '', '08160250805', NULL, 0, 0, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-04 23:16:12', NULL, 0),
(226, 'Mobolaji', 'Olotu', NULL, 'tinukeo@hotmail.com', '', '07036308393', NULL, 0, 0, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-04 23:16:12', NULL, 0),
(227, 'Yetunde', 'Adelumola', NULL, 'Baddieyates@yahoo.com', '', '08088117957', NULL, 0, 0, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-04 23:16:12', NULL, 0),
(228, 'damilola', 'atiri', NULL, 'damilola.atiri@gmail.com', '', '08060815449', NULL, 0, 0, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-04 23:16:12', NULL, 0),
(229, 'ikyuma', 'aondo-akaa', NULL, 'iyahma@yahoo.com', '', '08033045313', NULL, 0, 0, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-04 23:16:12', NULL, 0),
(230, 'isaac', 'nnamdi', NULL, 'isaac_ekeoma@yahoo.com', '', '07031806515', '08059759229', 0, 0, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-04 23:16:12', NULL, 0),
(231, 'karimah', 'lawal', NULL, 'karimah.lawal@yahoo.com', '', '07082964648', '08183828772', 0, 0, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-04 23:16:12', NULL, 0),
(232, 'Adaeze', 'Madubuike', NULL, 'adaezemadubuike@yahoo.com', '', '2348036753879', '07040002887', 0, 0, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-04 23:16:12', NULL, 0),
(233, 'Osifeso', 'Anuoluwapo', NULL, 'Osifunjay@yahoo.com', '', '08068167555', '08068167555', 0, 0, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-04 23:16:12', NULL, 0),
(234, 'Nikki', 'Chinakwe', NULL, 'nikkichinakwe@gmail.com', '', '08032378940', '08186024540', 0, 0, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-04 23:16:12', NULL, 0),
(235, 'Ahmed', 'Oni', NULL, 'onyxhamed@yahoo.com', '', '08052986547', '08068287057', 0, 0, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-04 23:16:12', NULL, 0),
(236, 'ubong', 'brownson', NULL, 'ubong6666@gmail.com', '', '08138859939', '08138859939', 0, 0, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-04 23:16:12', NULL, 0),
(237, 'oladipupo', 'morenikeji', NULL, 'oladipupomorenikeji@gmail.com', '', '09028965478', '09028965478', 0, 0, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-04 23:16:12', NULL, 0),
(238, 'Omolade', 'Oderinde', NULL, 'flowerchild_y@hotmail.com', '', '0037152973', '08099876569', 0, 0, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-04 23:16:12', NULL, 0),
(239, 'Kazeem', 'Kareem', NULL, 'kmobol@yahoo.com', '', '08035804563', NULL, 0, 0, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-04 23:16:12', NULL, 0),
(240, 'korede', 'edih', NULL, 'cupidcore@yahoo.com', '', '08058323705', '08027171383', 0, 0, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-04 23:16:12', NULL, 0),
(241, 'Ifeanyichukwu', 'Nwachukwu', NULL, 'keenflashbzy@gmail.com', '', '08080504702', NULL, 0, 0, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-04 23:16:12', NULL, 0),
(242, 'adekemi', 'adewale', NULL, 'abyem78@yahoo.com', '', '07040001864', NULL, 0, 0, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-04 23:16:12', NULL, 0),
(243, 'Aisha', 'Adigun', NULL, 'oaadigun@gmail.com', '', '08103156116', '08120797998', 0, 0, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-04 23:16:12', NULL, 0),
(244, 'Ngozi', 'Blessing', NULL, 'Angelblessing572@yahoo.com', '', '09092139439', NULL, 0, 0, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-04 23:16:12', NULL, 0),
(245, 'Kayode', 'Peter', NULL, 'Kcie4mary@yahoo.com', '', '07042322924', NULL, 0, 0, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-04 23:16:12', NULL, 0),
(246, 'Kayzee', 'Peters', NULL, 'Kcie4peter@yahoo.com', '', '07042322924', NULL, 0, 0, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-04 23:16:12', NULL, 0),
(247, 'Ibukun', 'Ogbongbemiga', NULL, 'Ibk_ogbon@yahoo.com', '', '08071915175', NULL, 0, 0, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-04 23:16:12', NULL, 0),
(248, 'Sam', 'Sos', NULL, 'tito2010_4real@yahoo.com', '', '08054980601', '08054980601', 0, 0, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-04 23:16:12', NULL, 0),
(249, 'Kayito', 'Nwokedi', NULL, 'Kayitonwokedi@gmail.com', '', '08024246895', NULL, 0, 0, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-04 23:16:12', NULL, 0),
(250, 'shola', 'Akinloye', NULL, 'Akinloyeshola@hotmail.com', '', '07066234425', NULL, 0, 0, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-04 23:16:12', NULL, 0),
(251, 'Tobi', 'Ayoola', NULL, 'victoriaayoolah@gmail.com', '', '07062747571', NULL, 0, 0, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-04 23:16:12', NULL, 0),
(252, 'funbi', 'oluyisola', NULL, 'oluyisolafunbi@yahoo.com', '', '08069104385', NULL, 0, 0, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-04 23:16:12', NULL, 0),
(253, 'Ebus', 'E', NULL, 'fusionlogic@gmail.com', '', '08033332222', NULL, 0, 0, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-04 23:16:12', NULL, 0),
(254, 'Samuel', 'Ojo', NULL, 'ojoakinjidesamuel@gmail.com', '', '07033383932', NULL, 0, 0, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-04 23:16:12', NULL, 0),
(255, 'Stephen', 'Ogechi', NULL, 'adestephen20@gmail.com', '', '08032008890', '08032581535', 0, 0, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-04 23:16:12', NULL, 0),
(256, 'imonikhe', 'isaiah', NULL, 'imonikhe.isaiah@yayoo.com', '', '08139262765', '08139262765', 0, 0, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-04 23:16:12', NULL, 0),
(257, 'Ibukun', 'Akinpelu', NULL, 'Ibukun.akinpelu@yahoo.com', '', '08057012810', NULL, 0, 0, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-04 23:16:12', NULL, 0),
(258, 'Christabel', 'One amuse', NULL, 'Kristabelibeanusi@gmail.com', '', '08134547125', NULL, 0, 0, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-04 23:16:12', NULL, 0),
(259, 'Adeagbo', 'Festus', NULL, 'festusadeniy52i@yahoo.com', '', '08038404404', NULL, 0, 0, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-04 23:16:12', NULL, 0),
(260, 'Gerald', 'Ogwurumba', NULL, 'Geraldog25@yahoo.com', '', '07037725652', NULL, 0, 0, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-04 23:16:12', NULL, 0),
(261, 'Adeagbo', 'Festus', NULL, 'festusadeniy52@yahoo.com', '', '08038404404', NULL, 0, 0, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-04 23:16:12', NULL, 0),
(262, 'RichardS', 'Somade', NULL, 'richardsomade@yahoo.com', '', '08034975288', NULL, 0, 0, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-04 23:16:12', NULL, 0),
(263, 'Jerry', 'Ubah', NULL, 'jerryprudence@yahoo.com', '', '07033251924', NULL, 0, 0, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-04 23:16:12', NULL, 0),
(264, 'adewale', 'martins', NULL, 'walextradingcompany@gmail.com', '', '09098933144', '09098933144', 0, 0, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-04 23:16:12', NULL, 0),
(265, 'chinyere', 'nnadi', NULL, 'chichiimo28@gmail.com', '', '08030952243', NULL, 0, 0, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-04 23:16:12', NULL, 0),
(266, 'Omagbitse', 'Esisi', NULL, 'gbitse2000@yahoo.com', '', '08056241552', NULL, 0, 0, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-04 23:16:12', NULL, 0),
(267, 'En', 'Bee', NULL, 'Nelsonbenye@gmail.com', '', '08092239930', NULL, 0, 0, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-04 23:16:12', NULL, 0),
(268, 'Abdulazeez', 'Abebefe', NULL, 'abdulabebefe@gmail.com', '', '08030729344', '09098749274', 0, 0, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-04 23:16:12', NULL, 0),
(269, 'Sheriff', 'Akinbola', NULL, 'shareefakinbola1@yahoo.com', '', '008023394661', NULL, 0, 0, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-04 23:16:12', NULL, 0),
(270, 'Chiebuka', 'Obumselu', NULL, 'chy_obum@live.com', '', '08072913691', NULL, 0, 0, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-04 23:16:12', NULL, 0),
(271, 'emmanuel', 'nkansah', NULL, 'emma.nkansah15@gmail.com', '', '08038557050', NULL, 0, 0, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-04 23:16:12', NULL, 0),
(272, 'Wummy', 'Lawrence', NULL, 'ainawummy@gmail.com', '', '08037834617', '08037834617', 0, 0, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-04 23:16:12', NULL, 0),
(273, 'Rodrigue', 'Leroy', NULL, 'rodrigue.leroy@hellofood.com', '', '+2348889990000', NULL, 0, 0, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-04 23:16:12', NULL, 0),
(274, 'Daniella', 'Olieh', NULL, 'ogo_for_you@yahoo.com', '', '08035874497', '07046084443', 0, 0, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-04 23:16:12', NULL, 0),
(275, 'Omolara', 'Awosanya', NULL, 'Omolara.awosanya@yahoo.com', '', '08130816001', '08024590281', 0, 0, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-04 23:16:12', NULL, 0),
(276, 'Oyenike', 'Motunrayo', NULL, 'Tunrayola@gmail.com', '', '08034371626', NULL, 0, 0, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-04 23:16:12', NULL, 0),
(277, 'Nwabueze', 'Odimokwu', NULL, 'Odmk.int@live.com', '', '08167749308', NULL, 0, 0, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-04 23:16:12', NULL, 0),
(278, 'Monday', 'Igbu', NULL, 'monnyigbu@gmail.com', '', '08054144171', NULL, 0, 0, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-04 23:16:12', NULL, 0),
(279, 'Jenifer', 'Amaka', NULL, 'Love.jenifer18@yahoo.com', '', '08062311510', NULL, 0, 0, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-04 23:16:12', NULL, 0),
(280, 'Afolabi', 'Otubaga', NULL, 'Afolabi.otubaga@dangote.com', '', '08023170314', NULL, 0, 0, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-04 23:16:12', NULL, 0),
(281, 'Gbenga', 'Fakoya', NULL, 'ga.fakoya@gmail.com', '', '08075519297', '07033601411', 0, 0, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-04 23:16:12', NULL, 0),
(282, 'Peter', 'Utom', NULL, 'Peterutom75@gmail.com', '', '08101639352', '08173676083', 0, 0, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-04 23:16:12', NULL, 0),
(283, 'Yetunde', 'Saka', NULL, 'Limsy04@gmail.com', '', '07066000726', NULL, 0, 0, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-04 23:16:12', NULL, 0),
(284, 'ABIMBOLA', 'FOLASHADE', NULL, 'folawalemi2014@gmail.com', '', '08126008870', '08126008870', 0, 0, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-04 23:16:12', NULL, 0),
(285, 'Josephine', 'Israel', NULL, 'Phinnyisrael@gmail.com', '', '08035517504', NULL, 0, 0, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-04 23:16:12', NULL, 0),
(286, 'Benjamin', 'Bassey', NULL, 'benjamin.ooelaw@gmail.com', '', '08038629134', NULL, 0, 0, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-04 23:16:12', NULL, 0),
(287, 'victoria', 'olorunnisola', NULL, 'victoriaolorunnisola@gmail.com', '', '08105867700', NULL, 0, 0, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-04 23:16:12', NULL, 0),
(288, 'Sunday', 'Samson', NULL, 'Sunday.samson@yahoo.com', '', '07035675422', NULL, 0, 0, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-04 23:16:12', NULL, 0),
(289, 'ogechi', 'nwachukwu', NULL, 'oge.nwachukwu@yahoo.com', '', '08091464302', NULL, 0, 0, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-04 23:16:12', NULL, 0),
(290, 'donatus', 'akpan', NULL, 'dakpan@yahoo.com', '', '08029497585', '08039596535', 0, 0, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-04 23:16:12', NULL, 0),
(291, 'yetunde', 'akin', NULL, 'babyluvtijani@yahoo.com', '', '08103031506', NULL, 0, 0, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-04 23:16:12', NULL, 0),
(292, 'Williams', 'Obikwame', NULL, 'juwily@yahoo.com', '', '08060348787', '08075559147', 0, 0, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-04 23:16:12', NULL, 0),
(293, 'Tayo', 'Olanrewaju', NULL, 'tayosuper@yahoo.com', '', '08160075278', NULL, 0, 0, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-04 23:16:12', NULL, 0),
(294, 'Joy', 'Adeyemi', NULL, 'Joyabim@gmail.com', '', '08137756441', NULL, 0, 0, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-04 23:16:12', NULL, 0),
(295, 'Kemi', 'ONI', NULL, 'Kemisola.oni@yahoo.co.uk', '', '08085973653', NULL, 0, 0, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-04 23:16:12', NULL, 0),
(296, 'Opeyemi', 'Oke', NULL, 'Okeopeyemi@ymail.com', '', '08035029537', NULL, 0, 0, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-04 23:16:12', NULL, 0),
(297, 'chris', 'akagha', NULL, 'akagha.chris@yahoo.com', '', '08077556422', NULL, 0, 0, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-04 23:16:12', NULL, 0),
(298, 'Praise', 'Ajewole', NULL, 'praiseebun@gmail.com', '', '08054248874', NULL, 0, 0, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-04 23:16:12', NULL, 0),
(299, 'yewande', 'ade', NULL, 'ade_wande@yahoo.com', '', '08093264567', NULL, 0, 0, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-04 23:16:12', NULL, 0),
(300, 'opeyemi', 'adeoye', NULL, 'adeoyeope@gmail.com', '', '080265656402', NULL, 0, 0, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-04 23:16:12', NULL, 0),
(301, 'afe', 'afekhume', NULL, 'afebinafe@yahoo.com', '', '07013555371', NULL, 0, 0, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-04 23:16:12', NULL, 0),
(302, 'ibrahim', 'olaide', NULL, 'ibrahimolaide91@yahoo.com', '', 'â—â—â—â—â—â—â—', NULL, 0, 0, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-04 23:16:12', NULL, 0),
(303, 'olutola', 'oni', NULL, 'oniolutola@yahoo.com', '', '08032729765', NULL, 0, 0, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-04 23:16:12', NULL, 0),
(304, 'tunde', 'smith', NULL, 'modishmetier@gmail.com', '', '08023325717', NULL, 0, 0, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-04 23:16:12', NULL, 0),
(305, 'babatunde', 'awe', NULL, 'awe.babatunde03@gmail.com', '', '08068654805', NULL, 0, 0, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-04 23:16:12', NULL, 0),
(306, 'lawal', 'ayomide', NULL, 'lawalayomideadeyemi@gmail.com', '', '08164221726', '09021818101', 0, 0, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-04 23:16:12', NULL, 0),
(307, 'faramade', 'ayeni', NULL, 'bigbabygal101@yahoo.com', '', '08062252083', NULL, 0, 0, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-04 23:16:12', NULL, 0),
(308, 'busola', 'alabi', NULL, 'boafuwa@yahoo.comn', '', '080787855794', NULL, 0, 0, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-04 23:16:12', NULL, 0),
(309, 'Olatunbi', 'Module', NULL, 'Kolaayuba@yahoo.com', '', '07056846517', NULL, 0, 0, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-04 23:16:12', NULL, 0),
(310, 'Chaverkper', 'Tobias', NULL, 'Chavertor@yahoo.com', '', '09094805538', NULL, 0, 0, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-04 23:16:12', NULL, 0);
INSERT INTO `accounts_copy` (`id`, `firstname`, `lastname`, `gender`, `email`, `password`, `phone`, `phone2`, `point`, `status`, `image`, `token`, `admin_read_status`, `createdat`, `updatedat`, `deletedat`, `isdeleted`) VALUES
(311, 'Simon', 'Stephen', NULL, 'Stephendonsimon@yahoo.com', '', '08061657412', NULL, 0, 0, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-04 23:16:12', NULL, 0),
(312, 'Maver', 'Simon', NULL, 'Maversimon@yahoo.com', '', '08111165434', NULL, 0, 0, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-04 23:16:12', NULL, 0),
(313, 'Kazeem', 'Olalekan', NULL, 'Kazeemmolalekan@gmail.com', '', '08088386424', NULL, 0, 0, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-04 23:16:12', NULL, 0),
(314, 'Tutu', 'Emeji', NULL, 'tutuoru@yahoo.co.uk', '', '08067946569', NULL, 0, 0, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-04 23:16:12', NULL, 0),
(315, 'Enitan', 'Soyemi', NULL, 'ennyninny@gmail.com', '', '07033240038', NULL, 0, 0, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-04 23:16:12', NULL, 0),
(316, 'Alabi', 'Akeem', NULL, 'Akeem.alabi@aklablimited.com', '', '08057244444', NULL, 0, 0, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-04 23:16:12', NULL, 0),
(317, 'Comfort', 'Funniest', NULL, 'Imole@email.com', '', '08104145593', NULL, 0, 0, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-04 23:16:12', NULL, 0),
(318, 'Zainab', 'Funmilayo', NULL, 'Zainab@yahoo.com', '', '08083032581', NULL, 0, 0, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-04 23:16:12', NULL, 0),
(319, 'Abiola', 'Mary', NULL, 'Binary_14@yahoo.com', '', '08122686057', '07033887474', 0, 0, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-04 23:16:12', NULL, 0),
(320, 'Joshua', 'Olaniyan', NULL, 'hollajosh001@yahoo.com', '', '08023030447', NULL, 0, 0, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-04 23:16:12', NULL, 0),
(321, 'Ogunfeyimi', 'Afolabi', NULL, 'Afochelsea@yahoo.com', '', '08141155360', NULL, 0, 0, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-04 23:16:12', NULL, 0),
(322, 'Oloruntoba', 'Christopher', NULL, 'Christopheroloruntoba@gmail.com', '', '07038712582', NULL, 0, 0, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-04 23:16:12', NULL, 0),
(323, 'Ayodeji', 'Fatoki', NULL, 'Charles.fatoki@gmail.com', '', '08033747974', NULL, 0, 0, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-04 23:16:12', NULL, 0),
(324, 'Itunu', 'Dosekun', NULL, 'bumsy02@yahoo.com', '', '08024663314', NULL, 0, 0, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-04 23:16:12', NULL, 0),
(325, 'Elaye', 'Jasper', NULL, 'ellahumez@yahoo.cm', '', '08130850501', '07066547009', 0, 0, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-04 23:16:12', NULL, 0),
(326, 'Charles', 'Alex', NULL, 'Alexcharles@yahoo.com', '', '08143235702', NULL, 0, 0, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-04 23:16:12', NULL, 0),
(327, 'Adekunle', 'Adeyemi', NULL, 'Bankufx1@gmail.com', '', '080333486665', NULL, 0, 0, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-04 23:16:12', NULL, 0),
(328, 'Adeniyi', 'Seriki', NULL, 'seriki4med@hotmail.com', '', '08027887773', NULL, 0, 0, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-04 23:16:12', NULL, 0),
(329, 'Adeniyi', 'Seriki', NULL, 'seriki4med@icloud.com', '', '08027887773', NULL, 0, 0, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-04 23:16:12', NULL, 0),
(330, 'Omotayo', 'Seriki', NULL, 'barakatalabi@yahoo.com', '', '08034663126', NULL, 0, 0, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-04 23:16:12', NULL, 0),
(331, 'Ikenna', 'Agbasimalo', NULL, 'ikmich@yahoo.com', '', '08033971712', NULL, 0, 0, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-04 23:16:12', NULL, 0),
(332, 'Omokaro', 'Khare', NULL, 'Omokarokhare@gmail.com', '', '08062578665', NULL, 0, 0, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-04 23:16:12', NULL, 0),
(333, 'Felix', 'Mesio', NULL, 'Felixmesio@gmail.com', '', '08039683946', NULL, 0, 0, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-04 23:16:12', NULL, 0),
(334, 'Tony', 'Asije', NULL, 'Asije.anthony@gmail.com', '', '07065386050', NULL, 0, 0, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-04 23:16:12', NULL, 0),
(335, 'Tomiwa', 'Obadofin', NULL, 'Tomiwa.tosi@yahoo.com', '', '08112142441', '08162751235', 0, 0, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-04 23:16:12', NULL, 0),
(336, 'Ishmael', 'Ebhodaghe', NULL, 'ishmaeldaghe@hotmail.com', '', '08189488888', NULL, 0, 0, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-04 23:16:12', NULL, 0),
(337, 'David', 'Ogunsola', NULL, 'Dafidis@yahoo.com', '', '08022228857', NULL, 0, 0, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-04 23:16:12', NULL, 0),
(338, 'olakunle', 'salu', NULL, 'Saluchi@gmail.com', '', '08034021543', NULL, 0, 0, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-04 23:16:12', NULL, 0),
(339, 'Olamide', 'Laja', NULL, 'Lasupoo@gmail.com', '', '08106145760', NULL, 0, 0, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-04 23:16:12', NULL, 0),
(340, 'Juliet', 'Chisom', NULL, 'Juchipoke@gmail.com', '', '08038652995', NULL, 0, 0, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-04 23:16:12', NULL, 0),
(341, 'Fadekemi', 'Kristina', NULL, 'Onakoyafadekemi@yahoo.com', '', '08122454587', NULL, 0, 0, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-04 23:16:12', NULL, 0),
(342, 'Oladotun', 'Alade', NULL, 'Dortmahn@gmail.com', '', '08137872728', NULL, 0, 0, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-04 23:16:12', NULL, 0),
(343, 'Vivian', 'Osekwe', NULL, 'Divido3@yahoo.com', '', '08022316510', '08098329699', 0, 0, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-04 23:16:12', NULL, 0),
(344, 'Hamza', 'Adisa', NULL, 'Hadisa@trinity.edu', '', '07053087321', NULL, 0, 0, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-04 23:16:12', NULL, 0),
(345, 'Bibiresanmi', 'otitoloju', NULL, 'bibi_otito@yahoo.com', '', '08026787612', '08066443135', 0, 0, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-04 23:16:12', NULL, 0),
(346, 'Tomisin', 'Uwa', NULL, 'Silverbabra@yahoo.com', '', '08183347536', NULL, 0, 0, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-04 23:16:12', NULL, 0),
(347, 'Durosomo', 'Ibitayo', NULL, 'Legallytee@yahoo.com', '', '08090800290', NULL, 0, 0, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-04 23:16:12', NULL, 0),
(348, 'Soji', 'Kukoyi', NULL, 'Sojukukoyi@yahoo.com', '', '08178033398', NULL, 0, 0, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-04 23:16:12', NULL, 0),
(349, 'Rebecca', 'Okhimamhe', NULL, 'rebokhis@yahoo.co.uk', '', '08039692669', NULL, 0, 0, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-04 23:16:12', NULL, 0),
(350, 'peggy', 'abel', NULL, 'billypeggy53@yahoo.com', '', '08169307338', NULL, 0, 0, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-04 23:16:12', NULL, 0),
(351, 'Cynthia', 'Ezegbu', NULL, 'Gistwitcynty@yahoo.co.uk', '', '07032307690', NULL, 0, 0, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-04 23:16:12', NULL, 0),
(352, 'Temitope', 'Oguntade', NULL, 'tope.oguntade@gmail.com', '', '08030463676', NULL, 0, 0, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-04 23:16:12', NULL, 0),
(353, 'Oluwaseun', 'Adegbiji', NULL, 'adeoluoyejohn@yahoo.com', '', '07035674907', NULL, 0, 0, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-04 23:16:12', NULL, 0),
(354, 'killmer', 'ekowa', NULL, 'emekaekowa@yahoo.com', '', '08037325385', NULL, 0, 0, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-04 23:16:12', NULL, 0),
(355, 'Bukky', 'Bello', NULL, 'bookkeybells@gmail.com', '', '08086363970', NULL, 0, 0, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-04 23:16:12', NULL, 0),
(356, 'olamide', 'Obadofin', NULL, 'olamideobadofin@yahoo.com', '', '08033060405', NULL, 0, 0, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-04 23:16:12', NULL, 0),
(357, 'Yetunde', 'Dabiri', NULL, 'Yetunde_dabiri@yahoo.com', '', '0803305050300', '08025638960', 0, 0, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-04 23:16:12', NULL, 0),
(358, 'dupe', 'Obadofin', NULL, 'dupe.obadofin@yahoo.com', '', '08051487323', NULL, 0, 0, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-04 23:16:12', NULL, 0),
(359, 'Oluwakemi', 'Akinloye', NULL, 'khemmieweb@gmail.com', '', '08033455292', NULL, 0, 0, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-04 23:16:12', NULL, 0),
(360, 'Samuel', 'Olorundare', NULL, 'samuelolorundare@rocketmail.com', '', '07088780329', NULL, 0, 0, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-04 23:16:12', NULL, 0),
(361, 'Silas', 'Okwoche', NULL, 'silasreally@yahoo.com', '', '08103915629', NULL, 0, 0, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-04 23:16:12', NULL, 0),
(362, 'Shittu', 'Akeem', NULL, 'Akeem4alberta@gmail.com', '', '07031115085', NULL, 0, 0, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-04 23:16:12', NULL, 0),
(363, 'Blessing', 'Onokpite', NULL, 'blessing.onokpite@gmail.com', '', '08086920480', '09038946593', 0, 0, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-04 23:16:12', NULL, 0),
(364, 'toyin', 'fakorede', NULL, 'toyinfak@yahoo.com', '', '07064410300', NULL, 0, 0, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-04 23:16:12', NULL, 0),
(365, 'stella', 'adeseye', NULL, 'stellaadeseye@yahoo.com', '', '08029994274', '0802994274', 0, 0, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-04 23:16:12', NULL, 0),
(366, 'Olajumoke', 'Olawoyin', NULL, 'Kaffie09@yahoo.com', '', '08077927292', '08087306699', 0, 0, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-04 23:16:12', NULL, 0),
(367, 'Igho', 'Efevoghor', NULL, 'ighoyefe@yahoo.com', '', '08083277219', '08033040175', 0, 0, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-04 23:16:12', NULL, 0),
(368, 'ofegbu', 'oladuni', NULL, 'oladunni.ofegbu@gmail.com', '', '08033157658', NULL, 0, 0, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-04 23:16:12', NULL, 0),
(369, 'Gbemi', 'Oduntan', NULL, 'gbemistic@gmail.com', '', '08023141841', NULL, 0, 0, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-04 23:16:12', NULL, 0),
(370, 'Funmi', 'Yussuff', NULL, 'Phummyzx@yahoo.com', '', '08023607951', '08023607951', 0, 0, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-04 23:16:12', NULL, 0),
(371, 'Modeenat', 'Bioshogun', NULL, 'talk_2_deenah@yahoo.com', '', '08023109735', NULL, 0, 0, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-04 23:16:12', NULL, 0),
(372, 'Kemi', 'Bello', NULL, 'kemibello@yahoomail.com', '', '08023109735', NULL, 0, 0, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-04 23:16:12', NULL, 0),
(373, 'Tope', 'Adu', NULL, 'Aduoluwatope@yahoo.com', '', '08034740214', NULL, 0, 0, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-04 23:16:12', NULL, 0),
(374, 'Segun', 'Lafup', NULL, 'Segunshow23@gmail.com', '', '08099003333', NULL, 0, 0, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-04 23:16:12', NULL, 0),
(375, 'Rachael', 'Adejobi', NULL, 'Racheladejobi90@gmail.com', '', '07036552322', NULL, 0, 0, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-04 23:16:12', NULL, 0),
(376, 'Dami', 'Dare', NULL, 'Subair_damilola@yahoo.com', '', '08168878202', NULL, 0, 0, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-04 23:16:12', NULL, 0),
(377, 'Olaoluwa', 'Oshobu', NULL, 'olaoluwaoshobu@gmail.com', '', '08055567789', NULL, 0, 0, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-04 23:16:12', NULL, 0),
(378, 'Qudus', 'Sokunbi', NULL, 'Qustidamus@yahoo.com', '', '08032394212', NULL, 0, 0, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-04 23:16:12', NULL, 0),
(379, 'Michael', 'Olamilekan', NULL, 'gbolamik@yahoo.com', '', '08036516534', NULL, 0, 0, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-04 23:16:12', NULL, 0),
(380, 'Abimbola', 'Binuyo', NULL, 'abimbola.binuyo@yahoo.co.uk', '', '08066771798', NULL, 0, 0, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-04 23:16:12', NULL, 0),
(381, 'Femi', 'Daramola', NULL, 'femi_daramola@yahoo.com', '', '08029519107', NULL, 0, 0, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-04 23:16:12', NULL, 0),
(382, 'Dolapo', 'Adu', NULL, 'Dolapoadu@gmail.com', '', '07060516018', '07060516018', 0, 0, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-04 23:16:12', NULL, 0),
(383, 'bimbo', 'sanni', NULL, 'bimboakinsanya5@yahoo.com', '', '080267906753', NULL, 0, 0, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-04 23:16:12', NULL, 0),
(384, 'Olumide', 'ikusedun', NULL, 'lummysedun@gmail.com', '', '08035841144', '08028995632', 0, 0, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-04 23:16:12', NULL, 0),
(385, 'Tamunomieibi', 'Oriala', NULL, 'makeithappen_4real@yahoo.com', '', '08059800832', NULL, 0, 0, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-04 23:16:12', NULL, 0),
(386, 'Abduljelil', 'Adebola', NULL, 'Iiyaniroh@yahoo.com', '', '08064120645', '07057627862', 0, 0, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-04 23:16:12', NULL, 0),
(387, 'Abduljelil', 'Adebola', NULL, 'iyaniroh@yahoo.com', '', '08064120645', '07057627862', 0, 0, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-04 23:16:12', NULL, 0),
(388, 'Chukwudi', 'chineme', NULL, 'picejay@yahoo.com', '', '08037027002', NULL, 0, 0, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-04 23:16:12', NULL, 0),
(389, 'Olubunmi Aisha', 'Olusui', NULL, 'bunmioks@yahoo.com', '', '08060218940', NULL, 0, 0, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-04 23:16:12', NULL, 0),
(390, 'PRECIOUS', 'SOKARI', NULL, 'precioussokari0@gmail.com', '', '08160146381', '08034675447', 0, 0, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-04 23:16:12', NULL, 0),
(391, 'oluwaseyi', 'olukemi', NULL, 'oluwaseyi.bola@gmail.com', '', '07030585463', '08029702334', 0, 0, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-04 23:16:12', NULL, 0),
(392, 'Olanrewaju', 'Ajibola', NULL, 'k3j4n8@mail.com', '', '08168910377', NULL, 0, 0, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-04 23:16:12', NULL, 0),
(393, 'kike', 'ebz', NULL, 'hauwashodunke@gmail.com', '', '08023714483', '08023714483', 0, 0, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-04 23:16:12', NULL, 0),
(394, 'Chigozie', 'Sunday', NULL, 'berrie_011@yahoo.com', '', '08056957293', '07066360780', 0, 0, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-04 23:16:12', NULL, 0),
(395, 'Konum', 'Elebuwa', NULL, 'Konum@live.com', '', '09091271476', '08188792097', 0, 0, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-04 23:16:12', NULL, 0),
(396, 'yemi', 'Kolawole', NULL, 'yemiwale@yahoo.co.uk', '', '08094033084', '08087184856', 0, 0, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-04 23:16:12', NULL, 0),
(397, 'taiwo', 'akindele', NULL, 'taiwoakindele@yahoo.com', '', '07034006678', '08023192895', 0, 0, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-04 23:16:12', NULL, 0),
(398, 'Tokunbo', 'Tosin-Famakinwa', NULL, 'tokunbo.adewale@anakle.com', '', '07031231858', '07031231858', 0, 0, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-04 23:16:12', NULL, 0),
(399, 'Olayinka', 'Ogunlere', NULL, 'yinkajayi2003@yahoo.com', '', '07034717507', NULL, 0, 0, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-04 23:16:12', NULL, 0),
(400, 'Lucky', 'Nwokorie', NULL, 'uchemillions@yahoo.com', '', '09039292289', NULL, 0, 0, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-04 23:16:12', NULL, 0),
(401, 'Baby', 'Mukoro', NULL, 'babymukoro@gmail.com', '', '08032004230', NULL, 0, 0, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-04 23:16:12', NULL, 0),
(402, 'Handsome', 'Chris', NULL, 'Hanzyung@gmail.com', '', '08184917667', '08103313108', 0, 0, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-04 23:16:12', NULL, 0),
(403, 'Andrew', 'Ameh', NULL, 'Aia_gp@yahoo.com', '', '08090211619', NULL, 0, 0, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-04 23:16:12', NULL, 0),
(404, 'Victoria', 'Ekenimoh', NULL, 'Vekenimoh@yahoo.com', '', '08022227304', NULL, 0, 0, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-04 23:16:12', NULL, 0),
(405, 'chinedu', 'anochiri', NULL, 'ano_ace@yahoo.com', '', '08022222066', NULL, 0, 0, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-04 23:16:12', NULL, 0),
(406, 'Funmilayo', 'Omoliki', NULL, 'funmiomoliki@gmail.com', '', '08067746170', NULL, 0, 0, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-04 23:16:12', NULL, 0),
(407, 'Olufunke', 'Mukandas', NULL, 'funkemukandas@gmail.com', '', '08034418929', '07031122770', 0, 0, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-04 23:16:12', NULL, 0),
(408, 'Winnie', 'Amosu', NULL, 'Winifred.monnie@gmail.com', '', '2347064174300', NULL, 0, 0, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-04 23:16:12', NULL, 0),
(409, 'Jumoke', 'Ajala', NULL, 'Jayluyi@gmail.com', '', '08139615992', '08091316327', 0, 0, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-04 23:16:12', NULL, 0),
(410, 'Asiedu', 'Fred', NULL, 'Asiedufr@yahoo.com', '', '0249310443', '0249310443', 0, 0, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-04 23:16:12', NULL, 0),
(411, 'anslem', 'ordia', NULL, 'anslemordia@gmail.com', '', '08030494422', NULL, 0, 0, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-04 23:16:12', NULL, 0),
(412, 'Demilade', 'Adekolu', NULL, 'demiladeadekolu@gmail.com', '', '+2348188635961', '+2348188635961', 0, 0, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-04 23:16:12', NULL, 0),
(413, 'queen', 'ampah', NULL, 'ayekwa.ampah@gmail.com', '', '08100694109', NULL, 0, 0, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-04 23:16:12', NULL, 0),
(414, 'Aremu', 'kafayat', NULL, 'kafayataremu@gmail.com', '', '08039162850', NULL, 0, 0, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-04 23:16:12', NULL, 0),
(415, 'tayo', 'dongo', NULL, 'tayodongo1@yahoo.com', '', '08178773937', NULL, 0, 0, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-04 23:16:12', NULL, 0),
(416, 'dickson', 'okpe', NULL, 'okpedickson@yahoo.com', '', '08056513454', '08056513454', 0, 0, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-04 23:16:12', NULL, 0),
(417, 'Ayo', 'Lasisi', NULL, 'ayoo31@yahoo.com', '', '08183701095', NULL, 0, 0, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-04 23:16:12', NULL, 0),
(418, 'Olaitan', 'Akinbode', NULL, 'Olaitan.ea@gmail.com', '', '08035001077', '08035001077', 0, 0, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-04 23:16:12', NULL, 0),
(419, 'motunrayo', 'odu', NULL, 'motunrayo.odu@hotmail.com', '', '08101882018', NULL, 0, 0, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-04 23:16:12', NULL, 0),
(420, 'Chinedu', 'madu', NULL, 'chinedu.epuechi@zenithbank.com', '', '+2347035030164', '+2347035030164', 0, 0, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-04 23:16:12', NULL, 0),
(421, 'boluwaatifee', 'akinyemi', NULL, 'akinyemi.clajournalists@gmail.com', '', '08176374132', NULL, 0, 0, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-04 23:16:12', NULL, 0),
(422, 'faith', 'obaze', NULL, 'faithadaobaze@yahoo.co.uk', '', '08166720717', NULL, 0, 0, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-04 23:16:12', NULL, 0),
(423, 'Dammy', 'Emuze', NULL, 'damilolaemuze@yahoo.com', '', '08188559476', NULL, 0, 0, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-04 23:16:12', NULL, 0),
(424, 'deola', 'ibitola', NULL, 'getdeolahere@yahoo.com', '', '2347085519435', NULL, 0, 0, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-04 23:16:12', NULL, 0),
(425, 'Adeola', 'Arije', NULL, 'aarije969@gmail.com', '', '08029293178', '08145466046', 0, 0, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-04 23:16:12', NULL, 0),
(426, 'nkeiru', 'nwaobiala', NULL, 'nkeiru.n@1musicnetworks.com', '', '08064551974', '08064551974', 0, 0, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-04 23:16:12', NULL, 0),
(427, 'aisha', 'olamide', NULL, 'olashanty@yahoo.com', '', '08120797998', NULL, 0, 0, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-04 23:16:12', NULL, 0),
(428, 'Omotomilola', 'Abiodun', NULL, 'tomiabiodun@yahoo.com', '', '08033358819', '08088571664', 0, 0, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-04 23:16:12', NULL, 0),
(429, 'chisom jeffrey', 'anyando', NULL, 'chisomjeffrey1998@yahoo.com', '', '09094940451', NULL, 0, 0, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-04 23:16:12', NULL, 0),
(430, 'opeyemi', 'adetibs', NULL, 'realopsy@yahoo.com', '', '07066893606', NULL, 0, 0, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-04 23:16:12', NULL, 0),
(431, 'Odini', 'Oriseh', NULL, 'omo525@yahoo.com', '', '08033881592', '08059774733', 0, 0, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-04 23:16:12', NULL, 0),
(432, 'Rotimi', 'Ajasa', NULL, 'rothmanx2000@yahoo.com', '', '07039125104', NULL, 0, 0, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-04 23:16:12', NULL, 0),
(433, 'mobolaji', 'oduyoye', NULL, 'guzzls@yahoo.co.uk', '', '08023212759', NULL, 0, 0, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-04 23:16:12', NULL, 0),
(434, 'ogechi', 'emegho', NULL, 'ogemms@gmail.com', '', '08033356100', NULL, 0, 0, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-04 23:16:12', NULL, 0),
(435, 'Adaora', 'Aroh', NULL, 'ADARH9@gmail.com', '', '07050997810', '07050997810', 0, 0, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-04 23:16:12', NULL, 0),
(436, 'LOLA', 'MATESUN', NULL, 'Lolatantoluwa@yahoo.com', '', '08052150438', NULL, 0, 0, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-04 23:16:12', NULL, 0),
(437, 'Temiloluwa', 'Sotubo', NULL, 'seny29@yahoo.com', '', '09025179516', '08098247995', 0, 0, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-04 23:16:12', NULL, 0),
(438, 'Abisoye', 'Odewole', NULL, 'madmenops@gmail.com', '', '09096500799', '08051998856', 0, 0, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-04 23:16:12', NULL, 0),
(439, 'N', 'Newton', NULL, 'newdenilank@hotmail.com', '', '08172428019', '08090211624', 0, 0, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-04 23:16:12', NULL, 0),
(440, 'bello', 'oluwadamilola', NULL, 'dahmylorlar@gmail.com', '', '08184019919', '08027612227', 0, 0, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-04 23:16:12', NULL, 0),
(441, 'Chioma', 'Achebe', NULL, 'chiomachebe@yahoo.com', '', '08134430182', NULL, 0, 0, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-04 23:16:12', NULL, 0),
(442, 'michael', 'aguzie', NULL, 'maguzie@gmail.com', '', '08028750802', '08028750802', 0, 0, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-04 23:16:12', NULL, 0),
(443, 'Prince', 'Azubuike', NULL, 'princeazubuike@gmail.com', '', '08099445544', '08032004301', 0, 0, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-04 23:16:12', NULL, 0),
(444, 'Winifred', 'Inwang', NULL, 'inwanguyai@gmail.com', '', '08137828160', NULL, 0, 0, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-04 23:16:12', NULL, 0),
(445, 'Emeka', 'Uzowulu', NULL, 'uzowulue@gmail.com', '', '08098574398', '2348098574398', 0, 0, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-04 23:16:12', NULL, 0),
(446, 'EDMOND', 'ONOJA', NULL, 'EDMONOJA@GMAIL.COM', '', '08034356782', NULL, 0, 0, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-04 23:16:12', NULL, 0),
(447, 'olasumbo', 'osowo', NULL, 'sunnyosowo@gmail.com', '', '08059001655', NULL, 0, 0, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-04 23:16:12', NULL, 0),
(448, 'Alesinloye-king', 'pelumi', NULL, 'Alesinloyepelumi@yahoo.com', '', '08171920004', '08101107340', 0, 0, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-04 23:16:12', NULL, 0),
(449, 'candice', 'Sy-Onwuka', NULL, 'candy_syng@yahoo.com', '', '08083114263', NULL, 0, 0, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-04 23:16:12', NULL, 0),
(450, 'sam', 'akingboye', NULL, 'sam_akingboye@yahoo.com', '', '07058898341', NULL, 0, 0, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-04 23:16:12', NULL, 0),
(451, 'voke', 'ekokobe', NULL, 'vokeekokobe@gmail.com', '', '07012620498', NULL, 0, 0, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-04 23:16:12', NULL, 0),
(452, 'tayo', 'olofun', NULL, 'olofunta@yahoo.com', '', '07082286583', NULL, 0, 0, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-04 23:16:12', NULL, 0),
(453, 'bisi', 'badero', NULL, 'bisi_badero@yahoo.com', '', '08035477918', NULL, 0, 0, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-04 23:16:12', NULL, 0),
(454, 'ama', 'achonu', NULL, 'alexandra.achonu@gmail.com', '', '07063383933', NULL, 0, 0, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-04 23:16:12', NULL, 0),
(455, 'chidi', 'koldsweat', NULL, 'pnponlinebabystore@gmail.com', '', '08034682060', NULL, 0, 0, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-04 23:16:12', NULL, 0),
(456, 'temitayo', 'nathan', NULL, 'tayo_nat@yahoo.com', '', '08164691226', NULL, 0, 0, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-04 23:16:12', NULL, 0),
(457, 'Magnify', 'Adepena', NULL, 'Adepenamag@yahoo.com', '', '08146071061', NULL, 0, 0, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-04 23:16:12', NULL, 0),
(458, 'bolanle', 'adeola', NULL, 'bsfashionroom@gmail.com', '', '08028971495', NULL, 0, 0, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-04 23:16:12', NULL, 0),
(459, 'Afoma', 'Okwukaogu', NULL, 'Afomaonyejekwe@yahoo.com', '', '08037448782', NULL, 0, 0, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-04 23:16:12', NULL, 0),
(460, 'Damilola', 'Olusanya', NULL, 'Olusanya.damilola@gmail.com', '', '07087472640', NULL, 0, 0, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-04 23:16:12', NULL, 0),
(461, 'Adeola', 'Odusote', NULL, 'Dixiesapparel@gmail.com', '', '08077560633', NULL, 0, 0, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-04 23:16:12', NULL, 0),
(462, 'habiba', 'diaw', NULL, 'habibadiaw@gmail.com', '', '080282996432', NULL, 0, 0, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-04 23:16:12', NULL, 0),
(463, 'anita', 'nwosu', NULL, 'anitanwosu@gmail.com', '', '08146220489', NULL, 0, 0, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-04 23:16:12', NULL, 0),
(464, 'wumi', 'omidiji', NULL, 'woomediji@gmail.com', '', '07036727435', NULL, 0, 0, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-04 23:16:12', NULL, 0),
(465, 'kiki', 'Adesanya', NULL, 'kikiadesanya@ymail.com', '', '08090901985', NULL, 0, 0, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-04 23:16:12', NULL, 0),
(466, 'Pearl', 'Icy', NULL, 'Paliandu89@gmail.com', '', '07039338233', NULL, 0, 0, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-04 23:16:12', NULL, 0),
(467, 'ibrahim', 'momodu', NULL, 'iamomodu@yahoo.com', '', '08088381708', NULL, 0, 0, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-04 23:16:12', NULL, 0),
(468, 'Abimbola', 'Akande', NULL, 'Cruzwitbibi@yahoo.co.uk', '', '08036602706', '07088122755', 0, 0, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-04 23:16:12', NULL, 0),
(469, 'yetunde', 'shode', NULL, 'yetunde.shode@gmail.com', '', '08182442468', NULL, 0, 0, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-04 23:16:12', NULL, 0),
(470, 'Ayobami', 'Odedina', NULL, 'Ayobamiodedina@gmail.com', '', '08036602706', '07088122755', 0, 0, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-04 23:16:12', NULL, 0),
(471, 'Anita', 'Nnbuife', NULL, 'nnabuifeanita@yahoo.com', '', '08094705960', NULL, 0, 0, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-04 23:16:12', NULL, 0),
(472, 'adetutu', 'ogunsowo', NULL, 'tutunoni@gmail.com', '', '08033593760', '08033593760', 0, 0, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-04 23:16:12', NULL, 0),
(473, 'Darlyn', 'Okojie', NULL, 'Darlzkojie@gmail.com', '', '08153806478', NULL, 0, 0, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-04 23:16:12', NULL, 0),
(474, 'Abby', 'Rockson', NULL, 'abiola.rockson@yahoo.com', '', '08181041478', NULL, 0, 0, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-04 23:16:12', NULL, 0),
(475, 'Henrietta', 'Mom odd', NULL, 'adesetta@gmail.com', '', '08089039812', '08070515725', 0, 0, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-04 23:16:12', NULL, 0),
(476, 'Goke', 'Fowode', NULL, 'seyefowode@gmail.com', '', '07084532690', NULL, 0, 0, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-04 23:16:12', NULL, 0),
(477, 'Adedapo', 'Oniru', NULL, 'daponiru@gmail.com', '', '08091895708', '08033047523', 0, 0, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-04 23:16:12', NULL, 0),
(478, 'oge', 'oge', NULL, 'ogemm5@gmail.com', '', '08033356100', '08055633781', 0, 0, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-04 23:16:12', NULL, 0),
(479, 'Stephanie', 'chidinma', NULL, 'chidinmastephanie57@gmail.com', '', '09099254560', NULL, 0, 0, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-04 23:16:12', NULL, 0),
(480, 'adiat', 'bashorun', NULL, 'adiatbashorun@hotmail.co.uk', '', '07784185539', NULL, 0, 0, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-04 23:16:12', NULL, 0),
(481, 'tairat', 'bashorun', NULL, 'tairatb@gmail.com', '', '0817860032', NULL, 0, 0, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-04 23:16:12', NULL, 0),
(482, 'Mariam', 'Bashorun', NULL, 'm_bashorun@hotmail.co.uk', '', '07970167402', NULL, 0, 0, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-04 23:16:12', NULL, 0),
(483, 'temilade', 'shoyinka', NULL, 'bummmy2005@yahoo.com', '', '08178484484', NULL, 0, 0, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-04 23:16:12', NULL, 0),
(484, 'Damilola', 'Adewunmi', NULL, 'damilolaadewunmi@outlook.com', '', '08094660985', NULL, 0, 0, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-04 23:16:12', NULL, 0),
(485, 'toyin', 'oyeledun', NULL, 'toyinoyeledun@yahoo.com', '', '08138559020', NULL, 0, 0, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-04 23:16:12', NULL, 0),
(486, 'adesuwaa', 'oseghe', NULL, 'adesuwaoseghe@gmail.com', '', '08032065065', NULL, 0, 0, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-04 23:16:12', NULL, 0),
(487, 'tayo', 'odunowo', NULL, 'tayo100@yahoo.com', '', '07033238838', NULL, 0, 0, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-04 23:16:12', NULL, 0),
(488, 'ogochukwu', 'nwachukwu', NULL, 'ogo@oandg.us', '', '08092838322', NULL, 0, 0, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-04 23:16:12', NULL, 0),
(489, 'JeNika', 'Mukoro', NULL, 'jenikapmukoro@me.com', '', '08133979889', NULL, 0, 0, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-04 23:16:12', NULL, 0),
(490, 'Ngozi', 'Ezimako', NULL, 'ngoziez@ymail.com', '', '08181451105', NULL, 0, 0, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-04 23:16:12', NULL, 0),
(491, 'Akinyemi', 'Sanya', NULL, 'gradeocservices@gmail.com', '', '08139721825', NULL, 0, 0, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-04 23:16:12', NULL, 0),
(492, 'Fadeyi', 'Olayinka', NULL, 'fadeyiolayinka@gmail.com', '', '08137896250', '08106181372', 0, 0, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-04 23:16:12', NULL, 0),
(493, 'jamila', 'Mohammed. A', NULL, 'jamilamohammedaudu@gmail.com', '', '09099256744', NULL, 0, 0, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-04 23:16:12', NULL, 0),
(494, 'Bipin', 'Prasad', NULL, 'mail2bipinprasad@gmail.com', '', '07602570227', '07602570227', 0, 0, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-04 23:17:32', NULL, 0),
(495, 'Semiire', 'Folorunso', NULL, 'semiire@yahoo.com', '', '08030567571', '08054954924', 0, 0, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-04 23:16:12', NULL, 0),
(496, 'michael', 'idah', NULL, 'midah2007@gmail.com', '', '08064675056', NULL, 0, 0, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-04 23:16:12', NULL, 0),
(497, 'Damien', 'Kehinde', NULL, 'kehindedamien@gmail.com', '', '08027569864', NULL, 0, 0, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-04 23:16:12', NULL, 0),
(498, 'Chinyere', 'Nwachukwu', NULL, 'nwachukwu_chinyere@hotmail.com', '', '07069725225', NULL, 0, 0, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-04 23:16:12', NULL, 0),
(499, 'peter', 'agwu', NULL, 'agupetert75@gmail.com', '', '0817531055', '07018088818', 0, 0, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-04 23:17:13', NULL, 0),
(500, 'Abu', 'Abu', NULL, 'abu@hotmail.com', '', '07023280626', NULL, 0, 0, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-04 23:16:12', NULL, 0),
(501, 'AbU', 'Abu', NULL, 'abu.abubakar@hotmail.com', '', '08187303656', NULL, 0, 0, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-04 23:16:12', NULL, 0),
(502, 'Nwando', 'Ozobia', NULL, 'ndozobia@gmail.com', '', '07034492828', '08183444000', 0, 0, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-04 23:16:12', NULL, 0),
(503, 'odunayo', 'adesanya', NULL, 'temmie_bworm@yahoo.com', '', '08085416129', '08167574443', 0, 0, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-04 23:16:12', NULL, 0),
(504, 'Osariase', 'Idubor', NULL, 'osariase.idubor@gmail.com', '', '08033767742', NULL, 0, 0, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-04 23:16:12', NULL, 0),
(505, 'Ade', 'Mba', NULL, 'Ademba@gmail.com', '', '07022223232', NULL, 0, 0, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-04 23:16:12', NULL, 0),
(506, 'Anthony', 'Odu', NULL, 'antonyodu@gmail.com', '', '08145632564', '09090311929', 0, 0, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-04 23:16:12', NULL, 0),
(507, 'Funmi', 'Alonge', NULL, 'olufunmialonge@gmail.com', '', '08055822838', NULL, 0, 0, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-04 23:16:12', NULL, 0),
(508, 'vivian', 'okunbor', NULL, 'elenaomonuwa2@gmail.com', '', '+39 3208458563', NULL, 0, 0, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-04 23:16:12', NULL, 0),
(509, 'Rolake', 'Job', NULL, 'Morolakejob@gmail.com', '', '08099235702', NULL, 0, 0, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-04 23:16:12', NULL, 0),
(510, 'Kayode O', 'U', NULL, 'tosinodu@genewglobalconsult.com', '', '08023187033', '08023187033', 0, 0, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-04 23:16:12', NULL, 0),
(511, 'Kayode O', 'U', NULL, 'antonyodu@gmail2.com', '', '08023187033', '08023187033', 0, 0, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-04 23:20:51', NULL, 0),
(514, 'Olumide', 'Arokodare', NULL, 'oarokoda2re@primewealthcapital.com', '', '09090311929', '09090311929', 0, 0, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-04 23:16:12', NULL, 0),
(515, 'Olumide', 'Arokodare', NULL, 'oarokodare2@primewealthcapital.com', '', '09090311929', '09090311929', 0, 0, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-04 23:16:12', NULL, 0),
(516, 'Olumide', 'Arokodare', NULL, 'oarokodare3@primewealthcapital.com', '', '09090311929', '09090311929', 0, 0, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-04 23:16:12', NULL, 0),
(517, 'Raphael', 'Yemitan', NULL, 'raphaey@mtnnigeria.net', '', '08032003058', NULL, 0, 0, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-04 23:16:12', NULL, 0),
(518, 'Emeka', 'Uzowulu', NULL, 'euzowulu@yahoo.co.uk', '', '2348098574398', '2348098574398', 0, 0, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-04 23:16:12', NULL, 0),
(519, 'Andrew', 'Airelobhegbe', NULL, 'andrewairelobhegbe@gmail.com', '', '08165047290', NULL, 0, 0, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-04 23:16:12', NULL, 0),
(520, 'preye', 'marcus', NULL, 'preyedeals@gmail.com', '', '07038001097', NULL, 0, 0, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-04 23:16:12', NULL, 0),
(521, 'tobiloba', 'abby', NULL, 'tobifimiabby@gmail.com', '', '09096829237', '08081779438', 0, 0, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-04 23:16:12', NULL, 0),
(522, 'Adeola', 'Oyebola', NULL, 'Halloedah@gmail.com', '', '09090409765', NULL, 0, 0, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-04 23:16:12', NULL, 0),
(523, 'Maya', 'Arogundade', NULL, 'Mayaaro@hotmail.com', '', '078026380&8', NULL, 0, 0, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-04 23:16:12', NULL, 0),
(524, 'Somto', 'Ogbonna', NULL, 'sogbonna10@gmail.com', '', '08170587131', '09031190295', 0, 0, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-04 23:16:12', NULL, 0),
(525, 'UPL Events', '& Catering Service', NULL, 'universalperfectionltd@yahoo.com', '', '08109333210', '08109333210', 0, 0, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-04 23:16:12', NULL, 0),
(526, 'Rosemary', 'Etim', NULL, 'creamy189@gmail.com', '', '08089372797', NULL, 0, 0, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-04 23:16:12', NULL, 0),
(527, 'George', 'Ederard', NULL, 'zdrad@yahoo.com', '', '08066643999', '08023166918', 0, 0, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-04 23:16:12', NULL, 0),
(528, 'Elizabeth', 'onwodi', NULL, 'onwodi.elizabeth@gmail.com', '', '08169599064', NULL, 0, 0, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-04 23:16:12', NULL, 0),
(529, 'Jummai', 'Arome', NULL, 'iyearome@gmail.com', '', '08078430480', '08078430480', 0, 0, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-04 23:16:12', NULL, 0),
(530, 'Golden', 'Oluchukwu', NULL, 'oluchukwugolden@gmail.com', '', '07033593600', NULL, 0, 0, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-04 23:16:12', NULL, 0),
(531, 'Anthony', 'Odu', NULL, 'tosin@vationsys.com', '', '09090311929', NULL, 0, 0, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-04 23:16:12', NULL, 0),
(532, 'Huldee', 'Anie', NULL, 'emekau@vationsys.com', '', '2348098574398', NULL, 0, 0, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-04 23:16:12', NULL, 0),
(533, 'adewale', 'onafalujo', NULL, 'walengy2001@gmail.com', '', '07084223896', NULL, 0, 0, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-04 23:16:12', NULL, 0),
(534, 'Lisa', 'Lisa', NULL, 'Lisaatuyota@live.co.uk', '', '08033088858', '09093608448', 0, 0, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-04 23:16:12', NULL, 0),
(535, 'Kayode', 'Ayantola', NULL, 'kdoo4rreal@yahoo.com', '', '08054634176', '07068755614', 0, 0, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-04 23:16:12', NULL, 0),
(536, 'Adedeji', 'Awobona', NULL, 'dejibona@yahoo.com', '', '08035350160', '08034031631', 0, 0, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-04 23:16:12', NULL, 0),
(537, 'Adebamowo', 'Adedoyin', NULL, 'wunmade.addey@gmail.com', '', '08130088568', '09054561595', 0, 0, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-04 23:16:12', NULL, 0),
(538, 'ojukwu', 'onwuzulike', NULL, 'ojwardrobesboutique@yahoo.com', '', '08055584444', NULL, 0, 0, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-04 23:16:12', NULL, 0),
(539, 'Dami', 'O', NULL, 'damiolowokere@gmail.com', '', '08040070703', NULL, 0, 0, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-04 23:16:12', NULL, 0),
(540, 'Damilola', 'Olumide-Ajayi', NULL, 'damiolumideajayi@gmail.com', '', '08032003562', NULL, 0, 0, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-04 23:16:12', NULL, 0),
(541, 'femi', 'abioye', NULL, 'afemo2000@hotmail.com', '', '08074129736', NULL, 0, 0, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-04 23:16:12', NULL, 0),
(542, 'Jeffrey', 'Anyado', NULL, 'Anyadojeffrey14@yahoo.com', '', '+2348070448954', '+2348070448954', 0, 0, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-04 23:16:12', NULL, 0),
(543, 'Adesuwa', 'Ossai', NULL, 'adesuwa.ossai@yahoo.com', '', '08152748870', NULL, 0, 0, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-04 23:16:12', NULL, 0),
(544, 'matilda', 'okereke', NULL, 'uandmatty@gmail.com', '', '08095492596', NULL, 0, 0, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-04 23:16:12', NULL, 0),
(545, 'chinyere', 'eze', NULL, 'chezzyeze2013@yahoo.com', '', '08039358692', NULL, 0, 0, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-04 23:16:12', NULL, 0),
(546, 'uche', 'Gene', NULL, 'Chimamanda1234@gmail', '', '08032672570', NULL, 0, 0, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-04 23:16:12', NULL, 0),
(547, 'Nnenna', 'Ukegbu', NULL, 'nnennaukegbu@yahoo.co.uk', '', '08083607693', '08083607693', 0, 0, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-04 23:16:12', NULL, 0),
(548, 'Ona', 'Ofunne', NULL, 'ona660@gmail.com', '', '07080247144', NULL, 0, 0, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-04 23:16:12', NULL, 0),
(549, 'Jace', 'Afolahan', NULL, 'gbengaa@ebsafr.com', '', '08189558783', NULL, 0, 0, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-04 23:16:12', NULL, 0),
(550, 'Fatima', 'Olubunmi', NULL, 'fatima_chinwe@yahoo.com', '', '08173722181', NULL, 0, 0, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-04 23:16:12', NULL, 0),
(551, 'Adaeze', 'Mba', NULL, 'mba.adaeze@yahoo.com', '', '07066204369', NULL, 0, 0, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-04 23:16:12', NULL, 0),
(552, 'nduka', 'emi', NULL, 'ndukaemi@yahoo.com', '', '08110160588', '08038312805', 0, 0, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-04 23:16:12', NULL, 0),
(553, 'Anna', 'Etonu', NULL, 'aetonu24@gmail.com', '', '07037058570', NULL, 0, 0, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-04 23:16:12', NULL, 0),
(554, 'shekoni', 'mariam', NULL, 'mariamshekoni@yahoo.com', '', '08029079144', NULL, 0, 0, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-04 23:16:12', NULL, 0),
(555, 'angel', 'beckky', NULL, 'angelbeckky@yahoo.co.uk', '', '09029095645', NULL, 0, 0, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-04 23:16:12', NULL, 0),
(556, 'Chinenye', 'Nwanna', NULL, 'chinenyenwanna@gmail.com', '', '08080803855', NULL, 0, 0, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-04 23:16:12', NULL, 0),
(557, 'Jace', 'Afo', NULL, 'jac0422@gmail.com', '', '08189558783', NULL, 0, 0, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-04 23:16:12', NULL, 0),
(558, 'Anthony', 'Odu', NULL, 'antonyodu@yahoo.com', '', '08145632564', NULL, 0, 0, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-04 23:16:12', NULL, 0),
(559, 'John', 'Doe', NULL, 'info@vationsys.com', '', '08323423423', NULL, 0, 0, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-04 23:16:12', NULL, 0),
(560, 'Lucy', 'Mba', NULL, 'prestreal4@live.com', '', '07879998210', NULL, 0, 0, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-04 23:16:12', NULL, 0),
(561, 'Anthony', 'Odu', NULL, 'antonyodusfvsdvsdv@gmail.com', '', '08145632564', NULL, 0, 0, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-04 23:16:12', NULL, 0),
(562, 'Anthony', 'Odu', NULL, 'antonybdfbdfbdodu@gmail.com', '', '08145632564', NULL, 0, 0, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-04 23:16:12', NULL, 0),
(563, 'sdcvsv', 'vsdcsdcs', NULL, 'aaa@ssss.com', '', '0987654', NULL, 0, 0, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-04 23:16:12', NULL, 0),
(564, 'cccc', 'mmmm', NULL, 'aa@ss.com', '', '90876543', NULL, 0, 0, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-04 23:16:12', NULL, 0),
(565, 'Anthony', 'Oduduwa', NULL, 'info@ggc.com', '', '08145632564', NULL, 0, 0, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-04 23:16:12', NULL, 0),
(566, 'Info', 'Jlf', NULL, 'info@jollof.com', '', '23432343565', NULL, 0, 0, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-04 23:16:12', NULL, 0),
(567, 'Basita', 'Arog', NULL, 'esb009@gmail.com', '', '08182102198', NULL, 0, 0, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-04 23:16:12', NULL, 0),
(568, 'Chinny', 'Eze', NULL, 'chinyerege@ebsafr.com', '', '08038358692', NULL, 0, 0, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-04 23:16:12', NULL, 0),
(569, 'Ugochukwu', 'Ihechukwu', NULL, 'flexopjoel@gmail.com', '', '7134740966', NULL, 0, 0, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-04 23:16:12', NULL, 0),
(570, 'Eze', 'Chinyere', NULL, 'eje_jenny@yahoo.com', '', '08039358692', NULL, 0, 0, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-04 23:16:12', NULL, 0),
(571, 'trivin', 'oye', NULL, 'segun@stakle.com', '', '080803833', NULL, 0, 0, '', NULL, 0, '2018-05-04 23:16:12', '2018-05-04 23:16:12', NULL, 0);

-- --------------------------------------------------------

--
-- Table structure for table `admin_users`
--

CREATE TABLE `admin_users` (
  `id` int(11) NOT NULL,
  `userroleid` int(11) DEFAULT NULL,
  `firstname` varchar(250) DEFAULT NULL,
  `lastname` varchar(250) DEFAULT NULL,
  `email` varchar(250) DEFAULT NULL,
  `phonenumber` varchar(250) DEFAULT NULL,
  `password` varchar(250) DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '0',
  `createdat` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updatedat` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `deletedat` timestamp NULL DEFAULT NULL,
  `isdeleted` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `admin_users`
--

INSERT INTO `admin_users` (`id`, `userroleid`, `firstname`, `lastname`, `email`, `phonenumber`, `password`, `status`, `createdat`, `updatedat`, `deletedat`, `isdeleted`) VALUES
(1, 2, 'ebs', 'admin', 'ebs@admin.com', '0808069333', '21232f297a57a5a743894a0e4a801fc3', 1, '2018-06-04 11:02:52', '2018-06-04 11:05:07', NULL, 0);

-- --------------------------------------------------------

--
-- Table structure for table `bannertype`
--

CREATE TABLE `bannertype` (
  `id` int(11) NOT NULL,
  `jollofsitetypeid` int(20) NOT NULL,
  `bannertype` varchar(255) NOT NULL,
  `bannertypename` varchar(200) NOT NULL,
  `width` int(11) DEFAULT NULL,
  `height` int(11) DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1',
  `createdat` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updatedat` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `deletedat` timestamp NULL DEFAULT NULL,
  `isdeleted` tinyint(4) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `bannertype`
--

INSERT INTO `bannertype` (`id`, `jollofsitetypeid`, `bannertype`, `bannertypename`, `width`, `height`, `status`, `createdat`, `updatedat`, `deletedat`, `isdeleted`) VALUES
(1, 1, 'general', 'Cuisine Homepage Banner', 1450, 500, 1, '2018-08-12 15:02:46', '2018-08-12 15:02:46', NULL, 0),
(2, 1, 'general', 'Cuisine Homepage Center ', NULL, NULL, 0, '2018-08-04 22:19:56', '2018-08-04 22:19:56', '2018-08-04 22:19:47', 1),
(3, 1, 'general', 'Cuisine Restaurants Page Sidebar', 265, 430, 1, '2018-08-12 15:02:27', '2018-08-12 15:02:27', NULL, 0),
(4, 3, 'general', 'Jollof Homepage Banner', 1450, 500, 1, '2018-08-03 14:35:25', '2018-08-03 14:35:25', NULL, 0),
(6, 1, 'restaurant', 'Cuisine Merchant Homepage Banner', 1450, 300, 1, '2018-08-03 14:35:25', '2018-08-03 14:35:25', NULL, 0),
(7, 1, 'restaurant', 'Cuisine Merchant page sidebar', 265, 430, 1, '2018-08-03 14:35:25', '2018-08-03 14:35:25', NULL, 0),
(8, 2, 'general', 'Fashion Homepage Banner', 870, 460, 1, '2018-08-03 14:35:25', '2018-08-03 14:35:25', NULL, 0),
(9, 2, 'general', 'Fashion Homepage Sidebar', 270, 460, 1, '2018-08-03 14:35:25', '2018-08-03 14:35:25', NULL, 0),
(10, 1, 'general', 'Cuisine Restaurants Page Banner', 1450, 300, 1, '2018-08-12 15:31:44', '2018-08-12 15:31:44', NULL, 0),
(11, 3, 'signup', 'Jollof Admin Signup Page', 1450, 800, 1, '2018-08-27 11:22:41', '2018-08-27 11:22:41', NULL, 0),
(12, 2, 'signup', 'Fashion Admin Signup Page', 1450, 800, 1, '2018-08-28 12:05:56', '2018-08-28 12:05:56', NULL, 0),
(13, 1, 'signup', 'Cuisine Admin Signup Page', 1450, 800, 1, '2018-08-28 12:06:29', '2018-08-28 12:06:29', NULL, 0),
(14, 4, 'signup', 'lifestyle Page', 1450, 800, 1, '2018-08-28 12:06:29', '2018-08-28 12:06:29', NULL, 0);

-- --------------------------------------------------------

--
-- Table structure for table `brands_tbl`
--

CREATE TABLE `brands_tbl` (
  `id` int(20) NOT NULL,
  `name` varchar(255) CHARACTER SET latin1 DEFAULT NULL,
  `logo` varchar(255) CHARACTER SET latin1 NOT NULL DEFAULT '',
  `status` tinyint(4) DEFAULT '1',
  `createdat` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updatedat` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `deletedat` timestamp NULL DEFAULT NULL,
  `isdeleted` tinyint(4) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `brands_tbl`
--

INSERT INTO `brands_tbl` (`id`, `name`, `logo`, `status`, `createdat`, `updatedat`, `deletedat`, `isdeleted`) VALUES
(1, 'Osvaldo Rossi', '', 1, '2018-07-09 09:38:24', '2018-07-09 09:38:24', NULL, 0),
(2, 'Prada', 'Prada.jpg', 1, '2018-07-09 09:40:00', '2018-07-09 09:40:13', NULL, 0),
(3, 'LEMFO', 'LEMFO.png', 1, '2018-07-09 09:42:07', '2018-07-09 09:44:04', NULL, 0),
(4, 'J-D''s Fashion', '', 0, '2018-07-09 09:44:55', '2018-08-30 12:01:38', '0000-00-00 00:00:00', 0);

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
(1, 3, 'Swallow', 'Swallow', 1, 1, '2017-10-09 08:56:13', '2018-07-29 04:12:35', NULL, 0),
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
(1, 'african-food', 'African food', 1, 1, '2018-03-15 20:14:56', '2018-05-26 17:58:11', NULL, 0),
(2, 'fast-food', 'Fast Food', 100, 0, '2018-03-15 20:15:40', '2018-05-09 18:37:12', NULL, 0),
(3, 'casual-dining', 'Casual Dining', 100, 0, '2018-03-15 20:16:26', '2018-05-09 18:36:49', NULL, 0),
(4, 'chinese', 'Chinese', 100, 1, '2018-03-15 20:18:50', '2018-03-15 20:19:51', NULL, 0),
(5, 'desserts', 'Desserts', 100, 1, '2018-03-15 20:19:33', '2018-03-15 20:19:48', NULL, 0),
(6, 'continental', 'Continental', 100, 1, '2018-03-15 20:21:13', '2018-03-15 20:21:29', NULL, 0),
(7, 'barbecue', 'Barbecue', 100, 0, '2018-03-15 20:23:39', '2018-05-09 18:34:26', NULL, 0),
(8, 'cafeteria', 'Cafeteria', 100, 0, '2018-03-15 20:25:41', '2018-05-09 18:36:37', NULL, 0),
(9, 'oriental', 'Oriental', 100, 0, '2018-03-15 20:47:55', '2018-05-09 18:40:41', NULL, 0),
(10, 'bakery', 'Bakery', 100, 0, '2018-03-15 20:48:37', '2018-08-14 00:08:35', NULL, 0),
(11, 'cafe', 'Cafe', 100, 1, '2018-03-15 20:49:06', '2018-03-15 20:49:06', NULL, 0),
(12, 'american', 'American', 100, 1, '2018-05-04 21:05:00', '2018-05-04 21:05:00', NULL, 0),
(13, 'brazilian', 'Brazilian', 100, 1, '2018-05-04 21:05:11', '2018-05-04 21:05:11', NULL, 0),
(14, 'breakfast', 'Breakfast', 100, 1, '2018-05-04 21:05:18', '2018-05-04 21:05:18', NULL, 0),
(15, 'british', 'British', 100, 1, '2018-05-04 21:05:26', '2018-05-04 21:05:26', NULL, 0),
(16, 'burgers', 'Burgers', 100, 1, '2018-05-04 21:05:34', '2018-05-04 21:05:34', NULL, 0),
(17, 'cakes', 'Cakes', 100, 1, '2018-05-04 21:05:50', '2018-05-04 21:05:50', NULL, 0),
(18, 'confectioneries', 'Confectioneries', 100, 1, '2018-05-04 21:06:14', '2018-05-04 21:06:14', NULL, 0),
(19, 'crepe', 'Crepe', 100, 1, '2018-05-04 21:06:26', '2018-05-04 21:06:26', NULL, 0),
(20, 'european', 'European', 100, 1, '2018-05-04 21:06:37', '2018-05-04 21:06:37', NULL, 0),
(21, 'french', 'French', 100, 1, '2018-05-04 21:06:48', '2018-05-04 21:06:48', NULL, 0),
(22, 'fruits', 'Fruits', 100, 1, '2018-05-04 21:07:29', '2018-05-04 21:07:29', NULL, 0),
(23, 'indian', 'Indian', 100, 1, '2018-05-04 21:07:35', '2018-05-04 21:07:35', NULL, 0),
(24, 'italian', 'Italian', 100, 1, '2018-05-04 21:07:41', '2018-05-04 21:07:41', NULL, 0),
(25, 'japanese', 'Japanese', 100, 1, '2018-05-04 21:07:47', '2018-05-04 21:07:47', NULL, 0),
(26, 'juices', 'Juices', 100, 1, '2018-05-04 21:07:51', '2018-05-04 21:07:51', NULL, 0),
(27, 'lebanese', 'Lebanese', 100, 1, '2018-05-04 21:07:58', '2018-05-04 21:07:58', NULL, 0),
(28, 'mediterranean', 'Mediterranean', 100, 1, '2018-05-04 21:08:04', '2018-05-04 21:08:04', NULL, 0),
(29, 'mexican', 'Mexican', 100, 1, '2018-05-04 21:08:10', '2018-05-04 21:08:10', NULL, 0),
(30, 'nigerian', 'Nigerian', 100, 1, '2018-05-04 21:08:23', '2018-05-04 21:08:23', NULL, 0),
(31, 'sandwiches', 'Sandwiches', 100, 1, '2018-05-04 21:08:29', '2018-05-04 21:08:29', NULL, 0),
(32, 'pizza', 'Pizza', 100, 1, '2018-05-04 21:09:03', '2018-05-04 21:09:03', NULL, 0),
(33, 'seafood', 'Seafood', 100, 1, '2018-05-04 21:09:09', '2018-05-04 21:09:09', NULL, 0),
(34, 'thai', 'Thai', 100, 1, '2018-05-04 21:09:16', '2018-05-04 21:09:16', NULL, 0),
(35, 'grill-bbq', 'Grill & BBQ', 100, 1, '2018-05-04 21:10:09', '2018-05-04 21:10:09', NULL, 0),
(36, 'small-chopsfinger-foods', 'Small Chops/Finger Foods', 100, 1, '2018-05-04 21:10:53', '2018-05-04 21:10:53', NULL, 0),
(37, 'salads-and-fruits', 'Salads and Fruits', 100, 1, '2018-05-04 21:09:16', '2018-05-04 21:09:16', NULL, 0);

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
(1, 'womens-clothing', 'Women''s Clothing', 0, 1, 1, '2018-01-22 15:41:02', '2018-01-23 21:24:53', NULL, 0),
(2, 'mens-clothing', 'Men''s Clothing', 0, 2, 1, '2018-01-22 15:41:18', '2018-01-23 21:24:57', NULL, 0),
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
-- Table structure for table `cg_biz_cuisine`
--

CREATE TABLE `cg_biz_cuisine` (
  `id` int(10) NOT NULL,
  `biz_id` varchar(30) NOT NULL,
  `cuisine_id` varchar(255) DEFAULT NULL,
  `cuisine_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cg_biz_cuisine`
--

INSERT INTO `cg_biz_cuisine` (`id`, `biz_id`, `cuisine_id`, `cuisine_name`) VALUES
(11, 'B84177718', '1', 'American'),
(12, 'B84177718', '2', 'Brazilian'),
(13, 'B84177718', '3', 'Breakfast'),
(14, 'B84177718', '4', 'British'),
(15, 'B84177718', '5', 'Burgers'),
(16, 'B84177718', '6', 'Cafe'),
(17, 'B84177718', '7', 'Cakes'),
(18, 'B84177718', '8', 'Chinese'),
(19, 'B84177718', '9', 'Confectioneries'),
(20, 'B84177718', '10', 'Continental'),
(21, 'B84177718', '11', 'Crepe'),
(22, 'B84177718', '12', 'Desserts'),
(23, 'B84177718', '13', 'European'),
(24, 'B84177718', '14', 'French'),
(25, 'B84177718', '15', 'Fruits'),
(26, 'B84177718', '16', 'Indian'),
(27, 'B84177718', '17', 'Italian'),
(28, 'B84177718', '18', 'Japanese'),
(29, 'B84177718', '19', 'Juices'),
(30, 'B84177718', '20', 'Lebanese'),
(31, 'B84177718', '21', 'Mediterranean'),
(32, 'B84177718', '22', 'Mexican'),
(33, 'B84177718', '23', 'Nigerian'),
(34, 'B84177718', '24', 'Pizza'),
(35, 'B84177718', '25', 'Sandwiches'),
(36, 'B84177718', '26', 'Seafood'),
(37, 'B84177718', '27', 'Thai'),
(38, 'B87265682', '12', 'Desserts'),
(39, 'B87265682', '19', 'Juices'),
(40, 'B87265682', '21', 'Mediterranean'),
(41, 'B87265682', '25', 'Sandwiches'),
(42, 'B87265682', '26', 'Seafood'),
(43, 'B55284710', '12', 'Desserts'),
(44, 'B55284710', '19', 'Juices'),
(45, 'B55284710', '21', 'Mediterranean'),
(46, 'B55284710', '25', 'Sandwiches'),
(47, 'B55284710', '26', 'Seafood'),
(48, 'B37520849', '9', 'Confectioneries'),
(49, 'B37520849', '10', 'Continental'),
(50, 'B37520849', '19', 'Juices'),
(51, 'B24977871', '1', 'American'),
(52, 'B24977871', '2', 'Brazilian'),
(53, 'B24977871', '3', 'Breakfast'),
(54, 'B31598869', '3', 'Breakfast'),
(55, 'B31598869', '4', 'British'),
(56, 'B31598869', '5', 'Burgers'),
(57, 'B31598869', '8', 'Chinese'),
(58, 'B31598869', '17', 'Italian'),
(59, 'B29953647', '20', 'Lebanese'),
(60, 'B29953647', '26', 'Seafood'),
(61, 'B52269725', '12', 'Desserts'),
(62, 'B52269725', '25', 'Sandwiches'),
(63, 'B52269725', '26', 'Seafood'),
(64, 'B67362563', '3', 'Breakfast'),
(65, 'B67362563', '15', 'Fruits'),
(66, 'B67362563', '19', 'Juices'),
(67, 'B67362563', '25', 'Sandwiches'),
(68, 'B26506770', '5', 'Burgers'),
(69, 'B26506770', '10', 'Continental'),
(70, 'B26506770', '19', 'Juices'),
(71, 'B14326578', '10', 'Continental'),
(72, 'B14326578', '23', 'Nigerian'),
(73, 'B14326578', '24', 'Pizza'),
(74, 'B14326578', '25', 'Sandwiches'),
(75, 'B89901940', '5', 'Burgers'),
(76, 'B89901940', '8', 'Chinese'),
(77, 'B89901940', '18', 'Japanese'),
(78, 'B89901940', '19', 'Juices'),
(79, 'B63809867', '10', 'Continental'),
(80, 'B63809867', '19', 'Juices'),
(81, 'B63809867', '23', 'Nigerian'),
(82, 'B63809867', '25', 'Sandwiches'),
(83, 'B63809867', '26', 'Seafood'),
(84, 'B50279602', '5', 'Burgers'),
(85, 'B50279602', '9', 'Confectioneries'),
(86, 'B50279602', '10', 'Continental'),
(87, 'B50279602', '19', 'Juices'),
(88, 'B50279602', '23', 'Nigerian'),
(89, 'B50279602', '25', 'Sandwiches'),
(90, 'B48189782', '1', 'American'),
(91, 'B48189782', '2', 'Brazilian'),
(92, 'B48189782', '3', 'Breakfast'),
(93, 'B69899755', '3', 'Breakfast'),
(94, 'B69899755', '5', 'Burgers'),
(95, 'B69899755', '7', 'Cakes'),
(96, 'B69899755', '24', 'Pizza'),
(97, 'B69899755', '26', 'Seafood'),
(98, 'B66632700', '3', 'Breakfast'),
(99, 'B66632700', '5', 'Burgers'),
(100, 'B66632700', '10', 'Continental'),
(101, 'B66632700', '23', 'Nigerian'),
(102, 'B41389721', '23', 'Nigerian'),
(103, 'B41389721', '24', 'Pizza'),
(104, 'B41389721', '25', 'Sandwiches'),
(105, 'B83147733', '5', 'Burgers'),
(106, 'B83147733', '8', 'Chinese'),
(107, 'B83147733', '10', 'Continental'),
(108, 'B83147733', '19', 'Juices'),
(109, 'B41491844', '8', 'Chinese'),
(110, 'B41491844', '10', 'Continental'),
(111, 'B41491844', '25', 'Sandwiches'),
(112, 'B41491844', '26', 'Seafood'),
(113, 'B73157989', '3', 'Breakfast'),
(114, 'B73157989', '19', 'Juices'),
(115, 'B73157989', '23', 'Nigerian'),
(116, 'B30600934', '3', 'Breakfast'),
(117, 'B30600934', '9', 'Confectioneries'),
(118, 'B30600934', '10', 'Continental'),
(119, 'B30600934', '19', 'Juices'),
(120, 'B30600934', '23', 'Nigerian'),
(121, 'B60787620', '1', 'American'),
(122, 'B60787620', '3', 'Breakfast'),
(123, 'B60787620', '5', 'Burgers'),
(124, 'B60787620', '8', 'Chinese'),
(125, 'B60787620', '10', 'Continental'),
(126, 'B61480625', '3', 'Breakfast'),
(127, 'B61480625', '5', 'Burgers'),
(128, 'B61480625', '6', 'Cafe'),
(129, 'B61480625', '7', 'Cakes'),
(130, 'B73182622', '1', 'American'),
(131, 'B73182622', '3', 'Breakfast'),
(132, 'B73182622', '5', 'Burgers'),
(133, 'B73182622', '7', 'Cakes'),
(134, 'B73182622', '10', 'Continental'),
(135, 'B78671917', '3', 'Breakfast'),
(136, 'B78671917', '9', 'Confectioneries'),
(137, 'B78671917', '10', 'Continental'),
(138, 'B78671917', '19', 'Juices'),
(139, 'B46790921', '3', 'Breakfast'),
(140, 'B46790921', '5', 'Burgers'),
(141, 'B46790921', '10', 'Continental'),
(142, 'B46790921', '25', 'Sandwiches'),
(143, 'B59480626', '5', 'Burgers'),
(144, 'B59480626', '9', 'Confectioneries'),
(145, 'B59480626', '10', 'Continental'),
(146, 'B59480626', '25', 'Sandwiches'),
(147, 'B59480626', '26', 'Seafood'),
(148, 'B58343936', '3', 'Breakfast'),
(149, 'B58343936', '7', 'Cakes'),
(150, 'B58343936', '10', 'Continental'),
(151, 'B58343936', '19', 'Juices'),
(152, 'B55234887', '5', 'Burgers'),
(153, 'B55234887', '9', 'Confectioneries'),
(154, 'B55234887', '15', 'Fruits'),
(155, 'B55234887', '24', 'Pizza'),
(156, 'B55234887', '26', 'Seafood'),
(157, 'B67143743', '1', 'American'),
(158, 'B67143743', '2', 'Brazilian'),
(159, 'B67143743', '3', 'Breakfast'),
(160, 'B49291691', '10', 'Continental'),
(161, 'B49291691', '11', 'Crepe'),
(162, 'B49291691', '12', 'Desserts'),
(163, 'B21103677', '1', 'American'),
(164, 'B21103677', '2', 'Brazilian'),
(165, 'B21103677', '3', 'Breakfast'),
(166, 'B27981975', '5', 'Burgers'),
(167, 'B27981975', '10', 'Continental'),
(168, 'B27981975', '19', 'Juices'),
(169, 'B27981975', '23', 'Nigerian'),
(170, 'B93279955', '10', 'Continental'),
(171, 'B93279955', '19', 'Juices'),
(172, 'B93279955', '23', 'Nigerian'),
(173, 'B40767599', '5', 'Burgers'),
(174, 'B40767599', '10', 'Continental'),
(175, 'B40767599', '24', 'Pizza'),
(176, 'B40767599', '25', 'Sandwiches'),
(177, 'B40767599', '26', 'Seafood'),
(178, 'B46629590', '3', 'Breakfast'),
(179, 'B46629590', '5', 'Burgers'),
(180, 'B46629590', '10', 'Continental'),
(181, 'B46629590', '12', 'Desserts'),
(182, 'B46629590', '27', 'Thai'),
(183, 'B51759501', '1', 'American'),
(184, 'B51759501', '5', 'Burgers'),
(185, 'B51759501', '10', 'Continental'),
(186, 'B51759501', '25', 'Sandwiches'),
(187, 'B51759501', '26', 'Seafood'),
(188, 'B28757706', '9', 'Confectioneries'),
(189, 'B28757706', '10', 'Continental'),
(190, 'B28757706', '21', 'Mediterranean'),
(191, 'B28757706', '25', 'Sandwiches'),
(192, 'B28757706', '27', 'Thai'),
(193, 'B88402970', '1', 'American'),
(194, 'B88402970', '8', 'Chinese'),
(195, 'B88402970', '15', 'Fruits'),
(196, 'B88402970', '19', 'Juices'),
(197, 'B88402970', '21', 'Mediterranean'),
(198, 'B58229805', '4', 'British'),
(199, 'B58229805', '8', 'Chinese'),
(200, 'B58229805', '9', 'Confectioneries'),
(201, 'B58229805', '26', 'Seafood'),
(202, 'B58229805', '27', 'Thai'),
(203, 'B35614987', '1', 'American'),
(204, 'B35614987', '4', 'British'),
(205, 'B35614987', '25', 'Sandwiches'),
(206, 'B35614987', '27', 'Thai'),
(207, 'B78427749', '3', 'Breakfast'),
(208, 'B78427749', '4', 'British'),
(209, 'B78427749', '5', 'Burgers'),
(210, 'B78427749', '10', 'Continental'),
(211, 'B78427749', '16', 'Indian'),
(212, 'B79406574', '16', 'Indian'),
(213, 'B79406574', '20', 'Lebanese'),
(214, 'B79406574', '23', 'Nigerian'),
(215, 'B48577598', '1', 'American'),
(216, 'B48577598', '4', 'British'),
(217, 'B48577598', '5', 'Burgers'),
(218, 'B48577598', '21', 'Mediterranean'),
(219, 'B49860799', '10', 'Continental'),
(220, 'B49860799', '19', 'Juices'),
(221, 'B49860799', '24', 'Pizza'),
(222, 'B49860799', '26', 'Seafood'),
(223, 'B47173995', '10', 'Continental'),
(224, 'B47173995', '23', 'Nigerian'),
(225, 'B47173995', '24', 'Pizza'),
(226, 'B47173995', '25', 'Sandwiches'),
(227, 'B15228962', '1', 'American'),
(228, 'B15228962', '19', 'Juices'),
(229, 'B15228962', '25', 'Sandwiches'),
(230, 'B15228962', '26', 'Seafood'),
(231, 'B51339927', '19', 'Juices'),
(232, 'B51339927', '23', 'Nigerian'),
(233, 'B51339927', '25', 'Sandwiches'),
(234, 'B38205831', '7', 'Cakes'),
(235, 'B38205831', '10', 'Continental'),
(236, 'B38205831', '23', 'Nigerian'),
(237, 'B38205831', '25', 'Sandwiches'),
(238, 'B62961570', '5', 'Burgers'),
(239, 'B62961570', '7', 'Cakes'),
(240, 'B62961570', '9', 'Confectioneries'),
(241, 'B62961570', '10', 'Continental'),
(242, 'B65802575', '1', 'American'),
(243, 'B65802575', '2', 'Brazilian'),
(244, 'B65802575', '3', 'Breakfast'),
(245, 'B65802575', '4', 'British'),
(246, 'B65802575', '5', 'Burgers'),
(247, 'B65802575', '6', 'Cafe'),
(248, 'B65802575', '7', 'Cakes'),
(249, 'B65802575', '8', 'Chinese'),
(250, 'B65802575', '9', 'Confectioneries'),
(251, 'B65802575', '10', 'Continental'),
(252, 'B65802575', '11', 'Crepe'),
(253, 'B65802575', '12', 'Desserts'),
(254, 'B65802575', '13', 'European'),
(255, 'B65802575', '14', 'French'),
(256, 'B65802575', '15', 'Fruits'),
(257, 'B65802575', '16', 'Indian'),
(258, 'B65802575', '17', 'Italian'),
(259, 'B65802575', '18', 'Japanese'),
(260, 'B65802575', '19', 'Juices'),
(261, 'B65802575', '20', 'Lebanese'),
(262, 'B65802575', '21', 'Mediterranean'),
(263, 'B65802575', '22', 'Mexican'),
(264, 'B65802575', '23', 'Nigerian'),
(265, 'B65802575', '24', 'Pizza'),
(266, 'B65802575', '25', 'Sandwiches'),
(267, 'B65802575', '26', 'Seafood'),
(268, 'B65802575', '27', 'Thai'),
(269, 'B92594626', '3', 'Breakfast'),
(270, 'B92594626', '5', 'Burgers'),
(271, 'B92594626', '6', 'Cafe'),
(272, 'B92594626', '8', 'Chinese'),
(273, 'B92594626', '10', 'Continental'),
(274, 'B92594626', '12', 'Desserts'),
(275, 'B92594626', '13', 'European'),
(276, 'B92594626', '17', 'Italian'),
(277, 'B92594626', '18', 'Japanese'),
(278, 'B92594626', '19', 'Juices'),
(279, 'B92594626', '21', 'Mediterranean'),
(280, 'B92594626', '22', 'Mexican'),
(281, 'B92594626', '23', 'Nigerian'),
(282, 'B92594626', '24', 'Pizza'),
(283, 'B84304773', '3', 'Breakfast'),
(284, 'B84304773', '5', 'Burgers'),
(285, 'B84304773', '6', 'Cafe'),
(286, 'B84304773', '8', 'Chinese'),
(287, 'B84304773', '9', 'Confectioneries'),
(288, 'B84304773', '10', 'Continental'),
(289, 'B84304773', '12', 'Desserts'),
(290, 'B45503856', '1', 'American'),
(291, 'B45503856', '3', 'Breakfast'),
(292, 'B45503856', '4', 'British'),
(293, 'B45503856', '5', 'Burgers'),
(294, 'B45503856', '6', 'Cafe'),
(295, 'B45503856', '7', 'Cakes'),
(296, 'B45503856', '8', 'Chinese'),
(297, 'B45503856', '10', 'Continental'),
(298, 'B45503856', '11', 'Crepe'),
(299, 'B45503856', '12', 'Desserts'),
(300, 'B45503856', '23', 'Nigerian'),
(301, 'B45503856', '24', 'Pizza'),
(302, 'B45503856', '25', 'Sandwiches'),
(303, 'B33608621', '3', 'Breakfast'),
(304, 'B33608621', '6', 'Cafe'),
(305, 'B33608621', '9', 'Confectioneries'),
(306, 'B33608621', '23', 'Nigerian'),
(307, 'B33608621', '24', 'Pizza'),
(308, 'B67643948', '23', 'Nigerian'),
(309, 'B74487658', '3', 'Breakfast'),
(310, 'B74487658', '6', 'Cafe'),
(311, 'B74487658', '8', 'Chinese'),
(312, 'B74487658', '9', 'Confectioneries'),
(313, 'B74487658', '10', 'Continental'),
(314, 'B74487658', '11', 'Crepe'),
(315, 'B74487658', '12', 'Desserts'),
(316, 'B74487658', '13', 'European'),
(317, 'B74487658', '14', 'French'),
(318, 'B74487658', '23', 'Nigerian'),
(319, 'B74487658', '24', 'Pizza'),
(320, 'B52180621', '6', 'Cafe'),
(321, 'B52180621', '9', 'Confectioneries'),
(322, 'B52180621', '10', 'Continental'),
(323, 'B52180621', '11', 'Crepe'),
(324, 'B52180621', '12', 'Desserts'),
(325, 'B52180621', '13', 'European'),
(326, 'B52180621', '23', 'Nigerian'),
(327, 'B52180621', '24', 'Pizza'),
(328, 'B52180621', '26', 'Seafood'),
(329, 'B32742947', '6', 'Cafe'),
(330, 'B32742947', '7', 'Cakes'),
(331, 'B32742947', '11', 'Crepe'),
(332, 'B32742947', '12', 'Desserts'),
(333, 'B73902707', '8', 'Chinese'),
(334, 'B53757573', '23', 'Nigerian'),
(335, 'B18684728', '6', 'Cafe'),
(336, 'B18684728', '7', 'Cakes'),
(337, 'B18684728', '11', 'Crepe'),
(338, 'B18684728', '12', 'Desserts'),
(339, 'B31859723', '3', 'Breakfast'),
(340, 'B31859723', '12', 'Desserts'),
(341, 'B31859723', '23', 'Nigerian'),
(342, 'B31859723', '25', 'Sandwiches'),
(348, 'B22922646', '23', 'Nigerian'),
(349, 'B14691591', '12', 'Desserts'),
(351, 'B46627824', '9', 'Confectioneries'),
(352, 'B98370769', '26', 'Seafood'),
(353, 'B56447771', '3', 'Breakfast'),
(354, 'B56447771', '25', 'Sandwiches'),
(355, 'B75911833', '5', 'Burgers'),
(356, 'B75911833', '25', 'Sandwiches'),
(357, 'B49723654', '8', 'Chinese'),
(358, 'B49723654', '18', 'Japanese'),
(359, 'B49723654', '27', 'Thai'),
(363, 'B56776822', '21', 'Mediterranean'),
(364, 'B56776822', '25', 'Sandwiches'),
(369, 'B13169509', '8', 'Chinese'),
(370, 'B13169509', '10', 'Continental'),
(371, 'B13169509', '23', 'Nigerian'),
(372, 'B13169509', '25', 'Sandwiches'),
(387, 'B90420897', '10', 'Continental'),
(388, 'B35484932', '7', 'Cakes'),
(391, 'B72351711', '17', 'Italian'),
(392, 'B72351711', '24', 'Pizza'),
(393, 'B59605575', 'C97152637', 'Grill & BBQ'),
(399, 'B72101680', '27', 'Thai'),
(429, 'B32462705', '23', 'Nigerian'),
(430, 'B76929744', '23', 'Nigerian'),
(431, 'B97819651', '24', 'Pizza'),
(432, 'B41371706', '1', 'American'),
(433, 'B41371706', '5', 'Burgers'),
(434, 'B41371706', '6', 'Cafe'),
(435, 'B41371706', '19', 'Juices'),
(436, 'B41371706', '25', 'Sandwiches'),
(438, 'B91156996', '24', 'Pizza'),
(448, 'B45254629', '5', 'Burgers'),
(449, 'B45254629', '7', 'Cakes'),
(450, 'B45254629', '9', 'Confectioneries'),
(451, 'B45254629', '10', 'Continental'),
(452, 'B45254629', '11', 'Crepe'),
(453, 'B45254629', '24', 'Pizza'),
(454, 'B45254629', '25', 'Sandwiches'),
(460, 'B37299838', '3', 'Breakfast'),
(461, 'B37299838', '24', 'Pizza'),
(462, 'B37299838', '25', 'Sandwiches'),
(463, 'B57151776', '3', 'Breakfast'),
(464, 'B57151776', '23', 'Nigerian'),
(465, 'B57151776', '26', 'Seafood'),
(466, 'B48780540', '3', 'Breakfast'),
(467, 'B48780540', '23', 'Nigerian'),
(468, 'B30757992', '1', 'American'),
(469, 'B30757992', '3', 'Breakfast'),
(470, 'B61566704', '10', 'Continental'),
(471, 'B61566704', '17', 'Italian'),
(472, 'B61566704', '26', 'Seafood'),
(473, 'B12756639', '23', 'Nigerian'),
(474, 'B20760515', '23', 'Nigerian'),
(475, 'B26633909', 'C97152637', 'Grill & BBQ'),
(476, 'B26633909', '23', 'Nigerian'),
(477, 'B98316835', '3', 'Breakfast'),
(478, 'B98316835', '23', 'Nigerian'),
(479, 'B98316835', '24', 'Pizza'),
(480, 'B98316835', '26', 'Seafood'),
(481, 'B96674886', '5', 'Burgers'),
(482, 'B96674886', '9', 'Confectioneries'),
(483, 'B96674886', 'C97152637', 'Grill & BBQ'),
(484, 'B35810816', '26', 'Seafood'),
(485, 'B65810815', '23', 'Nigerian'),
(486, 'B36763644', '5', 'Burgers'),
(487, 'B36763644', '7', 'Cakes'),
(488, 'B36763644', '9', 'Confectioneries'),
(489, 'B36763644', '23', 'Nigerian'),
(490, 'B29433864', 'C72226613', 'Salads and Fruits'),
(491, 'B29433864', '25', 'Sandwiches'),
(492, 'B75865610', '7', 'Cakes'),
(493, 'B75865610', '9', 'Confectioneries'),
(494, 'B75865610', '12', 'Desserts'),
(495, 'B61989725', '3', 'Breakfast'),
(496, 'B61989725', '7', 'Cakes'),
(497, 'B61989725', '23', 'Nigerian'),
(498, 'B61989725', 'C72226613', 'Salads and Fruits'),
(499, 'B61989725', '26', 'Seafood'),
(500, 'B38190949', '9', 'Confectioneries'),
(501, 'B38190949', '23', 'Nigerian'),
(502, 'B42942776', '3', 'Breakfast'),
(503, 'B42942776', '6', 'Cafe'),
(504, 'B42942776', '10', 'Continental'),
(505, 'B70556693', '23', 'Nigerian'),
(506, 'B70556693', 'C63895720', 'Small Chops/Finger \r\n\r\nFoods'),
(507, 'B32421536', '1', 'American'),
(508, 'B32421536', '3', 'Breakfast'),
(509, 'B32421536', '10', 'Continental'),
(510, 'B32421536', 'C97152637', 'Grill & BBQ'),
(511, 'B32421536', '23', 'Nigerian'),
(512, 'B91454790', '1', 'American'),
(513, 'B91454790', '3', 'Breakfast'),
(514, 'B91454790', '5', 'Burgers'),
(515, 'B91454790', 'C97152637', 'Grill & BBQ'),
(516, 'B91454790', '25', 'Sandwiches'),
(517, 'B91454790', 'C63895720', 'Small Chops/Finger \r\n\r\nFoods'),
(518, 'B68534743', '3', 'Breakfast'),
(519, 'B68534743', '8', 'Chinese'),
(520, 'B68534743', '10', 'Continental'),
(521, 'B68534743', 'C97152637', 'Grill & BBQ'),
(522, 'B68534743', '23', 'Nigerian'),
(523, 'B68534743', 'C72226613', 'Salads and Fruits'),
(524, 'B68534743', '26', 'Seafood'),
(525, 'B68534743', 'C63895720', 'Small Chops/Finger \r\n\r\nFoods'),
(526, 'B85629707', '23', 'Nigerian'),
(527, 'B79485649', '23', 'Nigerian'),
(528, 'B98610636', '23', 'Nigerian'),
(530, 'B13519701', '3', 'Breakfast'),
(531, 'B32731810', '10', 'Continental'),
(532, 'B32731810', '12', 'Desserts'),
(533, 'B32731810', 'C97152637', 'Grill & BBQ'),
(534, 'B32731810', '24', 'Pizza'),
(535, 'B54205905', '10', 'Continental'),
(536, 'B54205905', '24', 'Pizza'),
(537, 'B54205905', '26', 'Seafood'),
(538, 'B28532936', '10', 'Continental'),
(539, 'B38884526', '10', 'Continental'),
(540, 'B38884526', '23', 'Nigerian'),
(541, 'B41472901', '3', 'Breakfast'),
(542, 'B41472901', '4', 'British'),
(543, 'B41472901', '5', 'Burgers'),
(544, 'B41472901', '6', 'Cafe'),
(545, 'B41472901', '11', 'Crepe'),
(546, 'B41472901', 'C97152637', 'Grill & BBQ'),
(547, 'B41472901', '23', 'Nigerian'),
(548, 'B41472901', 'C72226613', 'Salads and Fruits'),
(549, 'B41472901', '25', 'Sandwiches'),
(550, 'B41472901', 'C63895720', 'Small Chops/Finger \r\n\r\nFoods'),
(551, 'B36488873', '20', 'Lebanese'),
(552, 'B60936977', '3', 'Breakfast'),
(553, 'B60936977', '5', 'Burgers'),
(554, 'B60936977', '12', 'Desserts'),
(555, 'B60936977', 'C97152637', 'Grill & BBQ'),
(556, 'B60936977', '23', 'Nigerian'),
(557, 'B60936977', 'C72226613', 'Salads and Fruits'),
(558, 'B60936977', '26', 'Seafood'),
(559, 'B60936977', 'C63895720', 'Small Chops/Finger Foods'),
(560, 'B68631828', '1', 'American'),
(561, 'B68631828', '2', 'Brazilian'),
(562, 'B67725640', '20', 'Lebanese'),
(563, 'B67725640', 'C63895720', 'Small Chops/Finger Foods'),
(565, 'B12664829', '23', 'Nigerian'),
(566, 'B96896513', '3', 'Breakfast'),
(567, 'B96896513', '5', 'Burgers'),
(568, 'B96896513', '8', 'Chinese'),
(569, 'B96896513', '12', 'Desserts'),
(570, 'B96896513', 'C97152637', 'Grill & BBQ'),
(571, 'B96896513', '19', 'Juices'),
(572, 'B96896513', '23', 'Nigerian'),
(573, 'B96896513', '24', 'Pizza'),
(574, 'B96896513', 'C72226613', 'Salads and Fruits'),
(575, 'B96896513', '25', 'Sandwiches'),
(576, 'B96896513', 'C63895720', 'Small Chops/Finger Foods'),
(577, 'B20893853', NULL, '1');

-- --------------------------------------------------------

--
-- Table structure for table `cg_customer`
--

CREATE TABLE `cg_customer` (
  `id` int(50) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `password` varchar(255) NOT NULL,
  `imsi` varchar(30) DEFAULT NULL,
  `firstname` varchar(255) NOT NULL,
  `surname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `birth_date` date DEFAULT NULL,
  `state_of_residence` varchar(255) DEFAULT NULL,
  `home_address` varchar(500) DEFAULT NULL,
  `office_address` varchar(500) DEFAULT NULL,
  `alternate_phone` varchar(255) DEFAULT NULL,
  `referred_email_addr` varchar(255) DEFAULT NULL,
  `active` varchar(255) NOT NULL COMMENT 'This is either Y or N which specifies if the acct is \r\n\r\nactive or disabled',
  `admin_verification_status` varchar(255) DEFAULT NULL COMMENT 'This is just used to flag when \r\n\r\nthe cust details hav been verified by ebs admin',
  `reg_status` varchar(255) DEFAULT NULL COMMENT 'either pending_activation or activated. It \r\n\r\ncontrols the signup process flow',
  `reg_date` date NOT NULL,
  `cancel_date` datetime DEFAULT NULL,
  `activation_code` varchar(255) NOT NULL,
  `created_date` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `created_by` int(11) DEFAULT NULL,
  `modified_date` timestamp NULL DEFAULT NULL,
  `modified_by` int(11) DEFAULT NULL,
  `hash_salt` varchar(500) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cg_customer`
--

INSERT INTO `cg_customer` (`id`, `phone`, `password`, `imsi`, `firstname`, `surname`, `email`, `birth_date`, `state_of_residence`, `home_address`, `office_address`, `alternate_phone`, `referred_email_addr`, `active`, `admin_verification_status`, `reg_status`, `reg_date`, `cancel_date`, `activation_code`, `created_date`, `created_by`, `modified_date`, `modified_by`, `hash_salt`) VALUES
(1, '0907865432', 'bcd349b26f7a6d8f52bc75865130acb0f22b31189639ab8601398abd14584995234d5e1436e8683e', '', 'yinka', 'tunji', 'yinka@ebsafr.com', '0000-00-00', '', NULL, NULL, '09087654321', 'e_ejiogu@yahoo.com', 'N', 'pending_verification', 'activated', '2014-11-03', '0000-00-00 00:00:00', 'T55897876', '2014-11-02 22:00:00', 0, '0000-00-00 00:00:00', 0, '9639ab8601398abd14584995234d5e1436e8683e'),
(2, '08069802185', 'befa39749509fd9ab56743e14f9d68d843ea4038c8d78122a47b7a782741aa775064ada83ce66def', '', 'Ebuka', 'Ezewuzie', 'ebuka.ezewuzie@gmail.com', '2014-11-10', 'Lagos', 'Isolo, Lagos, \r\n\r\nNigeria', 'Ikoyi', '', '', 'Y', 'pending_verification', 'activated', '2014-11-03', '0000-00-00 00:00:00', 'T73741505', '2014-11-02 22:00:00', 0, '0000-00-00 00:00:00', 0, 'c8d78122a47b7a782741aa775064ada83ce66def'),
(3, '07090345678', 'f32bca49b3796c2f74f13b29fcdbf6c5f7be00a8b8ce881a4ece8c76da78f85bfe9a94f2c8c19f2b', '', 'gbemi', 'Eda', 'edab@ebsafr.com', '0000-00-00', 'Lagos', '', '', '', 'bobbya@ebsafr.com', 'N', 'pending_verification', 'pending_activation', '2014-11-04', '0000-00-00 00:00:00', 'T47575523', '2014-11-03 22:00:00', 0, '0000-00-00 00:00:00', 0, 'b8ce881a4ece8c76da78f85bfe9a94f2c8c19f2b'),
(4, '08037078922', '74b80f99133ff73f9016c9e4b3a1f2ec71cdc87ff9ea9ae7f4b661dca5f2c18ae0bea054b5b060e2', '', 'Bemigho', 'Eda', 'gbemiaus@yahoo.com', '0000-00-00', '', NULL, NULL, '08037078923', 'soize1@gmail.com', 'Y', 'pending_verification', 'activated', '2014-11-12', '0000-00-00 00:00:00', 'T39677697', '2014-11-11 22:00:00', 0, '0000-00-00 00:00:00', 0, 'f9ea9ae7f4b661dca5f2c18ae0bea054b5b060e2'),
(5, '08141226692', '618d829772eb73ae1489947b8586e9f272c84f3cef23011545ef7cd1f7924949ada42c8562b6ddab', '', 'lucy', 'mballa', 'mballalucy87@gmail.com', '0000-00-00', 'Lagos', '', '', '', 'lisaatuyota@live.co.uk', 'Y', 'pending_verification', 'activated', '2014-11-24', '0000-00-00 00:00:00', 'T42818568', '2014-11-23 22:00:00', 0, '0000-00-00 00:00:00', 0, 'ef23011545ef7cd1f7924949ada42c8562b6ddab'),
(6, '08073154434', 'd70343bf1061acb2be291867066b374652d8a1184ad8eba4598eecb5c2659d45ac060168b1e10864', '', 'Bobby', 'A.', 'bobbya@ebsafr.com', '1988-11-08', 'Lagos', 'Plot 3 Elegba Court, Oniru Estate, \r\n\r\nVI', '', '', '', 'Y', 'pending_verification', 'password_reset_pending', '2014-11-24', '0000-00-00 00:00:00', 'T39942924', '2014-11-23 22:00:00', 0, '0000-00-00 00:00:00', 0, '4ad8eba4598eecb5c2659d45ac060168b1e10864'),
(7, '+971555930483', '979f554d7615aa8fcca4282366438f3fb76f1c45796549c28e94fa90c073def0fad38b0adc45fca2', '', 'kannike', 'ibrahim', 'vdjtribe@yahoo.com', '0000-00-00', '', NULL, NULL, '+971555930483', '', 'N', 'pending_verification', 'pending_activation', '2014-12-11', '0000-00-00 00:00:00', 'T25871908', '2014-12-10 22:00:00', 0, '0000-00-00 00:00:00', 0, '796549c28e94fa90c073def0fad38b0adc45fca2'),
(8, '08029858731', '90c46a160836a3d152a4d2c93bdf9a7f4c7cb970d39e36a92ca1bac260053cf4450b6d1ddafc6c9d', '', 'Bukola', 'Oshinyemi', 'bhouckie@gmail.com', '1985-05-19', 'Lagos', '', '', '', 'dmedunoye1@gmail.com', 'N', 'pending_verification', 'pending_activation', '2014-12-18', '0000-00-00 00:00:00', 'T79761817', '2014-12-17 22:00:00', 0, '0000-00-00 00:00:00', 0, 'd39e36a92ca1bac260053cf4450b6d1ddafc6c9d'),
(9, '08026754151', 'e1e86b6d02487e981ca70e805e025efcce4f65c6133d08bc3cc2cb132421013dc6df8b8e9112ede5', '', 'Abiola', 'Oyebolu', 'bolub1@yahoo.com', '1984-05-21', 'Lagos', '', '80b Lafiaji street. \r\n\r\nDolphin state,ikoyi', '', '', 'Y', 'pending_verification', 'activated', '2014-12-21', '0000-00-00 00:00:00', 'T48307873', '2014-12-20 22:00:00', 0, '0000-00-00 00:00:00', 0, '133d08bc3cc2cb132421013dc6df8b8e9112ede5'),
(10, '07084223896', 'a3bada5502da302186442744fbe9a3dfca79c1a88b227d26e2054d71a9cb21716ece9f89a4f6ab05', '', 'Onafalujo', 'Adewale', 'walengy2001@gmal.com', '0000-00-00', '', NULL, NULL, '', '', 'N', 'pending_verification', 'pending_activation', '2014-12-28', '0000-00-00 00:00:00', 'T40203579', '2014-12-27 22:00:00', 0, '0000-00-00 00:00:00', 0, '8b227d26e2054d71a9cb21716ece9f89a4f6ab05'),
(11, '08026754151', '3dba6bbedfd7e788898c2d5ea3ad13408b1b2f19c70e7726e60f81af3640068208a94a6849392bdb', '', 'Abiola', 'Oyebolu', 'oyeboluabiola@gmail.com', '1984-05-21', 'Lagos', '29,Price Adeyemi Way. \r\n\r\nIkotun', '80b,lafiaji way,dolphin estate.ikoyi', '', 'adamsodunayo@gmail.com', 'Y', 'pending_verification', 'password_reset_pending', '2015-01-24', '0000-00-00 00:00:00', 'T69516738', '2015-01-23 22:00:00', 0, '0000-00-00 00:00:00', 0, 'c70e7726e60f81af3640068208a94a6849392bdb'),
(12, '08136617350', '346c855b9a6728e7fedfd7e4433a75d98f267cb4cf5905cf492374c38d360d56c92005f007751953', '', 'oyinda', 'olashoju', 'oolashoju@gmail.com', '0000-00-00', '', NULL, NULL, '', 'taiwo.oniruakintokun@gmail.com', 'Y', 'pending_verification', 'activated', '2015-01-27', '0000-00-00 00:00:00', 'T64426751', '2015-01-26 22:00:00', 0, '0000-00-00 00:00:00', 0, 'cf5905cf492374c38d360d56c92005f007751953'),
(13, '07035045787', 'e4f00aa7db700d42a4f13ee1ca893ffc6338bd476f42231f1958077876efcc0e9594994f2451f374', '', 'olufemi', 'adeniregun', 'boxer2905@yahoo.ca', '0000-00-00', '', NULL, NULL, '', '', 'N', 'pending_verification', 'pending_activation', '2015-01-27', '0000-00-00 00:00:00', 'T48486665', '2015-01-26 22:00:00', 0, '0000-00-00 00:00:00', 0, '6f42231f1958077876efcc0e9594994f2451f374'),
(14, '08087000074', 'b51e6d571d7028831946849ed06382b979a1b4ba01da27b64a3f0a527cb3ac3dac10723835c21701', '', 'boro', 'akintunde', 'olajobi@hotmail.com', '0000-00-00', '', NULL, NULL, '08087000074', '', 'Y', 'pending_verification', 'activated', '2015-01-27', '0000-00-00 00:00:00', 'T97518795', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, '01da27b64a3f0a527cb3ac3dac10723835c21701'),
(15, '08077770771', '39f8524d24d4e2cb5cb27beea0adb44d84a1707de49eaeedea18394a89f93c7ebf45bd1ef4016f96', '', 'Sherif', 'Kabiawu', 'sherifkk@gmail.com', '0000-00-00', '', NULL, NULL, '', '', 'Y', 'pending_verification', 'activated', '2015-01-27', '0000-00-00 00:00:00', 'T52362783', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, 'e49eaeedea18394a89f93c7ebf45bd1ef4016f96'),
(16, '08035523397', 'fa1aa8849fb54644b6c08c627debc41631f24a8fc0652a399477e8ea4cde07efcf7612d07645cf11', '', 'Cyril', 'Nwabudike', 'cyril_nwa@yahoo.co.uk', '0000-00-00', '', NULL, NULL, '', 'uchechm2001@yahoo.co.uk', 'Y', 'pending_verification', 'activated', '2015-01-27', '0000-00-00 00:00:00', 'T95336559', '2015-01-26 22:00:00', 0, '0000-00-00 00:00:00', 0, 'c0652a399477e8ea4cde07efcf7612d07645cf11'),
(17, '08050703000', '5a226aa1b64d6030ab6b037f47a98afa3d5d5c456dbd1b95f846daf7453d817e97a3399f94ee33c7', '', 'Albert', 'iyorah', 'al@al-brett.com', '0000-00-00', '', NULL, NULL, '', '', 'N', 'pending_verification', 'pending_activation', '2015-01-27', '0000-00-00 00:00:00', 'T92541598', '2015-01-26 22:00:00', 0, '0000-00-00 00:00:00', 0, '6dbd1b95f846daf7453d817e97a3399f94ee33c7'),
(18, '07089997466', '80679cedc948169d8948109041ace00b355eb422bb0baae35e4e4f752c0b1dda0013d3b8d51d261f', '', 'Taiwo', 'Oniru-Akintokun', 'taiwo.oniruakintokun@gmail.com', '0000-00-00', '', NULL, NULL, '', 'allaboutprintsng@gmail.com', 'Y', 'pending_verification', 'activated', '2015-01-27', '0000-00-00 00:00:00', 'T21796886', '2015-01-26 22:00:00', 0, '0000-00-00 00:00:00', 0, 'bb0baae35e4e4f752c0b1dda0013d3b8d51d261f'),
(19, '08034021948', 'c840d118daeac8fce5a8bbf6421f29cd1a8961954e40eb179486cf08df699349b22e877752483a4b', '', 'martin', 'okulaja', 'martin.okulaja@addaxpetroleum.com', '0000-00-00', '', NULL, NULL, '', '', 'N', 'pending_verification', 'pending_activation', '2015-01-27', '0000-00-00 00:00:00', 'T53238698', '2015-01-26 22:00:00', 0, '0000-00-00 00:00:00', 0, '4e40eb179486cf08df699349b22e877752483a4b'),
(20, '07089995322', '80c8755ede2048f5dac4f84e056f4906216ef1dba03d5dda379a5e53887ef85182c49cda13dde416', '', 'kehinde', 'adewole', 'allaboutprintng@gmail.com', '0000-00-00', '', NULL, NULL, '08187998418', 'hamptonsuites@gmail.com', 'N', 'pending_verification', 'pending_activation', '2015-01-27', '0000-00-00 00:00:00', 'T37154944', '2015-01-26 22:00:00', 0, '0000-00-00 00:00:00', 0, 'a03d5dda379a5e53887ef85182c49cda13dde416'),
(21, '08023122015', 'ad7316391496cc0a5e8c776cb85d8417f8a03a2b077738d83041273c1c8f73b5e42b349dafa51425', '', 'matthew', 'karieren', 'mkarieren@yahoo.co.uk', '0000-00-00', '', NULL, NULL, '', '', 'Y', 'pending_verification', 'activated', '2015-01-27', '0000-00-00 00:00:00', 'T30495815', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, '077738d83041273c1c8f73b5e42b349dafa51425'),
(22, '08072797167', '3ee9fb084577a8434232627011eac19e7787f74ba2c42f208d6dfcbb90453a447c11d30633699a70', '', 'fola', 'aganga-williams', 'fogagtta@aol.com', '0000-00-00', '', NULL, NULL, '', '', 'N', 'pending_verification', 'pending_activation', '2015-01-27', '0000-00-00 00:00:00', 'T87434858', '2015-01-26 22:00:00', 0, '0000-00-00 00:00:00', 0, 'a2c42f208d6dfcbb90453a447c11d30633699a70'),
(23, '08032001964', '61dd8869aa96e7af5de1f484bdae6f81ce4cdabcd818f72830ea339dfeab8fb08e47ff4f1ab182b1', '', 'shoyinka', 'shodunke', 'shoyins@mtnngeria.net', '0000-00-00', '', NULL, NULL, '', '', 'N', 'pending_verification', 'pending_activation', '2015-01-27', '0000-00-00 00:00:00', 'T75276615', '2015-01-26 22:00:00', 0, '0000-00-00 00:00:00', 0, 'd818f72830ea339dfeab8fb08e47ff4f1ab182b1'),
(24, '08029311012', 'e02dc181aedf8d5dfea1f4f525c3b7f3bed3b78e8178d0213c3d9e7ed28411b1c5a0e2fff44fe7e8', '', 'aderinko', 'eliot', 'rinkoeliot@yahoo.com', '0000-00-00', '', NULL, NULL, '08029311012', '', 'N', 'pending_verification', 'pending_activation', '2015-01-27', '0000-00-00 00:00:00', 'T47838511', '2015-01-26 22:00:00', 0, '0000-00-00 00:00:00', 0, '8178d0213c3d9e7ed28411b1c5a0e2fff44fe7e8'),
(25, '08027000960', 'e966f6f85a78277e70475b792a5225a748f3d801076398ee4b9af67077e9d2f5cd02bf0a71d655d1', '', 'princess', 'ogunlusi', 'helleanababe@ymail.com', '0000-00-00', '', NULL, NULL, '08127464834', '', 'N', 'pending_verification', 'pending_activation', '2015-01-27', '0000-00-00 00:00:00', 'T89465836', '2015-01-26 22:00:00', 0, '0000-00-00 00:00:00', 0, '076398ee4b9af67077e9d2f5cd02bf0a71d655d1'),
(26, '07067839263', '5f7d340b33d530013ff43f933555cfbd21d9837af1b3d9efc0ebe01da895c5311311844dda211de9', '', 'obianuju', 'ogubuike', 'Oby_ogu@yahoo.com', '0000-00-00', '', NULL, NULL, '08085247131', 'komolafeemioluwa@yahoo.com', 'N', 'pending_verification', 'pending_activation', '2015-01-27', '0000-00-00 00:00:00', 'T58920844', '2015-01-26 22:00:00', 0, '0000-00-00 00:00:00', 0, 'f1b3d9efc0ebe01da895c5311311844dda211de9'),
(27, '08032008540', '3034335974963b9c37d1623170afa25d805fc77ca255beac0298d2699b25883f598032b4d859cbeb', '', 'olufemi', 'oyenuga', 'olufemo@mtnnigeria.net', '0000-00-00', 'Lagos', '', '', '0809992407', 'enitana@hotmail.com', 'Y', 'pending_verification', 'activated', '2015-01-27', '0000-00-00 00:00:00', 'T96287613', '2015-01-26 22:00:00', 0, '0000-00-00 00:00:00', 0, 'a255beac0298d2699b25883f598032b4d859cbeb'),
(28, '08032024429', '5137a1606eecbc1f69d3952164d8ee1155fba5b1dd200ba888e56b1f34f7afae40d2adfd2b474edb', '', 'mary', 'fasheitan', 'mfasheitan@gmail.com', '0000-00-00', '', NULL, NULL, '07025015135', '', 'N', 'pending_verification', 'pending_activation', '2015-01-27', '0000-00-00 00:00:00', 'T72116850', '2015-01-26 22:00:00', 0, '0000-00-00 00:00:00', 0, 'dd200ba888e56b1f34f7afae40d2adfd2b474edb'),
(29, '08050703000', '8be9655c3a8574747b599abce2e9592bb430839164e7fb03dc1997ab1ccc9f36c10ef514edb42fd9', '', 'albert', 'iyorah', 'albrett2001@yahoo.com', '0000-00-00', '', NULL, NULL, '', '', 'N', 'pending_verification', 'pending_activation', '2015-01-27', '0000-00-00 00:00:00', 'T79682796', '2015-01-26 22:00:00', 0, '0000-00-00 00:00:00', 0, '64e7fb03dc1997ab1ccc9f36c10ef514edb42fd9'),
(30, '08125078696', '5a226aa1b64d6030ab6b037f47a98afa3d5d5c45a0ad36184d36a695a332ba691ff054c2d51d9664', '', 'christopher', 'kelechukwu', 'wziwabo11@yahoo.es', '0000-00-00', '', NULL, NULL, '', '', 'N', 'pending_verification', 'pending_activation', '2015-01-27', '0000-00-00 00:00:00', 'T99803593', '2015-01-26 22:00:00', 0, '0000-00-00 00:00:00', 0, 'a0ad36184d36a695a332ba691ff054c2d51d9664'),
(31, '08035956295', '5a94b98ac8eaf88477cfc8f0713f2ec0c8b0a7f6ab86623f5902fd2cd2629fcac9cb5a82e95bb253', '', 'david', 'yerima', 'yerimadh@gnail.com', '0000-00-00', '', NULL, NULL, '', '', 'N', 'pending_verification', 'pending_activation', '2015-01-27', '0000-00-00 00:00:00', 'T65763866', '2015-01-26 22:00:00', 0, '0000-00-00 00:00:00', 0, 'ab86623f5902fd2cd2629fcac9cb5a82e95bb253'),
(32, '08023234910', 'ad8167df4b75bd9f2e165ea9f6053195cf7652b5383c6672dfa4ee9ce8fc2e5cafa5c8e9c734192d', '', 'ola', 'beldore', 'olabeldore@yahoo.com', '0000-00-00', '', NULL, NULL, '', '', 'N', 'pending_verification', 'pending_activation', '2015-01-27', '0000-00-00 00:00:00', 'T28515795', '2015-01-26 22:00:00', 0, '0000-00-00 00:00:00', 0, '383c6672dfa4ee9ce8fc2e5cafa5c8e9c734192d'),
(33, '08032009295', '51809ec6a14a186236d0cbbd86492f05c625d599891fa370a1cecfa053e78e2ce69f0cc6cfb8b433', '', 'Ebuka', 'Ezewuzie', 'ebuka@vationsys.com', '0000-00-00', '', NULL, NULL, '', 'onwodi.elizabeth@gmail.com', 'N', 'pending_verification', 'password_reset_pending', '2015-01-27', '0000-00-00 00:00:00', 'T29155747', '2015-01-26 22:00:00', 0, '0000-00-00 00:00:00', 0, '891fa370a1cecfa053e78e2ce69f0cc6cfb8b433'),
(34, '08022224320', 'b9bcc2a3e0c92e60e9f7397f8b775ebfe3368ceb2082354ff6b07050fd36b5d3601df79b0927564a', '', 'Babajide', 'Akintokun', 'akintokun7@gmail.com', '0000-00-00', '', NULL, NULL, '08058074266', '', 'N', 'pending_verification', 'pending_activation', '2015-01-27', '0000-00-00 00:00:00', 'T36717728', '2015-01-26 22:00:00', 0, '0000-00-00 00:00:00', 0, '2082354ff6b07050fd36b5d3601df79b0927564a'),
(35, '08035036336', 'b91a522530876fb29d9f500296fa39627fd65af4015f2aa7403a90e1d49397eeeaec402302c597ac', '', 'charles', 'anyanwu', 'demo4eva@hotmail.com', '0000-00-00', '', NULL, NULL, '', '', 'N', 'pending_verification', 'pending_activation', '2015-01-27', '0000-00-00 00:00:00', 'T36511547', '2015-01-26 22:00:00', 0, '0000-00-00 00:00:00', 0, '015f2aa7403a90e1d49397eeeaec402302c597ac'),
(36, '08120173873', 'e2e28b0d60379b249bc2da51c7ef7ac14f4e32915232e5917011006bcbce920cff9199bd39c01267', '', 'omolola', 'ogunmoroti', 'teju_4real@yahoo.com', '0000-00-00', '', NULL, NULL, '', '', 'N', 'pending_verification', 'pending_activation', '2015-01-27', '0000-00-00 00:00:00', 'T17724939', '2015-01-26 22:00:00', 0, '0000-00-00 00:00:00', 0, '5232e5917011006bcbce920cff9199bd39c01267'),
(37, '07062261028', '6f058999688b1f99141c5af5e89340da87649e3558189457267f5b140d1f9ea66ee5887f099f0828', '', 'olatubosun', 'ebenezer', 'tubosun4dare@yahoo.com', '0000-00-00', '', NULL, NULL, '07062261028', '', 'N', 'pending_verification', 'pending_activation', '2015-01-27', '0000-00-00 00:00:00', 'T37956750', '2015-01-26 22:00:00', 0, '0000-00-00 00:00:00', 0, '58189457267f5b140d1f9ea66ee5887f099f0828'),
(38, '08060145470', '1b95dc5c1ebdf97b91f7547a251d254352ceeb4f268502426a686db274e1e45b564b720d22af24cd', '', 'SHEILA', 'HUNTER', 'sheila.hunter80@yahoo.com', '1976-12-09', 'Lagos', '15B, A.J MARINHO \r\n\r\nDRIVE. OFF SINARI DARANIJO STREET. VICTORIA ISLAND, LAGOS.', 'SHOP 20, MURPHIS PLAZA. 27 SANUSI \r\n\r\nFAFUNWA STREET. VICTORIA ISLAND, LAGOS.', '08037689872', '', 'N', 'pending_verification', 'activated', '2015-01-27', '0000-00-00 00:00:00', 'T67681831', '2015-01-26 22:00:00', 0, '0000-00-00 00:00:00', 0, '268502426a686db274e1e45b564b720d22af24cd'),
(39, '08092222224', 'cf6ac4a6ca897e3fc5c85d9a0725136cb96359809d79d6f7393beca4ff91911084bea0bae812bad0', '', 'Jide', 'Shitta-Bey', 'jidebey@hotmail.com', '2015-10-19', 'Lagos', '', '', '08092222224', 'ssbey@yahoo.com', 'Y', 'pending_verification', 'activated', '2015-01-27', '0000-00-00 00:00:00', 'T56608843', '2015-01-26 22:00:00', 0, '0000-00-00 00:00:00', 0, '9d79d6f7393beca4ff91911084bea0bae812bad0'),
(40, '08038077536', 'ca9290d12ce41b907521589d52120245481ab028eb51ab0260733f8dddcad4fad1b4923e6f6f3e38', '', 'murphy', 'okojie', 'info@shaunzbar.com', '0000-00-00', '', NULL, NULL, '', '', 'N', 'pending_verification', 'pending_activation', '2015-01-27', '0000-00-00 00:00:00', 'T52655704', '2015-01-26 22:00:00', 0, '0000-00-00 00:00:00', 0, 'eb51ab0260733f8dddcad4fad1b4923e6f6f3e38'),
(41, '08077707604', 'aa6607648fcad41c3184bad127215ef4e6e2b0640c76050950868c9dcd67efedcc3dd4db95dc80e5', '', 'kaee', 'kekere', 'kaekekere@gmail.com', '0000-00-00', 'Lagos', '', '', '', '', 'Y', 'pending_verification', 'activated', '2015-01-27', '0000-00-00 00:00:00', 'T18772647', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, '0c76050950868c9dcd67efedcc3dd4db95dc80e5'),
(42, '08023096473', '761f03d4178bcbbabbfa615862813f5ba51beccd604eefd252e9fc40fbc8f75048b71290cf7299bd', '', 'lolo', 'majin', 'lolomajin@yahoo.com', '0000-00-00', '', NULL, NULL, '', '', 'N', 'pending_verification', 'pending_activation', '2015-01-27', '0000-00-00 00:00:00', 'T24731869', '2015-01-26 22:00:00', 0, '0000-00-00 00:00:00', 0, '604eefd252e9fc40fbc8f75048b71290cf7299bd'),
(43, '08034563328', '5ffb609b008b9750d8b43c24b4ec0da0d4d890dd81766452c8a88d9972cef86e946b1c5747467c64', '', 'Valentine', 'anozia', 'vanozia@yahoo.com', '0000-00-00', '', NULL, NULL, '', '', 'N', 'pending_verification', 'pending_activation', '2015-01-27', '0000-00-00 00:00:00', 'T97552623', '2015-01-26 22:00:00', 0, '0000-00-00 00:00:00', 0, '81766452c8a88d9972cef86e946b1c5747467c64'),
(44, '08037050786', 'be9d817956a02895c65b8c7d709947574b243ae312b7583613a0f357af4d05fc98fc67d7aae0d82e', '', 'nurad', 'ahmed', 'goldenhammer62@yahoo.co.uk', '0000-00-00', '', NULL, NULL, '', '', 'N', 'pending_verification', 'pending_activation', '2015-01-27', '0000-00-00 00:00:00', 'T71666624', '2015-01-26 22:00:00', 0, '0000-00-00 00:00:00', 0, '12b7583613a0f357af4d05fc98fc67d7aae0d82e'),
(45, '08033009988', '5721aa1bea612935762b60d45d0717650b885b9f94e08db3cd340efd1c96fbd95f001f507204d51d', '', 'marshall', 'onwuameze', 'marshallonwuameze@yahoo.com', '0000-00-00', '', NULL, NULL, '', '', 'N', 'pending_verification', 'pending_activation', '2015-01-27', '0000-00-00 00:00:00', 'T25395975', '2015-01-26 22:00:00', 0, '0000-00-00 00:00:00', 0, '94e08db3cd340efd1c96fbd95f001f507204d51d'),
(46, '08077719777', 'e2e28b0d60379b249bc2da51c7ef7ac14f4e32917e1c33f93ab0d066a4f3a404e49756b00368d70b', '', 'supa', 'famuyiwa', 'sgsl@qualityssrvice.com', '0000-00-00', '', NULL, NULL, '', '', 'N', 'pending_verification', 'pending_activation', '2015-01-27', '0000-00-00 00:00:00', 'T88356807', '2015-01-26 22:00:00', 0, '0000-00-00 00:00:00', 0, '7e1c33f93ab0d066a4f3a404e49756b00368d70b'),
(47, '07030012223', '244d09089d6d4ec23f0fd6ff3c242eecfb47da5391623f7c419f6f1d9383fce070e57d71fd49760a', '', 'kayode', 'olaleye', 'olaleye@eyespynigeria.com', '0000-00-00', '', NULL, NULL, '', '', 'N', 'pending_verification', 'pending_activation', '2015-01-27', '0000-00-00 00:00:00', 'T31740864', '2015-01-26 22:00:00', 0, '0000-00-00 00:00:00', 0, '91623f7c419f6f1d9383fce070e57d71fd49760a'),
(48, '07038409739', '897506856fd395cde74953a73bfada2515b8efb3d276860150efb2398d7eb5a03ccf613b9f88dd1a', '', 'Abisola', 'Olowe', 'bslash90@yahoo.com', '1990-07-06', 'Lagos', '', '', '09024002000', '', 'Y', 'pending_verification', 'activated', '2015-01-27', '0000-00-00 00:00:00', 'T36592618', '2015-01-26 22:00:00', 0, '0000-00-00 00:00:00', 0, 'd276860150efb2398d7eb5a03ccf613b9f88dd1a'),
(49, '08069027132', 'e4ffacba5591440a14a08eac7aade57c603e17c0579e5969a6b46e3606e9ff54e752064381561b37', '', 'Bukola', 'Kolade', 'tessybukkie@yahoo.com', '0000-00-00', '', '', '', '', '', 'N', 'pending_verification', 'pending_activation', '2015-01-27', '0000-00-00 00:00:00', 'T62820966', '2015-01-26 22:00:00', 0, '0000-00-00 00:00:00', 0, '579e5969a6b46e3606e9ff54e752064381561b37'),
(50, '08034498798', 'd9f28df53dee3578788c4281033a4d1973ac53f89dd0a9681aa53a38405662a5acdad351a2b89c0b', '', 'Rofiat', 'abdulazeez', 'rofiatabdul@gmail.com', '0000-00-00', '', NULL, NULL, '', '', 'N', 'pending_verification', 'pending_activation', '2015-01-27', '0000-00-00 00:00:00', 'T13769515', '2015-01-26 22:00:00', 0, '0000-00-00 00:00:00', 0, '9dd0a9681aa53a38405662a5acdad351a2b89c0b'),
(51, '07068392470', '78c392bfbce7e086ce6e220312f9325859c739786fb9490129f564a41a76f5e7189402e8a3acab0d', '', 'Awobotu', 'omowunmi', 'omocheezy@yahoo.com', '0000-00-00', '', NULL, NULL, '07033268322', '', 'N', 'pending_verification', 'pending_activation', '2015-01-27', '0000-00-00 00:00:00', 'T50559831', '2015-01-26 22:00:00', 0, '0000-00-00 00:00:00', 0, '6fb9490129f564a41a76f5e7189402e8a3acab0d'),
(52, '07068392470', 'e492b50c252a934fd13723948a7096189410d13a94187cafb4bae749ac497b678131caa5f6544998', '', 'Awobotu', 'omowunmi', 'omocheezy@gmail.com', '0000-00-00', 'Lagos', '', '', '07033268322', '', 'N', 'pending_verification', 'pending_activation', '2015-01-27', '0000-00-00 00:00:00', 'T68746663', '2015-01-26 22:00:00', 0, '0000-00-00 00:00:00', 0, '94187cafb4bae749ac497b678131caa5f6544998'),
(53, '08066295989', '0599037793240a48d8b75c6486438fbeb3ea82979bc266a3b180805bd7fad341cdff04bcc421293b', '', 'Ogunsanya', 'Nelson', 'ogunsanya_abiodunnelson@yahoo.com', '0000-00-00', 'Lagos', '', '', '08027028781', '', 'Y', 'pending_verification', 'activated', '2015-01-28', '0000-00-00 00:00:00', 'T36121657', '2015-01-27 22:00:00', 0, '0000-00-00 00:00:00', 0, '9bc266a3b180805bd7fad341cdff04bcc421293b'),
(54, '07988764008', '9c19f986292d1545410f11e3a71a20e836aeccb0759a7762f627f66cea9344737e09f33d56d87439', '', 'francis', 'Euzebio', 'francis.euzebio@yahoo.com', '0000-00-00', '', NULL, NULL, '', '', 'Y', 'pending_verification', 'activated', '2015-01-28', '0000-00-00 00:00:00', 'T75464529', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, '759a7762f627f66cea9344737e09f33d56d87439'),
(55, '00912404639853', '71e075f4e133d710600abb698be31d7269feb5a85c3579c75bf6f14102e0193735fa49e9e09de075', '', 'Suraju', 'Arogundade', 'Sarogundade@yahoo.com', '1961-05-26', 'Lagos', '', '', '00912404639853', '', 'Y', 'pending_verification', 'activated', '2015-01-28', '0000-00-00 00:00:00', 'T67778568', '2015-01-27 22:00:00', 0, '0000-00-00 00:00:00', 0, '5c3579c75bf6f14102e0193735fa49e9e09de075'),
(56, '08061352555', '21f98853e19c631b72e83da3f3cee6bb425514c30e5e4d87a1587631ded7d1c201657dd399802ea5', '', 'nosa', 'o', 'ogbemski@yahoo.co.uk', '0000-00-00', '', NULL, NULL, '', '', 'Y', 'pending_verification', 'activated', '2015-01-28', '0000-00-00 00:00:00', 'T15239838', '2015-01-27 22:00:00', 0, '0000-00-00 00:00:00', 0, '0e5e4d87a1587631ded7d1c201657dd399802ea5'),
(57, '07055238880', '22665f9cd19cc9946cf921623d4dcab834b221e4cfb287894b04e4fd73ec8e2eeaeb878d2001ed74', '', 'Akinola', 'Sawyerr', 'a_sawyerr@yahoo.co.uk', '0000-00-00', '', NULL, NULL, '', 'jasonmycroft@gmail.com', 'Y', 'pending_verification', 'activated', '2015-01-28', '0000-00-00 00:00:00', 'T90775775', '2015-01-27 22:00:00', 0, '0000-00-00 00:00:00', 0, 'cfb287894b04e4fd73ec8e2eeaeb878d2001ed74'),
(58, '07042689772', 'a5a31d538f4ebbcb86d008e214f5008bfea4dace1bb82d34413ffe1ce80e4fb3f8c689d52d2ea947', '', 'Godwin', 'Anthony', 'Nsisong2000@yahoo.co.uk', '0000-00-00', 'Lagos', '', '', '', '', 'N', 'pending_verification', 'pending_activation', '2015-01-28', '0000-00-00 00:00:00', 'T49395910', '2015-01-27 22:00:00', 0, '0000-00-00 00:00:00', 0, '1bb82d34413ffe1ce80e4fb3f8c689d52d2ea947'),
(59, '8033980242', '32d254f0c0c00976bd4f47397d7463cc3d97b0d097424d7a8aa2512b8810ffb98dd77a3ce570c46a', '', 'Doyin', 'Ogunnoiki', 'ddoyinaquarious@gmail.com', '0000-00-00', '', NULL, NULL, '8090111122', '', 'N', 'pending_verification', 'pending_activation', '2015-01-28', '0000-00-00 00:00:00', 'T86348809', '2015-01-27 22:00:00', 0, '0000-00-00 00:00:00', 0, '97424d7a8aa2512b8810ffb98dd77a3ce570c46a'),
(60, '08136138275', 'dc0ecefac6f5db0a41bebf631ba836132a1f7c1415ddf908a822d20fbcf6ae2209a8b82fe21197dc', '', 'Adetutu', 'onadeko', 'onadekosunbo@yahoo.com', '0000-00-00', '', NULL, NULL, '', '', 'Y', 'pending_verification', 'activated', '2015-01-28', '0000-00-00 00:00:00', 'T60469868', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, '15ddf908a822d20fbcf6ae2209a8b82fe21197dc'),
(61, '+447415335055', '174d92e0c1165ea798787d90e984222f5dc62ef5a2c45b9aeb8162bf59d7304b960a24cf4e52934c', '', 'Akindele', 'Age', 'Akin.afe@hotmail.com', '0000-00-00', '', NULL, NULL, '', '', 'N', 'pending_verification', 'pending_activation', '2015-01-28', '0000-00-00 00:00:00', 'T32646810', '2015-01-27 22:00:00', 0, '0000-00-00 00:00:00', 0, 'a2c45b9aeb8162bf59d7304b960a24cf4e52934c'),
(62, '08027194743', '82cadcbe15a7dbd9ddda639cf07b6e8b49d0fd9111965e876b08a92b9c6f93b645655159049a41ed', '', 'SULAIMON', 'OLAOTAN', 'sulaimonolaotan@yahoo.com', '0000-00-00', 'Lagos', '', '', '', '', 'Y', 'pending_verification', 'activated', '2015-01-28', '0000-00-00 00:00:00', 'T52637876', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, '11965e876b08a92b9c6f93b645655159049a41ed'),
(63, '+44 7427 690704', '4ef010f38c222d2d05d28da45ea638e73b1730f4ab00350ade394005760b501ea7de948b4b6e6ad6', '', 'Kareem', 'Arogundade', 'Arogundadekareem@gmail.com', '0000-00-00', '', NULL, NULL, '', '', 'Y', 'pending_verification', 'activated', '2015-01-28', '0000-00-00 00:00:00', 'T58224926', '2015-01-27 22:00:00', 0, '0000-00-00 00:00:00', 0, 'ab00350ade394005760b501ea7de948b4b6e6ad6'),
(64, '08036984014', '4fcb6bb5e9ae5bc7cf39ca692f1ecd4e1afe20591893bac4b3838c3759238d2e9c944990003cd1a9', '', 'Taiwo', 'Joseph', 'tobi4reel2001@gmail.com', '0000-00-00', '', NULL, NULL, '07039225786', '', 'Y', 'pending_verification', 'activated', '2015-01-29', '0000-00-00 00:00:00', 'T83164923', '2015-01-28 22:00:00', 0, '0000-00-00 00:00:00', 0, '1893bac4b3838c3759238d2e9c944990003cd1a9'),
(65, '08023444882', '7672db5dab97a7deee529011fff02bcc07fb557a3e882e7d5df46843c08b10e229973d91da73083c', '', 'Motunrayo', 'Adebo', 'tumo2mo@yahoo.com', '0000-00-00', 'Lagos', '', '', '', '', 'Y', 'pending_verification', 'activated', '2015-01-29', '0000-00-00 00:00:00', 'T40569989', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, '3e882e7d5df46843c08b10e229973d91da73083c'),
(66, '08082994560', '7ac9c4696d8385594a33a9152a6af988dd6660797943736955195712fe7008c72208bac15bbf7e0b', '', 'Odunayo', 'Adams', 'adamsodunayo@gmail.com', '0000-00-00', '', NULL, NULL, '', '', 'N', 'pending_verification', 'password_reset_pending', '2015-01-29', '0000-00-00 00:00:00', 'T70616576', '2015-01-28 22:00:00', 0, '0000-00-00 00:00:00', 0, '7943736955195712fe7008c72208bac15bbf7e0b'),
(67, '08104663302', '0628ead79b20b89d87347c387faf2748908ce062b5dad97f7625f5a0c84f696e1ac30a9d05274a11', '', 'Oluwatobi', 'Samuel', 'tboypompin@gmail.com', '0000-00-00', '', NULL, NULL, '', '', 'Y', 'pending_verification', 'activated', '2015-01-29', '0000-00-00 00:00:00', 'T88906565', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, 'b5dad97f7625f5a0c84f696e1ac30a9d05274a11'),
(68, '08171114417', '781cce384f139cd41bfb77b7a2221735bf09d62eba1dd3f69b99e0718a9d0d138276b6f9023284b5', '', 'modinat', 'yusuf', 'aprise_17@yahoo.com', '0000-00-00', '', NULL, NULL, '08026235688', '', 'N', 'pending_verification', 'pending_activation', '2015-01-29', '0000-00-00 00:00:00', 'T32171851', '2015-01-28 22:00:00', 0, '0000-00-00 00:00:00', 0, 'ba1dd3f69b99e0718a9d0d138276b6f9023284b5'),
(69, '08032571367', '5aaf8905f32a43e8dd1a2ea0cbacb689428ccecdaf1b480e0842059294a5fc2517aa1b17befaa738', '', 'ADEGBESAN', 'OLANREWAJU', 'dailysun2004@yahoo.com', '0000-00-00', 'Lagos', '', '', '08032571367', '', 'Y', 'pending_verification', 'activated', '2015-01-29', '0000-00-00 00:00:00', 'T80339858', '2015-01-28 22:00:00', 0, '0000-00-00 00:00:00', 0, 'af1b480e0842059294a5fc2517aa1b17befaa738'),
(70, '08028442500', 'b0ad1f3ee87becbeaf26c4d4db2bd6a6627453a042d91712469ae51ea9bffa9062a482ae34e6769d', '', 'Tayelolu', 'hassan', 'mailboxfifty3@gmail.com', '0000-00-00', '', NULL, NULL, '', 'adekoyasaheed@yahoo.com', 'N', 'pending_verification', 'pending_activation', '2015-01-29', '0000-00-00 00:00:00', 'T33680738', '2015-01-28 22:00:00', 0, '0000-00-00 00:00:00', 0, '42d91712469ae51ea9bffa9062a482ae34e6769d'),
(71, '07063376867', 'd671a50eedd486f5c063c540cbf8a8edc88ae4e9503d2fa467d863c3f588729991ad768a0d568a7c', '', 'Abdurrahman', 'Adebiyi', 'abdbaddude@gmail.com', '0000-00-00', '', NULL, NULL, '08051600166', '', 'N', 'pending_verification', 'pending_activation', '2015-01-29', '0000-00-00 00:00:00', 'T41994715', '2015-01-28 22:00:00', 0, '0000-00-00 00:00:00', 0, '503d2fa467d863c3f588729991ad768a0d568a7c'),
(72, '+2348090657799', 'c89a78ea877db56e0603081a5121a58a93d6c5f3cf2a618b0fbc15204f30e425cd8cd121b3ab1e05', '', 'Don', 'Abdul-Kareem', 'kpapetson@gmail.com', '0000-00-00', 'Lagos', '', '', '', 'a_okikan@yahoo.com', 'Y', 'pending_verification', 'activated', '2015-01-30', '0000-00-00 00:00:00', 'T65433952', '2015-01-29 22:00:00', 0, '0000-00-00 00:00:00', 0, 'cf2a618b0fbc15204f30e425cd8cd121b3ab1e05'),
(73, '08053653935', '3e855f8b2a244379f50e4c6078ba001eb06a32f4412e13615319bcf84066e47c16fa8f29f7860c22', '', 'Uche', 'Adophy', 'adophyuche@gmail.com', '0000-00-00', '', NULL, NULL, '07035138365', '', 'Y', 'pending_verification', 'activated', '2015-01-30', '0000-00-00 00:00:00', 'T88544909', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, '412e13615319bcf84066e47c16fa8f29f7860c22'),
(74, '08029113957', '67e5e332d36437792b3bf67555ff75ede1a2daf1058fc3f4cdbc3b5b3b61c0f712bf32b75e997e42', '', 'Nkechi', 'Emeruwa', 'kechiwam@gmail.com', '0000-00-00', 'Lagos', '', '', '', '', 'Y', 'pending_verification', 'activated', '2015-01-30', '0000-00-00 00:00:00', 'T84343805', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, '058fc3f4cdbc3b5b3b61c0f712bf32b75e997e42'),
(75, '08055137237', 'bcd349b26f7a6d8f52bc75865130acb0f22b3118166a25ae13237d21e620a4f6f4335408a411ed61', '', 'seni', 'olumole', 'seni.olumole@gmail.com', '0000-00-00', '', NULL, NULL, '', '', 'N', 'pending_verification', 'pending_activation', '2015-01-31', '0000-00-00 00:00:00', 'T48938668', '2015-01-30 22:00:00', 0, '0000-00-00 00:00:00', 0, '166a25ae13237d21e620a4f6f4335408a411ed61'),
(76, '08029858731', '24ebebdc9fbc728227dccd1424c4c259eb13fe5b8e55d922116a7cf4fde0ceaa929910a0a3cce492', '', 'Bukola', 'Oshinyemi', 'bukolaoshinyemi@gmail.com', '0000-00-00', 'Lagos', '', '', '', 'davidobatusi@yahoo.com', 'Y', 'pending_verification', 'activated', '2015-02-01', '0000-00-00 00:00:00', 'T73434650', '2015-01-31 22:00:00', 0, '0000-00-00 00:00:00', 0, '8e55d922116a7cf4fde0ceaa929910a0a3cce492'),
(77, '07055555487', '181b19b8804016be8e77f45e4bf346d7b7108665240ad450c490664656c171e1816321b6755b1019', '', 'Funmilayo', 'Atolagbe', 'fatolagbe@hotmail.com', '0000-00-00', '', NULL, NULL, '', '', 'N', 'pending_verification', 'pending_activation', '2015-02-01', '0000-00-00 00:00:00', 'T56306712', '2015-01-31 22:00:00', 0, '0000-00-00 00:00:00', 0, '240ad450c490664656c171e1816321b6755b1019'),
(78, '07012084678', 'a34e4401be5e1d4ed76312a2e860201ada64ff5a165b581788a671dfc5516e9841131a6688114fbe', '', 'Idara', 'Usoro', 'usoroidee@gmail.com', '0000-00-00', 'Lagos', '', '', '07082224616', '', 'Y', 'pending_verification', 'activated', '2015-02-02', '0000-00-00 00:00:00', 'T43897719', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, '165b581788a671dfc5516e9841131a6688114fbe'),
(79, '077088330546', 'b793288c9aea6d4519fb47cc0a30877766216b807aa4e2661a9cd505de00ad1114afc16d4faeb292', '', 'will', 'leb', 'guillaume.leblond@essec.edu', '0000-00-00', '', NULL, NULL, '', '', 'N', 'pending_verification', 'pending_activation', '2015-02-02', '0000-00-00 00:00:00', 'T80185732', '2015-02-01 22:00:00', 0, '0000-00-00 00:00:00', 0, '7aa4e2661a9cd505de00ad1114afc16d4faeb292'),
(80, '08077311043', 'f765a97def6afa44a6bed0b0bd1b766ab3b30f7905b9f1b491a4c4a454e8e8c894b424fbe5af975b', '', 'victoria', 'lukoh', 'victorialukoh@yahoo.com', '0000-00-00', '', NULL, NULL, '07045047720', 'kmobol@yahoo.com', 'N', 'pending_verification', 'pending_activation', '2015-02-02', '0000-00-00 00:00:00', 'T38465713', '2015-02-01 22:00:00', 0, '0000-00-00 00:00:00', 0, '05b9f1b491a4c4a454e8e8c894b424fbe5af975b'),
(81, '08084334724', '97c34ab4a1b3d9cced432063c221fbfd5172cee18eb20d5b42ccd750300a73cec07370f562e39f52', '', 'Abiola', 'Leshi', 'biolaleshi@yahoo.com', '0000-00-00', '', NULL, NULL, '07032345113', 'abioyeabiodunaisha@yahoo.com', 'N', 'pending_verification', 'pending_activation', '0000-00-00', '0000-00-00 00:00:00', 'T90590696', '2015-02-01 22:00:00', 0, '0000-00-00 00:00:00', 0, '8eb20d5b42ccd750300a73cec07370f562e39f52'),
(82, '+2348031848010', '43bd561c0ec5b58b8fac8b66cd35bed60e60446e6f646b9de7d62b48cd4fba02f44122a7c97c1038', '', 'Rasheedat', 'Olatunji', 'rasheedat.sekoni@yahoo.com', '0000-00-00', '', NULL, NULL, '', '', 'N', 'pending_verification', 'pending_activation', '2015-02-02', '0000-00-00 00:00:00', 'T59827733', '2015-02-01 22:00:00', 0, '0000-00-00 00:00:00', 0, '6f646b9de7d62b48cd4fba02f44122a7c97c1038'),
(83, '08107563212', 'b9c81fea583932071d5b2b977bd72ebf8ed4d18decf1d98e8c70e01a183538079d907668ba463a89', '', 'Jumper', 'Ladipo', 'jumberladipo@gmail.com', '0000-00-00', '', NULL, NULL, '08180799754', '', 'Y', 'pending_verification', 'activated', '2015-02-03', '0000-00-00 00:00:00', 'T53528993', '2015-02-02 22:00:00', 0, '0000-00-00 00:00:00', 0, 'ecf1d98e8c70e01a183538079d907668ba463a89'),
(84, '08032012512', 'bc39061cabf5065b26a24bda75b9b9e39ead8729bbc0656e217da1ae3e71147eeb86d53074ef6078', '', 'Tamara', 'Arogundade', 'tamara@qbsolutionslimited.com', '0000-00-00', '', NULL, NULL, '', '', 'Y', 'pending_verification', 'activated', '2015-02-03', '0000-00-00 00:00:00', 'T58971722', '2015-02-02 22:00:00', 0, '0000-00-00 00:00:00', 0, 'bbc0656e217da1ae3e71147eeb86d53074ef6078'),
(85, '08182149944', '449646b1f2d93e4de1342e96c9cde5d5bc2c96bf5a1154b482e3cdf3c2811ef4531ea71fa302ab21', '', 'Balogun', 'ibrahim', 'Balogunibrahim93@gmail.com', '0000-00-00', '', NULL, NULL, '08163443493', '', 'Y', 'pending_verification', 'activated', '2015-02-06', '0000-00-00 00:00:00', 'T71498891', '2015-02-05 22:00:00', 0, '0000-00-00 00:00:00', 0, '5a1154b482e3cdf3c2811ef4531ea71fa302ab21'),
(86, '08086801464', '830fe47111bf3dc3edb90c8e1a9a10ccebbce20534758d6d89f891337968b4b8f0e6005087447f08', '', 'Atinuke', 'Iroko', 'atinukeiroko@gmail.com', '0000-00-00', 'Lagos', 'Block C 32 flat 4 FAAN \r\n\r\nQuarters Ikeja Lagos', 'Block C 32 flat 4 FAAN Quarters Ikeja Lagos', '', 'Tanitoluwakosi@gmail.com', 'Y', 'pending_verification', 'activated', '2015-02-07', '0000-00-00 00:00:00', 'T33850623', '2015-02-06 22:00:00', 0, '0000-00-00 00:00:00', 0, '34758d6d89f891337968b4b8f0e6005087447f08'),
(87, '+2347034170161', '18c8cb32eecc100c54cb3fa49c34fc7f7ffe8fdaf11d9d37bf870aee6630c476505cef9ef4497a17', '', 'Omotola', 'Olukemi', 'omotolakemi@yahoo.com', '0000-00-00', '', NULL, NULL, '', 'flukkytom@gmail.com', 'Y', 'pending_verification', 'activated', '2015-02-08', '0000-00-00 00:00:00', 'T60525679', '2015-02-07 22:00:00', 0, '0000-00-00 00:00:00', 0, 'f11d9d37bf870aee6630c476505cef9ef4497a17'),
(88, '07066295496', '143a6bdbcbcf9070896cb8ce8059d04020f09f2dd7505bfb68383d775fbc3e2865931618a422ff3f', '', 'Tosin', 'Royal', 'gufrich@gmail.com', '0000-00-00', '', NULL, NULL, '', '', 'N', 'pending_verification', 'pending_activation', '2015-02-09', '0000-00-00 00:00:00', 'T53361714', '2015-02-08 22:00:00', 0, '0000-00-00 00:00:00', 0, 'd7505bfb68383d775fbc3e2865931618a422ff3f'),
(89, '07066295496', '143a6bdbcbcf9070896cb8ce8059d04020f09f2d22d1657e2839e7722dad7ee0d8d67a6dcf686994', '', 'Tosin', 'Royal', 'gulfrich@gmail.com', '0000-00-00', 'Lagos', '', '', '', '', 'Y', 'pending_verification', 'activated', '2015-02-09', '0000-00-00 00:00:00', 'T14366971', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, '22d1657e2839e7722dad7ee0d8d67a6dcf686994'),
(90, '08032290014', '5804e070562cfbf2afa5023b66fa9ebc0293ca95a3b1aad0349dad7556f244ad2f5444bae2c66217', '', 'Olawumi', 'Daniel', 'd.olawumi@yahoo.com', '0000-00-00', 'Lagos', '', '', '08130040014', 'marirulz2000@yahoo.com', 'Y', 'pending_verification', 'activated', '2015-02-09', '0000-00-00 00:00:00', 'T42911546', '2015-02-08 22:00:00', 0, '0000-00-00 00:00:00', 0, 'a3b1aad0349dad7556f244ad2f5444bae2c66217'),
(91, '08141226692', 'e2b3e16e8abdeaea96b7c4fd0de59e310bab20a754145fe42c00c379fe0cad9bc02644fbcc086ebc', '', 'jean', 'amougou', 'mballalucy87@yahoo.com', '1987-06-28', 'Lagos', 'house2mercy house, victory pack \r\n\r\nestate. jankade, lekki', '80B lafiaji way dolphin estate ikoy', '08088032213', 'lisaatuyota@live.co.uk', 'Y', 'pending_verification', 'activated', '2015-02-09', '0000-00-00 00:00:00', 'T20678756', '2015-02-08 22:00:00', 0, '0000-00-00 00:00:00', 0, '54145fe42c00c379fe0cad9bc02644fbcc086ebc'),
(92, '08033528928', '8c19fb9158e8ad0b3f511ace888fe4566f43be2869970fbd0333f4086bf3160336ff4ad77286daaf', '', 'Eme', 'Godwin', 'emelwoklaw@yahoo.com', '0000-00-00', '', NULL, NULL, '01234785', 'agathaadesigbin@yahoo.com', 'N', 'pending_verification', 'pending_activation', '2015-02-09', '0000-00-00 00:00:00', 'T31491827', '2015-02-08 22:00:00', 0, '0000-00-00 00:00:00', 0, '69970fbd0333f4086bf3160336ff4ad77286daaf'),
(93, '08022228577', 'c9d82c91aa3c6cc90fe5a5cf34d59fc9d65d15fed80331dc5d63f87f8be502cf1a2ee4cc6ec8e721', '', 'Arogz', 'Remi', 'lebuyah@gmail.com', '1978-01-26', 'Lagos', 'BLOCK 111 FLAT 2  LSDPC MEDIUM \r\n\r\nHOUSING ESTATE OGBA', '', '', '', 'Y', 'pending_verification', 'activated', '2015-02-12', '0000-00-00 00:00:00', 'T29440809', '2015-02-11 22:00:00', 0, '0000-00-00 00:00:00', 0, 'd80331dc5d63f87f8be502cf1a2ee4cc6ec8e721'),
(94, '08056355261', 'b8fdcc1b46e07bcb50ded710299634b8878c2670d86cbc4067cbc1df11d81ef5dce3193fb51540c3', '', 'omotolani', 'alamu', 'ebony_tee1@yahoo.com', '0000-00-00', '', NULL, NULL, '', 'onigba@yahoo.com', 'N', 'pending_verification', 'pending_activation', '2015-02-12', '0000-00-00 00:00:00', 'T92300824', '2015-02-11 22:00:00', 0, '0000-00-00 00:00:00', 0, 'd86cbc4067cbc1df11d81ef5dce3193fb51540c3'),
(95, '+447447032034', '6e2da379377acb32cd648918dced84af4c661bcfac6dc256953a6c8ce0f7364a46b5635fa9243467', '', 'olalekan', 'benjamin-oguntade', 'ceolababy@yahoo.com', '0000-00-00', '', NULL, NULL, '', '', 'N', 'pending_verification', 'pending_activation', '2015-02-13', '0000-00-00 00:00:00', 'T68692799', '2015-02-12 22:00:00', 0, '0000-00-00 00:00:00', 0, 'ac6dc256953a6c8ce0f7364a46b5635fa9243467'),
(96, '08073154434', '4c175ecb545e9cb7a6fd698cd67ed40b6b23c7bd31310a882378b8fe909f2dfdedb1761c1c49fb4c', '', 'bobby', 'Atos', 'bazuz@bellsouth.net', '0000-00-00', '', NULL, NULL, '', '', 'Y', 'pending_verification', 'password_reset_pending', '2015-02-13', '0000-00-00 00:00:00', 'T67505946', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, '31310a882378b8fe909f2dfdedb1761c1c49fb4c'),
(97, '08026754151', '6a7425302a00f36ff4ced2583a1e3ca6bac368cc74b28f0e2aaf8baafe284ce21cad6e9446600aac', '', 'Abiola', 'Bolu', 'Abiolao@ebsafr.com', '0000-00-00', '', NULL, NULL, '', '', 'Y', 'pending_verification', 'password_reset_pending', '2015-02-16', '0000-00-00 00:00:00', 'T93887847', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, '74b28f0e2aaf8baafe284ce21cad6e9446600aac'),
(98, '08180108808', 'c5c84b973cbfedb0efdd09c8564c0dafb1808bc363af5ec76ee558eecf728cdf4df1cf663206e6cd', '', 'Abies', 'Imonioro', 'Aevbuomwan@gmail.com', '0000-00-00', '', NULL, NULL, '08036666382', '', 'N', 'pending_verification', 'pending_activation', '2015-02-16', '0000-00-00 00:00:00', 'T26361582', '2015-02-15 22:00:00', 0, '0000-00-00 00:00:00', 0, '63af5ec76ee558eecf728cdf4df1cf663206e6cd'),
(100, '07034646873', '70508008e3815e91ab3fdff21b7a07bed2179d7852b9e5794cf924e62e917dfeb2a9aac74cee68fa', '', 'Shola', 'Oyeniyi', 'Tescomagana6@gmail.com', '1987-05-14', 'Lagos', '', '', '07053002779', 'toduwaye2015@gmail.com', 'Y', 'pending_verification', 'activated', '2015-02-16', '0000-00-00 00:00:00', 'T46430909', '2015-02-15 22:00:00', 0, '0000-00-00 00:00:00', 0, '52b9e5794cf924e62e917dfeb2a9aac74cee68fa'),
(101, '08128773337', '36538c62aeda0bcf1528cbcd76697572d9a6d8bbe5ac9c1aa764917052aac59c331c32e3eb3f4590', '', 'Robert', 'Nwaoliwe', 'mrgoodfood@yahoo.com', '0000-00-00', '', NULL, NULL, '08038614735', '', 'N', 'pending_verification', 'pending_activation', '2015-02-16', '0000-00-00 00:00:00', 'T51838664', '2015-02-15 22:00:00', 0, '0000-00-00 00:00:00', 0, 'e5ac9c1aa764917052aac59c331c32e3eb3f4590'),
(102, '08181189301', '9ae14ff213c320dd7cb24657ca750c861a2536cb4bce3fc00464096b0fc41e7d9d2e65ea977d17c4', '', 'Adedoyin', 'Ajayi', 'lamarmiteng@gmail.com', '0000-00-00', 'Lagos', '', '', '08033344287', '', 'Y', 'pending_verification', 'activated', '2015-02-16', '0000-00-00 00:00:00', 'T75919818', '2015-02-15 22:00:00', 0, '0000-00-00 00:00:00', 0, '4bce3fc00464096b0fc41e7d9d2e65ea977d17c4'),
(103, '08134544508', 'ce0b9df962540dbde9e60f77e689cb8fbda273bdf767dedb3038a98b7825c80ae17e8a1a6d368d96', '', 'Glory', 'Henshaw', 'gloryhenshaw4real@gmail.com', '1986-05-08', 'Lagos', '27 ogunfemitimi off \r\n\r\nitire road surulere', '80b lafiaji way dolphin estate ikoyi lagos', '', 'abiolao@ebsafr.com', 'Y', 'pending_verification', 'password_reset_pending', '2015-02-18', '0000-00-00 00:00:00', 'T42670805', '2015-02-17 22:00:00', 0, '0000-00-00 00:00:00', 0, 'f767dedb3038a98b7825c80ae17e8a1a6d368d96'),
(104, '07063830997', '2f552a3d68cf6af187cb91ae80bd3962f6f5f6f589940880554d606728800be71ff472c82342bbca', '', 'bukola', 'aleshe', 'aleshebukola@gmail.com', '1986-05-24', 'Lagos', '', '', '', '', 'Y', 'pending_verification', 'activated', '2015-02-19', '0000-00-00 00:00:00', 'T10996943', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, '89940880554d606728800be71ff472c82342bbca'),
(105, '08026948679', 'de8ed17ddc2ad4bf3b9d91dd984c86e97e4d31db215f4bee6fb669b8721e8cd5490e012fba428e82', '', 'giwa', 'abdullahi', 'abdolla_luv18@yahoo.com', '0000-00-00', 'Lagos', '', '', '', 'nahim06@gmail.com', 'Y', 'pending_verification', 'activated', '2015-02-19', '0000-00-00 00:00:00', 'T90504582', '2015-02-18 22:00:00', 0, '0000-00-00 00:00:00', 0, '215f4bee6fb669b8721e8cd5490e012fba428e82'),
(106, '2348131182500', '476b543b2a27a1a080382c31e90401a830dd2f12f488624466b5f7b3cadffef85a6d4c81171d4ba9', '', 'Charity', 'Arinze', 'Charitya@ebsafr.com', '1984-03-03', 'Lagos', '11a, ebinpejo lane, Ojo alaba Lagos', '', '2348131182500', 'pastortosas@yahoo.co.uk', 'Y', 'pending_verification', 'password_reset_pending', '2015-02-19', '0000-00-00 00:00:00', 'T92264850', '2015-02-18 22:00:00', 0, '0000-00-00 00:00:00', 0, 'f488624466b5f7b3cadffef85a6d4c81171d4ba9'),
(107, '07088886836', '43785bfb0423abcc568561b92bdd53d5e496090a39110f87136a469b7a930412c6c50764d9d26893', '', 'Ayodeji', 'Somoye', 'dejisomoye@gmail.com', '1992-09-01', 'Lagos', '', '', '', '', 'Y', 'pending_verification', 'activated', '2015-02-19', '0000-00-00 00:00:00', 'T13430715', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, '39110f87136a469b7a930412c6c50764d9d26893'),
(108, '08097019486', '883cc66510fcec9f9653222c5489c40fb49e64149493d61e7ed84402faec328ec33d6708510ede8a', '', 'victor', 'udoh', 'vicfourmedicals@yahoo.com', '0000-00-00', '', NULL, NULL, '', '', 'N', 'pending_verification', 'pending_activation', '2015-02-20', '0000-00-00 00:00:00', 'T53665758', '2015-02-19 22:00:00', 0, '0000-00-00 00:00:00', 0, '9493d61e7ed84402faec328ec33d6708510ede8a'),
(109, '07038157647', 'e1b8ae2dab4a95d14a9b7ab4bbdc17bd3e4a067dc00ecf7c024e6995d81d416cc0972b54187f6534', '', 'vincente', 'follitse', 'follitsav@gmail.com', '0000-00-00', '', NULL, NULL, '', '', 'Y', 'pending_verification', 'activated', '2015-02-20', '0000-00-00 00:00:00', 'T96283630', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, 'c00ecf7c024e6995d81d416cc0972b54187f6534'),
(110, '08023299946', '9f2f9c1809694ff32f9f547533961c82600898eccfb6a0a4b6dc98ab501b6e972f4bcdcabbfcde3a', '', 'yemi', 'lap', 'yemlap@yahoo.com', '0000-00-00', '', NULL, NULL, '', '', 'N', 'pending_verification', 'pending_activation', '2015-02-20', '0000-00-00 00:00:00', 'T52669761', '2015-02-19 22:00:00', 0, '0000-00-00 00:00:00', 0, 'cfb6a0a4b6dc98ab501b6e972f4bcdcabbfcde3a'),
(111, '08032293604', '9f2f9c1809694ff32f9f547533961c82600898ec3d3796625df5bc98ef9c65f09c0b5270306db836', '', 'Kayode', 'Kay', 'kaymachine@yahoo.com', '0000-00-00', '', NULL, NULL, '', '', 'N', 'pending_verification', 'pending_activation', '2015-02-20', '0000-00-00 00:00:00', 'T43550918', '2015-02-19 22:00:00', 0, '0000-00-00 00:00:00', 0, '3d3796625df5bc98ef9c65f09c0b5270306db836'),
(112, '07013942083', '9f2f9c1809694ff32f9f547533961c82600898ece545f4861e56c9908ad44f5de3676dbfd5b1c159', '', 'Ifeoma', 'Oragwu', 'ifeomaoragwu@gmail.com', '0000-00-00', '', NULL, NULL, '', '', 'N', 'pending_verification', 'pending_activation', '2015-02-20', '0000-00-00 00:00:00', 'T42625902', '2015-02-19 22:00:00', 0, '0000-00-00 00:00:00', 0, 'e545f4861e56c9908ad44f5de3676dbfd5b1c159'),
(113, '08087060008', '9f2f9c1809694ff32f9f547533961c82600898ec77380a507c42655a79995b7307a8fb057b100d67', '', 'tola', 'gbuyiro', 'tolagbuyiro@yahoo.com', '0000-00-00', '', NULL, NULL, '', '', 'N', 'pending_verification', 'pending_activation', '2015-02-20', '0000-00-00 00:00:00', 'T74537667', '2015-02-19 22:00:00', 0, '0000-00-00 00:00:00', 0, '77380a507c42655a79995b7307a8fb057b100d67'),
(114, '08023298988', '9f2f9c1809694ff32f9f547533961c82600898ecf50d7fa61041ae7bae59b5a386c8666e89136629', '', 'eyo', 'odion', 'eeyodiong@yahoo.com', '0000-00-00', '', NULL, NULL, '', '', 'Y', 'pending_verification', 'activated', '2015-02-20', '0000-00-00 00:00:00', 'T37806507', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, 'f50d7fa61041ae7bae59b5a386c8666e89136629'),
(115, '08094121071', '9f2f9c1809694ff32f9f547533961c82600898ec7db56023bd5ce8cdc8413d8bd8d392a527e0f74d', '', 'adeyemi', 'arosoye', 'adeyemiarosoye@gmail.com', '0000-00-00', '', NULL, NULL, '', '', 'N', 'pending_verification', 'pending_activation', '2015-02-20', '0000-00-00 00:00:00', 'T36384825', '2015-02-19 22:00:00', 0, '0000-00-00 00:00:00', 0, '7db56023bd5ce8cdc8413d8bd8d392a527e0f74d'),
(116, '08083356842', '9f2f9c1809694ff32f9f547533961c82600898ecec2f28c32d587f8e9ab815174a78214dda0b467b', '', 'Chinedu', 'Onwedi', 'chinedu-cxonwed@yahoo.co.uk', '0000-00-00', '', NULL, NULL, '', '', 'N', 'pending_verification', 'pending_activation', '2015-02-20', '0000-00-00 00:00:00', 'T61570965', '2015-02-19 22:00:00', 0, '0000-00-00 00:00:00', 0, 'ec2f28c32d587f8e9ab815174a78214dda0b467b'),
(117, '08034135441', '9f2f9c1809694ff32f9f547533961c82600898ec7c7606768bfaa283497e949b32abc313d0245f0a', '', 'Banji', 'Ajisomo', 'danji_ajisomo@yahoo.com', '0000-00-00', '', NULL, NULL, '', '', 'N', 'pending_verification', 'pending_activation', '2015-02-20', '0000-00-00 00:00:00', 'T77838567', '2015-02-19 22:00:00', 0, '0000-00-00 00:00:00', 0, '7c7606768bfaa283497e949b32abc313d0245f0a'),
(118, '08034135441', '9f2f9c1809694ff32f9f547533961c82600898ecf6c857980558aa31b706572749d89c33df8edcff', '', 'Banji', 'Ajisomo', 'banji_ajisomo@yahoo.com', '0000-00-00', '', NULL, NULL, '', '', 'N', 'pending_verification', 'pending_activation', '2015-02-20', '0000-00-00 00:00:00', 'T25424717', '2015-02-19 22:00:00', 0, '0000-00-00 00:00:00', 0, 'f6c857980558aa31b706572749d89c33df8edcff'),
(119, '07035226287', '9f2f9c1809694ff32f9f547533961c82600898ec17403c39f5ca951d3c0e5fb84d86e7a335ac4272', '', 'anitha', 'heamie', 'spicyheamie@yahoo.com', '0000-00-00', '', NULL, NULL, '', '', 'N', 'pending_verification', 'pending_activation', '2015-02-20', '0000-00-00 00:00:00', 'T79728633', '2015-02-19 22:00:00', 0, '0000-00-00 00:00:00', 0, '17403c39f5ca951d3c0e5fb84d86e7a335ac4272'),
(120, '08022122972', '9f2f9c1809694ff32f9f547533961c82600898ec100db15a9542ec1a0927fa1731001e766d58cbb0', '', 'emmanuel', 'lajidefun', 'emmanuellajidefun@gmail.com', '0000-00-00', '', NULL, NULL, '', '', 'N', 'pending_verification', 'pending_activation', '2015-02-20', '0000-00-00 00:00:00', 'T40915871', '2015-02-19 22:00:00', 0, '0000-00-00 00:00:00', 0, '100db15a9542ec1a0927fa1731001e766d58cbb0'),
(121, '08038592655', '9f2f9c1809694ff32f9f547533961c82600898ec1ac43ce86a715099b249e2461d53286b1273af12', '', 'harrison', 'olile', 'olileharrison08@gmail.cm', '0000-00-00', '', NULL, NULL, '', '', 'N', 'pending_verification', 'pending_activation', '2015-02-20', '0000-00-00 00:00:00', 'T98451947', '2015-02-19 22:00:00', 0, '0000-00-00 00:00:00', 0, '1ac43ce86a715099b249e2461d53286b1273af12'),
(122, '08097019486', '883cc66510fcec9f9653222c5489c40fb49e64144412f3c4349d0416f8a94bfcc41086c84b8071f7', '', 'victor', 'udoh', 'vic4medical@yahoo.com', '0000-00-00', '', NULL, NULL, '', '', 'N', 'pending_verification', 'pending_activation', '2015-02-20', '0000-00-00 00:00:00', 'T28679551', '2015-02-19 22:00:00', 0, '0000-00-00 00:00:00', 0, '4412f3c4349d0416f8a94bfcc41086c84b8071f7'),
(123, '08097019486', '883cc66510fcec9f9653222c5489c40fb49e64140be54e8ef8bb110bf4d182e667f81c8493088800', '', 'victor', 'udoh', 'vic4medicals@yahoo.com', '0000-00-00', '', NULL, NULL, '', '', 'N', 'pending_verification', 'pending_activation', '2015-02-20', '0000-00-00 00:00:00', 'T40662859', '2015-02-19 22:00:00', 0, '0000-00-00 00:00:00', 0, '0be54e8ef8bb110bf4d182e667f81c8493088800'),
(124, '08023542623', 'b702ddb6871c65d9278e35213c9e61bdcad183c371a952b76f70a28604494a928d0ffe6f5e5996e1', '', 'jimmy', 'sanwo', 'jsanwo64@gmail.com', '0000-00-00', '', NULL, NULL, '08023542623', '', 'N', 'pending_verification', 'pending_activation', '2015-02-20', '0000-00-00 00:00:00', 'T13123716', '2015-02-19 22:00:00', 0, '0000-00-00 00:00:00', 0, '71a952b76f70a28604494a928d0ffe6f5e5996e1'),
(125, '08036391204', '9f2f9c1809694ff32f9f547533961c82600898ecd8a1ee161cbd8d6121e6f77173101bb25d334dec', '', 'Friday', 'Otanwa', 'friday.otanwa@gmail.com', '0000-00-00', '', NULL, NULL, '', '', 'N', 'pending_verification', 'pending_activation', '2015-02-23', '0000-00-00 00:00:00', 'T85308952', '2015-02-22 22:00:00', 0, '0000-00-00 00:00:00', 0, 'd8a1ee161cbd8d6121e6f77173101bb25d334dec');
INSERT INTO `cg_customer` (`id`, `phone`, `password`, `imsi`, `firstname`, `surname`, `email`, `birth_date`, `state_of_residence`, `home_address`, `office_address`, `alternate_phone`, `referred_email_addr`, `active`, `admin_verification_status`, `reg_status`, `reg_date`, `cancel_date`, `activation_code`, `created_date`, `created_by`, `modified_date`, `modified_by`, `hash_salt`) VALUES
(126, '08028474983', '9f2f9c1809694ff32f9f547533961c82600898ec98265eb975054e5957b2f46d02b62a408eb5cec8', '', 'buki', 'olatundun', 'olatundunbuki@gmail.com', '0000-00-00', '', NULL, NULL, '', '', 'Y', 'pending_verification', 'activated', '2015-02-23', '0000-00-00 00:00:00', 'T15353879', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, '98265eb975054e5957b2f46d02b62a408eb5cec8'),
(127, '08023139049', '9f2f9c1809694ff32f9f547533961c82600898ec09a11e086302423e2b137b38e66194ffc22b2e53', '', 'gibson', 'panice', 'gibspanice99@yahoo.com', '0000-00-00', '', NULL, NULL, '', '', 'N', 'pending_verification', 'pending_activation', '2015-02-23', '0000-00-00 00:00:00', 'T39952634', '2015-02-22 22:00:00', 0, '0000-00-00 00:00:00', 0, '09a11e086302423e2b137b38e66194ffc22b2e53'),
(128, '08067719349', '76beafe24da66869ce5af6f8022a87fb0649c683d0d0392914af035784c4b012c9716ea92eba8add', '', 'olatundun', 'bukky', 'olatundunbuki@gamail.com', '0000-00-00', '', NULL, NULL, '08028474983', '', 'N', 'pending_verification', 'pending_activation', '2015-02-23', '0000-00-00 00:00:00', 'T86571785', '2015-02-22 22:00:00', 0, '0000-00-00 00:00:00', 0, 'd0d0392914af035784c4b012c9716ea92eba8add'),
(129, '08180285940', '9f2f9c1809694ff32f9f547533961c82600898ecab1265c80d64655e320485b126cb9695bae02e23', '', 'kike', 'rubu', 'kikearubu@gmail.com', '0000-00-00', '', NULL, NULL, '', '', 'N', 'pending_verification', 'pending_activation', '2015-02-23', '0000-00-00 00:00:00', 'T87870549', '2015-02-22 22:00:00', 0, '0000-00-00 00:00:00', 0, 'ab1265c80d64655e320485b126cb9695bae02e23'),
(130, '08146862678', '9f2f9c1809694ff32f9f547533961c82600898ecb69f0c7a5a773375c54f46ac12e4aa8a20a9ffbd', '', 'oluchi', 'maria', 'enquiries.mariashouse@gmail.com', '0000-00-00', '', NULL, NULL, '', '', 'N', 'pending_verification', 'pending_activation', '2015-02-23', '0000-00-00 00:00:00', 'T20940880', '2015-02-22 22:00:00', 0, '0000-00-00 00:00:00', 0, 'b69f0c7a5a773375c54f46ac12e4aa8a20a9ffbd'),
(131, '08032428742', '9f2f9c1809694ff32f9f547533961c82600898ec0d980f3c7e5f0b064bb086b621ecfcf74377db64', '', 'peace', 'nduchukwwu', 'pnduchukwu@yahoo.com', '0000-00-00', '', NULL, NULL, '', '', 'Y', 'pending_verification', 'activated', '2015-02-23', '0000-00-00 00:00:00', 'T42755580', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, '0d980f3c7e5f0b064bb086b621ecfcf74377db64'),
(132, '08061631556', '250e4bd6183c2617cdaf8e19100f838636fd010294dd9b03d38d91382cef4caff5944a0ecd03fb6b', '', 'Abubakar', 'Ibrahim', 'Ibrahimabubakar209@gmail.com', '0000-00-00', 'Lagos', 'AC 14 NAssarawa \r\n\r\ngwong jos.', 'Plateau state', '08061631556', '', 'Y', 'pending_verification', 'activated', '2015-02-23', '0000-00-00 00:00:00', 'T47391877', '2015-02-22 22:00:00', 0, '0000-00-00 00:00:00', 0, '94dd9b03d38d91382cef4caff5944a0ecd03fb6b'),
(133, '08031848010', 'b6fba2c743e7904e07caf229baed9bc0215fcb816c57899b26bb61ef3e9d3fcf780f17d68f7692e9', '', 'Ajimat', 'Sekoni', 'ajimatsekoni@yahoo.com', '0000-00-00', '', NULL, NULL, '', '', 'Y', 'pending_verification', 'activated', '2015-02-24', '0000-00-00 00:00:00', 'T26510962', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, '6c57899b26bb61ef3e9d3fcf780f17d68f7692e9'),
(134, '08135998822', 'c259cd272a52760f8c4f2dd5e7b5ad89a7645f0f959d20c63466590298a74a8cad88949aff0b6f48', '', 'bolaji', 'badejo', 'scarletigbo@yahoo.com', '0000-00-00', '', NULL, NULL, '', '', 'N', 'pending_verification', 'pending_activation', '2015-02-24', '0000-00-00 00:00:00', 'T86593937', '2015-02-23 22:00:00', 0, '0000-00-00 00:00:00', 0, '959d20c63466590298a74a8cad88949aff0b6f48'),
(135, '08135998822', 'c259cd272a52760f8c4f2dd5e7b5ad89a7645f0f74d54c0a2897931aaa275a08ebf8b03e45db99f3', '', 'bolaji', 'badejo', 'scarletigbo@gmail.com', '0000-00-00', '', NULL, NULL, '', '', 'N', 'pending_verification', 'pending_activation', '2015-02-24', '0000-00-00 00:00:00', 'T32102925', '2015-02-23 22:00:00', 0, '0000-00-00 00:00:00', 0, '74d54c0a2897931aaa275a08ebf8b03e45db99f3'),
(136, '08036339979', 'ad880d35e297c285d27abfa7dc20a01062eac843400e8a107c659575a7379bf49eef7bec3718b80f', '', 'gbadamosi', 'funmillola', 'pemisiremylove@gmail.com', '0000-00-00', '', NULL, NULL, '', '', 'N', 'pending_verification', 'pending_activation', '2015-02-25', '0000-00-00 00:00:00', 'T37391506', '2015-02-24 22:00:00', 0, '0000-00-00 00:00:00', 0, '400e8a107c659575a7379bf49eef7bec3718b80f'),
(137, '08136725813', 'fc64bc15f24c3fbe2242d7595dfb6a915744fa7a58fbb25e9346aadd8695736e8ae2154e3deb0d8a', '', 'shamusideen', 'Olaotan', 'shamusideen.molaotan@gmail.com', '0000-00-00', '', NULL, NULL, '', '', 'N', 'pending_verification', 'pending_activation', '2015-02-25', '0000-00-00 00:00:00', 'T25706646', '2015-02-24 22:00:00', 0, '0000-00-00 00:00:00', 0, '58fbb25e9346aadd8695736e8ae2154e3deb0d8a'),
(138, '08136725813', 'fc64bc15f24c3fbe2242d7595dfb6a915744fa7a2cbe7590dec03a2130ebaa1b7d3e82ada14541b7', '', 'shamusideen', 'olaotan', 'shamsudeenolaotan@gmail.com', '0000-00-00', '', NULL, NULL, '', '', 'Y', 'pending_verification', 'activated', '2015-02-25', '0000-00-00 00:00:00', 'T24632680', '2015-02-24 22:00:00', 0, '0000-00-00 00:00:00', 0, '2cbe7590dec03a2130ebaa1b7d3e82ada14541b7'),
(139, '08085321987', '0a8d8c1d9a5c99346e1a715e1426230b2beb63f94b27ba42b847c41543a0ce781968f69703230cd6', '', 'Temitope', 'Akinremi', 'akinremi.t@gmail.com', '0000-00-00', '', NULL, NULL, '', '', 'N', 'pending_verification', 'pending_activation', '2015-02-25', '0000-00-00 00:00:00', 'T88255596', '2015-02-24 22:00:00', 0, '0000-00-00 00:00:00', 0, '4b27ba42b847c41543a0ce781968f69703230cd6'),
(140, '08169541058', '2a1614e2af64c055e6ce37a4ba2cee3927123d9162106a3249110b7d6c8a838777213cf0742546a6', '', 'chigozie', 'okezie kingsley', 'icekings6000@gmail.com', '0000-00-00', '', NULL, NULL, '', '', 'Y', 'pending_verification', 'activated', '2015-02-26', '0000-00-00 00:00:00', 'T14361766', '2015-02-25 22:00:00', 0, '0000-00-00 00:00:00', 0, '62106a3249110b7d6c8a838777213cf0742546a6'),
(141, '08182118548', 'db9cf3474805f3ae13081da11b4316d4c1c5bc1750740ef0b7a9dec04bbdf388f860c107befd8dd4', '', 'uche', 'onuorah', 'onuorahuche@yahoo.co.uk', '0000-00-00', 'Lagos', '', '', '08023465996', '', 'Y', 'pending_verification', 'activated', '2015-02-26', '0000-00-00 00:00:00', 'T69916885', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, '50740ef0b7a9dec04bbdf388f860c107befd8dd4'),
(142, '08133511477', '08ca30ea9c494baa1bc0f1811ea0a7c664a8a58ce8d5d4644444b5d8d8a1901531c9c19008bf0cb7', '', 'Maryam', 'Aderemi', 'maryamaderemi@gmail.com', '0000-00-00', '', NULL, NULL, '08020512409', '', 'N', 'pending_verification', 'pending_activation', '2015-02-28', '0000-00-00 00:00:00', 'T26713794', '2015-02-27 22:00:00', 0, '0000-00-00 00:00:00', 0, 'e8d5d4644444b5d8d8a1901531c9c19008bf0cb7'),
(143, '08094824922', '9497dfcaca2bdb12cbdec7a519474dc49492e987ab410937883510a76902bf180617f2f34d61a379', '', 'richard', 'ogalu', 'rico4liverpool@yahoo.com', '0000-00-00', '', NULL, NULL, '08094824922', '', 'N', 'pending_verification', 'pending_activation', '2015-02-28', '0000-00-00 00:00:00', 'T29648903', '2015-02-27 22:00:00', 0, '0000-00-00 00:00:00', 0, 'ab410937883510a76902bf180617f2f34d61a379'),
(144, '08100444771', 'ec12427dfefdb5a66f2625b4c14401a615536adebd1867647ad41154cec7c5d1faa14a20750b34be', '', 'Oluwatosin', 'Ogunsanwo', 'tosinsnazzyogunsanwo@yahoo.com', '0000-00-00', '', NULL, NULL, '', '', 'N', 'pending_verification', 'pending_activation', '2015-02-28', '0000-00-00 00:00:00', 'T20235700', '2015-02-27 22:00:00', 0, '0000-00-00 00:00:00', 0, 'bd1867647ad41154cec7c5d1faa14a20750b34be'),
(145, '08033684761', 'a5047bd96f6969636a82affa700dfa2faf672c56486386dff5085bec102f9cf884e26b341052cafd', '', 'damilola', 'adeleke', 'toyosi.adeleke@yahoo.com', '0000-00-00', '', NULL, NULL, '08055108362', '', 'N', 'pending_verification', 'pending_activation', '2015-02-28', '0000-00-00 00:00:00', 'T12455998', '2015-02-27 22:00:00', 0, '0000-00-00 00:00:00', 0, '486386dff5085bec102f9cf884e26b341052cafd'),
(146, '08034444998', '016299f2c363584dbaa7d6fd788317f39478436b265024f1e3643e06f17ddd494dfd3466ab50a388', '', 'adebanjo', 'bukoa', 'bukkieluv72@yahoo.com', '0000-00-00', '', NULL, NULL, '090926746028', '', 'N', 'pending_verification', 'pending_activation', '2015-02-28', '0000-00-00 00:00:00', 'T23120980', '2015-02-27 22:00:00', 0, '0000-00-00 00:00:00', 0, '265024f1e3643e06f17ddd494dfd3466ab50a388'),
(147, '08064766939', '8142a13c60f9305cfc16838a5ecb416aeab90bb227ec32f549bf59348da1492c25834551338b7406', '', 'Esther', 'Lukoh', 'estherlukoh@gmail.com', '0000-00-00', '', NULL, NULL, '08064766939', 'otijichuka@gmail.com', 'N', 'pending_verification', 'pending_activation', '2015-02-28', '0000-00-00 00:00:00', 'T75599845', '2015-02-27 22:00:00', 0, '0000-00-00 00:00:00', 0, '27ec32f549bf59348da1492c25834551338b7406'),
(148, '08174120505', 'cb44d06638521d55a7c437610aa94f7de58a88138e8cc2a0c4dac7dd7caa3ff40766400bd50cbcb7', '', 'iris', 'afangbedji', 'afangbedjiris@gmail.com', '0000-00-00', '', NULL, NULL, '08023034408', '', 'N', 'pending_verification', 'pending_activation', '2015-02-28', '0000-00-00 00:00:00', 'T27474962', '2015-02-27 22:00:00', 0, '0000-00-00 00:00:00', 0, '8e8cc2a0c4dac7dd7caa3ff40766400bd50cbcb7'),
(149, '08136977537', '85c860b8c41c4bbbb5020092216b8712a4e39ae608601a37ae4c0545ae43b22735d18489e15e5079', '', 'Adejoke', 'Adeyan', 'Adeyan.adejoke@yahoo.com', '0000-00-00', '', NULL, NULL, '09025101761', '', 'N', 'pending_verification', 'pending_activation', '2015-02-28', '0000-00-00 00:00:00', 'T82841943', '2015-02-27 22:00:00', 0, '0000-00-00 00:00:00', 0, '08601a37ae4c0545ae43b22735d18489e15e5079'),
(150, '07066396560', '740317c8ecc855285fa387a309d56815283fd3514719700a9b4bd7092010602a2611fdc2f17ff865', '', 'Adikat', 'Morolake', 'adikat.alaka@yahoo.com', '0000-00-00', '', NULL, NULL, '', '', 'N', 'pending_verification', 'pending_activation', '2015-02-28', '0000-00-00 00:00:00', 'T60257635', '2015-02-27 22:00:00', 0, '0000-00-00 00:00:00', 0, '4719700a9b4bd7092010602a2611fdc2f17ff865'),
(151, '08090751012', 'ff9a9449448ab8572b059c91c9efa30ab19c1fa40f3d76f08406e55b06dfb9278baa18bb3cf7ec87', '', 'Maryjane', 'Oluwatoyin', 'Maryjaneabalokwu@yahoo.com', '0000-00-00', '', NULL, NULL, '07061106166', '', 'N', 'pending_verification', 'pending_activation', '2015-02-28', '0000-00-00 00:00:00', 'T64610619', '2015-02-27 22:00:00', 0, '0000-00-00 00:00:00', 0, '0f3d76f08406e55b06dfb9278baa18bb3cf7ec87'),
(152, '08032308448', '8626ff1fdb3aca42a72fea626ce798650d20299197d7419d65be3290366e19eb3d62078319ff1873', '', 'debo', 'banjo', 'debbour2010@yahoo.com', '0000-00-00', 'Lagos', '', '', '08032308448', '', 'Y', 'pending_verification', 'activated', '2015-02-28', '0000-00-00 00:00:00', 'T14404588', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, '97d7419d65be3290366e19eb3d62078319ff1873'),
(153, '08177587928', '6339d4013d05ed7b24bec7d4af267ddb8a28f226166f9494896402a48aadac55b277626a04d308c8', '', 'Tewogbola', 'Adebanjo', 'armellemoi@gmail.com', '0000-00-00', '', NULL, NULL, '08054161133', '', 'N', 'pending_verification', 'pending_activation', '2015-02-28', '0000-00-00 00:00:00', 'T93441559', '2015-02-27 22:00:00', 0, '0000-00-00 00:00:00', 0, '166f9494896402a48aadac55b277626a04d308c8'),
(154, '08028359025', 'a44f808d479aae2036de7b05fd1eb4ef3b03d17f5fcecfd9c7d2e6326d0da65deec95006600ff887', '', 'toyin', 'ruth', 'toyinoyegunwa@yahoo.com', '0000-00-00', '', NULL, NULL, '08028359025', '', 'N', 'pending_verification', 'pending_activation', '2015-02-28', '0000-00-00 00:00:00', 'T78739792', '2015-02-27 22:00:00', 0, '0000-00-00 00:00:00', 0, '5fcecfd9c7d2e6326d0da65deec95006600ff887'),
(155, '07067325709', 'c9db7f54184ef3115b11e107c18cf1fac7218474ed1dedbe33688b1e5ca2fe6f28d41686e1efcd88', '', 'Chisom', 'Ogbummuo', 'Chisomjoan@gmail.com', '0000-00-00', '', NULL, NULL, '', '', 'N', 'pending_verification', 'pending_activation', '2015-02-28', '0000-00-00 00:00:00', 'T50438746', '2015-02-27 22:00:00', 0, '0000-00-00 00:00:00', 0, 'ed1dedbe33688b1e5ca2fe6f28d41686e1efcd88'),
(156, '08035250734', '03d67c263c27a453ef65b29e30334727333ccbcd84444c39ce78588a94ea71118438c16a3df87007', '', 'Oreoluwa', 'Oduko', 'ore_oduko@yahoo.com', '0000-00-00', '', NULL, NULL, '', '', 'N', 'pending_verification', 'pending_activation', '2015-02-28', '0000-00-00 00:00:00', 'T37803733', '2015-02-27 22:00:00', 0, '0000-00-00 00:00:00', 0, '84444c39ce78588a94ea71118438c16a3df87007'),
(157, '08033206295', '705e90657cab3c3d6a9c50553eb3316b6e0eb8307eae353f87d9c912389b14fc13af9886294a9ba9', '', 'kolawole', 'oyefeso', 'kolawoleoyefeso@gmail.com', '0000-00-00', '', NULL, NULL, '08022239122', '', 'N', 'pending_verification', 'pending_activation', '2015-02-28', '0000-00-00 00:00:00', 'T88612726', '2015-02-27 22:00:00', 0, '0000-00-00 00:00:00', 0, '7eae353f87d9c912389b14fc13af9886294a9ba9'),
(158, '08033262057', '5f48413ceb2323bbcaab2bf3b1990c6dbe00ac91cf515fac89fc569476824cde25f4f1a0cea61d1c', '', 'Temidayo', 'Abimbola', 'bims_t@yahoo.com', '0000-00-00', '', NULL, NULL, '', '', 'N', 'pending_verification', 'pending_activation', '2015-02-28', '0000-00-00 00:00:00', 'T86877578', '2015-02-27 22:00:00', 0, '0000-00-00 00:00:00', 0, 'cf515fac89fc569476824cde25f4f1a0cea61d1c'),
(159, '07065070436', 'b7d94d68f2a706f68dc322cd1b880e1af3c35c0391f80228f5971b554ada150e3e39ab48559bc051', '', 'vwede', 'edah', 'vwedeedah@yahoo.co.uk', '0000-00-00', '', NULL, NULL, '07011778372', '', 'N', 'pending_verification', 'pending_activation', '2015-02-28', '0000-00-00 00:00:00', 'T20800763', '2015-02-27 22:00:00', 0, '0000-00-00 00:00:00', 0, '91f80228f5971b554ada150e3e39ab48559bc051'),
(160, '08087100655', '8f5f88f5890a29f3126eaffa241fb6fb60f43ac1342d26d67e5febb55932e25534652ede6d3b3623', '', 'Sade', 'Ipaye', 'aleroipaye@gmail.com', '0000-00-00', '', NULL, NULL, '', '', 'N', 'pending_verification', 'pending_activation', '2015-02-28', '0000-00-00 00:00:00', 'T78743910', '2015-02-27 22:00:00', 0, '0000-00-00 00:00:00', 0, '342d26d67e5febb55932e25534652ede6d3b3623'),
(161, '07082170941', '0c43133ecdac9da9e69308fd03a9926c3c0377ca3ee786e12dc7e2b08144139b7c00dc844b307de6', '', 'alakpodia', 'enifome', 'Enifome.a@gmail.com', '0000-00-00', '', NULL, NULL, '08161838464', '', 'N', 'pending_verification', 'pending_activation', '2015-02-28', '0000-00-00 00:00:00', 'T14129769', '2015-02-27 22:00:00', 0, '0000-00-00 00:00:00', 0, '3ee786e12dc7e2b08144139b7c00dc844b307de6'),
(162, '08069006332', '6f33bfddc02c4df02f164ee37a2f02b641bcc4c7616011c99d16b5102e6f7c8eaeafd15a1f75114b', '', 'Adebanke', 'Adeniji-Fashola', 'dekunbifashola@gmail.com', '0000-00-00', '', NULL, NULL, '08083824376', '', 'N', 'pending_verification', 'pending_activation', '2015-02-28', '0000-00-00 00:00:00', 'T51138735', '2015-02-27 22:00:00', 0, '0000-00-00 00:00:00', 0, '616011c99d16b5102e6f7c8eaeafd15a1f75114b'),
(163, '08126812325', '0b72004970dce8f8b9ae21388c7cff90e2af61598ff58b59ea76038210a8acdb098330d1aba8d790', '', 'Ngozi', 'Opara', 'Engee_opra@yahoo.com', '0000-00-00', '', NULL, NULL, '07065030674', '', 'N', 'pending_verification', 'pending_activation', '2015-02-28', '0000-00-00 00:00:00', 'T68973791', '2015-02-27 22:00:00', 0, '0000-00-00 00:00:00', 0, '8ff58b59ea76038210a8acdb098330d1aba8d790'),
(164, '08082962897', '88ac292ca6e1ea11a41be323b6b69fc1c203c9c9065d65e952d2593b63f38ac8f7d81cc15eb66f09', '', 'faith', 'oke', 'faithoke20@yahoo.com', '0000-00-00', '', NULL, NULL, '08095202418', '', 'N', 'pending_verification', 'pending_activation', '2015-02-28', '0000-00-00 00:00:00', 'T90860986', '2015-02-27 22:00:00', 0, '0000-00-00 00:00:00', 0, '065d65e952d2593b63f38ac8f7d81cc15eb66f09'),
(165, '08167391375', 'a15580ef93c3961c365c8c9d46ab8c3470d6b03ad844cff93d0728ef51e0b05cf49a584149ba9dca', '', 'Temi-\r\n\r\ntope', 'Aluko', 'Ti_aluko@yahoo.com', '0000-00-00', '', NULL, NULL, '08051686001', '', 'N', 'pending_verification', 'pending_activation', '2015-02-28', '0000-00-00 00:00:00', 'T74664942', '2015-02-27 22:00:00', 0, '0000-00-00 00:00:00', 0, 'd844cff93d0728ef51e0b05cf49a584149ba9dca'),
(166, '07089313815', '802802bd9bfb15f7c1ccbd2531260d91c2f3d06a10d89c6728158975a38c08705dd78348461fd48e', '', 'Kara', 'Mosopefoluwa', 'Karamoshefoluwa@gmail.com', '0000-00-00', '', NULL, NULL, '', '', 'N', 'pending_verification', 'pending_activation', '2015-02-28', '0000-00-00 00:00:00', 'T70899533', '2015-02-27 22:00:00', 0, '0000-00-00 00:00:00', 0, '10d89c6728158975a38c08705dd78348461fd48e'),
(167, '08077580637', 'a2598b6bdb22ab25414aebc08a58405c5ae29d1f1e34a3072e954a30073faf79dbb661a2528f97d9', '', 'alade-adesina', 'olutola', 'olutolaaa@yahoo.com', '0000-00-00', '', NULL, NULL, '08077580637', '', 'N', 'pending_verification', 'pending_activation', '2015-02-28', '0000-00-00 00:00:00', 'T53119594', '2015-02-27 22:00:00', 0, '0000-00-00 00:00:00', 0, '1e34a3072e954a30073faf79dbb661a2528f97d9'),
(168, '08062398605', '58ead6e003ea75a9d884179d50a97dc2fc96cb05366134544c9589e1f37925d59aeab0340eb16002', '', 'Karen', 'Finite me', 'Karenginigeme@gmail.com', '0000-00-00', '', NULL, NULL, '', '', 'N', 'pending_verification', 'pending_activation', '2015-02-28', '0000-00-00 00:00:00', 'T45821541', '2015-02-27 22:00:00', 0, '0000-00-00 00:00:00', 0, '366134544c9589e1f37925d59aeab0340eb16002'),
(169, '08179580731', '9d128d913950e0d9c0b33b3e1988e077ad2f2e7e37b9c0de89711d34ccf309c0f3db1a637e83ff5e', '', 'Islamist', 'Ekenimoh', 'Tyilamosiekenimoh@gmail.com', '0000-00-00', '', NULL, NULL, '', '', 'N', 'pending_verification', 'pending_activation', '2015-02-28', '0000-00-00 00:00:00', 'T61917700', '2015-02-27 22:00:00', 0, '0000-00-00 00:00:00', 0, '37b9c0de89711d34ccf309c0f3db1a637e83ff5e'),
(170, '08096330332', 'c28818d749bfe85e075c88bd4c1e1fdb77efd89f87f0f11e68dd1d3d80a3398f8d9812bc45330753', '', 'kenedy', 'tracy', 'kenedytracy@yahoo.com', '0000-00-00', '', NULL, NULL, '08096330332', '', 'N', 'pending_verification', 'pending_activation', '2015-02-28', '0000-00-00 00:00:00', 'T24424861', '2015-02-27 22:00:00', 0, '0000-00-00 00:00:00', 0, '87f0f11e68dd1d3d80a3398f8d9812bc45330753'),
(171, '08051998856', 'a0dca336df59e2963f7cb3a6190003246c2966250f4bed25faf9e40fdfb01d13b30697e27b4a3052', '', 'Abisoye', 'Odewole', 'Odewolebisoye@gmail.com', '1985-10-06', 'Lagos', '', '9, Akintan Street, \r\n\r\nDideolu Estate off Ijaiye Ogba Road ( Behind Sweet Sensation). Ogba Lagos', '09096500799', '', 'Y', 'pending_verification', 'activated', '2015-02-28', '0000-00-00 00:00:00', 'T45249936', '2015-02-27 22:00:00', 0, '0000-00-00 00:00:00', 0, '0f4bed25faf9e40fdfb01d13b30697e27b4a3052'),
(172, '08097004586', '47f5caf5035e6fe5da02ea9f3ada3c4b0095edbb60a4ea1d1e09233208288f8b2d1cdf62a8e4b9dc', '', 'Oyinlola', 'Ojugbele', 'oyinlolaojus@yahoo.com', '0000-00-00', 'Lagos', '', '', '08154911113', '', 'Y', 'pending_verification', 'activated', '2015-02-28', '0000-00-00 00:00:00', 'T85263976', '2015-02-27 22:00:00', 0, '0000-00-00 00:00:00', 0, '60a4ea1d1e09233208288f8b2d1cdf62a8e4b9dc'),
(173, '08147744534', '58ead6e003ea75a9d884179d50a97dc2fc96cb05d6d8b319e61cd776ba80053989b2683d727fdf91', '', 'Juliana', 'Ejike', 'julianaejike@yahoo.com', '0000-00-00', '', NULL, NULL, '', '', 'N', 'pending_verification', 'pending_activation', '2015-02-28', '0000-00-00 00:00:00', 'T30322635', '2015-02-27 22:00:00', 0, '0000-00-00 00:00:00', 0, 'd6d8b319e61cd776ba80053989b2683d727fdf91'),
(174, '07037816645', '1aa639044e70fc386dbe25fc8f3f793bc09720fa1900446228d9af2d29c2b85768cb9f537108681f', '', 'lawal', 'bukola', 'bukkylawal35@yahoo.com', '0000-00-00', '', NULL, NULL, '07037816645', '', 'N', 'pending_verification', 'pending_activation', '2015-02-28', '0000-00-00 00:00:00', 'T75320548', '2015-02-27 22:00:00', 0, '0000-00-00 00:00:00', 0, '1900446228d9af2d29c2b85768cb9f537108681f'),
(175, '08166874607', 'd0c4047caa5bbe26ed27248a3fc325cb8b972f6bf1dd17f8202955b63f42d2c722cbb2cf04cdf623', '', 'Ada', 'Iwe', 'katrinna_iwe@yahoo.com', '0000-00-00', '', NULL, NULL, '08166874607', '', 'N', 'pending_verification', 'pending_activation', '2015-02-28', '0000-00-00 00:00:00', 'T22577757', '2015-02-27 22:00:00', 0, '0000-00-00 00:00:00', 0, 'f1dd17f8202955b63f42d2c722cbb2cf04cdf623'),
(176, '08163963759', 'cf964f777bb23be9988ce6f0f2b9d562fb145498ff2f3c803f7a2a48a04f37378c75634f2f05f780', '', 'Olamide', 'Adeteye', 'Olamideadeteye@gmail.com', '0000-00-00', '', NULL, NULL, '07081534418', 'Olumideoworu@gmail.com', 'N', 'pending_verification', 'pending_activation', '2015-02-28', '0000-00-00 00:00:00', 'T58849862', '2015-02-27 22:00:00', 0, '0000-00-00 00:00:00', 0, 'ff2f3c803f7a2a48a04f37378c75634f2f05f780'),
(177, '08139159618', '3711ed8a0eb721dc65f3fda0305cba4e74cc8424a61af772080ad0c69047b47b9630000a9f77cf18', '', 'sterphanie', 'maku', 'kiki_steph@yahoo.com', '0000-00-00', '', NULL, NULL, '08139159618', '', 'N', 'pending_verification', 'pending_activation', '2015-02-28', '0000-00-00 00:00:00', 'T26360661', '2015-02-27 22:00:00', 0, '0000-00-00 00:00:00', 0, 'a61af772080ad0c69047b47b9630000a9f77cf18'),
(178, '08134501888', '73daa6245299e9e64a6c8dc23465987b582c74070338c1b2e215f1e85fad8fac0b52497673def8f1', '', 'Temitayo', 'Elebiyo', 'T.elebz@yahoo.com', '0000-00-00', '', NULL, NULL, '', '', 'N', 'pending_verification', 'pending_activation', '2015-02-28', '0000-00-00 00:00:00', 'T57674869', '2015-02-27 22:00:00', 0, '0000-00-00 00:00:00', 0, '0338c1b2e215f1e85fad8fac0b52497673def8f1'),
(179, '+2348168956743', '5f0a4cd330d6f265e1b072f134668feea40215b9838b746bb10a248ca1a3a6f5cb321cd769b5a64c', '', 'bimbo', 'fanimokun', 'abimbolafanimokun@yahoo.com', '0000-00-00', '', NULL, NULL, '+2348168956743', '', 'N', 'pending_verification', 'pending_activation', '2015-02-28', '0000-00-00 00:00:00', 'T27598847', '2015-02-27 22:00:00', 0, '0000-00-00 00:00:00', 0, '838b746bb10a248ca1a3a6f5cb321cd769b5a64c'),
(180, '08139004743', '2a34f2fb5c3f6ec9f8ec48867a8ff569a232f4d68a3eaf7e9738e2b9343c07e390bc2f9d0b86e148', '', 'Nonye', 'Okwuonu', 'nonye_okwuonu2005@yahoo.com', '0000-00-00', '', NULL, NULL, '08086281785', '', 'Y', 'pending_verification', 'activated', '2015-02-28', '0000-00-00 00:00:00', 'T78794745', '2015-02-27 22:00:00', 0, '0000-00-00 00:00:00', 0, '8a3eaf7e9738e2b9343c07e390bc2f9d0b86e148'),
(181, '08021024590', 'cfd35287d13627898dfdcf95bc2469365a9f76dff7ebc6034ed7f75ab5dc162be71fba42973ff0a1', '', 'Adelakun', 'Olalekan', 'lekanlinc@gmail.com', '0000-00-00', '', NULL, NULL, '', '', 'N', 'pending_verification', 'pending_activation', '2015-02-28', '0000-00-00 00:00:00', 'T86448562', '2015-02-27 22:00:00', 0, '0000-00-00 00:00:00', 0, 'f7ebc6034ed7f75ab5dc162be71fba42973ff0a1'),
(182, '07011588672', 'f43005208fd4a344586638dba908b4f7133dc90656eec12b878b881c52375c5cfb9bbe1040d5d1ed', '', 'Omotoyosi', 'Adetunji', 'omotoyosiadetunji@gmail.com', '0000-00-00', '', NULL, NULL, '', '', 'N', 'pending_verification', 'pending_activation', '2015-02-28', '0000-00-00 00:00:00', 'T53914658', '2015-02-27 22:00:00', 0, '0000-00-00 00:00:00', 0, '56eec12b878b881c52375c5cfb9bbe1040d5d1ed'),
(183, '08134988379', 'a31e44e0548b4c995336834db72c429ffc0f13bad6f87e5e139230e3c75645369204ce7ca070fadc', '', 'Fatim', 'Doumbouya', 'Fatimdoumbouya@yahoo.com', '0000-00-00', 'Lagos', '', '', '', '', 'Y', 'pending_verification', 'activated', '2015-02-28', '0000-00-00 00:00:00', 'T40513558', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, 'd6f87e5e139230e3c75645369204ce7ca070fadc'),
(184, '08135743984', '2eb5d4f38683b75e6f17b1641f114965476e8c97f8680d7f574539e67f803a0fe7de3575b2b84dfc', '', 'belema', 'wakama', 'belemawakama@gmail.com', '0000-00-00', '', NULL, NULL, '', '', 'N', 'pending_verification', 'pending_activation', '2015-02-28', '0000-00-00 00:00:00', 'T40833890', '2015-02-27 22:00:00', 0, '0000-00-00 00:00:00', 0, 'f8680d7f574539e67f803a0fe7de3575b2b84dfc'),
(185, '08187241756', 'f886c3cfd92a3e95c765b3407e53046451cfcda5272f39a9f9a519e09deddb3806493bf7a5a919b2', '', 'Aderonke', 'Lasisi', 'Aderonkelasisi@yahoo.com', '0000-00-00', '', NULL, NULL, '', '', 'N', 'pending_verification', 'pending_activation', '2015-02-28', '0000-00-00 00:00:00', 'T50945683', '2015-02-27 22:00:00', 0, '0000-00-00 00:00:00', 0, '272f39a9f9a519e09deddb3806493bf7a5a919b2'),
(186, '07039409241', 'd774d1c4876e4dc320ff2a109c205cb480db4c2e8fcd1b8af1b41986f54870a6b4e70bac7a3223f2', '', 'chiazor', 'uduh', 'chiazorpeace@yahoo.com', '0000-00-00', '', NULL, NULL, '08128972932', '', 'N', 'pending_verification', 'pending_activation', '2015-02-28', '0000-00-00 00:00:00', 'T84240945', '2015-02-27 22:00:00', 0, '0000-00-00 00:00:00', 0, '8fcd1b8af1b41986f54870a6b4e70bac7a3223f2'),
(187, '08025911133', '59267d67f3dea635e1feeab63a02fb196c10d1a87c83a0ec03b083fe751bf6268273a6ed3d673191', '', 'igbudu', 'felix', 'flexyjeff2000@yahoo.com', '0000-00-00', '', NULL, NULL, '', '', 'N', 'pending_verification', 'pending_activation', '2015-02-28', '0000-00-00 00:00:00', 'T50577510', '2015-02-27 22:00:00', 0, '0000-00-00 00:00:00', 0, '7c83a0ec03b083fe751bf6268273a6ed3d673191'),
(188, '07038917312', 'cca1b967f5c175b884133fd5464aed082ffc79fd46d579747bbe9159075a188e176742b2e206a5f9', '', 'Johnson', 'Ehis', 'naijalord4life@gmail.com', '0000-00-00', '', NULL, NULL, '', '', 'N', 'pending_verification', 'pending_activation', '2015-02-28', '0000-00-00 00:00:00', 'T20626753', '2015-02-27 22:00:00', 0, '0000-00-00 00:00:00', 0, '46d579747bbe9159075a188e176742b2e206a5f9'),
(189, '08180045223', '58ead6e003ea75a9d884179d50a97dc2fc96cb0558f04e349a4bd4d9fef95119d034eaf588be40dd', '', 'oyeyemi', 'olagbaiye', 'olagbaiyeo@yahoo.com', '0000-00-00', '', NULL, NULL, '', '', 'N', 'pending_verification', 'pending_activation', '2015-02-28', '0000-00-00 00:00:00', 'T87945575', '2015-02-27 22:00:00', 0, '0000-00-00 00:00:00', 0, '58f04e349a4bd4d9fef95119d034eaf588be40dd'),
(190, '08074120505', 'a519ba150f930ccbf344b32b323e9a6aa67df2db1126de57b461df37cf256be8753eed714da58877', '', 'iris', 'afangbedji', 'afangbedjiiris@gmail.com', '0000-00-00', 'Lagos', '', '', '08023034408', '', 'Y', 'pending_verification', 'activated', '2015-03-01', '0000-00-00 00:00:00', 'T94174558', '2015-02-28 22:00:00', 0, '0000-00-00 00:00:00', 0, '1126de57b461df37cf256be8753eed714da58877'),
(191, '08102511164', '18a98c35f49808b45edadc75fb1b25ebfd4037d66f9f0130997a77140ee53f664257700e8c45f398', '', 'Gabriel', 'Oni', 'justgbemiro@gmail.com', '0000-00-00', '', NULL, NULL, '08102511164', '', 'N', 'pending_verification', 'pending_activation', '2015-03-02', '0000-00-00 00:00:00', 'T36565995', '2015-03-01 22:00:00', 0, '0000-00-00 00:00:00', 0, '6f9f0130997a77140ee53f664257700e8c45f398'),
(192, '07032115378', '8bcfe7d359ec995e73afbac5d13d3071947764e6715c8599005850307271d193e122b640f77d9833', '', 'lungfa', 'ndam', 'lungfandam@gmail.com', '1983-05-29', 'Lagos', '', '', '08038932260', 'esther.orags@gmail.com', 'Y', 'pending_verification', 'activated', '2015-03-03', '0000-00-00 00:00:00', 'T35865683', '2015-03-02 22:00:00', 0, '0000-00-00 00:00:00', 0, '715c8599005850307271d193e122b640f77d9833'),
(193, '08032002512', '95aea696c0b87f1ce33caa228afe86694a1030d0b90e79405787b114346e472e24db0ed5e8ef2d42', '', 'Basit', 'Arogundade', 'basita@ebsafr.com', '1965-03-03', 'Lagos', '6 James George \r\nAlagbon \r\n\r\nClose\r\nIkoyi - Lagos', '80b Lafiaji Way\r\nDolphin\r\nIkoyi - Lagos', '08182102198', 'olumidep@hotmail.com', 'Y', 'pending_verification', 'activated', '2015-03-03', '0000-00-00 00:00:00', 'T17238549', '2015-03-02 22:00:00', 0, '0000-00-00 00:00:00', 0, 'b90e79405787b114346e472e24db0ed5e8ef2d42'),
(194, '08027297055', '48640d46cd60321ec6d9585eabd59d8e8e069bdf746a8aa34cf1dc355fdc2cf3f63b537345dc6468', '', 'Remilekun', 'Ayeni', 'ayeniremi2001@yahoo.com', '0000-00-00', '', NULL, NULL, '', '', 'N', 'pending_verification', 'pending_activation', '2015-03-03', '0000-00-00 00:00:00', 'T17860551', '2015-03-02 22:00:00', 0, '0000-00-00 00:00:00', 0, '746a8aa34cf1dc355fdc2cf3f63b537345dc6468'),
(195, '07033868155', '041849b0f6bebaf40ac451ab3ba685899123b2bc4240f339f5229506ece0d9a58ff64cc13c959c87', '', 'Edu', 'Andrew', 'eduandrewsat@yahoo.com', '0000-00-00', 'Lagos', '', '24,Chris Alli Cresent,Abacha \r\n\r\nEstate.Ikoyi', '08185991363', '', 'Y', 'pending_verification', 'activated', '2015-03-04', '0000-00-00 00:00:00', 'T58985846', '2015-03-03 22:00:00', 0, '0000-00-00 00:00:00', 0, '4240f339f5229506ece0d9a58ff64cc13c959c87'),
(196, '08177587928', '6339d4013d05ed7b24bec7d4af267ddb8a28f2267ec4d2a68c9d57afc0f104f7ba56dbdc00490ce9', '', 'tewogbola', 'adebanjo', 'armellemoi93@gmail.com', '1988-11-30', 'Lagos', '', '', '08054161133', '', 'Y', 'pending_verification', 'activated', '2015-03-05', '0000-00-00 00:00:00', 'T29576896', '2015-03-04 22:00:00', 0, '0000-00-00 00:00:00', 0, '7ec4d2a68c9d57afc0f104f7ba56dbdc00490ce9'),
(197, '07032629551', 'd80eef7efd40f85a40eb2b5ed23e9530e03d2ef55044a081487459fb6c226058488242df1fafe7f6', '', 'ife', 'ajadi', 'ify_4r_real@yahoo.com', '0000-00-00', 'Lagos', '', '', '', '', 'Y', 'pending_verification', 'activated', '2015-03-05', '0000-00-00 00:00:00', 'T25750662', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, '5044a081487459fb6c226058488242df1fafe7f6'),
(198, '08087237631', '5c677372383ed5a8ace49cd68f63c3adf4852cd4940faf43071e4822e6940f9cf98d07c72004617b', '', 'Uwa', 'Oga', 'shus4real@yahoo.com', '0000-00-00', '', NULL, NULL, '07034342184', '', 'N', 'pending_verification', 'pending_activation', '2015-03-07', '0000-00-00 00:00:00', 'T14834677', '2015-03-06 22:00:00', 0, '0000-00-00 00:00:00', 0, '940faf43071e4822e6940f9cf98d07c72004617b'),
(199, '07057721851', '626eb03ed8f1f433df2b0de1d3c4d66063136454e8bad9315d2751e57c3a4c2de87b4d35561b3183', '', 'Subuola', 'Elufioye', 'temitopeelufioye@yahoo.com', '0000-00-00', '', NULL, NULL, '', '', 'N', 'pending_verification', 'pending_activation', '2015-03-07', '0000-00-00 00:00:00', 'T46705915', '2015-03-06 22:00:00', 0, '0000-00-00 00:00:00', 0, 'e8bad9315d2751e57c3a4c2de87b4d35561b3183'),
(200, '08064257296', 'c7c6f93b79fa765003bd764f2b0234ba79e86d3c2e86438b7ff1847dc2ee457cda7e87c331d34681', '', 'Angel', 'Ekuma', 'Rahfeneekuma@yahoo.com', '0000-00-00', '', NULL, NULL, '', '', 'N', 'pending_verification', 'pending_activation', '2015-03-07', '0000-00-00 00:00:00', 'T59243781', '2015-03-06 22:00:00', 0, '0000-00-00 00:00:00', 0, '2e86438b7ff1847dc2ee457cda7e87c331d34681'),
(201, '08160476023', '3687328053a8db795fbdc9e3f55b03593529ab382cb266d93fab366785199fc59d8e2f785d76ed63', '', 'Isioma', 'Onuora', 'Onuorachukwufumnanya@gmail.com', '0000-00-00', '', NULL, NULL, '08160476023', '', 'N', 'pending_verification', 'pending_activation', '2015-03-07', '0000-00-00 00:00:00', 'T54593664', '2015-03-06 22:00:00', 0, '0000-00-00 00:00:00', 0, '2cb266d93fab366785199fc59d8e2f785d76ed63'),
(202, '08089623280', '37a9cf81b92b6e57bc76e23c3a25acd3e50437fcd37b3893d60b19b485a3e29dd6728fa685ea066f', '', 'Angel', 'Udoh', 'Cassiudoh11@yahoo.com', '0000-00-00', '', NULL, NULL, '', '', 'N', 'pending_verification', 'pending_activation', '2015-03-07', '0000-00-00 00:00:00', 'T19744726', '2015-03-06 22:00:00', 0, '0000-00-00 00:00:00', 0, 'd37b3893d60b19b485a3e29dd6728fa685ea066f'),
(203, '07014255848', 'dcdda553f58fe5805ea19668d4c67e11a3fa4f052b75106b445a3dae8adaaf21f6db6a6d7a2367e2', '', 'Mary', 'Ayotunde', 'Maryjoanne.ayotunde@yahoo.com', '0000-00-00', '', NULL, NULL, '', '', 'N', 'pending_verification', 'pending_activation', '2015-03-07', '0000-00-00 00:00:00', 'T11459848', '2015-03-06 22:00:00', 0, '0000-00-00 00:00:00', 0, '2b75106b445a3dae8adaaf21f6db6a6d7a2367e2'),
(204, '08122220096', 'b1b750178acbdc1ef59bdc36768d3fae73e20f238978cf4917c750ba269a4789dc894048ce1f3959', '', 'Amarachi', 'Nwaobiala', 'Kingamy20@gmail.com', '0000-00-00', '', NULL, NULL, '', '', 'N', 'pending_verification', 'pending_activation', '2015-03-07', '0000-00-00 00:00:00', 'T94468927', '2015-03-06 22:00:00', 0, '0000-00-00 00:00:00', 0, '8978cf4917c750ba269a4789dc894048ce1f3959'),
(205, '08022341878', 'd2a593c9981b858b488a27b3eede10666cc33e1b211303d7fde11662bd03cd47c9f740d2a85ccdcf', '', 'Rabi', 'Hassan', 'Mannequin_mimmy16@yahoo.com', '0000-00-00', '', NULL, NULL, '', '', 'N', 'pending_verification', 'pending_activation', '2015-03-07', '0000-00-00 00:00:00', 'T70402599', '2015-03-06 22:00:00', 0, '0000-00-00 00:00:00', 0, '211303d7fde11662bd03cd47c9f740d2a85ccdcf'),
(206, '09096854785', '9d228521a2fc2856e9c94707116039dff9f8488c24467109f81fec664c519abf837e4ff9f5ba6817', '', 'Ruth', 'Titilopemi', 'abolarin_ruth@yahoo.com', '0000-00-00', '', NULL, NULL, '07051241830', '', 'N', 'pending_verification', 'pending_activation', '2015-03-07', '0000-00-00 00:00:00', 'T86452872', '2015-03-06 22:00:00', 0, '0000-00-00 00:00:00', 0, '24467109f81fec664c519abf837e4ff9f5ba6817'),
(207, '08027853406', 'cc5e0e882d96c013755eb25bec22a7f733a90bc991eb00e666c8653040eca292fefbf432ea82b4b8', '', 'Sherifat', 'Omogiafo', 'Sa_omogiafo@yahoo.com', '0000-00-00', '', NULL, NULL, '08027853406', '', 'N', 'pending_verification', 'pending_activation', '2015-03-07', '0000-00-00 00:00:00', 'T81766949', '2015-03-06 22:00:00', 0, '0000-00-00 00:00:00', 0, '91eb00e666c8653040eca292fefbf432ea82b4b8'),
(208, '08092939879', '0e48ea27d1bcfd4a7c7671ea0f86cf4487bedfc4193060678ee00e6412de14bc3806ef7ce5c108de', '', 'Deborah', 'Abolarin', 'abolarin.d@gmail.com', '0000-00-00', '', NULL, NULL, '08139051772', '', 'N', 'pending_verification', 'pending_activation', '2015-03-07', '0000-00-00 00:00:00', 'T28504639', '2015-03-06 22:00:00', 0, '0000-00-00 00:00:00', 0, '193060678ee00e6412de14bc3806ef7ce5c108de'),
(209, '08160856740', '47beef0a3ece767ae372010bacad77224e0e0d56eda97331371db2bf7899cd2f347f86411cdf5175', '', 'Funto', 'Musa', 'funtomusa@yahoo.com', '0000-00-00', '', NULL, NULL, '', '', 'N', 'pending_verification', 'pending_activation', '2015-03-07', '0000-00-00 00:00:00', 'T54904644', '2015-03-06 22:00:00', 0, '0000-00-00 00:00:00', 0, 'eda97331371db2bf7899cd2f347f86411cdf5175'),
(210, '08034156189', '49fa7e955dea74101ce74b4d53b6d2f7be0c0a388502fa8bcc8d7cd30ddd9fcc0b7aa4e294fc803b', '', 'Idera', 'Ajisafe', 'Idera_ajisafe@yahoo.com', '0000-00-00', '', NULL, NULL, '', '', 'N', 'pending_verification', 'pending_activation', '2015-03-07', '0000-00-00 00:00:00', 'T10409981', '2015-03-06 22:00:00', 0, '0000-00-00 00:00:00', 0, '8502fa8bcc8d7cd30ddd9fcc0b7aa4e294fc803b'),
(211, '08059393729', '2ece6abe80345d9ecd8c2e22e4a55e13100fcaca7b6bb13802b3ff434c31f18125ab9836e74a24f6', '', 'Bolu', 'Kara', 'Bkaykara@gmail.cok', '0000-00-00', '', NULL, NULL, '', '', 'N', 'pending_verification', 'pending_activation', '2015-03-07', '0000-00-00 00:00:00', 'T78579649', '2015-03-06 22:00:00', 0, '0000-00-00 00:00:00', 0, '7b6bb13802b3ff434c31f18125ab9836e74a24f6'),
(212, '08175075076', '65b170e3f5e6a2770e574e6d1fc51a22a91dbd45b34f7b8566c32a7572cbf372fd1451b3e9c181cf', '', 'Stephanie', 'Modilim', 'Modilimstephanie@gmail.com', '0000-00-00', '', NULL, NULL, '08175075076', '', 'N', 'pending_verification', 'pending_activation', '2015-03-07', '0000-00-00 00:00:00', 'T95417516', '2015-03-06 22:00:00', 0, '0000-00-00 00:00:00', 0, 'b34f7b8566c32a7572cbf372fd1451b3e9c181cf'),
(213, '07067420247', '899a41dbac179b65c8ee28f574c85ec8f591c04fce56adb0f9b42ea5bf89bfbfdbdc40e458ef0d36', '', 'Itoro', 'Robert', 'Itoro90@gmail.com', '0000-00-00', '', NULL, NULL, '', '', 'N', 'pending_verification', 'pending_activation', '2015-03-07', '0000-00-00 00:00:00', 'T13525622', '2015-03-06 22:00:00', 0, '0000-00-00 00:00:00', 0, 'ce56adb0f9b42ea5bf89bfbfdbdc40e458ef0d36'),
(214, '07061581022', 'b1357bcc9e46da7c2cde8574f3da7dbb434d01eac5cd44091f138d22ef9ec8d682f0027e2b9b65b3', '', 'Titilope', 'Akinsola', 'Titilopeakinsola@yahoo.com', '0000-00-00', '', NULL, NULL, '07061581022', '', 'N', 'pending_verification', 'pending_activation', '2015-03-07', '0000-00-00 00:00:00', 'T60402859', '2015-03-06 22:00:00', 0, '0000-00-00 00:00:00', 0, 'c5cd44091f138d22ef9ec8d682f0027e2b9b65b3'),
(215, '08102579130', '5ed104d7e11cb0c3231b3cd24a21944542b74b94f01464e9c80c0509c6f1a15b08f2abcfa1b71305', '', 'Modupe', 'Edward-Mills', 'Millsmodupe@yahoo.com', '0000-00-00', '', NULL, NULL, '08080288090', '', 'N', 'pending_verification', 'pending_activation', '2015-03-07', '0000-00-00 00:00:00', 'T25336937', '2015-03-06 22:00:00', 0, '0000-00-00 00:00:00', 0, 'f01464e9c80c0509c6f1a15b08f2abcfa1b71305'),
(216, '08074671556', 'ed4f3813da9c244c4de17b57a6b54086bd27b90f946bcff0ef633a54c38dd2a6ba586ac1294ac8e5', '', 'Elaami', 'Amaso', 'Amasoelaami@gmail.com', '0000-00-00', '', NULL, NULL, '07011342756', '', 'N', 'pending_verification', 'pending_activation', '2015-03-07', '0000-00-00 00:00:00', 'T14292860', '2015-03-06 22:00:00', 0, '0000-00-00 00:00:00', 0, '946bcff0ef633a54c38dd2a6ba586ac1294ac8e5'),
(217, '08030471558', '090d1db39078a9d66ed55e5489bec272b4368f3d7c206a875e4fc1b6d4b86c08956e8d48e15790ba', '', 'Omonehmie', 'Okoeguale', 'aeezy101@yahoo.com', '0000-00-00', '', NULL, NULL, '07014085865', '', 'N', 'pending_verification', 'pending_activation', '2015-03-07', '0000-00-00 00:00:00', 'T67770606', '2015-03-06 22:00:00', 0, '0000-00-00 00:00:00', 0, '7c206a875e4fc1b6d4b86c08956e8d48e15790ba'),
(218, '07088199138', 'bf93118ded1f4f728ab73fffc506611f5c60a582690b071c488f6fa350e03c61141fef63afe95cad', '', 'Ogeolouwa', 'Afolabi', 'Ogeoluwafrancess@yahoo.com', '0000-00-00', '', NULL, NULL, '', '', 'N', 'pending_verification', 'pending_activation', '2015-03-07', '0000-00-00 00:00:00', 'T62575577', '2015-03-06 22:00:00', 0, '0000-00-00 00:00:00', 0, '690b071c488f6fa350e03c61141fef63afe95cad'),
(219, '07064466655', 'eb7be21a7e503f9e0802d2df8457fff8e33712a1b1eec842bea6c201f094eb4ee85ab8f3607302dc', '', 'Chinyere', 'Edom', 'Chichiedom@yahoo.com', '0000-00-00', '', NULL, NULL, '', '', 'N', 'pending_verification', 'pending_activation', '2015-03-07', '0000-00-00 00:00:00', 'T35429626', '2015-03-06 22:00:00', 0, '0000-00-00 00:00:00', 0, 'b1eec842bea6c201f094eb4ee85ab8f3607302dc'),
(220, '08188699271', '542015214987eb84b62379eef964e4d9a0b86d2cabf8a6bbc212de6dfc0fde61a19f543fb5948bb9', '', 'Esther', 'Lawanson', 'Fleshistar@gmail.com', '0000-00-00', '', NULL, NULL, '0815073490', '', 'Y', 'pending_verification', 'activated', '2015-03-07', '0000-00-00 00:00:00', 'T70109628', '2015-03-06 22:00:00', 0, '0000-00-00 00:00:00', 0, 'abf8a6bbc212de6dfc0fde61a19f543fb5948bb9'),
(221, '08104872479', 'e359cfbeb7442ca24575b6ad83dda78d6ea5cdee24d47f28dec31eb6bf9a76debd29d1cec3d201d0', '', 'Adetola', 'Jones', 'adetolajones@gmail.com', '0000-00-00', '', NULL, NULL, '09098971335', '', 'N', 'pending_verification', 'pending_activation', '2015-03-07', '0000-00-00 00:00:00', 'T81830642', '2015-03-06 22:00:00', 0, '0000-00-00 00:00:00', 0, '24d47f28dec31eb6bf9a76debd29d1cec3d201d0'),
(222, '08163637333', '8ad001b23f7aca47588f093a7c7e1982c45c1fdb52300275b77de8b91136726543bff1f65063cbd9', '', 'Ngozi', 'Ononogbu', 'Pearlycrystal@ymail.com', '0000-00-00', '', NULL, NULL, '08179888753', '', 'N', 'pending_verification', 'pending_activation', '2015-03-07', '0000-00-00 00:00:00', 'T27726502', '2015-03-06 22:00:00', 0, '0000-00-00 00:00:00', 0, '52300275b77de8b91136726543bff1f65063cbd9'),
(223, '08030878818', '9f2f9c1809694ff32f9f547533961c82600898ec740f17a197383ef9a5a0937f2dc00c919df52406', '', 'Halima', 'Mason', 'Leema.mason@gmail.com', '0000-00-00', '', NULL, NULL, '', '', 'N', 'pending_verification', 'pending_activation', '2015-03-07', '0000-00-00 00:00:00', 'T18457784', '2015-03-06 22:00:00', 0, '0000-00-00 00:00:00', 0, '740f17a197383ef9a5a0937f2dc00c919df52406'),
(224, '08189149116', 'fa25af5301e2dda1fddea740200aa10ab6c70d86f4ff6aefb5d3761a47c1f34aa0d4d2b8d254c68c', '', 'Johnson', 'Josephine', 'Josephinej67@yahoo.com', '0000-00-00', '', NULL, NULL, '08189149116', '', 'N', 'pending_verification', 'pending_activation', '2015-03-07', '0000-00-00 00:00:00', 'T67309582', '2015-03-06 22:00:00', 0, '0000-00-00 00:00:00', 0, 'f4ff6aefb5d3761a47c1f34aa0d4d2b8d254c68c'),
(225, '08160250805', '94e184fde4e9f139ec41b6944b7cd1e718b906fc53623894743ffe4b7eafa1b39640633cbb3c88a9', '', 'Chiamaka', 'Amajuoyi', 'Chiamaka.amajuoyi@gmail.com', '0000-00-00', '', NULL, NULL, '', '', 'N', 'pending_verification', 'pending_activation', '2015-03-07', '0000-00-00 00:00:00', 'T16305842', '2015-03-06 22:00:00', 0, '0000-00-00 00:00:00', 0, '53623894743ffe4b7eafa1b39640633cbb3c88a9'),
(226, '07036308393', 'd1f69fb3e6a76fec483fe580f6a290ffc7b56f664caf524ccdf06576b9361a9c9657e9f579aba317', '', 'Mobolaji', 'Olotu', 'tinukeo@hotmail.com', '0000-00-00', '', NULL, NULL, '', '', 'Y', 'pending_verification', 'activated', '2015-03-07', '0000-00-00 00:00:00', 'T44552962', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, '4caf524ccdf06576b9361a9c9657e9f579aba317'),
(227, '08088117957', '4ee35ba5dfc67eac46ee6a34972f6a859c41ae52f82bd81d680034ae1895bd1856cec772046cc1b3', '', 'Yetunde', 'Adelumola', 'Baddieyates@yahoo.com', '0000-00-00', '', NULL, NULL, '', '', 'N', 'pending_verification', 'pending_activation', '2015-03-07', '0000-00-00 00:00:00', 'T30492805', '2015-03-06 22:00:00', 0, '0000-00-00 00:00:00', 0, 'f82bd81d680034ae1895bd1856cec772046cc1b3'),
(228, '08060815449', 'b8d04fea943a765ceef98cdd2336872c782a01902cea2d0a40e2ab26e23cb7d5e6133604e908af3c', '', 'damilola', 'atiri', 'damilola.atiri@gmail.com', '1981-02-03', 'Lagos', '', '', '', 'olufemi.sodipe@deuxproject.com', 'Y', 'pending_verification', 'activated', '2015-03-09', '0000-00-00 00:00:00', 'T36697938', '2015-03-08 22:00:00', 0, '0000-00-00 00:00:00', 0, '2cea2d0a40e2ab26e23cb7d5e6133604e908af3c'),
(229, '08033045313', 'ce03f6ba25350a18c7ad696a274f00728e8d9727c82419c4fc96666fd4532f9ae1225734980f2931', '', 'ikyuma', 'aondo-akaa', 'iyahma@yahoo.com', '0000-00-00', '', NULL, NULL, '', '', 'Y', 'pending_verification', 'activated', '2015-03-13', '0000-00-00 00:00:00', 'T97376627', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, 'c82419c4fc96666fd4532f9ae1225734980f2931'),
(230, '07031806515', '772966ac7df55b047aa8dd262652e3825c65f23e1c5e8233d77a355a89df808849e7033b2f59782b', '', 'isaac', 'nnamdi', 'isaac_ekeoma@yahoo.com', '0000-00-00', '', NULL, NULL, '08059759229', '', 'N', 'pending_verification', 'pending_activation', '2015-03-14', '0000-00-00 00:00:00', 'T25839780', '2015-03-13 22:00:00', 0, '0000-00-00 00:00:00', 0, '1c5e8233d77a355a89df808849e7033b2f59782b'),
(231, '07082964648', '270de3865f2fc7819c96c69b3dc48b97639422ca7583224397abb62110ed14c694de3aac48fe4e4f', '', 'karimah', 'lawal', 'karimah.lawal@yahoo.com', '0000-00-00', 'Lagos', '', '', '08183828772', '', 'Y', 'pending_verification', 'activated', '2015-03-15', '0000-00-00 00:00:00', 'T37410517', '2015-03-14 22:00:00', 0, '0000-00-00 00:00:00', 0, '7583224397abb62110ed14c694de3aac48fe4e4f'),
(232, '2348036753879', 'c7c003be084c692951c73f1172c2d61e53b3f6a478ca0d7686d99ccafbc3acd4ffc3b8ba574fa37e', '', 'Adaeze', 'Madubuike', 'adaezemadubuike@yahoo.com', '0000-00-00', '', NULL, NULL, '07040002887', '', 'N', 'pending_verification', 'pending_activation', '2015-03-19', '0000-00-00 00:00:00', 'T49448883', '2015-03-18 22:00:00', 0, '0000-00-00 00:00:00', 0, '78ca0d7686d99ccafbc3acd4ffc3b8ba574fa37e'),
(233, '08068167555', '776c739c13133d63f727703ce698f80c87f5127932de529d5d1ab52a27fc64e4d0ccc86b1803a44a', '', 'Osifeso', 'Anuoluwapo', 'Osifunjay@yahoo.com', '0000-00-00', 'Lagos', '', 'Stanbic IBTC Idejo \r\n\r\noff Adeola Odeku road', '08068167555', '', 'Y', 'pending_verification', 'activated', '0000-00-00', '0000-00-00 00:00:00', 'T16861730', '2015-03-19 22:00:00', 0, '0000-00-00 00:00:00', 0, '32de529d5d1ab52a27fc64e4d0ccc86b1803a44a'),
(234, '08032378940', 'a727de8282b873274c8ae199dbb7cbfe66348f4a6a434007aa2aa860a03d656c8209432df8598685', '', 'Nikki', 'Chinakwe', 'nikkichinakwe@gmail.com', '0000-00-00', 'Lagos', '', '', '08186024540', '', 'Y', 'pending_verification', 'activated', '2015-03-20', '0000-00-00 00:00:00', 'T91901540', '2015-03-19 22:00:00', 0, '0000-00-00 00:00:00', 0, '6a434007aa2aa860a03d656c8209432df8598685'),
(235, '08052986547', '93b72ea83f5f323d2638a74f7b07e505585a6937f34b833bac1f41defbfc071d200b6d901955b001', '', 'Ahmed', 'Oni', 'onyxhamed@yahoo.com', '1978-11-23', 'Lagos', '', '', '08068287057', 'onyxoone@yahoo.com', 'Y', 'pending_verification', 'activated', '2015-03-21', '0000-00-00 00:00:00', 'T33107889', '2015-03-20 22:00:00', 0, '0000-00-00 00:00:00', 0, 'f34b833bac1f41defbfc071d200b6d901955b001'),
(236, '08138859939', 'd532acaac2f25d2cc0aa954204a4f6c3363b713f6e0db770b51c491d72ca8fe0f9672cb66bea5faa', '', 'ubong', 'brownson', 'ubong6666@gmail.com', '1992-09-12', 'Lagos', '', '', '08138859939', 'ubongbrownson72@yahoo.com', 'Y', 'pending_verification', 'activated', '2015-03-31', '0000-00-00 00:00:00', 'T90458535', '2015-03-30 22:00:00', 0, '0000-00-00 00:00:00', 0, '6e0db770b51c491d72ca8fe0f9672cb66bea5faa'),
(237, '09028965478', '87e230040921d4a02694f4cd9716d927de076753beffbc63845cfedffd3c8f09f194fca27d6bd835', '', 'oladipupo', 'morenikeji', 'oladipupomorenikeji@gmail.com', '0000-00-00', '', NULL, NULL, '09028965478', '', 'N', 'pending_verification', 'pending_activation', '2015-03-31', '0000-00-00 00:00:00', 'T50226883', '2015-03-30 22:00:00', 0, '0000-00-00 00:00:00', 0, 'beffbc63845cfedffd3c8f09f194fca27d6bd835'),
(238, '0037152973', '8065c9467260692f7fb16c0897de03125d4e0f14da2af58ec0d0ad4b5b9f81eeb0f9d7b587d4a3c0', '', 'Omolade', 'Oderinde', 'flowerchild_y@hotmail.com', '0000-00-00', 'Lagos', '', '', '08099876569', '', 'Y', 'pending_verification', 'activated', '2015-04-01', '0000-00-00 00:00:00', 'T12458992', '2015-03-31 22:00:00', 0, '0000-00-00 00:00:00', 0, 'da2af58ec0d0ad4b5b9f81eeb0f9d7b587d4a3c0'),
(239, '08035804563', '7ef74f7d01f33475a0971c8182b4f1a249bfa1a0eb4faec440fc50c68d294f0659ea15473be0b680', '', 'Kazeem', 'Kareem', 'kmobol@yahoo.com', '0000-00-00', '', NULL, NULL, '', 'mcafann@gmail.com', 'Y', 'pending_verification', 'activated', '2015-04-03', '0000-00-00 00:00:00', 'T30406839', '2015-04-02 22:00:00', 0, '0000-00-00 00:00:00', 0, 'eb4faec440fc50c68d294f0659ea15473be0b680'),
(241, '08058323705', 'a947dd018fd095d8a46fa0eaf98894a5590a052e8d89d1a17b0ca731c312288631d18d1eebf032e2', '', 'korede', 'edih', 'cupidcore@yahoo.com', '0000-00-00', 'Lagos', '', '', '08027171383', '', 'Y', 'pending_verification', 'activated', '2015-04-03', '0000-00-00 00:00:00', 'T90919762', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, '8d89d1a17b0ca731c312288631d18d1eebf032e2'),
(242, '08080504702', '6c448ccadf1d1551cc85f0f471c87e3a98d6a0d67b0aed37b19db7e3d93d2c568acca87be4674d41', '', 'Ifeanyichukwu', 'Nwachukwu', 'keenflashbzy@gmail.com', '0000-00-00', '', NULL, NULL, '', '', 'N', 'pending_verification', 'pending_activation', '2015-04-03', '0000-00-00 00:00:00', 'T84639796', '2015-04-02 22:00:00', 0, '0000-00-00 00:00:00', 0, '7b0aed37b19db7e3d93d2c568acca87be4674d41'),
(243, '07040001864', 'f552a314f7f2ee1acadc6b732cf6bbb3dce503c70a296646d3792976d5ab2fa149a6bbc18406d5b4', '', 'adekemi', 'adewale', 'abyem78@yahoo.com', '0000-00-00', '', NULL, NULL, '', '', 'N', 'pending_verification', 'pending_activation', '2015-04-04', '0000-00-00 00:00:00', 'T88149966', '2015-04-03 22:00:00', 0, '0000-00-00 00:00:00', 0, '0a296646d3792976d5ab2fa149a6bbc18406d5b4'),
(244, '08103156116', 'f8927463ff1875e111b7a8e67ed04b42c15b931118d9d77852cd48a0e8cc73b5d2195ec823ceabbb', '', 'Aisha', 'Adigun', 'oaadigun@gmail.com', '0000-00-00', '', NULL, NULL, '08120797998', 'fatima_chinwe@yahoo.com', 'Y', 'pending_verification', 'password_reset_pending', '2015-04-07', '0000-00-00 00:00:00', 'T19362940', '2015-04-06 22:00:00', 0, '0000-00-00 00:00:00', 0, '18d9d77852cd48a0e8cc73b5d2195ec823ceabbb'),
(245, '09092139439', '87686af59bfd3dc93a155775b8e53d53aaa2f52c6ca75e1d6280222f6a105c5d6660839b6d5dd197', '', 'Ngozi', 'Blessing', 'Angelblessing572@yahoo.com', '0000-00-00', '', NULL, NULL, '', '', 'N', 'pending_verification', 'pending_activation', '2015-04-07', '0000-00-00 00:00:00', 'T54711562', '2015-04-06 22:00:00', 0, '0000-00-00 00:00:00', 0, '6ca75e1d6280222f6a105c5d6660839b6d5dd197'),
(246, '07042322924', 'a0f8ddabb5731af0d0f89db80804da63a485641f27a2e0b5a32dfcf2cb3657484ae50efda6cc54f1', '', 'Kayode', 'Peter', 'Kcie4mary@yahoo.com', '0000-00-00', '', NULL, NULL, '', '', 'N', 'pending_verification', 'pending_activation', '2015-04-07', '0000-00-00 00:00:00', 'T63564922', '2015-04-06 22:00:00', 0, '0000-00-00 00:00:00', 0, '27a2e0b5a32dfcf2cb3657484ae50efda6cc54f1'),
(247, '07042322924', 'b4bbf3d3924c027d46200c90f3f72db3dadc7dace55dafa1cf353d93c54519fa0e0d06fd0ee2b67b', '', 'Kayzee', 'Peters', 'Kcie4peter@yahoo.com', '0000-00-00', '', NULL, NULL, '', '', 'N', 'pending_verification', 'pending_activation', '2015-04-07', '0000-00-00 00:00:00', 'T76470673', '2015-04-06 22:00:00', 0, '0000-00-00 00:00:00', 0, 'e55dafa1cf353d93c54519fa0e0d06fd0ee2b67b'),
(248, '08071915175', 'b412af7a15026b9be1ae879f541d9d2d1691fd52dfba6645df89a63dceeb1ca1b91d7df3cb8a6d9d', '', 'Ibukun', 'Ogbongbemiga', 'Ibk_ogbon@yahoo.com', '0000-00-00', '', NULL, NULL, '', '', 'Y', 'pending_verification', 'password_reset_pending', '2015-04-07', '0000-00-00 00:00:00', 'T66260719', '2015-04-06 22:00:00', 0, '0000-00-00 00:00:00', 0, 'dfba6645df89a63dceeb1ca1b91d7df3cb8a6d9d'),
(249, '08054980601', 'f8276aaa58185019e220d8f2fa80c49816354f1eec18e9ee59b1802e835592c210ced63acbce6dbf', '', 'Sam', 'Sos', 'tito2010_4real@yahoo.com', '1986-04-15', 'Lagos', '', '', '08054980601', '', 'Y', 'pending_verification', 'activated', '2015-04-07', '0000-00-00 00:00:00', 'T79642973', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, 'ec18e9ee59b1802e835592c210ced63acbce6dbf'),
(250, '08024246895', 'a1f0c7b05bce779a6816d5699364544f5947ada3a8a13f7ac5d82635b581cd5bebf200bc4d60730a', '', 'Kayito', 'Nwokedi', 'Kayitonwokedi@gmail.com', '0000-00-00', '', NULL, NULL, '', '', 'N', 'pending_verification', 'pending_activation', '2015-04-07', '0000-00-00 00:00:00', 'T89602778', '2015-04-06 22:00:00', 0, '0000-00-00 00:00:00', 0, 'a8a13f7ac5d82635b581cd5bebf200bc4d60730a');
INSERT INTO `cg_customer` (`id`, `phone`, `password`, `imsi`, `firstname`, `surname`, `email`, `birth_date`, `state_of_residence`, `home_address`, `office_address`, `alternate_phone`, `referred_email_addr`, `active`, `admin_verification_status`, `reg_status`, `reg_date`, `cancel_date`, `activation_code`, `created_date`, `created_by`, `modified_date`, `modified_by`, `hash_salt`) VALUES
(251, '07066234425', '233a47cf691e053d787638cf13746cde4b22c8ec0ed40b985a413b700e4a7b005750db37a1b017ff', '', 'shola', 'Akinloye', 'Akinloyeshola@hotmail.com', '0000-00-00', '', NULL, NULL, '', '', 'N', 'pending_verification', 'pending_activation', '2015-04-07', '0000-00-00 00:00:00', 'T16883679', '2015-04-06 22:00:00', 0, '0000-00-00 00:00:00', 0, '0ed40b985a413b700e4a7b005750db37a1b017ff'),
(252, '07062747571', '18f78157e859f80fa5fe7532df48010a947c89c389e1df03da264aaba6312f0a7772fe3fb63e57fa', '', 'Tobi', 'Ayoola', 'victoriaayoolah@gmail.com', '0000-00-00', '', NULL, NULL, '', '', 'Y', 'pending_verification', 'activated', '2015-04-07', '0000-00-00 00:00:00', 'T70706747', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, '89e1df03da264aaba6312f0a7772fe3fb63e57fa'),
(253, '08069104385', '200ccb4c1f60448220154ba535e0e4f2cca6200b864c7319876685240eee28614fa8a87083df804e', '', 'funbi', 'oluyisola', 'oluyisolafunbi@yahoo.com', '0000-00-00', '', NULL, NULL, '', '', 'Y', 'pending_verification', 'activated', '2015-04-07', '0000-00-00 00:00:00', 'T77606783', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, '864c7319876685240eee28614fa8a87083df804e'),
(254, '08033332222', 'befa39749509fd9ab56743e14f9d68d843ea4038580c490e92f55f02841210835dc18d92cd82bd6c', '', 'Ebus', 'E', 'fusionlogic@gmail.com', '0000-00-00', 'Lagos', '', 'Falomo, Ikoyi, Lagos', '', '', 'Y', 'pending_verification', 'activated', '2015-04-07', '0000-00-00 00:00:00', 'T29386585', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, '580c490e92f55f02841210835dc18d92cd82bd6c'),
(255, '07033383932', '976751fc0d1fe215be82f43604bfddce8e810d802f1aaaf4625bb55c47800fdbf95096e70feb63d0', '', 'Samuel', 'Ojo', 'ojoakinjidesamuel@gmail.com', '0000-00-00', '', NULL, NULL, '', '', 'N', 'pending_verification', 'pending_activation', '2015-04-07', '0000-00-00 00:00:00', 'T13125587', '2015-04-06 22:00:00', 0, '0000-00-00 00:00:00', 0, '2f1aaaf4625bb55c47800fdbf95096e70feb63d0'),
(256, '08032008890', 'a98a09358382ef59019ae1cccd2a8eade1d3b18c54ee78b41ba025fa70ba853a4a5d0429ca4cae6f', '', 'Stephen', 'Ogechi', 'adestephen20@gmail.com', '0000-00-00', '', NULL, NULL, '08032581535', '', 'N', 'pending_verification', 'pending_activation', '2015-04-07', '0000-00-00 00:00:00', 'T98821864', '2015-04-06 22:00:00', 0, '0000-00-00 00:00:00', 0, '54ee78b41ba025fa70ba853a4a5d0429ca4cae6f'),
(257, '08139262765', '4fcc153d25dc5b8ab579712108217f02f3c7eee03214e61afdbf7f5440f6ee884f9b407749ebaf8a', '', 'imonikhe', 'isaiah', 'imonikhe.isaiah@yayoo.com', '0000-00-00', '', NULL, NULL, '08139262765', '', 'N', 'pending_verification', 'pending_activation', '2015-04-07', '0000-00-00 00:00:00', 'T86225819', '2015-04-06 22:00:00', 0, '0000-00-00 00:00:00', 0, '3214e61afdbf7f5440f6ee884f9b407749ebaf8a'),
(258, '08057012810', '3f36fc0f5228c52c473a6687ac25ee5a0e68b75d6b78e0f795569d4d40c3b56d9c785e9b6d4b95e3', '', 'Ibukun', 'Akinpelu', 'Ibukun.akinpelu@yahoo.com', '0000-00-00', '', NULL, NULL, '', '', 'N', 'pending_verification', 'pending_activation', '2015-04-07', '0000-00-00 00:00:00', 'T18615722', '2015-04-06 22:00:00', 0, '0000-00-00 00:00:00', 0, '6b78e0f795569d4d40c3b56d9c785e9b6d4b95e3'),
(259, '08134547125', 'df63cfbd41c01fc9dcf1c52eb8752f52f864172e99a1fd838973fdd6c8c1947e0c04966ba83690ed', '', 'Christabel', 'One amuse', 'Kristabelibeanusi@gmail.com', '0000-00-00', '', NULL, NULL, '', '', 'N', 'pending_verification', 'pending_activation', '2015-04-07', '0000-00-00 00:00:00', 'T65765827', '2015-04-06 22:00:00', 0, '0000-00-00 00:00:00', 0, '99a1fd838973fdd6c8c1947e0c04966ba83690ed'),
(260, '08038404404', '78c329c6d4a338edd67c099bb1bbe58e57215c3b0dee0418b77cfee9756c1861cf61274799fd4d8d', '', 'Adeagbo', 'Festus', 'festusadeniy52i@yahoo.com', '0000-00-00', '', NULL, NULL, '', '', 'N', 'pending_verification', 'pending_activation', '2015-04-07', '0000-00-00 00:00:00', 'T87862983', '2015-04-06 22:00:00', 0, '0000-00-00 00:00:00', 0, '0dee0418b77cfee9756c1861cf61274799fd4d8d'),
(261, '07037725652', '8be3cde2b7c68c1eb24cf41e09e78cd5860e8ad912619333a71d417bb1d04b1fcd76f04a843a61c0', '', 'Gerald', 'Ogwurumba', 'Geraldog25@yahoo.com', '0000-00-00', '', NULL, NULL, '', '', 'N', 'pending_verification', 'pending_activation', '2015-04-07', '0000-00-00 00:00:00', 'T27478887', '2015-04-06 22:00:00', 0, '0000-00-00 00:00:00', 0, '12619333a71d417bb1d04b1fcd76f04a843a61c0'),
(262, '08038404404', 'e6c868e921355d12eae4165898f421392e8cf5a3829404e08fcb30c246c0276507c5f59d131891dc', '', 'Adeagbo', 'Festus', 'festusadeniy52@yahoo.com', '0000-00-00', '', NULL, NULL, '', '', 'N', 'pending_verification', 'pending_activation', '2015-04-07', '0000-00-00 00:00:00', 'T88593769', '2015-04-06 22:00:00', 0, '0000-00-00 00:00:00', 0, '829404e08fcb30c246c0276507c5f59d131891dc'),
(263, '08034975288', 'ce0965eb68fe3cd66507062e40c5f039c54057118300eac37e0d0d7fd7e44012d1ec93697061e3e2', '', 'RichardS', 'Somade', 'richardsomade@yahoo.com', '0000-00-00', '', NULL, NULL, '', '', 'N', 'pending_verification', 'pending_activation', '2015-04-07', '0000-00-00 00:00:00', 'T38682975', '2015-04-06 22:00:00', 0, '0000-00-00 00:00:00', 0, '8300eac37e0d0d7fd7e44012d1ec93697061e3e2'),
(264, '07033251924', 'a5017f4d86b394699e6d9baab217951d531e3971220f4d604be16d2838b5c06c16e1b4d1b50bfffc', '', 'Jerry', 'Ubah', 'jerryprudence@yahoo.com', '0000-00-00', '', NULL, NULL, '', '', 'Y', 'pending_verification', 'activated', '2015-04-07', '0000-00-00 00:00:00', 'T74862699', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, '220f4d604be16d2838b5c06c16e1b4d1b50bfffc'),
(265, '09098933144', '166b4a1d4365da0276b3a99c9df1ef0ddeb3ae4edcc27f7aa5d14e69a503e5eaeaeaad331359fdf7', '', 'adewale', 'martins', 'walextradingcompany@gmail.com', '0000-00-00', 'Lagos', '', '', '09098933144', '', 'Y', 'pending_verification', 'activated', '2015-04-07', '0000-00-00 00:00:00', 'T78596836', '2015-04-06 22:00:00', 0, '0000-00-00 00:00:00', 0, 'dcc27f7aa5d14e69a503e5eaeaeaad331359fdf7'),
(266, '08030952243', '185e29a6ed47ec150ff1bde828e443bdd54412db58e88ce4a47ab008ba25c4254d3751e87294c4fc', '', 'chinyere', 'nnadi', 'chichiimo28@gmail.com', '0000-00-00', '', NULL, NULL, '', '', 'N', 'pending_verification', 'password_reset_pending', '2015-04-08', '0000-00-00 00:00:00', 'T67730583', '2015-04-07 22:00:00', 0, '0000-00-00 00:00:00', 0, '58e88ce4a47ab008ba25c4254d3751e87294c4fc'),
(267, '08056241552', '7ce0359f12857f2a90c7de465f40a95f01cb5da928b3a3a28bd229bf3315397f7540543e5fa89aa1', '', 'Omagbitse', 'Esisi', 'gbitse2000@yahoo.com', '0000-00-00', '', NULL, NULL, '', '', 'Y', 'pending_verification', 'activated', '2015-04-09', '0000-00-00 00:00:00', 'T67756553', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, '28b3a3a28bd229bf3315397f7540543e5fa89aa1'),
(268, '08092239930', 'd0821d0a84e66097a9982e20b162f0faa2e4b93d42f6771c0eb84b6e2b5443f2c5a630c81d424d50', '', 'En', 'Bee', 'Nelsonbenye@gmail.com', '0000-00-00', 'Lagos', '', '', '', '', 'Y', 'pending_verification', 'activated', '2015-04-09', '0000-00-00 00:00:00', 'T25329750', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, '42f6771c0eb84b6e2b5443f2c5a630c81d424d50'),
(269, '08030729344', '77454de455d89e4da3d5687971be7f6cf35b6c2ff8a7d02c233cca2293d7535dd091214b31d5c971', '', 'Abdulazeez', 'Abebefe', 'abdulabebefe@gmail.com', '0000-00-00', 'Lagos', '', '', '09098749274', 'walenchixl@yahoo.com', 'Y', 'pending_verification', 'activated', '2015-04-15', '0000-00-00 00:00:00', 'T76987663', '2015-04-14 22:00:00', 0, '0000-00-00 00:00:00', 0, 'f8a7d02c233cca2293d7535dd091214b31d5c971'),
(270, '008023394661', 'b842fcdc7ed826a752f3fbb3c5e0b645f083f8e8953a9e6489dad1cac3da905adcea04169b629548', '', 'Sheriff', 'Akinbola', 'shareefakinbola1@yahoo.com', '0000-00-00', '', NULL, NULL, '', '', 'N', 'pending_verification', 'pending_activation', '2015-04-16', '0000-00-00 00:00:00', 'T33995587', '2015-04-15 22:00:00', 0, '0000-00-00 00:00:00', 0, '953a9e6489dad1cac3da905adcea04169b629548'),
(271, '08072913691', '090470c58095ae075a475e0c29a7073210e0e247919c3c998701474b6d7b447c98132c80d3db9279', '', 'Chiebuka', 'Obumselu', 'chy_obum@live.com', '0000-00-00', 'Lagos', '', '', '', '', 'Y', 'pending_verification', 'activated', '2015-04-21', '0000-00-00 00:00:00', 'T55818854', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, '919c3c998701474b6d7b447c98132c80d3db9279'),
(272, '08038557050', '3bda870641b4382a73cdf4fca675376ccc9532a773fcbcecf4ee6e2f3a1c643c9d0b35c958ca8f02', '', 'emmanuel', 'nkansah', 'emma.nkansah15@gmail.com', '0000-00-00', '', NULL, NULL, '', '', 'N', 'pending_verification', 'pending_activation', '2015-04-27', '0000-00-00 00:00:00', 'T19358983', '2015-04-26 22:00:00', 0, '0000-00-00 00:00:00', 0, '73fcbcecf4ee6e2f3a1c643c9d0b35c958ca8f02'),
(273, '08037834617', '4ed7e560df0a101efdd708a91ce8d256c9773dfd533412d8c1af068ae03e0e70a6d4907a1218e5e6', '', 'Wummy', 'Lawrence', 'ainawummy@gmail.com', '0000-00-00', '', NULL, NULL, '08037834617', '', 'Y', 'pending_verification', 'activated', '2015-04-28', '0000-00-00 00:00:00', 'T38685715', '2015-04-27 22:00:00', 0, '0000-00-00 00:00:00', 0, '533412d8c1af068ae03e0e70a6d4907a1218e5e6'),
(274, '+2348889990000', '58dfceb5368aaefcd6853cb8ea4a9126f8d3d8a03aa06dce27280d345b5ba311e2b1002c37dc8970', '', 'Rodrigue', 'Leroy', 'rodrigue.leroy@hellofood.com', '0000-00-00', '', NULL, NULL, '', '', 'Y', 'pending_verification', 'activated', '2015-04-28', '0000-00-00 00:00:00', 'T65614568', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, '3aa06dce27280d345b5ba311e2b1002c37dc8970'),
(275, '08035874497', '98c6ff5d7fcab1e1c58dcfb7b257c4991d7beabac80e53dbb12797d9b783f05599b14979b5cd12f8', '', 'Daniella', 'Olieh', 'ogo_for_you@yahoo.com', '0000-00-00', '', NULL, NULL, '07046084443', '', 'Y', 'pending_verification', 'activated', '2015-05-04', '0000-00-00 00:00:00', 'T43450600', '2015-05-03 22:00:00', 0, '0000-00-00 00:00:00', 0, 'c80e53dbb12797d9b783f05599b14979b5cd12f8'),
(276, '08130816001', 'e2d75b01c33ae9e173fc5668b6312bb25367f30480c23556153efa842381bf03658810d2f3754498', '', 'Omolara', 'Awosanya', 'Omolara.awosanya@yahoo.com', '0000-00-00', '', NULL, NULL, '08024590281', '', 'N', 'pending_verification', 'pending_activation', '2015-05-07', '0000-00-00 00:00:00', 'T85546851', '2015-05-06 22:00:00', 0, '0000-00-00 00:00:00', 0, '80c23556153efa842381bf03658810d2f3754498'),
(277, '08034371626', 'fc4e453f02258845d6e8322ee6163268ea94aed1a82e2a7838df0bd94add43cf15e9cfbbaca33ee9', '', 'Oyenike', 'Motunrayo', 'Tunrayola@gmail.com', '0000-00-00', '', NULL, NULL, '', '', 'N', 'pending_verification', 'pending_activation', '2015-05-07', '0000-00-00 00:00:00', 'T26541815', '2015-05-06 22:00:00', 0, '0000-00-00 00:00:00', 0, 'a82e2a7838df0bd94add43cf15e9cfbbaca33ee9'),
(278, '08167749308', '5899ef9c070c6bd11d169eccbdc6d5ab78607c8f21cd537ff7efabbc0c4ca234ec74690e3716af1d', '', 'Nwabueze', 'Odimokwu', 'Odmk.int@live.com', '0000-00-00', '', NULL, NULL, '', '', 'N', 'pending_verification', 'pending_activation', '2015-05-07', '0000-00-00 00:00:00', 'T82758758', '2015-05-06 22:00:00', 0, '0000-00-00 00:00:00', 0, '21cd537ff7efabbc0c4ca234ec74690e3716af1d'),
(279, '08054144171', '7592d67cd943d4298b51fcea825c4779325fe10a27d557a1d89d96088670dc16b2123988c53af7ac', '', 'Monday', 'Igbu', 'monnyigbu@gmail.com', '0000-00-00', '', NULL, NULL, '', '', 'N', 'pending_verification', 'pending_activation', '2015-05-07', '0000-00-00 00:00:00', 'T81611822', '2015-05-06 22:00:00', 0, '0000-00-00 00:00:00', 0, '27d557a1d89d96088670dc16b2123988c53af7ac'),
(280, '08062311510', 'c3bc85d3e9984634bfe1c3d5660419ae1524309663185c8fc2783d7c4ce9e30b530628b4fb369bbd', '', 'Jenifer', 'Amaka', 'Love.jenifer18@yahoo.com', '0000-00-00', '', NULL, NULL, '', '', 'N', 'pending_verification', 'pending_activation', '2015-05-07', '0000-00-00 00:00:00', 'T42249875', '2015-05-06 22:00:00', 0, '0000-00-00 00:00:00', 0, '63185c8fc2783d7c4ce9e30b530628b4fb369bbd'),
(281, '08023170314', '0f81e7991a6f428dd96eb12e5ef735d4df4fb18b9f3dc380416597926762c7087de4c551ac62dfb0', '', 'Afolabi', 'Otubaga', 'Afolabi.otubaga@dangote.com', '0000-00-00', '', NULL, NULL, '', '', 'N', 'pending_verification', 'pending_activation', '2015-05-07', '0000-00-00 00:00:00', 'T76211638', '2015-05-06 22:00:00', 0, '0000-00-00 00:00:00', 0, '9f3dc380416597926762c7087de4c551ac62dfb0'),
(282, '08075519297', 'f486b416dc02bc9b3f129f3e4776cd49b7029af2f26a3dbff7791e709c6f047212dd27929d69b50b', '', 'Gbenga', 'Fakoya', 'ga.fakoya@gmail.com', '2015-05-02', 'Lagos', '', '', '07033601411', '', 'Y', 'pending_verification', 'activated', '2015-05-07', '0000-00-00 00:00:00', 'T36540688', '2015-05-06 22:00:00', 0, '0000-00-00 00:00:00', 0, 'f26a3dbff7791e709c6f047212dd27929d69b50b'),
(283, '08101639352', 'ddc5bfa2f9ba1578f5852a757425f8a740f6c8e4a17b4f3825c72f8f779691e8fc4201e63260d763', '', 'Peter', 'Utom', 'Peterutom75@gmail.com', '0000-00-00', '', NULL, NULL, '08173676083', '', 'N', 'pending_verification', 'pending_activation', '2015-05-07', '0000-00-00 00:00:00', 'T70444940', '2015-05-06 22:00:00', 0, '0000-00-00 00:00:00', 0, 'a17b4f3825c72f8f779691e8fc4201e63260d763'),
(284, '07066000726', '358a77545ff265ecdcb753002ecb93b42168dbd020ff4534d0b87a4a93e9b186bec8e15b47db4aa1', '', 'Yetunde', 'Saka', 'Limsy04@gmail.com', '0000-00-00', '', NULL, NULL, '', '', 'N', 'pending_verification', 'pending_activation', '2015-05-07', '0000-00-00 00:00:00', 'T25435693', '2015-05-06 22:00:00', 0, '0000-00-00 00:00:00', 0, '20ff4534d0b87a4a93e9b186bec8e15b47db4aa1'),
(285, '08126008870', '59f644530136095aa32088bb08c000041f9b2449809fe1c81a746f16cdd468f5fdb7f0fc01acb296', '', 'ABIMBOLA', 'FOLASHADE', 'folawalemi2014@gmail.com', '0000-00-00', '', NULL, NULL, '08126008870', '', 'N', 'pending_verification', 'pending_activation', '2015-05-07', '0000-00-00 00:00:00', 'T33710685', '2015-05-06 22:00:00', 0, '0000-00-00 00:00:00', 0, '809fe1c81a746f16cdd468f5fdb7f0fc01acb296'),
(286, '08035517504', '5e8a86bf7f278658e7fb2ad4fc1ed3826690619b976f804d4ce33e6749c96011d497969cbda4e3d8', '', 'Josephine', 'Israel', 'Phinnyisrael@gmail.com', '0000-00-00', '', NULL, NULL, '', '', 'N', 'pending_verification', 'pending_activation', '2015-05-07', '0000-00-00 00:00:00', 'T14171725', '2015-05-06 22:00:00', 0, '0000-00-00 00:00:00', 0, '976f804d4ce33e6749c96011d497969cbda4e3d8'),
(287, '08038629134', '09d77f1e728798c64d3882036c12ffd64d99ac6ff67d349f6ac31ca7d8eba72dea5e2e23b2d5c693', '', 'Benjamin', 'Bassey', 'benjamin.ooelaw@gmail.com', '0000-00-00', '', NULL, NULL, '', '', 'N', 'pending_verification', 'pending_activation', '2015-05-07', '0000-00-00 00:00:00', 'T13323936', '2015-05-06 22:00:00', 0, '0000-00-00 00:00:00', 0, 'f67d349f6ac31ca7d8eba72dea5e2e23b2d5c693'),
(288, '08105867700', 'e13c02f94add86231cb94fb516f894f604a8360b52f191d56bcc1c170db32c8f29ff4e807656553d', '', 'victoria', 'olorunnisola', 'victoriaolorunnisola@gmail.com', '0000-00-00', '', NULL, NULL, '', '', 'N', 'pending_verification', 'pending_activation', '2015-05-07', '0000-00-00 00:00:00', 'T36602590', '2015-05-06 22:00:00', 0, '0000-00-00 00:00:00', 0, '52f191d56bcc1c170db32c8f29ff4e807656553d'),
(289, '07035675422', '40d2705e427d09da460819e0ed3fa20c3b69c4a9a5aa4fa800b67b5f086e80c81f9becae27af07cb', '', 'Sunday', 'Samson', 'Sunday.samson@yahoo.com', '0000-00-00', '', NULL, NULL, '', '', 'N', 'pending_verification', 'pending_activation', '2015-05-07', '0000-00-00 00:00:00', 'T91959842', '2015-05-06 22:00:00', 0, '0000-00-00 00:00:00', 0, 'a5aa4fa800b67b5f086e80c81f9becae27af07cb'),
(290, '08091464302', '3b5f0fda3c5e288e08a20b2cf856f60a338342f67095359c6c71265378221828356bb5e7d95cfbbf', '', 'ogechi', 'nwachukwu', 'oge.nwachukwu@yahoo.com', '0000-00-00', '', NULL, NULL, '', '', 'Y', 'pending_verification', 'activated', '2015-05-07', '0000-00-00 00:00:00', 'T66591547', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, '7095359c6c71265378221828356bb5e7d95cfbbf'),
(291, '08029497585', '96d53734fc1bd54d848cd30f98069b90333b1bb3b90eef5ab045d560d506b051eacfc7e948961741', '', 'donatus', 'akpan', 'dakpan@yahoo.com', '0000-00-00', '', NULL, NULL, '08039596535', '', 'N', 'pending_verification', 'pending_activation', '2015-05-07', '0000-00-00 00:00:00', 'T43223978', '2015-05-06 22:00:00', 0, '0000-00-00 00:00:00', 0, 'b90eef5ab045d560d506b051eacfc7e948961741'),
(292, '08103031506', 'eff2146bfbc058354041b46d2b496a9636673f5521d97ea6b53ddbf8943419ffd88d3816831e1795', '', 'yetunde', 'akin', 'babyluvtijani@yahoo.com', '0000-00-00', '', NULL, NULL, '', '', 'N', 'pending_verification', 'pending_activation', '2015-05-07', '0000-00-00 00:00:00', 'T92943912', '2015-05-06 22:00:00', 0, '0000-00-00 00:00:00', 0, '21d97ea6b53ddbf8943419ffd88d3816831e1795'),
(293, '08060348787', '9eb4b99490e97a26e6626c4c48c08fa06a02d2fb883901fc6b8e47deda308b296c7582c01c3ba639', '', 'Williams', 'Obikwame', 'juwily@yahoo.com', '0000-00-00', '', NULL, NULL, '08075559147', '', 'N', 'pending_verification', 'pending_activation', '2015-05-07', '0000-00-00 00:00:00', 'T47894751', '2015-05-06 22:00:00', 0, '0000-00-00 00:00:00', 0, '883901fc6b8e47deda308b296c7582c01c3ba639'),
(294, '08160075278', '09ab298a3f784ddcc8de94bc03f1767b403e49fcab83e06c5005700d047cce812f51fc8a6b201bba', '', 'Tayo', 'Olanrewaju', 'tayosuper@yahoo.com', '0000-00-00', '', NULL, NULL, '', '', 'N', 'pending_verification', 'pending_activation', '2015-05-07', '0000-00-00 00:00:00', 'T68918628', '2015-05-06 22:00:00', 0, '0000-00-00 00:00:00', 0, 'ab83e06c5005700d047cce812f51fc8a6b201bba'),
(295, '08137756441', '3ede16e08c553e38346cace4ab45553a435699d1b9500c1ae98bc882b7d59a66ff1f236dc51e05dd', '', 'Joy', 'Adeyemi', 'Joyabim@gmail.com', '0000-00-00', '', NULL, NULL, '', '', 'N', 'pending_verification', 'pending_activation', '2015-05-07', '0000-00-00 00:00:00', 'T71895599', '2015-05-06 22:00:00', 0, '0000-00-00 00:00:00', 0, 'b9500c1ae98bc882b7d59a66ff1f236dc51e05dd'),
(296, '08085973653', 'e1291ec18d2af58dbc9f0c68f055b08a08a0c6b8ba45801af0eb975610770aa95c5ce7eb0b2b25bf', '', 'Kemi', 'ONI', 'Kemisola.oni@yahoo.co.uk', '0000-00-00', '', NULL, NULL, '', '', 'N', 'pending_verification', 'pending_activation', '2015-05-07', '0000-00-00 00:00:00', 'T18419878', '2015-05-06 22:00:00', 0, '0000-00-00 00:00:00', 0, 'ba45801af0eb975610770aa95c5ce7eb0b2b25bf'),
(297, '08035029537', 'e09223caee5341b87694f85ff08efef5f2bc1023e44f42eca0cd9695cf5522ce849595571759d951', '', 'Opeyemi', 'Oke', 'Okeopeyemi@ymail.com', '0000-00-00', 'Lagos', '', '', '', '', 'Y', 'pending_verification', 'activated', '2015-05-07', '0000-00-00 00:00:00', 'T72639945', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, 'e44f42eca0cd9695cf5522ce849595571759d951'),
(298, '08077556422', 'e2ea946e367b8b072235a96f594689c0cba8c539bcd8832fa5d9bfd99987973456d8d444dd8983a0', '', 'chris', 'akagha', 'akagha.chris@yahoo.com', '0000-00-00', '', NULL, NULL, '', '', 'N', 'pending_verification', 'pending_activation', '2015-05-07', '0000-00-00 00:00:00', 'T58141654', '2015-05-06 22:00:00', 0, '0000-00-00 00:00:00', 0, 'bcd8832fa5d9bfd99987973456d8d444dd8983a0'),
(299, '08054248874', '7f64534584ef58f3c5c0f3277a169fe16d4623f365884f5730e9ac6ca079658ea737c6ad7f23b324', '', 'Praise', 'Ajewole', 'praiseebun@gmail.com', '0000-00-00', '', NULL, NULL, '', '', 'N', 'pending_verification', 'pending_activation', '2015-05-07', '0000-00-00 00:00:00', 'T79925982', '2015-05-06 22:00:00', 0, '0000-00-00 00:00:00', 0, '65884f5730e9ac6ca079658ea737c6ad7f23b324'),
(300, '08093264567', 'dffffa2b66947a22284710f0ef4e12e42949f4b2a8fb994b3984607ae2ae59913c766e89706bb1de', '', 'yewande', 'ade', 'ade_wande@yahoo.com', '0000-00-00', '', NULL, NULL, '', '', 'N', 'pending_verification', 'pending_activation', '2015-05-07', '0000-00-00 00:00:00', 'T99250530', '2015-05-06 22:00:00', 0, '0000-00-00 00:00:00', 0, 'a8fb994b3984607ae2ae59913c766e89706bb1de'),
(301, '080265656402', 'b5228890f78765324b534009cc00158c08c033ae7f55a61b319e604fe426d1a3207225cc79d2c323', '', 'opeyemi', 'adeoye', 'adeoyeope@gmail.com', '0000-00-00', '', NULL, NULL, '', '', 'Y', 'pending_verification', 'activated', '2015-05-07', '0000-00-00 00:00:00', 'T99390574', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, '7f55a61b319e604fe426d1a3207225cc79d2c323'),
(302, '07013555371', '3d0f3b9ddcacec30c4008c5e030e6c13a478cb4ffbb63b223eae19f8900e037cdc750378b108f8e7', '', 'afe', 'afekhume', 'afebinafe@yahoo.com', '0000-00-00', '', NULL, NULL, '', '', 'N', 'pending_verification', 'pending_activation', '2015-05-07', '0000-00-00 00:00:00', 'T81780993', '2015-05-06 22:00:00', 0, '0000-00-00 00:00:00', 0, 'fbb63b223eae19f8900e037cdc750378b108f8e7'),
(303, 'â—â—â—â—â—â—â—', '64f7ca417591fdb30a2cf36cd0f16641d6b594238c3dbc54e45cb50984be2368060fd305e748b5b4', '', 'ibrahim', 'olaide', 'ibrahimolaide91@yahoo.com', '0000-00-00', '', NULL, NULL, '', '', 'N', 'pending_verification', 'pending_activation', '2015-05-07', '0000-00-00 00:00:00', 'T85118518', '2015-05-06 22:00:00', 0, '0000-00-00 00:00:00', 0, '8c3dbc54e45cb50984be2368060fd305e748b5b4'),
(304, '08032729765', '78cbb59b99033f5c9c700d2d4c49ca667267d0e688384544c29736238036ad5f311354d3fad546ff', '', 'olutola', 'oni', 'oniolutola@yahoo.com', '0000-00-00', '', NULL, NULL, '', '', 'Y', 'pending_verification', 'activated', '2015-05-07', '0000-00-00 00:00:00', 'T73560746', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, '88384544c29736238036ad5f311354d3fad546ff'),
(305, '08023325717', 'a3b27b13edf1258a8a2afda25fc712d78d65f62a01c23084f687b9acd5ba9faba7aa2cdc6cebd294', '', 'tunde', 'smith', 'modishmetier@gmail.com', '0000-00-00', '', NULL, NULL, '', '', 'N', 'pending_verification', 'pending_activation', '2015-05-07', '0000-00-00 00:00:00', 'T67614802', '2015-05-06 22:00:00', 0, '0000-00-00 00:00:00', 0, '01c23084f687b9acd5ba9faba7aa2cdc6cebd294'),
(306, '08068654805', 'afce7e0432b43ff891e88f9ad251a3f43c7de5556b07567fa2467d0c933c0ca0f8d22896641a39b6', '', 'babatunde', 'awe', 'awe.babatunde03@gmail.com', '0000-00-00', '', NULL, NULL, '', '', 'Y', 'pending_verification', 'activated', '2015-05-15', '0000-00-00 00:00:00', 'T35657668', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, '6b07567fa2467d0c933c0ca0f8d22896641a39b6'),
(307, '08164221726', 'b2bea273e863cef91019d8443e02a8cc8903883eaf113869b04e9108775382875498c6b036b783b1', '', 'lawal', 'ayomide', 'lawalayomideadeyemi@gmail.com', '2015-05-05', 'Lagos', '', '', '09021818101', '', 'Y', 'pending_verification', 'activated', '2015-05-16', '0000-00-00 00:00:00', 'T20930633', '2015-05-15 22:00:00', 0, '0000-00-00 00:00:00', 0, 'af113869b04e9108775382875498c6b036b783b1'),
(308, '08062252083', 'ae05feb35a578ffa92509c97f091a70f96575b84993739f721d7e8b3eda6f4a062a1f25c90208db4', '', 'faramade', 'ayeni', 'bigbabygal101@yahoo.com', '0000-00-00', 'Lagos', '', '', '', '', 'Y', 'pending_verification', 'activated', '2015-05-19', '0000-00-00 00:00:00', 'T95279750', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, '993739f721d7e8b3eda6f4a062a1f25c90208db4'),
(309, '080787855794', '9248e701086509b4bc618df734ef8e273db66ea0535bdc5cd6b9576788df8d230f3d9b7725dfc24d', '', 'busola', 'alabi', 'boafuwa@yahoo.comn', '0000-00-00', '', NULL, NULL, '', '', 'N', 'pending_verification', 'pending_activation', '2015-05-22', '0000-00-00 00:00:00', 'T37966624', '2015-05-21 22:00:00', 0, '0000-00-00 00:00:00', 0, '535bdc5cd6b9576788df8d230f3d9b7725dfc24d'),
(310, '07056846517', '1158deced5317015cbc495e6b0e9b82940b58d0ce1c24ecc039bdf73592819bbdfc787c79e1ae315', '', 'Olatunbi', 'Module', 'Kolaayuba@yahoo.com', '0000-00-00', '', NULL, NULL, '', '', 'N', 'pending_verification', 'pending_activation', '2015-05-23', '0000-00-00 00:00:00', 'T52502956', '2015-05-22 22:00:00', 0, '0000-00-00 00:00:00', 0, 'e1c24ecc039bdf73592819bbdfc787c79e1ae315'),
(311, '09094805538', '85f7c2b3f31cf48066ef19d8cfddc8881fb29a55992f17bba3a5d8a94dbeb93a1a458ca02adcf274', '', 'Chaverkper', 'Tobias', 'Chavertor@yahoo.com', '0000-00-00', '', NULL, NULL, '', '', 'N', 'pending_verification', 'pending_activation', '2015-05-29', '0000-00-00 00:00:00', 'T57583983', '2015-05-28 22:00:00', 0, '0000-00-00 00:00:00', 0, '992f17bba3a5d8a94dbeb93a1a458ca02adcf274'),
(312, '08061657412', 'e037e5351e04a3b289473aea5f40318f576e9407563e3450e3587e60f2104a32b2e2619511c77ed4', '', 'Simon', 'Stephen', 'Stephendonsimon@yahoo.com', '0000-00-00', '', NULL, NULL, '', '', 'N', 'pending_verification', 'pending_activation', '2015-05-29', '0000-00-00 00:00:00', 'T48421885', '2015-05-28 22:00:00', 0, '0000-00-00 00:00:00', 0, '563e3450e3587e60f2104a32b2e2619511c77ed4'),
(313, '08111165434', '9a9c842d96b2731236a8b51587561f664ebb8e1616f25c5fbb743f8858ec50829c93e6ebb4bcc8b7', '', 'Maver', 'Simon', 'Maversimon@yahoo.com', '0000-00-00', '', NULL, NULL, '', '', 'N', 'pending_verification', 'pending_activation', '2015-05-29', '0000-00-00 00:00:00', 'T20227633', '2015-05-28 22:00:00', 0, '0000-00-00 00:00:00', 0, '16f25c5fbb743f8858ec50829c93e6ebb4bcc8b7'),
(314, '08088386424', 'eb4da12bf661c55780ba953e97dde6341b4c556df4fd4e1c2870de48d05b12736b7e719ed955668e', '', 'Kazeem', 'Olalekan', 'Kazeemmolalekan@gmail.com', '0000-00-00', '', NULL, NULL, '', 'Olobe26@yahoo.com', 'N', 'pending_verification', 'pending_activation', '2015-05-29', '0000-00-00 00:00:00', 'T69867833', '2015-05-28 22:00:00', 0, '0000-00-00 00:00:00', 0, 'f4fd4e1c2870de48d05b12736b7e719ed955668e'),
(315, '08067946569', '8d55fa203b695a0baafa8a9bdca9a1d0599b337923bd79edc2f27e82b513a023f5cb48c2267e1427', '', 'Tutu', 'Emeji', 'tutuoru@yahoo.co.uk', '2015-10-06', 'Lagos', '', '', '', '', 'Y', 'pending_verification', 'activated', '2015-05-29', '0000-00-00 00:00:00', 'T70861536', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, '23bd79edc2f27e82b513a023f5cb48c2267e1427'),
(316, '07033240038', '03d67c263c27a453ef65b29e30334727333ccbcd72a0e33ac65c53e46ec95ec3f2964be0dc904d5d', '', 'Enitan', 'Soyemi', 'ennyninny@gmail.com', '0000-00-00', '', NULL, NULL, '', '', 'N', 'pending_verification', 'pending_activation', '2015-05-29', '0000-00-00 00:00:00', 'T99524684', '2015-05-28 22:00:00', 0, '0000-00-00 00:00:00', 0, '72a0e33ac65c53e46ec95ec3f2964be0dc904d5d'),
(317, '08057244444', '30694a42e0d2695e9348afab1a52eaad4593a163d0f2c11c35201686b24afac4be08f3bbae171163', '', 'Alabi', 'Akeem', 'Akeem.alabi@aklablimited.com', '0000-00-00', '', NULL, NULL, '', '', 'Y', 'pending_verification', 'activated', '2015-05-29', '0000-00-00 00:00:00', 'T88643718', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, 'd0f2c11c35201686b24afac4be08f3bbae171163'),
(318, '08104145593', '99985030f6aec902c06f7468342a9aff8a7a61beadfea402d1798efea58ffaacb8466c457b0b5fe8', '', 'Comfort', 'Funniest', 'Imole@email.com', '0000-00-00', '', NULL, NULL, '', '', 'N', 'pending_verification', 'pending_activation', '2015-05-29', '0000-00-00 00:00:00', 'T63947794', '2015-05-28 22:00:00', 0, '0000-00-00 00:00:00', 0, 'adfea402d1798efea58ffaacb8466c457b0b5fe8'),
(319, '08083032581', '00a00cab39d503cacd9ae36dc12681987f46a967742d39a52a412b675db9282cc11060261f91f58b', '', 'Zainab', 'Funmilayo', 'Zainab@yahoo.com', '0000-00-00', '', NULL, NULL, '', '', 'N', 'pending_verification', 'pending_activation', '2015-05-29', '0000-00-00 00:00:00', 'T11462597', '2015-05-28 22:00:00', 0, '0000-00-00 00:00:00', 0, '742d39a52a412b675db9282cc11060261f91f58b'),
(320, '08122686057', '9d128d913950e0d9c0b33b3e1988e077ad2f2e7ef9ff9704761203009171d1a084be4b51d00370bd', '', 'Abiola', 'Mary', 'Binary_14@yahoo.com', '0000-00-00', '', NULL, NULL, '07033887474', '', 'N', 'pending_verification', 'pending_activation', '2015-05-29', '0000-00-00 00:00:00', 'T76971972', '2015-05-28 22:00:00', 0, '0000-00-00 00:00:00', 0, 'f9ff9704761203009171d1a084be4b51d00370bd'),
(321, '08023030447', '18ce428a9e502906ecf9d77ca1cee2f121ca13b1849b362ae9add3a4820ff85c0df561f342950ea6', '', 'Joshua', 'Olaniyan', 'hollajosh001@yahoo.com', '0000-00-00', '', NULL, NULL, '', '', 'N', 'pending_verification', 'pending_activation', '2015-05-29', '0000-00-00 00:00:00', 'T58510706', '2015-05-28 22:00:00', 0, '0000-00-00 00:00:00', 0, '849b362ae9add3a4820ff85c0df561f342950ea6'),
(322, '08141155360', 'a5afd7aa120c1a45cc8dfc60ebf0e1259df754c5167db56a1ebfabfb59b81b230da669c16b83a408', '', 'Ogunfeyimi', 'Afolabi', 'Afochelsea@yahoo.com', '0000-00-00', '', NULL, NULL, '', '', 'N', 'pending_verification', 'pending_activation', '2015-05-29', '0000-00-00 00:00:00', 'T88948930', '2015-05-28 22:00:00', 0, '0000-00-00 00:00:00', 0, '167db56a1ebfabfb59b81b230da669c16b83a408'),
(323, '07038712582', '9f2f9c1809694ff32f9f547533961c82600898ec3ee8512d8a23a2c1de074a76d2004a1d6723e098', '', 'Oloruntoba', 'Christopher', 'Christopheroloruntoba@gmail.com', '0000-00-00', '', NULL, NULL, '', '', 'N', 'pending_verification', 'pending_activation', '2015-05-29', '0000-00-00 00:00:00', 'T67485822', '2015-05-28 22:00:00', 0, '0000-00-00 00:00:00', 0, '3ee8512d8a23a2c1de074a76d2004a1d6723e098'),
(324, '08033747974', '86581ac8728d915370e51d8bc7e04beb1875a8a590a0e3b41f5f6ce3579e7e2494e385cddae7b242', '', 'Ayodeji', 'Fatoki', 'Charles.fatoki@gmail.com', '0000-00-00', '', NULL, NULL, '', '', 'N', 'pending_verification', 'pending_activation', '2015-05-29', '0000-00-00 00:00:00', 'T65396624', '2015-05-28 22:00:00', 0, '0000-00-00 00:00:00', 0, '90a0e3b41f5f6ce3579e7e2494e385cddae7b242'),
(325, '08024663314', '068899d9808466bbe24aece4aa05cc68b22841c60758b29321a91f0b40ac4473c5036cb214ed143f', '', 'Itunu', 'Dosekun', 'bumsy02@yahoo.com', '0000-00-00', '', NULL, NULL, '', '', 'Y', 'pending_verification', 'activated', '2015-05-29', '0000-00-00 00:00:00', 'T81991600', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, '0758b29321a91f0b40ac4473c5036cb214ed143f'),
(326, '08130850501', '157ee64e7060ab22b42e45439f6da3b94dfbf71b79175a854be8acdb7c9489797f950ee91ab86cd4', '', 'Elaye', 'Jasper', 'ellahumez@yahoo.cm', '0000-00-00', '', NULL, NULL, '07066547009', '', 'N', 'pending_verification', 'pending_activation', '2015-05-29', '0000-00-00 00:00:00', 'T12161600', '2015-05-28 22:00:00', 0, '0000-00-00 00:00:00', 0, '79175a854be8acdb7c9489797f950ee91ab86cd4'),
(327, '08143235702', '531c6b25e3866fc3538fd814439f1d8045cd61a2c2c8a29da9c9c509c2bc1c1fef188994ab8d52ef', '', 'Charles', 'Alex', 'Alexcharles@yahoo.com', '0000-00-00', '', NULL, NULL, '', '', 'N', 'pending_verification', 'pending_activation', '2015-05-29', '0000-00-00 00:00:00', 'T72841590', '2015-05-28 22:00:00', 0, '0000-00-00 00:00:00', 0, 'c2c8a29da9c9c509c2bc1c1fef188994ab8d52ef'),
(328, '080333486665', 'fe951731fdb9d8504d6c2c1929172d67c33e76fe960f23ac5f699862bcc3e80b0d88a0948c2a04fb', '', 'Adekunle', 'Adeyemi', 'Bankufx1@gmail.com', '0000-00-00', '', NULL, NULL, '', '', 'Y', 'pending_verification', 'activated', '2015-05-29', '0000-00-00 00:00:00', 'T43327569', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, '960f23ac5f699862bcc3e80b0d88a0948c2a04fb'),
(329, '08027887773', '89ab6253e02e0131d50599905051bbb380dac0c40a1f97bc790d22d002df004871a1337bd2b9107d', '', 'Adeniyi', 'Seriki', 'seriki4med@hotmail.com', '0000-00-00', '', NULL, NULL, '', '', 'N', 'pending_verification', 'pending_activation', '2015-05-29', '0000-00-00 00:00:00', 'T69748894', '2015-05-28 22:00:00', 0, '0000-00-00 00:00:00', 0, '0a1f97bc790d22d002df004871a1337bd2b9107d'),
(330, '08027887773', '89ab6253e02e0131d50599905051bbb380dac0c47b7224e266a57a0787ff56724e87c3054f6a430d', '', 'Adeniyi', 'Seriki', 'seriki4med@icloud.com', '0000-00-00', '', NULL, NULL, '', '', 'Y', 'pending_verification', 'activated', '2015-05-29', '0000-00-00 00:00:00', 'T20215853', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, '7b7224e266a57a0787ff56724e87c3054f6a430d'),
(331, '08034663126', '6412ce647fc8a9504e1e2542fc5788c2fbd8602780708e582ad0cfb21792bf456442a6037a190677', '', 'Omotayo', 'Seriki', 'barakatalabi@yahoo.com', '0000-00-00', '', NULL, NULL, '', '', 'N', 'pending_verification', 'pending_activation', '2015-05-29', '0000-00-00 00:00:00', 'T27821778', '2015-05-28 22:00:00', 0, '0000-00-00 00:00:00', 0, '80708e582ad0cfb21792bf456442a6037a190677'),
(332, '08033971712', '644cf8f38e7df2b09389fa03457af9e220b8eb1740897bbd5254a1f78f50d24245319729bff42601', '', 'Ikenna', 'Agbasimalo', 'ikmich@yahoo.com', '0000-00-00', '', NULL, NULL, '', '', 'Y', 'pending_verification', 'activated', '2015-05-29', '0000-00-00 00:00:00', 'T34421538', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, '40897bbd5254a1f78f50d24245319729bff42601'),
(333, '08062578665', 'a447672e45a16bd1a626f748618a2cf1a7991a20c20d6b5b7a9d2f37a053a739e69c709fee4ce8ba', '', 'Omokaro', 'Khare', 'Omokarokhare@gmail.com', '0000-00-00', '', NULL, NULL, '', '', 'N', 'pending_verification', 'pending_activation', '2015-05-29', '0000-00-00 00:00:00', 'T83516803', '2015-05-28 22:00:00', 0, '0000-00-00 00:00:00', 0, 'c20d6b5b7a9d2f37a053a739e69c709fee4ce8ba'),
(334, '08039683946', 'b8d8f6c38f8055013ab9bcf3929a60b80e4bd2067a9fe34e09a2cf53c31c1d208c9b4e3bcfe5bf29', '', 'Felix', 'Mesio', 'Felixmesio@gmail.com', '0000-00-00', '', NULL, NULL, '', '', 'N', 'pending_verification', 'pending_activation', '2015-05-29', '0000-00-00 00:00:00', 'T90616988', '2015-05-28 22:00:00', 0, '0000-00-00 00:00:00', 0, '7a9fe34e09a2cf53c31c1d208c9b4e3bcfe5bf29'),
(335, '07065386050', 'e38ad214943daad1d64c102faec29de4afe9da3d9bdb40bc2d9e705bbb157710bf9e7cb7a34475af', '', 'Tony', 'Asije', 'Asije.anthony@gmail.com', '0000-00-00', '', NULL, NULL, '', '', 'N', 'pending_verification', 'pending_activation', '2015-05-29', '0000-00-00 00:00:00', 'T17739845', '2015-05-28 22:00:00', 0, '0000-00-00 00:00:00', 0, '9bdb40bc2d9e705bbb157710bf9e7cb7a34475af'),
(336, '08112142441', 'df7a5f2f3ebe3ad48e386c167990911b7e944c1d82005f08e89ee546f8f1e411ffe97765b208f6f5', '', 'Tomiwa', 'Obadofin', 'Tomiwa.tosi@yahoo.com', '0000-00-00', '', NULL, NULL, '08162751235', '', 'N', 'pending_verification', 'pending_activation', '2015-05-29', '0000-00-00 00:00:00', 'T12713963', '2015-05-28 22:00:00', 0, '0000-00-00 00:00:00', 0, '82005f08e89ee546f8f1e411ffe97765b208f6f5'),
(337, '08189488888', 'cb474eba3efb343f01e9f8ee71465b6844b227791e50a3c6d877901057158e435156265c4b9266c4', '', 'Ishmael', 'Ebhodaghe', 'ishmaeldaghe@hotmail.com', '0000-00-00', '', NULL, NULL, '', '', 'N', 'pending_verification', 'pending_activation', '2015-05-29', '0000-00-00 00:00:00', 'T10268740', '2015-05-28 22:00:00', 0, '0000-00-00 00:00:00', 0, '1e50a3c6d877901057158e435156265c4b9266c4'),
(338, '08022228857', '4900bfc15b9b21d9825c93577582ed6beb78b1b66017bb2d872624ff627afee555726bc223212c91', '', 'David', 'Ogunsola', 'Dafidis@yahoo.com', '0000-00-00', '', NULL, NULL, '', '', 'N', 'pending_verification', 'pending_activation', '2015-05-29', '0000-00-00 00:00:00', 'T83131714', '2015-05-28 22:00:00', 0, '0000-00-00 00:00:00', 0, '6017bb2d872624ff627afee555726bc223212c91'),
(339, '08034021543', '9f2f9c1809694ff32f9f547533961c82600898ec2a51bd7e43fb1666d459b209bfcd96a8b3b6e978', '', 'olakunle', 'salu', 'Saluchi@gmail.com', '0000-00-00', '', NULL, NULL, '', '', 'N', 'pending_verification', 'pending_activation', '2015-05-29', '0000-00-00 00:00:00', 'T74819575', '2015-05-28 22:00:00', 0, '0000-00-00 00:00:00', 0, '2a51bd7e43fb1666d459b209bfcd96a8b3b6e978'),
(340, '08106145760', 'af6a8a2e9a1556aff6831b46e0b42a8276995c3ab39730500ac0bc705ded1188c50cb198252a375e', '', 'Olamide', 'Laja', 'Lasupoo@gmail.com', '0000-00-00', '', NULL, NULL, '', '', 'N', 'pending_verification', 'pending_activation', '2015-05-29', '0000-00-00 00:00:00', 'T48702815', '2015-05-28 22:00:00', 0, '0000-00-00 00:00:00', 0, 'b39730500ac0bc705ded1188c50cb198252a375e'),
(341, '08038652995', 'd2cab95b3267c713303d419c30cc058e29149925d73943db6e0f62d46244f1acc209c8a9d8fd64f8', '', 'Juliet', 'Chisom', 'Juchipoke@gmail.com', '0000-00-00', '', NULL, NULL, '', '', 'Y', 'pending_verification', 'activated', '2015-05-29', '0000-00-00 00:00:00', 'T52257770', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, 'd73943db6e0f62d46244f1acc209c8a9d8fd64f8'),
(342, '08122454587', 'f9e6bf8639ccd098841ea319fdb70feb70900472dd83594a6abd3da8cfd08d5076cf77c2cc159fbb', '', 'Fadekemi', 'Kristina', 'Onakoyafadekemi@yahoo.com', '0000-00-00', '', NULL, NULL, '', '', 'N', 'pending_verification', 'pending_activation', '2015-05-29', '0000-00-00 00:00:00', 'T99564692', '2015-05-28 22:00:00', 0, '0000-00-00 00:00:00', 0, 'dd83594a6abd3da8cfd08d5076cf77c2cc159fbb'),
(343, '08137872728', 'c659436bf96cb98e7f42652f9815859bdd96e0dec1859a5a2dd374587a02ed22b5014fff12a6c671', '', 'Oladotun', 'Alade', 'Dortmahn@gmail.com', '0000-00-00', '', NULL, NULL, '', '', 'N', 'pending_verification', 'pending_activation', '2015-05-29', '0000-00-00 00:00:00', 'T77740623', '2015-05-28 22:00:00', 0, '0000-00-00 00:00:00', 0, 'c1859a5a2dd374587a02ed22b5014fff12a6c671'),
(344, '08022316510', 'ddd3291b3e4e28a9fb29dc761dd791dc2a283ed605efc3755bbd52aaeab4239073fef3200834a6be', '', 'Vivian', 'Osekwe', 'Divido3@yahoo.com', '0000-00-00', '', NULL, NULL, '08098329699', '', 'N', 'pending_verification', 'pending_activation', '2015-05-29', '0000-00-00 00:00:00', 'T21306549', '2015-05-28 22:00:00', 0, '0000-00-00 00:00:00', 0, '05efc3755bbd52aaeab4239073fef3200834a6be'),
(345, '07053087321', 'bb6b5fe3f3425410b63446bb6e6db2eda00435053748c8452dd60a238f81eae950868ba09806dd9b', '', 'Hamza', 'Adisa', 'Hadisa@trinity.edu', '0000-00-00', '', NULL, NULL, '', '', 'N', 'pending_verification', 'pending_activation', '2015-05-29', '0000-00-00 00:00:00', 'T18379745', '2015-05-28 22:00:00', 0, '0000-00-00 00:00:00', 0, '3748c8452dd60a238f81eae950868ba09806dd9b'),
(346, '08026787612', '17ca14ecd58686acd77784a347fde41f87aee724eb33b31b301b378246acc661d1b2eb40a70bd40d', '', 'Bibiresanmi', 'otitoloju', 'bibi_otito@yahoo.com', '0000-00-00', '', NULL, NULL, '08066443135', '', 'N', 'pending_verification', 'pending_activation', '2015-05-29', '0000-00-00 00:00:00', 'T21361685', '2015-05-28 22:00:00', 0, '0000-00-00 00:00:00', 0, 'eb33b31b301b378246acc661d1b2eb40a70bd40d'),
(347, '08183347536', '6962821b70e81cec4ebce83747c8938c3efcd6d83d129b119c2586b531c60211a77c0c8149ada996', '', 'Tomisin', 'Uwa', 'Silverbabra@yahoo.com', '0000-00-00', '', NULL, NULL, '', '', 'N', 'pending_verification', 'pending_activation', '2015-05-29', '0000-00-00 00:00:00', 'T88469681', '2015-05-28 22:00:00', 0, '0000-00-00 00:00:00', 0, '3d129b119c2586b531c60211a77c0c8149ada996'),
(348, '08090800290', '7fd17f7d0d5fb903d087d6ecec32414eef1b8bc1ff5f36db714945ca04820d9531182febcac92cc8', '', 'Durosomo', 'Ibitayo', 'Legallytee@yahoo.com', '0000-00-00', '', NULL, NULL, '', '', 'N', 'pending_verification', 'pending_activation', '2015-05-29', '0000-00-00 00:00:00', 'T89891873', '2015-05-28 22:00:00', 0, '0000-00-00 00:00:00', 0, 'ff5f36db714945ca04820d9531182febcac92cc8'),
(349, '08178033398', 'b9d028671030c9a80a289b0d363fb3558b46ec990d744ca30a9a14a20d768ec96815d6900d837ca5', '', 'Soji', 'Kukoyi', 'Sojukukoyi@yahoo.com', '0000-00-00', '', NULL, NULL, '', '', 'N', 'pending_verification', 'pending_activation', '2015-05-29', '0000-00-00 00:00:00', 'T82320596', '2015-05-28 22:00:00', 0, '0000-00-00 00:00:00', 0, '0d744ca30a9a14a20d768ec96815d6900d837ca5'),
(350, '08039692669', 'eb9ff8ac2a8fc6cee79f62c959bb40e2c6968f66d6926542afb1a0055956fa7a99289eaeca9b897d', '', 'Rebecca', 'Okhimamhe', 'rebokhis@yahoo.co.uk', '0000-00-00', '', NULL, NULL, '', '', 'N', 'pending_verification', 'pending_activation', '2015-05-29', '0000-00-00 00:00:00', 'T37691884', '2015-05-28 22:00:00', 0, '0000-00-00 00:00:00', 0, 'd6926542afb1a0055956fa7a99289eaeca9b897d'),
(351, '08169307338', '59f3e039eb9ffd66427fb951e3704eb0f1d99110bba38f6b46a04f4dc6f08c96aafd1f5658439624', '', 'peggy', 'abel', 'billypeggy53@yahoo.com', '0000-00-00', '', NULL, NULL, '', '', 'N', 'pending_verification', 'pending_activation', '2015-05-29', '0000-00-00 00:00:00', 'T45375970', '2015-05-28 22:00:00', 0, '0000-00-00 00:00:00', 0, 'bba38f6b46a04f4dc6f08c96aafd1f5658439624'),
(352, '07032307690', 'f2b27d7a310fea7f8c80c8c6185fff9216c2576b85554ec4b65e47ddf8278e7d04e2e8f04f678287', '', 'Cynthia', 'Ezegbu', 'Gistwitcynty@yahoo.co.uk', '0000-00-00', '', NULL, NULL, '', '', 'N', 'pending_verification', 'pending_activation', '2015-05-29', '0000-00-00 00:00:00', 'T25529662', '2015-05-28 22:00:00', 0, '0000-00-00 00:00:00', 0, '85554ec4b65e47ddf8278e7d04e2e8f04f678287'),
(353, '08030463676', '238e808770127e97ed1a1bf5201fc088b5be9258fef6b162d28f8750723729b7a9d9ae680e8c4e54', '', 'Temitope', 'Oguntade', 'tope.oguntade@gmail.com', '0000-00-00', '', NULL, NULL, '', '', 'N', 'pending_verification', 'pending_activation', '2015-05-29', '0000-00-00 00:00:00', 'T70950819', '2015-05-28 22:00:00', 0, '0000-00-00 00:00:00', 0, 'fef6b162d28f8750723729b7a9d9ae680e8c4e54'),
(354, '07035674907', '4900bfc15b9b21d9825c93577582ed6beb78b1b609a1d6322129c13104845f9a91da0d234f446627', '', 'Oluwaseun', 'Adegbiji', 'adeoluoyejohn@yahoo.com', '0000-00-00', '', NULL, NULL, '', '', 'N', 'pending_verification', 'pending_activation', '2015-05-29', '0000-00-00 00:00:00', 'T17354892', '2015-05-28 22:00:00', 0, '0000-00-00 00:00:00', 0, '09a1d6322129c13104845f9a91da0d234f446627'),
(355, '08037325385', '7e6e9479af9fb288baade354c41a736499ef4140c6c2961b7d866b16a21888a55de7c527c2ac46b9', '', 'killmer', 'ekowa', 'emekaekowa@yahoo.com', '0000-00-00', '', NULL, NULL, '', '', 'N', 'pending_verification', 'pending_activation', '2015-05-29', '0000-00-00 00:00:00', 'T78542877', '2015-05-28 22:00:00', 0, '0000-00-00 00:00:00', 0, 'c6c2961b7d866b16a21888a55de7c527c2ac46b9'),
(356, '08086363970', '9f10a1237e32d0471798525865e453463c8e63e68e088b04b78fefec0fad98a5b0153292466f9093', '', 'Bukky', 'Bello', 'bookkeybells@gmail.com', '0000-00-00', '', NULL, NULL, '', '', 'N', 'pending_verification', 'pending_activation', '2015-05-29', '0000-00-00 00:00:00', 'T65144949', '2015-05-28 22:00:00', 0, '0000-00-00 00:00:00', 0, '8e088b04b78fefec0fad98a5b0153292466f9093'),
(357, '08033060405', '9f2f9c1809694ff32f9f547533961c82600898ec7858a32553a0a5b106fe1021a09f5f76bb995a4f', '', 'olamide', 'Obadofin', 'olamideobadofin@yahoo.com', '0000-00-00', '', NULL, NULL, '', '', 'N', 'pending_verification', 'pending_activation', '2015-05-29', '0000-00-00 00:00:00', 'T37901502', '2015-05-28 22:00:00', 0, '0000-00-00 00:00:00', 0, '7858a32553a0a5b106fe1021a09f5f76bb995a4f'),
(358, '0803305050300', '2021349f442bada051ebd4b868c4c5f3b345afa065b898e954adbaa26beaebf1b3280dd92d21d1cb', '', 'Yetunde', 'Dabiri', 'Yetunde_dabiri@yahoo.com', '0000-00-00', '', NULL, NULL, '08025638960', '', 'Y', 'pending_verification', 'activated', '2015-05-29', '0000-00-00 00:00:00', 'T18533710', '2015-05-28 22:00:00', 0, '0000-00-00 00:00:00', 0, '65b898e954adbaa26beaebf1b3280dd92d21d1cb'),
(359, '08051487323', '9f2f9c1809694ff32f9f547533961c82600898ec0f3974d04d9eec02e0fe1775c38f38063c585342', '', 'dupe', 'Obadofin', 'dupe.obadofin@yahoo.com', '0000-00-00', '', NULL, NULL, '', '', 'N', 'pending_verification', 'pending_activation', '2015-05-29', '0000-00-00 00:00:00', 'T62814847', '2015-05-28 22:00:00', 0, '0000-00-00 00:00:00', 0, '0f3974d04d9eec02e0fe1775c38f38063c585342'),
(360, '08033455292', 'f53669971e120e7a489a011de223625688e2e4d60d4512ed7c48fb8b8165c7cc3132bcf5bccd890c', '', 'Oluwakemi', 'Akinloye', 'khemmieweb@gmail.com', '0000-00-00', '', NULL, NULL, '', '', 'N', 'pending_verification', 'pending_activation', '2015-05-29', '0000-00-00 00:00:00', 'T12351940', '2015-05-28 22:00:00', 0, '0000-00-00 00:00:00', 0, '0d4512ed7c48fb8b8165c7cc3132bcf5bccd890c'),
(361, '07088780329', 'd1115217f955c29459426ff95d03d39b33d2c457bf56d4b215c28f243dcc1d5aef58ca9d1a057170', '', 'Samuel', 'Olorundare', 'samuelolorundare@rocketmail.com', '0000-00-00', '', NULL, NULL, '', '', 'N', 'pending_verification', 'pending_activation', '2015-05-29', '0000-00-00 00:00:00', 'T35662721', '2015-05-28 22:00:00', 0, '0000-00-00 00:00:00', 0, 'bf56d4b215c28f243dcc1d5aef58ca9d1a057170'),
(362, '08103915629', '6bc710038e10b73fd772ea89e41579d0eb30ade3d414b4d9e3c9e2f28ee79a6df323907f7d8cc5e3', '', 'Silas', 'Okwoche', 'silasreally@yahoo.com', '0000-00-00', '', NULL, NULL, '', '', 'N', 'pending_verification', 'pending_activation', '2015-05-29', '0000-00-00 00:00:00', 'T85457501', '2015-05-28 22:00:00', 0, '0000-00-00 00:00:00', 0, 'd414b4d9e3c9e2f28ee79a6df323907f7d8cc5e3'),
(363, '07031115085', '435cf415181b012704b5dea955fbf877ea6bf55ab4b8faa0965cd5ff34725fa4a76ce99755a9c9ed', '', 'Shittu', 'Akeem', 'Akeem4alberta@gmail.com', '0000-00-00', 'Lagos', '', '', '', '', 'N', 'pending_verification', 'pending_activation', '2015-05-29', '0000-00-00 00:00:00', 'T20748765', '2015-05-28 22:00:00', 0, '0000-00-00 00:00:00', 0, 'b4b8faa0965cd5ff34725fa4a76ce99755a9c9ed'),
(364, '08086920480', '59cc7455914981ec2086849ffce70c4f247945ef6b33fef30a5530dac20b81e2be66fb83dbb1f364', '', 'Blessing', 'Onokpite', 'blessing.onokpite@gmail.com', '0000-00-00', '', NULL, NULL, '09038946593', '', 'N', 'pending_verification', 'pending_activation', '2015-05-29', '0000-00-00 00:00:00', 'T50110756', '2015-05-28 22:00:00', 0, '0000-00-00 00:00:00', 0, '6b33fef30a5530dac20b81e2be66fb83dbb1f364'),
(365, '07064410300', 'a3b1b77d41323af5704bfc2c34282dd9b40e5fdca8c6e083ebb8fe401651c0dc67678e0844310488', '', 'toyin', 'fakorede', 'toyinfak@yahoo.com', '0000-00-00', '', NULL, NULL, '', '', 'N', 'pending_verification', 'pending_activation', '2015-05-29', '0000-00-00 00:00:00', 'T85962844', '2015-05-28 22:00:00', 0, '0000-00-00 00:00:00', 0, 'a8c6e083ebb8fe401651c0dc67678e0844310488'),
(366, '08029994274', '9f2f9c1809694ff32f9f547533961c82600898ec4e7e6b0ff9cc17900d46707b21e1df2d52fd1b0a', '', 'stella', 'adeseye', 'stellaadeseye@yahoo.com', '0000-00-00', '', NULL, NULL, '0802994274', '', 'N', 'pending_verification', 'pending_activation', '2015-05-29', '0000-00-00 00:00:00', 'T58569667', '2015-05-28 22:00:00', 0, '0000-00-00 00:00:00', 0, '4e7e6b0ff9cc17900d46707b21e1df2d52fd1b0a'),
(367, '08077927292', '226e3c07f4ed849d2d349644b119fdfa5fd70dee754597591f870a6e08df90e92170c1d1a91bfee9', '', 'Olajumoke', 'Olawoyin', 'Kaffie09@yahoo.com', '2015-09-20', 'Lagos', '23, Fajumobi Street \r\n\r\nMiccom Bus stop Egbeda Lagos', '', '08087306699', '', 'Y', 'pending_verification', 'activated', '2015-05-29', '0000-00-00 00:00:00', 'T61527741', '2015-05-28 22:00:00', 0, '0000-00-00 00:00:00', 0, '754597591f870a6e08df90e92170c1d1a91bfee9'),
(368, '08083277219', 'bd592654bf30622de6fb067a28023edfd6e2a655386419a1de846e3f2fd61ee0075f1ad5031c8fd2', '', 'Igho', 'Efevoghor', 'ighoyefe@yahoo.com', '0000-00-00', '', NULL, NULL, '08033040175', '', 'Y', 'pending_verification', 'activated', '2015-05-29', '0000-00-00 00:00:00', 'T58564878', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, '386419a1de846e3f2fd61ee0075f1ad5031c8fd2'),
(369, '08033157658', '40a62a4bcc3228dce99a6bb5d814b91cbf10f496afc7f5294225304f583621d19b586a12945dc07e', '', 'ofegbu', 'oladuni', 'oladunni.ofegbu@gmail.com', '0000-00-00', '', NULL, NULL, '', '', 'N', 'pending_verification', 'pending_activation', '2015-05-29', '0000-00-00 00:00:00', 'T21782827', '2015-05-28 22:00:00', 0, '0000-00-00 00:00:00', 0, 'afc7f5294225304f583621d19b586a12945dc07e'),
(370, '08023141841', '9f2f9c1809694ff32f9f547533961c82600898ece7c1e1fb0dd5b53d88346635eb96a587ae9a984b', '', 'Gbemi', 'Oduntan', 'gbemistic@gmail.com', '0000-00-00', '', NULL, NULL, '', '', 'Y', 'pending_verification', 'activated', '2015-05-29', '0000-00-00 00:00:00', 'T80177596', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, 'e7c1e1fb0dd5b53d88346635eb96a587ae9a984b'),
(371, '08023607951', '9f2f9c1809694ff32f9f547533961c82600898ec80e4c7a9ebdeb0a3f9d03cf4d3c8c789e20d8acd', '', 'Funmi', 'Yussuff', 'Phummyzx@yahoo.com', '0000-00-00', '', NULL, NULL, '08023607951', '', 'N', 'pending_verification', 'pending_activation', '2015-05-29', '0000-00-00 00:00:00', 'T45963849', '2015-05-28 22:00:00', 0, '0000-00-00 00:00:00', 0, '80e4c7a9ebdeb0a3f9d03cf4d3c8c789e20d8acd'),
(372, '08023109735', '9f2f9c1809694ff32f9f547533961c82600898ec086b5382e50f20200f2a66fbc0898b065c500962', '', 'Modeenat', 'Bioshogun', 'talk_2_deenah@yahoo.com', '0000-00-00', '', NULL, NULL, '', '', 'N', 'pending_verification', 'pending_activation', '2015-05-29', '0000-00-00 00:00:00', 'T36768900', '2015-05-28 22:00:00', 0, '0000-00-00 00:00:00', 0, '086b5382e50f20200f2a66fbc0898b065c500962'),
(373, '08023109735', '9f2f9c1809694ff32f9f547533961c82600898ec1761eb08c7921e7ce1213ea88fdfcbfa62028f5c', '', 'Kemi', 'Bello', 'kemibello@yahoomail.com', '0000-00-00', '', NULL, NULL, '', '', 'N', 'pending_verification', 'pending_activation', '2015-05-29', '0000-00-00 00:00:00', 'T78236565', '2015-05-28 22:00:00', 0, '0000-00-00 00:00:00', 0, '1761eb08c7921e7ce1213ea88fdfcbfa62028f5c'),
(374, '08034740214', '9b0e1f6bfb190c76e086c7a95fd7bdee663a866d3e934a81e9a34c16c138caba3539ba94d2d3d1e9', '', 'Tope', 'Adu', 'Aduoluwatope@yahoo.com', '0000-00-00', '', NULL, NULL, '', '', 'N', 'pending_verification', 'pending_activation', '2015-05-29', '0000-00-00 00:00:00', 'T96824764', '2015-05-28 22:00:00', 0, '0000-00-00 00:00:00', 0, '3e934a81e9a34c16c138caba3539ba94d2d3d1e9'),
(375, '08099003333', 'd22721e8f392e37d8441bd0439a07843d7debe88757dffcb3cc543b65bac67ca78405179f74cb499', '', 'Segun', 'Lafup', 'Segunshow23@gmail.com', '0000-00-00', '', NULL, NULL, '', '', 'N', 'pending_verification', 'pending_activation', '2015-05-29', '0000-00-00 00:00:00', 'T46148528', '2015-05-28 22:00:00', 0, '0000-00-00 00:00:00', 0, '757dffcb3cc543b65bac67ca78405179f74cb499'),
(376, '07036552322', '439f0a0867ce3515b78a25563b8c10cb7b7726186d867d94c5ddd57bd1e5cf6ad73294109d6fb3c5', '', 'Rachael', 'Adejobi', 'Racheladejobi90@gmail.com', '0000-00-00', '', NULL, NULL, '', '', 'N', 'pending_verification', 'pending_activation', '2015-05-29', '0000-00-00 00:00:00', 'T76697529', '2015-05-28 22:00:00', 0, '0000-00-00 00:00:00', 0, '6d867d94c5ddd57bd1e5cf6ad73294109d6fb3c5'),
(377, '08168878202', '9214d983bb75008d8f489c50da20289ae22246c3207794918a4337cd3e189dee30c626e7efa58b58', '', 'Dami', 'Dare', 'Subair_damilola@yahoo.com', '0000-00-00', '', NULL, NULL, '', '', 'N', 'pending_verification', 'pending_activation', '2015-05-29', '0000-00-00 00:00:00', 'T79370770', '2015-05-28 22:00:00', 0, '0000-00-00 00:00:00', 0, '207794918a4337cd3e189dee30c626e7efa58b58');
INSERT INTO `cg_customer` (`id`, `phone`, `password`, `imsi`, `firstname`, `surname`, `email`, `birth_date`, `state_of_residence`, `home_address`, `office_address`, `alternate_phone`, `referred_email_addr`, `active`, `admin_verification_status`, `reg_status`, `reg_date`, `cancel_date`, `activation_code`, `created_date`, `created_by`, `modified_date`, `modified_by`, `hash_salt`) VALUES
(378, '08055567789', 'd5e29745d0d5e9b06e33c516d9465569764019a8fe3634e2cada17f4c3d9b8b2e3d999875bb1775f', '', 'Olaoluwa', 'Oshobu', 'olaoluwaoshobu@gmail.com', '0000-00-00', 'Lagos', '', '', '', '', 'Y', 'pending_verification', 'activated', '2015-05-29', '0000-00-00 00:00:00', 'T89978763', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, 'fe3634e2cada17f4c3d9b8b2e3d999875bb1775f'),
(379, '08032394212', '03db3b28ab7e495dc25a168cda9e7acb31a91b759dfe32e660d8534fb60fe9e3449248c31eafa575', '', 'Qudus', 'Sokunbi', 'Qustidamus@yahoo.com', '0000-00-00', '', NULL, NULL, '', '', 'Y', 'pending_verification', 'activated', '2015-05-29', '0000-00-00 00:00:00', 'T69339506', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, '9dfe32e660d8534fb60fe9e3449248c31eafa575'),
(380, '08036516534', '18845fb7879c6da690f59d60b428ceeb9464adcc71cd905e9d95d510199b12911b759da8685a8680', '', 'Michael', 'Olamilekan', 'gbolamik@yahoo.com', '0000-00-00', '', NULL, NULL, '', '', 'N', 'pending_verification', 'pending_activation', '2015-05-29', '0000-00-00 00:00:00', 'T69517881', '2015-05-28 22:00:00', 0, '0000-00-00 00:00:00', 0, '71cd905e9d95d510199b12911b759da8685a8680'),
(381, '08066771798', '65cc79c038d84484e4dfe531b388d261aad9bc7dc5868bc2ccee8437bdb9d6be1685d9caab5822e9', '', 'Abimbola', 'Binuyo', 'abimbola.binuyo@yahoo.co.uk', '0000-00-00', '', NULL, NULL, '', '', 'Y', 'pending_verification', 'activated', '2015-05-29', '0000-00-00 00:00:00', 'T79710656', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, 'c5868bc2ccee8437bdb9d6be1685d9caab5822e9'),
(382, '08029519107', 'a04cec10066962840d2d6188175eabbb8f14a2b43e3f49d5bc46093b47891c0292ebc46a9587d1e7', '', 'Femi', 'Daramola', 'femi_daramola@yahoo.com', '0000-00-00', '', NULL, NULL, '', '', 'N', 'pending_verification', 'pending_activation', '2015-05-29', '0000-00-00 00:00:00', 'T84139974', '2015-05-28 22:00:00', 0, '0000-00-00 00:00:00', 0, '3e3f49d5bc46093b47891c0292ebc46a9587d1e7'),
(383, '07060516018', 'f5ff3005776b55f7730712415507f627ab9c2514c32c90016fde0ee7ed3e7c1d2c17a619f00e0c3a', '', 'Dolapo', 'Adu', 'Dolapoadu@gmail.com', '0000-00-00', '', NULL, NULL, '07060516018', '', 'N', 'pending_verification', 'pending_activation', '2015-05-29', '0000-00-00 00:00:00', 'T99170888', '2015-05-28 22:00:00', 0, '0000-00-00 00:00:00', 0, 'c32c90016fde0ee7ed3e7c1d2c17a619f00e0c3a'),
(384, '080267906753', 'c99ae8e07a9aa06421f6a46ba4c3ead766fd71f9e130c16c1ab6ebd755b510adf0df3934391e0e4c', '', 'bimbo', 'sanni', 'bimboakinsanya5@yahoo.com', '0000-00-00', '', NULL, NULL, '', '', 'N', 'pending_verification', 'pending_activation', '2015-05-29', '0000-00-00 00:00:00', 'T41551634', '2015-05-28 22:00:00', 0, '0000-00-00 00:00:00', 0, 'e130c16c1ab6ebd755b510adf0df3934391e0e4c'),
(385, '08035841144', 'd714d8456935fa20e60bd9e661423cb2583c79d9c5be40c43ed52beb6a983254450279cfbdae7f87', '', 'Olumide', 'ikusedun', 'lummysedun@gmail.com', '0000-00-00', '', NULL, NULL, '08028995632', '', 'N', 'pending_verification', 'pending_activation', '2015-05-29', '0000-00-00 00:00:00', 'T51547650', '2015-05-28 22:00:00', 0, '0000-00-00 00:00:00', 0, 'c5be40c43ed52beb6a983254450279cfbdae7f87'),
(386, '08059800832', 'bc6342f5edc85830c42a73fcc335e17b692f24af77368e8c90388c6a21f0cae93a785b570706b2f7', '', 'Tamunomieibi', 'Oriala', 'makeithappen_4real@yahoo.com', '0000-00-00', 'Lagos', '', '', '', '', 'Y', 'pending_verification', 'activated', '2015-06-02', '0000-00-00 00:00:00', 'T23324993', '2015-06-01 22:00:00', 0, '0000-00-00 00:00:00', 0, '77368e8c90388c6a21f0cae93a785b570706b2f7'),
(387, '08064120645', '1aa90e31251e9871d11eaddafeca870f2fa4b5e9730ccf926660768c5b92b1518216ce1a97e42609', '', 'Abduljelil', 'Adebola', 'Iiyaniroh@yahoo.com', '0000-00-00', '', NULL, NULL, '07057627862', '', 'N', 'pending_verification', 'pending_activation', '2015-06-04', '0000-00-00 00:00:00', 'T86842921', '2015-06-03 22:00:00', 0, '0000-00-00 00:00:00', 0, '730ccf926660768c5b92b1518216ce1a97e42609'),
(388, '08064120645', '1aa90e31251e9871d11eaddafeca870f2fa4b5e95bbd3b70b3f691f3f8943f2e63d042ddc5aeb466', '', 'Abduljelil', 'Adebola', 'iyaniroh@yahoo.com', '0000-00-00', '', NULL, NULL, '07057627862', '', 'N', 'pending_verification', 'pending_activation', '2015-06-04', '0000-00-00 00:00:00', 'T89404577', '2015-06-03 22:00:00', 0, '0000-00-00 00:00:00', 0, '5bbd3b70b3f691f3f8943f2e63d042ddc5aeb466'),
(389, '08037027002', '5b4cb6160925e5c97afd534f57b716ff525511a960d07eaa2a30af4c43eaf08fcac47bea0c82e4e0', '', 'Chukwudi', 'chineme', 'picejay@yahoo.com', '0000-00-00', '', NULL, NULL, '', '', 'N', 'pending_verification', 'pending_activation', '2015-06-04', '0000-00-00 00:00:00', 'T16818691', '2015-06-03 22:00:00', 0, '0000-00-00 00:00:00', 0, '60d07eaa2a30af4c43eaf08fcac47bea0c82e4e0'),
(390, '08060218940', '9f2f9c1809694ff32f9f547533961c82600898ecc3f42a77f54f138c97315c6fc0c9f3440c7bebc5', '', 'Olubunmi Aisha', 'Olusui', 'bunmioks@yahoo.com', '0000-00-00', '', NULL, NULL, '', '', 'N', 'pending_verification', 'pending_activation', '2015-06-04', '0000-00-00 00:00:00', 'T37313514', '2015-06-03 22:00:00', 0, '0000-00-00 00:00:00', 0, 'c3f42a77f54f138c97315c6fc0c9f3440c7bebc5'),
(391, '08160146381', '450277b4ebb8239f36ace19b93098a4f2691dbca8b4b7fed53b1a07f38e98cf006d86ab0ff35e522', '', 'PRECIOUS', 'SOKARI', 'precioussokari0@gmail.com', '1995-12-30', 'Lagos', '', '', '08034675447', '', 'Y', 'pending_verification', 'activated', '2015-06-06', '0000-00-00 00:00:00', 'T53429845', '2015-06-05 22:00:00', 0, '0000-00-00 00:00:00', 0, '8b4b7fed53b1a07f38e98cf006d86ab0ff35e522'),
(392, '07030585463', '649c7bb7aa55ef14b108f02a2666f68f5f74c79f4c8f57b96c10f33595152ee48be384ba6f6b8ea8', '', 'oluwaseyi', 'olukemi', 'oluwaseyi.bola@gmail.com', '0000-00-00', 'Lagos', '45, anibaba str, \r\n\r\niyana school busstop, ketu, lagos', 'cityscape planning services.\r\n7, kafi str, off obafemi \r\n\r\nawolowo way, beside ikeja citymall, alausa,ikeja', '08029702334', '', 'Y', 'pending_verification', 'activated', '2015-06-07', '0000-00-00 00:00:00', 'T56404754', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, '4c8f57b96c10f33595152ee48be384ba6f6b8ea8'),
(393, '08168910377', '86595c4238ce0656a0b531fcf4c42d0e3ec1dd18db6e113eb6d8672e9e81c4e2e0bcbeee4573c4d2', '', 'Olanrewaju', 'Ajibola', 'k3j4n8@mail.com', '0000-00-00', '', NULL, NULL, '', 'tessybukkie@yahoo.com', 'Y', 'pending_verification', 'activated', '2015-06-08', '0000-00-00 00:00:00', 'T64507583', '2015-06-07 22:00:00', 0, '0000-00-00 00:00:00', 0, 'db6e113eb6d8672e9e81c4e2e0bcbeee4573c4d2'),
(394, '08023714483', '0207da747e237cc5b0e19a54e95807472be6f2b0535ca62a6cfae9d652a3be80efb55d6d319c4f8e', '', 'kike', 'ebz', 'hauwashodunke@gmail.com', '1987-05-23', 'Lagos', '', '', '08023714483', 'moritza16@yahoo.com', 'Y', 'pending_verification', 'activated', '2015-06-08', '0000-00-00 00:00:00', 'T80753782', '2015-06-07 22:00:00', 0, '0000-00-00 00:00:00', 0, '535ca62a6cfae9d652a3be80efb55d6d319c4f8e'),
(395, '08056957293', 'f89e4a2fbdc20faf9080c5b897db284e8a5c286562187266924d6d904e2047af2d7b3a1e8ff76a48', '', 'Chigozie', 'Sunday', 'berrie_011@yahoo.com', '0000-00-00', '', NULL, NULL, '07066360780', '', 'N', 'pending_verification', 'pending_activation', '2015-06-11', '0000-00-00 00:00:00', 'T21166650', '2015-06-10 22:00:00', 0, '0000-00-00 00:00:00', 0, '62187266924d6d904e2047af2d7b3a1e8ff76a48'),
(396, '09091271476', 'a5081f2c154f5d4a17d23abc17744c8e4254d91428665813bdf0bbb335f3baa28341a291eaf62719', '', 'Konum', 'Elebuwa', 'Konum@live.com', '0000-00-00', '', NULL, NULL, '08188792097', '', 'N', 'pending_verification', 'pending_activation', '2015-06-12', '0000-00-00 00:00:00', 'T22525723', '2015-06-11 22:00:00', 0, '0000-00-00 00:00:00', 0, '28665813bdf0bbb335f3baa28341a291eaf62719'),
(397, '08094033084', '04aae0cd48b7f0a277c571dbad90de6eb201b95741d7d9a8cf26b31bd735539c2a907229af29edc9', '', 'yemi', 'Kolawole', 'yemiwale@yahoo.co.uk', '0000-00-00', '', NULL, NULL, '08087184856', '', 'N', 'pending_verification', 'pending_activation', '2015-06-15', '0000-00-00 00:00:00', 'T34699897', '2015-06-14 22:00:00', 0, '0000-00-00 00:00:00', 0, '41d7d9a8cf26b31bd735539c2a907229af29edc9'),
(398, '07034006678', '0b91c1cd793265797a059390ad0df26c3643748616b9f92b307e878684ab2e2c2636b52a8554f61d', '', 'taiwo', 'akindele', 'taiwoakindele@yahoo.com', '0000-00-00', 'Lagos', '', '', '08023192895', '', 'Y', 'pending_verification', 'activated', '2015-06-15', '0000-00-00 00:00:00', 'T87385886', '2015-06-14 22:00:00', 0, '0000-00-00 00:00:00', 0, '16b9f92b307e878684ab2e2c2636b52a8554f61d'),
(399, '07031231858', '0efaf12ee0f3a4a25c9897919986e9cb5e27e4ea73ec27234dbc23b20cf6593378a0e3d5eb3dae17', '', 'Tokunbo', 'Tosin-Famakinwa', 'tokunbo.adewale@anakle.com', '0000-00-00', '', NULL, NULL, '07031231858', '', 'Y', 'pending_verification', 'activated', '2015-06-15', '0000-00-00 00:00:00', 'T13262928', '2015-06-14 22:00:00', 0, '0000-00-00 00:00:00', 0, '73ec27234dbc23b20cf6593378a0e3d5eb3dae17'),
(400, '07034717507', '85345b8b16d1c684125331297d9cc1642e9da9a6118f726745b15837561b1fe3141010a9ddd8343e', '', 'Olayinka', 'Ogunlere', 'yinkajayi2003@yahoo.com', '0000-00-00', '', NULL, NULL, '', '', 'N', 'pending_verification', 'pending_activation', '2015-06-15', '0000-00-00 00:00:00', 'T70533528', '2015-06-14 22:00:00', 0, '0000-00-00 00:00:00', 0, '118f726745b15837561b1fe3141010a9ddd8343e'),
(401, '09039292289', 'b1f9fa79d28a67f0dbc41b06ea3d2fd0ab6fdf4d7423357b2c93dfa10a1d1151690708d2de099f7c', '', 'Lucky', 'Nwokorie', 'uchemillions@yahoo.com', '0000-00-00', 'Lagos', '', '', '', '', 'Y', 'pending_verification', 'activated', '2015-06-17', '0000-00-00 00:00:00', 'T88357661', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, '7423357b2c93dfa10a1d1151690708d2de099f7c'),
(402, '08032004230', 'b09ebb00d725ee7deea3b1ca0b11063dbae25a8040fea72bf3ec5c2f2f63010fe6f49e1ff8ad5635', '', 'Baby', 'Mukoro', 'babymukoro@gmail.com', '0000-00-00', 'Lagos', '', '', '', '', 'Y', 'pending_verification', 'activated', '2015-06-19', '0000-00-00 00:00:00', 'T66697821', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, '40fea72bf3ec5c2f2f63010fe6f49e1ff8ad5635'),
(403, '08184917667', '7eaac57386943dbe0deac03cf563e35fa1ab580d8e14a28c9b1050f06c485186763377eb0e07a442', '', 'Handsome', 'Chris', 'Hanzyung@gmail.com', '1993-09-25', 'Lagos', '26a, Oyeyinka street, off \r\n\r\nAyanwale street, Ikotun, Lagos.\r\n\r\n\r\nLANDMARK -- First Bank, Ijegun Rd.', 'University of \r\n\r\nLagos.', '08103313108', '', 'Y', 'pending_verification', 'activated', '2015-06-20', '0000-00-00 00:00:00', 'T53898823', '2015-06-19 22:00:00', 0, '0000-00-00 00:00:00', 0, '8e14a28c9b1050f06c485186763377eb0e07a442'),
(405, '08090211619', '2b7d16204b3c3c15cccc37508bd031c67f7ddc62821cd243e08ab0c1e936273948e593ec5e145be4', '', 'Andrew', 'Ameh', 'Aia_gp@yahoo.com', '0000-00-00', '', NULL, NULL, '', '', 'N', 'pending_verification', 'pending_activation', '2015-06-24', '0000-00-00 00:00:00', 'T10310513', '2015-06-23 22:00:00', 0, '0000-00-00 00:00:00', 0, '821cd243e08ab0c1e936273948e593ec5e145be4'),
(406, '08022227304', '7fd17f7d0d5fb903d087d6ecec32414eef1b8bc1c0c8afb85df5e5c51cb9723809f7712691851593', '', 'Victoria', 'Ekenimoh', 'Vekenimoh@yahoo.com', '0000-00-00', '', NULL, NULL, '', '', 'N', 'pending_verification', 'activated', '2015-06-24', '0000-00-00 00:00:00', 'T34628613', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, 'c0c8afb85df5e5c51cb9723809f7712691851593'),
(407, '08022222066', 'e96200e3bce42fb2d38c89962c561230c539aeaa43a61e6b2fe85271085dd0fa96d19ef90bac2e27', '', 'chinedu', 'anochiri', 'ano_ace@yahoo.com', '0000-00-00', '', NULL, NULL, '', '', 'N', 'pending_verification', 'pending_activation', '2015-06-24', '0000-00-00 00:00:00', 'T80683866', '2015-06-23 22:00:00', 0, '0000-00-00 00:00:00', 0, '43a61e6b2fe85271085dd0fa96d19ef90bac2e27'),
(408, '08067746170', 'e228a1a3587c3b15caa148a8e70aeb19a0f0861058d7d50bca05de941ff3fb38384a806fb4ceb892', '', 'Funmilayo', 'Omoliki', 'funmiomoliki@gmail.com', '0000-00-00', '', NULL, NULL, '', '', 'N', 'pending_verification', 'pending_activation', '2015-06-24', '0000-00-00 00:00:00', 'T92547556', '2015-06-23 22:00:00', 0, '0000-00-00 00:00:00', 0, '58d7d50bca05de941ff3fb38384a806fb4ceb892'),
(409, '08034418929', '8a839bdf75015cbc838fa6046a438bf556c6030d4ed7c17e9c70965f61a6ee4d0a980a36a7e53f5b', '', 'Olufunke', 'Mukandas', 'funkemukandas@gmail.com', '0000-00-00', 'Lagos', '', '', '07031122770', '', 'Y', 'pending_verification', 'activated', '2015-06-24', '0000-00-00 00:00:00', 'T15479840', '2015-06-23 22:00:00', 0, '0000-00-00 00:00:00', 0, '4ed7c17e9c70965f61a6ee4d0a980a36a7e53f5b'),
(410, '2347064174300', 'c5d169a79ce2ba61a01783f753094b8fda06b44bc0a5c0b3d985cf3372c696678f83366d4570bcd5', '', 'Winnie', 'Amosu', 'Winifred.monnie@gmail.com', '0000-00-00', '', NULL, NULL, '', '', 'N', 'pending_verification', 'pending_activation', '2015-06-24', '0000-00-00 00:00:00', 'T44170604', '2015-06-23 22:00:00', 0, '0000-00-00 00:00:00', 0, 'c0a5c0b3d985cf3372c696678f83366d4570bcd5'),
(411, '08139615992', '5f6f0aca6188c8cf30a3a7471016597d3e9ce741eb5356ce143c77181e3ffe10a730168e36b09a81', '', 'Jumoke', 'Ajala', 'Jayluyi@gmail.com', '0000-00-00', 'Lagos', '', '', '08091316327', '', 'Y', 'pending_verification', 'activated', '2015-06-24', '0000-00-00 00:00:00', 'T40267667', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, 'eb5356ce143c77181e3ffe10a730168e36b09a81'),
(412, '0249310443', '06eee8fd0ebe479f3bf8a286ef342d784888426d374053b925bfc90a21715ddf09e02439ada14519', '', 'Asiedu', 'Fred', 'Asiedufr@yahoo.com', '0000-00-00', '', NULL, NULL, '0249310443', '', 'N', 'pending_verification', 'pending_activation', '2015-06-26', '0000-00-00 00:00:00', 'T63564691', '2015-06-25 22:00:00', 0, '0000-00-00 00:00:00', 0, '374053b925bfc90a21715ddf09e02439ada14519'),
(413, '08030494422', '69987d5111a91ce00371a68373be782741f9d2c0288a2dc91cfd3b1331b1648ef11ed07d908579e5', '', 'anslem', 'ordia', 'anslemordia@gmail.com', '1979-06-30', 'Lagos', '', '', '', 'anslem20@hotmail.com', 'Y', 'pending_verification', 'activated', '2015-07-01', '0000-00-00 00:00:00', 'T19392592', '2015-06-30 22:00:00', 0, '0000-00-00 00:00:00', 0, '288a2dc91cfd3b1331b1648ef11ed07d908579e5'),
(414, '+2348188635961', '7cf27561f9bc6faa73c718ece988a53ef528d5e535e078ac147028fa62dfc3cff32667229f6ad6ec', '', 'Demilade', 'Adekolu', 'demiladeadekolu@gmail.com', '0000-00-00', 'Lagos', '', '', '+2348188635961', '', 'Y', 'pending_verification', 'activated', '2015-07-05', '0000-00-00 00:00:00', 'T37694784', '2015-07-04 22:00:00', 0, '0000-00-00 00:00:00', 0, '35e078ac147028fa62dfc3cff32667229f6ad6ec'),
(415, '08100694109', '0813c01297c1f8a05a0fe92487e8afc3e1eee6ef8432d6c0814313a31526588f7a8c9e39675d60be', '', 'queen', 'ampah', 'ayekwa.ampah@gmail.com', '0000-00-00', '', NULL, NULL, '', '', 'N', 'pending_verification', 'pending_activation', '2015-07-06', '0000-00-00 00:00:00', 'T99923830', '2015-07-05 22:00:00', 0, '0000-00-00 00:00:00', 0, '8432d6c0814313a31526588f7a8c9e39675d60be'),
(416, '08039162850', 'f09e8c92f5b089a11ce13c0fa5a49db9edc5c39a9e9b78b0b97a862aa8f33808460cc92574e2d5e3', '', 'Aremu', 'kafayat', 'kafayataremu@gmail.com', '0000-00-00', '', NULL, NULL, '', '', 'Y', 'pending_verification', 'activated', '2015-07-06', '0000-00-00 00:00:00', 'T85165699', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, '9e9b78b0b97a862aa8f33808460cc92574e2d5e3'),
(417, '08178773937', '355150d90cb94b9023e54931a3c38848769b23ebf81a136f13ecf110455ec6a14888300799d7b2f1', '', 'tayo', 'dongo', 'tayodongo1@yahoo.com', '0000-00-00', '', NULL, NULL, '', '', 'N', 'pending_verification', 'pending_activation', '2015-07-06', '0000-00-00 00:00:00', 'T28601831', '2015-07-05 22:00:00', 0, '0000-00-00 00:00:00', 0, 'f81a136f13ecf110455ec6a14888300799d7b2f1'),
(418, '08056513454', 'fcd1eee40b824e08506b5ff82781f775154ad51d594029be36d55012b355f1aea530861e3a8cbd2d', '', 'dickson', 'okpe', 'okpedickson@yahoo.com', '0000-00-00', 'Lagos', '', '', '08056513454', '', 'Y', 'pending_verification', 'activated', '2015-07-07', '0000-00-00 00:00:00', 'T75623557', '2015-07-06 22:00:00', 0, '0000-00-00 00:00:00', 0, '594029be36d55012b355f1aea530861e3a8cbd2d'),
(419, '08183701095', '3015288759127047dda66a933be50c1d102d578cd047983e06ccb8000eda558338143cd7680070a6', '', 'Ayo', 'Lasisi', 'ayoo31@yahoo.com', '0000-00-00', '', NULL, NULL, '', '', 'N', 'pending_verification', 'pending_activation', '2015-07-07', '0000-00-00 00:00:00', 'T81680924', '2015-07-06 22:00:00', 0, '0000-00-00 00:00:00', 0, 'd047983e06ccb8000eda558338143cd7680070a6'),
(420, '08035001077', '24cfa118cd98c5ce1bda539568c6a2b11173a434c594e8a09297c9fdf089a6f4fbf086a1d40c1bfb', '', 'Olaitan', 'Akinbode', 'Olaitan.ea@gmail.com', '0000-00-00', '', NULL, NULL, '08035001077', '', 'N', 'pending_verification', 'pending_activation', '2015-07-08', '0000-00-00 00:00:00', 'T40356661', '2015-07-07 22:00:00', 0, '0000-00-00 00:00:00', 0, 'c594e8a09297c9fdf089a6f4fbf086a1d40c1bfb'),
(421, '08101882018', '0b2d55a32f2d8eb32257d854080f7db13a5186967a97494d230b60f6cc571a03728c065ee1e82e69', '', 'motunrayo', 'odu', 'motunrayo.odu@hotmail.com', '1994-02-24', 'Lagos', '', '', '', '', 'Y', 'pending_verification', 'activated', '2015-07-08', '0000-00-00 00:00:00', 'T51315859', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, '7a97494d230b60f6cc571a03728c065ee1e82e69'),
(422, '+2347035030164', 'c2c47d5b4ab6d48eb64877eba9c8b7add7238e9897a20bdd306164ff34ff4a8e6209f4cddc386dea', '', 'Chinedu', 'madu', 'chinedu.epuechi@zenithbank.com', '2015-07-14', 'Lagos', '', '', '+2347035030164', '', 'Y', 'pending_verification', 'password_reset_pending', '2015-07-10', '0000-00-00 00:00:00', 'T89264618', '2015-07-09 22:00:00', 0, '0000-00-00 00:00:00', 0, '97a20bdd306164ff34ff4a8e6209f4cddc386dea'),
(423, '08176374132', '26dee9e974d894ef538567b3c7f14a7ac85d03a5ef9e4713f3dc4bbbf5dc4251a6cf5a8eb3385949', '', 'boluwaatifee', 'akinyemi', 'akinyemi.clajournalists@gmail.com', '0000-00-00', 'Lagos', '', '', '', '', 'N', 'pending_verification', 'pending_activation', '2015-07-15', '0000-00-00 00:00:00', 'T85121917', '2015-07-14 22:00:00', 0, '0000-00-00 00:00:00', 0, 'ef9e4713f3dc4bbbf5dc4251a6cf5a8eb3385949'),
(424, '08166720717', 'd1a75a6c3ff33d17a8b58cfd5ff01dbec194d35a5f7537b1509ca2c72fcc2b2fda84e33c797d4d38', '', 'faith', 'obaze', 'faithadaobaze@yahoo.co.uk', '0000-00-00', '', NULL, NULL, '', '', 'N', 'pending_verification', 'pending_activation', '2015-07-16', '0000-00-00 00:00:00', 'T71507899', '2015-07-15 22:00:00', 0, '0000-00-00 00:00:00', 0, '5f7537b1509ca2c72fcc2b2fda84e33c797d4d38'),
(425, '08188559476', '93ea0e48a8f1fbd924608ef4f0481101e2e2e057fe99a5f58a9f7d810ad0ebe895a070f459e2e8e6', '', 'Dammy', 'Emuze', 'damilolaemuze@yahoo.com', '0000-00-00', 'Lagos', '', '', '', '', 'N', 'pending_verification', 'pending_activation', '2015-07-21', '0000-00-00 00:00:00', 'T87400542', '2015-07-20 22:00:00', 0, '0000-00-00 00:00:00', 0, 'fe99a5f58a9f7d810ad0ebe895a070f459e2e8e6'),
(426, '2347085519435', 'dfed96f530da2cd4fdf1397bf4f7d25d4b44fc71dedf988794152e197f2f034e5827a1539990dfdb', '', 'deola', 'ibitola', 'getdeolahere@yahoo.com', '0000-00-00', 'Lagos', '', '', '', '', 'Y', 'pending_verification', 'activated', '2015-07-27', '0000-00-00 00:00:00', 'T20305504', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, 'dedf988794152e197f2f034e5827a1539990dfdb'),
(427, '08029293178', 'ace893fb2c9553a38a873fb03d0e21a406b351a1149f7284d24cc2d513c5e0d0bd3ecf94904c2ff1', '', 'Adeola', 'Arije', 'aarije969@gmail.com', '0000-00-00', 'Lagos', '', '', '08145466046', '', 'Y', 'pending_verification', 'activated', '2015-07-28', '0000-00-00 00:00:00', 'T28887901', '2015-07-27 22:00:00', 0, '0000-00-00 00:00:00', 0, '149f7284d24cc2d513c5e0d0bd3ecf94904c2ff1'),
(428, '08064551974', '28937ef1f4d35cb8e376439d8cf13d4ffe30388b2be4664e4d8d95e71a50e3b1dadbcb716d74691c', '', 'nkeiru', 'nwaobiala', 'nkeiru.n@1musicnetworks.com', '0000-00-00', 'Lagos', '', '', '08064551974', '', 'Y', 'pending_verification', 'activated', '2015-07-28', '0000-00-00 00:00:00', 'T88406654', '2015-07-27 22:00:00', 0, '0000-00-00 00:00:00', 0, '2be4664e4d8d95e71a50e3b1dadbcb716d74691c'),
(429, '08120797998', '621c37999c37044b4897982e1fb4845cd3534eff45146ecde222753724169b039688a16cc8c4fcd0', '', 'aisha', 'olamide', 'olashanty@yahoo.com', '0000-00-00', '', NULL, NULL, '', '', 'Y', 'pending_verification', 'activated', '2015-07-29', '0000-00-00 00:00:00', 'T26345581', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, '45146ecde222753724169b039688a16cc8c4fcd0'),
(430, '08033358819', 'cfb5098e947b52acac56540bebb61f9b911c9d77cfc9a22fedf206aa018df40e1ac881c74cbb6fae', '', 'Omotomilola', 'Abiodun', 'tomiabiodun@yahoo.com', '0000-00-00', 'Lagos', '', 'Plot 934 Idejo \r\n\r\nStreet, off Adeola Odeku street, VI, Lagos.', '08088571664', '', 'N', 'pending_verification', 'pending_activation', '2015-08-03', '0000-00-00 00:00:00', 'T34563706', '2015-08-02 22:00:00', 0, '0000-00-00 00:00:00', 0, 'cfc9a22fedf206aa018df40e1ac881c74cbb6fae'),
(431, '09094940451', '90b1469f1368f895cc5123107603db440dd9127ec50ce08008ea8538d3abd4f462e3008670c63c37', '', 'chisom \r\n\r\njeffrey', 'anyando', 'chisomjeffrey1998@yahoo.com', '1998-02-11', 'Lagos', '', '', '', 'victoriahunter549@yahoo.co.uk', 'Y', 'pending_verification', 'password_reset_pending', '0000-00-00', '0000-00-00 00:00:00', 'T12479687', '2015-08-03 22:00:00', 0, '0000-00-00 00:00:00', 0, 'c50ce08008ea8538d3abd4f462e3008670c63c37'),
(432, '07066893606', '761e908673e7cc4c996f89d7d1329e7345873b5e514b6e5bca475297ae3633aa1d351c7a45e7cda8', '', 'opeyemi', 'adetibs', 'realopsy@yahoo.com', '0000-00-00', '', NULL, NULL, '', '', 'Y', 'pending_verification', 'activated', '2015-08-04', '0000-00-00 00:00:00', 'T13215774', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, '514b6e5bca475297ae3633aa1d351c7a45e7cda8'),
(433, '08033881592', '9f2f9c1809694ff32f9f547533961c82600898ecddd25ea269f1227ba093d0f2274048b5d801b7fa', '', 'Odini', 'Oriseh', 'omo525@yahoo.com', '0000-00-00', 'Lagos', '', '', '08059774733', '', 'Y', 'pending_verification', 'activated', '2015-08-07', '0000-00-00 00:00:00', 'T18716775', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, 'ddd25ea269f1227ba093d0f2274048b5d801b7fa'),
(434, '07039125104', 'c328c2acf981289b5674a1f7662f3cf7856ef02ccf24d154d9d9afdc7e53313e3907ceaefcc07cd2', '', 'Rotimi', 'Ajasa', 'rothmanx2000@yahoo.com', '0000-00-00', 'Lagos', '', 'UNION BANK HEAD OFFICE \r\n\r\nMARINA LAGOS', '', '', 'Y', 'pending_verification', 'activated', '2015-08-07', '0000-00-00 00:00:00', 'T48534511', '2015-08-06 22:00:00', 0, '0000-00-00 00:00:00', 0, 'cf24d154d9d9afdc7e53313e3907ceaefcc07cd2'),
(435, '08023212759', '02e676b9335ee190f078bf1a329203d1356f042d4daad2ea1c051109d4a96dfee34f04c37f1dc87f', '', 'mobolaji', 'oduyoye', 'guzzls@yahoo.co.uk', '0000-00-00', '', NULL, NULL, '', 'aarchibong@yahoo.com', 'Y', 'pending_verification', 'activated', '2015-08-08', '0000-00-00 00:00:00', 'T81642709', '2015-08-07 22:00:00', 0, '0000-00-00 00:00:00', 0, '4daad2ea1c051109d4a96dfee34f04c37f1dc87f'),
(436, '08033356100', '68c7c9cf77dfbe7ba5d620837e96eb6030bac0ef1b08bbbdf81819773fcf994ceee0c26666bcc290', '', 'ogechi', 'emegho', 'ogemms@gmail.com', '0000-00-00', '', NULL, NULL, '', '', 'N', 'pending_verification', 'pending_activation', '2015-08-12', '0000-00-00 00:00:00', 'T71479631', '2015-08-11 22:00:00', 0, '0000-00-00 00:00:00', 0, '1b08bbbdf81819773fcf994ceee0c26666bcc290'),
(437, '07050997810', '5e844c172ed04b9610797300a55919d6b39e01399f6f189c200138ff908103b8660c4694ff3aec80', '', 'Adaora', 'Aroh', 'ADARH9@gmail.com', '0000-00-00', 'Lagos', '', '', '07050997810', '', 'Y', 'pending_verification', 'activated', '2015-08-12', '0000-00-00 00:00:00', 'T17191720', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, '9f6f189c200138ff908103b8660c4694ff3aec80'),
(438, '08052150438', 'ed7938f06b6f49c870462fd524ad199013ed0835d442445b9da7743b696026142138eb7cce726c43', '', 'LOLA', 'MATESUN', 'Lolatantoluwa@yahoo.com', '0000-00-00', 'Lagos', '', '', '', '', 'Y', 'pending_verification', 'activated', '2015-08-18', '0000-00-00 00:00:00', 'T35969593', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, 'd442445b9da7743b696026142138eb7cce726c43'),
(439, '09025179516', 'f5da21a8bf11d8056c6d54e90a3462bc97021ef8b12c7499bf24ca699f1f2f6259eb80229aebbbf9', '', 'Temiloluwa', 'Sotubo', 'seny29@yahoo.com', '0000-00-00', '', NULL, NULL, '08098247995', 'nobleimageinfo@gmail.com', 'N', 'pending_verification', 'pending_activation', '2015-08-24', '0000-00-00 00:00:00', 'T53900946', '2015-08-23 22:00:00', 0, '0000-00-00 00:00:00', 0, 'b12c7499bf24ca699f1f2f6259eb80229aebbbf9'),
(440, '09096500799', 'a0dca336df59e2963f7cb3a6190003246c296625f63d215d33884683a7cc9558f16d612658d40230', '', 'Abisoye', 'Odewole', 'madmenops@gmail.com', '1985-10-06', 'Lagos', '', '56b, Moleye Street, \r\n\r\nAlagomeji Yaba, Lagos', '08051998856', '', 'Y', 'pending_verification', 'activated', '0000-00-00', '0000-00-00 00:00:00', 'T35743604', '2015-09-01 22:00:00', 0, '0000-00-00 00:00:00', 0, 'f63d215d33884683a7cc9558f16d612658d40230'),
(441, '08172428019', 'f60556bd1ac432b90c9c381bc16394da12c6a9794f6f2c3e51179c7433ae120a37f8e307eb08ff52', '', 'N', 'Newton', 'newdenilank@hotmail.com', '0000-00-00', '', NULL, NULL, '08090211624', '', 'N', 'pending_verification', 'pending_activation', '2015-09-02', '0000-00-00 00:00:00', 'T20199586', '2015-09-01 22:00:00', 0, '0000-00-00 00:00:00', 0, '4f6f2c3e51179c7433ae120a37f8e307eb08ff52'),
(442, '08184019919', 'eacb0d1b53a6f12893e95c7c5aec16de3ff2a939a7f57a9aa48fd25f755dd9cc35414d88078103ee', '', 'bello', 'oluwadamilola', 'dahmylorlar@gmail.com', '0000-00-00', '', NULL, NULL, '08027612227', 'amzatabayomi@yahoo.com', 'N', 'pending_verification', 'pending_activation', '2015-09-02', '0000-00-00 00:00:00', 'T69248948', '2015-09-01 22:00:00', 0, '0000-00-00 00:00:00', 0, 'a7f57a9aa48fd25f755dd9cc35414d88078103ee'),
(443, '08134430182', '9c9cec92c8736b0ff18a85655da9e757fc2008f64911aca07175e747adb8bb54607d98edc2cc6f74', '', 'Chioma', 'Achebe', 'chiomachebe@yahoo.com', '0000-00-00', 'Lagos', '', '', '', '', 'Y', 'pending_verification', 'activated', '2015-09-07', '0000-00-00 00:00:00', 'T58142655', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, '4911aca07175e747adb8bb54607d98edc2cc6f74'),
(444, '08028750802', '3b487e5be08f8a7cd736eb32166425325553ab5a02c1c0d19b895f011ca082c41f151566d6994c24', '', 'michael', 'aguzie', 'maguzie@gmail.com', '0000-00-00', '', NULL, NULL, '08028750802', '', 'Y', 'pending_verification', 'activated', '2015-09-14', '0000-00-00 00:00:00', 'T49225574', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, '02c1c0d19b895f011ca082c41f151566d6994c24'),
(445, '08099445544', '3740dcc106fdebb6d395c699bcd13770580a22eea70d97d779e69230caaed72347c07eae3ea691ed', '', 'Prince', 'Azubuike', 'princeazubuike@gmail.com', '0000-00-00', 'Lagos', '', '', '08032004301', '', 'Y', 'pending_verification', 'activated', '2015-09-14', '0000-00-00 00:00:00', 'T82768999', '2015-09-13 22:00:00', 0, '0000-00-00 00:00:00', 0, 'a70d97d779e69230caaed72347c07eae3ea691ed'),
(446, '08137828160', '04f7d360529bd226d066c9524f201b9d6a72be49a30f8859b2d1fb62f667c859661f8be5d2f36b93', '', 'Winifred', 'Inwang', 'inwanguyai@gmail.com', '0000-00-00', 'Lagos', '', '', '', 'femionabs@gmail.com', 'Y', 'pending_verification', 'activated', '2015-09-16', '0000-00-00 00:00:00', 'T47873704', '2015-09-15 22:00:00', 0, '0000-00-00 00:00:00', 0, 'a30f8859b2d1fb62f667c859661f8be5d2f36b93'),
(447, '08098574398', '4d018f58245ace058fefdefd2953a7a12ff566ce5a59b1aa135f523edc3cdc50d4e96db103b73449', '', 'Emeka', 'Uzowulu', 'uzowulue@gmail.com', '0000-00-00', 'Lagos', '1 Adebowale Close, off Ramlat \r\n\r\nTimson', '', '2348098574398', '', 'Y', 'pending_verification', 'activated', '2015-09-17', '0000-00-00 00:00:00', 'T58621508', '2015-09-16 22:00:00', 0, '0000-00-00 00:00:00', 0, '5a59b1aa135f523edc3cdc50d4e96db103b73449'),
(448, '08034356782', 'ef79907024666abe29cf973e1ad680f8cac4da3578da6dfcf882ac4bcbcc90f9bed3bd95883442fe', '', 'EDMOND', 'ONOJA', 'EDMONOJA@GMAIL.COM', '1982-12-12', 'Lagos', '', '', '', '', 'Y', 'pending_verification', 'activated', '2015-09-18', '0000-00-00 00:00:00', 'T23768677', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, '78da6dfcf882ac4bcbcc90f9bed3bd95883442fe'),
(449, '08059001655', 'e25fae865d2ace6dbad2f81a1bd57797e15bcea5f3537d995ef6fb70eb46f0abb55895fa48a28a4d', '', 'olasumbo', 'osowo', 'sunnyosowo@gmail.com', '0000-00-00', '', NULL, NULL, '', '', 'N', 'pending_verification', 'pending_activation', '2015-09-20', '0000-00-00 00:00:00', 'T93104815', '2015-09-19 22:00:00', 0, '0000-00-00 00:00:00', 0, 'f3537d995ef6fb70eb46f0abb55895fa48a28a4d'),
(450, '08171920004', '8e4e0408b8f610e4676dff6c03ee8f8f91340ef13746a3aa1ca34c07a272f6bb8c3a9f4cf52689a3', '', 'Alesinloye-king', 'pelumi', 'Alesinloyepelumi@yahoo.com', '0000-00-00', '', NULL, NULL, '08101107340', '', 'N', 'pending_verification', 'pending_activation', '2015-09-20', '0000-00-00 00:00:00', 'T61755527', '2015-09-19 22:00:00', 0, '0000-00-00 00:00:00', 0, '3746a3aa1ca34c07a272f6bb8c3a9f4cf52689a3'),
(451, '08083114263', '4f0fbcd3ae8fd6de6eae45b775ce85967f217cf5f705d089aa8cfb83cf24d2c3584148915f852945', '', 'candice', 'Sy-Onwuka', 'candy_syng@yahoo.com', '0000-00-00', 'Lagos', '', '10 Wema Terrace, \r\n\r\nOsborne Estate. ikoyi.', '', '', 'Y', 'pending_verification', 'activated', '2015-09-20', '0000-00-00 00:00:00', 'T60602872', '2015-09-19 22:00:00', 0, '0000-00-00 00:00:00', 0, 'f705d089aa8cfb83cf24d2c3584148915f852945'),
(452, '07058898341', '216007d64d723c792a35ba179c8535eaaffecb087c6e4344fd13ef97ec44dfddb9d6130c2924ff9b', '', 'sam', 'akingboye', 'sam_akingboye@yahoo.com', '0000-00-00', '', NULL, NULL, '', '', 'N', 'pending_verification', 'pending_activation', '2015-09-20', '0000-00-00 00:00:00', 'T98906691', '2015-09-19 22:00:00', 0, '0000-00-00 00:00:00', 0, '7c6e4344fd13ef97ec44dfddb9d6130c2924ff9b'),
(453, '07012620498', 'c59759bc5d667120cab0f6cc85d4b6d19f8a3529dec2eb71b90d918595ba451ba614e685b6e1a802', '', 'voke', 'ekokobe', 'vokeekokobe@gmail.com', '0000-00-00', '', NULL, NULL, '', '', 'N', 'pending_verification', 'pending_activation', '2015-09-20', '0000-00-00 00:00:00', 'T37510600', '2015-09-19 22:00:00', 0, '0000-00-00 00:00:00', 0, 'dec2eb71b90d918595ba451ba614e685b6e1a802'),
(454, '07082286583', 'dd6f5618995785208604c5dd13f766dd3ebb478687039cb4585d3de5f0061bc985d89f9c409283af', '', 'tayo', 'olofun', 'olofunta@yahoo.com', '0000-00-00', '', NULL, NULL, '', '', 'N', 'pending_verification', 'pending_activation', '2015-09-20', '0000-00-00 00:00:00', 'T36272849', '2015-09-19 22:00:00', 0, '0000-00-00 00:00:00', 0, '87039cb4585d3de5f0061bc985d89f9c409283af'),
(455, '08035477918', 'af99adde9e9b5c60e0be61f6fa027555c81edfcb48de81aa03a6a6b578fa5a59f21d96cc85765c11', '', 'bisi', 'badero', 'bisi_badero@yahoo.com', '0000-00-00', '', NULL, NULL, '', '', 'N', 'pending_verification', 'pending_activation', '2015-09-20', '0000-00-00 00:00:00', 'T67152753', '2015-09-19 22:00:00', 0, '0000-00-00 00:00:00', 0, '48de81aa03a6a6b578fa5a59f21d96cc85765c11'),
(456, '07063383933', '17526dd2d915b0afe79dcafdb7a4cf80390e89a15dbab8a921e7ad8886f5874fbbced21dee400a6e', '', 'ama', 'achonu', 'alexandra.achonu@gmail.com', '0000-00-00', '', NULL, NULL, '', '', 'N', 'pending_verification', 'pending_activation', '2015-09-20', '0000-00-00 00:00:00', 'T15987803', '2015-09-19 22:00:00', 0, '0000-00-00 00:00:00', 0, '5dbab8a921e7ad8886f5874fbbced21dee400a6e'),
(457, '08034682060', '5e746ba79b46216eb621e7e17d6185e2a3dd90ac0bafe236082acdcdfb322d3173dce33821f67471', '', 'chidi', 'koldsweat', 'pnponlinebabystore@gmail.com', '0000-00-00', '', NULL, NULL, '', '', 'Y', 'pending_verification', 'activated', '2015-09-20', '0000-00-00 00:00:00', 'T32594891', '2015-09-19 22:00:00', 0, '0000-00-00 00:00:00', 0, '0bafe236082acdcdfb322d3173dce33821f67471'),
(458, '08164691226', '74d5811c9b36830ff83b10d4d4880e8036c25ae0cd27c7d56e9019ec03fa4026310ebc21d7fe8bbc', '', 'temitayo', 'nathan', 'tayo_nat@yahoo.com', '0000-00-00', '', NULL, NULL, '', '', 'N', 'pending_verification', 'pending_activation', '2015-09-20', '0000-00-00 00:00:00', 'T67659948', '2015-09-19 22:00:00', 0, '0000-00-00 00:00:00', 0, 'cd27c7d56e9019ec03fa4026310ebc21d7fe8bbc'),
(459, '08146071061', '7bd7968eee22a1d53a61de9e3ac81d8f4e457270317eda2b7a59b1e762965ec92cf558d08d859ac9', '', 'Magnify', 'Adepena', 'Adepenamag@yahoo.com', '0000-00-00', '', NULL, NULL, '', '', 'N', 'pending_verification', 'pending_activation', '2015-09-20', '0000-00-00 00:00:00', 'T68496605', '2015-09-19 22:00:00', 0, '0000-00-00 00:00:00', 0, '317eda2b7a59b1e762965ec92cf558d08d859ac9'),
(460, '08028971495', 'df315a2a6c56208224f916fdfedc7d3db917aa97d7e6166050a31c5e3dd478a0632b921913b9c209', '', 'bolanle', 'adeola', 'bsfashionroom@gmail.com', '0000-00-00', '', NULL, NULL, '', '', 'N', 'pending_verification', 'pending_activation', '2015-09-20', '0000-00-00 00:00:00', 'T70228835', '2015-09-19 22:00:00', 0, '0000-00-00 00:00:00', 0, 'd7e6166050a31c5e3dd478a0632b921913b9c209'),
(461, '08037448782', '89a1672e40bb48a49a92f476e662fa6375d250f0b896e1400e88f7034357fe78092f5d4733cfb28a', '', 'Afoma', 'Okwukaogu', 'Afomaonyejekwe@yahoo.com', '0000-00-00', '', NULL, NULL, '', '', 'N', 'pending_verification', 'pending_activation', '2015-09-20', '0000-00-00 00:00:00', 'T25918896', '2015-09-19 22:00:00', 0, '0000-00-00 00:00:00', 0, 'b896e1400e88f7034357fe78092f5d4733cfb28a'),
(462, '07087472640', '6d83db0c49aad8baf74f25c8f25bc46f3a9de4a62056fc6fdf10b903fed3715d427f76a0e4ffadc6', '', 'Damilola', 'Olusanya', 'Olusanya.damilola@gmail.com', '0000-00-00', '', NULL, NULL, '', '', 'N', 'pending_verification', 'pending_activation', '2015-09-20', '0000-00-00 00:00:00', 'T76154979', '2015-09-19 22:00:00', 0, '0000-00-00 00:00:00', 0, '2056fc6fdf10b903fed3715d427f76a0e4ffadc6'),
(463, '08077560633', '6fa0ceb3a887a32cf6ea618c645d4ed868d6f2a6635dc702c056f3f27aa5b33e2c60bff6f4a6e2f9', '', 'Adeola', 'Odusote', 'Dixiesapparel@gmail.com', '0000-00-00', 'Lagos', '', '', '', '', 'Y', 'pending_verification', 'activated', '2015-09-20', '0000-00-00 00:00:00', 'T34199840', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, '635dc702c056f3f27aa5b33e2c60bff6f4a6e2f9'),
(464, '080282996432', '12345ae730d2fc85bfcfebffb01b91b9889d4bc8cf7c97edd1145549640572b43c0eb6c9d7aa73b9', '', 'habiba', 'diaw', 'habibadiaw@gmail.com', '0000-00-00', '', NULL, NULL, '', '', 'N', 'pending_verification', 'pending_activation', '2015-09-20', '0000-00-00 00:00:00', 'T65326942', '2015-09-19 22:00:00', 0, '0000-00-00 00:00:00', 0, 'cf7c97edd1145549640572b43c0eb6c9d7aa73b9'),
(465, '08146220489', '14fccc585e2d9ffc1fd2cdc65fb87f79f3ef55cdfdbae3080da273920341c725a5ff89e04cc5688b', '', 'anita', 'nwosu', 'anitanwosu@gmail.com', '0000-00-00', '', NULL, NULL, '', '', 'N', 'pending_verification', 'pending_activation', '2015-09-20', '0000-00-00 00:00:00', 'T88127605', '2015-09-19 22:00:00', 0, '0000-00-00 00:00:00', 0, 'fdbae3080da273920341c725a5ff89e04cc5688b'),
(466, '07036727435', 'b67b5c3f7d11625c7b38a55c43c0866e7ec411cb7a4f2a3488131b67f190e66735b384792325187d', '', 'wumi', 'omidiji', 'woomediji@gmail.com', '0000-00-00', '', NULL, NULL, '', '', 'Y', 'pending_verification', 'activated', '2015-09-20', '0000-00-00 00:00:00', 'T10642604', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, '7a4f2a3488131b67f190e66735b384792325187d'),
(467, '08090901985', '193be81011f91a7bf2ae616a66bb48b6b255c5d9b718b1861d19d0ee9423806d06bd0be92c7dee81', '', 'kiki', 'Adesanya', 'kikiadesanya@ymail.com', '0000-00-00', '', NULL, NULL, '', '', 'N', 'pending_verification', 'pending_activation', '2015-09-20', '0000-00-00 00:00:00', 'T90957919', '2015-09-19 22:00:00', 0, '0000-00-00 00:00:00', 0, 'b718b1861d19d0ee9423806d06bd0be92c7dee81'),
(468, '07039338233', '201bbcfeb9344b1137a96a66f69c6bdbd790c8332f5e41d465e7979eece16e0ca92c238a7417e4cb', '', 'Pearl', 'Icy', 'Paliandu89@gmail.com', '0000-00-00', 'Lagos', '', '', '', '', 'Y', 'pending_verification', 'activated', '2015-09-20', '0000-00-00 00:00:00', 'T68245750', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, '2f5e41d465e7979eece16e0ca92c238a7417e4cb'),
(469, '08088381708', '7c4a8d09ca3762af61e59520943dc26494f8941bb07ca41d7168453e13f75295d0048044006d7ed7', '', 'ibrahim', 'momodu', 'iamomodu@yahoo.com', '0000-00-00', '', NULL, NULL, '', '', 'N', 'pending_verification', 'pending_activation', '2015-09-20', '0000-00-00 00:00:00', 'T29806602', '2015-09-19 22:00:00', 0, '0000-00-00 00:00:00', 0, 'b07ca41d7168453e13f75295d0048044006d7ed7'),
(470, '08036602706', '7c4a8d09ca3762af61e59520943dc26494f8941bffb53852ebeb1ebe1b6194e30409d271fd402aec', '', 'Abimbola', 'Akande', 'Cruzwitbibi@yahoo.co.uk', '0000-00-00', '', NULL, NULL, '07088122755', '', 'N', 'pending_verification', 'pending_activation', '2015-09-20', '0000-00-00 00:00:00', 'T88607503', '2015-09-19 22:00:00', 0, '0000-00-00 00:00:00', 0, 'ffb53852ebeb1ebe1b6194e30409d271fd402aec'),
(471, '08182442468', 'f1acaabc37e0a177e043ce2f1a30820511b8efe75b39ec328bf17e94b73b6f4d10bf94a130c2e1cf', '', 'yetunde', 'shode', 'yetunde.shode@gmail.com', '0000-00-00', '', NULL, NULL, '', '', 'N', 'pending_verification', 'pending_activation', '2015-09-20', '0000-00-00 00:00:00', 'T57390555', '2015-09-19 22:00:00', 0, '0000-00-00 00:00:00', 0, '5b39ec328bf17e94b73b6f4d10bf94a130c2e1cf'),
(472, '08036602706', 'c3168b3e83ba3d0160221e034948f33229258b391313c3430c2f086643d3a4d4909ecc799045e654', '', 'Ayobami', 'Odedina', 'Ayobamiodedina@gmail.com', '0000-00-00', '', NULL, NULL, '07088122755', '', 'N', 'pending_verification', 'pending_activation', '2015-09-20', '0000-00-00 00:00:00', 'T56502793', '2015-09-19 22:00:00', 0, '0000-00-00 00:00:00', 0, '1313c3430c2f086643d3a4d4909ecc799045e654'),
(473, '08094705960', '7c4a8d09ca3762af61e59520943dc26494f8941b3f13dac3ee8f69ef85d28d9f8cc5d6b450412ee1', '', 'Anita', 'Nnbuife', 'nnabuifeanita@yahoo.com', '0000-00-00', '', NULL, NULL, '', '', 'N', 'pending_verification', 'pending_activation', '2015-09-20', '0000-00-00 00:00:00', 'T63562914', '2015-09-19 22:00:00', 0, '0000-00-00 00:00:00', 0, '3f13dac3ee8f69ef85d28d9f8cc5d6b450412ee1'),
(474, '08033593760', 'bcab37daf662a4821e521bdbf7a78a49fef1f49091c22f20ae37567b6fe3b7c646ddbb5b19080d26', '', 'adetutu', 'ogunsowo', 'tutunoni@gmail.com', '0000-00-00', '', NULL, NULL, '08033593760', '', 'N', 'pending_verification', 'pending_activation', '2015-09-20', '0000-00-00 00:00:00', 'T80412672', '2015-09-19 22:00:00', 0, '0000-00-00 00:00:00', 0, '91c22f20ae37567b6fe3b7c646ddbb5b19080d26'),
(475, '08153806478', 'c1a15e0dc606d74f642881e120fb7ec0caa9214c7cecceed6bef317a28c8601c201b8e7e85d23e51', '', 'Darlyn', 'Okojie', 'Darlzkojie@gmail.com', '0000-00-00', '', NULL, NULL, '', '', 'N', 'pending_verification', 'pending_activation', '2015-09-20', '0000-00-00 00:00:00', 'T40530849', '2015-09-19 22:00:00', 0, '0000-00-00 00:00:00', 0, '7cecceed6bef317a28c8601c201b8e7e85d23e51'),
(476, '08181041478', '9fc49051331a6bb6275dee6a68e24b44f6a8f4420a0d6e94f24b7554b9f5c1eb896304a79487497a', '', 'Abby', 'Rockson', 'abiola.rockson@yahoo.com', '0000-00-00', '', NULL, NULL, '', '', 'N', 'pending_verification', 'pending_activation', '2015-09-20', '0000-00-00 00:00:00', 'T45520555', '2015-09-19 22:00:00', 0, '0000-00-00 00:00:00', 0, '0a0d6e94f24b7554b9f5c1eb896304a79487497a'),
(477, '08089039812', '4c619122c3d5fc4aa9d67ea62ad089de3c8fd108a9e122887b95d8340419d8d3cf828a6b7c0a0cd6', '', 'Henrietta', 'Mom odd', 'adesetta@gmail.com', '0000-00-00', '', NULL, NULL, '08070515725', '', 'Y', 'pending_verification', 'activated', '2015-09-20', '0000-00-00 00:00:00', 'T90341997', '2015-09-19 22:00:00', 0, '0000-00-00 00:00:00', 0, 'a9e122887b95d8340419d8d3cf828a6b7c0a0cd6'),
(478, '07084532690', 'd0323f352293ccb76d9c724e9dcdeac730281617a882a63566cc38ed6f07ec6f61b647ff61707803', '', 'Goke', 'Fowode', 'seyefowode@gmail.com', '1989-05-21', 'Lagos', '', '', '', '', 'Y', 'pending_verification', 'activated', '2015-09-21', '0000-00-00 00:00:00', 'T24499989', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, 'a882a63566cc38ed6f07ec6f61b647ff61707803'),
(479, '08091895708', 'e8c1b852eb1e8521dd34a5a5f74c7aed5de1256f39f279dff988b22c415515fbba78653be18d6cc9', '', 'Adedapo', 'Oniru', 'daponiru@gmail.com', '0000-00-00', '', NULL, NULL, '08033047523', 'Olatorera@dressmeoutlet.com', 'Y', 'pending_verification', 'activated', '2015-09-27', '0000-00-00 00:00:00', 'T77537955', '2015-09-26 22:00:00', 0, '0000-00-00 00:00:00', 0, '39f279dff988b22c415515fbba78653be18d6cc9'),
(480, '08033356100', 'c6e886c2c3669c3a5e0b22d20cea3a114223ecd2ac066e3c20c66429599fc32226b2a2070a65656f', '', 'oge', 'oge', 'ogemm5@gmail.com', '0000-00-00', '', NULL, NULL, '08055633781', '', 'N', 'pending_verification', 'pending_activation', '2015-09-28', '0000-00-00 00:00:00', 'T56375634', '2015-09-27 22:00:00', 0, '0000-00-00 00:00:00', 0, 'ac066e3c20c66429599fc32226b2a2070a65656f'),
(481, '09099254560', 'f50d5e414d09632b4f80b702b8f52c16770bf2f1505e88fa5ca5c9fd1dab3b37f98d4f608f0863d6', '', 'Stephanie', 'chidinma', 'chidinmastephanie57@gmail.com', '0000-00-00', '', NULL, NULL, '', 'stephaniechidinma918@yahoo.com', 'Y', 'pending_verification', 'activated', '2015-10-03', '0000-00-00 00:00:00', 'T89818585', '2015-10-02 22:00:00', 0, '0000-00-00 00:00:00', 0, '505e88fa5ca5c9fd1dab3b37f98d4f608f0863d6'),
(482, '07784185539', '2333b34af8468ca4786a0e8ede83a12f4d7044401ccdb7485a71c00b7f06ddce3ec971a9c29678d5', '', 'adiat', 'bashorun', 'adiatbashorun@hotmail.co.uk', '0000-00-00', '', NULL, NULL, '', '', 'N', 'pending_verification', 'pending_activation', '2015-10-04', '0000-00-00 00:00:00', 'T15461550', '2015-10-03 22:00:00', 0, '0000-00-00 00:00:00', 0, '1ccdb7485a71c00b7f06ddce3ec971a9c29678d5'),
(483, '0817860032', 'f06fd13475a302d7888dff2230b42fa1b5a39a8a6d6738ffb257299e42f0de4ba7c69a6e84629042', '', 'tairat', 'bashorun', 'tairatb@gmail.com', '0000-00-00', '', NULL, NULL, '', '', 'N', 'pending_verification', 'pending_activation', '2015-10-04', '0000-00-00 00:00:00', 'T20751949', '2015-10-03 22:00:00', 0, '0000-00-00 00:00:00', 0, '6d6738ffb257299e42f0de4ba7c69a6e84629042'),
(484, '07970167402', '5d04bfdb4835576ee8c2706e6722731c05f6ecbbcf2a4aab0fc42bd050b1b5491a39217411caed66', '', 'Mariam', 'Bashorun', 'm_bashorun@hotmail.co.uk', '0000-00-00', '', NULL, NULL, '', '', 'N', 'pending_verification', 'pending_activation', '2015-10-04', '0000-00-00 00:00:00', 'T90828804', '2015-10-03 22:00:00', 0, '0000-00-00 00:00:00', 0, 'cf2a4aab0fc42bd050b1b5491a39217411caed66'),
(485, '08178484484', '2995fdc0a13cd7654c713703947e35f3055c6a99025834de4ede642498d5535dd96bc204e076d19e', '', 'temilade', 'shoyinka', 'bummmy2005@yahoo.com', '0000-00-00', '', NULL, NULL, '', '', 'Y', 'pending_verification', 'activated', '2015-10-04', '0000-00-00 00:00:00', 'T28626692', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, '025834de4ede642498d5535dd96bc204e076d19e'),
(486, '08094660985', 'f48e3832b1164cea439dabe99ae462ed7fffc9781695a979b30bca0eef77b5008a314221c608ff0c', '', 'Damilola', 'Adewunmi', 'damilolaadewunmi@outlook.com', '0000-00-00', 'Lagos', '', '', '', '', 'Y', 'pending_verification', 'activated', '2015-10-04', '0000-00-00 00:00:00', 'T19330725', '2015-10-03 22:00:00', 0, '0000-00-00 00:00:00', 0, '1695a979b30bca0eef77b5008a314221c608ff0c'),
(487, '08138559020', 'e7afb659d36981dcef20d09ffc194d4c17632173a80819d2b59850c672fcd7d416699218df6a0aed', '', 'toyin', 'oyeledun', 'toyinoyeledun@yahoo.com', '0000-00-00', '', NULL, NULL, '', '', 'N', 'pending_verification', 'pending_activation', '2015-10-04', '0000-00-00 00:00:00', 'T59129921', '2015-10-03 22:00:00', 0, '0000-00-00 00:00:00', 0, 'a80819d2b59850c672fcd7d416699218df6a0aed'),
(488, '08032065065', 'b78811976c50c0fa43b8c7dce640043c9be90189586b6696f54b9afb26cb48fef3107df29f8a2a24', '', 'adesuwaa', 'oseghe', 'adesuwaoseghe@gmail.com', '0000-00-00', '', NULL, NULL, '', '', 'Y', 'pending_verification', 'activated', '2015-10-04', '0000-00-00 00:00:00', 'T50964827', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, '586b6696f54b9afb26cb48fef3107df29f8a2a24'),
(489, '07033238838', '50340f4dc0872512235caa517663313a85510880771806014840a026c2e65cead2be8b2c90b97f63', '', 'tayo', 'odunowo', 'tayo100@yahoo.com', '0000-00-00', '', NULL, NULL, '', '', 'N', 'pending_verification', 'pending_activation', '2015-10-04', '0000-00-00 00:00:00', 'T78395684', '2015-10-03 22:00:00', 0, '0000-00-00 00:00:00', 0, '771806014840a026c2e65cead2be8b2c90b97f63'),
(490, '08092838322', '4d7acb69507d70dd9b389c31aca5276be74dcfc77359fabbf3858aac543fab34ad6790c7e0d292ad', '', 'ogochukwu', 'nwachukwu', 'ogo@oandg.us', '0000-00-00', '', NULL, NULL, '', '', 'N', 'pending_verification', 'pending_activation', '2015-10-04', '0000-00-00 00:00:00', 'T51858838', '2015-10-03 22:00:00', 0, '0000-00-00 00:00:00', 0, '7359fabbf3858aac543fab34ad6790c7e0d292ad'),
(491, '08133979889', 'b09ebb00d725ee7deea3b1ca0b11063dbae25a8028143a2f8b73497c492522f5222aa49af35128e8', '', 'JeNika', 'Mukoro', 'jenikapmukoro@me.com', '0000-00-00', '', NULL, NULL, '', '', 'N', 'pending_verification', 'pending_activation', '2015-10-07', '0000-00-00 00:00:00', 'T42413845', '2015-10-06 22:00:00', 0, '0000-00-00 00:00:00', 0, '28143a2f8b73497c492522f5222aa49af35128e8'),
(492, '08181451105', 'e14658b6a9d257cd1a8c77201729a635c66ea342e71c07803b78f045d3911f09a37b4e71088980cd', '', 'Ngozi', 'Ezimako', 'ngoziez@ymail.com', '1968-12-05', 'Lagos', '', '', '', 'osahenye.kester@googlemail.com', 'Y', 'pending_verification', 'activated', '2015-10-07', '0000-00-00 00:00:00', 'T95919753', '2015-10-06 22:00:00', 0, '0000-00-00 00:00:00', 0, 'e71c07803b78f045d3911f09a37b4e71088980cd'),
(493, '08139721825', 'c901acbbc7f3127698f03c5ae517440d578fe1cef04fddbf7bb7af68b56e3ae7942dba298e92b1b0', '', 'Akinyemi', 'Sanya', 'gradeocservices@gmail.com', '0000-00-00', '', NULL, NULL, '', 'damilolae@ebsafr.com,aishaa@ebsafr.com,abiolao@ebsafr.com,lucym@ebsafr.com,gloryhenshaw4real@g\r\n\r\nmail.com,gbengaa@ebsafr.com', 'N', 'pending_verification', 'pending_activation', '2015-10-08', '0000-00-00 00:00:00', 'T18405683', '2015-10-07 22:00:00', 0, '0000-00-00 00:00:00', 0, 'f04fddbf7bb7af68b56e3ae7942dba298e92b1b0'),
(494, '08137896250', '4764fa111b07f356c535241af8be57f4e0f331e3a5aa646d9e6df12251ce4d3b5a50ac3e4cf8bbda', '', 'Fadeyi', 'Olayinka', 'fadeyiolayinka@gmail.com', '0000-00-00', '', NULL, NULL, '08106181372', '', 'Y', 'pending_verification', 'password_reset_pending', '2015-10-09', '0000-00-00 00:00:00', 'T72554977', '2015-10-08 22:00:00', 0, '0000-00-00 00:00:00', 0, 'a5aa646d9e6df12251ce4d3b5a50ac3e4cf8bbda'),
(495, '09099256744', '9fa323c0b8a6de91bf9d6b0761b8099610efee1759d0d85bbeb0e219a0ed5a26f489039cbe5b29ae', '', 'jamila', 'Mohammed. A', 'jamilamohammedaudu@gmail.com', '0000-00-00', '', NULL, NULL, '', '', 'Y', 'pending_verification', 'activated', '2015-10-13', '0000-00-00 00:00:00', 'T87798580', '2015-10-12 22:00:00', 0, '0000-00-00 00:00:00', 0, '59d0d85bbeb0e219a0ed5a26f489039cbe5b29ae'),
(496, '7602570227', '7c4a8d09ca3762af61e59520943dc26494f8941b0ad72392c2cee8090b6a32692bb82fd9e4b2734e', '', 'Bipin', 'Prasad', 'mail2bipinprasad@gmail.com', '0000-00-00', 'Lagos', '', '', '7602570227', '', 'Y', 'pending_verification', 'activated', '2015-10-14', '0000-00-00 00:00:00', 'T30190544', '2015-10-13 22:00:00', 0, '0000-00-00 00:00:00', 0, '0ad72392c2cee8090b6a32692bb82fd9e4b2734e'),
(497, '08030567571', 'ebd03596556d74af277cc8cb0ab94b5d233a98d0fd84ae85497d8c6d5d559d1dfc4562349467ac3f', '', 'Semiire', 'Folorunso', 'semiire@yahoo.com', '0000-00-00', '', NULL, NULL, '08054954924', '', 'N', 'pending_verification', 'pending_activation', '2015-10-20', '0000-00-00 00:00:00', 'T23840772', '2015-10-19 22:00:00', 0, '0000-00-00 00:00:00', 0, 'fd84ae85497d8c6d5d559d1dfc4562349467ac3f'),
(498, '08064675056', 'df04aa121ec63f74d8f96d6d27dbd7e5624b8cea192b8888602fcc88734f37860b8eb52d349654d4', '', 'michael', 'idah', 'midah2007@gmail.com', '0000-00-00', '', NULL, NULL, '', '', 'Y', 'pending_verification', 'activated', '2015-10-20', '0000-00-00 00:00:00', 'T56456883', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, '192b8888602fcc88734f37860b8eb52d349654d4'),
(499, '08027569864', '7c4a8d09ca3762af61e59520943dc26494f8941b9b34de217b391d66985576f93de9bf830ae6a161', '', 'Damien', 'Kehinde', 'kehindedamien@gmail.com', '0000-00-00', '', NULL, NULL, '', '', 'N', 'pending_verification', 'pending_activation', '2015-10-21', '0000-00-00 00:00:00', 'T66974675', '2015-10-20 22:00:00', 0, '0000-00-00 00:00:00', 0, '9b34de217b391d66985576f93de9bf830ae6a161'),
(500, '07069725225', '6ea51f7a08488a290cb4de3f7030dce1e84699b64f8f5d08143fca4c18bbc9fd223591b2543abce7', '', 'Chinyere', 'Nwachukwu', 'nwachukwu_chinyere@hotmail.com', '0000-00-00', 'Lagos', '', '', '', 'awe.eniola@yahoo.com', 'Y', 'pending_verification', 'activated', '2015-10-28', '0000-00-00 00:00:00', 'T40809627', '2015-10-27 22:00:00', 0, '0000-00-00 00:00:00', 0, '4f8f5d08143fca4c18bbc9fd223591b2543abce7'),
(501, '0817531055', '843a48c900da2e0e8a2d3ba57e1bdfa3a22bde4aae5154342536aacf5ef562b878b9df5125b30ba8', '', 'peter', 'agwu', 'agupetert75@gmail.com', '0000-00-00', '', NULL, NULL, '07018088818Enter \r\n\r\nPrimary Phone No.', '', 'N', 'pending_verification', 'pending_activation', '2015-10-28', '0000-00-00 00:00:00', 'T47710849', '2015-10-27 22:00:00', 0, '0000-00-00 00:00:00', 0, 'ae5154342536aacf5ef562b878b9df5125b30ba8'),
(502, '07023280626', '453db05ece4b10275baf3e2a87e50c456daa4a3f4744dded274e25fd51f05a9346297aafaf1f1952', '', 'Abu', 'Abu', 'abu@hotmail.com', '0000-00-00', '', NULL, NULL, '', '', 'N', 'pending_verification', 'pending_activation', '2015-10-30', '0000-00-00 00:00:00', 'T37119647', '2015-10-29 22:00:00', 0, '0000-00-00 00:00:00', 0, '4744dded274e25fd51f05a9346297aafaf1f1952');
INSERT INTO `cg_customer` (`id`, `phone`, `password`, `imsi`, `firstname`, `surname`, `email`, `birth_date`, `state_of_residence`, `home_address`, `office_address`, `alternate_phone`, `referred_email_addr`, `active`, `admin_verification_status`, `reg_status`, `reg_date`, `cancel_date`, `activation_code`, `created_date`, `created_by`, `modified_date`, `modified_by`, `hash_salt`) VALUES
(503, '08187303656', '165689aa6bc02d5ac6d56e464e5e4604a9183e29e7db53de17ea622829d34983fe47cec20a4dae61', '', 'AbU', 'Abu', 'abu.abubakar@hotmail.com', '0000-00-00', '', NULL, NULL, '', '', 'N', 'pending_verification', 'pending_activation', '2015-10-30', '0000-00-00 00:00:00', 'T93448537', '2015-10-29 22:00:00', 0, '0000-00-00 00:00:00', 0, 'e7db53de17ea622829d34983fe47cec20a4dae61'),
(504, '07034492828', '9f2f9c1809694ff32f9f547533961c82600898ec5b148c570a274101f4cce394c2049e894a9c87ba', '', 'Nwando', 'Ozobia', 'ndozobia@gmail.com', '0000-00-00', '', NULL, NULL, '08183444000', '', 'Y', 'pending_verification', 'activated', '2015-11-02', '0000-00-00 00:00:00', 'T48558961', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, '5b148c570a274101f4cce394c2049e894a9c87ba'),
(505, '08085416129', '47731a073747dd2f6c6a90facd8bb39ec8bfa1aec3b963172dcc654bf9cadf7fdc236cfa91d31c3c', '', 'odunayo', 'adesanya', 'temmie_bworm@yahoo.com', '0000-00-00', 'Lagos', '6 alaka street abule \r\n\r\nijesha yaba', '', '08167574443', '', 'Y', 'pending_verification', 'activated', '2015-11-09', '0000-00-00 00:00:00', 'T47679698', '2015-11-08 22:00:00', 0, '0000-00-00 00:00:00', 0, 'c3b963172dcc654bf9cadf7fdc236cfa91d31c3c'),
(506, '08033767742', '8c56e4053bd0c39fa5b1cece66727aea26123f63841a0255e377b28c50365fb622fce4e0c058463a', '', 'Osariase', 'Idubor', 'osariase.idubor@gmail.com', '0000-00-00', 'Lagos', 'flat 505, cluster \r\n\r\nb4, 1004 housing estate, VI', '', '', '', 'Y', 'pending_verification', 'activated', '0000-00-00', '0000-00-00 00:00:00', 'T11215530', '2015-11-20 22:00:00', 0, '0000-00-00 00:00:00', 0, '841a0255e377b28c50365fb622fce4e0c058463a'),
(507, '07022223232', '69e7932557001a77ec84a7a3a65a1fd123b86b6244bc2dc7e989e0f33787c941efaa1889a48c74c2', '', 'Ade', 'Mba', 'Ademba@gmail.com', '0000-00-00', '', NULL, NULL, '', '', 'N', 'pending_verification', 'pending_activation', '2015-11-23', '0000-00-00 00:00:00', 'T60846632', '2015-11-22 22:00:00', 0, '0000-00-00 00:00:00', 0, '44bc2dc7e989e0f33787c941efaa1889a48c74c2'),
(508, '08145632564', '89d879c81eb89efb2c74e77458d1382ffda308a81bc0a7171ec338db38f46233a8769b7892349e85', '', 'Anthony', 'Odu', 'antonyodu@gmail.com', '1989-10-04', 'Lagos', 'B L O C K 116  F L A T 1 ALAKA ESTATE  .SU R U L E RE 2', 'B L O C K 116  F L A T 1 A L A KA ESTATE  .SU R U L E RE', '09090311929', '', 'Y', 'pending_verification', 'activated', '2015-11-28', '0000-00-00 00:00:00', 'T41998974', '2015-11-27 22:00:00', 0, '0000-00-00 00:00:00', 0, '1bc0a7171ec338db38f46233a8769b7892349e85'),
(509, '08055822838', 'e81d7b8dd4267b499a1d68ece1fa678eaa3d07f55650e56688f76d71125c3fdb4b5234c29c074643', '', 'Funmi', 'Alonge', 'olufunmialonge@gmail.com', '0000-00-00', 'Lagos', '', '', '', '', 'Y', 'pending_verification', 'activated', '2015-11-30', '0000-00-00 00:00:00', 'T97353702', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, '5650e56688f76d71125c3fdb4b5234c29c074643'),
(510, '+39 3208458563', 'b03f468ad6ac1aa8a99808946a1da74b1b652895f5c2efac711fb7dfd0fddbd9b5c8551b316c3a48', '', 'vivian', 'okunbor', 'elenaomonuwa2@gmail.com', '0000-00-00', '', NULL, NULL, '', '', 'Y', 'pending_verification', 'activated', '2015-12-01', '0000-00-00 00:00:00', 'T90713642', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, 'f5c2efac711fb7dfd0fddbd9b5c8551b316c3a48'),
(511, '08099235702', '45e2ff7c22b772b7edbf84dc88901030e574e15f9d3373c6805fc8871a01322531b7e98d6a0f0820', '', 'Rolake', 'Job', 'Morolakejob@gmail.com', '0000-00-00', '', NULL, NULL, '', '', 'Y', 'pending_verification', 'activated', '2015-12-02', '0000-00-00 00:00:00', 'T19112520', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, '9d3373c6805fc8871a01322531b7e98d6a0f0820'),
(512, '08023187033', '3fa5a983005fddc2bbe9f83610d795d40acbd7d7fe3bde6c4a8dae8353182753144933beceb2d82e', '', 'Kayode \r\n\r\nO', 'U', 'tosinodu@genewglobalconsult.com', '0000-00-00', '', NULL, NULL, '08023187033', 'antonyodu@gmail.com', 'N', 'pending_verification', 'pending_activation', '2015-12-14', '0000-00-00 00:00:00', 'T14771811', '2015-12-13 22:00:00', 0, '0000-00-00 00:00:00', 0, 'fe3bde6c4a8dae8353182753144933beceb2d82e'),
(513, '08023187033', '3fa5a983005fddc2bbe9f83610d795d40acbd7d73d1f8cadf0474739ed8910f31f14d966990001d3', '', 'Kayode \r\n\r\nO', 'U', 'antonyodu@gmail2.com', '0000-00-00', '', NULL, NULL, '08023187033', '', 'N', 'pending_verification', 'pending_activation', '2015-12-14', '0000-00-00 00:00:00', 'T67624915', '2015-12-13 22:00:00', 0, '0000-00-00 00:00:00', 0, '3d1f8cadf0474739ed8910f31f14d966990001d3'),
(514, '', 'da39a3ee5e6b4b0d3255bfef95601890afd807091a018dfd968ad11601009f263ae08ef199a377ca', '', '', '', '', '0000-00-00', '', NULL, NULL, '', '', 'N', 'pending_verification', 'pending_activation', '2015-12-14', '0000-00-00 00:00:00', 'T14651922', '2015-12-13 22:00:00', 0, '0000-00-00 00:00:00', 0, '1a018dfd968ad11601009f263ae08ef199a377ca'),
(515, '', 'da39a3ee5e6b4b0d3255bfef95601890afd8070929e7753cddf8607f81bd2f86881c42e787525694', '', '', '', 'antonyodu4@gmail.com', '0000-00-00', '', NULL, NULL, '', '', 'N', 'pending_verification', 'pending_activation', '2015-12-14', '0000-00-00 00:00:00', 'T69940579', '2015-12-13 22:00:00', 0, '0000-00-00 00:00:00', 0, '29e7753cddf8607f81bd2f86881c42e787525694'),
(516, '09090311929', '64e562896453a35765210af4fc29f9d7afc905685b6cb3d25dd0df9672e76006b7cebe47c56e5875', '', 'Olumide', 'Arokodare', 'oarokoda2re@primewealthcapital.com', '0000-00-00', '', NULL, NULL, '09090311929', '', 'N', 'pending_verification', 'pending_activation', '2015-12-14', '0000-00-00 00:00:00', 'T57986580', '2015-12-13 22:00:00', 0, '0000-00-00 00:00:00', 0, '5b6cb3d25dd0df9672e76006b7cebe47c56e5875'),
(517, '09090311929', '8ad3829722a2563c567126a4b878d9dadf1739b497b7ff5721d296385c22c150735fd975a48aedad', '', 'Olumide', 'Arokodare', 'oarokodare2@primewealthcapital.com', '0000-00-00', '', NULL, NULL, '09090311929', '', 'N', 'pending_verification', 'pending_activation', '2015-12-14', '0000-00-00 00:00:00', 'T75910990', '2015-12-13 22:00:00', 0, '0000-00-00 00:00:00', 0, '97b7ff5721d296385c22c150735fd975a48aedad'),
(518, '09090311929', '330485f60d6dd08649de78faacbb964ca1316d9fb9ddf5b17cfd17c4d894febeef8d967f28911bb4', '', 'Olumide', 'Arokodare', 'oarokodare3@primewealthcapital.com', '0000-00-00', '', NULL, NULL, '09090311929', '', 'N', 'pending_verification', 'pending_activation', '2015-12-14', '0000-00-00 00:00:00', 'T88809768', '2015-12-13 22:00:00', 0, '0000-00-00 00:00:00', 0, 'b9ddf5b17cfd17c4d894febeef8d967f28911bb4'),
(519, '08032003058', 'ebb1f9c7f776f185f47bb8733c0f81883fb1aab3e3354c51a28484c163af1ae470c2193fce3b587b', '', 'Raphael', 'Yemitan', 'raphaey@mtnnigeria.net', '0000-00-00', '', NULL, NULL, '', '', 'Y', 'pending_verification', 'activated', '2015-12-16', '0000-00-00 00:00:00', 'T69564577', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, 'e3354c51a28484c163af1ae470c2193fce3b587b'),
(520, '2348098574398', '220448adbfc675fd5ca646a8ce9150aef48f9f8aa2f6a086f846edb6792771bf77824082b168bbf0', '', 'Emeka', 'Uzowulu', 'euzowulu@yahoo.co.uk', '0000-00-00', '', 'Surulere Lagos', '', '2348098574398', '', 'N', 'pending_verification', 'password_reset_pending', '2015-12-16', '0000-00-00 00:00:00', 'T15565569', '2015-12-15 22:00:00', 0, '0000-00-00 00:00:00', 0, 'a2f6a086f846edb6792771bf77824082b168bbf0'),
(521, '08165047290', 'c3f41ebc4e585e7f2538e2f1a294878db6ffe35f62de538c72ab240affd67732a89fc7bc654f9f1a', '', 'Andrew', 'Airelobhegbe', 'andrewairelobhegbe@gmail.com', '0000-00-00', '', NULL, NULL, '', '', 'Y', 'pending_verification', 'activated', '2015-12-17', '0000-00-00 00:00:00', 'T74185863', '2015-12-16 22:00:00', 0, '0000-00-00 00:00:00', 0, '62de538c72ab240affd67732a89fc7bc654f9f1a'),
(522, '07038001097', 'a3edde6bad69943114fd4da3f06e1911d280f8c3683009a9ac190a33c6f870498d5d0ccc5d96fc76', '', 'preye', 'marcus', 'preyedeals@gmail.com', '0000-00-00', 'Lagos', '', '', '', '', 'N', 'pending_verification', 'password_reset_pending', '2015-12-17', '0000-00-00 00:00:00', 'T44685771', '2015-12-16 22:00:00', 0, '0000-00-00 00:00:00', 0, '683009a9ac190a33c6f870498d5d0ccc5d96fc76'),
(523, '09096829237', '69622a8880425e078b1d48893d05455463be8a0002a5db611eda2d7b95f51fb8785a6f6efb80fb5c', '', 'tobiloba', 'abby', 'tobifimiabby@gmail.com', '0000-00-00', '', NULL, NULL, '08081779438', '', 'N', 'pending_verification', 'pending_activation', '2015-12-18', '0000-00-00 00:00:00', 'T14276785', '2015-12-17 22:00:00', 0, '0000-00-00 00:00:00', 0, '02a5db611eda2d7b95f51fb8785a6f6efb80fb5c'),
(524, '09090409765', '8d6b53bd396ab844d69be1155718ec537962dbbfb707e6825b62321d756df3d0fda22322a5b88d48', '', 'Adeola', 'Oyebola', 'Halloedah@gmail.com', '0000-00-00', 'Lagos', '', '', '', '', 'Y', 'pending_verification', 'activated', '2015-12-28', '0000-00-00 00:00:00', 'T96765676', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, 'b707e6825b62321d756df3d0fda22322a5b88d48'),
(525, '078026380&8', '31eaffcb4ff10fa69f76df2d14f864324bad90a04c833b55c7f634e08ccfc97cebce9f9424b7657d', '', 'Maya', 'Arogundade', 'Mayaaro@hotmail.com', '0000-00-00', '', NULL, NULL, '', '', 'N', 'pending_verification', 'pending_activation', '2015-12-31', '0000-00-00 00:00:00', 'T82488845', '2015-12-30 22:00:00', 0, '0000-00-00 00:00:00', 0, '4c833b55c7f634e08ccfc97cebce9f9424b7657d'),
(526, '08170587131', '5fb4c195d75007fa259ea80b8289c02ac91bdf6c7c3b833f6b4d5fbcaa1e1d4697627def190a64ab', '', 'Somto', 'Ogbonna', 'sogbonna10@gmail.com', '0000-00-00', '', NULL, NULL, '09031190295', '', 'N', 'pending_verification', 'pending_activation', '2016-01-06', '0000-00-00 00:00:00', 'T97650898', '2016-01-05 22:00:00', 0, '0000-00-00 00:00:00', 0, '7c3b833f6b4d5fbcaa1e1d4697627def190a64ab'),
(527, '08109333210', '7875c746e6d7594a52f75c93e897059ac37afc702b733b03349696d73f8411838ca0d9889cbcd118', '', 'UPL \r\n\r\nEvents', '& Catering Service', 'universalperfectionltd@yahoo.com', '0000-00-00', '', NULL, NULL, '08109333210', '', 'N', 'pending_verification', 'pending_activation', '2016-01-14', '0000-00-00 00:00:00', 'T68439760', '2016-01-13 22:00:00', 0, '0000-00-00 00:00:00', 0, '2b733b03349696d73f8411838ca0d9889cbcd118'),
(528, '08089372797', '7e5cc445b31395db932f347a4740c49692cd30e2720ee0a680d97b73bcb2199d94c7f70330c1e504', '', 'Rosemary', 'Etim', 'creamy189@gmail.com', '0000-00-00', 'Lagos', '', '', '', '', 'Y', 'pending_verification', 'activated', '2016-01-14', '0000-00-00 00:00:00', 'T84933642', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, '720ee0a680d97b73bcb2199d94c7f70330c1e504'),
(529, '08066643999', 'f0c339fe5c36169f581efc83cecc889fce82e911abe225ce3dcdccf30d458ad60ee6bce04c102c05', '', 'George', 'Ederard', 'zdrad@yahoo.com', '0000-00-00', '', NULL, NULL, '08023166918', '', 'N', 'pending_verification', 'pending_activation', '2016-01-26', '0000-00-00 00:00:00', 'T88917818', '2016-01-25 22:00:00', 0, '0000-00-00 00:00:00', 0, 'abe225ce3dcdccf30d458ad60ee6bce04c102c05'),
(530, '08169599064', '2fdc275994be9f365cce9154c427ea5a19b56cb73a612395daed826575901503dcb197c00813b4f2', '', 'Elizabeth', 'onwodi', 'onwodi.elizabeth@gmail.com', '0000-00-00', '', NULL, NULL, '', '', 'Y', 'pending_verification', 'activated', '2016-01-27', '0000-00-00 00:00:00', 'T89672960', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, '3a612395daed826575901503dcb197c00813b4f2'),
(531, '08078430480', 'a848203c07b16f1927f895fc71155142e5a9d957f7fec19926dadc82bf3b6c4812d1e5b0e8865a58', '', 'Jummai', 'Arome', 'iyearome@gmail.com', '0000-00-00', '', NULL, NULL, '08078430480', '', 'Y', 'pending_verification', 'activated', '2016-02-04', '0000-00-00 00:00:00', 'T38546990', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, 'f7fec19926dadc82bf3b6c4812d1e5b0e8865a58'),
(532, '07033593600', '3b765e9913950c287c38f9c4cc357baea0f7b1181b0d21e4b96df15c41dae96e4f9209aa4783ea71', '', 'Golden', 'Oluchukwu', 'oluchukwugolden@gmail.com', '0000-00-00', 'Lagos', '', '', '', '', 'Y', 'pending_verification', 'activated', '2016-02-04', '0000-00-00 00:00:00', 'T10756836', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, '1b0d21e4b96df15c41dae96e4f9209aa4783ea71'),
(533, '09090311929', '0306171528e20e430b1787f14cc5c6d5bfa686d0bbd7345811103d8af1bba6ff31d9848634f36765', '', 'Anthony', 'Odu', 'tosin@vationsys.com', '0000-00-00', 'la', 'Alaka Estate', 'Alaka Estate', '', 'antonyodu@gmail.com', 'N', 'pending_verification', 'password_reset_pending', '2016-02-08', '0000-00-00 00:00:00', 'T32487809', '2016-02-07 22:00:00', 0, '0000-00-00 00:00:00', 0, 'bbd7345811103d8af1bba6ff31d9848634f36765'),
(535, '2348098574398', '4d018f58245ace058fefdefd2953a7a12ff566cea064730a1872aa8f46cbaa0d11b7c68ffa741a8c', '', 'Huldee', 'Anie', 'emekau@vationsys.com', '0000-00-00', '', NULL, NULL, '', '', 'N', 'pending_verification', 'pending_activation', '2016-02-10', '0000-00-00 00:00:00', 'T14551707', '2016-02-09 22:00:00', 0, '0000-00-00 00:00:00', 0, 'a064730a1872aa8f46cbaa0d11b7c68ffa741a8c'),
(536, '07084223896', 'a63747ab70c833f23e1283c981d67ed03514baf321a69d2af5a762ec7a23d527aec1ad53b9b8d409', '', 'adewale', 'onafalujo', 'walengy2001@gmail.com', '0000-00-00', '', NULL, NULL, '', '', 'N', 'pending_verification', 'pending_activation', '2016-02-22', '0000-00-00 00:00:00', 'T34516990', '2016-02-21 22:00:00', 0, '0000-00-00 00:00:00', 0, '21a69d2af5a762ec7a23d527aec1ad53b9b8d409'),
(537, '08033088858', 'c9153fa4c8bd84cd0832983e19af53c6ba422f1cefaebf5356585e62dc5680501b1bbf3f40f4681d', '', 'Lisa', 'Lisa', 'Lisaatuyota@live.co.uk', '0000-00-00', '', NULL, NULL, '09093608448', '', 'N', 'pending_verification', 'password_reset_pending', '2016-02-22', '0000-00-00 00:00:00', 'T47823698', '2016-02-21 22:00:00', 0, '0000-00-00 00:00:00', 0, 'efaebf5356585e62dc5680501b1bbf3f40f4681d'),
(538, '08054634176', 'cc747cc6e35bed37ce9b82207f02fff619ea82a62aca9196d4fcadf4e88d551c795c231cd83b01a2', '', 'Kayode', 'Ayantola', 'kdoo4rreal@yahoo.com', '0000-00-00', '', NULL, NULL, '07068755614', '', 'N', 'pending_verification', 'pending_activation', '2016-02-25', '0000-00-00 00:00:00', 'T19525835', '2016-02-24 22:00:00', 0, '0000-00-00 00:00:00', 0, '2aca9196d4fcadf4e88d551c795c231cd83b01a2'),
(539, '08035350160', '8a94bb6a4d03f8463a14f1d95fed3513f22c311795554be2eb1345290b81576c5fa920bab6e32888', '', 'Adedeji', 'Awobona', 'dejibona@yahoo.com', '0000-00-00', '', NULL, NULL, '08034031631', '', 'N', 'pending_verification', 'pending_activation', '2016-03-05', '0000-00-00 00:00:00', 'T20485766', '2016-03-04 22:00:00', 0, '0000-00-00 00:00:00', 0, '95554be2eb1345290b81576c5fa920bab6e32888'),
(540, '08130088568', '5413cfec282b25c51a15cfa7e2cbe7b9d91695c986859c27f36938857cdded760292ee2565f24eca', '', 'Adebamowo', 'Adedoyin', 'wunmade.addey@gmail.com', '0000-00-00', '', NULL, NULL, '09054561595', '', 'N', 'pending_verification', 'pending_activation', '2016-03-15', '0000-00-00 00:00:00', 'T43795871', '2016-03-14 22:00:00', 0, '0000-00-00 00:00:00', 0, '86859c27f36938857cdded760292ee2565f24eca'),
(541, '08055584444', '2a501d8e651932c7f3b27a01ea9b9c325ded3c32e570f99d8e3afd3200a674b173f27f4c323b8136', '', 'ojukwu', 'onwuzulike', 'ojwardrobesboutique@yahoo.com', '0000-00-00', '', NULL, NULL, '', '', 'N', 'pending_verification', 'pending_activation', '2016-03-18', '0000-00-00 00:00:00', 'T97943529', '2016-03-17 22:00:00', 0, '0000-00-00 00:00:00', 0, 'e570f99d8e3afd3200a674b173f27f4c323b8136'),
(542, '08040070703', '81d4483d847dacd68c8702bfd7180b4e88c0098aabf46f23634058b9ebf72196e2d1debc6047e20b', '', 'Dami', 'O', 'damiolowokere@gmail.com', '0000-00-00', '', NULL, NULL, '', '', 'N', 'pending_verification', 'pending_activation', '2016-03-23', '0000-00-00 00:00:00', 'T77558843', '2016-03-22 22:00:00', 0, '0000-00-00 00:00:00', 0, 'abf46f23634058b9ebf72196e2d1debc6047e20b'),
(543, '08032003562', '81d4483d847dacd68c8702bfd7180b4e88c0098a1f4702117d7518a68c26a96aa0a58ce625ab6da5', '', 'Damilola', 'Olumide-Ajayi', 'damiolumideajayi@gmail.com', '1982-03-13', 'Lagos', 'null', 'null', '', '', 'N', 'pending_verification', 'pending_activation', '2016-03-24', '0000-00-00 00:00:00', 'T31938540', '2016-03-23 22:00:00', 0, '0000-00-00 00:00:00', 0, '1f4702117d7518a68c26a96aa0a58ce625ab6da5'),
(544, '08074129736', 'e07bccf0f5e5e0fa82d5f0339727412b23b4bab6039e5f670fbe3449398ba9841e14a5020b88aa97', '', 'femi', 'abioye', 'afemo2000@hotmail.com', '0000-00-00', '', NULL, NULL, '', '', 'N', 'pending_verification', 'pending_activation', '2016-03-24', '0000-00-00 00:00:00', 'T52987673', '2016-03-23 22:00:00', 0, '0000-00-00 00:00:00', 0, '039e5f670fbe3449398ba9841e14a5020b88aa97'),
(545, '+2348070448954', '468f98ed6ff1867509d5f0cf560db59012e30d4c88da07912d55ebbea2c1d5c0a1fb340b6ac29393', '', 'Jeffrey', 'Anyado', 'Anyadojeffrey14@yahoo.com', '0000-00-00', '', NULL, NULL, '+2348070448954', '', 'N', 'pending_verification', 'pending_activation', '2016-03-30', '0000-00-00 00:00:00', 'T68794548', '2016-03-29 22:00:00', 0, '0000-00-00 00:00:00', 0, '88da07912d55ebbea2c1d5c0a1fb340b6ac29393'),
(546, '08152748870', '1d71be37e0fa53e7d29afd5b60c284cb95cb8c037ea9d4376cba19858f2a727dc04131af84a2d125', '', 'Adesuwa', 'Ossai', 'adesuwa.ossai@yahoo.com', '0000-00-00', '', NULL, NULL, '', '', 'N', 'pending_verification', 'pending_activation', '2016-04-04', '0000-00-00 00:00:00', 'T43632599', '2016-04-03 22:00:00', 0, '0000-00-00 00:00:00', 0, '7ea9d4376cba19858f2a727dc04131af84a2d125'),
(547, '08095492596', 'b6eac5c1480daa7af6e1a8287d800f4fcaa5433b6758da14e33fad2ec792721b51b5c62cbd20abc4', '', 'matilda', 'okereke', 'uandmatty@gmail.com', '0000-00-00', '', NULL, NULL, '', '', 'N', 'pending_verification', 'activated', '2016-04-06', '0000-00-00 00:00:00', 'T84909930', '2016-04-05 22:00:00', 0, '0000-00-00 00:00:00', 0, '6758da14e33fad2ec792721b51b5c62cbd20abc4'),
(548, '08039358692', '6b68c81d1b1fcbed2136cf39ff30c7bf256b854dd5688317c980647d526ef16a6d2e1d8305c12164', '', 'chinyere', 'eze', 'chezzyeze2013@yahoo.com', '1994-01-21', 'Anambra', 'plot 1287 lake view estate amuwo odofin lagos', '80b lifiaji street dolphin estate ikoyi', '', '', 'N', 'pending_verification', 'pending_activation', '2016-04-06', '0000-00-00 00:00:00', 'T66313876', '2016-04-05 22:00:00', 0, '0000-00-00 00:00:00', 0, 'd5688317c980647d526ef16a6d2e1d8305c12164'),
(549, '08032672570', '6b68c81d1b1fcbed2136cf39ff30c7bf256b854dedb5d5fafa6e0b8fd54e160166776b75ac20e27c', '', 'uche', 'Gene', 'Chimamanda1234@gmail', '0000-00-00', '', NULL, NULL, '', '', 'N', 'pending_verification', 'pending_activation', '2016-04-20', '0000-00-00 00:00:00', 'T81440910', '2016-04-19 22:00:00', 0, '0000-00-00 00:00:00', 0, 'edb5d5fafa6e0b8fd54e160166776b75ac20e27c'),
(550, '08083607693', '50abc118d701ce0b2de020ffcebe0d5ad014ca3a956a28def4610ca1ddd2ef2885334f6a153849a5', '', 'Nnenna', 'Ukegbu', 'nnennaukegbu@yahoo.co.uk', '0000-00-00', 'Lagos', 'No. 2 Rahman Adeboyejo Street beside mobolaji johnson estate , Lekki Phase 1', 'No. 2 Rahman Adeboyejo Street, Lekki Phase 1', '08083607693', '', 'N', 'pending_verification', 'pending_activation', '2016-04-23', '0000-00-00 00:00:00', 'T14369921', '2016-04-22 22:00:00', 0, '0000-00-00 00:00:00', 0, '956a28def4610ca1ddd2ef2885334f6a153849a5'),
(551, '07080247144', 'a570a72f856ebd32cd4f4ae842ccd0f02bae87bd7bd2cb02dc334ca66aa3707823589f45ade9cc43', '', 'Ona', 'Ofunne', 'ona660@gmail.com', '0000-00-00', '', NULL, NULL, '', '', 'N', 'pending_verification', 'pending_activation', '2016-04-24', '0000-00-00 00:00:00', 'T92404507', '2016-04-23 22:00:00', 0, '0000-00-00 00:00:00', 0, '7bd2cb02dc334ca66aa3707823589f45ade9cc43'),
(552, '08189558783', '21bd12dc183f740ee76f27b78eb39c8ad972a7570514eb81a41713abc86b5ca939a571401bca95a6', '', 'Jace', 'Afolahan', 'gbengaa@ebsafr.com', '0000-00-00', '', NULL, NULL, '', '', 'N', 'pending_verification', 'pending_activation', '2016-04-25', '0000-00-00 00:00:00', 'T30505758', '2016-04-24 22:00:00', 0, '0000-00-00 00:00:00', 0, '0514eb81a41713abc86b5ca939a571401bca95a6'),
(553, '08173722181', '81f1def83b63ef24acd5a78b1eda63c723fdb344a41da26842323cf60e45b94ffd813d382ffeb5c9', '', 'Fatima', 'Olubunmi', 'fatima_chinwe@yahoo.com', '0000-00-00', '', NULL, NULL, '', '', 'N', 'pending_verification', 'pending_activation', '2016-04-25', '0000-00-00 00:00:00', 'T93211926', '2016-04-24 22:00:00', 0, '0000-00-00 00:00:00', 0, 'a41da26842323cf60e45b94ffd813d382ffeb5c9'),
(554, '07066204369', '8be3c943b1609fffbfc51aad666d0a04adf83c9dae439f3aea6e1d75058bc02634d18e9a52c3a699', '', 'Adaeze', 'Mba', 'mba.adaeze@yahoo.com', '0000-00-00', '', NULL, NULL, '', '', 'N', 'pending_verification', 'pending_activation', '2016-04-26', '0000-00-00 00:00:00', 'T68106861', '2016-04-25 22:00:00', 0, '0000-00-00 00:00:00', 0, 'ae439f3aea6e1d75058bc02634d18e9a52c3a699'),
(555, '08110160588', '649ef1dbe04209ff732451e230976d61236723f8392f13fa12ab637ae67a7c45b19a3bb4226d8e23', '', 'nduka', 'emi', 'ndukaemi@yahoo.com', '0000-00-00', '', NULL, NULL, '08038312805', '', 'N', 'pending_verification', 'pending_activation', '2016-04-26', '0000-00-00 00:00:00', 'T67808508', '2016-04-25 22:00:00', 0, '0000-00-00 00:00:00', 0, '392f13fa12ab637ae67a7c45b19a3bb4226d8e23'),
(556, '07037058570', 'b98bf61dfcd79b694e9b7bd9a273b715a29a22835a64a106709877ab5ef222f6bd17c541eb617a07', '', 'Anna', 'Etonu', 'aetonu24@gmail.com', '0000-00-00', '', NULL, NULL, '', '', 'N', 'pending_verification', 'pending_activation', '2016-05-05', '0000-00-00 00:00:00', 'T85557709', '2016-05-04 22:00:00', 0, '0000-00-00 00:00:00', 0, '5a64a106709877ab5ef222f6bd17c541eb617a07'),
(557, '08029079144', '1cd75c5decefe0794674b2c070c76b4bec0444fb1e0382d662b6cddb5d3fdc98e3ca8e0fe41393f9', '', 'shekoni', 'mariam', 'mariamshekoni@yahoo.com', '0000-00-00', '', NULL, NULL, '', '.', 'N', 'pending_verification', 'pending_activation', '2016-07-22', '0000-00-00 00:00:00', 'T68136527', '2016-07-22 06:00:00', 0, '0000-00-00 00:00:00', 0, '1e0382d662b6cddb5d3fdc98e3ca8e0fe41393f9'),
(558, '09029095645', '06d7d6ef2965355f1c71eacdbe8f3927c65d977ea601ab6b6d5ef6a32dc3ef5609d8ef5e1a7d64ec', '', 'angel', 'beckky', 'angelbeckky@yahoo.co.uk', '0000-00-00', '', NULL, NULL, '', '', 'N', 'pending_verification', 'pending_activation', '2016-07-22', '0000-00-00 00:00:00', 'T98267834', '2016-07-22 06:00:00', 0, '0000-00-00 00:00:00', 0, 'a601ab6b6d5ef6a32dc3ef5609d8ef5e1a7d64ec'),
(559, '08080803855', 'faa47cb95ad5a23e14b89bc2ebf926bfbfb01d3e753cd98e22e3e19bc82300d3429f46e30d4bdd8a', '', 'Chinenye', 'Nwanna', 'chinenyenwanna@gmail.com', '0000-00-00', '', NULL, NULL, '', '.', 'N', 'pending_verification', 'password_reset_pending', '2016-07-25', '0000-00-00 00:00:00', 'T27130593', '2016-07-25 06:00:00', 0, '0000-00-00 00:00:00', 0, '753cd98e22e3e19bc82300d3429f46e30d4bdd8a'),
(578, '08189558783', '21bd12dc183f740ee76f27b78eb39c8ad972a757aefa3c5aebc3e4ae4f5086caff5235202c175949', '', 'Jace', 'Afo', 'jac0422@gmail.com', '0000-00-00', '', NULL, NULL, '', 'jac0422@hotmail.com.', 'N', 'pending_verification', 'pending_activation', '2016-08-17', '0000-00-00 00:00:00', 'T36605733', '2016-08-17 06:00:00', 0, '0000-00-00 00:00:00', 0, 'aefa3c5aebc3e4ae4f5086caff5235202c175949'),
(579, '08145632564', '7c222fb2927d828af22f592134e8932480637c0d5b61f1c6debdd45a6042d939ee7bdb78c773bbe3', '', 'Anthony', 'Odu', 'antonyodu@yahoo.com', '0000-00-00', '', NULL, NULL, '', '.', 'N', 'pending_verification', 'pending_activation', '2016-08-17', '0000-00-00 00:00:00', 'T45289954', '2016-08-17 06:00:00', 0, '0000-00-00 00:00:00', 0, '5b61f1c6debdd45a6042d939ee7bdb78c773bbe3'),
(580, '08323423423', 'befa39749509fd9ab56743e14f9d68d843ea4038006c027c9ef3732b40b79b0d169d79a5f0be0178', '', 'John', 'Doe', 'info@vationsys.com', '0000-00-00', '', NULL, NULL, '', '.', 'N', 'pending_verification', 'pending_activation', '2016-08-20', '0000-00-00 00:00:00', 'T28516626', '2016-08-20 06:00:00', 0, '0000-00-00 00:00:00', 0, '006c027c9ef3732b40b79b0d169d79a5f0be0178'),
(581, '07879998210', 'b1bc870dd55fd570840b2a50f6c9bcf34caa22bc7e29ade3416da015be14b6d21e91fe043f735bf7', '', 'Lucy', 'Mba', 'prestreal4@live.com', '0000-00-00', '', NULL, NULL, '', '.', 'N', 'pending_verification', 'pending_activation', '2016-08-20', '0000-00-00 00:00:00', 'T82788782', '2016-08-20 06:00:00', 0, '0000-00-00 00:00:00', 0, '7e29ade3416da015be14b6d21e91fe043f735bf7'),
(582, '08145632564', '89d879c81eb89efb2c74e77458d1382ffda308a87b1326717d1b253924aabe7bd92f10019a586a14', '', 'Anthony', 'Odu', 'antonyodusfvsdvsdv@gmail.com', '0000-00-00', '', NULL, NULL, '', '.', 'N', 'pending_verification', 'pending_activation', '2016-10-04', '0000-00-00 00:00:00', 'T26254566', '2016-10-04 06:00:00', 0, '0000-00-00 00:00:00', 0, '7b1326717d1b253924aabe7bd92f10019a586a14'),
(583, '08145632564', '89d879c81eb89efb2c74e77458d1382ffda308a8516f8a442ee51887b8c3c6e7da1185fee13b89c5', '', 'Anthony', 'Odu', 'antonybdfbdfbdodu@gmail.com', '0000-00-00', '', NULL, NULL, '', '.', 'N', 'pending_verification', 'pending_activation', '2016-10-04', '0000-00-00 00:00:00', 'T95181637', '2016-10-04 06:00:00', 0, '0000-00-00 00:00:00', 0, '516f8a442ee51887b8c3c6e7da1185fee13b89c5'),
(584, '0987654', '70c881d4a26984ddce795f6f71817c9cf4480e79666abee982cabc16fecddb3d2f71db0a7c6f41b8', '', 'sdcvsv', 'vsdcsdcs', 'aaa@ssss.com', '0000-00-00', '', NULL, NULL, '', '', 'N', 'pending_verification', 'pending_activation', '2016-12-05', '0000-00-00 00:00:00', 'T32411846', '2016-12-05 06:00:00', 0, '0000-00-00 00:00:00', 0, '666abee982cabc16fecddb3d2f71db0a7c6f41b8'),
(585, '90876543', '7e240de74fb1ed08fa08d38063f6a6a91462a815684075831db46b745cb059592167384532721eb8', '', 'cccc', 'mmmm', 'aa@ss.com', '0000-00-00', '', NULL, NULL, '', 'antonyodu@gmail.com', 'N', 'pending_verification', 'pending_activation', '2016-12-05', '0000-00-00 00:00:00', 'T76343870', '2016-12-05 06:00:00', 0, '0000-00-00 00:00:00', 0, '684075831db46b745cb059592167384532721eb8'),
(586, '08145632564', 'd033e22ae348aeb5660fc2140aec35850c4da99703324bdd22312fee8b5bee0812bbed3d5b0c50ed', '', 'Anthony', 'Oduduwa', 'info@ggc.com', '0000-00-00', '', NULL, NULL, '', '', 'N', 'pending_verification', 'pending_activation', '2016-12-05', '0000-00-00 00:00:00', 'T81959847', '2016-12-05 06:00:00', 0, '0000-00-00 00:00:00', 0, '03324bdd22312fee8b5bee0812bbed3d5b0c50ed'),
(587, '23432343565', '2727fece04e8df0deb08b15d54446ee839047470f4d0525a299c3b01f3b1e72256ca184c4e43e0f6', '', 'Info', 'Jlf', 'info@jollof.com', '1985-02-06', 'Lagos', '23 Tyrone St', '56 lekii road', '', '', 'N', 'pending_verification', 'pending_activation', '2017-02-06', '0000-00-00 00:00:00', 'T60331987', '2017-02-06 06:00:00', 0, '0000-00-00 00:00:00', 0, 'f4d0525a299c3b01f3b1e72256ca184c4e43e0f6'),
(588, '08182102198', '7c222fb2927d828af22f592134e8932480637c0dc67489b0f90f83cb0675735da7d924b837a293db', '', 'Basita', 'Arog', 'esb009@gmail.com', '0000-00-00', '', NULL, NULL, '', 'mballalucy87@gmail.com', 'N', 'pending_verification', 'pending_activation', '2017-03-25', '0000-00-00 00:00:00', 'T27209541', '2017-03-25 06:00:00', 0, '0000-00-00 00:00:00', 0, 'c67489b0f90f83cb0675735da7d924b837a293db'),
(589, '08038358692', '6b68c81d1b1fcbed2136cf39ff30c7bf256b854db00a0eb6708d5a4a3c02dfab8ad4418c7ee18d39', '', 'Chinny', 'Eze', 'chinyerege@ebsafr.com', '0000-00-00', '', NULL, NULL, '', '', 'N', 'pending_verification', 'pending_activation', '2017-03-27', '0000-00-00 00:00:00', 'T99674949', '2017-03-27 06:00:00', 0, '0000-00-00 00:00:00', 0, 'b00a0eb6708d5a4a3c02dfab8ad4418c7ee18d39'),
(590, '7134740966', 'dfa956a5b8ea373aea30ce42e39024fec2296943f99e38ec666caa51a4687bb6bcc1b9d1eedf5833', '', 'Ugochukwu', 'Ihechukwu', 'flexopjoel@gmail.com', '0000-00-00', '', NULL, NULL, '', '', 'N', 'pending_verification', 'pending_activation', '2017-04-28', '0000-00-00 00:00:00', 'T98664727', '2017-04-28 06:00:00', 0, '0000-00-00 00:00:00', 0, 'f99e38ec666caa51a4687bb6bcc1b9d1eedf5833'),
(591, '08039358692', '6b68c81d1b1fcbed2136cf39ff30c7bf256b854d25977cd89216b3a135621d9eb2d4203a2dfe44d6', '', 'Eze', 'Chinyere', 'eje_jenny@yahoo.com', '0000-00-00', '', NULL, NULL, '', '', 'N', 'pending_verification', 'pending_activation', '2017-10-03', '0000-00-00 00:00:00', 'T51881745', '2017-10-03 06:00:00', 0, '0000-00-00 00:00:00', 0, '25977cd89216b3a135621d9eb2d4203a2dfe44d6'),
(592, '080803833', 'd033e22ae348aeb5660fc2140aec35850c4da997ba35028f5d64d80ebc9cbeb895d1e740d5ca5fa2', '', 'trivin', 'oye', 'segun@stakle.com', '0000-00-00', '', NULL, NULL, '', '', 'N', 'pending_verification', 'pending_activation', '2017-11-14', '0000-00-00 00:00:00', 'T66343957', '2017-11-14 06:00:00', 0, '0000-00-00 00:00:00', 0, 'ba35028f5d64d80ebc9cbeb895d1e740d5ca5fa2');

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
('t111m7qb524dmmrnahormj1nqh0ig6u4', '::1', 1537939664, 0x5f5f63695f6c6173745f726567656e65726174657c693a313533373933393636343b),
('o4t3vsgjo1rf0il9kg9u6g5eml7novur', '::1', 1537938736, ''),
('6pdrht44lins3aucfe151h2imk0rf1nh', '::1', 1537939966, 0x5f5f63695f6c6173745f726567656e65726174657c693a313533373933393936363b557365725f69647c733a323a223235223b526f6c655f69647c733a313a2231223b726573745f69647c733a313a2233223b66697273746e616d657c733a333a226f7933223b6c6173746e616d657c733a363a2274726976696e223b656d61696c7c733a31313a226f7965406562732e636f6d223b547970657c733a373a2263756973696e65223b547970655f69647c693a313b63756973696e6541646d696e7c623a313b6d65726368616e745f69647c733a313a2233223b636f6d70616e796e616d657c733a31303a2242756b6b612048757473223b5061796d656e7469647c733a303a22223b6176617461727c733a31383a224c4f474f4235333735373537332e6a706567223b7365617263685f706172616d737c613a313a7b733a31313a226f72646572737461747573223b733a313a2231223b7d),
('g7mbsisfsdmnismn21q8ugdqa9tbkdq7', '::1', 1537940318, 0x5f5f63695f6c6173745f726567656e65726174657c693a313533373934303331383b557365725f69647c733a323a223235223b526f6c655f69647c733a313a2231223b726573745f69647c733a313a2233223b66697273746e616d657c733a333a226f7933223b6c6173746e616d657c733a363a2274726976696e223b656d61696c7c733a31313a226f7965406562732e636f6d223b547970657c733a373a2263756973696e65223b547970655f69647c693a313b63756973696e6541646d696e7c623a313b6d65726368616e745f69647c733a313a2233223b636f6d70616e796e616d657c733a31303a2242756b6b612048757473223b5061796d656e7469647c733a303a22223b6176617461727c733a31383a224c4f474f4235333735373537332e6a706567223b7365617263685f706172616d737c613a313a7b733a31313a226f72646572737461747573223b733a313a2231223b7d),
('pu5ome8dkq4ukpsncvrec74obi4j504c', '::1', 1537940730, 0x5f5f63695f6c6173745f726567656e65726174657c693a313533373934303733303b557365725f69647c733a323a223235223b526f6c655f69647c733a313a2231223b726573745f69647c733a313a2233223b66697273746e616d657c733a333a226f7933223b6c6173746e616d657c733a363a2274726976696e223b656d61696c7c733a31313a226f7965406562732e636f6d223b547970657c733a373a2263756973696e65223b547970655f69647c693a313b63756973696e6541646d696e7c623a313b6d65726368616e745f69647c733a313a2233223b636f6d70616e796e616d657c733a31303a2242756b6b612048757473223b5061796d656e7469647c733a303a22223b6176617461727c733a31383a224c4f474f4235333735373537332e6a706567223b7365617263685f706172616d737c613a313a7b733a31313a226f72646572737461747573223b733a313a2231223b7d),
('f7cm90f2lb16j3499pnfrd66699gfl3v', '::1', 1537941044, 0x5f5f63695f6c6173745f726567656e65726174657c693a313533373934313034343b557365725f69647c733a323a223235223b526f6c655f69647c733a313a2231223b726573745f69647c733a313a2233223b66697273746e616d657c733a333a226f7933223b6c6173746e616d657c733a363a2274726976696e223b656d61696c7c733a31313a226f7965406562732e636f6d223b547970657c733a373a2263756973696e65223b547970655f69647c693a313b63756973696e6541646d696e7c623a313b6d65726368616e745f69647c733a313a2233223b636f6d70616e796e616d657c733a31303a2242756b6b612048757473223b5061796d656e7469647c733a303a22223b6176617461727c733a31383a224c4f474f4235333735373537332e6a706567223b7365617263685f706172616d737c613a313a7b733a31313a226f72646572737461747573223b733a313a2231223b7d),
('eeu5kvptngquk76rtestcqgajpd2qflb', '::1', 1537941183, 0x5f5f63695f6c6173745f726567656e65726174657c693a313533373934313034343b557365725f69647c733a323a223235223b526f6c655f69647c733a313a2231223b726573745f69647c733a313a2233223b66697273746e616d657c733a333a226f7933223b6c6173746e616d657c733a363a2274726976696e223b656d61696c7c733a31313a226f7965406562732e636f6d223b547970657c733a373a2263756973696e65223b547970655f69647c693a313b63756973696e6541646d696e7c623a313b6d65726368616e745f69647c733a313a2233223b636f6d70616e796e616d657c733a31303a2242756b6b612048757473223b5061796d656e7469647c733a303a22223b6176617461727c733a31383a224c4f474f4235333735373537332e6a706567223b7365617263685f706172616d737c613a313a7b733a31313a226f72646572737461747573223b733a313a2231223b7d),
('u3f1b9837qh6sfmlehh3n0i2quhrqcs8', '::1', 1537950904, 0x5f5f63695f6c6173745f726567656e65726174657c693a313533373935303839353b),
('k6973c1ht54phfupvco209285572iv9a', '::1', 1537969546, 0x5f5f63695f6c6173745f726567656e65726174657c693a313533373936393534343b),
('re02an9rkdvc2icgq0hbmctahjb7f97f', '::1', 1537972393, 0x5f5f63695f6c6173745f726567656e65726174657c693a313533373937323339333b),
('clruq5nq6gqtr2i2659qvr10knb820hl', '::1', 1537972736, 0x5f5f63695f6c6173745f726567656e65726174657c693a313533373937323733363b),
('vss2tpnmk0k3mjuvm4muckfl2o2uh38e', '::1', 1537972757, 0x5f5f63695f6c6173745f726567656e65726174657c693a313533373937323733363b),
('e49db673348jh0mudoimorgaksvkeada', '::1', 1537993089, 0x5f5f63695f6c6173745f726567656e65726174657c693a313533373939333034313b),
('5spncqjdlk7qi9cnmle43k1q0hf1jgqe', '::1', 1538208165, 0x5f5f63695f6c6173745f726567656e65726174657c693a313533383230383135333b),
('anaoj88pl2c352bpcuruacnqpl22b9sa', '::1', 1538377399, 0x5f5f63695f6c6173745f726567656e65726174657c693a313533383337373338373b),
('7jf5p8pjj600p1vco81ft15464p2unnv', '::1', 1538377399, 0x5f5f63695f6c6173745f726567656e65726174657c693a313533383337373338373b);

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
  `orderlistdetailsid` int(11) DEFAULT NULL,
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

INSERT INTO `comments` (`id`, `accountid`, `orderlistdetailsid`, `comment`, `admin_read_status`, `status`, `createdat`, `updatedat`, `deletedat`, `isdeleted`) VALUES
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
-- Table structure for table `cuisine_merchant_cate_assign_copy`
--

CREATE TABLE `cuisine_merchant_cate_assign_copy` (
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
-- Dumping data for table `cuisine_merchant_cate_assign_copy`
--

INSERT INTO `cuisine_merchant_cate_assign_copy` (`id`, `cat_cusid`, `restaurantid`, `status`, `createdat`, `updatedat`, `deletedat`, `isdeleted`) VALUES
(1, 30, 18, 1, '2018-05-09 21:08:08', '2018-05-09 21:08:08', '0000-00-00 00:00:00', 0),
(2, 30, 19, 1, '2018-05-09 21:08:08', '2018-05-09 21:08:08', '0000-00-00 00:00:00', 0),
(3, 30, 20, 1, '2018-05-09 21:08:08', '2018-05-09 21:08:08', '0000-00-00 00:00:00', 0),
(4, 6, 20, 1, '2018-05-09 21:08:08', '2018-05-09 21:08:08', '0000-00-00 00:00:00', 0),
(5, 4, 20, 1, '2018-05-09 21:08:08', '2018-05-09 21:08:08', '0000-00-00 00:00:00', 0),
(6, 31, 20, 1, '2018-05-09 21:08:08', '2018-05-09 21:08:08', '0000-00-00 00:00:00', 0),
(7, 14, 21, 1, '2018-05-09 21:08:08', '2018-05-09 21:08:08', '0000-00-00 00:00:00', 0),
(8, 5, 22, 1, '2018-05-09 21:08:08', '2018-05-09 21:08:08', '0000-00-00 00:00:00', 0),
(9, 30, 25, 1, '2018-05-09 21:08:08', '2018-05-09 21:08:08', '0000-00-00 00:00:00', 0),
(10, 30, 26, 1, '2018-05-09 21:08:08', '2018-05-09 21:08:08', '0000-00-00 00:00:00', 0),
(11, 30, 27, 1, '2018-05-09 21:08:08', '2018-05-09 21:08:08', '0000-00-00 00:00:00', 0),
(12, 35, 27, 1, '2018-05-09 21:08:08', '2018-05-09 21:08:08', '0000-00-00 00:00:00', 0),
(13, 6, 29, 1, '2018-05-09 21:08:08', '2018-05-09 21:08:08', '0000-00-00 00:00:00', 0),
(14, 31, 30, 1, '2018-05-09 21:08:08', '2018-05-09 21:08:08', '0000-00-00 00:00:00', 0),
(15, 37, 30, 1, '2018-05-09 21:08:08', '2018-05-09 21:08:08', '0000-00-00 00:00:00', 0),
(16, 14, 31, 1, '2018-05-09 21:08:08', '2018-05-09 21:08:08', '0000-00-00 00:00:00', 0),
(17, 12, 31, 1, '2018-05-09 21:08:08', '2018-05-09 21:08:08', '0000-00-00 00:00:00', 0),
(18, 5, 32, 1, '2018-05-09 21:08:08', '2018-05-09 21:08:08', '0000-00-00 00:00:00', 0),
(19, 14, 32, 1, '2018-05-09 21:08:08', '2018-05-09 21:08:08', '0000-00-00 00:00:00', 0),
(20, 31, 32, 1, '2018-05-09 21:08:08', '2018-05-09 21:08:08', '0000-00-00 00:00:00', 0),
(21, 30, 32, 1, '2018-05-09 21:08:08', '2018-05-09 21:08:08', '0000-00-00 00:00:00', 0),
(22, 35, 34, 1, '2018-05-09 21:08:08', '2018-05-09 21:08:08', '0000-00-00 00:00:00', 0),
(23, 6, 34, 1, '2018-05-09 21:08:08', '2018-05-09 21:08:08', '0000-00-00 00:00:00', 0),
(24, 14, 34, 1, '2018-05-09 21:08:08', '2018-05-09 21:08:08', '0000-00-00 00:00:00', 0),
(25, 30, 34, 1, '2018-05-09 21:08:08', '2018-05-09 21:08:08', '0000-00-00 00:00:00', 0),
(26, 12, 34, 1, '2018-05-09 21:08:08', '2018-05-09 21:08:08', '0000-00-00 00:00:00', 0),
(27, 30, 35, 1, '2018-05-09 21:08:08', '2018-05-09 21:08:08', '0000-00-00 00:00:00', 0),
(28, 6, 36, 1, '2018-05-09 21:08:08', '2018-05-09 21:08:08', '0000-00-00 00:00:00', 0),
(29, 32, 36, 1, '2018-05-09 21:08:08', '2018-05-09 21:08:08', '0000-00-00 00:00:00', 0),
(30, 35, 36, 1, '2018-05-09 21:08:08', '2018-05-09 21:08:08', '0000-00-00 00:00:00', 0),
(31, 5, 36, 1, '2018-05-09 21:08:08', '2018-05-09 21:08:08', '0000-00-00 00:00:00', 0),
(32, 11, 37, 1, '2018-05-09 21:08:08', '2018-05-09 21:08:08', '0000-00-00 00:00:00', 0),
(33, 5, 37, 1, '2018-05-09 21:08:08', '2018-05-09 21:08:08', '0000-00-00 00:00:00', 0),
(34, 19, 37, 1, '2018-05-09 21:08:08', '2018-05-09 21:08:08', '0000-00-00 00:00:00', 0),
(35, 17, 37, 1, '2018-05-09 21:08:08', '2018-05-09 21:08:08', '0000-00-00 00:00:00', 0),
(36, 11, 38, 1, '2018-05-09 21:08:08', '2018-05-09 21:08:08', '0000-00-00 00:00:00', 0),
(37, 32, 38, 1, '2018-05-09 21:08:08', '2018-05-09 21:08:08', '0000-00-00 00:00:00', 0),
(38, 14, 38, 1, '2018-05-09 21:08:08', '2018-05-09 21:08:08', '0000-00-00 00:00:00', 0),
(39, 30, 38, 1, '2018-05-09 21:08:08', '2018-05-09 21:08:08', '0000-00-00 00:00:00', 0),
(40, 18, 38, 1, '2018-05-09 21:08:08', '2018-05-09 21:08:08', '0000-00-00 00:00:00', 0),
(41, 17, 39, 1, '2018-05-09 21:08:08', '2018-05-09 21:08:08', '0000-00-00 00:00:00', 0),
(42, 33, 40, 1, '2018-05-09 21:08:08', '2018-05-09 21:08:08', '0000-00-00 00:00:00', 0),
(43, 18, 41, 1, '2018-05-09 21:08:08', '2018-05-09 21:08:08', '0000-00-00 00:00:00', 0),
(44, 17, 41, 1, '2018-05-09 21:08:08', '2018-05-09 21:08:08', '0000-00-00 00:00:00', 0),
(45, 30, 41, 1, '2018-05-09 21:08:08', '2018-05-09 21:08:08', '0000-00-00 00:00:00', 0),
(46, 16, 41, 1, '2018-05-09 21:08:08', '2018-05-09 21:08:08', '0000-00-00 00:00:00', 0),
(47, 14, 42, 1, '2018-05-09 21:08:08', '2018-05-09 21:08:08', '0000-00-00 00:00:00', 0),
(48, 31, 42, 1, '2018-05-09 21:08:08', '2018-05-09 21:08:08', '0000-00-00 00:00:00', 0),
(49, 32, 42, 1, '2018-05-09 21:08:08', '2018-05-09 21:08:08', '0000-00-00 00:00:00', 0),
(50, 30, 43, 1, '2018-05-09 21:08:08', '2018-05-09 21:08:08', '0000-00-00 00:00:00', 0),
(51, 18, 43, 1, '2018-05-09 21:08:08', '2018-05-09 21:08:08', '0000-00-00 00:00:00', 0),
(52, 30, 44, 1, '2018-05-09 21:08:08', '2018-05-09 21:08:08', '0000-00-00 00:00:00', 0),
(53, 6, 44, 1, '2018-05-09 21:08:08', '2018-05-09 21:08:08', '0000-00-00 00:00:00', 0),
(54, 11, 45, 1, '2018-05-09 21:08:08', '2018-05-09 21:08:08', '0000-00-00 00:00:00', 0),
(55, 16, 45, 1, '2018-05-09 21:08:08', '2018-05-09 21:08:08', '0000-00-00 00:00:00', 0),
(56, 31, 45, 1, '2018-05-09 21:08:08', '2018-05-09 21:08:08', '0000-00-00 00:00:00', 0),
(57, 12, 45, 1, '2018-05-09 21:08:08', '2018-05-09 21:08:08', '0000-00-00 00:00:00', 0),
(58, 26, 45, 1, '2018-05-09 21:08:08', '2018-05-09 21:08:08', '0000-00-00 00:00:00', 0),
(59, 19, 46, 1, '2018-05-09 21:08:08', '2018-05-09 21:08:08', '0000-00-00 00:00:00', 0),
(60, 14, 46, 1, '2018-05-09 21:08:08', '2018-05-09 21:08:08', '0000-00-00 00:00:00', 0),
(61, 37, 46, 1, '2018-05-09 21:08:08', '2018-05-09 21:08:08', '0000-00-00 00:00:00', 0),
(62, 11, 46, 1, '2018-05-09 21:08:08', '2018-05-09 21:08:08', '0000-00-00 00:00:00', 0),
(63, 30, 46, 1, '2018-05-09 21:08:08', '2018-05-09 21:08:08', '0000-00-00 00:00:00', 0),
(64, 16, 46, 1, '2018-05-09 21:08:08', '2018-05-09 21:08:08', '0000-00-00 00:00:00', 0),
(65, 35, 46, 1, '2018-05-09 21:08:08', '2018-05-09 21:08:08', '0000-00-00 00:00:00', 0),
(66, 15, 46, 1, '2018-05-09 21:08:08', '2018-05-09 21:08:08', '0000-00-00 00:00:00', 0),
(67, 31, 46, 1, '2018-05-09 21:08:08', '2018-05-09 21:08:08', '0000-00-00 00:00:00', 0),
(68, 14, 47, 1, '2018-05-09 21:08:08', '2018-05-09 21:08:08', '0000-00-00 00:00:00', 0),
(69, 6, 47, 1, '2018-05-09 21:08:08', '2018-05-09 21:08:08', '0000-00-00 00:00:00', 0),
(70, 11, 47, 1, '2018-05-09 21:08:08', '2018-05-09 21:08:08', '0000-00-00 00:00:00', 0),
(71, 19, 49, 1, '2018-05-09 21:08:08', '2018-05-09 21:08:08', '0000-00-00 00:00:00', 0),
(72, 16, 49, 1, '2018-05-09 21:08:08', '2018-05-09 21:08:08', '0000-00-00 00:00:00', 0),
(73, 6, 49, 1, '2018-05-09 21:08:08', '2018-05-09 21:08:08', '0000-00-00 00:00:00', 0),
(74, 31, 49, 1, '2018-05-09 21:08:08', '2018-05-09 21:08:08', '0000-00-00 00:00:00', 0),
(75, 18, 49, 1, '2018-05-09 21:08:08', '2018-05-09 21:08:08', '0000-00-00 00:00:00', 0),
(76, 32, 49, 1, '2018-05-09 21:08:08', '2018-05-09 21:08:08', '0000-00-00 00:00:00', 0),
(77, 17, 49, 1, '2018-05-09 21:08:08', '2018-05-09 21:08:08', '0000-00-00 00:00:00', 0),
(78, 32, 51, 1, '2018-05-09 21:08:08', '2018-05-09 21:08:08', '0000-00-00 00:00:00', 0),
(79, 12, 51, 1, '2018-05-09 21:08:08', '2018-05-09 21:08:08', '0000-00-00 00:00:00', 0),
(80, 6, 51, 1, '2018-05-09 21:08:08', '2018-05-09 21:08:08', '0000-00-00 00:00:00', 0),
(81, 16, 51, 1, '2018-05-09 21:08:08', '2018-05-09 21:08:08', '0000-00-00 00:00:00', 0),
(82, 30, 51, 1, '2018-05-09 21:08:08', '2018-05-09 21:08:08', '0000-00-00 00:00:00', 0),
(83, 4, 51, 1, '2018-05-09 21:08:08', '2018-05-09 21:08:08', '0000-00-00 00:00:00', 0),
(84, 15, 51, 1, '2018-05-09 21:08:08', '2018-05-09 21:08:08', '0000-00-00 00:00:00', 0),
(85, 5, 51, 1, '2018-05-09 21:08:08', '2018-05-09 21:08:08', '0000-00-00 00:00:00', 0),
(86, 17, 51, 1, '2018-05-09 21:08:08', '2018-05-09 21:08:08', '0000-00-00 00:00:00', 0),
(87, 31, 51, 1, '2018-05-09 21:08:08', '2018-05-09 21:08:08', '0000-00-00 00:00:00', 0),
(88, 14, 51, 1, '2018-05-09 21:08:08', '2018-05-09 21:08:08', '0000-00-00 00:00:00', 0),
(89, 19, 51, 1, '2018-05-09 21:08:08', '2018-05-09 21:08:08', '0000-00-00 00:00:00', 0),
(90, 11, 51, 1, '2018-05-09 21:08:08', '2018-05-09 21:08:08', '0000-00-00 00:00:00', 0),
(91, 18, 52, 1, '2018-05-09 21:08:08', '2018-05-09 21:08:08', '0000-00-00 00:00:00', 0),
(92, 30, 54, 1, '2018-05-09 21:08:08', '2018-05-09 21:08:08', '0000-00-00 00:00:00', 0),
(93, 14, 54, 1, '2018-05-09 21:08:08', '2018-05-09 21:08:08', '0000-00-00 00:00:00', 0),
(94, 4, 55, 1, '2018-05-09 21:08:08', '2018-05-09 21:08:08', '0000-00-00 00:00:00', 0),
(95, 34, 55, 1, '2018-05-09 21:08:08', '2018-05-09 21:08:08', '0000-00-00 00:00:00', 0),
(96, 25, 55, 1, '2018-05-09 21:08:08', '2018-05-09 21:08:08', '0000-00-00 00:00:00', 0),
(97, 6, 56, 1, '2018-05-09 21:08:08', '2018-05-09 21:08:08', '0000-00-00 00:00:00', 0),
(98, 20, 56, 1, '2018-05-09 21:08:08', '2018-05-09 21:08:08', '0000-00-00 00:00:00', 0),
(99, 18, 56, 1, '2018-05-09 21:08:08', '2018-05-09 21:08:08', '0000-00-00 00:00:00', 0),
(100, 33, 56, 1, '2018-05-09 21:08:08', '2018-05-09 21:08:08', '0000-00-00 00:00:00', 0),
(101, 5, 56, 1, '2018-05-09 21:08:08', '2018-05-09 21:08:08', '0000-00-00 00:00:00', 0),
(102, 11, 56, 1, '2018-05-09 21:08:08', '2018-05-09 21:08:08', '0000-00-00 00:00:00', 0),
(103, 32, 56, 1, '2018-05-09 21:08:08', '2018-05-09 21:08:08', '0000-00-00 00:00:00', 0),
(104, 19, 56, 1, '2018-05-09 21:08:08', '2018-05-09 21:08:08', '0000-00-00 00:00:00', 0),
(105, 30, 56, 1, '2018-05-09 21:08:08', '2018-05-09 21:08:08', '0000-00-00 00:00:00', 0),
(106, 30, 57, 1, '2018-05-09 21:08:08', '2018-05-09 21:08:08', '0000-00-00 00:00:00', 0),
(107, 33, 58, 1, '2018-05-09 21:08:08', '2018-05-09 21:08:08', '0000-00-00 00:00:00', 0),
(108, 32, 58, 1, '2018-05-09 21:08:08', '2018-05-09 21:08:08', '0000-00-00 00:00:00', 0),
(109, 6, 58, 1, '2018-05-09 21:08:08', '2018-05-09 21:08:08', '0000-00-00 00:00:00', 0),
(110, 14, 61, 1, '2018-05-09 21:08:08', '2018-05-09 21:08:08', '0000-00-00 00:00:00', 0),
(111, 31, 61, 1, '2018-05-09 21:08:08', '2018-05-09 21:08:08', '0000-00-00 00:00:00', 0),
(112, 28, 62, 1, '2018-05-09 21:08:08', '2018-05-09 21:08:08', '0000-00-00 00:00:00', 0),
(113, 31, 62, 1, '2018-05-09 21:08:08', '2018-05-09 21:08:08', '0000-00-00 00:00:00', 0),
(114, 30, 64, 1, '2018-05-09 21:08:08', '2018-05-09 21:08:08', '0000-00-00 00:00:00', 0),
(115, 14, 64, 1, '2018-05-09 21:08:08', '2018-05-09 21:08:08', '0000-00-00 00:00:00', 0),
(116, 33, 64, 1, '2018-05-09 21:08:08', '2018-05-09 21:08:08', '0000-00-00 00:00:00', 0),
(117, 35, 65, 1, '2018-05-09 21:08:08', '2018-05-09 21:08:08', '0000-00-00 00:00:00', 0),
(118, 33, 66, 1, '2018-05-09 21:08:08', '2018-05-09 21:08:08', '0000-00-00 00:00:00', 0),
(119, 5, 66, 1, '2018-05-09 21:08:08', '2018-05-09 21:08:08', '0000-00-00 00:00:00', 0),
(120, 37, 66, 1, '2018-05-09 21:08:08', '2018-05-09 21:08:08', '0000-00-00 00:00:00', 0),
(121, 16, 66, 1, '2018-05-09 21:08:08', '2018-05-09 21:08:08', '0000-00-00 00:00:00', 0),
(122, 30, 66, 1, '2018-05-09 21:08:08', '2018-05-09 21:08:08', '0000-00-00 00:00:00', 0),
(123, 14, 66, 1, '2018-05-09 21:08:08', '2018-05-09 21:08:08', '0000-00-00 00:00:00', 0),
(124, 36, 66, 1, '2018-05-09 21:08:08', '2018-05-09 21:08:08', '0000-00-00 00:00:00', 0),
(125, 35, 66, 1, '2018-05-09 21:08:08', '2018-05-09 21:08:08', '0000-00-00 00:00:00', 0),
(126, 24, 67, 1, '2018-05-09 21:08:08', '2018-05-09 21:08:08', '0000-00-00 00:00:00', 0),
(127, 6, 67, 1, '2018-05-09 21:08:08', '2018-05-09 21:08:08', '0000-00-00 00:00:00', 0),
(128, 33, 67, 1, '2018-05-09 21:08:08', '2018-05-09 21:08:08', '0000-00-00 00:00:00', 0),
(129, 14, 68, 1, '2018-05-09 21:08:08', '2018-05-09 21:08:08', '0000-00-00 00:00:00', 0),
(130, 37, 68, 1, '2018-05-09 21:08:08', '2018-05-09 21:08:08', '0000-00-00 00:00:00', 0),
(131, 30, 68, 1, '2018-05-09 21:08:08', '2018-05-09 21:08:08', '0000-00-00 00:00:00', 0),
(132, 17, 68, 1, '2018-05-09 21:08:08', '2018-05-09 21:08:08', '0000-00-00 00:00:00', 0),
(133, 33, 68, 1, '2018-05-09 21:08:08', '2018-05-09 21:08:08', '0000-00-00 00:00:00', 0),
(134, 30, 70, 1, '2018-05-09 21:08:08', '2018-05-09 21:08:08', '0000-00-00 00:00:00', 0),
(135, 30, 71, 1, '2018-05-09 21:08:08', '2018-05-09 21:08:08', '0000-00-00 00:00:00', 0),
(136, 36, 72, 1, '2018-05-09 21:08:08', '2018-05-09 21:08:08', '0000-00-00 00:00:00', 0),
(137, 27, 72, 1, '2018-05-09 21:08:08', '2018-05-09 21:08:08', '0000-00-00 00:00:00', 0),
(138, 30, 73, 1, '2018-05-09 21:08:08', '2018-05-09 21:08:08', '0000-00-00 00:00:00', 0),
(139, 14, 73, 1, '2018-05-09 21:08:08', '2018-05-09 21:08:08', '0000-00-00 00:00:00', 0),
(140, 35, 73, 1, '2018-05-09 21:08:08', '2018-05-09 21:08:08', '0000-00-00 00:00:00', 0),
(141, 33, 73, 1, '2018-05-09 21:08:08', '2018-05-09 21:08:08', '0000-00-00 00:00:00', 0),
(142, 6, 73, 1, '2018-05-09 21:08:08', '2018-05-09 21:08:08', '0000-00-00 00:00:00', 0),
(143, 37, 73, 1, '2018-05-09 21:08:08', '2018-05-09 21:08:08', '0000-00-00 00:00:00', 0),
(144, 4, 73, 1, '2018-05-09 21:08:08', '2018-05-09 21:08:08', '0000-00-00 00:00:00', 0),
(145, 13, 74, 1, '2018-05-09 21:08:08', '2018-05-09 21:08:08', '0000-00-00 00:00:00', 0),
(146, 12, 74, 1, '2018-05-09 21:08:08', '2018-05-09 21:08:08', '0000-00-00 00:00:00', 0),
(147, 30, 76, 1, '2018-05-09 21:08:08', '2018-05-09 21:08:08', '0000-00-00 00:00:00', 0),
(148, 34, 78, 1, '2018-05-09 21:08:08', '2018-05-09 21:08:08', '0000-00-00 00:00:00', 0),
(149, 4, 79, 1, '2018-05-09 21:08:08', '2018-05-09 21:08:08', '0000-00-00 00:00:00', 0),
(150, 5, 81, 1, '2018-05-09 21:08:08', '2018-05-09 21:08:08', '0000-00-00 00:00:00', 0),
(151, 4, 81, 1, '2018-05-09 21:08:08', '2018-05-09 21:08:08', '0000-00-00 00:00:00', 0),
(152, 30, 81, 1, '2018-05-09 21:08:08', '2018-05-09 21:08:08', '0000-00-00 00:00:00', 0),
(153, 19, 81, 1, '2018-05-09 21:08:08', '2018-05-09 21:08:08', '0000-00-00 00:00:00', 0),
(154, 11, 81, 1, '2018-05-09 21:08:08', '2018-05-09 21:08:08', '0000-00-00 00:00:00', 0),
(155, 21, 81, 1, '2018-05-09 21:08:08', '2018-05-09 21:08:08', '0000-00-00 00:00:00', 0),
(156, 6, 81, 1, '2018-05-09 21:08:08', '2018-05-09 21:08:08', '0000-00-00 00:00:00', 0),
(157, 14, 81, 1, '2018-05-09 21:08:08', '2018-05-09 21:08:08', '0000-00-00 00:00:00', 0),
(158, 20, 81, 1, '2018-05-09 21:08:08', '2018-05-09 21:08:08', '0000-00-00 00:00:00', 0),
(159, 18, 81, 1, '2018-05-09 21:08:08', '2018-05-09 21:08:08', '0000-00-00 00:00:00', 0),
(160, 32, 81, 1, '2018-05-09 21:08:08', '2018-05-09 21:08:08', '0000-00-00 00:00:00', 0),
(161, 5, 82, 1, '2018-05-09 21:08:08', '2018-05-09 21:08:08', '0000-00-00 00:00:00', 0),
(162, 18, 82, 1, '2018-05-09 21:08:08', '2018-05-09 21:08:08', '0000-00-00 00:00:00', 0),
(163, 17, 82, 1, '2018-05-09 21:08:08', '2018-05-09 21:08:08', '0000-00-00 00:00:00', 0),
(164, 31, 83, 1, '2018-05-09 21:08:08', '2018-05-09 21:08:08', '0000-00-00 00:00:00', 0),
(165, 16, 83, 1, '2018-05-09 21:08:08', '2018-05-09 21:08:08', '0000-00-00 00:00:00', 0),
(166, 30, 84, 1, '2018-05-09 21:08:08', '2018-05-09 21:08:08', '0000-00-00 00:00:00', 0),
(167, 30, 85, 1, '2018-05-09 21:08:08', '2018-05-09 21:08:08', '0000-00-00 00:00:00', 0),
(168, 14, 86, 1, '2018-05-09 21:08:08', '2018-05-09 21:08:08', '0000-00-00 00:00:00', 0),
(169, 4, 86, 1, '2018-05-09 21:08:08', '2018-05-09 21:08:08', '0000-00-00 00:00:00', 0),
(170, 5, 86, 1, '2018-05-09 21:08:08', '2018-05-09 21:08:08', '0000-00-00 00:00:00', 0),
(171, 11, 86, 1, '2018-05-09 21:08:08', '2018-05-09 21:08:08', '0000-00-00 00:00:00', 0),
(172, 6, 86, 1, '2018-05-09 21:08:08', '2018-05-09 21:08:08', '0000-00-00 00:00:00', 0),
(173, 16, 86, 1, '2018-05-09 21:08:08', '2018-05-09 21:08:08', '0000-00-00 00:00:00', 0),
(174, 18, 86, 1, '2018-05-09 21:08:08', '2018-05-09 21:08:08', '0000-00-00 00:00:00', 0),
(175, 30, 87, 1, '2018-05-09 21:08:08', '2018-05-09 21:08:08', '0000-00-00 00:00:00', 0),
(176, 6, 91, 1, '2018-05-09 21:08:08', '2018-05-09 21:08:08', '0000-00-00 00:00:00', 0),
(177, 14, 92, 1, '2018-05-09 21:08:08', '2018-05-09 21:08:08', '0000-00-00 00:00:00', 0),
(178, 31, 92, 1, '2018-05-09 21:08:08', '2018-05-09 21:08:08', '0000-00-00 00:00:00', 0),
(179, 12, 92, 1, '2018-05-09 21:08:08', '2018-05-09 21:08:08', '0000-00-00 00:00:00', 0),
(180, 35, 92, 1, '2018-05-09 21:08:08', '2018-05-09 21:08:08', '0000-00-00 00:00:00', 0),
(181, 16, 92, 1, '2018-05-09 21:08:08', '2018-05-09 21:08:08', '0000-00-00 00:00:00', 0),
(182, 14, 93, 1, '2018-05-09 21:08:08', '2018-05-09 21:08:08', '0000-00-00 00:00:00', 0),
(183, 24, 93, 1, '2018-05-09 21:08:08', '2018-05-09 21:08:08', '0000-00-00 00:00:00', 0),
(184, 4, 93, 1, '2018-05-09 21:08:08', '2018-05-09 21:08:08', '0000-00-00 00:00:00', 0),
(185, 28, 93, 1, '2018-05-09 21:08:08', '2018-05-09 21:08:08', '0000-00-00 00:00:00', 0),
(186, 20, 93, 1, '2018-05-09 21:08:08', '2018-05-09 21:08:08', '0000-00-00 00:00:00', 0),
(187, 32, 93, 1, '2018-05-09 21:08:08', '2018-05-09 21:08:08', '0000-00-00 00:00:00', 0),
(188, 11, 93, 1, '2018-05-09 21:08:08', '2018-05-09 21:08:08', '0000-00-00 00:00:00', 0),
(189, 26, 93, 1, '2018-05-09 21:08:08', '2018-05-09 21:08:08', '0000-00-00 00:00:00', 0),
(190, 5, 93, 1, '2018-05-09 21:08:08', '2018-05-09 21:08:08', '0000-00-00 00:00:00', 0),
(191, 30, 93, 1, '2018-05-09 21:08:08', '2018-05-09 21:08:08', '0000-00-00 00:00:00', 0),
(192, 16, 93, 1, '2018-05-09 21:08:08', '2018-05-09 21:08:08', '0000-00-00 00:00:00', 0),
(193, 25, 93, 1, '2018-05-09 21:08:08', '2018-05-09 21:08:08', '0000-00-00 00:00:00', 0),
(194, 6, 93, 1, '2018-05-09 21:08:08', '2018-05-09 21:08:08', '0000-00-00 00:00:00', 0),
(195, 29, 93, 1, '2018-05-09 21:08:08', '2018-05-09 21:08:08', '0000-00-00 00:00:00', 0),
(196, 18, 95, 1, '2018-05-09 21:08:08', '2018-05-09 21:08:08', '0000-00-00 00:00:00', 0),
(197, 16, 95, 1, '2018-05-09 21:08:08', '2018-05-09 21:08:08', '0000-00-00 00:00:00', 0),
(198, 35, 95, 1, '2018-05-09 21:08:08', '2018-05-09 21:08:08', '0000-00-00 00:00:00', 0),
(199, 14, 96, 1, '2018-05-09 21:08:08', '2018-05-09 21:08:08', '0000-00-00 00:00:00', 0),
(200, 32, 96, 1, '2018-05-09 21:08:08', '2018-05-09 21:08:08', '0000-00-00 00:00:00', 0),
(201, 5, 96, 1, '2018-05-09 21:08:08', '2018-05-09 21:08:08', '0000-00-00 00:00:00', 0),
(202, 36, 96, 1, '2018-05-09 21:08:08', '2018-05-09 21:08:08', '0000-00-00 00:00:00', 0),
(203, 30, 96, 1, '2018-05-09 21:08:08', '2018-05-09 21:08:08', '0000-00-00 00:00:00', 0),
(204, 4, 96, 1, '2018-05-09 21:08:08', '2018-05-09 21:08:08', '0000-00-00 00:00:00', 0),
(205, 31, 96, 1, '2018-05-09 21:08:08', '2018-05-09 21:08:08', '0000-00-00 00:00:00', 0),
(206, 26, 96, 1, '2018-05-09 21:08:08', '2018-05-09 21:08:08', '0000-00-00 00:00:00', 0),
(207, 16, 96, 1, '2018-05-09 21:08:08', '2018-05-09 21:08:08', '0000-00-00 00:00:00', 0),
(208, 37, 96, 1, '2018-05-09 21:08:08', '2018-05-09 21:08:08', '0000-00-00 00:00:00', 0),
(209, 35, 96, 1, '2018-05-09 21:08:08', '2018-05-09 21:08:08', '0000-00-00 00:00:00', 0),
(210, 32, 97, 1, '2018-05-09 21:08:08', '2018-05-09 21:08:08', '0000-00-00 00:00:00', 0),
(211, 30, 98, 1, '2018-05-09 21:08:08', '2018-05-09 21:08:08', '0000-00-00 00:00:00', 0),
(212, 14, 98, 1, '2018-05-09 21:08:08', '2018-05-09 21:08:08', '0000-00-00 00:00:00', 0),
(213, 33, 98, 1, '2018-05-09 21:08:08', '2018-05-09 21:08:08', '0000-00-00 00:00:00', 0),
(214, 32, 98, 1, '2018-05-09 21:08:08', '2018-05-09 21:08:08', '0000-00-00 00:00:00', 0),
(215, 33, 80, 1, '2018-05-09 21:08:08', '2018-05-09 21:08:08', '0000-00-00 00:00:00', 0),
(216, 30, 50, 1, '2018-05-09 21:08:08', '2018-05-09 21:08:08', '0000-00-00 00:00:00', 0),
(217, 30, 18, 1, '2018-05-14 23:51:54', '2018-05-14 23:51:54', '0000-00-00 00:00:00', 0),
(218, 30, 19, 1, '2018-05-14 23:51:54', '2018-05-14 23:51:54', '0000-00-00 00:00:00', 0),
(219, 30, 20, 1, '2018-05-14 23:51:54', '2018-05-14 23:51:54', '0000-00-00 00:00:00', 0),
(220, 6, 20, 1, '2018-05-14 23:51:54', '2018-05-14 23:51:54', '0000-00-00 00:00:00', 0),
(221, 4, 20, 1, '2018-05-14 23:51:54', '2018-05-14 23:51:54', '0000-00-00 00:00:00', 0),
(222, 31, 20, 1, '2018-05-14 23:51:54', '2018-05-14 23:51:54', '0000-00-00 00:00:00', 0),
(223, 14, 21, 1, '2018-05-14 23:51:54', '2018-05-14 23:51:54', '0000-00-00 00:00:00', 0),
(224, 5, 22, 1, '2018-05-14 23:51:54', '2018-05-14 23:51:54', '0000-00-00 00:00:00', 0),
(225, 30, 25, 1, '2018-05-14 23:51:54', '2018-05-14 23:51:54', '0000-00-00 00:00:00', 0),
(226, 30, 26, 1, '2018-05-14 23:51:54', '2018-05-14 23:51:54', '0000-00-00 00:00:00', 0),
(227, 30, 27, 1, '2018-05-14 23:51:54', '2018-05-14 23:51:54', '0000-00-00 00:00:00', 0),
(228, 35, 27, 1, '2018-05-14 23:51:54', '2018-05-14 23:51:54', '0000-00-00 00:00:00', 0),
(229, 6, 29, 1, '2018-05-14 23:51:54', '2018-05-14 23:51:54', '0000-00-00 00:00:00', 0),
(230, 31, 30, 1, '2018-05-14 23:51:54', '2018-05-14 23:51:54', '0000-00-00 00:00:00', 0),
(231, 37, 30, 1, '2018-05-14 23:51:54', '2018-05-14 23:51:54', '0000-00-00 00:00:00', 0),
(232, 14, 31, 1, '2018-05-14 23:51:54', '2018-05-14 23:51:54', '0000-00-00 00:00:00', 0),
(233, 12, 31, 1, '2018-05-14 23:51:54', '2018-05-14 23:51:54', '0000-00-00 00:00:00', 0),
(234, 5, 32, 1, '2018-05-14 23:51:54', '2018-05-14 23:51:54', '0000-00-00 00:00:00', 0),
(235, 14, 32, 1, '2018-05-14 23:51:54', '2018-05-14 23:51:54', '0000-00-00 00:00:00', 0),
(236, 31, 32, 1, '2018-05-14 23:51:54', '2018-05-14 23:51:54', '0000-00-00 00:00:00', 0),
(237, 30, 32, 1, '2018-05-14 23:51:54', '2018-05-14 23:51:54', '0000-00-00 00:00:00', 0),
(238, 35, 34, 1, '2018-05-14 23:51:54', '2018-05-14 23:51:54', '0000-00-00 00:00:00', 0),
(239, 6, 34, 1, '2018-05-14 23:51:54', '2018-05-14 23:51:54', '0000-00-00 00:00:00', 0),
(240, 14, 34, 1, '2018-05-14 23:51:54', '2018-05-14 23:51:54', '0000-00-00 00:00:00', 0),
(241, 30, 34, 1, '2018-05-14 23:51:54', '2018-05-14 23:51:54', '0000-00-00 00:00:00', 0),
(242, 12, 34, 1, '2018-05-14 23:51:54', '2018-05-14 23:51:54', '0000-00-00 00:00:00', 0),
(243, 30, 35, 1, '2018-05-14 23:51:54', '2018-05-14 23:51:54', '0000-00-00 00:00:00', 0),
(244, 6, 36, 1, '2018-05-14 23:51:54', '2018-05-14 23:51:54', '0000-00-00 00:00:00', 0),
(245, 32, 36, 1, '2018-05-14 23:51:54', '2018-05-14 23:51:54', '0000-00-00 00:00:00', 0),
(246, 35, 36, 1, '2018-05-14 23:51:54', '2018-05-14 23:51:54', '0000-00-00 00:00:00', 0),
(247, 5, 36, 1, '2018-05-14 23:51:54', '2018-05-14 23:51:54', '0000-00-00 00:00:00', 0),
(248, 11, 37, 1, '2018-05-14 23:51:54', '2018-05-14 23:51:54', '0000-00-00 00:00:00', 0),
(249, 5, 37, 1, '2018-05-14 23:51:54', '2018-05-14 23:51:54', '0000-00-00 00:00:00', 0),
(250, 19, 37, 1, '2018-05-14 23:51:54', '2018-05-14 23:51:54', '0000-00-00 00:00:00', 0),
(251, 17, 37, 1, '2018-05-14 23:51:54', '2018-05-14 23:51:54', '0000-00-00 00:00:00', 0),
(252, 11, 38, 1, '2018-05-14 23:51:54', '2018-05-14 23:51:54', '0000-00-00 00:00:00', 0),
(253, 32, 38, 1, '2018-05-14 23:51:54', '2018-05-14 23:51:54', '0000-00-00 00:00:00', 0),
(254, 14, 38, 1, '2018-05-14 23:51:54', '2018-05-14 23:51:54', '0000-00-00 00:00:00', 0),
(255, 30, 38, 1, '2018-05-14 23:51:54', '2018-05-14 23:51:54', '0000-00-00 00:00:00', 0),
(256, 18, 38, 1, '2018-05-14 23:51:54', '2018-05-14 23:51:54', '0000-00-00 00:00:00', 0),
(257, 17, 39, 1, '2018-05-14 23:51:54', '2018-05-14 23:51:54', '0000-00-00 00:00:00', 0),
(258, 33, 40, 1, '2018-05-14 23:51:54', '2018-05-14 23:51:54', '0000-00-00 00:00:00', 0),
(259, 18, 41, 1, '2018-05-14 23:51:54', '2018-05-14 23:51:54', '0000-00-00 00:00:00', 0),
(260, 17, 41, 1, '2018-05-14 23:51:54', '2018-05-14 23:51:54', '0000-00-00 00:00:00', 0),
(261, 30, 41, 1, '2018-05-14 23:51:54', '2018-05-14 23:51:54', '0000-00-00 00:00:00', 0),
(262, 16, 41, 1, '2018-05-14 23:51:54', '2018-05-14 23:51:54', '0000-00-00 00:00:00', 0),
(263, 14, 42, 1, '2018-05-14 23:51:54', '2018-05-14 23:51:54', '0000-00-00 00:00:00', 0),
(264, 31, 42, 1, '2018-05-14 23:51:54', '2018-05-14 23:51:54', '0000-00-00 00:00:00', 0),
(265, 32, 42, 1, '2018-05-14 23:51:54', '2018-05-14 23:51:54', '0000-00-00 00:00:00', 0),
(266, 30, 43, 1, '2018-05-14 23:51:54', '2018-05-14 23:51:54', '0000-00-00 00:00:00', 0),
(267, 18, 43, 1, '2018-05-14 23:51:54', '2018-05-14 23:51:54', '0000-00-00 00:00:00', 0),
(268, 30, 44, 1, '2018-05-14 23:51:54', '2018-05-14 23:51:54', '0000-00-00 00:00:00', 0),
(269, 6, 44, 1, '2018-05-14 23:51:54', '2018-05-14 23:51:54', '0000-00-00 00:00:00', 0),
(270, 11, 45, 1, '2018-05-14 23:51:54', '2018-05-14 23:51:54', '0000-00-00 00:00:00', 0),
(271, 16, 45, 1, '2018-05-14 23:51:54', '2018-05-14 23:51:54', '0000-00-00 00:00:00', 0),
(272, 31, 45, 1, '2018-05-14 23:51:54', '2018-05-14 23:51:54', '0000-00-00 00:00:00', 0),
(273, 12, 45, 1, '2018-05-14 23:51:54', '2018-05-14 23:51:54', '0000-00-00 00:00:00', 0),
(274, 26, 45, 1, '2018-05-14 23:51:54', '2018-05-14 23:51:54', '0000-00-00 00:00:00', 0),
(275, 19, 46, 1, '2018-05-14 23:51:54', '2018-05-14 23:51:54', '0000-00-00 00:00:00', 0),
(276, 14, 46, 1, '2018-05-14 23:51:54', '2018-05-14 23:51:54', '0000-00-00 00:00:00', 0),
(277, 37, 46, 1, '2018-05-14 23:51:54', '2018-05-14 23:51:54', '0000-00-00 00:00:00', 0),
(278, 11, 46, 1, '2018-05-14 23:51:54', '2018-05-14 23:51:54', '0000-00-00 00:00:00', 0),
(279, 30, 46, 1, '2018-05-14 23:51:54', '2018-05-14 23:51:54', '0000-00-00 00:00:00', 0),
(280, 16, 46, 1, '2018-05-14 23:51:54', '2018-05-14 23:51:54', '0000-00-00 00:00:00', 0),
(281, 35, 46, 1, '2018-05-14 23:51:54', '2018-05-14 23:51:54', '0000-00-00 00:00:00', 0),
(282, 15, 46, 1, '2018-05-14 23:51:54', '2018-05-14 23:51:54', '0000-00-00 00:00:00', 0),
(283, 31, 46, 1, '2018-05-14 23:51:54', '2018-05-14 23:51:54', '0000-00-00 00:00:00', 0),
(284, 14, 47, 1, '2018-05-14 23:51:54', '2018-05-14 23:51:54', '0000-00-00 00:00:00', 0),
(285, 6, 47, 1, '2018-05-14 23:51:54', '2018-05-14 23:51:54', '0000-00-00 00:00:00', 0),
(286, 11, 47, 1, '2018-05-14 23:51:54', '2018-05-14 23:51:54', '0000-00-00 00:00:00', 0),
(287, 19, 49, 1, '2018-05-14 23:51:54', '2018-05-14 23:51:54', '0000-00-00 00:00:00', 0),
(288, 16, 49, 1, '2018-05-14 23:51:54', '2018-05-14 23:51:54', '0000-00-00 00:00:00', 0),
(289, 6, 49, 1, '2018-05-14 23:51:54', '2018-05-14 23:51:54', '0000-00-00 00:00:00', 0),
(290, 31, 49, 1, '2018-05-14 23:51:54', '2018-05-14 23:51:54', '0000-00-00 00:00:00', 0),
(291, 18, 49, 1, '2018-05-14 23:51:54', '2018-05-14 23:51:54', '0000-00-00 00:00:00', 0),
(292, 32, 49, 1, '2018-05-14 23:51:54', '2018-05-14 23:51:54', '0000-00-00 00:00:00', 0),
(293, 17, 49, 1, '2018-05-14 23:51:54', '2018-05-14 23:51:54', '0000-00-00 00:00:00', 0),
(294, 32, 51, 1, '2018-05-14 23:51:54', '2018-05-14 23:51:54', '0000-00-00 00:00:00', 0),
(295, 12, 51, 1, '2018-05-14 23:51:54', '2018-05-14 23:51:54', '0000-00-00 00:00:00', 0),
(296, 6, 51, 1, '2018-05-14 23:51:54', '2018-05-14 23:51:54', '0000-00-00 00:00:00', 0),
(297, 16, 51, 1, '2018-05-14 23:51:54', '2018-05-14 23:51:54', '0000-00-00 00:00:00', 0),
(298, 30, 51, 1, '2018-05-14 23:51:54', '2018-05-14 23:51:54', '0000-00-00 00:00:00', 0),
(299, 4, 51, 1, '2018-05-14 23:51:54', '2018-05-14 23:51:54', '0000-00-00 00:00:00', 0),
(300, 15, 51, 1, '2018-05-14 23:51:54', '2018-05-14 23:51:54', '0000-00-00 00:00:00', 0),
(301, 5, 51, 1, '2018-05-14 23:51:54', '2018-05-14 23:51:54', '0000-00-00 00:00:00', 0),
(302, 17, 51, 1, '2018-05-14 23:51:54', '2018-05-14 23:51:54', '0000-00-00 00:00:00', 0),
(303, 31, 51, 1, '2018-05-14 23:51:54', '2018-05-14 23:51:54', '0000-00-00 00:00:00', 0),
(304, 14, 51, 1, '2018-05-14 23:51:54', '2018-05-14 23:51:54', '0000-00-00 00:00:00', 0),
(305, 19, 51, 1, '2018-05-14 23:51:54', '2018-05-14 23:51:54', '0000-00-00 00:00:00', 0),
(306, 11, 51, 1, '2018-05-14 23:51:54', '2018-05-14 23:51:54', '0000-00-00 00:00:00', 0),
(307, 18, 52, 1, '2018-05-14 23:51:54', '2018-05-14 23:51:54', '0000-00-00 00:00:00', 0),
(308, 30, 54, 1, '2018-05-14 23:51:54', '2018-05-14 23:51:54', '0000-00-00 00:00:00', 0),
(309, 14, 54, 1, '2018-05-14 23:51:54', '2018-05-14 23:51:54', '0000-00-00 00:00:00', 0),
(310, 4, 55, 1, '2018-05-14 23:51:54', '2018-05-14 23:51:54', '0000-00-00 00:00:00', 0),
(311, 34, 55, 1, '2018-05-14 23:51:54', '2018-05-14 23:51:54', '0000-00-00 00:00:00', 0),
(312, 25, 55, 1, '2018-05-14 23:51:54', '2018-05-14 23:51:54', '0000-00-00 00:00:00', 0),
(313, 6, 56, 1, '2018-05-14 23:51:54', '2018-05-14 23:51:54', '0000-00-00 00:00:00', 0),
(314, 20, 56, 1, '2018-05-14 23:51:54', '2018-05-14 23:51:54', '0000-00-00 00:00:00', 0),
(315, 18, 56, 1, '2018-05-14 23:51:54', '2018-05-14 23:51:54', '0000-00-00 00:00:00', 0),
(316, 33, 56, 1, '2018-05-14 23:51:54', '2018-05-14 23:51:54', '0000-00-00 00:00:00', 0),
(317, 5, 56, 1, '2018-05-14 23:51:54', '2018-05-14 23:51:54', '0000-00-00 00:00:00', 0),
(318, 11, 56, 1, '2018-05-14 23:51:54', '2018-05-14 23:51:54', '0000-00-00 00:00:00', 0),
(319, 32, 56, 1, '2018-05-14 23:51:54', '2018-05-14 23:51:54', '0000-00-00 00:00:00', 0),
(320, 19, 56, 1, '2018-05-14 23:51:54', '2018-05-14 23:51:54', '0000-00-00 00:00:00', 0),
(321, 30, 56, 1, '2018-05-14 23:51:54', '2018-05-14 23:51:54', '0000-00-00 00:00:00', 0),
(322, 30, 57, 1, '2018-05-14 23:51:54', '2018-05-14 23:51:54', '0000-00-00 00:00:00', 0),
(323, 33, 58, 1, '2018-05-14 23:51:54', '2018-05-14 23:51:54', '0000-00-00 00:00:00', 0),
(324, 32, 58, 1, '2018-05-14 23:51:54', '2018-05-14 23:51:54', '0000-00-00 00:00:00', 0),
(325, 6, 58, 1, '2018-05-14 23:51:54', '2018-05-14 23:51:54', '0000-00-00 00:00:00', 0),
(326, 14, 61, 1, '2018-05-14 23:51:54', '2018-05-14 23:51:54', '0000-00-00 00:00:00', 0),
(327, 31, 61, 1, '2018-05-14 23:51:54', '2018-05-14 23:51:54', '0000-00-00 00:00:00', 0),
(328, 28, 62, 1, '2018-05-14 23:51:54', '2018-05-14 23:51:54', '0000-00-00 00:00:00', 0),
(329, 31, 62, 1, '2018-05-14 23:51:54', '2018-05-14 23:51:54', '0000-00-00 00:00:00', 0),
(330, 30, 64, 1, '2018-05-14 23:51:54', '2018-05-14 23:51:54', '0000-00-00 00:00:00', 0),
(331, 14, 64, 1, '2018-05-14 23:51:54', '2018-05-14 23:51:54', '0000-00-00 00:00:00', 0),
(332, 33, 64, 1, '2018-05-14 23:51:54', '2018-05-14 23:51:54', '0000-00-00 00:00:00', 0),
(333, 35, 65, 1, '2018-05-14 23:51:54', '2018-05-14 23:51:54', '0000-00-00 00:00:00', 0),
(334, 33, 66, 1, '2018-05-14 23:51:54', '2018-05-14 23:51:54', '0000-00-00 00:00:00', 0),
(335, 5, 66, 1, '2018-05-14 23:51:54', '2018-05-14 23:51:54', '0000-00-00 00:00:00', 0),
(336, 37, 66, 1, '2018-05-14 23:51:54', '2018-05-14 23:51:54', '0000-00-00 00:00:00', 0),
(337, 16, 66, 1, '2018-05-14 23:51:54', '2018-05-14 23:51:54', '0000-00-00 00:00:00', 0),
(338, 30, 66, 1, '2018-05-14 23:51:54', '2018-05-14 23:51:54', '0000-00-00 00:00:00', 0),
(339, 14, 66, 1, '2018-05-14 23:51:54', '2018-05-14 23:51:54', '0000-00-00 00:00:00', 0),
(340, 36, 66, 1, '2018-05-14 23:51:54', '2018-05-14 23:51:54', '0000-00-00 00:00:00', 0),
(341, 35, 66, 1, '2018-05-14 23:51:54', '2018-05-14 23:51:54', '0000-00-00 00:00:00', 0),
(342, 24, 67, 1, '2018-05-14 23:51:54', '2018-05-14 23:51:54', '0000-00-00 00:00:00', 0),
(343, 6, 67, 1, '2018-05-14 23:51:54', '2018-05-14 23:51:54', '0000-00-00 00:00:00', 0),
(344, 33, 67, 1, '2018-05-14 23:51:54', '2018-05-14 23:51:54', '0000-00-00 00:00:00', 0),
(345, 14, 68, 1, '2018-05-14 23:51:54', '2018-05-14 23:51:54', '0000-00-00 00:00:00', 0),
(346, 37, 68, 1, '2018-05-14 23:51:54', '2018-05-14 23:51:54', '0000-00-00 00:00:00', 0),
(347, 30, 68, 1, '2018-05-14 23:51:54', '2018-05-14 23:51:54', '0000-00-00 00:00:00', 0),
(348, 17, 68, 1, '2018-05-14 23:51:54', '2018-05-14 23:51:54', '0000-00-00 00:00:00', 0),
(349, 33, 68, 1, '2018-05-14 23:51:54', '2018-05-14 23:51:54', '0000-00-00 00:00:00', 0),
(350, 30, 70, 1, '2018-05-14 23:51:54', '2018-05-14 23:51:54', '0000-00-00 00:00:00', 0),
(351, 30, 71, 1, '2018-05-14 23:51:54', '2018-05-14 23:51:54', '0000-00-00 00:00:00', 0),
(352, 36, 72, 1, '2018-05-14 23:51:54', '2018-05-14 23:51:54', '0000-00-00 00:00:00', 0),
(353, 27, 72, 1, '2018-05-14 23:51:54', '2018-05-14 23:51:54', '0000-00-00 00:00:00', 0),
(354, 30, 73, 1, '2018-05-14 23:51:54', '2018-05-14 23:51:54', '0000-00-00 00:00:00', 0),
(355, 14, 73, 1, '2018-05-14 23:51:54', '2018-05-14 23:51:54', '0000-00-00 00:00:00', 0),
(356, 35, 73, 1, '2018-05-14 23:51:54', '2018-05-14 23:51:54', '0000-00-00 00:00:00', 0),
(357, 33, 73, 1, '2018-05-14 23:51:54', '2018-05-14 23:51:54', '0000-00-00 00:00:00', 0),
(358, 6, 73, 1, '2018-05-14 23:51:54', '2018-05-14 23:51:54', '0000-00-00 00:00:00', 0),
(359, 37, 73, 1, '2018-05-14 23:51:54', '2018-05-14 23:51:54', '0000-00-00 00:00:00', 0),
(360, 4, 73, 1, '2018-05-14 23:51:54', '2018-05-14 23:51:54', '0000-00-00 00:00:00', 0),
(361, 13, 74, 1, '2018-05-14 23:51:54', '2018-05-14 23:51:54', '0000-00-00 00:00:00', 0),
(362, 12, 74, 1, '2018-05-14 23:51:54', '2018-05-14 23:51:54', '0000-00-00 00:00:00', 0),
(363, 30, 76, 1, '2018-05-14 23:51:54', '2018-05-14 23:51:54', '0000-00-00 00:00:00', 0),
(364, 34, 78, 1, '2018-05-14 23:51:54', '2018-05-14 23:51:54', '0000-00-00 00:00:00', 0),
(365, 4, 79, 1, '2018-05-14 23:51:54', '2018-05-14 23:51:54', '0000-00-00 00:00:00', 0),
(366, 5, 81, 1, '2018-05-14 23:51:54', '2018-05-14 23:51:54', '0000-00-00 00:00:00', 0),
(367, 4, 81, 1, '2018-05-14 23:51:54', '2018-05-14 23:51:54', '0000-00-00 00:00:00', 0),
(368, 30, 81, 1, '2018-05-14 23:51:54', '2018-05-14 23:51:54', '0000-00-00 00:00:00', 0),
(369, 19, 81, 1, '2018-05-14 23:51:54', '2018-05-14 23:51:54', '0000-00-00 00:00:00', 0),
(370, 11, 81, 1, '2018-05-14 23:51:54', '2018-05-14 23:51:54', '0000-00-00 00:00:00', 0),
(371, 21, 81, 1, '2018-05-14 23:51:54', '2018-05-14 23:51:54', '0000-00-00 00:00:00', 0),
(372, 6, 81, 1, '2018-05-14 23:51:54', '2018-05-14 23:51:54', '0000-00-00 00:00:00', 0),
(373, 14, 81, 1, '2018-05-14 23:51:54', '2018-05-14 23:51:54', '0000-00-00 00:00:00', 0),
(374, 20, 81, 1, '2018-05-14 23:51:54', '2018-05-14 23:51:54', '0000-00-00 00:00:00', 0),
(375, 18, 81, 1, '2018-05-14 23:51:54', '2018-05-14 23:51:54', '0000-00-00 00:00:00', 0),
(376, 32, 81, 1, '2018-05-14 23:51:54', '2018-05-14 23:51:54', '0000-00-00 00:00:00', 0),
(377, 5, 82, 1, '2018-05-14 23:51:54', '2018-05-14 23:51:54', '0000-00-00 00:00:00', 0),
(378, 18, 82, 1, '2018-05-14 23:51:54', '2018-05-14 23:51:54', '0000-00-00 00:00:00', 0),
(379, 17, 82, 1, '2018-05-14 23:51:54', '2018-05-14 23:51:54', '0000-00-00 00:00:00', 0),
(380, 31, 83, 1, '2018-05-14 23:51:54', '2018-05-14 23:51:54', '0000-00-00 00:00:00', 0),
(381, 16, 83, 1, '2018-05-14 23:51:54', '2018-05-14 23:51:54', '0000-00-00 00:00:00', 0),
(382, 30, 84, 1, '2018-05-14 23:51:54', '2018-05-14 23:51:54', '0000-00-00 00:00:00', 0),
(383, 30, 85, 1, '2018-05-14 23:51:54', '2018-05-14 23:51:54', '0000-00-00 00:00:00', 0),
(384, 14, 86, 1, '2018-05-14 23:51:54', '2018-05-14 23:51:54', '0000-00-00 00:00:00', 0),
(385, 4, 86, 1, '2018-05-14 23:51:54', '2018-05-14 23:51:54', '0000-00-00 00:00:00', 0),
(386, 5, 86, 1, '2018-05-14 23:51:54', '2018-05-14 23:51:54', '0000-00-00 00:00:00', 0),
(387, 11, 86, 1, '2018-05-14 23:51:54', '2018-05-14 23:51:54', '0000-00-00 00:00:00', 0),
(388, 6, 86, 1, '2018-05-14 23:51:54', '2018-05-14 23:51:54', '0000-00-00 00:00:00', 0),
(389, 16, 86, 1, '2018-05-14 23:51:54', '2018-05-14 23:51:54', '0000-00-00 00:00:00', 0),
(390, 18, 86, 1, '2018-05-14 23:51:54', '2018-05-14 23:51:54', '0000-00-00 00:00:00', 0),
(391, 30, 87, 1, '2018-05-14 23:51:54', '2018-05-14 23:51:54', '0000-00-00 00:00:00', 0),
(392, 6, 91, 1, '2018-05-14 23:51:54', '2018-05-14 23:51:54', '0000-00-00 00:00:00', 0),
(393, 14, 92, 1, '2018-05-14 23:51:54', '2018-05-14 23:51:54', '0000-00-00 00:00:00', 0),
(394, 31, 92, 1, '2018-05-14 23:51:54', '2018-05-14 23:51:54', '0000-00-00 00:00:00', 0),
(395, 12, 92, 1, '2018-05-14 23:51:54', '2018-05-14 23:51:54', '0000-00-00 00:00:00', 0),
(396, 35, 92, 1, '2018-05-14 23:51:54', '2018-05-14 23:51:54', '0000-00-00 00:00:00', 0),
(397, 16, 92, 1, '2018-05-14 23:51:54', '2018-05-14 23:51:54', '0000-00-00 00:00:00', 0),
(398, 14, 93, 1, '2018-05-14 23:51:54', '2018-05-14 23:51:54', '0000-00-00 00:00:00', 0),
(399, 24, 93, 1, '2018-05-14 23:51:54', '2018-05-14 23:51:54', '0000-00-00 00:00:00', 0),
(400, 4, 93, 1, '2018-05-14 23:51:54', '2018-05-14 23:51:54', '0000-00-00 00:00:00', 0),
(401, 28, 93, 1, '2018-05-14 23:51:54', '2018-05-14 23:51:54', '0000-00-00 00:00:00', 0),
(402, 20, 93, 1, '2018-05-14 23:51:54', '2018-05-14 23:51:54', '0000-00-00 00:00:00', 0),
(403, 32, 93, 1, '2018-05-14 23:51:54', '2018-05-14 23:51:54', '0000-00-00 00:00:00', 0),
(404, 11, 93, 1, '2018-05-14 23:51:54', '2018-05-14 23:51:54', '0000-00-00 00:00:00', 0),
(405, 26, 93, 1, '2018-05-14 23:51:54', '2018-05-14 23:51:54', '0000-00-00 00:00:00', 0),
(406, 5, 93, 1, '2018-05-14 23:51:54', '2018-05-14 23:51:54', '0000-00-00 00:00:00', 0),
(407, 30, 93, 1, '2018-05-14 23:51:54', '2018-05-14 23:51:54', '0000-00-00 00:00:00', 0),
(408, 16, 93, 1, '2018-05-14 23:51:54', '2018-05-14 23:51:54', '0000-00-00 00:00:00', 0),
(409, 25, 93, 1, '2018-05-14 23:51:54', '2018-05-14 23:51:54', '0000-00-00 00:00:00', 0),
(410, 6, 93, 1, '2018-05-14 23:51:54', '2018-05-14 23:51:54', '0000-00-00 00:00:00', 0),
(411, 29, 93, 1, '2018-05-14 23:51:54', '2018-05-14 23:51:54', '0000-00-00 00:00:00', 0),
(412, 18, 95, 1, '2018-05-14 23:51:54', '2018-05-14 23:51:54', '0000-00-00 00:00:00', 0),
(413, 16, 95, 1, '2018-05-14 23:51:54', '2018-05-14 23:51:54', '0000-00-00 00:00:00', 0),
(414, 35, 95, 1, '2018-05-14 23:51:54', '2018-05-14 23:51:54', '0000-00-00 00:00:00', 0),
(415, 14, 96, 1, '2018-05-14 23:51:54', '2018-05-14 23:51:54', '0000-00-00 00:00:00', 0),
(416, 32, 96, 1, '2018-05-14 23:51:54', '2018-05-14 23:51:54', '0000-00-00 00:00:00', 0),
(417, 5, 96, 1, '2018-05-14 23:51:54', '2018-05-14 23:51:54', '0000-00-00 00:00:00', 0),
(418, 36, 96, 1, '2018-05-14 23:51:54', '2018-05-14 23:51:54', '0000-00-00 00:00:00', 0),
(419, 30, 96, 1, '2018-05-14 23:51:54', '2018-05-14 23:51:54', '0000-00-00 00:00:00', 0),
(420, 4, 96, 1, '2018-05-14 23:51:54', '2018-05-14 23:51:54', '0000-00-00 00:00:00', 0),
(421, 31, 96, 1, '2018-05-14 23:51:54', '2018-05-14 23:51:54', '0000-00-00 00:00:00', 0),
(422, 26, 96, 1, '2018-05-14 23:51:54', '2018-05-14 23:51:54', '0000-00-00 00:00:00', 0),
(423, 16, 96, 1, '2018-05-14 23:51:54', '2018-05-14 23:51:54', '0000-00-00 00:00:00', 0),
(424, 37, 96, 1, '2018-05-14 23:51:54', '2018-05-14 23:51:54', '0000-00-00 00:00:00', 0),
(425, 35, 96, 1, '2018-05-14 23:51:54', '2018-05-14 23:51:54', '0000-00-00 00:00:00', 0),
(426, 32, 97, 1, '2018-05-14 23:51:54', '2018-05-14 23:51:54', '0000-00-00 00:00:00', 0),
(427, 30, 98, 1, '2018-05-14 23:51:54', '2018-05-14 23:51:54', '0000-00-00 00:00:00', 0),
(428, 14, 98, 1, '2018-05-14 23:51:54', '2018-05-14 23:51:54', '0000-00-00 00:00:00', 0),
(429, 33, 98, 1, '2018-05-14 23:51:54', '2018-05-14 23:51:54', '0000-00-00 00:00:00', 0),
(430, 32, 98, 1, '2018-05-14 23:51:54', '2018-05-14 23:51:54', '0000-00-00 00:00:00', 0),
(431, 33, 80, 1, '2018-05-14 23:51:54', '2018-05-14 23:51:54', '0000-00-00 00:00:00', 0),
(432, 30, 50, 1, '2018-05-14 23:51:54', '2018-05-14 23:51:54', '0000-00-00 00:00:00', 0),
(433, 30, 18, 1, '2018-05-22 09:57:57', '2018-05-22 09:57:57', '0000-00-00 00:00:00', 0),
(434, 30, 19, 1, '2018-05-22 09:57:57', '2018-05-22 09:57:57', '0000-00-00 00:00:00', 0),
(435, 30, 20, 1, '2018-05-22 09:57:57', '2018-05-22 09:57:57', '0000-00-00 00:00:00', 0),
(436, 6, 20, 1, '2018-05-22 09:57:57', '2018-05-22 09:57:57', '0000-00-00 00:00:00', 0),
(437, 4, 20, 1, '2018-05-22 09:57:57', '2018-05-22 09:57:57', '0000-00-00 00:00:00', 0),
(438, 31, 20, 1, '2018-05-22 09:57:57', '2018-05-22 09:57:57', '0000-00-00 00:00:00', 0),
(439, 14, 21, 1, '2018-05-22 09:57:57', '2018-05-22 09:57:57', '0000-00-00 00:00:00', 0),
(440, 5, 22, 1, '2018-05-22 09:57:57', '2018-05-22 09:57:57', '0000-00-00 00:00:00', 0),
(441, 30, 25, 1, '2018-05-22 09:57:57', '2018-05-22 09:57:57', '0000-00-00 00:00:00', 0),
(442, 30, 26, 1, '2018-05-22 09:57:57', '2018-05-22 09:57:57', '0000-00-00 00:00:00', 0),
(443, 30, 27, 1, '2018-05-22 09:57:57', '2018-05-22 09:57:57', '0000-00-00 00:00:00', 0),
(444, 35, 27, 1, '2018-05-22 09:57:57', '2018-05-22 09:57:57', '0000-00-00 00:00:00', 0),
(445, 6, 29, 1, '2018-05-22 09:57:57', '2018-05-22 09:57:57', '0000-00-00 00:00:00', 0),
(446, 31, 30, 1, '2018-05-22 09:57:57', '2018-05-22 09:57:57', '0000-00-00 00:00:00', 0),
(447, 37, 30, 1, '2018-05-22 09:57:57', '2018-05-22 09:57:57', '0000-00-00 00:00:00', 0),
(448, 14, 31, 1, '2018-05-22 09:57:57', '2018-05-22 09:57:57', '0000-00-00 00:00:00', 0),
(449, 12, 31, 1, '2018-05-22 09:57:57', '2018-05-22 09:57:57', '0000-00-00 00:00:00', 0),
(450, 5, 32, 1, '2018-05-22 09:57:57', '2018-05-22 09:57:57', '0000-00-00 00:00:00', 0),
(451, 14, 32, 1, '2018-05-22 09:57:57', '2018-05-22 09:57:57', '0000-00-00 00:00:00', 0),
(452, 31, 32, 1, '2018-05-22 09:57:57', '2018-05-22 09:57:57', '0000-00-00 00:00:00', 0),
(453, 30, 32, 1, '2018-05-22 09:57:57', '2018-05-22 09:57:57', '0000-00-00 00:00:00', 0),
(454, 35, 34, 1, '2018-05-22 09:57:57', '2018-05-22 09:57:57', '0000-00-00 00:00:00', 0),
(455, 6, 34, 1, '2018-05-22 09:57:57', '2018-05-22 09:57:57', '0000-00-00 00:00:00', 0),
(456, 14, 34, 1, '2018-05-22 09:57:57', '2018-05-22 09:57:57', '0000-00-00 00:00:00', 0),
(457, 30, 34, 1, '2018-05-22 09:57:57', '2018-05-22 09:57:57', '0000-00-00 00:00:00', 0),
(458, 12, 34, 1, '2018-05-22 09:57:57', '2018-05-22 09:57:57', '0000-00-00 00:00:00', 0),
(459, 30, 35, 1, '2018-05-22 09:57:57', '2018-05-22 09:57:57', '0000-00-00 00:00:00', 0),
(460, 6, 36, 1, '2018-05-22 09:57:57', '2018-05-22 09:57:57', '0000-00-00 00:00:00', 0),
(461, 32, 36, 1, '2018-05-22 09:57:57', '2018-05-22 09:57:57', '0000-00-00 00:00:00', 0),
(462, 35, 36, 1, '2018-05-22 09:57:57', '2018-05-22 09:57:57', '0000-00-00 00:00:00', 0),
(463, 5, 36, 1, '2018-05-22 09:57:57', '2018-05-22 09:57:57', '0000-00-00 00:00:00', 0),
(464, 11, 37, 1, '2018-05-22 09:57:57', '2018-05-22 09:57:57', '0000-00-00 00:00:00', 0),
(465, 5, 37, 1, '2018-05-22 09:57:57', '2018-05-22 09:57:57', '0000-00-00 00:00:00', 0),
(466, 19, 37, 1, '2018-05-22 09:57:57', '2018-05-22 09:57:57', '0000-00-00 00:00:00', 0),
(467, 17, 37, 1, '2018-05-22 09:57:57', '2018-05-22 09:57:57', '0000-00-00 00:00:00', 0),
(468, 11, 38, 1, '2018-05-22 09:57:57', '2018-05-22 09:57:57', '0000-00-00 00:00:00', 0),
(469, 32, 38, 1, '2018-05-22 09:57:57', '2018-05-22 09:57:57', '0000-00-00 00:00:00', 0),
(470, 14, 38, 1, '2018-05-22 09:57:57', '2018-05-22 09:57:57', '0000-00-00 00:00:00', 0),
(471, 30, 38, 1, '2018-05-22 09:57:57', '2018-05-22 09:57:57', '0000-00-00 00:00:00', 0),
(472, 18, 38, 1, '2018-05-22 09:57:57', '2018-05-22 09:57:57', '0000-00-00 00:00:00', 0),
(473, 17, 39, 1, '2018-05-22 09:57:57', '2018-05-22 09:57:57', '0000-00-00 00:00:00', 0),
(474, 33, 40, 1, '2018-05-22 09:57:57', '2018-05-22 09:57:57', '0000-00-00 00:00:00', 0),
(475, 18, 41, 1, '2018-05-22 09:57:57', '2018-05-22 09:57:57', '0000-00-00 00:00:00', 0),
(476, 17, 41, 1, '2018-05-22 09:57:57', '2018-05-22 09:57:57', '0000-00-00 00:00:00', 0),
(477, 30, 41, 1, '2018-05-22 09:57:57', '2018-05-22 09:57:57', '0000-00-00 00:00:00', 0),
(478, 16, 41, 1, '2018-05-22 09:57:57', '2018-05-22 09:57:57', '0000-00-00 00:00:00', 0),
(479, 14, 42, 1, '2018-05-22 09:57:57', '2018-05-22 09:57:57', '0000-00-00 00:00:00', 0),
(480, 31, 42, 1, '2018-05-22 09:57:57', '2018-05-22 09:57:57', '0000-00-00 00:00:00', 0),
(481, 32, 42, 1, '2018-05-22 09:57:57', '2018-05-22 09:57:57', '0000-00-00 00:00:00', 0),
(482, 30, 43, 1, '2018-05-22 09:57:57', '2018-05-22 09:57:57', '0000-00-00 00:00:00', 0),
(483, 18, 43, 1, '2018-05-22 09:57:57', '2018-05-22 09:57:57', '0000-00-00 00:00:00', 0),
(484, 30, 44, 1, '2018-05-22 09:57:57', '2018-05-22 09:57:57', '0000-00-00 00:00:00', 0),
(485, 6, 44, 1, '2018-05-22 09:57:57', '2018-05-22 09:57:57', '0000-00-00 00:00:00', 0),
(486, 11, 45, 1, '2018-05-22 09:57:57', '2018-05-22 09:57:57', '0000-00-00 00:00:00', 0),
(487, 16, 45, 1, '2018-05-22 09:57:57', '2018-05-22 09:57:57', '0000-00-00 00:00:00', 0),
(488, 31, 45, 1, '2018-05-22 09:57:57', '2018-05-22 09:57:57', '0000-00-00 00:00:00', 0),
(489, 12, 45, 1, '2018-05-22 09:57:57', '2018-05-22 09:57:57', '0000-00-00 00:00:00', 0),
(490, 26, 45, 1, '2018-05-22 09:57:57', '2018-05-22 09:57:57', '0000-00-00 00:00:00', 0),
(491, 19, 46, 1, '2018-05-22 09:57:57', '2018-05-22 09:57:57', '0000-00-00 00:00:00', 0),
(492, 14, 46, 1, '2018-05-22 09:57:57', '2018-05-22 09:57:57', '0000-00-00 00:00:00', 0),
(493, 37, 46, 1, '2018-05-22 09:57:57', '2018-05-22 09:57:57', '0000-00-00 00:00:00', 0),
(494, 11, 46, 1, '2018-05-22 09:57:57', '2018-05-22 09:57:57', '0000-00-00 00:00:00', 0),
(495, 30, 46, 1, '2018-05-22 09:57:57', '2018-05-22 09:57:57', '0000-00-00 00:00:00', 0),
(496, 16, 46, 1, '2018-05-22 09:57:57', '2018-05-22 09:57:57', '0000-00-00 00:00:00', 0),
(497, 35, 46, 1, '2018-05-22 09:57:57', '2018-05-22 09:57:57', '0000-00-00 00:00:00', 0),
(498, 15, 46, 1, '2018-05-22 09:57:57', '2018-05-22 09:57:57', '0000-00-00 00:00:00', 0),
(499, 31, 46, 1, '2018-05-22 09:57:57', '2018-05-22 09:57:57', '0000-00-00 00:00:00', 0),
(500, 14, 47, 1, '2018-05-22 09:57:57', '2018-05-22 09:57:57', '0000-00-00 00:00:00', 0),
(501, 6, 47, 1, '2018-05-22 09:57:57', '2018-05-22 09:57:57', '0000-00-00 00:00:00', 0),
(502, 11, 47, 1, '2018-05-22 09:57:57', '2018-05-22 09:57:57', '0000-00-00 00:00:00', 0),
(503, 19, 49, 1, '2018-05-22 09:57:57', '2018-05-22 09:57:57', '0000-00-00 00:00:00', 0),
(504, 16, 49, 1, '2018-05-22 09:57:57', '2018-05-22 09:57:57', '0000-00-00 00:00:00', 0),
(505, 6, 49, 1, '2018-05-22 09:57:57', '2018-05-22 09:57:57', '0000-00-00 00:00:00', 0),
(506, 31, 49, 1, '2018-05-22 09:57:57', '2018-05-22 09:57:57', '0000-00-00 00:00:00', 0),
(507, 18, 49, 1, '2018-05-22 09:57:57', '2018-05-22 09:57:57', '0000-00-00 00:00:00', 0),
(508, 32, 49, 1, '2018-05-22 09:57:57', '2018-05-22 09:57:57', '0000-00-00 00:00:00', 0),
(509, 17, 49, 1, '2018-05-22 09:57:57', '2018-05-22 09:57:57', '0000-00-00 00:00:00', 0),
(510, 32, 51, 1, '2018-05-22 09:57:57', '2018-05-22 09:57:57', '0000-00-00 00:00:00', 0),
(511, 12, 51, 1, '2018-05-22 09:57:57', '2018-05-22 09:57:57', '0000-00-00 00:00:00', 0),
(512, 6, 51, 1, '2018-05-22 09:57:57', '2018-05-22 09:57:57', '0000-00-00 00:00:00', 0),
(513, 16, 51, 1, '2018-05-22 09:57:57', '2018-05-22 09:57:57', '0000-00-00 00:00:00', 0),
(514, 30, 51, 1, '2018-05-22 09:57:57', '2018-05-22 09:57:57', '0000-00-00 00:00:00', 0),
(515, 4, 51, 1, '2018-05-22 09:57:57', '2018-05-22 09:57:57', '0000-00-00 00:00:00', 0),
(516, 15, 51, 1, '2018-05-22 09:57:57', '2018-05-22 09:57:57', '0000-00-00 00:00:00', 0),
(517, 5, 51, 1, '2018-05-22 09:57:57', '2018-05-22 09:57:57', '0000-00-00 00:00:00', 0),
(518, 17, 51, 1, '2018-05-22 09:57:57', '2018-05-22 09:57:57', '0000-00-00 00:00:00', 0),
(519, 31, 51, 1, '2018-05-22 09:57:57', '2018-05-22 09:57:57', '0000-00-00 00:00:00', 0),
(520, 14, 51, 1, '2018-05-22 09:57:57', '2018-05-22 09:57:57', '0000-00-00 00:00:00', 0),
(521, 19, 51, 1, '2018-05-22 09:57:57', '2018-05-22 09:57:57', '0000-00-00 00:00:00', 0),
(522, 11, 51, 1, '2018-05-22 09:57:57', '2018-05-22 09:57:57', '0000-00-00 00:00:00', 0),
(523, 18, 52, 1, '2018-05-22 09:57:57', '2018-05-22 09:57:57', '0000-00-00 00:00:00', 0),
(524, 30, 54, 1, '2018-05-22 09:57:57', '2018-05-22 09:57:57', '0000-00-00 00:00:00', 0),
(525, 14, 54, 1, '2018-05-22 09:57:57', '2018-05-22 09:57:57', '0000-00-00 00:00:00', 0),
(526, 4, 55, 1, '2018-05-22 09:57:57', '2018-05-22 09:57:57', '0000-00-00 00:00:00', 0),
(527, 34, 55, 1, '2018-05-22 09:57:57', '2018-05-22 09:57:57', '0000-00-00 00:00:00', 0),
(528, 25, 55, 1, '2018-05-22 09:57:57', '2018-05-22 09:57:57', '0000-00-00 00:00:00', 0),
(529, 6, 56, 1, '2018-05-22 09:57:57', '2018-05-22 09:57:57', '0000-00-00 00:00:00', 0),
(530, 20, 56, 1, '2018-05-22 09:57:57', '2018-05-22 09:57:57', '0000-00-00 00:00:00', 0),
(531, 18, 56, 1, '2018-05-22 09:57:57', '2018-05-22 09:57:57', '0000-00-00 00:00:00', 0),
(532, 33, 56, 1, '2018-05-22 09:57:57', '2018-05-22 09:57:57', '0000-00-00 00:00:00', 0),
(533, 5, 56, 1, '2018-05-22 09:57:57', '2018-05-22 09:57:57', '0000-00-00 00:00:00', 0),
(534, 11, 56, 1, '2018-05-22 09:57:57', '2018-05-22 09:57:57', '0000-00-00 00:00:00', 0),
(535, 32, 56, 1, '2018-05-22 09:57:57', '2018-05-22 09:57:57', '0000-00-00 00:00:00', 0),
(536, 19, 56, 1, '2018-05-22 09:57:57', '2018-05-22 09:57:57', '0000-00-00 00:00:00', 0),
(537, 30, 56, 1, '2018-05-22 09:57:57', '2018-05-22 09:57:57', '0000-00-00 00:00:00', 0),
(538, 30, 57, 1, '2018-05-22 09:57:57', '2018-05-22 09:57:57', '0000-00-00 00:00:00', 0),
(539, 33, 58, 1, '2018-05-22 09:57:57', '2018-05-22 09:57:57', '0000-00-00 00:00:00', 0),
(540, 32, 58, 1, '2018-05-22 09:57:57', '2018-05-22 09:57:57', '0000-00-00 00:00:00', 0),
(541, 6, 58, 1, '2018-05-22 09:57:57', '2018-05-22 09:57:57', '0000-00-00 00:00:00', 0),
(542, 14, 61, 1, '2018-05-22 09:57:57', '2018-05-22 09:57:57', '0000-00-00 00:00:00', 0),
(543, 31, 61, 1, '2018-05-22 09:57:57', '2018-05-22 09:57:57', '0000-00-00 00:00:00', 0),
(544, 28, 62, 1, '2018-05-22 09:57:57', '2018-05-22 09:57:57', '0000-00-00 00:00:00', 0),
(545, 31, 62, 1, '2018-05-22 09:57:57', '2018-05-22 09:57:57', '0000-00-00 00:00:00', 0),
(546, 30, 64, 1, '2018-05-22 09:57:57', '2018-05-22 09:57:57', '0000-00-00 00:00:00', 0),
(547, 14, 64, 1, '2018-05-22 09:57:57', '2018-05-22 09:57:57', '0000-00-00 00:00:00', 0),
(548, 33, 64, 1, '2018-05-22 09:57:57', '2018-05-22 09:57:57', '0000-00-00 00:00:00', 0),
(549, 35, 65, 1, '2018-05-22 09:57:57', '2018-05-22 09:57:57', '0000-00-00 00:00:00', 0),
(550, 33, 66, 1, '2018-05-22 09:57:57', '2018-05-22 09:57:57', '0000-00-00 00:00:00', 0),
(551, 5, 66, 1, '2018-05-22 09:57:57', '2018-05-22 09:57:57', '0000-00-00 00:00:00', 0),
(552, 37, 66, 1, '2018-05-22 09:57:57', '2018-05-22 09:57:57', '0000-00-00 00:00:00', 0),
(553, 16, 66, 1, '2018-05-22 09:57:57', '2018-05-22 09:57:57', '0000-00-00 00:00:00', 0),
(554, 30, 66, 1, '2018-05-22 09:57:57', '2018-05-22 09:57:57', '0000-00-00 00:00:00', 0),
(555, 14, 66, 1, '2018-05-22 09:57:57', '2018-05-22 09:57:57', '0000-00-00 00:00:00', 0),
(556, 36, 66, 1, '2018-05-22 09:57:57', '2018-05-22 09:57:57', '0000-00-00 00:00:00', 0),
(557, 35, 66, 1, '2018-05-22 09:57:57', '2018-05-22 09:57:57', '0000-00-00 00:00:00', 0),
(558, 24, 67, 1, '2018-05-22 09:57:57', '2018-05-22 09:57:57', '0000-00-00 00:00:00', 0),
(559, 6, 67, 1, '2018-05-22 09:57:57', '2018-05-22 09:57:57', '0000-00-00 00:00:00', 0),
(560, 33, 67, 1, '2018-05-22 09:57:57', '2018-05-22 09:57:57', '0000-00-00 00:00:00', 0),
(561, 14, 68, 1, '2018-05-22 09:57:57', '2018-05-22 09:57:57', '0000-00-00 00:00:00', 0),
(562, 37, 68, 1, '2018-05-22 09:57:57', '2018-05-22 09:57:57', '0000-00-00 00:00:00', 0),
(563, 30, 68, 1, '2018-05-22 09:57:57', '2018-05-22 09:57:57', '0000-00-00 00:00:00', 0),
(564, 17, 68, 1, '2018-05-22 09:57:57', '2018-05-22 09:57:57', '0000-00-00 00:00:00', 0),
(565, 33, 68, 1, '2018-05-22 09:57:57', '2018-05-22 09:57:57', '0000-00-00 00:00:00', 0),
(566, 30, 70, 1, '2018-05-22 09:57:57', '2018-05-22 09:57:57', '0000-00-00 00:00:00', 0),
(567, 30, 71, 1, '2018-05-22 09:57:57', '2018-05-22 09:57:57', '0000-00-00 00:00:00', 0),
(568, 36, 72, 1, '2018-05-22 09:57:57', '2018-05-22 09:57:57', '0000-00-00 00:00:00', 0);
INSERT INTO `cuisine_merchant_cate_assign_copy` (`id`, `cat_cusid`, `restaurantid`, `status`, `createdat`, `updatedat`, `deletedat`, `isdeleted`) VALUES
(569, 27, 72, 1, '2018-05-22 09:57:57', '2018-05-22 09:57:57', '0000-00-00 00:00:00', 0),
(570, 30, 73, 1, '2018-05-22 09:57:57', '2018-05-22 09:57:57', '0000-00-00 00:00:00', 0),
(571, 14, 73, 1, '2018-05-22 09:57:57', '2018-05-22 09:57:57', '0000-00-00 00:00:00', 0),
(572, 35, 73, 1, '2018-05-22 09:57:57', '2018-05-22 09:57:57', '0000-00-00 00:00:00', 0),
(573, 33, 73, 1, '2018-05-22 09:57:57', '2018-05-22 09:57:57', '0000-00-00 00:00:00', 0),
(574, 6, 73, 1, '2018-05-22 09:57:57', '2018-05-22 09:57:57', '0000-00-00 00:00:00', 0),
(575, 37, 73, 1, '2018-05-22 09:57:57', '2018-05-22 09:57:57', '0000-00-00 00:00:00', 0),
(576, 4, 73, 1, '2018-05-22 09:57:57', '2018-05-22 09:57:57', '0000-00-00 00:00:00', 0),
(577, 13, 74, 1, '2018-05-22 09:57:57', '2018-05-22 09:57:57', '0000-00-00 00:00:00', 0),
(578, 12, 74, 1, '2018-05-22 09:57:57', '2018-05-22 09:57:57', '0000-00-00 00:00:00', 0),
(579, 30, 76, 1, '2018-05-22 09:57:57', '2018-05-22 09:57:57', '0000-00-00 00:00:00', 0),
(580, 34, 78, 1, '2018-05-22 09:57:57', '2018-05-22 09:57:57', '0000-00-00 00:00:00', 0),
(581, 4, 79, 1, '2018-05-22 09:57:57', '2018-05-22 09:57:57', '0000-00-00 00:00:00', 0),
(582, 5, 81, 1, '2018-05-22 09:57:57', '2018-05-22 09:57:57', '0000-00-00 00:00:00', 0),
(583, 4, 81, 1, '2018-05-22 09:57:57', '2018-05-22 09:57:57', '0000-00-00 00:00:00', 0),
(584, 30, 81, 1, '2018-05-22 09:57:57', '2018-05-22 09:57:57', '0000-00-00 00:00:00', 0),
(585, 19, 81, 1, '2018-05-22 09:57:57', '2018-05-22 09:57:57', '0000-00-00 00:00:00', 0),
(586, 11, 81, 1, '2018-05-22 09:57:57', '2018-05-22 09:57:57', '0000-00-00 00:00:00', 0),
(587, 21, 81, 1, '2018-05-22 09:57:57', '2018-05-22 09:57:57', '0000-00-00 00:00:00', 0),
(588, 6, 81, 1, '2018-05-22 09:57:57', '2018-05-22 09:57:57', '0000-00-00 00:00:00', 0),
(589, 14, 81, 1, '2018-05-22 09:57:57', '2018-05-22 09:57:57', '0000-00-00 00:00:00', 0),
(590, 20, 81, 1, '2018-05-22 09:57:57', '2018-05-22 09:57:57', '0000-00-00 00:00:00', 0),
(591, 18, 81, 1, '2018-05-22 09:57:57', '2018-05-22 09:57:57', '0000-00-00 00:00:00', 0),
(592, 32, 81, 1, '2018-05-22 09:57:57', '2018-05-22 09:57:57', '0000-00-00 00:00:00', 0),
(593, 5, 82, 1, '2018-05-22 09:57:57', '2018-05-22 09:57:57', '0000-00-00 00:00:00', 0),
(594, 18, 82, 1, '2018-05-22 09:57:57', '2018-05-22 09:57:57', '0000-00-00 00:00:00', 0),
(595, 17, 82, 1, '2018-05-22 09:57:57', '2018-05-22 09:57:57', '0000-00-00 00:00:00', 0),
(596, 31, 83, 1, '2018-05-22 09:57:57', '2018-05-22 09:57:57', '0000-00-00 00:00:00', 0),
(597, 16, 83, 1, '2018-05-22 09:57:57', '2018-05-22 09:57:57', '0000-00-00 00:00:00', 0),
(598, 30, 84, 1, '2018-05-22 09:57:57', '2018-05-22 09:57:57', '0000-00-00 00:00:00', 0),
(599, 30, 85, 1, '2018-05-22 09:57:57', '2018-05-22 09:57:57', '0000-00-00 00:00:00', 0),
(600, 14, 86, 1, '2018-05-22 09:57:57', '2018-05-22 09:57:57', '0000-00-00 00:00:00', 0),
(601, 4, 86, 1, '2018-05-22 09:57:57', '2018-05-22 09:57:57', '0000-00-00 00:00:00', 0),
(602, 5, 86, 1, '2018-05-22 09:57:57', '2018-05-22 09:57:57', '0000-00-00 00:00:00', 0),
(603, 11, 86, 1, '2018-05-22 09:57:57', '2018-05-22 09:57:57', '0000-00-00 00:00:00', 0),
(604, 6, 86, 1, '2018-05-22 09:57:57', '2018-05-22 09:57:57', '0000-00-00 00:00:00', 0),
(605, 16, 86, 1, '2018-05-22 09:57:57', '2018-05-22 09:57:57', '0000-00-00 00:00:00', 0),
(606, 18, 86, 1, '2018-05-22 09:57:57', '2018-05-22 09:57:57', '0000-00-00 00:00:00', 0),
(607, 30, 87, 1, '2018-05-22 09:57:57', '2018-05-22 09:57:57', '0000-00-00 00:00:00', 0),
(608, 6, 91, 1, '2018-05-22 09:57:57', '2018-05-22 09:57:57', '0000-00-00 00:00:00', 0),
(609, 14, 92, 1, '2018-05-22 09:57:57', '2018-05-22 09:57:57', '0000-00-00 00:00:00', 0),
(610, 31, 92, 1, '2018-05-22 09:57:57', '2018-05-22 09:57:57', '0000-00-00 00:00:00', 0),
(611, 12, 92, 1, '2018-05-22 09:57:57', '2018-05-22 09:57:57', '0000-00-00 00:00:00', 0),
(612, 35, 92, 1, '2018-05-22 09:57:57', '2018-05-22 09:57:57', '0000-00-00 00:00:00', 0),
(613, 16, 92, 1, '2018-05-22 09:57:57', '2018-05-22 09:57:57', '0000-00-00 00:00:00', 0),
(614, 14, 93, 1, '2018-05-22 09:57:57', '2018-05-22 09:57:57', '0000-00-00 00:00:00', 0),
(615, 24, 93, 1, '2018-05-22 09:57:57', '2018-05-22 09:57:57', '0000-00-00 00:00:00', 0),
(616, 4, 93, 1, '2018-05-22 09:57:57', '2018-05-22 09:57:57', '0000-00-00 00:00:00', 0),
(617, 28, 93, 1, '2018-05-22 09:57:57', '2018-05-22 09:57:57', '0000-00-00 00:00:00', 0),
(618, 20, 93, 1, '2018-05-22 09:57:57', '2018-05-22 09:57:57', '0000-00-00 00:00:00', 0),
(619, 32, 93, 1, '2018-05-22 09:57:57', '2018-05-22 09:57:57', '0000-00-00 00:00:00', 0),
(620, 11, 93, 1, '2018-05-22 09:57:57', '2018-05-22 09:57:57', '0000-00-00 00:00:00', 0),
(621, 26, 93, 1, '2018-05-22 09:57:57', '2018-05-22 09:57:57', '0000-00-00 00:00:00', 0),
(622, 5, 93, 1, '2018-05-22 09:57:57', '2018-05-22 09:57:57', '0000-00-00 00:00:00', 0),
(623, 30, 93, 1, '2018-05-22 09:57:57', '2018-05-22 09:57:57', '0000-00-00 00:00:00', 0),
(624, 16, 93, 1, '2018-05-22 09:57:57', '2018-05-22 09:57:57', '0000-00-00 00:00:00', 0),
(625, 25, 93, 1, '2018-05-22 09:57:57', '2018-05-22 09:57:57', '0000-00-00 00:00:00', 0),
(626, 6, 93, 1, '2018-05-22 09:57:57', '2018-05-22 09:57:57', '0000-00-00 00:00:00', 0),
(627, 29, 93, 1, '2018-05-22 09:57:57', '2018-05-22 09:57:57', '0000-00-00 00:00:00', 0),
(628, 18, 95, 1, '2018-05-22 09:57:57', '2018-05-22 09:57:57', '0000-00-00 00:00:00', 0),
(629, 16, 95, 1, '2018-05-22 09:57:57', '2018-05-22 09:57:57', '0000-00-00 00:00:00', 0),
(630, 35, 95, 1, '2018-05-22 09:57:57', '2018-05-22 09:57:57', '0000-00-00 00:00:00', 0),
(631, 14, 96, 1, '2018-05-22 09:57:57', '2018-05-22 09:57:57', '0000-00-00 00:00:00', 0),
(632, 32, 96, 1, '2018-05-22 09:57:57', '2018-05-22 09:57:57', '0000-00-00 00:00:00', 0),
(633, 5, 96, 1, '2018-05-22 09:57:57', '2018-05-22 09:57:57', '0000-00-00 00:00:00', 0),
(634, 36, 96, 1, '2018-05-22 09:57:57', '2018-05-22 09:57:57', '0000-00-00 00:00:00', 0),
(635, 30, 96, 1, '2018-05-22 09:57:57', '2018-05-22 09:57:57', '0000-00-00 00:00:00', 0),
(636, 4, 96, 1, '2018-05-22 09:57:57', '2018-05-22 09:57:57', '0000-00-00 00:00:00', 0),
(637, 31, 96, 1, '2018-05-22 09:57:57', '2018-05-22 09:57:57', '0000-00-00 00:00:00', 0),
(638, 26, 96, 1, '2018-05-22 09:57:57', '2018-05-22 09:57:57', '0000-00-00 00:00:00', 0),
(639, 16, 96, 1, '2018-05-22 09:57:57', '2018-05-22 09:57:57', '0000-00-00 00:00:00', 0),
(640, 37, 96, 1, '2018-05-22 09:57:57', '2018-05-22 09:57:57', '0000-00-00 00:00:00', 0),
(641, 35, 96, 1, '2018-05-22 09:57:57', '2018-05-22 09:57:57', '0000-00-00 00:00:00', 0),
(642, 32, 97, 1, '2018-05-22 09:57:57', '2018-05-22 09:57:57', '0000-00-00 00:00:00', 0),
(643, 30, 98, 1, '2018-05-22 09:57:57', '2018-05-22 09:57:57', '0000-00-00 00:00:00', 0),
(644, 14, 98, 1, '2018-05-22 09:57:57', '2018-05-22 09:57:57', '0000-00-00 00:00:00', 0),
(645, 33, 98, 1, '2018-05-22 09:57:57', '2018-05-22 09:57:57', '0000-00-00 00:00:00', 0),
(646, 32, 98, 1, '2018-05-22 09:57:57', '2018-05-22 09:57:57', '0000-00-00 00:00:00', 0),
(647, 33, 80, 1, '2018-05-22 09:57:57', '2018-05-22 09:57:57', '0000-00-00 00:00:00', 0),
(648, 30, 50, 1, '2018-05-22 09:57:57', '2018-05-22 09:57:57', '0000-00-00 00:00:00', 0);

-- --------------------------------------------------------

--
-- Table structure for table `delivieringcharges_admin`
--

CREATE TABLE `delivieringcharges_admin` (
  `id` int(11) NOT NULL,
  `restaurantid` int(11) NOT NULL DEFAULT '0',
  `cityid` int(11) DEFAULT NULL,
  `delivieringcharges` int(11) DEFAULT NULL,
  `freedelivieringstatus` tinyint(4) NOT NULL DEFAULT '0',
  `status` tinyint(4) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `delivieringcharges_admin`
--

INSERT INTO `delivieringcharges_admin` (`id`, `restaurantid`, `cityid`, `delivieringcharges`, `freedelivieringstatus`, `status`) VALUES
(1, 0, 0, 1500, 0, 1),
(2, 0, 482, 100, 1, 1),
(3, 0, 483, 300, 1, 1),
(4, 0, 484, 1000, 1, 1),
(5, 0, 491, 1500, 0, 1),
(6, 0, 488, 0, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `delivieringcharges_merchant`
--

CREATE TABLE `delivieringcharges_merchant` (
  `id` int(11) NOT NULL,
  `restaurantid` int(11) NOT NULL,
  `cityid` int(11) DEFAULT NULL,
  `delivieringcharges` int(11) DEFAULT NULL,
  `freedelivieringstatus` tinyint(4) NOT NULL DEFAULT '0',
  `status` tinyint(4) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `delivieringcharges_merchant`
--

INSERT INTO `delivieringcharges_merchant` (`id`, `restaurantid`, `cityid`, `delivieringcharges`, `freedelivieringstatus`, `status`) VALUES
(1, 3, 483, 1500, 0, 1);

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
(1, 'Registration Confirmation', 'Thank you for registering at {site_name}!', '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">\r\n<html xmlns="http://www.w3.org/1999/xhtml">\r\n<head>\r\n<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />\r\n<title>Untitled Document</title>\r\n\r\n</head>\r\n\r\n<body>\r\n\r\n<style>\r\n\r\n.container {\r\n  padding-right: 15px;\r\n  padding-left: 15px;\r\n   width:90%;\r\n  margin-right: auto;\r\n  margin-left: auto;\r\n}\r\n\r\n.col-md-12{\r\n  padding-right: 15px;\r\n  padding-left: 15px;\r\n  \r\n}\r\n\r\n.mail-welcome-hdr{\r\n font-size:18px;\r\n padding-top:10px;\r\n padding-bottom:10px;\r\n  margin-bottom:10px;\r\n margin-top:10px;\r\n  background-color: #e74c3c;\r\n  text-transform: uppercase;\r\n  font-family:Verdana, Geneva, sans-serif;\r\n  font-weight: 700;\r\n color:#fff;\r\n text-align:center;\r\n}\r\n\r\n.mail-msg-usr-hdr{\r\n font-weight:600;\r\n}\r\n\r\n.mail-msg-cnt ul{\r\n  padding-left:15px;\r\n}\r\n\r\n.mail-msg-cnt ul li{\r\n margin-top:10px;\r\n  margin-bottom:10px; \r\n}\r\n\r\n.msg-mail-cnct{\r\n  color: #317EAC;\r\n font-weight:600;\r\n}\r\n\r\n.msg-mail-cnct a{\r\n  text-decoration:none;\r\n color: #317EAC;\r\n}\r\n\r\n.mail-cust-name{\r\n  font-weight:600;\r\n}\r\n.mail-msg-usr-btn{\r\n font-size:18px;\r\n padding:10px;\r\n background-color: #e74c3c;\r\n  text-transform: uppercase;\r\n  font-family:Verdana, Geneva, sans-serif;\r\n  font-weight: 700;\r\n color:#fff;\r\n   text-decoration: none;\r\n}\r\n.tp-contacts{\r\n  padding-top:3px;\r\n  overflow:auto;\r\n  text-align:center;\r\n}\r\n\r\n.tp-contacts ul{\r\n padding-left:0px;\r\n display: inline-block;\r\n}\r\n\r\n.tp-contacts ul li{\r\n  float:left;\r\n display:inline-block;\r\n margin-left:5px;\r\n  margin-right:5px; \r\n  padding-right:15px;\r\n padding-left:10px;\r\n  font-family: "AlegreyaSansSC-Thin";\r\n font-size:14px;\r\n font-weight:600;\r\n  border-right:1px solid #000;\r\n}\r\n\r\n.tp-contacts ul li:last-child{\r\n border:none;\r\n  padding-right:0px;\r\n  margin-right:0px;\r\n}\r\n\r\n.top-logo{\r\n  text-align:center;\r\n}\r\n\r\n</style>\r\n\r\n<div class="" style="padding-bottom:30px; padding-top:30px; padding-left:0px; padding-right:0px; background-color:#cccccc; ">\r\n\r\n  <div class="container" style="background-color:#fff; padding-bottom:20px; padding-top:20px;">\r\n    \r\n     <div class="col-md-12">\r\n         \r\n            <div class="tp-contacts">\r\n                        \r\n                <ul>\r\n                    <li>Email: info@jollof.com</li>\r\n                    <li>Phone no: +234 (909) 532 5236</li>\r\n                </ul>\r\n                \r\n            </div>\r\n            \r\n            <div class="top-logo">\r\n             \r\n                <img src="{site_logo}" />\r\n                \r\n            </div>\r\n\r\n            \r\n        </div>\r\n        \r\n        <div class="col-md-12">\r\n          \r\n            <div class="mail-welcome-hdr">\r\n              Welcome to Jollof\r\n            </div>\r\n            \r\n        </div>\r\n        \r\n        <div class="col-md-12">\r\n        \r\n          <div class="" style="margin-bottom:10px; padding-left:10px; line-height:25px;">\r\n             \r\n                Dear <span class="mail-cust-name">{customer_name},</span> <br/>\r\n                \r\n                <p>Thanks for registering at jollof.com, Your participation is appreciated. </p>\r\n                 \r\n    <p>\r\n     Please confirm your account by clicking the button below:\r\n   </p>\r\n    \r\n    <div style="text-align:; padding-bottom:20px; padding-top:10px;">\r\n     <a class="mail-msg-usr-btn" href="{url_confirm}">Confirm </a>\r\n                \r\n   </div>\r\n\r\n            </div>\r\n            \r\n            <div class="" style="color:#fff; padding-bottom:10px; padding-top:10px; background-color:#3b4248; margin-top:10px; margin-bottom:10px; padding-left:10px; line-height:25px;">\r\n             Use the following when prompted to login <br />\r\n                \r\n                <span class="mail-msg-usr-hdr">Username:</span> {customer_email} <br />\r\n                <span class="mail-msg-usr-hdr">Password:</span> the password provided on signup <br />\r\n                 {voucher} \r\n                \r\n            </div>\r\n            \r\n            \r\n\r\n       If you have any questions, please feel free to contact us at <span class="msg-mail-cnct">info@jollof.com</span> or by phone at <span class="msg-mail-cnct">+234 (909) 532 5236 | +234 (909) 532 5226</span>. \r\n            </div>\r\n            \r\n        </div>\r\n        \r\n    </div>\r\n    \r\n</div>\r\n\r\n</body>\r\n</html>', 1, '2017-11-14 06:04:02', '2017-12-04 14:10:57', '0000-00-00 00:00:00', 0),
(2, 'Password Reset', 'Password Reset Confirmation for {customer_name}!', '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">\r\n<html xmlns="http://www.w3.org/1999/xhtml">\r\n<head>\r\n<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />\r\n<title>Untitled Document</title>\r\n\r\n</head>\r\n\r\n<body>\r\n\r\n<style>\r\n\r\n.container {\r\n  padding-right: 15px;\r\n  padding-left: 15px;\r\n   width:90%;\r\n  margin-right: auto;\r\n  margin-left: auto;\r\n}\r\n\r\n.col-md-12{\r\n  padding-right: 15px;\r\n  padding-left: 15px;\r\n  \r\n}\r\n\r\n.mail-welcome-hdr{\r\n font-size:18px;\r\n padding-top:10px;\r\n padding-bottom:10px;\r\n  margin-bottom:10px;\r\n margin-top:10px;\r\n  background-color: #e74c3c;\r\n  text-transform: uppercase;\r\n  font-family:Verdana, Geneva, sans-serif;\r\n  font-weight: 700;\r\n color:#fff;\r\n text-align:center;\r\n}\r\n\r\n.mail-msg-usr-hdr{\r\n font-weight:600;\r\n}\r\n\r\n.mail-msg-cnt ul{\r\n  padding-left:15px;\r\n}\r\n\r\n.mail-msg-cnt ul li{\r\n margin-top:10px;\r\n  margin-bottom:10px; \r\n}\r\n\r\n.msg-mail-cnct{\r\n  color: #317EAC;\r\n font-weight:600;\r\n}\r\n\r\n.msg-mail-cnct a{\r\n  text-decoration:none;\r\n color: #DC214C;\r\n}\r\n\r\n.mail-cust-name{\r\n  font-weight:600;\r\n}\r\n\r\n.tp-contacts{\r\n  padding-top:3px;\r\n  overflow:auto;\r\n  text-align:center;\r\n}\r\n\r\n.tp-contacts ul{\r\n padding-left:0px;\r\n display: inline-block;\r\n}\r\n\r\n.tp-contacts ul li{\r\n  float:left;\r\n display:inline-block;\r\n margin-left:5px;\r\n  margin-right:5px; \r\n  padding-right:15px;\r\n padding-left:10px;\r\n  font-family: "candara";\r\n font-size:14px;\r\n font-weight:600;\r\n  border-right:1px solid #000;\r\n}\r\n\r\n.tp-contacts ul li:last-child{\r\n border:none;\r\n  padding-right:0px;\r\n  margin-right:0px;\r\n}\r\n\r\n.top-logo{\r\n  text-align:center;\r\n}\r\n\r\n</style>\r\n\r\n<div class="" style="padding-bottom:30px; padding-top:30px; padding-left:0px; padding-right:0px; background-color:#cccccc; ">\r\n\r\n  <div class="container" style="background-color:#fff; padding-bottom:20px; padding-top:20px;">\r\n    \r\n     <div class="col-md-12">\r\n         \r\n            <div class="tp-contacts">\r\n                        \r\n                <ul>\r\n                    <li>Email: info@jollof.com</li>\r\n                    <li>Phone no: +234 (909) 532 5236</li>\r\n                </ul>\r\n                \r\n            </div>\r\n            \r\n            <div class="top-logo">\r\n             \r\n                <img src="{site_logo}" />\r\n                \r\n            </div>\r\n\r\n            \r\n        </div>\r\n        \r\n        <div class="col-md-12">\r\n          \r\n            <div class="mail-welcome-hdr">\r\n              Password Reset\r\n            </div>\r\n            \r\n        </div>\r\n        \r\n        <div class="col-md-12">\r\n        \r\n         <div class="" style="margin-bottom:10px; padding-left:10px; line-height:25px;">\r\n             \r\n                Dear <span class="mail-cust-name">{customer_name},</span> <br/>\r\n                \r\n                <p>There was recently a request to change the password for your account. </p>\r\n                \r\n               <p>If you requested this password change, please click on the following link to reset your password:\r\n</p>\r\n\r\n       <p>\r\n                 <span class="msg-mail-cnct">{reset_link}</span>\r\n                </p>\r\n\r\n       <p>\r\n                 If clicking the link does not work, please copy and paste the URL into your browser instead.\r\n                </p>\r\n                \r\n                <p>\r\n                 If you did not make this request, you can ignore this message and your password will remain the same. \r\n                </p>\r\n                \r\n            </div>\r\n            \r\n            <div class="mail-msg-cnt" style="margin-top:10px; margin-bottom:10px; padding-left:10px; padding-right:10px;s">\r\n             \r\n                If you have any questions, please feel free to contact us at <span class="msg-mail-cnct">info@jollof.com</span> or by phone at <span class="msg-mail-cnct">+234 (909) 532 5236 | +234 (909) 532 5226</span>. \r\n            </div>\r\n            \r\n        </div>\r\n        \r\n    </div>\r\n    \r\n</div>\r\n\r\n</body>\r\n</html>', 1, '2017-11-14 06:04:02', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0),
(3, 'Order Submitted Confirmation', 'Thank you for your order with {site_name}!', '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">\n<html xmlns="http://www.w3.org/1999/xhtml">\n<head>\n<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />\n<title>Untitled Document</title>\n\n</head>\n\n<body>\n\n<style>\n\n.col-md-12{\n  padding-right: 15px;\n  padding-left: 15px;\n  \n}\n\n    /*.container {\n        width: 1170px;\n    }\n    \n    .container {\n        width: 970px;\n    }*/\n    \n    .container {\n        width: 80%;\n    }\n    \n    .container {\n        padding-right: 15px;\n        padding-left: 15px;\n        margin-right: auto;\n        margin-left: auto;\n    }\n    \n    * {\n        box-sizing: border-box;\n    }\n    \n    html, body {\n        font-family: Verdana;\n        font-size: 12px;\n    }\n    \n    body {\n        font-family: "Helvetica Neue",Helvetica,Arial,sans-serif;\n        font-size: 14px;\n        line-height: 1.42857;\n        color: #333;\n    }\n    \n    html {\n        font-size: 62.5%;\n    }\n    \n    html {\n        font-family: sans-serif;\n    }\n    \n    \n.clearfix::before, .clearfix::after, .container::before, .container::after, .container-fluid::before, .container-fluid::after, .row::before, .row::after, .form-horizontal .form-group::before, .form-horizontal .form-group::after, .btn-toolbar::before, .btn-toolbar::after, .btn-group-vertical > .btn-group::before, .btn-group-vertical > .btn-group::after, .nav::before, .nav::after, .navbar::before, .navbar::after, .navbar-header::before, .navbar-header::after, .navbar-collapse::before, .navbar-collapse::after, .pager::before, .pager::after, .panel-body::before, .panel-body::after, .modal-footer::before, .modal-footer::after {\n    display: table;\n    content: " ";\n}\n*::before, *::after {\n    box-sizing: border-box;\n}\n\n.col-md-12 {\n    width: 100%;\n}\n\n.col-md-4 {\n    width: 28%;\n}\n\n.col-md-1, .col-md-2, .col-mds-2, .col-md-3, .col-md-4, .col-md-5, .col-md-6, .col-md-7, .col-md-8, .col-md-9, .col-md-10, .col-md-11, .col-md-12 {\n    float: left;\n}\n.col-xs-1, .col-sm-1, .col-md-1, .col-lg-1, .col-xs-2, .col-sm-2, .col-md-2, .col-mds-2, .col-lg-2, .col-xs-3, .col-sm-3, .col-md-3, .col-lg-3, .col-xs-4, .col-sm-4, .col-md-4, .col-lg-4, .col-xs-5, .col-sm-5, .col-md-5, .col-lg-5, .col-xs-6, .col-sm-6, .col-md-6, .col-lg-6, .col-xs-7, .col-sm-7, .col-md-7, .col-lg-7, .col-xs-8, .col-sm-8, .col-md-8, .col-lg-8, .col-xs-9, .col-sm-9, .col-md-9, .col-lg-9, .col-xs-10, .col-sm-10, .col-md-10, .col-lg-10, .col-xs-11, .col-sm-11, .col-md-11, .col-lg-11, .col-xs-12, .col-sm-12, .col-md-12, .col-lg-12 {\n    position: relative;\n    min-height: 1px;\n    padding-right: 15px;\n    padding-left: 15px;\n}\n\n.page-header {\n    padding-bottom: 9px;\n    margin: 40px 0px 20px;\n}\n\nh1, h2, h3, h4, h5, h6 {\n    margin: 10px 0px;\n    font-weight: bold;\n    line-height: 20px;\n    color: #DC214C;\n    font-family: "candara";\n    text-rendering: optimizelegibility;\n}\nh2, .h2 {\n    font-size: 30px;\n}\n\n/*.container::after {\n    content: " ";\n    display: block;\n    height: 0px;\n    clear: both;\n    visibility: hidden;\n}*/\n\n.table-bordered {\n    border: 1px solid #DDD;\n}\n\n.table {\n    width: 95%;\n    margin-bottom: 20px;\n}\n\ntable {\n    max-width: 100%;\n    background-color: transparent;\n}\n\ntable {\n    border-spacing: 0px;\n    border-collapse: collapse;\n}\n\n.table > caption + thead > tr:first-child > th, .table > colgroup + thead > tr:first-child > th, .table > thead:first-child > tr:first-child > th, .table > caption + thead > tr:first-child > td, .table > colgroup + thead > tr:first-child > td, .table > thead:first-child > tr:first-child > td {\n    border-top: 0px none;\n}\n\n.table-bordered > thead > tr > th, .table-bordered > thead > tr > td {\n    border-bottom-width: 2px;\n}\n\n.table-bordered > thead > tr > th, .table-bordered > tbody > tr > th, .table-bordered > tfoot > tr > th, .table-bordered > thead > tr > td, .table-bordered > tbody > tr > td, .table-bordered > tfoot > tr > td {\n    border: 1px solid #DDD;\n}\n\n.table > thead > tr > th {\n    vertical-align: bottom;\n    border-bottom: 2px solid #DDD;\n}\n\n.table > thead > tr > th, .table > tbody > tr > th, .table > tfoot > tr > th, .table > thead > tr > td, .table > tbody > tr > td, .table > tfoot > tr > td {\n    padding: 8px;\n    line-height: 1.42857;\n    vertical-align: top;\n    border-top: 1px solid #DDD;\n}\n\nth {\n    text-align: left;\n}\n\n.table-striped > tbody > tr:nth-child(2n+1) > td, .table-striped > tbody > tr:nth-child(2n+1) > th {\n    background-color: #F9F9F9;\n}\n\n.mail-welcome-hdr{\n    font-size:18px;\n    padding-top:10px;\n    padding-bottom:10px;\n    margin-bottom:10px;\n    margin-top:10px;\n    background-color: #e74c3c;\n    text-transform: uppercase;\n    font-family:Verdana, Geneva, sans-serif;\n    font-weight: 700;\n    color:#fff;\n    text-align:center;\n}\n\n.mail-msg-usr-hdr{\n    font-weight:600;\n}\n\n.mail-msg-cnt ul{\n    padding-left:15px;\n}\n\n.mail-msg-cnt ul li{\n    margin-top:10px;\n    margin-bottom:10px; \n}\n\n.msg-mail-cnct{\n    color: #317EAC;\n    font-weight:600;\n}\n\n.msg-mail-cnct a{\n    text-decoration:none;\n    color: #317EAC;\n}\n\n.mail-cust-name{\n    font-weight:600;\n}\n\n.tp-contacts{\n    padding-top:3px;\n    overflow:auto;\n    text-align:center;\n}\n\n.tp-contacts ul{\n    padding-left:0px;\n    display: inline-block;\n}\n\n.tp-contacts ul li{\n    float:left;\n    display:inline-block;\n    margin-left:5px;\n    margin-right:5px;   \n    padding-right:15px;\n    padding-left:10px;\n    font-family: "candara";\n    font-size:14px;\n    font-weight:600;\n    border-right:1px solid #000;\n}\n\n.tp-contacts ul li:last-child{\n    border:none;\n    padding-right:0px;\n    margin-right:0px;\n}\n\n.top-logo{\n    text-align:center;\n}\n\n</style>\n\n<div class="" style="padding-bottom:30px; padding-top:30px; padding-left:2%; padding-right:2%; background-color:#cccccc; overflow: auto;">\n\n    <div class="container">\n        \n        <div class="col-md-12" style="background-color:#fff; padding-bottom:20px; padding-top:20px; padding-left:0px; padding-right:25px;">\n        \n            <div class="col-md-12">\n                \n                <div class="tp-contacts">\n                            \n                    <ul>\n                        <li>Email: info@jollof.com</li>\n                        <li>Phone no: +234 (909) 532 5236</li>\n                    </ul>\n                    \n                </div>\n                \n                <div class="top-logo">\n                    \n                    <img src="{site_logo}" />\n                    \n                </div>\n    \n                \n            </div>\n            \n            <div class="col-md-12">\n                \n                <div class="mail-welcome-hdr">\n                    Payment successfully made\n                </div>\n                \n            </div>\n            \n            <div class="col-md-12">\n            \n                <div class="" style="margin-bottom:10px; padding-left:10px; line-height:25px;">\n                    \n                    Dear <span class="mail-cust-name">{customer_name},</span> <br/>\n                   \n                    <p>Thank you for your order with {site_name}! </p>\n                  \n		  <p>Payment for <b>Order no. {order_no}</b> has been accepted.</p>\n\n		  <p>Currently, your payment is ''Being Verified''.  The supplier will begin to process your order.\nDuring this time, you are unable to do any operation on your order.</p>\n    \n                    \n                </div>\n    \n                <div class="mail-msg-cnt" style="margin-top:10px; margin-bottom:10px; padding-left:10px; padding-right:10px;s">\n    \n                   If you have any questions, please feel free to contact us at <span class="msg-mail-cnct">info@jollof.com</span> or by phone at <span class="msg-mail-cnct">+234 (909) 532 5236 | +234 (909) 532 5226</span>. \n                </div>\n                \n            </div>\n        \n        </div>\n        \n    </div>\n    \n</div>\n\n</body>\n</html>\n', 1, '2017-11-14 06:04:02', '2018-05-08 10:43:21', '0000-00-00 00:00:00', 0),
(4, 'Order Made Confirmation', 'An order {order_no} have been made with {site_name}!', '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">\n<html xmlns="http://www.w3.org/1999/xhtml">\n<head>\n<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />\n<title>Untitled Document</title>\n\n</head>\n\n<body>\n\n<style>\n\n.col-md-12{\n  padding-right: 15px;\n  padding-left: 15px;\n  \n}\n\n    /*.container {\n        width: 1170px;\n    }\n    \n    .container {\n        width: 970px;\n    }*/\n    \n    .container {\n        width: 80%;\n    }\n    \n    .container {\n        padding-right: 15px;\n        padding-left: 15px;\n        margin-right: auto;\n        margin-left: auto;\n    }\n    \n    * {\n        box-sizing: border-box;\n    }\n    \n    html, body {\n        font-family: Verdana;\n        font-size: 12px;\n    }\n    \n    body {\n        font-family: "Helvetica Neue",Helvetica,Arial,sans-serif;\n        font-size: 14px;\n        line-height: 1.42857;\n        color: #333;\n    }\n    \n    html {\n        font-size: 62.5%;\n    }\n    \n    html {\n        font-family: sans-serif;\n    }\n    \n    \n.clearfix::before, .clearfix::after, .container::before, .container::after, .container-fluid::before, .container-fluid::after, .row::before, .row::after, .form-horizontal .form-group::before, .form-horizontal .form-group::after, .btn-toolbar::before, .btn-toolbar::after, .btn-group-vertical > .btn-group::before, .btn-group-vertical > .btn-group::after, .nav::before, .nav::after, .navbar::before, .navbar::after, .navbar-header::before, .navbar-header::after, .navbar-collapse::before, .navbar-collapse::after, .pager::before, .pager::after, .panel-body::before, .panel-body::after, .modal-footer::before, .modal-footer::after {\n    display: table;\n    content: " ";\n}\n*::before, *::after {\n    box-sizing: border-box;\n}\n\n.col-md-12 {\n    width: 100%;\n}\n\n.col-md-4 {\n    width: 28%;\n}\n\n.col-md-1, .col-md-2, .col-mds-2, .col-md-3, .col-md-4, .col-md-5, .col-md-6, .col-md-7, .col-md-8, .col-md-9, .col-md-10, .col-md-11, .col-md-12 {\n    float: left;\n}\n.col-xs-1, .col-sm-1, .col-md-1, .col-lg-1, .col-xs-2, .col-sm-2, .col-md-2, .col-mds-2, .col-lg-2, .col-xs-3, .col-sm-3, .col-md-3, .col-lg-3, .col-xs-4, .col-sm-4, .col-md-4, .col-lg-4, .col-xs-5, .col-sm-5, .col-md-5, .col-lg-5, .col-xs-6, .col-sm-6, .col-md-6, .col-lg-6, .col-xs-7, .col-sm-7, .col-md-7, .col-lg-7, .col-xs-8, .col-sm-8, .col-md-8, .col-lg-8, .col-xs-9, .col-sm-9, .col-md-9, .col-lg-9, .col-xs-10, .col-sm-10, .col-md-10, .col-lg-10, .col-xs-11, .col-sm-11, .col-md-11, .col-lg-11, .col-xs-12, .col-sm-12, .col-md-12, .col-lg-12 {\n    position: relative;\n    min-height: 1px;\n    padding-right: 15px;\n    padding-left: 15px;\n}\n\n.page-header {\n    padding-bottom: 9px;\n    margin: 40px 0px 20px;\n}\n\nh1, h2, h3, h4, h5, h6 {\n    margin: 10px 0px;\n    font-weight: bold;\n    line-height: 20px;\n    color: #DC214C;\n    font-family: "candara";\n    text-rendering: optimizelegibility;\n}\nh2, .h2 {\n    font-size: 30px;\n}\n\n/*.container::after {\n    content: " ";\n    display: block;\n    height: 0px;\n    clear: both;\n    visibility: hidden;\n}*/\n\n.table-bordered {\n    border: 1px solid #DDD;\n}\n\n.table {\n    width: 95%;\n    margin-bottom: 20px;\n}\n\ntable {\n    max-width: 100%;\n    background-color: transparent;\n}\n\ntable {\n    border-spacing: 0px;\n    border-collapse: collapse;\n}\n\n.table > caption + thead > tr:first-child > th, .table > colgroup + thead > tr:first-child > th, .table > thead:first-child > tr:first-child > th, .table > caption + thead > tr:first-child > td, .table > colgroup + thead > tr:first-child > td, .table > thead:first-child > tr:first-child > td {\n    border-top: 0px none;\n}\n\n.table-bordered > thead > tr > th, .table-bordered > thead > tr > td {\n    border-bottom-width: 2px;\n}\n\n.table-bordered > thead > tr > th, .table-bordered > tbody > tr > th, .table-bordered > tfoot > tr > th, .table-bordered > thead > tr > td, .table-bordered > tbody > tr > td, .table-bordered > tfoot > tr > td {\n    border: 1px solid #DDD;\n}\n\n.table > thead > tr > th {\n    vertical-align: bottom;\n    border-bottom: 2px solid #DDD;\n}\n\n.table > thead > tr > th, .table > tbody > tr > th, .table > tfoot > tr > th, .table > thead > tr > td, .table > tbody > tr > td, .table > tfoot > tr > td {\n    padding: 8px;\n    line-height: 1.42857;\n    vertical-align: top;\n    border-top: 1px solid #DDD;\n}\n\nth {\n    text-align: left;\n}\n\n.table-striped > tbody > tr:nth-child(2n+1) > td, .table-striped > tbody > tr:nth-child(2n+1) > th {\n    background-color: #F9F9F9;\n}\n\n.mail-welcome-hdr{\n    font-size:18px;\n    padding-top:10px;\n    padding-bottom:10px;\n    margin-bottom:10px;\n    margin-top:10px;\n    background-color: #e74c3c;\n    text-transform: uppercase;\n    font-family:Verdana, Geneva, sans-serif;\n    font-weight: 700;\n    color:#fff;\n    text-align:center;\n}\n\n.mail-msg-usr-hdr{\n    font-weight:600;\n}\n\n.mail-msg-cnt ul{\n    padding-left:15px;\n}\n\n.mail-msg-cnt ul li{\n    margin-top:10px;\n    margin-bottom:10px; \n}\n\n.msg-mail-cnct{\n    color: #317EAC;\n    font-weight:600;\n}\n\n.msg-mail-cnct a{\n    text-decoration:none;\n    color: #317EAC;\n}\n\n.mail-cust-name{\n    font-weight:600;\n}\n\n.tp-contacts{\n    padding-top:3px;\n    overflow:auto;\n    text-align:center;\n}\n\n.tp-contacts ul{\n    padding-left:0px;\n    display: inline-block;\n}\n\n.tp-contacts ul li{\n    float:left;\n    display:inline-block;\n    margin-left:5px;\n    margin-right:5px;   \n    padding-right:15px;\n    padding-left:10px;\n    font-family: "candara";\n    font-size:14px;\n    font-weight:600;\n    border-right:1px solid #000;\n}\n\n.tp-contacts ul li:last-child{\n    border:none;\n    padding-right:0px;\n    margin-right:0px;\n}\n\n.top-logo{\n    text-align:center;\n}\n\n</style>\n\n<div class="" style="padding-bottom:30px; padding-top:30px; padding-left:2%; padding-right:2%; background-color:#cccccc; overflow: auto;">\n\n    <div class="container">\n        \n        <div class="col-md-12" style="background-color:#fff; padding-bottom:20px; padding-top:20px; padding-left:0px; padding-right:25px;">\n        \n            <div class="col-md-12">\n                \n                <div class="tp-contacts">\n                            \n                    <ul>\n                        <li>Email: info@jollof.com</li>\n                        <li>Phone no: +234 (909) 532 5236</li>\n                    </ul>\n                    \n                </div>\n                \n                <div class="top-logo">\n                    \n                    <img src="{site_logo}" />\n                    \n                </div>\n    \n                \n            </div>\n            \n            <div class="col-md-12">\n                \n                <div class="mail-welcome-hdr">\n                    Order no. {order_no} Placed \n                </div>\n                \n            </div>\n            \n            <div class="col-md-12">\n            \n                <div class="" style="margin-bottom:10px; padding-left:10px; line-height:25px;">\n                    \n                    Dear <span class="mail-cust-name">{merchant_name},</span> <br/>\n                   \n                    <p>An order to your store on {site_name}! have been placed </p>\n                  \n		  <p>Payment for <b>Order no. {order_no}</b> has been Made.</p>\n	           <p> Pls will begin to process the order.</p>\n\n		  \n                </div>\n    \n                <div class="mail-msg-cnt" style="margin-top:10px; margin-bottom:10px; padding-left:10px; padding-right:10px;s">\n    \n                   If you have any questions, please feel free to contact us at <span class="msg-mail-cnct">info@jollof.com</span> or by phone at <span class="msg-mail-cnct">+234 (909) 532 5236 | +234 (909) 532 5226</span>. \n                </div>\n                \n            </div>\n        \n        </div>\n        \n    </div>\n    \n</div>\n\n</body>\n</html>\n', 1, '2018-05-08 10:34:55', '2018-05-08 10:50:27', '0000-00-00 00:00:00', 0),
(5, 'Registration Confirmation Merchant', 'Thank you for registering at {site_name}! as a Merchant', '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">\r\n<html xmlns="http://www.w3.org/1999/xhtml">\r\n<head>\r\n<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />\r\n<title>Untitled Document</title>\r\n\r\n</head>\r\n\r\n<body>\r\n\r\n<style>\r\n\r\n.container {\r\n  padding-right: 15px;\r\n  padding-left: 15px;\r\n   width:90%;\r\n  margin-right: auto;\r\n  margin-left: auto;\r\n}\r\n\r\n.col-md-12{\r\n  padding-right: 15px;\r\n  padding-left: 15px;\r\n  \r\n}\r\n\r\n.mail-welcome-hdr{\r\n font-size:18px;\r\n padding-top:10px;\r\n padding-bottom:10px;\r\n  margin-bottom:10px;\r\n margin-top:10px;\r\n  background-color: #e74c3c;\r\n  text-transform: uppercase;\r\n  font-family:Verdana, Geneva, sans-serif;\r\n  font-weight: 700;\r\n color:#fff;\r\n text-align:center;\r\n}\r\n\r\n.mail-msg-usr-hdr{\r\n font-weight:600;\r\n}\r\n\r\n.mail-msg-cnt ul{\r\n  padding-left:15px;\r\n}\r\n\r\n.mail-msg-cnt ul li{\r\n margin-top:10px;\r\n  margin-bottom:10px; \r\n}\r\n\r\n.msg-mail-cnct{\r\n  color: #317EAC;\r\n font-weight:600;\r\n}\r\n\r\n.msg-mail-cnct a{\r\n  text-decoration:none;\r\n color: #317EAC;\r\n}\r\n\r\n.mail-cust-name{\r\n  font-weight:600;\r\n}\r\n.mail-msg-usr-btn{\r\n font-size:18px;\r\n padding:10px;\r\n background-color: #e74c3c;\r\n  text-transform: uppercase;\r\n  font-family:Verdana, Geneva, sans-serif;\r\n  font-weight: 700;\r\n color:#fff;\r\n   text-decoration: none;\r\n}\r\n.tp-contacts{\r\n  padding-top:3px;\r\n  overflow:auto;\r\n  text-align:center;\r\n}\r\n\r\n.tp-contacts ul{\r\n padding-left:0px;\r\n display: inline-block;\r\n}\r\n\r\n.tp-contacts ul li{\r\n  float:left;\r\n display:inline-block;\r\n margin-left:5px;\r\n  margin-right:5px; \r\n  padding-right:15px;\r\n padding-left:10px;\r\n  font-family: "AlegreyaSansSC-Thin";\r\n font-size:14px;\r\n font-weight:600;\r\n  border-right:1px solid #000;\r\n}\r\n\r\n.tp-contacts ul li:last-child{\r\n border:none;\r\n  padding-right:0px;\r\n  margin-right:0px;\r\n}\r\n\r\n.top-logo{\r\n  text-align:center;\r\n}\r\n\r\n</style>\r\n\r\n<div class="" style="padding-bottom:30px; padding-top:30px; padding-left:0px; padding-right:0px; background-color:#cccccc; ">\r\n\r\n  <div class="container" style="background-color:#fff; padding-bottom:20px; padding-top:20px;">\r\n    \r\n     <div class="col-md-12">\r\n         \r\n            <div class="tp-contacts">\r\n                        \r\n                <ul>\r\n                    <li>Email: info@jollof.com</li>\r\n                    <li>Phone no: +234 (814) 546 3611, +234 (814) 546 3478 </li>\r\n                </ul>\r\n                \r\n            </div>\r\n            \r\n            <div class="top-logo">\r\n             \r\n                <img src="{site_logo}" />\r\n                \r\n            </div>\r\n\r\n            \r\n        </div>\r\n        \r\n        <div class="col-md-12">\r\n          \r\n            <div class="mail-welcome-hdr">\r\n              Welcome to Jollof\r\n            </div>\r\n            \r\n        </div>\r\n        \r\n        <div class="col-md-12">\r\n        \r\n          <div class="" style="margin-bottom:10px; padding-left:10px; line-height:25px;">\r\n             \r\n                Dear <span class="mail-cust-name">{customer_name},</span> <br/>\r\n                \r\n                <p>Thanks for registering your store <b>"{store_name}"</b>  at jollof.com, Your participation is appreciated. </p>\n	<p>We would like to take this opportunity to welcome you as a new customer and we are thrilled to have you with us.\nAt EBS, we pride ourselves on offering our customers excellent service and we work tirelessly to ensure your complete satisfaction.</p>\r\n                 \r\n    <p>\r\n     Please confirm your account by clicking the button below:\r\n   </p>\r\n    \r\n    <div style="text-align:; padding-bottom:20px; padding-top:10px;">\r\n     <a class="mail-msg-usr-btn" href="{url_confirm}">Confirm </a>\r\n                \r\n   </div>\r\n\r\n            </div>\r\n            \r\n            <div class="" style="color:#fff; padding-bottom:10px; padding-top:10px; background-color:#3b4248; margin-top:10px; margin-bottom:10px; padding-left:10px; line-height:25px;">\r\n             Use the following when prompted to login <br />\r\n                \r\n                <span class="mail-msg-usr-hdr">Username:</span> {customer_email} <br />\r\n                <span class="mail-msg-usr-hdr">Password:</span> the password provided on signup <br />\r\n                 {voucher} \r\n                \r\n            </div>\r\n            \r\n            \r\n\r\n       If you believe you have not received a timely response to your request you can contact us at <span class="msg-mail-cnct">info@jollof.com</span> or by phone at <span class="msg-mail-cnct">+2348145463611 | +2348145463478 </span> to escalate. \r\n            </div>\r\n            \r\n        </div>\r\n        \r\n    </div>\r\n    \r\n</div>\r\n\r\n</body>\r\n</html>', 1, '2017-11-14 06:04:02', '2018-06-08 10:49:32', '0000-00-00 00:00:00', 0),
(6, 'Password Reset Merchant', 'Password Reset Confirmation for {customer_name}!', '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">\r\n<html xmlns="http://www.w3.org/1999/xhtml">\r\n<head>\r\n<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />\r\n<title>Untitled Document</title>\r\n\r\n</head>\r\n\r\n<body>\r\n\r\n<style>\r\n\r\n.container {\r\n  padding-right: 15px;\r\n  padding-left: 15px;\r\n   width:90%;\r\n  margin-right: auto;\r\n  margin-left: auto;\r\n}\r\n\r\n.col-md-12{\r\n  padding-right: 15px;\r\n  padding-left: 15px;\r\n  \r\n}\r\n\r\n.mail-welcome-hdr{\r\n font-size:18px;\r\n padding-top:10px;\r\n padding-bottom:10px;\r\n  margin-bottom:10px;\r\n margin-top:10px;\r\n  background-color: #e74c3c;\r\n  text-transform: uppercase;\r\n  font-family:Verdana, Geneva, sans-serif;\r\n  font-weight: 700;\r\n color:#fff;\r\n text-align:center;\r\n}\r\n\r\n.mail-msg-usr-hdr{\r\n font-weight:600;\r\n}\r\n\r\n.mail-msg-cnt ul{\r\n  padding-left:15px;\r\n}\r\n\r\n.mail-msg-cnt ul li{\r\n margin-top:10px;\r\n  margin-bottom:10px; \r\n}\r\n\r\n.msg-mail-cnct{\r\n  color: #317EAC;\r\n font-weight:600;\r\n}\r\n\r\n.msg-mail-cnct a{\r\n  text-decoration:none;\r\n color: #DC214C;\r\n}\r\n\r\n.mail-cust-name{\r\n  font-weight:600;\r\n}\r\n\r\n.tp-contacts{\r\n  padding-top:3px;\r\n  overflow:auto;\r\n  text-align:center;\r\n}\r\n\r\n.tp-contacts ul{\r\n padding-left:0px;\r\n display: inline-block;\r\n}\r\n\r\n.tp-contacts ul li{\r\n  float:left;\r\n display:inline-block;\r\n margin-left:5px;\r\n  margin-right:5px; \r\n  padding-right:15px;\r\n padding-left:10px;\r\n  font-family: "candara";\r\n font-size:14px;\r\n font-weight:600;\r\n  border-right:1px solid #000;\r\n}\r\n\r\n.tp-contacts ul li:last-child{\r\n border:none;\r\n  padding-right:0px;\r\n  margin-right:0px;\r\n}\r\n\r\n.top-logo{\r\n  text-align:center;\r\n}\r\n\r\n</style>\r\n\r\n<div class="" style="padding-bottom:30px; padding-top:30px; padding-left:0px; padding-right:0px; background-color:#cccccc; ">\r\n\r\n  <div class="container" style="background-color:#fff; padding-bottom:20px; padding-top:20px;">\r\n    \r\n     <div class="col-md-12">\r\n         \r\n            <div class="tp-contacts">\r\n                        \r\n                <ul>\r\n                    <li>Email: info@jollof.com</li>\r\n                    <li>Phone no: +234 (909) 532 5236</li>\r\n                </ul>\r\n                \r\n            </div>\r\n            \r\n            <div class="top-logo">\r\n             \r\n                <img src="{site_logo}" />\r\n                \r\n            </div>\r\n\r\n            \r\n        </div>\r\n        \r\n        <div class="col-md-12">\r\n          \r\n            <div class="mail-welcome-hdr">\r\n              Password Reset\r\n            </div>\r\n            \r\n        </div>\r\n        \r\n        <div class="col-md-12">\r\n        \r\n         <div class="" style="margin-bottom:10px; padding-left:10px; line-height:25px;">\r\n             \r\n                Dear <span class="mail-cust-name">{customer_name},</span> <br/>\r\n                \r\n                <p>There was recently a request to change the password for your account. </p>\r\n                \r\n               <p>If you requested this password change, please click on the following link to reset your password:\r\n</p>\r\n\r\n       <p>\r\n                 <span class="msg-mail-cnct">{reset_link}</span>\r\n                </p>\r\n\r\n       <p>\r\n                 If clicking the link does not work, please copy and paste the URL into your browser instead.\r\n                </p>\r\n                \r\n                <p>\r\n                 If you did not make this request, you can ignore this message and your password will remain the same. \r\n                </p>\r\n                \r\n            </div>\r\n            \r\n            <div class="mail-msg-cnt" style="margin-top:10px; margin-bottom:10px; padding-left:10px; padding-right:10px;s">\r\n             \r\n                If you have any questions, please feel free to contact us at <span class="msg-mail-cnct">info@jollof.com</span> or by phone at <span class="msg-mail-cnct">+234 (909) 532 5236 | +234 (909) 532 5226</span>. \r\n            </div>\r\n            \r\n        </div>\r\n        \r\n    </div>\r\n    \r\n</div>\r\n\r\n</body>\r\n</html>', 1, '2017-11-14 06:04:02', '2018-05-08 12:29:05', '0000-00-00 00:00:00', 0),
(7, 'Confirmation Merchant New User', 'New User at {store_name} in {site_name}! as a Admin User', '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">\r\n<html xmlns="http://www.w3.org/1999/xhtml">\r\n<head>\r\n<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />\r\n<title>Untitled Document</title>\r\n\r\n</head>\r\n\r\n<body>\r\n\r\n<style>\r\n\r\n.container {\r\n  padding-right: 15px;\r\n  padding-left: 15px;\r\n   width:90%;\r\n  margin-right: auto;\r\n  margin-left: auto;\r\n}\r\n\r\n.col-md-12{\r\n  padding-right: 15px;\r\n  padding-left: 15px;\r\n  \r\n}\r\n\r\n.mail-welcome-hdr{\r\n font-size:18px;\r\n padding-top:10px;\r\n padding-bottom:10px;\r\n  margin-bottom:10px;\r\n margin-top:10px;\r\n  background-color: #e74c3c;\r\n  text-transform: uppercase;\r\n  font-family:Verdana, Geneva, sans-serif;\r\n  font-weight: 700;\r\n color:#fff;\r\n text-align:center;\r\n}\r\n\r\n.mail-msg-usr-hdr{\r\n font-weight:600;\r\n}\r\n\r\n.mail-msg-cnt ul{\r\n  padding-left:15px;\r\n}\r\n\r\n.mail-msg-cnt ul li{\r\n margin-top:10px;\r\n  margin-bottom:10px; \r\n}\r\n\r\n.msg-mail-cnct{\r\n  color: #317EAC;\r\n font-weight:600;\r\n}\r\n\r\n.msg-mail-cnct a{\r\n  text-decoration:none;\r\n color: #317EAC;\r\n}\r\n\r\n.mail-cust-name{\r\n  font-weight:600;\r\n}\r\n.mail-msg-usr-btn{\r\n font-size:18px;\r\n padding:10px;\r\n background-color: #e74c3c;\r\n  text-transform: uppercase;\r\n  font-family:Verdana, Geneva, sans-serif;\r\n  font-weight: 700;\r\n color:#fff;\r\n   text-decoration: none;\r\n}\r\n.tp-contacts{\r\n  padding-top:3px;\r\n  overflow:auto;\r\n  text-align:center;\r\n}\r\n\r\n.tp-contacts ul{\r\n padding-left:0px;\r\n display: inline-block;\r\n}\r\n\r\n.tp-contacts ul li{\r\n  float:left;\r\n display:inline-block;\r\n margin-left:5px;\r\n  margin-right:5px; \r\n  padding-right:15px;\r\n padding-left:10px;\r\n  font-family: "AlegreyaSansSC-Thin";\r\n font-size:14px;\r\n font-weight:600;\r\n  border-right:1px solid #000;\r\n}\r\n\r\n.tp-contacts ul li:last-child{\r\n border:none;\r\n  padding-right:0px;\r\n  margin-right:0px;\r\n}\r\n\r\n.top-logo{\r\n  text-align:center;\r\n}\r\n\r\n</style>\r\n\r\n<div class="" style="padding-bottom:30px; padding-top:30px; padding-left:0px; padding-right:0px; background-color:#cccccc; ">\r\n\r\n  <div class="container" style="background-color:#fff; padding-bottom:20px; padding-top:20px;">\r\n    \r\n     <div class="col-md-12">\r\n         \r\n            <div class="tp-contacts">\r\n                        \r\n                <ul>\r\n                    <li>Email: info@jollof.com</li>\r\n                    <li>Phone no: +234 (814) 546 3611, +234 (814) 546 3478 </li>\r\n                </ul>\r\n                \r\n            </div>\r\n            \r\n            <div class="top-logo">\r\n             \r\n                <img src="{site_logo}" />\r\n                \r\n            </div>\r\n\r\n            \r\n        </div>\r\n        \r\n        <div class="col-md-12">\r\n          \r\n            <div class="mail-welcome-hdr">\r\n              Welcome to Jollof\r\n            </div>\r\n            \r\n        </div>\r\n        \r\n        <div class="col-md-12">\r\n        \r\n          <div class="" style="margin-bottom:10px; padding-left:10px; line-height:25px;">\r\n             \r\n                Dear <span class="mail-cust-name">{customer_name},</span> <br/>\r\n                \r\n                <p>Please find below the login details to your user account on Jollof platform:</p>\r\n                 \r\n\r\n            </div>\r\n            \r\n            <div class="" style="color:#fff; padding-bottom:10px; padding-top:10px; background-color:#3b4248; margin-top:10px; margin-bottom:10px; padding-left:10px; line-height:25px;">\r\n             Use the following when prompted to login <br />\r\n                \r\n                <span class="mail-msg-usr-hdr">Username:</span> {customer_email} <br />\r\n                <span class="mail-msg-usr-hdr">Password:</span> the password will be provided on confirmation  <br />\r\n                \r\n            </div>\n<p>\r\n     Please confirm your account by clicking the button below:\r\n   </p>\r\n    \r\n    <div style="text-align:; padding-bottom:20px; padding-top:10px;">\r\n     <a class="mail-msg-usr-btn" href="{url_confirm}">Confirm </a>\r\n                \r\n   </div>\r\n            \r\n            \r\n\r\n       If you believe you have not received a timely response to your request you can contact us at <span class="msg-mail-cnct">info@jollof.com</span> or by phone at <span class="msg-mail-cnct">+2348145463611 | +2348145463478 </span> to escalate. \r\n            </div>\r\n            \r\n        </div>\r\n        \r\n    </div>\r\n    \r\n</div>\r\n\r\n</body>\r\n</html>', 1, '2017-11-14 06:04:02', '2018-06-11 10:34:56', '0000-00-00 00:00:00', 0),
(8, 'Merchant verifiation Email', 'Jollof Merchant Verifiation Confirmed', '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">\r\n<html xmlns="http://www.w3.org/1999/xhtml">\r\n<head>\r\n<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />\r\n<title>Untitled Document</title>\r\n\r\n</head>\r\n\r\n<body>\r\n\r\n<style>\r\n\r\n.container {\r\n  padding-right: 15px;\r\n  padding-left: 15px;\r\n   width:90%;\r\n  margin-right: auto;\r\n  margin-left: auto;\r\n}\r\n\r\n.col-md-12{\r\n  padding-right: 15px;\r\n  padding-left: 15px;\r\n  \r\n}\r\n\r\n.mail-welcome-hdr{\r\n font-size:18px;\r\n padding-top:10px;\r\n padding-bottom:10px;\r\n  margin-bottom:10px;\r\n margin-top:10px;\r\n  background-color: #e74c3c;\r\n  text-transform: uppercase;\r\n  font-family:Verdana, Geneva, sans-serif;\r\n  font-weight: 700;\r\n color:#fff;\r\n text-align:center;\r\n}\r\n\r\n.mail-msg-usr-hdr{\r\n font-weight:600;\r\n}\r\n\r\n.mail-msg-cnt ul{\r\n  padding-left:15px;\r\n}\r\n\r\n.mail-msg-cnt ul li{\r\n margin-top:10px;\r\n  margin-bottom:10px; \r\n}\r\n\r\n.msg-mail-cnct{\r\n  color: #317EAC;\r\n font-weight:600;\r\n}\r\n\r\n.msg-mail-cnct a{\r\n  text-decoration:none;\r\n color: #317EAC;\r\n}\r\n\r\n.mail-cust-name{\r\n  font-weight:600;\r\n}\r\n.mail-msg-usr-btn{\r\n font-size:18px;\r\n padding:10px;\r\n background-color: #e74c3c;\r\n  text-transform: uppercase;\r\n  font-family:Verdana, Geneva, sans-serif;\r\n  font-weight: 700;\r\n color:#fff;\r\n   text-decoration: none;\r\n}\r\n.tp-contacts{\r\n  padding-top:3px;\r\n  overflow:auto;\r\n  text-align:center;\r\n}\r\n\r\n.tp-contacts ul{\r\n padding-left:0px;\r\n display: inline-block;\r\n}\r\n\r\n.tp-contacts ul li{\r\n  float:left;\r\n display:inline-block;\r\n margin-left:5px;\r\n  margin-right:5px; \r\n  padding-right:15px;\r\n padding-left:10px;\r\n  font-family: "AlegreyaSansSC-Thin";\r\n font-size:14px;\r\n font-weight:600;\r\n  border-right:1px solid #000;\r\n}\r\n\r\n.tp-contacts ul li:last-child{\r\n border:none;\r\n  padding-right:0px;\r\n  margin-right:0px;\r\n}\r\n\r\n.top-logo{\r\n  text-align:center;\r\n}\r\n\r\n</style>\r\n\r\n<div class="" style="padding-bottom:30px; padding-top:30px; padding-left:0px; padding-right:0px; background-color:#cccccc; ">\r\n\r\n  <div class="container" style="background-color:#fff; padding-bottom:20px; padding-top:20px;">\r\n    \r\n     <div class="col-md-12">\r\n         \r\n            <div class="tp-contacts">\r\n                        \r\n                <ul>\r\n                    <li>Email: info@jollof.com</li>\r\n                    <li>Phone no: +234 (814) 546 3611, +234 (814) 546 3478 </li>\r\n                </ul>\r\n                \r\n            </div>\r\n            \r\n            <div class="top-logo">\r\n             \r\n                <img src="{site_logo}" />\r\n                \r\n            </div>\r\n\r\n            \r\n        </div>\r\n        \r\n        <div class="col-md-12">\r\n          \r\n            <div class="mail-welcome-hdr">\r\n              Welcome to Jollof\r\n            </div>\r\n            \r\n        </div>\r\n        \r\n        <div class="col-md-12">\r\n        \r\n          <div class="" style="margin-bottom:10px; padding-left:10px; line-height:25px;">\r\n             \r\n                Dear <span class="mail-cust-name">{customer_name},</span> <br/>\r\n                \r\n                <p>Thanks for registering your store <b>"{store_name}"</b>  at jollof.com, Your participation is appreciated. </p>\r\n	<p>We would like to take this opportunity to let you know your Store verification Process is  complete satisfaction.</p>\r\n                 \r\n    <p>\r\n     Please Login to your account by clicking the button below to complete your registration:\r\n   </p>\r\n    \r\n    <div style="text-align:; padding-bottom:20px; padding-top:10px;">\r\n     <a class="mail-msg-usr-btn" href="{url_confirm}">Login </a>\r\n                \r\n   </div>\r\n\r\n            </div>\r\n            \r\n            <div class="" style="color:#fff; padding-bottom:10px; padding-top:10px; background-color:#3b4248; margin-top:10px; margin-bottom:10px; padding-left:10px; line-height:25px;">\r\n             Use the following when prompted to login <br />\r\n                \r\n                <span class="mail-msg-usr-hdr">Username:</span> {customer_email} <br />\r\n                <span class="mail-msg-usr-hdr">Password:</span> the password provided on signup <br />\r\n                 {voucher} \r\n                \r\n            </div>\r\n            \r\n            \r\n\r\n       If you believe you have not received a timely response to your request you can contact us at <span class="msg-mail-cnct">info@jollof.com</span> or by phone at <span class="msg-mail-cnct">+2348145463611 | +2348145463478 </span> to escalate. \r\n            </div>\r\n            \r\n        </div>\r\n        \r\n    </div>\r\n    \r\n</div>\r\n\r\n</body>\r\n</html>', 0, '2018-09-19 10:53:46', '2018-09-19 10:54:20', '0000-00-00 00:00:00', 0);

-- --------------------------------------------------------

--
-- Table structure for table `img_ads`
--

CREATE TABLE `img_ads` (
  `id` int(11) NOT NULL,
  `imageurl` varchar(200) DEFAULT NULL,
  `imagename` varchar(200) NOT NULL,
  `arrangeimage` int(11) NOT NULL DEFAULT '100',
  `bannertypeid` int(11) NOT NULL,
  `promodurationid` int(11) DEFAULT NULL,
  `usertype` varchar(200) NOT NULL,
  `merchantid` int(11) DEFAULT NULL,
  `userid` int(11) DEFAULT NULL,
  `username` varchar(200) NOT NULL,
  `useremail` varchar(200) NOT NULL,
  `userphone` char(20) NOT NULL,
  `useradd` varchar(200) NOT NULL,
  `payment` varchar(200) NOT NULL DEFAULT '0',
  `status` tinyint(4) NOT NULL DEFAULT '0',
  `startdate` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
  `enddate` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `admin_read_status` tinyint(4) NOT NULL DEFAULT '0',
  `createdat` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updatedat` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `deletedat` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `isdeleted` tinyint(4) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `img_ads`
--

INSERT INTO `img_ads` (`id`, `imageurl`, `imagename`, `arrangeimage`, `bannertypeid`, `promodurationid`, `usertype`, `merchantid`, `userid`, `username`, `useremail`, `userphone`, `useradd`, `payment`, `status`, `startdate`, `enddate`, `admin_read_status`, `createdat`, `updatedat`, `deletedat`, `isdeleted`) VALUES
(1, NULL, 'food.png', 1, 1, 1, 'admin', NULL, 1, 'ebs', 'admin@ebs.com', '0808099223', '', '0', 1, '2018-04-03 19:17:20', '0000-00-00 00:00:00', 0, '2017-11-29 11:02:10', '2018-04-03 19:17:20', '0000-00-00 00:00:00', 0),
(2, 'http://en.muzmo.ru/info?id=46821400&show_lyrics=orig', 'food.png', 2, 1, 1, 'thirdparty', NULL, 0, 'Weak Joe', 'weak@boyoo.com', '08080808765', 'music', '0', 1, '2018-08-12 22:30:42', '0000-00-00 00:00:00', 0, '2017-11-30 11:13:54', '2018-08-12 22:30:42', '0000-00-00 00:00:00', 0),
(3, NULL, 'fo.png', 1, 2, 1, 'admin', NULL, 1, 'ebs', 'admin@ebs.com', '0808007433', '', '0', 1, '2017-11-29 11:13:54', '0000-00-00 00:00:00', 0, '2017-11-29 11:13:54', '2017-11-29 11:13:54', '0000-00-00 00:00:00', 0),
(4, 'http://en.muzmo.ru/info?id=46821400&show_lyrics=orig', 'CPRimagefor landingpagebanner(beneath).png', 2, 1, 1, 'thirdparty', NULL, 0, 'Weak Joe', 'weak@boyoo.com', '08080808765', 'music', '0', 0, '2018-08-31 13:48:00', '0000-00-00 00:00:00', 0, '2017-11-29 11:14:40', '2018-08-31 13:48:00', '0000-00-00 00:00:00', 0),
(5, NULL, 'fo.png', 1, 2, 1, 'cuisine', 3, 25, 'Bukka Hats', 'admin@bukkahat.com', '08083112334', '', '0', 1, '2018-08-31 14:08:23', '2017-12-27 23:00:00', 0, '2017-11-29 11:14:40', '2018-08-31 14:08:23', '0000-00-00 00:00:00', 0),
(6, NULL, 'friedricecombo(chicken)N1100.jpg', 1, 2, 1, 'admin', NULL, NULL, '', '', '', '', '0', 1, '2017-11-29 13:41:39', '0000-00-00 00:00:00', 0, '2017-11-29 13:41:39', '2017-11-29 13:41:39', '0000-00-00 00:00:00', 0),
(7, NULL, 'friedriceN300.jpg', 1, 2, 1, 'admin', NULL, 1, '', '', '', '', '0', 1, '2017-11-29 13:41:39', '0000-00-00 00:00:00', 0, '2017-11-29 13:41:39', '2017-11-29 13:41:39', '0000-00-00 00:00:00', 0),
(8, NULL, 'friedfishN400.jpg', 1, 2, 1, 'admin', NULL, 1, '', '', '', '', '0', 1, '2017-11-29 13:41:39', '0000-00-00 00:00:00', 0, '2017-11-29 13:41:39', '2017-11-29 13:41:39', '0000-00-00 00:00:00', 0),
(9, NULL, 'EjaKikaN500.jpg', 1, 2, 1, 'admin', NULL, 1, '', '', '', '', '0', 1, '2018-03-21 07:28:48', '0000-00-00 00:00:00', 0, '2017-11-29 13:41:39', '2018-03-21 07:28:48', '0000-00-00 00:00:00', 0),
(10, NULL, 'eggN70.jpg', 1, 2, 1, 'admin', NULL, 1, '', '', '', '', '0', 1, '2018-04-03 19:21:39', '0000-00-00 00:00:00', 0, '2017-11-29 13:41:39', '2018-04-03 19:21:39', '0000-00-00 00:00:00', 0),
(11, NULL, 'eforiroN200.jpg', 1, 2, 1, 'admin', NULL, 1, '', '', '', '', '0', 1, '2018-03-21 07:28:51', '0000-00-00 00:00:00', 0, '2017-11-29 13:41:39', '2018-03-21 07:28:51', '0000-00-00 00:00:00', 0),
(12, NULL, 'edikaikongN250.jpg', 1, 2, 1, 'thirdparty', NULL, NULL, 'ada', 'chin@ada.com', '', '', '0', 1, '2018-08-03 13:26:48', '0000-00-00 00:00:00', 0, '2017-11-29 13:41:39', '2018-08-03 13:26:48', '0000-00-00 00:00:00', 0),
(13, NULL, 'ebaN100.JPG', 1, 2, 1, 'cuisine', 3, 25, '', '', '', '', '0', 1, '2018-08-31 14:08:27', '2017-12-19 23:00:00', 0, '2017-11-29 13:41:39', '2018-08-31 14:08:27', '0000-00-00 00:00:00', 0),
(14, NULL, 'chickenN600.jpg', 1, 2, 1, 'cuisine', 3, 25, '', '', '', '', '0', 0, '2018-08-31 14:08:30', '2018-01-30 23:00:00', 0, '2017-11-29 13:41:39', '2018-08-31 14:08:30', '0000-00-00 00:00:00', 0),
(15, NULL, 'catfishpeppersoupN2000.jpg', 1, 2, 1, 'cuisine', 3, 25, '', '', '', '', '0', 0, '2018-08-31 14:08:33', '2018-01-05 23:00:00', 0, '2017-11-29 13:41:39', '2018-08-31 14:08:33', '0000-00-00 00:00:00', 0),
(16, NULL, 'beefN50each.jpg', 1, 2, 1, 'cuisine', 3, 25, '', '', '', '', '0', 0, '2018-08-31 14:08:35', '2017-12-26 23:00:00', 0, '2017-11-29 13:41:39', '2018-08-31 14:08:35', '0000-00-00 00:00:00', 0),
(17, NULL, 'beansN100.jpg', 1, 2, 1, 'thirdparty', NULL, NULL, 'dav', 'joe', '', '', '0', 0, '2018-08-04 14:20:15', '0000-00-00 00:00:00', 0, '2017-11-29 13:41:39', '2018-08-04 14:20:15', '0000-00-00 00:00:00', 0),
(18, NULL, 'assortedmeat.jpg', 1, 2, 1, 'cuisine', 3, 25, '', '', '', '', '0', 0, '2018-08-31 14:08:37', '2018-01-30 23:00:00', 0, '2017-11-29 13:41:39', '2018-08-31 14:08:37', '0000-00-00 00:00:00', 0),
(19, NULL, 'ad1.png', 0, 3, 1, 'admin', NULL, 3, 'ebs', '', '', '', '0', 1, '2018-05-21 12:58:02', '0000-00-00 00:00:00', 0, '2017-11-29 13:41:39', '2018-05-21 12:58:02', '0000-00-00 00:00:00', 0),
(20, 'http://en.muzmo.ru/info?id=46821400&show_lyrics=orig', 'food.png', 2, 4, 1, 'admin', NULL, 1, 'ebs', 'weak@boyoo.com', '08080808765', 'music', '0', 0, '2018-04-04 10:17:59', '0000-00-00 00:00:00', 0, '2017-11-30 11:13:54', '2018-04-04 10:17:59', '0000-00-00 00:00:00', 0),
(21, 'http://en.muzmo.ru/info?id=46821400&show_lyrics=orig', 'CPRimagefor landingpagebanner(beneath).png', 1, 4, 1, 'thirdparty', NULL, 1, 'Weak Joe', 'weak@boyoo.com', '08080808765', 'music', '0', 1, '2018-08-31 14:45:41', '0000-00-00 00:00:00', 0, '2017-11-29 11:14:40', '2018-08-31 14:45:41', '0000-00-00 00:00:00', 0),
(22, NULL, 'bnP6_banner1522841953.png', 1, 4, 1, 'admin', NULL, 25, 'oy3', '', '', '', '0', 1, '2018-08-31 14:06:28', '0000-00-00 00:00:00', 0, '2018-04-04 11:39:13', '2018-08-31 14:06:28', '0000-00-00 00:00:00', 0),
(23, NULL, '2qZj_banner1522841971.jpg', 1, 4, 1, 'admin', NULL, 25, 'oy3', '', '', '', '0', 1, '2018-08-31 14:06:22', '0000-00-00 00:00:00', 0, '2018-04-04 11:39:31', '2018-08-31 14:06:22', '0000-00-00 00:00:00', 0),
(24, 'https://staging.jollof.com/fashion/store/ali-vip-store/women-pumps-sexy-glisten-women-shoes-wedding-party-dress-heels-women-hollow-shallow-mouth-high-heels-stiletto', 'JMSs_banner1522842026.jpeg', 1, 4, 1, 'admin', NULL, 25, 'oy3', '', '', '', '0', 1, '2018-08-31 14:06:21', '0000-00-00 00:00:00', 0, '2018-04-04 11:40:26', '2018-08-31 14:06:21', '0000-00-00 00:00:00', 0),
(25, NULL, 'GGut_banner1522842068.png', 1, 4, 1, 'admin', NULL, 25, 'oy3', '', '', '', '0', 1, '2018-08-31 14:06:20', '0000-00-00 00:00:00', 0, '2018-04-04 11:41:08', '2018-08-31 14:06:20', '0000-00-00 00:00:00', 0),
(26, NULL, 'RtqH_banner1522853958.jpeg', 1, 4, 1, 'admin', NULL, 45, 'admin', '', '', '', '0', 1, '2018-08-31 14:06:19', '0000-00-00 00:00:00', 0, '2018-04-04 14:59:18', '2018-08-31 14:06:19', '0000-00-00 00:00:00', 0),
(27, NULL, 'ad2.png', 1, 3, 1, 'admin', NULL, 3, 'ebs', '', '', '', '0', 1, '2018-05-21 11:30:14', '0000-00-00 00:00:00', 0, '2017-11-29 13:41:39', '2018-05-21 11:30:14', '0000-00-00 00:00:00', 0),
(28, NULL, 'ad3.png', 1, 3, 1, 'admin', NULL, 3, 'ebs', '', '', '', '0', 1, '2018-05-21 11:30:14', '0000-00-00 00:00:00', 0, '2017-11-29 13:41:39', '2018-05-21 11:30:14', '0000-00-00 00:00:00', 0),
(29, NULL, 'ad4.png', 1, 3, 1, 'admin', NULL, 3, 'ebs', '', '', '', '0', 1, '2018-05-21 11:30:14', '0000-00-00 00:00:00', 0, '2017-11-29 13:41:39', '2018-05-21 11:30:14', '0000-00-00 00:00:00', 0),
(30, NULL, 'ad5.png', 1, 3, 1, 'admin', NULL, 3, 'ebs', '', '', '', '0', 1, '2018-06-01 10:16:23', '0000-00-00 00:00:00', 0, '2017-11-29 13:41:39', '2018-06-01 10:16:23', '0000-00-00 00:00:00', 0),
(31, NULL, 'ad1.png', 0, 7, 1, 'cuisine', 3, 25, '25', '', '', '', 'FREE', 1, '2018-08-31 14:08:47', '0000-00-00 00:00:00', 0, '2017-11-29 13:41:39', '2018-08-31 14:08:47', '0000-00-00 00:00:00', 0),
(34, NULL, 'bg_2.jpg', 0, 6, 1, 'cuisine', 3, 25, '25', '', '', '', 'FREE', 1, '2018-08-31 14:08:47', '0000-00-00 00:00:00', 0, '2017-11-29 13:41:39', '2018-08-31 14:08:47', '0000-00-00 00:00:00', 0),
(35, NULL, 'bg_3.jpg', 1, 6, 1, 'cuisine', 3, 25, '25', '', '', '', 'FREE', 1, '2018-08-31 14:08:48', '0000-00-00 00:00:00', 0, '2017-11-29 13:41:39', '2018-08-31 14:08:48', '0000-00-00 00:00:00', 0),
(36, NULL, '3__banner1513693155.png', 1, 6, 1, 'cuisine', 3, 25, '25', '', '', '', 'FREE', 1, '2018-08-31 14:08:49', '0000-00-00 00:00:00', 0, '2017-11-29 13:41:39', '2018-08-31 14:08:49', '0000-00-00 00:00:00', 0),
(37, NULL, '3_RxAc_banner1527861640.png', 1, 7, 1, 'cuisine', 3, 25, '25', '', '', '', 'FREE', 1, '2018-08-31 14:08:50', '0000-00-00 00:00:00', 0, '2018-06-01 14:00:40', '2018-08-31 14:08:50', '0000-00-00 00:00:00', 0),
(38, NULL, '3_2bcE_banner1527861829.png', 1, 7, 1, 'cuisine', 3, 25, '25', '', '', '', 'free', 1, '2018-08-31 14:08:51', '0000-00-00 00:00:00', 0, '2018-06-01 14:03:49', '2018-08-31 14:08:51', '0000-00-00 00:00:00', 0),
(39, NULL, 'ZxVS_banner1528410436.png', 1, 4, 1, 'admin', NULL, 1, 'ebs', '', '', '', '0', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '2018-06-07 22:27:16', '2018-06-07 22:27:16', '0000-00-00 00:00:00', 0),
(40, NULL, 'pwHV_banner1528410462.png', 1, 4, 1, 'admin', NULL, 1, 'ebs', '', '', '', '0', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '2018-06-07 22:27:42', '2018-06-07 22:27:42', '0000-00-00 00:00:00', 0),
(41, NULL, 'BX2Q_banner1528410779.png', 1, 4, 1, 'admin', NULL, 1, 'ebs', '', '', '', '0', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '2018-06-07 22:32:59', '2018-06-07 22:32:59', '0000-00-00 00:00:00', 0),
(42, 'https://www.udemy.com/learn-java-se-8-and-prepare-for-the-java-associate-exam/', 'promo_1531835722.png', 1, 9, 3, 'fashion', 16, 26, 'Bongiwe Walazasss', '', '', '', 'FREE', 0, '2018-07-30 23:00:00', '2018-08-30 23:00:00', 0, '2018-07-17 13:55:22', '2018-07-18 16:00:16', '0000-00-00 00:00:00', 0),
(43, 'https://www.udemy.com/learn-java-se-8-and-prepare-for-the-java-associate-exam/', 'promo_1531835919.png', 1, 9, 3, 'fashion', 16, 26, 'Bongiwe Walazasss', '', '', '', 'FREE', 0, '2018-07-18 15:25:23', '2018-08-16 23:00:00', 0, '2018-07-17 13:58:39', '2018-07-18 15:25:23', '2018-07-17 15:42:56', 1),
(46, NULL, 'banner03.jpg', 1, 8, 1, 'admin', NULL, 1, ' ', '', '', '', '0', 1, '2018-08-12 16:31:26', '0000-00-00 00:00:00', 0, '2018-08-12 16:27:21', '2018-08-12 16:31:26', '0000-00-00 00:00:00', 0),
(48, NULL, 'admin_1534091952.png', 1, 8, 1, 'admin', NULL, 1, ' ', '', '', '', '0', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '2018-08-12 16:39:12', '2018-08-12 16:39:12', '0000-00-00 00:00:00', 0),
(49, NULL, 'admin_1534095816.png', 1, 8, 1, 'admin', NULL, 1, ' ', '', '', '', '0', 0, '2018-08-12 17:54:19', '0000-00-00 00:00:00', 0, '2018-08-12 17:43:36', '2018-08-12 17:54:19', '0000-00-00 00:00:00', 0),
(50, '', 'promo_1534346885.png', 1, 4, 5, 'cuisine', 3, 25, 'Bukka Huts', '', '', '', 'FREE', 0, '2018-08-15 15:38:34', '2019-02-15 23:00:00', 0, '2018-08-15 15:28:05', '2018-08-15 15:38:34', '2018-08-15 16:38:34', 1),
(51, '', 'promo_1534347715.png', 1, 3, 1, 'cuisine', 3, 25, 'Bukka Huts', '', '', '', 'FREE', 0, '2018-08-23 09:58:02', '2018-08-16 23:00:00', 0, '2018-08-15 15:41:55', '2018-08-23 09:58:02', '0000-00-00 00:00:00', 0),
(52, NULL, 'bg_1.jpg', 1, 11, 0, 'admin', NULL, NULL, 'ebs admin', '', '', '', '0', 1, '2018-08-28 12:19:08', '0000-00-00 00:00:00', 0, '2018-08-28 08:20:06', '2018-08-28 12:19:08', '0000-00-00 00:00:00', 0),
(53, NULL, 'bg_2.jpg', 1, 11, 0, 'admin', NULL, NULL, 'ebs admin', '', '', '', '0', 1, '2018-08-28 12:19:06', '0000-00-00 00:00:00', 0, '2018-08-28 08:20:57', '2018-08-28 12:19:06', '0000-00-00 00:00:00', 0),
(54, NULL, 'bg_3.jpg', 1, 11, NULL, 'admin', NULL, NULL, 'ebs admin', '', '', '', '0', 1, '2018-08-28 12:19:05', '0000-00-00 00:00:00', 0, '2018-08-28 09:16:01', '2018-08-28 12:19:05', '0000-00-00 00:00:00', 0),
(59, NULL, 'admin_2xDp4dhN.jpg', 100, 11, NULL, 'admin', NULL, 1, ' ', '', '', '', '0', 1, '2018-08-28 12:21:59', '0000-00-00 00:00:00', 0, '2018-08-28 11:52:09', '2018-08-28 12:21:59', '2018-08-28 12:52:51', 1),
(60, NULL, 'admin_KkCHervC.jpg', 100, 11, NULL, 'admin', NULL, 1, ' ', '', '', '', '0', 1, '2018-08-28 12:22:02', '0000-00-00 00:00:00', 0, '2018-08-28 11:52:20', '2018-08-28 12:22:02', '2018-08-28 12:52:51', 1),
(61, NULL, 'admin_2VfdTk6H.jpg', 100, 11, NULL, 'admin', NULL, 1, ' ', '', '', '', '0', 1, '2018-08-28 12:22:05', '0000-00-00 00:00:00', 0, '2018-08-28 11:54:14', '2018-08-28 12:22:05', '2018-08-28 12:54:30', 1),
(62, NULL, 'admin_RZbkft8a.jpg', 100, 11, NULL, 'admin', NULL, 1, ' ', '', '', '', '0', 1, '2018-08-28 12:22:06', '0000-00-00 00:00:00', 0, '2018-08-28 11:55:31', '2018-08-28 12:22:06', '2018-08-28 12:55:44', 1),
(63, NULL, 'admin_QeYdCksQ.jpg', 100, 11, NULL, 'admin', NULL, 1, ' ', '', '', '', '0', 1, '2018-08-28 12:22:07', '0000-00-00 00:00:00', 0, '2018-08-28 11:56:12', '2018-08-28 12:22:07', '2018-08-28 12:56:24', 1),
(64, NULL, 'admin_ZU5p2Snq.jpg', 100, 11, NULL, 'admin', NULL, 1, ' ', '', '', '', '0', 1, '2018-08-28 12:22:08', '0000-00-00 00:00:00', 0, '2018-08-28 11:58:02', '2018-08-28 12:22:08', '2018-08-28 12:58:10', 1),
(65, NULL, 'admin_VFfseN5Z.jpg', 100, 11, NULL, 'admin', NULL, 1, ' ', '', '', '', '0', 1, '2018-08-28 12:22:09', '0000-00-00 00:00:00', 0, '2018-08-28 11:58:50', '2018-08-28 12:22:09', '2018-08-28 13:01:44', 1),
(66, NULL, 'admin_hXMNKKdM.jpg', 100, 11, NULL, 'admin', NULL, 1, ' ', '', '', '', '0', 1, '2018-08-28 12:22:10', '0000-00-00 00:00:00', 0, '2018-08-28 12:02:23', '2018-08-28 12:22:10', '2018-08-28 13:02:35', 1),
(67, NULL, 'admin_TFNMYss5.jpg', 100, 12, NULL, 'admin', NULL, 1, ' ', '', '', '', '0', 1, '2018-08-28 12:22:11', '0000-00-00 00:00:00', 0, '2018-08-28 12:12:36', '2018-08-28 12:22:11', '0000-00-00 00:00:00', 0),
(68, NULL, 'admin_X4qvfTVc.jpg', 100, 13, NULL, 'admin', NULL, 1, ' ', '', '', '', '0', 1, '2018-08-28 12:22:11', '0000-00-00 00:00:00', 0, '2018-08-28 12:13:47', '2018-08-28 12:22:11', '0000-00-00 00:00:00', 0),
(69, NULL, 'admin_UDsNg2N9.jpg', 100, 13, NULL, 'admin', NULL, 1, 'ebs admin', '', '', '', '0', 1, '2018-08-28 12:22:12', '0000-00-00 00:00:00', 0, '2018-08-28 12:17:03', '2018-08-28 12:22:12', '0000-00-00 00:00:00', 0),
(70, NULL, 'admin_tzmZ2g54.jpg', 100, 13, NULL, 'admin', NULL, 1, 'ebs admin', '', '', '', '0', 1, '2018-08-28 12:22:13', '0000-00-00 00:00:00', 0, '2018-08-28 12:17:15', '2018-08-28 12:22:13', '0000-00-00 00:00:00', 0),
(71, NULL, 'admin_JXHYwb7p.jpg', 100, 13, NULL, 'admin', NULL, 1, 'ebs admin', '', '', '', '0', 1, '2018-08-28 12:22:14', '0000-00-00 00:00:00', 0, '2018-08-28 12:17:28', '2018-08-28 12:22:14', '0000-00-00 00:00:00', 0),
(72, NULL, 'bg_1.jpg', 1, 13, 0, 'admin', NULL, NULL, 'ebs admin', '', '', '', '0', 1, '2018-08-28 12:18:47', '0000-00-00 00:00:00', 0, '2018-08-28 08:20:06', '2018-08-28 12:18:47', '0000-00-00 00:00:00', 0),
(73, NULL, 'bg_2.jpg', 2, 13, 0, 'admin', NULL, NULL, 'ebs admin', '', '', '', '0', 1, '2018-08-28 12:22:19', '0000-00-00 00:00:00', 0, '2018-08-28 08:20:57', '2018-08-28 12:22:19', '0000-00-00 00:00:00', 0),
(74, NULL, 'bg_3.jpg', 3, 13, 0, 'admin', NULL, NULL, 'ebs admin', '', '', '', '0', 1, '2018-08-28 12:22:21', '0000-00-00 00:00:00', 0, '2018-08-28 08:20:06', '2018-08-28 12:22:21', '0000-00-00 00:00:00', 0),
(75, NULL, 'bg_1.jpg', 1, 12, 0, 'admin', NULL, NULL, 'ebs admin', '', '', '', '0', 1, '2018-08-28 12:18:47', '0000-00-00 00:00:00', 0, '2018-08-28 08:20:06', '2018-08-28 12:18:47', '0000-00-00 00:00:00', 0),
(76, NULL, 'bg_2.jpg', 2, 12, 0, 'admin', NULL, NULL, 'ebs admin', '', '', '', '0', 1, '2018-08-28 12:22:23', '0000-00-00 00:00:00', 0, '2018-08-28 08:20:57', '2018-08-28 12:22:23', '0000-00-00 00:00:00', 0),
(77, NULL, 'bg_3.jpg', 3, 12, 0, 'admin', NULL, NULL, 'ebs admin', '', '', '', '0', 1, '2018-08-28 12:22:26', '0000-00-00 00:00:00', 0, '2018-08-28 08:20:06', '2018-08-28 12:22:26', '0000-00-00 00:00:00', 0),
(78, NULL, 'admin_UQyDHC46.jpg', 100, 14, NULL, 'admin', NULL, 1, 'ebs admin', '', '', '', '0', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '2018-09-04 11:02:55', '2018-09-04 11:02:55', '0000-00-00 00:00:00', 0);

-- --------------------------------------------------------

--
-- Table structure for table `jollof_sitetype`
--

CREATE TABLE `jollof_sitetype` (
  `id` int(11) NOT NULL,
  `jollofSiteName` char(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `jollof_sitetype`
--

INSERT INTO `jollof_sitetype` (`id`, `jollofSiteName`) VALUES
(1, 'Cuisine'),
(2, 'Fashion'),
(3, 'Jollof'),
(4, 'lifestyle');

-- --------------------------------------------------------

--
-- Table structure for table `orderlistdetails`
--

CREATE TABLE `orderlistdetails` (
  `id` int(11) NOT NULL,
  `ordercode` varchar(255) NOT NULL,
  `restaurantid` int(20) NOT NULL,
  `platformid` int(11) NOT NULL,
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

INSERT INTO `orderlistdetails` (`id`, `ordercode`, `restaurantid`, `platformid`, `productid`, `product_fashionid`, `orderid`, `productname`, `addedmenu`, `quantity`, `price`, `color`, `size`, `vat`, `note`, `status`, `cancledordercomment`, `read_status`, `admin_read_status`, `createdat`, `updatedat`, `deletedat`, `isdeleted`) VALUES
(1, 'ORD-C5DCA222C11996', 3, 1, 1, NULL, 3, 'Coconut Rice', NULL, 1, 400, NULL, NULL, 50, ' ', 4, NULL, 1, 1, '2017-11-04 17:49:44', '2018-01-16 13:07:33', NULL, 0),
(2, 'ORD-5a08e8f0e73abHF', 3, 1, 2, NULL, 3, 'Ewa-Riro', NULL, 1, 400, NULL, NULL, 50, ' ', 4, NULL, 1, 1, '2017-11-04 17:49:44', '2018-01-16 13:07:33', NULL, 0),
(5, 'ORD-520C6A001280EE4', 3, 1, 4, NULL, 4, 'Egusi', NULL, 1, 250, NULL, NULL, 50, ' ', 1, NULL, 1, 1, '2017-11-04 22:40:37', '2018-01-16 13:07:33', NULL, 0),
(6, 'ORD-DB32F6863F5F2D', 3, 1, 5, NULL, 1, 'Pounded Yam', NULL, 1, 400, NULL, NULL, 50, ' ', 1, NULL, 1, 1, '2017-11-04 22:42:09', '2018-01-16 13:07:33', NULL, 0),
(7, 'ORD-ED9C62D795F54', 2, 1, 7, NULL, 1, 'Ofada Rice', NULL, 1, 300, NULL, NULL, 50, ' ', 3, NULL, 0, 1, '2017-11-04 22:43:36', '2018-01-16 13:07:33', NULL, 0),
(8, 'ORD-B9C6DD8EDD82A', 2, 1, 7, NULL, 4, 'Ofada Rice', NULL, 1, 300, NULL, NULL, 50, ' ', 3, NULL, 0, 1, '2017-11-04 22:47:32', '2018-01-16 13:07:33', NULL, 0),
(9, 'ORD-075630E17686441', 3, 1, 1, NULL, 2, 'Coconut Rice', NULL, 1, 400, NULL, NULL, 50, ' ', 3, NULL, 1, 1, '2017-11-04 23:56:07', '2018-01-16 13:07:33', NULL, 0),
(10, 'ORD-F7F23E7FB7F579', 3, 1, 1, NULL, 2, 'Coconut Rice', NULL, 1, 400, NULL, NULL, 50, ' ', 2, NULL, 1, 1, '2017-11-04 23:58:06', '2018-01-16 13:07:33', NULL, 0),
(11, 'ORD-1B027269AA976', 2, 1, 7, NULL, 4, 'Ofada Rice', NULL, 1, 300, NULL, NULL, 50, ' ', 1, NULL, 0, 1, '2017-11-05 01:03:10', '2018-01-16 13:07:33', NULL, 0),
(12, 'ORD-9E33D52C58822', 2, 1, 7, NULL, 18, 'Ofada Rice', NULL, 1, 300, NULL, NULL, 50, ' ', 1, NULL, 0, 1, '2017-11-05 01:24:00', '2018-01-16 13:07:33', NULL, 0),
(13, 'ORD-645A7DBF9C9104', 2, 1, 7, NULL, 19, 'Ofada Rice', NULL, 1, 300, NULL, NULL, 50, ' ', 3, NULL, 0, 1, '2017-11-05 01:40:11', '2018-01-16 13:07:33', NULL, 0),
(14, 'ORD-85938CFF651AF20', 3, 1, 1, NULL, 20, 'Coconut Rice', NULL, 1, 400, NULL, NULL, 50, ' ', 2, NULL, 1, 1, '2017-11-05 01:47:04', '2018-01-16 13:07:33', NULL, 0),
(16, 'ORD-A82C346DFB543', 3, 1, 1, NULL, 21, 'Coconut Rice', NULL, 1, 400, NULL, NULL, 50, ' ', 5, 'out of stock', 1, 1, '2017-11-05 01:49:07', '2018-02-23 10:46:18', NULL, 0),
(17, 'ORD-C70279BFC47A4', 2, 1, 7, NULL, 21, 'Ofada Rice', NULL, 1, 300, NULL, NULL, 50, ' ', 4, NULL, 0, 1, '2017-11-05 01:49:07', '2018-01-16 13:07:33', NULL, 0),
(18, 'ORD-28FD23A2E863F', 3, 1, 2, NULL, 22, 'Ewa-Riro', NULL, 2, 400, NULL, NULL, 50, ' ', 3, NULL, 1, 1, '2017-11-06 15:23:00', '2018-01-16 13:07:33', NULL, 0),
(19, 'ORD-91BF3C61597D200', 1, 1, 1, NULL, 22, 'Coconut Rice', NULL, 1, 400, NULL, NULL, 50, ' ', 3, NULL, 0, 1, '2017-11-06 15:23:00', '2018-01-16 13:07:33', NULL, 0),
(20, 'ORD-9D6085EDDEEB', 3, 1, 6, NULL, 24, 'Beef', NULL, 1, 250, NULL, NULL, 50, ' ', 4, NULL, 1, 1, '2017-11-21 02:26:26', '2018-01-16 13:07:33', NULL, 0),
(29, 'ORD-84C8313977E6E', 3, 1, 2, NULL, 31, 'Ewa-Riro', NULL, 2, 400, NULL, NULL, 50, ' ', 4, NULL, 1, 1, '2017-11-22 13:35:05', '2018-01-16 13:07:33', NULL, 0),
(30, 'ORD-B66A1AFB68EB', 3, 1, 2, NULL, 32, 'Ewa-Riro', NULL, 1, 450, NULL, NULL, 0, ' ', 4, NULL, 1, 1, '2017-12-07 20:38:52', '2018-01-16 13:07:33', NULL, 0),
(31, 'ORD-B66A1AFB68EB', 3, 1, 6, NULL, 32, 'Beef', NULL, 1, 250, NULL, NULL, 0, ' ', 4, NULL, 1, 1, '2017-12-07 20:38:52', '2018-01-16 13:07:33', NULL, 0),
(32, 'ORD-B66A1AFB68EB', 2, 1, 7, NULL, 32, 'Ofada Rice', NULL, 1, 300, NULL, NULL, 0, ' ', 4, NULL, 0, 1, '2017-12-07 20:38:52', '2018-01-16 13:07:33', NULL, 0),
(38, 'ORD-0FEC90126CFE', 3, 1, 1, NULL, 39, 'Coconut Rice', '                                                                                                            \r\n                                                                <div class="added_menu">\r\n                                                                    <table class=" ">     \r\n                                                                        <tbody>\r\n                                                                            <tr>\r\n                                                                                <td>Beef</td>\r\n                                                                                <td class="text-center">3qty </td>\r\n                                                                                <td class="text-right"> ₦500.5</td>\r\n                                                                            </tr>\r\n                                                                        </tbody>\r\n                                                                    </table>\r\n                                                                </div>\r\n\r\n                                                                                                                                                                ', 4, 1902, NULL, NULL, 0, ' ', 1, NULL, 1, 1, '2017-12-14 15:21:19', '2018-01-16 13:07:33', NULL, 0),
(39, 'ORD-656DEE21A91A', 3, 1, 6, NULL, 41, 'Beef', NULL, 1, 250, NULL, NULL, 0, ' ', 2, NULL, 1, 1, '2017-12-23 10:49:48', '2018-01-16 13:07:33', NULL, 0),
(40, 'ORD-656DEE21A91A', 3, 1, 4, NULL, 41, 'Egusi', NULL, 1, 250, NULL, NULL, 0, ' ', 4, NULL, 1, 1, '2017-12-23 10:49:48', '2018-01-16 13:07:33', NULL, 0),
(41, 'ORD-656DEE21A91A', 3, 1, 3, NULL, 41, 'Water bottle with rice', NULL, 1, 100, NULL, NULL, 0, ' ', 1, NULL, 1, 1, '2017-12-23 10:49:48', '2018-01-16 13:07:33', NULL, 0),
(42, 'ORD-656DEE21A91A', 3, 1, 2, NULL, 41, 'Ewa-Riro', NULL, 2, 800, NULL, NULL, 0, ' ', 1, NULL, 1, 1, '2017-12-23 10:49:48', '2018-01-16 13:07:33', NULL, 0),
(43, 'ORD-8715DE680674', 3, 1, 1, NULL, 42, 'Coconut Rice', '                                                                                                            \r\n                                                                <div class="added_menu">\r\n                                                                    <table class=" ">     \r\n                                                                        <tbody>\r\n                                                                            <tr>\r\n                                                                                <td>Beef</td>\r\n                                                                                <td class="text-center">1qty </td>\r\n                                                                                <td class="text-right"> ₦500.5</td>\r\n                                                                            </tr>\r\n                                                                        </tbody>\r\n                                                                    </table>\r\n                                                                </div>\r\n\r\n                                                            \r\n                                                                <div class="added_menu">\r\n                                                                    <table class=" ">     \r\n                                                                        <tbody>\r\n                                                                            <tr>\r\n                                                                                <td>Water bottle with rice</td>\r\n                                                                                <td class="text-center">1qty </td>\r\n                                                                                <td class="text-right"> ₦450.9</td>\r\n                                                                            </tr>\r\n                                                                        </tbody>\r\n                                                                    </table>\r\n                                                                </div>\r\n\r\n                                                                                                                                                                ', 3, 2151, NULL, NULL, 0, ' ', 1, NULL, 1, 1, '2018-01-16 13:07:14', '2018-01-16 13:08:14', NULL, 0),
(44, 'ORD-CK9UGQC4JEQW', 3, 1, 8, NULL, 44, 'testing', '', 1, 200, NULL, NULL, 0, '', 5, 'pleas out for now', 1, 1, '2018-02-23 08:55:27', '2018-03-07 10:53:06', NULL, 0),
(45, 'ORD-FPABULZZYA2P', 3, 1, 16, NULL, 44, 'Beans', '', 1, 300, NULL, NULL, 0, '', 1, NULL, 1, 1, '2018-02-23 08:55:27', '2018-03-07 10:53:06', NULL, 0),
(46, 'ORD-MJUVEM44AFCH', 3, 1, 6, NULL, 44, 'Beef', '', 2, 500, NULL, NULL, 0, '', 1, NULL, 1, 1, '2018-02-23 08:55:27', '2018-03-07 10:53:06', NULL, 0),
(48, 'ORD-JW6TR2QWWP73', 3, 1, 13, NULL, 46, 'Oporopo Soup', '                                                                                                                            <div class="added_menu">\r\n                                                                    <table class=" ">     \r\n                                                                        <tbody>\r\n                                                                            <tr>\r\n                                                                                <td>+ stock meat</td>\r\n                                                                                <td class="text-center">1qty </td>\r\n                                                                                <td class="text-right"> ₦100</td>\r\n                                                                            </tr>\r\n                                                                        </tbody>\r\n                                                                    </table>\r\n                                                                </div>\r\n                                                                                                                            <div class="added_menu">\r\n                                                                    <table class=" ">     \r\n                                                                        <tbody>\r\n                                                                            <tr>\r\n                                                                                <td>+ Cat Fish</td>\r\n                                                                                <td class="text-center">1qty </td>\r\n                                                                                <td class="text-right"> ₦200</td>\r\n                                                                            </tr>\r\n                                                                        </tbody>\r\n                                                                    </table>\r\n                                                                </div>\r\n                                                                                                                    ', 1, 700, NULL, NULL, 0, '', 5, 'close for the day', 1, 1, '2018-02-23 09:12:39', '2018-03-07 10:53:06', NULL, 0),
(49, 'ORD-6YCKPRVEW9HD', 3, 1, 3, NULL, 47, 'Water bottle with rice', '', 1, 100, NULL, NULL, 0, '', 5, NULL, 1, 1, '2018-02-23 09:13:47', '2018-03-07 10:53:06', NULL, 0),
(50, 'ORD-6GDT98WV90W1', 16, 2, NULL, 16, 48, 'MIDUO Brand 2017 Hot Design Swimwear Sexy Bandage Bathing Suits Push Up Brazilian Bikini Digital Printing Women Bikinis', '', 1, 4500, '03-BROWN', 'S', 0, '', 4, '', 1, 1, '2018-02-23 09:13:47', '2018-08-23 11:20:11', NULL, 0),
(53, 'ORD-7ESWVEBQYJHD', 3, 1, 8, NULL, 49, 'testing', '', 4, 600, NULL, NULL, 0, '', 2, NULL, 1, 1, '2018-03-06 14:07:51', '2018-08-16 10:47:46', NULL, 0),
(54, 'ORD-E6NHBDTUATB7', 16, 2, NULL, 6, 49, 'MIDUO Brand 2017 Hot Design Swimwear Sexy Bandage Bathing Suits Push Up Brazilian Bikini Digital Printing Women Bikinis', '', 1, 4500, '03-BROWN', 'M', 0, '', 4, NULL, 1, 1, '2018-03-06 14:07:51', '2018-08-01 11:01:42', NULL, 0),
(55, 'ORD-Z7K3U5XWLMEX', 3, 1, 1, NULL, 50, 'Coconut Rice', '', 1, 400, NULL, NULL, 0, '', 2, NULL, 1, 1, '2018-04-20 15:51:57', '2018-08-15 11:17:57', NULL, 0),
(56, 'ORD-PQTVEDB8LXJM', 3, 1, 1, NULL, 51, 'Coconut Rice', '', 1, 400, NULL, NULL, 0, '', 2, NULL, 1, 1, '2018-04-20 15:59:27', '2018-06-21 23:20:32', NULL, 0),
(57, 'ORD-G5AVP9TVHX6W', 3, 1, 1, NULL, 54, 'Coconut Rice', '', 1, 400, NULL, NULL, 0, '', 2, NULL, 1, 1, '2018-05-08 09:17:29', '2018-06-15 00:58:29', NULL, 0),
(58, 'ORD-JMP6YWNKTVXM', 3, 1, 1, NULL, 55, 'Coconut Rice', '', 3, 400, NULL, NULL, 0, '', 2, NULL, 1, 1, '2018-05-08 11:55:42', '2018-06-05 16:13:15', NULL, 0),
(59, 'ORD-DQ4CU7EQTUEN', 3, 1, 2, NULL, 55, 'Ewa-Riro', '', 1, 400, NULL, NULL, 0, '', 2, NULL, 1, 1, '2018-05-08 11:55:42', '2018-06-05 16:14:53', NULL, 0),
(60, 'ORD-QWQBXD5RJZFQ', 2, 1, 7, NULL, 55, 'Ofada Rice', '', 1, 300, NULL, NULL, 0, '', 1, NULL, 0, 1, '2018-05-08 11:55:42', '2018-05-14 09:12:16', NULL, 0),
(61, 'ORD-EZUC9VNUMQRJ', 3, 1, 16, NULL, 56, 'Beans', '                                                                                                                            <div class="added_menu">\r\n                                                                    <table class=" ">     \r\n                                                                        <tbody>\r\n                                                                            <tr>\r\n                                                                                <td>7up</td>\r\n                                                                                <td class="text-center">1qty </td>\r\n                                                                                <td class="text-right"> ₦50</td>\r\n                                                                            </tr>\r\n                                                                        </tbody>\r\n                                                                    </table>\r\n                                                                </div>\r\n                                                                                                                            <div class="added_menu">\r\n                                                                    <table class=" ">     \r\n                                                                        <tbody>\r\n                                                                            <tr>\r\n                                                                                <td>dodo</td>\r\n                                                                                <td class="text-center">1qty </td>\r\n                                                                                <td class="text-right"> ₦100</td>\r\n                                                                            </tr>\r\n                                                                        </tbody>\r\n                                                                    </table>\r\n                                                                </div>\r\n                                                                                                                    ', 2, 750, NULL, NULL, 0, '', 2, NULL, 1, 1, '2018-05-08 12:00:52', '2018-06-05 16:11:25', NULL, 0),
(62, 'ORD-RP6BACSUKNKE', 3, 1, 1, NULL, 57, 'Coconut Rice', '', 1, 400, NULL, NULL, 0, '', 3, NULL, 1, 1, '2018-05-13 19:54:18', '2018-08-15 10:20:08', NULL, 0),
(63, 'ORD-ZEAXYNBZ8BWG', 3, 1, 2, NULL, 57, 'Ewa-Riro', '', 2, 800, NULL, NULL, 0, '', 5, NULL, 1, 1, '2018-05-13 19:54:18', '2018-06-02 22:59:16', NULL, 0),
(64, 'ORD-RYFCAW3UJM3C', 2, 1, 7, NULL, 57, 'Ofada Rice', '', 1, 300, NULL, NULL, 0, '', 4, NULL, 0, 1, '2018-05-13 19:54:18', '2018-09-05 12:54:52', NULL, 0),
(65, 'ORD-SNHTFRJXGRHY', 3, 0, 1, NULL, 62, '   Coconut Rice', '                                                                                                            ', 4, 400, NULL, NULL, 0, 'cool food', 1, NULL, 0, 0, '2018-08-17 10:18:55', '2018-08-17 10:18:55', NULL, 0),
(66, 'ORD-ULQUNBNZZD2A', 3, 0, 1, NULL, 64, '   Coconut Rice', '                                                                                                            ', 2, 400, NULL, NULL, 0, 'cool', 1, NULL, 0, 0, '2018-08-17 10:29:17', '2018-08-17 10:29:17', NULL, 0),
(67, 'ORD-MNBBJ8BRBNHN', 3, 0, 16, NULL, 68, 'Beans', '                                                                                                                                                                                                                                                                                                                                    ', 1, 300, NULL, NULL, 0, '', 4, NULL, 0, 0, '2018-08-20 13:38:45', '2018-08-23 03:07:18', NULL, 0),
(68, 'ORD-Q65SJJY6FBT3', 3, 0, 8, NULL, 68, 'testing', '                                                                                                                                                                                                                                                                                                                                    ', 1, 200, NULL, NULL, 0, '', 2, NULL, 0, 0, '2018-08-20 13:38:45', '2018-08-23 03:07:13', NULL, 0),
(69, 'ORD-SMAM8JEY3BYS', 3, 0, 20, NULL, 68, 'fried rice', '                                                                                                                                                                                                                                                                                                                                    ', 2, 900, NULL, NULL, 0, 'cool', 1, NULL, 0, 0, '2018-08-20 13:38:45', '2018-08-20 13:38:45', NULL, 0),
(70, 'ORD-9V6CE7BDSCJW', 16, 0, NULL, 4, 69, 'Osvaldo Rossi Snake Skin Shoe', '                                                                                                                                                                                                                        ', 1, 37500, 'GRAY', '6', 0, '', 1, NULL, 0, 0, '2018-09-05 14:05:30', '2018-09-05 14:05:30', NULL, 0),
(71, 'ORD-N8JAWEJZDX4S', 16, 0, NULL, 20, 69, 'MIDUO Brand 2017 Hot Design Swimwear Sexy Bandage Bathing Suits Push Up Brazilian Bikini Digital Printing Women Bikinis', '                                                                                                                                                                                                                        ', 1, 4500, 'White', 'L', 0, '', 1, NULL, 0, 0, '2018-09-05 14:05:30', '2018-09-05 14:05:30', NULL, 0),
(72, 'ORD-NXHYZCUV7RTY', 16, 0, NULL, 4, 70, 'Osvaldo Rossi Snake Skin Shoe', '                                                                                                                                                                                                                        ', 1, 37500, 'GRAY', '6', 0, '', 1, NULL, 0, 0, '2018-09-05 14:09:43', '2018-09-05 14:09:43', NULL, 0),
(73, 'ORD-GXQELXYNLT5Z', 16, 0, NULL, 20, 70, 'MIDUO Brand 2017 Hot Design Swimwear Sexy Bandage Bathing Suits Push Up Brazilian Bikini Digital Printing Women Bikinis', '                                                                                                                                                                                                                        ', 1, 4500, 'White', 'L', 0, '', 1, NULL, 0, 0, '2018-09-05 14:09:43', '2018-09-05 14:09:43', NULL, 0),
(74, 'ORD-PSDY3DAJFRWU', 16, 0, NULL, 20, 71, 'MIDUO Brand 2017 Hot Design Swimwear Sexy Bandage Bathing Suits Push Up Brazilian Bikini Digital Printing Women Bikinis', '                                                                                                                                                                                                                        ', 1, 4100, 'White', 'S', 0, '', 1, NULL, 0, 0, '2018-09-05 14:23:09', '2018-09-05 14:23:09', NULL, 0),
(75, 'ORD-F8WKZQQFUFV5', 16, 0, NULL, 1, 71, 'Prada Saffiano Brief Case Bag', '                                                                                                                                                                                                                        ', 1, 20000, 'Black', '6', 0, '', 1, NULL, 0, 0, '2018-09-05 14:23:09', '2018-09-05 14:23:09', NULL, 0),
(76, 'ORD-AMNHSSFD9GDK', 16, 0, NULL, 26, 72, 'product name', '                                                                                                            ', 12, 400, 'white', 'XS', 0, '', 1, NULL, 0, 0, '2018-09-05 14:37:27', '2018-09-05 14:37:27', NULL, 0),
(77, 'ORD-Z9LSG82XZTUE', 16, 0, NULL, 26, 73, 'product name', '                                                                                                            ', 1, 400, 'white', 'XS', 0, '', 1, NULL, 0, 0, '2018-09-05 14:41:25', '2018-09-05 14:41:25', NULL, 0),
(78, 'ORD-C6VHFQ8JTKAK', 16, 0, NULL, 20, 74, 'MIDUO Brand 2017 Hot Design Swimwear Sexy Bandage Bathing Suits Push Up Brazilian Bikini Digital Printing Women Bikinis', '                                                                                                            ', 1, 4100, 'White', 'S', 0, '', 1, NULL, 0, 0, '2018-09-14 09:48:03', '2018-09-14 09:48:03', NULL, 0);

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
  `deliveryfee` float NOT NULL,
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

INSERT INTO `orders` (`id`, `accountid`, `reference`, `accountaddressid`, `vat`, `additionalcharges`, `discount`, `couponcode`, `totalordervalue`, `deliveryfee`, `deliverytype`, `status`, `createdat`, `updatedat`, `deletedat`, `isdeleted`) VALUES
(1, 1, 'k8e3j5wn1g', 2, 50, 0, 0, 0, 750, 0, 'Card', 1, '2017-11-04 16:49:32', NULL, NULL, 0),
(2, 1, 'aafkxte4vu', 2, 50, 0, 0, 0, 850, 0, 'Card', 1, '2017-11-04 16:57:42', NULL, NULL, 0),
(3, 1, '9kc5n3eblo', 2, 50, 0, 0, 0, 850, 0, 'Card', 1, '2017-11-04 16:58:15', NULL, NULL, 0),
(4, 1, 'ep3g7o489p', 2, 50, 0, 0, 0, 900, 0, 'Card', 1, '2017-11-04 22:30:09', NULL, NULL, 0),
(18, 1, 'h3xpgc3evx68xpu', 1, 50, 0, 0, 0, 350, 0, 'Card', 1, '2017-11-05 01:24:00', NULL, NULL, 0),
(19, 1, 'w3fk5clnj6', 1, 50, 0, 0, 0, 350, 0, 'Card', 1, '2017-11-05 01:39:37', NULL, NULL, 0),
(20, 1, 'oyxtsye5473n5l8', 2, 50, 0, 0, 0, 750, 0, 'Card', 1, '2017-11-05 01:47:04', NULL, NULL, 0),
(21, 1, '9hr3cnu62zi513d', 2, 50, 0, 0, 0, 750, 0, 'Card', 1, '2017-11-05 01:49:07', NULL, NULL, 0),
(22, 1, '2axk730fjp', 1, 50, 0, 0, 0, 1250, 0, 'Card', 1, '2017-11-06 15:21:12', NULL, NULL, 0),
(24, 1, '0qzgonmgql0ej52', 1, 50, 0, 0, 0, 300, 0, 'Card', 1, '2017-11-21 02:26:26', NULL, NULL, 0),
(31, 1, '84c8313977', 2, 0, 0, 0, 0, 850, 0, 'On Delivery ', 1, '2017-11-22 13:35:05', NULL, NULL, 0),
(32, 1, 'b66a1afb68', 1, 0, 0, 0, 0, 1000, 0, 'On Delivery ', 1, '2017-12-07 20:38:52', '2017-12-07 20:38:52', NULL, 0),
(39, 1, '0fec90126c', 2, 0, 0, 0, 0, 1951.5, 0, 'On Delivery ', 1, '2017-12-14 15:21:19', '2017-12-14 15:21:19', NULL, 0),
(40, 1, 'hcb5uo9gdn', 2, 0, 0, 0, 0, 350, 0, 'Card', 0, '2017-12-20 10:22:07', '2017-12-20 10:22:07', NULL, 0),
(41, 1, '742mztwl49', 2, 0, 0, 0, 0, 1450, 0, 'Card', 1, '2017-12-23 10:48:44', '2017-12-23 10:49:48', NULL, 0),
(42, 1, '8715de6806', 2, 0, 0, 0, 0, 2201.4, 0, 'On Delivery ', 1, '2018-01-16 13:07:14', '2018-01-16 13:07:14', NULL, 0),
(43, 5, '9hq9uuap5g', 3, 0, 0, 0, 0, 450, 0, 'Card', 0, '2018-02-02 12:25:44', '2018-02-02 12:25:44', NULL, 0),
(44, 1, '9f545d41f8', 2, 0, 0, 0, 0, 1200, 0, 'On Delivery ', 1, '2018-02-23 08:55:27', '2018-02-23 08:55:27', NULL, 0),
(46, 1, 'a5b7b26314', 2, 0, 0, 0, 0, 750, 0, 'On Delivery ', 1, '2018-02-23 09:12:39', '2018-02-23 09:12:39', NULL, 0),
(47, 1, 'dcad942560', 2, 0, 0, 0, 0, 150, 0, 'On Delivery ', 1, '2018-02-23 09:13:47', '2018-02-23 09:13:47', NULL, 0),
(48, 1, 'ddad354650', 2, 0, 0, 0, 0, 150, 0, 'On Delivery ', 1, '2018-02-23 09:13:47', '2018-03-05 07:02:19', NULL, 0),
(49, 1, '419524317f', 2, 0, 0, 0, 0, 5150, 0, 'On Delivery ', 1, '2018-03-06 14:07:51', '2018-03-06 14:07:51', NULL, 0),
(50, 1, 'sv51xernamw4t73', 2, 0, 0, 0, 0, 450, 0, 'Card', 1, '2018-04-20 15:51:57', '2018-04-20 15:51:57', NULL, 0),
(51, 1, 'vkbix2ahtdab7bh', 2, 0, 0, 0, 0, 450, 0, 'Card', 1, '2018-04-20 15:59:27', '2018-04-20 15:59:27', NULL, 0),
(52, 1, 'nx56ivg4ft', 1, 0, 0, 0, 0, 1733.97, 0, 'Card', 0, '2018-05-03 12:33:13', '2018-05-03 12:33:13', NULL, 0),
(53, 1, '8w4uxa96h3', 2, 0, 0, 0, 0, 3233.97, 0, 'Card', 0, '2018-05-03 20:47:13', '2018-05-03 20:47:13', NULL, 0),
(54, 1, '770d34eb9f', 2, 0, 0, 0, 0, 1920, 0, 'On Delivery ', 1, '2018-05-08 09:17:29', '2018-05-08 09:17:29', NULL, 0),
(55, 1, '2751e47a07', 2, 0, 0, 0, 0, 2655, 0, 'On Delivery ', 1, '2018-05-08 11:55:42', '2018-05-08 11:55:42', NULL, 0),
(56, 1, '904de68cf4', 2, 0, 0, 0, 0, 2287.5, 0, 'On Delivery ', 1, '2018-05-08 12:00:52', '2018-05-08 12:00:52', NULL, 0),
(57, 1, 'af197537c5', 2, 0, 0, 0, 0, 3075, 0, 'On Delivery ', 1, '2018-05-13 19:54:18', '2018-05-13 19:54:18', NULL, 0),
(58, 1, '2e9ri7eb4n', 4, 0, 0, 0, 0, 5702.8, 0, 'Card', 0, '2018-05-28 14:25:33', '2018-05-28 14:25:33', NULL, 0),
(59, 1, 'bgkm7rq7pm', 4, 0, 0, 0, 0, 23702.3, 0, 'Card', 0, '2018-07-04 22:42:25', '2018-07-04 22:42:25', NULL, 0),
(60, 1, 'f5a3a387d3', 4, 0, 0, 0, 0, 25922.5, 0, 'On Delivery ', 1, '2018-07-05 11:05:07', '2018-07-05 11:05:07', NULL, 0),
(61, 1, '377988a34c', 2, 0, 0, 0, 0, 440, 0, 'On Delivery ', 1, '2018-08-17 10:07:27', '2018-08-17 10:07:27', NULL, 0),
(62, 1, '36773b29bc', 2, 0, 0, 0, 0, 440, 0, 'On Delivery ', 1, '2018-08-17 10:18:55', '2018-08-17 10:18:55', NULL, 0),
(63, 1, 'be033e0f79', 2, 0, 0, 0, 0, 440, 0, 'On Delivery ', 1, '2018-08-17 10:19:47', '2018-08-17 10:19:47', NULL, 0),
(64, 1, '6e2cd61346', 2, 0, 0, 0, 0, 440, 0, 'On Delivery ', 1, '2018-08-17 10:29:17', '2018-08-17 10:29:17', NULL, 0),
(68, 578, 'b2339531b7', 20, 10, 0, 0, 0, 1540, 0, 'On Delivery ', 1, '2018-08-20 13:38:44', '2018-08-20 13:38:44', NULL, 0),
(69, 1, '42bc4b944b', 2, 10, 0, 0, 0, 46200, 0, 'On Delivery ', 1, '2018-09-05 14:05:30', '2018-09-05 14:05:30', NULL, 0),
(70, 1, 'c5a79c8cd0', 2, 10, 0, 0, 0, 46200, 0, 'On Delivery ', 1, '2018-09-05 14:09:43', '2018-09-05 14:09:43', NULL, 0),
(71, 1, '30cc82b78c', 2, 10, 0, 0, 0, 26510, 0, 'On Delivery ', 1, '2018-09-05 14:23:09', '2018-09-05 14:23:09', NULL, 0),
(72, 1, '4cc9c4aaf0', 2, 10, 0, 0, 0, 440, 0, 'On Delivery ', 1, '2018-09-05 14:37:26', '2018-09-05 14:37:26', NULL, 0),
(73, 1, 'c20ff9ae34', 2, 10, 0, 0, 0, 440, 0, 'On Delivery ', 1, '2018-09-05 14:41:25', '2018-09-05 14:41:25', NULL, 0),
(74, 585, 'be6ab7374d', 21, 10, 0, 0, 0, 6010, 1500, 'On Delivery ', 1, '2018-09-14 09:48:03', '2018-09-14 09:48:03', NULL, 0);

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
(3, 'Dispatched', '2017-11-10 12:15:27', NULL, NULL, 0),
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
(30, 5, 'ca390be694c58076d93d0c8b80a0c02451b6c58f', 'trivin98@gmail.com', '2018-01-24 12:12:16', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(31, 571, '942a8bb85f562f5461d1c740b1873b5abbd3c69c', 'segun@stakle.com', '2018-05-08 12:31:08', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(32, 571, 'd2645f01969212fd51f837c7ff28be949fd9e694', 'segun@stakle.com', '2018-05-08 12:31:19', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(33, 571, 'c7380c9b2093832f5d47b6f29609199a96dfcc96', 'segun@stakle.com', '2018-05-08 12:31:29', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(34, 1, '7656a97d9f319d8e68b11eb4159dc0ca5fd8fb60', 'oye@ebs.com', '2018-05-16 15:38:51', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(35, 1, '93369ca1682b4cdd72adca06f07fd9542a25b15f', 'oye@ebs.com', '2018-05-16 15:39:03', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(36, 584, '3725a9f0250f304a8ab241f301b8e6ca46b8af03', 'trivin98@gmail.com', '2018-09-05 11:46:31', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(37, 584, '03ae824e1949569f2d3decb9d9108d7b0dfd84fa', 'trivin98@gmail.com', '2018-09-05 11:48:44', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(38, 584, '9bb8c5ec28a332cba9dbaff5984df0b509698f9b', 'trivin98@gmail.com', '2018-09-05 11:50:02', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(39, 584, 'fa74c644bdbcbadbe28a7e89bbce6c32eef7d28a', 'trivin98@gmail.com', '2018-09-05 11:54:46', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(40, 584, '3cc6c046cdbcda75e2aec2d5e2215e4862e203ff', 'trivin98@gmail.com', '2018-09-05 11:57:16', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(41, 584, 'a5cace4fba9d738575a44edc101fe12bf9deac05', 'trivin98@gmail.com', '2018-09-19 11:45:14', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(43, 28, 'e67f905a410ce56b2f8650fb0e74c5cd3e3e55ba', 'trivin98@gmail.com', '2018-09-19 15:58:49', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(44, 28, 'd25e354d5bc2ed54da0fd150bd2dc2a6baa0a392', 'trivin98@gmail.com', '2018-09-19 15:59:04', '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `paystackbanks`
--

CREATE TABLE `paystackbanks` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL DEFAULT '',
  `slug` varchar(255) NOT NULL DEFAULT '',
  `code` char(11) NOT NULL DEFAULT '',
  `longcode` char(15) NOT NULL DEFAULT '',
  `gateway` varchar(20) DEFAULT NULL,
  `country` varchar(255) NOT NULL DEFAULT '',
  `currency` varchar(255) DEFAULT '',
  `status` tinyint(4) NOT NULL DEFAULT '1',
  `createdat` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updateat` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `isdeleted` tinyint(4) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `paystackbanks`
--

INSERT INTO `paystackbanks` (`id`, `name`, `slug`, `code`, `longcode`, `gateway`, `country`, `currency`, `status`, `createdat`, `updateat`, `isdeleted`) VALUES
(1, 'Access Bank', 'access-bank', '044', '044150149', 'etz', 'Nigeria', 'NGN', 1, '2018-04-24 12:52:24', '2018-04-24 12:59:33', 0),
(2, 'Citibank Nigeria', 'citibank-nigeria', '023', '023150005', NULL, 'Nigeria', 'NGN', 1, '2018-04-24 13:00:33', '2018-04-24 13:00:33', 0),
(3, 'Diamond Bank', 'diamond-bank', '063', '063150162', NULL, 'Nigeria', 'NGN', 1, '2018-04-24 13:01:07', '2018-04-24 13:01:07', 0),
(4, 'Ecobank Nigeria', 'ecobank-nigeria', '050', '050150010', NULL, 'Nigeria', 'NGN', 1, '2018-04-24 13:01:53', '2018-04-24 13:02:30', 0),
(5, 'Enterprise Bank', 'enterprise-bank', '084', '084150015', NULL, 'Nigeria', 'NGN', 1, '2018-04-24 13:02:08', '2018-04-24 13:02:43', 0),
(6, 'Fidelity Bank', 'fidelity-bank', '070', '070150003', 'etz', 'Nigeria', 'NGN', 1, '2018-04-24 13:04:12', '2018-04-24 13:04:12', 0),
(7, 'First Bank of Nigeria', 'first-bank-of-nigeria', '011', '011151003', 'etz', 'Nigeria', 'NGN', 1, '2018-04-24 13:04:58', '2018-04-24 13:04:58', 0),
(8, 'First City Monument Bank', 'first-city-monument-bank', '214', '214150018', 'etz', 'Nigeria', 'NGN', 1, '2018-04-24 13:05:18', '2018-04-24 13:05:46', 0),
(9, 'Guaranty Trust Bank', 'guaranty-trust-bank', '058', '058152036', NULL, 'Nigeria', 'NGN', 1, '2018-04-24 13:06:26', '2018-04-24 13:06:26', 0),
(10, 'Heritage Bank', 'heritage-bank', '030', '030159992', 'etz', 'Nigeria', 'NGN', 1, '2018-04-24 13:07:04', '2018-04-24 13:07:04', 0),
(11, 'Keystone Bank', 'Keystone-Bank', '082', '082150017', NULL, 'Nigeria', 'NGN', 1, '2018-04-24 13:07:50', '2018-04-24 13:07:50', 0),
(12, 'Mainstreet Bank', 'mainstreet-bank', '014', '014150331', NULL, 'Nigeria', 'NGN', 1, '2018-04-24 13:08:39', '2018-04-24 13:08:39', 0),
(13, 'Sky Bank', 'sky-bank', '076', '076151006', 'etz', 'Nigeria', 'NGN', 1, '2018-04-24 13:09:18', '2018-04-24 13:10:04', 0),
(14, 'Stanbic IBTC Bank', 'stanbic-ibtc-bank', '221', '221159522', 'etz', 'Nigeria', 'NGN', 1, '2018-04-24 13:09:18', '2018-04-24 13:09:18', 0),
(15, 'Standard Chartered Bank', 'standard-chartered-bank', '068', '068150015', NULL, 'Nigeria', 'NGN', 1, '2018-04-24 13:10:54', '2018-04-24 13:10:54', 0),
(16, 'Sterling Bank', 'sterling-bank', '232', '232150016', NULL, 'Nigeria', 'NGN', 1, '2018-04-24 13:11:35', '2018-04-24 13:11:35', 0),
(17, 'Union Bank of Nigeria', 'union-bank-of-nigeria', '032', '032080474', 'etz', 'Nigeria', 'NGN', 1, '2018-04-24 13:12:18', '2018-04-24 13:12:18', 0),
(18, 'United Bank For Africa', 'united-bank-for-africa', '033', '033153513', 'etz', 'Nigeria', 'NGN', 1, '2018-04-24 13:13:00', '2018-04-24 13:13:00', 0),
(19, 'Unity Bank', 'unity-bank', '215', '215154097', 'etz', 'Nigeria', 'NGN', 1, '2018-04-24 13:14:11', '2018-04-24 13:14:11', 0),
(20, 'Wema Bank', 'wema-bank', '035', '035150103', 'etz', 'Nigeria', 'NGN', 1, '2018-04-24 13:14:56', '2018-04-24 13:14:56', 0),
(21, 'Zenith Bank', 'zenith-bank', '057', '057150013', NULL, 'Nigeria', 'NGN', 1, '2018-04-24 13:15:22', '2018-04-24 13:15:22', 0),
(22, 'Jaiz Bank', 'jaiz-bank', '301', '301080020', NULL, 'Nigeria', 'NGN', 1, '2018-04-24 13:17:16', '2018-04-24 13:17:16', 0),
(23, 'Suntrust Bank', 'suntrust-bank', '100', '', NULL, 'Nigeria', 'NGN', 1, '2018-04-24 13:18:10', '2018-04-24 13:18:10', 0),
(24, 'Providus Bank', 'providus-bank', '101', '', NULL, 'Nigeria', 'NGN', 1, '2018-04-24 13:19:51', '2018-04-24 13:19:51', 0),
(25, 'Parallex Bank', 'parallex-bank', '526', '', NULL, 'Nigeria', 'NGN', 1, '2018-04-24 13:20:19', '2018-04-24 13:20:19', 0),
(26, 'ALAT by WEMA', 'alat-by-wema', '035A', '035150103', 'emandate', 'Nigeria', 'NGN', 1, '2018-04-24 13:21:30', '2018-04-24 13:21:30', 0);

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
  `colorimg` tinyint(4) NOT NULL DEFAULT '0',
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

INSERT INTO `productimages` (`id`, `restaurantid`, `productid`, `imagename`, `colorimg`, `arrange`, `status`, `createdat`, `updatedat`, `deletedat`, `isdeleted`) VALUES
(1, 16, 2, '16_Blue_Bag1.png', 0, 100, 1, '2018-01-26 01:59:20', '2018-02-15 21:04:20', NULL, 0),
(2, 16, 2, '16_Blue_Bag7.png', 0, 100, 1, '2018-01-26 02:12:11', '2018-01-30 12:57:43', NULL, 0),
(3, 16, 2, '16_Blue_Bag3.png', 0, 100, 1, '2018-01-26 02:13:49', '2018-01-26 06:30:15', NULL, 0),
(4, 16, 2, '16_Blue_Bag4.png', 0, 100, 1, '2018-01-26 02:13:55', '2018-01-26 06:30:21', NULL, 0),
(5, 16, 2, '16_Blue_Bag5.png', 0, 100, 1, '2018-01-26 02:14:02', '2018-01-26 06:30:25', NULL, 0),
(6, 16, 2, '16_Blue_Bag6.png', 0, 100, 1, '2018-01-26 02:14:11', '2018-01-26 06:30:29', NULL, 0),
(7, 16, 1, '16_Black_Plain_Leather2.png', 0, 100, 1, '2018-01-26 02:23:30', '2018-01-26 06:30:34', NULL, 0),
(8, 16, 1, '16_Black_Plain_Leather1.png', 0, 100, 1, '2018-01-26 02:23:45', '2018-01-26 06:30:38', NULL, 0),
(9, 16, 1, '16_Black_Plain_Leather3.png', 0, 100, 1, '2018-01-26 02:24:11', '2018-01-26 06:30:43', NULL, 0),
(10, 16, 3, '16_AligatorSkin1_Red.png', 0, 2, 1, '2018-01-26 06:30:59', '2018-02-17 18:58:54', NULL, 0),
(11, 16, 3, '16_AligatorSkin1.png', 0, 100, 1, '2018-01-26 06:39:28', '2018-02-17 18:52:02', NULL, 0),
(12, 16, 3, '16_AligatorSkin2.png', 0, 1, 1, '2018-01-26 06:30:59', '2018-02-17 18:58:49', NULL, 0),
(13, 16, 3, '16_AligatorSkin3.png', 0, 100, 1, '2018-01-26 06:30:59', '2018-01-26 06:40:44', NULL, 0),
(14, 16, 3, '16_AligatorSkin2_Red.png', 0, 100, 1, '2018-01-26 06:39:28', '2018-02-17 23:20:12', NULL, 0),
(15, 16, 3, '16_AligatorSkin4.png', 0, 100, 1, '2018-01-26 06:30:59', '2018-01-26 06:40:44', NULL, 0),
(18, 16, 5, '16_151925991201.jpg', 0, 100, 1, '2018-02-22 00:38:33', '2018-02-22 00:39:43', NULL, 0),
(19, 16, 5, '16_151925991312.jpg', 0, 100, 1, '2018-02-22 00:38:33', '2018-02-22 00:39:43', NULL, 0),
(20, 16, 5, '16_151925991323.jpg', 0, 100, 1, '2018-02-22 00:38:33', '2018-02-22 00:39:43', NULL, 0),
(21, 16, 5, '16_151925991334.jpg', 0, 2, 1, '2018-02-22 00:38:33', '2018-02-22 00:41:03', NULL, 0),
(22, 16, 5, '16_151925991345.jpg', 0, 100, 1, '2018-02-22 00:38:33', '2018-02-22 00:39:43', NULL, 0),
(23, 16, 5, '16_151925991356.jpg', 0, 100, 1, '2018-02-22 00:38:33', '2018-02-22 00:39:43', NULL, 0),
(24, 16, 5, '16_151925994401.jpg', 0, 100, 1, '2018-02-22 00:39:04', '2018-02-22 00:39:43', NULL, 0),
(25, 16, 5, '16_151925995301.jpg', 0, 100, 1, '2018-02-22 00:39:13', '2018-02-22 00:39:43', NULL, 0),
(26, 16, 6, '16_151926468901.jpg', 0, 100, 1, '2018-02-22 01:58:09', '2018-02-22 01:59:20', NULL, 0),
(27, 16, 6, '16_151926469201.jpg', 0, 100, 1, '2018-02-22 01:58:12', '2018-02-22 01:59:20', NULL, 0),
(28, 16, 6, '16_151926469601.jpg', 0, 100, 1, '2018-02-22 01:58:16', '2018-02-22 01:59:20', NULL, 0),
(29, 16, 6, '16_151926470001.jpg', 0, 100, 1, '2018-02-22 01:58:20', '2018-02-22 01:59:20', NULL, 0),
(30, 16, 6, '16_151926470601.jpg', 0, 100, 1, '2018-02-22 01:58:26', '2018-02-22 01:59:20', NULL, 0),
(31, 16, 6, '16_151926473101.jpg', 0, 100, 1, '2018-02-22 01:58:52', '2018-02-22 11:32:46', NULL, 0),
(32, 16, 6, '16_151926473601.jpg', 0, 100, 1, '2018-02-22 01:58:56', '2018-02-22 01:59:20', NULL, 0),
(33, 16, NULL, '16_151926610301.jpg', 0, 100, 1, '2018-02-22 02:21:43', '2018-02-22 02:21:43', NULL, 0),
(34, 16, NULL, '16_151926612201.jpg', 0, 100, 1, '2018-02-22 02:22:02', '2018-02-22 02:22:02', NULL, 0),
(35, 16, NULL, '16_151926630101.jpg', 0, 100, 1, '2018-02-22 02:25:01', '2018-02-22 02:25:01', NULL, 0),
(36, 16, NULL, '16_151926630101.jpg', 0, 100, 1, '2018-02-22 02:25:01', '2018-02-22 02:25:01', NULL, 0),
(37, 16, NULL, '16_151926631901.jpg', 0, 100, 1, '2018-02-22 02:25:19', '2018-02-22 02:25:19', NULL, 0),
(38, 16, NULL, '16_151926652201.jpg', 0, 100, 1, '2018-02-22 02:28:42', '2018-02-22 02:28:42', NULL, 0),
(41, 16, NULL, '16_152907732601.jpg', 0, 100, 1, '2018-06-15 15:42:06', '2018-06-15 15:42:06', NULL, 0),
(42, 16, NULL, '16_152907738501.jpg', 0, 100, 1, '2018-06-15 15:43:05', '2018-06-15 15:43:05', NULL, 0),
(43, 16, 7, '16_yyjL_product1529158537.jpg', 0, 100, 1, '2018-06-16 14:15:37', '2018-06-16 14:19:41', NULL, 0),
(44, 16, NULL, '16_colorimg_152915869201.jpg', 1, 100, 1, '2018-06-16 14:18:12', '2018-06-16 14:52:13', NULL, 0),
(45, 16, 7, '16_colorimg_152915869301.jpg', 1, 100, 1, '2018-06-16 14:18:13', '2018-06-16 14:52:11', NULL, 0),
(46, 16, NULL, '16_colorimg_153153540901.jpg', 1, 100, 1, '2018-07-14 02:30:09', '2018-07-14 02:30:09', NULL, 0),
(47, 16, NULL, '16_colorimg_153153540901.jpg', 1, 100, 1, '2018-07-14 02:30:09', '2018-07-14 02:30:09', NULL, 0),
(48, 16, NULL, '16_Vfus_product1531600769.jpg', 0, 100, 1, '2018-07-14 20:39:29', '2018-07-14 20:39:29', NULL, 0),
(49, 16, NULL, '16_V7f4_product1531602521.jpg', 0, 100, 1, '2018-07-14 21:08:41', '2018-07-14 21:08:41', NULL, 0),
(50, 16, NULL, '16_XbyK_product1531602840.jpg', 0, 100, 1, '2018-07-14 21:14:00', '2018-07-14 21:14:00', NULL, 0),
(51, 16, NULL, '16_Kj3X_product1531603529.jpeg', 0, 100, 1, '2018-07-14 21:25:30', '2018-07-14 21:25:30', NULL, 0),
(52, 16, NULL, '16_ayDx_product1531603819.jpg', 0, 100, 1, '2018-07-14 21:30:19', '2018-07-14 21:30:19', NULL, 0),
(53, 16, NULL, '16_VW8j_product1531604396.jpg', 0, 100, 1, '2018-07-14 21:39:56', '2018-07-14 21:39:56', NULL, 0),
(54, 16, NULL, '16_h6qV_product1531604538.jpg', 0, 100, 1, '2018-07-14 21:42:18', '2018-07-14 21:42:18', NULL, 0),
(55, 16, NULL, '16_he6W_product1531689194.jpg', 0, 100, 1, '2018-07-15 21:13:14', '2018-07-15 21:13:14', NULL, 0),
(56, 16, NULL, '16_RSEZ_product1531689402.jpg', 0, 100, 1, '2018-07-15 21:16:42', '2018-07-15 21:16:42', NULL, 0),
(57, 16, NULL, '16_EJtN_product1531690054.jpg', 0, 100, 1, '2018-07-15 21:27:34', '2018-07-15 21:27:34', NULL, 0),
(63, 16, 9, '16__colorimg_1535059902wzmm.jpg', 1, 100, 1, '2018-07-18 13:26:53', '2018-08-23 21:31:42', NULL, 0),
(64, 16, 9, '16__colorimg_1535059902wzmm.jpg', 1, 100, 1, '2018-07-18 13:26:53', '2018-08-23 21:31:42', NULL, 0),
(65, 16, 9, '16__colorimg_1535059902wzmm.jpg', 1, 100, 1, '2018-07-18 13:27:10', '2018-08-23 21:31:42', NULL, 0),
(66, 16, 9, '16__colorimg_1535059902wzmm.jpg', 1, 100, 1, '2018-07-18 13:29:09', '2018-08-23 21:31:42', NULL, 0),
(67, 16, 9, '16__colorimg_1535059902wzmm.jpg', 1, 100, 1, '2018-08-23 21:14:51', '2018-08-23 21:31:42', NULL, 0),
(68, 16, 9, '16__colorimg_1535059902wzmm.jpg', 1, 100, 1, '2018-08-23 21:15:00', '2018-08-23 21:31:42', NULL, 0),
(69, 16, 9, '16__colorimg_1535059902wzmm.jpg', 1, 100, 1, '2018-08-23 21:15:06', '2018-08-23 21:31:42', NULL, 0),
(70, 16, 0, '16_jjT6_product1535059192.jpg', 0, 100, 1, '2018-08-23 21:19:52', '2018-08-23 21:35:55', NULL, 0),
(71, 16, 9, '16_MnZc_product1535059688.jpg', 0, 100, 1, '2018-08-23 21:28:09', '2018-08-23 21:35:18', NULL, 0),
(72, 16, 9, '16__colorimg_1535059950UA2q.jpg', 1, 100, 1, '2018-08-23 21:32:30', '2018-08-23 21:32:30', NULL, 0),
(75, 16, 9, '16_wHpb_product1535060782.jpg', 0, 100, 1, '2018-08-23 21:46:22', '2018-08-23 21:46:22', NULL, 0);

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
(1, 1, 6, 500, 1, '2017-11-02 12:51:34', '2018-07-25 15:55:38', 0),
(2, 1, 3, 450, 1, '2017-11-02 12:51:34', '0000-00-00 00:00:00', 0),
(4, 13, 14, 100, 1, '2017-12-19 10:22:40', '0000-00-00 00:00:00', 1),
(5, 13, 15, 200, 1, '2017-12-19 10:22:40', '0000-00-00 00:00:00', 1),
(7, 16, 18, 50, 1, '2017-12-19 10:24:19', '0000-00-00 00:00:00', 0),
(8, 16, 19, 100, 1, '2017-12-19 10:24:19', '0000-00-00 00:00:00', 0),
(9, 20, 21, 500, 1, '2018-05-24 13:57:54', '0000-00-00 00:00:00', 0),
(10, 20, 22, 200, 1, '2018-05-24 13:57:54', '0000-00-00 00:00:00', 0),
(11, 20, 23, 200, 1, '2018-05-24 13:57:54', '0000-00-00 00:00:00', 0),
(12, 20, 24, 1500, 1, '2018-05-24 13:57:54', '0000-00-00 00:00:00', 0),
(13, 25, 26, 150, 1, '2018-06-07 15:32:05', '0000-00-00 00:00:00', 0),
(14, 25, 19, 100, 1, '2018-06-07 15:32:05', '0000-00-00 00:00:00', 0),
(15, 1, 28, 300, 1, '2018-07-25 15:31:55', '2018-07-25 16:34:48', 1),
(16, 1, 29, 300, 1, '2018-07-25 15:33:11', '2018-07-25 16:34:40', 1),
(17, 1, 30, 300, 1, '2018-07-25 15:35:01', '2018-07-25 16:36:05', 1),
(18, 1, 31, 300, 1, '2018-07-25 15:36:16', '2018-07-25 16:39:55', 1),
(19, 1, 32, 300, 1, '2018-07-25 15:37:19', '2018-07-25 16:39:51', 1),
(20, 1, 33, 300, 1, '2018-07-25 15:38:28', '2018-07-25 16:39:47', 1),
(21, 1, 34, 300, 1, '2018-07-25 15:39:41', '2018-07-25 16:39:59', 1),
(22, 1, 35, 300, 1, '2018-07-25 15:42:32', '2018-07-25 22:30:43', 1),
(23, 1, 36, 3120300, 1, '2018-08-23 02:36:08', '2018-08-23 03:57:42', 1),
(24, 3, 37, 50, 1, '2018-09-04 09:25:08', '0000-00-00 00:00:00', 0);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `restaurantid` int(11) NOT NULL,
  `categoryid` int(11) NOT NULL,
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
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `restaurantid`, `categoryid`, `productname`, `productprice`, `productdesc`, `productimage`, `status`, `createdat`, `updatedat`, `deletedat`, `isdeleted`) VALUES
(1, 3, 12, 'Coconut Rice', 400, 'Rice', '3_coconut_rice.jpg', 1, '2017-10-09 08:50:35', NULL, NULL, 0),
(2, 3, 12, 'Ewa-Riro', 400, 'Beans', '3_ewa_riro.jpg', 1, '2017-10-09 08:50:35', NULL, NULL, 0),
(3, 3, 3, 'Water bottle with rice', 100, 'Cold Drinks', '3_Get-Ice-Cold-Water-Go.jpg', 1, '2017-10-09 09:25:29', '2017-12-13 09:23:43', NULL, 0),
(4, 3, 2, 'Egusi', 250, '', '3_Egusi_soup.jpg', 1, '2017-10-09 09:25:29', NULL, NULL, 0),
(5, 3, 1, 'Pounded Yam', 400, '', '3_pounded_yam.jpg', 1, '2017-10-09 09:34:59', NULL, NULL, 0),
(6, 3, 4, 'Beef', 250, '', '', 1, '2017-10-09 09:34:59', NULL, NULL, 0),
(7, 2, 11, 'Ofada Rice', 300, '', '', 1, '2017-10-09 15:41:41', NULL, NULL, 0),
(8, 3, 12, 'testing', 200, 'cool', '3_1511779654.jpeg', 1, '2017-11-27 10:47:34', NULL, NULL, 0);

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
(1, 3, 12, '    Coconut Rice', 400, 'Rice', '3_coconut_rice.jpg', 1, '2017-10-09 08:50:35', '2018-08-23 01:51:12', '2018-07-25 22:40:58', 0),
(2, 3, 12, 'Ewa-Riro', 400, 'Beans', '3_ewa_riro.jpg', 1, '2017-10-09 08:50:35', NULL, NULL, 0),
(3, 3, 3, '     Water bottle with rice', 450, 'Cold Drinks', '3_Get-Ice-Cold-Water-Go.jpg', 1, '2017-10-09 09:25:29', '2018-09-04 09:25:26', NULL, 0),
(4, 3, 0, ' Egusi', 250, '', '3_Egusi_soup.jpg', 1, '2017-10-09 09:25:29', '2018-08-23 01:18:55', NULL, 0),
(5, 3, 0, ' Pounded Yam', 400, '', '3_pounded_yam.jpg', 1, '2017-10-09 09:34:59', '2018-08-23 01:18:41', NULL, 0),
(6, 3, 0, 'MIDUO Brand 2017 Hot Design Swimwear Sexy Bandage Bathing Suits Push Up Brazilian Bikini Digital Printing Women Bikinis', 0, 'Design Swimwear Sexy Bandage Bathing Suits Push Up Brazilian Bikini Digital Printing Women Bikinis', '', 1, '2017-10-09 09:34:59', '2018-08-23 12:35:16', NULL, 0),
(7, 2, 11, 'Ofada Rice', 300, '', '', 1, '2017-10-09 15:41:41', NULL, NULL, 0),
(8, 3, 12, 'testing', 200, 'cool', '3_1511779654.jpeg', 1, '2017-11-27 10:47:34', NULL, NULL, 0),
(13, 3, 2, 'Oporopo Soup', 400, 'Best in all ', '3_1513783754.jpg', 1, '2017-12-19 10:22:40', '2017-12-20 15:32:33', NULL, 1),
(14, 3, 0, '+ stock meat', 100, '', '', 1, '2017-12-19 10:22:40', '2017-12-19 12:35:21', NULL, 0),
(15, 3, 0, '+ Cat Fish', 200, '', '', 1, '2017-12-19 10:22:40', '2017-12-19 10:22:40', NULL, 0),
(16, 3, 12, 'Beans', 300, 'Good product', '', 1, '2017-12-19 10:24:19', '2018-04-03 19:52:58', NULL, 0),
(17, 3, 0, 'youghut', 50, '', '', 1, '2017-12-19 10:24:19', '2017-12-20 12:42:43', NULL, 0),
(18, 3, 0, '7up', 50, '', '', 1, '2017-12-19 10:24:19', '2017-12-19 10:24:19', NULL, 0),
(19, 3, 0, 'dodo', 100, 'dodo', '', 1, '2017-12-19 10:24:19', '2017-12-20 12:36:09', NULL, 0),
(20, 3, 12, 'fried rice', 450, '', '3_1527170274.jpeg', 1, '2018-05-24 13:57:54', '2018-05-24 13:57:54', NULL, 0),
(21, 3, 0, 'chicken', 500, '', '', 1, '2018-05-24 13:57:54', '2018-06-21 11:42:20', NULL, 0),
(22, 3, 0, 'noodles', 200, '', '', 1, '2018-05-24 13:57:54', '2018-05-24 13:57:54', NULL, 0),
(23, 3, 0, 'plantain', 200, '', '', 1, '2018-05-24 13:57:54', '2018-05-24 13:57:54', NULL, 0),
(24, 3, 0, 'Family Size chicken', 1500, '', '', 1, '2018-05-24 13:57:54', '2018-05-24 13:57:54', NULL, 0),
(25, 3, 12, 'Asaro', 300, '', '3_1528385525.png', 1, '2018-06-07 15:32:05', '2018-06-07 15:32:05', NULL, 0),
(26, 3, 0, 'Fried Fish', 150, '', '', 1, '2018-06-07 15:32:05', '2018-06-07 15:32:05', NULL, 0),
(27, 3, 0, 'Dodo', 100, '', '', 1, '2018-06-07 15:32:05', '2018-06-07 15:32:05', NULL, 0),
(28, 3, 0, 'testing', 300, '', '', 1, '2018-07-25 15:31:55', '2018-07-25 15:31:55', NULL, 0),
(29, 3, 0, 'testing', 300, '', '', 1, '2018-07-25 15:33:10', '2018-07-25 15:33:10', NULL, 0),
(30, 3, 0, 'testing', 300, '', '', 1, '2018-07-25 15:35:01', '2018-07-25 15:35:01', NULL, 0),
(31, 3, 0, 'testing', 300, '', '', 1, '2018-07-25 15:36:16', '2018-07-25 15:36:16', NULL, 0),
(32, 3, 0, 'testing', 300, '', '', 1, '2018-07-25 15:37:19', '2018-07-25 15:37:19', NULL, 0),
(33, 3, 0, 'testing', 300, '', '', 1, '2018-07-25 15:38:28', '2018-07-25 15:38:28', NULL, 0),
(34, 3, 0, 'testing', 300, '', '', 1, '2018-07-25 15:39:41', '2018-07-25 15:39:41', NULL, 0),
(35, 3, 0, 'testing', 300, '', '', 1, '2018-07-25 15:42:32', '2018-07-25 15:42:32', NULL, 0),
(36, 3, 0, 'testing54', 3120300, '', '', 1, '2018-08-23 02:36:08', '2018-08-23 02:36:08', NULL, 0),
(37, 3, 0, 'ice block', 50, '', '', 1, '2018-09-04 09:25:08', '2018-09-04 09:25:27', NULL, 0);

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
  `productshortdesc` text NOT NULL,
  `productdesc` mediumtext NOT NULL,
  `productbrandid` int(11) DEFAULT NULL,
  `sales` tinyint(4) NOT NULL DEFAULT '0',
  `discount_percentage` int(250) DEFAULT NULL,
  `productsold` int(255) NOT NULL,
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

INSERT INTO `products_fashion` (`id`, `merchantid`, `slug`, `productfrontimage`, `productname`, `productshortdesc`, `productdesc`, `productbrandid`, `sales`, `discount_percentage`, `productsold`, `productinstock`, `productrate`, `othernote`, `status`, `createdat`, `updatedat`, `deletedat`, `isdeleted`) VALUES
(1, 16, 'prada-saffiano-brief-case-bag', '', 'Prada Saffiano Brief Case Bag', 'Italian Saffiano Brief Case Leather black bag features double top handle, detachable purse and side purse, gold tone hardware and zipper, zipper top closure, two main open compartments, one middle compartment with zipper closure. Made in Italy', 'Italian Saffiano Brief Case Leather black bag features double top handle, detachable purse and side purse, gold tone hardware and zipper, zipper top closure, two main open compartments, one middle compartment with zipper closure. Made in Italy..', 2, 1, NULL, 8, 0, 0, '', 1, '2018-01-25 13:02:30', '2018-07-16 14:45:55', NULL, 0),
(2, 16, 'handheld-bag', NULL, 'Handheld bag', '', '', NULL, 1, 1, 4, 0, 0, '', 1, '2018-01-26 02:11:39', '2018-07-17 09:25:53', NULL, 0),
(3, 16, 'osvaldo-rossi-snake-skin-shoe', NULL, 'Osvaldo Rossi Snake Skin Shoe', 'Grey SNAKE SKIN Italian SHOE', 'Grey SNAKE SKIN Italian SHOE', 1, 1, NULL, 0, 0, 0, '', 1, '2018-01-26 05:44:22', '2018-07-16 14:46:08', NULL, 0),
(5, 16, 'lemfo-lef2-android-51-smart-watch-phone-two-modes-mtk6580-quad-core-512mb-8gb-smartwatch-heart-rate-monitor', '16_151925991356.jpg', 'LEMFO LEF2 Android 5.1 Smart Watch Phone Two Modes MTK6580 Quad Core 512MB+ 8GB Smartwatch Heart Rate Monitor', 'Language:French,Japanese,Italian,Russian,Indonesian,Turkish,German,Arabic,Spanish,Polish,Portuguese,English,Korean', '<ul>\r\n	<li>Brand Name:LEMFO</li>\r\n	<li>Function:Answer Call,Message Reminder,Heart Rate Tracker,Call Reminder,Calendar,Dial Call,Alarm Clock,Push Message,Passometer</li>\r\n	<li>APP Download Available:Yes</li>\r\n	<li>Band Detachable:No</li>\r\n	<li>Band Material:Silica Gel</li>\r\n	<li>Language:French,Japanese,Italian,Russian,Indonesian,Turkish,German,Arabic,Spanish,Polish,Portuguese,English,Korean</li>\r\n	<li>CPU Model:MTK6580</li>\r\n	<li>Style:Fashion</li>\r\n	<li>RAM:512mb</li>\r\n	<li>Multiple Dials:Yes</li>\r\n	<li>Application Age Group:Adult</li>\r\n	<li>Waterproof Grade:Life Waterproof</li>\r\n	<li>Compatibility:All Compatible</li>\r\n	<li>Screen Size:1.3 inch</li>\r\n	<li>Resolution:240*240 Pixel</li>\r\n	<li>Mechanism:No</li>\r\n	<li>Type:On Wrist</li>\r\n	<li>Battery Detachable:No</li>\r\n	<li>Battery Capacity:&gt;450mAh</li>\r\n	<li>CPU Manufacturer:Mediatek</li>\r\n	<li>Movement Type:Electronic</li>\r\n	<li>Screen Shape:Round</li>\r\n	<li>Case Material:Alloy</li>\r\n	<li>SIM Card Available:Yes</li>\r\n	<li>System:Android OS</li>\r\n	<li>ROM:8GB</li>\r\n	<li>GPS:Yes</li>\r\n	<li>Network Mode:3G</li>\r\n	<li>Rear Camera:2MP</li>\r\n</ul>\r\n', 3, 0, 1, 28, 0, 0, '', 1, '2018-02-22 00:39:43', '2018-07-16 14:46:49', NULL, 0),
(6, 16, 'miduo-brand-2017-hot-design-swimwear-sexy-bandage-bathing-suits-push-up-brazilian-bikini-digital-printing-women-bikinis', NULL, 'MIDUO Brand 2017 Hot Design Swimwear Sexy Bandage Bathing Suits Push Up Brazilian Bikini Digital Printing Women Bikinis', 'Design Swimwear Sexy Bandage Bathing Suits Push Up Brazilian Bikini Digital Printing Women Bikinis', '<ul>\r\n	<li>Brand Name:miduo</li>\r\n	<li>Gender:Women</li>\r\n	<li>Waist:High Waist</li>\r\n	<li>Support Type:Wire Free</li>\r\n	<li>With Pad:No</li>\r\n	<li>Pattern Type:Solid,Print,Bordered</li>\r\n	<li>Model Number:80182001</li>\r\n	<li>Material:Polyester</li>\r\n	<li>Fit:Fits true to size, take your normal size</li>\r\n	<li>Item Type:Bikinis Set</li>\r\n	<li>Applicable Gender:Female</li>\r\n	<li>Whether The Steel Drag:With A Chest Pad Without Steel Care</li>\r\n	<li>Item No:80182001</li>\r\n	<li>Applicable Age:Adult</li>\r\n	<li>Fabric Name:Polyester</li>\r\n	<li>Weight:110 (G)</li>\r\n	<li>Size:S, M, L, XL</li>\r\n</ul>\r\n', 2, 1, 1, 0, 0, 0, '', 1, '2018-02-22 01:59:20', '2018-07-26 00:00:53', '2018-07-17 16:29:33', 0),
(7, 16, 'white-lace', NULL, 'White lace', '', '', 4, 1, NULL, 40, 0, 0, '', 1, '2018-06-16 14:19:41', '2018-07-17 15:30:38', '2018-07-17 16:30:38', 1),
(9, 16, 'product-name', NULL, 'product name', 'Short Description', '<p>Full Description</p>\r\n', 0, 0, 0, 0, 0, 0, '', 1, '2018-07-18 13:30:07', '2018-08-23 20:39:24', NULL, 0);

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
(22, 2, 7, 1, '2018-06-16 14:19:41', '2018-06-16 14:19:41', '0000-00-00 00:00:00', 0),
(44, 1, 6, 1, '2018-07-26 00:00:53', '2018-07-26 00:00:53', '0000-00-00 00:00:00', 0),
(45, 8, 6, 1, '2018-07-26 00:00:53', '2018-07-26 00:00:53', '0000-00-00 00:00:00', 0),
(46, 25, 6, 1, '2018-07-26 00:00:53', '2018-07-26 00:00:53', '0000-00-00 00:00:00', 0),
(51, 18, 9, 1, '2018-08-23 21:28:49', '2018-08-23 21:28:49', '0000-00-00 00:00:00', 0);

-- --------------------------------------------------------

--
-- Table structure for table `product_qty_color_size`
--

CREATE TABLE `product_qty_color_size` (
  `id` int(11) NOT NULL,
  `productid` int(255) NOT NULL,
  `quantity` int(255) NOT NULL,
  `productinstock` int(11) DEFAULT NULL,
  `productsold` int(11) NOT NULL DEFAULT '0',
  `sizeid` int(11) DEFAULT NULL,
  `colorid` int(11) DEFAULT NULL,
  `colorimagename` text NOT NULL,
  `colorimage` char(255) DEFAULT NULL,
  `price` double DEFAULT NULL,
  `discount_price` double DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1',
  `createdat` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updatedat` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `deletedat` timestamp NULL DEFAULT NULL,
  `isdeleted` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `product_qty_color_size`
--

INSERT INTO `product_qty_color_size` (`id`, `productid`, `quantity`, `productinstock`, `productsold`, `sizeid`, `colorid`, `colorimagename`, `colorimage`, `price`, `discount_price`, `status`, `createdat`, `updatedat`, `deletedat`, `isdeleted`) VALUES
(1, 1, 20, 20, 8, 9, 2, '', NULL, 20000, NULL, 1, '2018-01-25 13:10:18', '2018-07-09 09:25:04', NULL, 0),
(2, 2, 10, 10, 2, NULL, 10, '', NULL, 13200, 1320, 1, '2018-01-25 13:10:18', '2018-07-09 09:25:08', NULL, 0),
(3, 2, 10, 8, 2, NULL, 13, '', NULL, 13500, 1350, 1, '2018-01-25 13:10:18', '2018-07-09 09:25:28', NULL, 0),
(4, 3, 7, 7, 0, 9, 4, '', '16_AligatorSkin1.png', 37500, NULL, 1, '2018-01-26 05:52:51', '2018-07-09 09:25:34', NULL, 0),
(5, 3, 7, 7, 0, 10, 4, '', '16_AligatorSkin1.png', 37500, NULL, 1, '2018-01-26 05:52:51', '2018-06-19 14:40:40', NULL, 0),
(6, 3, 6, 6, 0, 11, 4, '', '16_AligatorSkin1.png', 37500, NULL, 1, '2018-01-26 05:52:51', '2018-06-19 14:40:42', NULL, 0),
(7, 3, 5, 5, 0, 11, 5, '', '16_AligatorSkin1_Red.png', 37500, NULL, 1, '2018-01-26 05:52:51', '2018-07-09 00:27:22', NULL, 0),
(8, 3, 10, 10, 0, 10, 5, '', '16_AligatorSkin1_Red.png', 37500, NULL, 1, '2018-01-26 05:52:51', '2018-06-19 14:36:24', NULL, 0),
(9, 3, 5, 5, 0, 9, 5, '', '16_AligatorSkin1_Red.png', 37500, NULL, 1, '2018-01-26 05:52:51', '2018-06-19 14:36:28', NULL, 0),
(14, 5, 20, 21, 19, NULL, 2, 'Black', '16_151925994401.jpg', 28470, NULL, 1, '2018-02-22 00:39:43', '2018-07-09 09:26:15', NULL, 0),
(15, 5, 20, 11, 9, NULL, 3, 'SILVER', '16_151925995301.jpg', 28479, NULL, 1, '2018-02-22 00:39:43', '2018-07-09 09:26:01', NULL, 0),
(16, 6, 30, 30, 0, 5, 14, '03-BROWN', '16_151926473101.jpg', 4501, 400, 1, '2018-02-22 01:59:20', '2018-08-23 13:05:37', NULL, 0),
(17, 6, 10, 10, 0, 4, 14, '03-BROWN', '16_151926473101.jpg', 4500, NULL, 1, '2018-02-22 01:59:20', '2018-08-23 13:05:37', NULL, 0),
(18, 6, 10, 10, 0, 3, 14, '03-BROWN', '16_151926473101.jpg', 4500, NULL, 1, '2018-02-22 01:59:20', '2018-08-23 13:05:37', NULL, 0),
(19, 6, 10, 10, 0, 2, 14, '03-BROWN', '16_151926473101.jpg', 4500, NULL, 1, '2018-02-22 01:59:20', '2018-08-23 13:05:37', NULL, 0),
(20, 6, 10, 9, 1, 5, 1, 'White', '16_151926473601.jpg', 4500, 400, 1, '2018-02-22 01:59:20', '2018-09-14 09:48:04', NULL, 0),
(21, 6, 10, 0, 0, 4, 1, 'White', '16_151926473601.jpg', 4500, NULL, 1, '2018-02-22 01:59:20', '2018-06-20 22:46:22', NULL, 0),
(22, 6, 10, 0, 0, 3, 1, 'White', '16_151926473601.jpg', 4800, NULL, 1, '2018-02-22 01:59:20', '2018-06-20 22:46:20', NULL, 0),
(23, 6, 10, 10, 0, 1, 1, 'White', '16_151926473601.jpg', 4500, NULL, 1, '2018-02-22 01:59:20', '2018-06-19 11:26:07', NULL, 0),
(24, 7, 10, 100, 40, NULL, 1, 'White', '16_colorimg_152915869301.jpg', 6000, 300, 1, '2018-06-16 14:19:41', '2018-07-09 13:09:44', NULL, 0),
(26, 9, 10, 7, 3, 6, 2, 'white', '16__colorimg_1535059902wzmm.jpg', 400, 0, 1, '2018-07-18 13:30:07', '2018-09-05 14:41:25', NULL, 0),
(27, 9, 10, 10, 0, 6, 14, '03-BROWN', '16_colorimg_153192043001.jpg', 450, 0, 1, '2018-07-18 13:30:07', '2018-08-23 21:33:31', NULL, 0);

-- --------------------------------------------------------

--
-- Table structure for table `product_qty_price_color`
--

CREATE TABLE `product_qty_price_color` (
  `id` int(11) NOT NULL,
  `product_id` int(255) NOT NULL,
  `quantity` int(255) NOT NULL,
  `size` char(255) NOT NULL DEFAULT '',
  `color` char(255) NOT NULL DEFAULT '',
  `colorimage` text NOT NULL,
  `productpricequantity` double NOT NULL,
  `description` text NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1',
  `createdat` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updatedat` timestamp NULL DEFAULT NULL,
  `deletedat` timestamp NULL DEFAULT NULL,
  `isdeleted` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
-- Table structure for table `promo_duration`
--

CREATE TABLE `promo_duration` (
  `id` int(11) NOT NULL,
  `durationname` varchar(255) NOT NULL DEFAULT '',
  `durationcount` varchar(255) DEFAULT NULL,
  `durationdate` varchar(255) DEFAULT NULL,
  `order` int(11) DEFAULT '100',
  `status` tinyint(4) DEFAULT '1',
  `createdat` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updatedat` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
  `deletedat` timestamp NULL DEFAULT NULL,
  `isdeleted` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `promo_duration`
--

INSERT INTO `promo_duration` (`id`, `durationname`, `durationcount`, `durationdate`, `order`, `status`, `createdat`, `updatedat`, `deletedat`, `isdeleted`) VALUES
(1, '1 Day', '1', 'Day', 100, 1, '2018-08-04 22:48:30', '2018-08-15 12:44:19', NULL, 0),
(2, '1 Week', '1', 'Week', 100, 1, '2018-08-04 22:48:30', '2018-09-03 14:00:10', NULL, 0),
(3, '1 Month', '1', 'Month', 100, 1, '2018-08-04 22:48:30', '2018-08-15 12:44:36', NULL, 0),
(4, '3 Month', '3', 'Month', 100, 1, '2018-08-04 22:48:30', '2018-08-15 12:44:46', NULL, 0),
(5, '6 Month', '6', 'Month', 100, 1, '2018-08-04 22:48:30', '2018-08-15 12:44:49', NULL, 0),
(6, '1 Year', '1', 'Year', 100, 1, '2018-08-04 22:48:30', '2018-08-15 12:45:01', NULL, 0);

-- --------------------------------------------------------

--
-- Table structure for table `promo_price`
--

CREATE TABLE `promo_price` (
  `id` int(11) NOT NULL,
  `bannertypeid` int(11) NOT NULL,
  `promodurationid` int(11) NOT NULL,
  `price` int(11) DEFAULT NULL,
  `status` tinyint(4) DEFAULT '1',
  `createdat` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updatedat` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
  `deletedat` timestamp NULL DEFAULT NULL,
  `isdeleted` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `promo_price`
--

INSERT INTO `promo_price` (`id`, `bannertypeid`, `promodurationid`, `price`, `status`, `createdat`, `updatedat`, `deletedat`, `isdeleted`) VALUES
(1, 4, 1, 1000, 1, '2018-08-04 22:50:06', '0000-00-00 00:00:00', NULL, 0),
(2, 4, 2, 6000, 1, '2018-08-04 22:50:06', '0000-00-00 00:00:00', NULL, 0),
(4, 4, 3, 20000, 1, '2018-08-04 22:50:06', '0000-00-00 00:00:00', NULL, 0),
(5, 4, 4, 55000, 1, '2018-08-04 22:50:06', '0000-00-00 00:00:00', NULL, 0),
(6, 4, 5, 100000, 1, '2018-08-04 22:50:06', '0000-00-00 00:00:00', NULL, 0),
(7, 4, 6, 200000, 1, '2018-08-04 22:50:06', '0000-00-00 00:00:00', NULL, 0),
(8, 3, 1, 500, 1, '2018-08-04 22:50:06', '0000-00-00 00:00:00', NULL, 0),
(9, 3, 2, 3000, 1, '2018-08-04 22:50:06', '0000-00-00 00:00:00', NULL, 0),
(10, 3, 3, 10000, 1, '2018-08-04 22:50:06', '0000-00-00 00:00:00', NULL, 0),
(11, 2, 4, 28000, 1, '2018-08-04 22:50:06', '0000-00-00 00:00:00', NULL, 0),
(12, 2, 5, 55000, 1, '2018-08-04 22:50:06', '0000-00-00 00:00:00', NULL, 0),
(13, 2, 6, 110000, 1, '2018-08-04 22:50:06', '0000-00-00 00:00:00', NULL, 0),
(14, 8, 3, 10000, 1, '2018-08-04 22:50:06', '0000-00-00 00:00:00', NULL, 0),
(15, 8, 4, 25000, 1, '2018-08-04 22:50:06', '0000-00-00 00:00:00', NULL, 0),
(16, 9, 3, 7400, 0, '2018-08-04 22:50:06', '2018-09-03 13:02:17', NULL, 0),
(17, 9, 4, 18000, 1, '2018-08-04 22:50:06', '0000-00-00 00:00:00', NULL, 0);

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
  `email` varchar(200) NOT NULL,
  `address` text,
  `cityid` int(11) DEFAULT NULL,
  `stateid` int(11) DEFAULT NULL,
  `country` varchar(200) DEFAULT NULL,
  `latitude` char(50) DEFAULT NULL,
  `longitude` char(50) DEFAULT NULL,
  `logo` varchar(200) DEFAULT NULL,
  `banner` varchar(200) NOT NULL,
  `tablereservation` tinyint(4) NOT NULL DEFAULT '0',
  `paymenttype` varchar(255) DEFAULT NULL,
  `percharge` int(11) NOT NULL,
  `perchargestatus` tinyint(4) NOT NULL DEFAULT '0',
  `paystackbanksid` int(11) DEFAULT NULL,
  `bankCode` varchar(255) DEFAULT NULL,
  `bankName` varchar(255) DEFAULT NULL,
  `accountNo` int(15) DEFAULT NULL,
  `accountName` varchar(255) DEFAULT NULL,
  `admin_read_status` tinyint(4) NOT NULL DEFAULT '0',
  `status` tinyint(4) NOT NULL DEFAULT '0',
  `firstname` varchar(200) NOT NULL,
  `lastname` varchar(200) DEFAULT NULL,
  `gender` varchar(11) DEFAULT NULL,
  `pwd` varchar(200) NOT NULL,
  `phone` char(20) DEFAULT NULL,
  `phone2` char(20) DEFAULT NULL,
  `pickup` tinyint(4) NOT NULL DEFAULT '0',
  `homedelivery` tinyint(4) NOT NULL DEFAULT '1',
  `vat` int(200) NOT NULL,
  `createdat` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updatedat` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `deletedat` timestamp NULL DEFAULT NULL,
  `isdeleted` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `restaurants`
--

INSERT INTO `restaurants` (`id`, `merchanttype`, `companyname`, `slug`, `companydesc`, `usersid`, `parentid`, `minorder`, `deliverytime`, `email`, `address`, `cityid`, `stateid`, `country`, `latitude`, `longitude`, `logo`, `banner`, `tablereservation`, `paymenttype`, `percharge`, `perchargestatus`, `paystackbanksid`, `bankCode`, `bankName`, `accountNo`, `accountName`, `admin_read_status`, `status`, `firstname`, `lastname`, `gender`, `pwd`, `phone`, `phone2`, `pickup`, `homedelivery`, `vat`, `createdat`, `updatedat`, `deletedat`, `isdeleted`) VALUES
(1, 'cuisine', 'Adega Express', 'adega', 'MEDITERRANEAN, SANDWICHES,\r\n', 7, 0, NULL, NULL, 'adega@ebs.com', '31 Fola Osibo Road', 489, 25, NULL, '6.4427448', '3.468502899999976', 'res_11.jpeg', '', 0, NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, 0, 1, 'Adega', 'Express', 'male', '', NULL, NULL, 0, 1, 0, '2017-10-07 20:37:55', '2018-08-05 11:18:51', NULL, 0),
(2, 'cuisine', 'Better Option', 'better-option', 'SALADS AND FRUITS, SANDWICHES,', 7, 0, NULL, NULL, 'better@ebs.com', '7 Ilu Drive', 488, 25, NULL, '6.455868199999999', '3.410025399999995', 'res_3.png', '', 0, NULL, 30, 1, NULL, NULL, NULL, NULL, NULL, 0, 0, 'Better', 'Option', 'male', '', '', '', 0, 1, 0, '2017-10-07 20:37:55', '2018-08-28 14:08:28', NULL, 0),
(3, 'cuisine', 'Bukka Huts', 'bukka', 'Swallow,Finger etc food', 25, 0, 0, '', 'trivin98@gmail.com', 'Block 69A Plot 8 Admiralty Way', 493, 25, NULL, '6.447544199999999', '3.4673095000000558', 'LOGOB53757573.jpeg', '3__banner1513693155.png', 1, NULL, 10, 1, 9, 'ACCT_m5kk5d4mggoi8v5', 'Guaranty Trust Bank', 12334433, 'Bukka Huts', 0, 1, 'Bukka', 'Huts', 'female', '', '080831123343', '08048324322', 0, 1, 50, '2017-10-07 20:59:00', '2018-09-19 10:39:16', NULL, 0),
(4, 'cuisine', 'CAFE JADE', 'cafe-jade', 'BREAKFAST, BRITISH, BURGERS, CAFE, CREPE, GRILL & BBQ, NIGERIAN, SALADS AND FRUITS, SANDWICHES, SMALL CHOPS/FINGER FOODS', 25, 0, NULL, NULL, 'info@cafejade.com', '1139 Bishop Oluwole Street,Victoria Island', 488, 25, NULL, '6.4140852', '3.415962000000036', 'LOGOB41472901.jpeg', '', 0, NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, 0, 1, 'cafe', 'jade', 'female', '', NULL, NULL, 0, 1, 0, '2017-10-07 20:59:00', '2018-08-05 11:19:11', NULL, 0),
(5, 'cuisine', 'CAFE LICIOUS', 'cafe-licious', 'AMERICAN, BURGERS, CAFE, JUICES, SANDWICHES,', 7, 0, NULL, NULL, 'info@cafelicious.com', '60 Allen avenue', 491, 25, NULL, '6.6019714', '3.352133399999957', 'LOGOB41371706.png', '', 0, NULL, 30, 1, NULL, NULL, NULL, NULL, NULL, 0, 1, 'cafe', 'licious', 'male', '', NULL, NULL, 0, 1, 0, '2017-10-07 21:38:54', '2018-08-05 11:19:19', NULL, 0),
(6, 'cuisine', 'Dotimi (Mobile Pot of Soups)', 'dotimi', 'Nigeria foods', 25, 0, NULL, NULL, 'order@dotimi.com', '40 B Ogudu Ojota Road, Ogudu GRA', 491, 25, NULL, '6.5870374', '3.3824839999999767', 'LOGOB32462705.png', '', 0, NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, 0, 1, 'Dotun', 'dman', 'male', '', NULL, NULL, 0, 1, 0, '2017-10-07 21:38:54', '2018-08-05 11:19:24', NULL, 0),
(7, 'cuisine', 'Gits', 'gits', 'BURGERS, CAKES, CONFECTIONERIES, CONTINENTAL, CREPE, PIZZA, SANDWICHES,', 24, 0, NULL, NULL, 'get@gits.com', 'Emerald Shops, Opposite Unilag Main Gate, Akoka', 495, 25, NULL, '6.5292745', '3.3874435999999832', 'LOGOB45254629.jpeg', '', 0, NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, 0, 1, 'gift', 'ik', 'female', '', NULL, NULL, 0, 1, 0, '2017-10-07 21:38:54', '2018-08-05 11:19:28', NULL, 0),
(8, 'cuisine', 'Mama Cass', 'mama-cass', 'CONFECTIONERIES, NIGERIAN,', 25, 0, NULL, NULL, 'info@mamacass.com', '4a, Oyeleke Street, Off Kudirat Abiola Way, Alausa', 491, 25, NULL, '6.6099649', '3.357901800000036', 'LOGOB38190949.jpeg', '', 0, NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, 0, 1, 'mama', 'cass', 'female', '', NULL, NULL, 0, 1, 0, '2017-10-07 21:38:54', '2018-08-05 11:19:35', NULL, 0),
(9, 'cuisine', 'Pizza House', 'pizza-house', 'Pizza', 21, 0, NULL, NULL, 'info@Pizzahouse.com', 'Adeniran Ogunsanya Shopping Mall, Inside the Food court (Shoprite)', 500, 25, '', '6.490838', '3.3570521000000326', 'LOGOB45254629.png', '', 0, NULL, 20, 1, NULL, NULL, NULL, NULL, NULL, 0, 1, 'Pizza', 'house', 'male', '', NULL, NULL, 0, 1, 0, '2017-10-07 21:38:54', '2018-08-05 11:19:49', NULL, 0),
(10, 'cuisine', 'Pizza House', 'pizza-house1', 'Pizza', 22, 9, NULL, NULL, 'info@Pizzahouse.com', 'Ogudu GRA', 491, 25, NULL, '6.5785661', '3.3879300999999487', 'LOGOB45254629.png', '', 0, NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, 0, 1, 'Pizza', 'house', 'male', '', NULL, NULL, 0, 1, 0, '2017-10-07 21:38:54', '2018-08-05 11:19:57', NULL, 0),
(11, 'cuisine', 'Otanwa Kitchen', 'otanwa', 'CHINESE, CONTINENTAL, NIGERIAN, SANDWICHES', 14, 0, NULL, NULL, 'info@otanwakitchen.com', '1,Ojileru street,Oworonshoki', 495, 25, NULL, '6.557196999999999', '3.396611000000007', 'LOGOB13169509.png', '', 0, NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, 0, 0, 'Otanwa', 'Kitchen', 'male', '', NULL, NULL, 0, 1, 0, '2017-10-07 21:38:54', '2018-08-05 11:20:06', NULL, 0),
(12, 'cuisine', 'Rhapsody''s', 'rhapsodys', 'CONTINENTAL, DESSERTS, GRILL & BBQ, PIZZA(STRICTLY FOR CORPORATE PARTIES AND TABLE RESERVATIONS)', 13, 0, NULL, NULL, 'info@rhapsody.com', '19A Agoro Odiyan, Victoria Island', 488, 25, NULL, '6.429488399999999', '3.4185830000000124', 'LOGOB32731810.png', '', 0, NULL, 20, 1, NULL, NULL, NULL, NULL, NULL, 0, 0, 'rhapsody', 'res', 'male', '', NULL, NULL, 0, 1, 0, '2017-10-07 21:53:14', '2018-08-05 11:20:17', NULL, 0),
(13, 'cuisine', 'Melting Moments', 'melting-moments', 'DESSERTS', 12, 0, NULL, NULL, 'info@meltingmoments.com', '', 491, 25, NULL, NULL, NULL, 'LOGOB14691591.png', '', 0, NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, 0, 0, '', NULL, 'male', '', NULL, NULL, 0, 1, 0, '2017-10-07 21:53:14', '2018-08-05 11:20:31', NULL, 0),
(14, 'cuisine', 'Mr Goodfood', 'mr-goodfood', 'Good food ', 11, 0, NULL, NULL, 'order@mrgoodfood.com', '128A,Association Way,Dolphin estate.Ikoyi', 488, 25, NULL, '6.458082', '3.417966100000058', 'LOGOB22922646.jpeg', '', 0, NULL, 10, 1, 6, 'ACCT_x5u966x7nyrpu6n', 'Fidelity Bank', 10023556, NULL, 0, 1, 'John', 'Goodfood', 'female', '', NULL, NULL, 0, 1, 0, '2017-10-07 21:57:56', '2018-08-05 16:55:58', NULL, 0),
(15, 'cuisine', 'YIN YANG', 'yin-yang', 'Chinese Foods', 7, 0, NULL, NULL, 'info@yinyang.com', '5, Admiralty Way, Lekki Phase 1', 489, 25, NULL, '6.444216', '3.455116500000031', 'LOGOB73902707.jpeg', '', 0, NULL, 10, 1, NULL, NULL, NULL, NULL, NULL, 0, 1, 'Yin', 'Yang', 'female', '', NULL, NULL, 0, 1, 0, '2017-10-07 21:57:56', '2018-09-19 13:30:14', NULL, 0),
(16, 'fashion', 'Bongiwe Walazasss', 'bongiwe-walazasss', '', 25, 0, NULL, NULL, 'info@bongiwewalaza.com', '1292, lake Way, Lekki Phase 1', 489, 25, NULL, '6.4439009', '3.475083600000062', 'Bongiwe_Walaza.jpg', '', 0, NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, 0, 1, 'Bongiwe', 'Walaza', NULL, '', '', '', 0, 1, 0, '2018-01-25 11:31:29', '2018-08-29 10:52:08', NULL, 0);

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
-- Table structure for table `restaurants_copy`
--

CREATE TABLE `restaurants_copy` (
  `id` int(11) NOT NULL,
  `idCopy` varchar(200) DEFAULT NULL,
  `merchanttype` varchar(200) NOT NULL DEFAULT '',
  `companyname` varchar(200) NOT NULL,
  `slug` varchar(200) DEFAULT NULL,
  `companydesc` text NOT NULL,
  `usersid` int(12) NOT NULL,
  `parentid` int(11) NOT NULL DEFAULT '0',
  `minorder` double DEFAULT NULL,
  `deliverytime` varchar(12) DEFAULT NULL,
  `email` varchar(200) NOT NULL,
  `address` text,
  `cityid` int(11) DEFAULT NULL,
  `stateid` int(11) DEFAULT NULL,
  `country` varchar(200) DEFAULT NULL,
  `logo` varchar(200) DEFAULT NULL,
  `banner` varchar(200) NOT NULL,
  `tablereservation` tinyint(4) NOT NULL DEFAULT '0',
  `percharge` int(11) NOT NULL,
  `perchargestatus` tinyint(4) NOT NULL DEFAULT '0',
  `bankCode` varchar(255) DEFAULT NULL,
  `bankName` varchar(255) DEFAULT NULL,
  `accountNo` int(15) DEFAULT NULL,
  `admin_read_status` tinyint(4) NOT NULL DEFAULT '0',
  `status` tinyint(4) NOT NULL DEFAULT '0',
  `firstname` varchar(200) NOT NULL,
  `lastname` varchar(200) DEFAULT NULL,
  `gender` varchar(11) DEFAULT NULL,
  `pwd` varchar(200) NOT NULL,
  `phone` char(20) DEFAULT NULL,
  `phone2` char(20) DEFAULT NULL,
  `pickup` tinyint(4) NOT NULL DEFAULT '0',
  `homedelivery` tinyint(4) NOT NULL DEFAULT '1',
  `vat` int(200) NOT NULL,
  `createdat` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updatedat` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `deletedat` timestamp NULL DEFAULT NULL,
  `isdeleted` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `restaurants_copy`
--

INSERT INTO `restaurants_copy` (`id`, `idCopy`, `merchanttype`, `companyname`, `slug`, `companydesc`, `usersid`, `parentid`, `minorder`, `deliverytime`, `email`, `address`, `cityid`, `stateid`, `country`, `logo`, `banner`, `tablereservation`, `percharge`, `perchargestatus`, `bankCode`, `bankName`, `accountNo`, `admin_read_status`, `status`, `firstname`, `lastname`, `gender`, `pwd`, `phone`, `phone2`, `pickup`, `homedelivery`, `vat`, `createdat`, `updatedat`, `deletedat`, `isdeleted`) VALUES
(1, NULL, 'cuisine', 'Adega Express', NULL, 'MEDITERRANEAN, SANDWICHES,\r\n', 7, 0, NULL, NULL, 'adega@ebs.com', '31 Fola Osibo Road', 489, 25, NULL, 'res_11.jpeg', '', 0, 0, 0, NULL, NULL, NULL, 0, 1, 'Adega', 'Express', 'male', '', NULL, NULL, 0, 1, 0, '2017-10-07 20:37:55', '2018-03-15 21:02:07', NULL, 0),
(2, NULL, 'cuisine', 'Better Option', NULL, 'SALADS AND FRUITS, SANDWICHES,', 7, 0, NULL, NULL, 'better@ebs.com', '7 Ilu Drive', 488, 25, NULL, 'res_3.png', '', 0, 30, 1, NULL, NULL, NULL, 0, 1, 'Better', 'Option', 'male', '', '08000000000', NULL, 0, 1, 0, '2017-10-07 20:37:55', '2017-12-07 16:10:38', NULL, 0),
(3, NULL, 'cuisine', 'Bukka Hats', NULL, 'Swallow,Finger etc food', 25, 0, 0, '', 'admin@bukkahat.com', 'Block 69A Plot 8 Admiralty Way', 489, 25, NULL, 'LOGOB53757573.jpeg', '3__banner1513693155.png', 1, 10, 1, 'ACCT_m5kk5d4mggoi8v5', 'Guaranty Trust Bank', 12334433, 0, 1, 'Bukka', 'Huts', 'female', '', '080831123343', '08048324322', 0, 1, 50, '2017-10-07 20:59:00', '2018-04-24 17:05:00', NULL, 0),
(4, NULL, 'cuisine', 'CAFE JADE', NULL, 'BREAKFAST, BRITISH, BURGERS, CAFE, CREPE, GRILL & BBQ, NIGERIAN, SALADS AND FRUITS, SANDWICHES, SMALL CHOPS/FINGER FOODS', 25, 0, NULL, NULL, 'info@cafejade.com', '1139 Bishop Oluwole Street,Victoria Island', 488, 25, NULL, 'LOGOB41472901.jpeg', '', 0, 0, 0, NULL, NULL, NULL, 0, 1, 'cafe', 'jade', 'female', '', NULL, NULL, 0, 1, 0, '2017-10-07 20:59:00', '2018-03-16 10:02:38', NULL, 0),
(5, NULL, 'cuisine', 'CAFE LICIOUS', NULL, 'AMERICAN, BURGERS, CAFE, JUICES, SANDWICHES,', 7, 0, NULL, NULL, 'info@cafelicious.com', '60 Allen avenue', 491, 25, NULL, 'LOGOB41371706.png', '', 0, 30, 1, NULL, NULL, NULL, 0, 1, 'cafe', 'licious', 'male', '', NULL, NULL, 0, 1, 0, '2017-10-07 21:38:54', '2017-12-07 13:46:51', NULL, 0),
(6, NULL, 'cuisine', 'Dotimi (Mobile Pot of Soups)', NULL, 'Nigeria foods', 25, 0, NULL, NULL, 'order@dotimi.com', '40 B Ogudu Ojota Road, Ogudu GRA', 491, 25, NULL, 'LOGOB32462705.png', '', 0, 0, 0, NULL, NULL, NULL, 0, 1, 'Dotun', 'dman', 'male', '', NULL, NULL, 0, 1, 0, '2017-10-07 21:38:54', NULL, NULL, 0),
(7, NULL, 'cuisine', 'Gits', NULL, 'BURGERS, CAKES, CONFECTIONERIES, CONTINENTAL, CREPE, PIZZA, SANDWICHES,', 24, 0, NULL, NULL, 'get@gits.com', 'Emerald Shops, Opposite Unilag Main Gate, Akoka', 495, 25, NULL, 'LOGOB45254629.jpeg', '', 0, 0, 0, NULL, NULL, NULL, 0, 1, 'gift', 'ik', 'female', '', NULL, NULL, 0, 1, 0, '2017-10-07 21:38:54', NULL, NULL, 0),
(8, NULL, 'cuisine', 'Mama Cass', NULL, 'CONFECTIONERIES, NIGERIAN,', 25, 0, NULL, NULL, 'info@mamacass.com', '4a, Oyeleke Street, Off Kudirat Abiola Way, Alausa', 491, 25, NULL, 'LOGOB38190949.jpeg', '', 0, 0, 0, NULL, NULL, NULL, 0, 1, 'mama', 'cass', 'female', '', NULL, NULL, 0, 1, 0, '2017-10-07 21:38:54', '2017-11-30 00:00:25', NULL, 0),
(9, NULL, 'cuisine', 'Pizza House', NULL, 'Pizza', 21, 0, NULL, NULL, 'info@Pizzahouse.com', 'Adeniran Ogunsanya Shopping Mall, Inside the Food court (Shoprite)', 500, 25, NULL, 'LOGOB45254629.png', '', 0, 20, 1, NULL, NULL, NULL, 0, 1, 'Pizza', 'house', 'male', '', NULL, NULL, 0, 1, 0, '2017-10-07 21:38:54', '2017-12-07 13:47:00', NULL, 0),
(10, NULL, 'cuisine', 'Pizza House', NULL, 'Pizza', 22, 9, NULL, NULL, 'info@Pizzahouse.com', 'Ogudu GRA', 491, 25, NULL, 'LOGOB45254629.png', '', 0, 0, 0, NULL, NULL, NULL, 0, 1, 'Pizza', 'house', 'male', '', NULL, NULL, 0, 1, 0, '2017-10-07 21:38:54', NULL, NULL, 0),
(11, NULL, 'cuisine', 'Otanwa Kitchen', NULL, 'CHINESE, CONTINENTAL, NIGERIAN, SANDWICHES', 14, 0, NULL, NULL, 'info@otanwakitchen.com', '1,Ojileru street,Oworonshoki', 495, 25, NULL, 'LOGOB13169509.png', '', 0, 0, 0, NULL, NULL, NULL, 0, 0, 'Otanwa', 'Kitchen', 'male', '', NULL, NULL, 0, 1, 0, '2017-10-07 21:38:54', '2018-03-19 11:07:26', NULL, 0),
(12, NULL, 'cuisine', 'Rhapsody''s', NULL, 'CONTINENTAL, DESSERTS, GRILL & BBQ, PIZZA(STRICTLY FOR CORPORATE PARTIES AND TABLE RESERVATIONS)', 13, 0, NULL, NULL, 'info@rhapsody.com', '19A Agoro Odiyan, Victoria Island', 488, 25, NULL, 'LOGOB32731810.png', '', 0, 20, 1, NULL, NULL, NULL, 0, 0, 'rhapsody', 'res', 'male', '', NULL, NULL, 0, 1, 0, '2017-10-07 21:53:14', '2018-03-19 11:07:39', NULL, 0),
(13, NULL, 'cuisine', 'Melting Moments', NULL, 'DESSERTS', 12, 0, NULL, NULL, 'info@meltingmoments.com', '', 491, 25, NULL, 'LOGOB14691591.png', '', 0, 0, 0, NULL, NULL, NULL, 0, 0, '', NULL, 'male', '', NULL, NULL, 0, 1, 0, '2017-10-07 21:53:14', '2018-03-15 21:02:05', NULL, 0),
(14, NULL, 'cuisine', 'Mr Goodfood', NULL, 'Good food ', 11, 0, NULL, NULL, 'order@mrgoodfood.com', '128A,Association Way,Dolphin estate.Ikoyi', 488, 25, NULL, NULL, '', 0, 10, 1, 'ACCT_x5u966x7nyrpu6n', 'Fidelity Bank', 10023556, 0, 1, 'John', 'Goodfood', 'female', '', NULL, NULL, 0, 1, 0, '2017-10-07 21:57:56', '2018-04-24 17:13:08', NULL, 0),
(15, NULL, 'cuisine', 'YIN YANG', NULL, 'Chinese Foods', 7, 0, NULL, NULL, 'admin@yinyang.com', '5, Admiralty Way, Lekki Phase 1', 489, 25, NULL, 'LOGOB73902707.jpeg', '', 0, 0, 0, NULL, NULL, NULL, 0, 0, 'Yin', 'Yang', 'female', '', NULL, NULL, 0, 1, 0, '2017-10-07 21:57:56', '2018-03-15 21:01:53', NULL, 0),
(16, NULL, 'fashion', 'Bongiwe Walazas', 'bongiwe-walazas', '', 25, 0, NULL, NULL, 'info@bongiwewalaza.com', '1292, lake Way, Lekki Phase 1', 489, 25, NULL, 'Bongiwe_Walaza.jpg', '', 0, 0, 0, NULL, NULL, NULL, 0, 1, 'Bongiwe', 'Walaza', NULL, '', NULL, NULL, 0, 1, 0, '2018-01-25 11:31:29', '2018-03-07 10:40:56', NULL, 0),
(17, 'B11543963', 'cuisine', 'Lamzie''s Hut', 'lamzies-hut', '', 3, 0, NULL, NULL, 'oaadigun@gmail.com', '80B lafiaji way dolphin estate ikoyi.', 488, 25, NULL, NULL, '', 0, 0, 0, NULL, NULL, NULL, 0, 0, '', NULL, NULL, '', NULL, NULL, 0, 1, 0, '2018-05-07 12:39:04', '2018-05-07 12:39:04', NULL, 0),
(18, 'B12664829', 'cuisine', 'De Ninos Restaurant ', 'de-ninos-restaurant', '', 4, 0, NULL, NULL, 'deninosrestaurantandbar@gmail.com', 'Block A2 plot 4, Aseries wole olateju crescent off admiralty way lekki phase1.Lagos ', 489, 25, NULL, 'LOGOB12664829.png', '', 0, 0, 0, NULL, NULL, NULL, 0, 0, '', NULL, NULL, '', NULL, NULL, 0, 1, 0, '2018-05-07 12:39:04', '2018-05-07 12:39:04', NULL, 0),
(19, 'B12756639', 'cuisine', 'Grej Restaurant', 'grej-restaurant', '', 5, 0, NULL, NULL, 'mea980ts@gmail.com', 'Shop 49 Operation drive, Dolphin Estate, Ikoyi ', 488, 25, NULL, 'LOGOB12756639.jpeg', '', 0, 0, 0, NULL, NULL, NULL, 0, 0, '', NULL, NULL, '', NULL, NULL, 0, 1, 0, '2018-05-07 12:39:04', '2018-05-07 12:39:04', NULL, 0),
(20, 'B13169509', 'cuisine', 'OTANWA KITCHEN', 'otanwa-kitchen', '', 6, 0, NULL, NULL, 'friday.otanwa@gmail.com', '1,Ojileru street,Oworonshoki.Lagos state', 751, 25, NULL, 'LOGOB13169509.png', '', 0, 0, 0, NULL, NULL, NULL, 0, 0, '', NULL, NULL, '', NULL, NULL, 0, 1, 0, '2018-05-07 12:39:04', '2018-05-07 12:39:04', NULL, 0),
(21, 'B13519701', 'cuisine', 'Unusual \r\n\r\nCuisine ', 'unusual-cuisine', '', 7, 0, NULL, NULL, 'patrick.ideho@unusualcuisine.com', '8D layi Yusuf off admiralty way lekki phase1 lagos.', 489, 25, NULL, 'LOGOB13519701.png', '', 0, 0, 0, NULL, NULL, NULL, 0, 0, '', NULL, NULL, '', NULL, NULL, 0, 1, 0, '2018-05-07 12:39:04', '2018-05-07 12:39:04', NULL, 0),
(22, 'B14691591', 'cuisine', 'Melting Moments', 'melting-moments', '', 8, 0, NULL, NULL, 'tolu@meltingmoments.com.ng', 'Shop U02, 1st Floor Opposite Silverbird Cinema, Ikeja City Mall,Alausa', 740, 25, NULL, 'LOGOB14691591.png', '', 0, 0, 0, NULL, NULL, NULL, 0, 0, '', NULL, NULL, '', NULL, NULL, 0, 1, 0, '2018-05-07 12:39:04', '2018-05-07 12:39:04', NULL, 0),
(23, 'B14890655', 'cuisine', 'Anike''s Kitchen', 'anikes-kitchen', '', 9, 0, NULL, NULL, 'ameenatquadri06@gmail.com', '11, Stella Osholake Street,Ajao Estate.', 740, 25, NULL, NULL, '', 0, 0, 0, NULL, NULL, NULL, 0, 0, '', NULL, NULL, '', NULL, NULL, 0, 1, 0, '2018-05-07 12:39:04', '2018-05-07 12:39:04', NULL, 0),
(24, 'B19513644', 'cuisine', 'Donnell''s place', 'donnells-place', '', 10, 0, NULL, NULL, 'victorialukoh@yahoo.com', '80 salvation road,opebi.', 744, 25, NULL, NULL, '', 0, 0, 0, NULL, NULL, NULL, 0, 0, '', NULL, NULL, '', NULL, NULL, 0, 1, 0, '2018-05-07 12:39:04', '2018-05-07 12:39:04', NULL, 0),
(25, 'B20760515', 'cuisine', 'Chorppyz', 'chorppyz', '', 11, 0, NULL, NULL, 'zdard@yahoo.com', ' 17 Catholic mission street Lagos Island.', 751, 25, NULL, 'LOGOB20760515.png', '', 0, 0, 0, NULL, NULL, NULL, 0, 0, '', NULL, NULL, '', NULL, NULL, 0, 1, 0, '2018-05-07 12:39:04', '2018-05-07 12:39:04', NULL, 0),
(26, 'B22922646', 'cuisine', 'Mr GoodFood', 'mr-goodfood', '', 12, 0, NULL, NULL, 'Mrgoodfood@yahoo.com', '128A,Association Way,Dolphin estate.Ikoyi', 488, 25, NULL, 'LOGOB22922646.jpeg', '', 0, 0, 0, NULL, NULL, NULL, 0, 0, '', NULL, NULL, '', NULL, NULL, 0, 1, 0, '2018-05-07 12:39:04', '2018-05-07 12:39:04', NULL, 0),
(27, 'B26633909', 'cuisine', 'Smokey Bones', 'smokey-bones', '', 13, 0, NULL, NULL, 'brownedward@yahoo.com', '8 Fabac Close, Off Ligali Ayorine Street, Behind Mobile House, Victoria Island', 493, 25, NULL, 'LOGOB26633909.png', '', 0, 0, 0, NULL, NULL, NULL, 0, 0, '', NULL, NULL, '', NULL, NULL, 0, 1, 0, '2018-05-07 12:39:04', '2018-05-07 12:39:04', NULL, 0),
(28, 'B27496939', 'cuisine', 'p.vince travels and \r\n\r\ntour', 'p.vince-travels-and-tour', '', 14, 0, NULL, NULL, 'follitsav@gmail.com', '27ogunfritimi itire surulere lagos', 500, 25, NULL, NULL, '', 0, 0, 0, NULL, NULL, NULL, 0, 0, '', NULL, NULL, '', NULL, NULL, 0, 1, 0, '2018-05-07 12:39:04', '2018-05-07 12:39:04', NULL, 0),
(29, 'B28532936', 'cuisine', 'Sailors Lounge', 'sailors-lounge', '', 15, 0, NULL, NULL, 'victoria.lokteva@sailorsloungelekki.com', '(STRICTLY FOR CORPORATE PARTIES AND TABLE RESERVATIONS) Plot \r\n\r\n1 Block 12, Admiralty Road ', 489, 25, NULL, 'LOGOB28532936.png', '', 0, 0, 0, NULL, NULL, NULL, 0, 0, '', NULL, NULL, '', NULL, NULL, 0, 1, 0, '2018-05-07 12:39:04', '2018-05-07 12:39:04', NULL, 0),
(30, 'B29433864', 'cuisine', 'Better \r\n\r\nOptions', 'better-options', '', 16, 0, NULL, NULL, 'olukemiwilliams@yahoo.co.uk', ' (PLEASE BE AWARE THAT ALL ORDER AFTER 11AM WOULD BE TREATED AS A PRE \r\n\r\nORDER FOR NEXT DAY DELIVERY) 7 Ilu Drive, Ikoyi', 747, 25, NULL, 'LOGOB29433864.jpeg', '', 0, 0, 0, NULL, NULL, NULL, 0, 0, '', NULL, NULL, '', NULL, NULL, 0, 1, 0, '2018-05-07 12:39:04', '2018-05-07 12:39:04', NULL, 0),
(31, 'B30757992', 'cuisine', 'Mico''s House Of \r\n\r\nChicken & Waffles', 'micos-house-of-chicken-and-waffles', '', 17, 0, NULL, NULL, 'queendebi30@gmail.com', 'Shop 1, Plot 69, Samit Mall, Admiralty Way Lekki Phase 1', 489, 25, NULL, 'LOGOB30757992.jpeg', '', 0, 0, 0, NULL, NULL, NULL, 0, 0, '', NULL, NULL, '', NULL, NULL, 0, 1, 0, '2018-05-07 12:39:04', '2018-05-07 12:39:04', NULL, 0),
(32, 'B31859723', 'cuisine', 'TERRA \r\n\r\nKULTURE', 'terra-kulture', '', 18, 0, NULL, NULL, 'restaurant@terrakulture.com', 'Plot 1376, Tiamiyu Savage, Off Ahmadu Bello Way, Victoria Island', 493, 25, NULL, 'LOGOB31859723.jpeg', '', 0, 0, 0, NULL, NULL, NULL, 0, 0, '', NULL, NULL, '', NULL, NULL, 0, 1, 0, '2018-05-07 12:39:04', '2018-05-07 12:39:04', NULL, 0),
(33, 'B31972872', 'cuisine', 'Bibi Catering \r\n\r\nServices', 'bibi-catering-services', '', 19, 0, NULL, NULL, 'abi_brandy@yahoo.com', '32, Association Crescent, Abimbola-Awolyi Estate Oko-Oba ', 738, 25, NULL, NULL, '', 0, 0, 0, NULL, NULL, NULL, 0, 0, '', NULL, NULL, '', NULL, NULL, 0, 1, 0, '2018-05-07 12:39:04', '2018-05-07 12:39:04', NULL, 0),
(34, 'B32421536', 'cuisine', 'BLD', 'bld', '', 20, 0, NULL, NULL, 'bamideleade77@yahoo.com', '15A admiralty way,lekki phase one,lagos.', 489, 25, NULL, 'LOGOB32421536.png', '', 0, 0, 0, NULL, NULL, NULL, 0, 0, '', NULL, NULL, '', NULL, NULL, 0, 1, 0, '2018-05-07 12:39:04', '2018-05-07 12:39:04', NULL, 0),
(35, 'B32462705', 'cuisine', 'DOTIMI (Mobile Pot of \r\n\r\nSoups)', 'dotimi--mobile-pot-of-soups-', '', 21, 0, NULL, NULL, 'tokonkwor@yahoo.com', '40 B Ogudu Ojota Road, Ogudu GRA', 497, 25, NULL, 'LOGOB32462705.png', '', 0, 0, 0, NULL, NULL, NULL, 0, 0, '', NULL, NULL, '', NULL, NULL, 0, 1, 0, '2018-05-07 12:39:04', '2018-05-07 12:39:04', NULL, 0),
(36, 'B32731810', 'cuisine', 'Rhapsody''s', 'rhapsodys', '', 22, 0, NULL, NULL, 'vi@emg.ng', '(STRICTLY FOR CORPORATE PARTIES AND TABLE RESERVATIONS)\r\n19A Agoro Odiyan, Victoria Island\r\n\r\n\r\n', 493, 25, NULL, 'LOGOB32731810.png', '', 0, 0, 0, NULL, NULL, NULL, 0, 0, '', NULL, NULL, '', NULL, NULL, 0, 1, 0, '2018-05-07 12:39:04', '2018-05-07 12:39:04', NULL, 0),
(37, 'B32742947', 'cuisine', 'Ice Cream \r\n\r\nFactory', 'ice-cream-factory', '', 23, 0, NULL, NULL, 'f.ogunleye@icf-lagos.com', 'Plot 1613B, Omega Bank Avenue, Victoria Island, Eti Osa, Lagos, \r\n\r\nNigeria.', 493, 25, NULL, 'LOGOB32742947.jpeg', '', 0, 0, 0, NULL, NULL, NULL, 0, 0, '', NULL, NULL, '', NULL, NULL, 0, 1, 0, '2018-05-07 12:39:04', '2018-05-07 12:39:04', NULL, 0),
(38, 'B33608621', 'cuisine', 'Kudeta Lounge', 'kudeta-lounge', '', 24, 0, NULL, NULL, 'ahamadjalal@yahoo.fr', '14, Idowu Martins Street, Victoria Island', 493, 25, NULL, NULL, '', 0, 0, 0, NULL, NULL, NULL, 0, 0, '', NULL, NULL, '', NULL, NULL, 0, 1, 0, '2018-05-07 12:39:04', '2018-05-07 12:39:05', NULL, 0),
(39, 'B35484932', 'cuisine', 'CookieJar', 'cookiejar', '', 25, 0, NULL, NULL, 'operations@iamcookiejar.com', '1004 Estates, Block D5, Suite 705, Victoria Island, Lagos', 493, 25, NULL, NULL, '', 0, 0, 0, NULL, NULL, NULL, 0, 0, '', NULL, NULL, '', NULL, NULL, 0, 1, 0, '2018-05-07 12:39:05', '2018-05-07 12:39:05', NULL, 0),
(40, 'B35810816', 'cuisine', 'Coral Blue Seafood Restaurant', 'coral-blue-seafood-restaurant', '', 26, 0, NULL, NULL, 'coralbluevi@sundryfood.com', '1 Adeyemo Alakija Street By Sanusi Fafunwa Street, Victoria \r\n\r\nIsland', 493, 25, NULL, 'LOGOB35810816.jpeg', '', 0, 0, 0, NULL, NULL, NULL, 0, 0, '', NULL, NULL, '', NULL, NULL, 0, 1, 0, '2018-05-07 12:39:05', '2018-05-07 12:39:05', NULL, 0),
(41, 'B36763644', 'cuisine', 'KILIMANJARO', 'kilimanjaro', '', 27, 0, NULL, NULL, 'joseph@sundryfood.com', '84 Ozumba Mbadiwe Street, Victoria Island', 493, 25, NULL, 'LOGOB36763644.png', '', 0, 0, 0, NULL, NULL, NULL, 0, 0, '', NULL, NULL, '', NULL, NULL, 0, 1, 0, '2018-05-07 12:39:05', '2018-05-07 12:39:05', NULL, 0),
(42, 'B37299838', 'cuisine', 'Bopsxpress', 'bopsxpress', '', 28, 0, NULL, NULL, 'damzel4u@hotmail.com', 'shop 7/8 Association Drive Dolphin Estate, Ikoyi Lagos', 488, 25, NULL, 'LOGOB37299838.jpeg', '', 0, 0, 0, NULL, NULL, NULL, 0, 0, '', NULL, NULL, '', NULL, NULL, 0, 1, 0, '2018-05-07 12:39:05', '2018-05-07 12:39:05', NULL, 0),
(43, 'B38190949', 'cuisine', 'Mama Cass Restaurants', 'mama-cass-restaurants', '', 29, 0, NULL, NULL, 'temitayo@mamacassng.com', '4a, Oyeleke Street, Off Kudirat Abiola Way, Alausa Ikeja', 740, 25, NULL, 'LOGOB38190949.jpeg', '', 0, 0, 0, NULL, NULL, NULL, 0, 0, '', NULL, NULL, '', NULL, NULL, 0, 1, 0, '2018-05-07 12:39:05', '2018-05-07 12:39:05', NULL, 0),
(44, 'B38884526', 'cuisine', 'Magrellos', 'magrellos', '', 30, 0, NULL, NULL, 'o.fawehinmi@magrellosfoods.com', '169, Ogudu Road, Ogudu', 748, 25, NULL, 'LOGOB38884526.png', '', 0, 0, 0, NULL, NULL, NULL, 0, 0, '', NULL, NULL, '', NULL, NULL, 0, 1, 0, '2018-05-07 12:39:05', '2018-05-07 12:39:05', NULL, 0),
(45, 'B41371706', 'cuisine', 'Cafe Licious ', 'cafe-licious', '', 31, 0, NULL, NULL, 'vlukoh@gmail.com', '60 Allen avenue,Ikeja,Lagos.', 744, 25, NULL, 'LOGOB41371706.png', '', 0, 0, 0, NULL, NULL, NULL, 0, 0, '', NULL, NULL, '', NULL, NULL, 0, 1, 0, '2018-05-07 12:39:05', '2018-05-07 12:39:05', NULL, 0),
(46, 'B41472901', 'cuisine', 'CAFE JADE', 'cafe-jade', '', 32, 0, NULL, NULL, 'iyearome@gmail.com', '1139 Bishop Oluwole Street,Victoria Island, Lagos.', 493, 25, NULL, 'LOGOB41472901.jpeg', '', 0, 0, 0, NULL, NULL, NULL, 0, 0, '', NULL, NULL, '', NULL, NULL, 0, 1, 0, '2018-05-07 12:39:05', '2018-05-07 12:39:05', NULL, 0),
(47, 'B42942776', 'cuisine', 'INSPIRO GALERIA', 'inspiro-galeria', '', 33, 0, NULL, NULL, 'oduyemi1@hotmail.com', '1, JOSEPH NAHAM CLOSE, OFF KARIM IKOTUN STREET VICTORIA ISLAND  ', 493, 25, NULL, 'LOGOB42942776.jpeg', '', 0, 0, 0, NULL, NULL, NULL, 0, 0, '', NULL, NULL, '', NULL, NULL, 0, 1, 0, '2018-05-07 12:39:05', '2018-05-07 12:39:05', NULL, 0),
(48, 'B45247975', 'cuisine', 'FoodDonDon', 'fooddondon', '', 34, 0, NULL, NULL, 'patrickideho@fooddondon.com', 'Blak Lounge, Elegushi Private Beach, Elegushi beach Road, Ikate, Lekki, \r\n\r\nLagos', 489, 25, NULL, NULL, '', 0, 0, 0, NULL, NULL, NULL, 0, 0, '', NULL, NULL, '', NULL, NULL, 0, 1, 0, '2018-05-07 12:39:05', '2018-05-07 12:39:05', NULL, 0),
(49, 'B45254629', 'cuisine', 'GITS', 'gits', '', 35, 0, NULL, NULL, 'Kunle@kunleolujobi.com', 'Emerald Shops, Opposite Unilag Main Gate, Akoka, Lagos', 749, 25, NULL, 'LOGOB45254629.jpeg', '', 0, 0, 0, NULL, NULL, NULL, 0, 0, '', NULL, NULL, '', NULL, NULL, 0, 1, 0, '2018-05-07 12:39:05', '2018-05-07 12:39:05', NULL, 0),
(50, 'B98610636', 'cuisine', 'Surie''s Place \r\n\r\n', 'suries-place2', '', 87, 0, NULL, NULL, 'ndifrekepeters1@gmail.com', '138 Ogunlana drive surulere lagos.', 500, 25, NULL, 'LOGOB98610636.png', '', 0, 0, 0, NULL, NULL, NULL, 0, 0, '', NULL, NULL, '', NULL, NULL, 0, 1, 0, '2018-05-07 12:39:05', '2018-05-09 20:34:17', NULL, 0),
(51, 'B45503856', 'cuisine', 'MARCO POLO \r\n\r\nORIENTAL CUISINE', 'marco-polo-oriental-cuisine', '', 37, 0, NULL, NULL, 'yemisi@marcopolo.com.ng', '10, Admiralty Way, Lekki Phase 1, Lagos', 489, 25, NULL, 'LOGOB45503856.jpeg', '', 0, 0, 0, NULL, NULL, NULL, 0, 0, '', NULL, NULL, '', NULL, NULL, 0, 1, 0, '2018-05-07 12:39:05', '2018-05-07 12:39:05', NULL, 0),
(52, 'B46627824', 'cuisine', 'Dreamtreats', 'dreamtreats', '', 38, 0, NULL, NULL, 'dreamtreats@gmail.com', 'Suite C,No 99,Awolowo Road,Ikoyi', 493, 25, NULL, 'LOGOB46627824.png', '', 0, 0, 0, NULL, NULL, NULL, 0, 0, '', NULL, NULL, '', NULL, NULL, 0, 1, 0, '2018-05-07 12:39:05', '2018-05-07 12:39:05', NULL, 0),
(53, 'B48321768', 'cuisine', 'Curry''s Seriously', 'currys-seriously', '', 39, 0, NULL, NULL, 'hwilly27@gmail.com', '23, Isaac-John Street, GRA-Ikeja.', 491, 25, NULL, NULL, '', 0, 0, 0, NULL, NULL, NULL, 0, 0, '', NULL, NULL, '', NULL, NULL, 0, 1, 0, '2018-05-07 12:39:05', '2018-05-07 12:39:05', NULL, 0),
(54, 'B48780540', 'cuisine', 'Oysters Restaurant', 'oysters-restaurant', '', 40, 0, NULL, NULL, 'eziopara@yahoo.com', '30A Fola Osibo Street, Lekki 1', 491, 25, NULL, 'LOGOB48780540.png', '', 0, 0, 0, NULL, NULL, NULL, 0, 0, '', NULL, NULL, '', NULL, NULL, 0, 1, 0, '2018-05-07 12:39:05', '2018-05-07 12:39:05', NULL, 0),
(55, 'B49723654', 'cuisine', 'Sakura \r\n\r\nRestaurant', 'sakura-restaurant', '', 41, 0, NULL, NULL, 'sakurarestaurant44@gmail.com', '2A Saka Jojo, Off Idejo Street', 751, 25, NULL, 'LOGOB49723654.jpeg', '', 0, 0, 0, NULL, NULL, NULL, 0, 0, '', NULL, NULL, '', NULL, NULL, 0, 1, 0, '2018-05-07 12:39:05', '2018-05-07 12:39:05', NULL, 0),
(56, 'B52180621', 'cuisine', 'Piccolo Mondo', 'piccolo-mondo', '', 42, 0, NULL, NULL, 'ifytexas@gmail.com', '19B, Idejo Street, Off Adeola Odeku Road, Victoria Island  ', 493, 25, NULL, 'LOGOB52180621.jpeg', '', 0, 0, 0, NULL, NULL, NULL, 0, 0, '', NULL, NULL, '', NULL, NULL, 0, 1, 0, '2018-05-07 12:39:05', '2018-05-07 12:39:05', NULL, 0),
(57, 'B53757573', 'cuisine', 'BUKKA HUT', 'bukka-hut', '', 43, 0, NULL, NULL, 'ebuka.ezewuzie@gmail.com', 'Block 69A Plot 8 Admiralty Way, Lekki, Lagos', 489, 25, NULL, 'LOGOB53757573.jpeg', '', 0, 0, 0, NULL, NULL, NULL, 0, 0, '', NULL, NULL, '', NULL, NULL, 0, 1, 0, '2018-05-07 12:39:05', '2018-05-07 12:39:05', NULL, 0),
(58, 'B54205905', 'cuisine', 'Rhapsody''s Ikeja', 'rhapsodys-ikeja', '', 44, 0, NULL, NULL, 'ikeja@emg.ng', '(STRICTLY FOR CORPORATE PARTIES AND TABLE RESERVATIONS)  176/194 Obafemi Awolowo Way, \r\n\r\nIkeja City Mall, ', 491, 25, NULL, 'LOGOB54205905.png', '', 0, 0, 0, NULL, NULL, NULL, 0, 0, '', NULL, NULL, '', NULL, NULL, 0, 1, 0, '2018-05-07 12:39:05', '2018-05-07 12:39:05', NULL, 0),
(59, 'B55213856', 'cuisine', 'coors restaurant \r\n\r\nand lounge', 'coors-restaurant-and-lounge', '', 45, 0, NULL, NULL, 'graceagholor@yahoo.com', '2 abibu adetoro street,off ajose adegun street,victoria \r\n\r\nisland,lagos.', 493, 25, NULL, NULL, '', 0, 0, 0, NULL, NULL, NULL, 0, 0, '', NULL, NULL, '', NULL, NULL, 0, 1, 0, '2018-05-07 12:39:05', '2018-05-07 12:39:05', NULL, 0),
(60, 'B56245878', 'cuisine', 'Eba Land', 'eba-land', '', 46, 0, NULL, NULL, 'ujwachuku@hotmail.com', '23 Isaac John Street, GRA', 491, 25, NULL, NULL, '', 0, 0, 0, NULL, NULL, NULL, 0, 0, '', NULL, NULL, '', NULL, NULL, 0, 1, 0, '2018-05-07 12:39:05', '2018-05-07 12:39:05', NULL, 0),
(61, 'B56447771', 'cuisine', 'LAREDO', 'laredo', '', 47, 0, NULL, NULL, 'laredochops@gmail.com', 'Suite 10, Sangrouse Market, Simpson Street, Lagos.', 747, 25, NULL, 'LOGOB56447771.png', '', 0, 0, 0, NULL, NULL, NULL, 0, 0, '', NULL, NULL, '', NULL, NULL, 0, 1, 0, '2018-05-07 12:39:05', '2018-05-07 12:39:05', NULL, 0),
(62, 'B56776822', 'cuisine', 'adega express', 'adega-express', '', 48, 0, NULL, NULL, 'ibkshobo888@yahoo.com', '31 Fola Osibo Road,', 489, 25, NULL, 'LOGOB56776822.jpeg', '', 0, 0, 0, NULL, NULL, NULL, 0, 0, '', NULL, NULL, '', NULL, NULL, 0, 1, 0, '2018-05-07 12:39:05', '2018-05-07 12:39:05', NULL, 0),
(63, 'B56984643', 'cuisine', 'Chinny''S Resturant', 'chinny-s-resturant', '', 49, 0, NULL, NULL, 'chezzyeze2013@yahoo.com', '21, Bode Thomos street. Surulere', 500, 25, NULL, NULL, '', 0, 0, 0, NULL, NULL, NULL, 0, 0, '', NULL, NULL, '', NULL, NULL, 0, 1, 0, '2018-05-07 12:39:05', '2018-05-07 12:39:05', NULL, 0),
(64, 'B57151776', 'cuisine', 'Oysters', 'oysters', '', 50, 0, NULL, NULL, 'oaadigun@outlook.com', '30A FOLA OSIBO STREET,LEKKI PHASE 1,LAGOS ', 489, 25, NULL, NULL, '', 0, 0, 0, NULL, NULL, NULL, 0, 0, '', NULL, NULL, '', NULL, NULL, 0, 1, 0, '2018-05-07 12:39:05', '2018-05-07 12:39:05', NULL, 0),
(65, 'B59605575', 'cuisine', 'Peckish Delight', 'peckish-delight', '', 51, 0, NULL, NULL, 'peckishdelight@yahoo.com', '34 Admiralty Way (inside S-Car Wash)', 489, 25, NULL, 'LOGOB59605575.jpeg', '', 0, 0, 0, NULL, NULL, NULL, 0, 0, '', NULL, NULL, '', NULL, NULL, 0, 1, 0, '2018-05-07 12:39:05', '2018-05-07 12:39:05', NULL, 0),
(66, 'B60936977', 'cuisine', 'CARLITO''S GRILL', 'carlitos-grill', '', 52, 0, NULL, NULL, 'yeli@carlitosgrill.com', '26B,Oju Olobun Close Victoria Island', 493, 25, NULL, 'LOGOB60936977.jpeg', '', 0, 0, 0, NULL, NULL, NULL, 0, 0, '', NULL, NULL, '', NULL, NULL, 0, 1, 0, '2018-05-07 12:39:05', '2018-05-07 12:39:05', NULL, 0),
(67, 'B61566704', 'cuisine', 'Primi Piatti Italian \r\n\r\nCuisine And WaterFront ', 'primi-piatti-italian-cuisine-and-waterfront', '', 53, 0, NULL, NULL, 'olachobbies@gmail.com', '1C ADMIRALTY WAY LEKKI PHASE 1, Lagos', 489, 25, NULL, 'LOGOB61566704.png', '', 0, 0, 0, NULL, NULL, NULL, 0, 0, '', NULL, NULL, '', NULL, NULL, 0, 1, 0, '2018-05-07 12:39:05', '2018-05-07 12:39:05', NULL, 0),
(68, 'B61989725', 'cuisine', 'Xquisite', 'xquisite', '', 54, 0, NULL, NULL, 'info@xquisitecelebrations.com', '11A Fola Osibo street, off Road, 14, Admiralty way, Lekki Phase 1, Lagos', 489, 25, NULL, 'LOGOB61989725.jpeg', '', 0, 0, 0, NULL, NULL, NULL, 0, 0, '', NULL, NULL, '', NULL, NULL, 0, 1, 0, '2018-05-07 12:39:05', '2018-05-07 12:39:05', NULL, 0),
(69, 'B63165537', 'cuisine', 'wendy''s', 'wendys', '', 55, 0, NULL, NULL, 'victorialukoh@ebsafr.com', '3 Thomas street,Allen avenue.', 744, 25, NULL, NULL, '', 0, 0, 0, NULL, NULL, NULL, 0, 0, '', NULL, NULL, '', NULL, NULL, 0, 1, 0, '2018-05-07 12:39:05', '2018-05-07 12:39:05', NULL, 0),
(70, 'B65810815', 'cuisine', 'L''Afric \r\n\r\nRestaurant ', 'lafric-restaurant', '', 56, 0, NULL, NULL, 'osomoolayinka@yahoo.com', '1 Adeola Hopewell Street By Sanusi Fafunwa Street Victoria Island', 493, 25, NULL, 'LOGOB65810815.png', '', 0, 0, 0, NULL, NULL, NULL, 0, 0, '', NULL, NULL, '', NULL, NULL, 0, 1, 0, '2018-05-07 12:39:05', '2018-05-07 12:39:05', NULL, 0),
(71, 'B67643948', 'cuisine', 'OFADA HUT', 'ofada-hut', '', 57, 0, NULL, NULL, 'talk2lola25@yahoo.com', '202 Awolowo Road, Ikoyi, Lagos.', 493, 25, NULL, 'LOGOB67643948.jpeg', '', 0, 0, 0, NULL, NULL, NULL, 0, 0, '', NULL, NULL, '', NULL, NULL, 0, 1, 0, '2018-05-07 12:39:05', '2018-05-07 12:39:05', NULL, 0),
(72, 'B67725640', 'cuisine', 'Murphis Shawarma', 'murphis-shawarma', '', 58, 0, NULL, NULL, 'mavisdavidson2002@yahoo.com', '27 sanusi fafunwa street Victoria island lagos', 493, 25, NULL, 'LOGOB67725640.jpeg', '', 0, 0, 0, NULL, NULL, NULL, 0, 0, '', NULL, NULL, '', NULL, NULL, 0, 1, 0, '2018-05-07 12:39:05', '2018-05-07 12:39:05', NULL, 0),
(73, 'B68534743', 'cuisine', 'Jonahs Food', 'jonahs-food', '', 59, 0, NULL, NULL, 'orders@jonahsfood.com', '28 Ahmadu Bello way,victoria island.lagos', 493, 25, NULL, 'LOGOB68534743.jpeg', '', 0, 0, 0, NULL, NULL, NULL, 0, 0, '', NULL, NULL, '', NULL, NULL, 0, 1, 0, '2018-05-07 12:39:05', '2018-05-07 12:39:05', NULL, 0),
(74, 'B68631828', 'cuisine', 'Ebuka Foods', 'ebuka-foods', '', 60, 0, NULL, NULL, 'ebuka@vationsys.com', '200 Admiralty way', 489, 25, NULL, 'LOGOB68631828.jpeg', '', 0, 0, 0, NULL, NULL, NULL, 0, 0, '', NULL, NULL, '', NULL, NULL, 0, 1, 0, '2018-05-07 12:39:05', '2018-05-07 12:39:05', NULL, 0),
(75, 'B69166820', 'cuisine', 'D Esthers Group', 'd-esthers-group', '', 61, 0, NULL, NULL, 'estherum77@yahoo.com', '17 Adegbola street off Cole street', 500, 25, NULL, NULL, '', 0, 0, 0, NULL, NULL, NULL, 0, 0, '', NULL, NULL, '', NULL, NULL, 0, 1, 0, '2018-05-07 12:39:05', '2018-05-07 12:39:05', NULL, 0),
(76, 'B70556693', 'cuisine', 'RADORC CATERING \r\n\r\n', 'radorc-catering', '', 62, 0, NULL, NULL, 'olusola.olulana@yahoo.com', 'Femi Okunu Esatae Lekki', 489, 25, NULL, 'LOGOB70556693.jpeg', '', 0, 0, 0, NULL, NULL, NULL, 0, 0, '', NULL, NULL, '', NULL, NULL, 0, 1, 0, '2018-05-07 12:39:05', '2018-05-07 12:39:05', NULL, 0),
(77, 'B71539514', 'cuisine', 'SURIES PLACE', 'suries-place', '', 63, 0, NULL, NULL, 'ndifrekepetets1@gmail.com', '138 Ogunlana drive, Surulere', 500, 25, NULL, NULL, '', 0, 0, 0, NULL, NULL, NULL, 0, 0, '', NULL, NULL, '', NULL, NULL, 0, 1, 0, '2018-05-07 12:39:05', '2018-05-07 12:39:05', NULL, 0),
(78, 'B72101680', 'cuisine', 'PATTAYA', 'pattaya', '', 64, 0, NULL, NULL, 'malik@pattayaoriental.com', '30 Adeola Hopewell street (Law School Road), Victoria Island - Lagos', 493, 25, NULL, 'LOGOB72101680.jpeg', '', 0, 0, 0, NULL, NULL, NULL, 0, 0, '', NULL, NULL, '', NULL, NULL, 0, 1, 0, '2018-05-07 12:39:05', '2018-05-07 12:39:05', NULL, 0),
(79, 'B73902707', 'cuisine', 'YIN YANG', 'yin-yang', '', 65, 0, NULL, NULL, 'f.ogunleye@icf-lagos.com', '5, Admiralty Way, Lekki Phase 1,', 500, 25, NULL, 'LOGOB73902707.jpeg', '', 0, 0, 0, NULL, NULL, NULL, 0, 0, '', NULL, NULL, '', NULL, NULL, 0, 1, 0, '2018-05-07 12:39:05', '2018-05-07 12:39:05', NULL, 0),
(80, 'B98370769', 'cuisine', 'Rutej farms', 'rutej-farms', '', 86, 0, NULL, NULL, 'ememkarieren2@yahoo.com', 'Business Office - Suite WW2, 2nd Floor, East Pavillion,Tarawa Balewa Square Complex \r\n\r\nOnikan - Lagos\r\nFarm Location -    Off Badore Road, Ajah \r\n                               \r\n\r\nLekki Ã‰pe Express way.', 482, 25, NULL, 'LOGOB98370769.png', '', 0, 0, 0, NULL, NULL, NULL, 0, 0, '', NULL, NULL, '', NULL, NULL, 0, 1, 0, '2018-05-07 12:39:05', '2018-05-09 20:34:47', NULL, 0),
(81, 'B74487658', 'cuisine', 'Marco Polo ', 'marco-polo', '', 67, 0, NULL, NULL, 'd.shobola@marcopolo.com.ng', '9A, Karimu Kotun Street, Off Akin Adesola Street, Victoria, Island, Lagos  ', 493, 25, NULL, 'LOGOB74487658.jpeg', '', 0, 0, 0, NULL, NULL, NULL, 0, 0, '', NULL, NULL, '', NULL, NULL, 0, 1, 0, '2018-05-07 12:39:05', '2018-05-07 12:39:05', NULL, 0),
(82, 'B75865610', 'cuisine', 'Cake \r\n\r\nWorld', 'cake-world', '', 68, 0, NULL, NULL, 'raymond.umunnakwe@cakeworldng.com', '26B fola osibo street lekki phase one,lagos.', 489, 25, NULL, 'LOGOB75865610.jpeg', '', 0, 0, 0, NULL, NULL, NULL, 0, 0, '', NULL, NULL, '', NULL, NULL, 0, 1, 0, '2018-05-07 12:39:05', '2018-05-07 12:39:05', NULL, 0),
(83, 'B75911833', 'cuisine', 'Lemz & Chow', 'lemz-and-chow', '', 69, 0, NULL, NULL, 'lebuyah@gmail.com', 'Shop 9, LSDPC lock-up shop, Ijaiye Low Cost Housing Estate, Ogba, Lagos', 750, 25, NULL, 'LOGOB75911833.jpeg', '', 0, 0, 0, NULL, NULL, NULL, 0, 0, '', NULL, NULL, '', NULL, NULL, 0, 1, 0, '2018-05-07 12:39:05', '2018-05-07 12:39:05', NULL, 0),
(84, 'B76929744', 'cuisine', 'LABULE', 'labule', '', 70, 0, NULL, NULL, 'muritala@labule.com.ng', '42A Ogudu Road, Ogudu Rd', 748, 25, NULL, 'LOGOB76929744.jpeg', '', 0, 0, 0, NULL, NULL, NULL, 0, 0, '', NULL, NULL, '', NULL, NULL, 0, 1, 0, '2018-05-07 12:39:05', '2018-05-07 12:39:05', NULL, 0),
(85, 'B79485649', 'cuisine', 'Lasgidi \r\n\r\nPremium Buka', 'lasgidi-premium-buka', '', 71, 0, NULL, NULL, 'adeosunoluwagbemiga@gmail.com', 'Plot 1, Block 12, Admiralty Road, Lakki 1', 489, 25, NULL, 'LOGOB79485649.png', '', 0, 0, 0, NULL, NULL, NULL, 0, 0, '', NULL, NULL, '', NULL, NULL, 0, 1, 0, '2018-05-07 12:39:05', '2018-05-07 12:39:05', NULL, 0),
(86, 'B84304773', 'cuisine', 'Posh Cafe', 'posh-cafe', '', 72, 0, NULL, NULL, 'ayspins@gmail.com', '3rd Floor, Mega Plaza, 14, Idowu Martins Street, Victoria Island', 493, 25, NULL, 'LOGOB84304773.jpeg', '', 0, 0, 0, NULL, NULL, NULL, 0, 0, '', NULL, NULL, '', NULL, NULL, 0, 1, 0, '2018-05-07 12:39:05', '2018-05-07 12:39:05', NULL, 0),
(87, 'B85629707', 'cuisine', 'Delta Pot', 'delta-pot', '', 73, 0, NULL, NULL, 'meyiwa77@yahoo.com', 'Block 74,Plot 18b, Emmanuel Abimbola Cole Street, Lekki Phase 1', 489, 25, NULL, 'LOGOB85629707.jpeg', '', 0, 0, 0, NULL, NULL, NULL, 0, 0, '', NULL, NULL, '', NULL, NULL, 0, 1, 0, '2018-05-07 12:39:05', '2018-05-07 12:39:05', NULL, 0),
(88, 'B85658949', 'cuisine', 'Kobis Restaurant', 'kobis-restaurant', '', 74, 0, NULL, NULL, 'harrisonwilliams@globalplusonline.com', '23 Isaac-John street, GRA-Ikeja,\r\nApapa Mall, Park Lane, \r\n\r\nApapa,\r\n18/20 Kudirat-Abiola way, Oregun', 491, 25, NULL, NULL, '', 0, 0, 0, NULL, NULL, NULL, 0, 0, '', NULL, NULL, '', NULL, NULL, 0, 1, 0, '2018-05-07 12:39:05', '2018-05-07 12:39:05', NULL, 0),
(89, 'B86558555', 'cuisine', 'KFC', 'kfc', '', 75, 0, NULL, NULL, 'victoria@ebsafr.com', ' \r\n\r\n3 City mall,Alausa.Ikeja', 740, 25, NULL, NULL, '', 0, 0, 0, NULL, NULL, NULL, 0, 0, '', NULL, NULL, '', NULL, NULL, 0, 1, 0, '2018-05-07 12:39:05', '2018-05-07 12:39:05', NULL, 0),
(90, 'B86777726', 'cuisine', 'dammy''s place', 'dammys-place', '', 76, 0, NULL, NULL, 'damskins@yahoo.com', '1, dam street, victoria island', 493, 25, NULL, NULL, '', 0, 0, 0, NULL, NULL, NULL, 0, 0, '', NULL, NULL, '', NULL, NULL, 0, 1, 0, '2018-05-07 12:39:05', '2018-05-07 12:39:05', NULL, 0),
(91, 'B90420897', 'cuisine', 'La Marmite', 'la-marmite', '', 77, 0, NULL, NULL, 'lamarmiteng@gmail.com', '19,Ogunlana Drive.surulere', 500, 25, NULL, 'LOGOB90420897.png', '', 0, 0, 0, NULL, NULL, NULL, 0, 0, '', NULL, NULL, '', NULL, NULL, 0, 1, 0, '2018-05-07 12:39:05', '2018-05-07 12:39:05', NULL, 0),
(92, 'B91454790', 'cuisine', 'Roadster Burgers n \r\n\r\nGrills', 'roadster-burgers-n-grills', '', 78, 0, NULL, NULL, 'maguzie@gmail.com', 'Plot 4 Block A2 Wole Olateju Crescent off Admiralty Way', 489, 25, NULL, 'LOGOB91454790.jpeg', '', 0, 0, 0, NULL, NULL, NULL, 0, 0, '', NULL, NULL, '', NULL, NULL, 0, 1, 0, '2018-05-07 12:39:05', '2018-05-07 12:39:05', NULL, 0),
(93, 'B92594626', 'cuisine', 'Lagoon \r\n\r\nRestaurant', 'lagoon-restaurant', '', 79, 0, NULL, NULL, 'lagoonrestaurantlagos@gmail.com', '1C Ozumba Mbadiwe Street, Victoria Island', 493, 25, NULL, 'LOGOB92594626.jpeg', '', 0, 0, 0, NULL, NULL, NULL, 0, 0, '', NULL, NULL, '', NULL, NULL, 0, 1, 0, '2018-05-07 12:39:05', '2018-05-07 12:39:05', NULL, 0),
(94, 'B92855594', 'cuisine', 'Testing Biz', 'testing-biz', '', 80, 0, NULL, NULL, 'emi0422@yahoo.com', '20 Fola Oshibo, Lekki Phase 1', 489, 25, NULL, NULL, '', 0, 0, 0, NULL, NULL, NULL, 0, 0, '', NULL, NULL, '', NULL, NULL, 0, 1, 0, '2018-05-07 12:39:05', '2018-05-07 12:39:05', NULL, 0),
(95, 'B96674886', 'cuisine', 'barcelos \r\n\r\nrestaurant victoria island', 'barcelos-restaurant-victoria-island', '', 81, 0, NULL, NULL, 'barcelossilverbird@gmail.com', '2nd floor,Silverbird Galleria, Ahmadu Bello Way Victoria Island, Lagos  ', 493, 25, NULL, 'LOGOB96674886.jpeg', '', 0, 0, 0, NULL, NULL, NULL, 0, 0, '', NULL, NULL, '', NULL, NULL, 0, 1, 0, '2018-05-07 12:39:05', '2018-05-07 12:39:05', NULL, 0),
(96, 'B96896513', 'cuisine', 'Matty''S Resturant', 'matty-s-resturant', '', 82, 0, NULL, NULL, 'uandmatty@gmail.com', '50 Admiralty Way', 489, 25, NULL, NULL, '', 0, 0, 0, NULL, NULL, NULL, 0, 0, '', NULL, NULL, '', NULL, NULL, 0, 1, 0, '2018-05-07 12:39:05', '2018-05-07 12:39:05', NULL, 0),
(97, 'B97819651', 'cuisine', 'PIZZA \r\n\r\nHOUSE', 'pizza-house', '', 83, 0, NULL, NULL, 'victoriatokunbogiwa@yahoo.com', 'Ogudu GRA', 497, 25, NULL, 'LOGOB97819651.jpeg', '', 0, 0, 0, NULL, NULL, NULL, 0, 0, '', NULL, NULL, '', NULL, NULL, 0, 1, 0, '2018-05-07 12:39:05', '2018-05-07 12:39:05', NULL, 0),
(98, 'B98316835', 'cuisine', 'HomeGate Resort ', 'homegate-resort', '', 85, 0, NULL, NULL, 'austineohims@gmail.com', 'Plot 6 Babafemi osoba crescent off admiralty road, lekki phase 1', 489, 25, NULL, 'LOGOB98316835.png', '', 0, 0, 0, NULL, NULL, NULL, 0, 0, '', NULL, NULL, '', NULL, NULL, 0, 1, 0, '2018-05-07 12:39:05', '2018-05-09 20:35:14', NULL, 0);

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
  `moduleID` int(11) DEFAULT NULL,
  `jollofsitetypeid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `role_assignments`
--

INSERT INTO `role_assignments` (`roleAssignmentID`, `roleID`, `moduleID`, `jollofsitetypeid`) VALUES
(1, 1, 1, 1),
(2, 1, 2, 1),
(3, 1, 3, 1),
(4, 1, 4, 1),
(5, 1, 5, 1),
(6, 1, 6, 1),
(7, 1, 7, 1),
(8, 1, 8, 1),
(9, 1, 9, 1),
(10, 1, 10, 1),
(11, 1, 11, 1),
(12, 1, 12, 1),
(13, 1, 13, 1),
(14, 1, 14, 1),
(15, 1, 15, 1),
(16, 1, 16, 1),
(17, 1, 17, 1),
(18, 1, 18, 1),
(19, 1, 19, 1),
(20, 1, 20, 1),
(21, 1, 21, 2),
(22, 1, 22, 2),
(23, 1, 23, 2),
(24, 1, 24, 2),
(25, 1, 25, 2),
(26, 1, 26, 2),
(27, 1, 27, 2),
(28, 1, 28, 2),
(29, 1, 29, 2),
(30, 1, 30, 2),
(31, 1, 31, 2),
(32, 1, 32, 2),
(33, 1, 33, 2),
(34, 1, 34, 2),
(35, 1, 35, 2),
(36, 1, 36, 2),
(37, 1, 37, 2),
(38, 1, 38, 2),
(39, 1, 39, 2),
(40, 1, 40, 2),
(41, 1, 41, 2),
(42, 1, 42, 1),
(43, 1, 43, 1),
(44, 1, 44, 1),
(45, 1, 45, 1),
(46, 2, 46, 3),
(47, 2, 47, 3),
(48, 2, 48, 3),
(49, 2, 49, 3),
(50, 2, 50, 3),
(51, 2, 51, 3),
(52, 2, 52, 3),
(53, 2, 53, 3),
(54, 2, 54, 3),
(55, 2, 55, 3),
(56, 2, 56, 3),
(57, 2, 57, 3),
(58, 2, 58, 3),
(59, 1, 59, 1),
(60, 1, 60, 1),
(61, 2, 61, 3),
(62, 2, 62, 3),
(63, 2, 63, 3),
(64, 2, 64, 3),
(65, 2, 65, 3),
(66, 2, 66, 3),
(67, 2, 67, 3),
(68, 2, 68, 3),
(69, 2, 69, 3),
(70, 2, 70, 3),
(71, 2, 71, 3),
(72, 2, 72, 3),
(73, 2, 73, 3),
(74, 2, 74, 3),
(75, 1, 75, 1),
(76, 2, 76, 3),
(77, 2, 77, 3),
(78, 2, 78, 3),
(79, 2, 79, 3),
(80, 2, 80, 3),
(81, 2, 81, 3),
(82, 2, 82, 3),
(83, 2, 83, 3),
(84, 2, 84, 3),
(85, 2, 85, 3),
(86, 2, 86, 3),
(87, 2, 87, 3),
(88, 2, 88, 3),
(89, 2, 89, 3),
(90, 2, 90, 3),
(91, 2, 91, 3),
(92, 2, 92, 3),
(93, 2, 93, 3),
(94, 2, 94, 3),
(95, 2, 95, 3),
(96, 2, 96, 3),
(97, 2, 97, 3),
(98, 2, 98, 3),
(99, 2, 99, 3),
(100, 2, 100, 3);

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
  `vat` int(11) DEFAULT NULL,
  `homebannertimer` int(11) NOT NULL,
  `placeadtimer` int(11) NOT NULL,
  `facebookpage` varchar(200) NOT NULL,
  `twitterpage` varchar(200) NOT NULL,
  `insterpage` varchar(200) NOT NULL,
  `whatsapp` varchar(200) DEFAULT NULL,
  `socialpromoprice` int(11) NOT NULL DEFAULT '0',
  `emailpromoprice` int(11) NOT NULL DEFAULT '0',
  `freeuploads` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `b2bemail`, `b2bphone`, `b2bphone2`, `b2cemail`, `b2cphone`, `b2cphone2`, `vat`, `homebannertimer`, `placeadtimer`, `facebookpage`, `twitterpage`, `insterpage`, `whatsapp`, `socialpromoprice`, `emailpromoprice`, `freeuploads`) VALUES
(1, 'info@ebs.com', '0', '', '', '', '', 10, 5, 10, 'https://facebook.com', '', ' ', '2349099522529', 2000, 4000, 5);

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
(1, 1, 'Large', 'L', 40, 0, '2018-01-26 01:45:41', '2018-08-13 18:48:20', NULL, 0),
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
  `status` tinyint(4) DEFAULT '1',
  `createdat` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updatedat` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `deletedat` timestamp NULL DEFAULT NULL,
  `isdeleted` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `states`
--

INSERT INTO `states` (`id`, `statename`, `status`, `createdat`, `updatedat`, `deletedat`, `isdeleted`) VALUES
(0, 'General', 0, '2018-05-21 10:22:33', '2018-05-21 10:22:37', NULL, 0),
(1, 'Abia State', 1, '2017-10-06 09:49:50', '2018-08-05 15:17:19', '0000-00-00 00:00:00', 0),
(2, 'Adamawa State', 0, '2017-10-06 09:49:50', '2018-05-03 21:49:15', '0000-00-00 00:00:00', 0),
(3, 'Akwa Ibom State', 0, '2017-10-06 09:49:50', '2018-05-03 21:48:59', '0000-00-00 00:00:00', 0),
(4, 'Anambra State', 0, '2017-10-06 09:49:50', '2018-05-03 21:49:24', '0000-00-00 00:00:00', 0),
(5, 'Bauchi State', 0, '2017-10-06 09:49:50', '2018-05-03 21:49:20', '0000-00-00 00:00:00', 0),
(6, 'Bayelsa State', 0, '2017-10-06 09:49:50', '2018-05-03 21:49:40', '0000-00-00 00:00:00', 0),
(7, 'Benue State', 0, '2017-10-06 09:49:50', '2018-05-03 21:50:33', '0000-00-00 00:00:00', 0),
(8, 'Borno State', 0, '2017-10-06 09:49:50', '2018-05-03 21:50:16', '0000-00-00 00:00:00', 0),
(9, 'Cross River State', 0, '2017-10-06 09:49:50', '2018-05-03 21:50:43', '0000-00-00 00:00:00', 0),
(10, 'Delta State', 0, '2017-10-06 09:49:50', '2018-05-03 21:49:48', '0000-00-00 00:00:00', 0),
(11, 'Ebonyi State', 0, '2017-10-06 09:49:50', '2018-05-03 21:51:21', '0000-00-00 00:00:00', 0),
(12, 'Edo State', 0, '2017-10-06 09:49:50', '2018-05-03 21:50:54', '0000-00-00 00:00:00', 0),
(13, 'Ekiti State', 0, '2017-10-06 09:49:50', '2018-05-03 21:52:01', '0000-00-00 00:00:00', 0),
(14, 'Enugu State', 0, '2017-10-06 09:49:50', '2018-05-03 21:51:35', '0000-00-00 00:00:00', 0),
(15, 'FCT', 0, '2017-10-06 09:49:50', '2018-05-03 21:51:54', '0000-00-00 00:00:00', 0),
(16, 'Gombe State', 0, '2017-10-06 09:49:50', '2018-05-03 21:51:41', '0000-00-00 00:00:00', 0),
(17, 'Imo State', 0, '2017-10-06 09:49:50', '2018-05-03 21:51:28', '0000-00-00 00:00:00', 0),
(18, 'Jigawa State', 0, '2017-10-06 09:49:50', '2018-05-03 21:57:59', '0000-00-00 00:00:00', 0),
(19, 'Kaduna State', 0, '2017-10-06 09:49:50', '2018-05-03 21:58:13', '0000-00-00 00:00:00', 0),
(20, 'Kano State', 0, '2017-10-06 09:49:50', '2018-05-03 21:57:51', '0000-00-00 00:00:00', 0),
(21, 'Katsina State', 0, '2017-10-06 09:49:50', '2018-05-03 21:57:44', '0000-00-00 00:00:00', 0),
(22, 'Kebbi State', 0, '2017-10-06 09:49:50', '2018-05-03 21:59:30', '0000-00-00 00:00:00', 0),
(23, 'Kogi State', 0, '2017-10-06 09:49:50', '2018-05-03 21:59:18', '0000-00-00 00:00:00', 0),
(24, 'Kwara State', 0, '2017-10-06 09:49:50', '2018-05-03 21:59:04', '0000-00-00 00:00:00', 0),
(25, 'Lagos State', 1, '2017-10-06 09:49:50', '2018-05-03 21:59:11', '0000-00-00 00:00:00', 0),
(26, 'Nasarawa State', 0, '2017-10-06 09:49:50', '2018-05-03 22:00:52', '0000-00-00 00:00:00', 0),
(27, 'Niger State', 0, '2017-10-06 09:49:50', '2018-05-03 22:00:32', '0000-00-00 00:00:00', 0),
(28, 'Ogun State', 0, '2017-10-06 09:49:50', '2018-05-03 22:00:23', '0000-00-00 00:00:00', 0),
(29, 'Ondo State', 0, '2017-10-06 09:49:50', '2018-05-03 22:00:15', '0000-00-00 00:00:00', 0),
(30, 'Osun State', 0, '2017-10-06 09:49:50', '2018-05-03 21:59:56', '0000-00-00 00:00:00', 0),
(31, 'Oyo State', 0, '2017-10-06 09:49:50', '2018-05-03 22:02:41', '0000-00-00 00:00:00', 0),
(32, 'Plateau State', 0, '2017-10-06 09:49:50', '2018-05-03 22:02:25', '0000-00-00 00:00:00', 0),
(33, 'Rivers State', 0, '2017-10-06 09:49:50', '2018-05-03 22:02:10', '0000-00-00 00:00:00', 0),
(34, 'Sokoto State', 0, '2017-10-06 09:49:50', '2018-05-03 22:01:44', '0000-00-00 00:00:00', 0),
(35, 'Taraba State', 0, '2017-10-06 09:49:50', '2018-05-03 22:01:35', '0000-00-00 00:00:00', 0),
(36, 'Yobe State', 0, '2017-10-06 09:49:50', '2018-05-03 22:01:56', '0000-00-00 00:00:00', 0),
(37, 'Zamfara State', 0, '2017-10-06 09:49:50', '2018-05-03 22:01:49', '0000-00-00 00:00:00', 0);

-- --------------------------------------------------------

--
-- Table structure for table `state_cities`
--

CREATE TABLE `state_cities` (
  `id` int(11) NOT NULL,
  `cityname` varchar(100) NOT NULL,
  `stateid` int(11) NOT NULL,
  `status` tinyint(4) DEFAULT '1',
  `createdat` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updatedat` timestamp NULL DEFAULT NULL,
  `deletedat` timestamp NULL DEFAULT NULL,
  `isdeleted` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `state_cities`
--

INSERT INTO `state_cities` (`id`, `cityname`, `stateid`, `status`, `createdat`, `updatedat`, `deletedat`, `isdeleted`) VALUES
(0, 'General', 0, 1, '2018-05-21 10:23:13', NULL, NULL, 0),
(1, 'Aba South', 1, 0, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(2, 'Arochukwu', 1, 1, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(3, 'Bende', 1, 1, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(4, 'Ikwuano', 1, 1, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(5, 'Isiala Ngwa North', 1, 1, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(6, 'Isiala Ngwa South', 1, 1, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(7, 'Isuikwuato', 1, 1, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(8, 'Obi Ngwa', 1, 1, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(9, 'Ohafia', 1, 1, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(10, 'Osisioma', 1, 1, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(11, 'Ugwunagbo', 1, 1, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(12, 'Ukwa East', 1, 1, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(13, 'Ukwa West', 1, 1, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(14, 'Umuahia North', 1, 1, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(15, 'Umuahia South', 1, 1, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(16, 'Umu Nneochi', 1, 1, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(17, 'Fufure', 2, 1, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(18, 'Ganye', 2, 1, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(19, 'Gayuk', 2, 1, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(20, 'Gombi', 2, 1, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(21, 'Grie', 2, 1, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(22, 'Hong', 2, 1, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(23, 'Jada', 2, 1, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(24, 'Lamurde', 2, 1, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(25, 'Madagali', 2, 1, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(26, 'Maiha', 2, 1, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(27, 'Mayo Belwa', 2, 1, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(28, 'Michika', 2, 1, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(29, 'Mubi North', 2, 1, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(30, 'Mubi South', 2, 1, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(31, 'Numan', 2, 1, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(32, 'Shelleng', 2, 1, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(33, 'Song', 2, 1, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(34, 'Toungo', 2, 1, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(35, 'Yola North', 2, 1, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(36, 'Yola South', 2, 1, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(37, 'Eastern Obolo', 3, 1, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(38, 'Eket', 3, 1, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(39, 'Esit Eket', 3, 1, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(40, 'Essien Udim', 3, 1, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(41, 'Etim Ekpo', 3, 1, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(42, 'Etinan', 3, 1, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(43, 'Ibeno', 3, 1, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(44, 'Ibesikpo Asutan', 3, 1, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(45, 'Ibiono-Ibom', 3, 1, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(46, 'Ika', 3, 1, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(47, 'Ikono', 3, 1, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(48, 'Ikot Abasi', 3, 1, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(49, 'Ikot Ekpene', 3, 1, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(50, 'Ini', 3, 1, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(51, 'Itu', 3, 1, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(52, 'Mbo', 3, 1, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(53, 'Mkpat-Enin', 3, 1, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(54, 'Nsit-Atai', 3, 1, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(55, 'Nsit-Ibom', 3, 1, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(56, 'Nsit-Ubium', 3, 1, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(57, 'Obot Akara', 3, 1, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(58, 'Okobo', 3, 1, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(59, 'Onna', 3, 1, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(60, 'Oron', 3, 1, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(61, 'Oruk Anam', 3, 1, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(62, 'Udung-Uko', 3, 1, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(63, 'Ukanafun', 3, 1, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(64, 'Uruan', 3, 1, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(65, 'Urue-Offong/Oruko', 3, 1, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(66, 'Uyo', 3, 1, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(67, 'Anambra East', 4, 1, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(68, 'Anambra West', 4, 1, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(69, 'Anaocha', 4, 1, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(70, 'Awka North', 4, 1, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(71, 'Awka South', 4, 1, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(72, 'Ayamelum', 4, 1, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(73, 'Dunukofia', 4, 1, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(74, 'Ekwusigo', 4, 1, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(75, 'Idemili North', 4, 1, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(76, 'Idemili South', 4, 1, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(77, 'Ihiala', 4, 1, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(78, 'Njikoka', 4, 1, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(79, 'Nnewi North', 4, 1, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(80, 'Nnewi South', 4, 1, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(81, 'Ogbaru', 4, 1, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(82, 'Onitsha North', 4, 1, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(83, 'Onitsha South', 4, 1, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(84, 'Orumba North', 4, 1, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(85, 'Orumba South', 4, 1, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(86, 'Oyi', 4, 1, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(87, 'Bauchi', 5, 1, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(88, 'Bogoro', 5, 1, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(89, 'Damban', 5, 1, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(90, 'Darazo', 5, 1, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(91, 'Dass', 5, 1, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(92, 'Gamawa', 5, 1, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(93, 'Ganjuwa', 5, 1, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(94, 'Giade', 5, 1, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(95, 'Itas/Gadau', 5, 1, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(96, 'Jama''are', 5, 1, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(97, 'Katagum', 5, 1, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(98, 'Kirfi', 5, 1, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(99, 'Misau', 5, 1, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(100, 'Ningi', 5, 1, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(101, 'Shira', 5, 1, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(102, 'Tafawa Balewa', 5, 1, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(103, 'Toro', 5, 1, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(104, 'Warji', 5, 1, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(105, 'Zaki', 5, 1, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(106, 'Ekeremor', 6, 1, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(107, 'Kolokuma/Opokuma', 6, 1, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(108, 'Nembe', 6, 1, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(109, 'Ogbia', 6, 1, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(110, 'Sagbama', 6, 1, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(111, 'Southern Ijaw', 6, 1, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(112, 'Yenagoa', 6, 1, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(113, 'Apa', 7, 1, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(114, 'Ado', 7, 1, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(115, 'Buruku', 7, 1, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(116, 'Gboko', 7, 1, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(117, 'Guma', 7, 1, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(118, 'Gwer East', 7, 1, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(119, 'Gwer West', 7, 1, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(120, 'Katsina-Ala', 7, 1, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(121, 'Konshisha', 7, 1, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(122, 'Kwande', 7, 1, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(123, 'Logo', 7, 1, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(124, 'Makurdi', 7, 1, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(125, 'Obi', 7, 1, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(126, 'Ogbadibo', 7, 1, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(127, 'Ohimini', 7, 1, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(128, 'Oju', 7, 1, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(129, 'Okpokwu', 7, 1, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(130, 'Oturkpo', 7, 1, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(131, 'Tarka', 7, 1, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(132, 'Ukum', 7, 1, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(133, 'Ushongo', 7, 1, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(134, 'Vandeikya', 7, 1, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(135, 'Askira/Uba', 8, 1, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(136, 'Bama', 8, 1, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(137, 'Bayo', 8, 1, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(138, 'Biu', 8, 1, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(139, 'Chibok', 8, 1, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(140, 'Damboa', 8, 1, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(141, 'Dikwa', 8, 1, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(142, 'Gubio', 8, 1, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(143, 'Guzamala', 8, 1, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(144, 'Gwoza', 8, 1, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(145, 'Hawul', 8, 1, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(146, 'Jere', 8, 1, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(147, 'Kaga', 8, 1, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(148, 'Kala/Balge', 8, 1, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(149, 'Konduga', 8, 1, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(150, 'Kukawa', 8, 1, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(151, 'Kwaya Kusar', 8, 1, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(152, 'Mafa', 8, 1, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(153, 'Magumeri', 8, 1, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(154, 'Maiduguri', 8, 1, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(155, 'Marte', 8, 1, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(156, 'Mobbar', 8, 1, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(157, 'Monguno', 8, 1, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(158, 'Ngala', 8, 1, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(159, 'Nganzai', 8, 1, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(160, 'Shani', 8, 1, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(161, 'Akamkpa', 9, 1, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(162, 'Akpabuyo', 9, 1, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(163, 'Bakassi', 9, 1, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(164, 'Bekwarra', 9, 1, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(165, 'Biase', 9, 1, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(166, 'Boki', 9, 1, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(167, 'Calabar Municipal', 9, 1, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(168, 'Calabar South', 9, 1, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(169, 'Etung', 9, 1, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(170, 'Ikom', 9, 1, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(171, 'Obanliku', 9, 1, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(172, 'Obubra', 9, 1, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(173, 'Obudu', 9, 1, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(174, 'Odukpani', 9, 1, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(175, 'Ogoja', 9, 1, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(176, 'Yakuur', 9, 1, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(177, 'Yala', 9, 1, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(178, 'Aniocha South', 10, 1, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(179, 'Bomadi', 10, 1, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(180, 'Burutu', 10, 1, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(181, 'Ethiope East', 10, 1, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(182, 'Ethiope West', 10, 1, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(183, 'Ika North East', 10, 1, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(184, 'Ika South', 10, 1, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(185, 'Isoko North', 10, 1, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(186, 'Isoko South', 10, 1, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(187, 'Ndokwa East', 10, 1, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(188, 'Ndokwa West', 10, 1, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(189, 'Okpe', 10, 1, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(190, 'Oshimili North', 10, 1, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(191, 'Oshimili South', 10, 1, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(192, 'Patani', 10, 1, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(193, 'Sapele', 10, 1, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(194, 'Udu', 10, 1, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(195, 'Ughelli North', 10, 1, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(196, 'Ughelli South', 10, 1, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(197, 'Ukwuani', 10, 1, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(198, 'Uvwie', 10, 1, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(199, 'Warri North', 10, 1, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(200, 'Warri South', 10, 1, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(201, 'Warri South West', 10, 1, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(202, 'Afikpo North', 11, 1, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(203, 'Afikpo South', 11, 1, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(204, 'Ebonyi', 11, 1, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(205, 'Ezza North', 11, 1, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(206, 'Ezza South', 11, 1, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(207, 'Ikwo', 11, 1, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(208, 'Ishielu', 11, 1, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(209, 'Ivo', 11, 1, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(210, 'Izzi', 11, 1, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(211, 'Ohaozara', 11, 1, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(212, 'Ohaukwu', 11, 1, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(213, 'Onicha', 11, 1, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(214, 'Egor', 12, 1, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(215, 'Esan Central', 12, 1, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(216, 'Esan North-East', 12, 1, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(217, 'Esan South-East', 12, 1, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(218, 'Esan West', 12, 1, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(219, 'Etsako Central', 12, 1, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(220, 'Etsako East', 12, 1, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(221, 'Etsako West', 12, 1, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(222, 'Igueben', 12, 1, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(223, 'Ikpoba Okha', 12, 1, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(224, 'Orhionmwon', 12, 1, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(225, 'Oredo', 12, 1, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(226, 'Ovia North-East', 12, 1, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(227, 'Ovia South-West', 12, 1, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(228, 'Owan East', 12, 1, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(229, 'Owan West', 12, 1, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(230, 'Uhunmwonde', 12, 1, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(231, 'Efon', 13, 1, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(232, 'Ekiti East', 13, 1, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(233, 'Ekiti South-West', 13, 1, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(234, 'Ekiti West', 13, 1, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(235, 'Emure', 13, 1, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(236, 'Gbonyin', 13, 1, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(237, 'Ido Osi', 13, 1, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(238, 'Ijero', 13, 1, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(239, 'Ikere', 13, 1, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(240, 'Ikole', 13, 1, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(241, 'Ilejemeje', 13, 1, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(242, 'Irepodun/Ifelodun', 13, 1, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(243, 'Ise/Orun', 13, 1, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(244, 'Moba', 13, 1, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(245, 'Oye', 13, 1, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(246, 'Awgu', 14, 1, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(247, 'Enugu East', 14, 1, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(248, 'Enugu North', 14, 1, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(249, 'Enugu South', 14, 1, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(250, 'Ezeagu', 14, 1, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(251, 'Igbo Etiti', 14, 1, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(252, 'Igbo Eze North', 14, 1, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(253, 'Igbo Eze South', 14, 1, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(254, 'Isi Uzo', 14, 1, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(255, 'Nkanu East', 14, 1, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(256, 'Nkanu West', 14, 1, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(257, 'Nsukka', 14, 1, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(258, 'Oji River', 14, 1, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(259, 'Udenu', 14, 1, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(260, 'Udi', 14, 1, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(261, 'Uzo Uwani', 14, 1, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(262, 'Bwari', 15, 1, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(263, 'Gwagwalada', 15, 1, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(264, 'Kuje', 15, 1, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(265, 'Kwali', 15, 1, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(266, 'Municipal Area Council', 15, 1, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(267, 'Balanga', 16, 1, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(268, 'Billiri', 16, 1, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(269, 'Dukku', 16, 1, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(270, 'Funakaye', 16, 1, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(271, 'Gombe', 16, 1, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(272, 'Kaltungo', 16, 1, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(273, 'Kwami', 16, 1, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(274, 'Nafada', 16, 1, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(275, 'Shongom', 16, 1, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(276, 'Yamaltu/Deba', 16, 1, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(277, 'Ahiazu Mbaise', 17, 1, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(278, 'Ehime Mbano', 17, 1, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(279, 'Ezinihitte', 17, 1, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(280, 'Ideato North', 17, 1, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(281, 'Ideato South', 17, 1, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(282, 'Ihitte/Uboma', 17, 1, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(283, 'Ikeduru', 17, 1, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(284, 'Isiala Mbano', 17, 1, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(285, 'Isu', 17, 1, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(286, 'Mbaitoli', 17, 1, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(287, 'Ngor Okpala', 17, 1, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(288, 'Njaba', 17, 1, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(289, 'Nkwerre', 17, 1, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(290, 'Nwangele', 17, 1, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(291, 'Obowo', 17, 1, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(292, 'Oguta', 17, 1, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(293, 'Ohaji/Egbema', 17, 1, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(294, 'Okigwe', 17, 1, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(295, 'Orlu', 17, 1, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(296, 'Orsu', 17, 1, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(297, 'Oru East', 17, 1, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(298, 'Oru West', 17, 1, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(299, 'Owerri Municipal', 17, 1, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(300, 'Owerri North', 17, 1, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(301, 'Owerri West', 17, 1, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(302, 'Unuimo', 17, 1, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(303, 'Babura', 18, 1, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(304, 'Biriniwa', 18, 1, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(305, 'Birnin Kudu', 18, 1, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(306, 'Buji', 18, 1, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(307, 'Dutse', 18, 1, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(308, 'Gagarawa', 18, 1, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(309, 'Garki', 18, 1, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(310, 'Gumel', 18, 1, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(311, 'Guri', 18, 1, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(312, 'Gwaram', 18, 1, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(313, 'Gwiwa', 18, 1, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(314, 'Hadejia', 18, 1, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(315, 'Jahun', 18, 1, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(316, 'Kafin Hausa', 18, 1, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(317, 'Kazaure', 18, 1, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(318, 'Kiri Kasama', 18, 1, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(319, 'Kiyawa', 18, 1, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(320, 'Kaugama', 18, 1, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(321, 'Maigatari', 18, 1, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(322, 'Malam Madori', 18, 1, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(323, 'Miga', 18, 1, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(324, 'Ringim', 18, 1, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(325, 'Roni', 18, 1, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(326, 'Sule Tankarkar', 18, 1, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(327, 'Taura', 18, 1, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(328, 'Yankwashi', 18, 1, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(329, 'Chikun', 19, 1, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(330, 'Giwa', 19, 1, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(331, 'Igabi', 19, 1, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(332, 'Ikara', 19, 1, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(333, 'Jaba', 19, 1, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(334, 'Jema''a', 19, 1, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(335, 'Kachia', 19, 1, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(336, 'Kaduna North', 19, 1, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(337, 'Kaduna South', 19, 1, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(338, 'Kagarko', 19, 1, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(339, 'Kajuru', 19, 1, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(340, 'Kaura', 19, 1, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(341, 'Kauru', 19, 1, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(342, 'Kubau', 19, 1, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(343, 'Kudan', 19, 1, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(344, 'Lere', 19, 1, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(345, 'Makarfi', 19, 1, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(346, 'Sabon Gari', 19, 1, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(347, 'Sanga', 19, 1, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(348, 'Soba', 19, 1, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(349, 'Zangon Kataf', 19, 1, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(350, 'Zaria', 19, 1, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(351, 'Albasu', 20, 1, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(352, 'Bagwai', 20, 1, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(353, 'Bebeji', 20, 1, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(354, 'Bichi', 20, 1, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(355, 'Bunkure', 20, 1, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(356, 'Dala', 20, 1, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(357, 'Dambatta', 20, 1, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(358, 'Dawakin Kudu', 20, 1, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(359, 'Dawakin Tofa', 20, 1, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(360, 'Doguwa', 20, 1, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(361, 'Fagge', 20, 1, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(362, 'Gabasawa', 20, 1, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(363, 'Garko', 20, 1, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(364, 'Garun Mallam', 20, 1, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(365, 'Gaya', 20, 1, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(366, 'Gezawa', 20, 1, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(367, 'Gwale', 20, 1, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(368, 'Gwarzo', 20, 1, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(369, 'Kabo', 20, 1, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(370, 'Kano Municipal', 20, 1, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(371, 'Karaye', 20, 1, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(372, 'Kibiya', 20, 1, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(373, 'Kiru', 20, 1, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(374, 'Kumbotso', 20, 1, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(375, 'Kunchi', 20, 1, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(376, 'Kura', 20, 1, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(377, 'Madobi', 20, 1, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(378, 'Makoda', 20, 1, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(379, 'Minjibir', 20, 1, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(380, 'Nasarawa', 20, 1, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(381, 'Rano', 20, 1, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(382, 'Rimin Gado', 20, 1, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(383, 'Rogo', 20, 1, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(384, 'Shanono', 20, 1, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(385, 'Sumaila', 20, 1, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(386, 'Takai', 20, 1, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(387, 'Tarauni', 20, 1, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(388, 'Tofa', 20, 1, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(389, 'Tsanyawa', 20, 1, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(390, 'Tudun Wada', 20, 1, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(391, 'Ungogo', 20, 1, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(392, 'Warawa', 20, 1, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(393, 'Wudil', 20, 1, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(394, 'Batagarawa', 21, 1, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(395, 'Batsari', 21, 1, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(396, 'Baure', 21, 1, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(397, 'Bindawa', 21, 1, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(398, 'Charanchi', 21, 1, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(399, 'Dandume', 21, 1, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(400, 'Danja', 21, 1, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(401, 'Dan Musa', 21, 1, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(402, 'Daura', 21, 1, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(403, 'Dutsi', 21, 1, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(404, 'Dutsin Ma', 21, 1, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(405, 'Faskari', 21, 1, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(406, 'Funtua', 21, 1, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(407, 'Ingawa', 21, 1, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(408, 'Jibia', 21, 1, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(409, 'Kafur', 21, 1, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(410, 'Kaita', 21, 1, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(411, 'Kankara', 21, 1, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(412, 'Kankia', 21, 1, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(413, 'Katsina', 21, 1, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(414, 'Kurfi', 21, 1, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(415, 'Kusada', 21, 1, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(416, 'Mai''Adua', 21, 1, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(417, 'Malumfashi', 21, 1, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(418, 'Mani', 21, 1, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(419, 'Mashi', 21, 1, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(420, 'Matazu', 21, 1, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(421, 'Musawa', 21, 1, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(422, 'Rimi', 21, 1, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(423, 'Sabuwa', 21, 1, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(424, 'Safana', 21, 1, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(425, 'Sandamu', 21, 1, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(426, 'Zango', 21, 1, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(427, 'Arewa Dandi', 22, 1, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(428, 'Argungu', 22, 1, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(429, 'Augie', 22, 1, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(430, 'Bagudo', 22, 1, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(431, 'Birnin Kebbi', 22, 1, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(432, 'Bunza', 22, 1, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(433, 'Dandi', 22, 1, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(434, 'Fakai', 22, 1, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(435, 'Gwandu', 22, 1, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(436, 'Jega', 22, 1, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(437, 'Kalgo', 22, 1, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(438, 'Koko/Besse', 22, 1, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(439, 'Maiyama', 22, 1, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(440, 'Ngaski', 22, 1, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(441, 'Sakaba', 22, 1, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(442, 'Shanga', 22, 1, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(443, 'Suru', 22, 1, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(444, 'Wasagu/Danko', 22, 1, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(445, 'Yauri', 22, 1, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(446, 'Zuru', 22, 1, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(447, 'Ajaokuta', 23, 1, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(448, 'Ankpa', 23, 1, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(449, 'Bassa', 23, 1, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(450, 'Dekina', 23, 1, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(451, 'Ibaji', 23, 1, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(452, 'Idah', 23, 1, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(453, 'Igalamela Odolu', 23, 1, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(454, 'Ijumu', 23, 1, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(455, 'Kabba/Bunu', 23, 1, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(456, 'Kogi', 23, 1, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(457, 'Lokoja', 23, 1, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(458, 'Mopa Muro', 23, 1, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(459, 'Ofu', 23, 1, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(460, 'Ogori/Magongo', 23, 1, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(461, 'Okehi', 23, 1, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(462, 'Okene', 23, 1, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(463, 'Olamaboro', 23, 1, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(464, 'Omala', 23, 1, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(465, 'Yagba East', 23, 1, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(466, 'Yagba West', 23, 1, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(467, 'Baruten', 24, 1, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(468, 'Edu', 24, 1, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(469, 'Ekiti', 24, 1, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(470, 'Ifelodun', 24, 1, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(471, 'Ilorin East', 24, 1, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(472, 'Ilorin South', 24, 1, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(473, 'Ilorin West', 24, 1, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(474, 'Irepodun', 24, 1, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(475, 'Isin', 24, 1, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(476, 'Kaiama', 24, 1, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(477, 'Moro', 24, 1, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(478, 'Offa', 24, 1, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(479, 'Oke Ero', 24, 1, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(480, 'Oyun', 24, 1, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(481, 'Pategi', 24, 1, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(482, 'Ajah', 25, 1, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(483, 'Ikotun', 25, 1, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(484, 'Amuwo-Odofin', 25, 1, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(485, 'Apapa', 25, 1, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(486, 'Badagry', 25, 1, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(487, 'Epe', 25, 1, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(488, 'Ikoyi Dolphin', 25, 1, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(489, 'Lekki Phase 1', 25, 1, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(490, 'Ifako-Ijaiye', 25, 1, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(491, 'Ikeja GRA', 25, 1, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(492, 'Ikorodu', 25, 1, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(493, 'Victoria Island', 25, 1, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(494, 'Magbodo', 25, 1, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(495, 'Yaba Jibowu', 25, 1, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(496, 'Mushin', 25, 1, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(497, 'Ogudu GRA', 25, 1, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(498, 'Oshodi', 25, 1, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(499, 'Isolo', 25, 1, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(500, 'Surulere', 25, 1, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(501, 'Awe', 26, 1, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(502, 'Doma', 26, 1, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(503, 'Karu', 26, 1, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(504, 'Keana', 26, 1, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(505, 'Keffi', 26, 1, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(506, 'Kokona', 26, 1, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(507, 'Lafia', 26, 1, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(508, 'Nasarawa', 26, 1, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(509, 'Nasarawa Egon', 26, 1, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(510, 'Obi', 26, 1, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(511, 'Toto', 26, 1, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(512, 'Wamba', 26, 1, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(513, 'Agwara', 27, 1, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(514, 'Bida', 27, 1, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(515, 'Borgu', 27, 1, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(516, 'Bosso', 27, 1, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(517, 'Chanchaga', 27, 1, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(518, 'Edati', 27, 1, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(519, 'Gbako', 27, 1, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(520, 'Gurara', 27, 1, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(521, 'Katcha', 27, 1, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(522, 'Kontagora', 27, 1, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(523, 'Lapai', 27, 1, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(524, 'Lavun', 27, 1, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(525, 'Magama', 27, 1, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(526, 'Mariga', 27, 1, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(527, 'Mashegu', 27, 1, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(528, 'Mokwa', 27, 1, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(529, 'Moya', 27, 1, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(530, 'Paikoro', 27, 1, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(531, 'Rafi', 27, 1, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(532, 'Rijau', 27, 1, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(533, 'Shiroro', 27, 1, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(534, 'Suleja', 27, 1, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(535, 'Tafa', 27, 1, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(536, 'Wushishi', 27, 1, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(537, 'Abeokuta South', 28, 1, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(538, 'Ado-Odo/Ota', 28, 1, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(539, 'Egbado North', 28, 1, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(540, 'Egbado South', 28, 1, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(541, 'Ewekoro', 28, 1, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(542, 'Ifo', 28, 1, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(543, 'Ijebu East', 28, 1, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(544, 'Ijebu North', 28, 1, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(545, 'Ijebu North East', 28, 1, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(546, 'Ijebu Ode', 28, 1, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(547, 'Ikenne', 28, 1, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(548, 'Imeko Afon', 28, 1, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(549, 'Ipokia', 28, 1, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(550, 'Obafemi Owode', 28, 1, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(551, 'Odeda', 28, 1, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(552, 'Odogbolu', 28, 1, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(553, 'Ogun Waterside', 28, 1, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(554, 'Remo North', 28, 1, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(555, 'Shagamu', 28, 1, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(556, 'Akoko North-West', 29, 1, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(557, 'Akoko South-West', 29, 1, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(558, 'Akoko South-East', 29, 1, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(559, 'Akure North', 29, 1, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(560, 'Akure South', 29, 1, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(561, 'Ese Odo', 29, 1, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(562, 'Idanre', 29, 1, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(563, 'Ifedore', 29, 1, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(564, 'Ilaje', 29, 1, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(565, 'Ile Oluji/Okeigbo', 29, 1, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(566, 'Irele', 29, 1, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(567, 'Odigbo', 29, 1, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(568, 'Okitipupa', 29, 1, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(569, 'Ondo East', 29, 1, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(570, 'Ondo West', 29, 1, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(571, 'Ose', 29, 1, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(572, 'Owo', 29, 1, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(573, 'Atakunmosa West', 30, 1, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(574, 'Aiyedaade', 30, 1, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(575, 'Aiyedire', 30, 1, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(576, 'Boluwaduro', 30, 1, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(577, 'Boripe', 30, 1, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(578, 'Ede North', 30, 1, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(579, 'Ede South', 30, 1, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(580, 'Ife Central', 30, 1, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(581, 'Ife East', 30, 1, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(582, 'Ife North', 30, 1, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(583, 'Ife South', 30, 1, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(584, 'Egbedore', 30, 1, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(585, 'Ejigbo', 30, 1, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(586, 'Ifedayo', 30, 1, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(587, 'Ifelodun', 30, 1, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(588, 'Ila', 30, 1, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(589, 'Ilesa East', 30, 1, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(590, 'Ilesa West', 30, 1, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(591, 'Irepodun', 30, 1, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(592, 'Irewole', 30, 1, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(593, 'Isokan', 30, 1, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(594, 'Iwo', 30, 1, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(595, 'Obokun', 30, 1, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(596, 'Odo Otin', 30, 1, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(597, 'Ola Oluwa', 30, 1, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(598, 'Olorunda', 30, 1, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(599, 'Oriade', 30, 1, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(600, 'Orolu', 30, 1, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(601, 'Osogbo', 30, 1, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(602, 'Akinyele', 31, 1, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(603, 'Atiba', 31, 1, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(604, 'Atisbo', 31, 1, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(605, 'Egbeda', 31, 1, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(606, 'Ibadan North', 31, 1, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(607, 'Ibadan North-East', 31, 1, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(608, 'Ibadan North-West', 31, 1, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(609, 'Ibadan South-East', 31, 1, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(610, 'Ibadan South-West', 31, 1, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(611, 'Ibarapa Central', 31, 1, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(612, 'Ibarapa East', 31, 1, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(613, 'Ibarapa North', 31, 1, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(614, 'Ido', 31, 1, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(615, 'Irepo', 31, 1, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(616, 'Iseyin', 31, 1, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(617, 'Itesiwaju', 31, 1, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(618, 'Iwajowa', 31, 1, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(619, 'Kajola', 31, 1, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(620, 'Lagelu', 31, 1, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(621, 'Ogbomosho North', 31, 1, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(622, 'Ogbomosho South', 31, 1, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(623, 'Ogo Oluwa', 31, 1, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(624, 'Olorunsogo', 31, 1, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(625, 'Oluyole', 31, 1, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(626, 'Ona Ara', 31, 1, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(627, 'Orelope', 31, 1, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(628, 'Ori Ire', 31, 1, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(629, 'Oyo', 31, 1, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(630, 'Oyo East', 31, 1, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(631, 'Saki East', 31, 1, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(632, 'Saki West', 31, 1, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(633, 'Surulere', 31, 1, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(634, 'Barkin Ladi', 32, 1, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(635, 'Bassa', 32, 1, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(636, 'Jos East', 32, 1, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0);
INSERT INTO `state_cities` (`id`, `cityname`, `stateid`, `status`, `createdat`, `updatedat`, `deletedat`, `isdeleted`) VALUES
(637, 'Jos North', 32, 1, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(638, 'Jos South', 32, 1, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(639, 'Kanam', 32, 1, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(640, 'Kanke', 32, 1, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(641, 'Langtang South', 32, 1, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(642, 'Langtang North', 32, 1, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(643, 'Mangu', 32, 1, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(644, 'Mikang', 32, 1, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(645, 'Pankshin', 32, 1, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(646, 'Qua''an Pan', 32, 1, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(647, 'Riyom', 32, 1, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(648, 'Shendam', 32, 1, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(649, 'Wase', 32, 1, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(650, 'Ahoada East', 33, 1, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(651, 'Ahoada West', 33, 1, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(652, 'Akuku-Toru', 33, 1, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(653, 'Andoni', 33, 1, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(654, 'Asari-Toru', 33, 1, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(655, 'Bonny', 33, 1, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(656, 'Degema', 33, 1, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(657, 'Eleme', 33, 1, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(658, 'Emuoha', 33, 1, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(659, 'Etche', 33, 1, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(660, 'Gokana', 33, 1, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(661, 'Ikwerre', 33, 1, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(662, 'Khana', 33, 1, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(663, 'Obio/Akpor', 33, 1, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(664, 'Ogba/Egbema/Ndoni', 33, 1, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(665, 'Ogu/Bolo', 33, 1, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(666, 'Okrika', 33, 1, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(667, 'Omuma', 33, 1, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(668, 'Opobo/Nkoro', 33, 1, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(669, 'Oyigbo', 33, 1, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(670, 'Port Harcourt', 33, 1, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(671, 'Tai', 33, 1, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(672, 'Bodinga', 34, 1, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(673, 'Dange Shuni', 34, 1, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(674, 'Gada', 34, 1, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(675, 'Goronyo', 34, 1, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(676, 'Gudu', 34, 1, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(677, 'Gwadabawa', 34, 1, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(678, 'Illela', 34, 1, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(679, 'Isa', 34, 1, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(680, 'Kebbe', 34, 1, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(681, 'Kware', 34, 1, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(682, 'Rabah', 34, 1, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(683, 'Sabon Birni', 34, 1, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(684, 'Shagari', 34, 1, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(685, 'Silame', 34, 1, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(686, 'Sokoto North', 34, 1, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(687, 'Sokoto South', 34, 1, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(688, 'Tambuwal', 34, 1, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(689, 'Tangaza', 34, 1, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(690, 'Tureta', 34, 1, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(691, 'Wamako', 34, 1, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(692, 'Wurno', 34, 1, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(693, 'Yabo', 34, 1, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(694, 'Bali', 35, 1, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(695, 'Donga', 35, 1, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(696, 'Gashaka', 35, 1, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(697, 'Gassol', 35, 1, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(698, 'Ibi', 35, 1, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(699, 'Jalingo', 35, 1, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(700, 'Karim Lamido', 35, 1, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(701, 'Kumi', 35, 1, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(702, 'Lau', 35, 1, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(703, 'Sardauna', 35, 1, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(704, 'Takum', 35, 1, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(705, 'Ussa', 35, 1, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(706, 'Wukari', 35, 1, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(707, 'Yorro', 35, 1, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(708, 'Zing', 35, 1, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(709, 'Bursari', 36, 1, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(710, 'Damaturu', 36, 1, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(711, 'Fika', 36, 1, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(712, 'Fune', 36, 1, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(713, 'Geidam', 36, 1, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(714, 'Gujba', 36, 1, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(715, 'Gulani', 36, 1, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(716, 'Jakusko', 36, 1, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(717, 'Karasuwa', 36, 1, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(718, 'Machina', 36, 1, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(719, 'Nangere', 36, 1, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(720, 'Nguru', 36, 1, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(721, 'Potiskum', 36, 1, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(722, 'Tarmuwa', 36, 1, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(723, 'Yunusari', 36, 1, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(724, 'Yusufari', 36, 1, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(725, 'Bakura', 37, 1, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(726, 'Birnin Magaji/Kiyaw', 37, 1, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(727, 'Bukkuyum', 37, 1, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(728, 'Bungudu', 37, 1, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(729, 'Gummi', 37, 1, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(730, 'Gusau', 37, 1, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(731, 'Kaura Namoda', 37, 1, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(732, 'Maradun', 37, 1, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(733, 'Maru', 37, 1, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(734, 'Shinkafi', 37, 1, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(735, 'Talata Mafara', 37, 1, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(736, 'Chafe', 37, 1, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(737, 'Zurmi', 37, 1, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(738, 'Agege', 25, 1, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(739, 'Lekki Phase 2', 25, 1, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(740, 'Ikeja Alausa', 25, 1, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(741, 'Ikeja Agidingbi', 25, 1, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(742, 'Ikeja Maryland', 25, 1, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(743, 'Ikeja Oregun', 25, 1, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(744, 'Ikeja Opebi/Allen', 25, 1, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(745, 'Ikeja Ojodu', 25, 1, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(746, 'Ikoyi Banana Island', 25, 1, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(747, 'Ikoyi', 25, 1, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(748, 'Ogudu Road', 25, 1, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(749, 'Yaba Akoka', 25, 1, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(750, 'Ikeja Ogba', 25, 1, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0),
(751, 'Lagos Island', 25, 1, '2017-10-06 09:45:59', NULL, '0000-00-00 00:00:00', 0);

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
  `moduleStatus` tinyint(4) NOT NULL DEFAULT '1',
  `jollofsitetypeid` int(11) NOT NULL,
  `createdat` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updatedat` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `deletedat` timestamp NULL DEFAULT NULL,
  `isdeleted` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `system_modules`
--

INSERT INTO `system_modules` (`moduleID`, `controlerName`, `Description`, `moduleStatus`, `jollofsitetypeid`, `createdat`, `updatedat`, `deletedat`, `isdeleted`) VALUES
(1, 'Admin::product', 'View All Menus', 1, 1, '2018-09-04 13:34:47', '2018-09-04 13:34:47', NULL, 0),
(2, 'Admin::add_product', 'Add New Menus', 1, 1, '2018-09-04 13:34:47', '2018-09-04 13:34:47', NULL, 0),
(3, 'Admin::category', 'View and Add New Menu categories', 1, 1, '2018-09-04 13:34:47', '2018-09-04 13:34:47', NULL, 0),
(4, 'Admin::order_pending', 'View All Pending Orders', 1, 1, '2018-09-04 13:34:47', '2018-09-04 13:34:47', NULL, 0),
(5, 'Admin::order_processing', 'View All Processing Order', 1, 1, '2018-09-04 13:34:47', '2018-09-04 13:34:47', NULL, 0),
(6, 'Admin::order_delivery', 'View All Dispatched Order', 1, 1, '2018-09-04 13:34:47', '2018-09-04 13:34:47', NULL, 0),
(7, 'Admin::order_delivered', 'View All Delivered Order', 1, 1, '2018-09-04 13:34:47', '2018-09-04 13:34:47', NULL, 0),
(8, 'Admin::order_cancel', 'View All Canceled Order', 1, 1, '2018-09-04 13:34:47', '2018-09-04 13:34:47', NULL, 0),
(9, 'Admin::order_products', 'View Orders full Details', 1, 1, '2018-09-04 13:34:47', '2018-09-04 13:34:47', NULL, 0),
(10, 'Admin::order', 'View All Order', 1, 1, '2018-09-04 13:34:47', '2018-09-04 13:34:47', NULL, 0),
(11, 'Admin::rest_accept', 'Accept New Orders', 1, 1, '2018-09-04 13:34:47', '2018-09-04 13:34:47', NULL, 0),
(12, 'Admin::rest_move_disperse', 'Move Orders to be Dispatched', 1, 1, '2018-09-04 13:34:47', '2018-09-04 13:34:47', NULL, 0),
(13, 'Restaurant_admin::cancel_orderform', 'Cancel Orders', 1, 1, '2018-09-04 13:34:47', '2018-09-04 13:34:47', NULL, 0),
(14, 'Admin::table_reservation', 'View Table Reservation', 1, 1, '2018-09-04 13:34:47', '2018-09-04 13:34:47', NULL, 0),
(15, 'Admin::table_reservation_accept', 'Accept Table Reservation', 1, 1, '2018-09-04 13:34:47', '2018-09-04 13:34:47', NULL, 0),
(16, 'Admin::table_reservation_cancel', 'Cancel Table Reservation', 1, 1, '2018-09-04 13:34:47', '2018-09-04 13:34:47', NULL, 0),
(17, 'Dashboard::settings', 'Store General Settings', 1, 1, '2018-09-04 13:34:47', '2018-09-04 13:34:47', NULL, 0),
(18, 'Admin::users', 'View/Edit All Users ', 1, 1, '2018-09-04 13:34:47', '2018-09-04 13:34:47', NULL, 0),
(19, 'Admin::userroles', 'Roles & Permissions Management', 1, 1, '2018-09-04 13:34:47', '2018-09-04 13:34:47', NULL, 0),
(20, 'Admin::promo_banner', 'Banners & Promo Settings', 1, 1, '2018-09-04 13:34:47', '2018-09-04 13:34:47', NULL, 0),
(21, 'Admin::product', 'View All Product', 1, 2, '2018-09-04 13:34:47', '2018-09-04 13:34:47', NULL, 0),
(22, 'Admin::newproduct', 'Add New Product', 1, 2, '2018-09-04 13:34:47', '2018-09-04 13:34:47', NULL, 0),
(23, 'Admin::order_pending', 'View All Pending Orders', 1, 2, '2018-09-04 13:34:47', '2018-09-04 13:34:47', NULL, 0),
(24, 'Admin::order_processing', 'View All Processing Order', 1, 2, '2018-09-04 13:34:47', '2018-09-04 13:34:47', NULL, 0),
(25, 'Admin::order_delivery', 'View All Disperse Order', 1, 2, '2018-09-04 13:34:47', '2018-09-04 13:34:47', NULL, 0),
(26, 'Admin::order_delivered', 'View All Delivered Order', 1, 2, '2018-09-04 13:34:47', '2018-09-04 13:34:47', NULL, 0),
(27, 'Admin::order_cancel', 'View All Canceled Order', 1, 2, '2018-09-04 13:34:47', '2018-09-04 13:34:47', NULL, 0),
(28, 'Admin::order_products', 'View Orders full Details', 1, 2, '2018-09-04 13:34:47', '2018-09-04 13:34:47', NULL, 0),
(29, 'Admin::order', 'View All Order', 1, 2, '2018-09-04 13:34:47', '2018-09-04 13:34:47', NULL, 0),
(30, 'Admin::product_accept', 'Accept New Orders', 1, 2, '2018-09-04 13:34:47', '2018-09-04 13:34:47', NULL, 0),
(31, 'Admin::product_move_disperse', 'Move Orders to be Dispatched', 1, 2, '2018-09-04 13:34:47', '2018-09-04 13:34:47', NULL, 0),
(32, 'Orders::cancel_orderform', 'Cancel Orders', 1, 2, '2018-09-04 13:34:47', '2018-09-04 13:34:47', NULL, 0),
(33, 'Admin::settings', 'Store General Settings', 1, 2, '2018-09-04 13:34:47', '2018-09-04 13:42:19', '2018-09-04 13:34:47', 1),
(34, 'Admin::users', 'View/Edit All Users ', 1, 2, '2018-09-04 13:34:47', '2018-09-04 13:34:47', NULL, 0),
(35, 'Admin::userroles', 'Roles & Permissions Management', 1, 2, '2018-09-04 13:34:47', '2018-09-04 13:34:47', NULL, 0),
(36, 'Admin::quickproduct_stock_manager', 'Quick Product Stock Manager Form', 1, 2, '2018-09-04 13:34:47', '2018-09-04 13:46:59', '2018-09-04 13:34:47', 1),
(37, 'Admin::product_stock_manager', 'Full Product Stock Manager', 1, 2, '2018-09-04 13:34:47', '2018-09-04 13:34:47', NULL, 0),
(38, 'Dashboard::settings', 'Store General Settings', 1, 2, '2018-09-04 13:34:47', '2018-09-04 13:34:47', NULL, 0),
(39, 'Products::delete', 'Delete Products', 1, 2, '2018-09-04 13:34:47', '2018-09-04 13:34:47', NULL, 0),
(40, 'Promos::index', 'View Banners & Promo', 1, 2, '2018-09-04 13:34:47', '2018-09-04 13:34:47', NULL, 0),
(41, 'Promos::editform', 'Edit Banners & Promo', 1, 2, '2018-09-04 13:34:47', '2018-09-04 13:34:47', NULL, 0),
(42, 'Categories::delete', 'Delete Menu Categories', 1, 1, '2018-09-04 13:34:47', '2018-09-04 13:34:47', NULL, 0),
(43, 'Categories::index', 'View Menu Categories', 1, 1, '2018-09-04 13:34:47', '2018-09-04 13:34:47', NULL, 0),
(44, 'Categories::editform', 'Edit Menu Categories', 1, 1, '2018-09-04 13:34:47', '2018-09-04 13:34:47', NULL, 0),
(45, 'Categories::addform', 'Add New Menu Categories', 1, 1, '2018-09-04 13:34:47', '2018-09-04 13:34:47', NULL, 0),
(46, 'Dashboard::index', 'View Dashboard', 1, 3, '2018-09-04 13:34:47', '2018-09-04 13:34:47', NULL, 0),
(47, 'Orders::index', 'View All Cuisine And Fashion Orders', 1, 3, '2018-09-04 13:34:47', '2018-09-04 13:34:47', NULL, 0),
(48, 'Orders::view', 'View Orders full Details', 1, 3, '2018-09-04 13:34:47', '2018-09-04 13:34:47', NULL, 0),
(49, 'Orders::product_accept', 'Accept New Orders', 1, 3, '2018-09-04 13:34:47', '2018-09-04 13:34:47', NULL, 0),
(50, 'Orders::product_move_dispatched', 'Move Orders to be Dispatched', 1, 3, '2018-09-04 13:34:47', '2018-09-04 13:34:47', NULL, 0),
(51, 'Orders::product_delivered', 'Accept Orders Delivered', 1, 3, '2018-09-04 13:34:47', '2018-09-04 13:34:47', NULL, 0),
(52, 'Orders::cancel_orderform', 'Cancel Orders', 1, 3, '2018-09-04 13:34:47', '2018-09-04 13:34:47', NULL, 0),
(53, 'Tablereservation::index', 'View Table Reservation', 1, 3, '2018-09-04 13:34:47', '2018-09-04 13:34:47', NULL, 0),
(54, 'Tablereservation::add', 'Accept Table Reservation', 1, 3, '2018-09-04 13:34:47', '2018-09-04 13:34:47', NULL, 0),
(55, 'Tablereservation::delete', 'Cancel Table Reservation', 1, 3, '2018-09-04 13:34:47', '2018-09-04 13:34:47', NULL, 0),
(56, 'Merchants::index', 'View All Merchants', 1, 3, '2018-09-04 13:34:47', '2018-09-04 13:34:47', NULL, 0),
(57, 'Merchants::merchantapprove', 'Approve Merchants', 1, 3, '2018-09-04 13:34:47', '2018-09-04 13:34:47', NULL, 0),
(58, 'Merchants::merchantdecline', 'Decline Merchants', 1, 3, '2018-09-04 13:34:47', '2018-09-04 13:34:47', NULL, 0),
(59, 'Promos::index', 'View Banners & Promo', 1, 1, '2018-09-04 13:34:47', '2018-09-04 13:34:47', NULL, 0),
(60, 'Promos::editform', 'Edit Banners & Promo', 1, 1, '2018-09-04 13:34:47', '2018-09-04 13:34:47', NULL, 0),
(61, 'Merchants::comments', 'Veiw all Comments ', 1, 3, '2018-09-04 13:34:47', '2018-09-04 13:34:47', NULL, 0),
(62, 'Customers::index', 'View All B2C''s (Customers)', 1, 3, '2018-09-04 13:34:47', '2018-09-04 13:34:47', NULL, 0),
(63, 'Customers::approve', 'Approve B2C''s (Customers)', 1, 3, '2018-09-04 13:34:47', '2018-09-04 13:34:47', NULL, 0),
(64, 'Customers::delete', 'Delete B2C''s (Customers)', 1, 3, '2018-09-04 13:34:47', '2018-09-04 13:34:47', NULL, 0),
(65, 'Promos::index', 'View All Promos & Ad''s', 1, 3, '2018-09-04 13:34:47', '2018-09-04 13:34:47', NULL, 0),
(66, 'Promos::b2bpromos', 'View B2B''s Promos & Ad''s', 1, 3, '2018-09-04 13:34:47', '2018-09-04 13:34:47', NULL, 0),
(67, 'Promos::thirdpartyads', 'View Third Partyads', 1, 3, '2018-09-04 13:34:47', '2018-09-04 13:34:47', NULL, 0),
(68, 'Promos::settings', 'Promos & Ad''s Settings', 1, 3, '2018-09-04 13:34:47', '2018-09-04 13:34:47', NULL, 0),
(69, 'Promos::settingspromoduration', 'Promos Duration Settings', 1, 3, '2018-09-04 13:34:47', '2018-09-04 13:34:47', NULL, 0),
(70, 'Promos::settingspromopricing', 'Promos Pricing Settings', 1, 3, '2018-09-04 13:34:47', '2018-09-04 13:34:47', NULL, 0),
(71, 'Merchants::b2b', 'View All Registered B2B''s ', 1, 3, '2018-09-04 13:34:47', '2018-09-04 13:34:47', NULL, 0),
(72, 'Merchants::cuisineproduct', 'View All Cuisine B2B''s Products', 1, 3, '2018-09-04 13:34:47', '2018-09-04 13:34:47', NULL, 0),
(73, 'Merchants::fashionproduct', 'View All Fashion B2B''s Products', 1, 3, '2018-09-04 13:34:47', '2018-09-04 13:34:47', NULL, 0),
(74, 'Customers::b2c', 'Manage B2C''s (Customers)', 1, 3, '2018-09-04 13:34:47', '2018-09-04 13:34:47', NULL, 0),
(75, 'Admin::product_stock_manager', 'Full Product Stock Manager', 1, 1, '2018-09-04 13:34:47', '2018-09-04 13:34:47', NULL, 0),
(76, 'Merchants::b2bstore', 'View B2B''s Store Info''s', 1, 3, '2018-09-04 13:34:47', '2018-09-04 13:34:47', NULL, 0),
(77, 'Merchants::b2borders', 'View B2B''s Store Orders', 1, 3, '2018-09-04 13:34:47', '2018-09-04 13:34:47', NULL, 0),
(78, 'Merchants::b2bproducts', 'View B2B''s Store Products', 1, 3, '2018-09-04 13:34:47', '2018-09-04 13:34:47', NULL, 0),
(79, 'Merchants::b2busers', 'View B2B''s Store Users', 1, 3, '2018-09-04 13:34:47', '2018-09-04 13:34:47', NULL, 0),
(80, 'Merchants::b2bpromos', 'View B2B''s Store Promos', 1, 3, '2018-09-04 13:34:47', '2018-09-04 13:34:47', NULL, 0),
(81, 'Customers::profile', 'Manage B2C''s profile (Customers)', 1, 3, '2018-09-04 13:34:47', '2018-09-04 13:34:47', NULL, 0),
(82, 'Customers::orders', 'Manage B2C''s Orders (Customers)', 1, 3, '2018-09-04 13:34:47', '2018-09-04 13:34:47', NULL, 0),
(83, 'Customers::deliveryaddress', 'Manage B2C''s Delivery Address(Customers)', 1, 3, '2018-09-04 13:34:47', '2018-09-04 13:34:47', NULL, 0),
(84, 'Billing::index', 'Manage B2B''s Billing', 1, 3, '2018-09-04 13:34:47', '2018-09-04 13:34:47', NULL, 0),
(85, 'Billing::billingreport', 'Manage B2B''s Billing Report', 1, 3, '2018-09-04 13:34:47', '2018-09-04 13:34:47', NULL, 0),
(86, 'Billing::deliveringcharges', 'Manage Delivering Charges Billing', 1, 3, '2018-09-04 13:34:47', '2018-09-04 13:34:47', NULL, 0),
(87, 'Banners::jollof', 'Manage Jollof Mainpage Banners', 1, 3, '2018-09-04 13:34:47', '2018-09-04 13:34:47', NULL, 0),
(88, 'Banners::cuisine', 'Manage Jollof Cuisine Banners', 1, 3, '2018-09-04 13:34:47', '2018-09-04 13:34:47', NULL, 0),
(89, 'Banners::fashion', 'Manage Jollof Fashion Banners', 1, 3, '2018-09-04 13:34:47', '2018-09-04 13:34:47', NULL, 0),
(90, 'Banners::lifestyle', 'Manage Jollof Lifestyle Banners', 1, 3, '2018-09-04 13:34:47', '2018-09-04 13:34:47', NULL, 0),
(91, 'Fashion::navigations', 'Manage Fashion Navigations & Categories', 1, 3, '2018-09-04 13:34:47', '2018-09-04 13:34:47', NULL, 0),
(92, 'Fashion::colorvariant', 'Manage Fashion Color Variant', 1, 3, '2018-09-04 13:34:47', '2018-09-04 13:34:47', NULL, 0),
(93, 'Fashion::sizevariant', 'Manage Fashion Size Variant', 1, 3, '2018-09-04 13:34:47', '2018-09-04 13:34:47', NULL, 0),
(94, 'Fashion::usersrole', 'Manage Fashion/Cuisine Users Role', 1, 3, '2018-09-04 13:34:47', '2018-09-04 15:39:59', NULL, 0),
(95, 'Cuisine::category', 'Manage Cuisine Categories', 1, 3, '2018-09-04 13:34:47', '2018-09-04 13:34:47', NULL, 0),
(96, 'Dashboard::othersettings', 'General Settings', 1, 3, '2018-09-04 13:34:47', '2018-09-04 13:34:47', NULL, 0),
(97, 'Dashboard::location', 'General location Settings', 1, 3, '2018-09-04 13:34:47', '2018-09-04 13:34:47', NULL, 0),
(98, 'Users::index', 'Manage Admin User Roles', 1, 3, '2018-09-04 13:34:47', '2018-09-04 13:34:47', NULL, 0),
(99, 'Admin::product_stock_manager', 'Manage Merchant Products', 1, 3, '2018-09-04 13:34:47', '2018-09-04 13:34:47', NULL, 0),
(100, 'Fashion::brand', 'Manage Fashion Brand', 1, 3, '2018-09-04 13:34:47', '2018-09-04 13:34:47', NULL, 0);

-- --------------------------------------------------------

--
-- Table structure for table `system_modules_copy`
--

CREATE TABLE `system_modules_copy` (
  `moduleID` int(11) NOT NULL,
  `controlerName` varchar(50) DEFAULT NULL,
  `Description` varchar(255) DEFAULT '',
  `moduleStatus` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `system_modules_copy`
--

INSERT INTO `system_modules_copy` (`moduleID`, `controlerName`, `Description`, `moduleStatus`) VALUES
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
-- Table structure for table `system_modules_new`
--

CREATE TABLE `system_modules_new` (
  `moduleID` int(11) NOT NULL,
  `controlerName` varchar(50) DEFAULT NULL,
  `Description` varchar(255) DEFAULT '',
  `moduleStatus` tinyint(4) NOT NULL DEFAULT '1',
  `jollofsitetypeid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `system_modules_new`
--

INSERT INTO `system_modules_new` (`moduleID`, `controlerName`, `Description`, `moduleStatus`, `jollofsitetypeid`) VALUES
(1, 'Admin::product', 'View All Menus', 1, 1),
(2, 'Admin::add_product', 'Add New Menus', 1, 1),
(3, 'Admin::category', 'View and Add New Menu categories', 1, 1),
(4, 'Admin::order_pending', 'View All Pending Orders', 1, 1),
(5, 'Admin::order_processing', 'View All Processing Order', 1, 1),
(6, 'Admin::order_delivery', 'View All Disperse Order', 1, 1),
(7, 'Admin::order_delivered', 'View All Delivered Order', 1, 1),
(8, 'Admin::order_cancel', 'View All Canceled Order', 1, 1),
(9, 'Admin::order_products', 'View Orders full Details', 1, 1),
(10, 'Admin::order', 'View All Order', 1, 1),
(11, 'Admin::rest_accept', 'Accept New Orders', 1, 1),
(12, 'Admin::rest_move_disperse', 'Move Orders Disperse', 1, 1),
(13, 'Restaurant_admin::cancel_orderform', 'Cancel Orders', 1, 1),
(14, 'Admin::table_reservation', 'View Table Reservation', 1, 1),
(15, 'Admin::table_reservation_accept', 'Accept Table Reservation', 1, 1),
(16, 'Admin::table_reservation_cancel', 'Cancel Table Reservation', 1, 1),
(17, 'Admin::settings', 'Restaurant General Settings', 1, 1),
(18, 'Admin::users', 'View/Edit All Users ', 1, 1),
(19, 'Admin::userroles', 'Roles & Permissions Management', 1, 1),
(20, 'Admin::promo_banner', 'Banners & Promo Settings', 1, 1),
(21, 'Products::index', 'View All Product', 1, 2),
(22, 'Products::newproduct', 'Add New Product', 1, 2),
(23, 'Admin::order_pending', 'View All Pending Orders', 1, 2),
(24, 'Admin::order_processing', 'View All Processing Order', 1, 2),
(25, 'Admin::order_delivery', 'View All Disperse Order', 1, 2),
(26, 'Admin::order_delivered', 'View All Delivered Order', 1, 2),
(27, 'Admin::order_cancel', 'View All Canceled Order', 1, 2),
(28, 'Admin::order_products', 'View Orders full Details', 1, 2),
(29, 'Orders::index', 'View All Order', 1, 2),
(30, 'Admin::product_accept', 'Accept New Orders', 1, 2),
(31, 'Admin::product_move_disperse', 'Move Orders Disperse', 1, 2),
(32, 'Orders::cancel_orderform', 'Cancel Orders', 1, 2),
(33, 'Admin::settings', 'Store General Settings', 1, 2),
(34, 'Admin::users', 'View/Edit All Users ', 1, 2),
(35, 'Admin::userroles', 'Roles & Permissions Management', 1, 2),
(36, 'Admin::product_stock_manager', 'Quick Product Stock Manager Form', 1, 2),
(37, 'Admin::product_stock_manager', 'Full Product Stock Manager', 1, 2),
(38, 'Dashboard::settings', 'Store General Settings', 1, 2),
(39, 'Products::delete', 'Delete Products', 1, 2),
(40, 'Promos::index', 'View Banners & Promo', 1, 2),
(41, 'Promos::editform', 'Edit Banners & Promo', 1, 2),
(42, 'Categories::delete', 'Delete Menu Categories', 1, 1),
(43, 'Categories::index', 'View Menu Categories', 1, 1),
(44, 'Categories::editform', 'Edit Menu Categories', 1, 1),
(45, 'Categories::addform', 'Add New Menu Categories', 1, 1),
(46, 'Dashboard::index', 'Veiw Dashboard', 1, 3),
(47, 'Orders::index', 'Veiw All Cuisine And Fahion Orders', 1, 3);

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
(2, 'TBR-qHs8SE3fB7GM', 3, 1, 7, '2018-01-19', '13:30:00', 'Prince oye', 'pncbanking@yahoo.com', '08050544421', ' ', 1, 1, 1, 0, '2018-01-11 16:27:27', '2018-08-01 12:40:36', '0000-00-00 00:00:00', 0),
(3, 'TBR-jz3eHrHMYHYz', 3, 5, 19, '2018-01-25', '14:30:00', 'Prince oye', 'pncbanking@yahoo.com', '08056786777', ' ', 1, 1, 1, 0, '2018-01-16 12:53:53', '2018-09-10 11:17:36', '0000-00-00 00:00:00', 0);

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
  `forcepasswordchange` tinyint(4) DEFAULT '1',
  `lastLogin` datetime DEFAULT NULL,
  `lastLoginIP` varchar(30) CHARACTER SET latin1 DEFAULT NULL,
  `passwordresettoken` varchar(255) CHARACTER SET latin1 DEFAULT NULL,
  `admin_read_status` tinyint(4) NOT NULL DEFAULT '0',
  `createdat` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updatedat` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `deletedat` timestamp NULL DEFAULT NULL,
  `isdeleted` tinyint(1) NOT NULL,
  `confirmemail` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `restaurantid`, `userroleid`, `firstname`, `lastname`, `email`, `phonenumber`, `merchantid`, `username`, `password`, `status`, `accesstype`, `forcepasswordchange`, `lastLogin`, `lastLoginIP`, `passwordresettoken`, `admin_read_status`, `createdat`, `updatedat`, `deletedat`, `isdeleted`, `confirmemail`) VALUES
(7, 0, 1, 'OLUWASEUN', 'OLUDELE', 'seun@oludeleseun.com', '08032530125', NULL, 'oludeleseun', 'c5864e0679a35c03abd1c36ad81c8d20', 1, 1, 0, NULL, '127.0.0.1', NULL, 0, '2017-05-24 05:07:12', '2018-06-11 10:49:13', NULL, 0, 'yes'),
(11, 0, 1, 'Obianuju', 'Ezeanyangu', 'uju@softcom.ng', '07031312454', 70002, 'softcom-admin', 'c5864e0679a35c03abd1c36ad81c8d20', 1, 2, NULL, NULL, NULL, NULL, 0, '2017-05-24 05:07:12', '2018-06-11 10:49:13', NULL, 0, 'yes'),
(12, 0, 1, 'Medplus', 'Admin', 'seun@oludeleseun.com', '08032530125', 70001, 'medplusikeja', 'dad40339cf9ecde78ef6d9ae3b0dcb6f', 1, 2, 1, NULL, '', NULL, 0, '2017-05-24 05:07:12', '2018-06-11 10:49:13', NULL, 0, 'yes'),
(13, 0, 1, 'Admin', 'GSK', 'uju@softcom.ng', '08032530125', 0, 'gsk-admin', '30ee699bd369d7989888ad5b4599b778', 0, 1, NULL, NULL, NULL, NULL, 0, '2017-10-06 13:34:38', '2018-06-11 10:49:13', NULL, 0, 'yes'),
(14, 0, 0, 'Riordan', 'Dolores', 'seun@oludele.com', '08032530125', 70002, 'dolores.chan', 'c5864e0679a35c03abd1c36ad81c8d20', 1, 2, 0, NULL, NULL, NULL, 0, '2017-10-06 13:34:38', '2018-06-11 10:49:13', NULL, 0, 'yes'),
(21, 0, 1, 'O''RIORDAN', 'DOLORES', 'oludeleseun@gmail.com', '08032530125', 0, 'dolores.seun', 'c5864e0679a35c03abd1c36ad81c8d20', 1, 1, 1, NULL, NULL, NULL, 0, '2017-10-06 13:34:38', '2018-06-11 10:49:13', NULL, 0, 'yes'),
(22, 0, 1, 'Mark', 'Baeka', 'didiokoh@gmail.com', '07061113853', 0, 'ndudi.okoh1', 'c5864e0679a35c03abd1c36ad81c8d20', 1, 1, 0, NULL, NULL, NULL, 0, '2017-06-23 18:10:18', '2018-06-11 10:49:13', NULL, 0, 'yes'),
(24, 0, 1, 'Oluwaseun', 'Oludele', 'seun@stakle.com', '08032530125', 70004, 'seun01', '2ac9cb7dc02b3c0083eb70898e549b63', 1, 2, 0, NULL, NULL, NULL, 0, '2017-09-05 15:33:39', '2018-06-11 10:49:13', NULL, 0, 'yes'),
(25, 3, 1, 'oy3', 'trivin', 'oye@ebs.com', '0800989522', 201, '21232f297a57a5a74389', '21232f297a57a5a743894a0e4a801fc3', 1, 0, 0, NULL, '::1', NULL, 1, '2017-10-06 13:34:38', '2018-09-26 05:29:44', NULL, 0, 'Tyn8q9mkMKCWVve'),
(26, 16, 1, 'oy3', 'trivin', 'oye2@ebs.com', '0800989522', 201, '21232f297a57a5a74389', '21232f297a57a5a743894a0e4a801fc3', 1, 0, 1, NULL, '::1', NULL, 0, '2017-10-06 13:34:38', '2018-07-12 11:08:54', NULL, 0, 'yes'),
(27, 16, 3, 'aaaa', 'trivin', 'oye3@ebs.com', '0800989522', 201, '21232f297a57a5a74389', '', 1, 0, 0, NULL, '::1', NULL, 0, '2017-10-06 13:34:38', '2018-08-05 22:41:13', '2018-07-12 12:26:18', 0, '4FXkkcE4zEgjCcq'),
(28, 17, 1, 'segun', 'last', 'trivin98@gmail.com', '04004043', NULL, NULL, '21232f297a57a5a743894a0e4a801fc3', 0, NULL, 1, NULL, NULL, NULL, 0, '2018-07-30 14:23:13', '2018-07-31 08:20:30', NULL, 0, 'yes'),
(29, 3, 3, 'cool', 'test', 'ebs@admin.com', '00000', NULL, NULL, '', 1, NULL, 0, NULL, NULL, NULL, 0, '2018-08-15 10:31:48', '2018-08-15 10:31:48', NULL, 0, '591b6ee7f8f3bf2f8bd4161a7cb143ecdc034142');

-- --------------------------------------------------------

--
-- Table structure for table `users_copy`
--

CREATE TABLE `users_copy` (
  `id` int(11) NOT NULL,
  `idCopy` varchar(11) NOT NULL,
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
-- Dumping data for table `users_copy`
--

INSERT INTO `users_copy` (`id`, `idCopy`, `restaurantid`, `userroleid`, `firstname`, `lastname`, `email`, `phonenumber`, `merchantid`, `username`, `password`, `status`, `accesstype`, `forcepasswordchange`, `lastLogin`, `lastLoginIP`, `passwordresettoken`, `admin_read_status`, `createdat`, `updatedat`, `deletedat`, `isdeleted`) VALUES
(1, '', 3, 1, 'oy3', 'trivin', 'oye@ebs.com', '0800989522', 201, '21232f297a57a5a74389', '21232f297a57a5a743894a0e4a801fc3', 1, 0, 1, NULL, '::1', NULL, 0, '2017-10-06 13:34:38', '2018-05-07 12:35:05', NULL, 0),
(2, '', 16, 1, 'oy3', 'trivin', 'oye2@ebs.com', '0800989522', 201, '21232f297a57a5a74389', '21232f297a57a5a743894a0e4a801fc3', 1, 0, 1, NULL, '::1', NULL, 0, '2017-10-06 13:34:38', '2018-05-07 12:35:07', NULL, 0),
(3, '', 17, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', 0, NULL, 0, NULL, NULL, NULL, 0, '2018-05-07 12:39:04', '2018-05-07 12:39:04', NULL, 0),
(4, '', 18, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', 0, NULL, 0, NULL, NULL, NULL, 0, '2018-05-07 12:39:04', '2018-05-07 12:39:04', NULL, 0),
(5, '', 19, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', 0, NULL, 0, NULL, NULL, NULL, 0, '2018-05-07 12:39:04', '2018-05-07 12:39:04', NULL, 0),
(6, '', 20, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', 0, NULL, 0, NULL, NULL, NULL, 0, '2018-05-07 12:39:04', '2018-05-07 12:39:04', NULL, 0),
(7, '', 21, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', 0, NULL, 0, NULL, NULL, NULL, 0, '2018-05-07 12:39:04', '2018-05-07 12:39:04', NULL, 0),
(8, '', 22, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', 0, NULL, 0, NULL, NULL, NULL, 0, '2018-05-07 12:39:04', '2018-05-07 12:39:04', NULL, 0),
(9, '', 23, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', 0, NULL, 0, NULL, NULL, NULL, 0, '2018-05-07 12:39:04', '2018-05-07 12:39:04', NULL, 0),
(10, '', 24, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', 0, NULL, 0, NULL, NULL, NULL, 0, '2018-05-07 12:39:04', '2018-05-07 12:39:04', NULL, 0),
(11, '', 25, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', 0, NULL, 0, NULL, NULL, NULL, 0, '2018-05-07 12:39:04', '2018-05-07 12:39:04', NULL, 0),
(12, '', 26, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', 0, NULL, 0, NULL, NULL, NULL, 0, '2018-05-07 12:39:04', '2018-05-07 12:39:04', NULL, 0),
(13, '', 27, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', 0, NULL, 0, NULL, NULL, NULL, 0, '2018-05-07 12:39:04', '2018-05-07 12:39:04', NULL, 0),
(14, '', 28, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', 0, NULL, 0, NULL, NULL, NULL, 0, '2018-05-07 12:39:04', '2018-05-07 12:39:04', NULL, 0),
(15, '', 29, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', 0, NULL, 0, NULL, NULL, NULL, 0, '2018-05-07 12:39:04', '2018-05-07 12:39:04', NULL, 0),
(16, '', 30, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', 0, NULL, 0, NULL, NULL, NULL, 0, '2018-05-07 12:39:04', '2018-05-07 12:39:04', NULL, 0),
(17, '', 31, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', 0, NULL, 0, NULL, NULL, NULL, 0, '2018-05-07 12:39:04', '2018-05-07 12:39:04', NULL, 0),
(18, '', 32, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', 0, NULL, 0, NULL, NULL, NULL, 0, '2018-05-07 12:39:04', '2018-05-07 12:39:04', NULL, 0),
(19, '', 33, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', 0, NULL, 0, NULL, NULL, NULL, 0, '2018-05-07 12:39:04', '2018-05-07 12:39:04', NULL, 0),
(20, '', 34, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', 0, NULL, 0, NULL, NULL, NULL, 0, '2018-05-07 12:39:04', '2018-05-07 12:39:04', NULL, 0),
(21, '', 35, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', 0, NULL, 0, NULL, NULL, NULL, 0, '2018-05-07 12:39:04', '2018-05-07 12:39:04', NULL, 0),
(22, '', 36, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', 0, NULL, 0, NULL, NULL, NULL, 0, '2018-05-07 12:39:04', '2018-05-07 12:39:04', NULL, 0),
(23, '', 37, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', 0, NULL, 0, NULL, NULL, NULL, 0, '2018-05-07 12:39:04', '2018-05-07 12:39:04', NULL, 0),
(24, '', 38, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', 0, NULL, 0, NULL, NULL, NULL, 0, '2018-05-07 12:39:04', '2018-05-07 12:39:04', NULL, 0),
(25, '', 39, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', 0, NULL, 0, NULL, NULL, NULL, 0, '2018-05-07 12:39:05', '2018-05-07 12:39:05', NULL, 0),
(26, '', 40, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', 0, NULL, 0, NULL, NULL, NULL, 0, '2018-05-07 12:39:05', '2018-05-07 12:39:05', NULL, 0),
(27, '', 41, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', 0, NULL, 0, NULL, NULL, NULL, 0, '2018-05-07 12:39:05', '2018-05-07 12:39:05', NULL, 0),
(28, '', 42, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', 0, NULL, 0, NULL, NULL, NULL, 0, '2018-05-07 12:39:05', '2018-05-07 12:39:05', NULL, 0),
(29, '', 43, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', 0, NULL, 0, NULL, NULL, NULL, 0, '2018-05-07 12:39:05', '2018-05-07 12:39:05', NULL, 0),
(30, '', 44, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', 0, NULL, 0, NULL, NULL, NULL, 0, '2018-05-07 12:39:05', '2018-05-07 12:39:05', NULL, 0),
(31, '', 45, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', 0, NULL, 0, NULL, NULL, NULL, 0, '2018-05-07 12:39:05', '2018-05-07 12:39:05', NULL, 0),
(32, '', 46, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', 0, NULL, 0, NULL, NULL, NULL, 0, '2018-05-07 12:39:05', '2018-05-07 12:39:05', NULL, 0),
(33, '', 47, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', 0, NULL, 0, NULL, NULL, NULL, 0, '2018-05-07 12:39:05', '2018-05-07 12:39:05', NULL, 0),
(34, '', 48, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', 0, NULL, 0, NULL, NULL, NULL, 0, '2018-05-07 12:39:05', '2018-05-07 12:39:05', NULL, 0),
(35, '', 49, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', 0, NULL, 0, NULL, NULL, NULL, 0, '2018-05-07 12:39:05', '2018-05-07 12:39:05', NULL, 0),
(36, '', 49, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', 0, NULL, 0, NULL, NULL, NULL, 0, '2018-05-07 12:39:05', '2018-05-07 12:39:05', NULL, 0),
(37, '', 51, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', 0, NULL, 0, NULL, NULL, NULL, 0, '2018-05-07 12:39:05', '2018-05-07 12:39:05', NULL, 0),
(38, '', 52, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', 0, NULL, 0, NULL, NULL, NULL, 0, '2018-05-07 12:39:05', '2018-05-07 12:39:05', NULL, 0),
(39, '', 53, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', 0, NULL, 0, NULL, NULL, NULL, 0, '2018-05-07 12:39:05', '2018-05-07 12:39:05', NULL, 0),
(40, '', 54, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', 0, NULL, 0, NULL, NULL, NULL, 0, '2018-05-07 12:39:05', '2018-05-07 12:39:05', NULL, 0),
(41, '', 55, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', 0, NULL, 0, NULL, NULL, NULL, 0, '2018-05-07 12:39:05', '2018-05-07 12:39:05', NULL, 0),
(42, '', 56, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', 0, NULL, 0, NULL, NULL, NULL, 0, '2018-05-07 12:39:05', '2018-05-07 12:39:05', NULL, 0),
(43, '', 57, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', 0, NULL, 0, NULL, NULL, NULL, 0, '2018-05-07 12:39:05', '2018-05-07 12:39:05', NULL, 0),
(44, '', 58, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', 0, NULL, 0, NULL, NULL, NULL, 0, '2018-05-07 12:39:05', '2018-05-07 12:39:05', NULL, 0),
(45, '', 59, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', 0, NULL, 0, NULL, NULL, NULL, 0, '2018-05-07 12:39:05', '2018-05-07 12:39:05', NULL, 0),
(46, '', 60, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', 0, NULL, 0, NULL, NULL, NULL, 0, '2018-05-07 12:39:05', '2018-05-07 12:39:05', NULL, 0),
(47, '', 61, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', 0, NULL, 0, NULL, NULL, NULL, 0, '2018-05-07 12:39:05', '2018-05-07 12:39:05', NULL, 0),
(48, '', 62, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', 0, NULL, 0, NULL, NULL, NULL, 0, '2018-05-07 12:39:05', '2018-05-07 12:39:05', NULL, 0),
(49, '', 63, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', 0, NULL, 0, NULL, NULL, NULL, 0, '2018-05-07 12:39:05', '2018-05-07 12:39:05', NULL, 0),
(50, '', 64, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', 0, NULL, 0, NULL, NULL, NULL, 0, '2018-05-07 12:39:05', '2018-05-07 12:39:05', NULL, 0),
(51, '', 65, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', 0, NULL, 0, NULL, NULL, NULL, 0, '2018-05-07 12:39:05', '2018-05-07 12:39:05', NULL, 0),
(52, '', 66, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', 0, NULL, 0, NULL, NULL, NULL, 0, '2018-05-07 12:39:05', '2018-05-07 12:39:05', NULL, 0),
(53, '', 67, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', 0, NULL, 0, NULL, NULL, NULL, 0, '2018-05-07 12:39:05', '2018-05-07 12:39:05', NULL, 0),
(54, '', 68, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', 0, NULL, 0, NULL, NULL, NULL, 0, '2018-05-07 12:39:05', '2018-05-07 12:39:05', NULL, 0),
(55, '', 69, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', 0, NULL, 0, NULL, NULL, NULL, 0, '2018-05-07 12:39:05', '2018-05-07 12:39:05', NULL, 0),
(56, '', 70, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', 0, NULL, 0, NULL, NULL, NULL, 0, '2018-05-07 12:39:05', '2018-05-07 12:39:05', NULL, 0),
(57, '', 71, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', 0, NULL, 0, NULL, NULL, NULL, 0, '2018-05-07 12:39:05', '2018-05-07 12:39:05', NULL, 0),
(58, '', 72, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', 0, NULL, 0, NULL, NULL, NULL, 0, '2018-05-07 12:39:05', '2018-05-07 12:39:05', NULL, 0),
(59, '', 73, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', 0, NULL, 0, NULL, NULL, NULL, 0, '2018-05-07 12:39:05', '2018-05-07 12:39:05', NULL, 0),
(60, '', 74, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', 0, NULL, 0, NULL, NULL, NULL, 0, '2018-05-07 12:39:05', '2018-05-07 12:39:05', NULL, 0),
(61, '', 75, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', 0, NULL, 0, NULL, NULL, NULL, 0, '2018-05-07 12:39:05', '2018-05-07 12:39:05', NULL, 0),
(62, '', 76, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', 0, NULL, 0, NULL, NULL, NULL, 0, '2018-05-07 12:39:05', '2018-05-07 12:39:05', NULL, 0),
(63, '', 77, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', 0, NULL, 0, NULL, NULL, NULL, 0, '2018-05-07 12:39:05', '2018-05-07 12:39:05', NULL, 0),
(64, '', 78, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', 0, NULL, 0, NULL, NULL, NULL, 0, '2018-05-07 12:39:05', '2018-05-07 12:39:05', NULL, 0),
(65, '', 79, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', 0, NULL, 0, NULL, NULL, NULL, 0, '2018-05-07 12:39:05', '2018-05-07 12:39:05', NULL, 0),
(66, '', 79, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', 0, NULL, 0, NULL, NULL, NULL, 0, '2018-05-07 12:39:05', '2018-05-07 12:39:05', NULL, 0),
(67, '', 81, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', 0, NULL, 0, NULL, NULL, NULL, 0, '2018-05-07 12:39:05', '2018-05-07 12:39:05', NULL, 0),
(68, '', 82, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', 0, NULL, 0, NULL, NULL, NULL, 0, '2018-05-07 12:39:05', '2018-05-07 12:39:05', NULL, 0),
(69, '', 83, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', 0, NULL, 0, NULL, NULL, NULL, 0, '2018-05-07 12:39:05', '2018-05-07 12:39:05', NULL, 0),
(70, '', 84, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', 0, NULL, 0, NULL, NULL, NULL, 0, '2018-05-07 12:39:05', '2018-05-07 12:39:05', NULL, 0),
(71, '', 85, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', 0, NULL, 0, NULL, NULL, NULL, 0, '2018-05-07 12:39:05', '2018-05-07 12:39:05', NULL, 0),
(72, '', 86, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', 0, NULL, 0, NULL, NULL, NULL, 0, '2018-05-07 12:39:05', '2018-05-07 12:39:05', NULL, 0),
(73, '', 87, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', 0, NULL, 0, NULL, NULL, NULL, 0, '2018-05-07 12:39:05', '2018-05-07 12:39:05', NULL, 0),
(74, '', 88, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', 0, NULL, 0, NULL, NULL, NULL, 0, '2018-05-07 12:39:05', '2018-05-07 12:39:05', NULL, 0),
(75, '', 89, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', 0, NULL, 0, NULL, NULL, NULL, 0, '2018-05-07 12:39:05', '2018-05-07 12:39:05', NULL, 0),
(76, '', 90, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', 0, NULL, 0, NULL, NULL, NULL, 0, '2018-05-07 12:39:05', '2018-05-07 12:39:05', NULL, 0),
(77, '', 91, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', 0, NULL, 0, NULL, NULL, NULL, 0, '2018-05-07 12:39:05', '2018-05-07 12:39:05', NULL, 0),
(78, '', 92, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', 0, NULL, 0, NULL, NULL, NULL, 0, '2018-05-07 12:39:05', '2018-05-07 12:39:05', NULL, 0),
(79, '', 93, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', 0, NULL, 0, NULL, NULL, NULL, 0, '2018-05-07 12:39:05', '2018-05-07 12:39:05', NULL, 0),
(80, '', 94, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', 0, NULL, 0, NULL, NULL, NULL, 0, '2018-05-07 12:39:05', '2018-05-07 12:39:05', NULL, 0),
(81, '', 95, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', 0, NULL, 0, NULL, NULL, NULL, 0, '2018-05-07 12:39:05', '2018-05-07 12:39:05', NULL, 0),
(82, '', 96, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', 0, NULL, 0, NULL, NULL, NULL, 0, '2018-05-07 12:39:05', '2018-05-07 12:39:05', NULL, 0),
(83, '', 97, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', 0, NULL, 0, NULL, NULL, NULL, 0, '2018-05-07 12:39:05', '2018-05-07 12:39:05', NULL, 0),
(84, '', 97, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', 0, NULL, 0, NULL, NULL, NULL, 0, '2018-05-07 12:39:05', '2018-05-07 12:39:05', NULL, 0),
(85, '', 99, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', 0, NULL, 0, NULL, NULL, NULL, 0, '2018-05-07 12:39:05', '2018-05-07 12:39:05', NULL, 0),
(86, '', 100, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', 0, NULL, 0, NULL, NULL, NULL, 0, '2018-05-07 12:39:05', '2018-05-07 12:39:05', NULL, 0),
(87, '', 101, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', 0, NULL, 0, NULL, NULL, NULL, 0, '2018-05-07 12:39:05', '2018-05-07 12:39:05', NULL, 0),
(88, '', 17, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', 0, NULL, 0, NULL, NULL, NULL, 0, '2018-05-08 10:29:51', '2018-05-08 10:29:51', NULL, 0),
(89, '', 18, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', 0, NULL, 0, NULL, NULL, NULL, 0, '2018-05-08 10:29:51', '2018-05-08 10:29:51', NULL, 0),
(90, '', 19, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', 0, NULL, 0, NULL, NULL, NULL, 0, '2018-05-08 10:29:51', '2018-05-08 10:29:51', NULL, 0),
(91, '', 20, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', 0, NULL, 0, NULL, NULL, NULL, 0, '2018-05-08 10:29:51', '2018-05-08 10:29:51', NULL, 0),
(92, '', 21, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', 0, NULL, 0, NULL, NULL, NULL, 0, '2018-05-08 10:29:51', '2018-05-08 10:29:51', NULL, 0),
(93, '', 22, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', 0, NULL, 0, NULL, NULL, NULL, 0, '2018-05-08 10:29:51', '2018-05-08 10:29:51', NULL, 0),
(94, '', 23, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', 0, NULL, 0, NULL, NULL, NULL, 0, '2018-05-08 10:29:51', '2018-05-08 10:29:51', NULL, 0),
(95, '', 24, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', 0, NULL, 0, NULL, NULL, NULL, 0, '2018-05-08 10:29:51', '2018-05-08 10:29:51', NULL, 0),
(96, '', 25, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', 0, NULL, 0, NULL, NULL, NULL, 0, '2018-05-08 10:29:51', '2018-05-08 10:29:51', NULL, 0),
(97, '', 26, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', 0, NULL, 0, NULL, NULL, NULL, 0, '2018-05-08 10:29:51', '2018-05-08 10:29:51', NULL, 0),
(98, '', 27, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', 0, NULL, 0, NULL, NULL, NULL, 0, '2018-05-08 10:29:51', '2018-05-08 10:29:51', NULL, 0),
(99, '', 28, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', 0, NULL, 0, NULL, NULL, NULL, 0, '2018-05-08 10:29:51', '2018-05-08 10:29:51', NULL, 0),
(100, '', 29, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', 0, NULL, 0, NULL, NULL, NULL, 0, '2018-05-08 10:29:51', '2018-05-08 10:29:51', NULL, 0),
(101, '', 30, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', 0, NULL, 0, NULL, NULL, NULL, 0, '2018-05-08 10:29:51', '2018-05-08 10:29:51', NULL, 0),
(102, '', 31, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', 0, NULL, 0, NULL, NULL, NULL, 0, '2018-05-08 10:29:51', '2018-05-08 10:29:51', NULL, 0),
(103, '', 32, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', 0, NULL, 0, NULL, NULL, NULL, 0, '2018-05-08 10:29:51', '2018-05-08 10:29:51', NULL, 0),
(104, '', 33, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', 0, NULL, 0, NULL, NULL, NULL, 0, '2018-05-08 10:29:51', '2018-05-08 10:29:51', NULL, 0),
(105, '', 34, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', 0, NULL, 0, NULL, NULL, NULL, 0, '2018-05-08 10:29:51', '2018-05-08 10:29:51', NULL, 0),
(106, '', 35, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', 0, NULL, 0, NULL, NULL, NULL, 0, '2018-05-08 10:29:51', '2018-05-08 10:29:51', NULL, 0),
(107, '', 36, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', 0, NULL, 0, NULL, NULL, NULL, 0, '2018-05-08 10:29:51', '2018-05-08 10:29:51', NULL, 0),
(108, '', 37, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', 0, NULL, 0, NULL, NULL, NULL, 0, '2018-05-08 10:29:51', '2018-05-08 10:29:51', NULL, 0),
(109, '', 38, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', 0, NULL, 0, NULL, NULL, NULL, 0, '2018-05-08 10:29:51', '2018-05-08 10:29:51', NULL, 0),
(110, '', 39, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', 0, NULL, 0, NULL, NULL, NULL, 0, '2018-05-08 10:29:51', '2018-05-08 10:29:51', NULL, 0),
(111, '', 40, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', 0, NULL, 0, NULL, NULL, NULL, 0, '2018-05-08 10:29:51', '2018-05-08 10:29:51', NULL, 0),
(112, '', 41, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', 0, NULL, 0, NULL, NULL, NULL, 0, '2018-05-08 10:29:51', '2018-05-08 10:29:51', NULL, 0),
(113, '', 42, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', 0, NULL, 0, NULL, NULL, NULL, 0, '2018-05-08 10:29:51', '2018-05-08 10:29:51', NULL, 0),
(114, '', 43, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', 0, NULL, 0, NULL, NULL, NULL, 0, '2018-05-08 10:29:51', '2018-05-08 10:29:51', NULL, 0),
(115, '', 44, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', 0, NULL, 0, NULL, NULL, NULL, 0, '2018-05-08 10:29:51', '2018-05-08 10:29:51', NULL, 0),
(116, '', 45, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', 0, NULL, 0, NULL, NULL, NULL, 0, '2018-05-08 10:29:51', '2018-05-08 10:29:51', NULL, 0),
(117, '', 46, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', 0, NULL, 0, NULL, NULL, NULL, 0, '2018-05-08 10:29:51', '2018-05-08 10:29:51', NULL, 0),
(118, '', 47, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', 0, NULL, 0, NULL, NULL, NULL, 0, '2018-05-08 10:29:51', '2018-05-08 10:29:51', NULL, 0),
(119, '', 48, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', 0, NULL, 0, NULL, NULL, NULL, 0, '2018-05-08 10:29:51', '2018-05-08 10:29:51', NULL, 0),
(120, '', 49, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', 0, NULL, 0, NULL, NULL, NULL, 0, '2018-05-08 10:29:51', '2018-05-08 10:29:51', NULL, 0),
(121, '', 49, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', 0, NULL, 0, NULL, NULL, NULL, 0, '2018-05-08 10:29:51', '2018-05-08 10:29:51', NULL, 0),
(122, '', 51, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', 0, NULL, 0, NULL, NULL, NULL, 0, '2018-05-08 10:29:51', '2018-05-08 10:29:51', NULL, 0),
(123, '', 52, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', 0, NULL, 0, NULL, NULL, NULL, 0, '2018-05-08 10:29:51', '2018-05-08 10:29:51', NULL, 0),
(124, '', 53, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', 0, NULL, 0, NULL, NULL, NULL, 0, '2018-05-08 10:29:51', '2018-05-08 10:29:51', NULL, 0),
(125, '', 54, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', 0, NULL, 0, NULL, NULL, NULL, 0, '2018-05-08 10:29:51', '2018-05-08 10:29:51', NULL, 0),
(126, '', 55, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', 0, NULL, 0, NULL, NULL, NULL, 0, '2018-05-08 10:29:51', '2018-05-08 10:29:51', NULL, 0),
(127, '', 56, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', 0, NULL, 0, NULL, NULL, NULL, 0, '2018-05-08 10:29:51', '2018-05-08 10:29:51', NULL, 0),
(128, '', 57, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', 0, NULL, 0, NULL, NULL, NULL, 0, '2018-05-08 10:29:51', '2018-05-08 10:29:51', NULL, 0),
(129, '', 58, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', 0, NULL, 0, NULL, NULL, NULL, 0, '2018-05-08 10:29:51', '2018-05-08 10:29:51', NULL, 0),
(130, '', 59, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', 0, NULL, 0, NULL, NULL, NULL, 0, '2018-05-08 10:29:51', '2018-05-08 10:29:51', NULL, 0),
(131, '', 60, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', 0, NULL, 0, NULL, NULL, NULL, 0, '2018-05-08 10:29:51', '2018-05-08 10:29:51', NULL, 0),
(132, '', 61, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', 0, NULL, 0, NULL, NULL, NULL, 0, '2018-05-08 10:29:51', '2018-05-08 10:29:51', NULL, 0),
(133, '', 62, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', 0, NULL, 0, NULL, NULL, NULL, 0, '2018-05-08 10:29:51', '2018-05-08 10:29:51', NULL, 0),
(134, '', 63, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', 0, NULL, 0, NULL, NULL, NULL, 0, '2018-05-08 10:29:51', '2018-05-08 10:29:51', NULL, 0),
(135, '', 64, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', 0, NULL, 0, NULL, NULL, NULL, 0, '2018-05-08 10:29:51', '2018-05-08 10:29:51', NULL, 0),
(136, '', 65, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', 0, NULL, 0, NULL, NULL, NULL, 0, '2018-05-08 10:29:51', '2018-05-08 10:29:51', NULL, 0),
(137, '', 66, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', 0, NULL, 0, NULL, NULL, NULL, 0, '2018-05-08 10:29:51', '2018-05-08 10:29:51', NULL, 0),
(138, '', 67, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', 0, NULL, 0, NULL, NULL, NULL, 0, '2018-05-08 10:29:51', '2018-05-08 10:29:51', NULL, 0),
(139, '', 68, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', 0, NULL, 0, NULL, NULL, NULL, 0, '2018-05-08 10:29:51', '2018-05-08 10:29:51', NULL, 0),
(140, '', 69, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', 0, NULL, 0, NULL, NULL, NULL, 0, '2018-05-08 10:29:51', '2018-05-08 10:29:51', NULL, 0),
(141, '', 70, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', 0, NULL, 0, NULL, NULL, NULL, 0, '2018-05-08 10:29:51', '2018-05-08 10:29:51', NULL, 0),
(142, '', 71, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', 0, NULL, 0, NULL, NULL, NULL, 0, '2018-05-08 10:29:51', '2018-05-08 10:29:51', NULL, 0),
(143, '', 72, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', 0, NULL, 0, NULL, NULL, NULL, 0, '2018-05-08 10:29:51', '2018-05-08 10:29:51', NULL, 0),
(144, '', 73, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', 0, NULL, 0, NULL, NULL, NULL, 0, '2018-05-08 10:29:51', '2018-05-08 10:29:51', NULL, 0),
(145, '', 74, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', 0, NULL, 0, NULL, NULL, NULL, 0, '2018-05-08 10:29:51', '2018-05-08 10:29:51', NULL, 0),
(146, '', 75, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', 0, NULL, 0, NULL, NULL, NULL, 0, '2018-05-08 10:29:51', '2018-05-08 10:29:51', NULL, 0),
(147, '', 76, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', 0, NULL, 0, NULL, NULL, NULL, 0, '2018-05-08 10:29:51', '2018-05-08 10:29:51', NULL, 0),
(148, '', 77, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', 0, NULL, 0, NULL, NULL, NULL, 0, '2018-05-08 10:29:51', '2018-05-08 10:29:51', NULL, 0),
(149, '', 78, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', 0, NULL, 0, NULL, NULL, NULL, 0, '2018-05-08 10:29:51', '2018-05-08 10:29:51', NULL, 0),
(150, '', 79, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', 0, NULL, 0, NULL, NULL, NULL, 0, '2018-05-08 10:29:51', '2018-05-08 10:29:51', NULL, 0),
(151, '', 79, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', 0, NULL, 0, NULL, NULL, NULL, 0, '2018-05-08 10:29:51', '2018-05-08 10:29:51', NULL, 0),
(152, '', 81, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', 0, NULL, 0, NULL, NULL, NULL, 0, '2018-05-08 10:29:51', '2018-05-08 10:29:51', NULL, 0),
(153, '', 82, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', 0, NULL, 0, NULL, NULL, NULL, 0, '2018-05-08 10:29:51', '2018-05-08 10:29:51', NULL, 0),
(154, '', 83, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', 0, NULL, 0, NULL, NULL, NULL, 0, '2018-05-08 10:29:51', '2018-05-08 10:29:51', NULL, 0),
(155, '', 84, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', 0, NULL, 0, NULL, NULL, NULL, 0, '2018-05-08 10:29:51', '2018-05-08 10:29:51', NULL, 0),
(156, '', 85, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', 0, NULL, 0, NULL, NULL, NULL, 0, '2018-05-08 10:29:51', '2018-05-08 10:29:51', NULL, 0),
(157, '', 86, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', 0, NULL, 0, NULL, NULL, NULL, 0, '2018-05-08 10:29:51', '2018-05-08 10:29:51', NULL, 0),
(158, '', 87, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', 0, NULL, 0, NULL, NULL, NULL, 0, '2018-05-08 10:29:51', '2018-05-08 10:29:51', NULL, 0),
(159, '', 88, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', 0, NULL, 0, NULL, NULL, NULL, 0, '2018-05-08 10:29:51', '2018-05-08 10:29:51', NULL, 0),
(160, '', 89, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', 0, NULL, 0, NULL, NULL, NULL, 0, '2018-05-08 10:29:51', '2018-05-08 10:29:51', NULL, 0),
(161, '', 90, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', 0, NULL, 0, NULL, NULL, NULL, 0, '2018-05-08 10:29:51', '2018-05-08 10:29:51', NULL, 0),
(162, '', 91, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', 0, NULL, 0, NULL, NULL, NULL, 0, '2018-05-08 10:29:51', '2018-05-08 10:29:51', NULL, 0),
(163, '', 92, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', 0, NULL, 0, NULL, NULL, NULL, 0, '2018-05-08 10:29:51', '2018-05-08 10:29:51', NULL, 0),
(164, '', 93, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', 0, NULL, 0, NULL, NULL, NULL, 0, '2018-05-08 10:29:51', '2018-05-08 10:29:51', NULL, 0),
(165, '', 94, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', 0, NULL, 0, NULL, NULL, NULL, 0, '2018-05-08 10:29:51', '2018-05-08 10:29:51', NULL, 0),
(166, '', 95, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', 0, NULL, 0, NULL, NULL, NULL, 0, '2018-05-08 10:29:51', '2018-05-08 10:29:51', NULL, 0),
(167, '', 96, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', 0, NULL, 0, NULL, NULL, NULL, 0, '2018-05-08 10:29:51', '2018-05-08 10:29:51', NULL, 0),
(168, '', 97, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', 0, NULL, 0, NULL, NULL, NULL, 0, '2018-05-08 10:29:51', '2018-05-08 10:29:51', NULL, 0),
(169, '', 97, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', 0, NULL, 0, NULL, NULL, NULL, 0, '2018-05-08 10:29:51', '2018-05-08 10:29:51', NULL, 0),
(170, '', 99, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', 0, NULL, 0, NULL, NULL, NULL, 0, '2018-05-08 10:29:51', '2018-05-08 10:29:51', NULL, 0),
(171, '', 100, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', 0, NULL, 0, NULL, NULL, NULL, 0, '2018-05-08 10:29:51', '2018-05-08 10:29:51', NULL, 0),
(172, '', 101, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', 0, NULL, 0, NULL, NULL, NULL, 0, '2018-05-08 10:29:51', '2018-05-08 10:29:51', NULL, 0);

-- --------------------------------------------------------

--
-- Table structure for table `usertokens`
--

CREATE TABLE `usertokens` (
  `id` int(11) NOT NULL,
  `token` varchar(255) DEFAULT NULL,
  `accountid` int(11) DEFAULT NULL,
  `expires` datetime DEFAULT NULL,
  `lastusedat` datetime DEFAULT NULL,
  `createdat` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updatedat` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `deletedat` timestamp NULL DEFAULT NULL,
  `isdeleted` tinyint(1) NOT NULL DEFAULT '0',
  `storeid` int(11) DEFAULT NULL,
  `locationid` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `usertokens`
--

INSERT INTO `usertokens` (`id`, `token`, `accountid`, `expires`, `lastusedat`, `createdat`, `updatedat`, `deletedat`, `isdeleted`, `storeid`, `locationid`) VALUES
(1, 'cbc7c891a15badf652de9a9c63109f65', 1, '2018-06-16 12:50:00', NULL, '2018-06-06 11:50:15', '2018-06-06 14:25:46', NULL, 0, NULL, NULL),
(2, 'e51a8396640e7fd7692a2e09650fdb06', 1, '2018-06-16 16:25:00', NULL, '2018-06-06 15:25:16', '2018-06-06 14:25:47', NULL, 0, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `user_roles`
--

CREATE TABLE `user_roles` (
  `id` int(11) NOT NULL,
  `roleName` varchar(30) CHARACTER SET latin1 DEFAULT NULL,
  `roleFor` varchar(30) CHARACTER SET latin1 DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `stationID` int(11) DEFAULT NULL,
  `createdat` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updatedat` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `deletedat` timestamp NULL DEFAULT NULL,
  `isdeleted` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user_roles`
--

INSERT INTO `user_roles` (`id`, `roleName`, `roleFor`, `status`, `stationID`, `createdat`, `updatedat`, `deletedat`, `isdeleted`) VALUES
(1, 'Super Admin', 'general', 1, 1, '2017-10-06 13:40:25', '2018-06-21 14:53:11', NULL, 0),
(2, 'Super Admin', 'ebs', 1, 1, '2017-10-06 13:40:25', '2018-06-02 02:48:47', NULL, 0),
(3, 'Admin', 'general', 1, 1, '2017-10-06 13:40:25', '2018-06-21 14:53:13', NULL, 0),
(4, 'User', 'general', 1, 1, '2017-10-06 13:40:25', '2018-06-21 14:53:16', NULL, 0);

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
-- Indexes for table `accounts_copy`
--
ALTER TABLE `accounts_copy`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `admin_users`
--
ALTER TABLE `admin_users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bannertype`
--
ALTER TABLE `bannertype`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jollofsitetypeid` (`jollofsitetypeid`);

--
-- Indexes for table `brands_tbl`
--
ALTER TABLE `brands_tbl`
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
-- Indexes for table `cg_biz_cuisine`
--
ALTER TABLE `cg_biz_cuisine`
  ADD PRIMARY KEY (`id`),
  ADD KEY `rest_id` (`biz_id`),
  ADD KEY `cuisine_id` (`cuisine_id`);

--
-- Indexes for table `cg_customer`
--
ALTER TABLE `cg_customer`
  ADD PRIMARY KEY (`id`,`email`),
  ADD KEY `email` (`email`),
  ADD KEY `activation_code` (`activation_code`);

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
  ADD KEY `orderlistdetails` (`orderlistdetailsid`);

--
-- Indexes for table `cuisine_merchant_cate_assign`
--
ALTER TABLE `cuisine_merchant_cate_assign`
  ADD PRIMARY KEY (`id`),
  ADD KEY `categoryid` (`cat_cusid`),
  ADD KEY `productid` (`restaurantid`);

--
-- Indexes for table `cuisine_merchant_cate_assign_copy`
--
ALTER TABLE `cuisine_merchant_cate_assign_copy`
  ADD PRIMARY KEY (`id`),
  ADD KEY `categoryid` (`cat_cusid`),
  ADD KEY `productid` (`restaurantid`);

--
-- Indexes for table `delivieringcharges_admin`
--
ALTER TABLE `delivieringcharges_admin`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cityid` (`cityid`);

--
-- Indexes for table `delivieringcharges_merchant`
--
ALTER TABLE `delivieringcharges_merchant`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cityid` (`cityid`),
  ADD KEY `restaurantid` (`restaurantid`);

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
  ADD KEY `bannertypeid` (`bannertypeid`),
  ADD KEY `promodurationid` (`promodurationid`);

--
-- Indexes for table `jollof_sitetype`
--
ALTER TABLE `jollof_sitetype`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orderlistdetails`
--
ALTER TABLE `orderlistdetails`
  ADD PRIMARY KEY (`id`),
  ADD KEY `orderlistdetails_ord_fk` (`orderid`),
  ADD KEY `orderlistdetails_prd_fk` (`productid`),
  ADD KEY `restaurantid` (`restaurantid`),
  ADD KEY `status` (`status`),
  ADD KEY `product_fashionid` (`product_fashionid`),
  ADD KEY `platformid` (`platformid`);

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
-- Indexes for table `paystackbanks`
--
ALTER TABLE `paystackbanks`
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
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `restaurantid` (`restaurantid`),
  ADD KEY `categoryid` (`categoryid`);

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
-- Indexes for table `product_qty_price_color`
--
ALTER TABLE `product_qty_price_color`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_qty_price_color_ibfk_prd` (`product_id`);

--
-- Indexes for table `product_qty_size`
--
ALTER TABLE `product_qty_size`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_qty_price_color_ibfk_prd` (`product_id`),
  ADD KEY `colorid` (`colorid`);

--
-- Indexes for table `promo_duration`
--
ALTER TABLE `promo_duration`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `promo_price`
--
ALTER TABLE `promo_price`
  ADD PRIMARY KEY (`id`),
  ADD KEY `bannertypeid` (`bannertypeid`),
  ADD KEY `promodurationid` (`promodurationid`);

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
-- Indexes for table `restaurants_copy`
--
ALTER TABLE `restaurants_copy`
  ADD PRIMARY KEY (`id`),
  ADD KEY `restaurants_ibfk_city` (`cityid`),
  ADD KEY `restaurants_ibfk_state` (`stateid`);

--
-- Indexes for table `returncustomers`
--
ALTER TABLE `returncustomers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `role_assignments`
--
ALTER TABLE `role_assignments`
  ADD PRIMARY KEY (`roleAssignmentID`),
  ADD KEY `roleID` (`roleID`),
  ADD KEY `moduleID` (`moduleID`),
  ADD KEY `jollofsitetypeid` (`jollofsitetypeid`);

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
  ADD PRIMARY KEY (`moduleID`),
  ADD KEY `jollofsitetypeid` (`jollofsitetypeid`);

--
-- Indexes for table `system_modules_copy`
--
ALTER TABLE `system_modules_copy`
  ADD PRIMARY KEY (`moduleID`);

--
-- Indexes for table `system_modules_new`
--
ALTER TABLE `system_modules_new`
  ADD PRIMARY KEY (`moduleID`),
  ADD KEY `jollofsitetypeid` (`jollofsitetypeid`);

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
-- Indexes for table `users_copy`
--
ALTER TABLE `users_copy`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `usertokens`
--
ALTER TABLE `usertokens`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_roles`
--
ALTER TABLE `user_roles`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `accountaddresses`
--
ALTER TABLE `accountaddresses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
--
-- AUTO_INCREMENT for table `accounts`
--
ALTER TABLE `accounts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=586;
--
-- AUTO_INCREMENT for table `accounts_copy`
--
ALTER TABLE `accounts_copy`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=572;
--
-- AUTO_INCREMENT for table `admin_users`
--
ALTER TABLE `admin_users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `bannertype`
--
ALTER TABLE `bannertype`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `brands_tbl`
--
ALTER TABLE `brands_tbl`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `categories_cusine`
--
ALTER TABLE `categories_cusine`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;
--
-- AUTO_INCREMENT for table `categories_fashion`
--
ALTER TABLE `categories_fashion`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;
--
-- AUTO_INCREMENT for table `cg_biz_cuisine`
--
ALTER TABLE `cg_biz_cuisine`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=578;
--
-- AUTO_INCREMENT for table `cg_customer`
--
ALTER TABLE `cg_customer`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=593;
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
-- AUTO_INCREMENT for table `cuisine_merchant_cate_assign_copy`
--
ALTER TABLE `cuisine_merchant_cate_assign_copy`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=649;
--
-- AUTO_INCREMENT for table `delivieringcharges_admin`
--
ALTER TABLE `delivieringcharges_admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `delivieringcharges_merchant`
--
ALTER TABLE `delivieringcharges_merchant`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `email_templates`
--
ALTER TABLE `email_templates`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `img_ads`
--
ALTER TABLE `img_ads`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=79;
--
-- AUTO_INCREMENT for table `jollof_sitetype`
--
ALTER TABLE `jollof_sitetype`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `orderlistdetails`
--
ALTER TABLE `orderlistdetails`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=79;
--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=75;
--
-- AUTO_INCREMENT for table `orderstatus`
--
ALTER TABLE `orderstatus`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `password_reset`
--
ALTER TABLE `password_reset`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;
--
-- AUTO_INCREMENT for table `paystackbanks`
--
ALTER TABLE `paystackbanks`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
--
-- AUTO_INCREMENT for table `price_locations`
--
ALTER TABLE `price_locations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `productimages`
--
ALTER TABLE `productimages`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=76;
--
-- AUTO_INCREMENT for table `productmerges`
--
ALTER TABLE `productmerges`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `products_cuisine`
--
ALTER TABLE `products_cuisine`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;
--
-- AUTO_INCREMENT for table `products_fashion`
--
ALTER TABLE `products_fashion`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `product_fashion_cate_assign`
--
ALTER TABLE `product_fashion_cate_assign`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;
--
-- AUTO_INCREMENT for table `product_qty_color_size`
--
ALTER TABLE `product_qty_color_size`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;
--
-- AUTO_INCREMENT for table `product_qty_price_color`
--
ALTER TABLE `product_qty_price_color`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `product_qty_size`
--
ALTER TABLE `product_qty_size`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `promo_duration`
--
ALTER TABLE `promo_duration`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `promo_price`
--
ALTER TABLE `promo_price`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
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
-- AUTO_INCREMENT for table `restaurants_copy`
--
ALTER TABLE `restaurants_copy`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=99;
--
-- AUTO_INCREMENT for table `returncustomers`
--
ALTER TABLE `returncustomers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `role_assignments`
--
ALTER TABLE `role_assignments`
  MODIFY `roleAssignmentID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=101;
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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=752;
--
-- AUTO_INCREMENT for table `system_audit`
--
ALTER TABLE `system_audit`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `system_modules`
--
ALTER TABLE `system_modules`
  MODIFY `moduleID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=101;
--
-- AUTO_INCREMENT for table `system_modules_copy`
--
ALTER TABLE `system_modules_copy`
  MODIFY `moduleID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;
--
-- AUTO_INCREMENT for table `system_modules_new`
--
ALTER TABLE `system_modules_new`
  MODIFY `moduleID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;
--
-- AUTO_INCREMENT for table `tablereservations`
--
ALTER TABLE `tablereservations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;
--
-- AUTO_INCREMENT for table `users_copy`
--
ALTER TABLE `users_copy`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=173;
--
-- AUTO_INCREMENT for table `usertokens`
--
ALTER TABLE `usertokens`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `user_roles`
--
ALTER TABLE `user_roles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `bannertype`
--
ALTER TABLE `bannertype`
  ADD CONSTRAINT `bannertype_ibfk_1` FOREIGN KEY (`jollofsitetypeid`) REFERENCES `jollof_sitetype` (`id`);

--
-- Constraints for table `categories`
--
ALTER TABLE `categories`
  ADD CONSTRAINT `categories_ibfk_1` FOREIGN KEY (`restaurantid`) REFERENCES `restaurants` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
