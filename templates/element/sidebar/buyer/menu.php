
<style>
  /* nav.main-header {
    height: 52px;
} */
  .container, .container-fluid, .container-lg, .container-md, .container-sm, .container-xl{
    padding-left:0rem
  }
  .layout-fixed .brand-link{
    width:218px
  }

  .brand-link{
    padding:0.5rem 0.5rem
  }
  body:not(.sidebar-mini-md):not(.sidebar-mini-xs):not(.layout-top-nav) .content-wrapper, body:not(.sidebar-mini-md):not(.sidebar-mini-xs):not(.layout-top-nav) .main-footer, body:not(.sidebar-mini-md):not(.sidebar-mini-xs):not(.layout-top-nav) .main-header{
    margin-left:210px
  }
  .sidebar-mini .main-sidebar .nav-link, .sidebar-mini-md .main-sidebar .nav-link, .sidebar-mini-xs .main-sidebar .nav-link{
    width:calc(235px - 1.1rem * 2)
  }
  .nav-sidebar .nav-link>.right, .nav-sidebar .nav-link>p>.right{
    top:0.9rem
  }
  .main-sidebar, .main-sidebar::before{
    width:218px
  }
  p, .p{
    font-size:14px
  }
  .sidebar{
    padding-left:0.6rem
  }
  .nav-sidebar>.nav-item .nav-icon.fa, .nav-sidebar>.nav-item .nav-icon.fab, .nav-sidebar>.nav-item .nav-icon.fad, .nav-sidebar>.nav-item .nav-icon.fal, .nav-sidebar>.nav-item .nav-icon.far, .nav-sidebar>.nav-item .nav-icon.fas, .nav-sidebar>.nav-item .nav-icon.ion, .nav-sidebar>.nav-item .nav-icon.svg-inline--fa {
    font-size:0.8rem;
    }
</style>
<!-- Add icons to the links using the .nav-icon class
     with font-awesome or any other icon font library -->

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

//echo $action; exit;

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
      <a href="<?= $this->Url->build('/') ?>buyer/vendor-temps" class="nav-link <?= $tempindctive ?>">
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


<!-- 
<li class="nav-item">
  <?= $this->Html->link(__('<i class="fa fa-file-invoice  nav-icon"></i><p>RFQs</p>'), ['controller' => 'rfqs', 'action' => 'index'], ['class' => "nav-link $rfqactive", 'escape' => false]) ?>
</li> -->

<!-- <li class="nav-item">
  <?= $this->Html->link(__('<i class="fa fa-file nav-icon"></i><p>Purchase Requisitions</p>'), ['controller' => 'purchase-requisitions', 'action' => 'index'], ['class' => "nav-link $prlickActive", 'escape' => false]) ?>
</li> -->

<li class="nav-item">
  <?= $this->Html->link(__('<i class="fa fa-shopping-cart nav-icon"></i><p>Purchase Orders</p>'), ['controller' => 'purchase-orders', 'action' => 'view'], ['class' => "nav-link $polickActive", 'escape' => false]) ?>
</li>

<li class="nav-item">
  <?= $this->Html->link(__('<i class="fas fa-truck nav-icon"></i><p>Intransit ASN</p>'), ['controller' => 'delivery-details', 'action' => 'index'], ['class' => "nav-link $intrasactive", 'escape' => false]) ?>
</li>
<li class="nav-item">
  <?= $this->Html->link(__('<i class="fa fa-universal-access nav-icon"></i><p>Gate Entry</p>'), ['controller' => 'asn', 'action' => 'search'], ['class' => "nav-link $asnactive" , 'escape' => false]) ?>
</li>

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

<!--
<li class="nav-item">
  <?= $this->Html->link(__('<i class="fas fa-power-off nav-icon"></i><p>Logout</p>'), ['prefix' => false, 'controller' => 'users', 'action' => 'logout'], ['class' => "nav-link", 'escape' => false]) ?>
</li> -->
