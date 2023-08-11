<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\VendorFacility $vendorFacility
 * @var \Cake\Collection\CollectionInterface|string[] $vendorTemps
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('List Vendor Facilities'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="vendorFacilities form content">
            <?= $this->Form->create($vendorFacility) ?>
            <fieldset>
                <legend><?= __('Add Vendor Facility') ?></legend>
                <?php
                    echo $this->Form->control('vendor_temp_id', ['options' => $vendorTemps, 'empty' => true]);
                    echo $this->Form->control('lab_facility');
                    echo $this->Form->control('lab_facility_file');
                    echo $this->Form->control('isi_registration');
                    echo $this->Form->control('isi_registration_file');
                    echo $this->Form->control('test_facility');
                    echo $this->Form->control('test_facility_file');
                    echo $this->Form->control('sales_services');
                    echo $this->Form->control('sales_services_file');
                    echo $this->Form->control('quality_control');
                    echo $this->Form->control('quality_control_file');
                    echo $this->Form->control('added_date', ['empty' => true]);
                    echo $this->Form->control('updated_date', ['empty' => true]);
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
