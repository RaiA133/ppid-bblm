<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class HubungiKami extends Migration
{
  public function up()
  {
    $this->forge->addField([
      'id_hubungi_kami' => [
        'type'           => 'INT',
        'constraint'     => 11,
        'unsigned'       => true,
        'auto_increment' => true,
      ],
      'nama' => [
        'type'          => 'VARCHAR',
        'constraint'    => '255',
      ],
      'email' => [
        'type'          => 'VARCHAR',
        'constraint'    => '255',
      ],
      'perusahaan' => [
        'type'          => 'VARCHAR',
        'constraint'    => '255',
        'null'          => true
      ],
      'no_telp' => [
        'type'          => 'VARCHAR',
        'constraint'    => '255',
        'null'          => true
      ],
      'pesan' => [
        'type'          => 'TEXT',
      ],
      'kota' => [
        'type'          => 'VARCHAR',
        'constraint'    => '255',
        'null'          => true
      ],
      'user_image' => [
        'type'          => 'VARCHAR',
        'constraint'    => '255',
        'null'          => true
      ],
      'read' => [
        'type'          => 'DATETIME',
        'null'          => true
      ],
      'created_at' => [
        'type'          => 'DATETIME',
        'null'          => true
      ],
      'updated_at' => [
        'type'          => 'DATETIME',
        'null'          => true
      ],
      'deleted_at' => [
        'type'          => 'DATETIME',
        'null'          => true
      ],
    ]);
    $this->forge->addKey('id_hubungi_kami', true);
    $this->forge->createTable('hubungi_kami');
  }

  public function down()
  {
    $this->forge->dropTable('hubungi_kami');
  }
}
