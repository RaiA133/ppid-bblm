<?php

namespace App\Database\Seeds;

use App\Models\PagesViewModel;
use CodeIgniter\Database\Seeder;
use CodeIgniter\Test\Fabricator;

class PagesViewSeeder extends Seeder
{
  public function run()
  {
    $fabricator = new Fabricator(PagesViewModel::class, null, 'id_ID');
    $fabricator->setUnique('ip_address');
    $fabricator->setUnique('email');
    $fabricator->setOptional('updated_at');
    $data = $fabricator->make(120);

    $orangModel = new PagesViewModel();
    $orangModel->insertBatch($data);
  }
}
