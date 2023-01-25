<?php

/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\SchemaGroup $schemaGroup
 */
?>

<?php
$this->assign('title', __('Schema Group'));
$this->Breadcrumbs->add([
    ['title' => 'Home', 'url' => '/'],
    ['title' => 'List Schema Groups', 'url' => ['action' => 'index']],
    ['title' => 'View'],
]);
?>

<div class="view card card-primary card-outline">
  <div class="card-header d-sm-flex">
    <h2 class="card-title"><?= h($schemaGroup->name) ?></h2>
  </div>
  <div class="card-body table-responsive p-0">
    <table class="table table-hover text-nowrap">
        <tr>
            <th><?= __('Name') ?></th>
            <td><?= h($schemaGroup->name) ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($schemaGroup->id) ?></td>
        </tr>
        <tr>
            <th><?= __('Status') ?></th>
            <td><?= $this->Number->format($schemaGroup->status) ?></td>
        </tr>
        <tr>
            <th><?= __('Added Date') ?></th>
            <td><?= h($schemaGroup->added_date) ?></td>
        </tr>
        <tr>
            <th><?= __('Updated Date') ?></th>
            <td><?= h($schemaGroup->updated_date) ?></td>
        </tr>
    </table>
  </div>
  <div class="card-footer d-flex">
    <div class="">
      <?= $this->Form->postLink(
          __('Delete'),
          ['action' => 'delete', $schemaGroup->id],
          ['confirm' => __('Are you sure you want to delete # {0}?', $schemaGroup->id), 'class' => 'btn btn-danger']
      ) ?>
    </div>
    <div class="ml-auto">
      <?= $this->Html->link(__('Edit'), ['action' => 'edit', $schemaGroup->id], ['class' => 'btn btn-secondary']) ?>
      <?= $this->Html->link(__('Cancel'), ['action' => 'index'], ['class' => 'btn btn-default']) ?>
    </div>
  </div>
</div>


<div class="related related-vendorTemps view card">
  <div class="card-header d-sm-flex">
    <h3 class="card-title"><?= __('Related Vendor Temps') ?></h3>
    <div class="card-toolbox">
      <?= $this->Html->link(__('New'), ['controller' => 'VendorTemps' , 'action' => 'add'], ['class' => 'btn btn-primary btn-sm']) ?>
      <?= $this->Html->link(__('List '), ['controller' => 'VendorTemps' , 'action' => 'index'], ['class' => 'btn btn-primary btn-sm']) ?>
    </div>
  </div>
  <div class="card-body table-responsive p-0">
    <table class="table table-hover text-nowrap">
      <tr>
          <th><?= __('Id') ?></th>
          <th><?= __('Purchasing Organization Id') ?></th>
          <th><?= __('Account Group Id') ?></th>
          <th><?= __('Schema Group Id') ?></th>
          <th><?= __('Name') ?></th>
          <th><?= __('Address') ?></th>
          <th><?= __('City') ?></th>
          <th><?= __('Pincode') ?></th>
          <th><?= __('Mobile') ?></th>
          <th><?= __('Email') ?></th>
          <th><?= __('Country') ?></th>
          <th><?= __('Payment Term') ?></th>
          <th><?= __('Order Currency') ?></th>
          <th><?= __('Gst No') ?></th>
          <th><?= __('Pan No') ?></th>
          <th><?= __('Contact Person') ?></th>
          <th><?= __('Contact Email') ?></th>
          <th><?= __('Contact Mobile') ?></th>
          <th><?= __('Cin No') ?></th>
          <th><?= __('Tan No') ?></th>
          <th><?= __('Status') ?></th>
          <th><?= __('Valid Date') ?></th>
          <th><?= __('Buyer Id') ?></th>
          <th><?= __('Added Date') ?></th>
          <th><?= __('Updated Date') ?></th>
          <th class="actions"><?= __('Actions') ?></th>
      </tr>
      <?php if (empty($schemaGroup->vendor_temps)) { ?>
        <tr>
            <td colspan="26" class="text-muted">
              Vendor Temps record not found!
            </td>
        </tr>
      <?php }else{ ?>
        <?php foreach ($schemaGroup->vendor_temps as $vendorTemps) : ?>
        <tr>
            <td><?= h($vendorTemps->id) ?></td>
            <td><?= h($vendorTemps->purchasing_organization_id) ?></td>
            <td><?= h($vendorTemps->account_group_id) ?></td>
            <td><?= h($vendorTemps->schema_group_id) ?></td>
            <td><?= h($vendorTemps->name) ?></td>
            <td><?= h($vendorTemps->address) ?></td>
            <td><?= h($vendorTemps->city) ?></td>
            <td><?= h($vendorTemps->pincode) ?></td>
            <td><?= h($vendorTemps->mobile) ?></td>
            <td><?= h($vendorTemps->email) ?></td>
            <td><?= h($vendorTemps->country) ?></td>
            <td><?= h($vendorTemps->payment_term) ?></td>
            <td><?= h($vendorTemps->order_currency) ?></td>
            <td><?= h($vendorTemps->gst_no) ?></td>
            <td><?= h($vendorTemps->pan_no) ?></td>
            <td><?= h($vendorTemps->contact_person) ?></td>
            <td><?= h($vendorTemps->contact_email) ?></td>
            <td><?= h($vendorTemps->contact_mobile) ?></td>
            <td><?= h($vendorTemps->cin_no) ?></td>
            <td><?= h($vendorTemps->tan_no) ?></td>
            <td><?= h($vendorTemps->status) ?></td>
            <td><?= h($vendorTemps->valid_date) ?></td>
            <td><?= h($vendorTemps->buyer_id) ?></td>
            <td><?= h($vendorTemps->added_date) ?></td>
            <td><?= h($vendorTemps->updated_date) ?></td>
            <td class="actions">
              <?= $this->Html->link(__('View'), ['controller' => 'VendorTemps', 'action' => 'view', $vendorTemps->id], ['class'=>'btn btn-xs btn-outline-primary']) ?>
              <?= $this->Html->link(__('Edit'), ['controller' => 'VendorTemps', 'action' => 'edit', $vendorTemps->id], ['class'=>'btn btn-xs btn-outline-primary']) ?>
              <?= $this->Form->postLink(__('Delete'), ['controller' => 'VendorTemps', 'action' => 'delete', $vendorTemps->id], ['class'=>'btn btn-xs btn-outline-danger', 'confirm' => __('Are you sure you want to delete # {0}?', $vendorTemps->id)]) ?>
            </td>
        </tr>
        <?php endforeach; ?>
      <?php } ?>
    </table>
  </div>
</div>

