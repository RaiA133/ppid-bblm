<?php

namespace App\Controllers\Pages\User;

use App\Controllers\BaseController;
use App\Models\PagesViewModel;

class HubungiKami extends BaseController
{
  protected $pagesViewModel;
  public function __construct()
  {
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
    
    return view('Pages/User/HubungiKami');
  }
}
