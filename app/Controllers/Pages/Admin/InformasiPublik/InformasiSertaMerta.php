<?php

namespace App\Controllers\Pages\Admin\InformasiPublik;

use App\Controllers\BaseController;

class InformasiSertaMerta extends BaseController
{
  public function index(): string
  {
    $data = [
      'title' => 'Informasi Berkala'
    ];
    return view('Pages/Admin/Pages/InformasiPublik/InformasiSertaMerta/Index', $data);
  }

  public function indexCreate()
  {

  }

  public function indexUpdate($id_informasi_berkala)
  {

  }

  public function indexDelete($id_informasi_berkala)
  {

  }
}
