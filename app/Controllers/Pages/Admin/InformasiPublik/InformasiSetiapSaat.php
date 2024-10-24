<?php

namespace App\Controllers\Pages\Admin\InformasiPublik;

use App\Controllers\BaseController;
use App\Models\InformasiPublik\InformasiSetiapSaatJudulModel;
use App\Models\InformasiPublik\InformasiSetiapSaatModel;

class InformasiSetiapSaat extends BaseController
{
  protected $informasiSetiapSaatModel;
  protected $informasiSetiapSaatJudulModel;
  public function __construct()
  {
    $this->informasiSetiapSaatModel = new InformasiSetiapSaatModel();
    $this->informasiSetiapSaatJudulModel = new InformasiSetiapSaatJudulModel();
  }

  public function index(): string
  {
    $currentPage = $this->request->getVar('page_informasi_setiap_saat') ? $this->request->getVar('page_informasi_setiap_saat') : 1;
    $dataCountOnePage = 10; // jumlah data yang ditampilkan di satu halaman

    $judul = $this->request->getVar('judul');

    $keyword = $this->request->getVar('keyword');
    if ($keyword) $informasiSetiapSaat = $this->informasiSetiapSaatModel->search($keyword);
    else $informasiSetiapSaat = $this->informasiSetiapSaatModel;

    if ($judul) $informasiSetiapSaat = $informasiSetiapSaat->where('judul', $judul);

    $results =  $informasiSetiapSaat->getinformasiSetiapSaat($dataCountOnePage); // use model untuk todo query
    $informasiSetiapSaatJudul = $this->informasiSetiapSaatJudulModel->getinformasiSetiapSaatJudul();
    $data = [
      'title' => 'Data Informasi Setiap Saat',
      'pager' => $this->informasiSetiapSaatModel->pager,
      'currentPage' => $currentPage,
      'dataCountOnePage' => $dataCountOnePage,
      'results' => $results,
      'informasiSetiapSaatJudul' => $informasiSetiapSaatJudul,
      'request' => $this->request
    ];
    return view('Pages/Admin/Pages/InformasiPublik/InformasiSetiapSaat/Index', $data);
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
        'rules' => 'required|valid_url_strict[https, http]',
        'errors' => [
          'required' => 'Link harus diisi',
          'valid_url_strict' => 'Link tidak valid',
        ]
      ],
    ];
    if (! $this->validate($validationRule)) {
      return redirect()->back()->withInput()->with('openModalAddDataInformasiSetiapSaat', true); // kirim validation dan auto open modal Add Data
    }

    $data = $this->request->getVar();
    $this->informasiSetiapSaatModel->create($data);

    session()->setFlashdata('Message', [  // flash data / notif
      'title' => 'New data added !',
    ]);

    return redirect()->to(base_url() . 'admin/informasi-setiap-saat');
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
        'rules' => 'required|valid_url_strict[https, http]',
        'errors' => [
          'required' => 'Link harus diisi',
          'valid_url_strict' => 'Link tidak valid',
        ]
      ],
    ];
    if (! $this->validate($validationRule)) {
      return redirect()->back()->withInput()->with('openModalEditDataInformasiSetiapSaat' . $id_informasi_berkala, true);
    }

    $dataToEdit = $this->request->getVar();
    $result = $this->informasiSetiapSaatModel->edit($id_informasi_berkala, $dataToEdit);

    if ($result) $message = 'Data updated !';
    else $message = 'Updating Data Failed !';
    session()->setFlashdata('Message', [
      'title' => $message,
    ]);

    return redirect()->to(base_url() . 'admin/informasi-setiap-saat');
  }

  public function indexDelete($id_informasi_berkala)
  {
    $result = $this->informasiSetiapSaatModel->remove($id_informasi_berkala);

    if ($result) $message = 'Data deleted !';
    else $message = 'Deleting Data Failed !';
    session()->setFlashdata('Message', [
      'title' => $message,
    ]);

    return redirect()->to(base_url() . 'admin/informasi-setiap-saat');
  }



  // informasi setiap saat
  public function infomasiSetiapSaatJudul()
  {
    $currentPage = $this->request->getVar('page_informasi_setiap_saat_judul') ? $this->request->getVar('page_informasi_setiap_saat_judul') : 1;
    $dataCountOnePage = 10; // jumlah data yang ditampilkan di satu halaman

    $keyword = $this->request->getVar('keyword');
    if ($keyword) $informasiSetiapSaat = $this->informasiSetiapSaatJudulModel->search($keyword);
    else $informasiSetiapSaat = $this->informasiSetiapSaatJudulModel;

    $results =  $informasiSetiapSaat->getInformasiSetiapSaatJudul($dataCountOnePage); // use model untuk todo query
    $data = [
      'title' => 'Manage Data Judul Informasi Setiap Saat',
      'pager' => $this->informasiSetiapSaatJudulModel->pager,
      'currentPage' => $currentPage,
      'dataCountOnePage' => $dataCountOnePage,
      'results' => $results,
    ];
    return view('Pages/Admin/Pages/InformasiPublik/InformasiSetiapSaat/ManageJudul', $data);
  }

  public function infomasiSetiapSaatJudulCreate()
  {
    $validationRule = [
      'judul_create' => [
        'rules' => 'required',
        'errors' => ['required' => 'Judul harus diisi']
      ],
      
    ];
    if (! $this->validate($validationRule)) {
      return redirect()->back()->withInput()->with('openModalAddDataInformasiSetiapSaatJudul', true); // kirim validation dan auto open modal Add Data
    }

    $data = $this->request->getVar();
    $this->informasiSetiapSaatJudulModel->create($data);

    session()->setFlashdata('Message', [  // flash data / notif
      'title' => 'New data added !',
    ]);

    return redirect()->to(base_url() . 'admin/informasi-berkala/manage-judul');
  }

  public function infomasiSetiapSaatJudulUpdate($id_informasi_setiap_saat_judul)
  {
    $validationRule = [
      'judul_edit' => [
        'rules' => 'required',
        'errors' => ['required' => 'Judul harus diisi']
      ],
    ];
    if (! $this->validate($validationRule)) {
      return redirect()->back()->withInput()->with('openModalEditDataInformasiSetiapSaatJudul' . $id_informasi_setiap_saat_judul, true);
    }

    $dataToEdit = $this->request->getVar();
    $result = $this->informasiSetiapSaatJudulModel->edit($id_informasi_setiap_saat_judul, $dataToEdit);

    if ($result) $message = 'Data updated !';
    else $message = 'Updating Data Failed !';
    session()->setFlashdata('Message', [
      'title' => $message,
    ]);

    return redirect()->to(base_url() . 'admin/informasi-berkala/manage-judul');
  }

  public function infomasiSetiapSaatJudulDelete($id_informasi_setiap_saat_judul)
  {
    $result = $this->informasiSetiapSaatJudulModel->remove($id_informasi_setiap_saat_judul);

    if ($result) $message = 'Data deleted !';
    else $message = 'Deleting Data Failed !';
    session()->setFlashdata('Message', [
      'title' => $message,
    ]);

    return redirect()->to(base_url() . 'admin/informasi-berkala/manage-judul');
  }
}
