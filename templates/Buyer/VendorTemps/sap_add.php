<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\VendorTemp $vendorTemp
 * @var \Cake\Collection\CollectionInterface|string[] $purchasingOrganizations
 * @var \Cake\Collection\CollectionInterface|string[] $accountGroups
 * @var \Cake\Collection\CollectionInterface|string[] $schemaGroups
 */
?>

<style>
.card-header{
    padding:0.3rem;
    
    background-color: #cbcbcb;
    padding-left:7.5px;
    margin-bottom:2px     

}
.card-body{
    padding:0.5rem
}
</Style>
<div class="row">
    
    <div class="col-12">
        <div class="card">
            <?= $this->Form->create() ?>
            <!-- <div class="card-header";
>
            <h5 style="color:white"><b><?= __('IMPORT SAP VENDOR') ?></b></h5>
            </div> -->
            <div class="card-body">
                <div class="row">
                    <div class="col-sm-12 col-md-3">
                        <?php echo $this->Form->control('sap_vendor_code', array('class' => 'form-control rounded-0','div' => 'form-group', 'required')); ?>
                    </div>
                    <div class="col-sm-12 col-md-1 mt-4 pt-3">
                        <?= $this->Form->button(__('Submit'), ['class' => 'btn btn-info']) ?>
                    </div>
                </div>
                <?= $this->Form->end() ?>
            </div>
        </div>
    </div>
</div>
