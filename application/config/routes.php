<?php
defined('BASEPATH') or exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
*/

/*********  ROUTES FOR AUTH.  *********/
$route['auth/login'] = 'auth/login';
$route['auth/logout'] = 'auth/logout';


$route['admin/users/register'] = 'users/register';
$route['admin/users'] = 'users/index';
$route['admin/users/edit/(:any)'] = 'users/edit/$1';
$route['admin/users/delete/(:any)'] = 'users/delete/$1';

$route['admin/profile'] = 'users/profile';


/*********  ROUTES FOR ADMIN  *********/
$route['admin'] = 'admins/index';
$route['admin/uploads/new'] = 'videouploads/create';
$route['admin/uploads/edit/(:any)'] = 'videouploads/edit/$1';
$route['admin/uploads/delete/(:any)'] = 'videouploads/delete/$1';
$route['admin/uploads/(:any)'] = 'videouploads/view/$1';
$route['admin/uploads'] = 'videouploads/index';

$route['admin/categories'] = 'categories/index';
$route['admin/categories/new'] = 'categories/create';
$route['admin/categories/edit/(:any)'] = 'categories/update/$1';
$route['admin/categories/delete/(:any)'] = 'categories/delete/$1';



/********* OPEN  ROUTES *********/
$route['videos/all'] = 'pages/view';
$route['videos/(:any)'] = 'videos/view/$1';
$route['category/(:any)'] = 'categories/view_by_category/$1';


//reports.
$route['reports'] = 'reports/index';



//pages
$route['(:any)'] = 'pages/view/$1';
$route['default_controller'] = 'pages/view';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
