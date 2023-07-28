<?php $polickActive = ($controller == 'PurchaseOrders') ? 'active' : ''; ?>
<?php $prlickActive = ($controller == 'PurchaseRequisitions') ? 'active' : ''; ?>
<?php $dashactive = ($controller == 'Dashboard') ? 'active' : ''; ?>
<?php $intrasactive = ($controller == 'DeliveryDetails') ? 'active' : ''; ?>
<?php $settingactive = ($controller == 'Settings') ? 'active' : ''; ?>
<?php $temvenactive = ($controller == 'VendorTemps') ? 'active' : ''; ?>
<?php $tempindctive = ($controller == 'VendorTemps' && $action == 'index') ? 'active' : ''; ?>
<?php $createvendactive = ($controller == 'VendorTemps' && $action == 'add') ? 'active' : ''; ?>
<?php $creatsaevendactive = ($controller == 'VendorTemps' && $action == 'sapAdd') ? 'active' : ''; ?>
<?php $rfqactive = ($controller == 'Rfqs') ? 'active' : ''; ?>

<?php $temvenmenuopen = ($controller == 'VendorTemps') ? 'menu-open' : ''; ?>
<?php $settingmenuopen = ($controller == 'Settings') ? 'menu-open' : ''; ?>
<?php $temvenactive = ($controller == 'buyervendor-temps') ? 'active' : ''; ?>
<?php $buyvendaddactive = ($controller == 'buyervendor-temps' && $action == 'add') ? 'menu-open' : ''; ?>
<?php $buyvendsaevendactive = ($controller == 'VendorTemps' && $action == 'sapAdd') ? 'menu-open' : ''; ?>
<?php $asnactive = ($controller == 'Asn') ? 'active' : ''; ?>

<?php $settingBuyerActive = ($controller == 'Settings' && $action == 'buyerManagement') ? 'active' : ''; ?>
<?php $settingVendorActive = ($controller == 'Settings' && $action == 'vendorManagement') ? 'active' : ''; 
?>

<li class="nav-item">
  <?= $this->Html->link(__('<i class="fas fa-tachometer-alt nav-icon"></i><p>Dashboard</p>'), ['controller' => 'dashboard', 'action' => 'index'], ['class' => "nav-link $dashactive", 'escape' => false]) ?>
</li>

<li class="nav-item <?= $temvenmenuopen ?> <?= $buyvendaddactive ?>">
  <a href="#" class="nav-link <?= $tempindctive ?> <?= $createvendactive ?> <?= $creatsaevendactive ?>">
    <i class="nav-icon fas fa-user-alt"></i>
    <p>
      Vendor Management
      <i class="right fas fa-angle-left"></i>
    </p>
  </a>
  <ul class="nav nav-treeview">
    <li class="nav-item ">
      <a href="<?= $this->Url->build('/') ?>buyer/vendor-temps" class="nav-link vendor_material<?= $tempindctive ?>">
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
    <!-- <li class="nav-item <?= $buyvendaddactive ?>">
      <a href="#" class="nav-link <?= $createvendactive ?>">
        <i class="nav-icon fas fa-user-alt"></i>
        <p>
          Vendor Creation
          <i class="right fas fa-angle-down"></i>
        </p>
      </a>
      <ul class="nav nav-treeview">
        <li class="nav-item"><a href="<?= $this->Url->build('/') ?>buyer/vendor-temps/add" class="nav-link <?= $createvendactive ?>">
        <i class="fa fa-solid fa-plus nav-icon"></i>
            <p>New Vendor</p>
          </a></li>
        <li class="nav-item"><a href="<?= $this->Url->build('/') ?>buyer/vendor-temps/sap-add" class="nav-link <?= $creatsaevendactive ?>">
        <i class="fa fa-solid fa-plus nav-icon"></i>
            <p>SAP Vendor</p>
          </a></li>
      </ul>
    </li> -->
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

<li class="nav-item">
  <?= $this->Html->link(__('<i class="fa fa-universal-access nav-icon"></i><p>Gate Entry</p>'), ['controller' => 'asn', 'action' => 'search'], ['class' => "nav-link $asnactive" , 'escape' => false]) ?>
</li>

<!-- <li class="nav-item">  <?= $this->Html->link(__('<i class="fas fa-vector-square nav-icon"></i><p>Vendor Material Master</p>'), ['controller' => 'vendormaterial', 'action' => 'index'], ['class' => "nav-link vmmactive" , 'escape' => false]) ?> </li> -->

<li class="nav-item <?=$settingmenuopen?>">
  <?= $this->Html->link(__('<i class="fa fa-cog nav-icon"></i><p>Settings</p>'), ['controller' => 'settings', 'action' => 'update'], ['class' => "nav-link $settingactive", 'escape' => false]) ?>

  <ul class="nav nav-treeview">
    <li class="nav-item ">
      <?= $this->Html->link(__('<i class="fa fa-solid fa-list nav-icon"></i><p>Buyer Management</p>'), ['controller' => '/settings', 'action' => 'buyer-management'], ['class' => "nav-link $settingBuyerActive", 'escape' => false]) ?>
    </li>

    <li class="nav-item ">
      <?= $this->Html->link(__('<i class="fa fa-solid fa-list nav-icon"></i><p>Vendor Management</p>'), ['controller' => '/settings', 'action' => 'vendor-management'], ['class' => "nav-link $settingVendorActive", 'escape' => false]) ?>
    </li>
  </ul>
</li>