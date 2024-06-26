<?php

use CodeIgniter\Debug\Toolbar\Collectors\History;
use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/login', 'Home::index');
$routes->get('/', "Main::index");
$routes->get('/register', 'Register::index');
$routes->post('/register', 'Register::register');
$routes->post('/login', 'Home::login');
$routes->get('/logout', 'Home::logout');
$routes->get('/history', 'History::index');
$routes->get('/dashboard', 'Dashboard::allFood');
$routes->get('/dashboard/best-selling', 'Dashboard::favoriteFood');
$routes->get('/dashboard/near-me', 'Dashboard::nearUser');
$routes->get('/erase-cookie/(:any)', 'Home::erasecookie/$1');
