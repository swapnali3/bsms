<?php
/**
 * @var \App\View\AppView $this
 */
?>
  <?= $this->Html->css('cstyle.css') ?>
  <?= $this->Html->css('table.css') ?>
  <?= $this->Html->css('listing.css') ?>
  <?= $this->Html->css('b_index.css') ?>
<div class="login-box">
  <!-- /.login-logo -->
  <div class="card">
    <div class="card-body login-card-body">
      <p class="login-box-msg">Sign in to start your session</p>

      <div class="mb-6">
      <button type="button" class="btn btn-primary btn-block"><ion-icon name="call"></ion-icon> Mobile</button>
      <button type="button" class="btn btn-info btn-block btn-flat"><ion-icon name="mail"></ion-icon> Email</button>
      </div>

      <?= $this->Flash->render('auth') ?>
      <?= $this->Form->create() ?>
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

      <!-- <p class="mb-1">
        <a href="forgot-password.html">I forgot my password</a>
      </p> -->
    </div>
    <!-- /.login-card-body -->
  </div>
</div>
<!-- /.login-box -->


