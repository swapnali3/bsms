<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\AdminUser[]|\Cake\Collection\CollectionInterface $adminUsers
 */
?>

<section class="content">
  <div class="container-fluid">
    <section id="content">
      <main>
        <ul class="box-info">
          <li>
            <i class='bx bxs-calendar-check' ></i>
            <span class="text">
              <h3><?= $totalPos ?></h3>
              <p><?= $this->Html->link(__('Purchase Orders'), ['controller' => 'purchase-orders', 'action' => 'index'], ['class' => 'small-box-footer', 'escape' => false]) ?></p>
            </span>
          </li>
          <li>
            <i class='bx bxs-group' ></i>
            <span class="text">
              <h3><?= $totalVendorTemps ?></h3>
              <p><?= $this->Html->link(__('Vendor Pending for Details'), ['controller' => 'vendor-temps', 'action' => 'index'], ['class' => 'small-box-footer', 'escape' => false]) ?></p>
            </span>
          </li>
          <li>
            <i class='bx bxs-dollar-circle' ></i>
            <span class="text">
              <h3><?= $totalIntransit ?></h3>
              <p><?= $this->Html->link(__('Vendor Intransit'), ['controller' => 'delivery-details', 'action' => 'index'], ['class' => 'small-box-footer', 'escape' => false]) ?></p>
            </span>
          </li>
        </ul>
      </main>
    </section>


    <!-- <div class="row pt-4">
      <div class="col-sm-12  col-lg-4 mb-5">
        <div class="card  mb-2">
          <div class="card-header p-3 pt-2">
            <div
              class="icon icon-lg icon-shape bg-gradient-dark shadow-dark shadow text-center border-radius-xl mt-n4 position-absolute">
              <i class="material-icons opacity-10">weekend</i>
            </div>
            <div class="text-end pt-1">
              <p class="text-sm mb-0 text-capitalize">Purchase Orders</p>
              <h4 class="mb-0">
                <?= $totalPos ?>
              </h4>
            </div>
          </div>

          <hr class="dark horizontal my-0">
          <div class="card-footer p-3">
            <p class="mb-0"><span class="text-success text-sm font-weight-bolder">
                <?= $this->Html->link(__('More Info'), ['controller' => 'purchase-orders', 'action' => 'index'], ['class' => 'small-box-footer', 'escape' => false]) ?>
              </span>
          </div>
        </div>
      </div>
      <div class="col-sm-12  col-lg-4 mb-5">
        <div class="card  mb-2">
          <div class="card-header p-3 pt-2">
            <div
              class="icon icon-lg icon-shape bg-gradient-primary shadow-primary shadow text-center border-radius-xl mt-n4 position-absolute">
              <i class="material-icons opacity-10">leaderboard</i>
            </div>
            <div class="text-end pt-1">
              <p class="text-sm mb-0 text-capitalize">Vendor Pending for Details</p>
              <h4 class="mb-0">
                <?= $totalVendorTemps ?>
              </h4>
            </div>
          </div>

          <hr class="dark horizontal my-0">
          <div class="card-footer p-3">
            <p class="mb-0"><span class="text-success text-sm font-weight-bolder">
                <?= $this->Html->link(__('More Info'), ['controller' => 'vendor-temps', 'action' => 'index'], ['class' => 'small-box-footer', 'escape' => false]) ?>
              </span>
          </div>
        </div>
      </div>
      <div class="col-sm-12  col-lg-4 mb-5">
        <div class="card  mb-2">
          <div class="card-header p-3 pt-2 bg-transparent">
            <div
              class="icon icon-lg icon-shape bg-gradient-success shadow-success text-center border-radius-xl mt-n4 position-absolute">
              <i class="material-icons opacity-10">monetization_on</i>
            </div>
            <div class="text-end pt-1">
              <p class="text-sm mb-0 text-capitalize ">Vendor Intransit</p>
              <h4 class="mb-0 ">
                <?= $totalIntransit ?>
              </h4>
            </div>
          </div>

          <hr class="horizontal my-0 dark">
          <div class="card-footer p-3">
            <p class="mb-0 "><span class="text-success text-sm font-weight-bolder">
                <?= $this->Html->link(__('More Info'), ['controller' => 'delivery-details', 'action' => 'index'], ['class' => 'small-box-footer', 'escape' => false]) ?>
              </span>
          </div>
        </div>
      </div>
    </div> -->

    <div class="row">
      <div class="col-lg-3 col-6" style="display:none;">
        <div class="small-box bg-success">
          <div class="inner">
            <h3>
              <?=$totalRfqDetails?>
            </h3>

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

                  <th>
                    <?= h('Rfq No.') ?>
                  </th>
                  <th>
                    <?= h('Category') ?>
                  </th>
                  <th>
                    <?= h('Date Raised') ?>
                  </th>
                  <th>
                    <?= h('Supplier Reached') ?>
                  </th>
                  <th>
                    <?= h('Suppliers Responded') ?>
                  </th>
                  <th class="actions">
                    <?= __('Actions') ?>
                  </th>
                </tr>
              </thead>
              <tbody>
                <?php foreach ($rfqDetails as $rfqDetail):?>
                <tr>

                  <td>
                    <?= str_pad($rfqDetail->rfq_no, 5, 0, STR_PAD_LEFT) ?>
                  </td>
                  <td>
                    <?= $rfqDetail->has('product') ? h($rfqDetail->product->name) : '' ?>
                  </td>
                  <td>
                    <?= h($rfqDetail->added_date) ?>
                  </td>
                  <td>
                    <?= $rfqDetail->RfqInquiries['reach'] ? h($rfqDetail->RfqInquiries['reach']) : 0 ?>
                  </td>
                  <td>
                    <?= $rfqDetail->RfqInquiries['respond'] ? h($rfqDetail->RfqInquiries['respond']) : 0 ?>
                  </td>
                  <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'rfq-details', 'action' => 'view', $rfqDetail->id]) ?>
                  </td>
                </tr>
                <?php endforeach; ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- <script>
  $(document).ready(function () {
    var table = $("#example1").DataTable({
      "paging": true,
      "responsive": false, "lengthChange": false, "autoWidth": false, "searching": true,
    });
  });
</script> -->