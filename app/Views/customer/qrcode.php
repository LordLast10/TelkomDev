<?= $this->extend('layouts/template') ?>
<?= $this->section('content') ?>
<form action="<?= base_url('customer/scan') ?>" method="post" enctype="multipart/form-data">
    <!-- tambahkan alert untuk menampilkan messsage -->
    <!-- menggunakan javascript -->
    <?php if (session()->getFlashdata('message')) : ?>
        <div class="alert alert-danger" id="alert" style="display: none;">
            <strong>Error!</strong> <?= session()->getFlashdata('message'); ?>
        </div>
    <?php endif; ?>
    <h1>QR Code Scanner</h1>
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <div class="mb-3">
                            <label for="formFile" class="form-label">Choose QR Code Image</label>
                            <input class="form-control" type="file" name="image" id="image">
                        </div>
                        <button type="submit" class="btb btn-primary">Upload</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>




<?= $this->endSection() ?>