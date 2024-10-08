<?php

namespace App\Controllers\Pages\User;

use App\Controllers\BaseController;

class LayananInformasi extends BaseController
{
    public function PermohonanInformasi(): string
    {
        return view('Pages/User/LayananInformasi/PermohonanInformasi');
    }

    public function UnitPelayananPublik(): string
    {
        return view('Pages/User/LayananInformasi/UnitPelayananPublik');
    }

    public function LaporanLayananInformasi(): string
    {
        return view('Pages/User/LayananInformasi/LaporanLayananInformasi');
    }
}
