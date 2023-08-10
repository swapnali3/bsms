<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\VendorOtherdetail $vendorOtherdetail
 * @var string[]|\Cake\Collection\CollectionInterface $vendorTemps
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $vendorOtherdetail->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $vendorOtherdetail->id), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('List Vendor Otherdetails'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="vendorOtherdetails form content">
            <?= $this->Form->create($vendorOtherdetail) ?>
            <fieldset>
                <legend><?= __('Edit Vendor Otherdetail') ?></legend>
                <?php
                    echo $this->Form->control('vendor_temp_id', ['options' => $vendorTemps]);
                    echo $this->Form->control('six_sigma');
                    echo $this->Form->control('six_sigma_file');
                    echo $this->Form->control('iso');
                    echo $this->Form->control('iso_file');
                    echo $this->Form->control('halal_file');
                    echo $this->Form->control('declaration_file');
                    echo $this->Form->control('fully_manufactured');
                    echo $this->Form->control('suppliers_name');
                    echo $this->Form->control('added_date');
                    echo $this->Form->control('updated_date');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
