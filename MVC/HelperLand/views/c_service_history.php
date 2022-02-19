<?php
    require_once('header3.php');
?>
</section>
<div class="welcome">
    <p>Welcome,<b><?php echo $_SESSION['UserName'] ?></b></p>
  </div>
  <div class="hr"></div>
<?php
    require_once('c_list_page.php');
  ?>
  <div class="table_page">
      <div class="service_head">
        <span class="service_txt">Service History</span>
        <button class="btn export">Export</button>
      </div>
      <section id="service_history">
        <table class="table">
          <thead>
            <tr>
              <th scope="col">
                Service Details<img src="./assets/images/cross.png" class="img-fluid" />
              </th>
              <th scope="col">
                Service Provider<img src="./assets/images/cross.png" class="img-fluid" />
              </th>
              <th scope="col">
                Payment<img src="./assets/images/cross.png" class="img-fluid" />
              </th>
              <th scope="col">
                Status<img src="./assets/images/cross.png" class="img-fluid" />
              </th>
              <th scope="col">
                Rate SP<img src="./assets/images/cross.png" class="img-fluid" />
              </th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>
                <div class="date">
                  <img src="./assets/images/calendar_black.png" class="img-fluid" />
                  <span>31/03/2018 </span>
                </div>
                <span>12:00 - 18:00</span>
              </td>
              <td>
                <div class="rating">
                  <img src="./assets/images/cap.png" class="img-fluid cap" />
                  <div class="star">
                    <p>Lyum Watson</p>
                    <img src="./assets/images/star1.png" class="img-fluid" />
                    <img src="./assets/images/star1.png" class="img-fluid" />
                    <img src="./assets/images/star1.png" class="img-fluid" />
                    <img src="./assets/images/star1.png" class="img-fluid" />
                    <img src="./assets/images/star2.png" class="img-fluid" />
                    <span>4</span>
                  </div>
                </div>
              </td>
              <td>
                <div class="rupee">
                  <span class="uro">€</span><strong class="rs">63</strong>
                </div>
              </td>
              <td>
                <div class="status-c">
                  <p class="text">Completed</p>
                </div>
              </td>
              <td>
                <button class="btn">Rate SP</button>
              </td>
            </tr>
          </tbody>
        </table>
      </section>
    <?php
    require_once('c_pagination.php');
    ?>
    <div class="mobile-view mobile-card">
    <div class="card_name">
      <b>Services History</b>
    </div>
<div class="card">
      <div class="card-body">
        <div class="date">
          <img src="./assets/images/calendar_black.png" class="img-fluid" />
          <span>01/01/2018 </span>
        </div>
        <span>12:00 - 18:00</span>
        <hr />
        <div class="rating">
          <img src="./assets/images/cap.png" class="img-fluid cap" />
          <div class="star">
            <p>Lyum Watson</p>
            <img src="./assets/images/star1.png" class="img-fluid" />
            <img src="./assets/images/star1.png" class="img-fluid" />
            <img src="./assets/images/star1.png" class="img-fluid" />
            <img src="./assets/images/star1.png" class="img-fluid" />
            <img src="./assets/images/star2.png" class="img-fluid" />
            <span>4</span>
          </div>
        </div>
        <hr />
        <div class="rupee">
          <span class="uro">€</span><strong class="rs">63</strong>
        </div>
        <hr />
        <div class="status-d">
          <p class="text">Cancelled</p>
        </div>
        <hr />
        <button class="btn">Rate SP</button>
      </div>
    </div>
    <?php
    require_once('c_mobile_pagination.php');
    require_once('footer2.php')
?>
  <script src="./assets/js/helperland.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
    crossorigin="anonymous"></script>
</body>

</html>