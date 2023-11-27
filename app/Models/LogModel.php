<?php

namespace App\Models;

use CodeIgniter\Model;

class LogModel extends Model
{
    protected $table = 'log_aktivitas';

    public function getAllLog($id)
    {
        $builder = $this->db->table($this->table);

        $builder->orderBy('Waktu', 'DESC');
        $builder->join('pengguna', 'pengguna.ID = log_aktivitas.Pengguna_ID');
        $builder->join('roles', 'roles.ID_Role = log_aktivitas.role_review');
        $builder->where('log_aktivitas.dokumen_id', $id);
        return $builder->get()->getResultArray();
    }

    public function insertLog($data)
    {
        $builder = $this->db->table($this->table);
        $builder->insert($data);
    }

    // get history user after approve
    public function getHistoryaApprove($userId)
    {
        $builder = $this->db->table($this->table);
        $builder->join('dokumen', 'dokumen.ID_Doc = log_aktivitas.dokumen_id');
        $builder->where('log_aktivitas.Pengguna_ID', $userId);
        return $builder->get()->getResultArray();
    }
}
