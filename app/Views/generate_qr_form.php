<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>QR Code Generator</title>
    <!-- Tambahkan pustaka QRCode.js -->

</head>

<body>
    <!-- Tambahkan elemen untuk menampilkan QR code -->
    <div id="qrcode"></div>

    <button onclick="downloadQRCode()">Download QR Code</button>

    <script>
        // Fungsi untuk membuat dan men-download QR code
        function downloadQRCode() {
            // Ambil data URL QR code dari elemen dengan ID 'qrcode'
            var dataUrl = document.getElementById("qrcode").querySelector('img').src;

            // Buat elemen <a> untuk men-download
            var a = document.createElement('a');
            a.href = dataUrl;
            a.download = 'qrcode.png';

            // Tambahkan elemen <a> ke dalam dokumen
            document.body.appendChild(a);

            // Klik otomatis pada elemen <a> untuk memicu proses download
            a.click();

            // Hapus elemen <a> dari dokumen
            document.body.removeChild(a);
        }

        // Buat instance QRCode
        var qrcode = new QRCode(document.getElementById("qrcode"), {
            text: "https://www.example.com", // Ganti dengan data URL atau teks yang ingin Anda ubah menjadi QR code
            width: 128,
            height: 128,
        });
    </script>
</body>

</html>