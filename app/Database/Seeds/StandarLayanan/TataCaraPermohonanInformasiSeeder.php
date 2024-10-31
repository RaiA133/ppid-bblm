<?php

namespace App\Database\Seeds\StandarLayanan;

use CodeIgniter\Database\Seeder;
use CodeIgniter\I18n\Time;

class TataCaraPermohonanInformasiSeeder extends Seeder
{
  public function run()
  {
    $data = [
      [
        'link_gambar'     => 'TataCaraPermohonanInformasi.jpg',
        'link_gambar_content' => '[]',
        'content'         => '
        <h2 class="text-base font-bold mb-4">Hak Pemohon Informasi Publik:</h2>
      <ol class="list-decimal list-inside text-sm space-y-2">
        <li>Setiap orang berhak memperoleh Informasi Publik,</li>
        <li>Setiap orang berhak:
          <ul class="list-disc list-inside ml-4 space-y-2">
            <li>Melihat dan mengetahui Informasi Publik,</li>
            <li>Menghadiri pertemuan publik yang terbuka untuk umum memperoleh Informasi Publik,</li>
            <li>Mendapatkan salinan Informasi Publik melalui permohonan Informasi publik,</li>
            <li>Menyebarluaskan Informasi Publik.</li>
          </ul>
        </li>
        <li>Setiap Pemohon Informasi Publik berhak mengajukan permintaan Informasi Publik disertai alasan permintaan tersebut,</li>
        <li>Setiap Pemohon Informasi Publik berhak mengajukan gugatan ke pengadilan apabila dalam memperoleh Informasi Publik mendapat hambatan atau kegagalan.</li>
      </ol>

      <p class="mt-6 text-sm">Untuk pelayanan Informasi Publik di BBSPJILM dapat menghubungi: Tim Pejabat Pengelola Informasi dan Dokumentasi (PPID) BBSPJILM melalui surat, telepon, e-mail, website, dan media sosial:</p>

      <ul class="list-disc list-inside space-y-2 mt-4">
        <li><strong>Surat dialamatkan ke:</strong>
          <p class="ml-4 text-sm">
            Jl. Sangkuriang No. 12 – Bandung 40135. <br>
            Up. Pejabat Pengelola Informasi dan Dokumentasi (PPID)
          </p>
        </li>
        <li><strong>Telepon:</strong>
          <p class="ml-4 text-sm">+62-2503171 ext. 22</p>
        </li>
        <li><strong>E-mail:</strong>
          <p class="ml-4 text-sm">ppid.midc@gmail.com</p>
        </li>
        <li><strong>Website:</strong>
          <p class="ml-4 text-sm"><a href="https://www.bblm.go.id/" class="text-blue-500 hover:underline">http://bblm.go.id</a></p>
        </li>
        <li><strong>Media Sosial:</strong>
          <ul class="list-disc list-inside text-sm ml-4">
            <li><a href="https://www.youtube.com/channel/UCVJOsIwa66pGE2BPdKpX-tA" class="text-blue-500 hover:underline">Youtube</a></li>
            <li><a href="https://www.instagram.com/bbspjilm.midc/" class="text-blue-500 hover:underline">Instagram</a></li>
          </ul>
        </li>
      </ul>',
        'created_at'      => Time::now(),
        'updated_at'      => Time::now(),
      ],
    ];
    $this->db->table('tata_cara_permohonan_informasi')->insertBatch($data);
  }
}
