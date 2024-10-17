<?php

namespace App\Controllers\Pages\User;

use App\Controllers\BaseController;
use App\Models\RegulasiModel;

class Regulasi extends BaseController
{
  protected $regulasiModel;
  public function __construct()
  {
    $this->regulasiModel = new RegulasiModel();
  }

  // User Page
  public function index()
  {
    $results = $this->regulasiModel->getRegulasi();
    $data = [
      'judul' => 'Halaman Regulasi',
      'results' => $results,
    ];
    return view('Pages/User/Regulasi', $data);
  }
  // END User Page

  // Admin Page

  // END Admin Page
}
