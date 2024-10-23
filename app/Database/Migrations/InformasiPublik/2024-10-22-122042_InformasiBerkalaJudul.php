<?php

namespace App\Database\Migrations\InformasiPublik;

use CodeIgniter\Database\Migration;

class InformasiBerkalaJudul extends Migration
{
  public function up()
  {
    $this->forge->addField([
      'id_informasi_berkala_judul' => [
        'type'           => 'INT',
        'constraint'     => 11,
        'unsigned'       => true,
        'auto_increment' => true,
      ],
      'judul' => [
        'type'       => 'VARCHAR',
        'constraint' => '255',
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
    $this->forge->addKey('id_informasi_berkala_judul', true);
    $this->forge->createTable('informasi_berkala_judul');
  }

  public function down()
  {
    $this->forge->dropTable('informasi_berkala_judul');
  }
}
