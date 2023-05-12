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
<div class="add-vendor">
    
<div class="row">
    <div class="col-12">
        <div class="card m-2">
            <?= $this->Form->create($vendorTemp) ?>
            <div class="card-body fm">
                <div class="row">
                <div class="col-sm-12 col-lg-3 mt-2 col-md-6">
                        <?php echo $this->Form->control('name', array('class' => 'form-control rounded-0','placeholder'=>'please enter name','div' => 'form-group'));?>
                    </div>
                    <div class="col-sm-12 col-lg-3 mt-2 col-md-6">
                        <?php echo $this->Form->control('mobile', array('class' => 'form-control rounded-0','placeholder'=>'please enter mobile number','div' => 'form-group'));?>
                    </div>
                    <div class="col-sm-12 col-lg-3 mt-2 col-md-6">
                        <?php echo $this->Form->control('email', array('class' => 'form-control rounded-0','placeholder'=>'please enter email id','div' => 'form-group'));?>
                    </div>
                    <div class="col-sm-12 col-lg-3 mt-2 col-md-6">
                        <?php echo $this->Form->control('payment_term', array('class' => 'form-control rounded-0','placeholder'=>'please enter payment term','div' => 'form-group'));?>
                    </div>
                    <div class="col-sm-12 col-lg-4 mt-2 col-md-4">
                        <?php echo $this->Form->control('purchasing_organization_id', array('class' => 'custom-select rounded-0','div' => 'form-group'));?>
                    </div>
                    <div class="col-sm-12 col-lg-4 mt-2 col-md-4">
                        <?php echo $this->Form->control('account_group_id', array('class' => 'custom-select rounded-0','div' => 'form-group'));?>
                    </div>
                    <div class="col-sm-12 col-lg-4 mt-2 col-md-4">
                        <?php echo $this->Form->control('schema_group_id', array('class' => 'custom-select rounded-0','div' => 'form-group'));?>
                    </div>
                    
                    
                    <div class="col-sm-12 col-lg-12 col-md-12 mt-4">
                        <?= $this->Form->button(__('Submit'), ['class' => 'btn btn-custom mb-0']) ?>
                    </div>
                </div>
                
                <?= $this->Form->end() ?>
            </div>
        </div>
    </div>
</div>
</div>