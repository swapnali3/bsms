<style>
  .layout-fixed .brand-link {
    width: 218px
  }

  .brand-link {
    padding: 0.5rem 0.5rem
  }

  body:not(.sidebar-mini-md):not(.sidebar-mini-xs):not(.layout-top-nav) .content-wrapper,
  body:not(.sidebar-mini-md):not(.sidebar-mini-xs):not(.layout-top-nav) .main-footer,
  body:not(.sidebar-mini-md):not(.sidebar-mini-xs):not(.layout-top-nav) .main-header {
    margin-left: 210px
  }

  .sidebar-mini .main-sidebar .nav-link,
  .sidebar-mini-md .main-sidebar .nav-link,
  .sidebar-mini-xs .main-sidebar .nav-link {
    width: calc(235px - 1.1rem * 2)
  }

  .nav-sidebar .nav-link>.right,
  .nav-sidebar .nav-link>p>.right {
    top: 0.9rem
  }

  .main-sidebar,
  .main-sidebar::before {
    width: 218px
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
  .nav-item a.nav-link {
    cursor: pointer;
}
</style>

<div class="user-panel pb-3 d-flex side_label" style="align-self: center;" >
</div>

<li class="nav-item menu_dashboard">
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
</li>

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
        <p>Admin/Buyer Creation</p>
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link">
        <i class="nav-icon fas fa-id-badge"></i>
        <p>User License</p>
      </a>
    </li>
  </ul>
</li>

<li class="nav-item menu_license hide">
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
</li>





<!-- <li class="nav-item">
  <?= $this->Html->link(__('<i class="fas fa-tachometer-alt nav-icon"></i><p>Dashboardsss</p>'), ['controller' => 'dashboard', 'action' => 'index'], ['class' => "nav-link", 'escape' => false]) ?>
</li> -->

<!-- <li class="nav-item has-treeview">
  <a href="#" class="nav-link active">
    <i class="nav-icon fas fa-user-alt"></i>
    <p>
      User Management
      <i class="right fas fa-angle-left"></i>
    </p>
  </a>
  <ul class="nav nav-treeview">
    <li class="nav-item"><?= $this->Html->link(__('<i class="far fa-circle nav-icon"></i><p>SAP Users</p>'), ['controller' => 'admin-users', 'action' => 'index', 'sap'], ['class' => 'nav-link', 'escape' => false]) ?></li>
    <li class="nav-item"><?= $this->Html->link(__('<i class="far fa-circle nav-icon"></i><p>Portal Users</p>'), ['controller' => 'admin-users', 'action' => 'index', 'portal'], ['class' => 'nav-link', 'escape' => false]) ?></li>
    <li class="nav-item"><?= $this->Html->link(__('<i class="far fa-circle nav-icon"></i><p>Role</p>'), '#', ['class' => 'nav-link', 'escape' => false]) ?></li>
    <li class="nav-item"><?= $this->Html->link(__('<i class="far fa-circle nav-icon"></i><p>Profile</p>'), '#', ['class' => 'nav-link', 'escape' => false]) ?></li>
    <li class="nav-item"><?= $this->Html->link(__('<i class="far fa-circle nav-icon"></i><p>Users</p>'), '#', ['class' => 'nav-link', 'escape' => false]) ?></li>
  </ul>
</li> -->

<!-- <li class="nav-item">
  <?= $this->Html->link(__('<i class="fas fa-tachometer-alt nav-icon"></i><p>User Role Management</p>'), ['controller' => 'UsersAcl', 'action' => 'index'], ['class' => "nav-link", 'escape' => false]) ?>
</li> -->

<!-- <li class="nav-item">
  <a href="#" class="nav-link">
    <i class="nav-icon fas fa-user-alt"></i>
    <p>
      Vendor
      <i class="right fas fa-angle-left"></i>
    </p>
  </a>
  <ul class="nav nav-treeview">
    <li class="nav-item ">
      <a href="<?= $this->Url->build('/') ?>buyer/vendor-temps" class="nav-link">
        <i class="fa fa-solid fa-list nav-icon"></i>
        <p>vendor List</p>
      </a>
    </li>
    <li class="nav-item">
      <a href="#" class="nav-link">
        <i class="nav-icon fas fa-user-alt"></i>
        <p>
          Vendor Creation
          <i class="right fas fa-angle-down"></i>
        </p>
      </a>
      <ul class="nav nav-treeview">
        <li class="nav-item"><a href="<?= $this->Url->build('/') ?>buyervendor-temps/add" class="nav-link">
            <i class="fa fa-solid fa-plus nav-icon"></i>
            <p>New Vendor</p>
          </a></li>
        <li class="nav-item"><a href="<?= $this->Url->build('/') ?>buyervendor-temps/sap-add" class="nav-link">
            <i class="fa fa-solid fa-plus nav-icon"></i>
            <p>SAP Vendor</p>
          </a></li>
      </ul>
    </li>
    <li class="nav-item ">
      <a href="<?= $this->Url->build('/') ?>buyer/vendor-temps" class="nav-link">
        <i class="fa fa-solid fa-list nav-icon"></i>
        <p>Purchase Orders</p>
      </a>
    </li>
    <li class="nav-item ">
      <a href="<?= $this->Url->build('/') ?>buyer/vendor-temps" class="nav-link">
        <i class="fa fa-solid fa-list nav-icon"></i>
        <p>Intransit ASN</p>
      </a>
    </li>
    <li class="nav-item ">
      <a href="<?= $this->Url->build('/') ?>buyer/vendor-temps" class="nav-link">
        <i class="fa fa-solid fa-list nav-icon"></i>
        <p>Gate Entry</p>
      </a>
    </li>
    <li class="nav-item">
      <?= $this->Html->link(__('<i class="fa fa-cog nav-icon"></i><p>Settings</p>'), ['controller' => 'settings', 'action' => 'update'], ['class' => "nav-link", 'escape' => false]) ?>

      <ul class="nav nav-treeview">
        <li class="nav-item ">
          <?= $this->Html->link(__('<i class="fa fa-solid fa-list nav-icon"></i><p>Buyer Management</p>'), ['controller' => '/settings', 'action' => 'buyer-management'], ['class' => "nav-link", 'escape' => false]) ?>
        </li>

        <li class="nav-item ">
          <?= $this->Html->link(__('<i class="fa fa-solid fa-list nav-icon"></i><p>Vendor Management</p>'), ['controller' => '/settings', 'action' => 'vendor-management'], ['class' => "nav-link ", 'escape' => false]) ?>
        </li>
      </ul>
    </li>

  </ul>
</li> -->

<!-- <li class="nav-item">
  <a href="#" class="nav-link">
    <i class="nav-icon fas fa-user-alt"></i>
    <p>
      Buyer Management
      <i class="right fas fa-angle-left"></i>
    </p>
  </a>
  <ul class="nav nav-treeview">

    <li class="nav-item">
      <?= $this->Html->link(__('<i class="fa fa-shopping-cart nav-icon"></i><p>Purchase Orders</p>'), ['controller' => 'purchase-orders', 'action' => 'index'], ['class' => "nav-link", 'escape' => false]) ?>
    </li>

    <li class="nav-item">
      <?= $this->Html->link(__('<i class="fas fa-plus nav-icon"></i><p>Create ASN</p>'), ['controller' => 'purchase-orders', 'action' => 'create-asn'], ['class' => "nav-link ", 'escape' => false]) ?>
    </li>

    <li class="nav-item ">
      <?= $this->Html->link(__('<i class="fas fa-list nav-icon"></i><p>ASN List</p>'), ['controller' => 'asn', 'action' => 'index'], ['class' => "nav-link", 'escape' => false]) ?>
    </li>

    <li class="nav-item ">
      <?= $this->Html->link(__('<i class="fas fa-pen-square nav-icon"></i><p>RFQs</p>'), ['controller' => 'rfqs', 'action' => 'index'], ['class' => "nav-link ", 'escape' => false]) ?>
    </li>

    <li class="nav-item ">
      <?= $this->Html->link(__('<i class="fas fa-box-open nav-icon"></i><p>Material Stocks</p>'), ['controller' => 'vendor-material-stocks', 'action' => 'index'], ['class' => "nav-link", 'escape' => false]) ?>
    </li>

    <li class="nav-item ">
      <?= $this->Html->link(__('<i class="fas fa-truck nav-icon"></i><p>Intransit</p>'), ['controller' => 'delivery-details', 'action' => 'index'], ['class' => "nav-link ", 'escape' => false]) ?>
    </li>
  </ul>
</li> -->

<!-- <li class="nav-item menu-open">
  <?= $this->Html->link(__('<i class="fas fa-cog nav-icon"></i><p>Settings</p>'), ['controller' => 'settings', 'action' => 'update'], ['class' => 'nav-link', 'escape' => false]) ?>
</li> -->