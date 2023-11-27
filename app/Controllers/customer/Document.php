<?php

namespace App\Controllers\customer;

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
		$session = session();
		$userID = $session->get('user_id');
		$documents = $this->documentModel->getDocument($userID);
		$data = [
			'title' => 'Customer | Document',
			'documents' => $documents
		];
		return view('customer/document', $data);
	}
	public function delete($id)
	{
		$userID = session()->get('user_id');
		$this->documentModel->deleteDocument($id, $userID);
		return redirect()->to(base_url('customer/documents'));
	}
}
