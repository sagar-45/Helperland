<!DOCTYPE html>
<html lang="en">

<head>
  <title>Helperland</title>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <link rel="stylesheet" type="text/css" href="./assets/css/footer2.css" />
  <link rel="stylesheet" type="text/css" href="./assets/css/header2.css" />
  <link rel="stylesheet" type="text/css" href="./assets/css/<?php echo "$function"?>.css" />
  <link rel="stylesheet" type="text/css" href="./assets/css/media.css" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css" />
  <script>
    function login_set()
    {
      sessionStorage.afterPages=2;
    }
  </script>
</head>

<body id="<?php echo "$function" ?>">
<?php $base_url="http://localhost/HelperLand/" ;?>
  <!-- header section start -->
  <section id="header">
    <nav class="navbar navbar-expand-md navbar-dark fixed-top">
      <a class="navbar-brand" href="<?= $base_url.'?controller=Home&&function=index'?>">
        <img src="./assets/images/white-logo-transparent-background.png" class="img-fluid nav_brand_img" alt="" />
      </a>
      <div class="tab-view">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
          aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse justify-content-end" id="navbarSupportedContent">
          <ul class="navbar-nav">
            <li class="nav-item book-now l_line hoverw">
              <a class="nav-link" href="book_service.html">Book now</a>
            </li>
            <li class="nav-item prices l_line">
              <a class="nav-link" href="<?= $base_url.'?controller=Home&&function=prices'?>">Prices & services</a>
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
            <form>
              <li class="nav-item login l_line hoverw">
                <a class="nav-link" href="<?= $base_url.'?controller=Home&&function=index'?>" onclick="login_set()">Login</a>
              </li>
            </form>
            <li class="nav-item helper l_line hoverw">
              <a class="nav-link" href="<?= $base_url.'?controller=Home&&function=service'?>">Become a Helper</a>
            </li>
          </ul>
        </div>
      </div>
