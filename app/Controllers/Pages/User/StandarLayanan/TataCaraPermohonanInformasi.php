<?php

namespace App\Controllers\Pages\User\StandarLayanan;

use App\Controllers\BaseController;
use App\Models\PagesViewModel;
use App\Models\StandarLayanan\TataCaraPermohonanInformasiModel;

class TataCaraPermohonanInformasi extends BaseController
{
  protected $tataCaraPermohonanInformasiModel;
  protected $pagesViewModel;
  public function __construct()
  {
    $this->tataCaraPermohonanInformasiModel = new TataCaraPermohonanInformasiModel();
    $this->pagesViewModel = new PagesViewModel();
  }

  public function TataCaraPermohonanInformasi(): string
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

    $results = $this->tataCaraPermohonanInformasiModel->findAll();
    $data = [
      'title' => 'Tata Cara Permohonan Informasi',
      'results' => $results[0] ?? null,
    ];
    return view('Pages/User/StandarLayanan/TataCaraPermohonanInformasi', $data);
  }
}
