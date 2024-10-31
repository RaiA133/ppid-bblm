<?php

namespace App\Database\Migrations\StandarLayanan;

use CodeIgniter\Database\Migration;

class MekanismeKeberatan extends Migration
{
  public function up()
  {
    $this->forge->addField([
      'id_mekanisme_keberatan' => [
        'type'           => 'INT',
        'constraint'     => 11,
        'unsigned'       => true,
        'auto_increment' => true,
      ],
      'link_gambar'     => [
        'type'          => 'TEXT',
      ],
      'link_gambar_content' => [
        'type'              => 'TEXT',
      ],
      'content'          => [
        'type'           => 'LONGTEXT',
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
    $this->forge->addKey('id_mekanisme_keberatan', true);
    $this->forge->createTable('mekanisme_keberatan');
  }

  public function down()
  {
    $this->forge->dropTable('mekanisme_keberatan');
  }
}
