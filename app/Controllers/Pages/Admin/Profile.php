<?php

namespace App\Controllers\Pages\Admin;

use App\Controllers\BaseController;

class Profile extends BaseController
{
  public function index(): string
  {
    $data = [
      'title' => 'Profile'
    ];
    return view('Pages/Admin/Profile', $data);
  }
}
