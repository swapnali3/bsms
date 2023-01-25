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
          <div class="col-lg-4 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
              <h3><?=$totalPos?></h3>

                <p>Purchase Orders</p>
              </div>
              <div class="icon">
                <i class="ion ion-bag"></i>
              </div>

              <?= $this->Html->link(__('More info &nbsp;<i class="fas fa-arrow-circle-right"></i>'), ['controller' => 'purchase-orders', 'action' => 'index'], ['class' => 'small-box-footer', 'escape' => false]) ?>

            </div>
            
          </div>
          <div class="col-lg-4 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
              <div class="inner">
                <h3><?=$totalVendorTemps?></h3>

                <p>Vendor Pending for Details</p>
              </div>
              <div class="icon">
                <i class="fas fa-user-alt"></i>
              </div>

              <?= $this->Html->link(__('More info &nbsp;<i class="fas fa-arrow-circle-right"></i>'), ['controller' => 'vendor-temps', 'action' => 'index'], ['class' => 'small-box-footer', 'escape' => false]) ?>

            </div>
            </div>

            <div class="col-lg-4 col-6">
            <!-- small box -->
            <div class="small-box bg-danger">
              <div class="inner">
              <h3><?=$totalIntransit?></h3>

                <p>Intransit</p>
              </div>
              <div class="icon">
                <i class="fas fa-truck nav-icon"></i>
              </div>

              <?= $this->Html->link(__('More info &nbsp;<i class="fas fa-arrow-circle-right"></i>'), ['controller' => 'delivery-details', 'action' => 'index'], ['class' => 'small-box-footer', 'escape' => false]) ?>
              </div>
            </div>

            <div class="col-lg-3 col-6" style="display:none;">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
              <h3><?=$totalRfqDetails?></h3>

                <p>Active RFQ</p>
              </div>
              <div class="icon">
                <i class="fas fa-question-circle  nav-icon"></i>
              </div>

              <?= $this->Html->link(__('More info &nbsp;<i class="fas fa-arrow-circle-right"></i>'), ['controller' => 'rfq-details', 'action' => 'index'], ['class' => 'small-box-footer', 'escape' => false]) ?>
              </div>
            </div>

      <div class="col-9 p-0" style="display:none;">
            <div class="card">
                <div class="card-body">



                <table class="table table-bordered table-hover" id="example1">
            <thead>
                <tr>
                    
                    <th><?= h('Rfq No.') ?></th>
                    <th><?= h('Category') ?></th>
                    <th><?= h('Date Raised') ?></th>
                    <th><?= h('Supplier Reached') ?></th>
                    <th><?= h('Suppliers Responded') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($rfqDetails as $rfqDetail):?>
                <tr>
                    
                    <td><?= str_pad($rfqDetail->rfq_no, 5, 0, STR_PAD_LEFT) ?></td>
                    <td><?= $rfqDetail->has('product') ? h($rfqDetail->product->name) : '' ?></td>
                    <td><?= h($rfqDetail->added_date) ?></td>
                    <td><?= $rfqDetail->RfqInquiries['reach'] ? h($rfqDetail->RfqInquiries['reach']) : 0 ?></td>
                    <td><?= $rfqDetail->RfqInquiries['respond'] ? h($rfqDetail->RfqInquiries['respond']) : 0 ?></td>
                    
                    
                    
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['controller' => 'rfq-details', 'action' => 'view', $rfqDetail->id]) ?>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
  </section>


  <script>
    $(document).ready(function() { 
        var table = $("#example1").DataTable({
            "paging": true,
            "responsive": false, "lengthChange": false, "autoWidth": false, "searching" :true,
        });
    });
    
</script>
