<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="<?= base_url() ?>css/auth.css">
    <title><?= $title ?></title>
</head>

<body>
    <div id="container" class="container">
        <!-- should erro message -->

        <div class="form-container sign-in-container">
            <form class="form-login" autocomplete="off" action="<?= base_url('login') ?>" method="post">

                <h1>Sign in</h1>
                <div class="mb-3">
                    <input id="username" type="text" name="username" placeholder="Username" class="form-control">
                </div>
                <div class="mb-3">
                    <input type="password" class="form-control" name="password" placeholder="Password" id="password">
                </div>

                <button type="submit" class="btn btn-primary">Login</button>

                <?php if (session()->getFlashdata('msg')) : ?>
                    <div class="alert alert-danger"><?= session()->getFlashdata('msg') ?></div>
                <?php endif; ?>
            </form>
        </div>

        <div class="form-container sign-up-container">
            <form class="form-register" method="post" action="<?= base_url('register') ?>">
                <h1>Create Account</h1>

                <input class="form-control" type="text" name="username" id="username" required placeholder="Username">
                <input class="form-control" type="text" name="nama_depan" id="nama_depan" required placeholder="First Name">
                <input class="form-control" type="text" name="nama_belakang" id="nama_belakang" required placeholder="Last Name">
                <input class="form-control" type="email" name="email" id="email" required placeholder="Email">
                <input class="form-control" type="password" name="password" id="password" required placeholder="Password">

                <div class="mb-3">
                    <select id="unit" name="unit" class="form-control" style="margin-bottom: 20px;">
                        <option value="">-- Pilih Unit --</option>
                        <?php foreach ($units as $unit) : ?>
                            <option value="<?php echo $unit['unit_id']; ?>"><?php echo $unit['unit_name']; ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <button type="submit" class="btn btn-primary">Register</button>
            </form>
        </div>
        <div class="overlay-container">
            <div class="overlay">
                <div class="overlay-panel overlay-left">
                    <h1>Welcome Back!</h1>
                    <p>
                        Lakukan login sebelum kamu melanjutkan penggunaan aplikasi ini
                    </p>
                    <button class="ghost" id="tes2">Login</button>
                </div>
                <div class="overlay-panel overlay-right">
                    <h1>Hello, Friend!</h1>
                    <p>Lakukan registrasi akun jika kamu belum mempunyai akun</p>
                    <button class="ghost" id="tes">Register</button>
                </div>
            </div>
        </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    -->
    <!-- Sebelum ini Anda menyertakan jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <!-- Sertakan skrip eksternal -->


    <script src="<?= base_url() ?>js/side.js"></script>
</body>

</html>