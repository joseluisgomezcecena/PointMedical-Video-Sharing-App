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
$route['auth/forgot'] = 'auth/forgot';

$route['admin/users/register'] = 'users/register';
$route['admin/users'] = 'users/index';
$route['admin/users/edit/(:any)'] = 'users/edit/$1';
$route['admin/users/delete/(:any)'] = 'users/delete/$1';

$route['admin/profile'] = 'users/profile';


/*********  ROUTES FOR ADMIN  *********/

//categories
$route['admin/categories'] = 'categories/index';
$route['admin/categories/new'] = 'categories/create';
$route['admin/categories/edit/(:any)'] = 'categories/update/$1';
$route['admin/categories/delete/(:any)'] = 'categories/delete/$1';

//subcategories
$route['admin/subcategories'] = 'subcategories/index';
$route['admin/subcategories/new'] = 'subcategories/create';
$route['admin/subcategories/edit/(:any)'] = 'subcategories/update/$1';
$route['admin/subcategories/delete/(:any)'] = 'subcategories/delete/$1';

//products
$route['admin/products'] = 'products/index';
$route['admin/products/new'] = 'products/create';
$route['admin/products/edit/(:any)'] = 'products/edit/$1';
$route['admin/products/delete/(:any)'] = 'products/delete/$1';



//reports.
$route['reports'] = 'reports/index';


/*********  ROUTES FOR CUSTOMER  *********/
$route['details/(:any)'] = 'pages/details/$1';
$route['orders/view/(:any)'] = 'pages/order_confirmation/$1';
$route['order/(:any)'] = 'pages/order/$1';

//pages
$route['(:any)'] = 'pages/view/$1';
$route['default_controller'] = 'pages/view';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
