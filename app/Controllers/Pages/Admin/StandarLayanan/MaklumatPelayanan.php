<?php

namespace App\Controllers\Pages\Admin\StandarLayanan;

use App\Controllers\BaseController;
use App\Models\StandarLayanan\MaklumatPelayananModel;

class MaklumatPelayanan extends BaseController
{
  protected $maklumatPelayananModel;
  public function __construct()
  {
    $this->maklumatPelayananModel = new MaklumatPelayananModel();
  }

  public function index()
  {
    $results = $this->maklumatPelayananModel->findAll();
    $data = [
      'title' => 'Halaman Maklumat Pelayanan',
      'results' => $results[0] ?? null,
    ];
    return view('Pages/Admin/Pages/StandarLayanan/MaklumatPelayanan/Index', $data);
  }

  public function indexUpdate($id_maklumat_pelayanan)
  {
    $validationRule = [
      'content_edit' => [
        'rules' => 'required',
        'errors' => ['required' => 'Konten harus diisi'],
      ],
    ];
    if (! $this->validate($validationRule)) {
      return redirect()->back()->withInput();
    }

    $namaLinkGambarContentLama = $this->maklumatPelayananModel->find($id_maklumat_pelayanan)['link_gambar_content'];
    $oldImagesArray = json_decode($namaLinkGambarContentLama, true); // Convert JSON to array
    $newImagesArray = json_decode($this->request->getVar('link_gambar_content_edit'), true);

    if ($oldImagesArray) {
      $imagesToUnlink = array_diff($oldImagesArray, $newImagesArray);
      foreach ($imagesToUnlink as $imageToDelete) {
        $fileLamaPath = 'img/standarLayanan/maklumatPelayanan/' . $imageToDelete;
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

    // Prepare data to be updated
    $dataToEdit = $this->request->getVar();
    $dataToEdit['link_gambar_content'] = json_encode($newImagesArray);

    $result = $this->maklumatPelayananModel->edit($id_maklumat_pelayanan, $dataToEdit);

    if ($result) {
      $message = 'Data updated !';
    } else {
      $message = 'Updating Data Failed !';
    }
    session()->setFlashdata('Message', ['title' => $message]);

    return redirect()->to(base_url() . 'admin/maklumat-pelayanan');
  }


  // OLD
  public function uploadImage()
  {
    $fileGambar = $this->request->getFile('upload');
    $namaGambar = $fileGambar->getRandomName();
    $fileGambar->move('img/standarLayanan/maklumatPelayanan/', $namaGambar);
    if ($fileGambar) {
      $message = "";
      $functionNumber = $_GET['CKEditorFuncNum'];
      $url = base_url("img/standarLayanan/maklumatPelayanan/" . $namaGambar);
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
