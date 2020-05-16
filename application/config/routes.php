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
$route['default_controller'] = SYSTEM_NAME."/Dashboard";
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

// login
$route[SYSTEM_NAME.'/verify_login'] = 'backoffice/Login/verify_login';
$route[SYSTEM_NAME.'/Sign-out'] = 'backoffice/Login/sign_out';

//page
$route[SYSTEM_NAME.'/dashboard/view'] = 'backoffice/Dashboard';
$route[SYSTEM_NAME.'/news/view'] = 'backoffice/News';

// user
$route[SYSTEM_NAME.'/user/view'] = 'backoffice/User/show';
$route[SYSTEM_NAME.'/user/edit/(:num)'] = 'backoffice/User/edit/$1';
$route[SYSTEM_NAME.'/user/add'] = 'backoffice/User/create';
$route[SYSTEM_NAME.'/user/status']['put'] = 'backoffice/User/update_status';
$route[SYSTEM_NAME.'/user/destroy/(:num)']['DELETE'] = 'backoffice/User/destroy/$1';

// group
$route[SYSTEM_NAME.'/group/view'] = 'backoffice/Group/show';
$route[SYSTEM_NAME.'/group/edit/(:num)'] = 'backoffice/Group/edit/$1';
$route[SYSTEM_NAME.'/group/add'] = 'backoffice/Group/create';
$route[SYSTEM_NAME.'/group/status']['put'] = 'backoffice/Group/update_status';
$route[SYSTEM_NAME.'/group/destroy/(:num)']['DELETE'] = 'backoffice/Group/destroy/$1';

// log activitie
$route[SYSTEM_NAME.'/log-activity/view'] = 'backoffice/LogActivity/show';
$route[SYSTEM_NAME.'/log-activity/list'] = 'backoffice/LogActivity/get_list';
$route[SYSTEM_NAME.'/log-activity/num_rows'] = 'backoffice/LogActivity/get_num_rows';

// log login
$route[SYSTEM_NAME.'/log-login/view'] = 'backoffice/LogLogin/show';
$route[SYSTEM_NAME.'/log-login/list'] = 'backoffice/LogLogin/get_list';
$route[SYSTEM_NAME.'/log-login/num_rows'] = 'backoffice/LogLogin/get_num_rows';


