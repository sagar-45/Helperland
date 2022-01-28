<!DOCTYPE html>
<html>

<head>
  <title>Helperland</title>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <link rel="stylesheet" type="text/css" href="./assets/css/index.css" />
  <link rel="stylesheet" type="text/css" href="./assets/css/media.css" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css" />
</head>

<body id="home">
  <!-- home section start-->
  <section id="header">
    <nav class="navbar navbar-expand-md navbar-dark fixed-top">
      <a class="navbar-brand" href="<?= $base_url.'?controller=Home&&function=index'?>">
        <img src="./assets/images/white-logo-transparent-background.png" class="img-fluid logo" alt="" />
      </a>
      <div class="tab-view">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
          aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse justify-content-end" id="navbarSupportedContent">
          <ul class="navbar-nav">
            <li class="nav-item book-now dark">
              <a class="nav-link" href="#">Book a Cleaner</a>
            </li>
            <li class="nav-item prices">
              <a class="nav-link" href="<?= $base_url.'?controller=Home&&function=prices' ?>">Prices</a>
            </li>
            <li class="nav-item guarantee">
              <a class="nav-link">Our Guarantee</a>
            </li>
            <li class="nav-item blog">
              <a class="nav-link">Blog</a>
            </li>
            <li class="nav-item contact">
              <a class="nav-link" href="<?= $base_url.'?controller=Home&&function=contact'?>">Contact us</a>
            </li>
            <li class="nav-item login dark" data-bs-toggle="modal" data-bs-target="#login">
              <a class="nav-link">Login</a>
            </li>
            <li class="nav-item helper dark">
              <a class="nav-link" href="service.html">Become a Helper</a>
            </li>
            <li class="nav-item dropdown dropstart">
              <a class="nav-link" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown"
                aria-expanded="false" aria-haspopup="true">
                <img src="./assets/images/uk.png" class="img-fluid dropdown_country" alt="" />
                <img src="./assets/images/dropdown.png" class="dropdown_arrow" alt="" />
              </a>
              <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                <li>
                  <a class="dropdown-item" href="#"><img src="./assets/images/uk.png" class="img-fluid dropdown_country"
                      alt="" />
                    U.K.</a>
                </li>
                <li>
                  <a class="dropdown-item" href="#"><img src="./assets/images/uk.png" class="img-fluid dropdown_country"
                      alt="" />U.K.</a>
                </li>
                <li>
                  <a class="dropdown-item" href="#"><img src="./assets/images/uk.png" class="img-fluid dropdown_country"
                      alt="" />U.K.</a>
                </li>
              </ul>
            </li>
          </ul>
        </div>
      </div>
  <?php
      include('header1_mobileView.php');
  ?>