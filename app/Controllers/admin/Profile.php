<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\UserModel;

class Profile extends BaseController
{
    protected $userModel;
    public function __construct()
    {
        $this->userModel = new UserModel();
    }
    public function index()
    {
        $userId = session()->get('user_id');
        $profile = $this->userModel->getUser($userId);
        $data = [
            'title' => 'Profil | Admin',
            'profile' => $profile
        ];

        return view('admin/profile', $data);
    }
}
