<style>
  .navbar{
    padding:0rem 0rem
  }
  .brand-link{
    padding:0.4rem 0.4rem
  }
  .user-panel img{
    width:1.5rem
  }
  .main-sidebar, .main-sidebar::before{
    width:207px
    
  }
  .layout-fixed .brand-link{
    width:207px
  }
  body:not(.sidebar-mini-md):not(.sidebar-mini-xs):not(.layout-top-nav) .content-wrapper, body:not(.sidebar-mini-md):not(.sidebar-mini-xs):not(.layout-top-nav) .main-footer, body:not(.sidebar-mini-md):not(.sidebar-mini-xs):not(.layout-top-nav) .main-header{
    margin-left:209px
  }

  </style>

<ul class="navbar-nav">
  <li class="nav-item">
    <a class="nav-link ftimage" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
  </li>
  <?= $this->element('header/menu') ?>
</ul>

<div class="navbar" style="margin-left: 0vw;margin-top:0.3vw;font-size:30px">
<h4>Dashboard</h4>
  <!-- <b>
    <img src="<?= $this->Url->build('/') ?>img/rect_logo.png" alt="vekpro" style="width: 8vw;">
  </b> -->
  <!-- </span> - &nbsp; <b>Vendor Customer Procurement</b> -->
</div>

<ul class="navbar-nav ml-auto">
  <li class="nav-item">
    <!-- <a class="nav-link" data-widget="fullscreen" href="#" role="button">
      <i class="fas fa-expand-arrows-alt"></i>
    </a> -->
  </li>
  <li>
    <div class="user-panel d-flex">
      <div class="image">
        <img src="<?= $this->Url->build('/') ?>img/not.png" class="img-circle elevation-2" alt="User Image" style="box-shadow:none !important;">
      </div>

      <div class="user-panel d-flex">
      <div class="image">
        <img src="<?= $this->Url->build('/') ?>img/profile.png" class="img-circle elevation-2" alt="User Image" style="box-shadow:none !important;margin-right:15px">
      </div>
      
      <div style="font-size: small; color: darkcyan; padding: 0vw .5vw; display:none;">
        <b><?=$full_name?></b>
      </div>
    </div>
  </li>
</ul>