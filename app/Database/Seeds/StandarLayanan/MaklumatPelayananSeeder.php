<?php

namespace App\Database\Seeds\StandarLayanan;

use CodeIgniter\Database\Seeder;
use CodeIgniter\I18n\Time;

class MaklumatPelayananSeeder extends Seeder
{
  public function run()
  {
    $data = [
      [
        'link_gambar'     => 'MaklumatPelayanan.png',
        'link_gambar_content' => '[]',
        'created_at'      => Time::now(),
        'updated_at'      => Time::now(),
      ],
    ];
    $this->db->table('maklumat_pelayanan')->insertBatch($data);
  }
}
