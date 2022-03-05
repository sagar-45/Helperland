<!DOCTYPE html>
<html>

<head>
  <title>Helperland</title>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <link rel="stylesheet" type="text/css" href="./assets/css/header3.css" />
  <link rel="stylesheet" type="text/css" href="./assets/css/pagination.css" />
  <link rel="stylesheet" type="text/css" href="./assets/css/footer2.css" />
  <link rel="stylesheet" type="text/css" href="./assets/css/serviceH.css" />
  <link rel="stylesheet" type="text/css" href="./assets/css/media.css" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/rateYo/2.3.2/jquery.rateyo.min.css">
  <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap5.min.css">
</head>
<?php
$status1=3;
$status2=4;
?>
<body id="serviceH" onload="loadnewServiceRequest(<?php echo $_SESSION['userId'] ?>,<?php echo $status1 ?>,<?php echo $status2 ?>)">
<div class="preloader"></div>
<?php
    require_once('header3.php');
?>
</section>
<div class="welcome">
    <p>Welcome,<b><?php echo $_SESSION['UserName'] ?></b></p>
  </div>
  <div class="hr"></div>
  <div class="modal fade" id="details_request" tabindex="-1" aria-hidden="true">
  </div>
  <div class="modal fade" id="rate_sp" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
    </div>
  </div>
  <div class="mid-dash">
    <section id="list">
      <div class="list-group">
        <a class="list-group-item" href="<?= $base_url.'?controller=Home&&function=customer_dashboard' ?>">Dashboard</a>
        <a class="list-group-item active">Service History</a>
        <a class="list-group-item">Service Schedule</a>
        <a class="list-group-item">Favourite Pros</a>
        <a class="list-group-item">Invoices</a>
        <a class="list-group-item">Notification</a>
      </div>
    </section>
  <div class="table_page">
      <div class="service_head">
        <span class="service_txt">Service History</span>
      </div>
      <section id="service_history">
        <table class="table">
          <thead>
            <tr>
            <th scope="col">
                Service Id
              </th>
              <th scope="col">
                Service Details
              </th>
              <th scope="col">
                Service Provider
              </th>
              <th scope="col">
                Payment
              </th>
              <th scope="col">
                Status
              </th>
              <th scope="col">
                Rate SP
              </th>
            </tr>
          </thead>
          <tbody>
          </tbody>
        </table>
      </section>
    </div>
  </div>
    <?php
    require_once('footer2.php')
    ?>
  <script src="./assets/js/helperland.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
    crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/rateYo/2.3.2/jquery.rateyo.min.js"></script>
  <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap5.min.js"></script>
  <script src="https://cdn.datatables.net/buttons/2.2.2/js/dataTables.buttons.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
  <script src="https://cdn.datatables.net/buttons/2.2.2/js/buttons.html5.min.js"></script>
</body>

</html>
