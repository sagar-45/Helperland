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
  <link rel="stylesheet" type="text/css" href="./assets/css/about.css" />
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

<body id="about">

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
  <!-- about image seaction start -->
  <section class="about-img">
    <img src="./assets/images/about-img.png" class="img-fluid aimg" alt="" />
  </section>
  <!-- about image seaction end -->
  <!-- about us section start -->
  <section id="about-us">
    <div class="title">A Few words about us</div>
    <div class="star">
      <div class="line1"></div>
      <img src="./assets/images/star.png" class="img-fluid" alt="" />
      <div class="line2"></div>
    </div>
    <div class="about-text">
      <p>
        We are providers of professional home cleaning services, offering hourly based house cleaning options, which mean that you don’t have to fret about getting your house cleaned anymore. We will handle everything for you, so that you can focus on spending your precious time with your family members.We have a number of experienced cleaners to help you make cleaning out or shifting your home an easy affair.
      </p>
    </div>
  </section>
  <!-- about us section end -->
  <!-- story section start -->
  <section id="story">
    <div class="title">Our Story</div>
    <div class="star">
      <div class="line1"></div>
      <img src="./assets/images/star.png" class="img-fluid" alt="" />
      <div class="line2"></div>
    </div>
    <div class="story-text">
      <p>
        A cleaner is a type of industrial or domestic worker who cleans homes or commercial premises for payment. Cleaners may specialise in cleaning particular things or places, such as window cleaners. Cleaners often work when the people who otherwise occupy the space are not around. They may clean offices at night or houses during the workday.
      </p>
    </div>
  </section>
  <!-- story section end -->

  <?php
  include('news_letter.php');
  include("footer2.php");
  ?>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</body>

</html>
