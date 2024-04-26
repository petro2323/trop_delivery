<?php

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
$routes->get('/dashboard', 'Dashboard::index');
