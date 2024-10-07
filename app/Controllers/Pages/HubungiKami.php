<?php

namespace App\Controllers\Pages;

use App\Controllers\BaseController;

class HubungiKami extends BaseController
{
    public function index(): string
    {
        return view('Pages/HubungiKami');
    }
}
