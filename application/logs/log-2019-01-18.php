<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

ERROR - 2019-01-18 00:01:43 --> Severity: Notice --> Undefined index: filterpricemin C:\xampp\htdocs\JollofCuisineWeb1\application\models\oye\Fashion_model.php 821
ERROR - 2019-01-18 00:01:43 --> Severity: Notice --> Undefined index: filterpricemax C:\xampp\htdocs\JollofCuisineWeb1\application\models\oye\Fashion_model.php 822
ERROR - 2019-01-18 00:01:43 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near '`NULL`
AND  `product_qty_color_size`.`price` < `IS` `NULL`
GROUP BY `product_fas' at line 7 - Invalid query: SELECT `product_fashion_cate_assign`.`id`, `product_fashion_cate_assign`.`cat_fasid`, `product_fashion_cate_assign`.`product_fasid`, `categories_fashion`.`categoryname`
FROM `product_fashion_cate_assign`
JOIN `categories_fashion` ON `categories_fashion`.`id` = `product_fashion_cate_assign`.`cat_fasid`
LEFT JOIN `products_fashion` ON `products_fashion`.`id` = `product_fashion_cate_assign`.`product_fasid`
LEFT JOIN `product_qty_color_size` ON `product_qty_color_size`.`productid` = `products_fashion`.`id`
WHERE `product_fashion_cate_assign`.`cat_fasid` = '1'
AND  `product_qty_color_size`.`price` > `IS` `NULL`
AND  `product_qty_color_size`.`price` < `IS` `NULL`
GROUP BY `product_fashion_cate_assign`.`product_fasid`
ORDER BY `product_qty_color_size`.`price` DESC
 LIMIT 12
ERROR - 2019-01-18 00:01:49 --> Severity: Notice --> Undefined index: filterpricemin C:\xampp\htdocs\JollofCuisineWeb1\application\models\oye\Fashion_model.php 821
ERROR - 2019-01-18 00:01:49 --> Severity: Notice --> Undefined index: filterpricemax C:\xampp\htdocs\JollofCuisineWeb1\application\models\oye\Fashion_model.php 822
ERROR - 2019-01-18 00:01:49 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near '`NULL`
AND  `product_qty_color_size`.`price` < `IS` `NULL`
GROUP BY `product_fas' at line 7 - Invalid query: SELECT `product_fashion_cate_assign`.`id`, `product_fashion_cate_assign`.`cat_fasid`, `product_fashion_cate_assign`.`product_fasid`, `categories_fashion`.`categoryname`
FROM `product_fashion_cate_assign`
JOIN `categories_fashion` ON `categories_fashion`.`id` = `product_fashion_cate_assign`.`cat_fasid`
LEFT JOIN `products_fashion` ON `products_fashion`.`id` = `product_fashion_cate_assign`.`product_fasid`
LEFT JOIN `product_qty_color_size` ON `product_qty_color_size`.`productid` = `products_fashion`.`id`
WHERE `product_fashion_cate_assign`.`cat_fasid` = '1'
AND  `product_qty_color_size`.`price` > `IS` `NULL`
AND  `product_qty_color_size`.`price` < `IS` `NULL`
GROUP BY `product_fashion_cate_assign`.`product_fasid`
ORDER BY `product_qty_color_size`.`price` DESC
 LIMIT 12
ERROR - 2019-01-18 00:02:17 --> Severity: Notice --> Undefined index: filterpricemin C:\xampp\htdocs\JollofCuisineWeb1\application\models\oye\Fashion_model.php 821
ERROR - 2019-01-18 00:02:17 --> Severity: Notice --> Undefined index: filterpricemax C:\xampp\htdocs\JollofCuisineWeb1\application\models\oye\Fashion_model.php 822
ERROR - 2019-01-18 00:02:17 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near '`NULL`
AND  `product_qty_color_size`.`price` < `IS` `NULL`
GROUP BY `product_fas' at line 7 - Invalid query: SELECT `product_fashion_cate_assign`.`id`, `product_fashion_cate_assign`.`cat_fasid`, `product_fashion_cate_assign`.`product_fasid`, `categories_fashion`.`categoryname`
FROM `product_fashion_cate_assign`
JOIN `categories_fashion` ON `categories_fashion`.`id` = `product_fashion_cate_assign`.`cat_fasid`
LEFT JOIN `products_fashion` ON `products_fashion`.`id` = `product_fashion_cate_assign`.`product_fasid`
LEFT JOIN `product_qty_color_size` ON `product_qty_color_size`.`productid` = `products_fashion`.`id`
WHERE `product_fashion_cate_assign`.`cat_fasid` = '1'
AND  `product_qty_color_size`.`price` > `IS` `NULL`
AND  `product_qty_color_size`.`price` < `IS` `NULL`
GROUP BY `product_fashion_cate_assign`.`product_fasid`
ORDER BY `product_qty_color_size`.`price` DESC
 LIMIT 12
ERROR - 2019-01-18 00:02:19 --> Severity: Notice --> Undefined index: filterpricemin C:\xampp\htdocs\JollofCuisineWeb1\application\models\oye\Fashion_model.php 821
ERROR - 2019-01-18 00:02:19 --> Severity: Notice --> Undefined index: filterpricemax C:\xampp\htdocs\JollofCuisineWeb1\application\models\oye\Fashion_model.php 822
ERROR - 2019-01-18 00:02:19 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near '`NULL`
AND  `product_qty_color_size`.`price` < `IS` `NULL`
GROUP BY `product_fas' at line 7 - Invalid query: SELECT `product_fashion_cate_assign`.`id`, `product_fashion_cate_assign`.`cat_fasid`, `product_fashion_cate_assign`.`product_fasid`, `categories_fashion`.`categoryname`
FROM `product_fashion_cate_assign`
JOIN `categories_fashion` ON `categories_fashion`.`id` = `product_fashion_cate_assign`.`cat_fasid`
LEFT JOIN `products_fashion` ON `products_fashion`.`id` = `product_fashion_cate_assign`.`product_fasid`
LEFT JOIN `product_qty_color_size` ON `product_qty_color_size`.`productid` = `products_fashion`.`id`
WHERE `product_fashion_cate_assign`.`cat_fasid` = '1'
AND  `product_qty_color_size`.`price` > `IS` `NULL`
AND  `product_qty_color_size`.`price` < `IS` `NULL`
GROUP BY `product_fashion_cate_assign`.`product_fasid`
ORDER BY `product_fashion_cate_assign`.`createdat` DESC
 LIMIT 12
ERROR - 2019-01-18 00:02:26 --> Severity: Notice --> Undefined index: filterpricemin C:\xampp\htdocs\JollofCuisineWeb1\application\models\oye\Fashion_model.php 821
ERROR - 2019-01-18 00:02:26 --> Severity: Notice --> Undefined index: filterpricemax C:\xampp\htdocs\JollofCuisineWeb1\application\models\oye\Fashion_model.php 822
ERROR - 2019-01-18 00:02:26 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near '`NULL`
AND  `product_qty_color_size`.`price` < `IS` `NULL`
GROUP BY `product_fas' at line 7 - Invalid query: SELECT `product_fashion_cate_assign`.`id`, `product_fashion_cate_assign`.`cat_fasid`, `product_fashion_cate_assign`.`product_fasid`, `categories_fashion`.`categoryname`
FROM `product_fashion_cate_assign`
JOIN `categories_fashion` ON `categories_fashion`.`id` = `product_fashion_cate_assign`.`cat_fasid`
LEFT JOIN `products_fashion` ON `products_fashion`.`id` = `product_fashion_cate_assign`.`product_fasid`
LEFT JOIN `product_qty_color_size` ON `product_qty_color_size`.`productid` = `products_fashion`.`id`
WHERE `product_fashion_cate_assign`.`cat_fasid` = '1'
AND  `product_qty_color_size`.`price` > `IS` `NULL`
AND  `product_qty_color_size`.`price` < `IS` `NULL`
GROUP BY `product_fashion_cate_assign`.`product_fasid`
ORDER BY `product_qty_color_size`.`price` ASC
 LIMIT 12
ERROR - 2019-01-18 00:02:28 --> Severity: Notice --> Undefined index: filterpricemin C:\xampp\htdocs\JollofCuisineWeb1\application\models\oye\Fashion_model.php 821
ERROR - 2019-01-18 00:02:28 --> Severity: Notice --> Undefined index: filterpricemax C:\xampp\htdocs\JollofCuisineWeb1\application\models\oye\Fashion_model.php 822
ERROR - 2019-01-18 00:02:28 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near '`NULL`
AND  `product_qty_color_size`.`price` < `IS` `NULL`
GROUP BY `product_fas' at line 7 - Invalid query: SELECT `product_fashion_cate_assign`.`id`, `product_fashion_cate_assign`.`cat_fasid`, `product_fashion_cate_assign`.`product_fasid`, `categories_fashion`.`categoryname`
FROM `product_fashion_cate_assign`
JOIN `categories_fashion` ON `categories_fashion`.`id` = `product_fashion_cate_assign`.`cat_fasid`
LEFT JOIN `products_fashion` ON `products_fashion`.`id` = `product_fashion_cate_assign`.`product_fasid`
LEFT JOIN `product_qty_color_size` ON `product_qty_color_size`.`productid` = `products_fashion`.`id`
WHERE `product_fashion_cate_assign`.`cat_fasid` = '1'
AND  `product_qty_color_size`.`price` > `IS` `NULL`
AND  `product_qty_color_size`.`price` < `IS` `NULL`
GROUP BY `product_fashion_cate_assign`.`product_fasid`
ORDER BY `product_fashion_cate_assign`.`createdat` DESC
 LIMIT 12
ERROR - 2019-01-18 00:02:33 --> Severity: Notice --> Undefined index: filterpricemin C:\xampp\htdocs\JollofCuisineWeb1\application\models\oye\Fashion_model.php 821
ERROR - 2019-01-18 00:02:33 --> Severity: Notice --> Undefined index: filterpricemax C:\xampp\htdocs\JollofCuisineWeb1\application\models\oye\Fashion_model.php 822
ERROR - 2019-01-18 00:02:33 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near '`NULL`
AND  `product_qty_color_size`.`price` < `IS` `NULL`
GROUP BY `product_fas' at line 7 - Invalid query: SELECT `product_fashion_cate_assign`.`id`, `product_fashion_cate_assign`.`cat_fasid`, `product_fashion_cate_assign`.`product_fasid`, `categories_fashion`.`categoryname`
FROM `product_fashion_cate_assign`
JOIN `categories_fashion` ON `categories_fashion`.`id` = `product_fashion_cate_assign`.`cat_fasid`
LEFT JOIN `products_fashion` ON `products_fashion`.`id` = `product_fashion_cate_assign`.`product_fasid`
LEFT JOIN `product_qty_color_size` ON `product_qty_color_size`.`productid` = `products_fashion`.`id`
WHERE `product_fashion_cate_assign`.`cat_fasid` = '1'
AND  `product_qty_color_size`.`price` > `IS` `NULL`
AND  `product_qty_color_size`.`price` < `IS` `NULL`
GROUP BY `product_fashion_cate_assign`.`product_fasid`
ORDER BY `product_qty_color_size`.`price` ASC
 LIMIT 12
ERROR - 2019-01-18 00:02:34 --> Severity: Notice --> Undefined index: filterpricemin C:\xampp\htdocs\JollofCuisineWeb1\application\models\oye\Fashion_model.php 821
ERROR - 2019-01-18 00:02:34 --> Severity: Notice --> Undefined index: filterpricemax C:\xampp\htdocs\JollofCuisineWeb1\application\models\oye\Fashion_model.php 822
ERROR - 2019-01-18 00:02:34 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near '`NULL`
AND  `product_qty_color_size`.`price` < `IS` `NULL`
GROUP BY `product_fas' at line 7 - Invalid query: SELECT `product_fashion_cate_assign`.`id`, `product_fashion_cate_assign`.`cat_fasid`, `product_fashion_cate_assign`.`product_fasid`, `categories_fashion`.`categoryname`
FROM `product_fashion_cate_assign`
JOIN `categories_fashion` ON `categories_fashion`.`id` = `product_fashion_cate_assign`.`cat_fasid`
LEFT JOIN `products_fashion` ON `products_fashion`.`id` = `product_fashion_cate_assign`.`product_fasid`
LEFT JOIN `product_qty_color_size` ON `product_qty_color_size`.`productid` = `products_fashion`.`id`
WHERE `product_fashion_cate_assign`.`cat_fasid` = '1'
AND  `product_qty_color_size`.`price` > `IS` `NULL`
AND  `product_qty_color_size`.`price` < `IS` `NULL`
GROUP BY `product_fashion_cate_assign`.`product_fasid`
ORDER BY `product_fashion_cate_assign`.`createdat` DESC
 LIMIT 12
ERROR - 2019-01-18 00:03:21 --> Severity: Notice --> Undefined index: filterpricemin C:\xampp\htdocs\JollofCuisineWeb1\application\models\oye\Fashion_model.php 821
ERROR - 2019-01-18 00:03:21 --> Severity: Notice --> Undefined index: filterpricemax C:\xampp\htdocs\JollofCuisineWeb1\application\models\oye\Fashion_model.php 822
ERROR - 2019-01-18 00:03:21 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near '`NULL`
AND  `product_qty_color_size`.`price` < `IS` `NULL`
GROUP BY `product_fas' at line 7 - Invalid query: SELECT `product_fashion_cate_assign`.`id`, `product_fashion_cate_assign`.`cat_fasid`, `product_fashion_cate_assign`.`product_fasid`, `categories_fashion`.`categoryname`
FROM `product_fashion_cate_assign`
JOIN `categories_fashion` ON `categories_fashion`.`id` = `product_fashion_cate_assign`.`cat_fasid`
LEFT JOIN `products_fashion` ON `products_fashion`.`id` = `product_fashion_cate_assign`.`product_fasid`
LEFT JOIN `product_qty_color_size` ON `product_qty_color_size`.`productid` = `products_fashion`.`id`
WHERE `product_fashion_cate_assign`.`cat_fasid` = '1'
AND  `product_qty_color_size`.`price` > `IS` `NULL`
AND  `product_qty_color_size`.`price` < `IS` `NULL`
GROUP BY `product_fashion_cate_assign`.`product_fasid`
ORDER BY `products_fashion`.`productname` ASC
 LIMIT 12
ERROR - 2019-01-18 00:08:41 --> Severity: Notice --> Undefined index: filterpricemin C:\xampp\htdocs\JollofCuisineWeb1\application\models\oye\Fashion_model.php 821
ERROR - 2019-01-18 00:08:41 --> Severity: Notice --> Undefined index: filterpricemax C:\xampp\htdocs\JollofCuisineWeb1\application\models\oye\Fashion_model.php 822
ERROR - 2019-01-18 00:08:41 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near '`NULL`
AND  `product_qty_color_size`.`price` < `IS` `NULL`
GROUP BY `product_fas' at line 7 - Invalid query: SELECT `product_fashion_cate_assign`.`id`, `product_fashion_cate_assign`.`cat_fasid`, `product_fashion_cate_assign`.`product_fasid`, `categories_fashion`.`categoryname`
FROM `product_fashion_cate_assign`
JOIN `categories_fashion` ON `categories_fashion`.`id` = `product_fashion_cate_assign`.`cat_fasid`
LEFT JOIN `products_fashion` ON `products_fashion`.`id` = `product_fashion_cate_assign`.`product_fasid`
LEFT JOIN `product_qty_color_size` ON `product_qty_color_size`.`productid` = `products_fashion`.`id`
WHERE `product_fashion_cate_assign`.`cat_fasid` = '1'
AND  `product_qty_color_size`.`price` > `IS` `NULL`
AND  `product_qty_color_size`.`price` < `IS` `NULL`
GROUP BY `product_fashion_cate_assign`.`product_fasid`
ORDER BY `products_fashion`.`productname` ASC
 LIMIT 12
ERROR - 2019-01-18 00:09:17 --> Severity: Notice --> Undefined index: filterpricemin C:\xampp\htdocs\JollofCuisineWeb1\application\models\oye\Fashion_model.php 821
ERROR - 2019-01-18 00:09:17 --> Severity: Notice --> Undefined index: filterpricemax C:\xampp\htdocs\JollofCuisineWeb1\application\models\oye\Fashion_model.php 822
ERROR - 2019-01-18 00:09:17 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near '`NULL`
AND  `product_qty_color_size`.`price` < `IS` `NULL`
GROUP BY `product_fas' at line 7 - Invalid query: SELECT `product_fashion_cate_assign`.`id`, `product_fashion_cate_assign`.`cat_fasid`, `product_fashion_cate_assign`.`product_fasid`, `categories_fashion`.`categoryname`
FROM `product_fashion_cate_assign`
JOIN `categories_fashion` ON `categories_fashion`.`id` = `product_fashion_cate_assign`.`cat_fasid`
LEFT JOIN `products_fashion` ON `products_fashion`.`id` = `product_fashion_cate_assign`.`product_fasid`
LEFT JOIN `product_qty_color_size` ON `product_qty_color_size`.`productid` = `products_fashion`.`id`
WHERE `product_fashion_cate_assign`.`cat_fasid` = '1'
AND  `product_qty_color_size`.`price` > `IS` `NULL`
AND  `product_qty_color_size`.`price` < `IS` `NULL`
GROUP BY `product_fashion_cate_assign`.`product_fasid`
ORDER BY `products_fashion`.`productname` ASC
 LIMIT 12
ERROR - 2019-01-18 00:09:20 --> Severity: Notice --> Undefined index: filterpricemin C:\xampp\htdocs\JollofCuisineWeb1\application\models\oye\Fashion_model.php 821
ERROR - 2019-01-18 00:09:20 --> Severity: Notice --> Undefined index: filterpricemax C:\xampp\htdocs\JollofCuisineWeb1\application\models\oye\Fashion_model.php 822
ERROR - 2019-01-18 00:09:20 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near '`NULL`
AND  `product_qty_color_size`.`price` < `IS` `NULL`
GROUP BY `product_fas' at line 7 - Invalid query: SELECT `product_fashion_cate_assign`.`id`, `product_fashion_cate_assign`.`cat_fasid`, `product_fashion_cate_assign`.`product_fasid`, `categories_fashion`.`categoryname`
FROM `product_fashion_cate_assign`
JOIN `categories_fashion` ON `categories_fashion`.`id` = `product_fashion_cate_assign`.`cat_fasid`
LEFT JOIN `products_fashion` ON `products_fashion`.`id` = `product_fashion_cate_assign`.`product_fasid`
LEFT JOIN `product_qty_color_size` ON `product_qty_color_size`.`productid` = `products_fashion`.`id`
WHERE `product_fashion_cate_assign`.`cat_fasid` = '1'
AND  `product_qty_color_size`.`price` > `IS` `NULL`
AND  `product_qty_color_size`.`price` < `IS` `NULL`
GROUP BY `product_fashion_cate_assign`.`product_fasid`
ORDER BY `product_fashion_cate_assign`.`createdat` DESC
 LIMIT 12
ERROR - 2019-01-18 00:09:28 --> Severity: Notice --> Undefined index: filterpricemin C:\xampp\htdocs\JollofCuisineWeb1\application\models\oye\Fashion_model.php 821
ERROR - 2019-01-18 00:09:28 --> Severity: Notice --> Undefined index: filterpricemax C:\xampp\htdocs\JollofCuisineWeb1\application\models\oye\Fashion_model.php 822
ERROR - 2019-01-18 00:09:28 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near '`NULL`
AND  `product_qty_color_size`.`price` < `IS` `NULL`
GROUP BY `product_fas' at line 7 - Invalid query: SELECT `product_fashion_cate_assign`.`id`, `product_fashion_cate_assign`.`cat_fasid`, `product_fashion_cate_assign`.`product_fasid`, `categories_fashion`.`categoryname`
FROM `product_fashion_cate_assign`
JOIN `categories_fashion` ON `categories_fashion`.`id` = `product_fashion_cate_assign`.`cat_fasid`
LEFT JOIN `products_fashion` ON `products_fashion`.`id` = `product_fashion_cate_assign`.`product_fasid`
LEFT JOIN `product_qty_color_size` ON `product_qty_color_size`.`productid` = `products_fashion`.`id`
WHERE `product_fashion_cate_assign`.`cat_fasid` = '1'
AND  `product_qty_color_size`.`price` > `IS` `NULL`
AND  `product_qty_color_size`.`price` < `IS` `NULL`
GROUP BY `product_fashion_cate_assign`.`product_fasid`
ORDER BY `product_qty_color_size`.`price` ASC
 LIMIT 12
ERROR - 2019-01-18 00:10:58 --> Severity: Notice --> Undefined index: filterpricemin C:\xampp\htdocs\JollofCuisineWeb1\application\models\oye\Fashion_model.php 821
ERROR - 2019-01-18 00:10:58 --> Severity: Notice --> Undefined index: filterpricemax C:\xampp\htdocs\JollofCuisineWeb1\application\models\oye\Fashion_model.php 822
ERROR - 2019-01-18 00:10:58 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near '`NULL`
AND  `product_qty_color_size`.`price` < `IS` `NULL`
GROUP BY `product_fas' at line 7 - Invalid query: SELECT `product_fashion_cate_assign`.`id`, `product_fashion_cate_assign`.`cat_fasid`, `product_fashion_cate_assign`.`product_fasid`, `categories_fashion`.`categoryname`
FROM `product_fashion_cate_assign`
JOIN `categories_fashion` ON `categories_fashion`.`id` = `product_fashion_cate_assign`.`cat_fasid`
LEFT JOIN `products_fashion` ON `products_fashion`.`id` = `product_fashion_cate_assign`.`product_fasid`
LEFT JOIN `product_qty_color_size` ON `product_qty_color_size`.`productid` = `products_fashion`.`id`
WHERE `product_fashion_cate_assign`.`cat_fasid` = '1'
AND  `product_qty_color_size`.`price` > `IS` `NULL`
AND  `product_qty_color_size`.`price` < `IS` `NULL`
GROUP BY `product_fashion_cate_assign`.`product_fasid`
ORDER BY `product_fashion_cate_assign`.`createdat` DESC
 LIMIT 12
ERROR - 2019-01-18 00:11:32 --> Severity: Notice --> Undefined index: filterpricemin C:\xampp\htdocs\JollofCuisineWeb1\application\models\oye\Fashion_model.php 821
ERROR - 2019-01-18 00:11:32 --> Severity: Notice --> Undefined index: filterpricemax C:\xampp\htdocs\JollofCuisineWeb1\application\models\oye\Fashion_model.php 822
ERROR - 2019-01-18 00:11:32 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near '`NULL`
AND  `product_qty_color_size`.`price` < `IS` `NULL`
GROUP BY `product_fas' at line 7 - Invalid query: SELECT `product_fashion_cate_assign`.`id`, `product_fashion_cate_assign`.`cat_fasid`, `product_fashion_cate_assign`.`product_fasid`, `categories_fashion`.`categoryname`
FROM `product_fashion_cate_assign`
JOIN `categories_fashion` ON `categories_fashion`.`id` = `product_fashion_cate_assign`.`cat_fasid`
LEFT JOIN `products_fashion` ON `products_fashion`.`id` = `product_fashion_cate_assign`.`product_fasid`
LEFT JOIN `product_qty_color_size` ON `product_qty_color_size`.`productid` = `products_fashion`.`id`
WHERE `product_fashion_cate_assign`.`cat_fasid` = '1'
AND  `product_qty_color_size`.`price` > `IS` `NULL`
AND  `product_qty_color_size`.`price` < `IS` `NULL`
GROUP BY `product_fashion_cate_assign`.`product_fasid`
ORDER BY `product_qty_color_size`.`price` ASC
 LIMIT 12
ERROR - 2019-01-18 00:14:56 --> Severity: Notice --> Undefined index: filterpricemin C:\xampp\htdocs\JollofCuisineWeb1\application\models\oye\Fashion_model.php 821
ERROR - 2019-01-18 00:14:56 --> Severity: Notice --> Undefined index: filterpricemax C:\xampp\htdocs\JollofCuisineWeb1\application\models\oye\Fashion_model.php 822
ERROR - 2019-01-18 00:14:56 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near '`NULL`
AND  `product_qty_color_size`.`price` < `IS` `NULL`
GROUP BY `product_fas' at line 7 - Invalid query: SELECT `product_fashion_cate_assign`.`id`, `product_fashion_cate_assign`.`cat_fasid`, `product_fashion_cate_assign`.`product_fasid`, `categories_fashion`.`categoryname`
FROM `product_fashion_cate_assign`
JOIN `categories_fashion` ON `categories_fashion`.`id` = `product_fashion_cate_assign`.`cat_fasid`
LEFT JOIN `products_fashion` ON `products_fashion`.`id` = `product_fashion_cate_assign`.`product_fasid`
LEFT JOIN `product_qty_color_size` ON `product_qty_color_size`.`productid` = `products_fashion`.`id`
WHERE `product_fashion_cate_assign`.`cat_fasid` = '1'
AND  `product_qty_color_size`.`price` > `IS` `NULL`
AND  `product_qty_color_size`.`price` < `IS` `NULL`
GROUP BY `product_fashion_cate_assign`.`product_fasid`
ORDER BY `products_fashion`.`productname` ASC
 LIMIT 12
ERROR - 2019-01-18 00:19:10 --> Severity: Notice --> Undefined index: filterpricemin C:\xampp\htdocs\JollofCuisineWeb1\application\models\oye\Fashion_model.php 821
ERROR - 2019-01-18 00:19:10 --> Severity: Notice --> Undefined index: filterpricemax C:\xampp\htdocs\JollofCuisineWeb1\application\models\oye\Fashion_model.php 822
ERROR - 2019-01-18 00:19:10 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near '`NULL`
AND  `product_qty_color_size`.`price` < `IS` `NULL`
GROUP BY `product_fas' at line 7 - Invalid query: SELECT `product_fashion_cate_assign`.`id`, `product_fashion_cate_assign`.`cat_fasid`, `product_fashion_cate_assign`.`product_fasid`, `categories_fashion`.`categoryname`
FROM `product_fashion_cate_assign`
JOIN `categories_fashion` ON `categories_fashion`.`id` = `product_fashion_cate_assign`.`cat_fasid`
LEFT JOIN `products_fashion` ON `products_fashion`.`id` = `product_fashion_cate_assign`.`product_fasid`
LEFT JOIN `product_qty_color_size` ON `product_qty_color_size`.`productid` = `products_fashion`.`id`
WHERE `product_fashion_cate_assign`.`cat_fasid` = '1'
AND  `product_qty_color_size`.`price` > `IS` `NULL`
AND  `product_qty_color_size`.`price` < `IS` `NULL`
GROUP BY `product_fashion_cate_assign`.`product_fasid`
ORDER BY `products_fashion`.`productname` ASC
 LIMIT 12
ERROR - 2019-01-18 00:20:11 --> Severity: Notice --> Undefined index: filterpricemin C:\xampp\htdocs\JollofCuisineWeb1\application\models\oye\Fashion_model.php 821
ERROR - 2019-01-18 00:20:11 --> Severity: Notice --> Undefined index: filterpricemax C:\xampp\htdocs\JollofCuisineWeb1\application\models\oye\Fashion_model.php 822
ERROR - 2019-01-18 00:20:11 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near '`NULL`
AND  `product_qty_color_size`.`price` < `IS` `NULL`
GROUP BY `product_fas' at line 7 - Invalid query: SELECT `product_fashion_cate_assign`.`id`, `product_fashion_cate_assign`.`cat_fasid`, `product_fashion_cate_assign`.`product_fasid`, `categories_fashion`.`categoryname`
FROM `product_fashion_cate_assign`
JOIN `categories_fashion` ON `categories_fashion`.`id` = `product_fashion_cate_assign`.`cat_fasid`
LEFT JOIN `products_fashion` ON `products_fashion`.`id` = `product_fashion_cate_assign`.`product_fasid`
LEFT JOIN `product_qty_color_size` ON `product_qty_color_size`.`productid` = `products_fashion`.`id`
WHERE `product_fashion_cate_assign`.`cat_fasid` = '1'
AND  `product_qty_color_size`.`price` > `IS` `NULL`
AND  `product_qty_color_size`.`price` < `IS` `NULL`
GROUP BY `product_fashion_cate_assign`.`product_fasid`
ORDER BY `products_fashion`.`productname` ASC
 LIMIT 12
ERROR - 2019-01-18 00:20:59 --> Severity: Notice --> Undefined index: filterpricemin C:\xampp\htdocs\JollofCuisineWeb1\application\models\oye\Fashion_model.php 821
ERROR - 2019-01-18 00:20:59 --> Severity: Notice --> Undefined index: filterpricemax C:\xampp\htdocs\JollofCuisineWeb1\application\models\oye\Fashion_model.php 822
ERROR - 2019-01-18 00:20:59 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near '`NULL`
AND  `product_qty_color_size`.`price` < `IS` `NULL`
GROUP BY `product_fas' at line 7 - Invalid query: SELECT `product_fashion_cate_assign`.`id`, `product_fashion_cate_assign`.`cat_fasid`, `product_fashion_cate_assign`.`product_fasid`, `categories_fashion`.`categoryname`
FROM `product_fashion_cate_assign`
JOIN `categories_fashion` ON `categories_fashion`.`id` = `product_fashion_cate_assign`.`cat_fasid`
LEFT JOIN `products_fashion` ON `products_fashion`.`id` = `product_fashion_cate_assign`.`product_fasid`
LEFT JOIN `product_qty_color_size` ON `product_qty_color_size`.`productid` = `products_fashion`.`id`
WHERE `product_fashion_cate_assign`.`cat_fasid` = '1'
AND  `product_qty_color_size`.`price` > `IS` `NULL`
AND  `product_qty_color_size`.`price` < `IS` `NULL`
GROUP BY `product_fashion_cate_assign`.`product_fasid`
ORDER BY `products_fashion`.`productname` ASC
 LIMIT 12
ERROR - 2019-01-18 00:23:26 --> Severity: Notice --> Undefined index: filterpricemin C:\xampp\htdocs\JollofCuisineWeb1\application\models\oye\Fashion_model.php 356
ERROR - 2019-01-18 00:23:26 --> Severity: Notice --> Undefined index: filterpricemax C:\xampp\htdocs\JollofCuisineWeb1\application\models\oye\Fashion_model.php 357
ERROR - 2019-01-18 00:23:26 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near '`NULL`
AND  `product_qty_color_size`.`price` < `IS` `NULL`
AND  `products_fashio' at line 8 - Invalid query: SELECT `product_fashion_cate_assign`.`id`, `product_fashion_cate_assign`.`cat_fasid`, `product_fashion_cate_assign`.`product_fasid`, `categories_fashion`.`categoryname`, `product_qty_color_size`.`colorid`, `color_tbl`.`colorname`, count(DISTINCT product_qty_color_size.productid ) AS full_color_count
FROM `product_fashion_cate_assign`
JOIN `categories_fashion` ON `categories_fashion`.`id` = `product_fashion_cate_assign`.`cat_fasid`
LEFT JOIN `products_fashion` ON `products_fashion`.`id` = `product_fashion_cate_assign`.`product_fasid`
LEFT JOIN `product_qty_color_size` ON `product_qty_color_size`.`productid` = `products_fashion`.`id`
LEFT JOIN `color_tbl` ON `color_tbl`.`id` = `product_qty_color_size`.`colorid`
WHERE `product_fashion_cate_assign`.`cat_fasid` = '1'
AND  `product_qty_color_size`.`price` > `IS` `NULL`
AND  `product_qty_color_size`.`price` < `IS` `NULL`
AND  `products_fashion`.`status` = 1
GROUP BY `product_qty_color_size`.`colorid`
ORDER BY `color_tbl`.`colorname` ASC
ERROR - 2019-01-18 00:24:43 --> Severity: Notice --> Undefined index: filterpricemin C:\xampp\htdocs\JollofCuisineWeb1\application\models\oye\Fashion_model.php 411
ERROR - 2019-01-18 00:24:43 --> Severity: Notice --> Undefined index: filterpricemax C:\xampp\htdocs\JollofCuisineWeb1\application\models\oye\Fashion_model.php 412
ERROR - 2019-01-18 00:24:43 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near '`NULL`
AND  `product_qty_color_size`.`price` < `IS` `NULL`
AND  `product_fashion' at line 8 - Invalid query: SELECT `product_fashion_cate_assign`.`id`, `product_fashion_cate_assign`.`cat_fasid`, `product_fashion_cate_assign`.`product_fasid`, `categories_fashion`.`categoryname`, `product_qty_color_size`.`sizeid`, `size_tbl`.`sizename`, `size_tbl`.`sizecode`, count(DISTINCT product_qty_color_size.productid ) AS full_size_count
FROM `product_fashion_cate_assign`
JOIN `categories_fashion` ON `categories_fashion`.`id` = `product_fashion_cate_assign`.`cat_fasid`
LEFT JOIN `products_fashion` ON `products_fashion`.`id` = `product_fashion_cate_assign`.`product_fasid`
LEFT JOIN `product_qty_color_size` ON `product_qty_color_size`.`productid` = `products_fashion`.`id`
LEFT JOIN `size_tbl` ON `size_tbl`.`id` = `product_qty_color_size`.`sizeid`
LEFT JOIN `size_category` ON `size_category`.`id` = `size_tbl`.`sizecategoryid`
WHERE `product_qty_color_size`.`price` > `IS` `NULL`
AND  `product_qty_color_size`.`price` < `IS` `NULL`
AND  `product_fashion_cate_assign`.`cat_fasid` = '1'
GROUP BY `product_qty_color_size`.`sizeid`
ORDER BY `size_category`.`sizecategory` ASC
ERROR - 2019-01-18 00:24:45 --> Severity: Notice --> Undefined index: filterpricemin C:\xampp\htdocs\JollofCuisineWeb1\application\models\oye\Fashion_model.php 411
ERROR - 2019-01-18 00:24:45 --> Severity: Notice --> Undefined index: filterpricemax C:\xampp\htdocs\JollofCuisineWeb1\application\models\oye\Fashion_model.php 412
ERROR - 2019-01-18 00:24:45 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near '`NULL`
AND  `product_qty_color_size`.`price` < `IS` `NULL`
AND  `product_fashion' at line 8 - Invalid query: SELECT `product_fashion_cate_assign`.`id`, `product_fashion_cate_assign`.`cat_fasid`, `product_fashion_cate_assign`.`product_fasid`, `categories_fashion`.`categoryname`, `product_qty_color_size`.`sizeid`, `size_tbl`.`sizename`, `size_tbl`.`sizecode`, count(DISTINCT product_qty_color_size.productid ) AS full_size_count
FROM `product_fashion_cate_assign`
JOIN `categories_fashion` ON `categories_fashion`.`id` = `product_fashion_cate_assign`.`cat_fasid`
LEFT JOIN `products_fashion` ON `products_fashion`.`id` = `product_fashion_cate_assign`.`product_fasid`
LEFT JOIN `product_qty_color_size` ON `product_qty_color_size`.`productid` = `products_fashion`.`id`
LEFT JOIN `size_tbl` ON `size_tbl`.`id` = `product_qty_color_size`.`sizeid`
LEFT JOIN `size_category` ON `size_category`.`id` = `size_tbl`.`sizecategoryid`
WHERE `product_qty_color_size`.`price` > `IS` `NULL`
AND  `product_qty_color_size`.`price` < `IS` `NULL`
AND  `product_fashion_cate_assign`.`cat_fasid` = '1'
GROUP BY `product_qty_color_size`.`sizeid`
ORDER BY `size_category`.`sizecategory` ASC
ERROR - 2019-01-18 00:25:22 --> Severity: Notice --> Undefined index: filterpricemin C:\xampp\htdocs\JollofCuisineWeb1\application\models\oye\Fashion_model.php 465
ERROR - 2019-01-18 00:25:22 --> Severity: Notice --> Undefined index: filterpricemax C:\xampp\htdocs\JollofCuisineWeb1\application\models\oye\Fashion_model.php 466
ERROR - 2019-01-18 00:25:22 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near '`NULL`
AND  `product_qty_color_size`.`price` < `IS` `NULL`
AND  `product_fashion' at line 7 - Invalid query: SELECT `product_fashion_cate_assign`.`id`, `product_fashion_cate_assign`.`cat_fasid`, `product_fashion_cate_assign`.`product_fasid`, `categories_fashion`.`categoryname`, `products_fashion`.`merchantid`, `restaurants`.`slug` as `companyurl`, `restaurants`.`companyname`, count(DISTINCT product_qty_color_size.productid ) AS full_store_count
FROM `product_fashion_cate_assign`
JOIN `categories_fashion` ON `categories_fashion`.`id` = `product_fashion_cate_assign`.`cat_fasid`
LEFT JOIN `products_fashion` ON `products_fashion`.`id` = `product_fashion_cate_assign`.`product_fasid`
LEFT JOIN `product_qty_color_size` ON `product_qty_color_size`.`productid` = `products_fashion`.`id`
LEFT JOIN `restaurants` ON `restaurants`.`id` = `products_fashion`.`merchantid`
WHERE `product_qty_color_size`.`price` > `IS` `NULL`
AND  `product_qty_color_size`.`price` < `IS` `NULL`
AND  `product_fashion_cate_assign`.`cat_fasid` = '1'
GROUP BY `products_fashion`.`merchantid`
ORDER BY `restaurants`.`companyname` ASC
ERROR - 2019-01-18 01:01:48 --> 404 Page Not Found: Fashion/giftporter
ERROR - 2019-01-18 09:20:57 --> 404 Page Not Found: Assets/uploads
ERROR - 2019-01-18 09:42:22 --> Severity: Notice --> Undefined variable: store C:\xampp\htdocs\JollofCuisineWeb1\application\controllers\Products.php 576
ERROR - 2019-01-18 09:42:54 --> Severity: Notice --> Undefined variable: store_id C:\xampp\htdocs\JollofCuisineWeb1\application\controllers\Products.php 665
ERROR - 2019-01-18 09:50:59 --> Query error: Unknown column 'restaurants.status' in 'where clause' - Invalid query: SELECT `product_qty_color_size`.`id`, `product_qty_color_size`.`productid`, `product_qty_color_size`.`jpoints`, `product_qty_color_size`.`discount_price`, `color_tbl`.`colorname`, `size_tbl`.`sizecode`, `productimages`.`imagename`, `products_fashion`.`adminid`, `products_fashion`.`productname`, `products_fashion`.`productdesc`, `products_fashion`.`productshortdesc`, `products_fashion`.`slug`, `products_fashion`.`discount_percentage`, `products_fashion`.`productfrontimage`, `products_fashion`.`sales`, SUM(product_qty_color_size.quantity) AS sum_quntity, SUM(product_qty_color_size.productinstock) AS sum_productinstock, count(DISTINCT product_qty_color_size.colorid ) AS full_color_count, count(DISTINCT product_qty_color_size.discount_price ) AS full_discount_price_count
FROM `product_qty_color_size`
LEFT JOIN `products_fashion` ON `products_fashion`.`id` = `product_qty_color_size`.`productid`
LEFT JOIN `color_tbl` ON `color_tbl`.`id` = `product_qty_color_size`.`colorid`
LEFT JOIN `size_tbl` ON `size_tbl`.`id` = `product_qty_color_size`.`sizeid`
LEFT JOIN     
                        (
                            SELECT productimages.id,productimages.productid,productimages.imagename
                            FROM productimages where colorimg= 0
                            GROUP BY productimages.productid
                        ) productimages  ON `productimages`.`productid` = `product_qty_color_size`.`productid`
WHERE `products_fashion`.`status` = 1
AND  `product_qty_color_size`.`status` = 1
AND  `restaurants`.`status` = 1
AND  `products_fashion`.`isdeleted` =0
AND  `product_qty_color_size`.`isdeleted` =0
AND  `product_qty_color_size`.`productid` = '11'
GROUP BY `product_qty_color_size`.`productid`
ERROR - 2019-01-18 09:51:08 --> Severity: Notice --> Undefined property: stdClass::$merchantid C:\xampp\htdocs\JollofCuisineWeb1\application\models\oye\Fashion_model.php 928
ERROR - 2019-01-18 09:51:08 --> Severity: Notice --> Undefined property: stdClass::$companyname C:\xampp\htdocs\JollofCuisineWeb1\application\models\oye\Fashion_model.php 929
ERROR - 2019-01-18 09:51:08 --> Severity: Notice --> Undefined property: stdClass::$companyurl C:\xampp\htdocs\JollofCuisineWeb1\application\models\oye\Fashion_model.php 930
ERROR - 2019-01-18 09:51:08 --> Severity: Notice --> Undefined property: stdClass::$merchantid C:\xampp\htdocs\JollofCuisineWeb1\application\models\oye\Fashion_model.php 928
ERROR - 2019-01-18 09:51:08 --> Severity: Notice --> Undefined property: stdClass::$companyname C:\xampp\htdocs\JollofCuisineWeb1\application\models\oye\Fashion_model.php 929
ERROR - 2019-01-18 09:51:08 --> Severity: Notice --> Undefined property: stdClass::$companyurl C:\xampp\htdocs\JollofCuisineWeb1\application\models\oye\Fashion_model.php 930
ERROR - 2019-01-18 09:51:35 --> Severity: Notice --> Undefined property: stdClass::$companyname C:\xampp\htdocs\JollofCuisineWeb1\application\models\oye\Fashion_model.php 928
ERROR - 2019-01-18 09:51:35 --> Severity: Notice --> Undefined property: stdClass::$companyurl C:\xampp\htdocs\JollofCuisineWeb1\application\models\oye\Fashion_model.php 929
ERROR - 2019-01-18 09:51:35 --> Severity: Notice --> Undefined property: stdClass::$companyname C:\xampp\htdocs\JollofCuisineWeb1\application\models\oye\Fashion_model.php 928
ERROR - 2019-01-18 09:51:35 --> Severity: Notice --> Undefined property: stdClass::$companyurl C:\xampp\htdocs\JollofCuisineWeb1\application\models\oye\Fashion_model.php 929
ERROR - 2019-01-18 09:51:51 --> Severity: Notice --> Undefined property: stdClass::$companyurl C:\xampp\htdocs\JollofCuisineWeb1\application\models\oye\Fashion_model.php 928
ERROR - 2019-01-18 09:51:51 --> Severity: Notice --> Undefined property: stdClass::$companyurl C:\xampp\htdocs\JollofCuisineWeb1\application\models\oye\Fashion_model.php 928
ERROR - 2019-01-18 09:51:53 --> Severity: Notice --> Undefined property: stdClass::$companyurl C:\xampp\htdocs\JollofCuisineWeb1\application\models\oye\Fashion_model.php 928
ERROR - 2019-01-18 09:51:53 --> Severity: Notice --> Undefined property: stdClass::$companyurl C:\xampp\htdocs\JollofCuisineWeb1\application\models\oye\Fashion_model.php 928
ERROR - 2019-01-18 09:52:22 --> Severity: Notice --> Undefined variable: store C:\xampp\htdocs\JollofCuisineWeb1\application\controllers\Products.php 680
ERROR - 2019-01-18 09:52:22 --> Severity: Notice --> Undefined variable: store C:\xampp\htdocs\JollofCuisineWeb1\application\controllers\Products.php 681
ERROR - 2019-01-18 09:52:22 --> Severity: Notice --> Undefined variable: store C:\xampp\htdocs\JollofCuisineWeb1\application\controllers\Products.php 682
ERROR - 2019-01-18 09:52:22 --> Severity: Notice --> Undefined variable: store_id C:\xampp\htdocs\JollofCuisineWeb1\application\controllers\Products.php 685
ERROR - 2019-01-18 09:52:22 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near 'LEFT JOIN `product_qty_color_size` ON `product_qty_color_size`.`productid` = `pr' at line 2 - Invalid query: SELECT `product_fashion_cate_assign`.`id`, `product_fashion_cate_assign`.`cat_fasid`, `product_fashion_cate_assign`.`product_fasid`, `categories_fashion`.`categoryname`, `product_qty_color_size`.`colorid`, `color_tbl`.`colorname`, count(DISTINCT product_qty_color_size.productid ) AS full_color_count
LEFT JOIN `product_qty_color_size` ON `product_qty_color_size`.`productid` = `products_fashion`.`id`
LEFT JOIN `color_tbl` ON `color_tbl`.`id` = `product_qty_color_size`.`colorid`
WHERE `products_fashion`.`status` = 1
GROUP BY `product_qty_color_size`.`colorid`
ORDER BY `color_tbl`.`colorname` ASC
ERROR - 2019-01-18 09:53:37 --> Severity: Notice --> Undefined variable: store_id C:\xampp\htdocs\JollofCuisineWeb1\application\controllers\Products.php 684
ERROR - 2019-01-18 09:53:37 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near 'LEFT JOIN `product_qty_color_size` ON `product_qty_color_size`.`productid` = `pr' at line 2 - Invalid query: SELECT `product_fashion_cate_assign`.`id`, `product_fashion_cate_assign`.`cat_fasid`, `product_fashion_cate_assign`.`product_fasid`, `categories_fashion`.`categoryname`, `product_qty_color_size`.`colorid`, `color_tbl`.`colorname`, count(DISTINCT product_qty_color_size.productid ) AS full_color_count
LEFT JOIN `product_qty_color_size` ON `product_qty_color_size`.`productid` = `products_fashion`.`id`
LEFT JOIN `color_tbl` ON `color_tbl`.`id` = `product_qty_color_size`.`colorid`
WHERE `products_fashion`.`status` = 1
GROUP BY `product_qty_color_size`.`colorid`
ORDER BY `color_tbl`.`colorname` ASC
ERROR - 2019-01-18 10:00:35 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near 'LEFT JOIN `product_qty_color_size` ON `product_qty_color_size`.`productid` = `pr' at line 2 - Invalid query: SELECT `product_fashion_cate_assign`.`id`, `product_fashion_cate_assign`.`cat_fasid`, `product_fashion_cate_assign`.`product_fasid`, `categories_fashion`.`categoryname`, `product_qty_color_size`.`colorid`, `color_tbl`.`colorname`, count(DISTINCT product_qty_color_size.productid ) AS full_color_count
LEFT JOIN `product_qty_color_size` ON `product_qty_color_size`.`productid` = `products_fashion`.`id`
LEFT JOIN `color_tbl` ON `color_tbl`.`id` = `product_qty_color_size`.`colorid`
WHERE `products_fashion`.`status` = 1
GROUP BY `product_qty_color_size`.`colorid`
ORDER BY `color_tbl`.`colorname` ASC
ERROR - 2019-01-18 10:06:46 --> Severity: Compile Error --> Redefinition of parameter $by_giftporte C:\xampp\htdocs\JollofCuisineWeb1\application\models\oye\Fashion_model.php 384
ERROR - 2019-01-18 10:07:24 --> Severity: Compile Error --> Redefinition of parameter $by_giftporte C:\xampp\htdocs\JollofCuisineWeb1\application\models\oye\Fashion_model.php 384
ERROR - 2019-01-18 10:07:25 --> Severity: Compile Error --> Redefinition of parameter $by_giftporte C:\xampp\htdocs\JollofCuisineWeb1\application\models\oye\Fashion_model.php 384
ERROR - 2019-01-18 10:07:40 --> Severity: Compile Error --> Redefinition of parameter $by_giftporte C:\xampp\htdocs\JollofCuisineWeb1\application\models\oye\Fashion_model.php 384
ERROR - 2019-01-18 10:08:32 --> Severity: Compile Error --> Redefinition of parameter $by_giftporte C:\xampp\htdocs\JollofCuisineWeb1\application\models\oye\Fashion_model.php 384
ERROR - 2019-01-18 10:08:42 --> Severity: Notice --> Undefined variable: store C:\xampp\htdocs\JollofCuisineWeb1\application\controllers\Products.php 688
ERROR - 2019-01-18 10:08:42 --> Severity: Notice --> Undefined variable: store C:\xampp\htdocs\JollofCuisineWeb1\application\controllers\Products.php 689
ERROR - 2019-01-18 10:08:42 --> Severity: Notice --> Undefined index: store_url C:\xampp\htdocs\JollofCuisineWeb1\application\views\fashion_view\store.php 94
ERROR - 2019-01-18 10:08:42 --> Severity: Notice --> Undefined index: store_url C:\xampp\htdocs\JollofCuisineWeb1\application\views\fashion_view\store.php 111
ERROR - 2019-01-18 10:08:42 --> Severity: Notice --> Undefined index: store_url C:\xampp\htdocs\JollofCuisineWeb1\application\views\fashion_view\store.php 138
ERROR - 2019-01-18 10:08:42 --> Severity: Notice --> Undefined index: price C:\xampp\htdocs\JollofCuisineWeb1\application\views\fashion_view\store.php 175
ERROR - 2019-01-18 10:08:42 --> Severity: Notice --> Undefined index: storename C:\xampp\htdocs\JollofCuisineWeb1\application\views\fashion_view\store.php 179
ERROR - 2019-01-18 10:08:42 --> Severity: Notice --> Undefined index: storename C:\xampp\htdocs\JollofCuisineWeb1\application\views\fashion_view\store.php 181
ERROR - 2019-01-18 10:08:42 --> Severity: Notice --> Undefined index: store_url C:\xampp\htdocs\JollofCuisineWeb1\application\views\fashion_view\store.php 191
ERROR - 2019-01-18 10:08:42 --> Severity: Notice --> Undefined index: store_url C:\xampp\htdocs\JollofCuisineWeb1\application\views\fashion_view\store.php 196
ERROR - 2019-01-18 10:08:42 --> Severity: Notice --> Undefined index: store_url C:\xampp\htdocs\JollofCuisineWeb1\application\views\fashion_view\store.php 209
ERROR - 2019-01-18 10:08:42 --> Severity: Notice --> Undefined index: price C:\xampp\htdocs\JollofCuisineWeb1\application\views\fashion_view\store.php 246
ERROR - 2019-01-18 10:08:42 --> Severity: Notice --> Undefined index: store_url C:\xampp\htdocs\JollofCuisineWeb1\application\views\fashion_view\store.php 264
ERROR - 2019-01-18 10:08:42 --> Severity: Notice --> Undefined index: storename C:\xampp\htdocs\JollofCuisineWeb1\application\views\fashion_view\store.php 267
ERROR - 2019-01-18 10:08:42 --> Severity: Notice --> Undefined index: storename C:\xampp\htdocs\JollofCuisineWeb1\application\views\fashion_view\store.php 277
ERROR - 2019-01-18 10:08:42 --> Severity: Notice --> Undefined index: store_url C:\xampp\htdocs\JollofCuisineWeb1\application\views\fashion_view\store.php 277
ERROR - 2019-01-18 10:08:42 --> Severity: Notice --> Undefined index: store_url C:\xampp\htdocs\JollofCuisineWeb1\application\views\fashion_view\store.php 94
ERROR - 2019-01-18 10:08:42 --> Severity: Notice --> Undefined index: store_url C:\xampp\htdocs\JollofCuisineWeb1\application\views\fashion_view\store.php 111
ERROR - 2019-01-18 10:08:42 --> Severity: Notice --> Undefined index: store_url C:\xampp\htdocs\JollofCuisineWeb1\application\views\fashion_view\store.php 138
ERROR - 2019-01-18 10:08:42 --> Severity: Notice --> Undefined index: price C:\xampp\htdocs\JollofCuisineWeb1\application\views\fashion_view\store.php 175
ERROR - 2019-01-18 10:08:42 --> Severity: Notice --> Undefined index: storename C:\xampp\htdocs\JollofCuisineWeb1\application\views\fashion_view\store.php 179
ERROR - 2019-01-18 10:08:42 --> Severity: Notice --> Undefined index: storename C:\xampp\htdocs\JollofCuisineWeb1\application\views\fashion_view\store.php 181
ERROR - 2019-01-18 10:08:42 --> Severity: Notice --> Undefined index: store_url C:\xampp\htdocs\JollofCuisineWeb1\application\views\fashion_view\store.php 191
ERROR - 2019-01-18 10:08:42 --> Severity: Notice --> Undefined index: store_url C:\xampp\htdocs\JollofCuisineWeb1\application\views\fashion_view\store.php 196
ERROR - 2019-01-18 10:08:42 --> Severity: Notice --> Undefined index: store_url C:\xampp\htdocs\JollofCuisineWeb1\application\views\fashion_view\store.php 209
ERROR - 2019-01-18 10:08:42 --> Severity: Notice --> Undefined index: price C:\xampp\htdocs\JollofCuisineWeb1\application\views\fashion_view\store.php 246
ERROR - 2019-01-18 10:08:42 --> Severity: Notice --> Undefined index: store_url C:\xampp\htdocs\JollofCuisineWeb1\application\views\fashion_view\store.php 264
ERROR - 2019-01-18 10:08:42 --> Severity: Notice --> Undefined index: storename C:\xampp\htdocs\JollofCuisineWeb1\application\views\fashion_view\store.php 267
ERROR - 2019-01-18 10:08:42 --> Severity: Notice --> Undefined index: storename C:\xampp\htdocs\JollofCuisineWeb1\application\views\fashion_view\store.php 277
ERROR - 2019-01-18 10:08:42 --> Severity: Notice --> Undefined index: store_url C:\xampp\htdocs\JollofCuisineWeb1\application\views\fashion_view\store.php 277
ERROR - 2019-01-18 10:09:11 --> Severity: Notice --> Undefined variable: store C:\xampp\htdocs\JollofCuisineWeb1\application\controllers\Products.php 688
ERROR - 2019-01-18 10:09:11 --> Severity: Notice --> Undefined variable: store C:\xampp\htdocs\JollofCuisineWeb1\application\controllers\Products.php 689
ERROR - 2019-01-18 10:09:11 --> Severity: Notice --> Undefined index: store_url C:\xampp\htdocs\JollofCuisineWeb1\application\views\fashion_view\store.php 94
ERROR - 2019-01-18 10:09:11 --> Severity: Notice --> Undefined index: store_url C:\xampp\htdocs\JollofCuisineWeb1\application\views\fashion_view\store.php 111
ERROR - 2019-01-18 10:09:11 --> Severity: Notice --> Undefined index: store_url C:\xampp\htdocs\JollofCuisineWeb1\application\views\fashion_view\store.php 138
ERROR - 2019-01-18 10:09:11 --> Severity: Notice --> Undefined index: price C:\xampp\htdocs\JollofCuisineWeb1\application\views\fashion_view\store.php 175
ERROR - 2019-01-18 10:09:11 --> Severity: Notice --> Undefined index: storename C:\xampp\htdocs\JollofCuisineWeb1\application\views\fashion_view\store.php 179
ERROR - 2019-01-18 10:09:11 --> Severity: Notice --> Undefined index: storename C:\xampp\htdocs\JollofCuisineWeb1\application\views\fashion_view\store.php 181
ERROR - 2019-01-18 10:09:11 --> Severity: Notice --> Undefined index: store_url C:\xampp\htdocs\JollofCuisineWeb1\application\views\fashion_view\store.php 191
ERROR - 2019-01-18 10:09:11 --> Severity: Notice --> Undefined index: store_url C:\xampp\htdocs\JollofCuisineWeb1\application\views\fashion_view\store.php 196
ERROR - 2019-01-18 10:09:11 --> Severity: Notice --> Undefined index: store_url C:\xampp\htdocs\JollofCuisineWeb1\application\views\fashion_view\store.php 209
ERROR - 2019-01-18 10:09:11 --> Severity: Notice --> Undefined index: price C:\xampp\htdocs\JollofCuisineWeb1\application\views\fashion_view\store.php 246
ERROR - 2019-01-18 10:09:11 --> Severity: Notice --> Undefined index: store_url C:\xampp\htdocs\JollofCuisineWeb1\application\views\fashion_view\store.php 264
ERROR - 2019-01-18 10:09:11 --> Severity: Notice --> Undefined index: storename C:\xampp\htdocs\JollofCuisineWeb1\application\views\fashion_view\store.php 267
ERROR - 2019-01-18 10:09:11 --> Severity: Notice --> Undefined index: storename C:\xampp\htdocs\JollofCuisineWeb1\application\views\fashion_view\store.php 277
ERROR - 2019-01-18 10:09:11 --> Severity: Notice --> Undefined index: store_url C:\xampp\htdocs\JollofCuisineWeb1\application\views\fashion_view\store.php 277
ERROR - 2019-01-18 10:09:11 --> Severity: Notice --> Undefined index: store_url C:\xampp\htdocs\JollofCuisineWeb1\application\views\fashion_view\store.php 94
ERROR - 2019-01-18 10:09:11 --> Severity: Notice --> Undefined index: store_url C:\xampp\htdocs\JollofCuisineWeb1\application\views\fashion_view\store.php 111
ERROR - 2019-01-18 10:09:11 --> Severity: Notice --> Undefined index: store_url C:\xampp\htdocs\JollofCuisineWeb1\application\views\fashion_view\store.php 138
ERROR - 2019-01-18 10:09:11 --> Severity: Notice --> Undefined index: price C:\xampp\htdocs\JollofCuisineWeb1\application\views\fashion_view\store.php 175
ERROR - 2019-01-18 10:09:11 --> Severity: Notice --> Undefined index: storename C:\xampp\htdocs\JollofCuisineWeb1\application\views\fashion_view\store.php 179
ERROR - 2019-01-18 10:09:11 --> Severity: Notice --> Undefined index: storename C:\xampp\htdocs\JollofCuisineWeb1\application\views\fashion_view\store.php 181
ERROR - 2019-01-18 10:09:11 --> Severity: Notice --> Undefined index: store_url C:\xampp\htdocs\JollofCuisineWeb1\application\views\fashion_view\store.php 191
ERROR - 2019-01-18 10:09:11 --> Severity: Notice --> Undefined index: store_url C:\xampp\htdocs\JollofCuisineWeb1\application\views\fashion_view\store.php 196
ERROR - 2019-01-18 10:09:11 --> Severity: Notice --> Undefined index: store_url C:\xampp\htdocs\JollofCuisineWeb1\application\views\fashion_view\store.php 209
ERROR - 2019-01-18 10:09:11 --> Severity: Notice --> Undefined index: price C:\xampp\htdocs\JollofCuisineWeb1\application\views\fashion_view\store.php 246
ERROR - 2019-01-18 10:09:11 --> Severity: Notice --> Undefined index: store_url C:\xampp\htdocs\JollofCuisineWeb1\application\views\fashion_view\store.php 264
ERROR - 2019-01-18 10:09:11 --> Severity: Notice --> Undefined index: storename C:\xampp\htdocs\JollofCuisineWeb1\application\views\fashion_view\store.php 267
ERROR - 2019-01-18 10:09:11 --> Severity: Notice --> Undefined index: storename C:\xampp\htdocs\JollofCuisineWeb1\application\views\fashion_view\store.php 277
ERROR - 2019-01-18 10:09:11 --> Severity: Notice --> Undefined index: store_url C:\xampp\htdocs\JollofCuisineWeb1\application\views\fashion_view\store.php 277
ERROR - 2019-01-18 10:10:08 --> Severity: Notice --> Undefined index: store_url C:\xampp\htdocs\JollofCuisineWeb1\application\views\fashion_view\store.php 94
ERROR - 2019-01-18 10:10:08 --> Severity: Notice --> Undefined index: store_url C:\xampp\htdocs\JollofCuisineWeb1\application\views\fashion_view\store.php 111
ERROR - 2019-01-18 10:10:08 --> Severity: Notice --> Undefined index: store_url C:\xampp\htdocs\JollofCuisineWeb1\application\views\fashion_view\store.php 138
ERROR - 2019-01-18 10:10:08 --> Severity: Notice --> Undefined index: price C:\xampp\htdocs\JollofCuisineWeb1\application\views\fashion_view\store.php 175
ERROR - 2019-01-18 10:10:08 --> Severity: Notice --> Undefined index: storename C:\xampp\htdocs\JollofCuisineWeb1\application\views\fashion_view\store.php 179
ERROR - 2019-01-18 10:10:08 --> Severity: Notice --> Undefined index: storename C:\xampp\htdocs\JollofCuisineWeb1\application\views\fashion_view\store.php 181
ERROR - 2019-01-18 10:10:08 --> Severity: Notice --> Undefined index: store_url C:\xampp\htdocs\JollofCuisineWeb1\application\views\fashion_view\store.php 191
ERROR - 2019-01-18 10:10:08 --> Severity: Notice --> Undefined index: store_url C:\xampp\htdocs\JollofCuisineWeb1\application\views\fashion_view\store.php 196
ERROR - 2019-01-18 10:10:08 --> Severity: Notice --> Undefined index: store_url C:\xampp\htdocs\JollofCuisineWeb1\application\views\fashion_view\store.php 209
ERROR - 2019-01-18 10:10:08 --> Severity: Notice --> Undefined index: price C:\xampp\htdocs\JollofCuisineWeb1\application\views\fashion_view\store.php 246
ERROR - 2019-01-18 10:10:08 --> Severity: Notice --> Undefined index: store_url C:\xampp\htdocs\JollofCuisineWeb1\application\views\fashion_view\store.php 264
ERROR - 2019-01-18 10:10:08 --> Severity: Notice --> Undefined index: storename C:\xampp\htdocs\JollofCuisineWeb1\application\views\fashion_view\store.php 267
ERROR - 2019-01-18 10:10:08 --> Severity: Notice --> Undefined index: storename C:\xampp\htdocs\JollofCuisineWeb1\application\views\fashion_view\store.php 277
ERROR - 2019-01-18 10:10:08 --> Severity: Notice --> Undefined index: store_url C:\xampp\htdocs\JollofCuisineWeb1\application\views\fashion_view\store.php 277
ERROR - 2019-01-18 10:10:08 --> Severity: Notice --> Undefined index: store_url C:\xampp\htdocs\JollofCuisineWeb1\application\views\fashion_view\store.php 94
ERROR - 2019-01-18 10:10:08 --> Severity: Notice --> Undefined index: store_url C:\xampp\htdocs\JollofCuisineWeb1\application\views\fashion_view\store.php 111
ERROR - 2019-01-18 10:10:08 --> Severity: Notice --> Undefined index: store_url C:\xampp\htdocs\JollofCuisineWeb1\application\views\fashion_view\store.php 138
ERROR - 2019-01-18 10:10:08 --> Severity: Notice --> Undefined index: price C:\xampp\htdocs\JollofCuisineWeb1\application\views\fashion_view\store.php 175
ERROR - 2019-01-18 10:10:08 --> Severity: Notice --> Undefined index: storename C:\xampp\htdocs\JollofCuisineWeb1\application\views\fashion_view\store.php 179
ERROR - 2019-01-18 10:10:08 --> Severity: Notice --> Undefined index: storename C:\xampp\htdocs\JollofCuisineWeb1\application\views\fashion_view\store.php 181
ERROR - 2019-01-18 10:10:08 --> Severity: Notice --> Undefined index: store_url C:\xampp\htdocs\JollofCuisineWeb1\application\views\fashion_view\store.php 191
ERROR - 2019-01-18 10:10:08 --> Severity: Notice --> Undefined index: store_url C:\xampp\htdocs\JollofCuisineWeb1\application\views\fashion_view\store.php 196
ERROR - 2019-01-18 10:10:08 --> Severity: Notice --> Undefined index: store_url C:\xampp\htdocs\JollofCuisineWeb1\application\views\fashion_view\store.php 209
ERROR - 2019-01-18 10:10:08 --> Severity: Notice --> Undefined index: price C:\xampp\htdocs\JollofCuisineWeb1\application\views\fashion_view\store.php 246
ERROR - 2019-01-18 10:10:08 --> Severity: Notice --> Undefined index: store_url C:\xampp\htdocs\JollofCuisineWeb1\application\views\fashion_view\store.php 264
ERROR - 2019-01-18 10:10:08 --> Severity: Notice --> Undefined index: storename C:\xampp\htdocs\JollofCuisineWeb1\application\views\fashion_view\store.php 267
ERROR - 2019-01-18 10:10:08 --> Severity: Notice --> Undefined index: storename C:\xampp\htdocs\JollofCuisineWeb1\application\views\fashion_view\store.php 277
ERROR - 2019-01-18 10:10:08 --> Severity: Notice --> Undefined index: store_url C:\xampp\htdocs\JollofCuisineWeb1\application\views\fashion_view\store.php 277
ERROR - 2019-01-18 10:12:57 --> Severity: Notice --> Undefined index: store_url C:\xampp\htdocs\JollofCuisineWeb1\application\views\fashion_view\giftporter.php 94
ERROR - 2019-01-18 10:12:57 --> Severity: Notice --> Undefined index: store_url C:\xampp\htdocs\JollofCuisineWeb1\application\views\fashion_view\giftporter.php 111
ERROR - 2019-01-18 10:12:57 --> Severity: Notice --> Undefined index: store_url C:\xampp\htdocs\JollofCuisineWeb1\application\views\fashion_view\giftporter.php 138
ERROR - 2019-01-18 10:12:57 --> Severity: Notice --> Undefined index: price C:\xampp\htdocs\JollofCuisineWeb1\application\views\fashion_view\giftporter.php 175
ERROR - 2019-01-18 10:12:57 --> Severity: Notice --> Undefined index: storename C:\xampp\htdocs\JollofCuisineWeb1\application\views\fashion_view\giftporter.php 179
ERROR - 2019-01-18 10:12:57 --> Severity: Notice --> Undefined index: storename C:\xampp\htdocs\JollofCuisineWeb1\application\views\fashion_view\giftporter.php 181
ERROR - 2019-01-18 10:12:57 --> Severity: Notice --> Undefined index: store_url C:\xampp\htdocs\JollofCuisineWeb1\application\views\fashion_view\giftporter.php 191
ERROR - 2019-01-18 10:12:57 --> Severity: Notice --> Undefined index: store_url C:\xampp\htdocs\JollofCuisineWeb1\application\views\fashion_view\giftporter.php 196
ERROR - 2019-01-18 10:12:57 --> Severity: Notice --> Undefined index: store_url C:\xampp\htdocs\JollofCuisineWeb1\application\views\fashion_view\giftporter.php 209
ERROR - 2019-01-18 10:12:57 --> Severity: Notice --> Undefined index: price C:\xampp\htdocs\JollofCuisineWeb1\application\views\fashion_view\giftporter.php 246
ERROR - 2019-01-18 10:12:57 --> Severity: Notice --> Undefined index: store_url C:\xampp\htdocs\JollofCuisineWeb1\application\views\fashion_view\giftporter.php 264
ERROR - 2019-01-18 10:12:57 --> Severity: Notice --> Undefined index: storename C:\xampp\htdocs\JollofCuisineWeb1\application\views\fashion_view\giftporter.php 267
ERROR - 2019-01-18 10:12:57 --> Severity: Notice --> Undefined index: storename C:\xampp\htdocs\JollofCuisineWeb1\application\views\fashion_view\giftporter.php 277
ERROR - 2019-01-18 10:12:57 --> Severity: Notice --> Undefined index: store_url C:\xampp\htdocs\JollofCuisineWeb1\application\views\fashion_view\giftporter.php 277
ERROR - 2019-01-18 10:12:57 --> Severity: Notice --> Undefined index: store_url C:\xampp\htdocs\JollofCuisineWeb1\application\views\fashion_view\giftporter.php 94
ERROR - 2019-01-18 10:12:57 --> Severity: Notice --> Undefined index: store_url C:\xampp\htdocs\JollofCuisineWeb1\application\views\fashion_view\giftporter.php 111
ERROR - 2019-01-18 10:12:57 --> Severity: Notice --> Undefined index: store_url C:\xampp\htdocs\JollofCuisineWeb1\application\views\fashion_view\giftporter.php 138
ERROR - 2019-01-18 10:12:57 --> Severity: Notice --> Undefined index: price C:\xampp\htdocs\JollofCuisineWeb1\application\views\fashion_view\giftporter.php 175
ERROR - 2019-01-18 10:12:57 --> Severity: Notice --> Undefined index: storename C:\xampp\htdocs\JollofCuisineWeb1\application\views\fashion_view\giftporter.php 179
ERROR - 2019-01-18 10:12:57 --> Severity: Notice --> Undefined index: storename C:\xampp\htdocs\JollofCuisineWeb1\application\views\fashion_view\giftporter.php 181
ERROR - 2019-01-18 10:12:57 --> Severity: Notice --> Undefined index: store_url C:\xampp\htdocs\JollofCuisineWeb1\application\views\fashion_view\giftporter.php 191
ERROR - 2019-01-18 10:12:57 --> Severity: Notice --> Undefined index: store_url C:\xampp\htdocs\JollofCuisineWeb1\application\views\fashion_view\giftporter.php 196
ERROR - 2019-01-18 10:12:57 --> Severity: Notice --> Undefined index: store_url C:\xampp\htdocs\JollofCuisineWeb1\application\views\fashion_view\giftporter.php 209
ERROR - 2019-01-18 10:12:57 --> Severity: Notice --> Undefined index: price C:\xampp\htdocs\JollofCuisineWeb1\application\views\fashion_view\giftporter.php 246
ERROR - 2019-01-18 10:12:57 --> Severity: Notice --> Undefined index: store_url C:\xampp\htdocs\JollofCuisineWeb1\application\views\fashion_view\giftporter.php 264
ERROR - 2019-01-18 10:12:57 --> Severity: Notice --> Undefined index: storename C:\xampp\htdocs\JollofCuisineWeb1\application\views\fashion_view\giftporter.php 267
ERROR - 2019-01-18 10:12:57 --> Severity: Notice --> Undefined index: storename C:\xampp\htdocs\JollofCuisineWeb1\application\views\fashion_view\giftporter.php 277
ERROR - 2019-01-18 10:12:57 --> Severity: Notice --> Undefined index: store_url C:\xampp\htdocs\JollofCuisineWeb1\application\views\fashion_view\giftporter.php 277
ERROR - 2019-01-18 10:13:30 --> Severity: Notice --> Undefined index: store_url C:\xampp\htdocs\JollofCuisineWeb1\application\views\fashion_view\giftporter.php 57
ERROR - 2019-01-18 10:13:30 --> Severity: Notice --> Undefined index: store_url C:\xampp\htdocs\JollofCuisineWeb1\application\views\fashion_view\giftporter.php 74
ERROR - 2019-01-18 10:13:30 --> Severity: Notice --> Undefined index: store_url C:\xampp\htdocs\JollofCuisineWeb1\application\views\fashion_view\giftporter.php 101
ERROR - 2019-01-18 10:13:30 --> Severity: Notice --> Undefined index: price C:\xampp\htdocs\JollofCuisineWeb1\application\views\fashion_view\giftporter.php 138
ERROR - 2019-01-18 10:13:30 --> Severity: Notice --> Undefined index: storename C:\xampp\htdocs\JollofCuisineWeb1\application\views\fashion_view\giftporter.php 142
ERROR - 2019-01-18 10:13:30 --> Severity: Notice --> Undefined index: storename C:\xampp\htdocs\JollofCuisineWeb1\application\views\fashion_view\giftporter.php 144
ERROR - 2019-01-18 10:13:30 --> Severity: Notice --> Undefined index: store_url C:\xampp\htdocs\JollofCuisineWeb1\application\views\fashion_view\giftporter.php 154
ERROR - 2019-01-18 10:13:30 --> Severity: Notice --> Undefined index: store_url C:\xampp\htdocs\JollofCuisineWeb1\application\views\fashion_view\giftporter.php 159
ERROR - 2019-01-18 10:13:30 --> Severity: Notice --> Undefined index: store_url C:\xampp\htdocs\JollofCuisineWeb1\application\views\fashion_view\giftporter.php 172
ERROR - 2019-01-18 10:13:30 --> Severity: Notice --> Undefined index: price C:\xampp\htdocs\JollofCuisineWeb1\application\views\fashion_view\giftporter.php 209
ERROR - 2019-01-18 10:13:30 --> Severity: Notice --> Undefined index: store_url C:\xampp\htdocs\JollofCuisineWeb1\application\views\fashion_view\giftporter.php 227
ERROR - 2019-01-18 10:13:30 --> Severity: Notice --> Undefined index: storename C:\xampp\htdocs\JollofCuisineWeb1\application\views\fashion_view\giftporter.php 230
ERROR - 2019-01-18 10:13:30 --> Severity: Notice --> Undefined index: storename C:\xampp\htdocs\JollofCuisineWeb1\application\views\fashion_view\giftporter.php 240
ERROR - 2019-01-18 10:13:30 --> Severity: Notice --> Undefined index: store_url C:\xampp\htdocs\JollofCuisineWeb1\application\views\fashion_view\giftporter.php 240
ERROR - 2019-01-18 10:13:30 --> Severity: Notice --> Undefined index: store_url C:\xampp\htdocs\JollofCuisineWeb1\application\views\fashion_view\giftporter.php 57
ERROR - 2019-01-18 10:13:30 --> Severity: Notice --> Undefined index: store_url C:\xampp\htdocs\JollofCuisineWeb1\application\views\fashion_view\giftporter.php 74
ERROR - 2019-01-18 10:13:30 --> Severity: Notice --> Undefined index: store_url C:\xampp\htdocs\JollofCuisineWeb1\application\views\fashion_view\giftporter.php 101
ERROR - 2019-01-18 10:13:30 --> Severity: Notice --> Undefined index: price C:\xampp\htdocs\JollofCuisineWeb1\application\views\fashion_view\giftporter.php 138
ERROR - 2019-01-18 10:13:30 --> Severity: Notice --> Undefined index: storename C:\xampp\htdocs\JollofCuisineWeb1\application\views\fashion_view\giftporter.php 142
ERROR - 2019-01-18 10:13:30 --> Severity: Notice --> Undefined index: storename C:\xampp\htdocs\JollofCuisineWeb1\application\views\fashion_view\giftporter.php 144
ERROR - 2019-01-18 10:13:30 --> Severity: Notice --> Undefined index: store_url C:\xampp\htdocs\JollofCuisineWeb1\application\views\fashion_view\giftporter.php 154
ERROR - 2019-01-18 10:13:30 --> Severity: Notice --> Undefined index: store_url C:\xampp\htdocs\JollofCuisineWeb1\application\views\fashion_view\giftporter.php 159
ERROR - 2019-01-18 10:13:30 --> Severity: Notice --> Undefined index: store_url C:\xampp\htdocs\JollofCuisineWeb1\application\views\fashion_view\giftporter.php 172
ERROR - 2019-01-18 10:13:30 --> Severity: Notice --> Undefined index: price C:\xampp\htdocs\JollofCuisineWeb1\application\views\fashion_view\giftporter.php 209
ERROR - 2019-01-18 10:13:30 --> Severity: Notice --> Undefined index: store_url C:\xampp\htdocs\JollofCuisineWeb1\application\views\fashion_view\giftporter.php 227
ERROR - 2019-01-18 10:13:30 --> Severity: Notice --> Undefined index: storename C:\xampp\htdocs\JollofCuisineWeb1\application\views\fashion_view\giftporter.php 230
ERROR - 2019-01-18 10:13:30 --> Severity: Notice --> Undefined index: storename C:\xampp\htdocs\JollofCuisineWeb1\application\views\fashion_view\giftporter.php 240
ERROR - 2019-01-18 10:13:30 --> Severity: Notice --> Undefined index: store_url C:\xampp\htdocs\JollofCuisineWeb1\application\views\fashion_view\giftporter.php 240
ERROR - 2019-01-18 10:13:39 --> Severity: Notice --> Undefined index: store_url C:\xampp\htdocs\JollofCuisineWeb1\application\views\fashion_view\giftporter.php 94
ERROR - 2019-01-18 10:13:39 --> Severity: Notice --> Undefined index: store_url C:\xampp\htdocs\JollofCuisineWeb1\application\views\fashion_view\giftporter.php 111
ERROR - 2019-01-18 10:13:39 --> Severity: Notice --> Undefined index: store_url C:\xampp\htdocs\JollofCuisineWeb1\application\views\fashion_view\giftporter.php 138
ERROR - 2019-01-18 10:13:39 --> Severity: Notice --> Undefined index: price C:\xampp\htdocs\JollofCuisineWeb1\application\views\fashion_view\giftporter.php 175
ERROR - 2019-01-18 10:13:39 --> Severity: Notice --> Undefined index: storename C:\xampp\htdocs\JollofCuisineWeb1\application\views\fashion_view\giftporter.php 179
ERROR - 2019-01-18 10:13:39 --> Severity: Notice --> Undefined index: storename C:\xampp\htdocs\JollofCuisineWeb1\application\views\fashion_view\giftporter.php 181
ERROR - 2019-01-18 10:13:39 --> Severity: Notice --> Undefined index: store_url C:\xampp\htdocs\JollofCuisineWeb1\application\views\fashion_view\giftporter.php 191
ERROR - 2019-01-18 10:13:39 --> Severity: Notice --> Undefined index: store_url C:\xampp\htdocs\JollofCuisineWeb1\application\views\fashion_view\giftporter.php 196
ERROR - 2019-01-18 10:13:39 --> Severity: Notice --> Undefined index: store_url C:\xampp\htdocs\JollofCuisineWeb1\application\views\fashion_view\giftporter.php 209
ERROR - 2019-01-18 10:13:39 --> Severity: Notice --> Undefined index: price C:\xampp\htdocs\JollofCuisineWeb1\application\views\fashion_view\giftporter.php 246
ERROR - 2019-01-18 10:13:39 --> Severity: Notice --> Undefined index: store_url C:\xampp\htdocs\JollofCuisineWeb1\application\views\fashion_view\giftporter.php 264
ERROR - 2019-01-18 10:13:39 --> Severity: Notice --> Undefined index: storename C:\xampp\htdocs\JollofCuisineWeb1\application\views\fashion_view\giftporter.php 267
ERROR - 2019-01-18 10:13:39 --> Severity: Notice --> Undefined index: storename C:\xampp\htdocs\JollofCuisineWeb1\application\views\fashion_view\giftporter.php 277
ERROR - 2019-01-18 10:13:39 --> Severity: Notice --> Undefined index: store_url C:\xampp\htdocs\JollofCuisineWeb1\application\views\fashion_view\giftporter.php 277
ERROR - 2019-01-18 10:13:39 --> Severity: Notice --> Undefined index: store_url C:\xampp\htdocs\JollofCuisineWeb1\application\views\fashion_view\giftporter.php 94
ERROR - 2019-01-18 10:13:39 --> Severity: Notice --> Undefined index: store_url C:\xampp\htdocs\JollofCuisineWeb1\application\views\fashion_view\giftporter.php 111
ERROR - 2019-01-18 10:13:39 --> Severity: Notice --> Undefined index: store_url C:\xampp\htdocs\JollofCuisineWeb1\application\views\fashion_view\giftporter.php 138
ERROR - 2019-01-18 10:13:39 --> Severity: Notice --> Undefined index: price C:\xampp\htdocs\JollofCuisineWeb1\application\views\fashion_view\giftporter.php 175
ERROR - 2019-01-18 10:13:39 --> Severity: Notice --> Undefined index: storename C:\xampp\htdocs\JollofCuisineWeb1\application\views\fashion_view\giftporter.php 179
ERROR - 2019-01-18 10:13:39 --> Severity: Notice --> Undefined index: storename C:\xampp\htdocs\JollofCuisineWeb1\application\views\fashion_view\giftporter.php 181
ERROR - 2019-01-18 10:13:39 --> Severity: Notice --> Undefined index: store_url C:\xampp\htdocs\JollofCuisineWeb1\application\views\fashion_view\giftporter.php 191
ERROR - 2019-01-18 10:13:39 --> Severity: Notice --> Undefined index: store_url C:\xampp\htdocs\JollofCuisineWeb1\application\views\fashion_view\giftporter.php 196
ERROR - 2019-01-18 10:13:39 --> Severity: Notice --> Undefined index: store_url C:\xampp\htdocs\JollofCuisineWeb1\application\views\fashion_view\giftporter.php 209
ERROR - 2019-01-18 10:13:39 --> Severity: Notice --> Undefined index: price C:\xampp\htdocs\JollofCuisineWeb1\application\views\fashion_view\giftporter.php 246
ERROR - 2019-01-18 10:13:39 --> Severity: Notice --> Undefined index: store_url C:\xampp\htdocs\JollofCuisineWeb1\application\views\fashion_view\giftporter.php 264
ERROR - 2019-01-18 10:13:39 --> Severity: Notice --> Undefined index: storename C:\xampp\htdocs\JollofCuisineWeb1\application\views\fashion_view\giftporter.php 267
ERROR - 2019-01-18 10:13:39 --> Severity: Notice --> Undefined index: storename C:\xampp\htdocs\JollofCuisineWeb1\application\views\fashion_view\giftporter.php 277
ERROR - 2019-01-18 10:13:39 --> Severity: Notice --> Undefined index: store_url C:\xampp\htdocs\JollofCuisineWeb1\application\views\fashion_view\giftporter.php 277
ERROR - 2019-01-18 10:14:08 --> Severity: Notice --> Undefined index: store_url C:\xampp\htdocs\JollofCuisineWeb1\application\views\fashion_view\giftporter.php 70
ERROR - 2019-01-18 10:14:08 --> Severity: Notice --> Undefined index: store_url C:\xampp\htdocs\JollofCuisineWeb1\application\views\fashion_view\giftporter.php 87
ERROR - 2019-01-18 10:14:08 --> Severity: Notice --> Undefined index: store_url C:\xampp\htdocs\JollofCuisineWeb1\application\views\fashion_view\giftporter.php 114
ERROR - 2019-01-18 10:14:08 --> Severity: Notice --> Undefined index: price C:\xampp\htdocs\JollofCuisineWeb1\application\views\fashion_view\giftporter.php 151
ERROR - 2019-01-18 10:14:08 --> Severity: Notice --> Undefined index: storename C:\xampp\htdocs\JollofCuisineWeb1\application\views\fashion_view\giftporter.php 155
ERROR - 2019-01-18 10:14:08 --> Severity: Notice --> Undefined index: storename C:\xampp\htdocs\JollofCuisineWeb1\application\views\fashion_view\giftporter.php 157
ERROR - 2019-01-18 10:14:08 --> Severity: Notice --> Undefined index: store_url C:\xampp\htdocs\JollofCuisineWeb1\application\views\fashion_view\giftporter.php 167
ERROR - 2019-01-18 10:14:08 --> Severity: Notice --> Undefined index: store_url C:\xampp\htdocs\JollofCuisineWeb1\application\views\fashion_view\giftporter.php 172
ERROR - 2019-01-18 10:14:08 --> Severity: Notice --> Undefined index: store_url C:\xampp\htdocs\JollofCuisineWeb1\application\views\fashion_view\giftporter.php 185
ERROR - 2019-01-18 10:14:08 --> Severity: Notice --> Undefined index: price C:\xampp\htdocs\JollofCuisineWeb1\application\views\fashion_view\giftporter.php 222
ERROR - 2019-01-18 10:14:08 --> Severity: Notice --> Undefined index: store_url C:\xampp\htdocs\JollofCuisineWeb1\application\views\fashion_view\giftporter.php 240
ERROR - 2019-01-18 10:14:08 --> Severity: Notice --> Undefined index: storename C:\xampp\htdocs\JollofCuisineWeb1\application\views\fashion_view\giftporter.php 243
ERROR - 2019-01-18 10:14:08 --> Severity: Notice --> Undefined index: storename C:\xampp\htdocs\JollofCuisineWeb1\application\views\fashion_view\giftporter.php 253
ERROR - 2019-01-18 10:14:08 --> Severity: Notice --> Undefined index: store_url C:\xampp\htdocs\JollofCuisineWeb1\application\views\fashion_view\giftporter.php 253
ERROR - 2019-01-18 10:14:08 --> Severity: Notice --> Undefined index: store_url C:\xampp\htdocs\JollofCuisineWeb1\application\views\fashion_view\giftporter.php 70
ERROR - 2019-01-18 10:14:08 --> Severity: Notice --> Undefined index: store_url C:\xampp\htdocs\JollofCuisineWeb1\application\views\fashion_view\giftporter.php 87
ERROR - 2019-01-18 10:14:08 --> Severity: Notice --> Undefined index: store_url C:\xampp\htdocs\JollofCuisineWeb1\application\views\fashion_view\giftporter.php 114
ERROR - 2019-01-18 10:14:08 --> Severity: Notice --> Undefined index: price C:\xampp\htdocs\JollofCuisineWeb1\application\views\fashion_view\giftporter.php 151
ERROR - 2019-01-18 10:14:08 --> Severity: Notice --> Undefined index: storename C:\xampp\htdocs\JollofCuisineWeb1\application\views\fashion_view\giftporter.php 155
ERROR - 2019-01-18 10:14:08 --> Severity: Notice --> Undefined index: storename C:\xampp\htdocs\JollofCuisineWeb1\application\views\fashion_view\giftporter.php 157
ERROR - 2019-01-18 10:14:08 --> Severity: Notice --> Undefined index: store_url C:\xampp\htdocs\JollofCuisineWeb1\application\views\fashion_view\giftporter.php 167
ERROR - 2019-01-18 10:14:08 --> Severity: Notice --> Undefined index: store_url C:\xampp\htdocs\JollofCuisineWeb1\application\views\fashion_view\giftporter.php 172
ERROR - 2019-01-18 10:14:08 --> Severity: Notice --> Undefined index: store_url C:\xampp\htdocs\JollofCuisineWeb1\application\views\fashion_view\giftporter.php 185
ERROR - 2019-01-18 10:14:08 --> Severity: Notice --> Undefined index: price C:\xampp\htdocs\JollofCuisineWeb1\application\views\fashion_view\giftporter.php 222
ERROR - 2019-01-18 10:14:08 --> Severity: Notice --> Undefined index: store_url C:\xampp\htdocs\JollofCuisineWeb1\application\views\fashion_view\giftporter.php 240
ERROR - 2019-01-18 10:14:08 --> Severity: Notice --> Undefined index: storename C:\xampp\htdocs\JollofCuisineWeb1\application\views\fashion_view\giftporter.php 243
ERROR - 2019-01-18 10:14:08 --> Severity: Notice --> Undefined index: storename C:\xampp\htdocs\JollofCuisineWeb1\application\views\fashion_view\giftporter.php 253
ERROR - 2019-01-18 10:14:08 --> Severity: Notice --> Undefined index: store_url C:\xampp\htdocs\JollofCuisineWeb1\application\views\fashion_view\giftporter.php 253
ERROR - 2019-01-18 10:14:21 --> Severity: Notice --> Undefined index: store_url C:\xampp\htdocs\JollofCuisineWeb1\application\views\fashion_view\giftporter.php 68
ERROR - 2019-01-18 10:14:21 --> Severity: Notice --> Undefined index: store_url C:\xampp\htdocs\JollofCuisineWeb1\application\views\fashion_view\giftporter.php 85
ERROR - 2019-01-18 10:14:21 --> Severity: Notice --> Undefined index: store_url C:\xampp\htdocs\JollofCuisineWeb1\application\views\fashion_view\giftporter.php 112
ERROR - 2019-01-18 10:14:22 --> Severity: Notice --> Undefined index: price C:\xampp\htdocs\JollofCuisineWeb1\application\views\fashion_view\giftporter.php 149
ERROR - 2019-01-18 10:14:22 --> Severity: Notice --> Undefined index: storename C:\xampp\htdocs\JollofCuisineWeb1\application\views\fashion_view\giftporter.php 153
ERROR - 2019-01-18 10:14:22 --> Severity: Notice --> Undefined index: storename C:\xampp\htdocs\JollofCuisineWeb1\application\views\fashion_view\giftporter.php 155
ERROR - 2019-01-18 10:14:22 --> Severity: Notice --> Undefined index: store_url C:\xampp\htdocs\JollofCuisineWeb1\application\views\fashion_view\giftporter.php 165
ERROR - 2019-01-18 10:14:22 --> Severity: Notice --> Undefined index: store_url C:\xampp\htdocs\JollofCuisineWeb1\application\views\fashion_view\giftporter.php 170
ERROR - 2019-01-18 10:14:22 --> Severity: Notice --> Undefined index: store_url C:\xampp\htdocs\JollofCuisineWeb1\application\views\fashion_view\giftporter.php 183
ERROR - 2019-01-18 10:14:22 --> Severity: Notice --> Undefined index: price C:\xampp\htdocs\JollofCuisineWeb1\application\views\fashion_view\giftporter.php 220
ERROR - 2019-01-18 10:14:22 --> Severity: Notice --> Undefined index: store_url C:\xampp\htdocs\JollofCuisineWeb1\application\views\fashion_view\giftporter.php 238
ERROR - 2019-01-18 10:14:22 --> Severity: Notice --> Undefined index: storename C:\xampp\htdocs\JollofCuisineWeb1\application\views\fashion_view\giftporter.php 241
ERROR - 2019-01-18 10:14:22 --> Severity: Notice --> Undefined index: storename C:\xampp\htdocs\JollofCuisineWeb1\application\views\fashion_view\giftporter.php 251
ERROR - 2019-01-18 10:14:22 --> Severity: Notice --> Undefined index: store_url C:\xampp\htdocs\JollofCuisineWeb1\application\views\fashion_view\giftporter.php 251
ERROR - 2019-01-18 10:14:22 --> Severity: Notice --> Undefined index: store_url C:\xampp\htdocs\JollofCuisineWeb1\application\views\fashion_view\giftporter.php 68
ERROR - 2019-01-18 10:14:22 --> Severity: Notice --> Undefined index: store_url C:\xampp\htdocs\JollofCuisineWeb1\application\views\fashion_view\giftporter.php 85
ERROR - 2019-01-18 10:14:22 --> Severity: Notice --> Undefined index: store_url C:\xampp\htdocs\JollofCuisineWeb1\application\views\fashion_view\giftporter.php 112
ERROR - 2019-01-18 10:14:22 --> Severity: Notice --> Undefined index: price C:\xampp\htdocs\JollofCuisineWeb1\application\views\fashion_view\giftporter.php 149
ERROR - 2019-01-18 10:14:22 --> Severity: Notice --> Undefined index: storename C:\xampp\htdocs\JollofCuisineWeb1\application\views\fashion_view\giftporter.php 153
ERROR - 2019-01-18 10:14:22 --> Severity: Notice --> Undefined index: storename C:\xampp\htdocs\JollofCuisineWeb1\application\views\fashion_view\giftporter.php 155
ERROR - 2019-01-18 10:14:22 --> Severity: Notice --> Undefined index: store_url C:\xampp\htdocs\JollofCuisineWeb1\application\views\fashion_view\giftporter.php 165
ERROR - 2019-01-18 10:14:22 --> Severity: Notice --> Undefined index: store_url C:\xampp\htdocs\JollofCuisineWeb1\application\views\fashion_view\giftporter.php 170
ERROR - 2019-01-18 10:14:22 --> Severity: Notice --> Undefined index: store_url C:\xampp\htdocs\JollofCuisineWeb1\application\views\fashion_view\giftporter.php 183
ERROR - 2019-01-18 10:14:22 --> Severity: Notice --> Undefined index: price C:\xampp\htdocs\JollofCuisineWeb1\application\views\fashion_view\giftporter.php 220
ERROR - 2019-01-18 10:14:22 --> Severity: Notice --> Undefined index: store_url C:\xampp\htdocs\JollofCuisineWeb1\application\views\fashion_view\giftporter.php 238
ERROR - 2019-01-18 10:14:22 --> Severity: Notice --> Undefined index: storename C:\xampp\htdocs\JollofCuisineWeb1\application\views\fashion_view\giftporter.php 241
ERROR - 2019-01-18 10:14:22 --> Severity: Notice --> Undefined index: storename C:\xampp\htdocs\JollofCuisineWeb1\application\views\fashion_view\giftporter.php 251
ERROR - 2019-01-18 10:14:22 --> Severity: Notice --> Undefined index: store_url C:\xampp\htdocs\JollofCuisineWeb1\application\views\fashion_view\giftporter.php 251
ERROR - 2019-01-18 10:14:39 --> Severity: Notice --> Undefined index: store_url C:\xampp\htdocs\JollofCuisineWeb1\application\views\fashion_view\giftporter.php 68
ERROR - 2019-01-18 10:14:39 --> Severity: Notice --> Undefined index: store_url C:\xampp\htdocs\JollofCuisineWeb1\application\views\fashion_view\giftporter.php 85
ERROR - 2019-01-18 10:14:39 --> Severity: Notice --> Undefined index: store_url C:\xampp\htdocs\JollofCuisineWeb1\application\views\fashion_view\giftporter.php 112
ERROR - 2019-01-18 10:14:39 --> Severity: Notice --> Undefined index: price C:\xampp\htdocs\JollofCuisineWeb1\application\views\fashion_view\giftporter.php 149
ERROR - 2019-01-18 10:14:39 --> Severity: Notice --> Undefined index: storename C:\xampp\htdocs\JollofCuisineWeb1\application\views\fashion_view\giftporter.php 153
ERROR - 2019-01-18 10:14:39 --> Severity: Notice --> Undefined index: storename C:\xampp\htdocs\JollofCuisineWeb1\application\views\fashion_view\giftporter.php 155
ERROR - 2019-01-18 10:14:39 --> Severity: Notice --> Undefined index: store_url C:\xampp\htdocs\JollofCuisineWeb1\application\views\fashion_view\giftporter.php 165
ERROR - 2019-01-18 10:14:39 --> Severity: Notice --> Undefined index: store_url C:\xampp\htdocs\JollofCuisineWeb1\application\views\fashion_view\giftporter.php 170
ERROR - 2019-01-18 10:14:39 --> Severity: Notice --> Undefined index: store_url C:\xampp\htdocs\JollofCuisineWeb1\application\views\fashion_view\giftporter.php 183
ERROR - 2019-01-18 10:14:39 --> Severity: Notice --> Undefined index: price C:\xampp\htdocs\JollofCuisineWeb1\application\views\fashion_view\giftporter.php 220
ERROR - 2019-01-18 10:14:39 --> Severity: Notice --> Undefined index: store_url C:\xampp\htdocs\JollofCuisineWeb1\application\views\fashion_view\giftporter.php 238
ERROR - 2019-01-18 10:14:39 --> Severity: Notice --> Undefined index: storename C:\xampp\htdocs\JollofCuisineWeb1\application\views\fashion_view\giftporter.php 241
ERROR - 2019-01-18 10:14:39 --> Severity: Notice --> Undefined index: storename C:\xampp\htdocs\JollofCuisineWeb1\application\views\fashion_view\giftporter.php 251
ERROR - 2019-01-18 10:14:39 --> Severity: Notice --> Undefined index: store_url C:\xampp\htdocs\JollofCuisineWeb1\application\views\fashion_view\giftporter.php 251
ERROR - 2019-01-18 10:14:39 --> Severity: Notice --> Undefined index: store_url C:\xampp\htdocs\JollofCuisineWeb1\application\views\fashion_view\giftporter.php 68
ERROR - 2019-01-18 10:14:39 --> Severity: Notice --> Undefined index: store_url C:\xampp\htdocs\JollofCuisineWeb1\application\views\fashion_view\giftporter.php 85
ERROR - 2019-01-18 10:14:39 --> Severity: Notice --> Undefined index: store_url C:\xampp\htdocs\JollofCuisineWeb1\application\views\fashion_view\giftporter.php 112
ERROR - 2019-01-18 10:14:39 --> Severity: Notice --> Undefined index: price C:\xampp\htdocs\JollofCuisineWeb1\application\views\fashion_view\giftporter.php 149
ERROR - 2019-01-18 10:14:39 --> Severity: Notice --> Undefined index: storename C:\xampp\htdocs\JollofCuisineWeb1\application\views\fashion_view\giftporter.php 153
ERROR - 2019-01-18 10:14:39 --> Severity: Notice --> Undefined index: storename C:\xampp\htdocs\JollofCuisineWeb1\application\views\fashion_view\giftporter.php 155
ERROR - 2019-01-18 10:14:39 --> Severity: Notice --> Undefined index: store_url C:\xampp\htdocs\JollofCuisineWeb1\application\views\fashion_view\giftporter.php 165
ERROR - 2019-01-18 10:14:39 --> Severity: Notice --> Undefined index: store_url C:\xampp\htdocs\JollofCuisineWeb1\application\views\fashion_view\giftporter.php 170
ERROR - 2019-01-18 10:14:39 --> Severity: Notice --> Undefined index: store_url C:\xampp\htdocs\JollofCuisineWeb1\application\views\fashion_view\giftporter.php 183
ERROR - 2019-01-18 10:14:39 --> Severity: Notice --> Undefined index: price C:\xampp\htdocs\JollofCuisineWeb1\application\views\fashion_view\giftporter.php 220
ERROR - 2019-01-18 10:14:39 --> Severity: Notice --> Undefined index: store_url C:\xampp\htdocs\JollofCuisineWeb1\application\views\fashion_view\giftporter.php 238
ERROR - 2019-01-18 10:14:39 --> Severity: Notice --> Undefined index: storename C:\xampp\htdocs\JollofCuisineWeb1\application\views\fashion_view\giftporter.php 241
ERROR - 2019-01-18 10:14:39 --> Severity: Notice --> Undefined index: storename C:\xampp\htdocs\JollofCuisineWeb1\application\views\fashion_view\giftporter.php 251
ERROR - 2019-01-18 10:14:39 --> Severity: Notice --> Undefined index: store_url C:\xampp\htdocs\JollofCuisineWeb1\application\views\fashion_view\giftporter.php 251
ERROR - 2019-01-18 10:18:33 --> Severity: Notice --> Undefined index: price C:\xampp\htdocs\JollofCuisineWeb1\application\views\fashion_view\giftporter.php 149
ERROR - 2019-01-18 10:18:33 --> Severity: Notice --> Undefined index: storename C:\xampp\htdocs\JollofCuisineWeb1\application\views\fashion_view\giftporter.php 153
ERROR - 2019-01-18 10:18:33 --> Severity: Notice --> Undefined index: storename C:\xampp\htdocs\JollofCuisineWeb1\application\views\fashion_view\giftporter.php 155
ERROR - 2019-01-18 10:18:33 --> Severity: Notice --> Undefined index: store_url C:\xampp\htdocs\JollofCuisineWeb1\application\views\fashion_view\giftporter.php 165
ERROR - 2019-01-18 10:18:33 --> Severity: Notice --> Undefined index: store_url C:\xampp\htdocs\JollofCuisineWeb1\application\views\fashion_view\giftporter.php 170
ERROR - 2019-01-18 10:18:33 --> Severity: Notice --> Undefined index: store_url C:\xampp\htdocs\JollofCuisineWeb1\application\views\fashion_view\giftporter.php 183
ERROR - 2019-01-18 10:18:33 --> Severity: Notice --> Undefined index: price C:\xampp\htdocs\JollofCuisineWeb1\application\views\fashion_view\giftporter.php 220
ERROR - 2019-01-18 10:18:33 --> Severity: Notice --> Undefined index: store_url C:\xampp\htdocs\JollofCuisineWeb1\application\views\fashion_view\giftporter.php 238
ERROR - 2019-01-18 10:18:33 --> Severity: Notice --> Undefined index: storename C:\xampp\htdocs\JollofCuisineWeb1\application\views\fashion_view\giftporter.php 241
ERROR - 2019-01-18 10:18:33 --> Severity: Notice --> Undefined index: storename C:\xampp\htdocs\JollofCuisineWeb1\application\views\fashion_view\giftporter.php 251
ERROR - 2019-01-18 10:18:33 --> Severity: Notice --> Undefined index: store_url C:\xampp\htdocs\JollofCuisineWeb1\application\views\fashion_view\giftporter.php 251
ERROR - 2019-01-18 10:18:33 --> Severity: Notice --> Undefined index: price C:\xampp\htdocs\JollofCuisineWeb1\application\views\fashion_view\giftporter.php 149
ERROR - 2019-01-18 10:18:33 --> Severity: Notice --> Undefined index: storename C:\xampp\htdocs\JollofCuisineWeb1\application\views\fashion_view\giftporter.php 153
ERROR - 2019-01-18 10:18:33 --> Severity: Notice --> Undefined index: storename C:\xampp\htdocs\JollofCuisineWeb1\application\views\fashion_view\giftporter.php 155
ERROR - 2019-01-18 10:18:33 --> Severity: Notice --> Undefined index: store_url C:\xampp\htdocs\JollofCuisineWeb1\application\views\fashion_view\giftporter.php 165
ERROR - 2019-01-18 10:18:33 --> Severity: Notice --> Undefined index: store_url C:\xampp\htdocs\JollofCuisineWeb1\application\views\fashion_view\giftporter.php 170
ERROR - 2019-01-18 10:18:33 --> Severity: Notice --> Undefined index: store_url C:\xampp\htdocs\JollofCuisineWeb1\application\views\fashion_view\giftporter.php 183
ERROR - 2019-01-18 10:18:33 --> Severity: Notice --> Undefined index: price C:\xampp\htdocs\JollofCuisineWeb1\application\views\fashion_view\giftporter.php 220
ERROR - 2019-01-18 10:18:33 --> Severity: Notice --> Undefined index: store_url C:\xampp\htdocs\JollofCuisineWeb1\application\views\fashion_view\giftporter.php 238
ERROR - 2019-01-18 10:18:33 --> Severity: Notice --> Undefined index: storename C:\xampp\htdocs\JollofCuisineWeb1\application\views\fashion_view\giftporter.php 241
ERROR - 2019-01-18 10:18:33 --> Severity: Notice --> Undefined index: storename C:\xampp\htdocs\JollofCuisineWeb1\application\views\fashion_view\giftporter.php 251
ERROR - 2019-01-18 10:18:33 --> Severity: Notice --> Undefined index: store_url C:\xampp\htdocs\JollofCuisineWeb1\application\views\fashion_view\giftporter.php 251
ERROR - 2019-01-18 10:20:59 --> Severity: Warning --> number_format() expects parameter 2 to be integer, string given C:\xampp\htdocs\JollofCuisineWeb1\application\views\fashion_view\giftporter.php 139
ERROR - 2019-01-18 10:20:59 --> Severity: Notice --> Undefined index: store_url C:\xampp\htdocs\JollofCuisineWeb1\application\views\fashion_view\giftporter.php 145
ERROR - 2019-01-18 10:20:59 --> Severity: Notice --> Undefined index: store_url C:\xampp\htdocs\JollofCuisineWeb1\application\views\fashion_view\giftporter.php 158
ERROR - 2019-01-18 10:20:59 --> Severity: Notice --> Undefined index: price C:\xampp\htdocs\JollofCuisineWeb1\application\views\fashion_view\giftporter.php 195
ERROR - 2019-01-18 10:20:59 --> Severity: Notice --> Undefined index: store_url C:\xampp\htdocs\JollofCuisineWeb1\application\views\fashion_view\giftporter.php 213
ERROR - 2019-01-18 10:20:59 --> Severity: Notice --> Undefined index: storename C:\xampp\htdocs\JollofCuisineWeb1\application\views\fashion_view\giftporter.php 216
ERROR - 2019-01-18 10:20:59 --> Severity: Notice --> Undefined index: storename C:\xampp\htdocs\JollofCuisineWeb1\application\views\fashion_view\giftporter.php 226
ERROR - 2019-01-18 10:20:59 --> Severity: Notice --> Undefined index: store_url C:\xampp\htdocs\JollofCuisineWeb1\application\views\fashion_view\giftporter.php 226
ERROR - 2019-01-18 10:20:59 --> Severity: Warning --> number_format() expects parameter 2 to be integer, string given C:\xampp\htdocs\JollofCuisineWeb1\application\views\fashion_view\giftporter.php 139
ERROR - 2019-01-18 10:20:59 --> Severity: Notice --> Undefined index: store_url C:\xampp\htdocs\JollofCuisineWeb1\application\views\fashion_view\giftporter.php 145
ERROR - 2019-01-18 10:20:59 --> Severity: Notice --> Undefined index: store_url C:\xampp\htdocs\JollofCuisineWeb1\application\views\fashion_view\giftporter.php 158
ERROR - 2019-01-18 10:20:59 --> Severity: Notice --> Undefined index: price C:\xampp\htdocs\JollofCuisineWeb1\application\views\fashion_view\giftporter.php 195
ERROR - 2019-01-18 10:20:59 --> Severity: Notice --> Undefined index: store_url C:\xampp\htdocs\JollofCuisineWeb1\application\views\fashion_view\giftporter.php 213
ERROR - 2019-01-18 10:20:59 --> Severity: Notice --> Undefined index: storename C:\xampp\htdocs\JollofCuisineWeb1\application\views\fashion_view\giftporter.php 216
ERROR - 2019-01-18 10:20:59 --> Severity: Notice --> Undefined index: storename C:\xampp\htdocs\JollofCuisineWeb1\application\views\fashion_view\giftporter.php 226
ERROR - 2019-01-18 10:20:59 --> Severity: Notice --> Undefined index: store_url C:\xampp\htdocs\JollofCuisineWeb1\application\views\fashion_view\giftporter.php 226
ERROR - 2019-01-18 10:21:14 --> Severity: Warning --> Wrong parameter count for number_format() C:\xampp\htdocs\JollofCuisineWeb1\application\views\fashion_view\giftporter.php 139
ERROR - 2019-01-18 10:21:14 --> Severity: Notice --> Undefined index: store_url C:\xampp\htdocs\JollofCuisineWeb1\application\views\fashion_view\giftporter.php 145
ERROR - 2019-01-18 10:21:14 --> Severity: Notice --> Undefined index: store_url C:\xampp\htdocs\JollofCuisineWeb1\application\views\fashion_view\giftporter.php 158
ERROR - 2019-01-18 10:21:14 --> Severity: Notice --> Undefined index: price C:\xampp\htdocs\JollofCuisineWeb1\application\views\fashion_view\giftporter.php 195
ERROR - 2019-01-18 10:21:14 --> Severity: Notice --> Undefined index: store_url C:\xampp\htdocs\JollofCuisineWeb1\application\views\fashion_view\giftporter.php 213
ERROR - 2019-01-18 10:21:14 --> Severity: Notice --> Undefined index: storename C:\xampp\htdocs\JollofCuisineWeb1\application\views\fashion_view\giftporter.php 216
ERROR - 2019-01-18 10:21:14 --> Severity: Notice --> Undefined index: storename C:\xampp\htdocs\JollofCuisineWeb1\application\views\fashion_view\giftporter.php 226
ERROR - 2019-01-18 10:21:14 --> Severity: Notice --> Undefined index: store_url C:\xampp\htdocs\JollofCuisineWeb1\application\views\fashion_view\giftporter.php 226
ERROR - 2019-01-18 10:21:14 --> Severity: Warning --> Wrong parameter count for number_format() C:\xampp\htdocs\JollofCuisineWeb1\application\views\fashion_view\giftporter.php 139
ERROR - 2019-01-18 10:21:14 --> Severity: Notice --> Undefined index: store_url C:\xampp\htdocs\JollofCuisineWeb1\application\views\fashion_view\giftporter.php 145
ERROR - 2019-01-18 10:21:14 --> Severity: Notice --> Undefined index: store_url C:\xampp\htdocs\JollofCuisineWeb1\application\views\fashion_view\giftporter.php 158
ERROR - 2019-01-18 10:21:14 --> Severity: Notice --> Undefined index: price C:\xampp\htdocs\JollofCuisineWeb1\application\views\fashion_view\giftporter.php 195
ERROR - 2019-01-18 10:21:14 --> Severity: Notice --> Undefined index: store_url C:\xampp\htdocs\JollofCuisineWeb1\application\views\fashion_view\giftporter.php 213
ERROR - 2019-01-18 10:21:14 --> Severity: Notice --> Undefined index: storename C:\xampp\htdocs\JollofCuisineWeb1\application\views\fashion_view\giftporter.php 216
ERROR - 2019-01-18 10:21:14 --> Severity: Notice --> Undefined index: storename C:\xampp\htdocs\JollofCuisineWeb1\application\views\fashion_view\giftporter.php 226
ERROR - 2019-01-18 10:21:14 --> Severity: Notice --> Undefined index: store_url C:\xampp\htdocs\JollofCuisineWeb1\application\views\fashion_view\giftporter.php 226
ERROR - 2019-01-18 10:21:23 --> Severity: Notice --> Undefined index: store_url C:\xampp\htdocs\JollofCuisineWeb1\application\views\fashion_view\giftporter.php 145
ERROR - 2019-01-18 10:21:23 --> Severity: Notice --> Undefined index: store_url C:\xampp\htdocs\JollofCuisineWeb1\application\views\fashion_view\giftporter.php 158
ERROR - 2019-01-18 10:21:23 --> Severity: Notice --> Undefined index: price C:\xampp\htdocs\JollofCuisineWeb1\application\views\fashion_view\giftporter.php 195
ERROR - 2019-01-18 10:21:23 --> Severity: Notice --> Undefined index: store_url C:\xampp\htdocs\JollofCuisineWeb1\application\views\fashion_view\giftporter.php 213
ERROR - 2019-01-18 10:21:23 --> Severity: Notice --> Undefined index: storename C:\xampp\htdocs\JollofCuisineWeb1\application\views\fashion_view\giftporter.php 216
ERROR - 2019-01-18 10:21:23 --> Severity: Notice --> Undefined index: storename C:\xampp\htdocs\JollofCuisineWeb1\application\views\fashion_view\giftporter.php 226
ERROR - 2019-01-18 10:21:23 --> Severity: Notice --> Undefined index: store_url C:\xampp\htdocs\JollofCuisineWeb1\application\views\fashion_view\giftporter.php 226
ERROR - 2019-01-18 10:21:23 --> Severity: Notice --> Undefined index: store_url C:\xampp\htdocs\JollofCuisineWeb1\application\views\fashion_view\giftporter.php 145
ERROR - 2019-01-18 10:21:23 --> Severity: Notice --> Undefined index: store_url C:\xampp\htdocs\JollofCuisineWeb1\application\views\fashion_view\giftporter.php 158
ERROR - 2019-01-18 10:21:23 --> Severity: Notice --> Undefined index: price C:\xampp\htdocs\JollofCuisineWeb1\application\views\fashion_view\giftporter.php 195
ERROR - 2019-01-18 10:21:23 --> Severity: Notice --> Undefined index: store_url C:\xampp\htdocs\JollofCuisineWeb1\application\views\fashion_view\giftporter.php 213
ERROR - 2019-01-18 10:21:23 --> Severity: Notice --> Undefined index: storename C:\xampp\htdocs\JollofCuisineWeb1\application\views\fashion_view\giftporter.php 216
ERROR - 2019-01-18 10:21:23 --> Severity: Notice --> Undefined index: storename C:\xampp\htdocs\JollofCuisineWeb1\application\views\fashion_view\giftporter.php 226
ERROR - 2019-01-18 10:21:23 --> Severity: Notice --> Undefined index: store_url C:\xampp\htdocs\JollofCuisineWeb1\application\views\fashion_view\giftporter.php 226
ERROR - 2019-01-18 10:21:40 --> Severity: Notice --> Undefined index: store_url C:\xampp\htdocs\JollofCuisineWeb1\application\views\fashion_view\giftporter.php 145
ERROR - 2019-01-18 10:21:40 --> Severity: Notice --> Undefined index: store_url C:\xampp\htdocs\JollofCuisineWeb1\application\views\fashion_view\giftporter.php 158
ERROR - 2019-01-18 10:21:40 --> Severity: Notice --> Undefined index: price C:\xampp\htdocs\JollofCuisineWeb1\application\views\fashion_view\giftporter.php 195
ERROR - 2019-01-18 10:21:40 --> Severity: Notice --> Undefined index: store_url C:\xampp\htdocs\JollofCuisineWeb1\application\views\fashion_view\giftporter.php 213
ERROR - 2019-01-18 10:21:40 --> Severity: Notice --> Undefined index: storename C:\xampp\htdocs\JollofCuisineWeb1\application\views\fashion_view\giftporter.php 216
ERROR - 2019-01-18 10:21:40 --> Severity: Notice --> Undefined index: storename C:\xampp\htdocs\JollofCuisineWeb1\application\views\fashion_view\giftporter.php 226
ERROR - 2019-01-18 10:21:40 --> Severity: Notice --> Undefined index: store_url C:\xampp\htdocs\JollofCuisineWeb1\application\views\fashion_view\giftporter.php 226
ERROR - 2019-01-18 10:21:40 --> Severity: Notice --> Undefined index: store_url C:\xampp\htdocs\JollofCuisineWeb1\application\views\fashion_view\giftporter.php 145
ERROR - 2019-01-18 10:21:40 --> Severity: Notice --> Undefined index: store_url C:\xampp\htdocs\JollofCuisineWeb1\application\views\fashion_view\giftporter.php 158
ERROR - 2019-01-18 10:21:40 --> Severity: Notice --> Undefined index: price C:\xampp\htdocs\JollofCuisineWeb1\application\views\fashion_view\giftporter.php 195
ERROR - 2019-01-18 10:21:40 --> Severity: Notice --> Undefined index: store_url C:\xampp\htdocs\JollofCuisineWeb1\application\views\fashion_view\giftporter.php 213
ERROR - 2019-01-18 10:21:40 --> Severity: Notice --> Undefined index: storename C:\xampp\htdocs\JollofCuisineWeb1\application\views\fashion_view\giftporter.php 216
ERROR - 2019-01-18 10:21:40 --> Severity: Notice --> Undefined index: storename C:\xampp\htdocs\JollofCuisineWeb1\application\views\fashion_view\giftporter.php 226
ERROR - 2019-01-18 10:21:40 --> Severity: Notice --> Undefined index: store_url C:\xampp\htdocs\JollofCuisineWeb1\application\views\fashion_view\giftporter.php 226
ERROR - 2019-01-18 10:23:03 --> Severity: Notice --> Undefined index: store_url C:\xampp\htdocs\JollofCuisineWeb1\application\views\fashion_view\giftporter.php 158
ERROR - 2019-01-18 10:23:03 --> Severity: Notice --> Undefined index: price C:\xampp\htdocs\JollofCuisineWeb1\application\views\fashion_view\giftporter.php 195
ERROR - 2019-01-18 10:23:03 --> Severity: Notice --> Undefined index: store_url C:\xampp\htdocs\JollofCuisineWeb1\application\views\fashion_view\giftporter.php 213
ERROR - 2019-01-18 10:23:03 --> Severity: Notice --> Undefined index: storename C:\xampp\htdocs\JollofCuisineWeb1\application\views\fashion_view\giftporter.php 216
ERROR - 2019-01-18 10:23:03 --> Severity: Notice --> Undefined index: storename C:\xampp\htdocs\JollofCuisineWeb1\application\views\fashion_view\giftporter.php 226
ERROR - 2019-01-18 10:23:03 --> Severity: Notice --> Undefined index: store_url C:\xampp\htdocs\JollofCuisineWeb1\application\views\fashion_view\giftporter.php 226
ERROR - 2019-01-18 10:23:03 --> Severity: Notice --> Undefined index: store_url C:\xampp\htdocs\JollofCuisineWeb1\application\views\fashion_view\giftporter.php 158
ERROR - 2019-01-18 10:23:03 --> Severity: Notice --> Undefined index: price C:\xampp\htdocs\JollofCuisineWeb1\application\views\fashion_view\giftporter.php 195
ERROR - 2019-01-18 10:23:03 --> Severity: Notice --> Undefined index: store_url C:\xampp\htdocs\JollofCuisineWeb1\application\views\fashion_view\giftporter.php 213
ERROR - 2019-01-18 10:23:03 --> Severity: Notice --> Undefined index: storename C:\xampp\htdocs\JollofCuisineWeb1\application\views\fashion_view\giftporter.php 216
ERROR - 2019-01-18 10:23:03 --> Severity: Notice --> Undefined index: storename C:\xampp\htdocs\JollofCuisineWeb1\application\views\fashion_view\giftporter.php 226
ERROR - 2019-01-18 10:23:03 --> Severity: Notice --> Undefined index: store_url C:\xampp\htdocs\JollofCuisineWeb1\application\views\fashion_view\giftporter.php 226
ERROR - 2019-01-18 10:59:00 --> Severity: Notice --> Undefined index: price C:\xampp\htdocs\JollofCuisineWeb1\application\views\fashion_view\giftporter.php 195
ERROR - 2019-01-18 10:59:00 --> Severity: Notice --> Undefined index: store_url C:\xampp\htdocs\JollofCuisineWeb1\application\views\fashion_view\giftporter.php 213
ERROR - 2019-01-18 10:59:00 --> Severity: Notice --> Undefined index: storename C:\xampp\htdocs\JollofCuisineWeb1\application\views\fashion_view\giftporter.php 216
ERROR - 2019-01-18 10:59:00 --> Severity: Notice --> Undefined index: storename C:\xampp\htdocs\JollofCuisineWeb1\application\views\fashion_view\giftporter.php 226
ERROR - 2019-01-18 10:59:00 --> Severity: Notice --> Undefined index: store_url C:\xampp\htdocs\JollofCuisineWeb1\application\views\fashion_view\giftporter.php 226
ERROR - 2019-01-18 10:59:00 --> Severity: Notice --> Undefined index: price C:\xampp\htdocs\JollofCuisineWeb1\application\views\fashion_view\giftporter.php 195
ERROR - 2019-01-18 10:59:00 --> Severity: Notice --> Undefined index: store_url C:\xampp\htdocs\JollofCuisineWeb1\application\views\fashion_view\giftporter.php 213
ERROR - 2019-01-18 10:59:00 --> Severity: Notice --> Undefined index: storename C:\xampp\htdocs\JollofCuisineWeb1\application\views\fashion_view\giftporter.php 216
ERROR - 2019-01-18 10:59:00 --> Severity: Notice --> Undefined index: storename C:\xampp\htdocs\JollofCuisineWeb1\application\views\fashion_view\giftporter.php 226
ERROR - 2019-01-18 10:59:00 --> Severity: Notice --> Undefined index: store_url C:\xampp\htdocs\JollofCuisineWeb1\application\views\fashion_view\giftporter.php 226
ERROR - 2019-01-18 10:59:49 --> Severity: Notice --> Undefined index: price C:\xampp\htdocs\JollofCuisineWeb1\application\views\fashion_view\giftporter.php 195
ERROR - 2019-01-18 10:59:49 --> Severity: Notice --> Undefined index: price C:\xampp\htdocs\JollofCuisineWeb1\application\views\fashion_view\giftporter.php 195
ERROR - 2019-01-18 11:03:15 --> 404 Page Not Found: Assets/assets
ERROR - 2019-01-18 11:04:18 --> 404 Page Not Found: Assets/assets
ERROR - 2019-01-18 11:04:21 --> 404 Page Not Found: Assets/assets
ERROR - 2019-01-18 11:04:29 --> 404 Page Not Found: Assets/assets
ERROR - 2019-01-18 11:04:30 --> 404 Page Not Found: Assets/assets
ERROR - 2019-01-18 11:04:48 --> 404 Page Not Found: Assets/assets
ERROR - 2019-01-18 11:05:15 --> 404 Page Not Found: Assets/assets
ERROR - 2019-01-18 11:06:26 --> Severity: Notice --> Undefined variable: store C:\xampp\htdocs\JollofCuisineWeb1\application\controllers\Products.php 593
ERROR - 2019-01-18 11:06:26 --> Severity: Notice --> Undefined variable: store C:\xampp\htdocs\JollofCuisineWeb1\application\controllers\Products.php 594
ERROR - 2019-01-18 11:06:26 --> Severity: Notice --> Undefined variable: store C:\xampp\htdocs\JollofCuisineWeb1\application\controllers\Products.php 593
ERROR - 2019-01-18 11:06:26 --> Severity: Notice --> Undefined variable: store C:\xampp\htdocs\JollofCuisineWeb1\application\controllers\Products.php 594
ERROR - 2019-01-18 11:06:26 --> 404 Page Not Found: Fashion/assets
ERROR - 2019-01-18 11:06:26 --> 404 Page Not Found: Fashion/assets
ERROR - 2019-01-18 11:06:26 --> 404 Page Not Found: Fashion/assets
ERROR - 2019-01-18 11:06:26 --> 404 Page Not Found: Fashion/assets
ERROR - 2019-01-18 11:06:26 --> 404 Page Not Found: Fashion/assets
ERROR - 2019-01-18 11:06:26 --> 404 Page Not Found: Fashion/assets
ERROR - 2019-01-18 11:06:26 --> 404 Page Not Found: Fashion/assets
ERROR - 2019-01-18 11:06:27 --> 404 Page Not Found: Fashion/assets
ERROR - 2019-01-18 11:06:27 --> 404 Page Not Found: Fashion/assets
ERROR - 2019-01-18 11:06:27 --> 404 Page Not Found: Fashion/assets
ERROR - 2019-01-18 11:06:31 --> Severity: Notice --> Undefined variable: store C:\xampp\htdocs\JollofCuisineWeb1\application\controllers\Products.php 593
ERROR - 2019-01-18 11:06:31 --> Severity: Notice --> Undefined variable: store C:\xampp\htdocs\JollofCuisineWeb1\application\controllers\Products.php 594
ERROR - 2019-01-18 11:06:32 --> Severity: Notice --> Undefined variable: store C:\xampp\htdocs\JollofCuisineWeb1\application\controllers\Products.php 576
ERROR - 2019-01-18 11:06:32 --> Severity: Notice --> Undefined variable: store C:\xampp\htdocs\JollofCuisineWeb1\application\controllers\Products.php 576
ERROR - 2019-01-18 11:06:32 --> Severity: Notice --> Undefined variable: store C:\xampp\htdocs\JollofCuisineWeb1\application\controllers\Products.php 576
ERROR - 2019-01-18 11:06:32 --> Severity: Notice --> Undefined variable: store C:\xampp\htdocs\JollofCuisineWeb1\application\controllers\Products.php 576
ERROR - 2019-01-18 11:06:32 --> Severity: Notice --> Undefined variable: store C:\xampp\htdocs\JollofCuisineWeb1\application\controllers\Products.php 576
ERROR - 2019-01-18 11:06:32 --> Severity: Notice --> Undefined variable: store C:\xampp\htdocs\JollofCuisineWeb1\application\controllers\Products.php 576
ERROR - 2019-01-18 11:06:34 --> Severity: Notice --> Undefined variable: store C:\xampp\htdocs\JollofCuisineWeb1\application\controllers\Products.php 576
ERROR - 2019-01-18 11:06:36 --> Severity: Notice --> Undefined variable: store C:\xampp\htdocs\JollofCuisineWeb1\application\controllers\Products.php 593
ERROR - 2019-01-18 11:06:36 --> Severity: Notice --> Undefined variable: store C:\xampp\htdocs\JollofCuisineWeb1\application\controllers\Products.php 594
ERROR - 2019-01-18 11:06:37 --> Severity: Notice --> Undefined variable: store C:\xampp\htdocs\JollofCuisineWeb1\application\controllers\Products.php 576
ERROR - 2019-01-18 11:06:37 --> Severity: Notice --> Undefined variable: store C:\xampp\htdocs\JollofCuisineWeb1\application\controllers\Products.php 576
ERROR - 2019-01-18 11:06:37 --> Severity: Notice --> Undefined variable: store C:\xampp\htdocs\JollofCuisineWeb1\application\controllers\Products.php 576
ERROR - 2019-01-18 11:06:37 --> Severity: Notice --> Undefined variable: store C:\xampp\htdocs\JollofCuisineWeb1\application\controllers\Products.php 576
ERROR - 2019-01-18 11:06:37 --> Severity: Notice --> Undefined variable: store C:\xampp\htdocs\JollofCuisineWeb1\application\controllers\Products.php 576
ERROR - 2019-01-18 11:06:37 --> Severity: Notice --> Undefined variable: store C:\xampp\htdocs\JollofCuisineWeb1\application\controllers\Products.php 576
ERROR - 2019-01-18 11:06:39 --> Severity: Notice --> Undefined variable: store C:\xampp\htdocs\JollofCuisineWeb1\application\controllers\Products.php 576
ERROR - 2019-01-18 11:16:25 --> Severity: Notice --> Undefined variable: store C:\xampp\htdocs\JollofCuisineWeb1\application\controllers\Products.php 593
ERROR - 2019-01-18 11:16:25 --> Severity: Notice --> Undefined variable: store C:\xampp\htdocs\JollofCuisineWeb1\application\controllers\Products.php 594
ERROR - 2019-01-18 11:16:26 --> Severity: Notice --> Undefined variable: store C:\xampp\htdocs\JollofCuisineWeb1\application\controllers\Products.php 576
ERROR - 2019-01-18 11:16:26 --> Severity: Notice --> Undefined variable: store C:\xampp\htdocs\JollofCuisineWeb1\application\controllers\Products.php 576
ERROR - 2019-01-18 11:16:26 --> Severity: Notice --> Undefined variable: store C:\xampp\htdocs\JollofCuisineWeb1\application\controllers\Products.php 576
ERROR - 2019-01-18 11:16:26 --> Severity: Notice --> Undefined variable: store C:\xampp\htdocs\JollofCuisineWeb1\application\controllers\Products.php 576
ERROR - 2019-01-18 11:16:26 --> Severity: Notice --> Undefined variable: store C:\xampp\htdocs\JollofCuisineWeb1\application\controllers\Products.php 576
ERROR - 2019-01-18 11:16:26 --> Severity: Notice --> Undefined variable: store C:\xampp\htdocs\JollofCuisineWeb1\application\controllers\Products.php 576
ERROR - 2019-01-18 11:16:27 --> Severity: Notice --> Undefined variable: store C:\xampp\htdocs\JollofCuisineWeb1\application\controllers\Products.php 576
ERROR - 2019-01-18 11:52:50 --> Severity: Notice --> Undefined variable: store_url C:\xampp\htdocs\JollofCuisineWeb1\application\views\fashion_view\product_details.php 277
ERROR - 2019-01-18 11:52:50 --> Severity: Notice --> Undefined variable: store_url C:\xampp\htdocs\JollofCuisineWeb1\application\views\fashion_view\product_details.php 409
ERROR - 2019-01-18 11:54:12 --> Severity: Notice --> Undefined variable: store_url C:\xampp\htdocs\JollofCuisineWeb1\application\views\fashion_view\giftporter_details.php 277
ERROR - 2019-01-18 11:54:12 --> Severity: Notice --> Undefined variable: store_url C:\xampp\htdocs\JollofCuisineWeb1\application\views\fashion_view\giftporter_details.php 409
ERROR - 2019-01-18 11:55:18 --> Severity: Notice --> Undefined variable: store_url C:\xampp\htdocs\JollofCuisineWeb1\application\views\fashion_view\giftporter_details.php 409
ERROR - 2019-01-18 12:22:03 --> Severity: Notice --> Undefined index: storename C:\xampp\htdocs\JollofCuisineWeb1\application\views\fashion_view\product_details.php 277
ERROR - 2019-01-18 12:22:03 --> Severity: Notice --> Undefined index: storename C:\xampp\htdocs\JollofCuisineWeb1\application\views\fashion_view\product_details.php 409
ERROR - 2019-01-18 12:22:03 --> Severity: Notice --> Undefined index: merchantid C:\xampp\htdocs\JollofCuisineWeb1\application\views\fashion_view\product_details.php 512
ERROR - 2019-01-18 12:22:09 --> Severity: Notice --> Undefined index: storename C:\xampp\htdocs\JollofCuisineWeb1\application\views\fashion_view\product_details.php 277
ERROR - 2019-01-18 12:22:09 --> Severity: Notice --> Undefined index: storename C:\xampp\htdocs\JollofCuisineWeb1\application\views\fashion_view\product_details.php 409
ERROR - 2019-01-18 12:22:09 --> Severity: Notice --> Undefined index: merchantid C:\xampp\htdocs\JollofCuisineWeb1\application\views\fashion_view\product_details.php 512
ERROR - 2019-01-18 12:23:45 --> Severity: Notice --> Undefined index: storename C:\xampp\htdocs\JollofCuisineWeb1\application\views\fashion_view\product_details.php 277
ERROR - 2019-01-18 12:23:45 --> Severity: Notice --> Undefined index: storename C:\xampp\htdocs\JollofCuisineWeb1\application\views\fashion_view\product_details.php 409
ERROR - 2019-01-18 12:23:45 --> Severity: Notice --> Undefined index: merchantid C:\xampp\htdocs\JollofCuisineWeb1\application\views\fashion_view\product_details.php 512
ERROR - 2019-01-18 12:23:45 --> Severity: Notice --> Undefined index: merchantid C:\xampp\htdocs\JollofCuisineWeb1\application\views\fashion_view\product_details.php 517
ERROR - 2019-01-18 12:24:54 --> Severity: Notice --> Undefined index: storename C:\xampp\htdocs\JollofCuisineWeb1\application\views\fashion_view\product_details.php 277
ERROR - 2019-01-18 12:24:54 --> Severity: Notice --> Undefined index: storename C:\xampp\htdocs\JollofCuisineWeb1\application\views\fashion_view\product_details.php 409
ERROR - 2019-01-18 12:24:54 --> Severity: Notice --> Undefined index: merchantid C:\xampp\htdocs\JollofCuisineWeb1\application\views\fashion_view\product_details.php 512
ERROR - 2019-01-18 12:24:58 --> Severity: Notice --> Undefined index: storename C:\xampp\htdocs\JollofCuisineWeb1\application\views\fashion_view\product_details.php 277
ERROR - 2019-01-18 12:24:58 --> Severity: Notice --> Undefined index: storename C:\xampp\htdocs\JollofCuisineWeb1\application\views\fashion_view\product_details.php 409
ERROR - 2019-01-18 12:24:58 --> Severity: Notice --> Undefined index: merchantid C:\xampp\htdocs\JollofCuisineWeb1\application\views\fashion_view\product_details.php 512
