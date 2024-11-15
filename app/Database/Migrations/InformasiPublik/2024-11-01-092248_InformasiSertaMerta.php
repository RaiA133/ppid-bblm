<?php

namespace App\Database\Migrations\InformasiPublik;

use CodeIgniter\Database\Migration;

class InformasiSertaMerta extends Migration
{
  public function up()
  {
    $this->forge->addField([
      'id_informasi_serta_merta' => [
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
    $this->forge->addKey('id_informasi_serta_merta', true);
    $this->forge->createTable('informasi_serta_merta');
  }

  public function down()
  {
    $this->forge->dropTable('informasi_serta_merta');
  }
}
