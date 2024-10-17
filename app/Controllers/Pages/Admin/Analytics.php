<?php

namespace App\Controllers\Pages\Admin;

use App\Controllers\BaseController;

class Analytics extends BaseController
{
  public function index(): string
  {
    $data = [
      'title' => 'Analytics'
    ];
    return view('Pages/Admin/Analytics', $data);
  }
}
