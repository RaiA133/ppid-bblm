<?php

namespace App\Controllers\Pages\User;

use App\Controllers\BaseController;
use App\Models\InformasiPublik\InformasiBerkalaJudulModel;
use App\Models\InformasiPublik\InformasiBerkalaModel;

class InformasiPublik extends BaseController
{
  protected $informasiBerkalaModel;
  protected $informasiBerkalaJudulModel;
  public function __construct()
  {
    $this->informasiBerkalaModel = new InformasiBerkalaModel();
    $this->informasiBerkalaJudulModel = new InformasiBerkalaJudulModel();
  }

  public function InformasiBerkala(): string
  {
    $judulInformasiBerkala = $this->informasiBerkalaJudulModel->getInformasiBerkalaJudul();
    $informasiBerkala = $this->informasiBerkalaModel->findAll();
    $data = [
      'title' => 'Informasi Berkala',
      'informasiBerkala' => $informasiBerkala,
      'judulInformasiBerkala' => $judulInformasiBerkala,
    ];
    return view('Pages/User/InformasiPublik/InformasiBerkala', $data);
  }

  public function InformasiSetiapSaat(): string
  {
    return view('Pages/User/InformasiPublik/InformasiSetiapSaat');
  }

  public function InformasiSertaMerta(): string
  {
    return view('Pages/User/InformasiPublik/InformasiSertaMerta');
  }
}
