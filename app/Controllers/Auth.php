<?php

namespace App\Controllers;

use App\Models\UnitModel;
use App\Models\UserModel;

class Auth extends BaseController
{
	protected $userModel;
	protected $unitModel;
	public function __construct()
	{
		helper('form'); // Load the form helper
		$this->userModel = new UserModel();
		$this->unitModel = new UnitModel();
	}

	public function index()
	{
		$data = [
			'title' => 'Auth',
			'units' => $this->unitModel->findAll(),
		];
		return view('auth/index', $data);
	}

	// handle login user
	public function login()
	{
		$session  = session();
		$model = $this->userModel;
		$username = $this->request->getVar('username');
		$password = $this->request->getVar('password');

		$user = $model->authenticate($username, $password);
		if ($user != null) {
			$ses_data = [
				'user_id' => $user->ID,
				'username' => $user->Username,
				'first_name' => $user->Nama_Depan,
				'last_name' => $user->Nama_Belakang,
				'role_id' => $user->Role_ID,
				'role_name' => $user->Nama_Role,
				'email' => $user->Email,
				'image' => $user->Image,
				'type_user' => $user->User_Type,
				'unit' => $user->unit_name,
				'unit_id' => $user->unit_id,
			];

			$session->set($ses_data);

			if ($user->User_Type == 'Admin') {
				return redirect()->to(base_url('admin/dasboard'));
			}
			if ($user->User_Type == 'User') {
				return redirect()->to(base_url('customer/dasboard'));
			}
		} else {
			$session->setFlashdata('msg', 'Username or Password is wrong');
			return redirect()->to(base_url('auth'));
		}
	}

	public function logout()
	{
		$session = session();
		$session->destroy();
		return redirect()->to(base_url('auth'));
	}

	public function register()
	{

		$data = array(
			'Nama_Depan' => $this->request->getPost('nama_depan'),
			'Nama_Belakang' => $this->request->getPost('nama_belakang'),
			'Email' => $this->request->getPost('email'),
			'Password' => password_hash($this->request->getVar('password'), PASSWORD_BCRYPT),
			'Username' => $this->request->getPost('username'),
			'Unit_ID' => $this->request->getVar('unit'),
		);

		$this->userModel->register($data);
		return redirect()->to(base_url('auth'));
	}
}
