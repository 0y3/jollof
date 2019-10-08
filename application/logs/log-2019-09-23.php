<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

ERROR - 2019-09-23 21:55:13 --> Severity: error --> Exception: Call to undefined method Event::getAllByMovieCinema() C:\xampp\htdocs\Jollof\application\controllers\Lifestyle.php 219
ERROR - 2019-09-23 22:05:48 --> Severity: error --> Exception: Call to undefined method CI_DB_mysqli_driver::groupby() C:\xampp\htdocs\Jollof\application\models\Movie.php 107
ERROR - 2019-09-23 22:09:12 --> Query error: Duplicate column name 'id' - Invalid query: SELECT COUNT(*) AS `numrows`
FROM (
SELECT *
FROM `movie_and_cinema`
LEFT JOIN `movie` ON `movie`.`id` = `movie_and_cinema`.`movieid`
WHERE `movie_and_cinema`.`moviedate` >= '2019-09-23'
AND `movie_and_cinema`.`isdeleted` =0
AND `movie_and_cinema`.`status` = 1
AND `movie`.`isdeleted` =0
AND `movie`.`status` = 1
GROUP BY `movie`.`id`
) CI_count_all_results
ERROR - 2019-09-23 22:11:50 --> Query error: Table 'jollofdb1.categries_events' doesn't exist - Invalid query: SELECT `event_categries`.*, `categries_events`.`slug`, `categries_events`.`categoryname`
FROM `event_categries`
LEFT JOIN `categries_events` ON `event_categries`.`cate_eventsid` = `categries_events`.`id`
WHERE `event_categries`.`eventid` = '1'
AND `event_categries`.`isdeleted` =0
AND `event_categries`.`status` = 1
ORDER BY `event_categries`.`createdat` DESC
ERROR - 2019-09-23 22:16:16 --> Severity: Warning --> include_once(lifestyle/lifestyle_movie.php): failed to open stream: No such file or directory C:\xampp\htdocs\Jollof\application\views\mainpage_view\layout.php 113
ERROR - 2019-09-23 22:16:16 --> Severity: Warning --> include_once(): Failed opening 'lifestyle/lifestyle_movie.php' for inclusion (include_path='C:\xampp\php\PEAR') C:\xampp\htdocs\Jollof\application\views\mainpage_view\layout.php 113
ERROR - 2019-09-23 22:20:55 --> 404 Page Not Found: Assets/js
ERROR - 2019-09-23 22:20:55 --> 404 Page Not Found: Assets/js
ERROR - 2019-09-23 22:20:55 --> 404 Page Not Found: Assets/css
ERROR - 2019-09-23 22:22:09 --> 404 Page Not Found: Assets/css
ERROR - 2019-09-23 22:22:09 --> 404 Page Not Found: Assets/js
ERROR - 2019-09-23 22:22:09 --> 404 Page Not Found: Assets/js
ERROR - 2019-09-23 22:22:35 --> 404 Page Not Found: Assets/css
ERROR - 2019-09-23 22:22:36 --> 404 Page Not Found: Assets/js
ERROR - 2019-09-23 22:22:36 --> 404 Page Not Found: Assets/js
ERROR - 2019-09-23 22:51:09 --> Severity: Notice --> Undefined variable: events C:\xampp\htdocs\Jollof\application\views\mainpage_view\lifestyle\lifestyle_movie.php 127
ERROR - 2019-09-23 22:51:09 --> Severity: Notice --> Undefined variable: events C:\xampp\htdocs\Jollof\application\views\mainpage_view\lifestyle\lifestyle_movie.php 127
ERROR - 2019-09-23 22:51:09 --> Severity: Notice --> Undefined variable: events C:\xampp\htdocs\Jollof\application\views\mainpage_view\lifestyle\lifestyle_movie.php 127
ERROR - 2019-09-23 22:51:09 --> Severity: Notice --> Undefined variable: events C:\xampp\htdocs\Jollof\application\views\mainpage_view\lifestyle\lifestyle_movie.php 127
ERROR - 2019-09-23 22:51:09 --> Severity: Notice --> Undefined variable: events C:\xampp\htdocs\Jollof\application\views\mainpage_view\lifestyle\lifestyle_movie.php 127
ERROR - 2019-09-23 22:51:09 --> Severity: Notice --> Undefined variable: events C:\xampp\htdocs\Jollof\application\views\mainpage_view\lifestyle\lifestyle_movie.php 127
ERROR - 2019-09-23 22:51:13 --> 404 Page Not Found: Assets/css
ERROR - 2019-09-23 22:51:13 --> 404 Page Not Found: Assets/js
ERROR - 2019-09-23 22:51:13 --> 404 Page Not Found: Assets/js
ERROR - 2019-09-23 22:51:56 --> 404 Page Not Found: Assets/css
ERROR - 2019-09-23 22:51:56 --> 404 Page Not Found: Assets/js
ERROR - 2019-09-23 22:51:56 --> 404 Page Not Found: Assets/js
ERROR - 2019-09-23 22:53:20 --> 404 Page Not Found: Assets/css
ERROR - 2019-09-23 22:53:21 --> 404 Page Not Found: Assets/js
ERROR - 2019-09-23 22:53:21 --> 404 Page Not Found: Assets/js
ERROR - 2019-09-23 22:56:11 --> 404 Page Not Found: Assets/css
ERROR - 2019-09-23 22:56:11 --> 404 Page Not Found: Assets/js
ERROR - 2019-09-23 22:56:11 --> 404 Page Not Found: Assets/js
ERROR - 2019-09-23 22:56:48 --> 404 Page Not Found: Assets/css
ERROR - 2019-09-23 22:56:49 --> 404 Page Not Found: Assets/js
ERROR - 2019-09-23 22:56:49 --> 404 Page Not Found: Assets/js
ERROR - 2019-09-23 22:57:33 --> 404 Page Not Found: Assets/css
ERROR - 2019-09-23 22:57:33 --> 404 Page Not Found: Assets/js
ERROR - 2019-09-23 22:57:34 --> 404 Page Not Found: Assets/js
ERROR - 2019-09-23 22:57:56 --> 404 Page Not Found: Assets/css
ERROR - 2019-09-23 22:57:56 --> 404 Page Not Found: Assets/js
ERROR - 2019-09-23 22:57:56 --> 404 Page Not Found: Assets/js
ERROR - 2019-09-23 22:58:07 --> 404 Page Not Found: Assets/css
ERROR - 2019-09-23 22:58:07 --> 404 Page Not Found: Assets/js
ERROR - 2019-09-23 22:58:07 --> 404 Page Not Found: Assets/js
ERROR - 2019-09-23 23:01:23 --> 404 Page Not Found: Assets/css
ERROR - 2019-09-23 23:01:23 --> 404 Page Not Found: Assets/js
ERROR - 2019-09-23 23:01:23 --> 404 Page Not Found: Assets/js
ERROR - 2019-09-23 23:14:34 --> 404 Page Not Found: Assets/css
ERROR - 2019-09-23 23:14:35 --> 404 Page Not Found: Assets/js
ERROR - 2019-09-23 23:14:35 --> 404 Page Not Found: Assets/js
ERROR - 2019-09-23 23:16:26 --> 404 Page Not Found: Assets/css
ERROR - 2019-09-23 23:16:26 --> 404 Page Not Found: Assets/js
ERROR - 2019-09-23 23:16:27 --> 404 Page Not Found: Assets/js
ERROR - 2019-09-23 23:18:27 --> 404 Page Not Found: Assets/css
ERROR - 2019-09-23 23:18:27 --> 404 Page Not Found: Assets/js
ERROR - 2019-09-23 23:18:27 --> 404 Page Not Found: Assets/js
ERROR - 2019-09-23 23:19:58 --> 404 Page Not Found: Assets/css
ERROR - 2019-09-23 23:19:59 --> 404 Page Not Found: Assets/js
ERROR - 2019-09-23 23:19:59 --> 404 Page Not Found: Assets/js
ERROR - 2019-09-23 23:20:09 --> 404 Page Not Found: Assets/css
ERROR - 2019-09-23 23:20:09 --> 404 Page Not Found: Assets/js
ERROR - 2019-09-23 23:20:09 --> 404 Page Not Found: Assets/js
ERROR - 2019-09-23 23:20:23 --> 404 Page Not Found: Assets/css
ERROR - 2019-09-23 23:20:23 --> 404 Page Not Found: Assets/js
ERROR - 2019-09-23 23:20:23 --> 404 Page Not Found: Assets/js
ERROR - 2019-09-23 23:20:48 --> 404 Page Not Found: Assets/css
ERROR - 2019-09-23 23:20:48 --> 404 Page Not Found: Assets/js
ERROR - 2019-09-23 23:20:48 --> 404 Page Not Found: Assets/js
ERROR - 2019-09-23 23:23:40 --> 404 Page Not Found: Assets/css
ERROR - 2019-09-23 23:23:41 --> 404 Page Not Found: Assets/js
ERROR - 2019-09-23 23:23:41 --> 404 Page Not Found: Assets/js
ERROR - 2019-09-23 23:26:14 --> 404 Page Not Found: Assets/css
ERROR - 2019-09-23 23:26:14 --> 404 Page Not Found: Assets/js
ERROR - 2019-09-23 23:26:14 --> 404 Page Not Found: Assets/js
ERROR - 2019-09-23 23:26:33 --> 404 Page Not Found: Assets/css
ERROR - 2019-09-23 23:26:33 --> 404 Page Not Found: Assets/js
ERROR - 2019-09-23 23:26:33 --> 404 Page Not Found: Assets/js
ERROR - 2019-09-23 23:26:53 --> 404 Page Not Found: Assets/css
ERROR - 2019-09-23 23:26:54 --> 404 Page Not Found: Assets/js
ERROR - 2019-09-23 23:26:54 --> 404 Page Not Found: Assets/js
ERROR - 2019-09-23 23:27:03 --> 404 Page Not Found: Assets/css
ERROR - 2019-09-23 23:27:03 --> 404 Page Not Found: Assets/js
ERROR - 2019-09-23 23:27:04 --> 404 Page Not Found: Assets/js
ERROR - 2019-09-23 23:28:14 --> 404 Page Not Found: Assets/css
ERROR - 2019-09-23 23:28:14 --> 404 Page Not Found: Assets/js
ERROR - 2019-09-23 23:28:14 --> 404 Page Not Found: Assets/js
ERROR - 2019-09-23 23:28:31 --> 404 Page Not Found: Assets/css
ERROR - 2019-09-23 23:28:32 --> 404 Page Not Found: Assets/js
ERROR - 2019-09-23 23:28:32 --> 404 Page Not Found: Assets/js
ERROR - 2019-09-23 23:29:05 --> 404 Page Not Found: Assets/css
ERROR - 2019-09-23 23:29:05 --> 404 Page Not Found: Assets/js
ERROR - 2019-09-23 23:29:05 --> 404 Page Not Found: Assets/js
ERROR - 2019-09-23 23:29:14 --> 404 Page Not Found: Assets/css
ERROR - 2019-09-23 23:29:14 --> 404 Page Not Found: Assets/js
ERROR - 2019-09-23 23:29:14 --> 404 Page Not Found: Assets/js
ERROR - 2019-09-23 23:29:24 --> 404 Page Not Found: Assets/css
ERROR - 2019-09-23 23:29:25 --> 404 Page Not Found: Assets/js
ERROR - 2019-09-23 23:29:25 --> 404 Page Not Found: Assets/js
ERROR - 2019-09-23 23:29:35 --> 404 Page Not Found: Assets/css
ERROR - 2019-09-23 23:29:35 --> 404 Page Not Found: Assets/js
ERROR - 2019-09-23 23:29:35 --> 404 Page Not Found: Assets/js
ERROR - 2019-09-23 23:32:34 --> 404 Page Not Found: Assets/css
ERROR - 2019-09-23 23:32:34 --> 404 Page Not Found: Assets/js
ERROR - 2019-09-23 23:32:34 --> 404 Page Not Found: Assets/js
ERROR - 2019-09-23 23:32:46 --> 404 Page Not Found: Assets/css
ERROR - 2019-09-23 23:32:46 --> 404 Page Not Found: Assets/js
ERROR - 2019-09-23 23:32:46 --> 404 Page Not Found: Assets/js
ERROR - 2019-09-23 23:34:15 --> 404 Page Not Found: Assets/css
ERROR - 2019-09-23 23:34:15 --> 404 Page Not Found: Assets/js
ERROR - 2019-09-23 23:34:15 --> 404 Page Not Found: Assets/js
ERROR - 2019-09-23 23:34:26 --> 404 Page Not Found: Assets/css
ERROR - 2019-09-23 23:34:27 --> 404 Page Not Found: Assets/js
ERROR - 2019-09-23 23:34:27 --> 404 Page Not Found: Assets/js
