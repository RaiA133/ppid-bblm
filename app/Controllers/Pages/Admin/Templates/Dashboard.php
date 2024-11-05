<?php

namespace App\Controllers\Pages\Admin\Templates;

use App\Controllers\BaseController;

class Dashboard extends BaseController
{
  public function index(): string
  {
    $data = [
      'title' => 'Dashboard'
    ];
    return view('Pages/Admin/Templates/Dashboard', $data);
  }
}
