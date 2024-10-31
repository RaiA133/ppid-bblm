<?php

namespace App\Database\Migrations\StandarLayanan;

use CodeIgniter\Database\Migration;

class StandarBiayaPelayanan extends Migration
{
  public function up()
  {
    $this->forge->addField([
      'id_standar_biaya_pelayanan' => [
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
    $this->forge->addKey('id_standar_biaya_pelayanan', true);
    $this->forge->createTable('standar_biaya_pelayanan');
  }

  public function down()
  {
    $this->forge->dropTable('standar_biaya_pelayanan');
  }
}
