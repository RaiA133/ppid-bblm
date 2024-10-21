<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Regulasi extends Migration
{
  public function up()
  {
    $this->forge->addField([
      'id_regulasi' => [
        'type'           => 'INT',
        'constraint'     => 11,
        'unsigned'       => true,
        'auto_increment' => true,
      ],
      'judul' => [
        'type'       => 'VARCHAR',
        'constraint' => '255',
      ],
      'link_drive' => [
        'type' => 'TEXT',
      ],
      'created_at' => [
        'type' => 'DATETIME',
        'null' => true
      ],
      'updated_at' => [
        'type' => 'DATETIME',
        'null' => true
      ],
      'deleted_at' => [
        'type' => 'DATETIME',
        'null' => true
      ],
    ]);
    $this->forge->addKey('id_regulasi', true);
    $this->forge->createTable('regulasi');
  }

  public function down()
  {
    $this->forge->dropTable('regulasi');
  }
}
