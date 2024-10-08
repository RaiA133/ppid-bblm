<?php

namespace App\Controllers\Pages\User;

use App\Controllers\BaseController;

class StandarLayanan extends BaseController
{
    public function TataCaraPermohonanInformasi(): string 
    {
        return view('Pages/User/StandarLayanan/TataCaraPermohonanInformasi');
    }

    public function MekanismeKeberatan(): string
    {
        return view('Pages/User/StandarLayanan/MekanismeKeberatan');
    }

    public function MekanismePermohonanPenyelesaianSengketa(): string
    {
        return view('Pages/User/StandarLayanan/MekanismePermohonanPenyelesaianSengketa');
    }

    public function MaklumatPelayanan(): string
    {
        return view('Pages/User/StandarLayanan/MaklumatPelayanan');
    }

    public function StandarBiayaPelayanan(): string
    {
        return view('Pages/User/StandarLayanan/StandarBiayaPelayanan');
    }

    public function WaktuPelayanan(): string
    {
        return view('Pages/User/StandarLayanan/WaktuPelayanan');
    }
}
