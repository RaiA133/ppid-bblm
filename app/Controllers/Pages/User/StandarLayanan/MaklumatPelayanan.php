<?php

namespace App\Controllers\Pages\User\StandarLayanan;

use App\Controllers\BaseController;
use App\Models\PagesViewModel;
use App\Models\StandarLayanan\MaklumatPelayananModel;

class MaklumatPelayanan extends BaseController
{
  protected $maklumatPelayananModel;
  protected $pagesViewModel;
  public function __construct()
  {
    $this->maklumatPelayananModel = new MaklumatPelayananModel();
    $this->pagesViewModel = new PagesViewModel();
  }

  public function MaklumatPelayanan(): string
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

    $results = $this->maklumatPelayananModel->findAll();
    $data = [
      'title' => 'Maklumat Pelayanan',
      'results' => $results[0] ?? null,
    ];
    return view('Pages/User/StandarLayanan/MaklumatPelayanan', $data);
  }
}
