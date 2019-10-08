<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

ERROR - 2018-07-10 15:06:02 --> 404 Page Not Found: Assets/img
ERROR - 2018-07-10 15:06:02 --> 404 Page Not Found: Assets/img
ERROR - 2018-07-10 15:06:02 --> 404 Page Not Found: Assets/img
ERROR - 2018-07-10 15:06:06 --> 404 Page Not Found: Assets/img
ERROR - 2018-07-10 15:06:06 --> 404 Page Not Found: Assets/img
ERROR - 2018-07-10 15:06:06 --> 404 Page Not Found: Assets/img
ERROR - 2018-07-10 17:24:21 --> 404 Page Not Found: fashionadmin//index
ERROR - 2018-07-10 17:24:54 --> 404 Page Not Found: Fashion-admin/login
ERROR - 2018-07-10 17:24:58 --> 404 Page Not Found: fashionadmin/Login/index
ERROR - 2018-07-10 17:25:04 --> 404 Page Not Found: Fashion-admin/login
ERROR - 2018-07-10 17:25:06 --> 404 Page Not Found: Fashion-admin/index
ERROR - 2018-07-10 17:25:23 --> 404 Page Not Found: fashionadmin//index
ERROR - 2018-07-10 17:25:26 --> 404 Page Not Found: Fashion-admin/login
ERROR - 2018-07-10 17:25:34 --> 404 Page Not Found: Assets/admin
ERROR - 2018-07-10 17:25:37 --> 404 Page Not Found: fashionadmin/Admin/img
ERROR - 2018-07-10 17:25:54 --> 404 Page Not Found: Assets_v2/assets
ERROR - 2018-07-10 17:25:58 --> Severity: error --> Exception: Call to undefined method Dashboard::check_Loginin() /Applications/MAMP/htdocs/JollofCuisineWeb/application/controllers/fashionadmin/Dashboard.php 50
ERROR - 2018-07-10 17:26:21 --> 404 Page Not Found: fashionadmin/Dashboard/signout
ERROR - 2018-07-10 17:27:37 --> 404 Page Not Found: Fashion-admin/login
ERROR - 2018-07-10 17:27:41 --> 404 Page Not Found: fashionadmin/Login/index
ERROR - 2018-07-10 17:27:45 --> Severity: Notice --> Undefined index: Type /Applications/MAMP/htdocs/JollofCuisineWeb/application/controllers/fashionadmin/Admin.php 121
ERROR - 2018-07-10 17:27:45 --> Severity: Warning --> Cannot modify header information - headers already sent by (output started at /Applications/MAMP/htdocs/JollofCuisineWeb/system/core/Exceptions.php:271) /Applications/MAMP/htdocs/JollofCuisineWeb/system/helpers/url_helper.php 561
ERROR - 2018-07-10 17:27:47 --> Severity: Notice --> Undefined index: Type /Applications/MAMP/htdocs/JollofCuisineWeb/application/controllers/fashionadmin/Admin.php 121
ERROR - 2018-07-10 17:27:47 --> Severity: Warning --> Cannot modify header information - headers already sent by (output started at /Applications/MAMP/htdocs/JollofCuisineWeb/system/core/Exceptions.php:271) /Applications/MAMP/htdocs/JollofCuisineWeb/system/helpers/url_helper.php 561
ERROR - 2018-07-10 17:28:07 --> 404 Page Not Found: Dashboard/index
ERROR - 2018-07-10 17:28:23 --> 404 Page Not Found: Dashboard/index
ERROR - 2018-07-10 17:28:26 --> 404 Page Not Found: Dashboard/index
ERROR - 2018-07-10 17:28:28 --> Severity: Notice --> Undefined index: Type /Applications/MAMP/htdocs/JollofCuisineWeb/application/controllers/fashionadmin/Admin.php 121
ERROR - 2018-07-10 17:28:28 --> Severity: Warning --> Cannot modify header information - headers already sent by (output started at /Applications/MAMP/htdocs/JollofCuisineWeb/system/core/Exceptions.php:271) /Applications/MAMP/htdocs/JollofCuisineWeb/system/helpers/url_helper.php 561
ERROR - 2018-07-10 17:28:53 --> 404 Page Not Found: Assets/admin
ERROR - 2018-07-10 17:28:54 --> 404 Page Not Found: fashionadmin/Authentication/img
ERROR - 2018-07-10 17:30:19 --> 404 Page Not Found: Dashboard/index
ERROR - 2018-07-10 17:30:31 --> 404 Page Not Found: Assets/admin
ERROR - 2018-07-10 17:33:48 --> Severity: error --> Exception: Call to undefined method Dashboard::check_Loginin() /Applications/MAMP/htdocs/JollofCuisineWeb/application/controllers/fashionadmin/Dashboard.php 50
ERROR - 2018-07-10 17:33:57 --> Severity: error --> Exception: Call to undefined method Dashboard::validate_permission() /Applications/MAMP/htdocs/JollofCuisineWeb/application/controllers/fashionadmin/Dashboard.php 52
ERROR - 2018-07-10 17:49:17 --> Query error: Unknown column 'orders.restaurantid' in 'where clause' - Invalid query: SELECT COUNT(*) AS `numrows`
FROM `orders`
LEFT JOIN `accounts` ON `orders`.`accountid` = `accounts`.`id`
LEFT JOIN `accountaddresses` ON `accountaddresses`.`accountid` = `accounts`.`id`
WHERE `orders`.`status` = 1
AND `orders`.`isdeleted` =0
AND `orders`.`restaurantid` = '16'
ERROR - 2018-07-10 17:49:55 --> Severity: Warning --> Cannot modify header information - headers already sent by (output started at /Applications/MAMP/htdocs/JollofCuisineWeb/application/controllers/fashionadmin/Orders.php:58) /Applications/MAMP/htdocs/JollofCuisineWeb/system/core/Common.php 570
ERROR - 2018-07-10 17:49:55 --> Severity: Compile Error --> Cannot use [] for reading /Applications/MAMP/htdocs/JollofCuisineWeb/application/controllers/fashionadmin/Orders.php 58
ERROR - 2018-07-10 17:50:01 --> Severity: Notice --> Array to string conversion /Applications/MAMP/htdocs/JollofCuisineWeb/application/controllers/fashionadmin/Orders.php 58
ERROR - 2018-07-10 17:50:59 --> Query error: Unknown column 'orders.restaurantid' in 'where clause' - Invalid query: SELECT COUNT(*) AS `numrows`
FROM `orders`
LEFT JOIN `accounts` ON `orders`.`accountid` = `accounts`.`id`
LEFT JOIN `accountaddresses` ON `accountaddresses`.`accountid` = `accounts`.`id`
WHERE `orders`.`status` = 1
AND `orders`.`isdeleted` =0
AND `orders`.`restaurantid` = '16'
ERROR - 2018-07-10 17:54:06 --> Query error: Not unique table/alias: 'orders' - Invalid query: SELECT COUNT(*) AS `numrows`
FROM `orders`
JOIN `orders` ON `orderlistdetails`.`orderid` = `orders`.`id`
LEFT JOIN `accounts` ON `orders`.`accountid` = `accounts`.`id`
LEFT JOIN `accountaddresses` ON `accountaddresses`.`accountid` = `accounts`.`id`
WHERE `orders`.`status` = 1
AND `orders`.`isdeleted` =0
AND `orderlistdetails`.`restaurantid` = '16'
ERROR - 2018-07-10 17:54:53 --> 404 Page Not Found: Assets_v2/assets
ERROR - 2018-07-10 17:54:53 --> 404 Page Not Found: Assets_v2/assets
ERROR - 2018-07-10 17:56:10 --> 404 Page Not Found: Assets_v2/assets
ERROR - 2018-07-10 17:56:10 --> 404 Page Not Found: Assets_v2/assets
ERROR - 2018-07-10 17:56:13 --> 404 Page Not Found: Assets_v2/assets
ERROR - 2018-07-10 17:56:13 --> 404 Page Not Found: Assets_v2/assets
ERROR - 2018-07-10 17:56:18 --> Query error: Unknown column 'orders.productname' in 'where clause' - Invalid query: SELECT COUNT(*) AS `numrows`
FROM `orders`
JOIN `orderlistdetails` ON `orderlistdetails`.`orderid` = `orders`.`id`
LEFT JOIN `accounts` ON `orders`.`accountid` = `accounts`.`id`
LEFT JOIN `accountaddresses` ON `accountaddresses`.`accountid` = `accounts`.`id`
WHERE `orders`.`status` = 1
AND `orders`.`productname` = 'women'
AND `orders`.`isdeleted` =0
AND `orderlistdetails`.`restaurantid` = '16'
ERROR - 2018-07-10 18:00:31 --> Query error: Unknown column 'orders.productname' in 'where clause' - Invalid query: SELECT COUNT(*) AS `numrows`
FROM `orders`
JOIN `orderlistdetails` ON `orderlistdetails`.`orderid` = `orders`.`id`
LEFT JOIN `accounts` ON `orders`.`accountid` = `accounts`.`id`
LEFT JOIN `accountaddresses` ON `accountaddresses`.`accountid` = `accounts`.`id`
WHERE `orders`.`status` = 1
AND `orders`.`productname` = 'women'
AND `orders`.`isdeleted` =0
AND `orderlistdetails`.`restaurantid` = '16'
ERROR - 2018-07-10 18:00:33 --> Query error: Unknown column 'orders.productname' in 'where clause' - Invalid query: SELECT COUNT(*) AS `numrows`
FROM `orders`
JOIN `orderlistdetails` ON `orderlistdetails`.`orderid` = `orders`.`id`
LEFT JOIN `accounts` ON `orders`.`accountid` = `accounts`.`id`
LEFT JOIN `accountaddresses` ON `accountaddresses`.`accountid` = `accounts`.`id`
WHERE `orders`.`status` = 1
AND `orders`.`productname` = 'women'
AND `orders`.`isdeleted` =0
AND `orderlistdetails`.`restaurantid` = '16'
ERROR - 2018-07-10 18:00:37 --> 404 Page Not Found: Assets_v2/assets
ERROR - 2018-07-10 18:00:37 --> 404 Page Not Found: Assets_v2/assets
ERROR - 2018-07-10 18:00:41 --> Query error: Unknown column 'orders.productname' in 'where clause' - Invalid query: SELECT COUNT(*) AS `numrows`
FROM `orders`
JOIN `orderlistdetails` ON `orderlistdetails`.`orderid` = `orders`.`id`
LEFT JOIN `accounts` ON `orders`.`accountid` = `accounts`.`id`
LEFT JOIN `accountaddresses` ON `accountaddresses`.`accountid` = `accounts`.`id`
WHERE `orders`.`status` = 1
AND `orders`.`productname` = 'women'
AND `orders`.`isdeleted` =0
AND `orderlistdetails`.`restaurantid` = '16'
ERROR - 2018-07-10 18:01:13 --> 404 Page Not Found: Assets_v2/assets
ERROR - 2018-07-10 18:01:13 --> 404 Page Not Found: Assets_v2/assets
ERROR - 2018-07-10 18:01:22 --> 404 Page Not Found: Assets_v2/assets
ERROR - 2018-07-10 18:01:22 --> 404 Page Not Found: Assets_v2/assets
ERROR - 2018-07-10 18:01:26 --> 404 Page Not Found: Assets_v2/assets
ERROR - 2018-07-10 18:01:26 --> 404 Page Not Found: Assets_v2/assets
ERROR - 2018-07-10 18:01:30 --> 404 Page Not Found: Assets_v2/assets
ERROR - 2018-07-10 18:01:30 --> 404 Page Not Found: Assets_v2/assets
ERROR - 2018-07-10 18:01:34 --> 404 Page Not Found: Assets_v2/assets
ERROR - 2018-07-10 18:01:34 --> 404 Page Not Found: Assets_v2/assets
ERROR - 2018-07-10 18:02:08 --> 404 Page Not Found: Assets_v2/assets
ERROR - 2018-07-10 18:02:08 --> 404 Page Not Found: Assets_v2/assets
ERROR - 2018-07-10 18:08:20 --> Severity: Warning --> include_once(product_edit.php): failed to open stream: No such file or directory /Applications/MAMP/htdocs/JollofCuisineWeb/application/views/fashion_admin/layout.php 313
ERROR - 2018-07-10 18:08:20 --> Severity: Warning --> include_once(): Failed opening 'product_edit.php' for inclusion (include_path='.:/Applications/MAMP/bin/php/php7.1.8/lib/php') /Applications/MAMP/htdocs/JollofCuisineWeb/application/views/fashion_admin/layout.php 313
ERROR - 2018-07-10 18:08:39 --> Severity: error --> Exception: Call to undefined method Dashboard::check_Loginin() /Applications/MAMP/htdocs/JollofCuisineWeb/application/controllers/fashionadmin/Dashboard.php 50
ERROR - 2018-07-10 18:09:10 --> Severity: Warning --> include_once(product_edit.php): failed to open stream: No such file or directory /Applications/MAMP/htdocs/JollofCuisineWeb/application/views/fashion_admin/layout.php 313
ERROR - 2018-07-10 18:09:10 --> Severity: Warning --> include_once(): Failed opening 'product_edit.php' for inclusion (include_path='.:/Applications/MAMP/bin/php/php7.1.8/lib/php') /Applications/MAMP/htdocs/JollofCuisineWeb/application/views/fashion_admin/layout.php 313
ERROR - 2018-07-10 18:10:06 --> Severity: Warning --> include_once(product_edit.php): failed to open stream: No such file or directory /Applications/MAMP/htdocs/JollofCuisineWeb/application/views/fashion_admin/layout.php 313
ERROR - 2018-07-10 18:10:06 --> Severity: Warning --> include_once(): Failed opening 'product_edit.php' for inclusion (include_path='.:/Applications/MAMP/bin/php/php7.1.8/lib/php') /Applications/MAMP/htdocs/JollofCuisineWeb/application/views/fashion_admin/layout.php 313
ERROR - 2018-07-10 18:11:13 --> Severity: Warning --> include_once(product_edit.php): failed to open stream: No such file or directory /Applications/MAMP/htdocs/JollofCuisineWeb/application/views/fashion_admin/layout.php 313
ERROR - 2018-07-10 18:11:13 --> Severity: Warning --> include_once(): Failed opening 'product_edit.php' for inclusion (include_path='.:/Applications/MAMP/bin/php/php7.1.8/lib/php') /Applications/MAMP/htdocs/JollofCuisineWeb/application/views/fashion_admin/layout.php 313
ERROR - 2018-07-10 23:47:00 --> 404 Page Not Found: Assets/admin
ERROR - 2018-07-10 23:48:31 --> 404 Page Not Found: Assets/img
ERROR - 2018-07-10 23:48:31 --> 404 Page Not Found: Assets/img
ERROR - 2018-07-10 23:48:31 --> 404 Page Not Found: Assets/img
