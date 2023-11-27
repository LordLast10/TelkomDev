<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;

class Dasboard extends BaseController
{
    public function index()
    {
        $data = [
            'title' => 'Dashboard | Admin',
        ];
        return view('admin/dashboard', $data);
    }
}
