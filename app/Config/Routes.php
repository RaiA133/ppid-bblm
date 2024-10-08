<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Pages\User\Home::index');
$routes->get('/profil', 'Pages\User\Profil::index');
$routes->get('/regulasi', 'Pages\User\Regulasi::index');
$routes->get('/hubungi-kami', 'Pages\User\HubungiKami::index');

// INFORMASI PUBLIK
$routes->get('/informasi-berkala', 'Pages\User\InformasiPublik::InformasiBerkala');
$routes->get('/informasi-setiap-saat', 'Pages\User\InformasiPublik::InformasiSetiapSaat');
$routes->get('/informasi-serta-merta', 'Pages\User\InformasiPublik::InformasiSertaMerta');

// STANDAR LAYANAN
$routes->get('/tata-cara-permohonan-informasi', 'Pages\User\StandarLayanan::TataCaraPermohonanInformasi');
$routes->get('/mekanisme-keberatan', 'Pages\User\StandarLayanan::MekanismeKeberatan');
$routes->get('/mekanisme-permohonan-penyelesaian-sengketa', 'Pages\User\StandarLayanan::MekanismePermohonanPenyelesaianSengketa');
$routes->get('/maklumat-pelayanan', 'Pages\User\StandarLayanan::MaklumatPelayanan');
$routes->get('/standar-biaya-pelayanan', 'Pages\User\StandarLayanan::StandarBiayaPelayanan');
$routes->get('/waktu-pelayanan', 'Pages\User\StandarLayanan::WaktuPelayanan');

// LAYANAN INFORMASI
$routes->get('/permohonan-informasi', 'Pages\User\LayananInformasi::PermohonanInformasi');
$routes->get('/unit-pelayanan-publik', 'Pages\User\LayananInformasi::UnitPelayananPublik');
$routes->get('/laporan-layanan-informasi', 'Pages\User\LayananInformasi::LaporanLayananInformasi');
