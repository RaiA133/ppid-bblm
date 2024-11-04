<?php

namespace App\Database\Migrations\LayananInformasi;

use CodeIgniter\Database\Migration;

class PermohonanInformasi extends Migration
{
  public function up()
  {
    $this->forge->addField([
      'id_permohonan_informasi' => [
        'type'           => 'INT',
        'constraint'     => 11,
        'unsigned'       => true,
        'auto_increment' => true,
      ],
      'nama' => [
        'type'           => 'VARCHAR',
        'constraint'     => '255',
      ],
      'no_id' => [
        'type'           => 'VARCHAR',
        'constraint'     => '255',
      ],
      'alamat' => [
        'type'           => 'VARCHAR',
        'constraint'     => '255',
      ],
      'email' => [
        'type'           => 'VARCHAR',
        'constraint'     => '255',
      ],
      'no_telp' => [
        'type'           => 'VARCHAR',
        'constraint'     => '255',
      ],
      'pertanyaan' => [
        'type'           => 'TEXT',
      ],
      'tujuan_penggunaan_info' => [
        'type'           => 'TEXT',
      ],
      'cara_memperoleh_info' => [
        'type'           => 'VARCHAR',
        'constraint'     => '255',
      ],
      'jenis_dokumen_info' => [
        'type'           => 'VARCHAR',
        'constraint'     => '255',
      ],
      'cara_dapat_salinan_info' => [
        'type'           => 'VARCHAR',
        'constraint'     => '255',
      ],
      'agreement' => [
        'type'           => 'BOOLEAN',
        'default'        => true,
      ],
      'user_image' => [
        'type'           => 'VARCHAR',
        'constraint'     => '255',
        'null'           => true
      ],
      'read' => [
        'type'          => 'DATETIME',
        'null'          => true
      ],
      'created_at' => [
        'type'           => 'DATETIME',
        'null'           => true
      ],
      'updated_at' => [
        'type'           => 'DATETIME',
        'null'           => true
      ],
      'deleted_at' => [
        'type'           => 'DATETIME',
        'null'           => true
      ],
    ]);
    $this->forge->addKey('id_permohonan_informasi', true);
    $this->forge->createTable('permohonan_informasi');
  }

  public function down()
  {
    $this->forge->dropTable('permohonan_informasi');
  }
}
