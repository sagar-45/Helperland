<!DOCTYPE html>
<html>

<head>
  <title>Helperland</title>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <?php
    if(isset($_SESSION['UserTypeId']) && $_SESSION['UserTypeId']==1)
    {
        echo '<link rel="stylesheet" type="text/css" href="./assets/css/header3.css" />'; 
    }
    elseif(isset($_SESSION['UserTypeId']) && $_SESSION['UserTypeId']==2)
    {
        echo '<link rel="stylesheet" type="text/css" href="./assets/css/header4.css" />';
    }
    else
    {
        echo '<link rel="stylesheet" type="text/css" href="./assets/css/header2.css" />';
    }
  ?>
  <link rel="stylesheet" type="text/css" href="./assets/css/price.css" />
  <link rel="stylesheet" type="text/css" href="./assets/css/footer2.css" />
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

<body id="price">

<?php
      if(isset($_SESSION['UserTypeId']) && $_SESSION['UserTypeId']==1)
      {
          require_once('header3.php');
      }
      elseif(isset($_SESSION['UserTypeId']) && $_SESSION['UserTypeId']==2)
      {
        require_once('header4.php');
      }
      else
      {
        include('header2.php');
        require_once('navbar_mobile_view.php');
      }
 ?>
  </section>
  <!-- header section end -->
  <!-- img section start -->
  <section id="main-img">
    <img src="./assets/images/prices-img.png" class="img-fluid" alt="" />
  </section>
  <!-- img section end -->
  <!-- prices section start -->
  <section id="prices">
    <div class="title">Prices</div>
    <div class="star">
      <div class="line1"></div>
      <img src="./assets/images/star.png" class="img-fluid" alt="" />
      <div class="line2"></div>
    </div>
    <div class="one-time">
      <div class="one-time-title">
        <span>One Time</span>
      </div>
      <div class="rupee">
        <span class="uro">€</span><strong class="rs">20</strong>/hr
      </div>
      <div class="true-symbol">
        <div class="lower-prices">
          <img src="./assets/images/true-box.png" class="img-fluid" alt="" />
          <span class="text-price">Lower prices</span>
        </div>
        <div class="secure-payment div2">
          <img src="./assets/images/true-box.png" class="img-fluid" alt="" />
          <span class="secure-payment">Easy online & secure payment </span>
        </div>
        <div class="easy-amendment div2">
          <img src="./assets/images/true-box.png" class="img-fluid" alt="" />
          <span class="text-east">Easy amendment</span>
        </div>
      </div>
    </div>
    <div class="line"></div>
  </section>
  <!-- prices section end -->
  <!-- services section start -->
  <section id="services">
    <div class="title">Extra services</div>
    <div class="star">
      <div class="line1"></div>
      <img src="./assets/images/star.png" class="img-fluid" alt="" />
      <div class="line2"></div>
    </div>
    <div class="services-img">
      <div class="prices1 card-price">
        <div class="price img">
          <img src="./assets/images/price1.png" class="img-fluid" alt="" />
        </div>
        <div class="cabinets">Inside cabinets</div>
        <div class="minute">30 minutes</div>
      </div>
      <div class="prices2 card-price">
        <div class="price img">
          <img src="./assets/images/price2.png" class="img-fluid" alt="" />
        </div>
        <div class="cabinets">Inside cabinets</div>
        <div class="minute">30 minutes</div>
      </div>
      <div class="prices3 card-price">
        <div class="price img">
          <img src="./assets/images/price3.png" class="img-fluid" alt="" />
        </div>
        <div class="cabinets">Inside cabinets</div>
        <div class="minute">30 minutes</div>
      </div>
      <div class="prices4 card-price">
        <div class="price img">
          <img src="./assets/images/price4.png" class="img-fluid" alt="" />
        </div>
        <div class="cabinets">Inside cabinets</div>
        <div class="minute">30 minutes</div>
      </div>
      <div class="prices5 card-price">
        <div class="price img">
          <img src="./assets/images/price5.png" class="img-fluid" alt="" />
        </div>
        <div class="cabinets">Inside cabinets</div>
        <div class="minute">30 minutes</div>
      </div>
    </div>
  </section>
  <!-- services section end -->
  <!-- cleaning section start -->
  <section id="cleaning">
    <div class="title">What we include in cleaning</div>
    <div class="star">
      <div class="line1"></div>
      <img src="./assets/images/star.png" class="img-fluid" alt="" />
      <div class="line2"></div>
    </div>
    <div class="cleaning-cards row gx-0">
      <div class="cleaning-card col-12 col-md-3">
        <div class="img-1">
          <img src="./assets/images/cleaning-1.png" class="img-fluid" alt="" />
        </div>
        <div class="card-head">Bedroom and Living Room</div>
        <div class="card-desc">
          <img src="./assets/images/right-arrow.png" class="img-fluid" alt="" />
          <span>Dust all accessible surfaces</span>
        </div>
        <div class="card-desc">
          <img src="./assets/images/right-arrow.png" class="img-fluid" alt="" />
          <span>Wipe down all mirrors and glass fixtures</span>
        </div>
        <div class="card-desc">
          <img src="./assets/images/right-arrow.png" class="img-fluid" alt="" />
          <span>Clean all floor surfaces</span>
        </div>
        <div class="card-desc">
          <img src="./assets/images/right-arrow.png" class="img-fluid" alt="" />
          <span>Take out garbage and recycling</span>
        </div>
      </div>
      <div class="cleaning-card col-12 col-md-3">
        <div class="img-1">
          <img src="./assets/images/cleaning-2.png" class="img-fluid" alt="" />
        </div>
        <div class="card-head">Bathrooms</div>
        <div class="card-desc">
          <img src="./assets/images/right-arrow.png" class="img-fluid" alt="" />
          <span>Wash and sanitize the toilet, shower, tub, sink</span>
        </div>
        <div class="card-desc">
          <img src="./assets/images/right-arrow.png" class="img-fluid" alt="" />
          <span>Dust all accessible surfaces</span>
        </div>
        <div class="card-desc">
          <img src="./assets/images/right-arrow.png" class="img-fluid" alt="" />
          <span>Wipe down all mirrors and glass fixtures</span>
        </div>
        <div class="card-desc">
          <img src="./assets/images/right-arrow.png" class="img-fluid" alt="" />
          <span>Clean all floor surfaces</span>
        </div>
        <div class="card-desc">
          <img src="./assets/images/right-arrow.png" class="img-fluid" alt="" />
          <span>Take out garbage and recycling</span>
        </div>
      </div>
      <div class="cleaning-card col-12 col-md-3">
        <div class="img-1">
          <img src="./assets/images/cleaning-3.png" class="img-fluid" alt="" />
        </div>
        <div class="card-head">Kitchen</div>
        <div class="card-desc">
          <img src="./assets/images/right-arrow.png" class="img-fluid" alt="" />
          <span>Dust all accessible surfaces</span>
        </div>
        <div class="card-desc">
          <img src="./assets/images/right-arrow.png" class="img-fluid" alt="" />
          <span>Empty sink and load up dishwasher</span>
        </div>
        <div class="card-desc">
          <img src="./assets/images/right-arrow.png" class="img-fluid" alt="" />
          <span>Wipe down all mirrors and glass fixtures</span>
        </div>
        <div class="card-desc">
          <img src="./assets/images/right-arrow.png" class="img-fluid" alt="" />
          <span>Clean all floor surfaces</span>
        </div>
        <div class="card-desc">
          <img src="./assets/images/right-arrow.png" class="img-fluid" alt="" />
          <span>Take out garbage and recycling</span>
        </div>
      </div>
    </div>
  </section>
  <!-- cleaning section end -->
  <!-- why helperland section start -->
  <section id="why">
    <div class="title">Why Helperland</div>
    <div class="star">
      <div class="line1"></div>
      <img src="./assets/images/star.png" class="img-fluid" alt="" />
      <div class="line2"></div>
    </div>
    <div class="why-text">
      <div class="left-text">
        <div class="top-left">
          <div class="top-head">Experienced and vetted professionals</div>
          <div class="top-desc">
            dominate the industry in scale and scope with an adaptable,
            extensive network that consistently delivers exceptional results.
          </div>
        </div>
        <div class="bottom-left">
          <div class="top-head">Dedicated customer service</div>
          <div class="top-desc">
            to our customers and are guided in all we do by their needs. The
            team is always happy to support you and offer all the information.
          </div>
        </div>
      </div>
      <img src="./assets/images/the-best.png" alt="" class="img-fluid" />
      <div class="right-text">
        <div class="top-left">
          <div class="top-head">Every cleaning is insured</div>
          <div class="top-desc">
            and seek to provide exceptional service and engage in proactive
            behavior. We‘d be happy to clean your homes.
          </div>
        </div>
        <div class="top-left">
          <div class="top-head">Secure online payment</div>
          <div class="top-desc">
            Payment is processed securely online. Customers pay safely online
            and manage the booking.
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- why helperland section end -->
  <!--Newsletter section start-->
  <section id="news-letter">
    <div class="container-fluid">
      <div class="news-letter-title">GET OUR NEWSLETTER</div>
      <div class="email-get">
        <input type="text" placeholder="Your Email" class="news-email" />
        <div class="news-button"><span class="button-text">submit</span></div>
      </div>
    </div>
    <div class="img">
      <img src="./assets/images/layer-598.png" class="img-fluid" alt="" />
    </div>
  </section>
  <!--Newsletter section end-->
  <a href="#" class="up-arrow">
    <img src="./assets/images/up-arrow.png" class="img-fluid" alt="" />
  </a>
  <?php include('footer2.php');?>
  <script src="./assets/js/helperland.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
    crossorigin="anonymous"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</body>

</html>
