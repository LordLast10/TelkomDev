<?php

namespace App\Models;

use CodeIgniter\Model;

class UnitModel extends Model
{
    // initial to table document
    protected $table = 'units';
    protected $primaryKey = 'unit_id';


    public function getUnit()
    {
        return $this->findAll();
    }
}
