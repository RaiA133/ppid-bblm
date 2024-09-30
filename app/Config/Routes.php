<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Pages\Home::index');
$routes->get('/profil', 'Pages\Profil::index');
$routes->get('/regulasi', 'Pages\Regulasi::index');
