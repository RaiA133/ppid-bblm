<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class DatabaseSeeder extends Seeder
{
  public function run()
  {
    // Seed Regulasi and Profil
    $this->call('RegulasiSeeder');
    $this->call('ProfilSeeder');
    // $this->call('HubungiKamiSeeder');
    // $this->call('PagesViewSeeder');

    // Seed Informasi Publik
    $this->call('App\Database\Seeds\InformasiPublik\InformasiBerkalaSeeder');
    $this->call('App\Database\Seeds\InformasiPublik\InformasiBerkalaJudulSeeder');
    $this->call('App\Database\Seeds\InformasiPublik\InformasiSetiapSaatSeeder');
    $this->call('App\Database\Seeds\InformasiPublik\InformasiSetiapSaatJudulSeeder');
    $this->call('App\Database\Seeds\InformasiPublik\InformasiSertaMertaSeeder');

    // Seed Standar Layanan
    $this->call('App\Database\Seeds\StandarLayanan\TataCaraPermohonanInformasiSeeder');
    $this->call('App\Database\Seeds\StandarLayanan\MekanismeKeberatanSeeder');
    $this->call('App\Database\Seeds\StandarLayanan\MekanismePermohonanPenyelesaianSengketaSeeder');
    $this->call('App\Database\Seeds\StandarLayanan\MaklumatPelayananSeeder');
    $this->call('App\Database\Seeds\StandarLayanan\StandarBiayaPelayananSeeder');
    $this->call('App\Database\Seeds\StandarLayanan\WaktuPelayananSeeder');

    // Seed Layanan Informasi
    $this->call('App\Database\Seeds\LayananInformasi\PermohonanInformasiSeeder');
    $this->call('App\Database\Seeds\LayananInformasi\UnitPelayananPublikSeeder');
    $this->call('App\Database\Seeds\LayananInformasi\LaporanLayananInformasiSeeder');

    // Seed Myth Auth
    $this->call('App\Database\Seeds\Myth\AuthGroups');
    $this->call('App\Database\Seeds\Myth\Users');
    $this->call('App\Database\Seeds\Myth\AuthPermissions');
    $this->call('App\Database\Seeds\Myth\AuthGroupsPermissions');
    $this->call('App\Database\Seeds\Myth\AuthGroupsUsers');
  }
}
