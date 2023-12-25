<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
//vendor
$routes->get('/', 'Home::index');
$routes->match(['post', 'get'],'/login', 'UserController::login');
$routes->match(['post', 'get'],'/register', 'UserController::register');
$routes->match(['post', 'get'],'/User', 'UserController::User');
$routes->post('/logout', 'UserController::logout');
$routes->match(['post', 'get'],'/addProduct', 'UserController::addProduct');
$routes->get('/getProducts/(:num)', 'UserController::showProductsByVendorId/$1');
$routes->get('/getVendorsData/(:num)', 'UserController::getVendorsData/$1');

$routes->post('updateProduct/(:num)', 'UserController::updateProduct/$1');


//admin
$routes->get('/getUserData', 'UserController::getUserData');
$routes->get('/getVendorData', 'UserController::getVendorData');
$routes->post('approved/(:num)', 'UserController::approved/$1');


//products
$routes->get('/getProductVendorData', 'UserController::getProductsWithVendorInfo');

$routes->get('/index', 'IndexController::index');
