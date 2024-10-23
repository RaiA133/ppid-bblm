<?php

namespace App\Database\Seeds\InformasiPublik;

use CodeIgniter\Database\Seeder;
use CodeIgniter\I18n\Time;

class InformasiBerkalaJudulSeeder extends Seeder
{
  public function run()
  {
    $data = [
      [
        'judul'       => 'Kegiatan dan Kinerja',
        'created_at'  => Time::now(),
        'updated_at'  => Time::now(),
      ],
      [
        'judul'       => 'Laporan Keuangan',
        'created_at'  => Time::now(),
        'updated_at'  => Time::now(),
      ],
      [
        'judul'       => 'Laporan Kepegawaian',
        'created_at'  => Time::now(),
        'updated_at'  => Time::now(),
      ],
      [
        'judul'       => 'Akses Informasi Publik',
        'created_at'  => Time::now(),
        'updated_at'  => Time::now(),
      ],
    ];

    $this->db->table('informasi_berkala_judul')->insertBatch($data);
  }
}
