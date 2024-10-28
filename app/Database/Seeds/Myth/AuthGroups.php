<?php

namespace App\Database\Seeds\Myth;

use CodeIgniter\Database\Seeder;

class AuthGroups extends Seeder
{
  public function run()
  {
    $data = [
      [
        'name'       => 'superadmin',
        'description'  => 'Admin Manager',
      ],
      [
        'name'       => 'admin',
        'description'  => 'Site Administrator',
      ],
      [
        'name'       => 'user',
        'description'  => 'Site User / Request to be Admin',
      ],
    ];

    $this->db->table('auth_groups')->insertBatch($data);
  }
}
