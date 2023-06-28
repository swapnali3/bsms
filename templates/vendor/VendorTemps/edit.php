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
            <div class="card-body">
                <div class="row">
                    <div class="col-sm-4 col-md-4 col-lg-4">
                        <?php echo $this->Form->control('purchasing_organization_id', ['options' => $purchasingOrganizations, 'class'=> 'form-control mb-3']);?>
                        <?php echo $this->Form->control('name', ['class'=>'form-control mb-3']); ?>
                        <?php echo $this->Form->control('pincode', ['class'=>'form-control mb-3']); ?>
                        <?php echo $this->Form->control('country', ['class'=>'form-control mb-3']); ?>
                        <?php echo $this->Form->control('gst_no', ['class'=>'form-control mb-3']); ?>
                        <div class="input text"><label for="email-id">Contact Email</label><input type="text" name="contact_email_id" class="form-control mb-3" id="email-id" value="<?= h($vendorTemp->contact_email) ?>" maxlength="25"></div>
                        <?php echo $this->Form->control('tan_no', ['class'=>'form-control mb-3']); ?>
                    </div>
                    <div class="col-sm-4 col-md-4 col-lg-4">
                        <?php echo $this->Form->control('account_group_id', ['options' => $accountGroups, 'class'=> 'form-control mb-3']); ?>
                        <?php echo $this->Form->control('address', ['class'=>'form-control mb-3']); ?>
                        <?php echo $this->Form->control('payment_term', ['class'=>'form-control mb-3']); ?>
                        <?php echo $this->Form->control('pan_no', ['class'=>'form-control mb-3']); ?>
                        <?php echo $this->Form->control('contact_mobile', ['class'=>'form-control mb-3']); ?>
                        <?php echo $this->Form->control('status', ['class'=>'form-control mb-3']); ?>
                    </div>
                    <div class="col-sm-4 col-md-4 col-lg-4">
                        <?php echo $this->Form->control('schema_group_id', ['options' => $schemaGroups, 'class'=> 'form-control mb-3']); ?>
                        <?php echo $this->Form->control('city', ['class'=>'form-control mb-3']); ?>
                        <?php echo $this->Form->control('order_currency', ['class'=>'form-control mb-3']); ?>
                        <?php echo $this->Form->control('contact_person', ['class'=>'form-control mb-3']); ?>
                        <?php echo $this->Form->control('cin_no', ['class'=>'form-control mb-3']); ?>
                        <?php echo $this->Form->control('valid_date', ['class'=>'form-control mb-3']); ?>
                    </div>
                </div>
            </div>
            <div class="card-footer p-3">
                <?= $this->Form->button(__('Submit'), ['class' => 'btn btn-info']) ?>
            </div>
        </div>
        <?= $this->Form->end() ?>
    </div>
</div>