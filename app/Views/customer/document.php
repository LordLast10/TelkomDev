<?= $this->extend('layouts/template') ?>
<?= $this->section('content') ?>
<div class="container">
    <div class="card mx-auto" style="margin-top: 80px; width: 80%">
        <div class="card-body">
            <div class="d-flex justify-content-end">
                <div class="col-md-4">
                    <div class="form-group">
                        <input type="text" id="searchInput" class="form-control" placeholder="Search Data...">
                    </div>
                </div>
                <div class="col-md-0">
                    <button id="searchButton" class="btn btn-primary">Cari</button>
                </div>
            </div>

            <div class="table-responsive" style="margin-top: 20px;">
                <table class="table table-bordered table-striped mx-auto text-center">
                    <thead class="thead-dark">
                        <tr>
                            <th>LOG</th>
                            <th>PENGIRIM</th>
                            <th>DOKUMEN</th>
                            <th>TUJUAN</th>
                            <th>SUBJEK</th>
                            <th>TANGGAL PENGAJUAN</th>
                            <th>HISTORY</th>

                        </tr>
                    </thead>

                    <tbody>
                        <?php foreach ($documents as $document) : ?>
                            <tr>
                                <td class="log-icon">
                                    <a href="<?= base_url('logs'); ?>/<?php echo $document->ID_Doc ?>" class=" btn btn-outline-secondary" role="button" aria-pressed="true">&#128065 <!-- Karakter Unicode untuk ikon mata -->Log</a>
                                </td>
                                <td><?php echo $document->Nama_Depan; ?></td>
                                <td><?php echo $document->Document; ?></td>
                                <td><?php echo $document->Nama_Role; ?></td>
                                <td><?php echo $document->Deskripsi; ?></td>
                                <td><?php echo $document->created_at; ?></td>
                                <td><?php echo $document->history; ?></td>

                                <td>
                                    <a href="<?= base_url('customer/document/delete'); ?>/<?php echo $document->ID_Doc ?>" class=" btn btn-outline-danger btn-sm" role="button" aria-pressed="true">hapus</a>
                                </td>
                                <td>
                                    <button id="generateButton_<?= $document->ID_Doc; ?>" class="btn btn-outline-primary btn-sm btn-qrcode" data-document-id="<?= $document->ID_Doc; ?>">Generate QR Code</button>

                                    <!-- Elemen <a> untuk mengunduh QR Code -->
                                    <a id="downloadLink_<?= $document->ID_Doc; ?>" style="display: none;" download="qrcode.png">
                                        <button class="btn btn-outline-primary btn-sm">Download QR Code</button>
                                    </a>

                                    <!-- Elemen untuk menampilkan QR Code -->
                                    <div id="qrcode-container_<?= $document->ID_Doc; ?>" style="display: none;"></div>
                                </td>

                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<!-- Add this element where you want to display the QR code -->
<!-- result -->

<script>
    $(document).ready(function() {
        // Event handler untuk tombol "Cari"
        $("#searchButton").on("click", function() {
            performSearch();
        });

        // Event handler untuk menangani tombol "Enter"
        $("#searchInput").on("keypress", function(e) {
            if (e.which === 13) { // 13 adalah kode tombol Enter
                performSearch();
            }
        });

        function performSearch() {
            var searchText = $("#searchInput").val().toLowerCase();

            $("table tbody tr").each(function() {
                var nama = $(this).find("td:eq(1)").text().toLowerCase();
                var penerima = $(this).find("td:eq(3)").text().toLowerCase();
                var tujuan = $(this).find("td:eq(4)").text().toLowerCase();


                if (nama.includes(searchText) || penerima.includes(searchText) || tujuan.includes(searchText)) {
                    $(this).show();
                } else {
                    $(this).hide();
                }
            });
        }

    });
</script>
<!-- Include qrcode.js library -->
<!-- Include qrcode.js library -->
<!-- Include qrcode.js library -->
<script src="https://cdn.rawgit.com/davidshimjs/qrcodejs/gh-pages/qrcode.min.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>



<!-- HTML -->


<script src="https://cdn.rawgit.com/davidshimjs/qrcodejs/gh-pages/qrcode.min.js"></script>
<script>
    // Fungsi untuk membuat dan men-download QR code
    function generateAndDownloadQRCode(documentId, containerId, downloadLinkId) {
        // Buat instance QRCode pada elemen dengan ID unik
        var qrcode = new QRCode(document.getElementById(containerId), {
            text: "approve/" + documentId,
            width: 128,
            height: 128,
        });

        // Sembunyikan tombol generate
        document.getElementById('generateButton_' + documentId).style.display = 'none';

        // Tampilkan tombol unduh setelah QR code dibuat
        document.getElementById(downloadLinkId).style.display = 'block';

        // Dapatkan data URL dari elemen gambar QR code
        var dataUrl = qrcode._el.childNodes[0].toDataURL("image/png"); // Mengakses elemen gambar dari objek QRCode

        // Perbarui tautan unduh dengan data URL yang baru
        document.getElementById(downloadLinkId).setAttribute("href", dataUrl);
    }

    // Event handler untuk tombol "Generate QR Code"
    document.querySelectorAll('.btn-qrcode').forEach(function(button) {
        button.addEventListener('click', function() {
            // Ambil document ID dari atribut data pada tombol
            var documentId = this.getAttribute("data-document-id");

            // Panggil fungsi untuk membuat dan men-download QR code
            generateAndDownloadQRCode(documentId, 'qrcode-container_' + documentId, 'downloadLink_' + documentId);
        });
    });

    // Event handler untuk tombol "Download QR Code"
    document.querySelectorAll('.download-link button').forEach(function(button) {
        button.addEventListener('click', function() {
            // Tampilkan kembali tombol generate saat tombol unduh diklik
            var documentId = this.parentNode.id.split('_')[1];
            document.getElementById('generateButton_' + documentId).style.display = 'block';

            // Sembunyikan tombol unduh
            this.parentNode.style.display = 'none';
        });
    });
</script>




<?= $this->endSection() ?>