<?php

namespace App\Controllers\Pages\Admin\InformasiPublik;

use App\Controllers\BaseController;
use App\Models\InformasiPublik\InformasiBerkalaJudulModel;
use App\Models\InformasiPublik\InformasiBerkalaModel;

class InformasiBerkala extends BaseController
{
  protected $informasiBerkalaModel;
  protected $informasiBerkalaJudulModel;
  public function __construct()
  {
    $this->informasiBerkalaModel = new InformasiBerkalaModel();
    $this->informasiBerkalaJudulModel = new InformasiBerkalaJudulModel();
  }

  // informasi berkala
  public function index(): string
  {
    $currentPage = $this->request->getVar('page_informasi_berkala') ? $this->request->getVar('page_informasi_berkala') : 1;
    $dataCountOnePage = 10; // jumlah data yang ditampilkan di satu halaman

    $judul = $this->request->getVar('judul');

    $keyword = $this->request->getVar('keyword');
    if ($keyword) $informasiBerkala = $this->informasiBerkalaModel->search($keyword);
    else $informasiBerkala = $this->informasiBerkalaModel;

    if ($judul) $informasiBerkala = $informasiBerkala->where('judul', $judul);

    $results =  $informasiBerkala->getInformasiBerkala($dataCountOnePage); // use model untuk todo query
    $informasiBerkalaJudul = $this->informasiBerkalaJudulModel->getInformasiBerkalaJudul();
    $data = [
      'title' => 'Data Informasi Berkala',
      'pager' => $this->informasiBerkalaModel->pager,
      'currentPage' => $currentPage,
      'dataCountOnePage' => $dataCountOnePage,
      'results' => $results,
      'informasiBerkalaJudul' => $informasiBerkalaJudul,
      'request' => $this->request
    ];
    return view('Pages/Admin/Pages/InformasiPublik/InformasiBerkala/Index', $data);
  }

  public function indexCreate()
  {
    $validationRule = [
      'judul_create' => [
        'rules' => 'required',
        'errors' => ['required' => 'Judul harus dipilih']
      ],
      'jenis_informasi_create' => [
        'rules' => 'required',
        'errors' => ['required' => 'Jenis Informasi harus diisi']
      ],
      'informasi_create' => [
        'rules' => 'required',
        'errors' => ['required' => 'Content harus diisi']
      ],
    ];
    if (! $this->validate($validationRule)) {
      return redirect()->back()->withInput()->with('openModalAddDataInformasiBerkala', true); // kirim validation dan auto open modal Add Data
    }

    $data = $this->request->getVar();
    $this->informasiBerkalaModel->create($data);

    session()->setFlashdata('Message', [  // flash data / notif
      'title' => 'New data added !',
    ]);

    return redirect()->to(base_url() . 'admin/informasi-berkala');
  }

  public function indexUpdate($id_informasi_berkala)
  {
    $validationRule = [
      'judul_edit' => [
        'rules' => 'required',
        'errors' => ['required' => 'Judul harus dipilih']
      ],
      'jenis_informasi_edit' => [
        'rules' => 'required',
        'errors' => ['required' => 'Jenis Informasi harus diisi']
      ],
      'informasi_edit' => [
        'rules' => 'required',
        'errors' => ['required' => 'Content harus diisi']
      ],
    ];
    if (! $this->validate($validationRule)) {
      return redirect()->back()->withInput()->with('openModalEditDataInformasiBerkala' . $id_informasi_berkala, true);
    }

    $dataToEdit = $this->request->getVar();
    $result = $this->informasiBerkalaModel->edit($id_informasi_berkala, $dataToEdit);

    if ($result) $message = 'Data updated !';
    else $message = 'Updating Data Failed !';
    session()->setFlashdata('Message', [
      'title' => $message,
    ]);

    return redirect()->to(base_url() . 'admin/informasi-berkala');
  }

  public function indexDelete($id_informasi_berkala)
  {
    $result = $this->informasiBerkalaModel->remove($id_informasi_berkala);

    if ($result) $message = 'Data deleted !';
    else $message = 'Deleting Data Failed !';
    session()->setFlashdata('Message', [
      'title' => $message,
    ]);

    return redirect()->to(base_url() . 'admin/informasi-berkala');
  }


  // informasi berkala judul
  public function infomasiBerkalaJudul()
  {
    $currentPage = $this->request->getVar('page_informasi_berkala_judul') ? $this->request->getVar('page_informasi_berkala_judul') : 1;
    $dataCountOnePage = 1; // jumlah data yang ditampilkan di satu halaman

    $keyword = $this->request->getVar('keyword');
    if ($keyword) $informasiBerkala = $this->informasiBerkalaJudulModel->search($keyword);
    else $informasiBerkala = $this->informasiBerkalaJudulModel;

    $results =  $informasiBerkala->getInformasiBerkalaJudul($dataCountOnePage); // use model untuk todo query
    $data = [
      'title' => 'Manage Data Judul Informasi Berkala',
      'pager' => $this->informasiBerkalaJudulModel->pager,
      'currentPage' => $currentPage,
      'dataCountOnePage' => $dataCountOnePage,
      'results' => $results,
    ];
    return view('Pages/Admin/Pages/InformasiPublik/InformasiBerkala/ManageJudul', $data);
  }

  public function infomasiBerkalaJudulCreate()
  {
    $validationRule = [
      'judul_create' => [
        'rules' => 'required',
        'errors' => ['required' => 'Judul harus diisi']
      ],
    ];
    if (! $this->validate($validationRule)) {
      return redirect()->back()->withInput()->with('openModalAddDataInformasiBerkalaJudul', true); // kirim validation dan auto open modal Add Data
    }

    $data = $this->request->getVar();
    $this->informasiBerkalaJudulModel->create($data);

    session()->setFlashdata('Message', [  // flash data / notif
      'title' => 'New data added !',
    ]);

    return redirect()->to(base_url() . 'admin/informasi-berkala/manage-judul');
  }

  public function infomasiBerkalaJudulUpdate($id_informasi_berkala_judul)
  {
    $validationRule = [
      'judul_edit' => [
        'rules' => 'required',
        'errors' => ['required' => 'Judul harus diisi']
      ],
    ];
    if (! $this->validate($validationRule)) {
      return redirect()->back()->withInput()->with('openModalEditDataInformasiBerkalaJudul' . $id_informasi_berkala_judul, true);
    }

    $dataToEdit = $this->request->getVar();
    $result = $this->informasiBerkalaJudulModel->edit($id_informasi_berkala_judul, $dataToEdit);

    if ($result) $message = 'Data updated !';
    else $message = 'Updating Data Failed !';
    session()->setFlashdata('Message', [
      'title' => $message,
    ]);

    return redirect()->to(base_url() . 'admin/informasi-berkala/manage-judul');
  }

  public function infomasiBerkalaJudulDelete($id_informasi_berkala_judul)
  {
    $result = $this->informasiBerkalaJudulModel->remove($id_informasi_berkala_judul);

    if ($result) $message = 'Data deleted !';
    else $message = 'Deleting Data Failed !';
    session()->setFlashdata('Message', [
      'title' => $message,
    ]);

    return redirect()->to(base_url() . 'admin/informasi-berkala/manage-judul');
  }
}
