<ul class="navbar-nav">
  <li class="nav-item">
    <a class="nav-link ftimage" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
  </li>
  <?= $this->element('header/menu') ?>
</ul>

<div class="navbar" style="margin-left: 25vw;">
  <b>
    <img src="<?= $this->Url->build('/') ?>img/rect_logo.png" alt="vekpro" style="width: 8vw;">
  </b>
  </span> - &nbsp; <b>Vendor Customer Procurement</b>
</div>

<ul class="navbar-nav ml-auto">
  <li class="nav-item">
    <a class="nav-link" data-widget="fullscreen" href="#" role="button">
      <i class="fas fa-expand-arrows-alt"></i>
    </a>
  </li>
  <li>
    <div class="user-panel d-flex">
      <div class="image">
        <img src="<?= $this->Url->build('/') ?>img/<?=$group_name?>.png" class="img-circle elevation-2" alt="User Image">
      </div>
      <div style="font-size: x-large; color: darkcyan; padding: 0vw .5vw;">
        <b><?=$full_name?></b>
      </div>
    </div>
  </li>
</ul>