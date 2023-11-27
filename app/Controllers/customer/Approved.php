<?php

namespace App\Controllers\customer;

use App\Controllers\BaseController;
use App\Models\LogModel;
use App\Models\DocumentModel;

class Approved extends BaseController
{
    protected $LogModel;
    protected $DocumenModel;
    public function __construct()
    {
        $this->LogModel = new LogModel();
        $this->DocumenModel = new DocumentModel();
    }

    public function approve($idDocument)
    {
        $data_log = [
            'dokumen_id'  => $idDocument,
            'Aktivitas'   => "Dokument Disetujui " . session()->get('role_name'),
            'Pengguna_ID' => session()->get('user_id'),
            'role_review' => session()->get('role_id'),
        ];

        $data_document = [
            'history' => "Dokumen Disetujui " . session()->get('role_name'),
        ];

        $this->LogModel->insertLog($data_log);
        $this->DocumenModel->updateDocument($data_document, $idDocument);

        return redirect()->to(base_url('customer/scan'))->with('success', 'Dokumen Disetujui');
    }
}
