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
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|
| This route will tell the Router which controller/method to use if those
| provided in the URL cannot be matched to a valid route.
|
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
$route["default_controller"] = "frontend";
$route['login']  = "dashboard/auth/index";
$route['logout'] = "dashboard/auth/logout";
$route['home'] = "frontend";
$route['menu'] = "frontend/menu";
$route['menu/(:any)'] = "frontend/menu/$1";
$route['searchitem'] = "frontend/searchitem";
$route['details/(:any)/(:any)'] = "frontend/details/$1/$2";
$route['reservation'] = "frontend/reservation";
$route['cart'] = "frontend/cart";
$route['checkcoupon'] = "frontend/checkcoupon";
$route['checkout'] = "frontend/checkout";
$route['payments/(:any)'] = "frontend/payments/$1";
$route['payment-process'] = "frontend/payments_process";
$route['mylogin'] = "frontend/login";
$route['signup'] = "frontend/signup";
$route['orderdelevered/(:any)'] = "frontend/orderdelevered/$1";
$route['about'] = "frontend/about";
$route['services'] = "frontend/services";
$route['our-menu'] = "frontend/our_menu";
$route['delivery'] = "frontend/delivery";
$route['contact'] = "frontend/contact";
$route['privacy'] = "frontend/privacy";
$route['terms'] = "frontend/terms";
$route['myprofile'] = "frontend/myprofile";
$route['myorderlist'] = "frontend/myorderlist";
$route['vieworder/(:any)'] = "frontend/vieworder/$1";
$route['myoreservationlist'] = "frontend/myoreservationlist";
$route['app-terms'] = "frontend/termsqr";
$route['app-refund-policty'] = "frontend/refundpolicyqr";
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

//Qr Route



//set modules/config/routes.php
$modules_path = APPPATH.'modules/';     
$modules = scandir($modules_path);

foreach($modules as $module)
{
    if($module === '.' || $module === '..') continue;
    if(is_dir($modules_path) . '/' . $module)
    {
        $routes_path = $modules_path . $module . '/config/route.php';
        if(file_exists($routes_path))
        {
            if (file_exists(APPPATH.'modules/'.$module.'/assets/data/env')){
			require($routes_path);
			}
        }
        else
        {
            continue;
        }
    }
}

