<?php

namespace App\Controllers\Pages\Admin;

use App\Controllers\BaseController;

class Dashboard extends BaseController
{
    public function index(): string
    {
        return view('Pages/Admin/Dashboard');
    }
}
