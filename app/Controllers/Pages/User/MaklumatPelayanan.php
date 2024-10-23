<?php

namespace App\Controllers\Pages\User;

use App\Controllers\BaseController;
use App\Models\StandarLayanan\MaklumatPelayananModel;

class MaklumatPelayanan extends BaseController
{
  protected $maklumatPelayananModel;
  public function __construct()
  {
    $this->maklumatPelayananModel = new MaklumatPelayananModel();
  }

  public function MaklumatPelayanan(): string
  {
    $results = $this->maklumatPelayananModel->findAll();
    $data = [
      'title' => 'Maklumat Pelayanan',
      'results' => $results[0] ?? null,
    ];
    return view('Pages/User/StandarLayanan/MaklumatPelayanan', $data);
  }
}
