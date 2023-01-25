<!-- Add icons to the links using the .nav-icon class
     with font-awesome or any other icon font library -->

     <?php $polickActive = ($controller == 'PurchaseOrders') ? 'active' : ''; ?>
     <?php $dashactive = ($controller == 'Dashboard') ? 'active' : ''; ?>
     <?php $intrasactive = ($controller == 'DeliveryDetails') ? 'active' : ''; ?>
     <?php $settingactive = ($controller == 'Settings') ? 'active' : ''; ?>
     <?php $temvenactive = ($controller == 'VendorTemps') ? 'active' : ''; ?>
     <?php $tempindctive = ($controller == 'VendorTemps' && $action == 'index') ? 'active' : ''; ?>
     <?php $createvendactive = ($controller == 'VendorTemps' && $action == 'add') ? 'active' : ''; ?>
     <?php $creatsaevendactive = ($controller == 'VendorTemps' && $action == 'sap-add') ? 'active' : ''; ?>
     
     <?php $rfqactive = ($controller == 'RfqDetails') ? 'active' : ''; ?>
     

     <li class="nav-item menu-open">
  <?= $this->Html->link(__('<i class="far fa-tachometer-alt nav-icon"></i><p>Dashboard</p>'), ['controller' => 'dashboard', 'action' => 'index'], ['class' => "nav-link $dashactive", 'escape' => false]) ?>
</li>

<li class="nav-item menu-is-opening menu-open">
  <a href="#" class="nav-link <?=$temvenactive?>">
    <i class="nav-icon fas fa-user-alt"></i>
    <p>
      Vendor Management
      <i class="right fas fa-angle-left"></i>
    </p>
  </a>
  <ul class="nav nav-treeview">
    <li class="nav-item"><?= $this->Html->link(__('<i class="far fa-circle nav-icon"></i><p>Vendor List</p>'), ['controller' => 'vendor-temps', 'action' => 'index'], ['class' => "nav-link $tempindctive", 'escape' => false]) ?></li>
    <li class="nav-item menu-is-opening menu-open">
  <a href="#" class="nav-link <?=$createvendactive?>">
    <i class="nav-icon fas fa-user-alt"></i>
    <p>
      Vendor Creation
      <i class="right fas fa-angle-left"></i>
    </p>
  </a>
  <ul class="nav nav-treeview">
  <li class="nav-item"><?= $this->Html->link(__('<i class="far fa-circle nav-icon"></i><p>New Vendor</p>'), ['controller' => 'vendor-temps', 'action' => 'add'], ['class' => "nav-link $createvendactive", 'escape' => false]) ?></li>
  <li class="nav-item"><?= $this->Html->link(__('<i class="far fa-circle nav-icon"></i><p>SAP Vendor</p>'), ['controller' => 'vendor-temps', 'action' => 'sap-add'], ['class' => "nav-link $creatsaevendactive", 'escape' => false]) ?></li>
  </ul>
</li>
  </ul>
</li>

  

<!-- <li class="nav-item menu-open">
<?= $this->Html->link(__('<i class="far fa-question-circle  nav-icon"></i><p>RFQs</p>'), ['controller' => 'rfq-details', 'action' => 'index'], ['class' => "nav-link $rfqactive", 'escape' => false]) ?>
</li> -->

<li class="nav-item menu-open">
  <?= $this->Html->link(__('<i class="fa fa-shopping-cart nav-icon"></i><p>Purchase Orders</p>'), ['controller' => 'purchase-orders', 'action' => 'index'], ['class' => "nav-link $polickActive", 'escape' => false]) ?>
</li>

<li class="nav-item menu-open">
  <?= $this->Html->link(__('<i class="fas fa-truck nav-icon"></i><p>Intransit</p>'), ['controller' => 'delivery-details', 'action' => 'index'], ['class' => "nav-link $intrasactive", 'escape' => false]) ?>
</li>

<li class="nav-item menu-open">
  <?= $this->Html->link(__('<i class="far fa-cog nav-icon"></i><p>Settings</p>'), ['controller' => 'settings', 'action' => 'update'], ['class' => "nav-link $settingactive", 'escape' => false]) ?>
</li>

<li class="nav-item menu-open">
  <?= $this->Html->link(__('<i class="fas fa-power-off nav-icon"></i><p>Logout</p>'), ['prefix' => false, 'controller' => 'users', 'action' => 'logout'], ['class' => 'nav-link', 'escape' => false]) ?>
</li>
