<?php

namespace App\Controllers\Pages\User;

use App\Controllers\BaseController;
use App\Models\LayananInformasi\LaporanLayananInformasiModel;
use App\Models\LayananInformasi\UnitPelayananPublikModel;
use App\Models\PagesViewModel;

class LayananInformasi extends BaseController
{
  protected $unitPelayananPublikModel;
  protected $laporanLayananInformasiModel;
  protected $pagesViewModel;
  public function __construct()
  {
    $this->unitPelayananPublikModel = new UnitPelayananPublikModel();
    $this->laporanLayananInformasiModel = new LaporanLayananInformasiModel();
    $this->pagesViewModel = new PagesViewModel();
  }
  public function PermohonanInformasi(): string
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

    return view('Pages/User/LayananInformasi/PermohonanInformasi');
  }

  public function UnitPelayananPublik(): string
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

    $results = $this->unitPelayananPublikModel->findAll();
    $data = [
      'title' => 'Unit Pelayanan Publik',
      'results' => $results[0] ?? null,
    ];
    return view('Pages/User/LayananInformasi/UnitPelayananPublik', $data);
  }

  public function LaporanLayananInformasi(): string
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
    
    $results = $this->laporanLayananInformasiModel->findAll();
    $data = [
      'title' => 'Laporan Layanan Informasi',
      'results' => $results[0] ?? null,
    ];
    return view('Pages/User/LayananInformasi/LaporanLayananInformasi', $data);
  }
}
