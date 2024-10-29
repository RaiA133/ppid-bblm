<?php

namespace App\Controllers\Pages\User\StandarLayanan;

use App\Controllers\BaseController;
use App\Models\StandarLayanan\MekanismePermohonanPenyelesaianSengketaModel;

class MekanismePermohonanPenyelesaianSengketa extends BaseController
{
  protected $mekanismePermohonanPenyelesaianSengketaModel;
  public function __construct()
  {
    $this->mekanismePermohonanPenyelesaianSengketaModel = new MekanismePermohonanPenyelesaianSengketaModel();
  }

  public function MekanismePermohonanPenyelesaianSengketa(): string
  {
    $results = $this->mekanismePermohonanPenyelesaianSengketaModel->findAll();
    $data = [
      'title' => 'Mekanisme Permohonan Penyelesaian Sengketa',
      'results' => $results[0] ?? null,
    ];
    return view('Pages/User/StandarLayanan/MekanismePermohonanPenyelesaianSengketa', $data);
  }
}
