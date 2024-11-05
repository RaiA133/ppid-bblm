<?php

namespace App\Controllers\Pages\Admin\LayananInformasi;

use App\Controllers\BaseController;
use App\Models\LayananInformasi\UnitPelayananPublikModel;

class UnitPelayananPublik extends BaseController
{
  protected $unitPelayananPublikModel;
  public function __construct()
  {
    $this->unitPelayananPublikModel = new UnitPelayananPublikModel();
  }

  public function index()
  {
    $results = $this->unitPelayananPublikModel->findAll();
    $data = [
      'title' => 'Halaman Unit Pelayanan Publik',
      'results' => $results[0] ?? null,
    ];
    return view('Pages/Admin/Pages/LayananInformasi/UnitPelayananPublik/Index', $data);
  }

  public function indexUpdate($id_unit_pelayanan_publik)
  {
    $validationRule = [
      'link_gambar_edit' => [
        'label' => 'Link Gambar',
        'rules' => [
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

    $namaLinkGambarContentLama = $this->unitPelayananPublikModel->find($id_unit_pelayanan_publik)['link_gambar_content'];
    $oldImagesArray = json_decode($namaLinkGambarContentLama, true); // Convert JSON to array
    $newImagesArray = json_decode($this->request->getVar('link_gambar_content_edit'), true);

    if ($oldImagesArray) {
      $imagesToUnlink = array_diff($oldImagesArray, $newImagesArray);
      foreach ($imagesToUnlink as $imageToDelete) {
        $fileLamaPath = 'img/layananInformasi/unitPelayananPublik/' . $imageToDelete;
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
      $fileGambar->move('img/layananInformasi/unitPelayananPublik/', $namaGambar); // Move the new file to the server
      $fileLamaPath = 'img/layananInformasi/unitPelayananPublik/' . $namaGambarLama;
      if (is_file($fileLamaPath) && file_exists($fileLamaPath)) {
        unlink($fileLamaPath); // Unlink the old image file
      }
    }

    // Prepare data to be updated
    $dataToEdit = $this->request->getVar();
    $dataToEdit['link_gambar_edit'] = $namaGambar; // Update new image name

    $dataToEdit['link_gambar_content'] = json_encode($newImagesArray);
    unset($dataToEdit['link_gambar_edit_old']); // Remove the old image field

    $result = $this->unitPelayananPublikModel->edit($id_unit_pelayanan_publik, $dataToEdit);

    if ($result) {
      $message = 'Data updated !';
    } else {
      $message = 'Updating Data Failed !';
    }
    session()->setFlashdata('Message', ['title' => $message]);

    return redirect()->to(base_url() . 'admin/unit-pelayanan-publik');
  }


  // OLD
  public function uploadImage()
  {
    $fileGambar = $this->request->getFile('upload');
    $namaGambar = $fileGambar->getRandomName();
    $fileGambar->move('img/layananInformasi/unitPelayananPublik/', $namaGambar);
    if ($fileGambar) {
      $message = "";
      $functionNumber = $_GET['CKEditorFuncNum'];
      $url = base_url("img/layananInformasi/unitPelayananPublik/" . $namaGambar);
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

  public function linkGambarDelete($id_unit_pelayanan_publik)
  {
    $record = $this->unitPelayananPublikModel->find($id_unit_pelayanan_publik);
    if ($record && !empty($record['link_gambar'])) {
      $namaGambar = $record['link_gambar'];
      $filePath = 'img/layananInformasi/unitPelayananPublik/' . $namaGambar;
      if (file_exists($filePath)) {
        if (unlink($filePath)) {
          $this->unitPelayananPublikModel->set('link_gambar', null)->where('id_unit_pelayanan_publik', $id_unit_pelayanan_publik)->update();
          $message = 'Image successfully deleted!';
        } else {
          $message = ' Failed to delete image!';
        }
      } else {
        $this->unitPelayananPublikModel->set('link_gambar', null)->where('id_unit_pelayanan_publik', $id_unit_pelayanan_publik)->update();
        $message = 'Image not found or previously deleted!';
      }
    } else {
      $message = 'No images found to delete!';
    }
    session()->setFlashdata('Message', ['title' => $message]);
    return redirect()->to(base_url('admin/unit-pelayanan-publik'));
  }
}
