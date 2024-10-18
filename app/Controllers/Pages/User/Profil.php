<?php

namespace App\Controllers\Pages\User;

use App\Controllers\BaseController;

class Profil extends BaseController
{
  public function index(): string
  {
    return view('Pages/User/Profil');
  }
}
