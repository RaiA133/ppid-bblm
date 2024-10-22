<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;
use CodeIgniter\I18n\Time;

class RegulasiSeeder extends Seeder
{
  public function run()
  {
    $data = [
      [
        'judul'       => 'UU No 14 Tahun 2008, Tentang Keterbukaan Informasi Publik',
        'link_drive'  => 'https://drive.google.com/file/d/1QIbpVc2YsZmHMoVerxxAe5FbwsTUhVWu',
        'created_at'  => Time::now(),
      ],
      [
        'judul'       => 'PP No 61 Tahun 2010, Tentang Pelaksanaan Undang – Undang Keterbukaan Informasi Publik',
        'link_drive'  => 'https://drive.google.com/file/d/1KefQXXB9d0uI3H3frBhvkcIUT6r1LE6D',
        'created_at'  => Time::now(),
      ],
      [
        'judul'       => 'Perkip No 1 Tahun 2010, Tentang Standar Layanan Informasi Publik',
        'link_drive'  => 'https://drive.google.com/file/d/1CwCkVDTwnyODyge-Wcft_XhvkL8wTwUQ',
        'created_at'  => Time::now(),
      ],
      [
        'judul'       => 'Perkip No 1 Tahun 2013, Tentang Prosedur Penyelesaian Sengketa Informasi Publik',
        'link_drive'  => 'https://drive.google.com/file/d/17OqqZMwI5H1n8Wiy6QS-R_RgRLs5fs3y',
        'created_at'  => Time::now(),
      ],
      [
        'judul'       => 'Perma No 2 Tahun 2011, Tentang Tata Cara Penyelesaian Sengketa Informasi Publik di Pengadilan',
        'link_drive'  => 'https://drive.google.com/file/d/1fzZ8UsjZUv9U72RKwjbx8j2mxXp28Ovz',
        'created_at'  => Time::now(),
      ],
      [
        'judul'       => 'KMA No 085 Tahun 2011, Tentang Pembentukan Kelompok Kerja Penyusunan Peraturan Mahkamah Agung tentang Tata Cara Penyelesaian Gugatan Atas Putusan',
        'link_drive'  => 'https://drive.google.com/file/d/15006kMyutfeIZP2G3BBdPgHWUmwVo6NQ',
        'created_at'  => Time::now(),
      ],
      [
        'judul'       => 'Permenperin Nomor 1 Tahun 2022 Tentang Organisasi dan Tata Kerja Unit Pelaksana Teknis di Lingkungan Badan Standardisasi dan Kebijakan Jasa Industri',
        'link_drive'  => 'https://drive.google.com/file/d/1nx1AXkC6GOEYwzR7IZ_c_E1pVEBVmtO6',
        'created_at'  => Time::now(),
      ],
    ];

    $this->db->table('regulasi')->insertBatch($data);
  }
}
