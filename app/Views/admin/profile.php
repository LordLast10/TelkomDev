<?= $this->extend('layouts/template') ?>
<?= $this->section('content') ?>
<div class="container-fluid" style="margin-top: 20px;">

    <div class="card mb-3" style="max-width: 540px;">
        <div class="row no-gutters">
            <div class="col-md-4">
                <img src="<?php echo base_url('/img/profile/') . $profile->Image; ?>" class="card-img" alt="User Image">
            </div>
            <div class="col-md-8">
                <div class="card-body">
                    <h5 class="card-title" style="font-weight: 800; text-transform: capitalize;"><?= $profile->Nama_Depan . ' ' .  $profile->Nama_Belakang; ?></h5>
                    <p class="card-text " style="font-weight: 400; text-transform: lowercase; "><?= $profile->Email; ?></p>
                    <p class="card-text" style="font-weight: 800;"><?= $profile->unit_name; ?></p>
                </div>
            </div>
        </div>
    </div>



    <div class="btn btn-info ml-3 my-3">
        <a href="<?= base_url('admin/profile/edit'); ?>" class="text text-white">
            <i class="fas fa-user-edit"></i> Ubah Profil
        </a>
    </div>
</div>
<?= $this->endSection() ?>