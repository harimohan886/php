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
$route['default_controller'] = 'Oooram';
$route['admin/login'] = 'Login';
$route['404_override'] = 'My404';
$route['404'] = 'My404/page_not_found';
$route['translate_uri_dashes'] = FALSE;
$route['register'] = 'Oooram/register';
$route['dealers-register'] = 'Oooram/register';
$route['signin'] = 'Oooram/signin';
$route['tour'] = 'Oooram/tour';
$route['tour-guide'] = 'Oooram/tour_guide';
$route['tour-guide/(:num)'] = 'Oooram/tour_guide';
$route['tour-guide-detail/(:any)'] = 'Oooram/tour_guide_details/$1';
$route['tour/(:num)'] = 'Oooram/tour';
$route['dealers'] = 'dealerlogin';
$route['log-out'] = 'Oooram/logout';
$route['dealers-login'] = 'dealerlogin';
$route['dealers/login'] = 'dealerlogin';
$route['tour-details/(:any)']="Oooram/tour_details/$1";
$route['tour-book/(:any)']="Cart/tour_book/$1";
$route['tour-confirm']="Cart/tour_confirm";
$route['book-tour/(:any)']="Cart/book_tour/$1";


$route['customer-register'] = 'Oooram/customerregister';
$route['customer-login'] = 'Oooram/customerlogin';
$route['check_customers_email_exist_or_not'] = 'oooram/check_customers_email_exist_or_not';
//$route['tour-booking-delete/(:any)'] = "Tour_dealer/tour_booking_delete/$1";
$route['check_vendor_email_exist_or_not'] = 'oooram/check_vendor_email_exist_or_not';
$route['customer-profile'] = 'Oooram/my_profile';
$route['business_type-details/(:any)'] = 'Oooram/business_type_details/$1';
$route['my-order'] = 'Customer/my_orders';
$route['dealers-otp'] = 'Oooram/my_otp';
$route['company-details'] = 'Oooram/company_details';
