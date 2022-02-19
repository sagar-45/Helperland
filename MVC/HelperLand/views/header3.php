<!DOCTYPE html>
<html>

<head>
  <title>Helperland</title>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <link rel="stylesheet" type="text/css" href="./assets/css/header3.css" />
  <link rel="stylesheet" type="text/css" href="./assets/css/list.css" />
  <link rel="stylesheet" type="text/css" href="./assets/css/pagination.css" />
  <link rel="stylesheet" type="text/css" href="./assets/css/footer2.css" />
  <link rel="stylesheet" type="text/css" href="./assets/css/<?php echo $function; ?>.css" />
  <link rel="stylesheet" type="text/css" href="./assets/css/media.css" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css" />
</head>

<body id="<?php echo $function; ?>">
<?php $base_url="http://localhost/HelperLand/" ;?>
  <section id="header">
    <nav class="navbar navbar-expand-md navbar-dark fixed-top">
      <a class="navbar-brand" href="<?= $base_url.'?controller=Home&&function=index'?>">
        <img src="./assets/images/white-logo-transparent-background.png" class="img-fluid nav_brand_img logo" alt="" />
      </a>
      <div class="tab-view tab-navbar">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
          aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse justify-content-end" id="navbarSupportedContent">
          <ul class="navbar-nav">
            <li class="nav-item book-now">
              <a class="nav-link" href="<?= $base_url.'?controller=Home&&function=book_service' ?>">Book now</a>
            </li>
            <li class="nav-item prices">
              <a class="nav-link" href="<?= $base_url.'?controller=Home&&function=prices'?>">Prices & services</a>
            </li>
            <li class="nav-item Warranty">
              <a class="nav-link">Warranty</a>
            </li>
            <li class="nav-item blog">
              <a class="nav-link">Blog</a>
            </li>
            <li class="nav-item contact">
              <a class="nav-link" href="<?= $base_url.'?controller=Home&&function=contact'?>">Contact</a>
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
                <li><a class="dropdown-item disabled" >Welcome,<br><b><?php echo $_SESSION['UserName'] ?></b></a></li><hr>
                  <li><a class="dropdown-item" href="#">My Dashboard</a></li>
                  <li><a class="dropdown-item" href="#">My Settings</a></li>
                  <li><a class="dropdown-item" onclick="logout()">Logout</a></li>
                </ul>
              </div>
            </li>
          </ul>
        </div>
      </div>
      <div class="notification-mobile">
        <div class="pipe"></div>
        <li class="nav-item Notification">
          <a class="nav-link"><img src="./assets/images/notification.png" class="img-fluid notification-img" /></a>
          <span class="badge">2</span>
        </li>
        <div class="pipe"></div>
      </div>
      <div class="mobile-view dashboard-item">
        <button class="btn" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasR"
          aria-controls="offcanavasRight">
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
              <a class="nav-link" href="<?= $base_url.'?controller=Home&&function=customer_service_history'?>">Service History</a>
            </li>
            <li class="nav-item">
              <a class="nav-link">Service Schedule</a>
            </li>
            <li class="nav-item">
              <a class="nav-link">Favourite Pros</a>
            </li>
            <li class="nav-item">
              <a class="nav-link">Invoices</a>
            </li>
            <li class="nav-item">
              <a class="nav-link">Notifications</a>
            </li>
            <li class="nav-item">
              <a class="nav-link">My Setting</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" onclick="logout()">Logout</a>
            </li>
            <hr />
            <li class="nav-item">
              <a class="nav-link" href="<?= $base_url.'?controller=Home&&function=prices'?>">Prices & services</a>
            </li>
            <li class="nav-item">
              <a class="nav-link">Warranty</a>
            </li>
            <li class="nav-item">
              <a class="nav-link">Blog</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="<?= $base_url.'?controller=Home&&function=contact'?>">Contact</a>
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
