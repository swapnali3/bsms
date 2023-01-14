<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\AdminUser[]|\Cake\Collection\CollectionInterface $adminUsers
 */
?>

  <!-- Main content -->
  <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
                <h3>1</h3>

                <p>Purchase Orders</p>
              </div>
              <div class="icon">
                <i class="ion ion-bag"></i>
              </div>

              <?= $this->Html->link(__('More info &nbsp;<i class="fas fa-arrow-circle-right"></i>'), ['controller' => 'purchaseorders', 'action' => 'index'], ['class' => 'small-box-footer', 'escape' => false]) ?>

            </div>
            
          </div>
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
              <div class="inner">
                <h3>1</h3>

                <p>Vendor Pending for Details</p>
              </div>
              <div class="icon">
                <i class="ion ion-bag"></i>
              </div>

              <?= $this->Html->link(__('More info &nbsp;<i class="fas fa-arrow-circle-right"></i>'), ['controller' => 'vendortemps', 'action' => 'index'], ['class' => 'small-box-footer', 'escape' => false]) ?>

            </div>
      </div>
  </section>