<?php

namespace App\Controllers\Pages\Admin;

use App\Controllers\BaseController;
use App\Models\MaklumatPelayananModel;

class MaklumatPelayanan extends BaseController
{
  protected $maklumatpelayananModel;
  public function __construct()
  {
    // $this->maklumatpelayananModel = new MaklumatPelayananModel();
  }

  public function index()
  {
    // PAGINATION & SEARCHING //
    $currentPage = $this->request->getVar('page_maklumatpelayanan') ? $this->request->getVar('page_maklumatpelayanan') : 1;
    $dataCountOnePage = 10; // jumlah data yang ditampilkan di satu halaman

    $keyword = $this->request->getVar('keyword');
    if ($keyword) $maklumatpelayanan = $this->maklumatpelayananModel->search($keyword);
    else $maklumatpelayanan = $this->maklumatpelayananModel;

    $results =  $maklumatpelayanan->getMaklumatPelayanan($dataCountOnePage);
    $data = [
      'title' => 'Data Regulasi',
      'validation' => session('validation'),
      'pager' => $this->maklumatpelayananModel->pager,
      'currentPage' => $currentPage,
      'dataCountOnePage' => $dataCountOnePage,
      'results' => $results,
    ];
    return view('Pages/Admin/Pages/Regulasi/Index', $data);
  }

  public function indexCreate()
  {
    if (!$this->validate([ // FORM VALIDATION
      'judul' => [
        'rules' => 'required',
        'errors' => ['required' => '{field} harus diisi']
      ],
      'link_drive' => [
        'rules' => 'required|regex_match[/^(https?:\/\/)?(www\.)?drive\.google\.com\/file\/d\/[a-zA-Z0-9_-]+$/]',
        'errors' => [
          'required' => 'Link Google Drive harus diisi',
          'regex_match' => 'Link harus dalam format Google Drive yang valid.<br>Contoh : https://drive.google.com/file/d/1KefQXXB9d0uI3frBsdshvkcIUT6r1LE6D'
        ]
      ]
    ])) {
      $validation = \Config\Services::validation();
      return redirect()->back()->withInput()->with('validation', $validation)->with('openModalAddDataRegulasi', true); // kirim validation dan auto open modal Add Data
    }

    $data = $this->request->getVar();
    $this->maklumatpelayananModel->create($data);

    session()->setFlashdata('Message', [  // flash data / notif
      'title' => 'New data added !',
    ]);

    return redirect()->to(base_url() . 'admin/regulasi');
  }

  public function indexDelete($id_regulasi)
  {
    $result = $this->maklumatpelayananModel->remove($id_regulasi);

    if ($result) $message = 'Data deleted !';
    else $message = 'Deleting Data Failed !';

    session()->setFlashdata('Message', [
      'title' => $message,
    ]);
    return redirect()->to(base_url() . 'admin/regulasi');
  }
}
