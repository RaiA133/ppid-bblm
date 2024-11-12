<?php

namespace App\Controllers\Pages\User;

use App\Controllers\BaseController;
use App\Models\PagesViewModel;
use App\Models\ProfilModel;

class Profil extends BaseController
{
  protected $profileModel;
  protected $pagesViewModel;
  public function __construct()
  {
    $this->profileModel = new ProfilModel();
    $this->pagesViewModel = new PagesViewModel();
  }

  public function index(): string
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

    $results = $this->profileModel->findAll();
    $data = [
      'title' => 'Halaman Profile',
      'results' => $results[0] ?? null,
    ];
    return view('Pages/User/Profil', $data);
  }
}
