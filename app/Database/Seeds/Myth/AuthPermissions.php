<?php

namespace App\Database\Seeds\Myth;

use CodeIgniter\Database\Seeder;

class AuthPermissions extends Seeder
{
  public function run()
  {
    $data = [
      [
        'name'       => 'manage-admin',
        'description'  => 'Manage Admin Data',
      ],
      [
        'name'       => 'manage-site',
        'description'  => 'Manage Site Data',
      ],
      [
        'name'       => 'site-viewer',
        'description'  => 'View Site Data',
      ],
    ];

    $this->db->table('auth_permissions')->insertBatch($data);
  }
}
