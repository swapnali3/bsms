<?php
/**
 * @var \App\View\AppView $this
 */
?>

<div class="login-box">
  <!-- /.login-logo -->
  <div class="card">
    <div class="card-body login-card-body">
      <p class="login-box-msg">Sign in to start your session</p>

      <div class="mb-3">
        <button type="button" class="btn btn-primary " id="mobile_btn"><i class="fas fa-mobile"></i>Login with Mobile</button>
        <button type="button" class="btn btn-info" id="email_btn"><i class="fas fa-envelope"></i>Login with Email</button>
      </div>

      <?= $this->Flash->render('auth') ?>
      
      <div id="email_login">
        <?= $this->Form->create() ?>
        <?= $this->Form->control('logged_by', ['type' => 'hidden', 'value' => 'email', 'id' => 'loginby']); ?>
        <div class="input-group mb-3">
          <input type="text" class="form-control" name="username" placeholder="username">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" class="form-control" name="password" placeholder="Password">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="row">
          <!-- /.col -->
          <div class="col-4">
          <?= $this->Form->button(__('Sign In'), ['class' => 'btn btn-primary btn-block']); ?>
          </div>
          <!-- /.col -->
        </div>
        <?= $this->Form->end() ?>
      </div>
        

        <div class="row" id="mobile_login" style="display:none;">
        <?= $this->Form->create() ?>
            <div class="input-group mb-3">
            <input type="text"  name="code" value="+91" maxlength="3" readonly style="width:50px;"> 
            <input type="tel" class="form-control" name="mobile" id="mobile" placeholder="Mobile" maxlength="10" pattern="[0-9]{10}">
              <div class="input-group-append">
                <div class="input-group-text">
                  <span class="fas fa-mobile"></span>
                </div>
              </div>
            </div>
            <span style="text-color:red;" id="otp_error"></span>
            <div class="row">
          <!-- /.col -->
          <div class="col-4">
          <?= $this->Form->button(__('Get OTP'), ['type' => 'button', 'class' => 'btn btn-primary btn-block', 'id' => 'getotp']); ?>
          </div>
          <!-- /.col -->
        </div>
        <?= $this->Form->end() ?>
          </div>


          <div class="row" id="mobile_login_otp" style="display:none;">
        <?= $this->Form->create() ?>
        <?= $this->Form->control('mobile', ['type' => 'hidden', 'id' => 'user_mobile']); ?>
        <?= $this->Form->control('logged_by', ['type' => 'hidden', 'value' => 'mobile', 'id' => 'loginby']); ?>
            <div class="input-group mb-3">
            <input type="tel" class="form-control" name="otp" id="otp" placeholder="OTP" maxlength="6" pattern="[0-9]{6}">
            <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-password"></span>
            </div>
          </div>
            </div>
            <span style="text-color:red;" id="otp_error"></span>
            <div class="row">
          <!-- /.col -->
          <div class="col-4">
          <?= $this->Form->button(__('Sign in'), ['class' => 'btn btn-primary btn-block']); ?>
          </div>
          <!-- /.col -->
        </div>
        <?= $this->Form->end() ?>
          </div>

      <!-- <p class="mb-1">
        <a href="forgot-password.html">I forgot my password</a>
      </p> -->
    </div>
    <!-- /.login-card-body -->
  </div>
</div>
<!-- /.login-box -->

<script>
    $(document).ready(function(){
        $("#mobile_btn").click(function(){
            $('#email_login').hide();
            $('#mobile_login').show();
            $("#mobile_login_otp").hide();
            $('#loginby').val('mobile');
            
        });
        $("#email_btn").click(function(){
            $('#email_login').show();
            $('#mobile_login').hide();
            $("#mobile_login_otp").hide();
            $('#loginby').val('email');
        });

        $("#getotp").click(function(){
          var request = $.ajax({
            url: "get-otp",
            method: "POST",
            headers : {'X-CSRF-Token': $('[name="_csrfToken"]').val()},
            data: { mobile : $("#mobile").val() },
            dataType: "json"
          });
          
          request.done(function( response ) {
            if(response.status == 'success') {
                $("#mobile_login_otp").show();
                $("#mobile_login").hide();
                $("#user_mobile").val($("#mobile").val());
            } else {
                $("#otp_error").html(response.message);
            }
          });
          
          request.fail(function( jqXHR, textStatus ) {
              console.log( "Request failed: " + textStatus );
          });
        });
    });
</script>
