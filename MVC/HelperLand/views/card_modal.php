<div class="modal fade" id="login" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h4>Login to your account</h4>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-labelledby="close"></button>
      </div>
      <div class="alert alert-danger alert-dismissible fade show login_alert" role="alert">
      </div>
      <div class="modal-body">
        <div class="email-input">
          <input type="email" name="email" class="email_input" placeholder="Email" onblur="validate_value(this.value,'email_error','email id')">
          <i class="bi bi-person-fill"></i>
        </div>
        <div class="email_error errors">
          <span></span>
        </div>
        <div class="password-input">
          <input type="password" name="password" class="password_input" placeholder="Password" onblur="passwordValidate(this.value,'password_error')">
          <i class="bi bi-lock-fill"></i>
        </div>
        <div class="password_error errors">
          <span></span>
        </div>
        <input type="checkbox"> Remember me<br>
        <button class="btn login-modal" onclick="login_module('email_error','password_error')">Login</button>
        <div class="forgot">
          <a class="link forgot_btn" data-bs-toggle="modal" data-bs-target="#forgot_password" data-bs-dismiss="modal">Forgot password?</a><br>
          <span>Don't have an account?<a class="link" href="<?= $base_url . '?controller=Home&&function=Customer_signUp' ?>"> Create an account</a></span>
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
      <div class="alert alert-danger alert-dismissible fade show forgot_alert" role="alert">
        <button type="button" class="btn-close" data-bs-dismiss="alert" data-label="Close"></button>
      </div>
      <div class="modal-body">
        <div>
          <input class="link forgot_email_input" name='email' type="email" placeholder="Email Address" onblur="validate_value(this.value,'email_error1','email id')">
        </div>
        <div class="email_error1 errors">
          <span></span>
        </div>
        <button class="btn login-modal" onclick="forgot_password('email_error1')">Send</button>
        <div class="forgot">
          <a data-bs-dismiss="modal" data-bs-toggle="modal" data-bs-target="#login">Login now</a>
        </div>
      </div>
    </div>
  </div>
</div>
<button type="button" class="btn logout" data-bs-toggle="modal" data-bs-target="#logout"></button>
<div class="modal fade" id="logout" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <span class="true"><img src="./assets/images/correct-white-medium.png" />
        <p>Logout Successful</p>
      </span>
      <button type="button" class="btn logout_btn" data-bs-dismiss="modal">OK</button>
    </div>
  </div>
</div>
<button type="button" class="btn forgot_suceess" data-bs-toggle="modal" data-bs-target="#forgot_link"></button>
<div class="modal fade" id="forgot_link" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <span class="true"><img src="./assets/images/correct-white-medium.png" />
        <p>Forgot Password Link is send on you email id</p>
      </span>
      <button type="button" class="btn logout_btn" data-bs-dismiss="modal">OK</button>
    </div>
  </div>
</div>
