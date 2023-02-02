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
    
    <div class="col-12">
        <div class="card">
            <?= $this->Form->create() ?>
            <div class="card-header">
            <h1 style="color:navy"><b><?= __('IMPORT SAP VENDOR') ?></b></h1>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-sm-12 col-md-3">
                        <?php echo $this->Form->control('sap_vendor_code', array('class' => 'form-control rounded-0','div' => 'form-group', 'required')); ?>
                    </div>
                    <div class="col-sm-12 col-md-3 mt-4 pt-2">
                        <?= $this->Form->button(__('Submit'), ['class' => 'btn btn-info']) ?>
                    </div>
                </div>
                <?= $this->Form->end() ?>
            </div>
        </div>
    </div>
</div>
