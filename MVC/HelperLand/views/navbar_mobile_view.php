<div class="mobile-view">
  <a class="btn" data-bs-toggle="offcanvas" data-bs-target="#offcanvasR" aria-controls="offcanavasRight">
    <span><i class="bi bi-list"></i></span>
  </a>
  <div class="offcanvas offcanvas-end" id="offcanvasR" aria-labelledby="offcanvasRightL">
    <ul>
      <li class="nav-item">
        <a class="nav-link" href="#">Book a Cleaner</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="<?= $base_url . '?controller=Home&&function=prices'; ?>">Prices</a>
      </li>
      <li class="nav-item">
        <a class="nav-link">Our Guarantee</a>
      </li>
      <li class="nav-item">
        <a class="nav-link">Blog</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="<?= $base_url . '?controller=Home&&function=contact'; ?>">Contact us</a>
      </li>
      <li class="nav-item" data-bs-toggle="modal" data-bs-target="#login" data-bs-dismiss="offcanvas">
        <a class="nav-link" onclick="login_set()">Login</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="<?= $base_url . '?controller=Home&&function=service' ?>">Become a Helper</a>
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
