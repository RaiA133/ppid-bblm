<?php

namespace App\Controllers\Pages\Admin;

use App\Controllers\BaseController;

class Auth extends BaseController
{
    public function login(): string
    {
        return view('Pages/Admin/Auth/Login');
    }
}
