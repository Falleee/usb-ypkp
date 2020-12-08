<!DOCTYPE html>
<html lang="en">

<head>
  <title>USB Ypkp &mdash; Dokumentasi</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <link href="https://fonts.googleapis.com/css2?family=Josefin+Sans:wght@400;700&family=Roboto+Mono:wght@400;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="<?php echo base_url() . 'assets/fonts/icomoon/style.css' ?>">

  <link rel="stylesheet" href="<?php echo base_url() . 'assets/css/bootstrap.min.css' ?>">
  <link rel="stylesheet" href="<?php echo base_url() . 'assets/css/magnific-popup.css' ?>">
  <link rel="stylesheet" href="<?php echo base_url() . 'assets/css/jquery-ui.css' ?>">
  <link rel="stylesheet" href="<?php echo base_url() . 'assets/css/owl.carousel.min.css' ?>">
  <link rel="stylesheet" href="<?php echo base_url() . 'assets/css/owl.theme.default.min.css' ?>">
  <!-- daterange picker -->
  <link rel="stylesheet" href="<?= base_url() . 'assets/plugins/daterangepicker/daterangepicker.css' ?>">

  <link rel="stylesheet" href="<?php echo base_url() . 'assets/css/lightgallery.min.css' ?>">

  <link rel="stylesheet" href="<?php echo base_url() . 'assets/css/bootstrap-datepicker.css' ?>">

  <link rel="stylesheet" href="<?php echo base_url() . 'assets/fonts/flaticon/font/flaticon.css' ?>">

  <link rel="stylesheet" href="<?php echo base_url() . 'assets/css/swiper.css' ?>">

  <link rel="stylesheet" href="<?php echo base_url() . 'assets/css/aos.css' ?>">

  <link rel="stylesheet" href="<?php echo base_url() . 'assets/css/style.css' ?>">

</head>

<body>

  <div class="site-wrap">

    <div class="site-mobile-menu">
      <div class="site-mobile-menu-header">
        <div class="site-mobile-menu-close mt-3">
          <span class="icon-close2 js-menu-toggle"></span>
        </div>
      </div>
      <div class="site-mobile-menu-body"></div>
    </div>

    <header class="site-navbar py-3" style="background: snow;" role="banner">
      <div class="container-fluid">
        <div class="row align-items-center">
          <div class="col-6 col-xl-2" data-aos="fade-down">
            <!-- <h3 class="mb-0"><a href="<?php echo base_url() ?>" class="text-white mb-0">
          <img src="<?php echo base_url() . 'assets/images/logo.png' ?>" width="40" alt="">USB YPKP</a></h3> -->
            <img src="<?php echo base_url() . 'assets/images/logo.png' ?>" width="90%" alt="">
          </div>
          <div class="col-10 col-md-8 d-none d-xl-block" data-aos="fade-down">
            <nav class="site-navigation position-relative text-right text-lg-center" role="navigation">
              <ul class="site-menu js-clone-nav mx-auto d-none d-lg-block">
                <li class="<?= $this->uri->segment(1) == '' ? 'active' : ''; ?>"><a href="<?php echo base_url() ?>">Home</a></li>
                <li class="<?= $this->uri->segment(1) == '' ? 'active' : ''; ?>"><a href="<?php echo base_url() ?>admin">Admin</a></li>
              </ul>
            </nav>
          </div>

          <div class="col-6 col-xl-2 text-right" data-aos="fade-down">
            <div class="d-none d-xl-inline-block">
              <ul class="site-menu js-clone-nav ml-auto list-unstyled d-flex text-right mb-0" data-class="social">

                <li>
                  <a href="#" class="pl-0 pr-3"><span class="icon-facebook text-dark"></span></a>
                </li>
                <li>
                  <a href="#" class="pl-3 pr-3"><span class="icon-twitter text-dark"></span></a>
                </li>
                <li>
                  <a href="#" class="pl-3 pr-3"><span class="icon-instagram text-dark"></span></a>
                </li>
              </ul>
            </div>

            <div class="d-inline-block d-xl-none ml-md-0 mr-auto py-3" style="position: relative; top: 3px;"><a href="#" class="site-menu-toggle js-menu-toggle text-black"><span class="icon-menu h3"></span></a></div>

          </div>

        </div>
      </div>

    </header>