<?php

namespace App\Controllers\Pages;

use App\Controllers\BaseController;

class Profil extends BaseController
{
    public function index(): string
    {
        return view('Pages/Profil');
    }
}
