<?php

/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\VendorTemp $vendorTemp
 */
?>
<?= $this->Html->css('table.css') ?>
<?= $this->Html->css('listing.css') ?>
<?= $this->Html->css('v_index.css') ?>
<?= $this->Html->css('v_vendorCustom') ?>
<?= $this->Html->css('v_vendortemp_view') ?>
<div class="row">
    <div class="col-sm-12 col-md-3 col-lg-3">
        <div class="card">
            <div class="card-body">
                <div class="prof-img text-center">
                    <img width="100px" src="<?= $this->Url->build('/') ?>img/<?= substr($vendorTemp->name,0,1) ?>.png"
                        alt="Vendor">
                </div>
                <div class="mt-3">
                    <table>
                        <tr>
                            <td>Name</td>
                            <th>
                                <?= h($vendorTemp->name) ?>
                            </th>
                        </tr>
                        <tr>
                            <td>Mobile No</td>
                            <th>
                                <?= h($vendorTemp->mobile) ?>
                            </th>
                        </tr>
                        <tr>
                            <td>Email ID</td>
                            <th>
                                <?= h($vendorTemp->email) ?>
                            </th>
                        </tr>
                        <tr>
                            <td>SAP Vendor Code</td>
                            <th>
                                <?= !empty($vendorTemp->sap_vendor_code) ? $vendorTemp->sap_vendor_code : '' ?>
                            </th>
                        </tr>
                        <tr>
                            <td>Status</td>
                            <th>
                                <?= $vendorTemp->vendor_status->description ?>
                            </th>
                        </tr>
                    </table>
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
    <div class="col-sm-12 col-md-9 col-lg-9 pl-0">
        <div class="card">
            <div class="card-header">
                <span class="User_head text-info d-flex justify-content-between align-items-center">
                    USER DETAILS
                    <div class="float-right">
                        <?php if ($updatecount == 0) : ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $vendorTemp->id], ['class' => 'edit_btn btn btn-info mb-0']) ?>
                        <?php endif; ?>
                    </div>
                </span>
            </div>
            <div class="card card-tabs card_boxshadow">
                <div class="row">
                    <div class="col-sm-12 col-md-12 col-lg-12" style="border-bottom: 1px solid #eee;">
                        <div class=" p-0" id="vendor-custom-tabs-one-tab">
                            <ul class="nav" id="custom-tabs-one-tab" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" id="custom-tabs-one-home-tab" data-toggle="pill"
                                        href="#custom-tabs-one-home" role="tab" aria-controls="custom-tabs-one-home"
                                        aria-selected="true">
                                        Personal Information
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="custom-tabs-one-profile-tab" data-toggle="pill"
                                        href="#custom-tabs-one-profile" role="tab"
                                        aria-controls="custom-tabs-one-profile" aria-selected="false">
                                        Branch Office
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="custom-tabs-one-settings-tab" data-toggle="pill"
                                        href="#custom-tabs-one-settings" role="tab"
                                        aria-controls="custom-tabs-one-settings" aria-selected="false">
                                        Production Facility
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="tab_contactperson" data-toggle="pill"
                                        href="#custom-tabs-four-messages" role="tab"
                                        aria-controls="custom-tabs-four-messages" aria-selected="false">
                                        Proprietor / Partner / Director
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="tab_paymentdetails" data-toggle="pill"
                                        href="#custom-tabs-four-home" role="tab" aria-controls="custom-tabs-four-home"
                                        aria-selected="false">
                                        Payment Details
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="tab_certificate" data-toggle="pill"
                                        href="#custom-tabs-four-certificate" role="tab"
                                        aria-controls="custom-tabs-four-certificate" aria-selected="false">
                                        Certificate
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="tab_questionnaire " data-toggle="pill"
                                        href="#custom-tabs-four-questionnaire" role="tab"
                                        aria-controls="custom-tabs-four-questionnaire" aria-selected="false">
                                        Questionnaire
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="tab_customerAddress" data-toggle="pill"
                                        href="#custom-tabs-four-customerAddress" role="tab"
                                        aria-controls="custom-tabs-four-customerAddress" aria-selected="false">
                                        Reputed Customer
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-12 col-sm-9">
                        <div class="card-body">
                            <div class="tab-content" id="custom-tabs-one-tabContent">
                                <div class="tab-pane fade show active" id="custom-tabs-one-home" role="tabpanel"
                                    aria-labelledby="custom-tabs-one-home-tab">
                                    <div class="row">
                                        <div class="col-sm-12 col-md-4 col-lg-4">
                                            <div class="card card_border">
                                                <div class="card-header">Contact Person</div>
                                                <div class="card-body p-0">
                                                    <table class="table table-hover table-striped table-bordered">
                                                        <tr>
                                                            <td>Name</td>
                                                            <th><span id="contactPersonName">
                                                                    <?= h($vendorTemp->contact_person) ?>
                                                                </span></th>
                                                        </tr>
                                                        <tr>
                                                            <td>Email</td>
                                                            <th><span id="contactPersonEmail">
                                                                    <?= h($vendorTemp->contact_email) ?>
                                                                </span></th>
                                                        </tr>
                                                        <tr>
                                                            <td>Mobile</td>
                                                            <th><span id="contactPersonMobile">
                                                                    <?= h($vendorTemp->contact_mobile) ?>
                                                                </span></th>
                                                        </tr>
                                                        <tr>
                                                            <td>Department</td>
                                                            <th><span id="contactPersonDepart">
                                                                    <?= h($vendorTemp->contact_department) ?>
                                                                </span></th>
                                                        </tr>
                                                        <tr>
                                                            <td>Designation</td>
                                                            <th><span id="contactPersonDesig">
                                                                    <?= h($vendorTemp->contact_designation) ?>
                                                                </span></th>
                                                        </tr>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                        <?php if (isset($vendorTemp)) : ?>
                                        <div class="col-sm-12 col-md-4 col-lg-4">
                                            <div class="card card_border">
                                                <div class="card-header">Permanent Address</div>
                                                <div class="card-body p-0">
                                                    <table class="table table-hover table-striped table-bordered">
                                                        <tr>
                                                            <td>Address</td>
                                                            <th>
                                                                <?= h($vendorTemp->address) ?>
                                                            </th>
                                                        </tr>
                                                        <tr>
                                                            <td>Address 1</td>
                                                            <th><?=h($vendorTemp->address_2) ?></th>
                                                        </tr>
                                                        <tr>
                                                            <td>City</td>
                                                            <th><?=h($vendorTemp->city) ?></th>
                                                        </tr>
                                                        <tr>
                                                            <td>State</td>
                                                            <th><?=h($vendorTemp->state['name']) ?></th>
                                                        </tr>
                                                        <tr>
                                                            <td>Country</td>
                                                            <th><?=h($vendorTemp->country['country_name']) ?>
                                                            </th>
                                                        </tr>
                                                        <tr>
                                                            <td>Pincode</td>
                                                            <th><?=h($vendorTemp->pincode) ?></th>
                                                        </tr>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                        <?php endif; ?>
                                        <div class="col-sm-12 col-md-4 col-lg-4">
                                            <div class="card card_border">
                                                <div class="card-header">Registered Address</div>
                                                <div class="card-body p-0">
                                                    <table class="table table-hover table-striped table-bordered">
                                                        <tr>
                                                            <td>Address</td>
                                                            <th>
                                                                <?php if (isset($vendorRegisterOffice)) : ?>
                                                                <?=h($vendorRegisterOffice->address) ?>
                                                                <?php endif; ?>
                                                            </th>
                                                        </tr>
                                                        <tr>
                                                            <td>Address 1</td>
                                                            <th>
                                                                <?php if (isset($vendorRegisterOffice)) : ?>
                                                                <?=h($vendorRegisterOffice->address_2) ?>
                                                                <?php endif; ?>
                                                            </th>
                                                        </tr>
                                                        <tr>
                                                            <td>City</td>
                                                            <th>
                                                                <?php if (isset($vendorRegisterOffice)) : ?>
                                                                <?=h($vendorRegisterOffice->city) ?>
                                                                <?php endif; ?>
                                                            </th>
                                                        </tr>
                                                        <tr>
                                                            <td>State</td>
                                                            <th>
                                                                <?php if (isset($vendorRegisterOffice)) : ?>
                                                                <?=h($vendorRegisterOffice->States['name']) ?>
                                                                <?php endif; ?>
                                                            </th>
                                                        </tr>
                                                        <tr>
                                                            <td>Country</td>
                                                            <th>
                                                                <?php if (isset($vendorRegisterOffice)) : ?>
                                                                <?=h($vendorRegisterOffice->Countries['country_name']) ?>
                                                                <?php endif; ?>
                                                            </th>
                                                        </tr>
                                                        <tr>
                                                            <td>Pincode</td>
                                                            <th>
                                                                <?php if (isset($vendorRegisterOffice)) : ?>
                                                                <?=h($vendorRegisterOffice->pincode) ?>
                                                                <?php endif; ?>
                                                            </th>
                                                        </tr>
                                                        <tr>
                                                            <td>Telephone</td>
                                                            <th>
                                                                <?php if (isset($vendorRegisterOffice)) : ?>
                                                                <?=h($vendorRegisterOffice->telephone) ?>
                                                                <?php endif; ?>
                                                            </th>
                                                        </tr>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-sm-12 col-md-4 col-lg-4" style="display:none;">
                                            <div class="card card_border">
                                                <div class="card-header">Other Details</div>
                                                <div class="card-body p-0">
                                                    <table class="table table-hover table-striped table-bordered">
                                                        <tr>
                                                            <td>Company Code</td>
                                                            <th>
                                                                <?= h($vendorTemp->company_code['name']) ?>
                                                            </th>
                                                        </tr>
                                                        <tr>
                                                            <td>Purchase Organisation</td>
                                                            <th>
                                                                <?= h($vendorTemp->purchasing_organization['name']) ?>
                                                            </th>
                                                        </tr>
                                                        <tr>
                                                            <td>Account Group</td>
                                                            <th>
                                                                <?= h($vendorTemp->account_group['name']) ?>
                                                            </th>
                                                        </tr>
                                                        <tr>
                                                            <td>Schema Group</td>
                                                            <th>
                                                                <?= h($vendorTemp->schema_group['name']) ?>
                                                            </th>
                                                        </tr>
                                                        <tr>
                                                            <td>Reconciliation Account</td>
                                                            <th>
                                                                <?= h($vendorTemp->reconciliation_account['name']) ?>
                                                            </th>
                                                        </tr>
                                                        <tr>
                                                            <td>Payment Term</td>
                                                            <th>
                                                                <?= h($vendorTemp->payment_term['description']) ?>
                                                            </th>
                                                        </tr>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="tab-pane fade" id="custom-tabs-one-profile" role="tabpanel"
                                    aria-labelledby="custom-tabs-one-profile-tab">
                                    <di class="card card_border">
                                        <div class="card-header">
                                            Branch Office
                                        </div>
                                        <div class="card-body">
                                            <div class="row">
                                                <?php foreach ($vendorBranchOffices as $bo) : ?>
                                                <div class="col-6">
                                                    <div class="card card_border">
                                                        <div class="card-body">
                                                            <table>
                                                                <tr>
                                                                    <td>Address</td>
                                                                    <th>
                                                                        <?= h($bo->address) ?>
                                                                    </th>
                                                                </tr>
                                                                <tr>
                                                                    <td>Address 1</td>
                                                                    <th>
                                                                        <?= h($bo->address_2) ?>
                                                                    </th>
                                                                </tr>
                                                                <tr>
                                                                    <td>City</td>
                                                                    <th>
                                                                        <?= h($bo->city) ?>
                                                                    </th>
                                                                </tr>
                                                                <tr>
                                                                    <td>State</td>
                                                                    <th>
                                                                        <?= h($bo->States['name']) ?>
                                                                    </th>
                                                                </tr>
                                                                <tr>
                                                                    <td>Pincode</td>
                                                                    <th>
                                                                        <?= h($bo->pincode) ?>
                                                                    </th>
                                                                </tr>
                                                                <tr>
                                                                    <td>Country</td>
                                                                    <th>
                                                                        <?= h($bo->Countries['country_name']) ?>
                                                                    </th>
                                                                </tr>
                                                                <tr>
                                                                    <td>telephone</td>
                                                                    <th>
                                                                        <?= h($bo->telephone) ?>
                                                                    </th>
                                                                </tr>
                                                                <tr>
                                                                    <td>registration_year</td>
                                                                    <th>
                                                                        <?= h($bo->registration_year) ?>
                                                                    </th>
                                                                </tr>
                                                                <tr>
                                                                    <td>registration_no</td>
                                                                    <th>
                                                                        <?= h($bo->registration_no) ?>
                                                                    </th>
                                                                </tr>
                                                                <tr>
                                                                    <td>registration_certificate</td>
                                                                    <th>
                                                                        <?php if($bo->registration_certificate) : ?>
                                                                        <?= $this->Html->link(__('<i class="fas fa-file-download"></i>'), '/' . $bo->registration_certificate, ['target' => '_blank', 'escape' => false]) ?>
                                                                        <?php endif; ?>
                                                                    </th>
                                                                </tr>
                                                            </table>
                                                        </div>
                                                    </div>
                                                </div>
                                                <?php endforeach; ?>
                                            </div>
                                        </div>
                                    </di>
                                    <div class="card card_border">
                                        <div class="card-header">
                                            Small Scale Industry
                                        </div>
                                        <div class="card-body">
                                            <table class="table table-hover table-striped">
                                                <tr>
                                                    <td>Year:</td>
                                                    <th>
                                                        <?php if (isset($vendorTemp->vendor_small_scales[0]->year)) : ?>
                                                        <?= h($vendorTemp->vendor_small_scales[0]->year) ?>
                                                        <?php endif; ?>
                                                    </th>
                                                    <td>Registration No.:</td>
                                                    <th>
                                                        <?php if (isset($vendorTemp->vendor_small_scales[0]->registration_no)) : ?>
                                                        <?= h($vendorTemp->vendor_small_scales[0]->registration_no) ?>
                                                        <?php endif; ?>
                                                    </th>
                                                    <td>Registration File:</td>
                                                    <th>
                                                        <?php if (isset($vendorTemp->vendor_small_scales[0]->certificate_file)) : ?>
                                                        <?= $this->Html->link(__('<i class="fas fa-file-download"></i>'), '/' . $vendorTemp->vendor_small_scales[0]->certificate_file, ['target' => '_blank', 'escape' => false]) ?>
                                                        <?php endif; ?>
                                                    </th>
                                                </tr>
                                            </table>
                                        </div>
                                    </div>
                                </div>

                                <div class="tab-pane fade" id="custom-tabs-one-settings" role="tabpanel"
                                    aria-labelledby="custom-tabs-one-settings-tab">
                                    <div class="row">
                                        <?php if (!empty($vendorTemp->vendor_facilities)) : ?>
                                            <?php if($vendorTemp->vendor_facilities[0]->lab_facility_file) : ?>
                                            <div class="col-sm-12 col-md-3 col-lg-3 mb-3">
                                                <?= $this->Html->link(__('Laboratory Facility Document'), '/' . $vendorTemp->vendor_facilities[0]->lab_facility_file, ['target' => '_blank', 'escape' => false, 'class' => 'btn btn-block bg-gradient-cancel']) ?>
                                            </div>
                                            <?php else :?>
                                            <div class="col-sm-12 col-md-3 col-lg-3 mb-3">
                                                Laboratory facilities available
                                                <label>
                                                    <?= ucfirst(h($vendorTemp->vendor_facilities[0]->lab_facility)) ?>
                                                </label>
                                            </div>
                                            <?php endif; ?>

                                            <?php if($vendorTemp->vendor_facilities[0]->isi_registration_file) : ?>
                                            <div class="col-sm-12 col-md-3 col-lg-3 mb-3">
                                                <?= $this->Html->link(__('ISI Registration Document'), '/' . $vendorTemp->vendor_facilities[0]->isi_registration_file, ['target' => '_blank', 'escape' => false, 'class' => 'btn btn-block bg-gradient-cancel']) ?>
                                            </div>
                                            <?php else :?>
                                            <div class="col-sm-12 col-md-3 col-lg-3 mb-3">
                                                Whether there is any ISI registration
                                                <label>
                                                    <?= ucfirst(h($vendorTemp->vendor_facilities[0]->isi_registration)) ?>
                                                </label>
                                            </div>
                                            <?php endif; ?>

                                            <?php if($vendorTemp->vendor_facilities[0]->test_facility_file) : ?>
                                            <div class="col-sm-12 col-md-3 col-lg-3 mb-3">
                                                <?= $this->Html->link(__('Test facility Document'), '/' . $vendorTemp->vendor_facilities[0]->test_facility_file, ['target' => '_blank', 'escape' => false, 'class' => 'btn btn-block bg-gradient-cancel']) ?>
                                            </div>
                                            <?php else :?>
                                            <div class="col-sm-12 col-md-3 col-lg-3 mb-3">
                                                Test facilities available
                                                <label>
                                                    <?= ucfirst(h($vendorTemp->vendor_facilities[0]->test_facility)) ?>
                                                </label>
                                            </div>
                                            <?php endif; ?>

                                            <?php if($vendorTemp->vendor_facilities[0]->sales_services_file) : ?>
                                            <div class="col-sm-12 col-md-3 col-lg-3 mb-3">
                                                <?= $this->Html->link(__('Facilities for effective after sales services'), '/' . $vendorTemp->vendor_facilities[0]->sales_services_file, ['target' => '_blank', 'escape' => false, 'class' => 'btn btn-block bg-gradient-cancel']) ?>
                                            </div>
                                            <?php else :?>
                                            <div class="col-sm-12 col-md-3 col-lg-3 mb-3">
                                                Facilities for effective after sales services
                                                <label>
                                                    <?= ucfirst(h($vendorTemp->vendor_facilities[0]->sales_services)) ?>
                                                </label>
                                            </div>
                                            <?php endif; ?>

                                            <?php if($vendorTemp->vendor_facilities[0]->quality_control_file) : ?>
                                            <div class="col-sm-12 col-md-3 col-lg-3 mb-3">
                                                <?= $this->Html->link(__('Quality control procedure adopted'), '/' . $vendorTemp->vendor_facilities[0]->quality_control_file, ['target' => '_blank', 'escape' => false, 'class' => 'btn btn-block bg-gradient-cancel']) ?>
                                            </div>
                                            <?php else :?>
                                            <div class="col-sm-12 col-md-3 col-lg-3 mb-3">
                                                Quality control procedure adopted
                                                <label>
                                                    <?= ucfirst(h($vendorTemp->vendor_facilities[0]->quality_control)) ?>
                                                </label>
                                            </div>
                                            <?php endif; ?>
                                        <?php endif; ?>
                                        <div class="col-sm-12 col-md-12 col-lg-12 mb-3">
                                            <div class="card card_border">
                                                <div class="card-header">
                                                    Annual turn over in last 3 years (In Rupee)
                                                </div>
                                                <div class="card-body">
                                                    <div class="row">
                                                        <?php if (!empty($vendorTemp->vendor_turnovers)) : ?>
                                                        <div class="col-4">
                                                            <?= h($vendorTemp->vendor_turnovers[0]->first_year) ?> :
                                                            <b>
                                                                <?= h($vendorTemp->vendor_turnovers[0]->first_year_turnover) ?> INR
                                                            </b>
                                                        </div>

                                                        <div class="col-4">
                                                            <?= h($vendorTemp->vendor_turnovers[0]->second_year) ?> :
                                                            <b>
                                                                <?= h($vendorTemp->vendor_turnovers[0]->second_year_turnover) ?> INR
                                                            </b>
                                                        </div>

                                                        <div class="col-4">
                                                            <?= h($vendorTemp->vendor_turnovers[0]->third_year) ?> :
                                                            <b>
                                                                <?= h($vendorTemp->vendor_turnovers[0]->third_year_turnover) ?> INR
                                                            </b>
                                                        </div>
                                                        <?php endif; ?>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-12 col-md-12 col-lg-12 mb-3">
                                            <div class="card card_border">
                                                <div class="card-header">
                                                    Income Tax Cleaning Certificate
                                                </div>
                                                <div class="card-body">
                                                    <div class="row">
                                                        <?php if (!empty($vendorTemp->vendor_incometaxes)) : ?>
                                                        <div class="col-4">
                                                            Certificate No<br>
                                                            <b>
                                                                <?= h($vendorTemp->vendor_incometaxes[0]->certificate_no) ?>
                                                            </b>
                                                        </div>
                                                        <div class="col-4">
                                                            Certificate Date<br>
                                                            <b>
                                                                <?= h($vendorTemp->vendor_incometaxes[0]->certificate_date) ?>
                                                            </b>
                                                        </div>
                                                        <div class="col-4">
                                                            Certificate Document<br>
                                                            <b>
                                                                <?php if($vendorTemp->vendor_incometaxes[0]->certificate_file) : ?>
                                                                <?= $this->Html->link(__('<i class="fas fa-file-download"></i>'), '/' . $vendorTemp->vendor_incometaxes[0]->certificate_file, ['target' => '_blank', 'escape' => false]) ?>
                                                                <?php endif; ?>
                                                            </b>
                                                        </div>
                                                        <?php endif; ?>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-12 col-md-12 col-lg-12 mb-3" id="factoryCodeView">
                                            <?php foreach ($vendorFactories as $bo) : ?>
                                            <div class="card card_border">
                                                <div class="card-header">
                                                    <?= h($bo->factory_code) ?>
                                                </div>
                                                <div class="card-body">
                                                    <?php if (!empty($bo)) : ?>
                                                    <table class="table">
                                                        <tr>
                                                            <td>Address</td>
                                                            <th>
                                                                <?= h($bo->address) ?>
                                                            </th>
                                                            <td>Address 1</td>
                                                            <th>
                                                                <?= h($bo->address_2) ?>
                                                            </th>
                                                            <td>Pincode</td>
                                                            <th>
                                                                <?= h($bo->pincode) ?>
                                                            </th>
                                                            <td>City</td>
                                                            <th>
                                                                <?= h($bo->city) ?>
                                                            </th>
                                                        </tr>
                                                        <tr>
                                                            <td>Country</td>
                                                            <th>
                                                                <?= h($bo->Countries['country_name']) ?>
                                                            </th>
                                                            <td>State</td>
                                                            <th>
                                                                <?= h($bo->States['name']) ?>
                                                            </th>
                                                            <td></td>
                                                            <th></th>
                                                            <td></td>
                                                            <th></th>
                                                        </tr>
                                                        <tr>
                                                            <td>Installed Capacity</td>
                                                            <th>
                                                                <?= h($bo->installed_capacity) ?>
                                                            </th>
                                                            <td>Machinery Available</td>
                                                            <th>
                                                                <?= h($bo->machinery_available) ?>
                                                            </th>
                                                            <td>Power Available</td>
                                                            <th>
                                                                <?= h($bo->power_available) ?>
                                                            </th>
                                                            <td>Raw Material Avi. and Source</td>
                                                            <th>
                                                                <?= h($bo->raw_material) ?>
                                                            </th>
                                                        </tr>
                                                        <?php foreach ($bo->vendor_commencements as $co) : ?>
                                                        <tr>
                                                            <td>Commercment Year</td>
                                                            <th>
                                                                <?= h($co->commencement_year) ?>
                                                            </th>
                                                            <td>Commercment Material</td>
                                                            <th>
                                                                <?= h($co->commencement_material) ?>
                                                            </th>
                                                            <td>
                                                                <?= h($co->first_year) ?>
                                                            </td>
                                                            <th>
                                                                <?= h($co->first_year_qty) ?>
                                                            </th>
                                                            <td>
                                                                <?= h($co->second_year) ?>
                                                            </td>
                                                            <th>
                                                                <?= h($co->second_year_qty) ?>
                                                            </th>
                                                            <td>
                                                                <?= h($co->third_year) ?>
                                                            </td>
                                                            <th>
                                                                <?= h($co->third_year_qty) ?>
                                                            </th>
                                                        </tr>
                                                        <?php endforeach; ?>
                                                    </table>
                                                    <?php endif; ?>
                                                </div>
                                            </div>
                                            <?php endforeach; ?>
                                        </div>
                                    </div>
                                </div>

                                <div class="tab-pane fade" id="custom-tabs-four-messages" role="tabpanel"
                                    aria-labelledby="tab_contactperson" style="background-color: white;">
                                    <?php foreach ($vendorPartnerAddress as $bo) : ?>
                                    <div class="card">
                                        <div class="card-header">
                                            <?= h($bo->name) ?>
                                        </div>
                                        <div class="card-body">
                                            <table class="table">
                                                <tr>
                                                    <td>Address</td>
                                                    <th>
                                                        <?= h($bo->address) ?>
                                                    </th>
                                                    <td>Address 1</td>
                                                    <th>
                                                        <?= h($bo->address_2) ?>
                                                    </th>
                                                    <td>Pincode</td>
                                                    <th>
                                                        <?= h($bo->pincode) ?>
                                                    </th>
                                                    <td>City</td>
                                                    <th>
                                                        <?= h($bo->city) ?>
                                                    </th>
                                                </tr>
                                                <tr>
                                                    <td>Country</td>
                                                    <th>
                                                        <?= h($bo->Countries['country_name']) ?>
                                                    </th>
                                                    <td>State</td>
                                                    <th>
                                                        <?= h($bo->States['name']) ?>
                                                    </th>
                                                    <td>Telephone</td>
                                                    <th>
                                                        <?= h($bo->telephone) ?>
                                                    </th>
                                                    <td>Fax</td>
                                                    <th>
                                                        <?= h($bo->fax_no) ?>
                                                    </th>
                                                </tr>
                                            </table>
                                        </div>
                                    </div>
                                    <?php endforeach; ?>
                                </div>

                                <div class="tab-pane fade" id="custom-tabs-four-home" role="tabpanel"
                                    aria-labelledby="tab_paymentdetails" style="background-color: white;">
                                    <div class="row">
                                        <div class="col-sm-12 col-md-12 col-lg-12">
                                            <div class="card card_border">
                                                <div class="card-header">
                                                    Bank Details
                                                </div>
                                                <div class="card-body">
                                                    <table class="table">
                                                        <tr>
                                                            <td>Bank name</td>
                                                            <th>
                                                                <?= h($vendorTemp->bank_name) ?>
                                                            </th>
                                                            <td>Bank Branch</td>
                                                            <th>
                                                                <?= h($vendorTemp->bank_branch) ?>
                                                            </th>
                                                            <td>Bank number</td>
                                                            <th>
                                                                <?= h($vendorTemp->bank_number) ?>
                                                            </th>
                                                            <td>IFSC Code</td>
                                                            <th>
                                                                <?= h($vendorTemp->bank_ifsc) ?>
                                                            </th>
                                                        </tr>
                                                        <tr>
                                                            <td>SWIFT/BIC</td>
                                                            <th>
                                                                <?= h($vendorTemp->bank_swift) ?>
                                                            </th>
                                                            <td>Bank Country</td>
                                                            <th>
                                                                <?= h($vendorTemp->bank_country) ?>
                                                            </th>
                                                            <td>City</td>
                                                            <th>
                                                                <?= h($vendorTemp->bank_city) ?>
                                                            </th>
                                                            <td>Order Currency</td>
                                                            <th>
                                                                <?= h($vendorTemp->order_currency) ?>
                                                            </th>
                                                        </tr>
                                                        <tr>
                                                            <td>SWIFT/BIC</td>
                                                            <th>
                                                                <?= h($vendorTemp->bank_swift) ?>
                                                            </th>
                                                            <td>TAN No</td>
                                                            <th>
                                                                <?= h($vendorTemp->tan_no) ?>
                                                            </th>
                                                            <td>CIN No.</td>
                                                            <th>
                                                                <?= h($vendorTemp->cin_no) ?>
                                                            </th>
                                                            <td></td>
                                                            <th></th>
                                                        </tr>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-12 col-md-12 col-lg-12">
                                            <div class="card card_border">
                                                <div class="card-header">
                                                    Other Payment Details
                                                </div>
                                                <div class="card-body">
                                                    <div class="row">
                                                        <div class="col-4">
                                                            GST No:
                                                            <?= h($vendorTemp->gst_no) ?><br>
                                                            <?php if($vendorTemp->gst_file) : ?>
                                                            <?= $this->Html->link(__('<i class="fas fa-file-download"></i>'), '/' . $vendorTemp->gst_file, ['target' => '_blank', 'escape' => false]) ?>
                                                            <?php endif; ?>
                                                        </div>
                                                        <div class="col-4">
                                                            PAN No:
                                                            <?= h($vendorTemp->pan_no) ?><br>
                                                            <?php if($vendorTemp->pan_file) : ?>
                                                            <?= $this->Html->link(__('<i class="fas fa-file-download"></i>'), '/' . $vendorTemp->pan_file, ['target' => '_blank', 'escape' => false]) ?>
                                                            <?php endif; ?>
                                                        </div>
                                                        <div class="col-4">
                                                            Cancelled Cheque:<br>
                                                            <?php if($vendorTemp->bank_file) : ?>
                                                            <?= $this->Html->link(__('<i class="fas fa-file-download"></i>'), '/' . $vendorTemp->bank_file, ['target' => '_blank', 'escape' => false]) ?>
                                                            <?php endif; ?>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="tab-pane fade" id="custom-tabs-four-certificate" role="tabpanel"
                                    aria-labelledby="tab_certificate" style="background-color: white;">
                                    <?php if (!empty($vendorTemp->vendor_otherdetail)) : ?>
                                    <div class="card card_border">
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-4">
                                                    Six Sigma :
                                                    <?php if($vendorTemp->vendor_otherdetail->six_sigma_file) : ?>
                                                    <?= $this->Html->link(__('<i class="fas fa-file-download"></i>'), '/' . $vendorTemp->vendor_otherdetail->six_sigma_file, ['target' => '_blank', 'escape' => false]) ?>
                                                    <?php endif; ?>
                                                    <b>
                                                        <?= h($vendorTemp->vendor_otherdetail->six_sigma) ?>
                                                    </b>
                                                </div>
                                                <div class="col-4">
                                                    ISO Registration / Certificate :
                                                    <?php if($vendorTemp->vendor_otherdetail->iso_file) : ?>
                                                    <?= $this->Html->link(__('<i class="fas fa-file-download"></i>'), '/' . $vendorTemp->vendor_otherdetail->iso_file, ['target' => '_blank', 'escape' => false]) ?>
                                                    <?php endif; ?>
                                                    <b>
                                                        <?= h($vendorTemp->vendor_otherdetail->iso) ?>
                                                    </b>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                    <div class="card card_border">
                                        <div class="card-body">
                                            <div class="row">
                                                <?php if (!empty($vendorTemp->vendor_otherdetail->halal_file)) : ?>
                                                <div class="col-4">
                                                    HALAL Registration / certificate:
                                                    <?php if($vendorTemp->vendor_otherdetail->halal_file) : ?>
                                                    <?= $this->Html->link(__('<i class="fas fa-file-download"></i>'), '/' . $vendorTemp->vendor_otherdetail->halal_file, ['target' => '_blank', 'escape' => false]) ?>
                                                    <?php endif; ?>
                                                </div>
                                                <?php endif; ?>
                                                <?php if (!empty($vendorTemp->vendor_otherdetail->declaration_file)) : ?>
                                                <div class="col-4">
                                                    Declaration:<br>
                                                    <?php if($vendorTemp->vendor_otherdetail->declaration_file) : ?>
                                                    <?= $this->Html->link(__('<i class="fas fa-file-download"></i>'), '/' . $vendorTemp->vendor_otherdetail->declaration_file, ['target' => '_blank', 'escape' => false]) ?>
                                                    <?php endif; ?>
                                                </div>
                                                <?php endif; ?>
                                                <?php if (!empty($vendorTemp->vendor_otherdetail->fully_manufactured)) : ?>
                                                <div class="col-12 mt-4">
                                                    Whether the item is completely manufactured in applicant's factory?<br>
                                                    <b>
                                                        <?php if($vendorTemp->vendor_otherdetail->fully_manufactured != 'yes') : ?>
                                                        <?= h($vendorTemp->vendor_otherdetail->suppliers_name) ?>
                                                        <?php else :?>
                                                        No
                                                        <?php endif; ?>
                                                    </b>
                                                </div>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                    </div>
                                    <?php endif; ?>
                                </div>

                                <div class="tab-pane fade" id="custom-tabs-four-questionnaire" role="tabpanel"
                                    aria-labelledby="tab_questionnaire" style="background-color: white;">
                                    <div class="card card_border">
                                        <div class="card-header">
                                            <h5>Other information considered relevent to be furnished by supplier</h5>
                                        </div>
                                        <div class="card-body">
                                            <div class="row" id="questionnaireAll">
                                                <?php foreach ($vendorTemp->vendor_questionnaires as $bo) : ?>
                                                <div class="col-12 mb-5">
                                                    <b>
                                                        <?= h($bo->question) ?>
                                                    </b>
                                                    <p>
                                                        <?= h($bo->answer) ?>
                                                    </p>
                                                </div>
                                                <?php endforeach; ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="tab-pane fade" id="custom-tabs-four-customerAddress" role="tabpanel"
                                    aria-labelledby="tab_customerAddress" style="background-color: white;">
                                    <div class="row" id="reputedCustomer">
                                        <?php foreach ($vendorReputedCustomers as $bo) : ?>
                                        <div class="col-12">
                                            <div class="card">
                                                <div class="card-header">
                                                    <?= h($bo->customer_name) ?>
                                                </div>
                                                <div class="card-body">
                                                    <table class="table">
                                                        <tr>
                                                            <td>Address</td>
                                                            <th>
                                                                <?= h($bo->customer_name) ?>
                                                            </th>
                                                            <td>Pincode</td>
                                                            <th>
                                                                <?= h($bo->pincode) ?>
                                                            </th>
                                                            <td>City</td>
                                                            <th>
                                                                <?= h($bo->city) ?>
                                                            </th>
                                                            <td>Country</td>
                                                            <th>
                                                                <?= h($bo->Countries['country_name']) ?>
                                                            </th>
                                                        </tr>
                                                        <tr>
                                                            <td>State</td>
                                                            <th>
                                                                <?= h($bo->States['name']) ?>
                                                            </th>
                                                            <td>Telephone</td>
                                                            <th>
                                                                <?= h($bo->telephone) ?>
                                                            </th>
                                                            <td>Fax No</td>
                                                            <th></th>
                                                            <td></td>
                                                            <th></th>
                                                        </tr>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                        <?php endforeach; ?>
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
