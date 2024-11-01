<?php

namespace App\Controllers\Pages\User;

use App\Controllers\BaseController;
use App\Models\LayananInformasi\LaporanLayananInformasiModel;
use App\Models\LayananInformasi\UnitPelayananPublikModel;

class LayananInformasi extends BaseController
{
  protected $unitPelayananPublikModel;
  protected $laporanLayananInformasiModel;
  public function __construct()
  {
    $this->unitPelayananPublikModel = new UnitPelayananPublikModel();
    $this->laporanLayananInformasiModel = new LaporanLayananInformasiModel();
  }
  public function PermohonanInformasi(): string
  {
    return view('Pages/User/LayananInformasi/PermohonanInformasi');
  }

  public function UnitPelayananPublik(): string
  {
    $results = $this->unitPelayananPublikModel->findAll();
    $data = [
      'title' => 'Unit Pelayanan Publik',
      'results' => $results[0] ?? null,
    ];
    return view('Pages/User/LayananInformasi/UnitPelayananPublik', $data);
  }

  public function LaporanLayananInformasi(): string
  {
    $results = $this->laporanLayananInformasiModel->findAll();
    $data = [
      'title' => 'Laporan Layanan Informasi',
      'results' => $results[0] ?? null,
    ];
    return view('Pages/User/LayananInformasi/LaporanLayananInformasi', $data);
  }
}
