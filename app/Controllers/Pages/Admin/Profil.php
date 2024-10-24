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

  public function index()
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

    $namaLinkGambarContentLama = $this->profileModel->find($id_profil)['link_gambar_content'];
    $oldImagesArray = json_decode($namaLinkGambarContentLama, true); // Convert JSON to array
    $newImagesArray = json_decode($this->request->getVar('link_gambar_content_edit'), true);

    if ($oldImagesArray) {
      $imagesToUnlink = array_diff($oldImagesArray, $newImagesArray);
      foreach ($imagesToUnlink as $imageToDelete) {
        $fileLamaPath = 'img/profile/' . $imageToDelete;
        if (file_exists($fileLamaPath)) {
          if (!unlink($fileLamaPath)) {
            session()->setFlashdata('Message', [
              'title' => 'Gagal menghapus file lama: ' . $imageToDelete,
              'type' => 'error'
            ]);
          }
        } else {
          session()->setFlashdata('Message', [
            'title' => 'File lama tidak ditemukan: ' . $imageToDelete,
            'type' => 'warning'
          ]);
        }
      }
    }

    if ($fileGambar->getError() == 4) {
      $namaGambar = $namaGambarLama; // Use the old image if no new one is uploaded
    } else {
      $namaGambar = $fileGambar->getRandomName();
      $fileGambar->move('img/profile/', $namaGambar); // Move the new file to the server
      $fileLamaPath = 'img/profile/' . $namaGambarLama;
      if (file_exists($fileLamaPath)) {
        unlink($fileLamaPath); // Unlink the old image file
      }
    }

    // Prepare data to be updated
    $dataToEdit = $this->request->getVar();
    $dataToEdit['link_gambar_edit'] = $namaGambar; // Update new image name
    $dataToEdit['latar_belakang_pendidikan_edit'] = json_encode($dataToEdit['latar_belakang_pendidikan_edit']);
    $dataToEdit['penghargaan_edit'] = json_encode($dataToEdit['penghargaan_edit']);

    $dataToEdit['link_gambar_content'] = json_encode($newImagesArray);
    unset($dataToEdit['link_gambar_edit_old']); // Remove the old image field

    $result = $this->profileModel->edit($id_profil, $dataToEdit); // query

    if ($result) {
      $message = 'Data updated !';
    } else {
      $message = 'Updating Data Failed !';
    }
    session()->setFlashdata('Message', ['title' => $message]);

    return redirect()->to(base_url() . 'admin/profil');
  }


  public function uploadImage()
  {
    $fileGambar = $this->request->getFile('upload');
    $namaGambar = $fileGambar->getRandomName();
    $fileGambar->move('img/profile/', $namaGambar);
    if ($fileGambar) {
      $message = "";
      $functionNumber = $_GET['CKEditorFuncNum'];
      $url = base_url("img/profile/" . $namaGambar);
      echo "
      <script type='text/javascript'>
        window.parent.CKEDITOR.tools.callFunction($functionNumber, '$url', '$message');
        var imageInput = window.parent.document.getElementById('link_gambar_content_edit');
        var currentImages = imageInput.value ? JSON.parse(imageInput.value) : [];
        currentImages.push('$namaGambar');
        imageInput.value = JSON.stringify(currentImages);
      </script>
      ";
    }
  }
}
