<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\VendorIncometax $vendorIncometax
 * @var string[]|\Cake\Collection\CollectionInterface $vendorTemps
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $vendorIncometax->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $vendorIncometax->id), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('List Vendor Incometaxes'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="vendorIncometaxes form content">
            <?= $this->Form->create($vendorIncometax) ?>
            <fieldset>
                <legend><?= __('Edit Vendor Incometax') ?></legend>
                <?php
                    echo $this->Form->control('vendor_temp_id', ['options' => $vendorTemps]);
                    echo $this->Form->control('certificate_no');
                    echo $this->Form->control('certificate_date', ['empty' => true]);
                    echo $this->Form->control('certificate_file');
                    echo $this->Form->control('balance_sheet_file');
                    echo $this->Form->control('added_date', ['empty' => true]);
                    echo $this->Form->control('updated_date', ['empty' => true]);
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
