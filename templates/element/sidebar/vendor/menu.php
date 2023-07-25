<!-- Add icons to the links using the .nav-icon class
     with font-awesome or any other icon font library -->
<?php $polickActive = ($controller == 'PurchaseOrders' && $action == 'index') ? 'active' : ''; ?>
<?php $createAsnActive = ($controller == 'PurchaseOrders' && $action == 'createAsn' || $action == 'asnMaterials') ? 'active' : ''; ?>
<?php $dashactive = ($controller == 'Dashboard') ? 'active' : ''; ?>
<?php $intrasactive = ($controller == 'DeliveryDetails') ? 'active' : ''; ?>
<?php $profileActive = ($controller == 'VendorTemps') ? 'active' : ''; ?>
<?php $rfqlickActive = ($controller == 'Rfqs') ? 'active' : ''; ?>
<?php $asnActive = ($controller == 'Asn') ? 'active' : '';?>
<?php $stockActive = ($controller == 'VendorMaterialStocks') ? 'active' : '';?>
<?php $materialMaster = ($controller == 'Materials') ? 'active' : ''; ?>
<?php $stocksUpload = ($controller == 'StockUploads') ? 'active' : ''; ?>
<?php $productionLine = ($controller == 'ProductionLines') ? 'active' : ''; ?>
<?php $dailymonitor = ($controller == 'Dailymonitor') ? 'active' : ''; ?>
<?php $dailyStock = ($controller == 'Dailymonitor' && $action == 'index') ? 'active' : ''; ?>
<?php $planner = ($controller == 'Dailymonitor' && $action == 'dailyentry') ? 'active' : ''; ?>
<?php $intransit = ($controller == 'DeliveryDetails') ? 'active' : ''; ?>
<?php $lineMaster = ($controller == 'LineMaters') ? 'active' : ''; ?>



<style>
  .container,
  .container-fluid,
  .container-lg,
  .container-md,
  .container-sm,
  .container-xl {
    padding-left: 0rem
  }

  .layout-fixed .brand-link {
    width: 210px
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
    width: calc(224px - 1.1rem * 2)
  }

  .nav-sidebar .nav-link>.right,
  .nav-sidebar .nav-link>p>.right {
    top: 0.9rem
  }

  .main-sidebar,
  .main-sidebar::before {
    width: 210px
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
<li class="nav-item">
  <?= $this->Html->link(__('<i class="fa fa-tachometer-alt nav-icon"></i><p>Dashboard</p>'), ['controller' => 'dashboard', 'action' => 'index'], ['class' => "nav-link $dashactive", 'escape' => false]) ?>
</li>

<!-- <li class="nav-item">
  <?= $this->Html->link(__('<i class="far fa-user nav-icon"></i><p>Profile</p>'), ['controller' => 'vendor-temps', 'action' => 'view', 0], ['class' => "nav-link  $profileActive", 'escape' => false]) ?>
</li> -->

<li class="nav-item">
  <?= $this->Html->link(__('<i class="fa fa-shopping-cart nav-icon"></i><p>Purchase Orders</p>'), ['controller' => 'purchase-orders', 'action' => 'index'], ['class' => "nav-link po_acknowledge $polickActive" , 'escape' => false]) ?>
</li>

<li class="nav-item">
  <?= $this->Html->link(__('<i class="fas fa-plus nav-icon"></i><p>Create ASN</p>'), ['controller' => '/purchase-orders', 'action' => 'create-asn'], ['class' => "nav-link $createAsnActive" , 'escape' => false]) ?>
</li>

<li class="nav-item ">
  <?= $this->Html->link(__('<i class="fas fa-list nav-icon"></i><p>ASN List</p>'), ['controller' => 'asn', 'action' => 'index'], ['class' => "nav-link $asnActive" , 'escape' => false]) ?>
</li>

<!-- <li class="nav-item ">
  <?= $this->Html->link(__('<i class="fas fa-pen-square nav-icon"></i><p>RFQs</p>'), ['controller' => 'rfqs', 'action' => 'index'], ['class' => "nav-link $rfqlickActive" , 'escape' => false]) ?>
</li> -->

<!-- <li class="nav-item ">
  <?= $this->Html->link(__('<i class="fas fa-box-open nav-icon"></i><p>Material Stocks</p>'), ['controller' => 'vendor-material-stocks', 'action' => 'index'], ['class' => "nav-link $stockActive", 'escape' => false]) ?>
</li> -->

<li class="nav-item">
  <a href="#" class="nav-link">
    <i class="nav-icon fas fa-user-alt"></i>
    <p>
      Vendor Master
      <i class="right fas fa-angle-left"></i>
    </p>
  </a>
  <ul class="nav nav-treeview">
    <li class="nav-item ">
      <?= $this->Html->link(__('<i class="fas fa-boxes nav-icon"></i><p>Material Master</p>'), ['controller' => 'materials', 'action' => 'index'], ['class' => "nav-link $materialMaster", 'escape' => false]) ?>
    </li>
    <li class="nav-item ">
      <?= $this->Html->link(__('<i class="fas fa-industry nav-icon"></i><p>Line Master</p>'), ['controller' => 'line-masters', 'action' => 'index'], ['class' => "nav-link $lineMaster", 'escape' => false]) ?>
    </li>
    <li class="nav-item ">
      <?= $this->Html->link(__('<i class="fas fa-warehouse nav-icon"></i><p>Stocks Upload</p>'), ['controller' => 'stock-uploads', 'action' => 'index'], ['class' => "nav-link $stocksUpload", 'escape' => false]) ?>
    </li>
    <li class="nav-item ">
      <?= $this->Html->link(__('<i class="fas fa-industry nav-icon"></i><p>Production Line</p>'), ['controller' => 'ProductionLines', 'action' => 'index'], ['class' => "nav-link $productionLine", 'escape' => false]) ?>
    </li>
  </ul>
</li>

<li class="nav-item">
  <a href="#" class="nav-link <?= h($dailymonitor) ?>">
    <i class="nav-icon fas fa-user-alt"></i>
    <p>
      Production
      <i class="right fas fa-angle-left"></i>
    </p>
  </a>
  <ul class="nav nav-treeview">
    <li class="nav-item ">
      <?= $this->Html->link(__('<i class="fas fa-pallet nav-icon"></i><p>Production Planner</p>'), ['controller' => 'dailymonitor', 'action' => 'index'], ['class' => "nav-link $dailyStock", 'escape' => false]) ?>
    </li>
    <li class="nav-item ">
      <?= $this->Html->link(__('<i class="fas fa-pallet nav-icon"></i><p>Production Confirmation</p>'), ['controller' => '/dailymonitor', 'action' => 'dailyentry'], ['class' => "nav-link $planner", 'escape' => false]) ?>
    </li>
  </ul>
</li>

<li class="nav-item ">
  <?= $this->Html->link(__('<i class="fas fa-truck nav-icon"></i><p>Intransit</p>'), ['controller' => 'delivery-details', 'action' => 'index'], ['class' => "nav-link $intransit", 'escape' => false]) ?>
</li>

<!-- <li class="nav-item">
  <?= $this->Html->link(__('<i class="fas fa-truck nav-icon"></i><p>Material Master</p>'), ['controller' => 'materials', 'action' => 'index'], ['class' => "nav-link $intrasactive", 'escape' => false]) ?>
</li> -->

<!-- 
<li class="nav-item menu-open">
  <?= $this->Html->link(__('<i class="far fa-money-bill-alt nav-icon"></i><p>Payment Status</p>'), "#", ['class' => 'nav-link', 'escape' => false]) ?>
</li> -->
<!-- 
<li class="nav-item ">
  <?= $this->Html->link(__('<i class="fas fa-power-off nav-icon"></i><p>Logout</p>'), ['prefix' => false, 'controller' => 'users', 'action' => 'logout'], ['class' => 'nav-link', 'escape' => false]) ?>
</li> -->