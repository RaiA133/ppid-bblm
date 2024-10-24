<?php

namespace App\Controllers\Pages\Admin\SuperAdmin;

use App\Controllers\BaseController;

class AdminManagement extends BaseController
{
  public function index(): string
  {
    $data = [
      'title' => 'Admin Management'
    ];
    return view('Pages/Admin/Pages/SuperAdmin/AdminManagement/Index', $data);
  }
}
