<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\AdminUser[]|\ ake\Collection\CollectionInterface $adminUsers
 */
?>
<link href="https://fonts.googleapis.com/icon?family=Material+Icons+Round" rel="stylesheet">
<div class="row mt-4 mx-1">
  <div class="col-sm-12 col-lg-3">
    <div class="card mb-2" style="border-radius:1rem;">

      <div class="card-header p-3 pt-2">
        <div class="icon icon-lg icon-shape bg-gradient-dark shadow-dark shadow text-center border-radius-xl mt-n4 position-absolute">
          <i class="material-icons opacity-10">shopping_cart</i>
        </div>
        <div class="text-end pt-1">
          <h1 class="text-sm mb-0 text-capitalize"><b>Purchase Orders</b></h1>
          <h4 class="mb-0"><?= $totalPos ?></h4>
        </div>
      </div>

      <hr class="dark horizontal my-0">
      <div class="card-footer p-3">
        <button type="button" class="button">
          <?= $this->Html->link(__('More Info!'), ['controller' => 'purchase-orders', 'action' => 'index'], ['style'=>'color:white;'], ['class' => 'small-box-footer', 'escape' => false]) ?>
          
        </button>

      </div>
    </div>
  </div>

  <div class="col-sm-12 col-lg-3">
    <div class="card  mb-2" style="border-radius:1rem;">
      <div class="card-header p-3 pt-2">
        <div class="icon icon-lg icon-shape bg-gradient-primary shadow-primary shadow text-center border-radius-xl mt-n4 position-absolute">
          <i class="material-icons opacity-10">request_quote</i>
        </div>
        <div class="text-end pt-1">
          <h1 class="text-sm mb-0 text-capitalize"><b>Vendor Pending for Details</b></h1>
          <h4 class="mb-0"><?= $totalVendorTemps ?></h4>
        </div>
      </div>

      <hr class="dark horizontal my-0">
      <div class="card-footer p-3">
        <button type="button" class="button"><?= $this->Html->link(__('More info!'), ['controller' => 'vendor-temps', 'action' => 'index'],['style'=>'color:white;'],['class' => 'small-box-footer', 'escape' => false]) ?></button>
      </div>
    </div>
  </div>

  <div class="col-sm-12 col-lg-3">
    <div class="card  mb-2" style="border-radius:1rem;">
      <div class="card-header p-3 pt-2 bg-transparent">
        <div class="icon icon-lg icon-shape bg-gradient-success shadow-success text-center border-radius-xl mt-n4 position-absolute">
          <i class="material-icons opacity-10">local_shipping</i>
        </div>
        <div class="text-end pt-1">
          <h1 class="text-sm mb-0 text-capitalize "><b>Vendor Intransit</b>
          </h1>
          <h4 class="mb-0 "><?= $totalIntransit ?></h4>
        </div>
      </div>


      <hr class="horizontal my-0 dark">
      <div class="card-footer p-3">
        <button type="button" class="button"><?= $this->Html->link(__('More info!'), ['controller' => 'delivery-details', 'action' => 'index'],['style'=>'color:white;'], ['class' => 'small-box-footer', 'escape' => false]) ?></button>
      </div>
    </div>
  </div>

  <div class="col-sm-12 col-lg-3">
    <div class="card  mb-2" style="border-radius:1rem;">
      <div class="card-header p-3 pt-2 bg-transparent">
        <div
          class="icon icon-lg icon-shape bg-gradient-success shadow-success text-center border-radius-xl mt-n4 position-absolute">
          <i class="material-icons opacity-10">monetization_on</i>
        </div>
        <div class="text-end pt-1">
          <h1 class="text-sm mb-0 text-capitalize "><b>More Info</b>
          </h1>
          <h4 class="mb-0 "><?= $totalRfqDetails ?></h4>
        </div>
      </div>


      <hr class="horizontal my-0 dark">
      <div class="card-footer p-3">
        <button type="button" class="button"><?= $this->Html->link(__('More info '), ['controller' => 'rfq-details', 'action' => 'index'],['style'=>'color:white;'], ['class' => 'small-box-footer', 'escape' => false]) ?></button>
      </div>
    </div>
  </div>

</div>


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
</div>

<div class="row">
  <div class="col-lg-3 col-6">
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
  -->
<div class="col-12 p-2">
  <div class="card">
    <div class="card-body p-2">
      <table class="table table-hover" id="example1">
        <thead>
          <tr>

            <th>
              <?= h('RFQ No.') ?>
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
          <tr style="text-align-last: center;">
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
              <a href="<?= $this->Url->build('/') ?>buyer/rfq-details/view/<?= $rfqDetail->id ?>" class="btn btn-sm bg-gradient-primary mb-0 py-1 px-2">
              <i class='material-icons opacity-10'>visibility</i> View
            </a>
              <!-- <?= $this->Html->link(__(""), ['controller' => 'rfq-details', 'action' => 'view', $rfqDetail->id], ['class'=> 'button py-1 px-2']) ?> -->
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