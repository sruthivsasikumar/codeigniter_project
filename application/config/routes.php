<?php
defined('BASEPATH') OR exit('No direct script access allowed');


$route['default_controller'] = 'Maincontroller';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;


$route['batch'] = "batchcontroller/index";
$route['batchCreate'] = "batchcontroller/create";
$route['batchAdd']['post'] = "batchcontroller/store"; //add to db
$route['batchEdit/(:any)'] = "batchcontroller/edit/$1";
$route['batchUpdate/(:any)']= "batchcontroller/update/$1";
$route['batchDelete/(:any)'] = "batchcontroller/delete/$1";



$route['student'] = "studentcontroller/index";
$route['studentCreate'] = "studentcontroller/create";
$route['studentAdd']['post'] = "studentcontroller/store"; //add to db
$route['studentEdit/(:any)'] = "studentcontroller/edit/$1";
$route['studentUpdate/(:any)']= "studentcontroller/update/$1";
$route['studentDelete/(:any)'] = "studentcontroller/delete/$1";


$route['user'] = "usercontroller/index";
$route['userCreate'] = "usercontroller/create";
$route['userAdd']['post'] = "usercontroller/store"; //add to db
$route['userEdit/(:any)'] = "usercontroller/edit/$1";
$route['userUpdate/(:any)']= "usercontroller/update/$1";
$route['userDelete/(:any)'] = "usercontroller/delete/$1";

$route['permission'] = "permissioncontroller/index";
$route['permissionCreate'] = "permissioncontroller/create";
$route['permissionAdd']['post'] = "permissioncontroller/store"; //add to db
$route['permissionEdit/(:any)'] = "permissioncontroller/edit/$1";
$route['permissionUpdate/(:any)']= "permissioncontroller/update/$1";
$route['permissionDelete/(:any)'] = "permissioncontroller/delete/$1";


$route['login'] = "Maincontroller/login";
$route['signin'] = "Maincontroller/sigin";
$route['home'] = "Maincontroller/data";
$route['invalid'] = "Maincontroller/invalid";
$route['loginAction'] = "Maincontroller/login_action";
$route['logout'] = "Maincontroller/logout";


$route['upload_image'] = 'ImageUploadController/index';
$route['store_image'] = 'ImageUploadController/store';


