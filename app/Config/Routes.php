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
$routes->get('/maklumat-pelayanan', 'Pages\User\MaklumatPelayanan::MaklumatPelayanan');
$routes->get('/standar-biaya-pelayanan', 'Pages\User\StandarLayanan::StandarBiayaPelayanan');
$routes->get('/waktu-pelayanan', 'Pages\User\StandarLayanan::WaktuPelayanan');

$routes->get('/admin/maklumat-pelayanan', 'Pages\Admin\StandarLayanan\MaklumatPelayanan::index');
$routes->post('/api/admin/maklumat-pelayanan/upload-image', 'Pages\Admin\StandarLayanan\MaklumatPelayanan::uploadImage');
$routes->post('/api/admin/maklumat-pelayanan/create', 'Pages\Admin\StandarLayanan\MaklumatPelayanan::indexCreate');
$routes->post('/api/admin/maklumat-pelayanan/edit/(:num)', 'Pages\Admin\StandarLayanan\MaklumatPelayanan::indexUpdate/$1');
$routes->delete('/api/admin/maklumat-pelayanan/delete/(:num)', 'Pages\Admin\StandarLayanan\MaklumatPelayanan::indexDelete/$1');

// LAYANAN INFORMASI
$routes->get('/permohonan-informasi', 'Pages\User\LayananInformasi::PermohonanInformasi');
$routes->get('/unit-pelayanan-publik', 'Pages\User\LayananInformasi::UnitPelayananPublik');
$routes->get('/laporan-layanan-informasi', 'Pages\User\LayananInformasi::LaporanLayananInformasi');

// DASHBOARD ADMIN PANEL
$routes->get('/admin', 'Pages\Admin\Dashboard::index');
$routes->get('/admin/dashboard', 'Pages\Admin\Dashboard::index');
$routes->get('/admin/leads', 'Pages\Admin\Leads::index');
$routes->get('/admin/transactions', 'Pages\Admin\Transactions::index');
$routes->get('/admin/login', 'Pages\Admin\Auth::login');
$routes->get('/admin/analytics', 'Pages\Admin\Analytics::index');
$routes->get('/admin/integration', 'Pages\Admin\Integration::index');
$routes->get('/admin/profile', 'Pages\Admin\Profile::index');
$routes->get('/admin/login', 'Pages\Admin\Auth::login');
$routes->get('/admin/forgot-password', 'Pages\Admin\Auth::forgotPassword');
$routes->get('/admin/blank-page', 'Pages\Admin\Error::blankPage');
$routes->get('/admin/404', 'Pages\Admin\Error::notFound404');

$routes->get('/admin/regulasi', 'Pages\Admin\Regulasi::index');
$routes->post('/api/admin/regulasi/create', 'Pages\Admin\Regulasi::indexCreate');
$routes->post('/api/admin/regulasi/edit/(:num)', 'Pages\Admin\Regulasi::indexUpdate/$1');
$routes->delete('/api/admin/regulasi/delete/(:num)', 'Pages\Admin\Regulasi::indexDelete/$1');

$routes->get('/admin/profil', 'Pages\Admin\Profil::index');
$routes->post('/api/admin/profil/edit/(:num)', 'Pages\Admin\Profil::indexUpdate/$1');
$routes->post('/api/admin/profil/upload-image', 'Pages\Admin\Profil::uploadImage');

$routes->get('/admin/informasi-berkala', 'Pages\Admin\InformasiPublik\InformasiBerkala::index');
$routes->post('/api/admin/informasi-berkala/create', 'Pages\Admin\InformasiPublik\InformasiBerkala::indexCreate');
$routes->post('/api/admin/informasi-berkala/edit/(:num)', 'Pages\Admin\InformasiPublik\InformasiBerkala::indexUpdate/$1');
$routes->delete('/api/admin/informasi-berkala/delete/(:num)', 'Pages\Admin\InformasiPublik\InformasiBerkala::indexDelete/$1');
$routes->get('/admin/informasi-berkala/manage-judul', 'Pages\Admin\InformasiPublik\InformasiBerkala::infomasiBerkalaJudul');
$routes->post('/api/admin/informasi-berkala/manage-judul/create', 'Pages\Admin\InformasiPublik\InformasiBerkala::infomasiBerkalaJudulCreate');
$routes->post('/api/admin/informasi-berkala/manage-judul/edit/(:num)', 'Pages\Admin\InformasiPublik\InformasiBerkala::infomasiBerkalaJudulUpdate/$1');
$routes->delete('/api/admin/informasi-berkala/manage-judul/delete/(:num)', 'Pages\Admin\InformasiPublik\InformasiBerkala::infomasiBerkalaJudulDelete/$1');

$routes->get('/admin/informasi-setiap-saat', 'Pages\Admin\InformasiPublik\InformasiSetiapSaat::index');
$routes->post('/api/admin/informasi-setiap-saat/create', 'Pages\Admin\InformasiPublik\InformasiSetiapSaat::indexCreate');
$routes->post('/api/admin/informasi-setiap-saat/edit/(:num)', 'Pages\Admin\InformasiPublik\InformasiSetiapSaat::indexUpdate/$1');
$routes->delete('/api/admin/informasi-setiap-saat/delete/(:num)', 'Pages\Admin\InformasiPublik\InformasiSetiapSaat::indexDelete/$1');
$routes->get('/admin/informasi-setiap-saat/manage-judul', 'Pages\Admin\InformasiPublik\InformasiSetiapSaat::infomasiSetiapSaatJudul');
$routes->post('/api/admin/informasi-setiap-saat/manage-judul/create', 'Pages\Admin\InformasiPublik\InformasiSetiapSaat::infomasiSetiapSaatJudulCreate');
$routes->post('/api/admin/informasi-setiap-saat/manage-judul/edit/(:num)', 'Pages\Admin\InformasiPublik\InformasiSetiapSaat::infomasiSetiapSaatJudulUpdate/$1');
$routes->delete('/api/admin/informasi-setiap-saat/manage-judul/delete/(:num)', 'Pages\Admin\InformasiPublik\InformasiSetiapSaat::infomasiSetiapSaatJudulDelete/$1');