<?php

namespace App\Controllers\customer;

use App\Controllers\BaseController;
use App\Models\DocumentModel;
use App\Models\RolesModel;
use App\Models\AlurPersetujuan;


class Uploade extends BaseController
{
    protected $documentModel;
    protected $rolesModel;
    protected $alurperstujuan;
    public function __construct()
    {
        $this->documentModel = new DocumentModel();
        $this->rolesModel = new RolesModel();
        $this->alurperstujuan = new AlurPersetujuan();
    }

    public function index()
    {

        $data = [
            'title' => 'Upload Document',
            'roles' => $this->rolesModel->getRoles(),
        ];
        return view('customer/upload', $data);
    }
    public function uploadDocument()
    {
        $request = $this->request;
        $session = session();

        $validation = [
            'file' => 'uploaded[file]|max_size[file,2048]|ext_in[file,pdf,doc,docx]',
        ];

        if (!$this->validate($validation)) {
            $errors = $this->validator->getErrors();
            return redirect()->to(base_url('customer/document/upload'))->withInput()->with('errors', $errors);
        }

        $file = $request->getFile('file');

        // Simpan file ke dalam direktori public/upload
        $file->move(ROOTPATH . 'public/upload');

        // Simpan data ke database
        $to = $this->request->getPost('to');
        $subject = $this->request->getPost('subject');
        $unit = $this->request->getPost('unit_id');
        // $alur = $this->alurperstujuan->getAlur($to);
        $data = [
            'Document' => $this->cleanFilename($file->getName()),
            'Pengaju_ID' => $session->get('user_id'),
            'Role_Tujuan_ID' => $to,
            'Deskripsi' => $subject,
            // 'alur_persetujuan_id' => $alur['id'],
            'Dari_Unit' => $unit
        ];

        $this->documentModel->insertDocument($data);
        return redirect()->to(base_url('customer/documents'))->with('success', 'Data berhasil ditambahkan');
    }

    private function cleanFilename($filename)
    {
        // Menghapus karakter yang tidak diinginkan dari nama file
        return preg_replace("/[^a-zA-Z0-9.]/", "_", $filename);
    }
}
