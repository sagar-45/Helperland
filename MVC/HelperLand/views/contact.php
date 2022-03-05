<!DOCTYPE html>
<html>

<head>
  <title>Helperland</title>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <?php
    if(isset($_SESSION['UserTypeId']) && $_SESSION['UserTypeId']==1)
    {
        echo '<link rel="stylesheet" type="text/css" href="./assets/css/header3.css" />'; 
    }
    elseif(isset($_SESSION['UserTypeId']) && $_SESSION['UserTypeId']==2)
    {
        echo '<link rel="stylesheet" type="text/css" href="./assets/css/header4.css" />';
    }
    else
    {
        echo '<link rel="stylesheet" type="text/css" href="./assets/css/header2.css" />';
    }
  ?>
  <link rel="stylesheet" type="text/css" href="./assets/css/contact.css" />
  <link rel="stylesheet" type="text/css" href="./assets/css/footer2.css" />
  <link rel="stylesheet" type="text/css" href="./assets/css/media.css" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css" />
  <script>
    function login_set()
    {
      sessionStorage.afterPages=2;
    }
  </script>
</head>

<body id="contact">

<?php
  if(isset($_SESSION['UserTypeId']) && $_SESSION['UserTypeId']==1)
  {
      require_once('header3.php');
  }
  elseif(isset($_SESSION['UserTypeId']) && $_SESSION['UserTypeId']==2)
  {
    require_once('header4.php');
  }
  else
  {
    include('header2.php');
    require_once('navbar_mobile_view.php');
  }
?>
</section>
<!-- contact image section start -->
<section id="contact-img">
    <img src="./assets/images/contact-img.png" class="img-fluid" alt="" />
  </section>
  <!-- contact image section end -->
  <!-- contact us section start -->
  <section id="contact-us">
    <div class="title">Contact us</div>
    <div class="star">
      <div class="line1"></div>
      <img src="./assets/images/star.png" class="img-fluid" alt="" />
      <div class="line2"></div>
    </div>
    <div class="contact-method">
      <div class="locations card-contact">
        <div class="location img">
          <img src="./assets/images/location-img.png" class="img-fluid" alt="" />
        </div>
        <div class="address1 text">1111 Lorem ipsum text 100,</div>
        <div class="address2 text">Lorem ipsum AB</div>
      </div>
      <div class="calls card-contact">
        <div class="call img">
          <img src="./assets/images/call-img.png" class="img-fluid" alt="" />
        </div>
        <div class="no1 text">+49 (40) 123 56 7890</div>
        <div class="no2 text">+49 (40) 987 56 0000</div>
      </div>
      <div class="messagess card-contact">
        <div class="message img">
          <img src="./assets/images/message-img.png" class="img-fluid" alt="" />
        </div>
        <div class="id text">info@helperland.com</div>
      </div>
    </div>
  </section>
  <!-- contact us section end -->
  <!-- touch with us section start -->
  <div class="hr"></div>
  <section id="touch">
    <div class="touch-head">Get in touch with us</div>
    <div class="contact-form">
      <form action="<?= $base_url.'?controller=Home&&function=getTouchwithUs'?>" method="POST" enctype="multipart/form-data">
        <div class="personal-detail">
          <input type="text" name="fname" placeholder="First name" />
          <input type="text" name="lname" placeholder="Last name" />
          <br />
          <div class="n_e">
            <div class="input-group mobile flex-nowrap">
              <span class="input-group-text" id="addon-wrapping">+49</span>
              <input type="number" name="mbno" placeholder="Mobile number" />
            </div>
            <input type="email" name="email-add" placeholder="Email address" />
          </div>
        </div>
        <div class="subject">
          <select name="subject">
            <option value="" selected disabled hidden>Subject</option>
            <option value="subject-value">Subject 1</option>
            <option value="subject-value">Subject 2</option>
            <option value="subject-value">Subject 3</option>
            <option value="subject-value">Subject 4</option>
          </select>
        </div>
        <div class="message">
          <textarea name='message' placeholder="Message"></textarea>
        </div>
        <div class="attech">
          Attachment<br/>
          <input name="i1" type="file" id="file">
          <label  for="file">Upload</label>
        </div>
        <div class="privacy">
          <div class="checkinput"><input type="checkbox" id="check"/></div>
          <div class="policies"><label for="check">Our current ones apply <span class="colortext">privacy policy.</span>I hereby agree that my data entered into the contact
          form will be stored electronically and processed and used for the purpose of establishing contact.The
          consent can be withdrawn at any time pursuant to Art.7(3) GDPR by informal notification (eg by e-mail).</label></div>
        </div>
        <input type="submit" class="btn submit" />
      </form>
    </div>
  </section>
  <!-- touch with us section end -->
  <!-- map image section start -->
  <section id="map-img">
    <img src="./assets/images/map-img.png" alt="" class="img-fluid m-img" />
    <img src="./assets/images/pin.png" alt="" class="img-fluid pin" />
  </section>
  <!-- map image section end -->
  <?php
    include('news_letter.php');
    include('footer2.php');
  ?>
  <script src="./assets/js/helperland.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
    crossorigin="anonymous"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</body>

</html>
