<?php

namespace App\Controllers\Pages\Admin;

use App\Controllers\BaseController;
use App\Models\MaklumatPelayananModel;

class MaklumatPelayanan extends BaseController
{
  protected $maklumatpelayananModel;

  public function __construct()
  {
    $this->maklumatpelayananModel = new MaklumatPelayananModel();
  }

  public function index()
  {
    // Pagination & Searching
    $currentPage = $this->request->getVar('page_maklumat_pelayanan') ?? 1;
    $dataCountOnePage = 10;

    $keyword = $this->request->getVar('keyword') ?? '';
    if ($keyword) {
      $maklumat_pelayanan = $this->maklumatpelayananModel->search($keyword);
    } else {
      $maklumat_pelayanan = $this->maklumatpelayananModel;
    }

    $results = $maklumat_pelayanan->paginate($dataCountOnePage, 'maklumat_pelayanan');
    $data = [
      'title' => 'Data Maklumat Pelayanan',
      'validation' => session('validation'),
      'pager' => $this->maklumatpelayananModel->pager,
      'currentPage' => $currentPage,
      'dataCountOnePage' => $dataCountOnePage,
      'results' => $results,
      'keyword' => $keyword,
    ];
    return view('Pages/Admin/Pages/StandarLayanan/MaklumatPelayanan/Index', $data);
  }

  public function indexUpdate($id_maklumat_pelayanan)
  {
    // Validate input
    if (!$this->validate([
      'link_gambar_edit' => [
        'rules' => 'is_image[link_gambar_edit]|mime_in[link_gambar_edit,image/jpg,image/jpeg,image/png]',
        'errors' => [
          'is_image' => 'Yang diupload harus berupa gambar',
          'mime_in' => 'Format gambar harus JPG, JPEG, atau PNG',
        ],
      ],
      'content_edit' => [
        'rules' => 'required',
        'errors' => ['required' => 'Konten harus diisi'],
      ],
    ])) {
      $validation = \Config\Services::validation();
      return redirect()->back()->withInput()->with('validation', $validation)->with('openModalEditDataMaklumatPelayanan' . $id_maklumat_pelayanan, true);
    }

    // Get the uploaded image
    $fileGambar = $this->request->getFile('link_gambar_edit');
    $dataToEdit = [
      'content' => $this->request->getVar('content_edit'),
    ];

    if ($fileGambar->isValid() && !$fileGambar->hasMoved()) {
      // Get old data to delete the old image
      $dataLama = $this->maklumatpelayananModel->find($id_maklumat_pelayanan);

      // Delete the old image if a new one is uploaded
      if (file_exists($dataLama['link_gambar'])) {
        unlink($dataLama['link_gambar']);
      }

      // Save the new image
      $newName = $fileGambar->getRandomName();
      $fileGambar->move('uploads/maklumatpelayanan', $newName);
      $dataToEdit['link_gambar'] = 'uploads/maklumatpelayanan/' . $newName;
    }

    $result = $this->maklumatpelayananModel->update($id_maklumat_pelayanan, $dataToEdit);

    $message = $result ? 'Data updated!' : 'Updating Data Failed!';
    session()->setFlashdata('Message', [
      'title' => $message,
    ]);

    return redirect()->to('/admin/maklumat-pelayanan');
  }

  public function indexDelete($id_maklumat_pelayanan)
  {
    // Get the image data from the database before deleting
    $data = $this->maklumatpelayananModel->find($id_maklumat_pelayanan);

    // Delete the data from the database
    $result = $this->maklumatpelayananModel->delete($id_maklumat_pelayanan);

    // If the data was successfully deleted, also delete the image file from the folder
    if ($result) {
      if (file_exists($data['link_gambar'])) {
        unlink($data['link_gambar']);
      }
      session()->setFlashdata('Message', [
        'title' => 'Data deleted!',
      ]);
    } else {
      session()->setFlashdata('Message', [
        'title' => 'Deleting Data Failed!',
      ]);
    }

    return redirect()->to('/admin/maklumat-pelayanan');
  }

  public function uploadImage()
  {
    if (isset($_FILES['upload']['tmp_name'])) {
      $file = $_FILES['upload']['tmp_name'];
      $fileName = $_FILES['upload']['name'];
      $fileNameArray = explode(".", $fileName);
      $extension = strtolower(end($fileNameArray));
      $newImageName = uniqid() . "." . $extension;

      $allowedExtension = array("jpg", "jpeg", "png");

      if (in_array($extension, $allowedExtension)) {
        $uploadPath = FCPATH . "public/ckeditor/samples/img/";

        if (!is_dir($uploadPath)) {
          mkdir($uploadPath, 0755, true);
        }

        if (move_uploaded_file($file, $uploadPath . $newImageName)) {
          $functionNumber = $_GET['CKEditorFuncNum'];
          $url = base_url("public/ckeditor/samples/img/" . $newImageName);
          $message = "";
          echo "<script type='text/javascript'>window.parent.CKEDITOR.tools.callFunction($functionNumber, '$url', '$message');</script>";
        } else {
          $functionNumber = $_GET['CKEditorFuncNum'];
          $message = "Upload gambar gagal.";
          echo "<script type='text/javascript'>window.parent.CKEDITOR.tools.callFunction($functionNumber, '', '$message');</script>";
        }
      } else {
        $functionNumber = $_GET['CKEditorFuncNum'];
        $message = "Ekstensi file tidak diperbolehkan. Hanya file JPG, JPEG, PNG yang diizinkan.";
        echo "<script type='text/javascript'>window.parent.CKEDITOR.tools.callFunction($functionNumber, '', '$message');</script>";
      }
    } else {
      error_log("No file uploaded.");
    }
  }
}
