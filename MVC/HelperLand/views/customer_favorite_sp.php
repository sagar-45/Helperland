<?php
if (!isset($_SESSION['UserTypeId']) || $_SESSION['UserTypeId'] != 1) {
  header('LOCATION:http://localhost/HelperLand/?controller=Home&&function=index');
} else {
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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/rateYo/2.3.2/jquery.rateyo.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" href="//code.jquery.com/ui/1.13.1/themes/base/jquery-ui.css">
  </head>

  <body id="customer_fav" onload="customer_fav_sp(<?php echo $_SESSION['userId'] ?>)">
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
          <a class="list-group-item" href="<?= $base_url . '?controller=Home&&function=customer_dashboard' ?>">Dashboard</a>
          <a class="list-group-item" href="<?= $base_url . '?controller=Home&&function=customer_service_history' ?>">Service History</a>
          <a class="list-group-item">Service Schedule</a>
          <a class="list-group-item active">Favourite Pros</a>
          <a class="list-group-item">Invoices</a>
          <a class="list-group-item">Notification</a>
        </div>
      </section>
      <div class="table_page">
        <table class="table">
          <thead>
            <th></th>
          </thead>
          <tbody>
            <!-- <tr>
              <td>
                <div class="favorite_card">
                  <img src="./assets/images/avatar-hat.png" />
                  <b><p class="name">Sandip Patel</p></b>
                  <div class="rating">
                    <div class="star">
                      <div class="rateYo readOnly_data"></div>
                      <span class="result">1</span>
                    </div>
                  </div>
                  <p class="total_cleaning">6 Cleanings</p>
                  <button class="btn favorite_btn">Favorite</button>
                  <button class="btn block_btn">Block</button>
                </div>
              </td>
            </tr> -->
          </tbody>
        </table>
      </div>
    </div>
    <?php
    require_once('footer2.php');
    ?>
    <script src="./assets/js/helperland.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/rateYo/2.3.2/jquery.rateyo.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap5.min.js"></script>
    <script src="https://code.jquery.com/ui/1.13.1/jquery-ui.js"></script>
  </body>

  </html>
<?php
}
?>
