# ************************************************************
# Sequel Pro SQL dump
# Version 4541
#
# http://www.sequelpro.com/
# https://github.com/sequelpro/sequelpro
#
# Host: 127.0.0.1 (MySQL 5.6.35)
# Database: jollofDB
# Generation Time: 2017-10-09 09:39:53 +0000
# ************************************************************


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


# Dump of table accountaddresses
# ------------------------------------------------------------

DROP TABLE IF EXISTS `accountaddresses`;

CREATE TABLE `accountaddresses` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `accountid` int(255) NOT NULL,
  `address` text NOT NULL,
  `cityid` int(255) NOT NULL,
  `stateid` int(255) NOT NULL,
  `createdat` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updatedat` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `deletedat` timestamp NULL DEFAULT NULL,
  `isdeleted` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `account_addresses_ibfk_city` (`cityid`),
  KEY `account_addresses_ibfk_state` (`stateid`),
  KEY `account_addresses_ibfk_user` (`accountid`),
  CONSTRAINT `accountaddresses_ibfk_city` FOREIGN KEY (`cityid`) REFERENCES `state_cities` (`id`),
  CONSTRAINT `accountaddresses_ibfk_state` FOREIGN KEY (`stateid`) REFERENCES `states` (`id`),
  CONSTRAINT `accountaddresses_ibfk_user` FOREIGN KEY (`accountid`) REFERENCES `users` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



# Dump of table accounts
# ------------------------------------------------------------

DROP TABLE IF EXISTS `accounts`;

CREATE TABLE `accounts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `firstname` char(200) NOT NULL DEFAULT '',
  `lastname` char(200) DEFAULT NULL,
  `gender` char(11) DEFAULT NULL,
  `email` char(200) NOT NULL DEFAULT '',
  `password` char(200) NOT NULL DEFAULT '',
  `phone` char(200) DEFAULT NULL,
  `phone2` char(200) DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '0',
  `createdat` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updatedat` timestamp NULL DEFAULT NULL,
  `deletedat` timestamp NULL DEFAULT NULL,
  `isdeleted` tinyint(1) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `accounts` WRITE;
/*!40000 ALTER TABLE `accounts` DISABLE KEYS */;

INSERT INTO `accounts` (`id`, `firstname`, `lastname`, `gender`, `email`, `password`, `phone`, `phone2`, `status`, `createdat`, `updatedat`, `deletedat`, `isdeleted`)
VALUES
	(1,'Oye','Segun','male','oye@ebs.com','21232f297a57a5a743894a0e4a801fc3','',NULL,1,'2017-10-07 01:34:09',NULL,NULL,0);

/*!40000 ALTER TABLE `accounts` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table categories
# ------------------------------------------------------------

DROP TABLE IF EXISTS `categories`;

CREATE TABLE `categories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `restaurantid` int(11) NOT NULL,
  `categoryname` char(200) DEFAULT NULL,
  `categorystatus` tinyint(4) NOT NULL DEFAULT '1',
  `createdat` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updatedat` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deletedat` timestamp NULL DEFAULT NULL,
  `isdeleted` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `restaurantid` (`restaurantid`),
  CONSTRAINT `categories_ibfk_1` FOREIGN KEY (`restaurantid`) REFERENCES `restaurants` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `categories` WRITE;
/*!40000 ALTER TABLE `categories` DISABLE KEYS */;

INSERT INTO `categories` (`id`, `restaurantid`, `categoryname`, `categorystatus`, `createdat`, `updatedat`, `deletedat`, `isdeleted`)
VALUES
	(1,3,'Swallow',1,'2017-10-09 09:56:13','2017-10-09 09:56:13',NULL,0),
	(2,3,'Soups',1,'2017-10-09 09:56:13','2017-10-09 09:56:13',NULL,0),
	(3,3,'Drinks',1,'2017-10-09 09:57:45','2017-10-09 09:57:45',NULL,0),
	(4,3,'Meat',1,'2017-10-09 09:57:45','2017-10-09 09:57:45',NULL,0),
	(5,2,'Swallow',1,'2017-10-09 10:03:49','2017-10-09 10:03:49',NULL,0),
	(6,2,'Soup',1,'2017-10-09 10:03:49','2017-10-09 10:03:49',NULL,0),
	(7,2,'Add Ups',1,'2017-10-09 10:03:49','2017-10-09 10:03:49',NULL,0),
	(8,2,'Meat',1,'2017-10-09 10:03:49','2017-10-09 10:03:49',NULL,0),
	(9,2,'Fish',1,'2017-10-09 10:03:49','2017-10-09 10:03:49',NULL,0),
	(10,2,'Drinks',1,'2017-10-09 10:03:49','2017-10-09 10:03:49',NULL,0);

/*!40000 ALTER TABLE `categories` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table ci_sessions
# ------------------------------------------------------------

DROP TABLE IF EXISTS `ci_sessions`;

CREATE TABLE `ci_sessions` (
  `id` varchar(128) NOT NULL,
  `ip_address` varchar(45) NOT NULL,
  `timestamp` int(10) unsigned NOT NULL DEFAULT '0',
  `data` blob NOT NULL,
  KEY `ci_sessions_timestamp` (`timestamp`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `ci_sessions` WRITE;
/*!40000 ALTER TABLE `ci_sessions` DISABLE KEYS */;

INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`)
VALUES
	('f026e38d140aefda8c8a46dae8d65d1bfc9d442b','::1',1507499319,X'5F5F63695F6C6173745F726567656E65726174657C693A313530373439393331393B'),
	('9f411d1472cb00fe108753e74069dab845742d5a','::1',1507500022,X'5F5F63695F6C6173745F726567656E65726174657C693A313530373530303032323B'),
	('b5b865e3466cd2ecbaec04adf3365e9b5f14b341','::1',1507500959,X'5F5F63695F6C6173745F726567656E65726174657C693A313530373530303935393B'),
	('e765531a092d2baa75e077efb859e5f93f060546','::1',1507501323,X'5F5F63695F6C6173745F726567656E65726174657C693A313530373530313332333B'),
	('ea3deedda6ac31ccdbaf294851dfc54255dcffe3','::1',1507501656,X'5F5F63695F6C6173745F726567656E65726174657C693A313530373530313635363B'),
	('18a21886ec7652ccb05b7d9d1115e448d967da1a','::1',1507502043,X'5F5F63695F6C6173745F726567656E65726174657C693A313530373530323034333B'),
	('7d64a99879451dc7f07106fc6c9b290945e714e7','::1',1507502539,X'5F5F63695F6C6173745F726567656E65726174657C693A313530373530323533393B'),
	('7c74d36642082b6cdae879d28d212da931bc6385','::1',1507502857,X'5F5F63695F6C6173745F726567656E65726174657C693A313530373530323835373B'),
	('63e039ac9d589280ad47683663634320f4f6e7cc','::1',1507503168,X'5F5F63695F6C6173745F726567656E65726174657C693A313530373530333136383B'),
	('3277eea9c227503ee07a0f58cd7acfa013471aff','::1',1507503475,X'5F5F63695F6C6173745F726567656E65726174657C693A313530373530333437353B'),
	('a7d5744173cb4caf6ac1ba0514253ea6131de14d','::1',1507503951,X'5F5F63695F6C6173745F726567656E65726174657C693A313530373530333935313B'),
	('094fc2b4f6edd9788b0272de4856d62f5aec0f53','::1',1507504350,X'5F5F63695F6C6173745F726567656E65726174657C693A313530373530343335303B'),
	('65844aa819e55699b9d9c20fc8c8a98cd3a8ecb7','::1',1507504722,X'5F5F63695F6C6173745F726567656E65726174657C693A313530373530343732323B'),
	('10a8ee3bda380cf38bd345d54eaf5808cc8c99a4','::1',1507505100,X'5F5F63695F6C6173745F726567656E65726174657C693A313530373530353130303B'),
	('09e060b7aae136a877696f8f3a87f85777cf8707','::1',1507505424,X'5F5F63695F6C6173745F726567656E65726174657C693A313530373530353432343B'),
	('ee1e3d00aef0f9e6e41b43d5799d46687a212725','::1',1507505762,X'5F5F63695F6C6173745F726567656E65726174657C693A313530373530353736323B'),
	('56b08f9dbfdf33eabeb67c829e098f819bdaf037','::1',1507506120,X'5F5F63695F6C6173745F726567656E65726174657C693A313530373530363132303B'),
	('32707ba886df9d69f20e35259c10767d567834dc','::1',1507506446,X'5F5F63695F6C6173745F726567656E65726174657C693A313530373530363434363B'),
	('0a89300eff165c41d34de9926c9a8336aafec3e2','::1',1507506708,X'5F5F63695F6C6173745F726567656E65726174657C693A313530373530363434363B'),
	('58c128690d9ac70494e332c17a0186d2b299f894','::1',1507539280,X'5F5F63695F6C6173745F726567656E65726174657C693A313530373533393238303B');

/*!40000 ALTER TABLE `ci_sessions` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table orderlistdetails
# ------------------------------------------------------------

DROP TABLE IF EXISTS `orderlistdetails`;

CREATE TABLE `orderlistdetails` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `productid` int(11) DEFAULT NULL,
  `orderid` int(11) DEFAULT NULL,
  `quantity` int(200) DEFAULT NULL,
  `price` int(11) DEFAULT NULL,
  `createdat` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updatedat` timestamp NULL DEFAULT NULL,
  `deletedat` timestamp NULL DEFAULT NULL,
  `isdeleted` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `orderlistdetails_ord_fk` (`orderid`),
  KEY `orderlistdetails_prd_fk` (`productid`),
  CONSTRAINT `orderlistdetails_ord_fk` FOREIGN KEY (`orderid`) REFERENCES `orders` (`id`),
  CONSTRAINT `orderlistdetails_prd_fk` FOREIGN KEY (`productid`) REFERENCES `products` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



# Dump of table orders
# ------------------------------------------------------------

DROP TABLE IF EXISTS `orders`;

CREATE TABLE `orders` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `accountid` int(11) NOT NULL,
  `accountaddressid` int(11) NOT NULL,
  `totalordervalue` double NOT NULL,
  `orderstatusid` int(11) NOT NULL,
  `createdat` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updatedat` timestamp NULL DEFAULT NULL,
  `deletedat` timestamp NULL DEFAULT NULL,
  `isdeleted` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`) USING BTREE,
  KEY `orders_status_fk` (`orderstatusid`),
  KEY `orders_acc_fk` (`accountid`),
  CONSTRAINT `orders_acc_fk` FOREIGN KEY (`accountid`) REFERENCES `users` (`id`),
  CONSTRAINT `orders_status_fk` FOREIGN KEY (`orderstatusid`) REFERENCES `orderstatus` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



# Dump of table orderstatus
# ------------------------------------------------------------

DROP TABLE IF EXISTS `orderstatus`;

CREATE TABLE `orderstatus` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `orderstatus_desc` char(200) DEFAULT NULL,
  `createdat` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updatedat` timestamp NULL DEFAULT NULL,
  `deletedat` timestamp NULL DEFAULT NULL,
  `isdeleted` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



# Dump of table price_locations
# ------------------------------------------------------------

DROP TABLE IF EXISTS `price_locations`;

CREATE TABLE `price_locations` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `restaurantid` int(11) NOT NULL,
  `cityid` int(11) NOT NULL,
  `deliveryprice` double NOT NULL,
  `createdat` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updatedat` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `deletedat` timestamp NULL DEFAULT NULL,
  `isdeleted` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `price_location_ibfk_city` (`cityid`),
  KEY `restaurantid` (`restaurantid`),
  CONSTRAINT `price_locations_ibfk_1` FOREIGN KEY (`restaurantid`) REFERENCES `restaurants` (`id`),
  CONSTRAINT `price_locations_ibfk_city` FOREIGN KEY (`cityid`) REFERENCES `state_cities` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



# Dump of table product_qty_price_color
# ------------------------------------------------------------

DROP TABLE IF EXISTS `product_qty_price_color`;

CREATE TABLE `product_qty_price_color` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
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
  `isdeleted` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `product_qty_price_color_ibfk_prd` (`product_id`),
  CONSTRAINT `product_qty_price_color_ibfk_prd` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



# Dump of table productimages
# ------------------------------------------------------------

DROP TABLE IF EXISTS `productimages`;

CREATE TABLE `productimages` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `productid` int(255) NOT NULL,
  `imagename` text NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `createdat` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updatedat` timestamp NULL DEFAULT NULL,
  `deletedat` timestamp NULL DEFAULT NULL,
  `isdeleted` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `productimages_ibfk_prd` (`productid`),
  CONSTRAINT `productimages_ibfk_prd` FOREIGN KEY (`productid`) REFERENCES `products` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



# Dump of table products
# ------------------------------------------------------------

DROP TABLE IF EXISTS `products`;

CREATE TABLE `products` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `restaurantid` int(11) NOT NULL,
  `categoryid` int(11) NOT NULL,
  `productname` varchar(250) NOT NULL,
  `productprice` float NOT NULL,
  `productdesc` text NOT NULL,
  `productimage` varchar(250) NOT NULL,
  `canaddproduct` tinyint(4) NOT NULL DEFAULT '0',
  `status` tinyint(4) NOT NULL DEFAULT '1',
  `createdat` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updatedat` timestamp NULL DEFAULT NULL,
  `deletedat` timestamp NULL DEFAULT NULL,
  `isdeleted` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `restaurantid` (`restaurantid`),
  CONSTRAINT `products_ibfk_1` FOREIGN KEY (`restaurantid`) REFERENCES `restaurants` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `products` WRITE;
/*!40000 ALTER TABLE `products` DISABLE KEYS */;

INSERT INTO `products` (`id`, `restaurantid`, `categoryid`, `productname`, `productprice`, `productdesc`, `productimage`, `canaddproduct`, `status`, `createdat`, `updatedat`, `deletedat`, `isdeleted`)
VALUES
	(1,3,0,'Coconut Rice',400,'Rice','3_coconut_rice.jpg',0,1,'2017-10-09 09:50:35',NULL,NULL,0),
	(2,3,0,'Ewa-Riro',400,'Beans','3_ewa_riro.jpg',0,1,'2017-10-09 09:50:35',NULL,NULL,0),
	(3,3,3,'Water',100,'Cold Drinks','3_Get-Ice-Cold-Water-Go.jpg',1,1,'2017-10-09 10:25:29',NULL,NULL,0),
	(4,3,2,'Egusi',250,'','3_Egusi_soup.jpg',1,1,'2017-10-09 10:25:29',NULL,NULL,0),
	(5,3,1,'Pounded Yam',400,'','3_pounded_yam.jpg',0,1,'2017-10-09 10:34:59',NULL,NULL,0),
	(6,3,4,'Beef',250,'','',1,1,'2017-10-09 10:34:59',NULL,NULL,0);

/*!40000 ALTER TABLE `products` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table products_fashion
# ------------------------------------------------------------

DROP TABLE IF EXISTS `products_fashion`;

CREATE TABLE `products_fashion` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `restaurantid` int(11) NOT NULL,
  `categoryid` int(11) NOT NULL,
  `productname` varchar(250) NOT NULL,
  `productprice` float NOT NULL,
  `productdesc` mediumtext NOT NULL,
  `productimage` varchar(250) NOT NULL,
  `productgrand_unit_qty` int(255) NOT NULL,
  `productinstock` int(255) NOT NULL,
  `productrate` int(255) NOT NULL,
  `othernote` mediumtext NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1',
  `createdat` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updatedat` timestamp NULL DEFAULT NULL,
  `deletedat` timestamp NULL DEFAULT NULL,
  `isdeleted` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `products_fashion` WRITE;
/*!40000 ALTER TABLE `products_fashion` DISABLE KEYS */;

INSERT INTO `products_fashion` (`id`, `restaurantid`, `categoryid`, `productname`, `productprice`, `productdesc`, `productimage`, `productgrand_unit_qty`, `productinstock`, `productrate`, `othernote`, `status`, `createdat`, `updatedat`, `deletedat`, `isdeleted`)
VALUES
	(1,0,1,'ASUS Laptop 1500',799,'','asus-laptop.jpg',0,0,0,'',0,'2017-09-21 16:08:54','0000-00-00 00:00:00','0000-00-00 00:00:00',0),
	(2,0,1,'Microsoft Surface Pro 3',898,'','surface-pro.jpg',0,0,0,'',0,'2017-09-21 16:08:54','0000-00-00 00:00:00','0000-00-00 00:00:00',0),
	(3,0,1,'Samsung EVO 32GB',12,'','samsung-sd-card.jpg',0,0,0,'',0,'2017-09-21 16:08:54','0000-00-00 00:00:00','0000-00-00 00:00:00',0),
	(4,0,1,'Desktop Hard Drive',50,'','computer-hard-disk.jpg',0,0,0,'',0,'2017-09-21 16:08:54','0000-00-00 00:00:00','0000-00-00 00:00:00',0),
	(5,0,1,'External Hard Drive',80,'','external-hard-disk.jpg',0,0,0,'',0,'2017-09-21 16:08:54','0000-00-00 00:00:00','0000-00-00 00:00:00',0),
	(6,0,2,'Crock-Pot Oval Slow Cooker',34,'','crok-pot-cooker.jpg',0,0,0,'',0,'2017-09-21 16:08:54','0000-00-00 00:00:00','0000-00-00 00:00:00',0),
	(7,0,2,'Magic Blender System',80,'','blender.jpg',0,0,0,'',0,'2017-09-21 16:08:54','0000-00-00 00:00:00','0000-00-00 00:00:00',0),
	(8,0,2,'Cordless Hand Vacuum',40,'','vaccum-cleaner.jpg',0,0,0,'',0,'2017-09-21 16:08:54','0000-00-00 00:00:00','0000-00-00 00:00:00',0),
	(9,0,2,'Dishwasher Detergent',15,'','detergent-powder.jpg',0,0,0,'',0,'2017-09-21 16:08:54','0000-00-00 00:00:00','0000-00-00 00:00:00',0),
	(10,0,2,'Essential Oil Diffuser',20,'','unpower-difuser.jpg',0,0,0,'',0,'2017-09-21 16:08:54','0000-00-00 00:00:00','0000-00-00 00:00:00',0),
	(11,0,3,'Medical Personalized',11,'','hand-bag.jpg',0,0,0,'',0,'2017-09-21 16:08:54','0000-00-00 00:00:00','0000-00-00 00:00:00',0),
	(12,0,3,'Best Bridle Leather Belt',64,'','mens-belt.jpg',0,0,0,'',0,'2017-09-21 16:08:54','0000-00-00 00:00:00','0000-00-00 00:00:00',0),
	(13,0,3,'HANDMADE Bow set',24,'','pastal-colors.jpg',0,0,0,'',0,'2017-09-21 16:08:54','0000-00-00 00:00:00','0000-00-00 00:00:00',0),
	(14,0,3,'Ceramic Coffee Mug',18,'','coffee-mug.jpg',0,0,0,'',0,'2017-09-21 16:08:54','0000-00-00 00:00:00','0000-00-00 00:00:00',0),
	(15,0,3,'Wine Birthday Glass',18,'','wine-glass.jpg',0,0,0,'',0,'2017-09-21 16:08:54','0000-00-00 00:00:00','0000-00-00 00:00:00',0);

/*!40000 ALTER TABLE `products_fashion` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table restaurants
# ------------------------------------------------------------

DROP TABLE IF EXISTS `restaurants`;

CREATE TABLE `restaurants` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `companyname` varchar(200) NOT NULL,
  `companydesc` text NOT NULL,
  `parentid` int(11) NOT NULL DEFAULT '0',
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
  `pickup` tinyint(4) NOT NULL DEFAULT '0',
  `homedelivery` tinyint(4) NOT NULL DEFAULT '1',
  `status` tinyint(4) NOT NULL DEFAULT '1',
  `createdat` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updatedat` timestamp NULL DEFAULT NULL,
  `deletedat` timestamp NULL DEFAULT NULL,
  `isdeleted` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `restaurants_ibfk_city` (`cityid`),
  KEY `restaurants_ibfk_state` (`stateid`),
  CONSTRAINT `restaurants_ibfk_city` FOREIGN KEY (`cityid`) REFERENCES `state_cities` (`id`),
  CONSTRAINT `restaurants_ibfk_state` FOREIGN KEY (`stateid`) REFERENCES `states` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `restaurants` WRITE;
/*!40000 ALTER TABLE `restaurants` DISABLE KEYS */;

INSERT INTO `restaurants` (`id`, `companyname`, `companydesc`, `parentid`, `firstname`, `lastname`, `gender`, `email`, `pwd`, `phone`, `phone2`, `address`, `cityid`, `stateid`, `country`, `logo`, `pickup`, `homedelivery`, `status`, `createdat`, `updatedat`, `deletedat`, `isdeleted`)
VALUES
	(1,'Adega Express','MEDITERRANEAN, SANDWICHES,\r\n',0,'Adega','Express','male','adega@ebs.com','',NULL,NULL,'31 Fola Osibo Road',489,25,NULL,'res_11.jpeg',0,1,1,'2017-10-07 21:37:55',NULL,NULL,0),
	(2,'Better Option','SALADS AND FRUITS, SANDWICHES,',0,'Better','Option','male','better@ebs.com','','08000000000',NULL,'7 Ilu Drive',488,25,NULL,'res_3.png',0,1,1,'2017-10-07 21:37:55',NULL,NULL,0),
	(3,'Bukka Hat','Swallow,Finger etc foods',0,'Bukka','Hat','female','admin@bukkahat.com','',NULL,NULL,'Block 69A Plot 8 Admiralty Way',489,25,NULL,'LOGOB53757573.jpeg',0,1,1,'2017-10-07 21:59:00',NULL,NULL,0),
	(4,'CAFE JADE','BREAKFAST, BRITISH, BURGERS, CAFE, CREPE, GRILL & BBQ, NIGERIAN, SALADS AND FRUITS, SANDWICHES, SMALL CHOPS/FINGER FOODS',0,'cafe','jade','female','info@cafejade.com','',NULL,NULL,'1139 Bishop Oluwole Street,Victoria Island',488,25,NULL,'LOGOB41472901.jpeg',0,1,1,'2017-10-07 21:59:00',NULL,NULL,0),
	(5,'CAFE LICIOUS','AMERICAN, BURGERS, CAFE, JUICES, SANDWICHES,',0,'cafe','licious','male','info@cafelicious.com','',NULL,NULL,'60 Allen avenue',491,25,NULL,'LOGOB41371706.png',0,1,1,'2017-10-07 22:38:54',NULL,NULL,0),
	(6,'Dotimi (Mobile Pot of Soups)','Nigeria foods',0,'Dotun','dman','male','order@dotimi.com','',NULL,NULL,'40 B Ogudu Ojota Road, Ogudu GRA',491,25,NULL,'LOGOB32462705.png',0,1,1,'2017-10-07 22:38:54',NULL,NULL,0),
	(7,'Gits','BURGERS, CAKES, CONFECTIONERIES, CONTINENTAL, CREPE, PIZZA, SANDWICHES,',0,'gift','ik','female','get@gits.com','',NULL,NULL,'Emerald Shops, Opposite Unilag Main Gate, Akoka',495,25,NULL,'LOGOB45254629.jpeg',0,1,1,'2017-10-07 22:38:54',NULL,NULL,0),
	(8,'Mama Cass','CONFECTIONERIES, NIGERIAN,',0,'mama','cass','female','info@mamacass.com','',NULL,NULL,'4a, Oyeleke Street, Off Kudirat Abiola Way, Alausa',491,25,NULL,'LOGOB38190949.jpeg',0,1,1,'2017-10-07 22:38:54',NULL,NULL,0),
	(9,'Pizza House','Pizza',0,'Pizza','house','male','info@Pizzahouse.com','',NULL,NULL,'Adeniran Ogunsanya Shopping Mall, Inside the Food court (Shoprite)',500,25,NULL,'LOGOB45254629.png',0,1,1,'2017-10-07 22:38:54',NULL,NULL,0),
	(10,'Pizza House','Pizza',9,'Pizza','house','male','info@Pizzahouse.com','',NULL,NULL,'Ogudu GRA',491,25,NULL,'LOGOB45254629.png',0,1,1,'2017-10-07 22:38:54',NULL,NULL,0),
	(11,'Otanwa Kitchen','CHINESE, CONTINENTAL, NIGERIAN, SANDWICHES',0,'Otanwa','Kitchen','male','info@otanwakitchen.com','',NULL,NULL,'1,Ojileru street,Oworonshoki',495,25,NULL,'LOGOB13169509.png',0,1,1,'2017-10-07 22:38:54',NULL,NULL,0),
	(12,'Rhapsody\'s','CONTINENTAL, DESSERTS, GRILL & BBQ, PIZZA(STRICTLY FOR CORPORATE PARTIES AND TABLE RESERVATIONS)',0,'rhapsody','res','male','info@rhapsody.com','',NULL,NULL,'19A Agoro Odiyan, Victoria Island',488,25,NULL,'LOGOB32731810.png',0,1,1,'2017-10-07 22:53:14',NULL,NULL,0),
	(13,'Melting Moments','DESSERTS',0,'',NULL,'male','info@meltingmoments.com','',NULL,NULL,'',491,25,NULL,'LOGOB14691591.png',0,1,1,'2017-10-07 22:53:14',NULL,NULL,0),
	(14,'Mr Goodfood','Good food ',0,'John','Goodfood','female','order@mrgoodfood.com','',NULL,NULL,'128A,Association Way,Dolphin estate.Ikoyi',488,25,NULL,NULL,0,1,1,'2017-10-07 22:57:56',NULL,NULL,0),
	(15,'YIN YANG','Chinese Foods',0,'Yin','Yang','female','admin@yinyang.com','',NULL,NULL,'5, Admiralty Way, Lekki Phase 1',489,25,NULL,'LOGOB73902707.jpeg',0,1,1,'2017-10-07 22:57:56',NULL,NULL,0);

/*!40000 ALTER TABLE `restaurants` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table restaurantstime
# ------------------------------------------------------------

DROP TABLE IF EXISTS `restaurantstime`;

CREATE TABLE `restaurantstime` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `restaurantid` int(11) NOT NULL,
  `monopen` time NOT NULL,
  `monclose` time NOT NULL,
  `tueopen` time NOT NULL,
  `tueclose` time NOT NULL,
  `wedopen` time NOT NULL,
  `wedclose` time NOT NULL,
  `thuopen` time NOT NULL,
  `thuclose` time NOT NULL,
  `friopen` time NOT NULL,
  `friclose` time NOT NULL,
  `satopen` time NOT NULL,
  `satclose` time NOT NULL,
  `sunopen` time NOT NULL,
  `sunclose` time NOT NULL,
  PRIMARY KEY (`id`),
  KEY `restaurantid` (`restaurantid`),
  CONSTRAINT `restaurantstime_ibfk_1` FOREIGN KEY (`restaurantid`) REFERENCES `restaurants` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `restaurantstime` WRITE;
/*!40000 ALTER TABLE `restaurantstime` DISABLE KEYS */;

INSERT INTO `restaurantstime` (`id`, `restaurantid`, `monopen`, `monclose`, `tueopen`, `tueclose`, `wedopen`, `wedclose`, `thuopen`, `thuclose`, `friopen`, `friclose`, `satopen`, `satclose`, `sunopen`, `sunclose`)
VALUES
	(4,1,'09:00:00','18:00:00','09:00:00','18:00:00','09:00:00','18:00:00','09:00:00','18:00:00','09:00:00','18:00:00','09:00:00','16:30:00','09:00:00','16:30:00'),
	(5,2,'09:00:00','18:00:00','09:00:00','18:00:00','09:00:00','18:00:00','09:00:00','18:00:00','09:00:00','18:00:00','09:00:00','16:30:00','09:00:00','16:30:00'),
	(6,3,'09:00:00','18:00:00','09:00:00','18:00:00','09:00:00','18:00:00','09:00:00','18:00:00','09:00:00','18:00:00','09:00:00','16:30:00','09:00:00','16:30:00'),
	(7,4,'09:00:00','18:00:00','09:00:00','18:00:00','09:00:00','18:00:00','09:00:00','18:00:00','09:00:00','18:00:00','09:00:00','16:30:00','09:00:00','16:30:00'),
	(8,5,'09:00:00','18:00:00','09:00:00','18:00:00','09:00:00','18:00:00','09:00:00','18:00:00','09:00:00','18:00:00','09:00:00','16:30:00','09:00:00','16:30:00'),
	(9,6,'09:00:00','18:00:00','09:00:00','18:00:00','09:00:00','18:00:00','09:00:00','18:00:00','09:00:00','18:00:00','09:00:00','16:30:00','09:00:00','16:30:00'),
	(10,7,'09:00:00','18:00:00','09:00:00','18:00:00','09:00:00','18:00:00','09:00:00','18:00:00','09:00:00','18:00:00','09:00:00','16:30:00','09:00:00','16:30:00'),
	(11,8,'09:00:00','18:00:00','09:00:00','18:00:00','09:00:00','18:00:00','09:00:00','18:00:00','09:00:00','18:00:00','09:00:00','16:30:00','09:00:00','16:30:00'),
	(12,9,'09:00:00','18:00:00','09:00:00','18:00:00','09:00:00','18:00:00','09:00:00','18:00:00','09:00:00','18:00:00','09:00:00','16:30:00','09:00:00','16:30:00');

/*!40000 ALTER TABLE `restaurantstime` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table role_assignments
# ------------------------------------------------------------

DROP TABLE IF EXISTS `role_assignments`;

CREATE TABLE `role_assignments` (
  `roleAssignmentID` int(11) NOT NULL AUTO_INCREMENT,
  `roleID` int(11) DEFAULT NULL,
  `moduleID` int(11) DEFAULT NULL,
  PRIMARY KEY (`roleAssignmentID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `role_assignments` WRITE;
/*!40000 ALTER TABLE `role_assignments` DISABLE KEYS */;

INSERT INTO `role_assignments` (`roleAssignmentID`, `roleID`, `moduleID`)
VALUES
	(1,1,2),
	(2,1,1),
	(3,1,3),
	(4,1,4),
	(5,1,5),
	(6,1,6),
	(7,1,7),
	(8,1,8),
	(9,1,9),
	(10,1,10),
	(11,1,11),
	(12,1,12),
	(13,1,13),
	(14,1,14),
	(15,1,15),
	(16,1,16),
	(17,1,17),
	(18,1,18),
	(19,1,19),
	(20,1,20),
	(21,1,21),
	(22,1,22),
	(23,1,23),
	(24,1,24),
	(25,1,25),
	(26,1,26),
	(27,1,27),
	(28,1,28),
	(29,1,29),
	(30,1,30),
	(31,1,31),
	(32,1,32),
	(33,1,33),
	(34,1,34),
	(35,1,35),
	(36,1,36),
	(37,1,37),
	(38,1,38);

/*!40000 ALTER TABLE `role_assignments` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table state_cities
# ------------------------------------------------------------

DROP TABLE IF EXISTS `state_cities`;

CREATE TABLE `state_cities` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cityname` varchar(100) NOT NULL,
  `stateid` int(11) NOT NULL,
  `createdat` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updatedat` timestamp NULL DEFAULT NULL,
  `deletedat` timestamp NULL DEFAULT NULL,
  `isdeleted` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `state_cities_ibfk_state` (`stateid`),
  CONSTRAINT `state_cities_ibfk_state` FOREIGN KEY (`stateid`) REFERENCES `states` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `state_cities` WRITE;
/*!40000 ALTER TABLE `state_cities` DISABLE KEYS */;

INSERT INTO `state_cities` (`id`, `cityname`, `stateid`, `createdat`, `updatedat`, `deletedat`, `isdeleted`)
VALUES
	(1,'Aba South',1,'2017-10-06 10:45:59',NULL,'0000-00-00 00:00:00',0),
	(2,'Arochukwu',1,'2017-10-06 10:45:59',NULL,'0000-00-00 00:00:00',0),
	(3,'Bende',1,'2017-10-06 10:45:59',NULL,'0000-00-00 00:00:00',0),
	(4,'Ikwuano',1,'2017-10-06 10:45:59',NULL,'0000-00-00 00:00:00',0),
	(5,'Isiala Ngwa North',1,'2017-10-06 10:45:59',NULL,'0000-00-00 00:00:00',0),
	(6,'Isiala Ngwa South',1,'2017-10-06 10:45:59',NULL,'0000-00-00 00:00:00',0),
	(7,'Isuikwuato',1,'2017-10-06 10:45:59',NULL,'0000-00-00 00:00:00',0),
	(8,'Obi Ngwa',1,'2017-10-06 10:45:59',NULL,'0000-00-00 00:00:00',0),
	(9,'Ohafia',1,'2017-10-06 10:45:59',NULL,'0000-00-00 00:00:00',0),
	(10,'Osisioma',1,'2017-10-06 10:45:59',NULL,'0000-00-00 00:00:00',0),
	(11,'Ugwunagbo',1,'2017-10-06 10:45:59',NULL,'0000-00-00 00:00:00',0),
	(12,'Ukwa East',1,'2017-10-06 10:45:59',NULL,'0000-00-00 00:00:00',0),
	(13,'Ukwa West',1,'2017-10-06 10:45:59',NULL,'0000-00-00 00:00:00',0),
	(14,'Umuahia North',1,'2017-10-06 10:45:59',NULL,'0000-00-00 00:00:00',0),
	(15,'Umuahia South',1,'2017-10-06 10:45:59',NULL,'0000-00-00 00:00:00',0),
	(16,'Umu Nneochi',1,'2017-10-06 10:45:59',NULL,'0000-00-00 00:00:00',0),
	(17,'Fufure',2,'2017-10-06 10:45:59',NULL,'0000-00-00 00:00:00',0),
	(18,'Ganye',2,'2017-10-06 10:45:59',NULL,'0000-00-00 00:00:00',0),
	(19,'Gayuk',2,'2017-10-06 10:45:59',NULL,'0000-00-00 00:00:00',0),
	(20,'Gombi',2,'2017-10-06 10:45:59',NULL,'0000-00-00 00:00:00',0),
	(21,'Grie',2,'2017-10-06 10:45:59',NULL,'0000-00-00 00:00:00',0),
	(22,'Hong',2,'2017-10-06 10:45:59',NULL,'0000-00-00 00:00:00',0),
	(23,'Jada',2,'2017-10-06 10:45:59',NULL,'0000-00-00 00:00:00',0),
	(24,'Lamurde',2,'2017-10-06 10:45:59',NULL,'0000-00-00 00:00:00',0),
	(25,'Madagali',2,'2017-10-06 10:45:59',NULL,'0000-00-00 00:00:00',0),
	(26,'Maiha',2,'2017-10-06 10:45:59',NULL,'0000-00-00 00:00:00',0),
	(27,'Mayo Belwa',2,'2017-10-06 10:45:59',NULL,'0000-00-00 00:00:00',0),
	(28,'Michika',2,'2017-10-06 10:45:59',NULL,'0000-00-00 00:00:00',0),
	(29,'Mubi North',2,'2017-10-06 10:45:59',NULL,'0000-00-00 00:00:00',0),
	(30,'Mubi South',2,'2017-10-06 10:45:59',NULL,'0000-00-00 00:00:00',0),
	(31,'Numan',2,'2017-10-06 10:45:59',NULL,'0000-00-00 00:00:00',0),
	(32,'Shelleng',2,'2017-10-06 10:45:59',NULL,'0000-00-00 00:00:00',0),
	(33,'Song',2,'2017-10-06 10:45:59',NULL,'0000-00-00 00:00:00',0),
	(34,'Toungo',2,'2017-10-06 10:45:59',NULL,'0000-00-00 00:00:00',0),
	(35,'Yola North',2,'2017-10-06 10:45:59',NULL,'0000-00-00 00:00:00',0),
	(36,'Yola South',2,'2017-10-06 10:45:59',NULL,'0000-00-00 00:00:00',0),
	(37,'Eastern Obolo',3,'2017-10-06 10:45:59',NULL,'0000-00-00 00:00:00',0),
	(38,'Eket',3,'2017-10-06 10:45:59',NULL,'0000-00-00 00:00:00',0),
	(39,'Esit Eket',3,'2017-10-06 10:45:59',NULL,'0000-00-00 00:00:00',0),
	(40,'Essien Udim',3,'2017-10-06 10:45:59',NULL,'0000-00-00 00:00:00',0),
	(41,'Etim Ekpo',3,'2017-10-06 10:45:59',NULL,'0000-00-00 00:00:00',0),
	(42,'Etinan',3,'2017-10-06 10:45:59',NULL,'0000-00-00 00:00:00',0),
	(43,'Ibeno',3,'2017-10-06 10:45:59',NULL,'0000-00-00 00:00:00',0),
	(44,'Ibesikpo Asutan',3,'2017-10-06 10:45:59',NULL,'0000-00-00 00:00:00',0),
	(45,'Ibiono-Ibom',3,'2017-10-06 10:45:59',NULL,'0000-00-00 00:00:00',0),
	(46,'Ika',3,'2017-10-06 10:45:59',NULL,'0000-00-00 00:00:00',0),
	(47,'Ikono',3,'2017-10-06 10:45:59',NULL,'0000-00-00 00:00:00',0),
	(48,'Ikot Abasi',3,'2017-10-06 10:45:59',NULL,'0000-00-00 00:00:00',0),
	(49,'Ikot Ekpene',3,'2017-10-06 10:45:59',NULL,'0000-00-00 00:00:00',0),
	(50,'Ini',3,'2017-10-06 10:45:59',NULL,'0000-00-00 00:00:00',0),
	(51,'Itu',3,'2017-10-06 10:45:59',NULL,'0000-00-00 00:00:00',0),
	(52,'Mbo',3,'2017-10-06 10:45:59',NULL,'0000-00-00 00:00:00',0),
	(53,'Mkpat-Enin',3,'2017-10-06 10:45:59',NULL,'0000-00-00 00:00:00',0),
	(54,'Nsit-Atai',3,'2017-10-06 10:45:59',NULL,'0000-00-00 00:00:00',0),
	(55,'Nsit-Ibom',3,'2017-10-06 10:45:59',NULL,'0000-00-00 00:00:00',0),
	(56,'Nsit-Ubium',3,'2017-10-06 10:45:59',NULL,'0000-00-00 00:00:00',0),
	(57,'Obot Akara',3,'2017-10-06 10:45:59',NULL,'0000-00-00 00:00:00',0),
	(58,'Okobo',3,'2017-10-06 10:45:59',NULL,'0000-00-00 00:00:00',0),
	(59,'Onna',3,'2017-10-06 10:45:59',NULL,'0000-00-00 00:00:00',0),
	(60,'Oron',3,'2017-10-06 10:45:59',NULL,'0000-00-00 00:00:00',0),
	(61,'Oruk Anam',3,'2017-10-06 10:45:59',NULL,'0000-00-00 00:00:00',0),
	(62,'Udung-Uko',3,'2017-10-06 10:45:59',NULL,'0000-00-00 00:00:00',0),
	(63,'Ukanafun',3,'2017-10-06 10:45:59',NULL,'0000-00-00 00:00:00',0),
	(64,'Uruan',3,'2017-10-06 10:45:59',NULL,'0000-00-00 00:00:00',0),
	(65,'Urue-Offong/Oruko',3,'2017-10-06 10:45:59',NULL,'0000-00-00 00:00:00',0),
	(66,'Uyo',3,'2017-10-06 10:45:59',NULL,'0000-00-00 00:00:00',0),
	(67,'Anambra East',4,'2017-10-06 10:45:59',NULL,'0000-00-00 00:00:00',0),
	(68,'Anambra West',4,'2017-10-06 10:45:59',NULL,'0000-00-00 00:00:00',0),
	(69,'Anaocha',4,'2017-10-06 10:45:59',NULL,'0000-00-00 00:00:00',0),
	(70,'Awka North',4,'2017-10-06 10:45:59',NULL,'0000-00-00 00:00:00',0),
	(71,'Awka South',4,'2017-10-06 10:45:59',NULL,'0000-00-00 00:00:00',0),
	(72,'Ayamelum',4,'2017-10-06 10:45:59',NULL,'0000-00-00 00:00:00',0),
	(73,'Dunukofia',4,'2017-10-06 10:45:59',NULL,'0000-00-00 00:00:00',0),
	(74,'Ekwusigo',4,'2017-10-06 10:45:59',NULL,'0000-00-00 00:00:00',0),
	(75,'Idemili North',4,'2017-10-06 10:45:59',NULL,'0000-00-00 00:00:00',0),
	(76,'Idemili South',4,'2017-10-06 10:45:59',NULL,'0000-00-00 00:00:00',0),
	(77,'Ihiala',4,'2017-10-06 10:45:59',NULL,'0000-00-00 00:00:00',0),
	(78,'Njikoka',4,'2017-10-06 10:45:59',NULL,'0000-00-00 00:00:00',0),
	(79,'Nnewi North',4,'2017-10-06 10:45:59',NULL,'0000-00-00 00:00:00',0),
	(80,'Nnewi South',4,'2017-10-06 10:45:59',NULL,'0000-00-00 00:00:00',0),
	(81,'Ogbaru',4,'2017-10-06 10:45:59',NULL,'0000-00-00 00:00:00',0),
	(82,'Onitsha North',4,'2017-10-06 10:45:59',NULL,'0000-00-00 00:00:00',0),
	(83,'Onitsha South',4,'2017-10-06 10:45:59',NULL,'0000-00-00 00:00:00',0),
	(84,'Orumba North',4,'2017-10-06 10:45:59',NULL,'0000-00-00 00:00:00',0),
	(85,'Orumba South',4,'2017-10-06 10:45:59',NULL,'0000-00-00 00:00:00',0),
	(86,'Oyi',4,'2017-10-06 10:45:59',NULL,'0000-00-00 00:00:00',0),
	(87,'Bauchi',5,'2017-10-06 10:45:59',NULL,'0000-00-00 00:00:00',0),
	(88,'Bogoro',5,'2017-10-06 10:45:59',NULL,'0000-00-00 00:00:00',0),
	(89,'Damban',5,'2017-10-06 10:45:59',NULL,'0000-00-00 00:00:00',0),
	(90,'Darazo',5,'2017-10-06 10:45:59',NULL,'0000-00-00 00:00:00',0),
	(91,'Dass',5,'2017-10-06 10:45:59',NULL,'0000-00-00 00:00:00',0),
	(92,'Gamawa',5,'2017-10-06 10:45:59',NULL,'0000-00-00 00:00:00',0),
	(93,'Ganjuwa',5,'2017-10-06 10:45:59',NULL,'0000-00-00 00:00:00',0),
	(94,'Giade',5,'2017-10-06 10:45:59',NULL,'0000-00-00 00:00:00',0),
	(95,'Itas/Gadau',5,'2017-10-06 10:45:59',NULL,'0000-00-00 00:00:00',0),
	(96,'Jama\'are',5,'2017-10-06 10:45:59',NULL,'0000-00-00 00:00:00',0),
	(97,'Katagum',5,'2017-10-06 10:45:59',NULL,'0000-00-00 00:00:00',0),
	(98,'Kirfi',5,'2017-10-06 10:45:59',NULL,'0000-00-00 00:00:00',0),
	(99,'Misau',5,'2017-10-06 10:45:59',NULL,'0000-00-00 00:00:00',0),
	(100,'Ningi',5,'2017-10-06 10:45:59',NULL,'0000-00-00 00:00:00',0),
	(101,'Shira',5,'2017-10-06 10:45:59',NULL,'0000-00-00 00:00:00',0),
	(102,'Tafawa Balewa',5,'2017-10-06 10:45:59',NULL,'0000-00-00 00:00:00',0),
	(103,'Toro',5,'2017-10-06 10:45:59',NULL,'0000-00-00 00:00:00',0),
	(104,'Warji',5,'2017-10-06 10:45:59',NULL,'0000-00-00 00:00:00',0),
	(105,'Zaki',5,'2017-10-06 10:45:59',NULL,'0000-00-00 00:00:00',0),
	(106,'Ekeremor',6,'2017-10-06 10:45:59',NULL,'0000-00-00 00:00:00',0),
	(107,'Kolokuma/Opokuma',6,'2017-10-06 10:45:59',NULL,'0000-00-00 00:00:00',0),
	(108,'Nembe',6,'2017-10-06 10:45:59',NULL,'0000-00-00 00:00:00',0),
	(109,'Ogbia',6,'2017-10-06 10:45:59',NULL,'0000-00-00 00:00:00',0),
	(110,'Sagbama',6,'2017-10-06 10:45:59',NULL,'0000-00-00 00:00:00',0),
	(111,'Southern Ijaw',6,'2017-10-06 10:45:59',NULL,'0000-00-00 00:00:00',0),
	(112,'Yenagoa',6,'2017-10-06 10:45:59',NULL,'0000-00-00 00:00:00',0),
	(113,'Apa',7,'2017-10-06 10:45:59',NULL,'0000-00-00 00:00:00',0),
	(114,'Ado',7,'2017-10-06 10:45:59',NULL,'0000-00-00 00:00:00',0),
	(115,'Buruku',7,'2017-10-06 10:45:59',NULL,'0000-00-00 00:00:00',0),
	(116,'Gboko',7,'2017-10-06 10:45:59',NULL,'0000-00-00 00:00:00',0),
	(117,'Guma',7,'2017-10-06 10:45:59',NULL,'0000-00-00 00:00:00',0),
	(118,'Gwer East',7,'2017-10-06 10:45:59',NULL,'0000-00-00 00:00:00',0),
	(119,'Gwer West',7,'2017-10-06 10:45:59',NULL,'0000-00-00 00:00:00',0),
	(120,'Katsina-Ala',7,'2017-10-06 10:45:59',NULL,'0000-00-00 00:00:00',0),
	(121,'Konshisha',7,'2017-10-06 10:45:59',NULL,'0000-00-00 00:00:00',0),
	(122,'Kwande',7,'2017-10-06 10:45:59',NULL,'0000-00-00 00:00:00',0),
	(123,'Logo',7,'2017-10-06 10:45:59',NULL,'0000-00-00 00:00:00',0),
	(124,'Makurdi',7,'2017-10-06 10:45:59',NULL,'0000-00-00 00:00:00',0),
	(125,'Obi',7,'2017-10-06 10:45:59',NULL,'0000-00-00 00:00:00',0),
	(126,'Ogbadibo',7,'2017-10-06 10:45:59',NULL,'0000-00-00 00:00:00',0),
	(127,'Ohimini',7,'2017-10-06 10:45:59',NULL,'0000-00-00 00:00:00',0),
	(128,'Oju',7,'2017-10-06 10:45:59',NULL,'0000-00-00 00:00:00',0),
	(129,'Okpokwu',7,'2017-10-06 10:45:59',NULL,'0000-00-00 00:00:00',0),
	(130,'Oturkpo',7,'2017-10-06 10:45:59',NULL,'0000-00-00 00:00:00',0),
	(131,'Tarka',7,'2017-10-06 10:45:59',NULL,'0000-00-00 00:00:00',0),
	(132,'Ukum',7,'2017-10-06 10:45:59',NULL,'0000-00-00 00:00:00',0),
	(133,'Ushongo',7,'2017-10-06 10:45:59',NULL,'0000-00-00 00:00:00',0),
	(134,'Vandeikya',7,'2017-10-06 10:45:59',NULL,'0000-00-00 00:00:00',0),
	(135,'Askira/Uba',8,'2017-10-06 10:45:59',NULL,'0000-00-00 00:00:00',0),
	(136,'Bama',8,'2017-10-06 10:45:59',NULL,'0000-00-00 00:00:00',0),
	(137,'Bayo',8,'2017-10-06 10:45:59',NULL,'0000-00-00 00:00:00',0),
	(138,'Biu',8,'2017-10-06 10:45:59',NULL,'0000-00-00 00:00:00',0),
	(139,'Chibok',8,'2017-10-06 10:45:59',NULL,'0000-00-00 00:00:00',0),
	(140,'Damboa',8,'2017-10-06 10:45:59',NULL,'0000-00-00 00:00:00',0),
	(141,'Dikwa',8,'2017-10-06 10:45:59',NULL,'0000-00-00 00:00:00',0),
	(142,'Gubio',8,'2017-10-06 10:45:59',NULL,'0000-00-00 00:00:00',0),
	(143,'Guzamala',8,'2017-10-06 10:45:59',NULL,'0000-00-00 00:00:00',0),
	(144,'Gwoza',8,'2017-10-06 10:45:59',NULL,'0000-00-00 00:00:00',0),
	(145,'Hawul',8,'2017-10-06 10:45:59',NULL,'0000-00-00 00:00:00',0),
	(146,'Jere',8,'2017-10-06 10:45:59',NULL,'0000-00-00 00:00:00',0),
	(147,'Kaga',8,'2017-10-06 10:45:59',NULL,'0000-00-00 00:00:00',0),
	(148,'Kala/Balge',8,'2017-10-06 10:45:59',NULL,'0000-00-00 00:00:00',0),
	(149,'Konduga',8,'2017-10-06 10:45:59',NULL,'0000-00-00 00:00:00',0),
	(150,'Kukawa',8,'2017-10-06 10:45:59',NULL,'0000-00-00 00:00:00',0),
	(151,'Kwaya Kusar',8,'2017-10-06 10:45:59',NULL,'0000-00-00 00:00:00',0),
	(152,'Mafa',8,'2017-10-06 10:45:59',NULL,'0000-00-00 00:00:00',0),
	(153,'Magumeri',8,'2017-10-06 10:45:59',NULL,'0000-00-00 00:00:00',0),
	(154,'Maiduguri',8,'2017-10-06 10:45:59',NULL,'0000-00-00 00:00:00',0),
	(155,'Marte',8,'2017-10-06 10:45:59',NULL,'0000-00-00 00:00:00',0),
	(156,'Mobbar',8,'2017-10-06 10:45:59',NULL,'0000-00-00 00:00:00',0),
	(157,'Monguno',8,'2017-10-06 10:45:59',NULL,'0000-00-00 00:00:00',0),
	(158,'Ngala',8,'2017-10-06 10:45:59',NULL,'0000-00-00 00:00:00',0),
	(159,'Nganzai',8,'2017-10-06 10:45:59',NULL,'0000-00-00 00:00:00',0),
	(160,'Shani',8,'2017-10-06 10:45:59',NULL,'0000-00-00 00:00:00',0),
	(161,'Akamkpa',9,'2017-10-06 10:45:59',NULL,'0000-00-00 00:00:00',0),
	(162,'Akpabuyo',9,'2017-10-06 10:45:59',NULL,'0000-00-00 00:00:00',0),
	(163,'Bakassi',9,'2017-10-06 10:45:59',NULL,'0000-00-00 00:00:00',0),
	(164,'Bekwarra',9,'2017-10-06 10:45:59',NULL,'0000-00-00 00:00:00',0),
	(165,'Biase',9,'2017-10-06 10:45:59',NULL,'0000-00-00 00:00:00',0),
	(166,'Boki',9,'2017-10-06 10:45:59',NULL,'0000-00-00 00:00:00',0),
	(167,'Calabar Municipal',9,'2017-10-06 10:45:59',NULL,'0000-00-00 00:00:00',0),
	(168,'Calabar South',9,'2017-10-06 10:45:59',NULL,'0000-00-00 00:00:00',0),
	(169,'Etung',9,'2017-10-06 10:45:59',NULL,'0000-00-00 00:00:00',0),
	(170,'Ikom',9,'2017-10-06 10:45:59',NULL,'0000-00-00 00:00:00',0),
	(171,'Obanliku',9,'2017-10-06 10:45:59',NULL,'0000-00-00 00:00:00',0),
	(172,'Obubra',9,'2017-10-06 10:45:59',NULL,'0000-00-00 00:00:00',0),
	(173,'Obudu',9,'2017-10-06 10:45:59',NULL,'0000-00-00 00:00:00',0),
	(174,'Odukpani',9,'2017-10-06 10:45:59',NULL,'0000-00-00 00:00:00',0),
	(175,'Ogoja',9,'2017-10-06 10:45:59',NULL,'0000-00-00 00:00:00',0),
	(176,'Yakuur',9,'2017-10-06 10:45:59',NULL,'0000-00-00 00:00:00',0),
	(177,'Yala',9,'2017-10-06 10:45:59',NULL,'0000-00-00 00:00:00',0),
	(178,'Aniocha South',10,'2017-10-06 10:45:59',NULL,'0000-00-00 00:00:00',0),
	(179,'Bomadi',10,'2017-10-06 10:45:59',NULL,'0000-00-00 00:00:00',0),
	(180,'Burutu',10,'2017-10-06 10:45:59',NULL,'0000-00-00 00:00:00',0),
	(181,'Ethiope East',10,'2017-10-06 10:45:59',NULL,'0000-00-00 00:00:00',0),
	(182,'Ethiope West',10,'2017-10-06 10:45:59',NULL,'0000-00-00 00:00:00',0),
	(183,'Ika North East',10,'2017-10-06 10:45:59',NULL,'0000-00-00 00:00:00',0),
	(184,'Ika South',10,'2017-10-06 10:45:59',NULL,'0000-00-00 00:00:00',0),
	(185,'Isoko North',10,'2017-10-06 10:45:59',NULL,'0000-00-00 00:00:00',0),
	(186,'Isoko South',10,'2017-10-06 10:45:59',NULL,'0000-00-00 00:00:00',0),
	(187,'Ndokwa East',10,'2017-10-06 10:45:59',NULL,'0000-00-00 00:00:00',0),
	(188,'Ndokwa West',10,'2017-10-06 10:45:59',NULL,'0000-00-00 00:00:00',0),
	(189,'Okpe',10,'2017-10-06 10:45:59',NULL,'0000-00-00 00:00:00',0),
	(190,'Oshimili North',10,'2017-10-06 10:45:59',NULL,'0000-00-00 00:00:00',0),
	(191,'Oshimili South',10,'2017-10-06 10:45:59',NULL,'0000-00-00 00:00:00',0),
	(192,'Patani',10,'2017-10-06 10:45:59',NULL,'0000-00-00 00:00:00',0),
	(193,'Sapele',10,'2017-10-06 10:45:59',NULL,'0000-00-00 00:00:00',0),
	(194,'Udu',10,'2017-10-06 10:45:59',NULL,'0000-00-00 00:00:00',0),
	(195,'Ughelli North',10,'2017-10-06 10:45:59',NULL,'0000-00-00 00:00:00',0),
	(196,'Ughelli South',10,'2017-10-06 10:45:59',NULL,'0000-00-00 00:00:00',0),
	(197,'Ukwuani',10,'2017-10-06 10:45:59',NULL,'0000-00-00 00:00:00',0),
	(198,'Uvwie',10,'2017-10-06 10:45:59',NULL,'0000-00-00 00:00:00',0),
	(199,'Warri North',10,'2017-10-06 10:45:59',NULL,'0000-00-00 00:00:00',0),
	(200,'Warri South',10,'2017-10-06 10:45:59',NULL,'0000-00-00 00:00:00',0),
	(201,'Warri South West',10,'2017-10-06 10:45:59',NULL,'0000-00-00 00:00:00',0),
	(202,'Afikpo North',11,'2017-10-06 10:45:59',NULL,'0000-00-00 00:00:00',0),
	(203,'Afikpo South',11,'2017-10-06 10:45:59',NULL,'0000-00-00 00:00:00',0),
	(204,'Ebonyi',11,'2017-10-06 10:45:59',NULL,'0000-00-00 00:00:00',0),
	(205,'Ezza North',11,'2017-10-06 10:45:59',NULL,'0000-00-00 00:00:00',0),
	(206,'Ezza South',11,'2017-10-06 10:45:59',NULL,'0000-00-00 00:00:00',0),
	(207,'Ikwo',11,'2017-10-06 10:45:59',NULL,'0000-00-00 00:00:00',0),
	(208,'Ishielu',11,'2017-10-06 10:45:59',NULL,'0000-00-00 00:00:00',0),
	(209,'Ivo',11,'2017-10-06 10:45:59',NULL,'0000-00-00 00:00:00',0),
	(210,'Izzi',11,'2017-10-06 10:45:59',NULL,'0000-00-00 00:00:00',0),
	(211,'Ohaozara',11,'2017-10-06 10:45:59',NULL,'0000-00-00 00:00:00',0),
	(212,'Ohaukwu',11,'2017-10-06 10:45:59',NULL,'0000-00-00 00:00:00',0),
	(213,'Onicha',11,'2017-10-06 10:45:59',NULL,'0000-00-00 00:00:00',0),
	(214,'Egor',12,'2017-10-06 10:45:59',NULL,'0000-00-00 00:00:00',0),
	(215,'Esan Central',12,'2017-10-06 10:45:59',NULL,'0000-00-00 00:00:00',0),
	(216,'Esan North-East',12,'2017-10-06 10:45:59',NULL,'0000-00-00 00:00:00',0),
	(217,'Esan South-East',12,'2017-10-06 10:45:59',NULL,'0000-00-00 00:00:00',0),
	(218,'Esan West',12,'2017-10-06 10:45:59',NULL,'0000-00-00 00:00:00',0),
	(219,'Etsako Central',12,'2017-10-06 10:45:59',NULL,'0000-00-00 00:00:00',0),
	(220,'Etsako East',12,'2017-10-06 10:45:59',NULL,'0000-00-00 00:00:00',0),
	(221,'Etsako West',12,'2017-10-06 10:45:59',NULL,'0000-00-00 00:00:00',0),
	(222,'Igueben',12,'2017-10-06 10:45:59',NULL,'0000-00-00 00:00:00',0),
	(223,'Ikpoba Okha',12,'2017-10-06 10:45:59',NULL,'0000-00-00 00:00:00',0),
	(224,'Orhionmwon',12,'2017-10-06 10:45:59',NULL,'0000-00-00 00:00:00',0),
	(225,'Oredo',12,'2017-10-06 10:45:59',NULL,'0000-00-00 00:00:00',0),
	(226,'Ovia North-East',12,'2017-10-06 10:45:59',NULL,'0000-00-00 00:00:00',0),
	(227,'Ovia South-West',12,'2017-10-06 10:45:59',NULL,'0000-00-00 00:00:00',0),
	(228,'Owan East',12,'2017-10-06 10:45:59',NULL,'0000-00-00 00:00:00',0),
	(229,'Owan West',12,'2017-10-06 10:45:59',NULL,'0000-00-00 00:00:00',0),
	(230,'Uhunmwonde',12,'2017-10-06 10:45:59',NULL,'0000-00-00 00:00:00',0),
	(231,'Efon',13,'2017-10-06 10:45:59',NULL,'0000-00-00 00:00:00',0),
	(232,'Ekiti East',13,'2017-10-06 10:45:59',NULL,'0000-00-00 00:00:00',0),
	(233,'Ekiti South-West',13,'2017-10-06 10:45:59',NULL,'0000-00-00 00:00:00',0),
	(234,'Ekiti West',13,'2017-10-06 10:45:59',NULL,'0000-00-00 00:00:00',0),
	(235,'Emure',13,'2017-10-06 10:45:59',NULL,'0000-00-00 00:00:00',0),
	(236,'Gbonyin',13,'2017-10-06 10:45:59',NULL,'0000-00-00 00:00:00',0),
	(237,'Ido Osi',13,'2017-10-06 10:45:59',NULL,'0000-00-00 00:00:00',0),
	(238,'Ijero',13,'2017-10-06 10:45:59',NULL,'0000-00-00 00:00:00',0),
	(239,'Ikere',13,'2017-10-06 10:45:59',NULL,'0000-00-00 00:00:00',0),
	(240,'Ikole',13,'2017-10-06 10:45:59',NULL,'0000-00-00 00:00:00',0),
	(241,'Ilejemeje',13,'2017-10-06 10:45:59',NULL,'0000-00-00 00:00:00',0),
	(242,'Irepodun/Ifelodun',13,'2017-10-06 10:45:59',NULL,'0000-00-00 00:00:00',0),
	(243,'Ise/Orun',13,'2017-10-06 10:45:59',NULL,'0000-00-00 00:00:00',0),
	(244,'Moba',13,'2017-10-06 10:45:59',NULL,'0000-00-00 00:00:00',0),
	(245,'Oye',13,'2017-10-06 10:45:59',NULL,'0000-00-00 00:00:00',0),
	(246,'Awgu',14,'2017-10-06 10:45:59',NULL,'0000-00-00 00:00:00',0),
	(247,'Enugu East',14,'2017-10-06 10:45:59',NULL,'0000-00-00 00:00:00',0),
	(248,'Enugu North',14,'2017-10-06 10:45:59',NULL,'0000-00-00 00:00:00',0),
	(249,'Enugu South',14,'2017-10-06 10:45:59',NULL,'0000-00-00 00:00:00',0),
	(250,'Ezeagu',14,'2017-10-06 10:45:59',NULL,'0000-00-00 00:00:00',0),
	(251,'Igbo Etiti',14,'2017-10-06 10:45:59',NULL,'0000-00-00 00:00:00',0),
	(252,'Igbo Eze North',14,'2017-10-06 10:45:59',NULL,'0000-00-00 00:00:00',0),
	(253,'Igbo Eze South',14,'2017-10-06 10:45:59',NULL,'0000-00-00 00:00:00',0),
	(254,'Isi Uzo',14,'2017-10-06 10:45:59',NULL,'0000-00-00 00:00:00',0),
	(255,'Nkanu East',14,'2017-10-06 10:45:59',NULL,'0000-00-00 00:00:00',0),
	(256,'Nkanu West',14,'2017-10-06 10:45:59',NULL,'0000-00-00 00:00:00',0),
	(257,'Nsukka',14,'2017-10-06 10:45:59',NULL,'0000-00-00 00:00:00',0),
	(258,'Oji River',14,'2017-10-06 10:45:59',NULL,'0000-00-00 00:00:00',0),
	(259,'Udenu',14,'2017-10-06 10:45:59',NULL,'0000-00-00 00:00:00',0),
	(260,'Udi',14,'2017-10-06 10:45:59',NULL,'0000-00-00 00:00:00',0),
	(261,'Uzo Uwani',14,'2017-10-06 10:45:59',NULL,'0000-00-00 00:00:00',0),
	(262,'Bwari',15,'2017-10-06 10:45:59',NULL,'0000-00-00 00:00:00',0),
	(263,'Gwagwalada',15,'2017-10-06 10:45:59',NULL,'0000-00-00 00:00:00',0),
	(264,'Kuje',15,'2017-10-06 10:45:59',NULL,'0000-00-00 00:00:00',0),
	(265,'Kwali',15,'2017-10-06 10:45:59',NULL,'0000-00-00 00:00:00',0),
	(266,'Municipal Area Council',15,'2017-10-06 10:45:59',NULL,'0000-00-00 00:00:00',0),
	(267,'Balanga',16,'2017-10-06 10:45:59',NULL,'0000-00-00 00:00:00',0),
	(268,'Billiri',16,'2017-10-06 10:45:59',NULL,'0000-00-00 00:00:00',0),
	(269,'Dukku',16,'2017-10-06 10:45:59',NULL,'0000-00-00 00:00:00',0),
	(270,'Funakaye',16,'2017-10-06 10:45:59',NULL,'0000-00-00 00:00:00',0),
	(271,'Gombe',16,'2017-10-06 10:45:59',NULL,'0000-00-00 00:00:00',0),
	(272,'Kaltungo',16,'2017-10-06 10:45:59',NULL,'0000-00-00 00:00:00',0),
	(273,'Kwami',16,'2017-10-06 10:45:59',NULL,'0000-00-00 00:00:00',0),
	(274,'Nafada',16,'2017-10-06 10:45:59',NULL,'0000-00-00 00:00:00',0),
	(275,'Shongom',16,'2017-10-06 10:45:59',NULL,'0000-00-00 00:00:00',0),
	(276,'Yamaltu/Deba',16,'2017-10-06 10:45:59',NULL,'0000-00-00 00:00:00',0),
	(277,'Ahiazu Mbaise',17,'2017-10-06 10:45:59',NULL,'0000-00-00 00:00:00',0),
	(278,'Ehime Mbano',17,'2017-10-06 10:45:59',NULL,'0000-00-00 00:00:00',0),
	(279,'Ezinihitte',17,'2017-10-06 10:45:59',NULL,'0000-00-00 00:00:00',0),
	(280,'Ideato North',17,'2017-10-06 10:45:59',NULL,'0000-00-00 00:00:00',0),
	(281,'Ideato South',17,'2017-10-06 10:45:59',NULL,'0000-00-00 00:00:00',0),
	(282,'Ihitte/Uboma',17,'2017-10-06 10:45:59',NULL,'0000-00-00 00:00:00',0),
	(283,'Ikeduru',17,'2017-10-06 10:45:59',NULL,'0000-00-00 00:00:00',0),
	(284,'Isiala Mbano',17,'2017-10-06 10:45:59',NULL,'0000-00-00 00:00:00',0),
	(285,'Isu',17,'2017-10-06 10:45:59',NULL,'0000-00-00 00:00:00',0),
	(286,'Mbaitoli',17,'2017-10-06 10:45:59',NULL,'0000-00-00 00:00:00',0),
	(287,'Ngor Okpala',17,'2017-10-06 10:45:59',NULL,'0000-00-00 00:00:00',0),
	(288,'Njaba',17,'2017-10-06 10:45:59',NULL,'0000-00-00 00:00:00',0),
	(289,'Nkwerre',17,'2017-10-06 10:45:59',NULL,'0000-00-00 00:00:00',0),
	(290,'Nwangele',17,'2017-10-06 10:45:59',NULL,'0000-00-00 00:00:00',0),
	(291,'Obowo',17,'2017-10-06 10:45:59',NULL,'0000-00-00 00:00:00',0),
	(292,'Oguta',17,'2017-10-06 10:45:59',NULL,'0000-00-00 00:00:00',0),
	(293,'Ohaji/Egbema',17,'2017-10-06 10:45:59',NULL,'0000-00-00 00:00:00',0),
	(294,'Okigwe',17,'2017-10-06 10:45:59',NULL,'0000-00-00 00:00:00',0),
	(295,'Orlu',17,'2017-10-06 10:45:59',NULL,'0000-00-00 00:00:00',0),
	(296,'Orsu',17,'2017-10-06 10:45:59',NULL,'0000-00-00 00:00:00',0),
	(297,'Oru East',17,'2017-10-06 10:45:59',NULL,'0000-00-00 00:00:00',0),
	(298,'Oru West',17,'2017-10-06 10:45:59',NULL,'0000-00-00 00:00:00',0),
	(299,'Owerri Municipal',17,'2017-10-06 10:45:59',NULL,'0000-00-00 00:00:00',0),
	(300,'Owerri North',17,'2017-10-06 10:45:59',NULL,'0000-00-00 00:00:00',0),
	(301,'Owerri West',17,'2017-10-06 10:45:59',NULL,'0000-00-00 00:00:00',0),
	(302,'Unuimo',17,'2017-10-06 10:45:59',NULL,'0000-00-00 00:00:00',0),
	(303,'Babura',18,'2017-10-06 10:45:59',NULL,'0000-00-00 00:00:00',0),
	(304,'Biriniwa',18,'2017-10-06 10:45:59',NULL,'0000-00-00 00:00:00',0),
	(305,'Birnin Kudu',18,'2017-10-06 10:45:59',NULL,'0000-00-00 00:00:00',0),
	(306,'Buji',18,'2017-10-06 10:45:59',NULL,'0000-00-00 00:00:00',0),
	(307,'Dutse',18,'2017-10-06 10:45:59',NULL,'0000-00-00 00:00:00',0),
	(308,'Gagarawa',18,'2017-10-06 10:45:59',NULL,'0000-00-00 00:00:00',0),
	(309,'Garki',18,'2017-10-06 10:45:59',NULL,'0000-00-00 00:00:00',0),
	(310,'Gumel',18,'2017-10-06 10:45:59',NULL,'0000-00-00 00:00:00',0),
	(311,'Guri',18,'2017-10-06 10:45:59',NULL,'0000-00-00 00:00:00',0),
	(312,'Gwaram',18,'2017-10-06 10:45:59',NULL,'0000-00-00 00:00:00',0),
	(313,'Gwiwa',18,'2017-10-06 10:45:59',NULL,'0000-00-00 00:00:00',0),
	(314,'Hadejia',18,'2017-10-06 10:45:59',NULL,'0000-00-00 00:00:00',0),
	(315,'Jahun',18,'2017-10-06 10:45:59',NULL,'0000-00-00 00:00:00',0),
	(316,'Kafin Hausa',18,'2017-10-06 10:45:59',NULL,'0000-00-00 00:00:00',0),
	(317,'Kazaure',18,'2017-10-06 10:45:59',NULL,'0000-00-00 00:00:00',0),
	(318,'Kiri Kasama',18,'2017-10-06 10:45:59',NULL,'0000-00-00 00:00:00',0),
	(319,'Kiyawa',18,'2017-10-06 10:45:59',NULL,'0000-00-00 00:00:00',0),
	(320,'Kaugama',18,'2017-10-06 10:45:59',NULL,'0000-00-00 00:00:00',0),
	(321,'Maigatari',18,'2017-10-06 10:45:59',NULL,'0000-00-00 00:00:00',0),
	(322,'Malam Madori',18,'2017-10-06 10:45:59',NULL,'0000-00-00 00:00:00',0),
	(323,'Miga',18,'2017-10-06 10:45:59',NULL,'0000-00-00 00:00:00',0),
	(324,'Ringim',18,'2017-10-06 10:45:59',NULL,'0000-00-00 00:00:00',0),
	(325,'Roni',18,'2017-10-06 10:45:59',NULL,'0000-00-00 00:00:00',0),
	(326,'Sule Tankarkar',18,'2017-10-06 10:45:59',NULL,'0000-00-00 00:00:00',0),
	(327,'Taura',18,'2017-10-06 10:45:59',NULL,'0000-00-00 00:00:00',0),
	(328,'Yankwashi',18,'2017-10-06 10:45:59',NULL,'0000-00-00 00:00:00',0),
	(329,'Chikun',19,'2017-10-06 10:45:59',NULL,'0000-00-00 00:00:00',0),
	(330,'Giwa',19,'2017-10-06 10:45:59',NULL,'0000-00-00 00:00:00',0),
	(331,'Igabi',19,'2017-10-06 10:45:59',NULL,'0000-00-00 00:00:00',0),
	(332,'Ikara',19,'2017-10-06 10:45:59',NULL,'0000-00-00 00:00:00',0),
	(333,'Jaba',19,'2017-10-06 10:45:59',NULL,'0000-00-00 00:00:00',0),
	(334,'Jema\'a',19,'2017-10-06 10:45:59',NULL,'0000-00-00 00:00:00',0),
	(335,'Kachia',19,'2017-10-06 10:45:59',NULL,'0000-00-00 00:00:00',0),
	(336,'Kaduna North',19,'2017-10-06 10:45:59',NULL,'0000-00-00 00:00:00',0),
	(337,'Kaduna South',19,'2017-10-06 10:45:59',NULL,'0000-00-00 00:00:00',0),
	(338,'Kagarko',19,'2017-10-06 10:45:59',NULL,'0000-00-00 00:00:00',0),
	(339,'Kajuru',19,'2017-10-06 10:45:59',NULL,'0000-00-00 00:00:00',0),
	(340,'Kaura',19,'2017-10-06 10:45:59',NULL,'0000-00-00 00:00:00',0),
	(341,'Kauru',19,'2017-10-06 10:45:59',NULL,'0000-00-00 00:00:00',0),
	(342,'Kubau',19,'2017-10-06 10:45:59',NULL,'0000-00-00 00:00:00',0),
	(343,'Kudan',19,'2017-10-06 10:45:59',NULL,'0000-00-00 00:00:00',0),
	(344,'Lere',19,'2017-10-06 10:45:59',NULL,'0000-00-00 00:00:00',0),
	(345,'Makarfi',19,'2017-10-06 10:45:59',NULL,'0000-00-00 00:00:00',0),
	(346,'Sabon Gari',19,'2017-10-06 10:45:59',NULL,'0000-00-00 00:00:00',0),
	(347,'Sanga',19,'2017-10-06 10:45:59',NULL,'0000-00-00 00:00:00',0),
	(348,'Soba',19,'2017-10-06 10:45:59',NULL,'0000-00-00 00:00:00',0),
	(349,'Zangon Kataf',19,'2017-10-06 10:45:59',NULL,'0000-00-00 00:00:00',0),
	(350,'Zaria',19,'2017-10-06 10:45:59',NULL,'0000-00-00 00:00:00',0),
	(351,'Albasu',20,'2017-10-06 10:45:59',NULL,'0000-00-00 00:00:00',0),
	(352,'Bagwai',20,'2017-10-06 10:45:59',NULL,'0000-00-00 00:00:00',0),
	(353,'Bebeji',20,'2017-10-06 10:45:59',NULL,'0000-00-00 00:00:00',0),
	(354,'Bichi',20,'2017-10-06 10:45:59',NULL,'0000-00-00 00:00:00',0),
	(355,'Bunkure',20,'2017-10-06 10:45:59',NULL,'0000-00-00 00:00:00',0),
	(356,'Dala',20,'2017-10-06 10:45:59',NULL,'0000-00-00 00:00:00',0),
	(357,'Dambatta',20,'2017-10-06 10:45:59',NULL,'0000-00-00 00:00:00',0),
	(358,'Dawakin Kudu',20,'2017-10-06 10:45:59',NULL,'0000-00-00 00:00:00',0),
	(359,'Dawakin Tofa',20,'2017-10-06 10:45:59',NULL,'0000-00-00 00:00:00',0),
	(360,'Doguwa',20,'2017-10-06 10:45:59',NULL,'0000-00-00 00:00:00',0),
	(361,'Fagge',20,'2017-10-06 10:45:59',NULL,'0000-00-00 00:00:00',0),
	(362,'Gabasawa',20,'2017-10-06 10:45:59',NULL,'0000-00-00 00:00:00',0),
	(363,'Garko',20,'2017-10-06 10:45:59',NULL,'0000-00-00 00:00:00',0),
	(364,'Garun Mallam',20,'2017-10-06 10:45:59',NULL,'0000-00-00 00:00:00',0),
	(365,'Gaya',20,'2017-10-06 10:45:59',NULL,'0000-00-00 00:00:00',0),
	(366,'Gezawa',20,'2017-10-06 10:45:59',NULL,'0000-00-00 00:00:00',0),
	(367,'Gwale',20,'2017-10-06 10:45:59',NULL,'0000-00-00 00:00:00',0),
	(368,'Gwarzo',20,'2017-10-06 10:45:59',NULL,'0000-00-00 00:00:00',0),
	(369,'Kabo',20,'2017-10-06 10:45:59',NULL,'0000-00-00 00:00:00',0),
	(370,'Kano Municipal',20,'2017-10-06 10:45:59',NULL,'0000-00-00 00:00:00',0),
	(371,'Karaye',20,'2017-10-06 10:45:59',NULL,'0000-00-00 00:00:00',0),
	(372,'Kibiya',20,'2017-10-06 10:45:59',NULL,'0000-00-00 00:00:00',0),
	(373,'Kiru',20,'2017-10-06 10:45:59',NULL,'0000-00-00 00:00:00',0),
	(374,'Kumbotso',20,'2017-10-06 10:45:59',NULL,'0000-00-00 00:00:00',0),
	(375,'Kunchi',20,'2017-10-06 10:45:59',NULL,'0000-00-00 00:00:00',0),
	(376,'Kura',20,'2017-10-06 10:45:59',NULL,'0000-00-00 00:00:00',0),
	(377,'Madobi',20,'2017-10-06 10:45:59',NULL,'0000-00-00 00:00:00',0),
	(378,'Makoda',20,'2017-10-06 10:45:59',NULL,'0000-00-00 00:00:00',0),
	(379,'Minjibir',20,'2017-10-06 10:45:59',NULL,'0000-00-00 00:00:00',0),
	(380,'Nasarawa',20,'2017-10-06 10:45:59',NULL,'0000-00-00 00:00:00',0),
	(381,'Rano',20,'2017-10-06 10:45:59',NULL,'0000-00-00 00:00:00',0),
	(382,'Rimin Gado',20,'2017-10-06 10:45:59',NULL,'0000-00-00 00:00:00',0),
	(383,'Rogo',20,'2017-10-06 10:45:59',NULL,'0000-00-00 00:00:00',0),
	(384,'Shanono',20,'2017-10-06 10:45:59',NULL,'0000-00-00 00:00:00',0),
	(385,'Sumaila',20,'2017-10-06 10:45:59',NULL,'0000-00-00 00:00:00',0),
	(386,'Takai',20,'2017-10-06 10:45:59',NULL,'0000-00-00 00:00:00',0),
	(387,'Tarauni',20,'2017-10-06 10:45:59',NULL,'0000-00-00 00:00:00',0),
	(388,'Tofa',20,'2017-10-06 10:45:59',NULL,'0000-00-00 00:00:00',0),
	(389,'Tsanyawa',20,'2017-10-06 10:45:59',NULL,'0000-00-00 00:00:00',0),
	(390,'Tudun Wada',20,'2017-10-06 10:45:59',NULL,'0000-00-00 00:00:00',0),
	(391,'Ungogo',20,'2017-10-06 10:45:59',NULL,'0000-00-00 00:00:00',0),
	(392,'Warawa',20,'2017-10-06 10:45:59',NULL,'0000-00-00 00:00:00',0),
	(393,'Wudil',20,'2017-10-06 10:45:59',NULL,'0000-00-00 00:00:00',0),
	(394,'Batagarawa',21,'2017-10-06 10:45:59',NULL,'0000-00-00 00:00:00',0),
	(395,'Batsari',21,'2017-10-06 10:45:59',NULL,'0000-00-00 00:00:00',0),
	(396,'Baure',21,'2017-10-06 10:45:59',NULL,'0000-00-00 00:00:00',0),
	(397,'Bindawa',21,'2017-10-06 10:45:59',NULL,'0000-00-00 00:00:00',0),
	(398,'Charanchi',21,'2017-10-06 10:45:59',NULL,'0000-00-00 00:00:00',0),
	(399,'Dandume',21,'2017-10-06 10:45:59',NULL,'0000-00-00 00:00:00',0),
	(400,'Danja',21,'2017-10-06 10:45:59',NULL,'0000-00-00 00:00:00',0),
	(401,'Dan Musa',21,'2017-10-06 10:45:59',NULL,'0000-00-00 00:00:00',0),
	(402,'Daura',21,'2017-10-06 10:45:59',NULL,'0000-00-00 00:00:00',0),
	(403,'Dutsi',21,'2017-10-06 10:45:59',NULL,'0000-00-00 00:00:00',0),
	(404,'Dutsin Ma',21,'2017-10-06 10:45:59',NULL,'0000-00-00 00:00:00',0),
	(405,'Faskari',21,'2017-10-06 10:45:59',NULL,'0000-00-00 00:00:00',0),
	(406,'Funtua',21,'2017-10-06 10:45:59',NULL,'0000-00-00 00:00:00',0),
	(407,'Ingawa',21,'2017-10-06 10:45:59',NULL,'0000-00-00 00:00:00',0),
	(408,'Jibia',21,'2017-10-06 10:45:59',NULL,'0000-00-00 00:00:00',0),
	(409,'Kafur',21,'2017-10-06 10:45:59',NULL,'0000-00-00 00:00:00',0),
	(410,'Kaita',21,'2017-10-06 10:45:59',NULL,'0000-00-00 00:00:00',0),
	(411,'Kankara',21,'2017-10-06 10:45:59',NULL,'0000-00-00 00:00:00',0),
	(412,'Kankia',21,'2017-10-06 10:45:59',NULL,'0000-00-00 00:00:00',0),
	(413,'Katsina',21,'2017-10-06 10:45:59',NULL,'0000-00-00 00:00:00',0),
	(414,'Kurfi',21,'2017-10-06 10:45:59',NULL,'0000-00-00 00:00:00',0),
	(415,'Kusada',21,'2017-10-06 10:45:59',NULL,'0000-00-00 00:00:00',0),
	(416,'Mai\'Adua',21,'2017-10-06 10:45:59',NULL,'0000-00-00 00:00:00',0),
	(417,'Malumfashi',21,'2017-10-06 10:45:59',NULL,'0000-00-00 00:00:00',0),
	(418,'Mani',21,'2017-10-06 10:45:59',NULL,'0000-00-00 00:00:00',0),
	(419,'Mashi',21,'2017-10-06 10:45:59',NULL,'0000-00-00 00:00:00',0),
	(420,'Matazu',21,'2017-10-06 10:45:59',NULL,'0000-00-00 00:00:00',0),
	(421,'Musawa',21,'2017-10-06 10:45:59',NULL,'0000-00-00 00:00:00',0),
	(422,'Rimi',21,'2017-10-06 10:45:59',NULL,'0000-00-00 00:00:00',0),
	(423,'Sabuwa',21,'2017-10-06 10:45:59',NULL,'0000-00-00 00:00:00',0),
	(424,'Safana',21,'2017-10-06 10:45:59',NULL,'0000-00-00 00:00:00',0),
	(425,'Sandamu',21,'2017-10-06 10:45:59',NULL,'0000-00-00 00:00:00',0),
	(426,'Zango',21,'2017-10-06 10:45:59',NULL,'0000-00-00 00:00:00',0),
	(427,'Arewa Dandi',22,'2017-10-06 10:45:59',NULL,'0000-00-00 00:00:00',0),
	(428,'Argungu',22,'2017-10-06 10:45:59',NULL,'0000-00-00 00:00:00',0),
	(429,'Augie',22,'2017-10-06 10:45:59',NULL,'0000-00-00 00:00:00',0),
	(430,'Bagudo',22,'2017-10-06 10:45:59',NULL,'0000-00-00 00:00:00',0),
	(431,'Birnin Kebbi',22,'2017-10-06 10:45:59',NULL,'0000-00-00 00:00:00',0),
	(432,'Bunza',22,'2017-10-06 10:45:59',NULL,'0000-00-00 00:00:00',0),
	(433,'Dandi',22,'2017-10-06 10:45:59',NULL,'0000-00-00 00:00:00',0),
	(434,'Fakai',22,'2017-10-06 10:45:59',NULL,'0000-00-00 00:00:00',0),
	(435,'Gwandu',22,'2017-10-06 10:45:59',NULL,'0000-00-00 00:00:00',0),
	(436,'Jega',22,'2017-10-06 10:45:59',NULL,'0000-00-00 00:00:00',0),
	(437,'Kalgo',22,'2017-10-06 10:45:59',NULL,'0000-00-00 00:00:00',0),
	(438,'Koko/Besse',22,'2017-10-06 10:45:59',NULL,'0000-00-00 00:00:00',0),
	(439,'Maiyama',22,'2017-10-06 10:45:59',NULL,'0000-00-00 00:00:00',0),
	(440,'Ngaski',22,'2017-10-06 10:45:59',NULL,'0000-00-00 00:00:00',0),
	(441,'Sakaba',22,'2017-10-06 10:45:59',NULL,'0000-00-00 00:00:00',0),
	(442,'Shanga',22,'2017-10-06 10:45:59',NULL,'0000-00-00 00:00:00',0),
	(443,'Suru',22,'2017-10-06 10:45:59',NULL,'0000-00-00 00:00:00',0),
	(444,'Wasagu/Danko',22,'2017-10-06 10:45:59',NULL,'0000-00-00 00:00:00',0),
	(445,'Yauri',22,'2017-10-06 10:45:59',NULL,'0000-00-00 00:00:00',0),
	(446,'Zuru',22,'2017-10-06 10:45:59',NULL,'0000-00-00 00:00:00',0),
	(447,'Ajaokuta',23,'2017-10-06 10:45:59',NULL,'0000-00-00 00:00:00',0),
	(448,'Ankpa',23,'2017-10-06 10:45:59',NULL,'0000-00-00 00:00:00',0),
	(449,'Bassa',23,'2017-10-06 10:45:59',NULL,'0000-00-00 00:00:00',0),
	(450,'Dekina',23,'2017-10-06 10:45:59',NULL,'0000-00-00 00:00:00',0),
	(451,'Ibaji',23,'2017-10-06 10:45:59',NULL,'0000-00-00 00:00:00',0),
	(452,'Idah',23,'2017-10-06 10:45:59',NULL,'0000-00-00 00:00:00',0),
	(453,'Igalamela Odolu',23,'2017-10-06 10:45:59',NULL,'0000-00-00 00:00:00',0),
	(454,'Ijumu',23,'2017-10-06 10:45:59',NULL,'0000-00-00 00:00:00',0),
	(455,'Kabba/Bunu',23,'2017-10-06 10:45:59',NULL,'0000-00-00 00:00:00',0),
	(456,'Kogi',23,'2017-10-06 10:45:59',NULL,'0000-00-00 00:00:00',0),
	(457,'Lokoja',23,'2017-10-06 10:45:59',NULL,'0000-00-00 00:00:00',0),
	(458,'Mopa Muro',23,'2017-10-06 10:45:59',NULL,'0000-00-00 00:00:00',0),
	(459,'Ofu',23,'2017-10-06 10:45:59',NULL,'0000-00-00 00:00:00',0),
	(460,'Ogori/Magongo',23,'2017-10-06 10:45:59',NULL,'0000-00-00 00:00:00',0),
	(461,'Okehi',23,'2017-10-06 10:45:59',NULL,'0000-00-00 00:00:00',0),
	(462,'Okene',23,'2017-10-06 10:45:59',NULL,'0000-00-00 00:00:00',0),
	(463,'Olamaboro',23,'2017-10-06 10:45:59',NULL,'0000-00-00 00:00:00',0),
	(464,'Omala',23,'2017-10-06 10:45:59',NULL,'0000-00-00 00:00:00',0),
	(465,'Yagba East',23,'2017-10-06 10:45:59',NULL,'0000-00-00 00:00:00',0),
	(466,'Yagba West',23,'2017-10-06 10:45:59',NULL,'0000-00-00 00:00:00',0),
	(467,'Baruten',24,'2017-10-06 10:45:59',NULL,'0000-00-00 00:00:00',0),
	(468,'Edu',24,'2017-10-06 10:45:59',NULL,'0000-00-00 00:00:00',0),
	(469,'Ekiti',24,'2017-10-06 10:45:59',NULL,'0000-00-00 00:00:00',0),
	(470,'Ifelodun',24,'2017-10-06 10:45:59',NULL,'0000-00-00 00:00:00',0),
	(471,'Ilorin East',24,'2017-10-06 10:45:59',NULL,'0000-00-00 00:00:00',0),
	(472,'Ilorin South',24,'2017-10-06 10:45:59',NULL,'0000-00-00 00:00:00',0),
	(473,'Ilorin West',24,'2017-10-06 10:45:59',NULL,'0000-00-00 00:00:00',0),
	(474,'Irepodun',24,'2017-10-06 10:45:59',NULL,'0000-00-00 00:00:00',0),
	(475,'Isin',24,'2017-10-06 10:45:59',NULL,'0000-00-00 00:00:00',0),
	(476,'Kaiama',24,'2017-10-06 10:45:59',NULL,'0000-00-00 00:00:00',0),
	(477,'Moro',24,'2017-10-06 10:45:59',NULL,'0000-00-00 00:00:00',0),
	(478,'Offa',24,'2017-10-06 10:45:59',NULL,'0000-00-00 00:00:00',0),
	(479,'Oke Ero',24,'2017-10-06 10:45:59',NULL,'0000-00-00 00:00:00',0),
	(480,'Oyun',24,'2017-10-06 10:45:59',NULL,'0000-00-00 00:00:00',0),
	(481,'Pategi',24,'2017-10-06 10:45:59',NULL,'0000-00-00 00:00:00',0),
	(482,'Ajeromi-Ifelodun',25,'2017-10-06 10:45:59',NULL,'0000-00-00 00:00:00',0),
	(483,'Alimosho',25,'2017-10-06 10:45:59',NULL,'0000-00-00 00:00:00',0),
	(484,'Amuwo-Odofin',25,'2017-10-06 10:45:59',NULL,'0000-00-00 00:00:00',0),
	(485,'Apapa',25,'2017-10-06 10:45:59',NULL,'0000-00-00 00:00:00',0),
	(486,'Badagry',25,'2017-10-06 10:45:59',NULL,'0000-00-00 00:00:00',0),
	(487,'Epe',25,'2017-10-06 10:45:59',NULL,'0000-00-00 00:00:00',0),
	(488,'Eti Osa',25,'2017-10-06 10:45:59',NULL,'0000-00-00 00:00:00',0),
	(489,'Ibeju-Lekki',25,'2017-10-06 10:45:59',NULL,'0000-00-00 00:00:00',0),
	(490,'Ifako-Ijaiye',25,'2017-10-06 10:45:59',NULL,'0000-00-00 00:00:00',0),
	(491,'Ikeja',25,'2017-10-06 10:45:59',NULL,'0000-00-00 00:00:00',0),
	(492,'Ikorodu',25,'2017-10-06 10:45:59',NULL,'0000-00-00 00:00:00',0),
	(493,'Kosofe',25,'2017-10-06 10:45:59',NULL,'0000-00-00 00:00:00',0),
	(494,'Lagos Island',25,'2017-10-06 10:45:59',NULL,'0000-00-00 00:00:00',0),
	(495,'Lagos Mainland',25,'2017-10-06 10:45:59',NULL,'0000-00-00 00:00:00',0),
	(496,'Mushin',25,'2017-10-06 10:45:59',NULL,'0000-00-00 00:00:00',0),
	(497,'Ojo',25,'2017-10-06 10:45:59',NULL,'0000-00-00 00:00:00',0),
	(498,'Oshodi-Isolo',25,'2017-10-06 10:45:59',NULL,'0000-00-00 00:00:00',0),
	(499,'Shomolu',25,'2017-10-06 10:45:59',NULL,'0000-00-00 00:00:00',0),
	(500,'Surulere',25,'2017-10-06 10:45:59',NULL,'0000-00-00 00:00:00',0),
	(501,'Awe',26,'2017-10-06 10:45:59',NULL,'0000-00-00 00:00:00',0),
	(502,'Doma',26,'2017-10-06 10:45:59',NULL,'0000-00-00 00:00:00',0),
	(503,'Karu',26,'2017-10-06 10:45:59',NULL,'0000-00-00 00:00:00',0),
	(504,'Keana',26,'2017-10-06 10:45:59',NULL,'0000-00-00 00:00:00',0),
	(505,'Keffi',26,'2017-10-06 10:45:59',NULL,'0000-00-00 00:00:00',0),
	(506,'Kokona',26,'2017-10-06 10:45:59',NULL,'0000-00-00 00:00:00',0),
	(507,'Lafia',26,'2017-10-06 10:45:59',NULL,'0000-00-00 00:00:00',0),
	(508,'Nasarawa',26,'2017-10-06 10:45:59',NULL,'0000-00-00 00:00:00',0),
	(509,'Nasarawa Egon',26,'2017-10-06 10:45:59',NULL,'0000-00-00 00:00:00',0),
	(510,'Obi',26,'2017-10-06 10:45:59',NULL,'0000-00-00 00:00:00',0),
	(511,'Toto',26,'2017-10-06 10:45:59',NULL,'0000-00-00 00:00:00',0),
	(512,'Wamba',26,'2017-10-06 10:45:59',NULL,'0000-00-00 00:00:00',0),
	(513,'Agwara',27,'2017-10-06 10:45:59',NULL,'0000-00-00 00:00:00',0),
	(514,'Bida',27,'2017-10-06 10:45:59',NULL,'0000-00-00 00:00:00',0),
	(515,'Borgu',27,'2017-10-06 10:45:59',NULL,'0000-00-00 00:00:00',0),
	(516,'Bosso',27,'2017-10-06 10:45:59',NULL,'0000-00-00 00:00:00',0),
	(517,'Chanchaga',27,'2017-10-06 10:45:59',NULL,'0000-00-00 00:00:00',0),
	(518,'Edati',27,'2017-10-06 10:45:59',NULL,'0000-00-00 00:00:00',0),
	(519,'Gbako',27,'2017-10-06 10:45:59',NULL,'0000-00-00 00:00:00',0),
	(520,'Gurara',27,'2017-10-06 10:45:59',NULL,'0000-00-00 00:00:00',0),
	(521,'Katcha',27,'2017-10-06 10:45:59',NULL,'0000-00-00 00:00:00',0),
	(522,'Kontagora',27,'2017-10-06 10:45:59',NULL,'0000-00-00 00:00:00',0),
	(523,'Lapai',27,'2017-10-06 10:45:59',NULL,'0000-00-00 00:00:00',0),
	(524,'Lavun',27,'2017-10-06 10:45:59',NULL,'0000-00-00 00:00:00',0),
	(525,'Magama',27,'2017-10-06 10:45:59',NULL,'0000-00-00 00:00:00',0),
	(526,'Mariga',27,'2017-10-06 10:45:59',NULL,'0000-00-00 00:00:00',0),
	(527,'Mashegu',27,'2017-10-06 10:45:59',NULL,'0000-00-00 00:00:00',0),
	(528,'Mokwa',27,'2017-10-06 10:45:59',NULL,'0000-00-00 00:00:00',0),
	(529,'Moya',27,'2017-10-06 10:45:59',NULL,'0000-00-00 00:00:00',0),
	(530,'Paikoro',27,'2017-10-06 10:45:59',NULL,'0000-00-00 00:00:00',0),
	(531,'Rafi',27,'2017-10-06 10:45:59',NULL,'0000-00-00 00:00:00',0),
	(532,'Rijau',27,'2017-10-06 10:45:59',NULL,'0000-00-00 00:00:00',0),
	(533,'Shiroro',27,'2017-10-06 10:45:59',NULL,'0000-00-00 00:00:00',0),
	(534,'Suleja',27,'2017-10-06 10:45:59',NULL,'0000-00-00 00:00:00',0),
	(535,'Tafa',27,'2017-10-06 10:45:59',NULL,'0000-00-00 00:00:00',0),
	(536,'Wushishi',27,'2017-10-06 10:45:59',NULL,'0000-00-00 00:00:00',0),
	(537,'Abeokuta South',28,'2017-10-06 10:45:59',NULL,'0000-00-00 00:00:00',0),
	(538,'Ado-Odo/Ota',28,'2017-10-06 10:45:59',NULL,'0000-00-00 00:00:00',0),
	(539,'Egbado North',28,'2017-10-06 10:45:59',NULL,'0000-00-00 00:00:00',0),
	(540,'Egbado South',28,'2017-10-06 10:45:59',NULL,'0000-00-00 00:00:00',0),
	(541,'Ewekoro',28,'2017-10-06 10:45:59',NULL,'0000-00-00 00:00:00',0),
	(542,'Ifo',28,'2017-10-06 10:45:59',NULL,'0000-00-00 00:00:00',0),
	(543,'Ijebu East',28,'2017-10-06 10:45:59',NULL,'0000-00-00 00:00:00',0),
	(544,'Ijebu North',28,'2017-10-06 10:45:59',NULL,'0000-00-00 00:00:00',0),
	(545,'Ijebu North East',28,'2017-10-06 10:45:59',NULL,'0000-00-00 00:00:00',0),
	(546,'Ijebu Ode',28,'2017-10-06 10:45:59',NULL,'0000-00-00 00:00:00',0),
	(547,'Ikenne',28,'2017-10-06 10:45:59',NULL,'0000-00-00 00:00:00',0),
	(548,'Imeko Afon',28,'2017-10-06 10:45:59',NULL,'0000-00-00 00:00:00',0),
	(549,'Ipokia',28,'2017-10-06 10:45:59',NULL,'0000-00-00 00:00:00',0),
	(550,'Obafemi Owode',28,'2017-10-06 10:45:59',NULL,'0000-00-00 00:00:00',0),
	(551,'Odeda',28,'2017-10-06 10:45:59',NULL,'0000-00-00 00:00:00',0),
	(552,'Odogbolu',28,'2017-10-06 10:45:59',NULL,'0000-00-00 00:00:00',0),
	(553,'Ogun Waterside',28,'2017-10-06 10:45:59',NULL,'0000-00-00 00:00:00',0),
	(554,'Remo North',28,'2017-10-06 10:45:59',NULL,'0000-00-00 00:00:00',0),
	(555,'Shagamu',28,'2017-10-06 10:45:59',NULL,'0000-00-00 00:00:00',0),
	(556,'Akoko North-West',29,'2017-10-06 10:45:59',NULL,'0000-00-00 00:00:00',0),
	(557,'Akoko South-West',29,'2017-10-06 10:45:59',NULL,'0000-00-00 00:00:00',0),
	(558,'Akoko South-East',29,'2017-10-06 10:45:59',NULL,'0000-00-00 00:00:00',0),
	(559,'Akure North',29,'2017-10-06 10:45:59',NULL,'0000-00-00 00:00:00',0),
	(560,'Akure South',29,'2017-10-06 10:45:59',NULL,'0000-00-00 00:00:00',0),
	(561,'Ese Odo',29,'2017-10-06 10:45:59',NULL,'0000-00-00 00:00:00',0),
	(562,'Idanre',29,'2017-10-06 10:45:59',NULL,'0000-00-00 00:00:00',0),
	(563,'Ifedore',29,'2017-10-06 10:45:59',NULL,'0000-00-00 00:00:00',0),
	(564,'Ilaje',29,'2017-10-06 10:45:59',NULL,'0000-00-00 00:00:00',0),
	(565,'Ile Oluji/Okeigbo',29,'2017-10-06 10:45:59',NULL,'0000-00-00 00:00:00',0),
	(566,'Irele',29,'2017-10-06 10:45:59',NULL,'0000-00-00 00:00:00',0),
	(567,'Odigbo',29,'2017-10-06 10:45:59',NULL,'0000-00-00 00:00:00',0),
	(568,'Okitipupa',29,'2017-10-06 10:45:59',NULL,'0000-00-00 00:00:00',0),
	(569,'Ondo East',29,'2017-10-06 10:45:59',NULL,'0000-00-00 00:00:00',0),
	(570,'Ondo West',29,'2017-10-06 10:45:59',NULL,'0000-00-00 00:00:00',0),
	(571,'Ose',29,'2017-10-06 10:45:59',NULL,'0000-00-00 00:00:00',0),
	(572,'Owo',29,'2017-10-06 10:45:59',NULL,'0000-00-00 00:00:00',0),
	(573,'Atakunmosa West',30,'2017-10-06 10:45:59',NULL,'0000-00-00 00:00:00',0),
	(574,'Aiyedaade',30,'2017-10-06 10:45:59',NULL,'0000-00-00 00:00:00',0),
	(575,'Aiyedire',30,'2017-10-06 10:45:59',NULL,'0000-00-00 00:00:00',0),
	(576,'Boluwaduro',30,'2017-10-06 10:45:59',NULL,'0000-00-00 00:00:00',0),
	(577,'Boripe',30,'2017-10-06 10:45:59',NULL,'0000-00-00 00:00:00',0),
	(578,'Ede North',30,'2017-10-06 10:45:59',NULL,'0000-00-00 00:00:00',0),
	(579,'Ede South',30,'2017-10-06 10:45:59',NULL,'0000-00-00 00:00:00',0),
	(580,'Ife Central',30,'2017-10-06 10:45:59',NULL,'0000-00-00 00:00:00',0),
	(581,'Ife East',30,'2017-10-06 10:45:59',NULL,'0000-00-00 00:00:00',0),
	(582,'Ife North',30,'2017-10-06 10:45:59',NULL,'0000-00-00 00:00:00',0),
	(583,'Ife South',30,'2017-10-06 10:45:59',NULL,'0000-00-00 00:00:00',0),
	(584,'Egbedore',30,'2017-10-06 10:45:59',NULL,'0000-00-00 00:00:00',0),
	(585,'Ejigbo',30,'2017-10-06 10:45:59',NULL,'0000-00-00 00:00:00',0),
	(586,'Ifedayo',30,'2017-10-06 10:45:59',NULL,'0000-00-00 00:00:00',0),
	(587,'Ifelodun',30,'2017-10-06 10:45:59',NULL,'0000-00-00 00:00:00',0),
	(588,'Ila',30,'2017-10-06 10:45:59',NULL,'0000-00-00 00:00:00',0),
	(589,'Ilesa East',30,'2017-10-06 10:45:59',NULL,'0000-00-00 00:00:00',0),
	(590,'Ilesa West',30,'2017-10-06 10:45:59',NULL,'0000-00-00 00:00:00',0),
	(591,'Irepodun',30,'2017-10-06 10:45:59',NULL,'0000-00-00 00:00:00',0),
	(592,'Irewole',30,'2017-10-06 10:45:59',NULL,'0000-00-00 00:00:00',0),
	(593,'Isokan',30,'2017-10-06 10:45:59',NULL,'0000-00-00 00:00:00',0),
	(594,'Iwo',30,'2017-10-06 10:45:59',NULL,'0000-00-00 00:00:00',0),
	(595,'Obokun',30,'2017-10-06 10:45:59',NULL,'0000-00-00 00:00:00',0),
	(596,'Odo Otin',30,'2017-10-06 10:45:59',NULL,'0000-00-00 00:00:00',0),
	(597,'Ola Oluwa',30,'2017-10-06 10:45:59',NULL,'0000-00-00 00:00:00',0),
	(598,'Olorunda',30,'2017-10-06 10:45:59',NULL,'0000-00-00 00:00:00',0),
	(599,'Oriade',30,'2017-10-06 10:45:59',NULL,'0000-00-00 00:00:00',0),
	(600,'Orolu',30,'2017-10-06 10:45:59',NULL,'0000-00-00 00:00:00',0),
	(601,'Osogbo',30,'2017-10-06 10:45:59',NULL,'0000-00-00 00:00:00',0),
	(602,'Akinyele',31,'2017-10-06 10:45:59',NULL,'0000-00-00 00:00:00',0),
	(603,'Atiba',31,'2017-10-06 10:45:59',NULL,'0000-00-00 00:00:00',0),
	(604,'Atisbo',31,'2017-10-06 10:45:59',NULL,'0000-00-00 00:00:00',0),
	(605,'Egbeda',31,'2017-10-06 10:45:59',NULL,'0000-00-00 00:00:00',0),
	(606,'Ibadan North',31,'2017-10-06 10:45:59',NULL,'0000-00-00 00:00:00',0),
	(607,'Ibadan North-East',31,'2017-10-06 10:45:59',NULL,'0000-00-00 00:00:00',0),
	(608,'Ibadan North-West',31,'2017-10-06 10:45:59',NULL,'0000-00-00 00:00:00',0),
	(609,'Ibadan South-East',31,'2017-10-06 10:45:59',NULL,'0000-00-00 00:00:00',0),
	(610,'Ibadan South-West',31,'2017-10-06 10:45:59',NULL,'0000-00-00 00:00:00',0),
	(611,'Ibarapa Central',31,'2017-10-06 10:45:59',NULL,'0000-00-00 00:00:00',0),
	(612,'Ibarapa East',31,'2017-10-06 10:45:59',NULL,'0000-00-00 00:00:00',0),
	(613,'Ibarapa North',31,'2017-10-06 10:45:59',NULL,'0000-00-00 00:00:00',0),
	(614,'Ido',31,'2017-10-06 10:45:59',NULL,'0000-00-00 00:00:00',0),
	(615,'Irepo',31,'2017-10-06 10:45:59',NULL,'0000-00-00 00:00:00',0),
	(616,'Iseyin',31,'2017-10-06 10:45:59',NULL,'0000-00-00 00:00:00',0),
	(617,'Itesiwaju',31,'2017-10-06 10:45:59',NULL,'0000-00-00 00:00:00',0),
	(618,'Iwajowa',31,'2017-10-06 10:45:59',NULL,'0000-00-00 00:00:00',0),
	(619,'Kajola',31,'2017-10-06 10:45:59',NULL,'0000-00-00 00:00:00',0),
	(620,'Lagelu',31,'2017-10-06 10:45:59',NULL,'0000-00-00 00:00:00',0),
	(621,'Ogbomosho North',31,'2017-10-06 10:45:59',NULL,'0000-00-00 00:00:00',0),
	(622,'Ogbomosho South',31,'2017-10-06 10:45:59',NULL,'0000-00-00 00:00:00',0),
	(623,'Ogo Oluwa',31,'2017-10-06 10:45:59',NULL,'0000-00-00 00:00:00',0),
	(624,'Olorunsogo',31,'2017-10-06 10:45:59',NULL,'0000-00-00 00:00:00',0),
	(625,'Oluyole',31,'2017-10-06 10:45:59',NULL,'0000-00-00 00:00:00',0),
	(626,'Ona Ara',31,'2017-10-06 10:45:59',NULL,'0000-00-00 00:00:00',0),
	(627,'Orelope',31,'2017-10-06 10:45:59',NULL,'0000-00-00 00:00:00',0),
	(628,'Ori Ire',31,'2017-10-06 10:45:59',NULL,'0000-00-00 00:00:00',0),
	(629,'Oyo',31,'2017-10-06 10:45:59',NULL,'0000-00-00 00:00:00',0),
	(630,'Oyo East',31,'2017-10-06 10:45:59',NULL,'0000-00-00 00:00:00',0),
	(631,'Saki East',31,'2017-10-06 10:45:59',NULL,'0000-00-00 00:00:00',0),
	(632,'Saki West',31,'2017-10-06 10:45:59',NULL,'0000-00-00 00:00:00',0),
	(633,'Surulere',31,'2017-10-06 10:45:59',NULL,'0000-00-00 00:00:00',0),
	(634,'Barkin Ladi',32,'2017-10-06 10:45:59',NULL,'0000-00-00 00:00:00',0),
	(635,'Bassa',32,'2017-10-06 10:45:59',NULL,'0000-00-00 00:00:00',0),
	(636,'Jos East',32,'2017-10-06 10:45:59',NULL,'0000-00-00 00:00:00',0),
	(637,'Jos North',32,'2017-10-06 10:45:59',NULL,'0000-00-00 00:00:00',0),
	(638,'Jos South',32,'2017-10-06 10:45:59',NULL,'0000-00-00 00:00:00',0),
	(639,'Kanam',32,'2017-10-06 10:45:59',NULL,'0000-00-00 00:00:00',0),
	(640,'Kanke',32,'2017-10-06 10:45:59',NULL,'0000-00-00 00:00:00',0),
	(641,'Langtang South',32,'2017-10-06 10:45:59',NULL,'0000-00-00 00:00:00',0),
	(642,'Langtang North',32,'2017-10-06 10:45:59',NULL,'0000-00-00 00:00:00',0),
	(643,'Mangu',32,'2017-10-06 10:45:59',NULL,'0000-00-00 00:00:00',0),
	(644,'Mikang',32,'2017-10-06 10:45:59',NULL,'0000-00-00 00:00:00',0),
	(645,'Pankshin',32,'2017-10-06 10:45:59',NULL,'0000-00-00 00:00:00',0),
	(646,'Qua\'an Pan',32,'2017-10-06 10:45:59',NULL,'0000-00-00 00:00:00',0),
	(647,'Riyom',32,'2017-10-06 10:45:59',NULL,'0000-00-00 00:00:00',0),
	(648,'Shendam',32,'2017-10-06 10:45:59',NULL,'0000-00-00 00:00:00',0),
	(649,'Wase',32,'2017-10-06 10:45:59',NULL,'0000-00-00 00:00:00',0),
	(650,'Ahoada East',33,'2017-10-06 10:45:59',NULL,'0000-00-00 00:00:00',0),
	(651,'Ahoada West',33,'2017-10-06 10:45:59',NULL,'0000-00-00 00:00:00',0),
	(652,'Akuku-Toru',33,'2017-10-06 10:45:59',NULL,'0000-00-00 00:00:00',0),
	(653,'Andoni',33,'2017-10-06 10:45:59',NULL,'0000-00-00 00:00:00',0),
	(654,'Asari-Toru',33,'2017-10-06 10:45:59',NULL,'0000-00-00 00:00:00',0),
	(655,'Bonny',33,'2017-10-06 10:45:59',NULL,'0000-00-00 00:00:00',0),
	(656,'Degema',33,'2017-10-06 10:45:59',NULL,'0000-00-00 00:00:00',0),
	(657,'Eleme',33,'2017-10-06 10:45:59',NULL,'0000-00-00 00:00:00',0),
	(658,'Emuoha',33,'2017-10-06 10:45:59',NULL,'0000-00-00 00:00:00',0),
	(659,'Etche',33,'2017-10-06 10:45:59',NULL,'0000-00-00 00:00:00',0),
	(660,'Gokana',33,'2017-10-06 10:45:59',NULL,'0000-00-00 00:00:00',0),
	(661,'Ikwerre',33,'2017-10-06 10:45:59',NULL,'0000-00-00 00:00:00',0),
	(662,'Khana',33,'2017-10-06 10:45:59',NULL,'0000-00-00 00:00:00',0),
	(663,'Obio/Akpor',33,'2017-10-06 10:45:59',NULL,'0000-00-00 00:00:00',0),
	(664,'Ogba/Egbema/Ndoni',33,'2017-10-06 10:45:59',NULL,'0000-00-00 00:00:00',0),
	(665,'Ogu/Bolo',33,'2017-10-06 10:45:59',NULL,'0000-00-00 00:00:00',0),
	(666,'Okrika',33,'2017-10-06 10:45:59',NULL,'0000-00-00 00:00:00',0),
	(667,'Omuma',33,'2017-10-06 10:45:59',NULL,'0000-00-00 00:00:00',0),
	(668,'Opobo/Nkoro',33,'2017-10-06 10:45:59',NULL,'0000-00-00 00:00:00',0),
	(669,'Oyigbo',33,'2017-10-06 10:45:59',NULL,'0000-00-00 00:00:00',0),
	(670,'Port Harcourt',33,'2017-10-06 10:45:59',NULL,'0000-00-00 00:00:00',0),
	(671,'Tai',33,'2017-10-06 10:45:59',NULL,'0000-00-00 00:00:00',0),
	(672,'Bodinga',34,'2017-10-06 10:45:59',NULL,'0000-00-00 00:00:00',0),
	(673,'Dange Shuni',34,'2017-10-06 10:45:59',NULL,'0000-00-00 00:00:00',0),
	(674,'Gada',34,'2017-10-06 10:45:59',NULL,'0000-00-00 00:00:00',0),
	(675,'Goronyo',34,'2017-10-06 10:45:59',NULL,'0000-00-00 00:00:00',0),
	(676,'Gudu',34,'2017-10-06 10:45:59',NULL,'0000-00-00 00:00:00',0),
	(677,'Gwadabawa',34,'2017-10-06 10:45:59',NULL,'0000-00-00 00:00:00',0),
	(678,'Illela',34,'2017-10-06 10:45:59',NULL,'0000-00-00 00:00:00',0),
	(679,'Isa',34,'2017-10-06 10:45:59',NULL,'0000-00-00 00:00:00',0),
	(680,'Kebbe',34,'2017-10-06 10:45:59',NULL,'0000-00-00 00:00:00',0),
	(681,'Kware',34,'2017-10-06 10:45:59',NULL,'0000-00-00 00:00:00',0),
	(682,'Rabah',34,'2017-10-06 10:45:59',NULL,'0000-00-00 00:00:00',0),
	(683,'Sabon Birni',34,'2017-10-06 10:45:59',NULL,'0000-00-00 00:00:00',0),
	(684,'Shagari',34,'2017-10-06 10:45:59',NULL,'0000-00-00 00:00:00',0),
	(685,'Silame',34,'2017-10-06 10:45:59',NULL,'0000-00-00 00:00:00',0),
	(686,'Sokoto North',34,'2017-10-06 10:45:59',NULL,'0000-00-00 00:00:00',0),
	(687,'Sokoto South',34,'2017-10-06 10:45:59',NULL,'0000-00-00 00:00:00',0),
	(688,'Tambuwal',34,'2017-10-06 10:45:59',NULL,'0000-00-00 00:00:00',0),
	(689,'Tangaza',34,'2017-10-06 10:45:59',NULL,'0000-00-00 00:00:00',0),
	(690,'Tureta',34,'2017-10-06 10:45:59',NULL,'0000-00-00 00:00:00',0),
	(691,'Wamako',34,'2017-10-06 10:45:59',NULL,'0000-00-00 00:00:00',0),
	(692,'Wurno',34,'2017-10-06 10:45:59',NULL,'0000-00-00 00:00:00',0),
	(693,'Yabo',34,'2017-10-06 10:45:59',NULL,'0000-00-00 00:00:00',0),
	(694,'Bali',35,'2017-10-06 10:45:59',NULL,'0000-00-00 00:00:00',0),
	(695,'Donga',35,'2017-10-06 10:45:59',NULL,'0000-00-00 00:00:00',0),
	(696,'Gashaka',35,'2017-10-06 10:45:59',NULL,'0000-00-00 00:00:00',0),
	(697,'Gassol',35,'2017-10-06 10:45:59',NULL,'0000-00-00 00:00:00',0),
	(698,'Ibi',35,'2017-10-06 10:45:59',NULL,'0000-00-00 00:00:00',0),
	(699,'Jalingo',35,'2017-10-06 10:45:59',NULL,'0000-00-00 00:00:00',0),
	(700,'Karim Lamido',35,'2017-10-06 10:45:59',NULL,'0000-00-00 00:00:00',0),
	(701,'Kumi',35,'2017-10-06 10:45:59',NULL,'0000-00-00 00:00:00',0),
	(702,'Lau',35,'2017-10-06 10:45:59',NULL,'0000-00-00 00:00:00',0),
	(703,'Sardauna',35,'2017-10-06 10:45:59',NULL,'0000-00-00 00:00:00',0),
	(704,'Takum',35,'2017-10-06 10:45:59',NULL,'0000-00-00 00:00:00',0),
	(705,'Ussa',35,'2017-10-06 10:45:59',NULL,'0000-00-00 00:00:00',0),
	(706,'Wukari',35,'2017-10-06 10:45:59',NULL,'0000-00-00 00:00:00',0),
	(707,'Yorro',35,'2017-10-06 10:45:59',NULL,'0000-00-00 00:00:00',0),
	(708,'Zing',35,'2017-10-06 10:45:59',NULL,'0000-00-00 00:00:00',0),
	(709,'Bursari',36,'2017-10-06 10:45:59',NULL,'0000-00-00 00:00:00',0),
	(710,'Damaturu',36,'2017-10-06 10:45:59',NULL,'0000-00-00 00:00:00',0),
	(711,'Fika',36,'2017-10-06 10:45:59',NULL,'0000-00-00 00:00:00',0),
	(712,'Fune',36,'2017-10-06 10:45:59',NULL,'0000-00-00 00:00:00',0),
	(713,'Geidam',36,'2017-10-06 10:45:59',NULL,'0000-00-00 00:00:00',0),
	(714,'Gujba',36,'2017-10-06 10:45:59',NULL,'0000-00-00 00:00:00',0),
	(715,'Gulani',36,'2017-10-06 10:45:59',NULL,'0000-00-00 00:00:00',0),
	(716,'Jakusko',36,'2017-10-06 10:45:59',NULL,'0000-00-00 00:00:00',0),
	(717,'Karasuwa',36,'2017-10-06 10:45:59',NULL,'0000-00-00 00:00:00',0),
	(718,'Machina',36,'2017-10-06 10:45:59',NULL,'0000-00-00 00:00:00',0),
	(719,'Nangere',36,'2017-10-06 10:45:59',NULL,'0000-00-00 00:00:00',0),
	(720,'Nguru',36,'2017-10-06 10:45:59',NULL,'0000-00-00 00:00:00',0),
	(721,'Potiskum',36,'2017-10-06 10:45:59',NULL,'0000-00-00 00:00:00',0),
	(722,'Tarmuwa',36,'2017-10-06 10:45:59',NULL,'0000-00-00 00:00:00',0),
	(723,'Yunusari',36,'2017-10-06 10:45:59',NULL,'0000-00-00 00:00:00',0),
	(724,'Yusufari',36,'2017-10-06 10:45:59',NULL,'0000-00-00 00:00:00',0),
	(725,'Bakura',37,'2017-10-06 10:45:59',NULL,'0000-00-00 00:00:00',0),
	(726,'Birnin Magaji/Kiyaw',37,'2017-10-06 10:45:59',NULL,'0000-00-00 00:00:00',0),
	(727,'Bukkuyum',37,'2017-10-06 10:45:59',NULL,'0000-00-00 00:00:00',0),
	(728,'Bungudu',37,'2017-10-06 10:45:59',NULL,'0000-00-00 00:00:00',0),
	(729,'Gummi',37,'2017-10-06 10:45:59',NULL,'0000-00-00 00:00:00',0),
	(730,'Gusau',37,'2017-10-06 10:45:59',NULL,'0000-00-00 00:00:00',0),
	(731,'Kaura Namoda',37,'2017-10-06 10:45:59',NULL,'0000-00-00 00:00:00',0),
	(732,'Maradun',37,'2017-10-06 10:45:59',NULL,'0000-00-00 00:00:00',0),
	(733,'Maru',37,'2017-10-06 10:45:59',NULL,'0000-00-00 00:00:00',0),
	(734,'Shinkafi',37,'2017-10-06 10:45:59',NULL,'0000-00-00 00:00:00',0),
	(735,'Talata Mafara',37,'2017-10-06 10:45:59',NULL,'0000-00-00 00:00:00',0),
	(736,'Chafe',37,'2017-10-06 10:45:59',NULL,'0000-00-00 00:00:00',0),
	(737,'Zurmi',37,'2017-10-06 10:45:59',NULL,'0000-00-00 00:00:00',0),
	(738,'Agege',25,'2017-10-06 10:45:59',NULL,'0000-00-00 00:00:00',0);

/*!40000 ALTER TABLE `state_cities` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table states
# ------------------------------------------------------------

DROP TABLE IF EXISTS `states`;

CREATE TABLE `states` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `statename` varchar(100) NOT NULL DEFAULT '',
  `createdat` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updatedat` timestamp NULL DEFAULT NULL,
  `deletedat` timestamp NULL DEFAULT NULL,
  `isdeleted` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `states` WRITE;
/*!40000 ALTER TABLE `states` DISABLE KEYS */;

INSERT INTO `states` (`id`, `statename`, `createdat`, `updatedat`, `deletedat`, `isdeleted`)
VALUES
	(1,'Abia State','2017-10-06 10:49:50',NULL,'0000-00-00 00:00:00',0),
	(2,'Adamawa State','2017-10-06 10:49:50',NULL,'0000-00-00 00:00:00',0),
	(3,'Akwa Ibom State','2017-10-06 10:49:50',NULL,'0000-00-00 00:00:00',0),
	(4,'Anambra State','2017-10-06 10:49:50',NULL,'0000-00-00 00:00:00',0),
	(5,'Bauchi State','2017-10-06 10:49:50',NULL,'0000-00-00 00:00:00',0),
	(6,'Bayelsa State','2017-10-06 10:49:50',NULL,'0000-00-00 00:00:00',0),
	(7,'Benue State','2017-10-06 10:49:50',NULL,'0000-00-00 00:00:00',0),
	(8,'Borno State','2017-10-06 10:49:50',NULL,'0000-00-00 00:00:00',0),
	(9,'Cross River State','2017-10-06 10:49:50',NULL,'0000-00-00 00:00:00',0),
	(10,'Delta State','2017-10-06 10:49:50',NULL,'0000-00-00 00:00:00',0),
	(11,'Ebonyi State','2017-10-06 10:49:50',NULL,'0000-00-00 00:00:00',0),
	(12,'Edo State','2017-10-06 10:49:50',NULL,'0000-00-00 00:00:00',0),
	(13,'Ekiti State','2017-10-06 10:49:50',NULL,'0000-00-00 00:00:00',0),
	(14,'Enugu State','2017-10-06 10:49:50',NULL,'0000-00-00 00:00:00',0),
	(15,'FCT','2017-10-06 10:49:50',NULL,'0000-00-00 00:00:00',0),
	(16,'Gombe State','2017-10-06 10:49:50',NULL,'0000-00-00 00:00:00',0),
	(17,'Imo State','2017-10-06 10:49:50',NULL,'0000-00-00 00:00:00',0),
	(18,'Jigawa State','2017-10-06 10:49:50',NULL,'0000-00-00 00:00:00',0),
	(19,'Kaduna State','2017-10-06 10:49:50',NULL,'0000-00-00 00:00:00',0),
	(20,'Kano State','2017-10-06 10:49:50',NULL,'0000-00-00 00:00:00',0),
	(21,'Katsina State','2017-10-06 10:49:50',NULL,'0000-00-00 00:00:00',0),
	(22,'Kebbi State','2017-10-06 10:49:50',NULL,'0000-00-00 00:00:00',0),
	(23,'Kogi State','2017-10-06 10:49:50',NULL,'0000-00-00 00:00:00',0),
	(24,'Kwara State','2017-10-06 10:49:50',NULL,'0000-00-00 00:00:00',0),
	(25,'Lagos State','2017-10-06 10:49:50',NULL,'0000-00-00 00:00:00',0),
	(26,'Nasarawa State','2017-10-06 10:49:50',NULL,'0000-00-00 00:00:00',0),
	(27,'Niger State','2017-10-06 10:49:50',NULL,'0000-00-00 00:00:00',0),
	(28,'Ogun State','2017-10-06 10:49:50',NULL,'0000-00-00 00:00:00',0),
	(29,'Ondo State','2017-10-06 10:49:50',NULL,'0000-00-00 00:00:00',0),
	(30,'Osun State','2017-10-06 10:49:50',NULL,'0000-00-00 00:00:00',0),
	(31,'Oyo State','2017-10-06 10:49:50',NULL,'0000-00-00 00:00:00',0),
	(32,'Plateau State','2017-10-06 10:49:50',NULL,'0000-00-00 00:00:00',0),
	(33,'Rivers State','2017-10-06 10:49:50',NULL,'0000-00-00 00:00:00',0),
	(34,'Sokoto State','2017-10-06 10:49:50',NULL,'0000-00-00 00:00:00',0),
	(35,'Taraba State','2017-10-06 10:49:50',NULL,'0000-00-00 00:00:00',0),
	(36,'Yobe State','2017-10-06 10:49:50',NULL,'0000-00-00 00:00:00',0),
	(37,'Zamfara State','2017-10-06 10:49:50',NULL,'0000-00-00 00:00:00',0);

/*!40000 ALTER TABLE `states` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table system_audit
# ------------------------------------------------------------

DROP TABLE IF EXISTS `system_audit`;

CREATE TABLE `system_audit` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `actionPerformed` varchar(255) NOT NULL,
  `userID` int(11) NOT NULL,
  `IPAddress` varchar(255) NOT NULL,
  `dateTime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `browser` varchar(255) NOT NULL,
  `userAgent` varchar(255) NOT NULL,
  `platform` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `system_audit` WRITE;
/*!40000 ALTER TABLE `system_audit` DISABLE KEYS */;

INSERT INTO `system_audit` (`id`, `actionPerformed`, `userID`, `IPAddress`, `dateTime`, `browser`, `userAgent`, `platform`)
VALUES
	(1,'User logged in successfully',25,'::1','2017-09-25 13:49:00','Chrome','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_12_6) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/60.0.3112.113 Safari/537.36','Mac OS X'),
	(2,'User logged in successfully',25,'::1','2017-09-25 13:50:00','Chrome','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_12_6) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/60.0.3112.113 Safari/537.36','Mac OS X');

/*!40000 ALTER TABLE `system_audit` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table system_modules
# ------------------------------------------------------------

DROP TABLE IF EXISTS `system_modules`;

CREATE TABLE `system_modules` (
  `moduleID` int(11) NOT NULL AUTO_INCREMENT,
  `controlerName` varchar(50) DEFAULT NULL,
  `Description` varchar(255) DEFAULT '',
  `moduleStatus` int(11) DEFAULT NULL,
  PRIMARY KEY (`moduleID`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

LOCK TABLES `system_modules` WRITE;
/*!40000 ALTER TABLE `system_modules` DISABLE KEYS */;

INSERT INTO `system_modules` (`moduleID`, `controlerName`, `Description`, `moduleStatus`)
VALUES
	(4,'Transaction::index','View All Transactions',1),
	(3,'Merchant::savedata','Save Store Information',1),
	(2,'Merchant::loadform','View Store Add/Edit form',1),
	(1,'Merchant::index','View All Stores',1),
	(8,'Product::index','View All Products',1),
	(9,'Product::loadform','View Product Add/Edit Form',1),
	(10,'Product::savedata','Save Product Information',1),
	(11,'Product::delete','Delete Products',1),
	(12,'User_role::index','User Roles Listing',1),
	(13,'User_role::loadForm','View Permissions',1),
	(14,'User_role::saveData','Edit/Save User Permissions',1),
	(15,'User::index','Users Listing',1),
	(16,'User::loadForm','View System Users',1),
	(17,'User::saveData','Edit/Save System User',1),
	(18,'Orangecard::index','View All Orange Cards',1),
	(19,'Orangecard::loadform','Load Add/Edit Orange Card Form',1),
	(20,'Orangecard::savedata','Save Orange Card Information',1),
	(21,'Orangecard::delete','Delete Orange Card',1),
	(22,'Orangecard::upload','Bulk Upload Orange Cards',1),
	(23,'Merchant::delete','Delete Stores and Pharmacies',1),
	(24,'User::activate','Activate a user',1),
	(25,'User::deactivate','De-activate a user',1),
	(26,'User::delete','Delete Users',1),
	(27,'User::resetpassword','Reset User Password',1),
	(7,'Customer::index','View All Customers',1),
	(6,'Transaction::unsettled','View All Unsettled VAT Transaction',1),
	(5,'Transaction::loadform','Load Transaction Details Form',1),
	(28,'Merchant::cardgiveoutform','Orange Card Give Out Form',1),
	(29,'Merchant::cardgiveout','Give Out Orange Cards',1),
	(30,'Pharmacy::index','View All Pharmacies',1),
	(31,'Pharmacy::loadform','View Pharmacy Add/Edit form',1),
	(32,'Pharmacy::savedata','Save Pharmacy Information',1),
	(33,'Pharmacy::delete','Delete Pharmacies',1),
	(34,'Merchant::upload','Bulk Upload Stores',1),
	(35,'Pharmacy::upload','Bulk Upload Pharmacies',1),
	(36,'User::upload','Bulk Upload Users',1),
	(37,'Orangecard::activate','Activate Orange Card',1),
	(38,'Orangecard::deactivate','De-activate Orange Card',1);

/*!40000 ALTER TABLE `system_modules` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table user_roles
# ------------------------------------------------------------

DROP TABLE IF EXISTS `user_roles`;

CREATE TABLE `user_roles` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `roleName` varchar(30) CHARACTER SET latin1 DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `stationID` int(11) DEFAULT NULL,
  `createdat` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updatedat` timestamp NULL DEFAULT NULL,
  `deletedat` timestamp NULL DEFAULT NULL,
  `isdeleted` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `uniqueName` (`roleName`,`stationID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `user_roles` WRITE;
/*!40000 ALTER TABLE `user_roles` DISABLE KEYS */;

INSERT INTO `user_roles` (`id`, `roleName`, `status`, `stationID`, `createdat`, `updatedat`, `deletedat`, `isdeleted`)
VALUES
	(1,'Super Admin',1,1,'2017-10-06 14:40:25',NULL,NULL,0);

/*!40000 ALTER TABLE `user_roles` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table users
# ------------------------------------------------------------

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `userroleid` int(11) DEFAULT NULL,
  `firstname` varchar(30) CHARACTER SET latin1 DEFAULT NULL,
  `lastname` varchar(30) CHARACTER SET latin1 DEFAULT NULL,
  `email` varchar(30) CHARACTER SET latin1 DEFAULT NULL,
  `phonenumber` varchar(20) CHARACTER SET latin1 DEFAULT NULL,
  `merchantid` int(11) DEFAULT NULL,
  `username` varchar(20) CHARACTER SET latin1 DEFAULT NULL,
  `password` varchar(255) CHARACTER SET latin1 DEFAULT '',
  `userstatus` int(11) DEFAULT NULL,
  `accesstype` tinyint(4) DEFAULT NULL,
  `forcepasswordchange` tinyint(4) DEFAULT '0',
  `lastLogin` datetime DEFAULT NULL,
  `lastLoginIP` varchar(30) CHARACTER SET latin1 DEFAULT NULL,
  `passwordresettoken` varchar(255) CHARACTER SET latin1 DEFAULT NULL,
  `createdat` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updatedat` timestamp NULL DEFAULT NULL,
  `deletedat` timestamp NULL DEFAULT NULL,
  `isdeleted` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;

INSERT INTO `users` (`id`, `userroleid`, `firstname`, `lastname`, `email`, `phonenumber`, `merchantid`, `username`, `password`, `userstatus`, `accesstype`, `forcepasswordchange`, `lastLogin`, `lastLoginIP`, `passwordresettoken`, `createdat`, `updatedat`, `deletedat`, `isdeleted`)
VALUES
	(7,1,'OLUWASEUN','OLUDELE','seun@oludeleseun.com','08032530125',NULL,'oludeleseun','c5864e0679a35c03abd1c36ad81c8d20',1,1,0,NULL,'127.0.0.1',NULL,'2017-05-24 06:07:12',NULL,NULL,0),
	(11,1,'Obianuju','Ezeanyangu','uju@softcom.ng','07031312454',70002,'softcom-admin','c5864e0679a35c03abd1c36ad81c8d20',1,2,NULL,NULL,NULL,NULL,'2017-05-24 06:07:12',NULL,NULL,0),
	(12,1,'Medplus','Admin','seun@oludeleseun.com','08032530125',70001,'medplusikeja','dad40339cf9ecde78ef6d9ae3b0dcb6f',1,2,1,NULL,'',NULL,'2017-05-24 06:07:12',NULL,NULL,0),
	(13,1,'Admin','GSK','uju@softcom.ng','08032530125',0,'gsk-admin','30ee699bd369d7989888ad5b4599b778',0,1,NULL,NULL,NULL,NULL,'2017-10-06 14:34:38',NULL,NULL,0),
	(14,0,'Riordan','Dolores','seun@oludele.com','08032530125',70002,'dolores.chan','c5864e0679a35c03abd1c36ad81c8d20',1,2,0,NULL,NULL,NULL,'2017-10-06 14:34:38',NULL,NULL,0),
	(21,1,'O\'RIORDAN','DOLORES','oludeleseun@gmail.com','08032530125',0,'dolores.seun','c5864e0679a35c03abd1c36ad81c8d20',1,1,1,NULL,NULL,NULL,'2017-10-06 14:34:38','2017-07-06 07:10:07',NULL,0),
	(22,1,'Mark','Baeka','didiokoh@gmail.com','07061113853',0,'ndudi.okoh1','c5864e0679a35c03abd1c36ad81c8d20',1,1,0,NULL,NULL,NULL,'2017-06-23 19:10:18','2017-07-06 05:58:02',NULL,0),
	(24,1,'Oluwaseun','Oludele','seun@stakle.com','08032530125',70004,'seun01','2ac9cb7dc02b3c0083eb70898e549b63',1,2,0,NULL,NULL,NULL,'2017-09-05 16:33:39',NULL,NULL,0),
	(25,1,'oy3','trivin','oye@ebs.com','0800989522',201,'oy3','21232f297a57a5a743894a0e4a801fc3',1,0,1,NULL,'::1',NULL,'2017-10-06 14:34:38',NULL,NULL,0);

/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;



/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
