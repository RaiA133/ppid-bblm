<?php

namespace App\Controllers\Pages\User\StandarLayanan;

use App\Controllers\BaseController;
use App\Models\StandarLayanan\WaktuPelayananModel;

class WaktuPelayanan extends BaseController
{
  protected $waktuPelayananModel;
  public function __construct()
  {
    $this->waktuPelayananModel = new WaktuPelayananModel();
  }

  public function WaktuPelayanan(): string
  {
    $results = $this->waktuPelayananModel->findAll();
    $data = [
      'title' => 'Waktu Pelayanan',
      'results' => $results[0] ?? null,
    ];
    return view('Pages/User/StandarLayanan/WaktuPelayanan', $data);
  }
}
