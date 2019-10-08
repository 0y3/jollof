<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

ERROR - 2019-10-01 00:00:51 --> Severity: Notice --> Array to string conversion C:\xampp\htdocs\Jollof\application\controllers\jollofadmin\Lifestyle.php 52
ERROR - 2019-10-01 00:00:51 --> Severity: Notice --> Undefined variable: Array C:\xampp\htdocs\Jollof\application\controllers\jollofadmin\Lifestyle.php 52
ERROR - 2019-10-01 00:01:08 --> Severity: Notice --> Undefined index: moviedatebymclessnow C:\xampp\htdocs\Jollof\application\controllers\jollofadmin\Lifestyle.php 52
ERROR - 2019-10-01 00:13:57 --> Query error: Unknown column 'movie_and_cinema.isdeletedd' in 'where clause' - Invalid query: SELECT `movie_and_cinema`.*, `movie`.`slug` as `movieslug`, `movie`.`name` as `moviename`, `movie`.`triller_youtubeurl`, `movie`.`summary`, `movie`.`genre`, `movie`.`age_restriction`, `movie`.`duration`, `movie`.`director`, `movie`.`starring`, `movie`.`image`, `movie`.`number_of_views`, `movie_cinema`.`code` as `cinemacode`, `movie_cinema`.`name` as `cinemaname`, `movie_cinema`.`slug` as `cinemaslug`, `movie_cinema`.`address`, `state_cities`.`cityname`, `states`.`statename`
FROM `movie_and_cinema`
LEFT JOIN `movie` ON `movie`.`id` = `movie_and_cinema`.`movieid`
LEFT JOIN `movie_cinema` ON `movie_cinema`.`id` = `movie_and_cinema`.`cinemaid`
LEFT JOIN `states` ON `movie_cinema`.`stateid` = `states`.`id`
LEFT JOIN `state_cities` ON `movie_cinema`.`cityid` = `state_cities`.`id`
WHERE `movie_and_cinema`.`moviedate` < '2019-10-01'
AND `movie_and_cinema`.`isdeletedd` =0
AND `movie`.`isdeleted` =0
GROUP BY `movie`.`id`
ORDER BY `movie_and_cinema`.`moviedate` ASC
 LIMIT 25
ERROR - 2019-10-01 00:41:29 --> Severity: Notice --> Undefined variable: limit_start C:\xampp\htdocs\Jollof\application\models\Movie.php 284
ERROR - 2019-10-01 00:41:29 --> Query error: Unknown column 'movie.isdeleted' in 'where clause' - Invalid query: SELECT `movie_cinema`.*, `movie_and_cinema`.`id` as `movie_and_cinema_id`, `movie_and_cinema`.`movieid` as `movie_and_cinema_movieid`, `movie_and_cinema`.`moviedate`, `movie_and_cinema`.`movietime`, `movie_and_cinema`.`billadult`, `movie_and_cinema`.`billstudent`, `movie_and_cinema`.`billchildren`, `movie_and_cinema`.`sold`, `state_cities`.`cityname`, `states`.`statename`
FROM `movie_and_cinema`
LEFT JOIN `movie_cinema` ON `movie_cinema`.`id` = `movie_and_cinema`.`cinemaid`
LEFT JOIN `states` ON `movie_cinema`.`stateid` = `states`.`id`
LEFT JOIN `state_cities` ON `movie_cinema`.`cityid` = `state_cities`.`id`
WHERE `movie_and_cinema`.`movieid` = '1'
AND `movie_and_cinema`.`isdeleted` =0
AND `movie`.`isdeleted` =0
GROUP BY `movie_cinema`.`id`
ORDER BY `movie_and_cinema`.`moviedate` ASC, `movie_and_cinema`.`movietime` ASC
 LIMIT 25
ERROR - 2019-10-01 00:41:42 --> Query error: Unknown column 'movie.isdeleted' in 'where clause' - Invalid query: SELECT `movie_cinema`.*, `movie_and_cinema`.`id` as `movie_and_cinema_id`, `movie_and_cinema`.`movieid` as `movie_and_cinema_movieid`, `movie_and_cinema`.`moviedate`, `movie_and_cinema`.`movietime`, `movie_and_cinema`.`billadult`, `movie_and_cinema`.`billstudent`, `movie_and_cinema`.`billchildren`, `movie_and_cinema`.`sold`, `state_cities`.`cityname`, `states`.`statename`
FROM `movie_and_cinema`
LEFT JOIN `movie_cinema` ON `movie_cinema`.`id` = `movie_and_cinema`.`cinemaid`
LEFT JOIN `states` ON `movie_cinema`.`stateid` = `states`.`id`
LEFT JOIN `state_cities` ON `movie_cinema`.`cityid` = `state_cities`.`id`
WHERE `movie_and_cinema`.`movieid` = '1'
AND `movie_and_cinema`.`isdeleted` =0
AND `movie`.`isdeleted` =0
GROUP BY `movie_cinema`.`id`
ORDER BY `movie_and_cinema`.`moviedate` ASC, `movie_and_cinema`.`movietime` ASC
ERROR - 2019-10-01 00:42:13 --> Query error: Unknown column 'movie.isdeleted' in 'where clause' - Invalid query: SELECT `movie_cinema`.*, `movie_and_cinema`.`id` as `movie_and_cinema_id`, `movie_and_cinema`.`movieid` as `movie_and_cinema_movieid`, `movie_and_cinema`.`moviedate`, `movie_and_cinema`.`movietime`, `movie_and_cinema`.`billadult`, `movie_and_cinema`.`billstudent`, `movie_and_cinema`.`billchildren`, `movie_and_cinema`.`sold`, `state_cities`.`cityname`, `states`.`statename`
FROM `movie_and_cinema`
LEFT JOIN `movie_cinema` ON `movie_cinema`.`id` = `movie_and_cinema`.`cinemaid`
LEFT JOIN `states` ON `movie_cinema`.`stateid` = `states`.`id`
LEFT JOIN `state_cities` ON `movie_cinema`.`cityid` = `state_cities`.`id`
WHERE `movie_and_cinema`.`movieid` = '1'
AND `movie_and_cinema`.`isdeleted` =0
AND `movie`.`isdeleted` =0
GROUP BY `movie_cinema`.`id`
ORDER BY `movie_and_cinema`.`moviedate` ASC, `movie_and_cinema`.`movietime` ASC
ERROR - 2019-10-01 00:51:32 --> Severity: Notice --> Undefined variable: limit_start C:\xampp\htdocs\Jollof\application\models\Movie.php 284
ERROR - 2019-10-01 00:51:32 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near '2019-10-01'
AND `movie_and_cinema`.`movieid` = '1'' at line 4 - Invalid query: SELECT COUNT(*) AS `numrows`
FROM `movie_cinema`
WHERE `movie_and_cinema`.`isdeleted` =0
AND 'movie_and_cinema.moviedate >= '2019-10-01'
AND `movie_and_cinema`.`movieid` = '1'
ERROR - 2019-10-01 00:51:50 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near '2019-10-01'
AND `movie_and_cinema`.`movieid` = '1'' at line 4 - Invalid query: SELECT COUNT(*) AS `numrows`
FROM `movie_cinema`
WHERE `movie_and_cinema`.`isdeleted` =0
AND 'movie_and_cinema.moviedate >= '2019-10-01'
AND `movie_and_cinema`.`movieid` = '1'
ERROR - 2019-10-01 00:52:08 --> Query error: Unknown column 'movie_and_cinema.isdeleted' in 'where clause' - Invalid query: SELECT COUNT(*) AS `numrows`
FROM `movie_cinema`
WHERE `movie_and_cinema`.`isdeleted` =0
AND `movie_and_cinema`.`moviedate` >= '2019-10-01'
AND `movie_and_cinema`.`movieid` = '1'
ERROR - 2019-10-01 00:59:32 --> Severity: error --> Exception: syntax error, unexpected ';', expecting ',' or ')' C:\xampp\htdocs\Jollof\application\models\Movie.php 257
ERROR - 2019-10-01 01:02:22 --> Query error: Unknown column 'showingincinemas' in 'where clause' - Invalid query: SELECT `movie`.*
FROM `movie`
LEFT JOIN `movie_and_cinema` ON `movie`.`id` = `movie_and_cinema`.`movieid`
WHERE `movie_and_cinema`.`moviedate` < '2019-10-01'
AND `movie_and_cinema`.`isdeleted` =0
AND `movie`.`isdeleted` =0
AND `showingincinemas` !=0
GROUP BY `movie`.`id`
ORDER BY `movie_and_cinema`.`moviedate` ASC
 LIMIT 25
ERROR - 2019-10-01 01:05:48 --> Query error: Unknown column 'movie_cinema.moviedate' in 'group statement' - Invalid query: SELECT COUNT(*) AS `numrows`
FROM (
SELECT *
FROM `movie_and_cinema`
WHERE `movie_and_cinema`.`movieid` = '1'
AND `movie_and_cinema`.`moviedate` >= '2019-10-01'
AND `movie_and_cinema`.`isdeleted` =0
GROUP BY `movie_cinema`.`moviedate`
) CI_count_all_results
ERROR - 2019-10-01 01:28:10 --> 404 Page Not Found: jollofadmin/Lifestyle/events
ERROR - 2019-10-01 01:43:47 --> Query error: Unknown column 'event.eventexpdatetim3e' in 'where clause' - Invalid query: SELECT COUNT(*) AS `numrows`
FROM `event`
WHERE `event`.`eventexpdatetim3e` >= '2019-10-01'
AND `event`.`isdeleted` =0
ERROR - 2019-10-01 01:51:01 --> Query error: Unknown column 'event.isdeleted' in 'where clause' - Invalid query: SELECT `event_date`.*
FROM `event_date`
WHERE `event_date`.`eventid` = '1'
AND `event`.`isdeleted` =0
ORDER BY `event_date`.`eventdate` DESC
ERROR - 2019-10-01 02:05:19 --> 404 Page Not Found: Assets/uploads
ERROR - 2019-10-01 11:01:32 --> 404 Page Not Found: Assets/admin
ERROR - 2019-10-01 11:02:03 --> 404 Page Not Found: Assets/admin
ERROR - 2019-10-01 11:02:04 --> 404 Page Not Found: Img/favicon.png
ERROR - 2019-10-01 11:02:11 --> Severity: Warning --> Invalid argument supplied for foreach() C:\xampp\htdocs\Jollof\application\views\cuisine_admin\layout.php 487
ERROR - 2019-10-01 11:02:40 --> 404 Page Not Found: cuisineadmin/Undefined/index
ERROR - 2019-10-01 11:02:44 --> 404 Page Not Found: cuisineadmin/Products/undefined
ERROR - 2019-10-01 11:02:51 --> 404 Page Not Found: Assets_v2/assets
ERROR - 2019-10-01 11:02:51 --> 404 Page Not Found: Assets_v2/assets
ERROR - 2019-10-01 11:02:52 --> 404 Page Not Found: Assets/css
ERROR - 2019-10-01 11:03:50 --> 404 Page Not Found: Assets_v2/assets
ERROR - 2019-10-01 11:03:50 --> 404 Page Not Found: Assets_v2/assets
ERROR - 2019-10-01 11:03:50 --> 404 Page Not Found: Assets/css
ERROR - 2019-10-01 11:04:34 --> 404 Page Not Found: cuisineadmin/Undefined/index
ERROR - 2019-10-01 11:04:38 --> 404 Page Not Found: Assets_v2/assets
ERROR - 2019-10-01 11:04:38 --> 404 Page Not Found: Assets_v2/assets
ERROR - 2019-10-01 11:04:38 --> 404 Page Not Found: Assets/css
ERROR - 2019-10-01 11:04:59 --> 404 Page Not Found: Assets_v2/assets
ERROR - 2019-10-01 11:04:59 --> 404 Page Not Found: Assets_v2/assets
ERROR - 2019-10-01 11:04:59 --> 404 Page Not Found: Assets/css
ERROR - 2019-10-01 11:05:12 --> 404 Page Not Found: cuisineadmin/Products/undefined
ERROR - 2019-10-01 11:05:12 --> 404 Page Not Found: Assets_v2/assets
ERROR - 2019-10-01 11:05:12 --> 404 Page Not Found: Assets_v2/assets
ERROR - 2019-10-01 11:05:12 --> 404 Page Not Found: Assets/css
ERROR - 2019-10-01 11:05:12 --> 404 Page Not Found: Assets_v2/assets
ERROR - 2019-10-01 11:08:05 --> 404 Page Not Found: Assets_v2/assets
ERROR - 2019-10-01 11:08:05 --> 404 Page Not Found: Assets_v2/assets
ERROR - 2019-10-01 11:08:05 --> 404 Page Not Found: Assets/css
ERROR - 2019-10-01 11:09:52 --> Severity: error --> Exception: Cannot use object of type stdClass as array C:\xampp\htdocs\Jollof\application\views\cuisine_admin\productnew_1.php 207
ERROR - 2019-10-01 11:10:16 --> Severity: error --> Exception: Cannot use object of type stdClass as array C:\xampp\htdocs\Jollof\application\views\cuisine_admin\productnew.php 207
ERROR - 2019-10-01 11:10:33 --> 404 Page Not Found: cuisineadmin/Products/undefined
ERROR - 2019-10-01 11:10:33 --> 404 Page Not Found: Assets_v2/assets
ERROR - 2019-10-01 11:10:33 --> 404 Page Not Found: Assets_v2/assets
ERROR - 2019-10-01 11:10:33 --> 404 Page Not Found: Assets/css
ERROR - 2019-10-01 11:10:33 --> 404 Page Not Found: Assets_v2/assets
ERROR - 2019-10-01 11:14:17 --> Severity: Warning --> file_get_contents(): php_network_getaddresses: getaddrinfo failed: No such host is known.  C:\xampp\htdocs\Jollof\application\helpers\paystack_curl_helper.php 369
ERROR - 2019-10-01 11:14:17 --> Severity: Warning --> file_get_contents(https://api.paystack.co/bank): failed to open stream: php_network_getaddresses: getaddrinfo failed: No such host is known.  C:\xampp\htdocs\Jollof\application\helpers\paystack_curl_helper.php 369
ERROR - 2019-10-01 11:14:37 --> 404 Page Not Found: Assets_v2/assets
ERROR - 2019-10-01 11:14:37 --> 404 Page Not Found: Assets_v2/assets
ERROR - 2019-10-01 11:14:37 --> 404 Page Not Found: Assets/css
ERROR - 2019-10-01 11:16:32 --> Severity: Warning --> file_get_contents(): php_network_getaddresses: getaddrinfo failed: No such host is known.  C:\xampp\htdocs\Jollof\application\helpers\paystack_curl_helper.php 369
ERROR - 2019-10-01 11:16:32 --> Severity: Warning --> file_get_contents(https://api.paystack.co/bank): failed to open stream: php_network_getaddresses: getaddrinfo failed: No such host is known.  C:\xampp\htdocs\Jollof\application\helpers\paystack_curl_helper.php 369
ERROR - 2019-10-01 11:16:34 --> 404 Page Not Found: Assets_v2/assets
ERROR - 2019-10-01 11:16:34 --> 404 Page Not Found: Assets_v2/assets
ERROR - 2019-10-01 11:16:35 --> 404 Page Not Found: Assets/css
ERROR - 2019-10-01 11:24:45 --> Severity: Warning --> file_get_contents(): php_network_getaddresses: getaddrinfo failed: No such host is known.  C:\xampp\htdocs\Jollof\application\helpers\paystack_curl_helper.php 369
ERROR - 2019-10-01 11:24:45 --> Severity: Warning --> file_get_contents(https://api.paystack.co/bank): failed to open stream: php_network_getaddresses: getaddrinfo failed: No such host is known.  C:\xampp\htdocs\Jollof\application\helpers\paystack_curl_helper.php 369
ERROR - 2019-10-01 11:24:48 --> 404 Page Not Found: Assets_v2/assets
ERROR - 2019-10-01 11:24:48 --> 404 Page Not Found: Assets_v2/assets
ERROR - 2019-10-01 11:24:48 --> 404 Page Not Found: Assets/css
ERROR - 2019-10-01 12:12:23 --> 404 Page Not Found: Assets/js
ERROR - 2019-10-01 12:12:23 --> 404 Page Not Found: Assets/js
ERROR - 2019-10-01 12:12:24 --> 404 Page Not Found: Assets/css
ERROR - 2019-10-01 12:52:38 --> 404 Page Not Found: Assets/css
ERROR - 2019-10-01 12:52:39 --> 404 Page Not Found: Assets/js
ERROR - 2019-10-01 12:52:40 --> 404 Page Not Found: Assets/js
ERROR - 2019-10-01 13:43:07 --> 404 Page Not Found: cuisineadmin/Undefined/index
ERROR - 2019-10-01 13:43:14 --> 404 Page Not Found: Assets/admin
ERROR - 2019-10-01 13:43:18 --> 404 Page Not Found: Assets/admin
ERROR - 2019-10-01 13:43:37 --> 404 Page Not Found: fashionadmin/Products/undefined
