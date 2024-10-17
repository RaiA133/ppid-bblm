<?php

namespace App\Controllers\Pages\Admin;

use App\Controllers\BaseController;

class Error extends BaseController
{
  public function blankPage(): string
  {
    $data = [
      'title' => 'Blank Page'
    ];
    return view('Pages/Admin/Error/BlankPage', $data);
  }
  public function notFound404(): string
  {
    $data = [
      'title' => '404'
    ];
    return view('Pages/Admin/Error/404Page', $data);
  }
}
