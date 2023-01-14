<!-- Add icons to the links using the .nav-icon class
     with font-awesome or any other icon font library -->
     <li class="nav-item menu-open">
  <?= $this->Html->link(__('<i class="far fa-tachometer-alt nav-icon"></i><p>Dashboard</p>'), ['controller' => 'dashboard', 'action' => 'index'], ['class' => 'nav-link', 'escape' => false]) ?>
</li>

<li class="nav-item menu-open">
  <?= $this->Html->link(__('<i class="far fa-cog nav-icon"></i><p>Profile</p>'), ['controller' => 'purchaseorders', 'action' => 'index'], ['class' => 'nav-link', 'escape' => false]) ?>
</li>

<li class="nav-item menu-open">
  <?= $this->Html->link(__('<i class="far fa-cog nav-icon"></i><p>Purchase Orders</p>'), ['controller' => 'purchaseorders', 'action' => 'index'], ['class' => 'nav-link', 'escape' => false]) ?>
</li>

<li class="nav-item menu-open">
  <?= $this->Html->link(__('<i class="far fa-cog nav-icon"></i><p>Intransit</p>'), ['controller' => 'purchaseorders', 'action' => 'index'], ['class' => 'nav-link', 'escape' => false]) ?>
</li>

<li class="nav-item menu-open">
  <?= $this->Html->link(__('<i class="far fa-cog nav-icon"></i><p>Payment Status</p>'), ['controller' => 'purchaseorders', 'action' => 'index'], ['class' => 'nav-link', 'escape' => false]) ?>
</li>

<li class="nav-item menu-open">
  <?= $this->Html->link(__('<i class="far fa-sign-out nav-icon"></i><p>Logout</p>'), ['prefix' => false, 'controller' => 'users', 'action' => 'logout'], ['class' => 'nav-link', 'escape' => false]) ?>
</li>