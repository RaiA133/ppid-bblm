<?php

namespace App\Database\Migrations\StandarLayanan;

use CodeIgniter\Database\Migration;

class WaktuPelayanan extends Migration
{
  public function up()
  {
    $this->forge->addField([
      'id_waktu_pelayanan' => [
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
    $this->forge->addKey('id_waktu_pelayanan', true);
    $this->forge->createTable('waktu_pelayanan');
  }

  public function down()
  {
    $this->forge->dropTable('waktu_pelayanan');
  }
}
