<?php $base_url = "http://localhost/HelperLand/"; ?>
<section id="header">
  <nav class="navbar navbar-expand-md navbar-dark fixed-top">
    <a class="navbar-brand" href="<?= $base_url . '?controller=Home&&function=index' ?>">
      <img src="./assets/images/white-logo-transparent-background.png" class="img-fluid nav_brand_img" alt="" />
    </a>
    <div class="tab-view tab-navbar">
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse justify-content-end" id="navbarSupportedContent">
        <ul class="navbar-nav">
          <li class="nav-item prices">
            <a class="nav-link" href="<?= $base_url . '?controller=Home&&function=prices' ?>">Prices & services</a>
          </li>
          <li class="nav-item Warranty">
            <a class="nav-link">Warranty</a>
          </li>
          <li class="nav-item blog">
            <a class="nav-link">Blog</a>
          </li>
          <li class="nav-item contact">
            <a class="nav-link" href="<?= $base_url . '?controller=Home&&function=contact' ?>">Contact</a>
          </li>
          <div class="pipe"></div>
          <li class="nav-item Notification">
            <a class="nav-link"><img src="./assets/images/notification.png" class="img-fluid notification-img" /></a>
            <span class="badge">2</span>
          </li>
          <div class="pipe"></div>
          <li class="nav-item user">
            <div class="dropdown dropstart">
              <a class="btn menu dropdown-toggle" id="drop1" data-bs-toggle="dropdown" aria-expanded="false">
                <img src="./assets/images/user.png" class="img-fluid user-img" />
                <img src="./assets/images/dropdown.png" class="img-fluid" />
              </a>
              <ul class="dropdown-menu" aria-labelledby="drop1">
                <li><a class="dropdown-item disabled">Welcome,<br><b><?php echo $_SESSION['UserName'] ?></b></a></li>
                <hr>
                <li><a class="dropdown-item" href="<?= $base_url . '?controller=Home&&function=sp_newService' ?>">My Dashboard</a></li>
                <li><a class="dropdown-item" href="<?= $base_url . '?controller=Home&&function=sp_mySetting' ?>">My Settings</a></li>
                <li><a class="dropdown-item" onclick="logout()">Logout</a></li>
              </ul>
            </div>
          </li>
        </ul>
      </div>
    </div>
    <div class="notification-mobile mobile-view">
      <div class="pipe"></div>
      <li class="nav-item Notification">
        <a class="nav-link"><img src="./assets/images/notification.png" class="img-fluid notification-img" /></a>
        <span class="badge">2</span>
      </li>
      <div class="pipe"></div>
    </div>
    </div>
    <div class="mobile-view dashboard-item">
      <button class="btn" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasR" aria-controls="offcanavasRight">
        <span><i class="bi bi-list"></i></span>
      </button>
      <div class="offcanvas offcanvas-end" id="offcanvasR" aria-labelledby="offcanvasRightL">
        <ul>
          <li class="nav-item">
            <a class="nav-link">Welcome</a>
          </li>
          <li class="nav-item">
            <a class="nav-link name"><b><?php echo $_SESSION['UserName'] ?></b></a>
          </li>
          <hr />
          <li class="nav-item">
            <a class="nav-link">Dashboard</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?= $base_url . '?controller=Home&&function=sp_newService' ?>">New Service Requests</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?= $base_url . '?controller=Home&&function=sp_upComingService' ?>">Upcoming Services</a>
          </li>
          <li class="nav-item">
            <a class="nav-link">Service Schedule</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?= $base_url . '?controller=Home&&function=sp_serviceHistory' ?>">Service History</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?= $base_url . '?controller=Home&&function=sp_myRating' ?>">My Ratings</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?= $base_url . '?controller=Home&&function=sp_blockCustomer' ?>">Block Customer</a>
          </li>
          <li class="nav-item">
            <a class="nav-link">Invoices</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?= $base_url . '?controller=Home&&function=sp_mySetting' ?>">My Setting</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" onclick="logout()">Logout</a>
          </li>
          <hr />
          <li class="nav-item">
            <a class="nav-link" href="<?= $base_url . '?controller=Home&&function=prices' ?>">Prices & services</a>
          </li>
          <li class="nav-item">
            <a class="nav-link">Warranty</a>
          </li>
          <li class="nav-item">
            <a class="nav-link">Blog</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?= $base_url . '?controller=Home&&function=contact' ?>">Contact</a>
          </li>
          <hr />
          <div class="icon-social">
            <i class="bi bi-facebook"></i>
            <i class="bi bi-instagram"></i>
          </div>
        </ul>
      </div>
    </div>
  </nav>
