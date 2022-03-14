<?php 
  if(!isset($_SESSION['UserTypeId']) || $_SESSION['UserTypeId']!=1)
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
  <link rel="stylesheet" type="text/css" href="./assets/css/header3.css" />
  <link rel="stylesheet" type="text/css" href="./assets/css/footer2.css" />
  <link rel="stylesheet" type="text/css" href="./assets/css/customer_dashboard.css" />
  <link rel="stylesheet" type="text/css" href="./assets/css/media.css" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/rateYo/2.3.2/jquery.rateyo.min.css">
  <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap5.min.css">
  <link rel="stylesheet" href="//code.jquery.com/ui/1.13.1/themes/base/jquery-ui.css">
</head>
<?php
$status1=0;
$status2=1;
?>
<body id="customer_dashboard" onload="loadnewServiceRequest(<?php echo $_SESSION['userId'] ?>,<?php echo $status1 ?>,<?php echo $status2 ?>)">
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
  <div class="modal fade" id="reschedule_request" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
          <div class="modal-content">
                  <div class="modal-header">
                      <h5>Reschedule Service Request</h5>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-labelledby="close"></button>
                  </div>
                  <div class="alert alert-danger fade show" role="alert">
                  </div>
                  Select New Date & Time
                  <div class="reschedule_date_time">
                    <div class="date">
                      <img src="./assets/images/admin_calendar.png">
                      <input type="text" value="<?php echo date("d/m/Y"); ?>"/>
                    </div>
                    <select id="when_need">
                      <option value="08.00">8:00</option>
                      <option value="08.30">8:30</option>
                      <option value="09.00">9:00</option>
                      <option value="09.30">9:30</option>
                      <option value="10.00">10:00</option>
                      <option value="10.30">10:30</option>
                      <option value="11.00">11:00</option>
                      <option value="11.30">11:30</option>
                      <option value="12.00">12:00</option>
                      <option value="12.30">12:30</option>
                      <option value="13.00">13:00</option>
                      <option value="13.30">13:30</option>
                      <option value="14.00">14:00</option>
                      <option value="14.30">14:30</option>
                      <option value="15.00">15:00</option>
                      <option value="15.30">15:30</option>
                      <option value="16.00">16:00</option>
                      <option value="16.30">16:30</option>
                      <option value="17.00">17:00</option>
                      <option value="17.30">17:30</option>
                      <option value="18.00">18:00</option>
                    </select>
                  </div>
                  <button class="btn reschedule_btn" id='0' onclick="reschedule_request_date_time(this.id,<?php echo $_SESSION['userId'] ?>)">Update</button>
          </div>
    </div>
  </div>
  <div class="modal fade" id="cancle_request" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                    <div class="modal-header">
                        <h5>Cancle Service Request</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-labelledby="close"></button>
                    </div>
                    <div class="reason">
                      Why you want to cancle the service request?
                      <textarea rows='3'></textarea>
                    </div>
                    <button class="btn reschedule_btn cancle_btn" onclick="cancle_btn(this.id,<?php echo $_SESSION['userId'] ?>)">Cancle Now</button>
            </div>
    </div>
  </div>
  <div class="mid-dash">
    <section id="list">
      <div class="list-group">
        <a class="list-group-item active">Dashboard</a>
        <a class="list-group-item" href="<?= $base_url.'?controller=Home&&function=customer_service_history' ?>">Service History</a>
        <a class="list-group-item">Service Schedule</a>
        <a class="list-group-item" href="<?= $base_url.'?controller=Home&&function=customer_favorite_sp'?>">Favourite Pros</a>
        <a class="list-group-item">Invoices</a>
        <a class="list-group-item">Notification</a>
      </div>
    </section>
    <div class="table_page">
      <div class="service_head">
        <span class="service_txt">Current Service Requests</span>
        <a href="<?= $base_url.'?controller=Home&&function=book_service'?>"><button class="btn export">Add new Service Request</button></a>
      </div>
      <section id="service_history">
        <table class="table">
          <thead>
            <tr>
              <th scope="col">
                Service Id
              </th>
              <th scope="col">
                Service Date
              </th>
              <th scope="col">
                Service Provider
              </th>
              <th scope="col">
                Payment
              </th>
              <th scope="col">
                Action
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
  <script src="https://code.jquery.com/ui/1.13.1/jquery-ui.js"></script>
</body>

</html>
<?php
  }
  ?>