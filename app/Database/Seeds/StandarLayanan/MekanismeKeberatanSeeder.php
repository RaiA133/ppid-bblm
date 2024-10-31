<?php

namespace App\Database\Seeds\StandarLayanan;

use CodeIgniter\Database\Seeder;
use CodeIgniter\I18n\Time;

class MekanismeKeberatanSeeder extends Seeder
{
  public function run()
  {
    $data = [
      [
        'link_gambar'     => 'MekanismeKeberatan.jpg',
        'link_gambar_content' => '[]',
        'created_at'      => Time::now(),
        'updated_at'      => Time::now(),
      ],
    ];
    $this->db->table('mekanisme_keberatan')->insertBatch($data);
  }
}
