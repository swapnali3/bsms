<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\VendorFactory $vendorFactory
 * @var \Cake\Collection\CollectionInterface|string[] $vendorTemps
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('List Vendor Factories'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="vendorFactories form content">
            <?= $this->Form->create($vendorFactory) ?>
            <fieldset>
                <legend><?= __('Add Vendor Factory') ?></legend>
                <?php
                    echo $this->Form->control('vendor_temps_id', ['options' => $vendorTemps, 'empty' => true]);
                    echo $this->Form->control('factory_code');
                    echo $this->Form->control('address');
                    echo $this->Form->control('address_2');
                    echo $this->Form->control('pincode');
                    echo $this->Form->control('city');
                    echo $this->Form->control('state');
                    echo $this->Form->control('country');
                    echo $this->Form->control('installed_capacity');
                    echo $this->Form->control('installed_capacity_file');
                    echo $this->Form->control('machinery_available');
                    echo $this->Form->control('machinery_available_file');
                    echo $this->Form->control('power_available');
                    echo $this->Form->control('power_available_file');
                    echo $this->Form->control('raw_material');
                    echo $this->Form->control('raw_material_file');
                    echo $this->Form->control('added_date', ['empty' => true]);
                    echo $this->Form->control('updated_date', ['empty' => true]);
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
