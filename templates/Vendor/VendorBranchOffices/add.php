<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\VendorBranchOffice $vendorBranchOffice
 * @var \Cake\Collection\CollectionInterface|string[] $vendorTemps
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('List Vendor Branch Offices'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="vendorBranchOffices form content">
            <?= $this->Form->create($vendorBranchOffice) ?>
            <fieldset>
                <legend><?= __('Add Vendor Branch Office') ?></legend>
                <?php
                    echo $this->Form->control('vendor_temp_id', ['options' => $vendorTemps, 'empty' => true]);
                    echo $this->Form->control('address');
                    echo $this->Form->control('address_2');
                    echo $this->Form->control('pincode');
                    echo $this->Form->control('city');
                    echo $this->Form->control('country');
                    echo $this->Form->control('state');
                    echo $this->Form->control('telephone');
                    echo $this->Form->control('registration_year');
                    echo $this->Form->control('registration_no');
                    echo $this->Form->control('registration_certificate');
                    echo $this->Form->control('added_date', ['empty' => true]);
                    echo $this->Form->control('updated_date', ['empty' => true]);
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
