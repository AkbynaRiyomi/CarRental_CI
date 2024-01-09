<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <title>Rental &gt; Login</title>
  <!-- Bootstrap core CSS -->
  <link href="<?php echo base_url() . 'assets/css/sb-admin-2.min.css'; ?>" rel="stylesheet">
  <link href="<?php echo base_url() . 'assets/vendor/fontawesome-free/css/all.min.css'; ?>" rel="stylesheet"
    type="text/css">

  <style>
    .bd-placeholder-img {
      font-size: 1.125rem;
      text-anchor: middle;
      -webkit-user-select: none;
      -moz-user-select: none;
      -ms-user-select: none;
      user-select: none;
    }

    @media (min-width: 768px) {
      .bd-placeholder-img-lg {
        font-size: 3.5rem;
      }
    }
  </style>
  <!-- Custom styles for this template -->
  <link href="<?php echo base_url() . 'assets/css/signin1.css'; ?>" rel="stylesheet">
</head>

<body class="text-center">
  <form class="form-signin" method="post" action="<?php echo base_url('Auth'); ?>">
    <div>
      <!-- <i class="fas fa-car-side fa-4x"></i> -->
      <img src="assets/img/lg.png" alt="">
    </div>
    <h1 class="h3 mb-3 font-weight-normal"> Rental Guard YunniVroom</h1>
    <?= $this->session->flashdata('message'); ?>
    <?php
    if (isset($_GET['pesan'])) {
      if ($_GET['pesan'] == "gagal") {
        echo '<div class="alert alert-danger text-left" role="alert"><strong>Login Failed!</strong><br>Invalid Details</div>';
      } else if ($_GET['pesan'] == "logout") {
        echo '<div class="alert alert-success text-left" role="alert">Logged Out!</div>';
      } else if ($_GET['pesan'] == "belumlogin") {
        echo '<div class="alert alert-warning text-left" role="alert">Please login to continue</div>';
      }
    }
    ?>
    <div class="mb-3">
      <label for="email" class="sr-only">Email</label>
      <input type="text" name="email" id="email" class="form-control" placeholder="Email" required>
      <?php echo form_error('email'); ?>
    </div>

    <div class="mb-3">
      <label for="password" class="sr-only">Password</label>
      <input type="password" name="password" id="password" class="form-control" placeholder="Password" required>
      <?php echo form_error('password'); ?>
    </div>

    <button class="btn btn-lg btn-danger btn-block" value="Login" type="submit">Login</button>
    <p class="text-sm mt-3 mb-0">Don't Have an Account?<a href="<?= base_url('Auth/registrasi') ?>"> Register</a></p>
    <p class="mt-5 mb-3 text-muted">&copy;
      <?php echo date("Y"); ?> Akbyna Riyomi
    </p>
  </form>

</body>

</html>