<?php

namespace App\Controllers\Pages\User\StandarLayanan;

use App\Controllers\BaseController;
use App\Models\PagesViewModel;
use App\Models\StandarLayanan\MekanismePermohonanPenyelesaianSengketaModel;

class MekanismePermohonanPenyelesaianSengketa extends BaseController
{
  protected $mekanismePermohonanPenyelesaianSengketaModel;
  protected $pagesViewModel;
  public function __construct()
  {
    $this->mekanismePermohonanPenyelesaianSengketaModel = new MekanismePermohonanPenyelesaianSengketaModel();
    $this->pagesViewModel = new PagesViewModel();
  }

  public function MekanismePermohonanPenyelesaianSengketa(): string
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

    $results = $this->mekanismePermohonanPenyelesaianSengketaModel->findAll();
    $data = [
      'title' => 'Mekanisme Permohonan Penyelesaian Sengketa',
      'results' => $results[0] ?? null,
    ];
    return view('Pages/User/StandarLayanan/MekanismePermohonanPenyelesaianSengketa', $data);
  }
}
