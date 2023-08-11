<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\VendorCommencement $vendorCommencement
 * @var \Cake\Collection\CollectionInterface|string[] $vendorFactories
 * @var \Cake\Collection\CollectionInterface|string[] $vendorTemps
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('List Vendor Commencements'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="vendorCommencements form content">
            <?= $this->Form->create($vendorCommencement) ?>
            <fieldset>
                <legend><?= __('Add Vendor Commencement') ?></legend>
                <?php
                    echo $this->Form->control('vendor_factory_id', ['options' => $vendorFactories]);
                    echo $this->Form->control('vendor_temp_id', ['options' => $vendorTemps]);
                    echo $this->Form->control('commencement_year');
                    echo $this->Form->control('commencement_material');
                    echo $this->Form->control('first_year');
                    echo $this->Form->control('first_year_qty');
                    echo $this->Form->control('second_year');
                    echo $this->Form->control('second_year_qty');
                    echo $this->Form->control('third_year');
                    echo $this->Form->control('third_year_qty');
                    echo $this->Form->control('added_date', ['empty' => true]);
                    echo $this->Form->control('updated_date', ['empty' => true]);
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
