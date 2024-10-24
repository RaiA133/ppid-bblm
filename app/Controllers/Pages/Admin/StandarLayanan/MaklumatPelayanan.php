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

  public function index($validation = null)
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
    // Validate input
    $validationRule = [
      // 'link_gambar_edit' => [
      //   'label' => 'Link Gambar',
      //   'rules' => [
      //     'max_size[link_gambar_edit,5120]',
      //     'is_image[link_gambar_edit]',
      //     'mime_in[link_gambar_edit,image/jpg,image/jpeg,image/png]',
      //   ],
      // ],
      'content_edit' => [
        'rules' => 'required',
        'errors' => ['required' => 'Konten harus diisi'],
      ],
    ];
    if (! $this->validate($validationRule)) {
      return redirect()->back()->withInput();
    }

    $dataToEdit = $this->request->getVar();
    // $dataToEdit['link_gambar_edit'] = $namaGambar;
    // unset($dataToEdit['link_gambar_edit_old']);
    // dd($dataToEdit);
    $result = $this->maklumatPelayananModel->edit($id_maklumat_pelayanan, $dataToEdit);

    if ($result) $message = 'Data updated !';
    else $message = 'Updating Data Failed !';
    session()->setFlashdata('Message', [
      'title' => $message,
    ]);

    return redirect()->to(base_url() . 'admin/maklumat-pelayanan');
  }

  // OLD
  //   public function uploadImage()
  //   {
  //     if (isset($_FILES['upload']['tmp_name'])) {
  //       $file = $_FILES['upload']['tmp_name'];
  //       $fileName = $_FILES['upload']['name'];
  //       $fileNameArray = explode(".", $fileName);
  //       $extension = strtolower(end($fileNameArray));
  //       $newImageName = uniqid() . "." . $extension;

  //       $allowedExtension = array("jpg", "jpeg", "png");

  //       if (in_array($extension, $allowedExtension)) {
  //         $uploadPath = FCPATH . "img/standarLayanan/maklumatPelayanan/";

  //         if (!is_dir($uploadPath)) {
  //           mkdir($uploadPath, 0755, true);
  //         }

  //         if (move_uploaded_file($file, $uploadPath . $newImageName)) {

  //           $dataMaklumatPelayanan = $this->maklumatPelayananModel->first();
  //           $dataToUpdateLinkGambar = [
  //             'id_maklumat_pelayanan' => $dataMaklumatPelayanan['id_maklumat_pelayanan'],
  //             'link_gambar' => json_encode($newImageName),
  //             'content' => $dataMaklumatPelayanan['content'],
  //           ];
  //           $this->maklumatPelayananModel->updateLinkGambar($dataToUpdateLinkGambar);

  //           $functionNumber = $_GET['CKEditorFuncNum'];
  //           $url = base_url("img/standarLayanan/maklumatPelayanan/" . $newImageName);
  //           $message = "";
  //           echo "<script type='text/javascript'>window.parent.CKEDITOR.tools.callFunction($functionNumber, '$url', '$message');</script>";
  //         } else {
  //           $functionNumber = $_GET['CKEditorFuncNum'];
  //           $message = "Upload gambar gagal.";
  //           echo "<script type='text/javascript'>window.parent.CKEDITOR.tools.callFunction($functionNumber, '', '$message');</script>";
  //         }
  //       } else {
  //         $functionNumber = $_GET['CKEditorFuncNum'];
  //         $message = "Ekstensi file tidak diperbolehkan. Hanya file JPG, JPEG, PNG yang diizinkan.";
  //         echo "<script type='text/javascript'>window.parent.CKEDITOR.tools.callFunction($functionNumber, '', '$message');</script>";
  //       }
  //     } else {
  //       error_log("No file uploaded.");
  //     }
  //   }
  // }


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
        $uploadPath = FCPATH . "img/standarLayanan/maklumatPelayanan/";

        if (!is_dir($uploadPath)) {
          mkdir($uploadPath, 0755, true);
        }

        if (move_uploaded_file($file, $uploadPath . $newImageName)) {
          // Ambil data maklumat pelayanan yang ada
          $dataMaklumatPelayanan = $this->maklumatPelayananModel->first();

          // Pastikan ID ada
          if ($dataMaklumatPelayanan) {
            // Siapkan data untuk diupdate
            $dataToUpdateLinkGambar = [
              'id_maklumat_pelayanan' => $dataMaklumatPelayanan['id_maklumat_pelayanan'],
              'link_gambar' => json_encode(["img/standarLayanan/maklumatPelayanan/" . $newImageName]), // Ganti dengan gambar baru
              'content' => $dataMaklumatPelayanan['content'], // Ambil content dari database
            ];

            // Panggil fungsi untuk update
            $updateSuccess = $this->maklumatPelayananModel->updateLinkGambar($dataToUpdateLinkGambar);

            // Cek apakah update berhasil
            if ($updateSuccess) {
              $functionNumber = $_GET['CKEditorFuncNum'];
              $url = base_url("img/standarLayanan/maklumatPelayanan/" . $newImageName);
              $message = "";
              echo "<script type='text/javascript'>window.parent.CKEDITOR.tools.callFunction($functionNumber, '$url', '$message');</script>";
            } else {
              // Jika update gagal
              $functionNumber = $_GET['CKEditorFuncNum'];
              $message = "Gagal mengupdate link gambar.";
              echo "<script type='text/javascript'>window.parent.CKEDITOR.tools.callFunction($functionNumber, '', '$message');</script>";
            }
          } else {
            // Jika tidak ada data yang diambil
            $functionNumber = $_GET['CKEditorFuncNum'];
            $message = "Data maklumat pelayanan tidak ditemukan.";
            echo "<script type='text/javascript'>window.parent.CKEDITOR.tools.callFunction($functionNumber, '', '$message');</script>";
          }
        } else {
          // Jika gagal upload
          $functionNumber = $_GET['CKEditorFuncNum'];
          $message = "Upload gambar gagal.";
          echo "<script type='text/javascript'>window.parent.CKEDITOR.tools.callFunction($functionNumber, '', '$message');</script>";
        }
      } else {
        // Jika ekstensi tidak diizinkan
        $functionNumber = $_GET['CKEditorFuncNum'];
        $message = "Ekstensi file tidak diperbolehkan. Hanya file JPG, JPEG, PNG yang diizinkan.";
        echo "<script type='text/javascript'>window.parent.CKEDITOR.tools.callFunction($functionNumber, '', '$message');</script>";
      }
    } else {
      error_log("No file uploaded.");
    }
  }
}
