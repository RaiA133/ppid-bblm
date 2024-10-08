<?php

namespace App\Controllers\Pages\User;

use App\Controllers\BaseController;

class Regulasi extends BaseController
{
    public function index(): string
    {
        return view('Pages/User/Regulasi');
    }
}
