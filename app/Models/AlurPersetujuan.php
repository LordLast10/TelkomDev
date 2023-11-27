<?php

namespace App\Models;

use CodeIgniter\Model;

class AlurPersetujuan extends Model
{
    // initial to table document
    protected $table = 'alur_persetujuan';

    public function getAlur($role_id)
    {
        $builder = $this->db->table($this->table);
        $builder->where('role_id', $role_id);
        $query = $builder->get();        // row
        return  $query->getRowArray();
    }
}
