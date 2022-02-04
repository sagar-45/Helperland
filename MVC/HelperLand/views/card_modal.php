<div class="modal fade" id="login" tabindex="-1" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
        <form method="POST" action="<?= $base_url.'?controller=Home&&function=login' ?>">
          <div class="modal-header">
            <h4>Login to your account</h4>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-labelledby="close"></button>
          </div>
          <div class="alert alert-danger alert-dismissible fade show login_alert" role="alert">
            <?php echo $_SESSION['error']; ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert" data-label="Close"></button>
          </div>
          <div class="modal-body">
            <div class="email-input">
              <input type="email" name="email" class="email_input" placeholder="Email" onblur="outsideemail()">
              <i class="bi bi-person-fill"></i>
            </div>
            <div class="email_error errors">
              <span></span> 
            </div>
            <div class="password-input">
              <input type="password" name="password" class="password_input" placeholder="Password" onblur="outsidepassword()">
              <i class="bi bi-lock-fill"></i>
            </div>
            <div class="password_error errors">
              <span></span> 
            </div>
            <input type="checkbox">  Remember me<br>
            <button class="btn login-modal" onclick="login_module()">Login</button>
            <div class="forgot">
              <a class="link forgot_btn" data-bs-toggle="modal" data-bs-target="#forgot_password" data-bs-dismiss="modal">Forgot password?</a><br>
              <span>Don't have an account?<a class="link" href="<?= $base_url.'?controller=Home&&function=Customer_signUp' ?>"> Create an account</a></span>
            </div>
          </div>
        </form>
        </div>
      </div>
    </div>
    <div class="modal fade" id="forgot_password" tabindex="-1" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <form method="POST" action="<?= $base_url.'?controller=Home&&function=forgotPassword' ?>">
                <div class="modal-header">
                    <h4>Forgot Password</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-labelledby="close"></button>
                </div>
                <div class="alert alert-danger alert-dismissible fade show forgot_alert" role="alert">
                    <?php echo $_SESSION['forgot_password_error'] ?>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" data-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div>
                    <input class="link forgot_email_input" name='email' type="email" placeholder="Email Address"  onblur="forgotemail()">
                    </div>
                    <div class="email_error1 errors">
                    <span></span> 
                    </div>
                    <button class="btn login-modal">Send</button>
                    <div class="forgot">
                    <a data-bs-dismiss="modal" data-bs-toggle="modal" data-bs-target="#login">Login now</a>
                    </div>
                </div>
            </form>
        </div>
      </div>
    </div>
    <button type="button" class="btn logout" data-bs-toggle="modal" data-bs-target="#logout">Logout</button>
    <div class="modal fade" id="logout" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <span class="true"><img src="./assets/images/correct-white-medium.png" />
                <p>Logout Successful</p></span>
                <button type="button" class="btn logout_btn" data-bs-dismiss="modal">OK</button>
            </div>
        </div>
    </div>
    <button type="button" class="btn forgot_suceess" data-bs-toggle="modal" data-bs-target="#forgot_link"></button>
    <div class="modal fade" id="forgot_link" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <span class="true"><img src="./assets/images/correct-white-medium.png" />
                <p>Forgot Password Link is send on you email id</p></span>
                <button type="button" class="btn logout_btn" data-bs-dismiss="modal">OK</button>
            </div>
        </div>
    </div>
