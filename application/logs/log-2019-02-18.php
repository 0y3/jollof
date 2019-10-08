<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

ERROR - 2019-02-18 00:04:17 --> Query error: Unknown column 'orderlistdetails.status' in 'where clause' - Invalid query: SELECT COUNT(*) AS `numrows`
FROM `ordergiftportal`
LEFT JOIN `accounts` ON `ordergiftportal`.`accountid` = `accounts`.`id`
LEFT JOIN `accountaddresses` ON `accountaddresses`.`id` = `ordergiftportal`.`accountaddressid`
LEFT JOIN `orderstatus` ON `ordergiftportal`.`status` = `orderstatus`.`id`
WHERE `orderlistdetails`.`status` = 1
AND `ordergiftportal`.`isdeleted` =0
ERROR - 2019-02-18 00:06:52 --> Query error: Table 'jollofdb1.ordergiftporttal' doesn't exist - Invalid query: SELECT COUNT(*) AS `numrows`
FROM `ordergiftporttal`
LEFT JOIN `accounts` ON `ordergiftportal`.`accountid` = `accounts`.`id`
LEFT JOIN `accountaddresses` ON `accountaddresses`.`id` = `ordergiftportal`.`accountaddressid`
LEFT JOIN `orderstatus` ON `ordergiftportal`.`status` = `orderstatus`.`id`
WHERE `orderlistdetails`.`status` = 1
AND `ordergiftportal`.`isdeleted` =0
ERROR - 2019-02-18 00:10:53 --> Severity: Warning --> include_once(giftpotal-order-list.php): failed to open stream: No such file or directory C:\xampp\htdocs\JollofCuisineWeb1\application\views\jollof_admin\layout.php 395
ERROR - 2019-02-18 00:10:53 --> Severity: Warning --> include_once(): Failed opening 'giftpotal-order-list.php' for inclusion (include_path='C:\xampp\php\PEAR') C:\xampp\htdocs\JollofCuisineWeb1\application\views\jollof_admin\layout.php 395
ERROR - 2019-02-18 00:11:47 --> Severity: Notice --> Undefined index: slug C:\xampp\htdocs\JollofCuisineWeb1\application\views\jollof_admin\giftportal-order-list.php 208
ERROR - 2019-02-18 00:11:47 --> Severity: Notice --> Undefined index: companyname C:\xampp\htdocs\JollofCuisineWeb1\application\views\jollof_admin\giftportal-order-list.php 208
ERROR - 2019-02-18 00:11:47 --> Severity: Notice --> Undefined index: merchanttype C:\xampp\htdocs\JollofCuisineWeb1\application\views\jollof_admin\giftportal-order-list.php 209
ERROR - 2019-02-18 00:11:47 --> Severity: Notice --> Undefined index: price C:\xampp\htdocs\JollofCuisineWeb1\application\views\jollof_admin\giftportal-order-list.php 218
ERROR - 2019-02-18 00:11:47 --> Severity: Notice --> Undefined index: deliverytype C:\xampp\htdocs\JollofCuisineWeb1\application\views\jollof_admin\giftportal-order-list.php 222
ERROR - 2019-02-18 00:14:13 --> Severity: Notice --> Undefined index: price C:\xampp\htdocs\JollofCuisineWeb1\application\views\jollof_admin\giftportal-order-list.php 216
ERROR - 2019-02-18 00:14:13 --> Severity: Notice --> Undefined index: deliverytype C:\xampp\htdocs\JollofCuisineWeb1\application\views\jollof_admin\giftportal-order-list.php 220
ERROR - 2019-02-18 00:14:51 --> Severity: Notice --> Undefined index: deliverytype C:\xampp\htdocs\JollofCuisineWeb1\application\views\jollof_admin\giftportal-order-list.php 220
ERROR - 2019-02-18 00:16:32 --> Query error: Unknown column 'orderlistdetails.status' in 'where clause' - Invalid query: SELECT `ordergiftportal`.*, `accounts`.`firstname` as `account_firstname`, `accounts`.`lastname` as `account_lastname`, `accounts`.`usertype` as `account_usertype`, `accountaddresses`.`lastname` as `address_lastname`, `accountaddresses`.`firstname` as `address_firstname`, `accountaddresses`.`address`, `accountaddresses`.`phone`, `ordergiftportal`.`status` as `orderstatus`, `orderstatus`.`orderstatus_desc`
FROM `ordergiftportal`
LEFT JOIN `accounts` ON `ordergiftportal`.`accountid` = `accounts`.`id`
LEFT JOIN `accountaddresses` ON `accountaddresses`.`id` = `ordergiftportal`.`accountaddressid`
LEFT JOIN `orderstatus` ON `ordergiftportal`.`status` = `orderstatus`.`id`
WHERE `orderlistdetails`.`status` = '2'
AND `ordergiftportal`.`isdeleted` =0
ORDER BY `ordergiftportal`.`createdat` DESC
 LIMIT 25
ERROR - 2019-02-18 00:16:45 --> Query error: Unknown column 'orderlistdetails.status' in 'where clause' - Invalid query: SELECT `ordergiftportal`.*, `accounts`.`firstname` as `account_firstname`, `accounts`.`lastname` as `account_lastname`, `accounts`.`usertype` as `account_usertype`, `accountaddresses`.`lastname` as `address_lastname`, `accountaddresses`.`firstname` as `address_firstname`, `accountaddresses`.`address`, `accountaddresses`.`phone`, `ordergiftportal`.`status` as `orderstatus`, `orderstatus`.`orderstatus_desc`
FROM `ordergiftportal`
LEFT JOIN `accounts` ON `ordergiftportal`.`accountid` = `accounts`.`id`
LEFT JOIN `accountaddresses` ON `accountaddresses`.`id` = `ordergiftportal`.`accountaddressid`
LEFT JOIN `orderstatus` ON `ordergiftportal`.`status` = `orderstatus`.`id`
WHERE `orderlistdetails`.`status` = '1'
AND `ordergiftportal`.`isdeleted` =0
ORDER BY `ordergiftportal`.`createdat` DESC
 LIMIT 25
ERROR - 2019-02-18 00:17:25 --> Query error: Unknown column 'orderlistdetails.status' in 'where clause' - Invalid query: SELECT `ordergiftportal`.*, `accounts`.`firstname` as `account_firstname`, `accounts`.`lastname` as `account_lastname`, `accounts`.`usertype` as `account_usertype`, `accountaddresses`.`lastname` as `address_lastname`, `accountaddresses`.`firstname` as `address_firstname`, `accountaddresses`.`address`, `accountaddresses`.`phone`, `ordergiftportal`.`status` as `orderstatus`, `orderstatus`.`orderstatus_desc`
FROM `ordergiftportal`
LEFT JOIN `accounts` ON `ordergiftportal`.`accountid` = `accounts`.`id`
LEFT JOIN `accountaddresses` ON `accountaddresses`.`id` = `ordergiftportal`.`accountaddressid`
LEFT JOIN `orderstatus` ON `ordergiftportal`.`status` = `orderstatus`.`id`
WHERE `orderlistdetails`.`status` = '1'
AND `ordergiftportal`.`isdeleted` =0
ORDER BY `ordergiftportal`.`createdat` DESC
 LIMIT 25
ERROR - 2019-02-18 00:19:04 --> Query error: Unknown column 'orderlistdetails.status' in 'where clause' - Invalid query: SELECT `ordergiftportal`.*, `accounts`.`firstname` as `account_firstname`, `accounts`.`lastname` as `account_lastname`, `accounts`.`usertype` as `account_usertype`, `accountaddresses`.`lastname` as `address_lastname`, `accountaddresses`.`firstname` as `address_firstname`, `accountaddresses`.`address`, `accountaddresses`.`phone`, `ordergiftportal`.`status` as `orderstatus`, `orderstatus`.`orderstatus_desc`
FROM `ordergiftportal`
LEFT JOIN `accounts` ON `ordergiftportal`.`accountid` = `accounts`.`id`
LEFT JOIN `accountaddresses` ON `accountaddresses`.`id` = `ordergiftportal`.`accountaddressid`
LEFT JOIN `orderstatus` ON `ordergiftportal`.`status` = `orderstatus`.`id`
WHERE `orderlistdetails`.`status` = '1'
AND `ordergiftportal`.`isdeleted` =0
ORDER BY `ordergiftportal`.`createdat` DESC
 LIMIT 25
ERROR - 2019-02-18 00:19:23 --> Query error: Unknown column 'orderlistdetails.productname' in 'where clause' - Invalid query: SELECT `ordergiftportal`.*, `accounts`.`firstname` as `account_firstname`, `accounts`.`lastname` as `account_lastname`, `accounts`.`usertype` as `account_usertype`, `accountaddresses`.`lastname` as `address_lastname`, `accountaddresses`.`firstname` as `address_firstname`, `accountaddresses`.`address`, `accountaddresses`.`phone`, `ordergiftportal`.`status` as `orderstatus`, `orderstatus`.`orderstatus_desc`
FROM `ordergiftportal`
LEFT JOIN `accounts` ON `ordergiftportal`.`accountid` = `accounts`.`id`
LEFT JOIN `accountaddresses` ON `accountaddresses`.`id` = `ordergiftportal`.`accountaddressid`
LEFT JOIN `orderstatus` ON `ordergiftportal`.`status` = `orderstatus`.`id`
WHERE `orderlistdetails`.`productname` LIKE '%dodod%' ESCAPE '!'
AND `ordergiftportal`.`isdeleted` =0
ORDER BY `ordergiftportal`.`createdat` DESC
 LIMIT 25
ERROR - 2019-02-18 00:20:17 --> Query error: Unknown column 'orderlistdetails.productname' in 'where clause' - Invalid query: SELECT `ordergiftportal`.*, `accounts`.`firstname` as `account_firstname`, `accounts`.`lastname` as `account_lastname`, `accounts`.`usertype` as `account_usertype`, `accountaddresses`.`lastname` as `address_lastname`, `accountaddresses`.`firstname` as `address_firstname`, `accountaddresses`.`address`, `accountaddresses`.`phone`, `ordergiftportal`.`status` as `orderstatus`, `orderstatus`.`orderstatus_desc`
FROM `ordergiftportal`
LEFT JOIN `accounts` ON `ordergiftportal`.`accountid` = `accounts`.`id`
LEFT JOIN `accountaddresses` ON `accountaddresses`.`id` = `ordergiftportal`.`accountaddressid`
LEFT JOIN `orderstatus` ON `ordergiftportal`.`status` = `orderstatus`.`id`
WHERE `orderlistdetails`.`productname` LIKE '%bddd%' ESCAPE '!'
AND `ordergiftportal`.`isdeleted` =0
ORDER BY `ordergiftportal`.`createdat` DESC
 LIMIT 25
ERROR - 2019-02-18 00:22:04 --> Query error: Unknown column 'orderlistdetails.productname' in 'where clause' - Invalid query: SELECT `ordergiftportal`.*, `accounts`.`firstname` as `account_firstname`, `accounts`.`lastname` as `account_lastname`, `accounts`.`usertype` as `account_usertype`, `accountaddresses`.`lastname` as `address_lastname`, `accountaddresses`.`firstname` as `address_firstname`, `accountaddresses`.`address`, `accountaddresses`.`phone`, `ordergiftportal`.`status` as `orderstatus`, `orderstatus`.`orderstatus_desc`
FROM `ordergiftportal`
LEFT JOIN `accounts` ON `ordergiftportal`.`accountid` = `accounts`.`id`
LEFT JOIN `accountaddresses` ON `accountaddresses`.`id` = `ordergiftportal`.`accountaddressid`
LEFT JOIN `orderstatus` ON `ordergiftportal`.`status` = `orderstatus`.`id`
WHERE `orderlistdetails`.`productname` LIKE '%hjckjd%' ESCAPE '!'
AND `ordergiftportal`.`isdeleted` =0
ORDER BY `ordergiftportal`.`createdat` DESC
 LIMIT 25
ERROR - 2019-02-18 00:32:12 --> Query error: Unknown column 'orderlistdetails.status' in 'where clause' - Invalid query: SELECT `ordergiftportal`.*, `accounts`.`firstname` as `account_firstname`, `accounts`.`lastname` as `account_lastname`, `accounts`.`usertype` as `account_usertype`, `accountaddresses`.`lastname` as `address_lastname`, `accountaddresses`.`firstname` as `address_firstname`, `accountaddresses`.`address`, `accountaddresses`.`phone`, `ordergiftportal`.`status` as `orderstatus`, `orderstatus`.`orderstatus_desc`
FROM `ordergiftportal`
LEFT JOIN `accounts` ON `ordergiftportal`.`accountid` = `accounts`.`id`
LEFT JOIN `accountaddresses` ON `accountaddresses`.`id` = `ordergiftportal`.`accountaddressid`
LEFT JOIN `orderstatus` ON `ordergiftportal`.`status` = `orderstatus`.`id`
WHERE `orderlistdetails`.`status` = '2'
AND `ordergiftportal`.`isdeleted` =0
ORDER BY `ordergiftportal`.`createdat` DESC
 LIMIT 25
ERROR - 2019-02-18 00:32:22 --> Query error: Unknown column 'orderlistdetails.status' in 'where clause' - Invalid query: SELECT `ordergiftportal`.*, `accounts`.`firstname` as `account_firstname`, `accounts`.`lastname` as `account_lastname`, `accounts`.`usertype` as `account_usertype`, `accountaddresses`.`lastname` as `address_lastname`, `accountaddresses`.`firstname` as `address_firstname`, `accountaddresses`.`address`, `accountaddresses`.`phone`, `ordergiftportal`.`status` as `orderstatus`, `orderstatus`.`orderstatus_desc`
FROM `ordergiftportal`
LEFT JOIN `accounts` ON `ordergiftportal`.`accountid` = `accounts`.`id`
LEFT JOIN `accountaddresses` ON `accountaddresses`.`id` = `ordergiftportal`.`accountaddressid`
LEFT JOIN `orderstatus` ON `ordergiftportal`.`status` = `orderstatus`.`id`
WHERE `orderlistdetails`.`status` = '2'
AND `ordergiftportal`.`isdeleted` =0
ORDER BY `ordergiftportal`.`createdat` DESC
 LIMIT 25
ERROR - 2019-02-18 10:06:24 --> 404 Page Not Found: Assets/admin
ERROR - 2019-02-18 10:06:32 --> Severity: Warning --> Invalid argument supplied for foreach() C:\xampp\htdocs\JollofCuisineWeb1\application\views\jollof_admin\layout.php 667
ERROR - 2019-02-18 10:06:32 --> Severity: Warning --> Invalid argument supplied for foreach() C:\xampp\htdocs\JollofCuisineWeb1\application\views\jollof_admin\layout.php 694
ERROR - 2019-02-18 10:07:30 --> 404 Page Not Found: Assets/uploads
ERROR - 2019-02-18 10:52:01 --> 404 Page Not Found: Assets/admin
ERROR - 2019-02-18 11:04:39 --> 404 Page Not Found: Assetsjs/bootstrap.min.js
ERROR - 2019-02-18 11:04:41 --> 404 Page Not Found: Assetsjs/bootstrap.min.js
