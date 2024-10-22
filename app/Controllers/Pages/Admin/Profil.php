<?php

namespace App\Controllers\Pages\Admin;

use App\Controllers\BaseController;
use App\Models\ProfilModel;

class Profil extends BaseController
{
  protected $profileModel;
  public function __construct()
  {
    $this->profileModel = new ProfilModel();
  }

  public function index(): string
  {
    $results = $this->profileModel->findAll();
    $data = [
      'title' => 'Halaman Profile',
      'results' => $results[0] ?? null,
      'validation' => session('validation'),
    ];
    return view('Pages/Admin/Pages/Profil/Index', $data);
  }

  public function indexUpdate($id_profil)
  {
    if (!$this->validate([ // FORM VALIDATION
      'nama_edit' => [
        'rules' => 'required',
        'errors' => ['required' => 'Nama harus diisi']
      ],
      'judul_edit' => [
        'rules' => 'required',
        'errors' => ['required' => 'Judul harus diisi']
      ],
      'latar_belakang_pendidikan_edit' => [
        'rules' => 'required',
        'errors' => ['required' => 'Latar Belakang Pendidikan harus diisi']
      ],
      'penghargaan_edit' => [
        'rules' => 'required',
        'errors' => ['required' => 'Penghargaan harus diisi']
      ],
      'link_gambar_edit' => [
        'rules' => 'max_size[cover,5120]|is_image[cover]|mime_in[cover,image/jpg,image/jpeg,image/png]',
        'errors' => [
          'max_size' => 'Ukuran gambar terlalu besar',
          'is_image' => 'File bukan gambar',
          'mime_in' => 'File bukan gambar'
        ],
      ],
      'content_edit' => [
        'rules' => 'required',
        'errors' => ['required' => 'Content harus diisi']
      ],

    ])) {
      $validation = \Config\Services::validation();
      return redirect()->back()->withInput()->with('validation', $validation); // kirim validation dan auto open modal Add Data
    }

    $fileGambar = $this->request->getFile('link_gambar_edit');

    // CEK JIKA GAMBAR MASIH GAMBAR OLD
    if ($fileGambar->getError() == 4) {
      $namaGambar = $this->request->getVar('link_gambar_edit_old'); // jika user tidak upload, pakai yg lama
    } else {
      $namaGambar = $fileGambar->getRandomName();
      $fileGambar->move(base_url() . 'img/profil', $namaGambar); // pindahkan file baru
      unlink(base_url() . 'img/profil' . $this->request->getVar('link_gambar_edit_old')); // hapus file lama
    };

    $dataToEdit = $this->request->getVar();
    $dataToEdit['link_gambar_edit'] = $namaGambar;
    dd($dataToEdit); 
    $result = $this->profileModel->edit($id_profil, $dataToEdit);

    if ($result) $message = 'Data updated !';
    else $message = 'Updating Data Failed !';
    session()->setFlashdata('Message', [
      'title' => $message,
    ]);

    return redirect()->to(base_url() . 'admin/regulasi');
  }
}
