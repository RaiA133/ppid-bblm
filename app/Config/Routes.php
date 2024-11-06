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

$routes->get('/admin/informasi-serta-merta', 'Pages\Admin\InformasiPublik\InformasiSertaMerta::index', ['filter' => 'role:admin,superadmin']);
$routes->post('/api/admin/informasi-serta-merta/upload-image', 'Pages\Admin\InformasiPublik\InformasiSertaMerta::uploadImage', ['filter' => 'role:admin,superadmin']);
$routes->post('/api/admin/informasi-serta-merta/edit/(:num)', 'Pages\Admin\InformasiPublik\InformasiSertaMerta::indexUpdate/$1', ['filter' => 'role:admin,superadmin']);
$routes->delete('/api/admin/informasi-serta-merta/delete-image/(:num)', 'Pages\Admin\InformasiPublik\InformasiSertaMerta::linkGambarDelete/$1', ['filter' => 'role:admin,superadmin']);

// STANDAR LAYANAN
$routes->get('/tata-cara-permohonan-informasi', 'Pages\User\StandarLayanan\TataCaraPermohonanInformasi::TataCaraPermohonanInformasi');
$routes->get('/mekanisme-keberatan', 'Pages\User\StandarLayanan\MekanismeKeberatan::MekanismeKeberatan');
$routes->get('/mekanisme-permohonan-penyelesaian-sengketa', 'Pages\User\StandarLayanan\MekanismePermohonanPenyelesaianSengketa::MekanismePermohonanPenyelesaianSengketa');
$routes->get('/maklumat-pelayanan', 'Pages\User\StandarLayanan\MaklumatPelayanan::MaklumatPelayanan');
$routes->get('/standar-biaya-pelayanan', 'Pages\User\StandarLayanan\StandarBiayaPelayanan::StandarBiayaPelayanan');
$routes->get('/waktu-pelayanan', 'Pages\User\StandarLayanan\WaktuPelayanan::WaktuPelayanan');

$routes->get('/admin/tata-cara-permohonan-informasi', 'Pages\Admin\StandarLayanan\TataCaraPermohonanInformasi::index', ['filter' => 'role:admin,superadmin']);
$routes->post('/api/admin/tata-cara-permohonan-informasi/upload-image', 'Pages\Admin\StandarLayanan\TataCaraPermohonanInformasi::uploadImage', ['filter' => 'role:admin,superadmin']);
$routes->post('/api/admin/tata-cara-permohonan-informasi/edit/(:num)', 'Pages\Admin\StandarLayanan\TataCaraPermohonanInformasi::indexUpdate/$1', ['filter' => 'role:admin,superadmin']);
$routes->delete('/api/admin/tata-cara-permohonan-informasi/delete-image/(:num)', 'Pages\Admin\StandarLayanan\TataCaraPermohonanInformasi::linkGambarDelete/$1', ['filter' => 'role:admin,superadmin']);

$routes->get('/admin/mekanisme-keberatan', 'Pages\Admin\StandarLayanan\MekanismeKeberatan::index', ['filter' => 'role:admin,superadmin']);
$routes->post('/api/admin/mekanisme-keberatan/upload-image', 'Pages\Admin\StandarLayanan\MekanismeKeberatan::uploadImage', ['filter' => 'role:admin,superadmin']);
$routes->post('/api/admin/mekanisme-keberatan/edit/(:num)', 'Pages\Admin\StandarLayanan\MekanismeKeberatan::indexUpdate/$1', ['filter' => 'role:admin,superadmin']);
$routes->delete('/api/admin/mekanisme-keberatan/delete-image/(:num)', 'Pages\Admin\StandarLayanan\MekanismeKeberatan::linkGambarDelete/$1', ['filter' => 'role:admin,superadmin']);

$routes->get('/admin/mekanisme-permohonan-penyelesaian-sengketa', 'Pages\Admin\StandarLayanan\MekanismePermohonanPenyelesaianSengketa::index', ['filter' => 'role:admin,superadmin']);
$routes->post('/api/admin/mekanisme-permohonan-penyelesaian-sengketa/upload-image', 'Pages\Admin\StandarLayanan\MekanismePermohonanPenyelesaianSengketa::uploadImage', ['filter' => 'role:admin,superadmin']);
$routes->post('/api/admin/mekanisme-permohonan-penyelesaian-sengketa/edit/(:num)', 'Pages\Admin\StandarLayanan\MekanismePermohonanPenyelesaianSengketa::indexUpdate/$1', ['filter' => 'role:admin,superadmin']);
$routes->delete('/api/admin/mekanisme-permohonan-penyelesaian-sengketa/delete-image/(:num)', 'Pages\Admin\StandarLayanan\MekanismePermohonanPenyelesaianSengketa::linkGambarDelete/$1', ['filter' => 'role:admin,superadmin']);

$routes->get('/admin/maklumat-pelayanan', 'Pages\Admin\StandarLayanan\MaklumatPelayanan::index', ['filter' => 'role:admin,superadmin']);
$routes->post('/api/admin/maklumat-pelayanan/upload-image', 'Pages\Admin\StandarLayanan\MaklumatPelayanan::uploadImage', ['filter' => 'role:admin,superadmin']);
$routes->post('/api/admin/maklumat-pelayanan/edit/(:num)', 'Pages\Admin\StandarLayanan\MaklumatPelayanan::indexUpdate/$1', ['filter' => 'role:admin,superadmin']);
$routes->delete('/api/admin/maklumat-pelayanan/delete-image/(:num)', 'Pages\Admin\StandarLayanan\MaklumatPelayanan::linkGambarDelete/$1', ['filter' => 'role:admin,superadmin']);

$routes->get('/admin/standar-biaya-pelayanan', 'Pages\Admin\StandarLayanan\StandarBiayaPelayanan::index', ['filter' => 'role:admin,superadmin']);
$routes->post('/api/admin/standar-biaya-pelayanan/upload-image', 'Pages\Admin\StandarLayanan\StandarBiayaPelayanan::uploadImage', ['filter' => 'role:admin,superadmin']);
$routes->post('/api/admin/standar-biaya-pelayanan/edit/(:num)', 'Pages\Admin\StandarLayanan\StandarBiayaPelayanan::indexUpdate/$1', ['filter' => 'role:admin,superadmin']);
$routes->delete('/api/admin/standar-biaya-pelayanan/delete-image/(:num)', 'Pages\Admin\StandarLayanan\StandarBiayaPelayanan::linkGambarDelete/$1', ['filter' => 'role:admin,superadmin']);

$routes->get('/admin/waktu-pelayanan', 'Pages\Admin\StandarLayanan\WaktuPelayanan::index', ['filter' => 'role:admin,superadmin']);
$routes->post('/api/admin/waktu-pelayanan/upload-image', 'Pages\Admin\StandarLayanan\WaktuPelayanan::uploadImage', ['filter' => 'role:admin,superadmin']);
$routes->post('/api/admin/waktu-pelayanan/edit/(:num)', 'Pages\Admin\StandarLayanan\WaktuPelayanan::indexUpdate/$1', ['filter' => 'role:admin,superadmin']);
$routes->delete('/api/admin/waktu-pelayanan/delete-image/(:num)', 'Pages\Admin\StandarLayanan\WaktuPelayanan::linkGambarDelete/$1', ['filter' => 'role:admin,superadmin']);

// LAYANAN INFORMASI
$routes->get('/permohonan-informasi', 'Pages\User\LayananInformasi::PermohonanInformasi');
$routes->get('/unit-pelayanan-publik', 'Pages\User\LayananInformasi::UnitPelayananPublik');
$routes->get('/laporan-layanan-informasi', 'Pages\User\LayananInformasi::LaporanLayananInformasi');

$routes->get('/admin/permohonan-informasi', 'Pages\Admin\LayananInformasi\PermohonanInformasi::index', ['filter' => 'role:admin,superadmin']);
$routes->post('/api/permohonan-informasi/create', 'Pages\Admin\LayananInformasi\PermohonanInformasi::indexCreate');
$routes->post('/api/admin/permohonan-informasi/edit/(:num)', 'Pages\Admin\LayananInformasi\PermohonanInformasi::indexUpdate/$1', ['filter' => 'role:admin,superadmin']);
$routes->delete('/api/admin/permohonan-informasi/delete/(:num)', 'Pages\Admin\LayananInformasi\PermohonanInformasi::indexDelete/$1', ['filter' => 'role:admin,superadmin']);

$routes->get('/admin/unit-pelayanan-publik', 'Pages\Admin\LayananInformasi\UnitPelayananPublik::index', ['filter' => 'role:admin,superadmin']);
$routes->post('/api/admin/unit-pelayanan-publik/upload-image', 'Pages\Admin\LayananInformasi\UnitPelayananPublik::uploadImage', ['filter' => 'role:admin,superadmin']);
$routes->post('/api/admin/unit-pelayanan-publik/edit/(:num)', 'Pages\Admin\LayananInformasi\UnitPelayananPublik::indexUpdate/$1', ['filter' => 'role:admin,superadmin']);
$routes->delete('/api/admin/unit-pelayanan-publik/delete-image/(:num)', 'Pages\Admin\LayananInformasi\UnitPelayananPublik::linkGambarDelete/$1', ['filter' => 'role:admin,superadmin']);

$routes->get('/admin/laporan-layanan-informasi', 'Pages\Admin\LayananInformasi\LaporanLayananInformasi::index', ['filter' => 'role:admin,superadmin']);
$routes->post('/api/admin/laporan-layanan-informasi/upload-image', 'Pages\Admin\LayananInformasi\LaporanLayananInformasi::uploadImage', ['filter' => 'role:admin,superadmin']);
$routes->post('/api/admin/laporan-layanan-informasi/edit/(:num)', 'Pages\Admin\LayananInformasi\LaporanLayananInformasi::indexUpdate/$1', ['filter' => 'role:admin,superadmin']);
$routes->delete('/api/admin/laporan-layanan-informasi/delete-image/(:num)', 'Pages\Admin\LayananInformasi\LaporanLayananInformasi::linkGambarDelete/$1', ['filter' => 'role:admin,superadmin']);

// DASHBOARD
$routes->get('/admin', 'Pages\Admin\Dashboard::index', ['filter' => 'role:admin,superadmin']);
$routes->get('/admin/dashboard', 'Pages\Admin\Dashboard::index', ['filter' => 'role:admin,superadmin']);

// DASHBOARD ADMIN PANEL TEMPLATES
$routes->get('/admin/templates', 'Pages\Admin\Templates\Dashboard::index', ['filter' => 'role:admin,superadmin']);
$routes->get('/admin/templates/dashboard', 'Pages\Admin\Templates\Dashboard::index', ['filter' => 'role:admin,superadmin']);
$routes->get('/admin/templates/leads', 'Pages\Admin\Templates\Leads::index', ['filter' => 'role:admin,superadmin']);
$routes->get('/admin/templates/transactions', 'Pages\Admin\Templates\Transactions::index', ['filter' => 'role:admin,superadmin']);
$routes->get('/admin/templates/login', 'Pages\Admin\Templates\Auth::login', ['filter' => 'role:admin,superadmin']);
$routes->get('/admin/templates/analytics', 'Pages\Admin\Templates\Analytics::index', ['filter' => 'role:admin,superadmin']);
$routes->get('/admin/templates/integration', 'Pages\Admin\Templates\Integration::index', ['filter' => 'role:admin,superadmin']);

$routes->get('/admin/templates/login', 'Pages\Admin\Templates\Auth::login', ['filter' => 'role:admin,superadmin']);
$routes->get('/admin/templates/forgot-password', 'Pages\Admin\Templates\Auth::forgotPassword', ['filter' => 'role:admin,superadmin']);
$routes->get('/admin/templates/blank-page', 'Pages\Admin\Templates\Error::blankPage', ['filter' => 'role:admin,superadmin']);
$routes->get('/admin/templates/404', 'Pages\Admin\Templates\Error::notFound404', ['filter' => 'role:admin,superadmin']);

$routes->get('/admin/profile', 'Pages\Admin\Profile::index', ['filter' => 'role:admin,superadmin']);
$routes->post('/api/admin/profil/user/edit/(:num)', 'Pages\Admin\Profile::indexUpdate/$1', ['filter' => 'role:admin,superadmin']);
$routes->delete('/api/admin/profil/user/delete-profile/(:num)', 'Pages\Admin\Profile::profilePicDelete/$1', ['filter' => 'role:admin,superadmin']);

$routes->get('/admin/admin-management', 'Pages\Admin\SuperAdmin\AdminManagement::index', ['filter' => 'role:superadmin']);
$routes->post('/api/admin/admin-management/edit/(:num)', 'Pages\Admin\SuperAdmin\AdminManagement::indexUpdate/$1', ['filter' => 'role:superadmin']);
$routes->delete('/api/admin/admin-management/delete/(:num)', 'Pages\Admin\SuperAdmin\AdminManagement::indexDelete/$1', ['filter' => 'role:superadmin']);

$routes->get('/admin/informasi-setiap-saat', 'Pages\Admin\InformasiPublik\InformasiSetiapSaat::index');
$routes->post('/api/admin/informasi-setiap-saat/create', 'Pages\Admin\InformasiPublik\InformasiSetiapSaat::indexCreate');
$routes->post('/api/admin/informasi-setiap-saat/edit/(:num)', 'Pages\Admin\InformasiPublik\InformasiSetiapSaat::indexUpdate/$1');
$routes->delete('/api/admin/informasi-setiap-saat/delete/(:num)', 'Pages\Admin\InformasiPublik\InformasiSetiapSaat::indexDelete/$1');
$routes->get('/admin/informasi-setiap-saat/manage-judul', 'Pages\Admin\InformasiPublik\InformasiSetiapSaat::infomasiSetiapSaatJudul');
$routes->post('/api/admin/informasi-setiap-saat/manage-judul/create', 'Pages\Admin\InformasiPublik\InformasiSetiapSaat::infomasiSetiapSaatJudulCreate');
$routes->post('/api/admin/informasi-setiap-saat/manage-judul/edit/(:num)', 'Pages\Admin\InformasiPublik\InformasiSetiapSaat::infomasiSetiapSaatJudulUpdate/$1');
$routes->delete('/api/admin/informasi-setiap-saat/manage-judul/delete/(:num)', 'Pages\Admin\InformasiPublik\InformasiSetiapSaat::infomasiSetiapSaatJudulDelete/$1');
$routes->get('/admin/regulasi', 'Pages\Admin\Regulasi::index', ['filter' => 'role:admin,superadmin']);
$routes->post('/api/admin/regulasi/create', 'Pages\Admin\Regulasi::indexCreate', ['filter' => 'role:admin,superadmin']);
$routes->post('/api/admin/regulasi/edit/(:num)', 'Pages\Admin\Regulasi::indexUpdate/$1', ['filter' => 'role:admin,superadmin']);
$routes->delete('/api/admin/regulasi/delete/(:num)', 'Pages\Admin\Regulasi::indexDelete/$1', ['filter' => 'role:admin,superadmin']);

$routes->get('/admin/profil', 'Pages\Admin\Profil::index', ['filter' => 'role:admin,superadmin']);
$routes->post('/api/admin/profil/edit/(:num)', 'Pages\Admin\Profil::indexUpdate/$1', ['filter' => 'role:admin,superadmin']);
$routes->post('/api/admin/profil/upload-image', 'Pages\Admin\Profil::uploadImage', ['filter' => 'role:admin,superadmin']);

$routes->get('/admin/informasi-berkala', 'Pages\Admin\InformasiPublik\InformasiBerkala::index', ['filter' => 'role:admin,superadmin']);
$routes->post('/api/admin/informasi-berkala/create', 'Pages\Admin\InformasiPublik\InformasiBerkala::indexCreate', ['filter' => 'role:admin,superadmin']);
$routes->post('/api/admin/informasi-berkala/edit/(:num)', 'Pages\Admin\InformasiPublik\InformasiBerkala::indexUpdate/$1', ['filter' => 'role:admin,superadmin']);
$routes->delete('/api/admin/informasi-berkala/delete/(:num)', 'Pages\Admin\InformasiPublik\InformasiBerkala::indexDelete/$1', ['filter' => 'role:admin,superadmin']);
$routes->get('/admin/informasi-berkala/manage-judul', 'Pages\Admin\InformasiPublik\InformasiBerkala::infomasiBerkalaJudul', ['filter' => 'role:admin,superadmin']);
$routes->post('/api/admin/informasi-berkala/manage-judul/create', 'Pages\Admin\InformasiPublik\InformasiBerkala::infomasiBerkalaJudulCreate', ['filter' => 'role:admin,superadmin']);
$routes->post('/api/admin/informasi-berkala/manage-judul/edit/(:num)', 'Pages\Admin\InformasiPublik\InformasiBerkala::infomasiBerkalaJudulUpdate/$1', ['filter' => 'role:admin,superadmin']);
$routes->delete('/api/admin/informasi-berkala/manage-judul/delete/(:num)', 'Pages\Admin\InformasiPublik\InformasiBerkala::infomasiBerkalaJudulDelete/$1', ['filter' => 'role:admin,superadmin']);

$routes->get('/admin/informasi-setiap-saat', 'Pages\Admin\InformasiPublik\InformasiSetiapSaat::index', ['filter' => 'role:admin,superadmin']);
$routes->post('/api/admin/informasi-setiap-saat/create', 'Pages\Admin\InformasiPublik\InformasiSetiapSaat::indexCreate', ['filter' => 'role:admin,superadmin']);
$routes->post('/api/admin/informasi-setiap-saat/edit/(:num)', 'Pages\Admin\InformasiPublik\InformasiSetiapSaat::indexUpdate/$1', ['filter' => 'role:admin,superadmin']);
$routes->delete('/api/admin/informasi-setiap-saat/delete/(:num)', 'Pages\Admin\InformasiPublik\InformasiSetiapSaat::indexDelete/$1', ['filter' => 'role:admin,superadmin']);
$routes->get('/admin/informasi-setiap-saat/manage-judul', 'Pages\Admin\InformasiPublik\InformasiSetiapSaat::infomasiSetiapSaatJudul', ['filter' => 'role:admin,superadmin']);
$routes->post('/api/admin/informasi-setiap-saat/manage-judul/create', 'Pages\Admin\InformasiPublik\InformasiSetiapSaat::infomasiSetiapSaatJudulCreate', ['filter' => 'role:admin,superadmin']);
$routes->post('/api/admin/informasi-setiap-saat/manage-judul/edit/(:num)', 'Pages\Admin\InformasiPublik\InformasiSetiapSaat::infomasiSetiapSaatJudulUpdate/$1', ['filter' => 'role:admin,superadmin']);
$routes->delete('/api/admin/informasi-setiap-saat/manage-judul/delete/(:num)', 'Pages\Admin\InformasiPublik\InformasiSetiapSaat::infomasiSetiapSaatJudulDelete/$1', ['filter' => 'role:admin,superadmin']);

$routes->get('/admin/hubungi-kami', 'Pages\Admin\HubungiKami::index', ['filter' => 'role:admin,superadmin']);
$routes->post('/api/hubungi-kami/create', 'Pages\Admin\HubungiKami::indexCreate');
$routes->post('/api/admin/hubungi-kami/edit/(:num)', 'Pages\Admin\HubungiKami::indexUpdate/$1', ['filter' => 'role:admin,superadmin']);
$routes->delete('/api/admin/hubungi-kami/delete/(:num)', 'Pages\Admin\HubungiKami::indexDelete/$1', ['filter' => 'role:admin,superadmin']);
