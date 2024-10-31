<?php

namespace App\Controllers\Pages\User\StandarLayanan;

use App\Controllers\BaseController;
use App\Models\StandarLayanan\MekanismeKeberatanModel;

class MekanismeKeberatan extends BaseController
{
  protected $mekanismeKeberatanModel;
  public function __construct()
  {
    $this->mekanismeKeberatanModel = new MekanismeKeberatanModel();
  }

  public function MekanismeKeberatan(): string
  {
    $results = $this->mekanismeKeberatanModel->findAll();
    $data = [
      'title' => 'Mekanisme Keberatan',
      'results' => $results[0] ?? null,
    ];
    return view('Pages/User/StandarLayanan/MekanismeKeberatan', $data);
  }
}
