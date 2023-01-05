<!-- Add icons to the links using the .nav-icon class
     with font-awesome or any other icon font library -->
<li class="nav-item has-treeview menu-open">
  <a href="#" class="nav-link active">
    <i class="nav-icon fas fa-tachometer-alt"></i>
    <p>
      Master
      <i class="right fas fa-angle-left"></i>
    </p>
  </a>
  <ul class="nav nav-treeview">
    <li class="nav-item"><?= $this->Html->link(__('<i class="far fa-circle nav-icon"></i><p>Dashboard<i class="right fas fa-angle-left"></i></p>'), ['controller' => 'dashboard', 'action' => 'index'], ['class' => 'nav-link', 'escape' => false]) ?></li>
    <li class="nav-item"><?= $this->Html->link(__('<i class="far fa-circle nav-icon"></i><p>Users<i class="right fas fa-angle-left"></i></p>'), ['controller' => 'adminusers', 'action' => 'index'], ['class' => 'nav-link', 'escape' => false]) ?></li>
    <!-- <li class="nav-item"><?= $this->Html->link(__('<i class="far fa-circle nav-icon"></i><p>Vendor<i class="right fas fa-angle-left"></i></p>'), ['controller' => 'buyersellerusers', 'action' => 'index'], ['class' => 'nav-link', 'escape' => false]) ?></li> -->
    <li class="nav-item"><?= $this->Html->link(__('<i class="far fa-circle nav-icon"></i><p>Vendor<i class="right fas fa-angle-left"></i></p>'), ['controller' => 'vendortemps', 'action' => 'index'], ['class' => 'nav-link', 'escape' => false]) ?></li>
    <li class="nav-item"><?= $this->Html->link(__('<i class="far fa-circle nav-icon"></i><p>Product<i class="right fas fa-angle-left"></i></p>'), ['controller' => 'products', 'action' => 'index'], ['class' => 'nav-link', 'escape' => false]) ?></li> 
    <li class="nav-item"><?= $this->Html->link(__('<i class="far fa-circle nav-icon"></i><p>RFQs<i class="right fas fa-angle-left"></i></p>'), ['controller' => 'rfqdetails', 'action' => 'index'], ['class' => 'nav-link', 'escape' => false]) ?></li> 
    <!-- <li class="nav-item"><?= $this->Html->link(__('<i class="far fa-circle nav-icon"></i><p>New Vendor<i class="right fas fa-angle-left"></i></p>'), ['controller' => 'vendortemps', 'action' => 'add'], ['class' => 'nav-link', 'escape' => false]) ?></li>  -->
    <li class="nav-item"><?= $this->Html->link(__('<i class="far fa-circle nav-icon"></i><p>Logout<i class="right fas fa-angle-left"></i></p>'), ['controller' => 'adminusers', 'action' => 'logout'], ['class' => 'nav-link', 'escape' => false]) ?></li> 
  </ul>
</li>