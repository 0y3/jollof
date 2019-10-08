<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

ERROR - 2019-03-08 10:10:37 --> 404 Page Not Found: Assets/uploads
ERROR - 2019-03-08 10:10:45 --> 404 Page Not Found: Assets/assets
ERROR - 2019-03-08 10:10:45 --> 404 Page Not Found: Assets/css
ERROR - 2019-03-08 10:15:17 --> 404 Page Not Found: Assets/uploads
ERROR - 2019-03-08 10:15:18 --> 404 Page Not Found: Assets/css
ERROR - 2019-03-08 10:15:18 --> 404 Page Not Found: Assets/assets
ERROR - 2019-03-08 10:19:06 --> 404 Page Not Found: Assets/uploads
ERROR - 2019-03-08 10:19:06 --> 404 Page Not Found: Assets/css
ERROR - 2019-03-08 10:19:07 --> 404 Page Not Found: Assets/assets
ERROR - 2019-03-08 10:19:41 --> 404 Page Not Found: Assets/uploads
ERROR - 2019-03-08 10:19:41 --> 404 Page Not Found: Assets/css
ERROR - 2019-03-08 10:19:42 --> 404 Page Not Found: Assets/assets
ERROR - 2019-03-08 10:20:17 --> 404 Page Not Found: Assets/uploads
ERROR - 2019-03-08 10:20:18 --> 404 Page Not Found: Assets/css
ERROR - 2019-03-08 10:20:18 --> 404 Page Not Found: Assets/assets
ERROR - 2019-03-08 10:20:57 --> 404 Page Not Found: Assets/uploads
ERROR - 2019-03-08 10:20:58 --> 404 Page Not Found: Assets/css
ERROR - 2019-03-08 10:20:58 --> 404 Page Not Found: Assets/assets
ERROR - 2019-03-08 13:13:46 --> Severity: Notice --> Undefined index: Type C:\xampp\htdocs\JollofCuisineWeb1\application\controllers\Accounts.php 1596
ERROR - 2019-03-08 13:14:04 --> Query error: Unknown column 'orderstatus.status' in 'where clause' - Invalid query: SELECT `orderlayaway`.*, `orderstatus`.`orderstatus_desc`, `restaurants`.`companyname` as `storename`, `restaurants`.`id` as `storeid`, `restaurants`.`slug` as `storeslug`
FROM `orderlayaway`
LEFT JOIN `restaurants` ON `orderlayaway`.`restaurantid` = `restaurants`.`id`
LEFT JOIN `accountaddresses` ON `orderlayaway`.`accountaddressid` = `accountaddresses`.`id`
LEFT JOIN `orderstatus` ON `orderstatus`.`id` = `orderlayaway`.`status`
WHERE `orderlayaway`.`accountid` = '1'
AND `orderlayaway`.`isdeleted` =0
AND `orderlayaway`.`status` = 1
AND `orderstatus`.`status` = 1
ERROR - 2019-03-08 13:14:58 --> Severity: Warning --> Invalid argument supplied for foreach() C:\xampp\htdocs\JollofCuisineWeb1\application\views\oye_mainpage_v\profile_layaway.php 281
ERROR - 2019-03-08 13:14:58 --> Severity: Notice --> Undefined variable: key C:\xampp\htdocs\JollofCuisineWeb1\application\views\oye_mainpage_v\profile_layaway.php 285
ERROR - 2019-03-08 13:14:58 --> Severity: Warning --> Invalid argument supplied for foreach() C:\xampp\htdocs\JollofCuisineWeb1\application\views\oye_mainpage_v\profile_layaway.php 423
ERROR - 2019-03-08 13:22:04 --> Severity: error --> Exception: syntax error, unexpected '}' C:\xampp\htdocs\JollofCuisineWeb1\application\views\oye_mainpage_v\profile_layaway.php 297
ERROR - 2019-03-08 13:30:16 --> Severity: error --> Exception: syntax error, unexpected 'javascript' (T_STRING) C:\xampp\htdocs\JollofCuisineWeb1\application\views\oye_mainpage_v\profile_layaway.php 293
ERROR - 2019-03-08 13:30:34 --> Severity: error --> Exception: syntax error, unexpected 'javascript' (T_STRING) C:\xampp\htdocs\JollofCuisineWeb1\application\views\oye_mainpage_v\profile_layaway.php 293
ERROR - 2019-03-08 13:30:48 --> Severity: error --> Exception: syntax error, unexpected 'javascript' (T_STRING) C:\xampp\htdocs\JollofCuisineWeb1\application\views\oye_mainpage_v\profile_layaway.php 293
ERROR - 2019-03-08 13:31:15 --> Severity: error --> Exception: syntax error, unexpected '' class="ajaxbook_form fancybo' (T_CONSTANT_ENCAPSED_STRING) C:\xampp\htdocs\JollofCuisineWeb1\application\views\oye_mainpage_v\profile_layaway.php 293
ERROR - 2019-03-08 13:32:25 --> Severity: error --> Exception: syntax error, unexpected 'javascript' (T_STRING) C:\xampp\htdocs\JollofCuisineWeb1\application\views\oye_mainpage_v\profile_layaway.php 293
ERROR - 2019-03-08 14:04:23 --> 404 Page Not Found: Assets/js
ERROR - 2019-03-08 14:04:23 --> 404 Page Not Found: Assets/assets
ERROR - 2019-03-08 14:04:23 --> 404 Page Not Found: Assets/css
ERROR - 2019-03-08 14:04:23 --> 404 Page Not Found: Assets/assets
ERROR - 2019-03-08 14:04:34 --> Severity: error --> Exception: syntax error, unexpected 'id' (T_STRING), expecting ',' or ')' C:\xampp\htdocs\JollofCuisineWeb1\application\views\oye_mainpage_v\profile_layaway.php 297
ERROR - 2019-03-08 14:04:35 --> 404 Page Not Found: Assets/js
ERROR - 2019-03-08 14:04:35 --> 404 Page Not Found: Assets/assets
ERROR - 2019-03-08 14:04:56 --> Severity: error --> Exception: syntax error, unexpected '$row' (T_VARIABLE), expecting ',' or ')' C:\xampp\htdocs\JollofCuisineWeb1\application\views\oye_mainpage_v\profile_layaway.php 297
ERROR - 2019-03-08 14:04:56 --> 404 Page Not Found: Assets/assets
ERROR - 2019-03-08 14:04:56 --> 404 Page Not Found: Assets/js
ERROR - 2019-03-08 14:05:01 --> 404 Page Not Found: Assets/js
ERROR - 2019-03-08 14:05:01 --> 404 Page Not Found: Assets/assets
ERROR - 2019-03-08 14:05:01 --> 404 Page Not Found: Assets/assets
ERROR - 2019-03-08 14:05:02 --> 404 Page Not Found: Assets/css
ERROR - 2019-03-08 14:10:36 --> Severity: error --> Exception: syntax error, unexpected '.' C:\xampp\htdocs\JollofCuisineWeb1\application\views\oye_mainpage_v\profile_layawaypaymentform.php 35
ERROR - 2019-03-08 14:11:00 --> Severity: error --> Exception: syntax error, unexpected '.' C:\xampp\htdocs\JollofCuisineWeb1\application\views\oye_mainpage_v\profile_layawaypaymentform.php 35
ERROR - 2019-03-08 14:16:13 --> 404 Page Not Found: Assets/assets
ERROR - 2019-03-08 14:16:13 --> 404 Page Not Found: Assets/js
ERROR - 2019-03-08 14:16:13 --> 404 Page Not Found: Assets/css
ERROR - 2019-03-08 14:16:13 --> 404 Page Not Found: Assets/assets
ERROR - 2019-03-08 14:16:16 --> Severity: Notice --> Undefined index: total_cart C:\xampp\htdocs\JollofCuisineWeb1\application\controllers\Checkout.php 842
ERROR - 2019-03-08 14:16:16 --> Severity: Notice --> Undefined index: card_au C:\xampp\htdocs\JollofCuisineWeb1\application\controllers\Checkout.php 846
ERROR - 2019-03-08 14:16:16 --> Severity: Notice --> Undefined index: layaway_id C:\xampp\htdocs\JollofCuisineWeb1\application\controllers\Checkout.php 847
ERROR - 2019-03-08 14:16:16 --> Severity: Notice --> Undefined index: paytype C:\xampp\htdocs\JollofCuisineWeb1\application\controllers\Checkout.php 850
ERROR - 2019-03-08 14:43:08 --> 404 Page Not Found: Assets/assets
ERROR - 2019-03-08 14:43:08 --> 404 Page Not Found: Assets/js
ERROR - 2019-03-08 14:43:08 --> 404 Page Not Found: Assets/assets
ERROR - 2019-03-08 14:43:08 --> 404 Page Not Found: Assets/css
ERROR - 2019-03-08 14:43:08 --> Severity: Notice --> Undefined variable: add_card C:\xampp\htdocs\JollofCuisineWeb1\application\views\oye_mainpage_v\profile_layawaypaymentform.php 45
ERROR - 2019-03-08 14:43:08 --> Severity: Warning --> Invalid argument supplied for foreach() C:\xampp\htdocs\JollofCuisineWeb1\application\views\oye_mainpage_v\profile_layawaypaymentform.php 45
ERROR - 2019-03-08 14:46:12 --> Severity: Notice --> Trying to get property of non-object C:\xampp\htdocs\JollofCuisineWeb1\application\views\oye_mainpage_v\profile_layawaypaymentform.php 49
ERROR - 2019-03-08 14:46:12 --> Severity: Notice --> Trying to get property of non-object C:\xampp\htdocs\JollofCuisineWeb1\application\views\oye_mainpage_v\profile_layawaypaymentform.php 52
ERROR - 2019-03-08 14:46:12 --> Severity: Notice --> Trying to get property of non-object C:\xampp\htdocs\JollofCuisineWeb1\application\views\oye_mainpage_v\profile_layawaypaymentform.php 49
ERROR - 2019-03-08 14:46:12 --> Severity: Notice --> Trying to get property of non-object C:\xampp\htdocs\JollofCuisineWeb1\application\views\oye_mainpage_v\profile_layawaypaymentform.php 52
ERROR - 2019-03-08 14:46:12 --> Severity: Notice --> Trying to get property of non-object C:\xampp\htdocs\JollofCuisineWeb1\application\views\oye_mainpage_v\profile_layawaypaymentform.php 49
ERROR - 2019-03-08 14:46:12 --> Severity: Notice --> Trying to get property of non-object C:\xampp\htdocs\JollofCuisineWeb1\application\views\oye_mainpage_v\profile_layawaypaymentform.php 52
ERROR - 2019-03-08 14:46:12 --> Severity: Notice --> Trying to get property of non-object C:\xampp\htdocs\JollofCuisineWeb1\application\views\oye_mainpage_v\profile_layawaypaymentform.php 49
ERROR - 2019-03-08 14:46:12 --> Severity: Notice --> Trying to get property of non-object C:\xampp\htdocs\JollofCuisineWeb1\application\views\oye_mainpage_v\profile_layawaypaymentform.php 52
ERROR - 2019-03-08 14:46:12 --> Severity: Notice --> Trying to get property of non-object C:\xampp\htdocs\JollofCuisineWeb1\application\views\oye_mainpage_v\profile_layawaypaymentform.php 49
ERROR - 2019-03-08 14:46:12 --> Severity: Notice --> Trying to get property of non-object C:\xampp\htdocs\JollofCuisineWeb1\application\views\oye_mainpage_v\profile_layawaypaymentform.php 52
ERROR - 2019-03-08 14:46:12 --> Severity: Notice --> Trying to get property of non-object C:\xampp\htdocs\JollofCuisineWeb1\application\views\oye_mainpage_v\profile_layawaypaymentform.php 49
ERROR - 2019-03-08 14:46:12 --> Severity: Notice --> Trying to get property of non-object C:\xampp\htdocs\JollofCuisineWeb1\application\views\oye_mainpage_v\profile_layawaypaymentform.php 52
ERROR - 2019-03-08 14:46:12 --> Severity: Notice --> Trying to get property of non-object C:\xampp\htdocs\JollofCuisineWeb1\application\views\oye_mainpage_v\profile_layawaypaymentform.php 49
ERROR - 2019-03-08 14:46:12 --> Severity: Notice --> Trying to get property of non-object C:\xampp\htdocs\JollofCuisineWeb1\application\views\oye_mainpage_v\profile_layawaypaymentform.php 52
ERROR - 2019-03-08 14:46:12 --> Severity: Notice --> Trying to get property of non-object C:\xampp\htdocs\JollofCuisineWeb1\application\views\oye_mainpage_v\profile_layawaypaymentform.php 49
ERROR - 2019-03-08 14:46:12 --> Severity: Notice --> Trying to get property of non-object C:\xampp\htdocs\JollofCuisineWeb1\application\views\oye_mainpage_v\profile_layawaypaymentform.php 52
ERROR - 2019-03-08 14:46:12 --> Severity: Notice --> Trying to get property of non-object C:\xampp\htdocs\JollofCuisineWeb1\application\views\oye_mainpage_v\profile_layawaypaymentform.php 49
ERROR - 2019-03-08 14:46:12 --> Severity: Notice --> Trying to get property of non-object C:\xampp\htdocs\JollofCuisineWeb1\application\views\oye_mainpage_v\profile_layawaypaymentform.php 52
ERROR - 2019-03-08 14:46:29 --> Severity: Notice --> Trying to get property of non-object C:\xampp\htdocs\JollofCuisineWeb1\application\views\oye_mainpage_v\profile_layawaypaymentform.php 49
ERROR - 2019-03-08 14:46:29 --> Severity: Warning --> Illegal string offset 'last4' C:\xampp\htdocs\JollofCuisineWeb1\application\views\oye_mainpage_v\profile_layawaypaymentform.php 52
ERROR - 2019-03-08 14:46:29 --> Severity: Notice --> Trying to get property of non-object C:\xampp\htdocs\JollofCuisineWeb1\application\views\oye_mainpage_v\profile_layawaypaymentform.php 49
ERROR - 2019-03-08 14:46:29 --> Severity: Warning --> Illegal string offset 'last4' C:\xampp\htdocs\JollofCuisineWeb1\application\views\oye_mainpage_v\profile_layawaypaymentform.php 52
ERROR - 2019-03-08 14:46:29 --> Severity: Notice --> Trying to get property of non-object C:\xampp\htdocs\JollofCuisineWeb1\application\views\oye_mainpage_v\profile_layawaypaymentform.php 49
ERROR - 2019-03-08 14:46:29 --> Severity: Warning --> Illegal string offset 'last4' C:\xampp\htdocs\JollofCuisineWeb1\application\views\oye_mainpage_v\profile_layawaypaymentform.php 52
ERROR - 2019-03-08 14:46:29 --> Severity: Notice --> Trying to get property of non-object C:\xampp\htdocs\JollofCuisineWeb1\application\views\oye_mainpage_v\profile_layawaypaymentform.php 49
ERROR - 2019-03-08 14:46:29 --> Severity: Warning --> Illegal string offset 'last4' C:\xampp\htdocs\JollofCuisineWeb1\application\views\oye_mainpage_v\profile_layawaypaymentform.php 52
ERROR - 2019-03-08 14:46:29 --> Severity: Notice --> Trying to get property of non-object C:\xampp\htdocs\JollofCuisineWeb1\application\views\oye_mainpage_v\profile_layawaypaymentform.php 49
ERROR - 2019-03-08 14:46:29 --> Severity: Warning --> Illegal string offset 'last4' C:\xampp\htdocs\JollofCuisineWeb1\application\views\oye_mainpage_v\profile_layawaypaymentform.php 52
ERROR - 2019-03-08 14:46:29 --> Severity: Notice --> Trying to get property of non-object C:\xampp\htdocs\JollofCuisineWeb1\application\views\oye_mainpage_v\profile_layawaypaymentform.php 49
ERROR - 2019-03-08 14:46:29 --> Severity: Warning --> Illegal string offset 'last4' C:\xampp\htdocs\JollofCuisineWeb1\application\views\oye_mainpage_v\profile_layawaypaymentform.php 52
ERROR - 2019-03-08 14:46:29 --> Severity: Notice --> Trying to get property of non-object C:\xampp\htdocs\JollofCuisineWeb1\application\views\oye_mainpage_v\profile_layawaypaymentform.php 49
ERROR - 2019-03-08 14:46:29 --> Severity: Warning --> Illegal string offset 'last4' C:\xampp\htdocs\JollofCuisineWeb1\application\views\oye_mainpage_v\profile_layawaypaymentform.php 52
ERROR - 2019-03-08 14:46:29 --> Severity: Notice --> Trying to get property of non-object C:\xampp\htdocs\JollofCuisineWeb1\application\views\oye_mainpage_v\profile_layawaypaymentform.php 49
ERROR - 2019-03-08 14:46:29 --> Severity: Warning --> Illegal string offset 'last4' C:\xampp\htdocs\JollofCuisineWeb1\application\views\oye_mainpage_v\profile_layawaypaymentform.php 52
ERROR - 2019-03-08 14:46:29 --> Severity: Notice --> Trying to get property of non-object C:\xampp\htdocs\JollofCuisineWeb1\application\views\oye_mainpage_v\profile_layawaypaymentform.php 49
ERROR - 2019-03-08 14:46:29 --> Severity: Warning --> Illegal string offset 'last4' C:\xampp\htdocs\JollofCuisineWeb1\application\views\oye_mainpage_v\profile_layawaypaymentform.php 52
ERROR - 2019-03-08 14:46:54 --> Severity: Warning --> Illegal string offset 'authorizationcode' C:\xampp\htdocs\JollofCuisineWeb1\application\views\oye_mainpage_v\profile_layawaypaymentform.php 49
ERROR - 2019-03-08 14:46:54 --> Severity: Warning --> Illegal string offset 'last4' C:\xampp\htdocs\JollofCuisineWeb1\application\views\oye_mainpage_v\profile_layawaypaymentform.php 52
ERROR - 2019-03-08 14:46:54 --> Severity: Warning --> Illegal string offset 'authorizationcode' C:\xampp\htdocs\JollofCuisineWeb1\application\views\oye_mainpage_v\profile_layawaypaymentform.php 49
ERROR - 2019-03-08 14:46:54 --> Severity: Warning --> Illegal string offset 'last4' C:\xampp\htdocs\JollofCuisineWeb1\application\views\oye_mainpage_v\profile_layawaypaymentform.php 52
ERROR - 2019-03-08 14:46:54 --> Severity: Warning --> Illegal string offset 'authorizationcode' C:\xampp\htdocs\JollofCuisineWeb1\application\views\oye_mainpage_v\profile_layawaypaymentform.php 49
ERROR - 2019-03-08 14:46:54 --> Severity: Warning --> Illegal string offset 'last4' C:\xampp\htdocs\JollofCuisineWeb1\application\views\oye_mainpage_v\profile_layawaypaymentform.php 52
ERROR - 2019-03-08 14:46:54 --> Severity: Warning --> Illegal string offset 'authorizationcode' C:\xampp\htdocs\JollofCuisineWeb1\application\views\oye_mainpage_v\profile_layawaypaymentform.php 49
ERROR - 2019-03-08 14:46:54 --> Severity: Warning --> Illegal string offset 'last4' C:\xampp\htdocs\JollofCuisineWeb1\application\views\oye_mainpage_v\profile_layawaypaymentform.php 52
ERROR - 2019-03-08 14:46:54 --> Severity: Warning --> Illegal string offset 'authorizationcode' C:\xampp\htdocs\JollofCuisineWeb1\application\views\oye_mainpage_v\profile_layawaypaymentform.php 49
ERROR - 2019-03-08 14:46:54 --> Severity: Warning --> Illegal string offset 'last4' C:\xampp\htdocs\JollofCuisineWeb1\application\views\oye_mainpage_v\profile_layawaypaymentform.php 52
ERROR - 2019-03-08 14:46:54 --> Severity: Warning --> Illegal string offset 'authorizationcode' C:\xampp\htdocs\JollofCuisineWeb1\application\views\oye_mainpage_v\profile_layawaypaymentform.php 49
ERROR - 2019-03-08 14:46:54 --> Severity: Warning --> Illegal string offset 'last4' C:\xampp\htdocs\JollofCuisineWeb1\application\views\oye_mainpage_v\profile_layawaypaymentform.php 52
ERROR - 2019-03-08 14:46:54 --> Severity: Warning --> Illegal string offset 'authorizationcode' C:\xampp\htdocs\JollofCuisineWeb1\application\views\oye_mainpage_v\profile_layawaypaymentform.php 49
ERROR - 2019-03-08 14:46:54 --> Severity: Warning --> Illegal string offset 'last4' C:\xampp\htdocs\JollofCuisineWeb1\application\views\oye_mainpage_v\profile_layawaypaymentform.php 52
ERROR - 2019-03-08 14:46:54 --> Severity: Warning --> Illegal string offset 'authorizationcode' C:\xampp\htdocs\JollofCuisineWeb1\application\views\oye_mainpage_v\profile_layawaypaymentform.php 49
ERROR - 2019-03-08 14:46:54 --> Severity: Warning --> Illegal string offset 'last4' C:\xampp\htdocs\JollofCuisineWeb1\application\views\oye_mainpage_v\profile_layawaypaymentform.php 52
ERROR - 2019-03-08 14:46:54 --> Severity: Warning --> Illegal string offset 'authorizationcode' C:\xampp\htdocs\JollofCuisineWeb1\application\views\oye_mainpage_v\profile_layawaypaymentform.php 49
ERROR - 2019-03-08 14:46:54 --> Severity: Warning --> Illegal string offset 'last4' C:\xampp\htdocs\JollofCuisineWeb1\application\views\oye_mainpage_v\profile_layawaypaymentform.php 52
ERROR - 2019-03-08 14:53:24 --> 404 Page Not Found: Assets/assets
ERROR - 2019-03-08 14:53:24 --> 404 Page Not Found: Assets/js
ERROR - 2019-03-08 14:53:24 --> 404 Page Not Found: Assets/css
ERROR - 2019-03-08 14:53:24 --> 404 Page Not Found: Assets/assets
ERROR - 2019-03-08 14:53:45 --> 404 Page Not Found: Assets/js
ERROR - 2019-03-08 14:53:45 --> 404 Page Not Found: Assets/assets
ERROR - 2019-03-08 14:53:45 --> 404 Page Not Found: Assets/css
ERROR - 2019-03-08 14:53:45 --> 404 Page Not Found: Assets/assets
ERROR - 2019-03-08 14:54:16 --> Severity: Notice --> Undefined index: paytype C:\xampp\htdocs\JollofCuisineWeb1\application\controllers\Checkout.php 850
ERROR - 2019-03-08 14:57:58 --> 404 Page Not Found: Assets/assets
ERROR - 2019-03-08 14:57:58 --> 404 Page Not Found: Assets/js
ERROR - 2019-03-08 14:57:58 --> 404 Page Not Found: Assets/assets
ERROR - 2019-03-08 14:57:58 --> 404 Page Not Found: Assets/css
ERROR - 2019-03-08 14:58:03 --> Severity: Notice --> Trying to get property of non-object C:\xampp\htdocs\JollofCuisineWeb1\application\controllers\Checkout.php 919
ERROR - 2019-03-08 14:58:03 --> Severity: Notice --> Trying to get property of non-object C:\xampp\htdocs\JollofCuisineWeb1\application\controllers\Checkout.php 919
ERROR - 2019-03-08 14:58:04 --> 404 Page Not Found: Assets/assets
ERROR - 2019-03-08 14:58:04 --> 404 Page Not Found: Assets/js
ERROR - 2019-03-08 14:58:04 --> 404 Page Not Found: Assets/css
ERROR - 2019-03-08 14:58:05 --> 404 Page Not Found: Assets/jollof_banners
ERROR - 2019-03-08 14:58:06 --> 404 Page Not Found: Assets/assets
ERROR - 2019-03-08 14:58:08 --> 404 Page Not Found: Assets/assets
ERROR - 2019-03-08 14:58:08 --> 404 Page Not Found: Assets/js
ERROR - 2019-03-08 14:58:08 --> 404 Page Not Found: Assets/css
ERROR - 2019-03-08 14:58:08 --> 404 Page Not Found: Assets/assets
ERROR - 2019-03-08 14:58:26 --> Severity: Notice --> Trying to get property of non-object C:\xampp\htdocs\JollofCuisineWeb1\application\controllers\Checkout.php 919
ERROR - 2019-03-08 14:58:26 --> Severity: Notice --> Trying to get property of non-object C:\xampp\htdocs\JollofCuisineWeb1\application\controllers\Checkout.php 919
ERROR - 2019-03-08 14:58:27 --> 404 Page Not Found: Assets/jollof_banners
ERROR - 2019-03-08 14:58:27 --> 404 Page Not Found: Assets/js
ERROR - 2019-03-08 14:58:27 --> 404 Page Not Found: Assets/assets
ERROR - 2019-03-08 14:58:27 --> 404 Page Not Found: Assets/css
ERROR - 2019-03-08 14:58:27 --> 404 Page Not Found: Assets/jollof_banners
ERROR - 2019-03-08 14:58:27 --> 404 Page Not Found: Assets/assets
ERROR - 2019-03-08 14:58:31 --> 404 Page Not Found: Assets/assets
ERROR - 2019-03-08 14:58:31 --> 404 Page Not Found: Assets/js
ERROR - 2019-03-08 14:58:31 --> 404 Page Not Found: Assets/css
ERROR - 2019-03-08 14:58:31 --> 404 Page Not Found: Assets/assets
ERROR - 2019-03-08 14:58:35 --> Severity: Notice --> Trying to get property of non-object C:\xampp\htdocs\JollofCuisineWeb1\application\controllers\Checkout.php 919
ERROR - 2019-03-08 14:58:35 --> Severity: Notice --> Trying to get property of non-object C:\xampp\htdocs\JollofCuisineWeb1\application\controllers\Checkout.php 919
ERROR - 2019-03-08 14:58:36 --> 404 Page Not Found: Assets/jollof_banners
ERROR - 2019-03-08 14:58:36 --> 404 Page Not Found: Assets/assets
ERROR - 2019-03-08 14:58:36 --> 404 Page Not Found: Assets/js
ERROR - 2019-03-08 14:58:36 --> 404 Page Not Found: Assets/css
ERROR - 2019-03-08 14:58:36 --> 404 Page Not Found: Assets/jollof_banners
ERROR - 2019-03-08 14:58:36 --> 404 Page Not Found: Assets/assets
ERROR - 2019-03-08 14:58:47 --> 404 Page Not Found: Assets/assets
ERROR - 2019-03-08 14:58:47 --> 404 Page Not Found: Assets/js
ERROR - 2019-03-08 14:58:47 --> 404 Page Not Found: Assets/assets
ERROR - 2019-03-08 14:58:48 --> 404 Page Not Found: Assets/css
ERROR - 2019-03-08 14:59:54 --> 404 Page Not Found: Assets/js
ERROR - 2019-03-08 14:59:54 --> 404 Page Not Found: Assets/assets
ERROR - 2019-03-08 14:59:54 --> 404 Page Not Found: Assets/assets
ERROR - 2019-03-08 14:59:54 --> 404 Page Not Found: Assets/css
ERROR - 2019-03-08 15:03:44 --> 404 Page Not Found: Assets/js
ERROR - 2019-03-08 15:03:44 --> 404 Page Not Found: Assets/assets
ERROR - 2019-03-08 15:03:44 --> 404 Page Not Found: Assets/assets
ERROR - 2019-03-08 15:03:44 --> 404 Page Not Found: Assets/css
ERROR - 2019-03-08 15:04:19 --> 404 Page Not Found: Assets/js
ERROR - 2019-03-08 15:04:19 --> 404 Page Not Found: Assets/assets
ERROR - 2019-03-08 15:04:19 --> 404 Page Not Found: Assets/css
ERROR - 2019-03-08 15:04:19 --> 404 Page Not Found: Assets/assets
ERROR - 2019-03-08 15:05:01 --> 404 Page Not Found: Assets/js
ERROR - 2019-03-08 15:05:01 --> 404 Page Not Found: Assets/assets
ERROR - 2019-03-08 15:05:01 --> 404 Page Not Found: Assets/assets
ERROR - 2019-03-08 15:05:01 --> 404 Page Not Found: Assets/css
ERROR - 2019-03-08 15:05:26 --> Severity: error --> Exception: Curl failed with response: 'SSL certificate problem: unable to get local issuer certificate'. C:\xampp\htdocs\JollofCuisineWeb1\application\libraries\Paystack.php 701
ERROR - 2019-03-08 15:05:31 --> 404 Page Not Found: Assets/js
ERROR - 2019-03-08 15:05:31 --> 404 Page Not Found: Assets/assets
ERROR - 2019-03-08 15:05:31 --> 404 Page Not Found: Assets/css
ERROR - 2019-03-08 15:05:31 --> 404 Page Not Found: Assets/assets
ERROR - 2019-03-08 15:05:35 --> Severity: error --> Exception: Curl failed with response: 'SSL certificate problem: unable to get local issuer certificate'. C:\xampp\htdocs\JollofCuisineWeb1\application\libraries\Paystack.php 701
ERROR - 2019-03-08 15:07:57 --> 404 Page Not Found: Assets/assets
ERROR - 2019-03-08 15:07:57 --> 404 Page Not Found: Assets/js
ERROR - 2019-03-08 15:07:57 --> 404 Page Not Found: Assets/assets
ERROR - 2019-03-08 15:07:57 --> 404 Page Not Found: Assets/css
ERROR - 2019-03-08 15:09:14 --> Severity: error --> Exception: Curl failed with response: 'SSL certificate problem: unable to get local issuer certificate'. C:\xampp\htdocs\JollofCuisineWeb1\application\libraries\Paystack.php 701
ERROR - 2019-03-08 15:09:18 --> 404 Page Not Found: Assets/js
ERROR - 2019-03-08 15:09:18 --> 404 Page Not Found: Assets/assets
ERROR - 2019-03-08 15:09:18 --> 404 Page Not Found: Assets/css
ERROR - 2019-03-08 15:09:18 --> 404 Page Not Found: Assets/assets
ERROR - 2019-03-08 15:09:26 --> Severity: error --> Exception: Curl failed with response: 'SSL certificate problem: unable to get local issuer certificate'. C:\xampp\htdocs\JollofCuisineWeb1\application\libraries\Paystack.php 701
ERROR - 2019-03-08 15:09:28 --> 404 Page Not Found: Assets/js
ERROR - 2019-03-08 15:09:28 --> 404 Page Not Found: Assets/assets
ERROR - 2019-03-08 15:09:28 --> 404 Page Not Found: Assets/css
ERROR - 2019-03-08 15:09:28 --> 404 Page Not Found: Assets/assets
ERROR - 2019-03-08 15:09:52 --> 404 Page Not Found: Assets/js
ERROR - 2019-03-08 15:09:52 --> 404 Page Not Found: Assets/assets
ERROR - 2019-03-08 15:09:52 --> 404 Page Not Found: Assets/assets
ERROR - 2019-03-08 15:09:52 --> 404 Page Not Found: Assets/css
ERROR - 2019-03-08 15:10:03 --> 404 Page Not Found: Assets/js
ERROR - 2019-03-08 15:10:03 --> 404 Page Not Found: Assets/assets
ERROR - 2019-03-08 15:10:03 --> 404 Page Not Found: Assets/assets
ERROR - 2019-03-08 15:10:03 --> 404 Page Not Found: Assets/css
ERROR - 2019-03-08 15:10:21 --> Severity: error --> Exception: Curl failed with response: 'SSL certificate problem: unable to get local issuer certificate'. C:\xampp\htdocs\JollofCuisineWeb1\application\libraries\Paystack.php 701
ERROR - 2019-03-08 15:10:29 --> 404 Page Not Found: Assets/js
ERROR - 2019-03-08 15:10:29 --> 404 Page Not Found: Assets/assets
ERROR - 2019-03-08 15:10:29 --> 404 Page Not Found: Assets/css
ERROR - 2019-03-08 15:10:29 --> 404 Page Not Found: Assets/assets
ERROR - 2019-03-08 15:11:55 --> Severity: error --> Exception: Curl failed with response: 'SSL certificate problem: unable to get local issuer certificate'. C:\xampp\htdocs\JollofCuisineWeb1\application\libraries\Paystack.php 701
ERROR - 2019-03-08 15:11:57 --> 404 Page Not Found: Assets/assets
ERROR - 2019-03-08 15:11:57 --> 404 Page Not Found: Assets/js
ERROR - 2019-03-08 15:11:57 --> 404 Page Not Found: Assets/assets
ERROR - 2019-03-08 15:11:58 --> 404 Page Not Found: Assets/css
ERROR - 2019-03-08 15:16:35 --> Severity: error --> Exception: Curl failed with response: 'SSL certificate problem: unable to get local issuer certificate'. C:\xampp\htdocs\JollofCuisineWeb1\application\libraries\Paystack.php 701
ERROR - 2019-03-08 15:16:39 --> 404 Page Not Found: Assets/js
ERROR - 2019-03-08 15:16:39 --> 404 Page Not Found: Assets/assets
ERROR - 2019-03-08 15:16:39 --> 404 Page Not Found: Assets/css
ERROR - 2019-03-08 15:16:39 --> 404 Page Not Found: Assets/assets
ERROR - 2019-03-08 15:16:43 --> Severity: error --> Exception: Curl failed with response: 'SSL certificate problem: unable to get local issuer certificate'. C:\xampp\htdocs\JollofCuisineWeb1\application\libraries\Paystack.php 701
ERROR - 2019-03-08 15:16:45 --> 404 Page Not Found: Assets/assets
ERROR - 2019-03-08 15:16:45 --> 404 Page Not Found: Assets/js
ERROR - 2019-03-08 15:16:45 --> 404 Page Not Found: Assets/assets
ERROR - 2019-03-08 15:16:45 --> 404 Page Not Found: Assets/css
ERROR - 2019-03-08 15:17:44 --> 404 Page Not Found: Assets/js
ERROR - 2019-03-08 15:17:44 --> 404 Page Not Found: Assets/assets
ERROR - 2019-03-08 15:17:44 --> 404 Page Not Found: Assets/assets
ERROR - 2019-03-08 15:17:44 --> 404 Page Not Found: Assets/css
ERROR - 2019-03-08 15:17:48 --> Severity: error --> Exception: Curl failed with response: 'SSL certificate problem: unable to get local issuer certificate'. C:\xampp\htdocs\JollofCuisineWeb1\application\libraries\Paystack.php 701
ERROR - 2019-03-08 15:17:50 --> 404 Page Not Found: Assets/js
ERROR - 2019-03-08 15:17:50 --> 404 Page Not Found: Assets/assets
ERROR - 2019-03-08 15:17:50 --> 404 Page Not Found: Assets/assets
ERROR - 2019-03-08 15:17:50 --> 404 Page Not Found: Assets/css
ERROR - 2019-03-08 15:18:40 --> Severity: error --> Exception: Curl failed with response: 'SSL certificate problem: unable to get local issuer certificate'. C:\xampp\htdocs\JollofCuisineWeb1\application\libraries\Paystack.php 701
ERROR - 2019-03-08 15:18:43 --> 404 Page Not Found: Assets/js
ERROR - 2019-03-08 15:18:43 --> 404 Page Not Found: Assets/assets
ERROR - 2019-03-08 15:18:43 --> 404 Page Not Found: Assets/assets
ERROR - 2019-03-08 15:18:43 --> 404 Page Not Found: Assets/css
ERROR - 2019-03-08 15:19:33 --> Severity: error --> Exception: Curl failed with response: 'SSL certificate problem: unable to get local issuer certificate'. C:\xampp\htdocs\JollofCuisineWeb1\application\libraries\Paystack.php 701
ERROR - 2019-03-08 15:20:11 --> 404 Page Not Found: Assets/assets
ERROR - 2019-03-08 15:20:11 --> 404 Page Not Found: Assets/js
ERROR - 2019-03-08 15:20:11 --> 404 Page Not Found: Assets/css
ERROR - 2019-03-08 15:20:11 --> 404 Page Not Found: Assets/assets
ERROR - 2019-03-08 16:07:06 --> 404 Page Not Found: Assetsjs/bootstrap.min.js
ERROR - 2019-03-08 16:07:16 --> 404 Page Not Found: Assets/js
ERROR - 2019-03-08 16:07:16 --> 404 Page Not Found: Assets/assets
ERROR - 2019-03-08 16:07:16 --> 404 Page Not Found: Assets/css
ERROR - 2019-03-08 16:07:16 --> 404 Page Not Found: Assets/assets
ERROR - 2019-03-08 16:07:44 --> 404 Page Not Found: Assetsjs/bootstrap.min.js
ERROR - 2019-03-08 16:07:44 --> 404 Page Not Found: Assets/js
ERROR - 2019-03-08 16:07:44 --> 404 Page Not Found: Assets/assets
ERROR - 2019-03-08 16:07:44 --> 404 Page Not Found: Assetsjs/bootstrap.min.js
ERROR - 2019-03-08 16:07:44 --> 404 Page Not Found: Assets/css
ERROR - 2019-03-08 16:07:45 --> 404 Page Not Found: Assets/assets
ERROR - 2019-03-08 16:07:57 --> 404 Page Not Found: Assetsjs/bootstrap.min.js
ERROR - 2019-03-08 16:07:57 --> 404 Page Not Found: Assets/js
ERROR - 2019-03-08 16:07:57 --> 404 Page Not Found: Assets/assets
ERROR - 2019-03-08 16:07:57 --> 404 Page Not Found: Assetsjs/bootstrap.min.js
ERROR - 2019-03-08 16:07:57 --> 404 Page Not Found: Assets/css
ERROR - 2019-03-08 16:07:58 --> 404 Page Not Found: Assets/assets
ERROR - 2019-03-08 16:15:04 --> 404 Page Not Found: Assetsjs/bootstrap.min.js
ERROR - 2019-03-08 16:15:04 --> 404 Page Not Found: Assets/assets
ERROR - 2019-03-08 16:15:04 --> 404 Page Not Found: Assets/js
ERROR - 2019-03-08 16:15:04 --> 404 Page Not Found: Assetsjs/bootstrap.min.js
ERROR - 2019-03-08 16:15:04 --> 404 Page Not Found: Assets/css
ERROR - 2019-03-08 16:15:05 --> 404 Page Not Found: Assets/assets
ERROR - 2019-03-08 16:19:35 --> Severity: error --> Exception: syntax error, unexpected '$data_charge' (T_VARIABLE) C:\xampp\htdocs\JollofCuisineWeb1\application\controllers\Checkout.php 189
ERROR - 2019-03-08 16:19:39 --> Severity: error --> Exception: syntax error, unexpected '$data_charge' (T_VARIABLE) C:\xampp\htdocs\JollofCuisineWeb1\application\controllers\Checkout.php 189
ERROR - 2019-03-08 16:19:45 --> 404 Page Not Found: Assetsjs/bootstrap.min.js
ERROR - 2019-03-08 16:19:45 --> 404 Page Not Found: Assets/assets
ERROR - 2019-03-08 16:19:45 --> 404 Page Not Found: Assets/js
ERROR - 2019-03-08 16:19:45 --> 404 Page Not Found: Assetsjs/bootstrap.min.js
ERROR - 2019-03-08 16:19:45 --> 404 Page Not Found: Assets/css
ERROR - 2019-03-08 16:19:45 --> 404 Page Not Found: Assets/assets
ERROR - 2019-03-08 16:22:07 --> Severity: error --> Exception: syntax error, unexpected ',' C:\xampp\htdocs\JollofCuisineWeb1\application\controllers\Checkout.php 218
ERROR - 2019-03-08 16:23:31 --> 404 Page Not Found: Assets/css
ERROR - 2019-03-08 16:23:31 --> 404 Page Not Found: Assets/js
