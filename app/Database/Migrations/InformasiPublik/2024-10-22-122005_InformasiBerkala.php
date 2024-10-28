<?php

namespace App\Database\Migrations\InformasiPublik;

use CodeIgniter\Database\Migration;

class InformasiBerkala extends Migration
{
  public function up()
  {
    $this->forge->addField([
      'id_informasi_berkala' => [
        'type'           => 'INT',
        'constraint'     => 11,
        'unsigned'       => true,
        'auto_increment' => true,
      ],
      'id_informasi_berkala_judul' => [
        'type'       => 'INT',
        'constraint' => 11,
      ],
      'jenis_informasi' => [
        'type'       => 'VARCHAR',
        'constraint' => '255',
      ],
      'informasi' => [
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
    $this->forge->addKey('id_informasi_berkala', true);
    $this->forge->createTable('informasi_berkala');
  }

  public function down()
  {
    $this->forge->dropTable('informasi_berkala');
  }
}
