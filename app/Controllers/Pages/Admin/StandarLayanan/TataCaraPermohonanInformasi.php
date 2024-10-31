<?php

namespace App\Controllers\Pages\Admin\StandarLayanan;

use App\Controllers\BaseController;
use App\Models\StandarLayanan\TataCaraPermohonanInformasiModel;

class TataCaraPermohonanInformasi extends BaseController
{
  protected $tataCaraPermohonanInformasiModel;
  public function __construct()
  {
    $this->tataCaraPermohonanInformasiModel = new TataCaraPermohonanInformasiModel();
  }

  public function index()
  {
    $results = $this->tataCaraPermohonanInformasiModel->findAll();
    $data = [
      'title' => 'Halaman Tata Cara Permohonan Informasi',
      'results' => $results[0] ?? null,
    ];
    return view('Pages/Admin/Pages/StandarLayanan/TataCaraPermohonanInformasi/Index', $data);
  }

  public function indexUpdate($id_tata_cara_permohonan_informasi)
  {
    $validationRule = [
      // 'content_edit' => [
      //   'rules' => 'required',
      //   'errors' => ['required' => 'Konten harus diisi'],
      // ],
      'link_gambar_edit' => [
        'label' => 'Link Gambar',
        'rules' => [
          // 'uploaded[link_gambar_edit]',
          'max_size[link_gambar_edit,5120]',
          'is_image[link_gambar_edit]',
          'mime_in[link_gambar_edit,image/jpg,image/jpeg,image/png]',
        ],
      ],
    ];
    if (! $this->validate($validationRule)) {
      return redirect()->back()->withInput();
    }

    $fileGambar = $this->request->getFile('link_gambar_edit');
    $namaGambarLama = $this->request->getVar('link_gambar_edit_old');

    $namaLinkGambarContentLama = $this->tataCaraPermohonanInformasiModel->find($id_tata_cara_permohonan_informasi)['link_gambar_content'];
    $oldImagesArray = json_decode($namaLinkGambarContentLama, true); // Convert JSON to array
    $newImagesArray = json_decode($this->request->getVar('link_gambar_content_edit'), true);

    if ($oldImagesArray) {
      $imagesToUnlink = array_diff($oldImagesArray, $newImagesArray);
      foreach ($imagesToUnlink as $imageToDelete) {
        $fileLamaPath = 'img/standarLayanan/tataCaraPermohonanInformasi/' . $imageToDelete;
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
      $fileGambar->move('img/standarLayanan/tataCaraPermohonanInformasi/', $namaGambar); // Move the new file to the server
      $fileLamaPath = 'img/standarLayanan/tataCaraPermohonanInformasi/' . $namaGambarLama;
      if (is_file($fileLamaPath) && file_exists($fileLamaPath)) {
        unlink($fileLamaPath); // Unlink the old image file
      }
    }

    // Prepare data to be updated
    $dataToEdit = $this->request->getVar();
    $dataToEdit['link_gambar_edit'] = $namaGambar; // Update new image name

    $dataToEdit['link_gambar_content'] = json_encode($newImagesArray);
    unset($dataToEdit['link_gambar_edit_old']); // Remove the old image field

    $result = $this->tataCaraPermohonanInformasiModel->edit($id_tata_cara_permohonan_informasi, $dataToEdit);

    if ($result) {
      $message = 'Data updated !';
    } else {
      $message = 'Updating Data Failed !';
    }
    session()->setFlashdata('Message', ['title' => $message]);

    return redirect()->to(base_url() . 'admin/tata-cara-permohonan-informasi');
  }


  // OLD
  public function uploadImage()
  {
    $fileGambar = $this->request->getFile('upload');
    $namaGambar = $fileGambar->getRandomName();
    $fileGambar->move('img/standarLayanan/tataCaraPermohonanInformasi/', $namaGambar);
    if ($fileGambar) {
      $message = "";
      $functionNumber = $_GET['CKEditorFuncNum'];
      $url = base_url("img/standarLayanan/tataCaraPermohonanInformasi/" . $namaGambar);
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

  public function linkGambarDelete($id_tata_cara_permohonan_informasi)
  {
    $record = $this->tataCaraPermohonanInformasiModel->find($id_tata_cara_permohonan_informasi);
    if ($record && !empty($record['link_gambar'])) {
      $namaGambar = $record['link_gambar'];
      $filePath = 'img/standarLayanan/tataCaraPermohonanInformasi/' . $namaGambar;
      if (file_exists($filePath)) {
        if (unlink($filePath)) {
          $this->tataCaraPermohonanInformasiModel->set('link_gambar', null)->where('id_tata_cara_permohonan_informasi', $id_tata_cara_permohonan_informasi)->update();
          $message = 'Image successfully deleted!';
        } else {
          $message = ' Failed to delete image!';
        }
      } else {
        $message = 'Image not found or previously deleted!';
      }
    } else {
      $message = 'No images found to delete!';
    }
    session()->setFlashdata('Message', ['title' => $message]);
    return redirect()->to(base_url('admin/tata-cara-permohonan-informasi'));
  }
}
