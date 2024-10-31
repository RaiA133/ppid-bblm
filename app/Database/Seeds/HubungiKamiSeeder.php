<?php

namespace App\Database\Seeds;

use App\Models\HubungiKamiModel;
use CodeIgniter\Database\Seeder;
use CodeIgniter\I18n\Time;
use CodeIgniter\Test\Fabricator;

class HubungiKamiSeeder extends Seeder
{
  public function run()
  {
    $fabricator = new Fabricator(HubungiKamiModel::class, null, 'id_ID');
    $fabricator->setUnique('nama');
    $fabricator->setUnique('alamat');
    $fabricator->setOptional('updated_at');
    $data = $fabricator->make(10);

    $orangModel = new HubungiKamiModel();
    $orangModel->insertBatch($data);
  }
}
