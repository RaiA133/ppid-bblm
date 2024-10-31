<?php

namespace App\Database\Seeds\StandarLayanan;

use CodeIgniter\Database\Seeder;
use CodeIgniter\I18n\Time;

class MekanismePermohonanPenyelesaianSengketaSeeder extends Seeder
{
  public function run()
  {
    $data = [
      [
        'link_gambar'     => 'MekanismePermohonanPenyelesaianSengketa1.jpg',
        'link_gambar_content' => '[MekanismePermohonanPenyelesaianSengketa2.jpg, MekanismePermohonanPenyelesaianSengketa3.jpg]',
        'content'         => '
          <figure class="flex justify-center  p-5">
            <img class=" w-full h-full"
            src="' . base_url('img/standarLayanan/mekanismePermohonanPenyelesaianSengketa/MekanismePermohonanPenyelesaianSengketa2.jpg') . '"
            alt="MekanismePermohonanPenyelesaianSengketa2" />
          </figure>
          <figure class="flex justify-center p-5">
            <img class=" w-full h-full"
            src="' . base_url('img/standarLayanan/mekanismePermohonanPenyelesaianSengketa/MekanismePermohonanPenyelesaianSengketa3.jpg') . '"
            alt="MekanismePermohonanPenyelesaianSengketa3" />
          </figure>',
        'created_at'      => Time::now(),
        'updated_at'      => Time::now(),
      ],
    ];
    $this->db->table('mekanisme_permohonan_penyelesaian_sengketa')->insertBatch($data);
  }
}
