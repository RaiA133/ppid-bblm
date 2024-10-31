<?php

namespace App\Database\Migrations\StandarLayanan;

use CodeIgniter\Database\Migration;

class TataCaraPermohonanInformasi extends Migration
{
  public function up()
  {
    $this->forge->addField([
      'id_tata_cara_permohonan_informasi' => [
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
    $this->forge->addKey('id_tata_cara_permohonan_informasi', true);
    $this->forge->createTable('tata_cara_permohonan_informasi');
  }

  public function down()
  {
    $this->forge->dropTable('tata_cara_permohonan_informasi');
  }
}
