<?php

namespace App\Models;

use CodeIgniter\Model;

class DocumentModel extends Model
{
    // initial to table document
    protected $table = 'dokumen';
    // get document all with param or no
    public function getDocument($userId = false)
    {
        $builder = $this->db->table($this->table);

        $builder->select('*');
        $builder->join('roles', 'roles.ID_Role = dokumen.Role_Tujuan_ID');
        $builder->join('pengguna', 'pengguna.ID = dokumen.pengaju_ID');
        // jika menggunakan param akan menggunakan result dalam blok if
        if ($userId !== false) {
            $builder->where('dokumen.pengaju_ID', $userId);
            $query = $builder->get();
            return $query->getResult();
        }
        $query = $builder->get();
        return $query->getResult();
    }

    // delete data with param id and userid
    public function deleteDocument($id, $userId = false)
    {

        $builder = $this->db->table($this->table);
        $builder->where('ID_Doc', $id);
        $builder->delete();
        // jika userid itu tidak sama dengan false
        // maka delete data dengan userid yang sama
        if ($userId !== false) {
            $builder->where('pengaju_ID', $userId);
            $builder->where('ID_Doc', $id);
            $builder->delete();
        }
    }
    // handle insert new data dockumen
    public function insertDocument($data)
    {
        $builder = $this->db->table($this->table);
        $builder->insert($data);
    }
    // update document with param id document
    public function updateDocument($data, $id)
    {
        $builder = $this->db->table($this->table);
        $builder->set($data);
        $builder->where('ID_Doc', $id);
        $builder->update();
    }
}
