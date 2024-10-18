<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;
use CodeIgniter\I18n\Time;

class MaklumatPelayananSeeder extends Seeder
{
  public function run()
  {
    $data = [
      'link_drive' => 'https://drive.google.com/file/d/1Gn5E007lISMet2d24OOBzC9WrX8Fql__/view?usp=sharing',
      'created_at'  => Time::now(),
      'updated_at'  => Time::now(),
    ];

    $this->db->table('maklumatpelayanan')->insert($data);
  }
}
