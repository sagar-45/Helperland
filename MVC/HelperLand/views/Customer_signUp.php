<!DOCTYPE html>
<html>

<head>
  <title>Helperland</title>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <link rel="stylesheet" type="text/css" href="./assets/css/header2.css" />
  <link rel="stylesheet" type="text/css" href="./assets/css/Customer_signUp.css" />
  <link rel="stylesheet" type="text/css" href="./assets/css/footer2.css" />
  <link rel="stylesheet" type="text/css" href="./assets/css/media.css" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css" />
  <script>
    function login_set() {
      sessionStorage.afterPages = 2;
    }
  </script>
</head>

<body id="Customer_signUp">
  <div class="preloader"></div>
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
      <div class="personal-detail">
        <div class="name">
          <div>
            <input type="text" name="fname" class="cfname" placeholder="First name" onblur="validate_value(this.value,'error1','first name')" />
            <div class="errors error1">
              <span></span>
            </div>
          </div>
          <div>
            <input type="text" name="lname" class="clname" placeholder="Last name" onblur="validate_value(this.value,'error2','last name')" />
            <div class="errors error2">
              <span></span>
            </div>
          </div>
        </div>
        <div class="n_e">
          <div>
            <input type="email" name="email-add" class="cemail" placeholder="Email address" onblur="validate_value(this.value,'error3','email id')" />
            <div class="errors error3">
              <span></span>
            </div>
          </div>
          <div>
            <div class="input-group mobile flex-nowrap">
              <span class="input-group-text" id="addon-wrapping">+49</span>
              <input type="text" name="mbno" class="cnumber" placeholder="Mobile number" onkeypress="isNumber(event)" onblur="validate_mobile(this.value,'error4','mobile number')" />
            </div>
            <div class="errors error4">
              <span></span>
            </div>
          </div>
        </div>
        <div class="password">
          <div>
            <input type="password" name="password" class="cpassword" placeholder="Password" onblur="passwordValidate(this.value,'error5')" />
            <div class="errors error5">
              <span></span>
            </div>
          </div>
          <div>
            <input type="password" name="C_password" class="ccpassword" placeholder="Confirm Password" onblur="confirmPassword_validate(this.value,'error6')" />
            <div class="errors error6">
              <span></span>
            </div>
          </div>
        </div>
      </div>
      <input type="checkbox" id="check">
      <label for="check">I have read the <span class="privacy">privacy policy.</span></label><br />
      <div class="reg">
        <button class="btn register_btn" onclick="customerSignup()">Register</button>
      </div>
      <p>Already registered? <a class="login" href="<?= $base_url . '?controller=Home&&function=index' ?>"> Login now</a></p>
    </div>
  </section>
  <!-- create account section end -->
  <?php
  include('footer2.php');
  ?>
  <script src="./assets/js/helperland.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>

</html>
