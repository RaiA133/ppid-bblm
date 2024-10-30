<?php

namespace App\Database\Seeds\StandarLayanan;

use CodeIgniter\Database\Seeder;
use CodeIgniter\I18n\Time;

class StandarBiayaPelayananSeeder extends Seeder
{
  public function run()
  {
    $data = [
      [
        'link_gambar'     => '[]',
        'link_gambar_content' => '[]',
        'content'         => '
      <h3 class="font-semibold mb-4">BIAYA TARIF</h3>
      <p class="leading-relaxed">Pejabat Pengelola Informasi dan Dokumentasi menyediakan informasi publik secara gratis (tidak dipungut biaya), sedangkan untuk penggandaan atau perekaman, pemohon informasi publik dapat melakukan panggandaan dengan fotocopy sendiri atau menyediakan CD/DVD/Flashdisk untuk merekam data dan informasinya.</p>',
        'created_at'      => Time::now(),
        'updated_at'      => Time::now(),
      ],
    ];
    $this->db->table('standar_biaya_pelayanan')->insertBatch($data);
  }
}
