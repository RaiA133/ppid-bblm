<?php

namespace App\Controllers\Pages\Admin\Templates;

use App\Controllers\BaseController;

class Analytics extends BaseController
{
  public function index(): string
  {
    $data = [
      'title' => 'Analytics'
    ];
    return view('Pages/Admin/Templates/Analytics', $data);
  }
}
