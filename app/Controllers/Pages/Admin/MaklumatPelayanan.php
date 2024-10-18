<?php

namespace App\Controllers\Pages\Admin;

use App\Controllers\BaseController;
use App\Models\MaklumatPelayananModel;

class MaklumatPelayanan extends BaseController
{
  protected $maklumatpelayananModel;
  public function __construct()
  {
    $this->maklumatpelayananModel = new MaklumatPelayananModel();
  }

  public function index()
  {
    // PAGINATION & SEARCHING //
    $currentPage = $this->request->getVar('page_maklumatpelayanan') ? $this->request->getVar('page_maklumatpelayanan') : 1;
    $dataCountOnePage = 10; // jumlah data yang ditampilkan di satu halaman

    $keyword = $this->request->getVar('keyword');
    if ($keyword) $maklumatpelayanan = $this->maklumatpelayananModel->search($keyword);
    else $maklumatpelayanan = $this->maklumatpelayananModel;

    $results =  $maklumatpelayanan->getMaklumatPelayanan($dataCountOnePage); // use model untuk todo query
    $data = [
      'title' => 'Data Maklumat Pelayanan',
      'validation' => session('validation'),
      'pager' => $this->maklumatpelayananModel->pager,
      'currentPage' => $currentPage,
      'dataCountOnePage' => $dataCountOnePage,
      'results' => $results,
    ];
    return view('Pages/Admin/Pages/StandarLayanan/MaklumatPelayanan/Index', $data);
  }

  public function indexCreate()
  {
    if (!$this->validate([ // FORM VALIDATION
      'judul_create' => [
        'rules' => 'required',
        'errors' => ['required' => '{field} harus diisi']
      ],
      'link_drive_create' => [
        'rules' => 'required|regex_match[/^(https?:\/\/)?(www\.)?drive\.google\.com\/file\/d\/[a-zA-Z0-9_-]+$/]',
        'errors' => [
          'required' => 'Link Google Drive harus diisi',
          'regex_match' => 'Link harus dalam format Google Drive yang valid.<br>Contoh : https://drive.google.com/file/d/1KefQXXB9d0uI3frBsdshvkcIUT6r1LE6D'
        ]
      ]
    ])) {
      $validation = \Config\Services::validation();
      return redirect()->back()->withInput()->with('validation', $validation)->with('openModalAddDataMaklumatPelayanan', true); // kirim validation dan auto open modal Add Data
    }

    $data = $this->request->getVar();
    $this->maklumatpelayananModel->create($data);

    session()->setFlashdata('Message', [  // flash data / notif
      'title' => 'New data added !',
    ]);

    return redirect()->to(base_url() . 'admin/standarlayanan/maklumatpelayanan');
  }

  public function indexUpdate($id_maklumatpelayanan)
  {
    if (!$this->validate([ // FORM VALIDATION
      'judul_edit' => [
        'rules' => 'required',
        'errors' => ['required' => '{field} harus diisi']
      ],
      'link_drive_edit' => [
        'rules' => 'required|regex_match[/^(https?:\/\/)?(www\.)?drive\.google\.com\/file\/d\/[a-zA-Z0-9_-]+$/]',
        'errors' => [
          'required' => 'Link Google Drive harus diisi',
          'regex_match' => 'Link harus dalam format Google Drive yang valid.<br>Contoh : https://drive.google.com/file/d/1KefQXXB9d0uI3frBsdshvkcIUT6r1LE6D'
        ]
      ]
    ])) {
      $validation = \Config\Services::validation();
      return redirect()->back()->withInput()->with('validation', $validation)->with('openModalEditDataRegulasi' . $id_maklumatpelayanan, true); // kirim validation dan auto open modal Add Data
    }

    $dataToEdit = $this->request->getVar();
    $result = $this->maklumatpelayananModel->edit($id_maklumatpelayanan, $dataToEdit);

    if ($result) $message = 'Data updated !';
    else $message = 'Updateing Data Failed !';
    session()->setFlashdata('Message', [
      'title' => $message,
    ]);

    return redirect()->to(base_url() . 'admin/standarlayanan/maklumatpelayanan');
  }

  public function indexDelete($id_maklumatpelayanan)
  {
    $result = $this->maklumatpelayananModel->remove($id_maklumatpelayanan);

    if ($result) $message = 'Data deleted !';
    else $message = 'Deleting Data Failed !';
    session()->setFlashdata('Message', [
      'title' => $message,
    ]);

    return redirect()->to(base_url() . 'admin/standarlayanan/maklumatpelayanan');
  }
}
