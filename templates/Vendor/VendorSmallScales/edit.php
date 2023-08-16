<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\VendorSmallScale $vendorSmallScale
 * @var string[]|\Cake\Collection\CollectionInterface $vendorTemps
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $vendorSmallScale->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $vendorSmallScale->id), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('List Vendor Small Scales'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="vendorSmallScales form content">
            <?= $this->Form->create($vendorSmallScale) ?>
            <fieldset>
                <legend><?= __('Edit Vendor Small Scale') ?></legend>
                <?php
                    echo $this->Form->control('vendor_temp_id', ['options' => $vendorTemps, 'empty' => true]);
                    echo $this->Form->control('year');
                    echo $this->Form->control('registration_no');
                    echo $this->Form->control('certificate_file');
                    echo $this->Form->control('added_date', ['empty' => true]);
                    echo $this->Form->control('updated_date', ['empty' => true]);
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
