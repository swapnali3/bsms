<?php

/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\VendorTemp $vendorTemp
 */
switch ($vendorTemp->status) {
    case 0:
        $status = '<span class="">Sent to Vendor</span>';
        break;
    case 1:
        $status = '<span class="">Pending for approval</span>';
        break;
    case 2:
        $status = '<span class="">Sent to SAP</span>';
        break;
    case 3:
        $status = '<span class="">Approved</span>';
        break;
    case 4:
        $status = '<span class="">Rejected</span>';
        break;
}

?>

<?= $this->Html->css('custom') ?>
<?= $this->Html->css('vendortemps_view') ?>


<div class="row">
    <div class="col-sm-8 col-md-8 col-lg-8">

        <div class="card">
            <div class="card-body">
                <div class="row ml-2">
                    <div class="col-sm-12 col-md-12 col-lg-12 text-info mb-3" style="text-transform: uppercase;">
                        <h4>
                            <?= h($vendorTemp->name) ?>
                        </h4>
                        <hr>
                    </div>

                    <div class="col-sm-12 col-md-6 col-lg-6">
                        <h5 class="text-info">Basic Details</h5>
                        <table>
                            <tr>
                                <th>Email Id</th>
                                <td>: &nbsp;
                                    <?= h($vendorTemp->email) ?>
                                </td>
                            </tr>
                            <tr>
                                <th>Mobile</th>
                                <td>: &nbsp;
                                    <?= h($vendorTemp->mobile) ?>
                                </td>
                            </tr>
                            <tr>
                                <th>Address 1</th>
                                <td>: &nbsp;
                                    <?= h($vendorTemp->address) ?>
                                </td>
                            </tr>
                            <tr>
                                <th>Address 2</th>
                                <td>: &nbsp;
                                    <?= h($vendorTemp->address_2) ?>
                                </td>
                            </tr>
                            <tr>
                                <th>City</th>
                                <td>: &nbsp;
                                    <?= h($vendorTemp->city) ?>
                                </td>
                            </tr>
                            <tr>
                                <th>Pincode</th>
                                <td>: &nbsp;
                                    <?= h($vendorTemp->pincode) ?>
                                </td>
                            </tr>
                            <tr>
                                <th>State</th>
                                <td>: &nbsp;
                                    <?= h($vendorTemp->email) ?>
                                </td>
                            </tr>
                            <tr>
                                <th>Country</th>
                                <td>: &nbsp;
                                    <?= h($vendorTemp->country) ?>
                                </td>
                            </tr>
                        </table>
                    </div>
                    <div class="col-sm-12 col-md-6 col-lg-6">
                        <h5 class="text-info">Contact Person</h5>
                        <table>
                            <tr>
                                <th>Name</th>
                                <td>: &nbsp;
                                    <?= h($vendorTemp->contact_person) ?>
                                </td>
                            </tr>
                            <tr>
                                <th>Email Id</th>
                                <td>: &nbsp;
                                    <?= h($vendorTemp->contact_email) ?>
                                </td>
                            </tr>
                            <tr>
                                <th>Mobile</th>
                                <td>: &nbsp;
                                    <?= h($vendorTemp->contact_mobile) ?>
                                </td>
                            </tr>
                            <tr>
                                <th>Department</th>
                                <td>: &nbsp;
                                    <?= h($vendorTemp->contact_department) ?>
                                </td>
                            </tr>
                            <tr>
                                <th>Designation</th>
                                <td>: &nbsp;
                                    <?= h($vendorTemp->contact_designation) ?>
                                </td>
                            </tr>
                        </table>
                    </div>
                    <div class="col-sm-12 col-md-12 col-lg-12">
                        <hr>
                    </div>
                    <div class="col-sm-12 col-md-6 col-lg-6">
                        <h5 class="text-info">Other Details</h5>
                        <table>
                            <tr>
                                <th>Purchasing Organization</th>
                                <td>: &nbsp;
                                    <?= $vendorTemp->has('purchasing_organization') ? $vendorTemp->purchasing_organization->name : '' ?>
                                </td>
                            </tr>
                            <tr>
                                <th>Schema Group</th>
                                <td>: &nbsp;
                                    <?= $vendorTemp->has('schema_group') ? $vendorTemp->schema_group->name : '' ?>
                                </td>
                            </tr>
                            <tr>
                                <th>Order Currency</th>
                                <td>: &nbsp;
                                    <?= h($vendorTemp->order_currency) ?>
                                </td>
                            </tr>
                            <tr>
                                <th>Account Group</th>
                                <td>: &nbsp;
                                    <?= $vendorTemp->has('account_group') ? $vendorTemp->account_group->name : '' ?>
                                </td>
                            </tr>
                            <tr>
                                <th>Payment Term</th>
                                <td>: &nbsp;
                                    <?= h($vendorTemp->payment_term) ?>
                                </td>
                            </tr>
                            <tr>
                                <th>SAP Vendor Code</th>
                                <td>: &nbsp;
                                    <?= !empty($vendorTemp->sap_vendor_code) ? $vendorTemp->sap_vendor_code : '' ?>
                                </td>
                            </tr>
                        </table>
                    </div>
                    <div class="col-sm-12 col-md-6 col-lg-6">
                        <br>
                        <table class="mt-2">
                            <tr>
                                <th>Pan No</th>
                                <td>: &nbsp;
                                    <?= h($vendorTemp->pan_no) ?>
                                </td>
                            </tr>
                            <tr>
                                <th>CIN No</th>
                                <td>: &nbsp;
                                    <?= h($vendorTemp->cin_no) ?>
                                </td>
                            </tr>
                            <tr>
                                <th>GST No</th>
                                <td>: &nbsp;
                                    <?= h($vendorTemp->gst_no) ?>
                                </td>
                            </tr>
                            <tr>
                                <th>TAN No</th>
                                <td>: &nbsp;
                                    <?= h($vendorTemp->tan_no) ?>
                                </td>
                            </tr>
                            <tr>
                                <th>Status</th>
                                <td>:&nbsp;<?= $status ?></td>
                            </tr>
                        </table>
                    </div>


                </div>
            </div>
        </div>
    </div>
    <div class="col-sm-4 col-md-4 col-lg-4">
        <div class="row">
            <div class="col-sm-12 col-md-12 col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <div class="card-header" style="font-variant-caps: all-small-caps;">
                            <h5 class="text-info">Vendor KYC Documents</h5>
                        </div>
                        <div class="card-body p-1">
                            <?php if ($vendorTemp->gst_file) : ?>
                            <h5 class="mb-1">
                                <?= $this->Html->link('<i class="far fa-file-archive fa-lg"></i>&nbsp;GST NO', '/' . $vendorTemp->gst_file, ['escape' => false, 'class' => 'btn btn-block mb-0 text-info text-left p-2', 'target' => '_blank']); ?>
                            </h5>
                            <?php endif; ?>

                            <?php if ($vendorTemp->pan_file) : ?>
                            <h5 class="mb-1">
                                <?= $this->Html->link('<i class="far fa-file-archive fa-lg"></i>&nbsp;PAN NO', '/' . $vendorTemp->pan_file, ['escape' => false, 'class' => 'btn mb-0 btn-block text-info text-left p-2', 'target' => '_blank']); ?>
                            </h5>
                            <?php endif ?>

                            <?php if ($vendorTemp->pan_file) : ?>
                            <h5 class="mb-1">
                                <?= $this->Html->link('<i class="far fa-file-archive fa-lg"></i>&nbsp;Bank Documents', '/' . $vendorTemp->bank_file, ['escape' => false, 'class' => 'btn mb-0 btn-block text-info text-left p-2', 'target' => '_blank']); ?>
                            </h5>
                            <?php endif ?>
                        </div>
                    </div>
                </div>
            </div>
        <?php if (isset($vendorTempView)) :
                
         if ($vendorTempView[0]->update_flag == $vendorTemp->id) : ?>
            <div class="col-sm-12 col-md-12 col-lg-12 ">
                <?= $this->Form->create(null, ['id' => $vendorTempView[0]->id,  'url' => ['controller' => 'VendorTemps', 'action' => 'update']]) ?>
                <?= $this->Form->hidden('id', ['value' => $vendorTempView[0]->id]) ?>
                <div class="card">
                    <div class="card-body">
                        <table>
                        <h5 class="text-info">Vendor Update Details</h5>
                            <tr>
                                <?php if ($vendorTempView[0]->name != $vendorTemp->name) : ?>
                                <th>Name</th>
                                <td>: &nbsp;
                                    <?= h($vendorTempView[0]->name) ?>
                                </td>
                                <?php endif ?>
                            </tr>
                            <tr>
                                <?php if ($vendorTempView[0]->address != $vendorTempView[0]->address) : ?>
                                <th>Address 1</th>
                                <td>: &nbsp;
                                    <?= h($vendorTempView[0]->address) ?>
                                </td>
                                <?php endif ?>
                            </tr>
                            <tr>
                                <?php if ($vendorTempView[0]->address_2 != $vendorTempView[0]->address_2) : ?>
                                <th>Address 2</th>
                                <td>: &nbsp;
                                    <?= h($vendorTempView[0]->address_2) ?>
                                </td>
                                <?php endif ?>
                            </tr>
                            <tr>
                                <?php if ($vendorTempView[0]->city != $vendorTempView[0]->city) : ?>
                                <th>City</th>
                                <td>: &nbsp;
                                    <?= h($vendorTempView[0]->city) ?>
                                </td>
                                <?php endif ?>
                            </tr>
                            <tr>
                                <?php if ($vendorTempView[0]->Pincode != $vendorTempView[0]->Pincode) : ?>
                                <th>Pincode</th>
                                <td>: &nbsp;
                                    <?= h($vendorTempView[0]->Pincode) ?>
                                </td>
                                <?php endif ?>
                            </tr>
                            <tr>
                                <?php if ($vendorTempView[0]->state != $vendorTempView[0]->state) : ?>
                                <th>State</th>
                                <td>: &nbsp;
                                    <?= h($vendorTempView[0]->state) ?>
                                </td>
                                <?php endif ?>
                            </tr>
                            <tr>
                                <?php if ($vendorTempView[0]->country != $vendorTempView[0]->country) : ?>
                                <th>Country</th>
                                <td>: &nbsp;
                                    <?= h($vendorTempView[0]->country) ?>
                                </td>
                                <?php endif ?>
                            </tr>
                           
                            <tr>
                                <?php if ($vendorTempView[0]->contact_person != $vendorTempView[0]->contactperson) : ?>
                                <th>contact person Name</th>
                                <td>: &nbsp;
                                    <?= h($vendorTempView[0]->contact_person) ?>
                                </td>
                                <?php endif ?>
                            </tr>
                            <tr>
                                <?php if ($vendorTempView[0]->contact_email != $vendorTempView[0]->contactemail) : ?>
                                <th>contact Email</th>
                                <td>: &nbsp;
                                    <?= h($vendorTempView[0]->contact_email) ?>
                                </td>
                                <?php endif ?>
                            </tr>
                            <tr>
                                <?php if ($vendorTempView[0]->contact_mobile != $vendorTempView[0]->contact_mobile) : ?>
                                <th>contact mobile</th>
                                <td>: &nbsp;
                                    <?= h($vendorTempView[0]->contact_mobile) ?>
                                </td>
                                <?php endif ?>
                            </tr>
                            <tr>
                                <?php if ($vendorTempView[0]->contact_department != $vendorTempView[0]->contact_department) : ?>
                                <th>contact department</th>
                                <td>: &nbsp;
                                    <?= h($vendorTempView[0]->contact_department) ?>
                                </td>
                                <?php endif ?>
                            </tr>
                            <tr>
                                <?php if ($vendorTempView[0]->contact_designation != $vendorTempView[0]->contact_designation) : ?>
                                <th>contact Designation</th>
                                <td>: &nbsp;
                                    <?= h($vendorTempView[0]->contact_designation) ?>
                                </td>
                                <?php endif ?>
                            </tr>
                        </table>
                    </div>
                    <div class="card-footer">
                        <?= $this->Form->button(__('Submit'), ['class' => 'btn btn-custom mb-0']) ?>
                    </div>
                </div>
                <?= $this->Form->end() ?>
            </div>
            <?php endif; ?>
            <?php endif; ?>
        </div>
    </div>
</div>


<?php if ($vendorTemp->status == 1) : ?>
<div class="card-footer">
    <div class="row">
        <div class="col-1">
            <button type="button" class="btn btn-block p-2" style="border:1px solid #28a745" data-toggle="modal"
                data-target="#modal-sm">
                <i class="far fa-check-circle"></i> &nbsp; Approve
            </button>
        </div>
        <div class="col-1">
            <a href="#" class="btn btn-block reject  p-2" style="border:1px solid red" data-toggle="modal"
                data-target="#remarkModal"><i class="far fa-times-circle"></i> &nbsp; Reject</a>
        </div>
    </div>
</div>
<div class="modal fade" id="modal-sm" style="display: none;" aria-hidden="true">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-body text-center">
                <h6>Are you sure you want to approve?</h6>
            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn" style="border:1px solid #6610f2" data-dismiss="modal">Cancel</button>
                <?= $this->Html->link(__('Ok'), ['action' => 'approve-vendor', $vendorTemp->id, 'app'], ['class' => 'btn', 'style' => 'border:1px solid #28a745']) ?>
            </div>
        </div>
    </div>
</div>
<?php endif; ?>
</div>

<div class="modal fade" id="remarkModal" tabindex="-1" role="dialog" aria-labelledby="remarkModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">

        <div class="modal-content">
            <?= $this->Form->create(null, ['id' => 'rejectRemarks', 'class' => ['mb-0'], 'url' => ['action' => 'approve-vendor', $vendorTemp->id, 'rej']]) ?>
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Rejection Reason</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <?php
                echo $this->Form->control('remarks', ['label' => false, 'type' => 'textarea', 'rows' => '3', 'class' => 'form-control rounded-0', 'div' => 'form-group']); ?>
            </div>
            <div id="error_msg"></div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn" style="border:1px solid #6610f2" data-dismiss="modal">Cancel</button>
                <button type="submit" class="btn" style="border:1px solid red">Reject</button>
            </div>
            </form>
        </div>
    </div>
</div>

<?= $this->Html->script('vendortemps_view') ?>