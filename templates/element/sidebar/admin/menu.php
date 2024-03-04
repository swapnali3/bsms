<style>
  .container,
  .container-fluid,
  .container-lg,
  .container-md,
  .container-sm,
  .container-xl {
    padding-left: 0rem
  }

  /* .layout-fixed .brand-link {
    width: 210px
  } */

  .brand-link {
    padding: 0.5rem 0.5rem
  }

  /* body:not(.sidebar-mini-md):not(.sidebar-mini-xs):not(.layout-top-nav) .content-wrapper,
  body:not(.sidebar-mini-md):not(.sidebar-mini-xs):not(.layout-top-nav) .main-footer,
  body:not(.sidebar-mini-md):not(.sidebar-mini-xs):not(.layout-top-nav) .main-header {
    margin-left: 210px
  } */

  /* .sidebar-mini .main-sidebar .nav-link,
  .sidebar-mini-md .main-sidebar .nav-link,
  .sidebar-mini-xs .main-sidebar .nav-link {
    width: calc(224px - 1.1rem * 2)
  } */

  .nav-sidebar .nav-link>.right,
  .nav-sidebar .nav-link>p>.right {
    top: 0.9rem
  }

  /* .main-sidebar,
  .main-sidebar::before {
    width: 210px
  } */

  p,
  .p {
    font-size: 14px
  }

  .sidebar {
    padding-left: 0.6rem
  }

  .nav-sidebar>.nav-item .nav-icon.fa,
  .nav-sidebar>.nav-item .nav-icon.fab,
  .nav-sidebar>.nav-item .nav-icon.fad,
  .nav-sidebar>.nav-item .nav-icon.fal,
  .nav-sidebar>.nav-item .nav-icon.far,
  .nav-sidebar>.nav-item .nav-icon.fas,
  .nav-sidebar>.nav-item .nav-icon.ion,
  .nav-sidebar>.nav-item .nav-icon.svg-inline--fa {
    font-size: 0.8rem;
  }
</style>

<li class="nav-item">
  <?= $this->Html->link(__('<i class="fas fa-users nav-icon"></i><p>Users</p>'), ['controller' => 'users', 'action' => 'index'], ['class' => "nav-link ", 'escape' => false]) ?>
</li>


<li class="nav-item">
  <?= $this->Html->link(__('<i class="fas fa-user-plus nav-icon"></i><p>Add Buyer</p>'), ['controller' => '/users', 'action' => 'import-buyer'], ['class' => "nav-link po_acknowledge" , 'escape' => false]) ?>
</li>

<li class="nav-item">
  <?= $this->Html->link(__('<i class="fas fa-user-tie nav-icon"></i><p>Add Manager</p>'), ['controller' => '/users', 'action' => 'add-manager'], ['class' => "nav-link po_acknowledge" , 'escape' => false]) ?>
</li>
