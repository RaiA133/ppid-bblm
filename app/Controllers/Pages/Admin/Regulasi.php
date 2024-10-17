<?php

namespace App\Controllers\Pages\Admin;

use App\Controllers\BaseController;
use App\Models\RegulasiModel;

class Regulasi extends BaseController
{
  protected $regulasiModel;
  public function __construct()
  {
    $this->regulasiModel = new RegulasiModel();
  }
  
  public function index()
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
    return view('Pages/Admin/Pages/Regulasi/Index', $data);
  }

    public function indexCreate()
    {
      $data = $this->request->getVar();
      $this->regulasiModel->create($data);
      
      session()->setFlashdata('Message', [  // flash data / notif
        'title' => 'New data added !',
      ]);

      return redirect()->to(base_url() . 'admin/regulasi');
    }

    public function indexDelete($id_regulasi)
    {
      $result = $this->regulasiModel->remove($id_regulasi);
      
      if ($result) $message = 'Data deleted !';
      else $message = 'Deleting Data Failed !';

      session()->setFlashdata('Message', [
        'title' => $message,
      ]);
      return redirect()->to(base_url() . 'admin/regulasi');
    }

}
