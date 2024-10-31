<?php

namespace App\Database\Seeds\InformasiPublik;

use CodeIgniter\Database\Seeder;
use CodeIgniter\I18n\Time;

class InformasiSetiapSaatJudulSeeder extends Seeder
{
  public function run()
  {
    $data = [
      [
        'judul'       => 'Prosedur Penanganan Keadaan Darurat',
        'created_at'  => Time::now(),
        'updated_at'  => Time::now(),
      ],
      [
        'judul'       => 'Perjanjian Kerja Sama',
        'created_at'  => Time::now(),
        'updated_at'  => Time::now(),
      ],
      [
        'judul'       => 'Standar Pelayanan, SPM dan Tarif Layanan BBSPJILM',
        'created_at'  => Time::now(),
        'updated_at'  => Time::now(),
      ],
      [
        'judul'       => 'Jurnal Metal Indonesia',
        'created_at'  => Time::now(),
        'updated_at'  => Time::now(),
      ],
      [
        'judul'       => 'Brosur Pelayanan Jasa BBSPJILM',
        'created_at'  => Time::now(),
        'updated_at'  => Time::now(),
      ],
    ];

    $this->db->table('informasi_setiap_saat_judul')->insertBatch($data);
  }
}
