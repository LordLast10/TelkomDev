<?php

namespace App\Controllers\customer;

use App\Controllers\BaseController;
use Zxing\QrReader;

class QrCode extends BaseController
{
    public function index()
    {
        $data = [
            'title' => 'QR Code'
        ];
        return view('customer/qrcode', $data);
    }
    public function uploadQrCode()
    {
        include_once('./lib/QrReader.php');
        $imagePath = __DIR__ . "/public/uploads/test.png";
        $imagePath = str_replace('\\', '/', $imagePath);

        $qrReader = new QrReader($imagePath);

        $hints = [
            'TRY_HARDER' => true,
            'NR_ALLOW_SKIP_ROWS' => 0
        ];

        try {
            $qrReader->decode($hints);
            $result = $qrReader->getResult();
            $error = $qrReader->getError();
        } catch (\Exception $e) {
            die('Error: ' . $e->getMessage());
        }

        $data = [
            'result' => $result,
            'error' => $error,
        ];

        return view('qr-code-result', $data);
    }
}
