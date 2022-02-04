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
<!--search section start-->
<section id="search">
  <img src="./assets/images/group-16.png" class="img-fluid" alt="" />
</section>
<!--search section end-->
<!-- faq section start-->
<section id="faq">
  <div class="title">FAQs</div>
  <div class="star">
    <div class="line1"></div>
    <img src="./assets/images/star.png" class="img-fluid" alt="" />
    <div class="line2"></div>
  </div>
  <div class="text">
    Whether you are Customer or Service provider,We have tried our best to
    solve all your queries and questions.
  </div>
  <ul class="nav nav-tabs" id="myTab">
    <li class="nav-item">
      <a href="#accordionId" class="nav-link text-customer active" data-bs-toggle="tab">FOR CUSTOMER</a>
    </li>
    <li class="nav-item">
      <a href="#accordionId2" class="nav-link text-provider" data-bs-toggle="tab">FOR SERVICE PROVIDER</a>
    </li>
  </ul>
  <div class="tab-content" style="display: flex; justify-content:center;">
    <div class="tab-pane accordion fade show active" id="accordionId">
      <div>
        <div class="heading" id="headingOne">
          <span class="head_title" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
            Lorem ipsum dolor sit amet, consectetur adipiscing elit.
            Vestibulum nisl nunc, iaculis mattis tellus ac ut non imperdiet
            velit?
          </span>
        </div>
        <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionId">
          <div class="accordion-body">
            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed id
            diam tincidunt, fringilla ante vitae, dapibus velit. Vivamus id
            tortor rhoncus, efficitur quam at, suscipit tortor. Integer
            fermentum convallis eros vel semper. Ut non imperdiet velit.
            Praesent eu dui vel lacus porta eleifend eget quis dui. Integer
            tempus massa in gravida tincidunt. Fusce in libero tristique,
            euismod nisi vel, luctus urna. Interdum et malesuada fames ac ante
            ipsum primis in faucibus. Donec et placerat arcu. Suspendisse
            lacinia tristique massa. Etiam risus justo, scelerisque id arcu
            eu, sodales tempor eros. Aliquam efficitur pretium urna, sit amet
            congue risus malesuada rutrum. Donec id massa vel velit
            ullamcorper accumsan ut eget nisl. Fusce viverra commodo lacus,
            sit amet facilisis leo luctus dictum.
          </div>
        </div>
      </div>
      <div>
        <div class="heading" id="headingTwo">
          <span class="head_title collapsed" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
            Lorem ipsum dolor sit amet, consectetur adipiscing elit.
            Vestibulum nisl nunc, iaculis mattis tellus ac ut non imperdiet
            velit?
          </span>
        </div>
        <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionId">
          <div class="accordion-body">
            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed id
            diam tincidunt, fringilla ante vitae, dapibus velit. Vivamus id
            tortor rhoncus, efficitur quam at, suscipit tortor. Integer
            fermentum convallis eros vel semper. Ut non imperdiet velit.
            Praesent eu dui vel lacus porta eleifend eget quis dui. Integer
            tempus massa in gravida tincidunt. Fusce in libero tristique,
            euismod nisi vel, luctus urna. Interdum et malesuada fames ac ante
            ipsum primis in faucibus. Donec et placerat arcu. Suspendisse
            lacinia tristique massa. Etiam risus justo, scelerisque id arcu
            eu, sodales tempor eros. Aliquam efficitur pretium urna, sit amet
            congue risus malesuada rutrum. Donec id massa vel velit
            ullamcorper accumsan ut eget nisl. Fusce viverra commodo lacus,
            sit amet facilisis leo luctus dictum.
          </div>
        </div>
      </div>
      <div>
        <div class="heading" id="headingThree">
          <span class="head_title collapsed" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
            Lorem ipsum dolor sit amet, consectetur adipiscing elit.
            Vestibulum nisl nunc, iaculis mattis tellus ac ut non imperdiet
            velit?
          </span>
        </div>
        <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionId">
          <div class="accordion-body">
            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed id
            diam tincidunt, fringilla ante vitae, dapibus velit. Vivamus id
            tortor rhoncus, efficitur quam at, suscipit tortor. Integer
            fermentum convallis eros vel semper. Ut non imperdiet velit.
            Praesent eu dui vel lacus porta eleifend eget quis dui. Integer
            tempus massa in gravida tincidunt. Fusce in libero tristique,
            euismod nisi vel, luctus urna. Interdum et malesuada fames ac ante
            ipsum primis in faucibus. Donec et placerat arcu. Suspendisse
            lacinia tristique massa. Etiam risus justo, scelerisque id arcu
            eu, sodales tempor eros. Aliquam efficitur pretium urna, sit amet
            congue risus malesuada rutrum. Donec id massa vel velit
            ullamcorper accumsan ut eget nisl. Fusce viverra commodo lacus,
            sit amet facilisis leo luctus dictum.
          </div>
        </div>
      </div>
      <div>
        <div class="heading" id="headingFour">
          <span class="head_title collapsed" data-bs-toggle="collapse" data-bs-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
            Lorem ipsum dolor sit amet, consectetur adipiscing elit.
            Vestibulum nisl nunc, iaculis mattis tellus ac ut non imperdiet
            velit?
          </span>
        </div>
        <div id="collapseFour" class="accordion-collapse collapse" aria-labelledby="headingFour" data-bs-parent="#accordionId">
          <div class="accordion-body">
            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed id
            diam tincidunt, fringilla ante vitae, dapibus velit. Vivamus id
            tortor rhoncus, efficitur quam at, suscipit tortor. Integer
            fermentum convallis eros vel semper. Ut non imperdiet velit.
            Praesent eu dui vel lacus porta eleifend eget quis dui. Integer
            tempus massa in gravida tincidunt. Fusce in libero tristique,
            euismod nisi vel, luctus urna. Interdum et malesuada fames ac ante
            ipsum primis in faucibus. Donec et placerat arcu. Suspendisse
            lacinia tristique massa. Etiam risus justo, scelerisque id arcu
            eu, sodales tempor eros. Aliquam efficitur pretium urna, sit amet
            congue risus malesuada rutrum. Donec id massa vel velit
            ullamcorper accumsan ut eget nisl. Fusce viverra commodo lacus,
            sit amet facilisis leo luctus dictum.
          </div>
        </div>
      </div>
      <div>
        <div class="heading" id="headingFive">
          <span class="head_title collapsed" data-bs-toggle="collapse" data-bs-target="#collapseFive" aria-expanded="false" aria-controls="collapseFive">
            Lorem ipsum dolor sit amet, consectetur adipiscing elit.
            Vestibulum nisl nunc, iaculis mattis tellus ac ut non imperdiet
            velit?
          </span>
        </div>
        <div id="collapseFive" class="accordion-collapse collapse" aria-labelledby="headingFive" data-bs-parent="#accordionId">
          <div class="accordion-body">
            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed id
            diam tincidunt, fringilla ante vitae, dapibus velit. Vivamus id
            tortor rhoncus, efficitur quam at, suscipit tortor. Integer
            fermentum convallis eros vel semper. Ut non imperdiet velit.
            Praesent eu dui vel lacus porta eleifend eget quis dui. Integer
            tempus massa in gravida tincidunt. Fusce in libero tristique,
            euismod nisi vel, luctus urna. Interdum et malesuada fames ac ante
            ipsum primis in faucibus. Donec et placerat arcu. Suspendisse
            lacinia tristique massa. Etiam risus justo, scelerisque id arcu
            eu, sodales tempor eros. Aliquam efficitur pretium urna, sit amet
            congue risus malesuada rutrum. Donec id massa vel velit
            ullamcorper accumsan ut eget nisl. Fusce viverra commodo lacus,
            sit amet facilisis leo luctus dictum.
          </div>
        </div>
      </div>
      <div>
        <div class="heading" id="headingSix">
          <span class="head_title collapsed" data-bs-toggle="collapse" data-bs-target="#collapseSix" aria-expanded="false" aria-controls="collapseSix">
            Lorem ipsum dolor sit amet, consectetur adipiscing elit.
            Vestibulum nisl nunc, iaculis mattis tellus ac ut non imperdiet
            velit?
          </span>
        </div>
        <div id="collapseSix" class="accordion-collapse collapse" aria-labelledby="headingSix" data-bs-parent="#accordionId">
          <div class="accordion-body">
            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed id
            diam tincidunt, fringilla ante vitae, dapibus velit. Vivamus id
            tortor rhoncus, efficitur quam at, suscipit tortor. Integer
            fermentum convallis eros vel semper. Ut non imperdiet velit.
            Praesent eu dui vel lacus porta eleifend eget quis dui. Integer
            tempus massa in gravida tincidunt. Fusce in libero tristique,
            euismod nisi vel, luctus urna. Interdum et malesuada fames ac ante
            ipsum primis in faucibus. Donec et placerat arcu. Suspendisse
            lacinia tristique massa. Etiam risus justo, scelerisque id arcu
            eu, sodales tempor eros. Aliquam efficitur pretium urna, sit amet
            congue risus malesuada rutrum. Donec id massa vel velit
            ullamcorper accumsan ut eget nisl. Fusce viverra commodo lacus,
            sit amet facilisis leo luctus dictum.
          </div>
        </div>
      </div>
      <div>
        <div class="heading" id="headingSeven">
          <span class="head_title collapsed" data-bs-toggle="collapse" data-bs-target="#collapseSeven" aria-expanded="false" aria-controls="collapseSeven">
            Lorem ipsum dolor sit amet, consectetur adipiscing elit.
            Vestibulum nisl nunc, iaculis mattis tellus ac ut non imperdiet
            velit?
          </span>
        </div>
        <div id="collapseSeven" class="accordion-collapse collapse" aria-labelledby="headingSeven" data-bs-parent="#accordionId">
          <div class="accordion-body">
            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed id
            diam tincidunt, fringilla ante vitae, dapibus velit. Vivamus id
            tortor rhoncus, efficitur quam at, suscipit tortor. Integer
            fermentum convallis eros vel semper. Ut non imperdiet velit.
            Praesent eu dui vel lacus porta eleifend eget quis dui. Integer
            tempus massa in gravida tincidunt. Fusce in libero tristique,
            euismod nisi vel, luctus urna. Interdum et malesuada fames ac ante
            ipsum primis in faucibus. Donec et placerat arcu. Suspendisse
            lacinia tristique massa. Etiam risus justo, scelerisque id arcu
            eu, sodales tempor eros. Aliquam efficitur pretium urna, sit amet
            congue risus malesuada rutrum. Donec id massa vel velit
            ullamcorper accumsan ut eget nisl. Fusce viverra commodo lacus,
            sit amet facilisis leo luctus dictum.
          </div>
        </div>
      </div>
      <div>
        <div class="heading" id="headingEight">
          <span class="head_title collapsed" data-bs-toggle="collapse" data-bs-target="#collapseEight" aria-expanded="false" aria-controls="collapseEight">
            Lorem ipsum dolor sit amet, consectetur adipiscing elit.
            Vestibulum nisl nunc, iaculis mattis tellus ac ut non imperdiet
            velit?
          </span>
        </div>
        <div id="collapseEight" class="accordion-collapse collapse" aria-labelledby="headingEight" data-bs-parent="#accordionId">
          <div class="accordion-body">
            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed id
            diam tincidunt, fringilla ante vitae, dapibus velit. Vivamus id
            tortor rhoncus, efficitur quam at, suscipit tortor. Integer
            fermentum convallis eros vel semper. Ut non imperdiet velit.
            Praesent eu dui vel lacus porta eleifend eget quis dui. Integer
            tempus massa in gravida tincidunt. Fusce in libero tristique,
            euismod nisi vel, luctus urna. Interdum et malesuada fames ac ante
            ipsum primis in faucibus. Donec et placerat arcu. Suspendisse
            lacinia tristique massa. Etiam risus justo, scelerisque id arcu
            eu, sodales tempor eros. Aliquam efficitur pretium urna, sit amet
            congue risus malesuada rutrum. Donec id massa vel velit
            ullamcorper accumsan ut eget nisl. Fusce viverra commodo lacus,
            sit amet facilisis leo luctus dictum.
          </div>
        </div>
      </div>
      <div>
        <div class="heading" id="headingNine">
          <span class="head_title collapsed" data-bs-toggle="collapse" data-bs-target="#collapseNine" aria-expanded="false" aria-controls="collapseNine">
            Lorem ipsum dolor sit amet, consectetur adipiscing elit.
            Vestibulum nisl nunc, iaculis mattis tellus ac ut non imperdiet
            velit?
          </span>
        </div>
        <div id="collapseNine" class="accordion-collapse collapse" aria-labelledby="headingNine" data-bs-parent="#accordionId">
          <div class="accordion-body">
            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed id
            diam tincidunt, fringilla ante vitae, dapibus velit. Vivamus id
            tortor rhoncus, efficitur quam at, suscipit tortor. Integer
            fermentum convallis eros vel semper. Ut non imperdiet velit.
            Praesent eu dui vel lacus porta eleifend eget quis dui. Integer
            tempus massa in gravida tincidunt. Fusce in libero tristique,
            euismod nisi vel, luctus urna. Interdum et malesuada fames ac ante
            ipsum primis in faucibus. Donec et placerat arcu. Suspendisse
            lacinia tristique massa. Etiam risus justo, scelerisque id arcu
            eu, sodales tempor eros. Aliquam efficitur pretium urna, sit amet
            congue risus malesuada rutrum. Donec id massa vel velit
            ullamcorper accumsan ut eget nisl. Fusce viverra commodo lacus,
            sit amet facilisis leo luctus dictum.
          </div>
        </div>
      </div>
    </div>
    <div class="tab-pane fade accordion" id="accordionId2">
      <div>
        <div class="heading" id="headingOne">
          <span class="head_title" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
            Lorem ipsum dolor sit amet, consectetur adipiscing elit.
            Vestibulum nisl nunc, iaculis mattis tellus ac ut non imperdiet
            velit?
          </span>
        </div>
        <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionId">
          <div class="accordion-body">
            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed id
            diam tincidunt, fringilla ante vitae, dapibus velit. Vivamus id
            tortor rhoncus, efficitur quam at, suscipit tortor. Integer
            fermentum convallis eros vel semper. Ut non imperdiet velit.
            Praesent eu dui vel lacus porta eleifend eget quis dui. Integer
            tempus massa in gravida tincidunt. Fusce in libero tristique,
            euismod nisi vel, luctus urna. Interdum et malesuada fames ac ante
            ipsum primis in faucibus. Donec et placerat arcu. Suspendisse
            lacinia tristique massa. Etiam risus justo, scelerisque id arcu
            eu, sodales tempor eros. Aliquam efficitur pretium urna, sit amet
            congue risus malesuada rutrum. Donec id massa vel velit
            ullamcorper accumsan ut eget nisl. Fusce viverra commodo lacus,
            sit amet facilisis leo luctus dictum.
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- faq section end-->
<!-- news-letter section start-->
<?php
include('news_letter.php');
include('footer2.php');
?>
<script src="./assets/js/helperland.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>

</html>