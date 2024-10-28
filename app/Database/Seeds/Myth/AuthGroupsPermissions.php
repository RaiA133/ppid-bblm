<?php

namespace App\Database\Seeds\Myth;

use CodeIgniter\Database\Seeder;

class AuthGroupsPermissions extends Seeder
{
  public function run()
  {
    $data = [
      [
        'group_id'       => 1,
        'permission_id'  => 1,
      ],
      [
        'group_id'       => 1,
        'permission_id'  => 2,
      ],
      [
        'group_id'       => 2,
        'permission_id'  => 2,
      ],
    ];

    $this->db->table('auth_groups_permissions')->insertBatch($data);
  }
}
