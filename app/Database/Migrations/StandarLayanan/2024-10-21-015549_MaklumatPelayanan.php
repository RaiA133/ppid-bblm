<?php

namespace App\Database\Migrations\StandarLayanan;

use CodeIgniter\Database\Migration;

class MaklumatPelayanan extends Migration
{
  public function up()
  {
    $this->forge->addField([
      'id_maklumat_pelayanan' => [
        'type'           => 'INT',
        'constraint'     => 11,
        'unsigned'       => true,
        'auto_increment' => true,
      ],
      'link_gambar' => [
        'type' => 'TEXT',
      ],
      'content' => [
        'type' => 'LONGTEXT',
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
    $this->forge->addKey('id_maklumat_pelayanan', true);
    $this->forge->createTable('maklumat_pelayanan');
  }

  public function down()
  {
    $this->forge->dropTable('maklumat_pelayanan');
  }
}
