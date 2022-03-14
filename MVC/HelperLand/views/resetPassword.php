<!DOCTYPE html>
<html>

<head>
  <title>Helperland</title>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <link rel="stylesheet" type="text/css" href="./assets/css/header2.css" />
  <link rel="stylesheet" type="text/css" href="./assets/css/resetPassword.css" />
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

<body id="resetPassword" onload="check_link_is_available('<?php echo $_GET['token'] == null ? '0' : $_GET['token'] ?>')">
  <div class="preloader"></div>
  <?php
  require_once('header2.php');
  require_once("navbar_mobile_view.php")
  ?>
  </section>
  <div class="title">
    Reset Password
  </div>
  <div class="star">
    <div class="line1"></div>
    <img src="./assets/images/star.png" class="img-fluid" alt="" />
    <div class="line2"></div>
  </div>
  <div class="reset_password">
    <div class="newpassword">
      <span>New Password</span><br>
      <input type="hidden" name="token" value="<?php echo $_GET['token'] ?>" />
      <input type="text" name='new_password' class="cpassword" placeholder="Password" onblur="passwordValidate(this.value,'error5')">
      <div class="errors error5">
        <span></span>
      </div>
    </div>
    <div class="confirmpassword">
      <span>Confirm Password</span><br>
      <input type="text" name='confirm_password' class="ccpassword" placeholder="Confirm Password" onblur="confirmPassword_validate(this.value,'error6')" />
      <div class="errors error6">
        <span></span>
      </div>
    </div>
    <button type="submit" class="btn save" onclick=" reset_password('<?php echo $_GET['token'] ?>')">Save</button>
  </div>
  <?php
  require_once('footer2.php');
  ?>
  <script src="./assets/js/helperland.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</body>

</html>
