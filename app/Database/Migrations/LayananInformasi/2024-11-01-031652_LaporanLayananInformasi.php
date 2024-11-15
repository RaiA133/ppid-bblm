<?php

namespace App\Database\Migrations\LayananInformasi;

use CodeIgniter\Database\Migration;

class LaporanLayananInformasi extends Migration
{
  public function up()
  {
    $this->forge->addField([
      'id_laporan_layanan_informasi' => [
        'type'           => 'INT',
        'constraint'     => 11,
        'unsigned'       => true,
        'auto_increment' => true,
      ],
      'link_gambar'     => [
        'type'          => 'TEXT',
        'null'          => true,
      ],
      'link_gambar_content' => [
        'type'              => 'TEXT',
      ],
      'content'          => [
        'type'           => 'LONGTEXT',
        'null'          => true,
      ],
      'created_at' => [
        'type' => 'DATETIME',
        'null' => true,
      ],
      'updated_at' => [
        'type' => 'DATETIME',
        'null' => true,
      ],
      'deleted_at' => [
        'type' => 'DATETIME',
        'null' => true,
      ],
    ]);
    $this->forge->addKey('id_laporan_layanan_informasi', true);
    $this->forge->createTable('laporan_layanan_informasi');
  }

  public function down()
  {
    $this->forge->dropTable('laporan_layanan_informasi');
  }
}
