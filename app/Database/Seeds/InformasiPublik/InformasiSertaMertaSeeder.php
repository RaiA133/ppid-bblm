<?php

namespace App\Database\Seeds\InformasiPublik;

use CodeIgniter\Database\Seeder;
use CodeIgniter\I18n\Time;

class InformasiSertaMertaSeeder extends Seeder
{
  public function run()
  {
    $data = [
      [
        'link_gambar_content' => '[]',
        'created_at'      => Time::now(),
        'updated_at'      => Time::now(),
      ],
    ];
    $this->db->table('informasi_serta_merta')->insertBatch($data);
  }
}
