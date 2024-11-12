<?php

namespace App\Controllers\Pages\User;

use App\Controllers\BaseController;
use App\Models\PagesViewModel;
use App\Models\RegulasiModel;

class Regulasi extends BaseController
{
  protected $regulasiModel;
  protected $pagesViewModel;
  public function __construct()
  {
    $this->regulasiModel = new RegulasiModel();
    $this->pagesViewModel = new PagesViewModel();
  }

  public function index()
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

    $results = $this->regulasiModel->findAll();
    $data = [
      'title' => 'Halaman Regulasi',
      'results' => $results,
    ];
    return view('Pages/User/Regulasi', $data);
  }
}
