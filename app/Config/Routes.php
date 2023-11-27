<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Auth::index');
$routes->get('auth', 'Auth::index');
$routes->post('login', 'Auth::login');
$routes->get('logout', 'Auth::logout');
$routes->post('register', 'Auth::register');
$routes->get('admin/dasboard', 'admin\Dasboard::index');

// document admin
$routes->get('admin/documents', 'admin\Document::index');
$routes->get('admin/document/delete/(:num)', 'admin\Document::delete/$1');

// edit user admin
$routes->get('admin/users', 'admin\User::index');
$routes->get('admin/user/delete/(:num)', 'admin\User::delete/$1 ');
// edit user
$routes->post('admin/user/edit/(:num)', 'admin\User::edit/$1');
$routes->get('admin/user/edit/(:num)', 'admin\User::viewedit/$1');

// profile admin
$routes->get('admin/profile', 'admin\Profile::index');

// edit profile admin
$routes->get('admin/profile/edit', 'admin\EditProfile::index');
$routes->post('admin/profile/edit', 'admin\EditProfile::edit');

// dasboard customer
$routes->get('customer/dasboard', 'customer\Dasboard::index');
$routes->get('customer/documents', 'customer\Document::index');
// document upload cutomer
$routes->get('customer/document/upload', 'customer\Uploade::index');
$routes->post('customer/document/upload', 'customer\Uploade::uploadDocument');

// document delete 
$routes->get('customer/document/delete/(:num)', 'customer\Document::delete/$1');


$routes->get('customer/scan', 'customer\QrController::index');
$routes->post('customer/scan', 'customer\QrController::upload');

// logs document
$routes->get('logs/(:num)', 'customer\LogActivity::index/$1');

// profile customer
$routes->get('customer/profile', 'customer\Profile::index');

// profile customete profile
$routes->get('customer/profile/edit', 'customer\EditProfile::index');
$routes->post('customer/profile/edit', 'customer\EditProfile::edit');

// approve
$routes->get('approve/(:num)', 'customer\Approved::approve/$1');
