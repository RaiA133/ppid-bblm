<?php

namespace App\Controllers\Pages\User\StandarLayanan;

use App\Controllers\BaseController;
use App\Models\PagesViewModel;
use App\Models\StandarLayanan\MekanismeKeberatanModel;

class MekanismeKeberatan extends BaseController
{
  protected $mekanismeKeberatanModel;
  protected $pagesViewModel;
  public function __construct()
  {
    $this->mekanismeKeberatanModel = new MekanismeKeberatanModel();
    $this->pagesViewModel = new PagesViewModel();
    
  }

  public function MekanismeKeberatan(): string
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

    $results = $this->mekanismeKeberatanModel->findAll();
    $data = [
      'title' => 'Mekanisme Keberatan',
      'results' => $results[0] ?? null,
    ];
    return view('Pages/User/StandarLayanan/MekanismeKeberatan', $data);
  }
}
