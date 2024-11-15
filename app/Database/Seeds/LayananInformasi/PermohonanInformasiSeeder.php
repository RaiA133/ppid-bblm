<?php

namespace App\Database\Seeds\LayananInformasi;

use App\Models\LayananInformasi\PermohonanInformasiModel;
use CodeIgniter\Database\Seeder;
use CodeIgniter\Test\Fabricator;

class PermohonanInformasiSeeder extends Seeder
{
  public function run()
  {
    $fabricator = new Fabricator(PermohonanInformasiModel::class, null, 'id_ID');
    $fabricator->setUnique('nama');
    $fabricator->setUnique('no_id');
    $fabricator->setUnique('alamat');
    $fabricator->setUnique('email');
    $fabricator->setUnique('no_telp');
    $fabricator->setOptional('updated_at');
    $data = $fabricator->make(10);

    $orangModel = new PermohonanInformasiModel();
    $orangModel->insertBatch($data);
  }
}
