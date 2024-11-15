<?php

namespace App\Database\Seeds\Myth;

use CodeIgniter\Database\Seeder;
use CodeIgniter\I18n\Time;

class AuthGroupsUsers extends Seeder
{
  public function run()
  {
    $data = [
      [
        'group_id'       => 1,
        'user_id'  => 1,
        'created_at'        => Time::now(),
        'updated_at'        => Time::now(),
      ],
      // [
      //   'group_id'       => 2,
      //   'user_id'  => 2,
      //   'created_at'        => Time::now(),
      //   'updated_at'        => Time::now(),
      // ],
      // [
      //   'group_id'       => 3,
      //   'user_id'  => 3,
      //   'created_at'        => Time::now(),
      //   'updated_at'        => Time::now(),
      // ],
    ];

    $this->db->table('auth_groups_users')->insertBatch($data);
  }
}
