<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
	// initial to table document
	protected $table = 'pengguna';
	// protected $primaryKey = 'unit_id';

	public function authenticate($username, $password)
	{
		$builder = $this->db->table($this->table);
		$builder->join('units', 'units.unit_id = pengguna.Unit_ID');
		$builder->join('roles', 'roles.ID_Role = pengguna.Role_ID');
		$user = $builder->where('Username', $username)->get()->getRow();
		if (password_verify($password, $user->Password)) {
			return $user;
		}
		return false;
	}



	public function register($data)
	{
		$builder = $this->db->table($this->table);
		$builder->insert($data);
	}

	public function getUser($id = false)
	{
		$builder = $this->db->table($this->table);
		if ($id === false) {
			$builder->join('units', 'units.unit_id = pengguna.Unit_ID');
			$user =  $builder->get();
			return $user->getResult();
		}
		$builder->join('units', 'units.unit_id = pengguna.Unit_ID');
		$builder->join('roles', 'roles.ID_Role = pengguna.Role_ID');
		$builder->where('pengguna.ID', $id);
		$user =  $builder->get();
		// jangan berbentuk array
		return $user->getRow();
	}

	public function updateUser($id, $data)
	{
		$builder = $this->db->table($this->table);
		$builder->where('ID',	$id);
		$builder->update($data);
	}
	public function deleteUser($id)
	{
		$builder = $this->db->table($this->table);
		$builder->where('ID', $id);
		$builder->delete();
	}
}
