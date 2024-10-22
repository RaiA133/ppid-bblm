<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Profil extends Migration
{
  public function up()
  {
    $this->forge->addField([
      'id_profil' => [
        'type'           => 'INT',
        'constraint'     => 11,
        'unsigned'       => true,
        'auto_increment' => true,
      ],
      'nama' => [
        'type'          => 'VARCHAR',
        'constraint'    => '255',
      ],
      'judul' => [
        'type'          => 'VARCHAR',
        'constraint'    => '255',
      ],
      'latar_belakang_pendidikan'  => [
        'type'          => 'JSON',
      ],
      'penghargaan'     => [
        'type'          => 'JSON',
      ],
      'link_gambar'     => [
        'type'          => 'TEXT',
      ],
      'content'         => [
        'type'          => 'LONGTEXT',
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
    $this->forge->addKey('id_profil', true);
    $this->forge->createTable('profil');
  }

  public function down()
  {
    $this->forge->dropTable('profil');
  }
}
