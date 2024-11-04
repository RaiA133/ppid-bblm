<?php

namespace App\Controllers\Pages\Admin\LayananInformasi;

use App\Controllers\BaseController;
use App\Models\LayananInformasi\PermohonanInformasiModel;

class PermohonanInformasi extends BaseController
{
  protected $permohonanInformasiModel;
  public function __construct()
  {
    $this->permohonanInformasiModel = new PermohonanInformasiModel();
  }
  public function index(): string
  {
    $currentPage = $this->request->getVar('page_permohonan_informasi') ? $this->request->getVar('page_permohonan_informasi') : 1;
    $dataCountOnePage = 2; // jumlah data yang ditampilkan di satu halaman

    $keyword = $this->request->getVar('keyword');
    if ($keyword) $perhomonanInformasi = $this->permohonanInformasiModel->search($keyword);
    else $perhomonanInformasi = $this->permohonanInformasiModel;

    $results =  $perhomonanInformasi->getPermohonanInformasi($dataCountOnePage); // use model untuk todo query
    $data = [
      'title' => 'Data Permohonan',
      'pager' => $this->permohonanInformasiModel->pager,
      'currentPage' => $currentPage,
      'dataCountOnePage' => $dataCountOnePage,
      'results' => $results,
    ];
    return view('Pages/Admin/Pages/LayananInformasi/PermohonanInformasi/Index', $data);
  }

  public function indexCreate()
  {
    $data = $this->request->getVar();
    $validationRule = [
      'nama_create' => [
        'label' => 'Nama',
        'rules' => 'required',
      ],
      'no_id_create' => [
        'label' => 'No Identitas',
        'rules' => 'required',
      ],
      'alamat_create' => [
        'label' => 'Alamat',
        'rules' => 'required',
      ],
      'email_create' => [
        'label' => 'Email',
        'rules' => 'required|valid_email',
      ],
      'no_telp_create' => [
        'label' => 'No Telp/HP',
        'rules' => 'required',
      ],
      'pertanyaan_create' => [
        'label' => 'Pertanyaan / Rincian Informasi yang Dibutuhkan',
        'rules' => 'required',
      ],
      'tujuan_penggunaan_info_create' => [
        'label' => 'Tujuan Penggunaan Informasi',
        'rules' => 'required',
      ],
      'cara_memperoleh_info_create' => [
        'label' => 'Cara Memperoleh Informasi',
        'rules' => 'required',
      ],
      'jenis_dokumen_info_create' => [
        'label' => 'Jenis dokumen informasi yang diminta',
        'rules' => 'required',
      ],
      'cara_dapat_salinan_info_create' => [
        'label' => 'Cara Dapat Salinan Informasi',
        'rules' => 'required',
      ],
      'agreement1' => [
        'rules' => 'required',
        'errors' => ['required' => 'This checkbox must be checked'],
      ],
      'agreement2' => [
        'rules' => 'required',
        'errors' => ['required' => 'This checkbox must be checked'],
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

    if ($data['agreement1'] == 'on' && $data['agreement2'] == 'on') $data['agreement_create'] = true;
    
    $query = $this->permohonanInformasiModel->create($data);
    if ($query == 1) $Message = 'Pesan berhasil dikirim, Silahkan tunggu balasan admin';
    else $Message = 'Pesan gagal dikirim, Silahkan coba lagi nanti';
    session()->setFlashdata('Message', [ 
      'title' => $Message,
    ]);

    return redirect()->to(base_url() . '/permohonan-informasi');
  }

  public function indexUpdate($id_permohonan_infomasi)
  {
    $currentPage = $this->request->getGet('page_permohonan_informasi');
    $this->permohonanInformasiModel->read($id_permohonan_infomasi);
    return redirect()->to(base_url('admin/permohonan-informasi') . '?page_permohonan_informasi=' . $currentPage)->with('openModalLihatPesanPermohonanInformasi' . $id_permohonan_infomasi, true);
  }

  public function indexDelete($id_permohonan_infomasi)
  {
    $result = $this->permohonanInformasiModel->remove($id_permohonan_infomasi);

    if ($result) $message = 'Data deleted !';
    else $message = 'Deleting Data Failed !';
    session()->setFlashdata('Message', [
      'title' => $message,
    ]);

    return redirect()->to(base_url() . 'admin/permohonan-informasi');
  }
}
