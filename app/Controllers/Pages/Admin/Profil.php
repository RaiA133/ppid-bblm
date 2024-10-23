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

  public function index($validation = null)
  {
    $results = $this->profileModel->findAll();
    $data = [
      'title' => 'Halaman Profile',
      'results' => $results[0] ?? null,
    ];
    return view('Pages/Admin/Pages/Profil/Index', $data);
  }

  public function indexUpdate($id_profil)
  {
    $validationRule = [
      'nama_edit' => [
        'rules' => 'required',
        'errors' => ['required' => 'Nama harus diisi']
      ],
      'judul_edit' => [
        'rules' => 'required',
        'errors' => ['required' => 'Judul harus diisi']
      ],
      'link_gambar_edit' => [
        'label' => 'Link Gambar',
        'rules' => [
          'max_size[link_gambar_edit,5120]',
          'is_image[link_gambar_edit]',
          'mime_in[link_gambar_edit,image/jpg,image/jpeg,image/png]',
        ],
      ],
      'content_edit' => [
        'rules' => 'required',
        'errors' => ['required' => 'Content harus diisi']
      ],
    ];
    if (! $this->validate($validationRule)) {
      return redirect()->back()->withInput();
    }

    $fileGambar = $this->request->getFile('link_gambar_edit');
    $namaGambarLama = $this->request->getVar('link_gambar_edit_old');

    // CEK JIKA GAMBAR MASIH GAMBAR OLD
    if ($fileGambar->getError() == 4) {
      $namaGambar = $namaGambarLama; // jika user tidak upload, pakai yg lama
    } else {
      $namaGambar = $fileGambar->getRandomName();
      $fileGambar->move('img/profile/', $namaGambar); // pindahkan file baru
      $fileLamaPath = 'img/profile/' . $namaGambarLama;
      // unlink('img/profile/' . $namaGambarLama); // hapus file lama
      if (file_exists($fileLamaPath)) {
        if (!unlink($fileLamaPath)) {
          session()->setFlashdata('Message', [
            'title' => 'Gagal menghapus file lama: ' . $namaGambarLama,
            'type' => 'error'
          ]);
        }
      } else {
        session()->setFlashdata('Message', [
          'title' => 'File lama tidak ditemukan: ' . $namaGambarLama,
          'type' => 'warning'
        ]);
      }
    };

    $dataToEdit = $this->request->getVar();
    $dataToEdit['link_gambar_edit'] = $namaGambar;
    $dataToEdit['latar_belakang_pendidikan_edit'] = json_encode($dataToEdit['latar_belakang_pendidikan_edit']);
    $dataToEdit['penghargaan_edit'] = json_encode($dataToEdit['penghargaan_edit']);
    unset($dataToEdit['link_gambar_edit_old']);
    $result = $this->profileModel->edit($id_profil, $dataToEdit);

    if ($result) $message = 'Data updated !';
    else $message = 'Updating Data Failed !';
    session()->setFlashdata('Message', [
      'title' => $message,
    ]);

    return redirect()->to(base_url() . 'admin/profil');
  }
}
