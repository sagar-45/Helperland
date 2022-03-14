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
  <link rel="stylesheet" type="text/css" href="./assets/css/customer_favorite_sp.css" />
  <link rel="stylesheet" type="text/css" href="./assets/css/media.css" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css" />
</head>

<body id="customer_dashboard" onload="loadnewServiceRequest(<?php echo $_SESSION['userId'] ?>,0,1)">
<div class="preloader"></div>
<?php
    require_once('header3.php');
?>
</section>
    <div class="welcome">
        <p>Welcome,<b><?php echo $_SESSION['UserName'] ?></b></p>
    </div>
  <div class="hr"></div>
    <div class="mid-dash">
        <section id="list">
            <div class="list-group">
                <a class="list-group-item" href="<?= $base_url.'?controller=Home&&function=customer_dashboard' ?>">Dashboard</a>
                <a class="list-group-item" href="<?= $base_url.'?controller=Home&&function=customer_service_history' ?>">Service History</a>
                <a class="list-group-item">Service Schedule</a>
                <a class="list-group-item active">Favourite Pros</a>
                <a class="list-group-item">Invoices</a>
                <a class="list-group-item">Notification</a>
                </div>
        </section>
        <div class="table_page">
            <section id="favorite_sp">
                <div class="favorite_card">
                    <div class="sp_avtar">
                        <img src="./assets/images/cap.png" class="img-fluid cap" />
                    </div>
                    <b><p class="name">Sandip Patel</p></b>
                    <div class="rating">
                        <img src="./assets/images/star1.png" class="img-fluid" />
                        <img src="./assets/images/star1.png" class="img-fluid" />
                        <img src="./assets/images/star1.png" class="img-fluid" />
                        <img src="./assets/images/star1.png" class="img-fluid" />
                        <img src="./assets/images/star2.png" class="img-fluid" />
                        <span>4</span>
                    </div>
                    <p class="total_cleaning">6 Cleanings</p>
                    <button class="btn favorite_btn">Favorite</button>
                    <button class="btn block_btn">Block</button>
                </div>
            </section>
        </div>
    </div>
    <?php 
        require_once('footer2.php');
    ?>
<script src="./assets/js/helperland.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
crossorigin="anonymous"></script>
</body>

</html>
<?php
  }
  ?>