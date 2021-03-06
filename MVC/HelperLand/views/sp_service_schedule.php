<?php 
  if(!isset($_SESSION['UserTypeId']) || $_SESSION['UserTypeId']!=2)
  {
    header('LOCATION:http://localhost/HelperLand/?controller=Home&&function=index');
  }
  else{
?>
<!DOCTYPE html>
<html>

<head>
  <title>Helperland</title>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <link rel="stylesheet" type="text/css" href="./assets/css/header4.css" />
  <link rel="stylesheet" type="text/css" href="./assets/css/footer2.css" />
  <link rel="stylesheet" type="text/css" href="./assets/css/sp_service_schedule.css" />
  <link rel="stylesheet" type="text/css" href="./assets/css/media.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.4.0/fullcalendar.css" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css" />
</head>
<body onload="sp_serive_schedule(<?php echo $_SESSION['userId'] ?>)">
<div class="preloader"></div>
  <?php
    require_once('header4.php');
  ?>
</section>
  <div class="welcome">
    <p>Welcome,<b><?php echo $_SESSION['UserName'] ?></b></p>
  </div>
  <div class="hr-line"></div>
  <div class="modal fade" id="details_request" tabindex="-1" aria-hidden="true">
  </div>
  <div class="ss_title">Service Schedule</div>
  <div class="mid-dash">
    <section id="list">
      <div class="list-group">
        <a class="list-group-item">Dashboard</a>
        <a class="list-group-item" href="<?= $base_url.'?controller=Home&&function=sp_newService' ?>">New Service Requests</a>
        <a class="list-group-item" href="<?= $base_url.'?controller=Home&&function=sp_upComingService' ?>">Upcoming Services</a>
        <a class="list-group-item active" href="<?= $base_url.'?controller=Home&&function=sp_service_schedule' ?>">Service Schedule</a>
        <a class="list-group-item" href="<?= $base_url . '?controller=Home&&function=sp_serviceHistory' ?>">Service History</a>
        <a class="list-group-item" href="<?= $base_url . '?controller=Home&&function=sp_myRating' ?>">My Ratings</a>
        <a class="list-group-item" href="<?= $base_url . '?controller=Home&&function=sp_blockCustomer' ?>">Block Customer</a>
      </div>
    </section>
    <div class="calendar">
      <ul>
        <div>
        <li class="completed">Completed</li>
        <li class="upcoming">Upcoming</li>
        </div>
      </ul>
    </div>
  </div>
  <?php
    require_once("footer2.php");
    ?>
  <script src="./assets/js/helperland.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
    crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.18.1/moment.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.4.0/fullcalendar.min.js"></script>
</body>
</html>
<?php
  }
?>