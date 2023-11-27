<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class UnitsSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'unit_name'   => 'It Support',
                'created_at'  => date('Y-m-d H:i:s'),
            ],
            [
                'unit_name'   => 'Admin',
                'created_at'  => date('Y-m-d H:i:s'),
            ],
            [
                'unit_name'   => 'Marketing',
                'created_at'  => date('Y-m-d H:i:s'),
            ],
        ];
        $this->db->table('units')->insertBatch($data);
    }
}
