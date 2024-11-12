<?php

namespace App\Controllers\Pages\User;

use App\Controllers\BaseController;
use App\Models\InformasiPublik\InformasiBerkalaJudulModel;
use App\Models\InformasiPublik\InformasiBerkalaModel;
use App\Models\InformasiPublik\InformasiSetiapSaatJudulModel;
use App\Models\InformasiPublik\InformasiSetiapSaatModel;
use App\Models\InformasiPublik\InformasiSertaMertaModel;
use App\Models\PagesViewModel;

class InformasiPublik extends BaseController
{
  protected $informasiBerkalaModel;
  protected $informasiBerkalaJudulModel;
  protected $informasiSetiapSaatModel;
  protected $informasiSetiapSaatJudulModel;
  protected $informasiSertaMertaModel;
  protected $pagesViewModel;
  public function __construct()
  {
    $this->informasiBerkalaModel = new InformasiBerkalaModel();
    $this->informasiBerkalaJudulModel = new InformasiBerkalaJudulModel();
    $this->informasiSetiapSaatModel = new InformasiSetiapSaatModel();
    $this->informasiSetiapSaatJudulModel = new InformasiSetiapSaatJudulModel();
    $this->informasiSertaMertaModel = new InformasiSertaMertaModel();
    $this->pagesViewModel = new PagesViewModel();
  }

  public function InformasiBerkala(): string
  {
    // Update Total View Pages
    $dataPagesViews['ip_address_create'] = $this->request->getIPAddress();
    $dataPagesViews['halaman_create'] = current_url();
    if (logged_in()) {
      $dataPagesViews['user_id_create'] = user_id();
      $dataPagesViews['email_create'] = user()->email;
    } else {
      $dataPagesViews['user_id_create'] = null;
      $dataPagesViews['email_create'] = null;
    }
    $this->pagesViewModel->create($dataPagesViews);

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
    // Update Total View Pages
    $dataPagesViews['ip_address_create'] = $this->request->getIPAddress();
    $dataPagesViews['halaman_create'] = current_url();
    if (logged_in()) {
      $dataPagesViews['user_id_create'] = user_id();
      $dataPagesViews['email_create'] = user()->email;
    } else {
      $dataPagesViews['user_id_create'] = null;
      $dataPagesViews['email_create'] = null;
    }
    $this->pagesViewModel->create($dataPagesViews);

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
    // Update Total View Pages
    $dataPagesViews['ip_address_create'] = $this->request->getIPAddress();
    $dataPagesViews['halaman_create'] = current_url();
    if (logged_in()) {
      $dataPagesViews['user_id_create'] = user_id();
      $dataPagesViews['email_create'] = user()->email;
    } else {
      $dataPagesViews['user_id_create'] = null;
      $dataPagesViews['email_create'] = null;
    }
    $this->pagesViewModel->create($dataPagesViews);
    
    $results = $this->informasiSertaMertaModel->findAll();
    $data = [
      'title' => 'Informasi Serta Merta',
      'results' => $results[0] ?? null,
    ];
    return view('Pages/User/InformasiPublik/InformasiSertaMerta', $data);
  }
}
