<?php

namespace App\Controllers\customer;

use App\Controllers\BaseController;
use Zxing\QrReader;

class QrController extends BaseController
{
    public function index()
    {
        $data = [
            'title' => 'Customer | Scan'
        ];
        return view('customer/qrcode', $data);
    }

    public function upload()
    {
        // Ambil file yang diunggah
        $file = $this->request->getFile('image');

        // Pindahkan file yang diunggah ke direktori writable
        $fileName = $file->getRandomName();
        $file->move(WRITEPATH . 'uploads', $fileName);

        // Dekode kode QR
        $qrcode = new QrReader(WRITEPATH . 'uploads/' . $fileName);
        $decodedText = $qrcode->text();

        // Tampilkan hasil
        // jijka
        if (strpos($decodedText, 'approve/') !== false) {
            // dd(base_url($decodedText));
            return redirect()->to(base_url($decodedText));
        } else {
            // berikan message
            return session()->setFlashdata('message', 'Maaf, QR Code yang anda scan tidak valid');
        }

        // Hapus file yang diunggah
        unlink(WRITEPATH . 'uploads/' . $fileName);
    }
}
