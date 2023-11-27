<?= $this->extend('layouts/template') ?>
<?= $this->section('content') ?>
<div class="container-fluid">
    <div class="form-row">
        <div class="col-lg-9">
            <form method="post" action="<?= base_url('customer/profile/edit'); ?>" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="username" class="col-sm-2 col-form-label">Username</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="username" name="username" value="<?= $user->Username; ?>" readonly disabled>
                    </div>
                </div>

                <div class="form-group">
                    <label for="nama_depan" class="col-sm-2 col-form-label">Nama Depan</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="nama_depan" name="nama_depan" value="<?= $user->Nama_Depan; ?>">
                    </div>
                </div>

                <div class="form-group">
                    <label for="nama_belakang" class="col-sm-2 col-form-label">Nama Belakang</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="nama_belakang" name="nama_belakang" value="<?= $user->Nama_Belakang; ?>">

                    </div>
                </div>

                <div class="form-group">
                    <label for="email" class="col-sm-2 col-form-label">Email</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="email" name="email" value="<?= $user->Email; ?>" readonly disabled>
                    </div>
                </div>

                <div class="form-group">
                    <label for="gambar" class="col-sm-2 col-form-label">Gambar</label>
                    <div class="col-sm-10">
                        <div class="row">
                            <div class="col-sm-3">
                                <img src="<?= base_url('img/profile/') . $user->Image; ?>" class="img-thumbnail" alt="Profil Gambar">
                            </div>
                            <div class="col-sm-9">
                                <label class="custom-file-label" for="image">Pilih gambar :</label>
                                <div class="col-sm-9">
                                    <label class="custom-file-label" for="image"></label>
                                </div>
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" id="image" name="image">

                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="form-group justify-content-end ">
                    <label class="custom-file-label"></label>
                    <div class="col-sm-10">

                        <button type="submit" name="simpan_perubahan" class="btn btn-primary">Ubah</button>
                        <button class="btn btn-dark">
                            <a href="<?= base_url('customer/profile'); ?>" class="text text-white">Kembali</a>
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<?= $this->endSection() ?>