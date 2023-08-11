<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\VendorReputedCustomer $vendorReputedCustomer
 * @var \Cake\Collection\CollectionInterface|string[] $vendorTemps
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('List Vendor Reputed Customers'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="vendorReputedCustomers form content">
            <?= $this->Form->create($vendorReputedCustomer) ?>
            <fieldset>
                <legend><?= __('Add Vendor Reputed Customer') ?></legend>
                <?php
                    echo $this->Form->control('vendor_temp_id', ['options' => $vendorTemps]);
                    echo $this->Form->control('customer_name');
                    echo $this->Form->control('address');
                    echo $this->Form->control('pincode');
                    echo $this->Form->control('city');
                    echo $this->Form->control('country');
                    echo $this->Form->control('state');
                    echo $this->Form->control('telephone');
                    echo $this->Form->control('fax_no');
                    echo $this->Form->control('added_date', ['empty' => true]);
                    echo $this->Form->control('updated_date', ['empty' => true]);
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
