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


$route['restaurant-admin'] = 'restaurant/admin/login';
$route['restaurant-admin/(.*)'] = 'restaurant/admin/$1';
$route['merchant/signup'] = 'restaurant/admin/signup';


$route['admin'] = 'superadmin/admin/login';
$route['admin/(.*)'] = 'superadmin/admin/$1';


$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;


$route['cuisine/restaurants' ] = 'restaurants/index';
$route['cuisine/restaurants/(.*)' ] = 'restaurants/$1';

$route['fashion/products' ] = 'products/index';
$route['fashion/products/(.*)'] = 'products/category/$1';
$route['fashion/store' ]        = 'products/index';
$route['fashion/store/(.*)' ]   = 'products/store/$1';
  
$route['fashion-admin'] = 'fashionadmin/admin/login';
$route['fashion-admin/(.*)'] = 'fashionadmin/admin/$1';
    
//For pages those have a static name
$route['{default_controller}/{default_method}/about.html'] = "{original_controller}/{original_method}";
 
//rule to rout request with number values
$route['{default_controller}/{default_method}/(:num)'] = "{original_controller}/{original_method}/$1";
 
//rule to rout request with regular expression values
$route['{default_controller}/{default_method}/([a-z]+)-{delimiter}'] = "{original_controller}/{original_method}/$1";