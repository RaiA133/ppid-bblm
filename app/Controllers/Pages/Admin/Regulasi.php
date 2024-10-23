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

    $results =  $regulasi->getRegulasi($dataCountOnePage); // use model untuk todo query
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
    $validationRule = [
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
      ],
    ];
    if (! $this->validate($validationRule)) {
      return redirect()->back()->withInput()->with('openModalAddDataRegulasi', true); // kirim validation dan auto open modal Add Data
    }

    $data = $this->request->getVar();
    $this->regulasiModel->create($data);

    session()->setFlashdata('Message', [  // flash data / notif
      'title' => 'New data added !',
    ]);

    return redirect()->to(base_url() . 'admin/regulasi');
  }

  public function indexUpdate($id_regulasi)
  {
    $validationRule = [
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
      ],
    ];
    if (! $this->validate($validationRule)) {
      return redirect()->back()->withInput()->with('openModalEditDataRegulasi' . $id_regulasi, true);
    }

    $dataToEdit = $this->request->getVar();
    $result = $this->regulasiModel->edit($id_regulasi, $dataToEdit);

    if ($result) $message = 'Data updated !';
    else $message = 'Updating Data Failed !';
    session()->setFlashdata('Message', [
      'title' => $message,
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
