<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	https://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There are three reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router which controller/method to use if those
| provided in the URL cannot be matched to a valid route.
|
|	$route['translate_uri_dashes'] = FALSE;
|
| This is not exactly a route, but allows you to automatically route
| controller and method names that contain dashes. '-' isn't a valid
| class or method name character, so it requires translation.
| When you set this option to TRUE, it will replace ALL dashes in the
| controller and method URI segments.
|
| Examples:	my-controller/index	-> my_controller/index
|		my-controller/my-method	-> my_controller/my_method
*/
$route['default_controller'] = 'pages';

//$route['shopping-cart/(.*)'] = 'mainpageoye/shopping_cart/$1';


//$route['(:any)'] = "pages/$1/$1";
/*admin*/
//$route['adminoye'] = 'oye_admin/admin/login';
//$route['adminoye/(.*)'] = 'oye_admin/admin/$1';

/*
$route['restaurant-admin'] = 'restaurant/admin/dashboard';
$route['restaurant-admin/(.*)'] = 'restaurant/admin/$1';

$route['merchant/signup'] = 'restaurant/admin/signup';

$route['merchant/validationcallback'] = 'restaurant/admin/validationcallback';
$route['merchant/validationcallback/(.*)'] = 'restaurant/admin/validationcallback/$1';
$route['merchant/validationusers'] = 'restaurant/admin/validationusers';
$route['merchant/validationusers/(.*)'] = 'restaurant/admin/validationusers/$1';

$route['admin'] = 'superadmin/admin/dashboard';
$route['admin/(.*)'] = 'superadmin/admin/$1';

$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

$route['cuisine/restaurants' ] = 'restaurants/index';
$route['cuisine/restaurants/(.*)' ] = 'restaurants/$1';

$route['fashion/products/layaway' ]     = 'products/layaway';
$route['fashion/allstore' ]     	= 'products/allstore';

$route['fashion/products' ]     = 'products/index';
$route['fashion/products/(.*)'] = 'products/category/$1';
//$route['fashion/products/(:any)'] = "products/category/$1/$1";
$route['fashion/store' ]        = 'products/index';
$route['fashion/store/(.*)' ]   = 'products/store/$1';

*/

//$route['fashion/giftporter' ]        = 'products/giftporter';
//$route['fashion/giftporter/(.*)' ]   = 'products/giftporter/$1';
  
$route['fashionadmin'] = 'fashionadmin/Authentication/login';
$route['cuisineadmin'] = 'cuisineadmin/Authentication/login';
$route['jollofadmin']  = 'jollofadmin/Authentication/login';
//$route['fashion-admin/(.*)'] = 'fashionadmin/admin/$1';


$route['lifestyle/events/details/(.*)' ]   = 'lifestyle/eventsdetails/$1';
$route['lifestyle/events/checkout/(.*)' ]   = 'lifestyle/eventspayment/$1';


$route['lifestyle/movies/details/(.*)' ]   = 'lifestyle/moviesdetails/$1';
$route['lifestyle/movies/checkout/(.*)' ]   = 'lifestyle/moviespayment/$1';
