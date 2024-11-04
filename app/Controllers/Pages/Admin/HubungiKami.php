<?php

namespace App\Controllers\Pages\Admin;

use App\Controllers\BaseController;
use App\Models\HubungiKamiModel;

class HubungiKami extends BaseController
{
  protected $hubungiKamiModel;
  public function __construct()
  {
    $this->hubungiKamiModel = new HubungiKamiModel();
  }
  public function index(): string
  {
    $currentPage = $this->request->getVar('page_hubungi_kami') ? $this->request->getVar('page_hubungi_kami') : 1;
    $dataCountOnePage = 10; // jumlah data yang ditampilkan di satu halaman

    $keyword = $this->request->getVar('keyword');
    if ($keyword) $hubungiKami = $this->hubungiKamiModel->search($keyword);
    else $hubungiKami = $this->hubungiKamiModel;

    $results =  $hubungiKami->getHubungiKami($dataCountOnePage); // use model untuk todo query
    $data = [
      'title' => 'Data Hubungi Kami',
      'pager' => $this->hubungiKamiModel->pager,
      'currentPage' => $currentPage,
      'dataCountOnePage' => $dataCountOnePage,
      'results' => $results,
    ];
    return view('Pages/Admin/Pages/HubungiKami/Index', $data);
  }

  public function indexCreate()
  {
    $data = $this->request->getVar();
    $validationRule = [
      'nama_create' => [
        'label' => 'Nama',
        'rules' => 'required',
      ],
      'email_create' => [
        'label' => 'Email',
        'rules' => 'required|valid_email',
      ],
      'pesan_create' => [
        'label' => 'Pesan',
        'rules' => 'required',
      ],
    ];

    if (logged_in()) {
      unset($validationRule['nama_create']);
      unset($validationRule['email_create']);
      $data['nama_create'] = user()->username;
      $data['email_create'] = user()->email;
      $data['user_image_create'] = user()->user_image;
    }

    if (! $this->validate($validationRule)) {
      return redirect()->back()->withInput();
    }
    
    $query = $this->hubungiKamiModel->create($data);
    if ($query == 1) $Message = 'Pesan berhasil dikirim, Silahkan tunggu balasan admin';
    else $Message = 'Pesan gagal dikirim, Silahkan coba lagi nanti';
    session()->setFlashdata('Message', [ 
      'title' => $Message,
    ]);

    return redirect()->to(base_url() . '/hubungi-kami');
  }

  public function indexUpdate($id_hubungi_kami)
  {
    $this->hubungiKamiModel->read($id_hubungi_kami);
    return redirect()->to(base_url() . 'admin/hubungi-kami')->with('openModalLihatPesanHubungiKami' . $id_hubungi_kami, true);
  }

  public function indexDelete($id_hubungi_kami)
  {
    $result = $this->hubungiKamiModel->remove($id_hubungi_kami);

    if ($result) $message = 'Data deleted !';
    else $message = 'Deleting Data Failed !';
    session()->setFlashdata('Message', [
      'title' => $message,
    ]);

    return redirect()->to(base_url() . 'admin/hubungi-kami');
  }
}
