<?= $this->extend('layouts/template') ?>
<?= $this->section('content') ?>
<link href="<?php echo base_url() ?>css/logstyle.css" rel="stylesheet">
<div class="main">
    <h3 class="head">Document Tracking</h3>
    <div class="container">
        <ul>
            <?php foreach ($logs as $log) { ?>
                <li>
                    <h3 class="heading"><?php echo $log['Nama_Role'] ?></h3>
                    <p><?php echo $log['Aktivitas'] ?> </p>
                    <!-- <a href="#">Read More ></a> -->
                    <span class="date"><?php echo $log['Waktu'] ?></span>
                    <span class="circle"></span>
                </li>
            <?php } ?>
        </ul>
    </div>
</div>
<?= $this->endSection() ?>