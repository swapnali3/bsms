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

<style>
    #custom-tabs-one-tab .nav-link {
        font-size: 0.9rem;
    }

    #custom-tabs-one-tab .nav-item {
        width: 100%;
        margin: 4px 0;
        padding: 4px;
    }
</style>


<div class="row">
    <?php if (isset($vendorTempView)) : ?>
        <div class="col-sm-4 col-md-4 col-lg-4">
            <div class="row">
                <div class="col-sm-12 col-md-12 col-lg-12 ">
                    <?= $this->Form->create(null, ['id' => $vendorTempView[0]->id,  'url' => '/buyer/vendor-temps/update/' . $vendorTemp->id]) ?>
                    <div class="card">
                        <div class="card-body">
                            <table>
                                <!-- <h5 class="text-info">Vendor Update Details</h5> -->
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
                        <div class="card-footer">
                            <?= $this->Form->button(__('Approve'), ['class' => 'btn btn-success mb-0', 'value' => '1', 'name' => 'status']) ?>
                            <?= $this->Form->button(__('Reject'), ['class' => 'btn btn-danger mb-0', 'value' => '0', 'name' => 'status']) ?>
                        </div>
                    </div>
                    <?= $this->Form->end() ?>
                </div>
            </div>
        </div>
        <div class="col-sm-8 col-md-8 col-lg-8">
    <?php else: ?>
        <div class="col-sm-12 col-md-12 col-lg-12">
    <?php endif; ?>
        <div class="card card-tabs">
            <div class="row">
                <div class="col-lg-2" style="border-right: 2px solid #dee2e6;">
                    <div class=" p-0">
                        <ul class="nav" id="custom-tabs-one-tab" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" id="custom-tabs-one-home-tab" data-toggle="pill" href="#custom-tabs-one-home" role="tab" aria-controls="custom-tabs-one-home" aria-selected="true">Basic Details</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="custom-tabs-one-profile-tab" data-toggle="pill" href="#custom-tabs-one-profile" role="tab" aria-controls="custom-tabs-one-profile" aria-selected="false">Branch Office</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="custom-tabs-one-settings-tab" data-toggle="pill" href="#custom-tabs-one-settings" role="tab" aria-controls="custom-tabs-one-settings" aria-selected="false">Production Facility</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="tab_contactperson" data-toggle="pill" href="#custom-tabs-four-messages" role="tab" aria-controls="custom-tabs-four-messages" aria-selected="false">Contact
                                    Person</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="tab_paymentdetails" data-toggle="pill" href="#custom-tabs-four-home" role="tab" aria-controls="custom-tabs-four-home" aria-selected="false">Payment
                                    Details</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="tab_certificate" data-toggle="pill" href="#custom-tabs-four-certificate" role="tab" aria-controls="custom-tabs-four-certificate" aria-selected="false">Certificate</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="tab_questionnaire " data-toggle="pill" href="#custom-tabs-four-questionnaire" role="tab" aria-controls="custom-tabs-four-questionnaire" aria-selected="false">Questionnaire</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="tab_customerAddress" data-toggle="pill" href="#custom-tabs-four-customerAddress" role="tab" aria-controls="custom-tabs-four-customerAddress" aria-selected="false">Reputed
                                    Customer</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-9 col-sm-9">
                    <div class="card-body">
                        <div class="tab-content" id="custom-tabs-one-tabContent">
                            <div class="tab-pane fade show active" id="custom-tabs-one-home" role="tabpanel" aria-labelledby="custom-tabs-one-home-tab">
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
                                        <th>Address</th>
                                        <td>: &nbsp;
                                            <?= h($vendorTemp->address) ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Address 1</th>
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
                                    <tr>
                                        <th>Telephone No</th>
                                        <td>: &nbsp;
                                            <?= h($vendorTemp->country) ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Fax No</th>
                                        <td>: &nbsp;
                                            <?= h($vendorTemp->country) ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Status</th>
                                        <td>:&nbsp;
                                            <?= $status ?>
                                        </td>
                                    </tr>
                                    <!-- <tr>
                                    <th>Comments</th>
                                    <td>: &nbsp;
                                        <?= h($vendorTemp->name) ?>
                                    </td>
                                </tr> -->
                                </table>
                                <div class="col-sm-12 col-md-12 col-lg-12">
                                    <hr />
                                </div>
                                <div class="card card-primary card-outline">
                                    <div class="card-header">
                                        Registered Office Details
                                    </div>
                                    <div class="card-body">
                                        <div class="row other_address">
                                            <table>
                                                <tr>
                                                    <th>Address</th>
                                                    <td>: &nbsp;
                                                        <?= h($vendorTemp->address) ?>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th>Address 1</th>
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
                                                <tr>
                                                    <th>Tel. No.</th>
                                                    <td>: &nbsp;

                                                    </td>
                                                </tr>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="custom-tabs-one-profile" role="tabpanel" aria-labelledby="custom-tabs-one-profile-tab">
                                <div class="card card-primary card-outline">
                                    <div class="card-header">
                                        Branch Office
                                    </div>
                                    <div class="card-body">
                                        <div class="row other_address">
                                            <table>
                                                <tr>
                                                    <th>Address</th>
                                                    <td>: &nbsp;
                                                        <?= h($vendorTemp->address) ?>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th>Address 1</th>
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
                                                <tr>
                                                    <th>Tel. No.</th>
                                                    <td>: &nbsp;

                                                    </td>
                                                </tr>
                                            </table>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-sm-12 col-md-12 col-lg-12">
                                    <hr />
                                </div>
                                <div class="card card-primary card-outline">
                                    <div class="card-header">
                                        Small Scale Industry
                                    </div>
                                    <div class="card-body">
                                        <div class="row other_address">
                                            <table>
                                                <tr>
                                                    <th>Year</th>
                                                    <td>: &nbsp;

                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th>Registration No</th>
                                                    <td>: &nbsp;

                                                    </td>
                                                    <td>
                                                        <h5 class="mb-1">
                                                            <?= $this->Html->link('<i class="far fa-file-archive fa-lg"></i>&nbsp;File', '/' . $vendorTemp->gst_file, ['escape' => false, 'class' => 'btn btn-block mb-0 text-info text-left p-2', 'target' => '_blank']); ?>
                                                        </h5>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th>Year Registration</th>
                                                    <td>: &nbsp;

                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th>Registration No</th>
                                                    <td>: &nbsp;

                                                    </td>
                                                    <td>
                                                        <h5 class="mb-1">
                                                            <?= $this->Html->link('<i class="far fa-file-archive fa-lg"></i>&nbsp;File', '/' . $vendorTemp->gst_file, ['escape' => false, 'class' => 'btn btn-block mb-0 text-info text-left p-2', 'target' => '_blank']); ?>
                                                        </h5>
                                                    </td>
                                                </tr>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="custom-tabs-one-settings" role="tabpanel" aria-labelledby="custom-tabs-one-settings-tab">
                                <table>
                                    <tr>
                                        <th>Laboratory Facility Available:</th>
                                        <td>: &nbsp;
                                        </td>
                                        <td>
                                            <h5 class="mb-1">
                                                <?= $this->Html->link('<i class="far fa-file-archive fa-lg"></i>&nbsp;File', '/' . $vendorTemp->gst_file, ['escape' => false, 'class' => 'btn btn-block mb-0 text-info text-left p-2', 'target' => '_blank']); ?>
                                            </h5>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Whether There is Any ISI Registration:</th>
                                        <td>: &nbsp;
                                        </td>
                                        <td>
                                            <h5 class="mb-1">
                                                <?= $this->Html->link('<i class="far fa-file-archive fa-lg"></i>&nbsp;File', '/' . $vendorTemp->gst_file, ['escape' => false, 'class' => 'btn btn-block mb-0 text-info text-left p-2', 'target' => '_blank']); ?>
                                            </h5>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Test Facilities Available</th>
                                        <td>: &nbsp;
                                        </td>
                                        <td>
                                            <h5 class="mb-1">
                                                <?= $this->Html->link('<i class="far fa-file-archive fa-lg"></i>&nbsp;File', '/' . $vendorTemp->gst_file, ['escape' => false, 'class' => 'btn btn-block mb-0 text-info text-left p-2', 'target' => '_blank']); ?>
                                            </h5>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Facilities for Effective After Sales Services</th>
                                        <td>: &nbsp;
                                        </td>
                                        <td>
                                            <h5 class="mb-1">
                                                <?= $this->Html->link('<i class="far fa-file-archive fa-lg"></i>&nbsp;File', '/' . $vendorTemp->gst_file, ['escape' => false, 'class' => 'btn btn-block mb-0 text-info text-left p-2', 'target' => '_blank']); ?>
                                            </h5>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Quality Control Procedure Adopted</th>
                                        <td>: &nbsp;
                                        </td>
                                        <td>
                                            <h5 class="mb-1">
                                                <?= $this->Html->link('<i class="far fa-file-archive fa-lg"></i>&nbsp;File', '/' . $vendorTemp->gst_file, ['escape' => false, 'class' => 'btn btn-block mb-0 text-info text-left p-2', 'target' => '_blank']); ?>
                                            </h5>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Annual Turn Over in Last 3 Years</th>
                                        <td>: &nbsp;
                                            <!-- <?= h($vendorTemp->contact_designation) ?> -->
                                        </td>
                                    </tr>
                                </table>
                                <div class="col-sm-12 col-md-12 col-lg-12">
                                    <hr>
                                </div>
                                <div class="card card-primary card-outline">
                                    <div class="card-header">
                                        Income Tax Cleaning Certificate
                                    </div>
                                    <div class="card-body">
                                        <div class="row">
                                            <table>
                                                <tr>
                                                    <th>Certificate No.</th>
                                                    <td>: &nbsp;
                                                        <!-- <?= h($vendorTemp->contact_designation) ?> -->
                                                    </td>
                                                    <td>
                                                        <h5 class="mb-1">
                                                            <?= $this->Html->link('<i class="far fa-file-archive fa-lg"></i>&nbsp;File', '/' . $vendorTemp->gst_file, ['escape' => false, 'class' => 'btn btn-block mb-0 text-info text-left p-2', 'target' => '_blank']); ?>
                                                        </h5>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th>Date</th>
                                                    <td>: &nbsp;
                                                        <!-- <?= h($vendorTemp->contact_designation) ?> -->
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th>Latest Copy of Balance Sheet</th>
                                                    <td>: &nbsp;
                                                    <td>
                                                        <h5 class="mb-1">
                                                            <?= $this->Html->link('<i class="far fa-file-archive fa-lg"></i>&nbsp;File', '/' . $vendorTemp->gst_file, ['escape' => false, 'class' => 'btn btn-block mb-0 text-info text-left p-2', 'target' => '_blank']); ?>
                                                        </h5>
                                                    </td>
                                                    </td>
                                                </tr>

                                            </table>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-12 col-md-12 col-lg-12">
                                    <hr />
                                </div>
                                <div class="card card-primary card-outline">
                                    <div class="card-header">
                                        Factory Address:
                                    </div>
                                    <div class="card-body">
                                        <div class="row">
                                            <table>
                                                <tr>
                                                    <th>Address</th>
                                                    <td>: &nbsp;
                                                        <?= h($vendorTemp->address) ?>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th>Address 1</th>
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
                                                <tr>
                                                    <th>Tel. No.</th>
                                                    <td>: &nbsp;

                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th>Installed Capacity</th>
                                                    <td>: &nbsp;
                                                        <?= h($vendorTemp->country) ?></td>
                                                    <td>
                                                        <h5 class="mb-1">
                                                            <?= $this->Html->link('<i class="far fa-file-archive fa-lg"></i>&nbsp;File', '/' . $vendorTemp->gst_file, ['escape' => false, 'class' => 'btn btn-block mb-0 text-info text-left p-2', 'target' => '_blank']); ?>
                                                        </h5>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th>Power Avialable</th>
                                                    <td>: &nbsp;
                                                        <?= h($vendorTemp->country) ?></td>
                                                    <td>
                                                        <h5 class="mb-1">
                                                            <?= $this->Html->link('<i class="far fa-file-archive fa-lg"></i>&nbsp;File', '/' . $vendorTemp->gst_file, ['escape' => false, 'class' => 'btn btn-block mb-0 text-info text-left p-2', 'target' => '_blank']); ?>
                                                        </h5>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th>Machinery Available</th>
                                                    <td>: &nbsp;
                                                        <?= h($vendorTemp->country) ?></td>
                                                    <td>
                                                        <h5 class="mb-1">
                                                            <?= $this->Html->link('<i class="far fa-file-archive fa-lg"></i>&nbsp;File', '/' . $vendorTemp->gst_file, ['escape' => false, 'class' => 'btn btn-block mb-0 text-info text-left p-2', 'target' => '_blank']); ?>
                                                        </h5>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th>Raw Material Avi. and Source</th>
                                                    <td>: &nbsp;
                                                        <?= h($vendorTemp->country) ?></td>
                                                    <td>
                                                        <h5 class="mb-1">
                                                            <?= $this->Html->link('<i class="far fa-file-archive fa-lg"></i>&nbsp;File', '/' . $vendorTemp->gst_file, ['escape' => false, 'class' => 'btn btn-block mb-0 text-info text-left p-2', 'target' => '_blank']); ?>
                                                        </h5>
                                                    </td>
                                                </tr>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-12 col-md-12 col-lg-12">
                                    <hr />
                                </div>
                                <div class="card card-primary card-outline">
                                    <div class="card-header">
                                        Actual production during preceding 3 years:
                                    </div>
                                    <div class="card-body">
                                        <div class="row">
                                            <table>
                                                <tr>
                                                    <th>Year Of Commencement Of Production</th>
                                                    <td>: &nbsp;
                                                        <?= h($vendorTemp->address) ?>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th>Material</th>
                                                    <td>: &nbsp;
                                                        <?= h($vendorTemp->address_2) ?>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th>3 years production</th>
                                                    <td>: &nbsp;
                                                        <?= h($vendorTemp->city) ?>
                                                    </td>
                                                </tr>
                                            </table>
                                        </div>
                                    </div>
                                </div>

                            </div>

                            <div class="tab-pane fade" id="custom-tabs-four-messages" role="tabpanel" aria-labelledby="tab_contactperson" style="background-color: white;">

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
                                <div class="col-sm-12 col-md-12 col-lg-12">
                                    <hr />
                                </div>
                                <div class="card card-primary card-outline">
                                    <div class="card-header">
                                        Address of Proprietor / Partner / Director
                                    </div>
                                    <div class="card-body">
                                        <div class="row">
                                            <table>
                                                <tr>
                                                    <th>Role</th>
                                                    <td>: &nbsp;
                                                        <?= h($vendorTemp->address) ?>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th>Address</th>
                                                    <td>: &nbsp;
                                                        <?= h($vendorTemp->address) ?>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th>Address 1</th>
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
                                                <tr>
                                                    <th>Tel. No.</th>
                                                    <td>: &nbsp;

                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th>Fax No.</th>
                                                    <td>: &nbsp;
                                                    </td>
                                                </tr>
                                            </table>
                                        </div>
                                        <hr class="other_address_0" style="border: revert;">
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="custom-tabs-four-home" role="tabpanel" aria-labelledby="tab_paymentdetails" style="background-color: white;">

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

                                    <tr>
                                        <th>Role</th>
                                        <td>: &nbsp;
                                            <?= h($vendorTemp->pincode) ?>
                                        </td>
                                    </tr>
                                </table>
                                <div class="col-sm-12 col-md-12 col-lg-12">
                                    <hr />
                                </div>
                                <div class="card card-primary card-outline">
                                    <div class="card-header">
                                        Payment Deatils
                                    </div>
                                    <div class="card-body">
                                        <div class="row">
                                            <table class="mt-2">
                                                <p class="mt-3"></p>
                                                <tr>
                                                    <th>Bank Name</th>
                                                    <td>: &nbsp;
                                                        <?= h($vendorTemp->pincode) ?>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th>Bank Branch</th>
                                                    <td>: &nbsp;
                                                        <?= h($vendorTemp->pincode) ?>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th>Bank Number</th>
                                                    <td>: &nbsp;
                                                        <?= h($vendorTemp->pincode) ?>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th>IFSC Code</th>
                                                    <td>: &nbsp;
                                                        <?= h($vendorTemp->pincode) ?>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th>Bank Key</th>
                                                    <td>: &nbsp;
                                                        <?= h($vendorTemp->pincode) ?>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th>Bank Country</th>
                                                    <td>: &nbsp;
                                                        <?= h($vendorTemp->pincode) ?>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th>City</th>
                                                    <td>: &nbsp;
                                                        <?= h($vendorTemp->pincode) ?>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th>SWIFT/BIC</th>
                                                    <td>: &nbsp;
                                                        <?= h($vendorTemp->pincode) ?>
                                                    </td>
                                                </tr>

                                                <tr>
                                                    <th>TAN No</th>
                                                    <td>: &nbsp;
                                                        <?= h($vendorTemp->pincode) ?>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th>CIN No</th>
                                                    <td>: &nbsp;
                                                        <?= h($vendorTemp->pincode) ?>
                                                    </td>
                                                </tr>

                                                <tr>
                                                    <th>Pan No</th>
                                                    <td>: &nbsp;
                                                        <?= h($vendorTemp->pan_no) ?>
                                                    </td>
                                                    <td>
                                                        <?php if ($vendorTemp->pan_file) : ?>
                                                            <h5 class="mb-1">
                                                                <?= $this->Html->link('<i class="far fa-file-archive fa-lg"></i>&nbsp;PAN NO', '/' . $vendorTemp->pan_file, ['escape' => false, 'class' => 'btn mb-0 btn-block text-info text-left p-2', 'target' => '_blank']); ?>
                                                            </h5>
                                                        <?php endif ?>
                                                    </td>
                                                </tr>

                                                <tr>
                                                    <th>GST No</th>
                                                    <td>: &nbsp;
                                                        <?= h($vendorTemp->gst_no) ?>
                                                    </td>
                                                    <td>
                                                        <?php if ($vendorTemp->gst_file) : ?>
                                                            <h5 class="mb-1">
                                                                <?= $this->Html->link('<i class="far fa-file-archive fa-lg"></i>&nbsp;GST NO', '/' . $vendorTemp->gst_file, ['escape' => false, 'class' => 'btn btn-block mb-0 text-info text-left p-2', 'target' => '_blank']); ?>
                                                            </h5>
                                                        <?php endif; ?>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th>Cancelled Cheque</th>
                                                    <td>: &nbsp;
                                                    </td>
                                                    <td>
                                                        <h5 class="mb-1">
                                                            <?= $this->Html->link('<i class="far fa-file-archive fa-lg"></i>&nbsp;Bank Documents', '/' . $vendorTemp->bank_file, ['escape' => false, 'class' => 'btn mb-0 btn-block text-info text-left p-2', 'target' => '_blank']); ?>
                                                        </h5>
                                                    </td>
                                                </tr>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="custom-tabs-four-certificate" role="tabpanel" aria-labelledby="tab_certificate" style="background-color: white;">

                                <table>
                                    <tr>
                                        <th>Registration No.</th>
                                        <td>: &nbsp;
                                            <?= h($vendorTemp->gst_no) ?>
                                        </td>
                                        <td>

                                            <h5 class="mb-1">
                                                <?= $this->Html->link('<i class="far fa-file-archive fa-lg"></i>&nbsp;Files', '/' . $vendorTemp, ['escape' => false, 'class' => 'btn mb-0 btn-block text-info text-left p-2', 'target' => '_blank']); ?>
                                            </h5>

                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Six Sigma</th>
                                        <td>: &nbsp;
                                            <?= h($vendorTemp->gst_no) ?>
                                        </td>
                                        <td>

                                            <h5 class="mb-1">
                                                <?= $this->Html->link('<i class="far fa-file-archive fa-lg"></i>&nbsp;Files', '/' . $vendorTemp, ['escape' => false, 'class' => 'btn mb-0 btn-block text-info text-left p-2', 'target' => '_blank']); ?>
                                            </h5>

                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Halal Registration/ Certificate File</th>
                                        <td>: &nbsp;
                                           <?= h($vendorTemp->gst_no) ?>
                                        </td>
                                        <td>
                                            <h5 class="mb-1">
                                                <?= $this->Html->link('<i class="far fa-file-archive fa-lg"></i>&nbsp;Files', '/' . $vendorTemp, ['escape' => false, 'class' => 'btn mb-0 btn-block text-info text-left p-2', 'target' => '_blank']); ?>
                                            </h5>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Declaration</th>
                                        <td>: &nbsp;
                                           <?= h($vendorTemp->gst_no) ?>
                                        </td>
                                        <td>
                                            <h5 class="mb-1">
                                                <?= $this->Html->link('<i class="far fa-file-archive fa-lg"></i>&nbsp;Files', '/' . $vendorTemp, ['escape' => false, 'class' => 'btn mb-0 btn-block text-info text-left p-2', 'target' => '_blank']); ?>
                                            </h5>
                                        </td>
                                    </tr>

                                </table>
                                <table>
                                    <tr>
                                        <th>Whether The Item is Completely Manufactured in Applicant's Factory?</th>
                                        <td>: &nbsp;
                                           <?= h($vendorTemp->gst_no) ?>
                                        </td>
                                    </tr>
                                </table>

                            </div>

                            <div class="tab-pane fade" id="custom-tabs-four-questionnaire" role="tabpanel" aria-labelledby="tab_questionnaire" style="background-color: white;">
                                <table>
                                    <tr>
                                        <th>Does the company have any policy wrt to child labour appoint in work place:
                                        </th>
                                        <td>: &nbsp;
                                           <?= h($vendorTemp->gst_no) ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Does your company follow any anit - corruption policy (zero corruption ) &
                                            has follow ethical code of code / corporate social responsibilities:-</th>
                                        <td>: &nbsp;
                                           <?= h($vendorTemp->gst_no) ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Does the company have policy &decimate between sexual worker wrt cast,
                                            gender,religion and harassment at work place:</th>
                                        <td>

                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Does the company use any product in the manufacturing of material through
                                            recycled
                                            material :-:</th>
                                        <td>

                                        </td>
                                    </tr>
                                </table>
                            </div>


                            <div class="tab-pane fade" id="custom-tabs-four-customerAddress" role="tabpanel" aria-labelledby="tab_customerAddress" style="background-color: white;">
                                <table>
                                    <!-- <p class="mt-3">Address of your reputed customers to whom reference can be </p> -->
                                    <tr>
                                        <th>Customer Name</th>
                                        <td>: &nbsp;
                                            <?= h($vendorTemp->address) ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Address</th>
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
                                    <tr>
                                        <th>Tel. No.</th>
                                        <td>: &nbsp;

                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Fax No.</th>
                                        <td>: &nbsp;
                                        </td>
                                    </tr>
                                </table>
                            </div>


                        </div>
                    </div>

                </div>
            </div>


            <?php if ($vendorTemp->status == 1) : ?>
                <div class="card-footer">
                    <div class="row">
                        <div class="col-sm-12 col-md-2">
                            <button type="button" class="btn btn-block p-2" style="border:1px solid #28a745" data-toggle="modal" data-target="#modal-sm">
                                <i class="far fa-check-circle"></i> &nbsp; Approve
                            </button>
                        </div>
                        <div class="col-sm-12 col-md-2">
                            <a href="#" class="btn btn-block reject  p-2" style="border:1px solid red" data-toggle="modal" data-target="#remarkModal"><i class="far fa-times-circle"></i> &nbsp; Reject</a>
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
            <?php elseif ($vendorTemp->status == 5) : ?>
                <div class="card-footer">
                    <div class="row">
                        <div class="col-sm-12 col-md-2">
                            <button type="button" data-id="<?= h($vendorTemp->id) ?>" class="btn btn-block p-2 notify" style="font-size: 0.8rem;border:1px solid #28a745">
                                <i class="far fa-check-circle"></i> Send Credentials
                            </button>
                        </div>
                    </div>
                </div>
            <?php endif; ?>
        </div>
    </div>



    <div class="modal fade" id="remarkModal" tabindex="-1" role="dialog" aria-labelledby="remarkModalLabel" aria-hidden="true">
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
        <div class="col-sm-8 col-md-8 col-lg-8">
    <?php else: ?>
        <div class="col-sm-12 col-md-12 col-lg-12">
    <?php endif; ?>
        <div class="card card-tabs">
            <div class="row">
                <div class="col-lg-2" style="border-right: 2px solid #dee2e6;">
                    <div class=" p-0">
                        <ul class="nav" id="custom-tabs-one-tab" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" id="custom-tabs-one-home-tab" data-toggle="pill" href="#custom-tabs-one-home" role="tab" aria-controls="custom-tabs-one-home" aria-selected="true">
                                    Personal Information
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="custom-tabs-one-profile-tab" data-toggle="pill" href="#custom-tabs-one-profile" role="tab" aria-controls="custom-tabs-one-profile" aria-selected="false">
                                    Branch Office
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="custom-tabs-one-settings-tab" data-toggle="pill" href="#custom-tabs-one-settings" role="tab" aria-controls="custom-tabs-one-settings" aria-selected="false">
                                    Production Facility
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="tab_contactperson" data-toggle="pill" href="#custom-tabs-four-messages" role="tab" aria-controls="custom-tabs-four-messages" aria-selected="false">
                                    Proprietor / Partner / Director
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="tab_paymentdetails" data-toggle="pill" href="#custom-tabs-four-home" role="tab" aria-controls="custom-tabs-four-home" aria-selected="false">
                                    Payment Details
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="tab_certificate" data-toggle="pill" href="#custom-tabs-four-certificate" role="tab" aria-controls="custom-tabs-four-certificate" aria-selected="false">
                                    Certificate
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="tab_questionnaire " data-toggle="pill" href="#custom-tabs-four-questionnaire" role="tab" aria-controls="custom-tabs-four-questionnaire" aria-selected="false">
                                    Questionnaire
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="tab_customerAddress" data-toggle="pill" href="#custom-tabs-four-customerAddress" role="tab" aria-controls="custom-tabs-four-customerAddress" aria-selected="false">
                                    Reputed Customer
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-9 col-sm-9">
                    <div class="card-body">
                        <div class="tab-content" id="custom-tabs-one-tabContent">
                            <div class="tab-pane fade show active" id="custom-tabs-one-home" role="tabpanel" aria-labelledby="custom-tabs-one-home-tab">
                                <div class="row">
                                    <div class="col-sm-12 col-md-4 col-lg-4">
                                    <div class="card">
                                            <div class="card-header">Primary Details</div>
                                            <div class="card-body p-0">
                                                <table class="table table-hover table-striped table-bordered">
                                                    <tr>
                                                        <td>Name</td>
                                                        <th>Jones Thayil</th>
                                                    </tr>
                                                    <tr>
                                                        <td>Mobile No</td>
                                                        <th>9082207560</th>
                                                    </tr>
                                                    <tr>
                                                        <td>Email ID</td>
                                                        <th>jonest@fts-pl.com</th>
                                                    </tr>
                                                    <tr>
                                                        <td>SAP Vendor Code</td>
                                                        <th>0000015483</th>
                                                    </tr>
                                                    <tr>
                                                        <td>Status</td>
                                                        <th>Approved</th>
                                                    </tr>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-md-4 col-lg-4">
                                        <div class="card">
                                            <div class="card-header">Contact Person</div>
                                            <div class="card-body p-0">
                                                <table class="table table-hover table-striped table-bordered">
                                                    <tr>
                                                        <td>Name</td>
                                                        <th></th>
                                                    </tr>
                                                    <tr>
                                                        <td>Email</td>
                                                        <th></th>
                                                    </tr>
                                                    <tr>
                                                        <td>Mobile</td>
                                                        <th></th>
                                                    </tr>
                                                    <tr>
                                                        <td>Department</td>
                                                        <th></th>
                                                    </tr>
                                                    <tr>
                                                        <td>Designation</td>
                                                        <th></th>
                                                    </tr>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-md-4 col-lg-4"></div>
                                    <div class="col-sm-12 col-md-4 col-lg-4">
                                        <div class="card">
                                            <div class="card-header">Address</div>
                                            <div class="card-body p-0">
                                                <table class="table table-hover table-striped table-bordered">
                                                    <tr>
                                                        <td>Address</td>
                                                        <th></th>
                                                    </tr>
                                                    <tr>
                                                        <td>Address 1</td>
                                                        <th></th>
                                                    </tr>
                                                    <tr>
                                                        <td>City</td>
                                                        <th></th>
                                                    </tr>
                                                    <tr>
                                                        <td>State</td>
                                                        <th></th>
                                                    </tr>
                                                    <tr>
                                                        <td>Country</td>
                                                        <th></th>
                                                    </tr>
                                                    <tr>
                                                        <td>Pincode</td>
                                                        <th></th>
                                                    </tr>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-md-4 col-lg-4">
                                        <div class="card">
                                            <div class="card-header">Permenant Address</div>
                                            <div class="card-body p-0">
                                                <table class="table table-hover table-striped table-bordered">
                                                    <tr>
                                                        <td>Address</td>
                                                        <th></th>
                                                    </tr>
                                                    <tr>
                                                        <td>Address 1</td>
                                                        <th></th>
                                                    </tr>
                                                    <tr>
                                                        <td>City</td>
                                                        <th></th>
                                                    </tr>
                                                    <tr>
                                                        <td>State</td>
                                                        <th></th>
                                                    </tr>
                                                    <tr>
                                                        <td>Country</td>
                                                        <th></th>
                                                    </tr>
                                                    <tr>
                                                        <td>Pincode</td>
                                                        <th></th>
                                                    </tr>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-md-4 col-lg-4">
                                        <div class="card">
                                            <div class="card-header">Other Details</div>
                                            <div class="card-body p-0">
                                                <table class="table table-hover table-striped table-bordered">
                                                    <tr>
                                                        <td>Company Code</td>
                                                        <th></th>
                                                    </tr>
                                                    <tr>
                                                        <td>Purchase Organisation</td>
                                                        <th></th>
                                                    </tr>
                                                    <tr>
                                                        <td>Account Group</td>
                                                        <th></th>
                                                    </tr>
                                                    <tr>
                                                        <td>Schema Group</td>
                                                        <th></th>
                                                    </tr>
                                                    <tr>
                                                        <td>Reconciliation Account</td>
                                                        <th></th>
                                                    </tr>
                                                    <tr>
                                                        <td>Payment Term</td>
                                                        <th></th>
                                                    </tr>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="custom-tabs-one-profile" role="tabpanel" aria-labelledby="custom-tabs-one-profile-tab">
                                <div class="row">
                                    <div class="col-sm-12 col-md-12 col-lg-12">
                                        <div class="row">
                                            <div class="col-sm-12 col-md-4 col-lg-4">
                                                <div class="card">
                                                    <div class="card-body p-0">
                                                        <table class="table table-hover table-striped">
                                                            <tr>
                                                                <td>Address</td>
                                                                <th></th>
                                                            </tr>
                                                            <tr>
                                                                <td>Address 1</td>
                                                                <th></th>
                                                            </tr>
                                                            <tr>
                                                                <td>City</td>
                                                                <th></th>
                                                            </tr>
                                                            <tr>
                                                                <td>State</td>
                                                                <th></th>
                                                            </tr>
                                                            <tr>
                                                                <td>Country</td>
                                                                <th></th>
                                                            </tr>
                                                            <tr>
                                                                <td>Pincode</td>
                                                                <th></th>
                                                            </tr>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-12 col-md-4 col-lg-4">
                                                <div class="card">
                                                    <div class="card-body p-0">
                                                        <table class="table table-hover table-striped">
                                                            <tr>
                                                                <td>Address</td>
                                                                <th></th>
                                                            </tr>
                                                            <tr>
                                                                <td>Address 1</td>
                                                                <th></th>
                                                            </tr>
                                                            <tr>
                                                                <td>City</td>
                                                                <th></th>
                                                            </tr>
                                                            <tr>
                                                                <td>State</td>
                                                                <th></th>
                                                            </tr>
                                                            <tr>
                                                                <td>Country</td>
                                                                <th></th>
                                                            </tr>
                                                            <tr>
                                                                <td>Pincode</td>
                                                                <th></th>
                                                            </tr>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-md-12 col-lg-12">
                                        <div class="card">
                                            <div class="card-header">
                                                Small Scale Industry
                                            </div>
                                            <div class="card-body">
                                                <table class="table table-hover table-striped">
                                                    <tr>
                                                        <td>Company Code</td>
                                                        <th></th>
                                                        <td>Purchase Organisation</td>
                                                        <th></th>
                                                        <td>Account Group</td>
                                                        <th></th>
                                                    </tr>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="custom-tabs-one-settings" role="tabpanel" aria-labelledby="custom-tabs-one-settings-tab">
                                <div class="row">
                                    <div class="col-sm-12 col-md-3 col-lg-3 mb-3">
                                        <a class="btn btn-block bg-gradient-cancel" href="">Laboratory Facility Document</a>
                                    </div>
                                    <div class="col-sm-12 col-md-3 col-lg-3 mb-3">
                                        <a class="btn btn-block bg-gradient-cancel" href="">ISI Registration Document</a>
                                    </div>
                                    <div class="col-sm-12 col-md-3 col-lg-3 mb-3">
                                        <a class="btn btn-block bg-gradient-cancel" href="">Test facility Document</a>
                                    </div>
                                    <div class="col-sm-12 col-md-3 col-lg-3 mb-3">
                                        <a class="btn btn-block bg-gradient-cancel" href="">Facilities for effective after sales services</a>
                                    </div>
                                    <div class="col-sm-12 col-md-3 col-lg-3 mb-3">
                                        <a class="btn btn-block bg-gradient-cancel" href="">Quality control procedure adopted</a>
                                    </div>
                                    <div class="col-sm-12 col-md-12 col-lg-12 mb-3">
                                        <div class="card">
                                            <div class="card-header">Annual turn over in last 3 years (In Rupee)</div>
                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="col-4">
                                                        <b>2022 - 23</b> &nbsp; - &nbsp; 500
                                                    </div>
                                                    <div class="col-4">
                                                        <b>2022 - 23</b> &nbsp; - &nbsp; 500
                                                    </div>
                                                    <div class="col-4">
                                                        <b>2022 - 23</b> &nbsp; - &nbsp; 500
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-md-12 col-lg-12 mb-3">
                                        <div class="card">
                                            <div class="card-header">
                                                Income Tax Cleaning Certificate
                                            </div>
                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="col-4">
                                                        Certificate No<br>
                                                        1321312313
                                                    </div>
                                                    <div class="col-4">
                                                        Certificate Date<br>
                                                        23/08/2022
                                                    </div>
                                                    <div class="col-4">
                                                        Certificate Document<br>
                                                        <a href="">Dharti Enterprise Cleaning Certificate.pdf</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-md-12 col-lg-12 mb-3">
                                        <div class="card">
                                            <div class="card-header">
                                                Factory Code : IN_97_ER_Unit1
                                            </div>
                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="col-8">
                                                        <table class="table table-hover table-striped">
                                                            <thead>
                                                                <tr>
                                                                    <th>Material</th>
                                                                    <th>Year Of Commencement Of Production</th>
                                                                    <th>2023-21</th>
                                                                    <th>2023-21</th>
                                                                    <th>2023-21</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <tr>
                                                                    <th>Material A</th>
                                                                    <td>2022</td>
                                                                    <td>200</td>
                                                                    <th>300</th>
                                                                    <th>400</th>
                                                                </tr>
                                                                <tr>
                                                                    <th>Material A</th>
                                                                    <td>2022</td>
                                                                    <td>200</td>
                                                                    <th>300</th>
                                                                    <th>400</th>
                                                                </tr>
                                                                <tr>
                                                                    <th>Material A</th>
                                                                    <td>2022</td>
                                                                    <td>200</td>
                                                                    <th>300</th>
                                                                    <th>400</th>
                                                                </tr>
                                                                <tr>
                                                                    <th>Material A</th>
                                                                    <td>2022</td>
                                                                    <td>200</td>
                                                                    <th>300</th>
                                                                    <th>400</th>
                                                                </tr>
                                                                
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                    <div class="col-4">
                                                        <div class="row">
                                                            <div class="col-12">
                                                                <table class="table table-hover table-striped">
                                                                    <tr>
                                                                        <td>Address</td>
                                                                        <th></th>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>Address 1</td>
                                                                        <th></th>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>City</td>
                                                                        <th></th>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>State</td>
                                                                        <th></th>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>Country</td>
                                                                        <th></th>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>Pincode</td>
                                                                        <th></th>
                                                                    </tr>
                                                                </table>
                                                            </div>
                                                            <div class="col-12">
                                                                <div class="row">
                                                                    <div class="col-6">
                                                                        <a class="btn btn-app btn-block">
                                                                            <b>Installed Capcity</b><br>
                                                                            5000
                                                                        </a>
                                                                    </div>
                                                                    <div class="col-6">
                                                                        <a class="btn btn-app btn-block">
                                                                            <b>Power Available</b><br>
                                                                            5000
                                                                          </a>
                                                                    </div>
                                                                    <div class="col-6">
                                                                        <a class="btn btn-app btn-block">
                                                                            <b>Raw Material Avi. and Source</b><br>
                                                                            5000
                                                                          </a>
                                                                    </div>
                                                                    <div class="col-6">
                                                                        <a class="btn btn-app btn-block">
                                                                            <b>Machinery Available</b><br>
                                                                            5000
                                                                          </a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="tab-pane fade" id="custom-tabs-four-messages" role="tabpanel" aria-labelledby="tab_contactperson" style="background-color: white;">
                                <div class="row">
                                    <div class="col-4">
                                        <div class="card">
                                            <div class="card-header">Partner : Jones Thayil</div>
                                            <div class="card-body p-0">
                                                <table class="table table-hover table-striped">
                                                    <tr>
                                                        <td>Address</td>
                                                        <th></th>
                                                    </tr>
                                                    <tr>
                                                        <td>Address 1</td>
                                                        <th></th>
                                                    </tr>
                                                    <tr>
                                                        <td>City</td>
                                                        <th></th>
                                                    </tr>
                                                    <tr>
                                                        <td>State</td>
                                                        <th></th>
                                                    </tr>
                                                    <tr>
                                                        <td>Country</td>
                                                        <th></th>
                                                    </tr>
                                                    <tr>
                                                        <td>Pincode</td>
                                                        <th></th>
                                                    </tr>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="tab-pane fade" id="custom-tabs-four-home" role="tabpanel" aria-labelledby="tab_paymentdetails" style="background-color: white;">
                                <div class="row">
                                    <div class="col-sm-12 col-md-12 col-lg-12">
                                        <div class="card">
                                            <div class="card-header">
                                                Bank Details
                                            </div>
                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="col-3">
                                                        <label for="">Bank name</label>
                                                        <span></span>
                                                    </div>
                                                    <div class="col-3">
                                                        <label for="">Bank Branch</label>
                                                        <span></span>
                                                    </div>
                                                    <div class="col-3">
                                                        <label for="">Bank number</label>
                                                        <span></span>
                                                    </div>
                                                    <div class="col-3">
                                                        <label for="">IFSC Code</label>
                                                        <span></span>
                                                    </div>
                                                    <div class="col-3">
                                                        <label for="">Bank Key</label>
                                                        <span></span>
                                                    </div>
                                                    <div class="col-3">
                                                        <label for="">Bank Country</label>
                                                        <span></span>
                                                    </div>
                                                    <div class="col-3">
                                                        <label for="">City</label>
                                                        <span></span>
                                                    </div>
                                                    <div class="col-3">
                                                        <label for="">Order Currency</label>
                                                        <span></span>
                                                    </div>
                                                    <div class="col-3">
                                                        <label for="">SWIFT/BIC</label>
                                                        <span></span>
                                                    </div>
                                                    <div class="col-3">
                                                        <label for="">TAN No</label>
                                                        <span></span>
                                                    </div>
                                                    <div class="col-3">
                                                        <label for="">CIN No.</label>
                                                        <span></span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-md-12 col-lg-12">
                                        <div class="card">
                                            <div class="card-header">
                                                Other Payment Details
                                            </div>
                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="col-4">
                                                        GST No
                                                        <span></span>
                                                    </div>
                                                    <div class="col-4">
                                                        PAN No
                                                        <span></span>
                                                    </div>
                                                    <div class="col-4">
                                                        Cancelled Cheque
                                                        <span></span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="tab-pane fade" id="custom-tabs-four-certificate" role="tabpanel" aria-labelledby="tab_certificate" style="background-color: white;">
                                <div class="card">
                                    <div class="card-body">                                                    
                                        <div class="row">
                                            <div class="col-4">
                                                Six Sigma : 
                                                <span></span>
                                            </div>
                                            <div class="col-4">
                                            ISO Registration / Certificate : 
                                                <span></span>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                                <div class="card">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-4">
                                            HALAL Registration / certificate:
                                                <span></span>
                                            </div>
                                            <div class="col-4">
                                            Declaration
                                            <span></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card">
                                    <div class="card-body">
                                    <div class="col-4">
                                            Other Quality Certification
                                            </div>
                                    </div>
                                </div>
                            </div>

                            <div class="tab-pane fade" id="custom-tabs-four-questionnaire" role="tabpanel" aria-labelledby="tab_questionnaire" style="background-color: white;">
                                <div class="card">
                                    <div class="card-header">
                                        <h5>Other information considered relevent to be furnished by supplier</h5>
                                    </div>
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-12 mb-4">
                                                <h5 class="text-info">Does the company have any policy wrt to child labour appoint in work place</h5>
                                                <p><i>Lorem ipsum dolor sit amet consectetur adipisicing elit. Maxime mollitia,
                                                    molestiae quas vel sint commodi repudiandae consequuntur voluptatum laborum
                                                    numquam blanditiis harum quisquam eius sed odit fugiat iusto fuga praesentium
                                                    optio, eaque rerum! Provident similique accusantium nemo autem.</i></p>
                                            </div>
                                            <div class="col-12 mb-4">
                                                <h5 class="text-info">Does your company follow any anit - corruption policy (zero corruption ) & has follow ethical code of code / corporate social responsibilities</h5>
                                                <p><i>Lorem ipsum dolor sit amet consectetur adipisicing elit. Maxime mollitia,
                                                    molestiae quas vel sint commodi repudiandae consequuntur voluptatum laborum
                                                    numquam blanditiis harum quisquam eius sed odit fugiat iusto fuga praesentium
                                                    optio, eaque rerum! Provident similique accusantium nemo autem.</i></p>
                                            </div>
                                            <div class="col-12 mb-4">
                                                <h5 class="text-info">Does the company have policy & decimate between sexual worker wrt cast, gender, religion and harassment at work place</h5>
                                                <p><i>Lorem ipsum dolor sit amet consectetur adipisicing elit. Maxime mollitia,
                                                    molestiae quas vel sint commodi repudiandae consequuntur voluptatum laborum
                                                    numquam blanditiis harum quisquam eius sed odit fugiat iusto fuga praesentium
                                                    optio, eaque rerum! Provident similique accusantium nemo autem.</i></p>
                                            </div>
                                            <div class="col-12">
                                                <h5 class="text-info">Does the company use any product in the manufacturing of material through recycled material</h5>
                                                <p><i>Lorem ipsum dolor sit amet consectetur adipisicing elit. Maxime mollitia,
                                                    molestiae quas vel sint commodi repudiandae consequuntur voluptatum laborum
                                                    numquam blanditiis harum quisquam eius sed odit fugiat iusto fuga praesentium
                                                    optio, eaque rerum! Provident similique accusantium nemo autem.</i></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="tab-pane fade" id="custom-tabs-four-customerAddress" role="tabpanel" aria-labelledby="tab_customerAddress" style="background-color: white;">
                                <div class="row">
                                    <div class="col-4">
                                        <div class="card">
                                            <div class="card-header">
                                                Customer 1
                                            </div>
                                            <div class="card-body p-0">
                                            <table class="table table-hover table-striped table-bordered">
                                                    <tr>
                                                        <td>Customer Name</td>
                                                        <th>Jones Thayil</th>
                                                    </tr>
                                                    <tr>
                                                        <td>Address</td>
                                                        <th>9082207560</th>
                                                    </tr>
                                                    <tr>
                                                        <td>Pincode</td>
                                                        <th>jonest@fts-pl.com</th>
                                                    </tr>
                                                    <tr>
                                                        <td>City</td>
                                                        <th>0000015483</th>
                                                    </tr>
                                                    <tr>
                                                        <td>Country</td>
                                                        <th>Approved</th>
                                                    </tr>
                                                    <tr>
                                                        <td>State</td>
                                                        <th>Approved</th>
                                                    </tr>
                                                    <tr>
                                                        <td>Telephone</td>
                                                        <th>Approved</th>
                                                    </tr>
                                                    <tr>
                                                        <td>Fax No.</td>
                                                        <th>Approved</th>
                                                    </tr>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>


            <?php if ($vendorTemp->status == 1) : ?>
                <div class="card-footer">
                    <div class="row">
                        <div class="col-sm-12 col-md-2">
                            <button type="button" class="btn btn-block p-2" style="border:1px solid #28a745" data-toggle="modal" data-target="#modal-sm">
                                <i class="far fa-check-circle"></i> &nbsp; Approve
                            </button>
                        </div>
                        <div class="col-sm-12 col-md-2">
                            <a href="#" class="btn btn-block reject  p-2" style="border:1px solid red" data-toggle="modal" data-target="#remarkModal"><i class="far fa-times-circle"></i> &nbsp; Reject</a>
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
            <?php elseif ($vendorTemp->status == 5) : ?>
                <div class="card-footer">
                    <div class="row">
                        <div class="col-sm-12 col-md-2">
                            <button type="button" data-id="<?= h($vendorTemp->id) ?>" class="btn btn-block p-2 notify" style="font-size: 0.8rem;border:1px solid #28a745">
                                <i class="far fa-check-circle"></i> Send Credentials
                            </button>
                        </div>
                    </div>
                </div>
            <?php endif; ?>
        </div>
    </div>    
</div>

<div class="modal fade" id="remarkModal" tabindex="-1" role="dialog" aria-labelledby="remarkModalLabel" aria-hidden="true">
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

<script>
    var userView = '<?php echo \Cake\Routing\Router::url(array('controller' => '/VendorTemps', 'action' => 'user-credentials')); ?>';
</script>

<?= $this->Html->script('b_vendortemps_view') ?>