<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
//$routes->get('/', 'Home::index');
$routes->get('/', 'LoginController::index');
$routes->post('/login', 'LoginController::login');
$routes->get('/logout', 'LoginController::logout');

$routes->get('/homepage', 'Home::index');
$routes->get('/addcustomer', 'AddCustomerController::index');
$routes->post('/savecustomer', 'AddCustomerController::savecustomer');
$routes->get('/customerdelete/(:num)', 'AddCustomerController::deletecustomer/$1');
$routes->get('/customerview/(:num)', 'AddCustomerController::customerview/$1');
$routes->get('/customereditview/(:num)', 'AddCustomerController::customereditview/$1');
$routes->post('/editcustomer/(:num)', 'AddCustomerController::editcustomer/$1');
