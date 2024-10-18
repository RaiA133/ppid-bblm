<?php

namespace App\Controllers\Pages\User;

use App\Controllers\BaseController;
use App\Models\ProfilModel;

class Profil extends BaseController
{
  protected $profileModel;
  public function __construct()
  {
    $this->profileModel = new ProfilModel();
  }

  public function index(): string
  {
    $results = $this->profileModel->findAll();
    $data = [
      'title' => 'Halaman Profile',
      'results' => $results[0] ?? null,
    ];
    return view('Pages/User/Profil', $data);
  }
}
