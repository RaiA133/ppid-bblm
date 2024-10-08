<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Pages\Home::index');
$routes->get('/profil', 'Pages\Profil::index');
$routes->get('/regulasi', 'Pages\Regulasi::index');
$routes->get('/hubungi-kami', 'Pages\HubungiKami::index');

// INFORMASI PUBLIK
$routes->get('/informasi-berkala', 'Pages\InformasiPublik::InformasiBerkala');
$routes->get('/informasi-setiap-saat', 'Pages\InformasiPublik::InformasiSetiapSaat');
$routes->get('/informasi-serta-merta', 'Pages\InformasiPublik::InformasiSertaMerta');

// STANDAR LAYANAN
$routes->get(from: '/tata-cara-permohonan-informasi', to: 'Pages\StandarLayanan::TataCaraPermohonanInformasi');
$routes->get(from: '/mekanisme-keberatan', to: 'Pages\StandarLayanan::MekanismeKeberatan');
$routes->get(from: '/mekanisme-permohonan-penyelesaian-sengketa', to: 'Pages\StandarLayanan::MekanismePermohonanPenyelesaianSengketa');
$routes->get(from: '/maklumat-pelayanan', to: 'Pages\StandarLayanan::MaklumatPelayanan');
$routes->get(from: '/standar-biaya-pelayanan', to: 'Pages\StandarLayanan::StandarBiayaPelayanan');
$routes->get(from: '/waktu-pelayanan', to: 'Pages\StandarLayanan::WaktuPelayanan');

// LAYANAN INFORMASI
$routes->get('/permohonan-informasi', 'Pages\LayananInformasi::PermohonanInformasi');
$routes->get('/unit-pelayanan-publik', 'Pages\LayananInformasi::UnitPelayananPublik');
$routes->get('/laporan-layanan-informasi', 'Pages\LayananInformasi::LaporanLayananInformasi');
