<?php

namespace App\Controllers\Pages\Admin;

use App\Controllers\BaseController;

class Integration extends BaseController
{
  public function index(): string
  {
    $data = [
      'title' => 'Integration'
    ];
    return view('Pages/Admin/Integration', $data);
  }
}
