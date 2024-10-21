<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;
use CodeIgniter\I18n\Time;

class MaklumatPelayananSeeder extends Seeder
{
  public function run()
  {
    $data = [
      'link_gambar' => 'img/standarLayanan/MaklumatPelayanan.png',
      'created_at'  => Time::now(),
      'updated_at'  => Time::now(),
    ];

    $this->db->table('maklumat_pelayanan')->insert($data);
  }
}
