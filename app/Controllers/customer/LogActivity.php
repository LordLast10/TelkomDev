<?php

namespace App\Controllers\customer;

use App\Controllers\BaseController;
use App\Models\LogModel;

class LogActivity extends BaseController
{
    protected $logModel;

    public function __construct()
    {
        $this->logModel = new LogModel();
    }

    public function index($id)
    {
        $logs = $this->logModel->getAllLog($id);
        $data = [
            'title' => 'Log Activity',
            'logs' => $logs,
        ];
        return view('customer/activitylogs', $data);
    }
}
