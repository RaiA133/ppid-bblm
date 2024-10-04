<?php

namespace App\Controllers\Pages;

use App\Controllers\BaseController;

class LayananInformasi extends BaseController
{
    public function PermohonanInformasi(): string
    {
        return view('Pages/LayananInformasi/PermohonanInformasi');
    }

    public function UnitPelayananPublik(): string
    {
        return view('Pages/LayananInformasi/UnitPelayananPublik');
    }

    public function LaporanLayananInformasi(): string
    {
        return view('Pages/LayananInformasi/LaporanLayananInformasi');
    }
}
