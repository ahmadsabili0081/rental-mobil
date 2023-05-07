<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <link rel="icon" href="assets/images/favicon.ico">
  <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900&display=swap" rel="stylesheet">

  <title><?= $title; ?></title>

  <!-- Bootstrap core CSS -->
  <link href="<?= base_url('assets/car-rental-website-template/vendor/bootstrap/css/bootstrap.min.css') ?>" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/datatables/1.10.21/css/dataTables.bootstrap4.min.css" integrity="sha512-PT0RvABaDhDQugEbpNMwgYBCnGCiTZMh9yOzUsJHDgl/dMhD9yjHAwoumnUk3JydV3QTcIkNDuN40CJxik5+WQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <!-- Additional CSS Files -->
  <link rel="stylesheet" href="<?= base_url('assets/car-rental-website-template/assets/css/fontawesome.css') ?>">
  <link rel="stylesheet" href="<?= base_url('assets/car-rental-website-template/assets/css/style.css'); ?>">
  <link rel="stylesheet" href="<?= base_url('assets/car-rental-website-template/assets/css/owl.css') ?>">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
</head>

<body>

  <!-- ***** Preloader Start ***** -->
  <div id="preloader">
    <div class="jumper">
      <div></div>
      <div></div>
      <div></div>
    </div>
  </div>
  <!-- ***** Preloader End ***** -->

  <!-- Header -->
  <header class="">
    <nav class="navbar navbar-expand-lg">
      <div class="container">
        <a class="navbar-brand" href="index.html">
          <h2>Car Rental <em>Website</em></h2>
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item <?= ($this->uri->segment(1) == 'dashboard' ? 'active' : ''); ?>">
              <a class="nav-link" href="<?= base_url('dashboard'); ?>">Beranda
                <span class="sr-only">(current)</span>
              </a>
            </li>
            <li class="nav-item <?= ($this->uri->segment(2) == 'mobil' ? 'active' : ''); ?>"><a class="nav-link" href="<?= base_url('dashboard/mobil'); ?>">Mobil</a></li>
            <?php if ($this->session->userdata('id_customer')) : ?>
              <?php
              $nama = $this->session->userdata('nama_customer');
              ?>
              <li class="nav-item <?= ($this->uri->segment(2) == 'transaksi' ? 'active' : ''); ?>"><a class="nav-link" href="<?= base_url('dashboard/transaksi'); ?>">Transaksi</a></li>
              <span class="text-danger font-weight-bold" style="margin-top: 13px;">Wellcome <?= $nama; ?></span>
              <li class="nav-item mt-2"><a class="btn btn-danger" href="<?= base_url('dashboard/logout'); ?>">Logout</a></li>
            <?php else : ?>
              <li class="nav-item mt-2 active"><a class="btn btn-primary" href="<?= base_url('auth'); ?>">Login</a></li>
              <li class="nav-item mt-2"><a class="btn btn-success" href="<?= base_url('auth/registration'); ?>">Register</a></li>
            <?php endif; ?>
          </ul>
        </div>
      </div>
    </nav>
  </header>