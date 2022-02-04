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
    <form method="POST" action='<?=$base_url."?controller=Home&&function=setPassword"?>'>
        <div class="newpassword">
            <span>New Password</span><br>
            <input type="text" name='new_password' class="cpassword" placeholder="Password" onblur="validate_cpassword()">
            <div class="errors error5">
                <span></span>
            </div>
        </div>
        <div class="confirmpassword">
            <span>Confirm Password</span><br>
            <input type="text" name='confirm_password' class="ccpassword" placeholder="Confirm Password" onblur="validate_ccpassword()"/>
            <div class="errors error6">
              <span></span>
            </div>
        </div>
        <button type="submit" class="btn save">Save</button>
    </form>
</div> 
<?php
    require_once('footer2.php');
?>
<script src="./assets/js/helperland.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>

</html>