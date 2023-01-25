<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\VendorTemp $vendorTemp
 * @var \Cake\Collection\CollectionInterface|string[] $purchasingOrganizations
 * @var \Cake\Collection\CollectionInterface|string[] $accountGroups
 * @var \Cake\Collection\CollectionInterface|string[] $schemaGroups
 */
?>
<div class="row">
    
    <div class="column-responsive">
        <div class="vendorTemps form content">
            <?= $this->Form->create() ?>
            <fieldset>
                <legend><?= __('Import SAP Vendor') ?></legend>
                <?php 

                echo $this->Form->control('sap_vendor_code', array('class' => 'form-control rounded-0','div' => 'form-group', 'required' => 'required'));
                ?>

            </fieldset>
            <?= $this->Form->button(__('Submit'), ['class' => 'btn btn-info']) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
