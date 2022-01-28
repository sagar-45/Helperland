<?php
  include('header1.php');
?>
    <div class="modal fade" id="login" tabindex="-1" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
          <div class="modal-header">
            <h4>Login to your account</h4>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-labelledby="close"></button>
          </div>
          <div class="modal-body">
            <div class="email-input">
              <input type="email" placeholder="Email">
              <i class="bi bi-person-fill"></i>
            </div>
            <div class="password-input">
              <input type="password" placeholder="Password">
              <i class="bi bi-lock-fill"></i>
            </div>
            <input type="checkbox">  Remember me<br>
            <button class="btn login-modal">Login</button>
            <div class="forgot">
              <a class="link" data-bs-toggle="modal" data-bs-target="#forgot_password" data-bs-dismiss="modal">Forgot password?</a><br>
              <span>Don't have an account?<a class="link" href="<?= $base_url.'?controller=Home&&function=Customer_signUp' ?>"> Create an account</a></span>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="modal fade" id="forgot_password" tabindex="-1" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
          <div class="modal-header">
            <h4>Forgot Password</h4>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-labelledby="close"></button>
          </div>
          <div class="modal-body">
            <div>
              <input class="link" type="email" placeholder="Email Address">
            </div>
            <button class="btn login-modal">Send</button>
            <div class="forgot">
              <a data-bs-dismiss="modal" data-bs-toggle="modal" data-bs-target="#login">Login now</a>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="text">
      <div class="main-text">Lorem ipsum text</div>
      <div class="text_desc">
        <img src="./assets/images/true.png" class="img-fluid" alt="" />
        <span>Lorem ipsum dolor sit amet, consectetur adipiscing</span>
      </div>
      <div class="text_desc">
        <img src="./assets/images/true.png" class="img-fluid" alt="" />
        <span>Lorem ipsum dolor sit amet, consectetur adipiscing</span>
      </div>
      <div class="text_desc">
        <img src="./assets/images/true.png" class="img-fluid" alt="" />
        <span>Lorem ipsum dolor sit amet, consectetur adipiscing</span>
      </div>
    </div>
    <button class="btn"><a href="book_service.html">Let’s Book a Cleaner</a></button>
    <div class="step">
      <div class="step-1">
        <img src="./assets/images/1-img.png" class="img-fluid" />
        <p>Enter your postcode</p>
      </div>
      <img src="./assets/images/step-arrow-1.png" alt="" class="img-fluid step-arrow" />
      <div class="step-1">
        <img src="./assets/images/2-img.png" class="img-fluid" />
        <p>Select your plan</p>
      </div>
      <img src="./assets/images/step-arrow-2.png" alt="" class="img-fluid step-arrow" />
      <div class="step-1">
        <img src="./assets/images/3-img.png" class="img-fluid" />
        <p>Pay securely online</p>
      </div>
      <img src="./assets/images/step-arrow-1.png" alt="" class="img-fluid step-arrow" />
      <div class="step-1">
        <img src="./assets/images/4-img.png" class="img-fluid" />
        <p>Enjoy amazing service</p>
      </div>
    </div>
    <img src="./assets/images/com-down.png" class="com-down" alt="" />
  </section>
  <!-- home section end -->
  <!-- card section start -->
  <section id="why-helperland">
    <p class="title">Why Helperland</p>
    <div class="cards">
      <div class="card-1">
        <img src="./assets/images/group-21.png" alt="" class="img-fluid" />
        <div class="card_head">Experience & Vetted Professionals</div>
        <div class="card_desc">
          dominate the industry in scale and scope with an adaptable,
          extensive network that consistently delivers exceptional results.
        </div>
      </div>
      <div class="card-1">
        <img src="./assets/images/group-23.png" alt="" class="img-fluid" />
        <div class="card_head">Secure Online Payment</div>
        <div class="card_desc">
          Payment is processed securely online. Customers pay safely online
          and manage the booking.
        </div>
      </div>
      <div class="card-1">
        <img src="./assets/images/group-24.png" alt="" class="img-fluid" />
        <div class="card_head">Dedicated Customer Service</div>
        <div class="card_desc">
          to our customers and are guided in all we do by their needs. The
          team is always happy to support you and offer all the information.
        </div>
      </div>
    </div>
  </section>
  <!-- card section end -->
  <div class="sec_rect">
    <!-- three image section start -->
    <section id="img-section">
      <img src="./assets/images/group-36.png" alt="" class="img-fluid" />
      <div class="img-text">
        <div class="section_head">
          Lorem ipsum dolor sit amet, consectetur
        </div>
        <div class="section_desc">
          <p>
            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec
            nisi sapien, sus cipit ut accumsan vitae, pulvinar ac libero.
          </p>
          <p>
            Aliquam erat volutpat. Nullam quis ex odio. Nam bibendum cursus
            purus, vel efficitur urna finibus vitae. Nullam finibus aliquet
            pharetra. Morbi in sem dolor. Integer pretium hendrerit ante quis
            vehicula.
          </p>
          <p>Mauris consequat ornare enim, sed lobortis quam ultrices sed.</p>
        </div>
      </div>
    </section>
    <!-- three image section end -->
    <!-- our blog section start-->
    <section id="our_blog">
      <p class="title">Our Blog</p>
      <div class="cards">
        <div class="card-1">
          <img src="./assets/images/group-28.png" class="img=fluid card_img" alt="" />
          <div class="card_head">Lorem ipsum dolor sit amet</div>
          <span class="date">January 28, 2019</span>
          <div class="card_desc">
            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed
            fermentum metus pulvinar aliquet.
          </div>
          <button class="btn read_more">
            Read the Post<img src="./assets/images/arrow-black.png" />
          </button>
        </div>
        <div class="card-1">
          <img src="./assets/images/group-29.png" class="img=fluid card_img" alt="" />
          <div class="card_head">Lorem ipsum dolor sit amet</div>
          <span class="date">January 28, 2019</span>
          <div class="card_desc">
            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed
            fermentum metus pulvinar aliquet.
          </div>
          <button class="btn read_more">
            Read the Post<img src="./assets/images/arrow-black.png" />
          </button>
        </div>
        <div class="card-1">
          <img src="./assets/images/group-30.png" class="img=fluid card_img" alt="" />
          <div class="card_head">Lorem ipsum dolor sit amet</div>
          <span class="date">January 28, 2019</span>
          <div class="card_desc">
            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed
            fermentum metus pulvinar aliquet.
          </div>
          <button class="btn read_more">
            Read the Post<img src="./assets/images/arrow-black.png" />
          </button>
        </div>
      </div>
    </section>
    <!-- our blog section end -->
  </div>
  <!-- customer say section start -->
  <section id="customer_say">
    <p class="title">What Our Customers Say</p>
    <div class="cards">
      <div class="card-1">
        <img src="./assets/images/message.png" class="img_fuid message" alt="" />
        <div class="customer_details">
          <img src="./assets/images/group-31.png" class="img-fluid" alt="" />
          <div class="c_name">
            <span>Lary Watson</span><br />
            <span>Manchester</span>
          </div>
        </div>
        <div class="customer_response">
          <p>
            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed
            fermentum metus pulvinar aliquet consequat. Praesent nec malesuada
            nibh.
          </p>
          <p>
            Nullam et metus congue, auctor augue sit amet, consectetur tortor.
          </p>
        </div>
        <button class="btn read_more">
          Read the Post<img src="./assets/images/arrow-black.png" />
        </button>
      </div>
      <div class="card-1">
        <img src="./assets/images/message.png" class="img_fuid message" alt="" />
        <div class="customer_details">
          <img src="./assets/images/group-32.png" class="img-fluid" alt="" />
          <div class="c_name">
            <span>John Smith</span><br />
            <span>Manchester</span>
          </div>
        </div>
        <div class="customer_response">
          <p>
            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed
            fermentum metus pulvinar aliquet consequat. Praesent nec malesuada
            nibh.
          </p>
          <p>
            Nullam et metus congue, auctor augue sit amet, consectetur tortor.
          </p>
        </div>
        <button class="btn read_more">
          Read the Post<img src="./assets/images/arrow-black.png" />
        </button>
      </div>
      <div class="card-1">
        <img src="./assets/images/message.png" class="img_fuid message" alt="" />
        <div class="customer_details">
          <img src="./assets/images/group-33.png" class="img-fluid" alt="" />
          <div class="c_name">
            <span>Lars Johnson</span><br />
            <span>Manchester</span>
          </div>
        </div>
        <div class="customer_response">
          <p>
            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed
            fermentum metus pulvinar aliquet consequat. Praesent nec malesuada
            nibh.
          </p>
          <p>
            Nullam et metus congue, auctor augue sit amet, consectetur tortor.
          </p>
        </div>
        <button class="btn read_more">
          Read the Post<img src="./assets/images/arrow-black.png" />
        </button>
      </div>
    </div>
    <!--Newsletter section start-->
    <section id="news-letter">
      <div class="container-fluid">
        <div class="news-letter-title">GET OUR NEWSLETTER</div>
        <div class="email-get">
          <input type="text" placeholder="Your Email" class="news-email" />
          <div class="news-button">
            <span class="button-text">submit</span>
          </div>
        </div>
      </div>
      <div class="img">
        <img src="./assets/images/layer-598.png" class="img-fluid" alt="" />
      </div>
    </section>
    <!--Newsletter section end-->
  </section>
  <!-- customer say section end -->
  <a href="#header" class="up-arrow">
    <img src="./assets/images/up-arrow.png" class="img-fluid" alt="" />
  </a>
  <!--footer section start-->
  <section class="footer">
    <div class="container-fluid footer_wrapper">
      <div class="row justify-content-between align-items-center footer_bar">
        <div class="col-md-1 footer_logo">
          <a href="<?= $base_url.'?controller=Home&&function=index'?>"><img src="./assets/images/white-logo-transparent-background.png" class="img-fluid" alt="" /></a>
        </div>
        <div class="col-md-8 footer_menu">
          <ul>
            <li class="item">
              <a class="link" href="<?= $base_url.'?controller=Home&&function=index'?>">HOME</a>
            </li>
            <li class="item">
              <a class="link" href="<?= $base_url.'?controller=Home&&function=about'?>">ABOUT</a>
            </li>
            <li class="item">
              <a class="link" href="#">TESTIMONIAL</a>
            </li>
            <li class="item">
              <a class="link" href="<?= $base_url.'?controller=Home&&function=faq'?>">FAQS</a>
            </li>
            <li class="item">
              <a class="link" href="#">INSURANCE POLICY</a>
            </li>
            <li class="item">
              <a class="link" href="#">IMPRESSUM</a>
            </li>
          </ul>
        </div>
        <div class="col-md-1 social">
          <img src="./assets/images/facebook.png" alt="" />
          <img src="./assets/images/instagram.png" alt="" />
        </div>
      </div>
    </div>
    <div class="container-fluid copyright_wrapper">
      <div class="row copyright">
        <p>
          Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut feugiat
          nunc libero, ac malesuada ligula aliquam ac.
          <span class="privacypolicy"> Privacy Policy </span><button class="ok_btn btn">OK!</button>
        </p>
      </div>
    </div>
  </section>
  <!-- footer section end-->
  <script src="./assets/js/helperland.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
    crossorigin="anonymous"></script>
</body>

</html>