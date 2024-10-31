<?php

namespace App\Database\Seeds\InformasiPublik;

use CodeIgniter\Database\Seeder;
use CodeIgniter\I18n\Time;

class InformasiSetiapSaatSeeder extends Seeder
{
  public function run()
  {
    $data = [

      // Brosur Pelayanan Jasa BBSPJILM
      [
        'id_informasi_setiap_saat_judul'  => 5,
        'jenis_informasi'             => 'Lab Kalibrasi',
        'informasi'                   => 'https://drive.google.com/file/d/1AZHHYTtgnqw_LVEPL9bhBlixXmNhJxRs',
        'created_at'                  => Time::now(),
        'updated_at'                  => Time::now(),
      ],
      [
        'id_informasi_setiap_saat_judul'  => 5,
        'jenis_informasi'             => 'Lab Pengujian',
        'informasi'                   => 'https://drive.google.com/file/d/1NgMjeLmny0ZB5JyNgUg54_lpxTA3zq3Z',
        'created_at'                  => Time::now(),
        'updated_at'                  => Time::now(),
      ],
      [
        'id_informasi_setiap_saat_judul'  => 5,
        'jenis_informasi'             => 'Sertifikasi Produk',
        'informasi'                   => 'https://drive.google.com/file/d/1SQO5aSwXAt3f1LgRXbhY202V7uZRKvGn',
        'created_at'                  => Time::now(),
        'updated_at'                  => Time::now(),
      ],
      [
        'id_informasi_setiap_saat_judul'  => 5,
        'jenis_informasi'             => 'Pelatihan Teknis',
        'informasi'                   => 'https://drive.google.com/file/d/1XhjzVJkZ9GVDrk2xb1pqB54Flvfamp1y',
        'created_at'                  => Time::now(),
        'updated_at'                  => Time::now(),
      ],
      [
        'id_informasi_setiap_saat_judul'  => 5,
        'jenis_informasi'             => 'Workshop Pengelasan',
        'informasi'                   => 'https://drive.google.com/file/d/1Qw83pVJbVKoH0Ie8UQdMKFcRZbvzeKOz',
        'created_at'                  => Time::now(),
        'updated_at'                  => Time::now(),
      ],
      [
        'id_informasi_setiap_saat_judul'  => 5,
        'jenis_informasi'             => 'Workshop Pemesinan',
        'informasi'                   => 'https://drive.google.com/file/d/1u2BXmT8a0zzPnisrbQuzqCysFnTBYxLP',
        'created_at'                  => Time::now(),
        'updated_at'                  => Time::now(),
      ],
      [
        'id_informasi_setiap_saat_judul'  => 5,
        'jenis_informasi'             => 'Workshop Pengecoran',
        'informasi'                   => 'https://drive.google.com/file/d/1q3fiWGRsqtv890GlGc6taHRY5_fi8bqp',
        'created_at'                  => Time::now(),
        'updated_at'                  => Time::now(),
      ],
      [
        'id_informasi_setiap_saat_judul'  => 5,
        'jenis_informasi'             => 'Printer 3D',
        'informasi'                   => 'https://drive.google.com/file/d/167EVIvHyO_WG_BW5WnMeK58hSL4sNhXs',
        'created_at'                  => Time::now(),
        'updated_at'                  => Time::now(),
      ],
      [
        'id_informasi_setiap_saat_judul'  => 5,
        'jenis_informasi'             => 'Mesin CNC',
        'informasi'                   => 'https://drive.google.com/file/d/1hzAN2gKo8ZfxiimU-79DzfAHe9Dv9XEy',
        'created_at'                  => Time::now(),
        'updated_at'                  => Time::now(),
      ],
      [
        'id_informasi_setiap_saat_judul'  => 5,
        'jenis_informasi'             => 'Mesin Pakan Ikan',
        'informasi'                   => 'https://drive.google.com/file/d/1gKkzs22n3B25poS_IocDOIoN-thyPxAl',
        'created_at'                  => Time::now(),
        'updated_at'                  => Time::now(),
      ],
      
      // Jurnal Metal Indonesia
      [
        'id_informasi_setiap_saat_judul'  => 4,
        'jenis_informasi'             => 'Link',
        'informasi'                   => 'https://jurnalmetal.or.id/jmi',
        'created_at'                  => Time::now(),
        'updated_at'                  => Time::now(),
      ],

      // Standar Pelayanan, SPM dan Tarif Layanan BBSPJILM
      [
        'id_informasi_setiap_saat_judul'  => 3,
        'jenis_informasi'             => 'PP No 54 Tahun 2021',
        'informasi'                   => 'https://drive.google.com/file/d/16HE3wG2HurcpHs-Bd2TpOCqWV-Utyfwm',
        'created_at'                  => Time::now(),
        'updated_at'                  => Time::now(),
      ],
      [
        'id_informasi_setiap_saat_judul'  => 3,
        'jenis_informasi'             => 'Permenperin No. 19 Tahun 2021',
        'informasi'                   => 'https://drive.google.com/file/d/1VdAUFNBrn2STjoGkZgxHL9O09eBySsIA',
        'created_at'                  => Time::now(),
        'updated_at'                  => Time::now(),
      ],
      [
        'id_informasi_setiap_saat_judul'  => 3,
        'jenis_informasi'             => 'PMK No. 108/PMK.02/2022 Tentang Jenis dan Tarif PNBP yang Bersifat Volatil yang Berlaku pada Kementerian Perindustrian',
        'informasi'                   => 'https://drive.google.com/file/d/1TC2fEFCE6Gne1Y8OF8xDfp7OgjiCAvi1',
        'created_at'                  => Time::now(),
        'updated_at'                  => Time::now(),
      ],
      [
        'id_informasi_setiap_saat_judul'  => 3,
        'jenis_informasi'             => 'SPM Layanan',
        'informasi'                   => 'https://drive.google.com/file/d/1noQzH8U-A3IqHgUqNw8kidkWpnoAQ2YF',
        'created_at'                  => Time::now(),
        'updated_at'                  => Time::now(),
      ],
      [
        'id_informasi_setiap_saat_judul'  => 3,
        'jenis_informasi'             => 'Standar Pelayanan Publik',
        'informasi'                   => 'https://drive.google.com/file/d/1Pcg9YYZs2vXfLGDPq63SdG5zHX91wsBp',
        'created_at'                  => Time::now(),
        'updated_at'                  => Time::now(),
      ],
      [
        'id_informasi_setiap_saat_judul'  => 3,
        'jenis_informasi'             => 'Standar Layanan Informasi Publik',
        'informasi'                   => 'https://drive.google.com/file/d/1PV_dVYHhvQkC71MtLCjrCkBVhYgPpkRC',
        'created_at'                  => Time::now(),
        'updated_at'                  => Time::now(),
      ],

      // Perjanjian Kerja Sama
      [
        'id_informasi_setiap_saat_judul'  => 2,
        'jenis_informasi'             => 'Daftar MoU/Perjanjian Kerja Sama',
        'informasi'                   => 'https://drive.google.com/file/d/1pGCuTJ8JR1Y6fp6pM2jQSIReSKX1UshF',
        'created_at'                  => Time::now(),
        'updated_at'                  => Time::now(),
      ],

      // Prosedur Penanganan Keadaan Darurat
      [
        'id_informasi_setiap_saat_judul'  => 1,
        'jenis_informasi'             => 'Prosedur Evakuasi Tanggap Darurat',
        'informasi'                   => 'https://drive.google.com/file/d/1v1eWt5z-VZP52kgVhIYA3dJS40sQgVpX',
        'created_at'                  => Time::now(),
        'updated_at'                  => Time::now(),
      ],
      
    ];

    $this->db->table('informasi_setiap_saat')->insertBatch($data);
  }
}
