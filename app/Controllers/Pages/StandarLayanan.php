<?php

namespace App\Controllers\Pages;

use App\Controllers\BaseController;

class StandarLayanan extends BaseController
{
    public function TataCaraPermohonanInformasi(): string
    {
        return view('Pages/StandarLayanan/TataCaraPermohonanInformasi');
    }

    public function MekanismeKeberatan(): string
    {
        return view('Pages/StandarLayanan/MekanismeKeberatan');
    }

    public function MekanismePermohonanPenyelesaianSengketa(): string
    {
        return view('Pages/StandarLayanan/MekanismePermohonanPenyelesaianSengketa');
    }

    public function MaklumatPelayanan(): string
    {
        return view('Pages/StandarLayanan/MaklumatPelayanan');
    }

    public function StandarBiayaPelayanan(): string
    {
        return view('Pages/StandarLayanan/StandarBiayaPelayanan');
    }

    public function WaktuPelayanan(): string
    {
        return view('Pages/StandarLayanan/WaktuPelayanan');
    }
}
