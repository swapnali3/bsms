<!-- Add icons to the links using the .nav-icon class
     with font-awesome or any other icon font library -->
<li class="nav-item menu-open">
  <?= $this->Html->link(__('<i class="far fa-tachometer-alt nav-icon"></i><p>Dashboard</p>'), ['controller' => 'dashboard', 'action' => 'index'], ['class' => 'nav-link', 'escape' => false]) ?>
</li>

<li class="nav-item has-treeview">
  <a href="#" class="nav-link active">
    <i class="nav-icon fas fa-user-alt"></i>
    <p>
      Vendor Management
      <i class="right fas fa-angle-left"></i>
    </p>
  </a>
  <ul class="nav nav-treeview">
    <li class="nav-item"><?= $this->Html->link(__('<i class="far fa-circle nav-icon"></i><p>Vendor List</p>'), ['controller' => 'vendortemps', 'action' => 'index'], ['class' => 'nav-link', 'escape' => false]) ?></li>
  </ul>
</li>

<li class="nav-item menu-open">
  <?= $this->Html->link(__('<i class="far fa-cog nav-icon"></i><p>Purchase Orders</p>'), ['controller' => 'purchaseorders', 'action' => 'index'], ['class' => 'nav-link', 'escape' => false]) ?>
</li>

<li class="nav-item menu-open">
  <?= $this->Html->link(__('<i class="far fa-cog nav-icon"></i><p>Intransit</p>'), ['controller' => 'purchaseorders', 'action' => 'index'], ['class' => 'nav-link', 'escape' => false]) ?>
</li>

<li class="nav-item menu-open">
  <?= $this->Html->link(__('<i class="far fa-cog nav-icon"></i><p>Settings</p>'), ['controller' => 'settings', 'action' => 'update'], ['class' => 'nav-link', 'escape' => false]) ?>
</li>

<li class="nav-item menu-open">
  <?= $this->Html->link(__('<i class="far fa-sign-out nav-icon"></i><p>Logout</p>'), ['prefix' => false, 'controller' => 'users', 'action' => 'logout'], ['class' => 'nav-link', 'escape' => false]) ?>
</li>