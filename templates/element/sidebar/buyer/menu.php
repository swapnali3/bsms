<?php $polickActive = ($controller == 'PurchaseOrders') ? 'active' : ''; ?>
<?php $prlickActive = ($controller == 'PurchaseRequisitions') ? 'active' : ''; ?>
<?php $dashactive = ($controller == 'Dashboard') ? 'active' : ''; ?>
<?php $intrasactive = ($controller == 'DeliveryDetails') ? 'active' : ''; ?>
<?php $settingactive = ($controller == 'Settings') ? 'active' : ''; ?>
<?php $temvenactive = ($controller == 'VendorTemps') ? 'active' : ''; ?>
<?php $vendorIndex = ($controller == 'VendorTemps' && $action == 'index') ? 'active' : ''; ?>
<?php $createvendactive = ($controller == 'VendorTemps' && $action == 'add') ? 'active' : ''; ?>
<?php $creatsaevendactive = ($controller == 'VendorTemps' && $action == 'sapAdd') ? 'active' : ''; ?>
<?php $rfqactive = ($controller == 'Rfqs') ? 'active' : ''; ?>
<?php $stocksUpload = ($controller == 'StockUploads') ? 'active' : ''; ?>
<?php $temvenmenuopen = ($controller == 'VendorTemps') ? 'menu-open' : ''; ?>
<?php $settingmenuopen = ($controller == 'Settings') ? 'menu-open' : ''; ?>
<?php $temvenactive = ($controller == 'buyervendor-temps') ? 'active' : ''; ?>
<?php $buyvendaddactive = ($controller == 'buyervendor-temps' && $action == 'add') ? 'menu-open' : ''; ?>
<?php $buyvendsaevendactive = ($controller == 'VendorTemps' && $action == 'sapAdd') ? 'menu-open' : ''; ?>
<?php $asnactive = ($controller == 'Asn') ? 'active' : ''; ?>

<li class="nav-item">
  <?= $this->Html->link(__('<i class="fas fa-tachometer-alt nav-icon"></i><p>Dashboard</p>'), ['controller' => 'dashboard', 'action' => 'index'], ['class' => "nav-link $dashactive", 'escape' => false]) ?>
</li>

<li class="nav-item <?= $temvenmenuopen ?> <?= $buyvendaddactive ?>">
  <a href="#" class="nav-link <?= $vendorIndex ?> <?= $createvendactive ?> <?= $creatsaevendactive ?>">
    <i class="nav-icon fas fa-user-alt"></i>
    <p>
      Vendor Management
      <i class="right fas fa-angle-left"></i>
    </p>
  </a>
  <ul class="nav nav-treeview">
    <li class="nav-item ">
      <a href="<?= $this->Url->build('/') ?>buyer/vendor-temps" class="nav-link vendor_material <?= $vendorIndex ?>">
        <i class="nav-icon fas fa-users"></i>
        <p>Vendors</p>
      </a>
    </li>
    <li class="nav-item ">
      <a href="<?= $this->Url->build('/') ?>buyer/vendor-temps/add" class="nav-link <?= $createvendactive ?>">
        <i class="fa fa-solid fa-plus nav-icon"></i>
        <p>Add Vendor</p>
      </a>
    </li>
    <li class="nav-item ">
      <a href="<?= $this->Url->build('/') ?>buyer/vendor-temps/sap-add" class="nav-link <?= $creatsaevendactive ?>">
        <i class="fas fa-file-import nav-icon"></i>
        <p>SAP Vendor Import</p>
      </a>
    </li>
  </ul>
</li>


<!-- <li class="nav-item"> <?= $this->Html->link(__('<i class="fa fa-file-invoice  nav-icon"></i><p>RFQs</p>'), ['controller' => 'rfqs', 'action' => 'index'], ['class' => "nav-link $rfqactive", 'escape' => false]) ?> </li> -->

<!-- <li class="nav-item">  <?= $this->Html->link(__('<i class="fa fa-file nav-icon"></i><p>Purchase Requisitions</p>'), ['controller' => 'purchase-requisitions', 'action' => 'index'], ['class' => "nav-link $prlickActive", 'escape' => false]) ?> </li> -->

<li class="nav-item">
  <?= $this->Html->link(__('<i class="fa fa-shopping-cart nav-icon"></i><p>Purchase Orders</p>'), ['controller' => '/purchase-orders', 'action' => 'view'], ['class' => "nav-link po_acknowledge $polickActive", 'escape' => false]) ?>
</li>

<li class="nav-item">
  <?= $this->Html->link(__('<i class="fas fa-truck nav-icon"></i><p>Intransit ASN</p>'), ['controller' => 'delivery-details', 'action' => 'index'], ['class' => "nav-link $intrasactive", 'escape' => false]) ?>
</li>

<li class="nav-item ">
      <?= $this->Html->link(__('<i class="fas fa-warehouse nav-icon"></i><p>Stocks Upload</p>'), ['controller' => '/stock-uploads', 'action' => 'index'], ['class' => "nav-link $stocksUpload", 'escape' => false]) ?>
  </li>