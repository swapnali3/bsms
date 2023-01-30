<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\AdminUser[]|\Cake\Collection\CollectionInterface $adminUsers
 */
?>

<!-- Main content -->
<section class="content">
  <div class="container-fluid">
    <div id="content">
      <main class="row">
        <ul class="box-info col-8">
          <li>
            <i class='bx bxs-calendar-check'></i>
            <span class="text">
              <h3>
                <?= $this->Html->link(__('1'), ['controller' => 'purchase-orders', 'action' => 'index'], ['class' => 'small-box-footer', 'escape' => false]) ?>
              </h3>
              <p>Purchase Orders</p>
            </span>
          </li>
          <li style="display: none;">
            <i class='bx bxs-group'></i>
            <span class="text">
              <h3>
                <?= $this->Html->link(__('1'), '#', ['class' => 'small-box-footer', 'escape' => false]) ?>
              </h3>
              <p>Total RFQ</p>
            </span>
          </li>
          <li>
            <i class='bx bxs-dollar-circle'></i>
            <span class="text">
              <h3>
                <?= $this->Html->link(__('250000/-'), ['#'], ['class' => 'small-box-footer', 'escape' => false]) ?>
              </h3>
              <p>Payment Balance</p>
            </span>
          </li>
        </ul>
      </main>
    </div>

    <div class="container-fluid" style="display:none;">
      <div class="row my-3">
        <div class="col-12">
          <h2>RFQ List</h2>
        </div>
        <?php foreach($rfqDetails as $key => $val) : ?>
        <?php $attrParams = json_decode($val->attribute_data, true); ?>
        <div class="col-4">
          <div class="card">
            <div class="card-body">
              <div class="row">
                <div class="col-8">
                  <div class="row">
                    <div class="col-4">
                      RFQ No.
                    </div>
                    <div class="col-8">
                      :
                      <?=$val['rfq_no']?>
                    </div>
                    <div class="col-4">
                      Category
                    </div>
                    <div class="col-8">
                      :
                      <?=$val['product']->name?>
                    </div>
                    <div class="col-4">
                      Part Name
                    </div>
                    <div class="col-8">
                      :
                      <?=$val['part_name']?>
                    </div>
                    <div class="col-4">
                      Make
                    </div>
                    <div class="col-8">
                      :
                      <?=$val['make']?>
                    </div>
                    <div class="col-4">
                      UOM
                    </div>
                    <div class="col-8">
                      :
                      <?=$val['uom']->description?>
                    </div>
                    <div class="col-4">
                      Remarks
                    </div>
                    <div class="col-8">
                      :
                      <?=$val['remarks']?>
                    </div>

                    <div class="col-4">
                      Date
                    </div>
                    <div class="col-8">
                      :
                      <?=$val['added_date']?>
                    </div>
                    <div class="col-8 mt-3">
                      <?= $this->Html->link(__('View'), ['controller' => 'dashboard', 'action' => 'rfq-view', $val['id']], ['class' => 'btn btn-block btn-info', 'escape' => false]) ?>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <?php endforeach;?>
      </div>
    </div>
</section>