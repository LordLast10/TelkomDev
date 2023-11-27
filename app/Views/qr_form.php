<!-- App/Views/qr_form.php -->

<!DOCTYPE html>
<html lang="en">
<?php if (session()->getFlashdata('msg')) : ?>
    <div class="alert alert-danger"><?= session()->getFlashdata('msg') ?></div>
<?php endif; ?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upload QR Code</title>
</head>

<body>
    <form action="<?= base_url('qr/upload') ?>" method="post" enctype="multipart/form-data">
        <input type="file" name="image" accept="image/*" required>
        <button type="submit">Upload</button>
    </form>
</body>

</html>