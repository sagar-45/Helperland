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
    echo '<link rel="stylesheet" type="text/css" href="./assets/css/header2.css" />';
  }
  ?>
  <link rel="stylesheet" type="text/css" href="./assets/css/FAQ.css" />
  <link rel="stylesheet" type="text/css" href="./assets/css/footer2.css" />
  <link rel="stylesheet" type="text/css" href="./assets/css/news_letter.css" />
  <link rel="stylesheet" type="text/css" href="./assets/css/media.css" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css" />
  <script>
    function login_set() {
      sessionStorage.afterPages = 2;
    }
  </script>
</head>

<body id="FAQ">

  <?php
  if (isset($_SESSION['UserTypeId']) && $_SESSION['UserTypeId'] == 1) {
    require_once('header3.php');
  } elseif (isset($_SESSION['UserTypeId']) && $_SESSION['UserTypeId'] == 2) {
    require_once('header4.php');
  } else {
    include('header2.php');
    require_once('navbar_mobile_view.php');
  }
  ?>
  </section>
  <!--search section start-->
  <section id="search">
    <img src="./assets/images/group-16.png" class="img-fluid" alt="" />
  </section>
  <!--search section end-->
  <!-- faq section start-->
  <section id="faq">
    <div class="title">FAQs</div>
    <div class="star">
      <div class="line1"></div>
      <img src="./assets/images/star.png" class="img-fluid" alt="" />
      <div class="line2"></div>
    </div>
    <div class="text">
      Whether you are Customer or Service provider,We have tried our best to
      solve all your queries and questions.
    </div>
    <ul class="nav nav-tabs" id="myTab">
      <li class="nav-item">
        <a href="#accordionId" class="nav-link text-customer active" data-bs-toggle="tab">FOR CUSTOMER</a>
      </li>
      <li class="nav-item">
        <a href="#accordionId2" class="nav-link text-provider" data-bs-toggle="tab">FOR SERVICE PROVIDER</a>
      </li>
    </ul>
    <div class="tab-content">
      <div class="tab-pane accordion fade show active" id="accordionId">
        <div>
          <div class="heading" id="headingOne">
            <span class="head_title" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
              What's included in a cleaning?
            </span>
          </div>
          <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionId">
            <div class="accordion-body">
              Bedroom, Living Room & Common Areas, Bathrooms, Kitchen, Extras
            </div>
          </div>
        </div>
        <div>
          <div class="heading" id="headingTwo">
            <span class="head_title collapsed" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
              Which Helperland professional will come to my place?
            </span>
          </div>
          <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionId">
            <div class="accordion-body">
              Helperland has a vast network of experienced, top-rated cleaners. Based on the time and date of your request, we work to assign the best professional available. Like working with a specific pro? Add them to your Pro Team from the mobile app and they'll be requested first for all future bookings. You will receive an email with details about your professional prior to your appointment.
            </div>
          </div>
        </div>
        <div>
          <div class="heading" id="headingThree">
            <span class="head_title collapsed" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
              Can I skip or reschedule bookings?
            </span>
          </div>
          <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionId">
            <div class="accordion-body">
              You can reschedule any booking for free at least 24 hours in advance of the scheduled start time. If you need to skip a booking within the minimum commitment, we’ll credit the value of the booking to your account. You can use this credit on future cleanings and other Helperland services.
            </div>
          </div>
        </div>
        <div>
          <div class="heading" id="headingFour">
            <span class="head_title collapsed" data-bs-toggle="collapse" data-bs-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
              Do I need to be home for the booking?
            </span>
          </div>
          <div id="collapseFour" class="accordion-collapse collapse" aria-labelledby="headingFour" data-bs-parent="#accordionId">
            <div class="accordion-body">
              We strongly recommend that you are home for the first clean of your booking to show your cleaner around. Some customers choose to give a spare key to their cleaner, but this decision is based on individual preferences.
            </div>
          </div>
        </div>
      </div>
      <div class="tab-pane fade accordion" id="accordionId2">
        <div>
          <div class="heading" id="headingOne">
            <span class="head_title" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
              How much do service providers earn?
            </span>
          </div>
          <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionId2">
            <div class="accordion-body">
              The self-employed service providers working with Helperland set their own payouts, this means that they decide how much they earn per hour.
            </div>
          </div>
        </div>
        <div>
          <div class="heading" id="headingTwo">
            <span class="head_title collapsed" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
              What support do you provide to the service providers?
            </span>
          </div>
          <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionId2">
            <div class="accordion-body">
              Our call-centre is available to assist the service providers with all queries or issues in regards to their bookings during office hours. Before a service provider starts receiving jobs, every individual partner receives an orientation session to familiarise with the online platform and their profile.
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- faq section end-->
  <!-- news-letter section start-->
  <?php
  include('news_letter.php');
  include('footer2.php');
  ?>
  <script src="./assets/js/helperland.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</body>

</html>
