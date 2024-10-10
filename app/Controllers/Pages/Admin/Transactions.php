<?php

namespace App\Controllers\Pages\Admin;

use App\Controllers\BaseController;

class Transactions extends BaseController
{
    public function index(): string
    {
        $data = [
            'title' => 'Transactions'
        ];
        return view('Pages/Admin/Transactions', $data);
    }
}
