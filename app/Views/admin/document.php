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
            <div class="table-responsive">
                <table class="table table-bordered table-striped mx-auto text-center">
                    <thead class="thead-dark">
                        <tr>
                            <th>PENGIRIM</th>
                            <th>DOKUMEN</th>
                            <th>TUJUAN</th>
                            <th>DESKRIPSI</th>
                            <th>TANGGAL PENGAJUAN</th>
                            <th>STATUS</th>
                            <th>HISTORY</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($documents as $document) : ?>
                            <tr>

                                <td><?php echo $document->Nama_Depan; ?></td>
                                <td>
                                    <a href="<?php echo base_url('upload/' . $document->Document); ?>" target="_blank"><?php echo $document->Document; ?></a><br>

                                </td>
                                <!-- <td><?php echo $document->Document; ?></td> -->
                                <td><?php echo $document->Nama_Role; ?></td>
                                <td><?php echo $document->Deskripsi; ?></td>
                                <td><?php echo $document->created_at; ?></td>
                                <td><?php echo $document->Status; ?></td>
                                <td><?php echo $document->history; ?></td>
                            </tr>
                        <?php endforeach; ?>

                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
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

        // Event handler for generating QR Code
    });

    function performSearch() {
        var searchText = $("#searchInput").val().toLowerCase();

        $("table tbody tr").each(function() {
            var nama = $(this).find("td:eq(0)").text().toLowerCase();
            var penerima = $(this).find("td:eq(2)").text().toLowerCase();
            var tujuan = $(this).find("td:eq(3)").text().toLowerCase();


            if (nama.includes(searchText) || penerima.includes(searchText) || tujuan.includes(searchText)) {
                $(this).show();
            } else {
                $(this).hide();
            }
        });
    }
</script>

<?= $this->endSection() ?>