<?php
    require_once('header4.php');
?>
</section>
<div class="welcome">
    <p>Welcome,<b><?php echo $_SESSION['UserName'] ?></b></p>
  </div>
  <div class="hr-line"></div>
<?php
    require_once('sp_list.php');
    ?>
    <section id="filter" class="table_page">
        <span>Service area</span>
        <select class="km_select">
            <option>2 km</option>
            <option>5 km</option>
            <option>10 km</option>
            <option>20 km</option>
            <option>25 km</option>
            <option>50 km</option>
        </select>
        <input type="checkbox" id="pet">
        <label for="pet">Include Pet at Home</label>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">
                        Service ID<img src="./assets/images/cross.png" class="img-fluid" />
                      </th>
                      <th scope="col">
                        Service date
                      </th>
                      <th scope="col">
                        Customer details
                      </th>
                      <th scope="col">
                        Payment
                      </th>
                      <th scope="col">
                        Time conflict
                      </th>
                      <th scope="col">
                        Actions
                    </th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>8488</td>
                    <td>
                        <img src="./assets/images/calendar.png" class="img-fluid calendar" /><b>07/10/2021</b><br />
                        <img src="./assets/images/clock.png" class="img-fluid clock" />08:00 -
                        11:00
                    </td>
                    <td>
                        <span class="name">Gaurang Patel</span><br />
                        <div class="mydiv">
                            <img src="./assets/images/home.png" class="img-fluid home" />
                            <div class="desc">Koenigstrasse 122 99897 Tambach-Dietharz</div>
                        </div>
                    </td>
                    <td>
                        56.25 €
                    </td>
                    <td></td>
                    <td>
                        <button class="btn accept">Accept</button>
                    </td>
                </tr>
            </tbody>
        </table>
    <?php
    require_once('sp_pagination.php');
    ?>
    <div class="mobile-view mobile-card">
    <div class="service_name">
        <b>New Service Requests</b>
    </div>
    <div class="time_select">
        <span>Service area</span>
        <select class="km_select">
            <option>2 km</option>
            <option>5 km</option>
            <option>10 km</option>
            <option>20 km</option>
            <option>25 km</option>
            <option>50 km</option>
        </select><br>
        <input type="checkbox" id="pet">
        <label for="pet">Include Pet at Home</label>
    </div>
    <div class="card">
        <div class="card-body">
          <span>8488</span>
          <hr />
          <div class="card_image">
            <img src="./assets/images/calendar.png" class="img-fluid calendar" /><b>09/04/2018</b><br />
            <img src="./assets/images/clock.png" class="img-fluid clock" /><b>12:00 - 18:00</b>
          </div>
          <hr />
          <div>
            <span class="card_name"><b>David Bough</b></span><br />
            <div class="mydiv">
              <img src="./assets/images/home.png" class="img-fluid home" />
              <div class="desc">Musterstrabe 5,12345 Bonn</div>
            </div>
          </div>
          <hr />
          <span>56.25 €</span>
          <hr />
          <span></span>
          <hr />
          <span><button class="btn">Accept</button></span>
        </div>
    </div>
    <?php
    require_once('sp_mobile_pagination.php');
    require_once("footer2.php");
?>
  <script src="./assets/js/helperland.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
    crossorigin="anonymous"></script>
</body>

</html>