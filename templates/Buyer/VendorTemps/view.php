<?php

/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\VendorTemp $vendorTemp
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
    case 5:
        $status = '<span class="badge bg-info">Sap Import</span>';
        break;
}

?>
<?= $this->Html->css('custom') ?>
<?= $this->Html->css('vendortemps_view') ?>
<div class="row">
    <div class="col-12">
        <div class="vendorTemps view content card">
            <div class="card-header">
                <div class="d-flex justify-content-between">
                    <h5 class="align-self-center">
                        <b>
                            <?= h($vendorTemp->name) ?>
                        </b>
                    </h5>
                    <div class="">
                        <div class="text">
                            <?php if ($vendorTemp->status == 1) : ?>

                                <button type="button" class="btn btn-success btn-sm mb-0" data-toggle="modal" data-target="#modal-sm">
                                    Approve
                                </button>
                                <!-- modal -->
                                <div class="modal fade" id="modal-sm" style="display: none;" aria-hidden="true">
                                    <div class="modal-dialog modal-sm">
                                        <div class="modal-content">
                                            <div class="modal-body text-center">
                                                <h6>Are you sure you want to aprrove?</h6>
                                            </div>
                                            <div class="modal-footer justify-content-between p-1">
                                                <button type="button" class="btn btn-link" data-dismiss="modal">Cancel</button>
                                                <?= $this->Html->link(__('Ok'), ['action' => 'approve-vendor', $vendorTemp->id, 'app'], ['class' => 'btn btn-success btn-sm mb-0']) ?>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                                <!-- end modal -->

                                <?= $this->Html->link(__('Reject'), '#', ['class' => 'btn btn-danger reject mb-0 btn-sm', 'data-toggle' => "modal", 'data-target' => "#remarkModal"]) ?>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card-body">
                <div class="row">
                    <div class="col-6">
                        <div class="card">
                            <table class="table vendor-info mb-0">
                                <tr>
                                    <th>
                                        <?= __('SAP Vendor Code') ?>
                                    </th>
                                    <td>
                                        <?= !empty($vendorTemp->sap_vendor_code) ? $vendorTemp->sap_vendor_code : '' ?>
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        <?= __('Purchasing Organization') ?>
                                    </th>
                                    <td>
                                        <?= $vendorTemp->has('purchasing_organization') ? $vendorTemp->purchasing_organization->name : '' ?>
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        <?= __('Schema Group') ?>
                                    </th>
                                    <td>
                                        <?= $vendorTemp->has('schema_group') ? $vendorTemp->schema_group->name : '' ?>
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        <?= __('Address 1') ?>
                                    </th>
                                    <td>
                                        <?= h($vendorTemp->address) ?>
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        <?= __('Address 2') ?>
                                    </th>
                                    <td>
                                        <?= h($vendorTemp->address_2) ?>
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        <?= __('Pincode') ?>
                                    </th>
                                    <td>
                                        <?= h($vendorTemp->pincode) ?>
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        <?= __('Email Id') ?>
                                    </th>
                                    <td>
                                        <?= h($vendorTemp->email) ?>
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        <?= __('Order Currency') ?>
                                    </th>
                                    <td>
                                        <?= h($vendorTemp->order_currency) ?>
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        <?= __('Pan No') ?>
                                    </th>
                                    <td>
                                        <?= h($vendorTemp->pan_no) ?>
                                    </td>
                                </tr>

                                <tr>
                                    <th>
                                        <?= __('Cin No') ?>
                                    </th>
                                    <td>
                                        <?= h($vendorTemp->cin_no) ?>
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        <?= __('Added Date') ?>
                                    </th>
                                    <td>
                                        <?= h($vendorTemp->added_date) ?>
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        <?= __('Updated Date') ?>
                                    </th>
                                    <td>
                                        <?= h($vendorTemp->updated_date) ?>
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        <?= __('Status') ?>
                                    </th>
                                    <td>
                                        <?= $status ?>
                                    </td>
                                </tr>
                            </table>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <h6 class="text-info mb-2 pl-2">Uploaded Documents</h6>
                                <table class="table docs-list vendor-info table-bordered">
                                    <tbody>
                                        <?php if ($vendorTemp->gst_file) : ?>
                                            <tr>
                                                <td>GST NO</td>
                                                </td>
                                                <td>
                                                    <?= $this->Html->link('<i class="fas fa-download"></i>', '/' . $vendorTemp->gst_file, array('escape' => false)); ?>
                                                </td>
                                            </tr>
                                        <?php endif; ?>
                                        <?php if ($vendorTemp->pan_file) : ?>
                                            <tr>
                                                <td>Pan card</td>
                                                <td>
                                                    <?= $this->Html->link('<i class="fas fa-download"></i>', '/' . $vendorTemp->pan_file, array('escape' => false)); ?>
                                                </td>
                                            </tr>
                                        <?php endif ?>
                                        <?php if ($vendorTemp->bank_file) : ?>
                                            <tr>
                                                <td>Bank Documents</td>
                                                <td>
                                                    <?= $this->Html->link('<i class="fas fa-download"></i>', '/' . $vendorTemp->bank_file, array('escape' => false)); ?>
                                                </td>
                                            </tr>
                                        <?php endif; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="card">
                            <table class="table vendor-info mb-0">
                                <tr>
                                    <th>
                                        <?= __('Account Group') ?>
                                    </th>
                                    <td>
                                        <?= $vendorTemp->has('account_group') ? $vendorTemp->account_group->name : '' ?>
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        <?= __('Name') ?>
                                    </th>
                                    <td>
                                        <?= h($vendorTemp->name) ?>
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        <?= __('City') ?>
                                    </th>
                                    <td>
                                        <?= h($vendorTemp->city) ?>
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        <?= __('Mobile') ?>
                                    </th>
                                    <td>
                                        <?= h($vendorTemp->mobile) ?>
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        <?= __('State') ?>
                                    </th>
                                    <td>
                                        <?= h($vendorTemp->state) ?>
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        <?= __('Country') ?>
                                    </th>
                                    <td>
                                        <?= h($vendorTemp->country) ?>
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        <?= __('Gst No') ?>
                                    </th>
                                    <td>
                                        <?= h($vendorTemp->gst_no) ?>
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        <?= __('Contact Person') ?>
                                    </th>
                                    <td>
                                        <?= h($vendorTemp->contact_person) ?>
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        <?= __('Contact Email Id') ?>
                                    </th>
                                    <td>
                                        <?= h($vendorTemp->contact_email) ?>
                                    </td>
                                </tr>

                                <tr>
                                    <th>
                                        <?= __('Contact Mobile') ?>
                                    </th>
                                    <td>
                                        <?= h($vendorTemp->contact_mobile) ?>
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        <?= __('Contact Department') ?>
                                    </th>
                                    <td>
                                        <?= h($vendorTemp->contact_department) ?>
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        <?= __('Contact Designation') ?>
                                    </th>
                                    <td>
                                        <?= h($vendorTemp->contact_designation) ?>
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        <?= __('Tan No') ?>
                                    </th>
                                    <td>
                                        <?= h($vendorTemp->tan_no) ?>
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        <?= __('Payment Term') ?>
                                    </th>
                                    <td>
                                        <?= h($vendorTemp->payment_term) ?>
                                    </td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>

<!-- Modal Reject remarks-->
<div class="modal fade" id="remarkModal" tabindex="-1" role="dialog" aria-labelledby="remarkModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">

        <div class="modal-content">

            <?= $this->Form->create(null, ['id' => 'rejectRemarks', 'url' => ['action' => 'approve-vendor', $vendorTemp->id, 'rej']]) ?>
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Rejection Remark</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <?php
                echo $this->Form->control('remarks', ['label' => false, 'type' => 'textarea', 'class' => 'form-control rounded-0', 'div' => 'form-group']);

                ?>
            </div>
            <div id="error_msg"></div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Reject</button>
            </div>
            </form>
        </div>
    </div>
</div>
<?= $this->Html->script('vendortemps_view') ?>