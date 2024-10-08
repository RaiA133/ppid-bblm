<?php

namespace App\Controllers\Pages\User;

use App\Controllers\BaseController;

class HubungiKami extends BaseController
{
    public function index(): string
    {
        return view('Pages/User/HubungiKami');
    }
}
