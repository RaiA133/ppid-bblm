<?php

namespace App\Controllers\Pages\User\StandarLayanan;

use App\Controllers\BaseController;
use App\Models\PagesViewModel;
use App\Models\StandarLayanan\StandarBiayaPelayananModel;

class StandarBiayaPelayanan extends BaseController
{
  protected $standarBiayaPelayananModel;
  protected $pagesViewModel;
  public function __construct()
  {
    $this->standarBiayaPelayananModel = new StandarBiayaPelayananModel();
    $this->pagesViewModel = new PagesViewModel();
  }

  public function StandarBiayaPelayanan(): string
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

    $results = $this->standarBiayaPelayananModel->findAll();
    $data = [
      'title' => 'Standar Biaya Pelayanan',
      'results' => $results[0] ?? null,
    ];
    return view('Pages/User/StandarLayanan/StandarBiayaPelayanan', $data);
  }
}
