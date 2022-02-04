<?php
    include('header2.php');
    require_once('navbar_mobile_view.php');
?>
</section>
<!-- create account section start -->
  <section id="create">
    <div class="title">Create an account</div>
    <div class="star">
      <div class="line1"></div>
      <img src="./assets/images/star.png" class="img-fluid" alt="" />
      <div class="line2"></div>
    </div>
    <?php
      require_once("Email_exist_modal.php");
    ?>
    <div class="contact-form">
        <form action="<?= $base_url.'?controller=Home&&function=customerSignup'?>" method="POST">
          <div class="personal-detail">
            <div class="name">
              <div>
                <input type="text" name="fname" class="cfname" placeholder="First name" onblur="validate_fname()"/>
                <div class="errors error1">
                  <span></span>
                </div>
              </div>
              <div>
                <input type="text" name="lname" class="clname" placeholder="Last name" onblur="validate_lname()"/>
                <div class="errors error2">
                  <span></span>
                </div>
              </div>
            </div>
            <div class="n_e">
              <div>
                <input type="email" name="email-add" class="cemail" placeholder="Email address" onblur="validate_cemail()"/>
                <div class="errors error3">
                  <span></span>
                </div>
              </div>
              <div>
                <div class="input-group mobile flex-nowrap">
                  <span class="input-group-text" id="addon-wrapping">+49</span>
                  <input type="number" name="mbno" class="cnumber" placeholder="Mobile number" onblur="validate_cnumber()"/>
                </div>
                <div class="errors error4">
                  <span></span>
                </div>
              </div>
            </div>
            <div class="password">
              <div>
                <input type="password" name="password" class="cpassword" placeholder="Password" onblur="validate_cpassword()"/>
                <div class="errors error5">
                  <span></span>
                </div>
              </div>
              <div>
                <input type="password" name="C_password" class="ccpassword" placeholder="Confirm Password" onblur="validate_ccpassword()"/>
                <div class="errors error6">
                  <span></span>
                </div>
              </div>
            </div>
          </div>
          <input type="checkbox" id="check">
          <label for="check">I have read the <span class="privacy">privacy policy.</span></label><br/>
          <div class="reg">
            <button class="btn">Register</button>
          </div>
          <p>Already registered? <a class="login" href="<?= $base_url.'?controller=Home&&function=index' ?>"> Login now</a></p>
        </form>
    </div>
  </section>
<!-- create account section end -->
<?php
  include('footer2.php');
?>
<script>
  window.onload=function(){
    <?php
      if(isset($_SESSION['email_exist']))
      {
    ?>
        document.querySelector(".email_exist").click();
    <?php
      unset($_SESSION['email_exist']);
      }
    ?>
  }
</script>
<script src="./assets/js/helperland.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
    crossorigin="anonymous"></script>
</body>

</html>