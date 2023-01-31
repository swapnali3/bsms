<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\AdminUser[]|\Cake\Collection\CollectionInterface $adminUsers
 */
?>
<link href="https://fonts.googleapis.com/icon?family=Material+Icons+Round" rel="stylesheet">

<!-- Main content -->
<div class="row" style="margin-top: 25px">

  <div class="col-sm-12 col-lg-3">
    <div class="card mb-2" style="border-radius:1rem;">
      <div class="card-header p-3 pt-2">
        <div
          class="icon icon-lg icon-shape bg-gradient-dark shadow-dark shadow text-center border-radius-xl mt-n4 position-absolute">
          <i class="material-icons opacity-10">shopping_cart</i>
        </div>
        <div class="text-end pt-1">
          <h1 class="text-sm mb-0 text-capitalize"><b>Purchase Orders</b></h1>
          <h4 class="mb-0">
            <?= $totalPos ?>
          </h4>
        </div>
      </div>

      <hr class="dark horizontal my-0">
      <div class="card-footer p-3">
        <?= $this->Html->link(__('More Info'), ['controller' => 'purchase-orders', 'action' => 'index'], ['class' => 'small-box-footer button', 'escape' => false]) ?>
      </div>
    </div>
  </div>

  <div class="col-sm-12 col-lg-3">
    <div class="card  mb-2" style="border-radius:1rem;">
      <div class="card-header p-3 pt-2">
        <div
          class="icon icon-lg icon-shape bg-gradient-primary shadow-primary shadow text-center border-radius-xl mt-n4 position-absolute">
          <i class="material-icons opacity-10">request_quote</i>
        </div>
        <div class="text-end pt-1">
          <h1 class="text-sm mb-0 text-capitalize"><b>Total RFQ</b></h1>
          <h4 class="mb-0">
            <?= $totalIntransit ?>
          </h4>
        </div>
      </div>

      <hr class="dark horizontal my-0">
      <div class="card-footer p-3">
        &nbsp;
      </div>
    </div>
  </div>

  <div class="col-sm-12 col-lg-3">
    <div class="card  mb-2" style="border-radius:1rem;">
      <div class="card-header p-3 pt-2 bg-transparent">
        <div
          class="icon icon-lg icon-shape bg-gradient-success shadow-success text-center border-radius-xl mt-n4 position-absolute">
          <i class="material-icons opacity-10">local_shipping</i>
        </div>
        <div class="text-end pt-1">
          <h1 class="text-sm mb-0 text-capitalize "><b>IN Transit</b>
          </h1>
          <h4 class="mb-0 ">
            <?= $totalIntransit ?>
          </h4>
        </div>
      </div>
      <hr class="horizontal my-0 dark">
      <div class="card-footer p-3">
        <?= $this->Html->link(__('More Info'), ['controller' => 'delivery-details', 'action' => 'index'], ['class' => 'small-box-footer button', 'escape' => false]) ?>
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
          <h1 class="text-sm mb-0 text-capitalize "><b>Payment Balance</b>
          </h1>
          <h4 class="mb-0 ">
            <?= $this->Html->link(__('250000/-'), ['#'], ['class' => 'small-box-footer', 'escape' => false]) ?>
          </h4>
        </div>
      </div>
      <hr class="horizontal my-0 dark">
      <div class="card-footer p-3">&nbsp; </div>
    </div>
  </div>

</div>

<div class="container-fluid">
  <div class="row my-3">
    <div class="col-12">
      <h2><b>RFQ List</b></h2>
    </div>
    <?php foreach($rfqDetails as $key => $val) : ?>
    <?php $attrParams = json_decode($val->attribute_data, true); ?>
    <div class="col-4">
      <div class="card mb-0">
        <div class="card-body">
          <div class="row">
            <div class="col-4">
              <b>RFQ No.</b>
            </div>
            <div class="col-8">
              :
              <?=$val['rfq_no']?>
            </div>
            <div class="col-4">
              <b>Category</b>

            </div>
            <div class="col-8">
              :
              <?=$val['product']->name?>
            </div>
            <div class="col-4">
              <b>Part Name</b>
            </div>
            <div class="col-8">
              :
              <?=$val['part_name']?>
            </div>
            <div class="col-4">
              <b>Make</b>
            </div>
            <div class="col-8">
              :
              <?=$val['make']?>
            </div>
            <div class="col-4">
              <b>UOM</b>
            </div>
            <div class="col-8">
              :
              <?=$val['uom']->description?>
            </div>
            <div class="col-4">
              <b>Remarks</b>
            </div>
            <div class="col-8">
              :
              <?=$val['remarks']?>
            </div>

            <div class="col-4">
              <b>Date</b>
            </div>
            <div class="col-8">
              :
              <?=$val['added_date']?>
            </div>
          </div>
        </div>
        <div class="card-footer p-0">
          <?= $this->Html->link(__('<i class="material-icons opacity-10">visibility</i>&nbsp; View'), ['controller' => 'dashboard', 'action' => 'rfq-view', $val['id']], ['class' => 'btn btn-block btn-info mb-0', 'escape' => false]) ?>
        </div>
      </div>
    </div>
    <?php endforeach;?>
  </div>
</div>
</section>