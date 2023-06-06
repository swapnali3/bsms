<li class="nav-item">
  <?= $this->Html->link(__('<i class="fas fa-tachometer-alt nav-icon"></i><p>Dashboard</p>'), ['controller' => 'dashboard', 'action' => 'index'], ['class' => "nav-link", 'escape' => false]) ?>
</li>

<li class="nav-item has-treeview">
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
</li>

<li class="nav-item">
  <?= $this->Html->link(__('<i class="fas fa-tachometer-alt nav-icon"></i><p>User Role Management</p>'), ['controller' => 'UsersAcl', 'action' => 'index'], ['class' => "nav-link", 'escape' => false]) ?>
</li>

<li class="nav-item">
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
        <!-- <i class="fa fa-bars nav-icon"></i> -->
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
            <!-- <i class="fa fa-bars nav-icon"></i> -->
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
        <!-- <i class="fa fa-bars nav-icon"></i> -->
        <i class="fa fa-solid fa-list nav-icon"></i>
        <p>Purchase Orders</p>
      </a>
    </li>
    <li class="nav-item ">
      <a href="<?= $this->Url->build('/') ?>buyer/vendor-temps" class="nav-link">
        <!-- <i class="fa fa-bars nav-icon"></i> -->
        <i class="fa fa-solid fa-list nav-icon"></i>
        <p>Intransit ASN</p>
      </a>
    </li>
    <li class="nav-item ">
      <a href="<?= $this->Url->build('/') ?>buyer/vendor-temps" class="nav-link">
        <!-- <i class="fa fa-bars nav-icon"></i> -->
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
</li>

<li class="nav-item">
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
</li>