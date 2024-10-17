<?php

namespace App\Controllers\Pages\User;

use App\Controllers\BaseController;
use App\Models\RegulasiModel;

class Regulasi extends BaseController
{
    protected $regulasiModel;
    public function __construct()
    {
        $this->regulasiModel = new RegulasiModel();
    }
    public function index()
    {
        $results = $this->regulasiModel->getRegulasi();
        $data = [
            'judul' => 'Halaman Regulasi',
            'results' => $results,
        ];
        return view('Pages/User/Regulasi', $data);
    }
}
