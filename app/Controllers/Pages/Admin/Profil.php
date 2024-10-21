<?php

namespace App\Controllers\Pages\Admin;

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
    return view('Pages/Admin/Pages/Profil/Index', $data);
  }
}
