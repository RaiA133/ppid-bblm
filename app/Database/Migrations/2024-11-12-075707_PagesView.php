<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class PagesView extends Migration
{
  public function up()
  {
    $this->forge->addField([
      'id_pages_view' => [
        'type'           => 'INT',
        'constraint'     => 11,
        'unsigned'       => true,
        'auto_increment' => true,
      ],
      'ip_address' => [
        'type'           => 'VARCHAR',
        'constraint'     => '255',
      ],
      'user_id' => [
        'type'           => 'INT',
        'constraint'     => 11,
        'null'           => true,
      ],
      'email' => [
        'type'           => 'VARCHAR',
        'constraint'     => '255',
        'null'           => true,
      ],
      'halaman' => [
        'type'           => 'TEXT',
        'null'           => true,
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
    $this->forge->addKey('id_pages_view', true);
    $this->forge->createTable('pages_view');
  }

  public function down()
  {
    $this->forge->dropTable('pages_view');
  }
}
