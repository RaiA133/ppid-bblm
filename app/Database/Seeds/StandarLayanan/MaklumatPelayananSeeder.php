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
        'link_gambar'     => 'img/standarLayanan/MaklumatPelayanan.png',
        'content'         => '<figure class="lg:w-auto p-0 md:p-10">
        <img src="' . base_url() . 'img/standarLayanan/MaklumatPelayanan.png" alt="MaklumatPelayanan" class="w-full max-w-3xl h-auto mx-auto">
      </figure>',
        'created_at'      => Time::now(),
        'updated_at'      => Time::now(),
      ],
    ];
    $this->db->table('maklumat_pelayanan')->insertBatch($data);
  }
}
