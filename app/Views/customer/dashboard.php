<?= $this->extend('layouts/template') ?>
<?= $this->section('content') ?>
<div class="d-flex" id="wrapper">
    <div id="page-content-wrapper">
        <div class="container-fluid">
            <h1 class="mt-4">Dashboard</h1>
            <?php $number = 1 ?>
            <div class="card">
                <div class="card-header">
                    History Approve
                </div>
                <div class="card-body">
                    <table class="table table-striped table-hover">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Dokumen</th>
                                <th scope="col">waktu</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($histors as $history) : ?>
                                <tr>
                                    <th scope="row"><?= $number++ ?></th>
                                    <td><?= $history['Document'] ?></td>
                                    <td><?= $history['Waktu'] ?></td>
                                </tr>
                            <?php endforeach ?>
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </div>
</div>
<?= $this->endSection() ?>