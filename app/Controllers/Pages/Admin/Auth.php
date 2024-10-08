<?php

namespace App\Controllers\Pages\Admin;

use App\Controllers\BaseController;

class Auth extends BaseController
{
    public function login(): string
    {
        $data = [
            'title' => 'Login'
        ];
        return view('Pages/Admin/Auth/Login', $data);
    }
}
