<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\DocumentModel;

class Document extends BaseController
{

    protected $documentModel;
    public function __construct()
    {
        $this->documentModel = new DocumentModel();
    }

    public function index()
    {
        $data = [
            'title' => 'Daftar Document',
            'documents' => $this->documentModel->getDocument(),
        ];
        return view('admin/document', $data);
    }
    public function delete($id)
    {
        $this->documentModel->deleteDocumentWithID($id);
        session()->setFlashdata('success', 'Document berhasil dihapus');
        session()->setFlashdata('errors', 'Gagal menghapus document');
        return redirect()->to(base_url('admin/documents'));
    }
}
