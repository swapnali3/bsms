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
    padding:0rem;
    


}
.h1, .h2, .h3, .h4, .h5, .h6, h1, h2, h3, h4, h5, h6{
    margin-bottom:1px
}
.card-body{
    padding:0.5rem
}
    </style>

<div class="row">
    <div class="col-12">
        <div class="card">
            <?= $this->Form->create($vendorTemp) ?>
            <div class="card-header" 
">
                <!-- <h5 style="color: white;"><b><?= __('ADD VENDOR') ?></b></h5> -->
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-sm-12 col-lg-2 mt-4">
                        <?php echo $this->Form->control('purchasing_organization_id', array('class' => 'custom-select rounded-0','div' => 'form-group'));?>
                    </div>
                    <div class="col-sm-12 col-lg-2 mt-4">
                        <?php echo $this->Form->control('account_group_id', array('class' => 'custom-select rounded-0','div' => 'form-group'));?>
                    </div>
                    <div class="col-sm-12 col-lg-2 mt-4">
                        <?php echo $this->Form->control('schema_group_id', array('class' => 'custom-select rounded-0','div' => 'form-group'));?>
                    </div>
                    <div class="col-sm-12 col-lg-2 mt-4">
                        <?php echo $this->Form->control('name', array('class' => 'form-control rounded-0','div' => 'form-group'));?>
                    </div>
                    <div class="col-sm-12 col-lg-2 mt-4">
                        <?php echo $this->Form->control('mobile', array('class' => 'form-control rounded-0','div' => 'form-group'));?>
                    </div>
                    <div class="col-sm-12 col-lg-2 mt-4">
                        <?php echo $this->Form->control('email', array('class' => 'form-control rounded-0','div' => 'form-group'));?>
                    </div>
                    <div class="col-sm-12 col-lg-2 mt-4">
                        <?php echo $this->Form->control('payment_term', array('class' => 'form-control rounded-0','div' => 'form-group'));?>
                    </div>
                    <div class="col-sm-12 col-lg-2 mt-4" style="padding-top: 2.1rem;">
                        <?= $this->Form->button(__('Submit'), ['class' => 'btn btn-info']) ?>
                    </div>
                </div>
                
                <?= $this->Form->end() ?>
            </div>
        </div>
    </div>
</div>