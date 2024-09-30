<?php

namespace App\Controllers\Pages;

use App\Controllers\BaseController;

class Regulasi extends BaseController
{
    public function index(): string
    {
        return view('Pages/Regulasi');
    }
}
