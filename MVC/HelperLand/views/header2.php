<?php $base_url = "http://localhost/HelperLand/"; ?>
<!-- header section start -->
<section id="header">
  <nav class="navbar navbar-expand-md navbar-dark fixed-top">
    <a class="navbar-brand" href="<?= $base_url . '?controller=Home&&function=index' ?>">
      <img src="./assets/images/white-logo-transparent-background.png" class="img-fluid nav_brand_img" alt="" />
    </a>
    <div class="tab-view">
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse justify-content-end" id="navbarSupportedContent">
        <ul class="navbar-nav">
          <li class="nav-item book-now l_line hoverw">
            <a class="nav-link" href="<?= $base_url . '?controller=Home&&function=index' ?>" onclick="login_set()">Book now</a>
          </li>
          <li class="nav-item prices l_line">
            <a class="nav-link" href="<?= $base_url . '?controller=Home&&function=prices' ?>">Prices & services</a>
          </li>
          <li class="nav-item guarantee">
            <a class="nav-link">Our Guarantee</a>
          </li>
          <li class="nav-item blog">
            <a class="nav-link">Blog</a>
          </li>
          <li class="nav-item contact">
            <a class="nav-link" href="<?= $base_url . '?controller=Home&&function=contact' ?>">Contact us</a>
          </li>
          <form>
            <li class="nav-item login l_line hoverw">
              <a class="nav-link" href="<?= $base_url . '?controller=Home&&function=index' ?>" onclick="login_set()">Login</a>
            </li>
          </form>
          <li class="nav-item helper l_line hoverw">
            <a class="nav-link" href="<?= $base_url . '?controller=Home&&function=service' ?>">Become a Helper</a>
          </li>
        </ul>
      </div>
    </div>
