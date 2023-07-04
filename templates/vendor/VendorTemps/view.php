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
}

?>
<style>
    tr{
        border-bottom: 1px solid lightgrey;
    }
    td{
        padding: .2rem;
    }
</style>
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
        <?php if ($updatecount > 0) : ?>
        <div class="card">
            <div class="card-header">
                <b class="text-info">Pending Request for Updation</b>
            </div>
            <div class="card-body">
            <table style="width:100%">
                <tr>
                    <?php if ($vendorTempView[0]->name != $vendorTemp->name) : ?>
                    <th>Name</th>
                    <td>: &nbsp;
                        <?= h($vendorTempView[0]->name) ?>
                    </td>
                    <?php endif ?>
                </tr>
                <tr>
                    <?php if ($vendorTempView[0]->address != $vendorTemp->address) : ?>
                    <th>Address 1</th>
                    <td>: &nbsp;
                        <?= h($vendorTempView[0]->address) ?>
                    </td>
                    <?php endif ?>
                </tr>
                <tr>
                    <?php if ($vendorTempView[0]->address_2 != $vendorTemp->address_2) : ?>
                    <th>Address 2</th>
                    <td>: &nbsp;
                        <?= h($vendorTempView[0]->address_2) ?>
                    </td>
                    <?php endif ?>
                </tr>
                <tr>
                    <?php if ($vendorTempView[0]->city != $vendorTemp->city) : ?>
                    <th>City</th>
                    <td>: &nbsp;
                        <?= h($vendorTempView[0]->city) ?>
                    </td>
                    <?php endif ?>
                </tr>
                <tr>
                    <?php if ($vendorTempView[0]->pincode != $vendorTemp->pincode) : ?>
                    <th>Pincode</th>
                    <td>: &nbsp;
                        <?= h($vendorTempView[0]->pincode) ?>
                    </td>
                    <?php endif ?>
                </tr>
                <tr>
                    <?php if ($vendorTempView[0]->state != $vendorTemp->state) : ?>
                    <th>State</th>
                    <td>: &nbsp;
                        <?= h($vendorTempView[0]->state) ?>
                    </td>
                    <?php endif ?>
                </tr>
                <tr>
                    <?php if ($vendorTempView[0]->country != $vendorTemp->country) : ?>
                    <th>Country</th>
                    <td>: &nbsp;
                        <?= h($vendorTempView[0]->country) ?>
                    </td>
                    <?php endif ?>
                </tr>
                <tr>
                    <?php if ($vendorTempView[0]->contact_person != $vendorTemp->contact_person) : ?>
                    <th>contact person Name</th>
                    <td>: &nbsp;
                        <?= h($vendorTempView[0]->contact_person) ?>
                    </td>
                    <?php endif ?>
                </tr>
                <tr>
                    <?php if ($vendorTempView[0]->contact_email != $vendorTemp->contact_email) : ?>
                    <th>contact Email</th>
                    <td>: &nbsp;
                        <?= h($vendorTempView[0]->contact_email) ?>
                    </td>
                    <?php endif ?>
                </tr>
                <tr>
                    <?php if ($vendorTempView[0]->contact_mobile != $vendorTemp->contact_mobile) : ?>
                    <th>contact mobile</th>
                    <td>: &nbsp;
                        <?= h($vendorTempView[0]->contact_mobile) ?>
                    </td>
                    <?php endif ?>
                </tr>
                <tr>
                    <?php if ($vendorTempView[0]->contact_department != $vendorTemp->contact_department) : ?>
                    <th>contact department</th>
                    <td>: &nbsp;
                        <?= h($vendorTempView[0]->contact_department) ?>
                    </td>
                    <?php endif ?>
                </tr>
                <tr>
                    <?php if ($vendorTempView[0]->contact_designation != $vendorTemp->contact_designation) : ?>
                    <th>contact Designation</th>
                    <td>: &nbsp;
                        <?= h($vendorTempView[0]->contact_designation) ?>
                    </td>
                    <?php endif ?>
                </tr>
            </table>
            </div>
        </div>
        <?php endif ?>
    </div>
    <div class="col-sm-12 col-md-8 col-lg-8">
        <div class="card">
            <div class="card-header">
                <span class="text-info">USER DETAILS
                    <div class="float-right">
                        <?php if ($updatecount == 0) : ?>
                            <?= $this->Html->link(__('Edit'), ['action' => 'edit', $vendorTemp->id], ['class' => 'btn btn-info btn-sm mb-0']) ?>
                        <?php endif; ?>
                    </div>
                </span>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-6">
                        <div class="card">
                            <div class="card-header">
                                <h5>Basic Details</h5>
                            </div>
                            <div class="card-body py-0">
                                <table style="width: 100%;">
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
                                            <?= __('City') ?>
                                        </th>
                                        <td>
                                            <?= h($vendorTemp->city) ?>
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
                                </table>
                                <br>
                            </div>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="card" style="min-height: 94%;">
                            <div class="card-header">
                                <h5>KYC Details</h5>
                            </div>
                            <div class="card-body py-0">
                                <table style="width: 100%;">
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
                                            <?= __('Tan No') ?>
                                        </th>
                                        <td>
                                            <?= h($vendorTemp->tan_no) ?>
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
                                </table>
                                <br>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-6">
                        <div class="card" style="min-height: 94%;">
                            <div class="card-header">
                                <h5>Contact Person</h5>
                            </div>
                            <div class="card-body py-0">
                                <table style="width: 100%;">
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
                                </table>
                                <br>
                            </div>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="card" style="min-height: 94%;">
                            <div class="card-header">
                                <h5>Other Details</h5>
                            </div>
                            <div class="card-body py-0">
                                <table style="width: 100%;">

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
                                            <?= __('Account Group') ?>
                                        </th>
                                        <td>
                                            <?= $vendorTemp->has('account_group') ? $vendorTemp->account_group->name : '' ?>
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
                                            <?= __('Payment Term') ?>
                                        </th>
                                        <td>
                                            <?= (h($vendorTemp->payment_term)); ?>
                                        </td>
                                    </tr>
                                </table>
                                <br>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-footer p-3">
                <div class="row">
                    <div class="col-sm-12 col-md-6 col-lg-4">
                        <?php if ($vendorTemp->gst_file): ?>
                        <h5 class="mb-1">
                            <?= $this->Html->link('<i class="far fa-file-archive fa-lg"></i> &nbsp; GST NO', '/' . $vendorTemp->gst_file, ['escape' => false, 'class' => 'btn btn-block mb-0 text-info text-left p-2', 'target' => '_blank']); ?>
                        </h5>
                        <?php endif; ?>
                    </div>
                    <div class="col-sm-12 col-md-6 col-lg-4">
                        <?php if ($vendorTemp->pan_file): ?>
                        <h5 class="mb-1">
                            <?= $this->Html->link('<i class="far fa-file-archive fa-lg"></i> &nbsp; PAN NO', '/' . $vendorTemp->pan_file, ['escape' => false, 'class' => 'btn mb-0 btn-block text-info text-left p-2', 'target' => '_blank']); ?>
                        </h5>
                        <?php endif ?>
                    </div>
                    <div class="col-sm-12 col-md-6 col-lg-4">
                        <?php if ($vendorTemp->pan_file): ?>
                        <h5 class="mb-1">
                            <?= $this->Html->link('<i class="far fa-file-archive fa-lg"></i> &nbsp; Bank Documents', '/' . $vendorTemp->bank_file, ['escape' => false, 'class' => 'btn mb-0 btn-block text-info text-left p-2', 'target' => '_blank']); ?>
                        </h5>
                        <?php endif ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->Html->script('v_vendortemps_view') ?>