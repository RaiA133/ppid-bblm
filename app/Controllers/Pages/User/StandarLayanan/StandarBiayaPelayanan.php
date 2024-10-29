<?php

namespace App\Controllers\Pages\User\StandarLayanan;

use App\Controllers\BaseController;
use App\Models\StandarLayanan\StandarBiayaPelayananModel;

class StandarBiayaPelayanan extends BaseController
{
  protected $standarBiayaPelayananModel;
  public function __construct()
  {
    $this->standarBiayaPelayananModel = new StandarBiayaPelayananModel();
  }

  public function StandarBiayaPelayanan(): string
  {
    $results = $this->standarBiayaPelayananModel->findAll();
    $data = [
      'title' => 'Standar Biaya Pelayanan',
      'results' => $results[0] ?? null,
    ];
    return view('Pages/User/StandarLayanan/StandarBiayaPelayanan', $data);
  }
}
