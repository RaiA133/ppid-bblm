<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class MaklumatPelayanan extends Migration
{
  public function up()
  {
    $this->forge->addField([
      'id_maklumatpelayanan' => [
        'type'           => 'INT',
        'constraint'     => 11,
        'unsigned'       => true,
        'auto_increment' => true,
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
    $this->forge->addKey('id_maklumatpelayanan', true);
    $this->forge->createTable('maklumatpelayanan');
  }

  public function down()
  {
    $this->forge->dropTable('maklumatpelayanan');
  }
}
