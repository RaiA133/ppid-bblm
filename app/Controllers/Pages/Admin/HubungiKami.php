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
      return redirect()->back()->withInput();
    }

    $data = $this->request->getVar();
    $this->hubungiKamiModel->create($data);

    session()->setFlashdata('Message', [ 
      'title' => 'New data added !',
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
