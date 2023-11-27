<?php

namespace App\Controllers\customer;

use App\Controllers\BaseController;
use App\Models\UserModel;

class EditProfile extends BaseController
{
    protected $userModel;
    public function __construct()
    {
        $this->userModel = new UserModel();
    }

    public function index()
    {
        $id = session()->get('user_id');
        $user = $this->userModel->getUser($id);
        $data = [
            'title' => 'Customer | Edit-Profile',
            'user'  => $user

        ];
        return view('customer/ubahprofile', $data);
    }

    public function edit()
    {
        $request = $this->request;
        $session = session();
        $user_id = $session->get('user_id');

        $validate = [
            'image' =>
            'uploaded[image]|mime_in[image,image/jpg,image/jpeg,image/png]|max_size[image,1024]',
        ];
        if (!$this->validate($validate)) {
            $errors = $this->validator->getErrors();
            return redirect()->to(base_url('customer/profile/edit'))->withInput()->with('errors', $errors);
        }
        $file = $request->getFile('image');

        $file->move(ROOTPATH . 'public/img/profile');
        $namaBelakang = $request->getPost('nama_belakang');
        $namaDepan = $request->getPost('nama_depan');
        $data = [
            'Nama_Depan' => $namaDepan,
            'Nama_Belakang' => $namaBelakang,
            'Image' => $this->cleanFilename($file->getName()),
        ];
        $this->userModel->updateUser($user_id, $data);
        return redirect()->to(base_url('customer/profile'))->with('success', 'Profile berhasil diubah');
    }
    private function cleanFilename($filename)
    {
        // Menghapus karakter yang tidak diinginkan dari nama file
        return preg_replace("/[^a-zA-Z0-9.]/", "_", $filename);
    }
}
