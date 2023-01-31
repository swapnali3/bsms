<!-- Add icons to the links using the .nav-icon class
     with font-awesome or any other icon font library -->
     <?php $polickActive = ($controller == 'PurchaseOrders') ? 'active' : ''; ?>
     <?php $dashactive = ($controller == 'Dashboard') ? 'active' : ''; ?>
     <?php $intrasactive = ($controller == 'DeliveryDetails') ? 'active' : ''; ?>
     <?php $stockActive = ($controller == 'VendorMaterialStocks') ? 'active' : ''; ?>

<li class="nav-item menu-open">
  <?= $this->Html->link(__('<i class="far fa-tachometer-alt nav-icon"></i><p>Dashboard</p>'), ['controller' => 'dashboard', 'action' => 'index'], ['class' => "nav-link $dashactive", 'escape' => false]) ?>
</li>

<li class="nav-item menu-open">
  <?= $this->Html->link(__('<i class="far fa-user nav-icon"></i><p>Profile</p>'), "#", ['class' => "nav-link", 'escape' => false]) ?>
</li>

<li class="nav-item menu-open">
  <?= $this->Html->link(__('<i class="fa fa-shopping-cart nav-icon"></i><p>Purchase Orders</p>'), ['controller' => 'purchase-orders', 'action' => 'index'], ['class' => "nav-link $polickActive" , 'escape' => false]) ?>
</li>

<li class="nav-item menu-open">
  <?= $this->Html->link(__('<i class="fas fa-truck nav-icon"></i><p>Material Stocks</p>'), ['controller' => 'vendor-material-stocks', 'action' => 'index'], ['class' => "nav-link $stockActive", 'escape' => false]) ?>
</li>

<li class="nav-item menu-open">
  <?= $this->Html->link(__('<i class="fas fa-truck nav-icon"></i><p>Intransit</p>'), ['controller' => 'delivery-details', 'action' => 'index'], ['class' => "nav-link $intrasactive", 'escape' => false]) ?>
</li>

<li class="nav-item menu-open">
  <?= $this->Html->link(__('<i class="far fa-money-bill-alt nav-icon"></i><p>Payment Status</p>'), "#", ['class' => 'nav-link', 'escape' => false]) ?>
</li>

<li class="nav-item menu-open">
  <?= $this->Html->link(__('<i class="fas fa-power-off nav-icon"></i><p>Logout</p>'), ['prefix' => false, 'controller' => 'users', 'action' => 'logout'], ['class' => 'nav-link', 'escape' => false]) ?>
</li>