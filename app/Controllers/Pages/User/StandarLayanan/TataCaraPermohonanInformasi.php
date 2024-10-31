<?php

namespace App\Controllers\Pages\User\StandarLayanan;

use App\Controllers\BaseController;
use App\Models\StandarLayanan\TataCaraPermohonanInformasiModel;

class TataCaraPermohonanInformasi extends BaseController
{
  protected $tataCaraPermohonanInformasiModel;
  public function __construct()
  {
    $this->tataCaraPermohonanInformasiModel = new TataCaraPermohonanInformasiModel();
  }

  public function TataCaraPermohonanInformasi(): string
  {
    $results = $this->tataCaraPermohonanInformasiModel->findAll();
    $data = [
      'title' => 'Tata Cara Permohonan Informasi',
      'results' => $results[0] ?? null,
    ];
    return view('Pages/User/StandarLayanan/TataCaraPermohonanInformasi', $data);
  }
}
