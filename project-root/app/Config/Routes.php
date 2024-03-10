<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/login', 'Home::index');
$routes->get('/index', "Main::index");
$routes->get('/register', 'Register::index');
$routes->post('/register', 'Register::register');
