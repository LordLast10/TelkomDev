<?= $this->extend('layouts/template') ?>
<?= $this->section('content') ?>
<div class="d-flex" id="wrapper">
    <div class="container mt-4">
        <h2 class="text-start">Upload Dokumen</h2>
        <form method="post" action="<?php echo base_url('customer/document/upload'); ?>" enctype="multipart/form-data">
            <div class="form-row">
                <div class="col-md-3">
                    <div class="form-group mb-3">
                        <label for="from">User:</label>
                        <input type="text" id="from" name="from" class="form-control" value="<?php echo session()->get('first_name'); ?>" readonly>
                    </div>
                    <div class="form-group mb-3">
                        <label for="to">Kepada:</label>
                        <select id="to" name="to" class="form-control">
                            <?php foreach ($roles as $role) : ?>
                                <option value="<?php echo $role['ID_Role']; ?>"><?php echo $role['Nama_Role']; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                    <div class="form-group mb-3">
                        <label for="subject">Subjek:</label>
                        <input type="text" id="subject" name="subject" class="form-control" placeholder="Isi Subjek">
                    </div>
                    <input type="hidden" id="unit_id" name="unit_id" value="<?php echo session()->get('user_id'); ?>">

                </div>
            </div>
            <!-- <div class="form-group">
                <label for="dokumen">Upload Dokumen:</label>
                <input type="file" id="dokumen" name="dokumen" class="form-control-file">
            </div> -->
            <div class="mb-3">
                <label for="formFile" class="form-label">Upload Document</label>
                <input class="form-control" type="file" id="file" name="file">
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-primary"><i class="fa fa-paper-plane"></i> Send File</button>
            </div>
        </form>
        <?php
        // views/customer/document/viewupload.php

        // ...

        if (session()->has('errors')) {
            $errors = session('errors');
            echo '<script>alert("' . implode('\n', $errors) . '");</script>';
        }

        if (session()->has('success')) {
            $success = session('success');
            echo '<script>alert("' . $success . '");</script>';
        }
        ?>

    </div>
</div>
<?= $this->endSection() ?>