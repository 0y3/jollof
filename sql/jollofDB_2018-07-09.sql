# ************************************************************
# Sequel Pro SQL dump
# Version 4541
#
# http://www.sequelpro.com/
# https://github.com/sequelpro/sequelpro
#
# Host: 127.0.0.1 (MySQL 5.6.35)
# Database: jollofDB
# Generation Time: 2018-07-09 14:11:19 +0000
# ************************************************************


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


# Dump of table brands_tbl
# ------------------------------------------------------------

DROP TABLE IF EXISTS `brands_tbl`;

CREATE TABLE `brands_tbl` (
  `id` int(20) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET latin1 DEFAULT NULL,
  `logo` varchar(255) CHARACTER SET latin1 NOT NULL DEFAULT '',
  `status` tinyint(4) DEFAULT '1',
  `createdat` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updatedat` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `deletedat` timestamp NULL DEFAULT NULL,
  `isdeleted` tinyint(4) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `brands_tbl` WRITE;
/*!40000 ALTER TABLE `brands_tbl` DISABLE KEYS */;

INSERT INTO `brands_tbl` (`id`, `name`, `logo`, `status`, `createdat`, `updatedat`, `deletedat`, `isdeleted`)
VALUES
	(1,'Osvaldo Rossi','',1,'2018-07-09 10:38:24','2018-07-09 10:38:24',NULL,0),
	(2,'Prada','Prada.jpg',1,'2018-07-09 10:40:00','2018-07-09 10:40:13',NULL,0),
	(3,'LEMFO','LEMFO.png',1,'2018-07-09 10:42:07','2018-07-09 10:44:04',NULL,0),
	(4,'J-D\'s Fashion','',1,'2018-07-09 10:44:55','2018-07-09 10:44:55',NULL,0);

/*!40000 ALTER TABLE `brands_tbl` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table product_qty_color_size
# ------------------------------------------------------------

DROP TABLE IF EXISTS `product_qty_color_size`;

CREATE TABLE `product_qty_color_size` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
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
  `isdeleted` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `product_qty_price_color_ibfk_prd` (`productid`),
  KEY `colorid` (`colorid`),
  KEY `sizeid` (`sizeid`),
  CONSTRAINT `product_qty_color_size_ibfk_1` FOREIGN KEY (`productid`) REFERENCES `products_fashion` (`id`),
  CONSTRAINT `product_qty_color_size_ibfk_2` FOREIGN KEY (`colorid`) REFERENCES `color_tbl` (`id`),
  CONSTRAINT `product_qty_color_size_ibfk_3` FOREIGN KEY (`sizeid`) REFERENCES `size_tbl` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `product_qty_color_size` WRITE;
/*!40000 ALTER TABLE `product_qty_color_size` DISABLE KEYS */;

INSERT INTO `product_qty_color_size` (`id`, `productid`, `quantity`, `productinstock`, `productsold`, `sizeid`, `colorid`, `colorimagename`, `colorimage`, `price`, `discount_price`, `status`, `createdat`, `updatedat`, `deletedat`, `isdeleted`)
VALUES
	(1,1,20,20,8,9,2,'',NULL,20000,NULL,1,'2018-01-25 14:10:18','2018-07-09 10:25:04',NULL,0),
	(2,2,10,10,2,NULL,10,'',NULL,13200,1320,1,'2018-01-25 14:10:18','2018-07-09 10:25:08',NULL,0),
	(3,2,10,8,2,NULL,13,'',NULL,13500,1350,1,'2018-01-25 14:10:18','2018-07-09 10:25:28',NULL,0),
	(4,3,7,7,0,9,4,'','16_AligatorSkin1.png',37500,NULL,1,'2018-01-26 06:52:51','2018-07-09 10:25:34',NULL,0),
	(5,3,7,7,0,10,4,'','16_AligatorSkin1.png',37500,NULL,1,'2018-01-26 06:52:51','2018-06-19 15:40:40',NULL,0),
	(6,3,6,6,0,11,4,'','16_AligatorSkin1.png',37500,NULL,1,'2018-01-26 06:52:51','2018-06-19 15:40:42',NULL,0),
	(7,3,5,5,0,11,5,'','16_AligatorSkin1_Red.png',37500,NULL,1,'2018-01-26 06:52:51','2018-07-09 01:27:22',NULL,0),
	(8,3,10,10,0,10,5,'','16_AligatorSkin1_Red.png',37500,NULL,1,'2018-01-26 06:52:51','2018-06-19 15:36:24',NULL,0),
	(9,3,5,5,0,9,5,'','16_AligatorSkin1_Red.png',37500,NULL,1,'2018-01-26 06:52:51','2018-06-19 15:36:28',NULL,0),
	(14,5,20,21,19,NULL,2,'Black','16_151925994401.jpg',28470,NULL,1,'2018-02-22 01:39:43','2018-07-09 10:26:15',NULL,0),
	(15,5,20,11,9,NULL,3,'SILVER','16_151925995301.jpg',28479,NULL,1,'2018-02-22 01:39:43','2018-07-09 10:26:01',NULL,0),
	(16,6,10,30,0,5,14,'03-BROWN','16_151926473101.jpg',4500,400,1,'2018-02-22 02:59:20','2018-07-03 13:52:25',NULL,0),
	(17,6,10,10,0,4,14,'03-BROWN','16_151926473101.jpg',4500,NULL,1,'2018-02-22 02:59:20','2018-03-28 14:13:53',NULL,0),
	(18,6,10,10,0,3,14,'03-BROWN','16_151926473101.jpg',4500,NULL,1,'2018-02-22 02:59:20','2018-07-09 01:49:01',NULL,0),
	(19,6,10,10,0,2,14,'03-BROWN','16_151926473101.jpg',4500,NULL,1,'2018-02-22 02:59:20','2018-07-09 01:49:05',NULL,0),
	(20,6,10,10,0,5,1,'White','16_151926473601.jpg',4500,400,1,'2018-02-22 02:59:20','2018-06-19 11:24:14',NULL,0),
	(21,6,10,0,0,4,1,'White','16_151926473601.jpg',4500,NULL,1,'2018-02-22 02:59:20','2018-06-20 23:46:22',NULL,0),
	(22,6,10,0,0,3,1,'White','16_151926473601.jpg',4800,NULL,1,'2018-02-22 02:59:20','2018-06-20 23:46:20',NULL,0),
	(23,6,10,10,0,1,1,'White','16_151926473601.jpg',4500,NULL,1,'2018-02-22 02:59:20','2018-06-19 12:26:07',NULL,0),
	(24,7,10,100,40,NULL,1,'White','16_colorimg_152915869301.jpg',6000,300,1,'2018-06-16 15:19:41','2018-07-09 14:09:44',NULL,0);

/*!40000 ALTER TABLE `product_qty_color_size` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table products_fashion
# ------------------------------------------------------------

DROP TABLE IF EXISTS `products_fashion`;

CREATE TABLE `products_fashion` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `merchantid` int(11) NOT NULL,
  `slug` varchar(255) NOT NULL DEFAULT '',
  `productfrontimage` varchar(255) DEFAULT NULL,
  `productname` varchar(250) NOT NULL,
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
  `isdeleted` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `merchantid` (`merchantid`),
  CONSTRAINT `products_fashion_ibfk_1` FOREIGN KEY (`merchantid`) REFERENCES `restaurants` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `products_fashion` WRITE;
/*!40000 ALTER TABLE `products_fashion` DISABLE KEYS */;

INSERT INTO `products_fashion` (`id`, `merchantid`, `slug`, `productfrontimage`, `productname`, `productdesc`, `productbrandid`, `sales`, `discount_percentage`, `productsold`, `productinstock`, `productrate`, `othernote`, `status`, `createdat`, `updatedat`, `deletedat`, `isdeleted`)
VALUES
	(1,16,'prada-saffiano-brief-case-bag','','Prada Saffiano Brief Case Bag','Italian Saffiano Brief Case Leather black bag features double top handle, detachable purse and side purse, gold tone hardware and zipper, zipper top closure, two main open compartments, one middle compartment with zipper closure. Made in Italy..',2,1,NULL,8,0,0,'',1,'2018-01-25 14:02:30','2018-07-09 14:08:47',NULL,0),
	(2,16,'handheld-bag',NULL,'Handheld bag','',NULL,1,1,4,0,0,'',1,'2018-01-26 03:11:39','2018-07-09 14:09:05',NULL,0),
	(3,16,'osvaldo-rossi-snake-skin-shoe',NULL,'Osvaldo Rossi Snake Skin Shoe','Grey SNAKE SKIN Italian SHOE',1,1,NULL,0,0,0,'',1,'2018-01-26 06:44:22','2018-07-09 10:34:35',NULL,0),
	(5,16,'lemfo-lef2-android-51-smart-watch-phone-two-modes-mtk6580-quad-core-512mb-8gb-smartwatch-heart-rate-monitor','16_151925991356.jpg','LEMFO LEF2 Android 5.1 Smart Watch Phone Two Modes MTK6580 Quad Core 512MB+ 8GB Smartwatch Heart Rate Monitor','<ul>\r\n	<li>Brand Name:LEMFO</li>\r\n	<li>Function:Answer Call,Message Reminder,Heart Rate Tracker,Call Reminder,Calendar,Dial Call,Alarm Clock,Push Message,Passometer</li>\r\n	<li>APP Download Available:Yes</li>\r\n	<li>Band Detachable:No</li>\r\n	<li>Band Material:Silica Gel</li>\r\n	<li>Language:French,Japanese,Italian,Russian,Indonesian,Turkish,German,Arabic,Spanish,Polish,Portuguese,English,Korean</li>\r\n	<li>CPU Model:MTK6580</li>\r\n	<li>Style:Fashion</li>\r\n	<li>RAM:512mb</li>\r\n	<li>Multiple Dials:Yes</li>\r\n	<li>Application Age Group:Adult</li>\r\n	<li>Waterproof Grade:Life Waterproof</li>\r\n	<li>Compatibility:All Compatible</li>\r\n	<li>Screen Size:1.3 inch</li>\r\n	<li>Resolution:240*240 Pixel</li>\r\n	<li>Mechanism:No</li>\r\n	<li>Type:On Wrist</li>\r\n	<li>Battery Detachable:No</li>\r\n	<li>Battery Capacity:&gt;450mAh</li>\r\n	<li>CPU Manufacturer:Mediatek</li>\r\n	<li>Movement Type:Electronic</li>\r\n	<li>Screen Shape:Round</li>\r\n	<li>Case Material:Alloy</li>\r\n	<li>SIM Card Available:Yes</li>\r\n	<li>System:Android OS</li>\r\n	<li>ROM:8GB</li>\r\n	<li>GPS:Yes</li>\r\n	<li>Network Mode:3G</li>\r\n	<li>Rear Camera:2MP</li>\r\n</ul>\r\n',3,0,1,28,0,0,'',1,'2018-02-22 01:39:43','2018-07-09 14:09:16',NULL,0),
	(6,16,'miduo-brand-2017-hot-design-swimwear-sexy-bandage-bathing-suits-push-up-brazilian-bikini-digital-printing-women-bikinis',NULL,'MIDUO Brand 2017 Hot Design Swimwear Sexy Bandage Bathing Suits Push Up Brazilian Bikini Digital Printing Women Bikinis','<ul>\r\n	<li>Brand Name:miduo</li>\r\n	<li>Gender:Women</li>\r\n	<li>Waist:High Waist</li>\r\n	<li>Support Type:Wire Free</li>\r\n	<li>With Pad:No</li>\r\n	<li>Pattern Type:Solid,Print,Bordered</li>\r\n	<li>Model Number:80182001</li>\r\n	<li>Material:Polyester</li>\r\n	<li>Fit:Fits true to size, take your normal size</li>\r\n	<li>Item Type:Bikinis Set</li>\r\n	<li>Applicable Gender:Female</li>\r\n	<li>Whether The Steel Drag:With A Chest Pad Without Steel Care</li>\r\n	<li>Item No:80182001</li>\r\n	<li>Applicable Age:Adult</li>\r\n	<li>Fabric Name:Polyester</li>\r\n	<li>Weight:110 (G)</li>\r\n	<li>Size:S, M, L, XL</li>\r\n</ul>\r\n',NULL,0,1,0,0,0,'',1,'2018-02-22 02:59:20','2018-06-28 12:03:45',NULL,0),
	(7,16,'white-lace',NULL,'White lace','',4,1,NULL,40,0,0,'',1,'2018-06-16 15:19:41','2018-07-09 14:09:49',NULL,0);

/*!40000 ALTER TABLE `products_fashion` ENABLE KEYS */;
UNLOCK TABLES;



/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
