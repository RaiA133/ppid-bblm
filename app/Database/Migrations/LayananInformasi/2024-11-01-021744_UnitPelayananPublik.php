<?php

namespace App\Database\Migrations\LayananInformasi;

use CodeIgniter\Database\Migration;

class UnitPelayananPublik extends Migration
{
  public function up()
  {
    $this->forge->addField([
      'id_unit_pelayanan_publik' => [
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
    $this->forge->addKey('id_unit_pelayanan_publik', true);
    $this->forge->createTable('unit_pelayanan_publik');
  }

  public function down()
  {
    $this->forge->dropTable('unit_pelayanan_publik');
  }
}
