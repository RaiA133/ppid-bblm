<?php

namespace App\Controllers\Pages\Admin\Templates;

use App\Controllers\BaseController;

class Leads extends BaseController
{
  public function index(): string
  {
    $data = [
      'title' => 'Leads'
    ];
    return view('Pages/Admin/Templates/Leads', $data);
  }
}
