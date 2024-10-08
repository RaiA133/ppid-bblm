<?php

namespace App\Controllers\Pages\User;

use App\Controllers\BaseController;

class InformasiPublik extends BaseController
{
    public function InformasiBerkala(): string
    {
        return view('Pages/User/InformasiPublik/InformasiBerkala');
    }

    public function InformasiSetiapSaat(): string
    {
        return view('Pages/User/InformasiPublik/InformasiSetiapSaat');
    }

    public function InformasiSertaMerta(): string
    {
        return view('Pages/User/InformasiPublik/InformasiSertaMerta');
    }
}
