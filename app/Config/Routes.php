<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Pages\Home::index');
$routes->get('/profil', 'Pages\Profil::index');
$routes->get('/regulasi', 'Pages\Regulasi::index');

// INFORMASI PUBLIK
$routes->get('/informasi-berkala', 'Pages\InformasiPublik::InformasiBerkala');
$routes->get('/informasi-setiap-saat', 'Pages\InformasiPublik::InformasiSetiapSaat');
$routes->get('/informasi-serta-merta', 'Pages\InformasiPublik::InformasiSertaMerta');
