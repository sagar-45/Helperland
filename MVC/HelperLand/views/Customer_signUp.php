<?php
    include('header2.php');
    include('header1_mobileView.php');
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
    <div class="contact-form">
        <form action="">
          <div class="personal-detail">
            <input type="text" name="fname" placeholder="First name" />
            <input type="text" name="lname" placeholder="Last name" />
            <br />
            <div class="n_e">
              <input type="email" name="email-add" placeholder="Email address" />
              <div class="input-group mobile flex-nowrap">
                <span class="input-group-text" id="addon-wrapping">+49</span>
                <input type="number" name="mbno" placeholder="Mobile number" />
              </div>
            </div>
            <br/>
            <input type="password" name="password" placeholder="Password" />
            <input type="password" name="C_password" placeholder="Confirm Password" />
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
<script src="./assets/js/helperland.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
    crossorigin="anonymous"></script>
</body>

</html>