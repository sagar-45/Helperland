<!DOCTYPE html>
<html>

<head>
  <title>Helperland</title>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <?php
  if (isset($_SESSION['UserTypeId']) && $_SESSION['UserTypeId'] == 1) {
    echo '<link rel="stylesheet" type="text/css" href="./assets/css/header3.css" />';
  } elseif (isset($_SESSION['UserTypeId']) && $_SESSION['UserTypeId'] == 2) {
    echo '<link rel="stylesheet" type="text/css" href="./assets/css/header4.css" />';
  } else {
    echo '<link rel="stylesheet" type="text/css" href="./assets/css/header1.css" />';
  }
  ?>
  <link rel="stylesheet" type="text/css" href="./assets/css/login_forgot_card.css" />
  <link rel="stylesheet" type="text/css" href="./assets/css/footer2.css" />
  <link rel="stylesheet" type="text/css" href="./assets/css/home.css" />
  <link rel="stylesheet" type="text/css" href="./assets/css/media.css" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css" />
  <link rel="stylesheet" href="//code.jquery.com/ui/1.13.1/themes/base/jquery-ui.css">
</head>

<body id="home">
  <div class="preloader"></div>
  <?php
  if (isset($_SESSION['UserTypeId']) && $_SESSION['UserTypeId'] == 1) {
    require_once('header3.php');
  } else if (isset($_SESSION['UserTypeId']) && $_SESSION['UserTypeId'] == 2) {
    require_once('header4.php');
  } else {
    include('header1.php');
    require_once("navbar_mobile_view.php");
    require_once('card_modal.php');
  }

  ?>
  <div class="text">
    <div class="main-text">Do not feel like housework?</div>
    <div class="text_desc"><span>Great! Book now for Helperland and enjoy the benefits</span></div>
    <div class="text_desc">
      <img src="./assets/images/true.png" class="img-fluid" alt="" />
      <span>certified & insured helper</span>
    </div>
    <div class="text_desc">
      <img src="./assets/images/true.png" class="img-fluid" alt="" />
      <span>easy booking procedure</span>
    </div>
    <div class="text_desc">
      <img src="./assets/images/true.png" class="img-fluid" alt="" />
      <span>friendly customer service</span>
    </div>
    <div class="text_desc">
      <img src="./assets/images/true.png" class="img-fluid" alt="" />
      <span>secure online payment method</span>
    </div>
  </div>
  <?php
  if ((isset($_SESSION['UserTypeId']) && $_SESSION['UserTypeId'] != 2)) {
  ?>
    <a href="<?= $base_url . '?controller=Home&&function=book_service' ?>" class="book_clean"><button class="btn">Let’s Book a Cleaner</button></a>
  <?php
  }
  if (!isset($_SESSION['UserTypeId'])) {
  ?>
    <a data-bs-toggle="modal" data-bs-target="#login" class="book_clean"><button class="btn">Let’s Book a Cleaner</button></a>
  <?php
  }
  ?>
  <div class="step">
    <div class="step-1">
      <img src="./assets/images/1-img.png" class="img-fluid" />
      <p>Enter your postcode</p>
    </div>
    <img src="./assets/images/step-arrow-1.png" alt="" class="img-fluid step-arrow" />
    <div class="step-1">
      <img src="./assets/images/2-img.png" class="img-fluid" />
      <p>Select your plan</p>
    </div>
    <img src="./assets/images/step-arrow-2.png" alt="" class="img-fluid step-arrow" />
    <div class="step-1">
      <img src="./assets/images/3-img.png" class="img-fluid" />
      <p>Pay securely online</p>
    </div>
    <img src="./assets/images/step-arrow-1.png" alt="" class="img-fluid step-arrow" />
    <div class="step-1">
      <img src="./assets/images/4-img.png" class="img-fluid" />
      <p>Enjoy amazing service</p>
    </div>
  </div>
  <img src="./assets/images/com-down.png" class="com-down" alt="" />
  </section>
  <!-- home section end -->
  <!-- card section start -->
  <section id="why-helperland">
    <p class="title">Convince yourself!</p>
    <div class="cards">
      <div class="card-1">
        <img src="./assets/images/group-21.png" alt="" class="img-fluid" />
        <div class="card_head">Friendly & Certified Helpers</div>
        <div class="card_desc">
          We want you to be completely satisfied with our service and feel comfortable at home. In order to guarantee this, our helpers go through a test procedure. Only when the cleaners meet our high standards, they may call themselves Helper.
        </div>
      </div>
      <div class="card-1">
        <img src="./assets/images/group-23.png" alt="" class="img-fluid" />
        <div class="card_head">Transparent and secure payment</div>
        <div class="card_desc">
          We have transparent prices, you do not have to scratch money or money on the sideboard Leave it: Pay your helper easily and securely via the online payment method. You will also receive an invoice for each completed cleaning.
        </div>
      </div>
      <div class="card-1">
        <img src="./assets/images/group-24.png" alt="" class="img-fluid" />
        <div class="card_head">We're here for you</div>
        <div class="card_desc">
          You have a question or need assistance with the booking process? Our customer service is happy to help and advise you. How you can reach us you will find out when you look under "Contact". We look forward to hearing from you or reading.
        </div>
      </div>
    </div>
  </section>
  <!-- card section end -->
  <div class="sec_rect">
    <!-- three image section start -->
    <section id="img-section">
      <img src="./assets/images/group-36.png" alt="" class="img-fluid" />
      <div class="img-text">
        <div class="section_head">
          We do not know what makes you happy, but ...
        </div>
        <div class="section_desc">
          <p>
            If it's not dusting off, our friendly helpers will free you from this burden - do not worry anymore about spending valuable time doing housework, but savor life, you're well worth your time with beautiful experiences. Free yourself and enjoy the gained time: Go celebrate, relax, play with your children, meet friends or dare to jump on the bungee.Other leisure ideas and exclusive events can be found in our blog - guaranteed free from dust and cleaning tips!
          </p>
        </div>
      </div>
    </section>
    <!-- three image section end -->
    <!-- our blog section start-->
    <section id="our_blog">
      <p class="title">Our Blog</p>
      <div class="cards">
        <div class="card-1">
          <img src="./assets/images/group-28.png" class="img=fluid card_img" alt="" />
          <div class="card_head">Lorem ipsum dolor sit amet</div>
          <span class="date">January 28, 2019</span>
          <div class="card_desc">
            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed
            fermentum metus pulvinar aliquet.
          </div>
          <button class="btn read_more">
            Read the Post<img src="./assets/images/arrow-black.png" />
          </button>
        </div>
        <div class="card-1">
          <img src="./assets/images/group-29.png" class="img=fluid card_img" alt="" />
          <div class="card_head">Lorem ipsum dolor sit amet</div>
          <span class="date">January 28, 2019</span>
          <div class="card_desc">
            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed
            fermentum metus pulvinar aliquet.
          </div>
          <button class="btn read_more">
            Read the Post<img src="./assets/images/arrow-black.png" />
          </button>
        </div>
        <div class="card-1">
          <img src="./assets/images/group-30.png" class="img=fluid card_img" alt="" />
          <div class="card_head">Lorem ipsum dolor sit amet</div>
          <span class="date">January 28, 2019</span>
          <div class="card_desc">
            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed
            fermentum metus pulvinar aliquet.
          </div>
          <button class="btn read_more">
            Read the Post<img src="./assets/images/arrow-black.png" />
          </button>
        </div>
      </div>
    </section>
    <!-- our blog section end -->
  </div>
  <!-- customer say section start -->
  <section id="customer_say">
    <p class="title">What Our Customers Say</p>
    <div class="cards">
      <div class="card-1">
        <img src="./assets/images/message.png" class="img_fuid message" alt="" />
        <div class="customer_details">
          <img src="./assets/images/group-31.png" class="img-fluid" alt="" />
          <div class="c_name">
            <span>Lary Watson</span><br />
            <span>Manchester</span>
          </div>
        </div>
        <div class="customer_response">
          <p>
            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed
            fermentum metus pulvinar aliquet consequat. Praesent nec malesuada
            nibh.
          </p>
          <p>
            Nullam et metus congue, auctor augue sit amet, consectetur tortor.
          </p>
        </div>
        <button class="btn read_more">
          Read the Post<img src="./assets/images/arrow-black.png" />
        </button>
      </div>
      <div class="card-1">
        <img src="./assets/images/message.png" class="img_fuid message" alt="" />
        <div class="customer_details">
          <img src="./assets/images/group-32.png" class="img-fluid" alt="" />
          <div class="c_name">
            <span>John Smith</span><br />
            <span>Manchester</span>
          </div>
        </div>
        <div class="customer_response">
          <p>
            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed
            fermentum metus pulvinar aliquet consequat. Praesent nec malesuada
            nibh.
          </p>
          <p>
            Nullam et metus congue, auctor augue sit amet, consectetur tortor.
          </p>
        </div>
        <button class="btn read_more">
          Read the Post<img src="./assets/images/arrow-black.png" />
        </button>
      </div>
      <div class="card-1">
        <img src="./assets/images/message.png" class="img_fuid message" alt="" />
        <div class="customer_details">
          <img src="./assets/images/group-33.png" class="img-fluid" alt="" />
          <div class="c_name">
            <span>Lars Johnson</span><br />
            <span>Manchester</span>
          </div>
        </div>
        <div class="customer_response">
          <p>
            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed
            fermentum metus pulvinar aliquet consequat. Praesent nec malesuada
            nibh.
          </p>
          <p>
            Nullam et metus congue, auctor augue sit amet, consectetur tortor.
          </p>
        </div>
        <button class="btn read_more">
          Read the Post<img src="./assets/images/arrow-black.png" />
        </button>
      </div>
    </div>
    <!--Newsletter section start-->
    <section id="news-letter">
      <div class="container-fluid">
        <div class="news-letter-title">GET OUR NEWSLETTER</div>
        <div class="email-get">
          <input type="text" placeholder="Your Email" class="news-email" />
          <div class="news-button">
            <span class="button-text">submit</span>
          </div>
        </div>
      </div>
      <div class="img">
        <img src="./assets/images/layer-598.png" class="img-fluid" alt="" />
      </div>
    </section>
    <!--Newsletter section end-->
  </section>
  <!-- customer say section end -->
  <a href="#header" class="up-arrow">
    <img src="./assets/images/up-arrow.png" class="img-fluid" alt="" />
  </a>
  <!--footer section start-->
  <?php
  require_once('footer2.php');
  ?>

  <script>
    window.onload = function() {
      <?php
      if (isset($_GET['token'])) {
      ?>
        user_active('<?php echo $_GET['token'] ?>');
      <?php
      }
      ?>
      if (sessionStorage.getItem("afterPages") == 2) {
        login_popup();
        sessionStorage.setItem("afterPages", 0);
      }
      <?php
      if (isset($_SESSION['register'])) {
      ?>
        login_popup();
      <?php
        unset($_SESSION['register']);
      }
      ?>
      if (sessionStorage.getItem("logout") == 2) {
        document.querySelector(".logout").click();
        sessionStorage.setItem("logout", 0);
      }
    }
  </script>
  <script src="./assets/js/helperland.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>

</html>
