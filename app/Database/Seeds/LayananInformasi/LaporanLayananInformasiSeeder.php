<?php

namespace App\Database\Seeds\LayananInformasi;

use CodeIgniter\Database\Seeder;
use CodeIgniter\I18n\Time;

class LaporanLayananInformasiSeeder extends Seeder
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
    $this->db->table('laporan_layanan_informasi')->insertBatch($data);
  }
}
