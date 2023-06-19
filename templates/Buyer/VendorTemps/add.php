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
<?= $this->Html->css('vendortemps_add') ?>
<div class="add-vendor">
    <div class="row">
        <div class="col-12">
            <div class="card m-2">
                <?= $this->Form->create($vendorTemp) ?>
                <div class="card-body fm">
                    <div class="row">
                        <div class="col-sm-12 col-md-4 col-lg-3 mb-3">
                            <?php echo $this->Form->control('name', array('class' => 'form-control','label'=>'Full Name','placeholder'=>'Please Enter Full Name','div' => 'form-group'));?>
                        </div>
                        <div class="col-sm-12 col-md-4 col-lg-3 mb-3">
                            <?php echo $this->Form->control('mobile', array('class' => 'form-control tel', 'minlength' => '10', 'maxlength' => '10','pattern' => '[9,8,7,6]{1}[0-9]{9}', 'type' => 'tel','placeholder'=>'please enter mobile number','div' => 'form-group'));?>
                        </div>
                        <div class="col-sm-12 col-md-4 col-lg-3 mb-3">
                            <?php echo $this->Form->control('email', array('class' => 'form-control rounded-0','placeholder'=>'please enter email id','div' => 'form-group'));?>
                        </div>
                        <div class="col-sm-12 col-md-4 col-lg-3 mb-3">
                            <?php echo $this->Form->control('payment_term', array('class' => 'form-control','options' => $payment_term,'div' => 'form-group', 'empty' => 'Please Select'));?>
                        </div>
                        <div class="col-sm-12 col-md-4 col-lg-3 mb-3">
                            <?php echo $this->Form->control('purchasing_organization_id', array('class' => 'form-control','div' => 'form-group'));?>
                        </div>
                        <div class="col-sm-12 col-md-4 col-lg-3 mb-3">
                            <?php echo $this->Form->control('account_group_id', array('class' => 'form-control','div' => 'form-group'));?>
                        </div>
                        <div class="col-sm-12 col-md-4 col-lg-3 mb-3">
                            <?php echo $this->Form->control('schema_group_id', array('class' => 'form-control','div' => 'form-group'));?>
                        </div>
                        <div class="col-sm-12 col-md-12 col-lg-12 mb-3">
                            <span class="errorm">
                                <?= $this->Flash->render() ?>
                            </span>
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
<?= $this->Html->script('vendortemps_add') ?>