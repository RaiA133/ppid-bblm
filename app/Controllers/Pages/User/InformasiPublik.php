<?php

namespace App\Controllers\Pages\User;

use App\Controllers\BaseController;
use App\Models\InformasiPublik\InformasiBerkalaJudulModel;
use App\Models\InformasiPublik\InformasiBerkalaModel;
use App\Models\InformasiPublik\InformasiSetiapSaatJudulModel;
use App\Models\InformasiPublik\InformasiSetiapSaatModel;

class InformasiPublik extends BaseController
{
  protected $informasiBerkalaModel;
  protected $informasiBerkalaJudulModel;
  protected $informasiSetiapSaatModel;
  protected $informasiSetiapSaatJudulModel;
  public function __construct()
  {
    $this->informasiBerkalaModel = new InformasiBerkalaModel();
    $this->informasiBerkalaJudulModel = new InformasiBerkalaJudulModel();
    $this->informasiSetiapSaatModel = new InformasiSetiapSaatModel();
    $this->informasiSetiapSaatJudulModel = new InformasiSetiapSaatJudulModel();
  }

  public function InformasiBerkala(): string
  {
    // $judulInformasiBerkala = $this->informasiBerkalaJudulModel->getInformasiBerkalaJudul(1000);
    $judulInformasiBerkala = $this->informasiBerkalaJudulModel->orderBy('id_informasi_berkala_judul', 'DESC')->findAll();
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
    // $judulInformasiSetiapSaat = $this->informasiSetiapSaatJudulModel->getInformasiSetiapSaatJudul(1000);
    $judulInformasiSetiapSaat = $this->informasiSetiapSaatJudulModel->orderBy('id_informasi_setiap_saat_judul', 'DESC')->findAll();
    $informasiSetiapSaat = $this->informasiSetiapSaatModel->findAll();
    $data = [
      'title' => 'Informasi Setiap Saat',
      'informasiSetiapSaat' => $informasiSetiapSaat,
      'judulInformasiSetiapSaat' => $judulInformasiSetiapSaat,
    ];
    return view('Pages/User/InformasiPublik/InformasiSetiapSaat', $data);
  }

  public function InformasiSertaMerta(): string
  {
    return view('Pages/User/InformasiPublik/InformasiSertaMerta');
  }
}
