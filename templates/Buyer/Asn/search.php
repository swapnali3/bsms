<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\VendorTemp $vendorTemp
 * @var \Cake\Collection\CollectionInterface|string[] $purchasingOrganizations
 * @var \Cake\Collection\CollectionInterface|string[] $accountGroups
 * @var \Cake\Collection\CollectionInterface|string[] $schemaGroups
 */
?>
<?= $this->Html->css('custom') ?>
<div class="row">
    
    <div class="col-12">
        <div class="card">
            <?= $this->Form->create() ?>
            <!-- <div class="card-header">
            <h5><b>ENTER ASN NO</b></h5>
            </div> -->
            <div class="card-body gate-entry">
                <div class="row">
                <!-- <div class="col-sm-12 col-md-6">
                <h5>Enter ASN No</h5>
                </div> -->
                    <div class="col-sm-12 col-md-6">
                    <h5 class="mb-2 gate-entry-haed font-weight-bold">ENTER ASN NO :</h5>
                        <?php echo $this->Form->control('asn_no', array('label' => false, 'class' => 'form-control rounded-0','div' => 'form-group', 'required')); ?>
                    </div>
                    <div class="col-sm-12 col-md-12 mt-4">
                        <?= $this->Form->button(__('Submit'), ['class' => 'btn btn-info']) ?>
                    </div>
                </div>
                <?= $this->Form->end() ?>
            </div>
        </div>
    </div>
</div>
