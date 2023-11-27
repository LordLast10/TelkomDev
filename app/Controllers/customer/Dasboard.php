<?php

namespace App\Controllers\customer;

use App\Controllers\BaseController;
use App\Models\LogModel;

class Dasboard extends BaseController
{
    protected $logModel;

    public function __construct()
    {
        $this->logModel = new LogModel();
    }

    public function index()
    {
        $userId = session()->get('user_id');
        $history = $this->logModel->getHistoryaApprove($userId);
        $data = [
            'title' => 'Dashboard | User',
            'histors' => $history,
        ];

        return view('customer/dashboard', $data);
    }
}
