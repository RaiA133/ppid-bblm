<?php

namespace App\Controllers\Pages\User;

use App\Controllers\BaseController;
use App\Models\RegulasiModel;

class Regulasi extends BaseController
{
  protected $regulasiModel;
  public function __construct()
  {
    $this->regulasiModel = new RegulasiModel();
  }

  // User Page

  public function index()
  {
    $results = $this->regulasiModel->getRegulasi();
    $data = [
      'title' => 'Halaman Regulasi',
      'results' => $results,
    ];
    return view('Pages/User/Regulasi', $data);
  }

  // END User Page



  // Admin Page
  
  public function adminIndex()
  {
    // PAGINATION & SEARCHING //
    $currentPage = $this->request->getVar('page_regulasi') ? $this->request->getVar('page_regulasi') : 1;
    $dataCountOnePage = 10; // jumlah data yang ditampilkan di satu halaman

    $keyword = $this->request->getVar('keyword');
    if ($keyword) $regulasi = $this->regulasiModel->search($keyword);
    else $regulasi = $this->regulasiModel;

    $results =  $regulasi->getRegulasi($dataCountOnePage);
    $data = [
      'title' => 'Data Regulasi',
      'pager' => $this->regulasiModel->pager,
      'currentPage' => $currentPage,
      'dataCountOnePage' => $dataCountOnePage,
      'results' => $results,
    ];
    return view('Pages/Admin/Pages/Regulasi/index', $data);
  }

  // END Admin Page
}
