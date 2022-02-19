  <section id="service-page">
    <section id="header">
        <?php
        require_once('header1.php');
        require_once('navbar_mobile_view.php');
        ?>
    </section>
    <?php
      require_once("Email_exist_modal.php");
    ?>
    <section id="reg_form">
      <form>
        <div class="reg_title">Register Now!</div>
        <input type="text" name="fname" class="cfname" placeholder="First name" onclick="register_btn_enble()" onblur="validate_fname()" />
        <div class="errors error1">
          <span></span>
        </div>
        <input type="text" name="lname" class="clname" placeholder="Last name" onclick="register_btn_enble()" onblur="validate_lname()" />
        <div class="errors error2">
          <span></span>
        </div>
        <input type="email" name="email-add" class="cemail" placeholder="Email address" onclick="register_btn_enble()" onblur="validate_cemail()" />
        <div class="errors error3">
          <span></span>
        </div>
        <div class="input-group flex-nowrap">
          <span class="input-group-text" id="addon-wrapping">+49</span>
          <input type="number" name="mbno" class="cnumber" placeholder="Mobile number" onclick="register_btn_enble()" onblur="validate_cnumber()" />
        </div>
        <div class="errors error4">
          <span></span>
        </div>
        <input type="password" name="password" class="cpassword" placeholder="Password" onclick="register_btn_enble()" onblur="validate_cpassword()" />
        <div class="errors error5">
          <span></span>
        </div>
        <input type="password" name="con-pass" class="ccpassword" placeholder="Confirm Password" onclick="register_btn_enble()" onblur="validate_ccpassword()" />
        <div class="errors error6">
          <span></span>
        </div>
        <div class="form-check">
          <input class="form-check-input" type="checkbox" value="" id="flexCheck" />
          <label class="form-check-label" for="flexCheck">
            Send me newsletters from Helperland
          </label>
        </div>
        <div class="form-check">
          <input class="form-check-input" type="checkbox" value="" id="flexCheck2" />
          <label class="form-check-label" for="flexCheck2">
            I accept <span class="blue_text">terms and conditions</span> &
            <span class="blue_text">privacy policy</span>
          </label>
        </div>
        <img src="./assets/images/not_robot.png" class="img-fluid" alt="" />
        <button class="btn get_started register_btn" type="button" onclick="spSignup()">
          <span>Get Started</span>
          <img src="./assets/images/arrow-white.png" class="img-fluid" alt="" />
        </button>
      </form>
      <img src="./assets/images/com-down.png" class="img-fluid com-down" alt="" />
    </section>
  </section>
  <!-- how it work section start -->
  <section class="sec_rect">
  <section id="how_work">
    <div class="work_title">How it works</div>
    <div class="card-1">
      <img src="./assets/images/service_card-1.png" class="img-fluid" alt="" />
      <div class="card_text">
        <div class="cardhead">Register yourself</div>
        <div class="carddesc">
          Provide your basic information to register yourself as a service
          provider.
        </div>
        <div class="read-more">
          <span>Read more</span>
          <img src="./assets/images/arrow-black.png" class="img-fluid" alt="" />
        </div>
      </div>
    </div>
    <div class="card-2">
      <img src="./assets/images/service_card-2.png" class="img-fluid" alt="" />
      <div class="card_text">
        <div class="cardhead">Get service requests</div>
        <div class="carddesc">
          You will get service requests from customes depend on service area
          and profile.
        </div>
        <div class="read-more">
          <span>Read more</span>
          <img src="./assets/images/arrow-black.png" class="img-fluid" alt="" />
        </div>
      </div>
    </div>
    <div class="card-3">
      <img src="./assets/images/service_card-3.png" class="img-fluid" alt="" />
      <div class="card_text">
        <div class="cardhead">Complete service</div>
        <div class="carddesc">
          Accept service requests from your customers and complete your work.
        </div>
        <div class="read-more">
          <span>Read more</span>
          <img src="./assets/images/arrow-black.png" class="img-fluid" alt="" />
        </div>
      </div>
    </div>
  </section>
  <!-- how it work section end -->
  <?php
    include("news_letter.php");
  ?>
  </section>
  <?php
  include('footer2.php');
  ?>
  <script src="./assets/js/helperland.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>

</html>