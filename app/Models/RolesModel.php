<?php

namespace App\Models;

use CodeIgniter\Model;

class RolesModel extends Model
{
    // initial to table document
    protected $table = 'roles';

    public function getRoles()
    {
        return $this->findAll();
    }
}
