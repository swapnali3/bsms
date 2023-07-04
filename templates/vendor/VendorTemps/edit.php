<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\VendorTemp $vendorTemp
 * @var string[]|\Cake\Collection\CollectionInterface $purchasingOrganizations
 * @var string[]|\Cake\Collection\CollectionInterface $accountGroups
 * @var string[]|\Cake\Collection\CollectionInterface $schemaGroups
 */

 switch ($vendorTemp->status) {
    case 0:
        $status = '<span class="badge bg-warning">Sent to Vendor</span>';
        break;
    case 1:
        $status = '<span class="badge bg-info">Pending for approval</span>';
        break;
    case 2:
        $status = '<span class="badge bg-info">Sent to SAP</span>';
        break;
    case 3:
        $status = '<span class="badge bg-success">Approved</span>';
        break;
    case 4:
        $status = '<span class="badge bg-danger">Rejected</span>';
        break;
}

?>

<?= $this->Html->css('v_vendorCustom') ?>
<?= $this->Html->css('v_vendortemp_view') ?>
<div class="row">
    <div class="col-sm-12 col-md-3 col-lg-3">
        <div class="card">
            <div class="card-body">
                <div class="prof-img text-center"><i class="fas fa-user-circle"></i></div>
                <div class="desc">
                    <ul>
                        <li>
                            <p>Name : <b>
                                    <?= h($vendorTemp->name) ?>
                                </b></p>
                        </li>
                        <li>
                            <p>Mobile No :<b>
                                    <?= h($vendorTemp->mobile) ?>
                                </b></p>
                        </li>
                        <li>
                            <p>Email ID : <b>
                                    <?= h($vendorTemp->email) ?>
                                </b></p>
                        </li>
                        <li>
                            <p>SAP Vendor Code : <b>
                                    <?= !empty($vendorTemp->sap_vendor_code) ? $vendorTemp->sap_vendor_code : '' ?>
                                </b></p>
                        </li>
                        <li>
                            <p>Status : <b>
                                    <?= $status ?>
                                </b></p>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="col-sm-12 col-md-9 col-lg-9">
        <?= $this->Form->create($vendorTemp) ?>
        <div class="card">
            <div class="card-body pb-0">
                <div class="row">
                    <div class="col-sm-4 col-md-4 col-lg-4">
                        <?php echo $this->Form->control('name', ['class'=>'form-control mb-3']); ?>
                        <?php echo $this->Form->control('pincode', ['class'=>'form-control mb-3']); ?>
                        <?php echo $this->Form->control('contact_person', ['class'=>'form-control mb-3']); ?>
                        <?php echo $this->Form->control('contact_department', ['class'=>'form-control mb-3']); ?>
                    </div>
                    <div class="col-sm-4 col-md-4 col-lg-4">
                        <?php echo $this->Form->control('address', ['class'=>'form-control mb-3']); ?>
                        <?php echo $this->Form->control('country', ['class'=>'form-control mb-3']); ?>
                        <?php echo $this->Form->control('contact_email', ['class'=>'form-control mb-3']); ?>
                        <?php echo $this->Form->control('contact_designation', ['class'=>'form-control mb-3']); ?>
                    </div>
                    <div class="col-sm-4 col-md-4 col-lg-4">
                        <?php echo $this->Form->control('city', ['class'=>'form-control mb-3']); ?>
                        <?php echo $this->Form->control('order_currency', ['class'=>'form-control mb-3']); ?>
                        <?php echo $this->Form->control('contact_mobile', ['class'=>'form-control mb-3']); ?>
                    </div>
                </div>
            </div>
            <div class="card-footer p-3">
                <?= $this->Form->button(__('Submit'), ['class' => 'btn btn-info mb-0']) ?>
            </div>
        </div>
        <?= $this->Form->end() ?>
    </div>
</div>