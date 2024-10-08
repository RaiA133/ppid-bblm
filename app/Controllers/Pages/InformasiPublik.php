<?php

namespace App\Controllers\Pages;

use App\Controllers\BaseController;

class InformasiPublik extends BaseController
{
    public function InformasiBerkala(): string
    {
        return view('Pages/InformasiPublik/InformasiBerkala');
    }

    public function InformasiSetiapSaat(): string
    {
        return view('Pages/InformasiPublik/InformasiSetiapSaat');
    }

    public function InformasiSertaMerta(): string
    {
        return view('Pages/InformasiPublik/InformasiSertaMerta');
    }
}
