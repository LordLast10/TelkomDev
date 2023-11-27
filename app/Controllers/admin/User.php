<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\UserModel;
use App\Models\RolesModel;
use App\Models\UnitModel;

class User extends BaseController
{
    protected $userModel;
    protected $rolesModel;
    protected $unitModel;
    public function __construct()
    {
        $this->userModel = new UserModel();
        $this->rolesModel = new RolesModel();
        $this->unitModel = new UnitModel();
    }

    public function index()
    {
        $users = $this->userModel->getUser();
        $data = [
            'title' => 'User edit',
            'users' => $users
        ];
        return view('admin/users', $data);
    }

    // handle to view user edit
    public function viewedit($id)
    {
        $user = $this->userModel->getUser($id);
        $units = $this->unitModel->getUnit();
        $roles = $this->rolesModel->getRoles();
        $data = [
            'title' => 'User Edit',
            'user' => $user,
            'roles' => $roles,
            'units' => $units
        ];
        return view('admin/edituser', $data);
    }
    // handle to form post edit user
    public function edit($id)
    {
        $data = [
            'Nama_Depan'         => $this->request->getPost('namadepan'),
            'Nama_Belakang'      => $this->request->getPost('namabelakang'),
            'Email'              => $this->request->getPost('email'),
            'User_Type'          => $this->request->getPost('usertype'),
            'Role_ID'            => $this->request->getPost('role'),
            'activate'           => $this->request->getPost('activate'),
            'Username'           => $this->request->getPost('nama'),
            'Unit_ID'            => $this->request->getPost('unit'),
        ];
        $this->userModel->updateUser($id, $data);
        return redirect()->to(base_url('admin/users'));
    }
    public function delete($id)
    {
        $this->userModel->deleteUser($id);
        return redirect()->to(base_url('admin/users'));
    }
}
