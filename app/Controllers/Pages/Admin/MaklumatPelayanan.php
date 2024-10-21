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
    // PAGINATION & SEARCHING
    $currentPage = $this->request->getVar('page_maklumat_pelayanan') ?? 1;
    $dataCountOnePage = 10;

    $keyword = $this->request->getVar('keyword') ?? ''; // Nilai default jika tidak ada keyword
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
      'keyword' => $keyword, // Menyimpan keyword di sini
    ];
    return view('Pages/Admin/Pages/StandarLayanan/MaklumatPelayanan/Index', $data);
  }

  public function indexCreate()
  {
    // Validasi input
    if (!$this->validate([
      'link_gambar_create' => [
        'rules' => 'uploaded[link_gambar_create]|is_image[link_gambar_create]|mime_in[link_gambar_create,image/jpg,image/jpeg,image/png]',
        'errors' => [
          'uploaded' => 'Gambar harus diupload',
          'is_image' => 'Yang diupload harus berupa gambar',
          'mime_in' => 'Format gambar harus JPG, JPEG, atau PNG'
        ]
      ],
      'content_create' => [
        'rules' => 'required',
        'errors' => ['required' => 'Konten harus diisi']
      ]
    ])) {
      $validation = \Config\Services::validation();
      return redirect()->back()->withInput()->with('validation', $validation)->with('openModalAddDataMaklumatPelayanan', true);
    }

    // Proses upload gambar
    $fileGambar = $this->request->getFile('link_gambar_create');
    $newName = $fileGambar->getRandomName(); // Generate nama baru
    $fileGambar->move('uploads/maklumatpelayanan', $newName); // Pindahkan gambar ke folder uploads/maklumatpelayanan

    $data = [
      'link_gambar' => 'uploads/maklumatpelayanan/' . $newName, // Simpan path gambar ke database
      'content' => $this->request->getVar('content_create')
    ];
    $this->maklumatpelayananModel->insert($data);

    session()->setFlashdata('Message', [
      'title' => 'New data added!',
    ]);

    return redirect()->to('/admin/maklumat-pelayanan');
  }

  public function indexUpdate($id_maklumat_pelayanan)
  {
    // Validasi input
    if (!$this->validate([
      'link_gambar_edit' => [
        'rules' => 'is_image[link_gambar_edit]|mime_in[link_gambar_edit,image/jpg,image/jpeg,image/png]',
        'errors' => [
          'is_image' => 'Yang diupload harus berupa gambar',
          'mime_in' => 'Format gambar harus JPG, JPEG, atau PNG'
        ]
      ],
      'content_edit' => [
        'rules' => 'required',
        'errors' => ['required' => 'Konten harus diisi']
      ]
    ])) {
      $validation = \Config\Services::validation();
      return redirect()->back()->withInput()->with('validation', $validation)->with('openModalEditDataMaklumatPelayanan' . $id_maklumat_pelayanan, true);
    }

    $dataToEdit = $this->request->getVar();

    // Proses upload gambar (opsional)
    $fileGambar = $this->request->getFile('link_gambar_edit');
    if ($fileGambar->isValid() && !$fileGambar->hasMoved()) {
      // Ambil data lama untuk menghapus gambar lama
      $dataLama = $this->maklumatpelayananModel->find($id_maklumat_pelayanan);

      // Hapus gambar lama jika ada gambar baru yang diupload
      if (file_exists($dataLama['link_gambar'])) {
        unlink($dataLama['link_gambar']);
      }

      // Simpan gambar baru
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
    // Ambil data gambar dari database sebelum menghapus
    $data = $this->maklumatpelayananModel->find($id_maklumat_pelayanan);

    // Hapus data dari database
    $result = $this->maklumatpelayananModel->delete($id_maklumat_pelayanan);

    // Jika data berhasil dihapus, hapus juga file gambar dari folder
    if ($result) {
      if (file_exists($data['link_gambar'])) {
        unlink($data['link_gambar']); // Menghapus file gambar dari folder
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
}
