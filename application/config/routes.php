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
//Auth session
$route['auth_log'] = 'back/auth/auth_log/auth_login';
$route['login'] = 'back/auth/auth_log/login_form';
$route['logout'] = 'back/auth/auth_log/logout';
$route['pass_change_process'] = 'back/auth/auth_log/pass_change_process';

//Manager Controller
$route['manager'] = 'back/manager/manager';
$route['fp'] = 'back/manager/manager/form_penilaian';
$route['ip'] = 'back/manager/manager/input_penilaian';
$route['push'] = 'back/manager/manager/push_nilai';
$route['nilai/datatable'] = 'back/manager/nilai/datatable';
$route['manager/nilai'] = 'back/manager/nilai';
$route['libat'] = 'back/manager/manager/keterlibatan_proj';
$route['manager/pass'] = 'back/manager/manager/pass_change';

//Karyawan Controller
$route['karyawan'] = 'back/karyawan/karyawan';
$route['karyawan/nilai'] = 'back/karyawan/nilai';
$route['karyawan/nilai/datatable'] = 'back/karyawan/nilai/datatable';
$route['karyawan/nilai/detail_datatable'] = 'back/karyawan/nilai/detail_datatable';
$route['karyawan/libat'] = 'back/karyawan/karyawan/keterlibatan_proj';
$route['karyawan/pass'] = 'back/karyawan/karyawan/pass_change';

//PNC Controller
$route['pnc'] = 'back/pnc/pnc';
$route['pnc/mansesi'] = 'back/pnc/pnc/mansesi';

$route['pnc/nilai'] = 'back/pnc/nilai';

$route['pnc/nilai/datatable'] = 'back/pnc/nilai/datatable';
$route['pnc/pass'] = 'back/pnc/pnc/pass_change';
// $route['pnc/libat'] = 'back/pnc/pnc/keterlibatan_proj';

$route['default_controller'] = 'welcome';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
