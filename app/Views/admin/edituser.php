<?= $this->extend('layouts/template') ?>
<?= $this->section('content') ?>
<div class="container" style="margin-top: 20px; padding: 20px;">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">

                    <form method="POST" action="<?= base_url('admin/user/edit') ?>/<?php echo $user->ID ?>">
                        <div class="modal-body  ">
                            <div class="form-group">
                                <label for="nama">Nama:</label>
                                <input type="text" class="form-control" name="nama" id="nama" placeholder="" value="<?php echo $user->Username ?>">
                            </div>

                            <div class="form-group">
                                <label for="email">Email:</label>
                                <input type="email" class="form-control" name="email" id="email" placeholder="" value="<?php echo $user->Email ?>">
                            </div>

                            <!-- Tambahan data peran dan unit -->
                            <div class="form-group">
                                <label for="role">Role:</label>
                                <select class="form-control" id="role" name="role">
                                    <option value="<?php echo $user->Role_ID ?>"><?php echo $user->Nama_Role ?></option>
                                    <?php foreach ($roles as $role) { ?>
                                        <option value="<?php echo $role['ID_Role'] ?>"><?php echo $role['Nama_Role'] ?> </option>
                                    <?php } ?>
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="unit">Unit:</label>
                                <select class="form-control" id="unit" name="unit">
                                    <option value="<?php echo $user->Unit_ID ?>"><?php echo $user->unit_name ?></option>
                                    <?php foreach ($units as $unit) { ?>
                                        <option value="<?php echo $unit['unit_id'] ?>"><?php echo $unit['unit_name'] ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="namadepan">Nama Depan:</label>
                                <input type="namadepan" class="form-control" name="namadepan" id="namadepan" placeholder="" value="<?php echo $user->Nama_Depan ?>">

                            </div>
                            <div class="form-group">
                                <label for="namabelakang">Nama Belakang:</label>
                                <input type="namabelakang" class="form-control" name="namabelakang" id="namabelakang" placeholder="" value="<?php echo $user->Nama_Belakang ?>">
                            </div>
                            <div class="form-group">
                                <!-- activate menggunakan checkbox -->
                                <label for="isactive">Status:</label>
                                <select id="activate" name="activate" class="form-control" style="margin-bottom: 20px;">
                                    <option value="<?php echo $user->activate; ?>"><?php echo $user->activate ?></option>
                                    <option value="Aktif">Aktif</option>
                                    <option value="Tidak Aktif">Tidak Aktif</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <!-- activate menggunakan checkbox -->
                                <label for="isactive">Type User:</label>
                                <select id="usertype" name="usertype" class="form-control" style="margin-bottom: 20px;">
                                    <option value="<?php echo $user->User_Type; ?>"><?php echo $user->User_Type ?></option>
                                    <option value="User">User</option>
                                    <option value="Admin">Admin</option>
                                </select>
                            </div>
                            <button type="submit" class="btn btn-primary">Save</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>