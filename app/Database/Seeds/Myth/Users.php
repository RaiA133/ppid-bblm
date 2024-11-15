<?php

namespace App\Database\Seeds\Myth;

use CodeIgniter\Database\Seeder;
use CodeIgniter\I18n\Time;

class Users extends Seeder
{
  public function run()
  {
    $data = [
      [
        'email'             => 'alkebumeny@gmail.com',
        'username'          => 'alkebumeny',
        'user_image'        => 'default-profile.jpg',
        'password_hash'     => '$2y$10$43u.BwgyJbrbfCXRzEfPQ.gdKKuS7o046zg2YJ1dCT6ApGfJuv2Y2', // ppidBBLM@24midc
        'active'            => 1,
        'force_pass_reset'  => 0,
        'created_at'        => Time::now(),
        'updated_at'        => Time::now(),
      ],
      // [
      //   'email'             => 'adnan@gmail.com',
      //   'username'          => 'adnan',
      //   'user_image'        => 'default-image.jpg',
      //   'password_hash'          => '$2y$10$zgAMa7.E4p/Mhn9d.8vOI.DhngV8s.b3nJwSC/MFO3dSASfBEceHi', // rahasia12345
      //   'active'            => 1,
      //   'force_pass_reset'  => 0,
      //   'created_at'        => Time::now(),
      //   'updated_at'        => Time::now(),
      // ],
      // [
      //   'email'             => 'asd@gmail.com',
      //   'username'          => 'asd',
      //   'user_image'        => 'default-profile.jpg',
      //   'password_hash'          => '$2y$10$zgAMa7.E4p/Mhn9d.8vOI.DhngV8s.b3nJwSC/MFO3dSASfBEceHi', // rahasia12345
      //   'active'            => 1,
      //   'force_pass_reset'  => 0,
      //   'created_at'        => Time::now(),
      //   'updated_at'        => Time::now(),
      // ],
    ];

    $this->db->table('users')->insertBatch($data);
  }
}
