<style>
  /* .layout-fixed .brand-link {
    width: 218px
  } */

  .brand-link {
    padding: 0.5rem 0.5rem
  }

  /* body:not(.sidebar-mini-md):not(.sidebar-mini-xs):not(.layout-top-nav) .content-wrapper,
  body:not(.sidebar-mini-md):not(.sidebar-mini-xs):not(.layout-top-nav) .main-footer,
  body:not(.sidebar-mini-md):not(.sidebar-mini-xs):not(.layout-top-nav) .main-header {
    margin-left: 210px
  }

  .sidebar-mini .main-sidebar .nav-link,
  .sidebar-mini-md .main-sidebar .nav-link,
  .sidebar-mini-xs .main-sidebar .nav-link {
    width: calc(235px - 1.1rem * 2)
  } */

  .nav-sidebar .nav-link>.right,
  .nav-sidebar .nav-link>p>.right {
    top: 0.9rem
  }

  .main-sidebar,
  .main-sidebar::before {
    width: 220px
  }
  .layout-fixed .brand-link {
    width: 220px !important;
  }

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

<div class="user-panel pb-3 d-flex side_label" style="align-self: center;" >
</div>

<!-- <li class="nav-item menu_dashboard">
  <a class="nav-link active">
    <i class="fas fa-tachometer-alt nav-icon"></i>
    <p>Dashboard</p>
  </a>
</li>

<li class="nav-item menu_license">
  <a class="nav-link">
    <i class="fas fa-tachometer-alt nav-icon"></i>
    <p>License</p>
  </a>
</li> -->

<li class="nav-item has-treeview">
  <a href="#" class="nav-link">
    <i class="fas fa-users-cog"></i>
    <p>
      User Administration
      <i class="right fas fa-angle-left"></i>
    </p>
  </a>
  <ul class="nav nav-treeview">
    <li class="nav-item">
      <a class="nav-link prd_user_view" >
        <i class="nav-icon fas fa-user-alt"></i>
        <p>Users</p>
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link prd_user_add">
        <i class="nav-icon fas fa-user-tie"></i>
        <p>Buyer Creation</p>
      </a>
    </li>
    <!-- <li class="nav-item">
      <a class="nav-link">
        <i class="nav-icon fas fa-id-badge"></i>
        <p>User License</p>
      </a>
    </li> -->
  </ul>
</li>

<!-- <li class="nav-item menu_license hide">
  <a class="nav-link">
    <i class="fas fa-tachometer-alt nav-icon"></i>
    <p>Role Management</p>
  </a>
</li>

<li class="nav-item prd_menu_setting hide">
  <a class="nav-link">
    <i class="fas fa-tools nav-icon"></i>
    <p>Setting</p>
  </a>
</li>

<li class="nav-item prd_menu_setting hide">
  <a class="nav-link">
    <i class="fas fa-toggle-on nav-icon"></i>
    <p>Activation</p>
  </a>
</li>

<li class="nav-item prd_menu_setting hide">
  <a class="nav-link">
    <i class="fas fa-toggle-on nav-icon"></i>
    <p>Deactivation</p>
  </a>
</li>

<li class="nav-item prd_menu_setting hide">
  <a class="nav-link">
    <i class="fas fa-shapes nav-icon"></i>
    <p>Publish</p>
  </a>
</li>

<li class="nav-item dev_menu_setting hide">
  <a class="nav-link">
    <i class="fas fa-tools nav-icon"></i>
    <p>Setting</p>
  </a>
</li>

<li class="nav-item dev_menu_setting hide">
  <a class="nav-link">
    <i class="fas fa-toggle-on nav-icon"></i>
    <p>Activation</p>
  </a>
</li>

<li class="nav-item dev_menu_setting hide">
  <a class="nav-link">
    <i class="fas fa-toggle-on nav-icon"></i>
    <p>Deactivation</p>
  </a>
</li>

<li class="nav-item dev_menu_setting hide">
  <a class="nav-link">
    <i class="fas fa-shapes nav-icon"></i>
    <p>Publish</p>
  </a>
</li> -->