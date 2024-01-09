<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Rental > Register</title>
    <!-- Bootstrap core CSS -->
    <link href="<?php echo base_url() . 'assets/css/sb-admin-2.min.css'; ?>" rel="stylesheet">
    <link href="<?php echo base_url() . 'assets/vendor/fontawesome-free/css/all.min.css'; ?>" rel="stylesheet"
        type="text/css">
    <!-- Custom styles for this template -->
    <link href="<?php echo base_url() . 'assets/css/signin1.css'; ?>" rel="stylesheet">
</head>

<body class="text-center">
    <form class="form-signin" method="post" action="<?php echo base_url('Auth/cek_registrasi'); ?>">
        <img src="assets/img/lg.png" alt="">
        <h1 class="h3 mb-3 font-weight-normal">Rental Guard - Register</h1>
        <?= $this->session->flashdata('message'); ?>
        <?php
        // Display any registration messages here
        ?>
        <div class="mb-3">
            <label for="name" class="sr-only">name</label>
            <input type="text" name="name" id="name" class="form-control" placeholder="Nama" required autofocus>
            <?php echo form_error('name'); ?>
        </div>

        <div class="mb-3">
            <label for="email" class="sr-only">Email address</label>
            <input type="email" name="email" id="email" class="form-control" placeholder="Email address" required>
            <?php echo form_error('email'); ?>
        </div>

        <div class="form-group row">
            <div class="col-sm-6">
                <label for="password1" class="sr-only">Password</label>
                <input type="password" name="password1" id="password1" class="form-control" placeholder="Password"
                    required>
                <?php echo form_error('password'); ?>
            </div>
            <div class="col-sm-6">
                <label for="password2" class="sr-only">Confirm Password</label>
                <input type="password" name="password2" id="password2" class="form-control"
                    placeholder="Repeat Password" required>
                <?php echo form_error('password_confirm'); ?>
            </div>
        </div>
        <!-- <label for="inputPasswordConfirm" class="sr-only">Confirm Password</label>
        <input type="password" name="password_confirm" id="inputPasswordConfirm" class="form-control"
            placeholder="Confirm Password" required>
        <?php echo form_error('password_confirm'); ?> -->

        <button class="btn btn-lg btn-danger btn-block" type="submit">Register</button>
        <p class="text-sm mt-3 mb-0">Have an Account?<a href="<?= base_url('Auth') ?>"> Login</a></p>
        <p class="mt-5 mb-3 text-muted">&copy;
            <?php echo date("Y"); ?> Akbyna Riyomi
        </p>
    </form>
</body>

</html>